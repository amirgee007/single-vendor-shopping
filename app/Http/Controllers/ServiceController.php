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
use App\Merchant;
use App\Services;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class ServiceController extends Controller
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
    /*Admin->service*/
   public function services_dashboard(){
        if (Session::has('userid')) {
            $data   = Input::except(array(
                '_token'
            ));
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SERVICES')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SERVICES');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SERVICES');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_services');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $active_cnt     = Services::get_active_services();
            $blocked_cnt    = Services::get_block_services();
                        
            return view('siteadmin.service_dashboard')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('active_count', $active_cnt)->with('blocked_cnt', $blocked_cnt);
        }else {
           return Redirect::to('siteadmin');
        }  
    } 
    /*Admin ->Add Service*/   
    public function add_services(){
        
        if (Session::has('userid')) {
            $data   = Input::except(array(
                '_token'
            ));
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SERVICES')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SERVICES');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SERVICES');
			}
            $adminheader      = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus   = view('siteadmin.includes.admin_left_menu_services');
            $adminfooter      = view('siteadmin.includes.admin_footer');
            $getservicetypes  = Services::get_service_type();
			$get_service_time = Services::get_service_time();
            $getstore         = Services::get_store();
            
            return view('siteadmin.add_services')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('getservicetypes', $getservicetypes)->with('getstore', $getstore)->with('get_service_time', $get_service_time);
            
        }else {
            return Redirect::to('siteadmin');
        }
     }

    /*Admin Service add function*/   
    public function add_service_submit(){
       if(Session::has('userid')) {
            $orginal_price = Input::get('Original_Price');
	   
            $calendar_option = Input::get('calendar_option');
            if($calendar_option==1){
                $req = 'required';
            }else{
                $req= '';
            }
        
            
            $data   = Input::except(array(
                '_token'
            ));
            $rule   = array(
                'service_name'    => 'required',
                //'service_type'  => 'required',
                'calendar_option' => 'required',
                'store_name'      => 'required',
				'Meta_Keywords'   => 'required',
				'Meta_Description'=> 'required'
				
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_services')->withErrors($validator->messages())->withInput();
            } else {
               
										
					$Add_Services       = array(
                        'service_name'     => Input::get('service_name'),
                        'service_type'     => Input::get('service_type'),
                        'calendar_option'  => Input::get('calendar_option'),
						'store_name'       => Input::get('store_name'),
                        'meta_keywords'    => Input::get('Meta_Keywords'),
						'meta_description' => Input::get('Meta_Description'),
                        'status'           => 1,
                    );
					
                    $insert_id               = Services::add_service($Add_Services);
					
					$Service_Duration        = Input::get('service_timing');
                    $time_type               = Input::get('duration');
					$Service_Orginal_Price   = Input::get('Original_Price');
					$Service_Discount_Price  = Input::get('Discounted_Price');
					
					$Service = array(
						'duration_service_id'     => $insert_id,
						'service_duration'        => $Service_Duration,
                        'service_time_type'       => $time_type,
                        'service_orginal_price'   => $Service_Orginal_Price,
                        'service_discount_price'  => $Service_Discount_Price,
                    );
					
					for($i=0; $i<count($Service_Duration); $i++)
					{
						$update_service_duration = array(
							'duration_service_id'    => $Service ['duration_service_id'],
							'service_duration'       => $Service ['service_duration'][$i],
                            'service_time_type'      => $Service ['service_time_type'][$i],
							'service_orginal_price'  => $Service ['service_orginal_price'][$i],
							'service_discount_price' => $Service ['service_discount_price'][$i],
							
						);
						
						$Add_Service_Duration = DB::table('nm_service_duration')->insert($update_service_duration);
					}
					if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
					{
						$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
					}
					else 
					{
						$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
					}
                    return Redirect::to('manage_services')->with('message', $session_message);
                }
            }
        else {
            return Redirect::to('siteadmin');
        }
    }


 /*Admin Add Service Ajax*/
 public function add_service_date_ajax()
 {
     $data   = Input::except(array(
                '_token'
            ));
	 $date  = Input::get('date');
	 $explode_dates = explode('to',$date);
	 
		$fromDate  = $explode_dates[0];
		$toDate  = $explode_dates[1];
		
	$fromDateTS = strtotime($fromDate);
	$toDateTS = strtotime($toDate);
	
	for($current = $fromDateTS; $current <= $toDateTS; $current += 86400) 
	{
		$diff_days = date('d-m-Y', $current);
		print_r($diff_days);
	}
	
}



/*Admin edit service value get function*/    
    public function edit_services($id)
    {
        
        if (Session::has('userid')) {
            $data   = Input::except(array(
                '_token'
            ));
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SERVICES')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SERVICES');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SERVICES');
			}
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_services');            
            $adminfooter = view('siteadmin.includes.admin_footer'); 
            $get_services = Services::get_services_edit($id);
			//print_r($get_services);exit;
			
			$get_service_duration = Services::get_service_duration($id);
			
			$getservicetypes      = Services::get_service_type();
			$getstore             = Services::get_store();
			$get_service_time     = Services::get_service_time();
            return view('siteadmin.edit_services')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('get_services', $get_services)->with('getservicetypes', $getservicetypes)->with('getstore',$getstore)->with('get_service_time',$get_service_time)->with('get_service_duration',$get_service_duration);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
   
/*Admin manage Services*/ 
    public function manage_services()
    {
        if (Session::has('userid')) {
            $data   = Input::except(array(
                '_token'
            ));
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SERVICES')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SERVICES');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SERVICES');
			}
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_services');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $Get_Services = Services::get_service_details_manage();
           
            $service_type = Services::get_service_type();
       
            return view('siteadmin.manage_services')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('Get_Services', $Get_Services)->with('service_type',$service_type);
            
        }
        else {
            return Redirect::to('siteadmin');
        }
     }

/*delete service function*/    
    public function delete_services($id)
	{
		$data   = Input::except(array(
                '_token'
            ));
		if(Session::has('userid'))
		{
			$del_pro = Services::delete_services($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_DELETED_SUCCESSFULLY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SERVICE_DELETED_SUCCESSFULLY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_DELETED_SUCCESSFULLY');
			}
			return Redirect::to('manage_services')->with('message',$session_message);	
		}
		else
        {
         return Redirect::to('siteadmin');
        }	
	}

/*edit service submit*/

public function edit_services_submit(){
    if (Session::has('userid')) {
        
        $service_id    = Input::get('service_id');
        $orginal_price = Input::get('Original_Price');
        $data   = Input::except(array(
                '_token'
            ));
        $rule   = array(
                'service_name'     => 'required',
                'duration'         => 'required',
                'calendar_option'  => 'required',
                'store_name'       => 'required',
				'Meta_Keywords'    => 'required',
				'Meta_Description' => 'required'
			);
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_services')->withErrors($validator->messages())->withInput();
            } else {

                    $array       = array(
                        'service_name'     => Input::get('service_name'),
                        'service_type'     => Input::get('service_type'),
                        'calendar_option'  => Input::get('calendar_option'),
						'store_name'       => Input::get('store_name'),
                        'meta_keywords'    => Input::get('Meta_Keywords'),
						'meta_description' => Input::get('Meta_Description'),
                        'status' =>'1',
                    );
                   
                    $update = Services::edit_service($service_id,$array);
					 /*service duration update*/
                    $Service_Duration       = Input::get('service_timing');
                    $time_type              = Input::get('duration');
					$Service_Orginal_Price  = Input::get('Original_Price');
					$Service_Discount_Price = Input::get('Discounted_Price');
                    $old_count              = Input::get('old_count');
                    $duration_id            = Input::get('duration_id');
					
                    $Service = array(
						'duration_service_id'    => $service_id,
						'service_duration'       => $Service_Duration,
                        'service_time_type'      => $time_type,
                        'service_orginal_price'  => $Service_Orginal_Price,
                        'service_discount_price' => $Service_Discount_Price,
                    );
					
					for($i=0; $i<count($Service_Duration); $i++){
						
						$update_service_duration = array(
							'duration_service_id'    => $Service ['duration_service_id'],
							'service_duration'       => $Service ['service_duration'][$i],
                            'service_time_type'      => $Service ['service_time_type'][$i],
							'service_orginal_price'  => $Service ['service_orginal_price'][$i],
							'service_discount_price' => $Service ['service_discount_price'][$i],
						);
                        if($duration_id[$i]!=0){
                           $update = Services::update_service_duration($update_service_duration,$duration_id[$i]);
                        }elseif($duration_id[$i]==0){
                           $Add = Services::insert_service_duration($update_service_duration);
                        }//else
					}
					
				   if($update){
						if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
						{
							$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
						}
						else 
						{
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
						}
                        return Redirect::to('manage_services')->with('message', $session_message);
                    }else{
						if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATION_FAILED')!= '') 
						{
							$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATION_FAILED');
						}
						else 
						{
							$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATION_FAILED');
						}
                        return Redirect::to('manage_services')->with('message', $session_message);
                    }
               }//else
        }else {
            return Redirect::to('siteadmin');
        }
}// edit submit



/*services block unblock function*/
    public function block_services($id, $status)
    {
        
        if (Session::has('userid')) {
            $data   = Input::except(array(
                '_token'
            ));
            $entry = array(
                
                'status' => $status
                
            );
            
            Services::service_status($id, $entry);
            
            if ($status == 1) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_SERVICES_UNBLOCKED')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_SERVICES_UNBLOCKED');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SERVICES_UNBLOCKED');
				}
                return Redirect::to('manage_services')->with('message', $session_message);
            }
            
            else if ($status == 0) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_SERVICES_BLOCKED')!= '') 
				{
					$session_message = trans(Session::get('admin_lang_file').'.BACK_SERVICES_BLOCKED');
				}
				else 
				{
					$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SERVICES_BLOCKED');
				}
                return Redirect::to('manage_services')->with('message', $session_message);
            }
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
/*In Edit page delete duration,orginal price and discout price*/
    public function delete_duration($s_id,$d_id)
    {
		
		$data   = Input::except(array(
                '_token'
            ));
		if(Session::has('userid'))
		{
			$del_duration = Services::delete_duration($s_id,$d_id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_DELETED_SUCCESSFULLY')!= '') 
			{
				$session_message = trans(Session::get('admin_lang_file').'.BACK_DELETED_SUCCESSFULLY');
			}
			else 
			{
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_DELETED_SUCCESSFULLY');
			}
			return Redirect::back()->with('message',$session_message);	
		}
		else
        {
         return Redirect::to('siteadmin');
        }	
	}
   
 
}
