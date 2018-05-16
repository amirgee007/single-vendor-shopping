<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <?php
         //print_r(Session::all());
         //print_r($_SESSION['cart']);
         if($metadetails){
         foreach($metadetails as $metainfo) {
             $metaname=$metainfo->gs_metatitle;
              $metakeywords=$metainfo->gs_metakeywords;
              $metadesc=$metainfo->gs_metadesc;
              }
              }
         else
         {
              $metaname        =   $SITENAME;
              $metakeywords    =   $SITENAME;
              $metadesc        =   $SITENAME;
         }
         ?>
      <title><?php echo $metaname; ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="<?php echo $metadesc; ?>">
      <meta name="keywords" content="<?php echo $metakeywords; ?>">
      <meta name="author" content="">
      <meta name="_token" content="{!! csrf_token() !!}"/>
      <!-- Bootstrap style --> 
      <link id="callCss" rel="stylesheet" href="{{ url('') }}/themes/bootshop/bootstrap.min.css" media="screen"/>
      @foreach($general as $gs) @endforeach @if($gs->gs_themes == 'blue') 
      <link href="{{ url('') }}/themes/css/base.css" rel="stylesheet" media="screen"/>
      @elseif($gs->gs_themes == 'green') 
      <link href="{{ url('') }}/themes/css/green-theme.css" rel="stylesheet" media="screen"/>
      @endif
      <!-- Bootstrap style responsive-->    
      <link href="{{ url('') }}/themes/css/planing.css" rel="stylesheet"/>
      <link href="{{ url('') }}/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
      <link href="{{ url('') }}/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
      <!-- Google-code-prettify --> 
      <link href="{{ url('') }}/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
      <!-- fav and touch icons -->
      @if($get_image_favicons_details) 
      @foreach($get_image_favicons_details as $favicon_images) @endforeach
      <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/{{ $favicon_images->imgs_name }}">
      @else 
      <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
      @endif
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('') }}/themes/images/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('') }}/themes/images/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('') }}/themes/images/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="{{ url('') }}/themes/images/ico/apple-touch-icon-57-precomposed.png">
      <style type="text/css" id="enject"></style>
   </head>
   <body>
      <!-- <div class="se-pre-con"></div> -->
      <div id="header">
         {!! $navbar !!}
         <div class="container">
            <!-- Navbar ================================================== -->
            {!! $header !!}
         </div>
      </div>
      <!-- Header End====================================================================== -->
      <div id="mainBody">
         <div class="container">
            <div class="row">
               <!-- Sidebar end=============================================== -->
               <div class="span12">
                  <ul class="breadcrumb">
                     <li><a href="index.html">@if (Lang::has(Session::get('lang_file').'.HOME')!= '') {{  trans(Session::get('lang_file').'.HOME') }} @else {{ trans($OUR_LANGUAGE.'.HOME') }} @endif</a> <span class="divider">/</span></li>
                     <li class="active">@if (Lang::has(Session::get('lang_file').'.CHECKOUT')!= '') {{  trans(Session::get('lang_file').'.CHECKOUT') }} @else {{ trans($OUR_LANGUAGE.'.CHECKOUT') }} @endif</li>
                  </ul>
                  <h3>@if (Lang::has(Session::get('lang_file').'.CHECKOUT')!= '') {{ trans(Session::get('lang_file').'.CHECKOUT') }} @else {{ trans($OUR_LANGUAGE.'.CHECKOUT') }} @endif</h3>
                  <div class="row">
                     @if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) @php     $item_count_header1 = count($_SESSION['cart']); @endphp @else @php $item_count_header1 = 0; @endphp @endif 
                     @if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart']))    @php $item_count_header2 = count($_SESSION['deal_cart']); @endphp @else @php $item_count_header2 = 0; @endphp @endif
                     @php $count = $item_count_header1 + $item_count_header2; @endphp
                     @if($count !=0) 
                     <div class="col-lg-2">
                     </div>
                     <div class="checkout-top">
                     {!! Form::Open(array('url' => 'payment_checkout_process','id' => 'payment_')) !!}            
                     <div class="span6">
                        <?php // Shipping address starts here ?>
                        <div style="border: 1px solid #202020;
                           padding: 14px;margin-bottom:25px;" id="shipping_addr_div"   class="shipping_addr_class" >
                           <h5 class="panel-deal">@if (Lang::has(Session::get('lang_file').'.SHIPPING_ADDRESS')!= '') {{  trans(Session::get('lang_file').'.SHIPPING_ADDRESS') }} @else {{ trans($OUR_LANGUAGE.'.SHIPPING_ADDRESS') }} @endif</h5>
                           <label class="control-label col-lg-8" for="text1">
                              @if (Lang::has(Session::get('lang_file').'.LOAD_SHIPPING_ADDRESS')!= '') {{ trans(Session::get('lang_file').'.LOAD_SHIPPING_ADDRESS') }} @else {{ trans($OUR_LANGUAGE.'.LOAD_SHIPPING_ADDRESS') }} @endif
                              <span class="ship-pro-det-top">
                              <span class="ship-pro-det"><input type="radio" name="shipping_addr<?php //echo $z;?>" id="shipping_addr_1rad<?php //echo $z;?>" onClick="shipping_addr_func(1)" value="yes" style="margin-top:-2px;"> @if (Lang::has(Session::get('lang_file').'.YES')!= '') {{  trans(Session::get('lang_file').'.YES') }} @else {{ trans($OUR_LANGUAGE.'.YES') }} @endif</span>
                              <span class="ship-pro-det"><input type="radio" name="shipping_addr<?php //echo $z;?>" id="shipping_addr_2rad<?php //echo $z;?>" onClick="shipping_addr_func(0)" value="no"  style="margin-top:-2px;" checked="true"> @if (Lang::has(Session::get('lang_file').'.NO')!= '') {{  trans(Session::get('lang_file').'.NO') }}  @else {{ trans($OUR_LANGUAGE.'.NO') }} @endif</span></span>
                              <legend></legend>
                              <div class="row">
                                 <div class="span">
                                    <div class="form-group">
                           <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.NAME')!= '') {{  trans(Session::get('lang_file').'.NAME') }} @else {{ trans($OUR_LANGUAGE.'.NAME') }} @endif<span class="text-sub">*</span></label>
                           <div class="col-lg-8">
                           <input type="text" id="fname<?php //echo $z;?>" name="fname<?php //echo $z;?>" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_NAME')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_NAME') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_NAME') }} @endif"  class="form-control span" maxlength ="50" value="{!! Input::old('fname') !!}" required>
                           @if ($errors->has('fname')) <p class="error-block" style="color:red;">@if (Lang::has(Session::get('lang_file').'.NAME_FIELD_IS_REQUIRED')!= '') {{  trans(Session::get('lang_file').'.NAME_FIELD_IS_REQUIRED') }}  @else {{ trans($OUR_LANGUAGE.'.NAME_FIELD_IS_REQUIRED') }} @endif</p> @endif
                           <input type="hidden" id="load_ship<?php //echo $z;?>" name="load_ship<?php //echo $z;?>" value="0">
                           </div>
                           </div>
                           </div>  
                           <div class="span"> 
                           <div class="form-group">
                           <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.ADDRESS_LINE1')!= '') {{  trans(Session::get('lang_file').'.ADDRESS_LINE1') }} @else {{ trans($OUR_LANGUAGE.'.ADDRESS_LINE1') }} @endif<span class="text-sub">*</span></label>
                           <div class="col-lg-8">
                           <input type="text" id="addr_line<?php //echo $z;?>" name="addr_line<?php //echo $z;?>" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ADDRESS_LINE1')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_ADDRESS_LINE1') }}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_ADDRESS_LINE1') }} @endif" maxlength="90" class="form-control span" value="{!! Input::old('addr_line') !!}" required>
                           @if ($errors->has('addr_line')) <p class="error-block" style="color:red;">@if (Lang::has(Session::get('lang_file').'.ADDRESS_FIELD_IS_REQUIRED')!= '') {{  trans(Session::get('lang_file').'.ADDRESS_FIELD_IS_REQUIRED') }} @else {{ trans($OUR_LANGUAGE.'.ADDRESS_FIELD_IS_REQUIRED') }} @endif</p> @endif  
                           </div>
                           </div>
                           </div>
                           </div>
                           <div class="row">
                              <div class="span">
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.ADDRESS_LINE2')!= '') {{  trans(Session::get('lang_file').'.ADDRESS_LINE2') }} @else {{ trans($OUR_LANGUAGE.'.ADDRESS_LINE2') }} @endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input type="text" id="addr1_line" name="addr1_line" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ADDRESS_LINE2')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_ADDRESS_LINE2') }}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_ADDRESS_LINE2') }} @endif"  class="form-control span" maxlength="90" value="{!! Input::old('addr1_line') !!}">
                                       @if ($errors->has('addr1_line')) 
                                       <p class="error-block" style="color:red;">@if (Lang::has(Session::get('lang_file').'.ADDRESS_FIELD_IS_REQUIRED')!= '') {{  trans(Session::get('lang_file').'.ADDRESS_FIELD_IS_REQUIRED') }} @else {{ trans($OUR_LANGUAGE.'.ADDRESS_FIELD_IS_REQUIRED') }} @endif</p>
                                       @endif   
                                    </div>
                                 </div>
                              </div>
                              <div class="span">
                                 <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('lang_file').'.COUNTRY')!= '') {{  trans(Session::get('lang_file').'.COUNTRY') }} @else {{ trans($OUR_LANGUAGE.'.COUNTRY') }} @endif<span class="text-sub">*</span></label>
                                 <div class="col-lg-8">
                                    <select class="form-control span" name="country" id="country" onChange="select_city_ajax(this.value,'')" >
                                       @foreach($shipping_addr_details as $ship_addr_det) @endforeach
                                       <option value="0">@if (Lang::has(Session::get('lang_file').'.SELECT_COUNTRY')!= '') {{  trans(Session::get('lang_file').'.SELECT_COUNTRY') }} @else {{ trans($OUR_LANGUAGE.'.SELECT_COUNTRY') }} @endif</option>
                                       @foreach($country_details as $country_fetch)
                                       <option value="{{ $country_fetch->co_name }}"  >
                                          @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                                          @php  $co_name = 'co_name'; @endphp
                                          @else @php  $co_name = 'co_name_'.Session::get('lang_code'); @endphp @endif
                                          {!!$country_fetch->$co_name!!} 
                                       </option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="span">
                                 <div class="">
                                    <div class="">
                                       <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('lang_file').'.STATE')!= '') {{  trans(Session::get('lang_file').'.STATE') }} @else {{ trans($OUR_LANGUAGE.'.STATE') }} @endif<span class="text-sub">*</span></label>
                                       <input type="text" id="state" name="state" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_STATE')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_STATE') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_STATE') }} @endif"  class="form-control span"  maxlength="50"  value="{!! Input::old('state') !!}">
                                       @if ($errors->has('state')) 
                                       <p class="error-block" style="color:red;">{{ $errors->first('state') }}</p>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              <div class="span">
                                 <div class="">
                                    <div class="">
                                       <div class="form-group">
                                          <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.CITY')!= '') {{  trans(Session::get('lang_file').'.CITY') }} @else {{ trans($OUR_LANGUAGE.'.CITY') }} @endif<span class="text-sub">*</span></label>
                                          <div class="col-lg-8">
                                             @foreach($country_details as $country_fetch) @endforeach
                                             @foreach($shipping_addr_details as $ship_addr_det) @endforeach
                                             <select class="form-control span" id="city" name="City">
                                                <option value="0">@if (Lang::has(Session::get('lang_file').'.SELECT_CITY')!= '') {{  trans(Session::get('lang_file').'.SELECT_CITY') }} @else {{ trans($OUR_LANGUAGE.'.SELECT_CITY') }} @endif </option>
                                                @foreach ($city_shipping as $city)
                                                <option value="{{ $city->ci_name }}"<?php if($city->ci_id==$ship_addr_det->ci_name && $country_fetch->co_id==$city->ci_con_id){ ?>selected<?php } ?>>
                                                   @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                                                   @php $ci_name = 'ci_name'; @endphp
                                                   @else @php  $ci_name = 'ci_name_'.Session::get('lang_code'); @endphp @endif
                                                   {!!$city->$ci_name!!}
                                                </option>
                                                @endforeach 
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="span">
                                 <div class="form-group">
                                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('lang_file').'.PHONE_NUMBER')!= '') {{  trans(Session::get('lang_file').'.PHONE_NUMBER') }} @else {{ trans($OUR_LANGUAGE.'.PHONE_NUMBER') }} @endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input type="text" class="form-control span"  placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_PHONENUMBER')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_PHONENUMBER');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_PHONENUMBER');} ?>" name="phone1_line<?php //echo $z;?>"  id="phone1_line<?php //echo $z;?>" maxlength="16" onkeypress="return isNumber(event)" value="{!! Input::old('phone1_line') !!}" required>
                                       @if ($errors->has('phone1_line')) 
                                       <p class="error-block" style="color:red;">@if (Lang::has(Session::get('lang_file').'.PHONE_NUMBER_FIELD_IS_REQUIRED')!= '') {{  trans(Session::get('lang_file').'.PHONE_NUMBER_FIELD_IS_REQUIRED') }}  @else {{ trans($OUR_LANGUAGE.'.PHONE_NUMBER_FIELD_IS_REQUIRED') }} @endif</p>
                                       @endif
                                       <?php /*?> <input type="text" class="form-control span1" onKeyup=" if($(this).val().length > 3){ $('#phone3_line<?php echo $z;?>').focus();}" placeholder="" id="phone2_line<?php echo $z;?>" maxlength="4">
                                       <input type="text" class="form-control span1" placeholder="" id="phone3_line<?php echo $z;?>" maxlength="4">
                                       <?php */?>
                                    </div>
                                 </div>
                              </div>
                              <div class="span">
                                 <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('lang_file').'.ZIP_CODE')!= '') {{  trans(Session::get('lang_file').'.ZIP_CODE') }} @else {{ trans($OUR_LANGUAGE.'.ZIP_CODE') }} @endif<span class="text-sub">*</span></label>
                                 <div class="col-lg-8">
                                    <input type="text" class="form-control span" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_ZIP_CODE')!= '') {{  trans(Session::get('lang_file').'.ENTER_ZIP_CODE') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_ZIP_CODE') }} @endif"  id="zipcode<?php //echo $z;?>" name="zipcode<?php //echo $z;?>" onkeypress="return isNumber(event)" maxlength="6" value="{!! Input::old('zipcode') !!}" >
                                    @if ($errors->has('zipcode')) 
                                    <p class="error-block" style="color:red;">{{ $errors->first('zipcode') }}</p>
                                    @endif
                                 </div>
                              </div>
                              <div class="span">
                                 <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('lang_file').'.EMAIL')!= '') {{  trans(Session::get('lang_file').'.EMAIL') }} @else {{ trans($OUR_LANGUAGE.'.EMAIL') }} @endif<span class="text-sub">*</span></label>
                                 <div class="col-lg-8">
                                    <input type="email" class="form-control span" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_EMAIL_ID')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_EMAIL_ID') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_EMAIL_ID') }} @endif" id="email_id<?php //echo $z;?>" name="email<?php //echo $z;?>"  maxlength="50" value="{!! Input::old('email') !!}">
                                    @if ($errors->has('email')) 
                                    <p class="error-block" style="color:red;">{{ $errors->first('email') }}</p>
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php // shipping address ends here ?>
                        @php  $z = 1; @endphp
                        @if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))                 
                        @php    $max = 1;
                        $overall_total_price=0;
                        $overall_shipping_price=0;
                        $overall_tax_price=0; @endphp
                        @for($i=0;$i<$max;$i++)
                        @php    $pid=$_SESSION['cart'][$i]['productid'];
                        $q=$_SESSION['cart'][$i]['qty']; @endphp
                        @php $z++; @endphp
                        @endfor @endif
                        @if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart']))                   
                        @php    $max=count($_SESSION['deal_cart']);
                        $overall_total_price='';
                        $overall_shipping_price='';
                        $overall_tax_price=''; @endphp
                        @for($i=0;$i<$max;$i++)
                        @php    $pid=$_SESSION['deal_cart'][$i]['productid'];
                        $q=$_SESSION['deal_cart'][$i]['qty']; @endphp
                        @php $z++; @endphp @endfor @endif
                        @endif
                        @if($count > 1)  
                        <div class="row">
                           <div class="span5">
                           </div>
                           <div class="span3 width-deal">
                              <div class="form-group">
                                 <label class="control-label col-lg-8" for="text1"> 
                                 <span class="text-sub"></span></label>
                                 <div class="col-lg-2">  
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endif
                        @foreach($shipping_addr_details as $ship_addr_det) @endforeach 
                        @if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) @php  $item_count_header1 = count($_SESSION['cart']); @endphp @else @php $item_count_header1 = 0; @endphp @endif
                        @if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart']))    @php $item_count_header2 = count($_SESSION['deal_cart']); @endphp @else @php $item_count_header2 = 0; @endphp @endif
                        @php $count = $item_count_header1 + $item_count_header2; @endphp
                        @if($count !=0) 
                        <input type="hidden" name="count_pid" id="count_pid" value="{{ $count }}" />
                        @if($shipping_addr_details) 
                        <input type="hidden" name="ship_name" id="ship_name" value="{{ $ship_addr_det->ship_name }}" />
                        <input type="hidden" name="ship_address1" id="ship_address1" value="{{ $ship_addr_det->ship_address1 }}" />
                        <input type="hidden" name="ship_address2" id="ship_address2" value="{{ $ship_addr_det->ship_address2 }}" />
                        <input type="hidden" name="ship_city" id="ship_city" value="{{ $ship_addr_det->ci_name }}" />
                        <input type="hidden" name="ship_state" id="ship_state" value="{{ $ship_addr_det->ship_state }}" />
                        <input type="hidden" name="ship_postalcode" id="ship_postalcode" value="<?php echo $ship_addr_det->ship_postalcode; ?>" />
                        <input type="hidden" name="ship_phone" id="ship_phone" value="{{ $ship_addr_det->ship_phone }}" />
                        <input type="hidden" name="ship_email" id="ship_email" value="{{ $ship_addr_det->ship_email }}" />
                        <input type="hidden" name="ship_country" id="ship_country" value="{{ $ship_addr_det->co_name }}" />
                        @endif
                        {{-- ship_country ship_ci_id --}}
                        @if(Session::get('coupon_total_amount') < 0)
                        @else
                        @if(count($general)>0)
                        @foreach($general as $gs)
                        @endforeach
                        @if($gs->gs_paypal_payment != '' || $gs->gs_payment_status != '') 
                        <div id="paypal_cod">
                           <label for="text1" class="control-label col-lg-8" style="margin-top:20px;">
                           @if (Lang::has(Session::get('lang_file').'.SELECT_PAYMENT_METHOD')!= '') {{  trans(Session::get('lang_file').'.SELECT_PAYMENT_METHOD') }} @else {{ trans($OUR_LANGUAGE.'.SELECT_PAYMENT_METHOD') }} @endif
                           &nbsp;
                           @if($gs->gs_paypal_payment == 'Paypal')    
                           <input type="radio" value="1" id="paypal_radio" name="select_payment_type" style="margin-top:-2px;"> @if (Lang::has(Session::get('lang_file').'.PAYPAL')!= '') {{  trans(Session::get('lang_file').'.PAYPAL') }} @else {{ trans($OUR_LANGUAGE.'.PAYPAL') }} @endif
                           @endif 

                           @php /*payumoney_check_out*/ @endphp
 
                              @if($gs->gs_payumoney_status == 'PayUmoney')  

                             <input type="radio" value="2" id="payumoney_radio" name="select_payment_type" style="margin-top:-2px;"> @if (Lang::has(Session::get('lang_file').'.PAYUMONEY')!= '') {{  trans(Session::get('lang_file').'.PAYUMONEY') }} @else {{ trans($OUR_LANGUAGE.'.PAYUMONEY') }} 
                             @endif @endif

                           @if($gs->gs_payment_status == 'COD') &nbsp;
                           <input type="radio"  value="0" id="cod_radio" name="select_payment_type" checked style="margin-top:-2px;"> @if (Lang::has(Session::get('lang_file').'.CASH_ON_DELIVERY')!= '') {{  trans(Session::get('lang_file').'.CASH_ON_DELIVERY') }} @else {{ trans($OUR_LANGUAGE.'.CASH_ON_DELIVERY') }} @endif
                           @endif
                           <span class="text-sub"></span></label>
                        </div>
                        @endif    
                        @endif        
                        @endif
                        <div class="col-lg-2">
                        </div>
                        <div class="row hide" id="cod_div">
                           <div class="span3">
                              <div class="form-group">
                                 <label for="text1" class="control-label col-lg-2"><img src="themes/images/cod_delivery.png" width="150" height="81">
                                 <span class="text-sub"></span></label>
                                 <div class="col-lg-8">
                                 </div>
                              </div>
                           </div>
                           <div class="span3">
                              <div class="form-group">
                                 <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>
                                 <div class="col-lg-8">
                                 </div>
                              </div>
                           </div>
                        </div>
                        @if(Session::get('coupon_total_amount') < 0)  
                        @else     
                        <div class="row" id="paypal_div" >
                           <div class="span3">
                              <div class="form-group">
                                 <label for="text1" class="control-label col-lg-2"><img src="themes/images/bn2.png" width="150" height="100">
                                 <span class="text-sub"></span></label>
                                 <div class="col-lg-8">
                                 </div>
                              </div>
                           </div>
                           <div class="span3">
                              <div class="form-group">
                                 <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>
                                 <div class="col-lg-8">
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endif
                        <legend></legend>
                        <div class="row">
                           <div class="span3">
                              <div class="form-group">
                                 <label for="text1" class="control-label col-lg-8"> 
                                 <span class="text-sub"></span></label>
                                 <div class="col-lg-2">  
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endif
                     </div>
                     @if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) @php     $item_count_header1 = count($_SESSION['cart']); @endphp @else @php $item_count_header1 = 0; @endphp @endif
                     @if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])) @php   $item_count_header2 = count($_SESSION['deal_cart']); @endphp  @else @php $item_count_header2 = 0; @endphp @endif
                     @php  $count = $item_count_header1 + $item_count_header2; @endphp
                     @if($count != 0) 
                     <div class="span6">
                        <div style="border: 1px solid #202020;
                           padding: 14px;" id="shipping_addr_div">
                           <h5 class="panel-deal">@if (Lang::has(Session::get('lang_file').'.ORDER_SUMMARY')!= '') {{  trans(Session::get('lang_file').'.ORDER_SUMMARY') }} @else {{ trans($OUR_LANGUAGE.'.ORDER_SUMMARY') }} @endif [ <small style="color:white !important">@if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) @php     $item_count_header1 = count($_SESSION['cart']); @endphp @else @php $item_count_header1 = 0; @endphp @endif 
                              @if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart']))@php   $item_count_header2 = count($_SESSION['deal_cart']); @endphp @else @php $item_count_header2 = 0; @endphp @endif
                              @php $item_count_header = $item_count_header1 + $item_count_header2; @endphp
                              <?php if($item_count_header != 0) { echo $item_count_header; } else { echo 0; } ?> Item(s) </small>]
                           </h5>
                           <legend></legend>
                           @php   $appliedCouponAmt = 0;                      
                           $z = 1;
                           $overall_total_price=0;
                           $overall_shipping_price=0;
                           $tax = 0;
                           $overall_tax_price=0;
                           $overall_tax_amt=0;
                           $overall_coupon_value=0;
                           $shipping_price=0;
                           $per_product_shipping = 0; @endphp
                           @if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))   
                           <h4>@if (Lang::has(Session::get('lang_file').'.PRODUCT_DETAILS')!= '') {{  trans(Session::get('lang_file').'.PRODUCT_DETAILS') }} @else {{ trans($OUR_LANGUAGE.'.PRODUCT_DETAILS') }} @endif </h4>
                           @php $max=count($_SESSION['cart']); @endphp
                           @for($i=0;$i<$max;$i++)
                           @php $pid=$_SESSION['cart'][$i]['productid'];
                           $q=$_SESSION['cart'][$i]['qty'];
                           $size=$size_result[$_SESSION['cart'][$i]['size']];
                           $color=$color_result[$_SESSION['cart'][$i]['color']];
                           $pname="Have to get"; @endphp
                           @foreach($result_cart[$pid] as $session_cart_result) 
                           @php $product_img=explode('/**/',$session_cart_result->pro_Img); 
                           $session_pro_id = $_SESSION['cart'][$i]['productid'];
                           $session_color_id = $_SESSION['cart'][$i]['color'];
                           $session_size_id = $_SESSION['cart'][$i]['size'];
                           $session_customer_id = Session::get('customerid');
                           $coupon_details ='';
                           $coupon_details =  DB::table('nm_coupon_purchage')->where('product_id','=',$session_pro_id)->where('sold_user','=',$session_customer_id)->where('color','=',$session_color_id)->where('size','=',$session_size_id)->where('type_of_coupon','=',1)->first(); 
                           $coupon_details_all =  DB::table('nm_coupon_purchage')->where('sold_user','=',$session_customer_id)->first();
                           $type_of_coupon_details =  DB::table('nm_coupon_purchage')->where('sold_user','=',$session_customer_id)->whereRaw('type_of_coupon=2 or type_of_coupon=3')->first(); @endphp
                           @if(isset($coupon_details) && $coupon_details != "") 
                           @php $tax= $session_cart_result->pro_inctax;
                           $overall_tax_price= ((($session_cart_result->pro_disprice * $q) * $tax)/100);
                           $item_total_price = ($session_cart_result->pro_disprice * $q)+ $overall_tax_price;  
                           $overall_total_price += ($item_total_price);  
                           $overall_shipping_price +=($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_shippamt);
                           $per_product_shipping = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_shippamt);
                           $appliedCouponAmt += $coupon_details->value; @endphp
                           @elseif($type_of_coupon_details != "")
                           @if($type_of_coupon_details->type !=  '') 
                           @php $product_qty_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);
                           $overall_coupon_value = $type_of_coupon_details->value;
                           $tax=               $session_cart_result->pro_inctax;
                           $overall_tax_price= ((($product_qty_price)*$tax)/100);
                           $appliedCouponAmt = $overall_coupon_value;
                           $flat = $type_of_coupon_details->value * $product_qty_price;
                           $flat_less = $flat / Session::get('user_total_amount');
                           $rount_total_price = ($product_qty_price -  $flat_less);                                 
                           $item_total_price = ($product_qty_price) + $overall_tax_price; 
                           $overall_total_price += round($item_total_price,2);  
                           $overall_shipping_price +=($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_shippamt);
                           $per_product_shipping = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_shippamt); @endphp
                           @endif    
                           @else
                           @php $product_qty_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);
                           $overall_shipping_price += ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_shippamt);
                           $per_product_shipping = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_shippamt);
                           $tax=               $session_cart_result->pro_inctax;
                           $overall_tax_price =((($product_qty_price)*$tax)/100);
                           $item_total_price = ($product_qty_price + $overall_tax_price);
                           $overall_total_price += round($item_total_price,2);  @endphp
                           @endif
                           @php $delivery_date[$z] = '+'.$session_cart_result->pro_delivery.'days';
                           $overall_tax_amt+= round($overall_tax_price,2); @endphp
                           <div class="row">
                              <div class="span3">
                                 <div class="form-group">
                                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('lang_file').'.SHIPMENT')!= '') {{  trans(Session::get('lang_file').'.SHIPMENT') }} @else {{ trans($OUR_LANGUAGE.'.SHIPMENT') }} @endif {{ $z }} <span class="text-sub">*</span></label>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="span3">
                                 <div class="form-group">
                                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('lang_file').'.ESTIMATED_DELIVERY')!= '') {{  trans(Session::get('lang_file').'.ESTIMATED_DELIVERY') }} @else {{ trans($OUR_LANGUAGE.'.ESTIMATED_DELIVERY') }} @endif<span class="text-sub"> <?php  echo date('D d, M Y', strtotime($delivery_date[$z]));?></span></label>
                                 </div>
                              </div>
                           </div>
                           <legend></legend>
                           <div class="row product_select" style="margin:0px auto" id="product_select_div<?php echo $pid;?>">
                              <div class="span2 check-wid">
                                 <?php 
                                    $pro_img = $product_img[0];
                                      $prod_path = url('').'/public/assets/default_image/No_image_product.png';
                                    
                                    if($product_img != '') // image is null
                                        {  
                                    
                                          
                                          $img_data = "public/assets/product/".$pro_img;
                                              if(file_exists($img_data) && $pro_img !='')  //image not exists in folder 
                                                                    {
                                    $prod_path = url('').'/public/assets/product/'.$pro_img;
                                                                     }
                                              else{  
                                                     if(isset($DynamicNoImage['productImg']))
                                                     {                  
                                                        $dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg'];
                                                        if($DynamicNoImage['productImg'] !='' && file_exists($dyanamicNoImg_path))
                                                        { 
                                                            $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg'];
                                                        }
                                                                            
                                                     }
                                                                         
                                                                         
                                                    } ?>
                                 <?php  } else
                                    {
                                        
                                        if(isset($DynamicNoImage['productImg'])) // check no_image_product is exist 
                                                 {                      
                                                    $dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg'];
                                                    if($DynamicNoImage['productImg'] !='' && file_exists($dyanamicNoImg_path))
                                                    { 
                                                        $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg'];
                                                    }
                                                
                                                 }
                                    
                                    } ?>        
                                 <img src="{{ $prod_path }}" alt="{{ $session_cart_result->pro_title }}" width="100" height="auto" style="padding:10px">
                              </div>
                              <div class="span3">
                                 <label><strong> 
                                 @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                                 @php $pro_title = 'pro_title'; @endphp
                                 @else @php  $pro_title = 'pro_title_'.Session::get('lang_code'); @endphp @endif
                                 {{ $session_cart_result->$pro_title }}</strong></label>
                                 <label>
                                 @if($size != "-" )  @if (Lang::has(Session::get('lang_file').'.SIZE')!= '') {{  trans(Session::get('lang_file').'.SIZE') }}@else {{ trans($OUR_LANGUAGE.'.SIZE') }} @endif:<b><?php echo $size;?></b> @endif<br>@if($color != "-" )  @if (Lang::has(Session::get('lang_file').'.COLOR')!= '') {{  trans(Session::get('lang_file').'.COLOR') }} @else {{ trans($OUR_LANGUAGE.'.COLOR') }} @endif:<b><?php echo $color;?> </b>@endif
                                 </label>
                                 <label>
                                 Unit @if (Lang::has(Session::get('lang_file').'.PRICE')!= '') {{  trans(Session::get('lang_file').'.PRICE') }} @else {{ trans($OUR_LANGUAGE.'.PRICE') }} @endif:{{ Helper::cur_sym() }} <b><?php echo $session_cart_result->pro_disprice;?></b>
                                 &nbsp; &nbsp;
                                 @if (Lang::has(Session::get('lang_file').'.QTY')!= '') {{ trans(Session::get('lang_file').'.QTY') }} @else {{ trans($OUR_LANGUAGE.'.QTY') }} @endif:<?php echo $q;?>
                                 </label>
                                 @if($coupon_details != "") 
                                 <label><?php if (Lang::has(Session::get('lang_file').'.TYPE_OF_COUPON')!= '') { echo  trans(Session::get('lang_file').'.TYPE_OF_COUPON');}  else { echo trans($OUR_LANGUAGE.'.TYPE_OF_COUPON');} ?>: <?php if($coupon_details->type == 1){ echo "Flat";}elseif($coupon_details->type == 2){ echo "Percentage";}?><span class="pull-right"><?php if (Lang::has(Session::get('lang_file').'.VALUE')!= '') { echo  trans(Session::get('lang_file').'.VALUE');}  else { echo trans($OUR_LANGUAGE.'.VALUE');} ?>: <?php if($coupon_details->type == 1){ ?>{{ Helper::cur_sym() }}  <?php echo $coupon_details->value;} elseif($coupon_details->type == 2){ echo $coupon_details->value;}?></span></label>
                                 @endif
                                 <label>
                                 @if (Lang::has(Session::get('lang_file').'.TOTAL')!= '') {{  trans(Session::get('lang_file').'.TOTAL') }} @else {{ trans($OUR_LANGUAGE.'.TOTAL') }} @endif:{{ Helper::cur_sym() }} 
                                 <b>
                                 @if($item_total_price < 0)
                                 {{ '0.00' }}
                                 @else
                                 {{ round($item_total_price,2) }}
                                 @endif </b>
                                 @if($session_cart_result->pro_inctax !='' || $session_cart_result->pro_inctax!=0)
                                 (<?php if (Lang::has(Session::get('lang_file').'.INCLUDING')!= '') { echo  trans(Session::get('lang_file').'.INCLUDING');}  else { echo trans($OUR_LANGUAGE.'.INCLUDING');} ?> <?php echo $session_cart_result->pro_inctax.' % '; if (Lang::has(Session::get('lang_file').'.TAXES')!= '') { echo  trans(Session::get('lang_file').'.TAXES');}  else { echo trans($OUR_LANGUAGE.'.TAXES');} ?>)
                                 @endif
                                 </label>
                                 <label>
                                 @if (Lang::has(Session::get('lang_file').'.SHIPPING')!= '') {{  trans(Session::get('lang_file').'.SHIPPING') }} @else {{ trans($OUR_LANGUAGE.'.SHIPPING') }} @endif:{{ Helper::cur_sym() }} <?php echo $per_product_shipping;?> 
                                 </label>
                              </div>
                           </div>
                           <br>
                           <?php 
                              //$overall_pro_price = $overall_total_price;  ?>
                           <input type="hidden" name="item_name[<?php echo $z;?>]" value="<?php echo $session_cart_result->pro_title; ?>" />
                           <input type="hidden" name="item_type[<?php echo $z;?>]" value="1" />
                           <input type="hidden" name="item_code[<?php echo $z;?>]" value="<?php echo $pid; ?>" />
                           <input type="hidden" name="item_desc[<?php echo $z;?>]" value="<?php echo strip_tags($session_cart_result->pro_desc); ?>" />
                           <input type="hidden" name="item_qty[<?php echo $z;?>]" value="<?php echo $q; ?>" />
                           <input type="hidden" name="item_color[<?php echo $z;?>]" value="<?php echo $_SESSION['cart'][$i]['color']; ?>" />
                           <input type="hidden" name="item_size[<?php echo $z;?>]" value="<?php echo $_SESSION['cart'][$i]['size']; ?>" />
                           <input type="hidden" name="item_color_name[<?php echo $z;?>]" value="<?php echo $color; ?>" />
                           <input type="hidden" name="item_size_name[<?php echo $z;?>]" value="<?php echo $size; ?>" />
                           <input type="hidden" name="item_price[<?php echo $z;?>]" value="<?php echo $session_cart_result->pro_disprice; ?>" />
                           <?php //} ?>
                           <!-- For Wallet Cash pack fetch -->
                           <input type="hidden" name="item_cash_pack[<?php echo $z;?>]" value="<?php echo $session_cart_result->cash_pack; ?>" />
                           <input type="hidden" name="item_tax[<?php echo $z;?>]" value="<?php echo $session_cart_result->pro_inctax; ?>" />
                           <input type="hidden" name="item_shipping[<?php echo $z;?>]" value="<?php echo $session_cart_result->pro_shippamt; ?>" />
                           <input type="hidden" name="item_totprice[<?php echo $z;?>]" value="<?php echo $item_total_price; ?>" />
                           <input type="hidden" name="item_merchant[<?php echo $z;?>]" value="<?php echo $session_cart_result->pro_mr_id; ?>" />
                           @php $no_item_found = 1;  $z++; @endphp @endforeach @endfor  @endif      
                           @php 
                           $overall_deal_total_price=0;
                           $overall_deal_shipping_price=0;
                           $overall_deal_tax_price=0; @endphp
                           @if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart']))                
                           @php $max=count($_SESSION['deal_cart']); @endphp
                           @for($i=0;$i<$max;$i++)
                           @php $pid=$_SESSION['deal_cart'][$i]['productid'];
                           $q=$_SESSION['deal_cart'][$i]['qty'];
                           $pname="Have to get"; @endphp
                           @foreach($result_cart_deal[$pid] as $session_deal_cart_result) 
                           @php $product_img=explode('/**/',$session_deal_cart_result->deal_image); 
                           $deal_qty_price = ($_SESSION['deal_cart'][$i]['qty']) * ($session_deal_cart_result->deal_discount_price );
                           $tax =               $session_deal_cart_result->deal_inctax;
                           $overall_tax_price =((($deal_qty_price)*$tax)/100);
                           $overall_tax_amt += round($overall_tax_price,2);
                           $item_total_price = ($deal_qty_price + $overall_tax_price);
                           $session_customer_id = Session::get('customerid');
                           $coupon_details_all =  DB::table('nm_coupon_purchage')->where('sold_user','=',$session_customer_id)->first();
                           $overall_deal_total_price += round($item_total_price,2); 
                           $overall_deal_shipping_price +=($_SESSION['deal_cart'][$i]['qty']) * ($session_deal_cart_result->deal_shippamt);
                           $overall_deal_tax_price +=0; @endphp
                           <h4>@if (Lang::has(Session::get('lang_file').'.DEAL_DETAILS')!= '') {{  trans(Session::get('lang_file').'.DEAL_DETAILS') }} @else {{ trans($OUR_LANGUAGE.'.DEAL_DETAILS') }} @endif </h4>
                           <div class="row">
                              <div class="span3">
                                 <div class="form-group">
                                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('lang_file').'.SHIPMENT')!= '') {{  trans(Session::get('lang_file').'.SHIPMENT') }} @else {{ trans($OUR_LANGUAGE.'.SHIPMENT') }} @endif <?php echo $z;?> <span class="text-sub">*</span></label>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="span3">
                              </div>
                           </div>
                           <legend></legend>
                           <div class="row product_select" style="margin:0px auto" id="product_select_div<?php echo $pid;?>">
                              <div class="span2">
                                 <?php 
                                    $pro_img = $product_img[0];
                                      $prod_path = url('').'/public/assets/default_image/No_image_product.png';
                                    
                                    if($product_img != '') // image is null
                                        {  
                                    
                                          
                                          $img_data = "public/assets/deals/".$pro_img;
                                              if(file_exists($img_data) && $pro_img !='')  //image not exists in folder 
                                                                    {
                                                                            $prod_path = url('').'/public/assets/deals/'.$pro_img;
                                                                     }
                                              else{  
                                                     if(isset($DynamicNoImage['productImg']))
                                                     {                  
                                                        $dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg'];
                                                        if($DynamicNoImage['productImg'] !='' && file_exists($dyanamicNoImg_path))
                                                        { 
                                                            $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg'];
                                                        }
                                                                            
                                                     }
                                                                         
                                                                         
                                                    } ?>
                                 <?php  } else
                                    {
                                        
                                        if(isset($DynamicNoImage['productImg'])) // check no_image_product is exist 
                                                 {                      
                                                    $dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg'];
                                                    if($DynamicNoImage['productImg'] !='' && file_exists($dyanamicNoImg_path))
                                                    { 
                                                        $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg'];
                                                    }
                                                
                                                 }
                                    
                                    } ?>        
                                 <img src="{{ $prod_path }}" alt="{{ $session_deal_cart_result->deal_title }}" width="100" height="auto" style="padding:10px">
                              </div>
                              <div class="span3">
                                 <label><b> 
                                 @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                                 @php   $deal_title = 'deal_title'; @endphp
                                 @else @php  $deal_title = 'deal_title_'.Session::get('lang_code'); @endphp @endif
                                 {{ $session_deal_cart_result->$deal_title }}</b></label>
                                 <?php /*?><label>Size:<?php //echo $size;?> - Color: <?php //echo $color;?> <span class="pull-right">Qty:<?php //echo $q;?></span></label><?php */?>
                                 <label>
                                 @if (Lang::has(Session::get('lang_file').'.PRICE')!= '') {{  trans(Session::get('lang_file').'.PRICE') }} @else {{ trans($OUR_LANGUAGE.'.PRICE') }} @endif: <b>{{ Helper::cur_sym() }} {{ $session_deal_cart_result->deal_discount_price }}</b>
                                 @if (Lang::has(Session::get('lang_file').'.QTY')!= '') {{  trans(Session::get('lang_file').'.QTY') }} @else {{ trans($OUR_LANGUAGE.'.QTY') }} @endif: <?php echo $q;?>
                                 </label>
                                 <?php /*?><label>Shipping:$<?php echo $session_cart_result->pro_shippamt;?> <span class="pull-right">Tax:$<?php echo $session_cart_result->pro_inctax.'.00';?></span></label><?php */?>
                                 <label><br>
                                 <span class="">@if (Lang::has(Session::get('lang_file').'.TOTAL')!= '') {{  trans(Session::get('lang_file').'.TOTAL') }} @else {{ trans($OUR_LANGUAGE.'.TOTAL') }} @endif :{{ Helper::cur_sym() }} <?php echo $item_total_price;?> 
                                 @if($session_deal_cart_result->deal_inctax !='' || $session_deal_cart_result->deal_inctax !=0)
                                 (<?php if (Lang::has(Session::get('lang_file').'.INCLUDING')!= '') { echo  trans(Session::get('lang_file').'.INCLUDING');}  else { echo trans($OUR_LANGUAGE.'.INCLUDING');} ?>  <?php echo $session_deal_cart_result->deal_inctax.' % ';  if (Lang::has(Session::get('lang_file').'.TAXES')!= '') { echo  trans(Session::get('lang_file').'.TAXES');}  else { echo trans($OUR_LANGUAGE.'.TAXES');} ?>) @endif</span>
                                 </label>
                              </div>
                           </div>
                           <br>
                           <input type="hidden" name="item_name[<?php echo $z;?>]" value="<?php echo $session_deal_cart_result->deal_title; ?>" />
                           <input type="hidden" name="item_type[<?php echo $z;?>]" value="2" />
                           <input type="hidden" name="item_code[<?php echo $z;?>]" value="<?php echo $pid; ?>" />
                           <input type="hidden" name="item_desc[<?php echo $z;?>]" value="<?php echo strip_tags($session_deal_cart_result->deal_description); ?>" />
                           <input type="hidden" name="item_qty[<?php echo $z;?>]" value="<?php echo $q; ?>" />
                           <input type="hidden" name="item_color[<?php echo $z;?>]" value="" />
                           <input type="hidden" name="item_size[<?php echo $z;?>]" value="" />
                           <input type="hidden" name="item_color_name[<?php echo $z;?>]" value="" />
                           <input type="hidden" name="item_size_name[<?php echo $z;?>]" value="" />
                           <input type="hidden" name="item_price[<?php echo $z;?>]" value="<?php echo $session_deal_cart_result->deal_discount_price; ?>" />
                           <!-- For Wallet Cash pack fetch -->
                           <input type="hidden" name="item_cash_pack[<?php echo $z;?>]" value="0" />
                           <input type="hidden" name="item_tax[<?php echo $z;?>]" value="<?php echo $session_deal_cart_result->deal_inctax; ?>" />
                           <input type="hidden" name="item_shipping[<?php echo $z;?>]" value="<?php echo $session_deal_cart_result->deal_shippamt; ?>" />
                           <input type="hidden" name="item_totprice[<?php echo $z;?>]" value="<?php echo $item_total_price; ?>" />
                           <input type="hidden" name="item_merchant[<?php echo $z;?>]" value="<?php echo $session_deal_cart_result->deal_merchant_id; ?>" />
                           @php $no_item_found = 1; $z++; @endphp @endforeach @endfor   @endif      
                           <legend></legend>
                           <input type="hidden" name="product_total" id="product_total" value="<?php echo ($overall_total_price + $overall_deal_total_price)-$overall_tax_amt; ?>">
                           <div class="hide" id="wallet">
                              @php   $product_total  =  ($overall_total_price + $overall_deal_total_price + $overall_shipping_price + $overall_deal_shipping_price); 
                              $customer_wallet_amount = DB::table('nm_customer')->where('cus_id','=',Session::get('customerid'))->where('cus_status','=',0)->first(); @endphp
                              @if(count($customer_wallet_amount)>0)     
                              @if($customer_wallet_amount->wallet != 0)
                              <div class="form-group">
                                 <label class="control-label col-lg-3" for="pass1"><span class="text-sub" id="error_div" style="color:red;"></span></label>
                                 <div class="col-lg-8">
                                    <input name="checkbox" onclick="wallet_usage(<?php echo $customer_wallet_amount->wallet;?>, $(this), <?php echo $product_total-$appliedCouponAmt;?>);" type="checkbox" id="checkbox" />
                                    @if (Lang::has(Session::get('lang_file').'.USE_WALLET')!= '') {{  trans(Session::get('lang_file').'.USE_WALLET') }} @else {{ trans($OUR_LANGUAGE.'.USE_WALLET') }} @endif 
                                    <input type="text" value=" {{ Helper::cur_sym() }} <?php echo $customer_wallet_amount->wallet;?>" readonly>
                                    <input type="hidden" id="user_wallet_amount" name="user_wallet_amount" value="<?php echo $customer_wallet_amount->wallet;?>">
                                 </div>
                              </div>
                              <br>
                              @endif @endif
                           </div>
                           <div class="row">
                              <div class="span3 width-deal">
                                 <div class="form-group">
                                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('lang_file').'.ORDER_SUBTOTAL')!= '') {{  trans(Session::get('lang_file').'.ORDER_SUBTOTAL') }} @else {{ trans($OUR_LANGUAGE.'.ORDER_SUBTOTAL') }} @endif:<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                    </div>
                                 </div>
                              </div>
                              <div class="span3 width-deal">
                                 <div class="form-group">
                                    <label class="control-label col-lg-2" for="text1" id="wallet_apply_total">{{ Helper::cur_sym() }} <?php
                                       //echo $overall_tax_amt; 
                                       if($overall_total_price < 0){
                                           echo '0.00';
                                       }
                                       else{
                                           echo round(($overall_total_price + $overall_deal_total_price),2);
                                       }
                                       ?></label>
                                    <input type="hidden" name="subtotal" id="subtotal" value="<?php echo ($overall_total_price + $overall_deal_total_price); ?>" />
                                    <div class="col-lg-8">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="span3 width-deal">
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.ORDER_SHIPPING')!= '') {{  trans(Session::get('lang_file').'.ORDER_SHIPPING') }} @else {{ trans($OUR_LANGUAGE.'.ORDER_SHIPPING') }} @endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                    </div>
                                 </div>
                              </div>
                              <div class="span3 width-deal">
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">{{ Helper::cur_sym() }} <?php echo ($overall_shipping_price + $overall_deal_shipping_price).'.00';?></label>
                                    <input type="hidden" name="shipping_price" value="<?php echo ($overall_shipping_price + $overall_deal_shipping_price); ?>" />
                                    <div class="col-lg-8">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @if($appliedCouponAmt>0)
                           <div class="row">
                              <div class="span3 width-deal">
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.COUPON_AMOUNT')!= '') {{  trans(Session::get('lang_file').'.COUPON_AMOUNT') }} @else {{ trans($OUR_LANGUAGE.'.COUPON_AMOUNT') }} @endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                    </div>
                                 </div>
                              </div>
                              <div class="span3 width-deal">
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">{{ Helper::cur_sym() }} {{ ($appliedCouponAmt) }}</label>
                                    <input type="hidden" name="coupon_amount" value="<?php echo ($appliedCouponAmt); ?>" />
                                    <div class="col-lg-8">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endif
                           <div id="if_wallet" class="row hide">
                              <div class="span3 width-deal">
                                 <div class="form-group">
                                    <label>@if (Lang::has(Session::get('lang_file').'.WALLET_USED')!= '') {{  trans(Session::get('lang_file').'.WALLET_USED') }} @else {{ trans($OUR_LANGUAGE.'.WALLET_USED') }} @endif</label>
                                 </div>
                              </div>
                              <div class="span3 width-deal">
                                 <div class="form-group" > 
                                    - {{ Helper::cur_sym() }}<span id="wallet_used"></span>
                                    <input type="hidden" name="wallet_used_amount" id="wallet_used_amount" value="0">
                                 </div>
                              </div>
                           </div>
                           <div class="row" style="display: none;">
                              <div class="span3 width-deal">
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('lang_file').'.ORDER_TAX')!= '') {{  trans(Session::get('lang_file').'.ORDER_TAX') }} @else {{ trans($OUR_LANGUAGE.'.ORDER_TAX') }} @endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                    </div>
                                 </div>
                              </div>
                              <div class="span3 width-deal">
                                 <div class="form-group">
                                    <?php 
                                       if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){    
                                           $avg = count($_SESSION['cart']); 
                                       }else { 
                                           $avg = 0; 
                                       } 
                                       
                                       $overall_per_pro_tax = 0; 
                                       $overall_per_deal_tax = 0; ?> 
                                    <label for="text1" class="control-label col-lg-2"><?php echo ($overall_tax_amt + $overall_deal_tax_price).' %';?></label>
                                    <input type="hidden" name="tax_price" value="<?php echo round(($overall_tax_amt+ $overall_deal_tax_price),2); ?>" />
                                    <div class="col-lg-8">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="span3 width-deal">
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2 me_color">@if (Lang::has(Session::get('lang_file').'.ORDER_TOTAL')!= '') {{ trans(Session::get('lang_file').'.ORDER_TOTAL') }} @else {{ trans($OUR_LANGUAGE.'.ORDER_TOTAL') }} @endif:<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                    </div>
                                 </div>
                              </div>
                              <div class="span3 width-deal">
                                 <div class="form-group">
                                    @php
                                    $overall_pro_price = $overall_total_price + ($overall_shipping_price); 
                                    $overall_deal_price = ($overall_deal_total_price+$overall_deal_shipping_price) + (($overall_deal_total_price+$overall_deal_shipping_price) *($overall_deal_tax_price/100));  @endphp 
                                    <label for="text1" class="control-label col-lg-2 me_color" >
                                       <h5> {{ Helper::cur_sym() }}
                                          <span id="wallet_apply_final_total">
                                          @php $total_amount = round(($overall_pro_price + $overall_deal_price - $appliedCouponAmt),2);
                                          echo $total_amount;
                                          $price = round(($overall_pro_price+$overall_deal_price - $appliedCouponAmt),2) ;          
                                          @endphp</span>
                                    </label>
                                    </h5>
                                    <input type="hidden" name="grand_total" id="grand_total" value="{{ $price }}">
                                    <input type="hidden" name="old_grand_total" id="old_grand_total" value="{{ $price }}">
                                    <?php /*not using this totalprice & total price1 & walletcall function, (saranya)*/ ?>
                                    <input type="hidden" name="total_price" id="total_price" value="<?php echo round(($overall_pro_price+$overall_deal_price),2); ?>" />
                                    <input type="hidden" name="total_price1" id="total_price1" value="<?php echo round(($overall_pro_price+$overall_deal_price),2); ?>" />
                                    <div class="col-lg-8">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endif
                           <div class="form-group">
                              <br>
                              <label class="control-label col-lg-3" for="pass1"><span class="text-sub" id="error_div" style="color:red;"></span></label>
                              <div class="col-lg-8">
                                 @if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) @php $item_count_header1 = count($_SESSION['cart']); @endphp @else @php $item_count_header1 = 0; @endphp @endif 
                                 @if(isset($_SESSION['deal_cart'])&& !empty($_SESSION['deal_cart'])) @php    $item_count_header2 = count($_SESSION['deal_cart']); @endphp @else @php $item_count_header2 = 0; @endphp @endif
                                 @php $count = $item_count_header1 + $item_count_header2; @endphp
                                 @if($count != 0) 
                                 <input type="hidden" name="count_session" id="count_session" value="<?php echo $count; ?>" />
                                 @if(count($general)>0)
                                 @foreach($general as $gs)
                                 @endforeach
                                 @if($gs->gs_paypal_payment != '' || $gs->gs_payment_status != '') 
                                 <button type="submit" id="place_order_submit" class="btn sub-mit btn-sm btn-grad" style="">@if (Lang::has(Session::get('lang_file').'.PLACE_ORDER')!= '') {{  trans(Session::get('lang_file').'.PLACE_ORDER') }} @else {{ trans($OUR_LANGUAGE.'.PLACE_ORDER') }} @endif</button>
                                 @else
                                 <p>@if (Lang::has(Session::get('lang_file').'.NO_PAYMENT_METHOD_AVAILABLE')!= '') {{  trans(Session::get('lang_file').'.NO_PAYMENT_METHOD_AVAILABLE') }}  @else {{ trans($OUR_LANGUAGE.'.NO_PAYMENT_METHOD_AVAILABLE') }} @endif</p>
                                 @endif 
                                 @endif 
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                     </form>
                  </div>
                     @if(empty($item_count_header))
                     <div class="span6">
                        <h5>@if (Lang::has(Session::get('lang_file').'.ORDER_SUMMARY')!= '') {{ trans(Session::get('lang_file').'.ORDER_SUMMARY') }} @else {{ trans($OUR_LANGUAGE.'.ORDER_SUMMARY') }} @endif [ <small ><?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){     $item_count_header1 = count($_SESSION['cart']); } else { $item_count_header1 = 0; } 
                           if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])){  $item_count_header2 = count($_SESSION['deal_cart']); } else { $item_count_header2 = 0; }
                           
                            $item_count_header = $item_count_header1 + $item_count_header2;
                           
                            if($item_count_header != 0) { echo $item_count_header; } else { echo 0; } ?> <?php if (Lang::has(Session::get('lang_file').'.ITEM(S)')!= '') { echo  trans(Session::get('lang_file').'.ITEM(S)');}  else { echo trans($OUR_LANGUAGE.'.ITEM(S)');} ?> </small>]</h5>
                        <legend></legend>
                        <div class="row">
                           <div class="span3">
                              <div class="form-group">
                                 <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('lang_file').'.NO_ORDERS_PLACED')!= '') {{  trans(Session::get('lang_file').'.NO_ORDERS_PLACED') }} @else {{ trans($OUR_LANGUAGE.'.NO_ORDERS_PLACED') }} @endif </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- MainBody End ============================= -->
      <!-- Footer ================================================================== -->
      {!! $footer !!}
      <!-- Placed at the end of the document so the pages load faster ============================================= -->
      <script src="<?php echo url(''); ?>/themes/js/jquery.js" type="text/javascript"></script>
      <script src="<?php echo url(''); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="<?php echo url(''); ?>/themes/js/google-code-prettify/prettify.js"></script>
      <script src="<?php echo url(''); ?>/themes/js/bootshop.js"></script>
      <script src="<?php echo url(''); ?>/themes/js/jquery.lightbox-0.5.js"></script>
      <script>
         function select_city_ajax(id,city_name)
            
         {
            //alert(id);
             var passData = 'id='+id+'&city='+city_name;
             //alert(passData);
               $.ajax( {
                      type: 'get',
                      data: passData,
                      url: '<?php echo url('register_getcityname'); ?>',
                      success: function(responseText){  
                     // alert(responseText);
                       if(responseText)
                       { 
                        $('#city').html(responseText);                     
                       }
                    }       
                });     
         }
         
         function shipping_addr_func(val)
         
            {
            
            
         
            //alert(pid+'-'+val);
         
            var ship_name = $('#ship_name').val(); 
         
            var ship_address1 = $('#ship_address1').val();
         
            var ship_address2 = $('#ship_address2').val();
         
            var ship_city = $('#ship_city').val();
         
            var ship_state =  $('#ship_state').val();
         
            var ship_postalcode = $('#ship_postalcode').val();
         
            var ship_phone =  $('#ship_phone').val();
         
                var ship_email =  $('#ship_email').val();  
         
            var ship_country = $('#ship_country').val();
            //alert(ship_country);
            
            if( val > 0)
         
            {
         
            $('#fname').val(ship_name);
         
            $('#lname').val('');
         
            $('#addr_line').val(ship_address1);
         
            $('#state').val(ship_address2);
            
           select_city_ajax(ship_country,ship_city);
            //$('#city').val(select_city_ajax(ship_country,ship_city));
         
         
            $('#state').val(ship_state);
         
                $('#country').val(ship_country);
         
            $('#phone1_line').val(ship_phone);
         
            $('#zipcode').val(ship_postalcode); 
         
                $('#email_id').val(ship_email);
         
            
         
            $('#load_ship').val(1);
                
            }
         
            else
         
            {
         
                $('#fname').val('');
         
                $('#lname').val('');
         
                $('#addr_line').val('');
         
                $('#addr1_line').val('');
         
                $('#city').val('');
         
                $('#state').val('');
         
                    $('#country').val('');
         
                $('#phone1_line').val('');
         
                $('#zipcode').val('');
         
                    $('#email_id').val(''); 
         
                $('#load_ship').val(0);
         
            }
         
         }
         
         $(document).ready(function(){
         
            $('#cod_div').show();
            $('#paypal_div').hide();
            
            $('#paypal_radio').click(function()
            {           
                $('#paypal_div').show();
                $('#cod_div').hide();   
                    $('#wallet').show();    //by only using online payment user should use wallet
            });
            $('#cod_radio').click(function()
            {           
                $('#paypal_div').hide();
                $('#cod_div').show();
                    $('#wallet').hide();
            });
            $('#mulshipping_addr_1rad').click(function()
            {   
                $('.shipping_addr_class').css("display","block");
            });
            $('#mulshipping_addr_2rad').click(function()
            {
                $('.shipping_addr_class').css("display","none");
                $('#shipping_addr_div1').css("display","block");
            });
         
            $('#fname').bind('keyup blur',function(){ 
                var node = $(this);
                node.val(node.val().replace(/[^a-z 0-9 A-Z_-]/,'') ); }
            );
            
            $('#addr_line').bind('keyup blur',function(){ 
                var node = $(this);
                node.val(node.val().replace(/[^a-z 0-9 A-Z_-]/,'') ); }
            );
            
            $('#addr1_line').bind('keyup blur',function(){ 
                var node = $(this);
                node.val(node.val().replace(/[^a-z 0-9 A-Z_-]/,'') ); }
            );
            
            $('#state').bind('keyup blur',function(){ 
                var node = $(this);
                node.val(node.val().replace(/[^a-z  A-Z_-]/,'') ); }
            );       
            
            
            
            var count = $('#count_pid').val();
         
            var zip_regex =  /[0-9-()+]{6,7}/;
         
            var phone_regex =  /[0-9-()+]{8,10}/;
         
            $('#place_order_submit').click(function(){
        var pay_typ=$('input:radio[name=select_payment_type]:checked').val();
       /*payumoney_check_out*/
        if(parseInt(pay_typ)==2){
            $('#payment_').attr('action','payumoney_check_out_payumoney');
        }  
                //alert($('#city').val());
                //alert($('input:radio[name=mul_shipping_addr]:checked').val());
                if($('#country').val() == 0)
         
                    {
         
                        alert("select your country");
         
                        return false;
         
                    }
                if($('#city').val() == 0)
         
                    {
         
                        alert("select your city");
         
                        return false;
         
                    }
                
                if($('input:radio[name=mul_shipping_addr]:checked').val()=="yes")
         
                {
         
                
                
                
                for(var i=1;i<=count;i++)
         
                { 
         
                    if($('#fname'+i).val() == '')
         
                    {
         
                        $('#fname'+i).css("border","1px solid red");
         
                        $('#fname'+i).focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_FIRST_NAME')!= '') { echo  trans(Session::get('lang_file').'.ENTER_FIRST_NAME');}  else { echo trans($OUR_LANGUAGE.'.ENTER_FIRST_NAME');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#fname'+i).css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                    if($('#lname'+i).val() == '')
         
                    {
         
                        $('#lname'+i).css("border","1px solid red");
         
                        $('#lname'+i).focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_LAST_NAME')!= '') { echo  trans(Session::get('lang_file').'.ENTER_LAST_NAME');}  else { echo trans($OUR_LANGUAGE.'.ENTER_LAST_NAME');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#lname'+i).css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                    if($('#addr_line'+i).val() == '')
         
                    {
         
                        $('#addr_line'+i).css("border","1px solid red");
         
                        $('#addr_line'+i).focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_ADDRESS_LINE1')!= '') { echo  trans(Session::get('lang_file').'.ENTER_ADDRESS_LINE1');}  else { echo trans($OUR_LANGUAGE.'.ENTER_ADDRESS_LINE1');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#addr_line'+i).css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                    if($('#addr1_line'+i).val() == '')
         
                    {
         
                        $('#addr1_line'+i).css("border","1px solid red");
         
                        $('#addr1_line'+i).focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_ADDRESS_LINE2')!= '') { echo  trans(Session::get('lang_file').'.ENTER_ADDRESS_LINE2');}  else { echo trans($OUR_LANGUAGE.'.ENTER_ADDRESS_LINE2');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#addr1_line'+i).css("border","");
         
                        $('#error_div').html('');
         
                    }           
         
                    if($('#state'+i).val() == '')
         
                    {
         
                        $('#state'+i).css("border","1px solid red");
         
                        $('#state'+i).focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_STATE')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_STATE');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_STATE');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#state'+i).css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                    if($('#phone1_line'+i).val() == '')
         
                    {
         
                        $('#phone1_line'+i).css("border","1px solid red");
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_PHONE_NO')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_PHONE_NO');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_PHONE_NO');} ?>');
         
                        $('#phone1_line'+i).focus();
         
                        return false;
         
                    }
         
                    else if(!phone_regex.test($('#phone1_line'+i).val()))
         
                    {
         
                        $('#phone1_line'+i).css("border","1px solid red");
         
                        $('#phone1_line'+i).focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_VALID_PHONE_NO')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_VALID_PHONE_NO');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_VALID_PHONE_NO');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#phone1_line'+i).css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                    
                    if($('#zipcode'+i).val() == '')
         
                    {
         
                        $('#zipcode'+i).css("border","1px solid red");
         
                        $('#zipcode'+i).focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ZIPCODE')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_ZIPCODE');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_ZIPCODE');} ?>');
         
                        return false;
         
                    }
         
                    else if(!zip_regex.test($('#zipcode'+i).val()))
         
         
                    {
         
                        $('#zipcode'+i).css("border","1px solid red");
         
                        $('#zipcode'+i).focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_VALID_ZIPCODE')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_VALID_ZIPCODE');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_VALID_ZIPCODE');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#zipcode'+i).css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                    
         
                }
         
                }
         
                else if($('input:radio[name=mul_shipping_addr]:checked').val()=="no")
         
                {       //alert('asd');
         
                    if($('#fname1').val() == '')
         
                    {
         
                        $('#fname1').css("border","1px solid red");
         
                        $('#fname1').focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_FIRST_NAME')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_FIRST_NAME');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_FIRST_NAME');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#fname1').css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                    if($('#lname1').val() == '')
         
                    {
         
                        $('#lname1').css("border","1px solid red");
         
                        $('#lname1').focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_LAST_NAME')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_LAST_NAME');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_LAST_NAME');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#lname1').css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                    if($('#addr_line1').val() == '')
         
                    {
         
                        $('#addr_line1').css("border","1px solid red");
         
                        $('#addr_line1').focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ADDRESS_LINE1')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_ADDRESS_LINE1');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_ADDRESS_LINE1');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#addr_line1').css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                    if($('#addr1_line1').val() == '')
         
                    {
         
                        $('#addr1_line1').css("border","1px solid red");
         
                        $('#addr1_line1').focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ADDRESS_LINE2')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_ADDRESS_LINE2');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_ADDRESS_LINE2');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#addr1_line1').css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                    
         
                    if($('#state1').val() == '')
         
                    {
         
                        $('#state1').css("border","1px solid red");
         
                        $('#state1').focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_STATE')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_STATE');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_STATE');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#state1').css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                    if($('#phone1_line1').val() == '')
         
                    {
         
                        $('#phone1_line1').css("border","1px solid red");
         
                        $('#phone1_line1').focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_PHONE_NO')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_PHONE_NO');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_PHONE_NO');} ?>');
         
                        return false;
         
                    }
         
                    else if(!phone_regex.test($('#phone1_line1').val()))
         
                    {
         
                        $('#phone1_line1').css("border","1px solid red");
         
                        $('#phone1_line1').focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_VALID_PHONE_NO')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_VALID_PHONE_NO');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_VALID_PHONE_NO');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#phone1_line1').css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                    
         
                    if($('#zipcode1').val() == '')
         
                    {
         
                        $('#zipcode1').css("border","1px solid red");
         
                        $('#zipcode'+i).focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ZIPCODE')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_ZIPCODE');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_ZIPCODE');} ?>');
         
                        return false;
         
                    }
         
                    else if(!zip_regex.test($('#zipcode1').val()))
         
                    {
         
                        $('#zipcode1').css("border","1px solid red");
         
                        $('#zipcode1').focus();
         
                        $('#error_div').html('<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_VALID_ZIPCODE')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_VALID_ZIPCODE');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_VALID_ZIPCODE');} ?>');
         
                        return false;
         
                    }
         
                    else
         
                    {
         
                        $('#zipcode1').css("border","");
         
                        $('#error_div').html('');
         
                    }
         
                }
         
                
         
                });
         
            
         
            });
         
            
      </script>
      <script>
         //paste this code under head tag or in a seperate js file.
         // Wait for window load
         $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
         });
      </script>
      <script type="text/javascript">
         function wallet_usage(user_wallet_amount, t, product_total){
         
             var wallet_amount = user_wallet_amount;//$('#user_wallet_amount').val();
             var product_total = product_total;//$('#product_total').val(); 
            //alert(wallet_amount);
             var grand_total   = $('#grand_total').val(); 
             var old_grand_total = $('#old_grand_total').val(); 
             var amount = 0;
             var used = 0;
             if (t.is(':checked')) {
         
                //alert(product_total);
               // alert(wallet_amount);
                if(product_total > wallet_amount){          // if product total is greater than wallet
                     amount = product_total - wallet_amount;  
                     used   = product_total - amount; 
         used_round = parseFloat(used).toFixed(2);  // you will get how much wallet amount we have used
                    //alert(1);
                 }else if(product_total < wallet_amount){     // if product total is less than wallet
                     amount = wallet_amount - product_total;  
                     used   = wallet_amount - amount;         // you will get how much wallet amount we have used
                     //alert(2); 
         used_round = parseFloat(used).toFixed(2); 
                 }
                
                 //alert(used);
                 $('#wallet_used').html(used_round);   //wallet used amount for span 
                 $('input[name=wallet_used_amount]').val(used_round);  // wallet used amount for input
                 $('#if_wallet').show();  //display wallet
                 $('#wallet_apply_final_total').html(grand_total-used_round);  //displaying grand total span after applying wallet
                 $('input[name=grand_total]').val(grand_total-used_round);     //grand total input after applying wallet
                
                     /*setting (only wallet amount used for this order) in session*/
                     $.ajax({
                         type: "POST",   
                         url:"<?php echo url('ajax_wallet_session_set'); ?>",
                         data:{'wallet_used_amount':used_round},
                         success:function(response){
         
                         }
                     });
         
             }else{
         
                 $('#wallet_used').html(0);
                 $('input[name=wallet_used_amount]').val(used_round);
                 $('#if_wallet').show();
                 $('#wallet_apply_final_total').html(old_grand_total);
                 $('input[name=grand_total]').val(old_grand_total);
               
                     /*destorying session which is stored the wallet used amount*/
                     $.ajax({
                         type: "POST",   
                         url:"<?php echo url('ajax_wallet_session_unset'); ?>",
                         data:{},
                         success:function(response){
                             
                         }
                     });
             }
             
         }
         
         
         
         function walletCal(user_wallet_amount, t, subtotal) {
         
             var wallet_amount = document.getElementById('user_wallet_amount').value;
             var subtotal      = document.getElementById('subtotal').value;
             var total_price   = document.getElementById('total_price').value;
             var total_price1  = document.getElementById('total_price1').value;
             
         if (t.is(':checked')) {
             var wallet_cal_amount = subtotal - wallet_amount;
             var wallet_total_price = total_price - wallet_amount;
           $('#wallet_apply_total').html('$'+wallet_cal_amount+'.00');
           $('#wallet_apply_final_total').html('$'+wallet_total_price+'.00');
           $('input[name=total_price]').val(wallet_total_price);
           
           if(wallet_total_price <= 0){
             //$('#paypal_cod').hide();
             $('#wallet_apply_total').html('$'+'0.00');
             $('#wallet_apply_final_total').html('$'+'0.00');
           }
           $.ajax({
                         type: "POST",   
                         url:"<?php echo url('ajax_wallet_session_set'); ?>",
                         data:{'wallet_amount':wallet_amount,'wallet_total_price':wallet_total_price},
                         success:function(response){
         
                         }
                     });
         } else {
           
           $('#wallet_apply_total').html('$'+subtotal+'.00');
           $('#wallet_apply_final_total').html('$'+total_price1+'.00');
           $('input[name=total_price]').val(total_price1);
           if(total_price1 > 0){
            // $('#paypal_cod').show();
           }
                 $.ajax({
                         type: "POST",   
                         url:"<?php echo url('ajax_wallet_session_unset'); ?>",
                         data:{},
                         success:function(response){
                             
                         }
                     });
         }
         }
      </script>      
      <script type="text/javascript">
         $.ajaxSetup({
             headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
         });
      </script> 
      <script>
         $(document).on("ready", function() {
             $("#orderstatus").wizard({
                 onfinish: function() {
                     console.log("Hola mundo");
                 }
             });
         });
         /* Mobile Number Validation */
         function isNumber(evt) {
         evt = (evt) ? evt : window.event;
         var charCode = (evt.which) ? evt.which : evt.keyCode;
         if (charCode > 31 && (charCode < 48 || charCode > 57)) {
         return false;
         }
         return true;
         }
      </script>
      <!-- Themes switcher section ============================================================================================= -->
      <?php /*
         <!--<div id="secectionBox">
         
         <link rel="stylesheet" href="<?php echo url(); ?>/themes/switch/themeswitch.css" type="text/css" media="screen" />
      <script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
      <div id="themeContainer">
         <div id="hideme" class="themeTitle">Style Selector</div>
         <div class="themeName">Oregional Skin</div>
         <div class="images style">
            <a href="<?php echo url(); ?>/themes/css/#" name="bootshop"><img src="<?php echo url(); ?>/themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="businessltd"><img src="<?php echo url(); ?>/themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
         </div>
         <div class="themeName">Bootswatch Skins (11)</div>
         <div class="images style">
            <a href="<?php echo url(); ?>/themes/css/#" name="amelia" title="Amelia"><img src="<?php echo url(); ?>/themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="spruce" title="Spruce"><img src="<?php echo url(); ?>/themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="superhero" title="Superhero"><img src="<?php echo url(); ?>/themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="cyborg"><img src="<?php echo url(); ?>/themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="cerulean"><img src="<?php echo url(); ?>/themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="journal"><img src="<?php echo url(); ?>/themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="readable"><img src="<?php echo url(); ?>/themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>   
            <a href="<?php echo url(); ?>/themes/css/#" name="simplex"><img src="<?php echo url(); ?>/themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="slate"><img src="<?php echo url(); ?>/themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="spacelab"><img src="<?php echo url(); ?>/themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="united"><img src="<?php echo url(); ?>/themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
            <p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
         </div>
         <div class="themeName">Background Patterns </div>
         <div class="images patterns">
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern1"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern2"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern3"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern4"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern5"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern6"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern7"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern8"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern9"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern10"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern11"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern12"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern13"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern14"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern15"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern16"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern17"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern18"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern19"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
            <a href="<?php echo url(); ?>/themes/css/#" name="pattern20"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>
         </div>
      </div>
      </div>
      <span id="themesBtn"></span>--> */ ?>
   </body>
</html>