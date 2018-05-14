<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class ServiceTime extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_service_time';
/*get service details for manage services*/    
    public static function view_service_time_details()
    {
        return DB::table('nm_service_time')->orderBy('service_time','ASC')->get();    
    }
/*Check Service Time*/
	public static function check_service_time($service_time)
	{
		return DB::table('nm_service_time')->where('service_time', '=', $service_time)->get();
	}
	
/*Get Service Details for Edit Service Time Function*/  
    public static function showindividual_service_time_detail($id)
    {
        return DB::table('nm_service_time')->where('service_time_id', '=', $id)->get();
    }
/*delete service time in db function*/
    public static function delete_service_time_detail($id)
    {
        return DB::table('nm_service_time')->where('service_time_id', '=', $id)->delete();
    }
/*Upadate Service Time*/
    public static function update_Service_Time_Details($id, $entry)
    {
        return DB::table('nm_service_time')->where('service_time_id', '=', $id)->update($entry);
    }
/*Save Service Time*/    
    public static function save_service_time($entry)
    {
        return DB::table('nm_service_time')->insert($entry);
    }
/*Update Service Time*/
    public static function update_status_service_time($id, $status)
    {
        return DB::table('nm_service_time')->where('service_time_id', '=', $id)->update(array('service_time_status' => $status));
    }
    
}

?>
