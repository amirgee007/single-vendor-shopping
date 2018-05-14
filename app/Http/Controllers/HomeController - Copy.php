<?php
namespace App\Http\Controllers;

use DB;
use Session;
use Helper;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Footer;
use App\Settings;
use App\Merchant;
use App\Coupon;
use App\Http\Controllers;
use MyPayPal;
use Lang;
use File;
use Intervention\Image\ImageManagerStatic as Image; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
Use Softon\Indipay\Facades\Indipay;

class PayumoneyController extends Controller
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
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */
    public function __construct(){
        parent::__construct();
        // set frontend language 
        $this->setLanguageLocaleFront();
        
    }
      
   public function sample(){
    $hashSequence = 
        $parameters = [

             'key' => 'gtKFFx',
              'amount' => '1.00',
              'productinfo' => 'xxx',
              'firstname' => 'xxx',
              'email' => 'venugopal@pofitec.com',
              'phone' => '9976500000',
              'productinfo' => 'productin',
      ];
      
      $order = Indipay::prepare($parameters);
      return Indipay::process($order);
    } 

    public function response(Request $request ) {
            $response = Indipay::response($request);
    }

   
}
