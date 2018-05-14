<?php
namespace App\Http\Controllers;
use DB;
use Session;
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
use App\Customer;
use App\Bannerset;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
class BannerController extends Controller {
       
       /*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function __construct(){
        parent::__construct();
        // set admin Panel language
        $this->setLanguageLocaleAdmin();
    }
    
    public function add_banner_image()
    {
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
	return view('siteadmin.add_banner')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }

    public function manage_banner_image()
    {
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
	$mnge_banner = Bannerset::view_banner_list();
	return view('siteadmin.manage_banner')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('mnge_banner', $mnge_banner);	
        }
	else
	{
	return Redirect::to('siteadmin');
	}	
    }
	
    public function edit_banner_image($id)
    {
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
	$banner_detail = Bannerset::banner_detail($id);
	return view('siteadmin.edit_banner')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('banner_detail', $banner_detail);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }

    public function status_banner_submit($id,$status){
    	if(Session::has('userid')){
			$return = Bannerset::status_banner($id,$status);
			if ($status == 0) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}	
                return Redirect::to('manage_banner_image')->with('success',$session_message);
            }else if ($status == 1) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}		
                return Redirect::to('manage_banner_image')->with('success', $session_message);
            }
		}else{
			return Redirect::to('siteadmin');
		}	
    }

    public function delete_banner_submit($id)
    {
  	if(Session::has('userid'))
	{
	$return = Bannerset::delete_banner($id);
	if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}	
	return Redirect::to('manage_banner_image')->with('success',$session_message);
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }

    public function add_banner_submit()
    {
	if(Session::has('userid'))
	{
	$data = Input::except(array('_token')) ;

	$get_active_lang = 	Home::get_active_lang();
	
	$rule = array(
	'banner_title' => 'required',
	'banner_redirect_url' => 'required' ,
	'bn_img'	   => 'mimes:png,jpg,jpeg,gif',
	);
	
	if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'banner_title_'.$get_lang_name => 'required',
					); 
			
					$rule  = array_merge($rule,$lang_rule);
				}
			}
			
	//echo Input::get('banner_redirect_url');
	//exit();
	
	$validator = Validator::make($data,$rule);			
	if ($validator->fails())
	{
	return Redirect::to('add_banner_image')->withErrors($validator->messages())->withInput();
	}
	else
	{
		
	$inputs = Input::all();
	$bn_slider_position = Input::get('slider_position');
	
	$file = Input::file('file');
	$img_data = getimagesize(Input::file('file'));
	
	if(($img_data[0] > "870" || $img_data[1] > "350") && ($bn_slider_position=='1')) 
	{
	if(Lang::has(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_870_X_350_PIXELS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_870_X_350_PIXELS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_870_X_350_PIXELS');
			}	
	return Redirect::to('add_banner_image')->with('error',$session_message)->withInput();
	}
	elseif(($img_data[0] < "870" || $img_data[1] < "350") && ($bn_slider_position=='1')) {
		if(Lang::has(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_870_X_350_PIXELS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_870_X_350_PIXELS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_870_X_350_PIXELS');
			}
	
	return Redirect::to('add_banner_image')->with('error',$session_message)->withInput();
	}
	elseif(($bn_slider_position!='1') && ($img_data[0] > "380" || $img_data[1] > "250")) {
		if(Lang::has(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_250_PIXELS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_250_PIXELS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_250_PIXELS');
			}	
	
	return Redirect::to('add_banner_image')->with('error',$session_message)->withInput();
	}
	elseif(($bn_slider_position!='1') && ($img_data[0] < "380" || $img_data[1] < "250")) {
		if(Lang::has(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_250_PIXELS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_250_PIXELS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_250_PIXELS');
			}	
	
	return Redirect::to('add_banner_image')->with('error',$session_message)->withInput();
	}
	elseif($file!='')
	{
	$time = time();
	$filename = 'Banner' .$time.'.' . strtolower($file->getClientOriginalExtension());
	$destinationPath = './public/assets/bannerimage/';
	Image::make($file)->save('./public/assets/bannerimage/'.$filename);
	$bn_type = '1,1,1';
	$entry = array(
	'bn_title' => Input::get('banner_title') ,
	'bn_type' =>  $bn_type,
	'bn_img' => $filename ,
	'bn_redirecturl' => Input::get('banner_redirect_url') ,
	'bn_slider_position' => Input::get('slider_position'),
	);
	$lang_entry = array();
	if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'bn_title_'.$get_lang_code => Input::get('banner_title_'.$get_lang_name),
						); 
						$entry  = array_merge($entry,$lang_entry);
					}
				}
	
	$return = Bannerset::save_banner($entry);
	if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}	
	return Redirect::to('manage_banner_image')->with('success',$session_message);	
	}
	else
	{
		if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_FIELD_REQUIRED');
			}	
	return Redirect::to('add_banner_image')->with('error',$session_message)->withInput();
	}
	}
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }

    public function edit_banner_submit(){
		if(Session::has('userid')){
			$data = Input::except(array('_token')) ;
			$id = Input::get('bn_id');
			
			$get_active_lang = 	Home::get_active_lang();
			
			$rule = array(
					'banner_title' => 'required',
					'banner_redirect_url' => 'required',
					);
					
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'banner_title_'.$get_lang_name => 'required',
					); 
			
					$rule  = array_merge($rule,$lang_rule);
				}
			}
			$input = Input::all();
			//Image validation
			$rules = array(
			'file' => 'required|image|mimes:jpeg,png,jpg,gif|image_size:'.$this->no_image_width_banner.','.$this->no_image_height_banner.''
				);
				$validator = Validator::make($input, $rules);
					
	
			$validator = Validator::make($data,$rule);			
			if ($validator->fails()){
				return Redirect::to('edit_banner_image/'.$id)->withErrors($validator->messages())->withInput();
			}else{
				$inputs = Input::all();
				$bn_slider_position = Input::get('slider_position');
				$bn_type = '1,1,1';
				$file = Input::file('file');
				$filename = '';
				if($file!=''){
					$img_data = getimagesize(Input::file('file'));
	
					if(($file!='')&&($img_data[0] > "870" || $img_data[1] > "350") && ($bn_slider_position=='1')) {
						if(Lang::has(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_870_X_350_PIXELS')!= '') 
					{ 
						$session_message = trans(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_870_X_350_PIXELS');
					}  
					else 
					{ 
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_870_X_350_PIXELS');
					}
						return Redirect::to('edit_banner_image/'.$id)->with('error',$session_message)->withInput();
					}elseif(($file!='')&&($img_data[0] < "870" || $img_data[1] < "350") && ($bn_slider_position=='1')) {
						
					if(Lang::has(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_870_X_350_PIXELS')!= '') 
					{ 
						$session_message = trans(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_870_X_350_PIXELS');
					}  
					else 
					{ 
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_870_X_350_PIXELS');
					}
					
						return Redirect::to('edit_banner_image/'.$id)->with('error',$session_message)->withInput();
					}elseif(($file!='')&&($img_data[0] > "380" || $img_data[1] > "250") && ($bn_slider_position!=1)) {
					if(Lang::has(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_250_PIXELS')!= '') 
					{ 
						$session_message = trans(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_250_PIXELS');
					}  
					else 
					{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_250_PIXELS');
					}	
						return Redirect::to('edit_banner_image/'.$id)->with('error',$session_message)->withInput();
					}elseif(($file!='')&&($img_data[0] < "380" || $img_data[1] < "250") && ($bn_slider_position!=1)) {
					if(Lang::has(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_250_PIXELS')!= '') 
					{ 
						$session_message = trans(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_250_PIXELS');
					}  
					else 
					{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_250_PIXELS');
					}
						return Redirect::to('edit_banner_image/'.$id)->with('error',$session_message)->withInput();
					}elseif($file!=''){
						$time=time();
						$filename = 'Banner_' .$time.'.'. strtolower($file->getClientOriginalExtension());
						$destinationPath = './public/assets/bannerimage/';
						$old_banner_image = Input::get('old_banner_image');
						if(file_exists($destinationPath.$old_banner_image))
						{
							@unlink($destinationPath.$old_banner_image);
						}
						Image::make($file)->save('./public/assets/bannerimage/'.$filename);
						$entry = array(
							'bn_title' =>  Input::get('banner_title'),
							'bn_type'  =>  $bn_type,
							'bn_img'   =>  $filename ,
							'bn_redirecturl'     => Input::get('banner_redirect_url'),
							'bn_slider_position' => Input::get('slider_position'),
						);
						
						$lang_entry = array();
						if(!empty($get_active_lang)) { 
							foreach($get_active_lang as $get_lang) {
							$get_lang_name = $get_lang->lang_name;
							$get_lang_code = $get_lang->lang_code;
				
							$lang_entry = array(
							'bn_title_'.$get_lang_code => Input::get('banner_title_'.$get_lang_name),
							); 
							$entry  = array_merge($entry,$lang_entry);
						}
					}
						
					} //else if image has
				}else{
				        $entry = array(
							'bn_title' =>  Input::get('banner_title'),
							'bn_type'  =>  $bn_type,
							'bn_redirecturl'     => Input::get('banner_redirect_url'),
							'bn_slider_position' => Input::get('slider_position'),
						);
						
						$lang_entry = array();
						if(!empty($get_active_lang)) { 
							foreach($get_active_lang as $get_lang) {
							$get_lang_name = $get_lang->lang_name;
							$get_lang_code = $get_lang->lang_code;
				
							$lang_entry = array(
							'bn_title_'.$get_lang_code => Input::get('banner_title_'.$get_lang_name),
							); 
							$entry  = array_merge($entry,$lang_entry);
						}
					}
					
				} //else

 			    $return = Bannerset::update_banner_detail($entry,$id);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
				{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}	
 			    return Redirect::to('manage_banner_image')->with('success',$session_message);	
		    } //else
	} //if session has
	else{
		return Redirect::to('siteadmin');
	}	
  } //function

  //Save Edited Image
    public function CropNdUpload_banner(){
       
        $data = Input::except(array(
                '_token'
            ));
       // print_r($data);exit();
        $product_id     = Input::get('product_id');
        $img_id         = Input::get('img_id');
        $imgfileName    = Input::get('imgfileName'); //old image file name

        $imageData 		= Input::get('base64_imgData');
        $img_dat 		= explode(',',Input::get('base64_imgData'));
        $new_name 		= 'banner_'.time().rand().'.jpg';

        //$imge =  file_put_contents('public/assets/bannerimage/'.$new_name, base64_decode($img_dat[1]));
        $imageData 		= base64_decode($img_dat[1]);

        $file_path = './public/assets/bannerimage/'.$new_name;
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
        if(file_exists('public/assets/bannerimage/'.$new_name)){

            //upload small image
            list($width,$height)=getimagesize('public/assets/bannerimage/'.$new_name);     
            

            //unlink old files starts
            if(file_exists('public/assets/bannerimage/'.$imgfileName))
                unlink("public/assets/bannerimage/".$imgfileName);
            //unlink old files ends

            //update in image table 
            $product_list = Bannerset::banner_detail($product_id);

            

            $entry = array('bn_img' => $new_name );

            $return     = Bannerset::update_banner_detail($entry, $product_id);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
             return Redirect::to('edit_banner_image/'.$product_id)->with('block_message', $session_message);
        }

        exit();
    }
    /* Image  Crop , rorate and mamipulation ends */
 
 public function block_banner_multiple()
 {
	 if (Session::has('userid'))
        {
			
         $data=Input::get('val');
         $status=1;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $array=array('stor_status' => 1); 
			  $block_Banner_admin=Bannerset::ban_multiple($id, $status);	
             
                   }
            if($block_Banner_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }
 }

 public function unblock_banner_multiple()
{
	 if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=0;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $array=array('stor_status' => 0);
           $unblock_Banner_admin=Bannerset::ban_multiple($id, $status);			  
              
            
                   }
            if($unblock_Banner_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        } 
}
 
 /**delete multiple**/
		public function delete_banner_multiple()
			{ 
				if (Session::has('userid'))
				{
					$data=Input::get('val'); 
					 for($i=0;$i<count($data);$i++)
					 {
						  
				$id=$data[$i];
				 $array=array('stor_status' => 0);
				$delete_Banner_admin=Bannerset::delete_banner($id);
				//$delete= DB::table('nm_banner')->where('bn_id', '=', $id)->update(array('bn_status' => 2));
				//DB::table('nm_customer')->where('cus_id', '=', $id)->update(array('cus_status'=>2));
                //delete_banner($id)
					 }
					if(count($delete_Banner_admin)>0){
					echo "1";}
					else {
					echo "0";}

				}


			}	
 
} //class
