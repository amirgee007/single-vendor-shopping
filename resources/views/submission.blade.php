{!! $navbar !!}

<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	
<!-- Sidebar end=============================================== -->
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.html"><?php if (Lang::has(Session::get('lang_file').'.HOME')!= '') { echo  trans(Session::get('lang_file').'.HOME');}  else { echo trans($OUR_LANGUAGE.'.HOME');} ?></a> <span class="divider">/</span></li>
		<li class="active"><?php if (Lang::has(Session::get('lang_file').'.THANK_YOU_FOR_MERCHANT_REGISTRATION')!= '') { echo  trans(Session::get('lang_file').'.THANK_YOU_FOR_MERCHANT_REGISTRATION');}  else { echo trans($OUR_LANGUAGE.'.THANK_YOU_FOR_MERCHANT_REGISTRATION');} ?></li>
    </ul>
    
        @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >×</button>
        </div>
		</ul>	
		@endif
         @if (Session::has('mail_exist'))
		<div class="alert alert-warning alert-dismissable">{!! Session::get('mail_exist') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
         @if (Session::has('result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('result') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
	<h3 style="margin-bottom:0px;"><?php if (Lang::has(Session::get('lang_file').'.THANK_YOU_TO_MERCHANT_SIGN_UP')!= '') { echo  trans(Session::get('lang_file').'.THANK_YOU_TO_MERCHANT_SIGN_UP');}  else { echo trans($OUR_LANGUAGE.'.THANK_YOU_TO_MERCHANT_SIGN_UP');} ?>!</h3>
    <p style="padding-bottom:20px;"><?php if (Lang::has(Session::get('lang_file').'.YOU_GOT_YOUR_USERNAME_AND_PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.YOU_GOT_YOUR_USERNAME_AND_PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.YOU_GOT_YOUR_USERNAME_AND_PASSWORD');} ?>!</p>
  
    <div class="content">
     
	 
        
	
</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
 <script src="<?php echo url('')?>/public/assets/plugins/jquery-2.0.3.min.js"></script>
<script src="<?php //echo url();?>/themes/js/jquery.steps.js"></script>
	<script src="<?php echo url(''); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
 
	<script src="<?php echo url(''); ?>/themes/js/bootshop.js"></script>
	  
<!--    <script src="<?php echo url(''); ?>/themes/js/jquery.lightbox-0.5.js"></script>-->
       
        
    <script>
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
	
	 <script src="<?php echo url(''); ?>/themes/js/simpleform.min.js"></script>
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
							email: {
								required: true,
								email: true
							},
							store_name: {
								required: true
							},
							store_pho: {
								required: true
							},
							store_add_one: {
								required: true
							},
							
							store_add_two: {
								required: true
							},
							
							zip_code: {
								required: true
							},
							meta_keyword: {
								required: true
							},
							meta_description: {
								required: true
							},
							website: {
								required: true
							},
							location: {
								required: true
							},
							commission: {
								required: true
							},
							file: {
								required: true
							},
							select_country: {
								required: true
							},
							select_city: {
								required: true
							},
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
							email: {
								required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_AN_EMAIL_ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_AN_EMAIL_ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_AN_EMAIL_ADDRESS');} ?>",
								email: "<?php if (Lang::has(Session::get('lang_file').'.NOT_A_VALID_EMAIL_ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.NOT_A_VALID_EMAIL_ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.NOT_A_VALID_EMAIL_ADDRESS');} ?>"
							},
							store_name: {
							 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_YOUR_STORE_NAME')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_YOUR_STORE_NAME');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_YOUR_STORE_NAME');} ?>"
							},
							store_pho: {
							 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_YOUR_PHONE_NO')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_YOUR_PHONE_NO');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_YOUR_PHONE_NO');} ?>"
							},
							store_add_one: {
							 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS1_FIELD')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS1_FIELD');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDRESS1_FIELD');} ?>"
							},
							
							store_add_two: {
								required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS2_FIELD')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS2_FIELD');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDRESS2_FIELD');} ?>"
							},
							zip_code: {
							 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ZIPCODE')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_ZIPCODE');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_ZIPCODE');} ?>"
							},
							meta_keyword: {
							 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_META_KEYWORDS')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_META_KEYWORDS');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_META_KEYWORDS');} ?>"
							},
							meta_description: {
							 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_META_DESCRIPTION')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_META_DESCRIPTION');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_META_DESCRIPTION');} ?>"
							},
							website: {
							 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_WEBSITE')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_WEBSITE');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_WEBSITE');} ?>"
							},
							location: {
							 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_LOCATION')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_LOCATION');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_LOCATION');} ?>"
							},
							
							commission: {
							 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_COMMISSION')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_COMMISSION');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_COMMISSION');} ?>"
							},
							file: {
							 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_CHOOSE_YOUR_UPLOAD_FILE')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_CHOOSE_YOUR_UPLOAD_FILE');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_CHOOSE_YOUR_UPLOAD_FILE');} ?>"
							},
							select_country: {
							 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_SELECT_COUNTRY')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_SELECT_COUNTRY');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_SELECT_COUNTRY');} ?>"
							},
							select_city: {
							 	required: "<?php if (Lang::has(Session::get('lang_file').'.PLEASE_SELECT_CITY')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_SELECT_CITY');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_SELECT_CITY');} ?>"
							},
							
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
    
	<!-- Themes switcher section ============================================================================================= -->


</body>
</html>