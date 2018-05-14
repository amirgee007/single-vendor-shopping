<?php  $current_route = Route::getCurrentRoute()->uri(); ?>
 <div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="public/assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BLOGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOGS')}}</h5>
                    
                </div>
                <br />
            </div>

           <ul id="menu" class="collapse">
                <li @if($current_route == 'manage_publish_blog'){{ 'class="panel active"'}} @else {{ 'class="panel"'}} @endif>
                    <a href="{{ url('manage_publish_blog') }}" >
                        <i class="icon-dashboard"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PUBLISHED_BLOGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PUBLISHED_BLOGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PUBLISHED_BLOGS') }}</a>                   
                </li>
                   <li @if($current_route == 'add_blog'){{ 'class="panel active"' }} @else {{ 'class="panel"'}} @endif >
                    <a href="{{ url('add_blog') }} " >
                        <i class="icon-user"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_BLOG')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_BLOG') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_BLOG') }}
	                </a>                   
                </li>
                 <li @if($current_route == 'manage_draft_blog') {{ 'class="panel active"' }} @else {{ 'class="panel"'}} @endif>
                    <a href="{{ url('manage_draft_blog') }}" >
                        <i class="icon-ok-sign"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DRAFTED_BLOGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DRAFTED_BLOGS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_DRAFTED_BLOGS')}}
                   </a>                   
                </li>
				 <li @if($current_route == 'blog_settings'){{ 'class="panel active"' }} @else {{ 'class="panel"'}} @endif>
                    <a href="{{ url('blog_settings') }}" >
                        <i class="icon-ok-sign"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOG_SETTIGNS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BLOG_SETTIGNS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOG_SETTIGNS') }}
                   </a>                   
                </li>
                 <li @if($current_route == 'manage_blogcmts'){{ 'class="panel active"' }} @else {{ 'class="panel"' }} @endif>
                    <a href="{{ url('manage_blogcmts') }}" >
                        <i class="icon-comment"></i>&nbsp;{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOG_COMMENTS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BLOG_COMMENTS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOG_COMMENTS')}} 
                   </a>                   
                </li>
			
			
            </ul>

        </div>
