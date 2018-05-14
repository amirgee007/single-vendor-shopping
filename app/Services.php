<?php
namespace App;
use DB;
use File;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Services extends Model
{
    
    protected $guarded = array('id');
    protected $table = 'nm_services';
    /*Add Services*/
    public static function add_service($Add_Services)
    {
       $check_insert = DB::table('nm_service')->insert($Add_Services); 
	    if ($check_insert) {
            return DB::getPdo()->lastInsertId();
        } else {
            return 0;
        }
    }

    public static function edit_service($id,$array){
        return DB::table('nm_service')->where('service_id', '=', $id)->update($array);
    }

	/*Insert date in to the data base serialize*/
	public static function insert_service_date()
	{
		
	}
    
    /*Get Service Types*/
    public static function get_service_type()
    {
        return DB::table('nm_service_type')->where('service_type_status', '=', 1)->get();
    
    }

/*Get Store */
    public static function get_store()
    {
        return DB::table('nm_store')
		//->leftjoin('nm_business_category', 'nm_store.stor_select_category', '=', 'nm_business_category.business_category_id')
		//->where('business_category_type', '=', 2)
		->where('stor_status', '=', 1)
        ->get();
   }

/*Get Merchant Store */
    public static function get_mer_store($mer_id)
    {
        return DB::table('nm_store')
		//->leftjoin('nm_business_category', 'nm_store.stor_select_category', '=', 'nm_business_category.business_category_id')
		//->where('nm_business_category.business_category_type', '=', 2)
        ->where('nm_store.stor_merchant_id','=',$mer_id)
		->where('nm_store.stor_status', '=', 1)
        ->get();
   
    }
	/*GET Service Time*/
	public static function get_service_time()
		{
			return DB::table('nm_service_time')
			->where('service_time_status', '=', 1)
			->orderBy('service_time','ASC')
			->get();
	   
		}	

   
/*change block and unblock status for db*/    
    public static function service_status($id, $status)
    {
        return DB::table('nm_service')->where('service_id', '=', $id)->update($status);
    }

/*the function is used for get services for edit*/
    public static function get_services_edit($id)
    {
        return DB::table('nm_service')
		->join('nm_store', 'nm_service.store_name', '=', 'nm_store.stor_id')
		->where('service_id','=',$id)->get();
		/* ->join('nm_service_type', 'nm_service.service_type', '=', 'nm_service_type.service_type_id') */
    }

   /*the function is used for get services duration edit*/
    public static function get_service_duration($id)
    {
        return DB::table('nm_service')
		->join('nm_store', 'nm_service.store_name', '=', 'nm_store.stor_id')
		->join('nm_service_duration', 'nm_service.service_id', '=', 'nm_service_duration.duration_service_id')
		->where('service_id','=',$id)->get();
		/* ->join('nm_service_type', 'nm_service.service_type', '=', 'nm_service_type.service_type_id') */
    }

   
/*Admin -> Manage service Details*/
    public static function get_service_details_manage()
    {
        return DB::table('nm_service')
		->join('nm_store', 'nm_service.store_name', '=', 'nm_store.stor_id')
		//->join('nm_service_duration', 'nm_service.service_id', '=', 'nm_service_duration.duration_service_id')
		->groupBy('service_id')
        ->orderby('nm_service.service_id','desc')
        ->get();
        /*->join('nm_service_type', 'nm_service.service_type', '=', 'nm_service_type.service_type_id')*/
    }

    public static function service_duration($service_id){
        return DB::table('nm_service_duration')->where('service_id','=',$service_id)->get();
    }
    
/*Merchant ->manage service Details*/
    public static function get_mer_service_details_manage($mer_id)
    {
        return DB::table('nm_service')
		->join('nm_store', 'nm_service.store_name', '=', 'nm_store.stor_id')
		->join('nm_service_duration', 'nm_service.service_id', '=', 'nm_service_duration.duration_service_id')
		->groupBy('service_id')
        ->orderby('nm_service.service_id','desc')
        ->where('nm_store.stor_merchant_id','=',$mer_id)
		->get();
        /*->join('nm_service_type', 'nm_service.service_type', '=', 'nm_service_type.service_type_id')*/
    }

/*Delete services for db */
    public static function delete_services($id) 
	{
        return DB::table('nm_service')->where('service_id', '=', $id)->delete();
    }
	
/*Delete Duration*/	
	public static function delete_duration($s_id,$d_id) 
	{
        return DB::table('nm_service_duration')
		->where('duration_id', '=', $d_id)
		->where('duration_service_id', '=', $s_id)
		->delete();
    }
	
	
    public static function get_mer_active_services($mer_id)
	{
		
        return DB::table('nm_service')
        ->join('nm_store', 'nm_service.store_name', '=', 'nm_store.stor_id')
        ->where('nm_store.stor_merchant_id','=',$mer_id)
        ->where('status', '=', 1)->count();
    }
	public static function get_mer_block_services($mer_id) 
	{
        return DB::table('nm_service')
		->join('nm_store', 'nm_service.store_name', '=', 'nm_store.stor_id')
        ->where('nm_store.stor_merchant_id','=',$mer_id)
        ->where('status', '=', 0)->count();
    }
    public static function get_active_services(){
        return DB::table('nm_service')->where('status', '=', 1)->count();
    }
    public static function get_block_services() {
        return DB::table('nm_service')->where('status', '=', 0)->count();
    }
    /*update service duration*/
    public static function update_service_duration($update_service_duration,$duration_id){
       return DB::table('nm_service_duration')->where('duration_id','=',$duration_id)->update($update_service_duration);
    }

    public static function insert_service_duration($update_service_duration){
       return DB::table('nm_service_duration')->insert($update_service_duration);
    }
	
    
}

?>
