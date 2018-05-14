<?php
namespace App\Http\Controllers;
use DB;
use Session;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Footer;
use App\Settings;

use App\Userlogin;
use App\Customerprofile;
use App\Products;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CustomerprofileController extends Controller
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


    public function get_userprofile($pagenumber=""){
        if(Input::has('id')==1) { 
            $tab_active = Input::get('id');
        } else { $tab_active =1; }
        if (Session::has('customerid')) {
            $customerid          = Session::get('customerid');
			$facebook_id         = Session::get('facebook_id');
            $get_category_header = Home::get_category_header();
            $product_details     = Home::get_product_details();
            $customerdetails     = Customerprofile::get_customer_details($customerid);
			foreach($customerdetails  as $customer_detail_country){
			$cus_country_id=$customer_detail_country->cus_country;
			$cus_ship_id=$customer_detail_country->ship_ci_id;
			$cus_ship_coun_id=$customer_detail_country->ship_country;
			
			}
		
			$city_shipping = Register::get_city_list_shipping($cus_ship_coun_id);
			$city_det = Register::get_city_list_ajax($cus_country_id);
			
			
            $general         = Customerprofile::get_general_settings();
            $wishlistdetails = Customerprofile::get_wishlistdetails($customerid);
            $wishlistcnt     = Customerprofile::get_wishlistdetailscnt($customerid);
            
            
            //$checkcustomership = Customerprofile::get_customer_shipping_details($customerid,$facebook_id);
            $checkcustomership   = Customerprofile::get_cus_ship_details($customerid);
            $city_details                = Register::get_city_details();
			//$city_details_country;
            $header_category             = Home::get_header_category();
            $country_details             = Register::get_country_details();
			
            $getmetadetails              = Home::getmetadetails();
            
            $getproductordersdetails     = Customerprofile::getproductordersdetails($customerid);
			$getproductordersdetailspayu     = Customerprofile::getproductordersdetailspayu($customerid);
			
			
			$getproductorderpaypal_orderwise = Customerprofile::getproductorderpaypal_orderwise($customerid);
			$getproductorderpayumoney_orderwise=Customerprofile::getproductorderpayumoney_orderwise($customerid); //payumoneydetails
		
			
            $getproductordersdetailss     = Customerprofile::getproductordersdetailss($customerid);
            $getproductcod                = Customerprofile::getproductordercod($customerid);
			
			$getproductordercod_orderwise = Customerprofile::getproductordercod_orderwise($customerid);
			//print_r($getproductordercod_orderwise);
			//exit;
            $get_deal_COD = Customerprofile::get_deal_COD_details($customerid);
			$get_deal_PayPal = Customerprofile::get_deal_Paypal_details($customerid);
			$get_deal_Payumoney = Customerprofile::get_deal_Payumoney_details($customerid);
           // print_r($get_deal_Payumoney);exit();
			//print_r($getproductordercod_orderwise);exit;
			
			$getproductwallet_used_amt   = Customerprofile::getproductwallet_used_amt($customerid);
            
			//$shippingdetails = Products::get_shipping_details();
		    $coddetails 				 = Products::get_cod_details();
			$cms_page_title              = Home::get_cms_page_title();
            $get_social_media_url        = Footer::get_social_media_url();
            $get_meta_details            = Home::get_meta_details();
            $get_image_favicons_details  = Home::get_image_favicons_details();
            $get_image_logoicons_details = Home::get_image_logoicons_details();
            $getlogodetails              = Home::getlogodetails();
            $get_contact_det             = Footer::get_contact_details();
            $getanl                      = Settings::social_media_settings();
            $navbar                      = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
            $header                      = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
            $footer                      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
            $shippingdetails             = Customerprofile::get_shipping_details($customerid);


            //cancel ,return and replacement process starts
            
            if($checkcustomership){   
                return view('customer_profile')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('customerdetails', $customerdetails)->with('city_details', $city_details)->with('country_details', $country_details)->with('shippingdetails', $shippingdetails)->with('hasship', 1)->with('getproductordersdetails', $getproductordersdetails)->with('getproductordersdetailss', $getproductordersdetailss)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('wishlistdetails', $wishlistdetails)->with('wishlistcnt', $wishlistcnt)->with('product_details', $product_details)->with('get_contact_det', $get_contact_det)->with('general', $general)->with('getproductcod', $getproductcod)->with('getproductwallet_used_amt',$getproductwallet_used_amt)->with('getproductordercod_orderwise',$getproductordercod_orderwise)->with('getproductorderpaypal_orderwise',$getproductorderpaypal_orderwise)->with('coddetail',$coddetails)->with('tab_active',$tab_active)->with('get_deal_COD',$get_deal_COD)->with('get_deal_PayPal',$get_deal_PayPal)->with('city_det',$city_det)->with('city_shipping',$city_shipping)->with('getproductorderpayumoney_orderwise',$getproductorderpayumoney_orderwise)->with('get_deal_Payumoney',$get_deal_Payumoney);
            } else {
                return view('customer_profile')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('customerdetails', $customerdetails)->with('country_details', $country_details)->with('shippingdetails', $shippingdetails)->with('hasship', 0)->with('getproductordersdetails', $getproductordersdetails)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('wishlistdetails', $wishlistdetails)->with('wishlistcnt', $wishlistcnt)->with('product_details', $product_details)->with('get_contact_det', $get_contact_det)->with('general', $general)->with('tab_active',$tab_active)->with('get_deal_COD',$get_deal_COD)->with('get_deal_PayPal',$get_deal_PayPal)->with('city_det',$city_det);
            }

        }else{
            return Redirect::to('/');
        }
        
    }
	
        
    public function update_username_ajax()
    {
        $customerid  = Session::get('customerid');
        $cname       = $_GET['cname'];
        $checkinsert = Customerprofile::update_customer_name($cname, $customerid);
        if ($checkinsert) {
            echo "success," . $cname;
        } else {
            echo "fail,";
        }
    }

    public function update_phonenumber_ajax(Request $request)
    {
		$this->validate($request,
		[
		//'phonenum' => 'required|numeric',
		'phonenum'=>'Required|Numeric|Regex:/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s.]{0,1}[0-9]{3}[-\s.]{0,1}[0-9]{4}$/',
		]);
        $customerid  = Session::get('customerid');
        $phonenum    = $_GET['phonenum'];
        $checkupdate = Customerprofile::update_phonenumber($phonenum, $customerid);
        if ($checkupdate) {
            echo "success," . $phonenum;
        } else {
            echo "fail,";
        }
    }

    public function update_city_ajax()
    {
        $customerid = Session::get('customerid');
        $cityid     = $_GET['cityid'];
        $countryid  = $_GET['countryid'];
        
        $citynameres    = Customerprofile::getcityname($cityid);
        $cityname       = $citynameres[0]->ci_name;
        $countrynameres = Customerprofile::getcountryname($countryid);
        $countryname    = $countrynameres[0]->co_name;
        $checkupdate    = Customerprofile::update_city($cityid, $countryid, $customerid);
        if ($checkupdate) {
            echo "success," . $countryname . "," . $cityname;
        } else {
            echo "fail,";
        }
    }
    
    public function update_shipping_ajax()
    {
        
        $customerid    = Session::get('customerid');
        $shipcus       = $_GET['shipcus'];
        $shipaddr1     = $_GET['shipaddr1'];
        $shipaddr2     = $_GET['shipaddr2'];
        $shipcusmobile = $_GET['shipcusmobile'];
        $shipcusemail  = $_GET['shipcusemail'];
        $shippingstate = $_GET['shippingstate'];
        $zipcode       = $_GET['zipcode'];
        $cityid        = $_GET['shippingcity'];
        $countryid     = $_GET['shippingcountry'];
        $entry         = array(
            'ship_name' => $shipcus,
            'ship_address1' => $shipaddr1,
            'ship_address2' => $shipaddr2,
            'ship_ci_id' => $cityid,
            'ship_state' => $shippingstate,
            'ship_country' => $countryid,
            'ship_postalcode' => $zipcode,
            'ship_phone' => $shipcusmobile,
            'ship_email' => $shipcusemail,
           
        );
        
        $checkcustomerid = Customerprofile::update_cus_ship_details($entry,$customerid);

        
        if ($checkcustomerid) {
            echo "success";
        }else{
            echo "fail";
         }
         /*else {
            
            $return = Customerprofile::insert_shipping($shipcus, $shipaddr1, $shipaddr2, $shipcusmobile, $shipcusemail, $shippingstate, $zipcode, $cityid, $countryid, $customerid);
            
            if ($return) {
                echo "success";
            } else {
                echo "fail";
            }
       }*/
        
    }
    
    public function register_getcity_shipping()
    {
        $cityid    = $_GET['id'];
        $city_ajax = Merchant::get_city_detail_ajax_shipping($cityid);
        if ($city_ajax) {
            $return = "";
            
            foreach ($city_ajax as $fetch_city_ajax) {
				if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
					$ci_name = 'ci_name';
				}else {  $ci_name = 'ci_name_'.Session::get('lang_code'); }
									
                $return .= "<option value='" . $fetch_city_ajax->ci_id . "'> " . $fetch_city_ajax->$ci_name . " </option>";
            }
            echo $return;
        } else {
			if (Lang::has(Session::get('lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{
 					$session_message =  trans(Session::get('lang_file').'.BACK_NO_DATAS_FOUND');
			}  
			else 
			{
					$session_message =  trans($this->OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}

            echo $return = "<option value=''> $session_message </option>";
        }
       
    }
    
    public function update_address_ajax()
    {
        $customerid = Session::get('customerid');
        $addr1      = $_GET['addr1'];
        $addr2      = $_GET['addr2'];
        if ($_GET['addr1'] != "" && $_GET['addr2'] != "") {
            $addr1            = $_GET['addr1'];
            $checkupdateaddr1 = Customerprofile::update_address1($addr1, $customerid);
            $checkupdateaddr2 = Customerprofile::update_address2($addr2, $customerid);
            echo "success," . $addr1 . "," . $addr2;
            
        } else if ($_GET['addr1'] != "") {
            $addr2            = $_GET['addr1'];
            $checkupdateaddr1 = Customerprofile::update_address2($addr1, $customerid);
            echo "success," . $addr1 . "," . $addr2;
        } else if ($_GET['addr2'] != "") {
            $addr2            = $_GET['addr2'];
            $checkupdateaddr2 = Customerprofile::update_address2($addr2, $customerid);
            echo "success," . $addr1 . "," . $addr2;
        }
        
    }

    public function update_password_ajax()
    {
        $customerid    = Session::get('customerid');
        $oldpwd        = $_POST['oldpwd'];
        $md5oldpwd     = md5($oldpwd);
        $newpwd        = $_POST['newpwd'];
        $confirmpwd    = $_POST['confirmpwd'];
        $md5confirmpwd = md5($confirmpwd);
        $oldpwdcheck   = Customerprofile::check_oldpwd($customerid, $md5oldpwd);
        
        if ($newpwd != $confirmpwd) {
            echo "fail1,";
        } else {
            if ($oldpwdcheck) {
                $updatecheck = Customerprofile::update_newpwd($customerid, $md5confirmpwd);
                if ($updatecheck) {
                    echo "success,";
                } else {
                    
                    echo "fail2,";
                    
                }
                
            }
            
        }
        
        
    }

    public function profile_image_submit(Request $request)
    {
		$this->validate($request, 
            [
			'imgfile'=>'required|image|mimes:jpeg,png|max:10000',	
			]);
        
        $customerid = Session::get('customerid');
        $inputs   = Input::all();
        $file     = Input::file('imgfile');
        $filename = $file->getClientOriginalName();
        $move_img = explode('.', $filename);
        $filename        = $move_img[0] . str_random(8) . "." . $move_img[1];
        $destinationPath = './public/assets/profileimage/';
        $uploadSuccess   = Input::file('imgfile')->move($destinationPath, $filename);
        $updateimage     = Customerprofile::update_profileimage($customerid, $filename);
        if ($updateimage) {
            return Redirect::to('user_profile');
        }
    }
    
    public function user_logout()
    {
		$lang_code = Session::get('lang_code');
        Session::forget('customerid');
        Session::forget('username');
        Session::forget('user_name');
		unset($_SESSION['token']);
		unset($_SESSION['userData']);
       // unset($_SESSION['compare_product']);
        Session::forget('compare_product');
        Session::flush();
        session_destroy();
        Session::put('lang_code',$lang_code);
        return Redirect::to('/');
    }
    public function facebook_logout()
    {
        Session::forget('customerid');
        Session::forget('username');
        Session::forget('user_name');
        Session::flush();
        session_destroy();
        return Redirect::to('/');
    }

    public function remove_wish_product($id){  // getting wishlist_id to remove wishlist from table 
        $remove = Customerprofile::remove_wish_product($id);
        return Redirect::back();
    }

    //Cancel Product - send request
    public function cancel_order_product(){  
        //print_r($_POST);exit();
        if(Session::has('customerid')){
            $cancel_ord_id      = Input::get('cancel_item_id');
            $payment_type       = Input::get('order_payment_type');
            $cancel_note        = Input::get('cancel_notes');
            $customer_mail      = Input::get('customer_mail');
            $mer_id             = Input::get('mer_id');
            $order_type         = Input::get('order_type');

            if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                $pro_title = 'pro_title';
            }else {  $pro_title = 'pro_title_'.Session::get('lang_code'); }

            if($payment_type==0) //Cod Order details
            {
                $get_order_Details = Products::get_cod_details_bycodID($cancel_ord_id);
                //print_r(count($get_order_Details));


                if(count($get_order_Details)>0)
                {
                    $date1  = date('Y-m-d H:i:s');
                    $get_prod = DB::table('nm_product')->where('pro_id','=',$get_order_Details->cod_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $entry  = array('order_cust_id'     => $get_order_Details->cod_cus_id,
                                    'cod_order_id'      => $get_order_Details->cod_id,
                                    'prod_id'           => $get_order_Details->cod_pro_id,
                                    'mer_id'            => $get_order_Details->cod_merchant_id,
                                    'order_type'        => $get_order_Details->cod_order_type,
                                    'transaction_id'    => $get_order_Details->cod_transaction_id,
                                    'payment_type'      => $get_order_Details->cod_paytype,
                                    'cancel_status'     => '1', //cancel pending
                                    'cancel_notes'      => $cancel_note,    
                                    'cancel_date'       => $date1    
                              );
                    $check_productDelivery = Products::getexistDeliveryOption($get_order_Details->cod_id,$get_order_Details->cod_paytype);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                       $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }

                    //send mail 
                    if($delStatus_id !=''){
                        //Order delivery status change

                        DB::table('nm_ordercod')->where('cod_id', '=', $get_order_Details->cod_id)->update(array('delivery_status' => '5' )); //cancel pending status
                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->cod_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.cancelOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'cancel_notes'      =>  $cancel_note,
                                'date' =>  $entry['cancel_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order Cancellation Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.cancelOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'cancel_notes'      =>  $cancel_note,
                                    'date' =>  $entry['cancel_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order Cancellation Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            }
            if($payment_type==1) //Paypal Order details
            {

                $get_order_Details = Products::get_paypal_details_byorderID($cancel_ord_id);
                if(count($get_order_Details)>0)
                {

                    $get_prod = DB::table('nm_product')->where('pro_id','=',$get_order_Details->order_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $date1  = date('Y-m-d H:i:s');
                    $entry  = array('order_cust_id'     => $get_order_Details->order_cus_id,
                                    'order_id'          => $get_order_Details->order_id,
                                    'prod_id'           => $get_order_Details->order_pro_id,
                                    'mer_id'            => $get_order_Details->order_merchant_id,
                                    'order_type'        => $get_order_Details->order_type,
                                    'transaction_id'    => $get_order_Details->transaction_id,
                                    'payment_type'      => $get_order_Details->order_paytype,
                                    'cancel_status'     => '1', //cancel pending
                                    'cancel_notes'      => $cancel_note,
                                    'cancel_date'       => $date1    
                              );

                    
                    $check_productDelivery = Products::getexistDeliveryOption($get_order_Details->order_id,$get_order_Details->order_paytype);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                        $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }
                    //send mail 
                    if($delStatus_id !=''){
                         //Order delivery status change

                        DB::table('nm_order')->where('order_id', '=', $get_order_Details->order_id)->update(array('delivery_status' => '5' )); //cancel pending status

                        include('SMTP/sendmail.php');
                         //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->order_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.cancelOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'cancel_notes'      =>  $cancel_note,
                                'date' =>  $entry['cancel_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order Cancellation Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.cancelOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'cancel_notes'      =>  $cancel_note,
                                    'date' =>  $entry['cancel_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order Cancellation Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            } 
            return Redirect::back();
        }
        else{
            return Redirect::to('/');
        }
    }

    /* Payumoney product cancel */

     public function cancel_order_product_payu(){  
        //print_r($_POST);exit();
        if(Session::has('customerid')){
            $cancel_ord_id      = Input::get('cancel_item_id');
            $payment_type       = Input::get('order_payment_type');
            $cancel_note        = Input::get('cancel_notes');
            $customer_mail      = Input::get('customer_mail');
            $mer_id             = Input::get('mer_id');
            $order_type         = Input::get('order_type');

            if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                $pro_title = 'pro_title';
            }else {  $pro_title = 'pro_title_'.Session::get('lang_code'); }
           
            if($payment_type==1) //Payumoney Order details
            {

                $get_order_Details = Products::get_payumoney_details_byorderID($cancel_ord_id);
                if(count($get_order_Details)>0)
                {

                    $get_prod = DB::table('nm_product')->where('pro_id','=',$get_order_Details->order_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $date1  = date('Y-m-d H:i:s');
                    $entry  = array('order_cust_id'     => $get_order_Details->order_cus_id,
                                    'order_id'          => $get_order_Details->order_id,
                                    'prod_id'           => $get_order_Details->order_pro_id,
                                    'mer_id'            => $get_order_Details->order_merchant_id,
                                    'order_type'        => $get_order_Details->order_type,
                                    'transaction_id'    => $get_order_Details->transaction_id,
                                    'payment_type'      => $get_order_Details->order_paytype,
                                    'cancel_status'     => '1', //cancel pending
                                    'cancel_notes'      => $cancel_note,
                                    'cancel_date'       => $date1    
                              );

                    
                    $check_productDelivery = Products::getexistDeliveryOption_payu($get_order_Details->order_id,$get_order_Details->order_paytype,$get_order_Details->transaction_id);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                        $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }
                    //send mail 
                    if($delStatus_id !=''){
                         //Order delivery status change

                        DB::table('nm_order_payu')->where('order_id', '=', $get_order_Details->order_id)->where('transaction_id','=', $get_order_Details->transaction_id)->update(array('delivery_status' => '5' )); //cancel pending status

                        include('SMTP/sendmail.php');
                         //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->order_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.cancelOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'cancel_notes'      =>  $cancel_note,
                                'date' =>  $entry['cancel_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order Cancellation Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.cancelOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'cancel_notes'      =>  $cancel_note,
                                    'date' =>  $entry['cancel_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order Cancellation Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            } 
            return Redirect::back();
        }
        else{
            return Redirect::to('/');
        }
    }
    /* Payumoney product cancel ends */ 

    //return product - send request
    public function return_order_product(){  
        //print_r($_POST);exit();
        if(Session::has('customerid')){
            $return_ord_id      = Input::get('return_item_id');
            $payment_type       = Input::get('order_payment_type');
            $return_note        = Input::get('return_notes');
            $customer_mail      = Input::get('customer_mail');

            if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                $pro_title = 'pro_title';
            }else {  $pro_title = 'pro_title_'.Session::get('lang_code'); }

            if($payment_type==0) //Cod Order details
            {
                $get_order_Details = Products::get_cod_details_bycodID($return_ord_id);
                //print_r(count($get_order_Details));


                if(count($get_order_Details)>0)
                {
                    $date1  = date('Y-m-d H:i:s');
                    $get_prod = DB::table('nm_product')->where('pro_id','=',$get_order_Details->cod_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $entry  = array('order_cust_id'     => $get_order_Details->cod_cus_id,
                                    'cod_order_id'      => $get_order_Details->cod_id,
                                    'prod_id'           => $get_order_Details->cod_pro_id,
                                    'mer_id'            => $get_order_Details->cod_merchant_id,
                                    'order_type'        => $get_order_Details->cod_order_type,  
                                    'transaction_id'    => $get_order_Details->cod_transaction_id,
                                    'payment_type'      => $get_order_Details->cod_paytype,
                                    'return_status'     => '1', //cancel pending
                                    'return_notes'      => $return_note,    
                                    'return_date'       => $date1    
                              );
                    $check_productDelivery = Products::getexistDeliveryOption($get_order_Details->cod_id,$get_order_Details->cod_paytype);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                       $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }

                    //send mail 
                    if($delStatus_id !=''){
                        //Order delivery status change

                        DB::table('nm_ordercod')->where('cod_id', '=', $get_order_Details->cod_id)->update(array('delivery_status' => '7' )); //return pending status
                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->cod_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.returnOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  $return_note,
                                'date' =>  $entry['return_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order return Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.returnOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  $return_note,
                                    'date' =>  $entry['return_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order return Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            }
            if($payment_type==1) //Paypal Order details
            {
                $get_order_Details = Products::get_paypal_details_byorderID($return_ord_id);
                if(count($get_order_Details)>0)
                {
                    $get_prod = DB::table('nm_product')->where('pro_id','=',$get_order_Details->order_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $date1  = date('Y-m-d H:i:s');
                    $entry  = array('order_cust_id'     => $get_order_Details->order_cus_id,
                                    'order_id'          => $get_order_Details->order_id,
                                    'prod_id'           => $get_order_Details->order_pro_id,
                                    'mer_id'            => $get_order_Details->order_merchant_id,
                                    'order_type'        => $get_order_Details->order_type,
                                    'transaction_id'    => $get_order_Details->transaction_id,
                                    'payment_type'      => $get_order_Details->order_paytype,
                                    'return_status'     => '1', //cancel pending
                                    'return_notes'      => $return_note,
                                    'return_date'       => $date1    
                              );

                    
                    $check_productDelivery = Products::getexistDeliveryOption($get_order_Details->order_id,$get_order_Details->order_paytype);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                        $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }
                    //send mail 
                    if($delStatus_id !=''){
                         //Order delivery status change

                        DB::table('nm_order')->where('order_id', '=', $get_order_Details->order_id)->update(array('delivery_status' => '7' )); //return pending status

                        include('SMTP/sendmail.php');
                         //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->order_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.returnOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  $return_note,
                                'date' =>  $entry['return_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order return Request send');
                            });     
                        }    
                      
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.returnOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  $return_note,
                                    'date' =>  $entry['return_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order return Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            } 
            return Redirect::back();
        }
        else{
            return Redirect::to('/');
        }
    }

    /* payumoney return product */

    public function return_order_product_payu(){  
        //print_r($_POST);exit();
        if(Session::has('customerid')){
            $return_ord_id      = Input::get('return_item_id');
            $payment_type       = Input::get('order_payment_type');
            $return_note        = Input::get('return_notes');
            $customer_mail      = Input::get('customer_mail');

            if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                $pro_title = 'pro_title';
            }else {  $pro_title = 'pro_title_'.Session::get('lang_code'); }

            if($payment_type==1) //Payumoney Order details
            {
                $get_order_Details = Products::get_payumoney_details_byorderID($return_ord_id);
                if(count($get_order_Details)>0)
                {
                    $get_prod = DB::table('nm_product')->where('pro_id','=',$get_order_Details->order_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $date1  = date('Y-m-d H:i:s');
                    $entry  = array('order_cust_id'     => $get_order_Details->order_cus_id,
                                    'order_id'          => $get_order_Details->order_id,
                                    'prod_id'           => $get_order_Details->order_pro_id,
                                    'mer_id'            => $get_order_Details->order_merchant_id,
                                    'order_type'        => $get_order_Details->order_type,
                                    'transaction_id'    => $get_order_Details->transaction_id,
                                    'payment_type'      => $get_order_Details->order_paytype,
                                    'return_status'     => '1', //cancel pending
                                    'return_notes'      => $return_note,
                                    'return_date'       => $date1    
                              );

                    
                    $check_productDelivery = Products::getexistDeliveryOption_payu($get_order_Details->order_id,$get_order_Details->order_paytype,$get_order_Details->transaction_id);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                        $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }
                    //send mail 
                    if($delStatus_id !=''){
                         //Order delivery status change

                        DB::table('nm_order_payu')->where('order_id', '=', $get_order_Details->order_id)->where('transaction_id','=', $get_order_Details->transaction_id)->update(array('delivery_status' => '7' )); //return pending status

                        include('SMTP/sendmail.php');
                         //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->order_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.returnOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  $return_note,
                                'date' =>  $entry['return_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order return Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.returnOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  $return_note,
                                    'date' =>  $entry['return_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order return Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            } 
            return Redirect::back();
        }
        else{
            return Redirect::to('/');
        }
    }

    /* payumoney return product ends */

    //replace product - send request
    public function replace_order_product(){  
        //print_r($_POST);exit();
        if(Session::has('customerid')){
            $replace_ord_id      = Input::get('replace_item_id');
            $payment_type       = Input::get('order_payment_type');
            $replace_note        = Input::get('replace_notes');
            $customer_mail      = Input::get('customer_mail');

            if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                $pro_title = 'pro_title';
            }else {  $pro_title = 'pro_title_'.Session::get('lang_code'); }

            if($payment_type==0) //Cod Order details
            {
                $get_order_Details = Products::get_cod_details_bycodID($replace_ord_id);
                //print_r(count($get_order_Details));


                if(count($get_order_Details)>0)
                {
                    $date1  = date('Y-m-d H:i:s');
                    $get_prod = DB::table('nm_product')->where('pro_id','=',$get_order_Details->cod_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $entry  = array('order_cust_id'     => $get_order_Details->cod_cus_id,
                                    'cod_order_id'      => $get_order_Details->cod_id,
                                    'prod_id'           => $get_order_Details->cod_pro_id,
                                    'mer_id'            => $get_order_Details->cod_merchant_id,
                                    'order_type'        => $get_order_Details->cod_order_type,
                                    'transaction_id'    => $get_order_Details->cod_transaction_id,
                                    'payment_type'      => $get_order_Details->cod_paytype,
                                    'replace_status'     => '1', //cancel pending
                                    'replace_notes'      => $replace_note,    
                                    'replace_date'       => $date1    
                              );
                    $check_productDelivery = Products::getexistDeliveryOption($get_order_Details->cod_id,$get_order_Details->cod_paytype);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                       $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }

                    //send mail and order delivery status
                    if($delStatus_id !=''){
                        //Order delivery status change

                        DB::table('nm_ordercod')->where('cod_id', '=', $get_order_Details->cod_id)->update(array('delivery_status' => '9' )); //replace pending status

                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->cod_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'replace_notes'      =>  $replace_note,
                                'date' =>  $entry['replace_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'replace_notes'      =>  $replace_note,
                                    'date' =>  $entry['replace_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            }
            if($payment_type==1) //Paypal Order details
            {
                $get_order_Details = Products::get_paypal_details_byorderID($replace_ord_id);
                if(count($get_order_Details)>0)
                {
                    $get_prod = DB::table('nm_product')->where('pro_id','=',$get_order_Details->order_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $date1  = date('Y-m-d H:i:s');
                    $entry  = array('order_cust_id'     => $get_order_Details->order_cus_id,
                                    'order_id'          => $get_order_Details->order_id,
                                    'prod_id'           => $get_order_Details->order_pro_id,
                                    'mer_id'            => $get_order_Details->order_merchant_id,
                                    'order_type'        => $get_order_Details->order_type,
                                    'transaction_id'    => $get_order_Details->transaction_id,
                                    'payment_type'      => $get_order_Details->order_paytype,
                                    'replace_status'     => '1', //cancel pending
                                    'replace_notes'      => $replace_note,
                                    'replace_date'       => $date1    
                              );

                    
                    $check_productDelivery = Products::getexistDeliveryOption($get_order_Details->order_id,$get_order_Details->order_paytype);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                        $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }
                    //send mail & order delivery status change 
                    if($delStatus_id !=''){
                        //Order delivery status change

                        DB::table('nm_order')->where('order_id', '=', $get_order_Details->order_id)->update(array('delivery_status' => '9' )); //replace pending status

                        //Send mail
                        include('SMTP/sendmail.php');
                         //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->order_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'replace_notes'      =>  $replace_note,
                                'date' =>  $entry['replace_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'replace_notes'      =>  $replace_note,
                                    'date' =>  $entry['replace_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            } 
            return Redirect::back();
        }
        else{
            return Redirect::to('/');
        }
    }

    /* product payumoney replace */
    public function replace_order_product_payu(){  
        //print_r($_POST);exit();
        if(Session::has('customerid')){
            $replace_ord_id      = Input::get('replace_item_id');
            $payment_type       = Input::get('order_payment_type');
            $replace_note        = Input::get('replace_notes');
            $customer_mail      = Input::get('customer_mail');

            if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                $pro_title = 'pro_title';
            }else {  $pro_title = 'pro_title_'.Session::get('lang_code'); }

            if($payment_type==1) //Payumoney Order details
            {
                $get_order_Details = Products::get_payumoney_details_byorderID($replace_ord_id);
                if(count($get_order_Details)>0)
                {
                    $get_prod = DB::table('nm_product')->where('pro_id','=',$get_order_Details->order_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $date1  = date('Y-m-d H:i:s');
                    $entry  = array('order_cust_id'     => $get_order_Details->order_cus_id,
                                    'order_id'          => $get_order_Details->order_id,
                                    'prod_id'           => $get_order_Details->order_pro_id,
                                    'mer_id'            => $get_order_Details->order_merchant_id,
                                    'order_type'        => $get_order_Details->order_type,
                                    'transaction_id'    => $get_order_Details->transaction_id,
                                    'payment_type'      => $get_order_Details->order_paytype,
                                    'replace_status'     => '1', //cancel pending
                                    'replace_notes'      => $replace_note,
                                    'replace_date'       => $date1    
                              );

                    
                    $check_productDelivery = Products::getexistDeliveryOption_payu($get_order_Details->order_id,$get_order_Details->order_paytype,$get_order_Details->transaction_id);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                        $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }
                    //send mail & order delivery status change 
                    if($delStatus_id !=''){
                        //Order delivery status change

                        DB::table('nm_order_payu')->where('order_id', '=', $get_order_Details->order_id)->where('transaction_id','=', $get_order_Details->transaction_id)->update(array('delivery_status' => '9' )); //replace pending status

                        //Send mail
                        include('SMTP/sendmail.php');
                         //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->order_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'replace_notes'      =>  $replace_note,
                                'date' =>  $entry['replace_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'replace_notes'      =>  $replace_note,
                                    'date' =>  $entry['replace_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            } 
            return Redirect::back();
        }
        else{
            return Redirect::to('/');
        }
    }

    /* product payumoney replace ends */

    //Cancel deal - send request
    public function cancel_order_deal(){  
        //print_r($_POST);exit();
        if(Session::has('customerid')){
            $cancel_ord_id      = Input::get('cancel_item_id');
            $payment_type       = Input::get('order_payment_type');
            $cancel_note        = Input::get('cancel_notes');
            $customer_mail      = Input::get('customer_mail');
            $mer_id             = Input::get('mer_id');
            $order_type         = Input::get('order_type');

            if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                $pro_title = 'deal_title';
            }else {  $pro_title = 'deal_title_'.Session::get('lang_code'); }

            if($payment_type==0) //Cod Order details
            {
                $get_order_Details = Products::get_cod_details_bycodID($cancel_ord_id);
                //print_r($get_order_Details );
               // print_r(count($get_order_Details));exit();


                if(count($get_order_Details)>0)
                {
                    $date1  = date('Y-m-d H:i:s');
                    $get_prod = DB::table('nm_deals')->where('deal_id','=',$get_order_Details->cod_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                   // echo $prod_title;exit();
                    $entry  = array('order_cust_id'     => $get_order_Details->cod_cus_id,
                                    'cod_order_id'      => $get_order_Details->cod_id,
                                    'prod_id'           => $get_order_Details->cod_pro_id,
                                    'mer_id'            => $get_order_Details->cod_merchant_id,
                                    'order_type'        => $get_order_Details->cod_order_type,
                                    'transaction_id'    => $get_order_Details->cod_transaction_id,
                                    'payment_type'      => $get_order_Details->cod_paytype,
                                    'cancel_status'     => '1', //cancel pending
                                    'cancel_notes'      => $cancel_note,    
                                    'cancel_date'       => $date1    
                              );
                    $check_productDelivery = Products::getexistDeliveryOption($get_order_Details->cod_id,$get_order_Details->cod_paytype);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                       $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }

                    //send mail 
                    if($delStatus_id !=''){
                        //Order delivery status change

                        DB::table('nm_ordercod')->where('cod_id', '=', $get_order_Details->cod_id)->update(array('delivery_status' => '5' )); //cancel pending status
                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->cod_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.cancelOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'cancel_notes'      =>  $cancel_note,
                                'date' =>  $entry['cancel_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order Cancellation Request send');
                            });     
                        }    
                        
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.cancelOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'cancel_notes'      =>  $cancel_note,
                                    'date' =>  $entry['cancel_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order Cancellation Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            }
            if($payment_type==1) //Paypal Order details
            {

                $get_order_Details = Products::get_paypal_details_byorderID($cancel_ord_id);
                
                if(count($get_order_Details)>0)
                {

                    $get_prod = DB::table('nm_deals')->where('deal_id','=',$get_order_Details->order_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $date1  = date('Y-m-d H:i:s');
                    $entry  = array('order_cust_id'     => $get_order_Details->order_cus_id,
                                    'order_id'          => $get_order_Details->order_id,
                                    'prod_id'           => $get_order_Details->order_pro_id,
                                    'mer_id'            => $get_order_Details->order_merchant_id,
                                    'order_type'        => $get_order_Details->order_type,
                                    'transaction_id'    => $get_order_Details->transaction_id,
                                    'payment_type'      => $get_order_Details->order_paytype,
                                    'cancel_status'     => '1', //cancel pending
                                    'cancel_notes'      => $cancel_note,
                                    'cancel_date'       => $date1    
                              );

                    
                    $check_productDelivery = Products::getexistDeliveryOption($get_order_Details->order_id,$get_order_Details->order_paytype);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                        $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }
                    //send mail 
                    if($delStatus_id !=''){
                         //Order delivery status change

                        DB::table('nm_order')->where('order_id', '=', $get_order_Details->order_id)->update(array('delivery_status' => '5' )); //cancel pending status

                        include('SMTP/sendmail.php');
                         //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->order_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.cancelOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'cancel_notes'      =>  $cancel_note,
                                'date' =>  $entry['cancel_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order Cancellation Request send');
                            });     
                        }    
                      
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.cancelOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'cancel_notes'      =>  $cancel_note,
                                    'date' =>  $entry['cancel_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order Cancellation Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            } 
            return Redirect::back();
        }
        else{
            return Redirect::to('/');
        }
    }

    /* cancel order deal payumoney */
     public function cancel_order_deal_payu(){  
        //print_r($_POST);exit();
        if(Session::has('customerid')){
            $cancel_ord_id      = Input::get('cancel_item_id');
            $payment_type       = Input::get('order_payment_type');
            $cancel_note        = Input::get('cancel_notes');
            $customer_mail      = Input::get('customer_mail');
            $mer_id             = Input::get('mer_id');
            $order_type         = Input::get('order_type');

            if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                $pro_title = 'deal_title';
            }else {  $pro_title = 'deal_title_'.Session::get('lang_code'); }

           
            if($payment_type==1) //Payumoney Order details
            {

                $get_order_Details = Products::get_payumoney_details_byorderID($cancel_ord_id);
                
                if(count($get_order_Details)>0)
                {

                    $get_prod = DB::table('nm_deals')->where('deal_id','=',$get_order_Details->order_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $date1  = date('Y-m-d H:i:s');
                    $entry  = array('order_cust_id'     => $get_order_Details->order_cus_id,
                                    'order_id'          => $get_order_Details->order_id,
                                    'prod_id'           => $get_order_Details->order_pro_id,
                                    'mer_id'            => $get_order_Details->order_merchant_id,
                                    'order_type'        => $get_order_Details->order_type,
                                    'transaction_id'    => $get_order_Details->transaction_id,
                                    'payment_type'      => $get_order_Details->order_paytype,
                                    'cancel_status'     => '1', //cancel pending
                                    'cancel_notes'      => $cancel_note,
                                    'cancel_date'       => $date1    
                              );

                    
                    $check_productDelivery = Products::getexistDeliveryOption_payu($get_order_Details->order_id,$get_order_Details->order_paytype,$get_order_Details->transaction_id);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                        $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }
                    //send mail 
                    if($delStatus_id !=''){
                         //Order delivery status change

                        DB::table('nm_order_payu')->where('order_id', '=', $get_order_Details->order_id)->where('transaction_id','=', $get_order_Details->transaction_id)->update(array('delivery_status' => '5' )); //cancel pending status

                        include('SMTP/sendmail.php');
                         //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->order_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.cancelOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'cancel_notes'      =>  $cancel_note,
                                'date' =>  $entry['cancel_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order Cancellation Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.cancelOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'cancel_notes'      =>  $cancel_note,
                                    'date' =>  $entry['cancel_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order Cancellation Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            } 
            return Redirect::back();
        }
        else{
            return Redirect::to('/');
        }
    }

    /* cancel payumoney deal ends */

    //return product - send request
    public function return_order_deal(){  
        //print_r($_POST);exit();
        if(Session::has('customerid')){
            $return_ord_id      = Input::get('return_item_id');
            $payment_type       = Input::get('order_payment_type');
            $return_note        = Input::get('return_notes');
            $customer_mail      = Input::get('customer_mail');

            if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                $pro_title = 'deal_title';
            }else {  $pro_title = 'deal_title_'.Session::get('lang_code'); }

            if($payment_type==0) //Cod Order details
            {
                $get_order_Details = Products::get_cod_details_bycodID($return_ord_id);
                //print_r(count($get_order_Details));


                if(count($get_order_Details)>0)
                {
                    $date1  = date('Y-m-d H:i:s');
                    $get_prod = DB::table('nm_deals')->where('deal_id','=',$get_order_Details->cod_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $entry  = array('order_cust_id'     => $get_order_Details->cod_cus_id,
                                    'cod_order_id'      => $get_order_Details->cod_id,
                                    'prod_id'           => $get_order_Details->cod_pro_id,
                                    'mer_id'            => $get_order_Details->cod_merchant_id,
                                    'order_type'        => $get_order_Details->cod_order_type,  
                                    'transaction_id'    => $get_order_Details->cod_transaction_id,
                                    'payment_type'      => $get_order_Details->cod_paytype,
                                    'return_status'     => '1', //return pending
                                    'return_notes'      => $return_note,    
                                    'return_date'       => $date1    
                              );
                    $check_productDelivery = Products::getexistDeliveryOption($get_order_Details->cod_id,$get_order_Details->cod_paytype);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                       $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }

                    //send mail 
                    if($delStatus_id !=''){
                        //Order delivery status change

                        DB::table('nm_ordercod')->where('cod_id', '=', $get_order_Details->cod_id)->update(array('delivery_status' => '7' )); //return pending status
                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->cod_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.returnOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  $return_note,
                                'date' =>  $entry['return_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order return Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.returnOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  $return_note,
                                    'date' =>  $entry['return_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order return Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            }
            if($payment_type==1) //Paypal Order details
            {
                $get_order_Details = Products::get_paypal_details_byorderID($return_ord_id);
                if(count($get_order_Details)>0)
                {
                    $get_prod = DB::table('nm_deals')->where('deal_id','=',$get_order_Details->order_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $date1  = date('Y-m-d H:i:s');
                    $entry  = array('order_cust_id'     => $get_order_Details->order_cus_id,
                                    'order_id'          => $get_order_Details->order_id,
                                    'prod_id'           => $get_order_Details->order_pro_id,
                                    'mer_id'            => $get_order_Details->order_merchant_id,
                                    'order_type'        => $get_order_Details->order_type,
                                    'transaction_id'    => $get_order_Details->transaction_id,
                                    'payment_type'      => $get_order_Details->order_paytype,
                                    'return_status'     => '1', //cancel pending
                                    'return_notes'      => $return_note,
                                    'return_date'       => $date1    
                              );

                    
                    $check_productDelivery = Products::getexistDeliveryOption($get_order_Details->order_id,$get_order_Details->order_paytype);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                        $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }
                    //send mail 
                    if($delStatus_id !=''){
                         //Order delivery status change

                        DB::table('nm_order')->where('order_id', '=', $get_order_Details->order_id)->update(array('delivery_status' => '7' )); //return pending status

                        include('SMTP/sendmail.php');
                         //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->order_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.returnOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  $return_note,
                                'date' =>  $entry['return_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order return Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.returnOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  $return_note,
                                    'date' =>  $entry['return_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order return Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            } 
            return Redirect::back();
        }
        else{
            return Redirect::to('/');
        }
    }

    /* return payumoney deal starts */
    public function return_order_deal_payu(){  
        //print_r($_POST);exit();
        if(Session::has('customerid')){
            $return_ord_id      = Input::get('return_item_id');
            $payment_type       = Input::get('order_payment_type');
            $return_note        = Input::get('return_notes');
            $customer_mail      = Input::get('customer_mail');

            if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                $pro_title = 'deal_title';
            }else {  $pro_title = 'deal_title_'.Session::get('lang_code'); }

            if($payment_type==1) //Payumoney Order details
            {
                $get_order_Details = Products::get_payumoney_details_byorderID($return_ord_id);
                if(count($get_order_Details)>0)
                {
                    $get_prod = DB::table('nm_deals')->where('deal_id','=',$get_order_Details->order_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $date1  = date('Y-m-d H:i:s');
                    $entry  = array('order_cust_id'     => $get_order_Details->order_cus_id,
                                    'order_id'          => $get_order_Details->order_id,
                                    'prod_id'           => $get_order_Details->order_pro_id,
                                    'mer_id'            => $get_order_Details->order_merchant_id,
                                    'order_type'        => $get_order_Details->order_type,
                                    'transaction_id'    => $get_order_Details->transaction_id,
                                    'payment_type'      => $get_order_Details->order_paytype,
                                    'return_status'     => '1', //cancel pending
                                    'return_notes'      => $return_note,
                                    'return_date'       => $date1    
                              );

                    
                    $check_productDelivery = Products::getexistDeliveryOption_payu($get_order_Details->order_id,$get_order_Details->order_paytype,$get_order_Details->transaction_id);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                        $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }
                    //send mail 
                    if($delStatus_id !=''){
                         //Order delivery status change

                        DB::table('nm_order_payu')->where('order_id', '=', $get_order_Details->order_id)->where('transaction_id','=', $get_order_Details->transaction_id)->update(array('delivery_status' => '7' )); //return pending status

                        include('SMTP/sendmail.php');
                         //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->order_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.returnOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  $return_note,
                                'date' =>  $entry['return_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order return Request send');
                            });     
                        }    
                        
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.returnOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  $return_note,
                                    'date' =>  $entry['return_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order return Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            } 
            return Redirect::back();
        }
        else{
            return Redirect::to('/');
        }
    }

    /* deal payumoney return ends */

    
    //replace product - send request
    public function replace_order_deal(){  
        //print_r($_POST);exit();
        if(Session::has('customerid')){
            $replace_ord_id      = Input::get('replace_item_id');
            $payment_type       = Input::get('order_payment_type');
            $replace_note        = Input::get('replace_notes');
            $customer_mail      = Input::get('customer_mail');

            if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                $pro_title = 'deal_title';
            }else {  $pro_title = 'deal_title_'.Session::get('lang_code'); }

            if($payment_type==0) //Cod Order details
            {
                $get_order_Details = Products::get_cod_details_bycodID($replace_ord_id);
                //print_r(count($get_order_Details));


                if(count($get_order_Details)>0)
                {
                    $date1  = date('Y-m-d H:i:s');
                    $get_prod = DB::table('nm_deals')->where('deal_id','=',$get_order_Details->cod_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $entry  = array('order_cust_id'     => $get_order_Details->cod_cus_id,
                                    'cod_order_id'      => $get_order_Details->cod_id,
                                    'prod_id'           => $get_order_Details->cod_pro_id,
                                    'mer_id'            => $get_order_Details->cod_merchant_id,
                                    'order_type'        => $get_order_Details->cod_order_type,
                                    'transaction_id'    => $get_order_Details->cod_transaction_id,
                                    'payment_type'      => $get_order_Details->cod_paytype,
                                    'replace_status'     => '1', //replace pending
                                    'replace_notes'      => $replace_note,    
                                    'replace_date'       => $date1    
                              );
                    $check_productDelivery = Products::getexistDeliveryOption($get_order_Details->cod_id,$get_order_Details->cod_paytype);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                       $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }

                    //send mail and order delivery status
                    if($delStatus_id !=''){
                        //Order delivery status change

                        DB::table('nm_ordercod')->where('cod_id', '=', $get_order_Details->cod_id)->update(array('delivery_status' => '9' )); //replace pending status

                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->cod_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'replace_notes'      =>  $replace_note,
                                'date' =>  $entry['replace_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'replace_notes'      =>  $replace_note,
                                    'date' =>  $entry['replace_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            }
            if($payment_type==1) //Paypal Order details
            {
                $get_order_Details = Products::get_paypal_details_byorderID($replace_ord_id);
                if(count($get_order_Details)>0)
                {
                    $get_prod = DB::table('nm_deals')->where('deal_id','=',$get_order_Details->order_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $date1  = date('Y-m-d H:i:s');
                    $entry  = array('order_cust_id'     => $get_order_Details->order_cus_id,
                                    'order_id'          => $get_order_Details->order_id,
                                    'prod_id'           => $get_order_Details->order_pro_id,
                                    'mer_id'            => $get_order_Details->order_merchant_id,
                                    'order_type'        => $get_order_Details->order_type,
                                    'transaction_id'    => $get_order_Details->transaction_id,
                                    'payment_type'      => $get_order_Details->order_paytype,
                                    'replace_status'     => '1', //replace pending
                                    'replace_notes'      => $replace_note,
                                    'replace_date'       => $date1    
                              );

                    
                    $check_productDelivery = Products::getexistDeliveryOption($get_order_Details->order_id,$get_order_Details->order_paytype);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                        $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }
                    //send mail & order delivery status change 
                    if($delStatus_id !=''){
                        //Order delivery status change

                        DB::table('nm_order')->where('order_id', '=', $get_order_Details->order_id)->update(array('delivery_status' => '9' )); //replace pending status

                        //Send mail
                        include('SMTP/sendmail.php');
                         //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->order_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'replace_notes'      =>  $replace_note,
                                'date' =>  $entry['replace_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Request send');
                            });     
                        }    
                       
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'replace_notes'      =>  $replace_note,
                                    'date' =>  $entry['replace_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            } 
            return Redirect::back();
        }
        else{
            return Redirect::to('/');
        }
    }

    /* deal payumoney replace starts */

     public function replace_order_deal_payu(){  
        //print_r($_POST);exit();
        if(Session::has('customerid')){
            $replace_ord_id      = Input::get('replace_item_id');
            $payment_type       = Input::get('order_payment_type');
            $replace_note        = Input::get('replace_notes');
            $customer_mail      = Input::get('customer_mail');

            if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                $pro_title = 'deal_title';
            }else {  $pro_title = 'deal_title_'.Session::get('lang_code'); }

            if($payment_type==1) //Payumoney Order details
            {
                $get_order_Details = Products::get_payumoney_details_byorderID($replace_ord_id);
                if(count($get_order_Details)>0)
                {
                    $get_prod = DB::table('nm_deals')->where('deal_id','=',$get_order_Details->order_pro_id)->first();
                    if(count($get_prod)>0)
                        $prod_title = $get_prod->$pro_title;
                    else
                        $prod_title ='';
                    $date1  = date('Y-m-d H:i:s');
                    $entry  = array('order_cust_id'     => $get_order_Details->order_cus_id,
                                    'order_id'          => $get_order_Details->order_id,
                                    'prod_id'           => $get_order_Details->order_pro_id,
                                    'mer_id'            => $get_order_Details->order_merchant_id,
                                    'order_type'        => $get_order_Details->order_type,
                                    'transaction_id'    => $get_order_Details->transaction_id,
                                    'payment_type'      => $get_order_Details->order_paytype,
                                    'replace_status'     => '1', //replace pending
                                    'replace_notes'      => $replace_note,
                                    'replace_date'       => $date1    
                              );

                    
                    $check_productDelivery = Products::getexistDeliveryOption_payu($get_order_Details->order_id,$get_order_Details->order_paytype,$get_order_Details->transaction_id);
                    $delStatus_id = '';
                    if(count($check_productDelivery)>0)
                    {
                        $delStatus_id = $check_productDelivery->delStatus_id;
                        Products::update_deliveryStausChange($check_productDelivery->delStatus_id,$entry);
                    }else{
                        $delStatus_id = Products::insert_deliveryStausChange($entry);
                    }
                    //send mail & order delivery status change 
                    if($delStatus_id !=''){
                        //Order delivery status change

                        DB::table('nm_order_payu')->where('order_id', '=', $get_order_Details->order_id)->where('transaction_id','=', $get_order_Details->transaction_id)->update(array('delivery_status' => '9' )); //replace pending status

                        //Send mail
                        include('SMTP/sendmail.php');
                         //Customer mail
                        $custom_name =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name')->where('cus_id','=',$get_order_Details->order_cus_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrder_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $entry['transaction_id'],
                                'prod_id'           =>  $entry['prod_id'],
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'replace_notes'      =>  $replace_note,
                                'date' =>  $entry['replace_date']), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Request send');
                            });     
                        }    
                        
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrder_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $entry['transaction_id'],
                                    'prod_id'           =>  $entry['prod_id'],
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'replace_notes'      =>  $replace_note,
                                    'date' =>  $entry['replace_date']), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Request send');
                                }); 
                            }
                        }

                    }

                }else{
                    if (Lang::has(Session::get('lang_file').'.ORDER_NOT_VALID')!= '') { 
                        $order_msg =  trans(Session::get('lang_file').'.ORDER_NOT_VALID');}  
                        else { 
                            $order_msg = trans($OUR_LANGUAGE.'.ORDER_NOT_VALID');}
                            echo $order_msg;
                    return Redirect::back()->with('error_msg',$order_msg);
                } 
            } 
            return Redirect::back();
        }
        else{
            return Redirect::to('/');
        }
    }

    /* deal  payumoney replace ends */
   
}
