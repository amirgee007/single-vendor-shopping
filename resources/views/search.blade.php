
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
  @if (Session::has('error'))
		<div  >{!! Session::get('error') !!}
        </div>
@endif
    @if (Session::has('result_success'))
		<div  >{!! Session::get('result_success') !!}
        </div>
		@endif


          @if (Session::has('result_cancel'))


		<div>{!! Session::get('result_cancel') !!}



        </div>


		@endif


<!-- Header End====================================================================== -->
<style type="text/css">
  .customCategories.products
  {
    margin-right: 0px !important;
  }
</style>

<div id="mainBody">



	<div class="container">

	<div class="row">

<!-- Sidebar ================================================== -->
  <div class="span3" id="sidebar">
    <div class="side-menu-head"><strong>@if (Lang::has(Session::get('lang_file').'.CATEGORIES')!= '') {{  trans(Session::get('lang_file').'.CATEGORIES') }} @else {{ trans($OUR_LANGUAGE.'.CATEGORIES') }} @endif </strong></div>
      <ul id="css3menu1" class="topmenu">
      <input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>
       
      @if(count($main_category)>0)
      @foreach($main_category as $fetch_main_cat)  
	@php	$check_main_product_exists = DB::table('nm_product')->where('pro_mc_id', '=', $fetch_main_cat->mc_id)->where('pro_status','=',1)->whereRaw('pro_no_of_purchase < pro_qty')->get(); @endphp
		@if($check_main_product_exists)
	@php  $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; @endphp
	  
     
	  @if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0)  
	  
      <li class="topfirst"><a href="{{ url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1) }}">
	  @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
	@php	$mc_name = 'mc_name'; @endphp
	  @else @php  $mc_name = 'mc_name_'.Session::get('lang_code'); @endphp @endif
					
	 {{ $fetch_main_cat->$mc_name }} </a> <b class="OpenCat" onclick=""> + </b>

  <ul> 
      
	  @foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)  
	   
	  @php  $check_sub_product_exists = DB::table('nm_product')->where('pro_smc_id', '=', $fetch_sub_main_cat->smc_id)->where('pro_status','=',1)->whereRaw('pro_no_of_purchase < pro_qty')->get(); @endphp
	   @if($check_sub_product_exists)
	@php  $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; @endphp
	  
       <li class="subfirst"><a href="{{ url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2) }}"> 
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
				  
          
          <li class="subsecond"><a href="{{ url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3) }}"> 
		  @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
			@php $sb_name = 'sb_name'; @endphp
		  @else @php  $sb_name = 'sb_name_'.Session::get('lang_code'); @endphp @endif
		  {{ $fetch_sub_cat->$sb_name }} </a> <b class="OpenCat" onclick=""> + </b>
                 
				  @if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0)  
				  
                    <ul>
                   
					@foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat) 
					 
					@php	$check_sec_sub_main_product_exists = DB::table('nm_product')->where('pro_ssb_id', '=', $fetch_secsub_cat->ssb_id)->where('pro_status','=',1)->whereRaw('pro_no_of_purchase < pro_qty')->get(); @endphp
						@if($check_sec_sub_main_product_exists)
				@php	$pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; @endphp
					                        
                        <li class="subthird"><a href="{{ url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4) }}"> 
		  @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
		@php	$ssb_name = 'ssb_name'; @endphp
		  @else @php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); @endphp @endif
						{{ $fetch_secsub_cat->$ssb_name }}</a></li>                                        
					 @endif @endforeach
                     </ul>
                    </li>
                      @endif
		 @endif  @endforeach
    </ul>
                
        </li>
        @endif
		 @endif @endforeach
  </ul>
    
    </li>

@endif
       @endif @endforeach @endif 
</ul> 
    <br>
      <div class="clearfix"></div>
    <br/>
         

        @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') 
      @php  $pro_title = 'pro_title'; @endphp
        @else @php  $pro_title = 'pro_title_'.Session::get('lang_code'); @endphp @endif

        @if(count($most_visited_product)>0) 
        <div class="side-menu-head" style="margin-top:10px;"><strong>@if (Lang::has(Session::get('lang_file').'.MOST_VISITED_PRODUCTS')!= '') {{  trans(Session::get('lang_file').'.MOST_VISITED_PRODUCTS') }} @else {{ trans($OUR_LANGUAGE.'.MOST_VISITED_PRODUCTS') }} @endif</strong></div>
          @foreach($most_visited_product as $fetch_most_visit_pro) 
             @php   $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;
                $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);
                $mostproduct_img = explode('/**/', $fetch_most_visit_pro->pro_Img);

                $product_img    = $mostproduct_img[0]; 
                
                $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
                $img_data   = "public/assets/product/".$product_img; @endphp
                
                @if(file_exists($img_data) && $product_img !='')   
                
             @php   $prod_path = url('').'/public/assets/product/' .$product_img;                  @endphp
                @else  
                    @if(isset($DynamicNoImage['productImg']))
                      @php  $dyanamicNoImg_path = url('').'/public/assets/noimage/' .$DynamicNoImage['productImg']; @endphp
                       @if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))
                        @php    $prod_path = $dyanamicNoImg_path; @endphp @endif
                    @endif
                @endif   
                
              @php  $alt_text   = substr($fetch_most_visit_pro->$pro_title,0,25); @endphp


        @if($fetch_most_visit_pro->pro_no_of_purchase < $fetch_most_visit_pro->pro_qty) 
        
          <div class="thumbnail" style="border:none">
      <img  src="{{ $prod_path }}" alt="{{ $alt_text }}">
      <div class="caption product_show">
      <h3 class="prev_text">{{ substr($fetch_most_visit_pro->$pro_title,0,20) }}...</h3>
        <h4 class="top_text dolor_text">{{ Helper::cur_sym() }} {{ $fetch_most_visit_pro->pro_disprice }}</h4>
            
                      @if($fetch_most_visit_pro->pro_no_of_purchase >= $fetch_most_visit_pro->pro_qty) 
                      <h4 style="text-align:center;"><a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{ trans(Session::get('lang_file').'.SOLD') }} @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a> 
                       @else   
          @php    $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
             $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
       $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
        $res = base64_encode($fetch_most_visit_pro->pro_id); @endphp
        
           <h4><!-- <a class="btn btn-warning" href="{!! url('productview').'/'.$fetch_most_visit_pro->pro_id!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a> -->
           </h4>
          <div class="product-info-price">
                <div>
               @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
                  <a href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
                  @endif
              @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
        <a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
        @endif
              @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
        <a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
        @endif
        @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
        <a href="{{ url('productview/'.$mcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
        @endif
                </div>

          

                

              </div>
                     @endif
          </div>
      </div>
       @endif @endforeach @endif
      
  </div>
<!-- Sidebar end=============================================== -->

        @if(count($searchTerms)!=0)  		

	<div class="span9">
<div class="">
<div class="search-product">
					<center>
					<span class="sale-title">@if (Lang::has(Session::get('lang_file').'.SEARCH_FOR_PRODUCTS')!= '') {{  trans(Session::get('lang_file').'.SEARCH_FOR_PRODUCTS') }} @else {{ trans($OUR_LANGUAGE.'.SEARCH_FOR_PRODUCTS') }} @endif</span>
					</center>
          
			

			   <?php

         echo '<ul>'; ?>

   @php $i = 1; @endphp
   @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
     @php $pro_title = 'pro_title'; @endphp
    @else @php  $pro_title = 'pro_title_'.Session::get('lang_code'); @endphp @endif
    @foreach($searchTerms as $fetch_product)  

			
			@php
          $product_saving_price = $fetch_product->pro_price - $fetch_product->pro_disprice;
          $product_discount_percentage = round(($product_saving_price/ $fetch_product->pro_price)*100,2);

          $product_img = explode('/**/', $fetch_product->pro_Img);
          $mcat = strtolower(str_replace(' ','-',$fetch_product->mc_name));
          $smcat = strtolower(str_replace(' ','-',$fetch_product->smc_name));
          $sbcat = strtolower(str_replace(' ','-',$fetch_product->sb_name));
          $ssbcat = strtolower(str_replace(' ','-',$fetch_product->ssb_name)); 
          $res = base64_encode($fetch_product->pro_id); 

          $product_image    = $product_img[0]; 
          
          $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
          $img_data   = "public/assets/product/".$product_image; @endphp
          
          @if(file_exists($img_data) && $product_image !='')   
          
        @php  $prod_path = url('').'/public/assets/product/' .$product_image;                  @endphp
          @else  
              @if(isset($DynamicNoImage['productImg']))
                @php  $dyanamicNoImg_path = url('').'/public/assets/noimage/' .$DynamicNoImage['productImg']; @endphp
                  @if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))
                   @php   $prod_path = $dyanamicNoImg_path; @endphp @endif
              @endif
          @endif   
         
        @php  $alt_text   = substr($fetch_product->$pro_title,0,25); @endphp
          

           <li class=""><div class="thumbnail">
		    @if($product_discount_percentage!='' && round($product_discount_percentage)!=0)
            <i class="tag">{{ substr($product_discount_percentage,0,2) }} %</i>@endif
                  @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
									    <a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res) }}"><img src="{{ $prod_path }}" alt="{{ $alt_text }}" ></a>
									@endif
                  @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
			                <a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res) }}"><img src="{{ $prod_path }}" alt="{{ $alt_text }}"></a>
			           @endif
                  @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
			                <a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$res) }}"><img src="{{ $prod_path }}" alt="{{ $alt_text }}" ></a>
			            @endif
			            @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
			                <a href="{{ url('productview/'.$mcat.'/'.$res) }}"><img ssrc="{{ $prod_path }}" alt="{{ $alt_text }}"></a>
			            @endif
             

              <div class="caption product_show">
                <h4 class="top_text dolor_text">{{ Helper::cur_sym() }} {{ $fetch_product->pro_disprice }}</h4>
                <h5 class="prev_text">{{ substr($fetch_product->$pro_title,0,25) }}</h5>
                <div >

								  
                  <div class="product-info-price">
				  @if($fetch_product->pro_no_of_purchase < $fetch_product->pro_qty)
                   @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')  
									    <a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
									@endif
                  @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
			                <a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
			            @endif
                  @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
			                <a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
			            @endif
			            @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
			                <a href="{{ url('productview/'.$mcat.'/'.$res) }}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
			            @endif
                    @endif
					@if($fetch_product->pro_no_of_purchase >= $fetch_product->pro_qty)
                                    <h4 style="text-align:center;"><a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{  trans(Session::get('lang_file').'.SOLD') }} @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a> 
                                    @endif
                  </div>

							 </div>
             </div>
            </li>  
 
   @if( $i % 3 == 0 ) 

         <!--   </ul></div></div><div class="search-product"><div class="item" ><ul class="thumbnails"> -->

      @endif

          @php   $i++; @endphp

			

          @endforeach

            </ul></div></div>

        @else
			
			<center>

		  
		  
          <span class="sale-title">@if (Lang::has(Session::get('lang_file').'.SEARCH_FOR_PRODUCTS')!= '') {{  trans(Session::get('lang_file').'.SEARCH_FOR_PRODUCTS') }} @else {{ trans($OUR_LANGUAGE.'.SEARCH_FOR_PRODUCTS') }} @endif</span>

          </center>
			
          <?php echo "<center><h4>No Products available with given search criteria</h4></center> "; ?>
       @endif

@if(count($searchTermss) > 0 )

	<div class="">
			<div class="search-product">

          <center>

		  
		  
          <span class="sale-title">@if (Lang::has(Session::get('lang_file').'.SEARCH_FOR_DEALS')!= '') {{  trans(Session::get('lang_file').'.SEARCH_FOR_DEALS') }} @else {{ trans($OUR_LANGUAGE.'.SEARCH_FOR_DEALS') }} @endif</span>

          </center>

			<?php

			   echo '<ul>';


    $i = 2; ?>
    @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
     @php   $deal_title = 'deal_title'; @endphp
    @else @php  $deal_title = 'deal_title_'.Session::get('lang_code'); @endphp @endif


    @foreach($searchTermss as $fetch_product) 
    

     @php     $product_saving_price = $fetch_product->deal_original_price - $fetch_product->deal_original_price;

          $product_discount_percentage = round(($product_saving_price/ $fetch_product->deal_discount_price)*100,2);

          $product_img = explode('/**/', $fetch_product->deal_image);

          $mcat = strtolower(str_replace(' ','-',$fetch_product->mc_name));
          $smcat = strtolower(str_replace(' ','-',$fetch_product->smc_name));
          $sbcat = strtolower(str_replace(' ','-',$fetch_product->sb_name));
          $ssbcat = strtolower(str_replace(' ','-',$fetch_product->ssb_name)); 
          $res = base64_encode($fetch_product->deal_id);

          $product_image     = $product_img[0];
          
          $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
          $img_data   = "public/assets/deals/".$product_image; @endphp
          
          @if(file_exists($img_data) && $product_image !='')   
          
       @php   $prod_path = url('').'/public/assets/deals/' .$product_image; @endphp
          @else  
              @if(isset($DynamicNoImage['dealImg']))
              @php    $dyanamicNoImg_path = url('').'/public/assets/noimage/' .$DynamicNoImage['dealImg']; @endphp
                  @if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path))
                 @php  $prod_path = $dyanamicNoImg_path; @endphp @endif
              @endif
          @endif   
          
        @php  $alt_text   = substr($fetch_product->$deal_title,0,25);
          $alt_text  .= strlen($fetch_product->$deal_title)>25?'..':''; @endphp


           <li class=""><div class="thumbnail">
		  @if($fetch_product->deal_discount_percentage!='' && round($fetch_product->deal_discount_percentage)!=0)
		   <i class="tag">{{ substr($fetch_product->deal_discount_percentage,0,2) }}%</i>@endif
           @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
                            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                    <img  src="{{ $prod_path }}" alt="{{ $alt_text }}"/>
                    </a>
                            @endif
                                @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
                                    <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}">
                    <img  src="{{ $prod_path }}" alt="{{ $alt_text }}"/>
                    </a>
                                    @endif
                                       @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
                                            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}">
                    <img src="{{ $prod_path }}" alt="{{ $alt_text }}"  />
                    </a>
                                           @endif
                                                @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
                                                    <a href="{!! url('dealview').'/'.$mcat.'/'.$res!!}">
                    <img src="{{ $prod_path }}" alt="{{ $alt_text }}" />
                    </a>
                                                   @endif
           
           
           <div class="caption product_show"><h4 class="top_text dolor_text">{{ Helper::cur_sym() }} {{ $fetch_product->deal_discount_price }}</h4>
           <h5 class="prev_text">{{ substr($fetch_product->$deal_title,0,25) }}</h5>

<div>
<div class="product-info-price">

			@if($fetch_product->deal_no_of_purchase < $fetch_product->deal_max_limit) 
			@if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
               <h4><a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
					
               @endif
              @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
                  <h4><a  href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
					

			   @endif
               @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
               <h4><a  href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
					

               @endif
			   @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
                <h4><a  href="{!! url('dealview').'/'.$mcat.'/'.$res!!}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
					

@endif
          @endif
          			@if($fetch_product->deal_no_of_purchase >= $fetch_product->deal_max_limit) 
                                    <h4 style="text-align:center;"><a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{ trans(Session::get('lang_file').'.SOLD') }} @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a> 
                                   @endif
	</div></div>

							</div></div></li> 
<?php
 
   if( $i % 3 == 0 ){
       //echo '<li>';
       //echo $i;
      // echo "ss";
   } ?>


       @php      $i++; @endphp
      


          @endforeach <!-- //foreach -->
            


			  </div>

</div>

</div>


        @else
			
			<center>

		  
		  
          <span class="sale-title">@if (Lang::has(Session::get('lang_file').'.SEARCH_FOR_DEALS')!= '') {{  trans(Session::get('lang_file').'.SEARCH_FOR_DEALS') }} @else {{ trans($OUR_LANGUAGE.'.SEARCH_FOR_DEALS') }} @endif</span>

          </center>
		  
          <?php echo "<center><h4>No Deals available with given search criteria</h4></center> "; ?>
     @endif

	</div>


	</div>

	</div>

 <script src="{{ url('') }}/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script> 



<script type="text/javascript">
  $(document).ready(function(){
    $(document).on("click", ".customCategories .topfirst b", function(){
      $(this).next("ul").css("position", "relative");
      
      $(".topfirst ul").not($(this).parents(".topfirst").find("ul")).css("display", "none");
       $(this).next("ul").toggle();
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



	{!! $footer !!}
</body>
</html>