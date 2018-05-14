<?php 
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model as Eloquent;
DB::enableQueryLog();  
class MobileModel extends Eloquent
{
    
    /* CHECK EMAIL EXISTS */
    public static function check_email_ajax($email)
    {
        return DB::table('nm_customer')->where('cus_email', '=', $email)->get();
    }
    /* INSERT NEW CUSTOMER */
    public static function insert_customer($entry)
    {
        $insertcheck = DB::table('nm_customer')->insert($entry);
        if ($insertcheck) {
            return DB::getPdo()->lastInsertId();
        } else {
            return 0;
        }
    }
    /* INSERT NEW CUSTOMER SHIPPING */
    public static function insert_customer_shipping($data)
    {
        return DB::table('nm_shipping')->insert($data);
    }
    /* GET USER DETAILS */
    public static function get_user_details($cus_id)
    {
        return DB::table('nm_customer')->leftJoin('nm_city','ci_id','=','cus_city')->leftJoin('nm_country','co_id','=','cus_country')->where('cus_id', '=', $cus_id)->get();
        //return DB::table('nm_customer')->where('cus_id', '=', $cus_id)->get();
    }
    /* GET USER LOGIN DETAILS */
    public static function user_login($email="",$password="")
    {
        $enc_password=md5($password);
         
        $sql = DB::select(DB::raw("select * from nm_customer left join nm_city on nm_city.ci_id=nm_customer.cus_city left join nm_country on nm_country.co_id=nm_customer.cus_country where cus_email = '$email' and cus_pwd = '$enc_password'"));
        return $sql;
    }
    /* UPDATE NEW PASSWORD */
    public static function update_newpwd($cus_id, $password)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cus_id)
                        ->update(array('cus_pwd' => md5($password)));
    }
    /* UPDATE THE FACEBOOK ID */
    public static function update_customer($email,$data)
    {
        return DB::table('nm_customer')->where('cus_email', $email)->update($data);
    }
    /* CHECK EMAIL EXISTS */
    public static function get_user_info($email)
    {
        return DB::table('nm_customer')->leftjoin('nm_country','nm_customer.cus_country','=','nm_country.co_id')->leftjoin('nm_city','nm_city.ci_id','=','nm_customer.cus_city')->where('cus_email', '=', $email)->get();
    }
    /* GET COUNTRY LIST */
    public static function get_country_list()
    {
        return DB::table('nm_country')->where('co_status','=',0)->get();
    }
	public static function get_enabledRdisabled_payments()
    {
        return DB::table('nm_generalsetting')->where('gs_id','=',1)->get();
    }
    /* GET CITY LIST */
    public static function get_city_list($country_id)
    {
        return DB::table('nm_city')->leftjoin('nm_country','nm_city.ci_con_id','=','nm_country.co_id')
                    ->where('co_status','=',0)->where('ci_status','=',1)->where('ci_con_id','=',$country_id)->get();
    }
    /* GET CATEGORY DETAILS */
    public static function get_category_details()
    {
        return DB::table('nm_maincategory')->where('mc_status','=',1)->get();
    }
    /* GET BANNER DETAILS */
    public static function get_banner_details()
    {
        return DB::table('nm_banner')->where('bn_status','=','0')->get();
    }
    /* TODAY DEAL OF THE DAY */
    public static function dealsof_day_details()
    {
        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
		$current_date = date('Y-m-d H:i:sa');
        $date = date('Y-m-d H:i:s');
  
        //return DB::table('nm_deals')->where('deal_status', '=', 1)->whereBetween('deal_end_date', [$from, $to])->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->orderBy(DB::raw('RAND()'))->take(4)->get();
        return DB::table('nm_deals')->where('deal_status', '=', 1)
        //->whereBetween('deal_end_date', [$from, $to])
        //->whereBetween('deal_end_date', [$from, $to])
        //->WhereRaw('? BETWEEN deal_start_date AND deal_end_date', [$date])
         ->where('deal_start_date', '>=', $from)->where('deal_end_date', '<=', $to)->where('deal_end_date','>',$current_date)
         //->where('deal_end_date', '>=', $to)                              
        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')
       // ->Join('nm_merchant','nm_deals.deal_merchant_id','=','nm_merchant.mer_id')
        //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')
        //->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
        //->where('nm_merchant.mer_staus','=',1)      //merchant status 
        //->where('nm_store.stor_status','=',1)       //store status
        ->where('nm_maincategory.mc_status','=',1)  //Top category status
        ->where('nm_secmaincategory.smc_status','=',1) //main category status
        //->orderBy(DB::raw('RAND()'))->take(4)->get();
		->orderBy('deal_end_date','Asc')->take(4)->get();
      }
     /* GET PRODUCT TOP OFFER */
    public static function get_product_top_offer($main_category_id="",$sec_category_id="")
    {
        if($main_category_id !="" && $sec_category_id !="" ){   
            return DB::table('nm_product')->select(DB::Raw('pro_title_fr,pro_discount_percentage,pro_disprice,pro_price, pro_title,pro_Img,pro_id'))->where('pro_status', '=', 1)->where('pro_mc_id','=', $main_category_id)->where('pro_smc_id','=', $sec_category_id)->where('pro_disprice','>',0)
            ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
           // ->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
            //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
           // ->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
            //->where('nm_merchant.mer_staus','=',1)      //merchant status 
           // ->where('nm_store.stor_status','=',1)       //store status
            ->where('nm_maincategory.mc_status','=',1)  //Top category status
            ->where('nm_secmaincategory.smc_status','=',1) //main category status
            ->orderBy("pro_discount_percentage","DESC")->take(2)->get();
        } else {
             return DB::table('nm_product')->select(DB::Raw('pro_title_fr,pro_discount_percentage,pro_disprice,pro_price, pro_title,pro_Img,pro_id'))->where('pro_status', '=', 1)->where('pro_disprice','>',0)
             ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
             ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
             //->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
             //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
            // ->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
            // ->where('nm_merchant.mer_staus','=',1)      //merchant status 
             //->where('nm_store.stor_status','=',1)       //store status
             ->where('nm_maincategory.mc_status','=',1)  //Top category status
             ->where('nm_secmaincategory.smc_status','=',1) //main category status
             ->orderBy("pro_discount_percentage","DESC")->take(2)->get();
        }
    }
    /* GET PRODUCT Less than 50 % */
    public static function get_product_fifty_percent()
    {
        return DB::table('nm_product')->select(DB::Raw('pro_title_fr,pro_discount_percentage,pro_disprice,pro_price,pro_title, pro_Img,pro_id'))->where('pro_status', '=', 1)->where('pro_discount_percentage','<=','50')->where('pro_disprice','>',0)
        
        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        //->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
       // ->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
       // ->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
        //->where('nm_merchant.mer_staus','=',1)      //merchant status 
        //->where('nm_store.stor_status','=',1)       //store status
        ->where('nm_maincategory.mc_status','=',1)  //Top category status
        ->where('nm_secmaincategory.smc_status','=',1) //main category status
        ->orderBy("pro_discount_percentage","DESC")->take(2)->get();
    }
    /* GET MOST POPULAR PRODUCTS */
    public static function get_popular_product($main_category_id="",$sec_category_id=""){
        if($main_category_id !="" && $sec_category_id !="" ){
            return DB::table('nm_product')->orderBy('hit_count','desc')->where('pro_mc_id','=', $main_category_id)->where('pro_smc_id','=', $sec_category_id)->where('pro_status', '=', 1)
            ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
           // ->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
            //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
           // ->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
            //->where('nm_merchant.mer_staus','=',1)      //merchant status 
            //->where('nm_store.stor_status','=',1)       //store status
            ->where('nm_maincategory.mc_status','=',1)  //Top category status
            ->where('nm_secmaincategory.smc_status','=',1) //main category status
            ->take(4)->get();  
        } else {
            return DB::table('nm_product')->orderBy('hit_count','desc')->where('pro_status', '=', 1)
            //->where('stor_status','=',1)
            ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
            //->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
            //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
           // ->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
           // ->where('nm_merchant.mer_staus','=',1)      //merchant status 
            //->where('nm_store.stor_status','=',1)       //store status
            ->where('nm_maincategory.mc_status','=',1)  //Top category status
            ->where('nm_secmaincategory.smc_status','=',1) //main category status
            ->take(4)->get();  
        }
          
    }
    /* CATEGORY LIST */
    public static function get_main_category_details()
    {
        return DB::table('nm_maincategory')->where('mc_status','=',1)->get();
    }
    /* CATEGORY LIST by ID */
    public static function get_main_category_details_byid($cat_id)
    {
        return DB::table('nm_maincategory')->where('mc_id','=',$cat_id)->where('mc_status','=',1)->get();
    }
    /* SEC CATEGORY LIST */
    public static function get_sec_main_category_details($main_cat_id)
    {
        return DB::table('nm_maincategory')
                ->LeftJoin('nm_secmaincategory','nm_maincategory.mc_id','=','nm_secmaincategory.smc_mc_id')
                ->where('smc_mc_id','=',$main_cat_id)
                ->where('mc_status','=',1)
                ->where('smc_status','=',1)
                ->get();
    }
    /* SUB CATEGORY LIST */
    public static function get_sub_category_details($main_cat_id,$sec_cat_id)
    {
        return DB::table('nm_maincategory')
                ->LeftJoin('nm_secmaincategory','nm_maincategory.mc_id','=','nm_secmaincategory.smc_mc_id')
                ->LeftJoin('nm_subcategory','nm_secmaincategory.smc_id','=','nm_subcategory.sb_smc_id')
                ->where('nm_subcategory.mc_id','=',$main_cat_id)
                ->where('sb_smc_id','=',$sec_cat_id)
                ->where('mc_status','=',1)
                ->where('smc_status','=',1)
                ->where('sb_status','=',1)
                ->get();
    }
    /* SUB CATEGORY LIST */
    public static function get_sub_sec_category_details($main_cat_id,$sec_cat_id,$sub_cat)
    {
        return DB::table('nm_maincategory')
                ->LeftJoin('nm_secmaincategory','nm_maincategory.mc_id','=','nm_secmaincategory.smc_mc_id')
                ->LeftJoin('nm_subcategory','nm_secmaincategory.smc_id','=','nm_subcategory.sb_smc_id')
                ->LeftJoin('nm_secsubcategory','nm_subcategory.sb_id','=','nm_secsubcategory.ssb_sb_id')
                ->where('nm_secsubcategory.mc_id','=',$sec_cat_id)
                ->where('ssb_smc_id','=',$main_cat_id)
                ->where('ssb_sb_id','=',$sub_cat)
                ->where('mc_status','=',1)
                ->where('smc_status','=',1)
                ->where('sb_status','=',1)
                ->where('ssb_status','=',1)
                ->get();
    }
    /* GET CATEGORY BANNER DETAILS */
    public static function get_category_banner($sec_main_cat="")
    {
        return DB::table('nm_category_banner')
                        ->where('cat_bn_maincat_id','=',$sec_main_cat)
                        ->where('cat_bn_status','=',0)
                        ->get();
    }
     /* GET CATEGORY AD DETAILS */
    public static function get_category_ad($sec_main_cat="")
    {
        return DB::table('nm_category_ad')
                        ->where('cat_ad_maincat_id','=',$sec_main_cat)
                        ->where('cat_ad_status','=',0)
                        ->get();
    }
    /* CHECK FACEBOOK ID EXISTS */
    public static function check_facebook_id($facebook_id="")
    {
        //return DB::table('nm_customer')->where('facebook_id', '=', $facebook_id)->get();
        return DB::table('nm_customer')->leftjoin('nm_country','nm_customer.cus_country','=','nm_country.co_id')->leftjoin('nm_city','nm_city.ci_id','=','nm_customer.cus_city')->where('facebook_id', '=', $facebook_id)->get();
    }
    /* PRODUCT SEARCH FILTER */
    public static function get_all_product_listing($pageno="",$main_category_id="",$sec_category_id="",$sub_category_id="",$sub_sec_category_id="",$price_min="",$price_max="",$discount="",$availability="",$sort_order_by="",$title="")
    {

        $where_category = array();
        $where_price = array();
        $where_common = array();

        if($main_category_id !=""){ $where_category = ['pro_mc_id' => $main_category_id]; } elseif($sec_category_id !=""){ $where_category = ['pro_smc_id' => $sec_category_id]; }elseif($sub_category_id !=""){ 
            $where_category = ['pro_sb_id' => $sub_category_id]; }elseif($sub_sec_category_id !=""){ $where_category = ['pro_ssb_id' => $sub_sec_category_id]; }

        $min = 0;
        $max = 10000000;
        if($price_min !="" && $price_max !="") {
            $min = $price_min;
            $max = $price_max;
        }

        $dis_min = 0;
        $dis_max = 99.99;
        if($discount !="") {
            if($discount ==1){ $dis_min = 0;   $dis_max = 10; }
            if($discount ==2){ $dis_min = 10;  $dis_max = 20; }
            if($discount ==3){ $dis_min = 20;  $dis_max = 30; }
            if($discount ==4){ $dis_min = 30;  $dis_max = 40; }
            if($discount ==5){ $dis_min = 40;  $dis_max = 50; }
            if($discount ==6){ $dis_min = 50;  $dis_max = 99.99;}
			if($discount ==7){ $dis_min = 0;  $dis_max = 50;}
        }
       
       if($pageno ==""){
            $record ="";
            $offset ="";
        } else if($pageno ==1) {
            $record =10;
            $offset =0; 
        } else {
            $record =10;
            $pageno = $pageno-1;
            $offset =10*$pageno;
        }
        
        $where_common = ['pro_status' => '1'];
        $where_all = array_merge($where_common,$where_category);
        if($title !="") { $title_search = $title;}else {$title_search = "";}
        
        if($pageno !=""){
            switch ($sort_order_by) {
                case "1":
                           
                                        
                    $query = DB::table('nm_product')
                        //->select('*','pro_discount_percentage','pro_disprice','pro_price','pro_title','pro_Img','pro_id','pro_no_of_purchase','pro_qty')

                        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
                        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
                        //->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
                       // ->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
                       // ->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
                        //->where('nm_merchant.mer_staus','=',1)      //merchant status 
                        //->where('nm_store.stor_status','=',1)       //store status
                        ->where('nm_maincategory.mc_status','=',1)  //Top category status
                        ->where('nm_secmaincategory.smc_status','=',1) //main category status

                        ->where($where_all)
                        ->where('pro_title', 'like', '%'.$title_search.'%')
                        ->whereBetween('pro_disprice',[$min, $max])
                        ->whereBetween('pro_discount_percentage',[$dis_min, $dis_max])
                        ->orderBy('hit_count',"DESC")
                        ->skip($offset)->take($record)
                        ->get();
      
                              
                        break;
                case "2":
                    $query = DB::table('nm_product')
                       // ->select('*','pro_discount_percentage','pro_disprice','pro_price','pro_title','pro_Img','pro_id','pro_no_of_purchase','pro_qty')

                        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
                        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
                       // ->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
                       // ->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
                       // ->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
                        //->where('nm_merchant.mer_staus','=',1)      //merchant status 
                        //->where('nm_store.stor_status','=',1)       //store status
                        ->where('nm_maincategory.mc_status','=',1)  //Top category status
                        ->where('nm_secmaincategory.smc_status','=',1) //main category status

                        ->where($where_all)
                        ->where('pro_title', 'like', '%'.$title_search.'%')
                        ->whereBetween('pro_disprice',[$min, $max])
                        ->whereBetween('pro_discount_percentage',[$dis_min, $dis_max])
                        ->orderBy('pro_disprice',"ASC")
                        ->skip($offset)->take($record)->get();
                    break;
                case "3":
                    $query = DB::table('nm_product')
                       // ->select('*','pro_discount_percentage','pro_disprice','pro_price','pro_title','pro_Img','pro_id','pro_no_of_purchase','pro_qty')
                        
                        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
                        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
                        //->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
                        //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
                       // ->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
                       // ->where('nm_merchant.mer_staus','=',1)      //merchant status 
                       // ->where('nm_store.stor_status','=',1)       //store status
                        ->where('nm_maincategory.mc_status','=',1)  //Top category status
                        ->where('nm_secmaincategory.smc_status','=',1) //main category status
                        
                        ->where($where_all)
                        ->where('pro_title', 'like', '%'.$title_search.'%')
                        ->whereBetween('pro_disprice',[$min, $max])
                        ->whereBetween('pro_discount_percentage',[$dis_min, $dis_max])
                        ->orderBy('pro_disprice',"DESC")
                        ->skip($offset)->take($record)->get();
                    break;
					case "4":
                    $query = DB::table('nm_product')
                        ->select('pro_discount_percentage','pro_disprice','pro_price','pro_title','pro_Img','pro_id','pro_no_of_purchase','pro_qty')
                        ->where($where_all)
                        ->where('pro_title', 'like', '%'.$title_search.'%')
                        ->whereBetween('pro_disprice',[$min, $max])
                        ->whereBetween('pro_discount_percentage',[$dis_min, $dis_max])
                        ->orderBy('pro_discount_percentage',"DESC")
                        // ->orderBy('created_date',"DESC")
                        ->skip($offset)->take($record)->get();
                    break;
                default:
                    $query = DB::table('nm_product')
                       // ->select('*','pro_discount_percentage','pro_disprice','pro_price','pro_title','pro_Img','pro_id','pro_no_of_purchase','pro_qty')
                        
                        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
                        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
                       // ->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
                        //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
                        //->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
                        //->where('nm_merchant.mer_staus','=',1)      //merchant status 
                        //->where('nm_store.stor_status','=',1)       //store status
                        ->where('nm_maincategory.mc_status','=',1)  //Top category status
                        ->where('nm_secmaincategory.smc_status','=',1) //main category status
                        
                        ->where($where_all)
                        ->where('pro_title', 'like', '%'.$title_search.'%')
                        ->whereBetween('pro_disprice',[$min, $max])
                        ->whereBetween('pro_discount_percentage',[$dis_min, $dis_max])
                        ->orderBy('pro_id',"DESC")
                        ->skip($offset)->take($record)->get();
            }
        } 
		else {
            switch ($sort_order_by) {
                case "1":
                    $query = DB::table('nm_product')
                        //->select('*','pro_discount_percentage','pro_disprice','pro_price','pro_title','pro_Img','pro_id','pro_no_of_purchase','	 pro_qty')
                        
                        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
                        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
                        //->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
                        //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
                        //->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
                        //->where('nm_merchant.mer_staus','=',1)      //merchant status 
                        //->where('nm_store.stor_status','=',1)       //store status
                        ->where('nm_maincategory.mc_status','=',1)  //Top category status
                        ->where('nm_secmaincategory.smc_status','=',1) //main category status
                        
                        ->where($where_all)
                        ->where('pro_title', 'like', '%'.$title_search.'%')
                        ->whereBetween('pro_disprice',[$min, $max])
                        ->whereBetween('pro_discount_percentage',[$dis_min, $dis_max])
                        ->orderBy('hit_count',"DESC")
                        ->get();
                    break;
                case "2":
                    $query = DB::table('nm_product')
                        // ->select('*','pro_discount_percentage','pro_disprice','pro_price','pro_title','pro_Img','pro_id','pro_no_of_purchase','pro_qty')
                        
                        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
                        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
                        //->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
                        //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
                        //->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
                        //->where('nm_merchant.mer_staus','=',1)      //merchant status 
                        //->where('nm_store.stor_status','=',1)       //store status
                        ->where('nm_maincategory.mc_status','=',1)  //Top category status
                        ->where('nm_secmaincategory.smc_status','=',1) //main category status
                        
                        ->where($where_all)
                        ->where('pro_title', 'like', '%'.$title_search.'%')
                        ->whereBetween('pro_disprice',[$min, $max])
                        ->whereBetween('pro_discount_percentage',[$dis_min, $dis_max])
                        ->orderBy('pro_disprice',"ASC")
                        ->get();
                    break;
                case "3":
                    $query = DB::table('nm_product')
                        //->select('*','pro_discount_percentage','pro_disprice','pro_price','pro_title','pro_Img','pro_id','pro_no_of_purchase','pro_qty')
                        
                        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
                        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
                        //->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
                        //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
                        //->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
                        //->where('nm_merchant.mer_staus','=',1)      //merchant status 
                        //->where('nm_store.stor_status','=',1)       //store status
                        ->where('nm_maincategory.mc_status','=',1)  //Top category status
                        ->where('nm_secmaincategory.smc_status','=',1) //main category status
                        
                        ->where($where_all)
                        ->where('pro_title', 'like', '%'.$title_search.'%')
                        ->whereBetween('pro_disprice',[$min, $max])
                        ->whereBetween('pro_discount_percentage',[$dis_min, $dis_max])
                        ->orderBy('pro_disprice',"DESC")
                        ->get();
                    break;
				case "4":
                    $query = DB::table('nm_product')
                        ->select('pro_discount_percentage','pro_disprice','pro_price','pro_title','pro_Img','pro_id','pro_no_of_purchase','pro_qty')
						->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
                        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
                        //->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
                        //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
                        //->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
                        //->where('nm_merchant.mer_staus','=',1)      //merchant status 
                        //->where('nm_store.stor_status','=',1)       //store status
                        ->where('nm_maincategory.mc_status','=',1)  //Top category status
                        ->where('nm_secmaincategory.smc_status','=',1) //main category status
						
                        ->where($where_all)
                        ->where('pro_title', 'like', '%'.$title_search.'%')
                        ->whereBetween('pro_disprice',[$min, $max])
                        ->whereBetween('pro_discount_percentage',[$dis_min, $dis_max])
                        ->orderBy('pro_discount_percentage',"DESC")
                        // ->orderBy('created_date',"DESC")
                        ->get();
                    break;	
                default:
                    $query = DB::table('nm_product')
                        //->select('*','pro_discount_percentage','pro_disprice','pro_price','pro_title','pro_Img','pro_id','pro_no_of_purchase','pro_qty')
                        
                        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
                        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
                        //->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
                        //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
                        //->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
                        //->where('nm_merchant.mer_staus','=',1)      //merchant status 
                       // ->where('nm_store.stor_status','=',1)       //store status
                        ->where('nm_maincategory.mc_status','=',1)  //Top category status
                        ->where('nm_secmaincategory.smc_status','=',1) //main category status
                        
                        ->where($where_all)
                        ->where('pro_title', 'like', '%'.$title_search.'%')
                        ->whereBetween('pro_disprice',[$min, $max])
                        ->whereBetween('pro_discount_percentage',[$dis_min, $dis_max])
                        ->orderBy('pro_id',"DESC")
                        ->get();
            }
        }
       // print_r(DB::getQueryLog());
        return $query;
    }
    /* GET PRODUCT WISHLIST DETAILS */
    public static function get_product_wishlist($product_id,$user_id)
    {
        return DB::table('nm_wishlist')->join('nm_product','nm_product.pro_id','=','nm_wishlist.ws_pro_id')
        ->where('ws_pro_id','=',$product_id)->where('ws_cus_id','=',$user_id)->where('pro_status','=',1)->get();
    }
     /* CHECK PRODUCT EXISTS */
    public static function get_product_exists($product_id)
    {
        return DB::table('nm_product')->where('pro_id','=',$product_id)->where('pro_status','=',1)->get();
    }
    /* INSERT WISH LIST */
    public static function insert_wish($entry)
    {
        return $insertcheck = DB::table('nm_wishlist')->insert($entry);
    }
    /* DELETE WISH LIST */
    public static function delete_wish_list($product_id="",$user_id="")
    {
        return DB::table('nm_wishlist')->where('ws_pro_id','=',$product_id)->where('ws_cus_id','=',$user_id)->delete();
    }
    /* GET PRODUCT DETAILS */
    public static function get_product_details($product_id="")
    {
        return DB::table('nm_product')->select('*','nm_product.created_date as product_added_date')
                        ->where('pro_id','=',$product_id)
                        ->where('pro_status', '=', 1)
                        //->where('stor_status','=',1)
                        ->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
                        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
                        ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
                        ->LeftJoin('nm_subcategory','nm_subcategory.sb_id','=','nm_product.pro_sb_id')
                        ->LeftJoin('nm_secsubcategory','nm_secsubcategory.ssb_id','=','nm_product.pro_ssb_id')
                        ->get();
                        
    }
    /* GET SIZE DETAILS FOR PRODUCT */
    public static function get_size_details($productid) 
    {
        $sql = DB::table('nm_prosize')
                        ->where('ps_pro_id','=',$productid)->where('nm_product.pro_is_size','=',0)// 0 for product with color
                        ->LeftJoin('nm_size','nm_prosize.ps_si_id','=','nm_size.si_id')
						->LeftJoin('nm_product','nm_product.pro_id','=','nm_prosize.ps_pro_id')
                        ->get();
        return $sql;
    }
    /* GET COLOR DETAILS FOR PRODUCT */
    public static function get_color_details($productid)
    {
        $sql = DB::table('nm_procolor')
                        ->where('nm_procolor.pc_pro_id','=',$productid)
                        ->LeftJoin('nm_color', 'nm_color.co_id', '=', 'nm_procolor.pc_co_id')
                        ->get();
        return $sql;
    }
    /* GET SPECIFICATION DETAILS FOR PRODUCT */
    public static function get_specification_detials($productid) 
    {
        $sql = DB::table('nm_prospec')
                        ->where('spc_pro_id','=',$productid)
                        ->LeftJoin('nm_specification','spc_sp_id','=','nm_specification.sp_id')
                        ->LeftJoin('nm_spgroup','nm_spgroup.spg_id','=','sp_spg_id')
                        ->get();
        return $sql;
    }
    /* GET REVIEW DETAILS FOR PRODUCT */
    public static function get_product_reviews($productid)
    {
        $sql = DB::table('nm_review')
                        ->select('*','nm_review.review_date')
                        ->where('nm_review.product_id','=',$productid)
						->where('nm_review.status','=','0')
                        ->LeftJoin('nm_product','pro_id','=','product_id')
                        ->LeftJoin('nm_customer', 'nm_review.customer_id', '=', 'nm_customer.cus_id')
                        ->get();
        return $sql;
    }
    /* RELATED PRODUCTS */
    public static function get_related_product($productid,$catid)
    {
        
        return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_id', '!=', $productid)->where('pro_mc_id', '=', $catid)
        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')

        //->Join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
        //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')
        //->where('nm_merchant.mer_pro_status','=',1) //merchant product status 
        //->where('nm_merchant.mer_staus','=',1)      //merchant status 
        //->where('nm_store.stor_status','=',1)       //store status
        ->where('nm_maincategory.mc_status','=',1)  //Top category status
        ->where('nm_secmaincategory.smc_status','=',1) //main category status

        ->take(4)->get();
    }
    /* GET SAVE CART DETAILS */
    public static function get_product_cart_details($productid,$user_id,$quantity,$cart_type,$product_size_id,$product_color_id)
    {

        if($product_size_id !="" && $product_color_id !="")
        {
            $sql =  DB::table('nm_save_cart')
                ->where('cart_product_id', '=', $productid)
                ->where('cart_user_id', '=', $user_id)
                ->where('cart_pro_siz_id', '=', $product_size_id)
                ->where('cart_pro_col_id', '=', $product_color_id)
                ->where('cart_type', '=', $cart_type)
                ->get();
        return $sql;
        } elseif($product_size_id =="" && $product_color_id !="")
        {
            $sql =  DB::table('nm_save_cart')
                ->where('cart_product_id', '=', $productid)
                ->where('cart_user_id', '=', $user_id)
                ->where('cart_pro_siz_id', '=', 0)
                ->where('cart_pro_col_id', '=', $product_color_id)
                ->where('cart_type', '=', $cart_type)
                ->get();
        return $sql;
        } elseif($product_size_id !="" && $product_color_id =="")
        {
            $sql =  DB::table('nm_save_cart')
                ->where('cart_product_id', '=', $productid)
                ->where('cart_user_id', '=', $user_id)
                ->where('cart_pro_siz_id', '=', $product_size_id)
                ->where('cart_pro_col_id', '=', 0)
                ->where('cart_type', '=', $cart_type)
                ->get();
        return $sql;
        } else {
            $sql =  DB::table('nm_save_cart')
                ->where('cart_product_id', '=', $productid)
                ->where('cart_user_id', '=', $user_id)
                ->where('cart_pro_siz_id', '=', 0)
                ->where('cart_pro_col_id', '=', 0)
                ->where('cart_type', '=', $cart_type)
                ->get();
        return $sql;
        }   
        
    }
    /* GET SIZE DETAILS FOR CART */
    public static function get_size_details_by_id($productid,$product_size_id) 
    {
        $sql = DB::table('nm_prosize')
                    ->where('ps_pro_id','=',$productid)
                    ->where('ps_id','=',$product_size_id)
                    ->LeftJoin('nm_size','nm_prosize.ps_si_id','=','nm_size.si_id')
                    ->LeftJoin('nm_product','nm_product.pro_id','=','nm_prosize.ps_pro_id')
                    ->get();
        return $sql;
    }
    /* GET COLOR DETAILS FOR PRODUCT */
    public static function get_color_details_by_id($productid,$product_color_id)
    {
        $sql = DB::table('nm_procolor')
                        ->where('nm_procolor.pc_pro_id','=',$productid)
                        ->where('pc_id','=',$product_color_id)
                        ->LeftJoin('nm_color','nm_procolor.pc_co_id','=','nm_color.co_id')
                        ->LeftJoin('nm_product','nm_product.pro_id','=','nm_procolor.pc_pro_id')
                        ->get();
        return $sql;
    }
    /* ADD TO CART PRODUCT */
    public static function add_to_cart_product($entry)
    {
        $insertcheck = DB::table('nm_save_cart')->insert($entry);
        if ($insertcheck){
            return DB::getPdo()->lastInsertId();
        } else {
            return 0;
        }
    }
    /* GET SAVE CART DETAILS by cartid*/
    public static function get_product_cart_detailsbyid($cart_id,$productid,$user_id,$quantity,$cart_type,$product_size_id,$product_color_id)
    {
        $sql =  DB::table('nm_save_cart')
                ->where('cart_id', '=', $cart_id)
                ->where('cart_product_id', '=', $productid)
                ->where('cart_user_id', '=', $user_id)
                ->where('cart_type', '=', $cart_type)
                ->get();
        return $sql;
    }
    /* UPDATE CART PRODUCT */
    public static function update_to_cart_product($cart_id,$entry)
    {
        return DB::table('nm_save_cart')->where('cart_id', '=', $cart_id)->update($entry);
    }
    /* GET PRODUCT CART USING USER ID */
    public static function get_product_cart_by_userid($user_id,$cart_type)
    {
        $sql =  DB::table('nm_save_cart')
                ->where('cart_user_id', '=', $user_id)
                ->where('cart_type', '=', $cart_type)
                ->get();
        return $sql;
    }
    /* GET CART DETAILS BY CART ID */
    public static function get_cart_details_by_id($cart_id,$cart_type)
    {
        $sql =  DB::table('nm_save_cart')
                ->where('cart_id', '=', $cart_id)
                ->where('cart_type', '=', $cart_type)
                ->get();
        return $sql;
    }
    /* DELETE CART DETAILS BY ID */
    public static function delete_cart_by_id($cart_id,$cart_type)
    {
        return DB::table('nm_save_cart')->where('cart_id', '=', $cart_id)->where('cart_type', '=', $cart_type)->delete();
    }
    /* GET ALL DEAL LISTINGS */
    public static function get_all_deals_details($pageno="",$shopid="",$title="")
    {
        if($pageno ==""){
            $record ="";
            $offset ="";
        } else if($pageno ==1) {
            $record =10;
            $offset =0; 
        } else {
            $record =10;
            $pageno = $pageno-1;
            $offset =10*$pageno;
        }
        if($title !="") { $title_search = $title;}else {$title_search = "";}
        $date = date('Y-m-d H:i:s');
        if(($shopid !="" || $shopid !=0) && ($pageno!="")){
            return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_start_date', '<=', $date)->where('deal_shop_id', '=', $shopid)
                ->where('deal_title', 'like', '%'.$title_search.'%')
                //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')
                ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
                ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
                ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
                ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')
                //->Join('nm_merchant','nm_deals.deal_merchant_id','=','nm_merchant.mer_id')
               // ->where('nm_merchant.mer_pro_status','=',1)    //mer product unblock
                //->where('nm_merchant.mer_staus','=',1) //mer unblock
               // ->where('nm_store.stor_status','=',1)   //unblock
                ->where('nm_maincategory.mc_status','=',1)
                ->where('nm_secmaincategory.smc_status','=',1)

                //->orderBy(DB::raw('RAND()'))
                ->skip($offset)->take($record)
                ->get();



        } elseif(($shopid !="" || $shopid !=0) && ($pageno=="")){
            return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_start_date', '<', $date)->where('deal_start_date', '<=', $date)->where('deal_shop_id', '=', $shopid)
                ->where('deal_title', 'like', '%'.$title_search.'%')
                //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')
                ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
                ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
                ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
                ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')

                //->Join('nm_merchant','nm_deals.deal_merchant_id','=','nm_merchant.mer_id')
                //->where('nm_merchant.mer_pro_status','=',1)    //mer product unblock
                //->where('nm_merchant.mer_staus','=',1) //mer unblock
               // ->where('nm_store.stor_status','=',1)   //unblock
                ->where('nm_maincategory.mc_status','=',1)
                ->where('nm_secmaincategory.smc_status','=',1)
                //->orderBy(DB::raw('RAND()'))
                ->get();
        } elseif($pageno!=""){

            return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)
                ->where('deal_start_date', '<=', $date)
                ->where('deal_title', 'like', '%'.$title_search.'%')
                //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')
                ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
                ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
                ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
                ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')
                
                //->Join('nm_merchant','nm_deals.deal_merchant_id','=','nm_merchant.mer_id')
                //->where('nm_merchant.mer_pro_status','=',1)    //mer product unblock
                //->where('nm_merchant.mer_staus','=',1) //mer unblock
                //->where('nm_store.stor_status','=',1)   //unblock
                ->where('nm_maincategory.mc_status','=',1)
                ->where('nm_secmaincategory.smc_status','=',1)
                //->orderBy(DB::raw('RAND()'))
                ->skip($offset)->take($record)
                ->get();
                 
        } else {
            return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)
                ->where('deal_start_date', '<=', $date)
                //->where('stor_status', '=', 1)
                ->where('deal_title', 'like', '%'.$title_search.'%')
                //->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')
                ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
                ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
                ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
                ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')
                //->Join('nm_merchant','nm_deals.deal_merchant_id','=','nm_merchant.mer_id')
                //->where('nm_merchant.mer_pro_status','=',1)    //mer product unblock
                //->where('nm_merchant.mer_staus','=',1) //mer unblock
                //->where('nm_store.stor_status','=',1)   //unblock
                ->where('nm_maincategory.mc_status','=',1)
                ->where('nm_secmaincategory.smc_status','=',1)
                //->orderBy(DB::raw('RAND()'))
                ->get();
        }
        
    }
   
    /* GET DEAL DETAILS BY ID */
    public static function get_deals_details_by_id($dealid="")
    {
        $date = date('Y-m-d H:i:s');
          return DB::table('nm_deals')
                ->where('deal_status', '=', 1)->where('deal_id', '=', $dealid)
				->where('deal_start_date', '<=', $date)
                ->where('deal_end_date', '>', $date)
				//->where('stor_status', '=', 1)                                    
                //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')
                ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
                ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
                ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
                ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')

                //->Join('nm_merchant','nm_deals.deal_merchant_id','=','nm_merchant.mer_id')
                //->where('nm_merchant.mer_pro_status','=',1)    //mer product unblock
                //->where('nm_merchant.mer_staus','=',1) //mer unblock
                //->where('nm_store.stor_status','=',1)   //unblock
                ->where('nm_maincategory.mc_status','=',1)
                ->where('nm_secmaincategory.smc_status','=',1)
                ->get();
        
    }
    /* GET REVIEW DETAILS FOR DEALS */
    public static function get_deal_reviews($dealid="")
    {
        $sql = DB::table('nm_review')
                        ->select('*','nm_review.review_date')
                        ->where('nm_review.deal_id','=',$dealid)
						->where('nm_review.status','=','0')
                        ->LeftJoin('nm_deals','nm_deals.deal_id','=','nm_review.deal_id')
                        ->LeftJoin('nm_customer', 'nm_review.customer_id', '=', 'nm_customer.cus_id')
                        ->get();
        return $sql;
    }
    /*  GET RELATED DEALS DETAILS */
    public static function get_related_deals($deal_id="",$cat_id="")
    {
        $date  = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_status', '=', 1)
                ->where('deal_start_date','<=', $date)->where('deal_end_date', '>', $date)->where('deal_id', '!=', $deal_id)
                ->where('deal_category', '=', $cat_id)
				//->where('stor_status', '=', 1)
                //->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')
                ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
                ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
                ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
                ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')

                /*->Join('nm_merchant','nm_deals.deal_merchant_id','=','nm_merchant.mer_id')
                ->where('nm_merchant.mer_pro_status','=',1)    //mer product unblock
                ->where('nm_merchant.mer_staus','=',1) //mer unblock
                ->where('nm_store.stor_status','=',1)   //unblock*/
                ->where('nm_maincategory.mc_status','=',1)
                ->where('nm_secmaincategory.smc_status','=',1)
                ->take(4)->get();
    }
    /* GET SAVE CART DETAILS FOR DEALS */
    public static function get_deal_cart_details($dealid,$user_id,$quantity,$cart_type)
    {
        $sql =  DB::table('nm_save_cart')
                ->where('cart_deal_id', '=', $dealid)
                ->where('cart_user_id', '=', $user_id)
                ->where('cart_type', '=', $cart_type)
                ->get();
        return $sql;
    }
    /* GET COUNTRY LIST */
    public static function get_countrylist($country_id="")
    {
  
        if($country_id !=""){
            return DB::table('nm_country')->where('co_status', '=','0')->where('co_id', '=',$country_id)->get();     
        } else {
            return DB::table('nm_country')->where('co_status', '=','0')->get();     
        }
       
    }
    /* GET CITY LIST */
    public static function get_citylist($country_id="",$city_id="")
    {
        if($country_id !="" && $city_id !=""){ 
            return DB::table('nm_city')->where('ci_status', '=','1')->where('ci_con_id', '=',$country_id)->where('ci_id', '=',$city_id)->get();
        } else {
             return DB::table('nm_city')->where('ci_status', '=','1')->get();
        }
       
    }
    /* GET USER SHIPPING DETAILS */
    public static function get_user_ship_details($user_id="",$ship_id="")
    {
        if($ship_id !=""){
             return DB::table('nm_shipping')->leftJoin('nm_city','ci_name','=','ship_ci_id')
                    ->leftJoin('nm_country','co_name','=','ship_country')
                    //->join('nm_customer','nm_customer.cus_id','=','nm_shipping.ship_cus_id')
                    ->where('nm_shipping.ship_id', '=',$ship_id)->where('ship_cus_id', '=',$user_id)
                    ->orderBy("ship_id","Desc")->limit(1)->get();
                } else {
                     return DB::table('nm_shipping')->leftJoin('nm_city','ci_name','=','ship_ci_id')
                    ->leftJoin('nm_country','co_name','=','ship_country')
                   // ->join('nm_customer','nm_customer.cus_id','=','nm_shipping.ship_cus_id')
                    ->where('ship_cus_id', '=',$user_id)
                    ->orderBy("ship_id","Desc")->limit(1)->get();
                }
       
                     
    }
    /* UPDATE USER */
    public static function update_user_details($user_id,$field)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $user_id)->update($field);
    }
    /* UPDATE USER SHIPPING */
    public static function update_user_shipping_details($user_id,$field)
    {
        return DB::table('nm_shipping')->where('ship_id', '=', $user_id)->update($field);
    }
     /* GET USER LOGIN DETAILS */
    public static function reset_user_password($user_id="",$password="")
    {
        $enc_password=md5($password);
         
        $sql = DB::select(DB::raw("select * from nm_customer left join nm_city on nm_city.ci_id=nm_customer.cus_city left join nm_country on nm_country.co_id=nm_customer.cus_country where cus_id = '$user_id' and cus_pwd = '$enc_password'"));
          // print_r(DB::getQueryLog());
        return $sql;
    }
    /* GET USER WISH LIST DETAILS */
    public static function get_wishlistdetails($pageno="",$customerid)
    {
        if($pageno ==""){
            $record ="";
            $offset ="";
        } else if($pageno ==1) {
            $record =10;
            $offset =0; 
        } else {
            $record =10;
            $pageno = $pageno-1;
            $offset =10*$pageno;
        }
        if($pageno !="") {
             return DB::table('nm_wishlist')->join('nm_product', 'nm_wishlist.ws_pro_id', '=', 'nm_product.pro_id')->join('nm_maincategory', 'nm_product.pro_mc_id', '=', 'nm_maincategory.mc_id')->join('nm_secmaincategory', 'nm_product.pro_smc_id', '=', 'nm_secmaincategory.smc_id')->leftjoin('nm_subcategory', 'nm_product.pro_sb_id', '=', 'nm_subcategory.sb_id')->leftjoin('nm_secsubcategory', 'nm_product.pro_ssb_id', '=', 'nm_secsubcategory.ssb_id')->where('ws_cus_id', '=', $customerid)->where('nm_product.pro_status','=',1)
            ->skip($offset)->take($record)->get();  
        } else {
             return DB::table('nm_wishlist')->join('nm_product', 'nm_wishlist.ws_pro_id', '=', 'nm_product.pro_id')->join('nm_maincategory', 'nm_product.pro_mc_id', '=', 'nm_maincategory.mc_id')->join('nm_secmaincategory', 'nm_product.pro_smc_id', '=', 'nm_secmaincategory.smc_id')->leftjoin('nm_subcategory', 'nm_product.pro_sb_id', '=', 'nm_subcategory.sb_id')->leftjoin('nm_secsubcategory', 'nm_product.pro_ssb_id', '=', 'nm_secsubcategory.ssb_id')->where('ws_cus_id', '=', $customerid)->where('nm_product.pro_status','=',1)
             ->get();   
        }
       
    }
    /* GET ORDER DETAILS */
    public static function getproductordersdetails($pageno="",$customerid)
    {
        if($pageno ==""){
            $record ="";
            $offset ="";
        } else if($pageno ==1) {
            $record =10;
            $offset =0; 
        } else {
            $record =10;
            $pageno = $pageno-1;
            $offset =10*$pageno;
        }
        if($pageno !="") {
            return  DB::table('nm_order')
	   ->join('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')       
       ->leftjoin('nm_shipping', 'nm_order.transaction_id', '=', 'nm_shipping.ship_trans_id')
	   ->groupby('nm_order.transaction_id')
	   ->groupBy('nm_order.order_pro_id')
       ->orderBy('nm_order.order_date', 'desc')
	   ->where('nm_order.order_cus_id', '=', $customerid)
	   ->where('nm_order.order_type','=',1)
	   ->skip($offset)->take($record)->get();
        } else {
            return  DB::table('nm_order')
	   ->join('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')       
       ->leftjoin('nm_shipping', 'nm_order.transaction_id', '=', 'nm_shipping.ship_trans_id')
	   ->groupby('nm_order.transaction_id')
	   ->groupBy('nm_order.order_pro_id')
       ->orderBy('nm_order.order_date', 'desc')
	   ->where('nm_order.order_cus_id', '=', $customerid)
	   ->where('nm_order.order_type','=',1)
	   ->get();
        }
        
    }
    /* GET COD ORDER DETAILS */
    public static function getproductorders_cod_details($pageno="",$customerid)
    {
        if($pageno ==""){
            $record ="";
            $offset ="";
        } else if($pageno ==1) {
            $record =10;
            $offset =0; 
        } else {
            $record =10;
            $pageno = $pageno-1;
            $offset =10*$pageno;
        }
        if($pageno !="") {
            return DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
            ->leftjoin('nm_shipping', 'nm_ordercod.cod_transaction_id', '=', 'nm_shipping.ship_trans_id')
			->groupby('nm_ordercod.cod_transaction_id')
            ->groupBy('nm_ordercod.cod_pro_id')
            ->orderBy('nm_ordercod.cod_date', 'desc')->where('nm_ordercod.cod_order_type','=',1)->where('cod_cus_id', '=', $customerid)->skip($offset)->take($record)->get();
        } else {
             // DB::enableQueryLog();
            return DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
            ->leftjoin('nm_shipping', 'nm_ordercod.cod_transaction_id', '=', 'nm_shipping.ship_trans_id')
           ->groupBy('nm_ordercod.cod_pro_id')
		   ->groupby('nm_ordercod.cod_transaction_id')
            ->orderBy('nm_ordercod.cod_date', 'desc')->where('nm_ordercod.cod_order_type','=',1)->where('cod_cus_id', '=', $customerid)->get();
            //print_r(DB::getQueryLog());
        }
        
    }
	
	/* GET PAYUMONEY ORDER DETAILS */
	public static function getproductorders_payU_details($pageno="",$customerid)
    {
        if($pageno ==""){
            $record ="";
            $offset ="";
        } else if($pageno ==1) {
            $record =10;
            $offset =0; 
        } else {
            $record =10;
            $pageno = $pageno-1;
            $offset =10*$pageno;
        }
        if($pageno !="") {
            return DB::table('nm_order_payu')->join('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
            ->leftjoin('nm_shipping', 'nm_order_payu.transaction_id', '=', 'nm_shipping.ship_trans_id')
			->groupby('nm_order_payu.transaction_id')
            ->groupBy('nm_order_payu.order_pro_id')
            ->orderBy('nm_order_payu.order_date', 'desc')->where('nm_order_payu.order_type','=',1)->where('order_cus_id', '=', $customerid)->skip($offset)->take($record)->get();
        } else {
             // DB::enableQueryLog();
            return DB::table('nm_order_payu')->join('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
            ->leftjoin('nm_shipping', 'nm_order_payu.transaction_id', '=', 'nm_shipping.ship_trans_id')
           ->groupBy('nm_order_payu.order_pro_id')
		   ->groupby('nm_order_payu.transaction_id')
            ->orderBy('nm_order_payu.order_date', 'desc')->where('nm_order_payu.order_type','=',1)->where('order_cus_id', '=', $customerid)->get();
            //print_r(DB::getQueryLog());
        }
        
    }
    /* GET DEAL ORDER DETAILS */
    public static function getdealordersdetails($pageno="",$customerid)
    {
        if($pageno ==""){
            $record ="";
            $offset ="";
        } else if($pageno ==1) {
            $record =10;
            $offset =0; 
        } else {
            $record =10;
            $pageno = $pageno-1;
            $offset =10*$pageno;
        }
        if($pageno !="") {
           return  DB::table('nm_order')
	   ->join('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')      
       ->leftjoin('nm_shipping', 'nm_order.transaction_id', '=', 'nm_shipping.ship_trans_id')
	   ->groupby('nm_order.transaction_id')
	   ->groupBy('nm_order.order_pro_id')
       ->orderBy('nm_order.order_date', 'desc')
	   ->where('nm_order.order_cus_id', '=', $customerid)
	   ->where('nm_order.order_type','=',2)
	   ->skip($offset)->take($record)->get();
        } else {

            return  DB::table('nm_order')
	   ->join('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')      
       ->leftjoin('nm_shipping', 'nm_order.transaction_id', '=', 'nm_shipping.ship_trans_id')
	   ->groupby('nm_order.transaction_id')
	   ->groupBy('nm_order.order_pro_id')
       ->orderBy('nm_order.order_date', 'desc')
	   ->where('nm_order.order_cus_id', '=', $customerid)
	   ->where('nm_order.order_type','=',2)
	   ->get();
        }
    }
	/*GET DEAL PAYUMONEY ORDER DETAILS */
	public static function getdealorders_payU_details($pageno="",$customerid)
    {
        if($pageno ==""){
            $record ="";
            $offset ="";
        } else if($pageno ==1) {
            $record =10;
            $offset =0; 
        } else {
            $record =10;
            $pageno = $pageno-1;
            $offset =10*$pageno;
        }
        if($pageno !="") {
           return  DB::table('nm_order_payu')
	   ->join('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')      
       ->leftjoin('nm_shipping', 'nm_order_payu.transaction_id', '=', 'nm_shipping.ship_trans_id')
	   ->groupby('nm_order_payu.transaction_id')
	   ->groupBy('nm_order_payu.order_pro_id')
       ->orderBy('nm_order_payu.order_date', 'desc')
	   ->where('nm_order_payu.order_cus_id', '=', $customerid)
	   ->where('nm_order_payu.order_type','=',2)
	   ->skip($offset)->take($record)->get();
        } else {

            return  DB::table('nm_order_payu')
	   ->join('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')      
       ->leftjoin('nm_shipping', 'nm_order_payu.transaction_id', '=', 'nm_shipping.ship_trans_id')
	   ->groupby('nm_order_payu.transaction_id')
	   ->groupBy('nm_order_payu.order_pro_id')
       ->orderBy('nm_order_payu.order_date', 'desc')
	   ->where('nm_order_payu.order_cus_id', '=', $customerid)
	   ->where('nm_order_payu.order_type','=',2)
	   ->get();
        }
    }
 
	/* GET DEAL COD ORDER DETAILS */
    public static function getdealorders_cod_details($pageno="",$customerid)
    {
        if($pageno ==""){
            $record ="";
            $offset ="";
        } else if($pageno ==1) {
            $record =10;
            $offset =0; 
        } else {
            $record =10;
            $pageno = $pageno-1;
            $offset =10*$pageno;
        }
        if($pageno !="") {
            return DB::table('nm_ordercod')->join('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
            ->leftjoin('nm_shipping', 'nm_ordercod.cod_transaction_id', '=', 'nm_shipping.ship_trans_id')
                ->groupBy('nm_ordercod.cod_pro_id')
				->groupby('nm_ordercod.cod_transaction_id')
            ->orderBy('nm_ordercod.cod_date', 'desc')->where('nm_ordercod.cod_order_type','=',2)->where('cod_cus_id', '=', $customerid)->skip($offset)->take($record)->get();
        } else {
            return DB::table('nm_ordercod')->join('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
            ->leftjoin('nm_shipping', 'nm_ordercod.cod_transaction_id', '=', 'nm_shipping.ship_trans_id')
            ->groupBy('nm_ordercod.cod_pro_id')
			->groupby('nm_ordercod.cod_transaction_id')
            ->orderBy('nm_ordercod.cod_date', 'desc')->where('nm_ordercod.cod_order_type','=',2)->where('cod_cus_id', '=', $customerid)->get();
        }
        
    }
    /*  GET SHOP LISTING */
    public static function get_all_shop_details($pageno="")
    {
        if($pageno ==""){
            $record ="";
            $offset ="";
        } else if($pageno ==1) {
            $record =10;
            $offset =0; 
        } else {
            $record =10;
            $pageno = $pageno-1;
            $offset =10*$pageno;
        }
        if($pageno !="") {
            /*$sql = DB::table('nm_store')
                        ->where('stor_status','=',1) //store unblock
                        ->Join('nm_merchant','mer_id','=','stor_merchant_id')
                        ->where('nm_merchant.mer_staus','=',1) //mer unblock
                        ->skip($offset)->take($record)
                        ->get();
            return $sql;*/
        } else {
            /*$sql = DB::table('nm_store')
                        ->where('stor_status','=',1)
                        ->Join('nm_merchant','mer_id','=','stor_merchant_id')
                        ->where('nm_merchant.mer_staus','=',1) //mer unblock
                        ->get();
            return $sql;*/
        }
    }
    /* GET PRODUCT COUNT BY SHOP ID */
    public static function get_product_count_by_shop($shopid)
    {
        $sql = DB::table('nm_product')
                        ->select('pro_id')
                        ->where('pro_status', '=', 1) //product unblock
                        ->where('pro_sh_id','=',$shopid)
                        ->Join('nm_store','stor_id','=','pro_sh_id')
                        ->get();
        return count($sql);
    }
    /* GET PRODUCT COUNT BY SHOP ID */
    public static function get_deal_count_by_shop($shopid)
    {
        $date = date('Y-m-d H:i:s');
        $sql = DB::table('nm_deals')
                        ->select('deal_id')
                        ->where('deal_status','=',1) //deals unblock
						->where('deal_start_date','<=',$date)
                        ->where('deal_end_date', '>', $date)
                        ->where('deal_shop_id','=',$shopid)
                        ->leftJoin('nm_store','stor_id','=','deal_shop_id')
                        ->get();
        return count($sql);
    }
    /*  GET SHOP DETAIL PAGE */
    public static function get_all_shop_details_page($shopid="")
    {
        /*$sql = DB::table('nm_store')
                    ->where('stor_status','=',1)->where('stor_id','=',$shopid)
                    ->Join('nm_merchant','mer_id','=','stor_merchant_id')
                    ->leftJoin('nm_country','co_id','=','stor_country')
                    ->leftJoin('nm_city','ci_id','=','stor_city')
                    ->get();
        return $sql;*/
    }
    /*  STORE DETAILS PRODUCT LISTING BY SHOP ID  */
    public static function get_store_product_list($shopid="")
    {
        $sql =  DB::table('nm_product')
            ->where('pro_status', '=', 1)
            ->where('pro_sh_id', '=', $shopid)
            //->where('stor_status', '=', 1)
            //->Join('nm_store','nm_store.stor_id','=','nm_product.pro_sh_id')
            ->Join('nm_maincategory','nm_maincategory.mc_id','=','nm_product.pro_mc_id')
            ->Join('nm_secmaincategory','nm_secmaincategory.smc_id','=','nm_product.pro_smc_id')
            ->LeftJoin('nm_subcategory','nm_subcategory.sb_id','=','nm_product.pro_sb_id')
            ->LeftJoin('nm_secsubcategory','nm_secsubcategory.ssb_id','=','nm_product.pro_ssb_id')
            //->join('nm_merchant','nm_product.pro_mr_id','=','nm_merchant.mer_id')
            //->where('nm_merchant.mer_pro_status','=',1)  //unblock
            //->where('nm_merchant.mer_staus','=',1)
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1)
            // ->skip($offset)->take($record)
            ->get();
        return $sql;
    }
    /*  STORE DETAILS DEALS LISTING BY SHOP ID  */
    public static function get_store_deals_details($shopid="")
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_start_date','<=',$date)->where('deal_end_date', '>', $date)->where('deal_shop_id', '=', $shopid)
		//->where('stor_status', '=', 1)
            //->Join('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')
            //->Join('nm_merchant','nm_deals.deal_merchant_id','=','nm_merchant.mer_id')
            ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1)
           // ->where('nm_merchant.mer_pro_status','=',1)  //unblock
            //->where('nm_merchant.mer_staus','=',1)
            //->orderBy(DB::raw('RAND()'))
            //->skip($offset)->take($record)
            ->get();
    }
    /*  GET SHOP LISTING */
    public static function get_branch_details($stor_merchant_id="",$stor_id="")
    {
            /*$sql = DB::table('nm_store')
                        ->where('stor_status','=',1)
                        ->where('stor_merchant_id','=',$stor_merchant_id)  
                        ->where('stor_id', '<>', $stor_id)
                        ->Join('nm_merchant','mer_id','=','stor_merchant_id')
                        ->get();
            return $sql;*/
        
    }
    /* GET REVIEW DETAILS FOR STORE */
    public static function get_store_reviews($storeid="")
    {
       /* $sql = DB::table('nm_review')
                        ->select('*','nm_review.review_date')
                        ->where('nm_review.store_id','=',$storeid)
						->where('nm_review.status','=','0')
                        ->LeftJoin('nm_store','nm_store.stor_id','=','nm_review.store_id')
                        ->LeftJoin('nm_customer', 'nm_review.customer_id', '=', 'nm_customer.cus_id')
                        ->get();
        return $sql;*/
    }
    /* Insert Review */
    public static function comment_insert($entry)
    {
        $insertcheck = DB::table('nm_review')->insert($entry);
        if ($insertcheck) {
            return DB::getPdo()->lastInsertId();
        } else {
            return 0;
        }
    }
    /* Check Deal exists */
    public static function get_deal_exists($deal_id)
    {
        return DB::table('nm_deals')->where('deal_id','=',$deal_id)->where('deal_status','=',1)->get();
    }
    /* Check Store exists */
    public static function get_store_exists($store_id)
    {
        //return DB::table('nm_store')->where('stor_id','=',$store_id)->where('stor_status','=',1)->get();
    }
     public static function trans_check($transaction_id)
    {
        return DB::table('nm_ordercod')->where('cod_transaction_id', $transaction_id)->get();
        
    }
    /* PRODUCT DETAILS PAGE BY ID  */
    public static function get_product_detail_by_id($productid)
    {
        $sql = DB::table('nm_product')
                        ->select('*','nm_product.created_date as product_added_date')
                        ->where('pro_status','=',1)
                        ->where('pro_id','=',$productid)
                        //->Join('nm_store','nm_store.stor_id','=','nm_product.pro_sh_id')
                        ->Join('nm_maincategory','nm_maincategory.mc_id','=','nm_product.pro_mc_id')
                        ->LeftJoin('nm_secmaincategory','nm_secmaincategory.smc_id','=','nm_product.pro_smc_id')
                        ->LeftJoin('nm_subcategory','nm_subcategory.sb_id','=','nm_product.pro_sb_id')
                        ->LeftJoin('nm_secsubcategory','nm_secsubcategory.ssb_id','=','nm_product.pro_ssb_id')
                        ->get();
        return $sql;
    }
    public static function purchased_checkout_product_insert($pid,$qty)
    {  
        $check                  = DB::table('nm_product')->where('pro_id', $pid)->get();
        $pro_no_of_purchase     = $check[0]->pro_no_of_purchase;
        $new_pro_no_of_purchase = $pro_no_of_purchase + $qty;
        foreach ($check as $row) {
            $pur      = $row->pro_no_of_purchase;
            $purchase = $pur + $qty;
            $quantity = $row->pro_qty;
        }
        if ($purchase >= $quantity) {
            return DB::table('nm_product')->where('pro_id', $pid)->update(array(
                'pro_no_of_purchase' => $new_pro_no_of_purchase,
                'sold_status' => 0
            ));
        } elseif ($purchase < $quantity) {
            
            return DB::table('nm_product')->where('pro_id', $pid)->update(array(
                'pro_no_of_purchase' => $new_pro_no_of_purchase
            ));
        }
        
    }
    public static function cod_checkout_insert($data)
    {
        $insertcheck = DB::table('nm_ordercod')->insert($data);
        if ($insertcheck) {
            return DB::getPdo()->lastInsertId();
        } else {
            return 0;
        }
        
    }
    public static function insert_shipping_addr($data, $cust_id)
    {
        return DB::table('nm_shipping')->insert($data);
        
    }
    /* GET REVIEW DETAILS FOR STORE BY ID*/
    public static function get_store_reviews_by_id($storeid="",$id="")
    {
        $sql = DB::table('nm_review')
                        ->select('*','nm_review.review_date')
                        ->where('nm_review.store_id','=',$storeid)
						->where('nm_review.status','=','0')
                        ->where('comment_id','=',$id)
                        //->LeftJoin('nm_store','nm_store.stor_id','=','nm_review.store_id')
                        ->LeftJoin('nm_customer', 'nm_review.customer_id', '=', 'nm_customer.cus_id')
                        ->get();
        return $sql;
    }
    /* GET REVIEW DETAILS FOR PRODUCT */
    public static function get_product_reviews_by_id($productid,$id="")
    {
        $sql = DB::table('nm_review')
                        ->select('*','nm_review.review_date')
                        ->where('nm_review.product_id','=',$productid)
                        ->where('comment_id','=',$id)
						->where('nm_review.status','=','0')
                        ->LeftJoin('nm_product','pro_id','=','product_id')
                        ->LeftJoin('nm_customer', 'nm_review.customer_id', '=', 'nm_customer.cus_id')
                        ->get();
        return $sql;
    }
    /* GET REVIEW DETAILS FOR DEALS */
    public static function get_deal_reviews_by_id($dealid="",$id="")
    {
        $sql = DB::table('nm_review')
                        ->select('*','nm_review.review_date')
                        ->where('nm_review.deal_id','=',$dealid)
						->where('nm_review.status','=','0')// 0-unblock
                        ->where('comment_id','=',$id)
                        ->LeftJoin('nm_deals','nm_deals.deal_id','=','nm_review.deal_id')
                        ->LeftJoin('nm_customer', 'nm_review.customer_id', '=', 'nm_customer.cus_id')
                        ->get();
        return $sql;
    }
    /* GET SAVE CART DETAILS FOR DEALS */
    public static function get_deal_cart_detailsbyid($cart_id,$dealid,$user_id,$quantity,$cart_type)
    {
        $sql =  DB::table('nm_save_cart')
                ->where('cart_id', '=', $cart_id)
                ->where('cart_deal_id', '=', $dealid)
                ->where('cart_user_id', '=', $user_id)
                ->where('cart_type', '=', $cart_type)
                ->get();
        return $sql;
    }
    /* PAYPAL INSERT FOR PRODUCT AND DEALS */
    public static function paypal_checkout_insert($data)
    {
        $insertcheck = DB::table('nm_order')->insert($data);
        if ($insertcheck) {
            return DB::getPdo()->lastInsertId();
        } else {
            return 0;
        }
    }


/* PAYUMONEY INSERT FOR PRODUCT AND DEALS */
    public static function payumoney_checkout_insert($data)
    {
        $insertcheck = DB::table('nm_order_payu')->insert($data);
        if ($insertcheck) {
            return DB::getPdo()->lastInsertId();
        } else {
            return 0;
        }
    }

     /* NEARE ME MAP CITY SEARCH */
    public static function get_city_details()
    {
        return DB::table('nm_city')
					//->join('nm_store','stor_city','=','ci_id')
                   // ->join('nm_merchant','nm_store.stor_merchant_id','=','nm_merchant.mer_id')
                    //->where('mer_staus','=',1)
                    ->where('ci_status', '=','1')
                    //->where('stor_status','=','1')
                    //->groupby('stor_city')
                    ->get();

    }

    /* CHECK language EXISTS starts */
    public static function check_CustomLangValid($langCode)
    {
        return DB::table('nm_language')->where('lang_code', '=', $langCode)->where('lang_status','=','1')->first();
    }
    /* CHECK language EXISTS ends */

    //get merchant commission
    public static function getMerchantCommission($mer_id)
    {
        return DB::table('nm_merchant')->select('mer_commission')->where('mer_id','=',$mer_id)->first();
    }

    /* Get Merchant Overall Order details */
    public static function overallOrderDetails($mer_id){
        return DB::table('nm_merchant_overallorders')->where('over_mer_id', '=', $mer_id)->get();
    }

     /* Insert Merchant Overall Order details */
    public static function insertMerchantOverallOrder($entry){
        $insert_fb = DB::table('nm_merchant_overallorders')->insert($entry);
    }
    /* Update Merchant Overall Order details */
    public static function updateMerchantOverallOrder($entry,$overOrd_id){
        $insert_fb = DB::table('nm_merchant_overallorders')->where('overOrd_id', $overOrd_id)->update($entry);
    }

    public static function sumOfOrderCodAmount($mer_id,$trans_id){
        
        return DB::table('nm_ordercod AS ordCod1')
            ->select(
                DB::raw("SUM(ordCod1.cod_amt) as sumCodAmt,
                   (SELECT SUM(ordCod2.cod_tax) FROM nm_ordercod AS ordCod2 WHERE ordCod2.cod_transaction_id = ordCod1.cod_transaction_id AND ordCod1.cod_merchant_id = ordCod2.cod_merchant_id) AS sumTax,
                   (SELECT SUM(ordCod3.cod_shipping_amt) FROM nm_ordercod AS ordCod3 WHERE ordCod3.cod_transaction_id = ordCod1.cod_transaction_id AND ordCod1.cod_merchant_id = ordCod3.cod_merchant_id) AS sumShippingAmt,
                   (SELECT SUM(ordCod4.coupon_amount) FROM nm_ordercod AS ordCod4 WHERE ordCod4.cod_transaction_id = ordCod1.cod_transaction_id AND ordCod1.cod_merchant_id = ordCod4.cod_merchant_id) AS sumCoupon,
                   (SELECT SUM(ordCod5.wallet_amount) FROM nm_ordercod AS ordCod5 WHERE ordCod5.cod_transaction_id = ordCod1.cod_transaction_id AND ordCod1.cod_merchant_id = ordCod5.cod_merchant_id) AS sumWallet,
                   (SELECT SUM(ordCod6.mer_commission_amt) FROM nm_ordercod AS ordCod6 WHERE ordCod6.cod_transaction_id = ordCod1.cod_transaction_id AND ordCod1.cod_merchant_id = ordCod6.cod_merchant_id) AS sumMerchantCommission,
                   (SELECT SUM(ordCod7.mer_amt) FROM nm_ordercod AS ordCod7 WHERE ordCod7.cod_transaction_id = ordCod1.cod_transaction_id AND ordCod1.cod_merchant_id = ordCod7.cod_merchant_id) AS sumMerchantAmount   
                   "
                )
            )
        ->where('ordCod1.cod_transaction_id', '=', $trans_id)->where('ordCod1.cod_merchant_id', '=', $mer_id)->first();
       
        
    } 

    public static function sumOfOrderAmount($mer_id,$trans_id){
        //DB::connection()->enableQueryLog();

        return DB::table('nm_order AS ord1')
            ->select(
                DB::raw("SUM(ord1.order_amt) as sumOrdAmt,
                   (SELECT SUM(ord2.order_tax)  FROM nm_order AS ord2 WHERE ord2.transaction_id = ord1.transaction_id AND ord1.order_merchant_id = ord2.order_merchant_id) AS sumTax,
                   (SELECT SUM(ord3.order_shipping_amt) FROM nm_order AS ord3 WHERE ord3.transaction_id = ord1.transaction_id AND ord1.order_merchant_id = ord3.order_merchant_id) AS sumShippingAmt,
                   (SELECT SUM(ord4.coupon_amount) FROM nm_order AS ord4 WHERE ord4.transaction_id = ord1.transaction_id AND ord1.order_merchant_id = ord4.order_merchant_id) AS sumCoupon,
                   (SELECT SUM(ord5.wallet_amount) FROM nm_order AS ord5 WHERE ord5.transaction_id = ord1.transaction_id AND ord1.order_merchant_id = ord5.order_merchant_id) AS sumWallet,
                   (SELECT SUM(ord6.mer_commission_amt) FROM nm_order AS ord6 WHERE ord6.transaction_id = ord1.transaction_id AND ord1.order_merchant_id = ord6.order_merchant_id) AS sumMerchantCommission,
                   (SELECT SUM(ord7.mer_amt) FROM nm_order AS ord7 WHERE ord7.transaction_id = ord1.transaction_id AND ord1.order_merchant_id = ord7.order_merchant_id) AS sumMerchantAmount  
                   "
                )
            )
        ->where('ord1.transaction_id', '=', $trans_id)->where('ord1.order_merchant_id', '=', $mer_id)->first();
       
       // $query = DB::getQueryLog();
        //print_r($query);
    }


    public static function getAll_CODtax_details($mer_id,$trans_id){
        
        return DB::table('nm_ordercod AS ordCod1')
            ->select('cod_amt','cod_tax')
        ->where('ordCod1.cod_transaction_id', '=', $trans_id)->where('ordCod1.cod_merchant_id', '=', $mer_id)->get();
       
        
    }

    public static function getAll_Ordtax_details($mer_id,$trans_id){
        
        return DB::table('nm_order AS ord1')
            ->select('order_amt','order_tax')
        ->where('ord1.transaction_id', '=', $trans_id)->where('ord1.order_merchant_id', '=', $mer_id)->get();
       
        
    }

    //Payment settings details
    public static function get_settings()
    {
        
        return DB::table('nm_paymentsettings')->where('ps_id', '=', '1')->get();
        
    }
    /* FUNCTIONS FROM HOME MODEL */
	public static function transaction_id($id)
    {
        
        return DB::table('nm_ordercod')->where('cod_id', '=', $id)->value('cod_transaction_id');
    }
	public static function get_subtotal($id)
    {
        return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)->sum('cod_amt');
    }
	public static function get_tax($id)
    {
        return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)->sum('cod_tax');
    }
	public static function get_shipping_amount($id)
    {
        return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)
        ->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_ordercod.cod_pro_id')
        ->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_ordercod.cod_pro_id')
        ->sum('pro_shippamt');
    }
	public static function order_transaction_id($id)
    {
        return DB::table('nm_order')->where('order_id', '=', $id)->value('transaction_id');
    }

    public static function get_order_subtotal_paypal($id)
    {
        return DB::table('nm_order')->where('transaction_id', '=', $id)->sum('order_amt');
    }
	
    public static function get_order_tax_paypal($id)
    {
        return DB::table('nm_order')->where('transaction_id', '=', $id)->sum('order_tax');
    }

    public static function get_order_shipping_amount_paypal($id)
    {
        return DB::table('nm_order')->where('transaction_id', '=', $id)
        ->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_order.order_pro_id')
        ->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_order.order_pro_id')
        ->sum('order_taxAmt');
    }
	
	/*	PAYUMONEY */ 
	public static function orderPayu_transaction_id($id)
    {
        return DB::table('nm_order_payu')->where('order_id', '=', $id)->value('transaction_id');
    }

    public static function get_order_subtotal_payU($id)
    {
        return DB::table('nm_order_payu')->where('transaction_id', '=', $id)->sum('order_amt');
    }
    public static function get_order_tax_payU($id)
    {
        return DB::table('nm_order_payu')->where('transaction_id', '=', $id)->sum('order_tax');
    }

    public static function get_order_shipping_amount_payU($id)
    {
        return DB::table('nm_order_payu')->where('transaction_id', '=', $id)
        ->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_order_payu.order_pro_id')
        ->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_order_payu.order_pro_id')
        ->sum('order_taxAmt');
    }
	
}   
?>
    
    