
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->

<div id="mainBody faq_main">
<div class="container">
<?php if($cms_result){ 

foreach($cms_result as $cms) { 
if($cms->cp_title =='Help') { 
	if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
		$cp_title = 'cp_title';
		$cp_description = 'cp_description';
	}else {  
		$cp_title = 'cp_title_'.Session::get('lang_code'); 
		$cp_description = 'cp_description_'.Session::get('lang_code'); 
	}
$cms_desc = stripslashes($cms->$cp_description);  ?>
<h1 style="color:#ff8400;"><?php echo $cms->$cp_title; ?> </h1>
<legend></legend>
<div id="legalNotice">
	<?php echo $cms_desc; ?>
</div>
<?php } } } else { ?>
<h1 style="color:#ff8400;"></h1>

<div id="legalNotice" >
	 @if (Lang::has(Session::get('lang_file').'.NO_DATA_FOUND')!= '') {{  trans(Session::get('lang_file').'.NO_DATA_FOUND') }}  @else {{  trans($OUR_LANGUAGE.'.NO_DATA_FOUND') }} @endif !
	</div>	
</div>
<?php }  ?>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

	{!! $footer  !!}

	

</body>
</html>