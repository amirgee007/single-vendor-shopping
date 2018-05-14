<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Lang;
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
use App\ServiceType;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class ServiceTypeController extends Controller
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
//add Service Type view function	
    public function add_service_type()
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
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            return view('siteadmin.add_services_type')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }
    }
//manage Service Type function  
    public function manage_service_type()
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
            $adminheader       = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus    = view('siteadmin.includes.admin_left_menus');
            $adminfooter       = view('siteadmin.includes.admin_footer');
            $manage_service_type     = ServiceType::manage_service_type_list();
            
            return view('siteadmin.manage_service_type')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('manage_service_type', $manage_service_type);
        } else {
            return Redirect::to('siteadmin');
        }
    }
//Add Service Type function  
    public function add_service_type_submit()
    {
		
        if (Session::has('userid')) 
		{
            $data      = Input::except(array(
                '_token'
            ));
			$rule      = array(
                'service_type' => 'required|max:50',
                'service_status' => 'required'
            );
           
				$validator = Validator::make($data, $rule);
				if ($validator->fails()) 
				{
					return Redirect::to('add_service_type')->withErrors($validator->messages())->withInput();
				} 
				else 
				{
					$inputs = Input::all();
                
                    $entry = array(
                        'service_type_name' => Input::get('service_type'),
						'service_type_status' => Input::get('service_status'),
                    );
					if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
					}
					else 
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
					}
                    $return = ServiceType::save_service_type($entry);
                    return Redirect::to('manage_service_type')->with('success', $session_message);
				}
				
        }
         else 
		{
            return Redirect::to('siteadmin');
        }
    }
//edit Service type view function
    public function edit_service_type($id)
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
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $edit_service_type_list   = ServiceType::edit_service_list($id);
			
            return view('siteadmin.edit_service_type')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('edit_service_type_list', $edit_service_type_list);
        } else {
            return Redirect::to('siteadmin');
        }
    }
//update service type function    
    public function edit_service_type_submit()
    {
		
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $id        = Input::get('service_type_id');
		
            $rule      = array(
                'service_type' => 'required|max:50',
								
            );
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_business_category/' . $id)->withErrors($validator->messages());
            } 
                 else {
                    $entry = array(
                         'service_type_name' => Input::get('service_type'),
							'service_type_status' => Input::get('service_type_status'),
                    );
                }
                $return = ServiceType::update_service_type_detail($entry, $id);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
                return Redirect::to('manage_service_type')->with('success', $session_message);
            }
         else {
            return Redirect::to('siteadmin');
        }
    }
//Service type status function    
    public static function status_service_type_submit($id, $status)
    {
        if (Session::has('userid')) {
            $return = ServiceType::status_service_type_submit($id, $status);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_STATUS_UPDATED_SUCCESSFULLY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_STATUS_UPDATED_SUCCESSFULLY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_STATUS_UPDATED_SUCCESSFULLY');
			}
            return Redirect::to('manage_service_type')->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }
//delete Service type function   
    public static function delete_service_type($id)
    {
        if (Session::has('userid')) {
            $return = ServiceType::delete_service_type($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
            return Redirect::to('manage_service_type')->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }
  
}
?>