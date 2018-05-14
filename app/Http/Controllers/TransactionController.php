<?php
namespace App\Http\Controllers;
use DB;
use Session;
use paypal_class;
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
use App\Customer;
use App\Products;
use Lang;
use App\Transactions;
use App\MerchantTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
Use Softon\Indipay\Facades\Indipay;
use App\Payumoney;
use App\Fund; // for checkMerchantOverOrderReport function supports

class TransactionController extends Controller
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
        // set admin Panel language
        $this->setLanguageLocaleAdmin();
    }

    public function show_transactions()
    {
        if (Session::has('userid')) {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
          
            $producttransactioncnt = Transactions::get_producttransaction();
            $dealtransactioncnt    = Transactions::get_dealstransaction();
            $auctiontransactioncnt = Transactions::get_auctiontransaction();
           
            $producttoday  = Transactions::get_producttoday_order();
            $produst7days  = Transactions::get_product7days_order();
            $product30days = Transactions::get_product30days_order();
            
            $dealstoday  = Transactions::get_dealstoday_order();
            $deals7days  = Transactions::get_deals7days_order();
            $deals30days = Transactions::get_deals30days_order();
            
            $auctiontoday  = Transactions::get_auctiontoday_order();
            $auction7days  = Transactions::get_auction7days_order();
            $auction30days = Transactions::get_auction30days_order();
            
            
            $productchartdetails = Transactions::get_chart_product_details();
            $dealchartdetails    = Transactions::get_chart_deals_details();
            $auctionchartdetails = Transactions::get_chart_auction_details();
            
            
            return view('siteadmin.transactiondashboard')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with('producttoday', $producttoday)->with('produst7days', $produst7days)->with('product30days', $product30days)->with('dealstoday', $dealstoday)->with('deals7days', $deals7days)->with('deals30days', $deals30days)->with('auctiontoday', $auctiontoday)->with('auction7days', $auction7days)->with('auction30days', $auction30days)->with('producttransactioncnt', $producttransactioncnt)->with('dealtransactioncnt', $dealtransactioncnt)->with('auctiontransactioncnt', $auctiontransactioncnt)->with('productchartdetails', $productchartdetails)->with('dealchartdetails', $dealchartdetails)->with('auctionchartdetails', $auctionchartdetails);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function manage_auction_bidder()
    {
        if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
        { 
            $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
        }  
        else 
        { 
            $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
        }
        if (Session::has('userid')) {
            $adminheader           = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus        = view('siteadmin.includes.admin_left_menu_transaction');
            $adminfooter           = view('siteadmin.includes.admin_footer');
            $manage_auction_bidder = Transactions::manage_auction_bidder();
            return view('siteadmin.manage_auction_bidder')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('manage_auction_bidder', $manage_auction_bidder);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function auction_by_bidder()
    {
        if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
        { 
            $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
        }  
        else 
        { 
            $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
        }
        if (Session::has('userid')) {
            $adminheader                 = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus              = view('siteadmin.includes.admin_left_menu_transaction');
            $adminfooter                 = view('siteadmin.includes.admin_footer');
            $manage_auction_bidder       = Transactions::auction_by_bidder();
            $manage_auction_bidd_cnt     = Transactions::auction_by_bidder_count();
            $auction_by_bidder_amt_count = Transactions::auction_by_bidder_amt_count();
            
            return view('siteadmin.auction_by_bidder')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('manage_auction_bidder', $manage_auction_bidder)->with('manage_auction_bidd_cnt', $manage_auction_bidd_cnt)->with('auction_by_bidder_amt_count', $auction_by_bidder_amt_count);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function list_auction_bidders($id)
    {
        if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
        { 
            $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
        }  
        else 
        { 
            $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
        }
        if (Session::has('userid')) {
            $adminheader           = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus        = view('siteadmin.includes.admin_left_menu_transaction');
            $adminfooter           = view('siteadmin.includes.admin_footer');
            $manage_auction_bidder = Transactions::list_auction_bidders($id);
            return view('siteadmin.list_auction_bidders')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('manage_auction_bidder', $manage_auction_bidder);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function auction_winner($id, $pageid)
    {
        if (Session::has('userid')) {
            $check_winner = count(Transactions::auction_winner($pageid));
            if ($check_winner == 0) {
                $entry = array(
                    'oa_bid_winner' => 1
                );
                
                Transactions::select_auction_winner($entry, $id);
                if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
                { 
                    $session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
                }  
                else 
                { 
                    $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
                }
                return Redirect::to('list_auction_bidders/' . $pageid)->with('result', $session_message);
            } else {
                if(Lang::has(Session::get('admin_lang_file').'.BACK_YOU_ALREADY_CHOOSEN_WINNER_FOR_THIS_AUCTION')!= '') 
                { 
                    $session_message = trans(Session::get('admin_lang_file').'.BACK_YOU_ALREADY_CHOOSEN_WINNER_FOR_THIS_AUCTION');
                }  
                else 
                { 
                    $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_YOU_ALREADY_CHOOSEN_WINNER_FOR_THIS_AUCTION');
                }
                return Redirect::to('list_auction_bidders/' . $pageid)->with('resulterror', $session_message);
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function send_auction_to_winner($id, $auc_id)
    {
        if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
        { 
            $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
        }  
        else 
        { 
            $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
        }
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $check_status   = Transactions::check_delivery_status($id);
            foreach ($check_status as $staus) {
            }
            
            return view('siteadmin.send_auction_to_winner')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('order_id', $id)->with('auc_id', $auc_id)->with('status', $staus->oa_bid_item_status);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function send_auction_to_winner_submit()
    {
        if (Session::has('userid')) {
            $auc_id   = Input::get('auc_id');
            $order_id = Input::get('order_id');
            $date     = Input::get('date');
            $status   = Input::get('status');
            
            $entry = array(
                'oa_delivery_date' => $date,
                'oa_bid_item_status' => $status
            );
            Transactions::update_auction_status($entry, $order_id);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
            }
            return Redirect::to('list_auction_bidders/' . $auc_id)->with('result', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function product_all_orders()
    {
        if (Session::has('userid')) {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $from_date     = Input::get('from_date');
            $to_date       = Input::get('to_date');
            $allproductrep = Transactions::getall_reports($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_all_orders();
            
            return view('siteadmin.product_allorders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("allorders", $orderdetails)->with("allproductrep", $allproductrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        }
        
        else {
            return Redirect::to('siteadmin');
        }
    }

    public function product_success_orders()
    {
        if (Session::has('userid')) {
            
            $from_date          = Input::get('from_date');
            $to_date            = Input::get('to_date');
            $product_successrep = Transactions::product_successrep($from_date, $to_date);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_success_orders();
            return view('siteadmin.product_success_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("successorders", $orderdetails)->with("product_successrep", $product_successrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        }else {
            return Redirect::to('siteadmin');
        }
    }
    
    
    public function product_completed_orders() //not using 'complete'
    {
        if (Session::has('userid')) {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_completed_orders();
            return view('siteadmin.product_completed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("completedorders", $orderdetails);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    
    
    public function product_failed_orders()
    {
        if (Session::has('userid')) {
            $from_date         = Input::get('from_date');
            $to_date           = Input::get('to_date');
            $product_failedrep = Transactions::product_failedrep($from_date, $to_date);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_failed_orders();
            return view('siteadmin.product_failed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("failedorders", $orderdetails)->with("product_failedrep", $product_failedrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        }
        
    }
    
    public function product_hold_orders()
    {
        if (Session::has('userid')) {
            
            $from_date       = Input::get('from_date');
            $to_date         = Input::get('to_date');
            $product_holdrep = Transactions::product_holdrep($from_date, $to_date);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_hold_orders();
            return view('siteadmin.product_hold_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("holdorders", $orderdetails)->with("product_holdrep", $product_holdrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    

    /* Product payumoney */

 public function product_payu_all_orders()
    {
        if (Session::has('userid')) {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $from_date     = Input::get('from_date');
            $to_date       = Input::get('to_date');
            $allproductrep = Transactions::getall_reports_payu($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_all_orders_payu();
            
            return view('siteadmin.product_payu_allorders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("allorders", $orderdetails)->with("allproductrep", $allproductrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        }
        
        else {
            return Redirect::to('siteadmin');
        }
    }

    public function product_payu_success_orders()
    {
        if (Session::has('userid')) {
            
            $from_date          = Input::get('from_date');
            $to_date            = Input::get('to_date');
            $product_successrep = Transactions::product_successrep_payu($from_date, $to_date);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_success_orders_payu();
            return view('siteadmin.product_payu_success_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("successorders", $orderdetails)->with("product_successrep", $product_successrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        }else {
            return Redirect::to('siteadmin');
        }
    }
      
    
    public function product_payu_failed_orders()
    {
        if (Session::has('userid')) {
            $from_date         = Input::get('from_date');
            $to_date           = Input::get('to_date');
            $product_failedrep = Transactions::product_failedrep_payu($from_date, $to_date);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_failed_orders_payu();
            return view('siteadmin.product_payu_failed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("failedorders", $orderdetails)->with("product_failedrep", $product_failedrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        }
        
    }
    

    /* Product payumoney ends */
    public function cod_all_orders()
    {
        if (Session::has('userid')) {
            $from_date      = Input::get('from_date');
            $to_date        = Input::get('to_date');
            $product_codrep = Transactions::product_codrep($from_date, $to_date);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getcod_all_orders();
            //print_r($orderdetails);exit;
            return view('siteadmin.productcod_all_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("allorders", $orderdetails)->with("product_codrep", $product_codrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function cod_completed_orders()
    {
        if (Session::has('userid')) {
            
            $from_date            = Input::get('from_date');
            $to_date              = Input::get('to_date');
            $product_completedrep = Transactions::product_completedrep($from_date, $to_date);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getcod_completed_orders();
            return view('siteadmin.productcod_completed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("completedorders", $orderdetails)->with("product_completedrep", $product_completedrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function cod_failed_orders()
    {
        if (Session::has('userid')) {
            $from_date            = Input::get('from_date');
            $to_date              = Input::get('to_date');
            $productcod_failedrep = Transactions::productcod_failedrep($from_date, $to_date);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getcod_failed_orders();
            
            return view('siteadmin.productcod_failed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("failedorders", $orderdetails)->with("productcod_failedrep", $productcod_failedrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function cod_hold_orders()
    {
        if (Session::has('userid')) {
            
            $from_date          = Input::get('from_date');
            $to_date            = Input::get('to_date');
            $productcod_holdrep = Transactions::productcod_holdrep($from_date, $to_date);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getcod_hold_orders();
            return view('siteadmin.productcod_hold_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("holdorders", $orderdetails)->with("productcod_holdrep", $productcod_holdrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
/* Transcation-> deals Transcation */
    public function deals_all_orders()
    {
        if (Session::has('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $dealrep   = Transactions::getall_dealreports($from_date, $to_date);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_all_orders();
            return view('siteadmin.deals_allorders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("allorders", $orderdetails)->with("dealrep", $dealrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
     
    }

    public function deals_success_orders()
    {
        if (Session::has('userid')) {
            $from_date  = Input::get('from_date');
            $to_date    = Input::get('to_date');
            $successrep = Transactions::get_successreports($from_date, $to_date);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_success_orders();
            return view('siteadmin.deals_success_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("successorders", $orderdetails)->with("successrep", $successrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function deals_completed_orders()
    {
        if (Session::has('userid')) {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_completed_orders();
            return view('siteadmin.deals_completed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("completedorders", $orderdetails)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function deals_failed_orders()
    {
        if (Session::has('userid')) {
           
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $failedrep = Transactions::get_failedreports($from_date, $to_date);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_failed_orders();
            return view('siteadmin.deals_failed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("failedorders", $orderdetails)->with("failedrep", $failedrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function deals_hold_orders()
    {
        if (Session::has('userid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $holdrep   = Transactions::get_holdreports($from_date, $to_date);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_hold_orders();
            return view('siteadmin.deals_hold_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("holdorders", $orderdetails)->with("holdrep", $holdrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    /* Transaction -> deals Payumoney */

     public function deals_payu_all_orders()
    {
        if (Session::has('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $dealrep   = Transactions::getall_dealpayu_reports($from_date, $to_date);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_payu_all_orders();
            return view('siteadmin.deals_payu_allorders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("allorders", $orderdetails)->with("dealrep", $dealrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
     
    }

    public function deals_payu_success_orders()
    {
        if (Session::has('userid')) {
            $from_date  = Input::get('from_date');
            $to_date    = Input::get('to_date');
            $successrep = Transactions::getpayu_successreports($from_date, $to_date);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_payu_success_orders();
            return view('siteadmin.deals_payu_success_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("successorders", $orderdetails)->with("successrep", $successrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    
    
    public function deals_payu_failed_orders()
    {
        if (Session::has('userid')) {
           
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $failedrep = Transactions::get_failedpayu_reports($from_date, $to_date);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_payu_failed_orders();
            return view('siteadmin.deals_payu_failed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("failedorders", $orderdetails)->with("failedrep", $failedrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }


    /*Transcation -> deals COD*/
    public function dealscod_all_orders()
    {
        if (Session::has('userid')) {
            
            $from_date      = Input::get('from_date');
            $to_date        = Input::get('to_date');
            $codrep         = Transactions::get_codreports($from_date, $to_date);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdealscod_all_orders();
            return view('siteadmin.dealscod_allorders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("allorders", $orderdetails)->with("codrep", $codrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function dealscod_completed_orders()
    {
        if (Session::has('userid')) {
            
            $from_date    = Input::get('from_date');
            $to_date      = Input::get('to_date');
            $completedrep = Transactions::get_completedreports($from_date, $to_date);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdealscod_completed_orders();
            return view('siteadmin.dealscod_completed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("completedorders", $orderdetails)->with("completedrep", $completedrep)
             ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function dealscod_failed_orders()
    {
        if (Session::has('userid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $failedrep = Transactions::getcod_failedreports($from_date, $to_date);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdealscod_failed_orders();
            
            return view('siteadmin.dealscod_failed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("failedorders", $orderdetails)->with("failedrep", $failedrep)
             ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function dealscod_hold_orders()
    {
        if (Session::has('userid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $holdrep   = Transactions::getcod_holdreports($from_date, $to_date);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            { 
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }  
            else 
            { 
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdealscod_hold_orders();
            return view('siteadmin.dealscod_hold_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("holdorders", $orderdetails)->with("holdrep", $holdrep)
             ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }


   

    /* cancel,return and replacement starts  */

    /* deal paypal starts */  
    public function adm_deal_cancel_orders()
    {
        if (Session::get('userid')) { 
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            } 
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            // $merid             = '';
            $payment_type=1;
            $order_type=2; 
            $calceled_order  = Transactions::get_calceled_order_paypal($payment_type,$order_type,$from_date,$to_date);
            $calceled_order_alldeal  = Transactions::calceled_dealorder_allpaypal($from_date,$to_date); 
            //print_r(count($calceled_order));exit();
            /* echo '<pre>';print_r($calceled_order);die; */
            $er_msg = ''; 
            return view('siteadmin.deal_canceled_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('calceled_order_alldeal',$calceled_order_alldeal);
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }  

     public function deal_get_approve_content_paypal($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);
           //echo '<pre>';print_r($data);die;
              if(Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_NOTE')!= '') 
                {
                    $cancelnote_label   = trans(Session::get('admin_lang_file').'.BACK_CANCEL_NOTE');
                    $note_label         = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    $appplied_label         = trans(Session::get('admin_lang_file').'.BACK_CANCEL_APPLIED_ON'); 
                    $status_label           = trans(Session::get('admin_lang_file').'.BACK_CANCEL_STATUS'); 
                    $processed_onLabel      = trans(Session::get('admin_lang_file').'.BACK_CANCEL_PROCESSED_ON');
                }
                else 
                {
                    $cancelnote_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_NOTE');
                    $note_label       =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    $appplied_label   =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_APPLIED_ON');
                    $status_label       =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_STATUS');
                    $processed_onLabel  =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_PROCESSED_ON');
                }
            echo '<b>'.$cancelnote_label.':</b><br>'.strip_tags($data[0]->cancel_notes);
            echo '<br><b>'.$appplied_label.':</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->cancel_date));
            if($data[0]->cancel_status==1)
            {
               
            echo '
                <form action="'.url('').'/adm_deal_approve_cancel_request_paypal" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="order_id" type="hidden" value="'.$data[0]->order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input name="date" type="hidden" value="'.$data[0]->cancel_date.'"/>
                    <input name="prod_id" type="hidden" value="'.$data[0]->prod_id.'"/>
                    <input name="transaction_id" type="hidden" value="'.$data[0]->transaction_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <input type="hidden" name="get_subtotal" value="'.$data[0]->transaction_id.'"/>
                    <div class="">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" rows="5" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve cancel request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve cancel request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->cancel_status==2)
                        $status ='Cancelled';
                if($data[0]->cancel_status==4)
                        $status ='Disapproved';
                echo '<br><b>'.$status_label.':</b><br>'.$status;
                echo '<br><b>'.$processed_onLabel.':</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->cancel_approved_date));
            }
            //echo '<pre>';print_r($data);die; 
            //echo $cod_id; 
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deal_approve_cancel_request_paypal()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            /*print_r($_POST);die;*/
            $cod_order_id = $order_id = $_POST["order_id"];
            $order_detail=DB::table('nm_order')->select('order_amt as cod_amt','order_taxAmt as cod_taxAmt')->where("order_id","=",$order_id)->get();
            $delStatus_id=$_POST["delStatus_id"];

            $cust_id=$_POST["order_cust_id"];
            $customer_det=DB::table('nm_customer')->select('cus_name','cus_email')->where("cus_id","=",$cust_id)->get();
            $customer_name=$customer_det[0]->cus_name;
            $customer_email=$customer_det[0]->cus_email;

            $date=$_POST["date"];
            $prod_id=$_POST["prod_id"];
            $prod_title=DB::table('nm_deals')->select('deal_title as pro_title')->where("deal_id","=",$prod_id)->get();
            $prod_title=$prod_title[0]->pro_title;
            $transaction_id=$_POST["transaction_id"];
            $get_subtotal=$order_detail[0]->cod_amt+$order_detail[0]->cod_taxAmt;
            $admin_id="1";
            $admin_det=DB::table('nm_admin')->select('adm_email')->where("adm_id","=",$admin_id)->get();
            $admin_email=$admin_det[0]->adm_email;

            
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            if(isset($_POST["approve"]))
            {
                 Transactions::approve_cancel_paypal($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id);
                 /* Sending mail to following merchanta customer and admin */
                 Transactions::pay_to_wallet($order_id,$cust_id);
                

                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail', array(   
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($customer_email)
                    {
                        $message->to($customer_email)->subject("Cancel Request Approved");
                    });
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_admin', array(    
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($admin_email)
                    {
                        $message->to($admin_email)->subject("Cancel Request Approved");
                    });
            }
            if(isset($_POST["disapprove"]))
            {
                 Transactions::disapprove_cancel($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id);
                 /* Sending mail to following merchanta customer and admin */

                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail', array(   
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($customer_email)
                    {
                        $message->to($customer_email)->subject("Cancel Request DisApproved");
                    });
                    
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_admin', array(    
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($admin_email)
                    {
                        $message->to($admin_email)->subject("Cancel Request DisApproved");
                    });
            }
           return Redirect::to('adm_deal_cancel_orders');
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    /* paypal deal REturn order starts */
    public function adm_deal_return_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            // $merid             = '';
            $payment_type=1;
            $order_type=2;
            $calceled_order  = Transactions::get_return_order_paypal($payment_type,$order_type,$from_date,$to_date);
            $return_order_all  = Transactions::returned_dealorder_allpaypal($from_date,$to_date); 
            //print_r($calceled_order);exit();
            $er_msg = '';
            if(Session::has('er_msg') )
                 $er_msg = Session::get('er_msg');
            return view('siteadmin.deal_return_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('return_order_all',$return_order_all);
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deal_get_approve_Returncontent_paypal($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);
           // print_r($data);
            echo '<b>Return Note:</b><br>'.strip_tags($data[0]->return_notes);
            echo '<br><b>Return Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->return_date));
            if($data[0]->return_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                    {
                        $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                    else 
                    {
                        $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
            echo '
                <form action="'.url('').'/adm_deal_approve_return_request_paypal" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve return request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve return request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->return_status==2)
                        $status ='Returned';
                if($data[0]->return_status==4)
                        $status ='Disapproved';

                echo '<br><b>Return Status:</b><br>'.$status;    
                echo '<br><b>Return Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->return_approved_date));
            }
             
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function  deal_approve_return_request_paypal()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
            $admin_id="1";
            $return_Status ="";   
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            if(isset($_POST["approve"]))
            {
                 Transactions::approve_return_paypal($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');

                 //add return amount to wallet
                 Transactions::pay_to_wallet($cod_order_id,$cust_id);

                  $return_Status ="Approved";
                  if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                {
                    $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                }
                else 
                {
                    $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                }  
                  Session::flash('er_msg',$er_msg);   
            }
            if(isset($_POST["disapprove"]))
            {
                Transactions::disapprove_return_paypal($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                $return_Status ="Disapproved";
                if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                {
                    $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                }
                else 
                {
                    $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                } 
                Session::flash('er_msg',$er_msg);  
            }
             if(Lang::has(Session::get('admin_lang_file').'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT')!= '') 
                {
                    $return_mail_subj = trans(Session::get('admin_lang_file').'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT');
                }
                else 
                {
                    $return_mail_subj =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT');
                }

            /* mail starts */
                 if($delStatus_id !=''){
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->select('od.*', 'dc.chat_id', 'dc.delStatus_id','dc.cust_id','dc.admin_id','dc.send_by','dc.note','dc.created_date','dc.status')->first(); 
                 
                        $prod_title = '';
                        $prod_title=DB::table('nm_deals')->select('deal_title')->where("deal_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->deal_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.returnOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->return_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->return_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->return_approved_date
                                ), function($message) use ($customer_mail,$return_mail_subj)
                            {
                                $message->to($customer_mail)->subject($return_mail_subj);
                            });     
                        }  
                        
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.returnOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->return_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'approve_status'    =>  $return_Status,
                                    'date'              =>  $deliveryDetails->return_date,
                                    'approved_date'     =>  $deliveryDetails->return_approved_date
                                ), function($message) use ($adminEmail,$return_mail_subj)
                                {
                                    $message->to($adminEmail)->subject($return_mail_subj);
                                }); 
                            }
                        }

                    }
                 /* mail ends */ 


           return Redirect::to('adm_deal_return_orders');
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deal_replacement_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
           //  $merid             = '';
            $payment_type=1;
            $order_type=2;
            $calceled_order  =  Transactions::get_replace_order_paypal($payment_type,$order_type,$from_date,$to_date);
            $replace_order_all  = Transactions::replace_dealorder_allpaypal($from_date,$to_date); 
            $er_msg = '';
            if(Session::has("er_msg"))
                $er_msg = Session::get("er_msg");
            return view('siteadmin.deal_replace_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('replace_order_all',$replace_order_all);
           ;
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deal_get_approve_replacecontent_paypal($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);
            //print_r($data);
            echo '<b>Replace Note:</b><br>'.strip_tags($data[0]->replace_notes);
            echo '<br><b>Replace Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_date));
            if($data[0]->replace_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                    {
                        $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                    else 
                    {
                        $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                
            echo '
                <form action="'.url('').'/adm_deal_approve_replace_request_paypal" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                     
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve replace request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve replace request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->replace_status==2)
                        $status ='Replaced';
                 if($data[0]->replace_status==4)
                        $status ='Disapproved';

                echo '<br><b>Replace Status:</b><br>'.$status;
                echo '<br><b>Replace Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_approved_date));
            }
             
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    
      public function deal_get_approve_replacecontent_cod($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);
            //print_r($data);
            echo '<b>Replace Note:</b><br>'.strip_tags($data[0]->replace_notes);
            echo '<br><b>Replace Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_date));
            if($data[0]->replace_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                    {
                        $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                    else 
                    {
                        $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                
            echo '
                <form action="'.url('').'/adm_deal_approve_replace_request_cod" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->cod_order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                     <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve replace request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve replace request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->replace_status==2)
                        $status ='Replaced';
                 if($data[0]->replace_status==4)
                        $status ='Disapproved';

                echo '<br><b>Replace Status:</b><br>'.$status;
                echo '<br><b>Replace Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_approved_date));
            }
             
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deal_approve_replace_request_paypal()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
            $admin_id="1";
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            $return_Status =" "; 
       
            //check product qunatity to replace
             $prod_info =DB::table('nm_deals as prod')->join("nm_order as ord","ord.order_pro_id",'=',"prod.deal_id")->join("nm_order_delivery_status AS od","od.prod_id",'=',"prod.deal_id")->select('prod.deal_id as pro_id','prod.deal_no_of_purchase as pro_no_of_purchase','prod.deal_max_limit as pro_qty','ord.order_qty as order_qty')->where("od.delStatus_id","=",$delStatus_id)->where("ord.order_id","=",$cod_order_id)->first();
           // echo $_POST["disapprove"];
          // print_r($prod_info);exit();
            if(count($prod_info)>0){
                if(isset($_POST["approve"]))
                {
                    $available_qty = $prod_info->pro_qty - $prod_info->pro_no_of_purchase;
                    if($available_qty>$prod_info->order_qty){
                        $new_purchased = $prod_info->pro_no_of_purchase+$prod_info->order_qty;
                         Transactions::approve_replace_paypal($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');  
                         $return_Status ="Approved";   
                        //Update Product quantity
                        DB::table('nm_deals')->where('deal_id', '=', $prod_info->pro_id)->update(array('deal_no_of_purchase' => $new_purchased  ));

                        
                        if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                        {
                            $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                        }
                        else 
                        {
                            $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                        }
                        Session::flash("er_msg",$er_msg);
                    }else{
                        $er_msg = "quantity not available";
                        Session::flash("er_msg",$er_msg);
                       return redirect("adm_deal_replacement_orders")->with('er_msg',$er_msg);
                    }
                              
                }
                if(isset($_POST["disapprove"]))
                {
                     Transactions::disapprove_replace_paypal($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                     $return_Status ="Disapproved"; 

                    if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                    {
                        $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                    }
                    else 
                    {
                        $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                    } 
                    
                    Session::flash("er_msg",$er_msg);
                    
                }


             /* mail starts */
                 if($delStatus_id !=''){
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->select('od.*', 'dc.chat_id', 'dc.delStatus_id','dc.cust_id','dc.admin_id','dc.send_by','dc.note','dc.created_date','dc.status')->first(); 
                   // print_r($deliveryDetails) ;exit();
                        $prod_title = '';
                        $prod_title=DB::table('nm_deals')->select('deal_title as pro_title')->where("deal_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->pro_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->replace_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Approve/Disapprove Notification');
                            });     
                        }    
                        
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'date'              =>  $deliveryDetails->replace_date,
                                    'approve_status'    =>  $return_Status,
                                    'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Approve/Disapprove Notification');
                                }); 
                            }
                        }

                    }
                 /* mail ends */ 
     
            }else{
                $er_msg = "Product Not available";
                Session::flash("er_msg",$er_msg);
                return redirect("adm_deal_replacement_orders");
            }     

            return redirect("adm_deal_replacement_orders");
            
        } else {

            return Redirect::to('siteadmin');
        }
        
    }


    /* deal paypal ends */ 

    /* deal Payumoney starts */
    public function adm_deal_payu_cancel_orders()
    {
        if (Session::get('userid')) { 
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            } 
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
          //  $merid             = '';
            $payment_type=1;
            $order_type=2; 
            $calceled_order  = Transactions::get_canceled_order_payu($payment_type,$order_type,$from_date,$to_date);
            $calceled_order_alldeal  = Transactions::canceled_dealorder_allpayu($from_date,$to_date); 
            //print_r(count($calceled_order));exit();
            /* echo '<pre>';print_r($calceled_order);die; */
            $er_msg = ''; 
            return view('siteadmin.deal_payu_canceled_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('calceled_order_alldeal',$calceled_order_alldeal);
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }  
    public function deal_get_approve_content_payu($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content_payu($delStatus_id);
           //echo '<pre>';print_r($data);die;
              if(Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_NOTE')!= '') 
                {
                    $cancelnote_label   = trans(Session::get('admin_lang_file').'.BACK_CANCEL_NOTE');
                    $note_label         = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    $appplied_label         = trans(Session::get('admin_lang_file').'.BACK_CANCEL_APPLIED_ON'); 
                    $status_label           = trans(Session::get('admin_lang_file').'.BACK_CANCEL_STATUS'); 
                    $processed_onLabel      = trans(Session::get('admin_lang_file').'.BACK_CANCEL_PROCESSED_ON');
                }
                else 
                {
                    $cancelnote_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_NOTE');
                    $note_label       =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    $appplied_label   =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_APPLIED_ON');
                    $status_label       =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_STATUS');
                    $processed_onLabel  =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_PROCESSED_ON');
                }
            echo '<b>'.$cancelnote_label.':</b><br>'.strip_tags($data[0]->cancel_notes);
            echo '<br><b>'.$appplied_label.':</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->cancel_date));
            if($data[0]->cancel_status==1)
            {
               
            echo '
                <form action="'.url('').'/adm_deal_approve_cancel_request_payu" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="order_id" type="hidden" value="'.$data[0]->order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input name="date" type="hidden" value="'.$data[0]->cancel_date.'"/>
                    <input name="prod_id" type="hidden" value="'.$data[0]->prod_id.'"/>
                    <input name="transaction_id" type="hidden" value="'.$data[0]->transaction_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <input type="hidden" name="get_subtotal" value="'.$data[0]->transaction_id.'"/>
                    <div class="">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" rows="5" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve cancel request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve cancel request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->cancel_status==2)
                        $status ='Cancelled';
                if($data[0]->cancel_status==4)
                        $status ='Disapproved';
                echo '<br><b>'.$status_label.':</b><br>'.$status;
                echo '<br><b>'.$processed_onLabel.':</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->cancel_approved_date));
            }
            //echo '<pre>';print_r($data);die; 
            //echo $cod_id; 
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deal_approve_cancel_request_payu()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            /*print_r($_POST);die;*/
            $cod_order_id = $order_id = $_POST["order_id"];
            $order_detail=DB::table('nm_order_payu')->select('order_amt as cod_amt','order_taxAmt as cod_taxAmt')->where("order_id","=",$order_id)->get();
            $delStatus_id=$_POST["delStatus_id"];

            $cust_id=$_POST["order_cust_id"];
            $customer_det=DB::table('nm_customer')->select('cus_name','cus_email')->where("cus_id","=",$cust_id)->get();
            $customer_name=$customer_det[0]->cus_name;
            $customer_email=$customer_det[0]->cus_email;

            $date=$_POST["date"];
            $prod_id=$_POST["prod_id"];
            $prod_title=DB::table('nm_deals')->select('deal_title as pro_title')->where("deal_id","=",$prod_id)->get();
            $prod_title=$prod_title[0]->pro_title;
            $transaction_id=$_POST["transaction_id"];
            $get_subtotal=$order_detail[0]->cod_amt+$order_detail[0]->cod_taxAmt;
            
            $admin_id="1";
            $admin_det=DB::table('nm_admin')->select('adm_email')->where("adm_id","=",$admin_id)->get();
            $admin_email=$admin_det[0]->adm_email;

            
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            if(isset($_POST["approve"]))
            {
                 Transactions::approve_cancel_payu($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id);
                 /* Sending mail to following merchanta customer and admin */
                 Transactions::pay_to_wallet_payu($order_id,$cust_id);
                

                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail', array(   
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($customer_email)
                    {
                        $message->to($customer_email)->subject("Cancel Request Approved");
                    });
                    
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_admin', array(    
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($admin_email)
                    {
                        $message->to($admin_email)->subject("Cancel Request Approved");
                    });
            }
            if(isset($_POST["disapprove"]))
            {
                 Transactions::disapprove_cancel_payu($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id);
                 /* Sending mail to following merchanta customer and admin */

                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail', array(   
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($customer_email)
                    {
                        $message->to($customer_email)->subject("Cancel Request DisApproved");
                    });
                   
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_admin', array(    
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($admin_email)
                    {
                        $message->to($admin_email)->subject("Cancel Request DisApproved");
                    });
            }
           return Redirect::to('adm_deal_payu_cancel_orders');
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    /* Cancelled order payumoney ends */

    /* Returned order payumoney starts */ 

     public function adm_deal_payu_return_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
             
            $payment_type=1;
            $order_type=2;
            $calceled_order  = Transactions::get_return_order_payu($payment_type,$order_type,$from_date,$to_date);
            $return_order_all  = Transactions::returned_dealorder_allpayu($from_date,$to_date); 
            //print_r($calceled_order);exit();
            $er_msg = '';
            if(Session::has('er_msg') )
                 $er_msg = Session::get('er_msg');
            return view('siteadmin.deal_payu_return_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('return_order_all',$return_order_all);
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deal_get_approve_REturncontent_payu($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content_payu($delStatus_id);
           // print_r($data);
            echo '<b>Return Note:</b><br>'.strip_tags($data[0]->return_notes);
            echo '<br><b>Return Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->return_date));
            if($data[0]->return_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                    {
                        $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                    else 
                    {
                        $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
            echo '
                <form action="'.url('').'/adm_deal_approve_return_request_payu" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve return request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve return request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->return_status==2)
                        $status ='Returned';
                if($data[0]->return_status==4)
                        $status ='Disapproved';

                echo '<br><b>Return Status:</b><br>'.$status;    
                echo '<br><b>Return Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->return_approved_date));
            }
             
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }


    public function  deal_approve_return_request_payu()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
             $admin_id="1";
            $return_Status ="";   
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            if(isset($_POST["approve"]))
            {
                 Transactions::approve_return_payu($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');

                 //add return amount to wallet
                 Transactions::pay_to_wallet_payu($cod_order_id,$cust_id);

                  $return_Status ="Approved";
                  if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                {
                    $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                }
                else 
                {
                    $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                }  
                  Session::flash('er_msg',$er_msg);   
            }
            if(isset($_POST["disapprove"]))
            {
                Transactions::disapprove_return_payu($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                $return_Status ="Disapproved";
                if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                {
                    $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                }
                else 
                {
                    $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                } 
                Session::flash('er_msg',$er_msg);  
            }
             if(Lang::has(Session::get('admin_lang_file').'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT')!= '') 
                {
                    $return_mail_subj = trans(Session::get('admin_lang_file').'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT');
                }
                else 
                {
                    $return_mail_subj =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT');
                }

            /* mail starts */
                 if($delStatus_id !=''){
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->select('od.*', 'dc.chat_id', 'dc.delStatus_id','dc.cust_id','dc.admin_id','dc.send_by','dc.note','dc.created_date','dc.status')->first(); 
                 
                        $prod_title = '';
                        $prod_title=DB::table('nm_deals')->select('deal_title')->where("deal_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->deal_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.returnOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->return_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->return_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->return_approved_date
                                ), function($message) use ($customer_mail,$return_mail_subj)
                            {
                                $message->to($customer_mail)->subject($return_mail_subj);
                            });     
                        }  
                        
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.returnOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->return_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'approve_status'    =>  $return_Status,
                                    'date'              =>  $deliveryDetails->return_date,
                                    'approved_date'     =>  $deliveryDetails->return_approved_date
                                ), function($message) use ($adminEmail,$return_mail_subj)
                                {
                                    $message->to($adminEmail)->subject($return_mail_subj);
                                }); 
                            }
                        }

                    }
                 /* mail ends */ 


           return Redirect::to('adm_deal_payu_return_orders');
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    /* returned order payumoney ends */

    /* replacement order paymoney starts */
    public function adm_deal_payu_replacement_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            
            $payment_type=1;
            $order_type=2;
            $calceled_order  =  Transactions::get_replace_order_payu($payment_type,$order_type,$from_date,$to_date);
            $replace_order_all  = Transactions::replace_dealorder_allpayu($from_date,$to_date); 
            $er_msg = '';
            if(Session::has("er_msg"))
                $er_msg = Session::get("er_msg");
            return view('siteadmin.deal_payu_replace_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('replace_order_all',$replace_order_all);
           ;
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deal_get_approve_replacecontent_payu($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content_payu($delStatus_id);
            //print_r($data);
            echo '<b>Replace Note:</b><br>'.strip_tags($data[0]->replace_notes);
            echo '<br><b>Replace Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_date));
            if($data[0]->replace_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                    {
                        $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                    else 
                    {
                        $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                
            echo '
                <form action="'.url('').'/adm_deal_approve_replace_request_payu" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                     <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve replace request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve replace request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->replace_status==2)
                        $status ='Replaced';
                 if($data[0]->replace_status==4)
                        $status ='Disapproved';

                echo '<br><b>Replace Status:</b><br>'.$status;
                echo '<br><b>Replace Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_approved_date));
            }
             
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }


    public function deal_approve_replace_request_payu()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
            $admin_id="1";
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            $return_Status =" "; 
       
            //check product qunatity to replace
             $prod_info =DB::table('nm_deals as prod')->join("nm_order as ord","ord.order_pro_id",'=',"prod.deal_id")->join("nm_order_delivery_status AS od","od.prod_id",'=',"prod.deal_id")->select('prod.deal_id as pro_id','prod.deal_no_of_purchase as pro_no_of_purchase','prod.deal_max_limit as pro_qty','ord.order_qty as order_qty')->where("od.delStatus_id","=",$delStatus_id)->where("ord.order_id","=",$cod_order_id)->first();
           // echo $_POST["disapprove"];
          // print_r($prod_info);exit();
            if(count($prod_info)>0){
                if(isset($_POST["approve"]))
                {
                    $available_qty = $prod_info->pro_qty - $prod_info->pro_no_of_purchase;
                    if($available_qty>$prod_info->order_qty){
                        $new_purchased = $prod_info->pro_no_of_purchase+$prod_info->order_qty;
                         Transactions::approve_replace_payu($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');  
                         $return_Status ="Approved";   
                        //Update Product quantity
                        DB::table('nm_deals')->where('deal_id', '=', $prod_info->pro_id)->update(array('deal_no_of_purchase' => $new_purchased  ));

                        
                        if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                        {
                            $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                        }
                        else 
                        {
                            $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                        }
                        Session::flash("er_msg",$er_msg);
                    }else{
                        $er_msg = "quantity not available";
                        Session::flash("er_msg",$er_msg);
                       return redirect("adm_deal_payu_replacement_orders")->with('er_msg',$er_msg);
                    }
                              
                }
                if(isset($_POST["disapprove"]))
                {
                     Transactions::disapprove_replace_payu($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                     $return_Status ="Disapproved"; 

                    if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                    {
                        $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                    }
                    else 
                    {
                        $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                    } 
                    
                    Session::flash("er_msg",$er_msg);
                    
                }


             /* mail starts */
                 if($delStatus_id !=''){
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->select('od.*', 'dc.chat_id', 'dc.delStatus_id','dc.cust_id','dc.admin_id','dc.send_by','dc.note','dc.created_date','dc.status')->first(); 
                   // print_r($deliveryDetails) ;exit();
                        $prod_title = '';
                        $prod_title=DB::table('nm_deals')->select('deal_title as pro_title')->where("deal_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->pro_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->replace_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Approve/Disapprove Notification');
                            });     
                        }    
                          //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'date'              =>  $deliveryDetails->replace_date,
                                    'approve_status'    =>  $return_Status,
                                    'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Approve/Disapprove Notification');
                                }); 
                            }
                        }

                    }
                 /* mail ends */ 
     
            }else{
                $er_msg = "Product Not available";
                Session::flash("er_msg",$er_msg);
                return redirect("adm_deal_payu_replacement_orders");
            }     

            return redirect("adm_deal_payu_replacement_orders");
            
        } else {

            return Redirect::to('siteadmin');
        }
        
    }


    /* Replacement order payumoney ends */

    /* deal payumoney ends */

    /* deal cod  start*/  
    
    public function deal_approve_replace_request_cod()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
            
            $admin_id="1";
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            $return_Status =" "; 
       
            //check product qunatity to replace
             $prod_info =DB::table('nm_deals as prod')->join("nm_ordercod as ord","ord.cod_pro_id",'=',"prod.deal_id")->join("nm_order_delivery_status AS od","od.prod_id",'=',"prod.deal_id")->select('prod.deal_id as pro_id','prod.deal_no_of_purchase as pro_no_of_purchase','prod.deal_max_limit as pro_qty','ord.cod_qty as cod_qty')->where("od.delStatus_id","=",$delStatus_id)->where("ord.cod_id","=",$cod_order_id)->first();
           // echo $_POST["disapprove"];
          // print_r($prod_info);exit();
            if(count($prod_info)>0){
                if(isset($_POST["approve"]))
                {
                    $available_qty = $prod_info->pro_qty - $prod_info->pro_no_of_purchase;
                    if($available_qty>$prod_info->cod_qty){
                        $new_purchased = $prod_info->pro_no_of_purchase+$prod_info->cod_qty;
                         Transactions::approve_replace_cod($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');  
                         $return_Status ="Approved";   
                        //Update Product quantity
                        DB::table('nm_deals')->where('deal_id', '=', $prod_info->pro_id)->update(array('deal_no_of_purchase' => $new_purchased  ));

                        
                        if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                        {
                            $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                        }
                        else 
                        {
                            $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                        }
                        Session::flash("er_msg",$er_msg);
                    }else{
                        $er_msg = "quantity not available";
                        Session::flash("er_msg",$er_msg);
                       return redirect("adm_deal_replacement_orders")->with('er_msg',$er_msg);
                    }
                              
                }
                if(isset($_POST["disapprove"]))
                {
                     Transactions::disapprove_replace_cod($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                     $return_Status ="Disapproved"; 

                    if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                    {
                        $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                    }
                    else 
                    {
                        $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                    } 
                    
                    Session::flash("er_msg",$er_msg);
                    
                }


             /* mail starts */
                 if($delStatus_id !=''){
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->select('od.*','dc.chat_id', 'dc.delStatus_id','dc.cust_id','dc.admin_id','dc.send_by','dc.note','dc.created_date','dc.status')->first(); 
                   // print_r($deliveryDetails) ;exit();
                        $prod_title = '';
                        $prod_title=DB::table('nm_deals')->select('deal_title as pro_title')->where("deal_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->pro_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->replace_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Approve/Disapprove Notification');
                            });     
                        }    
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'date'              =>  $deliveryDetails->replace_date,
                                    'approve_status'    =>  $return_Status,
                                    'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Approve/Disapprove Notification');
                                }); 
                            }
                        }

                    }
                 /* mail ends */ 
     
            }else{
                $er_msg = "Product Not available";
                Session::flash("er_msg",$er_msg);
                return redirect("adm_dealcod_replacement_orders");
            }     

            return redirect("adm_dealcod_replacement_orders");
            
        } else {

            return Redirect::to('siteadmin');
        }
        
    }
    
    public function dealcod_cancel_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $payment_type=0;
            $order_type=2;
            $calceled_order  = Transactions::get_calceled_order($payment_type,$order_type,$from_date,$to_date);
            $calceled_order_all  = Transactions::calceled_dealorder_allcod($from_date,$to_date); 
            /* echo '<pre>';print_r($calceled_order);die; */
            $er_msg = '';
            return view('siteadmin.dealcod_canceled_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('calceled_order_all',$calceled_order_all);
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    public function deal_get_approve_content($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);
           //echo '<pre>';print_r($data);die;
            echo '<b>Cancel Note:</b><br>'.strip_tags($data[0]->cancel_notes);
            echo '<br><b>Cancel Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->cancel_date));
            if($data[0]->cancel_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                {
                    $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                }
                else 
                {
                    $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                }
            echo '
                <form action="'.url('').'/adm_deal_approve_cancel_request" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->cod_order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input name="date" type="hidden" value="'.$data[0]->cancel_date.'"/>
                    <input name="prod_id" type="hidden" value="'.$data[0]->prod_id.'"/>
                     <input name="transaction_id" type="hidden" value="'.$data[0]->transaction_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <input type="hidden" name="get_subtotal" value="'.$data[0]->transaction_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve cancel request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve cancel request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->cancel_status==2)
                        $status ='Cancelled';
                if($data[0]->cancel_status==4)
                        $status ='Disapproved';
                echo '<br><b>Cancel Status:</b><br>'.$status;
                echo '<br><b>Cancel Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->cancel_approved_date));
            }
            //echo '<pre>';print_r($data);die; 
            //echo $cod_id; 
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    public function deal_approve_cancel_request()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            /*print_r($_POST);die;*/
            $cod_order_id=$_POST["cod_order_id"];
            $order_detail=DB::table('nm_ordercod')->select('cod_amt','cod_taxAmt')->where("cod_id","=",$cod_order_id)->get();
            $delStatus_id=$_POST["delStatus_id"];

            $cust_id=$_POST["order_cust_id"];
            $customer_det=DB::table('nm_customer')->select('cus_name','cus_email')->where("cus_id","=",$cust_id)->get();
            $customer_name=$customer_det[0]->cus_name;
            $customer_email=$customer_det[0]->cus_email;

            $date=$_POST["date"];
            $prod_id=$_POST["prod_id"];
            $prod_title=DB::table('nm_deals')->select('deal_title as pro_title')->where("deal_id","=",$prod_id)->get();
            $prod_title=$prod_title[0]->pro_title;
            $transaction_id=$_POST["transaction_id"];
            $get_subtotal=$order_detail[0]->cod_amt+$order_detail[0]->cod_taxAmt;
            
            

            $admin_id="1";
            $admin_det=DB::table('nm_admin')->select('adm_email')->where("adm_id","=",$admin_id)->get();
            $admin_email=$admin_det[0]->adm_email;

            $array = array('email_id'=>"sathyaseelan@pofitec.com");
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            if(isset($_POST["approve"]))
            {
                 Transactions::approve_cancel_cod($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id);
                 /* Sending mail to following merchanta customer and admin */
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail', array(   
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$customer_email)
                    {
                        $message->to($customer_email)->subject("Cancel Request Approved");
                    });
                    
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_admin', array(    
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$admin_email)
                    {
                        $message->to($admin_email)->subject("Cancel Request Approved");
                    });
            }
            if(isset($_POST["disapprove"]))
            {
                Transactions::disapprove_cancel_cod($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id);
                 /* Sending mail to following merchanta customer and admin */

                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail', array(   
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$customer_email)
                    {
                        $message->to($customer_email)->subject("Cancel Request DisApproved");
                    });
                    
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_admin', array(    
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$admin_email)
                    {
                        $message->to($admin_email)->subject("Cancel Request DisApproved");
                    });
            }
           return Redirect::to('adm_dealcod_cancel_orders');
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function adm_dealcod_return_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
             
            $payment_type=0;
            $order_type=2;
            $calceled_order  = Transactions::get_return_order($payment_type,$order_type,$from_date,$to_date);
            $returned_order  = Transactions::returned_dealorder_allcod($from_date,$to_date); 
            $er_msg ='';
            if(Session::has('er_msg') )
                 $er_msg = Session::get('er_msg');
            return view('siteadmin.dealcod_return_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with("er_msg",$er_msg)->with("returned_order",$returned_order);
           ;
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deal_get_approve_Returncontent($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);

            echo '<b>Return Note:</b><br>'.strip_tags($data[0]->return_notes);
            echo '<br><b>Return Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->return_date));
            if($data[0]->return_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                {
                    $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                }
                else 
                {
                    $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                }
            echo '
                <form action="'.url('').'/adm_deal_approve_return_request" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->cod_order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve return request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve return request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->return_status==2)
                        $status ='Returned';
                if($data[0]->return_status==4)
                        $status ='Disapproved';

                echo '<br><b>Return Status:</b><br>'.$status;    
                echo '<br><b>Return Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->return_approved_date));
            }
             
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deal_approve_return_request()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
           
            $admin_id="1";
            $return_Status ="";   
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            if(isset($_POST["approve"]))
            {
                 Transactions::approve_return($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                 //add return amount to wallet
                 Transactions::pay_to_wallet_cod($cod_order_id,$cust_id);
                  $return_Status ="Approved"; 
                  if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                {
                    $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                }
                else 
                {
                    $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                }  
                  Session::flash('er_msg',$er_msg);  
            }
            if(isset($_POST["disapprove"]))
            {
                 Transactions::disapprove_return($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                
                $return_Status ="Disapproved";
                if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                {
                    $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                }
                else 
                {
                    $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                }
                Session::flash('er_msg',$er_msg);     
            }
             if(Lang::has(Session::get('admin_lang_file').'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT')!= '') 
                {
                    $return_mail_subj = trans(Session::get('admin_lang_file').'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT');
                }
                else 
                {
                    $return_mail_subj =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT');
                }

            /* mail starts */
                 if($delStatus_id !=''){
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->select('od.*', 'dc.chat_id', 'dc.delStatus_id','dc.cust_id','dc.admin_id','dc.send_by','dc.note','dc.created_date','dc.status')->first(); 
                   // print_r($deliveryDetails) ;exit();
                        $prod_title = '';
                        $prod_title=DB::table('nm_deals')->select('deal_title')->where("deal_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->deal_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.returnOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->return_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->return_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->return_approved_date
                                ), function($message) use ($customer_mail,$return_mail_subj)
                            {
                                $message->to($customer_mail)->subject($return_mail_subj);
                            });     
                        }    
                        
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.returnOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->return_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'approve_status'    =>  $return_Status,
                                    'date'              =>  $deliveryDetails->return_date,
                                    'approved_date'     =>  $deliveryDetails->return_approved_date
                                ), function($message) use ($adminEmail,$return_mail_subj)
                                {
                                    $message->to($adminEmail)->subject($return_mail_subj);
                                }); 
                            }
                        }

                    }
                 /* mail ends */ 


           return Redirect::to('adm_dealcod_return_orders');
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }


    public function dealcod_replacement_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            
            $payment_type=0;
            $order_type=2;
            $calceled_order  = Transactions::get_replace_order($payment_type,$order_type,$from_date,$to_date);
            $replace_order  = Transactions::replace_dealorder_allcod($from_date,$to_date); 
            $er_msg = '';
            if(Session::has("er_msg"))
                $er_msg = Session::get("er_msg");
            return view('siteadmin.dealcod_replace_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('replace_order',$replace_order);
           ;
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deal_get_approve_replacecontent($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);
            //print_r($data);
            echo '<b>Replace Note:</b><br>'.strip_tags($data[0]->replace_notes);
            echo '<br><b>Replace Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_date));
            if($data[0]->replace_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                    {
                        $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                    else 
                    {
                        $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
            echo '
                <form action="'.url('').'/adm_deal_approve_replace_request" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->cod_order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                     <input name="mer_id" type="hidden" value="'.$data[0]->mer_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve replace request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve replace request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->replace_status==2)
                        $status ='Replaced';
                 if($data[0]->replace_status==4)
                        $status ='Disapproved';

                echo '<br><b>Replace Status:</b><br>'.$status;
                echo '<br><b>Replace Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_approved_date));
            }
             
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deal_approve_replace_request()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
            $mer_id='';
            $admin_id="1";
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            $return_Status =" "; 

            //check product qunatity to replace
            $prod_info =DB::table('nm_deals as prod')->join("nm_order as ord","ord.order_pro_id",'=',"prod.deal_id")->join("nm_order_delivery_status AS od","od.prod_id",'=',"prod.deal_id")->select('prod.deal_id as pro_id','prod.deal_no_of_purchase as pro_no_of_purchase','prod.deal_max_limit as pro_qty','ord.order_qty as cod_qty')->where("od.delStatus_id","=",$delStatus_id)->where("ord.order_id","=",$cod_order_id)->first();
           // echo $_POST["disapprove"];
            //print_r($prod_info);exit();
            if(count($prod_info)>0){
                if(isset($_POST["approve"]))
                {
                    $available_qty = $prod_info->pro_qty - $prod_info->pro_no_of_purchase;
                    if($available_qty>$prod_info->cod_qty){
                        $new_purchased = $prod_info->pro_no_of_purchase+$prod_info->cod_qty;
                         Transactions::approve_replace($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$mer_id,$cust_id,$admin_id,'3');  
                         $return_Status ="Approved";   
                          //Update Product quantity
                        Products::edit_product(array('pro_no_of_purchase' => $new_purchased  ),$prod_info->pro_id); 
                        
                        if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                        {
                            $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                        }
                        else 
                        {
                            $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                        }
                        Session::flash("er_msg",$er_msg);
                    }else{
                        $er_msg = "quantity not available";
                        Session::flash("er_msg",$er_msg);
                       return redirect("adm_cod_replacement_orders")->with('er_msg',$er_msg);
                    }
                              
                }
                if(isset($_POST["disapprove"]))
                {
                     Transactions::disapprove_replace($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$mer_id,$cust_id,$admin_id,'3');
                     $return_Status ="Disapproved"; 
                     if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                    {
                        $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                    }
                    else 
                    {
                        $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                    }
                     
                    Session::flash("er_msg",$er_msg);
                    
                }


             /* mail starts */
                 if($delStatus_id !=''){
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->first(); 
                   // print_r($deliveryDetails) ;exit();
                        $prod_title = '';
                        $prod_title=DB::table('nm_product')->select('pro_title')->where("pro_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->pro_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->replace_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Approve/Disapprove Notification');
                            });     
                        }    
                        //merchant mail
                        $get_mer_email  = Home::get_mer_email($deliveryDetails->mer_id);
                        $mer_email      = $get_mer_email[0]->mer_email;
                        if($mer_email!=''){
                            Mail::send('emails.replaceOrderApproveOrDisapprove_mail_to_merchant', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->replace_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($mer_email)
                            {
                                $message->to($mer_email)->subject('Order replace Approve/Disapprove Notification');
                            }); 
                        }
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'date'              =>  $deliveryDetails->replace_date,
                                    'approve_status'    =>  $return_Status,
                                    'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Approve/Disapprove Notification');
                                }); 
                            }
                        }

                    }
                 /* mail ends */ 
     
            }else{
                $er_msg = "Product Not available";
                Session::flash("er_msg",$er_msg);
                return redirect("mer_dealcod_replacement_orders");
            }     

            return redirect("adm_dealcod_replacement_orders");
            
        } else {

            return Redirect::to('siteadmin');
        }
        
    }


    /* deal cod  end */  


    /* product  */

    public function adm_cod_cancel_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $payment_type=0;
            $order_type=1; 
            $calceled_order_all  = Transactions::get_calceled_order($payment_type,$order_type,$from_date,$to_date); 
            $calceled_order  = Transactions::get_calceled_order_alltype($from_date,$to_date); 
            
            /* echo '<pre>';print_r($calceled_order);die; */
            $er_msg = '';
            return view('siteadmin.productcod_canceled_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('calceled_order_all',$calceled_order_all);
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function adm_cancel_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            
            $payment_type=1;
            $order_type=1;
            $calceled_order  = Transactions::get_calceled_order_paypal($payment_type,$order_type,$from_date,$to_date);
            $calceled_order_all  = Transactions::calceled_order_allpaypal($from_date,$to_date); 
            /* echo '<pre>';print_r($calceled_order);die; */
            $er_msg = '';
            return view('siteadmin.productcod_canceled_orders_paypal')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('calceled_order_all',$calceled_order_all);
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    public function get_approve_content($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);
           //echo '<pre>';print_r($data);die;
            echo '<b>Cancel Note:</b><br>'.strip_tags($data[0]->cancel_notes);
            echo '<br><b>Cancel Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->cancel_date));
            if($data[0]->cancel_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                {
                    $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                }
                else 
                {
                    $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                }
            echo '
                <form action="'.url('').'/adm_approve_cancel_request" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->cod_order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input name="date" type="hidden" value="'.$data[0]->cancel_date.'"/>
                    <input name="prod_id" type="hidden" value="'.$data[0]->prod_id.'"/>
                     <input name="transaction_id" type="hidden" value="'.$data[0]->transaction_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <input type="hidden" name="get_subtotal" value="'.$data[0]->transaction_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div>
                    <div class="col-sm-12 btn-group">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve cancel request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve cancel request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->cancel_status==2)
                        $status ='Cancelled';
                if($data[0]->cancel_status==4)
                        $status ='Disapproved';
                echo '<br><b>Cancel Status:</b><br>'.$status;
                echo '<br><b>Cancel Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->cancel_approved_date));
            }
            //echo '<pre>';print_r($data);die; 
            //echo $cod_id; 
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    public function get_approve_content_paypal($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);
           //echo '<pre>';print_r($data);die;
            echo '<b>Cancel Note:</b><br>'.strip_tags($data[0]->cancel_notes);
            echo '<br><b>Cancel Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->cancel_date));
            if($data[0]->cancel_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                {
                    $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                }
                else 
                {
                    $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                }
            echo '
                <form action="'.url('').'/adm_approve_cancel_request_paypal" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="order_id" type="hidden" value="'.$data[0]->order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input name="date" type="hidden" value="'.$data[0]->cancel_date.'"/>
                    <input name="prod_id" type="hidden" value="'.$data[0]->prod_id.'"/>
                    <input name="transaction_id" type="hidden" value="'.$data[0]->transaction_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <input type="hidden" name="get_subtotal" value="'.$data[0]->transaction_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div>
                    <div class="col-sm-12 btn-group">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve cancel request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve cancel request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->cancel_status==2)
                        $status ='Cancelled';
                if($data[0]->cancel_status==4)
                        $status ='Disapproved';
                echo '<br><b>Cancel Status:</b><br>'.$status;
                echo '<br><b>Cancel Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->cancel_approved_date));
            }
            //echo '<pre>';print_r($data);die; 
            //echo $cod_id; 
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    public function approve_cancel_request()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            /*print_r($_POST);die;*/
            $cod_order_id=$_POST["cod_order_id"];
            $order_detail=DB::table('nm_ordercod')->select('cod_amt','cod_taxAmt')->where("cod_id","=",$cod_order_id)->get();
            $delStatus_id=$_POST["delStatus_id"];

            $cust_id=$_POST["order_cust_id"];
            $customer_det=DB::table('nm_customer')->select('cus_name','cus_email')->where("cus_id","=",$cust_id)->get();
            $customer_name=$customer_det[0]->cus_name;
            $customer_email=$customer_det[0]->cus_email;

            $date=$_POST["date"];
            $prod_id=$_POST["prod_id"];
            $prod_title=DB::table('nm_product')->select('pro_title')->where("pro_id","=",$prod_id)->get();
            $prod_title=$prod_title[0]->pro_title;
            $transaction_id=$_POST["transaction_id"];
            $get_subtotal=$order_detail[0]->cod_amt+$order_detail[0]->cod_taxAmt;
            
            $mer_id=$_POST['mer_id'];
            $merchant_det=DB::table('nm_merchant')->select('mer_email')->where("mer_id","=",$mer_id)->get();
            $merchant_email=$merchant_det[0]->mer_email;

            $admin_id="1";
            $admin_det=DB::table('nm_admin')->select('adm_email')->where("adm_id","=",$admin_id)->get();
            $admin_email=$admin_det[0]->adm_email;

            $array = array('email_id'=>"sathyaseelan@pofitec.com");
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            if(isset($_POST["approve"]))
            {
                Transactions::approve_cancel_cod($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$mer_id,$cust_id,$admin_id);
                 /* Sending mail to following merchanta customer and admin */
                 /* For language change in mail template */
                $this->setLanguageLocaleMerchant();
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail', array(   
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$customer_email)
                    {
                        $message->to($customer_email)->subject("Cancel Request Approved");
                    });
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_merchant', array(    
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$merchant_email)
                    {
                        $message->to($merchant_email)->subject("Cancel Request Approved");
                    });
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_admin', array(    
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$admin_email)
                    {
                        $message->to($admin_email)->subject("Cancel Request Approved");
                    });
            }
            if(isset($_POST["disapprove"]))
            {
                 Transactions::disapprove_cancel_cod($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$mer_id,$cust_id,$admin_id);
                 /* Sending mail to following merchanta customer and admin */
                    $this->setLanguageLocaleMerchant();
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail', array(   
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$customer_email)
                    {
                        $message->to($customer_email)->subject("Cancel Request DisApproved");
                    });
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_merchant', array(    
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$merchant_email)
                    {
                        $message->to($merchant_email)->subject("Cancel Request DisApproved");
                    });
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_admin', array(    
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$admin_email)
                    {
                        $message->to($admin_email)->subject("Cancel Request DisApproved");
                    });
            }  
            /* For language change in mail template AS ADMIN LANGUAGE*/
            $this->setLanguageLocaleAdmin();
           return Redirect::to('adm_cod_cancel_orders');
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    public function approve_cancel_request_paypal()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            /*print_r($_POST);die;*/
            $order_id=$_POST["order_id"];
            $order_detail=DB::table('nm_order')->select('order_amt as cod_amt','order_taxAmt as cod_taxAmt')->where("order_id","=",$order_id)->get();
            $delStatus_id=$_POST["delStatus_id"];

            $cust_id=$_POST["order_cust_id"];
            $customer_det=DB::table('nm_customer')->select('cus_name','cus_email')->where("cus_id","=",$cust_id)->get();
            $customer_name=$customer_det[0]->cus_name;
            $customer_email=$customer_det[0]->cus_email;

            $date=$_POST["date"];
            $prod_id=$_POST["prod_id"];
            $prod_title=DB::table('nm_product')->select('pro_title')->where("pro_id","=",$prod_id)->get();
            $prod_title=$prod_title[0]->pro_title;
            $transaction_id=$_POST["transaction_id"];
            $get_subtotal=$order_detail[0]->cod_amt+$order_detail[0]->cod_taxAmt;
            $admin_id="1";
            $admin_det=DB::table('nm_admin')->select('adm_email')->where("adm_id","=",$admin_id)->get();
            $admin_email=$admin_det[0]->adm_email;

            $array = array('email_id'=>"sathyaseelan@pofitec.com");
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            if(isset($_POST["approve"]))
            {
                 Transactions::approve_cancel($delStatus_id,$order_id,$approve_or_disapprove_note,$cust_id,$admin_id);
                 /* Sending mail to following merchanta customer and admin */
                 Transactions::pay_to_wallet($order_id,$cust_id);
                

                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail', array(   
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$customer_email)
                    {
                        $message->to($customer_email)->subject("Cancel Request Approved");
                    });
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_admin', array(    
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$admin_email)
                    {
                        $message->to($admin_email)->subject("Cancel Request Approved");
                    });
            }
            if(isset($_POST["disapprove"]))
            {
                  Transactions::disapprove_cancel($delStatus_id,$order_id,$approve_or_disapprove_note,$cust_id,$admin_id);
                 /* Sending mail to following merchanta customer and admin */

                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail', array(   
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$customer_email)
                    {
                        $message->to($customer_email)->subject("Cancel Request DisApproved");
                    });
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_admin', array(    
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$admin_email)
                    {
                        $message->to($admin_email)->subject("Cancel Request DisApproved");
                    });
            }
           return Redirect::to('adm_cancel_orders');
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    /* paypal REturn order starts */
    public function adm_return_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
             
            $payment_type=1;
            $order_type=1;
            $calceled_order  = Transactions::get_return_order_paypal($payment_type,$order_type,$from_date,$to_date);
            $returned_order_all  = Transactions::returned_order_allpaypal($from_date,$to_date);
            $er_msg = '';
            if(Session::has('er_msg') )
                 $er_msg = Session::get('er_msg');
            return view('siteadmin.product_return_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('returned_order_all',$returned_order_all);
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function get_approve_Returncontent_paypal($delStatus_id)
    {
        if (Session::get('userid')) {  
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                    {
                        $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                    else 
                    {
                        $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
 
            echo '<b>Return Note:</b><br>'.strip_tags($data[0]->return_notes); 
            echo '<br><b>Return Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->return_date));
            if($data[0]->return_status==1)
            { 
            echo '
                <form action="'.url('').'/adm_approve_return_request_paypal" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve return request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve return request">
                    </div>
                </form>';
            } 
            else{
                $status ='Order Delivered';
                if($data[0]->replace_status==2)
                        $status ='Returned';
                if($data[0]->replace_status==4)
                        $status ='Disapproved';

                echo '<br><b>Return Status:</b><br>'.$status;    
                echo '<br><b>Return Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->return_approved_date));
            }
             
           
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function approve_return_request_paypal()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
            $admin_id="1";
            $return_Status ="";   
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            if(isset($_POST["approve"]))
            {
                 Transactions::approve_return_paypal($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');

                 //add return amount to wallet
                 Transactions::pay_to_wallet($cod_order_id,$cust_id);

                  $return_Status ="Approved"; 
                  if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                {
                    $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                }
                else 
                {
                    $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                } 
                  Session::flash('er_msg',$er_msg);   
            }
            if(isset($_POST["disapprove"]))
            {
                 Transactions::disapprove_return_paypal($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                $return_Status ="Disapproved"; 
                if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                {
                    $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                }
                else 
                {
                    $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                }
                Session::flash('er_msg',$er_msg);  
            }

            /* mail starts */
                 if(Lang::has(Session::get('admin_lang_file').'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT')!= '') 
                {
                    $return_mail_subj = trans(Session::get('admin_lang_file').'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT');
                }
                else 
                {
                    $return_mail_subj =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT');
                }
                 if($delStatus_id !=''){
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->first(); 
                   // print_r($deliveryDetails) ;exit();
                        $prod_title = '';
                        $prod_title=DB::table('nm_product')->select('pro_title')->where("pro_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->pro_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.returnOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->return_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->return_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->return_approved_date
                                ), function($message) use ($customer_mail,$return_mail_subj)
                            {
                                $message->to($customer_mail)->subject($return_mail_subj);
                            });     
                        }    
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.returnOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->return_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'approve_status'    =>  $return_Status,
                                    'date'              =>  $deliveryDetails->return_date,
                                    'approved_date'     =>  $deliveryDetails->return_approved_date
                                ), function($message) use ($adminEmail,$return_mail_subj)
                                {
                                    $message->to($adminEmail)->subject($return_mail_subj);
                                }); 
                            }
                        }

                    }
                 /* mail ends */ 


           return Redirect::to('adm_return_orders');
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    /* paypal replacement starts */
    public function adm_replacement_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            
            $payment_type=1;
            $order_type=1;
            $calceled_order  = Transactions::get_replace_order_paypal($payment_type,$order_type,$from_date,$to_date);
            $replace_order_all  = Transactions::replace_order_allpaypal($from_date,$to_date); 
            
            $er_msg = '';
            if(Session::has("er_msg"))
                $er_msg = Session::get("er_msg");
            return view('siteadmin.product_replace_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('replace_order_all',$replace_order_all);
           ;
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function get_approve_replacecontent_paypal($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);
            //print_r($data);
            echo '<b>Replace Note:</b><br>'.strip_tags($data[0]->replace_notes);
            echo '<br><b>Replace Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_date));
            if($data[0]->replace_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                    {
                        $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                    else 
                    {
                        $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
            echo '
                <form action="'.url('').'/adm_approve_replace_request_paypal" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve replace request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve replace request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->replace_status==2)
                        $status ='Replaced';
                 if($data[0]->replace_status==4)
                        $status ='Disapproved';

                echo '<br><b>Replace Status:</b><br>'.$status;
                echo '<br><b>Replace Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_approved_date));
            }
             
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function approve_replace_request_paypal()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
            $admin_id="1";
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            $return_Status =" "; 

            //check product qunatity to replace
            $prod_info =DB::table('nm_product as prod')->join("nm_order as ord","ord.order_pro_id",'=',"prod.pro_id")->join("nm_order_delivery_status AS od","od.prod_id",'=',"prod.pro_id")->select('prod.pro_id','prod.pro_no_of_purchase','prod.pro_qty','ord.order_qty as cod_qty')->where("od.delStatus_id","=",$delStatus_id)->where("ord.order_id","=",$cod_order_id)->first();
           // echo $_POST["disapprove"];
            //print_r($prod_info);exit();
            if(count($prod_info)>0){
                if(isset($_POST["approve"]))
                {
                    $available_qty = $prod_info->pro_qty - $prod_info->pro_no_of_purchase;
                    if($available_qty>$prod_info->cod_qty){
                        $new_purchased = $prod_info->pro_no_of_purchase+$prod_info->cod_qty;
                         Transactions::approve_replace_paypal($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');  
                         $return_Status ="Approved";   
                          //Update Product quantity
                        Products::edit_product(array('pro_no_of_purchase' => $new_purchased),$prod_info->pro_id); 
                        if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                        {
                            $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                        }
                        else 
                        {
                            $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                        }
                        
                        Session::flash("er_msg",$er_msg);
                    }else{
                        $er_msg = "quantity not available";
                        Session::flash("er_msg",$er_msg);
                       return redirect("adm_replacement_orders")->with('er_msg',$er_msg);
                    }
                              
                }
                if(isset($_POST["disapprove"]))
                {
                     Transactions::disapprove_replace_paypal($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                     $return_Status ="Disapproved"; 
                     if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                    {
                        $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                    }
                    else 
                    {
                        $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                    }

                    Session::flash("er_msg",$er_msg);
                    
                }


             /* mail starts */
                 if($delStatus_id !=''){
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->first(); 
                   // print_r($deliveryDetails) ;exit();
                        $prod_title = '';
                        $prod_title=DB::table('nm_product')->select('pro_title')->where("pro_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->pro_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->replace_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Approve/Disapprove Notification');
                            });     
                        }    
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'date'              =>  $deliveryDetails->replace_date,
                                    'approve_status'    =>  $return_Status,
                                    'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Approve/Disapprove Notification');
                                }); 
                            }
                        }

                    }
                 /* mail ends */ 
     
            }else{
                $er_msg = "Product Not available";
                Session::flash("er_msg",$er_msg);
                return redirect("adm_replacement_orders");
            }     

            return redirect("adm_replacement_orders");
            
        } else {

            return Redirect::to('siteadmin');
        }
        
    }

    /* product payumoney */

    /* Cancel order */
    public function adm_payu_cancel_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
           
            $payment_type=1;
            $order_type=1;
            $calceled_order  = Transactions::get_canceled_order_payu($payment_type,$order_type,$from_date,$to_date);
            $calceled_order_all  = Transactions::calceled_order_allpayu($from_date,$to_date); 
            /* echo '<pre>';print_r($calceled_order);die; */
            $er_msg = '';
            return view('siteadmin.productcod_canceled_orders_payumoney')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('calceled_order_all',$calceled_order_all);
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

      public function get_approve_content_payu($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content_payu($delStatus_id);
           //echo '<pre>';print_r($data);die;
            echo '<b>Cancel Note:</b><br>'.strip_tags($data[0]->cancel_notes);
            echo '<br><b>Cancel Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->cancel_date));
            if($data[0]->cancel_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                {
                    $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                }
                else 
                {
                    $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                }
            echo '
                <form action="'.url('').'/adm_approve_cancel_request_payu" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="order_id" type="hidden" value="'.$data[0]->order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input name="date" type="hidden" value="'.$data[0]->cancel_date.'"/>
                    <input name="prod_id" type="hidden" value="'.$data[0]->prod_id.'"/>
                    <input name="transaction_id" type="hidden" value="'.$data[0]->transaction_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <input type="hidden" name="get_subtotal" value="'.$data[0]->transaction_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div>
                    <div class="col-sm-12 btn-group">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve cancel request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve cancel request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->cancel_status==2)
                        $status ='Cancelled';
                if($data[0]->cancel_status==4)
                        $status ='Disapproved';
                echo '<br><b>Cancel Status:</b><br>'.$status;
                echo '<br><b>Cancel Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->cancel_approved_date));
            }
            //echo '<pre>';print_r($data);die; 
            //echo $cod_id; 
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function approve_cancel_request_payu()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            /*print_r($_POST);die;*/
            $order_id=$_POST["order_id"];
            $order_detail=DB::table('nm_order_payu')->select('order_amt as cod_amt','order_taxAmt as cod_taxAmt')->where("order_id","=",$order_id)->get();
            $delStatus_id=$_POST["delStatus_id"];

            $cust_id=$_POST["order_cust_id"];
            $customer_det=DB::table('nm_customer')->select('cus_name','cus_email')->where("cus_id","=",$cust_id)->get();
            $customer_name=$customer_det[0]->cus_name;
            $customer_email=$customer_det[0]->cus_email;

            $date=$_POST["date"];
            $prod_id=$_POST["prod_id"];
            $prod_title=DB::table('nm_product')->select('pro_title')->where("pro_id","=",$prod_id)->get();
            $prod_title=$prod_title[0]->pro_title;
            $transaction_id=$_POST["transaction_id"];
            $get_subtotal=$order_detail[0]->cod_amt+$order_detail[0]->cod_taxAmt;
            
            $admin_id="1";
            $admin_det=DB::table('nm_admin')->select('adm_email')->where("adm_id","=",$admin_id)->get();
            $admin_email=$admin_det[0]->adm_email;

            $array = array('email_id'=>"sathyaseelan@pofitec.com");
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            if(isset($_POST["approve"]))
            {
                 Transactions::approve_cancel_payu($delStatus_id,$order_id,$approve_or_disapprove_note,$cust_id,$admin_id);
                 /* Sending mail to following merchanta customer and admin */
                 Transactions::pay_to_wallet_payu($order_id,$cust_id);
                

                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail', array(   
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$customer_email)
                    {
                        $message->to($customer_email)->subject("Cancel Request Approved");
                    });
                   Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_admin', array(    
                    'status' => 'Success',
                    'approve_status' => 'Approved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$admin_email)
                    {
                        $message->to($admin_email)->subject("Cancel Request Approved");
                    });
            }
            if(isset($_POST["disapprove"]))
            {
                  Transactions::disapprove_cancel_payu($delStatus_id,$order_id,$approve_or_disapprove_note,$cust_id,$admin_id);
                 /* Sending mail to following merchanta customer and admin */

                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail', array(   
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$customer_email)
                    {
                        $message->to($customer_email)->subject("Cancel Request DisApproved");
                    });
                    Mail::send('emails.cancelOrderApproveOrDisapprove_mail_to_admin', array(    
                    'status' => 'Success',
                    'approve_status' => 'DisApproved',
                    'transaction_id' => $transaction_id,
                    'prod_title' => $prod_title,
                    'date' => $date,
                    'customer_name' => $customer_name,
                    'cancel_notes' => strip_tags($approve_or_disapprove_note),
                    'Sub_total' =>  $get_subtotal), 
                    function($message) use($array,$admin_email)
                    {
                        $message->to($admin_email)->subject("Cancel Request DisApproved");
                    });
            }
           return Redirect::to('adm_payu_cancel_orders');
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
  
    /* cancel order ends*/

    /* return order starts */
     public function adm_payu_return_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            
            $payment_type=1;
            $order_type=1;
            $calceled_order  = Transactions::get_return_order_payu($payment_type,$order_type,$from_date,$to_date);
            $returned_order_all  = Transactions::returned_order_allpayu($from_date,$to_date);
            $er_msg = '';
             // echo $returned_order_all; exit;
            if(Session::has('er_msg') )
                 $er_msg = Session::get('er_msg');
            return view('siteadmin.product_payu_return_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('returned_order_all',$returned_order_all);
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function get_approve_Returncontent_payu($delStatus_id)
    {
        if (Session::get('userid')) {  
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content_payu($delStatus_id);
            
            if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                    {
                        $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                    else 
                    {
                        $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
 
            echo '<b>Return Note:</b><br>'.strip_tags($data[0]->return_notes); 
            echo '<br><b>Return Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->return_date));
            if($data[0]->return_status==1)
            { 
            echo '
                <form action="'.url('').'/adm_approve_return_request_payu" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve return request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve return request">
                    </div>
                </form>';
            } 
            else{
                $status ='Order Delivered';
                if($data[0]->replace_status==2)
                        $status ='Returned';
                if($data[0]->replace_status==4)
                        $status ='Disapproved';

                echo '<br><b>Return Status:</b><br>'.$status;    
                echo '<br><b>Return Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->return_approved_date));
            }
             
           
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function approve_return_request_payu()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
           
            $admin_id="1";
            $return_Status ="";   
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            if(isset($_POST["approve"]))
            {
                 Transactions::approve_return_payu($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');

                 //add return amount to wallet
                 Transactions::pay_to_wallet_payu($cod_order_id,$cust_id);

                  $return_Status ="Approved"; 
                  if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                {
                    $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                }
                else 
                {
                    $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                } 
                  Session::flash('er_msg',$er_msg);   
            }
            if(isset($_POST["disapprove"]))
            {
                 Transactions::disapprove_return_payu($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                $return_Status ="Disapproved"; 
                if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                {
                    $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                }
                else 
                {
                    $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                }
                Session::flash('er_msg',$er_msg);  
            }

            /* mail starts */
                 if(Lang::has(Session::get('admin_lang_file').'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT')!= '') 
                {
                    $return_mail_subj = trans(Session::get('admin_lang_file').'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT');
                }
                else 
                {
                    $return_mail_subj =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT');
                }
                 if($delStatus_id !=''){
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->first(); 
                   // print_r($deliveryDetails) ;exit();
                        $prod_title = '';
                        $prod_title=DB::table('nm_product')->select('pro_title')->where("pro_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->pro_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.returnOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->return_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->return_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->return_approved_date
                                ), function($message) use ($customer_mail,$return_mail_subj)
                            {
                                $message->to($customer_mail)->subject($return_mail_subj);
                            });     
                        }    
                       //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.returnOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->return_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'approve_status'    =>  $return_Status,
                                    'date'              =>  $deliveryDetails->return_date,
                                    'approved_date'     =>  $deliveryDetails->return_approved_date
                                ), function($message) use ($adminEmail,$return_mail_subj)
                                {
                                    $message->to($adminEmail)->subject($return_mail_subj);
                                }); 
                            }
                        }

                    }
                 /* mail ends */ 


           return Redirect::to('adm_payu_return_orders');
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }


    /* return order ends */

    /* replace order starts */

    /* paypal replacement starts */
    public function adm_payu_replacement_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
           $payment_type=1;
            $order_type=1;
            $calceled_order  = Transactions::get_replace_order_payu($payment_type,$order_type,$from_date,$to_date);
            $replace_order_all  = Transactions::replace_order_allpayu($from_date,$to_date); 
            
            $er_msg = '';
            if(Session::has("er_msg"))
                $er_msg = Session::get("er_msg");
            return view('siteadmin.product_payu_replace_order')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('replace_order_all',$replace_order_all);
           ;
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function get_approve_replacecontent_payu($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content_payu($delStatus_id);
            //print_r($data);
            echo '<b>Replace Note:</b><br>'.strip_tags($data[0]->replace_notes);
            echo '<br><b>Replace Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_date));
            if($data[0]->replace_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                    {
                        $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                    else 
                    {
                        $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
            echo '
                <form action="'.url('').'/adm_approve_replace_request_payu" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve replace request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve replace request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->replace_status==2)
                        $status ='Replaced';
                 if($data[0]->replace_status==4)
                        $status ='Disapproved';

                echo '<br><b>Replace Status:</b><br>'.$status;
                echo '<br><b>Replace Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_approved_date));
            }
             
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function approve_replace_request_payu()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
            $admin_id="1";
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            $return_Status =" "; 

            //check product qunatity to replace
            $prod_info =DB::table('nm_product as prod')->join("nm_order_payu as ord","ord.order_pro_id",'=',"prod.pro_id")->join("nm_order_delivery_status AS od","od.prod_id",'=',"prod.pro_id")->select('prod.pro_id','prod.pro_no_of_purchase','prod.pro_qty','ord.order_qty as cod_qty')->where("od.delStatus_id","=",$delStatus_id)->where("ord.order_id","=",$cod_order_id)->first();
           // echo $_POST["disapprove"];
            //print_r($prod_info);exit();
            if(count($prod_info)>0){
                if(isset($_POST["approve"]))
                {
                    $available_qty = $prod_info->pro_qty - $prod_info->pro_no_of_purchase;
                    if($available_qty>$prod_info->cod_qty){
                        $new_purchased = $prod_info->pro_no_of_purchase+$prod_info->cod_qty;
                         Transactions::approve_replace_payu($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');  
                         $return_Status ="Approved";   
                          //Update Product quantity
                        Products::edit_product(array('pro_no_of_purchase' => $new_purchased),$prod_info->pro_id); 
                        if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                        {
                            $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                        }
                        else 
                        {
                            $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                        }
                        
                        Session::flash("er_msg",$er_msg);
                    }else{
                        $er_msg = "quantity not available";
                        Session::flash("er_msg",$er_msg);
                       return redirect("adm_replacement_orders")->with('er_msg',$er_msg);
                    }
                              
                }
                if(isset($_POST["disapprove"]))
                {
                     Transactions::disapprove_replace_payu($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                     $return_Status ="Disapproved"; 
                     if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                    {
                        $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                    }
                    else 
                    {
                        $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                    }

                    Session::flash("er_msg",$er_msg);
                    
                }


             /* mail starts */
                 if($delStatus_id !=''){
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->first(); 
                   // print_r($deliveryDetails) ;exit();
                        $prod_title = '';
                        $prod_title=DB::table('nm_product')->select('pro_title')->where("pro_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->pro_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->replace_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Approve/Disapprove Notification');
                            });     
                        }    
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'date'              =>  $deliveryDetails->replace_date,
                                    'approve_status'    =>  $return_Status,
                                    'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Approve/Disapprove Notification');
                                }); 
                            }
                        }

                    }
                 /* mail ends */ 
     
            }else{
                $er_msg = "Product Not available";
                Session::flash("er_msg",$er_msg);
                return redirect("adm_payu_replacement_orders");
            }     

            return redirect("adm_payu_replacement_orders");
            
        } else {

            return Redirect::to('siteadmin');
        }
        
    }


    /*replace order ends */
    /* Product payumoney ends */

    /* product cod */

    /* REturn order starts */
    public function adm_cod_return_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            
            $payment_type=0;
            $order_type=1;
            $calceled_order  = Transactions::get_return_order($payment_type,$order_type,$from_date,$to_date);
            $return_order_all  = Transactions::get_return_order_alltype($from_date,$to_date); 

            $er_msg ='';
            if(Session::has('er_msg') )
                 $er_msg = Session::get('er_msg');
            return view('siteadmin.productcod_return_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with("er_msg",$er_msg)->with("return_order_all", $return_order_all);
           ;
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function get_approve_Returncontent($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);

            echo '<b>Return Note:</b><br>'.strip_tags($data[0]->return_notes);
            echo '<br><b>Return Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->return_date));
            if($data[0]->return_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                {
                    $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                }
                else 
                {
                    $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                }
            echo '
                <form action="'.url('').'/adm_approve_return_request" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->cod_order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve return request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve return request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->return_status==2)
                        $status ='Returned';
                if($data[0]->return_status==4)
                        $status ='Disapproved';

                echo '<br><b>Return Status:</b><br>'.$status;    
                echo '<br><b>Return Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->return_approved_date));
            }
             
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function approve_return_request()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
            $admin_id="1";
            $return_Status ="";   
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            if(isset($_POST["approve"]))
            {
                Transactions::approve_return($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                 //add return amount to wallet
                 Transactions::pay_to_wallet_cod($cod_order_id,$cust_id);
                  $return_Status ="Approved"; 
                  if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                {
                    $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                }
                else 
                {
                    $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                }  
                  Session::flash('er_msg',$er_msg);  
            }
            if(isset($_POST["disapprove"]))
            {
                Transactions::disapprove_return($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                $return_Status ="Disapproved";
                if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                {
                    $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                }
                else 
                {
                    $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                }
                Session::flash('er_msg',$er_msg);     
            }

             if(Lang::has(Session::get('admin_lang_file').'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT')!= '') 
                {
                    $return_mail_subj = trans(Session::get('admin_lang_file').'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT');
                }
                else 
                {
                    $return_mail_subj =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_RETURN_APPROVE_DISAPPROVED_SUBJECT');
                }

            /* mail starts */
                 if($delStatus_id !=''){
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->first(); 
                    
                        $prod_title = '';
                        $prod_title=DB::table('nm_product')->select('pro_title')->where("pro_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->pro_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.returnOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->return_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->return_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->return_approved_date
                                ), function($message) use ($customer_mail,$return_mail_subj)
                            {
                                $message->to($customer_mail)->subject($return_mail_subj);
                            });     
                        }    
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.returnOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->return_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'approve_status'    =>  $return_Status,
                                    'date'              =>  $deliveryDetails->return_date,
                                    'approved_date'     =>  $deliveryDetails->return_approved_date
                                ), function($message) use ($adminEmail,$return_mail_subj)
                                {
                                    $message->to($adminEmail)->subject($return_mail_subj);
                                }); 
                            }
                        }

                    }
                 /* mail ends */ 


           return Redirect::to('adm_cod_return_orders');
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function adm_cod_replacement_orders()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $merchantheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $merchantfooter    = view('siteadmin.includes.admin_footer');
            $merchantleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
             
            $payment_type=0;
            $order_type=1;
            
            $calceled_order  = Transactions::get_replace_order($payment_type,$order_type,$from_date,$to_date);
            $replace_order_all  = Transactions::get_replace_order_alltype($from_date,$to_date); 
            
            $er_msg = '';
            if(Session::has("er_msg"))
                $er_msg = Session::get("er_msg");
            return view('siteadmin.productcod_replace_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("calceled_order", $calceled_order)->with('from_date',$from_date)->with('to_date',$to_date)->with('er_msg',$er_msg)->with('replace_order_all',$replace_order_all);
           ;
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function get_approve_replacecontent($delStatus_id)
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $data  = Transactions::get_approve_content($delStatus_id);
            //print_r($data);
            echo '<b>Replace Note:</b><br>'.strip_tags($data[0]->replace_notes);
            echo '<br><b>Replace Applied On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_date));
            if($data[0]->replace_status==1)
            {
                 if(Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE')!= '') 
                    {
                        $note_label = trans(Session::get('admin_lang_file').'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
                    else 
                    {
                        $note_label =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_APPROVE_DISAPPROVED_NOTE');
                    }
            echo '
                <form action="'.url('').'/adm_approve_replace_request" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input name="cod_order_id" type="hidden" value="'.$data[0]->cod_order_id.'"/>
                    <input name="order_cust_id" type="hidden" value="'.$data[0]->order_cust_id.'"/>
                    <input type="hidden" name="delStatus_id" value="'.$delStatus_id.'"/>
                    <div class="col-sm-12">
                        <label>'.$note_label.'</label>
                        <textarea class="form-control" required name="approve_or_disapprove_note"></textarea>
                    </div><br>
                    <div class="col-sm-12 ">
                        <input type="submit" class="btn btn-success" name="approve" value="Approve replace request">
                        <input type="submit" class="btn btn-danger" name="disapprove" value="Dis-Approve replace request">
                    </div>
                </form>';
            }
            else{
                $status ='Order Delivered';
                if($data[0]->replace_status==2)
                        $status ='Replaced';
                 if($data[0]->replace_status==4)
                        $status ='Disapproved';

                echo '<br><b>Replace Status:</b><br>'.$status;
                echo '<br><b>Replace Processed On:</b><br>'.date("Y-m-d h:i A",strtotime($data[0]->replace_approved_date));
            }
             
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function approve_replace_request()
    {
        if (Session::get('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            if(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_TRANSACTION');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION');
            }
            $cod_order_id=$_POST["cod_order_id"];
            $delStatus_id=$_POST["delStatus_id"];
            $cust_id=$_POST["order_cust_id"];
            
            $admin_id="1";
            $approve_or_disapprove_note=$_POST["approve_or_disapprove_note"];
            $return_Status =" "; 

            //check product qunatity to replace
            $prod_info =DB::table('nm_product as prod')->join("nm_ordercod as cod","cod.cod_pro_id",'=',"prod.pro_id")->join("nm_order_delivery_status AS od","od.prod_id",'=',"prod.pro_id")->select('prod.pro_id','prod.pro_no_of_purchase','prod.pro_qty','cod.cod_qty')->where("od.delStatus_id","=",$delStatus_id)->where("cod.cod_id","=",$cod_order_id)->first();
           // echo $_POST["disapprove"];
            //print_r($prod_info);exit();
            
            if(count($prod_info)>0){
                if(isset($_POST["approve"]))
                { 
                    $available_qty = $prod_info->pro_qty - $prod_info->pro_no_of_purchase; 
                    if($available_qty>$prod_info->cod_qty){
                        $new_purchased = $prod_info->pro_no_of_purchase+$prod_info->cod_qty;
                        Transactions::approve_replace($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');  
                         $return_Status ="Approved";   
                          //Update Product quantity 
                            //Products::edit_product(array('pro_no_of_purchase' => $new_purchased ),$prod_info->pro_id);   
                            
                            $entry = array('pro_no_of_purchase'   => $new_purchased);
                            $pro_id = $prod_info->pro_id;
                            DB::table('nm_product')->where('pro_id', '=', $pro_id)->update($entry); 
                            
                        if(Lang::has(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY')!= '') 
                        {
                            $er_msg = trans(Session::get('admin_lang_file').'.MER_APPROVED_SUCCESSFULLY');
                        }
                        else 
                        {
                            $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_APPROVED_SUCCESSFULLY');
                        }
                        Session::flash("er_msg",$er_msg);
                    }else{
                        $er_msg = "quantity not available";
                        Session::flash("er_msg",$er_msg);
                       return redirect("adm_cod_replacement_orders")->with('er_msg',$er_msg);
                    }
                         
                }
                if(isset($_POST["disapprove"]))
                {
                     Transactions::disapprove_replace($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id,'3');
                     $return_Status ="Disapproved"; 
                     if(Lang::has(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY')!= '') 
                    {
                        $er_msg = trans(Session::get('admin_lang_file').'.MER_DISAPPROVED_SUCCESSFULLY');
                    }
                    else 
                    {
                        $er_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.MER_DISAPPROVED_SUCCESSFULLY');
                    }
                     
                    Session::flash("er_msg",$er_msg);
                    
                }


             /* mail starts */
                 if($delStatus_id !=''){
                    //echo $delStatus_id;
                    $deliveryDetails =  DB::table("nm_order_delivery_status AS od")->leftjoin("delivery_status_chat As dc","dc.delStatus_id","=","od.delStatus_id")->where("dc.delStatus_id","=",$delStatus_id)->where("dc.send_by","=",'3')->first(); 
                   // print_r($deliveryDetails) ;exit();
                    if(count($deliveryDetails)>0){
                        $prod_title = '';
                        $prod_title=DB::table('nm_product')->select('pro_title')->where("pro_id","=",$deliveryDetails->prod_id)->get();
                        $prod_title=$prod_title[0]->pro_title;


                        include('SMTP/sendmail.php');
                        //Customer mail
                        $custom_name = $customer_mail =''; 
                        $custom_data = DB::table('nm_customer')->select('cus_name','cus_email')->where('cus_id','=',$deliveryDetails->order_cust_id)->first();
                        if(count($custom_data)>0){
                        $custom_name = $custom_data->cus_name;
                        $customer_mail = $custom_data->cus_email;
                        }
                        if($customer_mail!='')
                        {

                            Mail::send('emails.replaceOrderApproveOrDisapprove_mail', array(
                                'delStatus_id'      =>  $delStatus_id,
                                'transaction_id'    =>  $deliveryDetails->transaction_id,
                                'prod_id'           =>  $deliveryDetails->prod_id,
                                'prod_title'        =>  $prod_title,
                                'customer_name'     =>  $custom_name,
                                'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                'date'              =>  $deliveryDetails->replace_date,
                                'approve_status'    =>  $return_Status,
                                'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($customer_mail)
                            {
                                $message->to($customer_mail)->subject('Order replace Approve/Disapprove Notification');
                            });     
                        }    
                        //Admin mail
                        $adminData = DB::table('nm_admin')->where('adm_id', '=', '1')->first();
                        if(count($adminData)>0){
                            $adminEmail = $adminData->adm_email;
                            if($adminEmail!='')
                            {
                                Mail::send('emails.replaceOrderApproveOrDisapprove_mail_to_admin', array(
                                    'delStatus_id'      =>  $delStatus_id,
                                    'transaction_id'    =>  $deliveryDetails->transaction_id,
                                    'prod_id'           =>  $deliveryDetails->prod_id,
                                    'prod_title'        =>  $prod_title,
                                    'customer_name'     =>  $custom_name,
                                    'return_notes'      =>  strip_tags($deliveryDetails->replace_notes),
                                    'approve_disapprove_notes'      =>  strip_tags($deliveryDetails->note),
                                    'date'              =>  $deliveryDetails->replace_date,
                                    'approve_status'    =>  $return_Status,
                                    'approved_date'     =>  $deliveryDetails->replace_approved_date
                                ), function($message) use ($adminEmail)
                                {
                                    $message->to($adminEmail)->subject('Order replace Approve/Disapprove Notification');
                                }); 
                            }
                        }

                        }
                    }
                 /* mail ends */ 
     
            }else{
                $er_msg = "Product Not available";
                Session::flash("er_msg",$er_msg);
                return redirect("adm_cod_replacement_orders");
            }     

            return redirect("adm_cod_replacement_orders");
            
        } else {

            return Redirect::to('siteadmin');
        }
        
    }
    
     public function update_order_cod_admin()
    {
        
        $orderid = $_GET['order_id'];
        $status  = $_GET['id'];
        $proid  = $_GET['proid'];
        $pay_status = 1;
        $now  = date('Y-m-d h:i:sa'); 
         
        
        if($status == 1){
            $updaters = Transactions::update_cod_status_admin($status, $orderid,$proid);
        }elseif($status == 2){
            $updaters = Transactions::update_cod_status_admin($status, $orderid,$proid);
        }elseif($status == 3){
            $updaters = Transactions::update_cod_status_admin($status, $orderid,$proid);
        }elseif($status == 4 ){
             $updaters = Transactions::update_cod_status_and_delivery($status, $orderid,$proid,$pay_status);
        }elseif($status == 6 ){
             $updaters = Transactions::update_cod_status_and_cancel($status, $orderid,$proid);
        }elseif($status == 8 ){
             $updaters = Transactions::update_cod_status_and_returned($status, $orderid,$proid);
        }elseif($status == 10 ){
             $updaters = Transactions::update_cod_status_and_replaced($status, $orderid,$proid);
        }
        
        if ($updaters) {
        echo "success";
         $getdetails = Transactions::getdetails_customer($orderid); 
         if($getdetails){ 
            $send_title = "Order Delivery Status"; 
            if($getdetails[0]->delivery_status == 2){
                    
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_PACKED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_PACKED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_PACKED');
                }
                     
            } else
                    
            if($getdetails[0]->delivery_status == 3){
                
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_DISPATCHED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_DISPATCHED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_DISPATCHED');
                }
            
            } else
            if($getdetails[0]->delivery_status == 4){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_DELIVERED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_DELIVERED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_DELIVERED');
                }
                
            } else 
            if($getdetails[0]->delivery_status == 6){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_CANCELLED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_CANCELLED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_CANCELLED');
                }
            } else 
            if($getdetails[0]->delivery_status == 8){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_REPLACED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_REPLACED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_REPLACED');
                } 
            } else 
            if($getdetails[0]->delivery_status == 10){
                    if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_RETURNED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_RETURNED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_RETURNED');
                }  
            }   
                
                
            $CusEmail = $getdetails[0]->cus_email;
            if($CusEmail!=''){
             Mail::send('emails.adminOrderstatuschange', array(
                                    'transaction_id'    =>  $orderid,
                                    'prod_title'        =>  $getdetails[0]->pro_title,
                                    'customer_name'     =>  $getdetails[0]->cus_name,
                                    'approve_status'    =>  $send_status,
                                    'status_title'      =>  $send_title,
                                    'status_message'    =>  $send_msg,
                                    'date'  =>  $now,
                                    
                                ), function($message) use ($CusEmail)
                                {
                                    $message->to($CusEmail)->subject('Order Delivery Status By Admin');
                                });   
                } 
            }           
                            
        }
                                
        
    }
    
     public function update_order_cod_admin_deal()
    {
        
        $orderid = $_GET['order_id'];
        $status  = $_GET['id'];
        $proid  = $_GET['proid'];
        $pay_status = 1;
        $now  = date('Y-m-d h:i:sa'); 
         
        
        if($status == 1){
            $updaters = Transactions::update_cod_status_admin($status, $orderid,$proid);
        }elseif($status == 2){
            $updaters = Transactions::update_cod_status_admin($status, $orderid,$proid);
        }elseif($status == 3){
            $updaters = Transactions::update_cod_status_admin($status, $orderid,$proid);
        }elseif($status == 4 ){
             $updaters = Transactions::update_cod_status_and_delivery($status, $orderid,$proid,$pay_status);
        }elseif($status == 6 ){
             $updaters = Transactions::update_cod_status_and_cancel($status, $orderid,$proid);
        }elseif($status == 8 ){
             $updaters = Transactions::update_cod_status_and_returned($status, $orderid,$proid);
        }elseif($status == 10 ){
             $updaters = Transactions::update_cod_status_and_replaced($status, $orderid,$proid);
        }
        
        if ($updaters) {
        echo "success";
         $getdetails = Transactions::getdetails_customer_deal($orderid); 
         if($getdetails){ 
            $send_title = "Order Delivery Status"; 
            if($getdetails[0]->delivery_status == 2){
                    
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_PACKED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_PACKED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_PACKED');
                }
                     
            } else
                    
            if($getdetails[0]->delivery_status == 3){
                
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_DISPATCHED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_DISPATCHED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_DISPATCHED');
                }
            
            } else
            if($getdetails[0]->delivery_status == 4){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_DELIVERED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_DELIVERED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_DELIVERED');
                }
                
            } else 
            if($getdetails[0]->delivery_status == 6){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_CANCELLED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_CANCELLED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_CANCELLED');
                }
            } else 
            if($getdetails[0]->delivery_status == 8){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_REPLACED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_REPLACED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_REPLACED');
                } 
            } else 
            if($getdetails[0]->delivery_status == 10){
                    if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_RETURNED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_RETURNED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_RETURNED');
                }  
            }   
                
                
            $CusEmail = $getdetails[0]->cus_email;
            if($CusEmail!=''){
             Mail::send('emails.adminOrderstatuschange', array(
                                    'transaction_id'    =>  $orderid,
                                    'prod_title'        =>  $getdetails[0]->deal_title,
                                    'customer_name'     =>  $getdetails[0]->cus_name,
                                    'approve_status'    =>  $send_status,
                                    'status_title'      =>  $send_title,
                                    'status_message'    =>  $send_msg,
                                    'date'  =>  $now,
                                    
                                ), function($message) use ($CusEmail)
                                {
                                    $message->to($CusEmail)->subject('Order Delivery Status By Admin');
                                });   
                } 
            }           
                            
        }
                                
        
    }
    
    public function update_order_paypal_admin()
    {
        $orderid = $_GET['order_id'];
        $status  = $_GET['id'];
        $proid  = $_GET['proid'];
        $now  = date('Y-m-d h:i:sa'); 
        $pay_status = 1; 
        if($status == 1){
            $updaters = Transactions::update_paypal_status($status, $orderid,$proid);
        }elseif($status == 2){
            $updaters = Transactions::update_paypal_status($status, $orderid,$proid);
        }elseif($status == 3){
            $updaters = Transactions::update_paypal_status($status, $orderid,$proid);
        }elseif($status == 4){
             $updaters = Transactions::update_paypal_status($status, $orderid,$proid);
        }elseif($status == 6){
             $updaters = Transactions::update_paypal_status_cancel($status, $orderid,$proid);
        }elseif($status == 8){
             $updaters = Transactions::update_paypal_status_returned($status, $orderid,$proid);
        }elseif($status == 10){
             $updaters = Transactions::update_paypal_status_replaced($status, $orderid,$proid);
        }
       
        if ($updaters) {
        echo "success";
         $getdetails = Transactions::getdetails_customer_paypal($orderid); 
         if($getdetails){ 
            $send_title = "Order Delivery Status"; 
            if($getdetails[0]->delivery_status == 2){
                    
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_PACKED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_PACKED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_PACKED');
                }
                     
            } else
                    
            if($getdetails[0]->delivery_status == 3){
                
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_DISPATCHED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_DISPATCHED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_DISPATCHED');
                }
            
            } else
            if($getdetails[0]->delivery_status == 4){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_DELIVERED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_DELIVERED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_DELIVERED');
                }
                
            } else 
            if($getdetails[0]->delivery_status == 6){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_CANCELLED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_CANCELLED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_CANCELLED');
                }
            } else 
            if($getdetails[0]->delivery_status == 8){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_REPLACED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_REPLACED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_REPLACED');
                } 
            } else 
            if($getdetails[0]->delivery_status == 10){
                    if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_RETURNED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_RETURNED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_RETURNED');
                }  
            }   
                
                
            $CusEmail = $getdetails[0]->cus_email;
            if($CusEmail!=''){
             Mail::send('emails.adminOrderstatuschange', array(
                                    'transaction_id'    =>  $orderid,
                                    'prod_title'        =>  $getdetails[0]->pro_title,
                                    'customer_name'     =>  $getdetails[0]->cus_name,
                                    'approve_status'    =>  $send_status,
                                    'status_title'      =>  $send_title,
                                    'status_message'    =>  $send_msg,
                                    'date'  =>  $now,
                                    
                                ), function($message) use ($CusEmail)
                                {
                                    $message->to($CusEmail)->subject('Order Delivery Status By Admin');
                                });   
                } 
            }           
                            
        }
        
    }

    /* Status updated in product payumoney */
    public function update_order_payu_admin()
    {
        $orderid = $_GET['order_id'];
        $status  = $_GET['id'];
        $proid  = $_GET['proid'];
        $now  = date('Y-m-d h:i:sa'); 
        $pay_status = 1; 

        if($status == 1){
            $updaters = Transactions::update_payumoney_status($status, $orderid,$proid);
        }elseif($status == 2){
            $updaters = Transactions::update_payumoney_status($status, $orderid,$proid);
        }elseif($status == 3){
            $updaters = Transactions::update_payumoney_status($status, $orderid,$proid);
        }elseif($status == 4){
             $updaters = Transactions::update_payumoney_status($status, $orderid,$proid);
        }elseif($status == 6){
             $updaters = Transactions::update_payumoney_status_cancel($status, $orderid,$proid);
        }elseif($status == 8){
             $updaters = Transactions::update_payumoney_status_returned($status, $orderid,$proid);
        }elseif($status == 10){
             $updaters = Transactions::update_payumoney_status_replaced($status, $orderid,$proid);
        }
       
        if ($updaters) {
        echo "success";
         $getdetails = Transactions::getdetails_customer_payumoney($orderid); 
         if($getdetails){ 
            $send_title = "Order Delivery Status"; 
            if($getdetails[0]->delivery_status == 2){
                    
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_PACKED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_PACKED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_PACKED');
                }
                     
            } else
                    
            if($getdetails[0]->delivery_status == 3){
                
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_DISPATCHED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_DISPATCHED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_DISPATCHED');
                }
            
            } else
            if($getdetails[0]->delivery_status == 4){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_DELIVERED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_DELIVERED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_DELIVERED');
                }
                
            } else 
            if($getdetails[0]->delivery_status == 6){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_CANCELLED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_CANCELLED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_CANCELLED');
                }
            } else 
            if($getdetails[0]->delivery_status == 8){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_REPLACED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_REPLACED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_REPLACED');
                } 
            } else 
            if($getdetails[0]->delivery_status == 10){
                    if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_RETURNED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_RETURNED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_RETURNED');
                }  
            }   
                
                
            $CusEmail = $getdetails[0]->cus_email;
            if($CusEmail!=''){
             Mail::send('emails.adminOrderstatuschange', array(
                                    'transaction_id'    =>  $orderid,
                                    'prod_title'        =>  $getdetails[0]->pro_title,
                                    'customer_name'     =>  $getdetails[0]->cus_name,
                                    'approve_status'    =>  $send_status,
                                    'status_title'      =>  $send_title,
                                    'status_message'    =>  $send_msg,
                                    'date'  =>  $now,
                                    
                                ), function($message) use ($CusEmail)
                                {
                                    $message->to($CusEmail)->subject('Order Delivery Status By Admin');
                                });   
                } 
            }           
                            
        }
        
    }
    
    /* Status updated in payumoney ends */
    public function update_deal_order_paypal_admin()
    {
        $orderid = $_GET['order_id'];
        $status  = $_GET['id'];
        $proid  = $_GET['proid'];
        $now  = date('Y-m-d h:i:sa'); 
        $pay_status = 1;
        
        if($status == 1){
            $updaters = Transactions::update_deal_paypal_status($status, $orderid,$proid);
        }elseif($status == 2){
            $updaters = Transactions::update_deal_paypal_status($status, $orderid,$proid);
        }elseif($status == 3){
            $updaters = Transactions::update_deal_paypal_status($status, $orderid,$proid);
        }elseif($status == 4){
             $updaters = Transactions::update_deal_paypal_status($status, $orderid,$proid);
        }elseif($status == 6){
             $updaters = Transactions::update_deal_paypal_status_cancel($status, $orderid,$proid);
        }elseif($status == 8){
             $updaters = Transactions::update_deal_paypal_status_returned($status, $orderid,$proid);
        }elseif($status == 10){
             $updaters = Transactions::update_deal_paypal_status_replaced($status, $orderid,$proid);
        }
        if ($updaters) {
        echo "success";
         $getdetails = Transactions::getdetails_customer_paypal_deal($orderid); 
         if($getdetails){ 
            $send_title = "Order Delivery Status"; 
            if($getdetails[0]->delivery_status == 2){
                    
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_PACKED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_PACKED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_PACKED');
                }
                     
            } else
                    
            if($getdetails[0]->delivery_status == 3){
                
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_DISPATCHED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_DISPATCHED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_DISPATCHED');
                }
            
            } else
            if($getdetails[0]->delivery_status == 4){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_DELIVERED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_DELIVERED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_DELIVERED');
                }
                
            } else 
            if($getdetails[0]->delivery_status == 6){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_CANCELLED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_CANCELLED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_CANCELLED');
                }
            } else 
            if($getdetails[0]->delivery_status == 8){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_REPLACED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_REPLACED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_REPLACED');
                } 
            } else 
            if($getdetails[0]->delivery_status == 10){
                    if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_RETURNED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_RETURNED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_RETURNED');
                }  
            }   
                
                
            $CusEmail = $getdetails[0]->cus_email;
            //$CusEmail = "suganya@pofitec.com";
            if($CusEmail!=''){
             Mail::send('emails.adminOrderstatuschange', array(
                                    'transaction_id'    =>  $orderid,
                                    'prod_title'        =>  $getdetails[0]->deal_title,
                                    'customer_name'     =>  $getdetails[0]->cus_name,
                                    'approve_status'    =>  $send_status,
                                    'status_title'      =>  $send_title,
                                    'status_message'    =>  $send_msg,
                                    'date'  =>  $now,
                                    
                                ), function($message) use ($CusEmail)
                                {
                                    $message->to($CusEmail)->subject('Order Delivery Status By Admin');
                                });   
                } 
            }           
                            
        }
        
    }


    /* cancel,return and replacement ends  */

    /* update order status in payumoney */
    public function update_deal_order_payumoney_admin()
    {
        $orderid = $_GET['order_id'];
        $status  = $_GET['id'];
        $proid  = $_GET['proid'];
        $now  = date('Y-m-d h:i:sa'); 
        $pay_status = 1;
        
        if($status == 1){
            $updaters = Transactions::update_deal_payumoney_status($status, $orderid,$proid);
        }elseif($status == 2){
            $updaters = Transactions::update_deal_payumoney_status($status, $orderid,$proid);
        }elseif($status == 3){
            $updaters = Transactions::update_deal_payumoney_status($status, $orderid,$proid);
        }elseif($status == 4){
             $updaters = Transactions::update_deal_payumoney_status($status, $orderid,$proid);
        }elseif($status == 6){
             $updaters = Transactions::update_deal_payumoney_status_cancel($status, $orderid,$proid);
        }elseif($status == 8){
             $updaters = Transactions::update_deal_payumoney_status_returned($status, $orderid,$proid);
        }elseif($status == 10){
             $updaters = Transactions::update_deal_payumoney_status_replaced($status, $orderid,$proid);
        }
        if ($updaters) {
        echo "success";
         $getdetails = Transactions::getdetails_customer_payumoney_deal($orderid); 
         if($getdetails){ 
            $send_title = "Order Delivery Status"; 
            if($getdetails[0]->delivery_status == 2){
                    
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_PACKED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_PACKED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_PACKED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_PACKED');
                }
                     
            } else
                    
            if($getdetails[0]->delivery_status == 3){
                
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_DISPATCHED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_DISPATCHED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_DISPATCHED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_DISPATCHED');
                }
            
            } else
            if($getdetails[0]->delivery_status == 4){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_DELIVERED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_DELIVERED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_DELIVERED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_DELIVERED');
                }
                
            } else 
            if($getdetails[0]->delivery_status == 6){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_CANCELLED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_CANCELLED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_CANCELLED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_CANCELLED');
                }
            } else 
            if($getdetails[0]->delivery_status == 8){
                if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_REPLACED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_REPLACED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_REPLACED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_REPLACED');
                } 
            } else 
            if($getdetails[0]->delivery_status == 10){
                    if(Lang::has(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED')!= '') 
                {
                    $send_msg = trans(Session::get('admin_lang_file').'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED');
                }
                else
                {
                    $send_msg =  trans($this->ADMIN_OUR_LANGUAGE.'.ADMIN_DELIVERY_STATUS_PRODUCT_RETURNED');
                }
                
                if(Lang::has(Session::get('admin_lang_file').'.ORDER_RETURNED')!= '') 
                {
                    $send_status = trans(Session::get('admin_lang_file').'.ORDER_RETURNED');
                }
                else
                {
                    $send_status =  trans($this->ADMIN_OUR_LANGUAGE.'.ORDER_RETURNED');
                }  
            }   
                
                
            $CusEmail = $getdetails[0]->cus_email;
            if($CusEmail!=''){
             Mail::send('emails.adminOrderstatuschange', array(
                                    'transaction_id'    =>  $orderid,
                                    'prod_title'        =>  $getdetails[0]->deal_title,
                                    'customer_name'     =>  $getdetails[0]->cus_name,
                                    'approve_status'    =>  $send_status,
                                    'status_title'      =>  $send_title,
                                    'status_message'    =>  $send_msg,
                                    'date'  =>  $now,
                                    
                                ), function($message) use ($CusEmail)
                                {
                                    $message->to($CusEmail)->subject('Order Delivery Status By Admin');
                                });   
                } 
            }           
                            
        }
        
    }

    public function all_offline_transaction()
    {
        if(Session::has('userid')){
            

            if (Lang::has(Session::get('admin_lang_file').'.BACK_COMMISSION')!= '')
            { 
                $session_messag =  trans(Session::get('admin_lang_file').'.BACK_COMMISSION');
            }  
            else 
            { 
                $session_messag =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_COMMISSION');
            }

            $session_msg        = '';
                    
                
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_msg);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $get_cod_details_product=DB::table('nm_ordercod')->select('cod_order_type','cod_amt','cod_shipping_amt','coupon_amount','cod_prod_actualprice','cod_taxAmt','cod_prod_unitPrice','wallet_amount')->where('cod_order_type','=',1)->get();
             $get_cod_details_deals=DB::table('nm_ordercod')->select('cod_order_type','cod_amt','cod_shipping_amt','coupon_amount','cod_prod_actualprice','cod_taxAmt','cod_prod_unitPrice','wallet_amount')->where('cod_order_type','=',2)->get();
            
           
            return view('siteadmin.all_offline_transaction')
            ->with('adminheader', $adminheader)
            ->with('adminfooter', $adminfooter)
            ->with('adminleftmenus', $adminleftmenus)
            ->with('get_cod_details_product',$get_cod_details_product)
              ->with('get_cod_details_deals',$get_cod_details_deals)
           ->with('session_msg',$session_msg);
             
        }else{
            return Redirect::to('siteadmin');
        }  
      
    }

    public function all_online_transaction()
    {
if(Session::has('userid')){
            

            if (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_ONLINE_TRANSACTION')!= '')
            { 
                $session_messag =  trans(Session::get('admin_lang_file').'.BACK_ALL_ONLINE_TRANSACTION');
            }  
            else 
            { 
                $session_messag =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ALL_ONLINE_TRANSACTION');
            }

            $session_msg        = '';
                    
                
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_msg);
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $get_paypal_details_product=DB::table('nm_order')->select('order_type','order_amt','order_shipping_amt','coupon_amount','order_tax','wallet_amount')->where('order_type','=',1)->get();
             $get_paypal_details_deals=DB::table('nm_order')->select('order_type','order_amt','order_shipping_amt','coupon_amount','order_tax','wallet_amount')->where('order_type','=',2)->get();
             $get_payu_details_product=DB::table('nm_order_payu')->select('order_type','order_amt','order_shipping_amt','coupon_amount','order_tax','wallet_amount')->where('order_type','=',1)->get();
             $get_paypu_details_deals=DB::table('nm_order_payu')->select('order_type','order_amt','order_shipping_amt','coupon_amount','order_tax','wallet_amount')->where('order_type','=',2)->get();
            
           
            return view('siteadmin.all_online_transaction')
            ->with('adminheader', $adminheader)
            ->with('adminfooter', $adminfooter)
            ->with('adminleftmenus', $adminleftmenus)
            ->with('get_paypal_details_product',$get_paypal_details_product)
            ->with('get_paypal_details_deals',$get_paypal_details_deals)
            ->with('get_payu_details_product',$get_payu_details_product)
            ->with('get_payu_details_deals',$get_paypu_details_deals)
           ->with('session_msg',$session_msg);
             
        }else{
            return Redirect::to('siteadmin');
        }  
      
    }
    

}
