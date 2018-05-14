<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Request;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Footer;
use App\Settings;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class FooterController extends Controller
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
        // set frontend language
        $this->setLanguageLocaleFront();
    }

    //Front Pages Details
    
    public function get_front_cms_pages($id)
    {
        $city_details        = Register::get_city_details();
        $header_category     = Home::get_header_category();
        $cms_page_title      = Home::get_cms_page_title();
        $get_category_header = Home::get_category_header();
        $get_social_media_url        = Footer::get_social_media_url();
        $country_details             = Register::get_country_details();
        $get_meta_details            = Home::get_meta_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $general                      = Home::get_general_settings();
        $getlogodetails = Home::getlogodetails();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        }
        $header     = view('includes.header')->with('header_category', $header_category)->with('get_category_header', $get_category_header)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        $footer     = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url);
        $cms_result = Footer::fetch_front_cms_details($id);
        return view('pages')->with('cms_result', $cms_result)->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('general',$general);
    }
    
    public function get_faq()
    {
        $city_details                = Register::get_city_details();
        $header_category             = Home::get_header_category();
        $cms_page_title              = Home::get_cms_page_title();
        //	$get_category_header  = Home::get_category_header();
        //$get_more_category_header  = Home::get_more_category_header();
		$get_contact_det             = Footer::get_contact_details();
		
        $get_social_media_url        = Footer::get_social_media_url();
        $get_meta_details            = Home::get_meta_details();
        $country_details             = Register::get_country_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $general                      = Home::get_general_settings();
        $getlogodetails = Home::getlogodetails();
		$getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
		 $faq_deatils = Footer::get_faq_details();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        }
       
        $header      = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        $footer      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)
		->with('getanl', $getanl);
       
		
        return view('faq')->with('faq_result', $faq_deatils)->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('general',$general)->with('get_contact_det', $get_contact_det);
    }
    
    public function termsandconditons()
    {
        $city_details                = Register::get_city_details();
        $header_category             = Home::get_header_category();
        $cms_page_title              = Home::get_cms_page_title();
        $get_social_media_url        = Footer::get_social_media_url();
        $get_meta_details            = Home::get_meta_details();
        $country_details             = Register::get_country_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_contact_det             = Footer::get_contact_details();
        $getlogodetails              = Home::getlogodetails();
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        }
        
        $header      = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        $footer      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $faq_deatils = Footer::get_termsandconditons_details();
        return view('terms')->with('cms_result', $faq_deatils)->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
    public function help()
    {
        $city_details                = Register::get_city_details();
        $header_category             = Home::get_header_category();
        $cms_page_title              = Home::get_cms_page_title();
        $get_social_media_url        = Footer::get_social_media_url();
        $get_meta_details            = Home::get_meta_details();
        $country_details             = Register::get_country_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_contact_det             = Footer::get_contact_details();
        $getlogodetails              = Home::getlogodetails();
        
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        }
        
        $header       = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        $footer       = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $faq_deatils  = Footer::get_faq_details();
        $help_deatils = Footer::get_help_details();
        return view('help')->with('faq_result', $faq_deatils)->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('cms_result', $help_deatils)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
    public function blog()
    {
        $city_details                = Register::get_city_details();
        $header_category             = Home::get_header_category();
        $cms_page_title              = Home::get_cms_page_title();
        $get_social_media_url        = Footer::get_social_media_url();
        $get_meta_details            = Home::get_meta_details();
        $country_details             = Register::get_country_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_blog_list               = Footer::get_blog_list();
        $get_blog_list_count         = Footer::get_blog_list_count($get_blog_list);
        $get_blog_list_cat_name      = Footer::get_blog_list_cat_name($get_blog_list);
        $get_blog_list_popular       = Footer::get_blog_list_popular();
        $get_blog_comment_check      = Footer::get_blog_comment_check();
        $get_contact_det             = Footer::get_contact_details();
        $getlogodetails              = Home::getlogodetails();
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        }
        
        $header      = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        $footer      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $faq_deatils = Footer::get_faq_details();
        return view('blog')->with('faq_result', $faq_deatils)->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('getheader_category', $header_category)->with('get_blog_list', $get_blog_list)->with('get_blog_list_popular', $get_blog_list_popular)->with('get_blog_comment_check', $get_blog_comment_check)->with('get_social_media_url', $get_social_media_url)->with('get_blog_list_count', $get_blog_list_count)->with('get_blog_list_cat_name', $get_blog_list_cat_name)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
    public function blog_category($id)
    {
        $city_details                = Register::get_city_details();
        $header_category             = Home::get_header_category();
        $cms_page_title              = Home::get_cms_page_title();
        $get_social_media_url        = Footer::get_social_media_url();
        $get_meta_details            = Home::get_meta_details();
        $country_details             = Register::get_country_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_blog_list               = Footer::get_blog_list_by_category($id);
        $get_blog_list_count         = Footer::get_blog_list_count($get_blog_list);
        $get_blog_list_popular       = Footer::get_blog_list_popular();
        $get_blog_comment_check      = Footer::get_blog_comment_check();
        $get_blog_list_cat_name      = Footer::get_blog_list_cat_name($get_blog_list);
        $get_contact_det             = Footer::get_contact_details();
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        $getlogodetails              = Home::getlogodetails();

        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        }
        
        $header      = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        $footer      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $faq_deatils = Footer::get_faq_details();
        return view('blog')->with('faq_result', $faq_deatils)->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('getheader_category', $header_category)->with('get_blog_list', $get_blog_list)->with('get_blog_list_popular', $get_blog_list_popular)->with('get_blog_comment_check', $get_blog_comment_check)->with('get_social_media_url', $get_social_media_url)->with('get_blog_list_count', $get_blog_list_count)->with('get_blog_list_cat_name', $get_blog_list_cat_name)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
    public function blog_view($id)
    {
        $city_details                = Register::get_city_details();
        $header_category             = Home::get_header_category();
        $cms_page_title              = Home::get_cms_page_title();
        $get_social_media_url        = Footer::get_social_media_url();
        $get_meta_details            = Home::get_meta_details();
        $country_details             = Register::get_country_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_blog_list               = Footer::get_blog_list_by_id($id);
        $get_blog_list_count         = Footer::get_blog_list_count($get_blog_list);
        $get_blog_comment_check      = Footer::get_blog_comment_check();
        $get_blog_list_popular       = Footer::get_blog_list_popular();
        $get_blog_list_cat_name      = Footer::get_blog_list_cat_name($get_blog_list);
        $get_contact_det             = Footer::get_contact_details();
        $getlogodetails              = Home::getlogodetails();
        $getanl                      = Settings::social_media_settings();
        $general                     = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        }
        
        $header = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        
        $footer      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $faq_deatils = Footer::get_faq_details();
        return view('blog_view')->with('faq_result', $faq_deatils)->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('getheader_category', $header_category)->with('get_blog_list', $get_blog_list)->with('get_blog_list_popular', $get_blog_list_popular)->with('get_social_media_url', $get_social_media_url)->with('get_blog_comment_check', $get_blog_comment_check)->with('get_blog_list_count', $get_blog_list_count)->with('get_blog_list_cat_name', $get_blog_list_cat_name)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
    public function blog_comment($id)
    {
        $city_details                = Register::get_city_details();
        $header_category             = Home::get_header_category();
        $cms_page_title              = Home::get_cms_page_title();
        $get_social_media_url        = Footer::get_social_media_url();
        $get_meta_details            = Home::get_meta_details();
        $country_details             = Register::get_country_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_blog_list               = Footer::get_blog_list_by_id($id);
        $get_blog_list_count         = Footer::get_blog_list_count($get_blog_list);
        $get_blog_comment_check      = Footer::get_blog_comment_check();
        $get_blog_list_popular       = Footer::get_blog_list_popular();
        $get_blog_list_cat_name      = Footer::get_blog_list_cat_name($get_blog_list);
        $get_blog_cus_cmt            = Footer::get_blog_cus_cmt($id);
        $get_admin_reply             = Footer::get_admin_reply();
        $get_contact_det             = Footer::get_contact_details();
        $getlogodetails              = Home::getlogodetails();
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        }
        
        $header = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        
        $footer      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $faq_deatils = Footer::get_faq_details();
        return view('blog_comment')->with('faq_result', $faq_deatils)->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('getheader_category', $header_category)->with('get_blog_list', $get_blog_list)->with('get_blog_list_popular', $get_blog_list_popular)->with('get_social_media_url', $get_social_media_url)->with('get_blog_comment_check', $get_blog_comment_check)->with('get_blog_list_count', $get_blog_list_count)->with('get_blog_list_cat_name', $get_blog_list_cat_name)->with('get_blog_cus_cmt', $get_blog_cus_cmt)->with('get_admin_reply', $get_admin_reply)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
    
    public function blog_comment_submit()
    {
        $inputs = Input::all();
        $data   = Input::except(array(
            '_token'
        ));
        $rule   = array(
            'name' => 'required',
            'email' => 'required|email',
            //'website' => 'required|url',
            'message' => 'required'
        );
        
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            if (Input::get('cmt_page') == 1) {
                return Redirect::to('blog_view/' . Input::get('cmt_id'))->withErrors($validator->messages())->withInput();
            } else if (Input::get('cmt_page') == 2) {
                return Redirect::to('blog_comment/' . Input::get('cmt_id'))->withErrors($validator->messages())->withInput();
            }
        } else {
            $date = date('Y-m-d H:i:s');
            $entry         = array(
                'cmt_blog_id' => Input::get('cmt_id'),
                'cmt_name' => Input::get('name'),
                'cmt_email' => Input::get('email'),
                'cmt_website' => Input::get('website'),
                'cmt_msg' => Input::get('message'),
                'cmt_date'=> $date
            );
            $insert_result = Footer::insert_blog_cmt($entry);
            
            if (Input::get('check_cmt_approval') == 1) {
			if (Lang::has(Session::get('lang_file').'.YOUR_COMMENTS_WILL_BE_SHOWN_AFTER_ADMIN_APPROVAL')!= '') 
			{
 					$session_message =  trans(Session::get('lang_file').'.YOUR_COMMENTS_WILL_BE_SHOWN_AFTER_ADMIN_APPROVAL');
			}  
			else 
			{
					$session_message =  trans($this->OUR_LANGUAGE.'.YOUR_COMMENTS_WILL_BE_SHOWN_AFTER_ADMIN_APPROVAL');
			}
                return Redirect::to('blog_comment/' . Input::get('cmt_id'))->with('success',$session_message);
            }else{
                return Redirect::to('blog_comment/' . Input::get('cmt_id'));
            }
            /*if (Input::get('cmt_page') == 1) {
                return Redirect::to('blog_view/' . Input::get('cmt_id'))->with('success', 'Your comments will be shown after admin approval.');
            } else if (Input::get('cmt_page') == 2) {
                return Redirect::to('blog_comment/' . Input::get('cmt_id'))->with('success', 'Your comments will be shown after admin approval.');
            }*/
            
        }
        
    }
    
    
    public function contactus()
    {
        
        $city_details                = Register::get_city_details();
        $header_category             = Home::get_header_category();
        $cms_page_title              = Home::get_cms_page_title();
        $get_social_media_url        = Footer::get_social_media_url();
       $country_details             = Register::get_country_details();
        $get_meta_details            = Home::get_meta_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_contact_det             = Footer::get_contact_details();
        $getanl                      = Settings::social_media_settings();
        $getlogodetails              = Home::getlogodetails();
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            
            $navbar = view('includes.navbar')->with('country_details', $country_details)
            ->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl)->with('getanl', $getanl);
        
        return view('contactus')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
    public function enquiry_submit()
    {
		
        $get_contact_det             = Footer::get_contact_details();

		if($get_contact_det[0]->es_contactemail!="") 
			
		$email_contact=$get_contact_det[0]->es_contactemail; 
		
		//$email_contact = 'suganya@pofitec.com';
		
		else $email_contact='jacampbell2010@gmail.com'; 
		
        $data = Input::except(array(
            '_token'
        ));
        
        $inputs = Input::all();
        $data   = Input::except(array(
            '_token'
        ));
		// custom error message for valid_captcha validation rule
		$messages  = [
		  'valid_captcha' => 'Wrong code. Try again please.'
		];
        $rule   = array(
            'name' => 'required',
            'email' => 'required|email',
            //'website' => 'required|url',
            'message' => 'required',
			'CaptchaCode' => 'required|valid_captcha'
        );
        
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
             return Redirect::back()->withErrors($validator); 
        } else {


            $name = Input::get('name');
            
            $email = Input::get('email');
            
            $phone = Input::get('phone');
            
            $message = filter_var(Input::get('message'),FILTER_SANITIZE_STRING);
            //$message = strip_tags(Input::get('message'));
                 
            $entry = array(
                   
                'name' => Input::get('name'),
                'email' => Input::get('email'),
                'phone' => Input::get('phone'),
                'message' => $message,
                'status' => '1',
    			'created_date' => date('Y-m-d'),
                
            );
            
             $email_content = array(
                   
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'mesage' => $message,
                'site_name' => 'laravel Ecommerce'
            );
                  
            $customerid = Home::insert_enquiry($entry);

             Mail::send('emails.contactus', $email_content, function($message) use($email_contact)
                {
    				if (Lang::has(Session::get('lang_file').'.CONTACT_INFORMATION')!= '') 
    			{
     					$session_message =  trans(Session::get('lang_file').'.CONTACT_INFORMATION');
    			}  
    			else 
    			{
    					$session_message =  trans($this->OUR_LANGUAGE.'.CONTACT_INFORMATION');
    			}
                    $message->to($email_contact, 'Admin')->subject($session_message);
                });        
            if (Lang::has(Session::get('lang_file').'.YOUR_ENQUIRY_DETAILS')!= '') 
    			{
     					$session_message =  trans(Session::get('lang_file').'.YOUR_ENQUIRY_DETAILS');
    			}  
    			else 
    			{
    					$session_message =  trans($this->OUR_LANGUAGE.'.YOUR_ENQUIRY_DETAILS');
    			}
            return Redirect::to('contactus')->with('success', $session_message);
        }
    }

    public function enquiry()
    {
        $product_id = Request::segment(2);
        $city_details                = Register::get_city_details();
        $header_category             = Home::get_header_category();
        $cms_page_title              = Home::get_cms_page_title();
        $get_social_media_url        = Footer::get_social_media_url();
        $country_details             = Register::get_country_details();
        $get_meta_details            = Home::get_meta_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_contact_det             = Footer::get_contact_details();
        $getanl                      = Settings::social_media_settings();
        $getlogodetails              = Home::getlogodetails();
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        $enquiry_product            =Home::enquiry_product($product_id);
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl)->with('getanl', $getanl);
        
        return view('enquiry')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('get_contact_det', $get_contact_det)->with('general',$general)->with('enquiry_product',$enquiry_product);
    }

     public function product_enquiry_submit()
    {
        
        $data = Input::except(array(
            '_token'
        ));
        
        
        $product_name = Input::get('product_name');

        $name = Input::get('name');
        
        $email = Input::get('email');
        
        $phone = Input::get('phone');
        
        $message = Input::get('message');
             
        // $entry = array(
        //     'product_name' => Input::get('product_name'),   
        //     'name' => Input::get('name'),
        //     'email' => Input::get('email'),
        //     'phone' => Input::get('phone'),
        //     'message' => Input::get('message')
            
        // );
        
         $email_content = array(
            'product_name' => $product_name,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'mesage' => $message,
            'site_name' => 'laravel Ecommerce'
        );
                 
        //$customerid = Home::insert_enquiry($entry);

         Mail::send('emails.product_enquiry', $email_content, function($message)
            {
                $merchant_email = Input::get('merchant_email');
				if (Lang::has(Session::get('lang_file').'.YOUR_PRODUCT_ENQUIRY')!= '') 
			{
 					$session_message =  trans(Session::get('lang_file').'.YOUR_PRODUCT_ENQUIRY');
			}  
			else 
			{
					$session_message =  trans($this->OUR_LANGUAGE.'.YOUR_PRODUCT_ENQUIRY');
			}
                $message->to($merchant_email, 'Merchant')->subject($session_message);
            });        
        if (Lang::has(Session::get('lang_file').'.YOUR_ENQUIRY_DETAILS')!= '') 
			{
 					$session_message =  trans(Session::get('lang_file').'.YOUR_ENQUIRY_DETAILS');
			}  
			else 
			{
					$session_message =  trans($this->OUR_LANGUAGE.'.YOUR_ENQUIRY_DETAILS');
			}
        return Redirect::to('contactus')->with('success', $session_message);
        
    }
    
    
    public function front_newsletter_submit()
    {
        $email = $_GET['semail'];
        Footer::insert_newsletter_submit($email);
    }
    
    public function insert_inquriy_ajax()
    {
        $iname  = $_GET['iname'];
        $iemail = $_GET['iemail'];
        $iphone = $_GET['iphone'];
        $idesc  = $_GET['idesc'];
        
        $entry  = array(
            'iq_name' => $iname,
            'iq_emailid' => $iemail,
            'iq_phonenumber' => $iphone,
            'iq_message' => $idesc
            
        );
        $return = Footer::insert_inquires_submit($entry);
        if ($return) {
            echo "success";
        }
  
    }
    
    public function show_msg()
    {
       
        echo "success";
    }

    public function check_title()
    {
        $title                = $_GET['title'];
        $check_exist_ad_title = Admodel::check_exist_ad_title($title);
        if ($check_exist_ad_title) {
            echo "fail";
        } else {
            echo "success";
            
        }
    }

    public function user_ad_ajax()
    {
        $inputs        = Input::all();
        $adtitle       = Input::get('ad_title');
        $adposition    = Input::get('ad_pos');
        $adpage        = Input::get('ad_pages');
        $adredirecturl = Input::get('ad_url');
        $file          = Input::file('file');
        $filename      = $file->getClientOriginalName();
        $move_img      = explode('.', $filename);
        
        
        $filename        = $move_img[0] . str_random(8) . "." . $move_img[1];
        $destinationPath = './public/assets/adimage/';
        $uploadSuccess   = Input::file('file')->move($destinationPath, $filename);
        $entry           = array(
            'ad_name' => $adtitle,
            'ad_position' => $adposition,
            'ad_pages' => $adpage,
            'ad_redirecturl' => $adredirecturl,
            'ad_img' => $filename,
            'ad_type' => 2,
            'ad_read_status' => 0,
            'ad_status' => 1
        );
        $return          = Admodel::save_ad($entry);
        return Redirect::to('/');
        
        
    }
/* CMS PAGES */
	 public function cms($id)
    {
        $city_details                = Register::get_city_details();
        $header_category             = Home::get_header_category();
        $cms_page_title              = Home::get_cms_page_title();
        $get_social_media_url        = Footer::get_social_media_url();
        $get_meta_details            = Home::get_meta_details();
        $country_details             = Register::get_country_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_contact_det             = Footer::get_contact_details();
        $getlogodetails              = Home::getlogodetails();
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('cms_page_title', $cms_page_title)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('cms_page_title', $cms_page_title)->with('metadetails', $get_meta_details)->with('general', $general);
        }
        
        $header       = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        $footer       = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $faq_deatils  = Footer::get_faq_details();
        //$help_deatils = Footer::get_help_details();
		$help_deatils = Footer::fetch_front_cms_details($id);
        return view('cms')->with('faq_result', $faq_deatils)->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('cms_result', $help_deatils)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
/* GET ABOUTUS DETAILS */
	 public function aboutus()
    {
        $city_details                = Register::get_city_details();
        $header_category             = Home::get_header_category();
        $cms_page_title              = Home::get_cms_page_title();
        $get_social_media_url        = Footer::get_social_media_url();
        $get_meta_details            = Home::get_meta_details();
        $country_details             = Register::get_country_details();
        $get_image_favicons_details  = Home::get_image_favicons_details();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_contact_det             = Footer::get_contact_details();
        $getlogodetails              = Home::getlogodetails();
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('city_details', $city_details)->with('metadetails', $get_meta_details)->with('general', $general);
        }
        
        $header      = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
        $footer      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $faq_deatils = Footer::get_aboutus_details();
        return view('aboutus')->with('cms_result', $faq_deatils)->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    
    
}
