{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<?php 
   //$_SESSION['compare_product']=array();
   ?>
<div  id="product_page">
   <div id="mainBody">
      <div class="container">
         @if(Session::has('wish'))
         <p class="alert {!! Session::get('alert-class', 'alert-success') !!}">{!! Session::get('wish') !!}</p>
         @endif
         <div class="compr_prdpg" id="prdblpg">
            <div class="col-lg-12" style="text-align: center; color: #d82672;">
               <h2>@if (Lang::has(Session::get('lang_file').'.COMPARE_PRODUCTS')!= '') {{  trans(Session::get('lang_file').'.COMPARE_PRODUCTS') }} @else {{ trans($OUR_LANGUAGE.'.COMPARE_PRODUCTS') }} @endif</h2>
            </div>
            <hr>
            <div id="demo" class="box jplist jplist-grid-view col-lg-12 tab-land-wid">
               @if(count($product_details)!=0)
               @foreach($product_details as $pro_det) 
               <div class="col-lg-4 compare_compprd">
                  @if (in_array($pro_det->pro_id, $_SESSION['compare_product']))  
                  <button class="close_compare" onclick="comparefunc(<?php echo $pro_det->pro_id.','.'0'; ?>);" value="0" name="compare" id="compare">
                  X
                  </button>
                  @endif
                  <div class="product_head">
                     @php      $product_image = explode('/**/',$pro_det->pro_Img); @endphp
                     @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                     @php	$pro_title = 'pro_title'; @endphp
                     @else @php  $pro_title = 'pro_title_'.Session::get('lang_code'); @endphp @endif
                     {{ $pro_det->$pro_title }} 
                  </div>
                  @php	 $product_image 	= $product_image[0];
                  $prod_path 	= url('').'/public/assets/default_image/No_image_product.png';
                  $img_data 	= "public/assets/product/".$product_image; @endphp
                  @if(file_exists($img_data) && $product_image!='' )	
                  @php	$prod_path = url('public/assets/product/').'/'.$product_image;	@endphp				
                  @else	
                  @if(isset($DynamicNoImage['productImg'])) 
                  @php	$dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['productImg']; @endphp
                  @if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)) 
                  @php	$prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
                  @endif
                  @endif
                  <img class="product__image" src="{{ $prod_path }}" alt="" title=""/></a>
                  <p class="like product__price">@if (Lang::has(Session::get('lang_file').'.ORIGIANL_PRICE')!= '') {{  trans(Session::get('lang_file').'.ORIGIANL_PRICE') }} @else {{ trans($OUR_LANGUAGE.'.ORIGIANL_PRICE') }} @endif :  {{ $pro_det->pro_price }}<br>
                     @if (Lang::has(Session::get('lang_file').'.DISCOUNT')!= '') {{ trans(Session::get('lang_file').'.DISCOUNT') }} @else {{ trans($OUR_LANGUAGE.'.DISCOUNT') }} @endif :  {{ $pro_det->pro_disprice }}
                  </p>
                  <div class="prod_categories">
                     <span class="rating_head">@if (Lang::has(Session::get('lang_file').'.RATING')!= '') {{  trans(Session::get('lang_file').'.RATING') }} @else {{ trans($OUR_LANGUAGE.'.RATING') }} @endif :
                     @php    $product_count = $one_count + $two_count + $three_count + $four_count + $five_count;
                     $multiple_countone = $one_count *1;
                     $multiple_counttwo = $two_count *2;
                     $multiple_countthree = $three_count *3;
                     $multiple_countfour = $four_count *4;
                     $multiple_countfive = $five_count *5;
                     $product_total_count = $multiple_countone + $multiple_counttwo + $multiple_countthree + $multiple_countfour + $multiple_countfive; @endphp
                     @if($product_count)
                     @php	$product_divide_count = $product_total_count / $product_count; @endphp
                     @if($product_divide_count <= '1')
                     <img src='{{ url('images/stars-1.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{ trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                     @elseif($product_divide_count >= '1')
                     <img src='{{ url('./images/stars-1.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                     @elseif($product_divide_count >= '2')
                     <img src='{{ url('./images/stars-2.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                     @elseif($product_divide_count >= '3')
                     <img src='{{ url('./images/stars-3.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                     @elseif($product_divide_count >= '4')
                     <img src='{{ url('./images/stars-4.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                     @elseif($product_divide_count >= '5')
                     <img src='{{ url('./images/stars-5.png') }}' style='margin-bottom:10px;'>@if (Lang::has(Session::get('lang_file').'.RATINGS')!= '') {{  trans(Session::get('lang_file').'.RATINGS') }} @else {{ trans($OUR_LANGUAGE.'.RATINGS') }} @endif
                     @else
                     @if (Lang::has(Session::get('lang_file').'.NO_RATING_FOR_THIS_PRODUCT')!= '') {{  trans(Session::get('lang_file').'.NO_RATING_FOR_THIS_PRODUCT') }} @else {{ trans($OUR_LANGUAGE.'.NO_RATING_FOR_THIS_PRODUCT') }} @endif
                     @endif
                     @elseif($product_count)
                     @php	$product_divide_count = $product_total_count / $product_count; @endphp
                     @else  
                     @if (Lang::has(Session::get('lang_file').'.NO_RATING_FOR_THIS_PRODUCT')!= '') {{  trans(Session::get('lang_file').'.NO_RATING_FOR_THIS_PRODUCT') }} @else {{ trans($OUR_LANGUAGE.'.NO_RATING_FOR_THIS_PRODUCT') }} @endif
                     @endif
                     </span>
                     <div> <span class="rating_head">@if (Lang::has(Session::get('lang_file').'.DELIVERY_WITH_IN')!= '') {{  trans(Session::get('lang_file').'.DELIVERY_WITH_IN') }} @else {{ trans($OUR_LANGUAGE.'.DELIVERY_WITH_IN') }} @endif :</span>{{ $pro_det->pro_delivery.'days' }}</div>
                     <span class="rating_head">@if (Lang::has(Session::get('lang_file').'.COLOR')!= '') {{  trans(Session::get('lang_file').'.COLOR') }} @else {{ trans($OUR_LANGUAGE.'.COLOR') }} @endif : </span>
                     @if(count($product_color_details) > 0) 
                     @foreach($product_color_details as $product_color_det) 
                     {{ $product_color_det->co_name.',' }}
                     @endforeach @endif
                     <br>
                     <span class="rating_head">@if (Lang::has(Session::get('lang_file').'.SIZES')!= '') {{  trans(Session::get('lang_file').'.SIZES') }} @else {{ trans($OUR_LANGUAGE.'.SIZES') }} @endif : </span>
                     
                     @foreach($product_size_details as $product_size_det) 
                     {{ $product_size_det->si_name.',' }}
                     @endforeach
                     <br>
                     <span class="rating_head">@if (Lang::has(Session::get('lang_file').'.DESC')!= '') {{  trans(Session::get('lang_file').'.DESC') }} @else {{ trans($OUR_LANGUAGE.'.DESC') }} @endif : </span>
                     <span class="key_featur">
                        <p> 
                           @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                           @php	$pro_desc = 'pro_desc'; @endphp
                           @else @php  $pro_desc = 'pro_desc_'.Session::get('lang_code'); @endphp @endif
   						   {!! html_entity_decode($pro_det->$pro_desc) !!}
                        </p>
                     </span>
                     </td>	
                     <h4> @if (Lang::has(Session::get('lang_file').'.SPEC')!= '') {{  trans(Session::get('lang_file').'.SPEC') }} @else {{ trans($OUR_LANGUAGE.'.SPEC') }} @endif : </h4>
                     @foreach($product_spec_details as $product)  
                     @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                     @php	$sp_name = 'sp_name';
                     $spc_value = 'spc_value'; @endphp
                     @else   
                     @php	$sp_name = 'sp_name_'.Session::get('lang_code'); 
                     $spc_value = 'spc_value_'.Session::get('lang_code');  @endphp
                     @endif
                     {{ $product->$sp_name.' : '.$product->$spc_value }} <br>
                     @endforeach 
                    
                  </div>
               </div>
               @endforeach
               @else
               @if (Lang::has(Session::get('lang_file').'.NO_PRODUCTS_INCOMPARE')!= '') {{  trans(Session::get('lang_file').'.NO_PRODUCTS_INCOMPARE') }} @else {{ trans($OUR_LANGUAGE.'.NO_PRODUCTS_INCOMPARE') }} @endif 
               @endif
            </div>
         </div>
         <div id="comp_myprod"  class="ui-group-buttons">
            <span class="compare_product_fixedbtn btn">
            <a href ="compare_products" target="_blank">@if (Lang::has(Session::get('lang_file').'.COMPARE')!= '') {{  trans(Session::get('lang_file').'.COMPARE') }} @else {{ trans($OUR_LANGUAGE.'.COMPARE') }} @endif <span>{{ $count = count($_SESSION['compare_product']) }}</span></a></span>
            @if($count >0)
            <div class="or"></div>
            <button class="compare_product_fixedbtn btn"><a href='clear_compare'>@if (Lang::has(Session::get('lang_file').'.CLEAR_LIST')!= '') {{  trans(Session::get('lang_file').'.CLEAR_LIST') }} @else {{ trans($OUR_LANGUAGE.'.CLEAR_LIST') }} @endif</a></button>
            @endif
         </div>
      </div>
   </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
{!! $footer !!}
</body>
<script>
   function comparefunc(pid,value){
   	//var value = ('#compare').val();
   	//alert(value);
   	
   	var pid = pid;
   		   $.ajax( {
   			      type: 'get',
   				  data: 'pid='+pid + '&value=' +value,
   				  url: 'remove_compare_product',
   				  success: function(responseText){  
   				   if(responseText)
   				   {  
   					  alert(responseText);
   					  location.reload();
   					//$('#compare').html(responseText);					   
   				   }
   				}		
   			});	
    
   }
</script>