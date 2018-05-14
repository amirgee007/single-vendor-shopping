{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- include the BotDetect layout stylesheet -->

<!-- Header End====================================================================== -->
<div id="contact">
<div id="mainBody_contactus">
   <?php /* <img src="<?php echo url(''); ?>/public/assets/themes/images/contact-laravel-ecommerce-multivendor.jpg"> */ ?>
   <div class="container">
      <div class="row">
         <br>
         <div class="span4">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <h4 style="    margin-bottom: 0px;
                     margin-top: 0px;">@if (Lang::has(Session::get('lang_file').'.CONTACT_DETAILS')!= '') {{ trans(Session::get('lang_file').'.CONTACT_DETAILS') }} @else {{ trans($OUR_LANGUAGE.'.CONTACT_DETAILS') }} @endif</h4>
               </div>
               <div class="panel-body">
                  @foreach($get_contact_det as $enquiry_det)
                  @endforeach
                  <ul class="fo">
                     <li><i class="fa fa-envelope pink-color"  aria-hidden="true"></i> : {{ $enquiry_det->es_contactemail }}</li>
                     <li><i class="fa fa-skype pink-color" aria-hidden="true"></i> : {{ $enquiry_det->es_skype_email_id }}</li>
                     <li><i class="fa fa-mobile pink-color" aria-hidden="true"></i> : {{ $enquiry_det->es_phone1 }}, {{ $enquiry_det->es_phone2 }}</li>
                     @if($enquiry_det->show_address == "show")
                     <li><i class="fa fa-map-marker pink-color" aria-hidden="true"></i> : {{ $enquiry_det->es_address1 }}, {{ $enquiry_det->es_address2 }}</li>
                     @endif
                     <li><a target="_blank" href="{{ url('') }}"><i class="fa fa-globe pink-color" aria-hidden="true"></i> : {{ url('') }}</a></li>

                  </ul>
               </div>
            </div>
            <h4>@if (Lang::has(Session::get('lang_file').'.EMAIL_US')!= '') {{ trans(Session::get('lang_file').'.EMAIL_US') }}  @else {{ trans($OUR_LANGUAGE.'.EMAIL_US') }} @endif</h4>
            <div id="error_name"  style="color:#F00;font-weight:400"  > </div>
            @if (Session::has('success'))
            <div class="alert alert-warning alert-dismissable">{!! Session::get('success') !!}
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
            @endif
            {!! Form::open(array('url'=>'enquiry_submit','class'=>'form-horizontal')) !!}
            <div class="form-group">
               <div class="control-group">
                  <input type="text" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_NAME')!= '') {{ trans(Session::get('lang_file').'.ENTER_YOUR_NAME') }}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_NAME') }} @endif" name="name" id="inquiry_name" maxlength ="100" class="input-xlarge" style="width:99%" required/>
               </div>
            </div>
            <div class="control-group">
               <input type="text" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_VALID_EMAIL_ID')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_VALID_EMAIL_ID') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_VALID_EMAIL_ID') }} @endif"  name="email" id="inquiry_email"  style="width:99%"  maxlength="50" class="input-xlarge" required/>
            </div>
            <div class="control-group">
               <input type="text" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_PHONE_NUMBER')!= '') {{ trans(Session::get('lang_file').'.ENTER_YOUR_PHONE_NUMBER') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_PHONE_NUMBER') }} @endif" name="phone" id="inquiry_phone" maxlength="16" style="width:99%" class="input-xlarge" required/>
            </div>
            <div class="control-group">
               <textarea rows="3" maxlength="300" name="message" id="inquiry_desc"  class="input-xlarge" style="width:99%" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_QUERIES')!= '') {{  trans(Session::get('lang_file').'.ENTER_QUERIES') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_QUERIES') }} @endif" required></textarea>
            </div>
			
			
            <br>
            <input type="submit" class="btn me_btn btnb-success" value="@if (Lang::has(Session::get('lang_file').'.SEND_MESSAGE')!= '') {{ trans(Session::get('lang_file').'.SEND_MESSAGE') }}  @else {{ trans($OUR_LANGUAGE.'.SEND_MESSAGE') }} @endif" id="send_msg" style="background: #2F3234;
               border-radius: 0px;">
            </form>
         </div>
         <div class="span8">
            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124354.5533488139!2d80.23144114029584!3d13.094129449169666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5265ea4f7d3361%3A0x6e61a70b6863d433!2sChennai%2C+Tamil+Nadu!5e0!3m2!1sen!2sin!4v1430140983100" width="100%" height="518" style="border:1px solid #337ab7"></iframe>-->
            <div id="us3" style="width: 100%; height: 518px;margin-bottom:10px;"></div>
            <br><br>
         </div>
      </div>
   </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
{!! $footer !!}
<!-- For Responsive menu-->
<script type="text/javascript">
   $(document).ready(function() {
       $(document).on("click", ".customCategories .topfirst b", function() {
           $(this).next("ul").css("position", "relative");
   
           $(".topfirst ul").not($(this).parents(".topfirst").find("ul")).css("display", "none");
           $(this).next("ul").toggle();
       });
   
       $(document).on("click", ".morePage", function() {
           $(".nextPage").slideToggle(200);
       });
   
       $(document).on("click", "#smallScreen", function() {
           $(this).toggleClass("customMenu");
       });
   
       $(window).scroll(function() {
           if ($(this).scrollTop() > 250) {
               $('#comp_myprod').show();
           } else {
               $('#comp_myprod').hide();
           }
       });
   
   });
</script>
<!-- For Responsive menu-->
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<?php /*<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>*/ ?>
<script>
   $(document).ready(function(){
   $('#inquiry_phone').keydown(function (e) {
   if (e.shiftKey || e.ctrlKey || e.altKey) {
   e.preventDefault();
   } else {
   var key = e.keyCode;
   if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
   e.preventDefault();
   }
   }
   
   
   });
   
   
    $('#inquiry_desc').bind('keyup blur',function(){ 
      var node = $(this);
      node.val(node.val().replace(/[^a-z 0-9 A-Z_ - , .]/,'') );
      });
    
   
   $('#inquiry_name').bind('keyup blur',function(){ 
      var node = $(this);
      node.val(node.val().replace(/[^a-z 0-9 A-Z_-]/,'') ); }
    );
   
   $('#send_msg').click(function(){
    //alert(123);
    
    if($('#inquiry_email').val()=='')
     {   
       $('#inquiry_email').css('border', '1px solid red');  
       $('#inquiry_email').focus();
      return false;
     }
     
    else
    {
      $('#inquiry_email').css('border', '');
       
    }
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
     if(!emailReg.test($('#inquiry_email').val()))
        {
            $('#inquiry_email').css('border', '1px solid red');
               return false;
        }
        
      var reg =/<(.|\n)*?>/g; 
   
    if (reg.test($('#inquiry_desc').val()) != '') {
   
      alert("HTML tags  are not accepted");
   
      }
    if($('#inquiry_phone').val()=='')
     {
      $('#inquiry_phone').css('border', '1px solid red');
       $('#inquiry_phone').focus();
      return false;
    }
    else
    {
      $('#inquiry_phone').css('border', '');
       
    }
    
    
   
   });//function
   
   });//ready
</script>
<script type="text/javascript">
   (function($,W,D)
   {
       var JQUERY4U = {};
   
       JQUERY4U.UTIL =
       {
           setupFormValidation: function()
           {
               //form validation rules
               $("#my-form").validate({
                   rules: {
                       firstname: "required",
                       lastname: "required",
                       email: {
                           required: true,
                           email: true
                       },
                       emailConfirm: {
                         required: true,
                         equalTo: '#email'
                        },
                       password: {
                           required: true,
                           minlength: 5
                       },
                        passwordConfirm: {
                         equalTomobile: '#password'
                        },
                       agree: "required"
                   },
                   messages: {
                       firstname: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_YOUR_FIRSTNAME')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_YOUR_FIRSTNAME');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_YOUR_FIRSTNAME');} ?>",
                       lastname: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_YOUR_LASTNAME')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_YOUR_LASTNAME');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_YOUR_LASTNAME');} ?>",
                       password: {
                           required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_PROVIDE_A_PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_PROVIDE_A_PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_PROVIDE_A_PASSWORD');} ?>",
                           minlength: "<?php if (Lang::has(Session::get('lang_file').'.OUR_PASSWORD_MUST_BE_AT_LEAST_5_CHARACTERS_LONG')!= '') { echo  trans(Session::get('lang_file').'.OUR_PASSWORD_MUST_BE_AT_LEAST_5_CHARACTERS_LONG');}  else { echo trans($OUR_LANGUAGE.'.OUR_PASSWORD_MUST_BE_AT_LEAST_5_CHARACTERS_LONG');} ?>"
                       },
                       email: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_THE_VALID_EMAIL_ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_THE_VALID_EMAIL_ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_THE_VALID_EMAIL_ADDRESS');} ?>",
                       //passwordConfirm: "Please enter the same Mobile Number again",
                       agree: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ACCEPT_OUR_POLICY')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ACCEPT_OUR_POLICY');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ACCEPT_OUR_POLICY');} ?>"
                       
                   },
                   submitHandler: function(form) {
                       form.submit();
                   }
               });
           }
       }
   
       //when the dom has loaded setup form validation rules
       $(D).ready(function($) {
           JQUERY4U.UTIL.setupFormValidation();
       });
   
   })(jQuery, window, document);
</script>
<?php 
   if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
   $map_lang = 'en';
   }else {  
   $map_lang = 'fr';
   }
   ?>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=<?php echo $GOOGLE_KEY;?>&language=<?php echo $map_lang; ?>'></script>
<script src="<?php echo url(''); ?>/public/assets/js/locationpicker.jquery.js"></script>
<script>$('#us3').locationpicker({
   location: {latitude: <?php echo $enquiry_det->es_latitude; ?>, longitude: <?php echo $enquiry_det->es_longitude; ?>},
   
   radius: 200,
   inputBinding: {
       latitudeInput: $('#us3-lat'),
       longitudeInput: $('#us3-lon'),
       radiusInput: $('#us3-radius'),
       locationNameInput: $('#us3-address')
   },
   enableAutocomplete: true,
   onchanged: function (currentLocation, radius, isMarkerDropped) {
       // Uncomment line below to show alert on each Location Changed event
       //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
   }
   });
</script>
<script type="text/javascript">
   $.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>  
</body>
</html>