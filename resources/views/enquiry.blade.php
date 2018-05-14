
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="contact">
<div id="mainBody_contactus">
<?php /* <img src="<?php echo url(''); ?>/public/assets/themes/images/contact-laravel-ecommerce-multivendor.jpg"> */ ?>
<div class="container">
<div class="row"><br>
<div class="span12" style="width:500px;">

                 <h4><?php if (Lang::has(Session::get('lang_file').'.EMAIL_US')!= '') { echo  trans(Session::get('lang_file').'.EMAIL_US');}  else { echo trans($OUR_LANGUAGE.'.EMAIL_US');} ?></h4>
<div id="error_name"  style="color:#F00;font-weight:400"  > </div>
    @if (Session::has('success'))
    <div class="alert alert-warning alert-dismissable">{!! Session::get('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
    @endif
    {!! Form::open(array('url'=>'product_enquiry_submit','class'=>'form-horizontal')) !!}

           <input type="hidden" placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_NAME')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_NAME');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_NAME');} ?>" name="merchant_email" id="inquiry_name"  class="input-xlarge" style="width:95%" value="<?php echo $enquiry_product->mer_email;?>" />
       
        <div class="form-group">
          <div class="control-group">
           
              <input type="text" placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_NAME')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_NAME');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_NAME');} ?>" name="name" id="inquiry_name"  class="input-xlarge" style="width:95%"required/>
           
          </div>
          </div>
       <div class="control-group">
           
              <input type="text" placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_VALID_EMAIL_ID')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_VALID_EMAIL_ID');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_VALID_EMAIL_ID');} ?>"  name="email" id="inquiry_email"  style="width:95%" class="input-xlarge" required/>
           
          </div>
          <div class="control-group">
           
              <input type="text" placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_SUBJECT')!= '') { echo  trans(Session::get('lang_file').'.ENTER_SUBJECT');}  else { echo trans($OUR_LANGUAGE.'.ENTER_SUBJECT');} ?>" name="product_name" id="inquiry_phone"  style="width:95%" class="input-xlarge" value="<?php echo $enquiry_product->pro_title;?>" required/>
          
          </div>
       <div class="control-group">
           
              <input type="text" placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_PHONE_NUMBER')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_PHONE_NUMBER');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_PHONE_NUMBER');} ?>" name="phone" id="inquiry_phone"  style="width:95%" class="input-xlarge" required/>
          
          </div>
          <div class="control-group">
              <textarea rows="3"  name="message" id="inquiry_desc"  class="input-xlarge" style="width:95%" placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_QUERIES')!= '') { echo  trans(Session::get('lang_file').'.ENTER_QUERIES');}  else { echo trans($OUR_LANGUAGE.'.ENTER_QUERIES');} ?>" required></textarea>
           
          </div>

    <input type="submit" class="btn me_btn btnb-success" value="<?php if (Lang::has(Session::get('lang_file').'.SEND_MESSAGE')!= '') { echo  trans(Session::get('lang_file').'.SEND_MESSAGE');}  else { echo trans($OUR_LANGUAGE.'.SEND_MESSAGE');} ?>" id="send_msg" style="background: #2F3234;
    border-radius: 0px;">
                 
       
      </form>
      </div>
      <div class="span8">
  
      
  <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124354.5533488139!2d80.23144114029584!3d13.094129449169666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5265ea4f7d3361%3A0x6e61a70b6863d433!2sChennai%2C+Tamil+Nadu!5e0!3m2!1sen!2sin!4v1430140983100" width="100%" height="518" style="border:1px solid #337ab7"></iframe>-->
  <!--div id="us3" style="width: 100%; height: 518px;margin-bottom:10px;"></div-->
  <br><br>
  

  </div>
    </div>

</div>
	
	</div>	
  
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

	{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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

	<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>

	
</body>
</html>
