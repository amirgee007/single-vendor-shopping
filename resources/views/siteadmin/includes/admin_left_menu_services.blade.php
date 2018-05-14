   <?php $current_route = Route::getCurrentRoute()->uri(); ?>
    <div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="public/assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICES');} ?></h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                <li <?php if($current_route == 'services_dashboard' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="<?php echo url('services_dashboard');?>">
                        <i class="icon-dashboard"></i>&nbsp;<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_DASHBOARD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_DASHBOARD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_DASHBOARD');} ?></a>                   
                </li>
  <li <?php if($current_route == 'add_services' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                  
                    <a href="<?php echo url('add_services');?>" >
                        <i class=" icon-plus-sign"></i>&nbsp;<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SERVICES');} ?>
	                </a>                   
                </li>
                <li <?php if($current_route == 'manage_services' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="<?php echo url('manage_services');?>" >
                        <i class=" icon-edit"></i>&nbsp; <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SERVICES');} ?>
                   </a>                   
                </li>
	 
            </ul>

        </div>
