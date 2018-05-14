<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Transactions extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_order_auction';
       
    public static function manage_auction_bidder()
    {
        return DB::table('nm_order_auction')->LeftJoin('nm_auction', 'nm_auction.auc_id', '=', 'nm_order_auction.oa_pro_id')->get();
    }
    
    public static function auction_by_bidder()
    {
        return DB::table('nm_auction')->get();
    }

    public static function auction_by_bidder_count()
    {
        $auction_det = DB::table('nm_auction')->get();
        
        foreach ($auction_det as $auction) {
            $catg_result = DB::table('nm_order_auction')->where('oa_pro_id', '=', $auction->auc_id)->get();
            if ($catg_result) {
                $result[$auction->auc_id] = count($catg_result);
            } else {
                $result[$auction->auc_id] = 0;
            }
        }
        return $result;
    }
    
    public static function auction_by_bidder_amt_count()
    {
        $auction_det = DB::table('nm_auction')->get();
        
        foreach ($auction_det as $auction) {
            $catg_result = DB::table('nm_order_auction')->where('oa_pro_id', '=', $auction->auc_id)->sum('oa_bid_amt');
            if ($catg_result) {
                $result[$auction->auc_id] = $catg_result;
            } else {
                $result[$auction->auc_id] = 0;
            }
        }
        return $result;
    }
    
    public static function list_auction_bidders($id)
    {
        return DB::table('nm_order_auction')->where('oa_pro_id', '=', $id)->LeftJoin('nm_auction', 'nm_auction.auc_id', '=', 'nm_order_auction.oa_pro_id')->get();
    }
    
    public static function auction_winner($id)
    {
        return DB::table('nm_order_auction')->where('oa_pro_id', '=', $id)->where('oa_bid_winner', '=', 1)->get();
    }

    public static function check_delivery_status($id)
    {
        return DB::table('nm_order_auction')->where('oa_id', '=', $id)->get();
    }
    
    public static function select_auction_winner($entry, $id)
    {
        return DB::table('nm_order_auction')->where('oa_id', '=', $id)->update($entry);
    }
    
    public static function update_auction_status($entry, $id)
    {
        return DB::table('nm_order_auction')->where('oa_id', '=', $id)->update($entry);
    }

    public static function getproduct_all_orders()
    {
        return DB::table('nm_order')
		->orderBy('order_date', 'desc')
		//->groupBy('transaction_id')
		->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
		->where('nm_order.order_type', '=', 1)
		->get();
        
    }

    public static function getproduct_success_orders()
    {
        return DB::table('nm_order')
		->orderBy('order_date', 'desc')
		->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
		->where('nm_order.order_status', '=', 1)
		->where('nm_order.order_type', '=', 1)
		->get();
        
    }

    public static function getproduct_completed_orders()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 2)->where('nm_order.order_type', '=', 1)->get();
        
    }

    public static function getproduct_hold_orders()
    {
        return DB::table('nm_order')
		->orderBy('order_date', 'desc')
		->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
		->where('nm_order.order_status', '=', 3)
		->where('nm_order.order_type', '=', 1)
		->get();
        
    }
    
    public static function getproduct_failed_orders()
    {
        return DB::table('nm_order')
		->orderBy('order_date', 'desc')
		->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
		->where('nm_order.order_type', '=', 1)
		->where('nm_order.order_status', '=', 4)
		->get();
        
    }
    
    /* Product payumoney getorders */
    public static function getproduct_all_orders_payu()
    {
        return DB::table('nm_order_payu')
        ->orderBy('order_date', 'desc')
        //->groupBy('transaction_id')
        ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
        ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
        ->where('nm_order_payu.order_type', '=', 1)
        ->get();
        
    }

    public static function getproduct_success_orders_payu()
    {
        return DB::table('nm_order_payu')
        ->orderBy('order_date', 'desc')
        ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
        ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
        ->where('nm_order_payu.order_status', '=', 1)
        ->where('nm_order_payu.order_type', '=', 1)
        ->get();
        
    }

    
    public static function getproduct_failed_orders_payu()
    {
        return DB::table('nm_order_payu')
        ->orderBy('order_date', 'desc')
        ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
        ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
        ->where('nm_order_payu.order_type', '=', 1)
        ->where('nm_order_payu.order_status', '=', 4)
        ->get();
        
    }
    
    /* product payumoney ends */

    public static function getcod_all_orders()
    {
        return DB::table('nm_ordercod')
		->orderBy('cod_id', 'desc')
		//->groupBy('nm_ordercod.cod_transaction_id')
		->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
		->where('nm_ordercod.cod_order_type', '=', 1)
		->get();
    }
    
    public static function getcod_completed_orders()
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->groupBy('nm_ordercod.cod_transaction_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 1)->where('nm_ordercod.cod_order_type', '=', 1)->get();
        
    }

    public static function getcod_hold_orders()
    {
        return DB::table('nm_ordercod')
		->orderBy('cod_date', 'desc')
		//->groupBy('nm_ordercod.cod_transaction_id')
		->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
		->where('nm_ordercod.cod_status', '=', 3)
		->where('nm_ordercod.cod_order_type', '=', 1)
		->get();
        
    }
    
    public static function getcod_failed_orders()
    {
       return DB::table('nm_ordercod')
	   ->orderBy('cod_date', 'desc')
	   ->groupBy('nm_ordercod.cod_transaction_id')
	   ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
	   ->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
	   ->where('nm_ordercod.cod_status', '=', 4)
	   ->where('nm_ordercod.cod_order_type', '=', 1)
	   ->get();
        
    }

     public static function getdeals_all_orders()
    {
        return DB::table('nm_order')
		->orderBy('order_date', 'desc')
		->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
		->where('nm_order.order_type', '=', 2)
		->get();
        
    }

    public static function getdeals_success_orders()
    {
        return DB::table('nm_order')
		->orderBy('nm_order.order_id', 'desc')
		->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
    	->where('nm_order.order_status', '=', 1)
		->where('nm_order.order_type', '=', 2)
		->get();
        
    }

    public static function getdeals_completed_orders()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 2)->where('nm_order.order_type', '=', 2)->get();
        
    }

    public static function getdeals_hold_orders()
    {
        return DB::table('nm_order')
		->orderBy('nm_order.order_id', 'desc')
		->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
		->where('nm_order.order_status', '=', 3)
		->where('nm_order.order_type', '=', 2)
		->get();
        
    }
    
    public static function getdeals_failed_orders()
    {
        return DB::table('nm_order')
		->orderBy('nm_order.order_id', 'desc')
		->groupBy('nm_order.transaction_id')
		->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
		->where('nm_order.order_status', '=', 4)
		->where('nm_order.order_type', '=', 2)
		->get();
        
    }
    public static function get_payu_deals_failed_orders()
    {
        return DB::table('nm_order_payu')
        ->orderBy('nm_order_payu.order_id', 'desc')
        ->groupBy('nm_order_payu.transaction_id')
        ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
        ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
        ->where('nm_order_payu.order_status', '=', 4)
        ->where('nm_order_payu.order_type', '=', 2)
        ->get();
        
    }
    
   public static function getdealscod_all_orders()
    {
        //return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_order_type', '=', 2)->get();
       return DB::table('nm_ordercod')
	   ->orderBy('nm_ordercod.cod_id', 'desc')
	   //->groupBy('nm_ordercod.cod_transaction_id')
	   ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
	   ->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
	   ->where('nm_ordercod.cod_order_type', '=', 2)
	   ->get();
   
   }
    
    public static function getdealscod_completed_orders()
    {
        return DB::table('nm_ordercod')->orderBy('cod_id', 'desc')->groupBy('nm_ordercod.cod_transaction_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 1)->where('nm_ordercod.cod_order_type', '=', 2)->get();
        
    }
    public static function getdealscod_hold_orders()
    {
        return DB::table('nm_ordercod')
		->orderBy('cod_id', 'desc')
		//->groupBy('nm_ordercod.cod_transaction_id')
		->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
		->where('nm_ordercod.cod_status', '=', 3)
		->where('nm_ordercod.cod_order_type', '=', 2)
		->get();
        
    }
    
    public static function getdealscod_failed_orders()
    {
        return DB::table('nm_ordercod')
		->orderBy('cod_id', 'desc')
		//->groupBy('nm_ordercod.cod_transaction_id')
		->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
		->where('nm_ordercod.cod_status', '=', 4)
		->where('nm_ordercod.cod_order_type', '=', 2)
		->get();
        
    }

    public static function get_producttransaction()
    {
        return DB::table('nm_order')->where('order_type', '=', 1)->count();
        
    }

    public static function get_dealstransaction()
    {
        return DB::table('nm_order')->where('order_type', '=', 2)->count();
    }

    public static function get_auctiontransaction()
    {
        return DB::table('nm_order_auction')->count();
    }

    public static function get_producttoday_order()
    {
        return DB::select(DB::raw("SELECT count(order_id) as count,sum(order_amt) as amt  from nm_order where order_type=1 and DATEDIFF(DATE(order_date),DATE(NOW()))=0"));
        
    }

    public static function get_product7days_order()
    {
        return DB::select(DB::raw("select count(order_id) as count,sum(order_amt) as amt from nm_order WHERE order_type=1 and (DATE(order_date) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY))"));
    }

    public static function get_product30days_order()
    {
        return DB::select(DB::raw("select  count(order_id) as count,sum(order_amt) as amt from nm_order WHERE order_type=1 and (DATE(order_date) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY))"));
    }

    public static function get_dealstoday_order()
    {
        return DB::select(DB::raw("SELECT count(order_id) as count,sum(order_amt) as amt  from nm_order where order_type=2 and DATEDIFF(DATE(order_date),DATE(NOW()))=0"));
        
    }

    public static function get_deals7days_order()
    {
        return DB::select(DB::raw("select count(order_id) as count,sum(order_amt) as amt from nm_order WHERE order_type=2 and (DATE(order_date) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY))"));
    }

    public static function get_deals30days_order()
    {
        return DB::select(DB::raw("select  count(order_id) as count,sum(order_amt) as amt from nm_order WHERE order_type=2 and (DATE(order_date) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY))"));
    }

    public static function get_auctiontoday_order()
    {
        return DB::select(DB::raw("SELECT count(oa_id) as count,sum(oa_original_bit_amt) as amt  from nm_order_auction where   DATEDIFF(DATE(oa_bid_date),DATE(NOW()))=0"));
        
    }

    public static function get_auction7days_order()
    {
        return DB::select(DB::raw("select count(oa_id) as count,sum(oa_original_bit_amt) as amt from nm_order_auction WHERE  (DATE(oa_bid_date) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY))"));
    }

    public static function get_auction30days_order()
    {
        return DB::select(DB::raw("select  count(oa_id) as count,sum(oa_original_bit_amt) as amt from nm_order_auction WHERE  (DATE(oa_bid_date) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY))"));
    }

    public static function get_chart_product_details()
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE  order_type=1 and MONTH( `order_date` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }

    public static function get_chart_deals_details()
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE order_type=2 and MONTH( `order_date` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }

    public static function get_chart_auction_details()
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order_auction WHERE MONTH( `oa_bid_date` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }
    
    public static function get_funds()
    {
        return DB::select(DB::raw("  SELECT * FROM nm_withdraw_request vg LEFT JOIN (select f.wr_mer_id, sum(wr_paid_amount) as paidedamount from nm_withdraw_request_paypal f group by f.wr_mer_id ) f ON f.wr_mer_id = vg.wd_mer_id LEFT JOIN nm_merchant on vg.wd_mer_id=nm_merchant.mer_id "));
    }
    
    public static function success_fund_request()
    {
        return DB::select(DB::raw("  SELECT * FROM  nm_withdraw_request_paypal f LEFT JOIN nm_merchant on f.wr_mer_id=nm_merchant.mer_id where f.wr_status = 'Success'"));
    }
    
    public static function pending_fund_request()
    {
        return DB::select(DB::raw("  SELECT * FROM  nm_withdraw_request_paypal f LEFT JOIN nm_merchant on f.wr_mer_id=nm_merchant.mer_id where f.wr_status = 'Pending'"));
    }
    
    public static function failed_fund_request()
    {
        return DB::select(DB::raw("  SELECT * FROM  nm_withdraw_request_paypal f LEFT JOIN nm_merchant on f.wr_mer_id=nm_merchant.mer_id where f.wr_status = 'Failed'"));
    }
    
   public static function insert_funds_paypal($entry)
    {
        $d = DB::table('nm_withdraw_request_paypal')->insert($entry);
      
    } 

    public static function update_funds_paypal($entry, $id)
    {
        return DB::table('nm_withdraw_request_paypal')->where('wr_txn_id', '=', $id)->update($entry);
    }

    public static function update_cod_status($status, $orderid)
    {
        return DB::table('nm_ordercod')->where('cod_id', '=', $orderid)->update(array(
            'cod_status' => $status
        ));
   
    }
    /*Transcation -> Deal Transcation*/
    public static function getall_dealreports($from_date, $to_date)
    { 
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
		
        if ($from_date != '' & $to_date != '') {
             return DB::table('nm_order')
			//->orderBy('order_date', 'desc')
			->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_type', '=', 2)
			->whereDate('nm_order.order_date', '>=' , $from)
			->whereDate('nm_order.order_date', '<=' , $to)->get();
			/* ->whereBetween('nm_order.order_date', array(
                $from,
                $to
            )) */
        } else  if ($from_date != '' & $to_date == '') {
			
			 return DB::table('nm_order')
			//->orderBy('order_date', 'desc')
			->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_type', '=', 2)
			->whereDate('nm_order.order_date', '>=' , $from)
			->get();
			
		} else  if ($from_date == '' & $to_date != '') {
			
			return DB::table('nm_order')
			//->orderBy('order_date', 'desc')
			->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_type', '=', 2)
			->whereDate('nm_order.order_date','<=' , $to)
			->get();
			
		} else { 
		
			DB::table('nm_order')
			//->orderBy('order_date', 'desc')
			->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_type', '=', 2)
			->get();
		
		}

    }
	
	
    
    public static function get_successreports($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
       if ($from_date != '' & $to_date != '') {
            return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_status', '=', 1)
			->where('nm_order.order_type', '=', 2)
			->whereDate('nm_order.order_date', '>=' , $from)
			->whereDate('nm_order.order_date', '<=' , $to)->get();
        } else  if ($from_date != '' & $to_date == '') {
			
			 return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_status', '=', 1)
			->where('nm_order.order_type', '=', 2)
			->whereDate('nm_order.order_date', '>=' , $from)
			->get();
			
		} else  if ($from_date == '' & $to_date != '') {
			
			 return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_status', '=', 1)
			->where('nm_order.order_type', '=', 2)
			->whereDate('nm_order.order_date', '<=' , $to)->get();
			
		} else { 
		
			 return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_status', '=', 1)
			->where('nm_order.order_type', '=', 2)
			->get();
		}
    }
    
    public static function get_holdreports($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
            return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_status', '=', 3)
			->where('nm_order.order_type', '=', 2)
			->whereDate('nm_order.order_date', '>=' , $from)
			->whereDate('nm_order.order_date', '<=' , $to)->get();
        } 
		else if ($from_date == '' & $to_date != '') {
			
            return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_status', '=', 3)
			->where('nm_order.order_type', '=', 2)
			->whereDate('nm_order.order_date', '<=' , $to)->get();
			
        } else if ($from_date != '' & $to_date == '') {
			
            return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_status', '=', 3)
			->where('nm_order.order_type', '=', 2)
			->whereDate('nm_order.order_date', '>=' , $from)
			->get();
        } else {
            return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_status', '=', 3)
			->where('nm_order.order_type', '=', 2)
			->get();
        }
    }
    
    public static function get_failedreports($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
            return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_status', '=', 4)
			->where('nm_order.order_type', '=', 2)
			->whereDate('nm_order.order_date', '>=' , $from)
			->whereDate('nm_order.order_date', '<=' , $to)->get();
        } else if ($from_date == '' & $to_date != '') {
			
            return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_status', '=', 4)
			->where('nm_order.order_type', '=', 2)
			->whereDate('nm_order.order_date', '<=' , $to)->get();
			
        } else if ($from_date != '' & $to_date == '') {
			
            return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_status', '=', 4)
			->where('nm_order.order_type', '=', 2)
			->whereDate('nm_order.order_date', '>=' , $from)
			->get();
        } else {
             return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
			->where('nm_order.order_status', '=', 4)
			->where('nm_order.order_type', '=', 2)
			->get();
        }
    }


    /* Transaction -> Deal PayUmoney */
public static function getall_dealpayu_reports($from_date, $to_date)
    { 
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        
        if ($from_date != '' & $to_date != '') {
             return DB::table('nm_order_payu')
            //->orderBy('order_date', 'desc')
            ->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
            ->where('nm_order_payu.order_type', '=', 2)
            ->whereDate('nm_order_payu.order_date', '>=' , $from)
            ->whereDate('nm_order_payu.order_date', '<=' , $to)->get();
            /* ->whereBetween('nm_order_payu.order_date', array(
                $from,
                $to
            )) */
        } else  if ($from_date != '' & $to_date == '') {
            
             return DB::table('nm_order_payu')
            //->orderBy('order_date', 'desc')
            ->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
            ->where('nm_order_payu.order_type', '=', 2)
            ->whereDate('nm_order_payu.order_date', '>=' , $from)
            ->get();
            
        } else  if ($from_date == '' & $to_date != '') {
            
            return DB::table('nm_order_payu')
            //->orderBy('order_date', 'desc')
            ->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
            ->where('nm_order_payu.order_type', '=', 2)
            ->whereDate('nm_order_payu.order_date','<=' , $to)
            ->get();
            
        } else { 
        
            DB::table('nm_order_payu')
            //->orderBy('order_date', 'desc')
            ->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
            ->where('nm_order_payu.order_type', '=', 2)
            ->get();
        
        }

    }

       public static function getdeals_payu_all_orders()
    {
        return DB::table('nm_order_payu')
        ->orderBy('order_date', 'desc')
        ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
        ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
        ->where('nm_order_payu.order_type', '=', 2)
        ->get();
        
    } 
    
 public static function getpayu_successreports($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
       if ($from_date != '' & $to_date != '') {
            return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
            ->where('nm_order_payu.order_status', '=', 1)
            ->where('nm_order_payu.order_type', '=', 2)
            ->whereDate('nm_order_payu.order_date', '>=' , $from)
            ->whereDate('nm_order_payu.order_date', '<=' , $to)->get();
        } else  if ($from_date != '' & $to_date == '') {
            
             return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
            ->where('nm_order_payu.order_status', '=', 1)
            ->where('nm_order_payu.order_type', '=', 2)
            ->whereDate('nm_order_payu.order_date', '>=' , $from)
            ->get();
            
        } else  if ($from_date == '' & $to_date != '') {
            
             return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
            ->where('nm_order_payu.order_status', '=', 1)
            ->where('nm_order_payu.order_type', '=', 2)
            ->whereDate('nm_order_payu.order_date', '<=' , $to)->get();
            
        } else { 
        
             return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
            ->where('nm_order_payu.order_status', '=', 1)
            ->where('nm_order_payu.order_type', '=', 2)
            ->get();
        }
    }   
    
    public static function getdeals_payu_success_orders()
    {
        return DB::table('nm_order_payu')
        ->orderBy('nm_order_payu.order_id', 'desc')
        ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
        ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
        ->where('nm_order_payu.order_status', '=', 1)
        ->where('nm_order_payu.order_type', '=', 2)
        ->get();
        
    }   
    
        
    public static function get_failedpayu_reports($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
            return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
            ->where('nm_order_payu.order_status', '=', 4)
            ->where('nm_order_payu.order_type', '=', 2)
            ->whereDate('nm_order_payu.order_date', '>=' , $from)
            ->whereDate('nm_order_payu.order_date', '<=' , $to)->get();
        } else if ($from_date == '' & $to_date != '') {
            
            return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
            ->where('nm_order_payu.order_status', '=', 4)
            ->where('nm_order_payu.order_type', '=', 2)
            ->whereDate('nm_order_payu.order_date', '<=' , $to)->get();
            
        } else if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
            ->where('nm_order_payu.order_status', '=', 4)
            ->where('nm_order_payu.order_type', '=', 2)
            ->whereDate('nm_order_payu.order_date', '>=' , $from)
            ->get();
        } else {
             return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
            ->where('nm_order_payu.order_status', '=', 4)
            ->where('nm_order_payu.order_type', '=', 2)
            ->get();
        }
    }

    public static function getdeals_payu_failed_orders()
    {
        return DB::table('nm_order_payu')
        ->orderBy('nm_order_payu.order_id', 'desc')
        ->groupBy('nm_order_payu.transaction_id')
        ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
        ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
        ->where('nm_order_payu.order_status', '=', 4)
        ->where('nm_order_payu.order_type', '=', 2)
        ->get();
        
    }

    /*Transcation -> Deal COD*/
    public static function get_codreports($from_date, $to_date)
    {
       $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
             return DB::table('nm_ordercod')
			 ->orderBy('cod_date', 'desc')
			 //->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
			 ->where('nm_ordercod.cod_order_type', '=', 2)
			 ->whereDate('nm_ordercod.cod_date', '>=' , $from)->whereDate('nm_ordercod.cod_date', '<=' , $to)
			 ->get();
        } else if ($from_date == '' & $to_date != '') {
			 
			 return DB::table('nm_ordercod')
			 ->orderBy('cod_date', 'desc')
			 //->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
			 ->where('nm_ordercod.cod_order_type', '=', 2)
			 ->whereDate('nm_ordercod.cod_date', '<=' , $to)
			 ->get();
			
		} else if ($from_date != '' & $to_date == '') {
			
			return DB::table('nm_ordercod')
			 ->orderBy('cod_date', 'desc')
			 //->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
			 ->where('nm_ordercod.cod_order_type', '=', 2)
			 ->whereDate('nm_ordercod.cod_date', '>=' , $from)
			 ->get();
        } else {
			
			return DB::table('nm_ordercod')
			 ->orderBy('cod_date', 'desc')
			 //->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
			 ->where('nm_ordercod.cod_order_type', '=', 2)
			 ->get();
			
		}
    }
    
    public static function get_completedreports($from_date, $to_date)
    {
        $from = date("Y-m-d H:i:s", strtotime($from_date));
        $to   = date("Y-m-d H:i:s", strtotime($to_date));
        if ($from != '' & $to != '') {
             return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->groupBy('nm_ordercod.cod_transaction_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id') ->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 1)->where('nm_ordercod.cod_order_type', '=', 2)->whereBetween('nm_ordercod.cod_date', array(
                $from,
                $to
            ))->get();
        }
     }
  
    public static function getcod_holdreports($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
             return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->groupBy('nm_ordercod.cod_transaction_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 2)
			 ->whereDate('nm_ordercod.cod_date', '>=' , $from)->whereDate('nm_ordercod.cod_date', '<=' , $to)
			 ->get();
        } else if ($from_date == '' & $to_date != '') {
			 
			  return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->groupBy('nm_ordercod.cod_transaction_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 2)
			  ->whereDate('nm_ordercod.cod_date', '<=' , $to)
			 ->get();
			
		} else if ($from_date != '' & $to_date == '') {
			
			 return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->groupBy('nm_ordercod.cod_transaction_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 2)
			 ->whereDate('nm_ordercod.cod_date', '>=' , $from)
			 ->get();
        } else {
			
			 return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->groupBy('nm_ordercod.cod_transaction_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 2)
			 ->get();
			
		}
    }
    
    
    public static function getcod_failedreports($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
             return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->groupBy('nm_ordercod.cod_transaction_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 2)
			  ->whereDate('nm_ordercod.cod_date', '>=' , $from)->whereDate('nm_ordercod.cod_date', '<=' , $to)
			 ->get();
			 
        } else if ($from_date == '' & $to_date != '') {
			
             return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->groupBy('nm_ordercod.cod_transaction_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 2)
			 ->whereDate('nm_ordercod.cod_date', '<=' , $to)
			 ->get();
			 
       } else if ($from_date != '' & $to_date == '') {
		   
             return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->groupBy('nm_ordercod.cod_transaction_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 2)
			 ->whereDate('nm_ordercod.cod_date', '>=' , $from)
			 ->get();
			 
        } else if ($from_date != '' & $to_date == '') {
			
             return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->groupBy('nm_ordercod.cod_transaction_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 2)
			 ->get();
        }
        
    }
    /*Transcation -> Product Transcation*/
    public static function getall_reports($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
            return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
			->where('nm_order.order_type', '=', 1)
			->whereDate('nm_order.order_date', '>=' , $from)->whereDate('nm_order.order_date', '<=' , $to)
			->get();
        } else if ($from_date == '' & $to_date != '')  {
			
			return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
			->where('nm_order.order_type', '=', 1)
			->whereDate('nm_order.order_date', '<=' , $to)
			->get();
            
        } else if ($from_date != '' & $to_date == '')  {
			
			return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
			->where('nm_order.order_type', '=', 1)
			->whereDate('nm_order.order_date', '>=' , $from)
			->get();
        }
    }
    
    public static function product_successrep($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
            return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
			->where('nm_order.order_status', '=', 1)
			->where('nm_order.order_type', '=', 1)
			->whereDate('nm_order.order_date', '>=' , $from)->whereDate('nm_order.order_date', '<=' , $to)
			->get();
        } else if ($from_date == '' & $to_date != '')  {
			
			 return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
			->where('nm_order.order_status', '=', 1)
			->where('nm_order.order_type', '=', 1)
			->whereDate('nm_order.order_date', '<=' , $to)
			->get();
            
        } else if ($from_date != '' & $to_date == '')  {
			
			return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
			->where('nm_order.order_status', '=', 1)
			->where('nm_order.order_type', '=', 1)
			->whereDate('nm_order.order_date', '>=' , $from)
			->get();
            
        } else {
			
			return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
			->where('nm_order.order_status', '=', 1)
			->where('nm_order.order_type', '=', 1)
			->get();
            
        }
			
    }

    public static function product_holdrep($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') { 
            return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
			->where('nm_order.order_status', '=', 3)
			->where('nm_order.order_type', '=', 1)
			->whereDate('nm_order.order_date', '>=' , $from)->whereDate('nm_order.order_date', '<=' , $to)
			->get();
        }  else if ($from_date == '' & $to_date != '')  {
			
			return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
			->where('nm_order.order_status', '=', 3)
			->where('nm_order.order_type', '=', 1)
			->whereDate('nm_order.order_date', '<=' , $to)
			->get();
            
        } else if ($from_date != '' & $to_date == '')  {
			return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
			->where('nm_order.order_status', '=', 3)
			->where('nm_order.order_type', '=', 1)
			->whereDate('nm_order.order_date', '>=' , $from)
			->get();
            
        } else  {
			return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
			->where('nm_order.order_status', '=', 3)
			->where('nm_order.order_type', '=', 1)
			->get();
            
        }
    }
    
    public static function product_failedrep($from_date, $to_date)
    {
        $from = date("Y-m-d H:i:s", strtotime($from_date));
        $to   = date("Y-m-d H:i:s", strtotime($to_date));
        if ($from != '' & $to != '') {
            return DB::table('nm_order')
			->orderBy('order_date', 'desc')
			//->groupBy('nm_order.transaction_id')
			->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
			->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
			->where('nm_order.order_status', '=', 4)
			->where('nm_order.order_type', '=', 1)
			->whereBetween('nm_order.order_date', array(
                $from,
                $to
            ))->get();
        } 
    }

    /* Transaction -> Product payumoney */

    public static function getall_reports_payu($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
            return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
            ->where('nm_order_payu.order_type', '=', 1)
            ->whereDate('nm_order_payu.order_date', '>=' , $from)->whereDate('nm_order_payu.order_date', '<=' , $to)
            ->get();
        } else if ($from_date == '' & $to_date != '')  {
            
            return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
            ->where('nm_order_payu.order_type', '=', 1)
            ->whereDate('nm_order_payu.order_date', '<=' , $to)
            ->get();
            
        } else if ($from_date != '' & $to_date == '')  {
            
            return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
            ->where('nm_order_payu.order_type', '=', 1)
            ->whereDate('nm_order_payu.order_date', '>=' , $from)
            ->get();
        }
    }
    
    public static function product_successrep_payu($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
            return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
            ->where('nm_order_payu.order_status', '=', 1)
            ->where('nm_order_payu.order_type', '=', 1)
            ->whereDate('nm_order_payu.order_date', '>=' , $from)->whereDate('nm_order_payu.order_date', '<=' , $to)
            ->get();
        } else if ($from_date == '' & $to_date != '')  {
            
             return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
            ->where('nm_order_payu.order_status', '=', 1)
            ->where('nm_order_payu.order_type', '=', 1)
            ->whereDate('nm_order_payu.order_date', '<=' , $to)
            ->get();
            
        } else if ($from_date != '' & $to_date == '')  {
            
            return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
            ->where('nm_order_payu.order_status', '=', 1)
            ->where('nm_order_payu.order_type', '=', 1)
            ->whereDate('nm_order_payu.order_date', '>=' , $from)
            ->get();
            
        } else {
            
            return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
            ->where('nm_order_payu.order_status', '=', 1)
            ->where('nm_order_payu.order_type', '=', 1)
            ->get();
            
        }
            
    }

    
    public static function product_failedrep_payu($from_date, $to_date)
    {
        $from = date("Y-m-d H:i:s", strtotime($from_date));
        $to   = date("Y-m-d H:i:s", strtotime($to_date));
        if ($from != '' & $to != '') {
            return DB::table('nm_order_payu')
            ->orderBy('order_date', 'desc')
            //->groupBy('nm_order_payu.transaction_id')
            ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
            ->where('nm_order_payu.order_status', '=', 4)
            ->where('nm_order_payu.order_type', '=', 1)
            ->whereBetween('nm_order_payu.order_date', array(
                $from,
                $to
            ))->get();
        } 
    }

/*Transcation -> Product COD */
    public static function product_codrep($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
		
		
       if ($from_date != '' & $to_date != '') {
             return DB::table('nm_ordercod')
			 ->orderBy('cod_date', 'desc')
			 ->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
			 ->where('nm_ordercod.cod_order_type', '=', 1)
			 ->where('nm_ordercod.cod_paytype','=',0)
		 	 ->whereDate('nm_ordercod.cod_date', '>=' , $from)->whereDate('nm_ordercod.cod_date', '<=' , $to)->get();
        
		} else if ($from_date == '' & $to_date != '')  {
			return DB::table('nm_ordercod')
			 ->orderBy('cod_date', 'desc')
			 ->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
			 ->where('nm_ordercod.cod_order_type', '=', 1)
			 ->where('nm_ordercod.cod_paytype','=',0)
		 	->whereDate('nm_ordercod.cod_date', '<=' , $to)->get();
			 
		} else if ($from_date != '' & $to_date == '')  {
			
			 return DB::table('nm_ordercod')
			 ->orderBy('cod_date', 'desc')
			 ->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
			 ->where('nm_ordercod.cod_order_type', '=', 1)
			 ->where('nm_ordercod.cod_paytype','=',0)
		 	 ->whereDate('nm_ordercod.cod_date', '>=' , $from)->get();
            
        }
		
	}  
    public static function product_completedrep($from_date, $to_date)
    {
        $from = date("Y-m-d H:i:s", strtotime($from_date));
        $to   = date("Y-m-d H:i:s", strtotime($to_date));
        if ($from != '' & $to != '') {
             return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->groupBy('nm_ordercod.cod_transaction_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id') ->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 1)->where('nm_ordercod.cod_order_type', '=', 1)->whereBetween('nm_ordercod.cod_date', array(
                $from,
                $to
            ))->get();
        }
    }
    
    public static function productcod_holdrep($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
             return DB::table('nm_ordercod')
			 ->orderBy('cod_date', 'desc')
			 //->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
			 ->where('nm_ordercod.cod_status', '=', 3)
			 ->where('nm_ordercod.cod_order_type', '=', 1)
			 ->whereDate('nm_ordercod.cod_date', '>=' , $from)->whereDate('nm_ordercod.cod_date', '<=' , $to)->get();
			
        }else if ($from_date == '' & $to_date != '')  {
			
			 return DB::table('nm_ordercod')
			 ->orderBy('cod_date', 'desc')
			 //->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
			 ->where('nm_ordercod.cod_status', '=', 3)
			 ->where('nm_ordercod.cod_order_type', '=', 1)
			 ->whereDate('nm_ordercod.cod_date', '<=' , $to)->get();
		
        } else if ($from_date != '' & $to_date == '')  {
			
			  return DB::table('nm_ordercod')
			 ->orderBy('cod_date', 'desc')
			 //->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
			 ->where('nm_ordercod.cod_status', '=', 3)
			 ->where('nm_ordercod.cod_order_type', '=', 1)
			 ->whereDate('nm_ordercod.cod_date', '>=' , $from)->get();
            
        }
    }
    
    public static function productcod_failedrep($from_date, $to_date)
    {
        $from = date("Y-m-d", strtotime($from_date));
        $to   = date("Y-m-d", strtotime($to_date));
        if ($from_date != '' & $to_date != '') {
             return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')
			 ->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
			 ->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 1)
			 ->whereDate('nm_ordercod.cod_date', '>=' , $from)->whereDate('nm_ordercod.cod_date', '<=' , $to)->get();
      
	  } else if ($from_date == '' & $to_date != '')  {
			
			 return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')
			 ->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
			 ->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 1)
			 ->whereDate('nm_ordercod.cod_date', '<=' , $to)->get();
            
        } else if ($from_date != '' & $to_date == '')  {
			
			 return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')
			 ->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
			 ->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 1)
			 ->whereDate('nm_ordercod.cod_date', '>=' , $from)->get();
            
        } else  {
			
			 return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')
			 ->groupBy('nm_ordercod.cod_transaction_id')
			 ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
			 ->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
			 ->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 1)
			 ->get();
            
        }
    }//productcod_failedrep
	
    /*services*/
	 public static function service_order_search($from_date, $to_date){
        if ($from_date != '' & $to_date == '') {
            return DB::table('nm_order_service')->orderBy('booking_date', 'desc')->leftjoin('nm_customer', 'nm_order_service.cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_service', 'nm_order_service.service_id', '=', 'nm_service.service_id')->where('nm_order_service.booking_date', $from_date)->get();
        }elseif ($from_date != '' & $to_date != '') {
            return DB::table('nm_order_service')->orderBy('booking_date', 'desc')->leftjoin('nm_customer', 'nm_order_service.cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_service', 'nm_order_service.service_id', '=', 'nm_service.service_id')->whereBetween('nm_order_service.booking_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    public static function get_all_service_orders(){
        return DB::table('nm_order_service')
        ->orderBy('booking_date', 'desc')->groupBy('nm_order_service.serv_transaction_id')
        ->leftjoin('nm_customer', 'nm_order_service.cus_id', '=', 'nm_customer.cus_id')
        ->leftjoin('nm_service', 'nm_order_service.service_id', '=', 'nm_service.service_id')
        ->leftjoin('nm_store','nm_order_service.store_id','=','nm_store.stor_id')
        ->get();
        //->where('nm_order_service.cod_order_type', '=', 1)
    }

    public static function get_subtotal($id)
	{
       	return DB::table('nm_order_service')
        ->leftjoin('nm_service', 'nm_order_service.service_id', '=', 'nm_service.service_id')   
        ->where('serv_transaction_id', '=', $id)->sum('nm_service.original_price');
    }
    public static function update_service_order($update, $serv_transaction_id)
    {
      
        return DB::table('nm_order_service')->where('serv_transaction_id', '=', $serv_transaction_id)->update($update);

    }

   public static function mer_service_order_search($from_date, $to_date,$mer_id){
        if ($from_date != '' & $to_date == '') {
            return DB::table('nm_order_service')->orderBy('booking_date', 'desc')
            ->leftjoin('nm_customer', 'nm_order_service.cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_service', 'nm_order_service.service_id', '=', 'nm_service.service_id')
            ->leftjoin('nm_store','nm_service.store_name','=','nm_store.stor_id')
            ->where('nm_store.stor_merchant_id','=',$mer_id)
            ->where('nm_order_service.booking_date', $from_date)->get();


        }elseif ($from_date != '' & $to_date != '') {
            return DB::table('nm_order_service')->orderBy('booking_date', 'desc')
            ->leftjoin('nm_customer', 'nm_order_service.cus_id', '=', 'nm_customer.cus_id')
            ->leftjoin('nm_service', 'nm_order_service.service_id', '=', 'nm_service.service_id')
            ->leftjoin('nm_store','nm_service.store_name','=','nm_store.stor_id')
            ->where('nm_store.stor_merchant_id','=',$mer_id)
            ->whereBetween('nm_order_service.booking_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    public static function mer_get_all_service_orders($mer_id){
        return DB::table('nm_order_service')
        ->orderBy('booking_date', 'desc')->groupBy('nm_order_service.serv_transaction_id')
        ->leftjoin('nm_customer', 'nm_order_service.cus_id', '=', 'nm_customer.cus_id')
        ->leftjoin('nm_service', 'nm_order_service.service_id', '=', 'nm_service.service_id')
        ->leftjoin('nm_store','nm_service.store_name','=','nm_store.stor_id')
        ->where('nm_store.stor_merchant_id','=',$mer_id)
        ->get();
        //->where('nm_order_service.cod_order_type', '=', 1)
    }
	
	//For Transactions Details	
	public static function get_approve_content($delStatus_id)
    {
        return DB::table('nm_order_delivery_status')
        ->where("delStatus_id","=",$delStatus_id)
        ->get();

    }
	
	public static function approve_cancel_paypal($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['cancel_status' => 2,"cancel_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_order')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 6]);
         DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => "3",'note' => $approve_or_disapprove_note, 'created_date' => date("Y-m-d H:i:s")]);

        return 0;
    }
	
	 public static function pay_to_wallet($order_id,$cust_id)
    {
        //echo $order_id;exit();
        $cust_order=DB::table('nm_order')->where("order_id","=",$order_id)->get();
        $cust_detail=DB::table('nm_customer')->select('wallet')->where("cus_id","=",$cust_id)->get();

        $customer_paid=($cust_order[0]->order_amt+$cust_order[0]->order_taxAmt+$cust_order[0]->order_shipping_amt)-($cust_order[0]->coupon_amount+$cust_order[0]->wallet_amount);
        $total_wallet_amount=$cust_detail[0]->wallet+$customer_paid;
        
        DB::table('nm_customer')->where("cus_id","=",$cust_id)->update(['wallet' => $total_wallet_amount]);
        return 0;
    }
	
	 public static function disapprove_cancel($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['cancel_status' => 4,"cancel_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_order')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 1]);
         DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => "2",'note' => $approve_or_disapprove_note, 'created_date' => date("Y-m-d H:i:s")]);
        return 0;
    }
	
    /* Deal payumoney cancel functions */

    public static function get_approve_content_payu($delStatus_id)
    {
        return DB::table('nm_order_delivery_status')
        ->where("delStatus_id","=",$delStatus_id)
        ->get();

    }
    
    public static function approve_cancel_payu($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['cancel_status' => 2,"cancel_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_order_payu')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 6]);
         DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => "2",'note' => $approve_or_disapprove_note, 'created_date' => date("Y-m-d H:i:s")]);

        return 0;
    }
    
     public static function pay_to_wallet_payu($order_id,$cust_id)
    {
        //echo $order_id;exit();
        $cust_order=DB::table('nm_order_payu')->where("order_id","=",$order_id)->get();
        $cust_detail=DB::table('nm_customer')->select('wallet')->where("cus_id","=",$cust_id)->get();

        $customer_paid=($cust_order[0]->order_amt+$cust_order[0]->order_taxAmt+$cust_order[0]->order_shipping_amt)-($cust_order[0]->coupon_amount+$cust_order[0]->wallet_amount);
        $total_wallet_amount=$cust_detail[0]->wallet+$customer_paid;
        
        DB::table('nm_customer')->where("cus_id","=",$cust_id)->update(['wallet' => $total_wallet_amount]);
        return 0;
    }
    
     public static function disapprove_cancel_payu($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['cancel_status' => 4,"cancel_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_order_payu')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 1]);
         DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => "2",'note' => $approve_or_disapprove_note, 'created_date' => date("Y-m-d H:i:s")]);
        return 0;
    }
	
 /* Deal payumoney cancel functions ends */

	public static function disapprove_cancel_cod($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['cancel_status' => 4,"cancel_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_ordercod')
        ->where('cod_id', $cod_order_id)
        ->update(['delivery_status' => 1]);
         DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => "2",'note' => $approve_or_disapprove_note, 'created_date' => date("Y-m-d H:i:s")]);
        return 0;
    }
	
	public static function get_return_order_paypal($payment_type,$product_type,$from_date,$to_date){
        //DB::connection()->enableQueryLog();

        $sql= DB::table('nm_order_delivery_status')
        ->orderBy('delStatus_id', 'desc')
        ->leftjoin('nm_order', 'nm_order_delivery_status.order_id', '=', 'nm_order.order_id');
        
       // ->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id');
        if($product_type==1)
            $sql->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id');
        if($product_type==2)
            $sql->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id');
       
        $sql->where('nm_order_delivery_status.order_type','=',$product_type)        
        ->where('nm_order_delivery_status.payment_type','=',$payment_type)
        ->where('nm_order_delivery_status.return_status','!=','0');
       /*  if($from_date!="" AND $to_date!="")
        {
            $sql->whereBetween('nm_order_delivery_status.return_date',[$from_date, $to_date]);
        } */
       // $sql->groupby('nm_order_delivery_status.mer_id');
        return $sql->get();

        /*$query = DB::getQueryLog();
        print_r($query);*/

    }

	 public static function approve_return_paypal($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['return_status' => 2,"return_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_order')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 8]);

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id ,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);

        return 0;
    }
	
	public static function disapprove_return_paypal($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['return_status' => 2,"return_approved_date"=>date("Y-m-d H:i:s")]);

        DB::table('nm_order')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 4]); //delivery status reset as delivered

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);
        return 0;

    }
	
	public static function get_replace_order_paypal($payment_type,$product_type,$from_date,$to_date){

        $sql= DB::table('nm_order_delivery_status')
        ->orderBy('delStatus_id', 'desc')
        ->leftjoin('nm_order', 'nm_order_delivery_status.order_id', '=', 'nm_order.order_id')
        
        ->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id');
        if($product_type==1)
            $sql->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id');
        if($product_type==2)
            $sql->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id');
        
        $sql->where('nm_order_delivery_status.order_type','=',$product_type)
        ->where('nm_order_delivery_status.payment_type','=',$payment_type)
        ->where('nm_order_delivery_status.replace_status','!=','0');
        /* if($from_date!="" AND $to_date!="")
        {
            $sql->whereBetween('nm_order_delivery_status.replace_date',[$from_date, $to_date]);
        } */ return $sql->get();
        //return $sql->groupby('nm_order_delivery_status.mer_id')
       // ->get();

    }
	
	public static function approve_replace_paypal($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['replace_status' => 2,"replace_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_order')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 10]);

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);

        return 0;
    }
	
	public static function approve_replace_cod($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['replace_status' => 2,"replace_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_ordercod')
        ->where('cod_id', $cod_order_id)
        ->update(['delivery_status' => 10]);

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);

        return 0;
    }
	
	public static function disapprove_replace_paypal($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['replace_status' => 2,"replace_approved_date"=>date("Y-m-d H:i:s")]);

        DB::table('nm_order')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 4]); //delivery status reset as delivered

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);
        return 0;

    }
	
	public static function disapprove_replace_cod($delStatus_id,$cod_order_id,$note,$mer_id,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['replace_status' => 2,"replace_approved_date"=>date("Y-m-d H:i:s")]);

        DB::table('nm_ordercod')
        ->where('cod_id', $cod_order_id)
        ->update(['delivery_status' => 4]); //delivery status reset as delivered

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'mer_id' => $mer_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);
        return 0;

    }
	
	
	public static function get_calceled_order($payment_type,$product_type,$from_date,$to_date){

        $sql= DB::table('nm_order_delivery_status')
        ->orderBy('delStatus_id', 'desc')
        ->leftjoin('nm_ordercod', 'nm_order_delivery_status.cod_order_id', '=', 'nm_ordercod.cod_id')
        
        ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id');
         if($product_type==1)
            $sql->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id');
        if($product_type==2)
            $sql->join('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id');
         

        $sql->where('nm_order_delivery_status.order_type','=',$product_type)
        ->where('nm_order_delivery_status.payment_type','=',$payment_type)
        ->where('nm_order_delivery_status.cancel_status','!=','0');
	
        return $sql->get();

    }
	
	/* public static function get_calceled_order_alltype($from_date,$to_date){
		
        $sql= DB::table('nm_ordercod')
					->orderBy('cod_id', 'desc')
					->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
					->leftjoin('nm_merchant', 'nm_ordercod.cod_merchant_id', '=', 'nm_merchant.mer_id')
					->where('nm_ordercod.cod_order_type','=',1)
					->where('nm_ordercod.cod_paytype','=',0)
					->whereIn('nm_ordercod.delivery_status',array(5,6));
					
					$fr_date = date('Y-m-d',strtotime($from_date));
					$t_date = date('Y-m-d',strtotime($to_date));
					if($from_date!="" AND $to_date!="")
					{
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);	
					}
					
					return $sql->get();
			
    } */
	
	public static function get_calceled_order_alltype($from_date,$to_date){
		
        $sql= DB::table('nm_ordercod')
					->orderBy('cod_id', 'desc')
					->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
					->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.cod_order_id', '=', 'nm_ordercod.cod_id')
					->where('nm_ordercod.cod_order_type','=',1)
					->where('nm_ordercod.cod_paytype','=',0)
					->whereIn('nm_ordercod.delivery_status',array(5,6));
					
					$fr_date = date('Y-m-d',strtotime($from_date));
					$t_date = date('Y-m-d',strtotime($to_date));
					if($from_date!="" AND $to_date!="")
					{
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);	
					}
					
					return $sql->get();
			
    }
	
	public static function get_return_order_alltype($from_date,$to_date){
		
        $sql= DB::table('nm_ordercod')
					->orderBy('cod_id', 'desc')
					->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
					->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.cod_order_id', '=', 'nm_ordercod.cod_id')
					->where('nm_ordercod.cod_order_type','=',1)
					->where('nm_ordercod.cod_paytype','=',0)
					->whereIn('nm_ordercod.delivery_status',array(7,8));
					
					$fr_date = date('Y-m-d',strtotime($from_date));
					$t_date = date('Y-m-d',strtotime($to_date)); 
					if($from_date!="" & $to_date!="")
					{
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);	
					}
					
					return $sql->get();
			
    }
	
	public static function get_replace_order_alltype($from_date,$to_date){
		
        $sql= DB::table('nm_ordercod')
					->orderBy('cod_id', 'desc')
					->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
					->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.cod_order_id', '=', 'nm_ordercod.cod_id')
					->where('nm_ordercod.cod_order_type','=',1)
					->where('nm_ordercod.cod_paytype','=',0)
					->whereIn('nm_ordercod.delivery_status',array(9,10));
					
					$fr_date = date('Y-m-d',strtotime($from_date)); 
					$t_date = date('Y-m-d',strtotime($to_date));  
					if($from_date!="" & $to_date!="") 
					{ 
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);	
					}

					return $sql->get();
			
    }
	
	public static function calceled_order_allpaypal($from_date,$to_date){
		
         $sql= DB::table('nm_order')
					->orderBy('order_id', 'desc')
					->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
					->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order.order_id')
					->select('nm_order.*', 'nm_customer.*', 'nm_product.*', 'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.cancel_status','nm_order_delivery_status.delStatus_id')
					->where('nm_order.order_type','=',1)
					->whereIn('nm_order.order_paytype',array(1,2))
					->whereIn('nm_order.delivery_status',array(5,6)); 
					
					$fr_date = date('Y-m-d',strtotime($from_date)); 
					$t_date = date('Y-m-d',strtotime($to_date));  
					if($from_date!="" & $to_date!="") 
					{ 
					$sql->whereDate('nm_order.order_date', '>=' , $fr_date);
					$sql->whereDate('nm_order.order_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_order.order_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_order.order_date', '>=' , $fr_date);	
					}

					return $sql->get();
					
			
    }
	
	public static function returned_order_allpaypal($from_date,$to_date){
		
         $sql= DB::table('nm_order')
					->orderBy('order_id', 'desc')
					->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
					->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order.order_id')
					->select('nm_order.*', 'nm_customer.*', 'nm_product.*', 'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.return_status','nm_order_delivery_status.delStatus_id')
					->where('nm_order.order_type','=',1)
					//->where('nm_order.order_paytype','=',1) //2 for wallet
					->whereIn('nm_order.order_paytype',array(1,2))
					->whereIn('nm_order.delivery_status',array(7,8)); 
					
					
					$fr_date = date('Y-m-d',strtotime($from_date)); 
					$t_date = date('Y-m-d',strtotime($to_date));  
					if($from_date!="" & $to_date!="") 
					{ 
					$sql->whereDate('nm_order.order_date', '>=' , $fr_date);
					$sql->whereDate('nm_order.order_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_order.order_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_order.order_date', '>=' , $fr_date);	
					}

					return $sql->get();
			
    }
	
	public static function replace_order_allpaypal($from_date,$to_date){
		
         $sql= DB::table('nm_order')
					->orderBy('order_id', 'desc')
					->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
					->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order.order_id')
					->select('nm_order.*', 'nm_customer.*', 'nm_product.*', 'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.replace_status','nm_order_delivery_status.delStatus_id')
					->where('nm_order.order_type','=',1)
					//->where('nm_order.order_paytype','=',1)  //2 for wallet
					->whereIn('nm_order.order_paytype',array(1,2)) 
					->whereIn('nm_order.delivery_status',array(9,10));
					
					$fr_date = date('Y-m-d',strtotime($from_date)); 
					$t_date = date('Y-m-d',strtotime($to_date));  
					if($from_date!="" & $to_date!="") 
					{ 
					$sql->whereDate('nm_order.order_date', '>=' , $fr_date);
					$sql->whereDate('nm_order.order_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_order.order_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_order.order_date', '>=' , $fr_date);	
					}

					return $sql->get();
			
    }
	
	public static function calceled_dealorder_allpaypal($from_date,$to_date){
		
        $sql= DB::table('nm_order')
					->orderBy('order_id', 'desc')
					->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
					->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order.order_id')
					->select('nm_order.*', 'nm_customer.*', 'nm_deals.*',  'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.cancel_status','nm_order_delivery_status.delStatus_id')
					->where('nm_order.order_type','=',2)
					//->where('nm_order.order_paytype','=',1) //2 for wallet
					->whereIn('nm_order.order_paytype',array(1,2)) 
					->whereIn('nm_order.delivery_status',array(5,6)); 
					
					$fr_date = date('Y-m-d',strtotime($from_date)); 
					$t_date = date('Y-m-d',strtotime($to_date));  
					if($from_date!="" & $to_date!="") 
					{ 
					$sql->whereDate('nm_order.order_date', '>=' , $fr_date);
					$sql->whereDate('nm_order.order_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_order.order_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_order.order_date', '>=' , $fr_date);	
					}

					return $sql->get();
			
    }
	
	public static function returned_dealorder_allpaypal($from_date,$to_date){
		
        $sql= DB::table('nm_order')
					->orderBy('order_id', 'desc')
					->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
					->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order.order_id')
					->select('nm_order.*', 'nm_customer.*', 'nm_deals.*',  'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.return_status','nm_order_delivery_status.delStatus_id')
					->where('nm_order.order_type','=',2)
					//->where('nm_order.order_paytype','=',1)
					->whereIn('nm_order.order_paytype',array(1,2)) 
					->whereIn('nm_order.delivery_status',array(7,8)); 
					
					$fr_date = date('Y-m-d',strtotime($from_date)); 
					$t_date = date('Y-m-d',strtotime($to_date));  
					if($from_date!="" & $to_date!="") 
					{ 
					$sql->whereDate('nm_order.order_date', '>=' , $fr_date);
					$sql->whereDate('nm_order.order_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_order.order_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_order.order_date', '>=' , $fr_date);	
					}

					return $sql->get();
			
    }
    public static function returned_dealorder_allpayumoney($from_date,$to_date){
        
        $sql= DB::table('nm_order_payu')
                    ->orderBy('order_id', 'desc')
                    ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
                    ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
                    ->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order_payu.order_id')
                    ->select('nm_order_payu.*', 'nm_customer.*', 'nm_deals.*', 'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.return_status','nm_order_delivery_status.delStatus_id')
                    ->where('nm_order_payu.order_type','=',2)
                    //->where('nm_order_payu.order_paytype','=',1)
                    ->whereIn('nm_order_payu.order_paytype',array(1,2)) 
                    ->whereIn('nm_order_payu.delivery_status',array(7,8)); 
                    
                    $fr_date = date('Y-m-d',strtotime($from_date)); 
                    $t_date = date('Y-m-d',strtotime($to_date));  
                    if($from_date!="" & $to_date!="") 
                    { 
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date == '' & $to_date != '')  {
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date != '' & $to_date == '')  {
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);    
                    }

                    return $sql->get();
            
    }
	
	public static function replace_dealorder_allpaypal($from_date,$to_date){
		
        $sql= DB::table('nm_order')
					->orderBy('order_id', 'desc')
					->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
					->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order.order_id')
					->select('nm_order.*', 'nm_customer.*', 'nm_deals.*', 'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.replace_status','nm_order_delivery_status.delStatus_id')
					->where('nm_order.order_type','=',2)
					//->where('nm_order.order_paytype','=',1)
					->whereIn('nm_order.order_paytype',array(1,2)) 
					->whereIn('nm_order.delivery_status',array(9,10)); 
					$fr_date = date('Y-m-d',strtotime($from_date)); 
					$t_date = date('Y-m-d',strtotime($to_date));  
					if($from_date!="" & $to_date!="") 
					{ 
					$sql->whereDate('nm_order.order_date', '>=' , $fr_date);
					$sql->whereDate('nm_order.order_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_order.order_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_order.order_date', '>=' , $fr_date);	
					}

					return $sql->get();
			
    }
	
	public static function calceled_dealorder_allcod($from_date,$to_date){
		
         $sql= DB::table('nm_ordercod')
					->orderBy('cod_id', 'desc')
					->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
					->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.cod_order_id', '=', 'nm_ordercod.cod_id')
					->where('nm_ordercod.cod_order_type','=',2)
					->where('nm_ordercod.cod_paytype','=',0)
					->whereIn('nm_ordercod.delivery_status',array(5,6)); 
					
					$fr_date = date('Y-m-d',strtotime($from_date)); 
					$t_date = date('Y-m-d',strtotime($to_date));  
					if($from_date!="" & $to_date!="") 
					{ 
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);	
					}

					return $sql->get();
			
    }
	
	public static function returned_dealorder_allcod($from_date,$to_date){
		
         $sql= DB::table('nm_ordercod')
					->orderBy('cod_id', 'desc')
					->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
					->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.cod_order_id', '=', 'nm_ordercod.cod_id')
					->where('nm_ordercod.cod_order_type','=',2)
					->where('nm_ordercod.cod_paytype','=',0)
					->whereIn('nm_ordercod.delivery_status',array(7,8)); 
					
					$fr_date = date('Y-m-d',strtotime($from_date)); 
					$t_date = date('Y-m-d',strtotime($to_date));  
					if($from_date!="" & $to_date!="") 
					{ 
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);	
					}

					return $sql->get();
			
    }
	
	public static function replace_dealorder_allcod($from_date,$to_date){
		
        $sql = DB::table('nm_ordercod')
					->orderBy('cod_id', 'desc')
					->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
					->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
					->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.cod_order_id', '=', 'nm_ordercod.cod_id')
					->where('nm_ordercod.cod_order_type','=',2)
					->where('nm_ordercod.cod_paytype','=',0)
					->whereIn('nm_ordercod.delivery_status',array(9,10)); 
					
					$fr_date = date('Y-m-d',strtotime($from_date)); 
					$t_date = date('Y-m-d',strtotime($to_date));  
					if($from_date!="" & $to_date!="") 
					{ 
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date == '' & $to_date != '')  {
					$sql->whereDate('nm_ordercod.cod_date', '<=' , $t_date);
					} else if ($from_date != '' & $to_date == '')  {
					$sql->whereDate('nm_ordercod.cod_date', '>=' , $fr_date);	
					}

					return $sql->get();
			
    }
	
	public static function approve_cancel($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['cancel_status' => 2,"cancel_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_order')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 6]);
         DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => "2",'note' => $approve_or_disapprove_note, 'created_date' => date("Y-m-d H:i:s")]);

        return 0;
    }
	
	public static function approve_cancel_cod($delStatus_id,$cod_order_id,$approve_or_disapprove_note,$cust_id,$admin_id)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['cancel_status' => 2,"cancel_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_ordercod')
        ->where('cod_id', $cod_order_id)
        ->update(['delivery_status' => 6]);
         DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => "2",'note' => $approve_or_disapprove_note, 'created_date' => date("Y-m-d H:i:s")]);

        return 0;
    }

	
	 public static function get_return_order($payment_type,$product_type,$from_date,$to_date){

        $sql= DB::table('nm_order_delivery_status')
        ->orderBy('delStatus_id', 'desc')
        ->leftjoin('nm_ordercod', 'nm_order_delivery_status.cod_order_id', '=', 'nm_ordercod.cod_id')
        
        ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id');
        if($product_type==1)
            $sql->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id');
        if($product_type==2)
            $sql->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id');
         $sql->where('nm_order_delivery_status.order_type','=',$product_type)
        ->where('nm_order_delivery_status.payment_type','=',$payment_type)
        ->where('nm_order_delivery_status.return_status','!=','0');
       
	  /*  if($from_date!="" AND $to_date!="")
        {
            $sql->whereBetween('nm_order_delivery_status.return_date',[$from_date, $to_date]);
        }  */ 
		return $sql->get();
       // return $sql->groupby('nm_order_delivery_status.mer_id')
      //  ->get();

    }
	
	 public static function approve_return($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['return_status' => 2,"return_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_ordercod')
        ->where('cod_id', $cod_order_id)
        ->update(['delivery_status' => 8]);

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);

        return 0;
    }
	
	public static function pay_to_wallet_cod($order_id,$cust_id)
	{
        $cust_order=DB::table('nm_ordercod')->where("cod_id","=",$order_id)->get();
        $cust_detail=DB::table('nm_customer')->select('wallet')->where("cus_id","=",$cust_id)->get();

        $customer_paid=($cust_order[0]->cod_amt+$cust_order[0]->cod_taxAmt+$cust_order[0]->cod_shipping_amt)-($cust_order[0]->coupon_amount+$cust_order[0]->wallet_amount);
        $total_wallet_amount=$cust_detail[0]->wallet+$customer_paid;
        
        DB::table('nm_customer')->where("cus_id","=",$cust_id)->update(['wallet' => $total_wallet_amount]);
        return 0;
    }
	
	public static function disapprove_return($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
         DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['return_status' => 2,"return_approved_date"=>date("Y-m-d H:i:s")]);

        DB::table('nm_ordercod')
        ->where('cod_id', $cod_order_id)
        ->update(['delivery_status' => 4]); //delivery status reset as delivered

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);
        return 0;

    }
	 public static function get_replace_order($payment_type,$product_type,$from_date,$to_date){

        $sql= DB::table('nm_order_delivery_status')
        ->orderBy('delStatus_id', 'desc')
        ->leftjoin('nm_ordercod', 'nm_order_delivery_status.cod_order_id', '=', 'nm_ordercod.cod_id')
        
        ->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id');
		 if($product_type==1)
			$sql->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id');
		 if($product_type==2)
			$sql->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id');
         

        $sql->where('nm_order_delivery_status.order_type','=',$product_type)
        ->where('nm_order_delivery_status.payment_type','=',$payment_type)
        ->where('nm_order_delivery_status.replace_status','!=','0');
		
        /* if($from_date!="" AND $to_date!="")
        {
            $sql->whereBetween('nm_order_delivery_status.replace_date',[$from_date, $to_date]);
        } */ return $sql->get();
      //  return $sql->groupby('nm_order_delivery_status.mer_id')
       // ->get();

    }
	
	 public static function approve_replace($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['replace_status' => 2,"replace_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_ordercod')
        ->where('cod_id', $cod_order_id)
        ->update(['delivery_status' => 10]);

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);

        return 0;
    }
	
	public static function disapprove_replace($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['replace_status' => 2,"replace_approved_date"=>date("Y-m-d H:i:s")]);

        DB::table('nm_ordercod')
        ->where('cod_id', $cod_order_id)
        ->update(['delivery_status' => 4]); //delivery status reset as delivered

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);
        return 0;

    }
	
	 public static function get_calceled_order_paypal($payment_type,$product_type,$from_date,$to_date){
      // DB::connection()->enableQueryLog();
       // echo $from_date;exit();
        $sql= DB::table('nm_order_delivery_status')
        ->orderBy('delStatus_id', 'desc')
        ->join('nm_order', 'nm_order_delivery_status.order_id', '=', 'nm_order.order_id')
		
		->join('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id');
        if($product_type==1)
            $sql->join('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id');
        if($product_type==2)
            $sql->join('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id');
        $sql->where('nm_order_delivery_status.order_type','=',$product_type)
        ->where('nm_order_delivery_status.payment_type','=',$payment_type)
        ->where('nm_order_delivery_status.cancel_status','!=','0');
        
		/* if($from_date!="" AND $to_date!="")
        {
            $fr_date = date('Y-m-d H:i:s',strtotime($from_date));
            $t_date = date('Y-m-d H:i:s',strtotime($to_date));
            $sql->whereBetween('nm_order_delivery_status.cancel_date',[$fr_date, $t_date]);
        } */
        //$sql->groupby('nm_order_delivery_status.mer_id');
        return $sql->get();
        /*$query = DB::getQueryLog();
        print_r($query);exit();*/
    }
	
     /* Deal Payumoney cancel,return,replace */

     public static function get_canceled_order_payu($payment_type,$product_type,$from_date,$to_date){
      // DB::connection()->enableQueryLog();
       // echo $from_date;exit();
        $sql= DB::table('nm_order_delivery_status')
        ->orderBy('delStatus_id', 'desc')
        ->join('nm_order_payu', 'nm_order_delivery_status.order_id', '=', 'nm_order_payu.order_id')
        
        ->join('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id');
        if($product_type==1)
            $sql->join('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id');
        if($product_type==2)
            $sql->join('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id');
       
        $sql->where('nm_order_delivery_status.order_type','=',$product_type)
        ->where('nm_order_delivery_status.payment_type','=',$payment_type)
        ->where('nm_order_delivery_status.cancel_status','!=','0');
        
        /* if($from_date!="" AND $to_date!="")
        {
            $fr_date = date('Y-m-d H:i:s',strtotime($from_date));
            $t_date = date('Y-m-d H:i:s',strtotime($to_date));
            $sql->whereBetween('nm_order_delivery_status.cancel_date',[$fr_date, $t_date]);
        } */
        //$sql->groupby('nm_order_delivery_status.mer_id');
        return $sql->get();
        /*$query = DB::getQueryLog();
        print_r($query);exit();*/
    }

    public static function canceled_dealorder_allpayu($from_date,$to_date){
        
        $sql= DB::table('nm_order_payu')
                    ->orderBy('order_id', 'desc')
                    ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
                    ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
                    ->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order_payu.order_id')
                    ->select('nm_order_payu.*', 'nm_customer.*', 'nm_deals.*',  'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.cancel_status','nm_order_delivery_status.delStatus_id')
                    ->where('nm_order_payu.order_type','=',2)
                    //->where('nm_order_payu.order_paytype','=',1) //2 for wallet
                    ->whereIn('nm_order_payu.order_paytype',array(1,2)) 
                    ->whereIn('nm_order_payu.delivery_status',array(5,6)); 
                    
                    $fr_date = date('Y-m-d',strtotime($from_date)); 
                    $t_date = date('Y-m-d',strtotime($to_date));  
                    if($from_date!="" & $to_date!="") 
                    { 
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date == '' & $to_date != '')  {
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date != '' & $to_date == '')  {
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);    
                    }

                    return $sql->get();
            
    }
    public static function get_return_order_payu($payment_type,$product_type,$from_date,$to_date){
        //DB::connection()->enableQueryLog();

        $sql= DB::table('nm_order_delivery_status')
        ->orderBy('delStatus_id', 'desc')
        ->leftjoin('nm_order_payu', 'nm_order_delivery_status.order_id', '=', 'nm_order_payu.order_id')
        
        ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id');
        if($product_type==1)
            $sql->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id');
        if($product_type==2)
            $sql->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id');
        $sql->where('nm_order_delivery_status.order_type','=',$product_type)        
        ->where('nm_order_delivery_status.payment_type','=',$payment_type)
        ->where('nm_order_delivery_status.return_status','!=','0');
       /*  if($from_date!="" AND $to_date!="")
        {
            $sql->whereBetween('nm_order_delivery_status.return_date',[$from_date, $to_date]);
        } */
       // $sql->groupby('nm_order_delivery_status.mer_id');
        return $sql->get();

        /*$query = DB::getQueryLog();
        print_r($query);*/

    }

    public static function returned_dealorder_allpayu($from_date,$to_date){
        
        $sql= DB::table('nm_order_payu')
                    ->orderBy('order_id', 'desc')
                    ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
                    ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
                    ->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order_payu.order_id')
                    ->select('nm_order_payu.*', 'nm_customer.*', 'nm_deals.*',  'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.return_status','nm_order_delivery_status.delStatus_id')
                    ->where('nm_order_payu.order_type','=',2)
                    //->where('nm_order_payu.order_paytype','=',1)
                    ->whereIn('nm_order_payu.order_paytype',array(1,2)) 
                    ->whereIn('nm_order_payu.delivery_status',array(7,8)); 
                    
                    $fr_date = date('Y-m-d',strtotime($from_date)); 
                    $t_date = date('Y-m-d',strtotime($to_date));  
                    if($from_date!="" & $to_date!="") 
                    { 
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date == '' & $to_date != '')  {
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date != '' & $to_date == '')  {
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);    
                    }

                    return $sql->get();
            
    }

    public static function approve_return_payu($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['return_status' => 2,"return_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_order_payu')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 8]);

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);

        return 0;
    }
    
    public static function disapprove_return_payu($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['return_status' => 2,"return_approved_date"=>date("Y-m-d H:i:s")]);

        DB::table('nm_order_payu')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 4]); //delivery status reset as delivered

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);
        return 0;

    }

    /* replacement order */
    public static function get_replace_order_payu($payment_type,$product_type,$from_date,$to_date){

        $sql= DB::table('nm_order_delivery_status')
        ->orderBy('delStatus_id', 'desc')
        ->leftjoin('nm_order_payu', 'nm_order_delivery_status.order_id', '=', 'nm_order_payu.order_id')
        
        ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id');
        if($product_type==1)
            $sql->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id');
        if($product_type==2)
            $sql->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id');
         $sql->where('nm_order_delivery_status.order_type','=',$product_type)
        ->where('nm_order_delivery_status.payment_type','=',$payment_type)
        ->where('nm_order_delivery_status.replace_status','!=','0');
        /* if($from_date!="" AND $to_date!="")
        {
            $sql->whereBetween('nm_order_delivery_status.replace_date',[$from_date, $to_date]);
        } */ return $sql->get();
        //return $sql->groupby('nm_order_delivery_status.mer_id')
       // ->get();

    }

    public static function replace_dealorder_allpayu($from_date,$to_date){
        
        $sql= DB::table('nm_order_payu')
                    ->orderBy('order_id', 'desc')
                    ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
                    ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
                    ->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order_payu.order_id')
                    ->select('nm_order_payu.*', 'nm_customer.*', 'nm_deals.*', 'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.replace_status','nm_order_delivery_status.delStatus_id')
                    ->where('nm_order_payu.order_type','=',2)
                    //->where('nm_order_payu.order_paytype','=',1)
                    ->whereIn('nm_order_payu.order_paytype',array(1,2)) 
                    ->whereIn('nm_order_payu.delivery_status',array(9,10)); 
                    $fr_date = date('Y-m-d',strtotime($from_date)); 
                    $t_date = date('Y-m-d',strtotime($to_date));  
                    if($from_date!="" & $to_date!="") 
                    { 
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date == '' & $to_date != '')  {
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date != '' & $to_date == '')  {
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);    
                    }

                    return $sql->get();
            
    }
    public static function approve_replace_payu($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['replace_status' => 2,"replace_approved_date"=>date("Y-m-d H:i:s")]);
        DB::table('nm_order_payu')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 10]);

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);

        return 0;
    }

    public static function disapprove_replace_payu($delStatus_id,$cod_order_id,$note,$cust_id,$admin_id,$send_by)
    {
        DB::table('nm_order_delivery_status')
        ->where('delStatus_id', $delStatus_id)
        ->update(['replace_status' => 2,"replace_approved_date"=>date("Y-m-d H:i:s")]);

        DB::table('nm_order_payu')
        ->where('order_id', $cod_order_id)
        ->update(['delivery_status' => 4]); //delivery status reset as delivered

        DB::table('delivery_status_chat')->insert(['delStatus_id' => $delStatus_id,'cust_id' => $cust_id,'admin_id' => $admin_id,'send_by' => $send_by,'note' => $note, 'created_date' => date("Y-m-d H:i:s")]);
        return 0;

    }

    /* Deal Payumoney cancel,return,replace ends  */

    /* Product payumoney cancel,return,replace starts */

    public static function calceled_order_allpayu($from_date,$to_date){
        
         $sql= DB::table('nm_order_payu')
                    ->orderBy('order_id', 'desc')
                    ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
                    ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
                    ->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order_payu.order_id')
                    ->select('nm_order_payu.*', 'nm_customer.*', 'nm_product.*',  'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.cancel_status','nm_order_delivery_status.delStatus_id')
                    ->where('nm_order_payu.order_type','=',1)
                    ->whereIn('nm_order_payu.order_paytype',array(1,2))
                    ->whereIn('nm_order_payu.delivery_status',array(5,6)); 
                    
                    $fr_date = date('Y-m-d',strtotime($from_date)); 
                    $t_date = date('Y-m-d',strtotime($to_date));  
                    if($from_date!="" & $to_date!="") 
                    { 
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date == '' & $to_date != '')  {
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date != '' & $to_date == '')  {
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);    
                    }

                    return $sql->get();
                    
            
    }

    public static function returned_order_allpayu($from_date,$to_date){
        
         $sql= DB::table('nm_order_payu')
                    ->orderBy('order_id', 'desc')
                    ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
                    ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
                    ->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order_payu.order_id')
                    ->select('nm_order_payu.*', 'nm_customer.*', 'nm_product.*',  'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.return_status','nm_order_delivery_status.delStatus_id')
                    ->where('nm_order_payu.order_type','=',1)
                    //->where('nm_order_payu.order_paytype','=',1) //2 for wallet
                    ->whereIn('nm_order_payu.order_paytype',array(1,2))
                    ->whereIn('nm_order_payu.delivery_status',array(7,8)); 
                    //->where('nm_order_delivery_status.order_type','=',1);
                    
                    $fr_date = date('Y-m-d',strtotime($from_date)); 
                    $t_date = date('Y-m-d',strtotime($to_date));  
                    if($from_date!="" & $to_date!="") 
                    { 
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date == '' & $to_date != '')  {
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date != '' & $to_date == '')  {
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);    
                    }

                    return $sql->get();
            
    }
    
    public static function replace_order_allpayu($from_date,$to_date){
        
         $sql= DB::table('nm_order_payu')
                    ->orderBy('order_id', 'desc')
                    ->leftjoin('nm_customer', 'nm_order_payu.order_cus_id', '=', 'nm_customer.cus_id')
                    ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
                    ->leftjoin('nm_order_delivery_status', 'nm_order_delivery_status.order_id', '=', 'nm_order_payu.order_id')
                    ->select('nm_order_payu.*', 'nm_customer.*', 'nm_product.*', 'nm_order_delivery_status.order_id as paypal_order_id', 'nm_order_delivery_status.replace_status','nm_order_delivery_status.delStatus_id')
                    ->where('nm_order_payu.order_type','=',1)
                    //->where('nm_order_payu.order_paytype','=',1)  //2 for wallet
                    ->whereIn('nm_order_payu.order_paytype',array(1,2)) 
                    ->whereIn('nm_order_payu.delivery_status',array(9,10));
                    
                    $fr_date = date('Y-m-d',strtotime($from_date)); 
                    $t_date = date('Y-m-d',strtotime($to_date));  
                    if($from_date!="" & $to_date!="") 
                    { 
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date == '' & $to_date != '')  {
                    $sql->whereDate('nm_order_payu.order_date', '<=' , $t_date);
                    } else if ($from_date != '' & $to_date == '')  {
                    $sql->whereDate('nm_order_payu.order_date', '>=' , $fr_date);    
                    }

                    return $sql->get();
            
    }


    /* Product payumoney cancel,return,replace ends */

	 public static function update_cod_status_admin($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_ordercod')->where('cod_id', '=', $orderid)->where('cod_pro_id', '=', $proid)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $orderid)->where('cod_pro_id', '=', $proid)->update(array(
            'delivery_status' => $status
            ));
        }
    }
	
	public static function getdetails_customer($orderid)
	{
		return DB::table('nm_ordercod')->Join('nm_product', 'nm_product.pro_id', '=', 'nm_ordercod.cod_pro_id')->Join('nm_customer', 'nm_customer.cus_id', '=', 'nm_ordercod.cod_cus_id')->where('nm_ordercod.cod_transaction_id', '=', $orderid)->get();
	}
	
	public static function getdetails_customer_deal($orderid)
	{
		return DB::table('nm_ordercod')->Join('nm_deals', 'nm_deals.deal_id', '=', 'nm_ordercod.cod_pro_id')->Join('nm_customer', 'nm_customer.cus_id', '=', 'nm_ordercod.cod_cus_id')->where('nm_ordercod.cod_transaction_id', '=', $orderid)->get();
	}
	
	public static function getdetails_customer_paypal($orderid)
	{
		return DB::table('nm_order')->Join('nm_product', 'nm_product.pro_id', '=', 'nm_order.order_pro_id')->Join('nm_customer', 'nm_customer.cus_id', '=', 'nm_order.order_cus_id')->where('nm_order.transaction_id', '=', $orderid)->get();
	}

    /* customer details product payumoney */
    public static function getdetails_customer_payumoney($orderid)
    {
        return DB::table('nm_order_payu')->Join('nm_product', 'nm_product.pro_id', '=', 'nm_order_payu.order_pro_id')->Join('nm_customer', 'nm_customer.cus_id', '=', 'nm_order_payu.order_cus_id')->where('nm_order_payu.transaction_id', '=', $orderid)->get();
    }
	
	public static function getdetails_customer_paypal_deal($orderid)
	{
		return DB::table('nm_order')->Join('nm_deals', 'nm_deals.deal_id', '=', 'nm_order.order_pro_id')->Join('nm_customer', 'nm_customer.cus_id', '=', 'nm_order.order_cus_id')->where('nm_order.transaction_id', '=', $orderid)->get();
	}

    /* customer details deal payumoney */
    public static function getdetails_customer_payumoney_deal($orderid)
    {
        return DB::table('nm_order_payu')->Join('nm_deals', 'nm_deals.deal_id', '=', 'nm_order_payu.order_pro_id')->Join('nm_customer', 'nm_customer.cus_id', '=', 'nm_order_payu.order_cus_id')->where('nm_order_payu.transaction_id', '=', $orderid)->get();
    }
	
	 public static function update_cod_status_and_delivery($status, $orderid,$proid,$pay_status)
    {
        if(is_int($orderid)) {
            return DB::table('nm_ordercod')->where('cod_id', '=', $orderid)->where('cod_pro_id', '=', $proid)->update(array(
            'delivery_status' => $status,
            'cod_status' => $pay_status
            ));
        } else {
            return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $orderid)->where('cod_pro_id', '=', $proid)->update(array(
            'delivery_status' => $status,
            'cod_status' => $pay_status
            ));
        }
    }
	
	 public static function update_cod_status_and_cancel($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_ordercod')->where('cod_id', '=', $orderid)->where('cod_pro_id', '=', $proid)->update(array(
            'delivery_status' => $status,
            ));
        } else {
            return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $orderid)->where('cod_pro_id', '=', $proid)->update(array(
            'delivery_status' => $status,
            ));
        }
    }
    
    public static function update_cod_status_and_returned($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_ordercod')->where('cod_id', '=', $orderid)->where('cod_pro_id', '=', $proid)->update(array(
            'delivery_status' => $status,
            ));
        } else {
            return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $orderid)->where('cod_pro_id', '=', $proid)->update(array(
            'delivery_status' => $status,
            ));
        }
    }
	
	 public static function update_cod_status_and_replaced($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_ordercod')->where('cod_id', '=', $orderid)->where('cod_pro_id', '=', $proid)->update(array(
            'delivery_status' => $status,
            ));
        } else {
            return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $orderid)->where('cod_pro_id', '=', $proid)->update(array(
            'delivery_status' => $status,
            ));
        }
    }
	
	 public static function update_paypal_status($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        }
    }
    
    public static function update_paypal_status_cancel($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        }
    }
	
	public static function update_paypal_status_returned($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        }
    }
    
	 public static function update_paypal_status_replaced($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        }
    }
	

    /* Update product payumoney status  starts */

     public static function update_payumoney_status($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order_payu')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order_payu')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        }
    }
    
    public static function update_payumoney_status_cancel($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order_payu')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array('delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order_payu')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        }
    }
    
    public static function update_payumoney_status_returned($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order_payu')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order_payu')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        }
    }
    
     public static function update_payumoney_status_replaced($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order_payu')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order_payu')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 1)->update(array(
            'delivery_status' => $status
            ));
        }
    }
     
    /* update product payumoney ends */

	 public static function update_deal_paypal_status($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        }
    }
    
    public static function update_deal_paypal_status_cancel($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        }
    }
	
	  public static function update_deal_paypal_status_returned($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        }
    }
    
    public static function update_deal_paypal_status_replaced($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        }
    }

    
    public static function update_withdraw_request($entry, $mer_id)
    {
        return DB::table('nm_withdraw_request')->where('wd_mer_id','=',$mer_id)->update($entry);
    }

    /* update order status for payumoney */

     public static function update_deal_payumoney_status($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order_payu')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order_payu')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        }
    }
    
    public static function update_deal_payumoney_status_cancel($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order_payu')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order_payu')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        }
    }
    
      public static function update_deal_payumoney_status_returned($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order_payu')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order_payu')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        }
    }
    
    public static function update_deal_payumoney_status_replaced($status, $orderid,$proid)
    {
        if(is_int($orderid)) {
            return DB::table('nm_order_payu')->where('order_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        } else {
            return DB::table('nm_order_payu')->where('transaction_id', '=', $orderid)->where('order_pro_id', '=', $proid)->where('order_type', '=', 2)->update(array(
            'delivery_status' => $status
            ));
        }
    } 

}//class

?>
