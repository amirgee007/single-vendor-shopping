
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->

<style>
.pgntn{
	width: 29%;
    padding: 30px;
    text-align: center;
    margin: 0 auto;}
.pagination ul{}
.pagination li{
	float: left;
    list-style: none;
    margin-left: 15px;
    background-color:#d82672;
    text-align: center;
    padding: 5px 10px;
	border-radius: 2px;   
	}
.pagination .active{ color:#fff;}	
.pagination a:focus {
    outline: none;}
</style>
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

<h4>@if (Lang::has(Session::get('lang_file').'.CUSTOMER_COMMENTS')!= '') {{ trans(Session::get('lang_file').'.CUSTOMER_COMMENTS') }} @else {{ trans($OUR_LANGUAGE.'.CUSTOMER_COMMENTS') }} @endif</h4>
    
    @foreach($get_blog_cus_cmt as $bolg_cmt) 
	<div class="row-fluid">
    <div class="span2">
     <img src="{{ url('') }}/themes/img/CustomerAccounts.png" style="width:75px;height:70px;" > 
     </div>
        <div class="span9">
     <h4><span style="color:#090;" >{{ $bolg_cmt->cmt_name }}</span>
         <span style="font-size:13px;color:#ccc;padding-left:20px;">{{ $bolg_cmt->cmt_date }}</span>
    </h4>
    <p>{{ $bolg_cmt->cmt_msg }}</p>
    </div>
    	
     @if(isset($get_admin_reply[$bolg_cmt->cmt_id]))  
	@php $admin_reply_ans = explode("/@@/",$get_admin_reply[$bolg_cmt->cmt_id]); @endphp
	 
      <div class="span2" style="width:18% !important;"></div>
     <div class="span9">
      <div class="span9">
    
    
    <h4> <i class="icon-user" style="padding-top:5px"></i>
        <span style="color: #F00; font-size:12px; padding-left:5px;" >@if (Lang::has(Session::get('lang_file').'.ADMIN')!= '') {{ trans(Session::get('lang_file').'.ADMIN') }} @else {{ trans($OUR_LANGUAGE.'.ADMIN') }} @endif</span>
        <span style="font-size:13px;color:#ccc;padding-left:20px;">{{ $admin_reply_ans[1] }}</span>
    </h4>
     <p>{{ $admin_reply_ans[0] }}</p>
    
     </div>
    
   
    </div> @endif
   
    
    </div>
    <br>
    <legend></legend>
    @endforeach 
    <div class="pgntn">
  <?php 
    $get_blog_cus_cmt->setPath('');
    echo $get_blog_cus_cmt->render(); ?>
   </div>
    @foreach($get_blog_comment_check as $check_comment_by_admin)  @endforeach
	@if($check_comment_by_admin->bs_allowcommt == 1) 
    <div class="span9">
    <h5>@if (Lang::has(Session::get('lang_file').'.LEAVE_A_REPLY')!= '') {{ trans(Session::get('lang_file').'.LEAVE_A_REPLY') }} @else {{ trans($OUR_LANGUAGE.'.LEAVE_A_REPLY') }} @endif</h5>
    <div class="row">
    <div class="span6">
     {!! Form::open(array('url'=>'blog_comment_submit','class'=>'form-horizontal')) !!}<strong></strong>
	 
	  @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">@if (Lang::has(Session::get('lang_file').'.YOU_HAVE_ERRORS_WHILE_PROVIDING_COMMENT')!= '') {{  trans(Session::get('lang_file').'.YOU_HAVE_ERRORS_WHILE_PROVIDING_COMMENT') }}  @else {{ trans($OUR_LANGUAGE.'.YOU_HAVE_ERRORS_WHILE_PROVIDING_COMMENT') }} @endif.
        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>-->
        </div>
		</ul>	
		@endif
		
      @if ($errors->any())
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
         <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>-->
        </div>
		</ul>	
		@endif
      
    <div class="form-group">
                    <label style="display:flex;" for="text1" class="control-label col-lg-2 aln_left">@if (Lang::has(Session::get('lang_file').'.NAME')!= '') {{  trans(Session::get('lang_file').'.NAME') }} @else {{ trans($OUR_LANGUAGE.'.NAME') }} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    <input type="hidden" name="check_cmt_approval" value="<?php echo $check_comment_by_admin->bs_radminapproval; ?>">
                    <input placeholder="" class="form-control span7" name="cmt_page" type="hidden" value="2">
                     <input placeholder="" class="form-control span7" name="cmt_id" type="hidden" value="<?php echo $fetchblog_list->blog_id; ?>">
                     <input style="width:95%; border-radius: 4px; margin-bottom:0px;" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_NAME')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_NAME') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_NAME') }} @endif" class="form-control span7" type="text" name="name" value="{!! Input::old('name') !!}" >
                    </div>
                </div>
    </div>
    
    
    <div class="span6">
    	<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.EMAIL')!= '') {{  trans(Session::get('lang_file').'.EMAIL') }} @else {{ trans($OUR_LANGUAGE.'.EMAIL') }} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input style="width:95%; border-radius: 4px;" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_EMAIL_ID')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_EMAIL_ID') }}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_EMAIL_ID') }} @endif" class="form-control span7" type="text" name="email" value="{!! Input::old('email') !!}" >
                    </div>
                </div>
    </div>
    
    
    
    
    
    <div class="span6">
    	<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.WEBSITE')!= '') {{  trans(Session::get('lang_file').'.WEBSITE') }} @else {{ trans($OUR_LANGUAGE.'.WEBSITE') }} @endif</label>

                    <div class="col-lg-8">
                        <input style="width:95%;" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_LINK')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_LINK') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_LINK') }} @endif" class="form-control span7" type="url" name="website" value="{!! Input::old('website') !!}" >
                    </div>
                </div>
    </div>
    
    <div class="span6">
    <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.MESSAGE')!= '') {{  trans(Session::get('lang_file').'.MESSAGE') }} @else {{ trans($OUR_LANGUAGE.'.MESSAGE') }} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <textarea style="width:97%;"  class="form-horizontal span7" rows="3" name="message" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_MESSAGE')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_MESSAGE') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_MESSAGE') }} @endif">{!! Input::old('message') !!}</textarea>
                    </div>
                </div>
    </div>
    
    
    <div class="span6">
    <button style="margin-top:15px;" type="submit" class="btn btn-success large" >@if (Lang::has(Session::get('lang_file').'.COMMENTS')!= '') {{  trans(Session::get('lang_file').'.COMMENTS') }} @else {{ trans($OUR_LANGUAGE.'.COMMENTS') }} @endif </button>
    </div>
    </form>
    </div>
    <div class="row">
    </div>
    </div>
    @endif  @else 
      <h4 style="color:#F00;">@if (Lang::has(Session::get('lang_file').'.NO_BLOGS_AVAILABLE')!= '') {{  trans(Session::get('lang_file').'.NO_BLOGS_AVAILABLE') }} @else {{ trans($OUR_LANGUAGE.'.NO_BLOGS_AVAILABLE') }} @endif...</h4>
    @endif
	</div>

<div class="span3" id="sidebar">


<div class="row">
    
    </div>
    
    <div class="clearfix"></div>
    
<div class="well well-small btn-warning" style="margin-top:10px;" ><strong>@if (Lang::has(Session::get('lang_file').'.CATEGORIES')!= '') {{  trans(Session::get('lang_file').'.CATEGORIES') }} @else {{ trans($OUR_LANGUAGE.'.CATEGORIES') }} @endif</strong></div>
		<ul class="topnav blog-menu">
     @foreach($getheader_category as $fetch_heder_category) 
	<li><a class="active" href="{{ url('blog_category/'.$fetch_heder_category->mc_id) }}">
	 @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
	@php	$mc_name = 'mc_name'; @endphp
	 @else @php  $mc_name = 'mc_name_'.Session::get('lang_code'); @endphp @endif
	{{ $fetch_heder_category->$mc_name }}</a></li>
    @endforeach
</ul>
		<br>
       
        <div class="row">
        <div class="span3 thumbnail">
        <h5>@if (Lang::has(Session::get('lang_file').'.POPULAR_POSTS')!= '') {{  trans(Session::get('lang_file').'.POPULAR_POSTS') }} @else {{ trans($OUR_LANGUAGE.'.POPULAR_POSTS') }} @endif</h5>
        <legend></legend>
        @php $count_popular= count($get_blog_list_popular);
		$pp = 1; @endphp
		@foreach($get_blog_list_popular as $fetch_popular_post) 
		 
        <a href="{{ url('blog_view/'.$fetch_popular_post->blog_id) }}" style="color:#5AB45C;font-weight:700" >
           
			@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
			@php	$blog_title = 'blog_title'; @endphp
			@else @php $blog_title = 'blog_title_'.Session::get('lang_code'); @endphp @endif
			{{ $fetch_popular_post->$blog_title }} 
        </a>
		@if($count_popular != $pp)
        
        <hr class="soft"/>
       @endif
       
        @php $pp++; @endphp @endforeach
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
    <script src="<?php echo url(''); ?>/plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>
    <script src="<?php echo url(''); ?>/plug-k/demo/js/demo.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo url(''); ?>/themes/js/jquery-1.5.2.min.js"></script>
	<script type="text/javascript" src="<?php echo url(''); ?>/themes/js/scriptbreaker-multiple-accordion-1.js"></script>
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