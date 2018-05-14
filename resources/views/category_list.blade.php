{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody">
   <div class="container">
      <div class="row">
         <!-- Sidebar ================================================== -->
         <div id="sidebar" class="span3">
            <div class="side-menu-head"><strong>@if (Lang::has(Session::get('lang_file').'.CATEGORIES')!= '') {{  trans(Session::get('lang_file').'.CATEGORIES') }} @else {{ trans($OUR_LANGUAGE.'.CATEGORIES') }} @endif</strong></div>
            <ul id="css3menu1" class="topmenu">
               <input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>
               @foreach($main_category as $fetch_main_cat)  
               @php	$check_main_product_exists = DB::table('nm_product')->where('pro_mc_id', '=', $fetch_main_cat->mc_id)->where('pro_status','=',1)->whereRaw('pro_no_of_purchase < pro_qty')->get(); @endphp
               @if($check_main_product_exists)
               @php	$pass_cat_id1 = "1,".$fetch_main_cat->mc_id;  @endphp
               @if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0) 
               <li class="topfirst">
                  <a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1); ?>">
                  @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                  @php $mc_name = 'mc_name'; @endphp
                  @else @php  $mc_name = 'mc_name_'.Session::get('lang_code'); @endphp @endif
                  {{ $fetch_main_cat->$mc_name }} </a> <b class="OpenCat" onclick=""> + </b>
                  <ul>
                     @foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)   
                     @php	$check_sub_product_exists = DB::table('nm_product')->where('pro_smc_id', '=', $fetch_sub_main_cat->smc_id)->where('pro_status','=',1)->whereRaw('pro_no_of_purchase < pro_qty')->get(); @endphp
                     @if($check_sub_product_exists)
                     @php	$pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; @endphp
                     <li class="subfirst">
                        <a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"> 
                        @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                        @php	$smc_name = 'smc_name'; @endphp
                        @else @php  $smc_name = 'smc_name_'.Session::get('lang_code'); @endphp @endif
                        {{ $fetch_sub_main_cat->$smc_name }} </a> <b class="OpenCat" onclick=""> + </b>
                        @if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0)  
                        <ul>
                           @foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat)  
                           @php	$check_sec_main_product_exists = DB::table('nm_product')->where('pro_sb_id', '=', $fetch_sub_cat->sb_id)->where('pro_status','=',1)->whereRaw('pro_no_of_purchase < pro_qty')->get(); @endphp
                           @if($check_sec_main_product_exists)
                           @php	$pass_cat_id3 = "3,".$fetch_sub_cat->sb_id; @endphp
                           @if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0) 
                           <li class="subsecond">
                              <a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>"> 
                              @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                              @php $sb_name = 'sb_name'; @endphp
                              @else @php  $sb_name = 'sb_name_'.Session::get('lang_code'); @endphp @endif
                              {{ $fetch_sub_cat->$sb_name }}</a> <b class="OpenCat" onclick=""> + </b>
                              <ul>
                                 @foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat)  
                                 @php	$check_sec_sub_main_product_exists = DB::table('nm_product')->where('pro_ssb_id', '=', $fetch_secsub_cat->ssb_id)->where('pro_status','=',1)->whereRaw('pro_no_of_purchase < pro_qty')->get(); @endphp
                                 @if($check_sec_sub_main_product_exists)
                                 @php	$pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; @endphp                         
                                 <li class="subthird"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>"> 
                                    @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                                    @php	$ssb_name = 'ssb_name'; @endphp
                                    @else @php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); @endphp @endif
                                    {{ $fetch_secsub_cat->$ssb_name }}</a>
                                 </li>
                                 @endif @endforeach
                              </ul>
                           </li>
                           <?php  ?> @endif
                           @endif @endforeach
                        </ul>
                     </li>
                     @endif
                     @endif @endforeach
                  </ul>
               </li>
               @endif
               @endif @endforeach
            </ul>
            <br/>
            <div class="clearfix"></div>
            <br/>
            @if(count($most_visited_product)>0) 
            <div class="side-menu-head"><strong>@if (Lang::has(Session::get('lang_file').'.MOST_VISITED_PRODUCT')!= '') {{  trans(Session::get('lang_file').'.MOST_VISITED_PRODUCT') }} @else {{ trans($OUR_LANGUAGE.'.MOST_VISITED_PRODUCT') }} @endif</strong></div>
            @foreach($most_visited_product as $fetch_most_visit_pro) 
            @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
            @php $pro_title = 'pro_title'; @endphp
            @else @php  $pro_title = 'pro_title_'.Session::get('lang_code'); @endphp @endif
            @php	$mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
            $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
            $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
            $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name));
            $res = base64_encode($fetch_most_visit_pro->pro_id);
            $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;
            $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);
            $mostproduct_img = explode('/**/', $fetch_most_visit_pro->pro_Img);
            $product_image    = $mostproduct_img[0];
            $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
            $img_data   = "public/assets/product/".$product_image; @endphp
            @if(file_exists($img_data) && $product_image !='')   
            @php  $prod_path = url('').'/public/assets/product/' .$product_image;  @endphp                 
            @else  
            @if(isset($DynamicNoImage['productImg']))
            @php   $dyanamicNoImg_path = url('').'/public/assets/noimage/' .$DynamicNoImage['productImg']; @endphp
            @if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))
            @php   $prod_path = $dyanamicNoImg_path; @endphp @endif
            @endif
            @endif   
            <div class="thumbnail">
               @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
               <a  href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res) }}"><img  src="{{ $prod_path }}" alt="{{substr($fetch_most_visit_pro->$pro_title,0,25) }}{{  strlen($fetch_most_visit_pro->$pro_title)>25?'..':'' }}  " style="height:200px; width: 100%;"/></a>
               @endif
               @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
               <a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res) }}"><img  src="{{ $prod_path }}" alt="{{substr($fetch_most_visit_pro->$pro_title,0,25) }}{{  strlen($fetch_most_visit_pro->$pro_title)>25?'..':'' }}  " style="height:200px; width: 100%;"/></a>
               @endif
               @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
               <a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$res) }}"><img  src="{{ $prod_path }}" alt="{{substr($fetch_most_visit_pro->$pro_title,0,25) }} {{  strlen($fetch_most_visit_pro->$pro_title)>25?'..':'' }}  " style="height:200px; width: 100%;"/></a>
               @endif
               <div class="caption product_show">
                  <h4 class="top_text dolor_text">{{ Helper::cur_sym() }} {{ $fetch_most_visit_pro->pro_disprice }}</h4>
                  <h5 class="prev_text"><?php 
                     //  echo substr($fetch_most_visit_pro->$pro_title,0,50);  ?>
                     {{substr($fetch_most_visit_pro->$pro_title,0,25) }}
                     {{  strlen($fetch_most_visit_pro->$pro_title)>25?'..':'' }}  
                  </h5>
                  <div >
                     <div >
                        @if($fetch_most_visit_pro->pro_no_of_purchase < $fetch_most_visit_pro->pro_qty)
                        @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
                        <a  href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
                        @endif
                        @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '')  
                        <a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
                        @endif
                        @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
                        <a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
                        @endif @endif
                        @if($fetch_most_visit_pro->pro_no_of_purchase >= $fetch_most_visit_pro->pro_qty) 
                        <h4 style="text-align:center;">
                           <a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{  trans(Session::get('lang_file').'.SOLD') }} @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a> 
                           @endif
                     </div>
                  </div>
               </div>
            </div>
            <br/>
            @endforeach @endif
         </div>
         <!-- Sidebar end=============================================== -->
         <div class="span9" style="">
         <?php //if($product_details) { ?>		
         <div class="">
         <div class="compare-basket">
         <button class="action action--button action--compare"><i class="fa fa-check"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.COMPARE')!= '') {{  trans(Session::get('lang_file').'.COMPARE') }} @else {{ trans($OUR_LANGUAGE.'.COMPARE') }} @endif</span></button>
         </div>
         <div class="search-product">
         <!-- Blueprint header -->
         <!-- Product grid -->
         <div class="">
         @if(count($product_details) != 0)  <div style="width: 100%;"><center><span class="sale-title">Search For Products</span></center> </div>
         <ul class="thumbnails">
         @foreach($product_details as $product_det)
         @php	$product_image = explode('/**/',$product_det->pro_Img);
         $product_saving_price = $product_det->pro_price - $product_det->pro_disprice;
         $product_discount_percentage = round(($product_saving_price/ $product_det->pro_price)*100,2); @endphp
         @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
         @php $pro_title = 'pro_title'; @endphp
         @else @php  $pro_title = 'pro_title_'.Session::get('lang_code'); @endphp @endif
         @php	$mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
         $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
         $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
         $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name));
         $res = base64_encode($product_det->pro_id);
         $prod_image    = $product_image[0];
         $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
         $img_data   = "public/assets/product/".$prod_image; @endphp
         @if(file_exists($img_data) && $prod_image !='')   
         @php  $prod_path = url('').'/public/assets/product/' .$prod_image;  @endphp                
         @else  
         @if(isset($DynamicNoImage['productImg']))
         @php  $dyanamicNoImg_path = url('').'/public/assets/noimage/' .$DynamicNoImage['productImg']; @endphp
         @if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))
         @php  $prod_path = $dyanamicNoImg_path; @endphp @endif
         @endif
         @endif   
         <!-- Products -->
         <li class="">
         <div class="thumbnail">
         @if($product_det->pro_discount_percentage!='' && round($product_det->pro_discount_percentage)!=0)
         <i class="tag">{{ substr($product_det->pro_discount_percentage,0,2) }}%</i>@endif
         @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
         <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}" ><img class="product__image" alt="{{substr($product_det->$pro_title,0,25) }} {{  strlen($product_det->$pro_title)>25?'..':'' }}  " src="{{ $prod_path }}"></a>
         @endif
         @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
         <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" ><img class="product__image" alt="{{substr($product_det->$pro_title,0,25) }}{{  strlen($product_det->$pro_title)>25?'..':'' }}  " src="{{ $prod_path }}"></a>
         @endif
         @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
         <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" ><img class="product__image" alt="{{substr($product_det->$pro_title,0,25) }}	{{  strlen($product_det->$pro_title)>25?'..':'' }}  " src="{{ $prod_path }}"></a>
         @endif
         <div class="caption">
         <p class="prev_text"><?php 
            //echo substr($product_det->$pro_title,0,25); ?>
         {{substr($product_det->$pro_title,0,25) }}
         {{  strlen($product_det->$pro_title)>25?'..':'' }}  
         </p>
         <p class="product__price highlight">{{ Helper::cur_sym() }} {{ $product_det->pro_disprice }}</p>
         <div class="block right">
         @php $mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
         $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
         $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
         $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name));
         $res = base64_encode($product_det->pro_id); @endphp
         </h4>
         </div>
         @if($product_det->pro_no_of_purchase < $product_det->pro_qty) 
         @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')  
         <center><a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a></center>
         @endif
         @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
         <center><a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a></center>
         @endif
         @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
         <center><a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a></center>
         @endif
         @endif
         @if($product_det->pro_no_of_purchase >= $product_det->pro_qty) 
         <h4 style="text-align:center;"><a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{ trans(Session::get('lang_file').'.SOLD') }} @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a> 
         @endif
         </div>
         </div>	
         </li>
         @endforeach
         @elseif(count($product_details) == 0)
         <center>
         <span class="sale-title">@if (Lang::has(Session::get('lang_file').'.SEARCH_FOR_PRODUCTS')!= '') {{  trans(Session::get('lang_file').'.SEARCH_FOR_PRODUCTS') }} @else {{ trans($OUR_LANGUAGE.'.SEARCH_FOR_PRODUCTS') }} @endif</span>
         </center>
         <?php echo "<center><h4>No Products available with given search criteria</h4></center> "; ?>
         @endif
         </ul> 			
         </div>
         </div>
         </div>
         <?php //} ?>
         @if(count($deals_details) > 0)   
         <div style="width: 100%;"><center><span class="sale-title">Search For Deals</span></center> 
         </div>
         <div class="search-product">
         <ul class="thumbnails">
         @foreach($deals_details as $fetch_deals)  
         @php  $deal_img = explode('/**/', $fetch_deals->deal_image);
         $mcat = strtolower(str_replace(' ','-',$fetch_deals->mc_name));
         $smcat = strtolower(str_replace(' ','-',$fetch_deals->smc_name));
         $sbcat = strtolower(str_replace(' ','-',$fetch_deals->sb_name));
         $ssbcat = strtolower(str_replace(' ','-',$fetch_deals->ssb_name)); 
         $res = base64_encode($fetch_deals->deal_id);
         $product_image     = $deal_img[0];
         $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
         $img_data   = "public/assets/deals/".$product_image; @endphp
         @if(file_exists($img_data) && $product_image !='')   
         @php  $prod_path = url('').'/public/assets/deals/' .$product_image;                  @endphp
         @else  
         @if(isset($DynamicNoImage['dealImg']))
         @php   $dyanamicNoImg_path = url('').'/public/assets/noimage/' .$DynamicNoImage['dealImg']; @endphp
         @if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path))
         @php    $prod_path = $dyanamicNoImg_path; @endphp @endif
         @endif
         @endif   
         <li class="">
         <div class="thumbnail">
         @if($fetch_deals->deal_discount_percentage!='' && round($fetch_deals->deal_discount_percentage)!=0) 
         <i class="tag">{{ substr($fetch_deals->deal_discount_percentage,0,2) }}%</i>@endif
         @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')  
         <a  href="{{ url('dealview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res) }}"><img src="{{ $prod_path }}" alt="" class="product__image" style="width:auto;"/></a>
         @endif
         @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
         <a  href="{{ url('dealview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res) }}"><img src="{{ $prod_path }}" alt="" class="product__image" style="width:auto;"/></a>
         @endif
         @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
         <a  href="{{ url('dealview/'.$mcat.'/'.$smcat.'/'.$res) }}"><img src="{{ $prod_path }}" alt="" class="product__image" style="width:auto;"/></a>
         @endif
         <div class="caption">
         <p class="prev_text">
         @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
         @php	$deal_title = 'deal_title'; @endphp
         @else @php  $deal_title = 'deal_title_'.Session::get('lang_code'); @endphp @endif
         {{ substr($fetch_deals->$deal_title,0,50) }}...</p>
         <p class="top_text dolor_text">{{ Helper::cur_sym() }} {{ $fetch_deals->deal_discount_price }}</p>
         @if($fetch_deals->deal_no_of_purchase < $fetch_deals->deal_max_limit)  
         @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
         <center><a  href="{{ url('dealview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a></center>
         @endif
         @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
         <center><a href="{{ url('dealview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a></center>
         @endif
         @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
         <center><a  href="{{ url('dealview/'.$mcat.'/'.$smcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a></center>
         @endif
         @endif
         @if($fetch_deals->deal_no_of_purchase >= $fetch_deals->deal_max_limit) 
         <h4 style="text-align:center;"><a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{  trans(Session::get('lang_file').'.SOLD') }} @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a> 
         @endif
         </div>
         </div>
         </li>
         @endforeach 
         @elseif(count($deals_details) == 0)
         <span class="sale-title">@if (Lang::has(Session::get('lang_file').'.SEARCH_FOR_DEALS')!= '') {{  trans(Session::get('lang_file').'.SEARCH_FOR_DEALS') }} @else {{ trans($OUR_LANGUAGE.'.SEARCH_FOR_DEALS') }} @endif</span>
         </center>
         <?php echo "<center><h4>No Deals available with given search criteria</h4></center> "; ?>
         @endif
         </ul>	
         </div>
         </div>
      </div>
   </div>
</div>
<!-- Footer ================================================================== -->
{!! $footer !!}
</body>
</html>