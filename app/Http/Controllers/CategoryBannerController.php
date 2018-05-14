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
use App\Dashboard;
use App\CategoryBanner;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class CategoryBannerController extends Controller {

	public function __construct(){
        parent::__construct();
        // set admin Panel language
        $this->setLanguageLocaleAdmin();
    }

    public function add_mainmenu_banner(){
		if (Session::has('userid')) {
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
            
            $get_subcategory = CategoryBanner::get_subcategory();
            
            return view('siteadmin.add_categorybanner')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('subcategory', $get_subcategory);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
		
 	} //add_mainmenu_banner

    
    public function add_categorybanner_submit(){
              
       if (Session::has('userid')) {
            
            $date = date('m/d/Y');
            $data = Input::except(array('_token'));

            $subcategory = Input::get('subcategory');

            $check_category_avail = CategoryBanner::check_category_avail($subcategory);   //checking main category is already available or not

            if (count($check_category_avail) > 0) {                                                 //check already exist or not
			if(Lang::has(Session::get('admin_lang_file').'.BACK_ALREADY_EXIST_FOR_THIS_CATEGORY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ALREADY_EXIST_FOR_THIS_CATEGORY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ALREADY_EXIST_FOR_THIS_CATEGORY');
			}	
                return Redirect::to('add_categorybanner')->with('message', $session_message);      //if aledy exist redirect back
           
            }else {   
                $field_values_array = Input::file('file');
                $count = count($field_values_array);
                                                                               // else insert the banner into databse
                $rules = array('file' => 'mimes:png,jpeg,jpg');                     //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                for ($i=0; $i < $count; $i++)
				{
				$file = $field_values_array[$i];
				$input = array(
				'category_banner' => $field_values_array[$i]
				);
			$rules = array(
			'category_banner' => 'required|image|mimes:jpeg,png,jpg|image_size:'.$this->category_banner_width.','.$this->category_banner_height.''
				);
				$validator = Validator::make($input, $rules);
			}		
			if ($validator->fails())
			{
				return Redirect::to('add_categorybanner')->withErrors($validator->messages())->withInput();
			}
                else{
                
                $filename_new_get = "";
                $i=1;
                
                foreach($field_values_array as $value){
                    //your Image Upload into directory goes here
                    
                    $time=time();    
                
                    $filename_new = 'Category_banner_'.$time.'_' . $value->getClientOriginalName();
               
                    $newdestinationPath = './public/assets/banner/';
                
                    Image::make($value)->save('./public/assets/banner/'.$filename_new,$this->image_compress_quality);
                    $filename_new_get .= $filename_new . "/**/";
                }
                for($j=$count; $j<3; $j++){                      // if there is no file take a count and set as empty ''./**/ using for loop
                    $filename_new_get .= ''."/**/";             // concatenating the empty with the file already set eg:(ad1_1.jpg/**//**/**/)
                } 
                                  
                 $entry = array(
                'cat_bn_maincat_id' => $subcategory,
                'cat_bn_img'=>$filename_new_get
                 );

               $insert = CategoryBanner::insert_category_banner($entry);
               if($insert){ 
			   if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
				{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
				}	
                   return Redirect::to('manage_category_banner')->with('success',$session_message);
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
                   return Redirect::to('add_categorybanner')->with('error',$session_message)->withInput();
               }   

              } //validation  ok (else)
            } //check availability else
            
		} else {    //session
            return Redirect::to('siteadmin');
        }
		
	}// add banner


    public function manage_category_banner()
    {
  	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$mnge_banner = CategoryBanner::view_category_banner_list();
    $mnge_banner->setPath('manage_category_banner');
      return view('siteadmin.manage_category_banner')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('mnge_banner', $mnge_banner);	
    }
	else
	{
	    return Redirect::to('siteadmin');
	}	
    } //manage category banner

    public function delete_category_banner($id)
    {
  	    if(Session::has('userid'))
	    {
            $return = CategoryBanner::delete_category_banner($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}	
	        return Redirect::to('manage_category_banner')->with('success',$session_message);
        }
	    else
	    {
            return Redirect::to('siteadmin');
	    }	
    } //delete category banner

    public function status_category_banner($id,$status){
        if(Session::has('userid')){   
            
	        $return = CategoryBanner::status_category_banner($id,$status);
            if ($status == 0) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}	
                return Redirect::to('manage_category_banner')->with('success', $session_message);
            }else if ($status == 1) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}	
                return Redirect::to('manage_category_banner')->with('success', $session_message);
            }
	    }else{
	        return Redirect::to('siteadmin');
	    }	
    }//status category banner

   public function edit_category_banner($id){
        if(Session::has('userid'))
	    { 
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}	
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);	
	        $adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	        $adminfooter = view('siteadmin.includes.admin_footer');
	        $banner_detail = CategoryBanner::edit_category_banner($id);     //to get category banner details to display
            $subcategory = CategoryBanner::get_subcategory();
	        return view('siteadmin.edit_category_banner')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('banner_detail', $banner_detail)->with('subcategory',$subcategory);	
	    }
	    else
	    {
	        return Redirect::to('siteadmin');
	    }
   } //edit category banner

   public function delete_cat_img($id,$image){
        if(Session::has('userid'))
	    { 
            $data = Input::except(array('_token'));

            $return = CategoryBanner::delete_cat_img($id,$image);
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

   public function edit_category_banner_submit(Request $request){
       if(Session::has('userid')){

	       $data = Input::except(array('_token'));
           $cat_bn_id     = $request->input('cat_bn_id');           // primary id
           $sub_cat_id    = $request->input('sub_cat_id');          // hidden sub cat id 
           $subcategory   = $request->input('subcategory');         // sub category of advetisement (dropdown)
           $check_category_exist = CategoryBanner::check_subcategory_exist($cat_bn_id,$subcategory);   //checking main category is already available or not

           if ($check_category_exist==1) {                                                 //check already exist or not
		   if(Lang::has(Session::get('admin_lang_file').'.BACK_ALREADY_EXIST_FOR_THIS_CATEGORY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ALREADY_EXIST_FOR_THIS_CATEGORY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ALREADY_EXIST_FOR_THIS_CATEGORY');
			}	
                return Redirect::back()->with('message',$session_message);      //if aledy exist redirect back
          }
		  $field_values_array = $request->file('file'); 
		  
		   $count = count($field_values_array);
            for ($i=0; $i < $count; $i++)
			{
				if($field_values_array[$i] !='')
				{
					$file = $field_values_array[$i];
					$input = array(
					'category_banner' => $field_values_array[$i]
					);
					$rules = array(
						'category_banner' => 'required|image|mimes:jpeg,png,jpg|image_size:'.$this->category_banner_width.','.$this->category_banner_height.''
					);
					$validator = Validator::make($input, $rules);
				
				if ($validator->fails())
				{
					return Redirect::to('edit_category_banner/'.$cat_bn_id)->withErrors($validator->messages())->withInput();
				}
				}
			}
		   
             /*   $filename_new_get = "";
                $j=1;

                $file_get      = $request->input('file_get');            // (cat_ad_img => image field ) getting from edit advertisement page as hidden input
                $file_get_path =  explode("**",$file_get,-1);          // explode that array of file names
                $field_values_array = $request->file('file');            // getting image files
                            
				$k=0;
				if(count($field_values_array) > 0){
                foreach($field_values_array as $value){                   //your Image Upload into directory goes here
                    $a = $j++;                                          // $j is for calculation position of images
                    if(isset($value)){                                   // if there is a file get into the loop
                            
                             $Banner_name   = 'banner'.$subcategory.'_'.($a).'.'.$value->getClientOriginalExtension();      // renameing the image

                             $move_more_img = explode('.', $Banner_name);
                
                             $time=time();
                             $filename_new = 'Category_banner_'.$time.'_' . $value->getClientOriginalName();
               
                             $newdestinationPath = './public/assets/banner/';
                
                             Image::make($value)->save('./public/assets/banner/'.$filename_new,$this->image_compress_quality);// moving the image to directory
								
							$old_cate_banner = Input::get('image_name');
							
							 if(file_exists($newdestinationPath.$old_cate_banner[$k]))
							 {
								@unlink($newdestinationPath.$old_cate_banner[$k]);
							 }	
								
                             $filename_new_get.= $filename_new . "**";                                                // concatenating the new files 
                            
                    }   //isset value
                    else {                                                  // else there is no image is set it comes here
              
                        if(($sub_cat_id!=$subcategory)&&(($file_get_path[$a-1])!=NULL)){
                        
                            $dir = './public/assets/banner/'.$file_get_path[$a-1];
                            $path_parts = pathinfo($dir);
                            $filename_new = 'banner'.$subcategory.'_'.($a).'.'.$path_parts['extension'];
                            $newname = "public/assets/banner/".$filename_new;
                            $rename = rename ($dir, $newname);
                            $filename_new_get.= $filename_new . "**";  

                        }else{
                           $filename_new_get.= $file_get_path[$a-1]. "**";   // now here we are concatenating the old image name
                        } //else
                    } //else 
						$k++;
                } //foreach                                                // so that now we concatenate all the images
				}
				else
				{
					$filename_new_get.= $file_get; 
				}*/
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
					$filename_new = 'Category_banner_'.time().'_'.rand(10,100).'.' .strtolower($ext);
					$newdestinationPath = './public/assets/banner/';
					Image::make($tmpFilePath)->save($newdestinationPath.$filename_new,$this->image_compress_quality); 
					$old_cate_adv = Input::get('image_name');

					if(file_exists($newdestinationPath.$old_cate_adv[$i]))
					{
						@unlink($newdestinationPath.$old_cate_adv[$i]);
					}
					$filename_new_get.= $filename_new . "/**/";    
				}
			}
          $array=array('cat_bn_img'=>$filename_new_get,'cat_bn_maincat_id'=>$subcategory);

          $return = CategoryBanner::edit_banner_submit($cat_bn_id,$array);
		  if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}	
          return Redirect::to('manage_category_banner')->with('success',$session_message);
        
        //else for availability check

      }else{
            return Redirect::to('siteadmin');
      } //session
       
	    
   } //edit_category_banner_submit


   //Save Edited Image
    public function CropNdUpload_catBanner(){
       
        $data = Input::except(array(
                '_token'
            ));
       // print_r($data);exit();
        $product_id     = Input::get('product_id');
        $img_id         = Input::get('img_id');
        $imgfileName    = Input::get('imgfileName'); //old image file name

        $imageData 		= Input::get('base64_imgData');
        $img_dat 		= explode(',',Input::get('base64_imgData'));
        $new_name 		= 'Category_banner_'.time().rand().'.jpg';

        //$imge =  file_put_contents('public/assets/banner/'.$new_name, base64_decode($img_dat[1]));
        $imageData 		= base64_decode($img_dat[1]);

        $file_path = './public/assets/banner/'.$new_name;
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
        if(file_exists('public/assets/banner/'.$new_name)){

            //upload small image
            list($width,$height)=getimagesize('public/assets/banner/'.$new_name);     
            

            //unlink old files starts
            if(file_exists('public/assets/banner/'.$imgfileName))
                unlink("public/assets/banner/".$imgfileName);
            //unlink old files ends

			//update in image table 
            $banner_detail = CategoryBanner::edit_category_banner($product_id); 

            if(count($banner_detail)>0){
                foreach ($banner_detail as $prd) {
                    
                }
                $prod_imgAr = explode('/**/', $prd->cat_bn_img);
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

             $entry = array('cat_bn_img' => $prod_img );

            $return = CategoryBanner::edit_banner_submit($product_id,$entry);

            if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
             return Redirect::to('edit_category_banner/'.$product_id)->with('block_message', $session_message);
        }

        exit();
    }
    /* Image  Crop , rorate and mamipulation ends */
    
}  //class