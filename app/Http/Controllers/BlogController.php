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
use App\Auction;
use App\Customer;
use App\Transactions;
use Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
 class BlogController extends Controller {

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
   public function add_blog()
   {
	if(Session::has('userid'))
	{
	if(Lang::has(Session::get('admin_lang_file').'.BACK_BLOG')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_BLOG');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_BLOG');
			}	
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menu_blog');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$categoryresult = Blog::get_category();
	return view('siteadmin.add_blog')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('categoryresult',$categoryresult);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }

   public function edit_customer($id)
   {
	if(Session::has('userid'))
	{
		if(Lang::has(Session::get('admin_lang_file').'.BACK_BLOG')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_BLOG');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_BLOG');
			}
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menu_customer');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$countryresult = Customer::get_country();
	$customerresult = Customer::get_customer($id);
	return view('siteadmin.edit_customer')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('countryresult',$countryresult)->with('customerresult',$customerresult);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
   }

   public function manage_blogcomments()
   {
	if(Session::has('userid'))
	{
		if(Lang::has(Session::get('admin_lang_file').'.BACK_BLOG')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_BLOG');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_BLOG');
			}
			
			$admin_blogcmt = array('cmt_msg_status'=>1);
			$admin_blogcmts = Blog::get_admin_inquries($admin_blogcmt);
			
	Blog::update_blog_msgstatus();
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu",$session_message);	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menu_blog');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$get_blogcmts_details = Blog::blogcmnts_list();
	return view('siteadmin.manage_blogcomments')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('blog_comments',$get_blogcmts_details);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
			
    }
   
   public function status_blogcmt_submit($cmtid,$status)
   {
	if(Session::has('userid'))
	{
	$return = Blog::block_blog_cmt($cmtid,$status);
	if($status == 1)
	{
	if(Lang::has(Session::get('admin_lang_file').'.BACK_COMMENTS_APPROVED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_COMMENTS_APPROVED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_COMMENTS_APPROVED_SUCCESSFULLY');
			}	
        return Redirect::to('manage_blogcmts')->with('success',$session_message);
	}
	else
	{
		if(Lang::has(Session::get('admin_lang_file').'.BACK_COMMENTS_UNAPPROVED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_COMMENTS_UNAPPROVED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_COMMENTS_UNAPPROVED_SUCCESSFULLY');
			}
	return Redirect::to('manage_blogcmts')->with('success',$session_message);
	}
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
   }

   public function reply_blogcmts($cmtid)
   {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","blog");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menu_blog');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$cmtsdetails = Blog::get_blogcmts_details($cmtid);
	return view('siteadmin.reply_blog')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('cmtsdetails',$cmtsdetails);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
   }

   public function admin_blogreply_submit()
   {
	if(Session::has('userid'))
	{
	$cmtid = Input::get('cmt_id');
	
	date_default_timezone_set('Asia/Kolkata');
	$now 	 = date("Y-m-d H:i:s");
					
	$entry = array(
	'reply_blog_id' => Input::get('blog_id'),
	'reply_cmt_id' => Input::get('cmt_id'),
	'reply_msg' =>Input::get('blog_reply'),
	'reply_date' =>$now,
	);
	$return = Blog::insert_reply($entry);
	if(Lang::has(Session::get('admin_lang_file').'.BACK_REPLY_SAVED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_REPLY_SAVED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_REPLY_SAVED_SUCCESSFULLY');
			}
	return Redirect::to('manage_blogcmts')->with('success',$session_message);
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
   }

   public function customer_edit_getcity()
   {
	$id = $_GET['city_id'];
	$selectcity = Customer::get_customer_city($id);
 	if($selectcity)
	{
	$return = "";
	foreach($selectcity as $selectcity_ajax) {
	$return = "<option value='".$selectcity_ajax->ci_id."' selected> ".$selectcity_ajax->ci_name." </option>";		
	}
	echo $return;
	}
	else
	{
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

  public function add_blog_submit()
  {
	if(Session::has('userid'))
	{
	$data = Input::except(array('_token'));
	//$required = ((Lang::has(Session::get('admin_lang_file').'.BACK_REQUIRED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_REQUIRED') : trans(ADMIN_OUR_LANGUAGE.'.BACK_REQUIRED');
	date_default_timezone_set('Asia/Kolkata');
	$now 	 = date("Y-m-d H:i:s");
					
	$rule = array(
	'blog_title' => 'required',
	'blog_description' => 'required',
	'blog_category' => 'required',
	'tags' => 'required',
	'file' => 'required|image|mimes:jpeg,png,jpg|image_size:'.$this->blog_width.','.$this->blog_height.''
	) ;
	
	$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'blog_title_'.$get_lang_name => 'required',
					'blog_description_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
			
	$validator = Validator::make($data,$rule);			
	if($validator->fails())
	{
	return Redirect::to('add_blog')->withErrors($validator->messages())->withInput();
	}
	else
	{	
	$blogtitle = Input::get('blog_title');
	$checkblogtitle = Blog::check_blogtitle($blogtitle);
	if(count($checkblogtitle) > 0)
	{	
	
	if(Lang::has(Session::get('admin_lang_file').'.BACK_ALREADY_BLOG_TITLE_EXISTS')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_ALREADY_BLOG_TITLE_EXISTS');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ALREADY_BLOG_TITLE_EXISTS');
			}
	return Redirect::to('add_blog')->withMessage($session_message)->withInput();
	}
	else
	{	
	$blog_comments = Input::get('allow_comments');
	if(!$blog_comments)
	{
	$blog_comments = 0;	
	}
	$file = Input::file('file');
	if($file!='')
	{
	$file = Input::file('file');
	$time=time();
	$filename = 'Blog_' .$time.'_'. $file->getClientOriginalName();
	$move_img = explode('.',$filename);
	$destinationPath = './public/assets/blogimage/';
	Image::make($file)->save('./public/assets/blogimage/'.$filename,$this->image_compress_quality);
	$entry = array(
	'blog_title' => Input::get('blog_title'),
	'blog_desc' => Input::get('blog_description'),
	'blog_catid' => Input::get('blog_category'),
	'blog_image' => $filename,
	'blog_metatitle' => Input::get('meta_title'),
	'blog_metadesc' => Input::get('meta_description'),
	'blog_metakey' => Input::get('meta_keywords'),
	'blog_tags' => Input::get('tags'),
	'blog_comments' =>$blog_comments,
	'blog_type' => Input::get('blogstatus'),
	'blog_status' => 0,
	'blog_created_date' => $now,
	);
	
	$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'blog_title_'.$get_lang_code => Input::get('blog_title_'.$get_lang_name),
						'blog_desc_'.$get_lang_code => Input::get('blog_description_'.$get_lang_name),
						'blog_metatitle_'.$get_lang_code => Input::get('meta_title_'.$get_lang_name),
						'blog_metadesc_'.$get_lang_code => Input::get('meta_description_'.$get_lang_name),
						'blog_metakey_'.$get_lang_code => Input::get('meta_keywords_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
	$return = Blog::insert_blog($entry);
	if(Input::get('blogstatus') == 1)
	{
	if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}
	
	return Redirect::to('manage_publish_blog')->with('success',$session_message);
	}
	else
	{
	if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}
	return Redirect::to('manage_draft_blog')->with('success',$session_message);
	}
	}
	else
	{	

	 //$upload_err = ((Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMERS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_CUSTOMERS') : trans(ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMERS');
	 //echo "err is  " . $upload_err;
	 //return Redirect::to('add_blog')->withMessage($upload_err)->withInput();
	 
	if(Lang::has(Session::get('admin_lang_file').'.BACK_PLEASE_UPLOAD_BLOG_IMAGE')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_PLEASE_UPLOAD_BLOG_IMAGE');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_PLEASE_UPLOAD_BLOG_IMAGE');
			}
	return Redirect::to('add_blog')->withMessage($session_message)->withInput();
	}
	}
	}
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
   }

   public function edit_customer_submit()
   {
	if(Session::has('userid'))
	{
	$data = Input::except(array('_token')) ;
	$customerid = Input::get('customer_edit_id');
	$rule = array(
	'customer_first_name' => 'required',
	'customer_Email' => 'required|email',
	'customer_phone'=>'required|numeric',
	'customer_address1' => 'required',
	'customer_address2' => 'required',
	'select_customer_country' => 'required',
	'select_customer_city' => 'required',
	);
	$validator = Validator::make($data,$rule);			
	if ($validator->fails())
	{
	return Redirect::to('edit_customer/'.$customerid)->withErrors($validator->messages())->withInput();
	}
	else
	{	
	$emailaddr=Input::get('customer_Email');
	$checkemailaddr=Customer::check_emailaddress_edit($emailaddr,$customerid);
	if($checkemailaddr)
	{
	}
        else
	{
		if(Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION_NAME_EXIST')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION_NAME_EXIST');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION_NAME_EXIST');
			}
	return Redirect::to('edit_customer/'.$customerid)->withMessage($session_message)->withInput();	
	$entry = array(
	'cus_name' => Input::get('customer_first_name'),
	'cus_email' => Input::get('customer_Email'),
	'cus_phone' => Input::get('customer_phone'),
	'cus_address1' => Input::get('customer_address1'),
	'cus_address2' => Input::get('customer_address2'),
	'cus_country' => Input::get('select_customer_country'),
	'cus_city' => Input::get('select_customer_city'),
	);
	$return = Customer::insert_customer($entry);
	return Redirect::to('add_customer');	
	}
	}
	}
	else
	{
	return Redirect::to('siteadmin');
	}
   }

   public function manage_draft_blog()
   {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","blog");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menu_blog');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$get_manage_draft_category = Blog::get_manage_draft_category();
	return view('siteadmin.manage_draft_blog')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('blog_details',$get_manage_draft_category);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
   }

   public function manage_publish_blog()
   {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","blog");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menu_blog');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$get_manage_publish_category = Blog::get_manage_publish_category();
	return view('siteadmin.manage_publish_blog')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('blog_details',$get_manage_publish_category);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
   }

   public function block_blog($id,$status,$blog_type)
   {
	if(Session::has('userid'))
	{
	$return = Blog::block_blog($id,$status);
    if($status == 1)
	{
		if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_BLOCKED_SUCCESSFULLY');
			}
	return Redirect::to('manage_publish_blog')->with('success',$session_message);
	}
	else
	{
		if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UNBLOCKED_SUCCESSFULLY');
			}
	return Redirect::to('manage_publish_blog')->with('success',$session_message);
	}
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
   }

   public function delete_blog_submit($id,$blog_type)
   {
	if(Session::has('userid'))
	{
	$return = Blog::delete_blog_submit($id);
	if($blog_type == 1)
	{
		/*if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}*/
			$session_message = 'Record Deleted Successfully';
	return Redirect::to('manage_publish_blog')->with('success',$session_message);
	}
	else
	{
		/*if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
			}*/
			$session_message = 'Record Deleted Successfully';
	return Redirect::to('manage_draft_blog')->with('success',$session_message);
	}
	}
	else
        {
	return Redirect::to('siteadmin');
	}	
    }

    public function edit_blog($id)
    {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","blog");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menu_blog');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$categoryresult = Blog::get_category();
	$get_selected_blog = Blog::get_selected_blog($id);
	return view('siteadmin.edit_blog')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('categoryresult',$categoryresult)->with('selected_blog',$get_selected_blog);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }

    public function edit_blog_submit()
    {
        if(Session::has('userid')){
			
			$data = Input::except(array('_token')) ;
			$id   = Input::get('blog_id');
			$rule = array(
				'blog_title' => 'required',
				'blog_description' => 'required',
				'blog_category'=>'required',
				'tags' => 'required',
				'file' => 'image|mimes:jpeg,png,jpg|image_size:'.$this->blog_width.','.$this->blog_height.''
			) ;
			
			$get_active_lang = 	$this->get_active_language; 
			$lang_rule = array();
			if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
					$get_lang_name = $get_lang->lang_name;
				
					$lang_rule = array(
					'blog_title_'.$get_lang_name => 'required',
					'blog_description_'.$get_lang_name => 'required',
					); 
					
					$rule  = array_merge($rule,$lang_rule);
			
				}
			}
			
	$validator = Validator::make($data,$rule);			
	if($validator->fails())
	{
	return Redirect::to('edit_blog/'.$id)->withErrors($validator->messages())->withInput();
	}
	else
	{	
	$blog_comments = Input::get('allow_comments');
	if(!$blog_comments)
	{
	$blog_comments=0;	
	}
	$file = Input::file('file');
	if($file!='')
	{
	$file = Input::file('file');
	$time=time();
	$filename = 'Blog_' .$time.'_'. $file->getClientOriginalName();
	$destinationPath = './public/assets/blogimage/';
	$old_blog_image = Input::get('old_blog_image');
		if(file_exists($destinationPath.$old_blog_image))
		{
			@unlink($destinationPath.$old_blog_image);
		}
	Image::make($file)->save('./public/assets/blogimage/'.$filename,$this->image_compress_quality);
	$entry = array(
	'blog_title' => Input::get('blog_title'),
	'blog_desc' => Input::get('blog_description'),
	'blog_catid' => Input::get('blog_category'),
	'blog_image' => $filename,
	'blog_metatitle' => Input::get('meta_title'),
	'blog_metadesc' => Input::get('meta_description'),
	'blog_metakey' => Input::get('meta_keywords'),
	'blog_tags' => Input::get('tags'),
	'blog_comments' =>$blog_comments,
	'blog_type' => Input::get('blogstatus'),
	'blog_status' => 0,
	);
	
	$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'blog_title_'.$get_lang_code => Input::get('blog_title_'.$get_lang_name),
						'blog_desc_'.$get_lang_code => Input::get('blog_description_'.$get_lang_name),
						'blog_metatitle_'.$get_lang_code => Input::get('meta_title_'.$get_lang_name),
						'blog_metadesc_'.$get_lang_code => Input::get('meta_description_'.$get_lang_name),
						'blog_metakey_'.$get_lang_code => Input::get('meta_keywords_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
				
	}
	else
	{
		$entry = array(
		'blog_title' => Input::get('blog_title'),
		'blog_desc' => Input::get('blog_description'),
		'blog_catid' => Input::get('blog_category'),
		'blog_metatitle' => Input::get('meta_title'),
		'blog_metadesc' => Input::get('meta_description'),
		'blog_metakey' => Input::get('meta_keywords'),
		'blog_tags' => Input::get('tags'),
		'blog_comments' =>$blog_comments,
		'blog_type' => Input::get('blogstatus'),
		'blog_status' => 0,
		);
		
		$lang_entry = array();
				if(!empty($get_active_lang)) { 
					foreach($get_active_lang as $get_lang) {
						$get_lang_name = $get_lang->lang_name;
						$get_lang_code = $get_lang->lang_code;
				
						 $lang_entry = array(
						'blog_title_'.$get_lang_code => Input::get('blog_title_'.$get_lang_name),
						'blog_desc_'.$get_lang_code => Input::get('blog_description_'.$get_lang_name),
						'blog_metatitle_'.$get_lang_code => Input::get('meta_title_'.$get_lang_name),
						'blog_metadesc_'.$get_lang_code => Input::get('meta_description_'.$get_lang_name),
						'blog_metakey_'.$get_lang_code => Input::get('meta_keywords_'.$get_lang_name),
						); 
						
						$entry  = array_merge($entry,$lang_entry);
					}
				}
				
	}
	$return = Blog::edit_blog($id,$entry);
	if(Input::get('blogstatus') == 1)
	{
		if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
	return Redirect::to('manage_publish_blog')->with('success',$session_message);
	}
	else
	{
		if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
	return Redirect::to('manage_draft_blog')->with('success',$session_message);
	}
	}
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }

    public function blog_details($id)
    {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","blog");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menu_blog');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$blog_list = Blog::get_selected_blog_details($id);
	return view('siteadmin.blog_details')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('blog_list',$blog_list);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }
		
    public function blog_settings()
    {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","blog");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menu_blog');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$blog_settings = Blog::get_blog_settings();
	return view('siteadmin.blog_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('blog_settings',$blog_settings);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }
		
    public function edit_blog_settings()
    {
	if(Session::has('userid'))
	{
	$data =  Input::except(array('_token'));
	$id = Input::get('blog_id');
	$rule  =  array(
        'allow_comments' => 'required',
	'admin_approval' => 'required',
	'post_per_page'=>'required',
	);
	$validator = Validator::make($data,$rule);			
	if ($validator->fails())
	{
	return Redirect::to('blog_settings')->withErrors($validator->messages())->withInput();
	}
	else
	{	
	$entry = array(
	'bs_allowcommt' => Input::get('allow_comments'),
	'bs_radminapproval' => Input::get('admin_approval'),
	'bs_postsppage' => Input::get('post_per_page'),
	);
	$return = Blog::edit_blog_settings($entry);
	if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '') 
			{ 
				$session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}  
			else 
			{ 
				$session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
			}
	return Redirect::to('blog_settings')->with('success',$session_message);
	}
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }

    //Ad Image - Save Edited Image
    public function CropNdUpload_blogImg(){
       
        $data = Input::except(array(
                '_token'
            ));
       // print_r($data);exit();
        $product_id     = Input::get('product_id');
        $img_id         = Input::get('img_id');
        $imgfileName    = Input::get('imgfileName'); //old image file name

        $imageData 		= Input::get('base64_imgData');
        $img_dat 		= explode(',',Input::get('base64_imgData'));
        $new_name 		= 'Ads_'.time().rand().'.jpg';

        //$imge =  file_put_contents('public/assets/blogimage/'.$new_name, base64_decode($img_dat[1]));
        $imageData 		= base64_decode($img_dat[1]);

        $file_path = './public/assets/blogimage/'.$new_name;
        //Upload image with compression
        $img = Image::make(imagecreatefromstring($imageData))->save($file_path);
        //jpg background color black remove
        list($width, $height) = getimagesize($file_path);
        $output = imagecreatetruecolor($width, $height);
        $white = imagecolorallocate($output,  255, 255, 255);
        imagefilledrectangle($output, 0, 0, $width, $height, $white);
        imagecopy($output, imagecreatefromstring($imageData), 0, 0, 0, 0, $width, $height);
        imagejpeg($output, $file_path);
        //image compression
        $img = Image::make($output)->save($file_path,$this->image_compress_quality);
        if(file_exists('public/assets/blogimage/'.$new_name)){

            //upload small image
            list($width,$height)=getimagesize('public/assets/blogimage/'.$new_name);     
            

            //unlink old files starts
            if(file_exists('public/assets/blogimage/'.$imgfileName))
                unlink("public/assets/blogimage/".$imgfileName);
            //unlink old files ends

			//update in image table            
            $entry 	= array('blog_image' => $new_name );
            $return = Blog::edit_blog($product_id,$entry);

            if(Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY')!= '') 
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
            else 
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_UPDATED_SUCCESSFULLY');
            }
             return Redirect::to('edit_blog/'.$product_id)->with('block_message', $session_message);
        }

        exit();
    }
    /* Image  Crop , rorate and mamipulation ends */


 }
