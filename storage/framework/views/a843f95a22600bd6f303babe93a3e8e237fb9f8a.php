<?php echo $navbar; ?>

<!-- Navbar ================================================== -->
<?php echo $header; ?>

<!-- Header End====================================================================== -->
<?php if(!isset($_SESSION['compare_product'])): ?>
<?php 	$_SESSION['compare_product']=array(); ?>
<?php endif; ?> 
<style type="text/css">
   /*Small-slider*/
   #quote-carousel
   {
   margin-top: 18px;
   }
   #quote-carousel1 
   {
   margin-top: 18px;
   }
   #quote-carousel2 
   {
   margin-top: 18px;
   }
   #quote-carousel .carousel-control
   {
   background: none;
   color: #222;
   font-size: 2.3em;
   text-shadow: none;
   margin-top: 30px;
   }
   #quote-carousel .carousel-control.left 
   {
   left: -12px;
   }
   #quote-carousel .carousel-control.right 
   {
   right: -12px;
   }
   #quote-carousel .carousel-indicators 
   {
   top: auto;
   bottom: 0px;
   }
   #quote-carousel .carousel-indicators .text-center img
   {
   width: 100%;
   }
   #quote-carousel .carousel-indicators li 
   {
   background: green;
   }
   #quote-carousel .carousel-indicators .active 
   {
   background: darkgreen;
   }
   .item blockquote {
   border-left: none; 
   margin: 0;
   }
   .pro-slide .carousel-inner
   {
   width: 104%;
   }
   .pro-slide .span4{margin-left:18px;}
   .product__image{width:171px;}
</style>
<div class="container">
   <div class="row">
      <div class="span3 side-men customCategories">
         <div class="side-menu-head"><strong> <?php if(Lang::has(Session::get('lang_file').'.CATEGORIES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CATEGORIES')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CATEGORIES')); ?> <?php endif; ?></strong></div>
         <?php
         $prod_path_loader = url('').'/public/assets/noimage/product_loading.gif';
         $image_exist_count="";
         $i=1; ?> 
         <?php if(count($main_category)>0): ?>
         <ul id="css3menu1" class="topmenu">
            <?php echo e(Form::checkbox('','',null,array('class'=>'switchbox','id'=>'css3menu-switcher'))); ?>

            <?php echo e(Form::label('css3menu-switcher','',array('class'=>'switch','onclick'=>''))); ?>

            <?php $__currentLoopData = $main_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_main_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php	$pass_cat_id1 = "1,".$fetch_main_cat->mc_id; ?>
            <?php if($i<=7): ?>
            <li class="topfirst">
               <a href="<?php echo e(url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1)); ?>">
               <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
               <?php  $mc_name = 'mc_name'; ?>
               <?php else: ?>   <?php $mc_name = 'mc_name_'.Session::get('lang_code'); ?> <?php endif; ?>
               <?php echo e($fetch_main_cat->mc_name); ?>

               </a> <b class="OpenCat" onclick="">+</b>
               <?php if(count($sub_main_category[$fetch_main_cat->mc_id])> 0): ?>
               <ul>
                  <?php $__currentLoopData = $sub_main_category[$fetch_main_cat->mc_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_sub_main_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php	$pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>
                  <li class="subfirst">
                     <a href="<?php echo e(url('catproducts/viewcategorylist') ."/".base64_encode($pass_cat_id2)); ?>">
                     <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                     <?php  $smc_name = 'smc_name'; ?>
                     <?php else: ?>  <?php $smc_name = 'smc_name_'.Session::get('lang_code'); ?> <?php endif; ?>
                     <?php echo e($fetch_sub_main_cat->$smc_name); ?>

                     </a> <b class="OpenCat" onclick="">+</b>
                     <?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])> 0): ?>
                     <ul>
                        <?php $__currentLoopData = $second_main_category[$fetch_sub_main_cat->smc_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php	$pass_cat_id3 = "3,".$fetch_sub_cat->sb_id; ?>
                        <li class="subsecond">
                           <a href=" <?php echo e(url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3)); ?> ">
                           <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                           <?php $sb_name = 'sb_name'; ?>
                           <?php else: ?>  <?php $sb_name = 'sb_name_'.Session::get('lang_code'); ?> <?php endif; ?>
                           <?php echo e($fetch_sub_cat->$sb_name); ?>

                           </a>
                           <?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])> 0): ?>
                           <ul>
                              <?php $__currentLoopData = $second_sub_main_category[$fetch_sub_cat->sb_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_secsub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                              <?php $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?>
                              <li class="subthird"><a href="<?php echo e(url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4)); ?>">
                                 <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                                 <?php	$ssb_name = 'ssb_name'; ?>
                                 <?php else: ?>  <?php $ssb_name = 'ssb_name_'.Session::get('lang_code'); ?> <?php endif; ?>
                                 <?php echo e($fetch_secsub_cat->$ssb_name); ?>

                                 </a>
                              </li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                           <?php endif; ?>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                     </ul>
                     <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
               </ul>
               <?php endif; ?>
               <?php endif; ?>  <?php $i++; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li class="topfirst"><a href="<?php echo e(url('category_list_all')); ?>"><b><?php if(Lang::has(Session::get('lang_file').'.MORE_CATEGORIES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MORE_CATEGORIES')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MORE_CATEGORIES')); ?> <?php endif; ?> </b></a>
            </li>
         </ul>
         <?php else: ?>  
         <!--putendif-->	
         <?php if(Lang::has(Session::get('lang_file').'.NO_CATEGORY_FOUND')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_CATEGORY_FOUND')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_CATEGORY_FOUND')); ?> <?php endif; ?>
         <?php endif; ?>
         <br>
         <div class="clearfix"></div>
         <br/>
      </div>
      <div class="homeSlider span9">
         <div id="carouselBlk">
            <div id="myCarousel" class="carousel slide">
               <div class="carousel-inner">
                  <?php $banner_img_found=0; ?>
                  <?php if(count($bannerimagedetails) >0 ): ?>
                  <?php $i=1; ?>

                  <?php $__currentLoopData = $bannerimagedetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php 
               $pro_img = $banner->bn_img;
               $prod_path = url('').'/public/assets/default_image/No_image_banner.png'; ?>
                              
                     <?php   $img_data = "public/assets/bannerimage/".$pro_img; ?>
                    <?php if(file_exists($img_data) && $pro_img != ''): ?>
                   
                  <?php     $prod_path = url('').'/public/assets/bannerimage/'.$pro_img; ?>
                   
                   <?php else: ?>
                   
                      <?php if(isset($DynamicNoImage['banner'])): ?> 
                               <?php               
                                 $dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['banner']; ?>
                                    <?php if($DynamicNoImage['banner'] !='' && file_exists($dyanamicNoImg_path)): ?>
                                     
                                    <?php $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['banner']; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                               
                   
              <?php endif; ?>
              
                  
                  <div  <?php if($i==1): ?>  class="item active" <?php else: ?>  class="item"  <?php endif; ?> >
                  <?php $file_name=$prod_path; ?>
                  <?php if($file_name!=''): ?> <?php $banner_img_found++; ?>
                  <a href="<?php echo e($banner->bn_redirecturl); ?>" target='_blank'><img src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>"  alt=""/></a>
                  <?php else: ?>   
                  <div class="">
                     <a><img style="width:100%" src="<?php echo e(url('')); ?>/public/assets/noimage/No_image_1509364387_870x350.png " alt="special offers"/></a>
                  </div>
                  <?php endif; ?>
               </div>
               <?php $i++; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  <?php else: ?> 
               <div class="item active">
                  <a><img style="width:100%" src="<?php echo e(url('')); ?>/public/assets/noimage/No_image_1509364387_870x350.png " alt="special offers"/></a>
               </div>
               <?php endif; ?>
            </div>
            <?php if(count($bannerimagedetails)>1): ?>  
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
            <?php endif; ?>
         </div>
      </div>
   </div>
</div>
</div>
<div class="container">
   <div style="height:25px"></div>
</div>
<?php if(count($addetails)>0): ?>  
<div id="no_image_hide" class="container hide-mob hid-tab center_banner">
   <div class="">
      <?php
      $image_exist_count=0; ?>
      <?php $noimgpath="public/assets/noimage/No_image_1509364387_380x215.png"; ?>
      <?php if(isset($DynamicNoImage['ads'])): ?>
      <?php $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['ads']; ?>
      <?php if($DynamicNoImage['ads']!='' && file_exists(trim($dyanamicNoImg_path))): ?>
      <?php	$noimgpath =url('')."/".$dyanamicNoImg_path; ?> <?php endif; ?>
      <?php endif; ?>
      <?php $count=1; ?>
      <?php $__currentLoopData = $addetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adinfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
      <?php $imgpath="public/assets/adimage/".$adinfo->ad_img; ?>
      <?php $adurl=$adinfo->ad_redirecturl;  ?>
      <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
      <?php $ad_name = 'ad_name'; ?>
      <?php else: ?>   <?php $ad_name = 'ad_name_'.Session::get('lang_code');  ?> <?php endif; ?>
      <?php $image_exist_count++ ; ?>
      <div  <?php if(count($addetails)==1): ?> class="threeColumn centered_img1" <?php elseif(count($addetails)==2): ?>  class="threeColumn centered_img2" <?php elseif(count($addetails)==3): ?>  class="threeColumn centered_img3" <?php endif; ?> >
      <div id="spn4">
         <a href="<?php echo e($adurl); ?>" target="_blank" title="<?php echo e($adinfo->$ad_name); ?>">
         <?php if(file_exists($imgpath)): ?>  
         <img src="<?php echo e(url('').'/'.$imgpath); ?>" class="" width="100%" height="auto"></a>
      </div>
   </div>
   <?php else: ?> 
   <img src="<?php echo e($noimgpath); ?>" alt="No Image Available" width="100%" height="auto"></a>
</div>
</div>  <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div>
</div>
<?php endif; ?>
<?php echo e(Form::Hidden('','$image_exist_count',array('id'=>'image_exist_count'))); ?>

<!-- <input type="hidden" name="" id="image_exist_count" value="<?php echo e($image_exist_count); ?> "> -->
<div id="mainBody">
   <div class="container home-pro" >
      <?php if(Session::has('wish')): ?>
      <p class="alert <?php echo Session::get('alert-class', 'alert-success'); ?>"><?php echo Session::get('wish'); ?></p>
      <?php endif; ?>
      <?php if(Session::has('success')): ?>
      <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo Session::get('success'); ?></div>
      <?php endif; ?>
      <div class="row" id="hmenwprd">
         <?php if(count($dealsof_day_details) != 0): ?> 
         <!-- Sidebar ================================================== -->
         <center>
            <h3 class="home-heading marginHeading">
               <?php if(Lang::has(Session::get('lang_file').'.DEALS_OF_THE_DAY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DEALS_OF_THE_DAY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DEALS_OF_THE_DAY')); ?> <?php endif; ?>
            </h3>
         </center>
         <div id="demo" class="span12 tab-land-wid">
            <div class="view">
               <section class="grid">
                  <?php $date = date('Y-m-d H:i:s'); ?>
                  <?php $__currentLoopData = $dealsof_day_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_most_visit_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                  <?php	$mostproduct_discount_percentage = $fetch_most_visit_pro->deal_discount_percentage;
                  $mostproduct_img = explode('/**/', $fetch_most_visit_pro->deal_image);
                  $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
                  $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
                  $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
                  $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
                  $res = base64_encode($fetch_most_visit_pro->deal_id);
                  $date2 = $fetch_most_visit_pro->deal_end_date;
                  $deal_end_year = date('Y',strtotime($date2));
                  $deal_end_month = date('m',strtotime($date2));
                  $deal_end_date = date('d',strtotime($date2));
                  $deal_end_hours = date('H',strtotime($date2));  
                  $deal_end_minutes = date('i',strtotime($date2));    
                  $deal_end_seconds = date('s',strtotime($date2));  ?>
                  <!-- //Title -->
                  <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                  <?php  $deal_title = 'deal_title'; ?>
                  <?php else: ?>  <?php $deal_title = 'deal_title_'.Session::get('lang_code'); ?> <?php endif; ?>
                  <?php if($fetch_most_visit_pro->deal_no_of_purchase < $fetch_most_visit_pro->deal_max_limit): ?>   
                  <!-- item 1 -->
                  <div class="product customProduct">
                     <!-- product__info -->
                     <div class="product__info">
                        <!-- img newProduct -->
                        <div class="img newProduct">
                           <!-- img -->
                           <?php
                              $prod_path = url('').'/public/assets/default_image/No_image_deal.png';
                              
                              $img_data = "public/assets/deals/".$mostproduct_img[0]; ?>
                           <?php if(file_exists($img_data) && $mostproduct_img[0] ): ?>	
                           <?php	$prod_path = url('').'/public/assets/deals/' .$mostproduct_img[0]; ?>
                           <?php else: ?>	
                           <?php if(isset($DynamicNoImage['dealImg'])): ?>
                           <?php	$dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['dealImg'];?>
                           <?php if($DynamicNoImage['dealImg']!='' && file_exists(trim($dyanamicNoImg_path))): ?>
                           <?php $prod_path = url('')."/".$dyanamicNoImg_path; ?> <?php endif; ?>
                           <?php endif; ?>
                           <?php endif; ?> 
                           <?php	$alt_txt 	= substr($fetch_most_visit_pro->$deal_title,0,25);
                           $alt_txt 	.= strlen($fetch_most_visit_pro->$deal_title)>25?'..':''; ?>
                           <?php if($mostproduct_discount_percentage!='' && round($mostproduct_discount_percentage)!=0): ?> 
                           <i class="tag"><?php echo e(($mostproduct_discount_percentage)); ?>%</i>
                           <?php endif; ?>
                           <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?>  
                           <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>">
                           <img class="product__image" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_txt); ?>" />
                           </a>
                           <?php endif; ?> <!-- //if  -->
                           <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
                           <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>" >
                           <img class="product__image" alt="<?php echo e($alt_txt); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>">
                           </a>
                           <!-- //if --> <?php endif; ?>
                           <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?>  
                           <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>" >
                           <img class="product__image" alt="<?php echo e($alt_txt); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>">
                           </a>
                           <?php endif; ?>
                           <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?>  
                           <a href="<?php echo url('dealview').'/'.$mcat.'/'.$res; ?>" >
                           <img class="product__image" alt="<?php echo e($alt_txt); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>">
                           </a>
                           <?php endif; ?>
                        </div>
                        <!-- img newProduct -->
                        <!-- product__info -->
                        <div class="">
                           <p class="title product__title tab-title"><?php
                              echo substr($fetch_most_visit_pro->$deal_title,0,25);echo strlen($fetch_most_visit_pro->$deal_title)>25?'..':'';  ?></p>
                           <p class="like product__price"><?php echo e(Helper::cur_sym()); ?> <?php echo $fetch_most_visit_pro->deal_discount_price;?></p>
                        </div>
                     </div>
                     <script>
                        $(function(){
                        	//year = <?php echo $deal_end_year;?>; month = <?php echo $deal_end_month;?>; day = <?php echo $deal_end_date;?>;hour= <?php echo $deal_end_hours;?>; min= <?php echo $deal_end_minutes;?>; sec= <?php echo $deal_end_seconds;?>;
                           
                        countProcess(<?php echo e($fetch_most_visit_pro->deal_id); ?>);
                        });
                     </script>
                     <!-- product__info -->
                     <?php /*
                        <div id="countdown<?php echo $fetch_most_visit_pro->deal_id; ?>" class="countdownHolder">
                  </div>
                  */?>
                  <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
                  <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>">
                  <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?> </span></button>
                  </a>
                  <?php endif; ?> <!-- //if --> 
                  <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
                  <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>">
                  <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                  </a>
                  <?php endif; ?> <!-- //if -->
                  <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
                  <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>">
                  <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                  </a>
                  <?php endif; ?> <!-- //if -->
                  <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?>  
                  <a href="<?php echo url('dealview').'/'.$mcat.'/'.$res; ?>">
                  <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                  </a>
                  <?php endif; ?>  
            </div>
            <!--product customProduct-->
            <?php endif; ?> <!-- // if -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  <!-- //foreach -->
            </section>
         </div>
         <!--view-->
         <section class="compare">
            <button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible"><?php if(Lang::has(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE_COMPARISON_OVERLAY')); ?> <?php endif; ?></span></button>
         </section>
         <!-- compare basket end-->
         <!-- ios button: show/hide panel -->
      </div>
      <!-- Sidebar end=============================================== -->	
      <?php endif; ?> <!-- //if deals has -->
      <!-- Sidebar ================================================== -->
      <center>
         <h3 class="home-heading marginHeading">
            <?php if(Lang::has(Session::get('lang_file').'.TOP_OFFERS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOP_OFFERS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOP_OFFERS')); ?> <?php endif; ?>
            <?php /*if (Lang::has(Session::get('lang_file').'.NEW_PRODUCTS')!= '') { echo  trans(Session::get('lang_file').'.NEW_PRODUCTS');}  else { echo trans($OUR_LANGUAGE.'.NEW_PRODUCTS');} */?>
         </h3>
      </center>
      <div id="demo" class="span12 tab-land-wid">
         <!--<div id="comp_myprod" class="ui-group-buttons">
            <button class="compare_product_fixedbtn btn">
            		<a href ="compare_products" target="_blank">
            
            		<?php if (Lang::has(Session::get('lang_file').'.COMPARE')!= '') { echo  trans(Session::get('lang_file').'.COMPARE');}  else { echo trans($OUR_LANGUAGE.'.COMPARE');}
               echo  ' <span>'.$count = count($_SESSION['compare_product']); ?> </span>	</a>
            
            </button>
            
            		<?php if($count > 0){?>
            <div class="or"></div>
            
            		<!-- <a href='clear_compare'>Clear List</a> -->
         <!--	<button class="compare_product_fixedbtn btn"><a href="clear_compare">Clear List</a></button>
            <?php } ?>
            
            </div>-->
         <!-- panel -->
         <!-- Compare basket -->
         <div class="compare-basket">
            <button class="action action--button action--compare"><i class="fa fa-check"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.COMPARE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COMPARE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COMPARE')); ?> <?php endif; ?></span></button>
         </div>
         <div class="view">
            <section class="grid">
               <?php if(count($product_details) != 0): ?>
               <?php $__currentLoopData = $product_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
               <?php	$mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
               $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
               $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
               $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name)); 
               $res = base64_encode($product_det->pro_id);
               $product_image = explode('/**/',$product_det->pro_Img);
               $product_saving_price = $product_det->pro_price - $product_det->pro_disprice;
               $product_discount_percentage = round(($product_saving_price/ $product_det->pro_price)*100,2); ?>
               <!-- //product title -->
               <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?> <?php
               $title = 'pro_title'; ?>
               <?php else: ?> <?php  $title = 'pro_title_'.Session::get('lang_code') ?> <?php endif; ?>
               <?php if($product_det->pro_no_of_purchase < $product_det->pro_qty): ?>   
               <!-- //echo $product_det->pro_id;
                  /* Image Path */ -->
               <?php	$prod_path = url('').'/public/assets/default_image/No_image_product.png';
               $img_data = "public/assets/product/".$product_image[0];?>
               <?php if(file_exists($img_data) && $product_image[0] ): ?>
               <?php $prod_path = url('').'/public/assets/product/' .$product_image[0];	?>				
               <?php else: ?>	
               <?php if(isset($DynamicNoImage['productImg'])): ?>
               <?php	$dyanamicNoImg_path ='public/assets/noimage/' .$DynamicNoImage['productImg']; ?>
               <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>
               <?php $prod_path = url('')."/".$dyanamicNoImg_path; ?> <?php endif; ?>
               <?php endif; ?>
               <?php endif; ?>	
               <!-- /* Image Path ends */	
                  //Alt text -->
               <?php	$alt_text  	= substr($product_det->$title,0,25);
               $alt_text  .= strlen($product_det->$title)>25?'..':''; ?>
               <!-- item 1 -->
               <div class="product customProduct">
                  <!-- product__info -->
                  <div class="product__info">
                     <!-- img newProduct -->
                     <div class="img newProduct">
                        <?php if($product_discount_percentage!='' && round($product_discount_percentage)!=0): ?>
                        <i class="tag"><?php echo e(round($product_discount_percentage)); ?>%</i>
                        <?php endif; ?>
                        <!-- //if(($product_image[0]!='')){ --> 
                        <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
                        <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>">
                        <img class="product__image" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>" title=""/>
                        </a>
                        <?php endif; ?> <!-- /*//if*/ --> 
                        <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
                        <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>" >
                        <img class="product__image" alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>">
                        </a>
                        <?php endif; ?> <!-- //if -->
                        <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
                        <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>" >
                        <img class="product__image" alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>">
                        </a>
                        <?php endif; ?> 
                        <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
                        <a href="<?php echo url('productview').'/'.$mcat.'/'.$res; ?>" >
                        <img class="product__image" alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>">
                        </a>
                        <?php endif; ?>
                     </div>
                     <!-- img newProduct -->
                     <!-- product__info -->
                     <div class="">
                        <p class="title product__title tab-title">
                           <?php echo e(substr($product_det->$title,0,25)); ?>

                           <?php echo e(strlen($product_det->$title)>25?'..':''); ?>

                        </p>
                        <p class="like product__price"><?php echo e(Helper::cur_sym()); ?> <?php echo e($product_det->pro_disprice); ?></p>
                     </div>
                     <?php if($product_det->pro_no_of_purchase >= $product_det->pro_qty): ?> 
                     <h4 style="text-align:center;"><a  class="btn btn-danger"><?php if(Lang::has(Session::get('lang_file').'.SOLD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD')); ?> <?php endif; ?></a> </h4>
                     <?php else: ?>  
                     <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?>  
                     <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                     </a>
                     <?php endif; ?>
                     <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
                     <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?><?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                     </a>
                     <?php endif; ?>
                     <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
                     <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                     </a>
                     <?php endif; ?>
                     <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?>
                     <a href="<?php echo url('productview').'/'.$mcat.'/'.$res; ?>">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                     </a>
                     <?php endif; ?>
                  </div>
                  <!-- product__info -->
                  <?php endif; ?> <!-- //else --> 						
               </div>
               <!--product customProduct-->
               <?php endif; ?> <!-- // if -->
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  <!-- //foreach -->
               <!-- // if -->
               <?php elseif(count($product_details) == 0): ?>
               <div class="box jplist-no-results text-shadow align-center jplist-hidden">
                  <p style="margin-top:20px;color: rgb(54, 160, 222);margin-top: 20px;font-weight: bold;padding-left: 8px;">
                     <?php if(Lang::has(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_PRODUCTS_AVAILABLE')); ?> <?php endif; ?>
                  </p>
               </div>
               <?php endif; ?> <!-- //else --> 
            </section>
         </div>
         <!--view-->
         <section class="compare">
            <button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible"><?php if(Lang::has(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE_COMPARISON_OVERLAY')); ?> <?php endif; ?></span></button>
         </section>
         <!-- compare basket end-->
         <!-- ios button: show/hide panel -->
      </div>
      <!-- Sidebar end=============================================== -->	
      <!-- Sidebar ================================================== -->
      <?php if(count($get_product_details_belowfifty) != 0): ?>
      <center>
         <h3 class="home-heading marginHeading"><?php if(Lang::has(Session::get('lang_file').'.UPTO')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.UPTO')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.UPTO')); ?> <?php endif; ?> 
            50% 
            <?php if(Lang::has(Session::get('lang_file').'.OFFER')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.OFFER')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.OFFER')); ?> <?php endif; ?>
         </h3>
      </center>
      <div id="demo" class="span12 tab-land-wid">
         <!--<div id="comp_myprod" class="ui-group-buttons">
            <button class="compare_product_fixedbtn btn">
            		<a href ="compare_products" target="_blank">
            
            		<?php if (Lang::has(Session::get('lang_file').'.COMPARE')!= '') { echo  trans(Session::get('lang_file').'.COMPARE');}  else { echo trans($OUR_LANGUAGE.'.COMPARE');}
               echo  ' <span>'.$count = count($_SESSION['compare_product']); ?> </span>	</a>
            
            </button>
            
            
            
            		<?php if($count > 0){?>
            <div class="or"></div>
            
            		<!-- <a href='clear_compare'>Clear List</a> -->
         <!--	<button class="compare_product_fixedbtn btn"><a href="clear_compare">Clear List</a></button>
            <?php } ?>
            
            </div>-->
         <!-- panel -->
         <!-- Compare basket -->
         <div class="compare-basket">
            <button class="action action--button action--compare"><i class="fa fa-check"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.COMPARE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COMPARE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COMPARE')); ?> <?php endif; ?></span></button>
         </div>
         <div class="view">
            <section class="grid">
               <?php	$below_count = 1;	
               $deal = 'other'; ?>				
               <?php if(count($get_product_details_belowfifty) != 0): ?> 
               <?php $__currentLoopData = $get_product_details_belowfifty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
               <?php $mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
               $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
               $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
               $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name)); 
               $res = base64_encode($product_det->pro_id);
               $product_image = explode('/**/',$product_det->pro_Img);
               $product_saving_price = $product_det->pro_price - $product_det->pro_disprice;
               $product_discount_percentage = round(($product_saving_price/ $product_det->pro_price)*100,2); ?>
               <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
               <?php $title = 'pro_title'; ?>
               <?php else: ?> <?php $title = 'pro_title_'.Session::get('lang_code'); ?> <?php endif; ?>
               <?php if($product_discount_percentage<= 50): ?>
               <?php if($product_det->pro_no_of_purchase < $product_det->pro_qty): ?>  
               <?php if($below_count <=4): ?>
               
               <?php if($product_image != ''): ?>
                     <?php $product_image = $product_image[0]; ?>
                     <!-- /*if($product_image[0]==''){
                        $product_image = 'dummy.jpg';	
                        
                        }else{
                        
                        $product_image = $product_image[0];
                        }	*/	
                        
                        /* Image Path */ -->
                     <?php	$prod_path 	= url('').'/public/assets/default_image/No_image_product.png';
                     $img_data 	= "public/assets/product/".$product_image; ?>
                     <?php if(file_exists($img_data) && $product_image ): ?>	
                     <?php	$prod_path = url('').'/public/assets/product/' .$product_image;	 ?>				
                     <?php else: ?>	
                     <?php if(isset($DynamicNoImage['productImg'])): ?>
                     <?php	$dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['productImg']; ?>
                     <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>
                     <?php	$prod_path = url('')."/".$dyanamicNoImg_path; ?> <?php endif; ?>
                     <?php endif; ?>
                     <?php endif; ?>
               <?php else: ?>

                     <?php if(isset($DynamicNoImage['productImg'])): ?>
                     <?php  $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['productImg']; ?>
                     <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>
                     <?php  $prod_path = url('')."/".$dyanamicNoImg_path; ?> <?php endif; ?>
                     <?php endif; ?>
                     <?php endif; ?>
               <!-- /* Image Path ends */	
                  //Alt text -->
               <?php	$alt_text  	= substr($product_det->$title,0,25);
               $alt_text  .= strlen($product_det->$title)>25?'..':''; ?>
               <!-- item 1 -->
               <div class="product customProduct">
                  <!-- product__info -->
                  <div class="product__info">
                     <!-- img newProduct -->
                     <div class="img newProduct">
                        <?php if($product_discount_percentage!='' && round($product_discount_percentage)!=0): ?>
                        <i class="tag"><?php echo e(round($product_discount_percentage)); ?>%</i>
                        <?php endif; ?>
                        <!-- //if(($product_image[0]!='')){  -->
                        <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
                        <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>">
                        <img class="product__image" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>" title=""/>
                        </a>
                        <?php endif; ?>
                        <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
                        <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>" >
                        <img class="product__image" alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>">
                        </a>
                        <?php endif; ?>
                        <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
                        <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>" >
                        <img class="product__image" alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>">
                        </a>
                        <?php endif; ?>
                        <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
                        <a href="<?php echo url('productview').'/'.$mcat.'/'.$res; ?>" >
                        <img class="product__image" alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>" />
                        </a>
                        <?php endif; ?>
                        <?php  //if 
                           /*}else{ ?>
                        <a href="{!! url('productview').'/'.$mcat.'/'.$res!!}" >
                        <img class="product__image" alt="" src="<?php echo url('public/assets/product/').'/No_Image_Available.png';?>">
                        </a>
                        <?php }*/?>
                     </div>
                     <!-- img newProduct -->
                     <!-- product__info -->
                     <div class="">
                        <p class="title product__title tab-title">
                           <?php echo e(substr($product_det->$title,0,25)); ?>

                           <?php echo e(strlen($product_det->$title)>25?'..':''); ?> 
                        </p>
                        <p class="like product__price"><?php echo e(Helper::cur_sym()); ?> <?php echo e($product_det->pro_disprice); ?></p>
                     </div>
                     <?php if($product_det->pro_no_of_purchase >= $product_det->pro_qty): ?> 
                     <h4 style="text-align:center;"><a  class="btn btn-danger"><?php if(Lang::has(Session::get('lang_file').'.SOLD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD')); ?> <?php endif; ?></a> </h4>
                     <?php else: ?>  
                     <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?>  
                     <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                     </a>
                     <?php endif; ?>
                     <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?>  
                     <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                     </a>
                     <?php endif; ?>
                     <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?>  
                     <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                     </a>
                     <?php endif; ?>
                     <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?>  
                     <a href="<?php echo url('productview').'/'.$mcat.'/'.$res; ?>">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"> <?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                     </a>
                     <?php endif; ?>
                  </div>
                  <!-- product__info -->
                  <?php /*  if (in_array($product_det->pro_id, $_SESSION['compare_product'])) { // to remove from compare?>
                  <button onclick="comparefunc(<?php echo $product_det->pro_id.','.'0'; ?>);" value="0" name="compare" id="compare" data-tooltip="Added in Compare">
                  <i class="fa fa-check"></i>
                  </button>
                  <?php } else{ //  add to compare?>
                  <button onclick="comparefunc(<?php echo $product_det->pro_id.','.'1'; ?>);" value="1" name="compare" id="compare" data-tooltip="Add to Compare">
                  <i class="fa fa-plus"></i>
                  </button>	
                  <?php } */?>
                  <!-- //else --> <?php endif; ?>							
               </div>
               <!--product customProduct-->
               <?php endif; ?>
               <?php $below_count++; ?>
               <?php endif; ?> <!-- // if -->  <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  <!-- //foreach -->
               <!-- // if -->
               <?php elseif(count($get_product_details_belowfifty) == 0): ?>
               <div class="box jplist-no-results text-shadow align-center jplist-hidden">
                  <p style="margin-top:20px;color: rgb(54, 160, 222);margin-top: 20px;font-weight: bold;padding-left: 8px;">
                     <?php if(Lang::has(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_PRODUCTS_AVAILABLE')); ?> <?php endif; ?>
                  </p>
               </div>
               <?php endif; ?> <!-- //else  -->
            </section>
         </div>
         <!--view-->
         <section class="compare">
            <button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible"><?php if(Lang::has(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE_COMPARISON_OVERLAY')); ?> <?php endif; ?></span></button>
         </section>
         <!-- compare basket end-->
         <!-- ios button: show/hide panel -->
      </div>
      <!-- Sidebar end=============================================== -->	
      <?php  //count of below 50?> <?php endif; ?>
      <!-- Sidebar ================================================== -->
      <?php //print_r($most_popular_product);?>
      <?php if(count($most_popular_product) != 0): ?>
      <center>
         <h3 class="home-heading marginHeading">
            <?php if(Lang::has(Session::get('lang_file').'.MOST_POPULAR_PRODUCTS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MOST_POPULAR_PRODUCTS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MOST_POPULAR_PRODUCTS')); ?> <?php endif; ?>
         </h3>
      </center>
      <div id="demo" class="span12 tab-land-wid">
         <!-- panel -->
         <!-- Compare basket -->
         <div class="compare-basket">
            <button class="action action--button action--compare"><i class="fa fa-check"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.COMPARE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COMPARE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COMPARE')); ?> <?php endif; ?></span></button>
         </div>
         <div class="view">
            <section class="grid">
               <?php	$i=0;						
               $below_count = 1;
               $deal = 'other';	?>	
               <?php if(count($most_popular_product) != 0): ?>
               <?php $__currentLoopData = $most_popular_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
               <?php if($product_det->pro_no_of_purchase < $product_det->pro_qty): ?>  
               <?php if($i<4): ?>
               <?php $i++;
               $mcat 		= strtolower(str_replace(' ','-',$product_det->mc_name));
               $smcat 		= strtolower(str_replace(' ','-',$product_det->smc_name));
               $sbcat 		= strtolower(str_replace(' ','-',$product_det->sb_name));
               $ssbcat 	= strtolower(str_replace(' ','-',$product_det->ssb_name)); 
               $res 		= base64_encode($product_det->pro_id);
               $product_image 					= explode('/**/',$product_det->pro_Img);
               $product_saving_price 			= $product_det->pro_price - $product_det->pro_disprice;
               $product_discount_percentage 	= round(($product_saving_price/ $product_det->pro_price)*100,2); 
               $product_image = $product_image[0];?>
               <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
               <?php $title = 'pro_title'; ?>
               <?php else: ?>  <?php $title = 'pro_title_'.Session::get('lang_code'); ?> <?php endif; ?>
               <?php
               $prod_path 	= url('').'/public/assets/default_image/No_image_product.png';
               $img_data 	= "public/assets/product/".$product_image; ?>
               <?php if(file_exists($img_data) && $product_image ): ?>	
               <?php $prod_path = url('').'/public/assets/product/' .$product_image; ?>					
               <?php else: ?>	
               <?php if(isset($DynamicNoImage['productImg'])): ?>
               <?php	$dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['productImg']; ?> <?php endif; ?>
               <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>
               <?php	$prod_path = url('')."/".$dyanamicNoImg_path; ?> <?php endif; ?>
               <?php endif; ?>	
               <!-- /* Image Path ends */	
                  //Alt text -->
               <?php	$alt_text  	= substr($product_det->$title,0,25);
                  $alt_text  .= strlen($product_det->$title)>25?'..':''; ?>
               <!-- item 1 -->
               <div class="product customProduct">
                  <!-- product__info -->
                  <div class="product__info">
                     <!-- img newProduct -->
                     <div class="img newProduct">
                        <?php if($product_discount_percentage!='' && round($product_discount_percentage)!=0): ?> 
                        <i class="tag"> <?php echo e(round($product_discount_percentage)); ?>%</i>
                        <?php endif; ?> 
                        <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?>  
                        <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>">
                        <img class="product__image" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>" title=""/>
                        </a>
                        <?php endif; ?>
                        <?php  //if ?>
                        <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
                        <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>" >
                        <img class="product__image" alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>">
                        </a>
                        <?php endif; ?>
                        <?php  //if ?>
                        <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
                        <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>" >
                        <img class="product__image" alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>">
                        </a>
                        <?php endif; ?>
                        <?php  //if ?>
                        <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
                        <a href="<?php echo url('productview').'/'.$mcat.'/'.$res; ?>" >
                        <img class="product__image" alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>">
                        </a>
                        <?php endif; ?>
                        <?php  //if 
                           /*}else{ ?>
                        <a href="{!! url('productview').'/'.$mcat.'/'.$res!!}" >
                        <img class="product__image" alt="" src="<?php echo url('public/assets/product/').'/No_Image_Available.png';?>">
                        </a>
                        <?php }*/?>
                     </div>
                     <!-- img newProduct -->
                     <!-- product__info -->
                     <div class="">
                        <p class="title product__title tab-title">
                           <?php echo e(substr($product_det->$title,0,25)); ?>

                           <?php echo e(strlen($product_det->$title)>25?'..':''); ?>  
                        </p>
                        <p class="like product__price"><?php echo e(Helper::cur_sym()); ?> <?php echo e($product_det->pro_disprice); ?></p>
                     </div>
                     <?php if($product_det->pro_no_of_purchase >= $product_det->pro_qty): ?>  
                     <h4 style="text-align:center;"><a  class="btn btn-danger"><?php if(Lang::has(Session::get('lang_file').'.SOLD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD')); ?> <?php endif; ?></a> </h4>
                     <?php else: ?>  
                     <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
                     <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                     </a>
                     <?php endif; ?>
                     <?php  //if ?>
                     <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
                     <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"> <?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?>  <?php else: ?><?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                     </a>
                     <?php endif; ?>
                     <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?>  
                     <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"> <?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                     </a>
                     <?php endif; ?>
                     <?php  //if?>
                     <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
                     <a href="<?php echo url('productview').'/'.$mcat.'/'.$res; ?>">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button>
                     </a>
                     <?php endif; ?>
                  </div>
                  <!-- product__info -->
                  <?php /*  if (in_array($product_det->pro_id, $_SESSION['compare_product'])) { // to remove from compare?>
                  <button onclick="comparefunc(<?php echo $product_det->pro_id.','.'0'; ?>);" value="0" name="compare" id="compare" data-tooltip="Added in Compare">
                  <i class="fa fa-check"></i>
                  </button>
                  <?php } else{ //  add to compare?>
                  <button onclick="comparefunc(<?php echo $product_det->pro_id.','.'1'; ?>);" value="1" name="compare" id="compare" data-tooltip="Add to Compare">
                  <i class="fa fa-plus"></i>
                  </button>	
                  <?php } */?>
                  <?php endif; ?> <!-- <?php  //else ?> -->							
               </div>
               <!--product customProduct-->
               <?php endif; ?>
               <?php endif; ?> <!-- // if -->
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  <!-- //foreach -->
               <!-- // if -->
               <?php elseif(count($most_popular_product) == 0): ?>
               <div class="box jplist-no-results text-shadow align-center jplist-hidden">
                  <p style="margin-top:20px;color: rgb(54, 160, 222);margin-top: 20px;font-weight: bold;padding-left: 8px;">
                     <?php if(Lang::has(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_PRODUCTS_AVAILABLE')); ?> <?php endif; ?>
                  </p>
               </div>
               <?php endif; ?>
            </section>
         </div>
         <!--view-->
         <section class="compare">
            <button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible"><?php if(Lang::has(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE_COMPARISON_OVERLAY')); ?> <?php endif; ?></span></button>
         </section>
         <!-- compare basket end-->
         <!-- ios button: show/hide panel -->
      </div>
      <!-- Sidebar end=============================================== -->	
      <?php endif; ?>
      <?php  //count of below 50?>
   </div>
</div>
<div class="container">
   <div class="row footerTopimg">
      <div class="span6">
         <img src="images/ad1.jpg">
      </div>
      <div class="span6">
         <img src="images/ad2.jpg">
      </div>
   </div>
</div>
</div> 
<?php  if($banner_img_found>1) {  //echo $banner_img_found; ?>
<!--Small Slider-->
<script type="text/javascript">
   $(document).ready(function() {
    //Set the carousel options
    $('#quote-carousel').carousel({
      pauseOnHover: true,
      interval: 2000,
    });
   
   $('#quote-carousel1').carousel({
      pauseOnHover: true,
      interval: 2000,
    });
   
    $('#quote-carousel2').carousel({
      pauseOnHover: true,
      interval: 2000,
    });
   
      });
</script>
<?php } ?>
<!--Small Slider-->
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php echo $footer; ?>

<script type="text/javascript">
   $(document).ready(function(){
   	$(document).on("click", ".customCategories .topfirst b", function(){
   		$(this).next("ul").css("position", "relative");
   		
   		$(".topfirst ul").not($(this).parents(".topfirst").find("ul")).css("display", "none");
   		 $(this).next("ul").toggle();
   	var thisContent = $(this).html();
   		 if(thisContent == "+"){
   		 	 $(this).html("-");
   		 }
   		 else{
   		 	$(this).html("+");	
   		 }
   	});
   
   	$(document).on("click", ".morePage", function(){
   		$(".nextPage").slideToggle(200);
   	});
   	
   	$(document).on("click", "#smallScreen", function(){
   		$(this).toggleClass("customMenu");
   	});
   
   	$(window).scroll(function () {
   		if ($(this).scrollTop() > 250) {
   			$('#comp_myprod').show();
   		}
   		else{
   			$('#comp_myprod').hide();
   		}
   	});
   
   
   });
   
</script>
<script>
   function comparefunc(pid,value){
   	//var value = ('#compare').val();
   	//alert(pid);
   	
   	var pid = pid;
   		  $.ajax( {
   			      type: 'get',
   				  data: 'pid='+pid + '&value=' +value,
   				  url: "<?php echo url('product_compare_ajax'); ?>",
   				  success: function(responseText){  
   				   if(responseText)
   				   {  
   					  // alert(responseText);
   					  location.reload();
   					//$('#compare').html(responseText);					   
   				   }
   				}		
   			});
    
   }
</script>
<link rel="stylesheet" href="<?php echo e(url('')); ?>/themes/css/jquery.countdown.css" />
<script src=" <?php echo e(url('')); ?>/themes/js/jquery.countdown.js"></script>
<!-- Count Down Coding -->
<script type="text/javascript">
   <?php 	if(count($dealsof_day_details) != 0){?>
   function countProcess(deal_id){
      <?php 
      foreach($dealsof_day_details as $product_det){?>
   var pro_deal_id = <?php echo $product_det->deal_id;?>;
   
   if(deal_id==pro_deal_id){
   
   <?php 
      $date2 = $product_det->deal_end_date;
      $deal_end_year = date('Y',strtotime($date2));
      $deal_end_month = date('m',strtotime($date2));
      $deal_end_date = date('d',strtotime($date2));
      $deal_end_hours = date('H',strtotime($date2));  
      $deal_end_minutes = date('i',strtotime($date2));    
      $deal_end_seconds = date('s',strtotime($date2)); 
      ?>
   year = <?php echo $deal_end_year;?>; month = <?php echo $deal_end_month;?>; day = <?php echo $deal_end_date;?>;hour= <?php echo $deal_end_hours;?>; min= <?php echo $deal_end_minutes;?>; sec= <?php echo $deal_end_seconds;?>;
   }
   <?php 
      }//foreach
      ?>
   
   var timezone = new Date()
   month        = --month;
   dateFuture   = new Date(year,month,day,hour,min,sec);
   //alert(deal_id);
          dateNow = new Date();                                                            
          amount  = dateFuture.getTime() - dateNow.getTime()+5;               
          delete dateNow;
   
          /* time is already past */
          //if(amount < 0){
                  //output ="<span class='countDays'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='countDiv countDiv0'></span><span class='countHours'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span></span><span class='countDiv countDiv1'></span><span class='countMinutes'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span></span><span class='countDiv countDiv2'></span><span class='countSeconds'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span></span>" ;
                  
   
          /* date is still good */
          //else{
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
                 output="<span class='countHours'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fhours+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+shours+"</span></span></span><span class='countDiv countDiv1'></span><span class='countMinutes'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fmins+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+smins+"</span></span></span><span class='countDiv countDiv2'></span><span class='countSeconds'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fsecs+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+ssecs+"</span></span></span>" ;
                       
                  $('#countdown'+deal_id).html(output);
                  
             //alert(sdays); 
   
                  setTimeout(function() { countProcess(deal_id); }, 1000);
          //}
          
   }
   <?php } ?>
</script>
<!-- Image loads after page loads -->
<script>
   $(function(){
     $.each(document.images, function(){
   $(this).attr("src", $(this).data("src"));
     	   });
   });
     
</script>
</body>
</html>
<?php if($image_exist_count<0): ?> {
<script>
   document.getElementById("no_image_hide").style.display = "none";
   
</script>
<?php endif; ?>