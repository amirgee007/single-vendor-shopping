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
  <title>@if (Lang::has($lang.'.MAIL_EMAIL_TEMPLATE')!= '') {{  trans($lang.'.MAIL_EMAIL_TEMPLATE') }} @else {{ trans($LANUAGE.'.MAIL_EMAIL_TEMPLATE') }} @endif
  </title>
  
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <style type="text/css" media="screen">

    /* Linked Styles */
    body { padding:0 !important; margin:0 !important; display:block !important; background:#ffffff; -webkit-text-size-adjust:none }
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
<body class="body" style="padding:0 !important; margin:0 !important; display:block !important; background:#ffffff;font-family: Montserrat; -webkit-text-size-adjust:none">
  <br>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
    <tr>
      <td align="center" valign="top">
        <!-- Top -->
        
        <!-- END Top -->

        <table width="600" cellspacing="0" cellpadding="0" class="mobile-shell">
          <tr>
            <td class="td" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; margin:0; border:1px solid #cccccc;" width="600">
              <!-- Header -->
              
              <!-- END Header -->

              <!-- Main -->
              
                    <!-- END Head -->
                    <!-- Body -->
                    
                     <?php 
                          $logo = url('').'/public/assets/default_image/Logo.png'; 
                          $logo = $SITE_LOGO;
                          if(file_exists($SITE_LOGO))
                            $logo = $SITE_LOGO;
                          ?>  

                    <table width="100%" cellspacing="0" cellpadding="0" > <tbody>
                      <tr style="background:#f5f5f5;"><td align="center"><img src="<?php echo $logo; ?>" width="100%"></td></tr><tr> <td align="left" valign="top" style="color:#333333;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;padding:20px";> 

      <p style="padding:0;margin:0;font-weight: bold;
    font-size: 16px;
    color: #333333;"> @if (Lang::has($lang.'.MAIL_HI')!= '') {{  trans($lang.'.MAIL_HI') }} @else {{ trans($LANUAGE.'.MAIL_HI') }} @endif {{ $name }}, </p><p style="padding:0;margin:0;color: #333333;
    line-height: 22px;
    font-size: 16px;">  
@if (Lang::has($lang.'.MOBILE_YOUR_MERCHANT_ACCOUNT_WAS_CREATED_SUCCESSFULLY')!= '') {{ trans($lang.'.MOBILE_YOUR_MERCHANT_ACCOUNT_WAS_CREATED_SUCCESSFULLY') }} @else {{ trans($LANUAGE.'.MOBILE_YOUR_MERCHANT_ACCOUNT_WAS_CREATED_SUCCESSFULLY') }} @endif </p>
  <br>
 <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;line-height:2.5;"> <tbody><tr> <td valign="top" colspan="4" align="center" style="background-color:;display:block;margin:0 auto;clear:both;" bgcolor=""> <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin:0"> <tbody><tr> <td colspan="4" align="center" valign="top" style="">  
     
      <p style="padding:4px 5px;background-color: #f5f5f5;
    color: #333333;margin:10px 0 0 0;text-align:center;">  
   <span style="font-size:21px;color:#0266b5;font-weight:bold">@if (Lang::has($lang.'.MAIL_YOUR_LOGIN_CREDENTIALS_ARE')!= '') {{  trans($lang.'.MAIL_YOUR_LOGIN_CREDENTIALS_ARE') }} @else {{ trans($LANUAGE.'.MAIL_YOUR_LOGIN_CREDENTIALS_ARE') }} @endif</span><br> 


  </p>  
 </td> </tr> </tbody></table> </td> </tr> 

<tr> <td colspan="2" valign="top" align="left" style="background-color:#f5f5f5;margin:0 auto;clear:both;" bgcolor="#ffffff"> 
  <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin:0"> <tbody><tr> <td  align="center" valign="top" style="">  
  <p style="padding:4px 5px;background-color: #f5f5f5;
    color: #333333;margin:10px 0 0 0;text-align:center;">  
   <span style="font-size:15px;color:333333;font-weight:bold">
@if (Lang::has($lang.'.MAIL_USER_NAME')!= '') {{  trans($lang.'.MAIL_USER_NAME') }} @else {{ trans($LANUAGE.'.MAIL_USER_NAME') }} @endif</span>

  </p>  
 </tbody></table> </td>  <td colspan="2" valign="top" align="left" style="background-color:#f5f5f5;margin:0 auto;clear:both;" bgcolor="#ffffff"> 
  <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin:0"> <tbody><tr> <td  align="center" valign="top" style="">  
  <p style="padding:4px 5px;background-color: #f5f5f5;
    color: #333333;margin:10px 0 0 0;text-align:left;">  
   <span style="font-size:15px;color:#333333;font-weight:bold">

{{ $name }}
</span>

  </p>  
 </tbody></table> </td></tr>



<tr> <td colspan="2" valign="top" align="left" style="background-color:#f5f5f5;margin:0 auto;clear:both;" bgcolor="#f5f5f5"> 
  <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin:0"> <tbody><tr> <td  align="center" valign="top" style="">  
  <p style="padding:4px 5px;background-color: #f5f5f5;
    color: #333333;margin:10px 0 0 0;text-align:center;">  
   <span style="font-size:15px;color:333333;font-weight:bold">

   @if (Lang::has($lang.'.MAIL_PASSWORD')!= '') {{  trans($lang.'.MAIL_PASSWORD') }} @else {{ trans($LANUAGE.'.MAIL_PASSWORD') }} @endif
</span>

  </p>  
 </tbody></table> </td>  <td colspan="2" valign="top" align="left" style="background-color:#f5f5f5;margin:0 auto;clear:both;" bgcolor="#f5f5f5"> 
  <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin:0"> <tbody><tr> <td  align="center" valign="top" style="">  
  <p style="padding:4px 5px;background-color: #f5f5f5;
    color: #333333;margin:10px 0 0 0;text-align:left;">  
   <span style="font-size:15px;color:#333333;font-weight:bold">

{{ $password }}
</span>

  </p>  
 </tbody></table> </td></tr>



</tbody>
 </table> </p><br> <p style="text-align:center;padding:0;margin:0" align="center"> <a style="width:200px;margin:0px auto;background-color: #ff9800;
    text-align: center;
    border: #ff9800 solid 1px;padding:8px 0;text-decoration:none;border-radius:2px;display:block;color:#ffffff;font-size:13px" href="<?php echo url(''); ?>/sitemerchant" align="center" target="_blank"> <span style="color:#ffffff;font-size:15px;font-weight:bold">@if (Lang::has($lang.'.MAIL_LOGIN_YOUR_ACCOUNT')!= '') {{  trans($lang.'.MAIL_LOGIN_YOUR_ACCOUNT') }} @else {{ trans($LANUAGE.'.MAIL_LOGIN_YOUR_ACCOUNT') }} @endif</span> </a> </p> </td> </tr> </tbody></table>
                    
                
                    <!-- END Body -->

                    <!-- Foot -->
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="" style="background: #f5f5f5; color:#333333;">
  
                      <tr>
                        <td>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="3" bgcolor=""></td>
                              <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%;margin-top:20px;font-family:Montserrat"><tr><td height="0" class="spacer" style="font-size:11pt; line-height:1.5pt; text-align:center; width:100%; min-width:100%;color:#333333;">&copy;<?php echo date("Y"); ?> &nbsp;{{ $SITENAME }} </td></tr></table>

                                
                                


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