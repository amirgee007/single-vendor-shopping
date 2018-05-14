
{!! $navbar !!}

<!-- Navbar ================================================== -->



{!! $header !!}

<!-- Header End====================================================================== -->
<?php
/*
print_r(Session::get('wallet_used_amount'));
if(Session::get('wallet_used_amount')){
	echo "aa";
}else{
	echo "b";
}*/
?>
<style>
.cart-table table tbody tr td img
{
	width:60px;
}

</style>
<div id="mainBody">

	<div class="container">

	<div class="row">


	<div class="span12">

    <ul class="breadcrumb">
		<li><a href="index">@if (Lang::has(Session::get('lang_file').'.HOME')!= '') {{ trans(Session::get('lang_file').'.HOME') }} @else {{ trans($OUR_LANGUAGE.'.HOME') }} @endif</a> <span class="divider">/</span></li>
		<li class="active"> @if (Lang::has(Session::get('lang_file').'.SHOPPING_CART')!= '') {{ trans(Session::get('lang_file').'.SHOPPING_CART') }} @else {{ trans($OUR_LANGUAGE.'.SHOPPING_CART') }} @endif</li>
    </ul>

    <?php 
    if(isset($_SESSION['cart'])){
		$count2 =  count($_SESSION['cart']);
	} else { $count2 =  0; }

	if(isset($_SESSION['deal_cart'])){	
		$count1 = count($_SESSION['deal_cart']);
	} 	
	else { $count1 = 0; } 

	$count = $count1 + $count2; //total count of  session product and deal in cart
		?>
	<h3> @if (Lang::has(Session::get('lang_file').'.SHOPPING_CART')!= '') {{ trans(Session::get('lang_file').'.SHOPPING_CART') }} @else {{ trans($OUR_LANGUAGE.'.SHOPPING_CART') }} @endif [ <small>{{ $count }} @if (Lang::has(Session::get('lang_file').'.ITEM(S)')!= '') {{ trans(Session::get('lang_file').'.ITEM(S)') }} @else {{ trans($OUR_LANGUAGE.'.ITEM(S)') }} @endif </small>]<a href="{{ url('index') }}" class="btn btn-large pull-right me_btn res-cont1"><i class="icon-arrow-left"></i> <span style="font-weight:normal;" >@if (Lang::has(Session::get('lang_file').'.CONTINUE_SHOPPING')!= '') {{ trans(Session::get('lang_file').'.CONTINUE_SHOPPING') }} @else {{ trans($OUR_LANGUAGE.'.CONTINUE_SHOPPING') }} @endif</span> </a> 
    </h3>	
 
    <!--  Prodcut Coupon Availability check starts  --> 
  @php  $prod_coup_avail = 0; @endphp
    @if($count != 0) 

		@if(isset($_SESSION['cart']))	
		@php	$max=count($_SESSION['cart']); @endphp
			@for($i=0;$i<$max;$i++)

			@php	$session_pro_id = $_SESSION['cart'][$i]['productid'];

				$current_date = date('Y-m-d H:i:s');
				$coupon_table_values = DB::table('nm_coupon')
				->where('product_id','=',$session_pro_id)
				->where('start_date','<=',$current_date)
				->where('end_date','>=',$current_date)
				->where('type_of_coupon','=',1)->first(); @endphp
				@if(count($coupon_table_values)>0)
				@php	$prod_coup_avail +=1; @endphp
				@endif
			@endfor

		@endif
	@endif

     <!-- Prodcut Coupon Availability check ends   -->

    
     
   	 
   @php $s = 0; @endphp
   <!--  //User coupon availability check

    //DB::connection()->enableQueryLog(); -->
   @php $user_types = "(type_of_coupon = 2 or type_of_coupon=3)";
    $coupon_type = DB::table('nm_coupon')->whereRaw($user_types)
    				->where('end_date','>=',date('Y-m-d H:i:s'))
    				->where('start_date','<=',date('Y-m-d H:i:s'))
    				->where("status","=",1)->get(); @endphp


	
    @if($coupon_type != '')
    @foreach ($coupon_type as $key) 
    	@php $user_id = explode(',',$key->user_id);	@endphp

    @foreach ($user_id as $val)     	
    	 @if($val == Session::get('customerid'))   		
    		
	@php $s++; @endphp @endif  @endforeach @endforeach 

	 @if($s > 0  && $prod_coup_avail>0)
	
		<input type="radio" name="coupon" onclick="javascript:couponCheck();" id="user_coupon" value="@if (Lang::has(Session::get('lang_file').'.USER_COUPON1')!= '') {{ trans(Session::get('lang_file').'.USER_COUPON1') }} @else {{ trans($OUR_LANGUAGE.'.USER_COUPON1') }} @endif" checked> <span id="user_coupon1">@if (Lang::has(Session::get('lang_file').'.USER_COUPON')!= '') {{ trans(Session::get('lang_file').'.USER_COUPON') }} @else {{ trans($OUR_LANGUAGE.'.USER_COUPON') }} @endif</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	<input type="radio" name="coupon" onclick="javascript:couponCheck();" id="product_coupon" value="@if (Lang::has(Session::get('lang_file').'.PRODUCT_COUPON1')!= '') {{ trans(Session::get('lang_file').'.PRODUCT_COUPON1') }}  else {{ trans($OUR_LANGUAGE.'.PRODUCT_COUPON1') }} @endif"> <span id="product_coupon1">@if (Lang::has(Session::get('lang_file').'.PRODUCT_COUPON')!= '') {{ trans(Session::get('lang_file').'.PRODUCT_COUPON') }} @else {{ trans($OUR_LANGUAGE.'.PRODUCT_COUPON') }} @endif</span>
    @endif   @else if($coupon_type == '') @endif	


	<hr class="soft hide-mob"/>	
	 @if($count != 0) 
		

		<div id='dev_session_er_alert' class="" style="display: none; color:#fa0a0a;border:1px solid #fa0a0a; padding:15px;background:rgba(238, 177, 177, 0.67); border-radius: 5px;margin-bottom:10px "> 
    	</div>
    	@if($session_result != '')
	    	<div class="alert alert-danger alert-dismissable"  ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> {{ $session_result }}
	    	
	    	</div>
    	@endif		

    <div class="table-responsive cart-table"> 
	<table class="table table-bordered" style="">

        <thead>
            <tr>
		  		<th>@if (Lang::has(Session::get('lang_file').'.S.NO')!= '') {{ trans(Session::get('lang_file').'.S.NO') }} @else {{ trans($OUR_LANGUAGE.'.S.NO') }} @endif</th>

                <th>@if (Lang::has(Session::get('lang_file').'.PRODUCT')!= '') {{ trans(Session::get('lang_file').'.PRODUCT') }} @else {{ trans($OUR_LANGUAGE.'.PRODUCT') }} @endif</th>
                <th>@if (Lang::has(Session::get('lang_file').'.IMAGE')!= '') {{  trans(Session::get('lang_file').'.IMAGE') }} @else {{ trans($OUR_LANGUAGE.'.IMAGE') }}@endif</th>
                <th>@if (Lang::has(Session::get('lang_file').'.COLOR')!= '') {{  trans(Session::get('lang_file').'.COLOR') }} @else {{ trans($OUR_LANGUAGE.'.COLOR') }}
                @endif</th>
				<th>@if (Lang::has(Session::get('lang_file').'.SIZE')!= '') {{  trans(Session::get('lang_file').'.SIZE') }} @else {{ trans($OUR_LANGUAGE.'.SIZE') }} @endif</th> 
				<th>@if (Lang::has(Session::get('lang_file').'.QUANTITY')!= '') {{ trans(Session::get('lang_file').'.QUANTITY') }} @else {{ trans($OUR_LANGUAGE.'.QUANTITY') }} @endif / @if (Lang::has(Session::get('lang_file').'.UPDATE')!= '') {{  trans(Session::get('lang_file').'.UPDATE') }} @else {{ trans($OUR_LANGUAGE.'.UPDATE') }} @endif / @if (Lang::has(Session::get('lang_file').'.REMOVE')!= '') {{ trans(Session::get('lang_file').'.REMOVE') }} @else {{ trans($OUR_LANGUAGE.'.REMOVE') }} @endif</th>                  
                <th>@if (Lang::has(Session::get('lang_file').'.PRICE')!= '') {{  trans(Session::get('lang_file').'.PRICE') }} @else {{ trans($OUR_LANGUAGE.'.PRICE') }} @endif</th>
				<th>@if (Lang::has(Session::get('lang_file').'.SUB_TOTAL')!= '') {{  trans(Session::get('lang_file').'.SUB_TOTAL') }} @else {{ trans($OUR_LANGUAGE.'.SUB_TOTAL') }} @endif</th>
				<th>@if (Lang::has(Session::get('lang_file').'.TOTAL')!= '') {{  trans(Session::get('lang_file').'.TOTAL') }} @else {{ trans($OUR_LANGUAGE.'.TOTAL') }} @endif</th>
			</tr>

        </thead>
        <tbody>
		
		@php $z = 1;
		$overall_total_price=0; @endphp

		@if($count != 0) 
		  	@if(isset($_SESSION['cart']))
		  		@php $cart_error = 1;
				$max=count($_SESSION['cart']);
				$overall_total_price='';
				$z = 1; @endphp
				@for($i=0;$i<$max;$i++)
				@php	$pid 	=	$_SESSION['cart'][$i]['productid'];
					$q 		=	$_SESSION['cart'][$i]['qty'];
					$type_of_product = $_SESSION['cart'][$i]['type'];
					$pname 	= 	"Have to get"; @endphp
					@foreach($result_cart[$pid] as $session_cart_result) 
					@php	$product_img=explode('/**/',$session_cart_result->pro_Img);	
						$session_pro_id = $_SESSION['cart'][$i]['productid'];
						$session_customer_id = Session::get('customerid'); @endphp
				<!-- // 		if(Session::has('coupon_applied'))
				// 		{	
				// 		$purchage_coupon_details = DB::table('nm_coupon_purchage')->where('product_id','=',$session_pro_id)->where('sold_user','=',$session_customer_id)->first();

				// 		if($purchage_coupon_details != ''){
				// 		$coupon_reduction = $purchage_coupon_details->value;
				// 		$coupon_type = $purchage_coupon_details->type;
				// 		$coupon_product_id = $purchage_coupon_details->product_id;
						
				// 		//echo $coupon_product_id;
				// 		//echo $_SESSION['cart'][$i]['productid'];

				// 		if($_SESSION['cart'][$i]['productid'] == $coupon_product_id){
				// 		if($coupon_type == 1){
				// 		$item_total_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice) - $coupon_reduction;
						
				// 		}
				// 		elseif($coupon_type == 2){
				// 			$price = (($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice)) * $coupon_reduction;
				// 			$percentage_amount = $price / 100;
				// 			$item_total_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice) - $percentage_amount;

							
				// 		}
				// 	}else{
				// 		$item_total_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);
				// 	}
				// }
				// else{
				// 		$item_total_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);
				// 	}
				// }
				// else{
				// 		$item_total_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);
				// 	}		 -->
					
					

					@php	$item_total_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);
						$overall_total_price +=$session_cart_result->pro_disprice * $q;
						$max_qty =  $session_cart_result->pro_qty - $session_cart_result->pro_no_of_purchase; @endphp
	
				    	<tr>

			                  <td>{{ $z }} </td>

			                  <td>
							 @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
							@php $pro_title = 'pro_title'; @endphp
							  @else @php  $pro_title = 'pro_title_'.Session::get('lang_code'); @endphp @endif
							 {{ $session_cart_result->$pro_title }}</td>

			                  <td>
							   
										@php	$pro_img = $product_img[0];
										   $prod_path = url('').'/public/assets/default_image/No_image_product.png'; @endphp
											
											@if($product_img != '') <!-- // image is null -->
												  
			 
												  
												@php  $img_data = "public/assets/product/".$pro_img; @endphp
												 @if(file_exists($img_data) && $pro_img !='')  <!-- //image not exists in folder  -->
																			
										@php $prod_path = url('').'/public/assets/product/'.$pro_img; @endphp
																			 
													  @else  
															 @if(isset($DynamicNoImage['productImg']))
															 					
															@php	$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg']; @endphp
																@if($DynamicNoImage['productImg'] !='' && file_exists($dyanamicNoImg_path))
																
																@php	$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg']; @endphp
																@endif
																					
															 @endif
																				 
																				 
															@endif
									   
										 @else
												
													
													@if(isset($DynamicNoImage['productImg']))  
															 						
														@php		$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg']; @endphp
																@if($DynamicNoImage['productImg'] !='' && file_exists($dyanamicNoImg_path))
																 
																	@php $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg']; @endphp
																@endif
															
															 @endif
										 
												@endif		
							  
							  
							  <img width="60px" src="{{ $prod_path }}" alt="{{ $session_cart_result->$pro_title }}"/></td>
			                  <td>{{ $color_result[$_SESSION['cart'][$i]['color']] }} </td>

			                    <td>{{ $size_result[$_SESSION['cart'][$i]['size']] }} </td>

							  <td>

									<div class="input-append">
										<input type="hidden" id='dev_pro_size{{ $z }}' value="{{ $_SESSION['cart'][$i]['size'] }}" />	
										<input type="hidden" id='dev_pro_color{{ $z }}' value="{{ $_SESSION['cart'][$i]['color'] }}" />	
										<input class="span1" style="max-width:34px; height: 30px;" id="pro_qty{{ $z }}" placeholder=""  size="16" value="{{ $q }}" type="text" disabled />
										<button style="color:#000000;" class="btn" type="button" onClick="minus({{ $z }},{{ $pid }},{{ $max_qty }})"><i class="icon-minus"></i></button>
										<button style="color:#000000;" class="btn" type="button" onClick="add({{ $z }},{{ $pid }},{{ $max_qty }})"><i class="icon-plus"></i></button>
										<button class="btn btn-danger" type="button" onClick="del({{ $pid }})"><i class="icon-remove icon-white"></i></button>				
									</div>
									 
								@php	$session_pro_id = $_SESSION['cart'][$i]['productid']; @endphp
									@if($_SESSION['cart'][$i]['color'] !="")
										@php $session_pro_color = $_SESSION['cart'][$i]['color']; @endphp
									
									@else
									@php	$session_pro_color = 0; @endphp
									@endif
									@if($_SESSION['cart'][$i]['size'] !="")
									
									@php	$session_pro_size = $_SESSION['cart'][$i]['size']; @endphp
									
									@else
									@php $session_pro_size = 0; @endphp
									@endif
									<!-- //echo $session_cart_result->pro_id;
									//echo $session_pro_id;  -->
								@php	$current_date = date('Y-m-d H:i:s');
									$coupon_table_values = DB::table('nm_coupon')
									->where('product_id','=',$session_pro_id)
									->where('start_date','<=',$current_date)
									->where('end_date','>=',$current_date)
									->where('type_of_coupon','=',1)->first();
									
									$session_customer_id = Session::get('customerid');
									$user_details = DB::table('nm_customer')->where('cus_id','=',$session_customer_id)->first(); @endphp
									@if(count($coupon_table_values)>0) 
									@if(strtotime($current_date) <= strtotime($coupon_table_values->end_date) && $coupon_table_values->status != 0 && $session_pro_id == $coupon_table_values->product_id)
									@if(Session::has('customerid')) 	
									
								
										<div id="applyform {{ $z }}">
										

											<div class="producttypeform" @if($s > 0) style="display: none;" @endif
											
												<div>
													<label>@if (Lang::has(Session::get('lang_file').'.COUPON_CODE')!= '') {{  trans(Session::get('lang_file').'.COUPON_CODE') }} @else {{ trans($OUR_LANGUAGE.'.COUPON_CODE') }} @endif</label>
													<input type="text" id="coupon_code{{ $i }}">
													<input id="coupon_pro_qty{{ $i }}" type="hidden" value="{{ $coupon_table_values->quantity }}">
													<input id="valid_coupon{{ $i }}" type="hidden" value="{{ $coupon_table_values->coupon_code }}">
													<input type="hidden" id="txt_product{{ $i }}" value="{{ $coupon_table_values->product_id }}" />
													<input id="type{{ $i }}" type="hidden" value="{{ $coupon_table_values->type }}">
													<input id="value{{ $i }}" type="hidden" value="{{ $coupon_table_values->value }}">
													@php $old_date = $coupon_table_values->start_date;
														$new_date = date("Y-m-d", strtotime($old_date)); @endphp
														
													<input id="start_date{{ $i }}" type="hidden" value="{{ $new_date }}">
													<input id="end_date{{ $i }}" type="hidden" value="{{ $coupon_table_values->end_date }}">
													@php $current_date = date('Y-m-d'); @endphp
													
													<input id="current_date{{ $i }}" type="hidden" value="{{ $current_date }}">
													<input id="customer_id{{ $i }}" name="text_user" type="hidden" value="{{ $user_details->cus_id }}">
													<input id="pro_qty{{$i }}" value="{{$q}}" type="hidden">
													<input type="hidden" id="product_quantity{{$i}}" value="{{ $q }}">
													<input type="hidden" id="product_dis_price{{$i}}" value="{{ $session_cart_result->pro_disprice }}">
													<input type="hidden" id="cart_id{{$i}}" value="">
													<input type="hidden" id="pro_color{{$i}}" value="{{ $session_pro_color }}">
													<input type="hidden" id="pro_size{{$i}}" value="{{ $session_pro_size }}">
													<input type="hidden" id="type_of_coupon{{$i}}" value="{{ $coupon_table_values->type_of_coupon }}">
													<input type="hidden" id="num_of_coupon {{ $i }}" value="{{ $coupon_table_values->coupon_per_product }}">
													<input type="hidden" id="num_of_coupon_user{{$i}}" value="{{ $coupon_table_values->coupon_per_user }}">
													<input  id="" onclick="couponCode(document.getElementById('coupon_code{{$i}}').value,document.getElementById('valid_coupon{{$i}}').value,document.getElementById('txt_product{{ $i }}').value,document.getElementById('customer_id{{$i}}').value,document.getElementById('type{{$i}}').value,document.getElementById('value{{$i}}').value,document.getElementById('product_quantity{{$i}}').value,document.getElementById('coupon_pro_qty{{$i}}').value,document.getElementById('product_dis_price{{ $i }}').value,'{{$z}}',document.getElementById('pro_color{{$i}}').value,document.getElementById('pro_size{{$i}}').value,document.getElementById('current_date{{$i}}').value,document.getElementById('end_date{{$i}}').value,document.getElementById('type_of_coupon{{ $i }}').value,document.getElementById('num_of_coupon {{$i}}').value,document.getElementById('num_of_coupon_user{{$i}}').value,document.getElementById('start_date{{$i}}').value)" type="button" value="Apply" class="coup btn btn-success" style="vertical-align: top;">
												</div>
											</div>
										</div>

										<input type="submit" id="cancelcoupon{{ $z }}" name="" value="Cancel Coupon" class="coup-cancel" style="display: none;" onclick="couponcancel(document.getElementById('coupon_code{{ $i }}').value,document.getElementById('txt_product{{ $i }}').value,document.getElementById('customer_id{{ $i }}').value,document.getElementById('product_quantity{{ $i }}').value,document.getElementById('product_dis_price{{ $i }}').value,document.getElementById('cart_id{{ $i }}').value,'{{ $z}}')">
									
													

			           		    @else 
			           		 	<div>
			            		
				            		<label>@if (Lang::has(Session::get('lang_file').'.COUPON_CODE')!= '') {{ trans(Session::get('lang_file').'.COUPON_CODE') }} @else {{ trans($OUR_LANGUAGE.'.COUPON_CODE') }} @endif</label>
				            		<input type="text" name="coupon_code">

				            		 <a href="#login" role="button" data-toggle="modal" class="res-proc2"><input type="submit" name="" value="@if (Lang::has(Session::get('lang_file').'.APPLY')!= '') {{  trans(Session::get('lang_file').'.APPLY') }} @else {{ trans($OUR_LANGUAGE.'.APPLY') }} @endif"  class="coup btn btn-success"></a>
				            		
				           		 </div>
								 @endif @endif   @endif

							  </td>


			                  <td>{{ Helper::cur_sym() }} {{ $session_cart_result->pro_disprice }}</td>                 


			                  <td>{{ Helper::cur_sym() }} {{ $item_total_price.'.00' }}</td>

							  <td>{{ Helper::cur_sym() }} <span id="item_coupon_price{{ $z }}">{{ $item_total_price.'.00' }}</span></td>

                @php $z++; @endphp
            			@endforeach
            		@endfor 
            	@endif			
				
			@php	$y = 0; 
				$overall_total_price1 = 0; @endphp
				@if(isset($_SESSION['deal_cart']))
				@php $dealcart_error = 1;
				$max=count($_SESSION['deal_cart']);
				$overall_total_price1=''; @endphp

				@for($i=0;$i<$max;$i++)
				@php	$pid=$_SESSION['deal_cart'][$i]['productid'];

					$q=$_SESSION['deal_cart'][$i]['qty'];

					$type_of_product = $_SESSION['deal_cart'][$i]['type'];
					$pname="Have to get"; @endphp

					@foreach($result_cart_deal[$pid] as $session_cart_result) 

					@php	$product_img=explode('/**/',$session_cart_result->deal_image);	

						$item_total_price = ($_SESSION['deal_cart'][$i]['qty']) * ($session_cart_result->deal_discount_price);

						$overall_total_price1 +=$session_cart_result->deal_discount_price * $q;

						$max_deal_qty =  $session_cart_result->deal_max_limit - $session_cart_result->deal_no_of_purchase;  @endphp



		                 <tr>


			                <td>{{ $z }} </td>

			                <td>
							 @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
							@php	$deal_title = 'deal_title'; @endphp
							  @else  @php $deal_title = 'deal_title_'.Session::get('lang_code'); @endphp @endif
							 {{ $session_cart_result->$deal_title }}</td>
			                <td>
							@php $pro_img = $product_img[0];
							   $prod_path = url('').'/public/assets/default_image/No_image_deal.png'; @endphp
							
							  @if($product_img !='') <!-- //check image is available  -->
								
					  
								
						   @if($product_img[0] !='')  <!-- //check image is null -->
						    
							  
							 @php  $img_data = "public/assets/deals/".$pro_img; @endphp
							    @if(file_exists($img_data))  
									  
								 	         @php    $prod_path = url('').'/public/assets/deals/'.$pro_img; @endphp
								     
								@else  
										 @if(isset($DynamicNoImage['dealImg'])) <!-- //check no_product_image is exist  -->
										 						
										@php	$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['dealImg']; @endphp
												@if($DynamicNoImage['dealImg'] !='' && file_exists($dyanamicNoImg_path))
												 
												@php	$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg']; @endphp @endif
												
									     @endif
										 
										 
                                     @endif
					       
					      
						   @else
						   
							@php    $prod_path = url('').'/public/assets/default_image/No_image_deal.png'; @endphp
								@if(isset($DynamicNoImage['dealImg'])) <!-- //check no_product_image is set in database  -->
										 						
										@php	$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg']; @endphp
												@if($DynamicNoImage['dealImg'] !='' && file_exists($dyanamicNoImg_path)) <!-- //check no_product_image is set in file -->
												
												@php	$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg']; @endphp
												@endif 
										
									     @endif
										 
						  @endif
						    
					 
			      
				 @else
				  
					@php  $prod_path = url('').'/public/assets/default_image/No_image_deal.png'; @endphp
					  @if(isset($DynamicNoImage['dealImg'])) <!-- //check no_product_image is set in database  -->
										 				
											
											@php $dyanamicNoImg_path="public/assets/noimage/".$DynamicNoImage['dealImg']; @endphp
											
											
											 @if(file_exists($dyanamicNoImg_path) && $DynamicNoImage['dealImg'] !='')<!-- //check no_product_image is set in file -->
											
												
											@php	 $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg'];  @endphp
											   @endif
											
											
									     @endif

									 
								 
					  
					
				 @endif
							
							<img width="60px" src="{{ $prod_path }}" alt="{{ $session_cart_result->$deal_title }}"/></td>                 
			                <td>@if (Lang::has(Session::get('lang_file').'.N')!= '') {{  trans(Session::get('lang_file').'.N') }} @else {{ trans($OUR_LANGUAGE.'.N') }} @endif/@if (Lang::has(Session::get('lang_file').'.A')!= '') {{ trans(Session::get('lang_file').'.A') }} @else {{ trans($OUR_LANGUAGE.'.A') }} @endif </td>
			                <td>@if (Lang::has(Session::get('lang_file').'.N')!= '') {{ trans(Session::get('lang_file').'.N') }} @else {{ trans($OUR_LANGUAGE.'.N') }} @endif/@if (Lang::has(Session::get('lang_file').'.A')!= '') {{ trans(Session::get('lang_file').'.A') }} @else {{ trans($OUR_LANGUAGE.'.A') }} @endif </td>
							<td>

								<div class="input-append">
									<input class="span1" style="max-width:34px; height: 30px;" id="pro_qty{{$z}}" placeholder=""  size="16" value="{{$q}}" type="text" disabled />
									<button style="color:#000000;" class="btn" type="button" onClick="minus_dealcart({{ $z }},{{ $pid }},{{ $max_deal_qty }})"><i class="icon-minus"></i></button><button style="color:#000000;" class="btn" type="button" onClick="add_dealcart({{$z}},{{$pid}},{{$max_deal_qty}})"><i class="icon-plus"></i></button>
									<button class="btn btn-danger" type="button" onClick="del_dealcart({{$pid}})"><i class="icon-remove icon-white"></i></button>				
								</div>
							</td>
			                <td>{{ Helper::cur_sym() }}{{ $session_cart_result->deal_discount_price }}</td>                 

			                <td>{{ Helper::cur_sym() }}{{ $item_total_price.'.00' }}</td>

							<td>{{ Helper::cur_sym() }}{{ $item_total_price.'.00' }}</td>

		                </tr>		

		                @php $z++; @endphp @endforeach @endfor 			

							
				 		<tr>

			                <td colspan="7" style="text-align:right"><strong>@if (Lang::has(Session::get('lang_file').'.TOTAL')!= '') {{  trans(Session::get('lang_file').'.TOTAL') }} @else {{ trans($OUR_LANGUAGE.'.TOTAL') }} @endif =</strong></td>   
			                <td colspan="8" align="center"> <strong> {{ Helper::cur_sym() }} {{ $overall_total_price + $overall_total_price1 }} </strong></td>

				        </tr>
		   @endif @endif

		</tbody>

	  </table>
	</div>


    <table class="table table-bordered" style="display:none;">

		 <tr><th style="background: #1D84C1;color:white">@if (Lang::has(Session::get('lang_file').'.ESTIMATE_YOUR_SHIPPING')!= '') {{ trans(Session::get('lang_file').'.ESTIMATE_YOUR_SHIPPING') }} @else {{ trans($OUR_LANGUAGE.'.ESTIMATE_YOUR_SHIPPING') }} @endif</th></tr>
		 <tr> 
		 <td>
				<form class="form-horizontal">
				  <div class="control-group"  >

					<label class="control-label" for="inputPost"  style="width:440px;">
						@if (Lang::has(Session::get('lang_file').'.CHECK_PRODUCT_AVAILABILITY_AT_YOUR_LOCATION')!= '') 
		{{ trans(Session::get('lang_file').'.CHECK_PRODUCT_AVAILABILITY_AT_YOUR_LOCATION') }} 
				@else {{ trans($OUR_LANGUAGE.'.CHECK_PRODUCT_AVAILABILITY_AT_YOUR_LOCATION') }}
				 @endif 

				 (@if (Lang::has(Session::get('lang_file').'.POST_CODE')!= '') 
				{{  trans(Session::get('lang_file').'.POST_CODE') }} 
			@else {{ trans($OUR_LANGUAGE.'.POST_CODE') }} 
		@endif/

		 @if (Lang::has(Session::get('lang_file').'.ZIPCODE')!= '') {{ trans(Session::get('lang_file').'.ZIPCODE') }} @else {{ trans($OUR_LANGUAGE.'.ZIPCODE') }} @endif) </label>

					<div class="controls" style="margin-left:458px;">

					  <input type="text" id="estimate_check_val" placeholder="ex: 641041">
					</div>
				  </div>

				  <div class="control-group">

					<div class="controls" style="margin-left:425px;">

					  <button type="button" class="btn" id="estimate_check" style="background:#424542;color:white;text-shadow:none">@if (Lang::has(Session::get('lang_file').'.VERIFY')!= '') {{  trans(Session::get('lang_file').'.VERIFY') }} @else {{ trans($OUR_LANGUAGE.'.VERIFY') }} @endif </button><br>
                      <div id="result_zip_code" style="margin-top:10px;"> </div>
					</div>
				  </div>
				</form>	
			  </td>
			  </tr>
            </table>	
              @else  

            <table class="table table-bordered">
              <thead>
              <tr><td>
             @if (Lang::has(Session::get('lang_file').'.NO_ITEMS_IN_CART')!= '') {{  trans(Session::get('lang_file').'.NO_ITEMS_IN_CART') }} @else {{ trans($OUR_LANGUAGE.'.NO_ITEMS_IN_CART') }} @endif  
             ...

              </td></tr>
              </thead>
              </table>


            @endif	

<div class="container">
	<div class="row">
		<div class="span6 pull-right">

			<!--a href="<?php echo url('index'); ?>" class="btn btn-large me_btn res-cont2"><i class="icon-arrow-left"></i> Continue Shopping </a-->
     		@if(Session::has('customerid'))
	 			@if($count2 > 0 || $count1 > 0)<a href="{{ url('checkout') }}" class="btn btn-large pull-right res-proc1" style="background:#424542;color:white;text-shadow:none;">@if (Lang::has(Session::get('lang_file').'.PROCEED_TO_CHECKOUT')!= '') {{ trans(Session::get('lang_file').'.PROCEED_TO_CHECKOUT') }} @else {{ trans($OUR_LANGUAGE.'.PROCEED_TO_CHECKOUT') }} @endif <i class="icon-arrow-right"></i></a> @endif
      @else 
     @if($count2 > 0 || $count1 > 0) <a href="#login" role="button" data-toggle="modal" class="btn btn-large pull-right res-proc2" style="background: #424542;

    text-shadow: none;

    border: none;

    color: white;">@if (Lang::has(Session::get('lang_file').'.PROCEED_TO_CHECKOUT')!= '') {{  trans(Session::get('lang_file').'.PROCEED_TO_CHECKOUT') }} @else {{ trans($OUR_LANGUAGE.'.PROCEED_TO_CHECKOUT') }} @endif <i class="icon-arrow-right"></i></a> @endif
     @endif
</div>

    <div class="col-sm-6">

    	 
         
            @if(isset($_SESSION['cart']))	
			@php $max=count($_SESSION['cart']); @endphp
					

			 	<!-- //$session_pro_id1 = $_SESSION['cart'][$i]['productid'];
			   //foreach ($user_id as $val) {}//get explode value

				//Take both user coupon and city based user coupon -->
				@if(Session::has('customerid'))
				  	
			@php	$user_types = "(type_of_coupon = 2 or type_of_coupon=3)";

			   	$coupon_table_values1 = DB::table('nm_coupon')->whereRaw($user_types)->where('status','=',1)->whereRaw("FIND_IN_SET(".Session::get('customerid').",user_id)")->where('end_date','>=',date('Y-m-d H:i:s'))
    				->where('start_date','<=',date('Y-m-d H:i:s'))->first(); 

				$session_customer_id1 = Session::get('customerid');
				$user_details1 = DB::table('nm_customer')->where('cus_id','=',$session_customer_id1)->first(); @endphp
				@if(count($coupon_table_values1)>0) 
					@if($s > 0)
			    	 @if(Session::has('customerid')) 
			    	 	@if(isset($overall_total_price))
			    	 	
				
					    	 <div id="usertypeform">
						    	<label><b>@if (Lang::has(Session::get('lang_file').'.SPECIAL_COUPON_CODE')!= '') {{  trans(Session::get('lang_file').'.SPECIAL_COUPON_CODE') }} @else {{ trans($OUR_LANGUAGE.'.SPECIAL_COUPON_CODE') }} @endif</b></label>
						    	<input type="text" id="coupon_code" name="">
						
						    	<input type="hidden" id="user_total_amount" value="<?php echo $overall_total_price; ?>">
								
								<input id="customer_id" name="text_user" type="hidden" value="<?php echo $user_details1->cus_id;?>">
								
						    	<input type="submit" onclick="usercouponCode(document.getElementById('coupon_code').value,document.getElementById('user_total_amount').value,document.getElementById('customer_id').value)" value="Apply" class="coup">
						    </div>
						   <span id="dev_userCouponError" style="color:rgb(244, 3, 39);padding:10px;display: none"></span>
						    
						    <input type="submit" id="cancelusercoupon" name="" value="@if (Lang::has(Session::get('lang_file').'.CANCEL_USER_COUPON')!= '') {{  trans(Session::get('lang_file').'.CANCEL_USER_COUPON') }} @else {{ trans($OUR_LANGUAGE.'.CANCEL_USER_COUPON') }} @endif" class="coup-cancel" style="display: none;" onclick="usercouponcancel(document.getElementById('customer_id').value,document.getElementById('user_total_amount').value)">
						    <div id="amount_values" style="margin-bottom: 10px;"> 
						    	<!-- Right side content -->
						    	<p><b>@if (Lang::has(Session::get('lang_file').'.SUB_TOTAL')!= '') {{ trans(Session::get('lang_file').'.SUB_TOTAL') }} @else {{ trans($OUR_LANGUAGE.'.SUB_TOTAL') }} @endif:</b>{{ Helper::cur_sym() }}<?php  //echo $overall_total_price + $overall_total_price1;?>{{  $overall_total_price }} </p>
						    	<p><b>@if (Lang::has(Session::get('lang_file').'.TOTAL')!= '') {{ trans(Session::get('lang_file').'.TOTAL') }} @else {{ trans($OUR_LANGUAGE.'.TOTAL') }} @endif:</b> {{ Helper::cur_sym() }}<span id="user_coupon_applied"><?php //echo $overall_total_price + $overall_total_price1;?> {{  $overall_total_price }} </p></span>
						    </div>
				    	

				   		 
			 @endif @endif @endif @endif  @endif  @endif  

	    				</div>

	    			</div>
	    		</div>

			</div>
		</div>
	</div>
</div>
<!-- MainBody End ============================= -->

<!-- Footer ================================================================== -->

  <script src="{{ url('')}}/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script>

	{!!$footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->

	<script src="{{ url('') }}/themes/js/jquery.js" type="text/javascript"></script>
<?php /*
	<script src="<?php echo url(); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script> */?>
	<script src="{{ url('') }}/themes/js/google-code-prettify/prettify.js"></script>
    <script src="{{ url('') }}/themes/js/bootshop.js"></script>
    <script src="{{ url('') }}/themes/js/jquery.lightbox-0.5.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		$('#estimate_check').click(function()
		{

			var estimate_check_val = $('#estimate_check_val').val();
			if(estimate_check_val == "")
			{
				$('#estimate_check_val').css("border-color", "red");

				$('#estimate_check_val').focus();
 			}else if(isNaN(estimate_check_val))
 			{

				$('#estimate_check_val').css("border-color", "red");

				$('#estimate_check_val').focus();
			}
			else{
	 			$('#estimate_check_val').css("border-color", "");
	  			$('#result_zip_code');
 				var passData = 'estimate_check_val='+ estimate_check_val;
 				//alert(passData);

				 $.ajax( {
					type: 'GET',

					data: passData,

					url: '<?php echo url('check_estimate_zipcode'); ?>',
					success: function(responseText){ 
						if(responseText != 0 )
						{
							$('#result_zip_code').html('<span style="color:green;margin-top:10px;" ><b>Product can be dispatched at your location in '+responseText+ ' bussiness days</b></span>' );

						} else
						{
							$('#result_zip_code').html('<span style="color:red;margin-top:10px;" ><b>Sorry!! No dispatched item for your location</b></span>' );
						}
					}
				});
			}
			return false;   
		});
		$("#searchbox").keyup(function(e) 
		{
			var searchbox = $(this).val();
			var dataString = 'searchword='+ searchbox;
			if(searchbox=='')
			{
				$("#display").html("").hide();
			}
			else
			{
				var passData = 'searchword='+ searchbox;
				$.ajax( {
					type: 'GET',
					data: passData,
					url: '<?php echo url('autosearch'); ?>',
					success: function(responseText){ 
						$("#display").html(responseText).show();	
					}
				});

			}
			return false; 
		});

	});


</script>
    <script>

	function add(sno,pid,max_qty){
	
		var id = document.getElementById('pro_qty'+sno).value;
		var hid_color = document.getElementById('dev_pro_color'+sno).value;
		var hid_size  = document.getElementById('dev_pro_size'+sno).value;
		var id=parseInt(id);
		var max_qty=parseInt(max_qty);
		if(id < max_qty){

		document.getElementById('pro_qty'+sno).value = parseInt(id) + 1;
		var new_id = document.getElementById('pro_qty'+sno).value;
		var passData = 'id='+new_id+'&pid='+pid+'&size='+hid_size+'&color='+hid_color;
		 $.ajax({
		      type: 'GET',
			  data: passData,
			  url: '<?php echo url('set_quantity_session_cart'); ?>',
			  success: function(responseText){

			  	window.location.href = 'addtocart';

				}		
		});

		return false;    

		}else{
			var er_msge = '';
			<?php 
			if(Lang::has(Session::get('lang_file').'.PRODUCT_QUANTITY_NOT_AVAILABLE')!= '') { ?>             
            	er_msge = '<?php echo trans(Session::get('lang_file').'.PRODUCT_QUANTITY_NOT_AVAILABLE');?>'; 
            <?php  }           
        	else { ?>
        		er_msge = '<?php echo  trans($OUR_LANGUAGE.'.PRODUCT_QUANTITY_NOT_AVAILABLE')?>';
			<?php } ?>
        	 
			$("#dev_session_er_alert").css("display","block");
			$("#dev_session_er_alert").html(er_msge);
			$("#dev_session_er_alert").fadeOut(3500);

		}
	}

	function minus(sno,pid,max_qty)
	{
		
		var id = document.getElementById('pro_qty'+sno).value;
		var hid_color = document.getElementById('dev_pro_color'+sno).value;
		var hid_size  = document.getElementById('dev_pro_size'+sno).value;

		if(id <= max_qty && id > 0)
		{
			var nw_pro_qty = parseInt(id) - 1;
			if(nw_pro_qty>=1){
				document.getElementById('pro_qty'+sno).value = nw_pro_qty ;
				var new_id = document.getElementById('pro_qty'+sno).value;
				var passData = 'id='+new_id+'&pid='+pid+'&size='+hid_size+'&color='+hid_color;
				//alert(passData);
				 $.ajax({
					      type: 'GET',

						  data: passData,
						  url: '<?php echo url('set_quantity_session_cart'); ?>',
						  success: function(responseText){  
						  //alert(responseText);

		        		 window.location.href = 'addtocart';

						  	}
					});
					return false; 

			}
			else{
				var er_msge = '';
				<?php 
				if(Lang::has(Session::get('lang_file').'.PRODUCT_QUANTITY_SHOULD_BE_GREATER_THAN_ZERO')!= '') { ?>             
                er_msge = '<?php echo trans(Session::get('lang_file').'.PRODUCT_QUANTITY_SHOULD_BE_GREATER_THAN_ZERO') ;?>'; 
                <?php  }           
            	else { ?>
            		er_msge = '<?php echo  trans($OUR_LANGUAGE.'.PRODUCT_QUANTITY_SHOULD_BE_GREATER_THAN_ZERO')?>';
				<?php } ?>
            	 
				$("#dev_session_er_alert").css("display","block");
				$("#dev_session_er_alert").html(er_msge);
				$("#dev_session_er_alert").fadeOut(3500);

			}
		}else{
			var er_msge = '';
			<?php 
			if(Lang::has(Session::get('lang_file').'.PRODUCT_QUANTITY_NOT_AVAILABLE')!= '') { ?>             
            	er_msge = '<?php echo trans(Session::get('lang_file').'.PRODUCT_QUANTITY_NOT_AVAILABLE');?>'; 
            <?php  }           
        	else { ?>
        		er_msge = '<?php echo  trans($OUR_LANGUAGE.'.PRODUCT_QUANTITY_NOT_AVAILABLE')?>';
			<?php } ?>
        	 
			$("#dev_session_er_alert").css("display","block");
			$("#dev_session_er_alert").html(er_msge);
			$("#dev_session_er_alert").fadeOut(3500);

		}		
	}

	function del(id)

	{
		//alert(id);
		var passData = 'id='+id;

		$.ajax( {

		    type: 'GET',

			data: passData,

			url: '<?php echo url('remove_session_cart_data'); ?>',

			success: function(responseText){  

			  	window.location.href = 'addtocart';

			}		

		});
		return false;
   	}

   	function add_dealcart(sno,pid,max_deal_qty)
	{
		var id = document.getElementById('pro_qty'+sno).value;

		if(id <= max_deal_qty)
		{

			document.getElementById('pro_qty'+sno).value = parseInt(id) + 1;
			var new_id = document.getElementById('pro_qty'+sno).value;
			var passData = 'id='+new_id+'&pid='+pid;
			//alert(passData);
			 $.ajax({

				type: 'GET',
				data: passData,
				url: '<?php echo url('set_quantity_session_dealcart'); ?>',
				success: function(responseText){  

					//alert(responseText);

	        		window.location.href = 'addtocart';

				}	
			});
			return false;    

		}else{
				var er_msge = '';
				<?php 
				if(Lang::has(Session::get('lang_file').'.DEAL_QUANTITY_NOT_AVAILABLE')!= '') { ?>             
                er_msge = '<?php echo trans(Session::get('lang_file').'.DEAL_QUANTITY_NOT_AVAILABLE') ;?>'; 
                <?php  }           
            	else { ?>
            		er_msge = '<?php echo  trans($OUR_LANGUAGE.'.DEAL_QUANTITY_NOT_AVAILABLE')?>';
				<?php } ?>
            	 
				$("#dev_session_er_alert").css("display","block");
				$("#dev_session_er_alert").html(er_msge);
				$("#dev_session_er_alert").fadeOut(3500);

			}
	}
	function minus_dealcart(sno,pid,max_qty)

	{
		var id = document.getElementById('pro_qty'+sno).value;
		if(id <= max_qty && id > 0)
		{
			var new_qty = parseInt(id) - 1;
			if(new_qty>=1){
				document.getElementById('pro_qty'+sno).value = new_qty;
				var new_id = document.getElementById('pro_qty'+sno).value;
				var passData = 'id='+new_id+'&pid='+pid;
				//alert(passData);
				 $.ajax({
					type: 'GET',
					data: passData,
					url: '<?php echo url('set_quantity_session_dealcart'); ?>',
					success: function(responseText){  
						//alert(responseText);
		        		window.location.href = 'addtocart';
					}
				});
			}else{
				var er_msge = '';
				<?php 
				if(Lang::has(Session::get('lang_file').'.DEAL_QUANTITY_SHOULD_BE_GREATER_THAN_ZERO')!= '') { ?>             
                er_msge = '<?php echo trans(Session::get('lang_file').'.DEAL_QUANTITY_SHOULD_BE_GREATER_THAN_ZERO') ;?>'; 
                <?php  }           
            	else { ?>
            		er_msge = '<?php echo  trans($OUR_LANGUAGE.'.DEAL_QUANTITY_SHOULD_BE_GREATER_THAN_ZERO')?>';
				<?php } ?>
            	 
				$("#dev_session_er_alert").css("display","block");
				$("#dev_session_er_alert").html(er_msge);
				$("#dev_session_er_alert").fadeOut(3500);
			}	 
				return false;
		}else{
			var er_msge = '';
			<?php 
			if(Lang::has(Session::get('lang_file').'.DEAL_QUANTITY_NOT_AVAILABLE')!= '') { ?>             
            er_msge = '<?php echo trans(Session::get('lang_file').'.DEAL_QUANTITY_NOT_AVAILABLE') ;?>'; 
            <?php  }           
        	else { ?>
        		er_msge = '<?php echo  trans($OUR_LANGUAGE.'.DEAL_QUANTITY_NOT_AVAILABLE')?>';
			<?php } ?>
        	 
			$("#dev_session_er_alert").css("display","block");
			$("#dev_session_er_alert").html(er_msge);
			$("#dev_session_er_alert").fadeOut(3500);

		}
	}
	function del_dealcart(id)
	{	//alert(id);

		var passData = 'id='+id;

		$.ajax( {
			type: 'GET',
			data: passData,
			url: '<?php echo url('remove_session_dealcart_data'); ?>',
			success: function(responseText){ 
			window.location.href = 'addtocart';
			}	
		});
		return false; 
   	}
	</script>
	<script src="{{ url('') }}/plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>

    <script src="{{ url('') }}/plug-k/demo/js/demo.js" type="text/javascript"></script>


<script type="text/javascript">
    	
    	$(document).ready(function(){
$("#submit0").click(function(){
var coupon0 = $("#coupon_code0").val();
var qty0 = $("#pro_qty0").val();
var coupon_pro_qty0 = $("#coupon_pro_qty0").val();
var valid_coupon0 = $("#valid_coupon0").val();
var value0 = $("#value0").val();
var type0 = $("#type0").val();
var customer_id0 = $("#customer_id0").val();
var coupon_usage0 = $("#coupon_usage0").val();
var txt_product0 = $('#txt_product0').val();
// Returns successful data submission message when the entered information is stored in database.
//var dataString = 'name1='+ name + '&email1='+ email + '&password1='+ password + '&contact1='+ contact;
var dataString = 'scriptid='+ 0 +'&coupon='+ coupon0 + '&customer_id='+ customer_id0 + '&txt_product=' + txt_product0 + '&type='+ type0 + '&value='+ value0;
if(coupon0=='')
{
alert("<?php if (Lang::has(Session::get('lang_file').'.PLEASE_FILL_ALL_FIELDS')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_FILL_ALL_FIELDS');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_FILL_ALL_FIELDS');} ?>");
}
else if(coupon0 != valid_coupon0)
{
alert("<?php if (Lang::has(Session::get('lang_file').'.ENTER_CORRECT_COUPON_CODE')!= '') { echo  trans(Session::get('lang_file').'.ENTER_CORRECT_COUPON_CODE');}  else { echo trans($OUR_LANGUAGE.'.ENTER_CORRECT_COUPON_CODE');} ?>");
}
else if(qty0 != coupon_pro_qty0)
{
alert("<?php if (Lang::has(Session::get('lang_file').'.APLICAPLE_ONLY')!= '') { echo  trans(Session::get('lang_file').'.APLICAPLE_ONLY');}  else { echo trans($OUR_LANGUAGE.'.APLICAPLE_ONLY');} ?>" +coupon_pro_qty0+ "<?php if (Lang::has(Session::get('lang_file').'.QUANTITY_OF_PRODUCT')!= '') { echo  trans(Session::get('lang_file').'.QUANTITY_OF_PRODUCT');}  else { echo trans($OUR_LANGUAGE.'.QUANTITY_OF_PRODUCT');} ?>");
}
// else if(coupon_usage > 0)
// {
// alert("You Cannot Use this Multiple Times");	
// }
else
{

$.ajax({
type: "POST",
url: "<?php echo url('ajax_coupon_submit'); ?>",
data: dataString,
cache: false,
success: function(result){
	//window.location.href = 'addtocart';
 
}
});
}
return false;
});
});
    </script>


    <script type="text/javascript">
    	function couponCode(coupon_code,valid_coupon,product_id,customer_id,type,value,product_qty,coupon_pro_qty,product_dis_price,cart_id,pro_color,pro_size,current_date,end_date,type_of_coupon,coupon_per_product,coupon_per_user,start_date)
		{
			
			
			if(coupon_code=='')
			{
				alert("<?php if (Lang::has(Session::get('lang_file').'.PLEASE_FILL_ALL_FIELDS')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_FILL_ALL_FIELDS');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_FILL_ALL_FIELDS');} ?>");
			}
			else if(product_qty != coupon_pro_qty)
			{
				alert("<?php if (Lang::has(Session::get('lang_file').'.USE_THIS_COUPON_ONLY_FOR')!= '') { echo  trans(Session::get('lang_file').'.USE_THIS_COUPON_ONLY_FOR');}  else { echo trans($OUR_LANGUAGE.'.USE_THIS_COUPON_ONLY_FOR');} ?>" + coupon_pro_qty + " Quantity");	
			}
			else if(coupon_code != valid_coupon)
			{
				alert("<?php if (Lang::has(Session::get('lang_file').'.COUPON_IS_NOT_VALID')!= '') { echo  trans(Session::get('lang_file').'.COUPON_IS_NOT_VALID');}  else { echo trans($OUR_LANGUAGE.'.COUPON_IS_NOT_VALID');} ?>");
			}
			else if(start_date > current_date)
			{
				alert("<?php if (Lang::has(Session::get('lang_file').'.COUPON_DATE_NOT_STARTED')!= '') { echo  trans(Session::get('lang_file').'.COUPON_DATE_NOT_STARTED');}  else { echo trans($OUR_LANGUAGE.'.COUPON_DATE_NOT_STARTED');} ?>");
			}
			else if(end_date < current_date){
				alert("<?php if (Lang::has(Session::get('lang_file').'.COUPON_DATE_EXPIRED')!= '') { echo  trans(Session::get('lang_file').'.COUPON_DATE_EXPIRED');}  else { echo trans($OUR_LANGUAGE.'.COUPON_DATE_EXPIRED');} ?>");
			}
			
			else
			{
					$.ajax({
					type: "POST",   
					url:"<?php echo url('ajax_coupon_submit'); ?>",
					data:{'coupon_code':coupon_code,'valid_coupon':valid_coupon,'product_id':product_id,'customer_id':customer_id,'type':type,'value':value,'product_dis_price':product_dis_price,'product_qty':product_qty,'pro_color':pro_color,'pro_size':pro_size,'type_of_coupon':type_of_coupon,'coupon_per_product':coupon_per_product,'coupon_per_user':coupon_per_user },
					success:function(response){
						//alert(response);
						if(response == 'Exist Price')
						{
							alert('<?php if (Lang::has(Session::get('lang_file').'.COUPON_EXCEEDS_PRODUCT_PURCHASE_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.COUPON_EXCEEDS_PRODUCT_PURCHASE_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.COUPON_EXCEEDS_PRODUCT_PURCHASE_AMOUNT');} ?>');
						}else if(response == 'Not Submit')
						{
							alert('<?php if (Lang::has(Session::get('lang_file').'.COUPON_CODE_ALREADY_EXIST')!= '') { echo  trans(Session::get('lang_file').'.COUPON_CODE_ALREADY_EXIST');}  else { echo trans($OUR_LANGUAGE.'.COUPON_CODE_ALREADY_EXIST');} ?>');
						}
						else if(response == 'Exist Limit')
						{
							alert('<?php if (Lang::has(Session::get('lang_file').'.ALL_COUPONS_ARE_PURCHASED')!= '') { echo  trans(Session::get('lang_file').'.ALL_COUPONS_ARE_PURCHASED');}  else { echo trans($OUR_LANGUAGE.'.ALL_COUPONS_ARE_PURCHASED');} ?>!');
						}
						else if(response == 'You Exist Limit')	
						{
							alert('<?php if (Lang::has(Session::get('lang_file').'.YOUR_COUPON_LIMIT_EXIT')!= '') { echo  trans(Session::get('lang_file').'.YOUR_COUPON_LIMIT_EXIT');}  else { echo trans($OUR_LANGUAGE.'.YOUR_COUPON_LIMIT_EXIT');} ?>!');
						}
						else if(response == 'Cannot Add Multiple Coupon same cart')
						{
							alert('<?php if (Lang::has(Session::get('lang_file').'.CANNOT_APPLY_MULTIPLE_PRODUCT_COUPON_IN_SAME_CART')!= '') { echo  trans(Session::get('lang_file').'.CANNOT_APPLY_MULTIPLE_PRODUCT_COUPON_IN_SAME_CART');}  else { echo trans($OUR_LANGUAGE.'.CANNOT_APPLY_MULTIPLE_PRODUCT_COUPON_IN_SAME_CART');} ?>');
						}
						var coupon = jQuery.parseJSON(response);
						//alert(duce.product_price);

						$('#item_coupon_price'+cart_id).html(coupon.product_price);
						$('#cart_id'+cart_id).html(coupon.couponid);
						
						$('#applyform'+cart_id).hide();
						$('#user_coupon').hide();
						$('#user_coupon1').hide();
						$('#cancelcoupon'+cart_id).show();
					}
				});
			}
			
		}

		function couponcancel(coupon_code,product_id,customer_id,pro_qty,product_dis_price,coupon_id,cart_id)
		{
			
			$.ajax({
					type: "POST",   
					url:"<?php echo url('ajax_coupon_delete'); ?>",
					data:{'coupon_code':coupon_code,'product_id':product_id,'customer_id':customer_id,'pro_qty':pro_qty,'product_dis_price':product_dis_price},
					success:function(response){
						var coupon_amount = jQuery.parseJSON(response);

						var cal_amount = coupon_amount.product_dis_price * coupon_amount.product_qty;
						$('#item_coupon_price'+cart_id).html(cal_amount);
						$('#cancelcoupon'+cart_id).hide();
						$('#applyform'+cart_id).show();
						$('#cart_id'+cart_id).val('');
						$('#user_coupon').show();
						$('#user_coupon1').show();
					}
				});
		}
    </script>
<script type="text/javascript">
	

	function couponCheck() {
    if (document.getElementById('user_coupon').checked) {
        document.getElementById('usertypeform').style.display = 'block';
        $('.producttypeform').hide();
        document.getElementById('amount_values').style.display = 'block';
    } 
    else if(document.getElementById('product_coupon').checked) {
        $('.producttypeform').show();
        document.getElementById('usertypeform').style.display = 'none';
       document.getElementById('amount_values').style.display = 'none';

        
   }
}
</script>
<script type="text/javascript">
	function usercouponCode(coupon_code,user_total_amount,customer_id)
		{
			//alert(coupon_code + customer_id);
			if(coupon_code=='')
			{
				er_msg ="<?php if (Lang::has(Session::get('lang_file').'.PLEASE_FILL_ALL_FIELDS')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_FILL_ALL_FIELDS');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_FILL_ALL_FIELDS');} ?>";
				$("#dev_userCouponError").css('display','block');
				$("#dev_userCouponError").html(er_msg);
				$("#dev_userCouponError").fadeOut(6000);
			}
			else
			{
				//alert(coupon_code+customer_id+user_total_amount);
					$.ajax({
					type: "GET",   
					url:"<?php echo url('ajax_usercoupon_submit'); ?>",
					data:{'coupon_code':coupon_code,'customer_id':customer_id,'user_total_amount':user_total_amount},
					success:function(response){
						// alert(response);

						if(response == 'Not Available') {
							er_msg  = '<?php if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_VALID_COUPON_CODE')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_ENTER_VALID_COUPON_CODE');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_ENTER_VALID_COUPON_CODE');} ?>';
							alert(er_msg);
							/*$("#dev_userCouponError").css('display','block');
							$("#dev_userCouponError").html(er_msg);
							$("#dev_userCouponError").fadeOut(6000);*/
						}
						else if(response == 'Not Available1') {
							er_msg = '<?php if (Lang::has(Session::get('lang_file').'.PLEASE_TRY_AGAIN_ITS_NOT_VALID_COUPON_CODE_APPLIED_FOR_YOU')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_TRY_AGAIN_ITS_NOT_VALID_COUPON_CODE_APPLIED_FOR_YOU');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_TRY_AGAIN_ITS_NOT_VALID_COUPON_CODE_APPLIED_FOR_YOU');} ?>';
							alert(er_msg);
							/*$("#dev_userCouponError").css('display','block');
							$("#dev_userCouponError").html(er_msg);
							$("#dev_userCouponError").fadeOut(6000);*/
						}
						else if(response =='Not Apply') {
							er_msg = '<?php if (Lang::has(Session::get('lang_file').'.NOT_HAVE_SUFFICIENT_CART')!= '') { echo  trans(Session::get('lang_file').'.NOT_HAVE_SUFFICIENT_CART');}  else { echo trans($OUR_LANGUAGE.'.NOT_HAVE_SUFFICIENT_CART');} ?>';
							alert(er_msg);
							/*$("#dev_userCouponError").css('display','block');
							$("#dev_userCouponError").html(er_msg);
							$("#dev_userCouponError").fadeOut(6000);*/
						}
						else if(response == 'Not Submit')
						{
							er_msg = '<?php if (Lang::has(Session::get('lang_file').'.COUPON_CODE_ALREADY_EXSIST')!= '') { echo  trans(Session::get('lang_file').'.COUPON_CODE_ALREADY_EXSIST');}  else { echo trans($OUR_LANGUAGE.'.COUPON_CODE_ALREADY_EXSIST');} ?>';
							alert(er_msg);
							/*$("#dev_userCouponError").css('display','block');
							$("#dev_userCouponError").html(er_msg);
							$("#dev_userCouponError").fadeOut(6000);*/
						}
						else if(response == 'Coupon Not Start')
						{
							er_msg = '<?php if (Lang::has(Session::get('lang_file').'.YOUR_COUPON_NOT_STARTED')!= '') { echo  trans(Session::get('lang_file').'.YOUR_COUPON_NOT_STARTED');}  else { echo trans($OUR_LANGUAGE.'.YOUR_COUPON_NOT_STARTED');} ?>';
							alert(er_msg);
							/*$("#dev_userCouponError").css('display','block');
							$("#dev_userCouponError").html(er_msg);
							$("#dev_userCouponError").fadeOut(6000);*/
						}
						else if(response == 'Date Expire')
						{
							er_msg ='<?php if (Lang::has(Session::get('lang_file').'.COUPON_DATE_EXPIRED')!= '') { echo  trans(Session::get('lang_file').'.COUPON_DATE_EXPIRED');}  else { echo trans($OUR_LANGUAGE.'.COUPON_DATE_EXPIRED');} ?>';
							alert(er_msg);
							/*$("#dev_userCouponError").css('display','block');
							$("#dev_userCouponError").html(er_msg);
							$("#dev_userCouponError").fadeOut(6000);*/
						}	

						var usercoupon = jQuery.parseJSON(response);
						//alert(duce.product_price);
						if(usercoupon.product_price < 0){
							$('#user_coupon_applied').html('0.00');
						}
						else{
							$('#user_coupon_applied').html(usercoupon.product_price);
						}
						
						//$('#cart_id'+cart_id).html(coupon.couponid);
						
						$('#usertypeform').hide();
						$('#product_coupon').hide();
						$('#product_coupon1').hide();
						$('#cancelusercoupon').show();
					}
				});
			}
			
		}
		function usercouponcancel(customer_id,user_total_amount)
		{
			$.ajax({
					type: "POST",   
					url:"<?php echo url('ajax_user_coupon_delete'); ?>",
					data:{'customer_id':customer_id,'user_total_amount':user_total_amount},
					success:function(response){
						var user_coupon_amount = jQuery.parseJSON(response);

						var user_cal_amount = user_coupon_amount.user_total_amount;
						$('#user_coupon_applied').html(user_cal_amount);
						$('#cancelusercoupon').hide();
						$('#usertypeform').show();
						$('#product_coupon').show();
						$('#product_coupon1').show();
						
					}
				});
		}
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    </script>
<script type="text/javascript">
// 	$(function() {
// 	$("input[type=\"radio\"]").click(function(){
// 		var thisElem = $(this);
// 		var value = thisElem.val();
//         $(".box").hide();
// 		$("."+value).show();
// 		//localStorage:
// 		localStorage.setItem("option", value);
// 		//Cookies:
// 		//document.cookie="option="+value;
//     });
// 	//localStorage:
// 	var itemValue = localStorage.getItem("option");
// 	if (itemValue !== null) {
// 		$("input[value=\""+itemValue+"\"]").click();
// 	}
   
// });
</script>
<!-- 	<script type="text/javascript">
		$('#reg-form').submit(function(e){

	var coupon = $("#text_coupon").val();
	
	var valid_coupon = $("#valid_coupon").val();
		
    
	e.preventDefault(); 
    $.ajax({
	url: '<?php //echo url('ajax_coupon_store'); ?>',
	type: 'POST',
	data: $(this).serialize(), 
        dataType: 'html'
    })
    .done(function(data){
	    $('#form-content').fadeOut('slow', function(){
	         $('#form-content').fadeIn('slow').html(data);
        });
    })
    .fail(function(){
	alert('Ajax Submit Failed ...');	
    });
});
	</script> -->


    <script type="text/javascript">

    $.ajaxSetup({

        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }

    });

	</script>



</body>







</html>



