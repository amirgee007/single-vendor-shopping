<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <!-- Bootstrap style --> 
      <!--<link id="callCss" rel="stylesheet" href="<?php echo url(''); ?>/themes/bootshop/bootstrap.min.css" media="screen"/>-->
      <!-- Bootstrap style responsive-->  
      <link href="{{ url('') }}/themes/css/planing.css" rel="stylesheet"/>
      <link href="{{ url('') }}/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
      <link href="{{ url('') }}/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
      <!-- Google-code-prettify --> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
      <link href="{{ url('') }}/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
      <!-- fav and touch icons -->
      <?php $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); ?> @foreach($favi as $fav)  @endforeach
      <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('') }}/themes/images/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('') }}/themes/images/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('') }}/themes/images/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="{{ url('') }}/themes/images/ico/apple-touch-icon-57-precomposed.png">
      <link href="{{ url('') }}/themes/css/leftmenu.css" rel="stylesheet" media="screen"/>
      <style type="text/css" id="enject"></style>
      <link href="{{ url('') }}/themes/css/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
      <script type="text/javascript" src="{{ url('') }}/themes/js/jquery.flexisel.js"></script>
      <script type="text/javascript">
         $(window).load(function() {
             $("#flexiselDemo3").flexisel({
                 visibleItems: 4,
                 itemsToScroll: 1,         
                 autoPlay: {
                     enable: false,
                     interval: 5000,
                     pauseOnHover: true
                 }        
             }); 
         });
      </script>
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
      <style type="text/css">
         .out-of-stock 
         {
         background: #ad0d0d;
         color: white;
         font-family: lato !important;
         border: none;
         padding-top: 11px;
         border-radius: 3px;
         padding-bottom: 11px;
         /* padding-left: 21px; */
         font-size: 16px;
         padding-left: 11px;
         padding-right: 13px;
         }
         .faq li {padding-bottom: 20px;}
         .faq li.q 
         {
         font-size: 120%;
         border-bottom: 1px #ddd solid;
         cursor: pointer;
         text-align: center;
         background: #464747;
         width: 19%;
         margin-left: 43%;
         list-style: none;
         padding: 8px;
         color: white;
         }
         .faq li.c 
         {
         font-size: 120%;
         border-bottom: 1px #ddd solid;
         cursor: pointer;
         text-align: center;
         background: #464747;
         width: 19%;
         margin-left: 43%;
         list-style: none;
         padding: 8px;
         color: white;
         }
         .faq li.s 
         {
         font-size: 120%;
         border-bottom: 1px #ddd solid;
         cursor: pointer;
         text-align: center;
         background: #464747;
         width: 19%;
         margin-left: 43%;
         list-style: none;
         padding: 8px;
         color: white;
         }
         .faq li.a 
         {
         display: none;
         color:#000;
         list-style-type: none;
         }
         .rotate 
         {
         -moz-transform: rotate(90deg);
         -webkit-transform: rotate(90deg);
         transform: rotate(90deg);
         }
         .main_div
         {
         text-align:center;
         background: #00C492;
         padding:20px; width: 400px;
         }
         .inner_div
         {
         background: #fff;
         margin-top:20px;
         height: 100px;
         }
         .buttons a
         {
         font-size: 16px;
         }
         .buttons a:hover
         {
         cursor:pointer;
         font-size: 16px;
         }
         .date.active 
         {
         background-color: #00b381 !important;
         padding: 9px;
         color: white;
         }
         .span9 .box 
         {
         float: left;
         width: 150px;
         margin-left: 20px;
         }
         .span9 .box .top 
         {
         padding: 9px;
         background-color: #424542;
         color: white;
         cursor: pointer;
         }
         .span9 .box .bottom 
         {
         display: none;
         }
         #mixedSlider {
         position: relative;
         }
         #mixedSlider .MS-content {
         white-space: nowrap;
         overflow: hidden;
         margin: 0 5px;
         }
         #mixedSlider .MS-content .item {
         display: inline-block;
         width: 20%;
         position: relative;
         vertical-align: top;
         overflow: hidden;
         height: 100%;
         white-space: normal;
         padding: 0 10px;
         margin:10px 15px;
         box-shadow:0px 0px 3px #8a8a8a;
         text-align: center;
         }
         #mixedSlider .MS-content .item h5
         {
         text-align: left;
         font-size: 16px;
         margin-top: 0px;
         margin-left: 5px;
         }
             #mixedSlider .MS-controls .MS-left i{ margin-top: 11px;color:#636363; }
         #mixedSlider .MS-controls .MS-right i{ margin-top: 11px;color:#636363; }
           #mixedSlider .MS-content .item .imgTitle img {
         width: 100%;
         }
         #mixedSlider .MS-controls .MS-left i{ margin-top: 11px;color:#636363; }
         #mixedSlider .MS-controls .MS-right i{ margin-top: 11px;color:#636363; }
             @media (min-width: 481px) and (max-width: 767px) {
                 #mixedSlider .MS-content .item {
         width: 42% !important;
             margin: 10px 10px;
         }}
         @media (max-width: 991px) {
         #mixedSlider .MS-content .item {
         width: 43%;
         }
         }
          @media (max-width: 480px) {
#mixedSlider .MS-content .item {
         width: 86%;
         }

          }
         @media (max-width: 767px) {
         #mixedSlider .MS-content .item {
       
         }
           #mixedSlider .MS-controls .MS-left i{ margin-top:5px;color:#636363; }
         #mixedSlider .MS-controls .MS-right i{ margin-top:5px;color:#636363; }
         }

         #mixedSlider .MS-content .item .imgTitle {
         position: relative;
         padding: 10px;
         }
        
        
         #mixedSlider .MS-content .item p {
         font-size: 14px;
         line-height: 16px;
         margin-left: 5px;
         text-align: left;
         color:#b0aeae;
         margin-bottom:5px;
         }
         #mixedSlider .MS-controls button {
         position: absolute;
         border: none;
         background:#ffffff;
         outline: 0;
         font-size: 32px;
         top: 140px;
         transition: 0.15s linear;
         box-shadow: 0px 0px 3px #8a8888;
         border-radius: 50%;
         width: 45px;
         height:45px;
         }
         #mixedSlider .MS-controls button:hover {
         color: rgba(0, 0, 0, 0.8);
         }
         @media (max-width: 992px) {
         #mixedSlider .MS-controls button {
         font-size: 30px;
         }
         }
         @media (max-width: 767px) {
         #mixedSlider .MS-controls button {
         font-size: 20px;
         }
         }
         #mixedSlider .MS-controls .MS-left {
         left: 0px;
         }
         @media (max-width: 767px) {
         #mixedSlider .MS-controls .MS-left {
         left: -10px;
         }
         }
         #mixedSlider .MS-controls .MS-right {
         right: 0px;
         }
         @media (max-width: 767px) {
         #mixedSlider .MS-controls .MS-right {
         right: -10px;
         }
         }
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
         overflow: auto;
         }
         .nbs-flexisel-inner {
         position: relative;
         overflow: hidden;
         float:left;
         width:100%;
         background:#fcfcfc;
         background: #fcfcfc -moz-linear-gradient(top, #fcfcfc 0%, #eee 100%);
         background: #fcfcfc -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfcfc), color-stop(100%,#eee)); 
         background: #fcfcfc -webkit-linear-gradient(top, #fcfcfc 0%, #eee 100%);
         background: #fcfcfc -o-linear-gradient(top, #fcfcfc 0%, #eee 100%); 
         background: #fcfcfc -ms-linear-gradient(top, #fcfcfc 0%, #eee 100%); 
         background: #fcfcfc linear-gradient(top, #fcfcfc 0%, #eee 100%); 
         border:1px solid #ccc;
         border-radius:5px;
         -moz-border-radius:5px;
         -webkit-border-radius:5px;  
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
         .nbs-flexisel-nav-left,
         .nbs-flexisel-nav-right {
         padding:5px 10px;
         border-radius:15px;
         -moz-border-radius:15px;
         -webkit-border-radius:15px;      
         position: absolute;
         cursor: pointer;
         z-index: 4;
         top: 50%;
         transform: translateY(-50%);   
         background: rgba(0,0,0,0.5);
         color: #fff;     
         }
         .nbs-flexisel-nav-left {
         left: 10px;
         }
         .nbs-flexisel-nav-left:before {
         content: "<";
         }
         .nbs-flexisel-nav-left.disabled {
         opacity: 0.4;
         }
         .nbs-flexisel-nav-right {
         right: 5px;    
         }
         .nbs-flexisel-nav-right:before {
         content: ">"
         }
         .nbs-flexisel-nav-right.disabled {
         opacity: 0.4;
         }
      </style>
      <?php 
         if(count($product_details_by_id)>0){ //print_r($product_details_by_id);
               foreach($product_details_by_id as $pro_details_by_id) { } 
               if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                 $deal_title = 'deal_title';
                 $deal_metakey = 'deal_meta_keyword';
                 $deal_metadesc = 'deal_meta_description';
               }else {  
                   $deal_title = 'deal_title_'.Session::get('lang_code');
                   $deal_metakey = 'deal_meta_keyword_'.Session::get('lang_code');
                   $deal_metadesc = 'deal_meta_description_'.Session::get('lang_code');
                }
         
         ?>
      <title>{{ $pro_details_by_id->$deal_title  }}</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="{{ $pro_details_by_id->$deal_metadesc  }}">
      <meta name="keywords" content="{{ $pro_details_by_id->$deal_metakey  }}">
      <meta name="author" content="{{ $pro_details_by_id->$deal_metakey  }}">
      <?php } ?>
   </head>
   <body>
      {!! $navbar !!}
      {!! $header !!}
      <!-- //Title -->
      @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
      @php $deal_title = 'deal_title'; @endphp
      @else @php  $deal_title = 'deal_title_'.Session::get('lang_code'); @endphp @endif
      @foreach($product_details_by_id as $pro_details_by_id) @endforeach
      @php $product_img= explode('/**/',trim($pro_details_by_id->deal_image,"/**/"));   
      $img_count = count($product_img);
      $count = $pro_details_by_id->deal_max_limit - $pro_details_by_id->deal_no_of_purchase;
      $date2 = $pro_details_by_id->deal_end_date;
      $deal_end_year = date('Y',strtotime($date2));
      $deal_end_month = date('m',strtotime($date2));
      $deal_end_date = date('d',strtotime($date2));
      $deal_end_hours = date('H',strtotime($date2));  
      $deal_end_minutes = date('i',strtotime($date2));    
      $deal_end_seconds = date('s',strtotime($date2)); 
      $product_image     = $product_img[0];
      $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
      $img_data   = "public/assets/deals/".$product_image; @endphp
      @if(file_exists($img_data) && $product_image !='')   
      @php $prod_path = url('').'/public/assets/deals/' .$product_image;  @endphp               
      @else  
      @if(isset($DynamicNoImage['dealImg']))
      @php   $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['dealImg']; @endphp
      @if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path))
      @php $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
      @endif
      @endif   
      <!-- /* Image Path ends */   
         //Alt text -->
      @php $alt_text   = substr($pro_details_by_id->$deal_title,0,25);
      $alt_text  .= strlen($pro_details_by_id->$deal_title)>25?'..':''; @endphp
      <div class="container">
         @if($success1!='')
         <p class="alert alert-danger alert-dismissable ">{!! $success1 !!}</p>
         </p>
         @endif
         <div class="all-top">
            <div class="pro-left">
               <a id="Zoomer3"  href="{{ $prod_path }}" class="MagicZoomPlus" rel="selectors-effect: fade; selectors-change: mouseover; " title="{{ $alt_text }}">
                  @php $product_image     = $product_img[0]; @endphp
                  <!-- /* Image Path */ -->
                  @php $prod_path  = url('').'/public/assets/default_image/No_image_deal.png';
                  $img_data   = "public/assets/deals/".$product_image; @endphp
                  @if(file_exists($img_data) && $product_image !='')   
                  @php $prod_path = url('').'/public/assets/deals/' .$product_image;  @endphp                
                  @else  
                  @if(isset($DynamicNoImage['dealImg']))
                  @php   $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['dealImg']; @endphp
                  @if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path))
                  @php  $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
                  @endif
                  @endif    
                  <img src="{!! $prod_path !!}"/>
               </a>
               <br/>
               @for($i=0;$i < $img_count;$i++)  
               @php $product_image     = $product_img[$i];
               $prod_path  = url('').'/public/assets/default_image/No_image_deal.png';
               $img_data   = "public/assets/deals/".$product_image; @endphp
               @if(file_exists($img_data) && $product_image !='')   
               @php $prod_path = url('').'/public/assets/deals/' .$product_image; @endphp                
               @else  
               @if(isset($DynamicNoImage['dealImg']))
               @php   $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['dealImg']; @endphp
               @if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path))
               @php    $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
               @endif
               @endif  
               <a href="{{ $prod_path }}" rel="zoom-id: Zoomer3" rev="{{ $prod_path }}"><img src="{{ $prod_path }}" alt="{{ $alt_text }}" style="width:85px; height:auto"/></a>
               @endfor
               <?php /*
                  <div class="xzoom-container">
                    <img class="xzoom5" id="xzoom-magnific" src="images/preview.jpg" xoriginal="images/full.jpg" />
                        <div class="xzoom-thumbs">
                  
                  
                                                          
                            <ul id="flexiselDemo3">
                            <li>  <a href="images/full.jpg"><img class="xzoom-gallery5" width="80" height="80px" src="images/full.jpg"  xpreview="images/preview.jpg" title="The description goes here"></a></li>
                  
                                <li> <a href="images/full.jpg"><img class="xzoom-gallery5" width="80" src="images/full.jpg"  xpreview="images/preview.jpg" title="The description goes here"></a></li>
                  
                               <li>   <a href="images/full.jpg"><img class="xzoom-gallery5" width="80" src="images/full.jpg"  xpreview="images/preview.jpg" title="The description goes here"></a></li>
                  
                                <li>  <a href="images/full.jpg"><img class="xzoom-gallery5" width="80" src="images/full.jpg"  xpreview="images/preview.jpg" title="The description goes here"></a></li>
                  
                                  
                  
                            </ul>
                        </div>
                    </div>       
                  */ ?>
            </div>
            <div class="pro-right">
               <div class="pro-rightop">
                  <h2> 
                     @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                     @php $deal_title = 'deal_title'; @endphp
                     @else @php  $deal_title = 'deal_title_'.Session::get('lang_code'); @endphp @endif
                     {{ $pro_details_by_id->$deal_title }}
                  </h2>
                  @php
                  $product_count = $one_count + $two_count + $three_count + $four_count + $five_count;
                  $multiple_countone = $one_count *1;
                  $multiple_counttwo = $two_count *2;
                  $multiple_countthree = $three_count *3;
                  $multiple_countfour = $four_count *4;
                  $multiple_countfive = $five_count *5;
                  $product_total_count = $multiple_countone + $multiple_counttwo + $multiple_countthree + $multiple_countfour + $multiple_countfive; @endphp
                  <p class="left-label">
                     @if($product_count)
                     @php   $product_divide_count = $product_total_count / $product_count; @endphp
                     @if($product_divide_count <= '1') 
                     @if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }}  @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                     <img src='{{ url("./images/stars-1.png") }}' style='margin-bottom:10px;'> 
                     @elseif($product_divide_count >= '1') 
                     @if(Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{ trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                     <img src='{{ url("./images/stars-1.png")}}' style='margin-bottom:10px;'> 
                     @elseif($product_divide_count >= '2') 
                     @if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                     <img src='{{ url("./images/stars-2.png") }}' style='margin-bottom:10px;'>  
                     @elseif($product_divide_count >= '3') 
                     @if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                     <img src='{{ url("./images/stars-3.png") }}' style='margin-bottom:10px;'>
                     @elseif($product_divide_count >= '4') 
                     @if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                     <img src='{{ url("./images/stars-4.png") }}' style='margin-bottom:10px;'> 
                     @elseif($product_divide_count >= '5') 
                     @if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{ trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                     <img src='{{ url("./images/stars-5.png") }}' style='margin-bottom:10px;'>
                     @else
                     {{ "No Rating for this Product" }}
                     @endif
                     @elseif($product_count)
                     @php $product_divide_count = $product_total_count / $product_count; @endphp
                     @else {{ "No Rating for this Deal" }} @endif
                     <span class="Review-count"><strong>({{ $count_review_rating }} Review & Ratings )</strong></span>
                  </p>
               </div>
               {!! Form :: open(array('url' => 'addtocart_deal','class'=>'form-horizontal qtyFrm','enctype'=>'multipart/form-data')) !!}
               <div class="pro-mid">
                  <div class="details-left">
                     @if($count > 0) 
                     <div class="detail-list">
                        <div class="details-left-label"><label class="left-label">@if (Lang::has(Session::get('lang_file').'.QUANTITY')!= '') {{  trans(Session::get('lang_file').'.QUANTITY') }} @else {{ trans($OUR_LANGUAGE.'.QUANTITY') }} @endif :</label></div>
                        <div class="details-left-select">
                           <div class="handle-counter" id="handleCounter">
                              <select class="form-control" name="addtocart_qty" id="addtocart_qty" >
                                 @php   $cont_qty1 = $pro_details_by_id->deal_max_limit - $pro_details_by_id->deal_no_of_purchase; @endphp
                                 @if($cont_qty1 > 10 ) {{ $cont_qty = 10 }} @else {{ $cont_qty = $cont_qty1 }} @endif
                                 @for($k=1; $k <= $cont_qty; $k++)
                                 <option value="{{ $k }}" >{{ $k }}</option>
                                 @endfor
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="detail-list">
                        <div class="details-left-label"><label class="left-label">Available Stock :</label></div>
                        <div class="details-left-select">
                           <p class="stock-list">{{ $pro_details_by_id->deal_no_of_purchase }} @if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{ trans(Session::get('lang_file').'.SOLD') }} @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif / {{  ($pro_details_by_id->deal_max_limit)-($pro_details_by_id->deal_no_of_purchase) }} @if (Lang::has(Session::get('lang_file').'.IN_STOCK')!= '') {{ trans(Session::get('lang_file').'.IN_STOCK') }} @else {{ trans($OUR_LANGUAGE.'.IN_STOCK') }} @endif</p>
                        </div>
                     </div>
                     @php $delivery_date = '+'.$pro_details_by_id->deal_delivery.'days'; @endphp
                     <div class="detail-list">
                        <div class="details-left-label"><label class="left-label">@if (Lang::has(Session::get('lang_file').'.DELIVERY_WITH_IN')!= '') {{  trans(Session::get('lang_file').'.DELIVERY_WITH_IN') }} @else {{ trans($OUR_LANGUAGE.'.DELIVERY_WITH_IN') }} @endif :</label></div>
                        <div class="details-left-select">
                           <p class="stock-list"><?php echo date('D d, M Y', strtotime($delivery_date)); ?></p>
                        </div>
                     </div>
                     @endif
					 
					 <input type="hidden" id="enddate" name="enddate" value="{{ $pro_details_by_id->deal_end_date }}">
					 <input type="hidden" id="enddate_format" name="enddate_format" value="<?php echo date('F j, Y, G:i:s',strtotime($pro_details_by_id->deal_end_date)); ?>">
					 
				  <div class="detail-list">
					<div class="details-left-label"><label class="left-label">@if (Lang::has(Session::get('lang_file').'.DEAL_ENDS_IN')!= '') {{  trans(Session::get('lang_file').'.DEAL_ENDS_IN') }} @else {{ trans($OUR_LANGUAGE.'.DEAL_ENDS_IN') }} @endif :</label></div>
					<div class="details-left-select">
					   <p id="demo" class="stock-list"></p>
					</div>
				 </div>
					 
                  </div>
                  <div class="Priec-right">
                     <p class="old-price"> <strike>{{ Helper::cur_sym() }} {{ $pro_details_by_id->deal_original_price }}</strike></p>
                     <p class="new-price"> {{ Helper::cur_sym() }} {{ $pro_details_by_id->deal_discount_price }} <span class="offer">({{ $pro_details_by_id->deal_discount_percentage }}% @if (Lang::has(Session::get('lang_file').'.OFFER')!= '') {{  trans(Session::get('lang_file').'.OFFER') }} @else {{ trans($OUR_LANGUAGE.'.OFFER') }} @endif)</span></p>
                     {{ Form::hidden('addtocart_deal_id',$pro_details_by_id->deal_id)}}
                     <!--  <input type="hidden" name="addtocart_deal_id" value="<?php echo $pro_details_by_id->deal_id; ?>" /> -->
                     {{ Form::hidden('addtocart_type','deals')}}
                     <!-- <input type="hidden" name="addtocart_type" value="deals" /> -->
                     <input type="hidden" name="return_url" value="<?php echo $pro_details_by_id->mc_name.'/'.base64_encode(base64_encode(base64_encode($pro_details_by_id->deal_category))); ?>" />
                     <div class="cart-top">
                        <div class="pro-cart">
                           @if(Session::has('customerid')) 
                           @if($count > 0)
                           <button type="submit" id="add_to_cart_session">
                           <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                           @if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{  trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif
                           </button> 
                           @else 
                           <button type="button" id="add_to_cart_session">
                           @if (Lang::has(Session::get('lang_file').'.SOLD_OUT')!= '') {{  trans(Session::get('lang_file').'.SOLD_OUT') }} @else {{ trans($OUR_LANGUAGE.'.SOLD_OUT') }} @endif
                           </button> 
                           @endif 
                           @else
                           <a href="#login" role="button" data-toggle="modal"  id="login_a_click">
                           <button type="button">
                           <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                           @if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif
                           </button> 
                           </a>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               </form> <!--add to cart form-->
               {{-- Policy Details --}}
               @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
               @php    $cancel_policy  = 'cancel_policy';
               $return_policy  = 'return_policy';
               $replace_policy = 'replace_policy'; @endphp
               @else   
               @php    $cancel_policy  = 'cancel_policy_'.Session::get('lang_code'); 
               $return_policy  = 'return_policy_'.Session::get('lang_code'); 
               $replace_policy = 'replace_policy_'.Session::get('lang_code'); @endphp
               @endif
               <div class="cancel-policy">
                  @if($pro_details_by_id->allow_cancel=='1')
                  <p class="policy-title"> @if($pro_details_by_id->cancel_days>0) 
                     {{ $pro_details_by_id->cancel_days }}
                     @if($pro_details_by_id->cancel_days>1) 
                     days
                     @else 
                     day
                     @endif
                     @if (Lang::has(Session::get('lang_file').'.CANCELLATION_ONLY')!= '') {{  trans(Session::get('lang_file').'.CANCELLATION_ONLY') }}  @else {{ trans($OUR_LANGUAGE.'.CANCELLATION_ONLY') }} @endif
                     <span class="policy-quest" id="policyclick"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></span>
                     <br>
                     @if($pro_details_by_id->$cancel_policy!='')
                  <div class="policy-container dev_cancel" style="display: none;"> 
                     {!! $pro_details_by_id->$cancel_policy !!}    
                  </div>
                  @endif    
                  @endif
                  </p>
                  @endif
                  @if($pro_details_by_id->allow_return=='1')
                  <p class="policy-title"> @if($pro_details_by_id->return_days>0) 
                     {{ $pro_details_by_id->return_days }}
                     @if($pro_details_by_id->return_days>1) 
                     days
                     @else 
                     day
                     @endif
                     @if (Lang::has(Session::get('lang_file').'.RETURN_ONLY')!= '') {{ trans(Session::get('lang_file').'.RETURN_ONLY') }} @else {{ trans($OUR_LANGUAGE.'.RETURN_ONLY') }} @endif
                     <span class="policy-quest" id="returnclick"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></span>
                     <br>
                     @if($pro_details_by_id->$return_policy!='')
                  <div class="policy-container dev_return" style="display: none;"> 
                     {!! $pro_details_by_id->$return_policy !!}    
                  </div>
                  @endif        
                  @endif
                  </p>
                  @endif 
                  @if($pro_details_by_id->allow_replace=='1')
                  <p class="policy-title"> @if($pro_details_by_id->replace_days>0) 
                     {{ $pro_details_by_id->replace_days }}
                     @if($pro_details_by_id->replace_days>1) 
                     days
                     @else 
                     day
                     @endif
                     @if (Lang::has(Session::get('lang_file').'.REPLACEMENT_ONLY')!= '') {{ trans(Session::get('lang_file').'.REPLACEMENT_ONLY') }}  @else {{ trans($OUR_LANGUAGE.'.REPLACEMENT_ONLY') }} @endif
                     <span class="policy-quest" id="replaceclick"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></span>
                     <br>
                     @if($pro_details_by_id->$replace_policy!='')
                  <div class="policy-container dev_replace" style="display: none;"> 
                     {!! $pro_details_by_id->$replace_policy !!}    
                  </div>
                  @endif        
                  @endif
                  </p>
                  @endif    
               </div>
               {{-- Policy Details --}}
            </div>
         </div>
         <div class="pro-description">
            <h5 class="pro-description-title">@if (Lang::has(Session::get('lang_file').'.PRODUCT_INFORMATION')!= '') {{ trans(Session::get('lang_file').'.PRODUCT_INFORMATION') }} @else {{ trans($OUR_LANGUAGE.'.PRODUCT_INFORMATION') }} @endif</h5>
            <p> 
               @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
               @php $deal_description = 'deal_description'; @endphp
               @else  @php $deal_description = 'deal_description_'.Session::get('lang_code'); @endphp @endif
               {{ $pro_details_by_id->$deal_description }}
            </p>
         </div>
         <div class="Ratings-review">
            <div class="review-title">
               <h5 class="">Reviews & Ratings</h5>
               <div class="write-review">
                  @if(Session::has('customerid')) <a href="#review-comment">@if (Lang::has(Session::get('lang_file').'.WRITE_A_REVIEW')!= '') {{  trans(Session::get('lang_file').'.WRITE_A_REVIEW') }} @else {{ trans($OUR_LANGUAGE.'.WRITE_A_REVIEW')}} @endif</a> 
                  @else 
                  <a href="#login" role="button" data-toggle="modal"  id="login_a_click"  value="@if (Lang::has(Session::get('lang_file').'.LOGIN')!= '') {{ trans(Session::get('lang_file').'.LOGIN') }} @else {{ trans($OUR_LANGUAGE.'.LOGIN') }} @endif">@if (Lang::has(Session::get('lang_file').'.WRITE_A_REVIEW_POST')!= '') {{ trans(Session::get('lang_file').'.WRITE_A_REVIEW_POST') }} @else {{ trans($OUR_LANGUAGE.'.WRITE_A_REVIEW_POST') }} @endif</a>
                  @endif
               </div>
            </div>
            @if(count($review_details)!=0)
            @php $r=0; @endphp
            @foreach($review_details as $col)
            @php    $r++; 
            $customer_name = $col->cus_name;
            $customer_mail = $col->cus_email;
            $customer_img = $col->cus_pic;
            $customer_comments = $col->comments;
            $customer_date = $col->review_date;
            $customer_product = $col->deal_id; 
            $comment_date = date('F j, Y', strtotime($col->review_date) );
            $customer_title = $col->title;
            $customer_name_arr = str_split($customer_name);
            $start_letter = 's';//strtolower($customer_name_arr[0]);
            $customer_ratings = $col->ratings; @endphp
            <div class="reviews-single">
               <div class="reviews-single-left">
                  <div class="name-letter">
                     <p>{{ $customer_name_arr[0] }}</p>
                  </div>
               </div>
               <div class="reviews-single-right">
                  @if($customer_ratings=='1')
                  <img src='{{ url('./images/stars-1.png')}}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                  @elseif($customer_ratings=='2')
                  <img src='{{ url('./images/stars-2.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                  @elseif($customer_ratings=='3')
                  <img src='{{ url('./images/stars-3.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                  @elseif($customer_ratings=='4')
                  <img src='{{ url('./images/stars-4.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{ trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                  @elseif($customer_ratings=='5')
                  <img src='{{ url('./images/stars-5.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{ trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                  @else @endif
                  <h5>{{ $customer_title }}</h5>
                  <h6>by {{ $customer_name }} On {{ $comment_date }}</h6>
                  <p>{{ $customer_comments }}</p>
               </div>
            </div>
            @endforeach<!-- //foreach --> 
            @if($r==0){{ 'No Reviews & Ratings.' }}@else 
            <div class="more-review">
               <a href="<?php echo url('deal_review_all/'.$pro_details_by_id->deal_id);?>">More Review</a>
            </div>
            @endif 
            @else{{ "No Reviews & Ratings." }} @endif
         </div>
         @if(count($get_related_product)!=0)  
         @php   $i=0; @endphp
         <div class="Similer-product">
            <h5 class="pro-description-title">@if (Lang::has(Session::get('lang_file').'.RELATED_PRODUCTS')!= '') {{ trans(Session::get('lang_file').'.RELATED_PRODUCTS') }} @else {{ trans($OUR_LANGUAGE.'.RELATED_PRODUCTS') }} @endif</h5>
            <div id="mixedSlider">
               <div class="MS-content">
                  @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                  @php   $deal_title = 'deal_title'; @endphp
                  @else @php  $deal_title = 'deal_title_'.Session::get('lang_code'); @endphp @endif
                  @foreach($get_related_product as $product_det) 
                  @php  $mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
                  $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
                  $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
                  $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name));
                  $res = base64_encode($product_det->deal_id);
                  $product_image = explode('/**/',$product_det->deal_image);
                  $product_saving_price = $product_det->deal_original_price - $product_det->deal_discount_price;
                  $product_discount_percentage = round(($product_saving_price/ $product_det->deal_original_price)*100,2);
                  $product_img     = $product_image[0]; 
                  $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
                  $img_data   = "public/assets/deals/".$product_img; @endphp
                  @if(file_exists($img_data) && $product_img !='')   
                  @php $prod_path = url('').'/public/assets/deals/' .$product_img;  @endphp                
                  @else  
                  @if(isset($DynamicNoImage['dealImg']))
                  @php  $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['dealImg']; @endphp
                  @if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path))
                  @php   $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
                  @endif
                  @endif   
                  @php  $alt_text   = substr($product_det->$deal_title,0,25);
                  $alt_text  .= strlen($product_det->$deal_title)>25?'..':''; @endphp
                  @if($product_det->deal_no_of_purchase < $product_det->deal_max_limit) 
                  @php    $i++;
                  $redirect_url ='';     @endphp                 
                  @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')  
                  @php    $redirect_url =  url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; @endphp
                  @endif 
                  @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '')  
                  @php   $redirect_url =  url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res ; @endphp
                  @endif 
                  @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '')  
                  @php     $redirect_url =  url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res; @endphp
                  @endif
                  <div class="item">
                     <a href="{{ $redirect_url }}">
                        <div class="imgTitle">
                           <img src="{{ $prod_path }}" alt="{{ $alt_text }}" />
                        </div>
                        <p class="slide-product-title rltd_pdct_tl">{{ substr ($product_det->$deal_title,0,20)}}</p>
                        <h5 class="">{{ Helper::cur_sym() }} {{ $product_det->deal_discount_price }}</h5>
                     </a>
                  </div>
                  @endif <!-- //if -->
                  @endforeach <!-- //foreach -->  
               </div>
               @if($i==0){{ "No Related Products Available." }} 
               @else 
                 @if(count($get_related_product)>4)   
               <div class="MS-controls">
                  <button class="MS-left"><i class="icon-chevron-left"></i></button>
                  <button class="MS-right"><i class="icon-chevron-right"></i></button>
               </div>
               @endif
                @endif
            </div>
         </div>
         @endif
         @if(Session::has('customerid'))
         <div class="your-review" id="review-comment">
            <h5 class="pro-description-title">@if (Lang::has(Session::get('lang_file').'.WRITE_A_REVIEW_POST')!= '') {{ trans(Session::get('lang_file').'.WRITE_A_REVIEW_POST') }} @else {{ trans($OUR_LANGUAGE.'.WRITE_A_REVIEW_POST') }} @endif</h5>
            {!! Form::open(array('url'=>'dealcomments','class'=>'form-horizontal loginFrm')) !!}
            <div class="product-rate">
               <label class="control-label review_ratings_label" for="review_ratings" style="text-align: left;">
                  <h4>@if (Lang::has(Session::get('lang_file').'.RATE_THIS_PRODUCT')!= '') {{ trans(Session::get('lang_file').'.RATE_THIS_PRODUCT') }} @else {{ trans($OUR_LANGUAGE.'.RATE_THIS_PRODUCT') }} @endif</h4>
               </label>
               <input type="hidden" name="customer_id" value="{{ Session::get('customerid') }}">
               <input type="hidden" name="deal_id" value="{!!$pro_details_by_id->deal_id!!}">
               <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
               <fieldset class="rating disableRating addReviews">
                  <input id="review_ratings_5" name="ratings" type="radio" value="5" required> 
                  <label for="review_ratings_5" title="Awesome - 5 stars"> </label>
                  <input id="review_ratings_4" name="ratings" type="radio" value="4" required> 
                  <label for="review_ratings_4" title="Pretty good - 4 stars"> </label>
                  <input id="review_ratings_3" name="ratings" type="radio" value="3" required> 
                  <label for="review_ratings_3" title="Not bad - 3 stars"> </label>
                  <input id="review_ratings_2" name="ratings" type="radio" value="2" required> 
                  <label for="review_ratings_2" title="Bad - 2 stars"> </label>
                  <input id="review_ratings_1" name="ratings" type="radio" value="1" required> 
                  <label for="review_ratings_1" title="Very Bad - 1 stars"> </label>
               </fieldset>
            </div>
            <div>
               <label class="control-label review_ratings_label" for="review_ratings" 
                  style="text-align: left;">
                  <h4>@if (Lang::has(Session::get('lang_file').'.REVIEW_THIS_PRODUCT')!= '') {{  trans(Session::get('lang_file').'.REVIEW_THIS_PRODUCT') }} @else {{ trans($OUR_LANGUAGE.'.REVIEW_THIS_PRODUCT') }} @endif</h4>
               </label>
               <div class="review-page-title">
                  <input type="text" name="title" value="" placeholder="@if (Lang::has(Session::get('lang_file').'.REVIEW_TITLE')!= '') {{ trans(Session::get('lang_file').'.REVIEW_TITLE') }}  @else {{ trans($OUR_LANGUAGE.'.REVIEW_TITLE') }} @endif" required>
                  <textarea name="comments" placeholder="@if (Lang::has(Session::get('lang_file').'.REVIEW_DESCRIPTION')!= '') {{ trans(Session::get('lang_file').'.REVIEW_DESCRIPTION') }} @else {{ trans($OUR_LANGUAGE.'.REVIEW_DESCRIPTION') }} @endif" required></textarea>
                  <button type="submit" class="btn-success">@if (Lang::has(Session::get('lang_file').'.SUBMIT_REVIEW')!= '') {{  trans(Session::get('lang_file').'.SUBMIT_REVIEW') }} @else {{ trans($OUR_LANGUAGE.'.SUBMIT_REVIEW') }} @endif</button>
               </div>
            </div>
            </form>
         </div>
         @endif
         
      </div>
      </div>
      {!! $footer !!}
      <script type="text/javascript">
         $(document).ready(function() {
             $(document).on("click", ".customCategories .topfirst b", function() {
                 $(this).next("ul").css("position", "relative");
         
                 $(".topfirst ul").not($(this).parents(".topfirst").find("ul")).css("display", "none");
                 $(this).next("ul").toggle();
             });
         
             $(document).on("click", ".morePage", function() {
                 $(".nextPage").slideToggle(200);
             });
         
             $(document).on("click", "#smallScreen", function() {
                 $(this).toggleClass("customMenu");
             });
         
             $(window).scroll(function() {
                 if ($(this).scrollTop() > 250) {
                     $('#comp_myprod').show();
                 } else {
                     $('#comp_myprod').hide();
                 }
             });
         
         });
      </script>
      <!-- For Responsive menu-->
      <!--  zoom-->
      <script src="{{ url('') }}/themes/js/zoom/jquery.js"></script>
      <link rel="stylesheet" type="text/css" href="{{ url('') }}/themes/css/zoom/xzoom.css" media="all" />
      <script type="text/javascript" src="{{ url('') }}/themes/js/zoom/xzoom.min.js"></script>
      <link type="text/css" rel="stylesheet" media="all" href="{{ url('') }}/themes/css/zoom/magnific-popup.css" />
      <script type="text/javascript" src="{{ url('') }}/themes/js/zoom/magnific-popup.js"></script> 
      <script src="{{ url('') }}/themes/js/zoom/foundation.min.js"></script>
      <script src="{{ url('') }}/themes/js/zoom/setup.js"></script>
      <!---Zoom-->
      <script src="{{ url('') }}/themes/js/jquery.js" type="text/javascript"></script>
      <!--   <script src="<?php //echo url(); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script> -->
      <script src="{{ url('') }}/themes/js/google-code-prettify/prettify.js"></script>
      <script src="{{ url('') }}/themes/js/bootshop.js"></script>
      <script src="{{ url('') }}/themes/js/jquery.lightbox-0.5.js"></script>
      <script src="{{ url('') }}/themes/js/multislider.js"></script>
      <script>
         $('#basicSlider').multislider({
                  continuous: true,
                  duration: 2000
               });
          <?php if(count($get_related_product)>4) { ?> 
               $('#mixedSlider').multislider({
                 autoSlide: true,
                  duration: 750,
                  interval: 3000
               });
                   <?php } ?>
      </script>
      <script src="{{ url('') }}/themes/js/handleCounter.js"></script>
      <script>
         $(function ($) {
             var options = {
                 minimum: 1,
                 maximize: 10,
                 onChange: valChanged,
                 onMinimum: function(e) {
                     console.log('reached minimum: '+e)
                 },
                 onMaximize: function(e) {
                     console.log('reached maximize'+e)
                 }
             }
             $('#handleCounter').handleCounter(options)
             $('#handleCounter2').handleCounter(options)
         $('#handleCounter3').handleCounter({maximize: 100})
         })
         function valChanged(d) {
         //            console.log(d)
         }
      </script>
      <script type="text/javascript">
         $.ajaxSetup({
             headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
         });
      </script>
      <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=<?php echo $GOOGLE_KEY;?>'></script>
      <script src="{{ url('') }}/public/assets/js/locationpicker.jquery.js"></script>
      
      <!--Zoom image script-->
      <script src='http://code.jquery.com/jquery-1.9.1.min.js'></script>
      <script type="text/javascript" src="{{ url('') }}/themes/js/jquery.js"></script>
      <script src="{{ url('') }}/themes/js/magiczoomplus.js" type="text/javascript"></script>    
      <script type="text/javascript">
         $(document).ready(function()
         {
         $('#policyclick').click(function(event)
         
         {
         $('.dev_cancel').slideToggle("fast");
         event.stopPropagation();
         });
         $('#returnclick').click(function(event)
         
         {
         $('.dev_return').slideToggle("fast");
         event.stopPropagation();
         });
         $('#replaceclick').click(function(event)
         
         {
         $('.dev_replace').slideToggle("fast");
         event.stopPropagation();
         });
         
         
         $(".policy-container").on("click", function (event) {
         event.stopPropagation();
         });
         
         });
         
         
         $(document).on("click", function () {
         $(".policy-container").hide();
         });
         
      </script>
	  
<script>
// Set the date we're counting down to

var getenddate = document.getElementById("enddate").value;
var getenddate_format = document.getElementById("enddate_format").value;
var countDownDate = new Date(getenddate_format).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
   </body>
</html>