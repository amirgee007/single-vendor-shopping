<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADS_ADD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADS_ADD') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_ADS_ADD') }}</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/main.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/theme.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                            	<li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_HOME') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADS_ADD')!= '') ? trans(Session::get('admin_lang_file').'.BACK_ADS_ADD')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADS_ADD') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADS_ADD')!= '') ? trans(Session::get('admin_lang_file').'.BACK_ADS_ADD')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADS_ADD') }}</h5>
            
        </header>
        <div id="div-1" class="accordion-body collapse in body">
		@if ($errors->any()) 

		<div class="alert alert-danger alert-dismissable">
		{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
		<ul>{!! implode('', $errors->all('<li>:message</li>')) !!}</ul></div>
		@endif
        @if (Session::has('message'))
		<p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
		@endif
		
		@if (Session::has('error'))
		<div class="alert alert-danger alert-dismissable">
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
	{!! Session::get('error') !!}</div>
		@endif
              {!! Form::open(array('url'=>'add_ad_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')) !!}

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_AD_TITLE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_AD_TITLE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_AD_TITLE') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="text1" maxlength="100" placeholder="Enter Ad Title {{ $default_lang }}" class="form-control" type="text" name="adtitle" value="{!! Input::old('adtitle') !!}">
                    </div>
                </div>
				
			 @if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
					<?php 
					$get_lang_name = $get_lang->lang_name;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Ad Title({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="text1" maxlength="100" placeholder="Enter Ad Title In {{ $get_lang_name }}" class="form-control" type="text" name="ad_title_{{ $get_lang_name }}" value="{!! Input::old('ad_title_'.$get_lang_name) !!}">
                    </div>
                </div>
				@endforeach
				@endif

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADS_POSITION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADS_POSITION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADS_POSITION') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                   
                         <select class="form-control" name="adposition" value="{!! Input::old('adposition') !!}">
							<option value="">--Select Position--</option>

							<option value="1" @if(Input::old('adposition')==1) selected @endif>Left Position</option>
							<option value="2" @if(Input::old('adposition')==2) selected @endif>Middle Position</option>
							<option value="3" @if(Input::old('adposition')==3) selected @endif>Right Position</option>
						</select>
                    </div>
                </div>

                <?php /*?><div class="form-group">
                    <label class="control-label col-lg-2">Pages<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="page" value="{!! Input::old('page') !!}">
            <option value="0">select any page</option>
            <option value="1">Home</option>
          
        </select>
                    </div>
                </div><?php */?>

                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_REDIRECT_URL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_REDIRECT_URL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_REDIRECT_URL') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                           <input id="text1" placeholder="Enter Redirect URL" class="form-control" type="url" name="redirecturl" value="{!! Input::old('redirecturl') !!}"><span class="text-sub">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_REDIRECT_URL_FORMAT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_REDIRECT_URL_FORMAT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_REDIRECT_URL_FORMAT') }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPLOAD_AD_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPLOAD_AD_IMAGE') :trans($ADMIN_OUR_LANGUAGE.'.BACK_UPLOAD_AD_IMAGE') }}<span class="text-sub">*</span>
					
					</label>
					<span class="errortext red logo-size" style="color:red"><em>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }} {{ $ADS_WIDTH }} x  {{ $ADS_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}</em></span>

                    <div class="col-lg-8">
                        <input type="file" name="file" id="ad_img"> 
                    </div>
                </div>
                <div class="form-group">
				
				{!! Html::decode(Form::label('','<span class="text-sub"></span>',['class' => 'control-label col-lg-2','for' => 'pass1'])) !!}
                    

                    <div class="col-lg-8">
                     <button  type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUBMIT')!= '') ? trans(Session::get('admin_lang_file').'.BACK_SUBMIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBMIT') }}</button>
                     <button type="reset" class="btn btn-danger btn-sm btn-grad" style="color:#ffffff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button>
                   
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
<script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
</body>
     <!-- END BODY -->
</html>