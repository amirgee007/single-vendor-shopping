<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CMS_ABOUT_US')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CMS_ABOUT_US') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CMS_ABOUT_US')}}</title>
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
                            	<li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ? trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{(Lang::has(Session::get('admin_lang_file').'.BACK_CMS_ABOUT_US')!= '') ? trans(Session::get('admin_lang_file').'.BACK_CMS_ABOUT_US')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_CMS_ABOUT_US') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{(Lang::has(Session::get('admin_lang_file').'.BACK_CMS_ABOUT_US')!= '') ? trans(Session::get('admin_lang_file').'.BACK_CMS_ABOUT_US')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_CMS_ABOUT_US') }}</h5> 
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
            {!! Form::open(array('url'=>'aboutus_page_update','class'=>'form-horizontal')) !!}
            @foreach($result as $info)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-6">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_ABOUT_US_PAGE_DATA')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_ABOUT_US_PAGE_DATA') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_ABOUT_US_PAGE_DATA') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-6">
                    </div>
                </div>
                <div class="form-group">
					<div class="col-lg-10">
                 		
                       <textarea id="wysihtml5" class="form-control" placeholder="Enter About Us Page Data {{ $default_lang }}" name="aboutus_data" rows="10">{!! $info->ap_description !!}</textarea>
                    </div>
					
					{!! Html::decode(Form::label('','<span class="text-sub"></span>',['class' => 'control-label col-lg-2'])) !!}
                    
                </div>
				
				  
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				<?php 
				$get_lang_name = $get_lang->lang_name;
				$ap_description_dynamic = 'ap_description_'.$get_lang->lang_code;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-6">About Us Page Data({{ $get_lang_name}})<span class="text-sub">*</span></label>
                    <div class="col-lg-6">
                    </div>
                </div>
              
              
                <div class="form-group">
				 <div class="col-lg-10">
                 		
                       <textarea id="wysihtml5" class="form-control" placeholder="Enter About Us Page Data in {{ $get_lang_name }}" name="aboutus_data_{{ $get_lang_name }}" rows="10">{!! $info->$ap_description_dynamic !!}</textarea>
                    </div>
                    <label class="control-label col-lg-2"><span class="text-sub"></span></label>
                </div>
				@endforeach
				@endif
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad"><a   style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</a></button>
                  <!--   <button class="btn btn-default btn-sm btn-grad"><a href="#" style="color:#000">Cancel</a></button>-->
                   
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
    <script src="{{ url('')}}/public/assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

         <!-- PAGE LEVEL SCRIPTS -->
     <script src="{{ url('')}}/public/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="{{ url('')}}/public/assets/js/editorInit.js"></script>
    <script>
        $(function () { formWysiwyg(); });	
		
     </script>

     <!--END PAGE LEVEL SCRIPTS -->
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