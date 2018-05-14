<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class city extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_city';
    
    public static function view_city_detail()
    {
        return DB::table('nm_city')->leftJoin('nm_country', 'nm_country.co_id', '=', 'nm_city.ci_con_id')
        ->orderby('ci_id','desc')->get();
        //->paginate(10);
    }
    
    public static function view_citywise_user_detail($id="")
    {
        if($id!="") {
            return DB::table('nm_customer')->leftJoin('nm_city', 'nm_customer.cus_city', '=', 'nm_city.ci_id')
            ->where('nm_customer.cus_status', '=', 0)
            ->where('nm_city.ci_id', '=', $id)
            ->where('nm_city.ci_status','=',1)
            ->get();
        } else {
            /* return DB::table('nm_city')->join('nm_customer', function($join)
        {
            $join->on('nm_city.ci_id', '=', 'nm_customer.cus_city');
                 
        })->groupBy('nm_city.ci_name', '>')->get(); */
            return DB::table('nm_city')->leftJoin('nm_customer', 'nm_customer.cus_city', '=', 'nm_city.ci_id')
            ->where('ci_status','=',1)
            ->groupBy('nm_city.ci_name')->get();
        }
    }
    
    public static function view_country_details()
    {
        return DB::table('nm_country')->where('co_status','=',0)->get();
    }

    public static function show_city_detail($id)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->get();
    }



    public static function delete_city_detail($id)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->delete();
    }

    public static function update_city_detail($id, $entry)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->update($entry);
    }
    
    public static function save_city_detail($entry)
    {
        return DB::table('nm_city')->insert($entry);
    }

    public static function status_city($id, $status)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->update(array('ci_status' => $status));
        
    }

    public static function check_exist_city_name($name, $ccode)
    {
        return DB::table('nm_city')->where('ci_con_id', '=', $ccode)->where('ci_name', '=', $name)->get();
        
    }
    public static function check_exist_city_name_edit($id,$name, $ccode)
    {
        return DB::table('nm_city')->where('ci_id', '!=', $id)->where('ci_con_id', '=', $ccode)->where('ci_name', '=', $name)->get();
        
    }

    public static function update_default_city_submit($id, $entry)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->update($entry);
        
    }

    public static function update_default_city_submit1($entry)
    {
        return DB::table('nm_city')->update($entry);
        
    }

    Public static function update_store_city_status($id,$array){
        
        return DB::table('nm_store')->where('stor_city','=',$id)->where('store_city_status','=','A')->update($array);
    }
    
}

?>
