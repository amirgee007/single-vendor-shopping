<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SPECIFICATION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_SPECIFICATION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SPECIFICATION') }}</title>
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
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SPECIFICATION')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_ADD_SPECIFICATION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SPECIFICATION') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SPECIFICATION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_SPECIFICATION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SPECIFICATION') }}</h5>
            
        </header>
  	 
        <div id="div-1" class="accordion-body collapse in body">
	@if ($errors->any())
		 <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
		{!! Form::button('×',array('class' => 'close',  'data-dismiss' => 'alert', 'aria-hidden' => 'true')) !!}
         
        </div>
		</ul>
		@endif
        @if (Session::has('message'))
		<p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
		@endif
            {!! Form::open(array('url'=>'add_specification_submit','class'=>'form-horizontal', 'accept-charset' => 'UTF-8')) !!}

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        <input id="text1"  name="sp_name"  placeholder="Enter Specification Name {{ $default_lang }}" class="form-control" type="text"  value="{!! Input::old('sp_name') !!}">
                    </div>
                </div>
				
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				@php $get_lang_name = $get_lang->lang_name;
				@endphp
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Specification name({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        <input id="text1"  name="sp_name_{{ $get_lang_name }}" placeholder="Enter Specification Name In {{ $get_lang_name }}" class="form-control" type="text"  value="{!! Input::old('sp_name_'.$get_lang_name.'') !!}">
                    </div>
                </div>
				@endforeach
				@endif

                <div class="form-group">
                    <label for="limiter" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION_GROUP_NAME')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION_GROUP_NAME') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION_GROUP_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
             <select class="form-control"    name="spgroup_name">

		 @foreach ($groupresult as $group) 
            <option value="{{ $group->spg_id }}">{!!$group->spg_name!!}</option>
           @endforeach
        </select>
                    </div>
                </div>

               <div class="form-group">
                    <label for="text1" class="control-label col-lg-3" >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SORT_ORDER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SORT_ORDER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SORT_ORDER') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-1">
						{!! Form::text('sortorder',Input::old('sortorder'),['class' => 'form-control', 'id' => 'text1']) !!}
                       
                       
                    </div>
                    <div class="col-lg-2" style="margin-top:5px">
                        <label class="label label-danger" style="padding:5px">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_NUMERIC_VALUES_ONLY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_NUMERIC_VALUES_ONLY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMERIC_VALUES_ONLY') }}</label>
                    </div>
                </div>

                <div class="form-group">
				{!! Html::decode(Form::label('','<span  class="text-sub"></span>',['class' => 'control-label col-lg-3', 'for' => 'pass1'])) !!}
                   

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-success btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUBMIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUBMIT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBMIT') }}</button>
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
     <!---Right Click Block Code---->
<script language="javascript">
document.onmousedown=disableclick;
status="Cannot Access for this mode";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
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
<script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>
</body>
     <!-- END BODY -->
</html>
