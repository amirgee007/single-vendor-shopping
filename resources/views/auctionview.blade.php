<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
   <?php 
	if($metadetails){
	foreach($metadetails as $metainfo) {
		$metaname=$metainfo->gs_metatitle;
		 $metakeywords=$metainfo->gs_metakeywords;
		 $metadesc=$metainfo->gs_metadesc;
		 }
		 }
	else
	{
		 $metaname="Nex eMerchant";
		 $metakeywords="Nex eMerchant";
		  $metadesc="Nex eMerchant";
	}
	?>
    <title><?php echo $metaname  ;?></title>
    <?php foreach($product_details_by_id as $pro_details_by_id_meta) { } ?>
     <meta name="description" content="<?php echo $pro_details_by_id_meta->auc_meta_keyword  ;?>">
     <meta name="description" content="<?php echo $pro_details_by_id_meta->auc_meta_description  ;?>">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <meta name="description" content="<?php echo $metadesc  ;?>">
     <meta name="keywords" content="<?php echo  $metakeywords ;?>">
	 <meta name="author" content="<?php echo  $metaname ;?>">
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo url(''); ?>/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?php echo url(''); ?>/themes/css/base.css" rel="stylesheet" media="screen"/>
    <?php foreach($general as $gs) {} if($gs->gs_themes == 'blue') { ?>
    <link href="<?php echo url(''); ?>/themes/css/base.css" rel="stylesheet" media="screen"/>
    <?php } elseif($gs->gs_themes == 'green') { ?>
    <link href="<?php echo url(''); ?>/themes/css/green-theme.css" rel="stylesheet" media="screen"/>
    <?php } ?>
<!-- Bootstrap style responsive-->	
	<link href="<?php echo url(''); ?>/themes/css/planing.css" rel="stylesheet"/>
	<link href="<?php echo url(''); ?>/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?php echo url(''); ?>/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?php echo url(''); ?>/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
    
     <link href="<?php echo url(''); ?>/themes/css/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

        <!-- Include Cloud Zoom CSS. -->
    


        <!-- Call quick start function. -->
     
       
  </head>
<body>
<div id="header">
{!! $navbar !!}
<div class="container">

<!-- Navbar ================================================== -->
{!! $header !!}
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
      <?php foreach($product_details_by_id as $pro_details_by_id) { }
  $product_img= explode('/**/',trim($pro_details_by_id->auc_image,"/**/"));	
  $img_count = count($product_img);
  $date1 = date('Y-m-d H:i:s');
  $date2 = $pro_details_by_id->auc_end_date;
  $deal_end_year = date('Y',strtotime($date2));
  $deal_end_month = date('m',strtotime($date2));
  $deal_end_date = date('d',strtotime($date2));
  $deal_end_hours = date('H',strtotime($date2));  
  $deal_end_minutes = date('i',strtotime($date2));    
  $deal_end_seconds = date('s',strtotime($date2));
 ?>
    <li><a href="<?php echo url('');?>"><?php if (Lang::has(Session::get('lang_file').'.HOME')!= '') { echo  trans(Session::get('lang_file').'.HOME');}  else { echo trans($OUR_LANGUAGE.'.HOME');} ?></a> <span class="divider">/</span></li>
    <li><a href="products.html"><?php if (Lang::has(Session::get('lang_file').'.AUCTION')!= '') { echo  trans(Session::get('lang_file').'.AUCTION');}  else { echo trans($OUR_LANGUAGE.'.AUCTION');} ?></a> <span class="divider">/</span></li>
    <li class="active"><?php echo $pro_details_by_id->auc_title; ?></li>
    </ul>	
	<div class="row">	
    
     <div class="span3">
            	<a id="Zoomer3"  href="{!! url('public/assets/auction/').'/'.$product_img[0]!!}" class="MagicZoomPlus" rel="selectors-effect: fade; selectors-change: mouseover; " title="<?php echo  $pro_details_by_id->auc_title; ?>"><img src="{!! url('public/assets/auction/').'/'.$product_img[0]!!}"/></a> <br/>
 <?php for($i=0;$i < $img_count;$i++) { ?>
        <a href="{!! url('public/assets/auction/').'/'.$product_img[$i]!!}" rel="zoom-id: Zoomer3" rev="{!! url('public/assets/auction/').'/'.$product_img[$i]!!}"><img src="{!! url('public/assets/auction/').'/'.$product_img[$i]!!}" style="width:87px; height:auto"/></a>
 <?php } ?>
            </div>
 
    
			<div class="span4 left_bor">
				<h1 class="auc_text"><?php if (Lang::has(Session::get('lang_file').'.AUCTION')!= '') { echo  trans(Session::get('lang_file').'.AUCTION');}  else { echo trans($OUR_LANGUAGE.'.AUCTION');} ?><span> : <?php echo $pro_details_by_id->auc_title; ?></span></h1>
               <div id="countdown" class="countdownHolder span12" style="padding-right:10px;" ></div>
        
                      <h4 class="title-center">
					 <a href="#" class="kit" ><?php if (Lang::has(Session::get('lang_file').'.DAYS')!= '') { echo  trans(Session::get('lang_file').'.DAYS');}  else { echo trans($OUR_LANGUAGE.'.DAYS');} ?></a>
					  <a  href="#" class="kit"><?php if (Lang::has(Session::get('lang_file').'.HOURS')!= '') { echo  trans(Session::get('lang_file').'.HOURS');}  else { echo trans($OUR_LANGUAGE.'.HOURS');} ?></a>
					   <a  href="#" class="kit" ><?php if (Lang::has(Session::get('lang_file').'.MIN')!= '') { echo  trans(Session::get('lang_file').'.MIN');}  else { echo trans($OUR_LANGUAGE.'.MIN');} ?></a>
					    <a  href="#" class="kit"><?php if (Lang::has(Session::get('lang_file').'.SEC')!= '') { echo  trans(Session::get('lang_file').'.SEC');}  else { echo trans($OUR_LANGUAGE.'.SEC');} ?></a>
					 </h4>
                     <h2><span class="dolor_text">$<?php echo $pro_details_by_id->auc_auction_price; ?></span>              
                     <input type="hidden" name="bid_amont" value="<?php echo $pro_details_by_id->auc_auction_price; ?>" />
                      <?php if(Session::has('customerid')){ ?>
        <a style="padding-right:0" data-toggle="modal" role="button" href="#bidnow"><button type="submit" class="btn align_brn icon_me pull-right" style="margin-right:10px; margin-top:61px; "> <?php if (Lang::has(Session::get('lang_file').'.BID_NOW')!= '') { echo  trans(Session::get('lang_file').'.BID_NOW');}  else { echo trans($OUR_LANGUAGE.'.BID_NOW');} ?></button></a>
        

 
            		 <?php } else { ?>
                     <a href="#login" role="button" data-toggle="modal" ><button type="submit" class="btn align_brn icon_me pull-right" style="margin-right:10px; margin-top:61px; "> <?php if (Lang::has(Session::get('lang_file').'.BID_NOW')!= '') { echo  trans(Session::get('lang_file').'.BID_NOW');}  else { echo trans($OUR_LANGUAGE.'.BID_NOW');} ?></button></a>
                     <?php } ?>
                		
                     	<h1 class="auc_text auc_text1"><?php if (Lang::has(Session::get('lang_file').'.AUCTION')!= '') { echo  trans(Session::get('lang_file').'.AUCTION');}  else { echo trans($OUR_LANGUAGE.'.AUCTION');} ?><span> : <?php echo $pro_details_by_id->auc_title; ?></span></h1>
                        <h2>
                        <p class="prag_text"> <?php if (Lang::has(Session::get('lang_file').'.BID_FROM')!= '') { echo  trans(Session::get('lang_file').'.BID_FROM');}  else { echo trans($OUR_LANGUAGE.'.BID_FROM');} ?> </p>
                     <span class="tabe_text">$<?php echo $pro_details_by_id->auc_auction_price; ?> </span>
                     </h2>
                      <h2>
                        <p class="prag_text"><?php if (Lang::has(Session::get('lang_file').'.BID_INCREMENT')!= '') { echo  trans(Session::get('lang_file').'.BID_INCREMENT');}  else { echo trans($OUR_LANGUAGE.'.BID_INCREMENT');} ?></p>
                     <span class="tabe_text">$<?php echo $pro_details_by_id->auc_bitinc; ?></span>
                     </h2>
                      <h2>
                        <p class="prag_text"><?php if (Lang::has(Session::get('lang_file').'.RETAIL_PRICE')!= '') { echo  trans(Session::get('lang_file').'.RETAIL_PRICE');}  else { echo trans($OUR_LANGUAGE.'.RETAIL_PRICE');} ?></p>
                     <span class="tabe_text">$<?php echo $pro_details_by_id->auc_original_price; ?></span>
                     </h2>
                     
                     <div class="span3 social_share">
               
               <ul style="list-style-type:none; display:block; ">
                 <li><div class="colabs-sc-twitter fl"><iframe frameborder="0" id="twitter-widget-0" scrolling="no" allowtransparency="true" src="http://platform.twitter.com/widgets/tweet_button.1401325387.html#_=1401683471204&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=<?php echo url('');?>;size=m&amp;text=<?php echo urlencode($pro_details_by_id->auc_id);?>&amp;img=<?php echo url('public/assets/auction/').'/'.$product_img[0];?>&amp;url=<?php echo url('dealview/').'/'.$pro_details_by_id->auc_id;?>&amp;via=NexEcart" class="twitter-share-button twitter-tweet-button twitter-share-button twitter-count-horizontal" title="<?php if (Lang::has(Session::get('lang_file').'.TWITTER_TWEET_BUTTON')!= '') { echo  trans(Session::get('lang_file').'.TWITTER_TWEET_BUTTON');}  else { echo trans($OUR_LANGUAGE.'.TWITTER_TWEET_BUTTON');} ?>" data-twttr-rendered="true" style="width: 109px; height: 20px;"></iframe><script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></div></li>
                <li><div class="shortcode-google-plusone fl"><div style="text-indent: 0px; margin: 0px; padding: 0px; background: none repeat scroll 0% 0% transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px;" id="___plusone_0"><iframe width="100%" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" id="I0_1401683471225" name="I0_1401683471225" src="https://apis.google.com/_/+1/fastbutton?usegapi=1&amp;annotation=bubble&amp;size=medium&amp;origin=<?php echo url('');?>&amp;url=<?php echo url('auctionview').'/'.$pro_details_by_id->auc_id;?>&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.Xh27AGpQ8ys.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Fz%3Dzcms%2Frs%3DAItRSTPG4IuYlgUtku52bcizMHeeQ1ZTOA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1401683471225&amp;parent=<?php echo url('');?>&amp;pfname=&amp;rpctoken=22542457" data-gapiattached="true" title="+1"></iframe></div></div></li>
                <li><div class="colabs-fblike fl">
<iframe frameborder="0" style="border:none; overflow:hidden; width:80px; height:25px;" allowtransparency="true" scrolling="no" src="http://www.facebook.com/plugins/like.php?href=<?php echo url('auctionview/').$pro_details_by_id->auc_id;?>&amp;layout=button_count&amp;show_faces=false&amp;width=80&amp;action=like&amp;colorscheme=light&amp;font=arial"></iframe>
</div></li>
	</ul>
             <?php
$title=($pro_details_by_id->auc_title);
$url=(url('auctionview/'.$pro_details_by_id->auc_id));
$summary=($pro_details_by_id->auc_description);
$image=(url('public/assets/auction/').'/'.$product_img[0]);

?>

 <script type="text/javascript"> 
<!--
window.fbAsyncInit = function() {
	FB.init({
	appId      : '1422599688008267', 
	channelUrl : '<?php echo url('');?>', 
	status     : true,
	cookie     : true, 
	xfbml      : true  
	});
};
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/fr_FR/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));


$(document).ready(function(){
	$('#FBShare').click(function(){
		FB.ui({
			method: 'feed',
			name: '<?php echo $title; ?>',
			link: '<?php echo $url;?>',
			picture: '<?php echo $image;?>',
			caption: '<?php echo $title; ?>',
			description: '<?php echo $summary; ?>'
			}, function(response){
				
			});
	});

});
//-->
</script>
        <span><a id="FBShare" style="cursor:pointer;"><img src="<?php echo url('');?>/themes/images/fb-share.jpg"></a></span>
 

               </div>
			</div>
            
			
			<div class="span4 left_bor">
         <h1 class="auc_text"><?php if (Lang::has(Session::get('lang_file').'.BID_HISTORIES')!= '') { echo  trans(Session::get('lang_file').'.BID_HISTORIES');}  else { echo trans($OUR_LANGUAGE.'.BID_HISTORIES');} ?></h1>
        
       
      <h1 class="auc_text auc_text1"><?php if (Lang::has(Session::get('lang_file').'.LATEST_BIDDER(S)')!= '') { echo  trans(Session::get('lang_file').'.LATEST_BIDDER(S)');}  else { echo trans($OUR_LANGUAGE.'.LATEST_BIDDER(S)');} ?></h1>
        <?php 
		 if($get_bidder_by_id) 
		 {
			 $bid = 1;
			 foreach($get_bidder_by_id as $bidders_by_id)
			 {
		 ?>
     
   
        <ul <?php if($bid % 2 ==0) { echo 'class="back_me"'; } else { echo 'class=""'; } ?>>
      <li><p><?php echo $bidders_by_id->oa_cus_name; ?> </p><span class="affix_text">$<?php echo $bidders_by_id->oa_bid_amt; ?> </span></li>
       <li><label><?php echo $bidders_by_id->oa_bid_date; ?> </label></li>
       </ul>
       <?php $bid++; } } else {?>
        <ul>
      <li><p style="padding:10px;" ><?php if (Lang::has(Session::get('lang_file').'.NOT_YET_BID')!= '') { echo  trans(Session::get('lang_file').'.NOT_YET_BID');}  else { echo trans($OUR_LANGUAGE.'.NOT_YET_BID');} ?></p><span class="affix_text"> </span></li>
   	</ul>
       <?php } ?>
          </div>
          <div class="span12" style="margin-top:20px;">
            <ul class="nav nav-tabs" id="productDetail">
              <li class="active"><a data-toggle="tab" href="#home"><?php if (Lang::has(Session::get('lang_file').'.PRODUCT_DETAILS')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_DETAILS');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_DETAILS');} ?></a></li>
              <li><a data-toggle="tab" href="#profile"><?php if (Lang::has(Session::get('lang_file').'.RELATED_PRODUCTS')!= '') { echo  trans(Session::get('lang_file').'.RELATED_PRODUCTS');}  else { echo trans($OUR_LANGUAGE.'.RELATED_PRODUCTS');} ?></a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div id="home" class="tab-pane fade active in">
			  <h4><?php if (Lang::has(Session::get('lang_file').'.PRODUCT_INFORMATION')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_INFORMATION');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_INFORMATION');} ?></h4>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2"><?php if (Lang::has(Session::get('lang_file').'.PRODUCT_DETAILS')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_DETAILS');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_DETAILS');} ?></th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1"><?php if (Lang::has(Session::get('lang_file').'.TITLE')!= '') { echo  trans(Session::get('lang_file').'.TITLE');}  else { echo trans($OUR_LANGUAGE.'.TITLE');} ?>: </td><td class="techSpecTD2">{!!$pro_details_by_id->auc_title!!}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1"><?php if (Lang::has(Session::get('lang_file').'.CATEGORY')!= '') { echo  trans(Session::get('lang_file').'.CATEGORY');}  else { echo trans($OUR_LANGUAGE.'.CATEGORY');} ?>:</td><td class="techSpecTD2">{!!$pro_details_by_id->mc_name!!}</td></tr>
				
				</tbody>
				</table>
				
				<h5><?php if (Lang::has(Session::get('lang_file').'.FEATURES')!= '') { echo  trans(Session::get('lang_file').'.FEATURES');}  else { echo trans($OUR_LANGUAGE.'.FEATURES');} ?></h5>
				<p>
				<?php echo $pro_details_by_id->auc_description; ?>
				</p>
              </div>
		<div id="profile" class="tab-pane fade">
		<div class="pull-right" id="myTab">
		 <a data-toggle="tab" href="#listView"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 <a data-toggle="tab" href="#blockView"><span class="btn btn-large btn-primary me_btn"><i class="icon-th-large"></i></span></a>
		</div>
		<br class="clr">
		<hr class="soft">
		<div class="tab-content">
			<div class="tab-pane" id="listView">
	<?php if($get_related_product){ foreach($get_related_product as $product_det){ 
	$product_image = explode('/**/',$product_det->auc_image);
	
	?>
		<div class="row">	  
			<div class="span2">
				<img src="<?php echo url('public/assets/auction/').'/'.$product_image[0];?>" alt="">
			</div>
			<div class="span4">
				<h3><?php if (Lang::has(Session::get('lang_file').'.NEW')!= '') { echo  trans(Session::get('lang_file').'.NEW');}  else { echo trans($OUR_LANGUAGE.'.NEW');} ?> | <?php if (Lang::has(Session::get('lang_file').'.AVAILABLE')!= '') { echo  trans(Session::get('lang_file').'.AVAILABLE');}  else { echo trans($OUR_LANGUAGE.'.AVAILABLE');} ?></h3>				
				<hr class="soft"/>
				<h5><?php echo $product_det->auc_title;?> </h5>
				<p>
				<?php echo $product_det->auc_description;?>
				</p>
				<a class="btn btn-small pull-right me_view" href="{!! url('auctionview').'/'.$product_det->auc_id!!}"><?php if (Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= '') { echo  trans(Session::get('lang_file').'.VIEW_DETAILS');}  else { echo trans($OUR_LANGUAGE.'.VIEW_DETAILS');} ?></a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> $<?php echo $product_det->auc_auction_price;?></h3>
			<label class="checkbox">
            
            <br>
<br>


				
			</label><br/>
			
			  <a href="{!! url('auctionview').'/'.$product_det->auc_id!!}" class="btn btn-large btn-primary me_btn btnb-success"> <?php if (Lang::has(Session::get('lang_file').'.BID_NOW')!= '') { echo  trans(Session::get('lang_file').'.BID_NOW');}  else { echo trans($OUR_LANGUAGE.'.BID_NOW');} ?></a>
			  <a href="{!! url('auctionview').'/'.$product_det->auc_id!!}" class="btn btn-large"><i class="icon-zoom-in"></i></a>
			
				</form>
			</div>
		</div>
		<hr class="soft"/>
        <?php } }else{ ?>
        <div class="row">	  
			
			<div class="span4">
				<h3><?php if (Lang::has(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')!= '') { echo  trans(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE');}  else { echo trans($OUR_LANGUAGE.'.NO_PRODUCTS_AVAILABLE');} ?></h3>				
				
				<br class="clr"/>
			</div>
			
		</div>
        <?php } ?>	
				
			<hr class="soft"/>
		</div>
			<div class="tab-pane active" id="blockView">
				<ul class="thumbnails">
					
					<?php if($get_related_product){ foreach($get_related_product as $product_det){ 
	$product_image = explode('/**/',$product_det->auc_image);
	
	?>
			<li class="span3">
			  <div class="thumbnail" style="width:95%;">
				  <i class="tag"><?php echo round($product_det->auc_saving_price);?></i>
					<a href="{!! url('auctionview').'/'.$product_det->auc_id!!}"><img alt="" src="<?php echo url('public/assets/auction/').'/'.$product_image[0];?>" style="height:215px;" ></a>
					<div class="caption product_show">
				<h4 class="top_text dolor_text">$<?php echo $product_det->auc_auction_price;?></h4>
					  <h5 class="prev_text"><?php echo $product_det->auc_title;?></h5>
					  <h4><a href="{!! url('auctionview').'/'.$product_det->auc_id!!}" class="btn align_brn btnb-success"><?php if (Lang::has(Session::get('lang_file').'.BID_NOW')!= '') { echo  trans(Session::get('lang_file').'.BID_NOW');}  else { echo trans($OUR_LANGUAGE.'.BID_NOW');} ?></a></h4>
					</div>
				  </div>
			</li>
            <?php } }else{ ?>
         <li class="span3">
			  <div class="thumbnail">
					<?php if (Lang::has(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')!= '') { echo  trans(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE');}  else { echo trans($OUR_LANGUAGE.'.NO_PRODUCTS_AVAILABLE');} ?>
					
				  </div>
			</li>
             <?php } ?>
					
					
					
					
				  </ul>
			<hr class="soft"/>
			</div>
		</div>
				<br class="clr">
					 </div>
		</div>
          </div>

	</div>
</div>
</div> </div>
</div>

<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<script src="<?php echo url(''); ?>/themes/js/jquery-1.10.0.min.js"></script>
	{!! $footer !!}

<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="<?php echo url(''); ?>/themes/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo url(''); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo url(''); ?>/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo url(''); ?>/themes/js/bootshop.js"></script>
    <script src="<?php echo url(''); ?>/themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
<div id="sectionBox">
<link rel="stylesheet" href="<?php echo url(''); ?>/themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="<?php echo url(''); ?>/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo url(''); ?>/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="<?php echo url(''); ?>/themes/css/jquery.countdown.css" />
		<script src="<?php echo url(''); ?>/themes/js/jquery.countdown.js"></script>
      
       <!-- Count Down Coding -->
		<script type="text/javascript">

year = <?php echo $deal_end_year;?>; month = <?php echo $deal_end_month;?>; day = <?php echo $deal_end_date;?>;hour= <?php echo $deal_end_hours;?>; min= <?php echo $deal_end_minutes;?>; sec= <?php echo $deal_end_seconds;?>;

$(function(){
    countProcess();
});


var timezone = new Date()
month        = --month;
dateFuture   = new Date(year,month,day,hour,min,sec);

function countProcess(){

        dateNow = new Date();                                                            
        amount  = dateFuture.getTime() - dateNow.getTime()+5;               
        delete dateNow;

        /* time is already past */
        if(amount < 0){
                output ="<span class='countDays'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='countDiv countDiv0'></span><span class='countHours'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span></span><span class='countDiv countDiv1'></span><span class='countMinutes'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span></span><span class='countDiv countDiv2'></span><span class='countSeconds'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span></span>" ;
				window.location='<?php echo url("auction");?>';
                $('#countdown').html(output);    
        }
        /* date is still good */
        else{
                days=0; hours=0; mins=0; secs=0; output="";

                amount = Math.floor(amount/1000); /* kill the milliseconds */

                days   = Math.floor(amount/86400); /* days */
                amount = amount%86400;

                hours  = Math.floor(amount/3600); /* hours */
                amount = amount%3600;

                mins   = Math.floor(amount/60); /* minutes */
                amount = amount%60;

                
                secs   = Math.floor(amount); /* seconds */

				fdays = parseInt(days/10);	
				sdays = days%10;
				fhours = parseInt(hours/10);	
				shours = hours%10;
				fmins = parseInt(mins/10);	
				smins = mins%10;
				fsecs = parseInt(secs/10);	
				ssecs = secs%10;
                output="<span class='countDays'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>" + fdays +"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>" + sdays +"</span></span><span class='countDiv countDiv0'></span><span class='countHours'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fhours+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+shours+"</span></span></span><span class='countDiv countDiv1'></span><span class='countMinutes'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fmins+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+smins+"</span></span></span><span class='countDiv countDiv2'></span><span class='countSeconds'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fsecs+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+ssecs+"</span></span></span>" ;
                        
                $('#countdown').html(output);
            

                setTimeout("countProcess()", 1000);
        }
        
}
</script>
       
<div aria-hidden="false" aria-labelledby="login" role="dialog" tabindex="-1" class="modal fade in " id="bidnow" style="display: none; overflow:hidden">
    <div class="modal-header">
	  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <div style="text-align:center;">
	  <img src="<?php echo url(''); ?>/themes/images/logo2.png"style="margin:0 auto;" class="text-center">
      </div>
        {!! Form::open(array('url'=>'bid_payment','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
<div class="modal-body">
  <div style="color:#F00;font-weight:300" id="logerror_msg"> </div>
			<div style="float:left">
         
  			 <legend></legend>
			  <div class="control-group span5"style="margin-top:0px;margin-bottom:0px;">								
				<h4 style="color:#333;text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.YOUR_BID_AMOUNT_IS_NO_LONGER_ENOUGHTO_WIN')!= '') { echo  trans(Session::get('lang_file').'.YOUR_BID_AMOUNT_IS_NO_LONGER_ENOUGHTO_WIN');}  else { echo trans($OUR_LANGUAGE.'.YOUR_BID_AMOUNT_IS_NO_LONGER_ENOUGHTO_WIN');} ?></h4>
                <p style="color:#666;text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.PLEASE_RE-ENTER_YOUR_BID')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_RE-ENTER_YOUR_BID');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_RE-ENTER_YOUR_BID');} ?></p>
			  </div>
			  <div class="control-group">
	<center><p style="width:100%;"><span style="color:#333;"><?php if (Lang::has(Session::get('lang_file').'.NEW_MAX_BID')!= '') { echo  trans(Session::get('lang_file').'.NEW_MAX_BID');}  else { echo trans($OUR_LANGUAGE.'.NEW_MAX_BID');} ?> <input type="text" class="span1" id="bid_update_value" name="bid_update_value"></span>
    <input type="submit" style="margin-top:-10px;" value="Update" class="btn align_brn icon_me" id="bid_update"></p></center>
    <?php if($get_max_bid_amt == '') {$bid_pp_price =  $pro_details_by_id->auc_auction_price;} else { $bid_pp_price = $get_max_bid_amt; } ?>
    <label style="color:#ccc;text-align:center;">( $ <?php echo  $bid_pp_price; ?>  <?php if (Lang::has(Session::get('lang_file').'.OR_MORE')!= '') { echo  trans(Session::get('lang_file').'.OR_MORE');}  else { echo trans($OUR_LANGUAGE.'.OR_MORE');} ?> )</label>
    <input type="hidden" name="return_url"  value="{!! URL::current() !!} " >
     <input type="hidden" name="auction_bid_proid_popup" id="auction_bid_proid_popup" value="<?php echo  $pro_details_by_id->auc_id; ?> " >
    <input type="hidden" name="auction_bid_amount_popup" id="auction_bid_amount_popup" value="<?php echo  $bid_pp_price; ?> " >
			  </div>
			 
            </div>	
</form>
           
            
           
              
    </div>
    </div>
	</div>        
        
        
     <script>
	$(document).ready(function() {		
	$('#bid_update').click(function() {
		
		if($('#bid_update_value').val() == "")
		{
			$('#bid_update_value').css('border', '1px solid red'); 
			$('#bid_update_value').focus();
			return false;
		}
		else if(isNaN($('#bid_update_value').val()))
		{
			$('#bid_update_value').css('border', '1px solid red'); 
			$('#bid_update_value').focus();
			return false;
		}
		else if(parseInt($('#bid_update_value').val()) <= parseInt($('#auction_bid_amount_popup').val()))
		{
			$('#bid_update_value').css('border', '1px solid red'); 
			$('#bid_update_value').focus();
			return false;
		}
		else
		{
			$('#bid_update_value').css('border', ''); 
			
		}
	});
   	
	});
	 </script>
          
  <script src="<?php echo url(''); ?>/themes/js/magiczoomplus.js" type="text/javascript"></script>
	<!--<div id="themeContainer">
	<div id="hideme" class="themeTitle">Style Selector</div>
	<div class="themeName">Oregional Skin</div>
	<div class="images style">
	<a href="<?php echo url(); ?>/themes/css/#" name="bootshop"><img src="<?php echo url(); ?>/themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
	<a href="<?php echo url(); ?>/themes/css/#" name="businessltd"><img src="<?php echo url(); ?>/themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
	</div>
	<div class="themeName">Bootswatch Skins (11)</div>
	<div class="images style">
		<a href="<?php echo url(); ?>/themes/css/#" name="amelia" title="Amelia"><img src="<?php echo url(); ?>/themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="spruce" title="Spruce"><img src="<?php echo url(); ?>/themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="superhero" title="Superhero"><img src="<?php echo url(); ?>/themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="cyborg"><img src="<?php echo url(); ?>/themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="cerulean"><img src="<?php echo url(); ?>/themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="journal"><img src="<?php echo url(); ?>/themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="readable"><img src="<?php echo url(); ?>/themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	
		<a href="<?php echo url(); ?>/themes/css/#" name="simplex"><img src="<?php echo url(); ?>/themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="slate"><img src="<?php echo url(); ?>/themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="spacelab"><img src="<?php echo url(); ?>/themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="united"><img src="<?php echo url(); ?>/themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
	</div>
	<div class="themeName">Background Patterns </div>
	<div class="images patterns">
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern1"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern2"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern3"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern4"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern5"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern6"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern7"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern8"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern9"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern10"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>
		
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern11"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern12"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern13"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern14"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern15"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>
		
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern16"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern17"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern18"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern19"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern20"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>
		 
	</div>
	</div>-->
</div>
<span id="themesBtn"></span>
</body>
</html>