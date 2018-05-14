<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
 xmlns:v="urn:schemas-microsoft-com:vml"
 xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="format-detection" content="date=no" />
  <meta name="format-detection" content="address=no" />
  <meta name="format-detection" content="telephone=no" />
  <title><?php echo $SITENAME;?></title>
  
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <style type="text/css" media="screen">

    /* Linked Styles */
    body { padding:0 !important; margin:0 !important; display:block !important; background:#fff; -webkit-text-size-adjust:none }
    a { color:#a88123; text-decoration:none }
    p { padding:0 !important; margin:0 !important;font-family: Montserrat } 

    /* Mobile styles */
    @media only screen and (max-device-width: 480px), only screen and (max-width: 680px) { 
      div[class='mobile-br-5'] { height: 5px !important; }
      div[class='mobile-br-10'] { height: 10px !important; }
      div[class='mobile-br-15'] { height: 15px !important; }
      div[class='mobile-br-20'] { height: 20px !important; }
      div[class='mobile-br-25'] { height: 25px !important; }
      div[class='mobile-br-30'] { height: 30px !important; }
td[class='hide']{
  display: none !important;
}

      th[class='m-td'], 
      td[class='m-td'], 
      div[class='hide-for-mobile'], 
      span[class='hide-for-mobile'] { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }

      span[class='mobile-block'] { display: block !important; }

      div[class='wgmail'] img { min-width: 320px !important; width: 320px !important; }

      div[class='img-m-center'] { text-align: center !important; }

      div[class='fluid-img'] img,
      td[class='fluid-img'] img { width: 100% !important; max-width: 100% !important; height: auto !important; }

      table[class='mobile-shell'] { width: 100% !important; min-width: 100% !important; }
      td[class='td'] { width: 100% !important; min-width: 100% !important; }
      
      table[class='center'] { margin: 0 auto; }
      
      td[class='column-top'],
      th[class='column-top'],
      td[class='column'],
      th[class='column'] { float: left !important; width: 100% !important; display: block !important; }

      td[class='content-spacing'] { width: 15px !important; }

      div[class='h2'] { font-size: 44px !important; line-height: 48px !important; }

    } 
@media only screen and (max-device-width:480px), only screen and (max-width: 640px) { 
  .hide{
    display: none !important;
  }
}
  </style>
</head>
<body class="body" style="padding:0 !important; margin:0 !important; display:block !important; background:#fff; -webkit-text-size-adjust:none">
<?php $customer_info = DB::table('nm_order')->where('transaction_id', '=', $transaction_id)
        ->LeftJoin('nm_customer', 'nm_customer.cus_id', '=', 'nm_order.order_cus_id')
        ->get(); 
       // print_r($customer_info);
        //exit();
foreach($customer_info as $ci) { } ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
    <tr>
      <td align="center" valign="top">
        <!-- Top -->
        
        <!-- END Top -->

        <table width="600" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
          <tr>
            <td class="td" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; margin:0; border:1px solid #cccccc;" width="600">
              <!-- Header -->
              
              <!-- END Header -->

              <!-- Main -->
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: separate;border-left-style: solid;
    border-top-left-radius: 10px; 
    border-bottom-left-radius: 10px;">
                <tr>
                  <td>
                    <!-- Head -->
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#f5f5f5;">
                      <tr>
                        <td>
                          
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="3" bgcolor=""></td>
                              <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="10"></td>
                              <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="15" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

                                <div class="h3-2-center" style="color:#1e1e1e; font-family:Montserrat; min-width:auto !important; font-size:20px; line-height:26px; text-align:center; letter-spacing:5px">
                                   <?php 
                                      $logo = url('').'/public/assets/default_image/Logo.png'; 
                                      $logo = $SITE_LOGO;
                                      if(file_exists($SITE_LOGO))
                                        $logo = $SITE_LOGO;
                                      ?> 
                                  <img class="img-responsive" src="<?php echo $logo;?>"></div>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="5" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>
                                <div class="h2" style="color:#ffffff; font-family:Georgia, serif; min-width:auto !important; font-size:60px; line-height:64px; text-align:center">
                                  
                                </div>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

                              </td>
                              <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="10"></td>
                              <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="3" bgcolor=""></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                    <!-- END Head -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#fff;border-left: 3px solid #BF463D;border-right: 3px solid #BF463D;">
                      <tr>
                        <td>
                          
                          
                        </td>
                      </tr>
                    </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#fff;border-left: 3px solid #BF463D;border-right: 3px solid #BF463D;" class="hide">
                      <tr>
                        <td>
                          
                        
                        </td>
                      </tr>
                    </table>
                    <!-- Body -->
                    
                    

                    <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;"> <tbody><tr> <td align="left" valign="top" style="color:#2c2c2c;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;background-color:#f9f9f9;padding:20px" bgcolor="#F9F9F9"> <p style="padding:0;margin:0;font-size:16px;font-weight:bold;font-size:13px"> Hi <?php echo $ci->cus_name; ?>, </p><br> <p style="padding:0;margin:0;color:#565656;font-size:13px"> Thank you for your order!</p><br> <p style="padding:0;margin:0;color:#565656;line-height:22px;font-size:13px">  
 <?php if (Lang::has(Session::get('lang_file').'.WE_WILL_SEND_YOU_ANOTHER_EMAIL_ONCE_THE_ITEMS_IN_YOUR_ORDER_HAVE_BEEN_SHIPPED')!= '') { echo  trans(Session::get('lang_file').'.WE_WILL_SEND_YOU_ANOTHER_EMAIL_ONCE_THE_ITEMS_IN_YOUR_ORDER_HAVE_BEEN_SHIPPED');}  else { echo trans($OUR_LANGUAGE.'.WE_WILL_SEND_YOU_ANOTHER_EMAIL_ONCE_THE_ITEMS_IN_YOUR_ORDER_HAVE_BEEN_SHIPPED');} ?>.  
 <?php if (Lang::has(Session::get('lang_file').'.MEANWHILE_YOU_CAN_CHECK_THE_STATUS_OF_YOUR_ORDER_ON')!= '') { echo  trans(Session::get('lang_file').'.MEANWHILE_YOU_CAN_CHECK_THE_STATUS_OF_YOUR_ORDER_ON');}  else { echo trans($OUR_LANGUAGE.'.MEANWHILE_YOU_CAN_CHECK_THE_STATUS_OF_YOUR_ORDER_ON');} ?>  
 <a alt="Flipkart.com" style="text-decoration:none" href="<?php echo url(''); ?>" target="_blank"><span style="color:#666;font-size:13px"><?php echo $SITENAME;?></span></a></p><br><p style="text-align:center;padding:0;margin:0;line-height:22px;font-size:13px" align="center"> 
 <?php if (Lang::has(Session::get('lang_file').'.YOUR_TRANSACTION_ID')!= '') { echo  trans(Session::get('lang_file').'.YOUR_TRANSACTION_ID');}  else { echo trans($OUR_LANGUAGE.'.YOUR_TRANSACTION_ID');} ?>   <?php echo $ci->transaction_id; ?></p><br> <p style="text-align:center;padding:0;margin:0" align="center"> <a style="width:200px;margin:0px auto;background-color: #FF9800;
    text-align: center;
    padding:8px 0;text-decoration:none;border-radius:2px;display:block;color:#fff;font-size:13px" href="" align="center" target="_blank"> <span style="color:#ffffff;font-size:13px;"><?php if (Lang::has(Session::get('lang_file').'.VIEW_YOUR_ORDER')!= '') { echo  trans(Session::get('lang_file').'.VIEW_YOUR_ORDER');}  else { echo trans($OUR_LANGUAGE.'.VIEW_YOUR_ORDER');} ?></span> </a> </p> </td> </tr> </tbody></table>
				<!-- start product detail table -->
			<table width="100%" cellspacing="0" cellpadding="0" style="line-height:1.5"> <!--max-width:600px;-->
				<tbody>
					<tr> 
						<td width="8%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.S_NO')!= '') { echo  trans(Session::get('lang_file').'.S_NO');}  else { echo trans($OUR_LANGUAGE.'.S_NO');} ?></p> </td>
						
						<td width="20%" align="center" valign="top" style="padding:12px 15px 0 10px;margin:0;vertical-align:top;"> <p style="padding:0;margin:0"> <a style="text-decoration:none;color:#000" href="" target="_blank"><p style="padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.ITEM_NAME')!= '') { echo  trans(Session::get('lang_file').'.ITEM_NAME');}  else { echo trans($OUR_LANGUAGE.'.ITEM_NAME');} ?></p></a></p> 
						</td> 
						
						<td width="12%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.ACTUAL_PRICE')!= '') { echo  trans(Session::get('lang_file').'.ACTUAL_PRICE');}  else { echo trans($OUR_LANGUAGE.'.ACTUAL_PRICE');} ?> / 1 <?php if (Lang::has(Session::get('lang_file').'.QTY')!= '') { echo  trans(Session::get('lang_file').'.QTY');}  else { echo trans($OUR_LANGUAGE.'.QTY');} ?></p> </td>
						
						<td width="12%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.QTY')!= '') { echo  trans(Session::get('lang_file').'.QTY');}  else { echo trans($OUR_LANGUAGE.'.QTY');} ?></p> </td>

						<td width="12%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.DISCOUNT_PRICE')!= '') { echo  trans(Session::get('lang_file').'.DISCOUNT_PRICE');}  else { echo trans($OUR_LANGUAGE.'.DISCOUNT_PRICE');} ?></p> </td>
						
						<td width="12%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.TAX')!= '') { echo  trans(Session::get('lang_file').'.TAX');}  else { echo trans($OUR_LANGUAGE.'.TAX');} ?></p> </td>
						
						<td width="11%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.SHIP_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.SHIP_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.SHIP_AMOUNT');} ?></p>  </td> 

						<?php //$total = ($item_price + $tax) + $ship_amount; ?>

						<td width="13%" valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center"> <p style="padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.SUBTOTAL')!= '') { echo  trans(Session::get('lang_file').'.SUBTOTAL');}  else { echo trans($OUR_LANGUAGE.'.SUBTOTAL');} ?> </p>  </td>
				
					</tr> 

					<?php 
					/* Find language code */
					$langCode ='en';
					if(Session::has('lang_file') != 1)  //if session not set means getting default language from db in if condition
					{
						$lang_fileName = Session::get('lang_file');

						$fileNameSplited = explode('_', $lang_fileName);

						if($fileNameSplited[0]!='')
							$langCode = $fileNameSplited[0];
					}

					$i = 1;
					$value = DB::table('nm_order')->where('transaction_id', '=', $transaction_id)
												->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_order.order_pro_id')
												->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_order.order_pro_id')
												//->LeftJoin('nm_merchant', 'nm_merchant.mer_id', '=', 'nm_product.pro_mr_id')
												->get(); 
					foreach($value as $v) { 
					$delivery_date = '+'.$v->pro_delivery.'days';
					?>
						<tr>  
							<td valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="margin:0;padding:7px 0 0 0;color:#565656;font-size:13px"><?php echo $i; ?></p> </td>
							
							<td align="center" valign="top" style="padding:12px 10px 0 10px;margin:0;vertical-align:top;min-width:100px"> <p style="padding:0;margin:0"> <a style="text-decoration:none;color:#000" href="" target="_blank"><p style="color:#565656;font-size:13px"><?php if($v->order_type==1) {  if($langCode!='en') { $pro_title_dynamic = 'pro_title_'.$langCode;  $v->pro_title = $v->$pro_title_dynamic; }  echo $v->pro_title; } elseif($v->order_type==2) {  if($langCode!='en') { $deal_title_dynamic = 'deal_title_'.$langCode;  $v->deal_title = $v->$deal_title_dynamic; } echo $v->deal_title; } ?>&nbsp;<sup></sup></p></td>  
							
							<td valign="top" align="center" style="padding:12px 10px 0 5px;margin:0;text-align:center"> <p style="padding:7px 0 0 0;margin:0;color:#565656;font-size:13px"><?php echo $v->pro_disprice; ?></p> </td>
							
							<td valign="top" align="center" style="padding:12px 10px 0 5px;margin:0;text-align:center"> <p style="padding:7px 0 0 0;margin:0;color:#565656;font-size:13px"><?php echo $v->order_qty; ?></p> </td>
							
							<td valign="top" align="center" style="padding:12px 10px 0 5px;margin:0;text-align:center"> <p style="margin:0;padding:7px 0 0 0;color:#565656;font-size:13px"><?php echo $v->order_amt; ?></p> </td>
							
							<td valign="top" align="center" style="padding:12px 10px 0 5px;margin:0;text-align:center"> <p style="margin:0;padding:7px 0 0 0;color:#565656;font-size:13px"><?php echo $v->order_tax,'%'; ?></p> </td>
							
							<td valign="top" align="center" style="padding:12px 10px 0 5px;margin:0;text-align:center"> <p style="margin:0;padding:7px 0 0 0;color:#565656;font-size:13px"><?php if($v->order_type==1) { echo $v->pro_shippamt; } else { echo "0.00"; } ?></p> </td> 

							<?php 
							if(Session::has('coupon_code')){
								if(Session::get('coupon_type') == 'usercoupon')
								{
									$total = $v->order_amt + $v->pro_shippamt;
								}
								elseif(Session::get('coupon_type') == 'productcoupon')
								{
									//$total = $v->cod_amt + $v->cod_tax + $v->pro_shippamt;
									$total = $v->order_amt + $v->pro_shippamt;
								}
							}
							else{
								$total = $v->order_amt + $v->pro_shippamt;
							}
							?>

							<td width="33%" valign="top" align="center" style="padding:12px 20px 0 5px;margin:0;text-align:center"><p style="padding:7px 0 0 0;margin:0;color:#565656;font-size:13px"><?php echo $total; ?></p> </td>
						</tr> 

					<?php $i++; 
					}  ?>

					<tr>  
						<td valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="margin:0;padding:7px 0 0 0;color:#565656;font-size:13px">&nbsp;</p> </td>
						
						<td align="center" valign="top" style="padding:12px 10px 0 10px;margin:0;vertical-align:top;min-width:100px"><p style="padding:0;margin:0"> <a style="text-decoration:none;color:#000" href="" target="_blank"><p style="color:#565656;font-size:13px">&nbsp;&nbsp;<sup></sup></p></td> 
						
						<td valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="padding:7px 0 0 0;margin:0;color:#565656;font-size:13px; font-weight:bold;">Total</p> </td>

						<td valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="margin:0;padding:7px 0 0 0;color:#565656;font-size:13px; font-weight:bold;"></p> </td>
						
						<td valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="margin:0;padding:7px 0 0 0;color:#565656;font-size:13px; font-weight:bold;"><?php echo $Sub_total; ?></p> </td>
						
						<td valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="margin:0;padding:7px 0 0 0;color:#565656;font-size:13px; font-weight:bold;"></p> </td>
						
						<td valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="margin:0;padding:7px 0 0 0;color:#565656;font-size:13px; font-weight:bold;"><?php echo $Shipping_amount; ?></p> </td> 
						<?php 
						if(Session::has('coupon_code')){
							if(Session::get('coupon_type') == 'usercoupon')
							{
								if(Session::has('wallet_total_price')){
									if(Session::get('wallet_total_price') > 0){
										$total = (($Sub_total + $Shipping_amount)-Session::get('wallet_amount')); 
									}
									elseif(Session::get('wallet_total_price') <= 0){
										$total = 0;
									}
								}
								else{
									$total = ($Sub_total + $Shipping_amount);
								}

							}
							elseif(Session::get('coupon_type') == 'productcoupon')
							{
								if(Session::has('wallet_total_price')){
									if(Session::get('wallet_total_price') > 0){
										$total = (($Sub_total + $Shipping_amount)-Session::get('wallet_amount')); 
									}
									elseif(Session::get('wallet_total_price') <= 0){
										$total = 0;
									}
								}
								else{
									$total = ($Sub_total + $Shipping_amount);
								}
							}
						}
						else{

							if(Session::has('wallet_total_price')){
								if(Session::get('wallet_total_price') > 0){
									$total = (($Sub_total + $Shipping_amount)-Session::get('wallet_amount')); 
								}
								elseif(Session::get('wallet_total_price') <= 0){
									$total = 0;
								}
							}
							else{
								$total = ($Sub_total + $Shipping_amount);
							}

						}
						?>

						<td valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center"> <p style="padding:7px 0 0 0;margin:0;color:#565656;font-size:13px; font-weight:bold;"> <?php echo $total; ?></p> </td>
					</tr> 
				</tbody>
			</table>

<!-- end product details table -->
<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;line-height:2.5">
  <tbody>
  <tr>

  <?php if(Session::has('coupon_code')){ 
    if(Session::get('coupon_type') == 'usercoupon'){
  ?>
   <td width="33%" valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:7px 0 0 0;margin:0;color:#565656;font-size:13px; font-weight:bold;">  
   Coupon Value : <?php if(Session::get('coupon_amount_type') == 1){ echo '$'.Session::get('coupon_amount'); } elseif(Session::get('coupon_amount_type') == 2){ echo Session::get('coupon_amount').'%';}?>
    </p>
   </td>
   
  <?php }  elseif(Session::get('coupon_type') == 'productcoupon'){ ?>
   <td width="33%" valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:7px 0 0 0;margin:0;color:#565656;font-size:13px; font-weight:bold;">  
   Coupon Applied  <?php //if(Session::get('coupon_amount_type') == 1){ echo '$'.Session::get('coupon_amount'); } elseif(Session::get('coupon_amount_type') == 2){echo Session::get('coupon_amount').'%';}?>
   </p>
   </td>
  <?php } } ?>
</tr>
</tbody>
</table>
<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;line-height:2.5">
  <tbody>
  <tr>

  <?php if(Session::has('wallet_amount')){ 
  ?>
  
   <td width="33%" valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:7px 0 0 0;margin:0;color:#565656;font-size:13px; font-weight:bold;">  
   Wallet Applied 
   </p>
   </td>
  <?php  } ?>
</tr>
</tbody>
</table>
<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;line-height:2.5"> <tbody><tr> <td valign="top" align="center" style="background-color:#ffffff;display:block;margin:0 auto;clear:both;padding:5px 20px 0 20px" bgcolor="#ffffff"> <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin:0"> <tbody><tr> <td colspan="4" align="center" valign="top" style="padding:0 0 17px 0">  
     
      <p style="padding:4px 5px;background-color: #f7f7f7;
   
    color: #191919;margin:10px 0 0 0;text-align:center;font-size:12px">  
   Will be delivered on <span class="aBn" data-term="goog_231825889" tabindex="0"><span class="aQJ"><?php echo date('D d, M Y', strtotime($delivery_date));?></span></span>  
  </p>  
 </td> </tr> </tbody></table> </td> </tr> </tbody>
 </table>
                  <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;"> <tbody> <tr> <td valign="top" align="left" style="background-color:#ffffff;color:#565656;display:block;font-weight:300;margin:0;padding:0;clear:both" bgcolor="#ffffff"> <table width="100%" cellspacing="0" cellpadding="0"> <tbody><tr> <td valign="top" align="left" style="padding:20px 20px 0 20px;margin:0"> <p style="margin:0;padding:0;color:#565656;font-size:16px;line-height:28px;font-weight:bold">  
  <?php if (Lang::has(Session::get('lang_file').'.DELIVERY_ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.DELIVERY_ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.DELIVERY_ADDRESS');} ?>  
<?php
$allpas = explode(",",$ci->order_shipping_add);
$cus_name = $allpas[0];
$cus_addr1 = $allpas[1];
$cus_addr2 = $allpas[2];
$state = $allpas[3];
$zip = $allpas[4];
$cus_phone = $allpas[5];
$cus_mail = $allpas[6];

?>  
</p> <p style="padding:0;margin:15px 0 10px 0;font-size:14px;color:#333333;line-height:24px">  
<span style='font-weight: bold;'><?php if (Lang::has(Session::get('lang_file').'.NAME')!= '') { echo  trans(Session::get('lang_file').'.NAME');}  else { echo trans($OUR_LANGUAGE.'.NAME');} ?>:</span><span><?php echo $cus_name; ?></span><br>
<span style='font-weight: bold;'><?php if (Lang::has(Session::get('lang_file').'.ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.ADDRESS');} ?>:</span><span><?php echo $cus_addr1.$cus_addr2; ?></span><br>
<span style='font-weight: bold;'><?php if (Lang::has(Session::get('lang_file').'.STATE')!= '') { echo  trans(Session::get('lang_file').'.STATE');}  else { echo trans($OUR_LANGUAGE.'.STATE');} ?>:</span><span><?php echo $state; ?></span><br>
<span style='font-weight: bold;'><?php if (Lang::has(Session::get('lang_file').'.ZIP_CODE')!= '') { echo  trans(Session::get('lang_file').'.ZIP_CODE');}  else { echo trans($OUR_LANGUAGE.'.ZIP_CODE');} ?>:</span><span><?php echo $zip; ?></span><br>
<span style='font-weight: bold;'><?php if (Lang::has(Session::get('lang_file').'.PHONE')!= '') { echo  trans(Session::get('lang_file').'.PHONE');}  else { echo trans($OUR_LANGUAGE.'.PHONE');} ?>:</span><span><?php echo $cus_phone; ?></span><br>
<span style='font-weight: bold;'><?php if (Lang::has(Session::get('lang_file').'.EMAIL')!= '') { echo  trans(Session::get('lang_file').'.EMAIL');}  else { echo trans($OUR_LANGUAGE.'.EMAIL');} ?>:</span><span><?php echo $cus_mail; ?></span><br>
</p> <p style="line-height:18px;line-height:20px;padding:0;margin:0;color:#565656;font-size:13px;line-height:24pox">  

</p> </td><td>
  <center style="padding-right:15px"><p style="white-space:nowrap;padding:0;margin:0;color:#848484;font-size:15px;line-height:1.5"><?php if (Lang::has(Session::get('lang_file').'.ANY_QUESTIONS')!= '') { echo  trans(Session::get('lang_file').'.ANY_QUESTIONS');}  else { echo trans($OUR_LANGUAGE.'.ANY_QUESTIONS');} ?>?</p><br>
  <p style="white-space:nowrap;padding:0;margin:0;color:#848484;font-size:15px;line-height:1.5"><?php if (Lang::has(Session::get('lang_file').'.GET_IN_TOUCH_WITH_OUR_24X7_CUSTOMER_CARE_TEAM')!= '') { echo  trans(Session::get('lang_file').'.GET_IN_TOUCH_WITH_OUR_24X7_CUSTOMER_CARE_TEAM');}  else { echo trans($OUR_LANGUAGE.'.GET_IN_TOUCH_WITH_OUR_24X7_CUSTOMER_CARE_TEAM');} ?>.</p>|</center>
</td> 
</tr> </tbody></table> </td> 
</tr> </tbody> </table>
                    <!-- END Body -->

                    <!-- Foot -->
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="" style="background:#f5f5f5;">
  
                      <tr>
                        <td>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="3" bgcolor=""></td>
                              <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%;margin-top:20px;font-family:Montserrat"><tr><td height="0" class="spacer" style="font-size:11pt; line-height:1.5pt; text-align:center; width:100%; min-width:100%;color:#333333;">  &copy; <?php echo date('Y');?>&nbsp;<?php echo $SITENAME; ?></td></tr></table>


                                <!-- Socials -->
                              
                                <!-- END Socials -->
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="15" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

                              </td>
                              <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="3" bgcolor=""></td>
                            </tr>
                          </table>
                          
                        </td>
                      </tr>
                    </table>
                    <!-- END Foot -->
                  </td>
                </tr>
              </table>
              <!-- END Main -->
              
              <!-- Footer -->
              
              <!-- END Footer -->
            </td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>
</body>
</html>
