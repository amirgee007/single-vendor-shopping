<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SUB_CATEGORY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_SUB_CATEGORY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SUB_CATEGORY') }}</title>
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
                            	<li class=""><a href="#">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a href="#">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SUB_CATEGORY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_SUB_CATEGORY')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SUB_CATEGORY') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SUB_CATEGORY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_SUB_CATEGORY')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SUB_CATEGORY') }}</h5>
            
        </header>
         @if ($errors->any()) 
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
        @if (Session::has('error'))
        <div id="data" class="alert alert-warning alert-dismissable">
	{{ Form::button('×',['class' => 'close','data-dismiss'=>'alert','aria-hidden' => 'true']) }}{!! Session::get('error') !!}</div>
        @endif
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'add_sub_category_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')) !!}
				@foreach($add_sub_catg_details as $add_sub_catg_det)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MAIN_CATEGORY_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MAIN_CATEGORY_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MAIN_CATEGORY_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('catg_name',$add_sub_catg_det->smc_name,['class' => 'form-control','id'=>'catg_name','readonly']) }}
                       
					   {{ Form::hidden('catg_id',$add_sub_catg_det->smc_id,['id'=>'catg_id']) }}
					   {{ Form::hidden('main_catg_id',$add_sub_catg_det->smc_mc_id,['id'=>'main_catg_id']) }}
                        
                         
                    </div>
                </div>
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUB_CATEGORY_NAME')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_SUB_CATEGORY_NAME') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SUB_CATEGORY_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="main_catg_name" placeholder="Enter Sub category {{ $default_lang }}" name="main_catg_name" class="form-control" value="{!!Input::old('main_catg_name')!!}" type="text">
                    </div>
                </div>
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				<?php $get_lang_name = $get_lang->lang_name;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Sub category({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="main_catg_name_{{ $get_lang_name }}" placeholder="Enter Sub category In {{ $get_lang_name }}" name="main_catg_name_{{ $get_lang_name }}" class="form-control" value="{!!Input::old('main_catg_name_'.$get_lang_name)!!}" type="text">
                    </div>
                </div>
				@endforeach
				@endif

                <div class="form-group">
                    <label class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_LISTING_SEC_SUBCATEGORY_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_LISTING_SEC_SUBCATEGORY_IMAGE')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_LISTING_SEC_SUBCATEGORY_IMAGE') }}<span class="text-sub">*</span></label>
					<span class="errortext red" style="color:red"><em>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }} {{ $SUB_CATEGORY_WIDTH }} x {{ $SUB_CATEGORY_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}</em></span>
                    <div class="col-lg-8">
                    <input type="file" name="image" id="file" onchange="Upload(this.id);" />
						
					 <label id="file_valid_error" style="color:#f00;display:none;" class="error">Image Pixel size must be in 200 width and 200 height</label>
					 <label id="file_type_error" style="color:#f00;display:none;" class="error"> Please select a valid Image file (jpg,gif,png,jpeg)</label>
                        <br>
                    </div>
                </div>


               <div class="form-group">
                    <label class="control-label col-lg-3" for="text1"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CATEGORY_STATUS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CATEGORY_STATUS') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_CATEGORY_STATUS') }}
					 <label class="sample"></label></label>

                    <div class="col-lg-8">
					           <input type="radio" value="1" title="Active" checked="checked" name="catg_status"> <label class="sample">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ACTIVE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_ACTIVE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIVE') }}                  </label>
					<input type="radio" value="0" title="Active"  name="catg_status"> <label class="sample">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DEACTIVE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_DEACTIVE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DEACTIVE') }}                  </label></label>
						<label class="sample"></label></label>
                    </div>
                </div>
				   
				@endforeach
                

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUBMIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUBMIT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBMIT') }}</button>
                     
                     <button type="reset" class="btn btn-danger btn-sm btn-grad" style="color:#ffffff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_RESET') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button>
                    
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

    <script type="text/javascript">

    /* on file upload - check for image size*/
      /*  function imgSizeValidate(){
        //var img_count = $("#count").val();
               //Get reference of FileUpload.

                // var i;
                //for (i = 0; i <=img_count; i++) {
                  var fileUpload = document.getElementById("file");
                //}

                //Check whether the file is valid Image.
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.gif)$");
            //if (regex.test(fileUpload.value.toLowerCase())) {
            //Check whether HTML5 is supported.
            //if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
            //Initiate the JavaScript Image object.
            var image = new Image();
            //Set the Base64 string return from FileReader as source.
            image.src = e.target.result;
            //Validate the File Height and Width.
            image.onload = function () {
            var height = this.height;
            var width = this.width;
            if (width < 200 || height < 200) {
                alert("Image Height and Width should have 200 * 200 px.");
                fileUpload.value='';

                return false;
            }
            if (width != height) {
                alert("Please Choose Square Images (equal width & height) to Upload.");
                fileUpload.value='';

                return false;
            }
            alert("Uploaded image has valid Height and Width.");
            return true;
            };
            }
            //} else {
            //alert("This browser does not support HTML5.");
            //return false;
            //}
            /*} else {
            alert("Please select a valid Image file.");
            return false;
            }*/ /*
    } */

    /* on file upload ends */
	
</script>

<script>
function Upload(files) {
   
    var fileUpload = document.getElementById("file");

    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif|.jpeg)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
 
        if (typeof (fileUpload.files) != "undefined") {
            
            var reader = new FileReader();

            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
               
                var image = new Image();
                image.src = e.target.result;
                       
                image.onload = function () {
                    var height = this.height; 
                    var width = this.width; 
                    if (height != 200 || width != 200) {
                       // alert("Height and Width must be 272PX X 272PX.");
						document.getElementById("file_valid_error").style.display = "inline";
						$("#file_valid_error").fadeOut(5000);
						$("#file").val('');
						$("#file").focus();
                        return false;
                    } 
                    return true;
                };
            }
        } else {
            alert("This browser does not support HTML5.");
			$("#file").val('');
            return false;
        }
    } else {
       // alert("Please select a valid Image file.");
		document.getElementById("file_type_error").style.display = "inline";
		$("#file_type_error").fadeOut(5000);
		$("#file").val('');
		$("#file").focus();
        return false;
    }
}
</script>


</body>
     <!-- END BODY -->
</html>
