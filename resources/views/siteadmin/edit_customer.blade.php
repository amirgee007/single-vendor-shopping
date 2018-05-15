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
            <title> {{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_CUSTOMER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_CUSTOMER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_CUSTOMER') }} </title>
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
            @php 
            $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get();  @endphp
            @if(count($favi)>0)  
            @foreach($favi as $fav) @endforeach
            <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
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
                              <li class="active"><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_CUSTOMER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT_CUSTOMER') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_CUSTOMER') }} @endif</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="box dark">
                              <header>
                                 <div class="icons"><i class="icon-edit"></i></div>
                                 <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_CUSTOMER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT_CUSTOMER') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_CUSTOMER') }} @endif</h5>
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
                                    @foreach($customerresult as $customer) @endforeach
                                    {!! Form::open(array('url'=>'edit_customer_submit','class'=>'form-horizontal')) !!}
                                    <input type="hidden" name="customer_edit_id" id="customer_edit_id" value="{{ $customer->cus_id }}" />
                                    <div class="panel panel-default">
                                       <div class="panel-heading">
                                          @if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_CUSTOMER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT_CUSTOMER') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_CUSTOMER') }} @endif
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_NAME')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_NAME') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NAME') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <input type="text" class="form-control" maxlength="50" placeholder="" name="customer_first_name"  id="customer_first_name" value="{{ $customer->cus_name }}">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EMAIL') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <input type="text" class="form-control" placeholder="" id="customer_Email"   name="customer_Email" value="<?php echo $customer->cus_email;?>" maxlength="100" onblur="check();" required>
                                             </div>
                                             <div id="email_error_msg"  style="color:#F00;font-weight:800"> </div>
                                          </div>
                                       </div>
                                       <input type="hidden" name="exist" id="exist" value="">
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.SELECT_ROLE')!= '') {{  trans(Session::get('admin_lang_file').'.SELECT_ROLE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.SELECT_ROLE') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <select required class="form-control" name="select_role" id="select_role" value="{!! Input::old('select_role') !!}" >
                                                   <option value="">-- @if (Lang::has(Session::get('admin_lang_file').'.SELECT_ROLE')!= '') {{ trans(Session::get('admin_lang_file').'.SELECT_ROLE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.SELECT_ROLE') }} @endif --</option>

                                                   @foreach($roles as $role)
                                                      <option value="{{$role->role_id}}" <?php if($customer->role_id==$role->role_id){ echo "selected";}?>>{{$role->name}}</option>
                                                   @endforeach
                                                </select>
                                                <div id="select_role"  style="color:#F00;font-weight:800"> </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PHONE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PHONE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PHONE') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <input type="text" class="form-control" maxlength="16" placeholder="" id="customer_phone"  value="{{ $customer->cus_phone }}"  name="customer_phone" required>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS1')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADDRESS1') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS1') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <input type="text" class="form-control" placeholder=""   value="{{ $customer->cus_address1 }}" id="customer_address1" name="customer_address1" maxlength="150">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS2')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADDRESS2') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS2') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <input type="text" class="form-control" placeholder=""  value="{{ $customer->cus_address2 }}"  id="customer_address2" name="customer_address2" maxlength="150">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_COUNTRY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_COUNTRY') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_COUNTRY') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <select class="form-control" name="select_customer_country" id="select_customer_country" onChange="select_city_ajax(this.value)" required>
                                                   <option value="0">-- @if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT') }} @endif --</option>
                                                   @foreach($countryresult as $countrydetails) 
                                                   <option value="{{ $countrydetails->co_id }}" <?php if($countrydetails->co_id == $customer->cus_country) { ?> selected <?php } ?> ><?php echo $countrydetails->co_name; ?></option>
                                                   @endforeach
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_CITY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_CITY') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_CITY') }} @endif<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <select class="form-control" id="select_customer_city" name="select_customer_city" required>
                                                   <option>- @if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_CITY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_CITY') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_CITY') }} @endif -</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-lg-3" for="pass1"><span class="text-sub"></span></label>
                                       <div class="col-lg-8">
                                          <button  id="submit_customer" class="btn btn-warning btn-sm btn-grad" style="color:#fff">@if (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_UPDATE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }} @endif</button>
                                          <a href="{{ url('manage_customer') }}" class="btn btn-default btn-sm btn-grad" style="color:#000">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CANCEL') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL') }} @endif</a>
                                       </div>
                                    </div>
                                    </form>
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
            <script>
               $(document).ready(function() {
               
                  var customer_first_name     = $('#customer_first_name');
                  var customer_Email          = $('#customer_Email');
                  var customer_phone          = $('#customer_phone');
                  var customer_password       = $('#customer_password');
                  var customer_address_one    = $('#customer_address1');
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
               
                
                $('#submit_customer').click(function() {
                   var exist=$('#exist').val();
               
                   if(exist==1){ 
                          $('#email_error_msg').html('Please Enter Different Email-Id, This Id Already Exist');
                          customer_Email.css('border', '1px solid red'); 
                          customer_Email.focus();
                          return false;
                      }else{
                          customer_Email.css('border', ''); 
                          $('#email_error_msg').html('');
                      }
                  
                      /*Customer Name*/
                      if($.trim(customer_first_name.val()) == ""){
                          customer_first_name.css('border', '1px solid red'); 
                          $('#name_error_msg').html('Please Enter Customer Name');
                          customer_first_name.focus();
                          return false;
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
               
               
               function check(){
                     var email_id   = $('#customer_Email').val();
                     var customer_edit_id =$('#customer_edit_id').val();
                            var passdata   = "email_id="+email_id+"&customer_edit_id="+customer_edit_id;
                          $.ajax( {
                                type: 'POST',
                                data: passdata,
                                url: '<?php echo url("check_cus_email_exist_edit"); ?>',
                                success: function(responseText){  
                         
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
               
               $('#customer_first_name').bind('keyup blur',function(){ 
                  var node = $(this);
                  node.val(node.val().replace(/[^a-z 0-9 A-Z_-]/g,'') ); }
               );
               
                $('#customer_phone').keydown(function (e) {
               if (e.shiftKey || e.ctrlKey || e.altKey) {
               e.preventDefault();
               } else {
               var key = e.keyCode;
               if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
               e.preventDefault();
               }
               }
               });
               
               
               function select_city_ajax(city_id)  //getting country id
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
               
               $( document ).ready(function() {
               
               var passData = 'city_id=<?php echo $customer->cus_city; ?>';
                   $.ajax( {
                          type: 'get',
                         data: {'city_id_ajax':'<?php echo $customer->cus_city; ?>','country_id_ajax':'<?php echo $customer->cus_country; ?>'},
                         url: '<?php echo url('ajax_select_city_edit'); ?>',
                         success: function(responseText){  
                           if(responseText)
                           { 
                                // alert(responseText);
                            $('#select_customer_city').html(responseText);                     
                           }
                        }       
                    }); 
               
               });
               
               
               
            </script>
            <script type="text/javascript">
               $.ajaxSetup({
                   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
               });
               
               
            </script>
            <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
            <!-- END GLOBAL SCRIPTS -->   
         </body>
         <!-- END BODY -->
      </html>