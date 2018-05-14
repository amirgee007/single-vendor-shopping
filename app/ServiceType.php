<?php
namespace App;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class ServiceType extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_service_type';
/*insert business category*/
    public static function save_service_type($entry)
    {
        return DB::table('nm_service_type')->insert($entry);
    }
/*manage Service type list*/
    public static function manage_service_type_list()
    {
        return DB::table('nm_service_type')->get();
    }
/*get service type list*/
    public static function edit_service_list($id)
    {
        return DB::table('nm_service_type')->where('service_type_id', '=', $id)->get();
    }
/*update business category details*/
    public static function update_service_type_detail($entry, $id)
    {
        return DB::table('nm_service_type')->where('service_type_id', '=', $id)->update($entry);
    }
/*Service type status change*/
    public static function status_service_type_submit($id, $status)
    {
        return DB::table('nm_service_type')->where('service_type_id', '=', $id)->update(array('service_type_status' => $status));
    }
/*delete_business_category*/
    public static function delete_service_type($id)
    {    
        return DB::table('nm_service_type')->where('service_type_id', '=', $id)->delete(); 
    }
}

?>