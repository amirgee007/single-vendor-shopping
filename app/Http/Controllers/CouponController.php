<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Footer;
use App\Settings;
use App\Coupon;
use App\City;
use MyPayPal;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller {
	
	 public function __construct(){
        parent::__construct();
        // set admin Panel language
        $this->setLanguageLocaleAdmin();
    }	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	public function add_coupon()
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

		 	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            $result =  DB::table('nm_customer')->where('cus_status', '=', 0)->get();
			
			
		    $resultusercitywise =  City::view_citywise_user_detail();
			
		return view('siteadmin.add_coupon')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('user_det', $result)->with('user_citywise_det',$resultusercitywise);
		}
	}
	public function get_user_name_ajax()
	{
		$start_date = Input::get('start_date');
		$end_date = Input::get('end_date');
		
		$get_coupon_user_id =  DB::table('nm_coupon')
		->where('type_of_coupon','=',2)
		->where('start_date','<=',$start_date)
		->where('end_date','>=',$end_date)
		->get();
		
		if(count($get_coupon_user_id)>0)
		{
			foreach($get_coupon_user_id as $coupon_user_id)
			{
			$user_id[] = $coupon_user_id->user_id; 
			}
		
			$user_id = implode(',',$user_id);
		}else
		{
			$user_id = '';
		}
		$get_customer =  DB::table('nm_customer')
		->where('cus_status', '=', 0)
		->whereNotIn('cus_id', array($user_id))
		->get();
		
		//$option_val='<option value="" >Select User </option>';
		$option_val ='';
		foreach($get_customer as $customer)
			{
				
				$option_val.='<option value="'.$customer->cus_id.'">'.$customer->cus_email.'</option>';
				
			}
				echo $option_val;
				exit;
		
	}
	public function ajax_add_coupon_data(){
		//get search term
	$searchWord = $_GET['term'];
	
	
	$query =  DB::table('nm_product')
	->where('pro_status', '=', 1)
	->where('sold_status', '=', 1)
	->whereRaw('pro_qty>pro_no_of_purchase')
	->where('pro_title', 'LIKE', '%'.$searchWord.'%')
	->get();
    $searchTerm = array();
    
  
    foreach($query as $row) {
     
    $searchTerm[] = $row->pro_title;
    }
    
    echo json_encode($searchTerm);
	}
	
	public function add_coupon_submit(){

		
		 if(Session::has('userid')) {
		
			
			$type_of_coupon  = Input::get('type_of_coupon');
			$type_of_coupon_code  = Input::get('type_of_coupon_code');

			$rules0 = array();
			if($type_of_coupon_code==1){
				$rules0 = array(
					'auto_coupon_code' => 'required',
				);
			}else
			if($type_of_coupon_code==2){
				$rules0 = array(
					'custom_coupon_code' => 'required',
				);
			}


		 	$rules= array(
        		'coupon_name' => 'required',
        		'type' 		  => 'required',
        		'start_date'  => 'required',
				'end_date'    => 'required',
				'type_of_coupon' => 'required',
				'terms'       => 'required'
			);
			$rules1 = array();
			if($type_of_coupon==1){
				$rules1 = array(
					'product'			 => 'required',
					'coupon_per_product' => 'required',
					'coupon_per_user' 	 => 'required',
					'quantity'  		 => 'required',	
				);
			}
			
			if($type_of_coupon==2){
				$rules1 = array(
				'coupon_tot_cart_amount_user' => 'required',
        		'user' 		 				  => 'required',
				);
			}
			
			if($type_of_coupon==3){
				$rules1 = array(
				'citywise_user' => 'required',
				);
			}
					$rules  = array_merge($rules,$rules1,$rules0); 
					 $validator = Validator::make(Input::all(),$rules);
					 
					 if($validator->fails()) {
					 	
						 return Redirect::to('add_coupon')->withErrors($validator->messages())->withInput(); // send back all errors to the login form
					 }else{
						 
						 $type_of_coupon_code  = Input::get('type_of_coupon_code');
					if($type_of_coupon_code==1){
						$coupon_code  = Input::get('auto_coupon_code');
					}elseif($type_of_coupon_code==2){
						$coupon_code  = Input::get('custom_coupon_code');
					}
					$coupon_name  	= Input::get('coupon_name');
					$type  			= Input::get('type');
					
					
					if($type == '1'){
						$type_id 	= 1;
						$value  	= Input::get('value1');
					}elseif($type == '2'){
						$type_id 	= 2;
						$value  	= Input::get('value2');
					}
					
					$start_date  	= Input::get('start_date');
					$end_date  		= Input::get('end_date');
					$terms			= Input::get('terms');
					$created_at 	= date("Y-m-d H:m:s");
					$type_of_coupon = Input::get('type_of_coupon');
				 
				 if($type_of_coupon == '1'){
				
					$product_name = Input::get('product');
					//$pro_table = DB::table('nm_product')->where('pro_title','=',$product_name)->first();
					$pro_table = DB::table('nm_product')
						 		->select('nm_product.*')
						 		//->leftjoin('nm_store','nm_store.stor_id','=','nm_product.pro_sh_id')
						 		->where('pro_title','=',$product_name)
						 		->first();
					$pro_table_count = count($pro_table);
					if($pro_table_count == 0 ){	
					
					if(Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_CODE_PRODUCT_NOT_EXISTS')!= ''){ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_COUPON_CODE_PRODUCT_NOT_EXISTS');
						 }else{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_COUPON_CODE_PRODUCT_NOT_EXISTS');
						 }	

                		return Redirect::to('add_coupon')->with('warning', $session_message)->withInput();	
					}
					$product_id = $pro_table->pro_id;
					$quantity = Input::get('quantity');
					$user = 0;
					$coupon_per_product = Input::get('coupon_per_product');
					$coupon_per_user = Input::get('coupon_per_user');
					$user_total_cart_value = 0;
			
				}elseif($type_of_coupon == '2'){
		 		
					$get_user = Input::get('user');
					$user = implode(",",$get_user);
					$user_total_cart_value = Input::get('coupon_tot_cart_amount_user');
					$product_id = 0;
					$quantity = 0;
					$coupon_per_product = 0;
					$coupon_per_user = 0;	
				
				}elseif($type_of_coupon == '3'){
				
					$get_user = Input::get('user'); 
					$user = implode(",",$get_user);
					$user_total_cart_value = Input::get('coupon_tot_cart_amount');
					$product_id = 0;
					$quantity = 0;
					$coupon_per_product = 0;
					$coupon_per_user = 0;	
		 	}

    		$check_coupon = Coupon::check_coupon($coupon_code);
    		$check_product = Coupon::check_product($product_id);	
		 	$check_coupon_start_date = Coupon::check_coupon_start_date($start_date,$end_date);
		 	$check_coupon_end_date = Coupon::check_coupon_end_date($start_date,$end_date);
		 	$check_product_start_date = Coupon::check_product_start_date($start_date,$end_date);
		 	$check_product_end_date = Coupon::check_product_end_date($start_date,$end_date);
		 	$check_product_purchage_cod = Coupon::check_product_purchased_cod($product_id,$coupon_code);
		 	$check_product_purchage_paypal = Coupon::check_product_purchased_paypal($product_id,$coupon_code);

		 	   	if($type_of_coupon == '1'){	//product coupon
            		if(($check_coupon_start_date && $check_product) || ($check_coupon_end_date && $check_product)){

						 if(Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_CODE_ALREADY_AVAILABLE_FOR_THAT_PRODUCT')!= ''){ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_COUPON_CODE_ALREADY_AVAILABLE_FOR_THAT_PRODUCT');
						 }else{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_COUPON_CODE_ALREADY_AVAILABLE_FOR_THAT_PRODUCT');
						 }	

                		return Redirect::to('add_coupon')->with('warning', $session_message);
           			 }else{
           			 	$to_user = DB::table('nm_customer')->where('cus_status','=',0)->get();
           			 	foreach($to_user as $thisuser){
					
				 	 /*Mail::send('emails.coupon', array(
						'code'=>$coupon_code,
						'coupon_name'=>$coupon_name,
						'start_date'=>$start_date,
						'end_date'=>$end_date,
						'terms'=>$terms,
						'type_of_coupon'=>$type_of_coupon,
						'product_id'=>$product_id,
						'pro_table'=>$pro_table,
			 			'coupon_per_user'=>$coupon_per_user,
			 			'coupon_per_product'=>$coupon_per_product,
			 			'quantity'=>$quantity,
				 		'user_total_cart_value' => $user_total_cart_value	

						), function($message) use($thisuser) {
						if(Lang::has(Session::get('admin_lang_file').'.BACK_NEW_COUPON_CODE_AVAILABLE')!= '') 
						{ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_NEW_COUPON_CODE_AVAILABLE');
						}  
						else 
						{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NEW_COUPON_CODE_AVAILABLE');
						}	
	           			$message->to($thisuser->cus_email, $thisuser->cus_name)->subject($session_message);
           			}); */
       			}
           			 }
            	}elseif($type_of_coupon == '2' || $type_of_coupon == '3'){	//user coupon or city based user coupon
            		if (($check_coupon_start_date && $check_coupon) || ($check_coupon_end_date && $check_coupon)){

						if(Lang::has(Session::get('admin_lang_file').'.BACK_NOT_ADDED_CHECK_COUPON_WITH_DATES')!= ''){ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_NOT_ADDED_CHECK_COUPON_WITH_DATES');
						}else{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NOT_ADDED_CHECK_COUPON_WITH_DATES');
						} 
                		return Redirect::to('add_coupon')->with('warning', $session_message);
           			 }
           			 else{
					  
				 			$get_user = Input::get('user');
				 			foreach($get_user as $user_id){
				 				$to_user = DB::table('nm_customer')->where('cus_id','=',$user_id)->where('cus_status','=',0)->first();
				 				
					 			Mail::send('emails.coupon', array(
					 				'code'=>$coupon_code,
									'coupon_name'=>$coupon_name,
									'start_date'=>$start_date,
									'end_date'=>$end_date,
									'terms'=>$terms,
									'type_of_coupon'=>$type_of_coupon,
									'product_id'=>$product_id,
									'pro_table'=> array(),
						 			'coupon_per_user'=>$coupon_per_user,
						 			'coupon_per_product'=>$coupon_per_product,
						 			'quantity'=>$quantity,
						 			'user_total_cart_value' => $user_total_cart_value
					 				), function($message) use ($to_user) {

					 				if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU')!= ''){ 
									$session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU');
									}else{ 
										$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU');
									}	
									$message->to($to_user->cus_email, $to_user->cus_name)->subject($session_message);
								});  //mail 
				 			}
							
								
				 			
					   
            		 }//else
            	  }/*elseif($type_of_coupon == '3'){
            		if (($check_coupon_start_date && $check_coupon) || ($check_coupon_end_date && $check_coupon)){
						if(Lang::has(Session::get('admin_lang_file').'.BACK_NOT_ADDED_CHECK_COUPON_WITH_DATES')!= ''){ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_NOT_ADDED_CHECK_COUPON_WITH_DATES');
						}else{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NOT_ADDED_CHECK_COUPON_WITH_DATES');
						} 
                		return Redirect::to('add_coupon')->with('warning',$session_message);
           			}else{
						Mail::send('emails.coupon', array('code'=>$coupon_code,'coupon_name'=>$coupon_name,'start_date'=>$start_date,'end_date'=>$end_date,'terms'=>$terms,'type_of_coupon'=>$type_of_coupon,'product_id'=>$product_id,'product_name'=>''), function($message) {
			 				$get_user = Input::get('user');
			 				foreach($get_user as $user_id){
			 					$to_user = DB::table('nm_customer')->where('cus_id','=',$user_id)->where('cus_status','=',0)->get();
			 				}
							if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU')!= ''){ 
								$session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU');
							}else{ 
								$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU');
							}
			 				
							$message->to('kailashkumar.r@pofitec.com', 'kailash')->subject($session_message);
			 				foreach($to_user as $thisuser){
								if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU')!= ''){ 
									$session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU');
								}else{ 
									$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU');
								}	
								$message->bcc($thisuser->cus_email, $thisuser->cus_name)->subject($session_message);
	           				}
						}); //mail
            		 } //else
            	   } //elseif*/  

            	   $entry = array(
                    
                    'coupon_code' => $coupon_code,
                    
                    'coupon_name' => $coupon_name,

                    'product_id' => $product_id,

                    'quantity' => $quantity,

                    'user_id' => $user,
                    
                    'type' => $type_id,

                    'value' => $value,
                    
                    'start_date' => $start_date,
                    
                    'end_date' => $end_date,
                    
                    'type_of_coupon' => $type_of_coupon,

                    'terms' => $terms,

                    'coupon_per_product' => $coupon_per_product,

                    'coupon_per_user' => $coupon_per_user,
					'tot_cart_val' => $user_total_cart_value,
                    'created_at' => $created_at,

                );
            
            $productid = Coupon::insert_coupon($entry);

            return Redirect::to('manage_coupon');
        	}
		 }
	}

	public function manage_coupon()
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
		 	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            $coupon_data = Coupon::get_coupon_details();
		return view('siteadmin.manage_coupon')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('coupon_data', $coupon_data);
		}
	}
	 public static function status_coupon_submit($id, $status)
    {
        if (Session::has('userid')) {
            $return = Coupon::status_coupon_submit($id, $status);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
            return Redirect::to('manage_coupon')->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_coupon($id)
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
            $result =  DB::table('nm_customer')->where('cus_status', '=', 0)->get();
			
            $coupon_details   = Coupon::selectedcoupon_list($id);
            // print_r($coupon_details);
            // exit();
			if($coupon_details[0]->user_id!="" && $coupon_details[0]->user_id!=0) {
				$user_id=$coupon_details[0]->user_id;
				
				$cityid = Coupon::selectedcoupon_city_list($user_id);
				
				$citydetails=$cityid;
				$resultusercitywise =  City::view_citywise_user_detail($cityid[0]->ci_id);
			} else {
				$resultusercitywise =  City::view_citywise_user_detail();
				$citydetails="";
			}
			
            $get_product_detail = Coupon::get_product_details($id);

            return view('siteadmin.edit_coupon')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('coupon_details', $coupon_details)->with('user_det', $result)->with('user_citywise_det', $resultusercitywise)->with('citydetails',$citydetails)->with('get_product_detail',$get_product_detail);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    public function edit_coupon_submit()
	{
		 if (Session::has('userid')) {
		 	$id = Input::get('coupon_id');
		 	$coupon_code  = Input::get('coupon_code');
		 	$coupon_name  = Input::get('coupon_name');

		 	$type  = Input::get('type');
		 	//echo $type;exit();
		 	if($type == '1')
		 	{
		 		$type_id = 1;
		 	}
		 	elseif($type == '2')
		 	{
		 		$type_id = 2;
		 	}
		 	$value  = Input::get('value');
		 	$start_date  = Input::get('start_date');
		 	$end_date  = Input::get('end_date');
		 	$terms = Input::get('terms');
		 	$created_at = date("Y-m-d H:m:s");
		 	$type_of_coupon  = Input::get('type_of_coupon');

		 	if($type_of_coupon == '1'){
		 		$product_name = Input::get('product');
		 		//$pro_table = DB::table('nm_product')->where('pro_title','=',$product_name)->first();
		 		$pro_table = DB::table('nm_product')
		 		->select('nm_product.*')
		 		//->leftjoin('nm_store','nm_store.stor_id','=','nm_product.pro_sh_id')
		 		->where('pro_title','=',$product_name)
		 		->first();
		 		$product_id = $pro_table->pro_id;
		 		$quantity = Input::get('quantity');
		 		$user = 0;
		 		$coupon_per_product = Input::get('coupon_per_product');
		 		$coupon_per_user = Input::get('coupon_per_user');
		 		$user_total_cart_value ='1';
		 		
	 			$to_user = DB::table('nm_customer')->where('cus_status','=',0)->get();
		
	 			foreach($to_user as $thisuser){
					
					Mail::send('emails.coupon', array('code'=>$coupon_code,
						'coupon_name'=>$coupon_name,
						'start_date'=>$start_date,
						'end_date'=>$end_date,
						'terms'=>$terms,
						'type_of_coupon'=>$type_of_coupon,
						'product_id'=>$product_id,
						'pro_table'=>$pro_table,
			 			'coupon_per_user'=>$coupon_per_user,
			 			'coupon_per_product'=>$coupon_per_product,
			 			'quantity'=>$quantity,
				 		'user_total_cart_value' => $user_total_cart_value
						), function($message) use($thisuser) {
						if(Lang::has(Session::get('admin_lang_file').'.BACK_NEW_COUPON_CODE_AVAILABLE')!= '') 
						{ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_NEW_COUPON_CODE_AVAILABLE');
						}  
						else 
						{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NEW_COUPON_CODE_AVAILABLE');
						}	
	           			$message->to($thisuser->cus_email, $thisuser->cus_name)->subject($session_message);
           			});
       			}
           			
				


		 	}
		 	elseif($type_of_coupon == '2'){
		 		
		 		$get_user = Input::get('user');
		 		$user = implode(",",$get_user);
				$user_total_cart_value = Input::get('coupon_tot_cart_amount');
		 	   	$product_id = 0;
		 	   	$quantity = 0;
		 	   	$coupon_per_product = 0;
		 		$coupon_per_user = 0;

		 	   
		 			$get_user = Input::get('user');
				
		 			foreach($get_user as $user_id){
			 			$to_user = DB::table('nm_customer')->where('cus_id','=',$user_id)->where('cus_status','=',0)->first();
			 			
						Mail::send('emails.coupon', array('code'=>$coupon_code,
							'coupon_name'=>$coupon_name,
							'start_date'=>$start_date,
							'end_date'=>$end_date,
							'terms'=>$terms,
							'type_of_coupon'=>$type_of_coupon,
							'product_id'=>$product_id,
							'pro_table'=> array(),
				 			'coupon_per_user'=>$coupon_per_user,
				 			'coupon_per_product'=>$coupon_per_product,
				 			'quantity'=>$quantity,
				 			'user_total_cart_value' => $user_total_cart_value
							), function($message) use($to_user) {
						//echo $to_user->cus_email;
						if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU')!= '') 
						{ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU');
						}  
						else 
						{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU');
						}	
			 			$message->to($to_user->cus_email, $to_user->cus_name)->subject($session_message);
			 			});
			 		}
				
		 	}
			elseif($type_of_coupon == '3'){
		 		
		 		$get_user = Input::get('user');
		 		$user = implode(",",$get_user);
				$user_total_cart_value = Input::get('coupon_tot_cart_amount');
		 	   	$product_id = 0;
		 	   	$quantity = 0;
		 	   	$coupon_per_product = 0;
		 		$coupon_per_user = 0;

		 	   
	 			$get_user = Input::get('user');
		
		 		foreach($get_user as $user_id){
		 			$to_user = DB::table('nm_customer')->where('cus_id','=',$user_id)->where('cus_status','=',0)->first();
		 			//echo $to_user->cus_email;
		 			Mail::send('emails.coupon', array('code'=>$coupon_code,'coupon_name'=>$coupon_name,'start_date'=>$start_date,'end_date'=>$end_date,'terms'=>$terms,'type_of_coupon'=>$type_of_coupon,'product_id'=>$product_id), function($message) use($to_user) {
						if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU')!= '') 
						{ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU');
						}  
						else 
						{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU');
						}
			 			$message->to($to_user->cus_email, $to_user->cus_name)->subject($session_message);
		 			});
		 		}
				
		 	}
		 	
		 	
            	   $entry = array(
                    
                    'coupon_code' => $coupon_code,
                    
                    'coupon_name' => $coupon_name,

                    'product_id' => $product_id,

                    'quantity' => $quantity,

                    'user_id' => $user,
                    
                    'type' => $type_id,

                    'value' => $value,
                    
                    'start_date' => $start_date,
                    
                    'end_date' => $end_date,
                    
                    'type_of_coupon' => $type_of_coupon,

                    'terms' => $terms,
					'tot_cart_val' => $user_total_cart_value,
                    'created_at' => $created_at,

                );
            

            $return = Coupon::update_coupon($entry, $id);

            return Redirect::to('manage_coupon');
		 }
	}
    public function coupon_id_ajax()
    {
        
        $id = $_GET['id'];

        $product_det = DB::table('nm_maincategory')->where('mc_status', '=', 1)->get($id);
        if ($product_det) {
            
            $return = "";
        
            foreach ($product_det as $product_det_ajax) {
                
                $return .= "<input value='" . $product_det_ajax->mc_id . "'>  </input>";
                
            }
            
            echo $return;
            
        }else {
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

  public function ajax_coupon_submit(){
  		
    	$coupon = Input::get('coupon_code');
    	$txt_product = Input::get('product_id');
		$customer_id = Input::get('customer_id');
    	$type =Input::get('type');
		
		$value =Input::get('value');
       	$product_dis_price = Input::get('product_dis_price');
       	$product_qty = Input::get('product_qty');
    	$pro_color = Input::get('pro_color');
    	$pro_size = Input::get('pro_size');
    	$type_of_coupon = Input::get('type_of_coupon');
    	$coupon_per_product = Input::get('coupon_per_product');
    	$coupon_per_user = Input::get('coupon_per_user');
    	$product_id = Input::get('product_id');
    	
    	$coupon_amount = '';
		if($type == 1){
			$coupon_amount =Input::get('value');
			$final_price = ($product_qty * $product_dis_price) - $value;
		}
		else if($type == 2){

			$calculate_price = ($product_qty * $product_dis_price) * $value;

			$coupon_amount = $calculate_price / 100;

			$final_price = ($product_qty * $product_dis_price) - $coupon_amount;

		}
    	$coupon_apply_date = date('Y-m-d');
    	//$check_coupon_order_cod = Coupon::check_coupon_already_purchage_cod($coupon,$customer_id);
    	//$check_coupon_order_paypal = Coupon::check_coupon_already_purchage_paypal($coupon,$customer_id);
    	
        $check_coupon_purchase_count_cod = Coupon::check_coupon_purchase_count_cod($coupon,$product_id);
        $check_coupon_purchase_count_paypal = Coupon::check_coupon_purchase_count_paypal($coupon,$product_id);

        $check_coupon_purchase_count_cod_user = Coupon::check_coupon_purchase_count_cod_user($coupon,$customer_id,$product_id);
        $check_coupon_purchase_count_paypal_user = Coupon::check_coupon_purchase_count_paypal_user($coupon,$customer_id,$product_id);
        // echo $check_coupon_purchase_count_cod + $check_coupon_purchase_count_paypal;
        // exit();
        	 
        if($product_dis_price < $coupon_amount){
        	echo "Exist Price";
        }
        elseif($check_coupon_purchase_count_cod >= $coupon_per_product){
        	 
        	echo "Exist Limit";
        }
        elseif($check_coupon_purchase_count_paypal >= $coupon_per_product){
        	echo "Exist Limit";
        }
        elseif(($check_coupon_purchase_count_cod + $check_coupon_purchase_count_paypal) >= $coupon_per_product){
        	echo "Exist Limit";
        }
        elseif($check_coupon_purchase_count_cod_user >= $coupon_per_user){
        	echo "You Exist Limit";
        }
        elseif($check_coupon_purchase_count_paypal_user >= $coupon_per_user){
        	echo "You Exist Limit";
        }
        elseif(($check_coupon_purchase_count_cod_user+$check_coupon_purchase_count_paypal_user) >= $coupon_per_user){
        	echo "You Exist Limit";
        } 

        //elseif(Session::has('coupon_applied')){
        //	echo "Cannot Add Multiple Coupon same cart";
        //}
		else{ 
			
			session()->put('coupon_product_id'.$product_id, $product_id);
			session()->put('coupon_applied'.$product_id, 'applied');
			session()->put('coupon_type'.$product_id,'productcoupon');
			session()->put('coupon_code'.$product_id,$coupon);
			session()->put('coupon_amount_type'.$product_id,$type);
			session()->put('coupon_amount'.$product_id,$coupon_amount);
			session()->put('coupon_total_amount'.$product_id,$final_price);
			//Session::set(['coupon_product_id' => $product_id]); 
		// exit;
			/*Session::set('coupon_product_id'.$product_id,$product_id);	
         Session::set('coupon_applied'.$product_id,'applied');
         Session::set('coupon_type'.$product_id,'productcoupon');
         Session::set('coupon_code'.$product_id,$coupon);
         Session::set('coupon_amount_type'.$product_id,$type);
         Session::set('coupon_amount'.$product_id,$coupon_amount);
         Session::set('coupon_total_amount'.$product_id,$final_price);*/
    	
		
    	 $entry = array(
    	 	'coupon_id'=>$coupon,
    	 	'product_id'=>$txt_product,
    	 	'sold_user'=>$customer_id,
    	 	'type'=>$type,
    	 	'value'=>$coupon_amount,
    	 	'pro_qty'=>$product_qty,
    	 	'product_price' =>$final_price,
    	 	'color' =>$pro_color,
    	 	'size'=>$pro_size,
    	 	'type_of_coupon'=>$type_of_coupon,
    	 	'date'=>$coupon_apply_date,
    	 	);
			
    	$last_insert = Coupon::insert_purchage_coupon($entry);
    	
		$entry1 = array(
    	 	'coupon_id'=>$coupon,
    	 	'product_id'=>$txt_product,
    	 	'sold_user'=>$customer_id,
    	 	'type'=>$type,
    	 	'value'=>$coupon_amount,
    	 	'pro_qty'=>$product_qty,
    	 	'product_price' =>$final_price,
    	 	'color' =>$pro_color,
    	 	'size'=>$pro_size,
    	 	'date'=>$coupon_apply_date,
    	 	'type_of_coupon'=>$type_of_coupon,
			'couponid' =>$last_insert
    	 	);
		 
		echo json_encode($entry1); 
	
    	}
    }
    public function ajax_coupon_delete()
    {
    	$coupon = Input::get('coupon_code');
		$txt_product = Input::get('product_id');
		$customer_id = Input::get('customer_id');
		$product_dis_price = Input::get('product_dis_price');
       	$product_qty = Input::get('pro_qty');

       	$arr = array('product_dis_price'=>$product_dis_price,'product_qty'=>$product_qty,'product_id'=>$txt_product
       				);
       	echo json_encode($arr);
		$return = Coupon::delete_entered_coupon($coupon,$txt_product,$customer_id);
		Session::forget('coupon_product_id'.$txt_product);
		Session::forget('coupon_type'.$txt_product);
		Session::forget('coupon_code'.$txt_product);
		Session::forget('coupon_amount_type'.$txt_product);
		Session::forget('coupon_amount'.$txt_product);
		Session::forget('coupon_total_amount'.$txt_product);
		Session::forget('coupon_applied'.$txt_product);
    }

    public function ajax_usercoupon_submit()
    {
		
    	$coupon_code = Input::get('coupon_code');
    	$customer_id = Input::get('customer_id');
    	 $user_total_amount = Input::get('user_total_amount'); 
    	//Session::set('user_total_amount',$user_total_amount);
    	 session()->put('user_total_amount',$user_total_amount);

    	$get_coupon_data = DB::table('nm_coupon')->where('coupon_code','=',$coupon_code)->where('status','=',1)->where('type_of_coupon','!=',1)->first();//->where('type_of_coupon','=',2)->orWhere('type_of_coupon','=',3)->get();
		$get_user_coupon_data = Coupon::check_coupon_user_list($coupon_code,$customer_id);
        
		/* $sql = "select * from `nm_coupon` where `coupon_code` = '".$coupon_code."' and `status` = 1 and `user_id` in (".$customer_id.") and (`type_of_coupon` = 2 or `type_of_coupon` = 3) limit 1";
		$get_user_coupon_data = DB::select($sql); */
		//$get_user_coupon_data = DB::table('nm_coupon')->where('coupon_code','=',$coupon_code)->where('status','=',1)->whereIn('user_id',array($customer_id))->where(function($query){$query->where('type_of_coupon', 2)->orWhere('type_of_coupon',3);})->get();
		
		/* $queries = DB::getQueryLog();
		$last_query = end($queries);
		print_r($last_query); */
		//print_r($get_coupon_data);
		//echo $get_coupon_data->end_date;
	//exit();
		if($get_coupon_data=="") {
			echo "Not Available"; 
		} 
		else 
		{
			if(count($get_user_coupon_data)==0) {
				echo "Not Available1";
			} else {
				$tot_cart_val=$get_user_coupon_data[0]->tot_cart_val; 
				if($user_total_amount<=$tot_cart_val) {
					echo "Not Apply";
				} else 
				{
					if($get_coupon_data->type == 1){
						
						$coupon_amount = $get_coupon_data->value;
						
						$final_price = $user_total_amount - $get_coupon_data->value;
					}
					else if($get_coupon_data->type == 2) {
						
						$calculate_price = $user_total_amount * $get_coupon_data->value;

						$coupon_amount = $calculate_price / 100;

						$final_price = $user_total_amount - $coupon_amount;
					}
					if($final_price<0) //balance to pay should not be null
					{	
						$final_price = $coupon_amount = $user_total_amount;
					}
					$coupon_apply_date = date('Y-m-d H:i:s');
					$check_coupon_order_cod = Coupon::check_coupon_already_purchage_cod($coupon_code,$customer_id);

					$check_coupon_order_paypal = Coupon::check_coupon_already_purchage_paypal($coupon_code,$customer_id);

					/* print_r($check_coupon_order_cod);
					print_r($check_coupon_order_paypal);
					die(); */
					$start_date = $get_coupon_data->start_date;
					$new_start_date = date("Y-m-d H:i:s", strtotime($start_date));
					if (count($check_coupon_order_cod) > 0){
							echo "Not Submit"; 
					}
					else if(count($check_coupon_order_paypal) > 0)
					{
							echo "Not Submit";
					} 
					else if(strtotime($coupon_apply_date) < strtotime($new_start_date))
					{
						echo "Coupon Not Start";
					}
					else if(strtotime($coupon_apply_date) > strtotime($get_coupon_data->end_date))
					{
						echo 'Date Expire';
					}			
					else{
						
					 /*Session::set('coupon_type'.$customer_id,'usercoupon');
					 Session::set('coupon_code',$coupon_code);
					 Session::set('coupon_amount_type',$get_coupon_data->type);
					 Session::set('coupon_amount',$coupon_amount);
					 Session::set('coupon_total_amount',$final_price);*/
					 session()->put('coupon_type'.$customer_id,'usercoupon');
					 session()->put('coupon_code',$coupon_code);
					 session()->put('coupon_amount_type',$get_coupon_data->type);
					 session()->put('coupon_amount',$coupon_amount);
					 session()->put('coupon_total_amount',$final_price);
					 $entry = array(
						'coupon_id'=>$coupon_code,
						'product_id'=>0,
						'sold_user'=>$customer_id,
						'type'=>$get_coupon_data->type,
						'value'=>$coupon_amount,
						'pro_qty'=>0,
						'product_price' =>$final_price,
						'color' =>0,
						'size'=>0,
						'type_of_coupon'=>$get_coupon_data->type_of_coupon,
						'date'=>$coupon_apply_date,
						);
						
					 $last_insert = Coupon::insert_purchage_coupon($entry);
					 $entry1 = array(
						'coupon_id'=>$coupon_code,
						'product_id'=>0,
						'sold_user'=>$customer_id,
						'type'=>$get_coupon_data->type,
						'value'=>$coupon_amount,
						'pro_qty'=>0,
						'product_price' =>$final_price,
						'color' =>0,
						'size'=>0,
						'type_of_coupon'=>$get_coupon_data->type_of_coupon,
						'date'=>$coupon_apply_date,
						);
					 echo json_encode($entry1);
					}
				} 
			}
		}
    }
    public function ajax_user_coupon_delete()
    {
    	$customer_id = Input::get('customer_id');
		$user_total_amount = Input::get('user_total_amount');

       	$arr = array('user_total_amount'=>$user_total_amount);
       	echo json_encode($arr);
		$return = Coupon::delete_entered_user_coupon($customer_id);
		Session::forget('user_total_amount');
		Session::forget('coupon_type'.$customer_id);
		Session::forget('coupon_code');
		Session::forget('coupon_amount_type');
		Session::forget('coupon_amount');
		Session::forget('coupon_total_amount');
    }

    public function ajax_coupon_submit3(){

    	$script_id = Input::get('scriptid');
    	//echo $script_id;exit();
    	for($i=$script_id;$i<$script_id+1;$i++){
    	
    	$coupon = Input::get('coupon');
    	$txt_product = Input::get('txt_product');
    	Session::set('txt_product'.$i,$txt_product);
    	$customer_id = Input::get('customer_id');
    	$type =Input::get('type');
    	Session::set('type'.$i,$type);
    	$value =Input::get('value');
    	Session::set('value'.$i,$value);
    	
    	$coupon_apply_date = date('Y-m-d');
    	  $entry = array(
    	 	'coupon_id'=>$coupon,
    	 	'product_id'=>$txt_product,
    	 	'sold_user'=>$customer_id,
    	 	'date'=>$coupon_apply_date
    	 	);
    	
    	$return = Coupon::insert_purchage_coupon($entry);
    }
    	
    }

    public function add_coupon_submit12()
	{
		 if (Session::has('userid')) {
		 	$coupon_code  = Input::get('coupon_code');
		 	$coupon_name  = Input::get('coupon_name');
		 	$type  = Input::get('type');
		 	if($type == '1')
		 	{
		 		$type_id = 1;
		 	}
		 	elseif($type == '2')
		 	{
		 		$type_id = 2;
		 	}
		 	$value  = Input::get('value');
		 	$start_date  = Input::get('start_date');
		 	$end_date  = Input::get('end_date');
		 	$terms = Input::get('terms');
		 	$created_at = date("Y-m-d H:m:s");
		 	$type_of_coupon  = Input::get('type_of_coupon');

		 	if($type_of_coupon == '1'){
		 		$product_name = Input::get('product');
		 		$pro_table = DB::table('nm_product')->where('pro_title','=',$product_name)->first();
		 		$product_id = $pro_table->pro_id;
		 		$quantity = Input::get('quantity');
		 		$user = 0;
		 		
		 		Mail::send('emails.coupon', array('code'=>$coupon_code,'coupon_name'=>$coupon_name,'start_date'=>$start_date,'end_date'=>$end_date,'terms'=>$terms), function($message) {
		 			$to_user = DB::table('nm_customer')->where('cus_status','=',1)->get();
		 			foreach($to_user as $thisuser){
					 	if(Lang::has(Session::get('admin_lang_file').'.BACK_NEW_COUPON_CODE_AVAILABLE')!= '') 
						{ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_NEW_COUPON_CODE_AVAILABLE');
						}  
						else 
						{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NEW_COUPON_CODE_AVAILABLE');
						}
		           		$message->to($thisuser->cus_email, $thisuser->cus_name)->subject($session_message);
           			}
				});
		 		
		 		
		 	}
		 	elseif($type_of_coupon == '2'){
		 		
		 		$get_user = Input::get('user');
		 		$user = implode(",",$get_user);
		 	   	$product_id = 0;
		 	   	$quantity = 0;
		 	   		Mail::send('emails.coupon', array('code'=>$coupon_code,'coupon_name'=>$coupon_name,'start_date'=>$start_date,'end_date'=>$end_date,'terms'=>$terms), function($message) {
		 		$get_user = Input::get('user');
		 		foreach($get_user as $user_id){
		 			$to_user = DB::table('nm_customer')->where('cus_id','=',$user_id)->where('cus_status','=',1)->get();
		 		}
		 			foreach($to_user as $thisuser){
			 			if(Lang::has(Session::get('admin_lang_file').'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU')!= '') 
						{ 
							$session_message = trans(Session::get('admin_lang_file').'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU');
						}  
						else 
						{ 
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THIS_COUPON_CODE_ONLY_FOR_YOU');
						}
		           		$message->to($thisuser->cus_email, $thisuser->cus_name)->subject($session_message);
           			}
				});
		 	}
		 	// echo $product_id;
		 	// exit();
		 	$check_coupon = Coupon::check_coupon($coupon_code);
		 	$check_coupon_name = Coupon::check_coupon_name($coupon_name);
		 	$check_product = Coupon::check_product($product_id);
		 	 if ($check_coupon || $check_coupon_name || $check_product) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_THE_COUPON_ALREADY_EXIST')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_THE_COUPON_ALREADY_EXIST');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THE_COUPON_ALREADY_EXIST');
			} 
                return Redirect::to('add_coupon')->with('success', $session_message);
            } else {
            	   $entry = array(
                    
                    'coupon_code' => $coupon_code,
                    
                    'coupon_name' => $coupon_name,

                    'product_id' => $product_id,

                    'quantity' => $quantity,

                    'user_id' => $user,
                    
                    'type' => $type_id,

                    'value' => $value,
                    
                    'start_date' => $start_date,
                    
                    'end_date' => $end_date,
                    
                    'type_of_coupon' => $type_of_coupon,

                    'terms' => $terms,

                    'created_at' => $created_at,

                );
            }

            $productid = Coupon::insert_coupon($entry);

            return Redirect::to('manage_coupon');
		 }
	}
	   public function ajax_coupon_store(){

    	$coupon = Input::get('txt_coupon');
    	$product_id = Input::get('txt_product');
    	$user_id = Input::get('txt_user');
    	//Session::set('value1',$value1);
    	//session::set('type1',$type1);
 		//$customer_id1 = Input::get('customer_id1');
    	//$coupon_usage = 1;
    	$coupon_apply_date = date('Y-m-d');
    	$check_coupon = Coupon::check_coupon_already_purchage($coupon,$user_id);
    	 if ($check_coupon) 
		 	 {
					if(Lang::has(Session::get('admin_lang_file').'.BACK_THE_COUPON_ALREADY_EXIST')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_THE_COUPON_ALREADY_EXIST');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_THE_COUPON_ALREADY_EXIST');
			} 
                return Redirect::to('addtocart')->with('success', $session_message);
            }
        else{    
    	 $entry = array(
    	 	'coupon_id'=>$coupon,
    	 	'product_id'=>$product_id,
    	 	'sold_user'=>$user_id,
    	 	'date'=>$coupon_apply_date
    	 	);
    	
    	$return = Coupon::insert_purchage_coupon($entry);
    	}
    }

    public function delete_coupon($id)
    {
        if (Session::has('userid')) {
            $return = Coupon::delete_coupon($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_COUPON_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_COUPON_DELETED_SUCCESSFULLY');
			}
            return Redirect::to('manage_coupon')->with('delete_result', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    public function cannot_delete_coupon()
    {
        if (Session::has('userid')) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_IS_ACTIVATED')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_COUPON_IS_ACTIVATED');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_COUPON_IS_ACTIVATED');
			}
            return Redirect::to('manage_coupon')->with('cannot_delete_result',$session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function ajax_product_data()
    {
    	$product_name = Input::get('product_name');
		$start_date = Input::get('start_date');
		$end_date = Input::get('end_date');
		
		$get_product_id = DB::table('nm_coupon')
		->where('start_date','<=',$start_date)
		->where('end_date','>=',$end_date)
		->get();
		
		if(count($get_product_id)>0)
		{
			foreach($get_product_id as $product)
			{
			$product_id[] = $product->product_id; 
			}
		
			$product_id = implode(',',$product_id);
		}else
		{
			$product_id = '';
		}
		
		
    	$data = DB::table('nm_product')
		->where('pro_title','=',$product_name)
		->whereNotIn('pro_id', array($product_id))
		->first();
		
		if($data != '')
		{
			$img = explode('/**/', $data->pro_Img);
			$arr = array('message'=> 1,'price'=>$data->pro_disprice, 'image'=>$img[0]);

			echo json_encode($arr);
		}
    	else
		{
		//	echo "copoun alredy exist this product choose another product";
			$arr = array('message'=> 0,'price'=>'', 'image'=>'');

			echo json_encode($arr);
			
		}

    }

    public function check_coupon_code()
    {
    	$checking_code = Input::get('coupon_code');
    	$current_date = date('Y-m-d H:m');

    	$value_check = DB::table('nm_coupon')->where('coupon_code','=',$checking_code)->where('end_date','>=',$current_date)->count();
    	$purchase_check_cod = DB::table('nm_ordercod')->where('coupon_code','=',$checking_code)->count();
    	$purchase_check_paypal = DB::table('nm_order')->where('coupon_code','=',$checking_code)->where('order_status','=',2)->count();
    	$total_purchase_cod_paypal = $purchase_check_cod + $purchase_check_paypal;
    	$purchase_count = DB::table('nm_coupon')->where('coupon_code','=',$checking_code)->first();
    	
    	//
    	if(($value_check > 0) && ($purchase_check_cod != $purchase_count->coupon_per_product) && ($purchase_check_paypal != $purchase_count->coupon_per_product) && ($total_purchase_cod_paypal != $purchase_count->coupon_per_product)){
    		echo "available";
    	}
    	elseif($value_check == 0){
    		echo "not available";
    	}
    	else
    	{
    		echo "not available";
    	}
    }
    public function check_userlist_citywise()
    {
    	$checking_code = Input::get('user_city_id');
		
		$start_date = Input::get('start_date');
		$end_date = Input::get('end_date');
		
		$get_coupon_user_id = DB::table('nm_coupon')
		->where('type_of_coupon','=',2)
		->where('start_date','<=',$start_date)
		->where('end_date','>=',$end_date)
		->get();

		
		if(count($get_coupon_user_id)>0)
		{
			foreach($get_coupon_user_id as $coupon_user_id)
			{
			$user_id[] = $coupon_user_id->user_id; 
			}
		
			$user_id = implode(',',$user_id);
		}else
		{
			$user_id = '';
		}

		//$value_check = City::view_citywise_user($checking_code,$user_id);
		$value_check = City::view_citywise_user_detail($checking_code,$user_id);
		
    	if(count($value_check) > 0) {
			$htmloption='';
    		foreach($value_check as $row) {
				$htmloption.='<option value="'.$row->cus_id.'">'.$row->cus_email.'</option>';
			}
			echo $htmloption;
    	}
    	else if(count($value_check) == 0){
    		echo "not available";
    	}
    	else
    	{
    		echo "not available";
    	}
    }
    //Wallet start
    public function ajax_wallet_session_set()
    {

    	$wallet_used_amount = Input::get('wallet_used_amount');
    	//$wallet_total_price = Input::get('wallet_total_price');
    	//Session::set('wallet_amount',$wallet_amount);
    	//Session::set('wallet_total_price',$wallet_total_price);

    		session()->put('wallet_status','wallet applied');
    		session()->put('wallet_used_amount',$wallet_used_amount);
    	// Session::set('wallet_status','wallet applied');
		// Session::set('wallet_used_amount',$wallet_used_amount);
    	$_SESSION["wallet_used_amount"] = $wallet_used_amount;
    }

    public function ajax_wallet_session_unset()
    {
		//print_r("nottt");exit;
    	Session::forget('wallet_status');
    	Session::forget('wallet_used_amount');
    	//Session::forget('wallet_total_price');
    	unset($_SESSION["wallet_used_amount"]);
    }
}
