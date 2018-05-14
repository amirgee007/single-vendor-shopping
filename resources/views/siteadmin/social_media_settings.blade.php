<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SOCIAL_MEDIA_PAGE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_SOCIAL_MEDIA_PAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SOCIAL_MEDIA_PAGE') }}</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/main.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/theme.css" />
     @php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif		
	  <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/social-buttons/social-buttons.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
     <!-- END HEAD -->

     <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap">


          
       {!! $adminheader !!}
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
       {!! $adminleftmenus !!}
       
        <!--END MENU SECTION -->

		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a  >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SOCIAL_MEDIA_PAGE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_SOCIAL_MEDIA_PAGE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SOCIAL_MEDIA_PAGE') }} </a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
          @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
        @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SOCIAL_MEDIA_PAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SOCIAL_MEDIA_PAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SOCIAL_MEDIA_PAGE') }}</h5>
            
        </header>
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'social_media_setting_submit','class'=>'form-horizontal')) !!}
             @foreach($social_settings as $social_details) 
			  @endforeach
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FACEBOOK_APP_ID')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FACEBOOK_APP_ID') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FACEBOOK_APP_ID') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('fb_app_id',$social_details->sm_fb_app_id,['class' => 'form-control','id' => 'text1', 'placeholder' => '298683020274383']) }}
                        
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{(Lang::has(Session::get('admin_lang_file').'.BACK_FACEBOOK_SECRECT_KEY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FACEBOOK_SECRECT_KEY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FACEBOOK_SECRECT_KEY') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('fb_secret_key',$social_details->sm_fb_sec_key,['class' => 'form-control','id' => 'text1', 'placeholder' => '4b30f51b1042d04fd6c3953b1944e509']) }}
                         
                    </div>
                </div>

                   <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FACEBOOK_PAGE_URL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FACEBOOK_PAGE_URL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FACEBOOK_PAGE_URL') }}<span class="text-sub"></span></label>

                    <div class="col-lg-8">
					{{ Form::text('fb_page_url',$social_details->sm_fb_page_url,['class' => 'form-control','id' => 'text1', 'placeholder' => 'https://www.facebook.com/']) }}
                         
                    </div>
                </div>
				
				    <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FACEBOOK_LIKE_BOX_URL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FACEBOOK_LIKE_BOX_URL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FACEBOOK_LIKE_BOX_URL') }}<span class="text-sub"></span></label>

                    <div class="col-lg-8">
					{{ Form::text('fb_like_box_url',$social_details->sm_fb_like_page_url,['class' => 'form-control','id' => 'text1', 'placeholder' => 'https://www.facebook.com/']) }}
                         
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TWITTER_PAGE_URL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TWITTER_PAGE_URL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TWITTER_PAGE_URL') }}<span class="text-sub"></span></label>

                    <div class="col-lg-8">
					{{ Form::text('twitter_page_url',$social_details->sm_twitter_url,['class' => 'form-control','id' => 'text1', 'placeholder' => 'https://twitter.com/']) }}
                        
                    </div>
                </div>
				
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TWITTER_APP_ID')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TWITTER_APP_ID') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TWITTER_APP_ID') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('twitter_app_id',$social_details->sm_twitter_app_id,['class' => 'form-control','id' => 'text1', 'placeholder' => '291719054236926']) }}
                         
                    </div>
                </div>

               <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_TWITTER_SECRECT_KEY')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_TWITTER_SECRECT_KEY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TWITTER_SECRECT_KEY') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('twitter_secret_key',$social_details->sm_twitter_sec_key,['class' => 'form-control','id' => 'text1', 'placeholder' => 'b24927947a1adc1cff504bd4cbb16968']) }}
                         
                    </div>
                </div>
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_LINKEDIN_PAGE_URL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_LINKEDIN_PAGE_URL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_LINKEDIN_PAGE_URL') }}<span class="text-sub"></span></label>

                    <div class="col-lg-8">
					{{ Form::text('linkedin_page_url',$social_details->sm_linkedin_url,['class' => 'form-control','id' => 'text1', 'placeholder' => 'http://www.linkedin.com/company/']) }}
                         
                    </div>
                </div>
				
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_YOUTUBE_URL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_YOUTUBE_URL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_YOUTUBE_URL') }}<span class="text-sub"></span></label>

                    <div class="col-lg-8">
					{{ Form::text('youtube_page_url',$social_details->sm_youtube_url,['class' => 'form-control','id' => 'text1', 'placeholder' => 'http://www.youtube.com/watch?v=QhzrdsS5J9w']) }}
                         
                    </div>
                </div>
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_GMAP_APP_KEY')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_GMAP_APP_KEY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_GMAP_APP_KEY') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('gmap_app_key',$social_details->sm_gmap_app_key,['class' => 'form-control','id' => 'text1', 'placeholder' => 'b24927947a1adc1cff504bd4cbb16968']) }}
                         
                    </div>
                </div>
				<!-- <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Android page URL<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="android_page_url" value="<?php // echo $social_details->sm_android_page_url; ?>"  placeholder="" class="form-control" type="text">
                    </div>
                </div>-->
				<!-- <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">iPhone page URL<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="iphone_page_url"  placeholder="" value="<?php // echo $social_details->sm_iphone_url; ?>" class="form-control" type="text">
                    </div>
                </div>-->
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ANALYTICS_CODE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ANALYTICS_CODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ANALYTICS_CODE') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::textarea('analytics_code',$social_details->sm_analytics_code ,['class' => 'form-control','id' => 'text4']) }}
                         
                    </div>
                </div>

              <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.GM_CLIENT_ID')!= '')  ?  trans(Session::get('admin_lang_file').'.GM_CLIENT_ID') : trans($ADMIN_OUR_LANGUAGE.'.GM_CLIENT_ID') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    {{ Form::text('gl_client_id',$social_details->sm_gl_client_id,['class' => 'form-control','id' => 'glclientid', 'placeholder' => '803492427490-pru94hnfvh242rbv222k9olo1d73od1n']) }}
                         
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.GM_CLIENT_SECRECT_KEY')!= '')  ?  trans(Session::get('admin_lang_file').'.GM_CLIENT_SECRECT_KEY') : trans($ADMIN_OUR_LANGUAGE.'.GM_CLIENT_SECRECT_KEY') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    {{ Form::text('gl_secret_key',$social_details->sm_gl_sec_key,['class' => 'form-control','id' => 'glclientkey', 'placeholder' => 'HB7lPHJBPgYaIxOFi1WnnnpP']) }}
                         
                    </div>
                </div>
				          

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad"><a style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</a></button>
                    
                    </div>
					  
                </div>

                
				{{ Form::close() }}
        </div>
    </div>
</div>
   
    </div>
                    
                    </div>
                    
                    
                    

                </div>
            <!--END PAGE CONTENT -->
 
        </div>
    
     <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
  {!! $adminfooter !!}
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS --> 
     <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>  
     
</body>
     <!-- END BODY -->
</html>
