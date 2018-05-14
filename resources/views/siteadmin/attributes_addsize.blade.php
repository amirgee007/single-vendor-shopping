<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ATTRIBUTES_ADD_SIZE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ATTRIBUTES_ADD_SIZE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ATTRIBUTES_ADD_SIZE') }}</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="public/assets/css/main.css" />
    <link rel="stylesheet" href="public/assets/css/theme.css" />
    <link rel="stylesheet" href="public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                            	<li class=""><a >Home</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SIZE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_SIZE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SIZE') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SIZE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_SIZE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SIZE') }}</h5>            
            
        </header>
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
        @if (Session::has('exist_result'))
		 <div class="alert alert-danger alert-dismissable">{!! Session::get('exist_result') !!}
	 {{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert','aria-hidden' => 'true']) }}
        
         </div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
            {!! Form::open(array('url'=>'addsize_submit','class'=>'form-horizontal')) !!}

                <div class="form-group">
        
                    <label for="text1" class="control-label col-lg-1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SIZE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SIZE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SIZE') }} <span class="text-sub">*</span></label>

                    <div class="col-lg-3">
                        <input id="text1" placeholder="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SIZE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SIZE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SIZE') }}" name="file_size" class="form-control" type="text" value="{!! Input::old('file_size') !!}" maxlength="15">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-1"><span  class="text-sub"></span></label>
                    <div class="col-lg-8">
                     <button class="btn btn-success btn-sm btn-grad"  type="submit" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUBMIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUBMIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBMIT') }}</a></button>
                     <button class="btn btn-default btn-sm btn-grad" type="reset" style="color:#000">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') ? trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</a></button>
                    </div>
					  
                </div>

                
        {!! Form::close() !!}
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
