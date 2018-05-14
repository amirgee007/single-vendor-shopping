<?php
namespace App;
use DB;
use File;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class AdvertisementModel extends Model
{
    public static function get_subcategory(){
        return DB::table('nm_secmaincategory')->where('smc_status', '=', 1)->get();
    }

    public static function check_subcategory_avail($smc_id){        // getting sub category id and check already exist
        return DB::table('nm_category_ad')->where('cat_ad_maincat_id', '=', $smc_id)->get();
    }

    public static function insert_advertisement($entry){
        return DB::table('nm_category_ad')->insert($entry);
    }

    public static function view_advertisement_list(){
        return DB::table('nm_category_ad')->leftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_category_ad.cat_ad_maincat_id')->paginate(10);
        
    }
    
    public static function status_advertisement_banner($id, $status){
    
        return DB::table('nm_category_ad')->where('cat_ad_id', '=', $id)->update(array(
            'cat_ad_status' => $status
        ));
    }

    public static function edit_advertisement($id){     //to display to edit page
        return DB::table('nm_category_ad')->where('cat_ad_id', '=', $id)->get();
    }  // edit advertisement

    public static function edit_advertisement_submit($id,$entry){
        return DB::table('nm_category_ad')->where('cat_ad_id', '=', $id)->update($entry);
    }

    public static function delete_ad_img($id,$image){
        $conc = '';
        $filename = DB::table('nm_category_ad')->where('cat_ad_id', $id)->first();
        $getimagename= $filename->cat_ad_img;
        $explode =explode("/**/",$getimagename,-1);
        
        foreach($explode as $imgremove){
           if($image==$imgremove){ 
               File::delete(base_path('assets/advertisement/').$imgremove);     // remove image from the directory
                $imgremove = '';
            } //if
             $conc.=$imgremove."/**/" ;      //Concadinating image name which was not removed
        }  //foreach
        return DB::table('nm_category_ad')->where('cat_ad_id', '=', $id)->update(array('cat_ad_img'=> $conc));  
    } //delete cat image

    public static function delete_advertisement_banner($id){
        
        // To start Image delete from folder 09/11/ 
        $filename = DB::table('nm_category_ad')->where('cat_ad_id', '=', $id)->first();
        $getimagename= $filename->cat_ad_id;
        $getextension=explode("/**/",$getimagename);
        foreach($getextension as $imgremove){
            File::delete(base_path('assets/advertisement/').$imgremove);
        } 
        return DB::table('nm_category_ad')->where('cat_ad_id', '=', $id)->delete(); 
    }//delete category banner

    public static function check_subcategory_exist($cat_ad_id='',$subcategory=''){
        //echo $cat_ad_id.'-'.$subcategory;
       return DB::table('nm_category_ad')->where('cat_ad_id', '!=', $cat_ad_id)->where('cat_ad_maincat_id', '=', $subcategory)->count(); 
    }
    
	public static function ad_multiple($id, $status)
	{
		return DB::table('nm_category_ad')->where('cat_ad_id', '=', $id)->update(array('cat_ad_status' => $status));
	}
}   //class