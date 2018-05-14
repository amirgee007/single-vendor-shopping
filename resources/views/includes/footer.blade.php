<?php foreach($get_contact_det as $enquiry_det){}?>
<div id="login4" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" style="display:none;">
		  <div class="modal-header">
		  	{{ Form::button('×',['class' => 'close' , 'data-dismiss' => 'modal','aria-hidden' => 'true']) }}
			
			<h3>{{ (Lang::has(Session::get('lang_file').'.REQUEST_FOR_ADVERTISEMENT')!= '') ?  trans(Session::get('lang_file').'.REQUEST_FOR_ADVERTISEMENT'): trans($OUR_LANGUAGE.'.REQUEST_FOR_ADVERTISEMENT') }}</h3>
		  </div>
        <div id="error_name"  style="color:#F00;font-weight:400"  > </div>
		  <div class="modal-body">
			
      
  {!! Form::open(array('url'=>'user_ad_ajax','id'=>'uploadform','enctype'=>'multipart/form-data')) !!}
            	<div class="form-group">
                    <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('lang_file').'.AD_TITLE')!= '') ?  trans(Session::get('lang_file').'.AD_TITLE') : trans($OUR_LANGUAGE.'.AD_TITLE') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    	{{ Form::text('ad_title','',array('id'=>'ad_title','class' => 'form-control span5','placeholder' => 'Enter Ad Title')) }}
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('lang_file').'.ADS_POSITION')!= '') ?  trans(Session::get('lang_file').'.ADS_POSITION') : trans($OUR_LANGUAGE.'.ADS_POSITION') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                     <select class="form-control span5" id="ad_pos" name="ad_pos">
           <option value="0">{{ (Lang::has(Session::get('lang_file').'.SELECT_POSITION')!= '') ?  trans(Session::get('lang_file').'.SELECT_POSITION'): trans($OUR_LANGUAGE.'.SELECT_POSITION')}}</option>
            <option value="1">{{ (Lang::has(Session::get('lang_file').'.HEADER_RIGHT')!= '') ?  trans(Session::get('lang_file').'.HEADER_RIGHT') : trans($OUR_LANGUAGE.'.HEADER_RIGHT')}}</option>
            <option value="2">{{ (Lang::has(Session::get('lang_file').'.LEFT_SIDE_BAR')!= '') ?  trans(Session::get('lang_file').'.LEFT_SIDE_BAR'): trans($OUR_LANGUAGE.'.LEFT_SIDE_BAR')}}</option>
            <option value="3">{{ (Lang::has(Session::get('lang_file').'.BOTTOM_FOOTER')!= '') ?  trans(Session::get('lang_file').'.BOTTOM_FOOTER'): trans($OUR_LANGUAGE.'.BOTTOM_FOOTER')}}</option>
        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('lang_file').'.PAGES')!= '') ?  trans(Session::get('lang_file').'.PAGES'): trans($OUR_LANGUAGE.'.PAGES') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control span5" id="ad_pages" name="ad_pages">
          <option value="0">{{ (Lang::has(Session::get('lang_file').'.SELECT_ANY_PAGE')!= '') ? trans(Session::get('lang_file').'.SELECT_ANY_PAGE'): trans($OUR_LANGUAGE.'.SELECT_ANY_PAGE')}}</option>
            <option value="1">{{ (Lang::has(Session::get('lang_file').'.HOME')!= '') ?   trans(Session::get('lang_file').'.HOME') : trans($OUR_LANGUAGE.'.HOME') }}</option>
            <option value="2">{{ (Lang::has(Session::get('lang_file').'.SPORTS')!= '') ?  trans(Session::get('lang_file').'.SPORTS') : trans($OUR_LANGUAGE.'.SPORTS') }}</option>
            <option value="3">{{ (Lang::has(Session::get('lang_file').'.ELECTRONICS')!= '') ?  trans(Session::get('lang_file').'.ELECTRONICS'): trans($OUR_LANGUAGE.'.ELECTRONICS') }}</option>
            <option value="4">{{ (Lang::has(Session::get('lang_file').'.FLOWER_POT')!= '') ?  trans(Session::get('lang_file').'.FLOWER_POT') : trans($OUR_LANGUAGE.'.FLOWER_POT') }}</option>
		  <option value="5">{{ (Lang::has(Session::get('lang_file').'.HEALTH')!= '') ?  trans(Session::get('lang_file').'.HEALTH') : trans($OUR_LANGUAGE.'.HEALTH') }}</option>
			  <option value="6">{{ (Lang::has(Session::get('lang_file').'.BEAUTY')!= '') ?  trans(Session::get('lang_file').'.BEAUTY'):  trans($OUR_LANGUAGE.'.BEAUTY') }}</option>
	
        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('lang_file').'.REDIRECT_URL')!= '') ?  trans(Session::get('lang_file').'.REDIRECT_URL'): trans($OUR_LANGUAGE.'.REDIRECT_URL')}}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    	{{ Form::text('ad_url','',array('id'=>'ad_url','class' => 'form-control span5','placeholder' => 'Enter Valid URL')) }}
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('lang_file').'.UPLOAD_IMAGES')!= '') ?  trans(Session::get('lang_file').'.UPLOAD_IMAGES') : trans($OUR_LANGUAGE.'.UPLOAD_IMAGES')}} <span class="text-sub">*</span></label>

                   <div class="col-lg-8">
		 <input type="file" name="file" id="file"  ><label> </label>
                    </div>
                </div>
            <br>
            <button type="button" id="upload_add" class="btn btn-success">{{ (Lang::has(Session::get('lang_file').'.UPLOAD')!= '') ?  trans(Session::get('lang_file').'.UPLOAD'): trans($OUR_LANGUAGE.'.UPLOAD') }}</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">{{ (Lang::has(Session::get('lang_file').'.CLOSE')!= '') ?  trans(Session::get('lang_file').'.CLOSE'): trans($OUR_LANGUAGE.'.CLOSE') }}</button>
            </div>	

            {{ Form::close() }}
		  </div>
	</div>
<div  id="footerSection">
	<div class="container">
		<div class="footer">
			
			<div class="mob-contact">
				<h5>{{ (Lang::has(Session::get('lang_file').'.CONTACT')!= '') ?  trans(Session::get('lang_file').'.CONTACT'): trans($OUR_LANGUAGE.'.CONTACT')}}</h5>
				<a href="mailto:{{ $enquiry_det->es_contactemail }}"><i class="icon-envelope"></i>&nbsp;&nbsp;{{ $enquiry_det->es_contactemail}}</a> 
				@if($enquiry_det->es_skype_email_id!='') 
				<a href="skype:{{ $enquiry_det->es_skype_email_id }}"><img width="14" height="14" src="{{ url('')}}/themes/images/skype.png" title="skype" alt="skype"/> {{ $enquiry_det->es_skype_email_id }}</a>  
				@endif
				<a><i class="icon-phone-sign"></i>{{ $enquiry_det->es_phone1 }}</a> 
				<a><i class="icon-phone"></i>{{ $enquiry_det->es_phone2 }}</a>
                <a href="{{ url('contactus')}}"><i class="icon-map-marker"></i>{{ (Lang::has(Session::get('lang_file').'.CONTACT_US')!= '') ?  trans(Session::get('lang_file').'.CONTACT_US'): trans($OUR_LANGUAGE.'.CONTACT_US') }}</a> 
 
				@foreach($getanl as $getal)
				<?php
					echo $getal->sm_analytics_code;
					
				?>			
				@endforeach
			 </div>
			 <div class="" id="socialMedia">
			 	<h5>{{ (Lang::has(Session::get('lang_file').'.ABOUT_COMPANY')!= '') ?  trans(Session::get('lang_file').'.ABOUT_COMPANY'): trans($OUR_LANGUAGE.'.ABOUT_COMPANY') }}</h5>
			 	<ul class="fot">
			 	
					<li><a href="{{ url('index') }}">{{ (Lang::has(Session::get('lang_file').'.HOME')!= '')  ?  trans(Session::get('lang_file').'.HOME'): trans($OUR_LANGUAGE.'.HOME') }}</a></li>
			 		<li><a href="{{ url('blog')}}">{{ (Lang::has(Session::get('lang_file').'.BLOG')!= '') ?  trans(Session::get('lang_file').'.BLOG') : trans($OUR_LANGUAGE.'.BLOG')}}</a></li> 
					<li><a href="{{ url('aboutus')}}">{{ (Lang::has(Session::get('lang_file').'.ABOUT_US')!= '') ?  trans(Session::get('lang_file').'.ABOUT_US'): trans($OUR_LANGUAGE.'.ABOUT_US')}}</a></li> 
					<?php  /*
			 		<!--<li><a href="<?php echo url('products'); ?>">Products</a></li>
			 		<li><a href="<?php echo url('deals'); ?>">Deals</a></li>
			 		<li><a href="<?php echo url('stores'); ?>">Stores</a></li>
			 		<li><a href="<?php echo url('sold'); ?>">Sold</a></li>
					<li><a href="<?php echo url('blog'); ?>">Blog</a></li> 
			 		<li><a href="<?php echo url('contactus'); ?>">Contact Us</a></li>-->*/ ?>
					<?php if(isset($cms_page_title)) { foreach($cms_page_title as $cms){ if($cms->cp_title !="Help") { ?>
					<li><a href="{{ url('cms/'.$cms->cp_id) }}"><?php  
					if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
						  $cp_title = 'cp_title';
					}else {  $cp_title = 'cp_title_'.Session::get('lang_code'); }
					echo $cms->$cp_title; ?></a></li>
					<?php } } } ?>
					
				<?php 
				   /* foreach($gt as $list) 
					{ 
						?>
						<li><a href="<?php echo url("pageview")."/".$list->cp_id; ?>"> <?php echo $list->cp_title; ?></a></li> <br />
						<?php 
						#echo $list->cp_description; 
				    }   */ 
				?>
					
			 	</ul>
			 </div>
			<div class="" id="socialMedia">    
                <h5>{{ (Lang::has(Session::get('lang_file').'.SOCIAL_MEDIA')!= '') ?  trans(Session::get('lang_file').'.SOCIAL_MEDIA') : trans($OUR_LANGUAGE.'.SOCIAL_MEDIA')}} </h5>
            
                @if($get_social_media_url)  @foreach($get_social_media_url as $social_sttings_url)  @endforeach
				@if($social_sttings_url->sm_fb_page_url !='') 
				<a href="{{ $social_sttings_url->sm_fb_page_url}}" target="_blank" ><img width="24" height="24" src="{{ url('')}}/themes/images/facebook.png" title="facebook" alt="facebook"/></a> @endif
				 @if($social_sttings_url->sm_twitter_url != '')  
				<a href="{{ $social_sttings_url->sm_twitter_url}}" target="_blank"><img width="24" height="24" src="{{ url('')}}/themes/images/twitter.png" title="twitter" alt="twitter"/></a> @endif 
				@if($social_sttings_url->sm_youtube_url != '') 
				<a href="{{ $social_sttings_url->sm_youtube_url }}" target="_blank"><img width="24" height="24" src="{{ url('') }}/themes/images/youtube.png" title="youtube" alt="youtube"/></a>@endif
				  @if($social_sttings_url->sm_linkedin_url != '') 
                <a href="{{ $social_sttings_url->sm_linkedin_url }}" target="_blank"><img width="24" height="24" src="{{ url('') }}/themes/images/in.png" title="linkedin" alt="linkedin"/></a>@endif
                @endif
				
				@if($PLAYSTORE_URL!="" OR $APPLE_APPSTORE_URL!="")
				<h5>{{ (Lang::has(Session::get('lang_file').'.DOWNLOAD_OUR_APP')!= '') ?  trans(Session::get('lang_file').'.DOWNLOAD_OUR_APP') : trans($OUR_LANGUAGE.'.DOWNLOAD_OUR_APP') }}</h5>
				@if($PLAYSTORE_URL!="")
				<a href="{{ $PLAYSTORE_URL }}">Playstore</a>
				@endif
				@if($APPLE_APPSTORE_URL!="")
				<a href="{{ $APPLE_APPSTORE_URL }}">Apple App Store</a>
				@endif
				@endif
				
			 </div>
			 <div class="mob-news">
				<h5>{{ (Lang::has(Session::get('lang_file').'.NEWS_LETTER_SUBSCRIPTION')!= '') ?  trans(Session::get('lang_file').'.NEWS_LETTER_SUBSCRIPTION') : trans($OUR_LANGUAGE.'.NEWS_LETTER_SUBSCRIPTION') }}</h5>
				<p>{{ (Lang::has(Session::get('lang_file').'.SUBSCRIBE_TO_RECEIVE_THE_LATEST_NEWS_STRAIGHT_TO_YOUR_INBOX._BY_SUBSCRIBING_YOU_WILL_BE_ABLE_TO')!= '') ?  trans(Session::get('lang_file').'.SUBSCRIBE_TO_RECEIVE_THE_LATEST_NEWS_STRAIGHT_TO_YOUR_INBOX._BY_SUBSCRIBING_YOU_WILL_BE_ABLE_TO') : trans($OUR_LANGUAGE.'.SUBSCRIBE_TO_RECEIVE_THE_LATEST_NEWS_STRAIGHT_TO_YOUR_INBOX._BY_SUBSCRIBING_YOU_WILL_BE_ABLE_TO')}}:</p>
				<a href="{{ url('newsletter')}}"><button class="sub-but">{{ (Lang::has(Session::get('lang_file').'.SUBSCRIBE_HERE')!= '') ?  trans(Session::get('lang_file').'.SUBSCRIBE_HERE') : trans($OUR_LANGUAGE.'.SUBSCRIBE_HERE') }}</button></a>
				<br/>
				
			 </div>
			 
			 		 
			<div id="socialMedia" class="mob-payment" >
				
                <h5>{{ (Lang::has(Session::get('lang_file').'.PAYMENT_METHOD')!= '') ?  trans(Session::get('lang_file').'.PAYMENT_METHOD'): trans($OUR_LANGUAGE.'.PAYMENT_METHOD')}}</h5>
				<img src="{{ url('')}}/themes/images/footer_cod.png">
				<img src="{{ url('')}}/themes/images/footer_paypol.png">
				<!--img src="<?php // echo url(''); ?>/themes/images/paypal-payment-logo.png" -->
				<h5>{{ (Lang::has(Session::get('lang_file').'.OUR_SERVICES')!= '') ? trans(Session::get('lang_file').'.OUR_SERVICES') : trans($OUR_LANGUAGE.'.OUR_SERVICES') }}</h5>
				<ul>
					<li><a href="{{ url('termsandconditons')}}">{{ (Lang::has(Session::get('lang_file').'.TERMS_&_CONDITIONS')!= '') ?  trans(Session::get('lang_file').'.TERMS_&_CONDITIONS') : trans($OUR_LANGUAGE.'.TERMS_&_CONDITIONS') }}</a></li>
					<li><a href="{{ url('help') }}">{{ (Lang::has(Session::get('lang_file').'.HELP')!= '')  ?  trans(Session::get('lang_file').'.HELP') :  trans($OUR_LANGUAGE.'.HELP') }}</a></li>
					<li><a href="{{ url('faq') }}">FAQ</a></li>
				</ul>
			 </div> 
             
             
		 </div><br>
		<div style="clear: both;">
         <p class="alignR">© <?php echo date("Y"); ?> <?php echo $enquiry_det->es_contactname; ?>, <?php if (Lang::has(Session::get('lang_file').'.ALL_RIGHTS_RESERVED')!= '') { echo  trans(Session::get('lang_file').'.ALL_RIGHTS_RESERVED');}  else { echo trans($OUR_LANGUAGE.'.ALL_RIGHTS_RESERVED');} ?>.
         </p>
     

          
      </div>
    
	</div><!-- Container End -->
	</div>


    <script type="text/javascript">
   
   
	$(window).load(function(){

$('#upload_add').click(function() {

var position=$("#ad_pos option:selected").val();
var page=$("#ad_pages option:selected").val();
 
	if($('#ad_title').val() == "")
	{
		$('#ad_title').css('border', '1px solid red'); 
		$('#ad_title').focus();
		return false;
	}
	else
	{
		$('#ad_title').css('border', ''); 
	}
	if(position==0)
	{
		$('#ad_pos').css('border', '1px solid red'); 
		$('#ad_pos').focus();
		return false;
	}
	else
	{
		$('#ad_pos').css('border', ''); 
	}
	if(page == 0)
	{
		$('#ad_pages').css('border', '1px solid red'); 
		$('#ad_pages').focus();
		return false;
	}
	else
	{
		$('#ad_pages').css('border', ''); 
	}
	if($('#ad_url').val() == "")
	{
		$('#ad_url').css('border', '1px solid red'); 
		$('#ad_url').focus();
		return false;
	}
	else
	{
		var txt = $('#ad_url').val();
		var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/
		if (re.test(txt)) 
		{
			 $('#ad_url').css('border', ''); 
		}
		else {
		 $('#ad_url').css('border', '1px solid red'); 
		$('#ad_url').focus();
		return false;
		}
		
	}
	if($('#file').val()=='')
	{
		 alert('Image field required!');
                 return false;
         }
	else
	 {
		
		var title=$('#ad_title').val();
		var pass="title="+title;
 			$.ajax( {
				type: 'get',
				 data: pass,
				 url: '<?php echo url('check_title'); ?>',
				 success: function(responseText){  
				 
					if(responseText=="success")
					{
				        $('#error_name').html('Thank You ,Your request should be processed soon');
						$("#uploadform").submit();	 
					}
					else
					{
						$('#ad_title').css('border', '1px solid red'); 
						$('#ad_title').focus();
						$('#error_name').html('Ad title already exists');
					}
					}	
				});

		

		
         }


});
    $('#news_result').hide();
	$('#newsletter').click(function()
      {
       var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      var sname4 = $('#sname4');
      if(sname4.val() == "" )
      {
       $(sname4).focus();
      $(sname4).css("border","red solid 1px");
      return false;
      }
      else if($.trim(sname4.val()) == "")
      {
      $(sname4).focus();
      $(sname4).css("border","red solid 1px");
      return false;
      }
       else if(!emailReg.test(sname4.val())) 
		 { 
		         $(sname4).focus();
     			 $(sname4).css("border","red solid 1px");
      return false;
      }
       
      else
      {
	   $('#newsletter').hide();
      $(sname4).css("border","#CCCCCC solid 1px");
      var passData = 'semail='+sname4.val();
		   $.ajax( {
			      type: 'GET',
				  data: passData,
				  url: '<?php echo url('front_newsletter_submit'); ?>',
				  success: function(responseText){  		 		
				 		//alert(responseText);
						  $('#news_result').show();
				 		 setTimeout(function() {  
        				 window.location.reload();
							},3000);
				 		
					   
				  						}		
			});
			return false;
    
      }
      });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$(".search").keyup(function(e) 
{

var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;
if(searchbox=='')
{
$("#display").html("").hide();	
}
else
{
	var passData = 'searchword='+ searchbox+'&url=<?php echo Route::getCurrentRoute()->uri(); ?>';
	//alert(passData);
	 $.ajax( {
			      type: 'GET',
				  data: passData,
				  url: '<?php echo url('autosearch'); ?>',
				  success: function(responseText){  
				  $("#display").html(responseText).show();	
}
});
}
return false;    

});
});


/*var __lc = {};
__lc.license = 4302571;

(function() {
 var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
 lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();*/

</script>

<script type="text/javascript">
/*var __lc = {};
__lc.license = 6132091;

(function() {
	var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
	lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();*/
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62671250-1', 'auto');
  ga('send', 'pageview');

</script>


<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>



<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="<?php echo url(''); ?>/themes/js/jquery-1.10.0.min.js"></script>
	<!-- sold page -->
	<script src="plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<script src="<?php echo url(''); ?>/themes/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo url(''); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo url(''); ?>/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo url(''); ?>/themes/js/bootshop.js"></script>
    <script src="<?php echo url(''); ?>/themes/js/jquery.lightbox-0.5.js"></script>
	<script src="<?php echo url(''); ?>/themes/js/compare-products/classie.js"></script>
	<script src="<?php echo url(''); ?>/themes/js/compare-products/main.js"></script>
	

	<!-- Product page -->
	 <!-- <script src="<?php //echo url('');?>/themes/js/modernizr.min.js"></script> -->
	<script src="<?php echo url(''); ?>/themes/js/jplist.min.js"></script>
	<script>
			$('document').ready(function(){
				$('#demo').jplist({
				
					itemsBox: '.list' 
					,itemPath: '.list-item' 
					,panelPath: '.jplist-panel'
					
					//save plugin state
					,storage: 'localstorage' //'', 'cookies', 'localstorage'			
					,storageName: 'jplist-div-layout'
					,redrawCallback: function(collection, $dataview, statuses){
						
							//this code occurs on every jplist action
						console.log('Change Image Source');
						$.each(document.images, function(){
							$(this).attr("src", $(this).data("src"));
						});
					}	
				});
				$(".loading_prnt").hide();
				$(".productLoading").css("opacity","1");

			});
	</script>
	<!-- productview page -->

	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="<?php echo url(''); ?>/themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="<?php echo url(''); ?>/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
</div>
<span id="themesBtn"></span>

<script type="text/javascript">
  
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
	<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
	</script>

<!--<script type="text/javascript">
$(document).ready(function(){
$('#welcomeLine').css({"background":"green"});
$('.test').css({"color":"green"});
$('.navbar .nav>.active>a, .navbar .nav>.active>a:focus, .navbar .nav>.active>a:hover').css({"background":"green"});
});
</script>-->