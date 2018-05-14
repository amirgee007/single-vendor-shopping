<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Register extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_customer';
        
    public static function get_city_details()
    {
        return DB::table('nm_city')->where('ci_status', '=', 1)->get();
    }

    public static function get_country_details()
    {
        return DB::table('nm_country')->where('co_status', '=', 0)->get();
    }

    public static function get_country_list_ajax($cityid)
    {
        return DB::table('nm_country')->join('nm_city', 'nm_country.co_id', '=', 'nm_city.ci_con_id')->where('nm_city.ci_id', '=', $cityid)->where('nm_countyr.co_status', '=', 0)->get();
        
    }

    public static function get_city_list_ajax($countryid)
    {
        return DB::table('nm_city')->join('nm_country', 'nm_city.ci_con_id', '=', 'nm_country.co_id')->where('nm_country.co_id', '=', $countryid)->where('nm_city.ci_status', '=', 1)->get();
        
    }
	
	 public static function get_city_list_shipping($countryid)
    {
        return DB::table('nm_city')->join('nm_country', 'nm_city.ci_con_id', '=', 'nm_country.co_id')->where('nm_country.co_id', '=', $countryid)->where('nm_city.ci_status', '=', 1)->get();
        
    }

    public static function check_email_ajax($email)
    {
        return DB::table('nm_customer')->where('cus_email', '=', $email)->where('cus_status','!=',2)->get();
    }

    public static function insert_customer_shipping($data)
    {
        return DB::table('nm_shipping')->insert($data);
    }

    public static function insert_customer($entry)
    {
        $insertcheck = DB::table('nm_customer')->insert($entry);
        if ($insertcheck) {
            return DB::getPdo()->lastInsertId();
        } else {
            return 0;
        }
    }

    public static function insert_email($entry)
    {
        $insertcheck = DB::table('nm_newsletter_subscribers')->insert($entry);
        
    }

    public static function check_email_ajaxs($email)
    {
        return DB::table('nm_newsletter_subscribers')->where('email', '=', $email)->get();
        
    }

    public static function insert_wish($entry)
    {
        $insertcheck = DB::table('nm_wishlist')->insert($entry);
        
    }
	
	public static function get_customer_details($customerid)
    {
        return DB::table('nm_customer')->leftjoin('nm_city', 'nm_customer.cus_city', '=', 'nm_city.ci_id')->leftjoin('nm_country', 'nm_customer.cus_country', '=', 'nm_country.co_id')->where('cus_id', '=', $customerid)->get();
        
    }
}

?>
