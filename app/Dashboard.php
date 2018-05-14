<?php
namespace App;
use DB;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Dashboard extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_customer';
     
    public static function get_active_products()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->whereRaw('pro_no_of_purchase < pro_qty')->count();
    }
	public static function get_active_products_count()
    {
        return DB::table('nm_product')->whereRaw('pro_no_of_purchase < pro_qty')->where('pro_status', '=', 1)->count();
    }

    public static function get_mer_active_products($id)
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_mr_id', '=', $id)->count();
    }

    public static function get_shipcnt_details()
    {
        return DB::table('nm_order')->count();
        
    }

    public static function get_subscriberscount()
    {
        return DB::table('nm_subscription')->where('sub_readstatus', '=', 0)->count();
        
    }
    
    public static function get_charttransaction_details()
    {
        
        $chart_count = "";
		$current_month = date("m");
		$current_year = date("Y");
 
        for ($i = 1; $i <= 12; $i++) {
			if($i <= $current_month) { 
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE YEAR(`order_date`) = $current_year and MONTH( `order_date` ) = " . $i));
			$cod_results = DB::select(DB::raw("SELECT count(*) as count FROM nm_ordercod WHERE YEAR(`cod_date`) = $current_year and MONTH( `cod_date` ) = " . $i));
           $results_payu = DB::select(DB::raw("SELECT count(*) as count FROM nm_order_payu WHERE YEAR(`order_date`) = $current_year and MONTH( `order_date` ) = " . $i));
            //$chart_count .= $results[0]->count . ",";
        } else {
			$results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE YEAR(`order_date`) = $current_year and MONTH( `order_date` ) = " . $i));
			$cod_results = DB::select(DB::raw("SELECT count(*) as count FROM nm_ordercod WHERE YEAR(`cod_date`) = $current_year and MONTH( `cod_date` ) = " . $i));
            $results_payu = DB::select(DB::raw("SELECT count(*) as count FROM nm_order_payu WHERE YEAR(`order_date`) = $current_year and MONTH( `order_date` ) = " . $i));
		}
		 
		$count = ($results[0]->count)+($cod_results[0]->count)+($results_payu[0]->count);
        $chart_count .= $count. ",";
		}
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }

    public static function get_inquiriescnt()
    {
        return DB::table('nm_inquiries')->where('inq_readstatus', '=', 0)->count();
        
    }
    public static function get_enquirycnt()
    {
        return DB::table('nm_enquiry')->count();
        
    }

    

    public static function get_customers()
    {
        return DB::table('nm_customer')->where('cus_status', '=', 0)->count();
        
    }

    public static function get_active_deals()
    {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_end_date', '>', $date)->whereRaw('deal_no_of_purchase < deal_max_limit')->where('deal_status', '=', 1)->count();
        
    }

    
    
    public static function get_mer_active_deals($id, $date)
    {
        return DB::table('nm_deals')->where('deal_end_date', '>', $date)->where('deal_status', '=', 1)->where('deal_merchant_id', '=', $id)->count();
  
    }
    
    public static function get_mer_archievd_deals($id)
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_merchant_id', '=', $id)->where('deal_end_date', '<', $date)->count();
    }
    
    public static function get_mer_archievd_auction($id)
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_auction')->where('auc_merchant_id', '=', 1)->where('auc_end_date', '<', $date)->count();
    }
    
    public static function get_mer_active_auction($id)
    {
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_merchant_id', '=', 1)->count();
       
    }

    public static function get_mer_auction_winners($id)
    {
        return DB::table('nm_order_auction')->where('oa_bid_winner', '=', '1')->count();
    }
    
    public static function get_subscribers()
    {
        return DB::table('nm_subscription')->count();
    }

    public static function get_mer_stores($id)
    {
        return DB::table('nm_store')->where('stor_merchant_id', '=', $id)->where('stor_status','=',1)->count();
    }

    public static function go_to_live_store($id)
    {
        return DB::table('nm_store')->where('stor_merchant_id', '=', $id)->where('stor_status','=',1)->take(1)->value('stor_id');
        
    }

    

    public static function get_sold_products()
    {
        return DB::table('nm_product')->whereRaw('(pro_no_of_purchase-pro_qty)<=0')->get();
        
    }

    public static function get_mer_sold_products($id)
    {
        return DB::table('nm_product')->where('pro_mr_id', '=', $id)->get();
        
    }

    public static function get_customer_list()
    {
        return DB::table('nm_customer')->count();
    }

    public static function get_inquires()
    {
        return DB::table('nm_inquiries')->count();
        
    }

    public static function get_blog()
    {
        return DB::table('nm_blog')->count();
        
    }

    public static function get_faq()
    {
        return DB::table('nm_faq')->count();
        
    }

    public static function get_category()
    {
        return DB::table('nm_maincategory')->count();
        
    }
    
    public static function get_chart_details()
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_customer WHERE cus_status=0 and MONTH( `cus_joindate` ) = " . $i ));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }

    public static function get_chart6_details()
    {
        $tot_result = "";
        $count      = DB::select(DB::raw("SELECT count(*) as tot FROM `nm_customer` group BY `cus_logintype` ASC ORDER BY `cus_logintype` ASC "));
        foreach ($count as $result) {
            $tot_result .= $result->tot . ",";
        }
        return trim($tot_result, ",");
    }

     public static function get_inactive_products()
    {
        return DB::table('nm_product')->where('pro_status', '=', 0)->whereRaw('pro_no_of_purchase < pro_qty')->count();
    }

}

?>
