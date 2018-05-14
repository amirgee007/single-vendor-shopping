<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Session;

class Home extends Model
{
   
    public static function get_ad_details()
    {
        return DB::table('nm_add')->where('ad_status','=',0)->orderBy('ad_position','asc')->groupby('ad_position')->get();
    }
    public static function get_colors_by_products()
    {
        return DB::table('nm_procolor')->Join('nm_color', 'nm_color.co_id', '=', 'nm_procolor.pc_co_id')->groupby('nm_procolor.pc_co_id')->get();
    }
    public static function get_sizes_by_products()
    {
        return DB::table('nm_size')->Join('nm_prosize', 'nm_size.si_id', '=', 'nm_prosize.ps_si_id')->groupby('nm_size.si_id')->orderby('nm_size.si_name',"Asc")->get();
    }
    
    public static function get_noimage_details()
    {
        return DB::table('nm_imagesetting')->where('imgs_type', '=', 3)->get();
    }

    public static function getlogodetails()
    {
        return DB::table('nm_imagesetting')->where('imgs_type', '=', 1)->get();
    }
    
    public static function getbannerimagedetails()
    {
        return DB::table('nm_banner')->where('bn_status', '=', 0)->where('bn_slider_position','=',1)->get();
    }
    public static function getfirstbannerimagedetails()
    {
        return DB::table('nm_banner')->where('bn_status', '=', 0)->where('bn_slider_position','=',2)->get();
    }
    public static function getsecondbannerimagedetails()
    {
        return DB::table('nm_banner')->where('bn_status', '=', 0)->where('bn_slider_position','=',3)->get();
    }
    public static function getthirdbannerimagedetails()
    {
        return DB::table('nm_banner')->where('bn_status', '=', 0)->where('bn_slider_position','=',4)->get();
    }

    public static function getmetadetails()
    {
        return DB::table('nm_generalsetting')->get();
    }
    
   /*  public static function get_header_category()
    {
        return DB::table('nm_maincategory')
        ->where('mc_status', '=', 1)
        ->get();
    } */
    
     public static function get_header_category()
    {
        return DB::table('nm_maincategory')
        ->select('mc_id','mc_name')
        ->Join('nm_product','nm_maincategory.mc_id','=','nm_product.pro_mc_id')
       
        ->whereRaw('nm_product.pro_qty > nm_product.pro_no_of_purchase')
        ->where('nm_product.pro_status','=',1)
        ->where('nm_maincategory.mc_status', '=', 1)
        
        ->groupby('nm_maincategory.mc_id')
        ->get();
    }

     public static function get_header_category_deals()
    {
        $date  = date('Y-m-d H:i:s');
        return DB::table('nm_maincategory')
        ->select('mc_id','mc_name')
        ->Join('nm_deals','nm_maincategory.mc_id','=','nm_deals.deal_category')
       
        ->whereRaw('nm_deals.deal_no_of_purchase < nm_deals.deal_max_limit')
        ->where('nm_deals.deal_end_date', '>', $date)
        ->where('nm_deals.deal_status','!=', 2)
        ->where('nm_maincategory.mc_status', '=', 1)
       
        ->groupby('nm_maincategory.mc_id')
        ->get();
    }
    
    public static function get_meta_details()
    {
        return DB::table('nm_generalsetting')->get();
    }

    public static function get_image_favicons_details()
    {
        return DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get();
    }
    
    public static function get_specification_group_product($main_cat,$sec_main_cat)
    {
        return DB::table('nm_spgroup')->where("show_on_filter","=","1")->where("sp_mc_id","=",$main_cat)->where("sp_smc_id","=",$sec_main_cat)->get();
    }
    public static function get_specification_values($spec_parent)
    {
        return DB::table('nm_specification')->whereIn('sp_spg_id', $spec_parent)->orderBy('sp_order', 'asc')->get();
        return DB::table('nm_spgroup')->where("show_on_filter","=","1")->where("sp_mc_id","=",$main_cat)->where("sp_smc_id","=",$sec_main_cat)->get();
    }
    
    public static function get_image_logoicons_details()
    {
        return DB::table('nm_imagesetting')->where('imgs_type', '=', 1)->get();
    }

    public static function get_category_header()
    {
        return DB::table('nm_maincategory')->where('mc_status', '=', 1)->take(6)->get();
    }

    public static function get_banner_img_details()
    {
        return DB::table('nm_banner')->where('bn_status', '=', 0)->get();
    }

    /* public static function get_sub_main_category($main_category)
    {
         $result= array();
        if(count($main_category)>0){
           // print_r($main_category);
           foreach ($main_category as $main_cat) {
              
                $main_cat_result = DB::table('nm_secmaincategory')->where('smc_status', '=', 1)->where('smc_mc_id', '=', $main_cat->mc_id)->get();

                if ($main_cat_result) {
                    $result[$main_cat->mc_id] = $main_cat_result;
                } else {
                    $result[$main_cat->mc_id] = Array();
                }
            }
          
        }
        return $result;
         //print_r($result);
         //exit();

    } */
    
      public static function get_sub_main_category($main_category)
    {
         $result= array();
        if(count($main_category)>0){
           
           foreach ($main_category as $main_cat) {
              
                $main_cat_result = DB::table('nm_secmaincategory')
                ->select('smc_id','smc_name')
                ->Join('nm_product','nm_secmaincategory.smc_id','=','nm_product.pro_smc_id')
              
                ->whereRaw('nm_product.pro_qty > nm_product.pro_no_of_purchase')
                ->where('nm_product.pro_status','=',1)
                ->where('nm_secmaincategory.smc_status', '=', 1)
               
                ->where('nm_secmaincategory.smc_mc_id', '=', $main_cat->mc_id)
                ->groupby('nm_secmaincategory.smc_id')
                ->get();

                if ($main_cat_result) {
                    $result[$main_cat->mc_id] = $main_cat_result;
                } else {
                    $result[$main_cat->mc_id] = Array();
                }
            }
          
        }
        return $result;
         

    } 

     public static function get_sub_main_category_deals($main_category)
    {
         $date   = date('Y-m-d H:i:s');
         $result= array();
        if(count($main_category)>0){
           // print_r($main_category);
           foreach ($main_category as $main_cat) {
              
                $main_cat_result = DB::table('nm_secmaincategory')
                ->Join('nm_deals','nm_secmaincategory.smc_id','=','nm_deals.deal_main_category')
               
                ->whereRaw('deal_no_of_purchase < deal_max_limit')
                ->where('deal_end_date', '>', $date)
                ->where('deal_status','!=',2)
                ->where('smc_status', '=', 1)
              
                ->where('smc_mc_id', '=', $main_cat->mc_id)
                ->groupby('nm_secmaincategory.smc_id')
                ->get();

                if ($main_cat_result) {
                    $result[$main_cat->mc_id] = $main_cat_result;
                } else {
                    $result[$main_cat->mc_id] = Array();
                }
            }
          
        }
        return $result;
         //print_r($result);
         //exit();

    } 

    public static function get_shipping_addr_details($cust_id)
    {
        return DB::table('nm_shipping')->where('ship_cus_id', '=', $cust_id)->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_shipping.ship_ci_id')->LeftJoin('nm_country', 'nm_country.co_id', '=', 'nm_shipping.ship_country')->get();
    }

    public static function get_ship_addr_details($cust_id){
        return DB::table('nm_customer')->where('cus_id', '=', $cust_id)->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_customer.ship_ci_id')->LeftJoin('nm_country', 'nm_country.co_id', '=', 'nm_customer.ship_country')->get();
    }
    
   /*  public static function get_second_main_category($main_category, $sub_main_category)
    {
        $result =array();
        if(count($main_category)>0){
            foreach ($main_category as $main_cat) {
                foreach ($sub_main_category[$main_cat->mc_id] as $sub_cat) {
                    $main_cat_result = DB::table('nm_subcategory')->where('sb_status', '=', 1)->where('sb_smc_id', '=', $sub_cat->smc_id)->get();
                    
                    if ($main_cat_result) {
                        $result[$sub_cat->smc_id] = $main_cat_result;
                    } else {
                        $result[$sub_cat->smc_id] = Array();
                    }
                }
            }
        } 
        //print_r($result);die;
        return $result;
    }  */
    
      public static function get_second_main_category($main_category, $sub_main_category)
    {
        $result =array();
        if(count($main_category)>0){
            foreach ($main_category as $main_cat) {
                foreach ($sub_main_category[$main_cat->mc_id] as $sub_cat) {
                    $main_cat_result = DB::table('nm_subcategory')
                    ->select('sb_id','sb_name')
                    ->Join('nm_product','nm_subcategory.sb_id','=','nm_product.pro_sb_id')
                   
                    ->whereRaw('nm_product.pro_qty > nm_product.pro_no_of_purchase')
                    ->where('pro_status','=',1)
                  
                    ->where('sb_status', '=', 1)
                    ->where('sb_smc_id', '=', $sub_cat->smc_id)
                    ->groupby('nm_subcategory.sb_id')
                    ->get();
                    
                    if ($main_cat_result) {
                        $result[$sub_cat->smc_id] = $main_cat_result;
                    } else {
                        $result[$sub_cat->smc_id] = Array();
                    }
                }
            }
        } 
        return $result;
    } 

    public static function get_second_main_category_deals($main_category, $sub_main_category)
    {
        $date  = date('Y-m-d H:i:s');
        $result =array();
        if(count($main_category)>0){
            foreach ($main_category as $main_cat) {
                foreach ($sub_main_category[$main_cat->mc_id] as $sub_cat) {
                    $main_cat_result = DB::table('nm_subcategory')
                    ->select('sb_id','sb_name')
                    ->Join('nm_deals','nm_subcategory.sb_id','=','nm_deals.deal_sub_category')
                   
                    ->whereRaw('deal_no_of_purchase < deal_max_limit')
                    ->where('deal_end_date', '>', $date)
                    ->where('deal_status','!=', 2)
                   
                    ->where('sb_status', '=', 1)
                    ->where('sb_smc_id', '=', $sub_cat->smc_id)
                    ->groupby('nm_subcategory.sb_id')
                    ->get();
                    
                    if ($main_cat_result) {
                        $result[$sub_cat->smc_id] = $main_cat_result;
                    } else {
                        $result[$sub_cat->smc_id] = Array();
                    }
                }
            }
        } 
        return $result;
    } 
    
  /*   public static function get_second_sub_main_category()
    {
    
        
        $result= array();
        $sub_cat_check = DB::table('nm_subcategory')->where('sb_status', '=', 1)->get();
        
        if(count($sub_cat_check)>0){
            foreach ($sub_cat_check as $sec_sub_cat) {
                $main_cat_result = DB::table('nm_secsubcategory')->where('ssb_status', '=', 1)->where('ssb_sb_id', '=', $sec_sub_cat->sb_id)->get();

        
                if ($main_cat_result) {
                    $result[$sec_sub_cat->sb_id] = $main_cat_result;
                } else {
                    $result[$sec_sub_cat->sb_id] = Array();
                }
            }  
        }
        
        

        
        return $result;
        
    } */
    
     public static function get_second_sub_main_category()
    {
        $result= array();
        $sub_cat_check = DB::table('nm_subcategory')->select('sb_id')
        ->where('sb_status', '=', 1)->get();
        
        if(count($sub_cat_check)>0){
            foreach ($sub_cat_check as $sec_sub_cat) {
                $main_cat_result = DB::table('nm_secsubcategory')
                ->select('ssb_id','ssb_name')
                ->Join('nm_product','nm_secsubcategory.ssb_id','=','nm_product.pro_ssb_id')
                ->whereRaw('nm_product.pro_qty > nm_product.pro_no_of_purchase')
                ->where('pro_status','=',1)
                ->where('ssb_status', '=', 1)
                ->where('ssb_sb_id', '=', $sec_sub_cat->sb_id)
                ->groupby('nm_secsubcategory.ssb_id')
                ->get();
                if ($main_cat_result) {
                    $result[$sec_sub_cat->sb_id] = $main_cat_result;
                } else {
                    $result[$sec_sub_cat->sb_id] = Array();
                }
            }  
        }
        
        

        
        return $result;
        
    }
    
     public static function get_second_sub_main_category_deals()
    {
    
        $date = date('Y-m-d H:i:s');
        $result= array();
        $sub_cat_check = DB::table('nm_subcategory')->where('sb_status', '=', 1)->get();
        
        if(count($sub_cat_check)>0){
            foreach ($sub_cat_check as $sec_sub_cat) {
                $main_cat_result = DB::table('nm_secsubcategory')
                ->select('ssb_id','ssb_name')
                ->Join('nm_deals','nm_secsubcategory.ssb_id','=','nm_deals.deal_second_sub_category')
               
                ->whereRaw('deal_no_of_purchase < deal_max_limit')
                ->where('deal_end_date', '>', $date)
                ->where('deal_status','!=', 2)
              
                ->where('ssb_status', '=', 1)
                ->where('ssb_sb_id', '=', $sec_sub_cat->sb_id)
                ->groupby('nm_secsubcategory.ssb_id')
                ->get();
        
                if ($main_cat_result) {
                    $result[$sec_sub_cat->sb_id] = $main_cat_result;
                } else {
                    $result[$sec_sub_cat->sb_id] = Array();
                }
            }  
        }
        
        return $result;
        
    }
    
    public static function get_autosearch_category($like)
    {
        return DB::table('nm_maincategory')->where('mc_status', '=', 1)->where('mc_name', 'like', "%" . $like . "%")->get();
    }

    public static function get_category_count($header_category)
    {
         $result= array();
        if(count($header_category)>0){
           foreach ($header_category as $store_cnt) {
                $catg_result = DB::table('nm_product')->where('pro_mc_id', '=', $store_cnt->mc_id)->get();
                if ($catg_result) {
                    $result[$store_cnt->mc_id] = count($catg_result);
                } else {
                    $result[$store_cnt->mc_id] = 0;
                }
            } 
           
        }
       return $result;
        
        
    }

    public static function get_product_details()
    {
        return DB::table('nm_product')
        ->where('pro_status', '=', 1)
        
        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
       
        ->where('nm_maincategory.mc_status','=',1)
       ->where('nm_secmaincategory.smc_status','=',1)
        ->orderby('nm_product.pro_id','desc')
        ->get();
      
    }
     public static function get_top_offer_product_details()
    {
        return DB::table('nm_product')
        ->select('nm_product.pro_id','nm_product.pro_title','nm_product.pro_title_fr','nm_product.pro_Img','nm_product.pro_price','nm_product.pro_disprice','nm_product.pro_qty','nm_product.pro_no_of_purchase','nm_maincategory.mc_name','nm_secmaincategory.smc_name','nm_subcategory.sb_name','nm_secsubcategory.ssb_name')
        ->where('pro_status', '=', 1)
        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
        ->where('nm_maincategory.mc_status','=',1)
        ->where('nm_secmaincategory.smc_status','=',1)
        ->orderby('nm_product.pro_discount_percentage','desc')
        ->take(11)->get();

        
    }
    
    
    public static function get_product_details_belowfifty()
    {
        return DB::table('nm_product')
         ->select('nm_product.pro_id','nm_product.pro_title','nm_product.pro_title_fr','nm_product.pro_Img','nm_product.pro_price','nm_product.pro_disprice','nm_product.pro_qty','nm_product.pro_no_of_purchase','nm_maincategory.mc_name','nm_secmaincategory.smc_name','nm_subcategory.sb_name','nm_secsubcategory.ssb_name')
        ->where('pro_status', '=', 1)
        
        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
      
        ->where('nm_maincategory.mc_status','=',1)
        ->where('nm_secmaincategory.smc_status','=',1)
        ->orderby('nm_product.pro_discount_percentage','desc')
        ->get();
    }
    
    public static function get_product_details_abovefifty()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)
      
        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
       
        ->where('nm_maincategory.mc_status','=',1)
        ->where('nm_secmaincategory.smc_status','=',1)
        ->take(100)->get();
    }
    
    public static function dealsof_day_details()
    {
        $now = date('Y-m-d H:i:s');
        $today = date('Y-m-d');
        $date = date('Y-m-d H:i:s');
       return DB::table('nm_deals')->where('deal_status', '=', 1)
       ->select('deal_discount_percentage','deal_image','deal_id','deal_end_date','deal_title','deal_title_fr','deal_discount_price','deal_no_of_purchase','deal_max_limit','nm_maincategory.mc_name','nm_secmaincategory.smc_name','nm_subcategory.sb_name','nm_secsubcategory.ssb_name')
        ->WhereRaw('? BETWEEN deal_start_date AND deal_end_date', [$date])
        //->where(DB::raw('date(deal_start_date)'),'=', $today)->where(DB::raw('date(deal_end_date)'),'=', $today)
        //->where('deal_start_date','<=',$now)->where('deal_end_date','>=',$now)
        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')
      
        ->where('nm_maincategory.mc_status','=',1)
        ->where('nm_secmaincategory.smc_status','=',1)
        ->orderBy(DB::raw('RAND()'))->get();

    }

    public static function get_popular_product(){
    return DB::table('nm_product')
    ->select('nm_product.pro_id','nm_product.pro_title','nm_product.pro_title_fr','nm_product.pro_Img','nm_product.pro_price','nm_product.pro_disprice','nm_product.pro_qty','nm_product.pro_no_of_purchase','nm_maincategory.mc_name','nm_secmaincategory.smc_name','nm_subcategory.sb_name','nm_secsubcategory.ssb_name')
    ->orderBy('hit_count','desc')
    ->where('pro_status', '=', 1)
    
    ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
    ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
    ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
    ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
   
    ->where('nm_maincategory.mc_status','=',1)
    ->where('nm_secmaincategory.smc_status','=',1)
    ->get();    
    }
   
   
    public static function city_list()
    {
        return DB::table('nm_city')
        ->where('ci_status','=',1)
        ->get();
    }
  
    public static function get_product_details_cat()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
        ->take(9)
        ->groupBy('nm_product.pro_mc_id')
        ->get();
    }

    public static function get_product_details1()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->take(9)->get();
    }

    public static function get_product_details2()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->take(9)->get();
    }
    
    public static function get_product_details_by_id($id)
    {
       return DB::table('nm_product')
       ->where('pro_status', '=', 1)
       ->where('pro_id', '=', $id)
     //  //->LeftJoin('nm_prospec','nm_prospec.spc_pro_id','=','nm_product.pro_id')
       ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
    
       ->get();
    }

 //For Fetch Coupon details
     public static function get_product_details_by_id_coupon($id)
    {
       //return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_id', '=', $id)->join('nm_coupon','nm_coupon.product_id','=','nm_product.pro_id')->get();

       return DB::table('nm_coupon')->where('product_id', '=', $id)->join('nm_product','nm_coupon.product_id','=','nm_product.pro_id')->first();
    }
    

    
    public static function get_catname_listby($id)
    {
        //echo $id;die;
        $get_listby_id = explode(",", $id);
        
        if ($get_listby_id[0] == 1){
            return DB::table('nm_maincategory')->where('mc_id', '=', $get_listby_id[1])->get();
        } else if ($get_listby_id[0] == 2){
            return DB::table('nm_secmaincategory')->where('smc_id', '=', $get_listby_id[1])->get();
        } else if ($get_listby_id[0] == 3){
            return DB::table('nm_subcategory')->where('sb_id', '=', $get_listby_id[1])->get();
        } else if ($get_listby_id[0] == 4) {
            return DB::table('nm_secsubcategory')->where('ssb_id', '=', $get_listby_id[1])->get();
        }
    }
    
    
    public static function get_category_product_details_listbyfilter($id,$filters,$from_price=0,$to_price=5000000,$color_filters,$discount_filters,$size_filters)
    {
        /* print_r($filters);die; */
        DB::enableQueryLog();
        $get_listby_id = explode(",", $id);
        if ($get_listby_id[0] == 1) {
            $sql=DB::table('nm_product')
            ->where('pro_status', '=', 1)
            ->where('pro_mc_id', '=', $get_listby_id[1])
            ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
            ->LeftJoin('nm_prospec', 'nm_prospec.spc_pro_id', '=', 'nm_product.pro_id')//
            ->LeftJoin('nm_procolor', 'nm_procolor.pc_pro_id', '=', 'nm_product.pro_id')//
            ->LeftJoin('nm_prosize', 'nm_prosize.ps_pro_id', '=', 'nm_product.pro_id')//
         
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1);
            if(!empty($filters))//if specification filter not null
                $sql->whereIn('nm_prospec.spc_sp_id', $filters);
            if(!empty($color_filters))//if color filter not null
                $sql->whereIn('nm_procolor.pc_co_id', $color_filters);
            if(!empty($size_filters))//if size filter not null
                $sql->whereIn('nm_prosize.ps_si_id', $size_filters);
            if(!empty($discount_filters))//if discount filter not null
                $sql->whereBetween('nm_product.pro_discount_percentage', [$discount_filters[0], $discount_filters[1]]);
            return $sql->whereBetween('nm_product.pro_disprice', [$from_price, $to_price])
            ->groupby('nm_product.pro_id')
            ->orderby('nm_product.pro_id','desc')
            ->get();
             
        } else if ($get_listby_id[0] == 2) {
            //DB::enableQueryLog();
             $sql= DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_smc_id', '=', $get_listby_id[1])
            ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
            ->LeftJoin('nm_prospec', 'nm_prospec.spc_pro_id', '=', 'nm_product.pro_id')//
            ->LeftJoin('nm_procolor', 'nm_procolor.pc_pro_id', '=', 'nm_product.pro_id')//
            ->LeftJoin('nm_prosize', 'nm_prosize.ps_pro_id', '=', 'nm_product.pro_id')//
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1);
            if(!empty($filters))//if specification filter not null
                $sql->whereIn('nm_prospec.spc_sp_id', $filters);
            if(!empty($color_filters))//if color filter not null
                $sql->whereIn('nm_procolor.pc_co_id', $color_filters);
            if(!empty($size_filters))//if size filter not null
                $sql->whereIn('nm_prosize.ps_si_id', $size_filters);
            if(!empty($discount_filters))//if discount filter not null
                $sql->whereBetween('nm_product.pro_discount_percentage', [$discount_filters[0], $discount_filters[1]]);
            return $sql->whereBetween('nm_product.pro_disprice', [$from_price, $to_price])
            ->groupby('nm_product.pro_id')
            ->orderby('nm_product.pro_id','desc')
            ->get();
             //print_r(DB::getQueryLog());die;
        } else if ($get_listby_id[0] == 3) {
             $sql= DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_sb_id', '=', $get_listby_id[1])
            ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
            ->LeftJoin('nm_prospec', 'nm_prospec.spc_pro_id', '=', 'nm_product.pro_id')
            ->LeftJoin('nm_procolor', 'nm_procolor.pc_pro_id', '=', 'nm_product.pro_id')
            ->LeftJoin('nm_prosize', 'nm_prosize.ps_pro_id', '=', 'nm_product.pro_id')
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1);
            if(!empty($filters))//if specification filter not null
                $sql->whereIn('nm_prospec.spc_sp_id', $filters);
            if(!empty($color_filters))//if color filter not null
                $sql->whereIn('nm_procolor.pc_co_id', $color_filters);
            if(!empty($size_filters))//if size filter not null
                $sql->whereIn('nm_prosize.ps_si_id', $size_filters);
            if(!empty($discount_filters))//if discount filter not null
                $sql->whereBetween('nm_product.pro_discount_percentage', [$discount_filters[0], $discount_filters[1]]);
            return $sql->whereBetween('nm_product.pro_disprice', [$from_price, $to_price])
            ->groupby('nm_product.pro_id')
            ->orderby('nm_product.pro_id','desc')
            ->get();
        } else if ($get_listby_id[0] == 4) {
             $sql=  DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_ssb_id', '=', $get_listby_id[1])
            ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
            ->LeftJoin('nm_prospec', 'nm_prospec.spc_pro_id', '=', 'nm_product.pro_id')//
            ->LeftJoin('nm_procolor', 'nm_procolor.pc_pro_id', '=', 'nm_product.pro_id')//
            ->LeftJoin('nm_prosize', 'nm_prosize.ps_pro_id', '=', 'nm_product.pro_id')//
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1);
            if(!empty($filters))//if specification filter not null
                $sql->whereIn('nm_prospec.spc_sp_id', $filters);
            if(!empty($color_filters))//if color filter not null
                $sql->whereIn('nm_procolor.pc_co_id', $color_filters);
            if(!empty($size_filters))//if size filter not null
                $sql->whereIn('nm_prosize.ps_si_id', $size_filters);
            if(!empty($discount_filters))//if discount filter not null
                $sql->whereBetween('nm_product.pro_discount_percentage', [$discount_filters[0], $discount_filters[1]]);
            return $sql->whereBetween('nm_product.pro_disprice', [$from_price, $to_price])
            ->groupby('nm_product.pro_id')
            ->orderby('nm_product.pro_id','desc')
            ->get();
        }
        
    }
    
    //get_all_deals_details
    //get_category_deal_details_listby
    public static function get_category_deal_details_listby($id,$discount_filters,$from_price,$to_price)
    {

         $date = date('Y-m-d H:i:s');
        $get_listby_id = explode(",", $id);
     if ($get_listby_id[0] == 1) {

            $sql= DB::table('nm_deals')
            ->where('deal_status', '=', 1)
            ->where('deal_end_date', '>', $date)
            ->where('deal_start_date', '<', $date)
            ->where('deal_category', '=', $get_listby_id[1])
            ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
            ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category');
            if(!empty($discount_filters))//if discount filter not null
                $sql->whereBetween('deal_discount_percentage', [$discount_filters[0], $discount_filters[1]]);
            return $sql->whereBetween('deal_discount_price', [$from_price, $to_price])
            ->get();
            
        } else if ($get_listby_id[0] == 2) {

            $sql= DB::table('nm_deals')
            ->where('deal_status', '=', 1)
            ->where('deal_end_date', '>', $date)
            ->where('deal_start_date', '<', $date)
            ->where('deal_main_category', '=', $get_listby_id[1])
            ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
            ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category');
            if(!empty($discount_filters))//if discount filter not null
                $sql->whereBetween('deal_discount_percentage', [$discount_filters[0], $discount_filters[1]]);
            return $sql->whereBetween('deal_discount_price', [$from_price, $to_price])
            ->get();
        } else if ($get_listby_id[0] == 3) {
            $sql= DB::table('nm_deals')
            ->where('deal_status', '=', 1)
            ->where('deal_end_date', '>', $date)
            ->where('deal_start_date', '<', $date)
            ->where('deal_sub_category', '=', $get_listby_id[1])
            ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
            ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category');
            if(!empty($discount_filters))//if discount filter not null
                $sql->whereBetween('deal_discount_percentage', [$discount_filters[0], $discount_filters[1]]);
            return $sql->whereBetween('deal_discount_price', [$from_price, $to_price])
            ->get();
        } else if ($get_listby_id[0] == 4) {
            $sql= DB::table('nm_deals')
            ->where('deal_status', '=', 1)
            ->where('deal_end_date', '>', $date)
            ->where('deal_start_date', '<', $date)
            ->where('deal_second_sub_category', '=', $get_listby_id[1])
            ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
            ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category');
            if(!empty($discount_filters))//if discount filter not null
                $sql->whereBetween('deal_discount_percentage', [$discount_filters[0], $discount_filters[1]]);
            return $sql->whereBetween('deal_discount_price', [$from_price, $to_price])
            ->get();
        }
        
    }
    
    /*public static function get_category_auction_details_listby($id)
    {
        $date          = date('Y-m-d H:i:s');
        $get_listby_id = explode(",", $id);
        if ($get_listby_id[0] == 1) {
            return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_category', '=', $get_listby_id[1])->where('auc_end_date', '>', $date)->get();
        } else if ($get_listby_id[0] == 2) {
            return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_main_category', '=', $get_listby_id[1])->where('auc_end_date', '>', $date)->get();
        } else if ($get_listby_id[0] == 3) {
            return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_sub_category', '=', $get_listby_id[1])->where('auc_end_date', '>', $date)->get();
        } else if ($get_listby_id[0] == 4) {
            return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_second_sub_category', '=', $get_listby_id[1])->where('auc_end_date', '>', $date)->get();
        }
        
    }*/
    
    public static function get_related_product($id)
    {
        
        $catid = DB::table('nm_product')->where('pro_id', '=', $id)
            ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1)
        ->value('pro_smc_id');
        
       return DB::table('nm_product')->where('pro_status', '=', 1)->orderby('pro_id','desc')->where('pro_id', '!=', $id)->where('pro_smc_id', '=', $catid)
       ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
       ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
       ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
       ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1)
       ->get();
    
    }
     //get_all_deals_details
    //get_category_deal_details_listby
    public static function get_all_deals_details($discount_filters=array(),$from_price="0",$to_price="50000000")
    {
        $date = date('Y-m-d H:i:s');
        $sql= DB::table('nm_deals')
        ->select('deal_no_of_purchase','deal_max_limit','deal_title','deal_title_fr','deal_image','deal_discount_price','deal_discount_percentage','nm_maincategory.mc_name','nm_secmaincategory.smc_name','nm_subcategory.sb_name','nm_secsubcategory.ssb_name','deal_end_date','deal_id')
        ->where('deal_status', '=', 1)  //active deals
        ->where('deal_end_date', '>', $date)
        ->where('deal_start_date', '<', $date)
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
        ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')
        ->where('nm_maincategory.mc_status','=',1)
        ->where('nm_secmaincategory.smc_status','=',1);
        if(!empty($discount_filters))//if discount filter not null
            $sql->whereBetween('deal_discount_percentage', [$discount_filters[0], $discount_filters[1]]);
        return $sql->whereBetween('deal_discount_price', [$from_price, $to_price])
        ->orderBy(DB::raw('RAND()'))->get();
    }
   
    
    public static function get_deals_details_by_id($sid)
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_status', '=', 1)
        ->where('deal_id', '=', $sid)
        
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->get();
    }    

    public static function get_related_deals($id)
    {
        $date  = date('Y-m-d H:i:s');
        $catid = DB::table('nm_deals')->where('deal_id', '=', $id)->value('deal_main_category');
        return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_start_date','<=',$date)->where('deal_id', '!=', $id)->where('deal_main_category', '=', $catid)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->take(4)->get();
    }
    
    /*public static function get_all_action_details()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_auction.auc_category')
        ->get();
        
    }*/

    public static function getorderdetails($id)
    {
        return DB::select(DB::raw(" select * from nm_order o left join nm_product p on o.order_pro_id=p.pro_id and o.order_type=1 left join nm_deals d on o.order_pro_id=d.deal_id and o.order_type=2 where o.order_id in ($id)"));
  
    }

    public static function getordercoddetails($id)
    {  
        return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_ordercod.cod_pro_id')->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_ordercod.cod_pro_id')->groupBy('cod_id')->get();
       
    }

    /*public static function get_action_details_by_id($id)
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_id', '=', $id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_auction.auc_category')->get();
        
    }*/

    /*public static function get_related_auction($id)
    {
        $date  = date('Y-m-d H:i:s');
        $catid = DB::table('nm_auction')->where('auc_id', '=', $id)->value('auc_category');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_category', '=', $catid)->where('auc_id', '!=', $id)->get();
        
    }*/

    public static function get_selected_product_details($id)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->get();
    }

    public static function get_pro_rating_avg()
    {
        $result     = "";
        $rate_check = DB::table('nm_product')->where('pro_status', '=', 1)->get();
        foreach ($rate_check as $rate) {
            $rate_result = DB::table('nm_product_rating')->where('pro_id', '=', $rate->pro_id)->avg('pro_rating');
            if ($rate_result) {
                $result[$rate->pro_id] = $rate_result;
            } else {
                $result[$rate->pro_id] = Array();
            }
        }
        
        return $result;
    }

    public static function get_related_product_details($prod_det)
    {
        foreach ($prod_det as $pr_det) {
        }
        return DB::table('nm_product')->whereNotIn('pro_id', array(
            '1' => $pr_det->pro_id
        ))->where('pro_mc_id', '=', $pr_det->pro_mc_id)
            ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1)
        ->get();
    }
    
    public static function get_selected_product_color_details($prod_det)
    {
        foreach ($prod_det as $pr_det) {
          }  
            return DB::table('nm_procolor')->where('pc_pro_id', '=', $pr_det->pro_id)->LeftJoin('nm_color', 'nm_color.co_id', '=', 'nm_procolor.pc_co_id')->get();
        
    }

    public static function get_selected_product_size_details($prod_det)
    { 
        foreach ($prod_det as $pr_det) {
        }
        return DB::table('nm_prosize')->where('ps_pro_id', '=', $pr_det->pro_id)->LeftJoin('nm_size', 'nm_size.si_id', '=', 'nm_prosize.ps_si_id')->get();
        
    }

    public static function get_selected_product_spec_details($prod_det)
    {
        foreach ($prod_det as $pr_det) {
        }
        
        return DB::table('nm_prospec')->where('spc_pro_id', '=', $pr_det->pro_id)->Join('nm_specification', 'nm_specification.sp_id', '=', 'nm_prospec.spc_sp_id')->Join('nm_spgroup', 'nm_specification.sp_spg_id', '=', 'nm_spgroup.spg_id')->get();
    }

    


    public static function get_product_details_typeahed()
    {
        return DB::table('nm_product')
        ->where('pro_status', '=', 1)
        
        ->get();
        
    }
    
    public static function get_product_details_autosearch($like)
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_title', 'like', "%" . $like . "%")
        ->get();
    }

    public static function get_most_visited_product()
    {
        
        return DB::table('nm_product')->select('pro_discount_percentage','nm_product.pro_id','nm_product.pro_title','nm_product.pro_title_fr','nm_product.pro_Img','nm_product.pro_price','nm_product.pro_disprice','nm_product.pro_qty','nm_product.pro_no_of_purchase','nm_maincategory.mc_name','nm_secmaincategory.smc_name','nm_subcategory.sb_name','nm_secsubcategory.ssb_name')
        ->where('pro_status', '=', 1)
        ->where('sold_status', '=', 1)
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
        ->orderby('hit_count','desc')

        ->where('nm_maincategory.mc_status','=',1)
        ->where('nm_secmaincategory.smc_status','=',1)
        ->take(2)->get();
    }
    public static function get_most_visited_product_by_cat($id)
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)
        ->select('pro_discount_percentage','nm_product.pro_id','nm_product.pro_title','nm_product.pro_title_fr','nm_product.pro_Img','nm_product.pro_price','nm_product.pro_disprice','nm_product.pro_qty','nm_product.pro_no_of_purchase','nm_maincategory.mc_name','nm_secmaincategory.smc_name','nm_subcategory.sb_name','nm_secsubcategory.ssb_name')
        ->where('pro_mc_id','=',$id)
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
        ->orderby('hit_count','desc')
        ->where('nm_maincategory.mc_status','=',1)
        ->where('nm_secmaincategory.smc_status','=',1)
        ->take(2)->get();
    }

    /*public static function get_cat_most_visited_product($category_id){  //getting most visit product based on category
        return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_mc_id','=',$category_id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->orderby('hit_count','desc')->take(2)->get();
    }*/
     public static function get_cat_most_visited_product($id)
    {
        $get_listby_id = explode(",", $id);
        
        if ($get_listby_id[0] == 1) {
            return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_mc_id','=',$get_listby_id[1])
            ->select('pro_discount_percentage','nm_product.pro_id','nm_product.pro_title','nm_product.pro_title_fr','nm_product.pro_Img','nm_product.pro_price','nm_product.pro_disprice','nm_product.pro_qty','nm_product.pro_no_of_purchase','nm_maincategory.mc_name','nm_secmaincategory.smc_name','nm_subcategory.sb_name','nm_secsubcategory.ssb_name')
            ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->orderby('hit_count','desc')
           
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1)
            ->take(2)->get();
        } else if ($get_listby_id[0] == 2) {
            return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_smc_id','=',$get_listby_id[1])
            ->select('pro_discount_percentage','nm_product.pro_id','nm_product.pro_title','nm_product.pro_title_fr','nm_product.pro_Img','nm_product.pro_price','nm_product.pro_disprice','nm_product.pro_qty','nm_product.pro_no_of_purchase','nm_maincategory.mc_name','nm_secmaincategory.smc_name','nm_subcategory.sb_name','nm_secsubcategory.ssb_name')
            ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
          
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1)
            ->orderby('hit_count','desc')
            ->take(2)->get();
        } else if ($get_listby_id[0] == 3) {
            return DB::table('nm_product')->select('pro_discount_percentage','nm_product.pro_id','nm_product.pro_title','nm_product.pro_title_fr','nm_product.pro_Img','nm_product.pro_price','nm_product.pro_disprice','nm_product.pro_qty','nm_product.pro_no_of_purchase','nm_maincategory.mc_name','nm_secmaincategory.smc_name','nm_subcategory.sb_name','nm_secsubcategory.ssb_name')->where('pro_status', '=', 1)->where('pro_sb_id','=',$get_listby_id[1])->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->orderby('hit_count','desc')
           
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1)
            ->take(2)->get();
        } else if ($get_listby_id[0] == 4) {
            return DB::table('nm_product')->select('pro_discount_percentage','nm_product.pro_id','nm_product.pro_title','nm_product.pro_title_fr','nm_product.pro_Img','nm_product.pro_price','nm_product.pro_disprice','nm_product.pro_qty','nm_product.pro_no_of_purchase','nm_maincategory.mc_name','nm_secmaincategory.smc_name','nm_subcategory.sb_name','nm_secsubcategory.ssb_name')->where('pro_status', '=', 1)->where('ssb_id','=',$get_listby_id[1])
            ->join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
            ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
            ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
            ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
            ->orderby('hit_count','desc')
           
            ->where('nm_maincategory.mc_status','=',1)
            ->where('nm_secmaincategory.smc_status','=',1)
            ->take(2)->get();
        }
    }
    
    public static function get_product_details_use_catid($id)
    {
        return DB::table('nm_product')
        ->where('pro_status', '=', 1)
        ->where('pro_mc_id', '=', $id)
        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')

        ->where('nm_maincategory.mc_status','=',1)
        ->where('nm_secmaincategory.smc_status','=',1)
       // ->take(8)
        ->get();
    }

    public static function get_product_details_use_catid_text($id,$text){
        
        return DB::table('nm_product')
        ->where('pro_title', 'LIKE', '%' . $text . '%')
        ->where('pro_status', '=', 1)
        ->where('pro_mc_id', '=', $id)
        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')

        ->where('nm_maincategory.mc_status','=',1)
        ->where('nm_secmaincategory.smc_status','=',1)
        //->take(8)
        ->get();
    }
    
    public static function get_deals_details_use_catid($id)
    {
       $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')
        ->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_start_date', '<', $date)->where('deal_category', '=', $id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->get();
    }

    public static function get_deals_details_use_catid_text($id,$text)
    {
        $date = date('Y-m-d H:i:s');

        return DB::table('nm_deals')
        ->where('deal_title', 'LIKE', '%' . $text . '%')
        ->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)
        ->where('deal_start_date', '<', $date)->where('deal_category', '=', $id)
        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')

        ->where('nm_maincategory.mc_status','=',1)
        ->where('nm_secmaincategory.smc_status','=',1)

        ->get(); 
         
    }
    
    /*public static function get_auction_details_use_catid($id)
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_category', '=', $id)->get();
    }*/
    
    public static function get_deals_details()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_status', '=', 1)
         
         ->where('deal_start_date', '<', $date)
        ->where('deal_end_date', '>', $date)
        ->orderBy(DB::raw('RAND()'))->take(9)->get();
    }
    
    public static function get_left_side_special_product()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_status', '=', 1)
       // // ->where('deal_max_limit','>','deal_no_of_purchase')
         ->select('deal_no_of_purchase','deal_max_limit','deal_title','deal_title_fr','deal_image','deal_discount_price','deal_discount_percentage','nm_maincategory.mc_name','nm_secmaincategory.smc_name','nm_subcategory.sb_name','nm_secsubcategory.ssb_name','deal_end_date','deal_id')
        ->where('deal_end_date', '>', $date)
        ->where('deal_start_date', '<', $date)
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
        ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')
        ->where('nm_maincategory.mc_status','=',1)
        ->where('nm_secmaincategory.smc_status','=',1)
        ->orderBy(DB::raw('RAND()'))->take(2)->get();
    }
    
    /*public static function get_auction_details()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->orderBy(DB::raw('RAND()'))->take(3)->get();
    }*/

    public static function get_product_details_by_category($category_id)
    {
        
        if (count($category_id) > 0 ) {
            foreach ($category_id as $cat_id) {
                $cat_result              = DB::table('nm_product')
                                            ->where('pro_mc_id', '=', $cat_id->mc_id)
                                           
                                            ->get();
                $results[$cat_id->mc_id] = $cat_result;
            }
            
        } else {
            $results[0] = '';
        }
        return $results;
        
    }
       
    /*public static function facebook_login_check($fb_id, $fb_details)
    {
        if ($fb_id != '') {
            $fb_details1 = DB::table('nm_customer')->where('facebook_id', '=', $fb_id)->get();
            
            if ($fb_details1) {
                
                Session::put('username', $fb_details1[0]->cus_name);
                Session::put('customerid', $fb_details1[0]->cus_id);
                Session::put('facebookid', $fb_details1[0]->facebook_id);
                return "success";
            } else {
                
                $insert_fb = DB::table('nm_customer')->insert($fb_details);
                $fb_details = DB::table('nm_customer')->where('facebook_id', '=', $fb_id)->get();
                Session::put('username', $fb_details[0]->cus_name);
                Session::put('customerid', $fb_details[0]->cus_id);
                Session::put('facebookid', $fb_details[0]->facebook_id);
                return "success";
            }
        } else {
            return "error";
        }
    }*/
	public static function facebook_login_check($fb_id,$userEmail,$fb_details)
	{
		if($fb_id!='')
		{
			$fb_details1 = DB::table('nm_customer')->where('cus_email', '=', $userEmail)->get();

			if(count($fb_details1) > 0)
			{
				DB::table('nm_customer')->where('cus_email', $userEmail)->update(array('facebook_id' => $fb_id));
				Session::put('username',$fb_details1[0]->cus_name);
				Session::put('user_name',$fb_details1[0]->cus_name);
				Session::put('customerid',$fb_details1[0]->cus_id);
				Session::put('facebookid',$fb_details1[0]->facebook_id);
				return "success";
			}
			else
			{
				$insert_fb = DB::table('nm_customer')->insert($fb_details);
				$fb_details = DB::table('nm_customer')->where('facebook_id', '=', $fb_id)->get();

				Session::put('username',$fb_details[0]->cus_name);
				Session::put('user_name',$fb_details[0]->cus_name);
				Session::put('customerid',$fb_details[0]->cus_id);
				Session::put('facebookid',$fb_details[0]->facebook_id);

				$entry = array('cus_id' => $fb_details[0]->cus_id);
				$fb_details_intologin = DB::table('nm_login')->insert($entry);

				return "success1";
			}
		}
		else
		{
			return "error";
		}
	}
    
    public static function get_sold_deal_by_id()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')
        ->where('deal_status', '=', 1)
		->where('deal_end_date', '>', $date)
        //->where('deal_end_date', '<', $date) no need to show expire datas in front end(saranya)
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->get();
    }
    
   /* public static function get_sold_auction_by_id()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '<', $date)->get();
    }*/
    
    public static function get_sold_product_by_id()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
    }
    
   
  
        
    public static function get_cms_page_title()
    {
        return DB::table('nm_cms_pages')->select('cp_id','cp_title','cp_title_fr')->where('cp_status', '=', 1)->orderBy('cp_title', 'asc')->get();
    }

    public static function get_social_media_url()
    {
        return DB::table('nm_social_media')->where('sm_id', 1)->get();
    }

    public static function get_add_to_cart_details()
    {
        $get_pro_dea = "";
        if (isset($_SESSION['cart'])) {
            $max = count($_SESSION['cart']);
            for ($i = 0; $i < $max; $i++) {
                $pid               = $_SESSION['cart'][$i]['productid'];
                $pname             = "Have to get";
                $get_pro_dea[$pid] = DB::table('nm_product')->where('pro_id', $pid)->get();
            }
        } else {
            $get_pro_dea[0] = array();
        }
        return $get_pro_dea;
    }


    
    public static function get_add_to_cart_deal_details()
    {
        $get_pro_dea = "";
        if (isset($_SESSION['deal_cart'])) {
            $max = count($_SESSION['deal_cart']);
            for ($i = 0; $i < $max; $i++) {
                $pid               = $_SESSION['deal_cart'][$i]['productid'];
                $pname             = "Have to get";
                $get_pro_dea[$pid] = DB::table('nm_deals')->where('deal_id', $pid)->get();
            }
        } else {
            $get_pro_dea[0] = array();
        }
        return $get_pro_dea;
    }
    
    public static function get_add_to_cart_size()
    {
        $color_result = "";
        if (isset($_SESSION['cart'])) {
            $max = count($_SESSION['cart']);
            for ($i = 0; $i < $max; $i++) {
                $size = $_SESSION['cart'][$i]['size'];
                if ($size != '') {
                    $pname    = "Have to get";
                    $size_tab = DB::table('nm_size')->where('si_id', '=', $size)->get();
                    if (count($size_tab)>0) {
                        foreach ($size_tab as $sizename) {
                        }
                        $color_result[$size] = $sizename->si_name;
                    } else {
                        $color_result[$size] = '-';
                    }
                } else {
                    $color_result[$size] = '-';
                }
            }
        } else {
            $color_result[0] = array();
        }
        return $color_result;
    }

    public static function get_add_to_cart_color()
    {
        $color_result = "";
        if (isset($_SESSION['cart'])) {
            $max = count($_SESSION['cart']);
            for ($i = 0; $i < $max; $i++) {
                $color = $_SESSION['cart'][$i]['color'];
                if ($color != '') {
                    $pname     = "Have to get";
                    $color_tab = DB::table('nm_color')->where('co_id', '=', $color)->get();
                    if (count($color_tab)>0) {
                        foreach ($color_tab as $colorname) {
                        }
                        $color_result[$color] = $colorname->co_name;
                    } else {
                        $color_result[$color] = '-';
                    }
                } else {
                    $color_result[$color] = '-';
                }
            }
        } else {
            $color_result[0] = array();
            ;
        }
        return $color_result;
    }

    public static function get_added_product_details($cart_id, $cart_color, $cart_size)
    {
        $max = count($_SESSION['cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($cart_id == $_SESSION['cart'][$i]['productid']) {
                if ($cart_color == $_SESSION['cart'][$i]['color']) {
                    if ($cart_size == $_SESSION['cart'][$i]['size']) {
                        return 1;
                        break;
                    }
                }
            }
        }
        
    }
    
    public static function get_added_deal_details($cart_id)
    {
        $max = count($_SESSION['deal_cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($cart_id == $_SESSION['deal_cart'][$i]['productid']) {
                return 1;
                break;
            }
        }
        
    }
    
    public static function get_already_deals_details($cart_id)
    {
        $max = count($_SESSION['deal_cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($cart_id == $_SESSION['deal_cart'][$i]['productid']) {
                $qty = $_SESSION['deal_cart'][$i]['qty'];
                break;
            }
        }
        $get_pro_dea = DB::table('nm_deals')->where('deal_id', $cart_id)->get();
        return $get_pro_dea[0]->deal_title . ' is already present in your cart. Modify quantity from below
You have now ' . $qty . ' Product(s) in your cart.';
        
    }
    
    public static function get_already_product_details($cart_id)
    {
        $max = count($_SESSION['cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($cart_id == $_SESSION['cart'][$i]['productid']) {
                $qty = $_SESSION['cart'][$i]['qty'];  
                break;
            }
        }
        $get_pro_dea = DB::table('nm_product')->where('pro_id', $cart_id)->get();
        return $get_pro_dea[0]->pro_title . ' is already present in your cart. Modify quantity from below
You have now ' . $qty . ' Product(s) in your cart.';
        
    }
    
    public static function get_estimate_zipcode_range($range)
    {
        return DB::table('nm_estimate_zipcode')->where('ez_code_series', '<=', $range)->where('ez_code_series_end', '>=', $range)->get();
    }

    public static function purchased_checkout_product_insert($pid,$qty)
    {  
        $check                  = DB::table('nm_product')->where('pro_id', $pid)->get();
        $pro_no_of_purchase     = $check[0]->pro_no_of_purchase;
        $new_pro_no_of_purchase = $pro_no_of_purchase + $qty;
        foreach ($check as $row) {
            $pur      = $row->pro_no_of_purchase;
            $purchase = $pur + 1;
            $quantity = $row->pro_qty;
        }
        if($purchase >= $quantity) {
            return DB::table('nm_product')->where('pro_id', $pid)->update(array(
                'pro_no_of_purchase' => $new_pro_no_of_purchase,
                'sold_status' => 0
            ));
        }elseif ($purchase < $quantity) {
            
            return DB::table('nm_product')->where('pro_id', $pid)->update(array(
                'pro_no_of_purchase' => $new_pro_no_of_purchase
            ));
        }
        
    }

    

    public static function purchased_checkout_deal_insert($deal_id,$qty){
        $check                  = DB::table('nm_deals')->where('deal_id', $deal_id)->get();
        $deal_no_of_purchase     = $check[0]->deal_no_of_purchase;
        $new_deal_no_of_purchase = $deal_no_of_purchase + $qty;
        foreach ($check as $row) {
            $pur      = $row->deal_no_of_purchase;
            $purchase = $pur + 1;
            $quantity = $row->deal_max_limit;
        }
        //echo $new_deal_no_of_purchase;
        //exit();
        //if($purchase >= $quantity) {
            return DB::table('nm_deals')->where('deal_id', $deal_id)->update(array(
                'deal_no_of_purchase' => $new_deal_no_of_purchase,
            ));
        /*}elseif ($purchase < $quantity) {
            
            return DB::table('nm_deals')->where('deal_id', $deal_id)->update(array(
                'deal_no_of_purchase' => $new_deal_no_of_purchase
            ));
        }*/
        
    }
    public static function paypal_checkout_insert($data)
    {
        return DB::table('nm_order')->insert($data);
    }

    public static function insert_shipping_addr($data, $cust_id)
    {
        return DB::table('nm_shipping')->insert($data);
        
    }

    public static function cod_checkout_insert($data)
    {
        return DB::table('nm_ordercod')->insert($data);
        
    }

    public static function trans_check($transaction_id)
    {
        return DB::table('nm_ordercod')->where('cod_transaction_id', $transaction_id)->get();
        
    }

    public static function paypal_checkout_update($data, $insert_id)
    {
        $insert_id_exp   = explode(',', $insert_id);
        $insert_id_count = count($insert_id_exp);
        for ($i = 0; $i < $insert_id_count; $i++) {
            $result         = DB::table('nm_order')->where('order_id', '=', $insert_id_exp[$i])->update($data);
            $order_pro_type = DB::table('nm_order')->where('order_id', $insert_id_exp[$i])->value('order_type');
            $order_pro_id   = DB::table('nm_order')->where('order_id', $insert_id_exp[$i])->value('order_pro_id');
            $order_pro_qty  = DB::table('nm_order')->where('order_id', $insert_id_exp[$i])->value('order_qty'); 
            if ($order_pro_type == 1) {
                #product    
               /*  $last_count_purchase = DB::table('nm_product')->where('pro_id', $order_pro_id)->value('pro_no_of_purchase');
                $last_count_new      = $last_count_purchase + $order_pro_qty; 
                $entry               = array(
                    'pro_no_of_purchase' => $last_count_new
                );
                DB::table('nm_product')->where('pro_id', '=', $order_pro_id)->update($entry); */
                
            } else if ($order_pro_type == 2) {
                #deals      
                /* $last_count_purchase = DB::table('nm_deals')->where('deal_id', $order_pro_id)->value('deal_no_of_purchase');
                $last_count_new      = $last_count_purchase + $order_pro_qty;
                $entry               = array(
                    'deal_no_of_purchase' => $last_count_new
                );
                DB::table('nm_deals')->where('deal_id', '=', $order_pro_id)->update($entry); */
                
            }
        }
        return $result;
    }
    
    public static function save_bidding_details($entry)
    {
        return DB::table('nm_order_auction')->insert($entry);
    }
    
    public static function auction_last_bidder($auction_details)
    {
        $result = "";
        foreach ($auction_details as $auction) {
            $auction_result = DB::table('nm_order_auction')->orderBy('oa_id', 'desc')->take(1)->where('oa_pro_id', '=', $auction->auc_id)->get();
            foreach ($auction_result as $auction_biddeer_name) {
            }
            if ($auction_result) {
                $result[$auction->auc_id] = $auction_biddeer_name->oa_cus_name;
            } else {
                
                $result[$auction->auc_id] = array();
            }
            
        }
        return $result;
        
    }
    
    public static function max_bid_amt($id)
    {
        
        $result = DB::table('nm_order_auction')->where('oa_pro_id', '=', $id)->max('oa_bid_amt');
        if ($result) {
            return $result;
        } else {
            return '';
        }
    }
    
    public static function get_bidder_by_id($id)
    {
        
        $auction_result = DB::table('nm_order_auction')->orderBy('oa_id', 'desc')->take(5)->where('oa_pro_id', '=', $id)->get();
        if ($auction_result) {
            return $auction_result;
        } else {
            return '';
        }
        
    }

    public static function get_paypal_credentials()
    {
        return DB::table('nm_paymentsettings')->where('ps_id', '=', 1)->get();
    }

    public static function get_fb_app_id()
    {
        return DB::table('nm_social_media')->where('sm_id', '=', 1)->value('sm_fb_app_id');
    }
    
    public static function get_product_search($id)
    {
        return DB::table('nm_product')
        ->where('pro_title', 'LIKE', '%' . $id . '%')
        ->where('pro_status' , '=' , 1)
        ->Join('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->Join('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')

        ->where('nm_maincategory.mc_status','=',1)
        ->where('nm_secmaincategory.smc_status','=',1)
        ->orderby('nm_product.pro_id','desc')
        ->get();
    }

    public static function get_deal_search($id)
    {
        $date=date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_title', 'LIKE', '%' . $id . '%')
        ->where('deal_end_date', '>', $date)
        ->where('deal_start_date', '<', $date)
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')
        ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')
        ->orderby('nm_deals.deal_id','desc')
        ->get();

    }
    
    public static function insert_enquiry($entry)
    {
        return DB::table('nm_enquiry')->insert($entry);
    }

    public static function get_settings()
    {
        
        return DB::table('nm_paymentsettings')->where('ps_id', '=', '1')->get();
        
    }

    public static function get_breadcrumb_category($id)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->get();
        
    }

    public static function get_breadcrumb_deal($id)
    {
        return DB::table('nm_deals')->where('deal_id', '=', $id)->get();
        
    }

    public static function comment_insert($entry)
    {
        return DB::table('nm_review')->insert($entry);
    }

    public static function get_countone($id)
    {
        return DB::table('nm_review')->where('product_id', '=', $id)->where('ratings', '=', 1)->count();
    }

    public static function get_counttwo($id)
    {
        return DB::table('nm_review')->where('product_id', '=', $id)->where('ratings', '=', 2)->count();
  
    }

    public static function get_countthree($id)
    {
       return DB::table('nm_review')->where('product_id', '=', $id)->where('ratings', '=', 3)->count();
    }

    public static function get_countfour($id)
    {
        return DB::table('nm_review')->where('product_id', '=', $id)->where('ratings', '=', 4)->count();
    }

    public static function get_countfive($id)
    {
        return DB::table('nm_review')->where('product_id', '=', $id)->where('ratings', '=', 5)->count();
    
    }

    public static function get_customer_details()
    {
         return DB::table('nm_review')->LeftJoin('nm_customer', 'nm_review.customer_id', '=', 'nm_customer.cus_id')->get();
    }

    public static function get_review_details()
    {
         return DB::table('nm_review')->where('status', '=', 0)->get();
    }

    public static function get_product_review_details($product_id){
        return DB::table('nm_review')->where('product_id','=',$product_id)
        ->orderby('comment_id','desc')
        ->leftjoin('nm_customer','nm_customer.cus_id','=','nm_review.customer_id')
        ->where('nm_review.status', '=', 0)
        ->get();
    }

    public static function get_deal_review_details($deal_id){
        return DB::table('nm_review')->where('deal_id','=',$deal_id)
        ->orderby('comment_id','desc')
        ->leftjoin('nm_customer','nm_customer.cus_id','=','nm_review.customer_id')
        ->where('nm_review.status', '=', 0)
        ->get();
    }
    public static function get_store_review_details($store_id){
        return DB::table('nm_review')->where('store_id','=',$store_id)
        ->orderby('comment_id','desc')
        ->leftjoin('nm_customer','nm_customer.cus_id','=','nm_review.customer_id')
        ->where('nm_review.status', '=', 0)
        ->get();
    }

    public static function get_review_by_id($id)
    {
         //return DB::table('nm_review')->where('status', '=', 0)->where('product_id','=',$product_id)->get();

         return DB::table('nm_product')->where('nm_review.status', '=', 0)->where('nm_review.product_id', '=', $id)->join('nm_review','nm_review.product_id','=','nm_product.pro_id')->get();
    }
    public static function get_prd_deatils($id)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->get();
           }
    
    public static function get_dealcountone($id)
    {
        return DB::table('nm_review')->where('deal_id', '=', $id)->where('ratings', '=', 1)->count();
    }

    public static function get_dealcounttwo($id)
    {
       return DB::table('nm_review')->where('deal_id', '=', $id)->where('ratings', '=', 2)->count();
    }

    public static function get_dealcountthree($id)
    {
       return DB::table('nm_review')->where('deal_id', '=', $id)->where('ratings', '=', 3)->count();
    }

    public static function get_dealcountfour($id)
    {
        return DB::table('nm_review')->where('deal_id', '=', $id)->where('ratings', '=', 4)->count();
    }

    public static function get_dealcountfive($id)
    {
        return DB::table('nm_review')->where('deal_id', '=', $id)->where('ratings', '=', 5)->count();
    }
    
    public static function get_deal_deatils($id)
    {
        return  DB::table('nm_deals')->where('deal_id', '=', $id)->get();
       
    }


    public static function get_women_cat_title()
    {
        return DB::table('nm_maincategory')->where('mc_id', '=', 3)->get();
    }

    public static function get_category_product()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
        ->get();
      
    }

    public static function get_women_product()
    {
        $product = DB::table('nm_product')
        ->where('pro_status', '=', 1)
       
        ->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')
        ->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')
        ->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')
        ->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')
      
        ->get();
        foreach ($product as $women) {
            $prod_cat_id = $women->pro_mc_id;
            
        }
        if (empty($prod_cat_id)) {
            return DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->take(5)->get();
        } else {
            return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_mc_id', '=', $prod_cat_id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->take(5)->get();
        }
    }
    
    public static function get_storecountone($id)
    {
       return DB::table('nm_review')->where('store_id', '=', $id)->where('ratings', '=', 1)->count();
    }

    public static function get_storecounttwo($id)
    {
      return DB::table('nm_review')->where('store_id', '=', $id)->where('ratings', '=', 2)->count();
    }

    public static function get_storecountthree($id)
    {
      return DB::table('nm_review')->where('store_id', '=', $id)->where('ratings', '=', 3)->count();
    }

    public static function get_storecountfour($id)
    {
      return DB::table('nm_review')->where('store_id', '=', $id)->where('ratings', '=', 4)->count();
    }

   
    public static function get_default_city()
    {
        return DB::table('nm_city')->where('ci_default', '=', 1)->get();
    }

    public static function get_smtp_mail()
    {
        return DB::table('nm_smtp')->where('sm_isactive', '=', 1)->get();
    }

    public static function get_general_settings()
    {
        return DB::table('nm_generalsetting')->get();
    }  
    
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

    /* Get Merchant Based Transaction ID paypal order */
    public static function get_PayPalOrd_merchant_based_transaction_id($trans_id)
    {
        return DB::table('nm_order')->select('transaction_id','order_merchant_id','order_pro_id','order_type')->where('transaction_id','=',$trans_id)->groupBy('order_merchant_id')->get();
    }

    /* Merchant mail subtotal calculation paypal order */
    public static function get_PayPalOrd_mer_subtotal($transid,$merchant_id)
    {
        return DB::table('nm_order')->where('transaction_id', '=', $transid)->where('order_merchant_id','=',$merchant_id)->sum('order_amt');
        
    }
    /* Merchant mail tax calculation paypal order*/
    public static function get_PayPalOrd_mer_tax($transid,$merchant_id)
    {
        return DB::table('nm_order')->where('transaction_id', '=', $transid)->where('order_merchant_id','=',$merchant_id)->sum('order_tax');
    }
    /* Merchant mail shipping amount calculation paypal order */
    public static function get_PayPalOrd_mer_shipping_amount($transid,$merchant_id)
    {
        return DB::table('nm_order')->where('transaction_id', '=', $transid)->where('order_merchant_id','=',$merchant_id)
        ->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_order.order_pro_id')
        ->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_order.order_pro_id')
        ->sum('order_shipping_amt');
    }



    /* Get Merchant Based Transaction ID COD order */
    public static function get_merchant_based_transaction_id($trans_id)
    {
        return DB::table('nm_ordercod')->select('cod_transaction_id','cod_merchant_id','cod_pro_id','cod_order_type')->where('cod_transaction_id','=',$trans_id)->groupBy('cod_merchant_id')->get();
    }
   
    public static function get_mer_subtotal($transid,$merchant_id)
    {
        return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $transid)->where('cod_merchant_id','=',$merchant_id)->sum('cod_amt');
        
    }
    /* Merchant mail tax calculation */
    public static function get_mer_tax($transid,$merchant_id)
    {
        return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $transid)->sum('cod_tax');
    }
    /* Merchant mail shipping amount calculation */
    public static function get_mer_shipping_amount($transid,$merchant_id)
    {
        return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $transid)->where('cod_merchant_id','=',$merchant_id)
        ->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_ordercod.cod_pro_id')
        ->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_ordercod.cod_pro_id')
        ->sum('cod_shipping_amt');
    }
    /* Get Transaction ID for paypal payment */
    
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
    
    
    public static function get_order_subtotal($id)
    {
        return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)->sum('cod_amt');
    }
    
    public static function get_order_tax($id)
    {
        return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)->sum('cod_tax');
    }
    
    public static function get_order_shipping_amount($id)
    {
        return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)
        ->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_ordercod.cod_pro_id')
        ->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_ordercod.cod_pro_id')
        ->sum('cod_taxAmt');
    }
    
    public static function wallet_update($cash_pack)
    {
      DB::table('nm_customer')->where('cus_id', '=', Session::get('customerid'))->update($cash_pack);  
    }

    public static function wallet_final_update($finaldata)
    {
      DB::table('nm_customer')->where('cus_id', '=', Session::get('customerid'))->update($finaldata);
    }
    public static function wallet_order_used_update($finaluseddata)
    {
      DB::table('nm_ordercod_wallet')->insert($finaluseddata);
    }
   
   

    public static function last_trans_id(){
        return DB::table('nm_ordercod')->orderBy('cod_id', 'desc')->value("cod_transaction_id");
    }

    public static function hit_count($product_id){              //getting product hit count
        return DB::table('nm_product')->select('hit_count')->where('pro_id','=',$product_id)->get();
    }

    public static function product_hit($product_id,$hit_count){     //adding hit count for product
        $update  = array('hit_count' => $hit_count);
        return DB::table('nm_product')->where('pro_id','=',$product_id)->update($update);
    }

    public static function paypal_trans_id($ship_trans_id,$order_id){
        return DB::table('nm_shipping')->where('ship_order_id','=',$order_id)->update($ship_trans_id);
    }
    
    public static function get_city(){
        return DB::table('nm_city')->get();
    }
    
    public static function check_wishlist($pro_id,$cus_id){
        return DB::table('nm_wishlist')->where('ws_pro_id','=',$pro_id)->where('ws_cus_id','=',$cus_id)->count();
    }

    public static function get_count_review_rating($pro_id){
        return DB::table('nm_review')->where('product_id','=',$pro_id)->count();
    }
    public static function get_count_deal_review_rating($deal_id){
        return DB::table('nm_review')->where('deal_id','=',$deal_id)->count();
    }

    /* Get Spcefication Groups of single product id */
    public static function get_selected_product_spec_group($prod_det)
    {
        foreach ($prod_det as $pr_det) {
        }
        
        return DB::table('nm_prospec')->select('nm_spgroup.*','nm_prospec.spc_pro_id')->where('spc_pro_id', '=', $pr_det->pro_id)->Join('nm_spgroup', 'nm_prospec.spc_spg_id', '=', 'nm_spgroup.spg_id')->groupby('nm_spgroup.spg_id')->get();
    }
    /* Get Spcefication  of single product by product and spec group id */
    public static function get_selected_product_spec_det_by_SpcGrp($spg_id,$prod_id){
        return DB::table('nm_prospec')->select('nm_specification.*','nm_prospec.spc_pro_id')->where('spc_pro_id', '=', $prod_id)->Join('nm_specification', 'nm_specification.sp_id', '=', 'nm_prospec.spc_sp_id')->where('nm_specification.sp_spg_id', '=', $spg_id)->groupby('nm_prospec.spc_sp_id')->get();
    }
    /* Get Spcefication  of single product by product and spec id */
    public static function get_selected_product_spec_det_by_Spc($spg_id,$sp_id,$prod_id){
        return DB::table('nm_prospec')->select('spc_value','spc_value_fr')->where('spc_pro_id', '=', $prod_id)->where('nm_prospec.spc_spg_id', '=', $spg_id)->where('spc_sp_id', '=', $sp_id)->get();
    }
    /* wishlist exit check in product view page */
    public static function exist_wishlist($pro_id,$cus_id){
        return DB::table('nm_wishlist')->where('ws_pro_id','=',$pro_id)->where('ws_cus_id','=',$cus_id)->first();
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
    public static function get_product_cart_by_userid($user_id,$cart_type='')
    {
        $sql =  DB::table('nm_save_cart')->where('cart_user_id', '=', $user_id);
        if($cart_type!=''){
            $sql->where('cart_type', '=', $cart_type);
        }
        return $sql->get();
        
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
    /* DELETE CART DETAILS BY USER ID */
    public static function delete_cart_by_user_id($user_id)
    {
        return DB::table('nm_save_cart')->where('cart_user_id', '=', $user_id)->delete();
    }

    /* Product available qunatity */
    public static function get_availableProductQuantity($productid,$qnty){
        return DB::table('nm_product')->select()->where('pro_id', '=', $productid)->whereRaw('pro_qty - pro_no_of_purchase >= '.$qnty)->first();
    }
    /* DEal available qunatity */
    public static function get_availableDealQuantity($productid,$qnty){
        return DB::table('nm_deals')->select()->where('deal_id', '=', $productid)->whereRaw('deal_max_limit - deal_no_of_purchase >='.$qnty)->first();
    }
    /* check cart product valid and available */
    public static function getCartProdValid($dataAr){


        $query = DB::table('nm_product AS p')->select('p.*')->where('p.pro_id','=',$dataAr['prod_id']);
        $query->where('p.pro_status','=','1');
        $query->whereRaw('p.pro_qty - p.pro_no_of_purchase >= '.$dataAr['qty']);

        if($dataAr['mc_id']!=0){
            $query->Join('nm_maincategory AS pmc','pmc.mc_id','=','p.pro_mc_id');
            $query->where('pmc.mc_status','=','1');
        }
        if($dataAr['smc_id']!=0){
            $query->Join('nm_secmaincategory AS psmc','psmc.smc_id','=','p.pro_smc_id');
            $query->where('psmc.smc_status','=','1');
        }
        if($dataAr['sb_id']!=0){
            $query->Join('nm_subcategory AS psb', 'psb.sb_id', '=', 'p.pro_sb_id');
            $query->where('psb.sb_status','=','1');
        }
        if($dataAr['ssb_id']!=0){
            $query->Join('nm_secsubcategory AS pssb', 'pssb.ssb_id', '=', 'p.pro_ssb_id');
            $query->where('pssb.ssb_status','=','1');
        }
        if($dataAr['color']!=0){
            $query->Join('nm_procolor AS pcolr','pcolr.pc_pro_id','=','p.pro_id');
            $query->where('pcolr.pc_co_id','=',$dataAr['color']);
        }if($dataAr['size']!=0){
            $query->Join('nm_prosize AS psiz','psiz.ps_pro_id','=','p.pro_id');
            $query->where('psiz.ps_si_id','=',$dataAr['size']);
        }
        return $query->get();
    }

     /* check cart product valid and available */
    public static function getCartDealValid($dataAr){

        $validDate = " ( (p.deal_start_date <= '".date("Y-m-d H:i:s")."' ) or "." (p.deal_end_date >= '".date("Y-m-d H:i:s")."')) "; 
        $query = DB::table('nm_deals AS p')->select('p.*')->where('p.deal_id','=',$dataAr['prod_id']);
        $query->where('p.deal_status','=','1');
        $query->whereRaw($validDate);
        
        $query->whereRaw('p.deal_max_limit - p.deal_no_of_purchase >= '.$dataAr['qty']);

               if($dataAr['mc_id']!=0){
            $query->Join('nm_maincategory AS pmc','pmc.mc_id','=','p.deal_category');
            $query->where('pmc.mc_status','=','1');
        }
        if($dataAr['smc_id']!=0){
            $query->Join('nm_secmaincategory AS psmc','psmc.smc_id','=','p.deal_main_category');
            $query->where('psmc.smc_status','=','1');
        }
        if($dataAr['sb_id']!=0){
            $query->Join('nm_subcategory AS psb', 'psb.sb_id', '=', 'p.deal_sub_category');
            $query->where('psb.sb_status','=','1');
        }
        if($dataAr['ssb_id']!=0){
            $query->Join('nm_secsubcategory AS pssb', 'pssb.ssb_id', '=', 'p.deal_second_sub_category');
            $query->where('pssb.ssb_status','=','1');
        }
       /* DB::connection()->enableQueryLog();
        $query->get();
        $query = DB::getQueryLog();
        print_r($query);*/
        return $query->get();
    }

    /*  cart products price array */
    public static function get_cart_prodPriceQty_sum()
    {
        $product_qty_price = 0;
        if (isset($_SESSION['cart'])) {
            $max = count($_SESSION['cart']);
            for ($i = 0; $i < $max; $i++) {
                $pid               = $_SESSION['cart'][$i]['productid'];
                $pname             = "Have to get";
                $session_cart_result = DB::table('nm_product')->where('pro_id', $pid)->first();
                $product_qty_price += ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);
            }
        }
        return $product_qty_price;
    }
    /*  cart products price array ends */

     /* deal  cart products price array */
    public static function get_dealCart_prodPriceQty_sum()
    {
        $product_qty_price = 0;
        if (isset($_SESSION['deal_cart'])) {
            $max = count($_SESSION['deal_cart']);
            for ($i = 0; $i < $max; $i++) {
                $pid               = $_SESSION['deal_cart'][$i]['productid'];
                $pname             = "Have to get";
                $session_cart_result = DB::table('nm_deals')->where('deal_id', $pid)->first();
                
                $product_qty_price += ($_SESSION['deal_cart'][$i]['qty']) * ($session_cart_result->deal_discount_price);
            }
        }
        return $product_qty_price;
    }
    /* deal cart products price array ends */


    /*  cart products price array */
    public static function get_cart_prodPriceQty_sum_with_taxShip()
    {
        $product_qty_price = $tot_taxAmt = $tot_ship_amt = 0 ;
        if (isset($_SESSION['cart'])) {
            $max = count($_SESSION['cart']);
            for ($i = 0; $i < $max; $i++) {
                $pid               = $_SESSION['cart'][$i]['productid'];
                $pname             = "Have to get";
                $session_cart_result = DB::table('nm_product')->where('pro_id', $pid)->first();
                $qty_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);
                $product_qty_price += ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);
                $shipping_amt       = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_shippamt);
                $tax_amt            = round ((($qty_price) * ($session_cart_result->pro_inctax) / 100),2);
                $tot_taxAmt         +=  $tax_amt;
                $tot_ship_amt       +=  $shipping_amt;

            }
        }
        return $product_qty_price + $tot_taxAmt + $tot_ship_amt;
    }
    /*  cart products price array ends */

     /* deal  cart products price array */
    public static function get_dealCart_prodPriceQty_sum_with_taxShip()
    {
        $product_qty_price = $tot_taxAmt = $tot_ship_amt = 0 ;
        if (isset($_SESSION['deal_cart'])) {
            $max = count($_SESSION['deal_cart']);
            for ($i = 0; $i < $max; $i++) {
                $pid               = $_SESSION['deal_cart'][$i]['productid'];
                $pname             = "Have to get";
                $session_cart_result = DB::table('nm_deals')->where('deal_id', $pid)->first();
                
                $qty_price          = ($_SESSION['deal_cart'][$i]['qty']) * ($session_cart_result->deal_discount_price);
                $product_qty_price += ($_SESSION['deal_cart'][$i]['qty']) * ($session_cart_result->deal_discount_price);

                $shipping_amt       = ($_SESSION['deal_cart'][$i]['qty']) * ($session_cart_result->deal_shippamt);
                $tax_amt            = round ((($qty_price) * ($session_cart_result->deal_inctax) / 100),2);
                $tot_taxAmt         +=  $tax_amt;
                $tot_ship_amt       +=  $shipping_amt;
            }
        }
        return $product_qty_price + $tot_taxAmt + $tot_ship_amt;
    }
    /* deal cart products price array ends */

    public static function sumOfOrderCodAmount($mer_id,$trans_id){
        
        return DB::table('nm_ordercod AS ordCod1')
            ->select(
                DB::raw("SUM(ordCod1.cod_amt) as sumCodAmt,
                   (SELECT SUM(ordCod2.cod_tax) FROM nm_ordercod AS ordCod2 WHERE ordCod1.cod_merchant_id = ordCod2.cod_merchant_id) AS sumTax,
                   (SELECT SUM(ordCod3.cod_shipping_amt) FROM nm_ordercod AS ordCod3 WHERE ordCod1.cod_merchant_id = ordCod3.cod_merchant_id) AS sumShippingAmt,
                   (SELECT SUM(ordCod4.coupon_amount) FROM nm_ordercod AS ordCod4 WHERE ordCod1.cod_merchant_id = ordCod4.cod_merchant_id) AS sumCoupon,
                   (SELECT SUM(ordCod5.wallet_amount) FROM nm_ordercod AS ordCod5 WHERE ordCod1.cod_merchant_id = ordCod5.cod_merchant_id) AS sumWallet,
                   (SELECT SUM(ordCod6.mer_commission_amt) FROM nm_ordercod AS ordCod6 WHERE ordCod1.cod_merchant_id = ordCod6.cod_merchant_id) AS sumMerchantCommission,
                   (SELECT SUM(ordCod7.mer_amt) FROM nm_ordercod AS ordCod7 WHERE ordCod1.cod_merchant_id = ordCod7.cod_merchant_id) AS sumMerchantAmount   
                   "
                )
            )
        ->where('ordCod1.cod_transaction_id', '=', $trans_id)->where('ordCod1.cod_merchant_id', '=', $mer_id)->first();
       
        
    }
    public static function sumOfOrderCodAmount_single($mer_id,$trans_id){
        
        return DB::table('nm_ordercod AS ordCod1')
            ->select(
                DB::raw("SUM(ordCod1.cod_amt) as sumCodAmt,
                   (SELECT SUM(ordCod2.cod_tax) FROM nm_ordercod AS ordCod2 WHERE ordCod1.cod_merchant_id = ordCod2.cod_merchant_id and ordCod1.cod_transaction_id = ordCod2.cod_transaction_id) AS sumTax,
                   (SELECT SUM(ordCod3.cod_shipping_amt) FROM nm_ordercod AS ordCod3 WHERE ordCod1.cod_merchant_id = ordCod3.cod_merchant_id  and ordCod1.cod_transaction_id = ordCod3.cod_transaction_id) AS sumShippingAmt,
                   (SELECT SUM(ordCod4.coupon_amount) FROM nm_ordercod AS ordCod4 WHERE ordCod1.cod_merchant_id = ordCod4.cod_merchant_id  and ordCod1.cod_transaction_id = ordCod4.cod_transaction_id) AS sumCoupon,
                   (SELECT SUM(ordCod5.wallet_amount) FROM nm_ordercod AS ordCod5 WHERE ordCod1.cod_merchant_id = ordCod5.cod_merchant_id  and ordCod1.cod_transaction_id = ordCod5.cod_transaction_id) AS sumWallet,
                   (SELECT SUM(ordCod6.mer_commission_amt) FROM nm_ordercod AS ordCod6 WHERE ordCod1.cod_merchant_id = ordCod6.cod_merchant_id  and ordCod1.cod_transaction_id = ordCod6.cod_transaction_id) AS sumMerchantCommission,
                   (SELECT SUM(ordCod7.mer_amt) FROM nm_ordercod AS ordCod7 WHERE ordCod1.cod_merchant_id = ordCod7.cod_merchant_id  and ordCod1.cod_transaction_id = ordCod7.cod_transaction_id) AS sumMerchantAmount   
                   "
                )
            )
        ->where('ordCod1.cod_transaction_id', '=', $trans_id)->where('ordCod1.cod_merchant_id', '=', $mer_id)->first();
       
        
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
    public static function sumOfOrderAmount($mer_id,$trans_id){
        //DB::connection()->enableQueryLog();

        return DB::table('nm_order AS ord1')
            ->select(
                DB::raw("SUM(ord1.order_amt) as sumOrdAmt,
                   (SELECT SUM(ord2.order_tax)  FROM nm_order AS ord2 WHERE ord1.order_merchant_id = ord2.order_merchant_id) AS sumTax,
                   (SELECT SUM(ord3.order_shipping_amt) FROM nm_order AS ord3 WHERE ord1.order_merchant_id = ord3.order_merchant_id) AS sumShippingAmt,
                   (SELECT SUM(ord4.coupon_amount) FROM nm_order AS ord4 WHERE ord1.order_merchant_id = ord4.order_merchant_id) AS sumCoupon,
                   (SELECT SUM(ord5.wallet_amount) FROM nm_order AS ord5 WHERE ord1.order_merchant_id = ord5.order_merchant_id) AS sumWallet,
                   (SELECT SUM(ord6.mer_commission_amt) FROM nm_order AS ord6 WHERE ord1.order_merchant_id = ord6.order_merchant_id) AS sumMerchantCommission,
                   (SELECT SUM(ord7.mer_amt) FROM nm_order AS ord7 WHERE ord1.order_merchant_id = ord7.order_merchant_id) AS sumMerchantAmount  
                   "
                )
            )
        ->where('ord1.transaction_id', '=', $trans_id)->where('ord1.order_merchant_id', '=', $mer_id)->first();
       
       // $query = DB::getQueryLog();
        //print_r($query);
    }
    public static function sumOfOrderAmount_single($mer_id,$trans_id){
        //DB::connection()->enableQueryLog();

        return DB::table('nm_order AS ord1')
            ->select(
                DB::raw("SUM(ord1.order_amt) as sumOrdAmt,
                   (SELECT SUM(ord2.order_tax)  FROM nm_order AS ord2 WHERE ord1.order_merchant_id = ord2.order_merchant_id and ord1.transaction_id = ord2.transaction_id ) AS sumTax,
                   (SELECT SUM(ord3.order_shipping_amt) FROM nm_order AS ord3 WHERE ord1.order_merchant_id = ord3.order_merchant_id  and ord1.transaction_id = ord3.transaction_id) AS sumShippingAmt,
                   (SELECT SUM(ord4.coupon_amount) FROM nm_order AS ord4 WHERE ord1.order_merchant_id = ord4.order_merchant_id  and ord1.transaction_id = ord4.transaction_id) AS sumCoupon,
                   (SELECT SUM(ord5.wallet_amount) FROM nm_order AS ord5 WHERE ord1.order_merchant_id = ord5.order_merchant_id  and ord1.transaction_id = ord5.transaction_id) AS sumWallet,
                   (SELECT SUM(ord6.mer_commission_amt) FROM nm_order AS ord6 WHERE ord1.order_merchant_id = ord6.order_merchant_id  and ord1.transaction_id = ord6.transaction_id) AS sumMerchantCommission,
                   (SELECT SUM(ord7.mer_amt) FROM nm_order AS ord7 WHERE ord1.order_merchant_id = ord7.order_merchant_id  and ord1.transaction_id = ord7.transaction_id) AS sumMerchantAmount  
                   "
                )
            )
        ->where('ord1.transaction_id', '=', $trans_id)->where('ord1.order_merchant_id', '=', $mer_id)->first();
       
       // $query = DB::getQueryLog();
        //print_r($query);
    }

    public static function get_active_lang()
    {
        return DB::table('nm_language')->where('lang_status',1)->where('pack_lang',0)->get();
    }

    
	//get city name
	public static function get_city_name_ajax($countryid="")
    {
        return DB::table('nm_city')->Join('nm_country','nm_country.co_id','=','nm_city.ci_con_id')->where('nm_country.co_name', '=', $countryid)->where('nm_city.ci_status', '=', 1)->get();
        
    }   
    
    /* UPDATE TRANSACTION ID */
    public static function update_cod_transaction_id($cod_id="",$transaction_id="")
    {
        $update_trans = DB::table('nm_ordercod')->where('cod_id', $cod_id)->update(['cod_transaction_id'=>$transaction_id]);
    }
	
	public static function google_login_check($google_id,$user_email,$login_session)
	{
		if($google_id=='') { return "error"; }
		if($user_email!='')
		{
			$gmail_details1 = DB::table('nm_customer')->where('cus_email', '=', $user_email)->where('cus_status','!=',2)->get();
			if(count($gmail_details1) > 0)
			{
				//UPDATE google_id , SET SESSION,INSERT nm_login AND redirect with success message.
				DB::table('nm_customer')->where('cus_email', $user_email)->where('cus_status','!=',2)->update(array('google_id' => $google_id));
				$entry = array('cus_id' => $gmail_details1[0]->cus_id);
				$fb_details_intologin = DB::table('nm_login')->insert($entry);
				$returnArray = array('gmail_details1'=>$gmail_details1,'status'=>'success');
				return $returnArray;
				/*Session::put('username',$gmail_details1[0]->cus_name);
				Session::put('user_name',$gmail_details1[0]->cus_name);
				Session::put('customerid',$gmail_details1[0]->cus_id);
				Session::put('googleid',$gmail_details1[0]->google_id);
				return "success";*/
			}
			else
			{
				//INSERT IN TO nm_custoemrs, SET SESSION, INSERT INTO nm_login AND REDIRECT WITH SUCCESS MESSAGE.
				$insert_fb = DB::table('nm_customer')->insert($login_session);
				$login_session = DB::table('nm_customer')->where('google_id', '=', $google_id)->get();
				$entry = array('cus_id' => $login_session[0]->cus_id);
				$fb_details_intologin = DB::table('nm_login')->insert($entry);
				$returnArray = array('gmail_details1'=>$login_session,'status'=>'success1');
				return $returnArray;
				/*Session::put('username',$login_session[0]->cus_name);
				Session::put('user_name',$login_session[0]->cus_name);
				Session::put('customerid',$login_session[0]->cus_id);
				Session::put('googleid',$login_session[0]->google_id);
				return "success1";*/
			}
		}
		else
		{
			$returnArray = array('gmail_details1'=>array(),'status'=>'error');
			return $returnArray;
			//return "error";
		}
	}

    public static function get_google_details()
    {
        return DB::table('nm_social_media')
        ->select('sm_gl_client_id','sm_gl_sec_key')       
        ->get();
    }
	
	
   }

?>
