<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      @if($get_store_merchant_by_id)  
      @foreach($get_store_by_id as $get_store_details_id) @endforeach 
      @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
      @php    $stor_name            = 'stor_name';
      $stor_metakeywords    = 'stor_metakeywords';
      $stor_metadesc        = 'stor_metadesc'; @endphp
      @else   
      @php  $stor_name            = 'stor_name_'.Session::get('lang_code');
      $stor_metakeywords    = 'stor_metakeywords_'.Session::get('lang_code');
      $stor_metadesc        = 'stor_metadesc_'.Session::get('lang_code'); @endphp
      @endif
      @php  $metaname     = $get_store_details_id->$stor_name;
      $metakeywords = $get_store_details_id->$stor_metakeywords;
      $metadesc     = $get_store_details_id->$stor_metadesc;    @endphp  
      @else
      @if($metadetails)
      @foreach($metadetails as $metainfo) 
      @php  $metaname     = $metainfo->gs_metatitle;
      $metakeywords = $metainfo->gs_metakeywords;
      $metadesc     = $metainfo->gs_metadesc; @endphp
      @endforeach
      @else
      @php
      $metaname="";
      $metakeywords="";
      $metadesc=""; @endphp
      @endif
      @endif
      <title>{{ $metaname }}</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="{{ $metadesc }}">
      <meta name="keywords" content="{{ $metakeywords }}">
      <meta name="author" content="{{ $metaname }}">
      <link href="plug-k/demo/css/bootstrap.css" rel="stylesheet">
      <link href="plug-k/demo/css/demo.css" rel="stylesheet">
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
      <?php $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); foreach($favi as $fav) {} ?>
      <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/{{ $fav->imgs_name }}">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('') }}/themes/images/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('') }}/themes/images/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('') }}/themes/images/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="{{ url('') }}/themes/images/ico/apple-touch-icon-57-precomposed.png">
      <link rel="stylesheet" type="text/css" href="{{ url('') }}/themes/css/slider-store/demo.css" />
      <link rel="stylesheet" type="text/css" href="{{ url('') }}/themes/css/slider-store/style.css" />
      <link rel="stylesheet" type="text/css" href="{{ url('') }}/themes/css/slider-store/jquery.jscrollpane.css" media="all" />
      <link rel="stylesheet" type="text/css" href="{{ url('') }}/themes/css/compare-products/demo.css" />
      <link rel="stylesheet" type="text/css" href="{{ url('') }}/themes/css/compare-products/component.css" />
      <style type="text/css" id="enject"></style>
      <style type="text/css">
         .carousel {
         margin-bottom: 0;
         padding: 0 40px 30px 40px;
         }
         /* Reposition the controls slightly */
         .carousel-control {
         left: -12px;
         }
         .carousel-control.right {
         right: -12px;
         }
         /* Changes the position of the indicators */
         .carousel-indicators {
         right: 50%;
         top: auto;
         bottom: 0px;
         margin-right: -19px;
         }
         /* Changes the colour of the indicators */
         .carousel-indicators li {
         background: #c0c0c0;
         }
         .carousel-indicators .active {
         background: #333333;
         }
         /*10-7-17*/
         .clearout {
         height:20px;
         clear:both;
         }
         #flexiselDemo1, #flexiselDemo2, #flexiselDemo3 {
         display:none;
         }
         .nbs-flexisel-container {
         position:relative;
         max-width:100%;
         }
         .nbs-flexisel-ul {
         position:relative;
         width:99999px;
         margin:0px;
         padding:0px;
         list-style-type:none;   
         text-align:center;  
         }
         .nbs-flexisel-inner {
         position: relative;
         overflow: hidden;
         float:left;
         width:100%;
         background:#fcfcfc;
         background: #fcfcfc -moz-linear-gradient(top, #fcfcfc 0%, #eee 100%); /* FF3.6+ */
         background: #fcfcfc -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfcfc), color-stop(100%,#eee)); /* Chrome,Safari4+ */
         background: #fcfcfc -webkit-linear-gradient(top, #fcfcfc 0%, #eee 100%); /* Chrome10+,Safari5.1+ */
         background: #fcfcfc -o-linear-gradient(top, #fcfcfc 0%, #eee 100%); /* Opera11.10+ */
         background: #fcfcfc -ms-linear-gradient(top, #fcfcfc 0%, #eee 100%); /* IE10+ */
         background: #fcfcfc linear-gradient(top, #fcfcfc 0%, #eee 100%); /* W3C */
         border:1px solid #ccc;
         border-radius:5px;
         -moz-border-radius:5px;
         -webkit-border-radius:5px;
         margin-bottom: 20px;
         }
         .nbs-flexisel-item {
         float:left;
         margin:0px;
         padding:0px;
         cursor:pointer;
         position:relative;
         line-height:0px;
         }
         .nbs-flexisel-item img {
         max-width: 100%;
         cursor: pointer;
         position: relative;
         margin-top: 10px;
         margin-bottom: 10px;
         }
         /*** Navigation ***/
         .nbs-flexisel-nav-left,
         .nbs-flexisel-nav-right {
         padding:5px 10px;
         border-radius:15px;
         -moz-border-radius:15px;
         -webkit-border-radius:15px;      
         position: absolute;
         cursor: pointer;
         z-index:999;
         top:50%;
         background: rgba(0,0,0,0.5);
         color: #fff;     
         }
         .nbs-flexisel-nav-left {
         left: 0px;
         }
         .nbs-flexisel-nav-left:before {
         content: "<"
         }
         .nbs-flexisel-nav-left.disabled {
         opacity: 0.4;
         }
         .nbs-flexisel-nav-right {
         right: 0px;    
         }
         .nbs-flexisel-nav-right:before {
         content: ">"
         }
         .nbs-flexisel-nav-right.disabled {
         opacity: 0.4;
         }
         .star-cb-group {
         /* remove inline-block whitespace */
         font-size: 0;
         /* flip the order so we can use the + and ~ combinators */
         unicode-bidi: bidi-override;
         direction: rtl;
         /* the hidden clearer */
         }
         .star-cb-group * {
         font-size:25px;
         }
         .star-cb-group > input {
         display: none !important;
         }
         .star-cb-group > input + label {
         /* only enough room for the star */
         display: inline-block;
         overflow: hidden;
         text-indent: 9999px;
         width: 30px;
         height: 25px;
         white-space: nowrap;
         cursor: pointer;
         margin: 0px !important;
         }
         .star-cb-group > input + label:before {
         display: inline-block;
         text-indent: -9999px;
         content: "☆";
         color: #ccc;
         }
         .star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
         content: "★";
         color: #eeb900;
         text-shadow: 0 0 1px #333;
         }
         .star-cb-group > .star-cb-clear + label {
         text-indent: -9999px;
         width: .5em;
         margin-left: -.5em;
         }
         .star-cb-group > .star-cb-clear + label:before {
         width: .5em;
         }
         .star-cb-group:hover > input + label:before {
         content: "☆";
         color: #ccc;
         text-shadow: none;
         }
         .star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
         content: "★";
         color: #eeb900 ;
         text-shadow: 0 0 1px #333;
         }
         :root {
         font-size: 2em;
         font-family: Helvetica, arial, sans-serif;
         }
         body {
         background: #333;
         color: #888;
         }
         fieldset {
         border:none !important;
         padding: 0px !important;
         }
         #log {
         margin: 1em auto;
         width: 5em;
         text-align: center;
         background: transparent;
         }
         h1 {
         text-align: center;
         }
      </style>
      <!--10-7-17
         <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
         <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
          <!--10-7-17-->
   </head>
   <body>
      <div id="header">
         {!! $navbar !!}
         <!-- Navbar ================================================== -->
         {!! $header !!}
      </div>
      <!-- Header End====================================================================== -->
      @if($get_store_merchant_by_id)  
      @foreach($get_store_by_id as $get_store_details_id) @endforeach 
      @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
      @php  $stor_name = 'stor_name'; @endphp
      @else @php  $stor_name = 'stor_name_'.Session::get('lang_code'); @endphp @endif 
      @php $product_image     = $get_store_details_id->stor_img; 
      $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
      $img_data   = "public/assets/storeimage/".$product_image;@endphp
      @if(file_exists($img_data) && $product_image !='')    
      @php $prod_path = url('').'/public/assets/storeimage/' .$product_image;  @endphp                
      @else  
      @if(isset($DynamicNoImage['store']))
      @php  $dyanamicNoImg_path = 'public/assets/noimage/'.$DynamicNoImage['store']; @endphp
      @if($DynamicNoImage['store']!='' && file_exists($dyanamicNoImg_path))  
      @php    $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
      @endif
      @endif 
      @php $alt_text   = $get_store_details_id->$stor_name; @endphp
      <div class="container">
         <div class="row">
            <center>
               @if (Session::has('success_store'))
               <div class="alert alert-warning alert-dismissable">{!! Session::get('success_store') !!}
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               </div>
               @endif
            </center>
            <div class="span5" id="strvwpg_img">
               <img src="{{ $prod_path }}" alt="{{ $alt_text }}" width="450px;" height="" class="img-res store-img tab-store-img">
            </div>
            <div class="span7" id="strvwpg_map">
               <label class="og_text store-title">
               @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') 
               @php $stor_name = 'stor_name';
               $stor_address1 = 'stor_address1';
               $stor_address2 = 'stor_address2'; @endphp
               @else   
               @php $stor_name = 'stor_name_'.Session::get('lang_code'); 
               $stor_address1 = 'stor_address1_'.Session::get('lang_code'); 
               $stor_address2 = 'stor_address2_'.Session::get('lang_code');  @endphp
               @endif
               {{ $get_store_details_id->$stor_name }},</label>
               @php
               $product_count = $one_count + $two_count + $three_count + $four_count + $five_count;
               $product_count;
               $multiple_countone = $one_count *1;
               $multiple_counttwo = $two_count *2;
               $multiple_countthree = $three_count *3;
               $multiple_countfour = $four_count *4;
               $multiple_countfive = $five_count *5;
               $product_total_count = $multiple_countone + $multiple_counttwo + $multiple_countthree + $multiple_countfour + $multiple_countfive; @endphp
               @if($product_count)
               @php $product_divide_count = $product_total_count / $product_count; @endphp
               @if(($product_divide_count != '0')&&($product_divide_count <= 1))
               @if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif <img src='{{ url('images/stars-1.png') }}' style='margin-bottom:10px;'>
               @elseif($product_divide_count <= '2')
               @if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif : <img src='{{ url('./images/stars-2.png') }}' style='margin-bottom:10px;'>
               @elseif($product_divide_count <= 3)
               @if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif : <img src='{{ url('./images/stars-3.png') }}' style='margin-bottom:10px;'>
               @elseif($product_divide_count <= '4')
               @if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{ trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif : <img src='{{ url('./images/stars-4.png') }}' style='margin-bottom:10px;'>
               @elseif($product_divide_count <= '5')
               @if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif : <img src='{{ url('./images/stars-5.png') }}' style='margin-bottom:10px;'>
               @else 
               @if (Lang::has(Session::get('lang_file').'.NO_RATING_FOR_THIS_STORE')!= '') {{ trans(Session::get('lang_file').'.NO_RATING_FOR_THIS_STORE') }} @else {{ trans($OUR_LANGUAGE.'.NO_RATING_FOR_THIS_STORE') }} @endif
               @endif
               @elseif($product_count)
               @php $product_divide_count = $product_total_count / $product_count; @endphp
               @else  
               @if (Lang::has(Session::get('lang_file').'.NO_RATING_FOR_THIS_STORE')!= '') {{  trans(Session::get('lang_file').'.NO_RATING_FOR_THIS_STORE') }} @else {{ trans($OUR_LANGUAGE.'.NO_RATING_FOR_THIS_STORE') }} @endif
               <span class="Review-count"><strong>( @if(isset($count_review_rating)) {{ $count_review_rating }} @endif @if (Lang::has(Session::get('lang_file').'.REVIEWS_AND_RATINGS')!= '') {{  trans(Session::get('lang_file').'.REVIEWS_AND_RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.REVIEWS_AND_RATINGS') }} @endif )</strong></span>
               @endif 
               <!-- //echo $product_divide_count; -->
               <label><span  class="store-left">@if (Lang::has(Session::get('lang_file').'.ADDRESS1')!= '') {{  trans(Session::get('lang_file').'.ADDRESS1') }} @else {{ trans($OUR_LANGUAGE.'.ADDRESS1') }} @endif</span> : {{ $get_store_details_id->$stor_address1 }}, </label>
               <label><span  class="store-left">@if (Lang::has(Session::get('lang_file').'.ADDRESS2')!= '') {{  trans(Session::get('lang_file').'.ADDRESS2') }} @else {{ trans($OUR_LANGUAGE.'.ADDRESS2') }} @endif </span> : {{ $get_store_details_id->$stor_address2 }},  </label>
               <label><span  class="store-left">@if (Lang::has(Session::get('lang_file').'.ZIP_CODE')!= '') {{  trans(Session::get('lang_file').'.ZIP_CODE') }} @else {{ trans($OUR_LANGUAGE.'.ZIP_CODE') }} @endif </span> : {{ $get_store_details_id->stor_zipcode }} </label>
               <label><span  class="store-left">@if (Lang::has(Session::get('lang_file').'.MOBILE_NO')!= '') {{  trans(Session::get('lang_file').'.MOBILE_NO') }} @else {{ trans($OUR_LANGUAGE.'.MOBILE_NO') }} @endif</span> : {{ $get_store_details_id->stor_phone }}</label>
               <label><span  class="store-left">@if (Lang::has(Session::get('lang_file').'.WEBSITE')!= '') {{ trans(Session::get('lang_file').'.WEBSITE') }} @else {{ trans($OUR_LANGUAGE.'.WEBSITE') }} @endif </span> : <a class="deal_web_link og_text" target="blank" href="{{ $get_store_details_id->stor_website }}"> {{ $get_store_details_id->stor_website }}</a></label>
               <div id="somecomponent" style="width: 100%; height: 300px;" class="store-map"></div>
            </div>
         </div>
      </div>
      </div>
      <div id="mainBody">
      <div class="container">
      <!-- Sidebar ================================================== -->
      <!-- Sidebar end=============================================== -->
      <div>
         <center>
            <h4><?php echo ucwords($get_store_details_id->$stor_name);  ?>  &nbsp; <span style="color:#00b381;">@if (Lang::has(Session::get('lang_file').'.PRODUCTS')!= '') {{  trans(Session::get('lang_file').'.PRODUCTS') }} @else {{ trans($OUR_LANGUAGE.'.PRODUCTS') }} @endif</span></h4>
         </center>
      </div>
      <legend></legend>
      <div class="" id="strowvw" style="">
         @if(count($get_store_product_by_id) > 0 )  
         @foreach($get_store_product_by_id as $fetch_most_visit_pro)  
         @if($fetch_most_visit_pro->pro_no_of_purchase >= $fetch_most_visit_pro->pro_qty) 
         @else
         @php $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;
         $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);
         $mostproduct_img = explode('/**/', $fetch_most_visit_pro->pro_Img);
         $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
         $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
         $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
         $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
         $res = base64_encode($fetch_most_visit_pro->pro_id); @endphp
         @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
         @php $pro_title = 'pro_title'; @endphp
         @else @php  $pro_title = 'pro_title_'.Session::get('lang_code'); @endphp @endif
         @php   $product_img    = $mostproduct_img[0];
         $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
         $img_data   = "public/assets/product/".$product_img; @endphp
         @if(file_exists($img_data) && $product_img !='')   
         @php  $prod_path = url('').'/public/assets/product/' .$product_img;  @endphp                 
         @else  
         @if(isset($DynamicNoImage['productImg']))
         @php   $dyanamicNoImg_path = url('').'/public/assets/noimage/' .$DynamicNoImage['productImg']; @endphp
         @if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))
         @php    $prod_path = $dyanamicNoImg_path; @endphp @endif
         @endif
         @endif   
         @php   $alt_text   = substr($fetch_most_visit_pro->$pro_title,0,25); @endphp
         <div class="span3 product store-product" style="" id="stovwprd">
            @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
            <a  href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}" ><img alt="{{ $alt_text }}" src="{{ $prod_path }}" width="100%" style=""></a>
            @endif
            @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
            <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}"><img alt="{{ $alt_text }}" src="{{ $prod_path }}" width="100%" style=""></a>
            @endif
            @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
            <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" ><img alt="{{ $alt_text }}" src="{{ $prod_path }}" width="100%" style=""></a>
            @endif
            <h4><a class="s_detail product_title" href="#" style="margin-top:15px;">
               {{ substr($fetch_most_visit_pro->$pro_title,0,20) }}...</a>
            </h4>
            <div class="row-fluid">
               <center> <span class="dolor_text">{{ Helper::cur_sym() }} {{ $fetch_most_visit_pro->pro_disprice }}</span></center>
               @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
               <center>
                  <h4>
                  <a  href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}" style="padding:5px 5px 5px 5px;"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
               </center>
               @endif
               @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
               <center>
                  <h4>
                  <a  href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" style="padding:5px 5px 5px 5px;"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
               </center>
               @endif
               @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
               <center>
                  <h4>
                  <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" style="padding:5px 5px 5px 5px;"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
               </center>
               @endif
            </div>
         </div>
         @endif  
         @endforeach
         @else  
         <h5 style="color:#933;" >@if (Lang::has(Session::get('lang_file').'.NO_RECORDS_FOUND_UNDER')!= '') {{ trans(Session::get('lang_file').'.NO_RECORDS_FOUND_UNDER') }} @else {{ trans($OUR_LANGUAGE.'.NO_RECORDS_FOUND_UNDER') }} @endif <?php echo ucwords($get_store_details_id->$stor_name);  ?> @if (Lang::has(Session::get('lang_file').'.PRODUCTS')!= '') {{ trans(Session::get('lang_file').'.PRODUCTS') }} @else {{ trans($OUR_LANGUAGE.'.PRODUCTS') }} @endif.</h5>
         @endif
      </div>
      <br>
      <div style="display: block; clear: both;">
         <center>
            <h4><?php echo ucwords($get_store_details_id->$stor_name);  ?> &nbsp; <span style="color:#00b381">@if (Lang::has(Session::get('lang_file').'.DEALS')!= '') {{ trans(Session::get('lang_file').'.DEALS') }} @else {{ trans($OUR_LANGUAGE.'.DEALS') }} @endif</span></h4>
         </center>
      </div>
      <legend></legend>
      <div class="" style="">
         @if(count($get_store_deal_by_id) > 0)  
         @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
         @php $deal_title = 'deal_title'; @endphp
         @else @php  $deal_title = 'deal_title_'.Session::get('lang_code');  @endphp @endif
         @foreach($get_store_deal_by_id as $store_deal_by_id)  
         @php $dealdiscount_percentage = $store_deal_by_id->deal_discount_percentage;
         $deal_img= explode('/**/', $store_deal_by_id->deal_image);
         $mcat = strtolower(str_replace(' ','-',$store_deal_by_id->mc_name));
         $smcat = strtolower(str_replace(' ','-',$store_deal_by_id->smc_name));
         $sbcat = strtolower(str_replace(' ','-',$store_deal_by_id->sb_name));
         $ssbcat = strtolower(str_replace(' ','-',$store_deal_by_id->ssb_name)); 
         $res = base64_encode($store_deal_by_id->deal_id);
         $product_img     = $deal_img[0];
         $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
         $img_data   = "public/assets/deals/".$product_img; @endphp
         @if(file_exists($img_data) && $product_img !='')   
         @php   $prod_path = url('').'/public/assets/deals/' .$product_img;  @endphp                 
         @else  
         @if(isset($DynamicNoImage['dealImg']))
         @php   $dyanamicNoImg_path = url('').'/public/assets/noimage/' .$DynamicNoImage['dealImg']; @endphp
         @if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path))
         @php  $prod_path = $dyanamicNoImg_path; @endphp @endif
         @endif
         @endif   
         @php   $alt_text   = substr($store_deal_by_id->$deal_title,0,25);
         $alt_text  .= strlen($store_deal_by_id->$deal_title)>25?'..':''; @endphp
         <div class="span3 product store-product" style="">
            @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
            <a  href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}" > <img src="{{ $prod_path }}" alt="{{ $alt_text }}" width="100%" style=""></a>
            @endif
            @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
            <a  href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" > <img src="{{ $prod_path }}" alt="{{ $alt_text }}" width="100%" style=""></a>
            @endif
            @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
            <a  href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" > <img src="{{ $prod_path }}" alt="{{ $alt_text }}" width="100%" style=""></a>
            @endif
            <h4> <a href="#" class="s_detail product_title tab-store-title">{{ substr($store_deal_by_id->$deal_title,0,20) }}...</a>  
            </h4>
            <div class="row-fluid">
               <span class="dolor_text">{{ Helper::cur_sym() }} {{ $store_deal_by_id->deal_discount_price }}</span>
               @if($store_deal_by_id->deal_no_of_purchase < $store_deal_by_id->deal_max_limit)  
               @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
               <center>
                  <h4>
                  <a  href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}" style="padding:5px 5px 5px 5px;"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
               </center>
               @endif
               @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
               <center>
                  <h4>
                  <a  href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" style="padding:5px 5px 5px 5px;"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
               </center>
               @endif
               @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
               <center>
                  <h4>
                  <a  href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" style="padding:5px 5px 5px 5px;"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
               </center>
               @endif
               @endif
               @if($store_deal_by_id->deal_no_of_purchase >= $store_deal_by_id->deal_max_limit) 
               <h4 style="text-align:center;">
               <a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{ trans(Session::get('lang_file').'.SOLD') }} @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a>
               @endif
            </div>
         </div>
         <!-- //if not soldout -->
         @endforeach<!-- //foreach -->
         @else  
         <h5 style="color:#933;" >@if (Lang::has(Session::get('lang_file').'.NO_RECORDS_FOUND_UNDER')!= '') {{ trans(Session::get('lang_file').'.NO_RECORDS_FOUND_UNDER') }} @else {{ trans($OUR_LANGUAGE.'.NO_RECORDS_FOUND_UNDER') }} @endif <?php echo ucwords($get_store_details_id->$stor_name);  ?> @if (Lang::has(Session::get('lang_file').'.DEALS')!= '') {{ trans(Session::get('lang_file').'.DEALS') }} @else {{ trans($OUR_LANGUAGE.'.DEALS')}} @endif.</h5>
         @endif
      </div>
      <legend></legend>
      <div class="container">
         <div class="row">
            <div class="span12">
               <h4>@if (Lang::has(Session::get('lang_file').'.BRANCHES')!= '') {{ trans(Session::get('lang_file').'.BRANCHES') }} @else {{ trans($OUR_LANGUAGE.'.BRANCHES') }} @endif</h4>
               <div class="store-view-branch">
                  <?php   // $get_storebranch); ?>
                  <ul>
                     @php $store_count=count($get_storebranch);
                     $i=0; @endphp
                     @foreach($get_storebranch as $row_store)
                     @php  $i++; @endphp
                     @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                     @php $stor_name = 'stor_name';
                     $stor_address1 = 'stor_address1';
                     $stor_address2 = 'stor_address2'; @endphp
                     @else   
                     @php $stor_name = 'stor_name_'.Session::get('lang_code'); 
                     $stor_address1 = 'stor_address1_'.Session::get('lang_code'); 
                     $stor_address2 = 'stor_address2_'.Session::get('lang_code');  @endphp
                     @endif
                     @php $store_img = $row_store->stor_img;
                     $store_name = $row_store->$stor_name; 
                     $product_image     = $row_store->stor_img;
                     $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
                     $img_data   = "public/assets/storeimage/".$product_image; @endphp
                     @if(file_exists($img_data) && $product_image !='')  
                     @php  $prod_path = url('').'/public/assets/storeimage/' .$product_image;  @endphp                
                     @else  
                     @if(isset($DynamicNoImage['store']))
                     @php $dyanamicNoImg_path = 'public/assets/noimage/'.$DynamicNoImage['store']; @endphp
                     @if($DynamicNoImage['store']!='' && file_exists($dyanamicNoImg_path))  
                     @php   $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
                     @endif
                     @endif 
                     @php  $alt_text   = $row_store->$stor_name; @endphp
                     <li><a href="#x"><img src="{{ $prod_path }}" alt="{{ $alt_text }}" style="max-width:100%;height:200px" /></a>
                        <span class="slide-store-name">{{ $store_name }}</span>
                        <a href="<?php echo url('storeview/'.base64_encode(base64_encode(base64_encode($row_store->stor_id)))); ?>" >
                        <button class="sub-but">@if (Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= '') {{  trans(Session::get('lang_file').'.VIEW_DETAILS') }} @else {{ trans($OUR_LANGUAGE.'.VIEW_DETAILS') }} @endif</button> </a>
                     </li>
                     @endforeach                            
                  </ul>
               </div>
               <!--/well-->   
            </div>
         </div>
      </div>
      @if(Session::has('customerid'))
      <div style="border-radius:3px; border:1px solid #ccc;">
         <h4 style="padding-left:13px;">@if (Lang::has(Session::get('lang_file').'.WRITE_A_POST_COMMENTS')!= '') {{ trans(Session::get('lang_file').'.WRITE_A_POST_COMMENTS') }} @else {{ trans($OUR_LANGUAGE.'.WRITE_A_POST_COMMENTS') }} @endif</h4>
         <div class="row">
            <div class="span9">
               {!! Form::open(array('url'=>'storecomments','class'=>'form-horizontal loginFrm')) !!}
               <input type="hidden" name="customer_id" value="{{ Session::get('customerid') }}">
               <input type="hidden" name="store_id" value="{!!$get_store_details_id->stor_id!!}">
               <div class="form-group">
                  <div class="control-group">
                     <input type="text" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_COMMENT_TITLE')!= '') {{ trans(Session::get('lang_file').'.ENTER_COMMENT_TITLE') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_COMMENT_TITLE') }} @endif" name="title" class="input-xlarge" style="width:100%; box-sizing: border-box;" required/>
                  </div>
               </div>
               <div class="control-group">
                  <textarea rows="5"  name="comments" class="input-xlarge" style="width:100%" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_COMMENTS_QUERIES')!= '') {{ trans(Session::get('lang_file').'.ENTER_COMMENTS_QUERIES') }} @else {{ trans($OUR_LANGUAGE.'.ENTER_COMMENTS_QUERIES') }} @endif" required></textarea>
               </div>
               <div class="control-group">
                  <fieldset>
                     <span class="star-cb-group">
                     <input type="radio" id="rating-5"  name="ratings" value="5"/><label for="rating-5">5</label>
                     <input type="radio" id="rating-4" name="ratings" value="4"/><label for="rating-4">4</label>
                     <input type="radio" id="rating-3"  name="ratings" value="3"/><label for="rating-3">3</label>
                     <input type="radio" id="rating-2"  name="ratings" value="2"/><label for="rating-2">2</label>
                     <input type="radio" id="rating-1"  name="ratings" value="1"/><label for="rating-1">1</label>
                     </span>
                  </fieldset>
                  <?php /*
                     <fieldset>
                        <span class="star-cb-group">
                              <input type="radio" id="rating-5"  name="ratings" value="5" />5 <?php if (Lang::has(Session::get('lang_file').'.STAR')!= '') { echo  trans(Session::get('lang_file').'.STAR');}  else { echo trans($OUR_LANGUAGE.'.STAR');} ?><label for="rating-5">5</label>
                  <input type="radio" id="rating-4" name="ratings" value="4" />4 <?php if (Lang::has(Session::get('lang_file').'.STAR')!= '') { echo  trans(Session::get('lang_file').'.STAR');}  else { echo trans($OUR_LANGUAGE.'.STAR');} ?><label for="rating-4">4</label>
                  <input type="radio" id="rating-3"  name="ratings" value="3" />3 <?php if (Lang::has(Session::get('lang_file').'.STAR')!= '') { echo  trans(Session::get('lang_file').'.STAR');}  else { echo trans($OUR_LANGUAGE.'.STAR');} ?><label for="rating-3">3</label>
                  <input type="radio" id="rating-2"  name="ratings" value="2" />2 <?php if (Lang::has(Session::get('lang_file').'.STAR')!= '') { echo  trans(Session::get('lang_file').'.STAR');}  else { echo trans($OUR_LANGUAGE.'.STAR');} ?><label for="rating-2">2</label>
                  <input type="radio" id="rating-1"  name="ratings" value="1" />1 <?php if (Lang::has(Session::get('lang_file').'.STAR')!= '') { echo  trans(Session::get('lang_file').'.STAR');}  else { echo trans($OUR_LANGUAGE.'.STAR');} ?><label for="rating-1">1</label>
                  </span>
                  </fieldset>
                  */?>
               </div>
               <div class="control-group">
                  <input type="submit" class="btn btn-large me_btn btnb-success" value="@if (Lang::has(Session::get('lang_file').'.POST_COMMENTS')!= '') {{ trans(Session::get('lang_file').'.POST_COMMENTS') }} @else {{ trans($OUR_LANGUAGE.'.POST_COMMENTS') }} @endif" 
                     style="background: #2F3234;border-radius: 0px;">
               </div>
               </form>
            </div>
         </div>
      </div>
      @else 
      <a href="#login" role="button" data-toggle="modal" style="padding-right:0; float:left;" id="login_a_click"  class="btn btn-orange  btn-line rippleWhite js-userReviewed" value="@if (Lang::has(Session::get('lang_file').'.LOGIN')!= '') {{ trans(Session::get('lang_file').'.LOGIN') }} @else {{ trans($OUR_LANGUAGE.'.LOGIN') }} @endif">@if (Lang::has(Session::get('lang_file').'.WRITE_A_REVIEW_POST')!= '') {{ trans(Session::get('lang_file').'.WRITE_A_REVIEW_POST') }} @else {{ trans($OUR_LANGUAGE.'.WRITE_A_REVIEW_POST') }} @endif</a>
      @endif
      <br class="clr">
      <h4>@if (Lang::has(Session::get('lang_file').'.REVIEWS')!= '') {{  trans(Session::get('lang_file').'.REVIEWS') }} @else {{ trans($OUR_LANGUAGE.'.REVIEWS') }} @endif</h4>
      @if(count($review_details)!=0)
      <div style="overflow-y:auto; height:370px;">
      @foreach($review_details as $col)
      @php  $customer_name = $col->cus_name;
      $customer_mail = $col->cus_email;
      $customer_img = $col->cus_pic;
      $customer_comments = $col->comments;
      $customer_date = $col->review_date;
      $customer_product = $col->store_id;
      $change_format = date('d/m/Y', strtotime($col->review_date) );
      $review_date = date('F j, Y', strtotime($col->review_date) );
      $customer_title = $col->title;
      $customer_name_arr = str_split($customer_name);
      $start_letter = strtolower($customer_name_arr[0]);
      $customer_ratings = $col->ratings;
      $date_exp=explode('/',$change_format); @endphp
      <div class="commentlist">
      @if($start_letter =='a')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='b')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='c')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='d')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='e')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='f')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='g')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='h')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='i')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='j')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='k')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='m')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='n')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='o')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='p')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='q')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='r')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='s')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='t')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='u')
      {!! "
      <div class='userimg'>
      <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
      @elseif($start_letter=='v')
      {!! "
      <div class='userimg'>
         <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
         @elseif($start_letter=='w')
         {!! "
         <div class='userimg'>
            <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
            @elseif($start_letter=='x')
            {!! "
            <div class='userimg'>
               <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
               @elseif($start_letter=='y')
               {!! "
               <div class='userimg'>
                  <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
                  @elseif($start_letter=='z')
                  {!! "
                  <div class='userimg'>
                     <span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>" !!}
                     @endif
                     <center><span class="_reviewUserName" title="@if (Lang::has(Session::get('lang_file').'.PRATEEK')!= '') {{  trans(Session::get('lang_file').'.PRATEEK') }} @else {{ trans($OUR_LANGUAGE.'.PRATEEK') }} @endif" style="text-transform:capitalize;">{{ $customer_name }}</span></center>
                  </div>
                  <div class="text">
                     <div class="user-review">
                        <div class="date LTgray"><b>{{ $review_date }}</b></div>
                        @if($customer_ratings=='1')
                        <img src='{{ url('./images/stars-1.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                        @elseif($customer_ratings=='2')
                        <img src='{{ url('./images/stars-2.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                        @elseif($customer_ratings=='3')
                        <img src='{{ url('./images/stars-3.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{ trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                        @elseif($customer_ratings=='4')
                        <img src='{{ url('./images/stars-4.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                        @elseif($customer_ratings=='5')
                        <img src='{{ url('./images/stars-5.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{ trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                        @endif
                        <div class="head">{{ $customer_title }}</div>
                        <span style="font-weight:bold">{{ $customer_comments }}</span></p>
                     </div>
                  </div>
               </div>
               @endforeach<?php //foreach ?>
            </div>
            @else @if (Lang::has(Session::get('lang_file').'.NO_REVIEW_RATINGS')!= '') {{ trans(Session::get('lang_file').'.NO_REVIEW_RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.NO_REVIEW_RATINGS') }} @endif.<br>
            @endif
            <br>
         </div>
      </div>
      <!-- Footer ================================================================== -->
      <!-- Placed at the end of the document so the pages load faster ============================================= -->
      <script src="plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>
      <script src="plug-k/demo/js/demo.js" type="text/javascript"></script>
      <!--  <script type="text/javascript" src="<?php echo url(''); ?>/themes/js/slider/jquery.easing.1.3.js"></script> -->
      <!--  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script> --> 
      <script type="text/javascript" src="{{ url('') }}/themes/js/jquery.flexisel.js"></script>
      <!-- the jScrollPane script -->
      <script type="text/javascript">
         $(window).load(function() {
         
             $("#flexiselDemo3").flexisel({
                 visibleItems: 4,
            <?php 
            #sathyaseelan
            if($store_count>4)
            {
              echo'itemsToScroll: 1,';
            }
            else{   
              echo'itemsToScroll: 0,';  
            }
            ?>
                 autoPlay: {
                     enable: false,
                     interval: 3000,
                     pauseOnHover: true
                 }        
             });   
             
         });
      </script>
      <!-- Themes switcher section ============================================================================================= -->
      <span id="themesBtn"></span>
      <!-- 10-7-17<script type="text/javascript" src="<?php //echo url(''); ?>/themes/js/jquery-1.5.2.min.js"></script>-->
      <script type="text/javascript" src="<?php echo url(''); ?>/themes/js/scriptbreaker-multiple-accordion-1.js"></script>
      <script language="JavaScript">
         $(document).ready(function() {
             $(".topnav").accordion({
                 accordion:false,
                 speed: 500,
                 closedSign: '<span class="icon-chevron-right"></span>',
                 openedSign: '<span class="icon-chevron-down"></span>'
             });
         });
         
      </script>
      <?php 
         if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
         $map_lang = 'en';
         }else {  
         $map_lang = 'fr';
         }
         ?>
      <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=<?php echo $GOOGLE_KEY;?>&language=<?php echo $map_lang; ?>'></script>
      <script src="<?php echo url(''); ?>/public/assets/js/locationpicker.jquery.js"></script>
      <script>
         $('#somecomponent').locationpicker({
         location: {latitude: <?php echo  $get_store_details_id->stor_latitude;?>, longitude: <?php echo  $get_store_details_id->stor_longitude;?>},
         radius: 300,
         zoom: 12,
         });
      </script>
      <script type="text/javascript">
         $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
         });
      </script>  
      <script type="text/javascript">
         var logID = 'log',
          log = $('<div id="'+logID+'"></div>');
         $('body').append(log);
          $('[type*="radio"]').change(function () {
            var me = $(this);
            log.html(me.attr('value'));
          });
      </script>
      @else 
      <h4 style="color:#f00;">
         <center>Seems the store you are looking is not active, please contact us for more details.</center>
      </h4>
      @endif
      {!! $footer !!}
   </body>
</html>