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
class CategoryController extends Controller
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

    public function add_category()
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
            return view('siteadmin.add_category')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function manage_category()
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
		
			// DB::connection()->enableQueryLog();
			// $a = Category::maincatg_list();
			// $query = DB::getQueryLog();
			// echo "query is"; print_r($query);
			// echo "result is"; print_r($a);
			
            $maincatg_list     = Category::maincatg_list(); //returns all main cat
			
            $maincatg_sub_list = Category::maincatg_sub_list($maincatg_list); //returns based on top cat
			
            return view('siteadmin.manage_categories')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('maincatg_list', $maincatg_list)->with('maincatg_sub_list', $maincatg_sub_list);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function check_avail_cat_name(){
        $cat_name = Input::get('category_name');
        $check    = Category::check_avail_cat_name($cat_name);
        if($check==1){
			if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS');
			}
            echo $session_message;
        }
    }
    public function add_category_submit()
    {
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $rule      = array(
                'category_name' => 'required',
                'category_status' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|image_size:'.$this->top_category_width.','.$this->top_category_height.''
            );
			
			$get_active_lang = 	Home::get_active_lang();
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'category_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
            $validator = Validator::make($data, $rule);
            $cat_name = Input::get('category_name');
			$cat_name_fr = Input::get('category_name_french');
            $check    = Category::check_avail_cat_name($cat_name);
            if ($validator->fails()) {
                return Redirect::to('add_category')->withErrors($validator->messages())->withInput();
            }elseif($check==1){
				if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS');
			}
                return Redirect::to('add_category')->withInput()->with('error',$session_message);
            }
            else {
                $inputs = Input::all();
                $file   = Input::file('image');
                if ($file != '') {
                    $time=time();
					$filename = 'Top_category_' .$time.'.'. strtolower($file->getClientOriginalExtension()); 
                    $destinationPath = './public/assets/categoryimage/';
                    Image::make($file)->save('./public/assets/categoryimage/'.$filename,$this->image_compress_quality);
                    $deal            = '1,1,1';
                    $entry           = array(
                        'mc_name' => Input::get('category_name'),
                        'mc_type' => $deal,
                        'mc_img' => $filename,
                        'mc_status' => Input::get('category_status')
                    );
					
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'mc_name_'.$get_lang_code => Input::get('category_name_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
                    $return          = Category::save_category($entry);
					if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
					{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
				}
                    return Redirect::to('manage_category')->with('success', $session_message);
                } else {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_FIELD_REQUIRED');
			}
                    return Redirect::to('add_category')->with('error', $session_message);
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_category($id)
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $catg_details   = Category::selectedcatg_list($id);
            return view('siteadmin.edit_category')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('catg_details', $catg_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_category_submit()
    {
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $id        = Input::get('catg_id');
            $rule      = array(
                'category_name' => 'required',
                'category_status' => 'required',
				'file' => 'image|mimes:jpeg,png,jpg|image_size:'.$this->top_category_width.','.$this->top_category_height.''
            );
			
			$get_active_lang = 	Home::get_active_lang();
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'category_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_category/' . $id)->withErrors($validator->messages());
            } else {
                $inputs = Input::all();
                $deal   = '1,1,1';
                $file   = Input::file('file');
                $id     = Input::get('catg_id');
                if ($file != '') {
                    $time=time();
					//$filename = 'Top_category_' .$time.'_'. $file->getClientOriginalName();
					$filename = 'Top_category_' .$time.'.'. strtolower($file->getClientOriginalExtension()); 
                    $destinationPath = './public/assets/categoryimage/';
					$old_top_category = Input::get('old_top_category');
					if(file_exists($destinationPath.$old_top_category))
					{
						@unlink($destinationPath.$old_top_category);
					}
                    Image::make($file)->save('./public/assets/categoryimage/'.$filename,$this->image_compress_quality);
                    $entry           = array(
                        'mc_name' => Input::get('category_name'),
                        'mc_type' => $deal,
                        'mc_img' => $filename,
                        'mc_status' => Input::get('category_status')
                    );
					
					$lang_entry = array();
					if(!empty($get_active_lang)) { 
						foreach($get_active_lang as $get_lang) {
							$get_lang_name = $get_lang->lang_name;
							$get_lang_code = $get_lang->lang_code;
					
							 $lang_entry = array(
							'mc_name_'.$get_lang_code => Input::get('category_name_'.$get_lang_name),
							); 
							
							$entry  = array_merge($entry,$lang_entry);
						}
					}
					
					
                } else {
                    $entry = array(
                        'mc_name' => Input::get('category_name'),
                        'mc_type' => $deal,
                        'mc_status' => Input::get('category_status')
                    );
					
					$lang_entry = array();
					if(!empty($get_active_lang)) { 
						foreach($get_active_lang as $get_lang) {
							$get_lang_name = $get_lang->lang_name;
							$get_lang_code = $get_lang->lang_code;
					
							 $lang_entry = array(
							'mc_name_'.$get_lang_code => Input::get('category_name_'.$get_lang_name),
							); 
							
							$entry  = array_merge($entry,$lang_entry);
						}
					}
                }
                $return = Category::update_category_detail($entry, $id);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
                return Redirect::to('manage_category')->with('success', $session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public static function status_category_submit($id, $status){

        if(Session::has('userid')) {
            $return = Category::status_category_submit($id, $status);
           if ($status == 1) {
			  /*if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') { 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			  }else{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			  }*/
                return Redirect::to('manage_category')->with('success', 'Record Unblocked Successfully');
            }else if ($status == 0) {
			    /*if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') { 
				    $session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			    }else{ 
				    $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			    }*/
                return Redirect::to('manage_category')->with('success','Record Blocked Successfully');
            }
           
        } else {
            return Redirect::to('siteadmin');
        }
    }

     public static function block_status_category_submit(){

     	if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=0;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
             
             $block_Category_admin=Category::status_category_submit($id, $status);      }
            if($block_Category_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }

     }

     public static function unblock_status_category_submit()
     {
     	if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=1;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
             
             $block_Category_admin=Category::status_category_submit($id, $status);      }
            if($block_Category_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }


     }
    
    public static function delete_category($id)
    {
        if (Session::has('userid')) {
            $return = Category::delete_category($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
            return Redirect::to('manage_category')->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_main_category($id)
    {
        if (Session::has('userid')) {
            $adminheader           = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus        = view('siteadmin.includes.admin_left_menus');
            $adminfooter           = view('siteadmin.includes.admin_footer');
            $add_main_catg_details = Category::selectedcatg_list($id);
            return view('siteadmin.add_maincategory')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('add_main_catg_details', $add_main_catg_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_main_category_submit()
    {
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $rule      = array(
                'main_catg_name' => 'required',
                'catg_status' => 'required'
            );
			
			

			$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'main_catg_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_main_category/' . Input::get('catg_id'))->withErrors($validator->messages())->withInput();
            }
            $cat_name = Input::get('catg_name');
            $main_cat_name=Input::get('main_catg_name');
            $check    = DB::table('nm_maincategory')->where('mc_name','=',$cat_name)->get();
            
            foreach($check as $cat) {
                $top_cat_id=$cat->mc_id; 
            }
           
            $check    = DB::table('nm_secmaincategory')->where('smc_name','=',$main_cat_name)
            ->where('smc_mc_id','=',$top_cat_id)->count();
            if($check>0){
                if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS');
            }  
            
             return Redirect::to('add_main_category/' . Input::get('catg_id'))->with('error',$session_message);
            }
            
             else {
                $inputs = Input::all();
                $entry  = array(
                    'smc_name' => Input::get('main_catg_name'),
                    'smc_status' => Input::get('catg_status'),
                    'smc_mc_id' => Input::get('catg_id')
                );
				
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'smc_name_'.$get_lang_code => Input::get('main_catg_name_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
                $return = Category::save_main_category($entry);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}
                return Redirect::to('manage_category')->with('success', $session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function manage_main_category($catg_id)
    {
		
        if (Session::has('userid')) {
		
            $adminheader        = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus     = view('siteadmin.includes.admin_left_menus');
            $adminfooter        = view('siteadmin.includes.admin_footer');
				
            $sub_maincatg_list  = Category::sub_maincatg_list($catg_id); 
			
            $subcatg_count_list = Category::subcatg_count_list($sub_maincatg_list);
			
			
			
		
            return view('siteadmin.manage_maincategory')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('sub_maincatg_list', $sub_maincatg_list)->with('subcatg_count_list', $subcatg_count_list);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_main_category($id)
    {
        if (Session::has('userid')) {
            $adminheader            = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus         = view('siteadmin.includes.admin_left_menus');
            $adminfooter            = view('siteadmin.includes.admin_footer');
            $edit_main_catg_details = Category::edit_main_catg_details($id);
            return view('siteadmin.edit_maincategory')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('edit_main_catg_details', $edit_main_catg_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_main_category_submit()
    {
        if (Session::has('userid')) {
            $data         = Input::except(array(
                '_token'
            ));
            $catg_id      = Input::get('catg_id');
            $main_catg_id = Input::get('main_catg_id');
            $rule         = array(
                'main_catg_name' => 'required',
                'catg_status' => 'required'
            );
			
			$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'main_catg_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
            $validator    = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_main_category/'.$main_catg_id)->withErrors($validator->messages())->withInput();
            } else {
                $inputs = Input::all();
                $entry  = array(
                    'smc_name' => Input::get('main_catg_name'),
                    'smc_status' => Input::get('catg_status')
                );
				
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'smc_name_'.$get_lang_code => Input::get('main_catg_name_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
			
            $cat_name = Input::get('catg_name');
            $main_cat_name=Input::get('main_catg_name');
            $check    = DB::table('nm_maincategory')->where('mc_name','=',$cat_name)->get();
            
            foreach($check as $cat) {
                $top_cat_id=$cat->mc_id; 
            }
           
            $check    = DB::table('nm_secmaincategory')->where('smc_name','=',$main_cat_name)
            ->where('smc_mc_id','=',$top_cat_id)->count();
            if($check>0){
                if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS');
            }  
            
             return Redirect::to('edit_main_category/' . Input::get('catg_id'))->with('error',$session_message);
            }
          $return = Category::save_edit_main_category($entry, $main_catg_id);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
                return Redirect::to('manage_main_category/' . $catg_id)->with('success',$session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_sub_main_category($sub_id)
    {
        if (Session::has('userid')) {
            $adminheader          = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus       = view('siteadmin.includes.admin_left_menus');
            $adminfooter          = view('siteadmin.includes.admin_footer');
            $add_sub_catg_details = Category::add_sub_catg_details($sub_id);
            return view('siteadmin.add_subcategory')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('add_sub_catg_details', $add_sub_catg_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_sub_category_submit()
    {
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $id        = Input::get('catg_id');
            $main_id   = Input::get('main_catg_id');
            $rule      = array(
                'main_catg_name' => 'required',
                'catg_status' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|image_size:'.$this->sub_category_width.','.$this->sub_category_height.''
            );
			
			$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'main_catg_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_sub_main_category/' . $id)->withErrors($validator->messages())->withInput();
            } 


            $cat_name = Input::get('catg_name');
            $main_cat_name=Input::get('main_catg_name');
            $check    = DB::table('nm_secmaincategory')->where('smc_name','=',$cat_name)->get();
            
            foreach($check as $cat) {
                $top_cat_id=$cat->smc_id; 
            }
           
            $check    = DB::table('nm_subcategory')->where('sb_name','=',$main_cat_name)
            ->where('sb_smc_id','=',$top_cat_id)->count();
            if($check>0){
                if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS');
            }  
            
             return Redirect::to('add_sub_main_category/' . $id)->with('error',$session_message);
            }
            else {
                $inputs = Input::all();
                $file   = Input::file('image');

                if($file!=''){
                    $time=time();
					$filename = 'Sup_category_' .$time.'_'. $file->getClientOriginalName();
                    $destinationPath    =   './public/assets/categoryimage/sub_category/';
                    Image::make($file)->save('./public/assets/categoryimage/sub_category/'.$filename,$this->image_compress_quality);

                     $entry  = array(
                        'sb_name' => Input::get('main_catg_name'),
                        'sb_status' => Input::get('catg_status'),
                        'sc_img'    => $filename,
                        'mc_id' => Input::get('main_catg_id'),
                        'sb_smc_id' => Input::get('catg_id')
                    );
					
					
					$lang_entry = array();
					if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'sb_name_'.$get_lang_code => Input::get('main_catg_name_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
                }else{
                     $entry  = array(
                        'sb_name' => Input::get('main_catg_name'), 
                        'sb_status' => Input::get('catg_status'),
                        'mc_id' => Input::get('main_catg_id'),
                        'sb_smc_id' => Input::get('catg_id')
                    );
					
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'sb_name_'.$get_lang_code => Input::get('main_catg_name_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
                }        

               
                $return = Category::save_sub_category($entry);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
    			{ 
    				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
    			}  
    			else 
    			{ 
    				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
    			}
                return Redirect::to('manage_sub_category/' . $id)->with('success',$session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public static function status_main_category_submit($id, $mc_id, $status)
    {
        if (Session::has('userid')) {
            $return = Category::status_main_category_submit($id, $status);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
            return Redirect::to('manage_main_category/' . $mc_id)->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public static function delete_main_category($id, $mc_id)
    {
        if (Session::has('userid')) {
            $return = Category::delete_main_category($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
            return Redirect::back()->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function manage_sub_category($catg_id)
    {
        if (Session::has('userid')) {
            $adminheader           = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus        = view('siteadmin.includes.admin_left_menus');
            $adminfooter           = view('siteadmin.includes.admin_footer');
			
            $sub_catg_list         = Category::sub_catg_list($catg_id);
	
            $secsubcatg_count_list = Category::secsubcatg_count_list($sub_catg_list);
            return view('siteadmin.manage_subcategory')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('sub_catg_list', $sub_catg_list)->with('secsubcatg_count_list', $secsubcatg_count_list);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_secsub_main_category($sub_id)
    {
        if (Session::has('userid')) {
            $adminheader              = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus           = view('siteadmin.includes.admin_left_menus')->with("routemenu", "settings");
            $adminfooter              = view('siteadmin.includes.admin_footer');
            $add_secsub_main_category = Category::add_secsub_main_category($sub_id);
            return view('siteadmin.add_secsubcategory')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('add_secsub_main_category', $add_secsub_main_category);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_secsub_main_category_submit()
    {
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $id        = Input::get('catg_id');
            $main_id   = Input::get('main_catg_id');
            $rule      = array(
                'main_catg_name' => 'required',
                'catg_status' => 'required'
            );
			
			$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'main_catg_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_secsub_main_category/' . $id)->withErrors($validator->messages())->withInput();
            } $cat_name = Input::get('catg_name');
            $main_cat_name=Input::get('main_catg_name');
            $check    = DB::table('nm_subcategory')->where('sb_name','=',$cat_name)->get();
            
            foreach($check as $cat) {
                $top_cat_id=$cat->sb_id; 
            }
           
            $check    = DB::table('nm_secsubcategory')->where('ssb_name','=',$main_cat_name)
            ->where('ssb_sb_id','=',$top_cat_id)->count();
            if($check>0){
                if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS');
            }  
            
             return Redirect::to('add_secsub_main_category/' . $id)->with('error',$session_message);
            } else {
                $inputs = Input::all();
                $entry  = array(
                    'ssb_name' => Input::get('main_catg_name'),
                    'ssb_status' => Input::get('catg_status'),
                    'ssb_sb_id' => Input::get('catg_id'),
                    'ssb_smc_id' => Input::get('top_catg_id'),
                    'mc_id' => Input::get('main_catg_id')
                );
				
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'ssb_name_'.$get_lang_code => Input::get('main_catg_name_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
                $return = Category::save_secsub_category($entry);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}
                return Redirect::to('manage_sub_category/' . $main_id)->with('success',$session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_secsub_main_category($id)
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
            $adminheader              = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus           = view('siteadmin.includes.admin_left_menus');
            $adminfooter              = view('siteadmin.includes.admin_footer');
            $edit_secsub_catg_details = Category::edit_secsub_catg_details($id);
            return view('siteadmin.edit_secsubcategory')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('edit_secsub_catg_details', $edit_secsub_catg_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_secsub_category_submit()
    {
        if (Session::has('userid')) {
            $data         = Input::except(array(
                '_token'
            ));
            $catg_id      = Input::get('catg_id');
            $main_catg_id = Input::get('main_catg_id');
            $rule         = array(
                'main_catg_name' => 'required',
                'file' => 'image|mimes:jpeg,png,jpg|image_size:'.$this->sub_category_width.','.$this->sub_category_height.''
            );
			
			$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'main_catg_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
            $validator    = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_secsub_main_category/' . $catg_id)->withErrors($validator->messages())->withInput();
            } 
            $cat_name = Input::get('catg_name');
            $main_cat_name=Input::get('main_catg_name');
            $check    = DB::table('nm_secmaincategory')->where('smc_name','=',$cat_name)->get();
            
            foreach($check as $cat) {
                $top_cat_id=$cat->smc_id; 
            }
           
            $check    = DB::table('nm_subcategory')->where('sb_name','=',$main_cat_name)
            ->where('sb_smc_id','=',$top_cat_id)->count();
            if($check>0){
                if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS');
            }  
            
             return Redirect::to('edit_secsub_main_category/' . $catg_id)->with('error',$session_message);
            }



            else {
                $inputs     = Input::all();
                $file       = Input::file('file');
                $existImg   = Input::get('existImg');
               /* $entry  = array(
                    'sb_name' => Input::get('main_catg_name'),
					'sb_name_fr' => Input::get('main_catg_name_french'),
                    'sb_status' => Input::get('catg_status')
                );*/

                if ($file != '') {
                    $time=time();
					$filename = 'Sub_category_' .$time.'_'. $file->getClientOriginalName();
                    $destinationPath    =   './public/assets/categoryimage/sub_category/';
					$old_sub_category = Input::get('existImg');
					if(file_exists($destinationPath.$old_sub_category))
					{
						@unlink($destinationPath.$old_sub_category);
					}
                    Image::make($file)->save('./public/assets/categoryimage/sub_category/'.$filename,$this->image_compress_quality);
                       
                    $entry  = array(
                        'sb_name'       =>  Input::get('main_catg_name'),
                        'sc_img'        =>  $filename,
                        'sb_status'     =>  Input::get('catg_status')
                    );
					
					$lang_entry = array();
					if(!empty($get_active_lang)) { 
						foreach($get_active_lang as $get_lang) {
							$get_lang_name = $get_lang->lang_name;
							$get_lang_code = $get_lang->lang_code;
					
							 $lang_entry = array(
							'sb_name_'.$get_lang_code => Input::get('main_catg_name_'.$get_lang_name),
							); 
							
							$entry  = array_merge($entry,$lang_entry);
					}
				}
				
                } else {
                     $entry  = array(
                        'sb_name'       =>  Input::get('main_catg_name'),
                        'sb_status'     =>  Input::get('catg_status')
                    );
					
					$lang_entry = array();
					if(!empty($get_active_lang)) { 
						foreach($get_active_lang as $get_lang) {
							$get_lang_name = $get_lang->lang_name;
							$get_lang_code = $get_lang->lang_code;
					
							 $lang_entry = array(
							'sb_name_'.$get_lang_code => Input::get('main_catg_name_'.$get_lang_name),
							); 
							
							$entry  = array_merge($entry,$lang_entry);
					}
				}
				
                }

                $return = Category::save_editsecsub_main_category($entry, $catg_id);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
    			{ 
    				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
    			}  
    			else 
    			{ 
    				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
    			}
                return Redirect::to('manage_sub_category/' . $main_catg_id)->with('success', $session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public static function status_subsec_category_submit($id, $mc_id, $status)
    {
        if (Session::has('userid')) {
            $return = Category::status_subsec_category_submit($id, $status);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
            return Redirect::to('manage_sub_category/' . $mc_id)->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public static function delete_subsec_category($id, $mc_id)
    {
        if (Session::has('userid')) {
            $return = Category::delete_subsec_category($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
            return Redirect::to('manage_sub_category/' . $mc_id)->with('success',$session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function manage_secsubmain_category($catg_id)
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
            $adminheader      = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);
            $adminleftmenus   = view('siteadmin.includes.admin_left_menus');
            $adminfooter      = view('siteadmin.includes.admin_footer');
            $secsub_catg_list = Category::secsub_catg_list($catg_id);
            
            return view('siteadmin.manage_secsubcategory')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('secsub_catg_list', $secsub_catg_list);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public static function status_secsub_category_submit($id, $mc_id, $status)
    {
        if (Session::has('userid')) {
			
            $return = Category::status_secsub_category_submit($id, $status);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
            return Redirect::to('manage_secsubmain_category/' . $mc_id)->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public static function delete_secsub_category($id, $mc_id)
    {
        if (Session::has('userid')) {
            $return = Category::delete_secsub_category($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
            return Redirect::to('manage_secsubmain_category/' . $mc_id)->with('success',$session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_sec1sub_main_category($id)
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
            $adminheader               = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus            = view('siteadmin.includes.admin_left_menus');
            $adminfooter               = view('siteadmin.includes.admin_footer');
            $edit_sec1sub_catg_details = Category::edit_sec1sub_catg_details($id);
            
            return view('siteadmin.edit_sec1subcategory')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('edit_sec1sub_catg_details', $edit_sec1sub_catg_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_sec1sub_category_submit()
    {
        if (Session::has('userid')) {
            $data         = Input::except(array(
                '_token'
            ));
            $catg_id      = Input::get('catg_id');
            $main_catg_id = Input::get('main_catg_id');
            $rule         = array(
                'main_catg_name' => 'required',
                'catg_status' => 'required'
                
            );
			
			$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'main_catg_name_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_sec1sub_main_category/' . $catg_id)->withErrors($validator->messages())->withInput();
                
            } 

            $cat_name = Input::get('catg_name');
            $main_cat_name=Input::get('main_catg_name');
            $check    = DB::table('nm_subcategory')->where('sb_name','=',$cat_name)->get();
            
            foreach($check as $cat) {
                $top_cat_id=$cat->sb_id; 
            }
           
            $check    = DB::table('nm_secsubcategory')->where('ssb_name','=',$main_cat_name)
            ->where('ssb_sb_id','=',$top_cat_id)->count();
            if($check>0){
                if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_CATEGORY_NAME_ALREADY_EXISTS');
            }  
            
             return Redirect::to('edit_sec1sub_main_category/' . $catg_id)->with('error',$session_message);
            }



             else {
                $inputs = Input::all();
                
                $entry  = array(
                    'ssb_name' => Input::get('main_catg_name'),
                    'ssb_status' => Input::get('catg_status')
                    
                );
				
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'ssb_name_'.$get_lang_code => Input::get('main_catg_name_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
                $return = Category::save_editsec1sub_main_category($entry, $catg_id);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
                return Redirect::to('manage_secsubmain_category/' . $main_catg_id)->with('success',$session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    //second subcategory Save Edited Image
    public function CropNdUpload_secSubcatImg(){
       
        $data = Input::except(array(
                '_token'
            ));
       // print_r($data);exit();
        $product_id     = Input::get('product_id');
        $img_id         = Input::get('img_id');
        $imgfileName    = Input::get('imgfileName'); //old image file name

        $imageData 		= Input::get('base64_imgData');
        $img_dat 		= explode(',',Input::get('base64_imgData'));
        $new_name 		= 'Sub_category_'.time().rand().'.jpg';

        //$imge =  file_put_contents('public/assets/categoryimage/sub_category/'.$new_name, base64_decode($img_dat[1]));
        $imageData 		= base64_decode($img_dat[1]);

        $file_path = './public/assets/categoryimage/sub_category/'.$new_name;
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
        if(file_exists('public/assets/categoryimage/sub_category/'.$new_name)){

            //upload small image
            list($width,$height)=getimagesize('public/assets/categoryimage/sub_category/'.$new_name);     
            

            //unlink old files starts
            if(file_exists('public/assets/categoryimage/sub_category/'.$imgfileName))
                unlink("public/assets/categoryimage/sub_category/".$imgfileName);
            //unlink old files ends

			//update in image table 
           
            $entry = array('sc_img' => $new_name );
            $return = Category::save_editsecsub_main_category($entry, $product_id);

            if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
             return Redirect::to('edit_secsub_main_category/'.$product_id)->with('block_message', $session_message);
        }

        exit();
    }
    /* Image  Crop , rorate and mamipulation ends */

    //category Image - Save Edited Image
    public function CropNdUpload_catImg(){
       
        $data = Input::except(array(
                '_token'
            ));
       // print_r($data);exit();
        $product_id     = Input::get('product_id');
        $img_id         = Input::get('img_id');
        $imgfileName    = Input::get('imgfileName'); //old image file name

        $imageData 		= Input::get('base64_imgData');
        $img_dat 		= explode(',',Input::get('base64_imgData'));
        $new_name 		= 'Top_category_'.time().rand().'.jpg';

        //$imge =  file_put_contents('public/assets/categoryimage/sub_category/'.$new_name, base64_decode($img_dat[1]));
        $imageData 		= base64_decode($img_dat[1]);

        $file_path = './public/assets/categoryimage/'.$new_name;
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
        if(file_exists('public/assets/categoryimage/'.$new_name)){

            //upload small image
            list($width,$height)=getimagesize('public/assets/categoryimage/'.$new_name);     
            

            //unlink old files starts
            if(file_exists('public/assets/categoryimage/'.$imgfileName))
                unlink("public/assets/categoryimage/".$imgfileName);
            //unlink old files ends

			//update in image table 
           
            $entry = array('mc_img' => $new_name );
            $return = Category::update_category_detail($entry, $product_id);

            if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
             return Redirect::to('edit_category/'.$product_id)->with('block_message', $session_message);
        }

        exit();
    }
    /* Image  Crop , rorate and mamipulation ends */


    
}
