<?php
namespace App\Http\Controllers;
use App\Role;
use DB;
use Session;
use Helper;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Footer;
use App\Settings;
use App\AdminModel;
use App\Coupon;
use MyPayPal;
use Lang;
use File;
use Intervention\Image\ImageManagerStatic as Image; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
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
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */
    public function __construct()
    {
        parent::__construct();
        // set frontend language 
        $this->setLanguageLocaleFront(); 
        $google_details   = Home::get_google_details(); 
        $gm_client_id=$google_details[0]->sm_gl_client_id;
        $gm_client_secret_key=$google_details[0]->sm_gl_sec_key;
        define('GM_CLIENT_ID', $gm_client_id);
        /* Google App Client Secret */
        define('GM_CLIENT_SECRET', $gm_client_secret_key);
        /* Google App Redirect Url */
        define('GM_CLIENT_REDIRECT_URL', url('google_login'));
		
        
    }

    public function siteadmin()
    {
        return Redirect::to('siteadmin');
    }

    public function index(){

        $email_login='';
       /* error_reporting(E_ALL);  
        ini_set('display_errors',1); 
        ini_set('max_execution_time',10000); 
        ini_set('memory_limit','258');*/

      /*  $time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$start = $time;*/
		 /* Removed/Filtered for query/object optimization. If necessary kindly add it.*/
        /*   $auction_details              = Home::get_auction_details();
	       $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
	       $category_count               = Home::get_category_count($header_category);
	       $get_product_details_typeahed = Home::get_product_details_typeahed();
	       $city_details                 = Register::get_city_details();
	       $get_product_details_abovefifty = Home::get_product_details_abovefifty();
	       $women_product                = Home::get_women_product();
	       $header_category              = Home::get_header_category();  
	       $most_visited_product           = Home::get_most_visited_product();
	       $general                      = Home::get_general_settings();*/

        $product_details                = Home::get_top_offer_product_details();
        $get_product_details_belowfifty = Home::get_product_details_belowfifty();
        $most_popular_product           = Home::get_popular_product();
        $dealsof_day_details            = Home::dealsof_day_details();
        $deals_details                  = Home::get_deals_details();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')
            ->with('country_details', $country_details)
            ->with('metadetails', $getmetadetails)->with('general', $get_social_media_url);
        } else {
            $navbar = view('includes.navbar')
            ->with('country_details', $country_details)
            ->with('metadetails', $getmetadetails)->with('general', $get_social_media_url)->with('email_login',$email_login);
        }
        
        /*Item Not found error */
        $err_msge ='';
        if(Session::has('item_not_found'))
            $err_msge = Session::get('item_not_found'); 
        $header = view('includes.header')->with('err_msge',$err_msge)
        //->with('header_category', $header_category)
        ->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        
        return view('index')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)
       
        ->with('product_details', $product_details)->with('deals_details', $deals_details)
        ->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('addetails', $addetails)->with('noimagedetails', $noimagedetails)->with('bannerimagedetails', $getbannerimagedetails)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$get_social_media_url)
        ->with('get_product_details_belowfifty', $get_product_details_belowfifty)
        ->with('most_popular_product',$most_popular_product)
        ->with('dealsof_day_details',$dealsof_day_details);
      
    }

   
    public function productview2($mcid, $scid, $id)
    {
         
        $sid                          = base64_decode($id);
        $product_id                   = base64_decode($id);
        $breadcrumb                   = Home::get_breadcrumb_category($sid);
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details2();
        
        $hit_count                    = Home::hit_count($product_id);
        $hit                          = ($hit_count[0]->hit_count)+1;
        $product_hit                  = Home::product_hit($product_id,$hit);

        $product_details_by_id        = Home::get_product_details_by_id($product_id);
        
        //product available or not
        if(count($product_details_by_id)<=0){
            $err_msge = 'Item Not Found';

            Session::flash('item_not_found',$err_msge);
            return Redirect::to('/');
        }     
        $product_color_details        = Home::get_selected_product_color_details($product_details_by_id);
        $product_size_details         = Home::get_selected_product_size_details($product_details_by_id);
       

       //Specfication details
        //$product_spec_details_old         = Home::get_selected_product_spec_details($product_details_by_id);
        
        //Specifiaction details displayed as group->specification->values hierarchy
        $prodSpecAr = $product_spec_details = array();
        $product_specGroupList        = Home::get_selected_product_spec_group($product_details_by_id);  
        if(count($product_specGroupList)>0){
            foreach ($product_specGroupList as $specGrp) {
                $product_spec_details[$specGrp->spg_id]  = Home::get_selected_product_spec_det_by_SpcGrp($specGrp->spg_id,$specGrp->spc_pro_id);

                
                if(count($product_spec_details[$specGrp->spg_id])>0){                   
                   
                    foreach ($product_spec_details[$specGrp->spg_id] as $prodSpec) {
                      
                        $prodSpecAr[$prodSpec->sp_id] = Home::get_selected_product_spec_det_by_Spc($specGrp->spg_id,$prodSpec->sp_id,$specGrp->spc_pro_id);
                       

                    }
                }
            }
        }
        $country_details              = Register::get_country_details();
        $get_related_product          = Home::get_related_product($sid);
        $most_visited_product         = Home::get_most_visited_product();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $one_count                    = Home::get_countone($product_id);
        $two_count                    = Home::get_counttwo($product_id);
        $three_count                  = Home::get_countthree($product_id);
        $four_count                   = Home::get_countfour($product_id);
        $five_count                   = Home::get_countfive($product_id);
        $count_review_rating          = Home::get_count_review_rating($product_id);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
              $review_details                = Home::get_product_review_details($product_id);
        $get_store                    = Home::get_prd_deatils($product_id);
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        $coupon_details              = Home::get_product_details_by_id_coupon($product_id);
        $customer_id                 = Session::get('customerid');


       if(count($coupon_details) > 0){
         $coupon_code                 = $coupon_details->coupon_code;
       
       $productview_check_coupon_purchase_count_cod = Coupon::productview_check_coupon_purchase_count_cod($coupon_code,$product_id);
       $productview_check_coupon_purchase_count_paypal = Coupon::productview_check_coupon_purchase_count_paypal($coupon_code,$product_id);
       $productview_check_coupon_purchase_count_cod_user = Coupon::productview_check_coupon_purchase_count_cod_user($coupon_code,$customer_id,$product_id);
       $productview_check_coupon_purchase_count_paypal_user = Coupon::productview_check_coupon_purchase_count_paypal_user($coupon_code,$customer_id,$product_id);
      
       }
      else{
        $productview_check_coupon_purchase_count_cod = '';
       $productview_check_coupon_purchase_count_paypal ='';
       $productview_check_coupon_purchase_count_cod_user = '';
       $productview_check_coupon_purchase_count_paypal_user = '';

      }
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
             //check current produt is in customer wishlist
            $prodInWishlist = Home::exist_wishlist($product_id,Session::get('customerid'));
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
             //check current produt is in customer wishlist
            $prodInWishlist =  array();
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('productview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('product_color_details', $product_color_details)->with('product_size_details', $product_size_details)->with('product_spec_details', $product_spec_details)->with('metadetails', $getmetadetails)->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('breadcrumb', $breadcrumb)->with('get_contact_det', $get_contact_det)->with('general',$general)->with('coupon_details',$coupon_details)->with('productview_check_coupon_purchase_count_cod',$productview_check_coupon_purchase_count_cod)->with('productview_check_coupon_purchase_count_paypal',$productview_check_coupon_purchase_count_paypal)->with('productview_check_coupon_purchase_count_cod_user',$productview_check_coupon_purchase_count_cod_user)->with('productview_check_coupon_purchase_count_paypal_user',$productview_check_coupon_purchase_count_paypal_user)
         // ->with('product_spec_details_old',$product_spec_details_old)
        ->with('product_specGroupList',$product_specGroupList)
        ->with('prodSpecAr',$prodSpecAr)
         ->with('prodInWishlist',$prodInWishlist)  
        ->with('count_review_rating',$count_review_rating)
        ->with('review_details',$review_details);
        
    }
    
    
    public function products()
    {  
    	
        Session::remove("login_message");
         /* Removed/Filtered for query/object optimization. If necessary kindly add it.*/
      /*  $city_details                 = Register::get_city_details();  
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
       $category_count               = Home::get_category_count($header_category);
       $get_product_details_typeahed = Home::get_product_details_typeahed();
       $getanl                       = Settings::social_media_settings();*/
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $general                      = Home::get_general_settings();
        $compare                      = "1"; //no
        $maincategory_id  ='';
        
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $get_social_media_url);
        $specification_values=array();
        $specification=array();
        /* $specification=Home::get_specification_group_product($maincategory_id,$get_listby_id[1]);
        if(count($specification)>0)
        {
            $spec=array();
            foreach($specification as $spc)
            {
                array_push($spec,$spc->spg_id);
            }
            $specification_values=Home::get_specification_values($spec);
        } */


        return view('products') 
        
         /* Removed/Filtered for query/object optimization. If necessary kindly add it.*/
         /* ->with('deal_details', $deal_details)
        ->with('auction_details', $auction_details)
        ->with('get_product_details_by_cat', $get_product_details_by_cat)
        ->with('category_count', $category_count)
        ->with('get_product_details_typeahed', $get_product_details_typeahed)*/
        ->with('specification', $specification)
        ->with('specification_values', $specification_values)
        ->with('navbar', $navbar)->with('header', $header)
        ->with('footer', $footer)->with('header_category', $header_category)
        ->with('product_details', $product_details)
        ->with('most_visited_product', $most_visited_product)
        ->with('main_category', $main_category)
        ->with('sub_main_category', $sub_main_category)
        ->with('second_main_category', $second_main_category)
        ->with('second_sub_main_category', $second_sub_main_category)
        ->with('metadetails', $getmetadetails)
        ->with('get_contact_det', $get_contact_det)
        ->with('general',$general)
        ->with('compare',$compare)
        ->with('maincategory_id',$maincategory_id);

    }
        
    public function category_product_list($name, $id)
    {
        $product_id      = base64_decode($id);  //category id
        $id              = base64_decode(base64_decode(base64_decode($id)));
        $get_listby_id   = explode(",", $product_id); //category id
		######## if filter is apply #########
		
		$color_filters =array();
		$discount_filters =array();
		$filters=array();
		$size_filters=array();
		$from_price=0;
		$to_price=5000000;
        if(isset($_GET["filter"]))
		{
			if(isset($_GET["filter"]) AND $_GET["filter"]!="")
			{
				$filtered_item = base64_decode($_GET["filter"]);
				$filters = explode(",",$filtered_item);
			}
			if(isset($_GET["filter_color"]) AND $_GET["filter_color"]!="")
			{
				$filter_color = base64_decode($_GET["filter_color"]);
				$color_filters = explode(",",$filter_color);
			}
			if(isset($_GET["filters_size"]) AND $_GET["filters_size"]!="")
			{
				$filter_size = base64_decode($_GET["filters_size"]);
				$size_filters = explode(",",$filter_size);
			}
			if(isset($_GET["filter_discount"]) AND $_GET["filter_discount"]!="")
			{
				$filter_discount = base64_decode($_GET["filter_discount"]);
				if($filter_discount==1)
					$discount="0-10";
				elseif($filter_discount==2)
					$discount="11-20";
				elseif($filter_discount==3)
					$discount="21-30";
				elseif($filter_discount==4)
					$discount="31-40";
				elseif($filter_discount==5)
					$discount="41-50";
				elseif($filter_discount==6)
					$discount="51-100";
				else
					$discount="";
				if($discount!="")
					$discount_filters = explode("-",$discount);
			}
			if(isset($_GET["price_from"]) AND isset($_GET["price_to"]))
			{
				$from_price=$_GET["price_from"];
				$to_price=$_GET["price_to"];
				if($from_price=="" AND $to_price=="")
				{
					$from_price=0;
					$to_price=5000000;
				}
				elseif($from_price=="" AND $to_price!="")
				{
					$from_price=0;
					$to_price=$_GET["price_to"];
				}
				elseif($from_price!="" AND $to_price=="")
				{
					$from_price=$_GET["price_from"];
					$to_price=5000000;
				}
				else
				{
					$from_price=$_GET["price_from"];
					$to_price=$_GET["price_to"];
				}
			}
		}
		
        if ($name == "viewcategorylist") {
        
            $get_cat_name_listby = Home::get_catname_listby($product_id);

			$product_details     = Home::get_category_product_details_listbyfilter($product_id,$filters,$from_price,$to_price,$color_filters,$discount_filters,$size_filters);
			//need to check for prodcut not displaying

            $deal_details        = Home::get_category_deal_details_listby($product_id,$discount_filters,$from_price,$to_price);

            /* $deal_details        = Home::get_category_deal_details_listby($product_id); 
  				$auction_details     = Home::get_category_auction_details_listby($product_id);*/

            $most_visited_product    = Home::get_cat_most_visited_product($product_id);
            //print_r($most_visited_product); exit();
            
            foreach ($get_cat_name_listby as $get_cat_name_listby_single)
                    
            if ($get_listby_id[0] == 1) {   //Top category
               $product_name_single = $get_cat_name_listby_single->mc_name;
              $maincategory_id     = $get_cat_name_listby_single->mc_id;  //this is topcategoryid
			  
            } else if ($get_listby_id[0] == 2) {    //Main category
                $product_name_single = $get_cat_name_listby_single->smc_name;
                $maincategory_id     = $get_cat_name_listby_single->smc_mc_id;  //this is topcategoryid
            } else if ($get_listby_id[0] == 3) {    //sub category
                $product_name_single = $get_cat_name_listby_single->sb_name;
                $maincategory_id     = $get_cat_name_listby_single->mc_id;      //this is topcategoryid
            } else if ($get_listby_id[0] == 4) {    //Second sub category
                $product_name_single = $get_cat_name_listby_single->ssb_name;
                $maincategory_id     = $get_cat_name_listby_single->ssb_smc_id;  //this is topcategoryid
            }
            $specification_values=array();
            $specification=array();					
				if($get_listby_id[0] == 2) //specification shown based on main category
				{
            $specification=Home::get_specification_group_product($maincategory_id,$get_listby_id[1]);
            if(count($specification)>0)
            {
                $spec=array();
                foreach($specification as $spc)
                {
                    array_push($spec,$spc->spg_id);
                }
                $specification_values=Home::get_specification_values($spec);
            }
		  }		
        } else {
            $specification_values=array();
            $specification=array();
            //$product_details     = Home::get_category_product_details($id);

			######## if filter is empty or not #########
			$product_details     = Home::get_category_product_details_listbyfilter($product_id,$filters,$from_price,$to_price,$color_filters,$discount_filters,$size_filters);
			
			############################################

            $product_name_single      = "";
            $most_visited_product     = Home::get_most_visited_product();
        }
        if($product_name_single=="")

		{
			echo "no content";die;
		}
		$color_filter_values		  = Home::get_colors_by_products();
		$size_filter_values		  	  = Home::get_sizes_by_products();

        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $country_details              = Register::get_country_details();
        
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
       
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);

        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        $compare                      = "0"; //yes

        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        /* print_r($specification);die; */
        return view('products')->with('size_filter_values', $size_filter_values)->with('color_filter_values', $color_filter_values)->with('navbar', $navbar)->with('specification_values', $specification_values)->with('specification', $specification)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deal_details', $deal_details)
        //->with('auction_details', $auction_details)
        ->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)
        ->with('product_name_single', $product_name_single)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general)
        ->with('compare',$compare)->with('maincategory_id',$maincategory_id)->with('category_id',$product_id);
    }
    /*public function productview_test()
    {
        $country_details              = Register::get_country_details();
        $getmetadetails               = Home::getmetadetails();
        $general                       = Home::get_general_settings();
        $header_category              = Home::get_header_category();
        $getlogodetails               = Home::getlogodetails();
        $cms_page_title               = Home::get_cms_page_title();
        $get_social_media_url         = Home::get_social_media_url();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        if (Session::has('customerid')) 
        {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else 
        {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        
        return view('productview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer);
        
    }*/
    public function Review_All($product_id){
        
        $product_details_by_id        = Home::get_product_details_by_id($product_id);
        $get_related_product          = Home::get_related_product($product_id);
        
        $one_count                    = Home::get_countone($product_id);
        $two_count                    = Home::get_counttwo($product_id);
        $three_count                  = Home::get_countthree($product_id);
        $four_count                   = Home::get_countfour($product_id);
        $five_count                   = Home::get_countfive($product_id);
        $count_review_rating          = Home::get_count_review_rating($product_id);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $get_store                    = Home::get_prd_deatils($product_id);
        
        $country_details              = Register::get_country_details();
        $getmetadetails               = Home::getmetadetails();
        $general                      = Home::get_general_settings();
        $header_category              = Home::get_header_category();
        $getlogodetails               = Home::getlogodetails();
        $cms_page_title               = Home::get_cms_page_title();
        $get_social_media_url         = Home::get_social_media_url();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $review_details               = Home::get_product_review_details($product_id);
        $customer_id                  = Session::get('customerid');
        
        if (Session::has('customerid')) 
        {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        
        return view('review_all')->with('navbar', $navbar)->with('header', $header)
        ->with('footer', $footer)
        ->with('product_details_by_id',$product_details_by_id)
        ->with('get_related_product',$get_related_product)
        ->with('count_review_rating',$count_review_rating)->with('review_details',$review_details)
        ->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store);
    }
    public function productview($mcid, $scid, $sbid, $ssbid, $id){
        
        $sid = base64_decode($id);
       
        $breadcrumb                   = Home::get_breadcrumb_category($sid);
        $product_id                   = base64_decode($id);
        $hit_count                    = Home::hit_count($product_id);
        $hit                          = ($hit_count[0]->hit_count)+1;
        $product_hit                  = Home::product_hit($product_id,$hit);
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $product_details_by_id        = Home::get_product_details_by_id($product_id);
        //product available or not
        if(count($product_details_by_id)<=0){
            $err_msge = 'Item Not Found';

            Session::flash('item_not_found',$err_msge);
            return Redirect::to('/');
        } 
        $product_color_details        = Home::get_selected_product_color_details($product_details_by_id);
        $product_size_details         = Home::get_selected_product_size_details($product_details_by_id);

        //Specfication details
        //$product_spec_details_old         = Home::get_selected_product_spec_details($product_details_by_id);
        
        //Specifiaction details displayed as group->specification->values hierarchy
        $prodSpecAr = $product_spec_details = array();
        $product_specGroupList        = Home::get_selected_product_spec_group($product_details_by_id);  
        if(count($product_specGroupList)>0){
            foreach ($product_specGroupList as $specGrp) {
                $product_spec_details[$specGrp->spg_id]  = Home::get_selected_product_spec_det_by_SpcGrp($specGrp->spg_id,$specGrp->spc_pro_id);

                
                if(count($product_spec_details[$specGrp->spg_id])>0){                   
                   
                    foreach ($product_spec_details[$specGrp->spg_id] as $prodSpec) {
                      
                        $prodSpecAr[$prodSpec->sp_id] = Home::get_selected_product_spec_det_by_Spc($specGrp->spg_id,$prodSpec->sp_id,$specGrp->spc_pro_id);
                       

                    }
                }
            }
        }
       // print_r($prodSpecAr);
       //exit(); 
        $country_details              = Register::get_country_details();
        $get_related_product          = Home::get_related_product($product_id);
        $most_visited_product         = Home::get_most_visited_product();
        
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $one_count                    = Home::get_countone($product_id);
        $two_count                    = Home::get_counttwo($product_id);
        $three_count                  = Home::get_countthree($product_id);
        $four_count                   = Home::get_countfour($product_id);
        $five_count                   = Home::get_countfive($product_id);
        $count_review_rating          = Home::get_count_review_rating($product_id);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $get_store                    = Home::get_prd_deatils($product_id);
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
       $general                       = Home::get_general_settings();
       $coupon_details                = Home::get_product_details_by_id_coupon($product_id);
       $review_details                = Home::get_product_review_details($product_id);
      
       $customer_id                   = Session::get('customerid');


       if(count($coupon_details) > 0){
         $coupon_code                 = $coupon_details->coupon_code;
       
       $productview_check_coupon_purchase_count_cod = Coupon::productview_check_coupon_purchase_count_cod($coupon_code,$product_id);
       $productview_check_coupon_purchase_count_paypal = Coupon::productview_check_coupon_purchase_count_paypal($coupon_code,$product_id);
       $productview_check_coupon_purchase_count_cod_user = Coupon::productview_check_coupon_purchase_count_cod_user($coupon_code,$customer_id,$product_id);
       $productview_check_coupon_purchase_count_paypal_user = Coupon::productview_check_coupon_purchase_count_paypal_user($coupon_code,$customer_id,$product_id);
      
       }
      else{
        $productview_check_coupon_purchase_count_cod = '';
       $productview_check_coupon_purchase_count_paypal ='';
       $productview_check_coupon_purchase_count_cod_user = '';
       $productview_check_coupon_purchase_count_paypal_user = '';

      }

       

        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);

            //check current produt is in customer wishlist
            $prodInWishlist = Home::exist_wishlist($product_id,Session::get('customerid'));

        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
            //check current produt is in customer wishlist
            $prodInWishlist  = array();
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
       
        return view('productview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('product_color_details', $product_color_details)->with('product_size_details', $product_size_details)->with('product_spec_details', $product_spec_details)->with('metadetails', $getmetadetails)
        ->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('breadcrumb', $breadcrumb)->with('get_contact_det', $get_contact_det)->with('general',$general)->with('coupon_details',$coupon_details)->with('review_details',$review_details)->with('productview_check_coupon_purchase_count_cod',$productview_check_coupon_purchase_count_cod)->with('productview_check_coupon_purchase_count_paypal',$productview_check_coupon_purchase_count_paypal)->with('productview_check_coupon_purchase_count_cod_user',$productview_check_coupon_purchase_count_cod_user)->with('productview_check_coupon_purchase_count_paypal_user',$productview_check_coupon_purchase_count_paypal_user)
       // ->with('product_spec_details_old',$product_spec_details_old)
        ->with('product_specGroupList',$product_specGroupList)
        ->with('prodSpecAr',$prodSpecAr)
        ->with('prodInWishlist',$prodInWishlist)        
        ->with('count_review_rating',$count_review_rating);
        
    }


    public function deals()
    {
		######## if filter is apply #########
		$discount_filters =array();
		$from_price=0;
		$to_price=5000000;
		if(isset($_GET["filter_discount"]) AND $_GET["filter_discount"]!="")
		{
			$filter_discount = base64_decode($_GET["filter_discount"]);
			if($filter_discount==1)
				$discount="0-10";
			elseif($filter_discount==2)
				$discount="11-20";
			elseif($filter_discount==3)
				$discount="21-30";
			elseif($filter_discount==4)
				$discount="31-40";
			elseif($filter_discount==5)
				$discount="41-50";
			elseif($filter_discount==6)
				$discount="51-100";
			else
				$discount="";
			if($discount!="")
				$discount_filters = explode("-",$discount);
		}
		if(isset($_GET["price_from"]) AND isset($_GET["price_to"]))
		{
			$from_price=$_GET["price_from"];
			$to_price=$_GET["price_to"];
			if($from_price=="" AND $to_price=="")
			{
				$from_price=0;
				$to_price=5000000;
			}
			elseif($from_price=="" AND $to_price!="")
			{
				$from_price=0;
				$to_price=$_GET["price_to"];
			}
			elseif($from_price!="" AND $to_price=="")
			{
				$from_price=$_GET["price_from"];
				$to_price=5000000;
			}
			else
			{
				$from_price=$_GET["price_from"];
				$to_price=$_GET["price_to"];
			}
		}
		  /* Removed/Filtered for query/object optimization. If necessary kindly add it.*/
		  /*  $most_visited_product         = Home::get_deals_details();
          $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
          $get_product_details_typeahed = Home::get_product_details_typeahed();
          $city_details                 = Register::get_city_details(); 
          $category_count               = Home::get_category_count($header_category);
          $getanl                       = Settings::social_media_settings();*/

        $country_details              = Register::get_country_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_all_deals_details($discount_filters,$from_price,$to_price);
        $get_special_product          = Home::get_left_side_special_product();
        $main_category                = Home::get_header_category_deals();
        $sub_main_category            = Home::get_sub_main_category_deals($main_category);
        $second_main_category         = Home::get_second_main_category_deals($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category_deals();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')
            ->with('country_details', $country_details)
            ->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $get_social_media_url);
        
        return view('deals')   
          /* Removed/Filtered for query/object optimization. If necessary kindly add it.*/
        /*->with('get_product_details_by_cat', $get_product_details_by_cat)
       ->with('most_visited_product', $most_visited_product)
       ->with('category_count', $category_count)
       ->with('get_product_details_typeahed', $get_product_details_typeahed)*/
        ->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('metadetails', $getmetadetails)->with('get_special_product', $get_special_product)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
    public function category_deal_list($name, $id)
    {
		######## if filter is apply #########
		$discount_filters =array();
		$from_price=0;
		$to_price=5000000;
		if(isset($_GET["filter_discount"]) AND $_GET["filter_discount"]!="")
		{
			$filter_discount = base64_decode($_GET["filter_discount"]);
			if($filter_discount==1)
				$discount="0-10";
			elseif($filter_discount==2)
				$discount="11-20";
			elseif($filter_discount==3)
				$discount="21-30";
			elseif($filter_discount==4)
				$discount="31-40";
			elseif($filter_discount==5)
				$discount="41-50";
			elseif($filter_discount==6)
				$discount="51-100";
			else
				$discount="";
			if($discount!="")
				$discount_filters = explode("-",$discount);
		}
		if(isset($_GET["price_from"]) AND isset($_GET["price_to"]))
		{
			$from_price=$_GET["price_from"];
			$to_price=$_GET["price_to"];
			if($from_price=="" AND $to_price=="")
			{
				$from_price=0;
				$to_price=5000000;
			}
			elseif($from_price=="" AND $to_price!="")
			{
				$from_price=0;
				$to_price=$_GET["price_to"];
			}
			elseif($from_price!="" AND $to_price=="")
			{
				$from_price=$_GET["price_from"];
				$to_price=5000000;
			}
			else
			{
				$from_price=$_GET["price_from"];
				$to_price=$_GET["price_to"];
			}
		}
		
		#####################################
        $product_id          = base64_decode($id);
       
        $getmetadetails      = Home::getmetadetails();
        $city_details        = Register::get_city_details();
        $header_category     = Home::get_header_category();
        $get_special_product = Home::get_left_side_special_product();
        $country_details     = Register::get_country_details();
        if ($name == "viewcategorylist") {
            $get_cat_name_listby = Home::get_catname_listby($product_id);
            $product_details     = Home::get_category_deal_details_listby($product_id,$discount_filters,$from_price,$to_price);
            
           
            $get_listby_id       = explode(",", $product_id);
            foreach ($get_cat_name_listby as $get_cat_name_listby_single) {
            }
            if ($get_listby_id[0] == 1) {
                $product_name_single = $get_cat_name_listby_single->mc_name;
            } else if ($get_listby_id[0] == 2) {
                $product_name_single = $get_cat_name_listby_single->smc_name;
            } else if ($get_listby_id[0] == 3) {
                $product_name_single = $get_cat_name_listby_single->sb_name;
            } else if ($get_listby_id[0] == 4) {
                $product_name_single = $get_cat_name_listby_single->ssb_name;
            }
            
        } else {
            $product_details     = Home::get_all_deals_details($id);
            $product_name_single = "";

        }
        
        
        $most_visited_product         = Home::get_deals_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category_deals();
        $sub_main_category            = Home::get_sub_main_category_deals($main_category);
        $second_main_category         = Home::get_second_main_category_deals($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category_deals();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
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
        
        return view('deals')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('metadetails', $getmetadetails)->with('get_special_product', $get_special_product)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
    public function dealview($mcid, $scid, $sbid, $ssbid, $id)
    {
        $sid                          = base64_decode($id);
        $city_details                 = Register::get_city_details();
        $breadcrumb                   = Home::get_breadcrumb_deal($sid);
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $product_details_by_id        = Home::get_deals_details_by_id($sid);
         $deal_details_by_id            = Home::get_deals_details_by_id($sid);
        $get_related_product          = Home::get_related_deals($sid);
        $country_details              = Register::get_country_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $one_count                    = Home::get_dealcountone($sid);
        $two_count                    = Home::get_dealcounttwo($sid);
        $three_count                  = Home::get_dealcountthree($sid);
        $four_count                   = Home::get_dealcountfour($sid);
        $five_count                   = Home::get_dealcountfive($sid);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $review_details                = Home::get_deal_review_details($sid);
        $count_review_rating          = Home::get_count_deal_review_rating($sid);
        $get_store                    = Home::get_deal_deatils($sid);
        
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
        
        $session_message ='';
        
        return view('dealview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('metadetails', $getmetadetails)->with('breadcrumb', $breadcrumb)->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('get_contact_det', $get_contact_det)->with('general',$general)->with('deal_details_by_id',$deal_details_by_id)->with('success1',$session_message)
        ->with('review_details',$review_details)->with('count_review_rating',$count_review_rating);
    }
    
    public function dealview1($mcid, $scid, $sbid, $id)
    {
        $sid                          = base64_decode($id);
        $city_details                 = Register::get_city_details();
        $breadcrumb                   = Home::get_breadcrumb_deal($sid);
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $product_details_by_id        = Home::get_deals_details_by_id($sid);
        
        $get_related_product          = Home::get_related_deals($sid);
        $country_details              = Register::get_country_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $one_count                    = Home::get_dealcountone($sid);
        $two_count                    = Home::get_dealcounttwo($sid);
        $three_count                  = Home::get_dealcountthree($sid);
        $four_count                   = Home::get_dealcountfour($sid);
        $five_count                   = Home::get_dealcountfive($sid);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $review_details                = Home::get_deal_review_details($sid);
        $count_review_rating          = Home::get_count_deal_review_rating($sid);
        $get_store                    = Home::get_deal_deatils($sid);
       // print_r($get_store);exit();
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
        $session_message ='';
        return view('dealview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('metadetails', $getmetadetails)->with('breadcrumb', $breadcrumb)->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('get_contact_det', $get_contact_det)->with('general',$general)
            ->with('success1',$session_message)
            ->with('review_details',$review_details)->with('count_review_rating',$count_review_rating);
    }
    
    public function dealview2($mcid, $scid, $id)
    {
        $sid                          = base64_decode($id);
        $city_details                 = Register::get_city_details();
        $breadcrumb                   = Home::get_breadcrumb_deal($sid);
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $product_details_by_id        = Home::get_deals_details_by_id($sid);
        
        $get_related_product          = Home::get_related_deals($sid);
        $country_details              = Register::get_country_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $one_count                    = Home::get_dealcountone($sid);
        $two_count                    = Home::get_dealcounttwo($sid);
        $three_count                  = Home::get_dealcountthree($sid);
        $four_count                   = Home::get_dealcountfour($sid);
        $five_count                   = Home::get_dealcountfive($sid);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $review_details                = Home::get_deal_review_details($sid);
        $count_review_rating          = Home::get_count_deal_review_rating($sid);
        $get_store                    = Home::get_deal_deatils($sid);
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
        $session_message = '';
        
        return view('dealview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('metadetails', $getmetadetails)->with('breadcrumb', $breadcrumb)->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('get_contact_det', $get_contact_det)->with('general',$general)
        ->with('success1',$session_message)
        ->with('review_details',$review_details)->with('count_review_rating',$count_review_rating);
        
    }
    public function deal_review_All($sid){
        
        $product_details_by_id        = Home::get_deals_details_by_id($sid);
        $get_related_product          = Home::get_related_deals($sid);
        
        $one_count                    = Home::get_dealcountone($sid);
        $two_count                    = Home::get_dealcounttwo($sid);
        $three_count                  = Home::get_dealcountthree($sid);
        $four_count                   = Home::get_dealcountfour($sid);
        $five_count                   = Home::get_dealcountfive($sid);
        $count_review_rating          = Home::get_count_deal_review_rating($sid);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $get_store                    = Home::get_deal_deatils($sid);
        
        $country_details              = Register::get_country_details();
        $getmetadetails               = Home::getmetadetails();
        $general                      = Home::get_general_settings();
        $header_category              = Home::get_header_category();
        $getlogodetails               = Home::getlogodetails();
        $cms_page_title               = Home::get_cms_page_title();
        $get_social_media_url         = Home::get_social_media_url();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $review_details               = Home::get_deal_review_details($sid);
        $customer_id                  = Session::get('customerid');
        
        if (Session::has('customerid')) 
        {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        
        return view('deal_review_all')->with('navbar', $navbar)->with('header', $header)
        ->with('footer', $footer)
        ->with('product_details_by_id',$product_details_by_id)
        ->with('get_related_product',$get_related_product)
        ->with('count_review_rating',$count_review_rating)->with('review_details',$review_details)
        ->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store);
    }
   /* public function auction()
    {
      $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_all_action_details();
        $most_visited_product         = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $get_auction_last_bidder      = Home::auction_last_bidder($product_details);
        $get_auction_last_bidder1     = Home::auction_last_bidder($most_visited_product);
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('getanl', $getanl);
        
        return view('auction')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('get_auction_last_bidder', $get_auction_last_bidder)->with('get_auction_last_bidder1', $get_auction_last_bidder1)->with('metadetails', $getmetadetails)->with('general',$general);
        
        
    }
    
    
    public function category_auction_list($name, $id)
    {
        
        $product_id = base64_decode($id);
        $id         = base64_decode(base64_decode(base64_decode($id)));
        
        $city_details    = Register::get_city_details();
        $header_category = Home::get_header_category();
        $country_details = Register::get_country_details();
        if ($name == "viewcategorylist") {
            $get_cat_name_listby = Home::get_catname_listby($product_id);
            $product_details     = Home::get_category_auction_details_listby($product_id);
            
            $get_listby_id = explode(",", $product_id);
            foreach ($get_cat_name_listby as $get_cat_name_listby_single) {
            }
            if ($get_listby_id[0] == 1) {
                $product_name_single = $get_cat_name_listby_single->mc_name;
            } else if ($get_listby_id[0] == 2) {
                $product_name_single = $get_cat_name_listby_single->smc_name;
            } else if ($get_listby_id[0] == 3) {
                $product_name_single = $get_cat_name_listby_single->sb_name;
            } else if ($get_listby_id[0] == 4) {
                $product_name_single = $get_cat_name_listby_single->ssb_name;
            }
            
        } else {
            $product_details     = Home::get_all_action_details($id);
            $product_name_single = "";
        }
        
        $get_auction_last_bidder      = Home::auction_last_bidder($product_details);
        $most_visited_product         = Home::get_auction_details();
        $get_auction_last_bidder1     = Home::auction_last_bidder($most_visited_product);
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $getanl                       = Settings::social_media_settings();
       $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('getanl', $getanl);
        
        return view('auction')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('get_auction_last_bidder', $get_auction_last_bidder)->with('metadetails', $getmetadetails)->with('get_auction_last_bidder1', $get_auction_last_bidder1)->with('general',$general);
        
        
    }
 */   
    
    public function auctionview($id)
    {
    	 /* Removed/Filtered for query/object optimization. If necessary kindly add it.*/
        
       /* $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $product_details_by_id        = Home::get_action_details_by_id($id);
        $country_details              = Register::get_country_details();
        $get_related_product          = Home::get_related_auction($id);
        $most_visited_product         = Home::get_most_visited_product();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $get_max_bid_amt              = Home::max_bid_amt($id);
        $get_bidder_by_id             = Home::get_bidder_by_id($id);
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $getanl                       = Settings::social_media_settings();
       $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('getanl', $getanl);
        
        return view('auctionview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('get_max_bid_amt', $get_max_bid_amt)->with('get_bidder_by_id', $get_bidder_by_id)->with('metadetails', $getmetadetails)->with('general',$general);*/
    }
    
    public function stores(){

       /*$city_details                 = Register::get_city_details();
       $most_visited_product         = Home::get_most_visited_product();
       $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
       $category_count               = Home::get_category_count($header_category);
       $get_product_details_typeahed = Home::get_product_details_typeahed();
       $main_category                = Home::get_header_category();
       $sub_main_category            = Home::get_sub_main_category($main_category);
       $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
       $get_store_auction_count = Home::get_store_auction_count($get_store_details);
       $second_sub_main_category     = Home::get_second_sub_main_category();*/

       $header_category              = Home::get_header_category();
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
        
        $get_store_details       = Home::get_store_list();
        
        $get_store_deal_count    = Home::get_store_deal_count($get_store_details);
       
        $get_store_product_count = Home::get_store_product_count($get_store_details);
       
        return view('stores')
         /* Removed/Filtered for query/object optimization. If necessary kindly add it.*/
 /* ->with('get_store_auction_count', $get_store_auction_count)
        ->with('most_visited_product', $most_visited_product)
        ->with('category_count', $category_count)
        ->with('get_product_details_typeahed', $get_product_details_typeahed)
        ->with('main_category', $main_category)
        ->with('sub_main_category', $sub_main_category)
        ->with('second_main_category', $second_main_category)
        ->with('second_sub_main_category', $second_sub_main_category)*/
        ->with('navbar', $navbar)
        ->with('header', $header)->with('footer', $footer)
        ->with('header_category', $header_category)
        ->with('get_store_details', $get_store_details)
        ->with('get_store_deal_count', $get_store_deal_count)
        ->with('get_store_product_count', $get_store_product_count)
        ->with('metadetails', $getmetadetails)
        ->with('get_contact_det', $get_contact_det)
        ->with('general',$general);
    }

    public function stores_ajax()
    {
        
         $get_store_details=DB::table('nm_store')
        ->join('nm_merchant','nm_merchant.mer_id','=','nm_store.stor_merchant_id')
        ->where('nm_merchant.mer_staus','=',1)
        ->where('nm_store.stor_status', '=', 1)
        ->groupby('stor_merchant_id')
        ->orderby('nm_store.stor_id','desc')
        ->paginate(4);

/*$city_details                 = Register::get_city_details();
       $most_visited_product         = Home::get_most_visited_product();
       $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
       $category_count               = Home::get_category_count($header_category);
       $get_product_details_typeahed = Home::get_product_details_typeahed();
       $main_category                = Home::get_header_category();
       $sub_main_category            = Home::get_sub_main_category($main_category);
       $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
       $get_store_auction_count = Home::get_store_auction_count($get_store_details);
       $second_sub_main_category     = Home::get_second_sub_main_category();*/

       
        $header_category              = Home::get_header_category();
        $category_count               = Home::get_category_count($header_category);
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
        
       
        
        $get_store_deal_count    = Home::get_store_deal_count($get_store_details);
        $get_store_product_count = Home::get_store_product_count($get_store_details);
       
        return view('stores_ajax') /* ->with('get_store_auction_count', $get_store_auction_count)
        ->with('most_visited_product', $most_visited_product)
        ->with('category_count', $category_count)
        ->with('get_product_details_typeahed', $get_product_details_typeahed)
        ->with('main_category', $main_category)
        ->with('sub_main_category', $sub_main_category)
        ->with('second_main_category', $second_main_category)
        ->with('second_sub_main_category', $second_sub_main_category)*/
        ->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_store_details', $get_store_details)->with('get_store_deal_count', $get_store_deal_count)->with('get_store_product_count', $get_store_product_count)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
       
           
       
       
    }
    
    public function storeview($id)
    {
                
         $id                   = base64_decode(base64_decode(base64_decode($id)));

      //  $city_details         = Register::get_city_details();
        $header_category      = Home::get_header_category();
        $product_name_single  = "";
       // $most_visited_product = Home::get_auction_details();
        
     //   $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
     //   $category_count               = Home::get_category_count($header_category);
     //   $get_product_details_typeahed = Home::get_product_details_typeahed();
    //    $main_category                = Home::get_header_category();
     //   $sub_main_category            = Home::get_sub_main_category($main_category);
    //    $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
      //  $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $get_store_by_id              = Home::get_store_by_id($id);
		if($get_store_by_id){
        $get_store_merchant_by_id     = Home::get_store_merchant_by_id($get_store_by_id[0]->stor_merchant_id); }
        $get_store_deal_by_id         = Home::get_store_deal_by_id($id);
        $get_store_auction_by_id      = Home::get_store_auction_by_id($id);
        $get_auction_last_bidder      = Home::auction_last_bidder($get_store_auction_by_id);
        $get_store_product_by_id      = Home::get_store_product_by_id($id);
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_storebranch              = Home::get_store_sub_details($id);
        $one_count                    = Home::get_storecountone($id);
        $two_count                    = Home::get_storecounttwo($id);
        $three_count                  = Home::get_storecountthree($id);
        $four_count                   = Home::get_storecountfour($id);
        $five_count                   = Home::get_storecountfive($id);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $review_details               = Home::get_store_review_details($id);
        $get_store                    = Home::get_store_deatils($id);
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                       = Home::get_general_settings();

        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('storeview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)
      /* ->with('get_product_details_by_cat', $get_product_details_by_cat)
       ->with('most_visited_product', $most_visited_product)
       ->with('category_count', $category_count)
       ->with('get_product_details_typeahed', $get_product_details_typeahed)
       ->with('main_category', $main_category)
       ->with('sub_main_category', $sub_main_category)
       ->with('second_main_category', $second_main_category)
       ->with('second_sub_main_category', $second_sub_main_category)
        ->with('get_auction_last_bidder', $get_auction_last_bidder)
          ->with('get_store_auction_by_id', $get_store_auction_by_id)*/
        ->with('get_store_deal_by_id', $get_store_deal_by_id)
        ->with('get_store_product_by_id', $get_store_product_by_id)
        ->with('get_store_by_id', $get_store_by_id)
        ->with('metadetails', $getmetadetails)
        ->with('get_storebranch', $get_storebranch)
        ->with('one_count', $one_count)
        ->with('two_count', $two_count)
        ->with('three_count', $three_count)
        ->with('four_count', $four_count)
        ->with('five_count', $five_count)
        ->with('customer_details', $customer_details)
        ->with('review_comments', $review_comments)
        ->with('get_store', $get_store)
        ->with('get_contact_det', $get_contact_det)
        ->with('general',$general)
        ->with('review_details',$review_details)
        ->with('get_store_merchant_by_id',$get_store_merchant_by_id);
        
        
    }
    
    public function sold()
    {
  
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $get_store_deal_by_id         = Home::get_sold_deal_by_id();
        $header_category              = Home::get_header_category();
        $product_name_single          = "";
        $get_store_product_by_id      = Home::get_sold_product_by_id();
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
        
        return view('sold')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)
        ->with('get_store_deal_by_id', $get_store_deal_by_id)
        ->with('get_store_product_by_id', $get_store_product_by_id)
        ->with('metadetails', $getmetadetails)
        ->with('get_contact_det', $get_contact_det)
        ->with('general',$general);
     }
    
    public function searching(){
         $category = $_GET['category'];
          $q        = $_GET['q'];
         $category_id   = base64_decode($_GET['category']);
         if(($category_id!=0)&&($q!='')){                            //both exists
            
            return $this->category_search($category,$q);
        }elseif(($category_id==0)&&($q=='')){                       //both not exists
           
            return $this->search($q);   
        }elseif(($category_id!=0)&&($q=='')){                       //cat exists & no text 
            
            return $this->category_list($category);
        }elseif(($category_id==0)&&($q!='')){                       //no cat & & text exists
           
            return  $this->search($q);
        }

    }

    public function category_search($id,$text)
    {
        $id                   = base64_decode($id);
        $city_details         = Register::get_city_details();
        $header_category      = Home::get_header_category();
        $product_details      = Home::get_product_details_use_catid_text($id,$text); 
        $most_visited_product = Home::get_most_visited_product_by_cat($id);
        $deals_details        = Home::get_deals_details_use_catid_text($id,$text);
       // $auction_details              = Home::get_auction_details_use_catid($id);
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
       // $get_auction_last_bidder      = Home::auction_last_bidder($auction_details);
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
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails)->with('cid',$id)->with('search_text',$text);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('category_list')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deals_details', $deals_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }

    public function category_list($id)
    {
        $id                   = base64_decode($id);
        $city_details         = Register::get_city_details();
        $header_category      = Home::get_header_category();
        $product_details      = Home::get_product_details_use_catid($id);
        $most_visited_product = Home::get_most_visited_product();
        $deals_details        = Home::get_deals_details_use_catid($id); 
        
       // $auction_details              = Home::get_auction_details_use_catid($id);
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
       // $get_auction_last_bidder      = Home::auction_last_bidder($auction_details);
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
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails)->with('cid',$id);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('category_list')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deals_details', $deals_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
    public function search($q)
    {
        //$q = Input::get('q');
        
        $searchTerms = explode(' ', $q);
        $id          = $q;
        
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_deals_details();
      //  $auction_details              = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        
        $sub_main_category            = Home::get_sub_main_category($main_category);
        //print_r($sub_main_category);
        //exit();
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
        $searchTerms                  = Home::get_product_search($id); //prd_search
        $searchTermss                 = Home::get_deal_search($id);
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails)->with('search_text',$q);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('search')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deals_details', $deals_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('addetails', $addetails)->with('noimagedetails', $noimagedetails)->with('bannerimagedetails', $getbannerimagedetails)->with('metadetails', $getmetadetails)->with('searchTerms', $searchTerms)->with('searchTermss', $searchTermss)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
	public function facebooklogin()
	{
		$fb_id = Input::get('fid');
		$userEmail =Input::get('email');
		$data  = array('cus_name' => Input::get('name'),'cus_email' => Input::get('email'),'facebook_id' => Input::get('fid'),'cus_logintype' => 3);

		$fb_check = Home::facebook_login_check($fb_id,$userEmail,$data);
		if($fb_check=='success1')
		{
			$cus_name = Input::get('name');
			$datas = Input::get('email');

			$send_mail_data = array('cname' => $cus_name);	
			Mail::send('emails.facebookregistermail', $send_mail_data, function($message) use($datas)
			{ 
				$message->to($datas)->subject('Your Account has been created.....');
			}); 
			return 'success';
		}else{
			return $fb_check;
		}
	}       
  
    
    public function autosearch()
    {
        
        $q = $_GET['searchword'];
        if ($q != "") {
            $header_category              = Home::get_autosearch_category($q);
            $header_category_get          = Home::get_header_category();
            $category_count               = Home::get_category_count($header_category_get);
            $get_product_details_typeahed = Home::get_product_details_autosearch($q);
            $get_cat_out                  = "";
            foreach ($header_category as $header_categ) {
                $count = $category_count[$header_categ->mc_id];
                $get_cat_out .= '<a href="' . url('category_list/' . base64_encode($header_categ->mc_id)) . '" style="cursor:pointer;" >' . $header_categ->mc_name . '</a>' . '(' . $count . ')' . '<br/>';
            }
            $final_typeahed_result_one = $get_cat_out;
            
            if ($get_product_details_typeahed) {
                if(Lang::has(Session::get('lang_file').'.BACK_SPECIAL_PRODUCTS')!= '') 
                {
                    $session_message = trans(Session::get('lang_file').'.BACK_SPECIAL_PRODUCTS');
                }
                else 
                {
                    $session_message =  trans($this->OUR_LANGUAGE.'.BACK_SPECIAL_PRODUCTS');
                }
                $final_typeahed_result_three = '=== '.$session_message.' ===';
            } else {
                $final_typeahed_result_three = '';
            }
            $get_product_out = "";
            
            foreach ($get_product_details_typeahed as $product_typeahed) {
                if ($product_typeahed->pro_no_of_purchase < $product_typeahed->pro_qty) {
                    $pro_type_img = explode('/**/', $product_typeahed->pro_Img);
                    $href         = url('productview/' . $product_typeahed->pro_id);
                    $get_product_out .= '<div class="display_box" align="left"><table><tr><td><img src="' . url('') . '/assets/product/' . $pro_type_img[0] . '" alt="" height="100" width="70" ></td><td width="5"> </td><td><table><tr> <td>' . substr($product_typeahed->pro_title, 0, 25) . '...<br> $' . $product_typeahed->pro_disprice . '<br><a href="' . $href . '" class="btn align_brn icon_me" style="width:60px; height:50px;" href="">Add To Cart</a> </td> </tr> </table> </td></tr></table> </div>.............................................';
                }
            }
            
            $final_typeahed_result_two = $get_product_out;
            $final_result              = $final_typeahed_result_one . $final_typeahed_result_three . $final_typeahed_result_two;
            if ($final_result == "") {
                if(Lang::has(Session::get('lang_file').'.NO_RESULT_FOUND')!= '') 
                {
                    $session_message = trans(Session::get('lang_file').'.NO_RESULT_FOUND');
                }
                else 
                {
                    $session_message =  trans($this->OUR_LANGUAGE.'.NO_RESULT_FOUND');
                }
                echo $final_typeahed_result = '<div class="display_box" align="left">'.$session_message.'</div>';
            } else {
                echo $final_typeahed_result = '<b><div class="display_box"  align="left">' . $final_typeahed_result_one . $final_typeahed_result_three . $final_typeahed_result_two . "</div></b>";
            }
        } else {
            echo "";
        }
        
    }

    public function cart()
    {
        $result_cart  = Home::get_add_to_cart_details();
        $size_result  = Home::get_add_to_cart_size();
        $color_result = Home::get_add_to_cart_color();
        if (isset($_SESSION['deal_cart'])) {
            $result_cart_deal = Home::get_add_to_cart_deal_details();
        } else {
            $result_cart_deal = "";
        }
        $country_details              = Register::get_country_details();
        $most_visited_product         = Home::get_most_visited_product();
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $session_result               = '';
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
		$general                      = Home::get_general_settings();

        if (Session::has('customerid')) {
            
            DB::table('nm_coupon_purchage')->where('sold_user','=',Session::get('customerid'))->delete();
            Session::forget('coupon_type');
            Session::forget('coupon_code');
            Session::forget('coupon_amount_type');
            Session::forget('coupon_amount');
            Session::forget('coupon_total_amount');
            Session::forget('coupon_applied');
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails)->with('country_details', $country_details);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
         if(Session::has('unavailable_cart')) 
            $session_result = Session::get('unavailable_cart');

        return view('cart')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('most_visited_product', $most_visited_product)->with('result_cart', $result_cart)->with('size_result', $size_result)->with('color_result', $color_result)->with('session_result', $session_result)->with('page', "")->with('result_cart_deal', $result_cart_deal)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }

    public function add_to_cart()
    {
        /* print_r($_REQUEST);die; */
        $cart_id    = Input::get('addtocart_pro_id');
        $cart_qty   = Input::get('addtocart_qty');
        $cart_color = Input::get('addtocart_color')!=''?Input::get('addtocart_color'):'0';
        $cart_size  = Input::get('addtocart_size')!=''?Input::get('addtocart_size'):'0';
        $cart_type  = Input::get('addtocart_type');
        $return_url = Input::get('return_url');
        if ($cart_id < 1 or $cart_qty < 1)
            return;

       
        /* user exist in cart */
        $userInCart = Home::get_product_cart_by_userid(Session::get('customerid'));
        //print_r($userInCart);exit();
        if(count($userInCart)>0) {   
            $this->updateUserCart_bySave_cart();
        }
        
        if (isset($_SESSION['cart'])) {
            
            $check_product = Home::get_added_product_details($cart_id, $cart_color, $cart_size);
            
            if ($check_product == 0) {
                $max                                 = count($_SESSION['cart']);
                $_SESSION['cart'][$max]['productid'] = $cart_id;
                $_SESSION['cart'][$max]['qty']       = $cart_qty;
                $_SESSION['cart'][$max]['color']     = $cart_color;
                $_SESSION['cart'][$max]['size']      = $cart_size;
                $_SESSION['cart'][$max]['type']      = $cart_type;
                $session_result                      = '';
                //Save to cart table
                $entry = array(
                            'cart_product_id'      => $cart_id,
                            'cart_product_qty'  => $cart_qty,
                            'cart_type'         => 1,
                            'cart_pro_siz_id'   => $cart_size,
                            'cart_pro_col_id'   => $cart_color,
                            'cart_user_id'      => Session::get('customerid')
                        );

                $_SESSION['cart'][$max]['cartTabID'] = Home::add_to_cart_product($entry);

            } else {
                $session_result = Home::get_already_product_details($cart_id);
            }
            
        } else {
            $_SESSION['cart']                 = array();
            $_SESSION['cart'][0]['productid'] = $cart_id;
            $_SESSION['cart'][0]['qty']       = $cart_qty;
            $_SESSION['cart'][0]['color']     = $cart_color;
            $_SESSION['cart'][0]['size']      = $cart_size;
            $_SESSION['cart'][0]['type']      = $cart_type;
            $session_result                   = '';
            //Save to cart table
            $entry = array(
                        'cart_product_id'   => $cart_id,
                        'cart_product_qty'  => $cart_qty,
                        'cart_type'         => 1,
                        'cart_pro_siz_id'   => $cart_size,
                        'cart_pro_col_id'   => $cart_color,
                        'cart_user_id'      => Session::get('customerid')
                    );

            $_SESSION['cart'][0]['cartTabID'] = Home::add_to_cart_product($entry);
        }
        
        
        if (isset($_SESSION['deal_cart'])) {
            $result_cart_deal = Home::get_add_to_cart_deal_details();
        } else {
            $result_cart_deal = "";
        }
        $result_cart = Home::get_add_to_cart_details();
        if ($cart_type == "product") {
            $size_result  = Home::get_add_to_cart_size();
            $color_result = Home::get_add_to_cart_color();
        } else {
            $size_result  = '';
            $color_result = '';
        }
        $country_details              = Register::get_country_details();
        $most_visited_product         = Home::get_most_visited_product();
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
       $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            
            DB::table('nm_coupon_purchage')->where('sold_user','=',Session::get('customerid'))->delete();
            Session::forget('coupon_type');
            Session::forget('coupon_code');
            Session::forget('coupon_amount_type');
            Session::forget('coupon_amount');
            Session::forget('coupon_total_amount');
            Session::forget('coupon_applied');
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('cart')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('most_visited_product', $most_visited_product)->with('result_cart', $result_cart)->with('size_result', $size_result)->with('color_result', $color_result)->with('session_result', $session_result)->with('page', "")->with('result_cart_deal', $result_cart_deal)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
        
    }

    public function remove_session_cart_data()
    {
       
        $pid = intval($_GET['id']);
        $max = count($_SESSION['cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($pid == $_SESSION['cart'][$i]['productid']) {
                
                /* remove from cart table */
                Home::delete_cart_by_id($_SESSION['cart'][$i]['cartTabID'],'1');
                unset($_SESSION['cart'][$i]);
                break;
            }
        }
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        if(empty($_SESSION['cart']))
            unset($_SESSION['cart']);
    }

    public function set_quantity_session_cart()
    {
       
        $session_message = '';

        $pid = intval($_GET['pid']);
        $qty = intval($_GET['id']);
        $size = intval($_GET['size']);
        $color = intval($_GET['color']);
        $max = count($_SESSION['cart']);
        $avail = 0;
        /* check specfied quantity of same product available */
        $checkProductAvailablity = Home::get_availableProductQuantity($pid,$qty);
        //print_r($checkProductAvailablity);exit();
        if(count($checkProductAvailablity)>0)
        {
            $avail  = 1;
        }    
        if($avail>0){
            for ($i = 0; $i < $max; $i++) {
                if ($pid == $_SESSION['cart'][$i]['productid'] && $size == $_SESSION['cart'][$i]['size'] && $color == $_SESSION['cart'][$i]['color']) {  
                    //print_r($_SESSION['cart'][$i]['cartTabID']);exit();                              
                    $_SESSION['cart'][$i]['qty'] = $qty;
                    // update cart table 
                    $getCart = Home::get_cart_details_by_id($_SESSION['cart'][$i]['cartTabID'],1);
                    if(count($getCart)>0){
                        foreach ($getCart as $gs) {}
                         $entry = array(
                                'cart_product_id'   => $gs->cart_product_id,
                                'cart_product_qty'  => $qty,
                                'cart_type'         => 1,
                                'cart_pro_siz_id'   => $gs->cart_pro_siz_id,
                                'cart_pro_col_id'   => $gs->cart_pro_col_id,
                                'cart_user_id'      => Session::get('customerid')
                            );
                        Home::update_to_cart_product($_SESSION['cart'][$i]['cartTabID'],$entry);

                    }
                    break;
                }
            }
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            if (Lang::has(Session::get('lang_file').'.CART_UPDATED')!= '') { 
                $session_result     =    trans(Session::get('lang_file').'.CART_UPDATED');}  
            else {  $session_result =   trans($OUR_LANGUAGE.'.CART_UPDATED');}
        }else{
            if (Lang::has(Session::get('lang_file').'.PRODUCT_QUANTITY_NOT_AVAILABLE')!= '') { 
                $session_result     =    trans(Session::get('lang_file').'.PRODUCT_QUANTITY_NOT_AVAILABLE');}  
            else {  $session_result =   trans($OUR_LANGUAGE.'.PRODUCT_QUANTITY_NOT_AVAILABLE');}
        }

        echo $session_result;
        Session::put('cartSessionMsge', $session_result);
    }
    
    public function remove_session_dealcart_data()
    {
        
        $pid = intval($_GET['id']);
        $max = count($_SESSION['deal_cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($pid == $_SESSION['deal_cart'][$i]['productid']) {
                /* remove from cart table */
                Home::delete_cart_by_id($_SESSION['deal_cart'][$i]['cartTabID'],'2');
                unset($_SESSION['deal_cart'][$i]);
                break;
            }
        }
        $_SESSION['deal_cart'] = array_values($_SESSION['deal_cart']);
        
        if(empty($_SESSION['deal_cart']))
            unset($_SESSION['deal_cart']);
    }

    public function set_quantity_session_dealcart()
    {
        
        $pid = intval($_GET['pid']);
        $qty = intval($_GET['id']);
        $max = count($_SESSION['deal_cart']);
         $avail = 0;
        /* check specfied quantity of same product available */
        $checkDealAvailablity = Home::get_availableDealQuantity($pid,$qty);

        if(count($checkDealAvailablity)>0)
        {
            $avail  = 1;
        }    
        if($avail>0){
            for ($i = 0; $i < $max; $i++) {
                if ($pid == $_SESSION['deal_cart'][$i]['productid']) {
                    $_SESSION['deal_cart'][$i]['qty'] = $qty;

                     /* update cart table */
                    $getCart = Home::get_cart_details_by_id($_SESSION['deal_cart'][$i]['cartTabID'],2);
                    if(count($getCart)>0){
                        foreach ($getCart as $gs) {}
                         $entry = array(
                                'cart_deal_id'   => $gs->cart_deal_id,
                                'cart_product_qty'  => $qty,
                                'cart_type'         => 2,
                                'cart_pro_siz_id'   => $gs->cart_pro_siz_id,
                                'cart_pro_col_id'   => $gs->cart_pro_col_id,
                                'cart_user_id'      => Session::get('customerid')
                            );
                        Home::update_to_cart_product($_SESSION['deal_cart'][$i]['cartTabID'],$entry);
                    }

                    break;
                }
            }

            $_SESSION['deal_cart'] = array_values($_SESSION['deal_cart']);
            if (Lang::has(Session::get('lang_file').'.CART_UPDATED')!= '') { 
                $session_message     =    trans(Session::get('lang_file').'.CART_UPDATED');}  
            else {  $session_message =   trans($OUR_LANGUAGE.'.CART_UPDATED');}
        }else{
            if (Lang::has(Session::get('lang_file').'.PRODUCT_QUANTITY_NOT_AVAILABLE')!= '') { 
                $session_message     =    trans(Session::get('lang_file').'.PRODUCT_QUANTITY_NOT_AVAILABLE');}  
            else {  $session_message =   trans($OUR_LANGUAGE.'.PRODUCT_QUANTITY_NOT_AVAILABLE');}
        }

        echo $session_message;
        Session::put('cartSessionMsge', $session_message);
    }
    
    public function deal_cart()
    {
        $result_cart  = Home::get_add_to_cart_details();
        $size_result  = Home::get_add_to_cart_size();
        $color_result = Home::get_add_to_cart_color();
        if (isset($_SESSION['deal_cart'])) {
            $result_cart_deal = Home::get_add_to_cart_deal_details();
        } else {
            $result_cart_deal = "";
        }
        $country_details              = Register::get_country_details();
        $size_result                  = Home::get_add_to_cart_size();
        $color_result                 = Home::get_add_to_cart_color();
        $most_visited_product         = Home::get_most_visited_product();
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $session_result               = '';
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
        
        
        return view('cart')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('most_visited_product', $most_visited_product)->with('result_cart', $result_cart)->with('size_result', $size_result)->with('color_result', $color_result)->with('session_result', $session_result)->with('page', "deals")->with('result_cart_deal', $result_cart_deal)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }

    public function add_to_cart_deal()
    {
               
        $cart_id    = Input::get('addtocart_deal_id');
        $cart_qty   = Input::get('addtocart_qty');
        $cart_type  = Input::get('addtocart_type');
        $return_url = Input::get('return_url');
        if ($cart_id < 1 or $cart_qty < 1)
            return;
        /* user exist in cart */
        $userInCart = Home::get_product_cart_by_userid(Session::has('customerid'));
        //print_r($userInCart);exit();
        if(count($userInCart)>0) {   
            $this->updateUserCart_bySave_cart();
        } 
        if(Session::has('customerid')){
            if (isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])) {
                //print_r($_SESSION['deal_cart']);
                
                $check_product = Home::get_added_deal_details($cart_id);
                //print_r($check_product);exit();
                if ($check_product == '') {
                   $max                                      = count($_SESSION['deal_cart']);
                   
                    $_SESSION['deal_cart'][$max]['productid'] = $cart_id;
                    $_SESSION['deal_cart'][$max]['qty']       = $cart_qty;
                    $_SESSION['deal_cart'][$max]['type']      = $cart_type;

                    $cart_size = $cart_color = 0;
                    //Save to cart table
                    $entry = array(
                                'cart_deal_id'      => $cart_id,
                                'cart_product_qty'  => $cart_qty,
                                'cart_type'         => 2,
                                'cart_pro_siz_id'   => $cart_size,
                                'cart_pro_col_id'   => $cart_color,
                                'cart_user_id'      => Session::get('customerid')
                            );

                    $_SESSION['deal_cart'][$max]['cartTabID'] = Home::add_to_cart_product($entry);
                    
                    $session_result = '';
                } else {
                    $session_result = Home::get_already_deals_details($cart_id);
                }
                
            } else {
                
                    $_SESSION['deal_cart']                 = array();
                    $_SESSION['deal_cart'][0]['productid'] = $cart_id;
                    $_SESSION['deal_cart'][0]['qty']       = $cart_qty;
                    $_SESSION['deal_cart'][0]['type']      = $cart_type;

                    $cart_size = $cart_color = 0;
                    //Save to cart table
                    $entry = array(
                                'cart_deal_id'      => $cart_id,
                                'cart_product_qty'  => $cart_qty,
                                'cart_type'         => 2,
                                'cart_pro_siz_id'   => $cart_size,
                                'cart_pro_col_id'   => $cart_color,
                                'cart_user_id'      => Session::get('customerid')
                            );

                    $_SESSION['deal_cart'][0]['cartTabID'] = Home::add_to_cart_product($entry);

                    $session_result                        = '';
                
            }
            
            
            $result_cart_deal = Home::get_add_to_cart_deal_details();
            if (isset($_SESSION['cart'])) {
                $result_cart = Home::get_add_to_cart_details();
            } else {
                $result_cart = "";
            }
            $country_details              = Register::get_country_details();
            $size_result                  = Home::get_add_to_cart_size();
            $color_result                 = Home::get_add_to_cart_color();
            $most_visited_product         = Home::get_most_visited_product();
            $city_details                 = Register::get_city_details();
            $header_category              = Home::get_header_category();
            $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
            $category_count               = Home::get_category_count($header_category);
            $get_product_details_typeahed = Home::get_product_details_typeahed();
            $main_category                = Home::get_header_category();
            $sub_main_category            = Home::get_sub_main_category($main_category);
            $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
            $second_sub_main_category     = Home::get_second_sub_main_category();
            $get_social_media_url         = Home::get_social_media_url();
            $cms_page_title               = Home::get_cms_page_title();
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
            
            return view('cart')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('most_visited_product', $most_visited_product)->with('result_cart_deal', $result_cart_deal)->with('session_result', $session_result)->with('page', "deals")->with('result_cart', $result_cart)->with('size_result', $size_result)->with('color_result', $color_result)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
        }else{
             //Show error message
            if(Lang::has(Session::get('lang_file').'.PLEASE_LOGIN_TO_PROCEED')!= '') 
            {
                $session_message = trans(Session::get('lang_file').'.PLEASE_LOGIN_TO_PROCEED');
            }
            else
            {
                $session_message =  trans($this->OUR_LANGUAGE.'.PLEASE_LOGIN_TO_PROCEED');
            }
            return Redirect::back()->with('success1',$session_message);
        }    
    }
    
    /*public function checkout_auction()
    {
        $country_details              = Register::get_country_details();
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_all_deals_details();
        $auction_details              = Home::get_all_action_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $get_image_favicons_details   = Home::get_image_favicons_details();
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
        
        return view('checkout_auction')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deals_details', $deals_details)->with('auction_details', $auction_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }*/

    public function checkout()
    { 
        $unavailable = $this->unvailabilityofCart();

        if($unavailable!=''){
            Session::flash('unavailable_cart', $unavailable);
            return Redirect::to('cart'); 
        }
        else{
            $country_details              = Register::get_country_details();
            $city_details                 = Register::get_city_details();
            $header_category              = Home::get_header_category();
            $general                      = Home::get_general_settings();
            $product_details              = Home::get_product_details();
            $most_visited_product         = Home::get_most_visited_product();
            $deals_details                = Home::get_all_deals_details();
           // $auction_details              = Home::get_all_action_details();
            $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
            $category_count               = Home::get_category_count($header_category);
            $get_product_details_typeahed = Home::get_product_details_typeahed();
            $main_category                = Home::get_header_category();
            $sub_main_category            = Home::get_sub_main_category($main_category);
            $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
            $second_sub_main_category     = Home::get_second_sub_main_category();
            $get_social_media_url         = Home::get_social_media_url();
            $cms_page_title               = Home::get_cms_page_title();
            $get_meta_details             = Home::get_meta_details();
            $get_image_favicons_details   = Home::get_image_favicons_details();
            $get_image_logoicons_details  = Home::get_image_logoicons_details();
            $getlogodetails               = Home::getlogodetails();
            $getmetadetails               = Home::getmetadetails();
            $get_contact_det              = Footer::get_contact_details();
            $getanl                       = Settings::social_media_settings();
            $cust_id                      = Session::get('customerid');
            Session::forget('wallet_status');
            Session::forget('wallet_amount');
            Session::forget('wallet_total_price');

            if (isset($_SESSION['cart'])) {
                $result_cart = Home::get_add_to_cart_details();
            } else {
                $result_cart = '';
            }
            $size_result           = Home::get_add_to_cart_size();
            $color_result          = Home::get_add_to_cart_color();
            $shipping_addr_details = Home::get_ship_addr_details($cust_id);
            
            if (isset($_SESSION['deal_cart'])) {
                $result_cart_deal = Home::get_add_to_cart_deal_details();
            } else {
                $result_cart_deal = "";
            }
           
            if (Session::has('customerid')) {
                $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
            } else {
                $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
            }
            $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
            $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl)->with('general', $general);
            
            $getmetadetails = Home::getmetadetails();
            return view('checkout')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deals_details', $deals_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('get_image_logoicons_details', $get_image_logoicons_details)->with('shipping_addr_details', $shipping_addr_details)->with('result_cart', $result_cart)->with('size_result', $size_result)->with('color_result', $color_result)->with('result_cart_deal', $result_cart_deal)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general)->with('country_details', $country_details)->with('city_shipping',$city_details);
        }
    }

    public function check_estimate_zipcode()
    {
        $result = Home::get_estimate_zipcode_range($_GET['estimate_check_val']);
        if ($result) {
            foreach ($result as $estimate_result) {
            }
            echo $estimate_result->ez_code_days;
        } else {
            echo 0;
        }
    }

    public function payment_checkout_process(Request $request){


       // unset($_SESSION['wallet_used_amount']);
        
        /* check for product quantity availability */
        $unavailable = $this->unvailabilityofCart();
        if($unavailable!=''){
            Session::flash('unavailable_cart', $unavailable);
            return Redirect::to('cart'); 
        }
        
        //ini_set('max_execution_time', 300);
        $customer_id = $cust_id  = Session::get('customerid');
        
        $pay_type = Input::get('select_payment_type');
        if($pay_type==2){
        	return Redirect::to('checkout');
        }

        /* cart details and  calculation starts */
        /* product cart details */
        $z = 1;
        $overall_total_price=0;
        $overall_shipping_price=0;
        $tax = 0;
        $overall_tax_price=0;
        $overall_tax_amt=0;
        $overall_coupon_value=0;

        //print_r(Session::get('user_total_amount'));exit();
        $price_qty_sum  = $deal_price_qty_sum = 0;

        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
            $price_qty_sum         = Home::get_cart_prodPriceQty_sum_with_taxShip();   
        }
        if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])){            
            $deal_price_qty_sum    = Home::get_dealCart_prodPriceQty_sum_with_taxShip();  
        }

        $prod_deal_priceQtySum = $price_qty_sum + $deal_price_qty_sum ;
       
        if(isset($_POST['coupon_amount']))
           $prod_deal_priceQtySum = $prod_deal_priceQtySum - $_POST['coupon_amount'];
//exit();
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){

            $result_cart           = Home::get_add_to_cart_details();
            $size_result           = Home::get_add_to_cart_size();
            $color_result          = Home::get_add_to_cart_color();

            $price_qty_sum         = Home::get_cart_prodPriceQty_sum();

            $max=count($_SESSION['cart']);        
            for($i=0;$i<$max;$i++){
                $pid    =   $_SESSION['cart'][$i]['productid'];

                $q      =   $_SESSION['cart'][$i]['qty'];

                $size   =   $size_result[$_SESSION['cart'][$i]['size']];

                $color  =   $color_result[$_SESSION['cart'][$i]['color']];

                $pname  =   "Have to get";


                foreach($result_cart[$pid] as $session_cart_result) 
                {
                     
                    /**********coupon details**********/
                    $session_pro_id = $_SESSION['cart'][$i]['productid'];
                    $session_color_id = $_SESSION['cart'][$i]['color'];
                    $session_size_id = $_SESSION['cart'][$i]['size'];
                    $session_customer_id = Session::get('customerid');

                    $coupon_details =  DB::table('nm_coupon_purchage')->where('product_id','=',$session_pro_id)->where('sold_user','=',$session_customer_id)->where('color','=',$session_color_id)->where('size','=',$session_size_id)->where('type_of_coupon','=',1)->first(); // product coupon
                    
                    $coupon_details_all =  DB::table('nm_coupon_purchage')->where('sold_user','=',$session_customer_id)->first();
                    $user_types = "(type_of_coupon = 2) or (type_of_coupon=3)";
                    $type_of_coupon_details =  DB::table('nm_coupon_purchage')->where('sold_user','=',$session_customer_id)->whereRaw($user_types)->first(); //user coupon 
                   //echo $overall_tax_price+=$session_cart_result->pro_inctax;
                    /*print_r($type_of_coupon_details);
                    print_r(Session::has('user_total_amount'));*/
                    if(isset($coupon_details) && $coupon_details != "") //product coupon
                    {
                            $tax= $session_cart_result->pro_inctax;
                            $overall_tax_price= ((($session_cart_result->pro_disprice * $q) * $tax)/100);
                                                            /*here getting price from the coupon purchase table, in that already we have saved with (product * qty) - coupon value */
                            $item_total_price = ($coupon_details->product_price)+ $overall_tax_price;  //this is (product * qty) - coupon value + tax
                                                        
                            $overall_total_price += ($item_total_price);  //(product * qty) + tax

                            $overall_shipping_price +=($session_cart_result->pro_shippamt * $q);
                                    
                    }
                    /*****end product coupon*****/

                    elseif($type_of_coupon_details != "" && Session::has('user_total_amount')){
                            
                        if($type_of_coupon_details->type !=  ''){ 
                        
                            $product_qty_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);
                            $overall_coupon_value = $type_of_coupon_details->value;
                            
                            $tax                = $session_cart_result->pro_inctax;
                            $overall_tax_price  = ((($product_qty_price)*$tax)/100);
                           
                            /* Customer Coupon split per product  */ 
                            if(Session::get('coupon_amount')!=0  && $price_qty_sum!=0){
                                $userCoupon_per_product[$z] = floatval(round(($product_qty_price * (Session::get('coupon_amount')/$price_qty_sum)),2));
                                $userCoupon_Total_product[$z] = floatval(round(($product_qty_price - $userCoupon_per_product[$z] ),2));
                            }
                            else{
                                $userCoupon_per_product[$z] = 0;
                                $userCoupon_Total_product[$z] = 0;
                            }

                            //not anymore ; dont know the purpose
                            /*$flat = $type_of_coupon_details->value * $product_qty_price;
                                                                
                            $flat_less = $flat / Session::get('user_total_amount');
                        
                            $rount_total_price = ($product_qty_price -  $flat_less); */                               
                            
                            $item_total_price = ($product_qty_price) + $overall_tax_price; 
                            
                            $overall_total_price += round($item_total_price,2);  //(product * qty) + tax
                            
                            $overall_shipping_price +=($session_cart_result->pro_shippamt * $q);
                            
                        }    
                    }
                    /**********End Coupon Details**************/
                    
                    else{

                        $product_qty_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);

                        $overall_shipping_price +=($session_cart_result->pro_shippamt * $q);

                        $tax=               $session_cart_result->pro_inctax;
                        $overall_tax_price =((($product_qty_price)*$tax)/100);
                        
                        $item_total_price = ($product_qty_price + $overall_tax_price);

                        $overall_total_price += round($item_total_price,2);  //(product * qty) + tax

                    }
                    
                    /* if wallet used  */

                    if(Session::has('wallet_used_amount'))
                    {
                        $wallet_used_amount     = Session::get('wallet_used_amount');
                        $product_qty_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);
                       

                        $itm_shipping_amt   = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_shippamt);
                        $itm_taxAmt         = round($overall_tax_price,2);

                        if(Session::get('coupon_product_id'.$session_cart_result->pro_id) == $session_cart_result->pro_id)
                        {
                           
                            $coupon_amount          = Session::get('coupon_amount'.$session_cart_result->pro_id);
                        }
                         else if(Session::get('coupon_type'.$cust_id) == 'usercoupon')
                        {
                            /* Split the user coupon amoount per each order products */
                            $coupon_amount          = $userCoupon_per_product[$key];
                           

                            /* Split the user coupon amoount per each order products */

                        }
                        else
                        {                     
                            $coupon_amount = 0;
                        }

                         $userWallet_per_product[$z] = floatval(round((((($product_qty_price - $coupon_amount )  + $itm_shipping_amt + $itm_taxAmt) * (Session::get('wallet_used_amount')/$prod_deal_priceQtySum))),2));
                        
                        

                    }
                    else{
                        $wallet_used_amount     = 0;
                        $userWallet_per_product[$z] = 0;
                    }


                    /* if wallet used ends */

                    /* Merchant Commission Calculation starts */
                    $mer_commis_amt = $mer_amt = 0 ;
                    $mer_commissionDetails  = 0; 
                          /* Merchant Commission Calculation ends */
                    $delivery_date[$z]  = '+'.$session_cart_result->pro_delivery.'days';
                 $overall_tax_amt    += round($overall_tax_price,2);
                    $item_name[$z]      = $session_cart_result->pro_title;
                    $item_type[$z]      ="1" ;
                    $item_code[$z]      = $pid;
                    $item_desc[$z]      = $session_cart_result->pro_desc;
                    $item_qty[$z]       = $q;
                    $item_color[$z]     = $_SESSION['cart'][$i]['color'];
                    $item_size[$z]      = $_SESSION['cart'][$i]['size'];
                    $item_color_name[$z]= $color;
                    $item_size_name[$z] = $size;

                    $item_price[$z]     = $session_cart_result->pro_disprice;
                    $item_price_actual[$z]     = $session_cart_result->pro_price;
                    $item_cash_pack[$z] = $session_cart_result->cash_pack;

                    $item_tax[$z]       = $session_cart_result->pro_inctax;

                    $item_taxAmt[$z]       = $overall_tax_price;

                    $item_shipping[$z] = $session_cart_result->pro_shippamt;

                    $item_totprice[$z] = $item_total_price;
                    
                    $item_merchant[$z] = 0;

                    $item_mer_commission_amt[$z] = 0;
                    $item_mer_amt[$z] = 0;

                    $no_item_found  = 1;
                    $z++;
                }   
            }
        } 
        
        /* product cart details ends */
        /* deal cart details */
        $overall_deal_total_price       = 0;
        $overall_deal_shipping_price    = 0;
        $overall_deal_tax_price         = 0;

        if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])){

            $result_cart_deal = Home::get_add_to_cart_deal_details();

            $max=count($_SESSION['deal_cart']);
            for($i=0;$i<$max;$i++){                
                $pid=$_SESSION['deal_cart'][$i]['productid'];
                $q=$_SESSION['deal_cart'][$i]['qty'];
                $pname="Have to get";
                foreach($result_cart_deal[$pid] as $session_deal_cart_result) 
                {
                    $deal_qty_price     =   ($_SESSION['deal_cart'][$i]['qty']) * ($session_deal_cart_result->deal_discount_price );
                    $tax                =   $session_deal_cart_result->deal_inctax;                     
                    $overall_tax_price      =   ((($deal_qty_price)*$tax)/100);
                    $overall_tax_amt        +=  round($overall_tax_price,2);
                    $item_total_price      =   ($deal_qty_price + $overall_tax_price);
                    $session_customer_id    =   Session::get('customerid');
                    $coupon_details_all     =   DB::table('nm_coupon_purchage')->where('sold_user','=',$session_customer_id)->first();
                    $overall_deal_total_price       +=  round($item_total_price,2); // (product price * qty) 

					$overall_deal_shipping_price    +=  ($_SESSION['deal_cart'][$i]['qty']) * ($session_deal_cart_result->deal_shippamt );


                    $overall_deal_tax_price         +=  0;

                    //User coupon is not applicable to deal so its zero
                    $userCoupon_per_product[$z]   = 0;
                    $userCoupon_Total_product[$z] = 0; 

                    /* if wallet used  */
                   
                    if(Session::has('wallet_used_amount'))
                    {
                        $wallet_used_amount     = Session::get('wallet_used_amount');

                        $itm_shipping_amt   = ($_SESSION['deal_cart'][$i]['qty']) * ($session_deal_cart_result->deal_shippamt);
                        $itm_taxAmt         = round($overall_tax_price,2);

                        if(Session::get('coupon_type'.$customer_id) == 'usercoupon')
                        {
                            /* Split the user coupon amoount per each order products */
                            $coupon_amount          = $userCoupon_per_product[$key];
                            /* Split the user coupon amoount per each order products */
                        }
                        else
                        {                     
                            $coupon_amount = 0;
                        }

                        
                        $userWallet_per_product[$z] = floatval(round(((($deal_qty_price - $coupon_amount ) + $itm_shipping_amt + $itm_taxAmt)  * (Session::get('wallet_used_amount')/$prod_deal_priceQtySum)),2));
                    }
                    else{
                        $wallet_used_amount     = 0;
                        $userWallet_per_product[$z] = 0;
                    }
                    /* if wallet used ends */
                    /* Merchant Commission Calculation starts */
                    $mer_commis_amt = $mer_amt = 0 ;
                     $mer_commissionDetails  = "0"; 
                    $item_name[$z]          =   $session_deal_cart_result->deal_title;
                    $item_type[$z]          =   "2";
                    $item_code[$z]          =   $pid;
                    $item_desc[$z]          =   $session_deal_cart_result->deal_description;
                    $item_qty[$z]           =   $q;
                    $item_color[$z]         =   "";
                    $item_size[$z]          =   "" ;
                    $item_color_name[$z]    =   "-" ;
                    $item_size_name[$z]     =   "-" ;
                    $item_price[$z]         =   $session_deal_cart_result->deal_discount_price;
                    $item_price_actual[$z]  =   $session_deal_cart_result->deal_original_price;
                    $item_cash_pack[$z]     =   "0";    
                    $item_tax[$z]           =   $session_deal_cart_result->deal_inctax;

                    $item_taxAmt[$z]        =   $overall_tax_price;

                    $item_shipping[$z]      =   $session_deal_cart_result->deal_shippamt;
                    $item_totprice[$z]      =   $item_total_price;
                    $item_merchant[$z]      =   0;

                    $item_mer_commission_amt[$z]    = 0;
                    $item_mer_amt[$z]               = 0;

                    $no_item_found          =   1; 
                    $z++;
                }
            }
        }

        /* deal cart details  ends*/

        $subtotal       = $overall_total_price + $overall_deal_total_price;
        $shipping_price = $overall_shipping_price + $overall_deal_shipping_price;    
        $tax_price      = $overall_tax_amt+ $overall_deal_tax_price;    

        $overall_pro_price = $overall_total_price + ($overall_shipping_price); 
                            
        $overall_deal_price = ($overall_deal_total_price+$overall_deal_shipping_price) + (($overall_deal_total_price+$overall_deal_shipping_price) *($overall_deal_tax_price/100));

        $product_total = ($overall_total_price + $overall_deal_total_price)-$overall_tax_amt;   

        $total_price = $overall_pro_price+$overall_deal_price;

         $price = round(($overall_pro_price+$overall_deal_price - $overall_coupon_value),2) ;
        /* cart details and  calculation starts */
         $settings = Home::get_settings();
            foreach ($settings as $s) { 
            }
        $tax_id_number      = $s->tax_id_number;
        $tax_type           = $s->tax_type;

        //Paypal Payment
        if ($pay_type == 1) {  

            
           
            if ($s->ps_paypal_pay_mode == '0') {
                $mode = 'sandbox';
            } elseif ($s->ps_paypal_pay_mode == '1') {
                $mode = 'live';
            }
            
            $PayPalMode         = $mode; // sandbox or live  
            $PayPalApiUsername  = $s->ps_paypalaccount;
            $PayPalApiPassword  = $s->ps_paypal_api_pw;
            $PayPalApiSignature = $s->ps_paypal_api_signature;
            $PayPalCurrencyCode = $s->ps_curcode;
            $tax_id_number      = $s->tax_id_number;
            $tax_type           = $s->tax_type;
            $PayPalReturnURL    = url('paypal_checkout_success'); //Point to process.php page
            $PayPalCancelURL    = url('paypal_checkout_cancel'); //Cancel URL if user clicks cancel
            require 'paypal/paypal.class.php';
            
            $paypalmode = ($PayPalMode == $mode) ? '.' . $mode : '';
            if ($_POST) //Post Data received from product list page.
            {
                //Other important variables like tax, shipping cost
                if (isset($tax_price)) {
                    $TotalTaxAmount = $tax_price; //Sum of tax for all product items in this order(deals have no tax). 
                } else {
                    $TotalTaxAmount = 0;
                }
                $HandalingCost   = 0.00; //Handling cost for this order.
                $InsuranceCost   = 0.00; //shipping insurance cost for this order.
                $ShippinDiscount = 0.00;
                $ItemTotalPrice = 0;
                
                if (isset($shipping_price)) {
                    $ShippinCost = $shipping_price; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
                } else {
                    $ShippinCost = 0;
                }
                //we need 4 variables from product page Item Name, Item Price, Item Number and Item Quantity.
                //Please Note : People can manipulate hidden field amounts in form,
                //In practical world you must fetch actual price from database using item id. 
                //eg : $ItemPrice = $mysqli->query("SELECT item_price FROM products WHERE id = Product_Number");
                $paypal_data    = '';
                $now            = date('Y-m-d h:i:sa');
                $insert_id      = '';
                $coupon_amount_tot = 0;
                $order_prodAr = $order_dealAr = array();

                foreach ($item_name as $key => $itemname) {
                    
                    $product_code = filter_var($_POST['item_code'][$key], FILTER_SANITIZE_STRING);
                    
                    $paypal_data .= '&L_PAYMENTREQUEST_0_NAME' . $key . '=' . urlencode($item_name[$key]);
                  //  $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER' . $key . '=' . urlencode($item_code[$key]);
                    $paypal_data .= '&L_PAYMENTREQUEST_0_AMT' . $key . '=' . urlencode($item_price[$key]);
                    $paypal_data .= '&L_PAYMENTREQUEST_0_QTY' . $key . '=' . urlencode($item_qty[$key]);
                    if($item_color_name[$key] !="-" || $item_size_name[$key] !="-") {
                        $paypal_data .= '&L_PAYMENTREQUEST_0_DESC' . $key . '=' . urlencode("Color:" . $item_color_name[$key] . "-Size:" . $item_size_name[$key]);

                    }

                    // item price X quantity
                    $subtotal = ($item_price[$key] * $item_qty[$key]);
                    $shipping_amt = ($item_shipping[$key] * $item_qty[$key]);
                  
                    //create items for session
                    $paypal_product['items'][] = array(
                        'item_name' => $item_name[$key],
                        'item_price' => $item_price[$key],
                        'item_code' => $item_code[$key],
                        'item_qty' => $item_qty[$key],
                        'item_cash_pack' => $item_cash_pack[$key]
                        
                    );

                    $addr_line  = str_replace(',', ' ', Input::get('addr_line'));
                    $addr1_line = str_replace(',', ' ', Input::get('addr1_line'));
                    
                    $shipaddresscus = Input::get('fname') . ',' . $addr_line . ',' . $addr1_line . ',' . Input::get('state') . ',' . Input::get('zipcode' ) . ',' . Input::get('phone1_line') . ',' . Input::get('email') . ',' .Input::get('City') . ',' .Input::get('country');
                   //New Transaction id
                  // $transaction_id = str_random(17);
                  $customer_id = Session::get('customerid');
                    if(Session::get('coupon_product_id'.$product_code) == $product_code)
                    {
                        
                        $coupon_code            = Session::get('coupon_code'.$product_code);
                        $coupon_type            = Session::get('coupon_type'.$product_code);
                        $coupon_amount_type     = Session::get('coupon_amount_type'.$product_code);
                        $coupon_amount          = Session::get('coupon_amount'.$product_code);
                        $coupon_total_amount    = Session::get('coupon_total_amount'.$product_code);
                    }
                     else if(Session::get('coupon_type'.$customer_id) == 'usercoupon')
                    {
                        
                        $coupon_code            = Session::get('coupon_code');
                        $coupon_type            = Session::get('coupon_type'.$customer_id);
                        $coupon_amount_type     = Session::get('coupon_amount_type');
                       

                        /* Split the user coupon amoount per each order products */
                        $coupon_amount          = $userCoupon_per_product[$key];
                        $coupon_total_amount    = $userCoupon_Total_product[$key];

                        /* Split the user coupon amoount per each order products */

                    }
                    else
                    {
                        
                        $coupon_code = 0;
                        $coupon_type = 0;
                        $coupon_amount_type = 0;
                        $coupon_amount = 0;
                        $coupon_total_amount = 0;
                    }
                    
                   //if(Session::has('coupon_code') == 1){

                    $data = array(
                        'order_cus_id'          => Session::get('customerid'),
                        'order_pro_id'          => $item_code[$key],
                        'order_prod_unitPrice'  => $item_price[$key],
                        'order_type'            => $item_type[$key],
                        'order_qty'             => $item_qty[$key],
                        'order_amt'             => $subtotal,
                        'order_tax'             => $item_tax[$key],
                        'order_date'            => $now,
                        'order_status'          => 3,
                        'delivery_status'       => 1,
                        'order_paytype'         => '1',
                        'order_pro_color'       => $item_color[$key],
                        'order_pro_size'        => $item_size[$key],
                        'order_shipping_amt'    => $shipping_amt,
                        'order_shipping_add'    => $shipaddresscus,
                        'order_merchant_id'     => 0,
                        'coupon_code'           => $coupon_code,
                        'coupon_type'           => $coupon_type,
                        'coupon_amount_type'    => $coupon_amount_type,
                        'coupon_amount'         => $coupon_amount,
                        'coupon_total_amount'   => $coupon_total_amount,
                        'wallet_amount'         => $userWallet_per_product[$key],
                        'mer_commission_amt'    => 0,
                        'mer_amt'               => 0,
                        'order_taxAmt'          => $item_taxAmt[$key],
                        'tax_id_number'         => $tax_id_number,
                        'tax_type'              => $tax_type,
                    );

                    /* To store paypal order details after successfully payment  */
                    if (($_POST['item_type'][$key]) != 2) {
                       $order_prodAr[] = $data;
                    }else{
                        $order_dealAr[] = $data;
                    }

                    /* User Coupon unset after all products are inserted in order table. Because user coupon amount is splitted into all products in order  */

                    /*Session::forget('user_total_amount');
                    Session::forget('coupon_type'.$customer_id);
                    Session::forget('coupon_code');
                    Session::forget('coupon_amount_type');
                    Session::forget('coupon_amount');
                    Session::forget('coupon_total_amount');*/
                    Session::forget('coupon_product_id'.$product_code);
                    Session::forget('coupon_type'.$product_code);
                    Session::forget('coupon_code'.$product_code);
                    Session::forget('coupon_amount_type'.$product_code);
                    Session::forget('coupon_amount'.$product_code);
                    Session::forget('coupon_total_amount'.$product_code);
                    Session::forget('coupon_applied'.$product_code);
                    $coupon_amount_tot += $coupon_amount;
                } //foreach


                /* User Coupon unset */
                Session::forget('user_total_amount');
                Session::forget('coupon_type'.$customer_id);
                Session::forget('coupon_code');
                Session::forget('coupon_amount_type');
                Session::forget('coupon_amount');
                Session::forget('coupon_total_amount'); 
                
                /* To store paypal order details after successfully payment  */
                Session::put('orderedProducts', $order_prodAr);
                Session::put('orderedDeals', $order_dealAr);
                /* To store paypal order details after successfully payment  */
                 
                
                $data = array(
                            'ship_name' => Input::get('fname'),
                            'ship_address1' => Input::get('addr_line'),
                            'ship_address2' => Input::get('addr1_line'),
                            'ship_ci_id'=>  Input::get('City'),
                            'ship_state' => Input::get('state'),
                            'ship_country'=> Input::get('country'),
                            'ship_postalcode' => Input::get('zipcode'),
                            'ship_phone' => Input::get('phone1_line'),
                            'ship_email' => Input::get('email'),
                            'ship_cus_id' => $cust_id,
                            //'ship_order_id' => $new_insert,
                        );
                // Home::insert_shipping_addr($data, $cust_id);
                Session::put('orderedShippingAr', $data);
               
                 /* To store paypal order details after successfully payment only */
                //Session::put('last_insert_id', trim($insert_id, ','));
                  /* To store paypal order details after successfully payment only ends*/
                
                $product_total      = $product_total;
                $grand_total        = $price;

                //$wallet_used_amount = Input::get('wallet_used_amount');
                if(Session::has('wallet_used_amount'))
                {
                    $wallet_used_amount     = Session::get('wallet_used_amount');
                    $grand_total  -=$wallet_used_amount  ;
                }
                else
                    $wallet_used_amount     = 0;

                if($grand_total != 0)
                {
                    if(Session::get('wallet_status') == 'wallet applied'){

                        $wallet_amout = $wallet_used_amount; //so this wallet amount will be subtracted while calculating grand total
                        $ShippinDiscount = $wallet_amout;
                        //Shipping discount for this order. Specify this as negative number.0.00
                        $ShippinDiscount_tot  = 0;
                        if($coupon_amount_tot != '')
                        {
                            $ShippinDiscount_tot = $coupon_amount_tot;
                            
                        }
                        $ShippinDiscount += $ShippinDiscount_tot;
                        
                        $ShippinDiscount = -$ShippinDiscount;
                        
                    }else if($coupon_amount_tot != '')
                    {

                        $ShippinDiscount = -$coupon_amount_tot;
                        
                    }
                    else
                    {

                        $ShippinDiscount = 0.00; //Shipping discount for this order. Specify this as negative number.0.00
                    }
                    
                
                    
                        $ItemTotalPrice = ($product_total + $coupon_amount_tot); //+ $ShippinDiscount);
                        
                    //Grand total including all tax, insurance, shipping cost and discount

                    $GrandTotal = ($ItemTotalPrice + $TotalTaxAmount + $HandalingCost + $InsuranceCost + $ShippinCost + $ShippinDiscount ); //shipping discount is subtracting wallet
                  // $ItemTotalPrice = ($product_total); 
                   
                    $paypal_product['assets'] = array(
                        'ItemTotalPrice' => $ItemTotalPrice,
                        'tax_total' => $TotalTaxAmount,
                        'handaling_cost' => $HandalingCost,
                        'insurance_cost' => $InsuranceCost,
                        'shippin_discount' => $ShippinDiscount,
                        'shippin_cost' => $ShippinCost,
                        'grand_total' => $GrandTotal
                    );
                 
                    //create session array for later use
                    $_SESSION["paypal_products"] = $paypal_product;
                    //print_r($_SESSION["paypal_products"]);
                    // print_r($paypal_product);exit;
                    //Parameters for SetExpressCheckout, which will be sent to PayPal
                    $padata = '&METHOD=SetExpressCheckout' . '&RETURNURL=' . urlencode($PayPalReturnURL) . '&CANCELURL=' . urlencode($PayPalCancelURL) . '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") . $paypal_data . '&NOSHIPPING=0' . //set 1 to hide buyer's shipping address, in-case products that does not require shipping
                        '&PAYMENTREQUEST_0_ITEMAMT=' .urlencode($ItemTotalPrice). '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) . '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($ShippinCost) . '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($HandalingCost) . '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($ShippinDiscount) . '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($InsuranceCost) . '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) . '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode) . '&LOCALECODE=EN' . //PayPal pages to match the language on your website.
                       
                    //'&LOGOIMG=http://www.sanwebe.com/wp-content/themes/sanwebe/img/logo.png'. //site logo
                        '&CARTBORDERCOLOR=FFFFFF' . //border color of cart
                        '&ALLOWNOTE=1';
                       
                   //echo "<pre>";
                  // print_r($padata);
                   //exit;
                    //We need to execute the "SetExpressCheckOut" method to obtain paypal token
                    $paypal               = new MyPayPal();
                    $httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
                   
                  // echo "<pre>"; print_r($paypal_data);
                   
                  //  exit();
                    //Respond according to message we receive from Paypal
                    if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                        //Redirect user to PayPal store with Token received.
                        
                        $paypalurl = 'https://www' . $paypalmode . '.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $httpParsedResponseAr["TOKEN"] . '';
                        //header('Location: '.$paypalurl);
                        
                        echo '<script>window.location="' . $paypalurl . '"</script>';   
                    } else {
                        //Show error message
                        return Redirect::to('index');
                    }
                }else //Complete Wallet purchase
                {
                    $transaction_id  = 'ORDER'.time().str_random(6);
                    /* Store Paypal Order Details */
                    $this->paypalOrderInsert($transaction_id);
                    $new_insert = Session::get('last_insert_id');    
					$explod  = explode(',', $new_insert);
                    $customer_id = Session::get('customerid');
                      $data = array(
                            'transaction_id' => $transaction_id,
                            'order_paytype' => 2,
                            'order_status' => 1
                        );
                        $wallet_used_amount = Input::get('wallet_used_amount');
                        
                        $value = array(
                            'cod_transaction_id' => $transaction_id,
                            'wallet_used' => $wallet_used_amount,
                        );
                        DB::table('nm_ordercod_wallet')->insert($value);
                        
                        $amount_tot = DB::table('nm_customer')->where('cus_id', '=',Session::get('customerid'))->value('wallet');
                        
                        $amount =  $amount_tot - $wallet_used_amount;
                        
                        $amount = $amount + $item_cash_pack[$key];
                        
                        
                        
                        $cash_pack = array('wallet' => $amount);
                        Home::wallet_update($cash_pack);
                        foreach ($explod as $value) {

                        DB::table('nm_order')->where('order_id', '=', $value)->update($data);  
						}
                        if(Lang::has(Session::get('lang_file').'.BACK_YOUR_PAYMENT_HAS_BEEN_COMPLETED_SUCCESSFULLY')!= '') 
                        {
                            $session_message = trans(Session::get('lang_file').'.BACK_YOUR_PAYMENT_HAS_BEEN_COMPLETED_SUCCESSFULLY');
                        }
                        else
                        {
                            $session_message =  trans($this->OUR_LANGUAGE.'.BACK_YOUR_PAYMENT_HAS_BEEN_COMPLETED_SUCCESSFULLY');
                        }
                        if(Lang::has(Session::get('lang_file').'.BACK_YOUR_PAYMENT_SUCCESSFULLY_COMPLETED')!= '') 
                        {
                            $session_payment_ack__message = trans(Session::get('lang_file').'.BACK_YOUR_PAYMENT_SUCCESSFULLY_COMPLETED');
                        }
                        else
                        {
                            $session_payment_ack__message =  trans($this->OUR_LANGUAGE.'.BACK_YOUR_PAYMENT_SUCCESSFULLY_COMPLETED');
                        }
                        if(Lang::has(Session::get('lang_file').'.BACK_PAYMENT_ACKNOWLEDGEMENT')!= '') 
                        {
                            $payment_ack__message = trans(Session::get('lang_file').'.BACK_PAYMENT_ACKNOWLEDGEMENT');
                        }
                        else
                        {
                            $payment_ack__message =  trans($this->OUR_LANGUAGE.'.BACK_PAYMENT_ACKNOWLEDGEMENT');
                        }

                        include('SMTP/sendmail.php');
                        /*$emailsubject = $session_payment_ack__message;
                        $subject      = $payment_ack__message;
                        $name         = $data['payer_name'];
                        $transid      = $data['transaction_id'];
                        $payid        = $data['payer_id'];
                        $ack          = $data['payment_ack'];
                        $address      = "yamuna@nexplocindia.com";
                        
                        $resultmail   = "success";
                        ob_start();
                        include('Emailsub/paymentemail.php');
                        $body = ob_get_contents();
                        ob_clean();
                        Send_Mail($address, $subject, $body);*/
                        $currenttransactionorderid = base64_encode(Session::get('last_insert_id'));
                        /* Mail Functinality starts */
                
                        $trans = Session::get('last_insert_id');
                
                        $trans_id = Home::order_transaction_id($trans);
                        
                        $get_subtotal                = Home::get_order_subtotal_paypal($trans_id);
                        $get_tax                     = Home::get_order_tax_paypal($trans_id);
                        $get_shipping_amount         = Home::get_order_shipping_amount_paypal($trans_id);
                                            
                        //Customer Mail after order complete
                        
                        Mail::send('emails.ordermail-paypal', array(
                            'transaction_id' => $trans_id,
                            'Sub_total' =>  $get_subtotal,
                            'Tax' =>  $get_tax,
                            'Shipping_amount' =>  $get_shipping_amount), function($message) use ($data)
                        {
                            $customer_mail = Session::get("orderedShippingAr");
                            
                            $cus_mail      = $customer_mail['ship_email'];
                            
                            $message->to($cus_mail)->subject('Your Order Confirmation Details Placed Successfully');
                        });


                         //Merchant Mail after order complete
                        $merchant_trans_id = Home::get_PayPalOrd_merchant_based_transaction_id($trans_id);
                      
                        if(isset($merchant_trans_id) && $merchant_trans_id != "") {
                            foreach($merchant_trans_id as $mer=>$m) {
                                $merchant_id = '';
                                $product_id  = $m->order_pro_id;
                                $order_type  = $m->order_type;
                                $get_mer_subtotal = Home::get_PayPalOrd_mer_subtotal($trans_id,$merchant_id);
                                $get_mer_tax = Home::get_PayPalOrd_mer_tax($trans_id,$merchant_id);
                                $get_mer_shipping_amount = Home::get_PayPalOrd_mer_shipping_amount($trans_id,$merchant_id);
                                /*get merchant email id by sending merchant id from each iteration*/
                                /*$get_mer_email = Home::get_mer_email($merchant_id);*/

                                                        
                                $mer_email = $this->admin_email;
                                
                                $email = array('mer_email'=>$mer_email);
                                $data  = array_merge($data,$email);
                                
                                Mail::send('emails.orderPAYPAL-merchantmail', 
                                            array(
                                            'transaction_id' => $trans_id,
                                            'Sub_total' =>  $get_mer_subtotal,
                                            'Tax' =>  $get_mer_tax,
                                            'Shipping_amount' =>  $get_mer_shipping_amount,
                                            'merchant_id' => '',
                                            ), 
                                    function($message) use ($data){

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
               
                        /* Mail Functinality ends */

                 
                    /* Used in paypalOrderInsert()  */
                    Session::forget('orderedProducts');
                    Session::forget('orderedDeals');
                    Session::forget('orderedShippingAr');
                    unset($_SESSION['cart']);
                    unset($_SESSION['deal_cart']);   
                    Session::forget('wallet_used_amount');
                    /* Used in paypalOrderInsert() -unset ends */
                    //Delete saved cart details of the customer
                    Home::delete_cart_by_user_id(Session::get('customerid'))  ; 

                    return Redirect::to('show_wallet_result' . '/' . base64_encode($new_insert))->with('login_message','Your payment process successfully completed');
                    //return Redirect::to('index')->with('login_message','Your order placed successfully');
                }
            }
        } else { //IF COD
            /*Wallet cant be use For cod */
            $now            = date('Y-m-d h:i:sa');
            $insert_id      = '';
            $ItemTotalPrice = 0;
            foreach ($item_name as $key => $itemname) {
                    $product_code = $item_code[$key];
                    $f = 0;
                    $subtotal         = ($item_price[$key] * $item_qty[$key]); 
                $ItemTotalPrice = $ItemTotalPrice + $subtotal;
				$shipping_amt = ($item_shipping[$key] * $item_qty[$key]);
                $addr_line  = str_replace(',', ' ', Input::get('addr_line'));
                $addr1_line = str_replace(',', ' ', Input::get('addr1_line'));
                    
                $shipaddresscus = Input::get('fname') . ',' . $addr_line . ',' . $addr1_line . ',' . Input::get('state') . ',' . Input::get('zipcode' ) . ',' . Input::get('phone1_line') . ',' . Input::get('email') . ',' .Input::get('City') . ',' .Input::get('country');
                $customer_id = Session::get('customerid');
                if(Session::get('coupon_product_id'.$product_code) == $product_code)
                {
                    
                    $coupon_code            = Session::get('coupon_code'.$product_code);
                    $coupon_type            = Session::get('coupon_type'.$product_code);
                    $coupon_amount_type     = Session::get('coupon_amount_type'.$product_code);
                    $coupon_amount          = Session::get('coupon_amount'.$product_code);
                    $coupon_total_amount    = Session::get('coupon_total_amount'.$product_code);
                }
                 else if(Session::get('coupon_type'.$customer_id) == 'usercoupon')
                {
                    //Coupon only for product not for deal
                    if($item_type[$key]==1){
                        $coupon_code            = Session::get('coupon_code');
                        $coupon_type            = Session::get('coupon_type'.$customer_id);
                        $coupon_amount_type     = Session::get('coupon_amount_type');
                    }else{
                        $coupon_code            = 0;
                        $coupon_type            = 0;
                        $coupon_amount_type     = 0;
                    }
                    /* Split the user coupon amoount per each order products */
                    $coupon_amount          = $userCoupon_per_product[$key];
                    $coupon_total_amount    = $userCoupon_Total_product[$key];
                }
                else
                {
                    
                    $coupon_code = 0;
                    $coupon_type = 0;
                    $coupon_amount_type = 0;
                    $coupon_amount = 0;
                    $coupon_total_amount = 0;
                }
                 $PayPalCurrencyCode = $s->ps_curcode;
                
                // for COD No wallet now ;when wallet allowed on COD have to calculate
                $wallet_amount = 0; 

                $data           = array(
                    'cod_cus_id'            => Session::get('customerid'),
                    'cod_order_type'        => $item_type[$key],
                    'cod_pro_id'            => $product_code,
                    'cod_prod_unitPrice'    => $item_price[$key],
                    'cod_prod_actualprice' => $item_price_actual[$key],
                    'cod_qty'               => $item_qty[$key],
                    'cod_amt'               => $subtotal,
                    'cod_tax'               => $item_tax[$key],
                    'cod_date'              => $now,
                    'cod_status'            => 3,
                    'delivery_status'       => 1,
                    'cod_paytype'           => '0',
                    'cod_pro_color'         => $item_color[$key],
                    'cod_pro_size'          => $item_size[$key],
                    'cod_shipping_amt'      => $shipping_amt,
                    'cod_ship_addr'         => $shipaddresscus,
                    'cod_merchant_id'       => 0,
                    'coupon_code'           => $coupon_code,
                    'coupon_type'           => $coupon_type,
                    'coupon_amount_type'    => $coupon_amount_type,
                    'coupon_amount'         => $coupon_amount,
                    'coupon_total_amount'   => $coupon_total_amount,
                    'wallet_amount'         => $wallet_amount,
                    'mer_commission_amt'    => 0,
                    'mer_amt'               => 0,
                    'cod_taxAmt'            => $item_taxAmt[$key],
                    'tax_id_number'         => $tax_id_number,
                    'tax_type'              => $tax_type,
                     
                    );
                //print_r($data);exit();
                 $amount = DB::table('nm_customer')->where('cus_id', '=',Session::get('customerid'))->value('wallet');
                 
                 $amount = $amount + $item_cash_pack[$key];
                 $cash_pack = array('wallet' => $amount);
                

               if (($_POST['item_type'][$key]) != 2) {
                 
                   Home::purchased_checkout_product_insert($item_code[$key],$item_qty[$key]);
                }else{
                   Home::purchased_checkout_deal_insert($item_code[$key],$item_qty[$key]);
                }
                
                Home::wallet_update($cash_pack); 
                Home::cod_checkout_insert($data);

                $new_insert = DB::getPdo()->lastInsertId();
                $insert_id .= DB::getPdo()->lastInsertId().',';                
                Session::forget('coupon_product_id'.$product_code);
                Session::forget('coupon_type'.$product_code);
                Session::forget('coupon_code'.$product_code);
                Session::forget('coupon_amount_type'.$product_code);
                Session::forget('coupon_amount'.$product_code);
                Session::forget('coupon_total_amount'.$product_code);
                Session::forget('coupon_applied'.$product_code);
                
            }

            /* User Coupon unset */
            Session::forget('user_total_amount');
            Session::forget('coupon_type'.$customer_id);
            Session::forget('coupon_code');
            Session::forget('coupon_amount_type');
            Session::forget('coupon_amount');
            Session::forget('coupon_total_amount'); 

            Session::put('last_insert_id', trim($insert_id, ','));
             /*  Update Transaction ID */
            $explod  = explode(',', Session::get('last_insert_id'));
            $transaction_id = "ORDER".time().$new_insert;
            foreach ($explod as $value) {
                 Home::update_cod_transaction_id($value,$transaction_id);
            }
           

            //foreach
            //if (Input::get('load_ship') != 1) {
            $data_ship = array(
                'ship_name'         => Input::get('fname'),
                'ship_address1'     => Input::get('addr_line'),
                'ship_address2'     => Input::get('addr1_line'),
                'ship_ci_id'        => Input::get('City'),
                'ship_state'        => Input::get('state'),
                'ship_country'      => Input::get('country'),
                'ship_postalcode'   => Input::get('zipcode'),
                'ship_phone'        => Input::get('phone1_line'),
                'ship_cus_id'       => $cust_id,
                'ship_order_id'     => $new_insert,
                'ship_email'        => Input::get('email'),
                'ship_trans_id'     => $transaction_id
            );
            Home::insert_shipping_addr($data_ship, $cust_id);
            //} 
            
            if(Lang::has(Session::get('lang_file').'.YOUR_COD_PAYMENT_IS_SUCCESS')!= '') 
            {
                $session_message = trans(Session::get('lang_file').'.YOUR_COD_PAYMENT_IS_SUCCESS');
            }
            else 
            {
                $session_message =  trans($this->OUR_LANGUAGE.'.YOUR_COD_PAYMENT_IS_SUCCESS');
            }
            
            if(Lang::has(Session::get('lang_file').'.YOUR_COD_SUCCESSFULLY_REGISTERED')!= '') 
            {
                $email_subject_session_message = trans(Session::get('lang_file').'.YOUR_COD_SUCCESSFULLY_REGISTERED');
            }
            else 
            {
                $email_subject_session_message =  trans($this->OUR_LANGUAGE.'.YOUR_COD_SUCCESSFULLY_REGISTERED');
            }
            
            if(Lang::has(Session::get('lang_file').'.COD_ACKNOWLEDGEMENT')!= '') 
            {
                $subject_session_message = trans(Session::get('lang_file').'.COD_ACKNOWLEDGEMENT');
            }
            else 
            {
                $subject_session_message =  trans($this->OUR_LANGUAGE.'.COD_ACKNOWLEDGEMENT');
            }
            Session::flash('payment_success',$session_message);
            include('SMTP/sendmail.php');
            $emailsubject = $email_subject_session_message;
            $subject      = $subject_session_message;
            $name         = Session::get('username');
            $transid      = $transaction_id;
            $shipaddress  = $shipaddresscus;
            $address      = "";
            
            $resultmail   = "success";
            ob_start();
            include('Emailsub/paymentcod.php');
            $body = ob_get_contents();
            ob_clean();
            Send_Mail($address, $subject, $body);
            $trans = Session::get('last_insert_id');
            
            $trans_id = Home::transaction_id($trans);
            
            $get_subtotal                = Home::get_subtotal($trans_id);
            $get_tax                     = Home::get_tax($trans_id);
            $get_shipping_amount         = Home::get_shipping_amount($trans_id);
            
            $currenttransactionorderid   = base64_encode($trans_id);
                                            
            //Customer Mail after order complete
            Session::forget('wallet_used_amount');
            Mail::send('emails.ordermail', array(
                'transaction_id' => $trans_id,
                'Sub_total' =>  $get_subtotal,
                'Tax' =>  $get_tax,
                'Shipping_amount' =>  $get_shipping_amount), function($message) use ($data)
                {
                $customer_mail = $data['cod_ship_addr'];
                //$customer_mail = $shipaddresscus;
                $allpas        = explode(",", $customer_mail);
                $cus_mail      = $allpas[6];
                //echo $allpas[6]; 
                if(Lang::has(Session::get('lang_file').'.YOUR_ORDER_CONFIRMATION_DETAILS_PLACED_SUCCESSFULLY')!= '') 
                {
                    $subject_session_message = trans(Session::get('lang_file').'.YOUR_ORDER_CONFIRMATION_DETAILS_PLACED_SUCCESSFULLY');
                }
                else 
                {
                    $subject_session_message =  trans($this->OUR_LANGUAGE.'.YOUR_ORDER_CONFIRMATION_DETAILS_PLACED_SUCCESSFULLY');
                }
                $message->to($cus_mail)->subject($subject_session_message);
                });
                        
            //Merchant Mail after order complete
        
          $merchant_trans_id = Home::get_merchant_based_transaction_id($trans_id);
            if(isset($merchant_trans_id) && $merchant_trans_id != "") {
                foreach($merchant_trans_id as $mer=>$m) {
                    $merchant_id = '';
                    $product_id  = $m->cod_pro_id;
                    $order_type  = $m->cod_order_type;
                    $get_mer_subtotal = Home::get_mer_subtotal($trans_id,$merchant_id);
                    $get_mer_tax = Home::get_mer_tax($trans_id,$merchant_id);
                    $get_mer_shipping_amount = Home::get_mer_shipping_amount($trans_id,$merchant_id);
                           
                  /*  $mer_email = $get_mer_email[0]->mer_email;*/
                    $mer_email = $this->admin_email;
                    
                    $email = array('mer_email'=>$mer_email);
                    $data  = array_merge($data,$email);
                    
                    Mail::send('emails.order-merchantmail', array(
                        'transaction_id' => $trans_id,
                        'Sub_total' =>  $get_mer_subtotal,
                        'Tax' =>  $get_mer_tax,
                        'Shipping_amount' =>  $get_mer_shipping_amount,'merchant_id' => $merchant_id), function($message) use ($data){
                                $merchant_email = $data['mer_email'];
                        if(Lang::has(Session::get('lang_file').'.HI_MERCHANT_YOUR_PRODUCT_PURCHASED')!= '') 
                        {
                            $session_message = trans(Session::get('lang_file').'.HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
                        }
                        else 
                        {
                            $session_message =  trans($this->OUR_LANGUAGE.'.HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
                        }       
                        $message->to($merchant_email)->subject($session_message);
                    });
                }
            }
           unset($_SESSION['cart']);
           unset($_SESSION['deal_cart']);

            //Delete saved cart details of the customer
            Home::delete_cart_by_user_id(Session::get('customerid'))  ; 
            
           return Redirect::to('show_payment_result_cod' . '/' . $currenttransactionorderid)->with('result', $data);
            
        }
         
           
    }

    /* To store paypal order details after successfully payment */
    /*  store paypal order details */
    public function paypalOrderInsert($transaction_id){
        $insert_id  = '';
        if(Session::has('orderedProducts')){
            foreach (Session::get('orderedProducts') as $data){
                Home::purchased_checkout_product_insert($data['order_pro_id'],$data['order_qty']);
                Home::paypal_checkout_insert($data);
                $new_insert = DB::getPdo()->lastInsertId();
                $insert_id .= DB::getPdo()->lastInsertId() . ',';
            }
           
        } 
        if(Session::has('orderedDeals')){
            foreach (Session::get('orderedDeals') as $data){
                Home::purchased_checkout_deal_insert($data['order_pro_id'],$data['order_qty']);
                Home::paypal_checkout_insert($data);
                $new_insert = DB::getPdo()->lastInsertId();
                $insert_id .= DB::getPdo()->lastInsertId() . ',';
            }
           
        }                
        
        Session::put('last_insert_id', trim($insert_id, ','));  

        if(Session::has('orderedShippingAr')) {
                      $data = array_merge(Session::get('orderedShippingAr'),['ship_order_id' => $new_insert,'ship_trans_id'=>$transaction_id]);
            Home::insert_shipping_addr($data, Session::get('customerid'));
        }

        //Delete saved cart details of the customer
        Home::delete_cart_by_user_id(Session::get('customerid'))  ; 

       

    }
    public function productview1($mcid, $scid, $sbid, $id)
    {
        
        
        $sid = base64_decode($id);
        
        $product_id                   = base64_decode($id);
        $breadcrumb                   = Home::get_breadcrumb_category($sid);
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details1();

        $hit_count                     = Home::hit_count($product_id);
        $hit                          = ($hit_count[0]->hit_count)+1;
        $product_hit                  = Home::product_hit($product_id,$hit);

        $product_details_by_id        = Home::get_product_details_by_id($product_id);
        //product available or not
        if(count($product_details_by_id)<=0){
            $err_msge = 'Item Not Found';

            Session::flash('item_not_found',$err_msge);
            return Redirect::to('/');
        }  
        $product_color_details        = Home::get_selected_product_color_details($product_details_by_id);
        $product_size_details         = Home::get_selected_product_size_details($product_details_by_id);

        //Specfication details
        //$product_spec_details_old         = Home::get_selected_product_spec_details($product_details_by_id);
        
        //Specifiaction details displayed as group->specification->values hierarchy
        $prodSpecAr = $product_spec_details = array();
        $product_specGroupList        = Home::get_selected_product_spec_group($product_details_by_id);  
        if(count($product_specGroupList)>0){
            foreach ($product_specGroupList as $specGrp) {
                $product_spec_details[$specGrp->spg_id]  = Home::get_selected_product_spec_det_by_SpcGrp($specGrp->spg_id,$specGrp->spc_pro_id);

                
                if(count($product_spec_details[$specGrp->spg_id])>0){                   
                   
                    foreach ($product_spec_details[$specGrp->spg_id] as $prodSpec) {
                      
                        $prodSpecAr[$prodSpec->sp_id] = Home::get_selected_product_spec_det_by_Spc($specGrp->spg_id,$prodSpec->sp_id,$specGrp->spc_pro_id);
                       

                    }
                }
            }
        }

        $country_details              = Register::get_country_details();
        $get_related_product          = Home::get_related_product($sid);
        $most_visited_product         = Home::get_most_visited_product();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $one_count                    = Home::get_countone($product_id);
        $two_count                    = Home::get_counttwo($product_id);
        $three_count                  = Home::get_countthree($product_id);
        $four_count                   = Home::get_countfour($product_id);
        $five_count                   = Home::get_countfive($product_id);
        $count_review_rating          = Home::get_count_review_rating($product_id);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
         $review_details                = Home::get_product_review_details($product_id);
        $get_store                    = Home::get_prd_deatils($product_id);
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
       $general                      = Home::get_general_settings();
       $coupon_details              = Home::get_product_details_by_id_coupon($product_id);
       $customer_id                 = Session::get('customerid');


       if(count($coupon_details) > 0){
         $coupon_code                 = $coupon_details->coupon_code;
       
       $productview_check_coupon_purchase_count_cod = Coupon::productview_check_coupon_purchase_count_cod($coupon_code,$product_id);
       $productview_check_coupon_purchase_count_paypal = Coupon::productview_check_coupon_purchase_count_paypal($coupon_code,$product_id);
       $productview_check_coupon_purchase_count_cod_user = Coupon::productview_check_coupon_purchase_count_cod_user($coupon_code,$customer_id,$product_id);
       $productview_check_coupon_purchase_count_paypal_user = Coupon::productview_check_coupon_purchase_count_paypal_user($coupon_code,$customer_id,$product_id);
      
       }
      else{
        $productview_check_coupon_purchase_count_cod = '';
       $productview_check_coupon_purchase_count_paypal ='';
       $productview_check_coupon_purchase_count_cod_user = '';
       $productview_check_coupon_purchase_count_paypal_user = '';

      }
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
            //check current produt is in customer wishlist
            $prodInWishlist = Home::exist_wishlist($product_id,Session::get('customerid'));
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
             //check current produt is in customer wishlist
            $prodInWishlist  = array();
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('productview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('product_color_details', $product_color_details)->with('product_size_details', $product_size_details)->with('product_spec_details', $product_spec_details)->with('metadetails', $getmetadetails)->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('breadcrumb', $breadcrumb)->with('get_contact_det', $get_contact_det)->with('general',$general)->with('coupon_details',$coupon_details)->with('productview_check_coupon_purchase_count_cod',$productview_check_coupon_purchase_count_cod)->with('productview_check_coupon_purchase_count_paypal',$productview_check_coupon_purchase_count_paypal)->with('productview_check_coupon_purchase_count_cod_user',$productview_check_coupon_purchase_count_cod_user)->with('productview_check_coupon_purchase_count_paypal_user',$productview_check_coupon_purchase_count_paypal_user)
          // ->with('product_spec_details_old',$product_spec_details_old)
        ->with('product_specGroupList',$product_specGroupList)
        ->with('prodSpecAr',$prodSpecAr)
         ->with('prodInWishlist',$prodInWishlist)  
        ->with('count_review_rating',$count_review_rating)
        ->with('review_details',$review_details);
        
    }

    public function paypal_checkout_success()
    { 

        $set = Home::get_settings();
        if(isset($_SESSION["wallet_used_amount"])) { 
        $usewalletamount =$_SESSION["wallet_used_amount"];
        $actualwalletamount = DB::table('nm_customer')->where('cus_id', '=',Session::get('customerid'))->value('wallet');
        $new_amount = $actualwalletamount - $usewalletamount;
        if($new_amount<0){
            $new_amount=0;
        }
        $finaldata = array('wallet' => $new_amount);
        Home::wallet_final_update($finaldata);
        }
        foreach ($set as $se) {
        }
        if ($se->ps_paypal_pay_mode == '0') {
            $mode = 'sandbox';
        } elseif ($se->ps_paypal_pay_mode == '1') {
            $mode = 'live';
        }
       
        //session_start();
        $PayPalMode         = $mode; // sandbox or live
        $PayPalApiUsername  = $se->ps_paypalaccount;
        
        $PayPalApiPassword  = $se->ps_paypal_api_pw;
        
        $PayPalApiSignature = $se->ps_paypal_api_signature;
       
        $PayPalCurrencyCode = $se->ps_curcode; //Paypal Currency Code
        $PayPalReturnURL    = url('paypal_checkout_success'); //Point to process.php page
        
        $PayPalCancelURL    = url('paypal_checkout_cancel'); //Cancel URL if user clicks cancel
        require 'paypal/paypal.class.php';
        if (isset($_GET["token"]) && isset($_GET["PayerID"])) {
            //we will be using these two variables to execute the "DoExpressCheckoutPayment"
            //Note: we haven't received any payment yet.
            
            $token    = $_GET["token"];
            $payer_id = $_GET["PayerID"];
            //get session variables
            $paypal_product = $_SESSION["paypal_products"];
            $paypal_data    = '';
            $ItemTotalPrice = 0;
            
            foreach ($paypal_product['items'] as $key => $p_item) {
                $paypal_data .= '&L_PAYMENTREQUEST_0_QTY' . $key . '=' . urlencode($p_item['item_qty']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_AMT' . $key . '=' . urlencode($p_item['item_price']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_NAME' . $key . '=' . urlencode($p_item['item_name']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER' . $key . '=' . urlencode($p_item['item_code']);
                // item price X quantity
                $subtotal = ($p_item['item_price'] * $p_item['item_qty']);
                //total price
                $ItemTotalPrice = ($ItemTotalPrice + $subtotal);
                if($p_item['item_cash_pack']!="") {
                    $amount1 = DB::table('nm_customer')->where('cus_id', '=',Session::get('customerid'))->value('wallet');
                    $amount = $amount1 + $p_item['item_cash_pack'];
                    $cash_pack = array('wallet' => $amount);
                    Home::wallet_update($cash_pack);
                }
            }
            $padata = '&TOKEN=' . urlencode($token) . '&PAYERID=' . urlencode($payer_id) . '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") . $paypal_data . '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($paypal_product['assets']['ItemTotalPrice']) . '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($paypal_product['assets']['tax_total']) . '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($paypal_product['assets']['shippin_cost']) . '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($paypal_product['assets']['handaling_cost']) . '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($paypal_product['assets']['shippin_discount']) . '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($paypal_product['assets']['insurance_cost']) . '&PAYMENTREQUEST_0_AMT=' . urlencode($paypal_product['assets']['grand_total']) . '&PAYMENTREQUEST_0_CURRENCYCODE='. urlencode($PayPalCurrencyCode);
            
            //We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
            $paypal               = new MyPayPal();
            $httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
            
            //Check if everything went ok..
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                $transaction_id= urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
                //echo '<h2>Success</h2>';
               // echo 'Your Transaction ID : ' . urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
                
                /*
                //Sometimes Payment are kept pending even when transaction is complete. 
                //hence we need to notify user about it and ask him manually approve the transiction
                */
                
                if ('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                    /* if(Lang::has(Session::get('lang_file').'.PAYMENT_RECEIVED_YOUR_PRODUCT_WILL_BE_SENT_TO_YOU_VERY_SOON')!= '') 
                    {
                        $session_message = trans(Session::get('lang_file').'.PAYMENT_RECEIVED_YOUR_PRODUCT_WILL_BE_SENT_TO_YOU_VERY_SOON');
                    }
                    else
                    {
                        $session_message =  trans($this->OUR_LANGUAGE.'.PAYMENT_RECEIVED_YOUR_PRODUCT_WILL_BE_SENT_TO_YOU_VERY_SOON');
                    } */
                    //echo '<div style="cosession_messagelor:green">'.$session_message.'</div>';
                    
                } elseif ('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                   
                }
                
                // we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
                // GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
                $padata               = '&TOKEN=' . urlencode($token);
                $paypal               = new MyPayPal();
                $httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
                
                if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                   
                    $data = array(
                        'transaction_id' => urldecode($httpParsedResponseAr['PAYMENTREQUEST_0_TRANSACTIONID']),
                        'token_id' => urldecode($httpParsedResponseAr['TOKEN']),
                        'payer_email' => urldecode($httpParsedResponseAr['EMAIL']),
                        'payer_id' => urldecode($httpParsedResponseAr['PAYERID']),
                        'payer_name' => urldecode($httpParsedResponseAr['FIRSTNAME']),
                        'currency_code' => urldecode($httpParsedResponseAr['PAYMENTREQUEST_0_CURRENCYCODE']),
                        'payment_ack' => urldecode($httpParsedResponseAr['ACK']),
                        'payer_status' => urldecode($httpParsedResponseAr['PAYERSTATUS']),
                        'order_status' => 1,
                        'order_paytype' => 1
                   );

                    /* Store Paypal Order Details */
                    $this->paypalOrderInsert($transaction_id);

                
                    Home::paypal_checkout_update($data, Session::get('last_insert_id'));
                   /* $ship_trans_id = array(
                        'ship_trans_id' => $transaction_id
                    );
                    $explod  = explode(',', Session::get('last_insert_id'));
                    if(count($explod)>0){
                        foreach ($explod as $value) {
                            Home::paypal_trans_id($ship_trans_id,$value);
                        }
                    }
                    */
                    
                    
                    // Wallet amount add in customer pack via paypal checkout
                     //print_r($_SESSION["wal_amount"]);
                    // print_r($data);
                    //die();
                    if (isset($_SESSION["wallet_used_amount"]))
                    {
                    $walletuse_amount=$_SESSION["wallet_used_amount"];
                    $wallet_final_used_amount=array('cod_transaction_id'=>$transaction_id,'wallet_used'=>$walletuse_amount);
                    Home::wallet_order_used_update($wallet_final_used_amount);
                    }
                    
                    // end
                    /*unset($_SESSION['cart']);
                    unset($_SESSION['deal_cart']);*/
                    if(Lang::has(Session::get('lang_file').'.YOUR_PAYMENT_HAS_BEEN_COMPLETED_SUCCESSFULLY')!= '') 
                    {
                        $session_message = trans(Session::get('lang_file').'.YOUR_PAYMENT_HAS_BEEN_COMPLETED_SUCCESSFULLY');
                    }
                    else
                    {
                        $session_message =  trans($this->OUR_LANGUAGE.'.YOUR_PAYMENT_HAS_BEEN_COMPLETED_SUCCESSFULLY');
                    }
                    if(Lang::has(Session::get('lang_file').'.YOUR_PAYMENT_SUCCESSFULLY_COMPLETED')!= '') 
                    {
                        $session_payment_ack__message = trans(Session::get('lang_file').'.YOUR_PAYMENT_SUCCESSFULLY_COMPLETED');
                    }
                    else
                    {
                        $session_payment_ack__message =  trans($this->OUR_LANGUAGE.'.YOUR_PAYMENT_SUCCESSFULLY_COMPLETED');
                    }
                    if(Lang::has(Session::get('lang_file').'.PAYMENT_ACKNOWLEDGEMENT')!= '') 
                    {
                        $payment_ack__message = trans(Session::get('lang_file').'.PAYMENT_ACKNOWLEDGEMENT');
                    }
                    else
                    {
                        $payment_ack__message =  trans($this->OUR_LANGUAGE.'.PAYMENT_ACKNOWLEDGEMENT');
                    }
                    Session::flash('payment_success',$session_message);
                    include('SMTP/sendmail.php');
                    $emailsubject = $session_payment_ack__message;
                    $subject      = $payment_ack__message;
                    $name         = $data['payer_name'];
                    $transid      = $data['transaction_id'];
                    $payid        = $data['payer_id'];
                    $ack          = $data['payment_ack'];
                    $address      = "";
                    
                    $resultmail   = "success";
                    ob_start();
                    include('Emailsub/paymentemail.php');
                    $body = ob_get_contents();
                    ob_clean();
                    Send_Mail($address, $subject, $body);
                    $currenttransactionorderid = base64_encode(Session::get('last_insert_id'));
            /* Mail Functinality starts */
            
                    $trans = Session::get('last_insert_id');
            
                    $trans_id = Home::order_transaction_id($trans);
                    
                    $get_subtotal                = Home::get_order_subtotal_paypal($trans_id);
                    $get_tax                     = Home::get_order_tax_paypal($trans_id);
                    $get_shipping_amount         = Home::get_order_shipping_amount_paypal($trans_id);
                                        
                                        
                    //Customer Mail after order complete
                    
                     Mail::send('emails.ordermail-paypal', array(
                        'transaction_id' => $trans_id,
                        'Sub_total' =>  $get_subtotal,
                        'Tax' =>  $get_tax,
                        'Shipping_amount' =>  $get_shipping_amount), function($message) use ($data)
                    {
                        $customer_mail = Session::get("orderedShippingAr");
                        
                        $cus_mail      = $customer_mail['ship_email'];
                        
                        $message->to($cus_mail)->subject('Your Order Confirmation Details Placed Successfully');
                    });


                     //Merchant Mail after order complete
                    $merchant_trans_id = Home::get_PayPalOrd_merchant_based_transaction_id($trans_id);
                  
                    if(isset($merchant_trans_id) && $merchant_trans_id != "") {
                        foreach($merchant_trans_id as $mer=>$m) {
                            $merchant_id = '';
                            $product_id  = $m->order_pro_id;
                            $order_type  = $m->order_type;
                            $get_mer_subtotal = Home::get_PayPalOrd_mer_subtotal($trans_id,$merchant_id);
                            $get_mer_tax = Home::get_PayPalOrd_mer_tax($trans_id,$merchant_id);
                            $get_mer_shipping_amount = Home::get_PayPalOrd_mer_shipping_amount($trans_id,$merchant_id);

                          /*  $mer_email = $get_mer_email[0]->mer_email;*/
                            $mer_email = $this->admin_email;
                            $email = array('mer_email'=>$mer_email);
                            $data  = array_merge($data,$email);

                                
                            Mail::send('emails.orderPAYPAL-merchantmail', array(
                                'transaction_id' => $trans_id,
                                'Sub_total' =>  $get_mer_subtotal,
                                'Tax' =>  $get_mer_tax,
                                'Shipping_amount' =>  $get_mer_shipping_amount,'merchant_id' => $merchant_id), function($message) use ($data){
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
           
                    /* Mail Functinality ends */

                    /* Used in paypalOrderInsert()  */
                    Session::forget('orderedProducts');
                    Session::forget('orderedDeals');
                    Session::forget('orderedShippingAr');
                    Session::forget('wallet_used_amount');
                    unset($_SESSION['cart']);
                    unset($_SESSION['deal_cart']);   
                    /* Used in paypalOrderInsert() -unset ends */
                    //Delete saved cart details of the customer
                    Home::delete_cart_by_user_id(Session::get('customerid'))  ; 
                    
                    //unset($_SESSION['wallet_used_amount']);
                    return Redirect::to('show_payment_result' . '/' . $currenttransactionorderid)->with('result', $data);
                } else {
                    if(Lang::has(Session::get('lang_file').'.YOUR_PAYMENT_HAS_BEEN_FAILED')!= '') 
                    {
                        $session_message = trans(Session::get('lang_file').'.YOUR_PAYMENT_HAS_BEEN_FAILED');
                    }
                    else
                    {
                        $session_message =  trans($this->OUR_LANGUAGE.'.YOUR_PAYMENT_HAS_BEEN_FAILED');
                    }

                    /** No need to clear session because customer can use after payment method to payment atfer returning to cart page **/

                    /*unset($_SESSION['cart']);
                    unset($_SESSION['deal_cart']);*/

                    /* Used in paypalOrderInsert()  */
                    Session::forget('orderedProducts');
                    Session::forget('orderedDeals');
                    Session::forget('orderedShippingAr');
                    Session::forget('wallet_used_amount');
                    unset($_SESSION['cart']);
                    unset($_SESSION['deal_cart']);   
                    /* Used in paypalOrderInsert() -unset ends */

                     //Delete saved cart details of the customer
                    Home::delete_cart_by_user_id(Session::get('customerid'))  ; 

                   // unset($_SESSION['wallet_used_amount']);
                    Session::flash('payment_failed', $session_message);
                    $currenttransactionorderid = base64_encode(0);
                    return Redirect::to('show_payment_result' . '/' . $currenttransactionorderid)->with('fail', "fail");
                }
                
            } else {
                 /** No need to clear session because customer can use after payment method to payment atfer returning to cart page **/

                /*unset($_SESSION['cart']);
                unset($_SESSION['deal_cart']);*/
                unset($_SESSION['wallet_used_amount']);
                if(Lang::has(Session::get('lang_file').'.SOME_ERROR_OCCURED_DURING_PAYMENT')!= '') 
                {
                    $session_message = trans(Session::get('lang_file').'.SOME_ERROR_OCCURED_DURING_PAYMENT');
                }
                else
                {
                    $session_message =  trans($this->OUR_LANGUAGE.'.SOME_ERROR_OCCURED_DURING_PAYMENT');
                }
                //Session::flash('payment_error', $session_message);
                //return Redirect::to('index');
                Session::flash('cartSessionMsge', $session_message);
                
                return Redirect::to('cart');
            }
        }
    }

    public function paypal_checkout_cancel()
    {
        /** No need to clear session because customer can use after payment method to payment atfer returning to cart page **/

        /*unset($_SESSION['cart']);
        unset($_SESSION['deal_cart']);*/
        if(Lang::has(Session::get('lang_file').'.YOUR_PAYMENT_HAS_BEEN_CANCELLED')!= '') 
        {
            $session_message = trans(Session::get('lang_file').'.YOUR_PAYMENT_HAS_BEEN_CANCELLED');
        }
        else
        {
            $session_message =  trans($this->OUR_LANGUAGE.'.YOUR_PAYMENT_HAS_BEEN_CANCELLED');
        }
        /*Session::flash('payment_cancel', $session_message);
        return Redirect::to('index');*/
        Session::flash('cartSessionMsge', $session_message);
                
         return Redirect::to('cart');
        
    }
    
    public function bid_payment()
    {
        $bid_price  = Input::get('bid_update_value');
        $bid_auc_id = Input::get('auction_bid_proid_popup');
        $return_url = Input::get('return_url');
        if (Session::get('customerid')) {
            $customerid = Session::get('customerid');
        } else {
            $customerid = 0;
        }
        $customerdetails             = Customerprofile::get_customer_details($customerid);
        $get_social_media_url        = Home::get_social_media_url();
        $cms_page_title              = Home::get_cms_page_title();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_acution_details         = Home::get_action_details_by_id($bid_auc_id);
        $getlogodetails              = Home::getlogodetails();
        $getmetadetails              = Home::getmetadetails();
        $get_contact_det             = Footer::get_contact_details();
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        $footer                      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('getanl', $getanl);
        
        return view('bid_payment')->with('footer', $footer)->with('get_image_logoicons_details', $get_image_logoicons_details)->with('get_acution_details', $get_acution_details)->with('price', $bid_price)->with('customerdetails', $customerdetails)->with('return_url', $return_url)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
        
    }

    public function place_bid_payment()
    {
        
        $bid_price        = Input::get('bid_amt');
        $bid_auc_id       = Input::get('auction_bid_proid_popup');
        $bid_auc_shipping = Input::get('bid_shipping');
        $return_url       = Input::get('return_url');
        $entry            = array(
            'oa_pro_id' => Input::get('oa_pro_id'),
            'oa_cus_id' => Input::get('oa_cus_id'),
            'oa_cus_name' => Input::get('oa_cus_name'),
            'oa_cus_email' => Input::get('oa_cus_email'),
            'oa_cus_address' => Input::get('oa_cus_address'),
            'oa_bid_amt' => Input::get('oa_bid_amt'),
            'oa_bid_shipping_amt' => Input::get('bid_shipping'),
            'oa_original_bit_amt' => Input::get('oa_original_bit_amt')
        );
        
        Home::save_bidding_details($entry);
        $get_social_media_url        = Home::get_social_media_url();
        $cms_page_title              = Home::get_cms_page_title();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_acution_details         = Home::get_action_details_by_id($bid_auc_id);
        $getlogodetails              = Home::getlogodetails();
        $getmetadetails              = Home::getmetadetails();
        $get_contact_det             = Footer::get_contact_details();
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        $footer                      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('getanl', $getanl);
        
        return view('place_bid_payment')->with('footer', $footer)->with('get_image_logoicons_details', $get_image_logoicons_details)->with('get_acution_details', $get_acution_details)->with('price', $bid_price)->with('return_url', $return_url)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
        
    }
    
    public function bid_payment_error()
    {
        if(Lang::has(Session::get('lang_file').'.ERROR_ALREADY_AUCTION_HAS_BID_TRY_WITH_NEW_AMOUNT')!= '') 
        {
            $session_message = trans(Session::get('lang_file').'.ERROR_ALREADY_AUCTION_HAS_BID_TRY_WITH_NEW_AMOUNT');
        }
        else
        {
            $session_message =  trans($this->OUR_LANGUAGE.'.ERROR_ALREADY_AUCTION_HAS_BID_TRY_WITH_NEW_AMOUNT');
        }
        return Redirect::to('index')->with('error',$session_message);
    }

    public function show_payment_result_cod($orderid) //cod order success page
    {
        
        $cust_id = Session::get('customerid');
        
        $converorderid = base64_decode($orderid);
        $getorderdetails              = Home::getordercoddetails($converorderid);
    
        $get_subtotal                 = Home::get_subtotal($converorderid);
        $get_tax                      = Home::get_tax($converorderid);
        $get_shipping_amount          = Home::get_shipping_amount($converorderid); //no need this
       
        //common
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
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
       $general                      = Home::get_general_settings();
        
        $country_details = Register::get_country_details();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
       
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('paymentresultcod')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('addetails', $addetails)->with('noimagedetails', $noimagedetails)->with('bannerimagedetails', $getbannerimagedetails)->with('metadetails', $getmetadetails)->with('orderdetails', $getorderdetails)->with('get_contact_det', $get_contact_det)->with('get_subtotal', $get_subtotal)->with('get_tax', $get_tax)->with('get_shipping_amount', $get_shipping_amount)->with('general',$general);
    }
    
    public function show_payment_result($orderid) //paypal order success page
    { 
        
        $cust_id = Session::get('customerid');
        
        $converorderid = base64_decode($orderid);
        
        $getorderdetails = Home::getorderdetails($converorderid);
        
        //common
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
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
      
        $get_contact_det              = Footer::get_contact_details();
        $country_details              = Register::get_country_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
      
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('paymentresult')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('addetails', $addetails)->with('noimagedetails', $noimagedetails)->with('bannerimagedetails', $getbannerimagedetails)->with('get_meta_details', $getmetadetails)->with('orderdetails', $getorderdetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    public function show_wallet_result($orderid) //paypal order success page
    {
       
        $cust_id = Session::get('customerid');
        
        $converorderid = base64_decode($orderid);
        
        $getorderdetails = Home::getorderdetails($converorderid);
        
        //common
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
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
      
        $get_contact_det              = Footer::get_contact_details();
        $country_details              = Register::get_country_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
      
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('walletresult')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('addetails', $addetails)->with('noimagedetails', $noimagedetails)->with('bannerimagedetails', $getbannerimagedetails)->with('get_meta_details', $getmetadetails)->with('orderdetails', $getorderdetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
    

    public function register()
    {	 
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_deals_details();
      //  $auction_details              = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
		$women_product                = Home::get_women_product();
		$get_product_details_abovefifty = Home::get_product_details_abovefifty();
        $most_popular_product           = Home::get_popular_product();
		$dealsof_day_details          = Home::dealsof_day_details();
		$get_product_details_belowfifty = Home::get_product_details_belowfifty();

		
		  if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
		
	    $header         = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer         = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $country_return = AdminModel::get_country_detail();
        $roles = Role::all();

		
		 if (Session::has('customerid')) {
			 
			  return Redirect::to('index');
		
		
		 } else { 
       
        return view('register',compact('roles'))->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('country_details', $country_return)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
		
		 }
		
    }

    public function register_submit(Request $request)
    {
       
        $data = Input::except(array(
            '_token'
        ));
        $date        = date('Y-m-d');
        $cemail      = Input::get('email');
        $check_email = Register::check_email_ajax($cemail);

        if (count($check_email)>0) {
            if(Lang::has(Session::get('lang_file').'.ALREADY_EMAIL_EXIST')!= '') 
            {
                $session_message = trans(Session::get('lang_file').'.ALREADY_EMAIL_EXIST');
            }
            else
            {
                $session_message =  trans($this->OUR_LANGUAGE.'.ALREADY_EMAIL_EXIST');
            }
            return Redirect::to('registers')->with('mail_exist',$session_message)->withInput();
        } else {
            
            $cname = Input::get('customername');
            $cemail = Input::get('email');
            $cpwd      = Input::get('pwd');
            $cus_phone = Input::get('mobile');
            $pwd       = md5($cpwd);
            $city = Input::get('select_city');
//            $role_id = Input::get('select_role');
            $country = Input::get('select_country');
            
            $this->validate($request, 
            [
                'customername'=>'Required',
                'email'=>'Required|Email|Regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
                'pwd'=>'Required|min:6',
                'mobile'=>'Required|Numeric|Regex:/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s.]{0,1}[0-9]{3}[-\s.]{0,1}[0-9]{4}$/',
                'select_country'=>'Required',
                'select_city'=>'Required',
            ]);
            
            Mail::send('emails.registermail', array(
                'first_name' => Input::get('email'),
                'cus_name' => Input::get('customername'),
                'password' => $cpwd
            ), function($message)
            { 
                if(Lang::has(Session::get('lang_file').'.YOUR_REGISTER_ACCOUNT_WAS_CREATED_SUCCESSFULLY')!= '') 
                { 
                    $session_message = trans(Session::get('lang_file').'.YOUR_REGISTER_ACCOUNT_WAS_CREATED_SUCCESSFULLY');
                }
                else
                {
                    $session_message =  trans($this->OUR_LANGUAGE.'.YOUR_REGISTER_ACCOUNT_WAS_CREATED_SUCCESSFULLY');
                }
                $message->to(Input::get('email'))->subject($session_message);
            }); 
            
            $address = Input::get('email');
                        
            $entry = array(
                'cus_name' => Input::get('customername'),
                'cus_email' => Input::get('email'),
                'cus_pwd' => $pwd,
                'cus_phone' => Input::get('mobile'),
                'cus_country' => Input::get('select_country'),
                'cus_city' => Input::get('select_city'),
                'cus_logintype' => 2,
                'ship_name'=> Input::get('customername'),
                'ship_address1'=> '',
                'ship_address2'=> '',
                'ship_ci_id' => Input::get('select_city'),
                'ship_state'=> '',
                'ship_country' => Input::get('select_country'),
                'ship_postalcode' => '',
                'ship_phone' => Input::get('mobile'),
                'ship_email'=> Input::get('email'),
                'created_date' => $date
            );
            
            $customerid = Register::insert_customer($entry);
            /*
            $entry_shipping = array(
                
                'ship_name' => Input::get('customername'),
                
                'ship_ci_id' => Input::get('select_city'),
                
                'ship_country' => Input::get('select_country'),
                
                'ship_cus_id' => $customerid
                
            );
            
            Register::insert_customer_shipping($entry_shipping);*/
        }

        if(Lang::has(Session::get('lang_file').'.REGISTERED_SUCCESSFULLY')!= '') 
        {
            $session_message = trans(Session::get('lang_file').'.REGISTERED_SUCCESSFULLY');
        }
        else
        {
            $session_message =  trans($this->OUR_LANGUAGE.'.REGISTERED_SUCCESSFULLY');
        }
        return Redirect::to('registers')->with('success',$session_message);

        
    }
    
    public function newsletter()
    {
        
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_deals_details();
       // $auction_details              = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
       
        $header         = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer         = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);

        return view('newsletter')->with('navbar', $navbar)
            ->with('header', $header)
            ->with('footer', $footer)
            ->with('header_category', $header_category)
            ->with('get_product_details_by_cat', $get_product_details_by_cat)
            ->with('most_visited_product', $most_visited_product)
            ->with('category_count', $category_count)
            ->with('get_product_details_typeahed', $get_product_details_typeahed)
            ->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)
            ->with('second_main_category', $second_main_category)
            ->with('second_sub_main_category', $second_sub_main_category)
            ->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }

    public function subscription_submit()
    {
        $data = Input::except(array(
            '_token'
        ));
        
        $email       = Input::get('email');
        $check_email = Register::check_email_ajaxs($email);
        if (count($check_email)>0) {
            if(Lang::has(Session::get('lang_file').'.ALREADY_USE_EMAIL_EXIST')!= '') 
            {
                $session_message = trans(Session::get('lang_file').'.ALREADY_USE_EMAIL_EXIST');
            }
            else
            {
                $session_message =  trans($this->OUR_LANGUAGE.'.ALREADY_USE_EMAIL_EXIST');
            }
            return Redirect::to('newsletter')->with('Error_letter', $session_message);
        } else {
            $email = Input::get('email');
            Mail::send('emails.subscription_mail', array(
                'email' => Input::get('email')
            ), function($message)
            {
                if(Lang::has(Session::get('lang_file').'.EMAIL_HAS_BEEN_SUBSCRIPTION_SUCCESSFULLY')!= '') 
                {
                    $session_message = trans(Session::get('lang_file').'.EMAIL_HAS_BEEN_SUBSCRIPTION_SUCCESSFULLY');
                }
                else
                {
                    $session_message =  trans($this->OUR_LANGUAGE.'.EMAIL_HAS_BEEN_SUBSCRIPTION_SUCCESSFULLY');
                }
                $message->to(Input::get('email'))->subject($session_message);
            });
            $entry = array(
                
                'email' => Input::get('email')
            );
            $email = Register::insert_email($entry);
        }
        if(Lang::has(Session::get('lang_file').'.YOUR_EMAIL_SUBSCRIBED_SUCCESSFULLY')!= '') 
        {
            $session_message = trans(Session::get('lang_file').'.YOUR_EMAIL_SUBSCRIBED_SUCCESSFULLY');
        }
        else
        {
            $session_message =  trans($this->OUR_LANGUAGE.'.YOUR_EMAIL_SUBSCRIBED_SUCCESSFULLY');
        }
        return Redirect::to('newsletter')->with('subscribe',$session_message);
    }

    public function compare()
    {
        return view('compare');
    }

    public function addtowish()
    {
        $data = Input::except(array(
            '_token'
        ));
        
        $pro_id                       = Input::get('pro_id');
        $cus_id                       = Input::get('cus_id');
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $entry                        = array(
            
            'ws_pro_id' => Input::get('pro_id'),
            'ws_cus_id' => Input::get('cus_id')
        );
        $check = Home::check_wishlist($pro_id,$cus_id);
        if($check==0){
            $wish       = Register::insert_wish($entry);
            echo 0;
           // return Redirect::to('user_profile')->with('wish', 'Product Added in Your Wishlist');
        }elseif($check!=0){
            echo 1;
           // return Redirect::to('user_profile')->with('wish', 'Product Already exists in Your Wishlist');
        }
        
        
    }

    public function productcomments()
    {
        
        $data = Input::except(array(
            '_token'
        ));
        
        $customer_id = Input::get('customer_id');
        
        $product_id = Input::get('product_id');
        $title      = Input::get('title');
        $comments   = Input::get('comments');
        $ratings    = Input::get('ratings');
      
        $entry = array(
         'customer_id' => Input::get('customer_id'),
            
            'product_id' => Input::get('product_id'),
            'title' => Input::get('title'),
            'comments' => Input::get('comments'),
            'ratings' => Input::get('ratings'),
            'status' => 1,
        );
        
        $comments = Home::comment_insert($entry);
        if(Lang::has(Session::get('lang_file').'.YOUR_PRODUCT_REVIEW_POST_SUCCESSFULLY')!= '') 
        {
            $session_message = trans(Session::get('lang_file').'.YOUR_PRODUCT_REVIEW_POST_SUCCESSFULLY');
        }
        else
        {
            $session_message =  trans($this->OUR_LANGUAGE.'.YOUR_PRODUCT_REVIEW_POST_SUCCESSFULLY');
        }
        return Redirect::back()->with('success1',$session_message);
        
    }

    public function dealcomments()
    {
        
        $data = Input::except(array(
            '_token'
        ));
        
        $customer_id = Input::get('customer_id');
        
        $deal_id  = Input::get('deal_id');
        $title    = Input::get('title');
        $comments = Input::get('comments');
        $ratings  = Input::get('ratings');
        
        $entry = array(
          'customer_id' => Input::get('customer_id'),
            
            'deal_id' => Input::get('deal_id'),
            'title' => Input::get('title'),
            'comments' => Input::get('comments'),
            'ratings' => Input::get('ratings'),
            'status' => 1
        );
        
        $comments = Home::comment_insert($entry);
        if(Lang::has(Session::get('lang_file').'.YOUR_DEAL_PRODUCT_REVIEW_POST_SUCCESSFULLY')!= '') 
        {
            $session_message = trans(Session::get('lang_file').'.YOUR_DEAL_PRODUCT_REVIEW_POST_SUCCESSFULLY');
        }
        else
        {
            $session_message =  trans($this->OUR_LANGUAGE.'.YOUR_DEAL_PRODUCT_REVIEW_POST_SUCCESSFULLY');
        }
        return Redirect::back()->with('success',$session_message);
        
    }

    public function storecomments()
    {
        
        $data = Input::except(array(
            '_token'
        ));
        
        $customer_id = Input::get('customer_id');
        
        $store_id = Input::get('store_id');
        $title    = Input::get('title');
        $comments = Input::get('comments');
        $ratings  = Input::get('ratings');
        if($ratings=='')
        {
         $ratings=0;   
        }
        $entry = array(
        'customer_id' => Input::get('customer_id'),
            
            'store_id' => Input::get('store_id'),
            'title' => Input::get('title'),
            'comments' => Input::get('comments'),
            'ratings' => $ratings,
           
        );
        
        $comments = Home::comment_insert($entry);
        if(Lang::has(Session::get('lang_file').'.YOUR_DEAL_STORE_REVIEW_POST_SUCCESSFULLY')!= '') 
        {
            $session_message = trans(Session::get('lang_file').'.YOUR_DEAL_STORE_REVIEW_POST_SUCCESSFULLY');
        }
        else
        {
            $session_message =  trans($this->OUR_LANGUAGE.'.YOUR_DEAL_STORE_REVIEW_POST_SUCCESSFULLY');
        }
        return Redirect::back()->with('success_store',$session_message);
        
    }

    public function smtp_mail_settings()
    {
        
        $smtp_mail = Home::get_smtp_mail();
        
        return view('app/config/mail')->with('smtp_mail', $smtp_mail);
    }
    
    public function productList()
    {
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $women_product                = Home::get_women_product();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_deals_details();
      //  $auction_details              = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        // $laravel = app();
        // echo "Laravel Version : ".$laravel::VERSION;
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('category_list_all')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deals_details', $deals_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('addetails', $addetails)->with('noimagedetails', $noimagedetails)->with('bannerimagedetails', $getbannerimagedetails)->with('metadetails', $getmetadetails)->with('women_product', $women_product)->with('get_contact_det', $get_contact_det)->with('general', $general);
      
    }
/*Set user select language*/
    public function new_change_languages()
    {
        
        $lang_code = Input::get('language_code');
        
        Session::put('lang_code',$lang_code);
        
        Session::put('lang_file',Session::get('lang_code').'_lang');
        
        

    }

    public function updateUserCart_bySave_cart(){
        /* User Cart session update by save_cart table data starts */
        /* Add  cart Product */
        $get_cart_prodDetails = Home::get_product_cart_by_userid(Session::has('customerid'),'1');
        if(count($get_cart_prodDetails)>0)
        {
            $max = count($get_cart_prodDetails);
            $i = 0;

            foreach($get_cart_prodDetails as $cartProd ){
                $prod_data = Home::get_product_details_by_id($cartProd->cart_product_id);
                if(count($prod_data)>0){
                    foreach ($prod_data as $prdData) {}


                    /* check product valid and available with size and color of same product */

                    $dataAr = array('prod_id'   => $cartProd->cart_product_id,
                                    'mc_id'     => $prdData->pro_mc_id,
                                    'smc_id'    => $prdData->pro_smc_id,
                                    'sb_id'     =>$prdData->pro_sb_id,
                                    'ssb_id'    =>$prdData->pro_ssb_id,
                                    'qty'       => $cartProd->cart_product_qty,
                                    'color'     => $cartProd->cart_pro_col_id,
                                    'size'      => $cartProd->cart_pro_siz_id,
                                    );
                    //print_r($dataAr);exit();
                    $checkProdValid = Home::getCartProdValid($dataAr);    
                    
                    if(count($checkProdValid)>0){
                        $_SESSION['cart'][$i]['productid'] = $cartProd->cart_product_id;
                        $_SESSION['cart'][$i]['qty']       = $cartProd->cart_product_qty;
                        $_SESSION['cart'][$i]['color']     = $cartProd->cart_pro_col_id;
                        $_SESSION['cart'][$i]['size']      = $cartProd->cart_pro_siz_id;
                        $_SESSION['cart'][$i]['type']      = $cartProd->cart_type;
                        $_SESSION['cart'][$i]['cartTabID'] = $cartProd->cart_id;
                        $session_result                    = '';

                    }else{
                        /* remove from cart table */
                        Home::delete_cart_by_id($cartProd->cart_id,'1');
                    }
                    $i++;
                }    
                
            }
        }
        /* Add  cart deal */
        $get_cart_dealDetails = Home::get_product_cart_by_userid(Session::has('customerid'),'2');
        if(count($get_cart_dealDetails)>0)
        {
            $max = count($get_cart_dealDetails);
            $i = 0;

            foreach($get_cart_dealDetails as $cartDeal ){
                $prod_data = Home::get_deals_details_by_id($cartDeal->cart_deal_id);
                if(count($prod_data)>0){
                    foreach ($prod_data as $prdData) {}


                    /* check product valid and available with size and color of same product */

                    $dataAr = array('prod_id'   => $cartDeal->cart_deal_id,
                                    'mc_id'     => $prdData->deal_category,
                                    'smc_id'    => $prdData->deal_main_category,
                                    'sb_id'     =>$prdData->deal_sub_category,
                                    'ssb_id'    =>$prdData->deal_second_sub_category,
                                    'qty'       => $cartDeal->cart_product_qty,
                                    'color'     => $cartDeal->cart_pro_col_id,
                                    'size'      => $cartDeal->cart_pro_siz_id,
                                    );
                    //print_r($dataAr);exit();
                    $checkProdValid = Home::getCartDealValid($dataAr);    
                    //print_r($checkProdValid );exit();
                    if(count($checkProdValid)>0){
                        $_SESSION['deal_cart'][$i]['productid'] = $cartDeal->cart_deal_id;
                        $_SESSION['deal_cart'][$i]['qty']       = $cartDeal->cart_product_qty;
                        //$_SESSION['deal_cart'][$i]['color']     = $cartDeal->cart_pro_col_id;
                       // $_SESSION['deal_cart'][$i]['size']      = $cartDeal->cart_pro_siz_id;
                        $_SESSION['deal_cart'][$i]['type']      = $cartDeal->cart_type;
                        $_SESSION['deal_cart'][$i]['cartTabID'] = $cartDeal->cart_id;
                        $session_result                    = '';

                    }else{
                        /* remove from cart table */
                        Home::delete_cart_by_id($cartDeal->cart_id,'2');
                    }
                    $i++;
                }    
                
            }
        }
        /* User Cart session update by save_cart table data ends */
    }

    /****  
    **  Merchant overall order details start **
    **  table contains all merchant orders totals;  **
    **  this is used for commission payment process     **

    ****/
  
    public function unvailabilityofCart()
    {
        $unavailable_prodID = $unavailable_dealID = array();
        $unavailable        = 0; 

        if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
            $pro_title = 'pro_title';
            $deal_title = 'deal_title';
        }else {  
            $pro_title = 'pro_title_'.Session::get('lang_code');
            $deal_title = 'deal_title_'.Session::get('lang_code');
        }


        /* check cart product and deal availablity */
        if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $cart) {
                $checkProductAvailablity = Home::get_availableProductQuantity($cart['productid'],$cart['qty']);
                if(count($checkProductAvailablity)<=0)
                {
                    $proTitle = DB::table('nm_product')->select($pro_title)->where('pro_id','=',$cart['productid'])->first();
                    if(count($proTitle)>0)
                        $new_proTitle = $proTitle->$pro_title;
                    else
                        $new_proTitle ='';
                    $unavailable_prodID[]  =array('productid' => $cart['productid'],'qty' => $cart['qty'] ,'pro_title' => $new_proTitle);
                    $unavailable++;
                } 
            }
        }
        if(isset($_SESSION['deal_cart'])){
            foreach ($_SESSION['deal_cart'] as $cart) {
                $checkProductAvailablity = Home::get_availableDealQuantity($cart['productid'],$cart['qty']);
                if(count($checkProductAvailablity)<=0)
                {
                    $proTitle = DB::table('nm_deals')->select($deal_title)->where('deal_id','=',$cart['productid'])->first();
                    if(count($proTitle)>0)
                        $new_proTitle = $proTitle->$deal_title;
                    else
                        $new_proTitle ='';
                    $unavailable_dealID[]  =array('productid' => $cart['productid'],'qty' => $cart['qty'] ,'pro_title' => $new_proTitle);
                    $unavailable++;
                } 
            }
        }

        

        /* check cart product and deal availablity ends */
        $unavail_title ='';
        if($unavailable>0){
            
            if(!empty($unavailable_prodID)){
                foreach ($unavailable_prodID as $unavailableProd) {
                    $unavail_title .= $unavailableProd['pro_title'];
                }
            }
            if(!empty($unavailable_dealID)){
               foreach ($unavailable_dealID as $unavailableProd) {
                    $unavail_title .= $unavailableProd['pro_title'];
                }
            }
            if (Lang::has(Session::get('lang_file').'.PRODUCT_QUANTITY_NOT_AVAILABLE')!= '') { 
                $session_result     =   trans(Session::get('lang_file').'.PRODUCT_QUANTITY_NOT_AVAILABLE');}  
            else {  $session_result =   trans($OUR_LANGUAGE.'.PRODUCT_QUANTITY_NOT_AVAILABLE');}
            $session_result .=' ('.$unavail_title.')';

           return $session_result;
        }else{
            return '';
        }

    }
    
  //get city name based on country name
  
   public function register_getcityname_ajax($id="")
    {
		
     
        $id = $_GET['id'];
        $city_name = $_GET['city'];
        
		
         if (Session::has('customerid')) {

        $customerid  = Session::get('customerid');
		//$customerdetails  = Register::get_customer_details($customerid);
											}

		 
        $city_det = Home::get_city_name_ajax($id);
		      
        if ($city_det) {
            
            $return = "";
            $return .= "<option value=''>";
            

             $return .="--Select City--</option>"; 


            foreach ($city_det as $city_det_ajax) {
				
			    $set_selected = '';
			    if (Session::has('customerid')) {
				if($city_det_ajax->ci_name==$city_name) {
                $set_selected = 'selected';
					}
				}
			
                if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
					$ci_name = 'ci_name';
				}else {  $ci_name = 'ci_name_'.Session::get('lang_code'); }
									
                 $return .= "<option value='" . $city_det_ajax->ci_name . "' ".$set_selected." >" . $city_det_ajax->$ci_name."</option>";
                
            }
            
            echo $return;
            
        }
        
        else {
			if(Lang::has(Session::get('lang_file').'.NO_DATAS_FOUND')!= '') 
			{
				$session_message = trans(Session::get('lang_file').'.NO_DATAS_FOUND');
			}
			else 
			{
				$session_message =  trans($this->OUR_LANGUAGE.'.NO_DATAS_FOUND');
			}
            
            echo $return = "<option value='0'>".$session_message."</option>";
            
        }
             
    }  

    
	 /* Google-login  Hide for future purpose */
	public function google_login()
	{
		if(isset($_GET['code'])) {
			try {
				// Get the access token 
				$data = $this->GetAccessToken(GM_CLIENT_ID, GM_CLIENT_REDIRECT_URL, GM_CLIENT_SECRET, $_GET['code']);
				// Get user information
				$user_info = $this->GetUserProfileInfo($data['access_token']);

				$user_email=$user_info['emails'][0]['value'];
				$user_name= $user_info['displayName'];
				$google_id=$user_info['id'];

				if($user_name){
					$login_session=
					array('cus_pwd'=>$user_name,
					'cus_email'=>$user_email,
					'google_id'=>$google_id,
					'cus_name'=>$user_name,
					'cus_logintype'=>4);
				}

				$google_check = Home::google_login_check($google_id,$user_email,$login_session);
				/*echo $google_check['status'].'<br>';
				
				print_r($google_check['gmail_details1']);
				echo '<hr>'.$google_check['gmail_details1'][0]->cus_name;
				exit;*/
				//return Redirect::to('index');
				if($google_check['status']=='success1')
				{
					Session::put('username',$google_check['gmail_details1'][0]->cus_name);
					Session::put('user_name',$google_check['gmail_details1'][0]->cus_name);
					Session::put('customerid',$google_check['gmail_details1'][0]->cus_id);
					Session::put('googleid',$google_check['gmail_details1'][0]->google_id);
					/*MAIL SECTION */
					$send_mail_data = array('first_name' => $user_email,'cus_name'=>$user_name,'password'=>$user_name);
					Mail::send('emails.registermail',$send_mail_data, function($message) use ($send_mail_data){
						
						if(Lang::has(Session::get('lang_file').'.LOGIN_SUCCESSFULLY')!= '') 
						{ 
							$session_message = trans(Session::get('lang_file').'.LOGIN_SUCCESSFULLY');
						}  
						else 
						{ 
							$session_message =  trans($this->OUR_LANGUAGE.'.LOGIN_SUCCESSFULLY');
						}
						$message->to($send_mail_data['first_name'])->subject($session_message);
						Session::put('login_message',$session_message);
					});
					/* EOF MAIL SECTION */
					return Redirect::to('/');
				}elseif($google_check['status']=='success'){
					Session::put('username',$google_check['gmail_details1'][0]->cus_name);
					Session::put('user_name',$google_check['gmail_details1'][0]->cus_name);
					Session::put('customerid',$google_check['gmail_details1'][0]->cus_id);
					Session::put('googleid',$google_check['gmail_details1'][0]->google_id);
					if(Lang::has(Session::get('lang_file').'.LOGIN_SUCCESSFULLY')!= '') 
					{ 
						$session_message = trans(Session::get('lang_file').'.LOGIN_SUCCESSFULLY');
					}  
					else 
					{ 
						$session_message =  trans($this->OUR_LANGUAGE.'.LOGIN_SUCCESSFULLY');
					}
					Session::put('login_message',$session_message);
					return Redirect::to('/');
				}
				else{
					return $google_check['status'];
				}
			}
			catch(Exception $e) {
			echo $e->getMessage();
			exit();
			}
		}
	}


   public function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {  
        $url = 'https://accounts.google.com/o/oauth2/token';            
        $curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';
     
		$ch = curl_init();      
        curl_setopt($ch, CURLOPT_URL, $url);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        
        curl_setopt($ch, CURLOPT_POST, 1);      
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);    
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);    
 	
        if($http_code != 200) 
            throw new Exception('Error : Failed to receieve access token');
            
        return $data;
    }

    public function GetUserProfileInfo($access_token) { 
        $url = 'https://www.googleapis.com/plus/v1/people/me';          
        $ch = curl_init();      
        curl_setopt($ch, CURLOPT_URL, $url);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);     
        if($http_code != 200) 
            throw new Exception('Error : Failed to get user information');
            
        return $data;
    }
   
}


   

