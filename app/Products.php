<?php
namespace App;
use DB;
use File;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Products extends Model
{
    
    protected $guarded = array('id');
    protected $table = 'nm_product';
    
    public static function insert_product($entry)
    {
       $check_insert = DB::table('nm_product')->insert($entry);
           
        if ($check_insert > 0){
            return DB::getPdo()->lastInsertId();
        } else {
            return 0;
        }
        
    }

    public static function get_chart_details()
    {
        $chart_count = "";
        $current_year = date("Y");
        $current_month = date("m");

        for ($i = 1; $i <= 12; $i++) {
            if($i<=$current_month){
                $results     = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE order_type=1 and order_status!=4 and YEAR(`order_date`) = $current_year  and MONTH(`order_date`) = " .$i));
                $results_payu     = DB::select(DB::raw("SELECT count(*) as count FROM nm_order_payu WHERE order_type=1 and order_status!=4 and YEAR(`order_date`) = $current_year  and MONTH(`order_date`) = " .$i));
                $cod_results = DB::select(DB::raw("SELECT count(*) as count FROM nm_ordercod WHERE cod_order_type=1 and cod_status!=4 and YEAR(`cod_date`) = $current_year and MONTH( `cod_date`) = ".$i));
            }else{
                $results     = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE order_type=1 and order_status!=4 and YEAR(`order_date`) = ($current_year-1)  and MONTH(`order_date`) = " .$i));
                $results_payu     = DB::select(DB::raw("SELECT count(*) as count FROM nm_order_payu WHERE order_type=1 and order_status!=4 and YEAR(`order_date`) = ($current_year-1)  and MONTH(`order_date`) = " .$i));
                $cod_results = DB::select(DB::raw("SELECT count(*) as count FROM nm_ordercod WHERE cod_order_type=1 and cod_status!=4 and YEAR(`cod_date`) = ($current_year-1) and MONTH( `cod_date`) = ".$i));
            }
            $count = ($results[0]->count)+($cod_results[0]->count)+($results_payu[0]->count);
            $chart_count .= $count. ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }
	public static function get_specification_group_product($main_cat,$sec_main_cat)
    {
        return DB::table('nm_spgroup')->where("sp_mc_id","=",$main_cat)->where("sp_smc_id","=",$sec_main_cat)->get();
    }
    public static function get_qtycod_details()
    {
        return DB::table('nm_ordercod')->where('cod_status', '=', 2)->sum('cod_qty');
    
    }

    public static function get_amtcod_details()
    {
        return DB::table('nm_ordercod')->where('cod_status', '=', 2)->sum('cod_amt');
   
    }

    public static function get_cod_details()
    {
        /*return DB::table('nm_ordercod')
		->orderby('cod_id','desc')
		->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
		->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_shipping', 'nm_ordercod.cod_id', '=', 'nm_shipping.ship_order_id')
		->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')
		->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')
		
		->get();
		*/
		return  DB::table('nm_ordercod')
	   ->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
	   ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
	   ->leftjoin('nm_shipping', 'nm_ordercod.cod_transaction_id', '=', 'nm_shipping.ship_trans_id')
	   ->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')
	   ->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')
	   ->groupby('nm_ordercod.cod_transaction_id')
	   ->orderBy('nm_ordercod.cod_id', 'desc')
	   ->where('nm_ordercod.cod_order_type', '=',1)
	   ->get();
    }

    public static function get_qty_details()
    {
        return DB::table('nm_order')->where('order_status', '=', 2)->sum('order_qty');
    
    }

    public static function get_amt_details()
    {
     
      return DB::table('nm_order')->where('order_status', '=', 2)->sum('order_amt');
        
    }

    public static function get_shipping_details()
    {
        return DB::table('nm_order')
		->orderBy('nm_order.order_id', 'desc')
		->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
		->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
		//->leftjoin('nm_shipping', 'nm_order.order_id', '=', 'nm_shipping.ship_order_id')
        ->leftjoin('nm_shipping', 'nm_order.transaction_id', '=', 'nm_shipping.ship_trans_id')
		->leftjoin('nm_color', 'nm_order.order_pro_color', '=', 'nm_color.co_id')
		->leftjoin('nm_size', 'nm_order.order_pro_size', '=', 'nm_size.si_id')
		->groupBy('nm_order.transaction_id')
		->where('nm_order.order_type', '=',1)
		->get();
    }

    /* Payumoney shipping details */

    public static function get_payu_shipping_details()
    {
        return DB::table('nm_order_payu')
        ->orderBy('nm_order_payu.order_id', 'desc')
        ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
        ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
        //->leftjoin('nm_shipping', 'nm_order.order_id', '=', 'nm_shipping.ship_order_id')
        ->leftjoin('nm_shipping', 'nm_order_payu.transaction_id', '=', 'nm_shipping.ship_trans_id')
        ->leftjoin('nm_color', 'nm_order_payu.order_pro_color', '=', 'nm_color.co_id')
        ->leftjoin('nm_size', 'nm_order_payu.order_pro_size', '=', 'nm_size.si_id')
        ->groupBy('nm_order_payu.transaction_id')
        ->where('nm_order_payu.order_type', '=',1)
        ->get();
    }


    public static function get_payuqty_details()
    {
        return DB::table('nm_order_payu')->where('order_status', '=', 2)->sum('order_qty');
    
    }

    public static function get_payuamt_details()
    {
     
      return DB::table('nm_order_payu')->where('order_status', '=', 2)->sum('order_amt');
        
    }

    /*  Payumoney shipping details ends */

    public static function insert_product_color_details($entry)
    {
      return DB::table('nm_procolor')->insert($entry);
    }

    public static function insert_product_specification_details($entry)
    {
       return DB::table('nm_prospec')->insert($entry);
    }

    public static function insert_product_size_details($productsizeentry)
    {
      return DB::table('nm_prosize')->insert($productsizeentry);
    }
    
    public static function get_product($id)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->get();
    }

    public static function get_spec_group(){

        return DB::table('nm_spgroup')->orderby('spg_order','asc')->get();
    }

    public static function get_product_specification()
    {
        return DB::table('nm_specification')->get();
    }

    public static function get_product_color()
    {
        return DB::table('nm_color')->get();
    }

    public static function get_product_size()
    {
        return DB::table('nm_size')->get();
    }

    public static function get_sizename_ajax($sizeid)
    {
        return DB::table('nm_size')->where('si_id', '=', $sizeid)->get();
    }

    public static function get_product_category()
    {
        return DB::table('nm_maincategory')->where('mc_status', '=', 1)->get();
    }
    
    public static function load_maincategory_ajax($id)
    {
        return DB::table('nm_secmaincategory')->where('smc_mc_id', '=', $id)->where('smc_status', '=', 1)->get();
    }

    public static function load_subcategory_ajax($id)
    {
        
        return DB::table('nm_subcategory')->where('sb_smc_id', '=', $id)->where('sb_status', '=', 1)->get();
    }

    public static function get_second_sub_category_ajax($id)
    {
        return DB::table('nm_secsubcategory')->where('ssb_sb_id', '=', $id)->where('ssb_status', '=', 1)->get();
    }

    public static function get_colorname_ajax($colorid)
    {
        return DB::table('nm_color')->where('co_id', '=', $colorid)->get();
    }

    public static function get_main_category_ajax_edit($id)
    {
        return DB::table('nm_secmaincategory')->where('smc_id', '=', $id)->get();
    }
    
    public static function get_sub_category_ajax_edit($id)
    {
        return DB::table('nm_subcategory')->where('sb_id', '=', $id)->get();
    }
    
    public static function get_second_sub_category_ajax_edit($id)
    {
        return DB::table('nm_secsubcategory')->where('ssb_id', '=', $id)->get();
    }
    
    public static function get_product_details()
    {
        return DB::table('nm_product')
        ->orderby('pro_id','desc')
        ->get();
    }
    
    public static function block_product_status($id, $status)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->update($status);
    }

    public static function get_product_view($id)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->leftJoin('nm_maincategory', 'nm_product.pro_mc_id', '=', 'nm_maincategory.mc_id')->leftJoin('nm_secmaincategory', 'nm_product.pro_smc_id', '=', 'nm_secmaincategory.smc_id')->leftJoin('nm_subcategory', 'nm_product.pro_sb_id', '=', 'nm_subcategory.sb_id')->leftJoin('nm_secsubcategory', 'nm_product.pro_ssb_id', '=', 'nm_secsubcategory.ssb_id')
               ->get();
		
    }

    public static function delete_product_color($proid)
    {
        return DB::table('nm_procolor')->where('pc_pro_id', '=', $proid)->delete();
    }

    public static function delete_product_size($proid)
    {
       return DB::table('nm_prosize')->where('ps_pro_id', '=', $proid)->delete();
    }

    public static function delete_product_spec($proid)
    {
        return DB::table('nm_prospec')->where('spc_pro_id', '=', $proid)->delete();
    }

    public static function get_product_exist_specification($id)
    {
        return DB::table('nm_prospec')->where('spc_pro_id', '=', $id)->get();
    }

    public static function get_product_exist_color($id)
    {
        return DB::table('nm_procolor')->join('nm_color', 'nm_procolor.pc_co_id', '=', 'nm_color.co_id')->where('pc_pro_id', '=', $id)->get();
    }

    public static function get_product_exist_size($id)
    {
        return DB::table('nm_prosize')->join('nm_size', 'nm_prosize.ps_si_id', '=', 'nm_size.si_id')->where('ps_pro_id', '=', $id)->get();
    }

    public static function get_product_details_manage()
    {
        return DB::table('nm_product')
		->orderBy('nm_product.pro_id', 'DESC')
        ->where('pro_status','!=',2)    //which is not deleted
		->get();
    }
    
    public static function edit_product($entry,$id)
    {
      
        return DB::table('nm_product')->where('pro_id', '=', $id)->update($entry);
    }

    public static function get_merchant_details()
    {
	
         return DB::table('nm_merchant')->where('mer_staus','=',1)->get();
		
		
    }

   /* public static function get_product_details_formerchant($merid)
    {
        return DB::table('nm_store')->where('stor_merchant_id', '=', $merid)->where('stor_status', '=', 1)->get();
    } */

    public static function get_active_products()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->count();
    }
	
	 public static function get_act_products()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->whereRaw('pro_no_of_purchase < pro_qty')->count();
    }
	
	 public static function get_inactive_products()
    {
        return DB::table('nm_product')->where('pro_status', '=', 0)->whereRaw('pro_no_of_purchase < pro_qty')->count();
    }

    public static function get_sold_products()
    {
        return DB::table('nm_product')->get();
    }

    public static function get_block_products()
    {
        return DB::table('nm_product')->where('pro_status', '=', 0)->count();
    }

   /*  public static function get_today_product()
    {
       return DB::select(DB::raw("SELECT count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax ,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order where DATEDIFF(DATE(order_date),DATE(NOW()))=0 and order_type=1 and order_status=1"));

    }

    public static function get_today_ordercod(){
        return DB::select(DB::raw("SELECT count(*) as count,sum(cod_amt) as amt,sum(cod_taxAmt) as tax,sum(cod_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_ordercod where DATEDIFF(DATE(cod_date),DATE(NOW()))=0 and cod_order_type=1 and cod_status=1"));
    } */
	
	 public static function get_today_product()
    {
        $date = date('Y-m-d');
        return DB::select(DB::raw("SELECT count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax,sum(order_shipping_amt) as ship from nm_order where DATE(order_date)='".$date."' and order_type=1 and order_status=1"));
    }

    public static function get_today_product_payu()
    {
        $date = date('Y-m-d');
        return DB::select(DB::raw("SELECT count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax,sum(order_shipping_amt) as ship from nm_order_payu where DATE(order_date)='".$date."' and order_type=1 and order_status=1"));
    }

    public static function get_today_ordercod(){
        $date = date('Y-m-d');
        return DB::select(DB::raw("SELECT count(*) as count,sum(cod_amt) as amt,sum(cod_taxAmt) as tax,sum(cod_shipping_amt) as ship from nm_ordercod where DATE(cod_date)='".$date."' and cod_order_type=1 and cod_status=1"));
    }

    public static function get_7days_product(){   
        $yesterday_date = date('Y-m-d', strtotime('-1 day')); //calculating from previous day
        return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax ,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order WHERE (DATE(order_date) >= DATE_SUB('$yesterday_date', INTERVAL 7 DAY)) and order_type=1 and order_status=1"));
    }

    public static function get_7days_product_payu(){   
        $yesterday_date = date('Y-m-d', strtotime('-1 day')); //calculating from previous day
        return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax ,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order_payu WHERE (DATE(order_date) >= DATE_SUB('$yesterday_date', INTERVAL 7 DAY)) and order_type=1 and order_status=1"));
    }

    public static function get_7days_ordercod(){
        $yesterday_date = date('Y-m-d', strtotime('-1 day'));  //calculating from previous day
        return DB::select(DB::raw("select count(*) as count,sum(cod_amt) as amt,sum(cod_taxAmt) as tax,sum(cod_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_ordercod WHERE (DATE(cod_date) >= DATE_SUB('$yesterday_date', INTERVAL 7 DAY)) and cod_order_type=1 and cod_status=1"));
    }

    public static function get_30days_product()
    {    $last_month = date('Y-m-d', strtotime('-1 months'));  //calculating from previous month
         
        return DB::select(DB::raw("select  count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax ,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order WHERE (DATE(order_date) >= DATE_SUB('$last_month', INTERVAL 30 DAY)) and order_type=1 and order_status=1"));
    }

    public static function get_30days_product_payu()
    {    $last_month = date('Y-m-d', strtotime('-1 months'));  //calculating from previous month
         
        return DB::select(DB::raw("select  count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax ,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order_payu WHERE (DATE(order_date) >= DATE_SUB('$last_month', INTERVAL 30 DAY)) and order_type=1 and order_status=1"));
    }

    public static function get_30days_ordercod(){
        $last_month = date('Y-m-d', strtotime('-1 months'));    //calculating from previous month
        return DB::select(DB::raw("select  count(*) as count,sum(cod_amt) as amt,sum(cod_taxAmt) as tax,sum(cod_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_ordercod WHERE (DATE(cod_date) >= DATE_SUB('$last_month', INTERVAL 30 DAY)) and cod_order_type=1 and cod_status=1"));
    }

    public static function get_12mnth_product()
    {
        
        return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax ,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order where order_date >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH) and order_status=1 and order_type=1"));
    }


    public static function get_12mnth_product_payu()
    {
        return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt,sum(order_taxAmt) as tax ,sum(order_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_order_payu where order_date >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH) and order_status=1 and order_type=1"));
    }

    public static function get_12mnth_ordercod(){
        return DB::select(DB::raw("select count(*) as count,sum(cod_amt) as amt,sum(cod_taxAmt) as tax,sum(cod_shipping_amt) as ship,sum(coupon_amount) as coupon_amt,sum(wallet_amount) as wallet_amt from nm_ordercod where cod_date >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH) and cod_status=1 and cod_order_type=1 "));
    }
    
    public static function get_zipcode()
    {
        return DB::table('nm_estimate_zipcode')->get();
    }
    
    public static function save_zip_code($entry)
    {
        return DB::table('nm_estimate_zipcode')->insert($entry);
    }

    public static function check_zip_code($from)
    {
        return $get_result_code = DB::table('nm_estimate_zipcode')->where('ez_code_series', '<=', $from)->where('ez_code_series_end', '>=', $from)->get();
    }

    public static function check_zip_code_range($from, $to)
    {
        return $get_result_code = DB::table('nm_estimate_zipcode')->where('ez_code_series', '>=', $from)->where('ez_code_series_end', '<=', $to)->get();
        
    }
    
    public static function edit_zip_code($id)
    {
        return DB::table('nm_estimate_zipcode')->where('ez_id', '=', $id)->get();
    }

    public static function update_zip_code($entry, $id)
    {
        return DB::table('nm_estimate_zipcode')->where('ez_id', '=', $id)->update($entry);
    }

    public static function check_zip_code_edit($id, $from)
    {
        return DB::table('nm_estimate_zipcode')->where('ez_code_series', '<=', $from)->where('ez_code_series_end', '>=', $from)->where('ez_id', '!=', $id)->get();
        
    }

    public static function check_zip_code_edit_range($id, $from, $to)
    {
        return $get_result_code = DB::table('nm_estimate_zipcode')->where('ez_code_series', '>=', $from)->where('ez_code_series_end', '<=', $to)->where('ez_id', '!=', $id)->get();
       
    }
    
    public static function block_zip_code($id, $status)
    {
        return DB::table('nm_estimate_zipcode')->where('ez_id', '=', $id)->update(array(
            'ez_status' => $status
        ));
    }
    
    public static function get_induvidual_product_detail_merchant($id, $merid)
    {
        
        return DB::table('nm_product')->where('pro_mr_id', '=', $merid)->where('pro_id', '=', $id)->get();
    }
    
    public static function get_productreports($from_date, $to_date)
    {
        
        if ($from_date != '' && $to_date == '') 
		{
		
            $new_from_date = date("Y-m-d", strtotime($from_date));
			return DB::table('nm_product')
			->whereDate('nm_product.created_date', '>=' , $new_from_date)
			->where('nm_product.pro_status', '!=', 2)
			->orderBy('nm_product.pro_id', 'DESC')
			->get();
            
        }
        elseif ($from_date != '' && $to_date != '') 
		{
			$new_from_date  = date("Y-m-d", strtotime($from_date));
            $new_to_date    = date("Y-m-d", strtotime($to_date));
            return DB::table('nm_product')
			->whereDate('nm_product.created_date', '>=' , $new_from_date)->whereDate('nm_product.created_date', '<=' , $new_to_date)
			->where('nm_product.pro_status', '!=', 2)
			->orderBy('nm_product.pro_id', 'DESC')
			->get();
        }
		elseif($from_date == '' && $to_date != '')
		{
            $new_to_date = date("Y-m-d", strtotime($to_date));
			return DB::table('nm_product')
			->whereDate('nm_product.created_date', '<=' , $new_to_date)
			->where('nm_product.pro_status', '!=', 2)
			->orderBy('nm_product.pro_id', 'DESC')
			->get();
        }
		else{
			return DB::table('nm_product')
			->where('nm_product.pro_status', '!=', 2)
            ->orderBy('nm_product.pro_id', 'DESC')
			->get();
		}
        
    }
    
    public static function get_soldrep($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
		
        if ($from_date != '' & $to_date == '') {
            
          return DB::table('nm_product')->whereDate('created_date','>=', $from)->whereRaw('pro_no_of_purchase >= pro_qty')->orderBy('pro_id', 'DESC')->get();
     
        }
        
        elseif ($from_date != '' & $to_date != '') {
            return DB::table('nm_product')->whereDate('created_date','>=', $from)->whereDate('created_date','<=', $to)->whereRaw('pro_no_of_purchase >= pro_qty')->orderBy('pro_id', 'DESC')->get();
        }
     
        else if ($from_date == '' & $to_date != '') {
            
          return DB::table('nm_product')->whereDate('created_date','<=', $to)->whereRaw('pro_no_of_purchase >= pro_qty')->orderBy('pro_id', 'DESC')->get();
     
        } else if ($from_date == '' & $to_date == '') {
            
          return DB::table('nm_product')->whereRaw('pro_no_of_purchase >= pro_qty')->orderBy('pro_id', 'DESC')->get();
     
        }
        
    }

    public static function check_store($Product_Title)
    {
        return DB::table('nm_product')->where('pro_title', '=', $Product_Title)->get();
    }
	
	public static function get_order_details()
	{
		return DB::table('nm_order')->where('order_type', '=', 1)->get();
	}
	
	// public static function delete_product($id)
	// {
	//     return DB::table('nm_product')->where('pro_id', '=', $id)->delete();
	// }

    public static function delete_product($id,$entry)
    {
       
        // To start Image delete from folder 09/11/ 
        $filename = DB::table('nm_product')->where('pro_id', $id)->first();
        $getimagename= $filename->pro_Img;
        $getextension=explode("/**/",$getimagename);
        foreach($getextension as $imgremove)
        {
            File::delete(base_path('assets/product/').$imgremove);
        } 
        // To End 
		
        return DB::table('nm_product')->where('pro_id', '=', $id)->update($entry);
        
    }
    //Product Review manage
    public static function get_product_review()
    {
        return DB::table('nm_review')
        ->orderby('comment_id','desc')
        ->Leftjoin('nm_product','nm_review.product_id','=','nm_product.pro_id')
        ->Leftjoin('nm_customer','nm_review.customer_id','=','nm_customer.cus_id')
        ->where('nm_review.product_id','!=','NULL')->get();
    }
    public static function edit_review($id)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->get();
    }
    public static function update_review($entry, $id)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->update($entry);
    }
    public static function delete_review($id)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->delete();
    }
    public static function block_review_status($id, $status)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->update($status);
    }
	 /* compare products details*/
    public static function get_compare_details($pid){
      foreach ($pid as $pr_det) {
           return DB::table('nm_product')->where('pro_status', '=', 1)->whereIn('pro_id', $pid)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
      }
        //return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_id', '=', $pid)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
    }
	public static function store_name($prod_det){
        
        foreach ($prod_det as $pr_det) {
            return DB::table('nm_product')->where('pro_id', '=', $pr_det->pro_id)
            //->Leftjoin('nm_store', 'nm_product.pro_sh_id', '=', 'nm_store.stor_id')
            ->get();
            //->LeftJoin('nm_store', 'nm_store.stor_merchant_id', '=', 'nm_product.pro_mc_id')->get();
        }
    }
    public static function get_countone($prod_det)
    {
        foreach ($prod_det as $id) {
        $a = DB::table('nm_review')->where('product_id', '=', $id->pro_id)->where('ratings', '=', 1)->count();
        
        }
       return $a;
    }

    public static function get_counttwo($prod_det)
    {
        foreach ($prod_det as $id) {
        $a =  DB::table('nm_review')->where('product_id', '=', $id->pro_id)->where('ratings', '=', 2)->count();
        }
         return $a;
    }

    public static function get_countthree($prod_det)
    {
        foreach ($prod_det as $id) {
       $a = DB::table('nm_review')->where('product_id', '=', $id->pro_id)->where('ratings', '=', 3)->count();
        }
        return $a;
        
    }

    public static function get_countfour($prod_det)
    {
        foreach ($prod_det as $id) {
        $a= DB::table('nm_review')->where('product_id', '=', $id->pro_id)->where('ratings', '=', 4)->count();
        }
         return $a;
    }

    public static function get_countfive($prod_det)
    {
        foreach ($prod_det as $id) {
       $a =  DB::table('nm_review')->where('product_id', '=', $id->pro_id)->where('ratings', '=', 5)->count();
        }
         return $a;
    }
    /* end compare products details*/

    public static function check_product_exists($pro_title){
        return DB::table('nm_product')
       
        ->where('pro_title','=',$pro_title)
        ->count();
    }
	
	//public static function check_product_exists_edit($mer_id,$store_id,$pro_title,$pro_id){
	public static function check_product_exists_edit($id,$check_title){
        return DB::table('nm_product')
       // ->where('pro_mr_id','=',$check_merchant)
       // ->where('pro_sh_id','=',$check_shop)
        ->where('pro_title','=',$check_title)
        ->where('pro_id','!=',$id)
        ->count();
    }
	
	public static function check_product_exists_edit_lang($id,$check_title_lang,$get_lang_name,$get_lang_code){
        return DB::table('nm_product')
        ->where('pro_mr_id','=',$check_merchant)
        ->where('pro_sh_id','=',$check_shop)
        ->where('pro_title_'.$get_lang_code,'=',$check_title_lang)
        ->where('pro_id','!=',$id)
        ->count();
    }
	
	public static function check_product_exists_dynamic($pro_title,$lang_code){
        return DB::table('nm_product')
      
        ->where('pro_title_'.$lang_code,'=',$pro_title)
        ->count();
    }

    public static function check_no_size(){
        return DB::table('nm_size')->where('si_name','=','no size')->count();
    }

    public static function insert_no_size($array){
        $insert = DB::table('nm_size')->insert($array);
        $lastInsertedID = $insert->lastInsertId();

        return $lastInsertedID;
    }

    public static function get_size_id(){
        return DB::table('nm_size')->select('si_id')->where('si_name','=','no size')->get();
    }

    public static function destory_size($pro_id){
        return DB::table('nm_prosize')->where('ps_pro_id','=',$pro_id)->delete();
    }

    public static function destory_color($productid){
        return DB::table('nm_procolor')->where('pc_pro_id','=',$productid)->delete();
    }

   /* public static function mer_commission($mer_id){
        return DB::table('nm_merchant')->where('mer_id','=',$mer_id)->value('mer_commission');
    } */

    public static function delete_product_img($id,$image){
        $conc = '';
        $filename = DB::table('nm_product')->where('pro_id', $id)->first();
        $getimagename= $filename->pro_Img;
        $explode =explode("/**/",$getimagename,-1);
         
        foreach($explode as $imgremove){
           
           if($image==$imgremove){ 
              File::delete(base_path('assets/product/').$imgremove);     // remove image from the directory
                $conc_images = '';
            } //if
            else{
                $conc_images = $imgremove."/**/";
            }
             
            $conc.=$conc_images;      //Concadinating image name which was not removed
        }  //foreach
        
        return DB::table('nm_product')->where('pro_id', '=', $id)->update(array('pro_Img'=> $conc));  
    } //delete cat img

    public static function product_get_spec($spec_group_id){
        return DB::table('nm_specification')->where('sp_spg_id','=',$spec_group_id)->get();
    }

    public static function get_product_spec_details($prod_det)
    {
        
        return DB::table('nm_prospec')->where('spc_pro_id', '=', $pr_det->pro_id)->LeftJoin('nm_specification', 'nm_specification.sp_id', '=', 'nm_prospec.spc_sp_id')->LeftJoin('nm_spgroup', 'nm_specification.sp_spg_id', '=', 'nm_spgroup.spg_id')->get();
    }

      //Cancel Order Product starts
    public static function get_cod_details_bycodID($order_id)
   {
       
       return  DB::table('nm_ordercod')
      ->where('nm_ordercod.cod_id', '=',$order_id)
      ->first();
   } 
   public static function get_paypal_details_byorderID($order_id)
   {
       
       return  DB::table('nm_order')
      ->where('nm_order.order_id', '=',$order_id)
      ->first();
   } 

   public static function get_payumoney_details_byorderID($order_id)
   {
       
       return  DB::table('nm_order_payu')
      ->where('nm_order_payu.order_id', '=',$order_id)
      ->first();
   } 

   public static function getexistDeliveryOption($order_id,$payment_type)
   {
       if($payment_type=='0'){
           return  DB::table('nm_order_delivery_status')
          ->where('cod_order_id', '=',$order_id)
          ->first();
      }elseif($payment_type=='1'){
           return  DB::table('nm_order_delivery_status')
          ->where('order_id', '=',$order_id)
          ->first();
      }else{
           return array();
      }

   } 

   public static function getexistDeliveryOption_payu($order_id,$payment_type,$trans_id)
   {
       return  DB::table('nm_order_delivery_status')
          ->where('transaction_id', '=',$trans_id)
          ->first();
   } 

   public static function insert_deliveryStausChange($entry)
   {
      $check_insert = DB::table('nm_order_delivery_status')->insert($entry);
          
       if ($check_insert) {
           return DB::getPdo()->lastInsertId();
       } else {
           return 0;
       }
       
   } 

   public static function update_deliveryStausChange($id, $entry)
   {
       return DB::table('nm_order_delivery_status')->where('delStatus_id', '=', $id)->update($entry);
   }  
   //Cancel Order Product ends

   public static function product_multiple($id, $status)
    {
		
        return DB::table('nm_product')->where('pro_id', '=', $id)->update(array('pro_status' => $status));
		
    }
	
	public static function proreview_multiple($id, $status)
	{
		return DB::table('nm_review')->where('comment_id', '=', $id)->update(array('status' => $status));
	}
	
	 public static function delete_proreview($id)
    {
        // To End  
        return DB::table('nm_review')->where('comment_id', '=', $id)->delete();
        
    }
}

?>
