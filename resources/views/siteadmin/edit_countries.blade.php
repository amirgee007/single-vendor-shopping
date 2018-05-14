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
            <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_COUNTRY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_COUNTRY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_COUNTRY') }}</title>
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
            @php  
            $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
            <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
            @endif    
            <link rel="stylesheet" href="{{ url('')}}/public/assets/css/MoneAdmin.css" />
            <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                              <li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ? trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                              <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_COUNTRY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_COUNTRY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_COUNTRY') }}</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="box dark">
                              <header>
                                 <div class="icons"><i class="icon-edit"></i></div>
                                 <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_COUNTRY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_COUNTRY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_COUNTRY') }}</h5>
                              </header>
                              @if ($errors->any())
                              <br>
                              <ul style="color:red;">
                                 {!! implode('', $errors->all('
                                 <li>:message</li>
                                 ')) !!}
                              </ul>
                              @endif
                              @if (Session::has('message'))
                              <p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
                              @endif
                              <div id="div-1" class="accordion-body collapse in body">
                                 @foreach ($countryresult as $info) 
                                 {!! Form::open(array('url'=>'update_country_submit','class'=>'form-horizontal', 'accept-charset' => 'UTF-8')) !!}
                                 {!! Form::hidden('id',$id) !!}
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COUNTRY_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY_NAME')}}<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input  placeholder="Enter Country Name {{ $default_lang }}" id="ceditname" name="country_name" class="form-control" type="text" value="{{ $info->co_name }}" autocomplete="off" onkeyup="validate();">
                                       <div id="suggesstion-box" ><span id="no_country"> </span></div>
                                    </div>
                                 </div>
                                 @if(!empty($get_active_lang)) 
                                 @foreach($get_active_lang as $get_lang) 
                                 @php 
                                 $get_lang_name = $get_lang->lang_name;
                                 $get_lang_code = $get_lang->lang_code;
                                 $contry_name_dynamic = 'co_name_'.$get_lang_code;
                                 @endphp
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">Country Name({{ $get_lang_name }})<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input placeholder="Enter Country Name In {{ $get_lang_name }}" id="country_name_<?php echo $get_lang_name; ?>" name="country_name_{{ $get_lang_name }}" class="form-control" type="text" value="{{ $info->$contry_name_dynamic }}">
                                       <div id="suggesstion-box" ><span id="no_country"> </span></div>
                                    </div>
                                 </div>
                                 @endforeach
                                 @endif
                                 <div class="form-group">
                                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY_CODE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_COUNTRY_CODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY_CODE')}}<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       {!! Form::text('ceditcode',$info->co_code,array('id' => 'ceditcode','class' => 'form-control','readonly' )) !!}
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    {!! Html::decode(Form::label('','<span class="text-sub"></span>',array('class' => 'control-label col-lg-2') )) !!}
                                    <div class="col-lg-8">
                                       <p><?php /** if (Lang::has(Session::get('admin_lang_file').'.BACK_EXAMPLE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EXAMPLE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EXAMPLE');} ?>:AL,AX, <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ETC')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ETC');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ETC');} .. **/?> </p>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CURRENCY_SYMBOL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CURRENCY_SYMBOL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CURRENCY_SYMBOL') }}<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       {!! Form::text('cureditsymbol',$info->co_cursymbol,array('id' => 'cureditsymbol','class' => 'form-control','readonly' )) !!}
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    {!! Html::decode(Form::label('','<span class="text-sub"></span>',array('class' => 'control-label col-lg-2') )) !!}
                                    <div class="col-lg-8">
                                       <p><?php /** if (Lang::has(Session::get('admin_lang_file').'.BACK_EXAMPLE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EXAMPLE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EXAMPLE');} ?>: $,₳,<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ETC')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ETC');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ETC');} ... **/?></p>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CURRENCY_CODE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_CURRENCY_CODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CURRENCY_CODE') }}<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       {!! Form::text('cureditcode',$info->co_curcode,array('id' => 'cureditcode','class' => 'form-control','readonly' )) !!}
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    {!! Html::decode(Form::label('','<span class="text-sub"></span>',array('class' => 'control-label col-lg-2') )) !!}
                                    <div class="col-lg-8">
                                       <p><?php /** if (Lang::has(Session::get('admin_lang_file').'.BACK_EXAMPLE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EXAMPLE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EXAMPLE');} ?>: USD,EUR,SAR,<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ETC')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ETC');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ETC');} ... **/?></p>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    {!! Html::decode(Form::label('','<span class="text-sub"></span>',array('class' => 'control-label col-lg-2','for' => 'pass1') )) !!}
                                    <div class="col-lg-8">
                                       <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                                       <a href="{{ url('manage_country') }}" class="btn btn-default btn-sm btn-grad" style="color:#000">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CANCEL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL') }}</a>
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
               $.ajaxSetup({
                   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
               });
            </script>
            <script type="text/javascript">
               $('#ceditname').keyup(function()
               {
               
                 $('#ceditcode').val('');
                 $('#cureditsymbol').val('');
                 $('#cureditcode').val('');
               
                 
                 var aj = this.value;
                 if(aj==''){
                   return;
                 }
                 
                 $.ajax({
                   type: 'get',
                   url: '<?php echo url('array_search_country');?>',
                   data: {searched_country: aj},
                   success: function(response){
                     //alert(response);
                     myContent=response;
                     
                     result=$(myContent).text();
                     
                     if($.trim(result)==''){
               
               
                       $("#suggesstion-box").show();
                        $("#suggesstion-box").text("No country found!");
                     }
               
                    // alert(response);
                     $("#suggesstion-box").show();
                     $("#suggesstion-box").html(response);
                     $("#ceditname").css("background","#FFF");
               
                   }
                 });
               });
               
               function selectCountry(val) {
               
               $("#ceditname").val(val);
               $("#suggesstion-box").hide();
               var searched_country_name=val;
               
               $.ajax({
                   type: 'get',
                   url: '<?php echo url('add_searched_country');?>',
                   data: {searched_country_name: searched_country_name},
                  
                   success: function(response){
                     //alert(response);
                     id_numbers = response.split('||');
                    var Country_code=id_numbers[0];
                    var Country_name=id_numbers[1];
                    var currency_symbol=id_numbers[2];
                    var currency_code=id_numbers[3];
               
               
                    $('#ceditcode').val(Country_code);
                    $('#cureditsymbol').val(currency_symbol);
                    $('#cureditcode').val(currency_code);
                    
               
                   }
                 }); 
               }
               
               
               $('#ceditname').bind('keyup blur',function(){ 
               var node = $(this);
               node.val(node.val().replace(/[^a-z]/g,'') ); }
               );
               
               
            </script>
            <script type="text/javascript">
               function validate() {
                var element = document.getElementById('city_name');
                element.value = element.value.replace(/[^a-zA-Z]+/,'');
               }
            </script>
         </body>
         <!-- END BODY -->
      </html>