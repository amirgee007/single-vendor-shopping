<?php /* <body style="overflow-x: hidden;"> */ ?>
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb" id="blgpgli">
    <li><a href="{{ url('') }}">@if (Lang::has(Session::get('lang_file').'.HOME')!= '') {{ trans(Session::get('lang_file').'.HOME') }} @else {{ trans($OUR_LANGUAGE.'.HOME') }} @endif</a> <span class="divider">/</span></li>
    <li><a href="{{ url('blog') }}">@if (Lang::has(Session::get('lang_file').'.BLOG')!= '') {{ trans(Session::get('lang_file').'.BLOG') }} @else {{ trans($OUR_LANGUAGE.'.BLOG') }} @endif</a> <span class="divider">/</span></li>
    <li class="active">@if (Lang::has(Session::get('lang_file').'.BLOG')!= '') {{ trans(Session::get('lang_file').'.BLOG') }} @else {{ trans($OUR_LANGUAGE.'.BLOG') }} @endif</li>
    </ul>	
    <div id="log_grid_1" class="logcontainer paginated">
    @if(count($get_blog_list) > 0)  
    @foreach($get_blog_list as $fetchblog_list)  
    <div class="logrow log_grid_1_record">
    <h4> 
	@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
	@php	$blog_title = 'blog_title'; @endphp
	@else @php  $blog_title = 'blog_title_'.Session::get('lang_code'); @endphp @endif
	{{ $fetchblog_list->$blog_title }}</h4>
    <ul class="breadcrumb" style="background:none;" id="blgpgli">
    <li><span><?php   $created_date =  $fetchblog_list->blog_created_date;
					  $explode_date = explode(" ",$created_date);
					echo  date('l jS \of F Y', strtotime($explode_date[0]));?>&nbsp;|</span></li>
    <li><span>@if (Lang::has(Session::get('lang_file').'.POSTED_BY')!= '') {{  trans(Session::get('lang_file').'.POSTED_BY') }} @else {{ trans($OUR_LANGUAGE.'.POSTED_BY') }} @endif  <a>@if (Lang::has(Session::get('lang_file').'.ADMIN')!= '') {{  trans(Session::get('lang_file').'.ADMIN') }} @else {{ trans($OUR_LANGUAGE.'.ADMIN') }} @endif</a>| </span></li>
    
    <li><i class="icon-comment-alt"></i><a href="{{ url('blog_comment/'. $fetchblog_list->blog_id) }}">
    {{ $get_blog_list_count[$fetchblog_list->blog_id] }} 
   @if (Lang::has(Session::get('lang_file').'.COMMENTS')!= '') {{ trans(Session::get('lang_file').'.COMMENTS') }} @else {{ trans($OUR_LANGUAGE.'.COMMENTS') }} @endif</a> <span class="divider">/</span></li>
  
    </ul>
	<div class="row">	
    <div class="span4 blog-pad" id="blgimgbttm">  
      
      @php  $product_image     = $fetchblog_list->blog_image;
             
            $prod_path  = url('').'/public/assets/default_image/No_image_blog.png';
            $img_data   = "public/assets/blogimage/".$product_image; @endphp
            
           @if(file_exists($img_data) && $product_image!='' )   
             
            
         @php   $prod_path = url('public/assets/blogimage/').'/'.$product_image; @endphp                 
            @else  
                @if(isset($DynamicNoImage['blog'])) 
                
                 @php   $dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['blog']; @endphp
                   @if($DynamicNoImage['blog']!='' && file_exists($dyanamicNoImg_path)) 
                      @php  $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
                @endif
            @endif
			<img src="{{ $prod_path }}" width="320" height="190" class="blog-img">
            </div>
              <div class="span4"> 
              <div class="span4 social_share" style="margin-left:0px;">
			    <ul style="list-style-type:none;margin-left:0px;">
                <li><div class="colabs-sc-twitter fl" style="margin-left:9px;"><iframe frameborder="0" id="twitter-widget-0" scrolling="no" allowtransparency="true" src="http://platform.twitter.com/widgets/tweet_button.1401325387.html#_=1401683471204&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=<?php echo url(''); ?>&amp;size=m&amp;text=<?php echo $fetchblog_list->$blog_title; ?>&amp;url=<?php echo url(''); ?>/blog" class="twitter-share-button twitter-tweet-button twitter-share-button twitter-count-horizontal" title="@if (Lang::has(Session::get('lang_file').'.TWITTER_TWEET_BUTTON')!= '') {{ trans(Session::get('lang_file').'.TWITTER_TWEET_BUTTON') }} @else {{ trans($OUR_LANGUAGE.'.TWITTER_TWEET_BUTTON') }} @endif" data-twttr-rendered="true" style="width: 109px; height: 20px;"></iframe><script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></div></li>
                <li><div class="shortcode-google-plusone fl"><div style="text-indent: 0px; margin: 0px; padding: 0px; background: none repeat scroll 0% 0% transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px;" id="___plusone_0"><iframe width="100%" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" id="I0_1401683471225" name="I0_1401683471225" src="https://apis.google.com/_/+1/fastbutton?usegapi=1&amp;annotation=bubble&amp;size=medium&amp;origin=http%3A%2F%2Fcolorlabsproject.com&amp;url=<?php echo url('blog/'.$fetchblog_list->blog_id); ?>&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.Xh27AGpQ8ys.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Fz%3Dzcms%2Frs%3DAItRSTPG4IuYlgUtku52bcizMHeeQ1ZTOA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1401683471225&amp;parent=http%3A%2F%2Fcolorlabsproject.com&amp;pfname=&amp;rpctoken=22542457" data-gapiattached="true" title="+1"></iframe></div></div></li>
                
<li><div class="colabs-fblike fl">
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.nexploc.com%2Fblog<?php echo $fetchblog_list->blog_id; ?>%2F1&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=21&amp;appId=586410728144592" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
</div></li>
	</ul></div>
  
   <div style="text-align:justify !important;"> 
    @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
	@php	$blog_desc = 'blog_desc'; @endphp
	 @else @php  $blog_desc = 'blog_desc_'.Session::get('lang_code'); @endphp @endif
   {{ substr($fetchblog_list->$blog_desc,0,400) }}<b>...</b><br>
<div class="blgbtn"><a class="btn btn-small pull-right btn-danger" href="{{ url('blog_view/'.$fetchblog_list->blog_id) }}">@if (Lang::has(Session::get('lang_file').'.CONTINUE_READING')!= '') {{  trans(Session::get('lang_file').'.CONTINUE_READING') }} @else {{ trans($OUR_LANGUAGE.'.CONTINUE_READING') }} @endif </a>
				<br class="clr"/>
				</div>
   </div>
 
    </div>
   
   	
				
           </div>
			
		

	</div>
      	<hr class="soft"/>
        
        @endforeach  @else 
      <h4 style="color:#F00;">@if (Lang::has(Session::get('lang_file').'.NO_BLOGS_AVAILABLE')!= '') {{  trans(Session::get('lang_file').'.NO_BLOGS_AVAILABLE') }} @else {{ trans($OUR_LANGUAGE.'.NO_BLOGS_AVAILABLE') }} @endif...</h4>
      @endif
      </div>
</div>

<div class="span3" id="sidebar">


<div class="row">
    
    </div>
    
    <div class="clearfix"></div>
<div class="thumbnail"><h5>@if (Lang::has(Session::get('lang_file').'.CATEGORIES')!= '') {{ trans(Session::get('lang_file').'.CATEGORIES') }} @else {{ trans($OUR_LANGUAGE.'.CATEGORIES') }} @endif</h5>
<legend></legend>
<ul class="topnav blog-menu">
   @foreach($getheader_category as $fetch_heder_category) 
	<li><a class="active" href="{{ url('blog_category/'.$fetch_heder_category->mc_id) }}">
	 @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
	@php	$mc_name = 'mc_name'; @endphp
	 @else @php  $mc_name = 'mc_name_'.Session::get('lang_code');  @endphp @endif
	{{ $fetch_heder_category->$mc_name }}</a></li>
    @endforeach
</ul>
</div>
		<br>
       
        <div class="row">
        <div class="span3 thumbnail">
        <h5>@if (Lang::has(Session::get('lang_file').'.POPULAR_POSTS')!= '') {{  trans(Session::get('lang_file').'.POPULAR_POSTS') }} @else {{ trans($OUR_LANGUAGE.'.POPULAR_POSTS') }} @endif</h5>
        <legend></legend>
        <ul class="topnav post-menu">
        @php $count_popular= count($get_blog_list_popular);
		$pp = 1; @endphp
		 @foreach($get_blog_list_popular as $fetch_popular_post) 
		 
        <li><a style="text-align:left !important" href="{{ url('blog_view/'.$fetch_popular_post->blog_id) }}"  > 
		@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
		@php  $blog_title = 'blog_title'; @endphp
	    @else @php  $blog_title = 'blog_title_'.Session::get('lang_code'); @endphp @endif
		{{ $fetch_popular_post->$blog_title }}</a></li>
		@if($count_popular != $pp)
        
        <hr class="soft"/>
        @endif
       
        @php $pp++; @endphp @endforeach
        </ul>
        </div>
        </div>
      		
	</div>
	</div>
 </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<!-- <script src="{{ url('') }}/themes/js/jquery-1.10.0.min.js"></script> -->
	{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="{{ url('') }}/themes/js/jquery.js" type="text/javascript"></script>
 @if($get_blog_comment_check) 
 @foreach($get_blog_comment_check as $check_comment_by_admin)  @endforeach  @php $check_comment_byadmin = $check_comment_by_admin->bs_postsppage;  @endphp
 @else @php $check_comment_byadmin=0;@endphp @endif
<script>
 $(function() {
 $('#log_grid_1.paginated').each(function() {
 var currentPage = 0;
 var numPerPage = <?php echo $check_comment_byadmin; ?>;
 var $grid = $(this);
 $grid.bind('repaginate', function() {
 $grid.find('.log_grid_1_record').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
 });
 $grid.trigger('repaginate');
 var numRows = $grid.find('.log_grid_1_record').length;
 var numPages = Math.ceil(numRows / numPerPage);
 var $pager = $('<div> <b style="color:#F60" > Pages >></b> </div>');
 for (var page = 0; page < numPages; page++) {
 $('<span style="cursor:pointer;padding-left:5px;color:green;font-weight:800;" ></span>').text(page + 1).bind('click', {
 newPage: page
 }, function(event) {
 currentPage = event.data['newPage'];
 $grid.trigger('repaginate');
 $(this).addClass('active').siblings().removeClass('active');
 }).appendTo($pager).addClass('clickable');
 }
 $pager.insertBefore($grid).find('span.page-number:first').addClass('active');
 });
 });
</script>
    <script src="{{ url('') }}/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="{{ url('') }}/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="{{ url('') }}/themes/js/bootshop.js"></script>
    <script src="{{ url('') }}/themes/js/jquery.lightbox-0.5.js"></script> 
    
<!-- <script src="{{ url('') }}/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script> -->
     <script type="text/javascript">
$(document).ready(function(){

$("#searchbox").keyup(function(e) 
{

var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;
if(searchbox=='')
{
$("#display").html("").hide();	
}
else
{
	var passData = 'searchword='+ searchbox;
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
</script>
    <script src="{{ url('') }}/plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>
    <script src="{{ url('') }}/plug-k/demo/js/demo.js" type="text/javascript"></script>
	
`
<script type="text/javascript" src="{{ url('') }}/themes/js/jquery-1.5.2.min.js"></script>
	<script type="text/javascript" src="{{ url('') }}/themes/js/scriptbreaker-multiple-accordion-1.js"></script>
    <script language="JavaScript">
    
    $(document).ready(function() {
        $(".topnav").accordion({
            accordion:true,
            speed: 500,
            closedSign: '<span class="icon-chevron-right"></span>',
            openedSign: '<span class="icon-chevron-down"></span>'
        });
    });
    
    </script>
	
	<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
	</script>
</body>
</html>