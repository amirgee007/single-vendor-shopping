<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Laravel Ecommerce Multivendor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    	
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo url(); ?>/themes/css/jquery.steps.css">

   
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo url(); ?>/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?php echo url(); ?>/themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive-->	
	<link href="<?php echo url(); ?>/themes/css/planing.css" rel="stylesheet"/>
	<link href="<?php echo url(); ?>/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?php echo url(); ?>/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?php echo url(); ?>/themes/css/jquery-gmaps-latlon-picker.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo url(); ?>/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url(); ?>/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo url(); ?>/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo url(); ?>/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo url(); ?>/themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
   
        
            
  </head>
<body>
<div id="header">
{{ $navbar }}
<div class="container">

<!-- Navbar ================================================== -->
{{ $header }}


</div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	
<!-- Sidebar end=============================================== -->
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Myprofile</li>
    </ul>
    
        @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{{ implode('', $errors->all(':message<br>')) }}
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >×</button>
        </div>
		</ul>	
		@endif
         @if (Session::has('mail_exist'))
		<div class="alert alert-warning alert-dismissable">{{ Session::get('mail_exist') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
         @if (Session::has('result'))
		<div class="alert alert-success alert-dismissable">{{ Session::get('result') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
	<h3 style="margin-bottom:0px;">Welcome to merchant sign up!</h3>
    <p style="padding-bottom:20px;">You will now be guided through a few steps to create your own personal online store!</p>
  
    <div class="content">
            

            <script>
                $(function ()
                {
                    $("#wizard").steps({
                        headerTag: "h2",
                        bodyTag: "section",
                        transitionEffect: "slideLeft"
                    });
                });
            </script>
            
 {{ Form::open(array('url'=>'merchant_signup','action'=>'merchant_signup_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) }}
            <div id="wizard">
                  <h2>Finish</h2>
                                
                <section>
                
                <h4 style="padding:10px;background:#eee;">Create your store: Finish</h4>
           
                 <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label span2">Store Name:<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" id="store_name" name="store_name" placeholder="" class="form-control span5" value="{{ Input::old('store_name') }}">
                    </div>
                </div>
                <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label span2">Phone:<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" id="store_pho" name="store_pho" placeholder="" class="form-control span5" value="{{ Input::old('store_pho') }}">
                    </div>
                </div>
                <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label span2">Address1:<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" id="store_add_one" name="store_add_one" placeholder="" class="form-control span5" value="{{ Input::old('store_add_one') }}">
                    </div>
                </div>
                <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px" >
               <label for="text1" class="control-label span2">Address2:<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" id="store_add_two" name="store_add_two" placeholder="" class="form-control span5" value="{{ Input::old('store_add_two') }}">
                    </div>
                </div>
                <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label span2">City:<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                      <select class="span5" name="select_country" id="select_country" onChange="select_city_ajax(this.value)" >
                        <option value="">-- Select --</option>
                          <?php foreach($country_details as $country_fetch){ ?>
                   <option value="<?php echo $country_fetch->co_id; ?>"><?php echo $country_fetch->co_name; ?></option>
                     <?php } ?>
                 </select>
                    </div>
                </div>
                
                <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label span2">City:<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                      <select class="span5" name="select_city" id="select_city" >
                  <option value="">--Select--</option>
                  </select>
                    </div>
                </div>
                  <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label span2">zipcode:<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" id="zip_code" name="zip_code"  placeholder="" class="form-control span5" value="{{ Input::old('zip_code') }}">
                    </div>
                </div>
               <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
                    <label class="control-label span2" for="text1">Meta keywords<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                       <textarea  class="form-control span5" name="meta_keyword" id="meta_keyword" >{{ Input::old('meta_keyword') }}</textarea>
                    </div>
                </div>
                
                <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
                    <label class="control-label span2" for="text1">Meta description<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                       <textarea id="meta_description"  name="meta_description" class="form-control span5">{{ Input::old('meta_description') }}</textarea>
                    </div>
                </div>
                
                <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
                    <label class="control-label span2" for="text1">Website<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control span5" placeholder="" id="website" name="website" value="{{ Input::old('website') }}"  >
                    </div>
                </div>
                
                                      <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">

  <fieldset class="gllpLatlonPicker">
  <div class="form-group">
    <label class="control-label span2" for="text1">Enter Your Store Location <small class="text-sub">*</small></label>
    <input type="text" name="location" class="gllpSearchField " placeholder="Type Your Location Here" style="    margin-left: 0px;">
    <br><br>
     <label class="control-label span2"></label><input type="button" class="gllpSearchButton form-control span2" value="Search" style="background: #00B381;
    padding: 7px;
    font-size: 14px;
    color: white;font-family:lato;margin-bottom: 15px;
    margin-top: -22px;
    margin-left: 0px;">
    </div>
   <br>
    <div class="gllpMap">Google Maps</div>
    <br/>
     <div class="form-group">
    <label class="control-label span2" for="text1">Latitude <small class="text-sub">*</small></label>
      <input type="text" name="latitude" class="gllpLatitude form-control span5" value="20"/>
      
        </div><br>
         <div class="form-group"><br>
       <label class="control-label span2" for="text1">Longitude <small class="text-sub">*</small></label><input type="text" name="longitude" class="gllpLongitude form-control span5" value="20"/>
       </div>
    <input type="text" class="gllpZoom"  style="visibility:hidden">
    <input class="gllpUpdateButton" style="visibility:hidden">
    <br/>
  </fieldset>

 
</form>
                
                
                
                
              
                
                <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
                    <label class="control-label span2" for="text1">Commission<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control span5" placeholder="" id="commission" name="commission" value="{{ Input::old('commission') }}"  ><span>%</span>
                    </div>
                </div>
                
               <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label span2">Image upload size:<span class="text-sub">*</span></label>

                    <div class="col-lg-4 pull-left">
                      <input type="file" placeholder="Fruit ball"  id="file" name="file" style="border:none;">
                    </div>
                </div>
                
                <br>
                <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
                    <label class="control-label span2" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad"  type="submit" id="submit"><a style="color:#fff">Finish</a></button>
                     
                   
                    </div>
            
                </div>
                
                </form>
                </section>

                <h2>Sign Up</h2>
                
                <section>
             <h4 style="padding:10px;background:#eee;">Create your store: Sign Up</h4>
                   <div class="row-fluid">
                  
                  
                   <div class="span6">
                  
                   <div class="form-group" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label col-lg-2">First name:<span class="text-sub">*</span></label>

                    <div class="col-lg-5">
                        <input type="text" id="first_name" name="first_name" placeholder="" class="form-control span5" tabindex="1" >
                    </div>
                </div>
                <div class="form-group" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label col-lg-2">E-mail:<span class="text-sub">*</span></label>

                    <div class="col-lg-5">
                        <input type="text" id="email_id" name="email_id" placeholder="" class="form-control span5" tabindex="3">
                    </div>
                </div>
                <div class="form-group" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label col-lg-2">Select City:<span class="text-sub">*</span></label>

                    <div class="col-lg-5">
                        <select class="form-control" name="select_mer_city" id="select_mer_city" tabindex="5" >
           				<option value="">--Select--</option>
                  </select>
                    </div>
                </div>
                <div class="form-group" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label col-lg-2">Address 1:<span class="text-sub">*</span></label>

                    <div class="col-lg-5">
                        <input type="text" id="addreess_one" name="addreess_one" placeholder="" class="form-control span5" tabindex="7">
                    </div>
                </div>
                <div class="form-group" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label col-lg-2">Payment Email:<span class="text-sub"></span></label>
                    <div class="col-lg-5">
                        <input type="text"  id="payment_account" name="payment_account" placeholder="" class="form-control span5" tabindex="9">
                    </div>
                </div>
                
                
                   </div>
                   
                   <div class="span6">
                   <div class="form-group" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label col-lg-2">Last name:<span class="text-sub">*</span></label>

                    <div class="col-lg-5">
                        <input type="text" id="last_name"  name="last_name" placeholder="" class="form-control span5" tabindex="2">
                    </div>
                </div>
                <div class="form-group" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label col-lg-2">Select Country:<span class="text-sub">*</span></label>

                    <div class="col-lg-5">
                      <select class="control-label span5" name="select_mer_country" id="select_mer_country" onChange="select_mer_city_ajax(this.value)" tabindex="4" >
                        <option value="">-- Select --</option>
                          <?php foreach($country_details as $country_fetch){ ?>
          				 <option value="<?php echo $country_fetch->co_id; ?>"><?php echo $country_fetch->co_name; ?></option>
           				   <?php }?>
       					 </select>
                    </div>
                </div>
                <div class="form-group" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label col-lg-2">Phone:<span class="text-sub">*</span></label>

                    <div class="col-lg-5">
                        <input type="text" id="phone_no" name="phone_no" placeholder="" class="form-control span5" tabindex="6">
                    </div>
                </div>
                   
                   <div class="form-group" style="margin-top:10px; margin-bottom:10px">
               <label for="text1" class="control-label col-lg-2">Address 2:<span class="text-sub">*</span></label>

                    <div class="col-lg-5">
                        <input type="text" id="address_two" name="address_two" placeholder="" class="form-control span5" tabindex="8">
                    </div>
                </div>
                   </div>
                   
                   
                   
                  
                   </div>
                </section>

              

                
                
            </div>
     
    
        </div>	
    
	
</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	{{ $footer }}
<!-- Placed at the end of the document so the pages load faster ============================================= -->

	<script src="<?php echo url(); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
 
	<script src="<?php echo url(); ?>/themes/js/bootshop.js"></script>
<!--    <script src="<?php echo url(); ?>/themes/js/jquery.lightbox-0.5.js"></script>-->
        <script src="<?php echo url('')?>/assets/plugins/jquery-2.0.3.min.js"></script>
        
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
 
    <script src="<?php echo url();?>/themes/js/jquery.steps.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
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
 <script src="<?php echo url(); ?>/themes/js/jquery-gmaps-latlon-picker.js"></script>
  
   
      <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    
	<!-- Themes switcher section ============================================================================================= -->


</body>
</html>