<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@if (Lang::has(Session::get('lang_file').'.CONTACT_INFORMATION')!= '') {{  trans(Session::get('lang_file').'.CONTACT_INFORMATION') }} @else {{ trans($MER_OUR_LANGUAGE.'.CONTACT_INFORMATION') }} @endif</title>
</head>
  
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<body>
<table border="0" cellspacing="0" cellpadding="0" width="600" align="center" style="border:1px solid #cccccc;font-family: Montserrat;">


  <tr bgcolor="#f5f5f5"> 
        @php 
        $logo = public_path().'/public/assets/default_image/Logo.png'; $logo = $SITE_LOGO; @endphp
        @if(file_exists($SITE_LOGO))
        @php  $logo = $SITE_LOGO; @endphp
        @endif 
          <td align="center"><img src="{{ $logo}}" alt="{{ $SITENAME }}" style="margin:20px 0px; background:#f5f5f5;"/></td>
  </tr>

  <tr>
     <td style="height:30px; text-align:center; font-weight:bold; font-size:16px;"><b>@if (Lang::has(Session::get('lang_file').'.ORDER_CANCELLATION_REQUEST')!= '') {{ trans(Session::get('lang_file').'.ORDER_CANCELLATION_REQUEST') }} @else {{ trans($MER_OUR_LANGUAGE.'.ORDER_CANCELLATION_REQUEST') }} @endif</b></td>
  </tr>
  <tr>
      <td>
          <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;"> <tbody><tr> <td align="left" valign="top" style="color:#333333;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;padding:20px"> <p style="padding:0;margin:0;font-size:16px;font-weight:bold;font-size:13px"> @if (Lang::has(Session::get('lang_file').'.HI')!= '') {{ trans(Session::get('lang_file').'.HI') }} @else {{ trans($OUR_LANGUAGE.'.HI') }} @endif Merchant, </p><br> <p style="padding:0;margin:0;color:#565656;font-size:13px"> @if (Lang::has(Session::get('lang_file').'.CUSTOMER_SEND_A_CANCEL_REQUEST_FOR_THE_FOLLOWING_PRODUCT')!= '') {{ trans(Session::get('lang_file').'.CUSTOMER_SEND_A_CANCEL_REQUEST_FOR_THE_FOLLOWING_PRODUCT') }} @else {{ trans($MER_OUR_LANGUAGE.'.CUSTOMER_SEND_A_CANCEL_REQUEST_FOR_THE_FOLLOWING_PRODUCT') }} @endif!</p><br> <p style="padding:0;margin:0;color:#565656;line-height:22px;font-size:13px">  
            </td> </tr> </tbody></table>
      </td>
  </tr>
  <tr>
     <td style=" margin:0 auto; font-size:15px;text-align:left; padding:10px 10px 10px; background:#f5f5f5; ">
        <table  cellspacing="10">
          <tr>
              <th>@if (Lang::has(Session::get('lang_file').'.NAME')!= '') {{ trans(Session::get('lang_file').'.NAME') }} @else {{ trans($MER_OUR_LANGUAGE.'.NAME') }} @endif</th>
              <th>:</th>
              <td >{{ $customer_name }}</td>
          </tr>
          <tr>
              <th>@if (Lang::has(Session::get('lang_file').'.ORDER_ID')!= '') {{  trans(Session::get('lang_file').'.ORDER_ID') }}  @else {{ trans($MER_OUR_LANGUAGE.'.ORDER_ID') }} @endif</th>
              <th>:</th>
              <td >{{ $transaction_id }}</td>
          </tr>
          <tr>
            <th>@if (Lang::has(Session::get('lang_file').'.PRODUCT_TITLE')!= '') {{  trans(Session::get('lang_file').'.PRODUCT_TITLE') }} @else {{ trans($OUR_LANGUAGE.'.PRODUCT_TITLE') }} @endif</th>     
          
            <th>:</th>
            <td >{{ $prod_title }}</td>
          </tr>
          <tr>     
            <th>@if (Lang::has(Session::get('lang_file').'.CANCEL_DATE')!= '') {{  trans(Session::get('lang_file').'.CANCEL_DATE') }} @else {{ trans($MER_OUR_LANGUAGE.'.CANCEL_DATE') }} @endif</th>
             <th>:</th>
              <td >{{ $date }}</td>
            </tr>
            <tr>     
          <th>@if (Lang::has(Session::get('lang_file').'.REASON_TO_CANCEL')!= '') {{ trans(Session::get('lang_file').'.REASON_TO_CANCEL') }} @else {{ trans($MER_OUR_LANGUAGE.'.REASON_TO_CANCEL') }} @endif</th>
             <th>:</th>
              <td>{{ $cancel_notes }}</td>
            </tr>
          </table>
     </td>
  </tr>  
<tr>
  <td>
      
      <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;"> <tbody><tr> <td align="left" valign="top" style="color:#2c2c2c;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;padding:20px" > <br> 
       <p style="text-align:center;padding:0;margin:0" align="center"> <a style="width:200px;margin:0px auto;background-color: #FF9800;
    text-align: center;
    border: #ff9800 solid 1px;padding:8px 0;text-decoration:none;border-radius:2px;display:block;color:#fff;font-size:13px" href="<?php echo url('');?>" align="center" target="_blank"> <span style="color:#ffffff;font-size:13px;">@if (Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= '') {{  trans(Session::get('lang_file').'.VIEW_DETAILS') }} @else {{ trans($OUR_LANGUAGE.'.VIEW_DETAILS') }} @endif</span> </a> </p><br </td> </tr> </tbody></table>

  </td>
</tr>
  <tr bgcolor="#f5f5f5">
    <td style="height:50px;text-align:center; font-size:14px;"><a href="<?php echo url('');?>" target="_blank"  style="text-decoration:none;color:#333333;font-weight:800; background:#f5f5f5;"> &copy; <?php echo date("Y"); ?>&nbsp; {{ $SITENAME }} </a></td>
  </tr>

 </table>
</body>
</html>
