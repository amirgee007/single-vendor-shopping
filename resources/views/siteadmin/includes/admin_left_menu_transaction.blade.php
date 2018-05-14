<?php  $current_route = Route::getCurrentRoute()->uri(); ?> 
<div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="public/assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTIONS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TRANSACTIONS')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTIONS')}} </h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
               <?php /* <li <?php if($current_route=="show_transaction") { echo 'class="panel active"'; }else { echo 'class="panel"';} ?>>
                    <a href="#" >
                        <i class="icon-dashboard"></i>&nbsp; Transaction Dashboard</a>                   
                </li> */ ?>
                   <li <?php if($current_route=="deals_all_orders" || $current_route=="deals_success_orders" || $current_route=="deals_completed_orders" || $current_route=="deals_failed_orders" || $current_route=="deals_hold_orders" || $current_route=="adm_deal_replacement_orders" || $current_route=="adm_deal_return_orders" || $current_route=="adm_deal_cancel_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav">
                        <i class="icon-resize-small"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_TRANSACTIONS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DEALS_TRANSACTIONS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_TRANSACTIONS')}}
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul <?php if($current_route=="deals_all_orders" || $current_route=="deals_success_orders" || $current_route=="deals_completed_orders" || $current_route=="deals_failed_orders" || $current_route=="deals_hold_orders" || $current_route=="adm_deal_replacement_orders" || $current_route=="adm_deal_return_orders" || $current_route=="adm_deal_cancel_orders" ){ echo 'class="panel active"'; }else{ echo 'class="collapse"'; } ?> id="form-nav">
                         <li <?php if( $current_route == "deals_all_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?> ><a href="{{ url('deals_all_orders')}}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_ORDERS')}} </a></li>
                      <li <?php if( $current_route == "deals_success_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('deals_success_orders')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUCCESS_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS_ORDERS')}}</a></li>
					  
                   <?php /*?> <li class=""><a href="<?php echo url('deals_completed_orders');?>"><i class="icon-angle-right"></i>Completed Orders </a></li> <?php */?> 
                      <li <?php if( $current_route == "deals_hold_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('deals_hold_orders')}}"><i class="icon-angle-right"></i> {{(Lang::has(Session::get('admin_lang_file').'.BACK_HOLD_ORDERS')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_HOLD_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_HOLD_ORDERS')}}</a></li>
					  
                      <li <?php if( $current_route == "deals_failed_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('deals_failed_orders')}}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAILED_ORDERS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_FAILED_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED_ORDERS')}}</a></li>

                       <li <?php if( $current_route == "adm_deal_cancel_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_deal_cancel_orders')}}"><i class="icon-angle-right"></i> Cancel Orders </a></li>
                         <li <?php if( $current_route == "adm_deal_return_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_deal_return_orders')}}"><i class="icon-angle-right"></i> Return Orders </a></li>
                         <li <?php if( $current_route == "adm_deal_replacement_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_deal_replacement_orders')}}"><i class="icon-angle-right"></i> Replacement Orders </a></li>

                    </ul>                   
                </li>

                <!-- Deals Payumoney transaction -->
                 <li <?php if($current_route=="deals_payu_all_orders" || $current_route=="deals_payu_success_orders" || $current_route=="deals_payu_failed_orders"  || $current_route=="adm_deal_payu_replacement_orders" || $current_route=="adm_deal_payu_return_orders" || $current_route=="adm_deal_payu_cancel_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav-6">
                        <i class="icon-resize-small"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_PAYUMONEY_TRANSACTIONS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DEALS_PAYUMONEY_TRANSACTIONS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_PAYUMONEY_TRANSACTIONS')}}
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                    </a>
                     <ul <?php if($current_route=="deals_payu_all_orders" || $current_route=="deals_payu_success_orders"  || $current_route=="deals_payu_failed_orders" ||  $current_route=="adm_deal_payu_replacement_orders" || $current_route=="adm_deal_payu_return_orders" || $current_route=="adm_deal_payu_cancel_orders" ){ echo 'class="panel active"'; }else{ echo 'class="collapse"'; } ?> id="form-nav-6">
                         <li <?php if( $current_route == "deals_payu_all_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?> ><a href="{{ url('deals_payu_all_orders')}}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_ORDERS')}} </a></li>
                      <li <?php if( $current_route == "deals_payu_success_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('deals_payu_success_orders')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUCCESS_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS_ORDERS')}}</a></li>          
                      
                      
                      <li <?php if( $current_route == "deals_payu_failed_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('deals_payu_failed_orders')}}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAILED_ORDERS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_FAILED_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED_ORDERS')}}</a></li>

                       <li <?php if( $current_route == "adm_deal_payu_cancel_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_deal_payu_cancel_orders')}}"><i class="icon-angle-right"></i> Cancel Orders </a></li>
                         <li <?php if( $current_route == "adm_deal_payu_return_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_deal_payu_return_orders')}}"><i class="icon-angle-right"></i> Return Orders </a></li>
                         <li <?php if( $current_route == "adm_deal_payu_replacement_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_deal_payu_replacement_orders')}}"><i class="icon-angle-right"></i> Replacement Orders </a></li>

                    </ul>                   
                </li>
                <!-- Deals Payumoney transaction ends -->

             <?php $general=DB::table('nm_generalsetting')->get(); foreach($general as $gs) {} //if($gs->gs_payment_status == 'COD') { ?>  
                <li <?php if($current_route=="dealscod_all_orders" ||  $current_route=="dealscod_completed_orders" || $current_route=="dealscod_failed_orders" || $current_route=="dealscod_hold_orders" || $current_route == "adm_dealcod_replacement_orders"|| $current_route == "adm_dealcod_cancel_orders"|| $current_route == "adm_dealcod_return_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav1">
                        <i class="icon-money"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_COD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DEALS_COD')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_COD')}}
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul <?php if($current_route=="dealscod_all_orders" ||  $current_route=="dealscod_completed_orders" || $current_route=="dealscod_failed_orders" || $current_route=="dealscod_hold_orders" || $current_route == "adm_dealcod_replacement_orders"|| $current_route == "adm_dealcod_cancel_orders"|| $current_route == "adm_dealcod_return_orders"){ echo 'class="panel active"'; }else{ echo 'class="collapse"'; } ?> id="form-nav1">
                         <li <?php if( $current_route == "dealscod_all_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('dealscod_all_orders')}}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_ORDERS')}}</a></li>
                       
					   <li <?php if( $current_route == "dealscod_completed_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  } ?>><a href="{{ url('dealscod_completed_orders')}}"><i class="icon-angle-right"></i> Success Orders </a></li>
					   
					   
                         <li <?php if( $current_route == "dealscod_hold_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('dealscod_hold_orders')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOLD_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOLD_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_HOLD_ORDERS')}}</a></li>
                        <li <?php if( $current_route == "dealscod_failed_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('dealscod_failed_orders')}}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAILED_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FAILED_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED_ORDERS')}}</a></li>

                         <li <?php if( $current_route == "adm_dealcod_cancel_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_dealcod_cancel_orders')}}"><i class="icon-angle-right"></i> Cancel Orders </a></li>
                         <li <?php if( $current_route == "adm_dealcod_return_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_dealcod_return_orders')}}"><i class="icon-angle-right"></i> Return Orders </a></li>
                         <li <?php if( $current_route == "adm_dealcod_replacement_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_dealcod_replacement_orders')}}"><i class="icon-angle-right"></i> Replacement Orders </a></li>

                    </ul>                   
                </li> <?php //} ?>
				
                <li <?php if($current_route=="product_all_orders" || $current_route=="product_success_orders" || $current_route=="product_completed_orders" || $current_route=="product_failed_orders" || $current_route=="product_hold_orders" || $current_route=="adm_cancel_orders" || $current_route=="adm_return_orders" || $current_route=="adm_replacement_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav2">
                        <i class="icon-dropbox"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS_TRANSACTION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCTS_TRANSACTION'): trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS_TRANSACTION')}}
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul <?php if($current_route=="product_all_orders" || $current_route=="product_success_orders" || $current_route=="product_completed_orders" || $current_route=="product_failed_orders" || $current_route=="product_hold_orders" || $current_route=="adm_cancel_orders" || $current_route=="adm_return_orders" || $current_route=="adm_replacement_orders" ){ echo 'class="panel active"'; }else{ echo 'class="collapse"'; } ?> id="form-nav2">
                         <li <?php if( $current_route == "product_all_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('product_all_orders')}}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_ORDERS')}} </a></li>
                      <li <?php if( $current_route == "product_success_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('product_success_orders')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUCCESS_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS_ORDERS')}}</a></li>
                    <?php /*?><li class=""><a href="<?php echo url('product_completed_orders');?>"><i class="icon-angle-right"></i>Completed Orders </a></li><?php */?>
                      <li <?php if( $current_route == "product_hold_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('product_hold_orders')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOLD_ORDERS')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_HOLD_ORDERS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOLD_ORDERS')}}</a></li>
                      <li <?php if( $current_route == "product_failed_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('product_failed_orders')}}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAILED_ORDERS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_FAILED_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED_ORDERS')}}</a></li>

                       <li <?php if( $current_route == "adm_cancel_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_cancel_orders')}}"><i class="icon-angle-right"></i>Cancel Orders </a></li>
                         <li <?php if( $current_route == "adm_return_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_return_orders')}}"><i class="icon-angle-right"></i>Return Orders </a></li>
                         <li <?php if( $current_route == "adm_replacement_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_replacement_orders')}}"><i class="icon-angle-right"></i>Replacement Orders </a></li>


                    </ul>                   
                </li>
                
                <!-- Product payumoney -->

                <li <?php if($current_route=="product_payu_all_orders" || $current_route=="product_payu_success_orders"  || $current_route=="product_payu_failed_orders" || $current_route=="adm_payu_cancel_orders" || $current_route=="adm_payu_return_orders" || $current_route=="adm_payu_replacement_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav-8">
                        <i class="icon-dropbox"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS_PAYUMONEY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCTS_PAYUMONEY'): trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS_PAYUMONEY')}}
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                    </a>
                     <ul <?php if($current_route=="product_payu_all_orders" || $current_route=="product_payu_success_orders"  || $current_route=="product_payu_failed_orders"  || $current_route=="adm_payu_cancel_orders" || $current_route=="adm_payu_return_orders" || $current_route=="adm_payu_replacement_orders" ){ echo 'class="panel active"'; }else{ echo 'class="collapse"'; } ?> id="form-nav-8">
                         <li <?php if( $current_route == "product_payu_all_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('product_payu_all_orders')}}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_ORDERS')}} </a></li>
                      <li <?php if( $current_route == "product_payu_success_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('product_payu_success_orders')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUCCESS_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS_ORDERS')}}</a></li>
                    
                      <li <?php if( $current_route == "product_payu_failed_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('product_payu_failed_orders')}}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAILED_ORDERS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_FAILED_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED_ORDERS')}}</a></li>

                       <li <?php if( $current_route == "adm_payu_cancel_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_payu_cancel_orders')}}"><i class="icon-angle-right"></i>Cancel Orders </a></li>
                         <li <?php if( $current_route == "adm_payu_return_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_payu_return_orders')}}"><i class="icon-angle-right"></i>Return Orders </a></li>
                         <li <?php if( $current_route == "adm_payu_replacement_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_payu_replacement_orders')}}"><i class="icon-angle-right"></i>Replacement Orders </a></li>


                    </ul>                   
                </li>

                <!-- product payumoney ends -->

                <?php $general=DB::table('nm_generalsetting')->get(); foreach($general as $gs) {} //if($gs->gs_payment_status == 'COD') { ?>             
                <li <?php if($current_route=="cod_all_orders" || $current_route=="cod_success_orders" || $current_route=="cod_completed_orders" || $current_route=="cod_failed_orders" || $current_route=="cod_hold_orders"  || $current_route=="adm_cod_cancel_orders"  || $current_route=="adm_cod_return_orders"  || $current_route=="adm_cod_replacement_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav3">
                        <i class="icon-money"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCTS_COD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCTS_COD'): trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCTS_COD')}}
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul <?php if($current_route=="cod_all_orders" || $current_route=="cod_success_orders" || $current_route=="cod_completed_orders" || $current_route=="cod_failed_orders" || $current_route=="cod_hold_orders"  || $current_route=="adm_cod_cancel_orders"  || $current_route=="adm_cod_return_orders"  || $current_route=="adm_cod_replacement_orders" ){ echo 'class="panel active"'; }else{ echo 'class="collapse"'; } ?> id="form-nav3">
                         <li <?php if( $current_route == "cod_all_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('cod_all_orders')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_ORDERS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_ALL_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_ORDERS')}}</a></li>
						 
                       <li <?php if( $current_route == "cod_completed_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  } ?>><a href="{{ url('cod_completed_orders') }}"><i class="icon-angle-right"></i> Success Orders </a></li>

                         <li <?php if( $current_route == "cod_hold_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('cod_hold_orders')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOLD_ORDERS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_HOLD_ORDERS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOLD_ORDERS') }}</a></li>
                        <li <?php if( $current_route == "cod_failed_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('cod_failed_orders') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAILED_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FAILED_ORDERS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED_ORDERS') }}</a></li>

                         <li <?php if( $current_route == "adm_cod_cancel_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_cod_cancel_orders') }}"><i class="icon-angle-right"></i>Cancel Orders </a></li>
                         <li <?php if( $current_route == "adm_cod_return_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_cod_return_orders') }}"><i class="icon-angle-right"></i>Return Orders </a></li>
                         <li <?php if( $current_route == "adm_cod_replacement_orders" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('adm_cod_replacement_orders')}}"><i class="icon-angle-right"></i>Replacement Orders </a></li>

                    </ul>                   
                </li> 
            <div class="media user-media well-small">
               
                <div class="media-body">
                    <h5 class="media-heading"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_TRANSACTION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_TRANSACTION'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_TRANSACTION')}}</h5>
                    
                </div>
                <br />
            </div>
        
                <li <?php if($current_route=="admincommission_listing"){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php echo url('all_offline_transaction'); ?>" >
                        <i class="icon-arrow-left"></i>&nbsp; {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_OFFLINE_TRANSACTION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_OFFLINE_TRANSACTION'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_OFFLINE_TRANSACTION')}}</a>                   
                </li>
                 <li <?php if($current_route=="admincommission_listing"){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php echo url('all_online_transaction'); ?>" >
                        <i class="icon-arrow-left"></i>&nbsp; {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_ONLINE_TRANSACTION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_ONLINE_TRANSACTION'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_ONLINE_TRANSACTION')}}</a>                   
                </li>
                
                
           
            <?php /* Commission Lisiting  */?>

            </ul>
            
      


          
  
			 
        </div>
        
        
