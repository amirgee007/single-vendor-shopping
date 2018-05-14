<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if (Lang::has(Session::get('lang_file').'.CONTACT_INFORMATION')!= '') { echo  trans(Session::get('lang_file').'.CONTACT_INFORMATION');}  else { echo trans($OUR_LANGUAGE.'.CONTACT_INFORMATION');} ?></title>
</head>

<body>
<table border="0" cellspacing="0" cellpadding="0" width="600" align="center" style="border:1px solid #cccccc; font-family:Montserrat"">
  <tr bgcolor="#f5f5f5">  
        <?php 
        $logo = public_path().'/public/assets/default_image/Logo.png'; $logo = $SITE_LOGO;
        if(file_exists($SITE_LOGO))
          $logo = $SITE_LOGO;
        ?> 
          <td align="center"><img src="<?php echo $logo; ?>" alt="<?php echo $SITENAME; ?>"  style="margin:20px 0px"/></td>
  </tr>
  <tr>
     <td style="height:30px; text-align:center; font-weight:bold; font-size:16px;"><b><?php if (Lang::has(Session::get('lang_file').'.ORDER_CANCELLATION_REQUEST')!= '') { echo  trans(Session::get('lang_file').'.ORDER_CANCELLATION_REQUEST');}  else { echo trans($OUR_LANGUAGE.'.ORDER_CANCELLATION_REQUEST');} ?></b></td>
  </tr>
  <tr>
      <td>
          <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;"> <tbody><tr> <td align="left" valign="top" style="color:#2c2c2c;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;margin:20px"> <p style="padding:0;margin:0;font-size:16px;font-weight:bold;font-size:13px"> <?php if (Lang::has(Session::get('lang_file').'.HI')!= '') { echo  trans(Session::get('lang_file').'.HI');}  else { echo trans($OUR_LANGUAGE.'.HI');} ?> <?php echo $customer_name; ?>, </p><br> <p style="padding:0;margin:0;color:#565656;font-size:13px"> <?php if (Lang::has(Session::get('lang_file').'.YOU_ARE_SEND_A_CANCEL_REQUEST_FOR_THE_FOLLOWING_PRODUCT')!= '') { echo  trans(Session::get('lang_file').'.YOU_ARE_SEND_A_CANCEL_REQUEST_FOR_THE_FOLLOWING_PRODUCT');}  else { echo trans($OUR_LANGUAGE.'.YOU_ARE_SEND_A_CANCEL_REQUEST_FOR_THE_FOLLOWING_PRODUCT');} ?>!</p><br> <p style="padding:0;margin:0;color:#565656;line-height:22px;font-size:13px">  
            </td> </tr> </tbody></table>
      </td>
  </tr>
  <tr>
     <td style="font-size:15px;text-align:left;  background:#f5f5f5;">
        <table  cellspacing="10" style="padding:10px; margin:10px;">
          <tr>
              <th><?php if (Lang::has(Session::get('lang_file').'.ORDER_ID')!= '') { echo  trans(Session::get('lang_file').'.ORDER_ID');}  else { echo trans($OUR_LANGUAGE.'.ORDER_ID');} ?></th>
              <th>:</th>
              <td >{{ $transaction_id }}</td>
          </tr>
          <tr>
            <th><?php if (Lang::has(Session::get('lang_file').'.PRODUCT_TITLE')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_TITLE');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_TITLE');} ?></th>     
          
            <th>:</th>
            <td >{{ $prod_title }}</td>
          </tr>
          <tr>     
            <th><?php if (Lang::has(Session::get('lang_file').'.CANCEL_DATE')!= '') { echo  trans(Session::get('lang_file').'.CANCEL_DATE');}  else { echo trans($OUR_LANGUAGE.'.CANCEL_DATE');} ?></th>
             <th>:</th>
              <td >{{$date}}</td>
            </tr>
            <tr>     
          <th><?php if (Lang::has(Session::get('lang_file').'.REASON_TO_CANCEL')!= '') { echo  trans(Session::get('lang_file').'.REASON_TO_CANCEL');}  else { echo trans($OUR_LANGUAGE.'.REASON_TO_CANCEL');} ?></th>
             <th>:</th>
              <td>{{ $cancel_notes }}</td>
            </tr>
          </table>
     </td>
  </tr>  
<tr>
  <td>
      
      <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;"> <tbody><tr> <td align="left" valign="top" style="color:#2c2c2c;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both; margin:20px"> <br>
       <p style="text-align:center;padding:0;margin:0" align="center"> <a style="background:#ff9800;width:200px;margin:0px auto;
    text-align: center;
    border: #ff9800 solid 1px;padding:8px 0;text-decoration:none;border-radius:2px;display:block;color:#fff;font-size:13px" href="<?php echo url('');?>" align="center" target="_blank"> <span style="color:#ffffff;font-size:13px;"><?php if (Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= '') { echo  trans(Session::get('lang_file').'.VIEW_DETAILS');}  else { echo trans($OUR_LANGUAGE.'.VIEW_DETAILS');} ?></span> </a> </p><br> </td> </tr> </tbody></table>

  </td>
</tr>
  <tr>
    <td style="height:50px;text-align:center; font-size:14px; background:#f5f5f5;"><a href="<?php echo url('');?>" target="_blank"  style="text-decoration:none;color:#333333;font-weight:800;"> &copy; <?php echo date("Y"); ?>&nbsp; <?php echo $SITENAME;?> </a></td>
  </tr>

 </table>
</body>
</html>
