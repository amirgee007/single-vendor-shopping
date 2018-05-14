
<?php //print_r(session::all()); ?>
<?php  $current_route = Route::getCurrentRoute()->uri();

if(isset($routemenu))
{

$menus=$routemenu;
$menu = strtoupper($menus);
}
 ?>
<div oncontextmenu="return false"></div> 
     <script type="text/javascript">
 var __lc = {};
__lc.license = 4302571;

(function() {
 var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
 lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>



  <div id="top">

             <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
             
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="<?php echo url('')?>" class="navbar-brand">
                 	  <img src="<?php echo $SITE_LOGO; ?>" alt="Logo" /></a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">
<?php $newsubscriberscount=Session::get('newsubscriberscount');
	$blogcmtcount=Session::get('blogcmtcount');
$adrequestcnt=Session::get('adrequestcnt');

 $inqcmt = DB::table('nm_enquiry')->where('enq_readstatus', '=', 0)->count();
 $blogcmt = DB::table('nm_blog_cus_comments')->where('cmt_msg_status', '=', 0)->count();
 $adcmt = DB::table('nm_add')->where('ad_read_status', '=', 0)->count();

?>
                    <!-- MESSAGES SECTION -->
                    <li class="dropdown">
                        <a href="{{ url('manage_inquires') }}" data-original-title="Tooltip on bottom" data-toggle="tooltip" data-placement="bottom" title="Inquiries">
                            <span class="label label-warning">{{ $inqcmt }}</span> <i class="icon-envelope-alt"></i>&nbsp;
                        </a>
		  </li>
		   <li class="dropdown">
                        <a href="{{ url('manage_blogcmts') }}" data-original-title="Tooltip on bottom" data-toggle="tooltip" data-placement="bottom" title="Blog comments">
                            <span class="label label-success">{{ $blogcmt}}</span>    <i class="icon-comment-alt"></i>&nbsp; 
                        </a>
		  </li>
		 <?php /*?> <li class="dropdown">
                        <a href="<?php echo url('manage_subscribers');?>" data-original-title="Tooltip on bottom" data-toggle="tooltip" data-placement="bottom" title="New Subscribers">
                            <span class="label label-success"><?php echo $newsubscriberscount;?></span>    <i class="icon-bookmark-empty"></i>&nbsp; 
                        </a>
		  </li><?php */?>
            <li class="dropdown">
                        <a href="{{ url('manage_ad') }}" data-original-title="Tooltip on bottom" data-toggle="tooltip" data-placement="bottom" title="Advertise request">
                            <span class="label label-success">{{ $adcmt }}</span>    <i class="icon-bookmark-empty"></i>&nbsp; 
                        </a>
		  </li>
                    <!--END MESSAGES SECTION -->

                    <!--TASK SECTION -->
                <!--    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="label label-danger">5</span>   <i class="icon-tasks"></i>&nbsp; <i class="icon-chevron-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-tasks">
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong> Profile </strong>
                                            <span class="pull-right text-muted">40% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong> Pending Tasks </strong>
                                            <span class="pull-right text-muted">20% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong> Work Completed </strong>
                                            <span class="pull-right text-muted">60% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong> Summary </strong>
                                            <span class="pull-right text-muted">80% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Tasks</strong>
                                    <i class="icon-angle-right"></i>
                                </a>
                            </li>
                        </ul>

                    </li>-->
                    <!--END TASK SECTION -->

                    <!--ALERTS SECTION -->
                 <!--   <li class="chat-panel dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="label label-info">8</span>   <i class="icon-comments"></i>&nbsp; <i class="icon-chevron-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-alerts">

                            <li>
                                <a href="#">
                                    <div>
                                        <i class="icon-comment" ></i> New Comment
                                    <span class="pull-right text-muted small"> 4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="icon-twitter info"></i> 3 New Follower
                                    <span class="pull-right text-muted small"> 9 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="icon-envelope"></i> Message Sent
                                    <span class="pull-right text-muted small" > 20 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="icon-tasks"></i> New Task
                                    <span class="pull-right text-muted small"> 1 Hour ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="icon-upload"></i> Server Rebooted
                                    <span class="pull-right text-muted small"> 2 Hour ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="icon-angle-right"></i>
                                </a>
                            </li>
                        </ul>

                    </li>-->
                    <!-- END ALERTS SECTION -->

                    <!--ADMIN SETTINGS SECTIONS -->

                        <!--<select name="Language_change" id="Language_change" onchange="Lang_change()">
        <?php /*foreach($Admin_Active_Language as $Active_Lang) {?>
            <option value="{{$Active_Lang->lang_code}}" @if($admin_selected_lang_code==$Active_Lang->lang_code)selected @endif >{{$Active_Lang->lang_name}}</option>
        <?php } */?>
    </select>-->
                     <li><a href="{{ url('admin_profile') }}" class="btn btn-default"><i class="icon-user"></i> {{(Lang::has(Session::get('admin_lang_file').'.BACK_MY_PROFILE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MY_PROFILE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MY_PROFILE') }} </a>
                            </li>
                            <li><a href="{{ url('admin_settings') }}" class="btn btn-default"><i class="icon-gear"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS') }} </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{ url('admin_logout')}}" class="btn btn-default"><i class="icon-signout"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_LOGOUT')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_LOGOUT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_LOGOUT') }} </a>
                            </li>
                    
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>
            
			<div class="mainmenu"> 
            <ul class="">
                <li><a href="{{ url('siteadmin_dashboard') }}" @if($menu=="DASHBOARD") class="active" @endif>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DASHBOARD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DASHBOARD') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_DASHBOARD') }}</a></li>

                <li><a href="{{ url('general_setting') }}" @if($menu=="SETTINGS") class="active" @endif>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SETTINGS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS')}}</a>  </li>

                <li><a href="{{ url('deals_dashboard')}}" @if($menu=="DEALS") class="active" @endif>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DEALS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS')}}  </a>  </li>

                <li><a href="{{ url('product_dashboard')}}" @if($menu=="PRODUCTS") class="active" @endif> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCTS') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS')}} </a>  </li> 
                <?php /*
                <!--<li><a href="<?php echo url('services_dashboard');?>" <?php if($menu=="SERVICES"){?>class="active"<?php } ?>> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICES');} ?> </a>  </li> 
                <li><a href="<?php //echo url('auction_dashboard');?>" <?php //if($menu=="auction"){?>class="active"<?php //} ?>> Auction </a>  </li> --> */ ?>
                <li><a href="{{ url('customer_dashboard')}}" @if($menu=="CUSTOMER") class="active" @endif>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMERS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_CUSTOMERS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMERS')}} </a>  </li>

                

                <li><a href="{{ url('deals_all_orders')}}" @if($menu=="TRANSACTION") class="active" @endif> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TRANSACTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION') }}</a> </li>

                <li><a href="{{ url('manage_publish_blog') }}" @if($menu=="BLOG") class="active" @endif>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BLOGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOGS')}}</a> </li>
                </ul>
            </div>

                  <div class="container" style="width: 98%; margin: auto; overflow: hidden;"><a data-original-title="Show/Hide Menu" data-placement="bottom"  class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    SUB MENU <i class="icon-align-justify"></i>
                </a></div>

        </div>
<script type="text/javascript">
    function Lang_change() 
    {
        var language_code = $("#Language_change option:selected").val();
        $.ajax
        ({
            type:'POST',
            url:"<?php echo url('admin_new_change_languages');?>",
            data:{'language_code':language_code},
            success:function(data)
            {
                window.location.reload();
            }
        });
    }
</script>

