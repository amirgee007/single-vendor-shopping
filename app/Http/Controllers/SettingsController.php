<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Lang;
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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class SettingsController extends Controller
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

    public function general_setting()
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
            $adminheader      = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus   = view('siteadmin.includes.admin_left_menus');
            $adminfooter      = view('siteadmin.includes.admin_footer');
            $general_settings = Settings::view_general_setting();
            $language_list    = Settings::view_language_list();
            $theme_list       = Settings::view_theme_list();
            return view('siteadmin.general_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('general_settings', $general_settings)->with('language_list', $language_list)->with('theme_list', $theme_list);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    /* public function general_setting_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'site_name' => 'required',
				'site_name_french' => 'required',
                'meta_title' => 'required',
				'meta_title_french' => 'required',
                'meta_key' => 'required',
				'meta_key_french' => 'required',
                'meta_desc' => 'required',
				'meta_desc_french' => 'required',
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('general_setting')->withErrors($validator->messages())->withInput();
                
            } else {
                
                $entry  = array(
                    'gs_sitename' => Input::get('site_name'),
					'gs_sitename_fr' => Input::get('site_name_french'),
                    'gs_metatitle' => Input::get('meta_title'),
					'gs_metatitle_fr' => Input::get('meta_title_french'),
                    'gs_metakeywords' => Input::get('meta_key'),
					'gs_metakeywords_fr' => Input::get('meta_key_french'),
                    'gs_metadesc' => Input::get('meta_desc'),
					'gs_metadesc_fr' => Input::get('meta_desc_french'),
                    'gs_payment_status' => Input::get('payment_status'),
                    'gs_paypal_payment' => Input::get('paypal_payment_status'),
                    'gs_themes' => Input::get('themes')
                );
                $return = Settings::save_general_set($entry);
                if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
                return Redirect::to('general_setting')->with('success', $session_message);
                
            }
        } else {
            return Redirect::to('siteadmin');
        }
    } */

	public function general_setting_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
			$regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
			$rule = array(
                'site_name' => 'required',
                'meta_title' => 'required',
                'meta_key' => 'required',
                'meta_desc' => 'required',
            );
			
			$get_active_lang = DB::table('nm_language')->where('lang_status',1)->where('pack_lang',0)->get();
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'site_name_'.$get_lang_name => 'required',
					'meta_title_'.$get_lang_name => 'required',
					'meta_key_'.$get_lang_name => 'required',
					'meta_desc_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
						
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('general_setting')->withErrors($validator->messages())->withInput();
                
            } else {
                
                $entry  = array(
                    'gs_sitename' => Input::get('site_name'),
                    'gs_metatitle' => Input::get('meta_title'),
                    'gs_metakeywords' => Input::get('meta_key'),
                    'gs_metadesc' => Input::get('meta_desc'),
                    'gs_payment_status' => Input::get('payment_status'),
                    'gs_paypal_payment' => Input::get('paypal_payment_status'),
                    'gs_payumoney_status' => Input::get('payumoney_payment_status'),
                    'gs_playstore_url' => Input::get('playstore_url'),
                    'gs_apple_appstore_url' => Input::get('apple_appstore_url'),
                    'gs_themes' => Input::get('themes')
                );
				
				$lang_entry = array();
				
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'gs_sitename_'.$get_lang_code => Input::get('site_name_'.$get_lang_name),
						'gs_metatitle_'.$get_lang_code => Input::get('meta_title_'.$get_lang_name),
						'gs_metakeywords_'.$get_lang_code => Input::get('meta_key_'.$get_lang_name),
						'gs_metadesc_'.$get_lang_code => Input::get('meta_desc_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
                $return = Settings::save_general_set($entry);
                if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
                return Redirect::to('general_setting')->with('success', $session_message);
                
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
	
    public function email_setting()
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
            $email_settings = Settings::view_email_settings();
            return view('siteadmin.email_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('email_settings', $email_settings);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function smtp_setting()
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
            $smtp_settings  = Settings::view_smtp_settings();
            $send_settings  = Settings::view_send_settings();
            return view('siteadmin.smtp_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('smtp_settings', $smtp_settings)->with('send_settings', $send_settings);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function email_setting_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'contact_name' => 'required',
                'contact_email' => 'required|email',
                'skype_email_id' => 'sometimes|email',
                'webmaster_email' => 'required|email',
                'no_reply_email' => 'required|email',
                'cont_email' => 'required|email',
                'contact_pno' => 'required|numeric|min:10',
                'lati' => 'required',
                'long' => 'required'                
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('email_setting')->withErrors($validator->messages())->withInput();
                
            } else {
                
                $entry  = array(
                    'es_contactname' => Input::get('contact_name'),
                    'es_contactemail' => Input::get('contact_email'),
                    'es_skype_email_id' => Input::get('skype_email_id'),
                    'es_webmasteremail' => Input::get('webmaster_email'),
                    'es_noreplyemail' => Input::get('no_reply_email'),
                    'es_phone1' => Input::get('contact_pno'),
                    'es_phone2' => Input::get('contact_pno2'),
                    'es_email' => Input::get('cont_email'),
                    'es_address1' => Input::get('cont_address_one'),
                    'es_address2' => Input::get('cont_address_two'),
                    'show_address' => Input::get('address_status'),
                    'es_latitude' => Input::get('lati'),
                    'es_longitude' => Input::get('long')
                    
                );
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
                $return = Settings::save_email_set($entry);
                return Redirect::to('email_setting')->with('success', $session_message);
                
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function smtp_setting_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'smtp_host' => 'required',
                'smtp_port' => 'required',
                'smtp_username' => 'required',
                'password' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('smtp_setting')->withErrors($validator->messages())->withInput();
                
            } else {
                
                $entry  = array(
                    'sm_host' => Input::get('smtp_host'),
                    'sm_port' => Input::get('smtp_port'),
                    'sm_uname' => Input::get('smtp_username'),
                    'sm_pwd' => Input::get('password'),
                    'sm_isactive' => 1
                 );
                $return = Settings::save_smtp_set_def();
                $return = Settings::save_smtp_set($entry);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
                return Redirect::to('smtp_setting')->with('success', $session_message);
                
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function send_setting_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'send_host' => 'required',
                'send_port' => 'required',
                'send_username' => 'required',
                'send_password' => 'required'
            
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('smtp_setting')->withErrors($validator->messages())->withInput();
                
            } else {
                
                $entry  = array(
                    'sm_host' => Input::get('send_host'),
                    'sm_port' => Input::get('send_port'),
                    'sm_uname' => Input::get('send_username'),
                    'sm_pwd' => Input::get('send_password'),
                    'sm_isactive' => 1
               
                );
                $return = Settings::save_smtp_set_def();
                $return = Settings::save_send_set($entry);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
                return Redirect::to('smtp_setting')->with('success', $session_message);
                
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function social_media_settings()
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
            $adminheader     = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus  = view('siteadmin.includes.admin_left_menus');
            $adminfooter     = view('siteadmin.includes.admin_footer');
            $social_settings = Settings::social_media_settings();
            return view('siteadmin.social_media_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('social_settings', $social_settings);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function social_media_setting_submit()
    {
		

        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'fb_app_id' => 'required',
                'fb_secret_key' => 'required',
                'fb_page_url' => 'sometimes|url',
                'fb_like_box_url' => 'sometimes|url',
                'twitter_page_url' => 'sometimes|url',
                'twitter_app_id' => 'required',
                'twitter_secret_key' => 'required',
                'linkedin_page_url' => 'sometimes|url',
                'youtube_page_url' => 'sometimes|url',
                'gmap_app_key' => 'required',
                'analytics_code' => 'required',
                'gl_client_id' => 'required',
                'gl_secret_key' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('social_media_settings')->withErrors($validator->messages())->withInput();
            } else {
                $entry  = array(
                    'sm_fb_app_id' => Input::get('fb_app_id'),
                    'sm_fb_sec_key' => Input::get('fb_secret_key'),
                    'sm_fb_page_url' => Input::get('fb_page_url'),
                    'sm_fb_like_page_url' => Input::get('fb_like_box_url'),
                    'sm_twitter_url' => Input::get('twitter_page_url'),
                    'sm_twitter_app_id' => Input::get('twitter_app_id'),
                    'sm_twitter_sec_key' => Input::get('twitter_secret_key'),
                    'sm_linkedin_url' => Input::get('linkedin_page_url'),
                    'sm_youtube_url' => Input::get('youtube_page_url'),
                    'sm_gmap_app_key' => Input::get('gmap_app_key'),
                    'sm_android_page_url' => Input::get('android_page_url'),
                    'sm_iphone_url' => Input::get('iphone_page_url'),
                    'sm_analytics_code' => Input::get('analytics_code'),
                    'sm_gl_client_id' => Input::get('gl_client_id'),
                    'sm_gl_sec_key' => Input::get('gl_secret_key')
                );
                $result = Settings::update_social_media_settings($entry);
                if ($result) {
					if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
					}
					else 
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
					}
                    return Redirect::to('social_media_settings')->with('success', $session_message);
                } else {
					if(Lang::has(Session::get('admin_lang_file').'.BACK_SOMETHING_WENT_WRONG')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_SOMETHING_WENT_WRONG');
					}
					else 
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SOMETHING_WENT_WRONG');
					}
                    return Redirect::to('social_media_settings')->with('success', $session_message);
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function payment_settings()
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
            $adminheader      = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus   = view('siteadmin.includes.admin_left_menus');
            $adminfooter      = view('siteadmin.includes.admin_footer');
            $country_settings = Settings::get_country_details();
            $get_pay_settings = Settings::get_pay_settings();
            return view('siteadmin.payment_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('country_settings', $country_settings)->with('get_pay_settings', $get_pay_settings);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function payment_settings_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'country_name' => 'required',
                'country_code' => 'required',
                'currency_symbol' => 'required',
                'currency_code' => 'required',
                'payment_mode' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('payment_settings')->withErrors($validator->messages())->withInput();
            } else {
                $entry            = array(
                    'ps_flatshipping' => Input::get('flat_shipping'),
                    'ps_taxpercentage' => Input::get('tax_percentage'),
                    'ps_extenddays' => Input::get('extended_days'),
                    'ps_alertdays' => Input::get('alert_day'),
                    'ps_minfundrequest' => Input::get('maximum_fund_request'),
                    'ps_maxfundrequest' => Input::get('maximum_fund_request'),
                    'ps_referralamount' => Input::get('referral_amount'),
                    'ps_countryid' => Input::get('country_name'),
                    'ps_countrycode' => Input::get('country_code'),
                    'ps_cursymbol' => Input::get('currency_symbol'),
                    'ps_curcode' => Input::get('currency_code'),
                    'ps_paypalaccount' => Input::get('paypal_account'),
                    'ps_paypal_api_pw' => Input::get('paypal_api_password'),
                    'ps_paypal_api_signature' => Input::get('paypal_api_signature'),
                    'ps_authorize_trans_key' => Input::get('authorizenet_trans_key'),
                    'ps_authorize_api_id' => Input::get('authorizenet_api_id'),
                    'ps_payu_key'           => Input::get('payu_key'),
                    'ps_payu_salt'           => Input::get('payu_salt'),
                    'tax_type'           => Input::get('tax_type'),
                    'tax_id_number'           => Input::get('tax_number'),
                    'ps_paypal_pay_mode' => Input::get('payment_mode')
                );
                $get_pay_settings = Settings::update_payment_settings($entry);
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
				}
                return Redirect::to('payment_settings')->with('success', $session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function select_currency_value_ajax()
    {
        $id = $_GET['id'];
        $get_currency = Settings::get_country_value_ajax($id);
        if ($get_currency) {
            foreach ($get_currency as $get_currency_ajax) {
            }
            echo '<div id="whole_currency_div">
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Country Code <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="country_code" placeholder="12" id="text1" value="' . $get_currency_ajax->co_code . '" readonly >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Currency Symbol   <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="currency_symbol" placeholder="Rs." id="text1" value="' . $get_currency_ajax->co_cursymbol . '" readonly >
                    </div>
                </div>
                        </div>
                 
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Currency Code   <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="currency_code" placeholder="INR" id="text1" value="' . $get_currency_ajax->co_curcode . '" readonly  >
                    </div>
                </div>
                 </div>
              </div>';
            
        } else {
            echo '<div id="whole_currency_div">
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1"></label>

                    <div class="col-lg-4">
                  <h4>Please select Country</h4>
                    </div>
                </div>
                        </div>';
        }
    }
    
    public function module_settings()
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
            $adminheader            = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus         = view('siteadmin.includes.admin_left_menus');
            $adminfooter            = view('siteadmin.includes.admin_footer');
            $module_setting_details = Settings::get_module_details();
            return view('siteadmin.module_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('module_setting_details', $module_setting_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function module_settings_submit()
    {
        if (Session::has('userid')) {
            $data             = Input::except(array(
                '_token'
            ));
            $entry            = array(
                'ms_dealmodule' => Input::get('deal_module'),
                'ms_productmodule' => Input::get('product_module'),
                'ms_auctionmodule' => Input::get('auction'),
                'ms_blogmodule' => Input::get('blog'),
                'ms_nearmemapmodule' => Input::get('near_me_map'),
                'ms_storelistmodule' => Input::get('store_list'),
                'ms_pastdealmodule' => Input::get('past_deal'),
                'ms_faqmodule' => Input::get('faq'),
                'ms_cod' => Input::get('cod'),
                'ms_paypal' => Input::get('paypal'),
                'ms_creditcard' => Input::get('credit_card'),
                'ms_googlecheckout' => Input::get('google_checkout'),
                'ms_shipping' => Input::get('shipping_settings'),
                'ms_newsletter_template' => Input::get('newsletter_temp'),
                'ms_citysettings' => Input::get('city_settings')
            );
            $get_pay_settings = Settings::update_modul_settings($entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
            return Redirect::to('module_settings')->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function manage_newsletter_subscribers()
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
            $adminheader     = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus  = view('siteadmin.includes.admin_left_menus');
            $adminfooter     = view('siteadmin.includes.admin_footer');
            $subscriber_list = Settings::get_newsletter_subscribers();
            return view('siteadmin.manage_newsletter_subscribers')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('subscriber_list', $subscriber_list);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_newsletter_subscriber_status($id, $status)
    {
        if (Session::has('userid')) {
            $return = Settings::edit_newsletter_subs_status($id, $status);
            if ($status == 0) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
				}
                return Redirect::to('manage_newsletter_subscribers')->with('success', $session_message);
            } else if ($status == 1) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
				}
                return Redirect::to('manage_newsletter_subscribers')->with('success', $session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function delete_newsletter_subscriber($id)
    {
        if (Session::has('userid')) {
            Settings::delete_newsletter_subs($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
            return Redirect::to('manage_newsletter_subscribers')->with('success', $session_message);
            
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function send_newsletter()
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
            $city_list      = Settings::get_city_details();
			$newsletter_subscribers      = Settings::get_newsletter_subscribers();
			
            return view('siteadmin.send_newsletter')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('city_list', $city_list)->with('newsletter_subscribers',$newsletter_subscribers);
			
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function send_newsletter_submit()
    {
		

        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                //'city' => 'required',
                'subject' => 'required',
                'message' => 'required'
            );
			
			$validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('send_newsletter')->withErrors($validator->messages())->withInput();
                
            }
			
			if($_POST){
			if (!empty(Input::get('user_id')))
			{
				$userid = Input::get('user_id');
				
				
				// Particular User
				$user_details = DB::table('nm_newsletter_subscribers')->select('email')->where('status','=',1)->whereIn('id', $userid)->get();
						
			} else {
				// All users
				$user_details = DB::table('nm_newsletter_subscribers')->select('email')->where('status','=',1)->get();	
				
			}
			
			$newsletter_subject =Input::get('subject');
			//$message=Input::get('message');
			$newsletter_template = Input::get('message');
			
			Mail::Send('emails.news_letter',['news_template'=>$newsletter_template], function($message) use ($newsletter_template,$user_details,$newsletter_subject) 
					{

                        $message->setBody($newsletter_template, 'text/html');
						foreach($user_details as $u) {
							$message->to($u->email)->subject($newsletter_subject .'- Daily Newsletter');	
						}
						
					});
					
					
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.EMAIL_SUCESS');
			
            return Redirect::to('send_newsletter')->with('success', $session_message);
			
			
            
            
		}
        } else {
            return Redirect::to('siteadmin');
        }
    }
	
	public function manage_lang(){
		 if (Session::has('userid')) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
			$adminheader      = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus   = view('siteadmin.includes.admin_left_menus');
            $adminfooter      = view('siteadmin.includes.admin_footer');
            $manage_language  = Settings::manage_language();

            return view('siteadmin.manage_lang')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('manage_language', $manage_language);
			
		 } else {
            return Redirect::to('siteadmin');
         }
	}
	
	public function update_default_lang_submit(){
		if (Session::has('userid')) {
			
            $id     = Input::get('default_lang_id');
			
            $entry  = array(
                'lang_default' => 0
            );
            $return = Settings::update_default_lang_submit1($entry);
            $entry  = array(
                'lang_default' => 1
            );
            $return = Settings::update_default_lang_submit($id, $entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
            return Redirect::to('manage_lang')->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
	}
	public function status_lang_submit($id, $status)
    {
        if (Session::has('userid')) {
            $return = Settings::status_lang($id, $status);

            if ($status == 1) { //unblock 
               
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}
               return Redirect::to('manage_lang')->with('updated_result', $session_message);
            }else if ($status == 2) {   //block
                
				    if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= ''){ 
				        $session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			        }else{ 
				        $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			        }
                return Redirect::to('manage_lang')->with('updated_result', $session_message);
            }
           
              
        } else {
            return Redirect::to('siteadmin');
        }
    }
	
}

?>