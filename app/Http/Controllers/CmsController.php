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
use App\Cms;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class CmsController extends Controller
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
    public function add_cms_page()
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
            return view('siteadmin.cms_add_page')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    
   /*  public function cms_add_page_submit()
    {
        if (Session::has('userid')) {
            
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'page_title' => 'required',
				'page_title_french' => 'required',
                'page_description' => 'required',
				'page_description_french' => 'required',
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_cms_page')->withErrors($validator->messages())->withInput();
            } else {
                $now               = date('Y-m-d H:i:s');
                $entry             = array(
                    'cp_title' => Input::get('page_title'),
					'cp_title_fr' => Input::get('page_title_french'),
                    'cp_description' => Input::get('page_description'),
					'cp_description_fr' => Input::get('page_description_french'),
                    'cp_created_date' => $now,
                );
                $check_title       = Input::get('page_title');
                $check_title_exist = Cms::check_cms_page($check_title);
                if ($check_title_exist) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_TITLE_ALREADY_EXIST')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_TITLE_ALREADY_EXIST');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TITLE_ALREADY_EXIST');
			}
                    return Redirect::to('add_cms_page')->with('error_message',$session_message)->withInput();
                } else {
                    $return = Cms::add_cms_page($entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}
                    return Redirect::to('manage_cms_page')->with('insert_result', $session_message);
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
        
    } */
    
	public function cms_add_page_submit()
    {
        if (Session::has('userid')) {
            
            $data = Input::except(array(
                '_token'
            ));
			
			$get_active_lang = DB::table('nm_language')->where('lang_status',1)->where('pack_lang',0)->get();
			$lang_rule = array();	
			
			$rule = array(
				'page_title' => 'required',
				'page_description' => 'required',
			);
			
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
				$lang_rule = array(
					'page_title_'.$get_lang_name => 'required',
				     'page_description_'.$get_lang_name => 'required',
				);
					/* $rule['page_title_'.$get_lang_name] = 'required';
					$rule['page_description_'.$get_lang_name] = 'required'; */
					$rule  = array_merge($rule,$lang_rule); 
			
				}
			} 
									
		
            $validator = Validator::make($data,$rule);
			
            if ($validator->fails()) {
            	
                return Redirect::to('add_cms_page')->withErrors($validator->messages())->withInput();
            } else {
                $now               = date('Y-m-d H:i:s');
                $entry             = array(
                    'cp_title' => Input::get('page_title'),
                    'cp_description' => Input::get('page_description'),
                    'cp_created_date' => $now,
                );
				
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'cp_title_'.$get_lang_code => Input::get('page_title_'.$get_lang_name),
						'cp_description_'.$get_lang_code => Input::get('page_description_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
				
				$check_title  = array(Input::get('page_title'));
				
				/*  if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_code;
				
						$lang_check_title  = array(Input::get('page_title_'.$get_lang_name)
						);
						
					}
				} 
		
				$check_title  = array_merge($check_title,$lang_check_title); 
				 */
                $check_title_exist = Cms::check_cms_page($check_title);
				
            if (count($check_title_exist) > 0) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_TITLE_ALREADY_EXIST')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_TITLE_ALREADY_EXIST');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TITLE_ALREADY_EXIST');
			}
                    return Redirect::to('add_cms_page')->with('error_message',$session_message)->withInput();
                } else {
                    $return = Cms::add_cms_page($entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}
                    return Redirect::to('manage_cms_page')->with('insert_result', $session_message);
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
	
	
    public function manage_cms_page()
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
            $reurn          = Cms::get_cms_page();
            return view('siteadmin.manage_cms_page')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('result', $reurn);
            
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_cms_page($id)
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
            $reurn          = Cms::getsingle_cms_page($id);
            return view('siteadmin.cms_edit_page')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('result', $reurn);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
   /*  public function edit_cms_page_submit()
    {
        if (Session::has('userid')) {
            $id   = Input::get('cms_id');
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'page_title' => 'required',
				'page_title_french' => 'required',
                'page_description' => 'required',
				'page_description_french' => 'required',
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_cms_page/' . $id)->withErrors($validator->messages())->withInput();
            } else {
                
                $now               = date('Y-m-d H:i:s');
                $entry             = array(
                    'cp_title' => Input::get('page_title'),
					'cp_title_fr' => Input::get('page_title_french'),
                    'cp_description' => Input::get('page_description'),
					'cp_description_fr' => Input::get('page_description_french'),
                    'cp_created_date' => $now
                );
                $check_title       = Input::get('page_title');
                $check_title_exist = Cms::check_cms_page_update($id, $check_title);
                if ($check_title_exist) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_TITLE_ALREADY_EXIST')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_TITLE_ALREADY_EXIST');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TITLE_ALREADY_EXIST');
			}
                    return Redirect::to('edit_cms_page/' . $id)->with('error_message', $session_message)->withInput();
                } else {
                    $reurn = Cms::update_cms_page($id, $entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
                    return Redirect::to('manage_cms_page')->with('updated_result',$session_message);
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    } */
	
	 public function edit_cms_page_submit()
    {
        if (Session::has('userid')) {
            $id   = Input::get('cms_id');
            $data = Input::except(array(
                '_token'
            ));
			
			 $rule = array(
                'page_title' => 'required',
                'page_description' => 'required',
            );
			
			
			//$get_active_lang = 	Home::get_active_lang();
			$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'page_title_'.$get_lang_name => 'required',
					'page_description_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			

            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_cms_page/' . $id)->withErrors($validator->messages())->withInput();
            } else {
                
                $now               = date('Y-m-d H:i:s');
                $entry             = array(
                    'cp_title' => Input::get('page_title'),
                    'cp_description' => Input::get('page_description'),
                    'cp_created_date' => $now
                );
				
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'cp_title_'.$get_lang_code => Input::get('page_title_'.$get_lang_name),
						'cp_description_'.$get_lang_code => Input::get('page_description_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
				
                $check_title       = Input::get('page_title');
                $check_title_exist = Cms::check_cms_page_update($id, $check_title);
              
			if (count($check_title_exist) > 0) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_TITLE_ALREADY_EXIST')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_TITLE_ALREADY_EXIST');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TITLE_ALREADY_EXIST');
			}
                    return Redirect::to('edit_cms_page/' . $id)->with('error_message', $session_message)->withInput();
                } else {
                    $reurn = Cms::update_cms_page($id, $entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
                    return Redirect::to('manage_cms_page')->with('updated_result',$session_message);
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function block_cms_page($id, $status)
    {
        if (Session::has('userid')) {
            $entry = array(
                'cp_status' => $status
            );
            Cms::block_cms_page($id, $entry);
            if ($status == 1) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_PAGE_ACTIVATED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_PAGE_ACTIVATED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PAGE_ACTIVATED');
			}
                return Redirect::to('manage_cms_page')->with('block_result', $session_message);
            } else {
				
				if(Lang::has(Session::get('admin_lang_file').'.BACK_PAGE_BLOCKED')!= '') 
				{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_PAGE_BLOCKED');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PAGE_BLOCKED');
				}
                return Redirect::to('manage_cms_page')->with('block_result',$session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    /** Multiple block */
    public function block_cms_page_multiple()
    {
    	 if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=0;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $entry = array(
                'cp_status' => $status
            ); 
             $block_cms_page=Cms::block_cms_page($id, $entry);
            
                   }
            if($block_cms_page>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }
     }


    /** Multiple unblock */
    public function unblock_cms_page_multiple()
    {
    	 if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=1;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $entry = array(
                'cp_status' => $status
            ); 
             $unblock_cms_page=Cms::block_cms_page($id, $entry);
            
                   }
            if($unblock_cms_page>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }
     }


    public function delete_cms_page($id)
    {
        if (Session::has('userid')) {
            Cms::delete_cms_page($id);
		if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}	
            return Redirect::to('manage_cms_page')->with('delete_result', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }


    /**delete multiple**/
		public function delete_cms_page_multiple()
			{ 
				if (Session::has('userid'))
				{
					$data=Input::get('val'); 
					 for($i=0;$i<count($data);$i++)
					 {
				$id=$data[$i];
				$delete= DB::table('nm_cms_pages')->where('cp_id', '=', $id)->delete();

					 }
					if(count($delete)>0){
					echo "1";}
					else {
					echo "0";}

				}


			}
    
    public function aboutus_page()
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
            $reurn          = Cms::get_aboutus_page();
            return view('siteadmin.aboutus_page')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('result', $reurn);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function terms()
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
            $reurn          = Cms::get_terms_page();
            
            return view('siteadmin.terms')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('result', $reurn);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function terms_update()
    {
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $rule      = array(
                'terms_content' => 'required',
            );
			
			$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'terms_content_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
			
			
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('terms')->withErrors($validator->messages())->withInput();
            } else {
                //exit();
                $entry = array(
                    'tr_description' => Input::get('terms_content'),
                );
				
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'tr_description_'.$get_lang_code => Input::get('terms_content_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
				
                Cms::update_terms_page($entry);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
                return Redirect::to('terms')->with('update_result',$session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function aboutus_page_update()
    {
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $rule      = array(
                'aboutus_data' => 'required',
                
            );
			
			$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'aboutus_data_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('aboutus_page')->withErrors($validator->messages())->withInput();
            } else {
                $entry = array(
                    'ap_description' => Input::get('aboutus_data'),
                );
				
				
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'ap_description_'.$get_lang_code => Input::get('aboutus_data_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
                Cms::update_aboutus_page($entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
                return Redirect::to('aboutus_page')->with('update_result',$session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
}
