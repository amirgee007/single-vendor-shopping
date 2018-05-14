<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Lang;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Serviceslisting;
use App\Footer;
use App\Settings;
use App\Merchant;
use App\Coupon;
use MyPayPal;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ServicelistingController extends Controller
{

    public function service_types(){
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();

        $service_types                = Serviceslisting::service_types();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('service_types')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('service_types', $service_types)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }

    public function services($type_id){
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();

        $service_datas                = Serviceslisting::service_datas($type_id);
        $serv_duration                = Serviceslisting::get_service_duration();

        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('services')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('service_datas', $service_datas)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general',$general)
        ->with('serv_duration',$serv_duration);
    }




    ///
    public function services_listing($store_id)
    {
       
        //$location_id                  = 1;  // it get from session
        $store_id                     = base64_decode($store_id);
        $header_category              = Home::get_header_category();
        
        $service_details              = Serviceslisting::get_service_details($store_id);    //get service details based on store 
        $service_timings              = Serviceslisting::get_service_time();
        $serv_duration                = Serviceslisting::get_service_duration();
        
        //$cnt_service_cart             = Serviceslisting::get_service_cart_cnt();
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
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        $day_id = date('w')+1;
        $get_working_day              = Home::get_working_day($store_id,$day_id);
        if(Session::has('customerid')){
            $customer_id                    = Session::get('customerid');
            $service_cart_details         = Serviceslisting::get_service_cart_details($customer_id);
        }else{
            $service_cart_details = '';
        }

        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('services')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)
        ->with('service_cart_details',$service_cart_details)
        //->with('cnt_service_cart',$cnt_service_cart)
        ->with('store_id',$store_id)->with('service_details', $service_details)->with('service_timings',$service_timings)->with('serv_duration',$serv_duration)
        ->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('get_working_day',$get_working_day);
        
    }

    public function servicelisting_submit(){
         
        if(Session::has('customerid')){
            $customer_id     = Session::get('customerid');
            $service_id      = Input::get('service_id');
           
            $check_avail_in_cart = Serviceslisting::check_avail_in_cart($customer_id,$service_id);
            if($check_avail_in_cart!=0){
				if(Lang::has(Session::get('lang_file').'.ALREADY_EXISTS_IN_CART')!= '') 
				{
					$session_message = trans(Session::get('lang_file').'.BACK_ADD_CITY');
				}
				else 
				{
					$session_message =  trans($this->OUR_LANGUAGE.'.BACK_ADD_CITY');
				}				//if already exists in cart return back
                return redirect::back()->with('message',$session_message);
            }else{      
                $store_id        = Input::get('store_id');
                $service_type_id = Input::get('service_type_id');
                $duration_id     = Input::get('duration_id');
                $datas = array(
                'service_cart_customer_id'     => $customer_id, 
                'service_cart_service_id'      => $service_id,
                'service_cart_store_id'        => $store_id,
                'service_cart_service_type_id' => $service_type_id,
                'service_cart_duration_id'     => $duration_id
                );
                
                $add_to_cart     = Serviceslisting::add_to_cart($datas);
            
                if($add_to_cart){
					if(Lang::has(Session::get('lang_file').'.ADDED_TO_CART_SUCCESSFULLY')!= '') 
					{
						$session_message = trans(Session::get('lang_file').'.ADDED_TO_CART_SUCCESSFULLY');
					}
					else 
					{
						$session_message =  trans($this->OUR_LANGUAGE.'.ADDED_TO_CART_SUCCESSFULLY');
					}
                    return redirect::back()->with('message',$session_message);
                }else{
					if(Lang::has(Session::get('lang_file').'.ADD_TO_CART_FAILED_DUE_TO_SOME_ERROR')!= '') 
					{
						$session_message = trans(Session::get('lang_file').'.ADD_TO_CART_FAILED_DUE_TO_SOME_ERROR');
					}
					else 
					{
						$session_message =  trans($this->OUR_LANGUAGE.'.ADD_TO_CART_FAILED_DUE_TO_SOME_ERROR');
					}
                    return redirect::back()->with('message',$session_message);
                }
            }   // else
        }else{  //if not having customer id
			if(Lang::has(Session::get('lang_file').'.LOGIN_TO_PROCEED')!= '') 
			{
				$session_message = trans(Session::get('lang_file').'.LOGIN_TO_PROCEED');
			}
			else 
			{
				$session_message =  trans($this->OUR_LANGUAGE.'.LOGIN_TO_PROCEED');
			}
            return redirect::back()->with('message',$session_message);
        }
       
   } //servicelisting_submit 

   public function store_terms_condition($store_id){

        $terms_condition     = Serviceslisting::store_terms_condition($store_id);
        $city_details        = Register::get_city_details();
        $header_category     = Home::get_header_category();
        //$cms_page_title      = Home::get_cms_page_title();
        $get_category_header = Home::get_category_header();
        
        $get_social_media_url        = Footer::get_social_media_url();
        $get_contact_det              = Footer::get_contact_details();
        $country_details             = Register::get_country_details();
        $get_meta_details            = Home::get_meta_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $general                      = Home::get_general_settings();
        $getanl                       = Settings::social_media_settings();
        
        $getlogodetails = Home::getlogodetails();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        }
        $header     = view('includes.header')->with('header_category', $header_category)->with('get_category_header', $get_category_header)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        $footer     = view('includes.footer')->with('getanl', $getanl)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det',$get_contact_det);
       // $cms_result = Footer::fetch_front_cms_details($id);
        return view('store_terms_condition')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('general',$general)->with('terms_condition',$terms_condition);
   
   }

} //class