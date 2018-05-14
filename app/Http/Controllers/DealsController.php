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

use Lang;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class DealsController extends Controller

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
    public function deals_dashboard()

    {

        if (Session::has('userid')) {

            if(Lang::has(Session::get('admin_lang_file').'.BACK_DEALS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEALS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEALS');
			}

            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);

            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');

            $adminfooter    = view('siteadmin.includes.admin_footer');

            $deal_count     = Deals::get_chart_details();
            $total_deals    = Deals::get_total_details();
            $inactive_cnt 	= Deals::get_deal_inactive_details(); //inactive deals
            $archievd_cnt   = Deals::get_archievd_deals();
            $sold_details   = Deals::get_sold_deals();
            $active_cnt     = Deals::get_active_details();

            $dealstdy       = Deals::get_today_deals();
			$dealstdy_payu  = Deals::get_today_deals_payu();
            $ordercod_tdy   = Deals::get_today_ordercod();
            
            $deals7days     = Deals::get_7days_deals();
			$deals7days_payu     = Deals::get_7days_deals_payu();

		
            $ordercod_7days = Deals::get_7days_ordercod();
			
			

            
            $deals30days     = Deals::get_30days_deals();
			$deals30days_payu     = Deals::get_30days_deals_payu();
            $ordercod_30days = Deals::get_30days_ordercod();

            $deals12mnth     = Deals::get_12mnth_deals();
			$deals12mnth_payu     = Deals::get_12mnth_deals_payu();
            $ordercod_12mnth = Deals::get_12mnth_ordercod();
           
            return view('siteadmin.deals_dashboard')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_cnt', $deal_count)->with('archievd_count', $archievd_cnt)->with('active_count', $active_cnt)
            ->with('dealstdy',$dealstdy)->with('ordercod_tdy',$ordercod_tdy)->with('deals7days',$deals7days)->with('ordercod_7days',$ordercod_7days)
            ->with('deals30days',$deals30days)->with('ordercod_30days',$ordercod_30days)->with('deals12mnth',$deals12mnth)->with('ordercod_12mnth',$ordercod_12mnth)
            ->with('total_deals',$total_deals)->with('sold_details',$sold_details)->with('inactive_cnt',$inactive_cnt)->with('dealstdy_payu',$dealstdy_payu)->with('deals7days_payu',$deals7days_payu)->with('deals30days_payu',$deals30days_payu)->with('deals12mnth_payu',$deals12mnth_payu);
          
        } else {

            return Redirect::to('siteadmin');

        }

        

    }

    

    public function add_deals()

    {
		
        if (Session::has('userid')) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_DEALS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEALS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEALS');
			}
            $adminheader      = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);

            $adminleftmenus   = view('siteadmin.includes.admin_left_menu_deals');

            $adminfooter      = view('siteadmin.includes.admin_footer');

            $category         = Deals::get_category();

            

            return view('siteadmin.add_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('action', 'save')->with('category', $category);

        } else {

            return Redirect::to('siteadmin');

        }

    }

    

    public function add_deals_submit()
    {
        if (Session::has('userid'))
		{
            $count            = Input::get('count');
			$filename_new_get = "";
			$file = Input::file('file');
			
			$count = count($file);
			$data = Input::except(array(
                '_token'
            ));
			for ($i=0; $i < $count; $i++)
			{
				$files = $file[$i];
				$input = array(
				'deal_image' => $file[$i]
			);
			$rules = array(
			'deal_image' => 'required|image|mimes:jpeg,png,jpg,gif|image_size:'.$this->deal_width.','.$this->deal_height.''
				);
				$validator = Validator::make($input, $rules);
			}		
			if ($validator->fails())
			{
				return Redirect::to('add_deals')->withErrors($validator->messages())->withInput();
			}
			
			foreach($file as $value)
			{
				$filename         = $value->getClientOriginalName();
				$move_img         = explode('.', $filename);
				//$time=time();
				$time=time().rand();
				$filename_new = 'Deal_'.$time.'.' . strtolower($value->getClientOriginalExtension());
				Image::make($value)->save('./public/assets/deals/'.$filename_new,$this->image_compress_quality);
				$filename_new_get .= $filename_new . "/**/";
			}
			$file_name_insert = $filename_new_get;
            $now                      = date('Y-m-d H:i:s');
            $inputs                   = Input::all();
            $deal_saving_price        = Input::get('originalprice') - Input::get('discountprice');
            $deal_discount_percentage = (($deal_saving_price / Input::get('originalprice')) * 100);
            $deal_discount_percentage=floor($deal_discount_percentage);
            $date                     = date('m/d/Y');
            $deal_title  = Input::get('title');
           
            $check_store = Deals::check_store($deal_title);

            if (count($check_store)>0) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_THE_PRODUCT_ALREADY_EXIST_IN_THE_STORE')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_THE_PRODUCT_ALREADY_EXIST_IN_THE_STORE');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THE_PRODUCT_ALREADY_EXIST_IN_THE_STORE');
			}
                return Redirect::to('add_deals')->with('success', $session_message);

            } else {

            	//Product Policy
	            $allow_cancel   = Input::get('allow_cancel');
	            $allow_return   = Input::get('allow_return');
	            $allow_replace  = Input::get('allow_replace');

	            $cancel_policy  = (Input::get('cancellation_policy')!=NUll)?Input::get('cancellation_policy'):'';
	            $return_policy  = (Input::get('return_policy')!=NUll)?Input::get('return_policy'):'';
	            $replace_policy = (Input::get('replacement_policy')!=NUll)?Input::get('replacement_policy'):'';

	            $cancel_days    = (Input::get('cancellation_days')!=NUll)?Input::get('cancellation_days'):'';
	            $return_days    = (Input::get('return_days')!=NUll)?Input::get('return_days'):'';
	            $replace_days   = (Input::get('replace_days')!=NUll)?Input::get('replace_days'):'';

	            $rules = $inputs = $policy_lang_entry = array();

	            if($allow_cancel=='1')
	            {
	                $cancel_rules = array('cancellation_policy' => 'required','cancellation_days' => 'required|numeric');
	                $rules = array_merge($rules,$cancel_rules);
	                $inputs = array_merge($inputs,array('cancellation_policy' =>$cancel_policy,'cancellation_days'=>$cancel_days ));
	            }if($allow_return=='1')
	            {
	                $return_rules = array('return_policy' => 'required','return_days' => 'required|numeric');
	                $rules = array_merge($rules,$return_rules);
	                $inputs = array_merge($inputs,array('return_policy' =>$return_policy,'return_days'=>$return_days ));
	            }if($allow_replace=='1')
	            {
	                $replace_rules = array('replace_policy' => 'required','replace_days' => 'required|numeric');
	                $rules = array_merge($rules,$replace_rules);
	                $inputs = array_merge($inputs,array('replace_policy' =>$replace_policy,'replace_days'=>$replace_days ));
	            }

	            $get_active_lang =  $this->get_active_language; 
	                $p_lang_entry = array();
	                if(!empty($get_active_lang)) { 
	                    foreach($get_active_lang as $get_lang) {
	                        $get_lang_name = $get_lang->lang_name;
	                        $get_lang_code = $get_lang->lang_code;
	                
	                        $policy_lang_entry = array(
	                        'cancel_policy_'.$get_lang_code => (Input::get('cancellation_policy_'.$get_lang_name)!=NUll)?Input::get('cancellation_policy_'.$get_lang_name):'',
	                        'return_policy_'.$get_lang_code => (Input::get('return_policy_'.$get_lang_name)!=NUll)?Input::get('return_policy_'.$get_lang_name):'',
	                        'replace_policy_'.$get_lang_code => (Input::get('replacement_policy_'.$get_lang_name)!=NUll)?Input::get('replacement_policy_'.$get_lang_name):'',
	                        
	                        );

	                        if($allow_cancel=='1')
	                        {
	                            $cancel_rules = array('cancellation_policy_'.$get_lang_name => 'required','cancellation_days' => 'required|numeric');
	                            $rules = array_merge($rules,$cancel_rules);
	                            $inputs = array_merge($inputs,array('cancellation_policy_'.$get_lang_name =>$policy_lang_entry['cancel_policy_'.$get_lang_code ]));
	                        }if($allow_return=='1')
	                        {
	                            $return_rules = array('return_policy_'.$get_lang_name => 'required','return_days' => 'required|numeric');
	                            $rules = array_merge($rules,$return_rules);
	                            $inputs = array_merge($inputs,array('return_policy_'.$get_lang_name =>$policy_lang_entry['replace_policy_'.$get_lang_code ]));
	                        }if($allow_replace=='1')
	                        {
	                            $replace_rules = array('replace_policy_'.$get_lang_name => 'required','replace_days' => 'required|numeric');
	                            $rules = array_merge($rules,$replace_rules);
	                            $inputs = array_merge($inputs,array('replace_policy_'.$get_lang_name =>$policy_lang_entry['replace_policy_'.$get_lang_code ]));
	                        }
	                        $p_lang_entry  = array_merge($p_lang_entry,$policy_lang_entry);
	                    }
	                }
	                

	            
	            
	            
	           // print_r($inputs);exit();

	            $validator = Validator::make($inputs, $rules);
	            
	            if ($validator->fails())
	            {
	                return Redirect::to('add_deals')->withErrors($validator->messages())->withInput();
	            }
	              $Product_SubCategory = "";
                  $Product_SecondSubCategory = "";

	             if(Input::get('subcategory') != ""){
                $Product_SubCategory = Input::get('subcategory');  
                }   
                if(Input::get('secondsubcategory') != ""){          
                $Product_SecondSubCategory = Input::get('secondsubcategory');  
                } 



                $Shipping_Amount = Input::get('Shipping_Amount');
            
                if ($Shipping_Amount == "") {
                
                    $Shipping_Amount = 0;
                }
                
                $entry  = array(
                    'deal_title' => Input::get('title'),
                    'deal_category' => Input::get('category'),
                    'deal_main_category' => Input::get('maincategory'),
                    'deal_sub_category' =>  $Product_SubCategory,
                    'deal_second_sub_category' => $Product_SecondSubCategory,
                    'deal_original_price' => Input::get('originalprice'),
                    'deal_discount_price' => Input::get('discountprice'),
                    'deal_discount_percentage' => $deal_discount_percentage,
                    'deal_saving_price' => $deal_saving_price,
                    'deal_inctax'       => Input::get('inctax'),
                    'deal_shippamt'     => $Shipping_Amount,
                    'deal_start_date'   => date('Y-m-d H:i:s', strtotime(Input::get('startdate'))),

                    'deal_end_date'     => date('Y-m-d H:i:s', strtotime(Input::get('enddate'))),

                    'deal_expiry_date'  => date('Y-m-d H:i:s', strtotime(Input::get('enddate'))),
                    'deal_description'  => Input::get('description'),
                    'deal_delivery'     => Input::get('Delivery_Days'),
                    'deal_meta_keyword' => Input::get('metakeyword'),
                    'deal_meta_description' => Input::get('metadescription'),
                    'deal_max_limit' => Input::get('maxlimit'),                   
                    'deal_image_count' => Input::get('count'),
                    'deal_image' => $file_name_insert,
                    'deal_posted_date' => $now,
                    'created_date' => $date,
                      //product policy starts
                    'allow_cancel'      => $allow_cancel,
                    'allow_return'      => $allow_return,
                    'allow_replace'     => $allow_replace,
                    'cancel_policy'     => $cancel_policy,
                    'return_policy'     => $return_policy,
                    'replace_policy'    => $replace_policy,
                    'cancel_days'       => $cancel_days,
                    'return_days'       => $return_days,
                    'replace_days'      => $replace_days,
                    
                    //product policy ends
                );

				$entry = array_merge($entry,$p_lang_entry); //Policy merge
				$get_active_lang = 	$this->get_active_language;
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'deal_title_'.$get_lang_code => Input::get('title_'.$get_lang_name),
						'deal_description_'.$get_lang_code => Input::get('description_'.$get_lang_name),
						'deal_meta_keyword_'.$get_lang_code => Input::get('metakeyword_'.$get_lang_name),
						'deal_meta_description_'.$get_lang_code => Input::get('metadescription_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
			
                $return = Deals::save_deal($entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_INSERTED_SUCCESSFULLY')!= ''){ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEAL_INSERTED_SUCCESSFULLY');
			}else{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEAL_INSERTED_SUCCESSFULLY');
			}
                return Redirect::to('manage_deals')->with('block_message',$session_message);

            }

		}
		else {

            return Redirect::to('siteadmin');

        }

    }

    

    public function edit_deals($id)

    {

        if (Session::has('userid')) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_DEALS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEALS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEALS');
			}

            $adminheader      = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);

            $adminleftmenus   = view('siteadmin.includes.admin_left_menu_deals');

            $adminfooter      = view('siteadmin.includes.admin_footer');

            $category         = Deals::get_category();

           

            $deal_list        = Deals::get_deals($id);

            return view('siteadmin.edit_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('action', 'update')->with('category', $category)->with('deal_list', $deal_list);
        } else {

            return Redirect::to('siteadmin');

        }

    }

    

    public function edit_deals_submit(Request $request)

    {

        if (Session::has('userid')) {

            $now    = date('Y-m-d H:i:s');
			$id     = Input::get('deal_edit_id');
			
			$files = Input::file('new_file');
			$files_exit = Input::file('file');
			$filesExitCount = count($files_exit);
			$filesCount = count($files);
            $data = Input::except(array(
                '_token'
            ));		 
			
			if($files !=0)
			{
			for ($i=0; $i < $filesCount; $i++)
			{
				$file = $files[$i];
				$input = array(
				'deal_image' => $files[$i]
			);
			$rules = array(
			'deal_image' => 'required|image|mimes:jpeg,png,jpg,gif|image_size:'.$this->deal_width.','.$this->deal_height.''
				);
				$validator = Validator::make($input, $rules);
			}
					
			if ($validator->fails())
			{
				return Redirect::to('edit_deals/'.$id)->withErrors($validator->messages())->withInput();
			}
			}
				
			for ($j=0; $j < $filesExitCount; $j++)
			{
				
				if($files_exit[$j] !='')
				{
				$file = $files_exit[$j];
				$input = array(
				'upload_exit' => $files_exit[$j]
				);
				$rules = array(
					'upload_exit' => 'required|image|mimes:jpeg,png,jpg|image_size:'.$this->deal_width.','.$this->deal_height.''
				);
				$validator = Validator::make($input, $rules);
				
				if ($validator->fails())
				{
					return Redirect::to('edit_deals/'.$id)->withErrors($validator->messages())->withInput();
				}
				}
			}


			//Product Policy
            $allow_cancel   = Input::get('allow_cancel');
            $allow_return   = Input::get('allow_return');
            $allow_replace  = Input::get('allow_replace');

            $cancel_policy  = (Input::get('cancellation_policy')!=NUll)?Input::get('cancellation_policy'):'';
            $return_policy  = (Input::get('return_policy')!=NUll)?Input::get('return_policy'):'';
            $replace_policy = (Input::get('replacement_policy')!=NUll)?Input::get('replacement_policy'):'';

            $cancel_days    = (Input::get('cancellation_days')!=NUll)?Input::get('cancellation_days'):'';
            $return_days    = (Input::get('return_days')!=NUll)?Input::get('return_days'):'';
            $replace_days   = (Input::get('replace_days')!=NUll)?Input::get('replace_days'):'';

            $rules = $inputs = $policy_lang_entry = array();

            if($allow_cancel=='1')
            {
                $cancel_rules = array('cancellation_policy' => 'required','cancellation_days' => 'required|numeric');
                $rules = array_merge($rules,$cancel_rules);
                $inputs = array_merge($inputs,array('cancellation_policy' =>$cancel_policy,'cancellation_days'=>$cancel_days ));
            }else{
                $cancel_policy ='';
                $cancel_days ='';

            }
            if($allow_return=='1')
            {
                $return_rules = array('return_policy' => 'required','return_days' => 'required|numeric');
                $rules = array_merge($rules,$return_rules);
                $inputs = array_merge($inputs,array('return_policy' =>$return_policy,'return_days'=>$return_days ));
            }else{
                $return_policy ='';
                $return_days ='';
                
            }
            if($allow_replace=='1')
            {
                $replace_rules = array('replace_policy' => 'required','replace_days' => 'required|numeric');
                $rules = array_merge($rules,$replace_rules);
                $inputs = array_merge($inputs,array('replace_policy' =>$replace_policy,'replace_days'=>$replace_days ));
            }else{
                $replace_policy ='';
                $replace_days ='';
                
            }

            $get_active_lang =  $this->get_active_language; 
                $p_lang_entry = array();
                if(!empty($get_active_lang)) { 
                    foreach($get_active_lang as $get_lang) {
                        $get_lang_name = $get_lang->lang_name;
                        $get_lang_code = $get_lang->lang_code;
                
                        $policy_lang_entry = array(
                        'cancel_policy_'.$get_lang_code => ($allow_cancel=='1'?((Input::get('cancellation_policy_'.$get_lang_name)!=NUll)?Input::get('cancellation_policy_'.$get_lang_name):''):''),
                        'return_policy_'.$get_lang_code => ($allow_return=='1'?((Input::get('return_policy_'.$get_lang_name)!=NUll)?Input::get('return_policy_'.$get_lang_name):''):''),
                        'replace_policy_'.$get_lang_code => ($allow_replace=='1'?((Input::get('replacement_policy_'.$get_lang_name)!=NUll)?Input::get('replacement_policy_'.$get_lang_name):''):''),
                        
                        );

                        if($allow_cancel=='1')
                        {
                            $cancel_rules = array('cancellation_policy_'.$get_lang_name => 'required','cancellation_days' => 'required|numeric');
                            $rules = array_merge($rules,$cancel_rules);
                            $inputs = array_merge($inputs,array('cancellation_policy_'.$get_lang_name =>$policy_lang_entry['cancel_policy_'.$get_lang_code ]));
                        }
                        if($allow_return=='1')
                        {
                            $return_rules = array('return_policy_'.$get_lang_name => 'required','return_days' => 'required|numeric');
                            $rules = array_merge($rules,$return_rules);
                            $inputs = array_merge($inputs,array('return_policy_'.$get_lang_name =>$policy_lang_entry['return_policy_'.$get_lang_code ]));
                        }if($allow_replace=='1')
                        {
                            $replace_rules = array('replace_policy_'.$get_lang_name => 'required','replace_days' => 'required|numeric');
                            $rules = array_merge($rules,$replace_rules);
                            $inputs = array_merge($inputs,array('replace_policy_'.$get_lang_name =>$policy_lang_entry['replace_policy_'.$get_lang_code ]));
                        }
                        $p_lang_entry  = array_merge($p_lang_entry,$policy_lang_entry);
                    }
                }
                
           // print_r($rules);exit();

            $validator = Validator::make($inputs, $rules);
            
            if ($validator->fails())
            {
                return Redirect::to('edit_deals/'.$id)->withErrors($validator->messages())->withInput();
            }
            


            $inputs = Input::all();

            

            $count            = Input::get('count');
				
			$j=1;	
            $filename_new_get = "";
			$filename = Input::get('file_get');
			$file_get_path =  explode("/**/",$filename,-1);
			 
				$field_values_array = $request->file('file');
				 
				
				$file = Input::file('file');
				   $k=0;
				if(count($field_values_array)>0){   
					foreach($field_values_array as $value)
					{                  
						$a = $j++;                                         
						if(isset($value))
						{  
							$filename        = $value->getClientOriginalName(); 
	                        $move_img        = explode('.', $filename);
							$time=time();
	                        $filename_new = 'Deal_'.$time.'.' . strtolower($value->getClientOriginalExtension());
	                        $destinationPath = './public/assets/deals/';
							Image::make($value)->save('./public/assets/deals/'.$filename_new,$this->image_compress_quality); 
							$image_old = Input::get('image_old');
							if(file_exists($destinationPath.$image_old[$k]))
							{
								@unlink($destinationPath.$image_old[$k]);
							}
	                        $filename_new_get.= $filename_new . "/**/";   
						
						}						
					 else 
						{                                            
							$filename_new_get.= $file_get_path[$a-1]. "/**/";  
						}
						$k++;
					}  
				}  
				else
				{
					 $filename_new_get= $filename;  
				}

			/*if isset new product images it goes here */

                $new_field_values_array = Input::file('new_file');

                $new_file_count = count($new_field_values_array);

                if($new_file_count > 0){
                    
                  foreach($new_field_values_array as $new_value){
					  
                    //your New Product Image Upload into directory goes here
                    
                    $product_new_name   = $new_value->getClientOriginalName();
                    
                    $new_more_img       = explode('.', $product_new_name);
					//$time=time();
					$time=time().rand();
					
                    $filename_new = 'Deal_'.$time.'.' . strtolower($new_value->getClientOriginalExtension());
                    
					Image::make($new_value)->save('./public/assets/deals/'.$filename_new,$this->image_compress_quality); 
                    
                    $filename_new_get .= $filename_new . "/**/";

                  } //exit; //foreach

                } //if		
            $file_name_insert = $filename_new_get;

            

            $deal_saving_price        = Input::get('originalprice') - Input::get('discountprice');

            $deal_discount_percentage = (($deal_saving_price / Input::get('originalprice')) * 100);
             $deal_discount_percentage=floor($deal_discount_percentage);

            $Shipping_Amount = Input::get('Shipping_Amount');

            if ($Shipping_Amount == "") {
                
                $Shipping_Amount = 0;
          
            }
      
            $entry                    = array(

                'deal_title' => Input::get('title'),

                'deal_category' => Input::get('category'),

                'deal_main_category' => Input::get('maincategory'),

                'deal_sub_category' => Input::get('subcategory'),

                'deal_second_sub_category' => Input::get('secondsubcategory'),

                'deal_original_price' => Input::get('originalprice'),

                'deal_discount_price' => Input::get('discountprice'),

                'deal_discount_percentage' => $deal_discount_percentage,

                'deal_saving_price' => $deal_saving_price,

                'deal_inctax' => Input::get('inctax'),

                'deal_shippamt' => $Shipping_Amount,

                 'deal_start_date' => date('Y-m-d H:i:s', strtotime(Input::get('startdate'))),



                'deal_end_date' => date('Y-m-d H:i:s', strtotime(Input::get('enddate'))),



                'deal_expiry_date' => date('Y-m-d H:i:s', strtotime(Input::get('enddate'))),

                'deal_description'  => Input::get('description'),

               'deal_delivery'     => Input::get('Delivery_Days'),

               'deal_meta_keyword' => Input::get('metakeyword'),

                'deal_meta_description' => Input::get('metadescription'),

                'deal_min_limit' => Input::get('minlimt'),

                'deal_max_limit' => Input::get('maxlimit'),               

                'deal_image_count' => Input::get('count'),

                'deal_image' => $file_name_insert,

                'deal_posted_date' => $now,

                //product policy starts
                'allow_cancel'      => $allow_cancel,
                'allow_return'      => $allow_return,
                'allow_replace'     => $allow_replace,
                'cancel_policy'     => $cancel_policy,
                'return_policy'     => $return_policy,
                'replace_policy'    => $replace_policy,
                'cancel_days'       => $cancel_days,
                'return_days'       => $return_days,
                'replace_days'      => $replace_days,
                
                //product policy ends

            );
           
			$entry = array_merge($entry,$p_lang_entry); //Policy merge	
			$get_active_lang = 	$this->get_active_language;
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'deal_title_'.$get_lang_code => Input::get('title_'.$get_lang_name),
						'deal_description_'.$get_lang_code => Input::get('description_'.$get_lang_name),
						'deal_meta_keyword_'.$get_lang_code => Input::get('metakeyword_'.$get_lang_name),
						'deal_meta_description_'.$get_lang_code => Input::get('metadescription_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
				$check_title_lang = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
						
						$check_title = Input::get('title_'.$get_lang_name);
						
				
						$check_title_lang = Input::get('title_'.$get_lang_name);
						$check_title_exist_lang = Deals::check_title_exist_ajax_edit_lang($id,$check_title,$get_lang_name,$get_lang_code,$check_title_lang);
						
					}
				}
				//print_r($check_title_exist_lang);//exit();
				$check_title = Input::get('title');
				
                $check_title_exist = Deals::check_title_exist_ajax_edit($id,$check_title);
               // print_r($check_title_exist);exit();
                if ($check_title_exist>0) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_TITLE_ALREADY_EXIST')!= '') 
				{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_TITLE_ALREADY_EXIST');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TITLE_ALREADY_EXIST');
				}
                    return Redirect::to('edit_deals/' . $id)->with('error_message', $session_message)->withInput();
                } 
				elseif(isset($check_title_exist_lang)) {
					if($check_title_exist_lang>0){
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TITLE_ALREADY_EXIST');
						return Redirect::to('edit_deals/' . $id)->with('error_message', $session_message)->withInput();
					}
				}
				

	            $return = Deals::edit_deal($entry, $id);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_UPDATED_SUCCESSFULLY')!= '') 
				{ 
					$session_message = trans(Session::get('admin_lang_file').'.BACK_DEAL_UPDATED_SUCCESSFULLY');
				}  
				else 
				{ 
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEAL_UPDATED_SUCCESSFULLY');
				}
	            return Redirect::to('manage_deals')->with('block_message', $session_message);

         } else {

            return Redirect::to('siteadmin');

        }

    }

    	public function delete_deal_image($deal_id,$image)
		{
		
		if(Session::has('userid')) 
		{ 
			$return = Deals::delete_deal_image($deal_id,$image);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_REMOVED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_REMOVED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_REMOVED_SUCCESSFULLY');
			}
			return Redirect::back()->with('message',$session_message);
		}
		else {

            return Redirect::to('siteadmin');

        }
		}

    public function deals_select_main_cat()

    {

        $id       = $_GET['id'];

        $main_cat = Deals::get_main_category_ajax($id);

        if ($main_cat) {

            $return = "";
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SELECT');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SELECT');
			}
            $return = "<option value='0'>-- $session_message --</option>";

            foreach ($main_cat as $main_cat_ajax) {

                $return .= "<option value='" . $main_cat_ajax->smc_id . "'> " . $main_cat_ajax->smc_name;
				/* $return .= "(".$main_cat_ajax->smc_name_fr.")"; */
				$return .=" </option>";

            }

            echo $return;

        } else {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'> $session_message </option>";

        }

    }

    

    

    public function deals_select_sub_cat()

    {

        $id       = $_GET['id'];

        $main_cat = Deals::get_sub_category_ajax($id);

        if (count($main_cat)>0) {

            $return = "";
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SELECT');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SELECT');
			}
            $return = "<option value='0'> -- $session_message -- </option>";

            foreach ($main_cat as $main_cat_ajax) {

                $return .= "<option value='" . $main_cat_ajax->sb_id . "'> " . $main_cat_ajax->sb_name;
				/* $return .= "(".$main_cat_ajax->sb_name_fr.")"; */
				$return .= " </option>";

            }

            echo $return;

        } else {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'> $session_message </option>";

        }

    }

    

    public function deals_select_second_sub_cat()

    {

        $id       = $_GET['id'];

        $main_cat = Deals::get_second_sub_category_ajax($id);

        if(count($main_cat)>0) {

            $return = "";
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SELECT');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SELECT');
			}
            $return = "<option value='0'> -- $session_message -- </option>";

            foreach ($main_cat as $main_cat_ajax) {

                $return .= "<option value='" . $main_cat_ajax->ssb_id . "'> " . $main_cat_ajax->ssb_name;
				/* $return .= "(".$main_cat_ajax->ssb_name_fr.")"; */
				$return .= "</option>";

            }

            echo $return;

        } else {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'> $session_message </option>";

        }

    }

    

    public function deals_edit_select_main_cat()

    {

        $id       = $_GET['edit_id'];

        $main_cat = Deals::get_main_category_ajax_edit($id);

        if ($main_cat) {

            $return = "";

            foreach ($main_cat as $main_cat_ajax) {

                $return .= "<option value='" . $main_cat_ajax->smc_id . "' selected> " . $main_cat_ajax->smc_name;
                /* $return .= "(".$main_cat_ajax->smc_name_fr.")"; */
                $return .= "</option>";

            }

            echo $return;

        } else {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'> $session_message </option>";

        }

    }

    

    public function deals_edit_select_sub_cat()

    {

        $id       = $_GET['edit_sub_id'];

        $main_cat = Deals::get_sub_category_ajax_edit($id);

        if ($main_cat) {

            $return = "";

            foreach ($main_cat as $main_cat_ajax) {

                $return .= "<option value='" . $main_cat_ajax->sb_id . "' selected> " . $main_cat_ajax->sb_name;
               /*  $return .= "(".$main_cat_ajax->sb_name_fr.")"; */
                $return .= "</option>";

            }

            echo $return;

        } else {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'> $session_message </option>";

        }

    }

    

    public function deals_edit_second_sub_cat()

    {

        $id       = $_GET['edit_secnd_sub_id'];

        $main_cat = Deals::get_second_sub_category_ajax_edit($id);

        if ($main_cat) {

            $return = "";

            foreach ($main_cat as $main_cat_ajax) {

                $return .= "<option value='" . $main_cat_ajax->ssb_id . "' selected> " . $main_cat_ajax->ssb_name;
                /* $return .= "(".$main_cat_ajax->ssb_name_fr.")"; */
                $return .= "</option>";

            }

            echo $return;

        } else {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'> $session_message </option>";

        }

    }

    

    public function check_title_exist(){
      //  $mer_id     = $_GET['mer_id'];
       // $store_id   = $_GET['store_id'];
        $title      = $_GET['title'];


        $exist_title = Deals::check_title_exist_ajax($title);

        if($exist_title!=0) {
            echo 1;
        } else {
            echo 0;
        }

    }
	
	public function check_title_exist_dynamic(){ 
       // $mer_id     = $_GET['mer_id'];
       // $store_id   = $_GET['store_id'];
        $title      = $_GET['title'];
     $lang_code      = $_GET['lang_code'];

        $exist_title = Deals::check_title_exist_ajax_dynamic($title,$lang_code);

        if($exist_title!=0) {
            echo 1;
        } else {
            echo 0;
        }

    }

    

    public function check_title_exist_edit()

    {

        $title       = $_GET['title'];
		$id          = $_GET['dealid'];
        $exist_title = Deals::check_title_exist_ajax_edit($id,$title);

        if ($exist_title!=0) {

            echo 1;

        } else {

            echo 0;

        }

    }

     public function check_title_exist_edit_dynamic()

    {

        $title       = $_GET['title'];
		$id          = $_GET['dealid'];
        $lang_code   = $_GET['lang_code'];
        $exist_title = Deals::check_title_exist_ajax_edit_dynamic($id,$title,$lang_code);

        if ($exist_title!=0) {

            echo 1;

        } else {

            echo 0;

        }

    }

    public function manage_deals()

    {

        if (Session::has('userid')) {

            $date      = date('Y-m-d H:i:s');

            $from_date = Input::get('from_date');

            $to_date   = Input::get('to_date');

            $dealrep   = Deals::get_dealreports($from_date, $to_date);

            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "deals");

            $delete_deals 	= Deals::get_order_deals_details();
			
			

            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');

            $adminfooter    = view('siteadmin.includes.admin_footer');

            $return         = Deals::get_deal_details($date);
			

            return view('siteadmin.manage_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_details', $return)->with('dealrep', $dealrep)->with('delete_deals', $delete_deals)
            ->with('from_date',$from_date)->with('to_date',$to_date);

        } else {

            return Redirect::to('siteadmin');

        }

    }

    

    public function expired_deals(){

        if (Session::has('userid')) {

            

            $date        = date('Y-m-d H:i:s');

            $from_date   = Input::get('from_date');

            $to_date     = Input::get('to_date');

            $exdeals_rep = Deals::exdeals_rep($from_date, $to_date, $date);

                  
			if(Lang::has(Session::get('admin_lang_file').'.BACK_DEALS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEALS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEALS');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);

            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');

            $adminfooter    = view('siteadmin.includes.admin_footer');

            $return         = Deals::get_expired_deals($date);

            return view('siteadmin.expired_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_details', $return)->with('exdeals_rep', $exdeals_rep)
            ->with('from_date',$from_date)->with('to_date',$to_date);

        } else {

            return Redirect::to('siteadmin');

        }

    }

	/*sold deals */
	 public function sold_deals(){

        if (Session::has('userid')) {

            

            $date        = date('Y-m-d H:i:s');

            $from_date   = Input::get('from_date');

            $to_date     = Input::get('to_date');

            $solddeals_rep = Deals::solddeals_rep($from_date, $to_date, $date);

                  
			if(Lang::has(Session::get('admin_lang_file').'.BACK_DEALS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEALS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEALS');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);

            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');

            $adminfooter    = view('siteadmin.includes.admin_footer');

            $return         = Deals::get_sold_deals_details($date);

            return view('siteadmin.sold_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_details', $return)->with('exdeals_rep', $solddeals_rep)
            ->with('from_date',$from_date)->with('to_date',$to_date);

        } else {

            return Redirect::to('siteadmin');

        }

    }
	
	

	public function manage_deals_cardshipping_details()
    {
	if (Session::has('userid')) 
	{
        $date        = date('Y-m-d H:i:s');
        $from_date   = Input::get('from_date');
        $to_date     = Input::get('to_date');
        $exdeals_rep = Deals::exdeals_rep($from_date, $to_date, $date);                  
		if(Lang::has(Session::get('admin_lang_file').'.BACK_DEALS')!= '') 
		{ 
			$session_message = trans(Session::get('admin_lang_file').'.BACK_DEALS');
		}  
		else 
		{ 
			$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEALS');
		}
        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
        $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');
        $adminfooter    = view('siteadmin.includes.admin_footer');
        $returnvalue         = Deals::get_deals_cardshipping_details();
        return view('siteadmin.deals_shipping_details')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_shipping', $returnvalue)->with('exdeals_rep', $exdeals_rep);
        } 
		else 
		{
            return Redirect::to('siteadmin');
        }
    }

	/* PayUmoney shipping details */
	public function deals_payumoney_shipping_details()
    {
	if (Session::has('userid')) 
	{
        $date        = date('Y-m-d H:i:s');
        $from_date   = Input::get('from_date');
        $to_date     = Input::get('to_date');
        $exdeals_rep = Deals::exdeals_rep($from_date, $to_date, $date);                  
		if(Lang::has(Session::get('admin_lang_file').'.BACK_DEALS')!= '') 
		{ 
			$session_message = trans(Session::get('admin_lang_file').'.BACK_DEALS');
		}  
		else 
		{ 
			$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEALS');
		}
        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
        $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');
        $adminfooter    = view('siteadmin.includes.admin_footer');
        $returnvalue   = Deals::get_deals_payu_shipping_details();
        return view('siteadmin.deals_payumoney_shipping_details')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_shipping', $returnvalue)->with('exdeals_rep', $exdeals_rep);
        } 
		else 
		{
            return Redirect::to('siteadmin');
        }
    }

	public function manage_deals_shippingCOD_details()
    {
        if (Session::has('userid')) {
            $date        = date('Y-m-d H:i:s');
            $from_date   = Input::get('from_date');
            $to_date     = Input::get('to_date');
            $exdeals_rep = Deals::exdeals_rep($from_date, $to_date, $date);               
			if(Lang::has(Session::get('admin_lang_file').'.BACK_DEALS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEALS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEALS');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $returnvalue    = Deals::get_dealcashon_delivery_details();
			 
            return view('siteadmin.manage_dealcashon_delivery_details')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_shipping', $returnvalue)->with('exdeals_rep', $exdeals_rep);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    

    public function block_deals($id, $status)

    {

        if (Session::has('userid')) {

            $entry = array(

                'deal_status' => $status

            );

            Deals::block_deal_status($id, $entry);

            if ($status == 1) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_ACTIVATED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEAL_ACTIVATED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEAL_ACTIVATED');
			}
                return Redirect::back()->with('block_message', $session_message);

            } else if ($status == 0) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_BLOCKED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEAL_BLOCKED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEAL_BLOCKED');
			}	

                return Redirect::back()->with('block_message',$session_message);

            }

        } else {

            return Redirect::to('siteadmin');

        }

    }

    

   public function deal_details($id)

    {

        if (Session::has('userid')) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEALS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEALS');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);

            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');

            $adminfooter    = view('siteadmin.includes.admin_footer');

            $return         = Deals::get_deals_view($id);

            return view('siteadmin.deal_details')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_list', $return);

        } else {

            return Redirect::to('siteadmin');

        }

    }

    

    public function validate_coupon_code()

    {

        if (Session::has('userid')) {
if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEALS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEALS');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);

            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');

            $adminfooter    = view('siteadmin.includes.admin_footer');

            

            return view('siteadmin.validate_coupon')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);

        } else {

            return Redirect::to('siteadmin');

        }

    }

    

    public function redeem_coupon_list()

    {

        if (Session::has('userid')) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_FIELD_REQUIRED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEALS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEALS');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);

            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');

            $adminfooter    = view('siteadmin.includes.admin_footer');

            

            return view('siteadmin.redeem_coupon')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);

        } else {

            return Redirect::to('siteadmin');

        }

    }

	

	public function delete_deals($id){

		if(Session::has('userid')){
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
		 $adminheader 		= view('siteadmin.includes.admin_header')->with("routemenu",$session_message);	
         $adminleftmenus	= view('siteadmin.includes.admin_left_menus');
         $adminfooter 		= view('siteadmin.includes.admin_footer');
		$entry = array
		(
			'deal_status' => 2
		);
         $del_deals = Deals::delete_deals($id,$entry);
		if(Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEAL_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEAL_DELETED_SUCCESSFULLY');
			}
		return Redirect::to('manage_deals')->with('Deal Deleted',$session_message);	

		}

		else

        {

        return Redirect::to('siteadmin');

        }	

	}



    //Manage deal review

     public function manage_deal_review(){

        if (Session::has('userid')) {
		if(Lang::has(Session::get('admin_lang_file').'.BACK_DEALS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEALS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEALS');
			}
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);

            

            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');

            

            $adminfooter = view('siteadmin.includes.admin_footer');



            $get_deal_review = Deals::get_deal_review();


             return view('siteadmin.manage_deal_review')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('get_deal_review', $get_deal_review);

        }

        else{

            return Redirect::to('siteadmin');

        }

    }



     public function edit_deal_review($id)

    {

        

        if (Session::has('userid')) {

            
			if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS');
			}
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);

            

            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');

            

            $adminfooter = view('siteadmin.includes.admin_footer');

            

            $result = Deals::edit_deal_review($id);

     

            return view('siteadmin.edit_deal_review')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('result',$result);

            

        }

        

        else {

            

            return Redirect::to('siteadmin');

            

        }

        

    }



    public function edit_deal_review_submit()

    {

        if (Session::has('userid')) {

            $now = date('Y-m-d H:i:s');

            

            $inputs = Input::all();

            $review_id = Input::get('comment_id');

            $review_title = Input::get('review_title');

            $review_comment = Input::get('review_comment');



            $entry = array(

                

                'title' => $review_title,

                

                'comments' => $review_comment,

             

            );

            $return = Deals::update_deal_review($entry, $review_id);

            return Redirect::to('manage_deal_review');

        }

        else{

            return Redirect::to('siteadmin');

        }

    }

    public function delete_deal_review($id)

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
         $adminheader       = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);  

         $adminleftmenus    = view('siteadmin.includes.admin_left_menu_deals');

         $adminfooter       = view('siteadmin.includes.admin_footer');

         $del_review = Deals::delete_deal_review($id);
		if(Lang::has(Session::get('admin_lang_file').'.BACK_REVIEW_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_REVIEW_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_REVIEW_DELETED_SUCCESSFULLY');
			}
         return Redirect::to('manage_deal_review')->with('product Deleted',$session_message); 

        }

        else

        {

         return Redirect::to('siteadmin');

        }

    }

        public function block_deal_review($id, $status)

    {

        

        if (Session::has('userid')) {

            

            $entry = array(

                

                'status' => $status

                

            );

            

            Deals::block_deal_review_status($id, $entry);

            

            if ($status == 0) {

                
			if(Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_REVIEW_UNBLOCKED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEAL_REVIEW_UNBLOCKED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEAL_REVIEW_UNBLOCKED');
			}
                return Redirect::to('manage_deal_review')->with('block_message',$session_message);

                

            }

            

            else if ($status == 1) {

                
if(Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_REVIEW_BLOCKED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DEAL_REVIEW_BLOCKED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DEAL_REVIEW_BLOCKED');
			}
                return Redirect::to('manage_deal_review')->with('block_message', $session_message);

                

            }

            

        }

        

        else {

            

            return Redirect::to('siteadmin');

            

        }

        

    }

  /*  public static function store_details(){
		
         $shop_id = $_GET['shop_id'];
	
        $details = Deals::store_details($shop_id);
        if(count($details)!=0){
            foreach($details as $datas){ 
                echo 'Store Address :'.$datas->stor_address1.','.$datas->stor_address2.','.$datas->ci_name;
            }
        }
    } */

    //Save Edited Image
    public function CropNdUpload_deal(Request $request){
        //echo 'jhj';
       // var_dump($request->input('_token'));
        $data = Input::except(array(
                '_token'
            ));
       // print_r($data);exit();
        $product_id     = Input::get('product_id');
        $img_id         = Input::get('img_id');
        $imgfileName    = Input::get('imgfileName'); //old image file name

        $imageData = Input::get('base64_imgData');
        $img_dat = explode(',',Input::get('base64_imgData'));
        $new_name = 'Deal_'.time().rand().'.jpg';

        //$imge =  file_put_contents('public/assets/deals/'.$new_name, base64_decode($img_dat[1]));
        $imageData = base64_decode($img_dat[1]);
        //imagepng($source,'public/assets/deals/'.$new_name,6);
        $file_path = './public/assets/deals/'.$new_name;
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

        if(file_exists('public/assets/deals/'.$new_name)){

            //upload small image
            list($width,$height)=getimagesize('public/assets/deals/'.$new_name);     
            

            //unlink old files starts
            if(file_exists('public/assets/deals/'.$imgfileName))
                unlink("public/assets/deals/".$imgfileName);
            if(file_exists('public/assets/deals/'.$imgfileName))
                unlink("public/assets/deals/".$imgfileName);
            //unlink old files ends

            //update in image table 
            $product_list = Deals::get_deals($product_id);

            if(count($product_list)>0){
                foreach ($product_list as $prd) {
                    
                }
                $prod_imgAr = explode('/**/', $prd->deal_image);
                if(in_array($imgfileName,$prod_imgAr))
                {    
                    $key = array_search($imgfileName,$prod_imgAr);
                    $prod_imgAr[$key] = $new_name;
                }else {
                    $key = count($prod_imgAr);
                    $prod_imgAr[$key] = $new_name;
                }
                $prod_img = implode('/**/',$prod_imgAr);  
            }else{
                $prod_img = $new_name.'/**/';
            }

                $entry = array('deal_image' => $prod_img );

             $return     = Deals::edit_deal($entry, $product_id);
             if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
             return Redirect::to('edit_deals/'.$product_id)->with('block_message', $session_message);
        }

        exit();
    }
    /* Image  Crop , rorate and mamipulation ends */
	
	public function block_deal_review_multiple()
 { 
	 if (Session::has('userid'))
        {
			
         $data=Input::get('val');
         $status=1;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $array=array('status' => 1); 
			  $block_Banner_admin=Deals::dealreview_multiple($id, $status);	
             
                   }
            if($block_Banner_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }
 }

 public function unblock_deal_review_multiple()
{
	 if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=0;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $array=array('stor_status' => 0);
           $unblock_Banner_admin=Deals::dealreview_multiple($id, $status);			  
              
            
                   }
            if($unblock_Banner_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        } 
}
 
 /**delete multiple**/
		public function delete_deal_review_multiple()
			{ 
				if (Session::has('userid'))
				{
					$data=Input::get('val'); 
					 for($i=0;$i<count($data);$i++)
					 {
						  
				$id=$data[$i];
				 $array=array('stor_status' => 0);
				$delete_Banner_admin=Deals::delete_dealreview($id);
		
				//$delete= DB::table('nm_banner')->where('bn_id', '=', $id)->update(array('bn_status' => 2));
				//DB::table('nm_customer')->where('cus_id', '=', $id)->update(array('cus_status'=>2));
                //delete_banner($id)
					 }
					if(count($delete_Banner_admin)>0){
					echo "1";}
					else {
					echo "0";}

				}


			}

}

