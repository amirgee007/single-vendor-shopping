<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Customerprofile extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_customer';
    
    
    public static function get_customer_details($customerid)
    {
        return DB::table('nm_customer')->leftjoin('nm_city', 'nm_customer.cus_city', '=', 'nm_city.ci_id')->leftjoin('nm_country', 'nm_customer.cus_country', '=', 'nm_country.co_id')->where('cus_id', '=', $customerid)->get();
        
    }

    public static function get_customer_shipping_details($customerid)
    {
        return DB::table('nm_shipping')->where('ship_cus_id', '=', $customerid)->get();
        
    }

    public static function get_cus_ship_details($cus_id){  // getting shipping address from customer table
        return DB::table('nm_customer')->where('cus_id','=',$cus_id)->get();
    }
    
    public static function update_cus_ship_details($entry,$customerid){
        return DB::table('nm_customer')->where('cus_id','=',$customerid)->update($entry);
    }

    public static function getproductordersdetails($customerid){
        return DB::table('nm_order')->join('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->join('nm_shipping', 'nm_order.order_cus_id', '=', 'nm_shipping.ship_cus_id')->groupBy('nm_order.order_pro_id')->orderBy('nm_order.order_date', 'desc')->where('order_cus_id', '=', $customerid)->where('nm_order.order_type','=',1)->get();
        
    }
    public static function getproductordersdetailspayu($customerid){
        return DB::table('nm_order_payu')->join('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')->join('nm_shipping', 'nm_order_payu.order_cus_id', '=', 'nm_shipping.ship_cus_id')->groupBy('nm_order_payu.order_pro_id')->orderBy('nm_order_payu.order_date', 'desc')->where('order_cus_id', '=', $customerid)->where('nm_order_payu.order_type','=',1)->get();
        
    }
    // public static function getproductordersdetailss($customerid)
    // {
    //    return  DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->join('nm_shipping', 'nm_ordercod.cod_cus_id', '=', 'nm_shipping.ship_cus_id')->orderBy('nm_ordercod.cod_date', 'desc')->where('cod_cus_id', '=', $customerid)->get();


        
    // }
    public static function getproductordercod($customerid)
    {
       return  DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->orderBy('nm_ordercod.cod_date', 'desc')->where('cod_cus_id', '=', $customerid)->get();

       
        
    }
	public static function getproductordercod_orderwise($customerid)
    {
       return  DB::table('nm_ordercod')
       ->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
       ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
       //->leftjoin('nm_shipping', 'nm_ordercod.cod_id', '=', 'nm_shipping.ship_order_id')
	   ->leftjoin('nm_shipping', 'nm_ordercod.cod_transaction_id', '=', 'nm_shipping.ship_trans_id')
       ->groupby('nm_ordercod.cod_transaction_id')
       ->orderBy('nm_ordercod.cod_id', 'desc')
           ->where('nm_ordercod.cod_order_type', '=', 1)
       ->where('nm_ordercod.cod_cus_id', '=', $customerid)
       ->get();
	}
	   

	
    public static function get_deal_COD_details($customerid)
    {
       return  DB::table('nm_ordercod')
	   ->join('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
	   ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
	   //->leftjoin('nm_shipping', 'nm_ordercod.cod_id', '=', 'nm_shipping.ship_order_id')
	   ->leftjoin('nm_shipping', 'nm_ordercod.cod_transaction_id', '=', 'nm_shipping.ship_trans_id')
	   ->groupby('nm_ordercod.cod_transaction_id')
	   ->orderBy('nm_ordercod.cod_id', 'desc')
           ->where('nm_ordercod.cod_order_type', '=', 2)
	   ->where('nm_ordercod.cod_cus_id', '=', $customerid)
	   ->get();
   
    }
	public static function get_deal_Paypal_details($customerid)
    {
       return DB::table('nm_order')
		->orderBy('nm_order.order_id', 'desc')
		->groupBy('nm_order.transaction_id')
		->where('nm_order.order_type','=',2)
        ->where('nm_order.order_cus_id', '=', $customerid)
		->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
		->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_shipping', 'nm_order.transaction_id', '=', 'nm_shipping.ship_trans_id')
		->get();
   
    }
    public static function get_deal_Payumoney_details($customerid)
    {
       return DB::table('nm_order_payu')
        ->orderBy('nm_order_payu.order_id', 'desc')
        ->groupBy('nm_order_payu.transaction_id')
        ->where('nm_order_payu.order_type','=',2)
        ->where('nm_order_payu.order_cus_id', '=', $customerid)
        ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
        ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
        ->leftjoin('nm_shipping', 'nm_order_payu.transaction_id', '=', 'nm_shipping.ship_trans_id')
        ->get();
   
    }
    public static function getproductorderpaypal_orderwise($customerid)
    {
       return  DB::table('nm_order')
	   ->join('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')       
       ->leftjoin('nm_shipping', 'nm_order.transaction_id', '=', 'nm_shipping.ship_trans_id')
	   ->groupby('nm_order.transaction_id')
	   ->orderBy('nm_order.order_id', 'desc')
	   ->where('nm_order.order_cus_id', '=', $customerid)
	   ->where('nm_order.order_type','=',1)
	   ->get();
   
    }
     public static function getproductorderpayumoney_orderwise($customerid)
    {
      return  DB::table('nm_order_payu')
       ->join('nm_product','nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')       
       ->leftjoin('nm_shipping', 'nm_order_payu.transaction_id', '=', 'nm_shipping.ship_trans_id')
       ->groupby('nm_order_payu.transaction_id')
       ->orderBy('nm_order_payu.order_id', 'desc')
       ->where('nm_order_payu.order_cus_id', '=', $customerid)
       ->where('nm_order_payu.order_type','=',1)
       ->get();
   
    }
	public static function getproductwallet_used_amt($customerid)
    {
		return DB::table('nm_ordercod')->join('nm_ordercod_wallet', 'nm_ordercod.cod_transaction_id', '=', 'nm_ordercod_wallet.cod_transaction_id')->where('nm_ordercod.cod_cus_id', '=', $customerid)->first(array(
        DB::raw( 'SUM(wallet_used) AS walletsum' )
    ));
	}
    public static function getdealordersdetails($customerid)
    {
        return DB::table('nm_order')->join('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->join('nm_shipping', 'nm_order.order_cus_id', '=', 'nm_shipping.ship_cus_id')->groupBy('nm_order.order_pro_id')->orderBy('nm_order.order_date', 'desc')->where('order_cus_id', '=', $customerid)->where('nm_order.order_type','=',2)->get();
        
    }

    public static function getproductordersdetailss($customerid)
    {
        return DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->join('nm_shipping', 'nm_ordercod.cod_cus_id', '=', 'nm_shipping.ship_cus_id')->groupBy('nm_ordercod.cod_pro_id')->orderBy('nm_ordercod.cod_date', 'desc')->where('cod_cus_id', '=', $customerid)->where('nm_ordercod.cod_order_type','=',1)->get();
        
    }

    public static function getdealordersdetailss($customerid)
    {
        return DB::table('nm_ordercod')->join('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->join('nm_shipping', 'nm_ordercod.cod_cus_id', '=', 'nm_shipping.ship_cus_id')->groupBy('nm_ordercod.cod_pro_id')->orderBy('nm_ordercod.cod_date', 'desc')->where('cod_cus_id', '=', $customerid)->where('nm_ordercod.cod_order_type','=',2)->get();
        
    }

    public static function get_shipping_details($customerid)
    {
        return DB::table('nm_shipping')->where('ship_cus_id', '=', $customerid)->get();
        
    }

    public static function update_customer_name($cname, $cusid)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cusid)->update(array('cus_name' => $cname));
        
    }
    
    public static function update_address1($addr1, $cusid)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cusid)->update(array('cus_address1' => $addr1));
        
    }

    public static function update_address2($addr2, $cusid)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cusid)->update(array('cus_address2' => $addr2));
        
    }

    public static function update_city($city, $country, $cusid)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cusid)->update(array(
            'cus_city' => $city,
            'cus_country' => $country
        ));
        
    }
    
    public static function update_phonenumber($phonenum, $cusid)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cusid)->update(array('cus_phone' => $phonenum));
        
    }

    public static function update_newpwd($customerid, $confirmpwd)
    {
        
        return DB::table('nm_customer')->where('cus_id', '=', $customerid)->update(array('cus_pwd' => $confirmpwd));
    }

    public static function check_oldpwd($cusid, $oldpwd)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cusid)->where('cus_pwd', '=', $oldpwd)->get();
        
    }

    public static function insert_shipping($shipcus, $shipaddr1, $shipaddr2, $shipcusmobile, $shipcusemail, $shippingstate, $zipcode, $cityid, $countryid, $customerid)
    {
        return DB::table('nm_shipping')->insert(array(
            'ship_name' => $shipcus,
            'ship_address1' => $shipaddr1,
            'ship_address2' => $shipaddr2,
            'ship_ci_id' => $cityid,
            'ship_state' => $shippingstate,
            'ship_country' => $countryid,
            'ship_postalcode' => $zipcode,
            'ship_phone' => $shipcusmobile,
            'ship_email' => $shipcusemail,
            'ship_cus_id',
            '=',
            $customerid
        ));
    }

    public static function update_shipping($shipcus, $shipaddr1, $shipaddr2, $shipcusmobile, $shipcusemail, $shippingstate, $zipcode, $cityid, $countryid, $customerid)
    {
        return DB::table('nm_shipping')->where('ship_cus_id', '=', $customerid)->update(array(
            'ship_name' => $shipcus,
            'ship_address1' => $shipaddr1,
            'ship_address2' => $shipaddr2,
            'ship_ci_id' => $cityid,
            'ship_state' => $shippingstate,
            'ship_country' => $countryid,
            'ship_postalcode' => $zipcode,
            'ship_phone' => $shipcusmobile,
            'ship_email' => $shipcusemail
        ));
        
    }

    public static function update_profileimage($customerid, $filename)
    {
        
        return DB::table('nm_customer')->where('cus_id', '=', $customerid)->update(array(
            'cus_pic' => $filename
        ));
    }
    
    public static function get_wishlistdetails($customerid)
    {
        return DB::table('nm_wishlist')
        ->join('nm_product', 'nm_wishlist.ws_pro_id', '=', 'nm_product.pro_id')
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
        ->where('ws_cus_id', '=', $customerid)->get();
        
    }

    public static function get_wishlistdetailscnt($customerid)
    {
        return DB::table('nm_wishlist')->where('ws_cus_id', '=', $customerid)->count();
        
    }

    

    public static function get_general_settings()
    {
	return DB::table('nm_generalsetting')->get();
		 
    } 
     public static function getcityname($cityid)
    {
        return DB::table('nm_city')->where('ci_id','=',$cityid)->get();
    }
     public static function getcountryname($countryid)
     {
        return DB::table('nm_country')->where('co_id','=',$countryid)->get();
    }

    public static function remove_wish_product($id){ // to remove product from wishlist table ( id = wishlist_id )
        return DB::table('nm_wishlist')->where('ws_id','=',$id)->delete();
    }
 
}

?>
