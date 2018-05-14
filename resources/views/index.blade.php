{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
@if(!isset($_SESSION['compare_product']))
@php 	$_SESSION['compare_product']=array(); @endphp
@endif 
<style type="text/css">
   /*Small-slider*/
   #quote-carousel
   {
   margin-top: 18px;
   }
   #quote-carousel1 
   {
   margin-top: 18px;
   }
   #quote-carousel2 
   {
   margin-top: 18px;
   }
   #quote-carousel .carousel-control
   {
   background: none;
   color: #222;
   font-size: 2.3em;
   text-shadow: none;
   margin-top: 30px;
   }
   #quote-carousel .carousel-control.left 
   {
   left: -12px;
   }
   #quote-carousel .carousel-control.right 
   {
   right: -12px;
   }
   #quote-carousel .carousel-indicators 
   {
   top: auto;
   bottom: 0px;
   }
   #quote-carousel .carousel-indicators .text-center img
   {
   width: 100%;
   }
   #quote-carousel .carousel-indicators li 
   {
   background: green;
   }
   #quote-carousel .carousel-indicators .active 
   {
   background: darkgreen;
   }
   .item blockquote {
   border-left: none; 
   margin: 0;
   }
   .pro-slide .carousel-inner
   {
   width: 104%;
   }
   .pro-slide .span4{margin-left:18px;}
   .product__image{width:171px;}
</style>
<div class="container">
   <div class="row">
      <div class="span3 side-men customCategories">
         <div class="side-menu-head"><strong> @if (Lang::has(Session::get('lang_file').'.CATEGORIES')!= '') {{ trans(Session::get('lang_file').'.CATEGORIES') }}  @else {{ trans($OUR_LANGUAGE.'.CATEGORIES') }} @endif</strong></div>
         @php
         $prod_path_loader = url('').'/public/assets/noimage/product_loading.gif';
         $image_exist_count="";
         $i=1; @endphp 
         @if(count($main_category)>0)
         <ul id="css3menu1" class="topmenu">
            {{ Form::checkbox('','',null,array('class'=>'switchbox','id'=>'css3menu-switcher')) }}
            {{ Form::label('css3menu-switcher','',array('class'=>'switch','onclick'=>'')) }}
            @foreach($main_category as $fetch_main_cat)
            @php	$pass_cat_id1 = "1,".$fetch_main_cat->mc_id; @endphp
            @if($i<=7)
            <li class="topfirst">
               <a href="{{ url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1) }}">
               @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
               @php  $mc_name = 'mc_name'; @endphp
               @else   @php $mc_name = 'mc_name_'.Session::get('lang_code'); @endphp @endif
               {{ $fetch_main_cat->mc_name }}
               </a> <b class="OpenCat" onclick="">+</b>
               @if(count($sub_main_category[$fetch_main_cat->mc_id])> 0)
               <ul>
                  @foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)
                  @php	$pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; @endphp
                  <li class="subfirst">
                     <a href="{{ url('catproducts/viewcategorylist') ."/".base64_encode($pass_cat_id2) }}">
                     @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                     @php  $smc_name = 'smc_name'; @endphp
                     @else  @php $smc_name = 'smc_name_'.Session::get('lang_code'); @endphp @endif
                     {{ $fetch_sub_main_cat->$smc_name  }}
                     </a> <b class="OpenCat" onclick="">+</b>
                     @if(count($second_main_category[$fetch_sub_main_cat->smc_id])> 0)
                     <ul>
                        @foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat)
                        @php	$pass_cat_id3 = "3,".$fetch_sub_cat->sb_id; @endphp
                        <li class="subsecond">
                           <a href=" {{ url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3) }} ">
                           @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                           @php $sb_name = 'sb_name'; @endphp
                           @else  @php $sb_name = 'sb_name_'.Session::get('lang_code'); @endphp @endif
                           {{ $fetch_sub_cat->$sb_name }}
                           </a>
                           @if(count($second_sub_main_category[$fetch_sub_cat->sb_id])> 0)
                           <ul>
                              @foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat)  
                              @php $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; @endphp
                              <li class="subthird"><a href="{{ url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4) }}">
                                 @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                                 @php	$ssb_name = 'ssb_name'; @endphp
                                 @else  @php $ssb_name = 'ssb_name_'.Session::get('lang_code'); @endphp @endif
                                 {{ $fetch_secsub_cat->$ssb_name }}
                                 </a>
                              </li>
                              @endforeach
                           </ul>
                           @endif
                        </li>
                        @endforeach 
                     </ul>
                     @endif
                     @endforeach 
               </ul>
               @endif
               @endif  @php $i++; @endphp
               @endforeach
            <li class="topfirst"><a href="{{ url('category_list_all') }}"><b>@if (Lang::has(Session::get('lang_file').'.MORE_CATEGORIES')!= '') {{ trans(Session::get('lang_file').'.MORE_CATEGORIES') }}  @else {{ trans($OUR_LANGUAGE.'.MORE_CATEGORIES') }} @endif </b></a>
            </li>
         </ul>
         @else  
         <!--putendif-->	
         @if (Lang::has(Session::get('lang_file').'.NO_CATEGORY_FOUND')!= '') {{ trans(Session::get('lang_file').'.NO_CATEGORY_FOUND') }}  @else {{ trans($OUR_LANGUAGE.'.NO_CATEGORY_FOUND') }} @endif
         @endif
         <br>
         <div class="clearfix"></div>
         <br/>
      </div>
      <div class="homeSlider span9">
         <div id="carouselBlk">
            <div id="myCarousel" class="carousel slide">
               <div class="carousel-inner">
                  @php $banner_img_found=0; @endphp
                  @if(count($bannerimagedetails) >0 )
                  @php $i=1; @endphp

                  @foreach($bannerimagedetails as $banner)
                  <?php 
               $pro_img = $banner->bn_img;
               $prod_path = url('').'/public/assets/default_image/No_image_banner.png'; ?>
                              
                     <?php   $img_data = "public/assets/bannerimage/".$pro_img; ?>
                    @if(file_exists($img_data) && $pro_img != '')
                   
                  <?php     $prod_path = url('').'/public/assets/bannerimage/'.$pro_img; ?>
                   
                   @else
                   
                      @if(isset($DynamicNoImage['banner'])) 
                               <?php               
                                 $dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['banner']; ?>
                                    @if($DynamicNoImage['banner'] !='' && file_exists($dyanamicNoImg_path))
                                     
                                    <?php $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['banner']; ?>
                                    @endif
                                @endif
                               
                   
              @endif
              
                  
                  <div  @if($i==1)  class="item active" @else  class="item"  @endif >
                  @php $file_name=$prod_path; @endphp
                  @if($file_name!='') @php $banner_img_found++; @endphp
                  <a href="{{ $banner->bn_redirecturl }}" target='_blank'><img src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}"  alt=""/></a>
                  @else   
                  <div class="">
                     <a><img style="width:100%" src="{{ url('')}}/public/assets/noimage/No_image_1509364387_870x350.png " alt="special offers"/></a>
                  </div>
                  @endif
               </div>
               @php $i++; @endphp  @endforeach  @else 
               <div class="item active">
                  <a><img style="width:100%" src="{{ url('')}}/public/assets/noimage/No_image_1509364387_870x350.png " alt="special offers"/></a>
               </div>
               @endif
            </div>
            @if(count($bannerimagedetails)>1)  
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
            @endif
         </div>
      </div>
   </div>
</div>
</div>
<div class="container">
   <div style="height:25px"></div>
</div>
@if(count($addetails)>0)  
<div id="no_image_hide" class="container hide-mob hid-tab center_banner">
   <div class="">
      @php
      $image_exist_count=0; @endphp
      <?php $noimgpath="public/assets/noimage/No_image_1509364387_380x215.png"; ?>
      @if(isset($DynamicNoImage['ads']))
      @php $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['ads']; @endphp
      @if($DynamicNoImage['ads']!='' && file_exists(trim($dyanamicNoImg_path)))
      @php	$noimgpath =url('')."/".$dyanamicNoImg_path; @endphp @endif
      @endif
      @php $count=1; @endphp
      @foreach($addetails as $adinfo)  
      <?php $imgpath="public/assets/adimage/".$adinfo->ad_img; ?>
      @php $adurl=$adinfo->ad_redirecturl;  @endphp
      @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
      <?php $ad_name = 'ad_name'; ?>
      @else   @php $ad_name = 'ad_name_'.Session::get('lang_code');  @endphp @endif
      @php $image_exist_count++ ; @endphp
      <div  @if(count($addetails)==1) class="threeColumn centered_img1" @elseif(count($addetails)==2)  class="threeColumn centered_img2" @elseif(count($addetails)==3)  class="threeColumn centered_img3" @endif >
      <div id="spn4">
         <a href="{{ $adurl}}" target="_blank" title="{{$adinfo->$ad_name}}">
         @if(file_exists($imgpath))  
         <img src="{{ url('').'/'.$imgpath}}" class="" width="100%" height="auto"></a>
      </div>
   </div>
   @else 
   <img src="{{ $noimgpath}}" alt="No Image Available" width="100%" height="auto"></a>
</div>
</div>  @endif  @endforeach 
</div>
</div>
@endif
{{ Form::Hidden('','$image_exist_count',array('id'=>'image_exist_count'))}}
<!-- <input type="hidden" name="" id="image_exist_count" value="{{ $image_exist_count}} "> -->
<div id="mainBody">
   <div class="container home-pro" >
      @if(Session::has('wish'))
      <p class="alert {!! Session::get('alert-class', 'alert-success') !!}">{!! Session::get('wish') !!}</p>
      @endif
      @if (Session::has('success'))
      <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
      @endif
      <div class="row" id="hmenwprd">
         @if(count($dealsof_day_details) != 0) 
         <!-- Sidebar ================================================== -->
         <center>
            <h3 class="home-heading marginHeading">
               @if (Lang::has(Session::get('lang_file').'.DEALS_OF_THE_DAY')!= '') {{ trans(Session::get('lang_file').'.DEALS_OF_THE_DAY') }}  @else {{ trans($OUR_LANGUAGE.'.DEALS_OF_THE_DAY') }} @endif
            </h3>
         </center>
         <div id="demo" class="span12 tab-land-wid">
            <div class="view">
               <section class="grid">
                  @php $date = date('Y-m-d H:i:s'); @endphp
                  @foreach($dealsof_day_details as $fetch_most_visit_pro) 
                  @php	$mostproduct_discount_percentage = $fetch_most_visit_pro->deal_discount_percentage;
                  $mostproduct_img = explode('/**/', $fetch_most_visit_pro->deal_image);
                  $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
                  $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
                  $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
                  $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
                  $res = base64_encode($fetch_most_visit_pro->deal_id);
                  $date2 = $fetch_most_visit_pro->deal_end_date;
                  $deal_end_year = date('Y',strtotime($date2));
                  $deal_end_month = date('m',strtotime($date2));
                  $deal_end_date = date('d',strtotime($date2));
                  $deal_end_hours = date('H',strtotime($date2));  
                  $deal_end_minutes = date('i',strtotime($date2));    
                  $deal_end_seconds = date('s',strtotime($date2));  @endphp
                  <!-- //Title -->
                  @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                  @php  $deal_title = 'deal_title'; @endphp
                  @else  @php $deal_title = 'deal_title_'.Session::get('lang_code'); @endphp @endif
                  @if($fetch_most_visit_pro->deal_no_of_purchase < $fetch_most_visit_pro->deal_max_limit)   
                  <!-- item 1 -->
                  <div class="product customProduct">
                     <!-- product__info -->
                     <div class="product__info">
                        <!-- img newProduct -->
                        <div class="img newProduct">
                           <!-- img -->
                           <?php
                              $prod_path = url('').'/public/assets/default_image/No_image_deal.png';
                              
                              $img_data = "public/assets/deals/".$mostproduct_img[0]; ?>
                           @if(file_exists($img_data) && $mostproduct_img[0] )	
                           @php	$prod_path = url('').'/public/assets/deals/' .$mostproduct_img[0]; @endphp
                           @else	
                           @if(isset($DynamicNoImage['dealImg']))
                           @php	$dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['dealImg'];@endphp
                           @if($DynamicNoImage['dealImg']!='' && file_exists(trim($dyanamicNoImg_path)))
                           @php $prod_path = url('')."/".$dyanamicNoImg_path; @endphp @endif
                           @endif
                           @endif 
                           @php	$alt_txt 	= substr($fetch_most_visit_pro->$deal_title,0,25);
                           $alt_txt 	.= strlen($fetch_most_visit_pro->$deal_title)>25?'..':''; @endphp
                           @if($mostproduct_discount_percentage!='' && round($mostproduct_discount_percentage)!=0) 
                           <i class="tag">{{($mostproduct_discount_percentage)}}%</i>
                           @endif
                           @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')  
                           <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                           <img class="product__image" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}" alt="{{ $alt_txt }}" />
                           </a>
                           @endif <!-- //if  -->
                           @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
                           <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" >
                           <img class="product__image" alt="{{ $alt_txt }}" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}">
                           </a>
                           <!-- //if --> @endif
                           @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '')  
                           <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" >
                           <img class="product__image" alt="{{ $alt_txt }}" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}">
                           </a>
                           @endif
                           @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '')  
                           <a href="{!! url('dealview').'/'.$mcat.'/'.$res!!}" >
                           <img class="product__image" alt="{{ $alt_txt }}" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}">
                           </a>
                           @endif
                        </div>
                        <!-- img newProduct -->
                        <!-- product__info -->
                        <div class="">
                           <p class="title product__title tab-title"><?php
                              echo substr($fetch_most_visit_pro->$deal_title,0,25);echo strlen($fetch_most_visit_pro->$deal_title)>25?'..':'';  ?></p>
                           <p class="like product__price">{{ Helper::cur_sym() }} <?php echo $fetch_most_visit_pro->deal_discount_price;?></p>
                        </div>
                     </div>
                     <script>
                        $(function(){
                        	//year = <?php echo $deal_end_year;?>; month = <?php echo $deal_end_month;?>; day = <?php echo $deal_end_date;?>;hour= <?php echo $deal_end_hours;?>; min= <?php echo $deal_end_minutes;?>; sec= <?php echo $deal_end_seconds;?>;
                           
                        countProcess({{ $fetch_most_visit_pro->deal_id }});
                        });
                     </script>
                     <!-- product__info -->
                     <?php /*
                        <div id="countdown<?php echo $fetch_most_visit_pro->deal_id; ?>" class="countdownHolder">
                  </div>
                  */?>
                  @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
                  <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                  <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{   trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif </span></button>
                  </a>
                  @endif <!-- //if --> 
                  @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
                  <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}">
                  <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                  </a>
                  @endif <!-- //if -->
                  @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
                  <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}">
                  <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                  </a>
                  @endif <!-- //if -->
                  @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '')  
                  <a href="{!! url('dealview').'/'.$mcat.'/'.$res!!}">
                  <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                  </a>
                  @endif  
            </div>
            <!--product customProduct-->
            @endif <!-- // if -->
            @endforeach  <!-- //foreach -->
            </section>
         </div>
         <!--view-->
         <section class="compare">
            <button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible">@if (Lang::has(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')!= '') {{ trans(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')}}  @else {{ trans($OUR_LANGUAGE.'.CLOSE_COMPARISON_OVERLAY') }} @endif</span></button>
         </section>
         <!-- compare basket end-->
         <!-- ios button: show/hide panel -->
      </div>
      <!-- Sidebar end=============================================== -->	
      @endif <!-- //if deals has -->
      <!-- Sidebar ================================================== -->
      <center>
         <h3 class="home-heading marginHeading">
            @if (Lang::has(Session::get('lang_file').'.TOP_OFFERS')!= '') {{  trans(Session::get('lang_file').'.TOP_OFFERS') }}  @else {{ trans($OUR_LANGUAGE.'.TOP_OFFERS') }} @endif
            <?php /*if (Lang::has(Session::get('lang_file').'.NEW_PRODUCTS')!= '') { echo  trans(Session::get('lang_file').'.NEW_PRODUCTS');}  else { echo trans($OUR_LANGUAGE.'.NEW_PRODUCTS');} */?>
         </h3>
      </center>
      <div id="demo" class="span12 tab-land-wid">
         <!--<div id="comp_myprod" class="ui-group-buttons">
            <button class="compare_product_fixedbtn btn">
            		<a href ="compare_products" target="_blank">
            
            		<?php if (Lang::has(Session::get('lang_file').'.COMPARE')!= '') { echo  trans(Session::get('lang_file').'.COMPARE');}  else { echo trans($OUR_LANGUAGE.'.COMPARE');}
               echo  ' <span>'.$count = count($_SESSION['compare_product']); ?> </span>	</a>
            
            </button>
            
            		<?php if($count > 0){?>
            <div class="or"></div>
            
            		<!-- <a href='clear_compare'>Clear List</a> -->
         <!--	<button class="compare_product_fixedbtn btn"><a href="clear_compare">Clear List</a></button>
            <?php } ?>
            
            </div>-->
         <!-- panel -->
         <!-- Compare basket -->
         <div class="compare-basket">
            <button class="action action--button action--compare"><i class="fa fa-check"></i><span class="action__text">@if(Lang::has(Session::get('lang_file').'.COMPARE')!= '') {{ trans(Session::get('lang_file').'.COMPARE') }}  @else {{ trans($OUR_LANGUAGE.'.COMPARE') }} @endif</span></button>
         </div>
         <div class="view">
            <section class="grid">
               @if(count($product_details) != 0)
               @foreach($product_details as $product_det) 
               @php	$mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
               $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
               $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
               $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name)); 
               $res = base64_encode($product_det->pro_id);
               $product_image = explode('/**/',$product_det->pro_Img);
               $product_saving_price = $product_det->pro_price - $product_det->pro_disprice;
               $product_discount_percentage = round(($product_saving_price/ $product_det->pro_price)*100,2); @endphp
               <!-- //product title -->
               @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') @php
               $title = 'pro_title'; @endphp
               @else @php  $title = 'pro_title_'.Session::get('lang_code') @endphp @endif
               @if($product_det->pro_no_of_purchase < $product_det->pro_qty)   
               <!-- //echo $product_det->pro_id;
                  /* Image Path */ -->
               @php	$prod_path = url('').'/public/assets/default_image/No_image_product.png';
               $img_data = "public/assets/product/".$product_image[0];@endphp
               @if(file_exists($img_data) && $product_image[0] )
               @php $prod_path = url('').'/public/assets/product/' .$product_image[0];	@endphp				
               @else	
               @if(isset($DynamicNoImage['productImg']))
               @php	$dyanamicNoImg_path ='public/assets/noimage/' .$DynamicNoImage['productImg']; @endphp
               @if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))
               @php $prod_path = url('')."/".$dyanamicNoImg_path; @endphp @endif
               @endif
               @endif	
               <!-- /* Image Path ends */	
                  //Alt text -->
               @php	$alt_text  	= substr($product_det->$title,0,25);
               $alt_text  .= strlen($product_det->$title)>25?'..':''; @endphp
               <!-- item 1 -->
               <div class="product customProduct">
                  <!-- product__info -->
                  <div class="product__info">
                     <!-- img newProduct -->
                     <div class="img newProduct">
                        @if($product_discount_percentage!='' && round($product_discount_percentage)!=0)
                        <i class="tag">{{ round($product_discount_percentage) }}%</i>
                        @endif
                        <!-- //if(($product_image[0]!='')){ --> 
                        @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
                        <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                        <img class="product__image" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}" alt="{{ $alt_text }}" title=""/>
                        </a>
                        @endif <!-- /*//if*/ --> 
                        @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
                        <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" >
                        <img class="product__image" alt="{{ $alt_text }}" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}">
                        </a>
                        @endif <!-- //if -->
                        @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
                        <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" >
                        <img class="product__image" alt="{{ $alt_text }}" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}">
                        </a>
                        @endif 
                        @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
                        <a href="{!! url('productview').'/'.$mcat.'/'.$res!!}" >
                        <img class="product__image" alt="{{ $alt_text }}" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}">
                        </a>
                        @endif
                     </div>
                     <!-- img newProduct -->
                     <!-- product__info -->
                     <div class="">
                        <p class="title product__title tab-title">
                           {{ substr($product_det->$title,0,25) }}
                           {{ strlen($product_det->$title)>25?'..':'' }}
                        </p>
                        <p class="like product__price">{{ Helper::cur_sym() }} {{ $product_det->pro_disprice }}</p>
                     </div>
                     @if($product_det->pro_no_of_purchase >= $product_det->pro_qty) 
                     <h4 style="text-align:center;"><a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{  trans(Session::get('lang_file').'.SOLD') }}  @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a> </h4>
                     @else  
                     @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')  
                     <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                     </a>
                     @endif
                     @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
                     <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }}@else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                     </a>
                     @endif
                     @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
                     <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                     </a>
                     @endif
                     @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '')
                     <a href="{!! url('productview').'/'.$mcat.'/'.$res!!}">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                     </a>
                     @endif
                  </div>
                  <!-- product__info -->
                  @endif <!-- //else --> 						
               </div>
               <!--product customProduct-->
               @endif <!-- // if -->
               @endforeach  <!-- //foreach -->
               <!-- // if -->
               @elseif(count($product_details) == 0)
               <div class="box jplist-no-results text-shadow align-center jplist-hidden">
                  <p style="margin-top:20px;color: rgb(54, 160, 222);margin-top: 20px;font-weight: bold;padding-left: 8px;">
                     @if (Lang::has(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')!= '') {{ trans(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE') }}  @else {{ trans($OUR_LANGUAGE.'.NO_PRODUCTS_AVAILABLE') }} @endif
                  </p>
               </div>
               @endif <!-- //else --> 
            </section>
         </div>
         <!--view-->
         <section class="compare">
            <button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible">@if (Lang::has(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')!= '') {{  trans(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY') }} @else {{ trans($OUR_LANGUAGE.'.CLOSE_COMPARISON_OVERLAY') }} @endif</span></button>
         </section>
         <!-- compare basket end-->
         <!-- ios button: show/hide panel -->
      </div>
      <!-- Sidebar end=============================================== -->	
      <!-- Sidebar ================================================== -->
      @if(count($get_product_details_belowfifty) != 0)
      <center>
         <h3 class="home-heading marginHeading">@if (Lang::has(Session::get('lang_file').'.UPTO')!= '') {{ trans(Session::get('lang_file').'.UPTO') }}  @else {{ trans($OUR_LANGUAGE.'.UPTO') }} @endif 
            50% 
            @if (Lang::has(Session::get('lang_file').'.OFFER')!= '') {{ trans(Session::get('lang_file').'.OFFER') }}  @else {{ trans($OUR_LANGUAGE.'.OFFER') }} @endif
         </h3>
      </center>
      <div id="demo" class="span12 tab-land-wid">
         <!--<div id="comp_myprod" class="ui-group-buttons">
            <button class="compare_product_fixedbtn btn">
            		<a href ="compare_products" target="_blank">
            
            		<?php if (Lang::has(Session::get('lang_file').'.COMPARE')!= '') { echo  trans(Session::get('lang_file').'.COMPARE');}  else { echo trans($OUR_LANGUAGE.'.COMPARE');}
               echo  ' <span>'.$count = count($_SESSION['compare_product']); ?> </span>	</a>
            
            </button>
            
            
            
            		<?php if($count > 0){?>
            <div class="or"></div>
            
            		<!-- <a href='clear_compare'>Clear List</a> -->
         <!--	<button class="compare_product_fixedbtn btn"><a href="clear_compare">Clear List</a></button>
            <?php } ?>
            
            </div>-->
         <!-- panel -->
         <!-- Compare basket -->
         <div class="compare-basket">
            <button class="action action--button action--compare"><i class="fa fa-check"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.COMPARE')!= '') {{ trans(Session::get('lang_file').'.COMPARE') }} @else {{ trans($OUR_LANGUAGE.'.COMPARE') }} @endif</span></button>
         </div>
         <div class="view">
            <section class="grid">
               @php	$below_count = 1;	
               $deal = 'other'; @endphp				
               @if(count($get_product_details_belowfifty) != 0) 
               @foreach($get_product_details_belowfifty as $product_det) 
               @php $mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
               $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
               $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
               $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name)); 
               $res = base64_encode($product_det->pro_id);
               $product_image = explode('/**/',$product_det->pro_Img);
               $product_saving_price = $product_det->pro_price - $product_det->pro_disprice;
               $product_discount_percentage = round(($product_saving_price/ $product_det->pro_price)*100,2); @endphp
               @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
               @php $title = 'pro_title'; @endphp
               @else @php $title = 'pro_title_'.Session::get('lang_code'); @endphp @endif
               @if($product_discount_percentage<= 50)
               @if($product_det->pro_no_of_purchase < $product_det->pro_qty)  
               @if($below_count <=4)
               
               @if($product_image != '')
                     @php $product_image = $product_image[0]; @endphp
                     <!-- /*if($product_image[0]==''){
                        $product_image = 'dummy.jpg';	
                        
                        }else{
                        
                        $product_image = $product_image[0];
                        }	*/	
                        
                        /* Image Path */ -->
                     @php	$prod_path 	= url('').'/public/assets/default_image/No_image_product.png';
                     $img_data 	= "public/assets/product/".$product_image; @endphp
                     @if(file_exists($img_data) && $product_image )	
                     @php	$prod_path = url('').'/public/assets/product/' .$product_image;	 @endphp				
                     @else	
                     @if(isset($DynamicNoImage['productImg']))
                     @php	$dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['productImg']; @endphp
                     @if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))
                     @php	$prod_path = url('')."/".$dyanamicNoImg_path; @endphp @endif
                     @endif
                     @endif
               @else

                     @if(isset($DynamicNoImage['productImg']))
                     @php  $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['productImg']; @endphp
                     @if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))
                     @php  $prod_path = url('')."/".$dyanamicNoImg_path; @endphp @endif
                     @endif
                     @endif
               <!-- /* Image Path ends */	
                  //Alt text -->
               @php	$alt_text  	= substr($product_det->$title,0,25);
               $alt_text  .= strlen($product_det->$title)>25?'..':''; @endphp
               <!-- item 1 -->
               <div class="product customProduct">
                  <!-- product__info -->
                  <div class="product__info">
                     <!-- img newProduct -->
                     <div class="img newProduct">
                        @if($product_discount_percentage!='' && round($product_discount_percentage)!=0)
                        <i class="tag">{{ round($product_discount_percentage) }}%</i>
                        @endif
                        <!-- //if(($product_image[0]!='')){  -->
                        @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
                        <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                        <img class="product__image" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}" alt="{{ $alt_text }}" title=""/>
                        </a>
                        @endif
                        @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
                        <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" >
                        <img class="product__image" alt="{{ $alt_text }}" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}">
                        </a>
                        @endif
                        @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
                        <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" >
                        <img class="product__image" alt="{{ $alt_text }}" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}">
                        </a>
                        @endif
                        @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
                        <a href="{!! url('productview').'/'.$mcat.'/'.$res!!}" >
                        <img class="product__image" alt="{{ $alt_text }}" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}" />
                        </a>
                        @endif
                        <?php  //if 
                           /*}else{ ?>
                        <a href="{!! url('productview').'/'.$mcat.'/'.$res!!}" >
                        <img class="product__image" alt="" src="<?php echo url('public/assets/product/').'/No_Image_Available.png';?>">
                        </a>
                        <?php }*/?>
                     </div>
                     <!-- img newProduct -->
                     <!-- product__info -->
                     <div class="">
                        <p class="title product__title tab-title">
                           {{ substr($product_det->$title,0,25) }}
                           {{ strlen($product_det->$title)>25?'..':'' }} 
                        </p>
                        <p class="like product__price">{{ Helper::cur_sym() }} {{ $product_det->pro_disprice }}</p>
                     </div>
                     @if($product_det->pro_no_of_purchase >= $product_det->pro_qty) 
                     <h4 style="text-align:center;"><a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{ trans(Session::get('lang_file').'.SOLD') }}  @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a> </h4>
                     @else  
                     @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')  
                     <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                     </a>
                     @endif
                     @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '')  
                     <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                     </a>
                     @endif
                     @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '')  
                     <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                     </a>
                     @endif
                     @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '')  
                     <a href="{!! url('productview').'/'.$mcat.'/'.$res!!}">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"> @if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                     </a>
                     @endif
                  </div>
                  <!-- product__info -->
                  <?php /*  if (in_array($product_det->pro_id, $_SESSION['compare_product'])) { // to remove from compare?>
                  <button onclick="comparefunc(<?php echo $product_det->pro_id.','.'0'; ?>);" value="0" name="compare" id="compare" data-tooltip="Added in Compare">
                  <i class="fa fa-check"></i>
                  </button>
                  <?php } else{ //  add to compare?>
                  <button onclick="comparefunc(<?php echo $product_det->pro_id.','.'1'; ?>);" value="1" name="compare" id="compare" data-tooltip="Add to Compare">
                  <i class="fa fa-plus"></i>
                  </button>	
                  <?php } */?>
                  <!-- //else --> @endif							
               </div>
               <!--product customProduct-->
               @endif
               @php $below_count++; @endphp
               @endif <!-- // if -->  @endif
               @endforeach  <!-- //foreach -->
               <!-- // if -->
               @elseif(count($get_product_details_belowfifty) == 0)
               <div class="box jplist-no-results text-shadow align-center jplist-hidden">
                  <p style="margin-top:20px;color: rgb(54, 160, 222);margin-top: 20px;font-weight: bold;padding-left: 8px;">
                     @if (Lang::has(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')!= '') {{ trans(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE') }} @else {{ trans($OUR_LANGUAGE.'.NO_PRODUCTS_AVAILABLE') }} @endif
                  </p>
               </div>
               @endif <!-- //else  -->
            </section>
         </div>
         <!--view-->
         <section class="compare">
            <button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible">@if (Lang::has(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')!= '') {{ trans(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY') }}  @else {{ trans($OUR_LANGUAGE.'.CLOSE_COMPARISON_OVERLAY') }} @endif</span></button>
         </section>
         <!-- compare basket end-->
         <!-- ios button: show/hide panel -->
      </div>
      <!-- Sidebar end=============================================== -->	
      <?php  //count of below 50?> @endif
      <!-- Sidebar ================================================== -->
      <?php //print_r($most_popular_product);?>
      @if(count($most_popular_product) != 0)
      <center>
         <h3 class="home-heading marginHeading">
            @if (Lang::has(Session::get('lang_file').'.MOST_POPULAR_PRODUCTS')!= '') {{ trans(Session::get('lang_file').'.MOST_POPULAR_PRODUCTS') }}  @else {{ trans($OUR_LANGUAGE.'.MOST_POPULAR_PRODUCTS') }} @endif
         </h3>
      </center>
      <div id="demo" class="span12 tab-land-wid">
         <!-- panel -->
         <!-- Compare basket -->
         <div class="compare-basket">
            <button class="action action--button action--compare"><i class="fa fa-check"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.COMPARE')!= '') {{ trans(Session::get('lang_file').'.COMPARE') }} @else {{ trans($OUR_LANGUAGE.'.COMPARE') }} @endif</span></button>
         </div>
         <div class="view">
            <section class="grid">
               @php	$i=0;						
               $below_count = 1;
               $deal = 'other';	@endphp	
               @if(count($most_popular_product) != 0)
               @foreach($most_popular_product as $product_det) 
               @if($product_det->pro_no_of_purchase < $product_det->pro_qty)  
               @if($i<4)
               @php $i++;
               $mcat 		= strtolower(str_replace(' ','-',$product_det->mc_name));
               $smcat 		= strtolower(str_replace(' ','-',$product_det->smc_name));
               $sbcat 		= strtolower(str_replace(' ','-',$product_det->sb_name));
               $ssbcat 	= strtolower(str_replace(' ','-',$product_det->ssb_name)); 
               $res 		= base64_encode($product_det->pro_id);
               $product_image 					= explode('/**/',$product_det->pro_Img);
               $product_saving_price 			= $product_det->pro_price - $product_det->pro_disprice;
               $product_discount_percentage 	= round(($product_saving_price/ $product_det->pro_price)*100,2); 
               $product_image = $product_image[0];@endphp
               @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
               @php $title = 'pro_title'; @endphp
               @else  @php $title = 'pro_title_'.Session::get('lang_code'); @endphp @endif
               @php
               $prod_path 	= url('').'/public/assets/default_image/No_image_product.png';
               $img_data 	= "public/assets/product/".$product_image; @endphp
               @if(file_exists($img_data) && $product_image )	
               @php $prod_path = url('').'/public/assets/product/' .$product_image; @endphp					
               @else	
               @if(isset($DynamicNoImage['productImg']))
               @php	$dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['productImg']; @endphp @endif
               @if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))
               @php	$prod_path = url('')."/".$dyanamicNoImg_path; @endphp @endif
               @endif	
               <!-- /* Image Path ends */	
                  //Alt text -->
               <?php	$alt_text  	= substr($product_det->$title,0,25);
                  $alt_text  .= strlen($product_det->$title)>25?'..':''; ?>
               <!-- item 1 -->
               <div class="product customProduct">
                  <!-- product__info -->
                  <div class="product__info">
                     <!-- img newProduct -->
                     <div class="img newProduct">
                        @if($product_discount_percentage!='' && round($product_discount_percentage)!=0) 
                        <i class="tag"> {{ round($product_discount_percentage) }}%</i>
                        @endif 
                        @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')  
                        <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                        <img class="product__image" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}" alt="{{ $alt_text }}" title=""/>
                        </a>
                        @endif
                        <?php  //if ?>
                        @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
                        <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" >
                        <img class="product__image" alt="{{ $alt_text }}" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}">
                        </a>
                        @endif
                        <?php  //if ?>
                        @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
                        <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" >
                        <img class="product__image" alt="{{ $alt_text }}" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}">
                        </a>
                        @endif
                        <?php  //if ?>
                        @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
                        <a href="{!! url('productview').'/'.$mcat.'/'.$res!!}" >
                        <img class="product__image" alt="{{ $alt_text }}" src="{{ $prod_path_loader}}" data-src="{{ $prod_path }}">
                        </a>
                        @endif
                        <?php  //if 
                           /*}else{ ?>
                        <a href="{!! url('productview').'/'.$mcat.'/'.$res!!}" >
                        <img class="product__image" alt="" src="<?php echo url('public/assets/product/').'/No_Image_Available.png';?>">
                        </a>
                        <?php }*/?>
                     </div>
                     <!-- img newProduct -->
                     <!-- product__info -->
                     <div class="">
                        <p class="title product__title tab-title">
                           {{ substr($product_det->$title,0,25) }}
                           {{ strlen($product_det->$title)>25?'..':'' }}  
                        </p>
                        <p class="like product__price">{{ Helper::cur_sym() }} {{ $product_det->pro_disprice }}</p>
                     </div>
                     @if($product_det->pro_no_of_purchase >= $product_det->pro_qty)  
                     <h4 style="text-align:center;"><a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{ trans(Session::get('lang_file').'.SOLD') }}  @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a> </h4>
                     @else  
                     @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
                     <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                     </a>
                     @endif
                     <?php  //if ?>
                     @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
                     <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"> @if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else{{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                     </a>
                     @endif
                     @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '')  
                     <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text"> @if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                     </a>
                     @endif
                     <?php  //if?>
                     @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
                     <a href="{!! url('productview').'/'.$mcat.'/'.$res!!}">
                     <button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                     </a>
                     @endif
                  </div>
                  <!-- product__info -->
                  <?php /*  if (in_array($product_det->pro_id, $_SESSION['compare_product'])) { // to remove from compare?>
                  <button onclick="comparefunc(<?php echo $product_det->pro_id.','.'0'; ?>);" value="0" name="compare" id="compare" data-tooltip="Added in Compare">
                  <i class="fa fa-check"></i>
                  </button>
                  <?php } else{ //  add to compare?>
                  <button onclick="comparefunc(<?php echo $product_det->pro_id.','.'1'; ?>);" value="1" name="compare" id="compare" data-tooltip="Add to Compare">
                  <i class="fa fa-plus"></i>
                  </button>	
                  <?php } */?>
                  @endif <!-- <?php  //else ?> -->							
               </div>
               <!--product customProduct-->
               @endif
               @endif <!-- // if -->
               @endforeach  <!-- //foreach -->
               <!-- // if -->
               @elseif(count($most_popular_product) == 0)
               <div class="box jplist-no-results text-shadow align-center jplist-hidden">
                  <p style="margin-top:20px;color: rgb(54, 160, 222);margin-top: 20px;font-weight: bold;padding-left: 8px;">
                     @if (Lang::has(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')!= '') {{ trans(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE') }}  @else {{ trans($OUR_LANGUAGE.'.NO_PRODUCTS_AVAILABLE') }} @endif
                  </p>
               </div>
               @endif
            </section>
         </div>
         <!--view-->
         <section class="compare">
            <button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible">@if (Lang::has(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY')!= '') {{ trans(Session::get('lang_file').'.CLOSE_COMPARISON_OVERLAY') }} @else {{ trans($OUR_LANGUAGE.'.CLOSE_COMPARISON_OVERLAY') }} @endif</span></button>
         </section>
         <!-- compare basket end-->
         <!-- ios button: show/hide panel -->
      </div>
      <!-- Sidebar end=============================================== -->	
      @endif
      <?php  //count of below 50?>
   </div>
</div>
<div class="container">
   <div class="row footerTopimg">
      <div class="span6">
         <img src="images/ad1.jpg">
      </div>
      <div class="span6">
         <img src="images/ad2.jpg">
      </div>
   </div>
</div>
</div> 
<?php  if($banner_img_found>1) {  //echo $banner_img_found; ?>
<!--Small Slider-->
<script type="text/javascript">
   $(document).ready(function() {
    //Set the carousel options
    $('#quote-carousel').carousel({
      pauseOnHover: true,
      interval: 2000,
    });
   
   $('#quote-carousel1').carousel({
      pauseOnHover: true,
      interval: 2000,
    });
   
    $('#quote-carousel2').carousel({
      pauseOnHover: true,
      interval: 2000,
    });
   
      });
</script>
<?php } ?>
<!--Small Slider-->
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
{!! $footer !!}
<script type="text/javascript">
   $(document).ready(function(){
   	$(document).on("click", ".customCategories .topfirst b", function(){
   		$(this).next("ul").css("position", "relative");
   		
   		$(".topfirst ul").not($(this).parents(".topfirst").find("ul")).css("display", "none");
   		 $(this).next("ul").toggle();
   	var thisContent = $(this).html();
   		 if(thisContent == "+"){
   		 	 $(this).html("-");
   		 }
   		 else{
   		 	$(this).html("+");	
   		 }
   	});
   
   	$(document).on("click", ".morePage", function(){
   		$(".nextPage").slideToggle(200);
   	});
   	
   	$(document).on("click", "#smallScreen", function(){
   		$(this).toggleClass("customMenu");
   	});
   
   	$(window).scroll(function () {
   		if ($(this).scrollTop() > 250) {
   			$('#comp_myprod').show();
   		}
   		else{
   			$('#comp_myprod').hide();
   		}
   	});
   
   
   });
   
</script>
<script>
   function comparefunc(pid,value){
   	//var value = ('#compare').val();
   	//alert(pid);
   	
   	var pid = pid;
   		  $.ajax( {
   			      type: 'get',
   				  data: 'pid='+pid + '&value=' +value,
   				  url: "<?php echo url('product_compare_ajax'); ?>",
   				  success: function(responseText){  
   				   if(responseText)
   				   {  
   					  // alert(responseText);
   					  location.reload();
   					//$('#compare').html(responseText);					   
   				   }
   				}		
   			});
    
   }
</script>
<link rel="stylesheet" href="{{ url('') }}/themes/css/jquery.countdown.css" />
<script src=" {{ url('') }}/themes/js/jquery.countdown.js"></script>
<!-- Count Down Coding -->
<script type="text/javascript">
   <?php 	if(count($dealsof_day_details) != 0){?>
   function countProcess(deal_id){
      <?php 
      foreach($dealsof_day_details as $product_det){?>
   var pro_deal_id = <?php echo $product_det->deal_id;?>;
   
   if(deal_id==pro_deal_id){
   
   <?php 
      $date2 = $product_det->deal_end_date;
      $deal_end_year = date('Y',strtotime($date2));
      $deal_end_month = date('m',strtotime($date2));
      $deal_end_date = date('d',strtotime($date2));
      $deal_end_hours = date('H',strtotime($date2));  
      $deal_end_minutes = date('i',strtotime($date2));    
      $deal_end_seconds = date('s',strtotime($date2)); 
      ?>
   year = <?php echo $deal_end_year;?>; month = <?php echo $deal_end_month;?>; day = <?php echo $deal_end_date;?>;hour= <?php echo $deal_end_hours;?>; min= <?php echo $deal_end_minutes;?>; sec= <?php echo $deal_end_seconds;?>;
   }
   <?php 
      }//foreach
      ?>
   
   var timezone = new Date()
   month        = --month;
   dateFuture   = new Date(year,month,day,hour,min,sec);
   //alert(deal_id);
          dateNow = new Date();                                                            
          amount  = dateFuture.getTime() - dateNow.getTime()+5;               
          delete dateNow;
   
          /* time is already past */
          //if(amount < 0){
                  //output ="<span class='countDays'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='countDiv countDiv0'></span><span class='countHours'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span></span><span class='countDiv countDiv1'></span><span class='countMinutes'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span></span><span class='countDiv countDiv2'></span><span class='countSeconds'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span></span>" ;
                  
   
          /* date is still good */
          //else{
                  days=0; hours=0; mins=0; secs=0; output="";
   
                  amount = Math.floor(amount/1000); /* kill the milliseconds */
   
                  days   = Math.floor(amount/86400); /* days */
                  amount = amount%86400;
   
                  hours  = Math.floor(amount/3600); /* hours */
                  amount = amount%3600;
   
                  mins   = Math.floor(amount/60); /* minutes */
                  amount = amount%60;
   
                  secs   = Math.floor(amount); /* seconds */
   
   			fdays = parseInt(days/10);	
   			sdays = days%10;
   			fhours = parseInt(hours/10);	
   			shours = hours%10;
   			fmins = parseInt(mins/10);	
   			smins = mins%10;
   			fsecs = parseInt(secs/10);	
   			ssecs = secs%10;
                 output="<span class='countHours'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fhours+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+shours+"</span></span></span><span class='countDiv countDiv1'></span><span class='countMinutes'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fmins+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+smins+"</span></span></span><span class='countDiv countDiv2'></span><span class='countSeconds'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fsecs+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+ssecs+"</span></span></span>" ;
                       
                  $('#countdown'+deal_id).html(output);
                  
             //alert(sdays); 
   
                  setTimeout(function() { countProcess(deal_id); }, 1000);
          //}
          
   }
   <?php } ?>
</script>
<!-- Image loads after page loads -->
<script>
   $(function(){
     $.each(document.images, function(){
   $(this).attr("src", $(this).data("src"));
     	   });
   });
     
</script>
</body>
</html>
@if($image_exist_count<0) {
<script>
   document.getElementById("no_image_hide").style.display = "none";
   
</script>
@endif