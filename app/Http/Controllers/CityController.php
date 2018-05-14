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
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class CityController extends Controller
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
    
    public function add_city()
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
            
            $adminheader     = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus  = view('siteadmin.includes.admin_left_menus');
            $adminfooter     = view('siteadmin.includes.admin_footer');
            $country_details = City::view_country_details();
            return view('siteadmin.add_city')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('country_details', $country_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function manage_city()
    {
		if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            $citydetails = City::view_city_detail();
            
            return view('siteadmin.manage_cities')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('citydetails', $citydetails);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_city($id)
    {
		if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            $country_details = City::view_country_details();

            
            $cityresult = City::show_city_detail($id);
            
            return view('siteadmin.edit_city')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('cityresult', $cityresult)->with('country_details', $country_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function delete_city($id)
    {
        if (Session::has('userid')) {
            $affected = City::delete_city_detail($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_CITIES_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_CITIES_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CITIES_DELETED_SUCCESSFULLY');
			}
            return Redirect::to('manage_city')->with('success',$session_message);
        } else {
            return Redirect::to('siteadmin');
        }
        
        
    }
    
    public function status_city_submit($id, $status)
    {
        if (Session::has('userid')) {
            $return = City::status_city($id, $status);

            if ($status == 1) { //unblock 
                if($return){
                    $array=array('stor_status' => 1); //unblocking store which is active
                   
                    $a = City::update_store_city_status($id,$array);
                }

			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}
               return Redirect::to('manage_city')->with('success', 'City & thier Stores unblocked successfully..!');
            }else if ($status == 0) {   //block
                if($return){
                    $array=array('stor_status' => 0); //blocking store only which is already in active status
                    $a = City::update_store_city_status($id,$array);
                }
				    if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= ''){ 
				        $session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			        }else{ 
				        $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			        }
                return Redirect::to('manage_city')->with('success', 'City & thier Stores blocked successfully..!');
            }
           
              
        } else {
            return Redirect::to('siteadmin');
        }
    }

/**Block multiple*/
 public function block_status_city_submit()
    {
        if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=0;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $array=array('stor_status' => 0); 
             $block_City_admin=City::status_city($id, $status);
             $block_City_merchant = City::update_store_city_status($id,$array);
                   }
            if($block_City_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }
    }
       
    
    /**Un Block multiple*/
 public function unblock_status_city_submit()
    {
        if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=1;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $array=array('stor_status' => 1); 
             $block_City_admin=City::status_city($id, $status);
             $block_City_merchant = City::update_store_city_status($id,$array);
             
                   }
            if($block_City_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }
    }
       
    


    public function add_city_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
           
            $rule = array(
                'country_name'   => 'required',
                'city_name'      => 'required',
                'city_latitude'  => 'required',
                'city_longitute' => 'required',
            );
			
			$get_active_lang = 	Home::get_active_lang();
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'city_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_city')->withErrors($validator->messages())->withInput();
                
            } else {
                $cityname              = Input::get('city_name');
                $countrycode           = Input::get('country_name');
                $check_exist_city_name = City::check_exist_city_name($cityname, $countrycode);
               
                
                
                if (count($check_exist_city_name)>0) {
                   
			if(Lang::has(Session::get('admin_lang_file').'.BACK_CITY_ALREADY_EXISTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_CITY_ALREADY_EXISTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CITY_ALREADY_EXISTS');
			}
            
                    return Redirect::to('add_city')->with('error', $session_message)->withInput();
                } else {
                    $entry = array(
                        
                        'ci_name' => Input::get('city_name'),
                        'ci_con_id' => Input::get('country_name'),
                        'ci_lati' => Input::get('city_latitude'),
                        'ci_long' => Input::get('city_longitute'),
                        'ci_default' => 0,
                        'ci_status' => 1
                    );
					
					$lang_entry = array();
					if(!empty($get_active_lang)) { 
						foreach($get_active_lang as $get_lang) {
							$get_lang_name = $get_lang->lang_name;
							$get_lang_code = $get_lang->lang_code;
					
							 $lang_entry = array(
							'ci_name_'.$get_lang_code => Input::get('city_name_'.$get_lang_name),
							); 
							
							$entry  = array_merge($entry,$lang_entry);
					}
				}
				
            if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}
                    $return = City::save_City_detail($entry);
                    return Redirect::to('manage_city')->with('success', $session_message);
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_city_submit()
    {
        if (Session::has('userid')) {
            
            //$inputs = Input::all();
            $data = Input::except(array(
                '_token'
            ));
            $id   = Input::get('city_id');
            $rule = array(
                'country_name' => 'required',
                'city_name' => 'required',
                'city_latitude' => 'required',
                'city_longitute' => 'required'
            );
			
			$get_active_lang = 	Home::get_active_lang();
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'city_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_city/' . $id)->withErrors($validator->messages())->withInput();
                
            }

 else {
                $id   = Input::get('city_id');
                $cityname              = Input::get('city_name');
                $countrycode           = Input::get('country_name');
                $check_exist_city_name = City::check_exist_city_name_edit($id,$cityname, $countrycode);
               
                
                
                if (count($check_exist_city_name)>0) {
                   
            if(Lang::has(Session::get('admin_lang_file').'.BACK_CITY_ALREADY_EXISTS')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_CITY_ALREADY_EXISTS');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CITY_ALREADY_EXISTS');
            }
            
                    return Redirect::to('edit_city/' . $id)->with('error', $session_message);
                } else {
                
                $entry = array(
                    'ci_name' => Input::get('city_name'),
                    'ci_con_id' => Input::get('country_name'),
                    'ci_lati' => Input::get('city_latitude'),
                    'ci_long' => Input::get('city_longitute')
                );
				
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'ci_name_'.$get_lang_code => Input::get('city_name_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
                
                $affected = City::update_City_detail($id, $entry);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
                return Redirect::to('manage_city')->with('success',$session_message);
            }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function update_default_city_submit()
    {
        if (Session::has('userid')) {
            $id     = Input::get('default_city_id');
            $entry  = array(
                'ci_default' => 0
            );
            $return = City::update_default_city_submit1($entry);
            $entry  = array(
                'ci_default' => 1,
                'ci_status'=> 1
            );
            $return = City::update_default_city_submit($id, $entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
            return Redirect::to('manage_city')->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }
   
}
