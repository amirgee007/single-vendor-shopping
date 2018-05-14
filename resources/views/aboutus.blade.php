{!! $navbar !!}

<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container" id="abtpg">
	<div class="row">
	<?php $cms_desc = 'Yet To be Filled';  ?>
	@if($cms_result)  
		@foreach($cms_result as $cms) @endforeach
			@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')   
				@php $ap_description = 'ap_description'; @endphp
			 @else   @php $ap_description = 'ap_description_'.Session::get('lang_code'); @endphp 
			@endif

		@php $cms_desc = stripslashes($cms->$ap_description); @endphp
	 @else {{ $cms_desc }}  
	@endif 
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="{{  url('index') }}">@if (Lang::has(Session::get('lang_file').'.HOME')!= '') {{ trans(Session::get('lang_file').'.HOME') }}  @else {{ trans($OUR_LANGUAGE.'.HOME') }} @endif</a> <span class="divider">/</span></li>
		<li><a href="{{  url('aboutus') }}"> @if (Lang::has(Session::get('lang_file').'.ABOUT_US')!= '')  {{ trans(Session::get('lang_file').'.ABOUT_US') }}  @else {{ trans($OUR_LANGUAGE.'.ABOUT_US') }}  @endif</a> <span class="divider">/</span></li>
    </ul>
	<h3> {{ 'About Us' }}</h3>	
	<hr class="soft"/>
	<div id="legalNotice">
		{{ $cms_desc }}
	</div>
	</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	{!! $footer  !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="{{ url('') }}/themes/js/jquery.js" type="text/javascript"></script>
	<script src="{{ url('') }}/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="{{ url('') }}/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="{{ url('') }}/themes/js/bootshop.js"></script>
    <script src="{{ url('') }}/themes/js/jquery.lightbox-0.5.js"></script>
<!--	<script src="<?php //echo url(); ?>/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script>-->
     
<script src='http://code.jquery.com/jquery-1.9.1.min.js'></script>

   <script type="text/javascript" src="<{{ url('') }}/themes/js/jquery.js"></script>

<script src="{{ url('') }}/themes/js/magiczoomplus.js" type="text/javascript"></script>	
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