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
<?php $customer_info = DB::table('nm_ordercod')->where('cod_transaction_id', '=', $transaction_id)
        ->LeftJoin('nm_customer', 'nm_customer.cus_id', '=', 'nm_ordercod.cod_cus_id')
        ->get(); 
foreach($customer_info as $ci) { } ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
    <tr>
      <td align="center" valign="top">
        <!-- Top -->
        
        <!-- END Top -->

        <table width="600" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
          <tr>
            <td class="td" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; margin:0px; border:1px solid #cccccc;" width="600">
              <!-- Header -->
              
              <!-- END Header -->

              <!-- Main -->
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="
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
        $logo = url('').'/public/assets/default_image/Logo.png'; $logo = $SITE_LOGO;
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
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#fff;">
                      <tr>
                        <td>
                          
                          
                        </td>
                      </tr>
                    </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#fff;" class="hide">
                      <tr>
                        <td>
                          
                        
                        </td>
                      </tr>
                    </table>
                    <!-- Body -->
                    
                    

                    <table width="100%" cellspacing="0" cellpadding="0" style=""> <tbody><tr> <td align="left" valign="top" style="color:#2c2c2c;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;background-color:#f9f9f9;padding:20px" bgcolor="#F9F9F9"> <p style="padding:0;margin:0;font-size:16px;font-weight:bold;font-size:13px"> <?php if (Lang::has(Session::get('lang_file').'.HI')!= '') { echo  trans(Session::get('lang_file').'.HI');}  else { echo trans($OUR_LANGUAGE.'.HI');} ?> <?php echo $ci->cus_name; ?>, </p><br> <p style="padding:0;margin:0;color:#565656;font-size:13px"> <?php if (Lang::has(Session::get('lang_file').'.THANK_YOU_FOR_YOUR_ORDER')!= '') { echo  trans(Session::get('lang_file').'.THANK_YOU_FOR_YOUR_ORDER');}  else { echo trans($OUR_LANGUAGE.'.THANK_YOU_FOR_YOUR_ORDER');} ?>!</p><br> <p style="padding:0;margin:0;color:#565656;line-height:22px;font-size:13px">  
 <?php if (Lang::has(Session::get('lang_file').'.WE_WILL_SEND_YOU_ANOTHER_EMAIL_ONCE_THE_ITEMS_IN_YOUR_ORDER_HAVE_BEEN_SHIPPED')!= '') { echo  trans(Session::get('lang_file').'.WE_WILL_SEND_YOU_ANOTHER_EMAIL_ONCE_THE_ITEMS_IN_YOUR_ORDER_HAVE_BEEN_SHIPPED');}  else { echo trans($OUR_LANGUAGE.'.WE_WILL_SEND_YOU_ANOTHER_EMAIL_ONCE_THE_ITEMS_IN_YOUR_ORDER_HAVE_BEEN_SHIPPED');} ?>.  
 <?php if (Lang::has(Session::get('lang_file').'.MEANWHILE_YOU_CAN_CHECK_THE_STATUS_OF_YOUR_ORDER_ON')!= '') { echo  trans(Session::get('lang_file').'.MEANWHILE_YOU_CAN_CHECK_THE_STATUS_OF_YOUR_ORDER_ON');}  else { echo trans($OUR_LANGUAGE.'.MEANWHILE_YOU_CAN_CHECK_THE_STATUS_OF_YOUR_ORDER_ON');} ?> 
 <a alt="" style="text-decoration:none" href="<?php echo url(''); ?>" target="_blank"><span style="color:#666;font-size:13px"><?php echo $SITENAME;?></span></a></p><br><p style="text-align:center;padding:0;margin:0;line-height:22px;font-size:13px" align="center"><?php if (Lang::has(Session::get('lang_file').'.YOUR_TRANSACTION_ID')!= '') { echo  trans(Session::get('lang_file').'.YOUR_TRANSACTION_ID');}  else { echo trans($OUR_LANGUAGE.'.YOUR_TRANSACTION_ID');} ?>  :  <?php echo $ci->cod_transaction_id; ?><br> 
<?php echo  $ci->tax_type."".":"."".$ci->tax_id_number; ?> </p><br>
 <?php $value = DB::table('nm_ordercod')->where('cod_transaction_id', '=', $transaction_id)
        ->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_ordercod.cod_pro_id')
    ->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_ordercod.cod_pro_id')
        ->get();  foreach($value as $v) { $cod_order_type=$v->cod_order_type;  } 
        if($cod_order_type==1) {?>

 <p style="text-align:center;padding:0;margin:0" align="center"> <a style="width:200px;margin:0px auto;background-color: #FF9800;
    text-align: center;padding:8px 0;text-decoration:none;border-radius:2px;display:block;color:#fff;font-size:13px" href="<?php echo url('')."/user_profile?id=2"; ?>" align="center" target="_blank"> <span style="color:#ffffff;font-size:13px;"><?php if (Lang::has(Session::get('lang_file').'.VIEW_YOUR_ORDER')!= '') { echo  trans(Session::get('lang_file').'.VIEW_YOUR_ORDER');}  else { echo trans($OUR_LANGUAGE.'.VIEW_YOUR_ORDER');} ?></span> </a> </p>
    <?php }  

    if($cod_order_type==2) {?>

 <p style="text-align:center;padding:0;margin:0" align="center"> <a style="width:200px;margin:0px auto;background-color: #FF9800;
    text-align: center;padding:8px 0;text-decoration:none;border-radius:2px;display:block;color:#fff;font-size:13px" href="<?php echo url('')."/user_profile?id=6"; ?>" align="center" target="_blank"> <span style="color:#ffffff;font-size:13px;"><?php if (Lang::has(Session::get('lang_file').'.VIEW_YOUR_ORDER')!= '') { echo  trans(Session::get('lang_file').'.VIEW_YOUR_ORDER');}  else { echo trans($OUR_LANGUAGE.'.VIEW_YOUR_ORDER');} ?></span> </a> </p>
    <?php } ?> 

    </td> </tr> </tbody></table>
                    
                    <table width="100%" cellspacing="0" cellpadding="0" style="line-height:1.5"> <tbody>

<tr> <td width="23%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.S_NO')!= '') { echo  trans(Session::get('lang_file').'.S_NO');}  else { echo trans($OUR_LANGUAGE.'.S_NO');} ?></p> </td>
<td width="65%" align="center" valign="top" style="padding:12px 15px 0 10px;margin:0;vertical-align:top;min-width:100px"> <p style="padding:0;margin:0"> <a style="text-decoration:none;color:#000" href="" target="_blank"><p style="white-space:nowrap;padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.ITEM_NAME')!= '') { echo  trans(Session::get('lang_file').'.ITEM_NAME');}  else { echo trans($OUR_LANGUAGE.'.ITEM_NAME');} ?></p>  </a> </p>  
 </td> 
 <?php /**<td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.ACTUAL_PRICE')!= '') { echo  trans(Session::get('lang_file').'.ACTUAL_PRICE');}  else { echo trans($OUR_LANGUAGE.'.ACTUAL_PRICE');} ?> / 1 <?php if (Lang::has(Session::get('lang_file').'.QTY')!= '') { echo  trans(Session::get('lang_file').'.QTY');}  else { echo trans($OUR_LANGUAGE.'.QTY');} ?></p> </td> **/ ?>
 <td width="38%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.PRICE')!= '') { echo  trans(Session::get('lang_file').'.PRICE');}  else { echo trans($OUR_LANGUAGE.'.PRICE');} ?>*<?php if (Lang::has(Session::get('lang_file').'.QTY')!= '') { echo  trans(Session::get('lang_file').'.QTY');}  else { echo trans($OUR_LANGUAGE.'.QTY');} ?></p> </td>
 
 <td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.ITEM_PRICE')!= '') { echo  trans(Session::get('lang_file').'.ITEM_PRICE');}  else { echo trans($OUR_LANGUAGE.'.ITEM_PRICE');} ?></p> </td>
<td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.TAX')!= '') { echo  trans(Session::get('lang_file').'.TAX');}  else { echo trans($OUR_LANGUAGE.'.TAX');} ?></p> </td>
<td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.SHIP_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.SHIP_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.SHIP_AMOUNT');} ?></p>  </td> 
<?php /*
<td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.COUPON_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.COUPON_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.COUPON_AMOUNT');} ?></p>  </td>
<td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.WALLET_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.WALLET_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.WALLET_AMOUNT');} ?></p>  </td>
*/ ?>
<?php //$total = ($item_price + $tax) + $ship_amount; ?>

 <td width="33%" valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:0;margin:0;color:#000;font-size:12px; font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.SUBTOTAL')!= '') { echo  trans(Session::get('lang_file').'.SUBTOTAL');}  else { echo trans($OUR_LANGUAGE.'.SUBTOTAL');} ?> </p>  </td>
</tr> 
                  
<?php 
$i = 1; $total_tax_amt =0; $total_ship_amt=0; $total_item_amt=0;
$value = DB::table('nm_ordercod')->where('cod_transaction_id', '=', $transaction_id)
        ->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_ordercod.cod_pro_id')
    ->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_ordercod.cod_pro_id')
        ->get(); 
    $coupon_amount = 0;
    $wallet_amount = 0;
foreach($value as $v) { 
$delivery_date = '+'.$v->pro_delivery.'days';
        ?>
<tr>  <td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px">  
 <?php echo $i; ?>
</p> </td><td width="33%" align="center" valign="top" style="padding:12px 10px 0 10px;margin:0;vertical-align:top;min-width:100px"> <p style="padding:0;margin:0"> <a style="text-decoration:none;color:#000" href="" target="_blank"><p style="color:#565656;font-size:13px"><?php if($v->cod_order_type==1) { echo $v->pro_title; } elseif($v->cod_order_type==2) { echo $v->deal_title; } ?>&nbsp;<sup></sup></p>  
 </td>  
  <?php /**<td width="33%" valign="top" align="center" style="padding:12px 10px 0 5px;margin:0;text-align:center"> <p style="padding:7px 0 0 0;margin:0;color:#565656;font-size:13px">  
 {{ Helper::cur_sym() }} {{ $v->cod_prod_actualprice  }} <?php //echo $v->pro_disprice; ?>
</p> </td> **/?>
 <td width="33%" valign="top" align="center" style="padding:12px 10px 0 5px;margin:0;text-align:center"> <p style="padding:7px 0 0 0;margin:0;color:#565656;font-size:13px">  
{{ $v->cod_prod_unitPrice }} * {{ $v->cod_qty }}
</p> </td>
 <td width="33%" valign="top" align="center" style="padding:12px 10px 0 5px;margin:0;text-align:center"> <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px">  
  {{ Helper::cur_sym() }} {{ $v->cod_amt }} <?php //echo $v->cod_prod_unitPrice; ?>
</p> </td>
<td width="33%" valign="top" align="center" style="padding:12px 10px 0 5px;margin:0;text-align:center"> <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px">  
  {{ $v->cod_tax }} %

</p> </td>
<td width="33%" valign="top" align="center" style="padding:12px 10px 0 5px;margin:0;text-align:center"> <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px">  
  {{ Helper::cur_sym() }} {{ $v->cod_shipping_amt }}
</p> </td> 
<?php /*
<td width="33%" valign="top" align="center" style="padding:12px 10px 0 5px;margin:0;text-align:center"> <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px">  
  {{ Helper::cur_sym() }} <?php if($v->coupon_amount!='') { echo $v->coupon_amount; } else { echo "0.00"; } ?>
</p> </td> 
<td width="33%" valign="top" align="center" style="padding:12px 10px 0 5px;margin:0;text-align:center"> <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px">  
  {{ Helper::cur_sym() }} <?php if($v->wallet_amount!='') { echo $v->wallet_amount; } else { echo "0.00"; } ?>
</p> </td>  */ ?>
<?php
$tax_amt = (($v->cod_amt * $v->cod_tax)/100);
//$total = ($v->cod_amt + $tax_amt) + $v->cod_shipping_amt; 
//$total_tax_amt+= (($v->cod_amt * $v->cod_tax)/100); 
$total_tax_amt+=  $v->cod_taxAmt; 
$total_ship_amt+= $v->cod_shipping_amt;
$total_item_amt+=$v->cod_amt;
$coupon_amount+= $v->coupon_amount;
$wallet_amount+= $v->wallet_amount;
$prodct_id = $v->cod_pro_id;
$coupon_type = $v->coupon_type
 ?>
<?php 
//Dont inlcude coupon in subtotal ,show it in coupon applied area given below
/*
if($v->coupon_amount != ''){
  if($v->coupon_type == 'usercoupon')
  {
    $total = $v->cod_amt + $tax_amt + $v->cod_shipping_amt - $v->coupon_amount;
  }
  elseif($v->coupon_type == 'productcoupon')
  {
    $total = $v->cod_amt + $tax_amt + $v->cod_shipping_amt - $v->coupon_amount;
    //$total = $v->cod_amt;
  }else
  {
    $total = $v->cod_amt + $tax_amt + $v->cod_shipping_amt;
  }
  //$total = $total + $coupon_amount;
}
else{
$total = $v->cod_amt + $tax_amt + $v->cod_shipping_amt;
}*/
$total = $v->cod_amt + $v->cod_taxAmt + $v->cod_shipping_amt;
?>

 <td width="33%" valign="top" align="center" style="padding:12px 20px 0 5px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:7px 0 0 0;margin:0;color:#565656;font-size:13px">  
 {{ Helper::cur_sym() }} <?php echo $total; ?>
</p> </td>
</tr> 

<?php $i++; } //foreach ?>

<tr>  <td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px">  
 &nbsp;
</p> </td><td width="60%" align="center" valign="top" style="padding:12px 10px 0 10px;margin:0;vertical-align:top;min-width:100px"> <p style="padding:0;margin:0"> <a style="text-decoration:none;color:#000" href="" target="_blank"><p style="color:#565656;font-size:13px">&nbsp;&nbsp;<sup></sup></p>  
 </td> 
 <td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="padding:7px 0 0 0;margin:0;color:#565656;font-size:13px; font-weight:bold;">  
<?php if (Lang::has(Session::get('lang_file').'.TOTAL')!= '') { echo  trans(Session::get('lang_file').'.TOTAL');}  else { echo trans($OUR_LANGUAGE.'.TOTAL');} ?>
</p> </td>


 <td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px; font-weight:bold;">  
 {{ Helper::cur_sym() }} <?php echo $total_item_amt; ?>
</p> </td>
<td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px; font-weight:bold;">  
 {{ Helper::cur_sym() }} <?php echo $total_tax_amt; ?>
</p> </td>
<td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px; font-weight:bold;">  
 {{ Helper::cur_sym() }} <?php echo $total_ship_amt; ?>
</p> </td> 
<?php /*  
<td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px; font-weight:bold;">  
 {{ Helper::cur_sym() }} <?php echo $coupon_amount; ?>
</p> </td>
<td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px; font-weight:bold;">  
 {{ Helper::cur_sym() }} <?php echo $wallet_amount; ?>
</p> </td>  */ ?>
<?php $grand_total = ($total_item_amt + $total_tax_amt) + $total_ship_amt; ?>

<?php 
$total_amount = $total_item_amt + $total_ship_amt+ $total_tax_amt;

//coupon and wallet reduction 
$grand_total = $total_amount - ($coupon_amount + $wallet_amount);

/*
if($coupon_amount != 0){
  
  if($coupon_type == 'usercoupon')
  { 
    if(Session::has('wallet_used_amount')){
      if(Session::get('wallet_used_amount') > 0){
      $total_amount = (($total_item_amt + $total_ship_amt+ $total_tax_amt)-Session::get('wallet_used_amount')); 
      }
      elseif(Session::get('wallet_used_amount') <= 0){
        $total_amount = ($total_item_amt + $total_ship_amt+ $total_tax_amt);
      }
    }
    else{
      $total_amount = ($total_item_amt + $total_ship_amt+ $total_tax_amt - $coupon_amount);
    }
    
  }
  elseif($coupon_type == 'productcoupon')
  { 
    if(Session::has('wallet_used_amount')){
      
      if(Session::get('wallet_used_amount') > 0){
        $total_amount = (($total_item_amt + $total_ship_amt+ $total_tax_amt)-Session::get('wallet_used_amount')); 
      }
      elseif(Session::get('wallet_used_amount') <= 0){
        $total_amount = ($total_item_amt + $total_ship_amt+ $total_tax_amt);
      }
    }
    else{
      
      $total_amount = ($total_item_amt + $total_ship_amt+ $total_tax_amt - $coupon_amount);
    }
  }
}
else{
   
  if(Session::has('wallet_used_amount')){
    
      if(Session::get('wallet_used_amount') > 0){
      $total_amount = (($total_item_amt + $total_ship_amt+ $total_tax_amt)-Session::get('wallet_used_amount')); 
      }
      elseif(Session::get('wallet_used_amount') <= 0){
        $total_amount = ($total_item_amt + $total_ship_amt+ $total_tax_amt);
      }
    }
    else{
      
      $total_amount = ($total_item_amt + $total_ship_amt+ $total_tax_amt);
    }
   
} */
?>

 <td width="33%" valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:7px 0 0 0;margin:0;color:#565656;font-size:13px; font-weight:bold;">  
 {{ Helper::cur_sym() }} <?php echo $total_amount;?>
</p> </td>
</tr> 

</tbody></table>
<table width="100%" cellspacing="0" cellpadding="0" style="line-height:2.5">
  <tbody>
  <tr>

  @if($coupon_type != '' && $coupon_amount>0 )
  <?php   /*
    if($coupon_type == 'usercoupon'){
  ?>
   <td width="33%" valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:7px 0 0 0;margin:0;color:#565656;font-size:13px; font-weight:bold;">  
   Coupon Value : <?php if(Session::get('coupon_amount_type'.$prodct_id) == 1){ echo '$'.Session::get('coupon_amount'.$prodct_id); } elseif(Session::get('coupon_amount_type'.$prodct_id) == 2){ echo Session::get('coupon_amount'.$prodct_id).'%';}?>
    </p>
   </td>
   
  <?php }  elseif($coupon_type == 'productcoupon'){ ?>
   <td width="33%" valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:7px 0 0 0;margin:0;color:#565656;font-size:13px; font-weight:bold;">  
   <?php if (Lang::has(Session::get('lang_file').'.COUPON_APPLIED')!= '') { echo  trans(Session::get('lang_file').'.COUPON_APPLIED');}  else { echo trans($OUR_LANGUAGE.'.COUPON_APPLIED');} ?>  <?php //if(Session::get('coupon_amount_type') == 1){ echo '$'.Session::get('coupon_amount'); } elseif(Session::get('coupon_amount_type') == 2){echo Session::get('coupon_amount').'%';}?>
   </p>
   </td>
  <?php } */
  ?>


  <td width="33%" valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:7px 0 0 0;margin:0;color:#565656;font-size:13px; font-weight:bold;">  
   <?php 
    if (Lang::has(Session::get('lang_file').'.COUPON_APPLIED')!= '') { 
      echo  trans(Session::get('lang_file').'.COUPON_APPLIED');}  
    else { echo trans($OUR_LANGUAGE.'.COUPON_APPLIED');} ?> : {{ Helper::cur_sym() }} {{ $coupon_amount }} 
   </p>
   </td>
   @endif
</tr>
</tbody>
</table>
<table width="100%" cellspacing="0" cellpadding="0" style="line-height:2.5">
  <tbody>
  <tr>

  <?php  //if(Session::has('wallet_used_amount')){ 
  ?>
  @if($wallet_amount>0)
   <td width="33%" valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:7px 0 0 0;margin:0;color:#565656;font-size:13px; font-weight:bold;">  
   <?php if (Lang::has(Session::get('lang_file').'.WALLET_APPLIED')!= '') { 
      echo  trans(Session::get('lang_file').'.WALLET_APPLIED');}  
    else { echo trans($OUR_LANGUAGE.'.WALLET_APPLIED');} ?> : {{ Helper::cur_sym() }} {{ $wallet_amount }} 
   </p>
   </td>
   @endif
  <?php // } ?>
  </tr>
</tbody>
</table>
<table width="100%" cellspacing="0" cellpadding="0" style="line-height:2.5">
  <tbody>
  <tr>

  
   <td width="33%" valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center"> <p style="white-space:nowrap;padding:7px 0 0 0;margin:0;color:#565656;font-size:13px; font-weight:bold;">  
   <?php if (Lang::has(Session::get('lang_file').'.GRAND_TOTAL')!= '') { 
    echo  trans(Session::get('lang_file').'.GRAND_TOTAL');}  
    else { echo trans($OUR_LANGUAGE.'.GRAND_TOTAL');} ?> : {{ Helper::cur_sym() }} {{ $grand_total }}  
   </p>
   </td>
  
  </tr>
</tbody>
</table>
<table width="100%" cellspacing="0" cellpadding="0" style="line-height:2.5"> <tbody><tr> <td valign="top" align="center" style="background-color:#ffffff;display:block;margin:0 auto;clear:both;padding:5px 20px 0 20px" bgcolor="#ffffff"> <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin:0"> <tbody><tr> <td colspan="4" align="center" valign="top" style="padding:0 0 17px 0">  
     
      <!-- <p style="padding:4px 5px;background-color: #f7f7f7;
    color: #191919;margin:10px 0 0 0;text-align:center;font-size:12px">  
  <?php // if (Lang::has(Session::get('lang_file').'.WILL_BE_DELIVERED_BY')!= '') { echo  trans(Session::get('lang_file').'.WILL_BE_DELIVERED_BY');}  else { echo trans($OUR_LANGUAGE.'.WILL_BE_DELIVERED_BY');} ?> <span class="aBn" data-term="goog_231825889" tabindex="0"><span class="aQJ"><?php // echo date('D d, M Y', strtotime($delivery_date));?></span></span>  
  </p>  --> 
 </td> </tr> </tbody></table> </td> </tr> </tbody>
 </table>
                  <table width="100%" cellspacing="0" cellpadding="0" style=""> <tbody> <tr> <td valign="top" align="left" style="background-color:#ffffff;color:#565656;display:block;font-weight:300;margin:0;padding:0;clear:both" bgcolor="#ffffff"> <table width="100%" cellspacing="0" cellpadding="0"> <tbody><tr> <td valign="top" align="left" style="padding:20px 20px 0 20px;margin:0"> <p style="margin:0;padding:0;color:#565656;font-size:16px;line-height:28px;font-weight:bold">  
  <?php if (Lang::has(Session::get('lang_file').'.DELIVERY_ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.DELIVERY_ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.DELIVERY_ADDRESS');} ?> 
<?php
$allpas = explode(",",$ci->cod_ship_addr);
  $city       = '';
  $country    = '';
  $cus_name   = '';
  $cus_addr1  = '';
  $cus_addr2  = '';
  $state      = '';
  $zip        = '';
  $cus_phone  = '';
  $cus_mail   = '';
if(count($allpas)>0) {
  $cus_name = $allpas[0];
  $cus_addr1 = $allpas[1];
  $cus_addr2 = $allpas[2];
  $state = $allpas[3];
  $zip = $allpas[4];
  $cus_phone = $allpas[5];
  $cus_mail = $allpas[6];

  $city=$allpas[7];
  $country= $allpas[8];
}

?>  
</p> <p style="padding:0;margin:15px 0 10px 0;font-size:14px;color:#333333;line-height:24px">  
<span style='font-weight: bold;'><?php if (Lang::has(Session::get('lang_file').'.NAME')!= '') { echo  trans(Session::get('lang_file').'.NAME');}  else { echo trans($OUR_LANGUAGE.'.NAME');} ?>:</span><span><?php echo $cus_name; ?></span><br>
<span style='font-weight: bold;'><?php if (Lang::has(Session::get('lang_file').'.ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.ADDRESS');} ?>:</span><span><?php echo $cus_addr1.",".$cus_addr2; ?></span><br>

<span style='font-weight: bold;'><?php if (Lang::has(Session::get('lang_file').'.CITY')!= '') { echo  trans(Session::get('lang_file').'.CITY');}  else { echo trans($OUR_LANGUAGE.'.CITY');} ?>:</span><span><?php echo $city; ?></span><br>

<span style='font-weight: bold;'><?php if (Lang::has(Session::get('lang_file').'.STATE')!= '') { echo  trans(Session::get('lang_file').'.STATE');}  else { echo trans($OUR_LANGUAGE.'.STATE');} ?>:</span><span><?php echo $state; ?></span><br>

<span style='font-weight: bold;'><?php if (Lang::has(Session::get('lang_file').'.COUNTRY')!= '') { echo  trans(Session::get('lang_file').'.COUNTRY');}  else { echo trans($OUR_LANGUAGE.'.COUNTRY');} ?>:</span><span><?php echo $country; ?></span><br>


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
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%;margin-top:20px;font-family:Montserrat"><tr><td height="0" class="spacer" style="font-size:11pt; line-height:1.5pt; text-align:center; width:100%; min-width:100%;color:#333333;">&copy;<?php echo date("Y"); ?> &nbsp;<?php echo $SITENAME; ?></td></tr></table>

                                
                                


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
