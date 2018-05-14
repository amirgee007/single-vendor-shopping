 @php $current_route = Route::getCurrentRoute()->uri(); @endphp
  <div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="public/assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SETTINGS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SETTINGS')}}</h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                <li <?php if( $current_route == "general_setting" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="{{ url('general_setting')}}">
                        <i class="icon-cog"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_GENERAL_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_GENERAL_SETTINGS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_GENERAL_SETTINGS')}}</a>                   
                </li>
                   <li <?php if( $current_route == "email_setting" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="{{ url('email_setting') }}" >
                        <i class="icon-envelope"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL_CONTACT_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EMAIL_CONTACT_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL_CONTACT_SETTINGS') }}
	                </a>                   
                </li>
                 <!--li <?php //if( $current_route == "smtp_setting" ) //{ ?> class="panel active"  <?php //} else { echo 'class="panel"';  }?>>
                    <a href="<?php //echo url('smtp_setting'); ?>" >
                        <i class="icon-mail-reply"></i>&nbsp;SMTP Mailer Settings
                   </a>                   
                </li-->
				 <li <?php if( $current_route == "social_media_settings" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="{{ url('social_media_settings') }}" >
                        <i class="icon-facebook"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SOCIAL_MEDIA_PAGE_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SOCIAL_MEDIA_PAGE_SETTINGS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SOCIAL_MEDIA_PAGE_SETTINGS') }}
                   </a>                   
                </li>
				 <li <?php if( $current_route == "payment_settings" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="{{ url('payment_settings') }}" >
                        <i class="icon-credit-card"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYMENT_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PAYMENT_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYMENT_SETTINGS') }}
	   
                       
                   </a>                   
                </li>
				<?php /*?> <li  <?php if( $current_route == "module_settings" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('module_settings'); ?>" >
                        <i class="icon-table"></i>&nbsp;Modules Setting
                   </a>                   
                </li><?php */?>

                <li <?php if( $current_route == "add_logo" || $current_route == "add_favicon" || $current_route == "add_noimage" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-picture"> </i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SETTINGS') }}   
                        <span class="pull-right">
                          <i class="icon-angle-right"></i>
                        </span>
                       <!--&nbsp; <span class="label label-default">3</span>&nbsp;-->
                    </a>
                    <ul <?php if( $current_route == "add_logo" || $current_route == "add_favicon" || $current_route == "add_noimage" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="component-nav">
                  
                       
                        <li  <?php if( $current_route == "add_logo" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href=" {{ url('add_logo') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_LOGO_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_LOGO_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_LOGO_SETTINGS') }} </a></li>

                         <li <?php if( $current_route == "add_favicon" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_favicon') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAVICON_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_FAVICON_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAVICON_SETTINGS') }} </a></li>

                        <li <?php if( $current_route == "add_noimage" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_noimage') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_NO_IMAGE_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_NO_IMAGE_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO_IMAGE_SETTINGS') }} </a></li>
                        <!--   <li class=""><a href="tabs_panels.html"><i class="icon-angle-right"></i> Image zoom settings </a></li>
                      <li class=""><a href="notifications.html"><i class="icon-angle-right"></i> Notification </a></li>
                         <li class=""><a href="more_notifications.html"><i class="icon-angle-right"></i> More Notification </a></li>
                        <li class=""><a href="modals.html"><i class="icon-angle-right"></i> Modals </a></li>
                          <li class=""><a href="wizard.html"><i class="icon-angle-right"></i> Wizard </a></li>
                         <li class=""><a href="sliders.html"><i class="icon-angle-right"></i> Sliders </a></li>
                        <li class=""><a href="typography.html"><i class="icon-angle-right"></i> Typography </a></li> -->
                    </ul>
                </li>
                <li <?php if( $current_route == "add_banner_image" || $current_route == "manage_banner_image" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav">
                        <i class="icon-camera"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_BANNER_IMAGE_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BANNER_IMAGE_SETTINGS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_BANNER_IMAGE_SETTINGS')}}
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                         
                    </a>
                    <ul <?php if( $current_route == "add_banner_image" || $current_route == "manage_banner_image" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="form-nav">
                        <li <?php if( $current_route == "add_banner_image" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_banner_image') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_BANNER_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_BANNER_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_BANNER_IMAGE') }}</a></li>
                        <li <?php if( $current_route == "manage_banner_image" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('manage_banner_image') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_BANNER_IMAGES')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_BANNER_IMAGES'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_BANNER_IMAGES') }}</a></li>
                        
                    </ul>
                </li>
                <li <?php if( $current_route == "add_advertisement" || $current_route == "manage_advertisement" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#ad-nav">
                        <i class="icon-camera"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CATEGORY_ADVERTISEMENT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CATEGORY_ADVERTISEMENT'): trans($ADMIN_OUR_LANGUAGE.'.BACK_CATEGORY_ADVERTISEMENT')}}
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                         
                    </a>
                    <ul <?php if( $current_route == "add_advertisement" || $current_route == "manage_advertisement" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="ad-nav">
                        <li <?php if( $current_route == "add_advertisement" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_advertisement') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_ADVERTISEMENT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_ADVERTISEMENT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_ADVERTISEMENT') }} </a></li>
                        <li <?php if( $current_route == "manage_advertisement" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href=" {{ url('manage_advertisement') }}"><i class="icon-angle-right"></i>  {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_ADVERTISEMENT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_ADVERTISEMENT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_ADVERTISEMENT') }} </a></li>
                        
                    </ul>
                </li>

                <li <?php if( $current_route == "add_categorybanner" || $current_route == "manage_category_banner" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#bn-nav">
                        <i class="icon-camera"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CATEGORY_BANNER_SETTING')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CATEGORY_BANNER_SETTING') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CATEGORY_BANNER_SETTING') }}
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                         
                    </a>
                    <ul <?php if( $current_route == "add_categorybanner" || $current_route == "manage_category_banner" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="bn-nav">
                        <li <?php if( $current_route == "add_categorybanner" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href=" {{ url('add_categorybanner') }}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CATEGORY_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_CATEGORY_BANNER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CATEGORY_BANNER') }} </a></li>
                        <li <?php if( $current_route == "manage_category_banner" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('manage_category_banner')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORY_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORY_BANNER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CATEGORY_BANNER') }} </a></li>
                        
                    </ul>
                </li>
                
                <li  <?php if( $current_route == "add_size" || $current_route == "manage_size" || $current_route == "add_color" || $current_route == "manage_color" || $current_route == "edit_color/{id}" || $current_route == "edit_size/{id}"  ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>  >
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                        <i class="icon-anchor"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ATTRIBUTES_MANAGEMENT')!= '') ? trans(Session::get('admin_lang_file').'.BACK_ATTRIBUTES_MANAGEMENT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ATTRIBUTES_MANAGEMENT')}}
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                         
                    </a>
                    <ul <?php if( $current_route == "add_size" || $current_route == "manage_size" || $current_route == "add_color" || $current_route == "manage_color" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="pagesr-nav">
                        <li <?php if( $current_route == "add_color" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_color')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_COLOR')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_COLOR') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_COLOR') }} </a></li>
                        <li <?php if( $current_route == "manage_color" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('manage_color')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_COLORS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_COLORS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_COLORS')}} </a></li>
                        <li <?php if( $current_route == "add_size" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_size') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SIZE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_ADD_SIZE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SIZE') }} </a></li>
                        <li <?php if( $current_route == "manage_size" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('manage_size') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SIZES')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SIZES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SIZES') }} </a></li>
                        
                    </ul>
                </li>


  <li <?php if( $current_route == "add_specification" || $current_route == "manage_specification" || $current_route == "add_specification_group" || $current_route == "manage_specification_group" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav">
                        <i class="icon-bar-chart"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION_MANAGEMENT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION_MANAGEMENT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION_MANAGEMENT') }}
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                         
                    </a>
                     <ul <?php if( $current_route == "add_specification_group" || $current_route == "manage_specification_group" || $current_route == "add_specification" || $current_route == "manage_specification" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="chart-nav">
			
                        <li <?php if( $current_route == "add_specification_group" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_specification_group') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SPECIFICATION_GROUP')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_SPECIFICATION_GROUP'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SPECIFICATION_GROUP')}} </a></li>
                        <li <?php if( $current_route == "manage_specification_group" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('manage_specification_group'); ?>"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SPECIFICATION_GROUP')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SPECIFICATION_GROUP') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SPECIFICATION_GROUP') }}</a></li>
                        <li <?php if( $current_route == "add_specification" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_specification') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SPECIFICATION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_SPECIFICATION'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SPECIFICATION')}} </a></li>
                        <li <?php if( $current_route == "manage_specification" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('manage_specification') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SPECIFICATION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SPECIFICATION'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SPECIFICATION') }}</a></li>
                    </ul>
                </li>
                

 <li <?php if( $current_route == "add_country" || $current_route == "manage_country" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >


                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                        <i class=" icon-globe"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRIES_MANAGEMENT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COUNTRIES_MANAGEMENT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRIES_MANAGEMENT')}}
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                    </a>

		  <ul <?php if( $current_route == "add_country" || $current_route == "manage_country" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="DDL-nav">
                        
                        <li <?php if( $current_route == "add_country" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_country') }}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_COUNTRY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_COUNTRY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_COUNTRY')}} </a></li>
                        <li <?php if( $current_route == "manage_country" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href=" {{ url('manage_country') }}"><i class="icon-angle-right"></i> {{  (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_COUNTRY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_COUNTRY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_COUNTRY')}} </a></li>
                       <!--  <li><a href="#"><i class="icon-angle-right"></i> Demo Link 4 </a></li> -->
                    </ul>
		 </li>
                <li <?php if( $current_route == "add_city" || $current_route == "manage_city" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4-nav">
                        <i class=" icon-building"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CITIES_MANAGEMENT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CITIES_MANAGEMENT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CITIES_MANAGEMENT')}}
	   
                    <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                    </a>
                    <ul <?php if( $current_route == "add_city" || $current_route == "manage_city" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="DDL4-nav">
                        
                        <li <?php if( $current_route == "add_city" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_city')}}"><i class="icon-angle-right"></i>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CITY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_CITY') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CITY') }} @endif </a></li>
                        <li <?php if( $current_route == "manage_city" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('manage_city')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CITIES')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_CITIES'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CITIES')}}</a></li>
                       <!--  <li><a href="#"><i class="icon-angle-right"></i> Demo Link 4 </a></li> -->
                    </ul>
                </li>
                <li <?php if( $current_route == "add_category" || $current_route == "manage_category" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#error-nav">
                        <i class="icon-plus"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CATEGORY_MANAGEMENT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CATEGORY_MANAGEMENT'): trans($ADMIN_OUR_LANGUAGE.'.BACK_CATEGORY_MANAGEMENT')}}
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          
                    </a>
                    <ul <?php if( $current_route == "add_category" || $current_route == "manage_category" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="error-nav">
                        <li <?php if( $current_route == "add_category" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_category')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CATEGORY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_CATEGORY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CATEGORY')}} </a></li>
                        <li <?php if( $current_route == "manage_category" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('manage_category')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORIES')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORIES'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CATEGORIES')}} </a></li>
                       
                    </ul>
                </li>
                <?php /*
                <li <?php if( $current_route == "manage_service_type" || $current_route == "add_service_type") { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >
                    <a  data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav10">
                        <i class="icon-plus" aria-hidden="true"></i> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TYPE_MANAGEMENT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TYPE_MANAGEMENT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TYPE_MANAGEMENT');} ?>
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          &nbsp; <span class="label label-danger"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="chart-nav10">
                        <li><a href="<?php echo url('add_service_type'); ?>"><i class="icon-angle-right"></i> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SERVICE_TYPE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_SERVICE_TYPE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SERVICE_TYPE');} ?></a></li>
                        <li><a href="<?php echo url('manage_service_type');?>"><i class="icon-angle-right"></i> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TYPE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TYPE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SERVICE_TYPE');} ?></a></li>

                    </ul>
              </li>
              <li <?php if( $current_route == "manage_message") { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >
                    <a  data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav11">
                        <i class="fa fa-hourglass-start" aria-hidden="true"></i> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TIME');} ?>
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          &nbsp; <span class="label label-danger"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="chart-nav11">
					<li><a href="<?php echo url('add_service_time'); ?>"><i class="icon-angle-right"></i> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SERVICE_TIME');} ?></a></li>
                        <li><a href="<?php echo url('manage_service_time'); ?>"><i class="icon-angle-right"></i> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SERVICE_TIME');} ?></a></li>
                        

                    </ul>
              </li>*/?>
                   <li <?php if( $current_route == "add_cms_page" || $current_route == "manage_cms_page" || $current_route == "aboutus_page" || $current_route == "terms" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav2">
                        <i class="icon-pencil"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CMS_MANAGEMENT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CMS_MANAGEMENT'): trans($ADMIN_OUR_LANGUAGE.'.BACK_CMS_MANAGEMENT')}}
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          &nbsp; <span class="label label-danger"></span>&nbsp;
                    </a>
                    <ul  <?php if( $current_route == "add_cms_page" || $current_route == "manage_cms_page" || $current_route == "aboutus_page" || $current_route == "terms" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?>  id="chart-nav2">

                        <li <?php if( $current_route == "add_cms_page" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_cms_page') }}"  ><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_PAGE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_ADD_PAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_PAGE')}}</a></li>
                        <li  <?php if( $current_route == "manage_cms_page" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('manage_cms_page')}}" ><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CMS_PAGES')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_CMS_PAGES'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CMS_PAGES')}}</a></li>
                        <li  <?php if( $current_route == "aboutus_page" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href=" {{ url('aboutus_page')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ABOUT_US')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ABOUT_US') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ABOUT_US')}}</a></li>                
                         <li  <?php if( $current_route == "terms" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('terms') }}"><i class="icon-angle-right"></i>  {{ (Lang::has(Session::get('admin_lang_file').'.BACK_TERMS_CONDITIONS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TERMS_CONDITIONS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TERMS_CONDITIONS')}}</a></li>                   
                    </ul>
                </li>
				<li <?php if( $current_route == "add_ad" || $current_route == "manage_ad" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >
                    <a  data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav1">
                    <i class="icon-external-link-sign"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADS_MANAGEMENT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADS_MANAGEMENT'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADS_MANAGEMENT')}}
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          &nbsp; <span class="label label-danger"></span>&nbsp;
                    </a>
                    <ul <?php if( $current_route == "add_ad" || $current_route == "manage_ad" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="chart-nav1">

                        <li <?php if( $current_route == "add_ad" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_ad')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_ADS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_ADS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_ADS')}}</a></li>
                        <li <?php if( $current_route == "manage_ad" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('manage_ad')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_ADS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_ADS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_ADS')}}</a></li>
                    </ul>
                </li>
				<li <?php if( $current_route == "add_faq" || $current_route == "manage_faq" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >
                  <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav3">
                        <i class="icon-question-sign"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAQ')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FAQ'): trans($ADMIN_OUR_LANGUAGE.'.BACK_FAQ') }}
	   
                  <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          &nbsp; <span class="label label-danger"></span>&nbsp;
                    </a>
                  <ul <?php if( $current_route == "add_faq" || $current_route == "manage_faq" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="chart-nav3">
                    <li <?php if( $current_route == "add_faq" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_faq')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_FAQ')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_FAQ') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_FAQ') }}</a></li>
                        <li <?php if( $current_route == "manage_faq" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('manage_faq') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_FAQ')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_FAQ'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_FAQ')}}</a></li>
                    </ul>
                </li>
				<li <?php if( $current_route == "manage_newsletter_subscribers" || $current_route == "send_newsletter" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >
                    <a  data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav4">
                        <i class="icon-signin"></i> {{(Lang::has(Session::get('admin_lang_file').'.BACK_NEWS_LETTER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_NEWS_LETTER'): trans($ADMIN_OUR_LANGUAGE.'.BACK_NEWS_LETTER')}}
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          &nbsp; <span class="label label-danger"></span>&nbsp;
                    </a>
                    <ul <?php if( $current_route == "send_newsletter" || $current_route == "manage_newsletter_subscribers" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="chart-nav4">
                        <li <?php if( $current_route == "send_newsletter" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('send_newsletter'); ?>"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SEND_NEWSLETTER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SEND_NEWSLETTER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SEND_NEWSLETTER') }}</a></li>
                        <li <?php if( $current_route == "manage_newsletter_subscribers" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('manage_newsletter_subscribers')}}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SUBSCRIBED_USERS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_MANAGE_SUBSCRIBED_USERS'):  trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SUBSCRIBED_USERS')}}</a></li>

                    </ul>
              </li>
              <li <?php if( $current_route == "manage_coupon") { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >
                    <a  data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav5">
                        <i class="icon-ticket" aria-hidden="true"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COUPON'):  trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON') }}
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          &nbsp; <span class="label label-danger"></span>&nbsp;
                    </a>
                    <ul <?php if( $current_route == "manage_coupon" || $current_route == "add_coupon" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="chart-nav5">
                        <li <?php if( $current_route == "manage_coupon" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('manage_coupon') }}"><i class="icon-angle-right"></i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_COUPON')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_COUPON') }}</a></li>
                        <li <?php if( $current_route == "add_coupon" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="{{ url('add_coupon') }}"><i class="icon-angle-right"></i> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_COUPON')!= '') ? trans(Session::get('admin_lang_file').'.BACK_ADD_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_COUPON') }}</a></li>

                    </ul>
              </li>
              <?php /** <li <?php if( $current_route == "manage_lang" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >
                  <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav6">
                        <i class="icon-question-sign"></i> Language Management
	   
                  <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          &nbsp; <span class="label label-danger"></span>&nbsp;
                    </a>
                  <ul <?php if( $current_route == "manage_lang" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="chart-nav6">
                    <li <?php if( $current_route == "manage_lang" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('manage_lang'); ?>"><i class="icon-angle-right"></i>Manage Language</a></li>
                       
                    </ul>
                </li> **/ ?>
               <!--<li <?php //if( $current_route == "add_estimated_zipcode" ) { ?> class="panel active"  <?php //} else { echo 'class="panel"';  }?>>
                    <a href="<?php //echo url('add_estimated_zipcode');?>" >
                        <i class="icon-circle-arrow-right"></i>&nbsp;Add Estimated Zipcode
                   </a>                   
                </li>
                <li <?php //if( $current_route == "estimated_zipcode" ) { ?> class="panel active"  <?php //} else { echo 'class="panel"';  }?>>
                    <a href="<?php //echo url('estimated_zipcode');?>" >
                        <i class="icon-circle-arrow-right"></i>&nbsp;Estimated Zipcode
                   </a>                   
                </li>-->

     
            </ul>

        </div>
<!---Right Click Block Code---->
<script language="javascript">
/*document.onmousedown=disableclick;
status="Cannot Access for this mode";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}*/
</script>


<!---F12 Block Code---->
<script type='text/javascript'>
$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});
</script>