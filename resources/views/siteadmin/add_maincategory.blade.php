<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_MAIN_CATEGORY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_MAIN_CATEGORY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_MAIN_CATEGORY') }}</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{  url('') }}/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="{{  url('') }}/public/assets/css/main.css" />
    <link rel="stylesheet" href="{{  url('') }}/public/assets/css/theme.css" />
    <link rel="stylesheet" href="{{  url('') }}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{  url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_MAIN_CATEGORY')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_ADD_MAIN_CATEGORY')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_MAIN_CATEGORY') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_MAIN_CATEGORY')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_ADD_MAIN_CATEGORY')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_MAIN_CATEGORY') }}</h5>
            
        </header>
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable">
	 {{ Form::button('×',['class' => 'close','data-dismiss'=>'modal','aria-hidden' => 'true']) }}
	{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif

        @if (Session::has('error'))
        <div id="data" class="alert alert-warning alert-dismissable">
	{{ Form::button('×',['class' => 'close','data-dismiss'=>'alert','aria-hidden' => 'true']) }}
	{!! Session::get('error') !!}</div>
        @endif
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'add_main_category_submit','class'=>'form-horizontal', 'accept-charset' => 'UTF-8')) !!}
				@foreach($add_main_catg_details as $add_main_catg_det)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TOP_CATEGORY_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('catg_name',$add_main_catg_det->mc_name,['id' => 'catg_name','class' => 'form-control','readonly']) }}
                                     
								{{ Form::hidden('catg_id',$add_main_catg_det->mc_id,['id' => 'catg_id']) }}	 
                       
                    </div>
                </div>
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MAIN_CATEGORY_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MAIN_CATEGORY_NAME') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_MAIN_CATEGORY_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="main_catg_name" placeholder="Enter Main Category {{ $default_lang }}" name="main_catg_name" class="form-control" value="{!!Input::old('main_catg_name')!!}" type="text">
                    </div>
                </div>
				
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
			<?php 	$get_lang_name = $get_lang->lang_name;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Main Category Name({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="main_catg_name_{{ $get_lang_name }}" placeholder="Enter Main Category In {{ $get_lang_name }}" name="main_catg_name_{{ $get_lang_name }}" class="form-control" value="{!!Input::old('main_catg_name_'.$get_lang_name)!!}" type="text">
                    </div>
                </div>
				@endforeach
				@endif
				
               <div class="form-group">
                    <label class="control-label col-lg-3" for="text1"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CATEGORY_STATUS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CATEGORY_STATUS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CATEGORY_STATUS') }}
					 <label class="sample"></label></label>

                    <div class="col-lg-8">
					           <input type="radio" value="1" title="Active" checked="checked" name="catg_status"> <label class="sample">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ACTIVE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ACTIVE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIVE') }}                  </label>
					<input type="radio" value="0" title="Active"  name="catg_status"> <label class="sample">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DEACTIVE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DEACTIVE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_DEACTIVE') }}                  </label></label>
						<label class="sample"></label></label>
                    </div>
                </div>
				   
				@endforeach
                

                <div class="form-group">
				{!!  Html::decode(Form::label('','<span  class="text-sub"></span>',['for' => 'pass1', 'class' => 'control-label col-lg-3']))  !!}	
                 

                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-success btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUBMIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUBMIT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBMIT') }}</button>
                        <button type="reset" class="btn btn-default btn-sm btn-grad" style="color:#000"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button>
                   </div>
					  
                </div>

                
         {!! Form::close()!!}
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
