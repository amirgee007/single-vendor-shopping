<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

class AdminRoleController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->setLanguageLocaleAdmin();
    }

    public function add_role()
    {
        if (Session::has('userid')) {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_ROLE')!= '')
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_ROLE');
            }
            else
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ROLE');
            }
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_customer');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            return view('siteadmin.add_role')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function add_role_submit()
    {

        if (Session::has('userid')) {

            $name  = Input::get('name');
            $session_message = 'Role Added successfully';
            Role::firstOrCreate(['name' => $name ,'slug' => str_slug($name)]);

            return Redirect::to('manage_role')->with('insert_result',$session_message);
        }

        else
        {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_role($id)
    {
        $role = Role::findOrFail($id);

        if (Session::has('userid')) {
            if(Lang::has(Session::get('admin_lang_file').'.BACK_ROLE')!= '')
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_ROLE');
            }
            else
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ROLE');
            }

            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_customer');
            $adminfooter    = view('siteadmin.includes.admin_footer');

            return view('siteadmin.edit_role' ,compact('role'))->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_role_submit()
    {
        $role_id = Input::get('role_edit_id');
        $name = Input::get('name');

        $role = Role::findOrFail($role_id);

        if (Session::has('userid')) {

            $name  = Input::get('name');
           $role =  $role->update(['name' => $name ,'slug' => str_slug($name)]);
            if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY')!= '')
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_UPDATED_SUCCESSFULLY');
            }
            else
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_UPDATED_SUCCESSFULLY');
            }
            return Redirect::to('manage_role')->with('delete_result',$session_message);
        }

        else
        {
            return Redirect::to('siteadmin');
        }

    }

    public function manage_role()
    {
        if (Session::has('userid')) {

            if(Lang::has(Session::get('admin_lang_file').'.BACK_ROLE')!= '')
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_ROLE');
            }
            else
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_ROLE');
            }


            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", $session_message);
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_customer');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $roles = Role::all();

            return view('siteadmin.manage_role' ,compact('roles'))->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }

    }

    public function delete_role($id)
    {
        if (Session::has('userid')) {
            $return = Role::where('role_id' ,$id)->delete();
            if(Lang::has(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY')!= '')
            {
                $session_message = trans(Session::get('admin_lang_file').'.BACK_RECORD_DELETED_SUCCESSFULLY');
            }
            else
            {
                $session_message =  trans($this->ADMIN_OUR_LANGUAGE.'.BACK_RECORD_DELETED_SUCCESSFULLY');
            }
            return Redirect::to('manage_role')->with('delete_result',$session_message);
        } else {
            return Redirect::to('siteadmin');
        }
    }




}


