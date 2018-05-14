<?php
namespace App\Http\Controllers;

use DB;
use Session;
use Helper;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Payumoney;
use App\Footer;
use App\Settings;
use App\Merchant;
use App\Coupon;
use App\Http\Controllers;
use MyPayPal;
use Lang;
use File;
use Intervention\Image\ImageManagerStatic as Image; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
Use Softon\Indipay\Facades\Indipay;

class PayumoneyController extends Controller
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
        // set frontend language 
        $this->setLanguageLocaleFront();
        
    }

    public function payumoney_check_out(Request $request) {
    
  /* check for product quantity availability */
        if(Session::get('customerid')=='') {
        return Redirect::to('index'); 
        }
         $unavailable = $this->unvailabilityofCart();
        if($unavailable!=''){
            Session::flash('unavailable_cart', $unavailable);
            return Redirect::to('cart'); 
        }
         $customer_id = $cust_id  = Session::get('customerid');
         $pay_type = Input::get('select_payment_type');
        if($pay_type!=2){
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
                    $mer_commissionDetails  = 0;

                    /* Merchant Commission Calculation ends */


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
        //payumoney Payment
        $settings = Home::get_settings();
            foreach ($settings as $s) { 
            }
         $tax_id_number      = $s->tax_id_number;
         $tax_type           = $s->tax_type;
        if ($pay_type == 2) { 
            
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
                $now            = date('Y-m-d h:i:sa');
                $insert_id      = '';
                $coupon_amount_tot = 0;
                $order_prodAr = $order_dealAr = array();
                $paypal_data ='';
                $item_name_ ='';
                foreach ($item_name as $key => $itemname) {
             $product_code = filter_var($_POST['item_code'][$key], FILTER_SANITIZE_STRING);
                    $item_name_ .= $item_name[$key];
                    $paypal_data .= $item_name[$key];
                    $paypal_data .= $item_price[$key];
                    $paypal_data .= $item_qty[$key];
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
                        //$coupon_amount            = Session::get('coupon_amount');
                        //$coupon_total_amount  = Session::get('coupon_total_amount');

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
                    /* To store paypal order details after successfully payment ends */

                    /* To store paypal order details after successfully payment only */
                   
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
                    $grand_total  -=$wallet_used_amount ;
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
                    $this->merchantKey='';
                    $nm_paymentsettings=DB::table('nm_paymentsettings')
                    ->select('ps_payu_key','ps_payu_salt','ps_paypal_pay_mode')->get();
                    foreach ($nm_paymentsettings as $value) {
                       $this->merchantKey=$value->ps_payu_key;
                       $this->salt= $value->ps_payu_salt;
                       $ps_paypal_pay_mode= $value->ps_paypal_pay_mode;
                       if($ps_paypal_pay_mode==0){ // True for Testing the Gateway [For production false]
                        $pay_mode='true';
                        }else{
                        $pay_mode='false';
                        }
                    }
                    $parameters = [
                    'key' => $this->merchantKey,
                    'amount' => $GrandTotal,
                    'productinfo' => 'xxx',
                    'firstname' => Input::get('fname'),
                    'email' => Input::get('email'),
                    'phone' => Input::get('phone1_line'),
                     ];
                    $order = Indipay::prepare($parameters);
                    return Indipay::process($order);

                }
                else //Complete Wallet purchase
                {
                    $transaction_id  = 'ORDER'.time().str_random(6);
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
                        $currenttransactionorderid = base64_encode(Session::get('last_insert_id'));
                        /* Mail Functinality starts */
                
            $trans = Session::get('last_insert_id');
            $trans_id = Payumoney::order_transaction_id($trans);
            $trans_id = Payumoney::order_tax_details($trans);
            $get_subtotal                = Payumoney::get_order_subtotal_paypal($trans_id);
            $get_tax                     = Payumoney::get_order_tax_paypal($trans_id);
            $get_shipping_amount         = Payumoney::get_order_shipping_amount_paypal($trans_id);
                        //Customer Mail after order complete
                        Mail::send('emails.ordermail-payumoney', array(
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
                        $merchant_trans_id = Payumoney::get_PayPalOrd_merchant_based_transaction_id($trans_id);
                      
                        if(isset($merchant_trans_id) && $merchant_trans_id != "") {
                            foreach($merchant_trans_id as $mer=>$m) {
                                $merchant_id = '';
                                $product_id  = $m->order_pro_id;
                                $order_type  = $m->order_type;
                                $get_mer_subtotal = Payumoney::get_PayPalOrd_mer_subtotal($trans_id,$merchant_id);
                                $get_mer_tax = Payumoney::get_PayPalOrd_mer_tax($trans_id,$merchant_id);
                                $get_mer_shipping_amount = Payumoney::get_PayPalOrd_mer_shipping_amount($trans_id,$merchant_id);
                                /*get merchant email id by sending merchant id from each iteration*/
                                $mer_email = $this->admin_email;
                                $email = array('mer_email'=>$mer_email);
                                $data  = array_merge($data,$email);
                                
                                Mail::send('emails.orderPayu-merchantmail', 
                                            array(
                                            'transaction_id' => $trans_id,
                                            'Sub_total' =>  $get_mer_subtotal,
                                            'Tax' =>  $get_mer_tax,
                                            'Shipping_amount' =>  $get_mer_shipping_amount,
                                            'merchant_id' => '',
                                            ), 
                                    function($message) use ($data){

                                    $merchant_email = $this->admin_email;
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
               
                    /* Used in paypalOrderInsert()  */
                    Session::forget('orderedProducts');
                    Session::forget('orderedDeals');
                    Session::forget('orderedShippingAr');
                    unset($_SESSION['cart']);
                    unset($_SESSION['deal_cart']);   
                    /* Used in paypalOrderInsert() -unset ends */
                    //Delete saved cart details of the customer
                    Home::delete_cart_by_user_id(Session::get('customerid'))  ; 
                    return Redirect::to('show_wallet_result' . '/' . base64_encode($new_insert))->with('login_message','Your payment process successfully completed');
                    //return Redirect::to('index')->with('login_message','Your order placed successfully');
                }
            }
        } }





/*payumoney_check_out parameters*/

    public function payumoney_sucess(Request $request) {
       $insert_id='';
       $payment_status='';
       $transaction_id='';
       $transaction_date='';
    $response = Indipay::response($request);
    $payment_status=$response['status'];
    if($payment_status=='success'){ 
    $payment_status=$response['status'];
    $email=$response['email'];
    $firstname=$response['firstname'];
    
    if($payment_status=='success'){
        $payment_status=1;    
                                  }
    else{
        $payment_status=4;        }
    $transaction_id=$response['txnid'];
    $transaction_date=$response['addedon'];
    $payu_response=array('transaction_id'=>$transaction_id,'order_status'=>'1','order_date'=>$transaction_date,'payer_email'=>$email,'payer_name'=>$firstname,'payer_status'=>'success'
            );
    if(Session::has('orderedProducts')){
        $product_data=Session::get('orderedProducts'); 
    foreach (Session::get('orderedProducts') as $data){
        Payumoney::purchased_checkout_product_insert($data['order_pro_id'],$data['order_qty']);
        $data=array_merge($data,$payu_response);
        Payumoney::paypal_checkout_insert($data);
        $new_insert = DB::getPdo()->lastInsertId();
        $insert_id .= DB::getPdo()->lastInsertId() . ',';
              }
           }      
        if(Session::has('orderedDeals')){
            foreach (Session::get('orderedDeals') as $data){
        Payumoney::purchased_checkout_deal_insert($data['order_pro_id'],$data['order_qty']);
        $data=array_merge($data,$payu_response);
        Payumoney::paypal_checkout_insert($data);
        $new_insert = DB::getPdo()->lastInsertId();
        $insert_id .= DB::getPdo()->lastInsertId() . ',';
            }
        }                
        if(Session::has('orderedShippingAr')) {
            $data = array_merge(Session::get('orderedShippingAr'),
                ['ship_order_id' => $new_insert,'ship_trans_id'=>$transaction_id]);
            Payumoney::insert_shipping_addr($data, Session::get('customerid'));
        }
        //Delete saved cart details of the customer
         Session::put('last_insert_id', trim($insert_id, ','));
            Payumoney::delete_cart_by_user_id(Session::get('customerid')); 
if(Lang::has(Session::get('lang_file').'.YOUR_PAYMENT_HAS_BEEN_COMPLETED_SUCCESSFULLY')!= '') {
    $session_message = trans(Session::get('lang_file').'.YOUR_PAYMENT_HAS_BEEN_COMPLETED_SUCCESSFULLY');}
else {
    $session_message =  trans($this->OUR_LANGUAGE.'.YOUR_PAYMENT_HAS_BEEN_COMPLETED_SUCCESSFULLY'); }
if(Lang::has(Session::get('lang_file').'.YOUR_PAYMENT_SUCCESSFULLY_COMPLETED')!= '') {
$session_payment_ack__message = trans(Session::get('lang_file').'.YOUR_PAYMENT_SUCCESSFULLY_COMPLETED');}
else{
$session_payment_ack__message =  trans($this->OUR_LANGUAGE.'.YOUR_PAYMENT_SUCCESSFULLY_COMPLETED');}
if(Lang::has(Session::get('lang_file').'.PAYMENT_ACKNOWLEDGEMENT')!= '') {
$payment_ack__message = trans(Session::get('lang_file').'.PAYMENT_ACKNOWLEDGEMENT');
    }
    else{
$payment_ack__message =  trans($this->OUR_LANGUAGE.'.PAYMENT_ACKNOWLEDGEMENT');
}
$transid      = $transaction_id;
                    Session::flash('payment_success',$session_message);
                    include('SMTP/sendmail.php');
                    $emailsubject = $session_payment_ack__message;
                    $subject      = $payment_ack__message;
                    $name         = $email;
                    $transid      = $transaction_id;
                    $transaction_id      = $transaction_id;
                    $payid        = $response['mihpayid'];
                    $ack          = $response['status'];
                    $address      = "";
                    $resultmail   = "success";
                    ob_start();
                    include('Emailsub/paymentemail.php');
                    $body = ob_get_contents();
                    ob_clean();
                    Send_Mail($address, $subject, $body);
                    $currenttransactionorderid = base64_encode(Session::get('last_insert_id'));
            /* Mail Functinality starts */
                    //$trans = Session::get('last_insert_id');
                    $trans_id = Payumoney::order_transaction_id($transaction_id);
                    $get_subtotal                = Payumoney::get_order_subtotal_paypal($transaction_id);
                    $get_tax                     = Payumoney::get_order_tax_paypal($transaction_id);
                    $get_shipping_amount         = Payumoney::get_order_shipping_amount_paypal($transaction_id);
                    //Customer Mail after order complete
                     Mail::send('emails.ordermail-payumoney', array(
                        'transaction_id' => $transaction_id,
                        'Sub_total' =>  $get_subtotal,
                        'Tax' =>  $get_tax,
                        'Shipping_amount' =>  $get_shipping_amount), function($message) use ($data)
                    {
                        $customer_mail = Session::get("orderedShippingAr");
                        $cus_mail      = $customer_mail['ship_email'];
                        $message->to($cus_mail)->subject('Your Order Confirmation Details Placed Successfully');
                    });
                     //Merchant Mail after order complete
            $merchant_trans_id = Payumoney::get_PayPalOrd_merchant_based_transaction_id($transaction_id);
            if(isset($merchant_trans_id) && $merchant_trans_id != "") {
            foreach($merchant_trans_id as $mer=>$m) {
            $merchant_id        = '';
            $product_id         = $m->order_pro_id;
            $order_type         = $m->order_type;
            $get_mer_subtotal   = Payumoney::get_PayPalOrd_mer_subtotal($transaction_id,$merchant_id);
            $get_mer_tax        = Payumoney::get_PayPalOrd_mer_tax($transaction_id,$merchant_id);
            $get_mer_shipping_amount = Payumoney::get_PayPalOrd_mer_shipping_amount($transaction_id,$merchant_id);
        /*get merchant email id by sending merchant id from each iteration*/
            $get_mer_email = $this->admin_email;
            $mer_email = $get_mer_email;
            $email = array('mer_email'=>$mer_email);
            $data  = array_merge($data,$email);                
    Mail::send('emails.orderPayu-merchantmail', array(
            'transaction_id' =>  $transaction_id,
            'Sub_total'  =>  $get_mer_subtotal,
            'Tax'        =>  $get_mer_tax,
    'Shipping_amount'    =>  $get_mer_shipping_amount,'merchant_id' => $merchant_id), function($message) use ($data){
            $merchant_email = $data['mer_email'];
 if(Lang::has(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED')!= '') {
 $session_message = trans(Session::get('lang_file').'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
}else {
 $session_message =  trans($this->OUR_LANGUAGE.'.BACK_HI_MERCHANT_YOUR_PRODUCT_PURCHASED');
     }  
 $message->to($merchant_email)->subject($session_message); });
         }
        }

        /* Mail Functinality ends */

                    /* Used in paypalOrderInsert()  */
                    Session::forget('orderedProducts');
                    Session::forget('orderedDeals');
                    Session::forget('orderedShippingAr');
                    unset($_SESSION['cart']);
                    unset($_SESSION['deal_cart']);   
                    /* Used in paypalOrderInsert() -unset ends */
                    //Delete saved cart details of the customer
                    Payumoney::delete_cart_by_user_id(Session::get('customerid'))  ; 
                    unset($_SESSION['wallet_used_amount']);
                    return Redirect::to('show_payment_result_payu' . '/' . $currenttransactionorderid)->with('result', $data);
                } 

    else {
    if(Lang::has(Session::get('lang_file').'.YOUR_PAYMENT_HAS_BEEN_FAILED')!= '') {
    $session_message = trans(Session::get('lang_file').'.YOUR_PAYMENT_HAS_BEEN_FAILED');
    }else{
    $session_message =  trans($this->OUR_LANGUAGE.'.YOUR_PAYMENT_HAS_BEEN_FAILED');
         }
                    /** No need to clear session because customer can use after payment method to payment atfer returning to cart page **/
                    /* Used in paypalOrderInsert()  */
                    Session::forget('orderedProducts');
                    Session::forget('orderedDeals');
                    Session::forget('orderedShippingAr');
                    unset($_SESSION['cart']);
                    unset($_SESSION['deal_cart']);   
                    /* Used in paypalOrderInsert() -unset ends */
                     //Delete saved cart details of the customer
                    Payumoney::delete_cart_by_user_id(Session::get('customerid'))  ; 
                    unset($_SESSION['wallet_used_amount']);
                    Session::flash('payment_failed', $session_message);
                    $currenttransactionorderid = base64_encode(0); 
                    /*return Redirect::to('show_payment_result_payu' . '/' . $currenttransactionorderid)->with('fail', "fail");*/
                }
        

    }

    public function show_payment_result_payu($orderid) //paypal order success page
    {
        
        $cust_id = Session::get('customerid');
        $converorderid = base64_decode($orderid); 
        $getorderdetails = Payumoney::getorderdetails($converorderid);
        //common
        $city_details                 = Register::get_city_details();
        $header_category              = Payumoney::get_header_category();
        $most_visited_product         = Payumoney::get_most_visited_product();
        $get_product_details_by_cat   = Payumoney::get_product_details_by_category($header_category);
        $category_count               = Payumoney::get_category_count($header_category);
        $get_product_details_typeahed = Payumoney::get_product_details_typeahed();
        $main_category                = Payumoney::get_header_category();
        $sub_main_category            = Payumoney::get_sub_main_category($main_category);
        $second_main_category         = Payumoney::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Payumoney::get_second_sub_main_category();
        $get_social_media_url         = Payumoney::get_social_media_url();
        $cms_page_title               = Payumoney::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Payumoney::get_ad_details();
        $noimagedetails               = Payumoney::get_noimage_details();
        $getbannerimagedetails        = Payumoney::getbannerimagedetails();
        $getmetadetails               = Payumoney::getmetadetails();
        $getlogodetails               = Payumoney::getlogodetails();
      
        $get_contact_det              = Footer::get_contact_details();
        $country_details              = Register::get_country_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Payumoney::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
      
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('paymentresult_payu')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('addetails', $addetails)->with('noimagedetails', $noimagedetails)->with('bannerimagedetails', $getbannerimagedetails)->with('get_meta_details', $getmetadetails)->with('orderdetails', $getorderdetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }
    public function show_wallet_result($orderid) //paypal order success page
    {
        $cust_id = Session::get('customerid');
        $converorderid = base64_decode($orderid);
        $getorderdetails = Payumoney::getorderdetails($converorderid);
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
        
        return view('walletresult_payu')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('addetails', $addetails)->with('noimagedetails', $noimagedetails)->with('bannerimagedetails', $getbannerimagedetails)->with('get_meta_details', $getmetadetails)->with('orderdetails', $getorderdetails)->with('get_contact_det', $get_contact_det)->with('general',$general);
    }

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
public function payumoney_failed(){
return Redirect::to('checkout');

}


   


  
   
}
