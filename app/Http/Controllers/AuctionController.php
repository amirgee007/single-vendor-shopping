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
use App\Auction;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuctionController extends Controller {

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
	
	public function auction_dashboard()
	{
			if(Session::has('userid'))
			{
		 $adminheader 		= view('siteadmin.includes.admin_header')->with("routemenu","auction");	
		 $adminleftmenus	= view('siteadmin.includes.admin_left_menu_auction');
		 $adminfooter 		= view('siteadmin.includes.admin_footer');
		 $auction_count = Auction::get_chart_details();
		 $archievd_cnt = Auction::get_archievd_auction();
		 $active_cnt = Auction::get_active_details();
		 $bidding_amt = Auction::total_bidding_amt();
		 $bidding_winner = Auction::total_bidding_winner();
		 return view('siteadmin.auction_dashboard')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('auction_cnt',$auction_count)->with('archievd_count',$archievd_cnt)->with('active_count',$active_cnt)->with('bidding_amt',$bidding_amt)->with('bidding_winner',$bidding_winner);
			}
			else
		{
		return Redirect::to('siteadmin');
		}	
		
	}
	public function add_auction()
	{
		if(Session::has('userid'))
			{
		 $adminheader 		= view('siteadmin.includes.admin_header')->with("routemenu","auction");	
		 $adminleftmenus	= view('siteadmin.includes.admin_left_menu_auction');
		 $adminfooter 		= view('siteadmin.includes.admin_footer');
		 $category  = Auction::get_category();
		 $merchant_details  = Auction::get_merchant_details();
		 return view('siteadmin.add_auction')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('action','save')->with('category',$category)->with('merchant_details',$merchant_details);
			}
			else
		{
		return Redirect::to('siteadmin');
		}	
	}	
	
	public function auction_winners()
	{
		if(Session::has('userid'))
			{
		 $adminheader 		= view('siteadmin.includes.admin_header')->with("routemenu","auction");	
		 $adminleftmenus	= view('siteadmin.includes.admin_left_menu_auction');
		 $adminfooter 		= view('siteadmin.includes.admin_footer');
		 $action_winners   = Auction::get_auction_winners();
		 
		 return view('siteadmin.auction_winners')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('auctiondetails',$action_winners);
			}
			else
		{
		return Redirect::to('siteadmin');
		}	
	}	
	public function auction_cod()
	{
		if(Session::has('userid'))
			{
		 $adminheader 		= view('siteadmin.includes.admin_header')->with("routemenu","auction");	
		 $adminleftmenus	= view('siteadmin.includes.admin_left_menu_auction');
		 $adminfooter 		= view('siteadmin.includes.admin_footer');
		 $action_winners   = Auction::get_auction_cod();
		 
		 return view('siteadmin.auction_cashondelivery')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('auctiondetails',$action_winners);
			}
			else
		{
		return Redirect::to('siteadmin');
		}	
	}
	public function cancel_auction_cod($id)
	{
		if(Session::has('userid'))
			{
		$entry = array(
            'oa_bid_item_status' => 3,
			);
		  Auction::cancel_auction_cod($id,$entry);
		 
		return Redirect::to('auction_cod')->with('cancel_message','Auction Cancelled');
			}
			else
		{
		return Redirect::to('siteadmin');
		}	
		 
		 
	}
		
	
	public function add_auction_submit()
	{
		if(Session::has('userid'))
			{
		$count = Input::get('count');
		$filename_new_get = "";
		for($i = 0 ; $i < $count ; $i++)
		{
			$file_more = Input::file('file_more'.$i);
			$file_more_name = $file_more->getClientOriginalName();	
			$move_more_img = explode('.',$file_more_name);
  		    $filename_new = $move_more_img[0].str_random(8).".".$move_more_img[1];
			$newdestinationPath = './public/assets/auction/';
		 	$uploadSuccess_new =Input::file('file_more'.$i)->move($newdestinationPath,$filename_new);
			$filename_new_get .= $filename_new."/**/";			
		}
		 $filename_new_get;
		 $now = date('Y-m-d H:i:s');
		 $inputs = Input::all();
		 $file = Input::file('file');
   		 $filename = $file->getClientOriginalName();
  		 $move_img = explode('.',$filename);
  		 $filename = $move_img[0].str_random(8).".".$move_img[1];
 		 $destinationPath = './public/assets/auction/';
		 $uploadSuccess = Input::file('file')->move($destinationPath,$filename);
		 $file_name_insert = $filename . "/**/".$filename_new_get;
		 $deal_saving_price = Input::get('originalprice') - Input::get('auctionprice');
		 $deal_discount_percentage = round(($deal_saving_price/ Input::get('originalprice'))*100,2);
		  $entry = array(
            'auc_title' => Input::get('title') ,
			'auc_category' => Input::get('category') ,
			'auc_main_category' => Input::get('maincategory') ,
			'auc_sub_category' => Input::get('subcategory') ,
			'auc_second_sub_category' => Input::get('secondsubcategory') ,
			'auc_original_price' => Input::get('originalprice') ,
			'auc_auction_price' => Input::get('auctionprice') ,
			'auc_bitinc' => Input::get('bidincr') ,
			'auc_saving_price' => $deal_saving_price,
			'auc_start_date' => Input::get('startdate') ,
			'auc_end_date' => Input::get('enddate') ,
			'auc_shippingfee' => Input::get('shippingfee') ,
			'auc_shippinginfo' => Input::get('shippinginf') ,
			'auc_description' => Input::get('description') ,
			'auc_merchant_id' => Input::get('merchant') ,
			'auc_shop_id' => Input::get('shop') ,
			'auc_meta_keyword' => Input::get('metakeyword') ,
			'auc_meta_description' => Input::get('metadescription') ,
			'auc_image_count' => Input::get('count') ,
 			'auc_image' => $file_name_insert  ,
 			'auc_status' => 1  ,			
			'auc_posted_date' => $now,			 
         );
		 $return = Auction::save_auction($entry);
		 return Redirect::to('manage_auction')->with('block_message','Auction Inserted Successfully');
			}
			else
		{
		return Redirect::to('siteadmin');
		}	
	}
	
	public function edit_auction($id)
	{
		if(Session::has('userid'))
			{
		 $adminheader 		= view('siteadmin.includes.admin_header')->with("routemenu","auction");	
		 $adminleftmenus	= view('siteadmin.includes.admin_left_menu_auction');
		 $adminfooter 		= view('siteadmin.includes.admin_footer');
		 $category  = Auction::get_category();
		 $auction_list  = Auction::get_auction($id);
		 $merchant_details  = Auction::get_merchant_details();
		 return view('siteadmin.edit_auction')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('action','update')->with('category',$category)->with('auction_list',$auction_list)->with('merchant_details',$merchant_details);
			}
			else
		{
		return Redirect::to('siteadmin');
		}	
	}	
	
	public function edit_auction_submit()
	{
		
		if(Session::has('userid'))
			{
		 $now = date('Y-m-d H:i:s');
		 $inputs = Input::all();
		 
		$count = Input::get('count');
		$filename_new_get = "";
		for($i = 0 ; $i < $count ; $i++)
		{
			$file_more = Input::file('file_more'.$i);
			if($file_more == "")
			{
				$dile_name_new_get = Input::get('file_more_new'.$i);
				$filename_new_get .= $dile_name_new_get."/**/";	
			} else {
			$file_more_name = $file_more->getClientOriginalName();	
			$move_more_img = explode('.',$file_more_name);
  		    $filename_new = $move_more_img[0].str_random(8).".".$move_more_img[1];
			$newdestinationPath = './public/assets/auction/';
		 	$uploadSuccess_new =Input::file('file_more'.$i)->move($newdestinationPath,$filename_new);
			$filename_new_get .= $filename_new."/**/";	
			}
					
		}
	
		 $file = Input::file('file');
		 if($file == "")
		 {
			 $filename = Input::get('file_new');
		 } else {
   		 $filename = $file->getClientOriginalName();
  		 $move_img = explode('.',$filename);
  		 $filename = $move_img[0].str_random(8).".".$move_img[1];
 		 $destinationPath = './public/assets/auction/';
		 $uploadSuccess = Input::file('file')->move($destinationPath,$filename);
		 }
		 $file_name_insert = $filename . "/**/".$filename_new_get;
		 $id = Input::get('auction_edit_id');
		 $deal_saving_price = Input::get('originalprice') - Input::get('auctionprice');
		 $deal_discount_percentage = round(($deal_saving_price/ Input::get('originalprice'))*100,2);
		  $entry = array(
		  
		  'auc_title' => Input::get('title') ,
			'auc_category' => Input::get('category') ,
			'auc_main_category' => Input::get('maincategory') ,
			'auc_sub_category' => Input::get('subcategory') ,
			'auc_second_sub_category' => Input::get('secondsubcategory') ,
			'auc_original_price' => Input::get('originalprice') ,
			'auc_auction_price' => Input::get('auctionprice') ,
			'auc_bitinc' => Input::get('bidincr') ,
			'auc_saving_price' => $deal_saving_price,
			'auc_start_date' => Input::get('startdate') ,
			'auc_end_date' => Input::get('enddate') ,
			'auc_shippingfee' => Input::get('shippingfee') ,
			'auc_shippinginfo' => Input::get('shippinginf') ,
			'auc_description' => Input::get('description') ,
			'auc_merchant_id' => Input::get('merchant') ,
			'auc_shop_id' => Input::get('shop') ,
			'auc_meta_keyword' => Input::get('metakeyword') ,
			'auc_meta_description' => Input::get('metadescription') ,
			'auc_image_count' => Input::get('count') ,
 			'auc_image' => $file_name_insert  ,
 			'auc_status' => 1  ,			
			'auc_posted_date' => $now,	 
         );
         $return = Auction::edit_auction($entry,$id);
		 return Redirect::to('manage_auction')->with('block_message','Deal Updated Successfully');
			}
			else
		{
		return Redirect::to('siteadmin');
		}	
	}
	
	public function auction_select_main_cat()
	{
		$id =  $_GET['id'];
		$main_cat = Auction::get_main_category_ajax($id);
		if($main_cat)
		{
			$return  = "";
			$return  = "<option value='0'> -- Select -- </option>";
			foreach($main_cat as $main_cat_ajax) {
			$return .= "<option value='".$main_cat_ajax->smc_id."'> ".$main_cat_ajax->smc_name." </option>";		
			}
			echo $return;
		}
		else
		{
		echo	$return = "<option value='0'> No datas found </option>";
		}
	}
	
	public function auction_select_sub_cat()
	{
		$id =  $_GET['id'];
		$main_cat = Auction::get_sub_category_ajax($id);
		if($main_cat)
		{
			$return  = "";
			$return  = "<option value='0'> -- Select -- </option>";
			foreach($main_cat as $main_cat_ajax) {
			$return .= "<option value='".$main_cat_ajax->sb_id."'> ".$main_cat_ajax->sb_name." </option>";		
			}
			echo $return;
		}
		else
		{
		echo	$return = "<option value='0'> No datas found </option>";
		}
	}
	
	public function auction_select_second_sub_cat()
	{
		$id =  $_GET['id'];
		$main_cat = Auction::get_second_sub_category_ajax($id);
		if($main_cat)
		{
			$return  = "";
			$return  = "<option value='0'> -- Select -- </option>";
			foreach($main_cat as $main_cat_ajax) {
			$return .= "<option value='".$main_cat_ajax->ssb_id."'> ".$main_cat_ajax->ssb_name." </option>";		
			}
			echo $return;
		}
		else
		{
		echo	$return = "<option value='0'> No datas found </option>";
		}
	}
	
	public function auction_edit_select_main_cat()
	{
		$id =  $_GET['edit_id'];
		$main_cat = Auction::get_main_category_ajax_edit($id);
		if($main_cat)
		{
			$return  = "";
			foreach($main_cat as $main_cat_ajax) {
			$return = "<option value='".$main_cat_ajax->smc_id."' selected> ".$main_cat_ajax->smc_name." </option>";		
			}
			echo $return;
		}
		else
		{
		echo	$return = "<option value='0'> No datas found </option>";
		}
	}
	
	public function auction_edit_select_sub_cat()
	{
		$id =  $_GET['edit_sub_id'];
		$main_cat = Auction::get_sub_category_ajax_edit($id);
		if($main_cat)
		{
			$return  = "";
			foreach($main_cat as $main_cat_ajax) {
			$return = "<option value='".$main_cat_ajax->sb_id."' selected> ".$main_cat_ajax->sb_name." </option>";		
			}
			echo $return;
		}
		else
		{
		echo	$return = "<option value='0'> No datas found </option>";
		}
	}
	
	public function auction_edit_second_sub_cat()
	{
		$id =  $_GET['edit_secnd_sub_id'];
		$main_cat = Auction::get_second_sub_category_ajax_edit($id);
		if($main_cat)
		{
			$return  = "";
			foreach($main_cat as $main_cat_ajax) {
			$return = "<option value='".$main_cat_ajax->ssb_id."' selected> ".$main_cat_ajax->ssb_name." </option>";		
			}
			echo $return;
		}
		else
		{
		echo	$return = "<option value='0'> No datas found </option>";
		}
	}
	
	public function check_auctiontitle_exist()
	{
		$id =  $_GET['title'];
		$exist_title = Auction::check_title_exist_ajax($id);
		if($exist_title)
		{
			echo 1;
		}
		else
		{
		echo	0;
		}
	}
	
	public function check_auctiontitle_exist_edit()
	{
		$title =  $_GET['title'];
		$id =  $_GET['dealid'];
		$exist_title = Auction::check_title_exist_ajax_edit($id,$title);
		if($exist_title)
		{
			echo 1;
		}
		else
		{
		echo	0;
		}
	}
	
	
	
	public function manage_auction()
	{
		if(Session::has('userid'))
			{
		 $date = date('Y-m-d H:i:s');
		 $adminheader 		= view('siteadmin.includes.admin_header')->with("routemenu","auction");	
		 $adminleftmenus	= view('siteadmin.includes.admin_left_menu_auction');
		 $adminfooter 		= view('siteadmin.includes.admin_footer');
		 $return 			= Auction::get_auction_details($date);
		 return view('siteadmin.manage_auction')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('auction_details',$return );
			}
			else
		{
		return Redirect::to('siteadmin');
		}	
	}
	
	public function expired_auction()
	{
		if(Session::has('userid'))
			{
		 $date = date('Y-m-d H:i:s');
		 $adminheader 		= view('siteadmin.includes.admin_header')->with("routemenu","auction");	
		 $adminleftmenus	= view('siteadmin.includes.admin_left_menu_auction');
		 $adminfooter 		= view('siteadmin.includes.admin_footer');
		 $return 			= Auction::get_expired_auction($date);
		 return view('siteadmin.expired_auction')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('auction_details',$return );
			}
			else
		{
		return Redirect::to('siteadmin');
		}	
	}
	
	public function block_auction($id,$status)
	{
		if(Session::has('userid'))
			{
		$entry = array(
            'auc_status' => $status ,
			);
		Auction::block_auction_status($id,$entry);
		if($status == 1)
		{
			return Redirect::to('manage_auction')->with('block_message','Deal Activated');
		}
		else if($status == 0)
		{
			return Redirect::to('manage_auction')->with('block_message','Deal Blocked');
		}
			}
			else
		{
		return Redirect::to('siteadmin');
		}	
	}
	
	
	
	public function auction_details($id)
	{
		if(Session::has('userid'))
			{
		 $adminheader 		= view('siteadmin.includes.admin_header')->with("routemenu","auction");	
		 $adminleftmenus	= view('siteadmin.includes.admin_left_menu_auction');
		 $adminfooter 		= view('siteadmin.includes.admin_footer');
		 $return 			= Auction::get_auction_view($id);
		 return view('siteadmin.auction_details')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('auction_list',$return );
			}
			else
		{
		return Redirect::to('siteadmin');
		}	
	}
	public function auction_select_store_name()
	{
		$id =  $_GET['id'];
		$store_name = Auction::get_store_name_ajax($id);
		if($store_name)
		{
			$return  = "";
			$return  = "<option value='0'> -- Select -- </option>";
			foreach($store_name as $store_name_ajax) {
			$return .= "<option value='".$store_name_ajax->stor_id."'> ".$store_name_ajax->stor_name." </option>";		
			}
			echo $return;
		}
		else
		{
		echo	$return = "<option value='0'> No datas found </option>";
		}
	}
	public function auction_select_store_name_edit()
	{
		$id =  $_GET['edit_id'];
		$store_name = Auction::get_store_name_ajax_edit($id);
		if($store_name)
		{
			$return  = "";
			foreach($store_name as $store_name_ajax) {
			$return = "<option value='".$store_name_ajax->stor_id."' selected> ".$store_name_ajax->stor_name." </option>";		
			}
			echo $return;
		}
		else
		{
		echo	$return = "<option value='0'> No datas found </option>";
		}
	}
	
}
