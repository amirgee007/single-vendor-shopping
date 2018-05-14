<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Http\Controllers\Controller;

class LocalizationController extends Controller {
   public function index(Request $request){
      //set’s application’s locale
	 $lang_code = Session::get('lang_code'); 
      app()->setLocale($lang_code);
      
      //Gets the translated message and displays it
      echo trans('ar_lang.msg');
   }
}