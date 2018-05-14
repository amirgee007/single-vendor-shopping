<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_BLOG_SETTIGNS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_BLOG_SETTIGNS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOG_SETTIGNS')}} @endif   </title>
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
	  <link rel="stylesheet" href="public/assets/css/plan.css" />
    <link rel="stylesheet" href="public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <?php $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); ?> @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/{{ $fav->imgs_name }}">
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
                            	<li class=""><a href="#">@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME')}} @endif</a></li>
                                <li class="active"><a href="#">@if (Lang::has(Session::get('admin_lang_file').'.BACK_BLOG_SETTIGNS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_BLOG_SETTIGNS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOG_SETTIGNS')}} @endif</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_BLOG_SETTIGNS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_BLOG_SETTIGNS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOG_SETTIGNS')}} @endif</h5>
            
        </header>
        @if ($errors->any())
         <br>
		 <ul style="color:red;">
		{!! implode('', $errors->all('<li>:message</li>')) !!}
		</ul>	
		@endif
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'edit_blog_settings','class'=>'form-horizontal')) !!}
				@foreach($blog_settings as $blog_set)
                <div class="form-group">
                    <label class="control-label col-lg-3">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ALLOW_COMMENTS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ALLOW_COMMENTS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ALLOW_COMMENTS')}} @endif<span  class="text-sub">*</span></label>

                    <div class="col-lg-6">
                       <select class="form-control" name="allow_comments">
           <option value="1" <?php if($blog_set->bs_allowcommt == 1){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_YES')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_YES')}} @endif</option>
            <option value="0" <?php if($blog_set->bs_allowcommt == 0){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NO')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NO')}} @endif</option>
           
        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-3">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_APPROVAL')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADMIN_APPROVAL')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_APPROVAL')}} @endif<span  class="text-sub">*</span></label>

                    <div class="col-lg-6">
                     <select class="form-control" name="admin_approval">
           <option value="1" <?php if($blog_set->bs_radminapproval == 1){?> selected <?php } ?>>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_YES') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_YES') }} </option>
            <option value="0" <?php if($blog_set->bs_radminapproval == 0){?> selected <?php } ?>>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_NO')  :  trans($ADMIN_OUR_LANGUAGE.'.BACK_NO')}} </option>
        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_POST_PER_PAGE')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_POST_PER_PAGE')  :  trans($ADMIN_OUR_LANGUAGE.'.BACK_POST_PER_PAGE')}} <span  class="text-sub">*</span></label>

                    <div class="col-lg-6">
					{{ Form::text('post_per_page',$blog_set->bs_postsppage,['id' => 'post_per_page','class' => 'form-control'] ) }}
                     
                    </div>
                </div>
              
				<div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE')}} </button>
                     <button type="reset" class="btn btn-danger btn-sm btn-grad" style="color:#ffffff;"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '')   ?   trans(Session::get('admin_lang_file').'.BACK_RESET') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET')}} </button>
                   
                    </div>
					  
                </div>

                @endforeach
         </form>
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
    <script src="public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>

<script>
$('#post_per_page').keydown(function (e) {
if (e.shiftKey || e.ctrlKey || e.altKey) {
e.preventDefault();
} else {
var key = e.keyCode;
if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
e.preventDefault();
}
}
});
</script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>

