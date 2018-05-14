<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_SPECIFICATION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_SPECIFICATION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_SPECIFICATION') }}</title>
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
                            	<li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_SPECIFICATION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_SPECIFICATION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_SPECIFICATION')}}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_SPECIFICATION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_SPECIFICATION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_SPECIFICATION') }}</h5>
            
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
  		 
		 {!! Form::open(array('url'=>'update_specification_submit','class'=>'form-horizontal', 'accept-charset' => 'UTF-8')) !!}
@foreach ($specificationresult as $info)

{{ Form::hidden('id',$id) }}


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
			{!! Form::text('spedit_name',$info->sp_name,array('id'=>'spedit_name','class'=>'form-control')) !!} 
                      
                    </div>
                </div>
				
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				<?php $get_lang_name = $get_lang->lang_name;
				$get_lang_code = $get_lang->lang_code;
				$sp_name_dynamic = 'sp_name_'.$get_lang_code; 
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Specification name({{$get_lang_name}})<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
			{!! Form::text('spedit_name_'.$get_lang_name.'',$info->$sp_name_dynamic,array('id'=>'spedit_name_fr','class'=>'form-control')) !!} 
                      
                    </div>
                </div>
				@endforeach
				@endif
                <div class="form-group">
                    <label for="limiter" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION_GROUP_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION_GROUP_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION_GROUP_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        <select class="form-control"  id="speditgroup_name" name="speditgroup_name">
          	

		<?php $groupid=$info->sp_spg_id; ?>
		 @foreach ($groupresult as $group) 
            <option value="{{ $group->spg_id }}" <?php if($groupid==$group->spg_id){ ?> selected <?php } ?>>{!!$group->spg_name!!}
</option>
          	@endforeach
             
        </select>
                    </div>
                </div>

               <div class="form-group">
                    <label for="text1" class="control-label col-lg-3" id="editsortorder" name="editsortorder">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SORT_ORDER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SORT_ORDER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SORT_ORDER') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-1">

		{!! Form::text('spedit_order',$info->sp_order,array('id'=>'spedit_order','class'=>'form-control')) !!} 

                      
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                      <a href="{{ url('manage_specification') }}" class="btn btn-default btn-sm btn-grad" style="color:#000">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_CANCEL') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL') }}</a>
                   
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
     <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
</body>
     <!-- END BODY -->
</html>
