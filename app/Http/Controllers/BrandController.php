<?php
namespace App\Http\Controllers;
use DB;
use Session;
use App\Http\Models;
use App\Brand;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class BrandController extends Controller {
       
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
    /*admin->add brand & its commission*/
    public function add_brand(){
	    if(Session::has('userid')){
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}	
	        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);	
	        $adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	        $adminfooter    = view('siteadmin.includes.admin_footer');
	        return view('siteadmin.add_brand')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);	
	    }else{
	        return Redirect::to('siteadmin');
	    }	
    }
    
    /*admin->manage brand & its commission*/
    public function manage_brand(){
  	    if(Session::has('userid')){
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
	        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_messag);	
	        $adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	        $adminfooter    = view('siteadmin.includes.admin_footer');
	        $manage_brand   = Brand::view_brand_commission();
           
	        return view('siteadmin.manage_brand')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('manage_brand', $manage_brand);	
        }else{
	        return Redirect::to('siteadmin');
	    }	
    }
    /*admin->edit brand & its commission*/
    public function edit_brand($brand_id){
  	    if(Session::has('userid')){
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
	        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);	
	        $adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	        $adminfooter    = view('siteadmin.includes.admin_footer');
	        $brand_detail   = Brand::get_brand_detail($brand_id);
            return view('siteadmin.edit_brand')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('brand_detail', $brand_detail);	
        }else{
	        return Redirect::to('siteadmin');
	    }	
    }

	/*delete banner in admin*/
    public function delete_brand_submit($brand_id){
	    if(Session::has('userid')){
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
	        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);	
	        $adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	        $adminfooter    = view('siteadmin.includes.admin_footer');
	        $banner_detail  = Brand::delete_brand_submit($brand_id);
	        return view('siteadmin.edit_banner')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('banner_detail', $banner_detail);	
	    }else{
	        return Redirect::to('siteadmin');
	    }	
    }

    public function update_brand_status($id,$status){
    	if(Session::has('userid')){
			$return = Brand::update_brand_status($id,$status);
			if ($status == 0) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
				{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
				}	
                return Redirect::to('manage_brand')->with('success', $session_message);
            }else if ($status == 1) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') 
				{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
				}	
                return Redirect::to('manage_brand')->with('success', $session_message);
            }
		}else{
			return Redirect::to('siteadmin');
		}	
    }

   
    /*admin->add brand submit*/
    public function add_brand_submit(){
	    if(Session::has('userid')){
	        $data = Input::except(array('_token')) ;
	        $rule = array(
	            'brand_name'          => 'required',
	            'brand_commission'    => 'required' ,
	            'brand_image'	      => 'required|mimes:png,jpg,jpeg',
	        );
	
	        $validator = Validator::make($data,$rule);			
	        if ($validator->fails()){
	            return Redirect::to('add_brand')->withErrors($validator->messages())->withInput();
	        }else{
               
	            $brand_name       = Input::get('brand_name');
	            $brand_commission = Input::get('brand_commission');
	            $brand_image      = getimagesize(Input::file('brand_image'));
	
	            /*if(($brand_image[0] > "400" || $brand_image[1] > "200")) {
	                return Redirect::to('add_brand')->with('error','Error : image size must be  400 x 200 pixels')->withInput();
	            }elseif(($brand_image[0] < "400" || $brand_image[1] < "200")) {
	                return Redirect::to('add_brand')->with('error','Error : image size must be  400 x 200 pixels')->withInput();
	            }else*/
                if($brand_image!=''){
	                $filename = Input::file('brand_image')->getClientOriginalName();
	                $move_img = explode('.',$filename);
	
	                $filename = $move_img[0].str_random(8).".".$move_img[1];
	                $destinationPath = './public/assets/brandimage/';
	                $uploadSuccess = Input::file('brand_image')->move($destinationPath,$filename);
	                
	                $entry = array(
	                    'brand_name'       => $brand_name,
	                    'brand_commission' => $brand_commission,
	                    'brand_image'      => $filename,
                        'add_date'         => date('Y-m-d H:i:s'),
	                    );
                        //print_r($entry);
                        
	                $return = Brand::add_brand_commission($entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}	
	                return Redirect::to('manage_brand')->with('success',$session_message);	
	            }else{
			if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_FIELD_REQUIRED');
			}	
	                return Redirect::to('add_brand')->with('error',$session_message)->withInput();
	            }
	        }
	    }else{
	        return Redirect::to('siteadmin');
	    }	
    }//function

    public function edit_brand_submit(){
		if(Session::has('userid')){
			$data = Input::except(array('_token')) ;
			$id   = Input::get('brand_id');
			$rule = array(
					'brand_name' => 'required',
					'brand_commission' => 'required',
					);
	
			$validator = Validator::make($data,$rule);			
			if ($validator->fails()){
				return Redirect::to('edit_brand/'.$id)->withErrors($validator->messages())->withInput();
			}else{
							
				$file = Input::file('brand_image');
				$filename = '';	
				if($file!=''){
                   
					$img_data = getimagesize($file);

					/*if(($file!='')&&($img_data[0] > "870" || $img_data[1] > "350") && ($bn_slider_position=='1')) {
						return Redirect::to('edit_banner_image/'.$id)->with('error','Error : image size must be  870 x 350 pixels')->withInput();
					}elseif(($file!='')&&($img_data[0] < "870" || $img_data[1] < "350") && ($bn_slider_position=='1')) {
						return Redirect::to('edit_banner_image/'.$id)->with('error','Error : image size must be  870 x 350 pixels')->withInput();
					}elseif(($file!='')&&($img_data[0] > "380" || $img_data[1] > "250") && ($bn_slider_position!=1)) {
						return Redirect::to('edit_banner_image/'.$id)->with('error','Error : image size must be  380 x 250 pixels')->withInput();
					}elseif(($file!='')&&($img_data[0] < "380" || $img_data[1] < "250") && ($bn_slider_position!=1)) {
						return Redirect::to('edit_banner_image/'.$id)->with('error','Error : image size must be  380 x 250 pixels')->withInput();
					}else*/
                  
						$filename = $file->getClientOriginalName();
						$move_img = explode('.',$filename);
						$filename = $move_img[0].str_random(8).".".$move_img[1];
						$destinationPath = './public/assets/brandimage/';
						$uploadSuccess = Input::file('brand_image')->move($destinationPath,$filename);
						$entry = array(
							'brand_name'       =>  Input::get('brand_name'),
							'brand_commission' =>  Input::get('brand_commission'),
							'brand_image'      =>  $filename ,
						);
					
				}else{   //else  image has
				        $entry = array(
							'brand_name'        =>  Input::get('brand_name'),
							'brand_commission'  =>  Input::get('brand_commission'),
						);
				} //else

 			    $return = Brand::update_brand($entry,$id);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
				{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}	
 			    return Redirect::to('manage_brand')->with('success',$session_message);	
		    } //else
	} //if session has
	else{
		return Redirect::to('siteadmin');
	}	
  } //function



} //class
