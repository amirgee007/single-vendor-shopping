<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
				<!-- Bootstrap style --> 
					<link id="callCss" rel="stylesheet" href="<?php echo url(''); ?>/themes/bootshop/bootstrap.min.css" media="screen"/>
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
					<style type="text/css" id="enject"></style>
					<link href="<?php echo url(''); ?>/themes/css/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
 
    						 <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
					<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
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
         #mixedSlider .MS-content .item .imgTitle img {
    width: 100%;
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
         padding: 0 10px;
         margin:10px 15px;
         box-shadow:0px 0px 3px #8a8a8a;
         text-align: center;
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
         padding: 10px;
         }
        
         #mixedSlider .MS-content .item p {
         font-size: 14px;
         line-height: 16px;
        margin-left: 5px;
         text-align: left;
         color:#b0aeae;
         margin-bottom:5px;
         }
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
				</style>
        
		</head>
		<body>

			{!! $navbar !!}

			{!! $header !!}


 <div class="container">
        <div class="Ratings-review">
            <div class="review-title">
               <h5 class="">Reviews & Ratings</h5>
               <div class="write-review">
               <?php 
			   if(Session::has('customerid')){ ?> <a href="#review-comment"><?php if (Lang::has(Session::get('lang_file').'.WRITE_A_REVIEW')!= '') { echo  trans(Session::get('lang_file').'.WRITE_A_REVIEW');}  else { echo trans($OUR_LANGUAGE.'.WRITE_A_REVIEW');} ?></a> <?php 
			   }else{ ?>
			   
			   <a href="#login" role="button" data-toggle="modal"  id="login_a_click"  value="<?php if (Lang::has(Session::get('lang_file').'.LOGIN')!= '') { echo  trans(Session::get('lang_file').'.LOGIN');}  else { echo trans($OUR_LANGUAGE.'.LOGIN');} ?>"><?php if (Lang::has(Session::get('lang_file').'.WRITE_A_REVIEW_POST')!= '') { echo  trans(Session::get('lang_file').'.WRITE_A_REVIEW_POST');}  else { echo trans($OUR_LANGUAGE.'.WRITE_A_REVIEW_POST');} ?></a>
			   
			  <?php } ?>
               </div>
            </div>
<?php 
foreach($product_details_by_id as $pro_details_by_id) { } 
$product_img= explode('/**/',trim($pro_details_by_id->deal_image,"/**/"));	
$product_count = $one_count + $two_count + $three_count + $four_count + $five_count;
								
					$multiple_countone   = $one_count *1;
					$multiple_counttwo   = $two_count *2;
					$multiple_countthree = $three_count *3;
					$multiple_countfour  = $four_count *4;
					$multiple_countfive  = $five_count *5;
					$product_total_count = $multiple_countone + $multiple_counttwo + $multiple_countthree + $multiple_countfour + $multiple_countfive;

					  $product_image     = $product_img[0];
             
            $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
            $img_data   = "public/assets/deals/".$product_image; ?>
            
            @if(file_exists($img_data) && $product_image !='')   
            
           @php $prod_path = url('').'/public/assets/deals/' .$product_image;   @endphp                
            @else  
                @if(isset($DynamicNoImage['dealImg']))
                @php    $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['dealImg']; @endphp
                   @if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path))
                     @php   $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
                @endif
            @endif 

            <div class="review-product-top">
            		<div class="review-product-left">
					
            				<h5><?php 
					if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
						$deal_title = 'deal_title';
					}else {  $deal_title = 'deal_title_'.Session::get('lang_code'); }
							echo  $pro_details_by_id->$deal_title; ?></h5>
            				<img src="{!!  $prod_path !!}" style="width:200px; height:170px;">

            		 </div>
            		 <div class="review-product-mid">

<div class="review-Price">
                     <p class="old-price"> <strike>{{ Helper::cur_sym() }} <?php echo $pro_details_by_id->deal_original_price; ?></strike></p>
                     <p class="new-price">{{ Helper::cur_sym() }}  <?php echo $pro_details_by_id->deal_discount_price; ?><span class="offer">(<?php echo $pro_details_by_id->deal_discount_percentage; ?>% <?php if (Lang::has(Session::get('lang_file').'.OFFER')!= '') { echo  trans(Session::get('lang_file').'.OFFER');}  else { echo trans($OUR_LANGUAGE.'.OFFER');} ?>)</span></p>
                  
                  </div>

            		 </div>
						<div class="review-product-right"> 

						<div class="">
							<?php
					if($product_count){
						$product_divide_count = $product_total_count / $product_count;
						$product_divide_count = round($product_divide_count);
						if($product_divide_count <= '1'){ 
							if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') { echo  trans(Session::get('lang_file').'.RATINGS');}  else { echo trans($OUR_LANGUAGE.'.RATINGS');} ?>
							<img src='<?php echo url('./images/stars-1.png'); ?>' style='margin-bottom:10px;'><?php 
						}elseif($product_divide_count == '1'){ 
							if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') { echo  trans(Session::get('lang_file').'.RATINGS');}  else { echo trans($OUR_LANGUAGE.'.RATINGS');} ?>
							<img src='<?php echo url('./images/stars-1.png'); ?>' style='margin-bottom:10px;'><?php 
						}elseif($product_divide_count == '2'){ 
							if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') { echo  trans(Session::get('lang_file').'.RATINGS');}  else { echo trans($OUR_LANGUAGE.'.RATINGS');}?>
								<img src='<?php echo url('./images/stars-2.png'); ?>' style='margin-bottom:10px;'><?php  
						}elseif($product_divide_count == '3'){ 
							if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') { echo  trans(Session::get('lang_file').'.RATINGS');}  else { echo trans($OUR_LANGUAGE.'.RATINGS');} ?>
								<img src='<?php echo url('./images/stars-3.png'); ?>' style='margin-bottom:10px;'><?php 
						}elseif($product_divide_count == '4'){ 
							if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') { echo  trans(Session::get('lang_file').'.RATINGS');}  else { echo trans($OUR_LANGUAGE.'.RATINGS');} ?>
								<img src='<?php echo url('./images/stars-4.png'); ?>' style='margin-bottom:10px;'><?php 
						}elseif($product_divide_count == '5'){ 
							if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') { echo  trans(Session::get('lang_file').'.RATINGS');}  else { echo trans($OUR_LANGUAGE.'.RATINGS');} ?>
								<img src='<?php echo url('./images/stars-5.png'); ?>' style='margin-bottom:10px;'>
								<?php 
						}else{
							echo "No Rating for this Product";
						}			
					}elseif($product_count){
						$product_divide_count = $product_total_count / $product_count;
					}else{
						echo "No Rating for this Product";
					} ?>
						</div>
							<h5><?php echo $count_review_rating;?> Reviews & Ratings</h5>

						</div>

            </div>
<?php 

if(count($review_details)!=0){ 
			foreach($review_details as $col){
				$customer_name = $col->cus_name;
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
				
				?>
            <div class="reviews-single">
               <div class="reviews-single-left">
                  <div class="name-letter">
                    <p><?php echo $customer_name_arr[0]; ?></p>
                  </div>
               </div>
               <div class="reviews-single-right">
                 <?php
		if($customer_ratings=='1')
		{
			?>
			<img src='<?php echo url('./images/stars-1.png'); ?>' style='margin-bottom:10px;'><?php if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') { echo  trans(Session::get('lang_file').'.RATINGS');}  else { echo trans($OUR_LANGUAGE.'.RATINGS');} ?>
			<?php
		}
		elseif($customer_ratings=='2')
		{
			?>
			<img src='<?php echo url('./images/stars-2.png'); ?>' style='margin-bottom:10px;'><?php if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') { echo  trans(Session::get('lang_file').'.RATINGS');}  else { echo trans($OUR_LANGUAGE.'.RATINGS');} ?>
			<?php
		}
		elseif($customer_ratings=='3')
		{
			?>
			<img src='<?php echo url('./images/stars-3.png'); ?>' style='margin-bottom:10px;'><?php if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') { echo  trans(Session::get('lang_file').'.RATINGS');}  else { echo trans($OUR_LANGUAGE.'.RATINGS');} ?>
			<?php
		}
		elseif($customer_ratings=='4')
		{
			?>
			<img src='<?php echo url('./images/stars-4.png'); ?>' style='margin-bottom:10px;'><?php if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') { echo  trans(Session::get('lang_file').'.RATINGS');}  else { echo trans($OUR_LANGUAGE.'.RATINGS');} ?>
			<?php
		}
		elseif($customer_ratings=='5')
		{
			?>
			<img src='<?php echo url('./images/stars-5.png'); ?>' style='margin-bottom:10px;'><?php if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') { echo  trans(Session::get('lang_file').'.RATINGS');}  else { echo trans($OUR_LANGUAGE.'.RATINGS');} ?>
			<?php
		}
		else {}
		?>
                  <h5><?php echo $review_title; ?></h5>
                  <h6>by <?php echo $customer_name; ?> on <?php echo $final_date;?></h6>
                  <p><?php echo $customer_comments; ?>.</p>
               </div>
            </div>
	<?php 	} //foreach
		} //if 
		else{
			echo "No Reviews & Ratings.";
		}?>	
           
         </div>

<?php 
		if(count($get_related_product)!=0){  
		$i=0; ?>

               <div class="Similer-product">
            <h5 class="pro-description-title"><?php if (Lang::has(Session::get('lang_file').'.RELATED_PRODUCTS')!= '') { echo  trans(Session::get('lang_file').'.RELATED_PRODUCTS');}  else { echo trans($OUR_LANGUAGE.'.RELATED_PRODUCTS');} ?></h5>
            <div id="mixedSlider">
               <div class="MS-content">
			   <?php 
			  
				foreach($get_related_product as $product_det){ 

				$mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
                $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
			    $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
                $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name));
                $res = base64_encode($product_det->deal_id);
				$product_image = explode('/**/',$product_det->deal_image);
				$product_saving_price = $product_det->pro_price - $product_det->pro_disprice;
				$product_discount_percentage = round(($product_saving_price/ $product_det->pro_price)*100,2);
					if($product_det->deal_no_of_purchase < $product_det->deal_max_limit) {
					  $i++;
			   ?>
                  <a href="#">
                     <div class="item">
                        <div class="imgTitle">
                        	 @php  $product_image     = $product_image[0];
             
            $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
            $img_data   = "public/assets/deals/".$product_image; @endphp
            
            @if(file_exists($img_data) && $product_image !='')   
            
           @php $prod_path = url('').'/public/assets/deals/' .$product_image;   @endphp                
            @else  
                @if(isset($DynamicNoImage['dealImg']))
                @php    $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['dealImg']; @endphp
                   @if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path))
                     @php   $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
                @endif
            @endif 
                           @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')  
                            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                    <img  src="{{ $prod_path }}" alt="{{ $alt_text }}" />
                    </a>
                             @endif
                                @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
                                    <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}">
                    <img  src="{{ $prod_path }}" alt="{{ $alt_text }}" />
                    </a>
                                    @endif
                                        @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '')  
                                            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}">
                    <img  src="{{ $prod_path }}" alt="{{ $alt_text }}" />
                    </a>
                                            @endif
                                                @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
                                                    <a href="{!! url('dealview').'/'.$mcat.'/'.$res!!}">
                    <img  src="{{ $prod_path }}" alt="{{ $alt_text }}" />
                    </a>
                                                    @endif
                        </div>
                        <p><?php
					if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
						$deal_title = 'deal_title';
					}else {  $deal_title = 'deal_title_'.Session::get('lang_code'); }						
						echo substr ($product_det->$deal_title,0,20);?></p>
                        <h5>{{ Helper::cur_sym() }} <?php 
						echo $product_det->deal_discount_price;?></h5>
                     </div>
                  </a>
<?php   } //if
				} //foreach ?> 


               </div>
			   <?php 
			   if($i==0){ echo "No Related Products Available."; 
			   }else{ ?>
			      <?php if(count($get_related_product)>4) { ?> 
               <div class="MS-controls">
                  <button class="MS-left"><i class="icon-chevron-left" aria-hidden="true"></i></button>
                  <button class="MS-right"><i class="icon-chevron-right" aria-hidden="true"></i></button>
               </div>
                <?php } ?>
			    <?php }//else ?>
            </div>
         </div>
	<?php } //if count ?>
	<?php if(Session::has('customerid')){ ?>
<div class="your-review" id="review-comment">
   <h5 class="pro-description-title"><?php if (Lang::has(Session::get('lang_file').'.WRITE_A_POST_COMMENTS')!= '') { echo  trans(Session::get('lang_file').'.WRITE_A_POST_COMMENTS');}  else { echo trans($OUR_LANGUAGE.'.WRITE_A_POST_COMMENTS');} ?></h5>
   {!! Form::open(array('url'=>'dealcomments','class'=>'form-horizontal loginFrm')) !!}
		
		<input type="hidden" name="customer_id" value="<?php echo Session::get('customerid');?>">
        <input type="hidden" name="deal_id" value="{!!$pro_details_by_id->deal_id!!}">

		<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
		
   <div class="product-rate">
   <label class="control-label review_ratings_label" for="review_ratings" style="text-align: left;"><h4><?php if (Lang::has(Session::get('lang_file').'.RATE_THIS_PRODUCT')!= '') { echo  trans(Session::get('lang_file').'.RATE_THIS_PRODUCT');}  else { echo trans($OUR_LANGUAGE.'.RATE_THIS_PRODUCT');} ?></h4></label>
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
   <label class="control-label review_ratings_label" for="review_ratings" style="text-align: left;"><h4><?php if (Lang::has(Session::get('lang_file').'.REVIEW_THIS_PRODUCT')!= '') { echo  trans(Session::get('lang_file').'.REVIEW_THIS_PRODUCT');}  else { echo trans($OUR_LANGUAGE.'.REVIEW_THIS_PRODUCT');} ?></h4></label>
<div class="review-page-title">
  <input type="text" name="title" value="" placeholder="<?php if (Lang::has(Session::get('lang_file').'.REVIEW_TITLE')!= '') { echo  trans(Session::get('lang_file').'.REVIEW_TITLE');}  else { echo trans($OUR_LANGUAGE.'.REVIEW_TITLE');} ?>" required>
  <textarea name="comments" placeholder="<?php if (Lang::has(Session::get('lang_file').'.REVIEW_DESCRIPTION')!= '') { echo  trans(Session::get('lang_file').'.REVIEW_DESCRIPTION');}  else { echo trans($OUR_LANGUAGE.'.REVIEW_DESCRIPTION');} ?>" required></textarea>
  <button type="submit" class="btn-success"><?php if (Lang::has(Session::get('lang_file').'.SUBMIT_REVIEW')!= '') { echo  trans(Session::get('lang_file').'.SUBMIT_REVIEW');}  else { echo trans($OUR_LANGUAGE.'.SUBMIT_REVIEW');} ?></button>
</div>

</div>
</form>
</div>
<?php } ?>
 </div>


   


      <script src="<?php echo url(''); ?>/themes/js/multislider.js"></script>
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


			{!! $footer !!}
		</body>
	</html>
