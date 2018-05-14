<?php
namespace App\Http\Controllers;
use DB;
use File;
use Session;
use Storage;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Footer;
use App\Settings;
use Lang;
use App\AdvertisementModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
class AdvertisementController extends Controller {
	public function __construct(){
        parent::__construct();
        // set admin Panel language
        $this->setLanguageLocaleAdmin();
    }
	
  public function add_advertisement(){      //send contents to view page
    if(Session::has('userid')){
	    $data =  Input::except(array('_token')) ;
		if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}	
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter = view('siteadmin.includes.admin_footer');
            $subcategory = AdvertisementModel::get_subcategory();
            return view('siteadmin.add_advertisement')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('subcategory', $subcategory);
    }else {
        return Redirect::to('siteadmin');
    }

  }  // add advertisement

	public function add_advertisement_submit(){       //after submiting the form
		if(Session::has('userid')){
			$data =  Input::except(array('_token')) ;
			$subcategory = Input::get('subcategory');
			$check_subcategory_avail = AdvertisementModel::check_subcategory_avail($subcategory);

			if (count($check_subcategory_avail) > 0 ) 
			{   
				//check already exist or not
				if(Lang::has(Session::get('admin_lang_file').'.BACK_ALREADY_EXIST_FOR_THIS_SUB_CATEGORY')!= '') 
				{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_ALREADY_EXIST_FOR_THIS_SUB_CATEGORY');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ALREADY_EXIST_FOR_THIS_SUB_CATEGORY');
				}	
				return Redirect::to('add_advertisement')->with('message', $session_message);      //if aledy exist redirect back
			}else {
				$field_values_array = Input::file('file');
				$count = count($field_values_array);
				for ($i=0; $i < $count; $i++)
				{
					$file = $field_values_array[$i];
					$input = array('category_advertisment' => $field_values_array[$i]);
					$rules = array('category_advertisment' => 'sometimes|image|mimes:jpeg,png,jpg|image_size:'.$this->category_advertisment_width.','.$this->category_advertisment_height.'');
					$validator = Validator::make($input, $rules);
				}		
				if ($validator->fails())
				{ 
					return Redirect::to('add_advertisement')->withErrors($validator->messages())->withInput();
				}
				else{

					$filename_new_get = "";
					$i=1;

					foreach($field_values_array as $value){
						//your Image Upload into directory goes here
						$time=time().'_'.rand(10,100);                   
						$filename_new = 'Category_advertisment'.$time.'.' . strtolower($value->getClientOriginalExtension());
						//$newdestinationPath = './public/assets/advertisement/';
						Image::make($value)->save('./public/assets/advertisement/'.$filename_new,$this->image_compress_quality);
						$filename_new_get .= $filename_new . "/**/";
					}
					for($j=$count; $j<3; $j++){                      // if there is no file take a count and set as empty ''./**/ using for loop
						$filename_new_get .= ''."/**/";             // concatenating the empty with the file already set eg:(ad1_1.jpg/**//**/**/)
					} 

					$entry = array('cat_ad_maincat_id' => $subcategory,'cat_ad_img'=> $filename_new_get);

					$insert = AdvertisementModel::insert_advertisement($entry);
					if($insert){ 
						if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
						{ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
						}  
						else 
						{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
						}	
						return Redirect::to('manage_advertisement')->with('success',$session_message);
					}
					else{ 
						if(Lang::has(Session::get('admin_lang_file').'.BACK_INSERTION_FAILED_DUE_TO_SOME_ERROR')!= '') 
						{ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_INSERTION_FAILED_DUE_TO_SOME_ERROR');
						}  
						else 
						{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_INSERTION_FAILED_DUE_TO_SOME_ERROR');
						}	
						return Redirect::to('add_advertisement')->with('error',$session_message)->withInput();
					}   //else

				} //validation  ok (else)

			}//check availability else

		}else {
			return Redirect::to('siteadmin');
		}
	} // add advertisement submit

  public function manage_advertisement(){
    
  	    if(Session::has('userid')){
	        $adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	        $adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	        $adminfooter = view('siteadmin.includes.admin_footer');
            $mnge_banner = AdvertisementModel::view_advertisement_list();
            $mnge_banner->setPath('manage_advertisement');
            return view('siteadmin.manage_advertisement')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('mnge_banner', $mnge_banner);	
        }
	    else{
	        return Redirect::to('siteadmin');
	    }	
    } //manage category banner
  
  public function status_advertisement_banner($id,$status){
      if(Session::has('userid')){
            $return = AdvertisementModel::status_advertisement_banner($id,$status);
            if ($status == 0) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}	
                return Redirect::to('manage_advertisement')->with('success',$session_message);
            }else if ($status == 1) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}		
                return Redirect::to('manage_advertisement')->with('success',$session_message );
            }
	  }else{
            return Redirect::to('siteadmin');
      }
  } //status ad banner

  public function delete_advertisement_banner($id) //full banner
    {
  	    if(Session::has('userid')){
	        $return = AdvertisementModel::delete_advertisement_banner($id);
		if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}	
	        return Redirect::to('manage_advertisement')->with('success',$session_message);
        }
	    else{
	        return Redirect::to('siteadmin');
	    }	
    } //delete category banner

    public function edit_advertisement($id){    //to display datas in edit page
        if(Session::has('userid'))
	    {   
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	        $adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	        $adminfooter = view('siteadmin.includes.admin_footer');
	        $banner_detail = AdvertisementModel::edit_advertisement($id);     //to get subcategory advertisement details to display
            $get_subcategory = AdvertisementModel::get_subcategory();
            
            return view('siteadmin.edit_advertisement')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('banner_detail', $banner_detail)->with('subcategory',$get_subcategory);	
	    }
	    else
	    {
	        return Redirect::to('siteadmin');
	    }
   } //edit category banner

   public function delete_ad_img($id,$image){   // remove specific single image in edit advertisement
        if(Session::has('userid'))
	    { 
            $data = Input::except(array('_token'));
            $return = AdvertisementModel::delete_ad_img($id,$image);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_REMOVED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_REMOVED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_REMOVED_SUCCESSFULLY');
			}	
            return Redirect::back()->with('message',$session_message);

        }else {
             return Redirect::to('siteadmin');
        }
   }
   
	public function edit_advertisement_submit(Request $request){       // update image in edit page
		if(Session::has('userid')){
			$data = Input::except(array('_token'));
			$cat_ad_id     = $request->input('cat_ad_id');           // primary id
			$sub_cat_id = $request->input('sub_cat_id');             // hidden sub cat id 
			$subcategory   = $request->input('subcategory');         // sub category of advetisement (dropdown)
			$check_category_exist = AdvertisementModel::check_subcategory_exist($cat_ad_id,$subcategory);   // while editing if user change the sub category it will check with database
			//checking main category is already available or not
			if ($check_category_exist==1) {                           // if that changed category alerdy exsits in that table it returns count (1) 
				if(Lang::has(Session::get('admin_lang_file').'.BACK_ALREADY_EXIST_FOR_THIS_CATEGORY')!= '') 
				{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_ALREADY_EXIST_FOR_THIS_CATEGORY');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ALREADY_EXIST_FOR_THIS_CATEGORY');
				}	
				return Redirect::back()->with('message', $session_message);      //if aledy exist redirect back
			}
			
			$field_values_array = $request->file('file'); 
			$count = count($field_values_array);
			
			//echo 'mudiyala'.$total;exit;
			for ($i=0; $i < $count; $i++)
			{
				if($field_values_array[$i] !='')
				{
					$file = $field_values_array[$i];
					$input = array('category_advertisment' => $field_values_array[$i]);
					$rules = array('category_advertisment' => 'required|image|mimes:jpeg,png,jpg|image_size:'.$this->category_advertisment_width.','.$this->category_advertisment_height.'');
					$validator = Validator::make($input, $rules);
					if ($validator->fails())
					{
						return Redirect::to('edit_advertisement/'.$cat_ad_id)->withErrors($validator->messages())->withInput();
					}
				}
			}	
			
			/* START BY NAGOOR */
			$total = count($_FILES['file']['name']);
			$filename_new_get = "";
			for($i=0; $i<$total; $i++) {
				$tmpFilePath = $_FILES['file']['tmp_name'][$i];
				if($tmpFilePath=='')
				{
					$filename_new_get.= $_POST['image_name'][$i]. "/**/";    
				}
				else
				{
					$uploadedFileName = $_FILES['file']['name'][$i];
					$ext = end((explode(".", $uploadedFileName))); 
					$time=time().'_'.rand(10,100);
					$filename_new = 'Category_advertisment_'.time().'_'.rand(10,100).'.' .strtolower($ext);
					$newdestinationPath = './public/assets/advertisement/';
					Image::make($tmpFilePath)->save($newdestinationPath.$filename_new,$this->image_compress_quality); 
					$old_cate_adv = Input::get('image_name');

					if(file_exists($newdestinationPath.$old_cate_adv[$i]))
					{
						@unlink($newdestinationPath.$old_cate_adv[$i]);
					}
					$filename_new_get.= $filename_new . "/**/";    
				}
			}
			                                                    // so that now we concatenate all the images
			$array=array('cat_ad_img'=>$filename_new_get,'cat_ad_maincat_id'=>$subcategory);

			$return = AdvertisementModel::edit_advertisement_submit($cat_ad_id,$array);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}	  
			return Redirect::to('manage_advertisement')->with('success',$session_message);

			// else for availabilty check

		}else{
			return Redirect::to('siteadmin');
		} //session
	}  // edit_advertisement_submit

	//Save Edited Image
    public function CropNdUpload_ad(){
       
        $data = Input::except(array(
                '_token'
            ));
       // print_r($data);exit();
        $product_id     = Input::get('product_id');
        $img_id         = Input::get('img_id');
        $imgfileName    = Input::get('imgfileName'); //old image file name

        $imageData 		= Input::get('base64_imgData');
        $img_dat 		= explode(',',Input::get('base64_imgData'));
        $new_name 		= 'Category_advertisment_'.time().rand().'.jpg';

        //$imge =  file_put_contents('public/assets/advertisement/'.$new_name, base64_decode($img_dat[1]));
        $imageData 		= base64_decode($img_dat[1]);

        $file_path = './public/assets/advertisement/'.$new_name;
        //Upload image with compression
        $img = Image::make(imagecreatefromstring($imageData))->save($file_path);
        //jpg background color black remove
        list($width, $height) = getimagesize($file_path);
        $output = imagecreatetruecolor($width, $height);
        $white = imagecolorallocate($output,  255, 255, 255);
        imagefilledrectangle($output, 0, 0, $width, $height, $white);
        imagecopy($output, imagecreatefromstring($imageData), 0, 0, 0, 0, $width, $height);
        imagejpeg($output, $file_path);
        //image compression
        $img = Image::make($output)->save($file_path,$this->image_compress_quality);
        if(file_exists('public/assets/advertisement/'.$new_name)){

            //upload small image
            list($width,$height)=getimagesize('public/assets/advertisement/'.$new_name);     
            

            //unlink old files starts
            if(file_exists('public/assets/advertisement/'.$imgfileName))
                unlink("public/assets/advertisement/".$imgfileName);
            //unlink old files ends

			//update in image table 
            $banner_detail = AdvertisementModel::edit_advertisement($product_id);

            if(count($banner_detail)>0){
                foreach ($banner_detail as $prd) {
                    
                }
                $prod_imgAr = explode('/**/', $prd->cat_ad_img);
                if(in_array($imgfileName,$prod_imgAr))
                {    
                    $key = array_search($imgfileName,$prod_imgAr);
                    $prod_imgAr[$key] = $new_name;
                }else {
                    $key = count($prod_imgAr);
                    $prod_imgAr[$key] = $new_name;
                }
                $prod_img = implode('/**/',$prod_imgAr);  
            }else{
                $prod_img = $new_name.'/**/';
            }

             $entry = array('cat_ad_img' => $prod_img );

            
            $return = AdvertisementModel::edit_advertisement_submit($product_id,$entry);

            if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
             return Redirect::to('edit_advertisement/'.$product_id)->with('block_message', $session_message);
        }

        exit();
    }
    /* Image  Crop , rorate and mamipulation ends */

public function block_ad_multiple()
{
	
	 if (Session::has('userid'))
        {
			
         $data=Input::get('val');
         $status=1;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $array=array('stor_status' => 1); 
			  $block_Advertisement_admin=AdvertisementModel::ad_multiple($id, $status);	
             
                   }
            if($block_Advertisement_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }
}

public function unblock_ad_multiple()
{
	 if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=0;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $array=array('stor_status' => 0);
           $unblock_Advertisement_admin=AdvertisementModel::ad_multiple($id, $status);			  
              
            
                   }
            if($unblock_Advertisement_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        } 
}
}  //class
?>