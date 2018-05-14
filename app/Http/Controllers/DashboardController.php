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
use App\Auction;
use App\Customer;
use App\Merchantproducts;
use App\MerchantTransactions;
use App\Merchantdeals;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
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

    public function siteadmin_dashboard()
    {
        if (Session::has('userid')) {
            
            $blogcmtcount = Blog::get_msgcount();
            Session::put('blogcmtcount', $blogcmtcount);
            $newsubscriberscount = Dashboard::get_subscriberscount();
            Session::put('subscriberscount', $newsubscriberscount);
            $inquiriescnt = Dashboard::get_inquiriescnt();
            Session::put('inquiriescnt', $inquiriescnt);
            $adrequestcnt = Admodel::get_msgcount();
            Session::put('adrequestcnt', $adrequestcnt);
            $adminheader         = view('siteadmin.includes.admin_header')->with("routemenu", "dashboard")->with("blogcmtcount", "blogcmtcount")->with("newsubscriberscount", "newsubscriberscount")->with("inquiriescnt", "inquiriescnt")->with("adrequestcnt", "adrequestcnt");
           
            $adminfooter         = view('siteadmin.includes.admin_footer');
            $activeproductscnt   = Dashboard::get_active_products();
            $activeproductscount = Dashboard::get_active_products_count();
            $soldproductscnt     = Dashboard::get_sold_products();
            $customers           = Dashboard::get_customers();
            $activedealscnt      = Dashboard::get_active_deals();
            $archievddealcnt     = Deals::get_archievd_deals();
            $subscriberscnt      = Dashboard::get_subscribers();
            $get_enquirycnt      = Dashboard::get_enquirycnt();
            /*for chart*/
            $customercnt        = Dashboard::get_customer_list();
            $cus_count          = Dashboard::get_chart_details();
            $get_chart6_details = Dashboard::get_chart6_details();
             $transaction_chart  = Dashboard::get_charttransaction_details(); 
            /* type of user count (instead of get_chart6_details) */
            $website_users     = Customer::get_website_users();
            $fb_users          = Customer::get_fb_users();
            $admin_users       = Customer::get_admin_users();
			$gplus_users	   = Customer::get_gplus_users();
			
			$archievd_cnt   = Deals::get_archievd_deals();
            $active_cnt     = Deals::get_active_details();

            $inactive_cnt = Dashboard::get_inactive_products();
			$inactivedeal_cnt   = Deals::get_deal_inactive_details(); //inactive deals
           // print_r($cus_count);exit();
            return view('siteadmin.admin_dashboard')
                ->with('adminheader', $adminheader)
                ->with('adminfooter', $adminfooter)
                ->with('activeproductscount', $activeproductscount)
                ->with('activeproductscnt', $activeproductscnt)
                ->with('soldproductscnt', $soldproductscnt)
                ->with('customers', $customers)
            ->with('activedealscnt', $activedealscnt)
                ->with('archievddealcnt', $archievddealcnt)
                ->with('subscriberscnt', $subscriberscnt)
                ->with('customercnt', $customercnt)
                ->with('cus_count', $cus_count)
                ->with('get_chart6_details', $get_chart6_details)
                ->with('transaction_chart', $transaction_chart)
                ->with('get_enquirycnt',$get_enquirycnt)
             ->with('website_users',$website_users)
                ->with('fb_users',$fb_users)
                ->with('admin_users',$admin_users)
				->with('gplus_users',$gplus_users)
                ->with('archievd_cnt',$archievd_cnt)
                ->with('active_cnt',$active_cnt)
                ->with('inactive_cnt',$inactive_cnt)
                ->with('inactivedeal_cnt',$inactivedeal_cnt);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function sitemerchant_dashboard()
    {

        if (Session::has('merchantid')) {
                        $merid  = Session::get('merchantid');
            

            /// set Merchant Panel language
             $this->setLanguageLocaleMerchant();

            $date                = date('Y-m-d H:i:s');
            $mer_id              = Session::get('merchantid');
            $activeproductscnt   = Dashboard::get_mer_active_products($mer_id);
            $soldproductscnt     = Dashboard::get_mer_sold_products($mer_id);
            $merchantscnt        = Dashboard::get_merchants();
            $customers           = Dashboard::get_customers();
            $activedealscnt      = Dashboard::get_mer_active_deals($mer_id, $date);
            $archievddealcnt     = Dashboard::get_mer_archievd_deals($mer_id);
            $auctioncnt          = Dashboard::get_mer_active_auction($mer_id);
            $archievdauction_cnt = Dashboard::get_mer_archievd_auction($mer_id);
            $actionwinnerscnt    = Dashboard::get_mer_auction_winners($mer_id);
            $subscriberscnt      = Dashboard::get_subscribers();
            $storescnt           = Dashboard::get_mer_stores($mer_id);
            $mer_store_id           = Dashboard::go_to_live_store($mer_id);

            

             
            $merid               = Session::get('merchantid');
            $getproductidlist = Merchantproducts::getproductidlist($merid);
            $getdeallist = Merchantproducts::getdeallist($merid);
           


            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
            } else {
                $productlist = '';
            }

             if ($getdeallist) {
                 $deallist = $getdeallist[0]->dealid;
               
            } else {
                $deallist = '';
            }



            /*auction*/
            $getauctionidlistrs = Merchant::getauctionidlist($merid);
           



            if($getauctionidlistrs) {
               
                

                $getauctionidlist    = $getauctionidlistrs[0]->proid;
                $auctionchartdetails = MerchantTransactions::get_chart_auction_details($getauctionidlist);
            }else {
                $auctionchartdetails = '';
            }

             /*product transcation bar graph*/
            if ($getproductidlist) {
                $productchartdetails = MerchantTransactions::get_chart_product_details($productlist,$merid);
               
               
            } else {
                $productchartdetails = '';
                
            }
             if ($deallist) {
                $dealchartdetails = MerchantTransactions::get_chart_deals_details($deallist,$merid);
              
                
                
               
            } else {
                $dealchartdetails = '';
                
            }

            /*for chart*/
            $customercnt        = Dashboard::get_customer_list();
            $cus_count          = Dashboard::get_chart_details();
            $get_chart6_details = Dashboard::get_chart6_details();
            $transaction_chart  = Dashboard::get_charttransaction_details();
            $merchantheader     = view('sitemerchant.includes.merchant_header')->with("routemenu", "dashboard");
            $merchantfooter     = view('sitemerchant.includes.merchant_footer');
            $active_deals_count = Dashboard::get_active_deals();
            return view('sitemerchant.merchant_dashboard')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('activeproductscnt', $activeproductscnt)->with('soldproductscnt', $soldproductscnt)->with('merchantscnt', $merchantscnt)->with('customers', $customers)->with('activedealscnt', $activedealscnt)->with('archievddealcnt', $archievddealcnt)->with('auctioncnt', $auctioncnt)->with('archievdauction_cnt', $archievdauction_cnt)->with('actionwinnerscnt', $actionwinnerscnt)->with('subscriberscnt', $subscriberscnt)->with('storescnt', $storescnt)->with('customercnt', $customercnt)->with('cus_count', $cus_count)->with('get_chart6_details', $get_chart6_details)->with('transaction_chart', $transaction_chart)->with('productchartdetails', $productchartdetails)->with('dealchartdetails', $dealchartdetails)->with('auctionchartdetails', $auctionchartdetails)
            ->with('mer_store_id',$mer_store_id);
            
        } else {
            return Redirect::to('sitemerchant');
        }
    }
    
    
}
