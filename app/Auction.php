<?php 
namespace App;
use DB;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Auction extends Model
{

	protected $guarded = array('id');
        protected $table = 'nm_cms_pages';
	
	public static function save_auction($entry)
	{
		return DB::table('nm_auction')->insert($entry);
		 
	} 
	
	public static function get_category()
	{
		return DB::table('nm_maincategory')->where('mc_status', '=', 1)->get();
	}
	public  static function get_auction_winners()
	{
		return DB::table('nm_order_auction')
		->LeftJoin('nm_auction','nm_auction.auc_id','=','nm_order_auction.oa_pro_id')
		->where('oa_bid_winner','=',1)
		->get();
	}
	public  static function get_auction_cod()
	{
		return DB::table('nm_order_auction')
		->LeftJoin('nm_auction','nm_auction.auc_id','=','nm_order_auction.oa_pro_id')
		->where('oa_bid_winner','=',1)
		->get();
	}
	
	 public static function cancel_auction_cod($id,$entry)
	{
		return DB::table('nm_order_auction')->where('oa_id', '=', $id)->update($entry);
	}
	
	
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
	
	public static function get_auction($id)
	{
		return DB::table('nm_auction')->where('auc_id', '=', $id)->get();
	}
	public static function get_merchant_auction($id,$merid)
	{
		return DB::table('nm_auction')->where('auc_id', '=', $id)->where('auc_merchant_id', '=', $merid)->get();
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
		return DB::table('nm_auction')->where('deal_title', '=', $title)->get();
	}
	
	public static function check_title_exist_ajax_edit($id,$title)
	{
		return DB::table('nm_auction')->where('deal_title', '=', $title)->where('auc_id', '!=', $id)->get();
	}
	
	public static function get_second_sub_category_ajax_edit($id)
	{
		return DB::table('nm_secsubcategory')->where('ssb_id', '=', $id)->get();
	}
	public static function edit_auction($entry,$id)
	{
		return DB::table('nm_auction')->where('auc_id', '=', $id)->update($entry);
	}
	
	public static function get_auction_details($date)
	{
		return DB::table('nm_auction')->where('auc_end_date', '>', $date)->LeftJoin('nm_store','nm_store.stor_id','=','nm_auction.auc_shop_id')->LeftJoin('nm_city','nm_city.ci_id','=','nm_store.stor_city')->get();
	}

	public static function get_merchant_auction_details($date,$merid)
	{
		return DB::table('nm_auction')->where('auc_merchant_id', '=', $merid)->where('auc_end_date', '>', $date)->LeftJoin('nm_store','nm_store.stor_id','=','nm_auction.auc_shop_id')->LeftJoin('nm_city','nm_city.ci_id','=','nm_store.stor_city')->get();
	}
	public static function block_auction_status($id,$status)
	{
		return DB::table('nm_auction')->where('auc_id', '=', $id)->update($status);
	}
	
	public static function get_expired_auction($date)
	{
		return DB::table('nm_auction')->where('auc_end_date', '<', $date)->LeftJoin('nm_store','nm_store.stor_id','=','nm_auction.auc_shop_id')->LeftJoin('nm_city','nm_city.ci_id','=','nm_store.stor_city')->get();
	}
	public static function get_merchant_expired_auction($date,$merid)
	{
		return DB::table('nm_auction')->where('auc_merchant_id', '=', $merid)->where('auc_end_date', '<', $date)->LeftJoin('nm_store','nm_store.stor_id','=','nm_auction.auc_shop_id')->LeftJoin('nm_city','nm_city.ci_id','=','nm_store.stor_city')->get();
	}
	
	public static function get_auction_view($id)
	{
		return DB::table('nm_auction')->where('auc_id', '=', $id)
		->LeftJoin('nm_maincategory', 'nm_auction.auc_category', '=', 'nm_maincategory.mc_id')
		->LeftJoin('nm_secmaincategory', 'nm_auction.auc_main_category', '=', 'nm_secmaincategory.smc_id')
		->LeftJoin('nm_subcategory', 'nm_auction.auc_sub_category', '=', 'nm_subcategory.sb_id')
		->LeftJoin('nm_secsubcategory', 'nm_auction.auc_second_sub_category', '=', 'nm_secsubcategory.ssb_id')
		->LeftJoin('nm_store', 'nm_auction.auc_shop_id', '=', 'nm_store.stor_id')
		->LeftJoin('nm_merchant', 'nm_auction.auc_merchant_id', '=', 'nm_merchant.mer_id')
		->LeftJoin('nm_country', 'nm_merchant.mer_co_id', '=', 'nm_country.co_id')
		->LeftJoin('nm_city', 'nm_merchant.mer_ci_id', '=', 'nm_city.ci_id')
		->get();
	}
	public static function get_merchant_auction_view($id,$merid)
	{
		return DB::table('nm_auction')->where('auc_id', '=', $id)->where('auc_merchant_id', '=', $merid)
		->LeftJoin('nm_maincategory', 'nm_auction.auc_category', '=', 'nm_maincategory.mc_id')
		->LeftJoin('nm_secmaincategory', 'nm_auction.auc_main_category', '=', 'nm_secmaincategory.smc_id')
		->LeftJoin('nm_subcategory', 'nm_auction.auc_sub_category', '=', 'nm_subcategory.sb_id')
		->LeftJoin('nm_secsubcategory', 'nm_auction.auc_second_sub_category', '=', 'nm_secsubcategory.ssb_id')
		->LeftJoin('nm_merchant', 'nm_auction.auc_merchant_id', '=', 'nm_merchant.mer_id')
		->LeftJoin('nm_store', 'nm_auction.auc_shop_id', '=', 'nm_store.stor_id')
		->get();
	}
	public static function get_merchant_details()
	{
		return DB::table('nm_merchant')->where('mer_staus', '=', 1)->get();
	}
	public static function get_store_name_ajax($id)
	{
		return DB::table('nm_store')->where('stor_merchant_id', '=', $id)->where('stor_status', '=', 1)->get();
	}
	public static function get_store_name_ajax_edit($id)
	{
		return DB::table('nm_store')->where('stor_id', '=', $id)->where('stor_status', '=', 1)->get();
	}
	public static function  get_shop_details()
	{
		return DB::table('nm_store')->where('stor_status', '=', 1)->get();
	}
	 public static function get_chart_details()
	 {
		 $chart_count = "";
		 for($i =1; $i <= 12; $i++){
		 $results = DB::select(DB::raw("SELECT count(*) as count FROM  nm_auction WHERE MONTH( `auc_posted_date` ) = ".$i));
		  $chart_count .= $results[0]->count.",";
		 }
		 $chart_count1 = trim($chart_count, ",");
		 return $chart_count1;
	 }
	 public static function get_archievd_auction()
	{
		$date = date('Y-m-d H:i:s');
		return DB::table('nm_auction')->where('auc_end_date', '<', $date)		
		->count();
	}
	 
	 public static function get_active_details()
	{    $date = date('Y-m-d H:i:s');
		return DB::table('nm_auction')->where('auc_end_date', '>', $date)
		->count();
	}
	public static function total_bidding_amt()
	{
		return DB::table('nm_order_auction')->sum('oa_bid_amt');
	}
	public static function total_bidding_winner()
	{
		return DB::table('nm_order_auction')->where('oa_bid_winner', '=', 1)
		->count();
	}
	

}
?>
