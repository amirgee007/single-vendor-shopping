<?php
namespace App;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Brand extends Model
{
    //protected $guarded = array('id');
    //protected $table = 'nm_brand_commission';
    
    public static function add_brand_commission($insert){
        return DB::table('nm_brand_commission')->insert($insert);
    }

    public static function view_brand_commission(){
        return DB::table('nm_brand_commission')->get();
    }

    public static function get_brand_detail($id){
        return DB::table('nm_brand_commission')->where('brand_id', '=', $id)->get();
    }

    public static function delete_brand_submit($id){
        
        // To start Image delete from folder 09/11/ 
        $filename = DB::table('nm_brand_commission')->where('brand_id', '=', $id)->first();
        $getimagename= $filename->brand_image;
        //$getextension=explode("/**/",$getimagename);
        //foreach($getimagename as $imgremove)
        // {
            File::delete(base_path('assets/brandimage/').$getimagename);
        //} 
        // To End  
        return DB::table('nm_brand_commission')->where('brand_id', '=', $id)->delete();
        
    }
    
    public static function update_brand($entry, $id)
    {
        return DB::table('nm_brand_commission')->where('brand_id', '=', $id)->update($entry);
    }

    public static function update_brand_status($id, $status)
    {
        return DB::table('nm_brand_commission')->where('brand_id', '=', $id)->update(array(
            'brand_status' => $status
        ));
        
    }

}
?>