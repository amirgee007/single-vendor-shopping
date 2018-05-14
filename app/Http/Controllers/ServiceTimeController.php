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
use App\Category;
use App\ServiceTime;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ServiceTimeController extends Controller
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
/*Add Service Time*/    
    public function add_service_time()
    {
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
        
        return view('siteadmin.add_service_time')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
    }
/*mange service time function*/
    public function manage_service_time()
    {
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
        
        $Service_Time_Details = ServiceTime::view_service_time_details();
		
		
        
        return view('siteadmin.manage_service_time')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('Service_Time_Details', $Service_Time_Details);
    }
	
/*Edit Service Time Function*/
    public function edit_service_time($id)
    {
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
        
        $Get_Service_Time = ServiceTime::showindividual_service_time_detail($id);
       
        return view('siteadmin.edit_service_time')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('Get_Service_Time', $Get_Service_Time)->with('id', $id);
    }
/*Delete Service Time*/    
    public function delete_service_time_admin($id)
    {
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
        
        $affected = ServiceTime::delete_service_time_detail($id);
		if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
		{
			$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
		}
		else 
		{
			$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
		}
        return Redirect::to('manage_service_time')->with('delete_result', $session_message);
    }
/*Change Status Function*/    
    public function update_status_service_time($id, $status)
    {
		if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
		{
			$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
		}
		else 
		{
			$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
		}
        $return = ServiceTime::update_status_service_time($id, $status);
        return Redirect::to('manage_service_time')->with('updated_result',$session_message);
    }
/*Add Service Time Submit*/	
    public function add_service_time_submit()
    {
        
        $data = Input::except(array(
            '_token'
        ));
        $rule = array(
            'service_time' => 'required',
            'Service_time_status' => 'required'
        );
        
        $validator = Validator::make($data, $rule);
		$service_timing = Input::get('service_time');
        $service_time = str_replace(' ', '', $service_timing);
		$Check_Service_Time = ServiceTime::check_service_time($service_time);
		
        if ($validator->fails()) {
            return Redirect::to('add_service_time')->withErrors($validator->messages())->withInput();
            
        }elseif(count($Check_Service_Time)==1){
			if(Lang::has(Session::get('admin_lang_file').'.BACK_TIME_IS_ALREADY_PRESENTS')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_TIME_IS_ALREADY_PRESENTS');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TIME_IS_ALREADY_PRESENTS');
			}
			return Redirect::to('add_service_time')->with('error', $session_message);
		}
		else {
            $service_timing = Input::get('service_time');
            $service_time = str_replace(' ', '', $service_timing);
            $entry = array(
                'service_time' => $service_time,
                'Service_time_status' => Input::get('Service_time_status')
                
            );
            
            $return = ServiceTime::save_service_time($entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}
				return Redirect::to('manage_service_time')->with('insert_result', $session_message);
			
        }
    }
/*Update Service Time*/   
    public function update_service_time_submit()
    {
     
        $data      = Input::except(array(
            '_token'
        ));
        $rule      = array(
            'service_time' => 'required',
            'Service_time_status' => 'required'
            
        );
        $id        = Input::get('id');
        $validator = Validator::make($data, $rule);
		$service_timing = Input::get('service_time');
        $service_time = str_replace(' ', '', $service_timing);
		$Check_Service_Time = ServiceTime::check_service_time($service_time);
		
        if ($validator->fails()) {
            return Redirect::to('add_service_time')->withErrors($validator->messages())->withInput();
            
        }elseif(count($Check_Service_Time)==1){
			if(Lang::has(Session::get('admin_lang_file').'.BACK_TIME_IS_ALREADY_PRESENTS')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_TIME_IS_ALREADY_PRESENTS');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TIME_IS_ALREADY_PRESENTS');
			}
			return Redirect::to('edit_service_time/'.$id.'')->with('error', $session_message);
		} else {
            $service_timing = Input::get('service_time');
            $service_time = str_replace(' ', '', $service_timing);
            $entry = array(
                'service_time' => $service_time,
                'Service_time_status' => Input::get('Service_time_status')
                
            );
            if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
            $return = ServiceTime::update_Service_Time_Details($id, $entry);
            return Redirect::to('manage_service_time')->with('updated_result', $session_message);
        }
    }
}

?>
