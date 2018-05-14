<?php
namespace App;
use DB;
use File;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Deals extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_cms_pages';
    
    public static function save_deal($entry)
    {
        return DB::table('nm_deals')->insert($entry);
        
    }
    
    public static function get_category()
    {
        return DB::table('nm_maincategory')->where('mc_status', '=', 1)->get();
    }
    
    /*public static function get_merchant_details()
    {
        return DB::table('nm_merchant')->where('mer_staus', '=', 1)->get();
    } */

    public static function get_main_category_ajax($id)
    {
        return DB::table('nm_secmaincategory')->where('smc_mc_id', '=', $id)->where('smc_status', '=', 1)->get();
    }
    
    public static function get_sub_category_ajax($id)
    {
        return DB::table('nm_subcategory')->where('sb_smc_id', '=', $id)->where('sb_status', '=', 1)->get();
    }
    
    public static function get_second_sub_category_ajax($id)
    {
        return DB::table('nm_secsubcategory')->where('ssb_sb_id', '=', $id)->where('ssb_status', '=', 1)->get();
    }
    
    public static function get_deals($id)
    {
        return DB::table('nm_deals')->where('deal_id', '=', $id)->get();
    }
    
    public static function get_main_category_ajax_edit($id)
    {
        return DB::table('nm_secmaincategory')->where('smc_id', '=', $id)->get();
    }
    
    public static function get_sub_category_ajax_edit($id)
    {
        return DB::table('nm_subcategory')->where('sb_id', '=', $id)->get();
    }
    
    public static function check_title_exist_ajax($title)
    {
        return DB::table('nm_deals')
        ->where('deal_title', '=', $title)
        // ->where('deal_merchant_id','=',$mer_id)
       //  ->where('deal_shop_id','=',$store_id)
        ->count();
    }
	
	public static function check_title_exist_ajax_dynamic($title,$lang_code)
    {
        return DB::table('nm_deals')
        ->where('deal_title_'.$lang_code, '=', $title)
       // ->where('deal_merchant_id','=',$mer_id)
       // ->where('deal_shop_id','=',$store_id)
        ->count();
    }
	
    
    public static function check_title_exist_ajax_edit($id, $title)
    {
         return DB::table('nm_deals')
		->where('deal_title', '=', $title)
		->where('deal_id', '!=', $id)
		->count(); 

    }
	
	public static function check_title_exist_ajax_edit_lang($id,$check_title,$get_lang_name,$get_lang_code,$check_title_lang)
    {
         return DB::table('nm_deals')
		->where('deal_title_'.$get_lang_code, '=', $check_title)
		->where('deal_id', '!=', $id)
		->count(); 
    }
	
	 public static function check_title_exist_ajax_edit_dynamic($id, $title,$lang_code)
    {
         return DB::table('nm_deals')
		->where('deal_title_'.$lang_code, '=', $title)
		->where('deal_id', '!=', $id)
		->count(); 

    }
    
    public static function get_second_sub_category_ajax_edit($id)
    {
        return DB::table('nm_secsubcategory')->where('ssb_id', '=', $id)->get();
    }

    public static function edit_deal($entry, $id)
    {
        return DB::table('nm_deals')->where('deal_id', '=', $id)->update($entry);
    }
    public static function delete_deal_image($deal_id,$image)
	{
		$conc = '';
        $filename = DB::table('nm_deals')->where('deal_id', $deal_id)->first();
        $getimagename= $filename->deal_image;
        $explode =explode("/**/",$getimagename,-1);
        
        foreach($explode as $imgremove){
           
            if($image==$imgremove){ 
              File::delete(base_path('assets/deals/').$imgremove);     // remove image from the directory
                $conc_images = '';
            } //if
            else{
                $conc_images = $imgremove."/**/";
            }
             
            $conc.=$conc_images;      //Concadinating image name which was not removed

        }  //foreach
        return DB::table('nm_deals')->where('deal_id', '=', $deal_id)->update(array('deal_image'=> $conc));  
    } //delete cat image

    public static function get_deal_details($date)
    {
        return DB::table('nm_deals')
        ->orderby('deal_id','desc')
		->where('deal_end_date', '>', $date)
		->whereRaw('deal_no_of_purchase < deal_max_limit')
		->where('deal_status','!=', 2)
		->get();
    }
    
    public static function block_deal_status($id, $status)
    {
        return DB::table('nm_deals')->where('deal_id', '=', $id)->update($status);
    }
    
    public static function get_expired_deals($date)
    {
        return DB::table('nm_deals')
        ->orderby('deal_end_date','desc')
        ->where('deal_end_date', '<', $date)->where('nm_deals.deal_status','!=', 2)->get();
    }
    
    public static function get_deals_view($id)
    {
        return DB::table('nm_deals')->where('deal_id', '=', $id)
        ->LeftJoin('nm_maincategory', 'nm_deals.deal_category', '=', 'nm_maincategory.mc_id')
            ->LeftJoin('nm_secmaincategory', 'nm_deals.deal_main_category', '=', 'nm_secmaincategory.smc_id')
            ->LeftJoin('nm_subcategory', 'nm_deals.deal_sub_category', '=', 'nm_subcategory.sb_id')
            ->LeftJoin('nm_secsubcategory', 'nm_deals.deal_second_sub_category', '=', 'nm_secsubcategory.ssb_id')
            ->get();
    }
    
    public static function get_chart_details()
    {
        /*$chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE order_type=2 and order_status=1 and MONTH(`order_date`) = " . $i));
			
            $cod_results = DB::select(DB::raw("SELECT count(*) as count FROM nm_ordercod WHERE cod_order_type=2 and cod_status=1 and MONTH(`cod_date`) = ".$i));
            $count = ($results[0]->count)+($cod_results[0]->count);
            $chart_count .= $count. ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;*/


        $chart_count = "";
        $current_year = date("Y");
        $current_month = date("m");

        for ($i = 1; $i <= 12; $i++) {
            if($i<=$current_month){
                $results     = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE order_type=2 and order_status!=4 and YEAR(`order_date`) = $current_year  and MONTH(`order_date`) = " .$i));
                $cod_results = DB::select(DB::raw("SELECT count(*) as count FROM nm_ordercod WHERE cod_order_type=2 and cod_status!=4 and YEAR(`cod_date`) = $current_year and MONTH( `cod_date`) = ".$i));
				$results_payu   = DB::select(DB::raw("SELECT count(*) as count FROM nm_order_payu WHERE order_type=2 and order_status!=4 and YEAR(`order_date`) = $current_year  and MONTH(`order_date`) = " .$i));
            }else{
                $results     = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE order_type=2 and order_status!=4 and YEAR(`order_date`) = ($current_year-1)  and MONTH(`order_date`) = " .$i));
                $cod_results = DB::select(DB::raw("SELECT count(*) as count FROM nm_ordercod WHERE cod_order_type=2 and cod_status!=4 and YEAR(`cod_date`) = ($current_year-1) and MONTH( `cod_date`) = ".$i));
				$results_payu   = DB::select(DB::raw("SELECT count(*) as count FROM nm_order_payu WHERE order_type=2 and order_status!=4 and YEAR(`order_date`) = ($current_year-1)  and MONTH(`order_date`) = " .$i));
            }
            $count = ($results[0]->count)+($results_payu[0]->count)+($cod_results[0]->count);
            $chart_count .= $count. ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;

    }

    public static function get_total_details(){
        return DB::table('nm_deals')->where('deal_status','!=','2')->count();
    } 
    public static function get_sold_deals(){
        return DB::table('nm_deals')->get();
    }
    public static function get_archievd_deals()
    {
        $date = date('Y-m-d H:i:s');
		return DB::table('nm_deals')->orwhere('deal_end_date', '<', $date)->orwhereRaw('deal_no_of_purchase >= deal_max_limit')->count();
    }
    
    public static function get_active_details()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_start_date','<',$date)->where('deal_end_date', '>', $date)->whereRaw('deal_no_of_purchase < deal_max_limit')->where('deal_status', '=', 1)->count();
    }
    
	
    public static function get_dealreports($from_date, $to_date)
    {
        $date = date('Y-m-d H:i:s');
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
            
           /*  return DB::table('nm_deals')->where('deal_end_date', '>', $date)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->whereBetween('nm_deals.deal_posted_date', array(
                $from,
                $to
            ))->get(); */
			
			return DB::table('nm_deals')->where('deal_end_date', '>', $date)->whereRaw('deal_no_of_purchase < deal_max_limit')->whereDate('nm_deals.deal_posted_date', '>=' , $from)->whereDate('nm_deals.deal_posted_date', '<=' , $to)->where('deal_status','!=', 2)->get();
			
        }  
		else if ($from_date == '' & $to_date != '') {
			
			return DB::table('nm_deals')->where('deal_end_date', '>', $date)->whereRaw('deal_no_of_purchase < deal_max_limit')->whereDate('nm_deals.deal_posted_date', '<=' , $to)->where('deal_status','!=', 2)->get();
			
        } else if ($from_date != '' & $to_date == '') {
			
			return DB::table('nm_deals')->where('deal_end_date', '>', $date)->whereRaw('deal_no_of_purchase < deal_max_limit')->whereDate('nm_deals.deal_posted_date', '>=' , $from)->where('deal_status','!=', 2)->get(); 
			
        } else {
			
			return DB::table('nm_deals')->where('deal_end_date', '>', $date)->whereRaw('deal_no_of_purchase < deal_max_limit')->where('deal_status','!=', 2)->get(); 
			
        } 
    }
    
	
	
    public static function exdeals_rep($from_date, $to_date, $date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date)); 
        if($from_date != '' && $to_date != '') {
            /* return DB::table('nm_deals')->where('deal_end_date', '<', $date)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->whereBetween('nm_deals.deal_posted_date', array(
                $from,
                $to
            ))->get(); */
			return DB::table('nm_deals')->where('deal_end_date', '<', $date)->whereDate('nm_deals.deal_posted_date', '>=' , $from)->whereDate('nm_deals.deal_posted_date', '<=' , $to)->where('nm_deals.deal_status','!=', 2)->get();
            
        } else if ($from_date == '' & $to_date != '') {
			
			return DB::table('nm_deals')->where('deal_end_date', '<', $date)->whereDate('nm_deals.deal_posted_date', '<=' , $to)->where('nm_deals.deal_status','!=', 2)->get();
			
        } else if ($from_date != '' & $to_date == '') {
			
			return DB::table('nm_deals')->where('deal_end_date', '<', $date)>whereDate('nm_deals.deal_posted_date', '>=' , $from)->where('nm_deals.deal_status','!=', 2)->get(); 
			
        } else {
			
			return DB::table('nm_deals')->where('deal_end_date', '<', $date)->where('nm_deals.deal_status','!=', 2)->get();
			
		}
    }
    
	
	public static function solddeals_rep($from_date, $to_date, $date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date)); 
        if($from_date != '' && $to_date != '') {
            /* return DB::table('nm_deals')->where('deal_end_date', '<', $date)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->whereBetween('nm_deals.deal_posted_date', array(
                $from,
                $to
            ))->get(); */
			return DB::table('nm_deals')->whereRaw('deal_no_of_purchase >= deal_max_limit')->whereDate('nm_deals.deal_posted_date', '>=' , $from)->whereDate('nm_deals.deal_posted_date', '<=' , $to)->where('nm_deals.deal_status','!=', 2)->get();
            
        } else if ($from_date == '' & $to_date != '') {
			
			return DB::table('nm_deals')->whereRaw('deal_no_of_purchase >= deal_max_limit')->whereDate('nm_deals.deal_posted_date', '<=' , $to)->where('nm_deals.deal_status','!=', 2)->get();
			
        } else if ($from_date != '' & $to_date == '') {
			
			return DB::table('nm_deals')->whereRaw('deal_no_of_purchase >= deal_max_limit')->whereDate('nm_deals.deal_posted_date', '>=' , $from)->where('nm_deals.deal_status','!=', 2)->get(); 
			
        } else {
			
			return DB::table('nm_deals')->whereRaw('deal_no_of_purchase >= deal_max_limit')->where('nm_deals.deal_status','!=', 2)->get();
			
		}
    }
	
	 public static function get_sold_deals_details($date)
    {
        return DB::table('nm_deals')
        ->orderby('deal_end_date','desc')
        ->whereRaw('deal_no_of_purchase >= deal_max_limit')->where('nm_deals.deal_status','!=', 2)->get();
    }
	
    public static function check_store($deal_title)
    {
       return DB::table('nm_deals')->where('deal_title', '=', $deal_title)
       
       ->get();
    }
	
	// public static function delete_deals($id)
	// {
	//    return DB::table('nm_deals')->where('deal_id', '=', $id)->delete();
	// }

     public static function delete_deals($id,$entry)
    {
        
        // To start Image delete from folder 09/11/ 
        $filename = DB::table('nm_deals')->where('deal_id', '=', $id)->first();
        $getimagename= $filename->deal_image;
        $getextension=explode("/**/",$getimagename);
        foreach($getextension as $imgremove)
        {
            File::delete(base_path('assets/deals/').$imgremove);
        } 
        // To End 
        return DB::table('nm_deals')->where('deal_id', '=', $id)->update($entry);
        
    }
	
	public static function get_order_deals_details()
	{
	   return DB::table('nm_order')->where('order_type', '=', 2)->get();
	}

    //Deal Review manage
     public static function get_deal_review()
    {
        return DB::table('nm_review')
        ->orderby('comment_id','desc')
		->Leftjoin('nm_deals','nm_deals.deal_id','=','nm_review.deal_id')
		->Leftjoin('nm_customer','nm_review.customer_id','=','nm_customer.cus_id')
		->where('nm_review.deal_id','!=','NULL')
		->get();
    }
    public static function edit_deal_review($id)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->get();
    }
    public static function update_deal_review($entry, $id)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->update($entry);
    }
    public static function delete_deal_review($id)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->delete();
    }
    public static function block_deal_review_status($id, $status)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->update($status);
    }
    public static function get_deals_cardshipping_details()
    {
        
        return DB::table('nm_order')
		->orderBy('nm_order.order_id', 'desc')
		->groupBy('nm_order.transaction_id')
		->where('nm_order.order_type','=',2)
		->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
		->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_shipping', 'nm_order.transaction_id', '=', 'nm_shipping.ship_trans_id')
		->leftjoin('nm_color', 'nm_order.order_pro_color', '=', 'nm_color.co_id')
		->leftjoin('nm_size', 'nm_order.order_pro_size', '=', 'nm_size.si_id')
		->get();
    }

    /* Payumoney shipping detaiils */

    public static function get_deals_payu_shipping_details()
    {
        
        return DB::table('nm_order_payu')
        ->orderBy('nm_order_payu.order_id', 'desc')
        ->groupBy('nm_order_payu.transaction_id')
        ->where('nm_order_payu.order_type','=',2)
        ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
        ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
        ->leftjoin('nm_shipping', 'nm_order_payu.transaction_id', '=', 'nm_shipping.ship_trans_id')
        ->leftjoin('nm_color', 'nm_order_payu.order_pro_color', '=', 'nm_color.co_id')
        ->leftjoin('nm_size', 'nm_order_payu.order_pro_size', '=', 'nm_size.si_id')
        ->get();
    }


	public static function get_dealcashon_delivery_details()
    {
        return DB::table('nm_ordercod')
		->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
		->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
		//->leftjoin('nm_shipping', 'nm_ordercod.cod_id', '=', 'nm_shipping.ship_order_id')
        ->leftjoin('nm_shipping', 'nm_ordercod.cod_transaction_id', '=', 'nm_shipping.ship_trans_id')
		->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')
		->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')
		->groupby('nm_ordercod.cod_transaction_id')
		->orderBy('nm_ordercod.cod_date', 'desc')
		->where('nm_ordercod.cod_order_type','=',2)
		->get();
    }

 /*   public static function store_details($store_id){
        return DB::table('nm_store')
        ->where('stor_id','=',$store_id)
        ->leftjoin('nm_city','nm_city.ci_id','=','nm_store.stor_city')
        ->get();
    } */

    public static function get_today_deals()
    {
       return DB::select(DB::raw("SELECT count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order where DATEDIFF(DATE(order_date),DATE(NOW()))=0 and order_type=2 and order_status=1"));
    }
	
	 /* paumoney todey_deals */
    public static function get_today_deals_payu()
    {
       return DB::select(DB::raw("SELECT count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order_payu where DATEDIFF(DATE(order_date),DATE(NOW()))=0 and order_type=2 and order_status=1"));
    }

    public static function get_today_ordercod(){
        return DB::select(DB::raw("SELECT count(*) as count,sum(cod_amt) as amt,sum(cod_taxAmt) as tax,sum(cod_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_ordercod where DATEDIFF(DATE(cod_date),DATE(NOW()))=0 and cod_order_type=2 and cod_status=1"));
    }

    public static function get_7days_deals()
    {   
		/*$Yesterday = date('Y-m-d',strtotime("-1 days"));
		
		$sevendays = date("Y-m-d", strtotime("-7 day", strtotime($Yesterday))); 
		
        return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt from nm_order WHERE DATE(order_date) BETWEEN '$sevendays' and '$Yesterday' and  order_type='2' and order_status='1'"));
		*/
        $yesterday_date = date('Y-m-d', strtotime('-1 week')); //calculating from previous day
        return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order WHERE (DATE(order_date) >= DATE_SUB('$yesterday_date', INTERVAL 7 DAY)) and order_type=2 and order_status=1"));
    
    }
	
	  /* payumoney 7 days count*/
    public static function get_7days_deals_payu()
    {   
        
        $yesterday_date = date('Y-m-d', strtotime('-1 week')); //calculating from previous day
        return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order_payu WHERE (DATE(order_date) >= DATE_SUB('$yesterday_date', INTERVAL 7 DAY)) and order_type=2 and order_status=1"));
    
    }

    public static function get_7days_ordercod(){
		
		/*$Yesterday = date('Y-m-d',strtotime("-1 days"));
		
		$sevendays = date("Y-m-d", strtotime("-7 day", strtotime($Yesterday)));
		
        return DB::select(DB::raw("select count(*) as count,sum(cod_amt) as amt from nm_ordercod WHERE DATE(cod_date) BETWEEN '$sevendays' and '$Yesterday' and cod_order_type=2 and cod_status=1"));
    */
		$yesterday_date = date('Y-m-d', strtotime('-1 week')); //calculating from previous day 
        return DB::select(DB::raw("select count(*) as count,sum(cod_amt) as amt,sum(cod_taxAmt) as tax,sum(cod_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_ordercod WHERE (DATE(cod_date) >= DATE_SUB('$yesterday_date', INTERVAL 7 DAY)) and cod_order_type=2 and cod_status=1"));
   
    }

    public static function get_30days_deals()
    {
		/*$Yesterday = date('Y-m-d',strtotime("-1 days"));
		$beforedays = date("Y-m-d", strtotime("-30 day", strtotime($Yesterday)));
		
        return DB::select(DB::raw("select  count(*) as count,sum(order_amt) as amt from nm_order WHERE DATE(order_date) BETWEEN '$beforedays' and '$Yesterday' and order_type=2 and order_status=1"));
    */
        $last_month = date('Y-m-d', strtotime('-1 months'));  //calculating from previous month
         
        return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order WHERE (DATE(order_date) >= DATE_SUB('$last_month', INTERVAL 30 DAY)) and order_type=2 and order_status=1"));
    
    }
	
	 /*payumoney 30 days deal */
    public static function get_30days_deals_payu()
    {
        
        $last_month = date('Y-m-d', strtotime('-1 months'));  //calculating from previous month
         
        return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order_payu WHERE (DATE(order_date) >= DATE_SUB('$last_month', INTERVAL 30 DAY)) and order_type=2 and order_status=1"));
    
    }

    public static function get_30days_ordercod(){
		
		/*$Yesterday = date('Y-m-d',strtotime("-1 days"));
		$beforedays = date("Y-m-d", strtotime("-30 day", strtotime($Yesterday)));
        return DB::select(DB::raw("select  count(*) as count,sum(cod_amt) as amt from nm_ordercod WHERE DATE(cod_date) BETWEEN '$beforedays' and '$Yesterday' and cod_order_type=2 and cod_status=1"));*/

        $last_month = date('Y-m-d', strtotime('-1 months'));    //calculating from previous month
        return DB::select(DB::raw("select  count(*) as count,sum(cod_amt) as amt,sum(cod_taxAmt) as tax,sum(cod_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_ordercod WHERE (DATE(cod_date) >= DATE_SUB('$last_month', INTERVAL 30 DAY)) and cod_order_type=2 and cod_status=1"));
    
    }

    public static function get_12mnth_deals()
    {
		$Yesterday = date('Y-m-d',strtotime("-1 days"));
		$beforedays = date("Y-m-d", strtotime("-1 year", strtotime($Yesterday)));
		
		 return DB::select(DB::raw("select count(*) as count ,sum(order_amt) as amt,sum(order_taxAmt) as tax,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order where order_date >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH) and order_type=2 and order_status=1"));
	
      /*   return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt,order_tax,order_shipping_amt from nm_order where order_date BETWEEN '$beforedays' and '$Yesterday' and order_type=2 and order_status=1")); */
    }
	
	 /* payumoney year transaction */
    public static function get_12mnth_deals_payu()
    {
        $Yesterday = date('Y-m-d',strtotime("-1 days"));
        $beforedays = date("Y-m-d", strtotime("-1 year", strtotime($Yesterday)));
        
         return DB::select(DB::raw("select count(*) as count ,sum(order_amt) as amt,sum(order_taxAmt) as tax,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order_payu where order_date >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH) and order_type=2 and order_status=1"));
    
      /*   return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt,order_tax,order_shipping_amt from nm_order where order_date BETWEEN '$beforedays' and '$Yesterday' and order_type=2 and order_status=1")); */
    }

    public static function get_12mnth_ordercod(){
		$Yesterday = date('Y-m-d',strtotime("-1 days"));
		$beforedays = date("Y-m-d", strtotime("-1 year", strtotime($Yesterday)));
		
        /* return DB::select(DB::raw("select count(*) as count,sum(cod_amt) as amt,cod_tax,cod_shipping_amt from nm_ordercod where cod_date BETWEEN '$beforedays' and '$Yesterday' and cod_order_type=2 and cod_status=1")); */
		
		return DB::select(DB::raw("select count(*) as count,sum(cod_amt) as amt,sum(cod_taxAmt) as tax,sum(cod_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_ordercod where cod_date >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH) and cod_order_type=2 and cod_status=1"));
		
    }


    public static function get_deal_inactive_details(){
        return DB::table('nm_deals')->where('deal_status','=','0')->count();
    }
	
	public static function dealreview_multiple($id, $status)
	{
		return DB::table('nm_review')->where('comment_id', '=', $id)->update(array('status' => $status));
	}
	
	 public static function delete_dealreview($id)
    {
        // To End  
        return DB::table('nm_review')->where('comment_id', '=', $id)->delete();
        
    }


}

?>
