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
            <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CUSTOMER')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_ADD_CUSTOMER'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CUSTOMER')}} </title>
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
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/plan.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
            @php $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp
            @if(count($favi)>0)  
            @foreach($favi as $fav) @endforeach
            <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
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
                              <li class=""><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }} @endif</a></li>
                              <li class="active"><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CUSTOMER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_CUSTOMER') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CUSTOMER') }} @endif</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="box dark">
                              <header>
                                 <div class="icons"><i class="icon-edit"></i></div>
                                 <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CUSTOMER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_CUSTOMER') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CUSTOMER') }} @endif</h5>
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
                              <div class="row">
                                 <div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                                    {!! Form::open(array('url'=>'add_customer_submit','class'=>'form-horizontal')) !!}
                                    <div class="panel panel-default">
                                       <div class="panel-heading">
                                          @if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CUSTOMER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_CUSTOMER') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CUSTOMER') }} @endif
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NAME') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NAME') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <input type="text" class="form-control" maxlength="50" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_CUSTOMER_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_CUSTOMER_NAME') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_CUSTOMER_NAME') }} @endif" id="customer_first_name" name="customer_first_name" value="{!! Input::old('customer_first_name') !!}">
                                                <div id="name_error_msg"  style="color:#F00;font-weight:800" maxlength="100"> </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EMAIL') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <input type="email" class="form-control" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_EMAIL_ID')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_EMAIL_ID') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_EMAIL_ID') }} @endif" id="customer_Email" name="customer_Email" value="{!! Input::old('customer_Email') !!}" onChange="check();" maxlength="100">
                                                <div id="email_error_msg"  style="color:#F00;font-weight:800"> </div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.SELECT_ROLE')!= '') {{  trans(Session::get('admin_lang_file').'.SELECT_ROLE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.SELECT_ROLE') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <select required class="form-control" name="select_role" id="select_role" value="{!! Input::old('select_role') !!}" >
                                                   <option value="">-- @if (Lang::has(Session::get('admin_lang_file').'.SELECT_ROLE')!= '') {{ trans(Session::get('admin_lang_file').'.SELECT_ROLE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.SELECT_ROLE') }} @endif --</option>

                                                   @foreach($roles as $role)
                                                      <option value="{{$role->role_id}}" <?php if(Input::old('select_role')==$role->role_id){ echo "selected";}?>>{{$role->name}}</option>
                                                   @endforeach
                                                </select>
                                                <div id="select_role"  style="color:#F00;font-weight:800"> </div>
                                             </div>
                                          </div>
                                       </div>

                                       <input type="hidden" name="exist" id="exist" value="">
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PHONE')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_PHONE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PHONE') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <input type="text" maxlength="16" class="form-control" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_CONTACT_NUMBER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_CONTACT_NUMBER') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_CONTACT_NUMBER') }} @endif" id="customer_phone"  name="customer_phone" value="{!! Input::old('customer_phone') !!}" maxlength="50">
                                                <div id="phone_error_msg"  style="color:#F00;font-weight:800"> </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PASSWORD')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PASSWORD') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PASSWORD') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <input type="password" class="form-control" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_PASSWORD')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_PASSWORD') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_PASSWORD') }} @endif" id="customer_password"  maxlength="100" name="customer_password" value="{!! Input::old('customer_password') !!}">
                                                <div id="password_error_msg"  style="color:#F00;font-weight:800"> </div>
                                                <div id="password_error_msg_length"  style="color:#F00;font-weight:800"> </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS1')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADDRESS1') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS1') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <input type="text" class="form-control" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_ADDRESS_ONE')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_ENTER_ADDRESS_ONE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_ADDRESS_ONE') }} @endif" id="customer_address1" name="customer_address1" value="{!! Input::old('customer_address1') !!}" maxlength="150">
                                                <div id="addr_one_error_msg"  style="color:#F00;font-weight:800"> </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS2')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADDRESS2') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS2') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <input type="text" class="form-control" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_ADDRESS_TWO')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_ADDRESS_TWO') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_ADDRESS_TWO') }} @endif" id="customer_address2" name="customer_address2" value="{!! Input::old('customer_address2') !!}" maxlength="150">
                                                <div id="addr_two_error_msg"  style="color:#F00;font-weight:800"> </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_COUNTRY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_COUNTRY') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_COUNTRY') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <select class="form-control" name="select_customer_country" id="select_customer_country" value="{!! Input::old('select_customer_country') !!}"  onChange="select_city_ajax(this.value)" >
                                                   <option value="0">-- @if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_COUNTRY')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_SELECT_COUNTRY') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_COUNTRY') }} @endif --</option>
                                                   @foreach($countryresult as $countrydetails)
                                                   @if (Input::old('select_customer_country') == $countrydetails->co_id)
                                                   <option value="{{ $countrydetails->co_id }}" selected>{{ $countrydetails->co_name }}</option>
                                                   @else
                                                   <option value="<?php echo $countrydetails->co_id; ?>"
                                                      <?php if(Input::old('select_customer_country') == $countrydetails->co_id){echo "selected"; }?> >
                                                      <?php echo $countrydetails->co_name; ?>
                                                   </option>
                                                   @endif
                                                   @endforeach
                                                </select>
                                                <div id="country_error_msg"  style="color:#F00;font-weight:800"> </div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_CITY')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_SELECT_CITY') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_CITY') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <select class="form-control" id="select_customer_city" name="select_customer_city" value="{!! Input::old('select_customer_city') !!}">
                                                   <option value="0">-- @if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_CITY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_CITY') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_CITY') }} @endif --</option>
                                                </select>
                                                <?php /*
                                                   if(Input::old('select_customer_city')){
                                                       echo "dsfsdf";
                                                       
                                                     if(isset($city)){
                                                         print_r($city);
                                                         foreach($city as $city_data){ ?>
                                                <select class="form-control" id="select_customer_city" name="select_customer_city" value="{!! Input::old('select_customer_city') !!}">
                                                <option value="<?php echo $city_data->ci_id;?>"
                                                   <?php if(($city_data->ci_id)==(Input::old('select_customer_city'))){ echo "selected";}?>
                                                   >
                                                   <?php echo $city_data->ci_name;?>
                                                </option>
                                                <select>
                                                <?php
                                                   }
                                                   }
                                                   }*/?>
                                                <div id="city_error_msg"  style="color:#F00;font-weight:800"> </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-3" for="pass1"><span class="text-sub"></span></label>
                                             <div class="col-lg-8">
                                                <button class="btn btn-warning btn-sm btn-grad" id="submit_customer"><a style="color:#fff" >@if (Lang::has(Session::get('admin_lang_file').'.BACK_SUBMIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SUBMIT') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBMIT') }} @endif</a></button>
                                                <button type="reset" class="btn btn-danger btn-sm btn-grad">@if (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RESET') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }} @endif</button>
                                             </div>
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
               </div>
               <!--END PAGE CONTENT -->
            </div>
            <!--END MAIN WRAPPER -->
            <!-- FOOTER -->
            {!! $adminfooter !!}
            <!--END FOOTER -->
            <!-- GLOBAL SCRIPTS -->
            <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
            <script  type="text/javascript">
               function check(){
               
               var email_id   = $('#customer_Email').val();
               var passdata   = "email_id="+email_id;
               $.ajax( {
                    type: 'get',
                 data: passdata,
                 url: 'check_cus_email_exist',
                 success: function(responseText){  
                       //alert(responseText);
                  if(responseText==1){     //already exist
                  
                  $("#exist").val("1"); //already exist
                  $('#customer_Email').css('border', '1px solid red'); 
                  $('#email_error_msg').html('Email Id Already Exists');    
                       $('#customer_Email').focus();
                  return false;          
                  }else if(responseText==0){
                  $("#exist").val("0");
                       $('#customer_Email').css('border', ''); 
                  $('#email_error_msg').html('');   
                              }
                              //alert(responseText);
               }    
               });  
                }
               /*Form Validation*/
               $(document).ready(function() {
               
               
               });
               
               $(document).ready(function() {
               
               var customer_first_name     = $('#customer_first_name');
               var customer_Email       = $('#customer_Email');
               var customer_phone           = $('#customer_phone');
               var customer_password      = $('#customer_password');
               var customer_address_one   = $('#customer_address1');
               var customer_address_two    = $('#customer_address2');
               var select_customer_country = $('#select_customer_country');
               var select_customer_city    = $('#select_customer_city');
               
               /*Validating customer phone number*/
               $('#customer_phone').keydown(function (e) {
                   if (e.shiftKey || e.ctrlKey || e.altKey) {
                       e.preventDefault();
                       //customer_phone.css('border', '1px solid red'); 
               $('#error_msg').html('Numbers Only Allowed');
               //customer_phone.focus();
               return false;
                   }else{
                       var key = e.keyCode;
                       if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                           e.preventDefault();
                           //customer_phone.css('border', '1px solid red'); 
                  $('#error_msg').html('Numbers Only Allowed');
                  //customer_phone.focus();
                  return false;
                       }
                   }
               });
               
               function ValidateEmail(email) {
                   var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                   return expr.test(email);
               };
               
               $('#submit_customer').click(function() {
               
                   /*Customer Name*/
               if($.trim(customer_first_name.val()) == ""){
               customer_first_name.css('border', '1px solid red'); 
               $('#name_error_msg').html('Please Enter Customer Name');
               customer_first_name.focus();
               //return false;
               }else{
               customer_first_name.css('border', ''); 
               $('#name_error_msg').html('');
               }
               
                   /*Customer Email Id*/
               if($.trim(customer_Email.val()) == ""){
               customer_Email.css('border', '1px solid red'); 
               $('#email_error_msg').html('Please Enter Customer Email Id');
               customer_Email.focus();
               return false;
               }else if (!ValidateEmail(customer_Email.val())) {
                       customer_Email.css('border', '1px solid red'); 
               $('#email_error_msg').html('Please Enter Valid Email Id');
               customer_Email.focus();
               return false;
                   }else{
                       customer_Email.css('border', ''); 
                       $('#email_error_msg').html('');    
                   }
                   
                   /*Email Id check*/
               if(($('#exist').val())==""){
               $('#email_error_msg').html('Please Enter Different Email-Id, This Id Already Exist');
               customer_Email.css('border', '1px solid red'); 
               customer_Email.focus();
               return false;
               }else if(($('#exist').val())==1){
               $('#email_error_msg').html('Please Enter Different Email-Id, This Id Already Exist');
               customer_Email.css('border', '1px solid red'); 
               customer_Email.focus();
               return false;
               }else{
               customer_Email.css('border', ''); 
               $('#email_error_msg').html('');
               }
               
                   /*Customer Phone Number*/
               if($.trim(customer_phone.val()) == ""){
               customer_phone.css('border', '1px solid red'); 
               $('#phone_error_msg').html('Please Enter Customer Phone Number');
               customer_phone.focus();
               return false;
               }else{
               customer_phone.css('border', ''); 
               $('#phone_error_msg').html('');
               }
               /*Customer Password*/
               if($.trim(customer_password.val()) == ""){
               customer_password.css('border', '1px solid red'); 
               $('#password_error_msg').html('Please Enter password');
               customer_password.focus();
               return false;
               }else{
               customer_password.css('border', ''); 
               $('#password_error_msg').html('');
               }
               
               /*password length*/
               if($.trim(customer_password.val().length) < 6){
               customer_password.css('border', '1px solid red'); 
               $('#password_error_msg_length').html('Should be Minimum 6 characters');
               customer_password.focus();
               return false;
               }else{
               customer_password.css('border', ''); 
               $('#password_error_msg_length').html('');
               }
               
                   /*Customer Address one*/
               if($.trim(customer_address_one.val()) == ""){
               customer_address_one.css('border', '1px solid red'); 
               $('#addr_one_error_msg').html('Please Enter Customer Address one');
               customer_address_one.focus();
               return false;
               }else{
               customer_address_one.css('border', ''); 
               $('#addr_one_error_msg').html('');
               }
               
                    /*Customer Address two*/
               if($.trim(customer_address_two.val()) == ""){
               customer_address_two.css('border', '1px solid red'); 
               $('#addr_two_error_msg').html('Please Enter Customer Address two');
               customer_address_two.focus();
               return false;
               }else{
               customer_address_two.css('border', ''); 
               $('#addr_two_error_msg').html('');
               }
               
               
                   /*Country*/  
               if(select_customer_country.val() == 0){
               select_customer_country.css('border', '1px solid red'); 
               $('#country_error_msg').html('Please Select Country');
               select_customer_country.focus();
               return false;
               }else{
               select_customer_country.css('border', ''); 
               $('#country_error_msg').html('');
               }
               
                   /*City*/ 
               if(select_customer_city.val() == 0){
               select_customer_city.css('border', '1px solid red'); 
               $('#city_error_msg').html('Please Select City');
               select_customer_city.focus();
               return false;
               }else{
               select_customer_city.css('border', ''); 
               $('#city_error_msg').html('');
               }
               
                   $('#submit_customer').form();
                   
               });
               });
            </script>
            <script type="text/javascript">
               $.ajaxSetup({
                   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
               });
            </script>
            <script>
               function select_city_ajax(city_id)
                {
                  var passData = 'city_id='+city_id;
                  //alert(passData);
                    $.ajax( {
                        type: 'get',
                     data: passData,
                     url: '<?php echo url('ajax_select_city'); ?>',
                     success: function(responseText){  
                    // alert(responseText);
                      if(responseText)
                      { 
                    $('#select_customer_city').html(responseText);        
                      }
                   }  
                  });  
                }
               
                $('#customer_first_name').bind('keyup blur',function(){ 
                   var node = $(this);
                   node.val(node.val().replace(/[^a-z 0-9 A-Z_]/g,'') ); }
               );
               
                $( document ).ready(function() {
                 
                 
                      $.ajax( {
                           type: 'get',
                        data: {'city_id_ajax':'<?php echo Input::old('select_customer_city'); ?>','country_id_ajax':'<?php echo Input::old('select_customer_country'); ?>'},
                        url: '<?php echo url('ajax_select_city_edit'); ?>',
                        success: function(responseText){  
                          if(responseText)
                          { 
                              
                         $('#select_customer_city').html(responseText);             
                          }
                       }   
                     }); 
               
               });
            </script>
            <script src="{{ url('')}}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
            <!-- END GLOBAL SCRIPTS -->   
            <!---F12 Block Code---->
            <script type='text/javascript'>
               /*
               $(document).keydown(function(event){
                   if(event.keyCode==123){
                   return false;
                  }
               else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
                     return false;  //Prevent from ctrl+shift+i
                  }
               });*/
               
               
               
            </script>
         </body>
         <!-- END BODY -->
      </html>