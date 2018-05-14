
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody faq_main">
<div class="container">
<br>
<h1 style="color:#5BB75B;margin:0px;"><?php if (Lang::has(Session::get('lang_file').'.FAQ')!= '') { echo  trans(Session::get('lang_file').'.FAQ');}  else { echo trans($OUR_LANGUAGE.'.FAQ');} ?></h1>
<hr class="soften"/>	
<br>
<div class="accordion" id="accordion2">
	<?php $i=1;
	
	if(count($faq_result)>0) { ;

	foreach($faq_result as $faq) { ?>
	<div class="accordion-group">
	  <div class="accordion-heading">
		<h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $i; ?>">
		  <?php 
		  if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
			$faq_name = 'faq_name';
		  }else {  $faq_name = 'faq_name_'.Session::get('lang_code'); }
		  echo $faq->$faq_name; ?>
		</a></h4>
	  </div>
	  <div id="collapse<?php echo $i; ?>" class="accordion-body collapse"  >
		<div class="accordion-inner">
			 <?php
		if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
			$faq_ans = 'faq_ans';
		  }else {  $faq_ans = 'faq_ans_'.Session::get('lang_code'); }
			 echo $faq->$faq_ans; ?>
		</div>
	  </div>
	</div>
	<?php $i++;} 
}
else { 
	echo "No FAQ available!";
}
	 ?>
  </div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

	{!! $footer  !!}

	

</body>
</html>