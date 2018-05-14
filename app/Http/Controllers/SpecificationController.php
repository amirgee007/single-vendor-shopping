<?php
namespace App\Http\Controllers;
use DB;
use Session;
use App\Http\Models;
use App\Register;
use App\Home;
use Lang;
use App\Footer;
use App\Settings;
use App\Merchant;
use App\Blog;
use App\Dashboard;
use App\Admodel;
use App\Deals;
use App\Auction;
use App\Customer;
use App\Attributes;
use App\Specification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class SpecificationController extends Controller
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
    public function add_specification()
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
            $groupresult = Specification::get_specification_group();
            
            return view('siteadmin.add_specification')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('groupresult', $groupresult);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function manage_specification()
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
            $specificationresult = Specification::viewjoin_specification_detail();
            
            return view('siteadmin.manage_specification')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('specificationresult', $specificationresult);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_specification($id)
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
            
            $specificationresult = Specification::showindividual_specification_detail($id);
            $groupresult         = Specification::get_specification_group();
            return view('siteadmin.edit_specification')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('specificationresult', $specificationresult)->with('groupresult', $groupresult)->with('id', $id);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function delete_specification($id)
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
            $affected            = Specification::delete_specification_detail($id);
            $specificationresult = Specification::view_specification_detail($id);
                     
            return Redirect::to('manage_specification')->with('delete_result', 'Record Deleted Successfully');
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function update_specification()
    {
        if (Session::has('userid')) {
			
			 $data = Input::except(array(
                '_token'
            ));
			
			 $id = Input::get('id');
			 
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
            
            $inputs = Input::all();
			
			 $rule = array(
                'spedit_name' => 'required',
                'speditgroup_name' => 'required',
				'spedit_order' => 'required|numeric'
            );
			
			$get_active_lang = 	Home::get_active_lang();
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'spedit_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
				}
			}
			 $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_specification/' . $id)->withErrors($validator->messages())->withInput();
                
            } else {
            
            $entry = array(
                'sp_name' => Input::get('spedit_name'),
                'sp_spg_id' => Input::get('speditgroup_name'),
                'sp_order' => Input::get('spedit_order')
            );
			
			$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'sp_name_'.$get_lang_code => Input::get('spedit_name_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
            
           
            $check_name  = Input::get('spedit_name');
            $groupid     = Input::get('speditgroup_name');
            $check_exist = Specification::check_exist_update($check_name, $groupid, $id);
            
            if ($id != "") {
                if (count($check_exist)>0) {
					if(Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION_NAME_EXIST')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION_NAME_EXIST');
					}
					else 
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION_NAME_EXIST');
					}
                    return Redirect::to('edit_specification/' . $id)->withMessage($session_message)->withInput();
                } else {
                    $check_order = Input::get('spedit_order');
                    $order_exist = Specification::check_exist_individualorder_update($check_order, $groupid, $id);
                    if (count($order_exist)>0) {
						
						if(Lang::has(Session::get('admin_lang_file').'.BACK_SORT_ORDER_EXIST')!= '') 
						{
							$session_message = trans(Session::get('admin_lang_file').'.BACK_SORT_ORDER_EXIST');
						}
						else 
						{
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SORT_ORDER_EXIST');
						}
                        return Redirect::to('edit_specification/' . $id)->withMessage($session_message)->withInput();
                    } else {
                        $affected = Specification::update_specification_detail($id, $entry);
                        if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
						{
							$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
						}
						else 
						{
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
						}
                        return Redirect::to('manage_specification')->with('updated_result', $session_message);
                    }
                }
            }
			} 
            
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    
    public function add_specification_submit()
    {
        if (Session::has('userid')) {
            
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'sp_name' => 'required',
                'spgroup_name' => 'required',
				'sortorder' => 'required|numeric'
            );
			
			$get_active_lang = 	Home::get_active_lang();
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'sp_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
				}
			}
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_specification')->withErrors($validator->messages())->withInput();
                
            } else {
                $entry = array(
                    'sp_name' => Input::get('sp_name'),
                    'sp_spg_id' => Input::get('spgroup_name'),
                    'sp_order' => Input::get('sortorder')
                );
				
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'sp_name_'.$get_lang_code => Input::get('sp_name_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
                
                $check_name  = Input::get('sp_name');
                $groupid     = Input::get('spgroup_name');
                $check_exist = Specification::check_exist_individual($check_name, $groupid);
                if (count($check_exist)>0) {
					if(Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION_NAME_EXIST')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION_NAME_EXIST');
					}
					else 
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION_NAME_EXIST');
					}
                    return Redirect::to('add_specification')->withMessage($session_message)->withInput();
                } else {
                    $check_order = Input::get('sort_order');
                    $order_exist = Specification::check_exist_individualorder($check_order, $groupid);
                    if (count($order_exist)>0) {
						if(Lang::has(Session::get('admin_lang_file').'.BACK_SORT_ORDER_EXIST')!= '') 
						{
							$session_message = trans(Session::get('admin_lang_file').'.BACK_SORT_ORDER_EXIST');
						}
						else 
						{
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SORT_ORDER_EXIST');
						}
                        return Redirect::to('add_specification')->withMessage($session_message)->withInput();
                    } else {
						if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
						{
							$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
						}
						else 
						{
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
						}
                        $return = Specification::save_specification_detail($entry);
                        return Redirect::to('manage_specification')->with('insert_result', $session_message);
                    }
                }
                
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_specification_group()
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
			$main_category	= Specification::get_main_cat_for_specification_group();
          /*  print_r($main_category);die; */
            return view('siteadmin.add_specification_group')->with('adminheader', $adminheader)->with('main_category', $main_category)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }
    }
	public function get_related_subcategory()
    {
        if (Session::has('userid')) {
			$category_id=Input::get('mc_cat_id');
			$sec_main_category=Specification::get_sec_main_cat_for_specification_group($category_id);
			if(count($sec_main_category)!=0)
			{
				echo "<option value=''>-- Select -- </option>";
				foreach($sec_main_category as $category)
				{
					echo '<option value="'.$category->smc_id.'">'.ucfirst(strtolower($category->smc_name)).'</option>';
				}
			}
			else
			{
				echo'<option value="">No second sub-category found!</option>';
			}
			print_r($sec_main_category);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_specification_group_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'main_category' => 'required|numeric',
                'second_main_category' => 'required|numeric',
                'group_name' => 'required',
                'sort_order' => 'required|numeric'
            );
			
			$get_active_lang = 	Home::get_active_lang();
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'group_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_specification_group')->withErrors($validator->messages())->withInput();
            } else {
                $entry       = array(
                    'spg_name' => Input::get('group_name'),
                    'spg_order' => Input::get('sort_order'),
                    'sp_mc_id' => Input::get('main_category'),
                    'sp_smc_id' => Input::get('second_main_category'),
                    'show_on_filter' => Input::get('show_on_filter')
                );
				
				
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'spg_name_'.$get_lang_code => Input::get('group_name_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
                $check_name  = Input::get('group_name');
                $check_exist = Specification::check_exist_group($check_name);

                if (count($check_exist)>0) {
					if(Lang::has(Session::get('admin_lang_file').'.BACK_GROUP_NAME_EXIST')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_GROUP_NAME_EXIST');
					}
					else 
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_GROUP_NAME_EXIST');
					}
                    return Redirect::to('add_specification_group')->withMessage($session_message)->withInput();
                } else {
                    $check_order = Input::get('sort_order');
                    $order_exist = Specification::check_exist_order($check_order);

                    if (count($order_exist)>0) {
						if(Lang::has(Session::get('admin_lang_file').'.BACK_SORT_ORDER_EXIST')!= '') 
						{
							$session_message = trans(Session::get('admin_lang_file').'.BACK_SORT_ORDER_EXIST');
						}
						else 
						{
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SORT_ORDER_EXIST');
						}
                        return Redirect::to('add_specification_group')->withMessage($session_message)->withInput();
                    } else {
						if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
						{
							$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
						}
						else 
						{
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
						}
                        $return = Specification::save_specification_group($entry);
                        return Redirect::to('manage_specification_group')->with('insert_result', $session_message);
                    }
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function manage_specification_group()
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
            $adminheader         = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus      = view('siteadmin.includes.admin_left_menus');
            $adminfooter         = view('siteadmin.includes.admin_footer');
			$main_cat_arr		 =array();
			$main_category	= Specification::get_main_cat_for_specification_group();
			if($main_category!="")
			{
				foreach($main_category as $category)
				{
					$main_cat_arr[$category->mc_id]=$category->mc_name;
				}
			}
			$main_category=$main_cat_arr;
			$sec_main_cat_arr		 =array();
			$sec_main_category	= Specification::get_sec_main_cat_for_specification_group_manage();
			if($sec_main_category!="")
			{
				foreach($sec_main_category as $sec_category)
				{
					$sec_main_cat_arr[$sec_category->smc_id]=$sec_category->smc_name;
				}
			}
			$sec_main_category=$sec_main_cat_arr;

			
            $specificationresult = Specification::get_specification_group();

            return view('siteadmin.manage_specification_group')->with('adminheader', $adminheader)->with('main_category', $main_category)->with('sec_main_category', $sec_main_category)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('specificationresult', $specificationresult);
            
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_specification_group($id)
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
			
            $specificationresult = Specification::showindividual_specification_group_detail($id);
			$main_category	= Specification::get_main_cat_for_specification_group();
			$main_cat_id=$specificationresult[0]->sp_mc_id;
            $sec_main_category	= Specification::get_sec_main_cat_for_specification_group($main_cat_id);
            return view('siteadmin.edit_specification_group')->with('main_category', $main_category)->with('sec_main_category', $sec_main_category)->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('specificationresult', $specificationresult)->with('id', $id);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_specification_group_submit()
    {
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $rule      = array(
                'main_category' => 'required',
                'second_main_category' => 'required',
                'group_name' => 'required',
                'sort_order' => 'required|numeric'
            );
			
			$get_active_lang = 	Home::get_active_lang();
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'group_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
			
            $id        = Input::get('spg_id');
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_specification_group/' . $id)->withErrors($validator->messages())->withInput();
            } else {
                $entry       = array(
                    'spg_name' => Input::get('group_name'),
                    'sp_mc_id' => Input::get('main_category'),
                    'sp_smc_id' => Input::get('second_main_category'),
                    'spg_order' => Input::get('sort_order'),
                    'show_on_filter' => Input::get('show_on_filter'),
                );
				
				
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'spg_name_'.$get_lang_code => Input::get('group_name_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
				
                $check_name  = Input::get('group_name');
                $check_exist = Specification::check_exist_group_update($check_name, $id);
                if (count($check_exist)>0) {
					if(Lang::has(Session::get('admin_lang_file').'.BACK_GROUP_NAME_EXIST')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_GROUP_NAME_EXIST');
					}
					else 
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_GROUP_NAME_EXIST');
					}
                    return Redirect::to('edit_specification_group/' . $id)->withMessage($session_message)->withInput();
                } else {
                    $check_order = Input::get('sort_order');
                    $order_exist = Specification::check_exist_order_update($check_order, $id);
                    if (count($order_exist)>0) {
						if(Lang::has(Session::get('admin_lang_file').'.BACK_SORT_ORDER_EXIST')!= '') 
						{
							$session_message = trans(Session::get('admin_lang_file').'.BACK_SORT_ORDER_EXIST');
						}
						else 
						{
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SORT_ORDER_EXIST');
						}
                        return Redirect::to('edit_specification_group/' . $id)->withMessage($session_message)->withInput();
                    } else {
						if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
						{
							$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
						}
						else 
						{
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
						}
                        $return = Specification::update_specification_group($id, $entry);
                        return Redirect::to('manage_specification_group')->with('updated_result', $session_message);
                    }
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function delete_specification_group($id)
    {
        if (Session::has('userid')) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
            $affected = Specification::delete_specification_group_detail($id);
            return Redirect::to('manage_specification_group')->with('delete_result', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }
}
