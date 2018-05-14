 {!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3 customCategories products">
                <div class="side-menu-head"><strong>Categories</strong></div>
                <ul id="css3menu1" class="topmenu">
                    <input type="checkbox" id="css3menu-switcher" class="switchbox">
                    <label onclick="" class="switch" for="css3menu-switcher"></label>
                    <?php foreach($main_category as $fetch_main_cat) { $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; ?>
                        <?php if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0) { ?>
                            <li class="topfirst"><a href="<?php echo url('catdeals/viewcategorylist')." / ".base64_encode($pass_cat_id1); ?>"><?php echo $fetch_main_cat->mc_name; ?> </a> <b class="OpenCat" onclick=""> + </b>

                                <ul>
                                    <?php foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)  { $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>
                                        <?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0) { ?>
                                            <li class="subfirst"><a href="<?php echo url('catdeals/viewcategorylist')." / ".base64_encode($pass_cat_id2); ?>"><?php echo $fetch_sub_main_cat->smc_name ; ?> </a> <b class="OpenCat" onclick=""> + </b>

                                                <ul>
                                                    <?php  foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat) { $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id;?>
                                                        <?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0) { ?>
                                                            <li class="subsecond"><a href="<?php echo url('catdeals/viewcategorylist')." / ".base64_encode($pass_cat_id3); ?>"><?php echo  $fetch_sub_cat->sb_name; ?> </a> <b class="OpenCat" onclick=""> + </b>

                                                                <ul>
                                                                    <?php  foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat) { $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?>
                                                                        <li class="subthird"><a href="<?php echo url('catdeals/viewcategorylist')." / ".base64_encode($pass_cat_id4); ?>"><?php echo $fetch_secsub_cat->ssb_name ?></a></li>
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

            <div class="side-menu-head"><strong>Most Visited Deals</strong></div>
                <?php $date = date('Y-m-d H:i:s');
  foreach($get_special_product as $fetch_most_visit_pro) {

			 $mostproduct_discount_percentage = $fetch_most_visit_pro->deal_discount_percentage;
			 $mostproduct_img = explode('/**/', $fetch_most_visit_pro->deal_image);
			 $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
             $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
			  $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
			  $res = base64_encode($fetch_most_visit_pro->deal_id);

			 	?>
                    <div class="thumbnail">
                        <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
                            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                    <img  src="<?php echo url(''); ?>/public/assets/deals/<?php echo $mostproduct_img[0]; ?>" alt="<?php echo $fetch_most_visit_pro->deal_title; ?>"  height="150px"/>
                    </a>
                            <?php } ?>
                                <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
                                    <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}">
                    <img  src="<?php echo url(''); ?>/public/assets/deals/<?php echo $mostproduct_img[0]; ?>" alt="<?php echo $fetch_most_visit_pro->deal_title; ?>" height="150px"/>
                    </a>
                                    <?php } ?>
                                        <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
                                            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}">
                    <img  src="<?php echo url(''); ?>/public/assets/deals/<?php echo $mostproduct_img[0]; ?>" alt="<?php echo $fetch_most_visit_pro->deal_title; ?>"  height="150px"/>
                    </a>
                                            <?php } ?>
                                                <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') { ?>
                                                    <a href="{!! url('dealview').'/'.$mcat.'/'.$res!!}">
                    <img  src="<?php echo url(''); ?>/public/assets/deals/<?php echo $mostproduct_img[0]; ?>" alt="<?php echo $fetch_most_visit_pro->deal_title; ?>"  height="150px"/>
                    </a>
                                                    <?php } ?>
                                                        <div class="caption">
                                                            <h3 class="prev_text"><?php echo substr($fetch_most_visit_pro->deal_title,0,20);  ?>...</h3>
                                                            <h4 class="top_text dolor_text">{{ Helper::cur_sym() }} <?php echo $fetch_most_visit_pro->deal_discount_price;  ?></h4>

                                                            <?php if($date > $fetch_most_visit_pro->deal_end_date) { ?>
                                                                <h4 style="text-align:center;"><a  class="btn btn-danger">Sold</a> 
                                    <?php } else { ?>
                                    <?php 

			   if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
               	<center> <h4><a class="btn btn-warning" href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a>
					 </center>
               <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
                 	<center> <h4><a class="btn btn-warning" href="{!! url('dealview1').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a>
					 </center>

			   <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
               	<center> <h4><a class="btn btn-warning" href="{!! url('dealview2').'/'.$mcat.'/'.$smcat.'/'.$res!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a>
					 </center>

               <?php } ?>
			   <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') { ?>
               	<center> <h4><a class="btn btn-warning" href="{!! url('dealview2').'/'.$mcat.'/'.$res!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a>
					 </center>

               <?php } ?>
                     <?php } ?>
					 </h4>
                                                        </div>
                    </div>
                    <?php }  ?>

            </div>
            <!-- Sidebar end=============================================== -->
            <div class="span9 tab-land-wid customProductListing" style="margin: 0px;">
                <ul class="breadcrumb">
                    <li><a href="<?php echo url('index');?>">Home</a> <span class="divider">/</span></li>
                    <li class="active">Deals</li>
                </ul>

                <center> @if (Session::has('success1'))
                    <div class="alert alert-warning alert-dismissable">{!! Session::get('success1') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    @endif</center>
                <div id="demo" class="box jplist jplist-grid-view span9" style="margin-left:0px;background:#fff; width: 100%;">

                    <!-- ios button: show/hide panel -->
                    <div class="jplist-ios-button">
                        <i class="fa fa-sort"></i> More Filters
                    </div>

                    <!-- panel -->
                    <div class="jplist-panel box panel-top" style="margin-left: 22px;">

                        <!-- reset button -->
                        <button type="button" class="jplist-reset-btn" data-control-type="reset" data-control-name="reset" data-control-action="reset">
                            Reset &nbsp;<i class="fa fa-share"></i>
                        </button>

                        <div class="jplist-drop-down" data-control-type="drop-down" data-control-name="paging" data-control-action="paging">
                            <div class="jplist-dd-panel"> 10 per page </div>
                            <ul style="display: none;">
                                <li class=""><span data-number="5"> 5 per page </span></li>
                                <li class="active"><span data-number="10" data-default="true"> 10 per page </span></li>
                                <li><span data-number="15"> 15 per page </span></li>
                                <li><span data-number="all"> view all </span></li>
                            </ul>
                        </div>

                        <div class="jplist-drop-down" data-control-type="drop-down" data-control-name="sort" data-control-action="sort">
                            <div class="jplist-dd-panel">Likes asc</div>
                            <ul style="display: none;">
                                <li class=""><span data-path="default">Sort by</span></li>
                                <li class="active"><span data-path=".like" data-order="asc" data-type="number" data-default="true">Price low - high</span></li>
                                <li><span data-path=".like" data-order="desc" data-type="number">Price high -low</span></li>
                                <li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span></li>
                                <li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span></li>

                            </ul>
                        </div>

                        <!-- filter by title -->
                        <div class="text-filter-box">

                            <!-- <i class="fa fa-search  jplist-icon" style="padding-top:0px;"></i> -->

                            <!--[if lt IE 10]>
								<div class="jplist-label">Filter by Title:</div>
								<![endif]-->

                            <input data-path=".title" value="" placeholder="Filter by Title" class="filt" data-control-type="textbox" data-control-name="title-filter" data-control-action="filter" type="text">
                        </div>

                        <!-- filter by description -->

                        <!-- views -->
                        <div class="jplist-views" data-control-type="views" data-control-name="views" data-control-action="views" data-default="jplist-grid-view" style="visibility:hidden;">

                            <button type="button" class="jplist-view jplist-list-view" data-type="jplist-list-view"></button>
                            <button type="button" class="jplist-view jplist-grid-view" data-type="jplist-grid-view"></button>

                        </div>

                        <!-- pagination results -->
                        <div class="jplist-label" data-type="Page {current} of {pages}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" style="visibility:hidden">Page 1 of 4</div>

                        <!-- pagination -->

                    </div>

                    <!-- data -->
                    <div class="list">
                        <?php  if(count($product_details) != 0){ foreach($product_details as $product_det){ 
	$product_image = explode('/**/',$product_det->deal_image);
	$product_discount_percentage = $product_det->deal_discount_percentage;
	$date = date('Y-m-d H:i:s');
	?>

                            <div class="list-item product productListing deslListing" style="margin: 5px!important;">
                                <!-- img -->
                                <div class="img left productViewCenter">
                                    <?php if($product_det->deal_no_of_purchase >= $product_det->deal_max_limit) { ?>
                                        <img alt="" style="max-width:140px;height:auto;" src="<?php echo url('public/assets/deals/').'/'.$product_image[0];?>">
                                        <?php } else { ?>
                                            <?php 
									 $mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
             $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
			  $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name)); 
			  $res = base64_encode($product_det->deal_id);

			   if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
                                                <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><img alt=""  src="<?php echo url('public/assets/deals/').'/'.$product_image[0];?>"></a>
                                                <?php } ?>
                                                    <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>

                                                        <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}"><img alt="" src="<?php echo url('public/assets/deals/').'/'.$product_image[0];?>"></a>
                                                        <?php } ?>
                                                            <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>

                                                                <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}"><img alt="" src="<?php echo url('public/assets/deals/').'/'.$product_image[0];?>"></a>
                                                                <?php } ?>
                                                                    <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') { ?>

                                                                        <a href="{!! url('dealview').'/'.$mcat.'/'.$res!!}"><img alt="" src="<?php echo url('public/assets/deals/').'/'.$product_image[0];?>"></a>
                                                                        <?php } ?>
                                                                            <?php } ?>
                                </div>

                                <!-- data -->
                                <div class="block right space_text">
                                    <p class="title">
                                        <?php echo substr($product_det->deal_title,0,20);  ?>...</p>

                                    <p class="like product__price">{{ Helper::cur_sym() }}
                                        <?php echo $product_det->deal_discount_price;?>
                                    </p>
                                    <?php if($date >= $product_det->deal_end_date) { ?>
                                        <a class="btn btn-danger">Sold</a>
                                        <?php } else { ?>
                                            <?php 
									 $mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
             $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
			  $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name)); 
			  $res = base64_encode($product_det->deal_id);

			   if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>

                                                <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                                                    <button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
                                                </a>

                                                <?php } ?>
                                                    <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>

                                                        <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}">
                                                            <button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
                                                        </a>

                                                        <?php } ?>
                                                            <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>

                                                                <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}">
                                                                    <button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
                                                                </a>

                                                                <?php } ?>
                                                                    <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') { ?>

                                                                        <a href="{!! url('dealview').'/'.$mcat.'/'.$res!!}">
                                                                            <button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
                                                                        </a>

                                                                        <?php } ?>

                                                                            <?php } ?>
                                </div>
                            </div>

                            <?php } }else
							{ echo '<div class="list box text-shadow">No results found</div>'; } 
							?>
                    </div>

                    <div class="box jplist-no-results text-shadow align-center jplist-hidden span4">
                        <p style="color: rgb(54, 160, 222);
margin-top: 20px;
font-weight: bold;
padding-left: 8px;">No Deals available</p>
                    </div>

                    <!-- ios button: show/hide panel -->
                    <div class="jplist-ios-button">
                        <i class="fa fa-sort"></i> More Filters
                    </div>
                    <div class="clearfix"></div>
                    <!-- panel -->
                    <div class="jplist-panel box panel-bottom" style="width:100%; margin: 0 0 8px 22px;">

                        <div class="jplist-drop-down" data-control-type="drop-down" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true">
                            <div class="jplist-dd-panel"> 10 per page </div>
                            <ul style="display: none;">
                                <li class=""><span data-number="5"> 5 per page </span></li>
                                <li class="active"><span data-number="10" data-default="true"> 10 per page </span></li>
                                <li><span data-number="15"> 15 per page </span></li>
                                <li><span data-number="all"> view all </span></li>
                            </ul>
                        </div>
                        <div class="jplist-drop-down" data-control-type="drop-down" data-control-name="sort" data-control-action="sort" data-control-animate-to-top="true">
                            <div class="jplist-dd-panel">Likes asc</div>
                            <ul style="display: none;">
                                <li class=""><span data-path="default">Sort by</span></li>
                                <li class="active"><span data-path=".like" data-order="asc" data-type="number" data-default="true">Price low - high</span></li>
                                <li><span data-path=".like" data-order="desc" data-type="number">Price high -low</span></li>
                                <li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span></li>
                                <li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span></li>
                            </ul>
                        </div>

                        <div class="jplist-label" data-type="{start} - {end} of {all}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging">1 - 10 of 32</div>

                        <div class="jplist-pagination" data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true">
                            <div class="jplist-pagingprev jplist-hidden" data-type="pagingprev">
                                <button type="button" class="jplist-first" data-number="0" data-type="first">«</button>
                                <button data-number="0" type="button" class="jplist-prev" data-type="prev">‹</button>
                            </div>
                            <div class="jplist-pagingmid" data-type="pagingmid">
                                <div class="jplist-pagesbox" data-type="pagesbox">
                                    <button type="button" data-type="page" class="jplist-current" data-active="true" data-number="0">1</button>
                                    <button type="button" data-type="page" data-number="1">2</button>
                                    <button type="button" data-type="page" data-number="2">3</button>
                                    <button type="button" data-type="page" data-number="3">4</button>
                                </div>
                            </div>
                            <div class="jplist-pagingnext" data-type="pagingnext">
                                <button data-number="1" type="button" class="jplist-next" data-type="next">›</button>
                                <button data-number="3" type="button" class="jplist-last" data-type="last">»</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
{!! $footer !!}

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on("click", ".customCategories .topfirst b", function() {
            $(this).next("ul").css("position", "relative");

            $(".topfirst ul").not($(this).parents(".topfirst").find("ul")).css("display", "none");
            $(this).next("ul").toggle();
        });

        $(document).on("click", ".morePage", function() {
            $(".nextPage").slideToggle(200);
        });

        $(document).on("click", "#smallScreen", function() {
            $(this).toggleClass("customMenu");
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 250) {
                $('#comp_myprod').show();
            } else {
                $('#comp_myprod').hide();
            }
        });

    });
</script>
</body>

</html>