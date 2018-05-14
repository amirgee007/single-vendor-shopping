<?php
namespace App\Http\Controllers;
use DB;
use Session;
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
use App\Products;
use App\Auction;
use App\Customer;
use App\Transactions;
use App\Merchantadminlogin;
use App\Merchantproducts;
use App\Merchantsettings;
use App\MerchantTransactions;
use App\Fund;
use Lang;
use MyPayPal;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class FundController extends Controller
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
    public function __construct(){
       parent::__construct();
       /// set Merchant Panel language
       $this->setLanguageLocaleMerchant();
    }
    
    public function fund_request()
    {
        
        $merchant_id    = Session::get('merchantid');
        if (Lang::has(Session::get('mer_lang_file').'.MER_FUNDS')!= '')
            { 
            $session_messag =  trans(Session::get('mer_lang_file').'.MER_FUNDS');
        }  
        else 
        { 
            $session_messag =  trans($this->MER_OUR_LANGUAGE.'.MER_FUNDS');
        }

        $session_msg        = '';
        
        if(Session::has('fund_request_blocked')){
            $session_msg = Session::get('fund_request_blocked');
            Session::forget('fund_request_blocked');
        }
        
        $adminheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", $session_messag);
        $adminfooter    = view('sitemerchant.includes.merchant_footer');
        $adminleftmenus = view('sitemerchant.includes.merchant_left_menu_fund');
        
        $fundtransactiondetails = Fund::get_fund_transaction_details($merchant_id);
        return view('sitemerchant.fund_request')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with('fundtransactiondetails', $fundtransactiondetails)->with('session_msg',$session_msg);
        
    }
    
    public function with_fund_request()
    { 
        $merchnat_id         = Session::get('merchantid');
        if (Lang::has(Session::get('mer_lang_file').'.MER_FUNDS')!= ''){ 
                $session_messag =  trans(Session::get('mer_lang_file').'.MER_FUNDS');
        }else{ 
                $session_messag =  trans($this->MER_OUR_LANGUAGE.'.MER_FUNDS');
        }
        /* Merchant commission payment check with overall order table per merchant  */
        /* $merchantOverallPayment = 'merchant_request_allowed';
*/
  $merchantOverallPayment = $this->checkMerchantOverOrderReport($merchnat_id,0);
       // echo $merchantOverallPayment ;exit();

        if($merchantOverallPayment == 'merchant_request_allowed'){  
            $adminheader         = view('sitemerchant.includes.merchant_header')->with("routemenu", $session_messag);
            $adminfooter         = view('sitemerchant.includes.merchant_footer');
            $adminleftmenus      = view('sitemerchant.includes.merchant_left_menu_fund');
            
            //Old One
            /*
            $deal_count          = Fund::deal_no_count($merchnat_id);
            $deal_discount_count = Fund::deal_discount_count($merchnat_id);
            
            $product_no_count       = Fund::product_no_count($merchnat_id);
            $product_discount_count = Fund::product_discount_count($merchnat_id);

            $commison_amt           = Fund::commison_amt($merchnat_id);
            $paidamounttomerchantrs = Fund::paid_amt($merchnat_id);
            
            $paidamounttomerchant   = $paidamounttomerchantrs[0]->paid_amt;

            /*taking total product order amount from nm_order table of this merchant*
            $product_order_amt      = Fund::product_order_amt($merchnat_id); //only product not deal amount
            
            /*taking total product order amount from nm_codorder table of this merchant*
            $product_ordercod_amt   = Fund::product_ordercod_amt($merchnat_id); //only product not deal amount

            /*taking total deal order amount from nm_order table of this merchant*
            $deal_order_amt      = Fund::deal_order_amt($merchnat_id); //only product not deal amount
            
            /*taking total deal order amount from nm_codorder table of this merchant*
            $deal_ordercod_amt   = Fund::deal_ordercod_amt($merchnat_id); //only product not deal amount
            */
            /*
            return view('sitemerchant.with_fund_request')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with('deal_count', $deal_count)->with('deal_discount_count', $deal_discount_count)->with('product_no_count', $product_no_count)->with('product_discount_count', $product_discount_count)->with('commison_amt', $commison_amt)->with('paidamounttomerchant', $paidamounttomerchant)
            ->with('product_order_amt',$product_order_amt)->with('product_ordercod_amt',$product_ordercod_amt)
            ->with('deal_order_amt',$deal_order_amt)->with('deal_ordercod_amt',$deal_ordercod_amt);
            */

            //New Calculation based on merchant overllorder calculation

            $product_cod_orderDetails   =  Fund::get_COD_commissionPay_details($merchnat_id,'1');
            $deal_cod_orderDetails      =  Fund::get_COD_commissionPay_details($merchnat_id,'2');

            $product_order_orderDetails =  Fund::get_order_commissionPay_details($merchnat_id,'1');
            $deal_order_orderDetails    =  Fund::get_order_commissionPay_details($merchnat_id,'2');

 $product_order_orderDetails_payu =  Fund::get_order_commissionPay_details_payu($merchnat_id,'1');
 $deal_order_orderDetails_payu    =  Fund::get_order_commissionPay_details_payu($merchnat_id,'2');

            $paidWithdrawAmount         =  Fund::paid_amt($merchnat_id);
            $pendingRequestCount        =  Fund::pendingWithDrawRequestCount($merchnat_id);

            $commissionDetails          = Fund::overallOrder_nd_merchant($merchnat_id); 

           $commissionPaidDetails  = Fund::get_commissionPaid_details($merchnat_id);

           /* print_r($product_cod_orderDetails);
            print_r($product_order_orderDetails); exit();
*/
            return view('sitemerchant.with_fund_request')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)
                ->with('pendingRequestCount',$pendingRequestCount)
                ->with('paidWithdrawAmount',$paidWithdrawAmount)
                ->with('product_cod_orderDetails',$product_cod_orderDetails)
                ->with('product_order_orderDetails',$product_order_orderDetails)
                ->with('deal_cod_orderDetails',$deal_cod_orderDetails)
                ->with('deal_order_orderDetails',$deal_order_orderDetails)
                ->with('commissionDetails',$commissionDetails)
                ->with('commissionPaidDetails',$commissionPaidDetails)
                ->with('merchant_id',$merchnat_id)
                ->with('product_order_orderDetails_payu',$product_order_orderDetails_payu)
                 ->with('deal_order_orderDetails_payu',$deal_order_orderDetails_payu);

        }else{
            if (Lang::has(Session::get('mer_lang_file').'.MER_MERCHANT_UNABLE_TO_REQUEST_FUNDS')!= ''){ 
                $session_messag =  trans(Session::get('mer_lang_file').'.MER_MERCHANT_UNABLE_TO_REQUEST_FUNDS');
            }else{ 
                    $session_messag =  trans($this->MER_OUR_LANGUAGE.'.MER_MERCHANT_UNABLE_TO_REQUEST_FUNDS');
            }

            Session::flash('fund_request_blocked',$session_messag);

            return Redirect::to('fund_request');
        }    
    }
    
    public function withdraw_submit()
    {
        $id        = Input::get('mer_id');
        $amount    = Input::get('pay');
        $total_amt = Input::get('total_withdraw');
        $entry     = array(
            'wd_mer_id' => $id,
            'wd_total_wd_amt' => $total_amt,
            'wd_submited_wd_amt' => $amount
        );
        $check     = Fund::check_withdraw($id);
        if ($check) {
            foreach ($check as $result) {
            }
            $amt   = $amount + $result->wd_submited_wd_amt;
            $entry = array(
                'wd_mer_id' => $id,
                'wd_total_wd_amt' => $total_amt,
                'wd_submited_wd_amt' => $amt
            );
            Fund::update_withdraw($entry, $id);
            
            return Redirect::to('with_fund_request')->with('success', 'Request Sent Successfully');
        } else {
            Fund::save_withdraw($entry);
            return Redirect::to('with_fund_request')->with('success', 'Request Sent Successfully');
        }
    }


    /* Merchant commission payment check with overall order table per merchant  */
        /* 
            --- Sum of (total online amount , total coupon, total wallet )  consider as admin amount
            --- Sum of (total offline amount)  consider as merchant amount --- 
            --- Total order amount * (merchant_comission/100)  is admin comission --- 
            --- (( (Admin Amount - admin commission) - withdraw_request amount by merchant - merchant paid commmision amount ) > 0 ) merchant fund request enable & admin pay request amount enable  ---
             --- (( (Admin Amount - admin commission) - withdraw_request amount by merchant - merchant paid commmision amount ) > 0 ) < 0 merchnat need to pay commission to admin , merchant fund request disabled, & admin withdraw request pay disable 

        */
    public function checkMerchantOverOrderReport($mer_id,$mer_request_amt)
    {
        $commison_amt           = Fund::commison_amt($mer_id);
        $overallOrdDetails      = Fund::merchantOverallOrderDetails($mer_id);

        $merchantRequested      = $merchantPaidCommission   = 0;

        foreach($commison_amt as $commision) { } 
            $comminsion = $commision->mer_commission;

        //echo 'commsion -- '.$comminsion;

        if(count($overallOrdDetails)>0 ){
            $admin_amount     =  $overallOrdDetails->over_tot_online_amt + $overallOrdDetails->over_tot_coupon_amt +                 $overallOrdDetails->over_tot_wallet_amt;
            
            //$admin_commission =  $overallOrdDetails->over_tot_ord_amt *($comminsion/100);   

            $get_COD_commissionPay_details[$mer_id]      = Fund::get_COD_commissionPay_details($mer_id);
            $get_order_commissionPay_details[$mer_id]    = Fund::get_order_commissionPay_details($mer_id);
            $get_order_commissionPay_details_payu[$mer_id]=Fund::get_order_commissionPay_details_payu($mer_id);



            $cod_commission =  $order_commission = 0;
            if(isset($get_COD_commissionPay_details[$mer_id]))
            {
              $cod_commission = $get_COD_commissionPay_details[$mer_id][0]->sumMerchantCommission!=''?$get_COD_commissionPay_details[$mer_id][0]->sumMerchantCommission:0;
            }
            if(isset($get_order_commissionPay_details[$mer_id]))
            {
              $order_commission = $get_order_commissionPay_details[$mer_id][0]->sumMerchantCommission!=''?$get_order_commissionPay_details[$mer_id][0]->sumMerchantCommission:0;
            }

            if(isset($get_order_commissionPay_details_payu[$mer_id]))
            {
              $order_commission_payu = $get_order_commissionPay_details_payu[$mer_id][0]->sumMerchantCommission!=''?$get_order_commissionPay_details_payu[$mer_id][0]->sumMerchantCommission:0;
            }

            $admin_commission = $cod_commission + $order_commission+$order_commission_payu;

            $merchantProfit   =  $admin_amount - $admin_commission;

            //echo 'admin amount'.$admin_commission .'<br>'.'<br>admin amt - admin_commission' .$merchantProfit;

            $merchantRequestedCheck = Fund::check_withdraw($mer_id);

            if(count($merchantRequestedCheck)>0){
                foreach ($merchantRequestedCheck as $result) { }
                $merchantRequested = $result->wd_submited_wd_amt;
            }   
            $merchantPayCommissionCheck = Fund::check_commission($mer_id);

            if(count($merchantPayCommissionCheck)>0){
                foreach ($merchantPayCommissionCheck as $result) { }
                $merchantPaidCommission = $result->paidAmount;
            } 

            //echo 'merchant requested : '.$merchantRequested . '<br> merchant paid : '. $merchantPaidCommission;
 
            $newMerchantProfit  = $merchantProfit - ($merchantRequested + $merchantPaidCommission);

            if($mer_request_amt>0){
                $newMerchantProfit  = $newMerchantProfit - $mer_request_amt; // check ,merchant request amount to withdraw is allowed/not
            }
            // echo $newMerchantProfit ;
            //merchant fund request enable 
            if($newMerchantProfit>0){
                return 'merchant_request_allowed';    // admin need to pay merchant 
            }elseif($newMerchantProfit<0){
                return 'merchant_request_blocked'; // merchant need to pay admin
            }else{
                return 'merchant_request_balanced'; // amount not available to process
            }


        }else
        {
            return ' '; // no process 
        }

    }         

 
     /* Merchant commission payment check with overall order table per merchant ends  */


    



}
