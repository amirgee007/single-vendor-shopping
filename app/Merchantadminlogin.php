<?php
namespace App;
use DB;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Merchantadminlogin extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_admin';
    
    public static function login_check($uname,$password)
    {
        $check = DB::table('nm_admin')->where('adm_fname', '=' ,$uname)->get();
		$checkpassword = 0;
		//$admin_details = DB::table('nm_admin')->select('adm_fname','adm_password')->get();
        if (count($check) > 0) {
			if($check[0]->adm_fname == $uname)
			{
				$checkpassword = DB::table('nm_admin')->where('adm_fname', '=' ,$uname)->where('adm_password', '=' ,$password)->get();
			}
			else
			{
				return -1;
			}
			if(count($checkpassword) <1)
			{
				return -2;
			}
			elseif(count($checkpassword) >0)
			{ 
				Session::put('siteadmin','siteadmin');
            Session::put('userid', $check[0]->adm_id);
            Session::put('username', $check[0]->adm_fname);
				return 1;
			}
			
            
        } else {
            return 0;
        }
    }

    public static function forgot_check($email)
    {
        $check = DB::table('nm_admin')->where('adm_email', '=', $email)->get();
        if ($check) {
            return 1;
            
        } else {
            return 0;
        }
    }

    public static function forgot_check_details($email)
    {
        return DB::table('nm_admin')->where('adm_email', '=', $email)->get();
        
    }

    
}

?>
