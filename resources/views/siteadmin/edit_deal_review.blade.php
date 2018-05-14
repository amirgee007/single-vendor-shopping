<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
     <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_REVIEW')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT_REVIEW')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_REVIEW')}} @endif </title>
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
    <link rel="shortcut icon" href="{{ url('')}}/public/assets/favicon/{{ $fav->imgs_name }}">
@endif	
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/bootstrap-wysihtml5-hack.css" />
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
                            	<li class=""><a >{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= ''))? trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_REVIEW')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT_REVIEW')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_REVIEW')}} @endif</a></li>
                            </ul>
                    </div>
                </div>
                
   
    <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_REVIEW')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT_REVIEW')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_REVIEW')}} @endif</h5>
            
        </header>
        <div id="div-1" class="accordion-body collapse in body">
         @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
		{{ Form::button('x', array('class' => 'close','aria-hidden' => 'true', 'data-dismiss' =>'alert')) }}
         
        </div>
		</ul>	
		@endif
         @if (Session::has('error_message'))
		<div class="alert alert-danger alert-dismissable">{!! Session::get('error_message') !!}</div>
		@endif
        @foreach ($result as $info) @endforeach
             {!! Form::open(array('url'=>'edit_deal_review_submit','class'=>'form-horizontal')) !!}

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-5">@if (Lang::has(Session::get('admin_lang_file').'.BACK_REVIEW_TITLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_REVIEW_TITLE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_REVIEW_TITLE')}}@endif :<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="hidden" name="comment_id" value="{!! $info->comment_id !!}"?>
                        <input id="text1" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_TITLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TITLE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TITLE')}} @endif" class="form-control review_title" type="text" id="review_title" name="review_title" value="{!! $info->title !!}" required>
                    </div>
                </div>
                <div class="form-group">
                <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_REVIEW_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_REVIEW_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_REVIEW_DESCRIPTION')}} @endif :<span class="text-sub">*</span></label>
                        <div class="col-lg-11">
                        
                            <div class="">
                               
                                <div class="body collapse in">
								{!! Form::open() !!}
                                        <textarea id="wysihtml5"  required class="form-control review_comment" rows="10" id="review_comment" name="review_comment" >{!! $info->comments !!}</textarea>

                                        <div class="form-actions">
                                            <br />
                                           <button class="btn btn-warning btn-sm btn-grad" onclick="error();"><a  style="color:#fff">@if (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_UPDATE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE')}} @endif</a></button>
                     
											<button class="btn btn-default btn-sm btn-grad"><a href=" {{ url('manage_deal_review') }} " style="color:#000">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CANCEL')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL')}} @endif</button>
                                        </div>
										{!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				{!! Form::close() !!}
        </div>
    </div>
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

function error() 
{
	var Title = $('.review_title').val()
	
	var review_comment = $('.review_comment').val()
		
	if(Title == '')
	{
		alert("@if (Lang::has(Session::get('admin_lang_file').'.BACK_REVIEW_TITLE_FIELD_IS_EMPTY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_REVIEW_TITLE_FIELD_IS_EMPTY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_REVIEW_TITLE_FIELD_IS_EMPTY')}} @endif")
		return false;
	}
	if(review_comment == '')
	{
		alert("@if (Lang::has(Session::get('admin_lang_file').'.BACK_REVIEW_DESCRIPTION_FIELD_IS_EMPTY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_REVIEW_DESCRIPTION_FIELD_IS_EMPTY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_REVIEW_DESCRIPTION_FIELD_IS_EMPTY')}} @endif")
		return false;
	}
}

</script>
   <!--
    

     <!--END PAGE LEVEL SCRIPTS -->

</body>
     <!-- END BODY -->
</html>
