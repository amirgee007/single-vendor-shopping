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
		 $metaname="";
		 $metakeywords="";
		  $metadesc="";
	}
	?>
    <title><?php echo $metaname  ;?></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <meta name="description" content="<?php echo $metadesc  ;?>">
     <meta name="keywords" content="<?php echo  $metakeywords ;?>">
	 <meta name="author" content="<?php echo  $metaname ;?>">
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

<div class="container">
<?php foreach($get_acution_details as $auction_detail) { } 
		$product_image = explode('/**/',$auction_detail->auc_image);
  $date1 = date('Y-m-d H:i:s');
  $date2 = $auction_detail->auc_end_date;
  $ts1 = strtotime($date1);
  $ts2 = strtotime($date2);
  $seconds_diff = $ts2 - $ts1;
  $countdown_timing =  floor($seconds_diff/3600/24);
		?>
    <div class="row-fluid">
    <div class="span5"><h4 style="color:#ff8400;"><?php if (Lang::has(Session::get('lang_file').'.CONGRATULATIONS')!= '') { echo  trans(Session::get('lang_file').'.CONGRATULATIONS');}  else { echo trans($OUR_LANGUAGE.'.CONGRATULATIONS');} ?>!<span style="color:#333;">&nbsp;&nbsp;<?php if (Lang::has(Session::get('lang_file').'.YOUR_BID_WAS_PLACED_SUCCESSFULLY')!= '') { echo  trans(Session::get('lang_file').'.YOUR_BID_WAS_PLACED_SUCCESSFULLY');}  else { echo trans($OUR_LANGUAGE.'.YOUR_BID_WAS_PLACED_SUCCESSFULLY');} ?>.!</span></h4></div>
     <div class="span6"> <h3 class="plce_text"><?php if (Lang::has(Session::get('lang_file').'.YOU_WILL_RECEIVE_AN_EMAIL_CONFIRMATION_SHORTLY')!= '') { echo  trans(Session::get('lang_file').'.YOU_WILL_RECEIVE_AN_EMAIL_CONFIRMATION_SHORTLY');}  else { echo trans($OUR_LANGUAGE.'.YOU_WILL_RECEIVE_AN_EMAIL_CONFIRMATION_SHORTLY');} ?></h3></div>
    </div>
	<div class="row">
		<div class="span4 thumbnail">
		
        
        <img src="<?php echo url(''); ?>/public/assets/auction/<?php echo $product_image[0]; ?>"></div>
		
		
		<div class="span7">
       
		<div class="span7 thumbnail form_place">
     
       <center> <table>
        <tr>
        <td  width="150" height="30"><?php if (Lang::has(Session::get('lang_file').'.YOUR_BID_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.YOUR_BID_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.YOUR_BID_AMOUNT');} ?></td>
        <td  width="100" height="30">:</td>
        <td  width="100" height="30" style="color:#FF9C0E; font-weight:bold" >$<?php echo $price; ?></td>
        </tr>
           <tr>
        <td><?php if (Lang::has(Session::get('lang_file').'.ESTIMATED_SHIPPING_CHARGE')!= '') { echo  trans(Session::get('lang_file').'.ESTIMATED_SHIPPING_CHARGE');}  else { echo trans($OUR_LANGUAGE.'.ESTIMATED_SHIPPING_CHARGE');} ?> </td>
        <td>:</td>
        <td style="color:#FF9C0E;font-weight:bold">$<?php echo $auction_detail->auc_shippingfee; ?></td>
        </tr>
         <tr>
        
        </table>      
           
          <div id="countdown" class="countdownHolder span12" style="padding-left:100px;" ></div><br/><br/><br/>
		
                     <center><h5><?php if (Lang::has(Session::get('lang_file').'.AUCTION_TIME_REMAINING')!= '') { echo  trans(Session::get('lang_file').'.AUCTION_TIME_REMAINING');}  else { echo trans($OUR_LANGUAGE.'.AUCTION_TIME_REMAINING');} ?></h5></center>
                     <center><a href="<?php echo $return_url;?>"><button class="btn  btn-warning" id="bid_update"><?php if (Lang::has(Session::get('lang_file').'.CLOSE_WINDOW')!= '') { echo  trans(Session::get('lang_file').'.CLOSE_WINDOW');}  else { echo trans($OUR_LANGUAGE.'.CLOSE_WINDOW');} ?></button></a></center>
       <br>
        </center>
    
       
		
		</div>
	</div>
	
</div><!---->
<br>
<legend></legend>
<ul class="done_text">
<li><label><?php if (Lang::has(Session::get('lang_file').'.ALTERNATIVE_INFORMATION')!= '') { echo  trans(Session::get('lang_file').'.ALTERNATIVE_INFORMATION');}  else { echo trans($OUR_LANGUAGE.'.ALTERNATIVE_INFORMATION');} ?>.</label></li>
<li><label><?php if (Lang::has(Session::get('lang_file').'.CREDIT_CARD_WILL_NOT_BE_CHARGED')!= '') { echo  trans(Session::get('lang_file').'.CREDIT_CARD_WILL_NOT_BE_CHARGED');}  else { echo trans($OUR_LANGUAGE.'.CREDIT_CARD_WILL_NOT_BE_CHARGED');} ?>.</label></li>
<li><label><?php if (Lang::has(Session::get('lang_file').'.RANSACTION_FEE')!= '') { echo  trans(Session::get('lang_file').'.RANSACTION_FEE');}  else { echo trans($OUR_LANGUAGE.'.RANSACTION_FEE');} ?>.</label></li>
<li><label><?php if (Lang::has(Session::get('lang_file').'.ORDER_IS_CANCELLED')!= '') { echo  trans(Session::get('lang_file').'.ORDER_IS_CANCELLED');}  else { echo trans($OUR_LANGUAGE.'.ORDER_IS_CANCELLED');} ?>.</label></li>
<li><label><?php if (Lang::has(Session::get('lang_file').'.APPLICABLE_SALES')!= '') { echo  trans(Session::get('lang_file').'.APPLICABLE_SALES');}  else { echo trans($OUR_LANGUAGE.'.APPLICABLE_SALES');} ?> ;  <?php if (Lang::has(Session::get('lang_file').'.TENNESSEE_ORDERS')!= '') { echo  trans(Session::get('lang_file').'.TENNESSEE_ORDERS');}  else { echo trans($OUR_LANGUAGE.'.TENNESSEE_ORDERS');} ?>. </label></li>
</ul>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
 <script src="<?php echo url(''); ?>/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script> 
	{!! $footer !!}
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
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="<?php echo url(''); ?>/themes/css/jquery.countdown.css" />
		<script src="<?php echo url(''); ?>/themes/js/jquery.countdown.js"></script>
      
       <!-- Count Down Coding -->
		<script>
        $(function(){
		var cnt_tmg = '<?php echo $countdown_timing; ?>';
	var note = $('#note'),
		ts = new Date(2012, 0, 1),
		newYear = true;
	
	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts = (new Date()).getTime() + cnt_tmg*24*60*60*1000;
		newYear = false;
	}
		
	$('#countdown').countdown({
		timestamp	: ts
		
	});
	
});
        </script>
	<div id="themeContainer">
	<div id="hideme" class="themeTitle"><?php if (Lang::has(Session::get('lang_file').'.STYLE_SELECTOR')!= '') { echo  trans(Session::get('lang_file').'.STYLE_SELECTOR');}  else { echo trans($OUR_LANGUAGE.'.STYLE_SELECTOR');} ?></div>
	<div class="themeName"><?php if (Lang::has(Session::get('lang_file').'.OREGIONAL_SKIN')!= '') { echo  trans(Session::get('lang_file').'.OREGIONAL_SKIN');}  else { echo trans($OUR_LANGUAGE.'.OREGIONAL_SKIN');} ?></div>
	<div class="images style">
	<a href="<?php echo url(); ?>/themes/css/#" name="bootshop"><img src="<?php echo url(); ?>/themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
	<a href="<?php echo url(); ?>/themes/css/#" name="businessltd"><img src="<?php echo url(); ?>/themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
	</div>
	<div class="themeName"><?php if (Lang::has(Session::get('lang_file').'.BOOTSWATCH_SKINS')!= '') { echo  trans(Session::get('lang_file').'.BOOTSWATCH_SKINS');}  else { echo trans($OUR_LANGUAGE.'.BOOTSWATCH_SKINS');} ?> (11)</div>
	<div class="images style">
		<a href="<?php echo url(); ?>/themes/css/#" name="amelia" title="<?php if (Lang::has(Session::get('lang_file').'.AMELIA')!= '') { echo  trans(Session::get('lang_file').'.AMELIA');}  else { echo trans($OUR_LANGUAGE.'.AMELIA');} ?>"><img src="<?php echo url(); ?>/themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="spruce" title="<?php if (Lang::has(Session::get('lang_file').'.SPRUCE')!= '') { echo  trans(Session::get('lang_file').'.SPRUCE');}  else { echo trans($OUR_LANGUAGE.'.SPRUCE');} ?>"><img src="<?php echo url(); ?>/themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="superhero" title="<?php if (Lang::has(Session::get('lang_file').'.SUPERHERO')!= '') { echo  trans(Session::get('lang_file').'.SUPERHERO');}  else { echo trans($OUR_LANGUAGE.'.SUPERHERO');} ?>"><img src="<?php echo url(); ?>/themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="cyborg"><img src="<?php echo url(); ?>/themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="cerulean"><img src="<?php echo url(); ?>/themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="journal"><img src="<?php echo url(); ?>/themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="readable"><img src="<?php echo url(); ?>/themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	
		<a href="<?php echo url(); ?>/themes/css/#" name="simplex"><img src="<?php echo url(); ?>/themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="slate"><img src="<?php echo url(); ?>/themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="spacelab"><img src="<?php echo url(); ?>/themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="united"><img src="<?php echo url(); ?>/themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small><?php if (Lang::has(Session::get('lang_file').'.THESE_ARE_JUST')!= '') { echo  trans(Session::get('lang_file').'.THESE_ARE_JUST');}  else { echo trans($OUR_LANGUAGE.'.THESE_ARE_JUST');} ?>.</small></p>
	</div>
	<div class="themeName"><?php if (Lang::has(Session::get('lang_file').'.BACKGROUND_PATTERNS')!= '') { echo  trans(Session::get('lang_file').'.BACKGROUND_PATTERNS');}  else { echo trans($OUR_LANGUAGE.'.BACKGROUND_PATTERNS');} ?> </div>
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
	</div>
</div>
<span id="themesBtn"></span>
</body>
</html>