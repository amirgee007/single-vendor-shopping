{!! $navbar !!}


<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->

<div id="mainBody faq_main">
<div class="container">
@if($cms_result) 
 @foreach($cms_result as $cms) 
	@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') 
		@php $cp_title = 'cp_title'; 
		$cp_description = 'cp_description'; @endphp
	 @else  
		@php $cp_title = 'cp_title_'.Session::get('lang_code'); 
		$cp_description = 'cp_description_'.Session::get('lang_code');  @endphp
	@endif	
   @php $cms_desc = stripslashes($cms->$cp_description);   @endphp
  <h1 style="color:#ff8400;">{{  $cms->$cp_title }} </h1>
  <legend></legend>
  <div id="legalNotice">
	{{  $cms_desc }}
  </div>
 @endforeach
    @else 
 <h1 style="color:#ff8400;"></h1>
 <legend></legend>
 <div id="legalNotice">
	 @if (Lang::has(Session::get('lang_file').'.NO_DATA_FOUND')!= '') 
	  {{  trans(Session::get('lang_file').'.CATEGORIES') }}  
	  @else {{ trans($OUR_LANGUAGE.'.NO_DATA_FOUND') }} !
	 @endif
	</div>	
 </div>
@endif 
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

	{!! $footer  !!}

	

</body>
</html>