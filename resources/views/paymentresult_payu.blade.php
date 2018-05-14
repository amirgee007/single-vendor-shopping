<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
     <?php
	
	if($get_meta_details){
	 foreach($get_meta_details as $meta_details) { } 
	 
	$mtitle= $meta_details->gs_metatitle;
	 $mdetails=$meta_details->gs_metadesc;
	 $mkey=$meta_details->gs_metakeywords;
	}
	else
	{
		$mtitle="";
	 $mdetails="";
	 $mkey="";
		
	}
	 ?>
     <title><?php echo $mtitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $mdetails; ?>">
    <meta name="keywords" content="<?php echo $mkey;  ?>">
    <meta name="author" content="">
	 <?php /* <link href="<?php echo url('');?>/plug-k/demo/css/bootstrap.css" rel="stylesheet">*/ ?>
    <link href="<?php echo url('');?>/plug-k/demo/css/demo.css" rel="stylesheet">
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo url('');?>/themes/bootshop/bootstrap.min.css" media="screen"/>
    <?php foreach($general as $gs) {} if($gs->gs_themes == 'blue') { ?>
    <link href="<?php echo url(''); ?>/themes/css/base.css" rel="stylesheet" media="screen"/>
    <?php } elseif($gs->gs_themes == 'green') { ?>
    <link href="<?php echo url(''); ?>/themes/css/green-theme.css" rel="stylesheet" media="screen"/>
    <?php } ?>
<!-- Bootstrap style responsive-->	
	<link href="<?php echo url('');?>/themes/css/planing.css" rel="stylesheet"/>
	<link href="<?php echo url('');?>/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?php echo url('');?>/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?php echo url('');?>/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
<?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url('');?>/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo url('');?>/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo url('');?>/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo url('');?>/themes/images/ico/apple-touch-icon-57-precomposed.png">
    <link href="<?php echo url(''); ?>/themes/css/leftmenu.css" rel="stylesheet" media="screen"/>
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div class="se-pre-con"></div>
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
	<div class="span3" id="sidebar">
		<div class="side-menu-head"><strong><?php if (Lang::has(Session::get('lang_file').'.CATEGORIES')!= '') { echo  trans(Session::get('lang_file').'.CATEGORIES');}  else { echo trans($OUR_LANGUAGE.'.CATEGORIES');} ?> </strong></div>
				<ul id="css3menu1" class="topmenu">
<input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>
<?php foreach($main_category as $fetch_main_cat) { $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; ?>

<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1); ?>"><?php 
if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
	$mc_name = 'mc_name';
}else {  $mc_name = 'mc_name_'.Session::get('lang_code'); }
echo $fetch_main_cat->$mc_name; ?> </a>
<?php if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0) { ?>
	<ul>    
    <?php foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)  { $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>
    <?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0) { ?>
			 <li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"><?php 
			if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
				$smc_name = 'smc_name';
			}else {  $smc_name = 'smc_name_'.Session::get('lang_code'); }
			 echo $fetch_sub_main_cat->$smc_name ; ?></a>
		
		<ul>
                <?php  foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat) { $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id;?>                  <?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0) { ?>
					<li class="subsecond"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>"><?php 
					if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
						$sb_name = 'sb_name';
					}else {  $sb_name = 'sb_name_'.Session::get('lang_code'); }
					echo  $fetch_sub_cat->$sb_name; ?></a>
                   
                    <ul>
                    <?php  foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat) { $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?>                        
                        <li class="subthird"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>"><?php 
					if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
						$ssb_name = 'ssb_name';
					}else {  $ssb_name = 'ssb_name_'.Session::get('lang_code'); }
						echo $fetch_secsub_cat->$ssb_name ?></a></li>                                        
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
</ul><br/>
		  <div class="clearfix"></div>
		<br/>
         <div class="side-menu-head"><strong><?php if (Lang::has(Session::get('lang_file').'.MOST_VISITED_PRODUCTS')!= '') { echo  trans(Session::get('lang_file').'.MOST_VISITED_PRODUCTS');}  else { echo trans($OUR_LANGUAGE.'.MOST_VISITED_PRODUCTS');} ?></strong></div>
          <?php foreach($most_visited_product as $fetch_most_visit_pro) {
			 // if($fetch_most_visit_pro->pro_no_of_purchase < $fetch_most_visit_pro->pro_qty){
			   $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;
			 $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);
			 $mostproduct_img = explode('/**/', $fetch_most_visit_pro->pro_Img);
			  ?>
          <div class="thumbnail">
		<?php  $product_image     = $mostproduct_img[0];
                /* Image Path */
                $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
                $img_data   = "public/assets/product/".$product_image;
                if($mostproduct_img !=''){
                if(file_exists($img_data) && $product_image !='')   //product image is not null and exists in folder
					{
                
                $prod_path = url('').'/public/assets/product/' .$product_image;                  
                }else{  
                    if(isset($DynamicNoImage['productImg'])){
                        $dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['productImg'];
                        if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))    //no image for product is not null and exists in folder
                            $prod_path = url('').'/'.$dyanamicNoImg_path;
                    }
                } 
				}
				else{  
                    if(isset($DynamicNoImage['productImg'])){
                        $dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['productImg'];
                        if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))    //no image for product is not null and exists in folder
                            $prod_path = url('').'/'.$dyanamicNoImg_path;
                    }
                } ?>
			<img  src="<?php echo $prod_path; ?>" alt="<?php echo $fetch_most_visit_pro->pro_title; ?>"/>
			<div class="caption product_show">
				<h4 class="top_text dolor_text">{{ Helper::cur_sym() }}<?php echo $fetch_most_visit_pro->pro_disprice;  ?></h4>
					  <h5 class="prev_text"><?php echo substr($fetch_most_visit_pro->pro_title,0,50);  ?>...</h5>
					 <h4>
					 <?php if($fetch_most_visit_pro->pro_no_of_purchase >= $fetch_most_visit_pro->pro_qty) { ?>
                      <h4 style="text-align:center;"><a  class="btn btn-danger"><?php if (Lang::has(Session::get('lang_file').'.SOLD')!= '') { echo  trans(Session::get('lang_file').'.SOLD');}  else { echo trans($OUR_LANGUAGE.'.SOLD');} ?></a> </h4>
                      <?php }
					  else { ?>
									<?php $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
							 $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
							 $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
							 $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
							  $res = base64_encode($fetch_most_visit_pro->pro_id);
							  ?>						
								<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
									<a href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') { echo  trans(Session::get('lang_file').'.ADD_TO_CART');}  else { echo trans($OUR_LANGUAGE.'.ADD_TO_CART');} ?></span></button></a>
														<?php } ?>
								  <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
								  <a href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') { echo  trans(Session::get('lang_file').'.ADD_TO_CART');}  else { echo trans($OUR_LANGUAGE.'.ADD_TO_CART');} ?></span></button></a>
								  <?php } ?>
								  <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
								  <a href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$res); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') { echo  trans(Session::get('lang_file').'.ADD_TO_CART');}  else { echo trans($OUR_LANGUAGE.'.ADD_TO_CART');} ?></span></button></a>
								  <?php } ?>
								  <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') { ?>
								  <a href="<?php echo url('productview/'.$mcat.'/'.$res); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') { echo  trans(Session::get('lang_file').'.ADD_TO_CART');}  else { echo trans($OUR_LANGUAGE.'.ADD_TO_CART');} ?></span></button></a>
								  <?php }
						 }			  ?>
					 </h4>
					</div>
		  </div><br/>
			<?php //}
			}?>
			
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?php echo url('');?>"><?php if (Lang::has(Session::get('lang_file').'.HOME')!= '') { echo  trans(Session::get('lang_file').'.HOME');}  else { echo trans($OUR_LANGUAGE.'.HOME');} ?></a> <span class="divider">/</span></li>
		<li class="active"><?php if (Lang::has(Session::get('lang_file').'.PAYMENT_RESULT')!= '') { echo  trans(Session::get('lang_file').'.PAYMENT_RESULT');}  else { echo trans($OUR_LANGUAGE.'.PAYMENT_RESULT');} ?> </li>
    </ul>
	<div class="span4" style="margin:0px">
    @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
    @if (Session::has('result'))
    <h4>  <?php if (Lang::has(Session::get('lang_file').'.YOUR_PAYMENT_PROCESS_SUCCESSFULLY_COMPLETED')!= '') { echo  trans(Session::get('lang_file').'.YOUR_PAYMENT_PROCESS_SUCCESSFULLY_COMPLETED');}  else { echo trans($OUR_LANGUAGE.'.YOUR_PAYMENT_PROCESS_SUCCESSFULLY_COMPLETED');} ?> ..<?php if (Lang::has(Session::get('lang_file').'.PLEASE_NOTE_THE_TRANSACTION_DETAILS')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_NOTE_THE_TRANSACTION_DETAILS');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_NOTE_THE_TRANSACTION_DETAILS');} ?></h4>	
    @endif
       @if (Session::has('fail'))
    <h4>  <?php if (Lang::has(Session::get('lang_file').'.YOUR_PAYMENT_PROCESS_FAILED')!= '') { echo  trans(Session::get('lang_file').'.YOUR_PAYMENT_PROCESS_FAILED');}  else { echo trans($OUR_LANGUAGE.'.YOUR_PAYMENT_PROCESS_FAILED');} ?>..</h4>	
    @endif
	 @if (Session::has('error'))
    <h4>  <?php if (Lang::has(Session::get('lang_file').'.YOUR_PAYMENT_PROCESS_HAS_BEEN_STOPPED_DUE_TO_SOME_ERROR')!= '') { echo  trans(Session::get('lang_file').'.YOUR_PAYMENT_PROCESS_HAS_BEEN_STOPPED_DUE_TO_SOME_ERROR');}  else { echo trans($OUR_LANGUAGE.'.YOUR_PAYMENT_PROCESS_HAS_BEEN_STOPPED_DUE_TO_SOME_ERROR');} ?>...</h4>	
    @endif
    
    </div>
    
    <div class="clearfix"></div>
	<hr class="soft"/>
		 <h5> <?php if (Lang::has(Session::get('lang_file').'.TRANSACTION_DETAILS')!= '') { echo  trans(Session::get('lang_file').'.TRANSACTION_DETAILS');}  else { echo trans($OUR_LANGUAGE.'.TRANSACTION_DETAILS');} ?></h5>	
			<h6><?php if (Lang::has(Session::get('lang_file').'.THANK_YOU_FOR_SHOPPING_WITH')!= '') { echo  trans(Session::get('lang_file').'.THANK_YOU_FOR_SHOPPING_WITH');}  else { echo trans($OUR_LANGUAGE.'.THANK_YOU_FOR_SHOPPING_WITH');} ?> <?php echo $SITENAME; ?>.</h6>
			<div class="table-responsive">
	<table class="table table-bordered">
              <thead>
                <tr>
                <th><?php if (Lang::has(Session::get('lang_file').'.PAYER_NAME')!= '') { echo  trans(Session::get('lang_file').'.PAYER_NAME');}  else { echo trans($OUR_LANGUAGE.'.PAYER_NAME');} ?></th>
                  <th><?php if (Lang::has(Session::get('lang_file').'.TRANSACTIONID')!= '') { echo  trans(Session::get('lang_file').'.TRANSACTIONID');}  else { echo trans($OUR_LANGUAGE.'.TRANSACTIONID');} ?></th>
                  <th><?php if (Lang::has(Session::get('lang_file').'.TOKENID')!= '') { echo  trans(Session::get('lang_file').'.TOKENID');}  else { echo trans($OUR_LANGUAGE.'.TOKENID');} ?></th>
                  <th><?php if (Lang::has(Session::get('lang_file').'.PAYER_EMAIL')!= '') { echo  trans(Session::get('lang_file').'.PAYER_EMAIL');}  else { echo trans($OUR_LANGUAGE.'.PAYER_EMAIL');} ?></th>
                  <th><?php if (Lang::has(Session::get('lang_file').'.PAYER_ID')!= '') { echo  trans(Session::get('lang_file').'.PAYER_ID');}  else { echo trans($OUR_LANGUAGE.'.PAYER_ID');} ?></th>
                  <th><?php if (Lang::has(Session::get('lang_file').'.ACKNOWLEDGEMENT')!= '') { echo  trans(Session::get('lang_file').'.ACKNOWLEDGEMENT');}  else { echo trans($OUR_LANGUAGE.'.ACKNOWLEDGEMENT');} ?></th>
                   <th><?php if (Lang::has(Session::get('lang_file').'.PAYERSTATUS')!= '') { echo  trans(Session::get('lang_file').'.PAYERSTATUS');}  else { echo trans($OUR_LANGUAGE.'.PAYERSTATUS');} ?></th>
				</tr>
              </thead>
              <tbody>
           
			 <?php  $coupon = 0;
                    $shipping_amt = 0;
                    $get_subtotal  =0;
                    $get_tax = 0;
			  if($orderdetails){ 
				foreach($orderdetails as $orderdet) {
				   $coupon+= $orderdet->coupon_amount;
                   $shipping_amt+= $orderdet->order_shipping_amt;    //shipping amount getting from order table
                   $get_subtotal+= $orderdet->order_amt;
                   $get_tax+=$orderdet->order_tax;
             ?>
             <tr>
                  <td><?php echo $orderdet->payer_name;?></td>
                  <td><?php echo $orderdet->transaction_id;?> </td>
                  <td><?php echo $orderdet->token_id;?></td>
                  <td><?php echo $orderdet->payer_email;?></td>
                  <td><?php echo $orderdet->payer_id;?></td>
                  <td><?php echo $orderdet->payment_ack; ?></td>
                  <td><?php echo $orderdet->payer_status; ?></td>
             </tr>
		  <?php  } }?>
				</tbody>
            </table></div>
		
        
        
        
  <h5> <?php if (Lang::has(Session::get('lang_file').'.PRODUCT_DETAILS_FOR_CURRENT_TRANSACTION')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_DETAILS_FOR_CURRENT_TRANSACTION');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_DETAILS_FOR_CURRENT_TRANSACTION');} ?> </h5>	
                <div class="table-responsive">
           <table class="table table-bordered">
              <thead>
                <tr>
                <th><?php if (Lang::has(Session::get('lang_file').'.PRODUCT_DEAL_NAME')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_DEAL_NAME');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_DEAL_NAME');} ?></th>
                  <th><?php if (Lang::has(Session::get('lang_file').'.PRODUCT_DEAL_QUANTITY')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_DEAL_QUANTITY');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_DEAL_QUANTITY');} ?></th>
                  <th><?php if (Lang::has(Session::get('lang_file').'.AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.AMOUNT');} ?></th>
                
				</tr>
              </thead>
              <tbody>

				<?php   
                $taxamount =0;
                $wallet = 0;
                $trans_id='';
                if($orderdetails){ 
					foreach($orderdetails as $orderdet) 
					{
						$trans_id = $orderdet->transaction_id;
					
						/*if($orderdet->order_type == 1 || $orderdet->order_type == 2){
						
						$taxamount+=($orderdet->order_amt*$orderdet->order_tax)/100;
						$taxamount_au = ($orderdet->order_amt*$orderdet->order_tax)/100;
					}else{
						
						$taxamount_au=0;
					} */


            $taxamount    += $orderdet->order_taxAmt;
            $taxamount_au = $orderdet->order_taxAmt;

          ?>
				
				 <tr>
               	  <td><?php 
				  if($orderdet->order_type == 1){ 
					if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
						$pro_title = 'pro_title';
					}else {  $pro_title = 'pro_title_'.Session::get('lang_code'); }
					echo $orderdet->$pro_title; 
				  } else { 
					if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
						$deal_title = 'deal_title';
					}else {  $deal_title = 'deal_title_'.Session::get('lang_code'); }
					echo $orderdet->$deal_title;}?></td>
                  <td><?php echo $orderdet->order_qty;?> </td>
                  <td>{{ Helper::cur_sym() }} <?php echo $orderdet->order_amt + $taxamount_au;?><?php  $orderdet->order_amt + $taxamount;?> (<?php if (Lang::has(Session::get('lang_file').'.INCLUDING')!= '') { echo  trans(Session::get('lang_file').'.INCLUDING');}  else { echo trans($OUR_LANGUAGE.'.INCLUDING');} ?>
                   <?php  $orderdet->order_amt;?> <?php echo $orderdet->order_tax;?> % 
                   <?php  $orderdet->order_amt + $taxamount;?> 
                   (<?php if (Lang::has(Session::get('lang_file').'.TAXES')!= '') { echo  trans(Session::get('lang_file').'.TAXES');}  else { echo trans($OUR_LANGUAGE.'.TAXES');} ?>))</td>
      			 </tr>
				<?php }
				} ?>
                <?php if($coupon!=0){?>
                    <tr>
                        <td>&nbsp;</td> 
                        <td>Coupon value </td>
                        <td> - {{ Helper::cur_sym() }} <?php echo $coupon; ?></td>
                    </tr>    
                <?php } ?> 

                <tr>                  
                        <td>&nbsp;</td>                  
                        <td style="font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.SUB-TOTAL')!= '') { echo  trans(Session::get('lang_file').'.SUB-TOTAL');}  else { echo trans($OUR_LANGUAGE.'.SUB-TOTAL');} ?></td>                  
                        <td style="font-weight:bold;"> <?php $subtotal = ($get_subtotal+$taxamount)-$coupon;  ?> {{ Helper::cur_sym() }} {{ round($subtotal,2) }} </td>             
                    </tr>
                <tr>                  
                    <td>&nbsp;</td>                  
                    <td style="font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.SHIPPING_TOTAL')!= '') { echo  trans(Session::get('lang_file').'.SHIPPING_TOTAL');}  else { echo trans($OUR_LANGUAGE.'.SHIPPING_TOTAL');} ?></td>                  
                    <td style="font-weight:bold;">{{ Helper::cur_sym() }} <?php  echo $shipping_amt; ?></td>             
                </tr>      

                <?php 
                    $trans_wallet = DB::table('nm_ordercod_wallet')->where('cod_transaction_id','=',$trans_id)->value('wallet_used');
                    $wallet = $trans_wallet;
                    if(count($wallet)!=0){
                        $get_subtotal = $get_subtotal - $wallet;
                ?>
                    <tr>
                        <td>&nbsp;</td> 
                        <td>Wallet Used </td>
                        <td> - {{ Helper::cur_sym() }} <?php echo $wallet; ?></td>
                    </tr>
                    <?php }else $wallet = 0; ?>          	 
                    
                    <?php /*
                    <tr>               	  
                        <td>&nbsp;</td> 
                        <td style="font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.TAX')!= '') { echo  trans(Session::get('lang_file').'.TAX');}  else { echo trans($OUR_LANGUAGE.'.TAX');} ?></td>                  
                        <td style="font-weight:bold;"> <?php  echo $get_tax;?> %</td>      			
                    </tr>*/?>
                    
                    
                    <tr>               	  
                        <td>&nbsp;</td>                  
                        <td style="font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.TOTAL')!= '') { echo  trans(Session::get('lang_file').'.TOTAL');}  else { echo trans($OUR_LANGUAGE.'.TOTAL');} ?></td>                  
                        <td style="font-weight:bold;">{{ Helper::cur_sym() }} <?php $total = ($subtotal + $shipping_amt) -$wallet;  echo round($total,2);//number_format((float)$total, 2, '.', '');  ?></td>      			
                    </tr>
                	</tbody>
            </table></div>
         
	<h4>		
	 <a href="<?php echo url('index'); ?>" class="btn btn-large pull-right me_btn res-cont1"><span style="font-weight:normal;" ><?php if (Lang::has(Session::get('lang_file').'.CONTINUE_SHOPPING')!= '') { echo  trans(Session::get('lang_file').'.CONTINUE_SHOPPING');}  else { echo trans($OUR_LANGUAGE.'.CONTINUE_SHOPPING');} ?></span> <i class="icon-arrow-right"></i>  </a> 	
	</h4>
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	
    	{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
		<script src="<?php echo url('');?>/themes/js/jquery.js" type="text/javascript"></script>
   <?php /* <script src="<?php echo url('');?>/themes/js/bootstrap.min.js" type="text/javascript"></script>*/ ?>
	<script src="<?php echo url('');?>/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo url('');?>/themes/js/bootshop.js"></script>
    <script src="<?php echo url('');?>/themes/js/jquery.lightbox-0.5.js"></script> 
    
    <script src="<?php echo url('');?>/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script>
    <script src="<?php echo url('');?>/plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>
    <script src="<?php echo url('');?>/plug-k/demo/js/demo.js" type="text/javascript"></script>
	

<script type="text/javascript" src="<?php echo url('');?>/themes/js/jquery-1.5.2.min.js"></script>
	<script type="text/javascript" src="<?php echo url('');?>/themes/js/scriptbreaker-multiple-accordion-1.js"></script>
    <script language="JavaScript">
    
    $(document).ready(function() {
        $(".topnav").accordion({
            accordion:true,
            speed: 500,
            closedSign: '<span class="icon-chevron-right"></span>',
            openedSign: '<span class="icon-chevron-down"></span>'
        });
    });
    
    </script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
</body>
</html>