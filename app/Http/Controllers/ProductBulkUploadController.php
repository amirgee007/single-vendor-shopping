<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Lang;
use File;
use ZipArchive;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Footer;
use App\Settings;
use App\Merchant;
use App\Blog;
use App\Dashboard;
use App\Admodel;
use App\Deals;
use App\Auction;
use App\Products;
use App\Brand;  //brand
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image; 
use Illuminate\Support\Facades\Validator;
class ProductBulkUploadController extends Controller

{
  /*
  |--------------------------------------------------------------------------
  | Default Home Controller
  |--------------------------------------------------------------------------
  |
  | You may wish to use controllers instead of, or in addition to, Closure
  | based routes. That's great! Here is an example controller method to
  | get you started. To route to this controller, just add the route:
  |
  | Route::get('/', 'HomeController@showWelcome');
  |
  */
  public

  function __construct()
  {
    parent::__construct();

    // set admin Panel language

    $this->setLanguageLocaleAdmin();
  }

  /* PRODUCT BULK UPLOAD FORM */
  public function product_bulk_upload()
  {
    if (Lang::has(Session::get('admin_lang_file') . '.BACK_PRODUCTS') != '')
    {
      $session_message = trans(Session::get('admin_lang_file') . '.BACK_PRODUCTS');
    }
    else
    {
      $session_message = trans($this->ADMIN_OUR_LANGUAGE . '.BACK_PRODUCTS');
    }

    $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", 'productsizecount');
    $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
    $adminfooter = view('siteadmin.includes.admin_footer');
    return view('siteadmin.product_bulk_upload')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
  }

  /* PRODUCT BULK UPLOAD EDIT FORM */
  public function product_bulk_upload_edit()
  {
    if (Lang::has(Session::get('admin_lang_file') . '.BACK_PRODUCTS') != '')
    {
      $session_message = trans(Session::get('admin_lang_file') . '.BACK_PRODUCTS');
    }
    else
    {
      $session_message = trans($this->ADMIN_OUR_LANGUAGE . '.BACK_PRODUCTS');
    }

    $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", 'productsizecount');
    $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
    $adminfooter = view('siteadmin.includes.admin_footer');
    return view('siteadmin.product_bulk_upload_edit')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
  }

  public function delete_zip_folder($name)
  {

    // $name=Request::segment(2);
    $path = 'product-bulk-upload/' . $name;
    /* chown($path, 0777); */
    /* first delete all files in folder */
    if (!is_dir($path))
    {
      throw new InvalidArgumentException("$path must be a directory");
    }

    if (substr($path, strlen($path) - 1, 1) != '/')
    {
      $path.= '/';
    }

    $files = glob($path . '*', GLOB_MARK);
    foreach($files as $file)
    {
      if (is_dir($file))
      {
        self::deleteDir($file);
      }
      else
      {
        unlink($file);
      }
    }

    /* close */
    if (rmdir($path))
    { /* then delete folder */
      Session::flash('zip_success_message', "Folder deleted successfully!");
    }
    else
    {
      Session::flash('zip_error_message', "Error in deleting folder!!");
    }

    return Redirect('product_bulk_upload');
  }

  /* upload bulk zip file and extract to its name alone */
  public function product_image_bulk_upload_submit(Request $request)
  {
    if ($_FILES['zip_file']['name'] != '')
    {
      $file_name = $_FILES['zip_file']['name'];
      $array = explode(".", $file_name);
      $name = $array[0];
      $ext = $array[1];
      if ($ext == 'zip')
      {
        $path = 'product-bulk-upload/' . $name;
        $location = $path . $file_name;
        if (file_exists($path))
        {
          Session::flash('zip_error_message', "Already ZIP Found! try with different ZIP file! OR <a href='" . url('') . "/delete_zip/" . $name . "'>Click to delete that ZIP File</a>");
        }
        else
        {
          if (move_uploaded_file($_FILES['zip_file']['tmp_name'], $location))
          {
            $zip = new ZipArchive;
            if ($zip->open($location))
            {
              $zip->extractTo($path);
              $zip->close();
            }

            unlink($location);
          }

          Session::flash('zip_success_message', "ZIP file uploaded and extracted successfully!");
        }
      }
    }

    return Redirect('product_bulk_upload');
  }

  /* PRODUCT BULK UPLOAD FORM SUBMIT */
  public function product_bulk_upload_submit(Request $request)
  {
    $errorArr = array();
    $successArr = array();
    $folder_array = array();
    $error = 0;
    $merchant_pto_title_dup = array();
    $mimes = array(
      'application/vnd.ms-excel',
      'text/plain',
      'text/csv',
      'text/tsv'
    );
    if (!in_array($_FILES['upload-file']['type'], $mimes))
    {
      $errorArr[].= 'File format is incorrect, Upload .csv format';
      Session::flash('message', $errorArr);
      return Redirect('product_bulk_upload');
    }
    else
    {

      // get file

      $upload = $request->file('upload-file');
      $filePath = $upload->getRealPath();

      // open and read

      $file = fopen($filePath, 'r');
      $header = fgetcsv($file);

      // dd($file);
      // exit();

      $escapedHeader = [];

      // validate

      foreach($header as $key => $value)
      {
        $lheader = strtolower($value);
        $escapedItem = preg_replace('/[^a-z,1-9]/', '', $lheader);
        array_push($escapedHeader, $escapedItem);
      }

      // looping through othe columns
      $j=0;
      while ($columns = fgetcsv($file))
      {
        /*Sathyaseelan Define size and color array */
        $size_id = array();
        $color_id = array();
        /* Sathyaseelan close array */
        // trim data

        foreach($columns as $key => & $value)
        {
          $value = $value;
        }

        $data = array_combine($escapedHeader, $columns);

        // print_r($data);
        // exit();
        // setting type

        foreach($data as $key => & $value)
        {
          $value = ($key == "protitle" || $key == "prodesc" || $key == "proisspec" || $key == "proiscolor" || $key == "proissize" || $key == "proissize" || $key == "metakeyword" || $key == "metadescription" || $key == "topcategory" || $key == "maincategory" || $key == "subcategory" || $key == "secondsubcategory" || $key == "canceldays" || $key == "returndays" || $key == "replacementdays" || $key == "cancelpolicy" || $key == "returnpolicy" || $key == "replacementpolicy" || $key == "cancelpolicydescription" || $key == "returnpolicydescription" || $key == "replacementpolicydescription" || $key == "imageurl1" || $key == "imageurl2" || $key == "imageurl3" || $key == "imageurl4" || $key == "imageurl5" || $key == "colors" || $key == "sizes" || $key == "specificationgroup" || $key == "specification" || $key == "specificationtext") ? (string)$value : (float)$value;
        }

        // echo'<pre>';print_r($data);die;

        /*--------------------------------------------*/

        $pro_title = $data['protitle'];
        if ($pro_title == "")
        {
          $errorArr[].= 'Product Title Is Must.'.$pro_title.'';
          $error++;
          Session::flash('message', $errorArr);
        }
        else
        {
          
            $data['merchantemail']=0;
          
            $mer_id = 0;
          
          /*--------------------------------------------*/
          $already_product_exsist = DB::table('nm_product')->where('pro_title', 'like', '' . $data['protitle'] . '')->where('pro_status', '!=', 2)->where('pro_mr_id', $mer_id)->get();
          if (count($already_product_exsist) > 0)
          {
            $errorArr[].= '' . $pro_title . ' is Already exsist for same Vendor';
            Session::flash('message', $errorArr);
            $error++;
          }
          else
          {
            $data['storename']='oo'; 
            if ($data['storename'] != "")
            { 

              $store_id=0;
            }
            else
            {
              $store_id = 0;
              
            }

            /*--------------------------------------------*/
            if ($data['topcategory'] == "")
            {
              $pro_mc_id = 0;
              $errorArr[].= 'Topcategory is required for ' . $pro_title . '';

              // Session::flash(array('message','Wrong Store Name in '.$pro_title.''));

              $error++;
            }

            if ($data['topcategory'] != "")
            {
              $maincat_name = DB::table('nm_maincategory')->where('mc_name', 'like', '' . $data['topcategory'] . '')->first();
              if (count($maincat_name) > 0)
              {
                $pro_mc_id = $maincat_name->mc_id;
              }
              else
              {
                $pro_mc_id = 0;
                $errorArr[].= 'Wrong Top category in ' . $pro_title . '';

                // Session::flash(array('message','Wrong Top category in '.$pro_title.''));

                $error++;
              }
            }
            else
            {
              $pro_mc_id = 0;
              $errorArr[].= 'Top category is required for ' . $pro_title . '';

              // Session::flash(array('message','Wrong Top category in '.$pro_title.''));

              $error++;
            }

            /*--------------------------------------------*/
            if ($data['maincategory'] != "")
            {
              $second_maincat_name = DB::table('nm_secmaincategory')->where('smc_name', 'like', '' . $data['maincategory'] . '')->where('smc_mc_id', $pro_mc_id)->first();
              if (count($second_maincat_name) > 0)
              {
                $pro_smc_id = $second_maincat_name->smc_id;
              }
              else
              {
                $pro_smc_id = 0;
                $errorArr[].= 'Wrong Main category ' . $pro_title . '';
                $error++;
              }
            }
            else
            {
              $pro_smc_id = 0;
              $errorArr[].= 'Main category is required for ' . $pro_title . '';
              $error++;
            }

            /*--------------------------------------------*/
            if ($data['subcategory'] != '')
            {
              $sub_category_name = DB::table('nm_subcategory')->where('sb_name', 'like', '%' . $data['subcategory'] . '%')->where('mc_id', $pro_mc_id)->where('sb_smc_id', $pro_smc_id)->first();
              if (count($sub_category_name) != 0)
              {
                $pro_sb_id = $sub_category_name->sb_id;
              }
              else
              {
                $pro_sb_id = 0;
                $errorArr[].= 'Wrong Sub category ' . $pro_title . '';

                // Session::flash(array('message','Wrong Sub category '.$pro_title.''));

                $error++;
              }
            }
            else
            {
              $pro_sb_id = 0;
            }

            /*--------------------------------------------*/
            if ($data['secondsubcategory'] != '')
            {
              $secondsubcategory_name = DB::table('nm_secsubcategory')->where('ssb_name', 'like', '' . $data['secondsubcategory'] . '')->where('mc_id', $pro_mc_id)->where('ssb_smc_id', $pro_smc_id)->where('ssb_sb_id', $pro_sb_id)->first();
              if (count($secondsubcategory_name) != 0)
              {
                $pro_ssb_id = $secondsubcategory_name->ssb_id;
              }
              else
              {
                $pro_ssb_id = 0;
                $errorArr[].= 'Wrong Second Sub category ' . $pro_title . '';

                // Session::flash(array('message','Wrong Second Sub category '.$pro_title.''));

                $error++;
              }
            }
            else
            {
              $pro_ssb_id = 0;
            }

            /*--------------------------------------------*/
            $price_check = 0;
            $pro_price = $data['proprice'];
            if ($pro_price == "" || $pro_price == "0")
            {
              $errorArr[].= 'Price is must for ' . $pro_title . '';
              $error++;
              $price_check++;
            }
            elseif (!is_numeric($pro_price))
            {
              $errorArr[].= 'Price Should Be Number for ' . $pro_title . '';
              $error++;
              $price_check++;
            }

            $pro_disprice = $data['prodisprice'];
            if ($pro_disprice == "")
            {
              $errorArr[].= 'Discount Price is must for ' . $pro_title . '';
              $error++;
              $price_check++;
            }
            elseif (!is_numeric($pro_disprice))
            {
              $errorArr[].= 'Discount Price Should Be Number for ' . $pro_title . '';
              $error++;
              $price_check++;
            }

            if ($price_check == "0")
            {
              if ($pro_disprice > $pro_price)
              {
                $errorArr[].= 'Discount Price Should Less then Product Actual Price ' . $pro_title . '';
                $error++;
              }
            }

            $pro_desc = $data['prodesc'];
            if ($pro_desc == "")
            {
              $errorArr[].= 'Description is must for ' . $pro_title . '';
              $error++;
            }

            $pro_shipping = $data['shippingamt'];
            if ($pro_shipping == "")
            {
              $pro_shipping = 0;
            }

            if (!is_numeric($pro_shipping))
            {
              $errorArr[].= 'Shipping Price Should Be Number for ' . $pro_title . '';
              $error++;
            }

            $pro_tax = $data['protax'];
            if ($pro_tax == "")
            {

              // $errorArr[] .= 'Tax is must for '.$pro_title.'';
              // $error++;

            }

            $pro_is_color = $pro_is_size = 1;
            $pro_isspec = 2;
            if ($data['proisspec'] == 'Yes' || $data['proisspec'] == 'yes')
            {
              $pro_isspec = 1;
            }
            elseif ($data['proisspec'] == 'No' || $data['proisspec'] == 'no' || $data['proisspec'] == '')
            {
              $pro_isspec = 2;
            }

            if ($data['proissize'] == 'Yes' || $data['proissize'] == 'yes')
            {
              $pro_is_size = 0;
            }
            elseif ($data['proissize'] == 'No' || $data['proissize'] == 'no' || $data['proissize'] == '')
            {
              $pro_is_size = 1;
            }

            if ($data['proiscolor'] == 'Yes' || $data['proiscolor'] == 'yes')
            {
              $pro_is_color = 0;
            }
            elseif ($data['proiscolor'] == 'No' || $data['proiscolor'] == 'no' || $data['proiscolor'] == '')
            {
              $pro_is_color = 1;
            }

            if ($pro_isspec == 1 && $data['specificationgroup'] == '')
            {
              $errorArr[].= 'Specification Group is Must for ' . $pro_title . '';
              $error++;
            }

            if ($pro_isspec == 1 && $data['specification'] == '')
            {
              $errorArr[].= 'Specification is Must for ' . $pro_title . '';
              $error++;
            }

            if ($pro_isspec == 1 && $data['specificationtext'] == '')
            {
              $errorArr[].= 'Specification Text is Must for ' . $pro_title . '';
              $error++;
            }
            elseif ($data['specificationgroup'] != '' && $data['specification'] != '')
            {
              if ($pro_isspec == 2)
              {
                $errorArr[].= 'Wrong Specification Status is choosen for ' . $pro_title . '';
                $error++;
              }
              else
              {
                $specgroupArr = explode(',', $data['specificationgroup']);
                $specificationArr = explode(',', $data['specification']);
                if ($data['specificationtext'] != '')
                {
                  $specification_textArr = explode('*', $data['specificationtext']);
                }
                else
                {
                  $specification_textArr = array();
                }

                if (count($specgroupArr) != count($specificationArr))
                {
                  $errorArr[].= 'Check Specification Details. There is not correct for ' . $pro_title . '';
                  $error++;
                }
                else
                {
                  foreach($specgroupArr as $spec_group_val)
                  {
                    $specification_group_data = DB::table('nm_spgroup')->where('spg_name', 'like', '' . $spec_group_val . '')->where('sp_mc_id', '=', $pro_mc_id)->where('sp_smc_id', '=', $pro_smc_id)->first();
                    if ($specification_group_data == '')
                    {
                      $errorArr[].= 'Wrong Specification Group ' . $spec_group_val . '';
                      $error++;
                    }
                    else
                    {
                      $spec_group_id[] = $specification_group_data->spg_id;
                    }
                  }

                  if ($error == 0)
                  {
                    $i = 0;
                    foreach($specificationArr as $spec_val)
                    {
                      $specification_data = DB::table('nm_specification')->where('sp_name', 'like', '' . $spec_val . '')->where('sp_spg_id', $spec_group_id[$i])->first();
                      if ($specification_data == '')
                      {
                        $errorArr[].= 'Wrong Specification, Check also Specification Group for ' . $spec_val . '';
                        $error++;
                      }
                      else
                      {
                        $specification_group_id[] = $specification_data->sp_spg_id;
                        $specification_id[] = $specification_data->sp_id;
                      }

                      $i++;
                    }
                  }
                }
              }
            }

            if ($pro_is_color == 0 && $data['colors'] == '')
            {
              $errorArr[].= 'Colors is Must for ' . $pro_title . '';
              $error++;
            }

            if ($data['colors'] != '')
            {
              if ($pro_is_color == 1)
              {
                $errorArr[].= 'Wrong Color Status is choosen for ' . $pro_title . '';
                $error++;
              }
              else
              {
                $colorArr = explode(',', $data['colors']);
                foreach($colorArr as $val)
                {
                  $color_data = DB::table('nm_color')->where('co_name', 'like', '' . $val . '')->first();
                  if ($color_data == '')
                  {
                    $errorArr[].= 'Wrong Color ' . $val . '';
                    $error++;
                  }
                  else
                  {
                    $color_id[] = $color_data->co_id;
                  }
                }
              }
            }

            if ($pro_is_size == 0 && $data['sizes'] == '')
            {
              $errorArr[].= 'Sizes is Must for ' . $pro_title . '';
              $error++;
            }

            if ($data['sizes'] != '')
            {
              if ($pro_is_size == 1)
              {
                $errorArr[].= 'Wrong Size Status is choosen for ' . $pro_title . '';
                $error++;
              }
              else
              {
                $sizeArr = explode(',', $data['sizes']);
                foreach($sizeArr as $size_val)
                {
                  $size_data = DB::table('nm_size')->where('si_name', '=', '' . $size_val . '')->first();

                  // echo $size_val;print_r($sizeArr);die;

                  if ($size_data == '')
                  {
                    $errorArr[].= 'Wrong Size ' . $size_val . '';
                    $error++;
                  }
                  else
                  {
                    $size_id[] = $size_data->si_id;
                  }
                }
              }
            }

            if ($pro_shipping == '')
            {
              $shippamt = 0.00;
              $shipping_type = 1;
            }

            if ($pro_shipping != '')
            {
              $shippamt = $pro_shipping;
              $shipping_type = 2;
            }

            if (($data['protax'] != ''))
            {
              if (!is_numeric($data['protax']))
              {
                $errorArr[].= 'Tax is must be an number for ' . $pro_title . '';
                $error++;
              }
              else
              {
                $pro_tax = $data['protax'];
              }
            }

            $pro_delivery = $data['prodelivery'];
            if ($pro_delivery == "" || $pro_delivery == "0")
            {
              $errorArr[].= 'Delivery Days Is must for ' . $pro_title . '';
              $error++;
              $price_check++;
            }
            elseif (!is_numeric($pro_delivery))
            {
              $errorArr[].= 'Delivery Days Should Be Number for ' . $pro_title . '';
              $error++;
            }

            $pro_qty = $data['proqty'];
            if ($pro_qty == "" || $pro_qty == "0")
            {
              $errorArr[].= 'Product Quantity Is Must For ' . $pro_title . '';
              $error++;
            }
            elseif (!is_numeric($pro_qty))
            {
              $errorArr[].= 'Product quantity Should Be Number for ' . $pro_title . '';
              $error++;
            }

            $cash_pack = 0;
            $cash_pack = $data['cashpack'];
            if ($cash_pack == "")
            {
              $cash_pack = 0;
            }
            elseif (!is_numeric($cash_pack))
            {
              $errorArr[].= 'Product Cash Back Should Be Number for ' . $pro_title . '';
              $error++;
            }

            $pro_mkeywords = $data['metakeyword'];
            $pro_mdesc = $data['metadescription'];
            $shippingamt = $data['shippingamt'];
            if (isset($data['imageurl1']) && $data['imageurl1'] != '')
            {
              $video_image_url_1 = "product-bulk-upload/" . $data['imageurl1'];
            }
            else
            {
              $video_image_url_1 = '';
              $errorArr[].= 'Image1 is Must for ' . $pro_title . '';
              $error++;
            }

            if (isset($data['imageurl2']) && $data['imageurl2'] != '')
            {
              $video_image_url_2 = "product-bulk-upload/" . $data['imageurl2'];
            }
            else
            {
              $video_image_url_2 = '';
            }

            if (isset($data['imageurl3']) && $data['imageurl3'] != '')
            {
              $video_image_url_3 = "product-bulk-upload/" . $data['imageurl3'];
            }
            else
            {
              $video_image_url_3 = '';
            }

            if (isset($data['imageurl4']) && $data['imageurl4'] != '')
            {
              $video_image_url_4 = "product-bulk-upload/" . $data['imageurl4'];
            }
            else
            {
              $video_image_url_4 = '';
            }

            if (isset($data['imageurl5']) && $data['imageurl5'] != '')
            {
              $video_image_url_5 = "product-bulk-upload/" . $data['imageurl5'];
            }
            else
            {
              $video_image_url_5 = '';
            }

            /*---------------------------------------*/
            if ($video_image_url_1 != '')
            {
              if (strpos($video_image_url_1, '.jpg') == true || strpos($video_image_url_1, '.jpeg') == true || strpos($video_image_url_1, '.png') == true || $video_image_url_1 != '')
              {
                $url_Arr = explode('/', $video_image_url_1);
                $image_name = end($url_Arr);

                // echo basename($video_image_url_1);

                if (@getimagesize($video_image_url_1))
                {
                  $size = getimagesize($video_image_url_1);
                }
                else
                {
                  $size = array();
                  $error++;
                  $errorArr[].= 'Image file does not exist. Give Correct image Path for ' . $data['protitle'] . '';
                }

                if (count($size) > 0 && $size[0] != '800' && $size[1] != '800')
                {
                  $error++;
                  $errorArr[].= 'Invalid Image Size. Need width800px , height 800px ' . $data['protitle'] . '';
                }
              }
              else
              {
                $error++;
                $errorArr[].= 'Invalid File URL ' . $data['protitle'] . '';
              }
            }

            /*---------------------------------------*/
            if ($video_image_url_2 != '')
            {
              if (strpos($video_image_url_2, '.jpg') == true || strpos($video_image_url_2, '.jpeg') == true || strpos($video_image_url_2, '.png') == true)
              {
                $url_Arr = explode('/', $video_image_url_2);
                $image_name = end($url_Arr);
                if (@getimagesize($video_image_url_2))
                {
                  $size = getimagesize($video_image_url_2);
                }
                else
                {
                  $size = array();
                  $error++;
                  $errorArr[].= 'Image file does not exsist. Give Correct image Path for ' . $data['protitle'] . '';
                }

                if (count($size) > 0 && $size[0] != '800' && $size[1] != '800')
                {
                  $error++;
                  $errorArr[].= 'Invalid Image Size. Need width 800px , height 800px ' . $data['protitle'] . '';
                }
              }
              else
              {
                $error++;
                $errorArr[].= 'Invalid File URL ' . $data['protitle'] . '';
              }
            }

            /*-------------------------------------------------------------*/
            if ($video_image_url_3 != '')
            {
              if (strpos($video_image_url_3, '.jpg') == true || strpos($video_image_url_3, '.jpeg') == true || strpos($video_image_url_3, '.png') == true)
              {
                $url_Arr = explode('/', $video_image_url_3);
                $image_name = end($url_Arr);
                if (@getimagesize($video_image_url_3))
                {
                  $size = getimagesize($video_image_url_3);
                }
                else
                {
                  $size = array();
                  $error++;
                  $errorArr[].= 'Image file does not exsist. Give Correct image Path for ' . $data['protitle'] . '';
                }

                if (count($size) > 0 && $size[0] != '800' && $size[1] != '800')
                {
                  $error++;
                  $errorArr[].= 'Invalid Image Size. Need width 800px , height 800px ' . $data['protitle'] . '';
                }
              }
              else
              {
                $error++;
                $errorArr[].= 'Invalid File URL ' . $data['protitle'] . '';
              }
            }

            /*-------------------------------------------------------------*/
            if ($video_image_url_4 != '')
            {
              if (strpos($video_image_url_4, '.jpg') == true || strpos($video_image_url_4, '.jpeg') == true || strpos($video_image_url_4, '.png') == true)
              {
                $url_Arr = explode('/', $video_image_url_4);
                $image_name = end($url_Arr);
                if (@getimagesize($video_image_url_4))
                {
                  $size = getimagesize($video_image_url_4);
                }
                else
                {
                  $size = array();
                  $error++;
                  $errorArr[].= 'Image file does not exsist. Give Correct image Path for ' . $data['protitle'] . '';
                }

                if (count($size) > 0 && $size[0] != '800' && $size[1] != '800')
                {
                  $error++;
                  $errorArr[].= 'Invalid Image Size. Need width 800px , height 800px ' . $data['protitle'] . '';
                }
              }
              else
              {
                $error++;
                $errorArr[].= 'Invalid File URL ' . $data['protitle'] . '';
              }
            }

            /*-------------------------------------------------------------*/
            if ($video_image_url_5 != '')
            {
              if (strpos($video_image_url_5, '.jpg') == true || strpos($video_image_url_5, '.jpeg') == true || strpos($video_image_url_5, '.png') == true)
              {
                $url_Arr = explode('/', $video_image_url_5);
                $image_name = end($url_Arr);
                if (@getimagesize($video_image_url_5))
                {
                  $size = getimagesize($video_image_url_5);
                }
                else
                {
                  $size = array();
                  $error++;
                  $errorArr[].= 'Image file does not exsist. Give Correct image Path for ' . $data['protitle'] . '';
                }

                if (count($size) > 0 && $size[0] != '800' && $size[1] != '800')
                {
                  $error++;
                  $errorArr[].= 'Invalid Image Size. Need width 800px , height 800px ' . $data['protitle'] . '';
                }
              }
              else
              {
                $error++;
                $errorArr[].= 'Invalid File URL ' . $data['protitle'] . '';
              }
            }

            /* Sathyaseelan === policy-start */
            $allow_cancel = $allow_return = $allow_replace = $cancel_policy = $return_policy = $replace_policy = $cancel_days = $return_days = $replace_days = "";
            if (ucfirst(strtolower($data['cancelpolicy'])) == 'Yes')
            {
              $allow_cancel = 1;
            }
            elseif (ucfirst(strtolower($data['cancelpolicy'])) == 'No' || $data['cancelpolicy'] == '')
            {
              $allow_cancel = 0;
            }

            if (ucfirst(strtolower($data['returnpolicy'])) == 'Yes')
            {
              $allow_return = 1;
            }
            elseif (ucfirst(strtolower($data['returnpolicy'])) == 'No' || $data['returnpolicy'] == '')
            {
              $allow_return = 0;
            }

            if (ucfirst(strtolower($data['replacementpolicy'])) == 'Yes')
            {
              $allow_replace = 1;
            }
            elseif (ucfirst(strtolower($data['replacementpolicy'])) == 'No' || $data['replacementpolicy'] == '')
            {
              $allow_replace = 0;
            }

            if ($allow_cancel == 1 AND $data['cancelpolicydescription'] == "")
            {
              $errorArr[].= 'Cancelation Policy is must for ' . $pro_title . '';
              $error++;
            }
            else
            {
              $cancel_policy = $data['cancelpolicydescription'];
            }

            if ($allow_return == 1 AND $data['returnpolicydescription'] == "")
            {
              $errorArr[].= 'Return Policy is must for ' . $pro_title . '';
              $error++;
            }
            else
            {
              $return_policy = $data['returnpolicydescription'];
            }

            if ($allow_replace == 1 AND $data['replacementpolicydescription'] == "")
            {
              $errorArr[].= 'Replacement Policy is must for ' . $pro_title . '';
              $error++;
            }
            else
            {
              $replace_policy = $data['replacementpolicydescription'];
            }
			
		//new added
		  $allow_cancel = $allow_return = $allow_replace = $cancel_policy = $return_policy = $replace_policy = $cancel_days = $return_days =$replace_days = "";
          if (ucfirst(strtolower($data['cancelpolicy'])) == 'Yes')
          {
            $allow_cancel = 1;
          }
          elseif (ucfirst(strtolower($data['cancelpolicy'])) == 'No' || $data['cancelpolicy'] == '')
          {
            $allow_cancel = 0;
          }

          if (($allow_cancel == 1) && ($data['canceldays'] == ''))
          { 
            $errorArr[].= 'Cancelation days is must for ' . $pro_title . '';
            $error++;
            $data['canceldays'] = 0;
          }
          elseif (($allow_cancel == 1) && (!is_numeric($data['canceldays'])))
          {
            $errorArr[].= 'Cancelation days is must be an number for ' . $pro_title . '';
            $error++;
          }
          else
          {
            $cancel_days = $data['canceldays'];
          }

          if (ucfirst(strtolower($data['returnpolicy'])) == 'Yes')
          {
            $allow_return = 1;
          }
          elseif (ucfirst(strtolower($data['returnpolicy'])) == 'No' || $data['returnpolicy'] == '')
          {
            $allow_return = 0;
          }

          if (($allow_return == 1) && ($data['returndays'] == ''))
          {
            $errorArr[].= 'Return days is must for ' . $pro_title . '';
            $error++;
            $data['returndays'] = 0;
          }
          elseif (($allow_return == 1) && (!is_numeric($data['returndays'])))
          {
            $errorArr[].= 'return days is must be an number for ' . $pro_title . '';
            $error++;
          }
          else
          {
            $return_days = $data['returndays'];
          }

          if (ucfirst(strtolower($data['replacementpolicy'])) == 'Yes')
          {
            $allow_replace = 1;
          }
          elseif (ucfirst(strtolower($data['replacementpolicy'])) == 'No' || $data['replacementpolicy'] == '')
          {
            $allow_replace = 0;
          }

          if (($allow_replace == 1) && ($data['replacementdays'] == ''))
          {
            $errorArr[].= 'Replacement days is must for ' . $pro_title . '';
            $error++;
            $data['replacedays'] = 0;
          }
          elseif (($allow_replace == 1) &&(!is_numeric($data['replacementdays'])))
          {
            $errorArr[].= 'Replacement days is must be an number for ' . $pro_title . '';
            $error++;
          }
          else
          {
            $replace_days = $data['replacementdays'];
          }

		//end new added
			
			

            /* Sathyaseelan === Policy Close */
          }
        }
        $j++;

        // print_r($merchant_pto_title_dup);die;

      }

      if ($error == 0)
      {

        // get file

        $upload = $request->file('upload-file');
        $filePath = $upload->getRealPath();

        // open and read

        $file = fopen($filePath, 'r');
        $header = fgetcsv($file);

        // dd($file);
        // exit();

        $escapedHeader = [];

        // validate

        foreach($header as $key => $value)
        {
          $lheader = strtolower($value);
          $escapedItem = preg_replace('/[^a-z,1-9]/', '', $lheader);
          array_push($escapedHeader, $escapedItem);
        }

        // looping through othe columns

        while ($columns = fgetcsv($file))
        {
          /*Sathyaseelan Define size and color array */
          $size_id = array();
          $color_id = array();
          /* Sathyaseelan close array */
          if ($columns[0] == "")
          {
            continue;
          }

          // trim data

          foreach($columns as $key => & $value)
          {
            $value = $value;
          }

          $data = array_combine($escapedHeader, $columns);
          foreach($data as $key => & $value)
          {
            $value = ($key == "protitle" || $key == "prodesc" || $key == "proisspec" || $key == "proiscolor" || $key == "proissize" || $key == "merchantemail" || $key == "storename" || $key == "proissize" || $key == "metakeyword" || $key == "metadescription" || $key == "topcategory" || $key == "maincategory" || $key == "subcategory" || $key == "secondsubcategory" || $key == "canceldays" || $key == "returndays" || $key == "replacementdays" || $key == "cancelpolicy" || $key == "returnpolicy" || $key == "replacementpolicy" || $key == "cancelpolicydescription" || $key == "returnpolicydescription" || $key == "replacementpolicydescription" || $key == "imageurl1" || $key == "imageurl2" || $key == "imageurl3" || $key == "imageurl4" || $key == "imageurl5" || $key == "colors" || $key == "sizes" || $key == "specificationgroup" || $key == "specification" || $key == "specificationtext") ? (string)$value : (float)$value;
          }

          /*--------------------------------------------*/
          $pro_title = $data['protitle'];
          
          $mer_id = 0;

          // DB::connection()->enableQueryLog();

          $shop_name = 0;
          $store_id = 0;
          $pro_mc_id = $maincat_name->mc_id;
          $second_maincat_name = DB::table('nm_secmaincategory')->where('smc_name', 'like', '' . $data['maincategory'] . '')->where('smc_mc_id', $pro_mc_id)->first();
          $pro_smc_id = $second_maincat_name->smc_id; /*--------------------------------------------*/
          if ($data['subcategory'] != '')
          {
            $sub_category_name = DB::table('nm_subcategory')->where('sb_name', 'like', '%' . $data['subcategory'] . '%')->where('mc_id', $pro_mc_id)->where('sb_smc_id', $pro_smc_id)->first();
            $pro_sb_id = $sub_category_name->sb_id;
          }
          else
          {
            $pro_sb_id = 0;
          }

          /*--------------------------------------------*/
          if ($data['secondsubcategory'] != '')
          {
            $secondsubcategory_name = DB::table('nm_secsubcategory')->where('ssb_name', 'like', '' . $data['secondsubcategory'] . '')->where('mc_id', $pro_mc_id)->where('ssb_smc_id', $pro_smc_id)->where('ssb_sb_id', $pro_sb_id)->first();
            $pro_ssb_id = $secondsubcategory_name->ssb_id;
          }
          else
          {
            $pro_ssb_id = 0;
          }

          $pro_price = $data['proprice'];
          $pro_disprice = $data['prodisprice'];
          $pro_desc = $data['prodesc'];
          $pro_shipping = $data['shippingamt'];

          //  $pro_tax = $data['protax'];

          $pro_is_color = $pro_is_size = 1;
          $pro_isspec = 2;
          if ($data['proisspec'] == 'Yes' || $data['proisspec'] == 'yes')
          {
            $pro_isspec = 1;
          }
          elseif ($data['proisspec'] == 'No' || $data['proisspec'] == 'no' || $data['proisspec'] == '')
          {
            $pro_isspec = 2;
          }

          if ($data['proissize'] == 'Yes' || $data['proissize'] == 'yes')
          {
            $pro_is_size = 0;
          }
          elseif ($data['proissize'] == 'No' || $data['proissize'] == 'no' || $data['proissize'] == '')
          {
            $pro_is_size = 1;
          }

          if ($data['proiscolor'] == 'Yes' || $data['proiscolor'] == 'yes')
          {
            $pro_is_color = 0;
          }
          elseif ($data['proiscolor'] == 'No' || $data['proiscolor'] == 'no' || $data['proiscolor'] == '')
          {
            $pro_is_color = 1;
          }

          if ($pro_isspec == 1 && $data['specificationgroup'] == '')
          {
            $errorArr[].= 'Specification Group is Must for ' . $pro_title . '';
            $error++;
          }

          if ($pro_isspec == 1 && $data['specification'] == '')
          {
            $errorArr[].= 'Specification is Must for ' . $pro_title . '';
            $error++;
          }

          if ($pro_isspec == 1 && $data['specificationtext'] == '')
          {
            $errorArr[].= 'Specification Text is Must for ' . $pro_title . '';
            $error++;
          }
          elseif ($data['specificationgroup'] != '' && $data['specification'] != '')
          {
            if ($pro_isspec == 2)
            {
              $errorArr[].= 'Wrong Specification Status is choosen for ' . $pro_title . '';
              $error++;
            }
            else
            {
              $specgroupArr = explode(',', $data['specificationgroup']);
              $specificationArr = explode(',', $data['specification']);
              if ($data['specificationtext'] != '')
              {
                $specification_textArr = explode('*', $data['specificationtext']);
              }
              else
              {
                $specification_textArr = array();
              }

              if (count($specgroupArr) != count($specificationArr))
              {
                $errorArr[].= 'Check Specification Details. There is not correct for ' . $pro_title . '';
                $error++;
              }
              else
              {
                foreach($specgroupArr as $spec_group_val)
                {
                  $specification_group_data = DB::table('nm_spgroup')->where('spg_name', 'like', '' . $spec_group_val . '')->first();
                  if ($specification_group_data == '')
                  {
                    $errorArr[].= 'Wrong Specification Group ' . $spec_group_val . '';
                    $error++;
                  }
                  else
                  {
                    $spec_group_id[] = $specification_group_data->spg_id;
                  }
                }

                if ($error == 0)
                {
                  $i = 0;
                  foreach($specificationArr as $spec_val)
                  {
                    $specification_data = DB::table('nm_specification')->where('sp_name', 'like', '' . $spec_val . '')->where('sp_spg_id', $spec_group_id[$i])->first();
                    if ($specification_data == '')
                    {
                      $errorArr[].= 'Wrong Specification, Check also Specification Group for ' . $spec_val . '';
                      $error++;
                    }
                    else
                    {
                      $specification_group_id[] = $specification_data->sp_spg_id;
                      $specification_id[] = $specification_data->sp_id;
                    }

                    $i++;
                  }
                }
              }
            }
          }

          if ($data['colors'] != '')
          {
            if ($pro_is_color == 1)
            {
              $errorArr[].= 'Wrong Color Status is choosen for ' . $pro_title . '';
              $error++;
            }
            else
            {
              $colorArr = explode(',', $data['colors']);
              foreach($colorArr as $val)
              {
                $color_data = DB::table('nm_color')->where('co_name', 'like', '' . $val . '')->first();
                if ($color_data == '')
                {
                  $errorArr[].= 'Wrong Color ' . $val . '';
                  $error++;
                }
                else
                {
                  $color_id[] = $color_data->co_id;
                }
              }
            }
          }

          if ($data['sizes'] != '')
          {
            if ($pro_is_size == 1)
            {
              $errorArr[].= 'Wrong Size Status is choosen for ' . $pro_title . '';
              $error++;
            }
            else
            {
              $sizeArr = explode(',', $data['sizes']);
              foreach($sizeArr as $size_val)
              {
                $size_data = DB::table('nm_size')->where('si_name', '=', '' . $size_val . '')->first();
                if ($size_data == '')
                {
                  $errorArr[].= 'Wrong Size ' . $size_val . '';
                  $error++;
                }
                else
                {
                  $size_id[] = $size_data->si_id;
                }
              }
            }
          }

          if ($pro_shipping == '')
          {
            $shippamt = 0.00;
            $shipping_type = 1;
          }
          elseif ($pro_shipping != '')
          {
            $shippamt = $pro_shipping;
            $shipping_type = 2;
          }

          $pro_delivery = $data['prodelivery'];
          if ($pro_delivery == "" || $pro_delivery == "0")
          {
            $errorArr[].= 'Delivery Days Is must for ' . $pro_title . '';
            $error++;
            $price_check++;
          }
          elseif (!is_numeric($pro_delivery))
          {
            $errorArr[].= 'Delivery Days Should Be Number for ' . $pro_title . '';
            $error++;
          }

          $pro_qty = $data['proqty'];
          if ($pro_qty == "" || $pro_qty == "0")
          {
            $errorArr[].= 'Product Quantity Is Must For ' . $pro_title . '';
            $error++;
          }
          elseif (!is_numeric($pro_qty))
          {
            $errorArr[].= 'Product quantity Should Be Number for ' . $pro_title . '';
            $error++;
          }

          $cash_pack = 0;
          $cash_pack = $data['cashpack'];
          if ($cash_pack == "")
          {
            $cash_pack = 0;
          }
          elseif (!is_numeric($cash_pack))
          {
            $errorArr[].= 'Product Cash Back Should Be Number for ' . $pro_title . '';
            $error++;
          }

          $pro_mkeywords = $data['metakeyword'];
          $pro_mdesc = $data['metadescription'];
          $shippingamt = $data['shippingamt'];
          if (isset($data['imageurl1']) && $data['imageurl1'] != '')
          {
            $video_image_url_1 = "product-bulk-upload/" . $data['imageurl1'];
          }
          else
          {
            $video_image_url_1 = '';
          }

          if (isset($data['imageurl2']) && $data['imageurl2'] != '')
          {
            $video_image_url_2 = "product-bulk-upload/" . $data['imageurl2'];
          }
          else
          {
            $video_image_url_2 = '';
          }

          if (isset($data['imageurl3']) && $data['imageurl3'] != '')
          {
            $video_image_url_3 = "product-bulk-upload/" . $data['imageurl3'];
          }
          else
          {
            $video_image_url_3 = '';
          }

          if (isset($data['imageurl4']) && $data['imageurl4'] != '')
          {
            $video_image_url_4 = "product-bulk-upload/" . $data['imageurl4'];
          }
          else
          {
            $video_image_url_4 = '';
          }

          if (isset($data['imageurl5']) && $data['imageurl5'] != '')
          {
            $video_image_url_5 = "product-bulk-upload/" . $data['imageurl5'];
          }
          else
          {
            $video_image_url_5 = '';
          }

          /*---------------------------------------*/
          if ($video_image_url_1 != '')
          {
            if (strpos($video_image_url_1, '.jpg') == true || strpos($video_image_url_1, '.jpeg') == true || strpos($video_image_url_1, '.png') == true || $video_image_url_1 != '')
            {
              $url_Arr = explode('/', $video_image_url_1);
              $image_name = end($url_Arr);

              // echo basename($video_image_url_1);

              if (@getimagesize($video_image_url_1))
              {
                $size = getimagesize($video_image_url_1);
              }
              else
              {
                $size = array();
                $error++;
                $errorArr[].= 'Image file does not exsist. Give Correct image Path for ' . $data['protitle'] . '';
              }

              if (count($size) > 0 && $size[0] != '800' && $size[1] != '800')
              {
                $error++;
                $errorArr[].= 'Invalid Image Size. Need width800px , height 800px ' . $data['protitle'] . '';
              }
            }
            else
            {
              $error++;
              $errorArr[].= 'Invalid File URL ' . $data['protitle'] . '';
            }
          }

          /*---------------------------------------*/
          if ($video_image_url_2 != '')
          {
            if (strpos($video_image_url_2, '.jpg') == true || strpos($video_image_url_2, '.jpeg') == true || strpos($video_image_url_2, '.png') == true)
            {
              $url_Arr = explode('/', $video_image_url_2);
              $image_name = end($url_Arr);
              if (@getimagesize($video_image_url_2))
              {
                $size = getimagesize($video_image_url_2);
              }
              else
              {
                $size = array();
                $error++;
                $errorArr[].= 'Image file does not exsist. Give Correct image Path for ' . $data['protitle'] . '';
              }

              if (count($size) > 0 && $size[0] != '800' && $size[1] != '800')
              {
                $error++;
                $errorArr[].= 'Invalid Image Size. Need width 800px , height 800px ' . $data['protitle'] . '';
              }
            }
            else
            {
              $error++;
              $errorArr[].= 'Invalid File URL ' . $data['protitle'] . '';
            }
          }

          /*-------------------------------------------------------------*/
          if ($video_image_url_3 != '')
          {
            if (strpos($video_image_url_3, '.jpg') == true || strpos($video_image_url_3, '.jpeg') == true || strpos($video_image_url_3, '.png') == true)
            {
              $url_Arr = explode('/', $video_image_url_3);
              $image_name = end($url_Arr);
              if (@getimagesize($video_image_url_3))
              {
                $size = getimagesize($video_image_url_3);
              }
              else
              {
                $size = array();
                $error++;
                $errorArr[].= 'Image file does not exsist. Give Correct image Path for ' . $data['protitle'] . '';
              }

              if (count($size) > 0 && $size[0] != '800' && $size[1] != '800')
              {
                $error++;
                $errorArr[].= 'Invalid Image Size. Need width 800px , height 800px ' . $data['protitle'] . '';
              }
            }
            else
            {
              $error++;
              $errorArr[].= 'Invalid File URL ' . $data['protitle'] . '';
            }
          }

          /*-------------------------------------------------------------*/
          if ($video_image_url_4 != '')
          {
            if (strpos($video_image_url_4, '.jpg') == true || strpos($video_image_url_4, '.jpeg') == true || strpos($video_image_url_4, '.png') == true)
            {
              $url_Arr = explode('/', $video_image_url_4);
              $image_name = end($url_Arr);
              if (@getimagesize($video_image_url_4))
              {
                $size = getimagesize($video_image_url_4);
              }
              else
              {
                $size = array();
                $error++;
                $errorArr[].= 'Image file does not exsist. Give Correct image Path for ' . $data['protitle'] . '';
              }

              if (count($size) > 0 && $size[0] != '800' && $size[1] != '800')
              {
                $error++;
                $errorArr[].= 'Invalid Image Size. Need width 800px , height 800px ' . $data['protitle'] . '';
              }
            }
            else
            {
              $error++;
              $errorArr[].= 'Invalid File URL ' . $data['protitle'] . '';
            }
          }

          /*-------------------------------------------------------------*/
          if ($video_image_url_5 != '')
          {
            if (strpos($video_image_url_5, '.jpg') == true || strpos($video_image_url_5, '.jpeg') == true || strpos($video_image_url_5, '.png') == true)
            {
              $url_Arr = explode('/', $video_image_url_5);
              $image_name = end($url_Arr);
              if (@getimagesize($video_image_url_5))
              {
                $size = getimagesize($video_image_url_5);
              }
              else
              {
                $size = array();
                $error++;
                $errorArr[].= 'Image file does not exsist. Give Correct image Path for ' . $data['protitle'] . '';
              }

              if (count($size) > 0 && $size[0] != '800' && $size[1] != '800')
              {
                $error++;
                $errorArr[].= 'Invalid Image Size. Need width 800px , height 800px ' . $data['protitle'] . '';
              }
            }
            else
            {
              $error++;
              $errorArr[].= 'Invalid File URL ' . $data['protitle'] . '';
            }
          }

          /* Sathyaseelan === policy-start */
          $allow_cancel = $allow_return = $allow_replace = $cancel_policy = $return_policy = $replace_policy = $cancel_days = $return_days = $replace_days = "";
          if (ucfirst(strtolower($data['cancelpolicy'])) == 'Yes')
          {
            $allow_cancel = 1;
          }
          elseif (ucfirst(strtolower($data['cancelpolicy'])) == 'No' || $data['cancelpolicy'] == '')
          {
            $allow_cancel = 0;
          }

          if (($allow_cancel == 1) && ($data['canceldays'] == ''))
          {
            $errorArr[].= 'Cancelation days is must for ' . $pro_title . '';
            $error++;
            $data['canceldays'] = 0;
          }
          elseif (($allow_cancel == 1) && (!is_numeric($data['canceldays'])))
          {
            $errorArr[].= 'Cancelation days is must be an number for ' . $pro_title . '';
            $error++;
          }
          else
          {
            $cancel_days = $data['canceldays'];
          }

          if (ucfirst(strtolower($data['returnpolicy'])) == 'Yes')
          {
            $allow_return = 1;
          }
          elseif (ucfirst(strtolower($data['returnpolicy'])) == 'No' || $data['returnpolicy'] == '')
          {
            $allow_return = 0;
          }

          if (($allow_return == 1) && ($data['returndays'] == ''))
          {
            $errorArr[].= 'Return days is must for ' . $pro_title . '';
            $error++;
            $data['returndays'] = 0;
          }
          elseif (($allow_return == 1) && (!is_numeric($data['returndays'])))
          {
            $errorArr[].= 'return days is must be an number for ' . $pro_title . '';
            $error++;
          }
          else
          {
            $return_days = $data['returndays'];
          }

          if (ucfirst(strtolower($data['replacementpolicy'])) == 'Yes')
          {
            $allow_replace = 1;
          }
          elseif (ucfirst(strtolower($data['replacementpolicy'])) == 'No' || $data['replacementpolicy'] == '')
          {
            $allow_replace = 0;
          }

          if (($allow_replace == 1) && ($data['replacementdays'] == ''))
          {
            $errorArr[].= 'Replacement days is must for ' . $pro_title . '';
            $error++;
            $data['replacedays'] = 0;
          }
          elseif (($allow_replace == 1) && (!is_numeric($data['replacementdays'])))
          {
            $errorArr[].= 'Replacement days is must be an number for ' . $pro_title . '';
            $error++;
          }
          else
          {
            $replace_days = $data['replacementdays'];
          }

          if ($allow_cancel == 1 AND $data['cancelpolicydescription'] == "")
          {
            $errorArr[].= 'Cancelation Policy is must for ' . $pro_title . '';
            $error++;
          }
          else
          {
            $cancel_policy = $data['cancelpolicydescription'];
          }

          if ($allow_return == 1 AND $data['returnpolicydescription'] == "")
          {
            $errorArr[].= 'Return Policy is must for ' . $pro_title . '';
            $error++;
          }
          else
          {
            $return_policy = $data['returnpolicydescription'];
          }

          if ($allow_replace == 1 AND $data['replacementpolicydescription'] == "")
          {
            $errorArr[].= 'Replacement Policy is must for ' . $pro_title . '';
            $error++;
          }
          else
          {
            $replace_policy = $data['replacementpolicydescription'];
          }

          /* Sathyaseelan === Policy Close */
          if ($error > 0)
          {
            Session::flash('message', $errorArr);

            // return Redirect('mer_product_bulk_upload');

          }
          else
          {
            $insertArr = array(
              'pro_title' => $pro_title,
              'pro_mc_id' => $pro_mc_id,
              'pro_smc_id' => $pro_smc_id,
              'pro_sb_id' => $pro_sb_id,
              'pro_ssb_id' => $pro_ssb_id,
              'pro_price' => $pro_price,
              'pro_disprice' => $pro_disprice,
              'pro_desc' => $pro_desc,
              'pro_isspec' => $pro_isspec,
              'pro_is_size' => $pro_is_size,
              'pro_is_color' => $pro_is_color,
              'pro_delivery' => $pro_delivery,
              'pro_qty' => $pro_qty,
              'cash_pack' => $cash_pack,
              'created_date' => date('Y-m-d') ,
              'pro_mr_id' => $mer_id,
              'allow_cancel' => $allow_cancel,
              'allow_return' => $allow_return,
              'allow_replace' => $allow_replace,
              'cancel_policy' => $cancel_policy,
              'return_policy' => $return_policy,
              'replace_policy' => $replace_policy,
              'cancel_days' => $cancel_days,
              'return_days' => $return_days,
              'replace_days' => $replace_days,
              'pro_sh_id' => $store_id,
              'pro_mkeywords' => $pro_mkeywords,
              'pro_mdesc' => $pro_mdesc,
              'pro_shippamt' => $shippingamt,
              'pro_inctax' => $pro_tax
            );
            DB::table('nm_product')->insert($insertArr);
            $last_pro_id = DB::getPdo()->lastInsertId();
            /*-------------------------------------------------------------*/
            /*Color insert*/
            if (isset($color_id) && $color_id != '')
            {
              foreach($color_id as $col_id)
              {
                $color_insertArr = array(
                  'pc_pro_id' => $last_pro_id,
                  'pc_co_id' => $col_id
                );
                DB::table('nm_procolor')->insert($color_insertArr);
              }
            }

            /*size insert*/
            if (isset($size_id) && $size_id != '')
            {
              foreach($size_id as $si_id)
              {
                $size_insertArr = array(
                  'ps_pro_id' => $last_pro_id,
                  'ps_si_id' => $si_id,
                  'ps_volume' => 1
                );
                DB::table('nm_prosize')->insert($size_insertArr);
              }
            }

            /*specification insert*/
            if (isset($specification_group_id) && $specification_group_id != '' && isset($specification_id) && $specification_id != '' && count($specification_textArr) > 0)
            {
              $s = 0;
              foreach($specification_id as $sp_id)
              {
                if (isset($specification_textArr[$s]))
                {
                  $get_spg_id = DB::table('nm_specification')->where('sp_id', $sp_id)->first();
                  $specification_insertArr = array(
                    'spc_pro_id' => $last_pro_id,
                    'spc_spg_id' => $get_spg_id->sp_spg_id,
                    'spc_sp_id' => $sp_id,
                    'spc_value' => $specification_textArr[$s]
                  );
                  DB::table('nm_prospec')->insert($specification_insertArr);
                }

                $s++;
              }
            }
            elseif (isset($specification_group_id) && $specification_group_id != '' && isset($specification_id) && $specification_id != '')
            {
              foreach($specification_id as $sp_id)
              {
                $get_spg_id = DB::table('nm_specification')->where('sp_id', $sp_id)->first();
                $specification_insertArr = array(
                  'spc_pro_id' => $last_pro_id,
                  'spc_spg_id' => $get_spg_id->sp_spg_id,
                  'spc_sp_id' => $sp_id,
                  'spc_value' => ''
                );
                DB::table('nm_prospec')->insert($specification_insertArr);
              }
            }

            $image_insert_arr = array();
            $folder_name = "";
            /*---------------------------------------*/
            if ($video_image_url_1 != '')
            {
              if (strpos($video_image_url_1, '.jpg') == true || strpos($video_image_url_1, '.jpeg') == true || strpos($video_image_url_1, '.png') == true)
              {
                $url_Arr = explode('/', $video_image_url_1);
                $folder_name = $url_Arr[1];
                if (!in_array($folder_name, $folder_array))
                {
                  array_push($folder_array, $folder_name);
                }

                $image_name = end($url_Arr);
                $size = getimagesize($video_image_url_1);
                if ($size[0] == '800' && $size[1] == '800')
                {
                  $current_time = time();

                  // copy($video_image_url_1,"public/assets/product/$image_name");

                  if (strpos($video_image_url_1, '.jpg') == true)
                  {
                    $my_server_img = $video_image_url_1;
                    $img = @imagecreatefromjpeg($my_server_img);
                    $path = 'public/assets/product/' . $current_time . $image_name;
                    if ($img)
                    {
                      imagejpeg($img, $path);
                    }
                  }
                  elseif (strpos($video_image_url_1, '.png') == true)
                  {
                    $my_server_img = $video_image_url_1;
                    $img = @imagecreatefrompng($my_server_img);
                    $path = 'public/assets/product/' . $image_name;
                    if ($img)
                    { 
                      imagepng($img, $path);
                    }
                  }

                  array_push($image_insert_arr, $current_time . $image_name . '/**/');
                }
              }
            }

            /*---------------------------------------*/
            if ($video_image_url_2 != '')
            {
              if (strpos($video_image_url_2, '.jpg') == true || strpos($video_image_url_2, '.jpeg') == true || strpos($video_image_url_2, '.png') == true)
              {
                $url_Arr = explode('/', $video_image_url_2);
                $folder_name = $url_Arr[1];
                if (!in_array($folder_name, $folder_array))
                {
                  array_push($folder_array, $folder_name);
                }

                $image_name = end($url_Arr);
                $size = getimagesize($video_image_url_2);
                if ($size[0] == '800' && $size[1] == '800')
                {
                  $current_time = time();

                  // copy($video_image_url_2,"public/assets/product/$image_name");

                  if (strpos($video_image_url_2, '.jpg') == true)
                  {
                    $my_server_img = $video_image_url_2;
                    $img = imagecreatefromjpeg($my_server_img);
                    $path = 'public/assets/product/' . $current_time . $image_name;
                    imagejpeg($img, $path);
                  }
                  elseif (strpos($video_image_url_2, '.png') == true)
                  {
                    $my_server_img = $video_image_url_2;
                    $img = imagecreatefrompng($my_server_img);
                    $path = 'public/assets/product/' . $current_time . $image_name;
                    imagepng($img, $path);
                  }

                  array_push($image_insert_arr, $current_time . $image_name . '/**/');
                }
              }
            }

            /*---------------------------------------*/
            if ($video_image_url_3 != '')
            {
              if (strpos($video_image_url_3, '.jpg') == true || strpos($video_image_url_3, '.jpeg') == true || strpos($video_image_url_3, '.png') == true)
              {
                $url_Arr = explode('/', $video_image_url_3);
                $folder_name = $url_Arr[1];
                if (!in_array($folder_name, $folder_array))
                {
                  array_push($folder_array, $folder_name);
                }

                $image_name = end($url_Arr);
                $size = getimagesize($video_image_url_3);
                if ($size[0] == '800' && $size[1] == '800')
                {
                  $current_time = time();

                  // copy($video_image_url_3,"public/assets/product/$image_name");

                  if (strpos($video_image_url_3, '.jpg') == true)
                  {
                    $my_server_img = $video_image_url_3;
                    $img = imagecreatefromjpeg($my_server_img);
                    $path = 'public/assets/product/' . $current_time . $image_name;
                    imagejpeg($img, $path);
                  }
                  elseif (strpos($video_image_url_3, '.png') == true)
                  {
                    $my_server_img = $video_image_url_3;
                    $img = imagecreatefrompng($my_server_img);
                    $path = 'public/assets/product/' . $current_time . $image_name;
                    imagepng($img, $path);
                  }

                  array_push($image_insert_arr, $current_time . $image_name . '/**/');
                }
              }
            }

            /*---------------------------------------*/
            if ($video_image_url_4 != '')
            {
              if (strpos($video_image_url_4, '.jpg') == true || strpos($video_image_url_4, '.jpeg') == true || strpos($video_image_url_4, '.png') == true)
              {
                $current_time = time();
                $url_Arr = explode('/', $video_image_url_4);
                $folder_name = $url_Arr[1];
                if (!in_array($folder_name, $folder_array))
                {
                  array_push($folder_array, $folder_name);
                }

                $image_name = end($url_Arr);
                $size = getimagesize($video_image_url_4);
                if ($size[0] == '800' && $size[1] == '800')
                {

                  // copy($video_image_url_4,"public/assets/product/$image_name");

                  if (strpos($video_image_url_4, '.jpg') == true)
                  {
                    $my_server_img = $video_image_url_4;
                    $img = imagecreatefromjpeg($my_server_img);
                    $path = 'public/assets/product/' . $current_time . $image_name;
                    imagejpeg($img, $path);
                  }
                  elseif (strpos($video_image_url_4, '.png') == true)
                  {
                    $my_server_img = $video_image_url_4;
                    $img = imagecreatefrompng($my_server_img);
                    $path = 'public/assets/product/' . $current_time . $image_name;
                    imagepng($img, $path);
                  }

                  array_push($image_insert_arr, $current_time . $image_name . '/**/');
                }
              }
            }

            /*---------------------------------------*/
            if ($video_image_url_5 != '')
            {

              // strpos($video_image_url_1, 'youtube') == true

              if (strpos($video_image_url_5, '.jpg') == true || strpos($video_image_url_5, '.jpeg') == true || strpos($video_image_url_5, '.png') == true)
              {
                $url_Arr = explode('/', $video_image_url_5);
                $folder_name = $url_Arr[1];
                if (!in_array($folder_name, $folder_array))
                {
                  array_push($folder_array, $folder_name);
                }

                $image_name = end($url_Arr);
                $size = getimagesize($video_image_url_5);
                if ($size[0] == '800' && $size[1] == '800')
                {
                  $current_time = time();

                  // copy($video_image_url_5,"public/assets/product/$image_name");

                  if (strpos($video_image_url_5, '.jpg') == true)
                  {
                    $my_server_img = $video_image_url_5;
                    $img = imagecreatefromjpeg($my_server_img);
                    $path = 'public/assets/product/' . $current_time . $image_name;
                    imagejpeg($img, $path);
                  }
                  elseif (strpos($video_image_url_5, '.png') == true)
                  {
                    $my_server_img = $video_image_url_5;
                    $img = imagecreatefrompng($my_server_img);
                    $path = 'public/assets/product/' . $current_time . $image_name;
                    imagepng($img, $path);
                  }

                  array_push($image_insert_arr, $current_time . $image_name . '/**/');
                }
              }
            }

            $imgs = "";
            if (!empty($image_insert_arr))
            {
              foreach($image_insert_arr as $images)
              {
                $imgs.= $images;
              }
            }

            $image_insert_arr = array(
              'pro_Img' => $imgs
            );
            DB::table('nm_product')->where('pro_id', $last_pro_id)->update($image_insert_arr);
            /*-----------------------------------------------------*/
            $successArr[].= '' . $data['protitle'] . ' Product Uploaded!';
            Session::flash('success_message', $successArr);
          }
        }
      }
      else
      {
        Session::flash('message', $errorArr);
      }

      if (count($folder_array) > 0)
      {
        foreach($folder_array as $folder_name)
        {
          if ($folder_name != "")
          {
            $path = 'product-bulk-upload/' . $folder_name;
            /* chown($path, 0777); */
            /* first delete all files in folder */
            if (!is_dir($path))
            {
              throw new InvalidArgumentException("$path must be a directory");
            }

            if (substr($path, strlen($path) - 1, 1) != '/')
            {
              $path.= '/';
            }

            $files = glob($path . '*', GLOB_MARK);
            foreach($files as $file)
            {
              if (is_dir($file))
              {
                self::deleteDir($file);
              }
              else
              {
                unlink($file);
              }
            }

            /* close */
            if (rmdir($path))
            {
              /* then delete folder */
              Session::flash('zip_success_message', "Folder deleted successfully!");
            }
            else
            {
              Session::flash('zip_error_message', "Error in deleting folder!!");
            }
          }
        }
      }

      return Redirect('product_bulk_upload');
    }
  }

  public function download_all_products()
  {
    $all_product_deatils = DB::table('nm_product')->Leftjoin('nm_store', 'nm_product.pro_sh_id', '=', 'nm_store.stor_id')->Leftjoin('nm_city', 'nm_store.stor_city', '=', 'nm_city.ci_id')->orderBy('nm_product.pro_id', 'DESC')->where('pro_status', '!=', 2) //which is not deleted
    ->get();

    // echo "<pre>";
    // print_r($all_product_deatils);
    // echo "</pre>";
    //  exit;

    if (count($all_product_deatils) > 0)
    {
      $delimiter = ",";
      $filename = "all_products" . date('Y-m-d') . ".csv";

      // create a file pointer

      $f = fopen('php://memory', 'w');

      // set column headers

      $fields = array(
        'pro_title',
        'merchant email',
        'store name',
        'top category',
        'main category',
        'sub category',
        'second sub category',
        'pro_price',
        'pro_disprice',
        'pro_desc',
        'pro_isspec',
        'specification_group',
        'specification',
        'specification_text',
        'pro_is_colo',
        'colors',
        'pro_delivery',
        'pro_qty',
        'cash_pack',
        'pro_is_size',
        'sizes',
        'meta keyword',
        'meta description',
        'image_url_1',
        'image_url_2',
        'image_url_3',
        ' image_url_4',
        'image_url_5',
        'shippingamt',
        'cancel policy',
        'return policy',
        'replacement policy',
        'cancel policy',
        'description',
        'return policy',
        'description',
        'replacement policy',
        'description',
        'cancel days',
        ' return days',
        'replacement days'
      );
      fputcsv($f, $fields, $delimiter);

      // output each row of the data, format line as csv and write to file pointer

      foreach($all_product_deatils as $row)
      {
        $lineData = array(
          $row->pro_id,
          $row->pro_title,
          $row->pro_mc_id,
          $row->pro_smc_id,
          $row->pro_price,
          $row->pro_status
        );
        fputcsv($f, $lineData, $delimiter);
      }

      // move back to beginning of file

      fseek($f, 0);

      // set headers to download file rather than displayed

      header('Content-Type: text/csv');
      header('Content-Disposition: attachment; filename="' . $filename . '";');

      // output all remaining data on a file pointer

      fpassthru($f);
    }

    exit;
  }
} // class