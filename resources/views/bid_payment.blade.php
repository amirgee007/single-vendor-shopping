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
  </head>
<body>
<div id="header">
<div class="container">

<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="">
  <?php foreach($get_image_logoicons_details as $logo) { } ?>
    <a class="brand" href="index"><img src="<?php echo url(''); ?>/themes/images/logo2.png" alt="Nexcart"></a>
		<div class="pull-right " style="padding-top:10px; padding-left:25px">   
        
    </div>
        
    
    
    <br>
    <ul id="topMenu" class="nav pull-right" style="background:#ff8400;width:70%;">
	 <li><a href="index.html"></a></li>
	 <li><a href="products.html"></a></li>
     <li class=""><a href="deals.html"></a></li>
     <li class=""><a href="auction.html"></a></li>
     <li class=""><a href="#"></a></li>     
     <li class=""><a href="#"></a></li>
	 <li class="active"><a href="contact.html"></a></li>
	
    </ul>
    
  </div>
</div>
</div>

</div>
<legend></legend>

<!-- Header End====================================================================== -->
<div id="mainBody">
<div class="container">
	<?php foreach($get_acution_details as $auction_detail) { } 
		$product_image = explode('/**/',$auction_detail->auc_image);?>
    <div class="row-fluid">
    <div class="span5"><h2><?php echo $auction_detail->auc_title; ?></h2></div>
     <div class="span6"> <h3 class="plce_text"><?php if (Lang::has(Session::get('lang_file').'.BID_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.BID_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.BID_AMOUNT');} ?>: $<?php echo $auction_detail->auc_auction_price; ?></h3></div>
    </div>
	<div class="row">
		<div class="span4 thumbnail">
		
        
        <img src="<?php echo url(''); ?>/public/assets/auction/<?php echo $product_image[0]; ?>"></div>
			
		
		<div class="span7">
       
		<div class="span7 thumbnail form_place">
        <h4 class="bid_text"><?php if (Lang::has(Session::get('lang_file').'.BID_SUMMARY')!= '') { echo  trans(Session::get('lang_file').'.BID_SUMMARY');}  else { echo trans($OUR_LANGUAGE.'.BID_SUMMARY');} ?></h4>
        {!! Form::open(array('url'=>'place_bid_payment','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
       <center> <table>
        <tr>
        <td  width="150" height="30"><?php if (Lang::has(Session::get('lang_file').'.YOUR_BID_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.YOUR_BID_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.YOUR_BID_AMOUNT');} ?></td>
        <td  width="100" height="30">:</td>
        <td  width="100" height="30">$<?php echo $price; ?></td>
        </tr>
           <tr>
        <td><?php if (Lang::has(Session::get('lang_file').'.SHIPPING_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.SHIPPING_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.SHIPPING_AMOUNT');} ?></td>
        <td>:</td>
        <td>$<?php echo $auction_detail->auc_shippingfee; ?></td>
        </tr>
          
        <tr>
        <td><?php if (Lang::has(Session::get('lang_file').'.YOUR_SHIPPING_ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.YOUR_SHIPPING_ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.YOUR_SHIPPING_ADDRESS');} ?>
 </td>
        <td>:</td>
        <td ><textarea name="oa_cus_address" id="ship_address" rows="3" cols="10"></textarea></td>
        </tr>
         <tr>
        <td><b><?php if (Lang::has(Session::get('lang_file').'.TOTAL')!= '') { echo  trans(Session::get('lang_file').'.TOTAL');}  else { echo trans($OUR_LANGUAGE.'.TOTAL');} ?></b></td>
        <td>:</td>
        <td>$<?php echo $price+$auction_detail->auc_shippingfee; ?></td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        <td>
        
        <input type="hidden" name="auction_bid_proid_popup" id="auction_bid_proid_popup" value="<?php echo  $auction_detail->auc_id; ?> " >
        <input type="hidden" name="bid_amt" id="" value="<?php echo  $price; ?> " >
        <input type="hidden" name="bid_shipping" id="" value="<?php echo  $auction_detail->auc_shippingfee; ?> " >
        <input type="hidden" name="return_url"  value="<?php echo  $return_url; ?>  " >
         <?php foreach($customerdetails as $customer_deat) { } ?>
       
        <input type="hidden" name="oa_cus_id" value="<?php echo  $customer_deat->cus_id; ?> " >
        <input type="hidden" name="oa_pro_id" value="<?php echo  $auction_detail->auc_id; ?> " >
        <input type="hidden" name="oa_cus_name" value="<?php echo  $customer_deat->cus_name; ?> " >
        <input type="hidden" name="oa_cus_email" value="<?php echo  $customer_deat->cus_email; ?> " >
        <input type="hidden" name="oa_bid_amt" value="<?php echo  $price; ?> " >
        <input type="hidden" name="oa_original_bit_amt" value="<?php echo  $auction_detail->auc_auction_price; ?> " >   
        <button class="btn  btn-warning"  style="margin-top:10px;margin-bottom:10px;" id="bid_update">place a bid</button>
        </form>
        </td>        
        </tr>
        </table>
        </center>
        <legend></legend>
        <h4 class="gop_text"><?php if (Lang::has(Session::get('lang_file').'.GOOD_NEWS')!= '') { echo  trans(Session::get('lang_file').'.GOOD_NEWS');}  else { echo trans($OUR_LANGUAGE.'.GOOD_NEWS');} ?> !</h4>
        <label class="pgr_text"> <?php if (Lang::has(Session::get('lang_file').'.A_PRODUCT_OF_NEXEMERCHANT')!= '') { echo  trans(Session::get('lang_file').'.A_PRODUCT_OF_NEXEMERCHANT');}  else { echo trans($OUR_LANGUAGE.'.A_PRODUCT_OF_NEXEMERCHANT');} ?>. </label>
		
		</div>
	</div>
	
</div>
<br>
<legend></legend>
<ul class="done_text">
<?php echo $auction_detail->auc_description; ?>
</ul>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
 <script src="<?php echo url(''); ?>/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script> 
	{!! $footer !!}
    <script>
	$(document).ready(function() {		
	$('#bid_update').click(function() {
		
		if($('#ship_address').val() == "")
		{
			$('#ship_address').css('border', '1px solid red'); 
			$('#ship_address').focus();
			return false;
		}
		else if(trim($('#ship_address').val()) == '')
		{ 
			$('#ship_address').css('border', '1px solid red'); 
			$('#ship_address').focus();
			return false;
		}
	
		else
		{
			$('#ship_address').css('border', ''); 
			
		}
	});
   	
	});
	 </script>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="<?php echo url(''); ?>/themes/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo url(''); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo url(''); ?>/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo url(''); ?>/themes/js/bootshop.js"></script>
    <script src="<?php echo url(''); ?>/themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="<?php echo url(''); ?>/themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="<?php echo url(''); ?>/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
	<div id="themeContainer">
	<div id="hideme" class="themeTitle"><?php if (Lang::has(Session::get('lang_file').'.STYLE_SELECTOR')!= '') { echo  trans(Session::get('lang_file').'.STYLE_SELECTOR');}  else { echo trans($OUR_LANGUAGE.'.STYLE_SELECTOR');} ?></div>
	<div class="themeName"><?php if (Lang::has(Session::get('lang_file').'.OREGIONAL_SKIN')!= '') { echo  trans(Session::get('lang_file').'.OREGIONAL_SKIN');}  else { echo trans($OUR_LANGUAGE.'.OREGIONAL_SKIN');} ?></div>
	<div class="images style">
	<a href="<?php echo url(''); ?>/themes/css/#" name="bootshop"><img src="<?php echo url(''); ?>/themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
	<a href="<?php echo url(''); ?>/themes/css/#" name="businessltd"><img src="<?php echo url(''); ?>/themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
	</div>
	<div class="themeName"><?php if (Lang::has(Session::get('lang_file').'.BOOTSWATCH_SKINS')!= '') { echo  trans(Session::get('lang_file').'.BOOTSWATCH_SKINS');}  else { echo trans($OUR_LANGUAGE.'.BOOTSWATCH_SKINS');} ?> (11)</div>
	<div class="images style">
		<a href="<?php echo url(''); ?>/themes/css/#" name="amelia" title="<?php if (Lang::has(Session::get('lang_file').'.AMELIA')!= '') { echo  trans(Session::get('lang_file').'.AMELIA');}  else { echo trans($OUR_LANGUAGE.'.AMELIA');} ?>"><img src="<?php echo url(''); ?>/themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="spruce" title="<?php if (Lang::has(Session::get('lang_file').'.SPRUCE')!= '') { echo  trans(Session::get('lang_file').'.SPRUCE');}  else { echo trans($OUR_LANGUAGE.'.SPRUCE');} ?>"><img src="<?php echo url(''); ?>/themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="superhero" title="<?php if (Lang::has(Session::get('lang_file').'.SUPERHERO')!= '') { echo  trans(Session::get('lang_file').'.SUPERHERO');}  else { echo trans($OUR_LANGUAGE.'.SUPERHERO');} ?>"><img src="<?php echo url(''); ?>/themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="cyborg"><img src="<?php echo url(''); ?>/themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="cerulean"><img src="<?php echo url(''); ?>/themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="journal"><img src="<?php echo url(''); ?>/themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="readable"><img src="<?php echo url(''); ?>/themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	
		<a href="<?php echo url(''); ?>/themes/css/#" name="simplex"><img src="<?php echo url(''); ?>/themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="slate"><img src="<?php echo url(''); ?>/themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="spacelab"><img src="<?php echo url(''); ?>/themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="united"><img src="<?php echo url(''); ?>/themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small><?php if (Lang::has(Session::get('lang_file').'.THESE_ARE_JUST')!= '') { echo  trans(Session::get('lang_file').'.THESE_ARE_JUST');}  else { echo trans($OUR_LANGUAGE.'.THESE_ARE_JUST');} ?>.</small></p>
	</div>
	<div class="themeName"><?php if (Lang::has(Session::get('lang_file').'.BACKGROUND_PATTERNS')!= '') { echo  trans(Session::get('lang_file').'.BACKGROUND_PATTERNS');}  else { echo trans($OUR_LANGUAGE.'.BACKGROUND_PATTERNS');} ?> </div>
	<div class="images patterns">
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern1"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern2"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern3"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern4"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern5"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern6"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern7"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern8"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern9"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern10"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>
		
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern11"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern12"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern13"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern14"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern15"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>
		
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern16"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern17"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern18"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern19"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(''); ?>/themes/css/#" name="pattern20"><img src="<?php echo url(''); ?>/themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>
		 
	</div>
	</div>
</div>
<span id="themesBtn"></span>
</body>
</html>