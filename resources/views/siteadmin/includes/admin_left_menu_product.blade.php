   <?php $current_route = Route::getCurrentRoute()->uri(); ?>
    <div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="public/assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCTS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS') }}</h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse"> 
                <li <?php if($current_route == 'product_dashboard' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="{{ url('product_dashboard') }}">
                        <i class="icon-dashboard"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS_DASHBOARD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCTS_DASHBOARD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS_DASHBOARD') }}</a>                   
                </li>
  <li <?php if($current_route == 'add_product' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                  
                    <a href="{{ url('add_product') }}" >
                        <i class=" icon-plus-sign"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_PRODUCTS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_PRODUCTS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_PRODUCTS')}}
	                </a>                   
                </li>
                <li <?php if($current_route == 'manage_product' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="{{ url('manage_product')}}" >
                        <i class=" icon-edit"></i>&nbsp; {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_PRODUCTS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_PRODUCTS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_PRODUCTS')}}
                   </a>                   
                </li>
				


                <li <?php if($current_route == 'product_bulk_upload' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="{{ url('product_bulk_upload')}}" >
                        <i class=" icon-upload"></i>&nbsp; {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_BULK_UPLOAD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_BULK_UPLOAD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_BULK_UPLOAD')}}
                   </a>                   
                </li>
                <?php    /**   product_bulk_upload_edit future option 
                                <li <?php if($current_route == 'product_bulk_upload_edit' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="<?php echo url('product_bulk_upload_edit');?>" >
                        <i class=" icon-upload"></i>&nbsp; <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_BULK_UPLOAD_EDIT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_BULK_UPLOAD_EDIT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_BULK_UPLOAD_EDIT');} ?>
                   </a>                   
                </li> **/   ?>
	 <li <?php if($current_route == 'sold_product' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="{{ url('sold_product')}}" >
                        <i class="icon-tag"></i>&nbsp; {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SOLD_PRODUCTS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SOLD_PRODUCTS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SOLD_PRODUCTS')}}
                   </a>                   
                </li>
				 <li <?php if( $current_route == "manage_product_shipping_details" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="{{ url('manage_product_shipping_details') }}" >
                        <i class="icon-ambulance"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SHIPPING_DELIVERY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SHIPPING_DELIVERY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPPING_DELIVERY')}}
                   </a>                   
                </li>

                </li>
                 <li <?php if( $current_route == "product_payumoney_shipping_details" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="{{ url('product_payumoney_shipping_details') }}" >
                        <i class="icon-magnet"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYUMONEY_SHIPPING_DELIVERY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PAYUMONEY_SHIPPING_DELIVERY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYUMONEY_SHIPPING_DELIVERY')}}
                   </a>                   
                </li>

			<?php $general=DB::table('nm_generalsetting')->get(); ?> @foreach($general as $gs) @endforeach
             @if($gs->gs_payment_status == 'COD')  	<li <?php if( $current_route == "manage_cashondelivery_details" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="{{ url('manage_cashondelivery_details')}}" >
                        <i class="icon-money"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CASH_ON_DELIVERY')}}
                   </a>                   
                </li> @endif

                <li <?php if($current_route == 'manage_review' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="{{ url('manage_review') }}" >
                        <i class=" icon-comment"></i>&nbsp; {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_PRODUCT_REVIEWS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_PRODUCT_REVIEWS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_PRODUCT_REVIEWS') }}
                   </a>                   
                </li>
            </ul>

        </div>
