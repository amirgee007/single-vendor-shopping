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

  <title>@if (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL_TEMPLATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EMAIL_TEMPLATE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL_TEMPLATE') }} @endif</title>

  

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

<body class="body" style="padding:0 !important; margin:0 !important; display:block !important; background:#ffffff; -webkit-text-size-adjust:none">
<br>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">

    <tr>

      <td align="center" valign="top">

        <!-- Top -->

        

        <!-- END Top -->



        <table width="600" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">

          <tr>

            <td class="td" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; margin:0 ;border:1px solid #cccccc;" width="600">

              <!-- Header -->

              

              <!-- END Header -->



              <!-- Main -->

              

                    <!-- END Head -->

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#ffffff;">

                      <tr>

                        <td>

                          

                          

                        </td>

                      </tr>

                    </table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#ffffff;" class="hide">

                      <tr>

                        <td>

                          

                        

                        </td>

                      </tr>

                    </table>

                    <!-- Body -->

                    

                    



                    <table width="100%" cellspacing="0" cellpadding="0" style="max-width:700px;"> <tbody><tr><td colspan="2" align="center" style="padding: 20px 0px; background:#f5f5f5;"><img src="{{ $SITE_LOGO }}" alt="{{ $SITENAME }}" width="100%"></td></tr><tr> <td align="left" valign="top" style="color:#2c2c2c;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;padding:20px"><p style="padding:0;margin:0;font-weight: bold;

    font-size: 40px;

    color: #ff9800;text-align:center;text-transform: uppercase;">{{ $coupon_name }}</p><br>  

 

 <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;line-height:2.5;"> <tbody><tr> <td valign="top" align="center" style="background-color:#ffffff;display:block;margin:0 auto;clear:both;padding:5px 20px 0 20px" bgcolor="#fff"> <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin:0"> <tbody><tr> <td colspan="4" align="center" valign="top" style="padding:0 0 17px 0">  

     

      <p style="padding:4px 5px;background-color: #f5f5f5; 

    color: #191919;margin:10px 0 0 0;text-align:center;">  
  
   <span style="font-size:30px;color:#333333;font-weight:bold">@if (Lang::has(Session::get('admin_lang_file').'.BACK_USE_CODE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_USE_CODE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_USE_CODE') }} @endif : {{ $code }} <br> 
      
      <span style="font-size:17px;color:#333333;">@if (Lang::has(Session::get('admin_lang_file').'.BACK_FROM')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_FROM') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_FROM') }} @endif {{$start_date}} @if (Lang::has(Session::get('admin_lang_file').'.BACK_TO')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TO') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TO') }} @endif
      {{$end_date}} 
      
      @if($product_id==0)
      <br />
      <em style='text-transform: uppercase;'>@if (Lang::has(Session::get('admin_lang_file').'.BACK_USER_COUPON')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_USER_COUPON') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_COUPON') }} @endif
      </em>
      <br>
      <cite>@if (Lang::has(Session::get('admin_lang_file').'.BACK_MINIMUM_CART_VALUE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MINIMUM_CART_VALUE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MINIMUM_CART_VALUE') }} @endif {{ Helper::cur_sym() }} {{ $user_total_cart_value }}</cite>
      @else
        @if(!empty($pro_table))
        <br /><em style='text-transform: uppercase;'> @if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_COUPON')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_PRODUCT_COUPON') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_COUPON') }} @endif </em><br>
        <table>
          <tr>
          <td><p style="font-size:16px;color:#009688;font-weight:bold">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_DETAILS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_DETAILS') }} @endif</p></td>
        </tr>
        
        <tr>
          <td><p style="font-size:14px;color:#000;"><b>@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_NAME')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_PRODUCT_NAME') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_NAME') }} @endif :</b> {{ $pro_table->pro_title }}</p></td>
        </tr>
        <tr>
          <td><p style="font-size:14px;color:#000;"><b>@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_PRICE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_PRICE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_PRICE') }} @endif :</b> {{ Helper::cur_sym() }} {{ $pro_table->pro_disprice }}</p></td>
        </tr>
        
        <tr>
          <td><p style="font-size:16px;color:#009688;font-weight:bold">@if (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_COUPON_DETAILS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_DETAILS') }} @endif</p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><p style="font-size:14px;color:#000;"><b>@if (Lang::has(Session::get('admin_lang_file').'.BACK_NO_OF_COUPON_PER_PRODUCT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NO_OF_COUPON_PER_PRODUCT') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NO_OF_COUPON_PER_PRODUCT') }} @endif :</b> {{ $coupon_per_product }}</p></td>
        </tr>
        <tr>
          <td><p style="font-size:14px;color:#000;"><b>@if (Lang::has(Session::get('admin_lang_file').'.BACK_NO_OF_COUPON_PER_USER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NO_OF_COUPON_PER_USER') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NO_OF_COUPON_PER_USER') }} @endif :</b> {{ $coupon_per_user }}</p></td>
        </tr>
        <tr>
          <td><p style="font-size:14px;color:#000;"><b>@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_QUANTITY_FOR_COUPON')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_PRODUCT_QUANTITY_FOR_COUPON') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_QUANTITY_FOR_COUPON') }} @endif :</b> {{ $quantity }} Nos</p></td>
        </tr>
      </table>
        @endif
      @endif
    </span>
  </span><br> <span class="aBn" data-term="goog_231825889" tabindex="0"></span> <p></p> 

   <p style="font-size:30px;color:#333333;font-weight:bold"></p>

  </p>  

 </td> </tr> </tbody></table> </td> </tr> </tbody>

 </table> </p><br> <p  style="font-size:18px;color:#000;">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TERMS_&_CONDITIONS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TERMS_&_CONDITIONS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TERMS_&_CONDITIONS') }} @endif<br><br><span style="font-size:14px;color:#504f4f;">{!! $terms !!}</span></p><br><p style="text-align:center;padding:0;margin:0" align="center"> 



    </p> </td> </tr> </tbody></table>

                    

                

                    <!-- END Body -->



                    <!-- Foot -->

                    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="" style="background:#f5f5f5;">

  

                      <tr>

                        <td>

                          <table width="100%" border="0" cellspacing="0" cellpadding="0">

                            <tr>

                              <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="3" bgcolor=""></td>

                              <td>

                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%;margin-top:20px;font-family:Montserrat"><tr><td height="0" class="spacer" style="font-size:11pt; line-height:1.5pt; text-align:center; width:100%; min-width:100%;color:#fff;"> &copy; {{ $SITENAME }} &nbsp;<?php echo date("Y"); ?></td></tr></table>



                                

                                





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