<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
     <?php   foreach($get_meta_details as $meta_details) { } ?>
     <title><?php echo $meta_details->gs_metatitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $meta_details->gs_metadesc; ?>">
    <meta name="keywords" content="<?php echo $meta_details->gs_metakeywords; ?>">
    <meta name="author" content="">
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo url(''); ?>/themes/bootshop/bootstrap.min.css" media="screen"/>
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
<?php foreach($get_image_favicons_details as $favicon_images) { } ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>//public/assets/favicon/<?php echo $favicon_images->imgs_name; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-57-precomposed.png">
     <link href="<?php echo url(''); ?>/themes/css/leftmenu.css" rel="stylesheet" media="screen"/>
    
    


 <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

        <!-- Include Cloud Zoom CSS. -->
        <link rel="stylesheet" type="text/css" href="<?php echo url(''); ?>/themes/css/cloudzoom.css" />

        <!-- Include Cloud Zoom script. -->
        <script type="text/javascript" src="<?php echo url(''); ?>/themes/js/cloudzoom.js"></script>

        <!-- Call quick start function. -->
        <script type="text/javascript">
            CloudZoom.quickStart();
        </script>      
      <script src="<?php echo url(''); ?>/themes/js/jquery.js" type="text/javascript"></script>

   <script type="text/javascript">
$(function(){
        // Check the initial Poistion of the Sticky Header
        var stickyHeaderTop = $('#stickyheader').offset().top;

        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop ) {
                        $('#stickyheader').css({position: 'fixed', top: '0px'});
                } else {
                        $('#stickyheader').css({position: 'static', top: '0px'});
                }
        });
  });
  </script>
  </head>
<body>
<div id="header">
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small btn-success"><strong>Categories</strong></div>
        <ul id="css3menu1" class="topmenu">
<input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>
<?php foreach($main_category as $fetch_main_cat) { $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; ?>
<?php if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0) { ?>
<li class="topfirst"><a href="<?php echo url('products/viewcategorylist')."/".base64_encode($pass_cat_id1); ?>"><?php echo $fetch_main_cat->mc_name; ?> </a>

	<ul>    
    <?php foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)  { $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>
    	<?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0) { ?>
			 <li class="subfirst"><a href="<?php echo url('products/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"><?php echo $fetch_sub_main_cat->smc_name ; ?> </a>
	
		<ul>
                <?php  foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat) { $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id;?>  <?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0) { ?>
					<li class="subsecond"><a href="<?php echo url('products/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>"><?php echo  $fetch_sub_cat->sb_name; ?></a>
                  
                    <ul>
                    <?php  foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat) { $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?>                        
                        <li class="subthird"><a href="<?php echo url('products/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>"><?php echo $fetch_secsub_cat->ssb_name ?></a></li>                                        
                     <?php } ?>
                      </ul>
                      <?php } ?>
                    </li>
				<?php } ?>
				</ul>
                <?php } ?>
        </li>
        <?php } ?>
	</ul>
    <?php } ?>
    </li>
      <?php } ?>
</ul>	
			
		<br/>
        
		  <div class="clearfix"></div>
          <br/>
          
          <div class="well well-small btn-success"><strong>Specials Products</strong></div>
          <?php foreach($most_visited_product as $fetch_most_visit_pro) {
			   $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;
			 $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);
			 $mostproduct_img = explode('/**/', $fetch_most_visit_pro->pro_Img);
			 	 if($fetch_most_visit_pro->pro_no_of_purchase < $fetch_most_visit_pro->pro_qty) {
			  ?>
          <div class="thumbnail" style="width:95%;">
			<img  src="<?php echo url(''); ?>/public/assets/product/<?php echo $mostproduct_img[0]; ?>" alt="<?php echo $fetch_most_visit_pro->pro_title; ?>"/>
			<div class="caption product_show">
				<h4 class="top_text dolor_text">$<?php echo $fetch_most_visit_pro->pro_disprice;  ?></h4>
					  <h5 class="prev_text"><?php echo substr($fetch_most_visit_pro->pro_title,0,50);  ?>...</h5>
					 <h4><a class="btn btn-success" href="{!! url('product_list').'/'.$fetch_most_visit_pro->pro_id!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a>
					 </h4>
					</div>
		  </div><br/>
			<?php } } ?>
			
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <?php foreach($product_details as $product_det){}
	foreach($product_details as $product_det_qty){}
    $product_img= explode('/**/',trim($product_det->pro_Img,"/**/"));
	
	$img_count = count($product_img);
	
	?>

    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li><a href="products.html">{!!$product_det->mc_name!!}</a> <span class="divider">/</span></li>
    <li class="active">{!!$product_det->pro_title!!}</li>
    </ul>	
    	<div class="row">	  
			<div class="span3">
            	<img class = "cloudzoom" src = "{!! url('public/assets/product/').'/'.$product_img[0]!!}"
             data-cloudzoom = "zoomImage: '{!! url('public/assets/product/').'/'.$product_img[0]!!}'" style="width:auto;height:285px;" />
        <br/>
        <?php for($i=0;$i < $img_count;$i++) { ?>
        
         <img class = 'cloudzoom-gallery' src = "{!! url('public/assets/product/').'/'.$product_img[$i]!!}" data-cloudzoom = "useZoom: '.cloudzoom', image: '{!! url('public/assets/product/').'/'.$product_img[$i]!!}', zoomImage: '{!! url('public/assets/product/').'/'.$product_img[$i]!!}' " height="auto" width="70px" >
        <?php } ?>
        
            
            </div>
			<div class="span6">
				<h3>{!!$product_det->pro_title!!} </h3>
				<small>- {!!substr($product_det->pro_desc,0,200)!!}</small>
				<hr class="soft"/>
				  {!! Form :: open(array('url' => 'addtocart','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
				  <div class="control-group">
					<label class="control-label"><span>${!!$product_det->pro_disprice!!}</span></label>
					<div class="controls">
                    <input type="number" class="span1" name="addtocart_qty" id="addtocart_qty" placeholder="Qty." value="1" min="1" max="10" />
                     <span id="addtocart_qty_error" style="color:red;" ></span>
                    <input type="hidden" name="addtocart_pro_id" value="<?php echo $product_det->pro_id; ?>" />
                    <input type="hidden" name="return_url" value="<?php echo $product_det->mc_name.'/'.base64_encode(base64_encode(base64_encode($product_det->pro_mc_id))); ?>" />
                    <button type="submit" class="btn btn-large btn-primary pull-right me_btn btnb-success" id="add_to_cart_session" > Add to cart <i class=" icon-shopping-cart"></i></button>

	<div class="basic" data-average="<?php echo round($get_pro_rating_avg[$product_det->pro_id]); ?>" data-id="1" style="padding-top:10px;" ></div>
    <input type="hidden" name="rate_myproduct" id="tate" />

					</div>
				  </div>
				
				
				<hr class="soft"/>
				<h4><?php echo  $product_det->pro_no_of_purchase; ?> Sold / <?php echo  $product_det->pro_qty; ?></h4>  <div id="size_color_error" style="color:#F00;font-weight:800;" ></div>
			
                <?php if($product_color_details) { ?>
				  <div class="control-group">
					<label class="control-label"><span>Color</span></label>
					<div class="controls">
					  <select class="span2" name="addtocart_color" id="addtocart_color">
                      <option value="0">--- Select ---</option>
                      <?php foreach($product_color_details as $product_color_det) { ?>
						  <option value="<?php echo $product_color_det->co_id;?>"><?php echo $product_color_det->co_name;?></option>
						  <?php } ?>
						</select>
					</div>
				  </div>
                  <?php } ?>
                  
                   <?php if($product_size_details) { ?>
                  <div class="control-group">
					<label class="control-label"><span>Size</span></label>
					<div class="controls">
					  <select class="span2" name="addtocart_size" id="addtocart_size">
                      <option value="0">--- Select ---</option>
                      <?php foreach($product_size_details as $product_size_det) { ?>
						  <option value="<?php echo $product_size_det->ps_si_id;?>"><?php echo $product_size_det->si_name;?></option>
						  <?php } ?>
						</select>
					</div>
				  </div>
                  <?php } ?>
				</form>
				
				
             
<div class="span4 social_share">
                <ul style="list-style-type:none;">
                <li><div class="colabs-sc-twitter fl"><iframe frameborder="0" id="twitter-widget-0" scrolling="no" allowtransparency="true" src="http://platform.twitter.com/widgets/tweet_button.1401325387.html#_=1401683471204&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=<?php echo url('');?>;size=m&amp;text=<?php echo urlencode($product_det->pro_title);?>&amp;img=<?php echo url('public/assets/product/').'/'.$product_img[0];?>&amp;url=<?php echo url('product_list/').'/'.$product_det->pro_id;?>&amp;via=NexEcart" class="twitter-share-button twitter-tweet-button twitter-share-button twitter-count-horizontal" title="Twitter Tweet Button" data-twttr-rendered="true" style="width: 109px; height: 20px;"></iframe><script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></div></li>
            
            
            
                <li><div class="shortcode-google-plusone fl"><div style="text-indent: 0px; margin: 0px; padding: 0px; background: none repeat scroll 0% 0% transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px;" id="___plusone_0"><iframe width="100%" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" id="I0_1401683471225" name="I0_1401683471225" src="https://apis.google.com/_/+1/fastbutton?usegapi=1&amp;annotation=bubble&amp;size=medium&amp;origin=<?php echo url('');?>&amp;url=<?php echo url('product_list').'/'.$product_det->pro_id;?>&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.Xh27AGpQ8ys.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Fz%3Dzcms%2Frs%3DAItRSTPG4IuYlgUtku52bcizMHeeQ1ZTOA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1401683471225&amp;parent=<?php echo url('');?>&amp;pfname=&amp;rpctoken=22542457" data-gapiattached="true" title="+1"></iframe></div></div></li><!--/.shortcode-google-plusone-->


<li><div class="colabs-fblike fl">
<iframe frameborder="0" style="border:none; overflow:hidden; width:80px; height:25px;" allowtransparency="true" scrolling="no" src="http://www.facebook.com/plugins/like.php?href=<?php echo url('product_list/').$product_det->pro_id;?>&amp;layout=button_count&amp;show_faces=false&amp;width=80&amp;action=like&amp;colorscheme=light&amp;font=arial"></iframe>
</div></li>
	</ul></div>

				
				
			<a href="#" name="detail"></a>
			
			</div>
			</div>
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Title: </td><td class="techSpecTD2">{!!$product_det->pro_title!!}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Category:</td><td class="techSpecTD2">{!!$product_det->mc_name!!}</td></tr>
				
                <?php if($product_color_details) { ?>
				<tr class="techSpecRow"><td class="techSpecTD1">Colors:</td><td class="techSpecTD2"> <?php $color=''; foreach($product_color_details as $product_color_det) {  $color.= $product_color_det->co_name.','; } echo trim($color,',');?></td></tr>
                <?php } ?>
                <?php if($product_size_details) { ?>
				<tr class="techSpecRow"><td class="techSpecTD1">Display size:</td><td class="techSpecTD2"><?php $size=''; foreach($product_size_details as $product_size_det) {   $size.= $product_size_det->si_name.','; } echo trim($size,',');?></td>
                </tr>
                <?php } ?>
                <tr class="techSpecRow"><td class="techSpecTD1">Delivery within:</td><td class="techSpecTD2">{!!$product_det->pro_delivery!!} days</td></tr>
                <tr class="techSpecRow"><td class="techSpecTD1">Specification:</td><td class="techSpecTD2">{!!$product_det->pro_delivery!!} days</td></tr>
				</tbody>
				</table>
				
				<h5>Features</h5>
				<p>
				{!!$product_det->pro_desc!!}<br/>
				
				</p>
                				
				
              </div>
              
		<div class="tab-pane fade" id="profile">
		<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary btnb-success"><i class="icon-th-large"></i></span></a>
		</div>
		<br class="clr"/>
		<hr class="soft"/>
		<div class="tab-content">
			<div class="tab-pane" id="listView">
	<?php if($related_product_details){ foreach($related_product_details as $product_det){ 
	$product_image = explode('/**/',$product_det->pro_Img);
	
	?>
		<div class="row">	  
			<div class="span2">
				<img src="<?php echo url('public/assets/product/').'/'.$product_image[0];?>" alt="">
			</div>
			<div class="span4">
				<h3>New | Available</h3>				
				<hr class="soft"/>
				<h5><?php echo $product_det->pro_title;?> </h5>
				<p>
				<?php echo $product_det->pro_desc;?>
				</p>
				<a class="btn btn-small pull-right me_view" href="{!! url('product_list').'/'.$product_det->pro_id!!}">View Details</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> $<?php echo $product_det->pro_disprice;?></h3>
			<label class="checkbox">
            
            <br>
<br>


				<input type="checkbox">  Adds product to compare
			</label><br/>
			
			  <a href="{!! url('product_list').'/'.$product_det->pro_id!!}" class="btn btn-large btn-primary me_btn btnb-success"> Add to <i class=" icon-shopping-cart"></i></a>
			  <a href="{!! url('product_list').'/'.$product_det->pro_id!!}" class="btn btn-large"><i class="icon-zoom-in"></i></a>
			
				</form>
			</div>
		</div>
		<hr class="soft"/>
        <?php } }else{ ?>
        <div class="row">	  
			
			<div class="span4">
				<h3>No Product's Available</h3>				
				
				<br class="clr"/>
			</div>
			
		</div>
        <?php } ?>	
				
			<hr class="soft"/>
		</div>
			<div class="tab-pane active" id="blockView">
				<ul class="thumbnails">
					
					<?php if($related_product_details){ foreach($related_product_details as $product_det){ 
	$product_image = explode('/**/',$product_det->pro_Img);
	$product_saving_price = $product_det->pro_price - $product_det->pro_disprice;
	$product_discount_percentage = round(($product_saving_price/ $product_det->pro_price)*100,2);
	?>
			<li class="span3">
			  <div class="thumbnail" style="width:95%;">
				  <i class="tag"><?php echo round($product_discount_percentage);?>%</i>
                   <?php if($product_det->pro_no_of_purchase >= $product_det->pro_qty) { ?>
                 <img alt="" src="<?php echo url('public/assets/product/').'/'.$product_image[0];?>" style="height:215px;" >
                                    <?php } else { ?>
					<a href="{!! url('product_list').'/'.$product_det->pro_id!!}"><img alt="" src="<?php echo url('public/assets/product/').'/'.$product_image[0];?>" style="height:215px;" ></a>
                    <?php } ?>
					<div class="caption product_show">
				<h4 class="top_text dolor_text">$<?php echo $product_det->pro_disprice;?></h4>
					  <h5 class="prev_text"><?php echo $product_det->pro_title;?></h5>
                        <?php if($product_det->pro_no_of_purchase >= $product_det->pro_qty) { ?>
                                    <h4 style="text-align:center;"><a  class="btn btn-danger">Sold</a> 
                                    <?php } else { ?>
					  <h4><a href="{!! url('product_list').'/'.$product_det->pro_id!!}" class="btn align_brn btnb-success"><i class="icon-large icon-shopping-cart icon_me"></i></a></h4>
                      <?php } ?>
					</div>
				  </div>
			</li>
            <?php } }else{ ?>
         <li class="span3">
			  <div class="thumbnail">
					No Product's Available
					
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
		{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="<?php echo url(''); ?>/themes/js/jquery.js" type="text/javascript"></script>

<!-- Jquery Rating -->
<script src="plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script>
     <script type="text/javascript">
$(document).ready(function(){

$('#add_to_cart_session').click(function(){
	var pro_purchase1 = '<?php echo $product_det_qty->pro_no_of_purchase; ?>' ;
	var pro_purchase = parseInt($('#addtocart_qty').val()) + parseInt(pro_purchase1);
	var pro_qty = '<?php echo $product_det_qty->pro_qty; ?>';
	//alert(pro_purchase1);
	if(pro_purchase >= parseInt(pro_qty))
	{
		$('#addtocart_qty').focus();
		$('#addtocart_qty').css('border-color', 'red');
		$('#addtocart_qty_error').html('Limited Quantity Available');
		return false;
	}
	else
	{
		$('#addtocart_qty').css('border-color', '');
		$('#addtocart_qty_error').html('');
	}
	if($('#addtocart_color').val() ==0)
	{
		$('#addtocart_color').focus();
		$('#addtocart_color').css('border-color', 'red');
		$('#size_color_error').html('Select Color');
		return false;
	}
	else
	{
		$('#addtocart_color').css('border-color', '');
		$('#size_color_error').html('');
	}
	if($('#addtocart_size').val() ==0)
	{
		$('#addtocart_size').focus();
		$('#addtocart_size').css('border-color', 'red');
		$('#size_color_error').html('Select Size');
		return false;
	}
	else
	{
		$('#addtocart_size').css('border-color', '');
		$('#size_color_error').html('');
	}
});
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
    <script src="<?php echo url(''); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo url(''); ?>/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo url(''); ?>/themes/js/bootshop.js"></script>
    <script src="<?php echo url(''); ?>/themes/js/jquery.lightbox-0.5.js"></script> 
    
    <script src="<?php echo url(''); ?>/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script>
    <script src="<?php echo url(''); ?>/plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>
    <script src="<?php echo url(''); ?>/plug-k/demo/js/demo.js" type="text/javascript"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
<!--<div id="secectionBox">
<link rel="stylesheet" href="<?php echo url(''); ?>/themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="<?php echo url(''); ?>/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
	<div id="themeContainer">
	<div id="hideme" class="themeTitle">Style Selector</div>
	<div class="themeName">Original Skin</div>
	<div class="images style">
	<a href="themes/css/#" name="bootshop"><img src="<?php echo url(''); ?>/themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
	<a href="themes/css/#" name="businessltd"><img src="<?php echo url(''); ?>/themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
	</div>
	<div class="themeName">Bootswatch Skins (11)</div>
	<div class="images style">
		<a href="themes/css/#" name="amelia" title="Amelia"><img src="<?php echo url(''); ?>/themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="spruce" title="Spruce"><img src="<?php echo url(''); ?>/themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
		<a href="themes/css/#" name="superhero" title="Superhero"><img src="<?php echo url(''); ?>/themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="cyborg"><img src="<?php echo url(''); ?>/themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="cerulean"><img src="<?php echo url(''); ?>/themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="journal"><img src="<?php echo url(''); ?>/themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="readable"><img src="<?php echo url(''); ?>/themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	
		<a href="themes/css/#" name="simplex"><img src="<?php echo url(''); ?>/themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="slate"><img src="<?php echo url(''); ?>/themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="spacelab"><img src="<?php echo url(''); ?>/themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="united"><img src="<?php echo url(''); ?>/themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
	</div>
	<div class="themeName">Background Patterns </div>
	<div class="images patterns">
		<a href="themes/css/#" name="pattern1"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
		<a href="themes/css/#" name="pattern2"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern3"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern4"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern5"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern6"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern7"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern8"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern9"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern10"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>
		
		<a href="themes/css/#" name="pattern11"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern12"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern13"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern14"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern15"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>
		
		<a href="themes/css/#" name="pattern16"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern17"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern18"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern19"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern20"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>
		 
	</div>
	</div>
</div>
<span id="themesBtn"></span>-->
<script type="text/javascript" src="<?php echo url(''); ?>/themes/js/jquery-1.5.2.min.js"></script>
	<script type="text/javascript" src="<?php echo url(''); ?>/themes/js/scriptbreaker-multiple-accordion-1.js"></script>
    <script language="JavaScript">   
    $(document).ready(function() {
		
		 var options = {
  valueNames: [ 'name', 'born' ]
};

var userList = new List('users', options);


        $(".topnav").accordion({
            accordion:true,
            speed: 500,
            closedSign: '<span class="icon-chevron-right"></span>',
            openedSign: '<span class="icon-chevron-down"></span>'
        });
		$('.cloudzoom-blank').remove();
    });
    
    </script>
    
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/css/jRating.jquery.css" type="text/css" />
    	<script type="text/javascript" src="<?php echo url(''); ?>/public/assets/js/icons/jquery.js"></script>
    
    <script type="text/javascript">
		$(document).ready(function(){
			$('.basic').jRating();
		});
	</script>
    
<!-- Jquery Rating -->
<script>
(function($) {
	$.fn.jRating = function(op) {
		var defaults = {
			/** String vars **/
			bigStarsPath : '<?php echo url(''); ?>/public/assets/js/icons/stars.png', // path of the icon stars.png
			smallStarsPath : '<?php echo url(''); ?>/public/assets/js/icons/small.png', // path of the icon small.png
			 // path of the php file jRating.php
			type : 'big', // can be set to 'small' or 'big'

			/** Boolean vars **/
			step:false, // if true,  mouseover binded star by star,
			isDisabled:false, // if true, user could not rate
			showRateInfo: true, // show rates informations when cursor moves onto the plugin
			canRateAgain : false, // if true, the user could rates {nbRates} times with jRating.. Default, 1 time
			sendRequest: true, // send values to server

			/** Integer vars **/
			length:5, // number of star to display
			decimalLength : 0, // number of decimals.
			rateMax : 5, // maximal rate - integer from 0 to 9999 (or more)
			rateInfosX : -45, // relative position in X axis of the info box when mouseover
			rateInfosY : 5, // relative position in Y axis of the info box when mouseover
			nbRates : 1,

			/** Functions **/
			onSuccess : null, // Fires when the server response is ok
			onError : null, // Fires when the server response is not ok
			onClick: null // Fires when clicking on a star
		};

		if(this.length>0)
		return this.each(function() {
			/*vars*/
			var opts = $.extend(defaults, op),
			newWidth = 0,
			starWidth = 0,
			starHeight = 0,
			bgPath = '',
			hasRated = false,
			globalWidth = 0,
			nbOfRates = opts.nbRates;

			if($(this).hasClass('jDisabled') || opts.isDisabled)
				var jDisabled = true;
			else
				var jDisabled = false;

			getStarWidth();
			$(this).height(starHeight);

			var average = parseFloat($(this).attr('data-average')), // get the average of all rates
			idBox = parseInt($(this).attr('data-id')), // get the id of the box
			widthRatingContainer = starWidth*opts.length, // Width of the Container
			widthColor = average/opts.rateMax*widthRatingContainer, // Width of the color Container

			quotient =
			$('<div>',
			{
				'class' : 'jRatingColor',
				css:{
					width:widthColor
				}
			}).appendTo($(this)),

			average =
			$('<div>',
			{
				'class' : 'jRatingAverage',
				css:{
					width:0,
					top:- starHeight
				}
			}).appendTo($(this)),

			 jstar =
			$('<div>',
			{
				'class' : 'jStar',
				css:{
					width:widthRatingContainer,
					height:starHeight,
					top:- (starHeight*2),
					background: 'url('+bgPath+') repeat-x'
				}
			}).appendTo($(this));


			$(this).css({width: widthRatingContainer,overflow:'hidden',zIndex:1,position:'relative'});

			if(!jDisabled)
			$(this).unbind().bind({
				mouseenter : function(e){
					var realOffsetLeft = findRealLeft(this);
					var relativeX = e.pageX - realOffsetLeft;
					if (opts.showRateInfo)
					var tooltip =
					$('<p>',{
						'class' : 'jRatingInfos',
						html : getNote(relativeX)+' <span class="maxRate">/ '+opts.rateMax+'</span>',
						css : {
							top: (e.pageY + opts.rateInfosY),
							left: (e.pageX + opts.rateInfosX)
						}
					}).appendTo('body').show();
				},
				mouseover : function(e){
					$(this).css('cursor','pointer');
				},
				mouseout : function(){
					$(this).css('cursor','default');
					if(hasRated) average.width(globalWidth);
					else average.width(0);
				},
				mousemove : function(e){
					var realOffsetLeft = findRealLeft(this);
					var relativeX = e.pageX - realOffsetLeft;
					if(opts.step) newWidth = Math.floor(relativeX/starWidth)*starWidth + starWidth;
					else newWidth = relativeX;
					average.width(newWidth);
					if (opts.showRateInfo)
					$("p.jRatingInfos")
					.css({
						left: (e.pageX + opts.rateInfosX)
					})
					.html(getNote(newWidth) +' <span class="maxRate">/ '+opts.rateMax+'</span>');
				},
				mouseleave : function(){
					$("p.jRatingInfos").remove();
				},
				click : function(e){
                    var element = this;

					/*set vars*/
					hasRated = true;
					globalWidth = newWidth;
					nbOfRates--;

					if(!opts.canRateAgain || parseInt(nbOfRates) <= 0) $(this).unbind().css('cursor','default').addClass('jDisabled');

					if (opts.showRateInfo) $("p.jRatingInfos").fadeOut('fast',function(){$(this).remove();});
					e.preventDefault();
					var rate = getNote(newWidth);
					average.width(newWidth);


					/** ONLY FOR THE DEMO, YOU CAN REMOVE THIS CODE **/
						$('#tate').val(rate);
						$('.datasSent p').html('<strong>idBox : </strong>'+idBox+'<br /><strong>rate : </strong>'+rate+'<br /><strong>action :</strong> rating');
						$('.serverResponse p').html('<strong>Loading...</strong>');
					/** END ONLY FOR THE DEMO **/

					if(opts.onClick) opts.onClick( element, rate );

					if(opts.sendRequest) {
						$.post(opts.phpPath,{
								idBox : idBox,
								rate : rate,
								action : 'rating'
							},
							function(data) {
								if(!data.error)
								{
									/** ONLY FOR THE DEMO, YOU CAN REMOVE THIS CODE **/
										$('.serverResponse p').html(data.server);
									/** END ONLY FOR THE DEMO **/


									/** Here you can display an alert box,
										or use the jNotify Plugin :) http://www.myqjqueryplugins.com/jNotify
										exemple :	*/
									if(opts.onSuccess) opts.onSuccess( element, rate );
								}
								else
								{

									/** ONLY FOR THE DEMO, YOU CAN REMOVE THIS CODE **/
										$('.serverResponse p').html(rate);
									/** END ONLY FOR THE DEMO **/

									/** Here you can display an alert box,
										or use the jNotify Plugin :) http://www.myqjqueryplugins.com/jNotify
										exemple :	*/
									if(opts.onError) opts.onError( element, rate );
								}
							},
							'json'
						);
					}

				}
			});

			function getNote(relativeX) {
				var noteBrut = parseFloat((relativeX*100/widthRatingContainer)*parseInt(opts.rateMax)/100);
				var dec=Math.pow(10,parseInt(opts.decimalLength));
				var note = Math.round(noteBrut*dec)/dec;
				return note;
			};

			function getStarWidth(){
				switch(opts.type) {
					case 'small' :
						starWidth = 12; // width of the picture small.png
						starHeight = 10; // height of the picture small.png
						bgPath = opts.smallStarsPath;
					break;
					default :
						starWidth = 23; // width of the picture stars.png
						starHeight = 20; // height of the picture stars.png
						bgPath = opts.bigStarsPath;
				}
			};

			function findRealLeft(obj) {
			  if( !obj ) return 0;
			  return obj.offsetLeft + findRealLeft( obj.offsetParent );
			};
		});

	}
})(jQuery);
</script>
</body>
</html>
