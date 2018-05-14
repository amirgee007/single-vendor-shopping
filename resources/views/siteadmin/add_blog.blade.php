<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} |  @if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_BLOG')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_BLOG')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_BLOG')}} @endif</title>
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
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/theme.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); ?> @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
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
                            	<li class=""><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME')}} @endif</a></li>
                                <li class="active"><a>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_BLOG')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_BLOG')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_BLOG')}} @endif</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_BLOG')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_BLOG')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_BLOG')}} @endif</h5>
            
        </header>
         @if (Session::has('message'))
		<div class="alert alert-danger alert-dismissable">{!! Session::get('message') !!}
      {{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert' , 'aria-hidden' => 'true']) }}
        </div>
		@endif
	  @if ($errors->any())
         <div class="alert alert-warning alert-dismissable">{!! implode('', $errors->all('<li>:message</li>')) !!}
        {{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert' , 'aria-hidden' => 'true']) }}
        </div>
		@endif
        
        
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'add_blog_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')) !!}
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_BLOG_TITLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_BLOG_TITLE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOG_TITLE') }} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="text1" maxlength="200" placeholder="Enter Blog Title {{ $default_lang }}" class="form-control" type="text" name="blog_title" value="{!! Input::old('blog_title') !!}" >
                    </div>
                </div>
				
				@if(!empty($get_active_lang))  
				@foreach($get_active_lang as $get_lang) 
				<?php 
        $get_lang_name = $get_lang->lang_name;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Blog Title({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="text1" maxlength="200" placeholder="Enter Blog Title in {{ $get_lang_name }}" class="form-control" type="text" name="blog_title_<?php echo $get_lang_name; ?>" value="{!! Input::old('blog_title_'.$get_lang_name) !!}" >
                    </div>
                </div>
				@endforeach
        @endif
				
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DESCRIPTION')}} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="wysihtml5" class="wysihtml5 form-control" placeholder="Enter Blog Description {{ $default_lang }}" rows="10" name="blog_description" >{!! Input::old('blog_description') !!}</textarea>
                    </div>
                </div>
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				<?php 
        $get_lang_name = $get_lang->lang_name;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Description({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="wysihtml5" class="wysihtml5 form-control" placeholder="Enter Blog Description in {{ $get_lang_name }}" rows="10" name="blog_description_<?php echo $get_lang_name; ?>" >{!! Input::old('blog_description_'.$get_lang_name) !!}</textarea>
                    </div>
                </div>
				 @endforeach
         @endif
				  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CATEGORY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CATEGORY')}} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="blog_category" value="{!! Input::old('blog_category') !!}" >
							<option value="0">-- @if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT') }} @endif --</option>						
                          @foreach($categoryresult as $categorydetails)
          				   <option value="{{ $categorydetails->mc_id }}">{{ $categorydetails->mc_name }} </option>
           				   @endforeach
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_IMAGE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE')}} @endif <span class="text-sub">*</span></label>
					<span class="errortext red logo-size" style="color:red"><em>@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_IMAGE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_IMAGE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_IMAGE')}} @endif</em></span>
                   <div class="col-lg-8">

				   {{ Form::file('file', array('id' => 'blog_img')) }}
		   
		 
							
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                    <!-- Select a snapshot (png,jpg,jpeg less than 1M).-->
					
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_META_TITLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_META_TITLE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_META_TITLE')}} @endif</label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="Enter Meta Title {{ $default_lang }}" id="text1" name="meta_title" value="{!! Input::old('meta_title') !!}" >
                    </div>
              </div>
				
				 @if(!empty($get_active_lang))  
				@foreach($get_active_lang as $get_lang) 
				<?php 
				$get_lang_name = $get_lang->lang_name;
				?>
				<div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Meta Title({{ $get_lang_name }})</label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="Enter Meta Title In {{ $get_lang_name }}" id="text1" name="meta_title_{{ $get_lang_name }}" value="{!! Input::old('meta_title_'.$get_lang_name) !!}" >
                    </div>
                </div>
				
				@endforeach
				@endif
				
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_META_DESCRIPTION')}} @endif </label>

                    <div class="col-lg-8">
                       <textarea id="text4" class="form-control" placeholder="Enter Meta Description {{ $default_lang }}" name="meta_description"   >{!! Input::old('meta_description') !!}</textarea>
                    </div>
                </div>
				 @if(!empty($get_active_lang))  
				@foreach($get_active_lang as $get_lang) 
				<?php 
				$get_lang_name = $get_lang->lang_name;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta Description({{ $get_lang_name }})</label>

                    <div class="col-lg-8">
                       <textarea id="text4" class="form-control" placeholder="Enter Meta Description in {{ $get_lang_name }}" name="meta_description_{{ $get_lang_name }}"   >{!! Input::old('meta_description_'.$get_lang_name) !!}</textarea>
                    </div>
                </div>
				@endforeach
				@endif
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_META_KEYWORDS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_META_KEYWORDS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_META_KEYWORDS')}} @endif</label>

                    <div class="col-lg-8">
                       <input type="text" id="text1" placeholder="Enter Meta Keywords {{ $default_lang }}" class="form-control" name="meta_keywords" value="{!! Input::old('meta_keywords') !!}" >
                    </div>
                </div>
				
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				<?php $get_lang_name = $get_lang->lang_name;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta Keyword({{$get_lang_name}})</label>

                    <div class="col-lg-8">
                       <input type="text" id="text1" placeholder="Enter Meta Keywords In {{ $get_lang_name }}" class="form-control" name="meta_keywords_{{ $get_lang_name }}" value="{!! Input::old('meta_keywords_'.$get_lang_name) !!}" >
                    </div>
                </div>
				
				@endforeach
				@endif
				
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TAGS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TAGS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TAGS')}} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('tags', Input::old('tags') , array('id' => 'text1',  'placeholder' =>'Enter Tags', 'class' => 'form-control')) }}
                       
                    </div>
                </div>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ALLOW_COMMENTS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ALLOW_COMMENTS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ALLOW_COMMENTS')}} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="checkbox" checked="" value="1" name="allow_comments" value="{!! Input::old('allow_comments') !!}" >
                    </div>
                </div>
				<div class="form-group">
                    <label for="text2" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_STATUS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_STATUS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_STATUS')}} @endif<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
					           <input type="radio" name="blogstatus" checked="checked" title="Active" value="1"> <label class="sample">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PUBLISH')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PUBLISH')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PUBLISH')}} @endif                                                      </label>
					<input type="radio" name="blogstatus" checked="checked" title="Active" value="2"> <label class="sample">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DRAFT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DRAFT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DRAFT')}} @endif	                                                                                   </label>
						<label class="sample"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SUBMIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SUBMIT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBMIT')}} @endif</button>
                     <button type="reset" class="btn btn-danger btn-sm btn-grad" style="color:#ffffff"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RESET')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET')}} @endif</button>
                   
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

 
       <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

         <!-- PAGE LEVEL SCRIPTS -->
     <script src="{{ url('') }}/public/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ url('') }}public/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="{{ url('') }}/public/assets/js/editorInit.js"></script>
    <script>
       // $(function () { formWysiwyg(); });
	   $(document).ready(function () {
	$('.wysihtml5').wysihtml5();
});
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
