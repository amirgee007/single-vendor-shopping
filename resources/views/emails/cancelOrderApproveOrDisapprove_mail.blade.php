<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@if (Lang::has(Session::get('lang_file').'.CONTACT_INFORMATION')!= '') {{  trans(Session::get('lang_file').'.CONTACT_INFORMATION') }} @else {{ trans($MER_OUR_LANGUAGE.'.CONTACT_INFORMATION') }} @endif</title>
</head>

<body>
<table border="0" cellspacing="0" cellpadding="0" width="600" align="center" style="border:1px solid #cccccc;">

  <tr style="background:#f5f5f5;"> 
       @php 
        $logo = public_path().'/public/assets/default_image/Logo.png'; $logo = $SITE_LOGO; @endphp
        @if(file_exists($SITE_LOGO))
        @php  $logo = $SITE_LOGO; @endphp
        @endif
          <td align="center"><img src="{{ $logo}}" alt="{{ $SITENAME }}"  style="margin:20px 0px;"/></td>
  </tr>

  <tr>
     <td style="height:30px; text-align:center; font-weight:bold; font-size:16px; font-family:Arial, Helvetica, sans-serif;"><b>@if (Lang::has(Session::get('lang_file').'.MER_ORDER_CANCELLATION_REQUEST')!= '') {{ trans(Session::get('lang_file').'.MER_ORDER_CANCELLATION_REQUEST') }} @else {{ "Order Cancellation request status" }} @endif</b></td>
  </tr>
  <tr>
      <td>
          <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;"> <tbody><tr> <td align="left" valign="top" style="color:#2c2c2c;display:block;line-height:20px;font-weight:300;margin:0 auto;padding:20px"> <p style="padding:0;margin:0;font-size:16px;font-weight:bold;font-size:13px"> @if (Lang::has(Session::get('lang_file').'.HI')!= '') {{ trans(Session::get('lang_file').'.HI') }} @else {{ 'Hi' }} @endif {{ $customer_name }}, </p><br> <p style="padding:0;margin:0;color:#565656;font-size:13px"> Your cancel request for the following Order was {{$approve_status}}!</p><br> <p style="padding:0;margin:0;color:#565656;line-height:22px;font-size:13px">  
            </td> </tr> </tbody></table>
      </td>
  </tr>
  <tr>
     <td style=" margin:0 auto; font-size:16px;text-align:left;padding:10px 10px 10px; background:#f5f5f5;">
        <table  cellspacing="10">
          <tr>
              <th>@if (Lang::has(Session::get('lang_file').'.ORDER_ID')!= '') {{  trans(Session::get('lang_file').'.ORDER_ID') }} @else {{ 'Order ID' }} @endif</th>
              <th>:</th>
              <td >{{ $transaction_id }}</td>
          </tr>
          <tr>
            <th>@if (Lang::has(Session::get('lang_file').'.PRODUCT_TITLE')!= '') {{  trans(Session::get('lang_file').'.PRODUCT_TITLE') }} @else {{ 'Product Title' }} @endif</th>     
          
            <th>:</th>
            <td >{{ $prod_title }}</td>
          </tr>
          <tr>     
            <th>@if (Lang::has(Session::get('lang_file').'.CANCEL_DATE')!= '') {{  trans(Session::get('lang_file').'.CANCEL_DATE') }} @else {{ 'Cancel Date' }} @endif</th>
             <th>:</th>
              <td >{{$date}}</td>
            </tr>
            <tr>     
          <th>@if (Lang::has(Session::get('lang_file').'.REASON_TO_CANCEL')!= '') {{  trans(Session::get('lang_file').'.REASON_TO_CANCEL') }} @else {{ 'Note' }} @endif</th>
             <th>:</th>
              <td>{{ $cancel_notes }}</td>
            </tr>
          </table>
     </td>
  </tr>  
<tr>
  <td>
      
      <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;> <tbody><tr> <td align="left" valign="top" style="color:#2c2c2c;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;border-bottom:1px solid #e6e6e6;background-color:#f9f9f9;padding:20px"> <br><p style="text-align:center;padding:0;margin:0" align="center"> <a style="width:200px;margin:0px auto;background-color: #FF9800;
    text-align: center;
    border: #ff9800 solid 1px;padding:8px 0;text-decoration:none;border-radius:2px;display:block;color:#fff;font-size:13px" href="{{ url('') }}" align="center" target="_blank"> <span style="color:#ffffff;font-size:13px;">@if (Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= '') {{  trans(Session::get('lang_file').'.VIEW_DETAILS') }} @else {{ trans($OUR_LANGUAGE.'.VIEW_DETAILS') }} @endif</span> </a> </p> <br></td> </tr> </tbody></table>

  </td>
</tr>
  <tr>
    <td style="height:50px;text-align:center;color:#333333; background:#f5f5f5; font-size:14px;"><a href="{{ url('') }}" target="_blank"  style="text-decoration:none;color:#333333;font-weight:800;"> &copy; <?php echo date("Y"); ?>&nbsp; {{ $SITENAME }} </a></td>
  </tr>

 </table>
</body>
</html>
