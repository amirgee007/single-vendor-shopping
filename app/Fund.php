<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Fund extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_deals';
    
    //withdraw request - old calculation
   /* public static function deal_no_count($id)
    {
        return DB::table('nm_deals')->where('deal_merchant_id', '=', $id)->sum('deal_no_of_purchase');
    }
    
    public static function deal_discount_count($id)
    {
        return DB::table('nm_deals')->where('deal_merchant_id', '=', $id)->sum('deal_discount_price');
    }
    
    public static function product_no_count($id)
    {
        return DB::table('nm_product')->where('pro_mr_id', '=', $id)->sum('pro_no_of_purchase');
    }
    
    public static function product_discount_count($id)
    {
        return DB::table('nm_product')->where('pro_mr_id', '=', $id)->sum('pro_disprice');
    }
    */
    public static function commison_amt($id)
    {
        return DB::table('nm_merchant')->where('mer_id', '=', $id)->get();
    }

    public static function check_withdraw($id)
    {
        return DB::table('nm_withdraw_request')->where('wd_mer_id', '=', $id)->get();
    }

    public static function save_withdraw($entry)
    {
        return DB::table('nm_withdraw_request')->insert($entry);
    }

    public static function update_withdraw($entry, $id)
    {
        return DB::table('nm_withdraw_request')->where('wd_mer_id', $id)->update($entry);
    }

    public static function paid_amt($merid)
    {
        return DB::select(DB::raw("SELECT sum(wr_paid_amount) as paid_amt FROM `nm_withdraw_request_paypal` WHERE wr_mer_id=$merid"));
    }

    public static function pendingWithDrawRequestCount($merid)
    {
        return DB::table('nm_withdraw_request')->where('wd_mer_id','=',$merid)->where('wd_status','=',0)->count();
    }

    public static function get_fund_transaction_details($merid)
    {
        return DB::table('nm_withdraw_request_paypal')->where('wr_mer_id', $merid)->get();
    }
    //withdraw request - old calculation 
    /*
    public static function product_order_amt($merid){   //only products
        return DB::table('nm_order')->where('order_merchant_id','=',$merid)->where('order_type','=',1)->sum('order_amt');
    }

    public static function product_ordercod_amt($merid){
        return DB::table('nm_ordercod')->where('cod_merchant_id','=',$merid)->where('cod_order_type','=',1)->sum('cod_amt');
    }

    public static function deal_order_amt($merid){
        return DB::table('nm_order')->where('order_merchant_id','=',$merid)->where('order_type','=',2)->sum('order_amt');
    }

    public static function deal_ordercod_amt($merid){
        return DB::table('nm_ordercod')->where('cod_merchant_id','=',$merid)->where('cod_order_type','=',2)->sum('cod_amt');
    }
    */

    //Merchant overallorder details
    public static function merchantOverallOrderDetails($mer_id)
    {
        return DB::table('nm_merchant_overallorders')->where('over_mer_id','=',$mer_id)->first();
    }

    //Merchant commision payment check    
    public static function check_commission($mer_id)
    {
        return DB::table('nm_cod_commission_paid')->where('com_merchant_id','=',$mer_id)->get();
    }

    //Merchant commision for cod orders
    public static function get_COD_commissionPay_details($mer_id,$order_type='')
    {
        
        $sql= DB::table('nm_ordercod As ordCod1');
        
        $sql->select(
                DB::raw("SUM(ordCod1.cod_amt) as sumCodAmt,CONCAT(mr.mer_fname,' ',mr.mer_lname) as mer_fullName,mr.mer_commission,mr.mer_id,mr.mer_payment,
                   (SELECT SUM(ordCod2.cod_taxAmt) FROM nm_ordercod AS ordCod2 WHERE ordCod1.cod_merchant_id = ordCod2.cod_merchant_id  AND ordCod2.cod_order_type = ordCod1.cod_order_type) AS sumTax,
                   (SELECT SUM(ordCod3.cod_shipping_amt) FROM nm_ordercod AS ordCod3 WHERE ordCod1.cod_merchant_id = ordCod3.cod_merchant_id  AND ordCod3.cod_order_type = ordCod1.cod_order_type) AS sumShippingAmt,
                   (SELECT SUM(ordCod4.coupon_amount) FROM nm_ordercod AS ordCod4 WHERE ordCod1.cod_merchant_id = ordCod4.cod_merchant_id  AND ordCod4.cod_order_type = ordCod1.cod_order_type) AS sumCoupon,
                   (SELECT SUM(ordCod5.wallet_amount) FROM nm_ordercod AS ordCod5 WHERE ordCod1.cod_merchant_id = ordCod5.cod_merchant_id  AND ordCod5.cod_order_type = ordCod1.cod_order_type) AS sumWallet,
                   (SELECT SUM(ordCod6.mer_commission_amt) FROM nm_ordercod AS ordCod6 WHERE ordCod1.cod_merchant_id = ordCod6.cod_merchant_id  AND ordCod6.cod_order_type = ordCod1.cod_order_type) AS sumMerchantCommission,
                   (SELECT SUM(ordCod7.mer_amt) FROM nm_ordercod AS ordCod7 WHERE ordCod1.cod_merchant_id = ordCod7.cod_merchant_id  AND ordCod7.cod_order_type = ordCod1.cod_order_type) AS sumMerchantAmount  
                   
                   "
                ) );
        $sql->where('ordCod1.cod_merchant_id','=',$mer_id);
        if($order_type!='')
            $sql->where('ordCod1.cod_order_type','=',$order_type);
        $sql->Join('nm_merchant As mr','mr.mer_id','=','ordCod1.cod_merchant_id');
        
        return $sql->get();
    }
    //Merchant commission for paypal orders
    public static function get_order_commissionPay_details($mer_id,$order_type='')
    {
        
        $sql = DB::table('nm_order As ord1');
        
        $sql->select(
                DB::raw("SUM(ord1.order_amt) as sumCodAmt,CONCAT(mr.mer_fname,' ',mr.mer_lname) as mer_fullName,mr.mer_commission,mr.mer_id,mr.mer_payment,

                   (SELECT SUM(ord2.order_taxAmt) FROM nm_order AS ord2 WHERE ord1.order_merchant_id = ord2.order_merchant_id AND ord2.order_type = ord1.order_type) AS sumTax,

                   (SELECT SUM(ord3.order_shipping_amt) FROM nm_order AS ord3 WHERE ord1.order_merchant_id = ord3.order_merchant_id AND ord3.order_type = ord1.order_type) AS sumShippingAmt,

                   (SELECT SUM(ord4.coupon_amount) FROM nm_order AS ord4 WHERE ord1.order_merchant_id = ord4.order_merchant_id AND ord4.order_type = ord1.order_type) AS sumCoupon,

                   (SELECT SUM(ord5.wallet_amount) FROM nm_order AS ord5 WHERE ord1.order_merchant_id = ord5.order_merchant_id AND ord5.order_type = ord1.order_type) AS sumWallet,

                   (SELECT SUM(ord6.mer_commission_amt) FROM nm_order AS ord6 WHERE ord1.order_merchant_id = ord6.order_merchant_id AND ord6.order_type = ord1.order_type) AS sumMerchantCommission,

                   (SELECT SUM(ord7.mer_amt) FROM nm_order AS ord7 WHERE ord1.order_merchant_id = ord7.order_merchant_id AND ord7.order_type = ord1.order_type) AS sumMerchantAmount  
                   
                   "
                ) );
        $sql->where('ord1.order_merchant_id','=',$mer_id);
        if($order_type!='')
            $sql->where('ord1.order_type','=',$order_type);
        $sql->Join('nm_merchant As mr','mr.mer_id','=','ord1.order_merchant_id');
        
       return $sql->get();


    } //Merchant commision for cod orders
    public static function get_COD_commissionPay_details_allType($mer_id,$order_type='')
    {
        
        $sql= DB::table('nm_ordercod As ordCod1');
        
        $sql->select(
                DB::raw("SUM(ordCod1.cod_amt) as sumCodAmt,CONCAT(mr.mer_fname,' ',mr.mer_lname) as mer_fullName,mr.mer_commission,mr.mer_id,mr.mer_payment,
                   (SELECT SUM(ordCod2.cod_taxAmt) FROM nm_ordercod AS ordCod2 WHERE ordCod1.cod_merchant_id = ordCod2.cod_merchant_id ) AS sumTax,
                   (SELECT SUM(ordCod3.cod_shipping_amt) FROM nm_ordercod AS ordCod3 WHERE ordCod1.cod_merchant_id = ordCod3.cod_merchant_id ) AS sumShippingAmt,
                   (SELECT SUM(ordCod4.coupon_amount) FROM nm_ordercod AS ordCod4 WHERE ordCod1.cod_merchant_id = ordCod4.cod_merchant_id) AS sumCoupon,
                   (SELECT SUM(ordCod5.wallet_amount) FROM nm_ordercod AS ordCod5 WHERE ordCod1.cod_merchant_id = ordCod5.cod_merchant_id ) AS sumWallet,
                   (SELECT SUM(ordCod6.mer_commission_amt) FROM nm_ordercod AS ordCod6 WHERE ordCod1.cod_merchant_id = ordCod6.cod_merchant_id ) AS sumMerchantCommission,
                   (SELECT SUM(ordCod7.mer_amt) FROM nm_ordercod AS ordCod7 WHERE ordCod1.cod_merchant_id = ordCod7.cod_merchant_id) AS sumMerchantAmount  
                   
                   "
                ) );
        $sql->where('ordCod1.cod_merchant_id','=',$mer_id);
       
        $sql->Join('nm_merchant As mr','mr.mer_id','=','ordCod1.cod_merchant_id');
        
        return $sql->get();
    }
    //Merchant commission for paypal orders
    public static function get_order_commissionPay_details_allType($mer_id,$order_type='')
    {
        
        $sql = DB::table('nm_order As ord1');
        
        $sql->select(
                DB::raw("SUM(ord1.order_amt) as sumCodAmt,CONCAT(mr.mer_fname,' ',mr.mer_lname) as mer_fullName,mr.mer_commission,mr.mer_id,mr.mer_payment,

                   (SELECT SUM(ord2.order_taxAmt) FROM nm_order AS ord2 WHERE ord1.order_merchant_id = ord2.order_merchant_id ) AS sumTax,

                   (SELECT SUM(ord3.order_shipping_amt) FROM nm_order AS ord3 WHERE ord1.order_merchant_id = ord3.order_merchant_id) AS sumShippingAmt,

                   (SELECT SUM(ord4.coupon_amount) FROM nm_order AS ord4 WHERE ord1.order_merchant_id = ord4.order_merchant_id ) AS sumCoupon,

                   (SELECT SUM(ord5.wallet_amount) FROM nm_order AS ord5 WHERE ord1.order_merchant_id = ord5.order_merchant_id ) AS sumWallet,

                   (SELECT SUM(ord6.mer_commission_amt) FROM nm_order AS ord6 WHERE ord1.order_merchant_id = ord6.order_merchant_id) AS sumMerchantCommission,

                   (SELECT SUM(ord7.mer_amt) FROM nm_order AS ord7 WHERE ord1.order_merchant_id = ord7.order_merchant_id ) AS sumMerchantAmount  
                   
                   "
                ) );
        $sql->where('ord1.order_merchant_id','=',$mer_id);
        
        $sql->Join('nm_merchant As mr','mr.mer_id','=','ord1.order_merchant_id');
        
       return $sql->get();


    }

    //Merchant commission for paypal orders
    public static function get_order_commissionPay_details_payu($mer_id,$order_type='')
    {
        
        $sql = DB::table('nm_order_payu As ord1');
        
        $sql->select(
                DB::raw("SUM(ord1.order_amt) as sumCodAmt,CONCAT(mr.mer_fname,' ',mr.mer_lname) as mer_fullName,mr.mer_commission,mr.mer_id,mr.mer_payment,

                   (SELECT SUM(ord2.order_taxAmt) FROM nm_order AS ord2 WHERE ord1.order_merchant_id = ord2.order_merchant_id ) AS sumTax,

                   (SELECT SUM(ord3.order_shipping_amt) FROM nm_order AS ord3 WHERE ord1.order_merchant_id = ord3.order_merchant_id) AS sumShippingAmt,

                   (SELECT SUM(ord4.coupon_amount) FROM nm_order AS ord4 WHERE ord1.order_merchant_id = ord4.order_merchant_id ) AS sumCoupon,

                   (SELECT SUM(ord5.wallet_amount) FROM nm_order AS ord5 WHERE ord1.order_merchant_id = ord5.order_merchant_id ) AS sumWallet,

                   (SELECT SUM(ord6.mer_commission_amt) FROM nm_order AS ord6 WHERE ord1.order_merchant_id = ord6.order_merchant_id) AS sumMerchantCommission,

                   (SELECT SUM(ord7.mer_amt) FROM nm_order AS ord7 WHERE ord1.order_merchant_id = ord7.order_merchant_id ) AS sumMerchantAmount  
                   
                   "
                ) );
        $sql->where('ord1.order_merchant_id','=',$mer_id);
        
        $sql->Join('nm_merchant As mr','mr.mer_id','=','ord1.order_merchant_id');
        
       return $sql->get();


    }
    //Merchant commision Listing Paid  
    public static function get_commissionPaid_details($mer_id)
    {
        return DB::table('nm_cod_commission_paid')->select( DB::raw("SUM(paidAmount) as sumPaidAmt"))->where('com_merchant_id','=',$mer_id)->where('com_status','=','1')->first();
    }
    //Merchant commision pending  
    public static function get_onPendingCommissionCount($mer_id)
    {
        return DB::table('nm_cod_commission_paid')->where('com_merchant_id','=',$mer_id)->where('com_status','=','0')->count();
    }

    //Merchant commision Listing Paid  
    public static function get_merchant_commissionPaid_details($mer_id)
    {
        return DB::table('nm_cod_commission_paid')->where('com_merchant_id','=',$mer_id)->get();
    }

    /* merchant commission online paid insert */
    public static function insert_commission($entry)
    {
        return DB::table('nm_cod_commission_paid')->insert($entry);
    }


    /* merchant commission online paid status update */
    public static function update_commission_paypal($entry, $id)
    {
        return DB::table('nm_cod_commission_paid')->where('transaction_id', '=', $id)->update($entry);
    }

    //Merchant commission from overall order table
    public static function overallOrder_nd_merchant($mer_id)
    {
         return DB::table('nm_merchant_overallorders As merOr')->select(DB::raw('merOr.*,CONCAT(mr.mer_fname," ",mr.mer_lname) as mer_fullName,mr.mer_commission,mr.mer_id,mr.mer_payment'))->leftJoin('nm_merchant As mr','mr.mer_id','=','merOr.over_mer_id')->where('over_mer_id','=',$mer_id)->first();
    }    


}

?>
