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
use App\Userlogin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class UserloginController extends Controller
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
    public function siteadmin()
    {
        return Redirect::to('siteadmin');
    }
    
    public function user_login_submit()
    {
        $logemail  = $_POST['email'];
        $logpwd    = $_POST['pwd'];
        $logmd5pwd = md5($logpwd);
        $logcheck  = Userlogin::check_user($logmd5pwd, $logemail);
       

        if (count($logcheck)>0) {
            if($logcheck[0]->cus_status == 0)
            {
                
                Session::put('customerid', $logcheck[0]->cus_id);
                Session::put('username', $logcheck[0]->cus_name);
                Session::put('user_name', $logcheck[0]->cus_name);

                /* User Cart session update by save_cart table data starts */
                /* Add  cart Product */
                $get_cart_prodDetails = Home::get_product_cart_by_userid($logcheck[0]->cus_id,'1');
                //print_r($get_cart_prodDetails);
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
                                            'mr_id'     => $prdData->pro_mr_id,
                                            'sh_id'     => $prdData->pro_sh_id,
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
                $get_cart_dealDetails = Home::get_product_cart_by_userid($logcheck[0]->cus_id,'2');
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
                                            'mr_id'     => $prdData->deal_merchant_id,
                                            'sh_id'     => $prdData->deal_shop_id,
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

                $entry = array(
                    'cus_id' => $logcheck[0]->cus_id
                );
                Userlogin::save_log($entry);
                echo "success";
    			if(Lang::has(Session::get('lang_file').'.LOGIN_SUCCESSFULLY')!= '') 
    			{ 
    				$session_message = trans(Session::get('lang_file').'.LOGIN_SUCCESSFULLY');
    			}  
    			else 
    			{ 
    				$session_message =  trans($this->OUR_LANGUAGE.'.LOGIN_SUCCESSFULLY');
    			}
                Session::put('login_message',$session_message);
    			//return Redirect::to('index');
            } else{
                    echo "block";
            }
        } else {
            echo "fail";
        }       
    }


    public function password_emailcheck()
    {
       $this->general_setting = DB::table('nm_generalsetting')->get();
       if(count($this->general_setting)>0){
            foreach($this->general_setting as $s){
                $SITENAME=$s->gs_sitename;
                if(Session('lang_code')=='en'){
               $SITENAME=$s->gs_sitename;     
                 }
                else if(Session('lang_code')=='fr'){
                   $SITENAME=$s->gs_sitename_fr; }
                   else{
                     $SITENAME="";
                   }
                
             }
        }

        $user_email = $_GET['pwdemail'];
        $encode_email = base64_encode(base64_encode(base64_encode(($user_email))));
        $check_valid_email = Userlogin::checkvalidemail($user_email);
        

        if ($check_valid_email) {
            $forgot_check   = Userlogin::forgot_check_details_user($user_email);
           
            $send_mail_data = array(
                'name' => $forgot_check[0]->cus_name,
                'encodeemail' => $encode_email,
				'email' => $user_email,
                'site_name' => $SITENAME       
            );
			if(Lang::has(Session::get('lang_file').'.PASSWORD_RECOVERY_DETAILS')!= '') 
			{ 
				$session_message = trans(Session::get('lang_file').'.PASSWORD_RECOVERY_DETAILS');
			}  
			else 
			{ 
				$session_message =  trans($this->OUR_LANGUAGE.'.PASSWORD_RECOVERY_DETAILS');
			}
            Mail::send('emails.user_passwordrecoverymail', $send_mail_data, function($message)
            {
                $message->to($_GET['pwdemail'])->subject('Password Recovery Details For User');
            });
            echo "success";

           if (Lang::has(Session::get('lang_file').'.PLEASE_CHECK_YOUR_EMAIL_FOR_FURTHER_INSTRUCTIONS')!= '') 
            { 
             $session_message = trans(Session::get('lang_file').'.PLEASE_CHECK_YOUR_EMAIL_FOR_FURTHER_INSTRUCTIONS'); 
          } 
           Session::put('email_message',$session_message); 
         
          
   
        }else {
            echo "fail";
           
        }
   
    }

    public function user_reset_password_submit()
    {
        
        $new_pwd = md5($_GET['newpwd']);
        $user_id = $_GET['userid'];
        $check   = Userlogin::update_newpwd($user_id, $new_pwd);
       
        if ($check) {
            Session::remove('reset_userid');
            echo "success";
        }
      
        else {
            echo "fail";
            
        }
        
    }

    public function user_forgot_pwd_email($email)
    {
		
        $customer_decode_email = base64_decode(base64_decode(base64_decode($email)));
        $customerdetails = Userlogin::get_customer_details($customer_decode_email);
        Session::put('reset_userid', $customerdetails[0]->cus_id);
        return Redirect::to('index');
    }

    public function index()
    {
        $navbar          = view('includes.navbar');
        $header          = view('includes.header');
        $footer          = view('includes.footer');
        $haeder_category = Home::get_header_category();
        $product_details = Home::get_product_details();
        $abc             = Home::get_header_category_array();
        $get_pro         = trim($abc, ",");
        $r               = Home::get_header_prio($get_pro);
        return view('index')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('haeder_category', $haeder_category)->with('product_details', $product_details);
    }
   
}
