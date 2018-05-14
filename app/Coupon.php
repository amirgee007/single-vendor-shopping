<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Coupon extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_coupon';
    
    public static function insert_coupon($entry)
    {
        return DB::table('nm_coupon')->insert($entry);
        
    }
    public static function check_coupon($coupon_code)
    {
        return DB::table('nm_coupon')->where('coupon_code','=',$coupon_code)->get();
    }
    public static function check_coupon_start_date($start_date,$end_date)
    {
        return DB::table('nm_coupon')->whereBetween('start_date',[$start_date,$end_date])->first();
        
    }
    public static function check_coupon_end_date($start_date,$end_date)
    {
        return DB::table('nm_coupon')->whereBetween('end_date',[$start_date,$end_date])->first();
        
    }
     public static function check_product($product_id)
    {
        return DB::table('nm_coupon')->where('product_id', '=', $product_id)->first();
    }
    public static function check_product_start_date($start_date,$end_date)
    {
        return DB::table('nm_coupon')->whereBetween('start_date',[$start_date,$end_date])->first();
    }
    public static function check_product_end_date($start_date,$end_date)
    {
        return DB::table('nm_coupon')->whereBetween('end_date',[$start_date,$end_date])->first();
    }
   public static function check_coupon_name($coupon_name,$start_date,$end_date)
    {
        return DB::table('nm_coupon')->where('coupon_name', '=', $coupon_name)->where('start_date', '>=', $start_date)->orWhere('end_date', '<=', $end_date)->get();
    }
    public static function check_product_purchased_cod($product_id,$coupon_code){

        return DB::table('nm_ordercod')->where('cod_pro_id', '=', $product_id)->where('coupon_code', '=', $coupon_code)->count();
    }
    public static function check_product_purchased_paypal($product_id,$coupon_code){

        return DB::table('nm_order')->where('order_pro_id', '=', $product_id)->where('coupon_code', '=', $coupon_code)->where('order_status','!=', 4)->count();
    }
     public static function get_coupon_details()
    {
        return DB::table('nm_coupon')->get();
        
    }
    public static function update_coupon($entry, $id)
    {
        return DB::table('nm_coupon')->where('id', '=', $id)->update($entry);
    }
    public static function status_coupon_submit($id, $status)
    {
        return DB::table('nm_coupon')->where('id', '=', $id)->update(array('status' => $status));
    }
    public static function selectedcoupon_list($id)
    {
        return DB::table('nm_coupon')->where('id', '=', $id)->get();
    }
    public static function selectedcoupon_city_list($id)
    {
        $dataid=explode(",",$id);
        return DB::table('nm_customer')->leftJoin('nm_city', 'nm_customer.cus_city', '=', 'nm_city.ci_id')->where('nm_customer.cus_id', '=', $dataid[0])->get();
        //return DB::table('nm_coupon')->where('id', '=', $id)->get();
    }
     public static function get_product_details($id)
    {
        return DB::table('nm_coupon')->join('nm_product','nm_coupon.product_id','=','nm_product.pro_id')->where('id', '=', $id)->get();
    }
    public static function update_coupon_details_based_user($entry, $customer_id1)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $customer_id1)->update($entry);
    }
    public static function insert_purchage_coupon($entry)
    {
        $id =  DB::table('nm_coupon_purchage')->insertGetId($entry);
        return $id;
    }
    public static function check_coupon_already_purchage_cod($coupon,$customer_id)
    {
        return DB::table('nm_ordercod')->where('coupon_code', '=', $coupon)->where('cod_cus_id', '=', $customer_id)->get();
    }
    public static function check_coupon_already_purchage_paypal($coupon,$customer_id)
    {
        return DB::table('nm_order')->where('coupon_code', '=', $coupon)->where('order_cus_id', '=', $customer_id)->where('order_status', '!=', 4)->get();
    }
    public static function delete_entered_coupon($coupon,$txt_product,$customer_id)
    {
        return DB::table('nm_coupon_purchage')->where('coupon_id','=',$coupon)->where('sold_user','=',$customer_id)->where('product_id','=',$txt_product)->delete();
    }
    public static function delete_entered_user_coupon($customer_id)
    {
        return DB::table('nm_coupon_purchage')->where('sold_user','=',$customer_id)->delete();
    }
    public static function delete_coupon($id)
    {
        return DB::table('nm_coupon')->where('id', '=', $id)->delete();
    }
 ////////////////////
    public static function check_coupon_purchase_count_cod($coupon,$product_id)
    {
       $product_coupon = DB::table('nm_ordercod')->where('coupon_code', '=', $coupon)->where('cod_pro_id', '=', $product_id)->count();
       return $product_coupon;
    }

    public static function check_coupon_purchase_count_paypal($coupon,$product_id)
    {
       $product_coupon = DB::table('nm_order')->where('coupon_code', '=', $coupon)->where('order_pro_id', '=', $product_id)->where('order_status','!=', 4)->count();
       return $product_coupon;
    }

    public static function check_coupon_purchase_count_cod_user($coupon,$customer_id,$product_id)
    {
        $user_product_coupon = DB::table('nm_ordercod')->where('coupon_code', '=', $coupon)->where('cod_pro_id', '=', $product_id)->where('cod_cus_id', '=', $customer_id)->count();
        return $user_product_coupon;

    }

     public static function check_coupon_purchase_count_paypal_user($coupon,$customer_id,$product_id)
    {
       $user_product_coupon = DB::table('nm_order')->where('coupon_code', '=', $coupon)->where('order_pro_id', '=', $product_id)->where('order_cus_id', '=', $customer_id)->where('order_status','!=', 4)->count();
       return $user_product_coupon;
    }

    //Product_view Page

    public static function productview_check_coupon_purchase_count_cod($coupon_code,$product_id)
    {
       $product_coupon = DB::table('nm_ordercod')->where('coupon_code', '=', $coupon_code)->where('cod_pro_id', '=', $product_id)->count();
       return $product_coupon;
    }

    public static function productview_check_coupon_purchase_count_paypal($coupon_code,$product_id)
    {
       $product_coupon = DB::table('nm_order')->where('coupon_code', '=', $coupon_code)->where('order_pro_id', '=', $product_id)->where('order_status', '!=', 4)->count();
       return $product_coupon;
    }

    public static function productview_check_coupon_purchase_count_cod_user($coupon_code,$customer_id,$product_id)
    {
        $user_product_coupon = DB::table('nm_ordercod')->where('coupon_code', '=', $coupon_code)->where('cod_cus_id', '=', $customer_id)->where('cod_pro_id', '=', $product_id)->count();
        return $user_product_coupon;

    }

     public static function productview_check_coupon_purchase_count_paypal_user($coupon_code,$customer_id,$product_id)
    {
       $user_product_coupon = DB::table('nm_order')->where('coupon_code', '=', $coupon_code)->where('order_status', '!=', 4)->where('order_cus_id', '=', $customer_id)->where('order_pro_id', '=', $product_id)->count();
       return $user_product_coupon;
    }
    public static function check_coupon_user_list($coupon_code,$customer_id) {
        $sql = "select * from `nm_coupon` where `coupon_code` = '".$coupon_code."' and `status` = 1 and FIND_IN_SET('".$customer_id."',user_id) and (`type_of_coupon` = 2 or `type_of_coupon` = 3) limit 1";
        
        return DB::select($sql);
    }
}

?>
