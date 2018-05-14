<?php
namespace App;
use DB;
use File;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class CategoryBanner extends Model
{
    public static function get_subcategory(){
        return DB::table('nm_secmaincategory')->where('smc_status', '=', 1)->get();
    }
    public static function check_category_avail($main_cat_id){
        return DB::table('nm_category_banner')->where('cat_bn_maincat_id', '=', $main_cat_id)->get();
    }
    public static function insert_category_banner($entry){
       return DB::table('nm_category_banner')->insert($entry);
    }
    public static function view_category_banner_list(){
        return DB::table('nm_category_banner')->leftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_category_banner.cat_bn_maincat_id')->paginate(10);
    } 
    public static function delete_category_banner($id){
        
        // To start Image delete from folder 09/11/ 
        $filename = DB::table('nm_category_banner')->where('cat_bn_id', '=', $id)->first();
        $getimagename= $filename->cat_bn_id;
        $getextension=explode("/**/",$getimagename);
        foreach($getextension as $imgremove)
        {
            File::delete(base_path('assets/banner/').$imgremove);
        } 
        // To End  
        return DB::table('nm_category_banner')->where('cat_bn_id', '=', $id)->delete(); 
    }//delete category banner

    public static function status_category_banner($id, $status){
    
        return DB::table('nm_category_banner')->where('cat_bn_id', '=', $id)->update(array(
            'cat_bn_status' => $status
        ));
    }
    public static function edit_category_banner($id){
        return DB::table('nm_category_banner')->where('cat_bn_id', '=', $id)->get();
    }

    public static function edit_banner_submit($id,$entry){
        return DB::table('nm_category_banner')->where('cat_bn_id', '=', $id)->update($entry);
    }

    public static function delete_cat_img($id,$image){
        $conc = '';
        $filename = DB::table('nm_category_banner')->where('cat_bn_id', $id)->first();
        $getimagename= $filename->cat_bn_img;
        $explode =explode("/**/",$getimagename,-1);
        
        foreach($explode as $imgremove){
           if($image==$imgremove){ 
               File::delete(base_path('assets/banner/').$imgremove);     // remove image from the directory
                $imgremove = '';
            } //if
             $conc.=$imgremove."/**/" ;      //Concadinating image name which was not removed
        }  //foreach
        return DB::table('nm_category_banner')->where('cat_bn_id', '=', $id)->update(array('cat_bn_img'=> $conc));  
    } //delete cat img

    public static function check_subcategory_exist($cat_bn_id='',$subcategory=''){
        //echo $cat_ad_id.'-'.$subcategory;
       return DB::table('nm_category_banner')->where('cat_bn_id', '!=', $cat_bn_id)->where('cat_bn_maincat_id', '=', $subcategory)->count(); 
    }

    
}
?>