<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <!-- Bootstrap style --> 
      <!--<link id="callCss" rel="stylesheet" href="<?php echo url(''); ?>/themes/bootshop/bootstrap.min.css" media="screen"/>-->
      <!-- Bootstrap style responsive-->  
      <link href="<?php echo e(url('')); ?>/themes/css/planing.css" rel="stylesheet"/>
      <link href="<?php echo e(url('')); ?>/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
      <link href="<?php echo e(url('')); ?>/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
      <!-- Google-code-prettify --> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
      <link href="<?php echo e(url('')); ?>/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
      <!-- fav and touch icons -->
      <?php $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); foreach($favi as $fav) {} ?>
	  <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-57-precomposed.png">
      <link href="<?php echo e(url('')); ?>/themes/css/leftmenu.css" rel="stylesheet" media="screen"/>
      <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/new_css.css" />
      <style type="text/css" id="enject"></style>
      <link href="<?php echo e(url('')); ?>/themes/css/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
         <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>-->
      <script type="text/javascript" src="<?php echo e(url('')); ?>/themes/js/jquery.flexisel.js"></script>
<script type="text/javascript">
$(window).load(function() {
    $("#flexiselDemo3").flexisel({
        visibleItems: 4,
        itemsToScroll: 1,         
        autoPlay: {
            enable: false,
            interval: 5000,
            pauseOnHover: true
        }        
    }); 
});
</script>
    
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">

      <style type="text/css">

         .out-of-stock 
         {
         background: #ad0d0d;
         color: white;
         font-family: lato !important;
         border: none;
         padding-top: 11px;
         border-radius: 3px;
         padding-bottom: 11px;
         /* padding-left: 21px; */
         font-size: 16px;
         padding-left: 11px;
         padding-right: 13px;
         }
         .faq li {padding-bottom: 20px;}
         .faq li.q 
         {
         font-size: 120%;
         border-bottom: 1px #ddd solid;
         cursor: pointer;
         text-align: center;
         background: #464747;
         width: 19%;
         margin-left: 43%;
         list-style: none;
         padding: 8px;
         color: white;
         }
         .faq li.c 
         {
         font-size: 120%;
         border-bottom: 1px #ddd solid;
         cursor: pointer;
         text-align: center;
         background: #464747;
         width: 19%;
         margin-left: 43%;
         list-style: none;
         padding: 8px;
         color: white;
         }
         .faq li.s 
         {
         font-size: 120%;
         border-bottom: 1px #ddd solid;
         cursor: pointer;
         text-align: center;
         background: #464747;
         width: 19%;
         margin-left: 43%;
         list-style: none;
         padding: 8px;
         color: white;
         }
         .faq li.a 
         {
         display: none;
         color:#000;
         list-style-type: none;
         }
         .rotate 
         {
         -moz-transform: rotate(90deg);
         -webkit-transform: rotate(90deg);
         transform: rotate(90deg);
         }
         .main_div
         {
         text-align:center;
         background: #00C492;
         padding:20px; width: 400px;
         }
         .inner_div
         {
         background: #fff;
         margin-top:20px;
         height: 100px;
         }
         .buttons a
         {
         font-size: 16px;
         }
         .buttons a:hover
         {
         cursor:pointer;
         font-size: 16px;
         }
         .date.active 
         {
         background-color: #00b381 !important;
         padding: 9px;
         color: white;
         }
         .span9 .box 
         {
         float: left;
         width: 150px;
         margin-left: 20px;
         }
         .span9 .box .top 
         {
         padding: 9px;
         background-color: #424542;
         color: white;
         cursor: pointer;
         }
         .span9 .box .bottom 
         {
         display: none;
         }
         #mixedSlider {
         position: relative;
         }
         #mixedSlider .MS-content {
         white-space: nowrap;
         overflow: hidden;
         margin: 0 5px;
         }
         #mixedSlider .MS-content .item {
         display: inline-block;
         width: 20.5%;
         position: relative;
         vertical-align: top;
         overflow: hidden;
         height: 100%;
         white-space: normal;
         padding:10px;
         margin:10px 15px;
         box-shadow:0px 0px 3px #8a8a8a;
         text-align: center;
		 border:1px solid #8a8a8a;
         }
         #mixedSlider .MS-content .item h5
         {
         text-align: left;
         font-size: 16px;
         margin-top: 0px;
         margin-left: 5px;
         }
         #mixedSlider .MS-controls .MS-left i{ margin-top: 11px;color:#636363; }
         #mixedSlider .MS-controls .MS-right i{ margin-top: 11px;color:#636363; }
             @media (min-width: 481px) and (max-width: 767px) {
                 #mixedSlider .MS-content .item {
         width: 42% !important;
             margin: 10px 10px;
         }


             }
         @media (max-width: 991px) {
         #mixedSlider .MS-content .item {
         width: 43%;
         }
         }
          @media (max-width: 480px) {
#mixedSlider .MS-content .item {
         width: 86%;
         }

          }
         @media (max-width: 767px) {
              #mixedSlider .MS-controls .MS-left i{ margin-top:5px;color:#636363; }
         #mixedSlider .MS-controls .MS-right i{ margin-top:5px;color:#636363; }
         
         }
         #mixedSlider .MS-content .item .imgTitle {
         position: relative;
        
         }
         #mixedSlider .MS-content .item .imgTitle img {
         width: 100%;
         }
           
         #mixedSlider .MS-content .item p {
         font-size: 14px;
         line-height: 16px;
        margin-left: 5px;
         text-align: left;
         color:#b0aeae;
         margin-bottom:5px;
         }
         #mixedSlider .MS-content .item p a{    color: #b0aeae;}
         #mixedSlider .MS-controls button {
         position: absolute;
         border: none;
         background:#ffffff;
         outline: 0;
         font-size: 32px;
         top: 140px;
         transition: 0.15s linear;
         box-shadow: 0px 0px 3px #8a8888;
         border-radius: 50%;
         width: 45px;
         height:45px;
         }
         #mixedSlider .MS-controls button:hover {
         color: rgba(0, 0, 0, 0.8);
         }
         @media (max-width: 992px) {
         #mixedSlider .MS-controls button {
         font-size: 30px;
         }
         }
         @media (max-width: 767px) {
         #mixedSlider .MS-controls button {
         font-size: 20px;
         }
         }
         #mixedSlider .MS-controls .MS-left {
         left: 0px;
         }
         @media (max-width: 767px) {
         #mixedSlider .MS-controls .MS-left {
         left: -10px;
         }
         }
         #mixedSlider .MS-controls .MS-right {
         right: 0px;
         }
         @media (max-width: 767px) {
         #mixedSlider .MS-controls .MS-right {
         right: -10px;
         }
         }
.clearout {
height:20px;
clear:both;
}

#flexiselDemo1, #flexiselDemo2, #flexiselDemo3 {
display:none;
}

.nbs-flexisel-container {
    position:relative;
    max-width:100%;
}
.nbs-flexisel-ul {
    position:relative;
    width:99999px;
    margin:0px;
    padding:0px;
    list-style-type:none;   
    text-align:center;  
    overflow: auto;
}

.nbs-flexisel-inner {
    position: relative;
    overflow: hidden;
    float:left;
    width:100%;
    background:#fcfcfc;
    background: #fcfcfc -moz-linear-gradient(top, #fcfcfc 0%, #eee 100%);
    background: #fcfcfc -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfcfc), color-stop(100%,#eee)); 
    background: #fcfcfc -webkit-linear-gradient(top, #fcfcfc 0%, #eee 100%);
    background: #fcfcfc -o-linear-gradient(top, #fcfcfc 0%, #eee 100%); 
    background: #fcfcfc -ms-linear-gradient(top, #fcfcfc 0%, #eee 100%); 
    background: #fcfcfc linear-gradient(top, #fcfcfc 0%, #eee 100%); 
    border:1px solid #ccc;
    border-radius:5px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;  
}

.nbs-flexisel-item {
    float:left;
    margin:0px;
    padding:0px;
    cursor:pointer;
    position:relative;
    line-height:0px;
}
.nbs-flexisel-item img {
    max-width: 100%;
    cursor: pointer;
    position: relative;
    margin-top: 10px;
    margin-bottom: 10px;
}


.nbs-flexisel-nav-left,
.nbs-flexisel-nav-right {
    padding:5px 10px;
    border-radius:15px;
    -moz-border-radius:15px;
    -webkit-border-radius:15px;      
    position: absolute;
    cursor: pointer;
    z-index: 4;
    top: 50%;
    transform: translateY(-50%);   
    background: rgba(0,0,0,0.5);
    color: #fff;     
}

.nbs-flexisel-nav-left {
    left: 10px;
}

.nbs-flexisel-nav-left:before {
    content: "<"
}

.nbs-flexisel-nav-left.disabled {
    opacity: 0.4;
}

.nbs-flexisel-nav-right {
    right: 5px;    
}

.nbs-flexisel-nav-right:before {
    content: ">"
}

.nbs-flexisel-nav-right.disabled {
    opacity: 0.4;
}


      </style>
     
      <?php if(count($product_details_by_id)>0): ?> <!-- //print_r($product_details_by_id); -->
            <?php $__currentLoopData = $product_details_by_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_details_by_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
           <?php if((Session::get('lang_code'))=='' || (Session::get('lang_code'))== 'en'): ?>  
            <?php    $pro_title = 'pro_title';
                $pro_mdesc = 'pro_mdesc';
                $pro_mkeywords = 'pro_mkeywords'; ?>
            <?php else: ?>   
             <?php   $pro_title = 'pro_title_'.Session::get('lang_code');
                $pro_mdesc = 'pro_mdesc_'.Session::get('lang_code');
                $pro_mkeywords = 'pro_mkeywords_'.Session::get('lang_code'); ?>
             <?php endif; ?>    
        
      
      <title><?php echo e($pro_details_by_id->$pro_title); ?></title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="<?php echo e($pro_details_by_id->$pro_mdesc); ?>">
     <meta name="keywords" content="<?php echo e($pro_details_by_id->$pro_mkeywords); ?>">
     <meta name="author" content="<?php echo e($pro_details_by_id->$pro_mkeywords); ?>">
<?php endif; ?>
   </head>
   <body>
   
      <?php echo $navbar; ?>

      <?php echo $header; ?>

      <div class="container">
	   
			<?php $__currentLoopData = $product_details_by_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_details_by_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php	$product_img= explode('/**/',trim($pro_details_by_id->pro_Img,"/**/"));	
			$img_count = count($product_img); ?>

            <?php if((Session::get('lang_code'))=='' || (Session::get('lang_code'))== 'en'): ?>  
            <?php    $pro_title = 'pro_title'; ?>
            <?php else: ?> <?php  $pro_title = 'pro_title_'.Session::get('lang_code');  ?> <?php endif; ?>

             <?php   $product_image     = $product_img[0];
                
                $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
                $img_data   = "public/assets/product/".$product_image; ?>
                <?php if($product_img !='' && $img_count !=''): ?>
                <?php if(file_exists($img_data) && $product_image !=''): ?>   <!-- //product image is not null and exists in folder -->
					
                
              <?php  $prod_path = url('').'/public/assets/product/' .$product_image;   ?>               
                <?php else: ?>  
                    <?php if(isset($DynamicNoImage['productImg'])): ?>
                     <?php   $dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['productImg']; ?>
                      <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>    <!-- //no image for product is not null and exists in folder -->
                         <?php   $prod_path = url('').'/'.$dyanamicNoImg_path; ?> <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
				
				<?php else: ?>  
                    <?php if(isset($DynamicNoImage['productImg'])): ?>
                     <?php   $dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['productImg']; ?>
                        <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>    <!-- //no image for product is not null and exists in folder -->
                          <?php  $prod_path = url('').'/'.$dyanamicNoImg_path; ?> <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?> 
				
               
            <?php    $alt_text   = substr($pro_details_by_id->$pro_title,0,25);
                $alt_text  .= strlen($pro_details_by_id->$pro_title)>25?'..':''; ?>

		
         <div class="all-top">
			<div class="pro-left">
				
         <a id="Zoomer3"  href="<?php echo e($prod_path); ?>" class="MagicZoomPlus" rel="selectors-effect: fade; selectors-change: mouseover; " title="<?php echo e($alt_text); ?>"><img src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>" /></a> <br/>
	
 <?php for($i=0;$i < $img_count;$i++): ?>  
      <?php  $product_image     = $product_img[$i];
        
        $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
        $img_data   = "public/assets/product/".$product_image; ?>
        
        <?php if(file_exists($img_data) && $product_image !=''): ?> <!-- //product image is not null and exists in folder -->
			
        
       <?php $prod_path = url('').'/public/assets/product/' .$product_image;  ?>                 
        <?php else: ?>  
            <?php if(isset($DynamicNoImage['productImg'])): ?>
             <?php   $dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['productImg']; ?>
                <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?> <!-- //no image for product is not null and exists in folder -->
									
                  <?php  $prod_path = url('').'/'.$dyanamicNoImg_path; ?>
				<?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>   
        
       <?php $alt_text   = substr($pro_details_by_id->$pro_title,0,25);
        $alt_text  .= strlen($pro_details_by_id->$pro_title)>25?'..':''; ?>

    
        <a href="<?php echo e($prod_path); ?>" rel="zoom-id: Zoomer3" rev="<?php echo e($prod_path); ?>"><img src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>" style="width:87px; height:100px;"/></a>
 <?php endfor; ?></div>
			
            <div class="pro-right">
               <div class="pro-rightop">
                  <h2> 
				   				   
				  <?php if((Session::get('lang_code')) == '' || (Session::get('lang_code'))== 'en'): ?>  
					<?php	$pro_title = 'pro_title'; ?>
				   <?php else: ?> <?php  $pro_title = 'pro_title_'.Session::get('lang_code'); ?> <?php endif; ?>
				  <?php echo e($pro_details_by_id->$pro_title); ?> </h2>
				  <?php
					$product_count = $one_count + $two_count + $three_count + $four_count + $five_count;
								
					$multiple_countone   = $one_count *1;
					$multiple_counttwo   = $two_count *2;
					$multiple_countthree = $three_count *3;
					$multiple_countfour  = $four_count *4;
					$multiple_countfive  = $five_count *5;
					$product_total_count = $multiple_countone + $multiple_counttwo + $multiple_countthree + $multiple_countfour + $multiple_countfive; ?>
					
					<p class="left-label">
					
					<?php if($product_count): ?>
					<?php	$product_divide_count = $product_total_count / $product_count;
						$product_divide_count = round($product_divide_count); ?>
						<?php if($product_divide_count <= '1'): ?> 
							<?php if(Lang::has(Session::get('lang_file').'.RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RATINGS')); ?> <?php endif; ?>
							<img src='<?php echo e(url("./images/stars-1.png")); ?>' style='margin-bottom:10px;'> 
						<?php elseif($product_divide_count >= '1'): ?> 
							<?php if(Lang::has(Session::get('lang_file').'.RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RATINGS')); ?> <?php endif; ?>
							<img src='<?php echo e(url("./images/stars-1.png")); ?>' style='margin-bottom:10px;'> 
						<?php elseif($product_divide_count >= '2'): ?> 
							<?php if(Lang::has(Session::get('lang_file').'.RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RATINGS')); ?> <?php endif; ?>
								<img src='<?php echo e(url("./images/stars-2.png")); ?>' style='margin-bottom:10px;'>  
						<?php elseif($product_divide_count >= '3'): ?> 
							<?php if(Lang::has(Session::get('lang_file').'.RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RATINGS')); ?> <?php endif; ?>
								<img src='<?php echo e(url("./images/stars-3.png")); ?>' style='margin-bottom:10px;'> 
						<?php elseif($product_divide_count >= '4'): ?> 
							<?php if(Lang::has(Session::get('lang_file').'.RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RATINGS')); ?> <?php endif; ?>
								<img src='<?php echo e(url("./images/stars-4.png")); ?>' style='margin-bottom:10px;'> 								
						<?php elseif($product_divide_count >= '5'): ?> 
							<?php if(Lang::has(Session::get('lang_file').'.RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RATINGS')); ?> <?php endif; ?>
								<img src='<?php echo e(url("./images/stars-5.png")); ?>' style='margin-bottom:10px;'>
								 
						<?php else: ?>
							<?php if(Lang::has(Session::get('lang_file').'.NO_RATING_FOR_THIS_PRODUCT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_RATING_FOR_THIS_PRODUCT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_RATING_FOR_THIS_PRODUCT')); ?> <?php endif; ?>
						<?php endif; ?>			
					<?php elseif($product_count): ?>
					<?php	$product_divide_count = $product_total_count / $product_count; ?>
					<?php else: ?>
						<?php if(Lang::has(Session::get('lang_file').'.NO_RATING_FOR_THIS_PRODUCT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_RATING_FOR_THIS_PRODUCT')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_RATING_FOR_THIS_PRODUCT')); ?> <?php endif; ?>
					<?php endif; ?>
					<span class="Review-count"><strong>( <?php echo e($count_review_rating); ?> <?php if(Lang::has(Session::get('lang_file').'.REVIEWS_AND_RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REVIEWS_AND_RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REVIEWS_AND_RATINGS')); ?> <?php endif; ?> )</strong></span>
					</p>
                  
                <p class="left-label"> 
				
				<?php $__currentLoopData = $product_details_by_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
					<?php if($row->cash_pack != 0): ?> 
					<b><?php if(Lang::has(Session::get('lang_file').'.CASHBACK')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CASHBACK')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CASHBACK')); ?> <?php endif; ?> :</b>  
					<?php echo e(Helper::cur_sym()); ?> <?php echo e($row->cash_pack); ?> 
					<?php elseif($row->cash_pack == ""): ?> 
					<?php elseif($row->cash_pack == 0): ?> <?php endif; ?>
					<?php $count = $pro_details_by_id->pro_qty - $pro_details_by_id->pro_no_of_purchase; ?>
					
				
				</p>
				<p class="left-label">
				 
				<?php if(isset($coupon_details)): ?>
				<?php	$current_date = date('Y-m-d H:i');
					$start_date = $coupon_details->start_date;
					$end_date = $coupon_details->end_date;
					$new_start_date = date("Y-m-d H:i", strtotime($start_date));
					$new_end_date = date("Y-m-d H:i", strtotime($end_date)); ?>
					
					<?php if(($new_start_date <= $current_date) && ($new_end_date >= $current_date)): ?>
					
						<?php $total_of_product_count = $productview_check_coupon_purchase_count_cod + $productview_check_coupon_purchase_count_paypal; ?>
					
						<?php if(($productview_check_coupon_purchase_count_cod >= $coupon_details->coupon_per_product) || ($productview_check_coupon_purchase_count_paypal >= $coupon_details->coupon_per_product) || ($total_of_product_count >= $coupon_details->coupon_per_product)): ?> 
						
						<?php else: ?>
							<?php if(Session::has('customerid')): ?>
								<?php $total_coupon_of_user = $productview_check_coupon_purchase_count_cod_user + $productview_check_coupon_purchase_count_paypal_user; ?>
					
								
								<?php if(($productview_check_coupon_purchase_count_cod_user >= $coupon_details->coupon_per_user) || ($productview_check_coupon_purchase_count_paypal_user >= $coupon_details->coupon_per_user) || ($total_coupon_of_user >= $coupon_details->coupon_per_user) ): ?>
									<?php echo e("Your Coupon Limit Exit"); ?>

								<?php else: ?> 
									<div style="padding-right:0;margin-top:5px;font-size:18px; color:#FF5722; font-weight: bold;">  
									<?php echo "Coupon Code:". '&nbsp' ?> 
									<?php echo e($coupon_details->coupon_code); ?>

									</div>
					 		<?php endif; ?> 
							<?php else: ?> 
								<a href="#login" role="button" data-toggle="modal" style="padding-right:0; margin-top:5px;"><button class="wish-but" id="login_a_click"  value="<?php echo e((Lang::has(Session::get('lang_file').'.LOGIN')!= '') ? trans(Session::get('lang_file').'.LOGIN') : trans($OUR_LANGUAGE.'.LOGIN')); ?>"> <?php echo e((Lang::has(Session::get('lang_file').'.CLICK_TO_VIEW_COUPON_CODE')!= '') ?  trans(Session::get('lang_file').'.CLICK_TO_VIEW_COUPON_CODE') : trans($OUR_LANGUAGE.'.CLICK_TO_VIEW_COUPON_CODE')); ?> </button></a>
							
							<?php endif; ?> 
						<?php endif; ?> <!-- //else -->
		
					<?php endif; ?>
		
				<?php endif; ?> 				</p>
				
                </div>

				<?php echo Form :: open(array('url' => 'addtocart','class'=>'form-horizontal qtyFrm','enctype'=>'multipart/form-data')); ?>

                <div class="pro-mid">
					<div class="details-left">
					<?php if($count > 0): ?> 
						<div class="detail-list">
							<div class="details-left-label">
							<label class="left-label">
							<?php if(Lang::has(Session::get('lang_file').'.QUANTITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.QUANTITY')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.QUANTITY')); ?> <?php endif; ?> :</label>
							</div>
							<div class="details-left-select">
								<div class="handle-counter" id="handleCounter">
									<a class="counter-minus btn btn-danger" onClick="remove_quantity()">-</a>
									<input type="number" value="1" min="1" max="<?php echo e(($pro_details_by_id->pro_qty - $pro_details_by_id->pro_no_of_purchase)); ?>" name="addtocart_qty" id="addtocart_qty" readonly required >
									
									<a class="counter-plus btn btn-success" onClick="add_quantity()">+</a>
									<span id="addtocart_qty_error" style="color:red;"></span>
									 
								</div>
							</div>
						</div>
						<?php if(count($product_color_details)>0): ?> 
						<div class="detail-list">
							<div class="details-left-label">
								<label class="left-label"><?php if(Lang::has(Session::get('lang_file').'.COLOR')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COLOR')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COLOR')); ?> <?php endif; ?> : </label>
							</div>
							<div class="details-left-select">
								<select name="addtocart_color" id="addtocart_color" required>
								  <option value="">--<?php if(Lang::has(Session::get('lang_file').'.SELECT_COLOR')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_COLOR')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_COLOR')); ?> <?php endif; ?>--</option>
							<?php $__currentLoopData = $product_color_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_color_det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
									<option value="<?php echo e($product_color_det->co_id); ?>">
									<?php echo e($product_color_det->co_name); ?>

									</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
								</select>
							</div>
						</div>
						<?php endif; ?> 
						
						<?php if(count($product_size_details) > 0): ?>  
						<?php	$size_name = $product_size_details[0]->si_name;
							$return  = strcmp($size_name,'no size'); ?>
						<?php if($return!=0): ?> 
						<div class="detail-list">
							<div class="details-left-label">
								<label class="left-label"><?php if(Lang::has(Session::get('lang_file').'.SIZE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SIZE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SIZE')); ?> <?php endif; ?> :</label>
							</div>
							<div class="details-left-select">
							   <select name="addtocart_size" id="addtocart_size" required>
							      <option value="">--<?php if(Lang::has(Session::get('lang_file').'.SELECT_SIZE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_SIZE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_SIZE')); ?> <?php endif; ?>--</option>
								   
								  <?php $__currentLoopData = $product_size_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_size_det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
									<option value="<?php echo e($product_size_det->ps_si_id); ?>">
									<?php echo e($product_size_det->si_name); ?>

									</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							   </select>
							</div>
						</div>
						
						    <?php else: ?> 
				  			 <input type="hidden" name="addtocart_size" value="<?php echo e($product_size_details[0]->ps_si_id); ?>">
				  
							<?php endif; ?>
					<?php endif; ?> <?php endif; ?> 

						<?php if($count > 0): ?>
						
						<div class="detail-list">
							<div class="details-left-label">
								<label class="left-label"> 
							 <?php if(Lang::has(Session::get('lang_file').'.AVAILABLE_STOCK')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AVAILABLE_STOCK')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AVAILABLE_STOCK')); ?> <?php endif; ?> :</label>
							</div>
							<div class="details-left-select">
							   <p class="stock-list"><?php echo e($pro_details_by_id->pro_no_of_purchase); ?>  
							  <?php if(Lang::has(Session::get('lang_file').'.SOLD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD')); ?> <?php endif; ?> / <?php echo e($pro_details_by_id->pro_qty-$pro_details_by_id->pro_no_of_purchase); ?> 
							  <?php if(Lang::has(Session::get('lang_file').'.IN_STOCK')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.IN_STOCK')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.IN_STOCK')); ?> <?php endif; ?></p>
							</div>
						</div>
				  
					 <?php $delivery_date = '+'.$pro_details_by_id->pro_delivery.'days'; ?>
                     <div class="detail-list">
                        <div class="details-left-label"><label class="left-label"><?php if(Lang::has(Session::get('lang_file').'.DELIVERY_WITH_IN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DELIVERY_WITH_IN')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DELIVERY_WITH_IN')); ?> <?php endif; ?> :</label></div>
                        <div class="details-left-select">
                           <p class="stock-list"><?php echo date('D d, M Y', strtotime($delivery_date)); ?></p>
                        </div>
                     </div>
					 <?php endif; ?>
                  </div>
                    <div class="Priec-right">
                     <p class="old-price"> <strike><?php echo e(Helper::cur_sym()); ?> <?php echo e($pro_details_by_id->pro_price); ?></strike></p>
                     <p class="new-price"><?php echo e(Helper::cur_sym()); ?> <?php echo e($pro_details_by_id->pro_disprice); ?> 
					<?php if($pro_details_by_id->pro_discount_percentage!=''): ?> 
					 <span class="offer">(<?php echo round($pro_details_by_id->pro_discount_percentage);?>% off)</span>
					 <?php endif; ?>
					 </p>
                     <div class="cart-top">
					 
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                <?php echo e(Form::hidden('addtocart_type','product')); ?>

                <?php echo e(Form::hidden('addtocart_pro_id',$pro_details_by_id->pro_id)); ?>

				<!-- <input type="hidden" name="addtocart_type" value="product" /> -->
				<!-- <input type="hidden" name="addtocart_pro_id" value="<?php echo $pro_details_by_id->pro_id; ?>" /> -->
				<input type="hidden" name="return_url" value="<?php echo $pro_details_by_id->mc_name.'/'.base64_encode(base64_encode(base64_encode($pro_details_by_id->pro_mc_id))); ?>" />
									
					
                       
						<div class="pro-cart">
						 
						<?php if(Session::has('customerid')): ?> 
						    <?php if($count > 0): ?> 
							<button type="submit" id="add_to_cart_session">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
								<?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?>
							</button> 
						 <?php else: ?> 
							<button type="button" >
								<?php if(Lang::has(Session::get('lang_file').'.SOLD_OUT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD_OUT')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD_OUT')); ?> <?php endif; ?>
							</button> 
						<?php endif; ?> 
						<?php else: ?> 
                            <?php if($count > 0): ?>
							<a href="#login" role="button" data-toggle="modal"  id="login_a_click">
							<button type="button">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
								<?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?>
							</button> 
							</a>
					    <?php else: ?>
                            <button type="button" >
                               <?php if(Lang::has(Session::get('lang_file').'.SOLD_OUT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD_OUT')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD_OUT')); ?> <?php endif; ?>
                            </button> 
                        <?php endif; ?> 
                    <?php endif; ?>
						</div>
					</form>	
                    <div class="add-to-wishlist" style="display: none;">Product Added to Wishlist </div>
                        <div class="pro-wishlist"> 
						<?php if($count > 0): ?>  
					<?php if(Session::has('customerid')): ?>
						    <?php if(count($prodInWishlist)==0): ?>
    							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                        <?php echo e(Form::hidden('pro_id','$pro_details_by_id->pro_id')); ?>        
    							<!-- <input type="hidden" name="pro_id" value="<?php echo $pro_details_by_id->pro_id; ?>"> -->
    							<input type="hidden" name="cus_id" value="<?php echo Session::get('customerid');?>">
    							<button type="button" onclick="addtowish(<?php echo e($pro_details_by_id->pro_id); ?>,<?php echo e(Session::get('customerid')); ?>)">
    							<input type="hidden" id="wishlisturl" value="<?php echo e(url('user_profile?id=4')); ?>">
    								<i class="fa fa-heart" aria-hidden="true"></i><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_WISHLIST')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_WISHLIST')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_WISHLIST')); ?> <?php endif; ?> 
    							</button>
                            <?php else: ?>
                            <?php /* remove wishlist */?>   
                                
                            <a href="<?php echo url('remove_wish_product').'/'.$prodInWishlist->ws_id; ?>">
                                <button type="button"><?php if(Lang::has(Session::get('lang_file').'.REMOVE_FROM_WISHLIST')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REMOVE_FROM_WISHLIST')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REMOVE_FROM_WISHLIST')); ?> <?php endif; ?></button>
                            </a> 
                            <?php /*remove link:remove_wish_product/wishlist table_id*/ ?>
                                
						    <?php endif; ?>  
					 <?php else: ?> 
							<a href="#login" role="button" data-toggle="modal"  id="login_a_click">
							<button type="button">
								<i class="fa fa-heart" aria-hidden="true"></i> <?php if(Lang::has(Session::get('lang_file').'.ADD_TO_WISHLIST')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_WISHLIST')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_WISHLIST')); ?> <?php endif; ?>
							</button>
							</a>
					<?php endif; ?>
						<?php endif; ?>
						</div>
                    </div>
                </div>


               </div>
			   </form> <!--add to cart form-->
                
                 
                   <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                     <?php   $cancel_policy  = 'cancel_policy';
                        $return_policy  = 'return_policy';
                        $replace_policy = 'replace_policy'; ?>
                    <?php else: ?>   
                    <?php    $cancel_policy  = 'cancel_policy_'.Session::get('lang_code'); 
                        $return_policy  = 'return_policy_'.Session::get('lang_code'); 
                        $replace_policy = 'replace_policy_'.Session::get('lang_code');  ?>
                    <?php endif; ?> 
                
                <div class="cancel-policy">
                    <?php if($pro_details_by_id->allow_cancel=='1'): ?>
                        <p class="policy-title"> <?php if($pro_details_by_id->cancel_days>0): ?> 
                                <?php echo e($pro_details_by_id->cancel_days); ?>

                                <?php if($pro_details_by_id->cancel_days>1): ?> 
                                    days
                                <?php else: ?> 
                                    day
                                <?php endif; ?>
                               <?php if(Lang::has(Session::get('lang_file').'.CANCELLATION_ONLY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCELLATION_ONLY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCELLATION_ONLY')); ?> <?php endif; ?>
                                    <span class="policy-quest" id="policyclick"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></span>
                                <br>
                                <?php if($pro_details_by_id->$cancel_policy!=''): ?>
                                    <div class="policy-container dev_cancel" style="display: none;"> 
                                        <p><?php echo $pro_details_by_id->$cancel_policy; ?>   </p> 
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </p>
                       
                        
                    <?php endif; ?>

                    <?php if($pro_details_by_id->allow_return=='1'): ?>
                        <p class="policy-title"> <?php if($pro_details_by_id->return_days>0): ?> 
                                <?php echo e($pro_details_by_id->return_days); ?>

                                <?php if($pro_details_by_id->return_days>1): ?> 
                                    days
                                <?php else: ?> 
                                    day
                                <?php endif; ?>
                                <?php if(Lang::has(Session::get('lang_file').'.RETURN_ONLY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RETURN_ONLY')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RETURN_ONLY')); ?> <?php endif; ?>
                                     <span class="policy-quest" id="returnclick"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></span>

                                    <br>
                                <?php if($pro_details_by_id->$return_policy!=''): ?>
                                   <div class="policy-container dev_return" style="display: none;"> 
                                        <?php echo $pro_details_by_id->$return_policy; ?>    
                                    </div>
                                <?php endif; ?>    
                            <?php endif; ?>
                        </p>
                       
                    <?php endif; ?> 
                    <?php if($pro_details_by_id->allow_replace=='1'): ?>
                        <p class="policy-title"> <?php if($pro_details_by_id->replace_days>0): ?> 
                                <?php echo e($pro_details_by_id->replace_days); ?>

                                <?php if($pro_details_by_id->replace_days>1): ?> 
                                    days
                                <?php else: ?> 
                                    day
                                <?php endif; ?>
                                <?php if(Lang::has(Session::get('lang_file').'.REPLACEMENT_ONLY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REPLACEMENT_ONLY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REPLACEMENT_ONLY')); ?> <?php endif; ?>

                                     <span class="policy-quest" id="replaceclick"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></span>
                                    <br>
                                <?php if($pro_details_by_id->$replace_policy!=''): ?>
                                   <div class="policy-container dev_replace" style="display: none;"> 
                                        <?php echo $pro_details_by_id->$replace_policy; ?>    
                                    </div>
                                <?php endif; ?>    
                            <?php endif; ?>
                        </p>
                        
                    <?php endif; ?>    
                </div>
                
            </div>
         </div>
		
        <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
          <?php  $pro_desc = 'pro_desc'; ?>
        <?php else: ?> <?php  $pro_desc = 'pro_desc_'.Session::get('lang_code'); ?> <?php endif; ?>

        
        <?php if($pro_details_by_id->$pro_desc != ''): ?>
         <div class="pro-description">
            <h5 class="pro-description-title"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_INFORMATION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_INFORMATION')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_INFORMATION')); ?> <?php endif; ?></h5>
            <p><?php echo html_entity_decode($pro_details_by_id->$pro_desc); ?></p>
            <?php /* <p>{{ $pro_details_by_id->$pro_desc }}</p> */ ?>   
         </div>
        <?php endif; ?> 
         <?php if(count($product_specGroupList)>0): ?>
             <div class="pro-features">
                <h5 class="pro-description-title"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_SPECIFICATION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_SPECIFICATION')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_SPECIFICATION')); ?> <?php endif; ?></h5>
    			
                <div class="pro-features-left">
    			<?php /* foreach($product_spec_details_old as $spec){?>
                   <div class="spec-top">
                      <div class="spec-label"><label><?php 
    					if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
    						$sp_name = 'sp_name';
    					}else {  $sp_name = 'sp_name_'.Session::get('lang_code'); }
    				  echo $spec->$sp_name;?></label></div>
                      <div class="spec-right">
                         <p class=""><?php 
    					 if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
    						$spc_value = 'spc_value';
    					 }else {  $spc_value = 'spc_value_'.Session::get('lang_code'); }
    					 
    					 echo $spec->$spc_value; ?></p>
                      </div>
                   </div>
    			<?php } */  ?>

           

                

                    <?php $__currentLoopData = $product_specGroupList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specgp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if(count($product_spec_details[$specgp->spg_id])>0): ?>

                           

                            <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                            <?php    $spg_name = 'spg_name';
                                $sp_name = 'sp_name';
                                $spc_value = 'spc_value'; ?>
                            <?php else: ?>   
                            <?php    $spg_name = 'spg_name_'.Session::get('lang_code'); 
                                $sp_name = 'sp_name_'.Session::get('lang_code');
                                $spc_value = 'spc_value_'.Session::get('lang_code'); ?>
                            <?php endif; ?>
                        
                            <ul>
                                <li><?php echo e($specgp->$spg_name); ?>

                                <br> 
                                <?php $__currentLoopData = $product_spec_details[$specgp->spg_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodSpec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($prodSpecAr[$prodSpec->sp_id]): ?>  

                                       
                                        <div class="spec-top">
                                            <div class="spec-label">
                                                <label><?php echo e($prodSpec->$sp_name); ?></label>
                                            </div>
                                            <div class="spec-right">
                                                <?php $i=1; ?>
                                                <?php $__currentLoopData = $prodSpecAr[$prodSpec->sp_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spcVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <p class=""><?php echo e($spcVal->$spc_value); ?> 
                                                        <?php if($i!= count($prodSpecAr[$prodSpec->sp_id])): ?>
                                                        
                                                        <?php $i++; ?>
                                                    <?php endif; ?> </p>
                                                    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
            

                                </li>
                            </ul>
                               
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                

                </div>

    			<?php /*
                <div class="pro-features-right">
                   <div class="spec-top">
                      <div class="spec-label"><label>Suitable For</label></div>
                      <div class="spec-right">
                         <p class="">Western Wear</p>
                      </div>
                   </div>
                </div>
    			*/ ?>
            </div>
		<?php endif; ?> 
         <div class="Ratings-review">
            <div class="review-title">
               <h5 class=""><?php if(Lang::has(Session::get('lang_file').'.REVIEWS_AND_RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REVIEWS_AND_RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REVIEWS_AND_RATINGS')); ?> <?php endif; ?></h5>
               <div class="write-review">
			   
			   <?php if(Session::has('customerid')): ?>  <a href="#review-comment"><?php if(Lang::has(Session::get('lang_file').'.WRITE_A_REVIEW')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.WRITE_A_REVIEW')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.WRITE_A_REVIEW')); ?> <?php endif; ?></a>  
			   <?php else: ?> 
			   
			   <a href="#login" role="button" data-toggle="modal"  id="login_a_click"  value="<?php if(Lang::has(Session::get('lang_file').'.LOGIN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.LOGIN')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.LOGIN')); ?> <?php endif; ?>"><?php if(Lang::has(Session::get('lang_file').'.WRITE_A_REVIEW')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.WRITE_A_REVIEW')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.WRITE_A_REVIEW')); ?> <?php endif; ?></a>
			   
			  <?php endif; ?>
               </div>
            </div>
	<?php if(count($review_details)!=0): ?>
     <?php	$r=0; ?>
			<?php $__currentLoopData = $review_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php	$customer_name = $col->cus_name;
				$customer_mail = $col->cus_email;
				$customer_img = $col->cus_pic;
				$review_title = $col->title;
				$customer_comments = $col->comments;
				$customer_date = $col->review_date;
				$customer_product = $col->product_id;
				$final_date = date('M j, Y', strtotime($col->review_date) );
				$customer_title = $col->title;
				$customer_name_arr = str_split($customer_name);
				$start_letter = strtolower($customer_name_arr[0]);
				$customer_ratings = $col->ratings;
				$r++; ?>
	
            <div class="reviews-single">
               <div class="reviews-single-left">
                  <div class="name-letter">
                     <p><?php echo e($customer_name_arr[0]); ?></p>
                  </div>
               </div>
               <div class="reviews-single-right">
                  
				  
		<?php if($customer_ratings=='1'): ?>
		
			
			<img src='<?php echo e(url('./images/stars-1.png')); ?>' style='margin-bottom:10px;'><?php if(Lang::has(Session::get('lang_file').'.RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RATINGS')); ?> <?php endif; ?> 
		
		<?php elseif($customer_ratings=='2'): ?>
		
			
			<img src='<?php echo e(url('./images/stars-2.png')); ?>' style='margin-bottom:10px;'><?php if(Lang::has(Session::get('lang_file').'.RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RATINGS')); ?> <?php endif; ?> 
		
		<?php elseif($customer_ratings=='3'): ?>
		
			
			<img src='<?php echo e(url('./images/stars-3.png')); ?>' style='margin-bottom:10px;'><?php if(Lang::has(Session::get('lang_file').'.RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RATINGS')); ?> <?php endif; ?> 
		<?php elseif($customer_ratings=='4'): ?>
		
			
			<img src='<?php echo e(url('./images/stars-4.png')); ?>' style='margin-bottom:10px;'><?php if(Lang::has(Session::get('lang_file').'.RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RATINGS')); ?> <?php endif; ?> 
		
		<?php elseif($customer_ratings=='5'): ?>
		
			
			<img src='<?php echo e(url('./images/stars-5.png')); ?>' style='margin-bottom:10px;'><?php if(Lang::has(Session::get('lang_file').'.RATINGS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RATINGS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RATINGS')); ?> <?php endif; ?>
		
		 <?php endif; ?>
		
                  <h5><?php echo e($review_title); ?></h5>
                  <h6>by <?php echo e($customer_name); ?> on <?php echo e($final_date); ?></h6>
                  <p><?php echo e($customer_comments); ?>.</p>
               </div>
            </div>
       <!-- //foreach --> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php if($r==0): ?> <?php if(Lang::has(Session::get('lang_file').'.NO_RATING_FOR_THIS_PRODUCT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_RATING_FOR_THIS_PRODUCT')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_RATING_FOR_THIS_PRODUCT')); ?> <?php endif; ?> <?php else: ?>
            <div class="more-review">
               <a href="<?php echo url('product_review_all/'.$pro_details_by_id->pro_id); ?>">More Review</a>
            </div>
		<?php endif; ?> 
		<?php else: ?> <?php if(Lang::has(Session::get('lang_file').'.NO_RATING_FOR_THIS_PRODUCT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_RATING_FOR_THIS_PRODUCT')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_RATING_FOR_THIS_PRODUCT')); ?> <?php endif; ?> <?php endif; ?>
         </div>
	
		<?php if(count($get_related_product)!=0): ?>  
	<?php	$i=0; ?> 
         <div class="Similer-product">
            <h5 class="pro-description-title"><?php if(Lang::has(Session::get('lang_file').'.RELATED_PRODUCTS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RELATED_PRODUCTS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RELATED_PRODUCTS')); ?> <?php endif; ?></h5>
            <div id="mixedSlider">
               <div class="MS-content">
			   
			 
				<?php $__currentLoopData = $get_related_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
			<?php	$mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
                $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
			    $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
                $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name));
                $res = base64_encode($product_det->pro_id);
				$product_image = explode('/**/',$product_det->pro_Img);
				$product_saving_price = $product_det->pro_price - $product_det->pro_disprice;
				$product_discount_percentage = round(($product_saving_price/ $product_det->pro_price)*100,2); ?>
                <?php if((Session::get('lang_code'))=='' || (Session::get('lang_code'))== 'en'): ?>  
                <?php    $pro_title = 'pro_title'; ?>
                
				<?php else: ?> <?php  $pro_title = 'pro_title_'.Session::get('lang_code') ?> <?php endif; ?>

              <?php  $product_img    = $product_image[0]; ?>
                <!-- /* Image Path */ -->
            <?php    $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
                $img_data   = "public/assets/product/".$product_img; ?>
                
               <?php if(file_exists($img_data) && $product_img !=''): ?> 
			   
                
             <?php   $prod_path = url('').'/public/assets/product/' .$product_img; ?>                  
                
				<?php else: ?>  
                    <?php if(isset($DynamicNoImage['productImg'])): ?>
                    <?php    $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['productImg']; ?>
                        <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>
                        <?php    $prod_path = url('').'/'.$dyanamicNoImg_path; ?> <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>   
               <!--  /* Image Path ends */   
                //Alt text -->
             <?php   $alt_text   = substr($product_det->$pro_title,0,25); ?>

				<?php if($product_det->pro_no_of_purchase < $product_det->pro_qty): ?> 
				<?php	  $i++; ?>
			   
                  
                     <div class="item">
                        <div class="imgTitle">
						 
						 
							<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?>  
								<a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res)); ?>"><img alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path); ?>" /></a>
					  <?php endif; ?> 
							<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?>  
								<a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res)); ?>"><img alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path); ?>"></a>
					  <?php endif; ?>
							<?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?>  
								<a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$res)); ?>"><img alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path); ?>"></a>
					 <?php endif; ?>
                        </div>
                        <p class="slide-product-title"> 
                       
                         
                         <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
                                <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res)); ?>">
                     <?php endif; ?> 
                            <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?>  
                                <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res)); ?>">
                      <?php endif; ?>
                            <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?>  
                                <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$res)); ?>">
                     <?php endif; ?>
                     <?php echo e(substr ($product_det->$pro_title,0,20)); ?>

                     </a></p>
                        <h5 class=""><?php echo e(Helper::cur_sym()); ?> <?php echo e($product_det->pro_disprice); ?></h5>
                     </div>
                 
			   <?php endif; ?> <!-- //if -->
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- //foreach -->   
			   </div>
            
			   
			   <?php if($i==0): ?> <?php if(Lang::has(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_PRODUCTS_AVAILABLE')); ?> <?php endif; ?>
			   <?php else: ?> 
                <?php if(count($get_related_product)>4): ?>   
               <div class="MS-controls">
                  <button class="MS-left"><i class="icon-chevron-left"></i></button>
                  <button class="MS-right"><i class="icon-chevron-right"></i></button>
               </div>
                <?php endif; ?>
			   <?php endif; ?>
            </div>
         </div>
	<?php endif; ?> <!-- //if count -->

<?php if(Session::has('customerid')): ?> 
<div class="your-review" id="review-comment">
   <h5 class="pro-description-title"><?php if(Lang::has(Session::get('lang_file').'.WRITE_A_POST_COMMENTS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.WRITE_A_POST_COMMENTS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.WRITE_A_POST_COMMENTS')); ?> <?php endif; ?></h5>
<?php echo Form::open(array('url'=>'productcomments','class'=>'form-horizontal loginFrm')); ?>

		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
		<input type="hidden" name="customer_id" value="<?php echo Session::get('customerid');?>">
		<input type="hidden" name="product_id" value="<?php echo $pro_details_by_id->pro_id; ?>">
   <div class="product-rate">
   <label class="control-label review_ratings_label" for="review_ratings" style="text-align: left;"><h4><?php if(Lang::has(Session::get('lang_file').'.RATE_THIS_PRODUCT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RATE_THIS_PRODUCT')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RATE_THIS_PRODUCT')); ?> <?php endif; ?></h4></label>
     <fieldset class="rating disableRating addReviews">
             <input id="review_ratings_5" name="ratings" type="radio" value="5" required> 
             <label for="review_ratings_5" title="Awesome - 5 stars"> </label>

             <input id="review_ratings_4" name="ratings" type="radio" value="4" required> 
             <label for="review_ratings_4" title="Pretty good - 4 stars"> </label>

             <input id="review_ratings_3" name="ratings" type="radio" value="3" required> 
             <label for="review_ratings_3" title="Not bad - 3 stars"> </label>

             <input id="review_ratings_2" name="ratings" type="radio" value="2" required> 
             <label for="review_ratings_2" title="Bad - 2 stars"> </label>

             <input id="review_ratings_1" name="ratings" type="radio" value="1" required> 
             <label for="review_ratings_1" title="Very Bad - 1 stars"> </label>
 
     </fieldset>
   </div>

<div>
   <label class="control-label review_ratings_label" for="review_ratings" style="text-align: left;"><h4><?php if(Lang::has(Session::get('lang_file').'.REVIEW_THIS_PRODUCT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REVIEW_THIS_PRODUCT')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REVIEW_THIS_PRODUCT')); ?> <?php endif; ?></h4></label>
<div class="review-page-title">
  <input type="text" name="title" value="" placeholder="<?php if(Lang::has(Session::get('lang_file').'.REVIEW_TITLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REVIEW_TITLE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REVIEW_TITLE')); ?> <?php endif; ?>" required>
  <textarea name="comments" placeholder="<?php if(Lang::has(Session::get('lang_file').'.REVIEW_DESCRIPTION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REVIEW_DESCRIPTION')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REVIEW_DESCRIPTION')); ?> <?php endif; ?>" required></textarea>
  <button type="submit" class="btn-success"><?php if(Lang::has(Session::get('lang_file').'.SUBMIT_REVIEW')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SUBMIT_REVIEW')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SUBMIT_REVIEW')); ?> <?php endif; ?></button>
</div>

</div>
</form>
</div>
<?php endif; ?>




      </div>
      </div>
      <?php echo $footer; ?>

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
      <!--  zoom-->
        <script src="<?php echo e(url('')); ?>/themes/js/zoom/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/themes/css/zoom/xzoom.css" media="all" />
  <script type="text/javascript" src="<?php echo e(url('')); ?>/themes/js/zoom/xzoom.min.js"></script>
 
  <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(url('')); ?>/themes/css/zoom/magnific-popup.css" />
  <script type="text/javascript" src="<?php echo e(url('')); ?>/themes/js/zoom/magnific-popup.js"></script> 
       <script src="<?php echo e(url('')); ?>/themes/js/zoom/foundation.min.js"></script>
    <script src="<?php echo e(url('')); ?>/themes/js/zoom/setup.js"></script>

      <!---Zoom-->
      <script src="<?php echo e(url('')); ?>/themes/js/jquery.js" type="text/javascript"></script>
      <!-- <script src="<?php // echo url(''); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script> -->
      <script src="<?php echo e(url('')); ?>/themes/js/google-code-prettify/prettify.js"></script>
      <script src="<?php echo e(url('')); ?>/themes/js/bootshop.js"></script>
      <script src="<?php echo e(url('')); ?>/themes/js/jquery.lightbox-0.5.js"></script>

    <script src="<?php echo e(url('')); ?>/themes/js/multislider.js"></script>
      <script>
         $('#basicSlider').multislider({
                  continuous: true,
                  duration: 2000
               });
           <?php if(count($get_related_product)>4) { ?> 

               $('#mixedSlider').multislider({
                autoSlide: true,
                  duration: 750,
                  interval: 3000
               });
               <?php } ?>
       </script>

<script src="<?php echo e(url('')); ?>/themes/js/handleCounter.js"></script>
    <script>
        $(function ($) {
            var options = {
                minimum: 1,
                maximize: 10,
                onChange: valChanged,
                onMinimum: function(e) {
                    console.log('reached minimum: '+e)
                },
                onMaximize: function(e) {
                    console.log('reached maximize'+e)
                }
            }
            $('#handleCounter').handleCounter(options)
            $('#handleCounter2').handleCounter(options)
      $('#handleCounter3').handleCounter({maximize: 100})
        })
        function valChanged(d) {
//            console.log(d)
        }
    </script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>
<!--Zoom image script-->
<script src='http://code.jquery.com/jquery-1.9.1.min.js'></script>

   <script type="text/javascript" src="<?php echo e(url('')); ?>/themes/js/jquery.js"></script>

<script src="<?php echo url(''); ?>/themes/js/magiczoomplus.js" type="text/javascript"></script>	


<?php 
	  if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
		$map_lang = 'en';
	  }else {  
		$map_lang = 'fr';
	  }
	 ?>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=<?php echo $GOOGLE_KEY;?>&language=<?php echo $map_lang; ?>'></script>
<script src="<?php echo url(''); ?>/public/assets/js/locationpicker.jquery.js"></script>


<script type="text/javascript">
	function addtowish(pro_id,cus_id){

		var wishlisturl = document.getElementById('wishlisturl').value;

		$.ajax({
					type: "POST",   
					url:"<?php echo url('addtowish'); ?>",
					data:{'pro_id':pro_id,'cus_id':cus_id},
					success:function(response){
						if(response==0){
						<?php /*	alert('<?php if (Lang::has(Session::get('lang_file').'.PRODUCT_ADDED_TO_WISHLIST')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_ADDED_TO_WISHLIST');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_ADDED_TO_WISHLIST');} ?>');*/?>
                        $(".add-to-wishlist").fadeIn('slow').delay(5000).fadeOut('slow');
							//window.location=wishlisturl;
                            window.location.reload();
                            
						}else{
							alert('<?php if (Lang::has(Session::get('lang_file').'.PRODUCT_ALREADY_EXISTS_IN_YOUR_WISHLIST')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_ALREADY_EXISTS_IN_YOUR_WISHLIST');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_ALREADY_EXISTS_IN_YOUR_WISHLIST');} ?>');
							//window.location=wishlisturl;
						}
						
						
					}
				});
	}
</script>
<script type="text/javascript">
$(document).ready(function(){

$('#add_to_cart_session').click(function(){
	var pro_purchase1 = '<?php echo $pro_details_by_id->pro_no_of_purchase; ?>' ;
	var pro_purchase = parseInt($('#addtocart_qty').val()) + parseInt(pro_purchase1);
	var pro_qty = '<?php echo $pro_details_by_id->pro_qty; ?>';
	if(pro_purchase > parseInt(pro_qty))
	{
		$('#addtocart_qty').focus();
		$('#addtocart_qty').css('border-color', 'red');
		$('#addtocart_qty_error').html('<?php if (Lang::has(Session::get('lang_file').'.LIMITED_QUANTITY_AVAILABLE')!= '') { echo  trans(Session::get('lang_file').'.LIMITED_QUANTITY_AVAILABLE');}  else { echo trans($OUR_LANGUAGE.'.LIMITED_QUANTITY_AVAILABLE');} ?>');
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
		$('#size_color_error').html('<?php if (Lang::has(Session::get('lang_file').'.SELECT_COLOR')!= '') { echo  trans(Session::get('lang_file').'.SELECT_COLOR');}  else { echo trans($OUR_LANGUAGE.'.SELECT_COLOR');} ?>');
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
		$('#size_color_error').html('<?php if (Lang::has(Session::get('lang_file').'.SELECT_SIZE')!= '') { echo  trans(Session::get('lang_file').'.SELECT_SIZE');}  else { echo trans($OUR_LANGUAGE.'.SELECT_SIZE');} ?>');
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

function add_quantity()
{
	//alert();
	var quantity=$("#addtocart_qty").val();
	var remaining_product=parseInt(<?php echo  $pro_details_by_id->pro_qty-$pro_details_by_id->pro_no_of_purchase;?>);
	if(quantity<remaining_product)
	{
		var new_quantity=parseInt(quantity)+1;
		$("#addtocart_qty").val(new_quantity);
	}
	//alert();
}
function remove_quantity()
{
	//alert();
	var quantity=$("#addtocart_qty").val();
	var quantity=parseInt(quantity);
	if(quantity>1)
	{
		var new_quantity=quantity-1;
		$("#addtocart_qty").val(new_quantity);
	}
	//alert();
}
 
</script>
   <script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    </script>


        <script type="text/javascript">
        $(document).ready(function()
{
    $('#policyclick').click(function(event)

{
    $('.dev_cancel').slideToggle("fast");
      event.stopPropagation();
});
     $('#returnclick').click(function(event)

{
    $('.dev_return').slideToggle("fast");
      event.stopPropagation();
});
      $('#replaceclick').click(function(event)

{
    $('.dev_replace').slideToggle("fast");
      event.stopPropagation();
});


      $(".policy-container").on("click", function (event) {
        event.stopPropagation();
    });

});


$(document).on("click", function () {
    $(".policy-container").hide();
});

    </script>
   </body>
</html>