<?php
namespace App;
use DB;
use Session;
use File;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable; 

class AdminModel extends Eloquent
{
    protected $guarded = array('id');
    protected $table = 'nm_admin';
    
    public static function get_admin_details()
    {
        return DB::table('nm_admin')->where('adm_id', '=', 1)->get();
    }
    
    public static function get_admin_profile_details()
    {
        return DB::table('nm_admin')->where('adm_id', '=', 1)->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_admin.adm_ci_id')->LeftJoin('nm_country', 'nm_country.co_id', '=', 'nm_admin.adm_co_id')->get();
    }
    
    public static function update_admin_details($entry)
    {
        return DB::table('nm_admin')->where('adm_id', '=', 1)->update($entry);
    }
    
    public static function get_chart_details()
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_deals WHERE MONTH( `deal_posted_date` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
            
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
        
    }

    public static function get_country_detail()
    {
        return DB::table('nm_country')->where('co_status', '=', 0)->get();
    }


    public static function get_city_detail_ajax($id)
    {
        return DB::table('nm_city')->where('ci_con_id', '=', $id)->orderby('ci_name','asc')
        ->where('ci_status', '=', 1)
        ->get();
    }

    public static function get_city_detail_ajax_edit($id)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->get();
    }
    
    
}

?>
