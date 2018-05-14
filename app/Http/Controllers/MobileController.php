<?php 
namespace App\Http\Controllers;
use App\Http\Models;
use App\MobileModel;
use App\Home;
use App\Payumoney;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Response;
use Session;
use Lang;
use App;
use DB;
use View;
use Illuminate\Http\Request;

class MobileController extends Controller {

	
	private $lang_file;
	public function __construct(){
		/* set mobile language settings starts */
		$this->mob_lang_file_sufix 	= $this->mob_lang_file_sufix!=''? $this->mob_lang_file_sufix:'_mob_lang' ; /*suffix language file for mobile;its concated with the language code */
		//$default_mob_lang_code 	= $this->default_mob_lang_code ;	

		$this->default_mob_lang_code  = 'en';// default language code for mobile		
		App::setLocale($this->default_mob_lang_code); //set locale value
		$this->lang_file 		= $this->default_mob_lang_code.$this->mob_lang_file_sufix; //initial default language file for mobile

		$this->general_setting = DB::table('nm_generalsetting')->get();
		if(count($this->general_setting)>0){
			foreach($this->general_setting as $s){
				$this->SITENAME = $s->gs_sitename;	
			 }
		} else {
			$this->SITENAME = " ";	
		}
		//logo
		// Get Logo Details
   		 $this->logo_details = DB::table('nm_imagesetting')->where('imgs_type', '=', 1)->get();
   		if(count($this->logo_details)>0){
			foreach($this->logo_details as $l){
				View::share("SITE_LOGO",url('').'/public/assets/logo/'.$l->imgs_name);	
			 }
		} else {
			View::share("SITE_LOGO",url('').'/themes/images/logo2.png');	
		}
		/* set mobile language settings ends */

		/* Currency details settings starts */
		$this->cur_code 	= 'USD';
		$this->cur_symbol 	= '$';
		$settings = MobileModel::get_settings();


		if(!empty($settings)){
			foreach ($settings as $s) { 
	        }
	        $this->cur_code 	= $s->ps_curcode;
	        $this->cur_symbol 	= $s->ps_cursymbol;
	    }
		/* Currency details settings ends */		
		/* paypal Client ID */
		$this->paypal_client_id ="AfiSFrZ9FxvKNGLpSPs-r4d0cD7_NpMKl3sjmhzTYgn5x-wlFX4Behtgbvizu5TWTrF8MfcN1k64Cn6r";

	}
	


	/* check selected language is valid- start  */
	public function checkCustomLangValid($langCode){
		$langData = MobileModel::check_CustomLangValid($langCode);
		if(count($langData)>0)
			return true;
		else 
			return false;
	}
	public function checkMobileLangFileExist($lang){
		if(file_exists('resources/lang/'.$lang.'/'.$lang.$this->mob_lang_file_sufix.'.php'))
			return true;
		else
			return false;
	}
	/* check selected language is valid- ends  */
	
	/* USER REGISTRATION */
	public function user_registration() 
	{

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file = $this->lang_file;	
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);

			if($lang!='en' && $langStatus==1 )
			{
				$validedLang	= $lang;
				App::setLocale($lang); //set locale value
				//$lang_file		= $lang.$this->mob_lang_file_sufix; 	
				$lang_file = $lang.$this->mob_lang_file_sufix;	
				$ci_name_dynamic 	= 'ci_name_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
				}
			}

		}

		/* validate selected language ends */

		$cname = Input::get('name');
		$cemail = Input::get('email');
		$cpwd      = Input::get('password');
		$pwd       = md5($cpwd);
		$city = Input::get('city_id');
		$country = Input::get('country_id');
		$check_email = MobileModel::check_email_ajax($cemail);
		
		if($cname =="" || $cemail =="" || $cpwd =="" )
		{
			
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			echo json_encode($encode, JSON_PRETTY_PRINT);
			exit;
		}
		if (!filter_var($cemail, FILTER_VALIDATE_EMAIL)) {
			$encode = array("status"=>400,"message"=> "Enter valid email");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			}
		if($country =="")
		{
			
			if (Lang::has($lang_file.'.API_SELECT_YOUR_COUNTRY')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_SELECT_YOUR_COUNTRY');
			}else{
				$msge = "Select your country";
			}			
			$encode = array("status"=>400,"message"=>$msge);
			echo json_encode($encode, JSON_PRETTY_PRINT);
			exit;
		}
		if($city =="")
		{
			
			if (Lang::has($lang_file.'.API_SELECT_YOUR_CITY')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_SELECT_YOUR_CITY');
			}else{
				$msge = "Select your city";
			}			
			$encode = array("status"=>400,"message"=>$msge);
			echo json_encode($encode, JSON_PRETTY_PRINT);
			exit;
		}
		
		if(count($check_email) > 0 )
		{
			if (Lang::has($lang_file.'.API_EMAIL_ALREADY_EXIST')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_EMAIL_ALREADY_EXIST');
			}else{
				$msge = "Email already exists!";
			}	

			$encode = array("status"=>400,"message"=> $msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");	
		} else {
			$languageList = array();
			$language = DB::table('nm_language')->select('*')->where('lang_default',1)->get();
			
			if(count($language)>0)
			{
				foreach($language as $l)
				{
					$languageList[] = array('lang_code' => $l->lang_code,
											'lang_name' => ucfirst($l->lang_name));
				}
			}
			$user_list = array();
			$ship = array();
    		$entry = array(
                'cus_name' => Input::get('name'),
                'cus_email' => Input::get('email'),
                'cus_pwd' => $pwd,
                'cus_country' => Input::get('country_id'),
                'cus_city' => Input::get('city_id'),
                'cus_logintype' => 2
            );
            $customerid = MobileModel::insert_customer($entry);
            $entry_shipping = array(
                'ship_name' => Input::get('name'),
                'ship_ci_id' => Input::get('city_id'),
                'ship_country' => Input::get('country_id'),
                'ship_cus_id' => $customerid
            );
   
				MobileModel::insert_customer_shipping($entry_shipping);


				//set language session for mail
				//Posted language is en
				if($lang=='en')
				{
					
					Session::put('lang_file','en'.$this->mob_lang_file_sufix);
					$this->OUR_LANGUAGE =	'en'.$this->mob_lang_file_sufix;  	
				}

				//Posted language is other than en
                if($validedLang!='')  {   
                 
                    Session::put('lang_file',$validedLang.$this->mob_lang_file_sufix);
					$this->OUR_LANGUAGE =	$validedLang.$this->mob_lang_file_sufix;  							
				}


				Mail::send('emails.mobile_registermail', array(
	                'first_name' => Input::get('email'),
	                'cus_name' => Input::get('name'),
	                'password' => $cpwd,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE
	            ), function($message) use ($lang_file)
	            {
	            	if (Lang::has($lang_file.'.API_REGISTER_ACCOUNT_CREATED_SUCESSFULLY')!= '') 
					{ 
						$msge 	=  trans($lang_file.'.API_REGISTER_ACCOUNT_CREATED_SUCESSFULLY');
					}else{
						$msge 	= "Register Account Created Successfully";
					}	
	                $message->to(Input::get('email'))->subject($msge);
	            });

				//unset language session after mail sent
	            if(isset($_SESSION['lang_file']))
					unset($_SESSION['lang_file']);
	        
	        $get_user_details = MobileModel::get_user_details($customerid);
	        $cart_total =0;
	        if(count($get_user_details)>0) {
	        	foreach($get_user_details as $u){
	        		$user_status = $u->cus_status;
					if($u->cus_pic !="") {
						if(file_exists('public/assets/profileimage/'.$u->cus_pic)){
							$user_img = url('').'/public/assets/profileimage/'.$u->cus_pic;	
						} else {
							$user_img =  "/themes/images/products/man.png";
						}
					} else {
						$user_img =  url('')."/themes/images/products/man.png";
					}
					if($u->cus_name !="") { $cus_name=$u->cus_name; }else{ $cus_name="";}
					if($u->cus_email !="") { $cus_email=$u->cus_email; }else{ $cus_email="";}
					if($u->cus_phone !="") { $cus_phone=$u->cus_phone; }else{ $cus_phone="";}
					if($u->cus_address1 !="") { $cus_address1=$u->cus_address1; }else{ $cus_address1="";}
					if($u->cus_address2 !="") { $cus_address2=$u->cus_address2; }else{ $cus_address2="";}
					if($u->cus_country !="") { $cus_country = intval($u->cus_country); }else{ $cus_country="";}
					if($u->co_name !="") { if($validedLang!='') {
							$u->co_name = $u->$co_name_dynamic;
						}						
						$co_name=$u->co_name; ; }else{ $co_name="";}
					if($u->cus_city !="") { $cus_city= intval($u->cus_city); }else{ $cus_city="";}
					if($u->ci_name !="") { if($validedLang!='') {
							$u->ci_name = $u->$ci_name_dynamic;
						}						
						$ci_name=$u->ci_name;  }else{ $ci_name="";}
					if($u->cus_joindate !="") { $cus_joindate=$u->cus_joindate; }else{ $cus_joindate="";}
					if($u->cus_logintype !="") { $cus_logintype=$u->cus_logintype; }else{ $cus_logintype="";}
					if($u->cus_status !="") { $cus_status=$u->cus_status; }else{ $cus_status="";}
					$cart_type =1; // for products
					$get_cart_details = MobileModel::get_product_cart_by_userid($u->cus_id,$cart_type);
					$cart_total = count($get_cart_details);
					$ship_details = MobileModel::get_user_ship_details($u->cus_id);
					if(count($ship_details)>0){
						foreach($ship_details as $s) {
							if($validedLang!='') {
								
								$s->co_name = $s->$co_name_dynamic;
								$s->ci_name = $s->$ci_name_dynamic;
							}
							if($s->co_name !=""){
								$ship_co_name = $s->co_name;
							}else{
								$ship_co_name ="";
							}
							if($s->ci_name !=""){
								$ship_ci_name = $s->ci_name;
							}else{
								$ship_ci_name ="";
							}
							if($s->ship_ci_id !=""){
								$ship_ci_id = intval($s->ship_ci_id);
							}else{
								$ship_ci_id ="";
							}
							if($s->ship_country !=""){
								$ship_country = intval($s->ship_country);
							}else{
								$ship_country ="";
							}

							$ship[] = array("ship_id"=>intval($s->ship_id),"ship_name"=>ucfirst($s->ship_name),"ship_email"=>$s->ship_email,"ship_phone"=>$s->ship_phone,"ship_address1"=>ucfirst($s->ship_address1),"ship_address2"=>ucfirst($s->ship_address2),"ship_country_id"=>$ship_country,"ship_country_name"=>ucfirst($ship_co_name),"ship_city_id"=>$ship_ci_id,"ship_city_name"=>ucfirst($ship_ci_name),"ship_state"=>ucfirst($s->ship_state),"ship_postalcode"=>$s->ship_postalcode);
						}
					}

					$user_list[] = array("user_id"=>intval($u->cus_id),"user_name"=>ucfirst($cus_name),"user_email"=>$cus_email,"user_phone"=>$cus_phone,"user_address1"=>ucfirst($cus_address1),"user_address2"=>ucfirst($cus_address2),"user_country_id"=>$cus_country,"user_country_name"=>ucfirst($co_name),"user_city_id"=>$cus_city,"user_city_name"=>ucfirst($ci_name),"user_image"=>$user_img,"user_joindate"=>$cus_joindate,"user_logintype"=>intval($cus_logintype),"user_status"=>intval($cus_status));

	        		//$user_info = array("user_id"=>intval($user->cus_id),"user_name"=>$user->cus_name,"user_email"=>$user->cus_email);
	        	}
	        }

	        if (Lang::has($lang_file.'.API_REGISTERED_SUCESSFULLY')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_REGISTERED_SUCESSFULLY');
			}else{
				$msge 	= "Registered Successfully";
			}	
			$encode = array("status"=>200,"message"=> $msge ,"Languages" =>$languageList,"cart_count"=>$cart_total,"client_id"=>$this->paypal_client_id,"user_details"=>$user_list,"shipping_details"=>$ship);
						
			//$encode = array("status"=>200,"message"=>$msge,"cart_count"=>$cart_total,"client_id"=>$this->paypal_client_id,"user_details"=>$user_info);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
	}
	/* USER LOGIN */
	public function login_user()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		//$lang_file = $this->OUR_LANGUAGE;
		$lang_file = $this->lang_file;

		$lang_file_exist = $this->checkMobileLangFileExist($lang);

		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$ci_name_dynamic 	= 'ci_name_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		if($email ==''){
			if (Lang::has($lang_file.'.API_ENTER_EMAIL_ID')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_ENTER_EMAIL_ID');
			}else{
				$msge = "Enter email id!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} 
		else if($password ==''){
			if (Lang::has($lang_file.'.API_ENTER_PASSWORD')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PASSWORD');
			}else{
				$msge = "Enter password!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}		
		else {
			$user_list = array();
			$ship = array();
			$login_check = MobileModel::user_login($email,$password);
			$email_exist = DB::table('nm_customer')->select('cus_id')->where('cus_email','=',$email)->first();
			
			$languageList = array();
			$language = DB::table('nm_language')->select('*')->where('lang_default',1)->get();
			
			if(count($language)>0)
			{
				foreach($language as $lang)
				{
					$languageList[] = array('lang_code' => $lang->lang_code,
											'lang_name' => ucfirst($lang->lang_name));
				}
			}
			$cart_total =0;
			if(count($email_exist)>0){
			if(count($login_check)>0) {
				foreach($login_check as $u){
					$user_status = $u->cus_status;
					if($u->cus_pic !="") {
						if(file_exists('public/assets/profileimage/'.$u->cus_pic)){
							$user_img = url('').'/public/assets/profileimage/'.$u->cus_pic;	
						} else {
							$user_img =  "/themes/images/products/man.png";
						}
					} else {
						$user_img =  url('')."/themes/images/products/man.png";
					}
					if($u->cus_name !="") { $cus_name=$u->cus_name; }else{ $cus_name="";}
					if($u->cus_email !="") { $cus_email=$u->cus_email; }else{ $cus_email="";}
					if($u->cus_phone !="") { $cus_phone=$u->cus_phone; }else{ $cus_phone="";}
					if($u->cus_address1 !="") { $cus_address1=$u->cus_address1; }else{ $cus_address1="";}
					if($u->cus_address2 !="") { $cus_address2=$u->cus_address2; }else{ $cus_address2="";}
					if($u->cus_country !="") { $cus_country=intval($u->cus_country); }else{ $cus_country="";}
					if($u->co_name !="") { 
						if($validedLang!='') {
							$u->co_name = $u->$co_name_dynamic;
						}						
						$co_name=$u->co_name; 
					}
						else{ $co_name="";}
					if($u->cus_city !="") { $cus_city=intval($u->cus_city); }else{ $cus_city="";}
					if($u->ci_name !="") { 
						if($validedLang!='') {
							$u->ci_name = $u->$ci_name_dynamic;
						}
						$ci_name=$u->ci_name; 
					}else{ $ci_name="";}
					if($u->cus_joindate !="") { $cus_joindate=$u->cus_joindate; }else{ $cus_joindate="";}
					if($u->cus_logintype !="") { $cus_logintype=$u->cus_logintype; }else{ $cus_logintype="";}
					if($u->cus_status !="") { $cus_status=$u->cus_status; }else{ $cus_status="";}
					$cart_type =1; // for products
					$get_cart_details = MobileModel::get_product_cart_by_userid($u->cus_id,$cart_type);
					$cart_total = count($get_cart_details);
					$ship_details = MobileModel::get_user_ship_details($u->cus_id);
					if(count($ship_details)>0){
						foreach($ship_details as $s) {
							if($validedLang!='') {
								
								$s->co_name = $u->$co_name_dynamic;
								$s->ci_name = $u->$ci_name_dynamic;
							}
							if($s->co_name !=""){
								$ship_co_name = $s->co_name;
							}else{
								$ship_co_name ="";
							}
							if($s->ci_name !=""){
								$ship_ci_name = $s->ci_name;
							}else{
								$ship_ci_name ="";
							}

							$ship[] = array("ship_id"=>intval($s->ship_id),"ship_name"=>ucfirst($s->ship_name),"ship_email"=>$s->ship_email,"ship_phone"=>$s->ship_phone,"ship_address1"=>ucfirst($s->ship_address1),"ship_address2"=>ucfirst($s->ship_address2),"ship_country_id"=>intval($s->co_id),"ship_country_name"=>ucfirst($ship_co_name),"ship_city_id"=>intval($s->ci_id),"ship_city_name"=>ucfirst($ship_ci_name),"ship_state"=>ucfirst($s->ship_state),"ship_postalcode"=>$s->ship_postalcode);
						}
					}
					$user_list[] = array("user_id"=>intval($u->cus_id),"user_name"=>ucfirst($cus_name),"user_email"=>$cus_email,"user_phone"=>$cus_phone,"user_address1"=>ucfirst($cus_address1),"user_address2"=>ucfirst($cus_address2),"user_country_id"=>intval($cus_country),"user_country_name"=>ucfirst($co_name),"user_city_id"=>intval($cus_city),"user_city_name"=>ucfirst($ci_name),"user_image"=>$user_img,"user_joindate"=>$cus_joindate,"user_logintype"=>intval($cus_logintype),"user_status"=>intval($cus_status));
					if($user_status ==1) {

						if (Lang::has($lang_file.'.API_USER_BLOCKED')!= '') 
						{ 
							$msge 	=  trans($lang_file.'.API_USER_BLOCKED');
						}else{
							$msge = "User Blocked!";
						}	

						$encode = array("status"=>400,$msge);
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json"); 
					} else {
						
						if (Lang::has($lang_file.'.API_USER_DETAILS_AVAILABLE')!= '') 
						{ 
							$msge 	=  trans($lang_file.'.API_USER_DETAILS_AVAILABLE');
						}else{
							$msge = "User details available!";
						}	

						$encode = array("status"=>200,"message"=> $msge ,"Languages" =>$languageList,"cart_count"=>$cart_total,"client_id"=>$this->paypal_client_id,"user_details"=>$user_list,"shipping_details"=>$ship);
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
				}
			} else {

				if (Lang::has($lang_file.'.API_INVALID_PASSWORD')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_PASSWORD');
				}else{
					$msge = "Invalid password";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}}
		else {

				if (Lang::has($lang_file.'.API_INVALID_EMAIL')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_EMAIL');
				}else{
					$msge = "Invalid email";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		
		}
	}

	/* FORGOT USER */
	public function login_user_forgot()
	{
		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		//$lang_file = $this->OUR_LANGUAGE;
		$lang_file = $this->lang_file;
		
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		

		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} 
		 else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$ci_name_dynamic 	= 'ci_name_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		$email = Input::get('email');
		if($email==""){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$user_details = MobileModel::check_email_ajax($email);
			$encode_email = base64_encode(base64_encode(base64_encode(($email))));
			if(count($user_details)>0){

					//set language session
				//Posted language is en
				if($lang=='en')
				{
					Session::put('lang_file','en'.$this->mob_lang_file_sufix);
					$this->OUR_LANGUAGE =	'en'.$this->mob_lang_file_sufix;  	
				}

				//Posted language is other than en
                if($validedLang!='')  {      
                    Session::put('lang_file',$validedLang.$this->mob_lang_file_sufix);
					$this->OUR_LANGUAGE =	$validedLang.$this->mob_lang_file_sufix;  							
				}
				foreach($user_details as $u) {
					$user_id = $u->cus_id;
					$random_no = str_random();
					$check   = MobileModel::update_newpwd($user_id, $random_no);
					$send_mail_data = array(
						'name' => $u->cus_name,
						'password' => $random_no,
						'site_name' => '',
						'encodeemail' => $encode_email,
						"OUR_LANGUAGE" => $this->OUR_LANGUAGE,"SITENAME" => $this->SITENAME
					);
					
					Mail::send('emails.mobile_user_passwordrecoverymail', $send_mail_data, function($message) use ($lang_file)
					{
						if (Lang::has($lang_file.'.API_PWD_RECOVERT_DETAILS')!= '') 
						{ 
							$msge 	=  trans($lang_file.'.API_PWD_RECOVERT_DETAILS');
						}else{
							$msge 	= "Password Recovery Details";
						}
						$message->to(Input::get('email'),' Customer')->subject($msge);
					});
				}
				if(isset($_SESSION['lang_file']))
					unset($_SESSION['lang_file']);

				

				if (Lang::has($lang_file.'.API_PWD_CHANGED_SUCCESSFULLY')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_PWD_CHANGED_SUCCESSFULLY');
				}else{
					$msge 	= "Password changed successfully!";
				}

				$encode = array("status"=>200,"message"=>$msge);
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			}
		}
	}
	/* FACEBOOK LOGIN */
	public function user_facebook_login()
	{
		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		//$lang_file =$this->OUR_LANGUAGE;
		$lang_file = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);

		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$ci_name_dynamic 	= 'ci_name_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		$cname = Input::get('name');
		$cemail = Input::get('email');
		$facebook_id = Input::get('facebook_id');

		$check_email = MobileModel::check_email_ajax($cemail); // checks email exists

		if($cname =="" || $facebook_id =="")
		{
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		$languageList = array();
		$language = DB::table('nm_language')->select('*')->where('lang_default',1)->get();
		
		if(count($language)>0)
		{
			foreach($language as $lang)
			{
				$languageList[] = array('lang_code' => $lang->lang_code,
										'lang_name' => ucfirst($lang->lang_name));
			}
		}
		$user_list = array();
		$ship = array();
		if(count($check_email)>0) {
			// checks email and facebook id exists
			$entry = array(
                'cus_name' => Input::get('name'),
                'cus_email' => Input::get('email'),
                'facebook_id'=>Input::get('facebook_id')
            );
	        $customerid = MobileModel::update_customer($cemail,$entry);
            $get_user_details = MobileModel::get_user_info($cemail);
            $cart_total =0;
            if(count($get_user_details)>0){
				foreach($get_user_details as $u){
					$user_status = $u->cus_status;
					if($u->cus_pic !="") {
						if(file_exists('public/assets/profileimage/'.$u->cus_pic)){
							$user_img = url('').'/public/assets/profileimage/'.$u->cus_pic;	
						} else {
							$user_img =  "/themes/images/products/man.png";
						}
					} else {
						$user_img =  url('')."/themes/images/products/man.png";
					}
					if($u->cus_name !="") { $cus_name=$u->cus_name; }else{ $cus_name="";}
					if($u->cus_email !="") { $cus_email=$u->cus_email; }else{ $cus_email="";}
					if($u->cus_phone !="") { $cus_phone=$u->cus_phone; }else{ $cus_phone="";}
					if($u->cus_address1 !="") { $cus_address1=$u->cus_address1; }else{ $cus_address1="";}
					if($u->cus_address2 !="") { $cus_address2=$u->cus_address2; }else{ $cus_address2="";}
					if($u->cus_country !="") { $cus_country=intval($u->cus_country); }else{ $cus_country="";}
					if($u->co_name !="") { if($validedLang!='') {
							$u->co_name = $u->$co_name_dynamic;
						}						
						$co_name=$u->co_name;  }else{ $co_name="";}
					if($u->cus_city !="") { $cus_city=intval($u->cus_city); }else{ $cus_city="";}
					if($u->ci_name !="") { if($validedLang!='') {
							$u->ci_name = $u->$ci_name_dynamic;
						}
						$ci_name=$u->ci_name;   }else{ $ci_name="";}
					if($u->cus_joindate !="") { $cus_joindate=$u->cus_joindate; }else{ $cus_joindate="";}
					if($u->cus_logintype !="") { $cus_logintype=$u->cus_logintype; }else{ $cus_logintype="";}
					if($u->cus_status !="") { $cus_status=$u->cus_status; }else{ $cus_status="";}
					$cart_type =1; // for products
					$get_cart_details = MobileModel::get_product_cart_by_userid($u->cus_id,$cart_type);
					$cart_total = count($get_cart_details);
					$ship_details = MobileModel::get_user_ship_details($u->cus_id);
					if(count($ship_details)>0){
						foreach($ship_details as $s) {
							if($validedLang!='') {
								
								$s->co_name = $s->$co_name_dynamic;
								$s->ci_name = $s->$ci_name_dynamic;
							}
							if($s->co_name !=""){
								$ship_co_name = $s->co_name;
							}else{
								$ship_co_name ="";
							}
							if($s->ci_name !=""){
								$ship_ci_name = $s->ci_name;
							}else{
								$ship_ci_name ="";
							}
							if($s->ship_ci_id !=""){
								$ship_ci_id = intval($s->ship_ci_id);
							}else{
								$ship_ci_id ="";
							}
							if($s->ship_country !=""){
								$ship_country = intval($s->ship_country);
							}else{
								$ship_country ="";
							}

							$ship[] = array("ship_id"=>intval($s->ship_id),"ship_name"=>ucfirst($s->ship_name),"ship_email"=>$s->ship_email,"ship_phone"=>$s->ship_phone,"ship_address1"=>ucfirst($s->ship_address1),"ship_address2"=>ucfirst($s->ship_address2),"ship_country_id"=>$ship_country,"ship_country_name"=>ucfirst($ship_co_name),"ship_city_id"=>$ship_ci_id,"ship_city_name"=>ucfirst($ship_ci_name),"ship_state"=>ucfirst($s->ship_state),"ship_postalcode"=>$s->ship_postalcode);
						}
					}
					$user_list[] = array("user_id"=>intval($u->cus_id),"user_name"=>ucfirst($cus_name),"user_email"=>$cus_email,"user_phone"=>$cus_phone,"user_address1"=>ucfirst($cus_address1),"user_address2"=>ucfirst($cus_address2),"user_country_id"=>$cus_country,"user_country_name"=>ucfirst($co_name),"user_city_id"=>$cus_city,"user_city_name"=>ucfirst($ci_name),"user_image"=>$user_img,"user_joindate"=>$cus_joindate,"user_logintype"=>intval($cus_logintype),"user_status"=>intval($cus_status));
					if($user_status ==1) {
						if (Lang::has($lang_file.'.API_USER_BLOCKED')!= '') 
						{ 
							$msge 	=  trans($lang_file.'.API_USER_BLOCKED');
						}else{
							$msge = "User Blocked!";
						}	

						$encode = array("status"=>400,$msge);
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json"); 
					} else {
						if (Lang::has($lang_file.'.API_USER_DETAILS_AVAILABLE')!= '') 
						{ 
							$msge 	=  trans($lang_file.'.API_USER_DETAILS_AVAILABLE');
						}else{
							$msge = "User details available!";
						}	
						$encode = array("status"=>200,"message"=> $msge ,"Languages" =>$languageList,"cart_count"=>$cart_total,"client_id"=>$this->paypal_client_id,"user_details"=>$user_list,"shipping_details"=>$ship);
						//$encode = array("status"=>200,"message"=>$msge,"cart_count"=>$cart_total,"user_details"=>$user_list);
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
				}
			}
		} else {
			$check_facebook_id = MobileModel::check_facebook_id($facebook_id); // checks facebook id exists
			$cart_total =0;
			if(count($check_facebook_id)>0){
				foreach($check_facebook_id as $u){
					$user_status = $u->cus_status;
					if($u->cus_pic !="") {
						if(file_exists('public/assets/profileimage/'.$u->cus_pic)){
							$user_img = url('').'/public/assets/profileimage/'.$u->cus_pic;	
						} else {
							$user_img =  "/themes/images/products/man.png";
						}
					} else {
						$user_img =  url('')."/themes/images/products/man.png";
					}
					if($u->cus_name !="") { $cus_name=$u->cus_name; }else{ $cus_name="";}
					if($u->cus_email !="") { $cus_email=$u->cus_email; }else{ $cus_email="";}
					if($u->cus_phone !="") { $cus_phone=$u->cus_phone; }else{ $cus_phone="";}
					if($u->cus_address1 !="") { $cus_address1=$u->cus_address1; }else{ $cus_address1="";}
					if($u->cus_address2 !="") { $cus_address2=$u->cus_address2; }else{ $cus_address2="";}
					if($u->cus_country !="") { $cus_country = intval($u->cus_country); }else{ $cus_country="";}
					if($u->co_name !="") { if($validedLang!='') {
							$u->co_name = $u->$co_name_dynamic;
						}						
						$co_name=$u->co_name; ; }else{ $co_name="";}
					if($u->cus_city !="") { $cus_city= intval($u->cus_city); }else{ $cus_city="";}
					if($u->ci_name !="") { if($validedLang!='') {
							$u->ci_name = $u->$ci_name_dynamic;
						}						
						$ci_name=$u->ci_name;  }else{ $ci_name="";}
					if($u->cus_joindate !="") { $cus_joindate=$u->cus_joindate; }else{ $cus_joindate="";}
					if($u->cus_logintype !="") { $cus_logintype=$u->cus_logintype; }else{ $cus_logintype="";}
					if($u->cus_status !="") { $cus_status=$u->cus_status; }else{ $cus_status="";}
					$cart_type =1; // for products
					$get_cart_details = MobileModel::get_product_cart_by_userid($u->cus_id,$cart_type);
					$cart_total = count($get_cart_details);
					$ship_details = MobileModel::get_user_ship_details($u->cus_id);
					if(count($ship_details)>0){
						foreach($ship_details as $s) {
							if($validedLang!='') {
								
								$s->co_name = $s->$co_name_dynamic;
								$s->ci_name = $s->$ci_name_dynamic;
							}
							if($s->co_name !=""){
								$ship_co_name = $s->co_name;
							}else{
								$ship_co_name ="";
							}
							if($s->ci_name !=""){
								$ship_ci_name = $s->ci_name;
							}else{
								$ship_ci_name ="";
							}
							if($s->ship_ci_id !=""){
								$ship_ci_id = intval($s->ship_ci_id);
							}else{
								$ship_ci_id ="";
							}
							if($s->ship_country !=""){
								$ship_country = intval($s->ship_country);
							}else{
								$ship_country ="";
							}

							$ship[] = array("ship_id"=>intval($s->ship_id),"ship_name"=>ucfirst($s->ship_name),"ship_email"=>$s->ship_email,"ship_phone"=>$s->ship_phone,"ship_address1"=>ucfirst($s->ship_address1),"ship_address2"=>ucfirst($s->ship_address2),"ship_country_id"=>$ship_country,"ship_country_name"=>ucfirst($ship_co_name),"ship_city_id"=>$ship_ci_id,"ship_city_name"=>ucfirst($ship_ci_name),"ship_state"=>ucfirst($s->ship_state),"ship_postalcode"=>$s->ship_postalcode);
						}
					}

					$user_list[] = array("user_id"=>intval($u->cus_id),"user_name"=>ucfirst($cus_name),"user_email"=>$cus_email,"user_phone"=>$cus_phone,"user_address1"=>ucfirst($cus_address1),"user_address2"=>ucfirst($cus_address2),"user_country_id"=>$cus_country,"user_country_name"=>ucfirst($co_name),"user_city_id"=>$cus_city,"user_city_name"=>ucfirst($ci_name),"user_image"=>$user_img,"user_joindate"=>$cus_joindate,"user_logintype"=>intval($cus_logintype),"user_status"=>intval($cus_status));
					if($user_status ==1) {
						if (Lang::has($lang_file.'.API_USER_BLOCKED')!= '') 
						{ 
							$msge 	=  trans($lang_file.'.API_USER_BLOCKED');
						}else{
							$msge = "User Blocked!";
						}	

						$encode = array("status"=>400,$msge);
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json"); 
					} else {

						if (Lang::has($lang_file.'.API_USER_DETAILS_AVAILABLE')!= '') 
						{ 
							$msge 	=  trans($lang_file.'.API_USER_DETAILS_AVAILABLE');
						}else{
							$msge = "User details available!";
						}	
						$encode = array("status"=>200,"message"=> $msge ,"Languages" =>$languageList,"cart_count"=>$cart_total,"client_id"=>$this->paypal_client_id,"user_details"=>$user_list,"shipping_details"=>$ship);
						//$encode = array("status"=>200,"message"=>$msge,"cart_count"=>$cart_total,"user_details"=>$user_list);
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
				}
			}
    		$entry = array(
                'cus_name' => Input::get('name'),
                'cus_email' => Input::get('email'),
                'facebook_id' => Input::get('facebook_id'),
                'cus_logintype' => 3
            );
            $customerid = MobileModel::insert_customer($entry);
            $entry_shipping = array(
                'ship_name' => Input::get('name'),
                'ship_cus_id' => $customerid
            );
				MobileModel::insert_customer_shipping($entry_shipping);
			/*	Mail::send('emails.registermail', array(
	                'first_name' => Input::get('email'),
	                'cus_name' => Input::get('name'),
	                'password' => ''
	            ), function($message)
	            {
	                $message->to(Input::get('email'))->subject('Register Account Created Successfully');
	            });
	        */
	        
	        $get_user_details = MobileModel::get_user_details($customerid);
            if(count($get_user_details)>0){
				foreach($get_user_details as $u){
					$user_status = $u->cus_status;
					if($u->cus_pic !="") {
						if(file_exists('public/assets/profileimage/'.$u->cus_pic)){
							$user_img = url('').'/public/assets/profileimage/'.$u->cus_pic;	
						} else {
							$user_img =  "/themes/images/products/man.png";
						}
					} else {
						$user_img =  url('')."/themes/images/products/man.png";
					}
					if($u->cus_name !="") { $cus_name=$u->cus_name; }else{ $cus_name="";}
					if($u->cus_email !="") { $cus_email=$u->cus_email; }else{ $cus_email="";}
					if($u->cus_phone !="") { $cus_phone=$u->cus_phone; }else{ $cus_phone="";}
					if($u->cus_address1 !="") { $cus_address1=$u->cus_address1; }else{ $cus_address1="";}
					if($u->cus_address2 !="") { $cus_address2=$u->cus_address2; }else{ $cus_address2="";}
					if($u->cus_country !="") { $cus_country=intval($u->cus_country); }else{ $cus_country="";}
					if($u->co_name !="") { if($validedLang!='') {
							$u->co_name = $u->$co_name_dynamic;
						}						
						$co_name=$u->co_name;  }else{ $co_name="";}
					if($u->cus_city !="") { $cus_city=intval($u->cus_city); }else{ $cus_city="";}
					if($u->ci_name !="") { if($validedLang!='') {
							$u->ci_name = $u->$ci_name_dynamic;
						}						
						$ci_name=$u->ci_name;  }else{ $ci_name="";}
					if($u->cus_joindate !="") { $cus_joindate=$u->cus_joindate; }else{ $cus_joindate="";}
					if($u->cus_logintype !="") { $cus_logintype=$u->cus_logintype; }else{ $cus_logintype="";}
					if($u->cus_status !="") { $cus_status=$u->cus_status; }else{ $cus_status="";}
					$cart_type =1; // for products
					$get_cart_details = MobileModel::get_product_cart_by_userid($u->cus_id,$cart_type);
					$cart_total = count($get_cart_details);
					$ship_details = MobileModel::get_user_ship_details($u->cus_id);
					if(count($ship_details)>0){
						foreach($ship_details as $s) {
							if($validedLang!='') {
								
								$s->co_name = $s->$co_name_dynamic;
								$s->ci_name = $s->$ci_name_dynamic;
							}
							if($s->co_name !=""){
								$ship_co_name = $s->co_name;
							}else{
								$ship_co_name ="";
							}
							if($s->ci_name !=""){
								$ship_ci_name = $s->ci_name;
							}else{
								$ship_ci_name ="";
							}
							if($s->ship_ci_id !=""){
								$ship_ci_id = intval($s->ship_ci_id);
							}else{
								$ship_ci_id ="";
							}
							if($s->ship_country !=""){
								$ship_country = intval($s->ship_country);
							}else{
								$ship_country ="";
							}

							$ship[] = array("ship_id"=>intval($s->ship_id),"ship_name"=>ucfirst($s->ship_name),"ship_email"=>$s->ship_email,"ship_phone"=>$s->ship_phone,"ship_address1"=>ucfirst($s->ship_address1),"ship_address2"=>ucfirst($s->ship_address2),"ship_country_id"=>$ship_country,"ship_country_name"=>ucfirst($ship_co_name),"ship_city_id"=>$ship_ci_id,"ship_city_name"=>ucfirst($ship_ci_name),"ship_state"=>ucfirst($s->ship_state),"ship_postalcode"=>$s->ship_postalcode);
						}
					}

					$user_list[] = array("user_id"=>intval($u->cus_id),"user_name"=>ucfirst($cus_name),"user_email"=>$cus_email,"user_phone"=>$cus_phone,"user_address1"=>ucfirst($cus_address1),"user_address2"=>ucfirst($cus_address2),"user_country_id"=>$cus_country,"user_country_name"=>ucfirst($co_name),"user_city_id"=>$cus_city,"user_city_name"=>ucfirst($ci_name),"user_image"=>$user_img,"user_joindate"=>$cus_joindate,"user_logintype"=>intval($cus_logintype),"user_status"=>intval($cus_status));
					if($user_status ==1) {
						if (Lang::has($lang_file.'.API_USER_BLOCKED')!= '') 
						{ 
							$msge 	=  trans($lang_file.'.API_USER_BLOCKED');
						}else{
							$msge = "User Blocked!";
						}	

						$encode = array("status"=>400,$msge);
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json"); 
					} else {
						if (Lang::has($lang_file.'.API_USER_DETAILS_AVAILABLE')!= '') 
						{ 
							$msge 	=  trans($lang_file.'.API_USER_DETAILS_AVAILABLE');
						}else{
							$msge = "User details available!";
						}	
						$encode = array("status"=>200,"message"=> $msge ,"Languages" =>$languageList,"cart_count"=>$cart_total,"client_id"=>$this->paypal_client_id,"user_details"=>$user_list,"shipping_details"=>$ship);
						//$encode = array("status"=>200,"message"=>$msge,"cart_count"=>$cart_total,"user_details"=>$user_list);
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
				}
			}
		}
	}
	
	/* COUNTRY AND CITY LISTING */
	public function country_city_listing()
	{
		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file = $this->lang_file;
		//$lang_file = $this->OUR_LANGUAGE;

		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		

		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} 
		else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$ci_name_dynamic 	= 'ci_name_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		$get_country_list = MobileModel::get_country_list();
		if(count($get_country_list)>0) {
			$country = array();
			foreach($get_country_list as $cnty){
				if($validedLang!='') {
					$cnty->co_name = $cnty->$co_name_dynamic;
				}						
				
				$get_city_list = MobileModel::get_city_list($cnty->co_id);
				$city_arr = array();
				if(count($get_city_list)>0){
					foreach($get_city_list as $city){
						if($validedLang!='') {
							$city->ci_name = $city->$ci_name_dynamic;
						}
						$city_arr[] =  array("city_id"=>intval($city->ci_id),"city_name"=>ucfirst($city->ci_name),"city_country_id"=>intval($city->ci_con_id));
					}
				}
				$country[] = array("country_id"=>intval($cnty->co_id),"country_name"=>ucfirst($cnty->co_name),"city_details"=>$city_arr);
			}

			if (Lang::has($lang_file.'.API_COUNTRY_LIST_AVAILBLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_COUNTRY_LIST_AVAILBLE');
			}else{
				$msge = "Country List available!";
			}	


			$encode = array("status"=>200,"message"=>$msge,"country_details"=>$country);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			if (Lang::has($lang_file.'.API_COUNTRY_LIST_NOT_AVAILBLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_COUNTRY_LIST_NOT_AVAILBLE');
			}else{
				$msge = "Country List not available!";
			}	

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}	
	}
	/* HOME PAGE LISTINGS */
	public function home_page_listing()
	{
		
		$user_id = Input::get('user_id');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 

		/* validate selected language  */
		$validedLang = '';
		$lang_file = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		

		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} 
		else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$smc_name_dynamic 	= 'smc_name_'.$lang;
				$mc_name_dynamic	= 'mc_name_'.$lang;
				$bn_title_dynamic	= 'bn_title_'.$lang;
				$pro_title_dynamic	= 'pro_title_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		$category_details 	 		= MobileModel::get_category_details();
		$banner_details 	 		= MobileModel::get_banner_details();
		$dealsof_day_details 		= MobileModel::dealsof_day_details();
		$get_product_top_offer 		= MobileModel::get_product_top_offer();
		$get_product_fifty_percent 	= MobileModel::get_product_fifty_percent();
		$most_popular_product		= MobileModel::get_popular_product();
		/* category list */
		$category_arr = array();
		
		if(count($category_details)>0){
			foreach($category_details as $cat){

				if($validedLang!='') {
					$cat->mc_name = $cat->$mc_name_dynamic;
				}
				$cat_img = "";
				if($cat->mc_img !="") {
					if(file_exists('public/assets/categoryimage/'.$cat->mc_img)){
						$cat_img = url('').'/public/assets/categoryimage/'.$cat->mc_img;	
					} 
				}
				$sec_main_cat = array();
				$sec_main_cat_details = MobileModel::get_sec_main_category_details($cat->mc_id);
				if(count($sec_main_cat_details)>0) {
					foreach($sec_main_cat_details as $sec_main) {
						if($lang =='fr') {
							$sec_main->smc_name = $sec_main->$smc_name_dynamic;
						}
					$sec_main_cat[] = array("level"=>1,"category_id"=>intval($sec_main->smc_id),"category_name"=>ucfirst($sec_main->smc_name),"category_image"=>"");
					}
				}
				$category_arr[] = array("level"=>0,"category_id"=>intval($cat->mc_id),"category_name"=>ucfirst($cat->mc_name),"category_image"=>$cat_img,"sub_category_list"=>$sec_main_cat);
			}
		}
		
		/* Banner list */
		$banner_arr = array();
		if(count($banner_details)>0){
			foreach($banner_details as $ban){
				$ban_img ="";

				if($validedLang!='') {
					$ban->bn_title = $ban->$bn_title_dynamic;
				}


				if($ban->bn_img !="") {
					if(file_exists('public/assets/bannerimage/'.$ban->bn_img)){
						$ban_img = url('').'/public/assets/bannerimage/'.$ban->bn_img;	
					} 
				} 
				$banner_arr[] = array("banner_id"=>intval($ban->bn_id),"banner_title"=>ucfirst($ban->bn_title),"banner_redirect_url"=>$ban->bn_redirecturl,"banner_image"=>$ban_img);
			}
		}
		/* Deal of the day list */
		$deal_arr = array();
		$deal_end_time = "";
		if(count($dealsof_day_details)>0){
			foreach($dealsof_day_details as $deal){
				$deal_timing = array($deal->deal_end_date);
				//print_r($deal_timing);
					
				$deal_image="";
				if($deal->deal_image !="") {
					$deal_img = explode('/**/', $deal->deal_image);
					if(file_exists('public/assets/deals/'.$deal_img[0])){
						$deal_image = url('').'/public/assets/deals/'.$deal_img[0];
											}
									}
				

				$deal_arr[] = array("deal_id"=>intval($deal->deal_id),"deal_price"=>floatval($deal->deal_original_price),"deal_discount_price"=>floatval($deal->deal_discount_price),"deal_percentage"=>intval($deal->deal_discount_percentage),"deal_image"=>$deal_image,"currency_symbol"=>$this->cur_symbol,"currency_code"=>$this->cur_code,"deal_end_time" =>$deal->deal_end_date
				);
			}
			$deal_end_time = max($deal_timing);
		}
		/* Top Offer list */
		$top_offer_arr = array();
		if(count($get_product_top_offer)>0){

			foreach($get_product_top_offer as $top){
				$is_wishlist = false;
				if($user_id !="" && $user_id !=0){
					$get_wish_list = MobileModel::get_product_wishlist($top->pro_id,$user_id);
					if(count($get_wish_list)>0){
						$is_wishlist = true;
					}
				}
				$product_image="";
				if($top->pro_Img !="") {
					$product_img = explode('/**/', $top->pro_Img);
					if(file_exists('public/assets/product/'.$product_img[0])){
						$product_image = url('').'/public/assets/product/'.$product_img[0];
					}
				}

				if($validedLang!='') {
					
					$top->pro_title = $top->$pro_title_dynamic;
				}


				$top_offer_arr[] = array("product_id"=>intval($top->pro_id),"product_title"=>ucfirst($top->pro_title),"product_price"=>floatval($top->pro_price),"product_discount_price"=>floatval($top->pro_disprice),"product_percentage"=>intval($top->pro_discount_percentage),"product_image"=>$product_image,"is_wishlist"=>$is_wishlist,"currency_symbol"=>$this->cur_symbol,"currency_code"=>$this->cur_code);
			}
		}
		/* Upto Fifty Percent list */
		$product_fifty_arr = array();
		if(count($get_product_fifty_percent)>0){
			foreach($get_product_fifty_percent as $prd){
				$is_wishlist = false;
				if($user_id !="" && $user_id !=0){
					$get_wish_list = MobileModel::get_product_wishlist($prd->pro_id,$user_id);
					if(count($get_wish_list)>0){
						$is_wishlist = true;
					}
				}
				$product_image="";
				if($prd->pro_Img !="") {
					$product_img = explode('/**/', $prd->pro_Img);
					if(file_exists('public/assets/product/'.$product_img[0])){
						$product_image = url('').'/public/assets/product/'.$product_img[0];
					}
				}

				if($validedLang!='') {
					$prd->pro_title = $prd->$pro_title_dynamic;
				}

				$product_fifty_arr[] = array("product_id"=>intval($prd->pro_id),"product_title"=>ucfirst($prd->pro_title),"product_price"=>floatval($prd->pro_price),"product_discount_price"=>floatval($prd->pro_disprice),"product_percentage"=>intval($prd->pro_discount_percentage),"product_image"=>$product_image,"is_wishlist"=>$is_wishlist,"currency_symbol"=>$this->cur_symbol,"currency_code"=>$this->cur_code);
			}
		}
		/* Most Popular list */
		$product_popular_arr = array();
		if(count($most_popular_product)>0){
			foreach($most_popular_product as $pop){
				$is_wishlist = false;
				if($user_id !="" && $user_id !=0){
					$get_wish_list = MobileModel::get_product_wishlist($pop->pro_id,$user_id);
					if(count($get_wish_list)>0){
						$is_wishlist = true;
					}
				}
				$product_image="";
				if($pop->pro_Img !="") {
					$product_img = explode('/**/', $pop->pro_Img);
					if(file_exists('public/assets/product/'.$product_img[0])){
						$product_image = url('').'/public/assets/product/'.$product_img[0];
					}
				}

				if($validedLang!='') {
					$pop->pro_title = $pop->$pro_title_dynamic;
				}


				$product_popular_arr[] = array("product_id"=>intval($pop->pro_id),"product_title"=>ucfirst($pop->pro_title),"product_price"=>floatval($pop->pro_price),"product_discount_price"=>floatval($pop->pro_disprice),"product_image"=>$product_image,"is_wishlist"=>$is_wishlist,"currency_symbol"=>$this->cur_symbol,"currency_code"=>$this->cur_code);
			}
		}
		if((count($category_details)==0) && (count($banner_details)==0) && (count($dealsof_day_details)==0) && (count($get_product_top_offer)==0) && (count($get_product_fifty_percent)==0) && (count($most_popular_product)==0)){ 

			if (Lang::has($lang_file.'.API_LIST_NOT_AVAILBLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_LIST_NOT_AVAILBLE');
			}else{
				$msge = "List not available!";
			}	

			$encode = array("status"=>400,"message"=>$msge,"category_details"=>$category_arr,"banner_details"=>$banner_arr,"deals_of_day_details"=>$deal_arr,"product_top_offer"=>$top_offer_arr,"product_fifty_percent"=>$product_fifty_arr,"most_popular_product"=>$product_popular_arr);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			if (Lang::has($lang_file.'.API_HOMELIST_NOT_AVAILBLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_HOMELIST_NOT_AVAILBLE');
			}else{
				$msge = "Home Page List available!";
			}
		
			$encode = array("status"=>200,"message"=>$msge,"category_details"=>$category_arr,"banner_details"=>$banner_arr,"deals_of_day_details"=>$deal_arr,"Total_deal_end_time"=>$deal_end_time,"product_top_offer"=>$top_offer_arr,"product_fifty_percent"=>$product_fifty_arr,"most_popular_product"=>$product_popular_arr);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		 
	}  
	/* CATEGORY LIST */
	public function category_list()
	{
		$category_id = Input::get('category_id');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 

		/* validate selected language  */
		$validedLang = '';
		$lang_file = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$ssb_name_dynamic 	= 'ssb_name_'.$lang;
				$sb_name_dynamic 	= 'sb_name_'.$lang;
				$smc_name_dynamic 	= 'smc_name_'.$lang;
				$mc_name_dynamic 	= 'mc_name_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


		if($category_id ==""){
			$main_cat_details = MobileModel::get_main_category_details();
			$main_cat = array();
			if(count($main_cat_details)>0) {
				foreach($main_cat_details as $main){
					
					if($validedLang!='') {
						$main->mc_name = $main->$mc_name_dynamic;
					}

					$sec_main_cat_details = MobileModel::get_sec_main_category_details($main->mc_id);
					$sec_main_cat = array();
					if(count($sec_main_cat_details)>0) {
						foreach($sec_main_cat_details as $sec_main) {
							
							if($validedLang!='') {
								$sec_main->smc_name = $sec_main->$smc_name_dynamic;
							}

							$sub_cat_details = MobileModel::get_sub_category_details($main->mc_id,$sec_main->smc_id);
							$sub_category = array();
							if(count($sub_cat_details)>0) {
								foreach($sub_cat_details as $sub_cat){

									if($validedLang!='') {
										$sub_cat->sb_name = $sub_cat->$sb_name_dynamic;
									}

									$sub_sec_cat_details = MobileModel::get_sub_sec_category_details($main->mc_id,$sec_main->smc_id,$sub_cat->sb_id);
									
									$sub_sec_category = array();
									if(count($sub_sec_cat_details)>0) {
										foreach($sub_sec_cat_details as $sub_sec_cat) {

											if($validedLang!='') {
												$sub_sec_cat->ssb_name = $sub_sec_cat->$ssb_name_dynamic;
											}

											$sub_sec_category[] = array("level"=>3,"category_id"=>intval($sub_sec_cat->ssb_id),"category_name"=>ucfirst($sub_sec_cat->ssb_name),"category_image"=>"","category_status"=>$sub_sec_cat->ssb_status);
										}
									}
									$sub_cat_sc_img="";
									if($sub_cat->sc_img !="") {
										if(file_exists('public/assets/categoryimage/sub_category/'.$sub_cat->sc_img)){
											$sub_cat_sc_img = url('').'/public/assets/categoryimage/sub_category/'.$sub_cat->sc_img;
										}
									}
									$sub_category[] = array("level"=>2,"category_id"=>intval($sub_cat->sb_id),"category_name"=>ucfirst($sub_cat->sb_name),"category_image"=>$sub_cat_sc_img,"category_status"=>intval($sub_cat->sb_status),"sub_category_list"=>$sub_sec_category);
								}
							}
							$sec_main_cat[] = array("level"=>1,"category_id"=>intval($sec_main->smc_id),"category_name"=>ucfirst($sec_main->smc_name),"category_image"=>"","category_status"=>intval($sec_main->smc_status),"sub_category_list"=>$sub_category);
						}
					}
					$main_mc_img="";
					if($main->mc_img !="") {
						if(file_exists('public/assets/categoryimage/'.$main->mc_img)){
							$main_mc_img = url('').'/public/assets/categoryimage/'.$main->mc_img;
						}
					}
					$main_cat[] = array("level"=>0,"category_id"=>intval($main->mc_id),"category_name"=>ucfirst($main->mc_name),"category_image"=>$main_mc_img,"category_status"=>intval($main->mc_status),"sub_category_list"=>$sec_main_cat); 
				}

				if (Lang::has($lang_file.'.API_CATEGORIES_FOUND')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_CATEGORIES_FOUND');
				}else{
					$msge 	= "Categories Found!";
				}

				$encode = array("status"=>200,"message"=>$msge,"categories_list"=>$main_cat);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");	
			} else {
				if (Lang::has($lang_file.'.API_NO_CATEGORIES_FOUND')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_CATEGORIES_FOUND');
				}else{
					$msge 	= "No Categories Found!";
				}	
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");	
			}
			
			
		} else if($category_id !="" && $category_id !=0){
			$main_cat_details = MobileModel::get_main_category_details_byid($category_id);
			$main_cat = array();
			if(count($main_cat_details)>0) {
				foreach($main_cat_details as $main){

					if($validedLang!='') {
						$main->mc_name = $main->$mc_name_dynamic;
					}

					$sec_main_cat_details = MobileModel::get_sec_main_category_details($main->mc_id);
					$sec_main_cat = array();
					if(count($sec_main_cat_details)>0) {
						foreach($sec_main_cat_details as $sec_main) {

							if($validedLang!='') {
								$sec_main->smc_name = $sec_main->$smc_name_dynamic;
							}

							$sub_cat_details = MobileModel::get_sub_category_details($main->mc_id,$sec_main->smc_id);
							$sub_category = array();
							if(count($sub_cat_details)>0) {
								foreach($sub_cat_details as $sub_cat){

									if($validedLang!='') {
										$sub_cat->sb_name = $sub_cat->$sb_name_dynamic;
									}

									$sub_sec_cat_details = MobileModel::get_sub_sec_category_details($main->mc_id,$sec_main->smc_id,$sub_cat->sb_id);
									
									$sub_sec_category = array();
									if(count($sub_sec_cat_details)>0) {
										foreach($sub_sec_cat_details as $sub_sec_cat) {

											if($validedLang!='') {
												$sub_sec_cat->ssb_name = $sub_sec_cat->$ssb_name_dynamic;
											}

											$sub_sec_category[] = array("level"=>3,"category_id"=>intval($sub_sec_cat->ssb_id),"category_name"=>ucfirst($sub_sec_cat->ssb_name),"category_image"=>"","category_status"=>$sub_sec_cat->ssb_status);
										}
									}
									$sub_cat_sc_img="";
									if($sub_cat->sc_img !="") {
										if(file_exists('public/assets/categoryimage/sub_category/'.$sub_cat->sc_img)){
											$sub_cat_sc_img = url('').'/public/assets/categoryimage/sub_category/'.$sub_cat->sc_img;
										}
									}
									$sub_category[] = array("level"=>2,"category_id"=>intval($sub_cat->sb_id),"category_name"=>ucfirst($sub_cat->sb_name),"category_image"=>$sub_cat_sc_img,"category_status"=>intval($sub_cat->sb_status),"sub_category_list"=>$sub_sec_category);
								}
							}
							$sec_main_cat[] = array("level"=>1,"category_id"=>intval($sec_main->smc_id),"category_name"=>ucfirst($sec_main->smc_name),"category_image"=>"","category_status"=>intval($sec_main->smc_status),"sub_category_list"=>$sub_category);
						}
					}
					$main_mc_img="";
					if($main->mc_img !="") {
						if(file_exists('public/assets/categoryimage/'.$main->mc_img)){
							$main_mc_img = url('').'/public/assets/categoryimage/'.$main->mc_img;
						}
					}
					$main_cat[] = array("level"=>0,"category_id"=>intval($main->mc_id),"category_name"=>ucfirst($main->mc_name),"category_image"=>$main_mc_img,"category_status"=>intval($main->mc_status),"sub_category_list"=>$sec_main_cat);  
				}
				if (Lang::has($lang_file.'.API_CATEGORIES_FOUND')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_CATEGORIES_FOUND');
				}else{
					$msge 	= "Categories Found!";
				}
				$encode = array("status"=>200,"message"=>$msge,"categories_list"=>$main_cat);
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			} else {
				if (Lang::has($lang_file.'.API_NO_CATEGORIES_FOUND')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_CATEGORIES_FOUND');
				}else{
					$msge 	= "No Categories Found!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			}
		} else {
			if (Lang::has($lang_file.'.API_NO_CATEGORIES_FOUND')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_CATEGORIES_FOUND');
				}else{
					$msge 	= "No Categories Found!";
				}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		
	}
	/* PRODUCT LIST by Category */
	public function product_list_category()
	{
		$user_id = Input::get('user_id');
		$main_category_id = Input::get('main_category_id');
		$sec_category_id = Input::get('sec_category_id');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 

		/* validate selected language  */
		$validedLang = '';
		$lang_file = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
				$ssb_name_dynamic 	= 'ssb_name_'.$lang;
				$sb_name_dynamic 	= 'sb_name_'.$lang;
				$smc_name_dynamic 	= 'smc_name_'.$lang;
				$mc_name_dynamic 	= 'mc_name_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */
		
		if($main_category_id == "" || $sec_category_id =="") {
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);

			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} elseif($main_category_id == 0 ||  $sec_category_id== 0) {
			if (Lang::has($lang_file.'.API_INVALID_VALUE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_VALUE');
			}else{
				$msge = "Invalid value!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$top_offer_prd_by_category  = MobileModel::get_product_top_offer($main_category_id,$sec_category_id);
			$most_popular_product		= MobileModel::get_popular_product($main_category_id,$sec_category_id);	
			$main_cat_details 			= MobileModel::get_main_category_details_byid($main_category_id);
			$category_banner 			= MobileModel::get_category_banner($sec_category_id); 
			$category_ad 				= MobileModel::get_category_ad($sec_category_id); 
			$top_offer_arr = array();	
			if(count($top_offer_prd_by_category)>0) {
				foreach($top_offer_prd_by_category as $top){

					if($validedLang!='') {
						$top->pro_title = $top->$pro_title_dynamic;
					}


					$is_wishlist = false;
					if($user_id !="" && $user_id !=0){
						$get_wish_list = MobileModel::get_product_wishlist($top->pro_id,$user_id);
						if(count($get_wish_list)>0){
							$is_wishlist = true;
						}
					}
					$product_image="";
					if($top->pro_Img !="") {
						$product_img = explode('/**/', $top->pro_Img);
						if(file_exists('public/assets/product/'.$product_img[0])){
							$product_image = url('').'/public/assets/product/'.$product_img[0];
						}
					}
					$top_offer_arr[] = array("product_id"=>intval($top->pro_id),"product_title"=>ucfirst($top->pro_title),"product_price"=>floatval($top->pro_price),"product_discount_price"=>floatval($top->pro_disprice),"product_percentage"=>intval($top->pro_discount_percentage),"product_image"=>$product_image,"is_wishlist"=>$is_wishlist,"currency_symbol"=>$this->cur_symbol,"currency_code"=>$this->cur_code);
				}
			}
			/* Most Popular list */
			$product_popular_arr = array();
			if(count($most_popular_product)>0){
				foreach($most_popular_product as $pop){

					if($validedLang!='') {
						$pop->pro_title = $pop->$pro_title_dynamic;
					}

					$is_wishlist = false;
					if($user_id !="" && $user_id !=0){
						$get_wish_list = MobileModel::get_product_wishlist($pop->pro_id,$user_id);
						if(count($get_wish_list)>0){
							$is_wishlist = true;
						}
					}
					$product_image="";
					if($pop->pro_Img !="") {
						$product_img = explode('/**/', $pop->pro_Img);
						if(file_exists('public/assets/product/'.$product_img[0])){
							$product_image = url('').'/public/assets/product/'.$product_img[0];
						}
					}
					$product_popular_arr[] = array("product_id"=>intval($pop->pro_id),"product_title"=>ucfirst($pop->pro_title),"product_price"=>floatval($pop->pro_price),"product_discount_price"=>floatval($pop->pro_disprice),"product_image"=>$product_image,"is_wishlist"=>$is_wishlist,"currency_symbol"=>$this->cur_symbol,"currency_code"=>$this->cur_code);
				}
			}
			/* Sub Category List */
			$main_cat = array();
			if(count($main_cat_details)>0) {
				foreach($main_cat_details as $main){

					if($validedLang!='') {
						$main->mc_name = $main->$mc_name_dynamic;
					}


					$sec_main_cat_details = MobileModel::get_sec_main_category_details($main->mc_id);
					$sec_main_cat = array();
					if(count($sec_main_cat_details)>0) {
						foreach($sec_main_cat_details as $sec_main) {
							if($validedLang!='') {
								$sec_main->smc_name = $sec_main->$smc_name_dynamic;
							}
							
							$sub_cat_details = MobileModel::get_sub_category_details($main->mc_id,$sec_main->smc_id);
							$sub_category = array();
							if(count($sub_cat_details)>0) {
								foreach($sub_cat_details as $sub_cat){

									if($validedLang!='') {
										$sub_cat->sb_name = $sub_cat->$sb_name_dynamic;
									}



									$sub_sec_cat_details = MobileModel::get_sub_sec_category_details($main->mc_id,$sec_main->smc_id,$sub_cat->sb_id);
									
									$sub_sec_category = array();
									if(count($sub_sec_cat_details)>0) {
										foreach($sub_sec_cat_details as $sub_sec_cat) {

											if($validedLang!='') {
												$sub_sec_cat->ssb_name = $sub_sec_cat->$ssb_name_dynamic;
											}


											$sub_sec_category[] = array("sub_sec_category_id"=>$sub_sec_cat->ssb_id,"sub_sec_category_name"=>ucfirst($sub_sec_cat->ssb_name),"sub_sec_main_category_id"=>$sub_sec_cat->ssb_smc_id,"sub_sec_sec_category_id"=>$sub_sec_cat->mc_id,"sub_sec_sub_category_id"=>$sub_sec_cat->ssb_sb_id,"sub_sec_category_status"=>$sub_sec_cat->ssb_status);
										}
									}
									$sub_cat_sc_img="";
									if($sub_cat->sc_img !="") {
										if(file_exists('public/assets/categoryimage/sub_category/'.$sub_cat->sc_img)){
											$sub_cat_sc_img = url('').'/public/assets/categoryimage/sub_category/'.$sub_cat->sc_img;
										}
									}
									$sub_category[] = array("sub_category_id"=>$sub_cat->sb_id,"sub_category_name"=>ucfirst($sub_cat->sb_name),"sub_category_image"=>$sub_cat_sc_img,"sub_main_category_id"=>$sub_cat->mc_id,"sec_sub_main_category_id"=>$sub_cat->sb_smc_id,"sub_category_status"=>$sub_cat->sb_status,"sub_sec_category_list"=>$sub_sec_category);
								}
							}
							$sec_main_cat[] = array("sec_category_id"=>$sec_main->smc_id,"sec_category_name"=>ucfirst($sec_main->smc_name),"sec_main_category_id"=>$sec_main->smc_mc_id,"sec_category_status"=>$sec_main->smc_status,"sub_category_list"=>$sub_category);
						}
					}
					$main_mc_img="";
					if($main->mc_img !="") {
						if(file_exists('public/assets/categoryimage/'.$main->mc_img)){
							$main_mc_img = url('').'/assets/categoryimage/'.$main->mc_img;
						}
					}
					$main_cat[] = array("main_category_id"=>intval($main->mc_id),"main_category_name"=>ucfirst($main->mc_name),"main_category_image"=>$main_mc_img,"main_category_status"=>$main->mc_status,"sec_maincategory_list"=>$sec_main_cat); 
				}
			}
			
			/* Category Banner list */
			$banner_arr = array();
			if(count($category_banner)>0){
				foreach($category_banner as $ban){
					$ban_img ="";
					if($ban->cat_bn_img !="") {
						$ban_image = explode('/**/', $ban->cat_bn_img);
						foreach($ban_image as $img){
							if($img !=""){
								if(file_exists('public/assets/banner/'.$img)){
									$ban_img = url('').'/public/assets/banner/'.$img;	
									$banner_arr[] = array("banner_image"=>$ban_img);
								} 
							}
						}
						
					} 
					
				}
			}
			/* CAtegory Ad list */
			$ad_arr = array();
			if(count($category_ad)>0){
				foreach($category_ad as $ad){
					$ad_img ="";
					if($ad->cat_ad_img !="") {
						$ad_image = explode('/**/', $ad->cat_ad_img);
						foreach($ad_image as $adimg){
							if($adimg !=""){
								if(file_exists('public/assets/advertisement/'.$adimg)){
									$ad_img = url('').'/public/assets/advertisement/'.$adimg;	
									$ad_arr[] = array("ad_image"=>$ad_img);
								} 
							}
						}
					} 
				}
			}

			if( (count($top_offer_prd_by_category)==0) && (count($most_popular_product)==0) && (count($main_cat)==0) && (count($category_banner)==0) && (count($category_ad)==0)){
				if (Lang::has($lang_file.'.API_NO_LISTING_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_LISTING_AVAILABLE');
				}else{
					$msge = "No Listings available";
				}
				$encode = array("status"=>400,"message"=>$msge,"banner_details"=>$banner_arr,"ad_details"=>$ad_arr,"categories_list"=>$main_cat,"product_top_offer"=>$top_offer_arr,"most_popular_product"=>$product_popular_arr);
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			} else {
				if (Lang::has($lang_file.'.API_PRODUCT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_PRODUCT_AVAILABLE');
				}else{
					$msge = "Product available";
				}
				
				$encode = array("status"=>200,"message"=>$msge,"banner_details"=>$banner_arr,"ad_details"=>$ad_arr,"categories_list"=>$main_cat,"product_top_offer"=>$top_offer_arr,"most_popular_product"=>$product_popular_arr);
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			}
		}
	}

	/* PRODUCT SEARCH BY FILTER */
	public function product_list_filter()
	{
 
		$page_no = Input::get('page_no');
		$main_category_id = Input::get('main_category_id');
		$sec_category_id = Input::get('sec_category_id');
		$sub_category_id = Input::get('sub_category_id');
		$sub_sec_category_id = Input::get('sub_sec_category_id');
		$price_min = Input::get('price_min');
		$price_max = Input::get('price_max');
		$discount = Input::get('discount');
		$availability = Input::get('availability');
		$sort_order_by = Input::get('sort_order_by');
		$user_id = Input::get('user_id');
		$title = Input::get('title');
  
																										  

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 

		/* validate selected language  */
		$validedLang	= '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		if($lang == "") {
   
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
				
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


		
		$product_listing = MobileModel::get_all_product_listing($page_no,$main_category_id,$sec_category_id,$sub_category_id,$sub_sec_category_id,$price_min,$price_max,$discount,$availability,$sort_order_by,$title);


		$product_popular_arr = array();
		if(count($product_listing)>0){
			foreach($product_listing as $p){

				if($validedLang!='') {
					$p->pro_title = $p->$pro_title_dynamic;
				}


				$is_wishlist = false;
				if($user_id !="" && $user_id !=0){
					$get_wish_list = MobileModel::get_product_wishlist($p->pro_id,$user_id);
					if(count($get_wish_list)>0){
						$is_wishlist = true;
					}
				}
				
				$product_image="";
				if($availability !="" && $availability==1){
					if($p->pro_Img !="") {
						$product_img = explode('/**/', $p->pro_Img);
						if(file_exists('public/assets/product/'.$product_img[0])){
							$product_image = url('').'/public/assets/product/'.$product_img[0];
						}
					}
					$product_popular_arr[] = array("product_id"=>intval($p->pro_id),"product_title"=>ucfirst($p->pro_title),"product_price"=>floatval($p->pro_price),"product_discount_price"=>floatval($p->pro_disprice),"product_percentage"=>intval($p->pro_discount_percentage),"product_image"=>$product_image,'pro_no_of_purchase'=>$p->pro_no_of_purchase,'pro_qty'=>$p->pro_qty,"is_wishlist"=>$is_wishlist,"currency_symbol"=>$this->cur_symbol,"currency_code"=>$this->cur_code,"hitcount"=>intval($p->hit_count));
				} else {
					if($p->pro_no_of_purchase < $p->pro_qty) {
						if($p->pro_Img !="") {
							$product_img = explode('/**/', $p->pro_Img);
							if(file_exists('public/assets/product/'.$product_img[0])){
								$product_image = url('').'/public/assets/product/'.$product_img[0];
							}
						}
						$product_popular_arr[] = array("product_id"=>intval($p->pro_id),"product_title"=>ucfirst($p->pro_title),"product_price"=>floatval($p->pro_price),"product_discount_price"=>floatval($p->pro_disprice),"product_percentage"=>intval($p->pro_discount_percentage),"product_image"=>$product_image,'pro_no_of_purchase'=>$p->pro_no_of_purchase,'pro_qty'=>$p->pro_qty,"is_wishlist"=>$is_wishlist,"currency_symbol"=>$this->cur_symbol,"currency_code"=>$this->cur_code,"hitcount"=>intval($p->hit_count));
					}
				}
				
			}
			if (Lang::has($lang_file.'.API_PRODUCT_AVAILABLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PRODUCT_AVAILABLE');
			}else{
				$msge = "Product available";
			}

			$encode = array("status"=>200,"message"=>$msge,"product_list"=>$product_popular_arr);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}else{
   
			if (Lang::has($lang_file.'.API_NOT_PRODUCT_AVAILABLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_NOT_PRODUCT_AVAILABLE');
			}else{
				$msge = "Product Not available";
			}
			$encode = array("status"=>200,"message"=>$msge,"product_list"=>$product_popular_arr);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		
	}
	/* PRODUCT ADD TO WISH */
	public function addtowish()
	{
		$user_id = Input::get('user_id');
		$product_id = Input::get('product_id');
		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		//$encode = array("status"=>400,"message"=>"Language :".$lang.'|'.$user_id);
		//return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			
		/* validate selected language  */
		$validedLang	= '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
				
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		if($user_id == "" || $product_id =="") {
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} elseif($user_id == 0 ||  $product_id== 0) {
			if (Lang::has($lang_file.'.API_INVALID_VALUE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_VALUE');
			}else{
				$msge = "Invalid value!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$get_user_details = MobileModel::get_user_details($user_id);
			$get_product_exists = MobileModel::get_product_exists($product_id);
			if((count($get_user_details)==0) || (count($get_product_exists)==0)) {
				if (Lang::has($lang_file.'.API_INVALID_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_DATA');
				}else{
					$msge = "Invalid data!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			}
			$get_wish_list = MobileModel::get_product_wishlist($product_id,$user_id);
			if(count($get_wish_list)==0) {
				// Insert wishlist
				$entry  = array(
		            'ws_pro_id' => Input::get('product_id'),
		            'ws_cus_id' => Input::get('user_id')
	       		);
	        	$wish = MobileModel::insert_wish($entry);

	        	if (Lang::has($lang_file.'.API_WISHLIST_ADDED_SUCCESSFULLY')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_WISHLIST_ADDED_SUCCESSFULLY');
				}else{
					$msge = "Wish list added successfully!";
				}
	        	$encode = array("status"=>200,"message"=>$msge);
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			} else {
				// Delete wishlist
				$wish = MobileModel::delete_wish_list($product_id,$user_id);
				if (Lang::has($lang_file.'.API_WISHLIST_DELETED_SUCCESSFULLY')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_WISHLIST_DELETED_SUCCESSFULLY');
				}else{
					$msge = "Wish list deleted successfully!";
				}
				$encode = array("status"=>200,"message"=>$msge);
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			}
		}
	}
	/* PRODUCT DETAILS */
	public function product_details()
	{
		$user_id = Input::get('user_id');
		$product_id = Input::get('product_id');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file   = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$sp_name_dynamic 	= 'sp_name_'.$lang;
				$spg_name_dynamic 	= 'spg_name_'.$lang;
				$stor_name_dynamic 	= 'stor_name_'.$lang;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
				$pro_desc_dynamic 	= 'pro_desc_'.$lang;
				$pro_mkeywords_dynamic 	= 'pro_mkeywords_'.$lang;
				$pro_mdesc_dynamic 	= 'pro_mdesc_'.$lang;

				$ssb_name_dynamic 	= 'ssb_name_'.$lang;
				$sb_name_dynamic 	= 'sb_name_'.$lang;
				$smc_name_dynamic 	= 'smc_name_'.$lang;
				$mc_name_dynamic 	= 'mc_name_'.$lang;

			}else{
				if($lang!="en" && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */
		
		if($product_id =="") {
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} elseif($product_id== 0) {
			if (Lang::has($lang_file.'.API_INVALID_VALUE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_VALUE');
			}else{
				$msge = "Invalid value!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$get_product_details = MobileModel::get_product_details($product_id);
			if(count($get_product_details)>0){
				foreach($get_product_details as $p){

					if($validedLang!=''){
						$p->stor_name = $p->$stor_name_dynamic;
						$p->pro_title = $p->$pro_title_dynamic;
						$p->pro_desc = $p->$pro_desc_dynamic;

						$p->ssb_name = $p->$ssb_name_dynamic;
						$p->sb_name = $p->$sb_name_dynamic;
						$p->smc_name = $p->$smc_name_dynamic;
						$p->mc_name = $p->$mc_name_dynamic;
						$p->pro_mkeywords = $p->$pro_mkeywords_dynamic;
						$p->pro_mdesc = $p->$pro_mdesc_dynamic;
					}

					/* Wish list starts */
					$is_wishlist = false;
					if($user_id !="" && $user_id !=0){
						$get_wish_list = MobileModel::get_product_wishlist($p->pro_id,$user_id);
						if(count($get_wish_list)>0){
							$is_wishlist = true;
						}
					}
					/* Wishlist Ends */
					
					/* size starts */
					$siz_arr = array();
					$size_details = MobileModel::get_size_details($p->pro_id);
	 
					if(count($size_details)>0){
						foreach($size_details as $siz){
							if($siz->ps_si_id !="") {	$ps_si_id = $siz->ps_si_id;} else { $ps_si_id = ""; }
							if($siz->si_name !="") {	$si_name = $siz->si_name;} else { $si_name = ""; }
							if($siz->ps_id !="") {	$ps_id = $siz->ps_id;} else { $ps_id = ""; }
							$siz_arr[] = array("size_id"=>intval($ps_si_id),"size_name"=>$si_name,"product_size_id"=>intval($ps_id));
						}
					}
	 
					/* size ends */
					/* color starts */
					$color_arr = array();
					$color_details = MobileModel::get_color_details($p->pro_id);
	 
					if(count($color_details)>0){
						foreach($color_details as $col){
							if($col->pc_co_id !="") {	$pc_co_id = $col->pc_co_id;} else { $pc_co_id = ""; }
							if($col->co_name !="") {	$co_name= $col->co_name;} else { $co_name= ""; }
							if($col->co_code !="") {	$cf_code = $col->co_code;} else { $cf_code = ""; }
							if($col->pc_id !="") {	$pc_id = $col->pc_id;} else { $pc_id = ""; }
							$color_arr[] = array("color_id"=>intval($pc_co_id),"color_name"=>ucfirst($co_name),"color_code"=>$cf_code,"product_color_id"=>intval($pc_id));
						}
					}
					/* color ends */
					/* specifications starts */
					$spec_arr = array();
					if($p->pro_isspec ==1){
						$spec_details = MobileModel::get_specification_detials($p->pro_id);
						if(count($spec_details)>0){
							foreach($spec_details as $sp) {

								if($validedLang!='') {
									$sp->sp_name 	= $sp->$sp_name_dynamic;
									$sp->spg_name 	= $sp->$spg_name_dynamic;
								}

								if($sp->spg_id !="") {	$spg_id = $sp->spg_id;} else { $spg_id = ""; }
								if($sp->spg_name !="") { $spg_name = $sp->spg_name;} else { $spg_name = ""; }
								if($sp->sp_id !="") {	$sp_id = $sp->sp_id;} else { $sp_id = ""; }
								if($sp->sp_name !="") {	$sp_name = $sp->sp_name;} else { $sp_name = ""; }
								if($sp->spc_id !="") {	$spc_id = $sp->spc_id;} else { $spc_id = ""; }
								if($sp->spc_value !="") {	$spc_value = $sp->spc_value;} else { $spc_value = ""; }
								$spec_arr[] = array("spec_grp_id"=>intval($spg_id),"spec_grp_name"=>ucfirst($spg_name),"spec_id"=>intval($sp_id),"spec_name"=>ucfirst($sp_name),"spec_value_id"=>intval($spc_id),"spec_value"=>$spc_value);
							}
						}
					} 
					
					/* specifications ends */
					
					/* Review starts */
					$review = array();
					$review_details  = MobileModel::get_product_reviews($p->pro_id);
					if(count($review_details)>0) {
						foreach($review_details as $r) {

							if($r->cus_name !="") {	$cus_name = $r->cus_name;} else { $cus_name = ""; }
							if($r->title !="") {	$title = $r->title;} else { $title = ""; }
							if($r->comments !="") {	$comments = $r->comments;} else { $comments = ""; }
							if($r->cus_pic !="") {
								if(file_exists('public/assets/profileimage/'.$r->cus_pic)){
									$user_img = url('').'/assets/profileimage/'.$r->cus_pic;	
								} else {
									$user_img =  "/themes/images/products/man.png";
								}
							} else {
								$user_img =  url('')."/themes/images/products/man.png";
							}
							$review[] = array("review_title"=>ucfirst($title),"review_comments"=>ucfirst($comments),"ratings"=>$r->ratings,"review_date"=>$r->review_date,"user_id"=>intval($r->customer_id),"user_name"=>ucfirst($cus_name),"user_img"=>$user_img);
						}
					}
					/* Review ends */
					
					/* store details starts */
					$stor_img="";
					if($p->stor_img !="") {
						if(file_exists('public/assets/storeimage/'.$p->stor_img)){
							$stor_img = url('').'/public/assets/storeimage/'.$p->stor_img;
						}
					}
					$store_arr[]  = array("store_id"=>intval($p->stor_id),"store_name"=>ucfirst($p->stor_name),"store_phone"=>$p->stor_phone,"store_address1"=>ucfirst($p->stor_address1),"store_address2"=>ucfirst($p->stor_address2),"store_zipcode"=>$p->stor_zipcode,"store_website"=>$p->stor_website,"store_latitude"=>$p->stor_latitude,"store_longitude"=>$p->stor_longitude,"store_img"=>$stor_img,"store_status"=>$p->stor_status,"store_phone"=>$p->stor_phone);
					/* store details ends */
					/* Related products starts */
					$rel_pro_arr = array();
					if($p->pro_mc_id !=""){
						$get_related_product  = MobileModel::get_related_product($p->pro_id,$p->pro_mc_id);
						if(count($get_related_product)>0){
							foreach($get_related_product as $rp) {

								if($validedLang!=''){
									$rp->pro_title = $rp->$pro_title_dynamic;
								}

								$rel_product_image="";
								if($rp->pro_Img !="") {
									$product_img = explode('/**/', $rp->pro_Img);
									if(file_exists('public/assets/product/'.$product_img[0])){
										$rel_product_image = url('').'/public/assets/product/'.$product_img[0];
									}
								}
								$rel_pro_arr[] = array("product_id"=>intval($rp->pro_id),"product_title"=>ucfirst($rp->pro_title),"product_price"=>floatval($rp->pro_price),"product_discount_price"=>floatval($rp->pro_disprice),"product_percentage"=>intval($rp->pro_discount_percentage),"product_image"=>$rel_product_image,"currency_symbol"=>$this->cur_symbol,"currency_code"=>$this->cur_code);
							}
						}
					} 
					
					/* specifications ends */
					
					
					if($p->pro_no_of_purchase < $p->pro_qty) 
					{
						$status = "Not sold";	 
					}
					else
					{
						$status = "Sold";	 
					}

					$product_saving_price = $p->pro_price - $p->pro_disprice;
					$product_discount_percentage = round(($product_saving_price/ $p->pro_price)*100);
					$product_img = explode('/**/', $p->pro_Img);
					$prd_img = array();
					if($product_img !=""){
						foreach($product_img as $img) {
							if($img !=""){
								$prd_img[] = array('images'=>url('').'/public/assets/product/'.$img);
							}
						}
					}
					if($p->sb_name =="") {	$p->sb_name =""; }
					if($p->ssb_name =="") {	$p->ssb_name =""; }
					
					$productlist = array("product_id"=>intval($p->pro_id),"product_title"=>ucfirst(strip_tags($p->pro_title)),"product_description"=>$p->pro_desc,"product_discount_price"=>floatval($p->pro_disprice),"product_discount_percentage"=>intval($p->pro_discount_percentage),"product_original_price"=>floatval($p->pro_price),"currency_symbol"=>$this->cur_symbol,"currency_code"=>$this->cur_code,"product_quantity"=>intval($p->pro_qty),"product_purchase_qty"=>intval($p->pro_no_of_purchase),"product_status"=>$status,"product_currency_code"=>$this->cur_code,"product_currency_symbol"=>$this->cur_symbol,"product_merchant_id"=>intval($p->pro_mr_id),"product_shop_id"=>intval($p->pro_sh_id),"product_category_name"=>ucfirst($p->mc_name),"product_category_id"=>intval($p->pro_mc_id),"product_main_category_name"=>ucfirst($p->smc_name),"product_main_category_id"=>intval($p->pro_smc_id),"product_sub_category_name"=>ucfirst($p->sb_name),"product_sub_category_id"=>intval($p->pro_sb_id),"product_second_sub_category_name"=>ucfirst($p->ssb_name),"product_second_sub_category_id"=>intval($p->pro_ssb_id),"product_meta_keyword"=>ucfirst($p->pro_mkeywords),"product_meta_desc"=>ucfirst($p->pro_mdesc),"product_image_count"=>$p->pro_image_count,"product_delivery"=>$p->pro_delivery,"product_block_unblock_status"=>$p->pro_status,"product_sold_status"=>$p->sold_status,"product_including_tax"=>floatval($p->pro_inctax),"product_ship_amt"=>floatval($p->pro_shippamt),"product_created_date"=>$p->product_added_date,"is_wishlist"=>$is_wishlist,"product_image"=>$prd_img,"product_size_details"=>$siz_arr,"product_color_details"=>$color_arr,"product_specification_details"=>$spec_arr,"store_details"=>$store_arr,"product_review"=>$review,"related_products"=>$rel_pro_arr);
				}
			if (Lang::has($lang_file.'.API_PRODUCT_AVAILABLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PRODUCT_AVAILABLE');
			}else{
				$msge = "Product available";
			}

			$encode = array("status"=>200,"message"=>$msge,"product_details"=>$productlist);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			} else {
				if (Lang::has($lang_file.'.API_INVALID_VALUE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_VALUE');
			}else{
				$msge = "Invalid value!";
			}
				$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			}
		}
	}
	/* ADD TO CART */
	public function add_cart()
	{
		$productid = Input::get('product_id');
		$product_size_id = Input::get('product_size_id');
		$product_color_id = Input::get('product_color_id');
		$quantity = Input::get('quantity');
		$user_id = Input::get('user_id');


		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file = $this->lang_file;

		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */
		
		$cart_type = 1; // for products
		if($productid =="" || $user_id =="" || $quantity =="" || $quantity ==0){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u) {
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$check_cart_details = MobileModel::get_product_cart_details($productid,$user_id,$quantity,$cart_type,$product_size_id,$product_color_id);
			if(count($check_cart_details)>0) {

				if (Lang::has($lang_file.'.API_ALREADY_IN_CART')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ALREADY_IN_CART');
				}else{
					$msge = "Already in cart!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} 
			$siz_arr = array();
			$color_arr = array();
			$tax_amt = $Qtybased_ship_amt = $cart_total = 0;
			$product_details = MobileModel::get_product_details($productid);
			if(count($product_details)>0){
				foreach($product_details as $p){

					if($validedLang!='') {
						$p->pro_title = $p->$pro_title_dynamic;
					}


					if($product_size_id !="") {
						$size_details = MobileModel::get_size_details_by_id($p->pro_id,$product_size_id);
						if(count($size_details)>0){
							foreach($size_details as $siz){
								$siz_arr[] = array("size_id"=>$siz->ps_si_id,"size_name"=>$siz->si_name,"product_size_id"=>$siz->ps_id);
							}
						} else {
							if (Lang::has($lang_file.'.API_SIZE_NOT_AVAILABLE')!= '') 
							{ 
								$msge 	=  trans($lang_file.'.API_SIZE_NOT_AVAILABLE');
							}else{
								$msge = "Size not available!";
							}

							$encode = array("status"=>400,"message"=>$msge);
							return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
						}
					}
					/* color starts */
					if($product_color_id !=""){
						$color_details = MobileModel::get_color_details_by_id($p->pro_id,$product_color_id);
						if(count($color_details)>0){
							foreach($color_details as $col){
								$color_arr[] = array("color_id"=>$col->pc_co_id,"color_name"=>$col->co_name,"color_code"=>$col->co_code,"product_color_id"=>$col->pc_id);
							}
						} else {
							//echo json_encode(array("status"=>400,"message"=>"Color not available!"));
							if (Lang::has($lang_file.'.API_COLOR_NOT_AVAILABLE')!= '') 
							{ 
								$msge 	=  trans($lang_file.'.API_COLOR_NOT_AVAILABLE');
							}else{
								$msge = "Color not available!";
							}
							$encode = array("status"=>400,"message"=>$msge);
							return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
						}
					}
					/* color ends */
					 $entry = array(
						'cart_product_id' => $p->pro_id,
						'cart_product_qty' => $quantity,
						'cart_type' => 1,
						'cart_pro_siz_id' => $product_size_id,
						'cart_pro_col_id' => $product_color_id,
						'cart_user_id' => $userID
					);
            
					$add_to_cart_id = MobileModel::add_to_cart_product($entry);
					
					/*$total = ($p->pro_disprice*$quantity)+$p->pro_inctax+$p->pro_shippamt; */
					$sub_total = ($p->pro_disprice*$quantity);
					$Qtybased_ship_amt = $p->pro_shippamt *$quantity;
					$tax_amt = round($sub_total * ($p->pro_inctax/100),2);
					$total = $sub_total+$tax_amt+$Qtybased_ship_amt ;
					$product_image="";
					if($p->pro_Img !="") {
						$product_img = explode('/**/', $p->pro_Img);
						if(file_exists('public/assets/product/'.$product_img[0])){
							$product_image = url('').'/public/assets/product/'.$product_img[0];
						}
					}
					$avail_qty = 0;
					if($p->pro_qty >= $p->pro_no_of_purchase) {
						$avail_qty = $p->pro_qty - $p->pro_no_of_purchase;
					}
					$cart_details[] = array("cart_id"=>intval($add_to_cart_id),"cart_product_id"=>intval($p->pro_id),"cart_user_id"=>intval($userID),"cart_title"=>ucfirst($p->pro_title),"cart_quantity"=>intval($quantity),"cart_image"=>$product_image,"product_purchase_qty"=>$p->pro_no_of_purchase,"product_quantity"=>$p->pro_qty,"product_available_qty"=>$avail_qty,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->pro_disprice),"cart_shipping_price"=>floatval($Qtybased_ship_amt),"cart_tax_price"=>floatval($tax_amt),"cart_total"=>floatval($total),"cart_size_details"=>$siz_arr,"cart_color_details"=>$color_arr);
					$cart_type =1;
					$get_cart_details = MobileModel::get_product_cart_by_userid($userID,$cart_type);
					$cart_total =count($get_cart_details);
					if (Lang::has($lang_file.'.API_CART_ADDED_SUCCESSFULLY')!= '') 
					{ 
						$msge 	=  trans($lang_file.'.API_CART_ADDED_SUCCESSFULLY');
					}else{
						$msge = "Cart added successfully!";
					}
					$encode = array("status"=>200,"message"=>$msge,"cart_count"=>$cart_total,"cart_details"=>$cart_details);
					return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
				}
			} else 
			{
				if (Lang::has($lang_file.'.API_ORDER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_NOT_AVAILABLE');
				}else{
					$msge = "Order not available!";
				}
				
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
		
	}
	/* UPDATE TO CART */
	public function update_cart()
	{
		$cart_id = Input::get('cart_id');
		$productid = Input::get('product_id');
		$product_size_id = Input::get('product_size_id');
		$product_color_id = Input::get('product_color_id');
		$quantity = Input::get('quantity');
		$user_id = Input::get('user_id');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang	= '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */
		
		$cart_type = 1; // for products
		if($productid =="" || $user_id =="" || $quantity =="" || $quantity ==0){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u) {
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$check_cart_details = MobileModel::get_product_cart_detailsbyid($cart_id,$productid,$user_id,$quantity,$cart_type,$product_size_id,$product_color_id);
			//dd(DB::getQueryLog());
			if(count($check_cart_details)==0) {
				if (Lang::has($lang_file.'.API_CART_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_CART_NOT_AVAILABLE');
				}else{
					$msge = "Cart not available!";
				}
				
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} 
			$siz_arr = array();
			$color_arr = array();
			$product_details = MobileModel::get_product_details($productid);
			$sub_total = $tax_amt = $Qtybased_ship_amt = $cart_total =0;
			if(count($product_details)>0){
				foreach($product_details as $p){

					if($validedLang!='') {
						$p->pro_title = $p->$pro_title_dynamic;
					}


					if($product_size_id !="") {
						$size_details = MobileModel::get_size_details_by_id($p->pro_id,$product_size_id);
						if(count($size_details)>0){
						} else {
							if (Lang::has($lang_file.'.API_SIZE_NOT_AVAILABLE')!= '') 
							{ 
								$msge 	=  trans($lang_file.'.API_SIZE_NOT_AVAILABLE');
							}else{
								$msge = "Size not available!";
							}
							$encode = array("status"=>400,"message"=>$msge);
							return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
						}
					}
					/* color starts */
					if($product_color_id !=""){
						$color_details = MobileModel::get_color_details_by_id($p->pro_id,$product_color_id);
						if(count($color_details)>0){
						} else {
							if (Lang::has($lang_file.'.API_COLOR_NOT_AVAILABLE')!= '') 
							{ 
								$msge 	=  trans($lang_file.'.API_COLOR_NOT_AVAILABLE');
							}else{
								$msge = "Color not available!";
							}
							$encode = array("status"=>400,"message"=>$msge);
							return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
						}
					}
					/* color ends */
					
					 $entry = array(
						'cart_product_qty' => $quantity,
						'cart_type' => 1,
						'cart_pro_siz_id' => $product_size_id,
						'cart_pro_col_id' => $product_color_id,
						'cart_user_id' => $userID
					);
            
					$update_to_cart_id = MobileModel::update_to_cart_product($cart_id,$entry);
					
					if($product_size_id !="") {
						$size_details = MobileModel::get_size_details_by_id($p->pro_id,$product_size_id);
						if(count($size_details)>0){
							foreach($size_details as $siz){
								$siz_arr[] = array("size_id"=>$siz->ps_si_id,"size_name"=>$siz->si_name,"product_size_id"=>$siz->ps_id);
							}
						} 
					}
					/* color starts */
					if($product_color_id !=""){
						$color_details = MobileModel::get_color_details_by_id($p->pro_id,$product_color_id);
						if(count($color_details)>0){
							foreach($color_details as $col){
								$color_arr[] = array("color_id"=>$col->pc_co_id,"color_name"=>ucfirst($col->co_name),"color_code"=>$col->co_code,"product_color_id"=>$col->pc_id);
							}
						} 
					}
					/* color ends */
					
					$sub_total = ($p->pro_disprice*$quantity);
					//$tax_amt = ($subtotal + $p->pro_shippamt)*($p->pro_inctax/100);
					$tax_amt = round($sub_total * ($p->pro_inctax/100),2);
					$Qtybased_ship_amt = $p->pro_shippamt *$quantity ;
					$total = $sub_total+$tax_amt+$Qtybased_ship_amt;
					$product_image="";
					if($p->pro_Img !="") {
						$product_img = explode('/**/', $p->pro_Img);
						if(file_exists('public/assets/product/'.$product_img[0])){
							$product_image = url('').'/public/assets/product/'.$product_img[0];
						}
					}
					$avail_qty = 0;
					if($p->pro_qty >= $p->pro_no_of_purchase) {
						$avail_qty = $p->pro_qty - $p->pro_no_of_purchase;
					}
					$cart_details[] = array("cart_id"=>intval($cart_id),"cart_product_id"=>$p->pro_id,"cart_user_id"=>intval($userID),"cart_title"=>ucfirst($p->pro_title),"cart_quantity"=>intval($quantity),"cart_image"=>$product_image,"product_purchase_qty"=>$p->pro_no_of_purchase,"product_quantity"=>$p->pro_qty,"product_available_qty"=>$avail_qty,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->pro_disprice),"cart_shipping_price"=>floatval($Qtybased_ship_amt),"cart_tax_price"=>floatval($tax_amt),"cart_total"=>floatval($total),"cart_size_details"=>$siz_arr,"cart_color_details"=>$color_arr);
					$cart_type =1;
					$get_cart_details = MobileModel::get_product_cart_by_userid($userID,$cart_type);
					$cart_total =count($get_cart_details);
					if (Lang::has($lang_file.'.API_CART_UPDATED_SUCCESSFULLY')!= '') 
					{ 
						$msge 	=  trans($lang_file.'.API_CART_UPDATED_SUCCESSFULLY');
					}else{
						$msge = "Cart updated successfully!";
					}
					$encode = array("status"=>200,"message"=>$msge,"cart_count"=>$cart_total,"cart_details"=>$cart_details);
					return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
				}
			} else {
				if (Lang::has($lang_file.'.API_ORDER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_NOT_AVAILABLE');
				}else{
					$msge = "Order not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}
	/* LIST ALL THE PRODUCT IN CART */
	public function cart_list()
	{
		$user_id = Input::get('user_id');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */
		
		$cart_type = 1; // for products
		if($user_id =="" || $user_id ==0){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u) {
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$get_cart_details = MobileModel::get_product_cart_by_userid($user_id,$cart_type);
			$cart_total =count($get_cart_details);
			//dd(DB::getQueryLog());
			$cart_details = array();
			$tax_amt = $Qtybased_ship_amt = 0;						 
			$cart_sub_total =0;
			$cart_grand_shipping =0;
			$cart_grand_tax =0;
			$cart_grand_total =0;
			if(count($get_cart_details)>0) {
				foreach($get_cart_details as $cart){
					$siz_arr = array();
					$color_arr = array();
					$product_details = MobileModel::get_product_details($cart->cart_product_id);
					if(count($product_details)>0){
						foreach($product_details as $p){

							if($validedLang!='') {
								$p->pro_title = $p->$pro_title_dynamic;
							}


							if($cart->cart_pro_siz_id !=0) {
								$size_details = MobileModel::get_size_details_by_id($p->pro_id,$cart->cart_pro_siz_id);
								if(count($size_details)>0){
									foreach($size_details as $siz){
										if($siz->si_name !=""){ $si_name = $siz->si_name; }else{$si_name ="";}
										if($siz->ps_id !=""){ $ps_id = $siz->ps_id; }else{$ps_id ="";}
										if($siz->ps_si_id !=""){ $ps_si_id = $siz->ps_si_id; }else{$ps_si_id ="";}
										$siz_arr[] = array("size_id"=>intval($ps_si_id),"size_name"=>$si_name,"product_size_id"=>intval($ps_id));
									}
								} /* else {
									echo json_encode(array("status"=>400,"message"=>"Size not available!"));
									exit;
								} */
							}
							/* color starts */
							if($cart->cart_pro_col_id !=""){
								$color_details = MobileModel::get_color_details_by_id($p->pro_id,$cart->cart_pro_col_id);
								if(count($color_details)>0){
									foreach($color_details as $col){
										if($col->pc_co_id !=""){ $pc_co_id = $col->pc_co_id; }else{$pc_co_id ="";}
										if($col->co_name!=""){ $co_name= $col->co_name; }else{$co_name="";}
										if($col->co_code !=""){ $cf_code = $col->co_code; }else{$cf_code ="";}
										if($col->pc_id !=""){ $pc_id = $col->pc_id; }else{$pc_id ="";}
										$color_arr[] = array("color_id"=>intval($pc_co_id),"color_name"=>ucfirst($co_name),"color_code"=>$cf_code,"product_color_id"=>intval($pc_id));
									}
								} 
								/* else {
									echo json_encode(array("status"=>400,"message"=>"Color not available!"));
									exit;
								} */
							}
							/* color ends */

							//$tax_amt =((($p->pro_disprice*$cart->cart_product_qty)+$p->pro_shippamt)*($p->pro_inctax/100));
							$tax_amt =round((($p->pro_disprice*$cart->cart_product_qty))*($p->pro_inctax/100),2);
							//$total = ($p->pro_disprice*$cart->cart_product_qty)+$p->pro_shippamt+$p->pro_inctax;
							$Qtybased_ship_amt = $p->pro_shippamt *$cart->cart_product_qty ;
							$total = ($p->pro_disprice*$cart->cart_product_qty)+$Qtybased_ship_amt+ $tax_amt;
							
							$product_image="";
							if($p->pro_Img !="") {
								$product_img = explode('/**/', $p->pro_Img);
								if(file_exists('public/assets/product/'.$product_img[0])){
									$product_image = url('').'/public/assets/product/'.$product_img[0];
								}
							}
							if($cart->cart_product_qty !=""){ $cart_product_qty = $cart->cart_product_qty; }else{$cart_product_qty ="";}
							$cart_sub_total += $p->pro_disprice*$cart->cart_product_qty;
							$cart_grand_total += $total;
							$cart_grand_shipping += $Qtybased_ship_amt;
							//$cart_grand_tax += $p->pro_inctax;
							$cart_grand_tax += $tax_amt;	   
							$avail_qty = 0;
							if($p->pro_qty >= $p->pro_no_of_purchase) {
								$avail_qty = $p->pro_qty - $p->pro_no_of_purchase;
							}
							
							$cart_details[] = array("cart_id"=>intval($cart->cart_id),"cart_product_id"=>intval($p->pro_id),"cart_user_id"=>intval($userID),"cart_title"=>ucfirst($p->pro_title),"cart_image"=>$product_image,"product_purchase_qty"=>$p->pro_no_of_purchase,"product_quantity"=>$p->pro_qty,"product_available_qty"=>$avail_qty,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_quantity"=>intval($cart_product_qty),"cart_price"=>floatval($p->pro_disprice),"cart_shipping_price"=>floatval($Qtybased_ship_amt),"cart_tax_price"=>floatval($tax_amt),"cart_total"=>floatval($total),"cart_size_details"=>$siz_arr,"cart_color_details"=>$color_arr);
						}
					}
				}
				if (Lang::has($lang_file.'.API_CART_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_CART_AVAILABLE');
				}else{
					$msge = "Cart available!";
				}		
					$encode = array("status"=>200,"message"=>$msge,"cart_count"=>$cart_total,"cart_sub_total"=>$cart_sub_total,"cart_grand_shipping"=>$cart_grand_shipping,"cart_grand_tax"=>$cart_grand_tax,"cart_grand_total"=>$cart_grand_total,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_details"=>$cart_details);
					return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");			
			} else {
				if (Lang::has($lang_file.'.API_NO_DATA_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_DATA_AVAILABLE');
				}else{
					$msge = "No data available!";
				}	
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} 
		}
	}
	/* REMOVE FROM CART PRODUCT */
	public function remove_cart_product()
	{
		$cart_id = Input::get('cart_id');
		$cart_type = 1; // for products

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		 
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		if($cart_id =="" || $cart_id ==0){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			$cart_details = MobileModel::get_cart_details_by_id($cart_id,$cart_type);	
			if(count($cart_details)>0) {
				foreach($cart_details as $c){
					$delete_cart = MobileModel::delete_cart_by_id($c->cart_id,$cart_type);
					if($delete_cart) {
						if (Lang::has($lang_file.'.API_REMOVED_SUCCESSFULLY')!= '') 
						{ 
							$msge 	=  trans($lang_file.'.API_REMOVED_SUCCESSFULLY');
						}else{
							$msge = "Removed Successfully!";
						}	
						$encode = array("status"=>200,"message"=> $msge);
						return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
					}
				}
			} else {
				if (Lang::has($lang_file.'.API_CART_DETAILS_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_CART_DETAILS_AVAILABLE');
				}else{
					$msge = "Cart details not available!";
				}
				
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}
	/* DEALS LISTING */
	public function deal_list()
	{
		$pageno = Input::get('page_no');
		$title = Input::get('title');


		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$deal_title_dynamic 	= 'deal_title_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


		$deal_details  = MobileModel::get_all_deals_details($pageno,'',$title);	
		if(count($deal_details)>0) {
			foreach($deal_details as $d){


				if($validedLang!='') {
					$d->deal_title = $d->$deal_title_dynamic;
				}


				$deal_image="";
				if($d->deal_image !="") {
					$deal_img = explode('/**/', $d->deal_image);
					if(file_exists('public/assets/deals/'.$deal_img[0])){
						$deal_image = url('').'/public/assets/deals/'.$deal_img[0];
					}
				}
				$date      = date('Y-m-d H:i:s');
				$purchase_count = $d->deal_max_limit - $d->deal_no_of_purchase;
				if($d->deal_end_date > $date || $purchase_count > 0) {
					$status = "Not sold";
				} else if($d->deal_end_date < $date && $purchase_count <= 0) {
					$status = "Sold";	
				}
				
				 $ios_deal_start_date = date('d/m/Y h:i:s',strtotime($d->deal_start_date));
				 $ios_deal_end_date = date('d/m/Y h:i:s',strtotime($d->deal_end_date));
				 $ios_deal_expiry_date = date('d/m/Y h:i:s',strtotime($d->deal_end_date));
				 
				$deal_list[] = array("deal_id"=>intval($d->deal_id),"deal_title"=>ucfirst($d->deal_title),"deal_original_price"=>floatval($d->deal_original_price),"deal_discount_price"=>floatval($d->deal_discount_price),"deal_discount_percentage"=>intval($d->deal_discount_percentage),"deal_saving_price"=>floatval($d->deal_saving_price),"deal_currency_code"=>$this->cur_code,"deal_currency_symbol"=>$this->cur_symbol,"deal_start_date"=>$d->deal_start_date,"deal_end_date"=>$d->deal_end_date,"deal_expiry_date"=>$d->deal_expiry_date,"ios_deal_start_date"=>$ios_deal_start_date,"ios_deal_end_date"=>$ios_deal_end_date,"ios_deal_expiry_date"=>$ios_deal_expiry_date,"deal_shop_id"=>intval($d->deal_shop_id),"deal_image"=>$deal_image,"deal_activeorexpire_status"=>$status,"deal_status"=>$d->deal_status);
			}

			if (Lang::has($lang_file.'.API_DEAL_AVAILABLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_DEAL_AVAILABLE');
			}else{
				$msge = "Deal available!";
			}

			$encode = array("status"=>200,"message"=>$msge,"deal_list"=>$deal_list);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			if (Lang::has($lang_file.'.API_NO_DEAL_AVAILABLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_NO_DEAL_AVAILABLE');
			}else{
				$msge = "No Deal available!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		}
	}
	
	/* DEALS DETAILS BY DEAL ID */
	public function deal_detail()
	{
  
		$dealid = Input::get('dealid');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file = $this->lang_file;
		//$lang_file = $this->OUR_LANGUAGE;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$deal_title_dynamic 			= 'deal_title_'.$lang;
				$stor_name_dynamic 				= 'stor_name_'.$lang;
				$deal_description_dynamic 		= 'deal_description_'.$lang;
				$mc_name_dynamic 				= 'mc_name_'.$lang;
				$sb_name_dynamic 	= 'sb_name_'.$lang;
				$ssb_name_dynamic 	= 'ssb_name_'.$lang;
				$smc_name_dynamic 	= 'smc_name_'.$lang;
				$deal_meta_keyword_dynamic 	= 'deal_meta_keyword_'.$lang;
				$deal_meta_description_dynamic 	= 'deal_meta_description_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

	
		if($dealid ==""){
			//echo json_encode(array("status"=>400,"message"=>"dealid Parameter missing!")); 
			if (Lang::has($lang_file.'.API_DEALID_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_DEALID_PARAMETER_MISSING');
			}else{
				$msge = "dealid Parameter missing!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} elseif($dealid ==0){
			//echo json_encode(array("status"=>400,"message"=>" Invalid value!")); 
			if (Lang::has($lang_file.'.API_INVALID_VALUE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_VALUE');
			}else{
				$msge = "Invalid value!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			
			$deal_details  = MobileModel::get_deals_details_by_id($dealid);	
   
			if(count($deal_details)>0) {
				foreach($deal_details as $d){

					if($validedLang!='') {
						$d->deal_title 			= $d->$deal_title_dynamic;
						//$d->stor_name 			= $d->$stor_name_dynamic;
						$d->deal_description 	= $d->$deal_description_dynamic;
						$d->mc_name 			= $d->$mc_name_dynamic;
						$d->sb_name 			= $d->$sb_name_dynamic;
						$d->ssb_name 			= $d->$ssb_name_dynamic;
						$d->smc_name 			= $d->$smc_name_dynamic;
						$d->deal_meta_keyword 	= $d->$deal_meta_keyword_dynamic;
						$d->deal_meta_description = $d->$deal_meta_description_dynamic;
					}
					
					$deal_image = explode('/**/', $d->deal_image);
					$deal_img = array();
					if($deal_image !=""){
						foreach($deal_image as $img) {
							if($img !=""){
								$deal_img[] = array('images'=>url('').'/public/assets/deals/'.$img);
							}
						}
					}
					$purchase_count = $d->deal_max_limit - $d->deal_no_of_purchase;
					$date      = date('Y-m-d H:i:s');
					if($d->deal_end_date > $date && $purchase_count > 0 ) {
						$status = "Not sold";
					} else if($d->deal_end_date < $date || $purchase_count <= 0) {
						$status = "Sold";	
					}
					
					/* Review starts */
					$review = array();
					$review_details  = MobileModel::get_deal_reviews($d->deal_id);
					if(count($review_details)>0) {
						foreach($review_details as $r) {
							if($r->cus_name !="") {	$cus_name = $r->cus_name;} else { $cus_name = ""; }
							if($r->title !="") {	$title = $r->title;} else { $title = ""; }
							if($r->comments !="") {	$comments = $r->comments;} else { $comments = ""; }
							$review[] = array("review_title"=>ucfirst($title),"review_comments"=>ucfirst($comments),"ratings"=>$r->ratings,"review_date"=>$r->review_date,"user_id"=>intval($r->customer_id),"user_name"=>$cus_name,"user_img"=>url('')."/public/assets/profileimage/".$r->cus_pic);
						}
					}
					/* Review ends */
					
					 /* store details starts */
					$store_arr[]  = array();/*array("store_id"=>intval($d->stor_id),"store_name"=>ucfirst($d->stor_name),"store_phone"=>$d->stor_phone,"store_address1"=>ucfirst($d->stor_address1),"store_address2"=>ucfirst($d->stor_address2),"store_zipcode"=>$d->stor_zipcode,"store_website"=>$d->stor_website,"store_latitude"=>$d->stor_latitude,"store_longitude"=>$d->stor_longitude,"store_img"=>url('').'/assets/storeimage/'.$d->stor_img,"store_status"=>$d->stor_status,"store_phone"=>$d->stor_phone);*/
					/* store details ends */
					/* related deals starts //$stor_id */
					$rel_deal_arr = array();
					if($d->deal_category !=""){
						$get_related_deals  = MobileModel::get_related_deals($d->deal_id,$d->deal_category);
						if(count($get_related_deals)>0) {
							foreach($get_related_deals as $rd){
								$related_deal_image="";
								if($rd->deal_image !="") {
									$related_deal_img = explode('/**/', $rd->deal_image);
									if(file_exists('public/assets/deals/'.$related_deal_img[0])){
										$related_deal_image = url('').'/public/assets/deals/'.$related_deal_img[0];
									}
								}
								$date      = date('Y-m-d H:i:s');
								$purchase_count = $rd->deal_max_limit - $rd->deal_no_of_purchase;
								if($rd->deal_end_date > $date && $purchase_count > 0) {
									$rel_status = "Not sold";
								} else if($rd->deal_end_date < $date || $purchase_count <= 0 ) {
									$rel_status = "Sold";	
								}
								$ios_deal_start_date = date('d/m/Y h:i:s',strtotime($rd->deal_start_date));
								$ios_deal_end_date = date('d/m/Y h:i:s',strtotime($rd->deal_end_date));
								$ios_deal_expiry_date = date('d/m/Y h:i:s',strtotime($rd->deal_expiry_date));
								$rel_deal_arr[] = array("deal_id"=>intval($rd->deal_id),"deal_title"=>ucfirst($rd->deal_title),"deal_original_price"=>floatval($rd->deal_original_price),"deal_discount_price"=>floatval($rd->deal_discount_price),"deal_discount_percentage"=>intval($rd->deal_discount_percentage),"deal_saving_price"=>floatval($rd->deal_saving_price),"deal_currency_code"=>$this->cur_code,"deal_currency_symbol"=>$this->cur_symbol,"deal_start_date"=>$rd->deal_start_date,"deal_end_date"=>$rd->deal_end_date,"deal_expiry_date"=>$rd->deal_expiry_date,"ios_deal_start_date"=>$ios_deal_start_date,"ios_deal_end_date"=>$ios_deal_end_date,"ios_deal_expiry_date"=>$ios_deal_expiry_date,"deal_shop_id"=>intval($rd->deal_shop_id),"deal_image"=>$related_deal_image,"deal_activeorexpire_status"=>$rel_status,"deal_status"=>$rd->deal_status);
							}
						}

					}
					$ios_deal_start_date = date('d/m/Y h:i:s',strtotime($d->deal_start_date));
					$ios_deal_end_date = date('d/m/Y h:i:s',strtotime($d->deal_end_date));
					$ios_deal_expiry_date = date('d/m/Y h:i:s',strtotime($d->deal_expiry_date));
					/* related deals ends */
					$deal_list = array("deal_id"=>intval($d->deal_id),"deal_title"=>ucfirst($d->deal_title),"deal_description"=>ucfirst($d->deal_description),"deal_category_name"=>ucfirst($d->mc_name),"deal_category_id"=>intval($d->deal_category),"deal_main_category_name"=>ucfirst($d->smc_name),"deal_main_category_id"=>intval($d->deal_main_category),"deal_sub_category_name"=>ucfirst($d->sb_name),"deal_sub_category_id"=>intval($d->deal_sub_category),"deal_second_sub_category_name"=>ucfirst($d->ssb_name),"deal_second_sub_category_id"=>intval($d->deal_second_sub_category),"deal_original_price"=>$d->deal_original_price,"deal_discount_price"=>$d->deal_discount_price,"deal_discount_percentage"=>intval($d->deal_discount_percentage),"deal_saving_price"=>$d->deal_saving_price,"deal_currency_code"=>$this->cur_code,"deal_currency_symbol"=>$this->cur_symbol,"deal_start_date"=>$d->deal_start_date,"deal_end_date"=>$d->deal_end_date,"deal_expiry_date"=>$d->deal_expiry_date,"ios_deal_start_date"=>$ios_deal_start_date,"ios_deal_end_date"=>$ios_deal_end_date,"ios_deal_expiry_date"=>$ios_deal_expiry_date,"deal_merchant_id"=>intval($d->deal_merchant_id),"deal_shop_id"=>intval($d->deal_shop_id),"deal_activeorexpire_status"=>$status,"deal_created_date"=>$d->created_date,"deal_status"=>$d->deal_status,"deal_including_tax"=>floatval($d->deal_inctax),"deal_ship_amt"=>floatval($d->deal_shippamt),"deal_meta_keyword"=>$d->deal_meta_keyword,"deal_meta_description"=>ucfirst($d->deal_meta_description),"deal_min_limit"=>$d->deal_min_limit,"deal_max_limit"=>$d->deal_max_limit,"deal_purchase_limit"=>$d->deal_purchase_limit,"deal_no_of_purchase"=>$d->deal_no_of_purchase,"deal_image"=>$deal_img,"store_details"=>$store_arr,"deal_review"=>$review,"related_deals"=>$rel_deal_arr);
					
				}
				if (Lang::has($lang_file.'.API_DEAL_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_DEAL_AVAILABLE');
				}else{
					$msge = "Deal available!";
				}
				//echo json_encode(array("status"=>200,"message"=>"Deal available","deal_list"=>$deal_list)); 
				$encode = array("status"=>200,"message"=>$msge,"deal_list"=>$deal_list);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} else {
				if (Lang::has($lang_file.'.API_NO_DEAL_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_DEAL_AVAILABLE');
				}else{
					$msge = "No Deal available!";
				}
				//echo json_encode(array("status"=>400,"message"=>"No Deal available")); 
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
		
	}
	/* ADD TO CART DEALs */
	public function add_cart_deal()
	{
		$dealid = Input::get('dealid');
		$quantity = Input::get('quantity');
		$user_id = Input::get('user_id');
		$cart_type = 2; // for deals

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file		=$this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$deal_title_dynamic 	= 'deal_title_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


		if($dealid =="" || $user_id =="" || $quantity =="" || $quantity ==0){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u) {
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			}
			$check_cart_details = MobileModel::get_deal_cart_details($dealid,$user_id,$quantity,$cart_type);
			//dd(DB::getQueryLog());
			if(count($check_cart_details)>0) {
				if (Lang::has($lang_file.'.API_ALREADY_IN_CART')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ALREADY_IN_CART');
				}else{
					$msge = "Already in cart!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} 
			$siz_arr = array();
			$color_arr = array();
			$deal_details  = MobileModel::get_deals_details_by_id($dealid);
			//print_r($deal_details);
			$cart_total =0;
			if(count($deal_details)>0) {
				foreach($deal_details as $p){
					$available_deals = $p->deal_max_limit - $p->deal_no_of_purchase;
					if($available_deals < 0)//check deal quantity is available
					{
						$encode = array("status"=>400,"message"=>"No deals are available");
						return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
					}
					if($available_deals < $quantity)//check quantity exceeds available deals  
					{
						$encode = array("status"=>400,"message"=>"Quantity exceeds the available count");
						return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
					}

					if($validedLang!='') {
						$p->deal_title = $p->$deal_title_dynamic;
					}


					 $entry = array(
						'cart_deal_id' => $p->deal_id,
						'cart_product_qty' => $quantity,
						'cart_type' => 2,
						'cart_user_id' => $userID
					);
            
					$add_to_cart_id = MobileModel::add_to_cart_product($entry);
					$deal_image="";
					if($p->deal_image !="") {
						$deal_img = explode('/**/', $p->deal_image);
						if(file_exists('public/assets/deals/'.$deal_img[0])){
							$deal_image = url('').'/public/assets/deals/'.$deal_img[0];
						}
					}
					
					
					$total = $p->deal_discount_price*$quantity;
					
					$cart_details[] = array("cart_id"=>intval($add_to_cart_id),"cart_deal_id"=>intval($p->deal_id),"cart_title"=>ucfirst($p->deal_title),"cart_quantity"=>intval($quantity),"cart_image"=>$deal_image,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->deal_discount_price),"cart_total"=>floatval($total));
					$cart_type =2;
					$get_cart_details = MobileModel::get_product_cart_by_userid($userID,$cart_type);
					$cart_total =count($get_cart_details);
					if (Lang::has($lang_file.'.API_CART_ADDED_SUCCESSFULLY')!= '') 
					{ 
						$msge 	=  trans($lang_file.'.API_CART_ADDED_SUCCESSFULLY');
					}else{
						$msge = "Cart added successfully!";
					}
					$encode = array("status"=>200,"message"=>$msge,"cart_count"=>$cart_total,"cart_details"=>$cart_details);

					return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
				}
			} else {
				if (Lang::has($lang_file.'.API_DEAL_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_DEAL_NOT_AVAILABLE');
				}else{
					$msge = "Deal not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}
	/* UPDATE TO CART DEALS */
	public function update_dealcart()
	{
		$cart_id = Input::get('cart_id');
		$dealid = Input::get('dealid');
		$quantity = Input::get('quantity');
		$user_id = Input::get('user_id');
		$cart_type = 2; // for deals

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$deal_title_dynamic 	= 'deal_title_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


		if($dealid =="" || $dealid ==0 || $cart_id =="" || $cart_id ==0 || $user_id =="" || $user_id ==0 || $quantity =="" || $quantity ==0){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u){
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=> $msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$check_cart_details = MobileModel::get_deal_cart_detailsbyid($cart_id,$dealid,$user_id,$quantity,$cart_type);
			if(count($check_cart_details)==0) {
				if (Lang::has($lang_file.'.API_CART_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_CART_NOT_AVAILABLE');
				}else{
					$msge = "Cart not available!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} 
			$siz_arr = array();
			$color_arr = array();
			$deal_details  = MobileModel::get_deals_details_by_id($dealid);	
			if(count($deal_details)>0) {
				foreach($deal_details as $p){

					if($validedLang!='') {
						$p->deal_title = $p->$deal_title_dynamic;
					}


					 $entry = array(
						'cart_product_qty' => $quantity,
						'cart_type' => 2,
						'cart_user_id' => $userID
					);
					$add_to_cart_id = MobileModel::update_to_cart_product($cart_id,$entry);
					$deal_image="";
					if($p->deal_image !="") {
						$deal_img = explode('/**/', $p->deal_image);
						if(file_exists('public/assets/deals/'.$deal_img[0])){
							$deal_image = url('').'/assets/deals/'.$deal_img[0];
						}
					}
					$total = $p->deal_discount_price*$quantity;
					
					$cart_details[] = array("cart_id"=>intval($cart_id),"cart_deal_id"=>intval($p->deal_id),"cart_title"=>ucfirst($p->deal_title),"cart_quantity"=>intval($quantity),"cart_image"=>$deal_image,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->deal_discount_price),"cart_total"=>floatval($total));
					$get_cart_details = MobileModel::get_product_cart_by_userid($userID,$cart_type);
					$cart_total =count($get_cart_details);
					if (Lang::has($lang_file.'.API_CART_UPDATED_SUCCESSFULLY')!= '') 
					{ 
						$msge 	=  trans($lang_file.'.API_CART_UPDATED_SUCCESSFULLY');
					}else{
						$msge = "Cart updated successfully!";
					}
					$encode = array("status"=>200,"message"=>$msge,"cart_count"=>$cart_total,"cart_details"=>$cart_details);
					return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
				}
			} else {
				if (Lang::has($lang_file.'.API_DEAL_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_DEAL_NOT_AVAILABLE');
				}else{
					$msge = "Deal not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}

	/* REMOVE FROM CART DEAL */
	public function remove_cart_deal()
	{
		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$deal_title_dynamic 	= 'deal_title_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		$cart_id = Input::get('cart_id');
		$cart_type = 2; // for deals
		if($cart_id =="" || $cart_id ==0){
			//echo json_encode(array("status"=>400,"message"=>"Parameter Missing!"));
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			$cart_details = MobileModel::get_cart_details_by_id($cart_id,$cart_type);	
			if(count($cart_details)>0) {
				foreach($cart_details as $c){
					$delete_cart = MobileModel::delete_cart_by_id($c->cart_id,$cart_type);
					if($delete_cart) {
						if (Lang::has($lang_file.'.API_REMOVED_SUCCESSFULLY')!= '') 
						{ 
							$msge 	=  trans($lang_file.'.API_REMOVED_SUCCESSFULLY');
						}else{
							$msge = "Removed Successfully!";
						}
						$encode = array("status"=>200,"message"=>$msge);
						return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
					}
				}
			} else {
				if (Lang::has($lang_file.'.API_CART_DETAILS_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_CART_DETAILS_AVAILABLE');
				}else{
					$msge = "Cart details not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}
	/* DEAL CART LIST */
	public function deal_cart_list()
	{
		$user_id = Input::get('user_id');
		$cart_type = 2; // for deals

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file	 = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$deal_title_dynamic 	= 'deal_title_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


		if($user_id =="" || $user_id ==0){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u){
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=> $msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$get_cart_details = MobileModel::get_product_cart_by_userid($user_id,$cart_type);
			//dd(DB::getQueryLog());
			$cart_details = array();
			if(count($get_cart_details)>0) {
				 foreach($get_cart_details as $cart) {
					$siz_arr = array();
					$color_arr = array();
					$deal_details  = MobileModel::get_deals_details_by_id($cart->cart_deal_id);	
					if(count($deal_details)>0) {
						foreach($deal_details as $p){

							if($validedLang!='') {
								$p->deal_title = $p->$deal_title_dynamic;
							}


							$deal_image="";
							if($p->deal_image !="") {
								$deal_img = explode('/**/', $p->deal_image);
								if(file_exists('public/assets/deals/'.$deal_img[0])){
									$deal_image = url('').'/public/assets/deals/'.$deal_img[0];
								}
							}
							$total = $p->deal_discount_price*$cart->cart_product_qty;
							$cart_details[] = array("cart_id"=>intval($cart->cart_id),"cart_deal_id"=>intval($p->deal_id),"cart_title"=>ucfirst($p->deal_title),"cart_quantity"=>intval($cart->cart_product_qty),"cart_image"=>$deal_image,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->deal_discount_price),"cart_total"=>floatval($total));
						}
					} 
				}
				if (Lang::has($lang_file.'.API_CART_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_CART_AVAILABLE');
				}else{
					$msge = "Cart available!";
				}
				//echo json_encode(array("status"=>200,"message"=>"Cart Available!","cart_details"=>$cart_details));	
				$encode = array("status"=>200,"message"=>$msge,"cart_details"=>$cart_details);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");		
			} else {
				if (Lang::has($lang_file.'.API_NO_DATA_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_DATA_AVAILABLE');
				}else{
					$msge = "No data available!";
				}	
				//echo json_encode(array("status"=>400,"message"=>"No data available!"));
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} 
			
		}
	}

	/* USER UPDATE MY ACCOUNT DETAILS */
	public function user_my_account_update()
	{
		$user_id = Input::get('user_id');
		$user_name = Input::get('user_name');
		$user_email = Input::get('user_email');
		$user_phone = Input::get('user_phone');
		$user_address1 = Input::get('user_address1');
		$user_address2 = Input::get('user_address2');
		$user_country_id = Input::get('user_country_id');
 
		$user_city_id = Input::get('user_city_id');
		
		$ship_id = Input::get('ship_id');
		$ship_name = Input::get('ship_name');
		$ship_email = Input::get('ship_email');
		$ship_phone = Input::get('ship_phone');
		$ship_address1 = Input::get('ship_address1');
		$ship_address2 = Input::get('ship_address2');
		$ship_country_id = Input::get('ship_country_id');
  
		$ship_city_id = Input::get('ship_city_id');
		$ship_state = Input::get('ship_state');
		$ship_postalcode = Input::get('ship_postalcode');
		
		$user = array();
		$ship = array();
		
		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		//$encode = array("status"=>400,"message"=>"Language :".$lang.'|'.$user_id.Input::get_all());
		//return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		/* validate selected language  */
		$validedLang 	= '';
		$lang_file 		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		
		if($user_id =="") {
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			/* Country and city validation */
			$country_details = MobileModel::get_countrylist($user_country_id);
			$city_details = MobileModel::get_citylist($user_country_id,$user_city_id);
			if(count($country_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_COUNTRY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_COUNTRY_DATA');
				}else{
					$msge = "Invalid country data!";
				}


				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			if(count($city_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_CITY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_CITY_DATA');
				}else{
					$msge = "Invalid City data!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			/* Shipping Country and Shipping city validation */
			$country_details = MobileModel::get_countrylist($ship_country_id);
			$city_details = MobileModel::get_citylist($ship_country_id,$ship_city_id);
   
			if(count($country_details)==0){

				if (Lang::has($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA');
				}else{
					$msge = "Invalid Ship country data!";
				}


				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			if(count($city_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_CITY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_CITY_DATA');
				}else{
					$msge = "Invalid Ship city data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}

			$user_details = MobileModel::get_user_details($user_id);
   
			$ship_details = MobileModel::get_user_ship_details($user_id,$ship_id);
			if(count($ship_details)==0){
				if (Lang::has($lang_file.'.API_USER_SHIPPING_DETAILS_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_SHIPPING_DETAILS_NOT_AVAILABLE');
				}else{
					$msge = "User Shipping details not available!";
				}
				
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			}
			if(count($user_details)==0){
				if (Lang::has($lang_file.'.API_USER_DETAILS_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_DETAILS_NOT_AVAILABLE');
				}else{
					$msge = "User details not available!";
				}
					
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			}
			if(count($user_details)>0){
				if($user_name !=""){
					$fields = array('cus_name' => $user_name);
					$update_details = MobileModel::update_user_details($user_id,$fields);
				}
				if($user_email !=""){
					$fields = array('cus_email' => $user_email);
					//$update_details = MobileModel::update_user_details($user_id,$fields);
				}
				if($user_phone !=""){
					$fields = array('cus_phone' => $user_phone);
					$update_details = MobileModel::update_user_details($user_id,$fields);
				}
				
				if($user_address1 !=""){
					$fields = array('cus_address1' => $user_address1);
					$update_details = MobileModel::update_user_details($user_id,$fields);
				}
				if($user_address2 !=""){
					$fields = array('cus_address2' => $user_address2);
					$update_details = MobileModel::update_user_details($user_id,$fields);
				}
				if($user_country_id !=""){
					$fields = array('cus_country' => $user_country_id);
					$update_details = MobileModel::update_user_details($user_id,$fields);
				}
				if($user_city_id !=""){
					$fields = array('cus_city' => $user_city_id);
					$update_details = MobileModel::update_user_details($user_id,$fields);
				}
				if(!empty($_FILES['profile_image'])) {
					$filename = $_FILES['profile_image']['name'];
					$move_img = explode('.', $filename);
					$filename = $move_img[0] . str_random(8) . "." . $move_img[1];
					$destinationPath = './public/assets/profileimage/';
		        	$uploadSuccess   = Input::file('profile_image')->move($destinationPath, $filename);
		        	$fields = array('cus_pic' => $filename);
					$update_details = MobileModel::update_user_details($user_id,$fields);
				}
				
			}
			
			if(count($ship_details)>0){  
				//echo "ghg";exit();
				if($ship_name !=""){
					$fields = array('ship_name' => $ship_name);
					$update_ship_details = MobileModel::update_user_shipping_details($ship_id,$fields);
				}
				if($ship_email !=""){
					$fields = array('ship_email' => $ship_email);
					$update_ship_details = MobileModel::update_user_shipping_details($ship_id,$fields);
				}
				if($ship_phone !=""){
					$fields = array('ship_phone' => $ship_phone);
					$update_ship_details = MobileModel::update_user_shipping_details($ship_id,$fields);
				}
				if($ship_address1 !=""){
					$fields = array('ship_address1' => $ship_address1);
					$update_ship_details = MobileModel::update_user_shipping_details($ship_id,$fields);
				}
			
				if($ship_address2 !=""){
					$fields = array('ship_address2' => $ship_address2);
					$update_ship_details = MobileModel::update_user_shipping_details($ship_id,$fields);
				}
				if($ship_country_id !=""){
					$fields = array('ship_country' => $ship_country_id);
					$update_ship_details = MobileModel::update_user_shipping_details($ship_id,$fields);
				}
				
				if($ship_city_id !=""){
					$fields = array('ship_ci_id' => $ship_city_id);
					$update_ship_details = MobileModel::update_user_shipping_details($ship_id,$fields);
				}
				if($ship_state !=""){
					$fields = array('ship_state' => $ship_state);
					$update_ship_details = MobileModel::update_user_shipping_details($ship_id,$fields);
				}
				if($ship_postalcode !=""){
					$fields = array('ship_postalcode' => $ship_postalcode);
					$update_ship_details = MobileModel::update_user_shipping_details($ship_id,$fields);
				}
			}
			
			$user_details = MobileModel::get_user_details($user_id);
			$ship_details = MobileModel::get_user_ship_details($user_id,$ship_id);
			if(count($user_details)>0){
				foreach($user_details as $u) {

					if($validedLang!='') {
						$u->co_name = $u->$co_name_dynamic;
						$u->ci_name = $u->$ci_name_dynamic;
						
					}


					if($u->cus_pic !="") {
						if(file_exists('public/assets/profileimage/'.$u->cus_pic)){
							$user_img = url('').'/public/assets/profileimage/'.$u->cus_pic;	
						} else {
							$user_img =  "/themes/images/products/man.png";
						}
					} else {
						$user_img =  url('')."/themes/images/products/man.png";
					}
					if($u->co_name !=""){
						$co_name = $u->co_name;
					}else{
						$co_name ="";
					}
					if($u->ci_name !=""){
						$ci_name = $u->ci_name;
					}else{
						$ci_name ="";
					}
					if($u->cus_country !="") { 
					$cus_country = intval($u->cus_country); 
					}else{
					$cus_country="";
					}
					if($u->cus_city !="") { 
					$cus_city= intval($u->cus_city); 
					}else{ 
					$cus_city="";
					}
					
					$user[] = array("user_id"=>$u->cus_id,"user_name"=>ucfirst($u->cus_name),"user_email"=>$u->cus_email,"user_phone"=>$u->cus_phone,"user_address1"=>ucfirst($u->cus_address1),"user_address2"=>ucfirst($u->cus_address2),"user_country_id"=>$cus_country,"user_country_name"=>ucfirst($co_name),"user_city_id"=>$cus_city,"user_city_name"=>ucfirst($ci_name),"user_joindate"=>$u->cus_joindate,"user_image"=>$user_img);
				}
			}
			$ship_details = MobileModel::get_user_ship_details($user_id,$ship_id);
			//print_r($ship_details);exit();
			if(count($ship_details)>0){

				foreach($ship_details as $s) {

					if($validedLang!='') {
						
						$s->co_name = $u->$co_name_dynamic;
						$s->ci_name = $u->$ci_name_dynamic;
					}

					if($s->co_name !=""){
						$co_name = $s->co_name;
					}else{
						$co_name ="";
					}
					if($s->ci_name !=""){
						$ci_name = $s->ci_name;
					}else{
						$ci_name ="";
					}
					if($s->ship_ci_id !=""){
						$ship_ci_id = intval($s->ship_ci_id);
					}else{
						$ship_ci_id ="";
					}
					if($s->ship_country !=""){
						$ship_country = intval($s->ship_country);
					}else{
						$ship_country ="";
					}
					$ship[] = array("ship_id"=>$s->ship_id,"ship_name"=>ucfirst($s->ship_name),"ship_email"=>$s->ship_email,"ship_phone"=>$s->ship_phone,"ship_address1"=>ucfirst($s->ship_address1),"ship_address2"=>ucfirst($s->ship_address2),"ship_country_id"=>$ship_country,"ship_country_name"=>ucfirst($co_name),"ship_city_id"=>$ship_ci_id,"ship_city_name"=>ucfirst($ci_name),"ship_state"=>ucfirst($s->ship_state),"ship_postalcode"=>$s->ship_postalcode);
				}
			}
			
			if((count($user_details)==0) && (count($ship_details)==0)){
				if (Lang::has($lang_file.'.API_USER_DETAILS_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_DETAILS_NOT_AVAILABLE');
				}else{
					$msge = "User details not available!";
				}
				$encode = array("status"=>400,"message"=>$msge,"user_details"=>$user,"shipping_details"=>$ship);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} else {
				if (Lang::has($lang_file.'.API_USER_DETAILS_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_DETAILS_AVAILABLE');
				}else{
					$msge = "User details available!";
				}	
				
				$encode = array("status"=>200,"message"=>$msge,"user_details"=>$user,"shipping_details"=>$ship);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}
	/* USER MY ACCOUNT DETAILS */
	public function user_my_account()
	{
		$user_id = Input::get('user_id');
  
		$user = array();
		$ship = array();

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file   = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


		if($user_id =="") {
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			
			$user_details = MobileModel::get_user_details($user_id);
			$ship_details = MobileModel::get_user_ship_details($user_id);
			
			if(count($user_details)>0){
				foreach($user_details as $u) {

					if($validedLang!='') {
						$u->co_name = $u->$co_name_dynamic;
						$u->ci_name = $u->$ci_name_dynamic;
						
					}
					if($u->cus_pic !="") {
						if(file_exists('public/assets/profileimage/'.$u->cus_pic)){
							$user_img = url('').'/public/assets/profileimage/'.$u->cus_pic;	
						} else {
							$user_img =  "/themes/images/products/man.png";
						}
					} else {
						$user_img =  url('')."/themes/images/products/man.png";
					}
					
					if($u->co_name !=""){
						$co_name = $u->co_name;
					}else{
						$co_name ="";
					}
					if($u->ci_name !=""){
						$ci_name = $u->ci_name;
					}else{
						$ci_name ="";
					}
					if($u->cus_country !="") { 
					$cus_country = intval($u->cus_country); 
					}else{
					$cus_country="";
					}
					if($u->cus_city !="") { 
					$cus_city= intval($u->cus_city); 
					}else{ 
					$cus_city="";
					}
					$user[] = array("user_id"=>intval($u->cus_id),"user_name"=>ucfirst($u->cus_name),"user_email"=>$u->cus_email,"user_phone"=>$u->cus_phone,"user_address1"=>ucfirst($u->cus_address1),"user_address2"=>ucfirst($u->cus_address2),"user_country_id"=>$cus_country,"user_country_name"=>ucfirst($co_name),"user_city_id"=>$cus_city,"user_city_name"=>ucfirst($ci_name),"user_joindate"=>$u->cus_joindate,"user_image"=>$user_img);
				}
			}
			
			if(count($ship_details)>0){
				foreach($ship_details as $s) {
					if($validedLang!='') {
						
						$s->co_name = $s->$co_name_dynamic;
						$s->ci_name = $s->$ci_name_dynamic;
					}
					if($s->co_name !=""){
						$co_name = $s->co_name;
					}else{
						$co_name ="";
					}
					if($s->ci_name !=""){
						$ci_name = $s->ci_name;
					}else{
						$ci_name ="";
					}
					if($s->ship_ci_id !=""){
						$ship_ci_id = intval($s->ship_ci_id);
					}else{
						$ship_ci_id ="";
					}
					if($s->ship_country !=""){
						$ship_country = intval($s->ship_country);
					}else{
						$ship_country ="";
					}
					
					$ship[] = array("ship_id"=>intval($s->ship_id),"ship_name"=>ucfirst($s->ship_name),"ship_email"=>$s->ship_email,"ship_phone"=>$s->ship_phone,"ship_address1"=>ucfirst($s->ship_address1),"ship_address2"=>ucfirst($s->ship_address2),"ship_country_id"=>$ship_country,"ship_country_name"=>ucfirst($co_name),"ship_city_id"=>$ship_ci_id,"ship_city_name"=>ucfirst($ci_name),"ship_state"=>ucfirst($s->ship_state),"ship_postalcode"=>$s->ship_postalcode);
				}
			}
			
			if((count($user_details)==0) && (count($ship_details)==0)){
				if (Lang::has($lang_file.'.API_USER_DETAILS_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_DETAILS_NOT_AVAILABLE');
				}else{
					$msge = "User details not available!";
				}
				$encode = array("status"=>400,"message"=>$msge,"user_details"=>$user,"shipping_details"=>$ship);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			
			} else {

				if (Lang::has($lang_file.'.API_USER_DETAILS_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_DETAILS_AVAILABLE');
				}else{
					$msge = "User details available!";
				}	

				$encode = array("status"=>200,"message"=>$msge,"user_details"=>$user,"shipping_details"=>$ship);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}

	/* RESET PASSWORD */
	public function login_user_reset()
	{
		$user_id = Input::get('user_id');
		$old_password = Input::get('old_password');
		$new_password = Input::get('new_password');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file   = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		if($user_id=="" || $old_password =="" || $new_password ==""){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json"); 
		} else {
			$user_details = MobileModel::reset_user_password($user_id,$old_password);
			if(count($user_details)>0){
				foreach($user_details as $u) {
					$user_id = $u->cus_id;
					$check   = MobileModel::update_newpwd($user_id, $new_password);
				}
				if (Lang::has($lang_file.'.API_PWD_CHANGED_SUCCESSFULLY')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_PWD_CHANGED_SUCCESSFULLY');
				}else{
					$msge 	= "Password changed successfully!";
				}
				$encode = array("status"=>200,"message"=>$msge,"user_id"=>$user_id,"password"=>$new_password);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json"); 
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=> $msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json"); 
			}
		}
	}
	/* USER MY WISHLIST */
	public function user_my_wishlist()
	{
		$user_id = Input::get('user_id');
		$pageno = Input::get('page_no');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang 	= '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */
		
		if($user_id =="") {
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			$product_details  = MobileModel::get_wishlistdetails($pageno,$user_id);	
			//dd(DB::getQueryLog()); 
			if(count($product_details)>0) {
				foreach($product_details as $p){

					if($validedLang!='') {
						$p->pro_title = $p->$pro_title_dynamic;
					}
					
					$product_saving_price = $p->pro_price - $p->pro_disprice;
					$product_discount_percentage = round(($product_saving_price/ $p->pro_price)*100);
					$product_image="";
					if($p->pro_Img !="") {
						$product_img = explode('/**/', $p->pro_Img);
						if(file_exists('public/assets/product/'.$product_img[0])){
							$product_image = url('').'/public/assets/product/'.$product_img[0];
						}
					}
					$productlist[] = array("product_id"=>$p->pro_id,"product_title"=>ucfirst(strip_tags($p->pro_title)),"product_discount_price"=>floatval($p->pro_disprice),"product_discount_percentage"=>intval($p->pro_discount_percentage),"product_original_price"=>floatval($p->pro_price),"product_image"=>$product_image,"product_currency_code"=>$this->cur_code,"product_currency_symbol"=>$this->cur_symbol,"user_id"=>$p->ws_cus_id);
				}
				if (Lang::has($lang_file.'.API_PRODUCT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_PRODUCT_AVAILABLE');
				}else{
					$msge = "Product available";
				}

				$encode = array("status"=>200,"message"=>$msge,"product_wish_list"=>$productlist);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} else {
				if (Lang::has($lang_file.'.API_NOT_PRODUCT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NOT_PRODUCT_AVAILABLE');
				}else{
					$msge = "Product Not available";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}
	/* USER MY ORDERS LIST */
	public function user_my_orders()
	{
		$user_id = Input::get('user_id');
		$pageno = Input::get('page_no');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file	 = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */
		
		$order =array();
		$order_cod =array();
		$order_payU =array();
		$dealorder = array();
		$dealorder_cod =array();
		$dealorder_payU =array();
		if($user_id ==""){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			$product_order  = MobileModel::getproductordersdetails($pageno,$user_id);
			$product_order_cod  = MobileModel::getproductorders_cod_details($pageno,$user_id);
			$product_order_payU  = MobileModel::getproductorders_payU_details($pageno,$user_id);
			$ord_grand_tot = $cod_grand_tot = $deal_ord_grand_tot = $deal_cod_grand_tot = 0;
			if(count($product_order)>0) {
				foreach($product_order as $orderdet){

					if($validedLang!='') {
						$orderdet->pro_title = $orderdet->$pro_title_dynamic;
					}
					


					if($orderdet->order_status==1)
					{
						if (Lang::has($lang_file.'.API_SUCCESS')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_SUCCESS');
						}else{
							$orderstatus = "Success";
						}			

						//$orderstatus="success";
					}
					else if($orderdet->order_status==2) 
					{
						if (Lang::has($lang_file.'.API_COMPLETED')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_COMPLETED');
						}else{
							$orderstatus = "Completed";
						}
						//$orderstatus="completed";
					}
					else if($orderdet->order_status==3) 
					{
						if (Lang::has($lang_file.'.API_HOLD')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_HOLD');
						}else{
							$orderstatus = "Hold";
						}
						//$orderstatus="Hold";
					}
					else if($orderdet->order_status==4) 
					{
						if (Lang::has($lang_file.'.API_FAILED')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_FAILED');
						}else{
							$orderstatus = "Failed";
						}
						//$orderstatus="failed";
					}
					if($orderdet->delivery_status==1)
					{
						if (Lang::has($lang_file.'.API_ORDER_PLACED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_PLACED');
						}else{
							$delivery_status = "Order placed";
						}			

						//$delivery_status="order placed";
					}
					else if($orderdet->delivery_status==2)
					{
						if (Lang::has($lang_file.'.API_ORDER_PACKDED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_PACKED');
						}else{
							$delivery_status = "Order packed";
						}			

						
					}
					else if($orderdet->delivery_status==3)
					{
						if (Lang::has($lang_file.'.API_ORDER_DISPATCHED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_DISPATCHED');
						}else{
							$delivery_status = "Order dispatched";
						}			

						
					}
					else if($orderdet->delivery_status==4)
					{
						if (Lang::has($lang_file.'.API_ORDER_DELIVERED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_DELIVERED');
						}else{
							$delivery_status = "Order delivered";
						}			

						
					}
					else if($orderdet->delivery_status==5)
					{
						if (Lang::has($lang_file.'.API_ORDER_CANCEL_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_CANCEL_PENDING');
						}else{
							$delivery_status = "Order cancel pending";
						}			

						
					}else if($orderdet->delivery_status==6)
					{
						if (Lang::has($lang_file.'.API_ORDER_CANCELLED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_CANCELLED');
						}else{
							$delivery_status = "Order cancelled";
						}			

						
					}else if($orderdet->delivery_status==7)
					{
						if (Lang::has($lang_file.'.API_ORDER_RETURN_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_RETURN_PENDING');
						}else{
							$delivery_status = "Order return pending";
						}			

						
					}else if($orderdet->delivery_status==8)
					{
						if (Lang::has($lang_file.'.API_ORDER_RETURNED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_RETURNED');
						}else{
							$delivery_status = "Order returned";
						}			

						
					}
					else if($orderdet->delivery_status==9)
					{
						if (Lang::has($lang_file.'.API_ORDER_REPLACE_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_REPLACE_PENDING');
						}else{
							$delivery_status = "Order replace pending";
						}			

						
					}else if($orderdet->delivery_status==10)
					{
						if (Lang::has($lang_file.'.API_ORDER_REPLACED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_REPLACED');
						}else{
							$delivery_status = "Order replaced";
						}			

						
					}
					$product_image="";
					if($orderdet->pro_Img !="") {
						$product_img = explode('/**/', $orderdet->pro_Img);
						if(file_exists('public/assets/product/'.$product_img[0])){
							$product_image = url('').'/public/assets/product/'.$product_img[0];
						}
					}
					//$array = explode(',',$orderdet->order_shipping_add);
					//print_r($array);
					//$order_shipping_add  = array("Ship_name:"=>$array[0],"ship_email"=>$array[1]);
					//$tax_amt = ($orderdet->order_amt + $orderdet->order_shipping_amt )*($orderdet->order_tax/100);
					$tax_amt = round(($orderdet->order_amt)*($orderdet->order_tax/100),2);
					$ord_grand_tot = $orderdet->order_amt + $orderdet->order_shipping_amt + $tax_amt ;
					$ship_name = "";
					$ship_email = "";
					$ship_phone = "";
					$ship_address1 = "";
					$ship_address2 = "";
					$ship_country = "";
					$ship_ci_id = "";
					$ship_state = "";
					$ship_postalcode = "";
					
					if($orderdet->ship_name !="") {
						$ship_name = ucfirst($orderdet->ship_name).',';
					}
					if($orderdet->ship_email !="") {
						$ship_email = $orderdet->ship_email.',';
					}
					if($orderdet->ship_phone !="") {
						$ship_phone = $orderdet->ship_phone.',';
					}
					if($orderdet->ship_address1 !="") {
						$ship_address1 = ucfirst($orderdet->ship_address1).',';
					}
					if($orderdet->ship_address2 !="") {
						$ship_address2 = ucfirst($orderdet->ship_address2).',';
					}
					if($orderdet->ship_country !="") {
						$ship_country = ucfirst($orderdet->ship_country).',';
					}
					if($orderdet->ship_ci_id !="") {
						$ship_ci_id = ucfirst($orderdet->ship_ci_id).',';
					}
					if($orderdet->ship_state !="") {
						$ship_state = ucfirst($orderdet->ship_state).',';
					}
					if($orderdet->ship_postalcode !="") {
						$ship_postalcode = $orderdet->ship_postalcode;
					}
					//order shipping address
					$order_shipping_add  = $ship_name.''.$ship_email.''.$ship_phone.''.$ship_address1.''.$ship_address2.''.$ship_country.''.$ship_ci_id.''.$ship_state.''.$ship_postalcode;

					$order[] = array("order_id"=>$orderdet->order_id,"order_title"=>ucfirst($orderdet->pro_title),"product_image"=>$product_image,"order_date"=>$orderdet->order_date,"order_status"=>$orderstatus,"delivery_status"=>$delivery_status,"order_qty"=>$orderdet->order_qty,"order_amount"=>floatval($ord_grand_tot),"order_tax"=>floatval($orderdet->order_tax),"product_currency_code"=>$this->cur_code,"product_currency_symbol"=>$this->cur_symbol,'order_shipping_address' =>$order_shipping_add,"ship_name"=>rtrim($ship_name,","),"ship_email"=>rtrim($ship_email,","),"ship_phone"=>rtrim($ship_phone,","),"ship_address1"=>rtrim($ship_address1,","),"ship_address2"=>rtrim($ship_address2,","),"ship_country_name"=>rtrim($ship_country,","),"ship_city_name"=>rtrim($ship_ci_id,","),"ship_state"=>rtrim($ship_state,","),"ship_postalcode"=>$ship_postalcode,'order_transaction_id' =>$orderdet->transaction_id);
				}
			}
			
			if(count($product_order_cod)>0) {
				foreach($product_order_cod as $order_cod_det){
					if($order_cod_det->cod_status==1)
					{
						if (Lang::has($lang_file.'.API_SUCCESS')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_SUCCESS');
						}else{
							$orderstatus = "Success";
						}
						//$orderstatus="success";
					}
					else if($order_cod_det->cod_status==2) 
					{
						if (Lang::has($lang_file.'.API_COMPLETED')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_COMPLETED');
						}else{
							$orderstatus = "Completed";
						}
						//$orderstatus="completed";
					}
					else if($order_cod_det->cod_status==3) 
					{
						if (Lang::has($lang_file.'.API_HOLD')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_HOLD');
						}else{
							$orderstatus = "Hold";
						}
						//$orderstatus="Hold";
					}
					else if($order_cod_det->cod_status==4) 
					{
						if (Lang::has($lang_file.'.API_FAILED')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_FAILED');
						}else{
							$orderstatus = "Failed";
						}
					//$orderstatus="failed";
					}
					if($order_cod_det->delivery_status==1)
					{
						if (Lang::has($lang_file.'.API_ORDER_PLACED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_PLACED');
						}else{
							$delivery_status = "Order placed";
						}			

						
					}
					else if($order_cod_det->delivery_status==2)
					{
						if (Lang::has($lang_file.'.API_ORDER_PACKDED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_PACKED');
						}else{
							$delivery_status = "Order packed";
						}			

						
					}
					else if($order_cod_det->delivery_status==3)
					{
						if (Lang::has($lang_file.'.API_ORDER_DISPATCHED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_DISPATCHED');
						}else{
							$delivery_status = "Order dispatched";
						}			

						
					}
					else if($order_cod_det->delivery_status==4)
					{
						if (Lang::has($lang_file.'.API_ORDER_DELIVERED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_DELIVERED');
						}else{
							$delivery_status = "Order delivered";
						}			

						
					}
					else if($order_cod_det->delivery_status==5)
					{
						if (Lang::has($lang_file.'.API_ORDER_CANCEL_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_CANCEL_PENDING');
						}else{
							$delivery_status = "Order cancel pending";
						}			

						
					}else if($order_cod_det->delivery_status==6)
					{
						if (Lang::has($lang_file.'.API_ORDER_CANCELLED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_CANCELLED');
						}else{
							$delivery_status = "Order cancelled";
						}			

						
					}else if($order_cod_det->delivery_status==7)
					{
						if (Lang::has($lang_file.'.API_ORDER_RETURN_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_RETURN_PENDING');
						}else{
							$delivery_status = "Order return pending";
						}			

						
					}else if($order_cod_det->delivery_status==8)
					{
						if (Lang::has($lang_file.'.API_ORDER_RETURNED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_RETURNED');
						}else{
							$delivery_status = "Order returned";
						}			

						
					}
					else if($order_cod_det->delivery_status==9)
					{
						if (Lang::has($lang_file.'.API_ORDER_REPLACE_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_REPLACE_PENDING');
						}else{
							$delivery_status = "Order replace pending";
						}			

						
					}else if($order_cod_det->delivery_status==10)
					{
						if (Lang::has($lang_file.'.API_ORDER_REPLACED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_REPLACED');
						}else{
							$delivery_status = "Order replaced";
						}			

						
					}
					$product_image="";
					if($order_cod_det->pro_Img !="") {
						$product_img = explode('/**/', $order_cod_det->pro_Img);
						if(file_exists('public/assets/product/'.$product_img[0])){
							$product_image = url('').'/public/assets/product/'.$product_img[0];
						}
					}
	 
					 /*$codtax_amt = ($order_cod_det->cod_amt + $order_cod_det->cod_shipping_amt )*($order_cod_det->cod_tax/100);
									*/
									
					$codtax_amt = round(($order_cod_det->cod_amt )*($order_cod_det->cod_tax/100),2);
					$cod_grand_tot = $order_cod_det->cod_amt + $order_cod_det->cod_shipping_amt + $codtax_amt ;
					$ship_name = "";
					$ship_email = "";
					$ship_phone = "";
					$ship_address1 = "";
					$ship_address2 = "";
					$ship_country = "";
					$ship_ci_id = "";
					$ship_state = "";
					$ship_postalcode = "";
					
					if($order_cod_det->ship_name !="") {
						$ship_name = ucfirst($order_cod_det->ship_name).',';
					}
					if($order_cod_det->ship_email !="") {
						$ship_email = $order_cod_det->ship_email.',';
					}
					if($order_cod_det->ship_phone !="") {
						$ship_phone = $order_cod_det->ship_phone.',';
					}
					if($order_cod_det->ship_address1 !="") {
						$ship_address1 = ucfirst($order_cod_det->ship_address1).',';
					}
					if($order_cod_det->ship_address2 !="") {
						$ship_address2 = ucfirst($order_cod_det->ship_address2).',';
					}
					if($order_cod_det->ship_country !="") {
						$ship_country = ucfirst($order_cod_det->ship_country).',';
					}
					if($order_cod_det->ship_ci_id !="") {
						$ship_ci_id = ucfirst($order_cod_det->ship_ci_id).',';
					}
					if($order_cod_det->ship_state !="") {
						$ship_state = ucfirst($order_cod_det->ship_state).',';
					}
					if($order_cod_det->ship_postalcode !="") {
						$ship_postalcode = $order_cod_det->ship_postalcode;
					}
					//order hipping address
					$order_shipping_add  = $ship_name.''.$ship_email.''.$ship_phone.''.$ship_address1.''.$ship_address2.''.$ship_country.''.$ship_ci_id.''.$ship_state.''.$ship_postalcode;
					
					$order_cod[] = array("order_id"=>$order_cod_det->cod_id,"order_title"=>ucfirst($order_cod_det->pro_title),"product_image"=>$product_image,"order_date"=>$order_cod_det->cod_date,"order_status"=>$orderstatus,"delivery_status"=>$delivery_status,"order_qty"=>$order_cod_det->cod_qty,"order_amount"=>floatval($cod_grand_tot),"order_tax"=>floatval($codtax_amt),"product_currency_code"=>$this->cur_code,"product_currency_symbol"=>$this->cur_symbol,'order_shipping_address' =>$order_shipping_add,"ship_name"=>rtrim($ship_name,","),"ship_email"=>rtrim($ship_email,","),"ship_phone"=>rtrim($ship_phone,","),"ship_address1"=>rtrim($ship_address1,","),"ship_address2"=>rtrim($ship_address2,","),"ship_country_name"=>rtrim($ship_country,","),"ship_city_name"=>rtrim($ship_ci_id,","),"ship_state"=>rtrim($ship_state,","),"ship_postalcode"=>$ship_postalcode,'order_transaction_id' =>$order_cod_det->cod_transaction_id);
				}
			}
			
			/*FOR PAYU MONEY */
			if(count($product_order_payU)>0) {
				foreach($product_order_payU as $orderdet){

					if($validedLang!='') {
						$orderdet->pro_title = $orderdet->$pro_title_dynamic;
					}
					


					if($orderdet->order_status==1)
					{
						if (Lang::has($lang_file.'.API_SUCCESS')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_SUCCESS');
						}else{
							$orderstatus = "Success";
						}			

						//$orderstatus="success";
					}
					else if($orderdet->order_status==2) 
					{
						if (Lang::has($lang_file.'.API_COMPLETED')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_COMPLETED');
						}else{
							$orderstatus = "Completed";
						}
						//$orderstatus="completed";
					}
					else if($orderdet->order_status==3) 
					{
						if (Lang::has($lang_file.'.API_HOLD')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_HOLD');
						}else{
							$orderstatus = "Hold";
						}
						//$orderstatus="Hold";
					}
					else if($orderdet->order_status==4) 
					{
						if (Lang::has($lang_file.'.API_FAILED')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_FAILED');
						}else{
							$orderstatus = "Failed";
						}
						//$orderstatus="failed";
					}
					if($orderdet->delivery_status==1)
					{
						if (Lang::has($lang_file.'.API_ORDER_PLACED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_PLACED');
						}else{
							$delivery_status = "Order placed";
						}			

						//$delivery_status="order placed";
					}
					else if($orderdet->delivery_status==2)
					{
						if (Lang::has($lang_file.'.API_ORDER_PACKDED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_PACKED');
						}else{
							$delivery_status = "Order packed";
						}			

						
					}
					else if($orderdet->delivery_status==3)
					{
						if (Lang::has($lang_file.'.API_ORDER_DISPATCHED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_DISPATCHED');
						}else{
							$delivery_status = "Order dispatched";
						}			

						
					}
					else if($orderdet->delivery_status==4)
					{
						if (Lang::has($lang_file.'.API_ORDER_DELIVERED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_DELIVERED');
						}else{
							$delivery_status = "Order delivered";
						}			

						
					}
					else if($orderdet->delivery_status==5)
					{
						if (Lang::has($lang_file.'.API_ORDER_CANCEL_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_CANCEL_PENDING');
						}else{
							$delivery_status = "Order cancel pending";
						}			

						
					}else if($orderdet->delivery_status==6)
					{
						if (Lang::has($lang_file.'.API_ORDER_CANCELLED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_CANCELLED');
						}else{
							$delivery_status = "Order cancelled";
						}			

						
					}else if($orderdet->delivery_status==7)
					{
						if (Lang::has($lang_file.'.API_ORDER_RETURN_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_RETURN_PENDING');
						}else{
							$delivery_status = "Order return pending";
						}			

						
					}else if($orderdet->delivery_status==8)
					{
						if (Lang::has($lang_file.'.API_ORDER_RETURNED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_RETURNED');
						}else{
							$delivery_status = "Order returned";
						}			

						
					}
					else if($orderdet->delivery_status==9)
					{
						if (Lang::has($lang_file.'.API_ORDER_REPLACE_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_REPLACE_PENDING');
						}else{
							$delivery_status = "Order replace pending";
						}			

						
					}else if($orderdet->delivery_status==10)
					{
						if (Lang::has($lang_file.'.API_ORDER_REPLACED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_REPLACED');
						}else{
							$delivery_status = "Order replaced";
						}			

						
					}
					$product_image="";
					if($orderdet->pro_Img !="") {
						$product_img = explode('/**/', $orderdet->pro_Img);
						if(file_exists('public/assets/product/'.$product_img[0])){
							$product_image = url('').'/public/assets/product/'.$product_img[0];
						}
					}
					//$array = explode(',',$orderdet->order_shipping_add);
					//print_r($array);
					//$order_shipping_add  = array("Ship_name:"=>$array[0],"ship_email"=>$array[1]);
					//$tax_amt = ($orderdet->order_amt + $orderdet->order_shipping_amt )*($orderdet->order_tax/100);
					$tax_amt = round(($orderdet->order_amt)*($orderdet->order_tax/100),2);
					$ord_grand_tot = $orderdet->order_amt + $orderdet->order_shipping_amt + $tax_amt ;
					$ship_name = "";
					$ship_email = "";
					$ship_phone = "";
					$ship_address1 = "";
					$ship_address2 = "";
					$ship_country = "";
					$ship_ci_id = "";
					$ship_state = "";
					$ship_postalcode = "";
					
					if($orderdet->ship_name !="") {
						$ship_name = ucfirst($orderdet->ship_name).',';
					}
					if($orderdet->ship_email !="") {
						$ship_email = $orderdet->ship_email.',';
					}
					if($orderdet->ship_phone !="") {
						$ship_phone = $orderdet->ship_phone.',';
					}
					if($orderdet->ship_address1 !="") {
						$ship_address1 = ucfirst($orderdet->ship_address1).',';
					}
					if($orderdet->ship_address2 !="") {
						$ship_address2 = ucfirst($orderdet->ship_address2).',';
					}
					if($orderdet->ship_country !="") {
						$ship_country = ucfirst($orderdet->ship_country).',';
					}
					if($orderdet->ship_ci_id !="") {
						$ship_ci_id = ucfirst($orderdet->ship_ci_id).',';
					}
					if($orderdet->ship_state !="") {
						$ship_state = ucfirst($orderdet->ship_state).',';
					}
					if($orderdet->ship_postalcode !="") {
						$ship_postalcode = $orderdet->ship_postalcode;
					}
					//order shipping address
					$order_shipping_add  = $ship_name.''.$ship_email.''.$ship_phone.''.$ship_address1.''.$ship_address2.''.$ship_country.''.$ship_ci_id.''.$ship_state.''.$ship_postalcode;

					$order_payU[] = array("order_id"=>$orderdet->order_id,"order_title"=>ucfirst($orderdet->pro_title),"product_image"=>$product_image,"order_date"=>$orderdet->order_date,"order_status"=>$orderstatus,"delivery_status"=>$delivery_status,"order_qty"=>$orderdet->order_qty,"order_amount"=>floatval($ord_grand_tot),"order_tax"=>floatval($orderdet->order_tax),"product_currency_code"=>$this->cur_code,"product_currency_symbol"=>$this->cur_symbol,'order_shipping_address' =>$order_shipping_add,"ship_name"=>rtrim($ship_name,","),"ship_email"=>rtrim($ship_email,","),"ship_phone"=>rtrim($ship_phone,","),"ship_address1"=>rtrim($ship_address1,","),"ship_address2"=>rtrim($ship_address2,","),"ship_country_name"=>rtrim($ship_country,","),"ship_city_name"=>rtrim($ship_ci_id,","),"ship_state"=>rtrim($ship_state,","),"ship_postalcode"=>$ship_postalcode,'order_transaction_id' =>$orderdet->transaction_id);
				}
			}
			/* EOF Payumoney */ 
			
			/* Deal order starts */
			$deal_order  = MobileModel::getdealordersdetails($pageno,$user_id);
			$deal_order_cod  = MobileModel::getdealorders_cod_details($pageno,$user_id);
			$deal_order_payU = MobileModel::getdealorders_payU_details($pageno,$user_id);
			//print_r($deal_order);
			//print(count($deal_order_cod));
			if(count($deal_order)>0) {
				foreach($deal_order as $deal_orderdet){
					if($deal_orderdet->order_status==1)
					{
						if (Lang::has($lang_file.'.API_SUCCESS')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_SUCCESS');
						}else{
							$orderstatus = "Success";
						}
						//$orderstatus="success";
					}
					else if($deal_orderdet->order_status==2) 
					{
						if (Lang::has($lang_file.'.API_COMPLETED')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_COMPLETED');
						}else{
							$orderstatus = "Completed";
						}
						//$orderstatus="completed";
					}
					else if($deal_orderdet->order_status==3) 
					{
						if (Lang::has($lang_file.'.API_HOLD')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_HOLD');
						}else{
							$orderstatus = "Hold";
						}
						//$orderstatus="Hold";
					}
					else if($deal_orderdet->order_status==4) 
					{
						if (Lang::has($lang_file.'.API_FAILED')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_FAILED');
						}else{
							$orderstatus = "Failed";
						}
						//$orderstatus="failed";
					}
					if($deal_orderdet->delivery_status==1)
					{
						if (Lang::has($lang_file.'.API_ORDER_PLACED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_PLACED');
						}else{
							$delivery_status = "Order placed";
						}			

						//$delivery_status="order placed";
					}
					else if($deal_orderdet->delivery_status==2)
					{
						if (Lang::has($lang_file.'.API_ORDER_PACKDED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_PACKED');
						}else{
							$delivery_status = "Order packed";
						}			

						
					}
					else if($deal_orderdet->delivery_status==3)
					{
						if (Lang::has($lang_file.'.API_ORDER_DISPATCHED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_DISPATCHED');
						}else{
							$delivery_status = "Order dispatched";
						}			

						
					}
					else if($deal_orderdet->delivery_status==4)
					{
						if (Lang::has($lang_file.'.API_ORDER_DELIVERED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_DELIVERED');
						}else{
							$delivery_status = "Order delivered";
						}			

						
					}
					else if($deal_orderdet->delivery_status==5)
					{
						if (Lang::has($lang_file.'.API_ORDER_CANCEL_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_CANCEL_PENDING');
						}else{
							$delivery_status = "Order cancel pending";
						}			

						
					}else if($deal_orderdet->delivery_status==6)
					{
						if (Lang::has($lang_file.'.API_ORDER_CANCELLED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_CANCELLED');
						}else{
							$delivery_status = "Order cancelled";
						}			

						
					}else if($deal_orderdet->delivery_status==7)
					{
						if (Lang::has($lang_file.'.API_ORDER_RETURN_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_RETURN_PENDING');
						}else{
							$delivery_status = "Order return pending";
						}			

						
					}else if($deal_orderdet->delivery_status==8)
					{
						if (Lang::has($lang_file.'.API_ORDER_RETURNED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_RETURNED');
						}else{
							$delivery_status = "Order returned";
						}			

						
					}
					else if($deal_orderdet->delivery_status==9)
					{
						if (Lang::has($lang_file.'.API_ORDER_REPLACE_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_REPLACE_PENDING');
						}else{
							$delivery_status = "Order replace pending";
						}			

						
					}else if($deal_orderdet->delivery_status==10)
					{
						if (Lang::has($lang_file.'.API_ORDER_REPLACED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_REPLACED');
						}else{
							$delivery_status = "Order replaced";
						}			

						
					}
					$deal_image="";
					if($deal_orderdet->deal_image !="") {
						$deal_img = explode('/**/', $deal_orderdet->deal_image);
						if(file_exists('public/assets/deals/'.$deal_img[0])){
							$deal_image = url('').'/public/assets/deals/'.$deal_img[0];
						}
					}
	 
					/*$deal_tax_amt = ($orderdet->order_amt + $orderdet->order_shipping_amt )*($orderdet->order_tax/100);*/
					$deal_tax_amt = round(($deal_orderdet->order_amt )*($deal_orderdet->order_tax/100),2);
					$deal_ord_grand_tot = $deal_orderdet->order_amt + $deal_orderdet->order_shipping_amt + $deal_tax_amt ;
					//echo $orderdet->order_amt;echo ' == '.$orderdet->order_shipping_amt;echo $deal_ord_grand_tot;exit();
					$ship_name = "";
					$ship_email = "";
					$ship_phone = "";
					$ship_address1 = "";
					$ship_address2 = "";
					$ship_country = "";
					$ship_ci_id = "";
					$ship_state = "";
					$ship_postalcode = "";
					
					if($deal_orderdet->ship_name !="") {
						$ship_name = ucfirst($deal_orderdet->ship_name).',';
					}
					if($deal_orderdet->ship_email !="") {
						$ship_email = $deal_orderdet->ship_email.',';
					}
					if($deal_orderdet->ship_phone !="") {
						$ship_phone = $deal_orderdet->ship_phone.',';
					}
					if($deal_orderdet->ship_address1 !="") {
						$ship_address1 = ucfirst($deal_orderdet->ship_address1).',';
					}
					if($deal_orderdet->ship_address2 !="") {
						$ship_address2 = ucfirst($deal_orderdet->ship_address2).',';
					}
					if($deal_orderdet->ship_country !="") {
						$ship_country = ucfirst($deal_orderdet->ship_country).',';
					}
					if($deal_orderdet->ship_ci_id !="") {
						$ship_ci_id = ucfirst($deal_orderdet->ship_ci_id).',';
					}
					if($deal_orderdet->ship_state !="") {
						$ship_state = ucfirst($deal_orderdet->ship_state).',';
					}
					if($deal_orderdet->ship_postalcode !="") {
						$ship_postalcode = $deal_orderdet->ship_postalcode;
					}
					//Order shipping address
					$order_shipping_add  = $ship_name.''.$ship_email.''.$ship_phone.''.$ship_address1.''.$ship_address2.''.$ship_country.''.$ship_ci_id.''.$ship_state.''.$ship_postalcode;
					
					$dealorder[] = array("order_id"=>$deal_orderdet->order_id,"order_title"=>ucfirst($deal_orderdet->deal_title),"deal_image"=>$deal_image,"order_date"=>$deal_orderdet->order_date,"order_status"=>$orderstatus,"delivery_status"=>$delivery_status,"order_qty"=>$deal_orderdet->order_qty,"order_amount"=>floatval($deal_ord_grand_tot),"order_tax"=>floatval($deal_tax_amt),"product_currency_code"=>$this->cur_code,"product_currency_symbol"=>$this->cur_symbol,'order_shipping_address' =>$order_shipping_add,"ship_name"=>rtrim($ship_name,","),"ship_email"=>rtrim($ship_email,","),"ship_phone"=>rtrim($ship_phone,","),"ship_address1"=>rtrim($ship_address1,","),"ship_address2"=>rtrim($ship_address2,","),"ship_country_name"=>rtrim($ship_country,","),"ship_city_name"=>rtrim($ship_ci_id,","),"ship_state"=>rtrim($ship_state,","),"ship_postalcode"=>$ship_postalcode,'order_transaction_id' =>$deal_orderdet->transaction_id);
				}
			}
			
			if(count($deal_order_cod)>0) {
				foreach($deal_order_cod as $deal_order_cod_det){
					if($deal_order_cod_det->cod_status==1)
					{
						if (Lang::has($lang_file.'.API_SUCCESS')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_SUCCESS');
						}else{
							$orderstatus = "Success";
						}
						//$orderstatus="success";
					}
					else if($deal_order_cod_det->cod_status==2) 
					{
						if (Lang::has($lang_file.'.API_COMPLETED')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_COMPLETED');
						}else{
							$orderstatus = "Completed";
						}
						
						//$orderstatus="completed";
					}
					else if($deal_order_cod_det->cod_status==3) 
					{
						if (Lang::has($lang_file.'.API_HOLD')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_HOLD');
						}else{
							$orderstatus = "Hold";
						}
						//$orderstatus="Hold";
					}
					else if($deal_order_cod_det->cod_status==4) 
					{
						if (Lang::has($lang_file.'.API_FAILED')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_FAILED');
						}else{
							$orderstatus = "Failed";
						}
						//$orderstatus="failed";
					}
					if($deal_order_cod_det->delivery_status==1)
					{
						if (Lang::has($lang_file.'.API_ORDER_PLACED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_PLACED');
						}else{
							$delivery_status = "Order placed";
						}			

						
					}
					else if($deal_order_cod_det->delivery_status==2)
					{
						if (Lang::has($lang_file.'.API_ORDER_PACKDED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_PACKED');
						}else{
							$delivery_status = "Order packed";
						}			

						
					}
					else if($deal_order_cod_det->delivery_status==3)
					{
						if (Lang::has($lang_file.'.API_ORDER_DISPATCHED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_DISPATCHED');
						}else{
							$delivery_status = "Order dispatched";
						}			

						
					}
					else if($deal_order_cod_det->delivery_status==4)
					{
						if (Lang::has($lang_file.'.API_ORDER_DELIVERED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_DELIVERED');
						}else{
							$delivery_status = "Order delivered";
						}			

						
					}
					else if($deal_order_cod_det->delivery_status==5)
					{
						if (Lang::has($lang_file.'.API_ORDER_CANCEL_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_CANCEL_PENDING');
						}else{
							$delivery_status = "Order cancel pending";
						}			

						
					}else if($deal_order_cod_det->delivery_status==6)
					{
						if (Lang::has($lang_file.'.API_ORDER_CANCELLED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_CANCELLED');
						}else{
							$delivery_status = "Order cancelled";
						}			

						
					}else if($deal_order_cod_det->delivery_status==7)
					{
						if (Lang::has($lang_file.'.API_ORDER_RETURN_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_RETURN_PENDING');
						}else{
							$delivery_status = "Order return pending";
						}			

						
					}else if($deal_order_cod_det->delivery_status==8)
					{
						if (Lang::has($lang_file.'.API_ORDER_RETURNED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_RETURNED');
						}else{
							$delivery_status = "Order returned";
						}			

						
					}
					else if($deal_order_cod_det->delivery_status==9)
					{
						if (Lang::has($lang_file.'.API_ORDER_REPLACE_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_REPLACE_PENDING');
						}else{
							$delivery_status = "Order replace pending";
						}			

						
					}else if($deal_order_cod_det->delivery_status==10)
					{
						if (Lang::has($lang_file.'.API_ORDER_REPLACED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_REPLACED');
						}else{
							$delivery_status = "Order replaced";
						}			

						
					}
					$deal_image="";
					if($deal_order_cod_det->deal_image !="") {
						$deal_img = explode('/**/', $deal_order_cod_det->deal_image);
						if(file_exists('public/assets/deals/'.$deal_img[0])){
							$deal_image = url('').'/assets/deals/'.$deal_img[0];
						}
					}
	 
					/*$deal_codtax_amt = ($deal_order_cod_det->cod_amt + $deal_order_cod_det->cod_shipping_amt )*($deal_order_cod_det->cod_tax/100);*/
					$deal_codtax_amt = round(($deal_order_cod_det->cod_amt )*($deal_order_cod_det->cod_tax/100),2);
					$deal_cod_grand_tot = $deal_order_cod_det->cod_amt + $deal_order_cod_det->cod_shipping_amt + $deal_codtax_amt ;
					$ship_name = "";
					$ship_email = "";
					$ship_phone = "";
					$ship_address1 = "";
					$ship_address2 = "";
					$ship_country = "";
					$ship_ci_id = "";
					$ship_state = "";
					$ship_postalcode = "";
					
					if($deal_order_cod_det->ship_name !="") {
						$ship_name = ucfirst($deal_order_cod_det->ship_name).',';
					}
					if($deal_order_cod_det->ship_email !="") {
						$ship_email = $deal_order_cod_det->ship_email.',';
					}
					if($deal_order_cod_det->ship_phone !="") {
						$ship_phone = $deal_order_cod_det->ship_phone.',';
					}
					if($deal_order_cod_det->ship_address1 !="") {
						$ship_address1 = ucfirst($deal_order_cod_det->ship_address1).',';
					}
					if($deal_order_cod_det->ship_address2 !="") {
						$ship_address2 = ucfirst($deal_order_cod_det->ship_address2).',';
					}
					if($deal_order_cod_det->ship_country !="") {
						$ship_country = ucfirst($deal_order_cod_det->ship_country).',';
					}
					if($deal_order_cod_det->ship_ci_id !="") {
						$ship_ci_id = ucfirst($deal_order_cod_det->ship_ci_id).',';
					}
					if($deal_order_cod_det->ship_state !="") {
						$ship_state = ucfirst($deal_order_cod_det->ship_state).',';
					}
					if($deal_order_cod_det->ship_postalcode !="") {
						$ship_postalcode = $deal_order_cod_det->ship_postalcode;
					}
					//Order shipping address
					$order_shipping_add  = $ship_name.''.$ship_email.''.$ship_phone.''.$ship_address1.''.$ship_address2.''.$ship_country.''.$ship_ci_id.''.$ship_state.''.$ship_postalcode;
					
					$dealorder_cod[] = array("order_id"=>$deal_order_cod_det->cod_id,"order_title"=>ucfirst($deal_order_cod_det->deal_title),"deal_image"=>$deal_image,"order_date"=>$deal_order_cod_det->cod_date,"order_status"=>$orderstatus,"delivery_status"=>$delivery_status,"order_qty"=>$deal_order_cod_det->cod_qty,"order_amount"=>floatval($deal_cod_grand_tot),"order_tax"=>floatval($deal_codtax_amt),"product_currency_code"=>$this->cur_code,"product_currency_symbol"=>$this->cur_symbol,'order_shipping_address' =>$order_shipping_add,"ship_name"=>rtrim($ship_name,","),"ship_email"=>rtrim($ship_email,","),"ship_phone"=>rtrim($ship_phone,","),"ship_address1"=>rtrim($ship_address1,","),"ship_address2"=>rtrim($ship_address2,","),"ship_country_name"=>rtrim($ship_country,","),"ship_city_name"=>rtrim($ship_ci_id,","),"ship_state"=>rtrim($ship_state,","),"ship_postalcode"=>$ship_postalcode,'order_transaction_id' =>$deal_order_cod_det->cod_transaction_id);
				}
			}
			
			if(count($deal_order_payU)>0) {
				foreach($deal_order_payU as $deal_orderdet){
					if($deal_orderdet->order_status==1)
					{
						if (Lang::has($lang_file.'.API_SUCCESS')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_SUCCESS');
						}else{
							$orderstatus = "Success";
						}
						//$orderstatus="success";
					}
					else if($deal_orderdet->order_status==2) 
					{
						if (Lang::has($lang_file.'.API_COMPLETED')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_COMPLETED');
						}else{
							$orderstatus = "Completed";
						}
						//$orderstatus="completed";
					}
					else if($deal_orderdet->order_status==3) 
					{
						if (Lang::has($lang_file.'.API_HOLD')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_HOLD');
						}else{
							$orderstatus = "Hold";
						}
						//$orderstatus="Hold";
					}
					else if($deal_orderdet->order_status==4) 
					{
						if (Lang::has($lang_file.'.API_FAILED')!= '') 
						{ 
							$orderstatus 	=  trans($lang_file.'.API_FAILED');
						}else{
							$orderstatus = "Failed";
						}
						//$orderstatus="failed";
					}
					if($deal_orderdet->delivery_status==1)
					{
						if (Lang::has($lang_file.'.API_ORDER_PLACED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_PLACED');
						}else{
							$delivery_status = "Order placed";
						}			

						//$delivery_status="order placed";
					}
					else if($deal_orderdet->delivery_status==2)
					{
						if (Lang::has($lang_file.'.API_ORDER_PACKDED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_PACKED');
						}else{
							$delivery_status = "Order packed";
						}			

						
					}
					else if($deal_orderdet->delivery_status==3)
					{
						if (Lang::has($lang_file.'.API_ORDER_DISPATCHED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_DISPATCHED');
						}else{
							$delivery_status = "Order dispatched";
						}			

						
					}
					else if($deal_orderdet->delivery_status==4)
					{
						if (Lang::has($lang_file.'.API_ORDER_DELIVERED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_DELIVERED');
						}else{
							$delivery_status = "Order delivered";
						}			

						
					}
					else if($deal_orderdet->delivery_status==5)
					{
						if (Lang::has($lang_file.'.API_ORDER_CANCEL_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_CANCEL_PENDING');
						}else{
							$delivery_status = "Order cancel pending";
						}			

						
					}else if($deal_orderdet->delivery_status==6)
					{
						if (Lang::has($lang_file.'.API_ORDER_CANCELLED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_CANCELLED');
						}else{
							$delivery_status = "Order cancelled";
						}			

						
					}else if($deal_orderdet->delivery_status==7)
					{
						if (Lang::has($lang_file.'.API_ORDER_RETURN_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_RETURN_PENDING');
						}else{
							$delivery_status = "Order return pending";
						}			

						
					}else if($deal_orderdet->delivery_status==8)
					{
						if (Lang::has($lang_file.'.API_ORDER_RETURNED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_RETURNED');
						}else{
							$delivery_status = "Order returned";
						}			

						
					}
					else if($deal_orderdet->delivery_status==9)
					{
						if (Lang::has($lang_file.'.API_ORDER_REPLACE_PENDING')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_REPLACE_PENDING');
						}else{
							$delivery_status = "Order replace pending";
						}			

						
					}else if($deal_orderdet->delivery_status==10)
					{
						if (Lang::has($lang_file.'.API_ORDER_REPLACED')!= '') 
						{ 
							$delivery_status 	=  trans($lang_file.'.API_ORDER_REPLACED');
						}else{
							$delivery_status = "Order replaced";
						}			

						
					}
					$deal_image="";
					if($deal_orderdet->deal_image !="") {
						$deal_img = explode('/**/', $deal_orderdet->deal_image);
						if(file_exists('public/assets/deals/'.$deal_img[0])){
							$deal_image = url('').'/public/assets/deals/'.$deal_img[0];
						}
					}
	 
					/*$deal_tax_amt = ($orderdet->order_amt + $orderdet->order_shipping_amt )*($orderdet->order_tax/100);*/
					$deal_tax_amt = round(($deal_orderdet->order_amt )*($deal_orderdet->order_tax/100),2);
					$deal_ord_grand_tot = $deal_orderdet->order_amt + $deal_orderdet->order_shipping_amt + $deal_tax_amt ;
					//echo $orderdet->order_amt;echo ' == '.$orderdet->order_shipping_amt;echo $deal_ord_grand_tot;exit();
					$ship_name = "";
					$ship_email = "";
					$ship_phone = "";
					$ship_address1 = "";
					$ship_address2 = "";
					$ship_country = "";
					$ship_ci_id = "";
					$ship_state = "";
					$ship_postalcode = "";
					
					if($deal_orderdet->ship_name !="") {
						$ship_name = ucfirst($deal_orderdet->ship_name).',';
					}
					if($deal_orderdet->ship_email !="") {
						$ship_email = $deal_orderdet->ship_email.',';
					}
					if($deal_orderdet->ship_phone !="") {
						$ship_phone = $deal_orderdet->ship_phone.',';
					}
					if($deal_orderdet->ship_address1 !="") {
						$ship_address1 = ucfirst($deal_orderdet->ship_address1).',';
					}
					if($deal_orderdet->ship_address2 !="") {
						$ship_address2 = ucfirst($deal_orderdet->ship_address2).',';
					}
					if($deal_orderdet->ship_country !="") {
						$ship_country = ucfirst($deal_orderdet->ship_country).',';
					}
					if($deal_orderdet->ship_ci_id !="") {
						$ship_ci_id = ucfirst($deal_orderdet->ship_ci_id).',';
					}
					if($deal_orderdet->ship_state !="") {
						$ship_state = ucfirst($deal_orderdet->ship_state).',';
					}
					if($deal_orderdet->ship_postalcode !="") {
						$ship_postalcode = $deal_orderdet->ship_postalcode;
					}
					//Order shipping address
					$order_shipping_add  = $ship_name.''.$ship_email.''.$ship_phone.''.$ship_address1.''.$ship_address2.''.$ship_country.''.$ship_ci_id.''.$ship_state.''.$ship_postalcode;
					
					$dealorder_payU[] = array("order_id"=>$deal_orderdet->order_id,"order_title"=>ucfirst($deal_orderdet->deal_title),"deal_image"=>$deal_image,"order_date"=>$deal_orderdet->order_date,"order_status"=>$orderstatus,"delivery_status"=>$delivery_status,"order_qty"=>$deal_orderdet->order_qty,"order_amount"=>floatval($deal_ord_grand_tot),"order_tax"=>floatval($deal_tax_amt),"product_currency_code"=>$this->cur_code,"product_currency_symbol"=>$this->cur_symbol,'order_shipping_address' =>$order_shipping_add,"ship_name"=>rtrim($ship_name,","),"ship_email"=>rtrim($ship_email,","),"ship_phone"=>rtrim($ship_phone,","),"ship_address1"=>rtrim($ship_address1,","),"ship_address2"=>rtrim($ship_address2,","),"ship_country_name"=>rtrim($ship_country,","),"ship_city_name"=>rtrim($ship_ci_id,","),"ship_state"=>rtrim($ship_state,","),"ship_postalcode"=>$ship_postalcode,'order_transaction_id' =>$deal_orderdet->transaction_id);
				}
			}
			
			/* Deal order ends */
			if((count($product_order)==0) && (count($product_order_cod)==0) && (count($product_order_payU)==0) && (count($deal_order)==0) && (count($deal_order_cod)==0) && (count($deal_order_payU)==0)) {
				if (Lang::has($lang_file.'.API_ORDER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_NOT_AVAILABLE');
				}else{
					$msge = "Order not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} else {
				if (Lang::has($lang_file.'.API_ORDER_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_AVAILABLE');
				}else{
					$msge = "Order available!";
				}
				$encode = array("status"=>200,"message"=>$msge,"product_order_list"=>$order,"product_order_cod_list"=>$order_cod,"product_order_payU_list"=>$order_payU,"deal_order_list"=>$dealorder,"deal_order_cod_list"=>$dealorder_cod,"deal_order_payU_list"=>$dealorder_payU);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}
	/* SHOP LISTING */
	public function shop_list()
	{
		$pageno = Input::get('pageno');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file   = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$stor_name_dynamic 	= 'stor_name_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */
		
		$shop_details  = MobileModel::get_all_shop_details($pageno);
		//dd(DB::getQueryLog());
		$product_count =0;
		$deal_count =0;
		if(count($shop_details)>0) {
			foreach($shop_details as $s){


				if($validedLang!='') {
					$s->stor_name = $s->$stor_name_dynamic;
				}


				$storeid = $s->stor_id;
				$store_image= "";
				if($s->stor_img !=""){
					if(file_exists('public/assets/storeimage/'.$s->stor_img)){
						$store_image = url('').'/public/assets/storeimage/'.$s->stor_img;
					}
				}
				$product_count = MobileModel::get_product_count_by_shop($storeid);
				$deal_count = MobileModel::get_deal_count_by_shop($storeid);
				$shop_list[] = array("store_id"=>intval($s->stor_id),"store_name"=>ucfirst($s->stor_name),"store_img"=>$store_image,"store_status"=>$s->stor_status,"product_count"=>$product_count,"deal_count"=>$deal_count);
				
			}
			if (Lang::has($lang_file.'.API_STORE_AVAILABLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_STORE_AVAILABLE');
			}else{
				$msge = "Store available!";
			}
			$encode = array("status"=>200,"message"=>$msge,"store_details"=>$shop_list);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			if (Lang::has($lang_file.'.API_NO_STORE_AVAILABLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_NO_STORE_AVAILABLE');
			}else{
				$msge = "No Store available!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		}
	}
	/* SHOP DETAILS PAGE */
	public function shop_detail()
	{
		$shopid = Input::get('shopid');
		$user_id = Input::get('user_id');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file   = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} 
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
				$deal_title_dynamic = 'deal_title_'.$lang;
				$stor_name_dynamic 	= 'stor_name_'.$lang;
				$stor_metadesc_dynamic 		= 'stor_metadesc_'.$lang;
				$stor_metakeywords_dynamic 	= 'stor_metakeywords_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


		if($shopid ==""){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else if($shopid ==0){
			if (Lang::has($lang_file.'.API_INVALID_VALUE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_VALUE');
			}else{
				$msge = "Invalid value!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			$shop_details  = MobileModel::get_all_shop_details_page($shopid);
			if(count($shop_details)>0) {
				foreach($shop_details as $s){

					if($validedLang!='') {
						$s->stor_name 			= $s->$stor_name_dynamic;
						$s->stor_metakeywords 	= $s->$stor_metakeywords_dynamic;
						$s->stor_metadesc 		= $s->$stor_metadesc_dynamic;
						$s->ci_name 			= $s->$ci_name_dynamic;
						$s->co_name 			= $s->$co_name_dynamic;
						
					}


					$store_image= "";
					if($s->stor_img !=""){
						$store_image = url('').'/public/assets/storeimage/'.$s->stor_img;
					}
					$shop_list[] = array("store_id"=>intval($s->stor_id),"store_name"=>ucfirst($s->stor_name),"store_phone"=>$s->stor_phone,"store_address1"=>ucfirst($s->stor_address1),"store_address2"=>ucfirst($s->stor_address2),"store_zipcode"=>$s->stor_zipcode,"store_website"=>$s->stor_website,"store_latitude"=>$s->stor_latitude,"store_longitude"=>$s->stor_longitude,"store_metakeywords"=>$s->stor_metakeywords,"store_metadesc"=>ucfirst($s->stor_metadesc),"store_country_id"=>$s->stor_country,"store_country_name"=>ucfirst($s->co_name),"store_city_id"=>$s->stor_city,"store_city_name"=>ucfirst($s->ci_name),"store_merchant_id"=>intval($s->stor_merchant_id),"store_merchant_name"=>ucfirst($s->mer_fname.' '.$s->mer_lname),"store_img"=>$store_image,"store_status"=>$s->stor_status);
					
					/* product starts */
					$productlist = array();
					$product_details = MobileModel::get_store_product_list($s->stor_id);
					if(count($product_details)>0) {
						foreach($product_details as $pop){

							if($validedLang!='') {
								
								$pop->pro_title 		= $pop->$pro_title_dynamic;
							}


							$is_wishlist = false;
							if($user_id !="" && $user_id !=0){
								$get_wish_list = MobileModel::get_product_wishlist($pop->pro_id,$user_id);
								if(count($get_wish_list)>0){
									$is_wishlist = true;
								}
							}

							$product_image="";
							if($pop->pro_Img !="") {
								$product_img = explode('/**/', $pop->pro_Img);
								if(file_exists('public/assets/product/'.$product_img[0])){
									$product_image = url('').'/public/assets/product/'.$product_img[0];
								}
							}
							$productlist[] = array("product_id"=>intval($pop->pro_id),"product_title"=>ucfirst($pop->pro_title),"product_price"=>floatval($pop->pro_price),"product_discount_price"=>floatval($pop->pro_disprice),"product_percentage"=>intval($pop->pro_discount_percentage),"pro_no_of_purchase"=>$pop->pro_no_of_purchase,"pro_qty"=>$pop->pro_qty,"product_image"=>$product_image,"is_wishlist"=>$is_wishlist,"currency_symbol"=>$this->cur_symbol,"currency_code"=>$this->cur_code);
						}
					}
					/* product ends */
					/* Deal starts */
					$deal_list = array();
					$deal_details  = MobileModel::get_store_deals_details($s->stor_id);	
					if(count($deal_details)>0) {
						foreach($deal_details as $d){
							if($validedLang!='') {
								
								$d->deal_title 		= $d->$deal_title_dynamic;
							}
							$deal_image="";
							if($d->deal_image !="") {
								$deal_img = explode('/**/', $d->deal_image);
								if(file_exists('public/assets/deals/'.$deal_img[0])){
									$deal_image = url('').'/public/assets/deals/'.$deal_img[0];
								}
							}
							$date = date('Y-m-d H:i:s');
							$purchase_count = $d->deal_max_limit - $d->deal_no_of_purchase;
							if($d->deal_end_date > $date && $purchase_count > 0) {
								$status = "Not sold";
							} else if($d->deal_end_date < $date || $purchase_count <= 0) {
								$status = "Sold";	
							}
							
							 $ios_deal_start_date = date('d/m/Y h:i:s',strtotime($d->deal_start_date));
							 $ios_deal_end_date = date('d/m/Y h:i:s',strtotime($d->deal_end_date));
							 $ios_deal_expiry_date = date('d/m/Y h:i:s',strtotime($d->deal_expiry_date));
							 
							$deal_list[] = array("deal_id"=>intval($d->deal_id),"deal_title"=>ucfirst($d->deal_title),"deal_original_price"=>floatval($d->deal_original_price),"deal_discount_price"=>floatval($d->deal_discount_price),"deal_discount_percentage"=>intval($d->deal_discount_percentage),"deal_saving_price"=>floatval($d->deal_saving_price),"deal_currency_code"=>$this->cur_code,"deal_currency_symbol"=>$this->cur_symbol,"deal_start_date"=>$d->deal_start_date,"deal_end_date"=>$d->deal_end_date,"deal_expiry_date"=>$d->deal_expiry_date,"ios_deal_start_date"=>$ios_deal_start_date,"ios_deal_end_date"=>$ios_deal_end_date,"ios_deal_expiry_date"=>$ios_deal_expiry_date,"deal_shop_id"=>intval($d->deal_shop_id),"deal_image"=>$deal_image,"deal_activeorexpire_status"=>$status,"deal_status"=>$d->deal_status);

							

						}
					}
					/* Deal ends */
					/* Branch starts */
					
					$branch_det = MobileModel::get_branch_details($s->stor_merchant_id,$s->stor_id);
					$branch_list = array();
					if(count($branch_det)>0) {
						foreach($branch_det as $b){
							if($validedLang!='') {
								$b->stor_name 			= $b->$stor_name_dynamic;								
							}
							$product_count = MobileModel::get_product_count_by_shop($b->stor_id);
							$deal_count = MobileModel::get_deal_count_by_shop($b->stor_id);
							$branchstore_image= "";
							if($b->stor_img !=""){
								if(file_exists('public/assets/storeimage/'.$b->stor_img)){
									$branchstore_image = url('').'/assets/storeimage/'.$b->stor_img;
								}
							}
							$branch_list[] = array("store_id"=>intval($b->stor_id),"store_name"=>ucfirst($b->stor_name),"store_img"=>$branchstore_image,"store_status"=>$b->stor_status,"product_count"=>$product_count,"deal_count"=>$deal_count);
						}
					}
					/* Branch ends */
					/* Review starts */
					$review = array();
					$review_details  = MobileModel::get_store_reviews($s->stor_id);
					if(count($review_details)>0) {
						foreach($review_details as $r) {
							if($r->cus_name !="") {	$cus_name = $r->cus_name;} else { $cus_name = ""; }
							if($r->title !="") {	$title = $r->title;} else { $title = ""; }
							if($r->comments !="") {	$comments = $r->comments;} else { $comments = ""; }
							$user_image= "";
							if($r->cus_pic !=""){
								if(file_exists('public/assets/profileimage/'.$r->cus_pic)){
									$user_image = url('')."/assets/profileimage/".$r->cus_pic;
								}
							}
							$review[] = array("review_title"=>ucfirst($title),"review_comments"=>ucfirst($comments),"ratings"=>$r->ratings,"review_date"=>$r->review_date,"user_id"=>intval($r->customer_id),"user_name"=>ucfirst($cus_name),"user_img"=>$user_image);
						}
					}
					/* Review ends */
				}
				if (Lang::has($lang_file.'.API_STORE_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_STORE_AVAILABLE');
				}else{
					$msge = "Store available!";
				}
				$encode = array("status"=>200,"message"=>$msge,"store_details"=>$shop_list,"product_list_by_shop"=>$productlist,"deal_list_by_shop"=>$deal_list,"branch_list"=>$branch_list,"store_review"=>$review);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} else {
				if (Lang::has($lang_file.'.API_NO_STORE_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_STORE_AVAILABLE');
				}else{
					$msge = "No Store available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}
	/* SHOP LISTING */
	public function nearby_shop_list()
	{
		$pageno = Input::get('pageno');

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang 	= '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;	
				App::setLocale($lang); //set locale value			
				$lang_file = $lang.$this->mob_lang_file_sufix;				
				$stor_name_dynamic 	= 'stor_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */
		
		$shop_details  = MobileModel::get_all_shop_details($pageno);
		//dd(DB::getQueryLog());
		$product_count =0;
		$deal_count =0;
		if(count($shop_details)>0) {
			foreach($shop_details as $s){

				if($validedLang!='') {
					
					$s->stor_name  = $s->$stor_name_dynamic;
				}


				$storeid = $s->stor_id;
				$store_image= "";
				if($s->stor_img !=""){
					if(file_exists('public/assets/storeimage/'.$s->stor_img)){
						$store_image = url('').'/public/assets/storeimage/'.$s->stor_img;
					}
				}
				$product_count = MobileModel::get_product_count_by_shop($storeid);
				$deal_count = MobileModel::get_deal_count_by_shop($storeid);
				$shop_list[] = array("store_id"=>intval($s->stor_id),"store_name"=>ucfirst($s->stor_name),"store_img"=>$store_image,"store_status"=>$s->stor_status,"store_latitude"=>$s->stor_latitude,"store_longitude"=>$s->stor_longitude,"product_count"=>$product_count,"deal_count"=>$deal_count);
				
			}
			if (Lang::has($lang_file.'.API_STORE_AVAILABLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_STORE_AVAILABLE');
			}else{
				$msge = "Store available!";
			}
			$encode = array("status"=>200,"message"=>$msge,"store_details"=>$shop_list);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			if (Lang::has($lang_file.'.API_NO_STORE_AVAILABLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_NO_STORE_AVAILABLE');
			}else{
				$msge = "No Store available!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		}
	}
	/* Write review  for products */
	public function product_review()
	{
		$customer_id = Input::get('user_id');
        $product_id = Input::get('product_id');
        $title      = Input::get('title');
        $comments   = Input::get('comments');
        $ratings    = Input::get('ratings');

        $lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang 	= '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;	
				App::setLocale($lang); //set locale value			
				$lang_file = $lang.$this->mob_lang_file_sufix;				
				$stor_name_dynamic 	= 'stor_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


      	if($customer_id =="" || $product_id =="" || $title=="" || $comments =="" || $ratings ==""){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else if($customer_id ==0 || $product_id ==0 ){
			if (Lang::has($lang_file.'.API_INVALID_VALUE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_VALUE');
			}else{
				$msge = "Invalid value!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} 
		$get_user_details = MobileModel::get_user_details($customer_id);
		$get_product_exists = MobileModel::get_product_exists($product_id);
		if(count($get_user_details)==0) {
			if (Lang::has($lang_file.'.API_INVALID_USER_DETAILS')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_USER_DETAILS');
			}else{
				$msge = "Invalid User Details!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		if(count($get_product_exists)==0) {
			if (Lang::has($lang_file.'.API_INVALID_PORDUCT_DETAILS')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_PORDUCT_DETAILS');
			}else{
				$msge = "Invalid Product details!";
			}
			
		   $encode = array("status"=>400,"message"=>$msge);
		   return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
        $entry = array(
	        'customer_id' => Input::get('user_id'),
    		'product_id' => Input::get('product_id'),
            'title' => Input::get('title'),
            'comments' => Input::get('comments'),
            'ratings' => Input::get('ratings')
        );
        $comments = MobileModel::comment_insert($entry);
        /* Review starts */
		$review = array();
		$review_details  = MobileModel::get_product_reviews_by_id($product_id,$comments);
		if(count($review_details)>0) {
			foreach($review_details as $r) {
				if($r->cus_name !="") {	$cus_name = $r->cus_name;} else { $cus_name = ""; }
				if($r->title !="") {	$title = $r->title;} else { $title = ""; }
				if($r->comments !="") {	$comments = $r->comments;} else { $comments = ""; }
				if($r->cus_pic !="") {
					if(file_exists('public/assets/profileimage/'.$r->cus_pic)){
						$user_img = url('').'/public/assets/profileimage/'.$r->cus_pic;	
					} else {
						$user_img =  "/themes/images/products/man.png";
					}
				} else {
					$user_img =  url('')."/themes/images/products/man.png";
				}
				$review[] = array("review_title"=>ucfirst($title),"review_comments"=>ucfirst($comments),"ratings"=>$r->ratings,"review_date"=>$r->review_date,"user_id"=>intval($r->customer_id),"user_name"=>ucfirst($cus_name),"user_img"=>$user_img);
			}
		}
		/* Review ends */
		if (Lang::has($lang_file.'.API_REVIWE_SUCCESSFULLY_ADDED')!= '') 
		{ 
			$msge 	=  trans($lang_file.'.API_REVIWE_SUCCESSFULLY_ADDED');
		}else{
			$msge = "Review Successfully added";
		}
        $encode = array("status"=>200,"message"=>$msge,"product_review"=>$review);
		return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
	}
	/* Write review  for DEALS */
	public function deal_review()
	{
		$customer_id = Input::get('user_id');
        $deal_id = Input::get('deal_id');
        $title      = Input::get('title');
        $comments   = Input::get('comments');
        $ratings    = Input::get('ratings');

        $lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang 	= '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;	
				App::setLocale($lang); //set locale value			
				$lang_file = $lang.$this->mob_lang_file_sufix;				
				$stor_name_dynamic 	= 'stor_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


      	if($customer_id =="" || $deal_id =="" || $title=="" || $comments =="" || $ratings ==""){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else if($customer_id ==0 || $deal_id ==0 ){
			if (Lang::has($lang_file.'.API_INVALID_VALUE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_VALUE');
			}else{
				$msge = "Invalid value!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} 
		$get_user_details = MobileModel::get_user_details($customer_id);
		$get_deal_exists = MobileModel::get_deal_exists($deal_id);
		if(count($get_user_details)==0) {
			if (Lang::has($lang_file.'.API_INVALID_USER_DETAILS')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_USER_DETAILS');
			}else{
				$msge = "Invalid User Details!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		if(count($get_deal_exists)==0) {
			
			if (Lang::has($lang_file.'.API_INVALID_DEAL_DETAILS')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_DEAL_DETAILS');
			}else{
				$msge = "Invalid Deal details!";
			}
		   $encode = array("status"=>400,"message"=>$msge);
		   return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
        $entry = array(
	        'customer_id' => Input::get('user_id'),
    		'deal_id' => Input::get('deal_id'),
            'title' => Input::get('title'),
            'comments' => Input::get('comments'),
            'ratings' => Input::get('ratings')
        );
        $comments = MobileModel::comment_insert($entry);
        /* Review starts */
		$review = array();
		$review_details  = MobileModel::get_deal_reviews_by_id($deal_id,$comments);
		if(count($review_details)>0) {
			foreach($review_details as $r) {
				if($r->cus_name !="") {	$cus_name = $r->cus_name;} else { $cus_name = ""; }
				if($r->title !="") {	$title = $r->title;} else { $title = ""; }
				if($r->comments !="") {	$comments = $r->comments;} else { $comments = ""; }
				$review[] = array("review_title"=>ucfirst($title),"review_comments"=>ucfirst($comments),"ratings"=>$r->ratings,"review_date"=>$r->review_date,"user_id"=>intval($r->customer_id),"user_name"=>ucfirst($cus_name),"user_img"=>url('')."/assets/profileimage/".$r->cus_pic);
			}
		}
		/* Review ends */
		if (Lang::has($lang_file.'.API_REVIWE_SUCCESSFULLY_ADDED')!= '') 
		{ 
			$msge 	=  trans($lang_file.'.API_REVIWE_SUCCESSFULLY_ADDED');
		}else{
			$msge = "Review Successfully added";
		}
        $encode = array("status"=>200,"message"=>$msge,"deal_review"=>$review);
		return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
	}
	/* Write review  for STORES */
	public function store_review()
	{
		$customer_id = Input::get('user_id');
        $store_id = Input::get('store_id');
        $title      = Input::get('title');
        $comments   = Input::get('comments');
        $ratings    = Input::get('ratings');

        $lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang 	= '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} 
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;	
				App::setLocale($lang); //set locale value			
				$lang_file = $lang.$this->mob_lang_file_sufix;				
				$stor_name_dynamic 	= 'stor_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


      	if($customer_id =="" || $store_id =="" || $title=="" || $comments =="" || $ratings ==""){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else if($customer_id ==0 || $store_id ==0 ){
			if (Lang::has($lang_file.'.API_INVALID_VALUE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_VALUE');
			}else{
				$msge = "Invalid value!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} 
		$get_user_details = MobileModel::get_user_details($customer_id);
		$get_store_exists = MobileModel::get_store_exists($store_id);
		if(count($get_user_details)==0) {
			if (Lang::has($lang_file.'.API_INVALID_USER_DETAILS')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_USER_DETAILS');
			}else{
				$msge = "Invalid User Details!";
			}
			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		if(count($get_store_exists)==0) {

			if (Lang::has($lang_file.'.API_INVALID_STORE_DETAILS')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_INVALID_STORE_DETAILS');
			}else{
				$msge = "Invalid Store details!";
			}
		   $encode = array("status"=>400,"message"=>$msge);
		   return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
        $entry = array(
	        'customer_id' => Input::get('user_id'),
    		'store_id' => Input::get('store_id'),
            'title' => Input::get('title'),
            'comments' => Input::get('comments'),
            'ratings' => Input::get('ratings')
        );
        $comments = MobileModel::comment_insert($entry);
        $review = array();
		$review_details  = MobileModel::get_store_reviews_by_id($store_id,$comments);
		if(count($review_details)>0) {
			foreach($review_details as $r) {
				if($r->cus_name !="") {	$cus_name = $r->cus_name;} else { $cus_name = ""; }
				if($r->title !="") {	$title = $r->title;} else { $title = ""; }
				if($r->comments !="") {	$comments = $r->comments;} else { $comments = ""; }
				$user_image= "";
				if($r->cus_pic !=""){
					if(file_exists('public/assets/profileimage/'.$r->cus_pic)){
						$user_image = url('')."/public/assets/profileimage/".$r->cus_pic;
					}
				}
				$review[] = array("review_title"=>ucfirst($title),"review_comments"=>ucfirst($comments),"ratings"=>$r->ratings,"review_date"=>$r->review_date,"user_id"=>intval($r->customer_id),"user_name"=>ucfirst($cus_name),"user_img"=>$user_image);
			}
		}
		if (Lang::has($lang_file.'.API_REVIWE_SUCCESSFULLY_ADDED')!= '') 
		{ 
			$msge 	=  trans($lang_file.'.API_REVIWE_SUCCESSFULLY_ADDED');
		}else{
			$msge = "Review Successfully added";
		}
        $encode = array("status"=>200,"message"=>$msge,"store_review"=>$review);
		return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
	}
/* PRODUCT ORDER COD  --> Added from Cart.*/
	public function product_order_cod()
	{
		$user_id = Input::get('user_id');
		$ship_name = Input::get('ship_name');
		$ship_email = Input::get('ship_email');
		$ship_phone = Input::get('ship_phone');
		$ship_address1 = Input::get('ship_address1');
		$ship_address2 = Input::get('ship_address2');
		$ship_country = Input::get('ship_country_id');
		$ship_city_id = Input::get('ship_city_id');
		$ship_state = Input::get('ship_state');
		$ship_postalcode = Input::get('ship_postalcode');
		$cart_type =1; //for products
		
			
		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file   = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
				$pro_desc_dynamic 	= 'pro_desc_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */




		if($user_id=="" || $user_id==0){
			//echo json_encode(array("status"=>400,"message"=>"Parameter Missing!"));
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		}
		else {
			/* Shipping Country and Shipping city validation */
			$country_details = MobileModel::get_countrylist($ship_country);
			$city_details = MobileModel::get_citylist($ship_country,$ship_city_id);
			if(count($country_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA');
				}else{
					$msge = "Invalid Ship country data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			if(count($city_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_CITY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_CITY_DATA');
				}else{
					$msge = "Invalid Ship city data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u){
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				//echo json_encode(array("status"=>400,"message"=>"User not available!"));
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$get_cart_details = MobileModel::get_product_cart_by_userid($user_id,$cart_type);
			
			$now            = date('Y-m-d h:i:sa');
			$insert_id      = '';
			$tax_amt = $Qtybased_ship_amt = $total =	$ItemTotalPrice = 0;
			$transaction_id = 'ORDER'.str_random(8);
			$trans_check    = MobileModel::trans_check($transaction_id);
			if ($trans_check) {
				$transaction_id = 'ORDER'.str_random(8);
			}
			$ship = array();
			$cart_details = array();
			if(count($get_cart_details)>0) {
				foreach($get_cart_details as $cart){
					$product_details = MobileModel::get_product_detail_by_id($cart->cart_product_id);
					if(count($product_details)>0){
						foreach($product_details as $p){
					$purchase_count = $p->pro_qty - $p->pro_no_of_purchase;
					if($validedLang!='') {
						$p->pro_title = $p->$pro_title_dynamic;
					}
					//check stock qty is < cart quantity
					if($purchase_count < $cart->cart_product_qty)
					{
						//print($purchase_count);
						$encode = array("status"=>400,"message"=>"".ucfirst($p->pro_title)." has exceeded the maximum limit");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
					//check both quantity and sold quantity.
					if($p->pro_qty <= $p->pro_no_of_purchase)
					{
						$encode = array("status"=>400,"message"=>"Limit exceeds","product_title" =>ucfirst($p->pro_title));
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
						
					}	
						}
					}
				}
			}
			
			
			if(count($get_cart_details)>0) {
				foreach($get_cart_details as $cart){
					$siz_arr = array();
					$color_arr = array();
					$product_details = MobileModel::get_product_detail_by_id($cart->cart_product_id);
					if(count($product_details)>0){
						foreach($product_details as $p){
							if($validedLang!='') {
								$p->pro_title = $p->$pro_title_dynamic;
								$p->pro_desc = $p->$pro_desc_dynamic;
							}


							if($cart->cart_pro_siz_id !="") {
								$size_details = MobileModel::get_size_details_by_id($p->pro_id,$cart->cart_pro_siz_id);
								if(count($size_details)>0){
									foreach($size_details as $siz){
									$siz_arr[] = array("size_id"=>$siz->ps_si_id,"size_name"=>$siz->si_name,"product_size_id"=>$siz->ps_id);
									}
								}
							}

							/* color starts */
							if($cart->cart_pro_col_id !=""){
								$color_details = MobileModel::get_color_details_by_id($p->pro_id,$cart->cart_pro_col_id);
								if(count($color_details)>0){
									foreach($color_details as $col){
										$color_arr[] = array("color_id"=>$col->pc_co_id,"color_name"=>ucfirst($col->co_name),"color_code"=>$col->co_code,"product_color_id"=>$col->pc_id);
									}
								}
							}
							/* color ends */
							$product_image="";
							if($p->pro_Img !="") {
								$product_img = explode('/**/', $p->pro_Img);
								if(file_exists('public/assets/product/'.$product_img[0])){
									$product_image = url('').'/public/assets/product/'.$product_img[0];
								}
							}
							$product_code = $p->pro_id;
							$subtotal       = ($p->pro_disprice * $cart->cart_product_qty);
							//$tax_amt = ($subtotal + $p->pro_shippamt)*($p->pro_inctax/100);
							$tax_amt = round(($subtotal)*($p->pro_inctax/100),2);
							$Qtybased_ship_amt = $p->pro_shippamt *$cart->cart_product_qty;
							$total = $subtotal + $Qtybased_ship_amt + $tax_amt; 
							//total price
							$ItemTotalPrice = $ItemTotalPrice + $subtotal;
							$shipaddresscus = $ship_name . ',' . $ship_address1 . ',' . $ship_address2 . ',' . $ship_state . ',' . $ship_postalcode . ',' . $ship_phone . ',' . $ship_email;


							/* Merchant Commission Calculation starts */
		                    $mer_commis_amt = $mer_amt = 0 ;
		                    $mer_commissionDetails  = array();//MobileModel::getMerchantCommission($p->pro_mr_id); 
		                    
		                    if(count($mer_commissionDetails)>0){
		                        $prod_qty_price = ($cart->cart_product_qty) * ($p->pro_disprice);
		                        $tax        = $p->pro_inctax;
		                        $tax_price  =(($prod_qty_price)*($tax/100));

		                        $ordAmt_tax_ship_amt = ($prod_qty_price + $tax_price ) + $Qtybased_ship_amt;
		                        $mer_commis_amt = $ordAmt_tax_ship_amt*($mer_commissionDetails->mer_commission/100);
		                        $mer_amt        = $ordAmt_tax_ship_amt - $mer_commis_amt;
		                    }
		                   // print_r($mer_commis_amt);
		                    /* Merchant Commission Calculation ends */

							$data = array(
								'cod_cus_id' => $userID,
								'cod_order_type' => $cart_type,
								'cod_transaction_id' => $transaction_id,
								'cod_pro_id' => $product_code,
								'cod_qty' => $cart->cart_product_qty,
								'cod_amt' => $subtotal,
								'cod_prod_unitPrice' => $p->pro_disprice,				 
								'cod_tax' => $p->pro_inctax,
								'cod_shipping_amt' => $Qtybased_ship_amt,				 
								'cod_date' => $now,
								'cod_status' => 3,
								'delivery_status'       => 1,
								'cod_paytype' => '0',
								'cod_pro_color' => $cart->cart_pro_col_id,
								'cod_pro_size' => $cart->cart_pro_siz_id,
								'cod_ship_addr' => $shipaddresscus,
								'cod_merchant_id' => $p->pro_mr_id,
								'mer_commission_amt'    => $mer_commis_amt,
                        		'mer_amt'               => $mer_amt,
                        		'cod_taxAmt'          => $tax_amt,
							);

							if ($cart_type != 2) {
								MobileModel::purchased_checkout_product_insert($p->pro_id,$cart->cart_product_qty);
							}
							 $new_insert = MobileModel::cod_checkout_insert($data);
							//$new_insert = DB::getPdo()->lastInsertId();
							//$insert_id = DB::getPdo()->lastInsertId();
							$ship_country_name ="";
							$ship_city_name ="";
							if(count($country_details)>0){
								foreach($country_details as $cntry) {
									if($validedLang!='') {
										$cntry->co_name = $cntry->$co_name_dynamic;
									}
									$ship_country_name =$cntry->co_name;
								}
							}
							if(count($city_details)>0){
								foreach($city_details as $city) {
									if($validedLang!='') {
										$city->ci_name = $city->$ci_name_dynamic;
									}
									$ship_city_name =$city->ci_name;
								}
							}
							$data_ship = array(
								'ship_name' => $ship_name,
								'ship_address1' => $ship_address1,
								'ship_address2' => $ship_address2,
								'ship_state' => $ship_state,
								'ship_postalcode' => $ship_postalcode,
								'ship_phone' => $ship_phone,
								'ship_cus_id' => $userID,
								'ship_order_id' => $new_insert,
								'ship_email' => $ship_email,
								'ship_ci_id'	=>$ship_city_name,
								'ship_country'	=>$ship_country_name,
								'ship_trans_id'	=> $transaction_id
							);
							MobileModel::insert_shipping_addr($data_ship, $userID);

							// merchantOrder Total Calculation
							//$this->merchantOverORderTotal('cod',$new_insert);

							$cart_details[] = array("cart_id"=>intval($cart->cart_id),"cart_product_id"=>intval($p->pro_id),"cart_transaction_id"=>$transaction_id,"cart_title"=>ucfirst($p->pro_title),"cart_description"=>ucfirst($p->pro_desc),"cart_quantity"=>$cart->cart_product_qty,"cart_image"=>$product_image,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->pro_disprice),"cart_tax"=>floatval($tax_amt),"cart_shipping"=>floatval($Qtybased_ship_amt),"cart_delivery"=>$p->pro_delivery,"cart_merchant_id"=>$p->pro_mr_id,"cart_total"=>floatval($total),"cart_order_date"=>$now,"cart_paytype"=> "COD","cart_userid"=>intval($userID),"cart_size_details"=>$siz_arr,"cart_color_details"=>$color_arr);
							
							$delete_cart = MobileModel::delete_cart_by_id($cart->cart_id,$cart_type);
					

						}
					}
					
					/*
					include('SMTP/sendmail.php');
					$emailsubject = "Your Payment has Successfully Completed.....";
					$subject      = "Payment Acknowledgement.....";
					$name         = $ship_name;
					$transid      = $transaction_id;
					$shipaddress  = $shipaddresscus;
					$address      = "";
					
					$resultmail   = "success";
					ob_start();
					include('Emailsub/paymentcod.php');
					$body = ob_get_contents();
					ob_clean();
					Send_Mail($address, $subject, $body);
					
					$trans_id = Home::transaction_id($transaction_id);
					$get_subtotal                = Home::get_subtotal($trans_id);
					$get_tax                     = Home::get_tax($trans_id);
					$get_shipping_amount         = Home::get_shipping_amount($trans_id);
					$currenttransactionorderid   = base64_encode($trans_id);
					
					//Customer Mail after order complete

				Mail::send('emails.ordermail', array(
                'transaction_id' => $trans_id,
                'Sub_total' =>  $get_subtotal,
                'Tax' =>  $get_tax,
                'Shipping_amount' =>  $get_shipping_amount), function($message) use ($data)
				{
					$customer_mail = $data['cod_ship_addr'];
					$allpas        = explode(",", $customer_mail);
					$cus_mail      = $allpas[6];
					//echo $allpas[6]; 
					$message->to($cus_mail)->subject('Your Order Confirmation Details Placed Successfully');
				});
					
					*/
				}

				/* Mail starts */

				//set language session
				//Posted language is en
				if($lang=='en')
				{
					Session::put('lang_file','en'.$this->mob_lang_file_sufix);
					$this->OUR_LANGUAGE =	'en'.$this->mob_lang_file_sufix;  	
				}

				//Posted language is other than en
                if($validedLang!='')  {      
                    Session::put('lang_file',$validedLang.$this->mob_lang_file_sufix);
					$this->OUR_LANGUAGE =	$validedLang.$this->mob_lang_file_sufix;  							
				}


				include('SMTP/sendmail.php');
				$emailsubject = "Your Payment has Successfully Completed.....";
				$subject      = "Payment Acknowledgement.....";
				$name         = $ship_name;
				$transid      = $transaction_id;
				$shipaddress  = $shipaddresscus;
				$address      = "rrr";
				
				$resultmail   = "Success"; 
				/*ob_start();
				include('Emailsub/paymentcod.php');
				$body = ob_get_contents();
				ob_clean();
				Send_Mail($address, $subject, $body);*/
				
				$trans_id = MobileModel::transaction_id($new_insert);
				$get_subtotal                = MobileModel::get_subtotal($trans_id);
				$get_tax                     = MobileModel::get_tax($trans_id);
				$get_shipping_amount         = MobileModel::get_shipping_amount($trans_id);
				$currenttransactionorderid   = base64_encode($trans_id);
				
				//Customer Mail after order complete
				

				Mail::send('emails.mobile_ordermail', array(
                'transaction_id' => $trans_id,
                'Sub_total' =>  $get_subtotal,
                'Tax' =>  $get_tax,
                'Shipping_amount' =>  $get_shipping_amount,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data)
                {
                $customer_mail = $data['cod_ship_addr'];
				//$customer_mail = $shipaddresscus;
                $allpas        = explode(",", $customer_mail);
                $cus_mail      = $allpas[6];
                //echo $allpas[6]; 

                 if(Lang::has(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED')!= '') 
				{
					$sessionCUstom_message = trans(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
				}
				else 
				{
					$sessionCUstom_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
				}  
                $message->to($cus_mail)->subject($sessionCUstom_message);
                } );
				

				//Merchant Mail after order complete
				/*$merchant_trans_id = Home::get_merchant_based_transaction_id($trans_id);
	          
				if(isset($merchant_trans_id) && $merchant_trans_id != "") {
					foreach($merchant_trans_id as $mer=>$m) {
						$merchant_id = $m->cod_merchant_id;
	                    $product_id  = $m->cod_pro_id;
	                    $order_type  = $m->cod_order_type;
						$get_mer_subtotal = Home::get_mer_subtotal($trans_id,$merchant_id);
						$get_mer_tax = Home::get_mer_tax($trans_id,$merchant_id);
						$get_mer_shipping_amount = Home::get_mer_shipping_amount($trans_id,$merchant_id);
	                    //get merchant email id by sending merchant id from each iteration
	                    $get_mer_email = Home::get_mer_email($merchant_id);

	                    	                    
	                    $mer_email = $get_mer_email[0]->mer_email;
						
	                    $email = array('mer_email'=>$mer_email);
	                    $data  = array_merge($data,$email);
	                    
	                    Mail::send('emails.mobile_order-merchantmail', array(
							'transaction_id' => $trans_id,
							'Sub_total' =>  $get_mer_subtotal,
							'Tax' =>  $get_mer_tax,
							'Shipping_amount' =>  $get_mer_shipping_amount,'merchant_id' => $merchant_id,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data){
	                                $merchant_email = $data['mer_email'];
	                        //$session_message = "Hi Merchant, your product was purchased.";  

	                         if(Lang::has(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED')!= '') 
							{
								$session_message = trans(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}
							else 
							{
								$session_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}  

							$message->to($merchant_email)->subject($session_message);
						});
					}
				}
				*/
				if(isset($_SESSION['lang_file']))
					unset($_SESSION['lang_file']);

				/* Mail ends */



				$ship_country_name ="";
				$ship_city_name ="";
				if(count($country_details)>0){
					foreach($country_details as $cntry) {

						if($validedLang!='') {
							$cntry->co_name = $cntry->$co_name_dynamic;
						}


						$ship_country_name =$cntry->co_name;
					}
				}
				if(count($city_details)>0){
					foreach($city_details as $city) {
						if($validedLang!='') {
							$city->ci_name = $city->$ci_name_dynamic;
						}
						$ship_city_name =$city->ci_name;
					}
				}
				$ship[] = array("ship_name"=>ucfirst($ship_name),"ship_email"=>$ship_email,"ship_phone"=>$ship_phone,"ship_address1"=>ucfirst($ship_address1),"ship_address2"=>ucfirst($ship_address2),"ship_country_id"=>intval($ship_country),"ship_country_name"=>ucfirst($ship_country_name),"ship_city_id"=>intval($ship_city_id),"ship_city_name"=>ucfirst($ship_city_name),"ship_state"=>ucfirst($ship_state),"ship_postalcode"=>$ship_postalcode);
				
				if (Lang::has($lang_file.'.API_ORDER_SUCCESSFUL')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_SUCCESSFUL');
				}else{
					$msge = "Order Successful!";
				}
					$encode = array("status"=>200,"message"=>$msge,"cart_details"=>$cart_details,"shipping_details"=>$ship);
					return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} else {
				//echo json_encode(array("status"=>400,"message"=>"No Products available!"));
				if (Lang::has($lang_file.'.API_NO_PRODUCT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_PRODUCT_AVAILABLE');
				}else{
					$msge = "No Products available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			
		}
	}
	/* PRODUCT ORDER COD */
	public function product_order_cod_buy_now()
	{
		$user_id = Input::get('user_id');
		$cart_product_id = Input::get('product_id');
		$cart_pro_siz_id = Input::get('product_size_id');
		$cart_pro_col_id = Input::get('product_color_id');
		$cart_product_qty = Input::get('product_qty');

		$ship_name = Input::get('ship_name');
		$ship_email = Input::get('ship_email');
		$ship_phone = Input::get('ship_phone');
		$ship_address1 = Input::get('ship_address1');
		$ship_address2 = Input::get('ship_address2');
		$ship_country = Input::get('ship_country_id');
		$ship_city_id = Input::get('ship_city_id');
		$ship_state = Input::get('ship_state');
		$ship_postalcode = Input::get('ship_postalcode');
		$cart_type =1; //for products


		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file		=$this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}  else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
				$pro_desc_dynamic 	= 'pro_desc_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */



		if($user_id=="" || $user_id==0 || $cart_product_id=="" || $cart_product_id==0 || $cart_product_qty=="" || $cart_product_qty==0){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			/* Shipping Country and Shipping city validation */
			$country_details = MobileModel::get_countrylist($ship_country);
			$city_details = MobileModel::get_citylist($ship_country,$ship_city_id);
			if(count($country_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA');
				}else{
					$msge = "Invalid Ship country data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			if(count($city_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_CITY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_CITY_DATA');
				}else{
					$msge = "Invalid Ship city data!";
				}


				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u){
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			
			$now            = date('Y-m-d h:i:sa');
			$insert_id      = '';
			$tax_amt = $Qtybased_ship_amt = $total = $ItemTotalPrice = 0;
			$transaction_id = 'ORDER'.str_random(8);
			$trans_check    = MobileModel::trans_check($transaction_id);
			if ($trans_check) {
				$transaction_id = 'ORDER'.str_random(8);
			}
			$ship = array();
			$cart_details = array();
		
			$siz_arr = array();
			$color_arr = array();
			$product_details = MobileModel::get_product_detail_by_id($cart_product_id);
			
			if(count($product_details)>0){
				foreach($product_details as $p){
					$purchase_count = $p->pro_qty - $p->pro_no_of_purchase;
					if($validedLang!='') {
						$p->pro_title = $p->$pro_title_dynamic;
					}
					
					if($purchase_count < $cart_product_qty)
					{
						$encode = array("status"=>400,"message"=>"".ucfirst($p->pro_title)." has exceeded the maximum limit");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
					
					if($p->pro_qty <= $p->pro_no_of_purchase)
					{
						$encode = array("status"=>400,"message"=>"Limit exceeds");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
						
					}
				}
				}
			if(count($product_details)>0){
				foreach($product_details as $p){
					if($cart_pro_siz_id !="") {
						$size_details = MobileModel::get_size_details_by_id($p->pro_id,$cart_pro_siz_id);
						if(count($size_details)>0){
							foreach($size_details as $siz){
							$siz_arr[] = array("size_id"=>$siz->ps_si_id,"size_name"=>$siz->si_name,"product_size_id"=>$siz->ps_id);
							}
						} else {
							if (Lang::has($lang_file.'.API_SIZE_NOT_AVAILABLE')!= '') 
							{ 
								$msge 	=  trans($lang_file.'.API_SIZE_NOT_AVAILABLE');
							}else{
								$msge = "Size not available!";
							}
							$encode = array("status"=>400,"message"=>$msge);
							return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
						}
					}

					/* color starts */
					if($cart_pro_col_id !=""){
						$color_details = MobileModel::get_color_details_by_id($p->pro_id,$cart_pro_col_id);
						if(count($color_details)>0){
							foreach($color_details as $col){
								$color_arr[] = array("color_id"=>$col->pc_co_id,"color_name"=>ucfirst($col->co_name),"color_code"=>$col->co_code,"product_color_id"=>$col->pc_id);
							}
						} else {
							if (Lang::has($lang_file.'.API_COLOR_NOT_AVAILABLE')!= '') 
							{ 
								$msge 	=  trans($lang_file.'.API_COLOR_NOT_AVAILABLE');
							}else{
								$msge = "Color not available!";
							}
							$encode = array("status"=>400,"message"=>$msge);
							return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
						}
					}
					/* color ends */
				
					$product_image="";
					if($p->pro_Img !="") {
						$product_img = explode('/**/', $p->pro_Img);
						if(file_exists('public/assets/product/'.$product_img[0])){
							$product_image = url('').'/public/assets/product/'.$product_img[0];
						}
					}
					$product_code = $p->pro_id;
					$subtotal       = ($p->pro_disprice * $cart_product_qty);
					//$tax_amt = ($subtotal + $p->pro_shippamt)*($p->pro_inctax/100);
					$tax_amt = round(($subtotal)*($p->pro_inctax/100),2);
					$Qtybased_ship_amt = $p->pro_shippamt * $cart_product_qty;
					$total = $subtotal + $Qtybased_ship_amt + $tax_amt;
					//total price
					$ItemTotalPrice = $ItemTotalPrice + $subtotal;
					$shipaddresscus = $ship_name . ',' . $ship_address1 . ',' . $ship_address2 . ',' . $ship_state . ',' . $ship_postalcode . ',' . $ship_phone . ',' . $ship_email;


					/* Merchant Commission Calculation starts */
                    $mer_commis_amt = $mer_amt = 0 ;
                    $mer_commissionDetails  = array();//MobileModel::getMerchantCommission($p->pro_mr_id); 
                    
                    if(count($mer_commissionDetails)>0){
                        $prod_qty_price = ($cart_product_qty) * ($p->pro_disprice);
                        $tax        = $p->pro_inctax;
                        $tax_price  =(($prod_qty_price)*($tax/100));

                        $ordAmt_tax_ship_amt = ($prod_qty_price + $tax_price ) + $Qtybased_ship_amt;
                        $mer_commis_amt = $ordAmt_tax_ship_amt*($mer_commissionDetails->mer_commission/100);
                        $mer_amt        = $ordAmt_tax_ship_amt - $mer_commis_amt;
                    }
                   // print_r($mer_commis_amt);
                    /* Merchant Commission Calculation ends */


					$data = array(
						'cod_cus_id' 			=> $userID,
						'cod_order_type' 		=> $cart_type,
						'cod_transaction_id' 	=> $transaction_id,
						'cod_pro_id' 			=> $product_code,
						'cod_qty' 				=> $cart_product_qty,
						'cod_prod_unitPrice' 	=> $p->pro_disprice,					   
						'cod_amt' 				=> $subtotal,
						'cod_tax' 				=> $p->pro_inctax,
						'cod_shipping_amt' 		=> $p->pro_shippamt,					 
						'cod_date' 				=> $now,
						'cod_status' 			=> 3,
						'delivery_status'       => 1,
						'cod_paytype' 			=> '0',
						'cod_pro_color' 		=> $cart_pro_col_id,
						'cod_pro_size' 			=> $cart_pro_siz_id,
						'cod_ship_addr' 		=> $shipaddresscus,
						'cod_merchant_id' 		=> $p->pro_mr_id,
						'mer_commission_amt'    => $mer_commis_amt,
                		'mer_amt'               => $mer_amt,
                		'cod_taxAmt'          => $tax_amt,
					);

					if ($cart_type != 2) {
						MobileModel::purchased_checkout_product_insert($p->pro_id,$cart_product_qty);
					}
					 $new_insert = MobileModel::cod_checkout_insert($data);
					//$new_insert = DB::getPdo()->lastInsertId();
					//$insert_id = DB::getPdo()->lastInsertId();

					// merchantOrder Total Calculation
					//$this->merchantOverORderTotal('cod',$new_insert);
					$ship_country_name ="";
					$ship_city_name ="";
					if(count($country_details)>0){
						foreach($country_details as $cntry) {
							if($validedLang!='') {
								$cntry->co_name = $cntry->$co_name_dynamic;
							}
							$ship_country_name =$cntry->co_name;
						}
					}
					if(count($city_details)>0){
						foreach($city_details as $city) {
							if($validedLang!='') {
								$city->ci_name = $city->$ci_name_dynamic;
							}
							$ship_city_name =$city->ci_name;
						}
					}
					$data_ship = array(
						'ship_name' => $ship_name,
						'ship_address1' => $ship_address1,
						'ship_address2' => $ship_address2,
						'ship_state' => $ship_state,
						'ship_postalcode' => $ship_postalcode,
						'ship_phone' => $ship_phone,
						'ship_cus_id' => $userID,
						'ship_order_id' => $new_insert,
						'ship_email' => $ship_email,
						'ship_ci_id'	=>$ship_city_name,
						'ship_country'	=>$ship_country_name,
						'ship_trans_id'	=> $transaction_id
					);

					MobileModel::insert_shipping_addr($data_ship, $userID);
					
					$cart_details[] = array("cart_product_id"=>intval($p->pro_id),"cart_transaction_id"=>$transaction_id,"cart_title"=>ucfirst($p->pro_title),"cart_description"=>ucfirst($p->pro_desc),"cart_quantity"=>$cart_product_qty,"cart_image"=>$product_image,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->pro_disprice),"cart_tax"=>floatval($tax_amt),"cart_shipping"=>floatval($Qtybased_ship_amt),"cart_delivery"=>$p->pro_delivery,"cart_merchant_id"=>$p->pro_mr_id,"cart_total"=>floatval($total),"cart_order_date"=>$now,"cart_paytype"=> "COD","cart_userid"=>intval($userID),"cart_size_details"=>$siz_arr,"cart_color_details"=>$color_arr);
					
					//$delete_cart = MobileModel::delete_cart_by_id($cart->cart_id,$cart_type);


				}

				/*mail send starts */

				//set language session
				//Posted language is en
				if($lang=='en')
				{
					Session::put('lang_file','en'.$this->mob_lang_file_sufix);
					$this->OUR_LANGUAGE =	'en'.$this->mob_lang_file_sufix;  	
				}

				//Posted language is other than en
                if($validedLang!='')  {      
                    Session::put('lang_file',$validedLang.$this->mob_lang_file_sufix);
					$this->OUR_LANGUAGE =	$validedLang.$this->mob_lang_file_sufix;  							
				}
				//echo Session::get('lang_file'); exit();
				include('SMTP/sendmail.php');
				$emailsubject = "Your Payment has Successfully Completed.....";
				$subject      = "Payment Acknowledgement.....";
				$name         = $ship_name;
				$transid      = $transaction_id;
				$shipaddress  = $shipaddresscus;
				$address      = "";
				
				$resultmail   = "Success"; 
				/*ob_start();
				include('Emailsub/paymentcod.php');
				$body = ob_get_contents();
				ob_clean();
				Send_Mail($address, $subject, $body);*/
				
				$trans_id = MobileModel::transaction_id($new_insert);
				$get_subtotal                = MobileModel::get_subtotal($trans_id);
				$get_tax                     = MobileModel::get_tax($trans_id);
				$get_shipping_amount         = MobileModel::get_shipping_amount($trans_id);
				$currenttransactionorderid   = base64_encode($trans_id);
				
				//Customer Mail after order complete

				Mail::send('emails.mobile_ordermail', array(
                'transaction_id' => $trans_id,
                'Sub_total' =>  $get_subtotal,
                'Tax' =>  $get_tax,
                'Shipping_amount' =>  $get_shipping_amount,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data)
                {
                $customer_mail = $data['cod_ship_addr'];
				//$customer_mail = $shipaddresscus;
                $allpas        = explode(",", $customer_mail);
                $cus_mail      = $allpas[6];
                //echo $allpas[6]; 
                

                if(Lang::has(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED')!= '') 
				{
					$sessionCUstom_message = trans(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
				}
				else 
				{
					$sessionCUstom_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
				}  


                $message->to($cus_mail)->subject($sessionCUstom_message);
                } );


                //Merchant Mail after order complete
				/*$merchant_trans_id = Home::get_merchant_based_transaction_id($trans_id);
	          
				if(isset($merchant_trans_id) && count($merchant_trans_id)>0) {
					foreach($merchant_trans_id as $mer=>$m) {
						$merchant_id = $m->cod_merchant_id;
	                    $product_id  = $m->cod_pro_id;
	                    $order_type  = $m->cod_order_type;
						$get_mer_subtotal = Home::get_mer_subtotal($trans_id,$merchant_id);
						$get_mer_tax = Home::get_mer_tax($trans_id,$merchant_id);
						$get_mer_shipping_amount = Home::get_mer_shipping_amount($trans_id,$merchant_id);
	                    //get merchant email id by sending merchant id from each iteration
	                    $get_mer_email = Home::get_mer_email($merchant_id);
	                    //print_r($get_mer_email);exit();
	                    
	                                       
	                    $mer_email = $get_mer_email[0]->mer_email;
						
	                    $email = array('mer_email'=>$mer_email);
	                    $data  = array_merge($data,$email);
	                    
	                    Mail::send('emails.mobile_order-merchantmail', array(
							'transaction_id' => $trans_id,
							'Sub_total' =>  $get_mer_subtotal,
							'Tax' =>  $get_mer_tax,
							'Shipping_amount' =>  $get_mer_shipping_amount,'merchant_id' => $merchant_id,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data){
	                                $merchant_email = $data['mer_email'];
	                        //$session_message = "Hi Merchant, your product was purchased."; 

	                        

	                        if(Lang::has(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED')!= '') 
							{
								$session_message = trans(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}
							else 
							{
								$session_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}         

							$message->to($merchant_email)->subject($session_message);
						});
					}
				}*/

				if(isset($_SESSION['lang_file']))
					unset($_SESSION['lang_file']);

				/* Mail Ends */
				
				
				$ship_country_name ="";
				$ship_city_name ="";
				if(count($country_details)>0){
					foreach($country_details as $cntry) {
						if($validedLang!='') {
							$cntry->co_name = $cntry->$co_name_dynamic;
						}
						$ship_country_name =$cntry->co_name;
					}
				}
				if(count($city_details)>0){
					foreach($city_details as $city) {
						if($validedLang!='') {
							$city->ci_name = $city->$ci_name_dynamic;
						}
						$ship_city_name =$city->ci_name;
					}
				}
				$ship[] = array("ship_name"=>ucfirst($ship_name),"ship_email"=>$ship_email,"ship_phone"=>$ship_phone,"ship_address1"=>ucfirst($ship_address1),"ship_address2"=>ucfirst($ship_address2),"ship_country_id"=>intval($ship_country),"ship_country_name"=>ucfirst($ship_country_name),"ship_city_id"=>intval($ship_city_id),"ship_city_name"=>ucfirst($ship_city_name),"ship_state"=>ucfirst($ship_state),"ship_postalcode"=>$ship_postalcode);
				if (Lang::has($lang_file.'.API_ORDER_SUCCESSFUL')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_SUCCESSFUL');
				}else{
					$msge = "Order Successful!";
				}
				$encode = array("status"=>200,"message"=>$msge,"cart_details"=>$cart_details,"shipping_details"=>$ship);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} 
			else {
				if (Lang::has($lang_file.'.API_NO_PRODUCT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_PRODUCT_AVAILABLE');
				}else{
					$msge = "No Products available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");	
			}
			
		}
	}
	/* DEAL ORDER COD */
	public function order_deal_cod_buy_now()
	{
		
		$user_id = Input::get('user_id');
		$cart_deal_id = Input::get('deal_id');
		$cart_product_qty = Input::get('deal_qty');
		
		$ship_name = Input::get('ship_name');
		$ship_email = Input::get('ship_email');
		$ship_phone = Input::get('ship_phone');
		$ship_address1 = Input::get('ship_address1');
		$ship_address2 = Input::get('ship_address2');
		$ship_country = Input::get('ship_country_id');
		$ship_city_id = Input::get('ship_city_id');
		$ship_state = Input::get('ship_state');
		$ship_postalcode = Input::get('ship_postalcode');
		$cart_type =2; //for deals

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file   = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		 
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$deal_title_dynamic 		= 'deal_title_'.$lang;
				$deal_description_dynamic 	= 'deal_description_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */



		if($user_id=="" || $user_id==0){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
		} else {
			/* Shipping Country and Shipping city validation */
			$country_details = MobileModel::get_countrylist($ship_country);
			$city_details = MobileModel::get_citylist($ship_country,$ship_city_id);
			if(count($country_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA');
				}else{
					$msge = "Invalid Ship country data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			if(count($city_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_CITY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_CITY_DATA');
				}else{
					$msge = "Invalid Ship city data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u){
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			
			//dd(DB::getQueryLog());
			$now            = date('Y-m-d h:i:sa');
			$insert_id      = '';
			$tax_amt = $total = $prod_qty_price = $Qtybased_ship_amt = $ItemTotalPrice = 0;
			$transaction_id = 'ORDER'.str_random(8);
			$trans_check    = MobileModel::trans_check($transaction_id);
			if ($trans_check) {
				$transaction_id = 'ORDER'.str_random(8);
			}
			$ship = array();
			$cart_details = array();
			$siz_arr = array();
			$color_arr = array();
			
			$deal_details = MobileModel::get_deals_details_by_id($cart_deal_id);
			
			
			if(count($deal_details)>0){
				foreach($deal_details as $p){
					$purchase_count = $p->deal_max_limit - $p->deal_no_of_purchase;
					if($purchase_count < $cart_product_qty)
					{
						$encode = array("status"=>400,"message"=>"quantity exceeds the maximum the deal limit");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
					
					if($p->deal_max_limit <= $p->deal_no_of_purchase)
					{
						$encode = array("status"=>400,"message"=>"Limit exceeds");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
						
					}				
					
					if($validedLang!='') {
						$p->deal_title 			= $p->$deal_title_dynamic;
						$p->deal_description 	= $p->$deal_description_dynamic;
					}
					$deal_image="";
					if($p->deal_image !="") {
						$deal_img = explode('/**/', $p->deal_image);
						if(file_exists('public/assets/deals/'.$deal_img[0])){
							$deal_image = url('').'/public/assets/deals/'.$deal_img[0];
						}
					}
					$product_code = $p->deal_id;
					$prod_qty_price  	= $p->deal_discount_price * $cart_product_qty;
					$subtotal     		= $prod_qty_price;
					$tax_amt 			= round(($prod_qty_price)*($p->deal_inctax/100),2);
					$Qtybased_ship_amt 	= $p->deal_shippamt * $cart_product_qty;
					$total  = $subtotal + $Qtybased_ship_amt + $tax_amt ;								  
					//total price
					$ItemTotalPrice = $ItemTotalPrice + $subtotal;
					$shipaddresscus = $ship_name . ',' . $ship_address1 . ',' . $ship_address2 . ',' . $ship_state . ',' . $ship_postalcode . ',' . $ship_phone . ',' . $ship_email;

					/* Merchant Commission Calculation starts */
                    $mer_commis_amt = $mer_amt = 0 ;
                    $mer_commissionDetails  = array();//MobileModel::getMerchantCommission($p->deal_merchant_id); 
                    if(count($mer_commissionDetails)>0){

                    	$prod_qty_price = ($cart_product_qty) * ($p->deal_discount_price);
                        $tax        = $p->deal_inctax;
                        $tax_price  =(($prod_qty_price)*($tax/100));

                        $ordAmt_tax_ship_amt = $prod_qty_price + $tax_price  + $Qtybased_ship_amt;
                        $mer_commis_amt =  $ordAmt_tax_ship_amt *($mer_commissionDetails->mer_commission/100);
                        $mer_amt        =  $ordAmt_tax_ship_amt - $mer_commis_amt;
                    }
                    /* Merchant Commission Calculation ends */


					$data = array(
						'cod_cus_id' 			=> $userID,
						'cod_order_type' 		=> $cart_type,
						'cod_transaction_id' 	=> $transaction_id,
						'cod_pro_id' 			=> $product_code,
						'cod_qty' 				=> $cart_product_qty,
						'cod_prod_unitPrice' 	=> $p->deal_discount_price,
						'cod_shipping_amt' 		=> $Qtybased_ship_amt,	 
						'cod_amt' 				=> $subtotal,
						'cod_tax' 				=> $p->deal_inctax,
						'cod_date' 				=> $now,
						'cod_status' 			=> 3,
						'delivery_status'       => 1,
						'cod_paytype' 			=> '0',
						'cod_pro_color' 		=> 0,
						'cod_pro_size' 			=> 0,
						'cod_ship_addr' 		=> $shipaddresscus,
						'cod_merchant_id' 		=> $p->deal_merchant_id,
						'mer_commission_amt'    => $mer_commis_amt,
                		'mer_amt'               => $mer_amt,
                		'cod_taxAmt'          	=> $tax_amt,
					);
					if ($cart_type != 2) {
						MobileModel::purchased_checkout_product_insert($p->pro_id,$cart_product_qty);
					}
					 $new_insert = MobileModel::cod_checkout_insert($data);
					//$new_insert = DB::getPdo()->lastInsertId();
					//$insert_id = DB::getPdo()->lastInsertId();
					$ship_country_name ="";
					$ship_city_name ="";
					if(count($country_details)>0){
						foreach($country_details as $cntry) {
							if($validedLang!='') {
								$cntry->co_name = $cntry->$co_name_dynamic;
							}
							$ship_country_name =$cntry->co_name;
						}
					}
					if(count($city_details)>0){
						foreach($city_details as $city) {
							if($validedLang!='') {
								$city->ci_name = $city->$ci_name_dynamic;
							}
							$ship_city_name =$city->ci_name;
						}
					}
					$data_ship = array(
						'ship_name' => $ship_name,
						'ship_address1' => $ship_address1,
						'ship_address2' => $ship_address2,
						'ship_state' => $ship_state,
						'ship_postalcode' => $ship_postalcode,
						'ship_phone' => $ship_phone,
						'ship_cus_id' => $userID,
						'ship_order_id' => $new_insert,
						'ship_email' => $ship_email,
						'ship_ci_id'	=>$ship_city_name,
						'ship_country'	=>$ship_country_name,
						'ship_trans_id'	=> $transaction_id
					);
					MobileModel::insert_shipping_addr($data_ship, $userID);

					// merchantOrder Total Calculation
					//$this->merchantOverORderTotal('cod',$new_insert);
					
					$cart_details[] = array("cart_deal_id"=>intval($p->deal_id),"cart_transaction_id"=>$transaction_id,"cart_title"=>ucfirst($p->deal_title),"cart_description"=>ucfirst($p->deal_description),"cart_quantity"=>$cart_product_qty,"cart_delivery"=>$p->deal_delivery,"cart_image"=>$deal_image,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->deal_discount_price),"cart_tax"=>floatval($tax_amt),"cart_shipping"=>floatval($Qtybased_ship_amt),"cart_merchant_id"=>$p->deal_merchant_id,"cart_total"=>floatval($total),"cart_order_date"=>$now,"cart_paytype"=> "COD","cart_userid"=>intval($userID));
					
					//$delete_cart = MobileModel::delete_cart_by_id($cart->cart_id,$cart_type);
					$deal_available = $p->deal_no_of_purchase;
					$purchased_deals = $deal_available + $cart_product_qty;
					DB::table('nm_deals')->where('deal_id','=',$cart_deal_id)->update(['deal_no_of_purchase' =>$purchased_deals]);
				
			
				}
				/*
				include('SMTP/sendmail.php');
				$emailsubject = "Your Payment has Successfully Completed.....";
				$subject      = "Payment Acknowledgement.....";
				$name         = $ship_name;
				$transid      = $transaction_id;
				$shipaddress  = $shipaddresscus;
				$address      = "";
				
				$resultmail   = "success";
				ob_start();
				include('Emailsub/paymentcod.php');
				$body = ob_get_contents();
				ob_clean();
				Send_Mail($address, $subject, $body);
				
				$trans_id = Home::transaction_id($transaction_id);
				$get_subtotal                = Home::get_subtotal($trans_id);
				$get_tax                     = Home::get_tax($trans_id);
				$get_shipping_amount         = Home::get_shipping_amount($trans_id);
				$currenttransactionorderid   = base64_encode($trans_id);
				
				//Customer Mail after order complete

				Mail::send('emails.ordermail', array(
		        'transaction_id' => $trans_id,
		        'Sub_total' =>  $get_subtotal,
		        'Tax' =>  $get_tax,
		        'Shipping_amount' =>  $get_shipping_amount), function($message) use ($data)
				{
					$customer_mail = $data['cod_ship_addr'];
					$allpas        = explode(",", $customer_mail);
					$cus_mail      = $allpas[6];
					//echo $allpas[6]; 
					$message->to($cus_mail)->subject('Your Order Confirmation Details Placed Successfully');
				});
				
				*/


				/*mail send starts */

				//set language session
				//Posted language is en
				if($lang=='en')
				{
					Session::put('lang_file','en'.$this->mob_lang_file_sufix);
					$this->OUR_LANGUAGE =	'en'.$this->mob_lang_file_sufix;  	
				}

				//Posted language is other than en
                if($validedLang!='')  {      
                    Session::put('lang_file',$validedLang.$this->mob_lang_file_sufix);
					$this->OUR_LANGUAGE =	$validedLang.$this->mob_lang_file_sufix;  							
				}
				//echo Session::get('lang_file'); exit();
				include('SMTP/sendmail.php');
				$emailsubject = "Your Payment has Successfully Completed.....";
				$subject      = "Payment Acknowledgement.....";
				$name         = $ship_name;
				$transid      = $transaction_id;
				$shipaddress  = $shipaddresscus;
				$address      = "";
				
				$resultmail   = "Success"; 
				/*ob_start();
				include('Emailsub/paymentcod.php');
				$body = ob_get_contents();
				ob_clean();
				Send_Mail($address, $subject, $body);*/
				
				$trans_id = MobileModel::transaction_id($new_insert);
				$get_subtotal                = MobileModel::get_subtotal($trans_id);
				$get_tax                     = MobileModel::get_tax($trans_id);
				$get_shipping_amount         = MobileModel::get_shipping_amount($trans_id);
				$currenttransactionorderid   = base64_encode($trans_id);
				
				//Customer Mail after order complete

				Mail::send('emails.mobile_ordermail', array(
                'transaction_id' => $trans_id,
                'Sub_total' =>  $get_subtotal,
                'Tax' =>  $get_tax,
                'Shipping_amount' =>  $get_shipping_amount,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data)
                {
                $customer_mail = $data['cod_ship_addr'];
				//$customer_mail = $shipaddresscus;
                $allpas        = explode(",", $customer_mail);
                $cus_mail      = $allpas[6];
                //echo $allpas[6]; 
                

                if(Lang::has(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED')!= '') 
				{
					$sessionCUstom_message = trans(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
				}
				else 
				{
					$sessionCUstom_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
				}  


                $message->to($cus_mail)->subject($sessionCUstom_message);
                } );


                //Merchant Mail after order complete
				/*$merchant_trans_id = Home::get_merchant_based_transaction_id($trans_id);
	          
				if(isset($merchant_trans_id) && count($merchant_trans_id)>0) {
					foreach($merchant_trans_id as $mer=>$m) {
						$merchant_id = $m->cod_merchant_id;
	                    $product_id  = $m->cod_pro_id;
	                    $order_type  = $m->cod_order_type;
						$get_mer_subtotal = Home::get_mer_subtotal($trans_id,$merchant_id);
						$get_mer_tax = Home::get_mer_tax($trans_id,$merchant_id);
						$get_mer_shipping_amount = Home::get_mer_shipping_amount($trans_id,$merchant_id);
	                    //get merchant email id by sending merchant id from each iteration
	                    $get_mer_email = Home::get_mer_email($merchant_id);
	                    //print_r($get_mer_email);exit();
	                    
	                                       
	                    $mer_email = $get_mer_email[0]->mer_email;
						
	                    $email = array('mer_email'=>$mer_email);
	                    $data  = array_merge($data,$email);
	                    
	                    Mail::send('emails.mobile_order-merchantmail', array(
							'transaction_id' => $trans_id,
							'Sub_total' =>  $get_mer_subtotal,
							'Tax' =>  $get_mer_tax,
							'Shipping_amount' =>  $get_mer_shipping_amount,'merchant_id' => $merchant_id,"SITENAME" => $this->SITENAME ,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data){
	                                $merchant_email = $data['mer_email'];
	                        //$session_message = "Hi Merchant, your product was purchased."; 

	                        

	                        if(Lang::has(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED')!= '') 
							{
								$session_message = trans(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}
							else 
							{
								$session_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}         

							$message->to($merchant_email)->subject($session_message);
						});
					}
				}*/

				if(isset($_SESSION['lang_file']))
					unset($_SESSION['lang_file']);

				/* Mail Ends */


				$ship_country_name ="";
				$ship_city_name ="";
				if(count($country_details)>0){
					foreach($country_details as $cntry) {
						if($validedLang!='') {
							$cntry->co_name = $cntry->$co_name_dynamic;
						}
						$ship_country_name =$cntry->co_name;
					}
				}
				if(count($city_details)>0){
					foreach($city_details as $city) {
						if($validedLang!='') {
							$city->ci_name = $city->$ci_name_dynamic;
						}
						$ship_city_name =$city->ci_name;
					}
				}
				$ship[] = array("ship_name"=>ucfirst($ship_name),"ship_email"=>$ship_email,"ship_phone"=>$ship_phone,"ship_address1"=>ucfirst($ship_address1),"ship_address2"=>ucfirst($ship_address2),"ship_country_id"=>intval($ship_country),"ship_country_name"=>ucfirst($ship_country_name),"ship_city_id"=>intval($ship_city_id),"ship_city_name"=>ucfirst($ship_city_name),"ship_state"=>ucfirst($ship_state),"ship_postalcode"=>$ship_postalcode);
				if (Lang::has($lang_file.'.API_ORDER_SUCCESSFUL')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_SUCCESSFUL');
				}else{
					$msge = "Order Successful!";
				}
				$encode = array("status"=>200,"message"=>$msge,"cart_details"=>$cart_details,"shipping_details"=>$ship);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} 
			else {
				if (Lang::has($lang_file.'.API_NO_DEALS_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_DEALS_AVAILABLE');
				}else{
					$msge = "No Deals available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			
		}
	}
	
	/* PRODUCT ORDER PAYPAL */ 
	public function product_order_paypal()
	{
		$user_id = Input::get('user_id');
		$ship_name = Input::get('ship_name');
		$ship_email = Input::get('ship_email');
		$ship_phone = Input::get('ship_phone');
		$ship_address1 = Input::get('ship_address1');
		$ship_address2 = Input::get('ship_address2');
		$ship_country = Input::get('ship_country_id');
		$ship_city_id = Input::get('ship_city_id');
		$ship_state = Input::get('ship_state');
		$ship_postalcode = Input::get('ship_postalcode');
		$transaction_id = Input::get('transaction_id');
		$token_id = Input::get('token_id');
		$payer_email = Input::get('payer_email');
		$payer_id = Input::get('payer_id');
		$payer_name = Input::get('payer_name');
		$payment_ack = 'Success'; //Input::get('payment_ack');
		$payer_status = 'verified'; //Input::get('payer_status');
		

		$cart_type =1; //for products

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file		=$this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
				$pro_desc_dynamic 	= 'pro_desc_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		if($user_id=="" || $user_id==0 || $transaction_id =="" || $ship_name=="" || $ship_email =="" || $ship_phone=="" ||$ship_address1=="" || $ship_address2 =="" || $ship_country=="" || $ship_city_id=="" || $ship_state =="" || $ship_postalcode=="" ){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
		   return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			
			/* Shipping Country and Shipping city validation */
			$country_details = MobileModel::get_countrylist($ship_country);
			$city_details = MobileModel::get_citylist($ship_country,$ship_city_id);
			if(count($country_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA');
				}else{
					$msge = "Invalid Ship country data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			if(count($city_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_CITY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_CITY_DATA');
				}else{
					$msge = "Invalid Ship city data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u){
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			
			$get_cart_details = MobileModel::get_product_cart_by_userid($user_id,$cart_type);
			/**/
			$now            = date('Y-m-d h:i:sa');
			$insert_id      = '';
			$total = $tax_amt = $Qtybased_ship_amt = $ItemTotalPrice = 0;
			$ship = array();
			$cart_details = array();
			if(count($get_cart_details)>0) {
				foreach($get_cart_details as $cart){
					$product_details = MobileModel::get_product_detail_by_id($cart->cart_product_id);
					if(count($product_details)>0){
						foreach($product_details as $p){
					$purchase_count = $p->pro_qty - $p->pro_no_of_purchase;
					if($purchase_count < $cart->cart_product_qty)
					{
						//print($purchase_count);
						$encode = array("status"=>400,"message"=>"".ucfirst($p->pro_title)." has exceeded the maximum limit");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
					
					if($p->pro_qty <= $p->pro_no_of_purchase)
					{
						$encode = array("status"=>400,"message"=>"Limit exceeds","product_title" =>ucfirst($p->pro_title));
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
						
					}	
						}
					}
				}
			}		
			
			if(count($get_cart_details)>0) {
				foreach($get_cart_details as $cart){
					$siz_arr = array();
					$color_arr = array();
					$product_details = MobileModel::get_product_detail_by_id($cart->cart_product_id);
					if(count($product_details)>0){
						$ship = array();
						foreach($product_details as $p){

							if($validedLang!='') {
								$p->pro_title = $p->$pro_title_dynamic;
								$p->pro_desc = $p->$pro_desc_dynamic;
							}



							/* Size starts */
							if($cart->cart_pro_siz_id !="") {
								$size_details = MobileModel::get_size_details_by_id($p->pro_id,$cart->cart_pro_siz_id);
								if(count($size_details)>0){
									foreach($size_details as $siz){
									$siz_arr[] = array("size_id"=>$siz->ps_si_id,"size_name"=>$siz->si_name,"product_size_id"=>$siz->ps_id);
									}
								}
							}
							/* size ends */
							/* color starts */
							if($cart->cart_pro_col_id !=""){
								$color_details = MobileModel::get_color_details_by_id($p->pro_id,$cart->cart_pro_col_id);
								if(count($color_details)>0){
									foreach($color_details as $col){
										$color_arr[] = array("color_id"=>$col->pc_co_id,"color_name"=>ucfirst($col->co_name),"color_code"=>$col->co_code,"product_color_id"=>$col->pc_id);
									}
								}
							}
							/* color ends */
							$product_image="";
							if($p->pro_Img !="") {
								$product_img = explode('/**/', $p->pro_Img);
								if(file_exists('public/assets/product/'.$product_img[0])){
									$product_image = url('').'/public/assets/product/'.$product_img[0];
								}
							}
							$product_code = $p->pro_id;
							//$subtotal = ($p->pro_disprice * $cart->cart_product_qty)+$p->pro_shippamt+$p->pro_inctax;
							$subtotal       = ($p->pro_disprice * $cart->cart_product_qty);
							//$tax_amt = ($subtotal + $p->pro_shippamt)*($p->pro_inctax/100);
							$tax_amt = round(($subtotal)*($p->pro_inctax/100),2);
							$Qtybased_ship_amt = $p->pro_shippamt * $cart->cart_product_qty;
							$total = $subtotal + $Qtybased_ship_amt  + $tax_amt;
							$ItemTotalPrice = $ItemTotalPrice + $subtotal;
							$shipaddresscus = $ship_name . ',' . $ship_address1 . ',' . $ship_address2 . ',' . $ship_state . ',' . $ship_postalcode . ',' . $ship_phone . ',' . $ship_email;

							/* Merchant Commission Calculation starts */
		                    $mer_commis_amt = $mer_amt = 0 ;
		                    $mer_commissionDetails  = array();//MobileModel::getMerchantCommission($p->pro_mr_id); 
		                    
		                    if(count($mer_commissionDetails)>0){
		                        $prod_qty_price = ($cart->cart_product_qty) * ($p->pro_disprice);
		                        $tax        = $p->pro_inctax;
		                        $tax_price  =(($prod_qty_price)*($tax/100));

		                        $ordAmt_tax_ship_amt = ($prod_qty_price + $tax_price ) + $Qtybased_ship_amt;
		                        $mer_commis_amt = $ordAmt_tax_ship_amt*($mer_commissionDetails->mer_commission/100);
		                        $mer_amt        = $ordAmt_tax_ship_amt - $mer_commis_amt;
		                    }
		                   // print_r($mer_commis_amt);
		                    /* Merchant Commission Calculation ends */

							$data = array(
		                        'order_cus_id' 			=> $userID,
		                        'order_pro_id' 			=> $product_code,
		                        'order_type' 			=> $cart_type,
		                        'order_qty' 			=> $cart->cart_product_qty,
		                        'order_amt'				=> $subtotal,
								'order_prod_unitPrice' 	=> $p->pro_disprice,
		                        'order_tax' 			=> $p->pro_inctax,
		                        'order_shipping_amt' 	=> $Qtybased_ship_amt,			 
		                        'order_date' 			=> $now,
		                        'order_status' 			=> 1,
		                        'delivery_status'       => 1,
		                        'order_paytype' 		=> 1,
		                        'order_pro_color' 		=> $cart->cart_pro_col_id,
		                        'order_pro_size' 		=> $cart->cart_pro_siz_id,
		                        'order_shipping_add' 	=> $shipaddresscus,
		                        'transaction_id' 		=> $transaction_id,
		                        'token_id' 				=> $token_id,
		                        'payer_email' 			=> $payer_email,
		                        'payer_id' 				=> $payer_id,
		                        'payer_name' 			=> $payer_name,
		                        'currency_code' 		=> $this->cur_code,
		                        'payment_ack' 			=> $payment_ack,
		                        'payer_status' 			=> $payer_status,
		                        'order_merchant_id' 	=> $p->pro_mr_id,
		                        'mer_commission_amt'    => $mer_commis_amt,
                        		'mer_amt'               => $mer_amt,
                        		'order_taxAmt'          => $tax_amt,
		                    );
		                    if ($cart_type != 2) {
		                      MobileModel::purchased_checkout_product_insert($product_code,$cart->cart_product_qty);
		                    }
		                    $new_insert = MobileModel::paypal_checkout_insert($data);
		                    $ship_country_name ="";
							$ship_city_name ="";
							if(count($country_details)>0){
								foreach($country_details as $cntry) {
									if($validedLang!='') {
										$cntry->co_name = $cntry->$co_name_dynamic;
									}
									$ship_country_name =$cntry->co_name;
								}
							}
							if(count($city_details)>0){
								foreach($city_details as $city) {
									if($validedLang!='') {
										$city->ci_name = $city->$ci_name_dynamic;
									}
									$ship_city_name =$city->ci_name;
								}
							}
		                    $ship_data = array(
	                            'ship_name' => $ship_name,
	                            'ship_address1' => $ship_address1,
	                            'ship_address2' => $ship_address2,
	                            'ship_state' => $ship_state,
	                            'ship_postalcode' => $ship_postalcode,
	                            'ship_phone' => $ship_phone,
	                            'ship_email' => $ship_email,
	                            'ship_cus_id' => $userID,
	                            'ship_order_id' => $new_insert,
	                            'ship_ci_id'	=>$ship_city_name,
								'ship_country'	=>$ship_country_name,
								'ship_trans_id'	=> $transaction_id
	                        );
	                        MobileModel::insert_shipping_addr($ship_data, $userID);

	                        // merchantOrder Total Calculation
							//$this->merchantOverORderTotal('paypal',$new_insert);

							$cart_details[] = array("cart_id"=>intval($cart->cart_id),"cart_product_id"=>intval($p->pro_id),"cart_transaction_id"=>$transaction_id,"cart_title"=>ucfirst($p->pro_title),"cart_description"=>ucfirst($p->pro_desc),"cart_quantity"=>$cart->cart_product_qty,"cart_image"=>$product_image,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->pro_disprice),"cart_tax"=>floatval($tax_amt),"cart_shipping"=>floatval($Qtybased_ship_amt),"cart_delivery"=>$p->pro_delivery,"cart_merchant_id"=>$p->pro_mr_id,"cart_total"=>floatval($total),"cart_order_date"=>$now,"cart_paytype"=> "Paypal","cart_userid"=>intval($userID),"cart_size_details"=>$siz_arr,"cart_color_details"=>$color_arr);
							
							$delete_cart = MobileModel::delete_cart_by_id($cart->cart_id,$cart_type);
						}
						/*
						include('SMTP/sendmail.php');
	                    $emailsubject = "Your Payment Successfully completed.....";
	                    $subject      = "Payment Acknowledgement.....";
	                    $name         = $payer_name;
	                    $transid      = $transaction_id;
	                    $payid        = $payer_id;
	                    $ack          = $payment_ack;
	                    $address      = $ship_email;
	                    
	                    $resultmail   = "success";
	                    ob_start();
	                    include('Emailsub/paymentemail.php');
	                    $body = ob_get_contents();
	                    ob_clean();
	                    Send_Mail($address, $subject, $body);
	            		*/

	            		/* Mail Functinality starts */
        			//set language session
					//Posted language is en
					if($lang=='en')
					{
						Session::put('lang_file','en'.$this->mob_lang_file_sufix);
						$this->OUR_LANGUAGE =	'en'.$this->mob_lang_file_sufix;  	
					}

					//Posted language is other than en
	                if($validedLang!='')  {      
	                    Session::put('lang_file',$validedLang.$this->mob_lang_file_sufix);
						$this->OUR_LANGUAGE =	$validedLang.$this->mob_lang_file_sufix;  							
					}
					//echo Session::get('lang_file'); exit();
        			include('SMTP/sendmail.php');
                    $emailsubject = "Your Payment Successfully completed.....";
                    $subject      = "Payment Acknowledgement.....";
                    $name         = $data['payer_name'];
                    $transid      = $data['transaction_id'];
                    $payid        = $data['payer_id'];
                    $ack          = $data['payment_ack'];
                    $address      = "yamuna@pofitec.com";
                    
                    $resultmail   = "Success";
                   /* ob_start();
                    include('Emailsub/paymentemail.php');
                    $body = ob_get_contents();
                    ob_clean();
                    Send_Mail($address, $subject, $body);*/
                    $currenttransactionorderid = base64_encode($new_insert);
			
				    //$trans = Session::get('last_insert_id');
					$trans = $new_insert;
					$trans_id = MobileModel::order_transaction_id($trans);
					$get_subtotal                = MobileModel::get_order_subtotal_paypal($trans_id);
					$get_tax                     = MobileModel::get_order_tax_paypal($trans_id);
					$get_shipping_amount         = MobileModel::get_order_shipping_amount_paypal($trans_id);
										
					//Customer Mail after order complete

					 Mail::send('emails.mobile_ordermail-paypal', array(
						'transaction_id' => $trans_id,
						'Sub_total' =>  $get_subtotal,
						'Tax' =>  $get_tax,
						'Shipping_amount' =>  $get_shipping_amount,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data)
					{
						 $customer_mail = $data['order_shipping_add'];
						//$customer_mail = $shipaddresscus;
						$allpas        = explode(",", $customer_mail);
						$cus_mail      = $allpas[6];
						//$cus_mail      = $ship_email;

						if(Lang::has(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED')!= '') 
						{
							$sessionCUstom_message = trans(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
						}
						else 
						{
							$sessionCUstom_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
						}  




						$message->to($cus_mail)->subject($sessionCUstom_message);
					});
            
				//Merchant Mail after order complete
				/*$merchant_trans_id = Home::get_PayPalOrd_merchant_based_transaction_id($trans_id);
	          
				if(isset($merchant_trans_id) && $merchant_trans_id != "") {
					foreach($merchant_trans_id as $mer=>$m) {
						$merchant_id = $m->order_merchant_id;
	                    $product_id  = $m->order_pro_id;
	                    $order_type  = $m->order_type;
						$get_mer_subtotal = Home::get_PayPalOrd_mer_subtotal($trans_id,$merchant_id);
						$get_mer_tax = Home::get_PayPalOrd_mer_tax($trans_id,$merchant_id);
						$get_mer_shipping_amount = Home::get_PayPalOrd_mer_shipping_amount($trans_id,$merchant_id);
	                    //get merchant email id by sending merchant id from each iteration
	                    $get_mer_email = Home::get_mer_email($merchant_id);

	                    	                    
	                    $mer_email = $get_mer_email[0]->mer_email;
						
	                    $email = array('mer_email'=>$mer_email);
	                    $data  = array_merge($data,$email);
	                    
	                    Mail::send('emails.mobile_orderPAYPAL-merchantmail', array(
							'transaction_id' => $trans_id,
							'Sub_total' =>  $get_mer_subtotal,
							'Tax' =>  $get_mer_tax,
							'Shipping_amount' =>  $get_mer_shipping_amount,'merchant_id' => $merchant_id,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data){
	                                $merchant_email = $data['mer_email'];
	                        //$session_message = "Hi Merchant, your product was purchased.";  

	                         if(Lang::has(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED')!= '') 
							{
								$session_message = trans(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}
							else 
							{
								$session_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}  

							$message->to($merchant_email)->subject($session_message);
						});
					}
				}	 */

			if(isset($_SESSION['lang_file']))
				unset($_SESSION['lang_file']);
	

			/* Mail Functinality ends */


	            		$ship_country_name ="";
						$ship_city_name ="";
						if(count($country_details)>0){
							foreach($country_details as $cntry) {
								if($validedLang!='') {
									$cntry->co_name = $cntry->$co_name_dynamic;
								}
								$ship_country_name =$cntry->co_name;
							}
						}
						if(count($city_details)>0){
							
							foreach($city_details as $city) {
								if($validedLang!='') {
									$city->ci_name = $city->$ci_name_dynamic;
								}
								$ship_city_name =$city->ci_name;
							}
						}
	                    $ship[] = array("ship_name"=>ucfirst($ship_name),"ship_email"=>$ship_email,"ship_phone"=>$ship_phone,"ship_address1"=>ucfirst($ship_address1),"ship_address2"=>ucfirst($ship_address2),"ship_country_id"=>intval($ship_country),"ship_country_name"=>ucfirst($ship_country_name),"ship_city_id"=>intval($ship_city_id),"ship_city_name"=>ucfirst($ship_city_name),"ship_state"=>ucfirst($ship_state),"ship_postalcode"=>$ship_postalcode);
				
						
					}
				}
				if (Lang::has($lang_file.'.API_ORDER_SUCCESSFUL')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_SUCCESSFUL');
				}else{
					$msge = "Order Successful!";
				}
				$encode = array("status"=>200,"message"=>$msge,"cart_details"=>$cart_details,"shipping_details"=>$ship);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}else {
				if (Lang::has($lang_file.'.API_NO_PRODUCT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_PRODUCT_AVAILABLE');
				}else{
					$msge = "No Products available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}
	
	/* PRODUCT BUY NOW ORDER PAYPAL */
	public function product_order_paypal_buy_now()
	{
		$user_id = Input::get('user_id');
		
		$ship_name = Input::get('ship_name');
		$ship_email = Input::get('ship_email');
		$ship_phone = Input::get('ship_phone');
		$ship_address1 = Input::get('ship_address1');
		$ship_address2 = Input::get('ship_address2');
		$ship_country = Input::get('ship_country_id');
		$ship_city_id = Input::get('ship_city_id');
		$ship_state = Input::get('ship_state');
		$ship_postalcode = Input::get('ship_postalcode');
		$transaction_id = Input::get('transaction_id');
		$token_id = Input::get('token_id');
		$payer_email = Input::get('payer_email');
		$payer_id = Input::get('payer_id');
		$payer_name = Input::get('payer_name');
		$payment_ack = 'Success'; //Input::get('payment_ack');
		$payer_status = 'verified'; //Input::get('payer_status');

		$cart_product_id = Input::get('product_id');
		$cart_pro_siz_id = Input::get('product_size_id');
		$cart_pro_col_id = Input::get('product_color_id');
		$cart_product_qty = Input::get('product_qty');


		$cart_type =1; //for products

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
				$pro_desc_dynamic 	= 'pro_desc_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		if($user_id=="" || $user_id==0 || $transaction_id =="" || $cart_product_id=="" || $cart_product_id==0 || $ship_name=="" || $ship_email =="" || $ship_phone=="" ||$ship_address1=="" || $ship_address2 =="" || $ship_country=="" || $ship_city_id=="" || $ship_state =="" || $ship_postalcode=="" || $cart_product_qty ==""){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
		   return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			/* Shipping Country and Shipping city validation */
			$country_details = MobileModel::get_countrylist($ship_country);
			$city_details = MobileModel::get_citylist($ship_country,$ship_city_id);
			if(count($country_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA');
				}else{
					$msge = "Invalid Ship country data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			if(count($city_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_CITY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_CITY_DATA');
				}else{
					$msge = "Invalid Ship city data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u){
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=> $msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			
			$now            = date('Y-m-d h:i:sa');
			$insert_id      = '';
			$total = $tax_amt  = $Qtybased_ship_amt = $ItemTotalPrice = 0;
			$ship = array();
			$cart_details = array();
			
			$siz_arr = array();
			$color_arr = array();
			$product_details = MobileModel::get_product_detail_by_id($cart_product_id);
			if(count($product_details)>0){
				foreach($product_details as $p){
					$purchase_count = $p->pro_qty - $p->pro_no_of_purchase;
					if($validedLang!='') {
						$p->pro_title = $p->$pro_title_dynamic;
					}
					if($purchase_count < $cart_product_qty)
					{//print($purchase_count);
						$encode = array("status"=>400,"message"=>"".ucfirst($p->pro_title)." has exceeded the maximum limit");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
					
					if($p->pro_qty <= $p->pro_no_of_purchase)
					{
						$encode = array("status"=>400,"message"=>"Limit exceeds");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
						
					}
				}
			}

			if(count($product_details)>0){
				foreach($product_details as $p){
					if($validedLang!='') {
						$p->pro_title = $p->$pro_title_dynamic;
						$p->pro_desc = $p->$pro_desc_dynamic;
					}
					/* Size starts */
					if($cart_pro_siz_id !="") {
						$size_details = MobileModel::get_size_details_by_id($p->pro_id,$cart_pro_siz_id);
						if(count($size_details)>0){
							foreach($size_details as $siz){
							$siz_arr[] = array("size_id"=>$siz->ps_si_id,"size_name"=>$siz->si_name,"product_size_id"=>$siz->ps_id);
							}
						}
					}
					/* size ends */
					/* color starts */
					if($cart_pro_col_id !=""){
						$color_details = MobileModel::get_color_details_by_id($p->pro_id,$cart_pro_col_id);
						if(count($color_details)>0){
							foreach($color_details as $col){
								$color_arr[] = array("color_id"=>$col->pc_co_id,"color_name"=>ucfirst($col->co_name),"color_code"=>$col->co_code,"product_color_id"=>$col->pc_id);
							}
						}
					}
					/* color ends */
					$product_image="";
					if($p->pro_Img !="") {
						
						$product_img = explode('/**/', $p->pro_Img);
						if(file_exists('public/assets/product/'.$product_img[0])){
							$product_image = url('').'/public/assets/product/'.$product_img[0];
						}
					}
					$product_code = $p->pro_id;
					//$subtotal = ($p->pro_disprice * $cart_product_qty)+$p->pro_shippamt+$p->pro_inctax;
					$subtotal       = ($p->pro_disprice * $cart_product_qty);
					//$tax_amt = ($subtotal + $p->pro_shippamt)*($p->pro_inctax/100);
					$tax_amt = round(($subtotal)*($p->pro_inctax/100),2);
					$Qtybased_ship_amt = $p->pro_shippamt * $cart_product_qty;
					$total = $subtotal + $Qtybased_ship_amt + $tax_amt;
					$ItemTotalPrice = $ItemTotalPrice + $subtotal;
					$shipaddresscus = $ship_name . ',' . $ship_address1 . ',' . $ship_address2 . ',' . $ship_state . ',' . $ship_postalcode . ',' . $ship_phone . ',' . $ship_email;

					/* Merchant Commission Calculation starts */
                    $mer_commis_amt = $mer_amt = 0 ;
                    $mer_commissionDetails  = array();//MobileModel::getMerchantCommission($p->pro_mr_id); 
                    
                    if(count($mer_commissionDetails)>0){
                        $prod_qty_price = ($cart_product_qty) * ($p->pro_disprice);
                        $tax        = $p->pro_inctax;
                        $tax_price  =(($prod_qty_price)*($tax/100));

                        $ordAmt_tax_ship_amt = ($prod_qty_price + $tax_price ) + $Qtybased_ship_amt;
                        $mer_commis_amt = $ordAmt_tax_ship_amt*($mer_commissionDetails->mer_commission/100);
                        $mer_amt        = $ordAmt_tax_ship_amt - $mer_commis_amt;
                    }
                   // print_r($mer_commis_amt);
                    /* Merchant Commission Calculation ends */
			

					$data = array(
                        'order_cus_id' 			=> $userID,
                        'order_pro_id' 			=> $product_code,
                        'order_type' 			=> $cart_type,
                        'order_qty' 			=> $cart_product_qty,
                        'order_amt' 			=> $subtotal,
						'order_prod_unitPrice' 	=> $p->pro_disprice,
                        'order_tax' 			=> $p->pro_inctax,
						'order_shipping_amt' 	=> $Qtybased_ship_amt, 
                        'order_date' 			=> $now,
                        'order_status' 			=> 1,
                        'delivery_status'       => 1,
                        'order_paytype' 		=> 1,
                        'order_pro_color' 		=> $cart_pro_col_id,
                        'order_pro_size' 		=> $cart_pro_siz_id,
                        'order_shipping_add' 	=> $shipaddresscus,
                        'transaction_id' 		=> $transaction_id,
                        'token_id' 				=> $token_id,
                        'payer_email' 			=> $payer_email,
                        'payer_id' 				=> $payer_id,
                        'payer_name' 			=> $payer_name,
                        'currency_code' 		=> $this->cur_code,
                        'payment_ack' 			=> $payment_ack,
                        'payer_status' 			=> $payer_status,
                        'order_merchant_id' 	=> $p->pro_mr_id,
                        'mer_commission_amt'    => $mer_commis_amt,
                		'mer_amt'               => $mer_amt,
                		'order_taxAmt'          => $tax_amt,

                    );
                    if ($cart_type != 2) {
                      MobileModel::purchased_checkout_product_insert($product_code,$cart_product_qty);
                    }
                    $new_insert = MobileModel::paypal_checkout_insert($data);
                    $ship_country_name ="";
					$ship_city_name ="";
					if(count($country_details)>0){
						foreach($country_details as $cntry) {
							if($validedLang!='') {
								$cntry->co_name = $cntry->$co_name_dynamic;
							}
							$ship_country_name =$cntry->co_name;
						}
					}
					if(count($city_details)>0){
						foreach($city_details as $city) {
							if($validedLang!='') {
								$city->ci_name = $city->$ci_name_dynamic;
							}
							$ship_city_name =$city->ci_name;
						}
					}
                    $ship_data = array(
                        'ship_name' => $ship_name,
                        'ship_address1' => $ship_address1,
                        'ship_address2' => $ship_address2,
                        'ship_state' => $ship_state,
                        'ship_postalcode' => $ship_postalcode,
                        'ship_phone' => $ship_phone,
                        'ship_email' => $ship_email,
                        'ship_cus_id' => $userID,
                        'ship_order_id' => $new_insert,
                        'ship_ci_id'	=>$ship_city_name,
						'ship_country'	=>$ship_country_name,
						'ship_trans_id'	=> $transaction_id
                    );
                    MobileModel::insert_shipping_addr($ship_data, $userID);

                    // merchantOrder Total Calculation
					//$this->merchantOverORderTotal('paypal',$new_insert);

					$cart_details[] = array("cart_product_id"=>intval($p->pro_id),"cart_transaction_id"=>$transaction_id,"cart_title"=>ucfirst($p->pro_title),"cart_description"=>ucfirst($p->pro_desc),"cart_quantity"=>$cart_product_qty,"cart_image"=>$product_image,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->pro_disprice),"cart_tax"=>floatval($tax_amt),"cart_shipping"=>floatval($Qtybased_ship_amt),"cart_delivery"=>$p->pro_delivery,"cart_merchant_id"=>$p->pro_mr_id,"cart_total"=>floatval($total),"cart_order_date"=>$now,"cart_paytype"=> "Paypal","cart_userid"=>intval($userID),"cart_size_details"=>$siz_arr,"cart_color_details"=>$color_arr);
					
					//$delete_cart = MobileModel::delete_cart_by_id($cart->cart_id,$cart_type);
				}
				/*
				include_once('SMTP/sendmail.php');
                $emailsubject = "Your Payment Successfully completed.....";
                $subject      = "Payment Acknowledgement.....";
                $name         = $payer_name;
                $transid      = $transaction_id;
                $payid        = $payer_id;
                $ack          = $payment_ack;
                $address      = $ship_email;
                
                $resultmail   = "success";
                ob_start();
                include('Emailsub/paymentemail.php');
                $body = ob_get_contents();
                ob_clean();
                Send_Mail($address, $subject, $body);
        		*/


        		/* Mail Functinality starts */
        			//set language session
					//Posted language is en
					if($lang=='en')
					{
						Session::put('lang_file','en_lang');
						$this->OUR_LANGUAGE =	'en_lang';  	
					}

					//Posted language is other than en
	                if($validedLang!='')  {      
	                    Session::put('lang_file',$validedLang.$this->mob_lang_file_sufix);
						$this->OUR_LANGUAGE =	$validedLang.$this->mob_lang_file_sufix;  							
					}
					//echo Session::get('lang_file'); exit();
        			include_once('SMTP/sendmail.php');
                    $emailsubject = "Your Payment Successfully completed.....";
                    $subject      = "Payment Acknowledgement.....";
                    $name         = $data['payer_name'];
                    $transid      = $data['transaction_id'];
                    $payid        = $data['payer_id'];
                    $ack          = $data['payment_ack'];
                    $address      = "";
                    
                    $resultmail   = "Success";
                   /* ob_start();
                    include('Emailsub/paymentemail.php');
                    $body = ob_get_contents();
                    ob_clean();
                    Send_Mail($address, $subject, $body);*/
                    $currenttransactionorderid = base64_encode($new_insert);
			
				    //$trans = Session::get('last_insert_id');
					$trans = $new_insert;
					$trans_id = MobileModel::order_transaction_id($trans);
					$get_subtotal                = MobileModel::get_order_subtotal_paypal($trans_id);
					$get_tax                     = MobileModel::get_order_tax_paypal($trans_id);
					$get_shipping_amount         = MobileModel::get_order_shipping_amount_paypal($trans_id);
										
					//Customer Mail after order complete

					 Mail::send('emails.mobile_ordermail-paypal', array(
						'transaction_id' => $trans_id,
						'Sub_total' =>  $get_subtotal,
						'Tax' =>  $get_tax,
						'Shipping_amount' =>  $get_shipping_amount,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data)
					{
						 $customer_mail = $data['order_shipping_add'];
						//$customer_mail = $shipaddresscus;
						$allpas        = explode(",", $customer_mail);
						$cus_mail      = $allpas[6];
						//$cus_mail      = $ship_email;

						if(Lang::has(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED')!= '') 
						{
							$sessionCUstom_message = trans(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
						}
						else 
						{
							$sessionCUstom_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
						}  




						$message->to($cus_mail)->subject($sessionCUstom_message);
					});
            
				//Merchant Mail after order complete
				/*$merchant_trans_id = Home::get_PayPalOrd_merchant_based_transaction_id($trans_id);
	          
				if(isset($merchant_trans_id) && $merchant_trans_id != "") {
					foreach($merchant_trans_id as $mer=>$m) {
						$merchant_id = $m->order_merchant_id;
	                    $product_id  = $m->order_pro_id;
	                    $order_type  = $m->order_type;
						$get_mer_subtotal = Home::get_PayPalOrd_mer_subtotal($trans_id,$merchant_id);
						$get_mer_tax = Home::get_PayPalOrd_mer_tax($trans_id,$merchant_id);
						$get_mer_shipping_amount = Home::get_PayPalOrd_mer_shipping_amount($trans_id,$merchant_id);
	                    //get merchant email id by sending merchant id from each iteration
	                    $get_mer_email = Home::get_mer_email($merchant_id);

	                    	                    
	                    $mer_email = $get_mer_email[0]->mer_email;
						
	                    $email = array('mer_email'=>$mer_email);
	                    $data  = array_merge($data,$email);
	                    
	                    Mail::send('emails.mobile_orderPAYPAL-merchantmail', array(
							'transaction_id' => $trans_id,
							'Sub_total' =>  $get_mer_subtotal,
							'Tax' =>  $get_mer_tax,
							'Shipping_amount' =>  $get_mer_shipping_amount,'merchant_id' => $merchant_id,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data){
	                                $merchant_email = $data['mer_email'];
	                        //$session_message = "Hi Merchant, your product was purchased.";  

	                         if(Lang::has(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED')!= '') 
							{
								$session_message = trans(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}
							else 
							{
								$session_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}  

							$message->to($merchant_email)->subject($session_message);
						});
					}
				}	 */

			if(isset($_SESSION['lang_file']))
				unset($_SESSION['lang_file']);
	

			/* Mail Functinality ends */


        		$ship_country_name ="";
				$ship_city_name ="";
				if(count($country_details)>0){
					foreach($country_details as $cntry) {
						if($validedLang!='') {
							$cntry->co_name = $cntry->$co_name_dynamic;
						}
						$ship_country_name =$cntry->co_name;
					}
				}
				if(count($city_details)>0){
					foreach($city_details as $city) {
						if($validedLang!='') {
							$city->ci_name = $city->$ci_name_dynamic;
						}
						$ship_city_name =$city->ci_name;
					}
				}
                $ship[] = array("ship_name"=>ucfirst($ship_name),"ship_email"=>$ship_email,"ship_phone"=>$ship_phone,"ship_address1"=>ucfirst($ship_address1),"ship_address2"=>ucfirst($ship_address2),"ship_country_id"=>intval($ship_country),"ship_country_name"=>ucfirst($ship_country_name),"ship_city_id"=>intval($ship_city_id),"ship_city_name"=>ucfirst($ship_city_name),"ship_state"=>ucfirst($ship_state),"ship_postalcode"=>$ship_postalcode);
				if (Lang::has($lang_file.'.API_ORDER_SUCCESSFUL')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_SUCCESSFUL');
				}else{
					$msge = "Order Successful!";
				}
				$encode = array("status"=>200,"message"=>$msge,"cart_details"=>$cart_details,"shipping_details"=>$ship);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} else {
				if (Lang::has($lang_file.'.API_NO_PRODUCT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_PRODUCT_AVAILABLE');
				}else{
					$msge = "No Products available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}
	/* DEAL BUY NOW ORDER PAYPAL */
	public function order_deal_paypal_buy_now()
	{
		
		$user_id = Input::get('user_id');
		$cart_deal_id = Input::get('deal_id');
		$cart_product_qty = Input::get('deal_qty');

		$ship_name = Input::get('ship_name');
		$ship_email = Input::get('ship_email');
		$ship_phone = Input::get('ship_phone');
		$ship_address1 = Input::get('ship_address1');
		$ship_address2 = Input::get('ship_address2');
		$ship_country = Input::get('ship_country_id');
		$ship_city_id = Input::get('ship_city_id');
		$ship_state = Input::get('ship_state');
		$ship_postalcode = Input::get('ship_postalcode');
		$transaction_id = Input::get('transaction_id');
		$token_id = Input::get('token_id');
		$payer_email = Input::get('payer_email');
		$payer_id = Input::get('payer_id');
		$payer_name = Input::get('payer_name');
		$payment_ack = 'Success'; //Input::get('payment_ack');
		$payer_status = 'verified'; //Input::get('payer_status');

		$cart_type =2; //for Deals

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file  = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$deal_title_dynamic 	= 'deal_title_'.$lang;
				$deal_description_dynamic 	= 'deal_description_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


		if($user_id=="" || $user_id==0){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
		   return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			/* Shipping Country and Shipping city validation */
			$country_details = MobileModel::get_countrylist($ship_country);
			$city_details = MobileModel::get_citylist($ship_country,$ship_city_id);
			if(count($country_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA');
				}else{
					$msge = "Invalid Ship country data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			if(count($city_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_CITY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_CITY_DATA');
				}else{
					$msge = "Invalid Ship city data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u){
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=> $msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			
			$now            = date('Y-m-d h:i:sa');
			$insert_id      = '';
			$tax_amt = $total = $prod_qty_price = $Qtybased_ship_amt = $ItemTotalPrice = 0;
			$ship = array();
			$cart_details = array();
			
			$siz_arr = array();
			$color_arr = array();
			
			$deal_details = MobileModel::get_deals_details_by_id($cart_deal_id);
			if(count($deal_details)>0){
				foreach($deal_details as $p){
					$purchase_count = $p->deal_max_limit - $p->deal_no_of_purchase;
					if($purchase_count < $cart_product_qty)
					{
						$encode = array("status"=>400,"message"=>"quantity exceeds the maximum deal limit");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
					
					if($p->deal_max_limit <= $p->deal_no_of_purchase)
					{
						$encode = array("status"=>400,"message"=>"Limit exceeds");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
						
					}
					
					if($validedLang!='') {
						$p->deal_title = $p->$deal_title_dynamic;
						$p->deal_description = $p->$deal_description_dynamic;
					}
					$deal_image="";
					if($p->deal_image !="") {
						$deal_img = explode('/**/', $p->deal_image);
						if(file_exists('public/assets/deals/'.$deal_img[0])){
							$deal_image = url('').'/public/assets/deals/'.$deal_img[0];
						}
					}
					$product_code   = $p->deal_id;
					//$subtotal       = ($p->deal_discount_price * $cart_product_qty)+$p->deal_inctax+$p->deal_shippamt;

					$prod_qty_price  	= $p->deal_discount_price * $cart_product_qty;
					$subtotal     		= $prod_qty_price;
					$tax_amt 			= round(($prod_qty_price)*($p->deal_inctax/100),2);
					$Qtybased_ship_amt 	= $p->deal_shippamt * $cart_product_qty;
					$total  = $subtotal + $Qtybased_ship_amt + $tax_amt ;
																					   
					$ItemTotalPrice = $ItemTotalPrice + $subtotal;
					$shipaddresscus = $ship_name . ',' . $ship_address1 . ',' . $ship_address2 . ',' . $ship_state . ',' . $ship_postalcode . ',' . $ship_phone . ',' . $ship_email;

					/* Merchant Commission Calculation starts */
                    $mer_commis_amt = $mer_amt = 0 ;
                    $mer_commissionDetails  = array();//MobileModel::getMerchantCommission($p->deal_merchant_id); 
                    if(count($mer_commissionDetails)>0){

                    	$prod_qty_price = ($cart_product_qty) * ($p->deal_discount_price);
                        $tax        = $p->deal_inctax;
                        $tax_price  =(($prod_qty_price)*($tax/100));

                        $ordAmt_tax_ship_amt = $prod_qty_price + $tax_price  + $Qtybased_ship_amt;
                        $mer_commis_amt =  $ordAmt_tax_ship_amt *($mer_commissionDetails->mer_commission/100);
                        $mer_amt        =  $ordAmt_tax_ship_amt - $mer_commis_amt;
                    }
                    /* Merchant Commission Calculation ends */

					$data = array(
                        'order_cus_id' 			=> $userID,
                        'order_pro_id' 			=> $product_code,
                        'order_type' 			=> $cart_type,
                        'order_qty' 			=> $cart_product_qty,
                        'order_amt' 			=> $subtotal,
                        'order_tax' 			=> 0,
						'order_prod_unitPrice' 	=> $p->deal_discount_price,
                        'order_tax' 			=> $p->deal_inctax,
                        'order_shipping_amt' 	=> $Qtybased_ship_amt,				   
                        'order_date' 			=> $now,
                        'order_status' 			=> 1,
                        'delivery_status'       => 1,
                        'order_paytype' 		=> 1,
                        'order_pro_color' 		=> 0,
                        'order_pro_size' 		=> 0,
                        'order_shipping_add' 	=> $shipaddresscus,
                        'transaction_id' 		=> $transaction_id,
                        'token_id' 				=> $token_id,
                        'payer_email' 			=> $payer_email,
                        'payer_id' 				=> $payer_id,
                        'payer_name' 			=> $payer_name,
                        'currency_code' 		=> $this->cur_code,
                        'payment_ack' 			=> $payment_ack,
                        'payer_status' 			=> $payer_status,
                        'order_merchant_id' 	=> $p->deal_merchant_id,
                        'mer_commission_amt'    => $mer_commis_amt,
                		'mer_amt'               => $mer_amt,
                		'order_taxAmt'          => $tax_amt,
                    );
                    if ($cart_type != 2) {
                      MobileModel::purchased_checkout_product_insert($product_code,$cart_product_qty);
                    }
                    $new_insert = MobileModel::paypal_checkout_insert($data);
                    $ship_country_name ="";
					$ship_city_name ="";
					if(count($country_details)>0){
						foreach($country_details as $cntry) {
							if($validedLang!='') {
								$cntry->co_name = $cntry->$co_name_dynamic;
							}
							$ship_country_name =$cntry->co_name;
						}
					}
					if(count($city_details)>0){
						foreach($city_details as $city) {
							if($validedLang!='') {
								$city->ci_name = $city->$ci_name_dynamic;
							}
							$ship_city_name =$city->ci_name;
						}
					}
                    $ship_data = array(
                        'ship_name' => $ship_name,
                        'ship_address1' => $ship_address1,
                        'ship_address2' => $ship_address2,
                        'ship_state' => $ship_state,
                        'ship_postalcode' => $ship_postalcode,
                        'ship_phone' => $ship_phone,
                        'ship_email' => $ship_email,
                        'ship_cus_id' => $userID,
                        'ship_order_id' => $new_insert,
						'ship_ci_id'	=>$ship_city_name,
						'ship_country'	=>$ship_country_name,
						'ship_trans_id'	=> $transaction_id
                    );
                    MobileModel::insert_shipping_addr($ship_data, $userID);

                    // merchantOrder Total Calculation
					//$this->merchantOverORderTotal('paypal',$new_insert);

					$cart_details[] = array("cart_deal_id"=>intval($p->deal_id),"cart_transaction_id"=>$transaction_id,"cart_title"=>ucfirst($p->deal_title),"cart_description"=>ucfirst($p->deal_description),"cart_quantity"=>$cart_product_qty,"cart_delivery"=>$p->deal_delivery,"cart_image"=>$deal_image,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->deal_discount_price),"cart_tax"=>floatval($tax_amt),"cart_shipping"=>floatval($Qtybased_ship_amt),"cart_merchant_id"=>$p->deal_merchant_id,"cart_total"=>floatval($total),"cart_order_date"=>$now,"cart_paytype"=> "COD","cart_userid"=>intval($userID));
					
					//$delete_cart = MobileModel::delete_cart_by_id($cart->cart_id,$cart_type);
					$deal_available = $p->deal_no_of_purchase;
					$purchased_deals = $deal_available + $cart_product_qty;
					DB::table('nm_deals')->where('deal_id','=',$cart_deal_id)->update(['deal_no_of_purchase' =>$purchased_deals]);
				
				}
				/*
				include('SMTP/sendmail.php');
                $emailsubject = "Your Payment Successfully completed.....";
                $subject      = "Payment Acknowledgement.....";
                $name         = $payer_name;
                $transid      = $transaction_id;
                $payid        = $payer_id;
                $ack          = $payment_ack;
                $address      = $ship_email;
                
                $resultmail   = "success";
                ob_start();
                include('Emailsub/paymentemail.php');
                $body = ob_get_contents();
                ob_clean();
                Send_Mail($address, $subject, $body);
        		*/

        		/* Mail Functinality starts */
        			//set language session
					//Posted language is en
					if($lang=='en')
					{
						Session::put('lang_file','en_lang');
						$this->OUR_LANGUAGE =	'en_lang';  	
					}

					//Posted language is other than en
	                if($validedLang!='')  {      
	                    Session::put('lang_file',$validedLang.$this->mob_lang_file_sufix);
						$this->OUR_LANGUAGE =	$validedLang.$this->mob_lang_file_sufix;  							
					}
					//echo Session::get('lang_file'); exit();
        			include('SMTP/sendmail.php');
                    $emailsubject = "Your Payment Successfully completed.....";
                    $subject      = "Payment Acknowledgement.....";
                    $name         = $data['payer_name'];
                    $transid      = $data['transaction_id'];
                    $payid        = $data['payer_id'];
                    $ack          = $data['payment_ack'];
                    $address      = "";
                    
                    $resultmail   = "Success";
                   /* ob_start();
                    include('Emailsub/paymentemail.php');
                    $body = ob_get_contents();
                    ob_clean();
                    Send_Mail($address, $subject, $body);*/
                    $currenttransactionorderid = base64_encode($new_insert);
			
				    //$trans = Session::get('last_insert_id');
					$trans = $new_insert;
					$trans_id = MobileModel::order_transaction_id($trans);
					$get_subtotal                = MobileModel::get_order_subtotal_paypal($trans_id);
					$get_tax                     = MobileModel::get_order_tax_paypal($trans_id);
					$get_shipping_amount         = MobileModel::get_order_shipping_amount_paypal($trans_id);
										
					//Customer Mail after order complete

					 Mail::send('emails.mobile_ordermail-paypal', array(
						'transaction_id' => $trans_id,
						'Sub_total' =>  $get_subtotal,
						'Tax' =>  $get_tax,
						'Shipping_amount' =>  $get_shipping_amount,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data)
					{
						 $customer_mail = $data['order_shipping_add'];
						//$customer_mail = $shipaddresscus;
						$allpas        = explode(",", $customer_mail);
						$cus_mail      = $allpas[6];
						//$cus_mail      = $ship_email;

						if(Lang::has(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED')!= '') 
						{
							$sessionCUstom_message = trans(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
						}
						else 
						{
							$sessionCUstom_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
						}  




						$message->to($cus_mail)->subject($sessionCUstom_message);
					});
            
				//Merchant Mail after order complete
				/*$merchant_trans_id = Home::get_PayPalOrd_merchant_based_transaction_id($trans_id);
	          
				if(isset($merchant_trans_id) && $merchant_trans_id != "") {
					foreach($merchant_trans_id as $mer=>$m) {
						$merchant_id = $m->order_merchant_id;
	                    $product_id  = $m->order_pro_id;
	                    $order_type  = $m->order_type;
						$get_mer_subtotal = Home::get_PayPalOrd_mer_subtotal($trans_id,$merchant_id);
						$get_mer_tax = Home::get_PayPalOrd_mer_tax($trans_id,$merchant_id);
						$get_mer_shipping_amount = Home::get_PayPalOrd_mer_shipping_amount($trans_id,$merchant_id);
	                    //get merchant email id by sending merchant id from each iteration
	                    $get_mer_email = Home::get_mer_email($merchant_id);
						$mer_email = "";
	                    	                    
	                    if(count($get_mer_email)>0) {
	                    	foreach($get_mer_email as $get_mer)
	                    	{
	                    		$mer_email = $get_mer->mer_email;
	                    	}
	                    }
						
	                    $email = array('mer_email'=>$mer_email);
	                    $data  = array_merge($data,$email);
	                    
	                    Mail::send('emails.mobile_orderPAYPAL-merchantmail', array(
							'transaction_id' => $trans_id,
							'Sub_total' =>  $get_mer_subtotal,
							'Tax' =>  $get_mer_tax,
							'Shipping_amount' =>  $get_mer_shipping_amount,'merchant_id' => $merchant_id,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data){
	                                $merchant_email = $data['mer_email'];
	                        //$session_message = "Hi Merchant, your product was purchased.";  

	                         if(Lang::has(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED')!= '') 
							{
								$session_message = trans(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}
							else 
							{
								$session_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}  

							$message->to($merchant_email)->subject($session_message);
						});
																																															
					}
				}	 */

			if(isset($_SESSION['lang_file']))
				unset($_SESSION['lang_file']);
	

			/* Mail Functinality ends */


        		$ship_country_name ="";
				$ship_city_name ="";
				if(count($country_details)>0){
					foreach($country_details as $cntry) {
						if($validedLang!='') {
							$cntry->co_name = $cntry->$co_name_dynamic;
						}
						$ship_country_name =$cntry->co_name;
					}
				}
				if(count($city_details)>0){
					foreach($city_details as $city) {
						if($validedLang!='') {
							$city->ci_name = $city->$ci_name_dynamic;
						}
						$ship_city_name =$city->ci_name;
					}
				}
                $ship[] = array("ship_name"=>ucfirst($ship_name),"ship_email"=>$ship_email,"ship_phone"=>$ship_phone,"ship_address1"=>ucfirst($ship_address1),"ship_address2"=>ucfirst($ship_address2),"ship_country_id"=>intval($ship_country),"ship_country_name"=>ucfirst($ship_country_name),"ship_city_id"=>intval($ship_city_id),"ship_city_name"=>ucfirst($ship_city_name),"ship_state"=>ucfirst($ship_state),"ship_postalcode"=>$ship_postalcode);
				if (Lang::has($lang_file.'.API_ORDER_SUCCESSFUL')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_SUCCESSFUL');
				}else{
					$msge = "Order Successful!";
				}
				$encode = array("status"=>200,"message"=>$msge,"cart_details"=>$cart_details,"shipping_details"=>$ship);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} else {
				if (Lang::has($lang_file.'.API_NO_DEALS_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_DEALS_AVAILABLE');
				}else{
					$msge = "No Deals available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}

	/* Near me map search */ 
	public function near_me_map_search()
	{
		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file =$this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$stor_name_dynamic 	= 'stor_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;
				

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		$city_details = MobileModel::get_city_details();
		$city_arr = array();
		if(count($city_details)>0) {
			foreach($city_details as $city){
				if($validedLang!='') {
					$city->ci_name = $city->$ci_name_dynamic;
				}
				
				$city_arr[] =  array("city_id"=>intval($city->ci_id),"city_name"=>ucfirst($city->ci_name));
			}
		}
		$shop_details  = MobileModel::get_all_shop_details();
		//dd(DB::getQueryLog());
		$product_count =0;
		$deal_count =0;
		$shop_list = array();
		if(count($shop_details)>0) {
			foreach($shop_details as $s){
				if($validedLang!='') {
					$s->stor_name = $s->$stor_name_dynamic;
				}
				$storeid = $s->stor_id;
				$store_image= "";
				if($s->stor_img !=""){
					if(file_exists('public/assets/storeimage/'.$s->stor_img)){
						$store_image = url('').'/assets/storeimage/'.$s->stor_img;
					}
				}
				$product_count = MobileModel::get_product_count_by_shop($storeid);
				$deal_count = MobileModel::get_deal_count_by_shop($storeid);
				$shop_list[] = array("store_id"=>intval($s->stor_id),"store_name"=>ucfirst($s->stor_name),"store_img"=>$store_image,"store_status"=>$s->stor_status,"product_count"=>$product_count,"deal_count"=>$deal_count,"store_latitude"=>$s->stor_latitude,"store_longitude"=>$s->stor_longitude,"store_city_id"=>$s->stor_city,"store_phone"=>$s->stor_phone,"store_address1"=>ucfirst($s->stor_address1),
					"store_address2"=>ucfirst($s->stor_address2),"store_zipcode"=>$s->stor_zipcode,"store_website"=>$s->stor_website);
				
			}
		}
		if (Lang::has($lang_file.'.API_CITY_LIST_AVAILABLE')!= '') 
		{ 
			$msge 	=  trans($lang_file.'.API_CITY_LIST_AVAILABLE');
		}else{
			$msge = "City List available!";
		}
		
		$encode = array("status"=>200,"message"=>$msge,"map_details"=>$city_arr,"store_details"=>$shop_list);
		return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		
	}

	/****  
    **  Merchant overall order details start **
    **  table contains all merchant orders totals;  **
    **  this is used for commission payment process     **

    ****/
    public function merchantOverORderTotal($paymentType,$trans_id){

        $trans                  = $trans_id;    
        if($paymentType=='paypal')  
        {
            $trans_id = Home::order_transaction_id($trans);            
            $merchant_trans_id = Home::get_PayPalOrd_merchant_based_transaction_id($trans_id);
        }elseif($paymentType=='payumoney')  {      
            $trans_id               = Payumoney::transaction_id($trans);      //get cod_transaction_id   from nm_ordercod
            $merchant_trans_id = Payumoney::get_merchant_based_transaction_id($trans_id);//get cod_transaction_id','cod_merchant_id','cod_pro_id','cod_order_type   from nm_ordercod
        }
        else{      
            $trans_id = Home::transaction_id($trans);            
            $merchant_trans_id = Home::get_merchant_based_transaction_id($trans_id);
        }      



      
        if(isset($merchant_trans_id) && $merchant_trans_id != "") {
            foreach($merchant_trans_id as $mer=>$m) {

                if($paymentType=='paypal')  
                {
                    $merchant_id = $m->order_merchant_id;                    
                    $merTrans_id = $m->transaction_id; 
                }elseif($paymentType=='payumoney'){      
                    $merchant_id = $m->cod_merchant_id;                    
                    $merTrans_id = $m->cod_transaction_id; 
                } else{      
                    $merchant_id = $m->cod_merchant_id;                    
                    $merTrans_id = $m->cod_transaction_id; 
                } 
                                   
                $MergetOverallOrdDetails   = 0;//MobileModel::overallOrderDetails($merchant_id);
                $sumOfOrderCod  = 0;//MobileModel::sumOfOrderCodAmount($merchant_id,$trans_id);
                $sumOfOrder     = 0;//MobileModel::sumOfOrderAmount($merchant_id,$trans_id);
                $orderTotAmt = $Offline_tot_ord    = $Offline_tot_coupon =   $Offline_tot_wallet   =  0;
                $online_tot_ord     = $online_tot_coupon  =   $online_tot_wallet    =  0;

                /* Commission and merchant amount 
                *** It going to process on commission and fund request part ***
                */
                $commissionAmt = $merchantAmt = 0 ;
                $cod_commissionAmt      =   $cod_merchantAmt        = 0; 
                $ord_commissionAmt      =   $ord_merchantAmt        = 0; 

                if(count($sumOfOrderCod)>0){
                    $sumTax = 0;
                    $taxes  = MobileModel::getAll_CODtax_details($merchant_id,$trans_id);

                    if(count($taxes)>0){
                        foreach ($taxes as $tax) {
                            if($tax->cod_tax>0)
                                $sumTax+= ($tax->cod_amt*($tax->cod_tax/100));
                        }
                    }

                    $Offline_tot_ord    =  $sumOfOrderCod->sumCodAmt+ $sumTax + $sumOfOrderCod->sumShippingAmt;
                    $Offline_tot_coupon =  $sumOfOrderCod->sumCoupon;
                    $Offline_tot_wallet =  $sumOfOrderCod->sumWallet;

                    $cod_commissionAmt      =  $sumOfOrderCod->sumMerchantCommission; 
                    $cod_merchantAmt        =  $sumOfOrderCod->sumCoupon +$sumOfOrderCod->sumWallet; 

                    if($sumOfOrderCod->sumCodAmt>0)
                    {
                        $orderTotAmt =  $Offline_tot_ord;
                    }

                       
                }   
              
                if(count($sumOfOrder)>0){
                    $ord_sumTax =0;

                    $taxes  = MobileModel::getAll_Ordtax_details($merchant_id,$trans_id);

                    if(count($taxes)>0){
                        foreach ($taxes as $tax) {
                            if($tax->order_tax>0)
                                $ord_sumTax+= ($tax->order_amt*($tax->order_tax/100));
                        }
                    }

                    $online_tot_ord     =  $sumOfOrder->sumOrdAmt+ $ord_sumTax + $sumOfOrder->sumShippingAmt;
                    $online_tot_coupon  =  $sumOfOrder->sumCoupon;
                    $online_tot_wallet  =  $sumOfOrder->sumWallet;

                    $ord_commissionAmt      =  0; 
               
                    $ord_merchantAmt        = $sumOfOrder->sumMerchantAmount; 


                    if($sumOfOrder->sumOrdAmt>0)
                    {
                        $orderTotAmt =  $online_tot_ord;
                    }
                
                }

               $commissionAmt  = $cod_commissionAmt + $ord_commissionAmt ; 
               $merchantAmt    = $cod_merchantAmt + $ord_merchantAmt ; 

                $tot_coupon     = $Offline_tot_coupon + $online_tot_coupon;
                $tot_wallet     = $Offline_tot_wallet + $online_tot_wallet;
               
               

                //Admin amount : online_tot_ord,tot_coupon,tot_wallet
                //Merchant Amount : Offline_tot_ord

                //overallOrder merchant
                //merchant exist on overallOrder, so update else insert
                if(count($MergetOverallOrdDetails)>0){
                    foreach ($MergetOverallOrdDetails as $getOverallOrdDetails) {
                        
                    }
                    $entry = array(
                    'over_mer_id'          => $getOverallOrdDetails->over_mer_id, 
                    'over_tot_ord_amt'     => $getOverallOrdDetails->over_tot_ord_amt + $orderTotAmt,
                    'over_tot_offline_amt' => $getOverallOrdDetails->over_tot_offline_amt + $Offline_tot_ord,
                    'over_tot_online_amt'  => $getOverallOrdDetails->over_tot_online_amt + $online_tot_ord,
                    'over_tot_coupon_amt'  => $getOverallOrdDetails->over_tot_coupon_amt + $tot_coupon,
                    'over_tot_wallet_amt'  => $getOverallOrdDetails->over_tot_wallet_amt + $tot_wallet,
                    'commissionAmt'        => $getOverallOrdDetails->commissionAmt + $commissionAmt,
                    'merchantAmt'          => $getOverallOrdDetails->merchantAmt + $merchantAmt
                    );
                    MobileModel::updateMerchantOverallOrder($entry,$getOverallOrdDetails->overOrd_id); 
                }else{
                    $entry = array(
                        'over_mer_id'          => $merchant_id, 
                        'over_tot_ord_amt'     => $orderTotAmt,
                        'over_tot_offline_amt' => $Offline_tot_ord,
                        'over_tot_online_amt'  => $online_tot_ord,
                        'over_tot_coupon_amt'  => $tot_coupon,
                        'over_tot_wallet_amt'  => $tot_wallet,
                        'commissionAmt'        => $commissionAmt,
                        'merchantAmt'          => $merchantAmt
                    );
                    MobileModel::insertMerchantOverallOrder($entry);
                }
               
            } 
        }
        /* Merchant overall order details ends  */
    }

    /* PAYPAL CURRENCY CONVERTION */
    /*public function get_currency_amount1()
    {
    	$Convert_from_Currency_Code = Input::get('Convert_from_Currency_Code'); 
    	$amount = Input::get('amount'); 
		
    	if($Convert_from_Currency_Code == "") {
			$encode = array("status"=>400,"message"=>"Currency Code is missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else if($amount == "") {
			$encode = array("status"=>400,"message"=>"Amount is missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {

			$from_Currency = urlencode($Convert_from_Currency_Code);
			$to_Currency = urlencode("USD");
			$get = file_get_contents("https://finance.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
			$get = explode("<span class=bld>",$get);
			
			if(isset($get[1])) {
				$get = explode("</span>",$get[1]);
				$converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);
				$to_Currency ="USD";

				$encode = array("status"=>200,"message"=>"Success!","Convert_to_Currency_Code"=>$to_Currency,"Convert_from_Currency_Code"=>$Convert_from_Currency_Code,"amount"=>floatval($converted_currency))	;
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			} else {
				$encode = array("status"=>400,"message"=>"Something wrong in Currency Values!");
				return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
			}
			
			
		}

    }*/

	/* CURRENCY CONVERTER NEW */
	public function get_currency_amount()
	{	
		$Convert_from_Currency_Code = Input::get('Convert_from_Currency_Code'); 
    	$amount = Input::get('amount'); 
		
    	if($Convert_from_Currency_Code == "") {
			$encode = array("status"=>400,"message"=>"Currency Code is missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else if($amount == "") {
			$encode = array("status"=>400,"message"=>"Amount is missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			
			$amount = urlencode($amount);
			$from_Currency = urlencode($Convert_from_Currency_Code);
			$to_Currency = "USD";	
			$html = file_get_contents("http://www.xe.com/currencyconverter/convert/?Amount=$amount&From=$from_Currency&To=$to_Currency");
			$dom = new \DOMDocument;
			@$dom->loadHTML($html);
			foreach ($dom->getElementsByTagName('span') as $node) {
				if ($node->hasAttribute('class') && strstr($node->getAttribute('class'), 'uccResultAmount')){
					$convertedAmt=explode(".",$dom->saveHtml($node));
					$repClass=str_replace('<span class="uccResultAmount">','',$convertedAmt[0]); 
					$twoGt=str_split($convertedAmt[1],2);
					$encode = array("status"=>200,"message"=>"Success!","Convert_to_Currency_Code"=>$to_Currency,"Convert_from_Currency_Code"=>$Convert_from_Currency_Code,"amount"=>$repClass.'.'.$twoGt[0]);
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					//return $repClass.".".$twoGt[0];
				} 	 
			}
		}
	}
	
    /* PRODUCT ORDER PAYUMONEY */
	public function product_order_payumoney()
	{ 
		$user_id = Input::get('user_id'); 
		$ship_name = Input::get('ship_name');
		$ship_email = Input::get('ship_email');
		$ship_phone = Input::get('ship_phone');
		$ship_address1 = Input::get('ship_address1');
		$ship_address2 = Input::get('ship_address2');
		$ship_country = Input::get('ship_country_id');
		$ship_city_id = Input::get('ship_city_id');
		$ship_state = Input::get('ship_state');
		$ship_postalcode = Input::get('ship_postalcode');
		$transaction_id = Input::get('transaction_id');
		$token_id = Input::get('token_id');
		$payer_email = Input::get('payer_email');
		$payer_id = Input::get('payer_id');
		$payer_name = Input::get('payer_name');
		$payment_ack = 'Success'; //Input::get('payment_ack');
		$payer_status = 'verified'; //Input::get('payer_status');
		$cart_type =1; //for products
		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file		=$this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		//$encode = array("status"=>400,"message"=>'language:'.$user_id);
		//return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
				$pro_desc_dynamic 	= 'pro_desc_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


		if($user_id=="" || $user_id==0 || $transaction_id =="" || $ship_name=="" || $ship_email =="" || $ship_phone=="" ||$ship_address1=="" || $ship_address2 =="" || $ship_country=="" || $ship_city_id=="" || $ship_state =="" || $ship_postalcode=="" ){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
		   return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			/* Shipping Country and Shipping city validation */
			$country_details = MobileModel::get_countrylist($ship_country);
			$city_details = MobileModel::get_citylist($ship_country,$ship_city_id);
			if(count($country_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA');
				}else{
					$msge = "Invalid Ship country data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			if(count($city_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_CITY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_CITY_DATA');
				}else{
					$msge = "Invalid Ship city data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u){
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$get_cart_details = MobileModel::get_product_cart_by_userid($user_id,$cart_type);

			$now            = date('Y-m-d h:i:sa');
			$insert_id      = '';
			$total = $tax_amt = $Qtybased_ship_amt = $ItemTotalPrice = 0;
			$ship = array();
			$cart_details = array();
			if(count($get_cart_details)>0) {
				foreach($get_cart_details as $cart){
					$product_details = MobileModel::get_product_detail_by_id($cart->cart_product_id);
					if(count($product_details)>0){
						foreach($product_details as $p){
					$purchase_count = $p->pro_qty - $p->pro_no_of_purchase;
					if($purchase_count < $cart->cart_product_qty)
					{
						//print($purchase_count);
						$encode = array("status"=>400,"message"=>"".ucfirst($p->pro_title)." has exceeded the maximum limit");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
					
					if($p->pro_qty <= $p->pro_no_of_purchase)
					{
						$encode = array("status"=>400,"message"=>"Limit exceeds","product_title" =>ucfirst($p->pro_title));
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
						
					}	
						}
					}
				}
			}		
			
			if(count($get_cart_details)>0) {
				foreach($get_cart_details as $cart){
					$siz_arr = array();
					$color_arr = array();
					$product_details = MobileModel::get_product_detail_by_id($cart->cart_product_id);
					if(count($product_details)>0){
						$ship = array();
						foreach($product_details as $p){

							if($validedLang!='') {
								$p->pro_title = $p->$pro_title_dynamic;
								$p->pro_desc = $p->$pro_desc_dynamic;
							}



							/* Size starts */
							if($cart->cart_pro_siz_id !="") {
								$size_details = MobileModel::get_size_details_by_id($p->pro_id,$cart->cart_pro_siz_id);
								if(count($size_details)>0){
									foreach($size_details as $siz){
									$siz_arr[] = array("size_id"=>$siz->ps_si_id,"size_name"=>$siz->si_name,"product_size_id"=>$siz->ps_id);
									}
								}
							}
							/* size ends */
							/* color starts */
							if($cart->cart_pro_col_id !=""){
								$color_details = MobileModel::get_color_details_by_id($p->pro_id,$cart->cart_pro_col_id);
								if(count($color_details)>0){
									foreach($color_details as $col){
										$color_arr[] = array("color_id"=>$col->pc_co_id,"color_name"=>ucfirst($col->co_name),"color_code"=>$col->co_code,"product_color_id"=>$col->pc_id);
									}
								}
							}
							/* color ends */
							$product_image="";
							if($p->pro_Img !="") {
								$product_img = explode('/**/', $p->pro_Img);
								if(file_exists('public/assets/product/'.$product_img[0])){
									$product_image = url('').'/public/assets/product/'.$product_img[0];
								}
							}
							$product_code = $p->pro_id;
							//$subtotal = ($p->pro_disprice * $cart->cart_product_qty)+$p->pro_shippamt+$p->pro_inctax;
							$subtotal       = ($p->pro_disprice * $cart->cart_product_qty);
							//$tax_amt = ($subtotal + $p->pro_shippamt)*($p->pro_inctax/100);
							$tax_amt = round(($subtotal)*($p->pro_inctax/100),2);
							$Qtybased_ship_amt = $p->pro_shippamt * $cart->cart_product_qty;
							$total = $subtotal + $Qtybased_ship_amt  + $tax_amt;
							$ItemTotalPrice = $ItemTotalPrice + $subtotal;
							$shipaddresscus = $ship_name . ',' . $ship_address1 . ',' . $ship_address2 . ',' . $ship_state . ',' . $ship_postalcode . ',' . $ship_phone . ',' . $ship_email;

							/* Merchant Commission Calculation starts */
		                    $mer_commis_amt = $mer_amt = 0 ;
		                    $mer_commissionDetails  = array(); 
		                    
		                    if(count($mer_commissionDetails)>0){
		                        $prod_qty_price = ($cart->cart_product_qty) * ($p->pro_disprice);
		                        $tax        = $p->pro_inctax;
		                        $tax_price  =(($prod_qty_price)*($tax/100));

		                        $ordAmt_tax_ship_amt = ($prod_qty_price + $tax_price ) + $Qtybased_ship_amt;
		                        $mer_commis_amt = $ordAmt_tax_ship_amt*($mer_commissionDetails->mer_commission/100);
		                        $mer_amt        = $ordAmt_tax_ship_amt - $mer_commis_amt;
		                    }
		                   // print_r($mer_commis_amt);
		                    /* Merchant Commission Calculation ends */

							$data = array(
		                        'order_cus_id' 			=> $userID,
		                        'order_pro_id' 			=> $product_code,
		                        'order_type' 			=> $cart_type,
		                        'order_qty' 			=> $cart->cart_product_qty,
		                        'order_amt'				=> $subtotal,
								'order_prod_unitPrice' 	=> $p->pro_disprice,
		                        'order_tax' 			=> $p->pro_inctax,
		                        'order_shipping_amt' 	=> $Qtybased_ship_amt,			 
		                        'order_date' 			=> $now,
		                        'order_status' 			=> 1,
		                        'delivery_status'       => 1,
		                        'order_paytype' 		=> 1,
		                        'order_pro_color' 		=> $cart->cart_pro_col_id,
		                        'order_pro_size' 		=> $cart->cart_pro_siz_id,
		                        'order_shipping_add' 	=> $shipaddresscus,
		                        'transaction_id' 		=> $transaction_id,
		                        'token_id' 				=> $token_id,
		                        'payer_email' 			=> $payer_email,
		                        'payer_id' 				=> $payer_id,
		                        'payer_name' 			=> $payer_name,
		                        'currency_code' 		=> $this->cur_code,
		                        'payment_ack' 			=> $payment_ack,
		                        'payer_status' 			=> $payer_status,
		                        'order_merchant_id' 	=> $p->pro_mr_id,
		                        'mer_commission_amt'    => $mer_commis_amt,
                        		'mer_amt'               => $mer_amt,
                        		'order_taxAmt'          => $tax_amt,
		                    );
		                    if ($cart_type != 2) {
		                      MobileModel::purchased_checkout_product_insert($product_code,$cart->cart_product_qty);
		                    }
		                    $new_insert = MobileModel::payumoney_checkout_insert($data);
		                    $ship_country_name ="";
							$ship_city_name ="";
							if(count($country_details)>0){
								foreach($country_details as $cntry) {
									if($validedLang!='') {
										$cntry->co_name = $cntry->$co_name_dynamic;
									}
									$ship_country_name =$cntry->co_name;
								}
							}
							if(count($city_details)>0){
								foreach($city_details as $city) {
									if($validedLang!='') {
										$city->ci_name = $city->$ci_name_dynamic;
									}
									$ship_city_name =$city->ci_name;
								}
							}
		                    $ship_data = array(
	                            'ship_name' => $ship_name,
	                            'ship_address1' => $ship_address1,
	                            'ship_address2' => $ship_address2,
	                            'ship_state' => $ship_state,
	                            'ship_postalcode' => $ship_postalcode,
	                            'ship_phone' => $ship_phone,
	                            'ship_email' => $ship_email,
	                            'ship_cus_id' => $userID,
	                            'ship_order_id' => $new_insert,
	                            'ship_ci_id'	=>$ship_city_name,
								'ship_country'	=>$ship_country_name,
								'ship_trans_id'	=> $transaction_id
	                        );
	                        MobileModel::insert_shipping_addr($ship_data, $userID);

	                        // merchantOrder Total Calculation
							//$this->merchantOverORderTotal('payumoney',$new_insert);

							$cart_details[] = array("cart_id"=>intval($cart->cart_id),"cart_product_id"=>intval($p->pro_id),"cart_transaction_id"=>$transaction_id,"cart_title"=>ucfirst($p->pro_title),"cart_description"=>ucfirst($p->pro_desc),"cart_quantity"=>$cart->cart_product_qty,"cart_image"=>$product_image,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->pro_disprice),"cart_tax"=>floatval($tax_amt),"cart_shipping"=>floatval($Qtybased_ship_amt),"cart_delivery"=>$p->pro_delivery,"cart_merchant_id"=>$p->pro_mr_id,"cart_total"=>floatval($total),"cart_order_date"=>$now,"cart_paytype"=> "Paypal","cart_userid"=>intval($userID),"cart_size_details"=>$siz_arr,"cart_color_details"=>$color_arr);
							
							$delete_cart = MobileModel::delete_cart_by_id($cart->cart_id,$cart_type);
						}
						/*
						include('SMTP/sendmail.php');
	                    $emailsubject = "Your Payment Successfully completed.....";
	                    $subject      = "Payment Acknowledgement.....";
	                    $name         = $payer_name;
	                    $transid      = $transaction_id;
	                    $payid        = $payer_id;
	                    $ack          = $payment_ack;
	                    $address      = $ship_email;
	                    
	                    $resultmail   = "success";
	                    ob_start();
	                    include('Emailsub/paymentemail.php');
	                    $body = ob_get_contents();
	                    ob_clean();
	                    Send_Mail($address, $subject, $body);
	            		*/

	            		/* Mail Functinality starts */
        			//set language session
					//Posted language is en
					if($lang=='en')
					{
						Session::put('lang_file','en'.$this->mob_lang_file_sufix);
						$this->OUR_LANGUAGE =	'en'.$this->mob_lang_file_sufix;  	
					}

					//Posted language is other than en
	                if($validedLang!='')  {      
	                    Session::put('lang_file',$validedLang.$this->mob_lang_file_sufix);
						$this->OUR_LANGUAGE =	$validedLang.$this->mob_lang_file_sufix;  							
					}
					//echo Session::get('lang_file'); exit();
        			include('SMTP/sendmail.php');
                    $emailsubject = "Your Payment Successfully completed.....";
                    $subject      = "Payment Acknowledgement.....";
                    $name         = $data['payer_name'];
                    $transid      = $data['transaction_id'];
                    $payid        = $data['payer_id'];
                    $ack          = $data['payment_ack'];
                    $address      = "yamuna@pofitec.com";
                    
                    $resultmail   = "Success";
                   /* ob_start();
                    include('Emailsub/paymentemail.php');
                    $body = ob_get_contents();
                    ob_clean();
                    Send_Mail($address, $subject, $body);*/
                    $currenttransactionorderid = base64_encode($new_insert);
			
				    //$trans = Session::get('last_insert_id');
					$trans = $new_insert;
					$trans_id = MobileModel::orderPayu_transaction_id($trans);
					$get_subtotal                = MobileModel::get_order_subtotal_payU($trans_id);
					$get_tax                     = MobileModel::get_order_tax_payU($trans_id);
					$get_shipping_amount         = MobileModel::get_order_shipping_amount_payU($trans_id);
										
					//Customer Mail after order complete

					 Mail::send('emails.mobile_ordermail-payumoney', array(
						'transaction_id' => $trans_id,
						'Sub_total' =>  $get_subtotal,
						'Tax' =>  $get_tax,
						'Shipping_amount' =>  $get_shipping_amount,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data)
					{
						 $customer_mail = $data['order_shipping_add'];
						//$customer_mail = $shipaddresscus;
						$allpas        = explode(",", $customer_mail);
						$cus_mail      = $allpas[6];
						//$cus_mail      = $ship_email;

						if(Lang::has(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED')!= '') 
						{
							$sessionCUstom_message = trans(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
						}
						else 
						{
							$sessionCUstom_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
						}  




						$message->to($cus_mail)->subject($sessionCUstom_message);
					});
            
				//Merchant Mail after order complete
			
			if(isset($_SESSION['lang_file']))
				unset($_SESSION['lang_file']);
	

			/* Mail Functinality ends */


	            		$ship_country_name ="";
						$ship_city_name ="";
						if(count($country_details)>0){
							foreach($country_details as $cntry) {
								if($validedLang!='') {
									$cntry->co_name = $cntry->$co_name_dynamic;
								}
								$ship_country_name =$cntry->co_name;
							}
						}
						if(count($city_details)>0){
							
							foreach($city_details as $city) {
								if($validedLang!='') {
									$city->ci_name = $city->$ci_name_dynamic;
								}
								$ship_city_name =$city->ci_name;
							}
						}
	                    $ship[] = array("ship_name"=>ucfirst($ship_name),"ship_email"=>$ship_email,"ship_phone"=>$ship_phone,"ship_address1"=>ucfirst($ship_address1),"ship_address2"=>ucfirst($ship_address2),"ship_country_id"=>intval($ship_country),"ship_country_name"=>ucfirst($ship_country_name),"ship_city_id"=>intval($ship_city_id),"ship_city_name"=>ucfirst($ship_city_name),"ship_state"=>ucfirst($ship_state),"ship_postalcode"=>$ship_postalcode);
				
						
					}
				}
				if (Lang::has($lang_file.'.API_ORDER_SUCCESSFUL')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_SUCCESSFUL');
				}else{
					$msge = "Order Successful!";
				}
				$encode = array("status"=>200,"message"=>$msge,"cart_details"=>$cart_details,"shipping_details"=>$ship);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}else {
				if (Lang::has($lang_file.'.API_NO_PRODUCT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_PRODUCT_AVAILABLE');
				}else{
					$msge = "No Products available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}

	public function order_deal_payumoney_buy_now()
	{
		
		$user_id = Input::get('user_id');
		$cart_deal_id = Input::get('deal_id');
		$cart_product_qty = Input::get('deal_qty');

		$ship_name = Input::get('ship_name');
		$ship_email = Input::get('ship_email');
		$ship_phone = Input::get('ship_phone');
		$ship_address1 = Input::get('ship_address1');
		$ship_address2 = Input::get('ship_address2');
		$ship_country = Input::get('ship_country_id');
		$ship_city_id = Input::get('ship_city_id');
		$ship_state = Input::get('ship_state');
		$ship_postalcode = Input::get('ship_postalcode');
		$transaction_id = Input::get('transaction_id');
		$token_id = Input::get('token_id');
		$payer_email = Input::get('payer_email');
		$payer_id = Input::get('payer_id');
		$payer_name = Input::get('payer_name');
		$payment_ack = 'Success'; //Input::get('payment_ack');
		$payer_status = 'verified'; //Input::get('payer_status');

		$cart_type =2; //for Deals

		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file  = $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$deal_title_dynamic 	= 'deal_title_'.$lang;
				$deal_description_dynamic 	= 'deal_description_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */


		if($user_id=="" || $user_id==0){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
		   return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			/* Shipping Country and Shipping city validation */
			$country_details = MobileModel::get_countrylist($ship_country);
			$city_details = MobileModel::get_citylist($ship_country,$ship_city_id);
			if(count($country_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA');
				}else{
					$msge = "Invalid Ship country data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			if(count($city_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_CITY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_CITY_DATA');
				}else{
					$msge = "Invalid Ship city data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u){
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=> $msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			
			$now            = date('Y-m-d h:i:sa');
			$insert_id      = '';
			$tax_amt = $total = $prod_qty_price = $Qtybased_ship_amt = $ItemTotalPrice = 0;
			$ship = array();
			$cart_details = array();
			
			$siz_arr = array();
			$color_arr = array();
			
			$deal_details = MobileModel::get_deals_details_by_id($cart_deal_id);
			if(count($deal_details)>0){
				foreach($deal_details as $p){
					$purchase_count = $p->deal_max_limit - $p->deal_no_of_purchase;
					if($purchase_count < $cart_product_qty)
					{
						$encode = array("status"=>400,"message"=>"quantity exceeds the maximum deal limit");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
					
					if($p->deal_max_limit <= $p->deal_no_of_purchase)
					{
						$encode = array("status"=>400,"message"=>"Limit exceeds");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
						
					}
					
					if($validedLang!='') {
						$p->deal_title = $p->$deal_title_dynamic;
						$p->deal_description = $p->$deal_description_dynamic;
					}
					$deal_image="";
					if($p->deal_image !="") {
						$deal_img = explode('/**/', $p->deal_image);
						if(file_exists('public/assets/deals/'.$deal_img[0])){
							$deal_image = url('').'/public/assets/deals/'.$deal_img[0];
						}
					}
					$product_code   = $p->deal_id;
					//$subtotal       = ($p->deal_discount_price * $cart_product_qty)+$p->deal_inctax+$p->deal_shippamt;

					$prod_qty_price  	= $p->deal_discount_price * $cart_product_qty;
					$subtotal     		= $prod_qty_price;
					$tax_amt 			= round(($prod_qty_price)*($p->deal_inctax/100),2);
					$Qtybased_ship_amt 	= $p->deal_shippamt * $cart_product_qty;
					$total  = $subtotal + $Qtybased_ship_amt + $tax_amt ;
																					   
					$ItemTotalPrice = $ItemTotalPrice + $subtotal;
					$shipaddresscus = $ship_name . ',' . $ship_address1 . ',' . $ship_address2 . ',' . $ship_state . ',' . $ship_postalcode . ',' . $ship_phone . ',' . $ship_email;

					/* Merchant Commission Calculation starts */
                    $mer_commis_amt = $mer_amt = 0 ;
                    $mer_commissionDetails  = array();//MobileModel::getMerchantCommission($p->deal_merchant_id); 
                    if(count($mer_commissionDetails)>0){

                    	$prod_qty_price = ($cart_product_qty) * ($p->deal_discount_price);
                        $tax        = $p->deal_inctax;
                        $tax_price  =(($prod_qty_price)*($tax/100));

                        $ordAmt_tax_ship_amt = $prod_qty_price + $tax_price  + $Qtybased_ship_amt;
                        $mer_commis_amt =  $ordAmt_tax_ship_amt *($mer_commissionDetails->mer_commission/100);
                        $mer_amt        =  $ordAmt_tax_ship_amt - $mer_commis_amt;
                    }
                    /* Merchant Commission Calculation ends */

					$data = array(
                        'order_cus_id' 			=> $userID,
                        'order_pro_id' 			=> $product_code,
                        'order_type' 			=> $cart_type,
                        'order_qty' 			=> $cart_product_qty,
                        'order_amt' 			=> $subtotal,
                        'order_tax' 			=> 0,
						'order_prod_unitPrice' 	=> $p->deal_discount_price,
                        'order_tax' 			=> $p->deal_inctax,
                        'order_shipping_amt' 	=> $Qtybased_ship_amt,				   
                        'order_date' 			=> $now,
                        'order_status' 			=> 1,
                        'delivery_status'       => 1,
                        'order_paytype' 		=> 1,
                        'order_pro_color' 		=> 0,
                        'order_pro_size' 		=> 0,
                        'order_shipping_add' 	=> $shipaddresscus,
                        'transaction_id' 		=> $transaction_id,
                        'token_id' 				=> $token_id,
                        'payer_email' 			=> $payer_email,
                        'payer_id' 				=> $payer_id,
                        'payer_name' 			=> $payer_name,
                        'currency_code' 		=> $this->cur_code,
                        'payment_ack' 			=> $payment_ack,
                        'payer_status' 			=> $payer_status,
                        'order_merchant_id' 	=> $p->deal_merchant_id,
                        'mer_commission_amt'    => $mer_commis_amt,
                		'mer_amt'               => $mer_amt,
                		'order_taxAmt'          => $tax_amt,
                    );
                    if ($cart_type != 2) {
                      MobileModel::purchased_checkout_product_insert($product_code,$cart_product_qty);
                    }
                    $new_insert = MobileModel::payumoney_checkout_insert($data);
                    $ship_country_name ="";
					$ship_city_name ="";
					if(count($country_details)>0){
						foreach($country_details as $cntry) {
							if($validedLang!='') {
								$cntry->co_name = $cntry->$co_name_dynamic;
							}
							$ship_country_name =$cntry->co_name;
						}
					}
					if(count($city_details)>0){
						foreach($city_details as $city) {
							if($validedLang!='') {
								$city->ci_name = $city->$ci_name_dynamic;
							}
							$ship_city_name =$city->ci_name;
						}
					}
                    $ship_data = array(
                        'ship_name' => $ship_name,
                        'ship_address1' => $ship_address1,
                        'ship_address2' => $ship_address2,
                        'ship_state' => $ship_state,
                        'ship_postalcode' => $ship_postalcode,
                        'ship_phone' => $ship_phone,
                        'ship_email' => $ship_email,
                        'ship_cus_id' => $userID,
                        'ship_order_id' => $new_insert,
						'ship_ci_id'	=>$ship_city_name,
						'ship_country'	=>$ship_country_name,
						'ship_trans_id'	=> $transaction_id
                    );
                    MobileModel::insert_shipping_addr($ship_data, $userID);

                    // merchantOrder Total Calculation
					//$this->merchantOverORderTotal('paypal',$new_insert);

					$cart_details[] = array("cart_deal_id"=>intval($p->deal_id),"cart_transaction_id"=>$transaction_id,"cart_title"=>ucfirst($p->deal_title),"cart_description"=>ucfirst($p->deal_description),"cart_quantity"=>$cart_product_qty,"cart_delivery"=>$p->deal_delivery,"cart_image"=>$deal_image,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->deal_discount_price),"cart_tax"=>floatval($tax_amt),"cart_shipping"=>floatval($Qtybased_ship_amt),"cart_merchant_id"=>$p->deal_merchant_id,"cart_total"=>floatval($total),"cart_order_date"=>$now,"cart_paytype"=> "COD","cart_userid"=>intval($userID));
					
					//$delete_cart = MobileModel::delete_cart_by_id($cart->cart_id,$cart_type);
					$deal_available = $p->deal_no_of_purchase;
					$purchased_deals = $deal_available + $cart_product_qty;
					DB::table('nm_deals')->where('deal_id','=',$cart_deal_id)->update(['deal_no_of_purchase' =>$purchased_deals]);
				
				}
				/*
				include('SMTP/sendmail.php');
                $emailsubject = "Your Payment Successfully completed.....";
                $subject      = "Payment Acknowledgement.....";
                $name         = $payer_name;
                $transid      = $transaction_id;
                $payid        = $payer_id;
                $ack          = $payment_ack;
                $address      = $ship_email;
                
                $resultmail   = "success";
                ob_start();
                include('Emailsub/paymentemail.php');
                $body = ob_get_contents();
                ob_clean();
                Send_Mail($address, $subject, $body);
        		*/

        		/* Mail Functinality starts */
        			//set language session
					//Posted language is en
					if($lang=='en')
					{
						Session::put('lang_file','en_lang');
						$this->OUR_LANGUAGE =	'en_lang';  	
					}

					//Posted language is other than en
	                if($validedLang!='')  {      
	                    Session::put('lang_file',$validedLang.$this->mob_lang_file_sufix);
						$this->OUR_LANGUAGE =	$validedLang.$this->mob_lang_file_sufix;  							
					}
					//echo Session::get('lang_file'); exit();
        			include('SMTP/sendmail.php');
                    $emailsubject = "Your Payment Successfully completed.....";
                    $subject      = "Payment Acknowledgement.....";
                    $name         = $data['payer_name'];
                    $transid      = $data['transaction_id'];
                    $payid        = $data['payer_id'];
                    $ack          = $data['payment_ack'];
                    $address      = "";
                    
                    $resultmail   = "Success";
                   /* ob_start();
                    include('Emailsub/paymentemail.php');
                    $body = ob_get_contents();
                    ob_clean();
                    Send_Mail($address, $subject, $body);*/
                    $currenttransactionorderid = base64_encode($new_insert);
			
				    //$trans = Session::get('last_insert_id');
					$trans = $new_insert;
					$trans_id = MobileModel::orderPayu_transaction_id($trans);
					$get_subtotal                = MobileModel::get_order_subtotal_payU($trans_id);
					$get_tax                     = MobileModel::get_order_tax_payU($trans_id);
					$get_shipping_amount         = MobileModel::get_order_shipping_amount_payU($trans_id);
										
					//Customer Mail after order complete
					Mail::send('emails.mobile_ordermail-payumoney', array(
						'transaction_id' => $trans_id,
						'Sub_total' =>  $get_subtotal,
						'Tax' =>  $get_tax,
						'Shipping_amount' =>  $get_shipping_amount,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data)
					{
						 $customer_mail = $data['order_shipping_add'];
						//$customer_mail = $shipaddresscus;
						$allpas        = explode(",", $customer_mail);
						$cus_mail      = $allpas[6];
						//$cus_mail      = $ship_email;

						if(Lang::has(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED')!= '') 
						{
							$sessionCUstom_message = trans(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
						}
						else 
						{
							$sessionCUstom_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
						}  




						$message->to($cus_mail)->subject($sessionCUstom_message);
					});
            
				//Merchant Mail after order complete
				/*$merchant_trans_id = Home::get_PayPalOrd_merchant_based_transaction_id($trans_id);
	          
				if(isset($merchant_trans_id) && $merchant_trans_id != "") {
					foreach($merchant_trans_id as $mer=>$m) {
						$merchant_id = $m->order_merchant_id;
	                    $product_id  = $m->order_pro_id;
	                    $order_type  = $m->order_type;
						$get_mer_subtotal = Home::get_PayPalOrd_mer_subtotal($trans_id,$merchant_id);
						$get_mer_tax = Home::get_PayPalOrd_mer_tax($trans_id,$merchant_id);
						$get_mer_shipping_amount = Home::get_PayPalOrd_mer_shipping_amount($trans_id,$merchant_id);
	                    //get merchant email id by sending merchant id from each iteration
	                    $get_mer_email = Home::get_mer_email($merchant_id);
						$mer_email = "";
	                    	                    
	                    if(count($get_mer_email)>0) {
	                    	foreach($get_mer_email as $get_mer)
	                    	{
	                    		$mer_email = $get_mer->mer_email;
	                    	}
	                    }
						
	                    $email = array('mer_email'=>$mer_email);
	                    $data  = array_merge($data,$email);
	                    
	                    Mail::send('emails.mobile_orderPAYPAL-merchantmail', array(
							'transaction_id' => $trans_id,
							'Sub_total' =>  $get_mer_subtotal,
							'Tax' =>  $get_mer_tax,
							'Shipping_amount' =>  $get_mer_shipping_amount,'merchant_id' => $merchant_id,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data){
	                                $merchant_email = $data['mer_email'];
	                        //$session_message = "Hi Merchant, your product was purchased.";  

	                         if(Lang::has(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED')!= '') 
							{
								$session_message = trans(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}
							else 
							{
								$session_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}  

							$message->to($merchant_email)->subject($session_message);
						});
																																															
					}
				}	 */

			if(isset($_SESSION['lang_file']))
				unset($_SESSION['lang_file']);
	

			/* Mail Functinality ends */


        		$ship_country_name ="";
				$ship_city_name ="";
				if(count($country_details)>0){
					foreach($country_details as $cntry) {
						if($validedLang!='') {
							$cntry->co_name = $cntry->$co_name_dynamic;
						}
						$ship_country_name =$cntry->co_name;
					}
				}
				if(count($city_details)>0){
					foreach($city_details as $city) {
						if($validedLang!='') {
							$city->ci_name = $city->$ci_name_dynamic;
						}
						$ship_city_name =$city->ci_name;
					}
				}
                $ship[] = array("ship_name"=>ucfirst($ship_name),"ship_email"=>$ship_email,"ship_phone"=>$ship_phone,"ship_address1"=>ucfirst($ship_address1),"ship_address2"=>ucfirst($ship_address2),"ship_country_id"=>intval($ship_country),"ship_country_name"=>ucfirst($ship_country_name),"ship_city_id"=>intval($ship_city_id),"ship_city_name"=>ucfirst($ship_city_name),"ship_state"=>ucfirst($ship_state),"ship_postalcode"=>$ship_postalcode);
				if (Lang::has($lang_file.'.API_ORDER_SUCCESSFUL')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_SUCCESSFUL');
				}else{
					$msge = "Order Successful!";
				}
				$encode = array("status"=>200,"message"=>$msge,"cart_details"=>$cart_details,"shipping_details"=>$ship);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} else {
				if (Lang::has($lang_file.'.API_NO_DEALS_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_DEALS_AVAILABLE');
				}else{
					$msge = "No Deals available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}
	/* PRODUCT BUY NOW ORDER PAYUMONEY */
	public function product_order_payumoney_buy_now()
	{
		$user_id = Input::get('user_id');
		
		$ship_name = Input::get('ship_name');
		$ship_email = Input::get('ship_email');
		$ship_phone = Input::get('ship_phone');
		$ship_address1 = Input::get('ship_address1');
		$ship_address2 = Input::get('ship_address2');
		$ship_country = Input::get('ship_country_id');
		$ship_city_id = Input::get('ship_city_id');
		$ship_state = Input::get('ship_state');
		$ship_postalcode = Input::get('ship_postalcode');
		$transaction_id = Input::get('transaction_id');
		$token_id = Input::get('token_id');
		$payer_email = Input::get('payer_email');
		$payer_id = Input::get('payer_id');
		$payer_name = Input::get('payer_name');
		$payment_ack = 'Success'; //Input::get('payment_ack');
		$payer_status = 'verified'; //Input::get('payer_status');

		$cart_product_id = Input::get('product_id');
		$cart_pro_siz_id = Input::get('product_size_id');
		$cart_pro_col_id = Input::get('product_color_id');
		$cart_product_qty = Input::get('product_qty');
		$cart_type =1; //for products
		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file		= $this->lang_file;
		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		
		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}
		elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				$pro_title_dynamic 	= 'pro_title_'.$lang;
				$pro_desc_dynamic 	= 'pro_desc_'.$lang;
				$co_name_dynamic 	= 'co_name_'.$lang;
				$ci_name_dynamic 	= 'ci_name_'.$lang;

			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		if($user_id=="" || $user_id==0 || $transaction_id =="" || $cart_product_id=="" || $cart_product_id==0 || $ship_name=="" || $ship_email =="" || $ship_phone=="" ||$ship_address1=="" || $ship_address2 =="" || $ship_country=="" || $ship_city_id=="" || $ship_state =="" || $ship_postalcode=="" || $cart_product_qty ==""){
			if (Lang::has($lang_file.'.API_PARAMETER_MISSING')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_PARAMETER_MISSING');
			}else{
				$msge = "Parameter missing!";
			}			

			$encode = array("status"=>400,"message"=>$msge);
		   return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			/* Shipping Country and Shipping city validation */
			$country_details = MobileModel::get_countrylist($ship_country);
			$city_details = MobileModel::get_citylist($ship_country,$ship_city_id);
			if(count($country_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_COUNTRY_DATA');
				}else{
					$msge = "Invalid Ship country data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			if(count($city_details)==0){
				if (Lang::has($lang_file.'.API_INVALID_SHIP_CITY_DATA')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_INVALID_SHIP_CITY_DATA');
				}else{
					$msge = "Invalid Ship city data!";
				}

				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			$userID ="";
			$user_details = MobileModel::get_user_details($user_id);
			if(count($user_details)>0){
				foreach($user_details as $u){
					$userID = $u->cus_id;
				}
			} else {
				if (Lang::has($lang_file.'.API_USER_NOT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_USER_NOT_AVAILABLE');
				}else{
					$msge = "User not available!";
				}
				$encode = array("status"=>400,"message"=> $msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
			
			$now            = date('Y-m-d h:i:sa');
			$insert_id      = '';
			$total = $tax_amt  = $Qtybased_ship_amt = $ItemTotalPrice = 0;
			$ship = array();
			$cart_details = array();
			
			$siz_arr = array();
			$color_arr = array();
			$product_details = MobileModel::get_product_detail_by_id($cart_product_id);
			if(count($product_details)>0){
				foreach($product_details as $p){
					$purchase_count = $p->pro_qty - $p->pro_no_of_purchase;
					if($validedLang!='') {
						$p->pro_title = $p->$pro_title_dynamic;
					}
					if($purchase_count < $cart_product_qty)
					{//print($purchase_count);
						$encode = array("status"=>400,"message"=>"".ucfirst($p->pro_title)." has exceeded the maximum limit");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
					}
					
					if($p->pro_qty <= $p->pro_no_of_purchase)
					{
						$encode = array("status"=>400,"message"=>"Limit exceeds");
						return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
						
					}
				}
			}

			if(count($product_details)>0){
				foreach($product_details as $p){
					if($validedLang!='') {
						$p->pro_title = $p->$pro_title_dynamic;
						$p->pro_desc = $p->$pro_desc_dynamic;
					}
					/* Size starts */
					if($cart_pro_siz_id !="") {
						$size_details = MobileModel::get_size_details_by_id($p->pro_id,$cart_pro_siz_id);
						if(count($size_details)>0){
							foreach($size_details as $siz){
							$siz_arr[] = array("size_id"=>$siz->ps_si_id,"size_name"=>$siz->si_name,"product_size_id"=>$siz->ps_id);
							}
						}
					}
					/* size ends */
					/* color starts */
					if($cart_pro_col_id !=""){
						$color_details = MobileModel::get_color_details_by_id($p->pro_id,$cart_pro_col_id);
						if(count($color_details)>0){
							foreach($color_details as $col){
								$color_arr[] = array("color_id"=>$col->pc_co_id,"color_name"=>ucfirst($col->co_name),"color_code"=>$col->co_code,"product_color_id"=>$col->pc_id);
							}
						}
					}
					/* color ends */
					$product_image="";
					if($p->pro_Img !="") {
						
						$product_img = explode('/**/', $p->pro_Img);
						if(file_exists('public/assets/product/'.$product_img[0])){
							$product_image = url('').'/public/assets/product/'.$product_img[0];
						}
					}
					$product_code = $p->pro_id;
					//$subtotal = ($p->pro_disprice * $cart_product_qty)+$p->pro_shippamt+$p->pro_inctax;
					$subtotal       = ($p->pro_disprice * $cart_product_qty);
					//$tax_amt = ($subtotal + $p->pro_shippamt)*($p->pro_inctax/100);
					$tax_amt = round(($subtotal)*($p->pro_inctax/100),2);
					$Qtybased_ship_amt = $p->pro_shippamt * $cart_product_qty;
					$total = $subtotal + $Qtybased_ship_amt + $tax_amt;
					$ItemTotalPrice = $ItemTotalPrice + $subtotal;
					$shipaddresscus = $ship_name . ',' . $ship_address1 . ',' . $ship_address2 . ',' . $ship_state . ',' . $ship_postalcode . ',' . $ship_phone . ',' . $ship_email;

					/* Merchant Commission Calculation starts */
                    $mer_commis_amt = $mer_amt = 0 ;
                    $mer_commissionDetails  = array();//MobileModel::getMerchantCommission($p->pro_mr_id); 
                    
                    if(count($mer_commissionDetails)>0){
                        $prod_qty_price = ($cart_product_qty) * ($p->pro_disprice);
                        $tax        = $p->pro_inctax;
                        $tax_price  =(($prod_qty_price)*($tax/100));

                        $ordAmt_tax_ship_amt = ($prod_qty_price + $tax_price ) + $Qtybased_ship_amt;
                        $mer_commis_amt = $ordAmt_tax_ship_amt*($mer_commissionDetails->mer_commission/100);
                        $mer_amt        = $ordAmt_tax_ship_amt - $mer_commis_amt;
                    }
                   // print_r($mer_commis_amt);
                    /* Merchant Commission Calculation ends */
			

					$data = array(
                        'order_cus_id' 			=> $userID,
                        'order_pro_id' 			=> $product_code,
                        'order_type' 			=> $cart_type,
                        'order_qty' 			=> $cart_product_qty,
                        'order_amt' 			=> $subtotal,
						'order_prod_unitPrice' 	=> $p->pro_disprice,
                        'order_tax' 			=> $p->pro_inctax,
						'order_shipping_amt' 	=> $Qtybased_ship_amt, 
                        'order_date' 			=> $now,
                        'order_status' 			=> 1,
                        'delivery_status'       => 1,
                        'order_paytype' 		=> 1,
                        'order_pro_color' 		=> $cart_pro_col_id,
                        'order_pro_size' 		=> $cart_pro_siz_id,
                        'order_shipping_add' 	=> $shipaddresscus,
                        'transaction_id' 		=> $transaction_id,
                        'token_id' 				=> $token_id,
                        'payer_email' 			=> $payer_email,
                        'payer_id' 				=> $payer_id,
                        'payer_name' 			=> $payer_name,
                        'currency_code' 		=> $this->cur_code,
                        'payment_ack' 			=> $payment_ack,
                        'payer_status' 			=> $payer_status,
                        'order_merchant_id' 	=> $p->pro_mr_id,
                        'mer_commission_amt'    => $mer_commis_amt,
                		'mer_amt'               => $mer_amt,
                		'order_taxAmt'          => $tax_amt,

                    );
                    if ($cart_type != 2) {
                      MobileModel::purchased_checkout_product_insert($product_code,$cart_product_qty);
                    }
                    $new_insert = MobileModel::payumoney_checkout_insert($data);
                    $ship_country_name ="";
					$ship_city_name ="";
					if(count($country_details)>0){
						foreach($country_details as $cntry) {
							if($validedLang!='') {
								$cntry->co_name = $cntry->$co_name_dynamic;
							}
							$ship_country_name =$cntry->co_name;
						}
					}
					if(count($city_details)>0){
						foreach($city_details as $city) {
							if($validedLang!='') {
								$city->ci_name = $city->$ci_name_dynamic;
							}
							$ship_city_name =$city->ci_name;
						}
					}
                    $ship_data = array(
                        'ship_name' => $ship_name,
                        'ship_address1' => $ship_address1,
                        'ship_address2' => $ship_address2,
                        'ship_state' => $ship_state,
                        'ship_postalcode' => $ship_postalcode,
                        'ship_phone' => $ship_phone,
                        'ship_email' => $ship_email,
                        'ship_cus_id' => $userID,
                        'ship_order_id' => $new_insert,
                        'ship_ci_id'	=>$ship_city_name,
						'ship_country'	=>$ship_country_name,
						'ship_trans_id'	=> $transaction_id
                    );
                    MobileModel::insert_shipping_addr($ship_data, $userID);

                    // merchantOrder Total Calculation
					//$this->merchantOverORderTotal('paypal',$new_insert);

					$cart_details[] = array("cart_product_id"=>intval($p->pro_id),"cart_transaction_id"=>$transaction_id,"cart_title"=>ucfirst($p->pro_title),"cart_description"=>ucfirst($p->pro_desc),"cart_quantity"=>$cart_product_qty,"cart_image"=>$product_image,"cart_currency_code"=>$this->cur_code,"cart_currency_symbol"=>$this->cur_symbol,"cart_price"=>floatval($p->pro_disprice),"cart_tax"=>floatval($tax_amt),"cart_shipping"=>floatval($Qtybased_ship_amt),"cart_delivery"=>$p->pro_delivery,"cart_merchant_id"=>$p->pro_mr_id,"cart_total"=>floatval($total),"cart_order_date"=>$now,"cart_paytype"=> "Paypal","cart_userid"=>intval($userID),"cart_size_details"=>$siz_arr,"cart_color_details"=>$color_arr);
					
					//$delete_cart = MobileModel::delete_cart_by_id($cart->cart_id,$cart_type);
				}
				/*
				include_once('SMTP/sendmail.php');
                $emailsubject = "Your Payment Successfully completed.....";
                $subject      = "Payment Acknowledgement.....";
                $name         = $payer_name;
                $transid      = $transaction_id;
                $payid        = $payer_id;
                $ack          = $payment_ack;
                $address      = $ship_email;
                
                $resultmail   = "success";
                ob_start();
                include('Emailsub/paymentemail.php');
                $body = ob_get_contents();
                ob_clean();
                Send_Mail($address, $subject, $body);
        		*/


        		/* Mail Functinality starts */
        			//set language session
					//Posted language is en
					if($lang=='en')
					{
						Session::put('lang_file','en_lang');
						$this->OUR_LANGUAGE =	'en_lang';  	
					}

					//Posted language is other than en
	                if($validedLang!='')  {      
	                    Session::put('lang_file',$validedLang.$this->mob_lang_file_sufix);
						$this->OUR_LANGUAGE =	$validedLang.$this->mob_lang_file_sufix;  							
					}
					//echo Session::get('lang_file'); exit();
        			include_once('SMTP/sendmail.php');
                    $emailsubject = "Your Payment Successfully completed.....";
                    $subject      = "Payment Acknowledgement.....";
                    $name         = $data['payer_name'];
                    $transid      = $data['transaction_id'];
                    $payid        = $data['payer_id'];
                    $ack          = $data['payment_ack'];
                    $address      = "";
                    
                    $resultmail   = "Success";
                   /* ob_start();
                    include('Emailsub/paymentemail.php');
                    $body = ob_get_contents();
                    ob_clean();
                    Send_Mail($address, $subject, $body);*/
                    $currenttransactionorderid = base64_encode($new_insert);
			
				    //$trans = Session::get('last_insert_id');
					$trans = $new_insert;
					$trans_id = MobileModel::orderPayu_transaction_id($trans);
					$get_subtotal                = MobileModel::get_order_subtotal_payU($trans_id);
					$get_tax                     = MobileModel::get_order_tax_payU($trans_id);
					$get_shipping_amount         = MobileModel::get_order_shipping_amount_payU($trans_id);
										
					//Customer Mail after order complete

					 Mail::send('emails.mobile_ordermail-payumoney', array(
						'transaction_id' => $trans_id,
						'Sub_total' =>  $get_subtotal,
						'Tax' =>  $get_tax,
						'Shipping_amount' =>  $get_shipping_amount,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data)
					{
						 $customer_mail = $data['order_shipping_add'];
						//$customer_mail = $shipaddresscus;
						$allpas        = explode(",", $customer_mail);
						$cus_mail      = $allpas[6];
						//$cus_mail      = $ship_email;

						if(Lang::has(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED')!= '') 
						{
							$sessionCUstom_message = trans(Session::get('lang_file').'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
						}
						else 
						{
							$sessionCUstom_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_CUSTOMER_YOUR_PRODUCT_PURCHASED');
						}  




						$message->to($cus_mail)->subject($sessionCUstom_message);
					});
            
				//Merchant Mail after order complete
				/*$merchant_trans_id = Home::get_PayPalOrd_merchant_based_transaction_id($trans_id);
	          
				if(isset($merchant_trans_id) && $merchant_trans_id != "") {
					foreach($merchant_trans_id as $mer=>$m) {
						$merchant_id = $m->order_merchant_id;
	                    $product_id  = $m->order_pro_id;
	                    $order_type  = $m->order_type;
						$get_mer_subtotal = Home::get_PayPalOrd_mer_subtotal($trans_id,$merchant_id);
						$get_mer_tax = Home::get_PayPalOrd_mer_tax($trans_id,$merchant_id);
						$get_mer_shipping_amount = Home::get_PayPalOrd_mer_shipping_amount($trans_id,$merchant_id);
	                    //get merchant email id by sending merchant id from each iteration
	                    $get_mer_email = Home::get_mer_email($merchant_id);

	                    	                    
	                    $mer_email = $get_mer_email[0]->mer_email;
						
	                    $email = array('mer_email'=>$mer_email);
	                    $data  = array_merge($data,$email);
	                    
	                    Mail::send('emails.mobile_orderPAYPAL-merchantmail', array(
							'transaction_id' => $trans_id,
							'Sub_total' =>  $get_mer_subtotal,
							'Tax' =>  $get_mer_tax,
							'Shipping_amount' =>  $get_mer_shipping_amount,'merchant_id' => $merchant_id,"SITENAME" => $this->SITENAME,'OUR_LANGUAGE' => $this->OUR_LANGUAGE), function($message) use ($data){
	                                $merchant_email = $data['mer_email'];
	                        //$session_message = "Hi Merchant, your product was purchased.";  

	                         if(Lang::has(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED')!= '') 
							{
								$session_message = trans(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}
							else 
							{
								$session_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
							}  

							$message->to($merchant_email)->subject($session_message);
						});
					}
				}	 */

			if(isset($_SESSION['lang_file']))
				unset($_SESSION['lang_file']);
	

			/* Mail Functinality ends */
        		$ship_country_name ="";
				$ship_city_name ="";
				if(count($country_details)>0){
					foreach($country_details as $cntry) {
						if($validedLang!='') {
							$cntry->co_name = $cntry->$co_name_dynamic;
						}
						$ship_country_name =$cntry->co_name;
					}
				}
				if(count($city_details)>0){
					foreach($city_details as $city) {
						if($validedLang!='') {
							$city->ci_name = $city->$ci_name_dynamic;
						}
						$ship_city_name =$city->ci_name;
					}
				}
                $ship[] = array("ship_name"=>ucfirst($ship_name),"ship_email"=>$ship_email,"ship_phone"=>$ship_phone,"ship_address1"=>ucfirst($ship_address1),"ship_address2"=>ucfirst($ship_address2),"ship_country_id"=>intval($ship_country),"ship_country_name"=>ucfirst($ship_country_name),"ship_city_id"=>intval($ship_city_id),"ship_city_name"=>ucfirst($ship_city_name),"ship_state"=>ucfirst($ship_state),"ship_postalcode"=>$ship_postalcode);
				if (Lang::has($lang_file.'.API_ORDER_SUCCESSFUL')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_ORDER_SUCCESSFUL');
				}else{
					$msge = "Order Successful!";
				}
				$encode = array("status"=>200,"message"=>$msge,"cart_details"=>$cart_details,"shipping_details"=>$ship);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			} else {
				if (Lang::has($lang_file.'.API_NO_PRODUCT_AVAILABLE')!= '') 
				{ 
					$msge 	=  trans($lang_file.'.API_NO_PRODUCT_AVAILABLE');
				}else{
					$msge = "No Products available!";
				}
				$encode = array("status"=>400,"message"=>$msge);
				return Response::make(json_encode($encode, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
			}
		}
	}
	//LISTING ENABLED/DISABLED PAYMENT TYPES
	public function enabledRdisabled_payment_listing()
	{
		$lang = Input::get('lang'); //custom selected language from active Multi-Languages 
		/* validate selected language  */
		$validedLang = '';
		$lang_file = $this->lang_file;
		//$lang_file = $this->OUR_LANGUAGE;

		$lang_file_exist = $this->checkMobileLangFileExist($lang);
		

		if($lang == "") {
			$encode = array("status"=>400,"message"=>"Language Parameter missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}elseif(!$lang_file_exist){
			$encode = array("status"=>400,"message"=>"Language File missing!");
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} 
		else {
			$langStatus = $this->checkCustomLangValid($lang);
			if($lang!='en' && $langStatus==1 )
			{
				$validedLang = $lang;
				App::setLocale($lang); //set locale value
				$lang_file = $lang.$this->mob_lang_file_sufix;
				//$ci_name_dynamic 	= 'ci_name_'.$lang;
				//$co_name_dynamic 	= 'co_name_'.$lang;
			}else{
				if($lang!='en' && $langStatus==0)
				{	$encode = array("status"=>400,"message"=>"Invalid Language!");
					return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");}
			}

		}
		/* validate selected language ends */

		$get_enabledRdisabled_list = MobileModel::get_enabledRdisabled_payments();//get_country_list
		if(count($get_enabledRdisabled_list)>0) {
			if($get_enabledRdisabled_list[0]->gs_payment_status=='COD'){  $cod=1; } else { $cod=0; }
			if($get_enabledRdisabled_list[0]->gs_paypal_payment=='Paypal'){  $paypal=1; } else { $paypal=0; }
			if($get_enabledRdisabled_list[0]->gs_payumoney_status=='PayUmoney'){  $payumoney=1; } else { $payumoney=0; }
			$enabledRdisabled_list= array("COD"=>intval($cod),"Paypal"=>intval($paypal),"PayUmoney"=>intval($payumoney));

			if (Lang::has($lang_file.'.API_SETTING_LIST_AVAILBLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_SETTING_LIST_AVAILBLE');
			}else{
				$msge = "Payment settings available!";
			}	


			$encode = array("status"=>200,"message"=>$msge,"enabledRdisabled_payments"=>$enabledRdisabled_list);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		} else {
			if (Lang::has($lang_file.'.API_SETTING_LIST_NOT_AVAILBLE')!= '') 
			{ 
				$msge 	=  trans($lang_file.'.API_SETTING_LIST_NOT_AVAILBLE');
			}else{
				$msge = "Payment settings not available!";
			}	

			$encode = array("status"=>400,"message"=>$msge);
			return Response::make(json_encode($encode,JSON_PRETTY_PRINT))->header('Content-Type',"application/json");
		}	
	}
	
}

?>
