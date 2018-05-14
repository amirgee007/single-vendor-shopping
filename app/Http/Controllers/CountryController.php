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
use App\Attributes;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
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


    public function add_country()
    {
        if (Session::has('userid')) {
            include("currency_list/currency_list.php");

			if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            return view('siteadmin.add_countries')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    /**Search by country*/
    public function array_search_country()
    {
        $searched_country= Input::get('searched_country');
        include("currency_list/currency_list.php");
         $i=0; ?> 
         <ul id="country-list">
         <?php 
        foreach($currency_list as $key=>$val)
        {
            if($i<=5) {
            if (stripos($key, $searched_country) !== false) { ?>
            <li onClick="selectCountry('<?php  echo $key; ?>');">
            <?php  echo $key; ?>
            </li> 
            <?php
                
                $i++;
            } 

            }

        } ?> 
       </ul> <?php 
    }

    public function add_searched_country(){
        $searched_country_name= Input::get('searched_country_name');
        include("currency_list/currency_list.php");
        foreach($currency_list as $key=>$val)
        {
            if($key==$searched_country_name){
                
                echo $val['Country_code'].'||';
                echo $val['Country_name'].'||';
                echo $val['currency_symbol'].'||';
                echo $val['currency_code'].'||';
            }
        }

        

    }


    public function manage_country()
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
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            $countryresult = Country::view_country_detail();
            
            return view('siteadmin.manage_countries')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('countryresult', $countryresult);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_country($id)
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
            
            $countryresult = Country::showindividual_country_detail($id);
            
            return view('siteadmin.edit_countries')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('countryresult', $countryresult)->with('id', $id);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function delete_country($id)
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
            
            $affected      = Country::delete_country_detail($id);
            $countryresult = Country::view_country_detail();
            
            /* return view('siteadmin.manage_countries')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('specificationresult',$countryresult);*/
            
			if(Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_COUNTRY_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY_DELETED_SUCCESSFULLY');
			}
            return Redirect::to('manage_country')->with('updated_result', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function update_status_country($id, $status)
    {
       
        if (Session::has('userid')) {
            $return = Country::update_status_country($id, $status);
            
            if ($status == 0) { //to unblock
                if($return){
                    $array=array('mer_staus' => 1); //unblocking merchant which is active
                    $a = Country::update_merchant_country_status($id,$array);
                }
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}else{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}	
                return Redirect::to('manage_country')->with('updated_result', $session_message);
            }else if ($status == 1) {   //to block
                if($return){
                    $array=array('mer_staus' => 0); //blocking merchant only which is already in active status
                    $a = Country::update_merchant_country_status($id,$array);
                }
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}	
                return Redirect::to('manage_country')->with('updated_result', $session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }


/**Multiple block*/
    public function block_status_country_submit()
    {

        if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=1;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
             $array=array('mer_staus' => 0);
             $block_country_admin=Country::update_status_country($id, $status);
             $block_country_merchant = Country::update_merchant_country_status($id,$array);
                   }
            if($block_country_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }
    }

    /*Un block status*/
    public function unblock_status_country_submit()
    {
        if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=0;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
             $array=array('mer_staus' => 0);
             $block_country_admin=Country::update_status_country($id, $status);
             $block_country_merchant = Country::update_merchant_country_status($id,$array);
                   }
            if($block_country_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }

    }

    public function add_country_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'country_name' => 'required',
                'ccode' => 'required',
                'cursymbol' => 'required',
                'curcode' => 'required'
            );
			
			$get_active_lang = 	Home::get_active_lang();
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'country_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_country')->withMessage("Add country name!")->withInput();
                
            } else {
                $countryname    = Input::get('country_name');
				//$country_name_french    = Input::get('country_name_french');
                $countrycode    = Input::get('ccode');
                $currencysymbol = Input::get('cursymbol');
                $currencycode   = Input::get('curcode');
                
                
                $check_exist_country_name = Country::check_exist_country_name($countryname);
                $check_exist_country_code = Country::check_exist_country_code($countrycode);
                
                
                if (count($check_exist_country_name)>0) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY_ALREADY_EXISTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_COUNTRY_ALREADY_EXISTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY_ALREADY_EXISTS');
			}
                    return Redirect::to('add_country')->withMessage($session_message)->withInput();
                } else if (count($check_exist_country_code)>0) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY_CODE_ALREADY_EXISTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_COUNTRY_CODE_ALREADY_EXISTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY_CODE_ALREADY_EXISTS');
			}	
                    return Redirect::to('add_country')->withMessage($session_message)->withInput();
                } else {
                    
                    $entry = array(
                        'co_code' => Input::get('ccode'),
                        'co_name' => Input::get('country_name'),						
                        'co_cursymbol' => Input::get('cursymbol'),
                        'co_curcode' => Input::get('curcode')
                    );
					
					$lang_entry = array();
					if(!empty($get_active_lang)) { 
						foreach($get_active_lang as $get_lang) {
							$get_lang_name = $get_lang->lang_name;
							$get_lang_code = $get_lang->lang_code;
					
							 $lang_entry = array(
							'co_name_'.$get_lang_code => Input::get('country_name_'.$get_lang_name),
							); 
							
							$entry  = array_merge($entry,$lang_entry);
					}
				}
				
                    
                    $return = Country::save_country_detail($entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}
                    return Redirect::to('manage_country')->with('insert_result',$session_message);
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function update_country_submit()
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
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            //$inputs = Input::all();
            $data = Input::except(array(
                '_token'
            ));
            $id   = Input::get('id');
            $rule = array(
                'country_name' => 'required',
                'ceditcode' => 'required',
                'cureditsymbol' => 'required',
                'cureditcode' => 'required'
            );
			
			$get_active_lang = 	Home::get_active_lang();
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'country_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                
                return Redirect::to('edit_country/' . $id)->withMessage("Add Country to update!")->withInput();
                
            }
            
            else {
                
                if ($id != "") {
                    $entry = array(
                        'co_code' => Input::get('ceditcode'),
                        'co_name' => Input::get('country_name'),
                        'co_cursymbol' => Input::get('cureditsymbol'),
                        'co_curcode' => Input::get('cureditcode')
                    );
					
					$lang_entry = array();
					if(!empty($get_active_lang)) { 
						foreach($get_active_lang as $get_lang) {
							$get_lang_name = $get_lang->lang_name;
							$get_lang_code = $get_lang->lang_code;
					
							 $lang_entry = array(
							'co_name_'.$get_lang_code => Input::get('country_name_'.$get_lang_name),
							); 
							
							$entry  = array_merge($entry,$lang_entry);
					}
				}
                    
                    $countryname    = Input::get('country_name');
                    $countrycode    = Input::get('ccode');
                    $currencysymbol = Input::get('cursymbol');
                    $currencycode   = Input::get('curcode');
                    $check_exist_country_name = Country::check_exist_country_name_update($countryname, $id);
                    $check_exist_country_code = Country::check_exist_country_code_update($countrycode, $id);
                                     
                    if (count($check_exist_country_name)>0) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY_ALREADY_EXISTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_COUNTRY_ALREADY_EXISTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY_ALREADY_EXISTS');
			}	
                        return Redirect::to('edit_country/' . $id)->withMessage($session_message)->withInput();
                    } else if (count($check_exist_country_code)>0) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY_CODE_ALREADY_EXISTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_COUNTRY_CODE_ALREADY_EXISTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY_CODE_ALREADY_EXISTS');
			}
                        return Redirect::to('edit_country/' . $id)->withMessage($session_message)->withInput();
                    } else {
                        $affected = Country::update_country_detail($id, $entry);
						if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
						{ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
						}  
						else 
						{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
						}
                        return Redirect::to('manage_country')->with('updated_result', $session_message);
                        
                    }
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
}
