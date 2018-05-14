<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAQ')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FAQ') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAQ') }}</title>
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
                            	<li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_FAQ')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_FAQ')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_FAQ')}}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_FAQ')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_FAQ')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_FAQ')}}</h5>           
        </header>
        <div id="div-1" class="accordion-body collapse in body">
@if ($errors->any())
         <br>
		 <ul style="color:red;">
		{!! implode('', $errors->all('<li>:message</li>')) !!}
		</ul>	
		@endif
        @if (Session::has('message'))
		<p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
		@endif


	@foreach ($faqresult as $info) 
             {!! Form::open(array('url'=>'update_faq_submit','class'=>'form-horizontal', 'accept-charset' => 'UTF-8')) !!}
				 {{ Form::hidden('id',$id)  }}
 
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_YOUR_QUESTION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ENTER_YOUR_QUESTION')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_YOUR_QUESTION') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
					
					{{ Form::text('faq_question',$info->faq_name,['id' => 'text1', 'maxlength' => '250','class' => 'form-control']) }} 
                       
                    </div>
                </div>
				
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				<?php 
				$get_lang_name = $get_lang->lang_name;
				$get_lang_code = $get_lang->lang_code;
				$faq_name_dynamic = 'faq_name_'.$get_lang_code; 
				?>
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Enter Your Question({{ $get_lang_name }})<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                        <input id="text1" maxlength="250" name="faq_question_{{ $get_lang_name }}" placeholder="Enter Your Question In {{ $get_lang_name }}" class="form-control" type="text" value="{{ $info->$faq_name_dynamic }}">
                    </div>
                </div>
				@endforeach
				@endif
                <div class="form-group">
                    <label class="control-label col-lg-3" style="line-height:225px; ">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_YOUR_ANSWER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ENTER_YOUR_ANSWER') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_YOUR_ANSWER') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					
					{{ Form::textarea('faq_answer',$info->faq_ans,['rows' => '10', 'class' => 'form-control', 'id' => 'text4']) }}
                       
                    </div>
                </div>
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				<?php 
				$get_lang_name = $get_lang->lang_name;
				$get_lang_code = $get_lang->lang_code;
				$faq_ans_dynamic = 'faq_ans_'.$get_lang_code; 
				?>
				<div class="form-group">
                    <label class="control-label col-lg-3" style="line-height:225px;">Enter Your Answer({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">

                       <textarea rows="10" class="form-control" id="text4"  name="faq_answer_ {{ $get_lang_name }}">{{ $info->$faq_ans_dynamic }}</textarea>
                    </div>
                </div>
				@endforeach
				@endif
                <div class="form-group">
				{!! Html::decode(Form::label('','<span  class="text-sub"></span>',['for' =>'pass1', 'class' => 'control-label col-lg-2'])) !!}
                  

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                      <a href="{{ url('manage_faq')}}" class="btn btn-default btn-sm btn-grad" style="color:#000">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CANCEL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL')}} </a>
                   
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
      <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
</body>
     <!-- END BODY -->
</html>
