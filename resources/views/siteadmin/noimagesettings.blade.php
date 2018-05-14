
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_NO_IMAGE_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_NO_IMAGE_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO_IMAGE_SETTINGS') }}</title>
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
     @php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif		
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
           {!!$adminheader!!}
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
         {!!$adminleftmenus!!}
        <!--END MENU SECTION -->

		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') :trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_NO_IMAGE_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_NO_IMAGE_SETTINGS')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO_IMAGE_SETTINGS') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_NO_IMAGE_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_NO_IMAGE_SETTINGS')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO_IMAGE_SETTINGS') }}</h5>
            
        </header>
		@if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
		
		{{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert' , 'aria-hidden' => 'true']) }}
        
        </div>
		</ul>	
		@endif
        <div id="div-1" class="accordion-body collapse in body">
            @if (Session::has('message'))
		
			<div class="alert alert-success alert-dismissable">{!! Session::get('message') !!}
			{{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert' , 'aria-hidden' => 'true']) }}
	        
	        </div>
			@endif
          {!! Form::open(array('url'=>'add_noimage_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}

          
          @if(count($max_file_count)>0)
		@php  	$max_fileCount = $max_file_count->max_file_count; @endphp
		  @else
		@php 	$max_fileCount = 10; @endphp
          @endif 
          	@if(count($noimagedetails) > 0)
				@foreach($noimagedetails as $noimage)
					@if($noimage->imgs_type>2 && $noimage->imgs_type<= $max_fileCount && $noimage->imgs_name!='' ) 						
						<input type="hidden" placeholder=""  name="old_no_image[<?php echo $noimage->imgs_type ; ?>]"   id="old_no_image[<?php echo $noimage->imgs_type ; ?>]" value="{{ $noimage->imgs_name }}">
					@endif

				@endforeach		
			@endif

			
                <div class="form-group">
                    <label class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPLOAD_NO_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPLOAD_NO_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPLOAD_NO_IMAGE') }}<span class="text-sub">*</span></label>
					<span class="errortext red logo-size" style="color:red"><em>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }}  {{ $NO_IMAGE_WIDTH }} x {{  $NO_IMAGE_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}</em></span>
                    <div class="col-lg-8">
				{{ Form::file('noimgfile[3]', array('id' => 'noimgfile')) }}
                     {{ Form::hidden('width[3]',$NO_IMAGE_WIDTH, array('id' => 'width')) }}
                     {{ Form::hidden('height[3]',$NO_IMAGE_HEIGHT, array('id' => 'height')) }}
                     {{ Form::hidden('type[3]','3', array('id' => 'type')) }}
                     {{ Form::hidden('imagename[3]','No_image', array('id' => 'imagename')) }}
                      				  
					  <br>
									  
								@if($noimagedetails)
								@foreach($noimagedetails as $noimage)
									@if($noimage->imgs_type == 3) 
								<?php 	$imgpath="public/assets/noimage/".$noimage->imgs_name; ?>
								@endif
								@endforeach
								@endif
						
						 <img src="{{  $imgpath }}" height="40px" >
                    </div>
                </div>
				
				
				<div class="form-group">
                   <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CURRENT_NOIMAGE')!= '') ? '' : '' }} </label> 
				   

                </div>
				
				
				  <div class="form-group">
                    <label class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_IMAGE') }}<span class="text-sub">*</span></label>
					<span class="errortext red logo-size" style="color:red"><em>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }} {{ $PRODUCT_WIDTH }} x {{ $PRODUCT_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}</em></span>
                    <div class="col-lg-8">
					{{ Form::file('noimgfile[4]', array('id' => 'noimgfile')) }}
                     {{ Form::hidden('width[4]',$PRODUCT_WIDTH, array('id' => 'width')) }}
                     {{ Form::hidden('height[4]',$PRODUCT_HEIGHT, array('id' => 'height')) }}
                     {{ Form::hidden('type[4]','4', array('id' => 'type')) }}
                     {{ Form::hidden('imagename[4]','Product_image', array('id' => 'imagename')) }}
                     
					  <br>
					  <?php 			$imgpath_p="";	 ?>
						@if($noimagedetails)
						@foreach($noimagedetails as $noimage)
							@if($noimage->imgs_type == 4)  
						<?php 	$imgpath_p="public/assets/noimage/".$noimage->imgs_name; ?>
						@endif
						@endforeach
						@endif 

							
					 	
	                    
	                    <img src="{{ $imgpath_p }}"  height="40px" />
                    </div>
                </div>
				
				
				
				
				<div class="form-group">
                    <label class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DEAL_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_IMAGE') }}<span class="text-sub">*</span></label>
					<span class="errortext red logo-size" style="color:red"><em>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }}  {{ $DEAL_WIDTH }} x {{ $DEAL_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}</em></span>
                    <div class="col-lg-8">
				
				
				{{ Form::file('noimgfile[5]', array('id' => 'noimgfile')) }}
                     {{ Form::hidden('width[5]',$DEAL_WIDTH, array('id' => 'width')) }}
                     {{ Form::hidden('height[5]',$DEAL_HEIGHT, array('id' => 'height')) }}
                     {{ Form::hidden('type[5]','5', array('id' => 'type')) }}
                     {{ Form::hidden('imagename[5]','Deal_image', array('id' => 'imagename')) }}
				
                      
					   <br>
					   <?php 
						$imgpath_d=""; ?>
						@if($noimagedetails)
						@foreach($noimagedetails as $noimage)
							@if($noimage->imgs_type == 5)  
						<?php	$imgpath_d="public/assets/noimage/".$noimage->imgs_name; ?>
						@endif
						@endforeach
						@else
						@endif

						
						
		                
		                    <img src="{{ $imgpath_d }}" height="40px"/> 
                    </div>
                </div>
				
				
							
				
				<div class="form-group">
                    <label class="control-label col-lg-3">Blog {{ (Lang::has(Session::get('admin_lang_file').'.BACK_BANNER_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BANNER_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BANNER_IMAGE') }}<span class="text-sub">*</span></label>
					<span class="errortext red logo-size" style="color:red"><em>
					
					{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }}  {{ $BLOG_WIDTH }} x {{ $BLOG_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}
					
					</em></span>
                    <div class="col-lg-8">
				
					{{ Form::file('noimgfile[7]', array('id' => 'noimgfile')) }}
                     {{ Form::hidden('width[7]',$BLOG_WIDTH, array('id' => 'width')) }}
                     {{ Form::hidden('height[7]',$BLOG_HEIGHT, array('id' => 'height')) }}
                     {{ Form::hidden('type[7]','7', array('id' => 'type')) }}
                     {{ Form::hidden('imagename[7]','Blog_banner_image', array('id' => 'imagename')) }}
                      
					   <br>
                    <?php 
					$imgpath_bbi=""; ?>
					@if($noimagedetails)
					@foreach($noimagedetails as $noimage)
						@if($noimage->imgs_type == 7) 
						<?php $imgpath_bbi="public/assets/noimage/".$noimage->imgs_name;  ?>
					@endif
					@endforeach
					@endif
					
				
					
	                   
	                <img src="{{ $imgpath_bbi }}" height="40px" >
                    </div>
                   

                </div>
				
				
				
				
				<div class="form-group">
                    <label class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPLOAD_BANNER_IMAGE')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_UPLOAD_BANNER_IMAGE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_UPLOAD_BANNER_IMAGE') }}<span class="text-sub">*</span></label>
					<span class="errortext red logo-size" style="color:red"><em>
					{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }}  {{ $NO_IMAGE_WIDTH_BANNER }} x {{ $NO_IMAGE_HEIGHT_BANNER }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}
					</em></span>
                    <div class="col-lg-8">
					
					{{ Form::file('noimgfile[8]', array('id' => 'noimgfile')) }}
                     {{ Form::hidden('width[8]',$NO_IMAGE_WIDTH_BANNER, array('id' => 'width')) }}
                     {{ Form::hidden('height[8]',$NO_IMAGE_HEIGHT_BANNER, array('id' => 'height')) }}
                     {{ Form::hidden('type[8]','8', array('id' => 'type')) }}
                     {{ Form::hidden('imagename[8]','upload_banner_image', array('id' => 'imagename')) }}
                     <br>
					   
						@if($noimagedetails)
						@foreach($noimagedetails as $noimage)
							@if($noimage->imgs_type == 8)  
						<?php 	$imgpath_bi="public/assets/noimage/".$noimage->imgs_name; ?>
						@endif
					@endforeach
					@endif
						
						
		                <img src="{{ $imgpath_bi }}" height="40px" >
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CATEGORY_BANNER')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_ADD_CATEGORY_BANNER')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CATEGORY_BANNER') }}<span class="text-sub">*</span></label>
					<span class="errortext red logo-size" style="color:red"><em>
					
					{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }}  {{ $CATEGORY_BANNER_WIDTH }} x {{ $CATEGORY_BANNER_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}
					</em></span>
                    <div class="col-lg-8">
					
					{{ Form::file('noimgfile[9]', array('id' => 'noimgfile')) }}
                     {{ Form::hidden('width[9]',$CATEGORY_BANNER_WIDTH, array('id' => 'width')) }}
                     {{ Form::hidden('height[9]',$CATEGORY_BANNER_HEIGHT, array('id' => 'height')) }}
                     {{ Form::hidden('type[9]','9', array('id' => 'type')) }}
                     {{ Form::hidden('imagename[9]','category_banner_image', array('id' => 'imagename')) }}
                      
					  <?php 
						$imgpath_cat=""; ?>
						@if($noimagedetails)
						@foreach($noimagedetails as $noimage)
							@if($noimage->imgs_type == 9) 
							 <?php  $imgpath_cat="public/assets/noimage/".$noimage->imgs_name;  ?>
						@endif
					@endforeach
					@endif
						
						
						
		                    
		                    <img src="{{ $imgpath_cat }}" height="40px" >
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADS_ADD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADS_ADD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADS_ADD') }}<span class="text-sub">*</span></label>
					<span class="errortext red logo-size" style="color:red"><em>
					
					{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }}  {{ $ADS_WIDTH }} x {{ $ADS_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}
					</em></span>
                    <div class="col-lg-8">
											
				{{ Form::file('noimgfile[10]', array('id' => 'noimgfile')) }}
                     {{ Form::hidden('width[10]',$ADS_WIDTH, array('id' => 'width')) }}
                     {{ Form::hidden('height[10]',$ADS_HEIGHT, array('id' => 'height')) }}
                     {{ Form::hidden('type[10]','10', array('id' => 'type')) }}
                     {{ Form::hidden('imagename[10]','Blog_ads_image', array('id' => 'imagename')) }}
					
                      
					  <br>
					   
						@if($noimagedetails)
						@foreach($noimagedetails as $noimage)
							@if($noimage->imgs_type == 10) 
						<?php	$imgpath_bl="public/assets/noimage/".$noimage->imgs_name; ?>
						@endif
					@endforeach
					@endif
						
						
	                    <img src="{{ $imgpath_bl }}" height="40px">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CATEGORY_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CATEGORY_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CATEGORY_IMAGE') }}<span class="text-sub">*</span></label>
					<span class="errortext red logo-size" style="color:red"><em>
					
					{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }}  {{ $TOP_CATEGORY_WIDTH }} x {{ $TOP_CATEGORY_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}
					</em></span>
                    <div class="col-lg-8">
										

				{{ Form::file('noimgfile[11]', array('id' => 'noimgfile')) }}
                     {{ Form::hidden('width[11]',$TOP_CATEGORY_WIDTH, array('id' => 'width')) }}
                     {{ Form::hidden('height[11]',$TOP_CATEGORY_HEIGHT, array('id' => 'height')) }}
                     {{ Form::hidden('type[11]','11', array('id' => 'type')) }}
                     {{ Form::hidden('imagename[11]','category_image', array('id' => 'imagename')) }}										
							
                      
					  <br>
					  <?php 
					  	$imgpath_catImg  =''; ?>
						@if($noimagedetails)
						@foreach($noimagedetails as $noimage)
							@if($noimage->imgs_type == 11) 
						<?php 	$imgpath_catImg="public/assets/noimage/".$noimage->imgs_name; ?>
						@endif
					@endforeach
					@endif
			
	                    <img src="{{ $imgpath_catImg }}" height="40px" >
                    </div>
                </div>
				
				
				
				

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                    <button type="submit" class="btn btn-success btn-sm btn-grad " style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                     <button type="reset" class="btn btn-default btn-sm btn-grad" style="color:#000">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button>
                   
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
    <div id="footer">
        {!! $adminfooter !!}
    </div>
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
