<?php echo $navbar; ?>

<!-- Navbar ================================================== -->
<?php echo $header; ?>

<!-- Header End====================================================================== -->
<div id="mainBody">
   <div class="container">
      <!-- Sidebar ================================================== -->
      <!-- Sidebar end=============================================== -->
      <h4><?php if(Lang::has(Session::get('lang_file').'.SOLD_PRODUCTS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD_PRODUCTS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD_PRODUCTS')); ?> <?php endif; ?></h4>
      <legend></legend>
      <div class="row">
         <?php $sold_product_error = "";
         $sold_product_count=0; ?>
         <?php if($get_store_product_by_id): ?>  
         <?php $__currentLoopData = $get_store_product_by_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_most_visit_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
         <?php if($fetch_most_visit_pro->pro_no_of_purchase >= $fetch_most_visit_pro->pro_qty): ?> 
         <?php  $sold_product_count++; 
         $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
         $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
         $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
         $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
         $res = base64_encode($fetch_most_visit_pro->pro_id);
         $sold_product_error = 1; 
         $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;
         $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);
         $mostproduct_img = explode('/**/', $fetch_most_visit_pro->pro_Img);?>
         <div class="customBlock tab-sold-wid" style="">
            <span class="sold"></span>
            <?php $product_img    = $mostproduct_img[0];
            $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
            $img_data   = "public/assets/product/".$product_img; ?>
            <?php if(file_exists($img_data) && $product_img !=''): ?>   
            <?php  $prod_path = url('').'/public/assets/product/' .$product_img; ?>                 
            <?php else: ?>  
            <?php if(!isset($DynamicNoImage['productImg'])): ?>
            <?php  $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['productImg']; ?>
            <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>
            <?php   $prod_path = url('').'/'.$dyanamicNoImg_path; ?> <?php endif; ?>
            <?php endif; ?>
            <?php endif; ?>
            <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
            <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>"><img alt="" src="<?php echo e($prod_path); ?>" height="215px" width="100%"></a>
            <?php endif; ?>
            <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
            <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>" ><img alt="" src="<?php echo e($prod_path); ?>" height="215px" width="100%"></a>
            <?php endif; ?>
            <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?>
            <a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>" ><img alt="" src="<?php echo e($prod_path); ?>" height="215px" width="100%"></a>
            <?php endif; ?>
            <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
            <?php  $title = 'pro_title'; ?>
            <?php else: ?>  <?php $title = 'pro_title_'.Session::get('lang_code'); ?>  <?php endif; ?>
            <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
            <h4><a class="s_detail" href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>"><?php echo e(substr($fetch_most_visit_pro->$title,0,25)); ?>    <?php echo e(strlen($fetch_most_visit_pro->$title)>25?'..':''); ?>  </a></h4>
            <?php endif; ?>
            <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
            <h4><a class="s_detail" href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>"><?php echo e(substr($fetch_most_visit_pro->$title,0,25)); ?>    <?php echo e(strlen($fetch_most_visit_pro->$title)>25?'..':''); ?> </a></h4>
            <?php endif; ?>
            <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
            <h4><a class="s_detail" href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>"><?php echo e(substr($fetch_most_visit_pro->$title,0,25)); ?>    <?php echo e(strlen($fetch_most_visit_pro->$title)>25?'..':''); ?> </a></h4>
            <?php endif; ?>
         </div>
         <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php  if($sold_product_count==0)
            {
                echo "<center>No Products Found!</centre>";
              } ?>
         <?php else: ?>   
         <h5 style="color:#933;" ><?php if(Lang::has(Session::get('lang_file').'.NO_RECORDS_FOUND_UNDER_PRODUCTS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_RECORDS_FOUND_UNDER_PRODUCTS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_RECORDS_FOUND_UNDER_PRODUCTS')); ?> <?php endif; ?>.</h5>
         <?php endif; ?>
      </div>
      <h4><?php if(Lang::has(Session::get('lang_file').'.SOLD_DEALS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD_DEALS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD_DEALS')); ?> <?php endif; ?></h4>
      <legend></legend>
      <div class="row">
         <?php  $sold_deal_error = "";
         $sold_deals_count=0; ?>
         <?php if($get_store_deal_by_id): ?>  
         <?php $date = date('Y-m-d H:i:s'); ?>
         <?php $__currentLoopData = $get_store_deal_by_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store_deal_by_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
         <?php if(($store_deal_by_id->deal_no_of_purchase >= $store_deal_by_id->deal_max_limit)): ?> 
         <?php $sold_deals_count++; ?>
         <!--  //displaying only exceed user limit
            //if($date > $store_deal_by_id->deal_end_date) {                                        //not to display exipred deals in sold out -->
         <?php $sold_deal_error = 1; 
         $dealdiscount_percentage = $store_deal_by_id->deal_discount_percentage;
         $deal_img= explode('/**/', $store_deal_by_id->deal_image);
         $mcat = strtolower(str_replace(' ','-',$store_deal_by_id->mc_name));
         $smcat = strtolower(str_replace(' ','-',$store_deal_by_id->smc_name));
         $sbcat = strtolower(str_replace(' ','-',$store_deal_by_id->sb_name));
         $ssbcat = strtolower(str_replace(' ','-',$store_deal_by_id->ssb_name)); 
         $res = base64_encode($store_deal_by_id->deal_id); ?>
         <?php $product_image     = $deal_img[0];
         $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
         $img_data   = "public/assets/deals/".$product_image; ?>
         <?php if(file_exists($img_data) && $product_image !=''): ?>   
         <?php  $prod_path = url('').'/public/assets/deals/' .$product_image;  ?>                
         <?php else: ?>  
         <?php if(isset($DynamicNoImage['dealImg'])): ?>
         <?php   $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['dealImg'];?>
         <?php if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path)): ?>
         <?php $prod_path = url('').'/'.$dyanamicNoImg_path; ?>
         <?php endif; ?>
         <?php endif; ?>
         <?php endif; ?> 
         <div class="customBlock  tab-sold-wid" style="">
            <i class="sold"></i>
            <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
            <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>">
            <img src="<?php echo e($prod_path); ?>" alt="" height="215px">
            </a>
            <?php elseif($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
            <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>" >
            <img src="<?php echo e($prod_path); ?>" alt="" height="215px">
            </a>
            <?php elseif($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
            <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>" >
            <img src="<?php echo e($prod_path); ?>" alt="" height="215px">
            </a>
            <?php elseif($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
            <a href="<?php echo url('dealview').'/'.$mcat.'/'.$res; ?>">
            <img  src="<?php echo e($prod_path); ?>" alt="" height="215px">
            </a>
            <?php endif; ?>
            <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
            <?php  $deal_title = 'deal_title'; ?>
            <?php else: ?> <?php  $deal_title = 'deal_title_'.Session::get('lang_code'); ?> <?php endif; ?>
            <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
            <h4> <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>" class="s_detail"><?php echo e(substr($store_deal_by_id->$deal_title,0,25)); ?>    <?php echo e(strlen($store_deal_by_id->$deal_title)>25?'..':''); ?></a></h4>
            <?php elseif($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
            <h4> <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>" class="s_detail"><?php echo e(substr($store_deal_by_id->$deal_title,0,25)); ?>    <?php echo e(strlen($store_deal_by_id->$deal_title)>25?'..':''); ?></a></h4>
            <?php elseif($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
            <h4> <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>" class="s_detail"><?php echo e(substr($store_deal_by_id->$deal_title,0,25)); ?>    <?php echo e(strlen($store_deal_by_id->$deal_title)>25?'..':''); ?></a></h4>
            <?php elseif($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
            <h4><a href="<?php echo url('dealview').'/'.$mcat.'/'.$res; ?>"><?php echo e(substr($store_deal_by_id->$deal_title,0,25)); ?>    <?php echo e(strlen($store_deal_by_id->$deal_title)>25?'..':''); ?></a></h4>
            <?php endif; ?>
         </div>
         <?php endif; ?> 
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php if($sold_deals_count==0)
            {
              echo "<center>No Deals Found!</centre>";
            }?>
         <?php else: ?> if(count($sold_deal_error)!=0) 
         <h5 style="color:#933;" ><?php if(Lang::has(Session::get('lang_file').'.NO_RECORDS_FOUND_UNDER_DEALS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_RECORDS_FOUND_UNDER_DEALS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_RECORDS_FOUND_UNDER_DEALS')); ?> <?php endif; ?>.</h5>
         <?php endif; ?>
         <!--?php  if($sold_deal_error != 1) { ?>
            <h5 style="color:#933;" >No records found under deals.</h5>
            <?php //} ?> -->
      </div>
   </div>
</div>
</div>
<!-- Footer ================================================================== -->
<?php echo $footer; ?>

<!-- Placed at the end of the document so the pages load faster ============================================= -->
<!-- For Responsive menu-->
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
<!-- For Responsive menu-->
<script src="plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>
<script src="plug-k/demo/js/demo.js" type="text/javascript"></script>
<?php /*<script type="text/javascript" src="<?php echo url(); ?>/themes/js/jquery-1.5.2.min.js"></script>*/ ?>
<script type="text/javascript" src="<?php echo e(url('')); ?>/themes/js/scriptbreaker-multiple-accordion-1.js"></script>
<script language="JavaScript">
   $(document).ready(function() {
       $(".topnav").accordion({
           accordion:false,
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