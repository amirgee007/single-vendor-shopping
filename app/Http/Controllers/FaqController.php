<?php
namespace App\Http\Controllers;
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
use App\Country;
use App\Customer;
use App\City;
use App\Category;
use App\Faqmodel;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
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
    
    public function __construct(){
        parent::__construct();
        // set admin Panel language
        $this->setLanguageLocaleAdmin();
    }
    
    public function add_faq()
    {
		if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);
        $adminleftmenus = view('siteadmin.includes.admin_left_menus');
        $adminfooter    = view('siteadmin.includes.admin_footer');
        
        return view('siteadmin.add_faq')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
    }

    public function manage_faq()
    {
		if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
        $adminleftmenus = view('siteadmin.includes.admin_left_menus');
        $adminfooter    = view('siteadmin.includes.admin_footer');
        
        $faqresult = Faqmodel::view_faq_detail();
        
        return view('siteadmin.manage_faq')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('faqresult', $faqresult);
    }

    public function edit_faq($id)
    {
		if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
        $adminleftmenus = view('siteadmin.includes.admin_left_menus');
        $adminfooter    = view('siteadmin.includes.admin_footer');
        
        $faqresult = Faqmodel::showindividual_faq_detail($id);
        
        return view('siteadmin.edit_faq')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('faqresult', $faqresult)->with('id', $id);
    }
    
    public function delete_faq($id)
    {
		if(Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SETTINGS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS');
			}
        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
        $adminleftmenus = view('siteadmin.includes.admin_left_menus');
        $adminfooter    = view('siteadmin.includes.admin_footer');
        
        $affected = Faqmodel::delete_faq_detail($id);
		if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}
        return Redirect::to('manage_faq')->with('delete_result',$session_message);
    }
    
    public function update_status_faq($id, $status)
    {
        $return = Faqmodel::update_status_faq($id, $status);
        if ($status == 0) {
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}
                return Redirect::to('manage_faq')->with('updated_result', $session_message);
            }else if ($status == 1) {
				if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}
                return Redirect::to('manage_faq')->with('updated_result', $session_message);
        }
    }

    public function add_faq_submit()
    {
        
        $data = Input::except(array(
            '_token'
        ));
        $rule = array(
            'faqquestion' => 'required',
            'faqanswer' => 'required',
        );
		
		$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'faq_question_'.$get_lang_name => 'required',
					'faq_answer_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}

        
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
           return Redirect::to('add_faq')->withErrors($validator->messages())->withInput();
            //return Redirect::to('add_faq')->with('message','Question and answer both required!');
            
        } else {
            $entry = array(
                'faq_name' => Input::get('faqquestion'),
                'faq_ans' => Input::get('faqanswer'),
            );
            
			$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'faq_name_'.$get_lang_code => Input::get('faq_question_'.$get_lang_name),
						'faq_ans_'.$get_lang_code => Input::get('faq_answer_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
            $return = Faqmodel::save_faq_detail($entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_INSERTED_SUCCESSFULLY');
			}
            return Redirect::to('manage_faq')->with('insert_result',$session_message);
            
                
        }
    }
    
    public function update_faq_submit()
    {
        
        $data      = Input::except(array(
            '_token'
        ));
        $rule      = array(
            'faq_question' => 'required',
            'faq_answer' => 'required',
        );
		
		$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'faq_question_'.$get_lang_name => 'required',
					'faq_answer_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
        $id        = Input::get('id');
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->messages())->withInput();
            
        } else {
            $entry = array(
                'faq_name' => Input::get('faq_question'),
                'faq_ans' => Input::get('faq_answer'),
            );
			
			$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'faq_name_'.$get_lang_code => Input::get('faq_question_'.$get_lang_name),
						'faq_ans_'.$get_lang_code => Input::get('faq_answer_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
            
            $return = Faqmodel::update_faq_detail($id, $entry);
			if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
            return Redirect::to('manage_faq')->with('updated_result',$session_message);
        }
    }



    /**Block multiple **/

	public function status_faq_submit_multiple()
		
		{

		if (Session::has('userid'))
		{
			$data=Input::get('val');

		$status=1;
		$status = array(
            		'faq_status' => $status ,
					);
		 for($i=0;$i<count($data);$i++){
			 $id=$data[$i];
			 $count=DB::table('nm_faq')->where('faq_id','=',$id)->update($status);
									 }
			if(count($count)>0)
			{
			echo "1";
			}
			else {
			echo "0";
				 }
			}
		}

		public function status_faq_submit_multiple_unblock()
		
		{
		if (Session::has('userid'))
		{
			$data=Input::get('val');

		$status=0;
	
		 for($i=0;$i<count($data);$i++){
			 $id=$data[$i];
			 $count=DB::table('nm_faq')->where('faq_id','=',$id)->update(array('faq_status' => $status));
									 }
			if(count($count)>0)
			{
			echo "1";
			}
			else {
			echo "0";
				 }
			}
		}

/**delete multiple**/
		public function delete_faq_multiple()
			{ 
				if (Session::has('userid'))
				{
					$data=Input::get('val'); 
					 for($i=0;$i<count($data);$i++)
					 {
				$id=$data[$i];
				$delete= DB::table('nm_faq')->where('faq_id', '=', $id)->delete();

					 }
					if(count($delete)>0){
					echo "1";}
					else {
					echo "0";}

				}
			}

    
    
}

?>
