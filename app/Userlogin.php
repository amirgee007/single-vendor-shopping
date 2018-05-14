<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Userlogin extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_customer';
    
    public static function check_user($pwd, $email)
    {
        return DB::table('nm_customer')->where('cus_email', '=', $email)->where('cus_pwd', '=', $pwd)->where('cus_status','!=',2)->get();
    }

    public static function forgot_check_details_user($email)
    {
        return DB::table('nm_customer')->where('cus_email', '=', $email)->where('cus_status','!=',2)->get();
    }

    public static function checkvalidemail($email)
    {
        return DB::table('nm_customer')->where('cus_email', '=', $email)->where('cus_status','!=',2)->get();
    }

    public static function save_log($entry)
    {
        return DB::table('nm_login')->insert($entry);
    }

    public static function update_newpwd($cus_id, $confirmpwd)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cus_id)->update(array(
            'cus_pwd' => $confirmpwd
        ));
        
    }

    public static function get_customer_details($customer_decode_email)
    {
        return DB::table('nm_customer')->where('cus_email', '=', $customer_decode_email)->where('cus_status','!=',2)->get();
    }
    
}

?>
