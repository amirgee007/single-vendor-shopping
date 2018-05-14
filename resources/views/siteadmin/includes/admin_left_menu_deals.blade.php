   <?php  $current_route = Route::getCurrentRoute()->uri(); ?>
  <div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="public/assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DEALS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS') }}</h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                <li <?php if($current_route == 'deals_dashboard' ) { ?> class="panel active" <?php } else { echo 'class="panel"';} ?> >
                    <a href="{{ url('deals_dashboard')}}">
                        <i class="icon-dashboard"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_DASHBOARD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DEALS_DASHBOARD'): trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_DASHBOARD') }}</a>                   
                </li>
                   <li <?php if($current_route == 'add_deals' ) { ?> class="panel active" <?php } else { echo 'class="panel"';} ?> >
                    <a href="{{ url('add_deals')}}" >
                        <i class=" icon-plus-sign"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_DEALS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_DEALS')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_DEALS') }}
                  </a>                   
                </li>
                 <li <?php if($current_route == 'manage_deals' || $current_route == 'deal_details/{id}' || $current_route == 'edit_deals/{id}' )  { ?> class="panel active" <?php } else { echo 'class="panel"';  } ?>>
                    <a href="{{ url('manage_deals')}}" >
                        <i class=" icon-edit"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_DEALS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_DEALS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_DEALS')}}
                   </a>                   
                </li>
         <li  <?php if($current_route == 'expired_deals' ) { ?> class="panel active" <?php } else { echo 'class="panel"';} ?>>
                    <a href="{{ url('expired_deals') }}" >
                        <i class="icon-check-sign"></i>&nbsp; {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EXPIRED_DEALS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EXPIRED_DEALS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EXPIRED_DEALS') }}
                   </a>                   
                </li>
        <li  <?php if($current_route == 'sold_deals' ) { ?> class="panel active" <?php } else { echo 'class="panel"';} ?>>
                    <a href="{{ url('sold_deals')}}" >
                        <i class="icon-check-sign"></i>&nbsp; {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SOLD_DEALS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SOLD_DEALS')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_SOLD_DEALS') }}
                   </a>                   
                </li>
        <?php //$general=DB::table('nm_generalsetting')->get(); foreach($general as $gs) {} if($gs->gs_payment_status == 'COD') { ?>  <li <?php if( $current_route == "manage_dealcashon_delivery_details" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="{{ url('manage_dealcashon_delivery_details') }}" >
                        <i class="icon-money"></i>&nbsp; {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY'): trans($ADMIN_OUR_LANGUAGE.'.BACK_CASH_ON_DELIVERY')}}
                   </a>                   
                </li> <?php //} ?>
        
        <li <?php if( $current_route == "deals_shipping_details" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="{{ url('deals_shipping_details') }}" >
                        <i class="icon-ambulance"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SHIPPING_DELIVERY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SHIPPING_DELIVERY'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPPING_DELIVERY') }}
                   </a>                   
                </li>

                <li <?php if( $current_route == "deals_payumoney_shipping_details" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="{{ url('deals_payumoney_shipping_details') }}" >
                        <i class="icon-magnet"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYUMONEY_SHIPPING_DELIVERY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PAYUMONEY_SHIPPING_DELIVERY'): trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYUMONEY_SHIPPING_DELIVERY') }}
                   </a>                   
                </li>

                <li  <?php if($current_route == 'manage_deal_review' ) { ?> class="panel active" <?php } else { echo 'class="panel"';} ?>>
                    <a href="{{ url('manage_deal_review') }}" >
                        <i class=" icon-comment"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_DEAL_REVIEWS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_DEAL_REVIEWS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_DEAL_REVIEWS') }}
                   </a>                   
                </li>
        
        
        <!-- <li  <?php //if($current_route == 'validate_coupon_code' ) { ?> class="panel active" <?php //} else { echo 'class="panel"';} ?>>
                    <a href="<?php //echo url('validate_coupon_code'); ?>" >
                        <i class="icon-barcode"></i>&nbsp;Validate Coupon Code
                   </a>                   
                </li>
         <li  <?php //if($current_route == 'redeem_coupon_list' ) { ?> class="panel active" <?php //} else { echo 'class="panel"';} ?>>
                    <a href="<?php //echo url('redeem_coupon_list'); ?>" >
                        <i class="icon-asterisk"></i>&nbsp;Redeem Coupon List
                   </a>                   
                </li>-->
            </ul>

        </div>
