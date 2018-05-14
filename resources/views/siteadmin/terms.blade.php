<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_TERMS_PAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TERMS_PAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TERMS_PAGE')}}</title>
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
      @php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif	
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/bootstrap-wysihtml5-hack.css" />
     <style>
                        ul.wysihtml5-toolbar > li {
                            position: relative;
                        }
                    </style>
    <!-- END PAGE LEVEL  STYLES -->
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
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TERMS_PAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TERMS_PAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TERMS_PAGE')}}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TERMS_PAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TERMS_PAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TERMS_PAGE')}}</h5> 
        </header>
        <div id="div-1" class="accordion-body collapse in body">
        @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
		{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
        
        </div>
		</ul>	
		@endif
        	@if (Session::has('update_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('update_result') !!}
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
       </div>
		@endif
            {!! Form::open(array('url'=>'terms_update','class'=>'form-horizontal')) !!}
            @foreach($result as $info)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-6">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_TERMS_PAGE_DATA')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_TERMS_PAGE_DATA')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_TERMS_PAGE_DATA') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-6">
                    </div>
                </div>
              
               
                <div class="form-group">
				 <div class="col-lg-10">
                 		
						
						{{ Form::textarea('terms_content',$info->tr_description,['id' => 'wysihtml5', 'class' => 'form-control','rows' => '10']) }}
                       
                    </div>
					{!! Html::decode(Form::label('','<span class="text-sub"></span>',['class' => 'control-label col-lg-2'])) !!}
                   
                </div>
				
				
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				<?php  
				$get_lang_name = $get_lang->lang_name;
				$tr_description_dynamic = 'tr_description_'.$get_lang->lang_code;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-6">Terms & Condition Page Data({{ $get_lang_name }})<span class="text-sub">*</span></label>
                    <div class="col-lg-6">
                    </div>
                </div>
              
               
                <div class="form-group">
				 <div class="col-lg-10">
                 		
                       <textarea id="wysihtml5" class="form-control" placeholder="Enter Terms & Condition Page Data In {{ $get_lang_name }}" name="terms_content_{{ $get_lang_name }}" rows="10">{!! $info->$tr_description_dynamic !!}</textarea>
                    </div>
					{!! Html::decode(Form::label('','<span class="text-sub"></span>',['class' => 'control-label col-lg-2'])) !!}
                   
                </div>
				@endforeach
				@endif
				
                <div class="form-group">
				{!! Html::decode(Form::label('','<span class="text-sub"></span>',['class' => 'control-label col-lg-2','for' => 'pass1'])) !!}
                    

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad" type="submit"><a style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</a></button>
                    </div>
					  
                </div>
		@endforeach
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

         <!-- PAGE LEVEL SCRIPTS -->
     <script src="{{ url('') }}/public/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="{{ url('') }}/public/assets/js/editorInit.js"></script>
    <script>
        $(function () { formWysiwyg(); });		
     </script>
     <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
     <!--END PAGE LEVEL SCRIPTS -->

</body>
     <!-- END BODY -->
</html>
