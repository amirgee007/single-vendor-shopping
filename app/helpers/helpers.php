<?php

use Illuminate\Support\Str;

class Helper {

    public static function cur_sym() {
        
        $currency_sym = DB::table('nm_paymentsettings')->first();
        echo $currency_sym->ps_cursymbol; 
        //return Str::slug($str);

    }
    public static function cur_code() {
    	
    	$currency_sym = DB::table('nm_paymentsettings')->first();
    	return $currency_sym->ps_curcode; 
        //return Str::slug($str);

    }
	public static function customer_support_number() {
    	//DB::table('nm_emailsetting')->get();
    	$emailsettings = DB::table('nm_emailsetting')->get();
		foreach($emailsettings as $enquiry_det){}
    	echo $enquiry_det->es_phone1; 
        //return Str::slug($str);

    }
	
	public static function lang_name(){
		echo $lang_name = 'French'; 
	}

    public static function get_role_price($pro_id){
        $product = \App\Products::where('pro_id' ,$pro_id)->first();

	    if(\Auth::check()){
            $user =  \Auth::user();

            if($user->role->name= "Whole Sale") {
               $price = $product->wholesale_price;
           }
           else{
               $price = $product->pro_disprice;
           }
        }

        else{
            $price = $product->pro_disprice;
        }

        return $price;

    }

}

?>