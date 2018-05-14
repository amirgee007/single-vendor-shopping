<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }}| {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_SPECIFICATION_GROUP')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_SPECIFICATION_GROUP') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_SPECIFICATION_GROUP')}}</title>
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
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_SPECIFICATION_GROUP')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_SPECIFICATION_GROUP') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_SPECIFICATION_GROUP') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_SPECIFICATION_GROUP')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_SPECIFICATION_GROUP') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_SPECIFICATION_GROUP') }}</h5>
            
        </header>
        <div id="div-1" class="accordion-body collapse in body">
         @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
		{!! Form::button('x',array('class' => 'close',  'data-dismiss' => 'alert', 'aria-hidden' => 'true')) !!}
         
        </div>
		</ul>	
		@endif
         @if (Session::has('message'))
		<div class="alert alert-danger alert-dismissable">{!! Session::get('message') !!}</div>
		@endif
        @foreach($specificationresult as $info) 
             {!! Form::open(array('url'=>'edit_specification_group_submit','class'=>'form-horizontal', 'accept-charset' => 'UTF-8')) !!}
				<div class="form-group">
				{!! Html::decode(Form::label('','Main Category<span class="text-sub">*</span>',['for' => 'text1', 'class' =>'control-label col-lg-3'])) !!}
                    

                    <div class="col-lg-5">
						<select name="main_category" id="specification_main_category_id" class="form-control" onchange="get_related_sub_cat(this.value)">
							<option value="">-- Select --</option>
							 @foreach($main_category as $category)
							<option <?php if($info->sp_mc_id==$category->mc_id)echo"Selected"; ?> value="{{ $category->mc_id }}"><?php echo ucfirst(strtolower($category->mc_name)); ?></option>
							@endforeach
						</select>
                    </div>
                </div>
				<div class="form-group">
				{!! Html::decode(Form::label('','Second Main Category<span class="text-sub">*</span>',['for' => 'text1', 'class' =>'control-label col-lg-3'])) !!}
                    

                    <div class="col-lg-5">
						<select name="second_main_category" id="specification_second_main_category_id" class="form-control">
						<option value="">-- Select --</option>
							 @foreach($sec_main_category as $sec_category) 
							<option <?php if($info->sp_smc_id==$sec_category->smc_id)echo"Selected"; ?> value="<?php echo $sec_category->smc_id; ?>"><?php echo ucfirst(strtolower($sec_category->smc_name)); ?></option>
							@endforeach
						</select>
                    </div>
                </div>
				<div class="form-group">
				{!! Html::decode(Form::label('','Show On Filter<span class="text-sub">*</span>',['for' => 'text1', 'class' =>'control-label col-lg-3'])) !!}
                    

                    <div class="col-lg-5">
						<input type="radio" name="show_on_filter" value="0" <?php if($info->show_on_filter=="0")echo" checked"; ?>>No
						<input type="radio" name="show_on_filter" value="1" <?php if($info->show_on_filter=="1")echo" checked"; ?>>Yes
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION_GROUP_NAME')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION_GROUP_NAME') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION_GROUP_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-5">
					{{ Form::hidden('spg_id',$info->spg_id) }}
                        
                        <input id="text1" name="group_name" placeholder="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION_GROUP_NAME')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION_GROUP_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION_GROUP_NAME') }} In English"  value="{!! $info->spg_name !!}" class="form-control" type="text">
                    </div>
                </div>
				
				 @if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
			<?php 
				$get_lang_code = $get_lang->lang_code;
				$get_lang_name = $get_lang->lang_name;
				$specific_name_dynamic = 'spg_name_'.$get_lang_code; 
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Specification group name({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-5">
					{{ Form::hidden('spg_id',$info->spg_id) }}
                       
                        <input id="group_name_french" name="group_name_{{ $get_lang_name }}" placeholder="Enter Specification Group Name In {{ $get_lang_name }}"  value="{!! $info->$specific_name_dynamic !!}" class="form-control" type="text">
                    </div>
                </div>
				@endforeach
				@endif
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SORT_ORDER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SORT_ORDER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SORT_ORDER') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-1">
                        <input id="text1" placeholder="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SORT_ORDER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SORT_ORDER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SORT_ORDER') }}" name="sort_order"  value="{!! $info->spg_order !!}" class="form-control" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>
                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad"><a style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</a></button>
                     <a href="{{ url('manage_specification_group') }}"  class="btn btn-default btn-sm btn-grad" style="color:#000">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CANCEL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL') }}</a>
                    </div>
					  
                </div>

                
				{{ Form::close() }}
         @endforeach
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
	 function get_related_sub_cat(cat_id)
	{
		$.post("<?php echo url(''); ?>/get_related_subcategory",
		{
			mc_cat_id: cat_id
		},
		function(data, status){
			/* alert("Data: " + data + "\nStatus: " + status); */
			$("#specification_second_main_category_id").html(data);
		});
	}
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
</body>
     <!-- END BODY -->
</html>
