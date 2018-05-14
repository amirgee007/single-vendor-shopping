<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAVICON_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_FAVICON_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAVICON_SETTINGS') }}</title>
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
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
     @php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif	
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


         <!-- HEADER SECTION -->
           {!!$adminheader!!}
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
         {!!$adminleftmenus!!}
        <!--END MENU SECTION -->

		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAVICON_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_FAVICON_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAVICON_SETTINGS') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAVICON_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_FAVICON_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAVICON_SETTINGS') }}</h5>
            
        </header>
		@if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
         {{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert' , 'aria-hidden' => 'true']) }}
         
		 
        </div>
		</ul>	
		@endif
        <div id="div-1" class="accordion-body collapse in body">
            @if (Session::has('message'))
		<p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
		@endif
        {!! Form::open(array('url'=>'add_favicon_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CURRENT_FAVICON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CURRENT_FAVICON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CURRENT_FAVICON') }}<span class="text-sub">*</span></label>
 @foreach($favicondetails as $favicon)
				@endforeach
				@php
				$logo_img = $favicon->imgs_name;
				$imgpath="public/assets/favicon/".$logo_img;
				$prod_path 	= url('').'/public/assets/default_image/No_image_favicon.png';@endphp
				@if(file_exists($imgpath) && $logo_img !='')
				@php 
					$prod_path = url('').'/public/assets/favicon/'.$logo_img; @endphp 
				@endif
				
				
				
				
		
                    <div class="col-lg-8">
                       <img alt="" src="{{ $prod_path }}">
                    </div>
                </div>

		  <div class="form-group">
                    <label class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPLOAD_FAVICON_IMAGE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_UPLOAD_FAVICON_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPLOAD_FAVICON_IMAGE') }}<span class="text-sub">*</span></label>
					<span class="errortext red logo-size" style="color:red"><em>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }} {{ $FAVICON_WIDTH }} x {{ $FAVICON_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}</em></span>	
                    <div class="col-lg-8">
					{{ Form::hidden('old_favicon',$logo_img,['id' => 'old_favicon']) }}
					
					{{ Form::file('favfile', array('id' => 'favfile')) }}
                      
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                   <button type="submit" class="btn btn-success btn-sm btn-grad " style="color:#fff">{{  (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                     <button type="reset" class="btn btn-danger btn-sm btn-grad" style="color:#ffffff;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button>
                     
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
    <div id="footer">
        {!!$adminfooter!!}
    </div>
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
