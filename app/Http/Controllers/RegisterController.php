<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Lang;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Footer;
use App\Settings;
use App\Blog;
use App\Dashboard;
use App\Admodel;
use App\Deals;
use App\Auction;
use App\Products;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    
    /*
    
    |--------------------------------------------------------------------------
    
    | Default Home Controller
    
    |--------------------------------------------------------------------------
    
    |
    
    | You may wish to use controllers instead of, or in addition to, Closure
    
    | based routes. That's great! Here is an example controller method to
    
    | get you started. To route to this controller, just add the route:
    
    |
    
    |	Route::get('/', 'HomeController@showWelcome');
    
    |
    
    */
    
    public function siteadmin()
    {
        return Redirect::to('siteadmin');
        
    }
    public function register_getcountry_ajax($id="")
    {
     
        $id = $_GET['id'];
         if (Session::has('customerid')) {

        $customerid  = Session::get('customerid');
		$customerdetails  = Register::get_customer_details($customerid);
											}

		 
        $city_det = Register::get_city_list_ajax($id);
       
        if ($city_det) {
            
            $return = "";
            $return .= "<option value=''>";
            

             $return .="--Select City--</option>"; 


            foreach ($city_det as $city_det_ajax) {
				
			    $set_selected = '';
			    if (Session::has('customerid')) {
				if($city_det_ajax->ci_id==$customerdetails[0]->ship_ci_id) {
                $set_selected = 'selected';
					}
				}
			
                if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
					$ci_name = 'ci_name';
				}else {  $ci_name = 'ci_name_'.Session::get('lang_code'); }
									
                 $return .= "<option value='" . $city_det_ajax->ci_id . "' >" . $city_det_ajax->$ci_name. " </option>";
                
            }
            
            echo $return;
            
        }
        
        else {
			if(Lang::has(Session::get('lang_file').'.NO_DATAS_FOUND')!= '') 
			{
				$session_message = trans(Session::get('lang_file').'.NO_DATAS_FOUND');
			}
			else 
			{
				$session_message =  trans($this->OUR_LANGUAGE.'.NO_DATAS_FOUND');
			}
            
            echo $return = "<option value='0'>".$session_message."</option>";
            
        }
             
    }
    
      
    public function register_emailcheck_ajax()
    {
        
        $email = $_GET['email'];
        
        $checkemail = Register::check_email_ajax($email);
        
        if ($checkemail) {
            
            echo "1";
            
        }
        
        else {
            
            echo "2";
            
        }
        
    }
  
    
    public function index()
    {
        
        $navbar = view('includes.navbar');
        
        $header = view('includes.header');
        
        $footer = view('includes.footer');
        
        $haeder_category = Home::get_header_category();
        
        $product_details = Home::get_product_details();
        
        $abc = Home::get_header_category_array();
        
        $get_pro = trim($abc, ",");
        
        $r = Home::get_header_prio($get_pro);
             
        return view('index')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('haeder_category', $haeder_category)->with('product_details', $product_details);
        
    }
 
    
}
