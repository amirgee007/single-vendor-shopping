<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'HomeController@index');
Route::get('index/{email_login}', 'HomeController@index');

Route::get('index', 'HomeController@index');
Route::get('category_list_all', 'HomeController@productList');
Route::get('check_estimate_zipcode' , 'HomeController@check_estimate_zipcode');
Route::get('autosearch', 'HomeController@autosearch');
Route::get('my_wishlist','CustomerprofileController@get_userprofile');
Route::any('register_submit','HomeController@register_submit');
Route::get('products', 'HomeController@products');
/* Sathyaseelan */
/* Route::get('catproducts/{name}/{id}', 'HomeController@category_product_list'); */
Route::get('catproducts/{name}/{id}', 'HomeController@category_product_list');
Route::get('catdeals/{name}/{id}', 'HomeController@category_deal_list');
Route::get('catauction/{name}/{id}', 'HomeController@category_auction_list');
Route::get('productview/{mc}/{sc}/{sb}/{ssb}/{id}', 'HomeController@productview');
Route::get('productview/{mc}/{sc}/{sb}/{id}', 'HomeController@productview1');
Route::get('productview/{mc}/{sc}/{id}', 'HomeController@productview2');
Route::get('productview/{mc}/{id}', 'HomeController@productview3'); 
//kathir
//Route::any('productview_test', 'HomeController@productview_test');
Route::any('product_review_all/{pid}', 'HomeController@Review_All'); 
Route::any('deal_review_all/{pid}', 'HomeController@deal_review_All'); 

Route::get('category_list/{id}', 'HomeController@category_list');
Route::get('registers/', 'HomeController@register');
Route::get('search', 'HomeController@search');
Route::get('searching', 'HomeController@searching');
Route::get('newsletter/', 'HomeController@newsletter');
Route::post('subscription_submit','HomeController@subscription_submit');
Route::get('compare','HomeController@compare');
Route::post('addtowish','HomeController@addtowish');
Route::post('productcomments','HomeController@productcomments');
Route::post('dealcomments','HomeController@dealcomments');
Route::post('storecomments','HomeController@storecomments');
Route::get('/register',function(){
    $data = array('pageTitle'  =>  'Register');
    return View::make('index',$data);
});
Route::post('/register',function(){
    $inputData = Input::get('formData');
    parse_str($inputData, $formFields);  
    $userData = array(
      'name'      => $formFields['name'],
      'email'     =>  $formFields['email'],
      'password'  =>  $formFields['password'],
      'password_confirmation' =>  $formFields[ 'password_confirmation'],
    );
    $rules = array(
        'name'      =>  'required',
        'email'     =>  'required|email|unique:users',
        'password'  =>  'required|min:6|confirmed',
    );
    $validator = Validator::make($userData,$rules);
    if($validator->fails())
        return Response::json(array(
            'fail' => true,
            'errors' => $validator->getMessageBag()->toArray()
        ));
    else {
    //save password to show to user after registration
        $password = $userData['password'];
    //hash it now
        $userData['password'] =    Hash::make($userData['password']);
        unset($userData['password_confirmation']);
    //save to DB user details
      if(User::create($userData)) {  
          //return success  message
        return Response::json(array(
          'success' => true,
          'email' => $userData['email'],
          'password'    =>  $password
        ));
      }
  }
});


Route::get('deals', 'HomeController@deals');
Route::get('dealview/{id}', 'HomeController@dealview');
Route::get('dealview/{id}', 'HomeController@dealview');
Route::get('dealview/{mc}/{sc}/{sb}/{ssb}/{id}', 'HomeController@dealview');
Route::get('dealview/{mc}/{sc}/{id}', 'HomeController@dealview2');
Route::get('dealview/{mc}/{id}', 'HomeController@dealview3');
Route::get('dealview/{mc}/{sc}/{sb}/{id}', 'HomeController@dealview1');
Route::get('auction', 'HomeController@auction');
Route::get('auctionview/{id}', 'HomeController@auctionview');
/*Route::get('stores', 'HomeController@stores');
Route::get('stores_ajax', 'HomeController@stores_ajax');
Route::get('storeview/{id}', 'HomeController@storeview');*/
Route::get('sold', 'HomeController@sold');
Route::get('front_newsletter_submit', 'FooterController@front_newsletter_submit');
Route::get('check_title','FooterController@check_title');
Route::post('user_ad_ajax','FooterController@user_ad_ajax');
Route::get('register_getcountry','RegisterController@register_getcountry_ajax');
Route::get('register_emailcheck','RegisterController@register_emailcheck_ajax');
Route::any('user_login_submit','UserloginController@user_login_submit');
Route::get('storeview/{id}', 'HomeController@storeview');

Route::get('user_profile','CustomerprofileController@get_userprofile');
Route::any('user_profile_cod','CustomerprofileController@get_userprofile_ajax');


//Route::get('user_profile/{id}',array('as'=>'customer_profile_cod','uses'=>'CustomerprofileController@get_userprofile'));
//Route::any('StatusLanguage/{id}/{status}',array('as'=>'StatusLanguage','uses'=>'Admin\AdminLanguageController@StatusLanguage'));



Route::get('user_logout','CustomerprofileController@user_logout');
Route::get('facebook_logout','CustomerprofileController@facebook_logout');
Route::get('update_username_ajax','CustomerprofileController@update_username_ajax');
Route::post('update_password_ajax','CustomerprofileController@update_password_ajax');
Route::get('update_phonenumber_ajax','CustomerprofileController@update_phonenumber_ajax');
Route::get('update_address_ajax','CustomerprofileController@update_address_ajax');
Route::get('update_city_ajax','CustomerprofileController@update_city_ajax');
Route::get('update_shipping_ajax','CustomerprofileController@update_shipping_ajax');
Route::post('profile_image_submit','CustomerprofileController@profile_image_submit');
Route::get('contactus', 'FooterController@contactus');
Route::get('enquiry/{id}', 'FooterController@enquiry');
Route::post('product_enquiry_submit', 'FooterController@product_enquiry_submit');
Route::post('enquiry_submit', 'FooterController@enquiry_submit');
Route::get('insert_inquriy_ajax','FooterController@insert_inquriy_ajax');
Route::get('blog', 'FooterController@blog');
Route::get('blog_category/{id}', 'FooterController@blog_category');
Route::get('blog_view/{id}', 'FooterController@blog_view');
Route::get('blog_comment/{id}', 'FooterController@blog_comment');
Route::post('blog_comment_submit', 'FooterController@blog_comment_submit');
Route::get('pages/{id}', 'FooterController@get_front_cms_pages');
Route::get('faq', 'FooterController@get_faq');
Route::get('termsandconditons', 'FooterController@termsandconditons');

Route::get('help', 'FooterController@help');
Route::get('nearbystore', 'HomeController@nearmemap'); 
Route::get('nearbystore_select_city','HomeController@nearbystore_select_city');
Route::get('checkout', 'HomeController@checkout');
Route::post('checkout_auction', 'HomeController@checkout_auction');
Route::get('user_forgot_submit','UserloginController@password_emailcheck');
Route::post('payment_checkout_process', 'HomeController@payment_checkout_process');
Route::get('paypal_checkout_success', 'HomeController@paypal_checkout_success');
Route::get('paypal_checkout_cancel', 'HomeController@paypal_checkout_cancel');
Route::post('bid_payment', 'HomeController@bid_payment');
Route::get('bid_payment', 'HomeController@bid_payment_error');
Route::post('place_bid_payment', 'HomeController@place_bid_payment');
Route::get('place_bid_payment', 'HomeController@bid_payment_error');
//fb_login
Route::get('facebooklogin', 'HomeController@facebooklogin');
/*Route::get('merchant_signup', 'HomeController@merchant_signup');
Route::post('merchant_signup', 'HomeController@merchant_signup_submit');
Route::get('submission_merchant', 'HomeController@submission_merchant');*/
Route::any('check_mer_email','MerchantController@check_mer_email');
//fb_login

Route::get('register_getcity_shipping','CustomerprofileController@register_getcity_shipping');
 
//user_login_forgot_pwd
Route::get('user_forgot_pwd_email/{email_id}','UserloginController@user_forgot_pwd_email');
Route::get('user_reset_password_submit','UserloginController@user_reset_password_submit');

//payment result
Route::get('show_payment_result/{orderid}', 'HomeController@show_payment_result');
Route::get('show_wallet_result/{orderid}', 'HomeController@show_wallet_result');
Route::get('show_payment_result_cod/{orderid}', 'HomeController@show_payment_result_cod');

//payment result payu
Route::get('show_payment_result_payu/{orderid}', 'PayumoneyController@show_payment_result_payu');
Route::get('show_wallet_result_payu/{orderid}', 'PayumoneyController@show_wallet_result_payu');

//add_to_cart

Route::get('cart', 'HomeController@cart');
Route::get('addtocart', 'HomeController@cart');
Route::post('addtocart', 'HomeController@add_to_cart');
Route::get('remove_session_cart_data', 'HomeController@remove_session_cart_data');
Route::get('set_quantity_session_cart', 'HomeController@set_quantity_session_cart');
Route::get('remove_session_dealcart_data', 'HomeController@remove_session_dealcart_data');
Route::get('set_quantity_session_dealcart', 'HomeController@set_quantity_session_dealcart');

Route::get('deal_cart', 'HomeController@deal_cart');
Route::get('addtocart_deal', 'HomeController@deal_cart');
Route::post('addtocart_deal', 'HomeController@add_to_cart_deal');
//add_to_cart

//admin_login
Route::get('chart', 'AdminController@chart');
Route::get('siteadmin', 'AdminController@siteadmin');
Route::get('admin_settings', 'AdminController@admin_settings');
Route::post('admin_settings_submit', 'AdminController@admin_settings_submit');
Route::get('admin_profile', 'AdminController@admin_profile');
Route::post('login_check', 'AdminController@login_check');
Route::post('forgot_check', 'AdminController@forgot_check');
Route::get('admin_logout', 'AdminController@admin_logout');
/*Route::get('merchant_profile', 'MerchantSettingsController@merchant_profile');*/
//admin_login

//admin_dashboard
Route::get('siteadmin_dashboard', 'DashboardController@siteadmin_dashboard');

//admin_dashboard

// admin -> settings -> attribute managment 
Route::get('add_size', 'AttributeController@add_size');
Route::post('addsize_submit', 'AttributeController@addsizesubmit');
Route::get('manage_size', 'AttributeController@manage_size');
Route::get('delete_size/{id}', 'AttributeController@delete_size');
Route::get('edit_size/{id}', 'AttributeController@edit_size');
Route::post('editsize_submit', 'AttributeController@editsize_submit');
Route::get('add_color', 'AttributeController@add_color');
Route::post('add_color_submit', 'AttributeController@add_color_submit');
Route::get('manage_color', 'AttributeController@manage_color');
Route::get('edit_color/{id}', 'AttributeController@edit_color');
Route::post('editcolor_submit', 'AttributeController@editcolor_submit');
Route::get('delete_color/{id}', 'AttributeController@deletecolor_submit');
//ajax color
Route::get('attribute_select_color', 'AttributeController@attribute_select_color');
//ajax color
// admin -> settings -> attribute managment 

// admin -> Banner image settings -> add banner image
Route::get('add_banner_image', 'BannerController@add_banner_image');
Route::post('add_banner_submit', 'BannerController@add_banner_submit');
Route::get('manage_banner_image', 'BannerController@manage_banner_image');
Route::get('edit_banner_image/{id}', 'BannerController@edit_banner_image');
Route::post('edit_banner_submit', 'BannerController@edit_banner_submit');
Route::get('delete_banner_submit/{id}', 'BannerController@delete_banner_submit');
Route::get('status_banner_submit/{id}/{status}', 'BannerController@status_banner_submit');
Route::get('block_banner_multiple', 'BannerController@block_banner_multiple');
Route::get('unblock_banner_multiple', 'BannerController@unblock_banner_multiple');
Route::get('delete_banner_multiple', 'BannerController@delete_banner_multiple');
// admin -> Banner image settings -> add banner image

//product review 
Route::get('block_pro_review_multiple', 'ProductController@block_pro_review_multiple');
Route::get('unblock_pro_review_multiple', 'ProductController@unblock_pro_review_multiple');
Route::get('delete_pro_review_multiple', 'ProductController@delete_pro_review_multiple');

//deal product review 
Route::get('block_deal_review_multiple', 'DealsController@block_deal_review_multiple');
Route::get('unblock_deal_review_multiple', 'DealsController@unblock_deal_review_multiple');
Route::get('delete_deal_review_multiple', 'DealsController@delete_deal_review_multiple');


//admin -> Settings -> Specification management
Route::get('add_specification', 'SpecificationController@add_specification');
Route::post('add_specification_submit', 'SpecificationController@add_specification_submit');
Route::get('manage_specification', 'SpecificationController@manage_specification');
Route::get('edit_specification/{id}', 'SpecificationController@edit_specification');
Route::get('delete_specification/{id}', 'SpecificationController@delete_specification');
Route::post('update_specification_submit', 'SpecificationController@update_specification');
Route::post('get_related_subcategory', 'SpecificationController@get_related_subcategory');
Route::get('add_specification_group', 'SpecificationController@add_specification_group');
Route::post('add_specification_group_submit', 'SpecificationController@add_specification_group_submit');
Route::get('manage_specification_group', 'SpecificationController@manage_specification_group');
Route::get('edit_specification_group/{id}', 'SpecificationController@edit_specification_group');
Route::get('delete_specification_group/{id}', 'SpecificationController@delete_specification_group');
Route::post('edit_specification_group_submit', 'SpecificationController@edit_specification_group_submit');
//admin -> Settings -> Specification management

//admin country management->add country 

Route::get('add_country', 'CountryController@add_country');
Route::post('add_country_submit', 'CountryController@add_country_submit');
Route::get('manage_country', 'CountryController@manage_country');
Route::post('update_country_submit', 'CountryController@update_country_submit');
Route::get('edit_country/{id}', 'CountryController@edit_country');
Route::get('delete_country/{id}', 'CountryController@delete_country');
Route::get('status_country_submit/{id}/{status}', 'CountryController@update_status_country');
Route::get('array_search_country', 'CountryController@array_search_country');
Route::get('add_searched_country', 'CountryController@add_searched_country');
Route::get('block_status_country_submit', 'CountryController@block_status_country_submit');
Route::get('unblock_status_country_submit', 'CountryController@unblock_status_country_submit');



// admin->settings->CMS management

Route::get('add_cms_page', 'CmsController@add_cms_page');
Route::post('cms_add_page_submit','CmsController@cms_add_page_submit');
Route::get('manage_cms_page', 'CmsController@manage_cms_page');
Route::get('edit_cms_page/{id}', 'CmsController@edit_cms_page');
Route::post('edit_cms_page_submit', 'CmsController@edit_cms_page_submit');
Route::get('block_cms_page/{id}/{status}', 'CmsController@block_cms_page');
Route::get('unblock_cms_page_multiple', 'CmsController@unblock_cms_page_multiple');
Route::get('block_cms_page_multiple', 'CmsController@block_cms_page_multiple');
Route::get('delete_cms_page/{id}','CmsController@delete_cms_page');

Route::get('delete_cms_page_multiple','CmsController@delete_cms_page_multiple');
Route::get('aboutus_page','CmsController@aboutus_page');
Route::post('aboutus_page_update','CmsController@aboutus_page_update');
Route::get('terms','CmsController@terms');
Route::post('terms_update','CmsController@terms_update');
// admin->settings->CMS management

//admin-> Deals
Route::get('deals_dashboard', 'DealsController@deals_dashboard');
Route::get('add_deals', 'DealsController@add_deals');
Route::post('add_deals_submit', 'DealsController@add_deals_submit');
//for ajax
Route::get('deals_select_main_cat', 'DealsController@deals_select_main_cat');
Route::get('deals_select_sub_cat', 'DealsController@deals_select_sub_cat');
Route::get('deals_select_second_sub_cat', 'DealsController@deals_select_second_sub_cat');
Route::get('deals_edit_select_main_cat', 'DealsController@deals_edit_select_main_cat');
Route::get('deals_edit_select_sub_cat', 'DealsController@deals_edit_select_sub_cat' );
Route::get('deals_edit_second_sub_cat', 'DealsController@deals_edit_second_sub_cat');
Route::get('check_title_exist','DealsController@check_title_exist');
Route::get('check_title_exist_dynamic','DealsController@check_title_exist_dynamic');
Route::get('check_title_exist_edit', 'DealsController@check_title_exist_edit');
Route::get('check_title_exist_edit_dynamic', 'DealsController@check_title_exist_edit_dynamic');
// Route::get('store_details','DealsController@store_details');
/*for merchant add deals ajax category*/
Route::get('mer_deals_select_main_cat', 'MerchantdealsController@mer_deals_select_main_cat');
Route::get('mer_deals_select_sub_cat', 'MerchantdealsController@mer_deals_select_sub_cat');
Route::get('mer_deals_select_second_sub_cat', 'MerchantdealsController@mer_deals_select_second_sub_cat');
//Janauary - 31-01-2017 - yamuna
Route::get('manage_deals_shipping_details','DealsController@manage_deals_shipping_details');
Route::get('manage_deals_cashondelivery_details','DealsController@manage_deals_cashondelivery_details');

//for ajax
Route::post('edit_deals_submit', 'DealsController@edit_deals_submit');
Route::get('edit_deals/{id}', 'DealsController@edit_deals');
Route::get('delete_deals/{id}', 'DealsController@delete_deals');
Route::get('manage_deals','DealsController@manage_deals');
Route::post('manage_deals','DealsController@manage_deals');
Route::get('block_deals/{id}/{status}','DealsController@block_deals');
Route::get('deal_details/{id}', 'DealsController@deal_details');
Route::get('expired_deals', 'DealsController@expired_deals');
Route::post('expired_deals', 'DealsController@expired_deals');
Route::get('sold_deals', 'DealsController@sold_deals');
Route::post('sold_deals', 'DealsController@sold_deals');
Route::any('delete_deal_image/{id}/{image}','DealsController@delete_deal_image');

Route::get('validate_coupon_code', 'DealsController@validate_coupon_code');
Route::get('redeem_coupon_list', 'DealsController@redeem_coupon_list');
//laxman//
Route::get('manage_dealcashon_delivery_details','DealsController@manage_deals_shippingCOD_details');
Route::get('deals_shipping_details','DealsController@manage_deals_cardshipping_details');

//admin-> Deals
//admin -> cities management

Route::get('add_city', 'CityController@add_city');
Route::post('add_city_submit', 'CityController@add_city_submit');
Route::get('manage_city', 'CityController@manage_city');
Route::post('edit_city_submit', 'CityController@edit_city_submit');
Route::get('edit_city/{id}', 'CityController@edit_city');
Route::get('delete_city/{id}', 'CityController@delete_city');
Route::get('status_city_submit/{id}/{status}', 'CityController@status_city_submit');


Route::get('block_status_city_submit', 'CityController@block_status_city_submit');
Route::get('unblock_status_city_submit', 'CityController@unblock_status_city_submit');
Route::post('update_default_city_submit', 'CityController@update_default_city_submit');

//admin-> categories management
Route::get('add_category', 'CategoryController@add_category');
Route::any('check_avail_cat_name', 'CategoryController@check_avail_cat_name');
Route::post('add_category_submit', 'CategoryController@add_category_submit');
Route::get('manage_category', 'CategoryController@manage_category');
Route::get('edit_category/{id}', 'CategoryController@edit_category');
Route::post('edit_category_submit', 'CategoryController@edit_category_submit');
Route::get('status_category_submit/{id}/{status}', 'CategoryController@status_category_submit');
Route::get('block_status_category_submit', 'CategoryController@block_status_category_submit');
Route::get('unblock_status_category_submit', 'CategoryController@unblock_status_category_submit');

Route::get('delete_category/{id}', 'CategoryController@delete_category');
Route::get('add_main_category/{id}', 'CategoryController@add_main_category');
Route::post('add_main_category_submit', 'CategoryController@add_main_category_submit');
Route::get('manage_main_category/{id}', 'CategoryController@manage_main_category');

Route::get('edit_main_category/{id}', 'CategoryController@edit_main_category');
Route::post('edit_main_category_submit', 'CategoryController@edit_main_category_submit');
Route::get('status_main_category_submit/{id}/{mc_id}/{status}', 'CategoryController@status_main_category_submit');
Route::get('delete_main_category/{id}/{mc_id}', 'CategoryController@delete_main_category');

Route::get('add_sub_main_category/{id}', 'CategoryController@add_sub_main_category');
Route::post('add_sub_category_submit', 'CategoryController@add_sub_category_submit');
Route::get('manage_sub_category/{id}', 'CategoryController@manage_sub_category');
Route::get('add_secsub_main_category/{id}', 'CategoryController@add_secsub_main_category');
Route::post('add_secsub_category_submit', 'CategoryController@add_secsub_main_category_submit');
Route::get('edit_secsub_main_category/{id}', 'CategoryController@edit_secsub_main_category');
Route::post('edit_secsub_category_submit', 'CategoryController@edit_secsub_category_submit');
Route::get('status_sub_category_submit/{id}/{mc_id}/{status}', 'CategoryController@status_subsec_category_submit');
Route::get('delete_sub_category/{id}/{mc_id}', 'CategoryController@delete_subsec_category');
Route::get('manage_secsubmain_category/{id}', 'CategoryController@manage_secsubmain_category');
Route::get('status_secsub_category_submit/{id}/{mc_id}/{status}', 'CategoryController@status_secsub_category_submit');
Route::get('delete_secsub_category/{id}/{mc_id}', 'CategoryController@delete_secsub_category');
Route::get('edit_sec1sub_main_category/{id}', 'CategoryController@edit_sec1sub_main_category');
Route::post('edit_sec1sub_category_submit', 'CategoryController@edit_sec1sub_category_submit');

//admin-> settings->FAQ
Route::get('add_faq', 'FaqController@add_faq');
Route::get('manage_faq','FaqController@manage_faq');
Route::post('add_faq_submit','FaqController@add_faq_submit');
Route::post('update_faq_submit', 'FaqController@update_faq_submit');
Route::get('edit_faq/{id}', 'FaqController@edit_faq');
Route::get('delete_faq/{id}', 'FaqController@delete_faq');
Route::get('status_faq_submit/{id}/{status}', 'FaqController@update_status_faq');
Route::get('delete_faq_multiple', 'FaqController@delete_faq_multiple');
Route::get('status_faq_submit_multiple', 'FaqController@status_faq_submit_multiple');
Route::get('status_faq_submit_multiple_unblock', 'FaqController@status_faq_submit_multiple_unblock');

//admin->settings->Ads Management 
Route::get('add_ad', 'AdController@add_ad');
Route::post('add_ad_submit', 'AdController@add_ad_submit');
Route::get('manage_ad', 'AdController@manage_ad');
Route::get('edit_ad/{id}', 'AdController@edit_ad');
Route::post('edit_ad_submit', 'AdController@edit_ad_submit');
Route::get('delete_ad/{id}', 'AdController@delete_ad');
Route::get('status_ad_submit/{id}/{status}', 'AdController@status_ad_submit');
Route::get('block_ads_multiple', 'AdController@block_ads_multiple');
Route::get('unblock_ads_multiple', 'AdController@unblock_ads_multiple');

//admin -> Settings -> Newsletter
Route::get('send_newsletter', 'SettingsController@send_newsletter');
Route::post('send_newsletter_submit', 'SettingsController@send_newsletter_submit');
Route::get('manage_newsletter_subscribers', 'SettingsController@manage_newsletter_subscribers');
Route::get('edit_newsletter_subscriber_status/{id}/{status}', 'SettingsController@edit_newsletter_subscriber_status');
Route::get('delete_newsletter_subscriber/{id}', 'SettingsController@delete_newsletter_subscriber');
//admin ->product->Add Product
Route::get('add_product', 'ProductController@add_product');
Route::post('get_spec_related_to_cat', 'ProductController@get_spec_related_to_cat');

Route::post('add_product_submit', 'ProductController@add_product_submit');
Route::any('check_product_exists','ProductController@check_product_exists');
Route::any('check_product_exists_edit','ProductController@check_product_exists_edit');
Route::any('check_product_exists_dynamic','ProductController@check_product_exists_dynamic');
Route::get('product_getmaincategory', 'ProductController@product_getmaincategory');
Route::get('mer_product_getmaincategory', 'ProductController@mer_product_getmaincategory');
Route::get('product_getsubcategory', 'ProductController@product_getsubcategory');
Route::get('mer_product_getsubcategory', 'ProductController@mer_product_getsubcategory');
Route::get('product_getsecondsubcategory', 'ProductController@product_getsecondsubcategory');
Route::get('mer_product_getsecondsubcategory', 'ProductController@mer_product_getsecondsubcategory');
Route::get('product_getcolor', 'ProductController@product_getcolor');
Route::get('product_getsize', 'ProductController@product_getsize');
Route::get('add_estimated_zipcode', 'ProductController@add_estimated_zipcode');
Route::post('add_estimated_zipcode_submit', 'ProductController@add_estimated_zipcode_submit');
Route::get('estimated_zipcode','ProductController@estimated_zipcode');
Route::get('edit_zipcode/{id}', 'ProductController@edit_zipcode');
Route::get('block_zipcode/{id}/{status}', 'ProductController@block_zipcode');
Route::post('edit_estimated_zipcode_submit', 'ProductController@edit_estimated_zipcode_submit');
Route::get('product_get_spec','ProductController@product_get_spec');

Route::get('product_edit_getmaincategory', 'ProductController@product_edit_getmaincategory');
Route::get('product_edit_getsubcategory', 'ProductController@product_edit_getsubcategory' );
Route::get('product_edit_getsecondsubcategory', 'ProductController@product_edit_getsecondsubcategory');
 
Route::post('edit_product_submit', 'ProductController@edit_product_submit');
Route::get('edit_product/{id}', 'ProductController@edit_product');
Route::any('delete_product_img/{id}/{image}','ProductController@delete_product_img');
Route::get('delete_product/{id}', 'ProductController@delete_product');
Route::get('delete_product_page_multiple', 'ProductController@delete_product_page_multiple');



Route::get('mer_delete_product/{id}', 'MerchantproductController@delete_product');
Route::get('manage_product','ProductController@manage_product');
Route::post('manage_product','ProductController@manage_product');
Route::get('block_product/{id}/{status}','ProductController@block_product');
Route::get('product_details/{id}', 'ProductController@product_details');
Route::get('manage_product_shipping_details','ProductController@manage_product_shipping_details');
Route::get('manage_cashondelivery_details','ProductController@manage_cashondelivery_details');
Route::get('sold_product', 'ProductController@sold_product');
Route::post('sold_product', 'ProductController@sold_product');
// Route::get('product_getmerchantshop', 'ProductController@product_getmerchantshop');
Route::get('product_getmerchantshop_ajax', 'ProductController@product_getmerchantshop');
Route::get('product_mer_shop_selected','ProductController@product_mer_shop_selected');
Route::get('mer_product_getmerchantshop','ProductController@mer_product_getmerchantshop');

Route::get('product_dashboard', 'ProductController@product_dashboard');
Route::get('block_product_multiple', 'ProductController@block_product_multiple');
Route::get('unblock_product_multiple', 'ProductController@unblock_product_multiple');
//admin->customer->add customer
Route::get('add_customer','CustomerController@add_customer');
Route::get('load_getcity','CustomerController@getcity');
Route::post('add_customer_submit','CustomerController@add_customer_submit');
Route::any('check_cus_email_exist','CustomerController@check_cus_email_exist');
Route::any('check_cus_email_exist_edit','CustomerController@check_cus_email_exist_edit');
Route::post('edit_customer_submit','CustomerController@edit_customer_submit');
Route::get('edit_customer/{id}','CustomerController@edit_customer');
Route::get('delete_customer/{id}','CustomerController@delete_customer');
Route::get('status_customer_submit/{id}/{status}','CustomerController@status_customer_submit');
Route::get('customer_edit_getcity','CustomerController@customer_edit_getcity');
Route::get('manage_customer','CustomerController@manage_customer');
Route::post('manage_customer','CustomerController@manage_customer');
Route::get('manage_subscribers','CustomerController@manage_subscribers');
Route::get('edit_subscriber_status/{id}/{status}','CustomerController@edit_subscriber_status');
Route::get('delete_subscriber/{id}','CustomerController@delete_subscriber');
Route::get('manage_inquires','CustomerController@manage_inquires');
Route::post('manage_inquires','CustomerController@manage_inquires');
Route::get('send_inquiry_email/{id}','CustomerController@send_inquiry_email');
Route::get('delete_inquires/{id}','CustomerController@delete_inquires');
Route::get('manage_referral_users','CustomerController@manage_referral_users');
Route::get('customer_dashboard', 'CustomerController@customer_dashboard');
Route::get('block_status_customer_submit', 'CustomerController@block_status_customer_submit');
Route::get('unblock_status_customer_submit', 'CustomerController@unblock_status_customer_submit');
Route::get('delete_customer_page/{id}','CustomerController@delete_customer_page');
Route::get('delete_customer_page_multiple','CustomerController@delete_customer_page_multiple');

//admin ->general settings

Route::get('general_setting', 'SettingsController@general_setting');
Route::post('general_setting_submit', 'SettingsController@general_setting_submit');
Route::get('email_setting', 'SettingsController@email_setting');
Route::post('email_setting_submit', 'SettingsController@email_setting_submit');
Route::get('smtp_setting', 'SettingsController@smtp_setting');
Route::post('smtp_setting_submit', 'SettingsController@smtp_setting_submit');
Route::post('send_setting_submit', 'SettingsController@send_setting_submit');

//Admin -> Settings-> Social media settings

Route::get('social_media_settings','SettingsController@social_media_settings');
Route::post('social_media_setting_submit', 'SettingsController@social_media_setting_submit');
Route::get('payment_settings', 'SettingsController@payment_settings');
Route::get('select_currency_value_ajax', 'SettingsController@select_currency_value_ajax');
Route::post('payment_settings_submit', 'SettingsController@payment_settings_submit');
Route::get('module_settings', 'SettingsController@module_settings');
Route::post('module_settings_submit', 'SettingsController@module_settings_submit');

Route::get('ajax_select_city','AdminController@ajax_select_city');
Route::get('ajax_select_city_edit', 'AdminController@ajax_select_city_edit');

//admin->merchants->add merchant

//Route::get('add_merchant','MerchantController@add_merchant');

//Route::post('add_merchant_submit', 'MerchantController@add_merchant_submit');
//Route::any('check_mer_email_exist','MerchantController@check_mer_email');
// Route::get('edit_merchant/{id}','MerchantController@edit_merchant');
//Route::post('edit_merchant_submit', 'MerchantController@edit_merchant_submit');
//Route::get('manage_merchant', 'MerchantController@manage_merchant');
//Route::post('manage_merchant', 'MerchantController@manage_merchant');
// Route::any('manage_store_review', 'MerchantController@manage_store_review');
// Route::get('edit_store_review/{id}', 'MerchantController@edit_store_review');
//Route::get('manage_enquiry', 'MerchantController@manage_enquiry');
//Route::get('block_merchant/{id}/{status}', 'MerchantController@block_merchant');
//Route::get('block_merchant_product/{id}/{status}', 'MerchantController@block_merchant_product');
//Route::get('manage_store/{id}', 'MerchantController@manage_store');
//Route::get('add_store/{id}', 'MerchantController@add_store');
//Route::post('add_store_submit','MerchantController@add_store_submit');
//Route::get('edit_store/{id}/{mer_id}','MerchantController@edit_store');
//Route::post('edit_store_submit','MerchantController@edit_store_submit');
//Route::get('block_store/{id}/{status}/{mer_id}', 'MerchantController@block_store');
//Route::get('merchant_dashboard', 'MerchantController@merchant_dashboard');
//Route::get('block_status_merchant_submit', 'MerchantController@block_status_merchant_submit');
//Route::get('unblock_status_merchant_submit', 'MerchantController@unblock_status_merchant_submit');
//admin-> Auction
Route::get('auction_dashboard', 'AuctionController@auction_dashboard');
Route::get('add_auction', 'AuctionController@add_auction');
Route::get('auction_winners', 'AuctionController@auction_winners');
Route::get('auction_cod', 'AuctionController@auction_cod');
Route::get('cancel_auction_cod/{id}', 'AuctionController@cancel_auction_cod');
Route::post('add_auction_submit', 'AuctionController@add_auction_submit');
//for ajax
Route::get('auction_select_main_cat', 'AuctionController@auction_select_main_cat');
Route::get('auction_select_sub_cat', 'AuctionController@auction_select_sub_cat');
Route::get('auction_select_second_sub_cat', 'AuctionController@auction_select_second_sub_cat');
Route::get('auction_edit_select_main_cat', 'AuctionController@auction_edit_select_main_cat');
Route::get('auction_edit_select_sub_cat', 'AuctionController@auction_edit_select_sub_cat' );
Route::get('auction_edit_second_sub_cat', 'AuctionController@auction_edit_second_sub_cat');
Route::get('check_auctiontitle_exist','AuctionController@check_auctiontitle_exist');
Route::get('check_auctiontitle_exist_edit', 'AuctionController@check_auctiontitle_exist_edit');
// Route::get('auction_select_store_name', 'AuctionController@auction_select_store_name');
Route::get('auction_select_store_name_edit', 'AuctionController@auction_select_store_name_edit');
//for ajax
Route::post('edit_auction_submit', 'AuctionController@edit_auction_submit');
Route::get('edit_auction/{id}', 'AuctionController@edit_auction');
Route::get('manage_auction','AuctionController@manage_auction');
Route::get('block_auction/{id}/{status}','AuctionController@block_auction');
Route::get('auction_details/{id}', 'AuctionController@auction_details');
Route::get('expired_auction', 'AuctionController@expired_auction');

//merchant-> Auction
Route::get('merchant_add_auction', 'MerchantauctionController@add_auction');
Route::post('merchant_add_auction_submit', 'MerchantauctionController@add_auction_submit');
Route::get('merchant_auction_winners', 'MerchantauctionController@auction_winners');
Route::get('merchant_auction_cod', 'MerchantauctionController@auction_cod');



//for ajax
Route::get('check_auctiontitle_exist','MerchantauctionController@check_auctiontitle_exist');
Route::get('check_auctiontitle_exist_edit', 'MerchantauctionController@check_auctiontitle_exist_edit');
Route::get('auction_select_store_name', 'MerchantauctionController@auction_select_store_name');
Route::get('auction_select_store_name_edit', 'MerchantauctionController@auction_select_store_name_edit');
//for ajax
Route::post('merchant_edit_auction_submit', 'MerchantauctionController@edit_auction_submit');
Route::get('merchant_edit_auction/{id}', 'MerchantauctionController@edit_auction');
Route::get('merchant_manage_auction','MerchantauctionController@manage_auction');
Route::get('merchant_block_auction/{id}/{status}','MerchantauctionController@block_auction');
Route::get('merchant_auction_details/{id}', 'MerchantauctionController@auction_details');
Route::get('merchant_expired_auction', 'MerchantauctionController@expired_auction');
Route::get('merchant_block_auction/{id}/{status}/{merid}','MerchantauctionController@block_auction');





//admin-> Deals



//adming-Blogs
Route::get('add_blog', 'BlogController@add_blog');
Route::post('add_blog_submit', 'BlogController@add_blog_submit');
Route::get('manage_draft_blog', 'BlogController@manage_draft_blog');
Route::get('manage_publish_blog', 'BlogController@manage_publish_blog');
Route::get('block_blog/{id}/{status}/{blog_type}', 'BlogController@block_blog');
Route::get('delete_blog_submit/{id}/{blog_type}', 'BlogController@delete_blog_submit');
Route::get('edit_blog/{id}', 'BlogController@edit_blog');
Route::post('edit_blog_submit', 'BlogController@edit_blog_submit');
Route::get('blog_details/{id}', 'BlogController@blog_details');
Route::get('blog_settings', 'BlogController@blog_settings');
Route::post('edit_blog_settings', 'BlogController@edit_blog_settings');
Route::get('manage_blogcmts', 'BlogController@manage_blogcomments');
Route::get('status_blogcmt_submit/{cmtid}/{status}','BlogController@status_blogcmt_submit');
Route::get('reply_blogcmts/{cmtid}', 'BlogController@reply_blogcmts');
Route::post('admin_blogreply_submit', 'BlogController@admin_blogreply_submit');

//admin ->Image settings 
Route::get('add_logo', 'ImagesettingsController@add_logo');
Route::post('add_logo_submit', 'ImagesettingsController@add_logo_submit');
Route::get('add_favicon', 'ImagesettingsController@add_favicon');
Route::post('add_favicon_submit', 'ImagesettingsController@add_favicon_submit');
Route::get('add_noimage', 'ImagesettingsController@add_noimage');
Route::post('add_noimage_submit', 'ImagesettingsController@add_noimage_submit');


//admin Transactions
Route::get('show_transactions', 'TransactionController@show_transactions');
Route::get('show_all_deals_transactions', 'TransactionController@show_all_deals_transactions');
Route::any('all_offline_transaction','TransactionController@all_offline_transaction');
Route::any('all_online_transaction','TransactionController@all_online_transaction');

Route::get('update_cod_order_status_admin', 'TransactionController@update_order_cod_admin');
Route::get('update_cod_order_status_admin_deal', 'TransactionController@update_order_cod_admin_deal');
Route::get('update_paypal_order_status_admin', 'TransactionController@update_order_paypal_admin');
Route::get('update_deal_order_paypal_admin', 'TransactionController@update_deal_order_paypal_admin');

Route::get('product_all_orders', 'TransactionController@product_all_orders');
Route::post('product_all_orders', 'TransactionController@product_all_orders');
Route::get('product_success_orders', 'TransactionController@product_success_orders');
Route::post('product_success_orders', 'TransactionController@product_success_orders');
Route::get('product_failed_orders', 'TransactionController@product_failed_orders');
Route::post('product_failed_orders', 'TransactionController@product_failed_orders');
Route::get('product_completed_orders', 'TransactionController@product_completed_orders');
Route::post('product_completed_orders', 'TransactionController@product_completed_orders');
Route::get('product_hold_orders', 'TransactionController@product_hold_orders');
Route::post('product_hold_orders', 'TransactionController@product_hold_orders');
Route::get('cod_all_orders', 'TransactionController@cod_all_orders');
Route::post('cod_all_orders', 'TransactionController@cod_all_orders');
Route::get('cod_completed_orders', 'TransactionController@cod_completed_orders');
Route::get('cod_hold_orders', 'TransactionController@cod_hold_orders');
Route::get('cod_failed_orders', 'TransactionController@cod_failed_orders');

Route::post('cod_completed_orders', 'TransactionController@cod_completed_orders');
Route::post('cod_hold_orders', 'TransactionController@cod_hold_orders');
Route::post('cod_failed_orders', 'TransactionController@cod_failed_orders');

Route::get('deals_all_orders', 'TransactionController@deals_all_orders');
Route::post('deals_all_orders', 'TransactionController@deals_all_orders');
Route::get('deals_success_orders', 'TransactionController@deals_success_orders');
Route::post('deals_success_orders', 'TransactionController@deals_success_orders');
Route::get('deals_failed_orders', 'TransactionController@deals_failed_orders');
Route::post('deals_failed_orders', 'TransactionController@deals_failed_orders');
Route::get('deals_completed_orders', 'TransactionController@deals_completed_orders');
Route::post('deals_completed_orders', 'TransactionController@deals_completed_orders');
Route::get('deals_hold_orders', 'TransactionController@deals_hold_orders');
Route::post('deals_hold_orders', 'TransactionController@deals_hold_orders');

Route::get('dealscod_all_orders', 'TransactionController@dealscod_all_orders');
Route::get('dealscod_completed_orders', 'TransactionController@dealscod_completed_orders');
Route::get('dealscod_hold_orders', 'TransactionController@dealscod_hold_orders');
Route::get('dealscod_failed_orders', 'TransactionController@dealscod_failed_orders');

Route::post('dealscod_all_orders', 'TransactionController@dealscod_all_orders');
Route::post('dealscod_completed_orders', 'TransactionController@dealscod_completed_orders');
Route::post('dealscod_hold_orders', 'TransactionController@dealscod_hold_orders');
Route::post('dealscod_failed_orders', 'TransactionController@dealscod_failed_orders');

Route::get('fund_request', 'FundController@fund_request');
Route::get('with_fund_request', 'FundController@with_fund_request');
Route::post('withdraw_submit',  'FundController@withdraw_submit');


//local mobile json route

Route::any('front_end_banner_image', 'MobileController@home_page_banner_image');
Route::any('country_list', 'MobileController@country_list');
Route::any('city_list', 'MobileController@mobile_city_list');
Route::any('normal_signup/{name}/{email}/{password}/{country}/{city}', 'MobileController@user_signup');
Route::any('signin/{email}/{password}', 'MobileController@user_login');
Route::any('facebook_signup/{name}/{email}', 'MobileController@facebook_login');
Route::any('all_main_category_list', 'MobileController@all_main_category_list');
Route::any('mobile_products', 'MobileController@Products');
Route::any('product_detail_page/{id}', 'MobileController@product_mobile_category_list');
Route::any('product_detail_page_image_list/{id}', 'MobileController@product_detail_page_image_list');
Route::any('mobile_deals', 'MobileController@Deals');
Route::any('mobile_deals_detail_view/{id}', 'MobileController@deals_detail_view');
Route::any('deal_detail_page_image_list/{id}', 'MobileController@deal_detail_page_image_list');
Route::any('mobile_auctions', 'MobileController@Acutions');
Route::any('auction_detail_view/{id}', 'MobileController@auction_detail_view');
Route::any('auction_detail_view_image_list/{id}', 'MobileController@auction_detail_view_image_list');
Route::any('auction_bidder_detail/{id}', 'MobileController@auction_bidder_detail');
Route::any('auction_customer_bidder_detail/{id}', 'MobileController@auction_customer_bidder_detail');

Route::any('mobile_bid_payment/{bid_auc_id}/{oa_cus_id}/{oa_cus_name}/{oa_cus_email}/{oa_cus_address}/{oa_bid_amt}/{oa_bid_shipping_amt}/{oa_original_bit_amt}', 'MobileController@mobile_bid_payment');
Route::any('update_user_profile/{cus_id}/{name}/{email}/{phone}/{country_id}/{city_id}', 'MobileController@update_user_profile');
Route::any('my_buys/{id}', 'MobileController@product_my_buys');
Route::any('profile_image_submit/{cus_id}', 'MobileController@profile_image_submit');
Route::any('sub_category_list/{id}', 'MobileController@sub_category_list');
Route::any('country_selected_city/{id}', 'MobileController@country_selected_city');
Route::any('facebook_signup/{name}/{email}/{password}/{country}/{city}', 'MobileController@facebook_login');
Route::any('cash_and_delivery/{cus_id}/{cust_name}/{cust_address}/{cust_mobile}/{cust_city}/{cust_country}/{cust_zip}', 'MobileController@shipping_delivery');
Route::any('purchase_cod_order_list/{cus_id}/{pro_id}/{cod_qty}/{cod_amt}/{cod_pro_color}/{cod_pro_size}/{order_type}/{ship_addr}/{token_id}', 'MobileController@purchase_cod_order_list');
Route::any('paypal/{cus_id}/{pro_id}/{cod_qty}/{cod_amt}/{cod_pro_color}/{cod_pro_size}/{order_type}/{ship_addr}/{token_id}', 'MobileController@paypal');
Route::any('bidding_history/{cus_id}', 'MobileController@bidding_history');

Route::any('near_me_map_products', 'MobileController@near_me_map_products');
Route::any('near_me_map_deals', 'MobileController@near_me_map_deals');
Route::any('near_me_map_auction', 'MobileController@near_me_map_auction');
/*Route::any('stores_list', 'MobileController@stores_list');*/


Route::any('get_profile_image/{cus_id}', 'MobileController@get_profile_image');



Route::any('store_dealview_detail_by_id/{store_id}', 'MobileController@store_dealview_detail_by_id');
Route::any('store_productview_detail_by_id/{store_id}', 'MobileController@store_productview_detail_by_id');
Route::any('store_auctionview_detail_by_id/{store_id}', 'MobileController@store_auctionview_detail_by_id');
Route::any('terms_condition', 'MobileController@terms_condition');
Route::any('related_product_details/{pid}', 'MobileController@related_product_details');
Route::any('related_deal_details/{deal_id}', 'MobileController@related_deal_details');
Route::any('related_auction_details/{deal_id}', 'MobileController@related_auction_details');
Route::any('add_position', 'MobileController@add_position');
Route::any('add_pages', 'MobileController@add_pages');
Route::any('request_for_advertisment/{add_title}/{ads_position}/{ads_pages}/{url}', 'MobileController@request_for_advertisment');
Route::any('forgot_password_check/{email}', 'MobileController@forgot_password_check');

/* 07nov16  */
Route::get('cms/{id}', 'FooterController@cms');
Route::get('aboutus','FooterController@aboutus');

// Vinod mobile api

Route::any('home_page', 'MobileController@home_page_details');


//product review
Route::get('manage_review','ProductController@manage_review');
Route::get('edit_review/{id}', 'ProductController@edit_review');
Route::post('edit_review_submit', 'ProductController@edit_review_submit');
Route::get('block_review/{id}/{status}','ProductController@block_review');
Route::get('delete_review/{id}', 'ProductController@delete_review');
// Route::any('edit_store_review_submit', 'MerchantController@edit_store_review_submit');

Route::get('block_store_review/{id}/{status}','MerchantController@block_review');
Route::get('delete_store_review/{id}', 'MerchantController@delete_review');

//deal review
Route::get('manage_deal_review','DealsController@manage_deal_review');
Route::get('edit_deal_review/{id}', 'DealsController@edit_deal_review');
Route::post('edit_deal_review_submit', 'DealsController@edit_deal_review_submit');
Route::get('block_deal_review/{id}/{status}','DealsController@block_deal_review');
Route::get('delete_deal_review/{id}', 'DealsController@delete_deal_review');

//Coupon code
Route::get('manage_coupon', 'CouponController@manage_coupon');
Route::get('add_coupon', 'CouponController@add_coupon');
Route::post('add_coupon_submit', 'CouponController@add_coupon_submit');
/*k ajax coupon*/
Route::any('get_user_name_ajax', 'CouponController@get_user_name_ajax');

Route::get('ajax_add_coupon_data','CouponController@ajax_add_coupon_data');
Route::get('coupon_id_ajax','CouponController@coupon_id_ajax');
Route::get('status_coupon_submit/{id}/{status}', 'CouponController@status_coupon_submit');
Route::get('edit_coupon/{id}', 'CouponController@edit_coupon');
Route::post('edit_coupon_submit', 'CouponController@edit_coupon_submit');
Route::any('ajax_coupon_submit', 'CouponController@ajax_coupon_submit');
Route::post('ajax_coupon_store', 'CouponController@ajax_coupon_store');
Route::post('ajax_coupon_delete', 'CouponController@ajax_coupon_delete');
Route::get('ajax_usercoupon_submit', 'CouponController@ajax_usercoupon_submit');
Route::post('ajax_user_coupon_delete', 'CouponController@ajax_user_coupon_delete');
Route::get('delete_coupon/{id}','CouponController@delete_coupon');
Route::get('cannot_delete_coupon','CouponController@cannot_delete_coupon');
Route::post('ajax_product_data', 'CouponController@ajax_product_data');
Route::post('check_coupon_code', 'CouponController@check_coupon_code');
Route::post('check_userlist_citywise', 'CouponController@check_userlist_citywise');

//Wellet
Route::post('ajax_wallet_session_set', 'CouponController@ajax_wallet_session_set');
Route::post('ajax_wallet_session_unset', 'CouponController@ajax_wallet_session_unset');

// siteadmin -> setting -> category banner setting 
Route::get('add_categorybanner','CategoryBannerController@add_mainmenu_banner');
Route::post('add_categorybanner_submit','CategoryBannerController@add_categorybanner_submit');
Route::get('manage_category_banner','CategoryBannerController@manage_category_banner');
Route::get('delete_category_banner/{id}','CategoryBannerController@delete_category_banner');
Route::get('status_category_banner/{id}/{status}','CategoryBannerController@status_category_banner');
Route::any('edit_category_banner/{id}','CategoryBannerController@edit_category_banner');
Route::any('edit_category_banner_submit','CategoryBannerController@edit_category_banner_submit');
Route::any('delete_cat_img/{id}/{image}','CategoryBannerController@delete_cat_img');
// siteadmin -> setting-> category banner setting 

//saranya
//category advertisement setting
// siteadmin -> setting -> category advertisement setting
Route::any('add_advertisement', 'AdvertisementController@add_advertisement');
Route::post('add_advertisement_submit','AdvertisementController@add_advertisement_submit');
Route::get('manage_advertisement','AdvertisementController@manage_advertisement');
Route::get('status_advertisement_banner/{id}/{status}','AdvertisementController@status_advertisement_banner');
Route::get('delete_ad_img/{id}/{image}','AdvertisementController@delete_ad_img');
Route::get('delete_advertisement_banner/{id}','AdvertisementController@delete_advertisement_banner');
Route::get('edit_advertisement/{id}','AdvertisementController@edit_advertisement');
Route::any('edit_advertisement_submit','AdvertisementController@edit_advertisement_submit');
Route::any('remove_ad_img/{id}/{image}','AdvertisementController@delete_ad_img');
Route::get('block_ad_multiple','AdvertisementController@block_ad_multiple');
Route::get('unblock_ad_multiple','AdvertisementController@unblock_ad_multiple');
// siteadmin -> setting -> category advertisement setting



Route::any('fund_paypal/{data}', 'TransactionController@fund_paypal');
Route::any('paypal_success', 'TransactionController@paypal_success');
//Route::any('dump_fields','TransactionController@paypal_success');
Route::any('paypal_ipn', 'TransactionController@paypal_ipn');
Route::any('paypal_cancel', 'TransactionController@paypal_cancel');


//product compare
Route::any('product_compare_ajax','ProductController@product_compare');
Route::any('clear_compare','ProductController@clear_compare');
Route::any('compare_products','ProductController@compare_products');
Route::any('remove_compare_product','ProductController@remove_compare_product');
//remove wishlist 
Route::any('remove_wish_product/{id}','CustomerprofileController@remove_wish_product');


/*kathir language change*/
Route::any('new_change_languages','HomeController@new_change_languages');

/*Admin Lang Conversion*/
Route::any('admin_new_change_languages','AdminController@admin_new_change_languages');


// Vinod mobile api
Route::any('api/registration','MobileController@user_registration');
Route::any('api/user_login','MobileController@login_user');
Route::any('api/forgot_password','MobileController@login_user_forgot');
Route::any('api/facebook_login','MobileController@user_facebook_login');
Route::any('api/country_city_list','MobileController@country_city_listing');
Route::any('api/home_page','MobileController@home_page_listing');
Route::any('api/category_list','MobileController@category_list');
// Products
Route::any('api/product_list_by_category','MobileController@product_list_category');
Route::any('api/product_search_by_filter','MobileController@product_list_filter');
Route::any('api/add_to_wishlist','MobileController@addtowish');
Route::any('api/product_detail_page','MobileController@product_details');
Route::any('api/product_write_review','MobileController@product_review');
Route::any('api/add_to_cart','MobileController@add_cart');
Route::any('api/update_product_cart','MobileController@update_cart');
Route::any('api/cart_list','MobileController@cart_list');
Route::any('api/remove_productcart','MobileController@remove_cart_product');
// Deals 
Route::any('api/deals_list', 'MobileController@deal_list');
Route::any('api/deal_detail','MobileController@deal_detail');
Route::any('api/deal_write_review','MobileController@deal_review');
Route::any('api/add_to_dealcart','MobileController@add_cart_deal');
Route::any('api/update_deal_cart','MobileController@update_dealcart');
Route::any('api/remove_dealcart','MobileController@remove_cart_deal');
Route::any('api/dealcart_list','MobileController@deal_cart_list');

// user module
Route::any('api/update_my_account','MobileController@user_my_account_update');
Route::any('api/my_account','MobileController@user_my_account');
Route::any('api/reset_password','MobileController@login_user_reset');
Route::any('api/my_wishlist','MobileController@user_my_wishlist');
Route::any('api/my_orders','MobileController@user_my_orders');

// Store Modules
Route::any('api/shop_list','MobileController@shop_list');
Route::any('api/shop_detail_by_id','MobileController@shop_detail');
Route::any('api/near_by_shop_list','MobileController@nearby_shop_list');
Route::any('api/store_write_review','MobileController@store_review');


// Payment Gateways

Route::any('api/enabledRdisabled_list','MobileController@enabledRdisabled_payment_listing');
/*COD*/
Route::any('api/product_cod_order','MobileController@product_order_cod');
Route::any('api/product_cod_order_buy_now','MobileController@product_order_cod_buy_now');
Route::any('api/deal_order_buy_now','MobileController@order_deal_cod_buy_now');
/* Paypal */
Route::post('api/product_paypal_order_success','MobileController@product_order_paypal');
Route::any('api/deal_paypal_order_success_buy_now','MobileController@order_deal_paypal_buy_now');
Route::any('api/product_paypal_order_success_buy_now','MobileController@product_order_paypal_buy_now');

/*Payumoney */
Route::any('api/product_payumoney_order_success','MobileController@product_order_payumoney');   //cart
Route::any('api/deal_payumoney_order_success_buy_now','MobileController@order_deal_payumoney_buy_now'); // deal
Route::any('api/product_payumoney_order_success_buy_now','MobileController@product_order_payumoney_buy_now');//product

Route::any('api/nearmemap_search','MobileController@near_me_map_search');

/* Paypal Currency Converstion */
Route::any('api/get_currency_values','MobileController@get_currency_amount');

//in admin manage lanaguage
Route::any('manage_lang','SettingsController@manage_lang');
Route::any('update_default_lang_submit','SettingsController@update_default_lang_submit');
Route::any('status_lang_submit/{id}/{status}','SettingsController@status_lang_submit');

/* Image crop rotate and manipulation starts */\
Route::any('ajaxEditImage','ProductController@ajaxEditImage');
Route::any('CropNdUpload','ProductController@CropNdUpload');

/* Image crop rotate and manipulation ends */

/* merchant overorder validation  */
Route::any('checkMerchantOverOrderReport','MerchantTransactionController@checkMerchantOverOrderReport');

/* Merchant commission(merchant pay to admin) listing */
Route::any('commission_listing','MerchantTransactionController@commission_listing');

/* Merchnat Commision paid list */
Route::any('commission_paid','MerchantTransactionController@commission_paid');

/* Merchant offline payment */
Route::get('commission_offline_pay/{data}', 'MerchantTransactionController@commission_offline_pay');
Route::any('commission_offline_pay_submit', 'MerchantTransactionController@commission_offline_pay_submit');
/* Merchant Commission Payment online */
Route::get('commission_paypal/{data}', 'MerchantTransactionController@commission_paypal');
Route::post('commission_paypal_success', 'MerchantTransactionController@commission_paypal_success');
Route::post('commission_paypal_ipn', 'MerchantTransactionController@commission_paypal_ipn');
Route::get('commission_paypal_cancel', 'MerchantTransactionController@commission_paypal_cancel');

/* coupon - get user by city - this route is missing so added here over bug fixing time */

Route::any('check_userlist_citywise', 'CouponController@check_userlist_citywise');
/* In admin panel -  Merchant commission(merchant pay to admin) listing */
Route::any('admincommission_listing','TransactionController@commission_listing');   

/* Crop And Edit starts */  
//admin Deal Image
Route::any('CropNdUpload_deal','DealsController@CropNdUpload_deal');
//admin Store Image
Route::any('CropNdUpload_store','MerchantController@CropNdUpload_store');

//admin banner Image
Route::any('CropNdUpload_banner','BannerController@CropNdUpload_banner');
//admin category banner Image
Route::any('CropNdUpload_catBanner','CategoryBannerController@CropNdUpload_catBanner');
//admin category Advertisment Image
Route::any('CropNdUpload_ad','AdvertisementController@CropNdUpload_ad');
//admin category Image
Route::any('CropNdUpload_catImg','CategoryController@CropNdUpload_catImg');
//admin second sub-category Image
Route::any('CropNdUpload_secSubcatImg','CategoryController@CropNdUpload_secSubcatImg');
//Ad Image
Route::any('CropNdUpload_adImg','AdController@CropNdUpload_adImg');
//Blog Image
Route::any('CropNdUpload_blogImg','BlogController@CropNdUpload_blogImg');

//merchant Deal Image
Route::any('CropNdUpload_deal','DealsController@CropNdUpload_deal');
//merchant Store Image
Route::any('mer_CropNdUpload_store','MerchantshopController@mer_CropNdUpload_store');
//merchant DEal Image
Route::any('mer_CropNdUpload_deal','MerchantdealsController@mer_CropNdUpload_deal');

//merchant Product Image
Route::any('mer_CropNdUpload_product','MerchantproductController@mer_CropNdUpload_product');


/* Crop And Edit ends */    

/* PRODUCT BULK UPLOAD STARTS */
Route::get('product_bulk_upload','ProductController@product_bulk_upload');
Route::post('product_bulk_upload_submit', 'ProductController@product_bulk_upload_submit');
/* PRODUCT BULK UPLOAD ENDS */    

/* Order product cancel */
                          
Route::any('cancel_order','CustomerprofileController@cancel_order_product');
Route::any('return_order','CustomerprofileController@return_order_product');
Route::any('replace_order','CustomerprofileController@replace_order_product');

Route::any('deal_cancel_order','CustomerprofileController@cancel_order_deal');
Route::any('deal_return_order','CustomerprofileController@return_order_deal');
Route::any('deal_replace_order','CustomerprofileController@replace_order_deal');


/*admin -  deal cancel,return and repalcement */
Route::any('adm_deal_cancel_orders', 'TransactionController@adm_deal_cancel_orders');
Route::any('adm_deal_return_orders', 'TransactionController@adm_deal_return_orders');

Route::get('adm_deal_get_approve_REturncontent_paypal/{id}', 'TransactionController@deal_get_approve_REturncontent_paypal');
Route::post('adm_deal_approve_return_request_paypal', 'TransactionController@deal_approve_return_request_paypal');
Route::any('adm_deal_replacement_orders', 'TransactionController@deal_replacement_orders');
Route::any('adm_deal_get_approve_replacecontent_paypal/{id}', 'TransactionController@deal_get_approve_replacecontent_paypal');
Route::any('adm_deal_get_approve_replacecontent_cod/{id}', 'TransactionController@deal_get_approve_replacecontent_cod');
Route::post('adm_deal_approve_replace_request_paypal', 'TransactionController@deal_approve_replace_request_paypal');
Route::post('adm_deal_approve_replace_request_cod', 'TransactionController@deal_approve_replace_request_cod');
Route::any('adm_deal_get_approve_content_paypal/{id}', 'TransactionController@deal_get_approve_content_paypal');
Route::post('adm_deal_approve_cancel_request_paypal', 'TransactionController@deal_approve_cancel_request_paypal');

//cod deal 
Route::any('adm_dealcod_cancel_orders', 'TransactionController@dealcod_cancel_orders');
Route::any('adm_deal_get_approve_content/{id}', 'TransactionController@deal_get_approve_content');
Route::post('adm_deal_approve_cancel_request', 'TransactionController@deal_approve_cancel_request');

Route::any('adm_dealcod_return_orders', 'TransactionController@adm_dealcod_return_orders');
Route::get('adm_deal_get_approve_REturncontent/{id}', 'TransactionController@deal_get_approve_REturncontent');
Route::any('adm_deal_approve_return_request', 'TransactionController@deal_approve_return_request');
Route::any('adm_dealcod_replacement_orders', 'TransactionController@dealcod_replacement_orders');
Route::any('adm_deal_get_approve_replacecontent/{id}', 'TransactionController@deal_get_approve_replacecontent');
Route::post('adm_deal_approve_replace_request', 'TransactionController@deal_approve_replace_request');

/* admin - deal cancel,return and repalcement */
/* admin - product cancel,return and repalcement */

//paypal
Route::any('adm_cancel_orders', 'TransactionController@adm_cancel_orders');
Route::any('adm_return_orders', 'TransactionController@adm_return_orders');

Route::any('adm_get_approve_REturncontent_paypal/{id}', 'TransactionController@get_approve_REturncontent_paypal');
Route::post('adm_approve_return_request_paypal', 'TransactionController@approve_return_request_paypal');
Route::any('adm_replacement_orders', 'TransactionController@adm_replacement_orders');
Route::any('adm_get_approve_replacecontent_paypal/{id}', 'TransactionController@get_approve_replacecontent_paypal');
Route::post('adm_approve_replace_request_paypal', 'TransactionController@approve_replace_request_paypal');
Route::any('adm_get_approve_content_paypal/{id}', 'TransactionController@get_approve_content_paypal');
Route::post('adm_approve_cancel_request_paypal', 'TransactionController@approve_cancel_request_paypal');


//cod 

Route::any('adm_cod_cancel_orders', 'TransactionController@adm_cod_cancel_orders');
Route::any('adm_get_approve_content/{id}', 'TransactionController@get_approve_content');
Route::post('adm_approve_cancel_request', 'TransactionController@approve_cancel_request');
Route::any('adm_cod_return_orders', 'TransactionController@adm_cod_return_orders');
Route::get('adm_get_approve_REturncontent/{id}', 'TransactionController@get_approve_Returncontent');
Route::post('adm_approve_return_request', 'TransactionController@approve_return_request');
Route::any('adm_cod_replacement_orders', 'TransactionController@adm_cod_replacement_orders');
Route::any('adm_get_approve_replacecontent/{id}', 'TransactionController@get_approve_replacecontent');
Route::any('adm_approve_replace_request', 'TransactionController@approve_replace_request');

/* admin - product cancel,return and repalcement */
// product bulk upload
Route::get('product_bulk_upload','ProductBulkUploadController@product_bulk_upload');
Route::post('product_bulk_upload_submit', 'ProductBulkUploadController@product_bulk_upload_submit');
Route::post('product_image_bulk_upload_submit', 'ProductBulkUploadController@product_image_bulk_upload_submit');
Route::any('delete_zip/{folder_name}', 'ProductBulkUploadController@delete_zip_folder');

//product bulk edit

Route::get('product_bulk_upload_edit','ProductBulkUploadController@product_bulk_upload_edit');
Route::post('product_bulk_upload_submit_edit', 'ProductBulkUploadController@product_bulk_upload_submit_edit');
Route::post('product_image_bulk_upload_submit_edit', 'ProductBulkUploadController@product_image_bulk_upload_submit_edit');
Route::any('delete_zip_edit/{folder_name}', 'ProductBulkUploadController@delete_zip_folder_edit');
Route::any('download_all_products', 'ProductBulkUploadController@download_all_products');






Route::get('mer_product_bulk_upload','mer_ProductBulkUploadController@product_bulk_upload');
Route::post('mer_product_bulk_upload_submit', 'mer_ProductBulkUploadController@product_bulk_upload_submit');
Route::post('mer_product_image_bulk_upload_submit', 'mer_ProductBulkUploadController@product_image_bulk_upload_submit');
Route::any('mer_delete_zip/{folder_name}', 'mer_ProductBulkUploadController@delete_zip_folder');
// product bulk upload

//cityname based on countryname for checkout
Route::get('register_getcityname','HomeController@register_getcityname_ajax');
Route::any('payumoney_check_out_payumoney','PayumoneyController@payumoney_check_out');
Route::any('response_sucess','PayumoneyController@payumoney_sucess');
Route::any('response_failed','PayumoneyController@payumoney_failed');





//Route::get('ajax_select_city_name_edit', 'HomeController@ajax_select_city_edit');

/* Payumoney in siteadmin */
Route::get('deals_payumoney_shipping_details','DealsController@deals_payumoney_shipping_details');
Route::get('product_payumoney_shipping_details','ProductController@product_payumoney_shipping_details');
Route::get('update_deal_order_payumoney_admin', 'TransactionController@update_deal_order_payumoney_admin');

// Product PayUMoney 
Route::get('product_payu_all_orders', 'TransactionController@product_payu_all_orders');
Route::post('product_payu_all_orders', 'TransactionController@product_payu_all_orders');
Route::any('product_payu_success_orders', 'TransactionController@product_payu_success_orders');
Route::any('product_payu_failed_orders', 'TransactionController@product_payu_failed_orders');
Route::get('update_payu_order_status_admin', 'TransactionController@update_order_payu_admin');


/* Deals Payumoney transaction */
Route::get('deals_payu_all_orders', 'TransactionController@deals_payu_all_orders');
Route::post('deals_payu_all_orders', 'TransactionController@deals_payu_all_orders');
Route::get('deals_payu_success_orders', 'TransactionController@deals_payu_success_orders');
Route::post('deals_payu_success_orders', 'TransactionController@deals_payu_success_orders');
Route::get('deals_payu_failed_orders', 'TransactionController@deals_payu_failed_orders');
Route::post('deals_payu_failed_orders', 'TransactionController@deals_payu_failed_orders');


Route::post('adm_deal_approve_return_request_payu', 'TransactionController@deal_approve_return_request_payu');

// PayUmoney deals
Route::any('adm_deal_payu_cancel_orders', 'TransactionController@adm_deal_payu_cancel_orders');
Route::any('adm_deal_payu_return_orders', 'TransactionController@adm_deal_payu_return_orders');
Route::any('adm_deal_payu_replacement_orders', 'TransactionController@adm_deal_payu_replacement_orders');
Route::get('adm_deal_get_approve_REturncontent_payu/{id}', 'TransactionController@deal_get_approve_REturncontent_payu');
Route::any('adm_deal_get_approve_replacecontent_payu/{id}', 'TransactionController@deal_get_approve_replacecontent_payu');
Route::post('adm_deal_approve_replace_request_payu', 'TransactionController@deal_approve_replace_request_payu');
Route::any('adm_deal_get_approve_content_payu/{id}', 'TransactionController@deal_get_approve_content_payu');
Route::post('adm_deal_approve_cancel_request_payu', 'TransactionController@deal_approve_cancel_request_payu');


// Product PayUmoney
Route::any('adm_payu_cancel_orders', 'TransactionController@adm_payu_cancel_orders');
Route::any('adm_payu_return_orders', 'TransactionController@adm_payu_return_orders');
Route::any('adm_payu_replacement_orders', 'TransactionController@adm_payu_replacement_orders');
Route::any('adm_get_approve_content_payu/{id}', 'TransactionController@get_approve_content_payu');
Route::post('adm_approve_cancel_request_payu', 'TransactionController@approve_cancel_request_payu');
Route::any('adm_get_approve_REturncontent_payu/{id}', 'TransactionController@get_approve_REturncontent_payu');
Route::post('adm_approve_return_request_payu', 'TransactionController@approve_return_request_payu');
Route::any('adm_get_approve_replacecontent_payu/{id}', 'TransactionController@get_approve_replacecontent_payu');
Route::post('adm_approve_replace_request_payu', 'TransactionController@approve_replace_request_payu');

 
Route::any('deal_get_approve_content_payu/{id}', 'MerchantTransactionController@deal_get_approve_content_payu');
Route::any('deal_approve_cancel_request_payu', 'MerchantTransactionController@deal_approve_cancel_request_payu');
Route::any('deal_get_approve_Returncontent_payu/{id}', 'MerchantTransactionController@deal_get_approve_Returncontent_payu');
Route::any('deal_approve_return_request_payu', 'MerchantTransactionController@deal_approve_return_request_payu');
Route::any('deal_approve_replace_request_payu', 'MerchantTransactionController@deal_approve_replace_request_payu');
Route::any('deal_get_approve_replacecontent_payu/{id}', 'MerchantTransactionController@deal_get_approve_replacecontent_payu');
/* Merchant transaction */

Route::any('payu_deals_all_orders', 'MerchantTransactionController@payu_deals_all_orders');
Route::any('payu_deals_success_orders', 'MerchantTransactionController@payu_deals_success_orders');
Route::any('payu_deals_hold_orders', 'MerchantTransactionController@payu_deals_hold_orders');
Route::any('mer_payu_deals_failed_orders', 'MerchantTransactionController@mer_payu_deals_failed_orders');
Route::any('mer_payu_deal_cancel_orders', 'MerchantTransactionController@mer_payu_deal_cancel_orders');
Route::any('mer_payu_deal_return_orders', 'MerchantTransactionController@mer_payu_deal_return_orders');
Route::any('mer_payu_deal_replacement_orders', 'MerchantTransactionController@mer_payu_deal_replacement_orders');

Route::any('merchant_payu_product_all_orders', 'MerchantTransactionController@merchant_payu_product_all_orders');
Route::any('merchant_payu_product_success_orders', 'MerchantTransactionController@payu_product_success_orders');
Route::any('merchant_payu_product_hold_orders', 'MerchantTransactionController@payu_product_hold_orders');
Route::any('merchant_payu_product_failed_orders', 'MerchantTransactionController@payu_product_failed_orders');
Route::any('mer_payu_cancel_orders', 'MerchantTransactionController@mer_payu_cancel_orders');

Route::get('get_payu_approve_content/{id}', 'MerchantTransactionController@get_payu_approve_content');
Route::post('approve_cancel_request_payumoney', 'MerchantTransactionController@approve_cancel_request_payumoney');
Route::post('mer_payu_deals_failed_orders', 'MerchantTransactionController@mer_payu_deals_failed_orders');
Route::any('mer_payu_return_orders', 'MerchantTransactionController@mer_payu_return_orders');
Route::any('get_approve_Returncontent_payu/{id}', 'MerchantTransactionController@get_approve_Returncontent_payu');
Route::any('approve_return_request_payu', 'MerchantTransactionController@approve_return_request_payu');

Route::any('mer_payu_replacement_orders', 'MerchantTransactionController@mer_payu_replacement_orders');
Route::any('get_approve_replacecontent_payu/{id}', 'MerchantTransactionController@get_approve_replacecontent_payumoney');
Route::any('approve_replace_request_payu', 'MerchantTransactionController@approve_replace_request_payu');

/* Customer profile delivery status change - product  */
Route::any('product_payu_cancel_order','CustomerprofileController@cancel_order_product_payu');
Route::any('product_payu_return_order','CustomerprofileController@return_order_product_payu');
Route::any('product_payu_replace_order','CustomerprofileController@replace_order_product_payu');


/*  Customer profile delivery status change - deal  */
Route::any('deal_payu_cancel_order','CustomerprofileController@cancel_order_deal_payu');
Route::any('deal_payu_return_order','CustomerprofileController@return_order_deal_payu');
Route::any('deal_payu_replace_order','CustomerprofileController@replace_order_deal_payu');
Route::get('update_payu_order_status', 'MerchantTransactionController@update_order_payumoney');
Route::get('update_deal_order_payu', 'MerchantTransactionController@update_deal_order_payu');

Route::any('fund_payu/{data}', 'TransactionController@fund_payu');
Route::any('fund_payu_success', 'TransactionController@fund_payu_success');
/*Route::post('paypal_ipn', 'TransactionController@paypal_ipn');*/
Route::any('fund_payu_failed', 'TransactionController@fund_payu_failed');

//google plus login
Route::any('google_login','HomeController@google_login');