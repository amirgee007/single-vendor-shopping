<?php 
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View;
use Session;
use DB;
use Request;
use Image;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController {

	use AuthorizesRequests,DispatchesJobs, ValidatesRequests;

	/* language setting for mobile starts */
	public $mob_lang_file_sufix; //suffix language file for mobile;its concated with the language code 
	public $default_mob_lang_code;	// default language code for mobile
	/* language setting for mobile starts */

    public function __construct(){

		/* language setting for mobile starts */

		$this->mob_lang_file_sufix 		= '_mob_lang'; //suffix language file for mobile;its concated with the language code 
		$this->default_mob_lang_code 	= 'en';	// default language code for mobile


		/* language setting for mobile ends */
	
		$this->general_setting = DB::table('nm_generalsetting')->get();
		if(count($this->general_setting)>0){
			foreach($this->general_setting as $s){
				    
				View::share("SITENAME",$s->gs_sitename);
				if(Session('lang_code')=='en'){
				View::share("SITENAME",$s->gs_sitename);	 
				 }
				else if(Session('lang_code')=='fr'){
					View::share("SITENAME",$s->gs_sitename_fr);	}
				else { View::share("SITENAME","");	 }
				#App Url
				View::share("PLAYSTORE_URL",$s->gs_playstore_url);
				View::share("APPLE_APPSTORE_URL",$s->gs_apple_appstore_url);
			 }

		
		// Get email/contact Details
			 $this->emailsetting = DB::table('nm_emailsetting')->get();
		if(count($this->emailsetting)>0){
			foreach($this->emailsetting as $s){
			 $this->admin_email=$s->es_email; 
			  		//$this->admin_phone=$s->adm_phone;
			  		//$this->admin_address1=$s->adm_address1;
			  		//$this->admin_address2=$s->adm_address2;


        		}
           	}



   		 $this->logo_details = DB::table('nm_imagesetting')->where('imgs_type', '=', 1)->get();
		 
   		if(count($this->logo_details)>0){
			foreach($this->logo_details as $l){
				$logo_img = $l->imgs_name;
				$prod_path 	= url('/').'/public/assets/default_image/No_image_logo.png';
				$img_data = "public/assets/logo/".$logo_img;
				if(file_exists($img_data) && $logo_img !='')
				{ 
					$prod_path = url('').'/public/assets/logo/'.$logo_img;
					View::share("SITE_LOGO",$prod_path);
				}
				else
				{
					View::share("SITE_LOGO",$prod_path);
				}
			 }
		} else {
			//View::share("SITE_LOGO",url().'/themes/images/logo2.png');	
			View::share("SITE_LOGO",url('').'/public/assets/default_image/No_image_logo.png');
		}

		$this->general_setting = DB::table('nm_social_media')->get();
		if(count($this->general_setting)>0){
			foreach($this->general_setting as $s){
				
		    if($s->sm_gmap_app_key != "") {

		    	View::share("GOOGLE_KEY",$s->sm_gmap_app_key);
		    }
			else {
					View::share("GOOGLE_KEY"," ");	
				}
			} 
	    
		}
	
		/*Get Active languages*/
		//$this->OUR_LANGUAGE ="en_lang";
		$Active_Language = DB::table('nm_language')->where('lang_status',1)->get();
		$Active_Language_count = DB::table('nm_language')->where('lang_status',1)->count();
		$Default_Language = DB::table('nm_language')->where('lang_status',1)->where('lang_default',1)->get();
		View::share ('Active_Language', $Active_Language);
		View::share ('Active_Language_count', $Active_Language_count);

		
	/*default image compression size*/
	$image_compress_quality = 50;
	$this->image_compress_quality = $image_compress_quality;
	/*Image Size start*/
	/*product default size*/
	$product_width = 800;
	$product_height = 800;
	
	/*deal default size*/
	$deal_width = 800;
	$deal_height = 800;
	
	/*logo default size*/
	$logo_width = 180;
	$logo_height = 45;
	
	/*favicon default size*/
	$favicon_width = 16;
	$favicon_height = 16;
	
	/*no_image default size*/
	$no_image_width = 381;
	$no_image_height = 215;
	
	/*no_image_product default size*/
	$no_image_width_banner = 870;
	$no_image_height_banner = 350;

	
	/*category_advertisment default size*/
	$category_advertisment_width = 170;
	$category_advertisment_height = 400;
	
	/*category_banner default size*/
	$category_banner_width = 250;
	$category_banner_height = 200;
	
	/*top_category default size*/
	$top_category_width = 200;
	$top_category_height = 200;
	
	/*sub_category default size*/
	$sub_category_width = 200;
	$sub_category_height = 200;
	
	/*sec_sub_category default size*/
	/*$sec_sub_category_width = 200;
	$sec_sub_category_height = 200;*/
	
	/*ads default size*/
	$ads_width = 200;
	$ads_height = 200;
	
	/*Store default size*/
	$store_width = 200;
	$store_height = 200;
	
	/*Blog default size*/
	$blog_width = 320;
	$blog_height = 190;
	
	$image_sizes = DB::table('nm_image_sizes')->first();
	$image= json_decode($image_sizes->image_size);
	
	foreach($image as $img=>$val)
	{
		
		if($img=='product')
		{
			$product_width = $val->width;
			$product_height = $val->height;
		}
		if($img=='deals')
		{
			$deal_width = $val->width;
			$deal_height = $val->height;
		}
		if($img=='logo')
		{
			$logo_width = $val->width;
			$logo_height = $val->height;
		}
		if($img=='favicon')
		{
			$favicon_width = $val->width;
			$favicon_height = $val->height;
		}
		if($img=='no_image')
		{
			$no_image_width = $val->width;
			$no_image_height = $val->height;
		}
		if($img=='no_image_banner')
		{
			$no_image_width_banner = $val->width;
			$no_image_height_banner = $val->height;
		}
		
		if($img=='category_advertisment')
		{
			$category_advertisment_width = $val->width;
			$category_advertisment_height = $val->height;
		}
		if($img=='category_banner')
		{
			$category_banner_width = $val->width;
			$category_banner_height = $val->height;
		}
		if($img=='top_category')
		{
			$top_category_width = $val->width;
			$top_category_height = $val->height;
		}
		if($img=='sub_category')
		{
			$sub_category_width = $val->width;
			$sub_category_height = $val->height;
		}
		/*if($img=='sec_sub_category')
		{
			$sec_sub_category_width = $val->width;
			$sec_sub_category_height = $val->height;
		}*/
		if($img=='ads')
		{
			$ads_width = $val->width;
			$ads_height = $val->height;
		}
		if($img=='store')
		{
			$store_width = $val->width;
			$store_height = $val->height;
		}
		if($img=='blog')
		{
			$blog_width = $val->width;
			$blog_height = $val->height;
		}
	}
	/*product width and height*/
	$this->product_width = $product_width;
	$this->product_height = $product_height;
	View::share('PRODUCT_WIDTH', $product_width);
	View::share('PRODUCT_HEIGHT', $product_height);
	
	/*deal width and height*/
	$this->deal_width = $deal_width;
	$this->deal_height = $deal_height;
	View::share('DEAL_WIDTH', $deal_width);
	View::share('DEAL_HEIGHT', $deal_height);
	
	/*logo width and height*/
	$this->logo_width = $logo_width;
	$this->logo_height = $logo_height;
	View::share('LOGO_WIDTH', $logo_width);
	View::share('LOGO_HEIGHT', $logo_height);
	
	/*favicon image width and height*/
	$this->favicon_width = $favicon_width;
	$this->favicon_height = $favicon_height;
	View::share('FAVICON_WIDTH', $favicon_width);
	View::share('FAVICON_HEIGHT', $favicon_height);
	
	/*No image width and height*/
	$this->no_image_width = $no_image_width;
	$this->no_image_height = $no_image_height;
	View::share('NO_IMAGE_WIDTH', $no_image_width);
	View::share('NO_IMAGE_HEIGHT', $no_image_height);
	
	/*No image width and height*/
	$this->no_image_width_banner = $no_image_width_banner;
	$this->no_image_height_banner = $no_image_height_banner;
	View::share('NO_IMAGE_WIDTH_BANNER', $no_image_width_banner);
	View::share('NO_IMAGE_HEIGHT_BANNER', $no_image_height_banner);
	
	
	/*category_advertisment image width and height*/
	$this->category_advertisment_width = $category_advertisment_width;
	$this->category_advertisment_height = $category_advertisment_height;
	View::share('CATEGORY_ADVERTISMENT_WIDTH', $category_advertisment_width);
	View::share('CATEGORY_ADVERTISMENT_HEIGHT', $category_advertisment_height);
	
	/*category_banner image width and height*/
	$this->category_banner_width = $category_banner_width;
	$this->category_banner_height = $category_banner_height;
	View::share('CATEGORY_BANNER_WIDTH', $category_banner_width);
	View::share('CATEGORY_BANNER_HEIGHT', $category_banner_height);
	
	/*top_category image width and height*/
	$this->top_category_width = $top_category_width;
	$this->top_category_height = $top_category_height;
	View::share('TOP_CATEGORY_WIDTH', $top_category_width);
	View::share('TOP_CATEGORY_HEIGHT', $top_category_height);
	
	/*sub_category image width and height*/
	$this->sub_category_width = $sub_category_width;
	$this->sub_category_height = $sub_category_height;
	View::share('SUB_CATEGORY_WIDTH', $sub_category_width);
	View::share('SUB_CATEGORY_HEIGHT', $sub_category_height);
	
	/*sec_sub_category image width and height*/
	/*$this->sec_sub_category_width = $sec_sub_category_width;
	$this->sec_sub_category_height = $sec_sub_category_height;
	View::share('SEC_SUB_CATEGORY_WIDTH', $sec_sub_category_width);
	View::share('SEC_SUB_CATEGORY_HEIGHT', $sec_sub_category_height);*/
	
	/*Ads image width and height*/
	$this->ads_width = $ads_width;
	$this->ads_height = $ads_height;
	View::share('ADS_WIDTH', $ads_width);
	View::share('ADS_HEIGHT', $ads_height);
	
	/*Store image width and height*/
	$this->store_width = $store_width;
	$this->store_height = $store_height;
	View::share('STORE_WIDTH', $store_width);
	View::share('STORE_HEIGHT', $store_height);
	
	/*Blog image width and height*/
	$this->blog_width = $blog_width;
	$this->blog_height = $blog_height;
	View::share('BLOG_WIDTH', $blog_width);
	View::share('BLOG_HEIGHT', $blog_height);
	
	/*Image Size End*/
	
	
	//get active language
 

	 $this->get_active_language = $get_active_language = DB::table('nm_language')->where('lang_status',1)->where('pack_lang',0)->get();

	 View::share ('get_active_lang', $get_active_language);
	 
	 
	$default_lang = ""; 
	View::share('default_lang',$default_lang);
		
	if(!empty($get_active_language)) {
		$get_default_language = DB::table('nm_language')->where('lang_status',1)->where('pack_lang',1)->get();
		$default_language = $get_default_language[0]->lang_name;
		$default_lang = "In ".$default_language; 
		View::share('default_lang',$default_lang);
	} 

	/* No image  */
	$Get_no_image = DB::table('nm_imagesetting')->get();
	$no_image =array('logo'			=>	'','favicon'	=>	'',
					'productImg' 	=> 	'','dealImg' 	=>	'',
					'no_image' 		=>'','category_advertisment' =>'',
					'category_banner' =>'','category' => '',
					'store' => '','blog' => '','ads'=>'','banner' => ''
					 );
	if(count($Get_no_image)>0){
		foreach ($Get_no_image as $value) {
			if($value->imgs_type=='1')
				$noImage['logo'] = $value->imgs_name;
			if($value->imgs_type=='2')
				$noImage['favicon'] = $value->imgs_name;
			if($value->imgs_type=='3')
				$noImage['no_image'] = $value->imgs_name;
			if($value->imgs_type=='4')
				$noImage['productImg'] = $value->imgs_name;
			if($value->imgs_type=='5')
				$noImage['dealImg'] = $value->imgs_name;
			if($value->imgs_type=='6')
				$noImage['store'] = $value->imgs_name;
			if($value->imgs_type=='7')
				$noImage['blog'] = $value->imgs_name;
			if($value->imgs_type=='8')
				$noImage['banner'] = $value->imgs_name;
			if($value->imgs_type=='9')
				$noImage['category_banner'] = $value->imgs_name;
			if($value->imgs_type=='10')
				$noImage['ads'] = $value->imgs_name;
			if($value->imgs_type=='11')
				$noImage['category'] = $value->imgs_name;
		}
	}	
	
	View::share ('DynamicNoImage', $noImage);
	 
}
	}
	/* Set Language starts */
	public function setLanguageLocaleFront()
	{
		//Front End Panel
				
			/*Get Active languages*/
			//$this->OUR_LANGUAGE ="en_lang";
			$Active_Language = DB::table('nm_language')->where('lang_status',1)->get();
			$Default_Language = DB::table('nm_language')->where('lang_status',1)
			->where('lang_default',1)->get();
			View::share ('Active_Language', $Active_Language);

			if(Session::has('lang_code') != 1)	//if session not set means getting default language from db in if condition
			{
				if(count($Default_Language)>0) 
				{
					//echo "1";
					foreach($Default_Language as $Lang)
					{
						Session::put('lang_code',$Lang->lang_code);
						Session::put('lang_file',$Lang->lang_code.'_lang');
						$this->OUR_LANGUAGE =$Lang->lang_code.'_lang';
					}
					$selected_lang_code=$Lang->lang_code;
				}	
				else	//here if there is no default means out en as default
				{
					//echo "2";
					Session::put('lang_code','en');
					Session::put('lang_file','en_lang');
					$selected_lang_code='en';
					$this->OUR_LANGUAGE ="en_lang";
				}
			}
			else	//if session set
			{
				//echo "3";
				$selected_lang_code = Session::get('lang_code');
				Session::put('lang_file',Session::get('lang_code').'_lang');
				
				$this->OUR_LANGUAGE =$selected_lang_code.'_lang';
			}	
			//echo $selected_lang_code;
			View::share ('OUR_LANGUAGE', $this->OUR_LANGUAGE);	
			View::share ('selected_lang_code', $selected_lang_code);
			/*set the local language is dynamically (confiq/app.php --> 'locale' => 'en')*/
			$lang_code = Session::get('lang_code'); 
		    app()->setLocale($lang_code);
		      /*Get Active languages*/
		//Sitename      
		$this->general_setting = DB::table('nm_generalsetting')->get();
		if(count($this->general_setting)>0){
			foreach($this->general_setting as $s){
				View::share("SITENAME",$s->gs_sitename);
				if(Session('lang_code')=='en'){
				View::share("SITENAME",$s->gs_sitename);	 
				 }
				else if(Session('lang_code')=='fr'){
					View::share("SITENAME",$s->gs_sitename_fr);	}
				 else { View::share("SITENAME","");	 }
			 }	
		}	
	   
	}

	public function setLanguageLocaleAdmin()
	{
	
		/*Get Admin Language*/ 
	    $this->ADMIN_OUR_LANGUAGE ="admin_en_lang";
		$Admin_Active_Language = DB::table('nm_language')->where('lang_status',1)->get();
											
		$Admin_Default_Language = DB::table('nm_language')->where('lang_status',1)->where('lang_default',1)->get();
		View::share ('Admin_Active_Language', $Admin_Active_Language);
		if(Session::has('admin_lang_code') != 1)
		{
			if(count($Admin_Default_Language)>0) 
			{
			   
				foreach($Admin_Default_Language as $Lang)
				{
					Session::put('admin_lang_code',$Lang->lang_code);
					Session::put('admin_lang_file','admin_'.$Lang->lang_code.'_lang');
				}
				$admin_selected_lang_code='';
			}	
			else
			{
				Session::put('admin_lang_code','en');
				Session::put('admin_lang_file','admin_en_lang');
				$admin_selected_lang_code='';   
			}
		}
		else
		{			  
			$admin_selected_lang_code = Session::get('admin_lang_code');
			Session::put('admin_lang_file','admin_'.Session::get('admin_lang_code').'_lang');     
		}	
							 
		View::share ('ADMIN_OUR_LANGUAGE', $this->ADMIN_OUR_LANGUAGE);	
		View::share ('admin_selected_lang_code', $admin_selected_lang_code);
		/*set the local language is dynamically (confiq/app.php --> 'locale' => 'en')*/
		$lang_code = Session::get('admin_lang_code'); 
	     app()->setLocale($lang_code);
	    //Sitename 
		$this->general_setting = DB::table('nm_generalsetting')->get();
		if(count($this->general_setting)>0){
			foreach($this->general_setting as $s){
				View::share("SITENAME",$s->gs_sitename);
				if(Session('admin_lang_code')=='en'){
				View::share("SITENAME",$s->gs_sitename);	 
				 }
				else if(Session('admin_lang_code')=='fr'){
					View::share("SITENAME",$s->gs_sitename_fr);	}
				 else { View::share("SITENAME","");	 }
			 }
		
		}
	}

	public function setLanguageLocaleMerchant()
	{
	
			/*Get merchant Language*/ 
		    $this->MER_OUR_LANGUAGE ="mer_en_lang";
			$Mer_Active_Language = DB::table('nm_language')->where('lang_status',1)->get();
			$Mer_Default_Language = DB::table('nm_language')->where('lang_status',1)->where('lang_default',1)->get();
			View::share ('Mer_Active_Language', $Mer_Active_Language);
			
			if(Session::has('mer_lang_code') != 1)
			{
				
				if(count($Mer_Default_Language)>0) 
				{
					foreach($Mer_Default_Language as $Lang)
					{
						Session::put('mer_lang_code',$Lang->lang_code);
						Session::put('mer_lang_file','mer_'.$Lang->lang_code.'_lang');
						
					}
					$mer_selected_lang_code='';
				}	
				else
				{
					Session::put('mer_lang_code','en');
					Session::put('mer_lang_file','mer_en_lang');
					$mer_selected_lang_code='';
				}
			}
			else
			{
				$mer_selected_lang_code = Session::get('mer_lang_code');
				Session::put('mer_lang_file','mer_'.Session::get('mer_lang_code').'_lang');
			}	
				
			View::share ('MER_OUR_LANGUAGE', $this->MER_OUR_LANGUAGE);	
			View::share ('mer_selected_lang_code', $mer_selected_lang_code);
			/*set the local language is dynamically (confiq/app.php --> 'locale' => 'en')*/
			$mer_lang_code = Session::get('mer_lang_code'); 
			app()->setLocale($mer_lang_code);
  
		//Sitename 	
												 
		$this->general_setting = DB::table('nm_generalsetting')->get();
		if(count($this->general_setting)>0){
						
			foreach($this->general_setting as $s){
				View::share("SITENAME",$s->gs_sitename);
					
	 
				if(Session('mer_lang_code')=='en'){
							 
	 
				View::share("SITENAME",$s->gs_sitename);	 
				 }
																				  
				else if(Session('mer_lang_code')=='fr'){
					View::share("SITENAME",$s->gs_sitename_fr);	}
				 else { View::share("SITENAME","");	 }
			}		 	  
		}
	}
	/* Set Language ends */
}
