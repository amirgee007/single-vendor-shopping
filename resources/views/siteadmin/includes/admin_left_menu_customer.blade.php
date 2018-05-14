<?php  $current_route = Route::getCurrentRoute()->uri();
   ?>
  <div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="public/assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CUSTOMERS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMERS')}}</h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                  <li <?php if($current_route == 'customer_dashboard'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?> >
                    <a href="{{ url('customer_dashboard') }}" >
                        <i class="icon-dashboard"></i>&nbsp; {{ (Lang::has(Session::get('admin_lang_file').'.BACK_DASHBOARD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DASHBOARD')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_DASHBOARD') }}</a>                   
                </li>
                   <li <?php if($current_route == 'add_customer'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?> >
                    <a href="{{ url('add_customer') }}" >
                        <i class="icon-user"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CUSTOMER')!= '') ? trans(Session::get('admin_lang_file').'.BACK_ADD_CUSTOMER'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CUSTOMER') }}
	                </a>                   
                </li>
                 <li  <?php if($current_route == 'manage_customer'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="{{ url('manage_customer') }}" >
                        <i class="icon-ok-sign"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CUSTOMERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_CUSTOMERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CUSTOMERS')}}
                   </a>                   
                </li>
				 <li <?php if($current_route == 'manage_inquires'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="{{ url('manage_inquires')}}" >
                        <i class="icon-user-md"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_INQUIRIES')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_INQUIRIES'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_INQUIRIES')}} 
                   </a>                   
                </li>
				<?php /*?> <li  <?php if($current_route == 'manage_subscribers'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php echo url('manage_subscribers'); ?>" >
                        <i class="icon-circle-arrow-right"></i>&nbsp;Manage Subscribers
	   
                       
                   </a>                   
                </li><?php */?>
				<!-- <li <?php //if($current_route == 'manage_referral_users'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php //echo url('manage_referral_users'); ?>" >
                        <i class="icon-group"></i>&nbsp;Manage Referral Users
                   </a>                   
                </li>-->
            </ul>

        </div>
