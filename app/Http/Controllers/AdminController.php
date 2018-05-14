<?php
namespace App\Http\Controllers;
use DB;
use Session;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Footer;
use App\Settings;
use App\Merchantadminlogin;
use App\AdminModel;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller {

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


	public function chart()
	{
	   $result = AdminModel::get_chart_details();
	   return view('siteadmin.chart_view');
	}

	public function admin_settings()
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
	   $adminfooter = view('siteadmin.includes.admin_footer');
	   $admin_setting_details = AdminModel::get_admin_details();
	   $country_return = AdminModel::get_country_detail();
	   return view('siteadmin.admin_settings')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('admin_setting_details' , $admin_setting_details)->with('country_details',$country_return);
	   }
	   else
           {
           return Redirect::to('siteadmin');
           }
	}
	
	public function admin_profile()
	{
	  if(Session::has('userid'))
	  {
		  	if(Lang::has(Session::get('admin_lang_file').'.BACK_NULL')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NULL');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NULL');
			}	
	  $adminheader = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);	
	  $adminfooter = view('siteadmin.includes.admin_footer');
	  $admin_setting_details = AdminModel::get_admin_profile_details();
	  return view('siteadmin.admin_profile')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('admin_setting_details' , $admin_setting_details);
	  }
	  else
          {
          return Redirect::to('siteadmin');
          }
	}

	public function admin_settings_submit()
	{

	  $data = Input::except(array('_token')) ;
        $rule = array(
          'first_name' => 'required|alpha_dash',
	  'last_name' => 'required|alpha_dash',
	  'old_password' => 'required',
      'email' => 'required|email',
	  'phone' => 'required|numeric',
	  'address_one' => 'required',
	  'address_two' => 'required',
      'country' => 'required',
	  'city' => 'required'					
           );
          $validator = Validator::make($data,$rule);			
           if ($validator->fails())
           {
	   return Redirect::to('admin_settings')->withErrors($validator->messages())->withInput();
           }
           else
           {
	    if(Input::get('new_password') == ""){ $password = Input::get('old_password'); } else { $password = Input::get('new_password'); }
	    $entry  =  array(
            'adm_fname' => Input::get('first_name'),
	    'adm_lname' => Input::get('last_name'),
	    'adm_password' =>  $password,
	    'adm_email'	=> Input::get('email'),
	    'adm_phone' => Input::get('phone'),
	    'adm_address1' => Input::get('address_one'),
	    'adm_address2' => Input::get('address_two'),
	    'adm_ci_id' => Input::get('city'),
	    'adm_co_id' => Input::get('country'),					
            );
	    $country_return = AdminModel::update_admin_details($entry);
		if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}	
	    return Redirect::to('admin_settings')->with('success', $session_message);
	   }
	}

	public function siteadmin()
	{
       if(Session::has('userid'))
	  {
		  if(Lang::has(Session::get('admin_lang_file').'.BACK_LOGIN_SUCCESS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_LOGIN_SUCCESS');
			}  
			else 
			{ 
				$session_message =  trans($this->$ADMIN_OUR_LANGUAGE.'.BACK_LOGIN_SUCCESS');
			}	
	  return Redirect::to('siteadmin_dashboard')->with('login_success',$session_message);
	  }
	  else
	  {
	  return view('siteadmin.admin_login');	
	  }
	}
	
	public function login_check()
	{
          $inputs = Input::all();
	  $uname = Input::get('admin_name');
	  $password = Input::get('admin_pass');		
	  $check = Merchantadminlogin::login_check($uname,$password);
	  if($check == 1)
	  {
		  /*if(Lang::has(Session::get('admin_lang_file').'.BACK_LOGIN_SUCCESS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_LOGIN_SUCCESS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_LOGIN_SUCCESS');
			}	*/
  	  return Redirect::to('siteadmin_dashboard')->with('login_success','Login Success');
	  }
	  else if($check == -1)
	  {
		  /*if(Lang::has(Session::get('admin_lang_file').'.BACK_INVALID_USERNAME_AND_PASSWORD')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_INVALID_USERNAME_AND_PASSWORD');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_INVALID_USERNAME_AND_PASSWORD');
			}*/	
	  return Redirect::to('siteadmin')->with('login_error','Invalid UserName');
	  }
	  else if($check == -2)
	  {
		    return Redirect::to('siteadmin')->with('login_error','Invalid password')->withInput();
	  }
	  else
	  {
		   
		   return Redirect::to('siteadmin')->with('login_error','admin not available ');
	  }
	}

	public function forgot_check()
	{
	  $inputs = Input::all(); 
	  $email = Input::get('admin_email');
          $check = Merchantadminlogin::forgot_check($email);
	  if($check > 0)
	  {
	  $forgot_check = Merchantadminlogin::forgot_check_details($email);
	  $email = $forgot_check[0]->adm_email;
	  $name = 'admin'; 
	  $send_mail_data = array('name' => $forgot_check[0]->adm_fname, 'password' =>$forgot_check[0]->adm_password);			  
	  Mail::send('emails.admin_passwordrecoverymail', $send_mail_data, function($message) use ($email)
          {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_PASSWORD_RECOVERY_DETAILS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_PASSWORD_RECOVERY_DETAILS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PASSWORD_RECOVERY_DETAILS');
			}	
          $message->to($email,'Admin')->subject($session_message);
       	  });
		  if(Lang::has(Session::get('admin_lang_file').'.BACK_MAIL_SEND_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_MAIL_SEND_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_MAIL_SEND_SUCCESSFULLY');
			}	
  	  return Redirect::to('siteadmin')->with('forgot_success',$session_message);
	  }
	  else 
	  {
		  
		  if(Lang::has(Session::get('admin_lang_file').'.BACK_INVALID_EMAIL')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_INVALID_EMAIL');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_INVALID_EMAIL');
			}	
	  return Redirect::to('siteadmin')->with('forgot_error',$session_message);
	  }
	}

	public function admin_logout()
	{
          Session::forget('userid');
	  Session::forget('username');
	  Session::flush();
	  if(Lang::has(Session::get('admin_lang_file').'.BACK_LOGOUT_SUCCESS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_LOGOUT_SUCCESS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_LOGOUT_SUCCESS');
			}	
	  return Redirect::to('siteadmin')->with('login_success',$session_message);
	}	

	public function admin_new_change_languages()
	{
		$this->ADMIN_OUR_LANGUAGE ="admin_en_lang";
		/*$lang_code = Input::get('language_code');
		Session::put('admin_lang_file','admin_'.Session::get('lang_code').'_lang');
		
		Session::put('admin_lang_code',$lang_code);*/

	}

	public function ajax_select_city(){
        
        $cityid    = $_GET['city_id'];
        $city_ajax = AdminModel::get_city_detail_ajax($cityid);
        if ($city_ajax) {
            $return = "";
			 if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '')
 			{ 
				$session_message =  trans(Session::get('admin_lang_file').'.BACK_SELECT');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SELECT');
			}
            $return = "<option value=''> -- $session_message -- </option>";
            foreach ($city_ajax as $fetch_city_ajax) {
				if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
						$ci_name = 'ci_name';
				}else {  $ci_name = 'ci_name_'.Session::get('lang_code'); }
                
				
                $return .= "<option value='" . $fetch_city_ajax->ci_id . "'> " . $fetch_city_ajax->$ci_name . " </option>";
          
        }
            echo $return;
        } else {
			 if (Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '')
 			{ 
				$session_message =  trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value=''> $session_message </option>";
        }
    }

     public function ajax_select_city_edit()
    {
         $cityid    = $_GET['city_id_ajax'];
         $countryid    = $_GET['country_id_ajax'];
         $city_ajax = AdminModel::get_city_detail_ajax_edit($cityid);
         $country_ajax = AdminModel::get_city_detail_ajax($countryid);
         if ($city_ajax) {
                    $return = "";
          foreach ($city_ajax as $fetch_city_ajax) {
                        $return .= "<option value='" . $fetch_city_ajax->ci_id . "' selected > " . $fetch_city_ajax->ci_name . " </option>";
                    } 
         
           if($country_ajax) {       
        foreach ($country_ajax as $city_list) {

               if($cityid!=$city_list->ci_id) {
                        $return .= "<option value='" . $city_list->ci_id . "'> " . $city_list->ci_name . " </option>";
                  }

                    }
                }

                  
                    echo $return;
                } else {
                     if (Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '')
                    { 
                        $session_message =  trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
                    }  
                    else 
                    { 
                        $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
                    }
                    echo $return = "<option value=''> $session_message </option>";
                }
            } 

	
  }
