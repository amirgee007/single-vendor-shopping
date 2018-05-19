<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Role;
use DB;
use Session;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Footer;
use App\Settings;
use App\Merchant;
use App\Blog;
use App\Dashboard;
use App\Admodel;
use App\Deals;
use App\Auction;
use App\Customer;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller
{
    
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    
    public function __construct(){
        parent::__construct();
        // set admin Panel language
        $this->setLanguageLocaleAdmin();
    }

    public function customer_dashboard()
    {
        if (Session::has('userid')) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_CUSTOMER');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER');
			}
            $adminheader      = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus   = view('siteadmin.includes.admin_left_menu_customer');
            $adminfooter      = view('siteadmin.includes.admin_footer');
            $website_users    = Customer::get_website_users();
            $fb_users         = Customer::get_fb_users();
            $admin_users      = Customer::get_admin_users();
			$gplus_users      = Customer::get_gplus_users();
            $logintoday       = Customer::get_logintoday_users();
            $login7days       = Customer::get_login7days_users();
            $login30days      = Customer::get_login30days_users();
            $login12mnth      = Customer::get_login12mnth_users();
            $ordermnth_count  = Customer::get_chart_detailsnew();
            $get_meta_details = Home::get_meta_details();
            return view('siteadmin.customer_dashboard')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('admin_user', $admin_users)->with('fb_users', $fb_users)->with('website_users', $website_users)->with('gplus_users',$gplus_users)->with('logintoday', $logintoday)->with('login7days', $login7days)->with('login30days', $login30days)->with('login12mnth', $login12mnth)->with('ordermnth_count', $ordermnth_count)->with('get_meta_details', $get_meta_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function add_customer()
    {
        if (Session::has('userid')) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_CUSTOMER');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_customer');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $countryresult  = Customer::get_country();
            $roles = Role::all();

            return view('siteadmin.add_customer' ,compact('roles'))->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('countryresult', $countryresult);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_customer($id)
    {
        if (Session::has('userid')) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_CUSTOMER');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_customer');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $countryresult  = Customer::get_all_country();
            $customerresult = Customer::get_customer($id);
            $roles = Role::all();
            return view('siteadmin.edit_customer' ,compact('roles'))->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('countryresult', $countryresult)->with('customerresult', $customerresult);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function send_inquiry_email($id)
    {
		
        if (Session::has('userid')) {
			
            Session::put('inquiriesid', $id);
            $get_inquiry_details = Customer::get_inquiry_details_email($id);
            $email               = 'kathirvel@pofitec.com';
            $name                = 'kaka';
            if(Session::get('admin_lang_file'))
			{
				
				$lang ='admin_en_lang';
			}
			
            $send_mail_data = array(
                'name' => $name,
                'password' => $email,
                'email' => $email,
                'name' => $name,
				'lang' => $lang,
				'LANUAGE' => $this->ADMIN_OUR_LANGUAGE
            );
			
            # It will show these lines as error but no issue it will work fine Line no 119 - 122
            Mail::send('emails.merchantmail', $send_mail_data, function($message)
            {
                $id                  = Session::get('inquiriesid');
                $get_inquiry_details = Customer::get_inquiry_details_email($id);
                $email               = $get_inquiry_details[0]->iq_emailid;
                $name                = $get_inquiry_details[0]->iq_name;
                $message->to($email, $name)->subject('Reply To Your Inquiry');
            });
            if(Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL_SUCCESSFULLY_SENT')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_EMAIL_SUCCESSFULLY_SENT');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_EMAIL_SUCCESSFULLY_SENT');
			}
            return Redirect::to('manage_inquires')->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function manage_customer(Request $request)
    {

        if (Session::has('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            $customerrep    = Customer::get_customerreports($from_date, $to_date);

			if(Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_CUSTOMER');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_customer');
            $adminfooter    = view('siteadmin.includes.admin_footer');

            $customerresult = Customer::get_customer_list();

            $citylist       = Customer::get_city_list();
            return view('siteadmin.manage_customer')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('customerresult', $customerresult)->with('customerrep', $customerrep)->with('cityresult', $citylist)
            ->with('from_date',$from_date)->with('to_date',$to_date);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function delete_customer($id)
    {
        if (Session::has('userid')) {
            $return = Customer::delete_customer($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
            return Redirect::to('manage_customer')->with('delete_result',$session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function status_customer_submit($id, $status)
    {
        if (Session::has('userid')) {
            $return = Customer::status_customer($id, $status);
            if ($status == 0) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}
                return Redirect::to('manage_customer')->with('updated_result', $session_message);
            }else if ($status == 1) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}
                return Redirect::to('manage_customer')->with('updated_result',$session_message);
            }
           
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function customer_edit_getcity()
    {
        $id         = $_GET['city_id'];
        $selectcity = Customer::get_customer_city($id);
        if ($selectcity) {
            $return = "";
            foreach ($selectcity as $selectcity_ajax) {
                $return .= "<option value='" . $selectcity_ajax->ci_id . "' selected> " . $selectcity_ajax->ci_name . " </option>";
            }
            echo $return;
        } else {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_FOUND');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_FOUND');
			}
            echo $return = "<option value='0'> $session_message </option>";
        }
    }
    
    public function add_customer_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $date = date('Y-m-d');
            $rule = array(
                'customer_first_name' => 'required',
                'customer_Email' => 'required|email',
                'customer_phone' => 'required|numeric',
				'customer_password' => 'required',
                'customer_address1' => 'required',
                'customer_address2' => 'required',
                'select_customer_country' => 'required',
                'select_customer_city' => 'required'
            );
            $country_id  = Input::get('select_customer_country');
            $city        = Customer::get_city($country_id);

            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_customer')->withErrors($validator->messages())->withInput()->with('city',$city);
            }
            
            else {
                $emailaddr = Input::get('customer_Email');
                
                
                $checkemailaddr = Customer::check_emailaddress($emailaddr);
               // print_r($checkemailaddr);
                
                if (count($checkemailaddr) > 0) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_ALREADY_EMAILID_EXISTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ALREADY_EMAILID_EXISTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ALREADY_EMAILID_EXISTS');
			}
                    return Redirect::to('add_customer')->withMessage($session_message)->withInput()->with('city',$city);
                    
                }else {
                    $uname   = Input::get('customer_first_name');
                    $address = Input::get('customer_Email');
					date_default_timezone_set('Asia/Kolkata');
					$now 	 = date("Y-m-d H:i:s");
                    $mdpwd   = md5(Input::get('customer_password'));
                    $entry   = array(
                        
                        'cus_name'     => Input::get('customer_first_name'),
                        'cus_email'    => Input::get('customer_Email'),
                        'role_id'    => Input::get('select_role'),
                        'cus_pwd'      => $mdpwd,
                        'cus_phone'    => Input::get('customer_phone'),
                        'cus_address1' => Input::get('customer_address1'),
                        'cus_address2' => Input::get('customer_address2'),
                        'cus_country'  => Input::get('select_customer_country'),
                        'cus_city'     => Input::get('select_customer_city'),
						'cus_joindate' => $now,
                        'created_date' => $date,
                        
                        'ship_name'       => Input::get('customer_first_name'),
                        'ship_address1'   => Input::get('customer_address1'),
                        'ship_address2'   => Input::get('customer_address2'),
                        'ship_ci_id'      => Input::get('select_customer_city'),
                        'ship_state'      => '',
                        'ship_country'    => Input::get('select_customer_country'),
                        'ship_postalcode' => '',
                        'ship_phone'      => Input::get('customer_phone'),
                        'ship_email'      => Input::get('customer_Email'),
                    );
                    
                    $return = Customer::insert_customer($entry);

                    $send_mail_data = array(
                        'customername' => Input::get('customer_first_name'),
                        'address'  => Input::get('customer_Email'),
                        'password' => Input::get('customer_password')
					);

                    Mail::send('emails.customeraccountcreation', $send_mail_data, function($message) use($send_mail_data){
                         $email =$send_mail_data['address'];
						if(Lang::has(Session::get('admin_lang_file').'.BACK_YOUR_ACCOUNT_WAS_CREATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_YOUR_ACCOUNT_WAS_CREATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_YOUR_ACCOUNT_WAS_CREATED_SUCCESSFULLY');
			} 
                        $message->to($email)->subject($session_message);
                    });
                    if($return){
						if(Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER_HAS_BEEN_CREATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_CUSTOMER_HAS_BEEN_CREATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER_HAS_BEEN_CREATED_SUCCESSFULLY');
			}
           
                        return Redirect::to('manage_customer')->with('insert_result',$session_message);
                    }
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_customer_submit()
    {
        if (Session::has('userid')) {
            $data       = Input::except(array(
                '_token'
            ));
            $customerid = Input::get('customer_edit_id');
            
            $rule = array(
                'customer_first_name' => 'required',
                'customer_Email' => 'required|email',
                'customer_phone' => 'required|numeric',
                'customer_address1' => 'required',
                'customer_address2' => 'required',
                'select_customer_country' => 'required',
                'select_customer_city' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_customer/' . $customerid)->withErrors($validator->messages())->withInput();
            }
            
            else {
                
                $emailaddr      = Input::get('customer_Email');
                $checkemailaddr = Customer::check_emailaddress_edit($emailaddr, $customerid);
                //print_r($checkemailaddr);
               // exit;
                
                if (count($checkemailaddr) >0 ){
                    if(Lang::has(Session::get('admin_lang_file').'.BACK_ALREADY_EMAILID_EXISTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ALREADY_EMAILID_EXISTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ALREADY_EMAILID_EXISTS');
			}
                    return Redirect::to('edit_customer/' . $customerid)->withMessage($session_message)->withInput();
                } else {
                    
                    $entry = array(
                        
                        'cus_name' => Input::get('customer_first_name'),
                        'cus_email' => Input::get('customer_Email'),
                        'cus_phone' => Input::get('customer_phone'),
                        'cus_address1' => Input::get('customer_address1'),
                        'cus_address2' => Input::get('customer_address2'),
                        'cus_country' => Input::get('select_customer_country'),
                        'cus_city' => Input::get('select_customer_city'),
                        'role_id'    => Input::get('select_role'),

                    );
                    
                    
                    $return = Customer::update_customer($customerid, $entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			} 
             // $session_messag=Session::put('updated_result', $session_message);
              //$session_message=session::get('updated_result'); exit;
          // $session_messag=Session::flash('updated_result', 'xxx');
          // print_r(session()->all());

               // session()->flash('status', 'Task was successful!');
                    return Redirect::to('manage_customer')->with('updated_result',$session_message);
                    //print_r(session()->all());
                   // exit;
                }
                
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function manage_subscribers()
    {
        if (Session::has('userid')) {
            Session::put('newsubscriberscount', 0);
            Customer::update_subscriber_msgstatus();
			if(Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_CUSTOMER');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER');
			}
            $adminheader     = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus  = view('siteadmin.includes.admin_left_menu_customer');
            $adminfooter     = view('siteadmin.includes.admin_footer');
            $subscriber_list = Customer::subscriber_list();
            return view('siteadmin.manage_subscribers')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('subscriber_list', $subscriber_list);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function delete_subscriber($id)
    {
        if (Session::has('userid')) {
            $return = Customer::delete_subscriber($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
            return Redirect::to('manage_subscribers')->with('success',$session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_subscriber_status($id, $status)
    {
        if (Session::has('userid')) {
            $return = Customer::edit_subscriber_status($id, $status);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
            return Redirect::to('manage_subscribers')->with('success',$session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function manage_inquires()
    {
        if (Session::has('userid')) {
            
            $from_date   = Input::get('from_date');
            $to_date     = Input::get('to_date');
            $enquiresrep = Customer::get_enquires($from_date, $to_date);
			
			$admin_enq = array('enq_readstatus'=>1);
			$admin_status = Customer::get_admin_inquries($admin_enq);
            
            Session::put('inquiriescnt', 0);
            Customer::update_inquiries_msgstatus();
			if(Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_CUSTOMER');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_customer');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $enquires_list  = Customer::enquires_list();
            return view('siteadmin.manage_inquires')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('enquires_list', $enquires_list)->with('enquiresrep', $enquiresrep)
            ->with('from_date',$from_date)->with('to_date',$to_date);

        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function delete_inquires($id)
    {
        if (Session::has('userid')) {
            $return = Customer::delete_inquires($id);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
            return Redirect::to('manage_inquires')->with('success', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function manage_referral_users()
    {
        if (Session::has('userid')) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_CUSTOMER');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER');
			}
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_customer');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $referral_list  = Customer::referral_list();
            return view('siteadmin.manage_referral_users')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('referral_list', $referral_list);
        }
        
        else {
            return Redirect::to('siteadmin');
        }
    }

    public function check_cus_email_exist(){
        $emailaddr      = Input::get('email_id');
        $checkemailaddr = Customer::check_email_address($emailaddr);
        if($checkemailaddr!=0){
            echo '1';
        }else{
            echo '0';
        }
    }
    public function check_cus_email_exist_edit(){
       
        $customer_id=Input::get('customer_edit_id');
       
        $emailaddr      = Input::get('email_id');
        $checkemailaddr = DB::table('nm_customer')->where('cus_email', '=', $emailaddr)
        ->where('cus_id','!=',$customer_id)
        ->where('cus_status','!=','2')->count();
        if($checkemailaddr!=0){
            echo '1';
        }else{
            echo '0';
        }
    }
    /**Block multiple*/
 public function block_status_customer_submit()
    {
      // Customer::status_customer($id, $status);
        if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=1;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $array=array('stor_status' => 1); 
             $block_Customer_admin=Customer::status_customer($id, $status);
            
                   }
            if($block_Customer_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        }
    }
    
	/**UnBlock multiple*/
 public function unblock_status_customer_submit()
    {
       if (Session::has('userid'))
        {
         $data=Input::get('val');
         $status=0;
         for($i=0;$i<count($data);$i++){
             $id=$data[$i];
              $array=array('stor_status' => 0); 
             $unblock_Customer_admin=Customer::status_customer($id, $status);
            
                   }
            if($unblock_Customer_admin>0)
            {
            echo "1";
                }else {
            echo "0";
                      }

        } 
    }
	
 public function delete_customer_page($id)
    {
        if (Session::has('userid')) {
            Customer::delete_customer_page($id);
		if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}	
            return Redirect::to('manage_customer_page')->with('delete_result', $session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }


    /**delete multiple**/
		public function delete_customer_page_multiple()
			{ 
				if (Session::has('userid'))
				{
					$data=Input::get('val'); 
					 for($i=0;$i<count($data);$i++)
					 {
						 
				$id=$data[$i];
				$delete= DB::table('nm_customer')->where('cus_id', '=', $id)->update(array('cus_status'=>2));

					 }
					if(count($delete)>0){
					echo "1";}
					else {
					echo "0";}

				}


			}	
	
	
}