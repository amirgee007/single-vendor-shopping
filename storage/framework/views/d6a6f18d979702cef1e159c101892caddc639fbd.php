<?php echo $navbar; ?>


<!-- Navbar ================================================== -->
<?php echo $header; ?>

<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	
<!-- Sidebar end=============================================== -->
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="<?php echo e(url('/')); ?>"><?php if(Lang::has(Session::get('lang_file').'.HOME')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.HOME')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.HOME')); ?> <?php endif; ?></a> <span class="divider">/</span></li>
		<li class="active"><?php if(Lang::has(Session::get('lang_file').'.NEWS_LETTER')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NEWS_LETTER')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NEWS_LETTER')); ?> <?php endif; ?></li>
    </ul>
	<h4 style="padding:10px;background:#eee;"><?php if(Lang::has(Session::get('lang_file').'.SUBSCRIBE_YOUR_MAIL_ID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SUBSCRIBE_YOUR_MAIL_ID')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SUBSCRIBE_YOUR_MAIL_ID')); ?> <?php endif; ?></h4>
    
        <?php if($errors->any()): ?>
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable"><?php echo implode('', $errors->all(':message<br>')); ?>

         <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >×</button>
        </div>
		</ul>	
		<?php endif; ?>
         <?php if(Session::has('Error_letter')): ?>
		<div class="alert alert-warning alert-dismissable"><?php echo Session::get('Error_letter'); ?>

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		<?php endif; ?>
		<?php if(Session::has('subscribe')): ?>
		<div class="alert alert-warning alert-dismissable"><?php echo Session::get('subscribe'); ?>

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		<?php endif; ?>
		<div style=" position: relative;">

 
      
<div class="content">
   <div class="col-sm-12">
   <img src="<?php echo e(url('')); ?>/public/assets/themes/images/mail.jpg" class="hide-mob subsc-img" style="width:100% !important">
   	<div style="" class="subsc"><p><?php if(Lang::has(Session::get('lang_file').'.WELCOME_TO_SUBSCRIBE_YOUR_NEWS_LETTER_SUBSCRIPTION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.WELCOME_TO_SUBSCRIBE_YOUR_NEWS_LETTER_SUBSCRIPTION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.WELCOME_TO_SUBSCRIBE_YOUR_NEWS_LETTER_SUBSCRIPTION')); ?> <?php endif; ?>! <?php echo Form::open(array('url'=>'subscription_submit','class'=>'form-horizontal loginFrm')); ?>


			
               
           <div class="row">
		   <div class="subsc-textbox" style="">
		

                    
                        <input type="email" id="email" name="email" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_MAIL_ID_FOR_EMAIL_SUBSCRIPTION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_MAIL_ID_FOR_EMAIL_SUBSCRIPTION')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_MAIL_ID_FOR_EMAIL_SUBSCRIPTION')); ?> <?php endif; ?>" style=" padding: 3px 6px;" class="form-control span5 width-textsub" value="<?php echo Input::old('email'); ?>" required>
                   		  
								
			  <input type="submit" id="register_submit" class="btn btn-warning" value="<?php if(Lang::has(Session::get('lang_file').'.SUBSCRIBE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SUBSCRIBE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SUBSCRIBE')); ?> <?php endif; ?>" style="
    background: rgba(10, 135, 152, 0.9);
    border: none;"/>          
                       </div>
				
               
    </div>        
               

			  
			</form></p></div>

			</div>
			
	
</div>
</div>
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	<?php echo $footer; ?>

<!-- Placed at the end of the document so the pages load faster ============================================= -->
 <script src="<?php echo e(url('')); ?>/public/assets/plugins/jquery-2.0.3.min.js"></script>
<script src="<?php //echo url();?>/themes/js/jquery.steps.js"></script>
	<?php /*<script src="<?php echo url(); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
 
	<script src="<?php echo url(); ?>/themes/js/bootshop.js"></script>*/?>
	  
<!--    <script src="<?php //echo url(); ?>/themes/js/jquery.lightbox-0.5.js"></script>-->
       
        
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
	
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
	
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
   <script src="<?php echo e(url('')); ?>/themes/js/jquery-gmaps-latlon-picker.js"></script>
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
	
		<script type="text/javascript">
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
	</script>
	        <script src="https://demo.laravelecommerce.com/themes/js/jquery-1.10.0.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click", ".customCategories .topfirst b", function(){
			$(this).next("ul").css("position", "relative");
			
			$(".topfirst ul").not($(this).parents(".topfirst").find("ul")).css("display", "none");
			 $(this).next("ul").toggle();
		var thisContent = $(this).html();
			 if(thisContent == "+"){
			 	 $(this).html("-");
			 }
			 else{
			 	$(this).html("+");	
			 }
		});

		$(document).on("click", ".morePage", function(){
			$(".nextPage").slideToggle(200);
		});
		
		$(document).on("click", "#smallScreen", function(){
			$(this).toggleClass("customMenu");
		});

		$(window).scroll(function () {
			if ($(this).scrollTop() > 250) {
				$('#comp_myprod').show();
			}
			else{
				$('#comp_myprod').hide();
			}
		});


	});

	</script>



    
	<!-- Themes switcher section ============================================================================================= -->


</body>
</html>