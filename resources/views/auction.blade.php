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

          <link href="<?php echo url(''); ?>/themes/css/leftmenu.css" rel="stylesheet" media="screen"/>

          

           <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />

        <link rel="stylesheet" href="<?php echo url(''); ?>/themes/css/normalize.css" />

  <link rel="stylesheet" href="<?php echo url(''); ?>/themes/css/styles.min.css" />

  <link href="<?php echo url(''); ?>/themes/css/jplist.min.css" rel="stylesheet" type="text/css" />

  

  

	<style type="text/css" id="enject"></style>

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

<hr>

<div id="mainBody">

	<div class="container">

	<div class="row">

<!-- Sidebar ================================================== -->

	<div class="span3" id="sidebar">

		<div class="well well-small btn-warning"><strong><?php if (Lang::has(Session::get('lang_file').'.CATEGORIES')!= '') { echo  trans(Session::get('lang_file').'.CATEGORIES');}  else { echo trans($OUR_LANGUAGE.'.CATEGORIES');} ?>
</strong></div>

		<ul id="css3menu1" class="topmenu">

<input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>

<?php foreach($main_category as $fetch_main_cat) { $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; ?>
<?php if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0) { ?>
<li class="topfirst"><a href="<?php echo url('catauction/viewcategorylist')."/".base64_encode($pass_cat_id1); ?>"><?php echo  $fetch_main_cat->mc_name; ?> </a>
	<ul>    

    <?php foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)  { $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>
		<?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0) { ?>
			 <li class="subfirst"><a href="<?php echo url('catauction/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"><?php echo $fetch_sub_main_cat->smc_name ; ?></a>
		<ul>

                <?php  foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat) { $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id;?>  <?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0) { ?>
					<li class="subsecond"><a href="<?php echo url('catauction/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>"><?php echo  $fetch_sub_cat->sb_name; ?> </a>
                    <ul>

                    <?php  foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat) { $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?>                     
                        <li class="subthird"><a href="<?php echo url('catauction/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>"><?php echo $fetch_secsub_cat->ssb_name ?></a></li>                                        

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

		<br>

		  <div class="clearfix"></div>

		<br/>

          <div class="well well-small btn-warning"><strong><?php if (Lang::has(Session::get('lang_file').'.SPECIALS')!= '') { echo  trans(Session::get('lang_file').'.SPECIALS');}  else { echo trans($OUR_LANGUAGE.'.SPECIALS');} ?></strong></div>

           <?php date_default_timezone_set("Asia/Kolkata"); $date = date('Y-m-d H:i:s'); foreach($most_visited_product as $fetch_most_visit_pro) {
 				if($fetch_most_visit_pro->auc_end_date > $date)
						{
			   $mostproduct_saving_price = $fetch_most_visit_pro->auc_original_price - $fetch_most_visit_pro->auc_auction_price;

			 $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->auc_original_price)*100,2);

			 $mostproduct_img = explode('/**/', $fetch_most_visit_pro->auc_image);

			 	?>

         <div class="thumbnail">

				<a  href="{!! url('auctionview').'/'.$fetch_most_visit_pro->auc_id!!}"><img  src="<?php echo url(''); ?>/public/assets/auction/<?php echo $mostproduct_img[0]; ?>" alt="<?php echo $fetch_most_visit_pro->auc_title; ?>"/></a>

					<div class="caption">

				<h4 class="top_text dolor_text">$<?php echo $mostproduct_saving_price;  ?></h4>

				  <label class="com_text"><?php echo substr($fetch_most_visit_pro->auc_title,0,50);  ?>...</label>

					 <h4>

					 <div class="row-fluid">

					 <div class="sapn12">

					 <div class="span8">

                     <?php

				

					 ?>

					 <label class="bit_font"><?php if (Lang::has(Session::get('lang_file').'.LAST_BIDDER')!= '') { echo  trans(Session::get('lang_file').'.LAST_BIDDER');}  else { echo trans($OUR_LANGUAGE.'.LAST_BIDDER');} ?>
<span class="add_bit">:

					 <?php 

					

					 if($most_visited_product) {

						
							 if($get_auction_last_bidder1[$fetch_most_visit_pro->auc_id]) { echo $get_auction_last_bidder1[$fetch_most_visit_pro->auc_id];} else

					 { echo 'Not yed bid'; }
				   }

					  ?> </span></label>

					

					  <label class="bit_font"><?php if (Lang::has(Session::get('lang_file').'.BIT_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.BIT_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.BIT_AMOUNT');} ?>
<span class="add_bit">:$<?php echo $fetch_most_visit_pro->auc_auction_price;  ?></span></label>

					 

					 </div>

					 <div class="sapn4 offset7">

                  



					<a class="btn btn-warning" href="{!! url('auctionview').'/'.$fetch_most_visit_pro->auc_id!!}"><?php if (Lang::has(Session::get('lang_file').'.BID_NOW')!= '') { echo  trans(Session::get('lang_file').'.BID_NOW');}  else { echo trans($OUR_LANGUAGE.'.BID_NOW');} ?></a></div>

					 

					 </div>

					

					 </div>

					 </h4>

					</div>

				  </div>

		  <br>

				<?php } }?>		

	</div>

<!-- Sidebar end=============================================== -->





<div id="demo" class="box jplist jplist-grid-view span9" style="margin-left:20px;">

					

						<!-- ios button: show/hide panel -->

						<div class="jplist-ios-button">

							<i class="fa fa-sort"></i>

							<?php if (Lang::has(Session::get('lang_file').'.MORE_FILTERS')!= '') { echo  trans(Session::get('lang_file').'.MORE_FILTERS');}  else { echo trans($OUR_LANGUAGE.'.MORE_FILTERS');} ?>

						</div>

						

						<!-- panel -->

						<div class="jplist-panel box panel-top">						

							

							<!-- reset button -->

							<button type="button" class="jplist-reset-btn" data-control-type="reset" data-control-name="reset" data-control-action="reset">

								<?php if (Lang::has(Session::get('lang_file').'.RESET')!= '') { echo  trans(Session::get('lang_file').'.RESET');}  else { echo trans($OUR_LANGUAGE.'.RESET');} ?> &nbsp;<i class="fa fa-share"></i>

							</button>

							

							<div class="jplist-drop-down" data-control-type="drop-down" data-control-name="paging" data-control-action="paging"><div class="jplist-dd-panel"> 10 <?php if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') { echo  trans(Session::get('lang_file').'.PER_PAGE');}  else { echo trans($OUR_LANGUAGE.'.PER_PAGE');} ?></div>

								<ul style="display: none;">

									<li class=""><span data-number="5"> 5 <?php if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') { echo  trans(Session::get('lang_file').'.PER_PAGE');}  else { echo trans($OUR_LANGUAGE.'.PER_PAGE');} ?> </span></li>

									<li class="active"><span data-number="10" data-default="true"> 10 <?php if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') { echo  trans(Session::get('lang_file').'.PER_PAGE');}  else { echo trans($OUR_LANGUAGE.'.PER_PAGE');} ?> </span></li>

									<li><span data-number="15"> 15 <?php if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') { echo  trans(Session::get('lang_file').'.PER_PAGE');}  else { echo trans($OUR_LANGUAGE.'.PER_PAGE');} ?></span></li>

									<li><span data-number="all"> <?php if (Lang::has(Session::get('lang_file').'.VIEW_ALL')!= '') { echo  trans(Session::get('lang_file').'.VIEW_ALL');}  else { echo trans($OUR_LANGUAGE.'.VIEW_ALL');} ?> </span></li>

								</ul>

							</div>

							

							<div class="jplist-drop-down" data-control-type="drop-down" data-control-name="sort" data-control-action="sort"><div class="jplist-dd-panel"><?php if (Lang::has(Session::get('lang_file').'.LIKES_ASC')!= '') { echo  trans(Session::get('lang_file').'.LIKES_ASC');}  else { echo trans($OUR_LANGUAGE.'.LIKES_ASC');} ?></div>

								<ul style="display: none;">

									<li class=""><span data-path="default"><?php if (Lang::has(Session::get('lang_file').'.SORT_BY')!= '') { echo  trans(Session::get('lang_file').'.SORT_BY');}  else { echo trans($OUR_LANGUAGE.'.SORT_BY');} ?></span></li>

                                    <li class="active"><span data-path=".like" data-order="asc" data-type="number" data-default="true"><?php if (Lang::has(Session::get('lang_file').'.PRICE_LOW')!= '') { echo  trans(Session::get('lang_file').'.PRICE_LOW');}  else { echo trans($OUR_LANGUAGE.'.PRICE_LOW');} ?> - <?php if (Lang::has(Session::get('lang_file').'.HIGH')!= '') { echo  trans(Session::get('lang_file').'.HIGH');}  else { echo trans($OUR_LANGUAGE.'.HIGH');} ?></span></li>

									<li><span data-path=".like" data-order="desc" data-type="number"><?php if (Lang::has(Session::get('lang_file').'.PRICE_HIGH')!= '') { echo  trans(Session::get('lang_file').'.PRICE_HIGH');}  else { echo trans($OUR_LANGUAGE.'.PRICE_HIGH');} ?>-<?php if (Lang::has(Session::get('lang_file').'.LOW')!= '') { echo  trans(Session::get('lang_file').'.LOW');}  else { echo trans($OUR_LANGUAGE.'.LOW');} ?></span></li>

									<li><span data-path=".title" data-order="asc" data-type="text"><?php if (Lang::has(Session::get('lang_file').'.TITLE')!= '') { echo  trans(Session::get('lang_file').'.TITLE');}  else { echo trans($OUR_LANGUAGE.'.TITLE');} ?><?php if (Lang::has(Session::get('lang_file').'.A')!= '') { echo  trans(Session::get('lang_file').'.A');}  else { echo trans($OUR_LANGUAGE.'.A');} ?>-<?php if (Lang::has(Session::get('lang_file').'.Z')!= '') { echo  trans(Session::get('lang_file').'.Z');}  else { echo trans($OUR_LANGUAGE.'.Z');} ?></span></li>

									<li><span data-path=".title" data-order="desc" data-type="text"><?php if (Lang::has(Session::get('lang_file').'.TITLE')!= '') { echo  trans(Session::get('lang_file').'.TITLE');}  else { echo trans($OUR_LANGUAGE.'.TITLE');} ?><?php if (Lang::has(Session::get('lang_file').'.Z')!= '') { echo  trans(Session::get('lang_file').'.Z');}  else { echo trans($OUR_LANGUAGE.'.Z');} ?>-<?php if (Lang::has(Session::get('lang_file').'.A')!= '') { echo  trans(Session::get('lang_file').'.A');}  else { echo trans($OUR_LANGUAGE.'.A');} ?></span></li>

									<li><span data-path=".desc" data-order="asc" data-type="text"><?php if (Lang::has(Session::get('lang_file').'.DESCRIPTION')!= '') { echo  trans(Session::get('lang_file').'.DESCRIPTION');}  else { echo trans($OUR_LANGUAGE.'.DESCRIPTION');} ?> <?php if (Lang::has(Session::get('lang_file').'.A')!= '') { echo  trans(Session::get('lang_file').'.A');}  else { echo trans($OUR_LANGUAGE.'.A');} ?>-<?php if (Lang::has(Session::get('lang_file').'.Z')!= '') { echo  trans(Session::get('lang_file').'.Z');}  else { echo trans($OUR_LANGUAGE.'.Z');} ?></span></li>

									<li><span data-path=".desc" data-order="desc" data-type="text"><?php if (Lang::has(Session::get('lang_file').'.DESCRIPTION')!= '') { echo  trans(Session::get('lang_file').'.DESCRIPTION');}  else { echo trans($OUR_LANGUAGE.'.DESCRIPTION');} ?> <?php if (Lang::has(Session::get('lang_file').'.Z')!= '') { echo  trans(Session::get('lang_file').'.Z');}  else { echo trans($OUR_LANGUAGE.'.Z');} ?>-<?php if (Lang::has(Session::get('lang_file').'.A')!= '') { echo  trans(Session::get('lang_file').'.A');}  else { echo trans($OUR_LANGUAGE.'.A');} ?></span></li>

								</ul>

							</div>

							

							<!-- filter by title -->

							<div class="text-filter-box">

							

								<i class="fa fa-search  jplist-icon"></i>

								

								<!--[if lt IE 10]>

								<div class="jplist-label">Filter by Title:</div>

								<![endif]-->

								

								<input data-path=".title" value="" placeholder="<?php if (Lang::has(Session::get('lang_file').'.FILTER_BY_TITLE')!= '') { echo  trans(Session::get('lang_file').'.FILTER_BY_TITLE');}  else { echo trans($OUR_LANGUAGE.'.FILTER_BY_TITLE');} ?>" data-control-type="textbox" data-control-name="title-filter" data-control-action="filter" type="text" >

							</div>

							

							<!-- filter by description -->

							

							

							<!-- views -->

							<div class="jplist-views" data-control-type="views" data-control-name="views" data-control-action="views" data-default="jplist-grid-view">

								

								<button type="button" class="jplist-view jplist-list-view" data-type="jplist-list-view"></button>

								<button type="button" class="jplist-view jplist-grid-view" data-type="jplist-grid-view"></button>

								

							</div>

							

							<!-- pagination results -->

							<div class="jplist-label" data-type="Page {current} of {pages}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging"><?php if (Lang::has(Session::get('lang_file').'.PAGE')!= '') { echo  trans(Session::get('lang_file').'.PAGE');}  else { echo trans($OUR_LANGUAGE.'.PAGE');} ?> 1 <?php if (Lang::has(Session::get('lang_file').'.OF')!= '') { echo  trans(Session::get('lang_file').'.OF');}  else { echo trans($OUR_LANGUAGE.'.OF');} ?> 4</div>

								

							<!-- pagination -->

							<div class="jplist-pagination" data-control-type="pagination" data-control-name="paging" data-control-action="paging"><div class="jplist-pagingprev jplist-hidden" data-type="pagingprev"><button type="button" class="jplist-first" data-number="0" data-type="first">«</button><button data-number="0" type="button" class="jplist-prev" data-type="prev">‹</button></div><div class="jplist-pagingmid" data-type="pagingmid"><div class="jplist-pagesbox" data-type="pagesbox"><button type="button" data-type="page" class="jplist-current" data-active="true" data-number="0">1</button> <button type="button" data-type="page" data-number="1">2</button> <button type="button" data-type="page" data-number="2">3</button> <button type="button" data-type="page" data-number="3">4</button> </div></div><div class="jplist-pagingnext" data-type="pagingnext"><button data-number="1" type="button" class="jplist-next" data-type="next">›</button><button data-number="3" type="button" class="jplist-last" data-type="last">»</button></div></div>	

							

						</div>

						



						

						

						<!-- data -->   

						<div class="list box text-shadow">

                        

                         <?php  if(count($product_details) != 0){  date_default_timezone_set("Asia/Kolkata"); $date = date('Y-m-d H:i:s'); foreach($product_details as $product_det){ 
						 //echo $product_det->auc_end_date;
						 if($product_det->auc_end_date > $date)
						{
	$product_image = explode('/**/',$product_det->auc_image);



	

	?>

							<div class="list-item box thumbnail">					

								<!-- img -->

								<div class="img left">

									<a  href="{!! url('auctionview').'/'.$product_det->auc_id!!}"><img  src="<?php echo url(''); ?>/public/assets/auction/<?php echo $product_image[0]; ?>" alt="<?php echo $product_det->auc_title; ?>" style="height:100px; width:300px; "  /></a>

								</div>

								

								<!-- data -->

								<div class="block right space_text">

									<p class="like">$<?php echo $product_det->auc_auction_price; ?></p>

									<p class="title"></p><p>

                                   <label class="title"><?php echo $product_det->auc_title; ?></label>

									<div class="row-fluid">

					 <div class="sapn12">

					 <div class="span12">

                     

                     <?php

				

					$get_auction_last_bidder[$product_det->auc_id] ?>

					 <label class="bit_font"><?php if (Lang::has(Session::get('lang_file').'.LAST_BIDDER')!= '') { echo  trans(Session::get('lang_file').'.LAST_BIDDER');}  else { echo trans($OUR_LANGUAGE.'.LAST_BIDDER');} ?><span class="add_bit">:

					 <?php if($get_auction_last_bidder[$product_det->auc_id]) {echo $get_auction_last_bidder[$product_det->auc_id];} else

					 { echo 'Not yed bid'; }

					  ?>

                      

                     </span></label>

					  <label class="bit_font"><?php if (Lang::has(Session::get('lang_file').'.BIT_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.BIT_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.BIT_AMOUNT');} ?><span class="add_bit">:$<?php echo $product_det->auc_auction_price; ?></span></label>

					

					 </div>

					 <div class="sapn4 offset7" style="margin:0 auto;">

					<a  href="{!! url('auctionview').'/'.$product_det->auc_id!!}" class="btn align_brn icon_me" style="margin:0 auto;width:30%;"> <?php if (Lang::has(Session::get('lang_file').'.BID_NOW')!= '') { echo  trans(Session::get('lang_file').'.BID_NOW');}  else { echo trans($OUR_LANGUAGE.'.BID_NOW');} ?></a></div>

					 

					 </div>

					

					 </div>

								</div>

							</div>

                            

                             <?php } !!}else

							{ echo '<div class="list box text-shadow">No results found</div>'; } 

							?>

                            </div>	

						

						<div class="box jplist-no-results text-shadow align-center jplist-hidden">

							<p><?php if (Lang::has(Session::get('lang_file').'.NO_RESULTS_FOUND')!= '') { echo  trans(Session::get('lang_file').'.NO_RESULTS_FOUND');}  else { echo trans($OUR_LANGUAGE.'.NO_RESULTS_FOUND');} ?></p>

						</div>

						

						<!-- ios button: show/hide panel -->

						<div class="jplist-ios-button">

							<i class="fa fa-sort"></i>
							<?php if (Lang::has(Session::get('lang_file').'.LIST_ACTIONS')!= '') { echo  trans(Session::get('lang_file').'.LIST_ACTIONS');}  else { echo trans($OUR_LANGUAGE.'.LIST_ACTIONS');} ?>

						</div>

						

						<!-- panel -->

						<div class="jplist-panel box panel-bottom">						

													

							<div data-control-animate-to-top="true" data-control-action="paging" data-control-name="paging" data-control-type="drop-down" class="jplist-drop-down"><div class="jplist-dd-panel"> 10 <?php if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') { echo  trans(Session::get('lang_file').'.PER_PAGE');}  else { echo trans($OUR_LANGUAGE.'.PER_PAGE');} ?> </div>

								<ul style="display: none;">

									<li class=""><span data-number="5"> 5<?php if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') { echo  trans(Session::get('lang_file').'.PER_PAGE');}  else { echo trans($OUR_LANGUAGE.'.PER_PAGE');} ?> </span></li>

									<li class="active"><span data-default="true" data-number="10"> 10 <?php if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') { echo  trans(Session::get('lang_file').'.PER_PAGE');}  else { echo trans($OUR_LANGUAGE.'.PER_PAGE');} ?> </span></li>

									<li><span data-number="15"> 15 <?php if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') { echo  trans(Session::get('lang_file').'.PER_PAGE');}  else { echo trans($OUR_LANGUAGE.'.PER_PAGE');} ?> </span></li>

									<li><span data-number="all"> <?php if (Lang::has(Session::get('lang_file').'.VIEW_ALL')!= '') { echo  trans(Session::get('lang_file').'.VIEW_ALL');}  else { echo trans($OUR_LANGUAGE.'.VIEW_ALL');} ?></span></li>

								</ul>

							</div>

							<div data-control-animate-to-top="true" data-control-action="sort" data-control-name="sort" data-control-type="drop-down" class="jplist-drop-down"><div class="jplist-dd-panel"><?php if (Lang::has(Session::get('lang_file').'.SORT_BY')!= '') { echo  trans(Session::get('lang_file').'.SORT_BY');}  else { echo trans($OUR_LANGUAGE.'.SORT_BY');} ?></div>

								<ul style="display: none;">

									<li class="active"><span data-path="default"><?php if (Lang::has(Session::get('lang_file').'.SORT_BY')!= '') { echo  trans(Session::get('lang_file').'.SORT_BY');}  else { echo trans($OUR_LANGUAGE.'.SORT_BY');} ?></span></li>

									<li><span data-type="text" data-order="asc" data-path=".title"><?php if (Lang::has(Session::get('lang_file').'.TITLE')!= '') { echo  trans(Session::get('lang_file').'.TITLE');}  else { echo trans($OUR_LANGUAGE.'.TITLE');} ?> <?php if (Lang::has(Session::get('lang_file').'.A')!= '') { echo  trans(Session::get('lang_file').'.A');}  else { echo trans($OUR_LANGUAGE.'.A');} ?>-<?php if (Lang::has(Session::get('lang_file').'.Z')!= '') { echo  trans(Session::get('lang_file').'.Z');}  else { echo trans($OUR_LANGUAGE.'.Z');} ?></span></li>

									<li><span data-type="text" data-order="desc" data-path=".title"><?php if (Lang::has(Session::get('lang_file').'.TITLE')!= '') { echo  trans(Session::get('lang_file').'.TITLE');}  else { echo trans($OUR_LANGUAGE.'.TITLE');} ?> <?php if (Lang::has(Session::get('lang_file').'.Z')!= '') { echo  trans(Session::get('lang_file').'.Z');}  else { echo trans($OUR_LANGUAGE.'.Z');} ?>-<?php if (Lang::has(Session::get('lang_file').'.A')!= '') { echo  trans(Session::get('lang_file').'.A');}  else { echo trans($OUR_LANGUAGE.'.A');} ?></span></li>

									<li><span data-type="text" data-order="asc" data-path=".desc"><?php if (Lang::has(Session::get('lang_file').'.DESCRIPTION')!= '') { echo  trans(Session::get('lang_file').'.DESCRIPTION');}  else { echo trans($OUR_LANGUAGE.'.DESCRIPTION');} ?> <?php if (Lang::has(Session::get('lang_file').'.A')!= '') { echo  trans(Session::get('lang_file').'.A');}  else { echo trans($OUR_LANGUAGE.'.A');} ?>-<?php if (Lang::has(Session::get('lang_file').'.Z')!= '') { echo  trans(Session::get('lang_file').'.Z');}  else { echo trans($OUR_LANGUAGE.'.Z');} ?></span></li>

									<li><span data-type="text" data-order="desc" data-path=".desc"><?php if (Lang::has(Session::get('lang_file').'.DESCRIPTION')!= '') { echo  trans(Session::get('lang_file').'.DESCRIPTION');}  else { echo trans($OUR_LANGUAGE.'.DESCRIPTION');} ?> <?php if (Lang::has(Session::get('lang_file').'.Z')!= '') { echo  trans(Session::get('lang_file').'.Z');}  else { echo trans($OUR_LANGUAGE.'.Z');} ?>-<?php if (Lang::has(Session::get('lang_file').'.A')!= '') { echo  trans(Session::get('lang_file').'.A');}  else { echo trans($OUR_LANGUAGE.'.A');} ?></span></li>

									<li class=""><span data-type="number" data-order="asc" data-path=".like"><?php if (Lang::has(Session::get('lang_file').'.LIKES_ASC')!= '') { echo  trans(Session::get('lang_file').'.LIKES_ASC');}  else { echo trans($OUR_LANGUAGE.'.LIKES_ASC');} ?></span></li>

									<li><span data-type="number" data-order="desc" data-path=".like"><?php if (Lang::has(Session::get('lang_file').'.LIKES_DESC')!= '') { echo  trans(Session::get('lang_file').'.LIKES_DESC');}  else { echo trans($OUR_LANGUAGE.'.LIKES_DESC');} ?></span></li>

									<li><span data-type="datetime" data-order="asc" data-path=".date"><?php if (Lang::has(Session::get('lang_file').'.DATE_ASC')!= '') { echo  trans(Session::get('lang_file').'.DATE_ASC');}  else { echo trans($OUR_LANGUAGE.'.DATE_ASC');} ?></span></li>

									<li><span data-type="datetime" data-order="desc" data-path=".date"><?php if (Lang::has(Session::get('lang_file').'.DATE_DESC')!= '') { echo  trans(Session::get('lang_file').'.DATE_DESC');}  else { echo trans($OUR_LANGUAGE.'.DATE_DESC');} ?></span></li>

								</ul>

							</div>

							

							<!-- pagination results -->

							<div data-control-action="paging" data-control-name="paging" data-control-type="pagination-info" data-type="{start} - {end} of {all}" class="jplist-label">1 - 5 <?php if (Lang::has(Session::get('lang_file').'.OF')!= '') { echo  trans(Session::get('lang_file').'.OF');}  else { echo trans($OUR_LANGUAGE.'.OF');} ?> 5</div>

								

							<!-- pagination -->

							<div data-control-animate-to-top="true" data-control-action="paging" data-control-name="paging" data-control-type="pagination" class="jplist-pagination jplist-one-page"><div data-type="pagingprev" class="jplist-pagingprev jplist-hidden"><button data-type="first" data-number="0" class="jplist-first" type="button">«</button><button data-type="prev" class="jplist-prev" type="button" data-number="0">‹</button></div><div data-type="pagingmid" class="jplist-pagingmid"><div data-type="pagesbox" class="jplist-pagesbox"><button data-number="0" data-active="true" class="jplist-current" data-type="page" type="button">1</button> </div></div><div data-type="pagingnext" class="jplist-pagingnext jplist-hidden"><button data-type="next" class="jplist-next" type="button" data-number="0">›</button><button data-type="last" class="jplist-last" type="button" data-number="0">»</button></div></div>					

						</div>

					</div>

</div>

</div>

</div>

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

	  <script src="<?php echo url(''); ?>/themes/js/jquery-1.10.0.min.js"></script>

 <script src="<?php echo url(''); ?>/themes/js/modernizr.min.js"></script>

 <script src="<?php echo url(''); ?>/themes/js/jplist.min.js"></script>



 <script>

   $('document').ready(function(){

    $('#demo').jplist({

    

     itemsBox: '.list' 

     ,itemPath: '.list-item' 

     ,panelPath: '.jplist-panel'

     

     //save plugin state

     ,storage: 'localstorage' //'', 'cookies', 'localstorage'   

     ,storageName: 'jplist-div-layout'

    });

   });

 </script>

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

		<a href="<?php echo url(''); ?>/themes/css/#" name="amelia" title="Amelia"><img src="<?php echo url(''); ?>/themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>

		<a href="<?php echo url(''); ?>/themes/css/#" name="spruce" title="Spruce"><img src="<?php echo url(''); ?>/themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>

		<a href="<?php echo url(''); ?>/themes/css/#" name="superhero" title="Superhero"><img src="<?php echo url(''); ?>/themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>

		<a href="<?php echo url(''); ?>/themes/css/#" name="cyborg"><img src="<?php echo url(''); ?>/themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>

		<a href="<?php echo url(''); ?>/themes/css/#" name="cerulean"><img src="<?php echo url(''); ?>/themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>

		<a href="<?php echo url(''); ?>/themes/css/#" name="journal"><img src="<?php echo url(''); ?>/themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>

		<a href="<?php echo url(''); ?>/themes/css/#" name="readable"><img src="<?php echo url(''); ?>/themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	

		<a href="<?php echo url(''); ?>/themes/css/#" name="simplex"><img src="<?php echo url(''); ?>/themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>

		<a href="<?php echo url(''); ?>/themes/css/#" name="slate"><img src="<?php echo url(''); ?>/themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>

		<a href="<?php echo url(''); ?>/themes/css/#" name="spacelab"><img src="<?php echo url(); ?>/themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>

		<a href="<?php echo url(''); ?>/themes/css/#" name="united"><img src="<?php echo url(''); ?>/themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>

		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small><?php if (Lang::has(Session::get('lang_file').'.THESE_ARE_JUST')!= '') { echo  trans(Session::get('lang_file').'.THESE_ARE_JUST');}  else { echo trans($OUR_LANGUAGE.'.THESE_ARE_JUST');} ?>.</small></p>

	</div>

	<div class="themeName"><?php if (Lang::has(Session::get('lang_file').'.FILTER_BY_TITLE')!= '') { echo  trans(Session::get('lang_file').'.FILTER_BY_TITLE');}  else { echo trans($OUR_LANGUAGE.'.FILTER_BY_TITLE');} ?> </div>

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
