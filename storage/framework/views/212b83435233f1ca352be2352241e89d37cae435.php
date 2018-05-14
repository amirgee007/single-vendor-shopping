
<?php echo $navbar; ?>

<!-- Navbar ================================================== -->
<?php echo $header; ?>

  <?php if(Session::has('error')): ?>
		<div  ><?php echo Session::get('error'); ?>

        </div>
<?php endif; ?>
    <?php if(Session::has('result_success')): ?>
		<div  ><?php echo Session::get('result_success'); ?>

        </div>
		<?php endif; ?>


          <?php if(Session::has('result_cancel')): ?>


		<div><?php echo Session::get('result_cancel'); ?>




        </div>


		<?php endif; ?>


<!-- Header End====================================================================== -->
<style type="text/css">
  .customCategories.products
  {
    margin-right: 0px !important;
  }
</style>

<div id="mainBody">



	<div class="container">

	<div class="row">

<!-- Sidebar ================================================== -->
  <div class="span3" id="sidebar">
    <div class="side-menu-head"><strong><?php if(Lang::has(Session::get('lang_file').'.CATEGORIES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CATEGORIES')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CATEGORIES')); ?> <?php endif; ?> </strong></div>
      <ul id="css3menu1" class="topmenu">
      <input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>
       
      <?php if(count($main_category)>0): ?>
      <?php $__currentLoopData = $main_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_main_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
	<?php	$check_main_product_exists = DB::table('nm_product')->where('pro_mc_id', '=', $fetch_main_cat->mc_id)->where('pro_status','=',1)->whereRaw('pro_no_of_purchase < pro_qty')->get(); ?>
		<?php if($check_main_product_exists): ?>
	<?php  $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; ?>
	  
     
	  <?php if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0): ?>  
	  
      <li class="topfirst"><a href="<?php echo e(url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1)); ?>">
	  <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
	<?php	$mc_name = 'mc_name'; ?>
	  <?php else: ?> <?php  $mc_name = 'mc_name_'.Session::get('lang_code'); ?> <?php endif; ?>
					
	 <?php echo e($fetch_main_cat->$mc_name); ?> </a> <b class="OpenCat" onclick=""> + </b>

  <ul> 
      
	  <?php $__currentLoopData = $sub_main_category[$fetch_main_cat->mc_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_sub_main_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
	   
	  <?php  $check_sub_product_exists = DB::table('nm_product')->where('pro_smc_id', '=', $fetch_sub_main_cat->smc_id)->where('pro_status','=',1)->whereRaw('pro_no_of_purchase < pro_qty')->get(); ?>
	   <?php if($check_sub_product_exists): ?>
	<?php  $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>
	  
       <li class="subfirst"><a href="<?php echo e(url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2)); ?>"> 
	   <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
	<?php	$smc_name = 'smc_name'; ?>
	   <?php else: ?> <?php  $smc_name = 'smc_name_'.Session::get('lang_code'); ?> <?php endif; ?>
	   <?php echo e($fetch_sub_main_cat->$smc_name); ?> </a> <b class="OpenCat" onclick=""> + </b>
        
		<?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0): ?>  
		      
    <ul>
               
				<?php $__currentLoopData = $second_main_category[$fetch_sub_main_cat->smc_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				 
				<?php	$check_sec_main_product_exists = DB::table('nm_product')->where('pro_sb_id', '=', $fetch_sub_cat->sb_id)->where('pro_status','=',1)->whereRaw('pro_no_of_purchase < pro_qty')->get(); ?>
					<?php if($check_sec_main_product_exists): ?>
			<?php	$pass_cat_id3 = "3,".$fetch_sub_cat->sb_id; ?>
				  
          
          <li class="subsecond"><a href="<?php echo e(url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3)); ?>"> 
		  <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
			<?php $sb_name = 'sb_name'; ?>
		  <?php else: ?> <?php  $sb_name = 'sb_name_'.Session::get('lang_code'); ?> <?php endif; ?>
		  <?php echo e($fetch_sub_cat->$sb_name); ?> </a> <b class="OpenCat" onclick=""> + </b>
                 
				  <?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0): ?>  
				  
                    <ul>
                   
					<?php $__currentLoopData = $second_sub_main_category[$fetch_sub_cat->sb_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_secsub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
					 
					<?php	$check_sec_sub_main_product_exists = DB::table('nm_product')->where('pro_ssb_id', '=', $fetch_secsub_cat->ssb_id)->where('pro_status','=',1)->whereRaw('pro_no_of_purchase < pro_qty')->get(); ?>
						<?php if($check_sec_sub_main_product_exists): ?>
				<?php	$pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?>
					                        
                        <li class="subthird"><a href="<?php echo e(url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4)); ?>"> 
		  <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
		<?php	$ssb_name = 'ssb_name'; ?>
		  <?php else: ?> <?php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); ?> <?php endif; ?>
						<?php echo e($fetch_secsub_cat->$ssb_name); ?></a></li>                                        
					 <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                    </li>
                      <?php endif; ?>
		 <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
                
        </li>
        <?php endif; ?>
		 <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
    
    </li>

<?php endif; ?>
       <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?> 
</ul> 
    <br>
      <div class="clearfix"></div>
    <br/>
         

        <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?> 
      <?php  $pro_title = 'pro_title'; ?>
        <?php else: ?> <?php  $pro_title = 'pro_title_'.Session::get('lang_code'); ?> <?php endif; ?>

        <?php if(count($most_visited_product)>0): ?> 
        <div class="side-menu-head" style="margin-top:10px;"><strong><?php if(Lang::has(Session::get('lang_file').'.MOST_VISITED_PRODUCTS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MOST_VISITED_PRODUCTS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MOST_VISITED_PRODUCTS')); ?> <?php endif; ?></strong></div>
          <?php $__currentLoopData = $most_visited_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_most_visit_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
             <?php   $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;
                $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);
                $mostproduct_img = explode('/**/', $fetch_most_visit_pro->pro_Img);

                $product_img    = $mostproduct_img[0]; 
                
                $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
                $img_data   = "public/assets/product/".$product_img; ?>
                
                <?php if(file_exists($img_data) && $product_img !=''): ?>   
                
             <?php   $prod_path = url('').'/public/assets/product/' .$product_img;                  ?>
                <?php else: ?>  
                    <?php if(isset($DynamicNoImage['productImg'])): ?>
                      <?php  $dyanamicNoImg_path = url('').'/public/assets/noimage/' .$DynamicNoImage['productImg']; ?>
                       <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>
                        <?php    $prod_path = $dyanamicNoImg_path; ?> <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>   
                
              <?php  $alt_text   = substr($fetch_most_visit_pro->$pro_title,0,25); ?>


        <?php if($fetch_most_visit_pro->pro_no_of_purchase < $fetch_most_visit_pro->pro_qty): ?> 
        
          <div class="thumbnail" style="border:none">
      <img  src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>">
      <div class="caption product_show">
      <h3 class="prev_text"><?php echo e(substr($fetch_most_visit_pro->$pro_title,0,20)); ?>...</h3>
        <h4 class="top_text dolor_text"><?php echo e(Helper::cur_sym()); ?> <?php echo e($fetch_most_visit_pro->pro_disprice); ?></h4>
            
                      <?php if($fetch_most_visit_pro->pro_no_of_purchase >= $fetch_most_visit_pro->pro_qty): ?> 
                      <h4 style="text-align:center;"><a  class="btn btn-danger"><?php if(Lang::has(Session::get('lang_file').'.SOLD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD')); ?> <?php endif; ?></a> 
                       <?php else: ?>   
          <?php    $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
             $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
       $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
        $res = base64_encode($fetch_most_visit_pro->pro_id); ?>
        
           <h4><!-- <a class="btn btn-warning" href="<?php echo url('productview').'/'.$fetch_most_visit_pro->pro_id; ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a> -->
           </h4>
          <div class="product-info-price">
                <div>
               <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
                  <a href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
                  <?php endif; ?>
              <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
        <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
        <?php endif; ?>
              <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
        <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
        <?php endif; ?>
        <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
        <a href="<?php echo e(url('productview/'.$mcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
        <?php endif; ?>
                </div>

          

                

              </div>
                     <?php endif; ?>
          </div>
      </div>
       <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
      
  </div>
<!-- Sidebar end=============================================== -->

        <?php if(count($searchTerms)!=0): ?>  		

	<div class="span9">
<div class="">
<div class="search-product">
					<center>
					<span class="sale-title"><?php if(Lang::has(Session::get('lang_file').'.SEARCH_FOR_PRODUCTS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SEARCH_FOR_PRODUCTS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SEARCH_FOR_PRODUCTS')); ?> <?php endif; ?></span>
					</center>
          
			

			   <?php

         echo '<ul>'; ?>

   <?php $i = 1; ?>
   <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
     <?php $pro_title = 'pro_title'; ?>
    <?php else: ?> <?php  $pro_title = 'pro_title_'.Session::get('lang_code'); ?> <?php endif; ?>
    <?php $__currentLoopData = $searchTerms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  

			
			<?php
          $product_saving_price = $fetch_product->pro_price - $fetch_product->pro_disprice;
          $product_discount_percentage = round(($product_saving_price/ $fetch_product->pro_price)*100,2);

          $product_img = explode('/**/', $fetch_product->pro_Img);
          $mcat = strtolower(str_replace(' ','-',$fetch_product->mc_name));
          $smcat = strtolower(str_replace(' ','-',$fetch_product->smc_name));
          $sbcat = strtolower(str_replace(' ','-',$fetch_product->sb_name));
          $ssbcat = strtolower(str_replace(' ','-',$fetch_product->ssb_name)); 
          $res = base64_encode($fetch_product->pro_id); 

          $product_image    = $product_img[0]; 
          
          $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
          $img_data   = "public/assets/product/".$product_image; ?>
          
          <?php if(file_exists($img_data) && $product_image !=''): ?>   
          
        <?php  $prod_path = url('').'/public/assets/product/' .$product_image;                  ?>
          <?php else: ?>  
              <?php if(isset($DynamicNoImage['productImg'])): ?>
                <?php  $dyanamicNoImg_path = url('').'/public/assets/noimage/' .$DynamicNoImage['productImg']; ?>
                  <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>
                   <?php   $prod_path = $dyanamicNoImg_path; ?> <?php endif; ?>
              <?php endif; ?>
          <?php endif; ?>   
         
        <?php  $alt_text   = substr($fetch_product->$pro_title,0,25); ?>
          

           <li class=""><div class="thumbnail">
		    <?php if($product_discount_percentage!='' && round($product_discount_percentage)!=0): ?>
            <i class="tag"><?php echo e(substr($product_discount_percentage,0,2)); ?> %</i><?php endif; ?>
                  <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
									    <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res)); ?>"><img src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>" ></a>
									<?php endif; ?>
                  <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
			                <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res)); ?>"><img src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>"></a>
			           <?php endif; ?>
                  <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
			                <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$res)); ?>"><img src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>" ></a>
			            <?php endif; ?>
			            <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
			                <a href="<?php echo e(url('productview/'.$mcat.'/'.$res)); ?>"><img ssrc="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>"></a>
			            <?php endif; ?>
             

              <div class="caption product_show">
                <h4 class="top_text dolor_text"><?php echo e(Helper::cur_sym()); ?> <?php echo e($fetch_product->pro_disprice); ?></h4>
                <h5 class="prev_text"><?php echo e(substr($fetch_product->$pro_title,0,25)); ?></h5>
                <div >

								  
                  <div class="product-info-price">
				  <?php if($fetch_product->pro_no_of_purchase < $fetch_product->pro_qty): ?>
                   <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?>  
									    <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
									<?php endif; ?>
                  <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
			                <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
			            <?php endif; ?>
                  <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
			                <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
			            <?php endif; ?>
			            <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
			                <a href="<?php echo e(url('productview/'.$mcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
			            <?php endif; ?>
                    <?php endif; ?>
					<?php if($fetch_product->pro_no_of_purchase >= $fetch_product->pro_qty): ?>
                                    <h4 style="text-align:center;"><a  class="btn btn-danger"><?php if(Lang::has(Session::get('lang_file').'.SOLD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD')); ?> <?php endif; ?></a> 
                                    <?php endif; ?>
                  </div>

							 </div>
             </div>
            </li>  
 
   <?php if( $i % 3 == 0 ): ?> 

         <!--   </ul></div></div><div class="search-product"><div class="item" ><ul class="thumbnails"> -->

      <?php endif; ?>

          <?php   $i++; ?>

			

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul></div></div>

        <?php else: ?>
			
			<center>

		  
		  
          <span class="sale-title"><?php if(Lang::has(Session::get('lang_file').'.SEARCH_FOR_PRODUCTS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SEARCH_FOR_PRODUCTS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SEARCH_FOR_PRODUCTS')); ?> <?php endif; ?></span>

          </center>
			
          <?php echo "<center><h4>No Products available with given search criteria</h4></center> "; ?>
       <?php endif; ?>

<?php if(count($searchTermss) > 0 ): ?>

	<div class="">
			<div class="search-product">

          <center>

		  
		  
          <span class="sale-title"><?php if(Lang::has(Session::get('lang_file').'.SEARCH_FOR_DEALS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SEARCH_FOR_DEALS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SEARCH_FOR_DEALS')); ?> <?php endif; ?></span>

          </center>

			<?php

			   echo '<ul>';


    $i = 2; ?>
    <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
     <?php   $deal_title = 'deal_title'; ?>
    <?php else: ?> <?php  $deal_title = 'deal_title_'.Session::get('lang_code'); ?> <?php endif; ?>


    <?php $__currentLoopData = $searchTermss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    

     <?php     $product_saving_price = $fetch_product->deal_original_price - $fetch_product->deal_original_price;

          $product_discount_percentage = round(($product_saving_price/ $fetch_product->deal_discount_price)*100,2);

          $product_img = explode('/**/', $fetch_product->deal_image);

          $mcat = strtolower(str_replace(' ','-',$fetch_product->mc_name));
          $smcat = strtolower(str_replace(' ','-',$fetch_product->smc_name));
          $sbcat = strtolower(str_replace(' ','-',$fetch_product->sb_name));
          $ssbcat = strtolower(str_replace(' ','-',$fetch_product->ssb_name)); 
          $res = base64_encode($fetch_product->deal_id);

          $product_image     = $product_img[0];
          
          $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
          $img_data   = "public/assets/deals/".$product_image; ?>
          
          <?php if(file_exists($img_data) && $product_image !=''): ?>   
          
       <?php   $prod_path = url('').'/public/assets/deals/' .$product_image; ?>
          <?php else: ?>  
              <?php if(isset($DynamicNoImage['dealImg'])): ?>
              <?php    $dyanamicNoImg_path = url('').'/public/assets/noimage/' .$DynamicNoImage['dealImg']; ?>
                  <?php if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path)): ?>
                 <?php  $prod_path = $dyanamicNoImg_path; ?> <?php endif; ?>
              <?php endif; ?>
          <?php endif; ?>   
          
        <?php  $alt_text   = substr($fetch_product->$deal_title,0,25);
          $alt_text  .= strlen($fetch_product->$deal_title)>25?'..':''; ?>


           <li class=""><div class="thumbnail">
		  <?php if($fetch_product->deal_discount_percentage!='' && round($fetch_product->deal_discount_percentage)!=0): ?>
		   <i class="tag"><?php echo e(substr($fetch_product->deal_discount_percentage,0,2)); ?>%</i><?php endif; ?>
           <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
                            <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>">
                    <img  src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>"/>
                    </a>
                            <?php endif; ?>
                                <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
                                    <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>">
                    <img  src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>"/>
                    </a>
                                    <?php endif; ?>
                                       <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
                                            <a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>">
                    <img src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>"  />
                    </a>
                                           <?php endif; ?>
                                                <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
                                                    <a href="<?php echo url('dealview').'/'.$mcat.'/'.$res; ?>">
                    <img src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>" />
                    </a>
                                                   <?php endif; ?>
           
           
           <div class="caption product_show"><h4 class="top_text dolor_text"><?php echo e(Helper::cur_sym()); ?> <?php echo e($fetch_product->deal_discount_price); ?></h4>
           <h5 class="prev_text"><?php echo e(substr($fetch_product->$deal_title,0,25)); ?></h5>

<div>
<div class="product-info-price">

			<?php if($fetch_product->deal_no_of_purchase < $fetch_product->deal_max_limit): ?> 
			<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
               <h4><a href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
					
               <?php endif; ?>
              <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
                  <h4><a  href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
					

			   <?php endif; ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
               <h4><a  href="<?php echo url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
					

               <?php endif; ?>
			   <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
                <h4><a  href="<?php echo url('dealview').'/'.$mcat.'/'.$res; ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
					

<?php endif; ?>
          <?php endif; ?>
          			<?php if($fetch_product->deal_no_of_purchase >= $fetch_product->deal_max_limit): ?> 
                                    <h4 style="text-align:center;"><a  class="btn btn-danger"><?php if(Lang::has(Session::get('lang_file').'.SOLD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD')); ?> <?php endif; ?></a> 
                                   <?php endif; ?>
	</div></div>

							</div></div></li> 
<?php
 
   if( $i % 3 == 0 ){
       //echo '<li>';
       //echo $i;
      // echo "ss";
   } ?>


       <?php      $i++; ?>
      


          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- //foreach -->
            


			  </div>

</div>

</div>


        <?php else: ?>
			
			<center>

		  
		  
          <span class="sale-title"><?php if(Lang::has(Session::get('lang_file').'.SEARCH_FOR_DEALS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SEARCH_FOR_DEALS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SEARCH_FOR_DEALS')); ?> <?php endif; ?></span>

          </center>
		  
          <?php echo "<center><h4>No Deals available with given search criteria</h4></center> "; ?>
     <?php endif; ?>

	</div>


	</div>

	</div>

 <script src="<?php echo e(url('')); ?>/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script> 



<script type="text/javascript">
  $(document).ready(function(){
    $(document).on("click", ".customCategories .topfirst b", function(){
      $(this).next("ul").css("position", "relative");
      
      $(".topfirst ul").not($(this).parents(".topfirst").find("ul")).css("display", "none");
       $(this).next("ul").toggle();
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



	<?php echo $footer; ?>

</body>
</html>