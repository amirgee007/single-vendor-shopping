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
use App\Country;
use App\Customer;
use App\City;
use App\Category;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
class AdController extends Controller 
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
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	 public function __construct(){
        parent::__construct();
        // set admin Panel language
        $this->setLanguageLocaleAdmin();
    }
	
	public function add_ad()
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
			 $adminheader 	= view('siteadmin.includes.admin_header')->with("routemenu",$session_message);	
			 $adminleftmenus = view('siteadmin.includes.admin_left_menus');
			 $adminfooter 	= view('siteadmin.includes.admin_footer');
			 return view('siteadmin.add_ad')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}

	public function manage_ad()
	{
		if(Session::has('userid'))
		{
		Session::put('adrequestcnt',0);
		Admodel::update_ad_msgstatus();
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
			
			$admin_ad = array('ad_read_status'=>1);
			$admin_ads= Admodel::get_admin_ads($admin_ad);
			
		$adminheader = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);	
		$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
		$adminfooter = view('siteadmin.includes.admin_footer');
		$adresult = Admodel::view_ad_list();
		return view('siteadmin.manage_ad')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('adresult', $adresult);	
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}

	public function edit_ad($id)
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
		$adresult = Admodel::ad_detail($id);
		return view('siteadmin.edit_ad')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('adresult', $adresult)->with('id',$id);
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}

	public function status_ad_submit($id,$status)
	{
		if(Session::has('userid'))
		{
		    $return = Admodel::status_ad($id,$status);
		    if ($status == 0) {
				
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
				{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
				}
                return Redirect::to('manage_ad')->with('updated_result', $session_message);
				
            }else if ($status == 1) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') 
				{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
				}
                return Redirect::to('manage_ad')->with('updated_result', $session_message);
            }
  		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}

	public function block_ads_multiple()
	{
		if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=1;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              
             $block_ads_multiple=Admodel::status_ad($id,$status);
            
                   }
            if($block_ads_multiple>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }
		
	}

public function unblock_ads_multiple()
	{
		if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=0;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              
             $block_ads_multiple=Admodel::status_ad($id,$status);
            
                   }
            if($block_ads_multiple>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }
		
	}

	public function delete_ad($id)
	{
		if(Session::has('userid'))
		{
		$return = Admodel::delete_ad($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
  		return Redirect::to('manage_ad')->with('delete_result',$session_message);
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}

	public function add_ad_submit()
	{
		if(Session::has('userid'))
		{
		$data =  Input::except(array('_token')) ;
		$rule  =  array(
		'adtitle' => 'required',
		'adposition' =>  'required',
		'redirecturl' => 'required|url',
		'file' => 'required|image|mimes:jpeg,png,jpg|image_size:'.$this->ads_width.','.$this->ads_height.''
		);
		
		$message = array(
					'file.required'   => 'Ads Image Field is Required',
					'file.image_size' => 'Image must be 800px width and 400px height',
					'file.mimes' 	  => 'Image must be jpeg,png,jpg',
				);
				
		
		$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'ad_title_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
		
		$adtitle=Input::get('adtitle');
		//$adtitle_french=Input::get('ad_title_french');
		$adposition=Input::get('adposition');
		$file = Input::file('file');
		$adpage=1;
		$adredirecturl=Input::get('redirecturl');
		$validator = Validator::make($data,$rule,$message);	
		$check_exist_ad_title    = Admodel::check_exist_ad_title($adtitle);		
		$check_exist_ad_position = Admodel::check_exist_ad_position($adposition);
	
		if ($validator->fails())
		{
		return Redirect::to('add_ad')->withErrors($validator->messages())->withInput();
		}
		else if(count($check_exist_ad_title) > 0)
		{
			if(Lang::has(Session::get('admin_lang_file').'.BACK_AD_TITLE_ALREADY_EXISTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_AD_TITLE_ALREADY_EXISTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_AD_TITLE_ALREADY_EXISTS');
			}
		   return Redirect::to('add_ad')->withMessage($session_message)->withInput();
		}elseif(($check_exist_ad_position)>0){
			return Redirect::to('add_ad')->withMessage('Ad Already Exists In This Position')->withInput();
		}
		else
		{
		/*$inputs = Input::all();
		$file = Input::file('file');
		$img_data = getimagesize(Input::file('file'));
	
		if($img_data[0] > "380" || $img_data[1] > "250") {
		
			if(Lang::has(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_215_PIXELS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_215_PIXELS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_215_PIXELS');
			}
			
		return Redirect::to('add_ad')->with('error',$session_message)->withInput();
		}
		elseif($img_data[0] < "380" || $img_data[1] < "250") {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_215_PIXELS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_215_PIXELS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_215_PIXELS');
			}
		return Redirect::to('add_ad')->with('error',$session_message)->withInput();
		}*/
		if($file!='')
		{
		$time=time();
		//$filename = 'Ads_' .$time.'_'. $file->getClientOriginalName();
		$filename = 'Ads_'.$time.'.' . strtolower($file->getClientOriginalExtension()); 
		$destinationPath = './public/assets/adimage/';
		Image::make($file)->save('./public/assets/adimage/'.$filename);
		$entry = array(
		'ad_name' => $adtitle,
		'ad_position' => $adposition,
		'ad_pages' => $adpage,
		'ad_redirecturl' =>$adredirecturl,
		'ad_img' =>$filename,
		);
		
		$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'ad_name_'.$get_lang_code => Input::get('ad_title_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
		$return = Admodel::save_ad($entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}
		return Redirect::to('manage_ad')->with('insert_result',$session_message);
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
		return Redirect::to('add_ad')->withMessage($session_message)->withInput();
		}	
		}
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}

	public function edit_ad_submit()
	{
        if(Session::has('userid'))
		{
		$data = Input::except(array('_token')) ;
		$id = Input::get('id');
		$adtitle=Input::get('ad_title');
		//$adtitle_french=Input::get('ad_title_french');
		$adposition=Input::get('editadposition');
		$adpage=1;
		$adredirecturl = Input::get('editredirecturl');
		$rule  =  array(
		'ad_title' => 'required',
		'editadposition' =>  'required|unique:nm_add,ad_position,'.$id.',ad_id',
		//'editadposition' =>  'required',
		'editredirecturl' => 'required|url',
		'file' => 'image|mimes:jpeg,png,jpg,gif|image_size:'.$this->ads_width.','.$this->ads_height.''
	 	);

	 	$messages = array(
			    'editadposition.unique' => 'The position is already exists.',
			);
	
		$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'ad_title_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
			
		$check_exist_ad_title = Admodel::check_exist_ad_title_update($adtitle,$id);
		$check_exist_ad_position = Admodel::check_exist_ad_position($adposition);		
	//	$validator = Validator::make($data,$rule);
		$validator = Validator::make($data, $rule, $messages);			
		if ($validator->fails())
		{
		return Redirect::to('edit_ad/'.$id)->withErrors($validator->messages())->withInput();
		}
		else if(count($check_exist_ad_title) > 0)
		{
			if(Lang::has(Session::get('admin_lang_file').'.BACK_AD_TITLE_ALREADY_EXISTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_AD_TITLE_ALREADY_EXISTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_AD_TITLE_ALREADY_EXISTS');
			}				
		return Redirect::to('edit_ad/'.$id)->withMessage($session_message)->withInput();
		}
		/*elseif(($check_exist_ad_position)>0){
			return Redirect::to('edit_ad/'.$id)->withMessage('Ad Already Exists In This Position')->withInput();
		}*/
		else
		{
		$inputs = Input::all();
		$file = Input::file('file');
		$id = Input::get('id');
		if($file!='')
		{
		$img_data = getimagesize(Input::file('file'));
	
		/*if($img_data[0] > "380" || $img_data[1] > "250") {
		
			if(Lang::has(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_215_PIXELS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_215_PIXELS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_215_PIXELS');
			}
			
		return Redirect::to('edit_ad/'.$id)->with('error',$session_message)->withInput();
		}
		elseif($img_data[0] < "380" || $img_data[1] < "250") 
		{
			if(Lang::has(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_215_PIXELS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_215_PIXELS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ERROR_:_IMAGE_SIZE_MUST_BE_380_X_215_PIXELS');
			}
		
		return Redirect::to('edit_ad/'.$id)->with('error',$session_message)->withInput();
		}*/
		$time=time();
		//$filename = 'Ads_' .$time.'_'. $file->getClientOriginalName();
		$filename = 'Ads_' .$time.'.'. strtolower($file->getClientOriginalExtension()); 
		$destinationPath = './public/assets/adimage/';
			$old_ad_img = Input::get('old_ad_img');
				if(file_exists($destinationPath.$old_ad_img))
				{
					@unlink($destinationPath.$old_ad_img);
				}
		Image::make($file)->save('./public/assets/adimage/'.$filename);
		$entry = array(
		'ad_name' => $adtitle,
		//'ad_name_fr' => $adtitle_french,
		'ad_position' => $adposition,
		'ad_pages' => $adpage,
		'ad_redirecturl' =>$adredirecturl,
		'ad_img' =>$filename,
		);
		
		$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'ad_name_'.$get_lang_code => Input::get('ad_title_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
		}
		else
		{
		$entry = array(
		'ad_name' => $adtitle,
		//'ad_name_fr' => $adtitle_french,
		'ad_position' => $adposition,
		'ad_pages' => $adpage,
		'ad_redirecturl' =>$adredirecturl,
		);
		
		$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'ad_name_'.$get_lang_code => Input::get('ad_title_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
		}
		$return = Admodel::update_ad_detail($entry,$id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}	
		return Redirect::to('manage_ad')->with('updated_result',$session_message);	
		}
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}


	//Ad Image - Save Edited Image
    public function CropNdUpload_adImg(){
       
        $data = Input::except(array(
                '_token'
            ));
       // print_r($data);exit();
        $product_id     = Input::get('product_id');
        $img_id         = Input::get('img_id');
        $imgfileName    = Input::get('imgfileName'); //old image file name

        $imageData 		= Input::get('base64_imgData');
        $img_dat 		= explode(',',Input::get('base64_imgData'));
        $new_name 		= 'Ads_'.time().rand().'.jpg';

        //$imge =  file_put_contents('public/assets/adimage/'.$new_name, base64_decode($img_dat[1]));
        $imageData 		= base64_decode($img_dat[1]);

        $file_path = './public/assets/adimage/'.$new_name;
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
        if(file_exists('public/assets/adimage/'.$new_name)){

            //upload small image
            list($width,$height)=getimagesize('public/assets/adimage/'.$new_name);     
            

            //unlink old files starts
            if(file_exists('public/assets/adimage/'.$imgfileName))
                unlink("public/assets/adimage/".$imgfileName);
            //unlink old files ends

			//update in image table            
            $entry = array('ad_img' => $new_name );
            $return = Admodel::update_ad_detail($entry,$product_id);

            if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
             return Redirect::to('edit_ad/'.$product_id)->with('block_message', $session_message);
        }

        exit();
    }
    /* Image  Crop , rorate and mamipulation ends */


}
