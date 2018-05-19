{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
 
<!-- Header End====================================================================== -->
<div id="mainBody">
   <div class="container">
      <div class="row">
         <!-- Sidebar ================================================== -->
         <!-- Sidebar end=============================================== -->
         <div class="span12" style="background:#ececec;">
            <ul class="breadcrumb">
               <li class="active">@if (Lang::has(Session::get('lang_file').'.WELCOME_TO_USER_REGISTRATION')!= '') {{ trans(Session::get('lang_file').'.WELCOME_TO_USER_REGISTRATION') }} @else {{ trans($OUR_LANGUAGE.'.WELCOME_TO_USER_REGISTRATION') }} @endif</li>
            </ul>
            <!--@if ($errors->any())
               <br>
               <ul style="color:red;">
               <div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >×</button>
               </div>
               </ul>	
               @endif-->
            @if (Session::has('mail_exist'))
            <div class="alert alert-warning alert-dismissable">{!! Session::get('mail_exist') !!}
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
            @endif
            @if (Session::has('result'))
            <div class="alert alert-success alert-dismissable">{!! Session::get('result') !!}
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
            @endif
            @if (session()->has('success'))
            <div class="alert alert-warning alert-dismissable">{!! Session::get('success') !!}
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
            @endif
            <h3 style="margin-bottom:0px; padding-left: 20px;">@if (Lang::has(Session::get('lang_file').'.CREATE_NEW_USER_ACCOUNT')!= '') {{ trans(Session::get('lang_file').'.CREATE_NEW_USER_ACCOUNT') }} @else {{ trans($OUR_LANGUAGE.'.CREATE_NEW_USER_ACCOUNT') }} @endif</h3>
            <div class="content">
               {!! Form::open(array('url'=>'register_submit','class'=>'form-horizontal loginFrm',)) !!}
               <div class="personal-data">
                  <br />
                  <!-- <h4 style="padding:10px;background:#eee;">Create your store</h4> -->
                  <div class="row">
                     <div class="span5">
                        <label for="text1" >@if (Lang::has(Session::get('lang_file').'.NAME')!= '') {{ trans(Session::get('lang_file').'.NAME') }} @else {{ trans($OUR_LANGUAGE.'.NAME')}} @endif:<span class="text-sub">*</span></label>
                        <input type="text" id="cus_name"  maxlength="75" name="customername" class="form-control span5" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_NAME')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_NAME') }} @else {{  trans($OUR_LANGUAGE.'.ENTER_YOUR_NAME') }} @endif" value="{!! Input::old('customername') !!}" required/>
                        @if ($errors->has('customername')) 
                        <p class="error-block" style="color:red;">{{ $errors->first('customername') }}</p>
                        @endif  
                        <label for="text1" >@if (Lang::has(Session::get('lang_file').'.PHONE')!= '') {{  trans(Session::get('lang_file').'.PHONE') }} @else {{ trans($OUR_LANGUAGE.'.PHONE') }} @endif:<span class="text-sub">*</span></label>
                        <!--  <input type="number" id="cus_phone" required="required" name="cus_phone" placeholder="" class="form-control span5" value="{!! Input::old('cus_phone') !!}" onchange="numb();" onKeyDown="limitTextmobile(this.form.mobile,this.form.countdown,10);"  
                           onKeyUp="limitTextmobile(this.form.mobile,this.form.countdown,10);"> -->
                        <!--<input type="number" class="form-control span5" id="inputName" placeholder="" name="mobile" value="{!! Input::old('cus_phone') !!}"   onchange="numb();" 
                           data-minlength="15" data-maxlength="15" data-error="Less Number"> -->   
                        <input type="text" class="form-control span5" id="inputName"  maxlength="16" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_MOBILE_NUMBER')!= '') {{ trans(Session::get('lang_file').'.ENTER_YOUR_MOBILE_NUMBER') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_MOBILE_NUMBER') }} @endif" name="mobile" value="{!! Input::old('mobile') !!}"   onkeypress="return isNumber(event)" 
                           data-minlength="15" data-maxlength="15" data-error="Less Number" required>			  
                        @if ($errors->has('mobile')) 
                        <p class="error-block" style="color:red;">{{ $errors->first('mobile') }}</p>
                        @endif  
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.EMAIL')!= '') {{  trans(Session::get('lang_file').'.EMAIL') }} @else {{ trans($OUR_LANGUAGE.'.EMAIL') }} @endif:<span class="text-sub" >*</span></label>
                        <input type="email" maxlength="50" id="cus_email" name="email" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_EMAIL')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_EMAIL') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_EMAIL') }} @endif" class="form-control span5" value="{!! Input::old('email') !!}" required onChange="check();"  />
                        <div id="email_error_msg"  style="color:#F00;font-weight:800"  > </div>
                        @if ($errors->has('email')) 
                        <p class="error-block" style="color:red;">{{ $errors->first('email') }}</p>
                        @endif 
                        <label for="text1" >@if (Lang::has(Session::get('lang_file').'.PASSWORD')!= '') {{  trans(Session::get('lang_file').'.PASSWORD') }} @else {{ trans($OUR_LANGUAGE.'.PASSWORD') }} @endif:<span class="text-sub" >*</span></label>
                        <input type="password" minlength="6" maxlength="75" id="cus_pwd" name="pwd" placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_PASSWORD');} ?> (<?php if (Lang::has(Session::get('lang_file').'.MIMIMUM_6_CHARACTERS')!= '') { echo  trans(Session::get('lang_file').'.MIMIMUM_6_CHARACTERS');}  else { echo trans($OUR_LANGUAGE.'.MIMIMUM_6_CHARACTERS');} ?>)" class="form-control span5" value="{!! Input::old('pwd') !!}" required/>
                        @if ($errors->has('pwd')) 
                        <p class="error-block" style="color:red;">{{ $errors->first('pwd') }}</p>
                        @endif
                         
                        <label for="text1" >@if (Lang::has(Session::get('lang_file').'.COUNTRY')!= '') {{  trans(Session::get('lang_file').'.COUNTRY') }} @else {{ trans($OUR_LANGUAGE.'.COUNTRY') }} @endif:<span class="text-sub" >*</span></label>
                        <select class="span5" name="select_country" id="select_country" onChange="get_city_list1(this.value)" required>
                           <option value="">-- <?php if (Lang::has(Session::get('lang_file').'.SELECT_COUNTRY')!= '') { echo  trans(Session::get('lang_file').'.SELECT_COUNTRY');}  else { echo trans($OUR_LANGUAGE.'.SELECT_COUNTRY');} ?>--</option>
                           <?php foreach($country_details as $country_fetch){ ?>
                           <option value="<?php echo $country_fetch->co_id; ?>" <?php if(Input::old('select_country')==$country_fetch->co_id){ echo "selected";}?>><?php
                              if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                               $co_name = 'co_name';
                              }else {  $co_name = 'co_name_'.Session::get('lang_code'); }
                              echo $country_fetch->$co_name; ?></option>
                           <?php } ?>
                        </select>
                        @if ($errors->has('select_country')) 
                        <p class="error-block" style="color:red;">{{ $errors->first('select_country') }}</p>
                        @endif
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.CITY')!= '') {{  trans(Session::get('lang_file').'.CITY') }} @else {{ trans($OUR_LANGUAGE.'.CITY') }} @endif:<span class="text-sub" >*</span></label>
                        <select class="span5" name="select_city" id="select_city" required>
                           <option value="">--<?php if (Lang::has(Session::get('lang_file').'.SELECT_CITY')!= '') { echo  trans(Session::get('lang_file').'.SELECT_CITY');}  else { echo trans($OUR_LANGUAGE.'.SELECT_CITY');} ?>--</option>
                        </select>
                        @if ($errors->has('select_city')) 
                        <p class="error-block" style="color:red;">{{ $errors->first('select_city') }}</p>
                        @endif
                        <input type="hidden" id="return_url" value="<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" />
                        <p><input type="checkbox" required/> @if (Lang::has(Session::get('lang_file').'.BY_CLICKING_SIGNUP_I_AGREE_TO')!= '') {{ trans(Session::get('lang_file').'.BY_CLICKING_SIGNUP_I_AGREE_TO') }} @else {{ trans($OUR_LANGUAGE.'.BY_CLICKING_SIGNUP_I_AGREE_TO') }} @endif  {{ $SITENAME }} <a href="{{ url('termsandconditons') }}" title="@if (Lang::has(Session::get('lang_file').'.TERMS_AND_CONDITIONS')!= '') {{  trans(Session::get('lang_file').'.TERMS_AND_CONDITIONS') }} @else {{ trans($OUR_LANGUAGE.'.TERMS_AND_CONDITIONS') }} @endif" class="forget_link" style="color:#ff8400;" target="_blank" > @if (Lang::has(Session::get('lang_file').'.TERMS_AND_CONDITIONS')!= '') {{ trans(Session::get('lang_file').'.TERMS_AND_CONDITIONS') }} @else {{ trans($OUR_LANGUAGE.'.TERMS_AND_CONDITIONS') }} @endif</a>		
                        </p>
                        <input type="submit" id="register_submit" class="btn btn-success" value="@if (Lang::has(Session::get('lang_file').'.SIGN_UP')!= '') {{  trans(Session::get('lang_file').'.SIGN_UP') }} @else {{ trans($OUR_LANGUAGE.'.SIGN_UP') }} @endif" />          
                     </div>
                     <div class="span6" style="margin-top: 10%;">
                        <div class="clearfix fb-log" style="text-align:center">
                           <span style="font-size:16px; color:#666; text-align:center; line-height:10px">@if (Lang::has(Session::get('lang_file').'.CONNECT_YOUR_FACEBOOK_ACCOUNT_FOR_SIGN_UP')!= '') {{  trans(Session::get('lang_file').'.CONNECT_YOUR_FACEBOOK_ACCOUNT_FOR_SIGN_UP') }} @else {{ trans($OUR_LANGUAGE.'.CONNECT_YOUR_FACEBOOK_ACCOUNT_FOR_SIGN_UP') }} @endif {{ $SITENAME }} .</span><br>
                           <!--<a onClick="fb_login()" class="btn btn-primary btn-large" style="margin-top:5px; margin-bottom:5px" ><i class="icon-facebook"></i>Log in with Facebook</a><br>
                              Already a member? <a href="#login" onClick="$('.close').click();" role="button" data-toggle="modal" style="color:#ff8400;">Sign in</a>-->
                           <a  onclick="fb_login()" class="facebook_login" style="margin-top:5px; margin-bottom:5px" >&nbsp;</a><br><!--<i class="icon-facebook"></i>Log in with Facebook</a>-->
						   
						   {{-- <a class="gl_login" href="https://accounts.google.com/o/oauth2/auth?scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fplus.me&amp;redirect_uri=http%3A%2F%2F192.168.0.62.xip.io%2FLaravelSingleVendor_v1.0%2Fgoogle_login&amp;response_type=code&amp;client_id=782885230420-rbpe9m9044krsto1dqchhr3p6am81ggh.apps.googleusercontent.com&amp;access_type=online" style="margin-top:5px; margin-bottom:5px"></a><br> --}}
                     <div class="clearfix fb-log" style="text-align:center" >
                            <a class="gl_login" style="margin-top:5px; margin-bottom:5px" href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>" class="go-but" ></a>                           
                        </div> 
						   
                           @if (Lang::has(Session::get('lang_file').'.ALREADY_A_MEMBER')!= '') {{  trans(Session::get('lang_file').'.ALREADY_A_MEMBER') }} @else {{ trans($OUR_LANGUAGE.'.ALREADY_A_MEMBER') }} @endif ? <a href="#login" onClick="$('.close').click();" role="button" data-toggle="modal" style="color:#ff8400;">@if (Lang::has(Session::get('lang_file').'.LOGIN')!= '') {{ trans(Session::get('lang_file').'.LOGIN') }} @else {{ trans($OUR_LANGUAGE.'.LOGIN') }} @endif</a>
					
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
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<?php /*<script src="<?php echo url('')?>/public/assets/plugins/jquery-2.0.3.min.js"></script>
<script src="<?php //echo url();?>/themes/js/jquery.steps.js"></script>
<script src="<?php echo url(); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo url(); ?>/themes/js/bootshop.js"></script>
<!--    <script src="<?php echo url(); ?>/themes/js/jquery.lightbox-0.5.js"></script>-->
*/?>
<script>
   function check(){
   
   		var cus_email    = $('#cus_email').val();
   		
   		$.ajax({
   		      type: 'get',
   			  data: "email_id="+cus_email,
   			  url: '<?php echo url('check_cus_email_exist');?>',
   			  success: function(responseText){  
   				 
   			   if(responseText==1){  //already exist
   				  
   				  //$("#exist").val("1"); //already exist
   				  $("#cus_email").css('border', '1px solid red'); 
   				  $('#email_error_msg').html("<?php if (Lang::has(Session::get('lang_file').'.THIS_EMAIL_ID_ALREADY_REGISTERED')!= '') { echo  trans(Session::get('lang_file').'.THIS_EMAIL_ID_ALREADY_REGISTERED');}  else { echo trans($OUR_LANGUAGE.'.THIS_EMAIL_ID_ALREADY_REGISTERED');} ?>.");	
   				  $("#cus_email").focus();
   				  return false;				   
   			   }else if(responseText==0){
   				 // $("#exist").val("0");
   				  $("#cus_email").css('border', ''); 
   				  $('#email_error_msg').html('');
   				  return true;
   			   }
   			}		
   		});	
   }
   
   $( document ).ready(function() {
   	
   	
   	$('.close').click(function() {
   		$('.alert').hide();
   	});
   $('#submit').click(function() {
      var file		 	 = $('#file');
   var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        	if(file.val() == "")
   		{
   		file.focus();
   	file.css('border', '1px solid red'); 		
   	return false;
   	}			
   	else if ($.inArray($('#file').val().split('.').pop().toLowerCase(), fileExtension) == -1) { 				
   	file.focus();
   	file.css('border', '1px solid red'); 		
   	return false;
   	}			
   	else
   	{
   	file.css('border', ''); 				
   	}
   });
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
   				$('#select_city').html(responseText);					   
   			   }
   			}		
   		});		
   }
   function get_city_list1(id)
   {
   	var passcityid = 'id='+id;
   	$.ajax( {
   		type: 'get',
   		data: passcityid,
   		url: '<?php echo url('register_getcountry'); ?>',
   		success: function(responseText){ 
   		//alert(responseText); 
   			if(responseText)
   			{ 	 
   			
   			$('#select_city').html(responseText);					   
   			}
   		}		
   	});		
   }
   
   function select_mer_city_ajax(city_id)
   {
   	 var passData = 'city_id='+city_id;
   	// alert(passData);
   	   $.ajax( {
   		      type: 'get',
   			  data: passData,
   			  url: '<?php echo url('ajax_select_city'); ?>',
   			  success: function(responseText){  
   			 // alert(responseText);
   			   if(responseText)
   			   { 
   				$('#select_mer_city').html(responseText);					   
   			   }
   			}		
   		});	
   }
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
<script src="{{ url('') }}/themes/js/simpleform.min.js"></script>
<script type="text/javascript">
   $(".testform").simpleform({
   	speed : 500,
   	transition : 'fade',
   	progressBar : true,
   	showProgressText : true,
   	validate: true
   });
   
   
   
   function validateForm(formID, Obj){
   
   	switch(formID){
   		case 'testform' :
   			Obj.validate({
   				rules: {
   					cus_email: {
   						required: true,
   						email: true
   					},
   					cus_name: {
   						required: true
   					},
   					cus_pwd: {
   						required: true
   					},
   					cus_phone: {
   						required: true
   					},
   					select_country: {
   						required: true
   					},
   					select_city: {
   						required: true
   					}
   					
   				},
   				messages: {
   					cus_email: {
   						required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_AN_EMAIL_ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_AN_EMAIL_ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_AN_EMAIL_ADDRESS');} ?>",
   						cus_email: "<?php if (Lang::has(Session::get('lang_file').'.NOT_A_VALID_EMAIL_ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.NOT_A_VALID_EMAIL_ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.NOT_A_VALID_EMAIL_ADDRESS');} ?>"
   					},
   					cus_name: {
   					 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_YOUR_STORE_NAME')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_YOUR_STORE_NAME');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_YOUR_STORE_NAME');} ?>"
   					},
   					cus_pwd: {
   					 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_YOUR_PHONE_NO')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_YOUR_PHONE_NO');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_YOUR_PHONE_NO');} ?>"
   					},
   					cus_phone: {
   					 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS1_FIELD')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS1_FIELD');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDRESS1_FIELD');} ?>"
   					},
   					select_country: {
   					 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_SELECT_COUNTRY')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_SELECT_COUNTRY');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_SELECT_COUNTRY');} ?>"
   					},
   					select_city: {
   					 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_SELECT_CITY')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_SELECT_CITY');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_SELECT_CITY');} ?>"
   					}
   					
   					
   					
   				}
   			});
   		return Obj.valid();
   		break;
   
   		case 'testform2' :
   			Obj.validate({
   				rules: {
   					email_id: {
   						required: true,
   						email_id: true
   					},
   					first_name: {
   						required: true
   					},
   					select_mer_city: {
   						required: true,
   						
   					},
   					addreess_one: {
   						required: true
   					},
   					payment_account: {
   						required: true
   					},
   					
   					last_name: {
   						required: true
   					},
   					select_mer_country: {
   						required: true
   					},
   					phone_no: {
   						required: true
   					},
   					address_two: {
   						required: true
   					}
   				},
   				messages: {
   					email_id: {
   						required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_AN_EMAIL_ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_AN_EMAIL_ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_AN_EMAIL_ADDRESS');} ?>",
   						email: "<?php if (Lang::has(Session::get('lang_file').'.NOT_A_VALID_EMAIL_ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.NOT_A_VALID_EMAIL_ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.NOT_A_VALID_EMAIL_ADDRESS');} ?>"
   					},
   					first_name: {
   					 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_YOUR_FIRST_NAME')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_YOUR_FIRST_NAME');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_YOUR_FIRST_NAME');} ?>"
   					},
   					select_mer_city: {
   						required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_CITY')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_CITY');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_CITY');} ?>",
   						
   					},
   					addreess_one: {
   					 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDREESS1_FIELD')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDREESS1_FIELD');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDREESS1_FIELD');} ?>"
   					},
   					payment_account: {
   						required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_PAYMENT_ACCOUNT')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_PAYMENT_ACCOUNT');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_PAYMENT_ACCOUNT');} ?>"
   					},
   					
   					last_name: {
   						required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_LAST_NAME')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_LAST_NAME');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_LAST_NAME');} ?>"
   					},
   					select_mer_country: {
   						required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_SELECT_COUNTRY')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_SELECT_COUNTRY');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_SELECT_COUNTRY');} ?>"
   					},
   					phone_no: {
   						required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_PHONE_NO')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_PHONE_NO');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_PHONE_NO');} ?>"
   					},
   					address_two: {
   						required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS2_FIELD')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS2_FIELD');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDRESS2_FIELD');} ?>"
   					}
   				}
   			});
   		return Obj.valid();
   		break;
   	}
   }
</script>
<script type="text/javascript">
   var _gaq = _gaq || [];
   _gaq.push(['_setAccount', 'UA-36251023-1']);
   _gaq.push(['_setDomainName', 'jqueryscript.net']);
   _gaq.push(['_trackPageview']);
   
   (function() {
     var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
   })();
   
</script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script src="<?php echo url(''); ?>/themes/js/jquery-gmaps-latlon-picker.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
   var map;
   
   function initialize() {
   var myLatlng = new google.maps.LatLng(11.0195253,76.9195069);
       var mapOptions = {
   
          zoom: 10,
               center: myLatlng,
               disableDefaultUI: true,
               panControl: true,
               zoomControl: true,
               mapTypeControl: true,
               streetViewControl: true,
               mapTypeId: google.maps.MapTypeId.ROADMAP
   
       };
   
       map = new google.maps.Map(document.getElementById('map_canvas'),
           mapOptions);
     var marker = new google.maps.Marker({
               position: myLatlng,
               map: map,
   visible: false,
   draggable:true,    
           });	
   google.maps.event.addListener(marker, 'dragend', function(e) {
   		 
   var lat = this.getPosition().lat();
   	 var lng = this.getPosition().lng();
   $('#latitude').val(lat);
   $('#longtitude').val(lng);
   });
       var input = document.getElementById('pac-input');
       var autocomplete = new google.maps.places.Autocomplete(input);
       autocomplete.bindTo('bounds', map);
   
       google.maps.event.addListener(autocomplete, 'place_changed', function () {
   
           var place = autocomplete.getPlace();
   
           if (place.geometry.viewport) {
               map.fitBounds(place.geometry.viewport);
   var myLatlng = place.geometry.location;	
   //alert(place.geometry.location);			
   var marker = new google.maps.Marker({
                position: myLatlng,
    visible: true,
               map: map,
   draggable:true,   
           });	
   google.maps.event.addListener(marker, 'dragend', function(e) {
   		 
   var lat = this.getPosition().lat();
   	 var lng = this.getPosition().lng();
   $('#latitude').val(lat);
   $('#longtitude').val(lng);
   });
           } else {
               map.setCenter(place.geometry.location);	
   
               map.setZoom(17);
           }
       });
   
   
   
   }
   
   
   google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!--Validation-->
<script type="text/javascript">
   function numb() {
     var a=document.getElementById("mobile_1").value;
     var value = a.length;
     if (value < 10) {
       document.getElementById("valu").innerHTML = "<?php if (Lang::has(Session::get('lang_file').'.LESSER_MOBILE_NO')!= '') { echo  trans(Session::get('lang_file').'.LESSER_MOBILE_NO');}  else { echo trans($OUR_LANGUAGE.'.LESSER_MOBILE_NO');} ?>";//"Watching.. Everything is Alphabet now"; 
       //document.write("Watching.. Everything is Alphabet now"); 
       return true; //alert("ok");
     }
      else {
       document.getElementById("valu").innerHTML = "<?php if (Lang::has(Session::get('lang_file').'.CORRECT_MOB_NO')!= '') { echo  trans(Session::get('lang_file').'.CORRECT_MOB_NO');}  else { echo trans($OUR_LANGUAGE.'.CORRECT_MOB_NO');} ?>";  //alert("numerics not accepted");
       return false; 
       }
   }
</script>
<!--digit less than 10 - MOBILE_NO-->
<script type="text/javascript">
   function limitval(){
     var d=document.getElementById("mobile_1").value;
     var e=d.length;
     if (e < 10) {
       document.getElementById("valu").innerHTML="<?php if (Lang::has(Session::get('lang_file').'.ENTER_10_DIGITS_OF_MOBILE_NO')!= '') { echo  trans(Session::get('lang_file').'.ENTER_10_DIGITS_OF_MOBILE_NO');}  else { echo trans($OUR_LANGUAGE.'.ENTER_10_DIGITS_OF_MOBILE_NO');} ?>";
       return false;
     }
     else {  
       document.getElementById("valu").innerHTML="<?php if (Lang::has(Session::get('lang_file').'.CORRECT_MOBILE_NO')!= '') { echo  trans(Session::get('lang_file').'.CORRECT_MOBILE_NO');}  else { echo trans($OUR_LANGUAGE.'.CORRECT_MOBILE_NO');} ?>";   
       return true;
     }
   }
</script>
<script type="text/javascript">
   function IsMobileNumber(txtMobId) {
       var mob = /^[1-9]{1}[0-9]{9}$/;
       var txtMobile = document.getElementById(mobile_1);
       if (mob.test(txtMobile.value) == false) {
           alert("<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_VALID_MOBILE_NUMBER')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_VALID_MOBILE_NUMBER');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_VALID_MOBILE_NUMBER');} ?>.");
           txtMobile.focus();
           return false;
       }
       return true;
   }
</script>
<!--limit text-MOBILE_NO-->
<script language="javascript" type="text/javascript">
   function limitTextmobile(limitField, limitCount, limitNum) {
     if (limitField.value.length > limitNum) {
       limitField.value = limitField.value.substring(0, limitNum);
     } else {
       limitCount.value = limitNum - limitField.value.length;
     }
   }
</script>
<script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>
<!-- Themes switcher section ============================================================================================= -->
<script>
   $(document).on("ready", function() {
       $("#orderstatus").wizard({
           onfinish: function() {
               console.log("Hola mundo");
           }
       });
   });
   /* Mobile Number Validation */
   function isNumber(evt) {
   evt = (evt) ? evt : window.event;
   var charCode = (evt.which) ? evt.which : evt.keyCode;
   if (charCode > 31 && (charCode < 48 || charCode > 57)) {
   return false;
   }
   return true;
   }
   
   $('#cus_name').bind('keyup blur',function(){ 
   var node = $(this);
   node.val(node.val().replace(/[^a-z 0-9 A-Z_-]/,'') ); }
   );
   
   $( document ).ready(function() {
   $.ajax( {
       type: 'get',
    data: {'city_id_ajax':'<?php echo Input::old('select_city'); ?>','country_id_ajax':'<?php echo Input::old('select_country'); ?>'},
    url: '<?php echo url('ajax_select_city_edit'); ?>',
    success: function(responseText){  
      if(responseText)
      { 
          
     $('#select_city').html(responseText);             
      }
   }   
   }); 
   
   });
 
</script>

 
</body>
</html>