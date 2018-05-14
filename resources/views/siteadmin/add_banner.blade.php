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
            <title>{{  $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_BANNER_IMAGE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_ADD_BANNER_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_BANNER_IMAGE') }}</title>
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
            <link rel="stylesheet" href="public/assets/css/MoneAdmin.css" />
            <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                              <li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') :trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                              <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_BANNER_IMAGE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_ADD_BANNER_IMAGE'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_BANNER_IMAGE') }}</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="box dark">
                              <header>
                                 <div class="icons"><i class="icon-edit"></i></div>
                                 <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_BANNER_IMAGE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_ADD_BANNER_IMAGE'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_BANNER_IMAGE') }}</h5>
                              </header>
                              @if ($errors->any()) 
                              <div class="alert alert-warning alert-dismissable">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('
                                 <li>:message</li>
                                 ')) !!}
                              </div>
                              @endif
                              @if (Session::has('error'))
                              <div class="alert alert-warning alert-dismissable">
                                 {{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert' , 'aria-hidden' => 'true']) }}
                                 {!! Session::get('error') !!}
                              </div>
                              @endif
                              <div id="div-1" class="accordion-body collapse in body">
                                 {!! Form::open(array('url'=>'add_banner_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')) !!}
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_TITLE')!= '')   ? trans(Session::get('admin_lang_file').'.BACK_IMAGE_TITLE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_TITLE') }}<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input id="text1" maxlength="150" placeholder="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BANNER_TITLE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BANNER_TITLE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BANNER_TITLE') }} {{ $default_lang }}"  name="banner_title" value="{!!Input::old('banner_title')!!}" id="banner_title" class="form-control" type="text" required>
                                    </div>
                                 </div>
                                 @if(!empty($get_active_lang)) 
                                 @foreach($get_active_lang as $get_lang) 
                                 <?php $get_lang_name = $get_lang->lang_name;
                                    ?>
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-3">Image Title({{$get_lang_name}})<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input id="text1" maxlength="150" placeholder="Enter Image Title In {{ $get_lang_name }}"  name="banner_title_<?php echo $get_lang_name; ?>" value="{!!Input::old('banner_title_'.$get_lang_name)!!}" id="banner_title" class="form-control" type="text" required>
                                    </div>
                                 </div>
                                 @endforeach
                                 @endif
                                 <?php /*?>
                                 <div class="form-group">
                                    <label class="control-label col-lg-3" for="text1"> 
                                    <label class="sample"></label></label>
                                    <div class="col-lg-8">
                                       <input type="checkbox" id="inlineCheckbox1"  name="bn_type[0]" id="bn_type1" value="1" > <label class="sample"> Product                  </label>
                                       <input type="checkbox" id="inlineCheckbox1"  name="bn_type[1]" id="bn_type2" value="2"> <label class="sample"> Deal                  </label></label>
                                       <input type="checkbox" id="inlineCheckbox1"  name="bn_type[2]" id="bn_type3" value="3"> <label class="sample"> Auction                  </label></label>
                                    </div>
                                 </div>
                                 <?php */?>
                                 <div class="form-group">
                                    <label class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPLOAD_BANNER_IMAGE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_UPLOAD_BANNER_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPLOAD_BANNER_IMAGE') }}<span class="text-sub">*</span></label>
                                    <span class="errortext red logo-size" style="color:red"><em>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }}  870 x 350 {{(Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}</em></span>
                                    <div class="col-lg-8">
                                       <i>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BANNER_IMAGE_SIZE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BANNER_IMAGE_SIZE')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_BANNER_IMAGE_SIZE') }}</i>
                                       <input type="file"  name="file" id="bn_img" required/><br><span class="text-sub" id="err_img" ></span>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_REDIRECT_URL')!= '') ? trans(Session::get('admin_lang_file').'.BACK_REDIRECT_URL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_REDIRECT_URL') }}<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input type="url" name="banner_redirect_url" id="banner_redirect_url" class="form-control" value="{!!Input::old('banner_redirect_url')!!}"  placeholder="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_REDIRECT_URL')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_REDIRECT_URL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_REDIRECT_URL') }}" id="text1" required>
                                       <span class="text-sub">Example:http://www.google.com</span>
                                    </div>
                                 </div>
                                 <!--div class="form-group">
                                    <label class="control-label col-lg-3">Slider Position<span class="text-sub">*</span></label>
                                    
                                    <div class="col-lg-8">
                                        <select class="form-control slide_pos" name="slider_position" id="slider_position">
                                            <option value="">--Select--</option>
                                            <option value="1">Main Slider</option>
                                            <option value="2">Content-1</option>
                                            <option value="3">Content-2</option>
                                            <option value="4">Content-3</option>
                                        </select>
                                       
                                    </div>
                                    </div-->
                                 <div class="form-group">
                                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>
                                    <div class="col-lg-8">
                                       <input type="hidden" name="slider_position" id="slide_pos" value="1"/> 
                                       <button type='submit' class="btn btn-success btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUBMIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUBMIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBMIT') }}</button>
                                       <button type="reset" class="btn btn-danger btn-sm btn-grad" style="color:#ffffff;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }} </button>
                                    </div>
                                 </div>
                                 {!! Form::close() !!}
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
            <!-- END GLOBAL SCRIPTS -->   
            <!---F12 Block Code---->
            <script type='text/javascript'>
               $(document).ready(function(){
                   $(".slide_pos").change(function(){
                       var slide_id = $(this).val();
                    if(slide_id==1){
                    $('#err_img').html('<span class="errortext red"><em>image size must be  870 x 350 pixels</em></span>');
                    }
                    else{
                    $('#err_img').html('<span class="errortext red"><em>image size must be  380 x 250 pixels</em></span>'); 
                    }   
                
                   });
               });
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