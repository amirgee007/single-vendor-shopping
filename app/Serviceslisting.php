<?php
namespace App;
use DB;
use File;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Serviceslisting extends Model
{

    /*for front end*/
    public static function service_types(){
        return DB::table('nm_service_type')->where('service_type_status','=',1)->get();
    }
     public static function service_datas($type_id){
        return DB::table('nm_service')
        ->where('status', '=', 1)
        ->where('service_type','=',$type_id)
        ->get();
     }


    public static function get_service_details($store_id){
        return DB::table('nm_service')
        ->where('status', '=', 1)
        ->where('store_name','=',$store_id)
		->leftjoin('nm_store', 'nm_service.store_name', '=', 'nm_store.stor_id')
		->leftjoin('nm_service_type', 'nm_service.service_type','=','nm_service_type.service_type_id')
        ->leftjoin('nm_merchant','nm_store.stor_merchant_id','=','nm_merchant.mer_id')
		->groupBy('service_id')
        ->orderby('nm_service.service_id','desc')
        ->where('nm_store.stor_status','=',1)
        ->where('nm_merchant.mer_staus','=',1)
        ->where('nm_merchant.mer_pro_status','=',1)
        ->get();
    }

    public static function get_service_time(){          //get service time
        return DB::table('nm_service_time')->orderby('service_time')->get();
    }

    public static function get_service_duration(){       //get service time
        return DB::table('nm_service_duration')->orderby('service_duration')->get();
    }

    public static function check_avail_in_cart($customer_id,$service_id){
        return DB::table('nm_service_cart')->where('service_cart_customer_id','=',$customer_id)->where('service_cart_service_id','=',$service_id)->count();
    }
    public static function add_to_cart($entry){         // add service to cart 
        return DB::table('nm_service_cart')->insert($entry);
    }

    public static function get_service_cart_details($customer_id){  // getting in servicelisting controller to check in front end if already exists or not
        return DB::table('nm_service_cart')->select('service_cart_service_id')->where('service_cart_customer_id','=',$customer_id)->get();
    }

    public static function store_terms_condition($store_id){
        return DB::table('nm_store')->where('stor_id','=',$store_id)->get();
    }
    /*public static function get_service_cart_cnt($cus_id){
        return DB::table('nm_service_cart')->where('cus_id','=',$cus_id)->count();
    }*/
    
}

?>