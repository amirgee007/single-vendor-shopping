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
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class ImagesettingsController extends Controller
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
    
    public function add_logo()
    {
		
		
        if (Session::has('userid')) {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}

            $adminheader    = view('siteadmin.includes.admin_header')->with('routemenu', $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $logodetails    = Settings::get_logo_details();
            return view('siteadmin.logosettings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('logodetails', $logodetails);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function add_logo_submit()
    {	
        if (Session::has('userid')) {
            $data   = Input::except(array(
                '_token'
            ));
			$file   = Input::file('logofile');
			$filesCount = count($file);
            $data = Input::except(array(
                '_token'
            ));
			
				$input = array(
					'logo' => $file
				);
				$rules = array(
					'logo' => 'required|image|mimes:jpeg,png,jpg|image_size:'.$this->logo_width.','.$this->logo_height.''
				);
				
				$message = array(
					'logo.image_size' => 'logo must be 180 pixel width and 45 pixel height',
					'logo.mimes' 	  => 'logo must be in a file type:jpeg,png,jpg'
				);
				
				$validator = Validator::make($input, $rules, $message);
				
				if ($validator->fails())
				{
					return Redirect::to('add_logo')->withErrors($validator->messages())->withInput();
				}
			
			
            $inputs = Input::all();
            
            if ($file != '') {
				$time=time();
                $filename = 'Logo_' .$time.'_'. $file->getClientOriginalName();
				$filename = str_replace(' ', '', $filename);
				$newdestinationPath = './public/assets/logo/';
				$old_logo = Input::get('old_logo');
				if(file_exists($newdestinationPath.$old_logo))
				{
					@unlink($newdestinationPath.$old_logo);
				}
                Image::make($file)->save('./public/assets/logo/'.$filename,20);
              
                $checklogorecord = Settings::get_logo_details();
                if ($checklogorecord) {
                    Settings::update_logo($filename);
                } else {
                    
                    $entry = array(
                        'imgs_name' => $filename,
                        'imgs_type' => 1
                    );
                    
                    Settings::insert_logo($entry);
                }
              if(Lang::has(Session::get('admin_lang_file').'.BACK_LOGO_UPDATED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_LOGO_UPDATED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_LOGO_UPDATED');
			}

                return Redirect::to('add_logo')->withMessage($session_message)->withInput();
            }
           
            else {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_FIELD_REQUIRED');
			}

                return Redirect::to('add_logo')->withMessage($session_message)->withInput();
            }
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function add_favicon()
    {
        if (Session::has('userid')) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}

            $adminheader    = view('siteadmin.includes.admin_header')->with('routemenu', $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $favicondetails = Settings::get_favicon_details();
            return view('siteadmin.faviconsettings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('favicondetails', $favicondetails);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function add_favicon_submit()
    {
        if (Session::has('userid')) {
            $file   = Input::file('favfile');
            $data   = Input::except(array(
                '_token'
            ));
			$input = array(
					'favicon' => $file
				);
				$rules = array(
					'favicon' => 'required|image|mimes:jpeg,png,jpg|image_size:'.$this->favicon_width.','.$this->favicon_height.''
				);
				
				$message = array(
					'favicon.image_size'  => 'Favicon must be 16 pixel width and 16 pixel height',
					'favicon.mimes' 	  => 'Favicon must be in a file type:jpeg,png,jpg'
				);
				
				$validator = Validator::make($input, $rules , $message);
				
				if ($validator->fails())
				{
					return Redirect::to('add_favicon')->withErrors($validator->messages())->withInput();
				}
            $inputs = Input::all();
            
            if ($file != '') {
				$time=time();
                $filename = 'Favicon_' .$time.'_' . $file->getClientOriginalName();
				$newdestinationPath = './public/assets/favicon/';
				$old_favicon = Input::get('old_favicon');
				if(file_exists($newdestinationPath.$old_favicon))
				{
					@unlink($newdestinationPath.$old_favicon);
				}
                Image::make($file)->save('./public/assets/favicon/'.$filename,20);
                
                $favicondetails = Settings::get_favicon_details();
                if ($favicondetails) {
                    Settings::update_favicon($filename);
                } else {
                    $entry = array(
                        'imgs_name' => $filename,
                        'imgs_type' => 2
                    );
                    
                    Settings::insert_favicon($entry);
                }
              if(Lang::has(Session::get('admin_lang_file').'.BACK_FAVICON_UPDATED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_FAVICON_UPDATED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_FAVICON_UPDATED');
			}

                return Redirect::to('add_favicon')->withMessage($session_message)->withInput();
            } else {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_FIELD_REQUIRED');
			}

                return Redirect::to('add_favicon')->withMessage($session_message)->withInput();
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function add_noimage()
    {
		if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
			//$Get_no_image = DB::table('nm_imagesetting')->where('imgs_type','=',3)->first();
			$Get_no_image = DB::table('nm_imagesetting')->get();
			$filecount = DB::table('nm_imagesetting')->select(DB::raw('MAX(imgs_type) as max_file_count'))->first();
			
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with('routemenu', $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $noimagedetails = Settings::get_noimage_details();

            return view('siteadmin.noimagesettings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('noimagedetails', $noimagedetails)->with('Get_no_image', $Get_no_image)->with('max_file_count',$filecount);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function add_noimage_submit(Request $request)
    {
		$session_message ='';

        if (Session::has('userid')) {
			$file   = Input::file('noimgfile');
			
			//$filesCount = count($file); 
			$filecount = DB::table('nm_imagesetting')->select(DB::raw('MAX(imgs_type) as max_file_count'))->first();
			$fileCount = $filecount->max_file_count;

			$width  = Input::get('width');
			$height  = Input::get('height');
			$type  = Input::get('type');
			$old_no_image  = Input::get('old_no_image'); 
			$imagename  = Input::get('imagename'); 
			
			
            $data   = Input::except(array(
                '_token'
            ));
			
			for ($i=3; $i <= $fileCount; $i++)
			{
				if(isset($_FILES['noimgfile']['tmp_name'][$i])){
				if($_FILES['noimgfile']['tmp_name'][$i]!='') {

					$input = array(
						$imagename[$i] => $file[$i] 
					); 
					$rules = array(
						$imagename[$i] => 'required|image|mimes:jpeg,png,jpg|image_size:'.$width[$i].','.$height[$i].''
					); 
				
					$validator = Validator::make($input, $rules); 
				
					if ($validator->fails())
					{
						return Redirect::to('add_noimage')->withErrors($validator->messages())->withInput();
					}
				} }
			
	            $inputs = Input::all();

	           /*  if(isset($old_no_image[$i]))
					$old_image = $old_no_image[$i];
				else
					$old_image ='';
				if($i < count($file)){	
	            if ($file[$i] != '') {
	            	
	            	if($old_image!=''){
	            		
	            		$filename = $old_image;
	            	}
	            	else{
						$time = time();
						 $filename = 'No_image_' .$time.'_'.$width[$i].'x'.$height[$i];
	            	}
	               
					$newdestinationPath = './public/assets/noimage/';
					
					// $old_no_image = Input::get('old_no_image');
					
					if(file_exists($newdestinationPath.$old_image))
					{
						@unlink($newdestinationPath.$old_image);
					}   */
					
					
				if(isset($file[$i]) && $file[$i] != '') {
				
					if(isset($old_no_image[$i]))
				    	$old_image_unset = $old_no_image[$i];
					else
				    	$old_image_unset ='';
					
					$time = time();
				    $filename = 'No_image_'.$time.'_'.$width[$i].'x'.$height[$i].'.jpg';
					
					$newdestinationPath = './public/assets/noimage/';
					
					if(file_exists($newdestinationPath.$old_image_unset))
					{
						@unlink($newdestinationPath.$old_image_unset);
					} 
					
	                Image::make($file[$i])->save('./public/assets/noimage/'.$filename,20);
	                
	                $types = $type[$i];
	                $noimagedetails = Settings::get_noimage_details_dynamic($types); 
	                if (count($noimagedetails) > 0 ){
	                    Settings::update_noimage($filename,$types);
	                } else {
	                    $entry = array(
	                        'imgs_name' => $filename,
	                        'imgs_type' => $type[$i]
	                    );
	                    Settings::insert_noimage($entry);
	                }
					if(Lang::has(Session::get('admin_lang_file').'.BACK_NOIMAGE_UPDATED')!= '') 
					{ 
						$session_message = trans(Session::get('admin_lang_file').'.BACK_NOIMAGE_UPDATED');
					}  
					else 
					{ 
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NOIMAGE_UPDATED');
					}

	              // return Redirect::to('add_noimage')->withMessage($session_message)->withInput();
	            } 
				//}
				else {
	            	if($old_no_image[$i]==''){
						if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED')!= '') 
						{ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED');
						}  
						else 
						{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_FIELD_REQUIRED');
						}

		                return Redirect::to('add_noimage')->withMessage($session_message)->withInput();
		            }
	            }
			}
			if(Lang::has(Session::get('admin_lang_file').'.BACK_NOIMAGE_UPDATED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NOIMAGE_UPDATED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NOIMAGE_UPDATED');
			}
			return Redirect::to('add_noimage')->withMessage($session_message)->withInput();
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    
}
