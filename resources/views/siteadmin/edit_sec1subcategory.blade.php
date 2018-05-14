<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | Edit Second Sub Category</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
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
                            	<li class=""><a href="#">Home</a></li>
                                <li class="active"><a href="#">Edit Second Sub Category</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Edit Second Sub Category</h5>
            
        </header>
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable">
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
	{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif

    @if (Session::has('error'))
    <div id="data" class="alert alert-warning alert-dismissable">
{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
{!! Session::get('error') !!}</div>
    @endif
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'edit_sec1sub_category_submit','class'=>'form-horizontal', 'accept-charset' => 'UTF-8')) !!}
				@foreach($edit_sec1sub_catg_details as $add_sub_catg_det)
                <div class="form-group">
				{!! Html::decode(Form::label('','Sub Category Name<span class="text-sub">*</span>',['for' => 'text1', 'class' => 'control-label col-lg-3'])) !!}
				
                   

                    <div class="col-lg-8">
					{{ Form::text('catg_name',$add_sub_catg_det->sb_name,['class' => 'form-control','id'=>'catg_name','readonly' ]) }}
                       {{ Form::hidden('catg_id',$add_sub_catg_det->ssb_id,['id'=>'catg_id' ]) }}
                       {{ Form::hidden('main_catg_id',$add_sub_catg_det->sb_id,['id'=>'main_catg_id' ]) }}                    
                         
						
                    </div>
                </div>
				
                <div class="form-group">
				{!! Html::decode(Form::label('','Second Sub Category Name<span class="text-sub">*</span>',['for' => 'text1', 'class' => 'control-label col-lg-3'])) !!}
                    

                    <div class="col-lg-8">
                        <input id="main_catg_name" placeholder="Enter Second Sub Category {{ $default_lang }}" name="main_catg_name" class="form-control" value="{!!$add_sub_catg_det->ssb_name !!}" type="text" />
                    </div>
                </div>
				
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
			<?php 
			$get_lang_name = $get_lang->lang_name;
				$get_lang_code = $get_lang->lang_code;
				$sec_sub_dynamic = 'ssb_name_'.$get_lang_code; 
				?>
				<div class="form-group">
				{!! Html::decode(Form::label('','Second Sub Category Name({{ $get_lang_name }})<span class="text-sub">*</span>',['for' => 'text1', 'class' => 'control-label col-lg-3'])) !!}
                   
                    <div class="col-lg-8">
                        <input id="main_catg_name_{{ $get_lang_name }}" placeholder="Enter Second Sub Category in {{ $get_lang_name }}" name="main_catg_name_{{ $get_lang_name }}" class="form-control" value="{!!$add_sub_catg_det->$sec_sub_dynamic !!}" type="text" />
                    </div>
                </div>
				@endforeach
				@endif
				
               <div class="form-group">
			   
                    <label class="control-label col-lg-3" for="text1"> Category Status
					 <label class="sample"></label></label>

                    <div class="col-lg-8">
					           <input type="radio" value="1" title="Active" <?php if($add_sub_catg_det->ssb_status == 1){?> checked <?php } ?> name="catg_status"> <label class="sample">Active                  </label>
					<input type="radio" value="0" title="DeActive" <?php if($add_sub_catg_det->ssb_status == 0){?> checked <?php } ?>  name="catg_status"> <label class="sample">Deactive                  </label></label>
						<label class="sample"></label></label>
                    </div>
                </div>
				   
				
                

                <div class="form-group">
				{!! Html::decode(Form::label('','<span  class="text-sub"></span>',['for' => 'pass1', 'class' => 'control-label col-lg-3'])) !!}
                    

                    <div class="col-lg-8">
					{{ Form::submit('Update',['class' => 'btn btn-warning btn-sm btn-grad', 'style' => 'color:#fff']) }}
                    
                     <a href="{{ url('manage_secsubmain_category') }}/{!!$add_sub_catg_det->sb_id !!}" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</a>
                   
                    </div>
					  
                </div>
@endforeach
                
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
    <script src="{{  url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="{{  url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{  url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
