{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
	<?php if($cms_result){ foreach($cms_result as $cms) { } 
	if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
		$tr_description = 'tr_description';
	}else {  $tr_description = 'tr_description_'.Session::get('lang_code'); }
	$cms_desc = stripslashes($cms->$tr_description); } else { $cms_desc = 'Yet To be Filled';} ?>
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="<?php echo url('index');?>"><?php if (Lang::has(Session::get('lang_file').'.HOME')!= '') { echo  trans(Session::get('lang_file').'.HOME');}  else { echo trans($OUR_LANGUAGE.'.HOME');} ?></a> <span class="divider">/</span></li>
		<li><a href="<?php echo url('termsandconditons');?>"><?php if (Lang::has(Session::get('lang_file').'.TERMS_&_CONDITIONS')!= '') { echo  trans(Session::get('lang_file').'.TERMS_&_CONDITIONS');}  else { echo trans($OUR_LANGUAGE.'.TERMS_&_CONDITIONS');} ?></a> <span class="divider">/</span></li>
    </ul>
	<h3> <?php echo 'Terms & Conditions'; ?></h3>	
	<hr class="soft"/>
	<div id="legalNotice">
		<?php echo $cms_desc; ?>	
	</div>
	</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	{!! $footer  !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="<?php echo url(''); ?>/themes/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo url(''); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo url(''); ?>/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo url(''); ?>/themes/js/bootshop.js"></script>
    <script src="<?php echo url(''); ?>/themes/js/jquery.lightbox-0.5.js"></script>
<!--	<script src="<?php //echo url(); ?>/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script>-->
     
<script src='http://code.jquery.com/jquery-1.9.1.min.js'></script>

   <script type="text/javascript" src="<?php echo url(''); ?>/themes/js/jquery.js"></script>

<script src="<?php echo url(''); ?>/themes/js/magiczoomplus.js" type="text/javascript"></script>	
<script type="text/javascript">
	function setBarWidth(dataElement, barElement, cssProperty, barPercent) {
  var listData = [];
  $(dataElement).each(function() {
    listData.push($(this).html());
  });
  var listMax = Math.max.apply(Math, listData);
  $(barElement).each(function(index) {
    $(this).css(cssProperty, (listData[index] / listMax) * barPercent + "%");
  });
}
setBarWidth(".style-1 span", ".style-1 em", "width", 100);
setBarWidth(".style-2 span", ".style-2 span", "width", 55);

   
</script>

 <script type="text/javascript">
	  $.ajaxSetup({
	  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	  });
</script>  


</body>
</html>