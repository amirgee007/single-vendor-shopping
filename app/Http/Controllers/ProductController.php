<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Lang;
use File;
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
use App\Products;
use App\Brand;  //brand
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;	
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
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
    public function product_dashboard()
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
         
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
                                   
            $sold_details = Products::get_sold_products();
            
            $active_cnt = Products::get_active_products();
            $act_cnt = Products::get_act_products();
            $inactive_cnt = Products::get_inactive_products();
            
            $blocked_cnt = Products::get_block_products();
            
            $producttdy   = Products::get_today_product();
             $producttdy_payu  = Products::get_today_product_payu(); 
            $ordercod_tdy = Products::get_today_ordercod(); 
            
            $product7days    = Products::get_7days_product();
            $product7days_payu    = Products::get_7days_product_payu();
            $ordercod_7days  = Products::get_7days_ordercod();
            
            $product30days   = Products::get_30days_product();
             $product30days_payu   = Products::get_30days_product_payu();
            $ordercod_30days = Products::get_30days_ordercod();
            
            $product12mnth   = Products::get_12mnth_product();
            $product12mnth_payu   = Products::get_12mnth_product_payu();
            $ordercod_12mnth = Products::get_12mnth_ordercod();
            
            $ordermnth_count = Products::get_chart_details();
            
            return view('siteadmin.product_dashboard')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('sold_details', $sold_details)->with('act_count', $act_cnt)->with('active_count', $active_cnt)->with('inactive_count', $inactive_cnt)->with('blocked_cnt', $blocked_cnt)
            ->with('producttdy', $producttdy)
            ->with('producttdy_payu', $producttdy_payu)
            ->with('product7days', $product7days)
            ->with('product7days_payu', $product7days_payu)
            ->with('product30days', $product30days)
            ->with('product30days_payu', $product30days_payu)
            ->with('product12mnth', $product12mnth)
            ->with('product12mnth_payu', $product12mnth_payu)
            ->with('ordermnth_count', $ordermnth_count)
            ->with('ordercod_tdy',$ordercod_tdy)
            ->with('ordercod_7days',$ordercod_7days)
            ->with('ordercod_30days',$ordercod_30days)
            ->with('ordercod_12days',$ordercod_12mnth);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
  
        
    }
 
    
    public function add_product(){
        
        if (Session::has('userid')) {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCTS');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS');
			}
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $productcategory = Products::get_product_category();
            
            $productcolor = Products::get_product_color();
            
            $productsize = Products::get_product_size();

            $spec_group = Products::get_spec_group();
            
            $productspecification = Products::get_product_specification();
            
           // $merchantdetails = Products::get_merchant_details();

            

           // $brand_details = Brand::view_brand_commission();    //brand
         
            return view('siteadmin.add_product')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('productcategory', $productcategory)->with('productcolor', $productcolor)->with('productsize', $productsize)->with('productspecification', $productspecification)
            ->with('spec_group',$spec_group);
            //->with('brand_details',$brand_details); //brand
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
	public function get_spec_related_to_cat(){
        
        if (Session::has('userid')) {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCTS');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS');
			}
			//print_r($_POST);
            $sec_main_cat = Input::get('sec_main_cat');
            $main_cat = Input::get('main_cat');
			$specification_group = Products::get_specification_group_product($main_cat,$sec_main_cat);
			if(count($specification_group)>0)
			{
				echo'<option  value="0">-- Select --</option>';
				foreach($specification_group as $sp_group)
				{
					echo '<option value="'.$sp_group->spg_id.'">'.$sp_group->spg_name.'</option>';
				}
			}
			else{
                echo "1";
                exit;
				//echo'<option  value="0">-- Select --</option>';
			}
			//print_r($specification_group);
            //->with('brand_details',$brand_details); //brand
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
 
    
    public function edit_product($id)
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
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $category = Products::get_product_category();
            
            $product_list = Products::get_product($id);
            
            $productcolor = Products::get_product_color();
            
          //  $merchantdetails = Products::get_merchant_details();
            
            $productsize = Products::get_product_size();
            
            /* $spec_group = Products::get_spec_group(); *//* print_r($product_list[0]);die; */
			$main_cat		=	$product_list[0]->pro_mc_id;
			$sec_main_cat	=	$product_list[0]->pro_smc_id;
            $spec_group = Products::get_specification_group_product($main_cat,$sec_main_cat);
            $sp_group=array();
			if(count($spec_group)>0)
			{
				foreach($spec_group as $group )
				{
					array_push($sp_group,$group->spg_id);
				}
				$productspecification=DB::table('nm_specification')->whereIn('sp_spg_id', $sp_group)->get();
			}
			else{
			
			
			/* print_r($var);die; */
            /* $productspecification = Products::get_product_specification(); */
            $productspecification = Products::get_product_specification();
			}
            
            $existingspecification = Products::get_product_exist_specification($id);
            
            $existingcolor = Products::get_product_exist_color($id);
            
            $existingsize = Products::get_product_exist_size($id);
			
			//$brand_details = Brand::view_brand_commission();    //brand
    
            return view('siteadmin.edit_product')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('productcolor', $productcolor)->with('category', $category)->with('product_list', $product_list)->with('productspecification', $productspecification)->with('productsize', $productsize)->with('existingspecification', $existingspecification)->with('existingcolor', $existingcolor)->with('existingsize', $existingsize)
            ->with('spec_group',$spec_group);
           // ->with('brand_details',$brand_details); //brand
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
 
    public function manage_product()
    {
        if (Session::has('userid')) {

            $from_date  = Input::get('from_date');
            $to_date    = Input::get('to_date');
			
            $productrep = Products::get_productreports($from_date, $to_date);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCTS');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS');
			}
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $details = Products::get_product_details_manage();
			
			$delete_product = Products::get_order_details(); 
			$delete_product_count = count($delete_product); 
        
            return view('siteadmin.manage_product')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('product_details', $details)->with('productrep', $productrep)->with('delete_product', $delete_product)
            ->with('from_date',$from_date)->with('to_date',$to_date)->with('delete_product_count',$delete_product_count);
        }else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function delete_product($id)
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
		 $adminheader 		= view('siteadmin.includes.admin_header')->with("routemenu",$session_message);	
		 $adminleftmenus	= view('siteadmin.includes.admin_left_menus');
		 $adminfooter 		= view('siteadmin.includes.admin_footer');
		   $entry = array(
		   'pro_status' => 2,
			);
		
    	 $del_pro = Products::delete_product($id,$entry);
		 $del_pro_color = Products::delete_product_color($id);
         $del_pro_size = Products::delete_product_size($id);
         $del_pro_spec = Products::delete_product_spec($id);
		 if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_DELETED_SUCCESSFULLY')!= '') 
		{
			$session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCT_DELETED_SUCCESSFULLY');
		}
		else 
		{
			$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_DELETED_SUCCESSFULLY');
		}
		 return Redirect::to('manage_product')->with('product Deleted',$session_message);	
		}
		else
        {
         return Redirect::to('siteadmin');
        }	
	}
    
    public function sold_product()
    {
        
        if (Session::has('userid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $soldrep   = Products::get_soldrep($from_date, $to_date);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCTS');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS');
			}
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $details = Products::get_product_details();
        
            return view('siteadmin.sold_products')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('product_details', $details)->with('soldrep', $soldrep)->with('from_date',$from_date)->with('to_date',$to_date);
            
        }
            
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    
    
    public function add_product_submit()
    {
         

        if (Session::has('userid')) {
           
            $date = date('Y-m-d');
			$files = Input::file('file');
			$filesCount = count($files);
            $data = Input::except(array(
                '_token'
            ));
			for ($i=0; $i < $filesCount; $i++)
			{
				$file = $files[$i];
				$input = array(
				'product_image' => $files[$i]
			);
			$rules = array(
			'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|image_size:'.$this->product_width.','.$this->product_height.''
				);
				$validator = Validator::make($input, $rules);
			}

			if ($validator->fails())
			{ 
				return Redirect::to('add_product')->withErrors($validator->messages())->withInput();
			}
			else
			{
            /*colors*/			
            $count = Input::get('count');         
            $selectedcolors = Input::get('co');           
            $trimmedselectedcolors = trim($selectedcolors, ",");         
            $colorarray = explode(",", $trimmedselectedcolors);            
            $colorcount = count($colorarray) - 1;            
            /*Product Spec*/
            $specificationcount = Input::get('specificationcount');            
            /*Product Size*/
            $selectedsizes = Input::get('si');           
            $trimmedsizes = trim($selectedsizes, ",");            
            $sizearray = explode(",", $trimmedsizes);           
            //$productsizecount = Input::get('productsizecount');
            $productsizecount = count(Input::get('Product_Size'));
            $pro_siz  = Input::get('pro_siz');
            $pro_color  = Input::get('productcolor');            
            /*Product Image*/
            $field_values_array = Input::file('file');
            $count = count($field_values_array);
            $filename_new_get = "";

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
		
			$validator = Validator::make($inputs, $rules);
	            
	            if ($validator->fails())
	            {
	                return Redirect::to('add_product')->withErrors($validator->messages())->withInput();
	            }

                $i=1;                
                foreach($field_values_array as $value)
				{                   
                    $image_name = $value->getClientOriginalName();
                    $move_more_img = explode('.', $image_name);
					$time=time().rand();                   
					$filename_new = 'Product_'.$time.'.' . strtolower($value->getClientOriginalExtension()); 
					Image::make($value)->save('./public/assets/product/'.$filename_new,$this->image_compress_quality);
                    $filename_new_get .= $filename_new . "/**/";
                }
				$file_name_insert = $filename_new_get;
				$Product_SubCategory = "";
				$Product_SecondSubCategory = "";
				
				$now = date('Y-m-d H:i:s');
				$inputs = Input::all();
				$Product_Title = Input::get('Product_Title');
				$Product_Title_fr = Input::get('Product_Title_fr');
				$Product_Category = Input::get('Product_Category');
				$Product_MainCategory = Input::get('Product_MainCategory');   
				if(Input::get('Product_SubCategory') != ""){
				$Product_SubCategory = Input::get('Product_SubCategory');  
				}	
				if(Input::get('Product_SecondSubCategory') != ""){			
				$Product_SecondSubCategory = Input::get('Product_SecondSubCategory');  
				}				
				$Original_Price = Input::get('Original_Price');            
				$Discounted_Price = Input::get('Discounted_Price');
/* calculate product discount percentage */
				$product_saving_price        = Input::get('Original_Price') - Input::get('Discounted_Price');
            
				$Product_discount_percentage =  (($product_saving_price / Input::get('Original_Price')) * 100);
                 $Product_discount_percentage=floor($Product_discount_percentage);
                
/* calculate product discount percentage */
				$Shipping_Amount = Input::get('Shipping_Amount');           
				if ($Shipping_Amount == "") {                
					$Shipping_Amount = 0;              
				}          
				$Description = Input::get('Description');
				$Description_fr = Input::get('Description_fr');
            
				$pquantity = Input::get('Quantity_Product');
          
				$Delivery_Days = Input::get('Delivery_Days');
            
				$Delivery_Policy = Input::get('Delivery_Policy');
            
				$Meta_Keywords = Input::get('Meta_Keywords');
				$Meta_Keywords_fr = Input::get('Meta_Keywords_fr');
            
				$Meta_Description = Input::get('Meta_Description');
				$Meta_Description_fr = Input::get('Meta_Description_fr');
            			
				$cash_pack = Input::get('cash_price');	
            
				$inc_tax = Input::get('inctax');
            
				$add_spec = Input::get('specification');
            
				$postfb = Input::get('postfb');
            
				$img_count = Input::get('count');
           
			for ($i = 0; $i <= $specificationcount; $i++) {
                
                if (Input::get('spec' . $i) == 0 || Input::get('spectext' . $i == "")|| Input::get('fr_spectext' . $i == "")) {
                    
                    $add_spec = 2;
          
                }
            }
            
            $check_store = Products::check_store($Product_Title);
            
            if (count($check_store) > 0) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_THE_PRODUCT_ALREADY_EXIST_IN_THE_STORE')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_THE_PRODUCT_ALREADY_EXIST_IN_THE_STORE');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THE_PRODUCT_ALREADY_EXIST_IN_THE_STORE');
				}
                return Redirect::to('add_product')->with('success', $session_message);
            } else { 
                $entry = array(
                    
                    
                    'pro_title' => $Product_Title,
				
                    'pro_mc_id' => $Product_Category,
                    
                    'pro_smc_id' => $Product_MainCategory,
                    
                    'pro_sb_id' => $Product_SubCategory,
                    
                    'pro_ssb_id' => $Product_SecondSubCategory,

                   // 'product_brand_id' => Input::get('product_brand'), //brand
                    
                    'pro_qty' => $pquantity,

                    'pro_price' => $Original_Price,
                    
                    'pro_disprice' => $Discounted_Price,

                    'pro_discount_percentage' => $Product_discount_percentage,
                    
                    'pro_inctax' => $inc_tax,
                    
                    'pro_shippamt' => $Shipping_Amount,
                    
                    'pro_desc' => $Description,
                    
                    'pro_isspec' => $add_spec,

                    'pro_is_size'=>$pro_siz,

                    'pro_is_color'=> $pro_color,
                    
                    'pro_delivery' => $Delivery_Days,
                    
                    'pro_mkeywords' => $Meta_Keywords,
	                    
                    'pro_mdesc' => $Meta_Description,
                    
                    'pro_Img' => $file_name_insert,
                    
                    'pro_image_count' => $img_count,
                    
                    'pro_qty' => $pquantity,

                    'cash_pack' => $cash_pack,
                    
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
				//print_r($entry); exit;
				$get_active_lang = 	$this->get_active_language; 
				$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'pro_title_'.$get_lang_code => Input::get('Product_Title_'.$get_lang_name),
						'pro_desc_'.$get_lang_code => Input::get('Description_'.$get_lang_name),
						'pro_mkeywords_'.$get_lang_code => Input::get('Meta_Keywords_'.$get_lang_name),
						'pro_mdesc_'.$get_lang_code => Input::get('Meta_Description_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
                
                $productid = Products::insert_product($entry);
          
            }
            
            if ($productid) {
                
                if ($colorcount > 0) {
                    
                    for ($i = 0; $i < $colorcount; $i++) {
                        
                        $val = Input::get('colorcheckbox' . $colorarray[$i]);
                    
                        if ($val == 1) {
                            
                            $colorentry = array(
                                'pc_pro_id' => $productid,
                                
                                'pc_co_id' => $colorarray[$i]
                                
                            );
                            
                            Products::insert_product_color_details($colorentry);
                            
                        }
                        
                        else {
                    
                            
                        }
                        
                    }
                    
                }
       
                if ($add_spec == 1) {
                  
                    for ($i = 0; $i <= $specificationcount; $i++) {
                     
                        if (Input::get('spec' . $i) == 0 || Input::get('spectext' . $i == "")|| Input::get('fr_spectext' . $i == "")) {
                     
                        }
                        
                        else {
                       
                            $specificationentry = array(

                                'spc_pro_id' => $productid,

                                'spc_spg_id' => Input::get('spec_grp' . $i),
                                
                                'spc_sp_id' => Input::get('spec' . $i),
                                
                                'spc_value' => Input::get('spectext' . $i),
								//'spc_value_fr' => Input::get('fr_spectext' . $i),
                                
                            );
							
							
							$lang_entry_spec = array();
							if(!empty($get_active_lang)) { 
							foreach($get_active_lang as $get_lang) {
							$get_lang_name = $get_lang->lang_name;
							$get_lang_code = $get_lang->lang_code;
					
							 $lang_entry_spec = array(
							'spc_value_'.$get_lang_code => Input::get($get_lang_name.'_spectext'.$i),
							); 
						
						$specificationentry  = array_merge($specificationentry,$lang_entry_spec);
					}
				}
                            
                            Products::insert_product_specification_details($specificationentry);
                    
                        }
                   
                    }
                
                }
                $sizearray = Input::get('Product_Size');
                if (($productsizecount > 0) &&($pro_siz==0)){
                  
                    for ($i = 0; $i < $productsizecount; $i++) {
                        
                        //$val = Input::get('sizecheckbox' . $sizearray[$i]);
                        
                       // if ($val == 1) {
                            
                        //    if (Input::get('quantity' . $sizearray[$i]) == "") {
                                
                                
                                
                                $productsizeentry = array(
                                    'ps_pro_id' => $productid,
                                    
                                    'ps_si_id' => $sizearray[$i],
                                    
                                    'ps_volume' => 1
                                    
                                );
                                
                      /*    }
                            
                            else {
                                
                                $productsizeentry = array(
                                    'ps_pro_id' => $productid,
                                    
                                    'ps_si_id' => $sizearray[$i],
                                    
                                    'ps_volume' => Input::get('quantity' . $sizearray[$i])
                                    
                                );
                                
                            } */
                            
                            Products::insert_product_size_details($productsizeentry);
                            
                      //  }
                        
                        //else {
                            //echo "check";
                           // exit();
                            
                            
                      //  }
                        
                    }
                    
                }else if($pro_siz==1){ //else if they select no sizes
                    $check_no_size = Products::check_no_size();
                    if($check_no_size==0){  //there is no size
                   
                        $array       = array('si_name'=>'no size');
                        $insert      = Products::insert_no_size($array);
                        $pro_size_id = $insert;
                    }else{                  // if already having no size
                    
                        $get_size_id = Products::get_size_id();
                        $pro_size_id = $get_size_id[0]->si_id;
                    }
                     $productsizeentry = array(
                                    'ps_pro_id' => $productid,
                                    
                                    'ps_si_id' => $pro_size_id,
                                    
                                    'ps_volume' => 1
                                    
                                );
                    Products::insert_product_size_details($productsizeentry);
                }
                
            }
           
           return Redirect::to('manage_product');
            
        }
        }
        else {
            return Redirect::to('siteadmin');
        }
    }
       
    
    public function add_product_submitold()
    {
        
        if (Session::has('userid')) {
            
            $data = Input::except(array(
                '_token'
            ));
            
            $count = Input::get('count');
            
            $selectedcolors = Input::get('co');
          
            $trimmedselectedcolors = trim($selectedcolors, ",");
            
            $colorarray = explode(",", $trimmedselectedcolors);
            
            $colorcount = count($colorarray) - 1;
          
            $specificationcount = Input::get('specificationcount');
            
            $selectedsizes = Input::get('si');
            
            $trimmedsizes = trim($selectedsizes, ",");
            
            $sizearray = explode(",", $trimmedsizes);
          
            $productsizecount = Input::get('productsizecount');
           
            $filename_new_get = "";
            
            for ($i = 0; $i < $count; $i++) {
                
                $file_more = Input::file('file_more' . $i);
                
                $file_more_name = $file_more->getClientOriginalName();
                
                $move_more_img = explode('.', $file_more_name);
                
                $filename_new = $move_more_img[0] . str_random(8) . "." . strtolower($file_more->getClientOriginalExtension());
                
                $newdestinationPath = './public/assets/product/';
                
                $uploadSuccess_new = Input::file('file_more' . $i)->move($newdestinationPath, $filename_new);
                
                $filename_new_get .= $filename_new . "/**/";
                
            }
            
            
            $now = date('Y-m-d H:i:s');
            
            $inputs = Input::all();
            
            $file = Input::file('file');
            
            $filename = $file->getClientOriginalName();
            
            $move_img = explode('.', $filename);
            
            $filename = $move_img[0] . str_random(8) . "." . strtolower($file->getClientOriginalExtension());
            
            $destinationPath = './public/assets/product/';
            
            $uploadSuccess = Input::file('file')->move($destinationPath, $filename);
            
            $file_name_insert = $filename . "/**/" . $filename_new_get;
           
            $Product_Title = Input::get('Product_Title');
            
            $Product_Category = Input::get('Product_Category');
            
            $Product_MainCategory = Input::get('Product_MainCategory');
            
            $Product_SubCategory = Input::get('Product_SubCategory');
            
            $Product_SecondSubCategory = Input::get('Product_SecondSubCategory');
            
            $Original_Price = Input::get('Original_Price');
            
            $Discounted_Price = Input::get('Discounted_Price');
            
            $Shipping_Amount = Input::get('Shipping_Amount');
            
            $Description = Input::get('Description');
            
            $pquantity = Input::get('Quantity_Product');
            
            $Delivery_Days = Input::get('Delivery_Days');
            
            $Delivery_Policy = Input::get('Delivery_Policy');
            
            $Meta_Keywords = Input::get('Meta_Keywords');
            
            $Meta_Description = Input::get('Meta_Description');
            
            $Select_Merchant = Input::get('Select_Merchant');
            
            $Select_Shop = Input::get('Select_Shop');
            
            $inc_tax = Input::get('inctax');
            
            $add_spec = Input::get('specification');
            
            $postfb = Input::get('postfb');
            
            $img_count = Input::get('count');
           
            if ($inc_tax == 1) {
                
            }
            
            else {
                
                $inc_tax = 0;
                
            }
          
            $entry = array(
                
                'pro_title' => $Product_Title,
                
                'pro_mc_id' => $Product_Category,
                
                'pro_smc_id' => $Product_MainCategory,
                
                'pro_sb_id' => $Product_SubCategory,
                
                'pro_ssb_id' => $Product_SecondSubCategory,
                
                'pro_price' => $Original_Price,
                
                'pro_disprice' => $Discounted_Price,
                
                'pro_inctax' => $inc_tax,
                
                'pro_shippamt' => $Shipping_Amount,
                
                'pro_desc' => $Description,
                
                'pro_isspec' => $add_spec,
                
                'pro_delivery' => $Delivery_Days,
                
                'pro_mr_id' => $Select_Merchant,
                
                'pro_sh_id' => $Select_Shop,
                
                'pro_mkeywords' => $Meta_Keywords,
                
                'pro_mdesc' => $Meta_Description,
                
                'pro_Img' => $file_name_insert,
                
                'pro_image_count' => $img_count,
                
                'pro_qty' => $pquantity
           
            );
            
            $productid = Products::insert_product($entry);
            
            if ($productid) {
                
                if ($colorcount > 0) {
                    
                    for ($i = 0; $i < $colorcount; $i++) {
                    
                        $colorentry = array(
                            'pc_pro_id' => $productid,
                            
                            'pc_co_id' => $colorarray[$i]
                            
                        );
                        
                        Products::insert_product_color_details($colorentry);
                        
                    }
                    
                }
                
                for ($i = 0; $i <= $specificationcount; $i++) {
                    
                    $specificationentry = array(
                        'spc_pro_id' => $productid,
                        
                        'spc_sp_id' => Input::get('spec' . $i),
                        
                        'spc_value' => Input::get('spectext' . $i)
                        
                    );
                    
                    Products::insert_product_specification_details($specificationentry);
                 
                }
                
                if ($productsizecount > 0) {
                    
                    for ($i = 0; $i < $productsizecount; $i++) {
                        
                        $val = Input::get('sizecheckbox' . $sizearray[$i]);
                        
                        if ($val == 1) {
                            
                            $productsizeentry = array(
                                'ps_pro_id' => $productid,
                                
                                'ps_si_id' => $sizearray[$i],
                                
                                'ps_volume' => Input::get('quantity' . $sizearray[$i])
                                
                            );
                            
                            Products::insert_product_size_details($productsizeentry);
                            
                        }
                        
                        else {
                            
                            
                            
                        }
                        
                    }
                    
                }
                
            }
       
            return Redirect::to('manage_product');
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
           
        }
      
    }
    
    public function edit_product_submit(Request $request)
    {

     
        if (Session::has('userid')) {
            $id = Input::get('product_edit_id');
            $now = date('Y-m-d H:i:s');
             $files = Input::file('new_file');
			 $files_exit = Input::file('file');
             
			$filesExitCount = count($files_exit);
			$filesCount = count($files);
            $data = Input::except(array(
                '_token'
            ));
           // print_r($files); exit();
			if($files !=0)
			{
			for ($i=0; $i < $filesCount; $i++)
			{
				$file = $files[$i];
				$input = array(
				'product_image' => $files[$i]
			);
			$rules = array(
			'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|image_size:'.$this->product_width.','.$this->product_height.''
				);
				$validator = Validator::make($input, $rules);
			}
					
			if ($validator->fails())
			{
				return Redirect::to('edit_product/'.$id)->withErrors($validator->messages())->withInput();
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
							'upload_exit' => 'required|image|mimes:jpeg,png,jpg|image_size:'.$this->product_width.','.$this->product_height.''
						);
						$validator = Validator::make($input, $rules);
						
						if ($validator->fails())
						{
							return Redirect::to('edit_product/'.$id)->withErrors($validator->messages())->withInput();
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
				
				
				$validator = Validator::make($inputs, $rules);
	            
	            if ($validator->fails())
	            {
	                return Redirect::to('edit_product/' . $id)->withErrors($validator->messages())->withInput();
					
	            }
				
				
            $inputs = Input::all();
       
            $id = Input::get('product_edit_id');
            
            $productid = Input::get('product_edit_id');
            
            $selectedcolors = Input::get('co');
            
            $trimmedselectedcolors = trim($selectedcolors, ",");
            
            $colorarray = explode(",", $trimmedselectedcolors);
            
            $colorcount = count($colorarray);
         
            $returncolor = Products::delete_product_color($id);
            
            $returnsize = Products::delete_product_size($id);
            
            $returnspec = Products::delete_product_spec($id);
            
            $specificationcount = Input::get('specificationcount'); 
          
            $selectedsizes = Input::get('si');
          
            $trimmedsizes = trim($selectedsizes, ",");
            
            $sizearray = explode(",", $trimmedsizes);
            
            $productsizecount = Input::get('productsizecount');
           
                     
            $img_count = Input::get('count');
            
            /*product image update*/
            $filename_new_get = "";
                $j=1;

                $file_get      = $request->input('file_get');            // (pro_img => old_image ie.before edit) getting as hidden input
                $file_get_path =  explode("/**/",$file_get,-1);          // explode that array of file names
                $field_values_array = $request->file('file');   
                       // getting replace image files
                 $k=0;
                
                // print_r($file_get);
                // print_r($image_old);
                // exit;
                
                 if(count($field_values_array)>0 ) {
                foreach($field_values_array as $value){                   //your Image Upload into directory goes here
                    
                    $a = $j++;     
                                                        // $j is for calculation position of images
                    if(isset($value)){ 
                                                  // if there is a replace file, get into the loop
                            
                            echo $image_name   = $value->getClientOriginalName(); 
                            echo "</br>";     // renameing the image

                             $move_more_img = explode('.', $image_name);
							 $time=time().rand();
                             $filename_new = 'Product_'.$time.'.' . strtolower($value->getClientOriginalExtension()); 
                            
						
                             $newdestinationPath = './public/assets/product/';
                
                            Image::make($value)->save('./public/assets/product/'.$filename_new,$this->image_compress_quality); 
                            $image_old = Input::get('image_old');
							
							 if(file_exists($newdestinationPath.$image_old[$k]))
							 {
								@unlink($newdestinationPath.$image_old[$k]);
							 }
                             $filename_new_get.= $filename_new . "/**/";                                    // concatenating the new replace files 
                            
                    }   //isset value
                    else {  
                                                                // else there is no replace image is set it comes here
              
                        $filename_new_get.= $file_get_path[$a-1]. "/**/";   // now here we are concatenating the old image name
                   
                    }
					$k++;	//else 
                }
                } else 
                { 
                    $filename_new_get= $file_get;  
                }
               // print_r($filename_new_get);
                //exit; //foreach    

                /*if isset new product images it goes here */

                $new_field_values_array = Input::file('new_file');
			
                $new_file_count = count($new_field_values_array);
                //print_r($new_field_values_array); print($new_file_count); exit();
                if($new_file_count > 0){
                    
                  foreach($new_field_values_array as $new_value){
                    
                    $product_new_name   = $new_value->getClientOriginalName();
                    
                    $new_more_img       = explode('.', $product_new_name);
					$time=time().rand();
                    $filename_new = 'Product_'.$time.'.' . strtolower($new_value->getClientOriginalExtension());
                    
                    Image::make($new_value)->save('./public/assets/product/'.$filename_new,$this->image_compress_quality);                    
                    $filename_new_get .= $filename_new . "/**/";
				}
				} 

            
                      
            $file_name_insert = $filename_new_get;
			
            
            $id = Input::get('product_edit_id');
           
            $Product_Title = Input::get('Product_Title');
			$Product_Title_fr = Input::get('Product_Title_fr');
            
            $Product_Category = Input::get('category');
            
            $Product_MainCategory = Input::get('maincategory');
            
            $Product_SubCategory = Input::get('subcategory');
            
            $Product_SecondSubCategory = Input::get('secondsubcategory');
            
            $Original_Price = Input::get('Original_Price');
            
            $Discounted_Price = Input::get('Discounted_Price');

/* calculate product discount percentage */
            $product_saving_price        = Input::get('Original_Price') - Input::get('Discounted_Price');
            
            $Product_discount_percentage = (($product_saving_price / Input::get('Original_Price')) * 100);
             $Product_discount_percentage=floor($Product_discount_percentage);
/* calculate product discount percentage */

            $Shipping_Amount = Input::get('Shipping_Amount');

            if ($Shipping_Amount == "") {
                
                $Shipping_Amount = 0;
          
            }
            
            $Description = Input::get('Description');
			$Description_fr = Input::get('Description_fr');
           
            $Delivery_Days = Input::get('Delivery_Days');
            
            $Delivery_Policy = Input::get('Delivery_Policy');
            
            $Meta_Keywords = Input::get('Meta_Keywords');
			$Meta_Keywords_fr = Input::get('Meta_Keywords_fr');
            
            $Meta_Description = Input::get('Meta_Description');
			$Meta_Description_fr = Input::get('Meta_Description_fr');
            
            $cash_pack = Input::get('cash_price');
            $Select_Merchant = Input::get('Select_Merchant');
            
            $Select_Shop = Input::get('Select_Shop');
            
            $inc_tax = Input::get('inctax');
            
            $add_spec = Input::get('specification');
            
            $postfb = Input::get('postfb');
            
            $img_count = Input::get('count');
            
            $pquantity = Input::get('Quantity_Product');

            $sold_out  = 1;      
            
            $entry = array(
                
                'pro_title' => $Product_Title,
                
                'pro_mc_id' => $Product_Category,
                
                'pro_smc_id' => $Product_MainCategory,
                
                'pro_sb_id' => $Product_SubCategory,
                
                'pro_ssb_id' => $Product_SecondSubCategory,

               // 'product_brand_id' => Input::get('product_brand'),     //brand
                
                'pro_price' => $Original_Price,
                
                'pro_disprice' => $Discounted_Price,

                'pro_discount_percentage' => $Product_discount_percentage,
                
                'pro_inctax' => $inc_tax,
                
                'pro_shippamt' => $Shipping_Amount,
                
                'pro_desc' => $Description,
                
                'pro_isspec' => $add_spec,

                'pro_is_size' => Input::get('pro_siz'),

                'pro_is_color' => Input::get('productcolor'),
                
                'pro_delivery' => $Delivery_Days,
                
                'pro_mkeywords' => $Meta_Keywords,

                'pro_mdesc' => $Meta_Description,
                
                'pro_Img' => $file_name_insert,
                
                'pro_image_count' => $img_count,
                
                'pro_qty' => $pquantity,

                'sold_status' => $sold_out,

                'cash_pack' => $cash_pack,
				
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
						'pro_title_'.$get_lang_code => Input::get('Product_Title_'.$get_lang_name),
						'pro_desc_'.$get_lang_code => Input::get('Description_'.$get_lang_name),
						'pro_mkeywords_'.$get_lang_code => Input::get('Meta_Keywords_'.$get_lang_name),
						'pro_mdesc_'.$get_lang_code => Input::get('Meta_Description_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
				

				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
						
					//	$check_merchant = Input::get('Select_Merchant_'.$get_lang_name);
						// $check_shop = Input::get('Select_Shop_'.$get_lang_name);
				
						$check_title_lang = Input::get('Product_Title_'.$get_lang_name);
						$check_title_exist_lang = Products::check_product_exists_edit_lang($id,$check_title_lang,$get_lang_name,$get_lang_code);
						// print_r($check_title_exist_lang);exit();
					}
				}
				
				$check_title = Input::get('Product_Title');
			//	$check_merchant = Input::get('Select_Merchant');
				// $check_shop = Input::get('Select_Shop');
                $check_title_exist = Products::check_product_exists_edit($id,$check_title);
                //print_r($check_title_exist);exit();
               
                if ($check_title_exist>0) {
    				if(Lang::has(Session::get('admin_lang_file').'.BACK_TITLE_ALREADY_EXIST')!= '') 
    				{ 
    					$session_message = trans(Session::get('admin_lang_file').'.BACK_TITLE_ALREADY_EXIST');
    				}  
    				else 
    				{ 
    					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TITLE_ALREADY_EXIST');
    				}
                    return Redirect::to('edit_product/' . $id)->with('error_message', $session_message)->withInput();
                } 
				else if (isset($check_title_exist_lang)) {
                    if($check_title_exist_lang>0){
    					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TITLE_ALREADY_EXIST');
    					return Redirect::to('edit_product/' . $id)->with('error_message', $session_message)->withInput();
                    }
				}
				
				
         
				$return     = Products::edit_product($entry, $id); 
            /*product color*/
            $old_color  = Input::get('is_pro_color');  // value of pro_is_size before editing
            $edit_color = Input::get('productcolor'); // value of pro_is_color after editing

            if(($old_color==0)&&($edit_color==1)){      // if before editing there is a size && now they select is no size
                $destory_color = Products::destory_color($productid);
            }

            if (($colorcount > 0)&&($edit_color==0)){
                
                for ($i = 0; $i < $colorcount; $i++) {
                    
                    $val = Input::get('colorcheckbox' . $colorarray[$i]);
                  
                    if ($val == 1) {
                        
                        $colorentry = array(
                            'pc_pro_id' => $productid,
                            
                            'pc_co_id' => $colorarray[$i]
                            
                        );
                        
                        Products::insert_product_color_details($colorentry);
                    
                    }
                    
                    else {
                    
                    }
                    
                }//for
                
            }
            
            for ($i = 0; $i <= $specificationcount; $i++) {
           
                if (Input::get('spec' . $i) == 0 || Input::get('spectext' . $i == "")) {
                   
              
                }
                
                else {
                    
                    $specificationentry = array(
                        'spc_pro_id' => $productid,

                        'spc_spg_id' => Input::get('spec_grp' . $i),
                        
                        'spc_sp_id' => Input::get('spec' . $i),
                        
                        'spc_value' => Input::get('spectext' . $i),
						//'spc_value_fr' => Input::get('fr_spectext' . $i),
                        
                    );
					
					
						$lang_entry_spec = array();
						if(!empty($get_active_lang)) { 
						foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry_spec = array(
						'spc_value_'.$get_lang_code => Input::get($get_lang_name.'_spectext'.$i),
						); 
						
						$specificationentry  = array_merge($specificationentry,$lang_entry_spec);
					}
				}
					
                   // print_r($specificationentry); exit;
                    Products::insert_product_specification_details($specificationentry);
                  
                }
            
            }
            $old = Input::get('is_pro_siz');  // value of pro_is_size before editing
            $edit = Input::get('pro_siz');  // value of pro_is_size after editing
            if(($old==0)&&($edit==1)){      // if before editing there is a size && now they select is no size
                $destory_size = Products::destory_size($productid);

            }

            if (($productsizecount > 0)&&($edit==0)) {
                
                for ($i = 0; $i < $productsizecount; $i++) {
                    
                    $val = Input::get('sizecheckbox' . $sizearray[$i]);
                    
                    if ($val == 1) {
                        
                        $productsizeentry = array(
                            'ps_pro_id' => $productid,
                            
                            'ps_si_id' => $sizearray[$i],
                            
                            'ps_volume' => Input::get('quantity' . $sizearray[$i])
                            
                        );
                        
                        Products::insert_product_size_details($productsizeentry);
                        
                    }else {}
                    
                } //for
                
            }else{
                    $check_no_size = Products::check_no_size();
                    
                    if($check_no_size==0){  //there is no size
                   
                        $array       = array('si_name'=>'no size');
                        $insert      = Products::insert_no_size($array);
                        $pro_size_id = $insert;
                    }else{                  // if already having no size
                    
                        $get_size_id = Products::get_size_id();
                        $pro_size_id = $get_size_id[0]->si_id;
                    }
                     $productsizeentry = array(
                                    'ps_pro_id' => $productid,
                                    
                                    'ps_si_id' => $pro_size_id,
                                    
                                    'ps_volume' => 1
                                    
                                );
                    Products::insert_product_size_details($productsizeentry);
            }
			if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_UPDATED_SUCCESSFULLY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCT_UPDATED_SUCCESSFULLY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_UPDATED_SUCCESSFULLY');
			}
            return Redirect::to('manage_product')->with('block_message', $session_message);
      
        }
		
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }

    public function delete_product_img($pro_id,$image){
		
		

        $return = Products::delete_product_img($pro_id,$image);

		if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_REMOVED_SUCCESSFULLY')!= ''){ 
			$session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_REMOVED_SUCCESSFULLY');
		}else{ 
			$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_REMOVED_SUCCESSFULLY');
		}	
       
        return Redirect::back()->with('message',$session_message);

    }
    
        
    public function edit_product_submitold()
    {
        
        if (Session::has('userid')) {
         
            $now = date('Y-m-d H:i:s');
            
            $inputs = Input::all();
            
            $pquantity = Input::get('Quantity_Product');
            
            $id = Input::get('product_edit_id');
            
            $productid = Input::get('product_edit_id');
            
            $returncolor = Products::delete_product_color($id);
            
            $returnsize = Products::delete_product_size($id);
            
            $returnspec = Products::delete_product_spec($id);
            
            $selectedcolors = Input::get('co');
            
            $trimmedselectedcolors = trim($selectedcolors, ",");
            
            $colorarray = explode(",", $trimmedselectedcolors);
            
            $colorcount = count($colorarray);
            
            $specificationcount = Input::get('specificationcount');
            
            $selectedsizes = Input::get('si');
            
            $trimmedsizes = trim($selectedsizes, ",");
            
            $sizearray = explode(",", $trimmedsizes);
            
            $productsizecount = Input::get('productsizecount');
            //$productsizecount = count(Input::get('Product_Size'));
           
            $img_count = Input::get('count');
            
            $filename_new_get = "";
            
            for ($i = 0; $i < $img_count; $i++) {
                
                $file_more = Input::file('file_more' . $i);
                
                if ($file_more == "") {
                    
                    $dile_name_new_get = Input::get('file_more_new' . $i);
                    
                    $filename_new_get .= $dile_name_new_get . "/**/";
                    
                } else {
                    
                    $file_more_name = $file_more->getClientOriginalName();
                    
                    $move_more_img = explode('.', $file_more_name);
                    
                    $filename_new = $move_more_img[0] . str_random(8) . "." . strtolower($file_more->getClientOriginalExtension());
                    
                    $newdestinationPath = './public/assets/product/';
                    
                    $uploadSuccess_new = Input::file('file_more' . $i)->move($newdestinationPath, $filename_new);
                    
                    $filename_new_get .= $filename_new . "/**/";
                    
                }
            
            }
            
            $file = Input::file('file');
            
            if ($file == "") {
                
                $filename = Input::get('file_new');
                
            }
            
            else {
                
                $filename = $file->getClientOriginalName();
                
                $move_img = explode('.', $filename);
                
                $filename = $move_img[0] . str_random(8) . "." . strtolower($file->getClientOriginalExtension());
                
                $destinationPath = './public/assets/deals/';
                
                $uploadSuccess = Input::file('file')->move($destinationPath, $filename);
                
            }
            
            echo $file_name_insert = $filename . "/**/" . $filename_new_get . "<br>" . Input::get('deal_edit_id');
            
            $id = Input::get('product_edit_id');
            
            $Product_Title = Input::get('Product_Title');
            
            $Product_Category = Input::get('category');
            
            $Product_MainCategory = Input::get('maincategory');
            
            $Product_SubCategory = Input::get('subcategory');
            
            $Product_SecondSubCategory = Input::get('secondsubcategory');
            
            $Original_Price = Input::get('Original_Price');
            
            $Discounted_Price = Input::get('Discounted_Price');
            
            $Shipping_Amount = Input::get('Shipping_Amount');
            
            $Description = Input::get('Description');
            
            $Delivery_Days = Input::get('Delivery_Days');
            
            $Delivery_Policy = Input::get('Delivery_Policy');
            
            $Meta_Keywords = Input::get('Meta_Keywords');
            
            $Meta_Description = Input::get('Meta_Description');
            
            $Select_Merchant = Input::get('Select_Merchant');
            
            $Select_Shop = Input::get('Select_Shop');
            
            $inc_tax = Input::get('inctax');
            
            $add_spec = Input::get('specification');
            
            $postfb = Input::get('postfb');
            
            $img_count = Input::get('count');
            
            if ($inc_tax == 1) {
                
            }
            
            else {
                
                $inc_tax = 0;
                
            }
            
            $entry = array(
                
                'pro_title' => $Product_Title,
                
                'pro_mc_id' => $Product_Category,
                
                'pro_smc_id' => $Product_MainCategory,
                
                'pro_sb_id' => $Product_SubCategory,
                
                'pro_ssb_id' => $Product_SecondSubCategory,
                
                'pro_price' => $Original_Price,
                
                'pro_disprice' => $Discounted_Price,
                
                'pro_inctax' => $inc_tax,
                
                'pro_shippamt' => $Shipping_Amount,
                
                'pro_desc' => $Description,
                
                'pro_isspec' => $add_spec,
                
                'pro_delivery' => $Delivery_Days,
                
                'pro_mr_id' => $Select_Merchant,
                
                'pro_sh_id' => $Select_Shop,
                
                'pro_mkeywords' => $Meta_Keywords,
                
                'pro_mdesc' => $Meta_Description,
                
                'pro_Img' => $file_name_insert,
                
                'pro_image_count' => $img_count,
                
                'pro_qty' => $pquantity
             
            );
            
            $return = Products::edit_product($entry, $id);
            
            if ($colorcount > 0) {
                
                for ($i = 0; $i < $colorcount; $i++) {
                
                    $colorentry = array(
                        'pc_pro_id' => $productid,
                        
                        'pc_co_id' => $colorarray[$i]
                        
                    );
                    
                    Products::insert_product_color_details($colorentry);
                    
                }
                
            }
            
            if ($add_spec == 1) {
                
                for ($i = 0; $i <= $specificationcount; $i++) {
                    
                    if (Input::get('spec' . $i) == 0 || Input::get('spectext' . $i == "")) {
                  
                    }
                    
                    else {
                        
                        $specificationentry = array(
                            'spc_pro_id' => $productid,
                            
                            'spc_sp_id' => Input::get('spec' . $i),
                            
                            'spc_value' => Input::get('spectext' . $i)
                            
                        );
                        
                        Products::insert_product_specification_details($specificationentry);
                     
                    }
                  
                }
                
            }
            
            if ($productsizecount > 0) {
                
                for ($i = 0; $i < $productsizecount; $i++) {
                    
                    $val = Input::get('sizecheckbox' . $sizearray[$i]);
                    
                    if ($val == 1) {
                        
                        $productsizeentry = array(
                            'ps_pro_id' => $productid,
                            
                            'ps_si_id' => $sizearray[$i],
                            
                            'ps_volume' => Input::get('quantity' . $sizearray[$i])
                            
                        );
                        
                        Products::insert_product_size_details($productsizeentry);
                        
                    }
                    
                    else {
                        
                        
                        
                    }
                    
                }
                
            }
			if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_UPDATED_SUCCESSFULLY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCT_UPDATED_SUCCESSFULLY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_UPDATED_SUCCESSFULLY');
			}
            return Redirect::to('manage_product')->with('block_message', $session_message);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    public function product_get_spec(){
        
        $spc_group_id = $_GET['spc_group_id'];
        $product_specification = '';
        
        $specification = Products::product_get_spec($spc_group_id);

        if(count($specification)!=0){
            foreach ($specification as $pro_specification) {
            
                $product_specification .= "<option value='" . $pro_specification->sp_id . "'> " . $pro_specification->sp_name . " </option>";
            }
        }else{
            $product_specification .= "<option value='0'>No datas found in this group </option>";
        }
        echo $product_specification;
        
    }
    public function product_getmaincategory()
    {
        
        $categoryid = $_GET['id'];
        
        $main_category = Products::load_maincategory_ajax($categoryid);
        
        if ($main_category) {
            
            $maincategoryresult = "";
            if(Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_MAIN_CATEGORY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SELECT_MAIN_CATEGORY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SELECT_MAIN_CATEGORY');
			}
            $maincategoryresult .= "<option value='0'> -".$session_message."- </option>";
            
            foreach ($main_category as $main_category_ajax) {
            
                $maincategoryresult .= "<option value='" . $main_category_ajax->smc_id . "'> " . $main_category_ajax->smc_name ;
				 /* $maincategoryresult .= "(".$main_category_ajax->smc_name_fr.") </option>"; */
				 $maincategoryresult .= "</option>";
                
            }
            
            echo $maincategoryresult;
            
        }
        
        else {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_LIST_AVAILABLE_IN_THE_CATEGORY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_LIST_AVAILABLE_IN_THE_CATEGORY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_LIST_AVAILABLE_IN_THE_CATEGORY');
			}
            echo $maincategoryresult = "<option value='0'>".$session_message." </option>";
            
        }
      
    }
    public function mer_product_getmaincategory() //for merchant add product
    {
        
        $categoryid = $_GET['id'];
        
        $main_category = Products::load_maincategory_ajax($categoryid);
        
        if ($main_category) {
            
            $maincategoryresult = "";
            
            $maincategoryresult .= "<option value='0'> --select-- </option>";
            
            foreach ($main_category as $main_category_ajax) {
            
                $maincategoryresult .= "<option value='" . $main_category_ajax->smc_id . "'> " . $main_category_ajax->smc_name;
                /* $maincategoryresult .= "(".$main_category_ajax->smc_name_fr.")"; */
                $maincategoryresult .= "</option>";
                
            }
            
            echo $maincategoryresult;
            
        }
        
        else {
            
            echo $maincategoryresult = "<option value='0'>--No categories available--</option>";
            
        }
      
    }
    
    public function product_getsubcategory()
    {
        
        $categoryid = $_GET['id'];
       
        $sub_category = Products::load_subcategory_ajax($categoryid);
        
        if (count($sub_category)>0) {
            
            $subcategoryresult = "";
            if(Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SUB_CATEGORY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SELECT_SUB_CATEGORY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SUB_CATEGORY');
			}
            $subcategoryresult = "<option value='0'> -- ".$session_message."-- </option>";
            
            foreach ($sub_category as $sub_category_ajax) {
                
                $subcategoryresult .= "<option value='" . $sub_category_ajax->sb_id . "'> " . $sub_category_ajax->sb_name;
               /*  $subcategoryresult .= "(".$sub_category_ajax->sb_name_fr.")"; */
                $subcategoryresult .= "</option>";
                
            }
            
            echo $subcategoryresult;
            
        }
        
        else {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_LIST_AVAILABLE_IN_THE_CATEGORY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_LIST_AVAILABLE_IN_THE_CATEGORY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_LIST_AVAILABLE_IN_THE_CATEGORY');
			}
            echo $subcategoryresult = "<option value='0'>".$session_message."</option>";
            
        }
        
    }
    
    public function mer_product_getsubcategory()
    {
        
        $categoryid = $_GET['id'];
       
        $sub_category = Products::load_subcategory_ajax($categoryid);
        
        if (count($sub_category)>0) {
            
            $subcategoryresult = "";
            
            $subcategoryresult = "<option value='0'> -- Select Sub Category-- </option>";
            
            foreach ($sub_category as $sub_category_ajax) {
                
                $subcategoryresult .= "<option value='" . $sub_category_ajax->sb_id . "'> " . $sub_category_ajax->sb_name;
                /* $subcategoryresult .= "(".$sub_category_ajax->sb_name_fr.")"; */
                $subcategoryresult .= "</option>";
                
            }
            
            echo $subcategoryresult;
            
        }
        
        else {
            
            echo $subcategoryresult = "<option value='0'>No data available in this category</option>";
            
        }
        
    }
    
    
    public function product_getsecondsubcategory()
    {
        
        $categoryid = $_GET['id'];
        
        $secondsub_category = Products::get_second_sub_category_ajax($categoryid);
        
        if (count($secondsub_category)>0) {
            
            $secondsubcategoryresult = "";
            if(Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SECOND_SUB_CATEGORY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SELECT_SECOND_SUB_CATEGORY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SECOND_SUB_CATEGORY');
			}
            $secondsubcategoryresult = "<option value='0'> -- ".$session_message."-- </option>";
            
            foreach ($secondsub_category as $second_sub_category_ajax) {
                
                $secondsubcategoryresult .= "<option value='" . $second_sub_category_ajax->ssb_id . "'> " . $second_sub_category_ajax->ssb_name;
                /* $secondsubcategoryresult .= "(".$second_sub_category_ajax->ssb_name_fr.")"; */
                $secondsubcategoryresult .= "</option>";
                
            }
            
            echo $secondsubcategoryresult;
            
        }
        
        else {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_LIST_AVAILABLE_IN_THE_CATEGORY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_LIST_AVAILABLE_IN_THE_CATEGORY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_LIST_AVAILABLE_IN_THE_CATEGORY');
			}
            echo $secondsubcategoryresult = "<option value='0'>".$session_message."</option>";
            
        }
        
    }

    public function mer_product_getsecondsubcategory(){
        
        $categoryid = $_GET['id'];
        
        $secondsub_category = Products::get_second_sub_category_ajax($categoryid);
        
        if (count($secondsub_category)>0) {
            
            $secondsubcategoryresult = "";
            
            $secondsubcategoryresult = "<option value='0'> -- Second Sub Category-- </option>";
            
            foreach ($secondsub_category as $second_sub_category_ajax) {
                
                $secondsubcategoryresult .= "<option value='" . $second_sub_category_ajax->ssb_id . "'> " . $second_sub_category_ajax->ssb_name ;
                /* $secondsubcategoryresult .="(".$second_sub_category_ajax->ssb_name_fr.")"; */
                $secondsubcategoryresult .= "</option>";
                
            }
            
            echo $secondsubcategoryresult;
            
        }
        
        else {
           
            echo $secondsubcategoryresult = "<option value='0'>No datas available in this category</option>";
            
        }
        
    }
    
    
    
    public function product_getcolor()
    {
        
        $colorid = $_GET['id'];
        
        if ($_GET['co_text_box'] == "") {
            
            $get_text_array = 0;
            
        }
        
        else {
            
            $get_text_array = trim($_GET['co_text_box'], ',');
            
            $result_array = explode(',', $get_text_array);
            
            $countval = count($result_array);
            
        }
        
        $array_push_values = array();
        
        for ($i = 0; $i < $countval; $i++) {
            
            array_push($array_push_values, $result_array[$i]);
            
        }
       
        $result_colorname = Products::get_colorname_ajax($colorid);
        
        foreach ($result_colorname as $result_colorname_ajax) {
         
            $returnvalue = $result_colorname_ajax->co_name . "," . $result_colorname_ajax->co_id . "," . $result_colorname_ajax->co_code;
       
        }
      
        if (in_array($colorid, $array_push_values)) {
           
            return $returnvalue . ",failed";
           
        }
        
        else {
            
            return $returnvalue . ",success";
            
        }
        
        
        
    }
    
    
    
    public function product_getcolor_edit()
    {
        
        $colorid = $_GET['id'];
        
        if ($_GET['co_text_box'] == "") {
            
            $get_text_array = 0;
        
        }
        
        else {
          
            $get_text_array = trim($_GET['co_text_box'], ',');
            
            $result_array = explode(',', $get_text_array);
            
            $countval = count($result_array);
          
        }
        
        if ($get_text_array == 0) {
            
            $array_push_values = array();
            
            for ($i = 0; $i < $countval; $i++) {
                
                array_push($array_push_values, $result_array[$i]);
                
            }
       
        }
        
        else {
            
            $array_push_values = array();
            
            for ($i = 0; $i <= $countval; $i++) {
                
                array_push($array_push_values, $result_array[$i]);
                
            }
            
            
            
        }
       
        $result_colorname = Products::get_colorname_ajax($colorid);
        
        foreach ($result_colorname as $result_colorname_ajax) {
       
            $returnvalue = $result_colorname_ajax->co_name . "," . $result_colorname_ajax->co_id . "," . $result_colorname_ajax->co_code;
         
        }
        
        if (in_array($colorid, $array_push_values)) {
            
            return $returnvalue . ",failed";
            
        }
        
        else {
            
            return $returnvalue . ",success";
            
        }
        
    }
    
    
    
    public function product_getsize()
    {
        
        $sizeid = $_GET['id'];
        
        if ($_GET['si_text_box'] == "") {
            
            $get_text_array = 0;
            
        }
        
        else {
          
            $get_text_array = trim($_GET['si_text_box'], ',');
            
            $result_array = explode(',', $get_text_array);
          
            $countval = count($result_array);
            
        }
        
        $array_push_values = array();
        
        for ($i = 0; $i < $countval; $i++) {
            
            array_push($array_push_values, $result_array[$i]);
            
        }
        
        $result_sizename = Products::get_sizename_ajax($sizeid);
        
        foreach ($result_sizename as $result_sizename_ajax) {
            
                     $returnvalue = $result_sizename_ajax->si_name . "," . $result_sizename_ajax->si_id . "," . $result_sizename_ajax->si_name;
        
        }
        
        if (in_array($sizeid, $array_push_values)) {
            
            return $returnvalue . ",failed";
            
        }
        
        else {
            
            return $returnvalue . ",success";
            
        }
        
        
        
    }
    
    
    public function product_edit_getmaincategory(){
        
        $id = $_GET['edit_id'];
         $top_cat_id=$_GET['edit_id_top'];
      
        
        $main_cat = DB::table('nm_secmaincategory')->where('smc_mc_id','=',$top_cat_id)
        ->get();
        //print_r($main_cat);
        //exit;
        
        if ($main_cat) {
            
            $return = "";
            
            foreach ($main_cat as $main_cat_ajax) {
                if($id==$main_cat_ajax->smc_id) 
                {
                $return .= "<option value='" . $main_cat_ajax->smc_id . "' selected> " . $main_cat_ajax->smc_name;
                /* $return .= "(".$main_cat_ajax->smc_name_fr.")"; */
                $return .= "</option>";
                    } 
                     else 
                    {
                    if($main_cat_ajax->smc_status==1)
                    {
                $return .= "<option value='" . $main_cat_ajax->smc_id . "'> " . $main_cat_ajax->smc_name;
                /* $return .= "(".$main_cat_ajax->smc_name_fr.")"; */
                $return .= "</option>";
                    }
                 } 

                
            }
            
            echo $return;
            
        }
        
        else {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'>".$session_message."</option>";
            
        }
        
    }
    
    
    
    public function product_edit_getsubcategory()
    {
        
        $id = $_GET['edit_sub_id'];
        $id_main = $_GET['edit_id_main'];
        
        $main_cat = DB::table('nm_subcategory')->where('mc_id', '=', $id_main)->get();
        
        if ($main_cat) {
            
            $return = "";
            
           /* foreach ($main_cat as $main_cat_ajax) {
                
                $return .= "<option value='" . $main_cat_ajax->sb_id . "' selected> " . $main_cat_ajax->sb_name;
                /* $return .= "(".$main_cat_ajax->sb_name_fr.")"; */
               /* $return .= "</option>";*/
                
            /*}*/

            foreach ($main_cat as $main_cat_ajax) {
                if($id==$main_cat_ajax->sb_id) 
                {
                $return .= "<option value='" . $main_cat_ajax->sb_id . "' selected> " . $main_cat_ajax->sb_name;
                /* $return .= "(".$main_cat_ajax->smc_name_fr.")"; */
                $return .= "</option>";
                    } 
                     else 
                    {
                    if($main_cat_ajax->sb_status==1)
                    {
                $return .= "<option value='" . $main_cat_ajax->sb_id . "'> " . $main_cat_ajax->sb_name;
                /* $return .= "(".$main_cat_ajax->smc_name_fr.")"; */
                $return .= "</option>";
                    }
                 } 

                
            }
            
            echo $return;
            
        }
        
        else {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'>".$session_message." </option>";
            
        }
        
    }
  
    
  /*  public function product_getmerchantshop()
    {
        
        $id = $_GET['id'];
        
        $shop_det = Products::get_product_details_formerchant($id);
       
        if ($shop_det) {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_STORE')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SELECT_STORE');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SELECT_STORE');
			}
            $return = "<option value='0'>--".$session_message."--</option>";
        
            foreach ($shop_det as $shop_det_ajax) {
                
                $return .= "<option value='" . $shop_det_ajax->stor_id . "' > " . $shop_det_ajax->stor_name;
                 $return .= "(".$shop_det_ajax->stor_name_fr.")"; 
                $return .= "</option>";
                
            }
            
            echo $return;
            
        }
        
        else {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'> ".$session_message." </option>";
            
        }
      
    } */
    public function mer_product_getmerchantshop()
    {
        
        $id = $_GET['id'];
        
        $shop_det = Products::get_product_details_formerchant($id);
       
        if ($shop_det) {
            
            $return = "<option value='0'>--select store--</option>";
        
            foreach ($shop_det as $shop_det_ajax) {
                
                $return .= "<option value='" . $shop_det_ajax->stor_id . "' > " . $shop_det_ajax->stor_name;
                /* $return .= "(".$shop_det_ajax->stor_name_fr.")"; */
                $return .= "</option>";
                
            }
            
            echo $return;
            
        }
        
        else {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'> ".$session_message." </option>";
            
        }
      
    }


   /* public function product_mer_shop_selected(){
         $mer_id   = $_GET['mer_id'];
         $store_id = $_GET['store_id'];

         $shop_det = Products::get_product_details_formerchant($mer_id);
        
       
        if ($shop_det) {
            
            $return = "";
        
            foreach ($shop_det as $shop_det_ajax) {
                
             //echo $return= 
            if($shop_det_ajax->stor_id==$store_id){ $select = "selected";}else{ $select =""; }
             echo $return.= "<option value=".$shop_det_ajax->stor_id." ".$select.">".$shop_det_ajax->stor_name;
             /* echo $return.= "(".$shop_det_ajax->stor_name_fr.")"; 
             echo $return.= "</option>";
             }
            
            echo $return;
            
        }
        
        else {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'> ".$session_message." </option>";
            
        }
    }  */
    
    
    
    public function Product_edit_getsecondsubcategory()
    {
        
         $id = $_GET['edit_second_sub_id'];
         $edit_sub_id=$_GET['edit_sub_id'];
       
       
        $main_cat = DB::table('nm_secsubcategory')->where('ssb_sb_id', '=', $edit_sub_id)->get();
        
        if ($main_cat) {
            
            $return = "";
            
            /*foreach ($main_cat as $main_cat_ajax) {
                
                $return .= "<option value='" . $main_cat_ajax->ssb_id . "' selected> " . $main_cat_ajax->ssb_name;
               /*  $return .= "(".$main_cat_ajax->ssb_name_fr.")"; */
               /* $return .= "</option>";*/
                
            /*}
*/

            foreach ($main_cat as $main_cat_ajax) {
                if($id==$main_cat_ajax->ssb_id) 
                {
                $return .= "<option value='" . $main_cat_ajax->ssb_id . "' selected> " . $main_cat_ajax->ssb_name;
                /* $return .= "(".$main_cat_ajax->smc_name_fr.")"; */
                $return .= "</option>";
                    } 
                     else 
                    {
                    if($main_cat_ajax->ssb_status==1)
                    {
                $return .= "<option value='" . $main_cat_ajax->ssb_id . "'> " . $main_cat_ajax->ssb_name;
                /* $return .= "(".$main_cat_ajax->smc_name_fr.")"; */
                $return .= "</option>";
                    }
                 } 

                
            }


            
            echo $return;
            
        }
        
        else {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'> ".$session_message." </option>";
            
        }
        
    }
    
    
    
    public function block_product($id, $status)
    {
        
        if (Session::has('userid')) {
            
            $entry = array(
                
                'pro_status' => $status
                
            );
            
            Products::block_product_status($id, $entry);
            
            if ($status == 1) {
                if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_UNBLOCKED')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCT_UNBLOCKED');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_UNBLOCKED');
				}
                return Redirect::to('manage_product')->with('block_message', $session_message);
                
            }
            
            else if ($status == 0) {
                if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_BLOCKED')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCT_BLOCKED');
				}
				else
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_BLOCKED');
				}
                return Redirect::to('manage_product')->with('block_message', $session_message);
                
            }
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    
    
    public function product_details($id)
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
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $return = Products::get_product_view($id);

            $product_color_details        = Home::get_selected_product_color_details($return);
            $product_size_details         = Home::get_selected_product_size_details($return); 
            $product_spec_details         = Home::get_selected_product_spec_details($return);
            
                       
            return view('siteadmin.product_details')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('product_list', $return)
            ->with('product_spec_details',$product_spec_details)
            ->with('product_color_details',$product_color_details)
            ->with('product_size_details', $product_size_details);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    
    public function manage_product_shipping_details()
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
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
           
            $shippingdetails = Products::get_shipping_details();
			
			
           
                        
            $qty = Products::get_qty_details();
            
            $amt = Products::get_amt_details();
            
            return view('siteadmin.shipping_list')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('shippingdetails', $shippingdetails)->with('qty', $qty)->with('amt', $amt);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }


    /* Payumoney shipping details */

    public function product_payumoney_shipping_details()
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
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
           
            $shippingdetails = Products::get_payu_shipping_details();
            
            
           
                        
            $qty = Products::get_payuqty_details();
            
            $amt = Products::get_payuamt_details();
            
            return view('siteadmin.payumoney_shipping_list')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('shippingdetails', $shippingdetails)->with('qty', $qty)->with('amt', $amt);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    public function manage_cashondelivery_details()
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
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $coddetails = Products::get_cod_details();
			
			//print_r($coddetails);exit;
            
            $qty = Products::get_qtycod_details();
            
            $amt = Products::get_amtcod_details();
          
            return view('siteadmin.cod_list')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('qty', $qty)->with('amt', $amt)->with('coddetail', $coddetails);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
      
    }
    
      
    public function add_estimated_zipcode()
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
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $zipcode = Products::get_zipcode();
            
            return view('siteadmin.add_estimated_zipcode')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('zipcode', $zipcode);
       
        }
        
        else {
            
            return Redirect::to('siteadmin');
          
        }
        
    }
    
    
    
    public function add_estimated_zipcode_submit()
    {
        
        if (Session::has('userid')) {
            
            $data = Input::except(array(
                '_token'
            ));
            
            $rule = array(
                
                'zip_code' => 'required|numeric',
                
                'zip_code2' => 'required|numeric',
                
                'delivery_days' => 'required|numeric'
                
            );
            
            $validator = Validator::make($data, $rule);
            
            if ($validator->fails()) {
                
                return Redirect::to('add_estimated_zipcode')->withErrors($validator->messages())->withInput();
             
            }
            
            else {
                
                $check1 = Products::check_zip_code(Input::get('zip_code'));
                
                if ($check1) {
                    if(Lang::has(Session::get('admin_lang_file').'.BACK_START_CODE_ALREADY_EXIST')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_START_CODE_ALREADY_EXIST');
					}
					else
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_START_CODE_ALREADY_EXIST');
					}
                    return Redirect::to('add_estimated_zipcode')->with('success', $session_message)->withInput();
                    
                }
                
                else {
                    
                    $check2 = Products::check_zip_code(Input::get('zip_code2'));
                    
                    if ($check2) {
                        if(Lang::has(Session::get('admin_lang_file').'.BACK_END_CODE_ALREADY_EXIST')!= '') 
						{
							$session_message = trans(Session::get('admin_lang_file').'.BACK_END_CODE_ALREADY_EXIST');
						}
						else
						{
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_END_CODE_ALREADY_EXIST');
						}
                        return Redirect::to('add_estimated_zipcode')->with('success', $session_message)->withInput();
                        
                    }
                    
                    else {
                        
                        $check3 = Products::check_zip_code_range(Input::get('zip_code'), Input::get('zip_code2'));
                        
                        if ($check3) {
                            if(Lang::has(Session::get('admin_lang_file').'.BACK_THE_RANGE_OVERLAPS')!= '') 
							{
								$session_message = trans(Session::get('admin_lang_file').'.BACK_THE_RANGE_OVERLAPS');
							}
							else 
							{
								$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THE_RANGE_OVERLAPS');
							}
                            return Redirect::to('add_estimated_zipcode')->with('success', $session_message)->withInput();
                            
                        } else {
                            
                            $entry = array(
                                
                                'ez_code_series' => Input::get('zip_code'),
                                
                                'ez_code_series_end' => Input::get('zip_code2'),
                                
                                'ez_code_days' => Input::get('delivery_days')
                                
                            );
                         
                            $return = Products::save_zip_code($entry);
                            if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
							{
								$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
							}
							else 
							{
								$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
							}
                            return Redirect::to('estimated_zipcode')->with('success', $session_message);
                            
                        }
                        
                    }
                    
                }
                
            }
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    
    
    public function estimated_zipcode()
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
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $zipcode = Products::get_zipcode();
            
            return view('siteadmin.estimated_zipcode')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('zipcode', $zipcode);
            
            
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
         
        }
        
    }
    
    
    
    public function edit_zipcode($id)
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
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $zipcode = Products::edit_zip_code($id);
            
            return view('siteadmin.edit_estimated_zipcode')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('zipcode', $zipcode);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    
    
    public function edit_estimated_zipcode_submit()
    {
        
        if (Session::has('userid')) {
            
            $data = Input::except(array(
                '_token'
            ));
            
            $rule = array(
                
                'zip_code' => 'required|numeric',
                
                'zip_code2' => 'required|numeric',
                
                'delivery_days' => 'required|numeric'
                
            );
            
            $validator = Validator::make($data, $rule);
            
            if ($validator->fails()) {
                
                return Redirect::to('edit_zipcode/' . Input::get('id'))->withErrors($validator->messages())->withInput();
           
                
            }
            
            else {
                
                $check = Products::check_zip_code_edit(Input::get('id'), Input::get('zip_code'));
                
                if ($check) {
                    if(Lang::has(Session::get('admin_lang_file').'.BACK_START_CODE_ALREADY_EXIST')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_START_CODE_ALREADY_EXIST');
					}
					else 
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_START_CODE_ALREADY_EXIST');
					}
                    return Redirect::to('edit_zipcode/' . Input::get('id'))->with('success', $session_message)->withInput();
                    
                }
                
                else {
                    
                    $check1 = Products::check_zip_code_edit(Input::get('id'), Input::get('zip_code2'));
                    
                    if ($check1) {
                        if(Lang::has(Session::get('admin_lang_file').'.BACK_END_CODE_ALREADY_EXIST')!= '') 
						{
							$session_message = trans(Session::get('admin_lang_file').'.BACK_END_CODE_ALREADY_EXIST');
						}
						else 
						{
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_END_CODE_ALREADY_EXIST');
						}
                        return Redirect::to('edit_zipcode/' . Input::get('id'))->with('success', $session_message)->withInput();
                        
                    }
                    
                    else {
                        
                        $check2 = Products::check_zip_code_edit_range(Input::get('id'), Input::get('zip_code'), Input::get('zip_code2'));
                        
                        if ($check2) {
                            if(Lang::has(Session::get('admin_lang_file').'.BACK_THE_RANGE_OVERLAPS')!= '') 
							{
								$session_message = trans(Session::get('admin_lang_file').'.BACK_THE_RANGE_OVERLAPS');
							}
							else 
							{
								$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THE_RANGE_OVERLAPS');
							}
                            return Redirect::to('edit_zipcode/' . Input::get('id'))->with('success', $session_message)->withInput();
                            
                        }
                        
                        else {
                            
                            $entry = array(
                                
                                'ez_code_series' => Input::get('zip_code'),
                                
                                'ez_code_series_end' => Input::get('zip_code2'),
                                
                                'ez_code_days' => Input::get('delivery_days')
                                
                            );
                            
                            
                            
                            $return = Products::update_zip_code($entry, Input::get('id'));
                            if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
							{
								$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
							}
							else 
							{
								$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
							}
                            return Redirect::to('estimated_zipcode')->with('success', $session_message);
                            
                        }
                        
                    }
                    
                }
                
                
                
            }
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
  
    
    public function block_zipcode($id, $status)
    {
        
        if (Session::has('userid')) {
            
            Products::block_zip_code($id, $status);
            
            if ($status == 1) {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_ACTIVATED_SUCCESSFULLY')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_ACTIVATED_SUCCESSFULLY');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_ACTIVATED_SUCCESSFULLY');
				}
                return Redirect::to('estimated_zipcode')->with('success', $session_message);
            } else {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
				}
                return Redirect::to('estimated_zipcode')->with('success',$session_message);
                
            }
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }

    //Product Review
    public function manage_review()
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
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');

            $get_review = Products::get_product_review();

             return view('siteadmin.manage_review')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('get_review', $get_review);
        }
        else{
            return Redirect::to('siteadmin');
        }
    }
     public function edit_review($id)
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
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $result = Products::edit_review($id);
     
            return view('siteadmin.edit_review')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('result',$result);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }

    public function edit_review_submit()
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
            $return = Products::update_review($entry, $review_id);
            return Redirect::to('manage_review');
        }
        else{
            return Redirect::to('siteadmin');
        }
    }
    public function delete_review($id)
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
         $adminleftmenus    = view('siteadmin.includes.admin_left_menus');
         $adminfooter       = view('siteadmin.includes.admin_footer');
         $del_review = Products::delete_review($id);
		 if(Lang::has(Session::get('admin_lang_file').'.BACK_REVIEW_DELETED_SUCCESSFULLY')!= '') 
			{
				$rev_session_message = trans(Session::get('admin_lang_file').'.BACK_REVIEW_DELETED_SUCCESSFULLY');
			}
			else 
			{
				$rev_session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_REVIEW_DELETED_SUCCESSFULLY');
			}
         return Redirect::to('manage_review')->with('product Deleted',$rev_session_message); 
        }
        else
        {
         return Redirect::to('siteadmin');
        }
    }
    public function block_review($id, $status){
        
        
        if (Session::has('userid')) {
            
            $entry = array(
                
                'status' => $status
                
            );
            
            Products::block_review_status($id, $entry);
            
            if ($status == 0) {
                if(Lang::has(Session::get('admin_lang_file').'.BACK_REVIEW_UNBLOCKED')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_REVIEW_UNBLOCKED');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_REVIEW_UNBLOCKED');
				}
                 
                return Redirect::to('manage_review')->with('block_message', $session_message);
                
            }elseif ($status == 1) {
                
                if(Lang::has(Session::get('admin_lang_file').'.BACK_REVIEW_BLOCKED')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_REVIEW_BLOCKED');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_REVIEW_BLOCKED');
				}
                
                return Redirect::to('manage_review')->with('block_message', $session_message);
                
            }
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }  




    


    public function product_compare(){
        
        if((!isset($_SESSION['compare_product']))) {                                        //start compare
            $_SESSION['compare_product'] = array();
        }
        if(!isset($_SESSION['sub_cat_id'])){
             $_SESSION['sub_cat_id']     = array();
        }
        
        
        $count = count($_SESSION['compare_product']);                                     // count of products in compare
        $pid             = $_GET['pid'];                                                  // product Id
        $sub_category_id = $_GET['subcategory_id'];                                       // getting sub category id to compare with only subcategory's
        $value           = $_GET['value'];                                                // value is for to check add or remove
        if($value==1){                                                                    // if value =1 (adding to compare)
            if($count<3){    

                if(in_array($pid, $_SESSION['compare_product'])){
					if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_PRODUCT_ALREADY_EXISTS_IN_COMPARE')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_PRODUCT_ALREADY_EXISTS_IN_COMPARE');
					}
					else 
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THIS_PRODUCT_ALREADY_EXISTS_IN_COMPARE');
					}
                    echo $session_message; 
                }else if(!in_array($pid, $_SESSION['compare_product'])&&
                        ((empty($_SESSION['sub_cat_id'])) || (in_array($sub_category_id, $_SESSION['sub_cat_id'])))){
                    array_push($_SESSION['compare_product'], $pid );                      // else push into array and added to compare
                    array_push($_SESSION['sub_cat_id'], $sub_category_id );  
					if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_ADDED_TO_COMPARE')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCT_ADDED_TO_COMPARE');
					}
					else 
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_ADDED_TO_COMPARE');
					}
                    echo $session_message;
                }else{
					if(Lang::has(Session::get('admin_lang_file').'.BACK_YOU_CAN_ONLY_COMPARE_SIMILAR_PRODUCTS_SO_CLEAR_LIST_TO_COMPARE')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_YOU_CAN_ONLY_COMPARE_SIMILAR_PRODUCTS_SO_CLEAR_LIST_TO_COMPARE');
					}
					else 
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_YOU_CAN_ONLY_COMPARE_SIMILAR_PRODUCTS_SO_CLEAR_LIST_TO_COMPARE');
					}
                    echo $session_message; 
                }

               /*
               //unset($_SESSION['sub_cat_id']);                                                         // if count is less than 3 it get in loop
                    if(empty($_SESSION['compare_product'])&&(empty($_SESSION['sub_cat_id']))) {
                        array_push($_SESSION['compare_product'], $pid );                      // else push into array and added to compare
                        array_push($_SESSION['sub_cat_id'], $sub_category_id );  
                        echo "Product Added to Compare";
                    }else if(!in_array($pid, $_SESSION['compare_product'])&&(in_array($sub_category_id, $_SESSION['sub_cat_id']))) { 
                        array_push($_SESSION['compare_product'], $pid );                      // else push into array and added to compare
                        array_push($_SESSION['sub_cat_id'], $sub_category_id );  
                        echo "Product Added to Compare";                      // if that product already exist in compare
                    }else if(in_array($pid, $_SESSION['compare_product'])){
                        echo "This Product Already exists in Compare"; 
                    }else {
                        echo "You can only compare similar products, So Clear List to Compare";
                    }
                   // else{ //if((!in_array($sub_category_id, $_SESSION['sub_cat_id'])))
                        //echo "Something went wrong..!!";
                   // }
               */


            }else{  
                                                                        // if count > 3 it will not allowed to add 
                if(Lang::has(Session::get('admin_lang_file').'.BACK_ONLY_3_PRODUCTS_ALLOWED_TO_COMPARE_CLEAR_COMPARE_LIST')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_ONLY_3_PRODUCTS_ALLOWED_TO_COMPARE_CLEAR_COMPARE_LIST');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ONLY_3_PRODUCTS_ALLOWED_TO_COMPARE_CLEAR_COMPARE_LIST');
				}
				echo $session_message;
            }
        }                                                                                   // if value ==1 (ie) if add to compare
        elseif($value==0){                                                                  //else for remove compare product
            $key=array_search($pid,$_SESSION['compare_product']);
            if($key!==false){
                unset($_SESSION['compare_product'][$key]);                                  // removing that product from array 
                                                        
                $_SESSION["compare_product"] = array_values($_SESSION["compare_product"]);  // removing that product from session 
            } 
            if(count($_SESSION["compare_product"])==0){
                unset($_SESSION['compare_product']);
                unset($_SESSION['sub_cat_id']);  
            }
            echo "Removed from Compare List";
       }          
      // print_r($_SESSION['sub_cat_id']); 
      // print_r($_SESSION['compare_product']);                                                                             // else for remove compare product
   } // product comapre
   public function remove_compare_product(){
       $pid = $_GET['pid'];
       $key=array_search($pid,$_SESSION['compare_product']);
            if($key!==false){
                unset($_SESSION['compare_product'][$key]);                                  // removing that product from array 
                $_SESSION["compare_product"] = array_values($_SESSION["compare_product"]);  // removing that product from session 
            } 
            if(count($_SESSION["compare_product"])==0){
                unset($_SESSION['compare_product']);
                unset($_SESSION['sub_cat_id']);  
            }
       echo "Removed from Compare List";
   }
   public function clear_compare(){                                                         // clear compare datas
       unset($_SESSION['compare_product']);
       unset($_SESSION['sub_cat_id']);    

       $_SESSION['compare_product']=array();
       $_SESSION['sub_cat_id']=array();
       return Redirect::back();
   } // clear compare list

   public function compare_products(){
        if(!isset($_SESSION['compare_product'])) {                                            //start compare
            $_SESSION['compare_product'] = array();
        }

       
        if($_SESSION['compare_product']){
             $session_products = $_SESSION['compare_product'];
        }else{
             $session_products = array();
        }
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        
        $most_visited_product         = Home::get_most_visited_product();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        if($session_products){
        $product_details              = Products::get_compare_details($session_products);
        
        $product_color_details        = Home::get_selected_product_color_details($product_details);
        $product_size_details         = Home::get_selected_product_size_details($product_details);
        $product_spec_details         = Home::get_selected_product_spec_details($product_details);
        $store                        = Products::store_name($product_details);
        $one_count                    = Products::get_countone($product_details);
        $two_count                    = Products::get_counttwo($product_details);
        $three_count                  = Products::get_countthree($product_details);
       // echo $three_count;
        //exit();
        $four_count                   = Products::get_countfour($product_details);
        $five_count                   = Products::get_countfive($product_details);
        }else{
           $product_details =array();   //else if no products in compare
        }
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
     //  print_r($product_size_details); exit;
     if($session_products){
        return view('compare_products')->with('navbar', $navbar)
        ->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)
        ->with('product_details',$product_details)
       ->with('product_color_details', $product_color_details)
       ->with('product_size_details',$product_size_details)
       ->with('product_spec_details',$product_spec_details)
       ->with('store',$store)
       ->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)
       ->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)
       ->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
     }else{
       return view('compare_products')->with('navbar', $navbar)
        ->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)
        ->with('product_details',$product_details)
        ->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)
        ->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
     } 
        
   }

   public  function check_product_exists(){
     
       $pro_title = Input::get('title');
       $check     = Products::check_product_exists($pro_title);

      if($check!=0){
          echo '1'; //already exist
      }else{ echo '0'; } //not exist
   }
   
    public  function check_product_exists_edit(){
      // $mer_id    = Input::get('mer_id');
      // $store_id  = Input::get('store_id');
       $pro_title = Input::get('title');
       $pro_id    = Input::get('pro_id');
       $check     = Products::check_product_exists_edit($pro_title,$pro_id);

      if($check!=0){
          echo '1'; //already exist
      }else{ echo '0'; } //not exist
   }
   
   
   public  function check_product_exists_dynamic(){
     
       $pro_title = Input::get('title');
       $lang_code = Input::get('lang_code'); 
       $check     = Products::check_product_exists_dynamic($pro_title,$lang_code);

      if($check!=0){
          echo '1'; //already exist
      }else{ echo '0'; } //not exist
   }

  /* public  function get_mer_commission(){
       $mer_id    = Input::get('mer_id');
       $mer_commission       = Products::mer_commission($mer_id);
       echo $mer_commission;
   } */
 

    /* Image  Crop , rorate and mamipulation starts */

    //Load Edit Modal
    /* // modal content given in page itself
    public function ajaxEditImage(){
        if (Session::has('userid')) {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCTS');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS');
            }   
            $product_id         = Input::get('prodId');
            $img_id             = Input::get('imgId');
            $imgfileName        = Input::get('imgFileName');          

            return view('siteadmin.includes.popup_editImg')->with('product_id', $product_id)->with('img_id', $img_id)->with('imgfileName', $imgfileName);
        }        
        else {            
            return Redirect::to('siteadmin');            
        }
    }
    */

    //Save Edited Image
    public function CropNdUpload(Request $request){
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
        $new_name = 'Product_'.time().rand().'.jpg';

         //$imge =  file_put_contents('public/assets/product/'.$new_name, base64_decode($img_dat[1]));
        $imageData = base64_decode($img_dat[1]);
        //imagepng($source,'public/assets/product/'.$new_name,6);

        //$input = imagecreatefrompng($input_file);
        

        $file_path = './public/assets/product/'.$new_name;
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
       

        if(file_exists('public/assets/product/'.$new_name)){

            //upload small image
            list($width,$height)=getimagesize('public/assets/product/'.$new_name);     
            

            //unlink old files starts
            if(file_exists('public/assets/product/'.$imgfileName))
                unlink("public/assets/product/".$imgfileName);
            //unlink old files ends

            //update in image table 
            $product_list = Products::get_product($product_id);

            if(count($product_list)>0){
                foreach ($product_list as $prd) {
                    
                }
                $prod_imgAr = explode('/**/', $prd->pro_Img);
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

                $entry = array('pro_Img' => $prod_img );

             $return     = Products::edit_product($entry, $product_id);
             if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
             return Redirect::to('edit_product/'.$product_id)->with('block_message', $session_message);
        }

        exit();
    }
    /* Image  Crop , rorate and mamipulation ends */

    /* PRODUCT BULK UPLOAD FORM */
    public function product_bulk_upload()
    {
         if(Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_PRODUCTS');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS');
            }
         $adminheader                = view('siteadmin.includes.admin_header')->with("routemenu",'productsizecount');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            $adminfooter                = view('siteadmin.includes.admin_footer');

        return view('siteadmin.product_bulk_upload')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
    }
    /* PRODUCT BULK UPLOAD FORM SUBMIT */

	public function block_product_multiple()
	{
		
		 if (Session::has('userid'))
        {
         $data=Input::get('val');
		
         $status=0;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
             // $array=array('stor_status' => 0); 
			   $block_Product_admin=Products::product_multiple($id, $status);
                   }
            if($block_Product_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }	
	}
	
	public function unblock_product_multiple()
	{
		if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=1;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
            // $array=array('stor_status' => 0); 
             $unblock_Product_admin=Products::product_multiple($id, $status);
                   }
            if($unblock_Product_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }	
	}

    /**delete multiple**/
        public function delete_product_page_multiple()
            { 
                if (Session::has('userid'))
                {
                    $entry = array('pro_status' => 2,);
                    $data=Input::get('val'); 
                    for($i=0;$i<count($data);$i++){
                         $id=$data[$i];    
                         $del_pro = Products::delete_product($id,$entry);
                         $del_pro_color = Products::delete_product_color($id);
                         $del_pro_size = Products::delete_product_size($id);
                         $del_pro_spec = Products::delete_product_spec($id);

                     }
                    if(count($del_pro )>0){
                    echo "1";}
                    else {
                    echo "0";}

                }


            }   
    
	public function block_pro_review_multiple()
 {
	 if (Session::has('userid'))
        {
			
         $data=Input::get('val');
         $status=1;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $array=array('status' => 1); 
			  $block_Banner_admin=Products::proreview_multiple($id, $status);	
             
                   }
            if($block_Banner_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }
 }

 public function unblock_pro_review_multiple()
{
	 if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=0;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $array=array('status' => 0);
           $unblock_Banner_admin=Products::proreview_multiple($id, $status);			  
              
            
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
		public function delete_pro_review_multiple()
			{ 
				if (Session::has('userid'))
				{
					$data=Input::get('val'); 
					 for($i=0;$i<count($data);$i++)
					 {
						  
				$id=$data[$i];
				 $array=array('stor_status' => 0);
				$delete_Banner_admin=Products::delete_proreview($id);
		
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
	

}// class
