
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
    <ul class="breadcrumb">
   @if($get_blog_list)  
        @foreach($get_blog_list as $fetchblog_list) @endforeach
    <li><a href="{{ url('') }}">@if (Lang::has(Session::get('lang_file').'.HOME')!= '') {{ trans(Session::get('lang_file').'.HOME') }} @else {{ trans($OUR_LANGUAGE.'.HOME') }} @endif</a> <span class="divider">/</span></li>
    <li><a href="{{ url('blog') }}">@if (Lang::has(Session::get('lang_file').'.BLOG')!= '') {{ trans(Session::get('lang_file').'.BLOG') }} @else {{ trans($OUR_LANGUAGE.'.BLOG') }} @endif</a> <span class="divider">/</span></li>
    <li class="active"> 
		@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
    @php    $blog_title = 'blog_title'; @endphp
    @else @php  $blog_title = 'blog_title_'.Session::get('lang_code'); @endphp @endif
    {{ $fetchblog_list->$blog_title }}</li>
    </ul>	
      @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
    @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">@if (Lang::has(Session::get('lang_file').'.YOU_HAVE_ERRORS_WHILE_PROVIDING_COMMENT')!= '') {{  trans(Session::get('lang_file').'.YOU_HAVE_ERRORS_WHILE_PROVIDING_COMMENT') }}  @else {{ trans($OUR_LANGUAGE.'.YOU_HAVE_ERRORS_WHILE_PROVIDING_COMMENT') }} @endif.
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
		</ul>	
		@endif
    <h4> 
		@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
    @php    $blog_title = 'blog_title'; @endphp
    @else @php  $blog_title = 'blog_title_'.Session::get('lang_code'); @endphp @endif
    {{ $fetchblog_list->$blog_title }}</h4>
    <ul class="breadcrumb" style="background:none;">
    <li><span><?php   $created_date =  $fetchblog_list->blog_created_date;
					  $explode_date = explode(" ",$created_date);
					echo  date('l jS \of F Y', strtotime($explode_date[0]));?>&nbsp;|</span></li>
    <li><a><span>@if (Lang::has(Session::get('lang_file').'.POSTED_BY')!= '') {{  trans(Session::get('lang_file').'.POSTED_BY') }} @else {{ trans($OUR_LANGUAGE.'.POSTED_BY') }} @endif    @if (Lang::has(Session::get('lang_file').'.ADMIN')!= '') {{  trans(Session::get('lang_file').'.ADMIN') }} @else {{ trans($OUR_LANGUAGE.'.ADMIN') }} @endif</a>| </span></li>
    
    <li><i class="icon-comment-alt"></i><a href="{{ url('blog_comment/'. $fetchblog_list->blog_id) }}">
    {{ $get_blog_list_count[$fetchblog_list->blog_id] }} 
   @if (Lang::has(Session::get('lang_file').'.COMMENTS')!= '') {{ trans(Session::get('lang_file').'.COMMENTS') }} @else {{ trans($OUR_LANGUAGE.'.COMMENTS') }} @endif</a> <span class="divider">/</span></li>
    
  
    </ul>
    
	<div class="row">
    	
    <div class="span4">  
        
              @php     $product_image     = $fetchblog_list->blog_image;
            
            $prod_path  = url('').'/public/assets/default_image/No_image_blog.png';
            $img_data   = "public/assets/blogimage/".$product_image; @endphp
            
            @if(file_exists($img_data) && $product_image!='' )   
             
            
          @php  $prod_path = url('public/assets/blogimage/').'/'.$product_image;   @endphp               
            @else  
               @if(isset($DynamicNoImage['blog'])) 
                
                @php    $dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['blog']; @endphp
                   @if($DynamicNoImage['blog']!='' && file_exists($dyanamicNoImg_path)) 
                     @php   $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
                @endif
            @endif  
			<img src="{{ $prod_path }}" width="320" height="190">
            </div>
              <div class="span4 marg"> 
              <div class="span4 social_share" style="margin-left:0px;">
                <ul style="list-style-type:none;margin-left:0px;">
                   <li><div class="colabs-sc-twitter fl"><iframe frameborder="0" id="twitter-widget-0" scrolling="no" allowtransparency="true" src="http://platform.twitter.com/widgets/tweet_button.1401325387.html#_=1401683471204&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=<?php echo url(''); ?>&amp;size=m&amp;text=<?php echo $fetchblog_list->$blog_title; ?>&amp;url=<?php echo url(''); ?>/blog" class="twitter-share-button twitter-tweet-button twitter-share-button twitter-count-horizontal" title="@if (Lang::has(Session::get('lang_file').'.TWITTER_TWEET_BUTTON')!= '') {{  trans(Session::get('lang_file').'.TWITTER_TWEET_BUTTON') }} @else {{ trans($OUR_LANGUAGE.'.TWITTER_TWEET_BUTTON') }} @endif" data-twttr-rendered="true" style="width: 109px; height: 20px;"></iframe><script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></div></li><strong></strong>
                   
             <li><div class="shortcode-google-plusone fl"><div style="text-indent: 0px; margin: 0px; padding: 0px; background: none repeat scroll 0% 0% transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px;" id="___plusone_0"><iframe width="100%" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" id="I0_1401683471225" name="I0_1401683471225" src="https://apis.google.com/_/+1/fastbutton?usegapi=1&amp;annotation=bubble&amp;size=medium&amp;origin=http%3A%2F%2Fcolorlabsproject.com&amp;url=<?php echo url('blog/'.$fetchblog_list->blog_id); ?>&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.Xh27AGpQ8ys.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Fz%3Dzcms%2Frs%3DAItRSTPG4IuYlgUtku52bcizMHeeQ1ZTOA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1401683471225&amp;parent=http%3A%2F%2Fcolorlabsproject.com&amp;pfname=&amp;rpctoken=22542457" data-gapiattached="true" title="+1"></iframe></div></div></li>
             
<li><div class="colabs-fblike fl">
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.nexploc.com%2Fblog<?php echo $fetchblog_list->blog_id; ?>%2F1&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=21&amp;appId=586410728144592" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
</div></li>
	</ul></div>
               
			<p ><div style="text-align:justify !important;"> 
			@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
			@php	$blog_desc = 'blog_desc'; @endphp
			@else @php  $blog_desc = 'blog_desc_'.Session::get('lang_code'); @endphp @endif
			{{ $fetchblog_list->$blog_desc }}</div></p>
            </div>
			
			
			<div class="span9">
            
            
          </div>

	</div>
    
    
    <hr class="soften">
    @foreach($get_blog_comment_check as $check_comment_by_admin) @endforeach 
	@if($check_comment_by_admin->bs_allowcommt == 1) 
    <div class="span9">
    <h5>@if (Lang::has(Session::get('lang_file').'.LEAVE_A_REPLY')!= '') {{ trans(Session::get('lang_file').'.LEAVE_A_REPLY') }} @else {{ trans($OUR_LANGUAGE.'.LEAVE_A_REPLY') }} @endif</h5>
    <div class="row">
    <div class="span6">
     {!! Form::open(array('url'=>'blog_comment_submit','class'=>'form-horizontal')) !!}<strong></strong>
      @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
		</ul>	
		@endif
      
    <div class="form-group">
                    <label for="text1" class="control-label col-lg-2" style="text-align:left !important;">@if (Lang::has(Session::get('lang_file').'.NAME')!= '') {{  trans(Session::get('lang_file').'.NAME') }} @else {{ trans($OUR_LANGUAGE.'.NAME') }} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    <input type="hidden" name="check_cmt_approval" value="<?php echo $check_comment_by_admin->bs_radminapproval; ?>">
                    <input placeholder="" class="form-control span7" name="cmt_page" type="hidden" value="1">
                     <input placeholder="" class="form-control span7" name="cmt_id" type="hidden" value="<?php echo $fetchblog_list->blog_id; ?>">
                        <input placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_NAME')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_NAME') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_NAME') }} @endif" class="form-control span7" type="text" name="name" value="{!! Input::old('name') !!}" required>
                    </div>
                </div>
    </div>
    
    
    <div class="span6">
    	<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.EMAIL')!= '') {{  trans(Session::get('lang_file').'.EMAIL') }} @else {{ trans($OUR_LANGUAGE.'.EMAIL') }} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_EMAIL_ID')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_EMAIL_ID') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_EMAIL_ID') }} @endif" class="form-control span7" type="email" name="email" value="{!! Input::old('email') !!}" required>
                    </div>
                </div>
    </div>
    
    
    
    
    
    <div class="span6">
    	<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.WEBSITE')!= '') {{  trans(Session::get('lang_file').'.WEBSITE') }} @else {{ trans($OUR_LANGUAGE.'.WEBSITE') }} @endif</label>

                    <div class="col-lg-8">
                        <input placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_LINK')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_LINK') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_LINK') }} @endif" class="form-control span7" type="text" name="website" value="{!! Input::old('website') !!}" >
                    </div>
                </div>
    </div>
    
    <div class="span6">
    <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.MESSAGE')!= '') {{ trans(Session::get('lang_file').'.MESSAGE') }} @else {{ trans($OUR_LANGUAGE.'.MESSAGE') }} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <textarea  class="form-horizontal span7" rows="3" name="message" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_MESSAGE')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_MESSAGE') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_MESSAGE') }} @endif" required>{!! Input::old('message') !!}</textarea>
                    </div>
                </div>
    </div>
        
    <div class="span6">
    <button type="submit" class="btn btn-success large"> @if (Lang::has(Session::get('lang_file').'.COMMENTS')!= '') {{  trans(Session::get('lang_file').'.COMMENTS') }} @else {{ trans($OUR_LANGUAGE.'.COMMENTS') }} @endif </button>
    </div>
    </form>
    </div>
    <div class="row">
    </div>
    </div>
     @endif  @else  
      <h4 style="color:#F00;">@if (Lang::has(Session::get('lang_file').'.NO_BLOGS_AVAILABLE')!= '') {{ trans(Session::get('lang_file').'.NO_BLOGS_AVAILABLE') }} @else {{ trans($OUR_LANGUAGE.'.NO_BLOGS_AVAILABLE') }} @endif...</h4>
    @endif
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
		@php $mc_name = 'mc_name'; @endphp
	@else @php  $mc_name = 'mc_name_'.Session::get('lang_code'); @endphp @endif
	{{ $fetch_heder_category->$mc_name }}</a></li>
    @endforeach
</ul></div>
		
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
		 @php $blog_title = 'blog_title'; @endphp
	    @else @php  $blog_title = 'blog_title_'.Session::get('lang_code'); @endphp @endif
		{{ $fetch_popular_post->$blog_title }}</a></li>
		@if($count_popular != $pp)
        
        <hr class="soft"/>
        @endif
       
        @php $pp++; @endphp  @endforeach
        </ul>
        </div>
        </div>
	</div>
	</div>
	</div>
</div> </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

	{!! $footer !!}

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
</body>
</html>