<!DOCTYPE html>
<!--[if IE 8]> 
<html lang="en" class="ie8">
   <![endif]-->
   <!--[if IE 9]> 
   <html lang="en" class="ie9">
      <![endif]-->
      <!--[if !IE]><!--> 
      <html lang="en">
         <!--<![endif]-->
         <!-- BEGIN HEAD -->
         <head>
            <meta charset="UTF-8" />
            <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CATEGORY_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_CATEGORY_BANNER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CATEGORY_BANNER') }}</title>
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
                              <li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') :trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                              <li class="active"><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CATEGORY_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_CATEGORY_BANNER'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CATEGORY_BANNER') }} </a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="box dark">
                              <header>
                                 <div class="icons"><i class="icon-edit"></i></div>
                                 <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CATEGORY_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_CATEGORY_BANNER'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CATEGORY_BANNER') }}  <label style="color:#f00">  [ {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MOBILE_USE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MOBILE_USE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MOBILE_USE') }} ]</label></h5>
                              </header>
                              @if ($errors->any())
                              <br>
                              <ul style="color:red;">
                                 <div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
                                    {{ Form::button('x',['class' => 'close', 'data-dismiss' => 'alert', 'aria-hidden' => 'true']) }}
                                 </div>
                              </ul>
                              @endif
                              @if (Session::has('message'))
                              <div class="alert alert-info alert-dismissable">
                                 {{ Form::button('x',['class' => 'close', 'data-dismiss' => 'alert', 'aria-hidden' => 'true']) }}{!! Session::get('message') !!}
                              </div>
                              @endif
                              <div id="div-1" class="accordion-body collapse in body">
                                 {!! Form::open(array('url'=>'add_categorybanner_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'files'=>'true', 'accept-charset' => 'UTF-8')) !!}
                                 <div class="form-group">
                                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MAIN_CATEGORY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MAIN_CATEGORY')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_MAIN_CATEGORY') }} <span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <select class="form-control" id="subcategory" name="subcategory">
                                          @if(count($subcategory)>0)
                                          <option value="0">--- {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SELECT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT') }} ---</option>
                                          @else
                                          <option value="0">--- {{ (Lang::has(Session::get('admin_lang_file').'.BACK_NO_DATAS_AVAILABLE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_NO_DATAS_AVAILABLE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_NO_DATAS_AVAILABLE') }} ---</option>
                                          @endif
                                          @foreach($subcategory as $subcat)  
                                          <option value="{{ $subcat->smc_id }}">{{ $subcat->smc_name }} </option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div id="error_msg"  style="color:#F00;font-weight:800"> </div>
                                 <div class="form-group">
                                    <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BANNER_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BANNER_IMAGE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_BANNER_IMAGE') }} <span class="text-sub">*</span><br>({{  (Lang::has(Session::get('admin_lang_file').'.BACK_MAXIMUM')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_MAXIMUM') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MAXIMUM') }}
                                    </label>
                                    <div class="col-lg-8" id="img_upload">
                                       <span class="errortext red" style="color:red"><em>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE')}} {{ $CATEGORY_BANNER_WIDTH }} x {{  $CATEGORY_BANNER_HEIGHT }} @if (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PIXELS') }} @endif</em></span>
                                       <div style="display: block; overflow: hidden;">
                                          <input type="file" id='file1' name="file[]" value="" onchange="imgSizeValidate(1);" required/>
                                          <a href="javascript:void(0);"  title="Add field" class="chose-file-add" ><span id="add_button" style="cursor:pointer;width:84px;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD')  :  trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD') }}</span></a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>
                                    <div class="col-lg-8">
                                       <button class="btn btn-success btn-sm btn-grad" id="submit_product" type="submit"><a style="color:#fff"  >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_BANNER') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_BANNER') }}</a></button>
                                       <button type="reset" class="btn btn-danger btn-sm btn-grad" style="color:#ffffff">{{  (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button>
                                    </div>
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
            <script type="text/javascript">
               $(document).ready(function(){
                   var maxField = 3; //Input fields increment limitation
                   var addButton = $('#add_button'); //Add button selector
                   var wrapper = $('#img_upload'); //Input field wrapper //div
                   
                   var x = 1; //Initial field counter is 1
               
                
                   $(addButton).click(function(){ //Once add button is clicked
                       if(x < maxField){ //Check maximum number of input fields
               
                          
                           x++; //Increment field counter
               
                            var fieldHTML = '<div style="display:block; width: auto; margin-top:15px;clear:both"><input type="file" name="file[]" value="" id="file'+x+'" required onchange="imgSizeValidate('+x+');" /><div id="remove_button"><a href="javascript:void(0);"  title="Remove field" style="color:#ffffff;">Remove</a></div></div>'; //New input field html 
               
                           $(wrapper).append(fieldHTML); // Add field html
                       }
                   });
                   $(wrapper).on('click', '#remove_button', function(e){ //Once remove button is clicked
                       e.preventDefault();
                       $(this).parent('div').remove(); //Remove field html
                       x--; //Decrement field counter
                   });
               });
               
            </script>
            <script type="text/javascript">
               /* on file upload - check for image size*/
                  function imgSizeValidate(i){
                   //var img_count = $("#count").val();
                          //Get reference of FileUpload.
               
                           // var i;
                           //for (i = 0; i <=img_count; i++) {
                             var fileUpload = document.getElementById("file"+i);
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
                       if (width < 250 || height < 200) {
                       //alert("Image Height and Width should have 250 * 200 px.");
                       fileUpload.value='';
               
                       return false;
                       }
                      // alert("Uploaded image has valid Height and Width.");
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
                       }*/
               }
               
               /* on file upload ends */
               
            </script>
            <script>
               function isNumberKey(evt){
                     
                        var charCode = (evt.which) ? evt.which : event.keyCode        
                        if (charCode > 31 && (charCode < 48 || charCode > 57))
                           return false;
                         else{ return true; }
                     }
               
                $( document ).ready(function() {
               
                        var subcategory      = $('#subcategory');
                        var file             = $('#file');
               
                       $('#submit_product').click(function() {
                            //validation for subcategory
                    if(subcategory.val() == 0)
                    {
                        subcategory.css('border', '1px solid red'); 
                        $('#error_msg').html('Please Select category');
                        subcategory.focus();
                        return false;
                    }
                    else
                    {
                    subcategory.css('border', ''); 
                    $('#error_msg').html('');
                    }
                    
                    
                }); 
               });
                
            </script>
            <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
            <!-- END GLOBAL SCRIPTS
               <script src="<?php //echo url('')?>/public/assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
               <script src="<?php // echo url('')?>/public/assets/plugins/chosen/chosen.jquery.min.js"></script>
               <script src="<?php // echo url('')?>/public/assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
               <script src="<?php //echo url('')?>/public/assets/plugins/autosize/jquery.autosize.min.js"></script>
               <script src="<?php // echo url('')?>/public/assets/js/formsInit.js"></script>
               <script>
                  //  $(function () { formInit(); });
               </script>-->
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
            <!---Right Click Block Code---->
            <script language="javascript">
               /*document.onmousedown=disableclick;
               status="Cannot Access for this mode";
               function disableclick(event)
               {
                 if(event.button==2)
                  {
                    alert(status);
                    return false;    
                  }
               }*/
            </script>
            <!---F12 Block Code---->
            <script type='text/javascript'>
               /*$(document).keydown(function(event){
                   if(event.keyCode==123){
                   return false;
                  }
               else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
                     return false;  //Prevent from ctrl+shift+i
                  }
               });*/
            </script>
            <script type="text/javascript">
               $.ajaxSetup({
                   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
               });
            </script>
         </body>
         <!-- END BODY -->
      </html>