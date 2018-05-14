

<link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/css/new_css.css" />
<?php 
if(!isset($_SESSION['compare_product'])&&(!isset($_SESSION['sub_cat_id']))){
$_SESSION['compare_product']=array();
$_SESSION['sub_cat_id']      = array();
} 

?>
<div  id="">
<div id="mainBody">
	<div class="container">
	@if(Session::has('wish'))
	<p class="alert {!! Session::get('alert-class', 'alert-success') !!}">{!! Session::get('wish') !!}</p>
	@endif
	<div class="row" id="prdblpg">
<!-- Sidebar ================================================== -->
	<div class="span3 customCategories products" id="sidebar">
		<div class="side-menu-head"><strong><?php if (Lang::has(Session::get('lang_file').'.CATEGORIES')!= '') { echo  trans(Session::get('lang_file').'.CATEGORIES');}  else { echo trans($OUR_LANGUAGE.'.CATEGORIES');} ?> </strong></div>
			<ul id="css3menu1" class="topmenu">
			<input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>


@if(count($product_details) != 0)
@if($maincategory_id=='')
 @php $i=1;  @endphp
@if(count($main_category)>0)

	@foreach($main_category as $fetch_main_cat)
	 
	@php $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; @endphp
		@if($i<=20)
		
					
			
			@if(count($sub_main_category[$fetch_main_cat->mc_id])> 0)
		
			<li class="topfirst"><a href="{{ url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1) }}">
				@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
					@php  $mc_name = 'mc_name'; @endphp
				@else @php  $mc_name = 'mc_name_'.Session::get('lang_code'); @endphp @endif
			{{ $fetch_main_cat->$mc_name }}</a> <b class="OpenCat" onclick="">+</b>
			<ul>
				
				@foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)
				
				@php	$pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; @endphp
					
					<li class="subfirst"><a href="{{ url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2) }}">
						@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
						@php  $smc_name = 'smc_name'; @endphp
						@else @php  $smc_name = 'smc_name_'.Session::get('lang_code'); @endphp @endif
					{{  $fetch_sub_main_cat->$smc_name }} </a> <b class="OpenCat" onclick="">+</b>
					
					
					
						@if(count($second_main_category[$fetch_sub_main_cat->smc_id])> 0)
						
						
						<ul>
							
							@foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat)
							
							@php	$pass_cat_id3 = "3,".$fetch_sub_cat->sb_id; @endphp
							
							<li class="subsecond"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>">
								@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
								@php $sb_name = 'sb_name'; @endphp
								@else @php  $sb_name = 'sb_name_'.Session::get('lang_code'); @endphp @endif
							{{ $fetch_sub_cat->$sb_name }} </a>
							
							@if(count($second_sub_main_category[$fetch_sub_cat->sb_id])> 0)
							
							
							<ul>
							
								@foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat)  
							@php $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; @endphp
								                        
									<li class="subthird"><a href="{{ url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4) }}"> 
									@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
									@php $ssb_name = 'ssb_name'; @endphp
									@else @php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); @endphp @endif
									{{ $fetch_secsub_cat->$ssb_name }}</a></li>                                        
								
								@endforeach
								
							</ul>
							
							@endif
							
							</li>
							
							@endforeach 
							
						</ul>
						
						@endif
				@endforeach 
				
			</ul>
			 
		@endif @endif
	@endforeach @php $i++; @endphp
@endif
	
		

@else	
 @php $get_listby_id   = explode(",", $category_id); @endphp <!-- //category id -->
		@if ($get_listby_id[0] == 1)
         @php   $mc_id =  DB::table('nm_maincategory')->where('mc_id', '=', $get_listby_id[1])->value('mc_id');
            
			$i=1; @endphp
	@if(count($mc_id)>0)
	
		@php $pass_cat_id1 = "1,".$mc_id; @endphp <!-- //topcategory -->
		@if($i<=20)
		

			@if(count($sub_main_category[$mc_id])> 0)
			
			
				@foreach($sub_main_category[$mc_id] as $fetch_sub_main_cat)
				
				@php $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; @endphp	<!-- //maincategory -->
					
					<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"> 
					@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
					@php	  $smc_name = 'smc_name'; @endphp
					@else @php  $smc_name = 'smc_name_'.Session::get('lang_code'); @endphp @endif
					{{ $fetch_sub_main_cat->$smc_name }}</a> <b class="OpenCat" onclick="">+</b>
					
					
					
					@if(count($second_main_category[$fetch_sub_main_cat->smc_id])> 0)

						
						<ul>
							 
							@foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat)
							
							@php $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id; @endphp
							
							<li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>"> 
					@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
					@php  $sb_name = 'sb_name'; @endphp
					@else @php  $sb_name = 'sb_name_'.Session::get('lang_code'); @endphp @endif
							{{ $fetch_sub_cat->$sb_name }} </a><b class="OpenCat" onclick="">+</b>
							
							@if(count($second_sub_main_category[$fetch_sub_cat->sb_id])> 0)
							
						
							<ul>
								
								@foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat)  
							@php	$pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; @endphp
								                       
									<li class="subsecond"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>"> 
					@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
					@php  $ssb_name = 'ssb_name'; @endphp
					@else @php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); @endphp @endif
									{{ $fetch_secsub_cat->$ssb_name }}</a></li>                                        
								
								@endforeach 
							
							</ul>
							
							@endif
						
							</li>
							
							@endforeach
						
						</ul>
						
						@endif
					@endforeach
				
			
			 
		@endif
	@endif @php $i++; @endphp

@endif
<li class="topfirst"><a href="{{ url('products') }}"><b> << Back </b></a> <b class="OpenCat" onclick="">+</b>

         @elseif ($get_listby_id[0] == 2)
        @php   $mc_id =   DB::table('nm_secmaincategory')->select('smc_id','smc_mc_id')->where('smc_id', '=', $get_listby_id[1])->get(); @endphp
	
@php $i=1; @endphp 
	@if(count($mc_id)>0)
@php	$smc_id = $mc_id[0]->smc_id;	
	  $mc_id = $mc_id[0]->smc_mc_id;	

		$pass_cat_id1 = "1,".$mc_id; @endphp 
		@if($i<=20)
		

			
			
				@php $pass_cat_id2 = "2,".$smc_id; @endphp	<!-- //maincategory -->
					
					
					
					
						@if(count($second_main_category[$smc_id])> 0)
						
						
							
							@foreach($second_main_category[$smc_id] as $fetch_sub_cat)
							
							@php $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id; @endphp
							
							<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>">
				@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
					@php  $sb_name = 'sb_name'; @endphp
					@else @php  $sb_name = 'sb_name_'.Session::get('lang_code'); @endphp @endif
							{{ $fetch_sub_cat->$sb_name }} </a><b class="OpenCat" onclick="">+</b>
						
							@if(count($second_sub_main_category[$fetch_sub_cat->sb_id])> 0)
							
							
							<ul>
								
								@foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat)  
							@php $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; @endphp
								                        
									<li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>"> 
					@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
					@php  $ssb_name = 'ssb_name'; @endphp
					@else @php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); @endphp @endif
									{{ $fetch_secsub_cat->$ssb_name }}</a></li>                                        
								
								@endforeach 
								
							</ul>
							
							@endif
							
							</li>
							
							@endforeach 
							
						
						
						@endif
				
				
			
			 
		
	@endif @php $i++; @endphp

@endif
<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1); ?>"><b> << Back </b></a> <b class="OpenCat" onclick="">+</b>

@elseif ($get_listby_id[0] == 3)
   @php   $sb_smc_id = DB::table('nm_subcategory')->select('sb_id','sb_smc_id','mc_id')->where('sb_id', '=', $get_listby_id[1])->get();

	$i=1; @endphp
	@if(count($sb_smc_id)!=0)
		
	@php  $smc_id = $sb_smc_id[0]->sb_smc_id;  
	  $mc_id = $sb_smc_id[0]->mc_id;	
	  $sb_id = $sb_smc_id[0]->sb_id; @endphp
		
		@if($i<=20)
		
 				@php	$pass_cat_id2 = "2,".$smc_id;	
						  	 $pass_cat_id3 = "3,".$sb_id; @endphp
				
					@if(count($second_sub_main_category[$sb_id])> 0)
						@foreach($second_sub_main_category[$sb_id] as $fetch_secsub_cat)  
							@php	$pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?> @endphp
								<li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>">
					@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
						@php  $ssb_name = 'ssb_name';@endphp
					@else @php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); @endphp @endif
								{{ $fetch_secsub_cat->$ssb_name }}</a></li>                                        
						
						@endforeach 
					@endif
	@endif @php $i++; @endphp

@endif
<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"><b> << Back </b></a> <b class="OpenCat" onclick="">+</b>
        
@elseif ($get_listby_id[0] == 4) 
      @php    $sb_id =  DB::table('nm_secsubcategory')->select('ssb_sb_id','mc_id','ssb_smc_id')->where('ssb_id', '=', $get_listby_id[1])->get();
			
			
	$i=1; @endphp
	@if(count($sb_id)!=0)
		@php $ssb_sb_id = $sb_id[0]->ssb_sb_id;	
		 $ssb_smc_id = $sb_id[0]->ssb_smc_id;	
	  	 $mc_id = $sb_id[0]->mc_id; @endphp
		  @if($i<=20)
		 
						@php  	 $pass_cat_id3 = "3,".$ssb_sb_id; @endphp
				
					@if(count($second_sub_main_category[$ssb_sb_id])> 0)
						@foreach($second_sub_main_category[$ssb_sb_id] as $fetch_secsub_cat)  
							@php	$pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; @endphp
								<li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>"> 
					@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
						@php  $ssb_name = 'ssb_name'; @endphp
					@else @php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); @endphp @endif
								{{ $fetch_secsub_cat->ssb_name }}</a></li>                                        
						
						@endforeach 
					@endif
				
		@endif
	@endif 
	@php $i++; @endphp

<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>"><b> << Back </b></a> <b class="OpenCat" onclick="">+</b>
		
 
 @else
 <li class="subfirst"><a href=""><?php if (Lang::has(Session::get('lang_file').'.NO_CATEGORY_FOUND')!= '') { echo  trans(Session::get('lang_file').'.NO_CATEGORY_FOUND');}  else { echo trans($OUR_LANGUAGE.'.NO_CATEGORY_FOUND');} ?></a></li>  @endif


@endif @endif<!-- //else of main cat -->
</ul>
		<br>
		  <div class="clearfix"></div>
		<br/>
        @php
		$discount_filter=array();
		$filters_color=array();
		$size_filter=array(); @endphp
		@if(isset($_GET["filter_color"]))
		
		@php	$filter_color=base64_decode($_GET["filter_color"]);
			$filters_color=explode(",",$filter_color); @endphp
		@endif
		@if(isset($_GET["filter_discount"]))
		
		@php	$filter_discount=base64_decode($_GET["filter_discount"]);
			$discount_filter=explode(",",$filter_discount); @endphp
		@endif
		@if(isset($_GET["filters_size"]))
		
		@php	$filters_size=base64_decode($_GET["filters_size"]);
			$size_filter=explode(",",$filters_size); @endphp
		@endif
					
		@if(count($specification)>0 AND count($specification_values)>0)
		
						 
				@if(isset($_GET["filter"]))
				
				@php	$filtered_item=base64_decode($_GET["filter"]);
					$filters=explode(",",$filtered_item); @endphp
				
				@else
				@php $filters=array(); @endphp
				@endif
			
			<div class="side-menu-head" style="margin-top:10px;"><strong>Filter</strong></div>
			<form name="filter_form">
			
			
			@foreach($specification as $specification_det)
			
		
				<label style="margin:10px 0px;font-size:16px;font-weight:500px; color:#d82672;">{{ $specification_det->spg_name }}</label>
			
				@foreach($specification_values as $specification_val)
				
					@if($specification_val->sp_spg_id==$specification_det->spg_id)
					
			
						<div class="checkbox"><input type="checkbox" id="checkbox-sep{{ $specification_val->sp_id }}" name="filter_by" value="{{ $specification_val->sp_id }}" <?php if(in_array($specification_val->sp_id,$filters)){echo "checked";} ?> onclick="javascript:make_filter()"> <label for="checkbox-sep<?php echo $specification_val->sp_id; ?>"></label> <span style="margin-left:15px; vertical-align: top;">{{ $specification_val->sp_name }}</span></div>
			
					@endif
				@endforeach
		@endforeach
			
			</form>
			@if(isset($_GET["filter"]) AND $_GET["filter"]!="")
			<p class="btn btn-danger" onclick="javascript:clear_filter('filter_for_values')">Clear All</p>
			
			@endif 
		@endif
		@if(Request::segment(1)=="catproducts")
		<br>
		  <div class="clearfix"></div>
		<br/>
			 
			@php	$filtered_item="";
				$price_from="";
				$price_to="";
				$filter_discount="";
				$filter_size=""; @endphp
				@if(isset($_GET["filter"]))
				
				@php	$filtered_item=$_GET["filter"];
					$price_from=$_GET["price_from"];
					$price_to=$_GET["price_to"];
					$filter_color=$_GET["filter_color"];
					$filter_size=$_GET["filters_size"];
					$filter_discount=$_GET["filter_discount"]; @endphp
				@endif
				
			
			
			@if(count($color_filter_values)>0)
			
			
			<div class="side-menu-head" style="margin-top:10px;"><strong>Color Filter</strong></div>
			<div style="box-shadow: 0 4px 17px 0 rgba(0,0,0,0.1); padding-bottom: 5px;" class="filter-height">
			
				@foreach($color_filter_values as $colrs)
				
			
					<div class="checkbox">
					<input type="checkbox" id="checkbox{{ $colrs->co_id }}" onclick="javascript:make_filter()" name="color" value="<?php echo $colrs->co_id; ?>" <?php if(in_array($colrs->co_id,$filters_color)){echo "checked";} ?>> <label for="checkbox{{ $colrs->co_id }}"></label><span class="color-box" style="background:{{ $colrs->co_code }}; margin-left: 15px; margin-top: 3px;"></span> <span style="margin-left: 10px; vertical-align: top;">{{ $colrs->co_name }}</span>
					</div>
			
				@endforeach
			
				
			</div>
			@if(isset($_GET["filter_color"]) AND $_GET["filter_color"]!="")
				<p class="btn btn-danger fil-clear" onclick="javascript:clear_filter('filter_items_by_color_values')">Clear All</p>
				
				@endif
			

			
			@endif
			
			@if(count($size_filter_values)>0)
			
			
			<div class="side-menu-head" style="margin-top:10px;"><strong>Size Filter</strong></div>
			<div style="box-shadow: 0 4px 17px 0 rgba(0,0,0,0.1); padding-bottom: 5px;" class="filter-height"">
			
			@foreach($size_filter_values as $sizes)
				
			
					<div class="checkbox">
						<input type="checkbox" id="checkbox-size{{ $sizes->si_id }}" onclick="javascript:make_filter()" name="size" value="<?php echo $sizes->si_id; ?>" <?php if(in_array($sizes->si_id,$size_filter)){echo "checked";} ?>> <label for="checkbox-size{{ $sizes->si_id }}"></label><span style="margin-left:15px; vertical-align: top;">{{ $sizes->si_name }}</span>
					</div>
			
				@endforeach
			
				
			</div>
			@if(isset($_GET["filters_size"]) AND $_GET["filters_size"]!="")
				<p class="btn btn-danger fil-clear" onclick="javascript:clear_filter('filter_items_by_size_values')">Clear All</p>
				
				@endif
		
			@endif
			<div class="side-menu-head" style="margin-top:10px; margin-bottom:10px;"><strong>Discount</strong></div>
			
			@php	$label=""; @endphp
				@for($i=1;$i<=6;$i++)
				
					@if($i==1)
					@php	$label="Upto 10%"; @endphp @endif
					@if($i==2)
					@php	$label="10% - 20%"; @endphp @endif
					@if($i==3)
					@php	$label="20% - 30%"; @endphp @endif
					@if($i==4)
					@php	$label="30% - 40%"; @endphp @endif
					@if($i==5)
					@php	$label="40% - 50%"; @endphp @endif
					@if($i==6)
					@php	$label="50% And Above"; @endphp @endif
			
			<label style=" margin-left:25px;">
				<input type="radio" name="discount_filter" value="{{ $i }}" <?php if(in_array($i,$discount_filter)){echo "checked";} ?> onclick="javascript:make_filter()"> 
				{{ $label }}
			</label>
			
				@endfor
			
			@if(isset($_GET["filter_discount"]) AND $_GET["filter_discount"]!="")
				<p class="btn btn-danger" onclick="javascript:clear_filter('filter_for_values_discount')">Clear All</p>
			
				@endif
			
			
			<div class="side-menu-head" style="margin-top:10px; margin-bottom:10px;"><strong>Price Filter</strong></div>
			<div class="price-filter pdct_prclst">
			<?php //Price vary for different products.customize using min and max value
				/*$label="";
				for($i=1;$i<=6;$i++)
				{
					if($i==1)
						$label="0-1000";
					if($i==2)
						$label="1000-2000";
					if($i==3)
						$label="2000-3000";
					if($i==4)
						$label="3000-4000";
					if($i==5)
						$label="4000-5000";
					if($i==6)
						$label="5000-10000";
			?>
			<label class="radio inline">
				<input type="radio" name="radio_price_filter" <?php if($price_from."-".$price_to==$label) echo"checked"; ?> value="<?php echo $label; ?>" onclick="javascript:make_filter()"> 
				<span><?php echo " Rs. ".$label; ?></span>
			</label>
			<?php
				}*/
			?>
				<form name="filter_form_to_generate" id="filter_form" method="get">
					{{ Form::hidden('filter',$filtered_item,array('id'=>'filter_for_values'))}}
					{{ Form::hidden('filter_discount',$filter_discount,array('id'=>'filter_for_values_discount'))}}
					<!-- <input type="hidden" name="filter" value="{{ $filtered_item }}" id="filter_for_values"> -->
					<!-- <input type="hidden" name="filter_discount" value="<?php echo $filter_discount; ?>" id="filter_for_values_discount"> -->
					<input type="hidden" name="filter_color" value="<?php if(isset($_GET["filter_color"])){echo $_GET["filter_color"];} ?>" id="filter_items_by_color_values">
					<input type="hidden" name="filters_size" value="<?php if(isset($_GET["filters_size"])){echo $_GET["filters_size"];} ?>" id="filter_items_by_size_values">
					
                    <div class="min_max_div">
                    <div  class="price-fil-max"><span style="color:#d82672;">Min</span><input type="number"  placeholder="100" name="price_from" id="price_from" value="<?php echo $price_from; ?>" /></div>
					<div class="price-fil-min"><span style="color:#d82672;">Max</span><input type="number" placeholder="10000" name="price_to" id="price_to" value="{{ $price_to }}" /> </div>
					<div style="" class="price-go"><p onclick="javacript:make_filter();">Go!</p></div>
					
					@if($price_from !="" && $price_to !="") <!-- //Clear all for discount price -->
					
				
						<p class="btn btn-danger" onclick="javascript:clear_discount_filter('price_from','price_to')">Clear All</p> 
			@endif
				
					
					
					
					</div>
					
					<!--<input type="hidden" name="from" value="<?php // echo Request::segment(3); ?>">-->
				</form>
			</div>
		 
		@endif		
		
		<br>
		  <div class="clearfix"></div>
		<br/>
        @if(count($most_visited_product)>0)  
        <div class="side-menu-head"><strong>@if (Lang::has(Session::get('lang_file').'.MOST_VISITED_PRODUCTS')!= '') {{  trans(Session::get('lang_file').'.MOST_VISITED_PRODUCTS') }} @else {{ trans($OUR_LANGUAGE.'.MOST_VISITED_PRODUCTS') }} @endif</strong></div>
          @foreach($most_visited_product as $fetch_most_visit_pro) 
          	@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
					@php  $title = 'pro_title'; @endphp
			@else @php  $title = 'pro_title_'.Session::get('lang_code'); @endphp @endif

			@php $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;
			 $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);
			 $mostproduct_img 	= explode('/**/', $fetch_most_visit_pro->pro_Img);

			 $product_image 	= $mostproduct_img[0];
			 
			$prod_path 	= url('').'/public/assets/default_image/No_image_product.png';
			$img_data 	= "public/assets/product/".$product_image; @endphp
			
			@if(file_exists($img_data) && $product_image!='' )	
			 
			
		@php	$prod_path = url('').'/public/assets/product/' .$product_image;	@endphp				
			@else	
				@if(isset($DynamicNoImage['productImg'])) 
				
			@php		$dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['productImg']; @endphp
					@if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)) 
					@php	$prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
				@endif
			@endif	
			
		@php	$alt_text  	= substr($fetch_most_visit_pro->$title,0,25);
			$alt_text  .= strlen($fetch_most_visit_pro->$title)>25?'..':''; @endphp


			  @if($fetch_most_visit_pro->pro_no_of_purchase < $fetch_most_visit_pro->pro_qty) 
			 	
          <div class="thumbnail" style="border:none height:100px; width:100 px ">
		  
		    @if($fetch_most_visit_pro->pro_discount_percentage!='' && round($fetch_most_visit_pro->pro_discount_percentage)!=0)
				<i class="tag">{{ substr($fetch_most_visit_pro->pro_discount_percentage,0,2) }}%</i> @endif
			
			<img  src="{{ $prod_path }}" alt="{{ $alt_text }}" style="height:100px; width:100px;">
				
				
				
			<div class="caption product_show">
			<p class="prev_text">{{substr($fetch_most_visit_pro->$title,0,25) }}
				{{  strlen($fetch_most_visit_pro->$title)>25?'..':'' }}
			</p>
				<p class="top_text dolor_text">{{ Helper::cur_sym() }} {{ $fetch_most_visit_pro->pro_disprice }}</p>
					  
                      @if($fetch_most_visit_pro->pro_no_of_purchase >= $fetch_most_visit_pro->pro_qty) 
                      <h4 style="text-align:center;"><a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{  trans(Session::get('lang_file').'.SOLD') }} @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a> 
                       @else   
						@php  $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name)); 
             $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
			 $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
			  $res = base64_encode($fetch_most_visit_pro->pro_id); @endphp
			  <!-- <a class="btn btn-warning" href="{!! url('productview').'/'.$fetch_most_visit_pro->pro_id!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a> -->
					 </h4>
					
								
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
								
<?php /*
<div class="product-info-price">
					 
					 <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
<a class="btn align_brn" href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
 <a class="btn align_brn" href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
 <a class="btn align_brn" href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') { ?>
 <a class="btn align_brn" href="<?php echo url('productview/'.$mcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
</div>*/?>
					

								

							
                     @endif
					</div>
		  </div>
			 @endif @endforeach  @endif
		
	</div>
<!-- Sidebar end=============================================== -->
	<div id="demo" class="box jplist jplist-grid-view span9 tab-land-wid customProductListing" style="margin-left:0px;background:white">
						
							<!-- ios button: show/hide panel -->
							<div class="jplist-ios-button">
								<i class="fa fa-sort"></i>
								@if (Lang::has(Session::get('lang_file').'.MORE_FILTERS')!= '') {{ trans(Session::get('lang_file').'.MORE_FILTERS') }} @else {{ trans($OUR_LANGUAGE.'.MORE_FILTERS') }} @endif
							</div>
							
							<!-- panel -->
	<div class="jplist-panel box panel-top" id="jplibox">						

	<!-- reset button -->
	<button type="button" class="jplist-reset-btn" data-control-type="reset" data-control-name="reset" data-control-action="reset">
	@if (Lang::has(Session::get('lang_file').'.RESET')!= '') {{ trans(Session::get('lang_file').'.RESET') }} @else {{ trans($OUR_LANGUAGE.'.RESET') }} @endif &nbsp;<i class="fa fa-share"></i>
	</button>

	<div class="jplist-drop-down" data-control-type="drop-down" data-control-name="paging" data-control-action="paging"><div class="jplist-dd-panel"> 10 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{  trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif </div>
	<ul style="display: none;">
	<li class=""><span data-number="6"> 6 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{  trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif </span></li>
	<li class="active"><span data-number="12" data-default="true"> 12 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{  trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif </span></li>
	<li><span data-number="18"> 18 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{  trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif </span></li>
	<li><span data-number="all">@if (Lang::has(Session::get('lang_file').'.VIEW_ALL')!= '') {{  trans(Session::get('lang_file').'.VIEW_ALL') }} @else {{ trans($OUR_LANGUAGE.'.VIEW_ALL') }} @endif </span></li>
	</ul>
	</div>

	<div class="jplist-drop-down" data-control-type="drop-down" data-control-name="sort" data-control-action="sort"><div class="jplist-dd-panel">@if (Lang::has(Session::get('lang_file').'.LIKES_ASC')!= '') {{  trans(Session::get('lang_file').'.LIKES_ASC') }} @else {{ trans($OUR_LANGUAGE.'.LIKES_ASC') }} @endif</div>
	<ul style="display: none;">
	<li class=""><span data-path="default">@if (Lang::has(Session::get('lang_file').'.SORT_BY')!= '') {{  trans(Session::get('lang_file').'.SORT_BY') }} @else {{ trans($OUR_LANGUAGE.'.SORT_BY') }} @endif</span></li>
	<li class="active"><span data-path=".like" data-order="asc" data-type="number" data-default="true">@if (Lang::has(Session::get('lang_file').'.PRICE_LOW')!= '') {{  trans(Session::get('lang_file').'.PRICE_LOW') }} @else {{ trans($OUR_LANGUAGE.'.PRICE_LOW') }} @endif - @if (Lang::has(Session::get('lang_file').'.HIGH')!= '') {{  trans(Session::get('lang_file').'.HIGH') }} @else {{ trans($OUR_LANGUAGE.'.HIGH') }} @endif</span></li>
	<li><span data-path=".like" data-order="desc" data-type="number">@if (Lang::has(Session::get('lang_file').'.PRICE_HIGH')!= '') {{  trans(Session::get('lang_file').'.PRICE_HIGH') }} @else {{ trans($OUR_LANGUAGE.'.PRICE_HIGH') }} @endif -@if (Lang::has(Session::get('lang_file').'.LOW')!= '') {{  trans(Session::get('lang_file').'.LOW') }} @else {{ trans($OUR_LANGUAGE.'.LOW') }} @endif</span></li>
	<li><span data-path=".title" data-order="asc" data-type="text">@if (Lang::has(Session::get('lang_file').'.TITLE')!= '') {{  trans(Session::get('lang_file').'.TITLE') }} @else {{ trans($OUR_LANGUAGE.'.TITLE') }} @endif	@if (Lang::has(Session::get('lang_file').'.A')!= '') {{ trans(Session::get('lang_file').'.A') }} @else {{ trans($OUR_LANGUAGE.'.A') }} @endif -@if (Lang::has(Session::get('lang_file').'.Z')!= '') {{  trans(Session::get('lang_file').'.Z') }} @else {{ trans($OUR_LANGUAGE.'.Z') }} @endif</span></li>
	<li><span data-path=".title" data-order="desc" data-type="text">@if (Lang::has(Session::get('lang_file').'.TITLE')!= '') {{ trans(Session::get('lang_file').'.TITLE') }} @else {{ trans($OUR_LANGUAGE.'.TITLE') }} @endif @if (Lang::has(Session::get('lang_file').'.Z')!= '') {{  trans(Session::get('lang_file').'.Z') }} @else {{ trans($OUR_LANGUAGE.'.Z') }} @endif-@if (Lang::has(Session::get('lang_file').'.A')!= '') {{  trans(Session::get('lang_file').'.A') }} @else {{ trans($OUR_LANGUAGE.'.A') }} @endif</span></li>
	</ul>
	</div>

	<!-- filter by title -->
	<?php /*<div class="text-filter-box">

	<!-- <i class="fa fa-search  jplist-icon"></i> -->
	<input data-path=".title" value="" placeholder="<?php if (Lang::has(Session::get('lang_file').'.FILTER_BY_TITLE')!= '') { echo  trans(Session::get('lang_file').'.FILTER_BY_TITLE');}  else { echo trans($OUR_LANGUAGE.'.FILTER_BY_TITLE');} ?>" data-control-type="textbox" data-control-name="title-filter" data-control-action="filter" type="text" class="filt">
	</div>
*/?>
	<!-- filter by description -->


	<!-- views -->
	<div 
	class="jplist-views" 
	data-control-type="views" 
	data-control-name="views" 
	data-control-action="views"
	data-default="jplist-grid-view" style="visibility:hidden;">
        {{ Form::button('',array('class'=>'jplist-view jplist-list-view','data-type'=>'jplist-list-view')) }}
	<!-- <button type="button" class="jplist-view jplist-list-view" data-type="jplist-list-view"></button> -->
{{ Form::button('',array('class'=>'jplist-view jplist-grid-view','data-type'=>'jplist-grid-view')) }}
	<!-- <button type="button" class="jplist-view jplist-grid-view" data-type="jplist-grid-view"></button> -->
	{{ Form::button('',array('class'=>'jplist-view jplist-thumbs-view','data-type'=>'jplist-thumbs-view')) }}
	<!-- <button type="button" class="jplist-view jplist-thumbs-view" data-type="jplist-thumbs-view"></button> -->
	</div>	

	<!-- pagination results -->
	<div 
	class="jplist-label" 
	data-type="Page {current} of {pages}" 
	data-control-type="pagination-info" 
	data-control-name="paging" 
	data-control-action="paging" style="visibility:hidden;">
	</div>

	<!-- pagination control -->


	<!-- pagination results -->

	</div>

					<div id="comp_myprod" class="ui-group-buttons">

							<span class="compare_product_fixedbtn btn">
			<a href="{!! url('compare_products') !!}" target="_blank">@if (Lang::has(Session::get('lang_file').'.COMPARE')!= '') {{  trans(Session::get('lang_file').'.COMPARE') }} @else {{ trans($OUR_LANGUAGE.'.COMPARE') }} @endif
			
		<?php	echo ' <span>'.$count = count($_SESSION['compare_product']); ?> </a>
							</span>

							@if($count > 0)

							<div class="or"></div>

							<span class="compare_product_fixedbtn btn"><a href="{!! url('clear_compare') !!}">@if (Lang::has(Session::get('lang_file').'.CLEAR_LIST')!= '') {{  trans(Session::get('lang_file').'.CLEAR_LIST') }} @else {{ trans($OUR_LANGUAGE.'.CLEAR_LIST') }} @endif</a></span>

								@endif

					</div>
		
	<div class="view">

		<div class="list"  id="pdpgli">	
			<section class="">	
								
				
				
				 @if(count($product_details) != 0) 
					@foreach($product_details as $product_det) 
				
			@php	$mcat 		= strtolower(str_replace(' ','-',$product_det->mc_name));
				$smcat 		= strtolower(str_replace(' ','-',$product_det->smc_name));
				$sbcat 		= strtolower(str_replace(' ','-',$product_det->sb_name));
				$ssbcat 	= strtolower(str_replace(' ','-',$product_det->ssb_name)); 
				$res 		= base64_encode($product_det->pro_id);
				$product_image 			= explode('/**/',$product_det->pro_Img);
				$product_saving_price 	= $product_det->pro_price - $product_det->pro_disprice;
				$product_discount_percentage = round(($product_saving_price/ $product_det->pro_price)*100,2); @endphp
				@if($product_det->pro_no_of_purchase < $product_det->pro_qty)   
					

					@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
					@php  $title = 'pro_title'; @endphp
					@else @php  $title = 'pro_title_'.Session::get('lang_code'); @endphp @endif

				@php	 $product_image 	= $product_image[0];
					 
					$prod_path 	= url('').'/public/assets/default_image/No_image_product.png';
					$img_data 	= "public/assets/product/".$product_image; @endphp
					
					@if(file_exists($img_data) && $product_image !='')	
					
					
				@php	$prod_path = url('').'/public/assets/product/'.$product_image;	@endphp				
					@else	
					
						@if(isset($DynamicNoImage['productImg']))  
						  
						@php	$dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['productImg']; @endphp
							@if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))
							@php	$prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
						@endif
					@endif	
					
				@php	$alt_text  	= substr($product_det->$title,0,25);
					$alt_text  .= strlen($product_det->$title)>25?'..':''; @endphp
						

			<!-- item 1 -->
		
				<div class="list-item product productListing"  id="pdpg">		

				<!-- img -->
					<div class="product__info">
					 @if($product_det->pro_discount_percentage!='' && round($product_det->pro_discount_percentage)!=0)
						<i class="tag">{{ substr($product_det->pro_discount_percentage,0,2) }}%</i>@endif
						<div class="img productViewCenter">
							@if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
							<a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><img class="product__image" style="height: 100px;
    width: 100;" src="{{ $prod_path }}" alt="{{ $alt_text }}" title=""/></a>
							@endif
							@if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
							<a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" ><img class="product__image" style="height: 100px;
    width: 100;" alt="" src="{{ $prod_path }}"></a>
							@endif
							@if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
							<a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" ><img class="product__image"  style="height: 100px;
    width: 100;" alt="{{ $alt_text }}" src="{{ $prod_path }}"></a>

							@endif
							
							@if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
							<a href="{!! url('productview').'/'.$mcat.'/'.$res!!}" ><img class="product__image"  style="height: 100px;
    width: 100;" alt="{{ $alt_text }}" src="{{ $prod_path }}"></a>

							@endif
						</div>

					</div>					<!-- data -->
				<div class="block">

					<p class="title product__title tab-title">
						{{ substr($product_det->$title,0,25) }}
						{{  strlen($product_det->$title)>25?'..':'' }}
					</p>
					<p class="like product__price">{{ Helper::cur_sym() }} {{ $product_det->pro_disprice }}</p>
					@if($product_det->pro_no_of_purchase >= $product_det->pro_qty) 
					<h4 style="text-align:center;"><a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{ trans(Session::get('lang_file').'.SOLD') }} @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a> 
					@else  </h4>

				</div>
				@if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')  
				<a href="{{ url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res)}}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
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
				

				<div id="reload">
				

				@if(($compare==0)&&($maincategory_id!='')) 
				@if(in_array($product_det->pro_id, $_SESSION['compare_product']))  
				<button onclick="comparefunc(<?php echo $product_det->pro_id.','.'0'.','.$maincategory_id; ?>);" value="0" name="compare" id="compare" class="compare_prod" data-tooltip="Added in Compare">
				<i class="fa fa-check"></i>
				</button>
				 @else 
				<button onclick="comparefunc(<?php echo $product_det->pro_id.','.'1'.','.$maincategory_id; ?>);" value="1" name="compare" id="compare" class="compare_prod" data-tooltip="Add to Compare" >
				<i class="fa fa-plus"></i>
				</button>	
				@endif
				@endif	
				</div>			
				@endif 							



				
				@endif
				@endforeach
				
				@elseif(count($product_details) == 0)
				 
				

				<div class="jplist-no-results text-shadow align-center">
				<p style="color: rgb(54, 160, 222); float: left; clear: both; margin-left: 30%; margin-top: 10%;
				margin-bottom: 10%; font-size: 18px;">@if (Lang::has(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')!= '') {{ trans(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE') }} @else {{ trans($OUR_LANGUAGE.'.NO_PRODUCTS_AVAILABLE') }} @endif</p>						</div>
				
				@endif
			
				</div>
			</section>
		<!--</div>
	</div>-->



	<!--//////////////////////////////////////////////////  -->
	<!-- Main view -->

	<!-- Product grid -->


	<!-- data -->   




	<!-- ios button: show/hide panel -->
	<!-- <div class="jplist-ios-button">
	<i class="fa fa-sort"></i>
	@if (Lang::has(Session::get('lang_file').'.MORE_FILTERS')!= '') {{  trans(Session::get('lang_file').'.MORE_FILTERS') }} @else {{ trans($OUR_LANGUAGE.'.MORE_FILTERS') }} @endif
	</div>
	<div class="clearfix"></div>

	</div>

	<!-- panel -->
	<!-- <div class="jplist-panel box panel-bottom" style="width:100%; margin: 0 0 8px 22px;">							<div class="jplist-drop-down" data-control-type="drop-down" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true"><div class="jplist-dd-panel"> 10 per page </div> -->
	<!-- <ul style="display: none;">
	<li class=""><span data-number="6"> 6 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{  trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif </span></li> -->
	<!-- <li class="active"><span data-number="12" data-default="true"> 12 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{ trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif </span></li>
	<li><span data-number="18"> 18 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{ trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif </span></li>
	<li><span data-number="all"> @if (Lang::has(Session::get('lang_file').'.VIEW_ALL')!= '') {{ trans(Session::get('lang_file').'.VIEW_ALL') }} @else {{ trans($OUR_LANGUAGE.'.VIEW_ALL') }} @endif </span></li>
	</ul>
	</div>
	<div class="jplist-drop-down" data-control-type="drop-down" data-control-name="sort" data-control-action="sort" data-control-animate-to-top="true"><div class="jplist-dd-panel">@if (Lang::has(Session::get('lang_file').'.LIKES_ASC')!= '') {{  trans(Session::get('lang_file').'.LIKES_ASC') }} @else {{ trans($OUR_LANGUAGE.'.LIKES_ASC') }} @endif</div>
	<ul style="display: none;">
	<li class=""><span data-path="default">@if (Lang::has(Session::get('lang_file').'.SORT_BY')!= '') {{  trans(Session::get('lang_file').'.SORT_BY') }} @else {{ trans($OUR_LANGUAGE.'.SORT_BY') }} @endif</span></li> -->
	<!-- <li class="active"><span data-path=".like" data-order="asc" data-type="number" data-default="true">@if (Lang::has(Session::get('lang_file').'.PRICE_LOW')!= '') {{  trans(Session::get('lang_file').'.PRICE_LOW') }} @else {{ trans($OUR_LANGUAGE.'.PRICE_LOW') }} @endif - @if (Lang::has(Session::get('lang_file').'.HIGH')!= '') {{  trans(Session::get('lang_file').'.HIGH') }} @else {{ trans($OUR_LANGUAGE.'.HIGH') }} @endif</span></li>
	<li><span data-path=".like" data-order="desc" data-type="number">@if (Lang::has(Session::get('lang_file').'.PRICE_HIGH')!= '') {{  trans(Session::get('lang_file').'.PRICE_HIGH') }} @else {{ trans($OUR_LANGUAGE.'.PRICE_HIGH') }} @endif -@if (Lang::has(Session::get('lang_file').'.LOW')!= '') {{  trans(Session::get('lang_file').'.LOW') }} @else {{ trans($OUR_LANGUAGE.'.LOW') }} @endif</span></li> -->
	<!-- <li><span data-path=".title" data-order="asc" data-type="text">@if (Lang::has(Session::get('lang_file').'.TITLE')!= '') {{  trans(Session::get('lang_file').'.TITLE') }} @else {{ trans($OUR_LANGUAGE.'.TITLE') }} @endif @if (Lang::has(Session::get('lang_file').'.A')!= '') {{ trans(Session::get('lang_file').'.A') }}  @else {{ trans($OUR_LANGUAGE.'.A') }} @endif-@if (Lang::has(Session::get('lang_file').'.Z')!= '') {{ trans(Session::get('lang_file').'.Z') }} @else {{ trans($OUR_LANGUAGE.'.Z') }} @endif</span></li>
	<li><span data-path=".title" data-order="desc" data-type="text">@if (Lang::has(Session::get('lang_file').'.TITLE')!= '') {{  trans(Session::get('lang_file').'.TITLE') }} @else {{ trans($OUR_LANGUAGE.'.TITLE') }} @endif @if (Lang::has(Session::get('lang_file').'.Z')!= '') {{ trans(Session::get('lang_file').'.Z') }} @else {{ trans($OUR_LANGUAGE.'.Z') }} @endif-@if (Lang::has(Session::get('lang_file').'.A')!= '') {{  trans(Session::get('lang_file').'.A') }} @else {{ trans($OUR_LANGUAGE.'.A') }} @endif</span></li>
	<li><span data-path=".desc" data-order="asc" data-type="text">@if (Lang::has(Session::get('lang_file').'.DESCRIPTION')!= '') {{  trans(Session::get('lang_file').'.DESCRIPTION') }} @else {{ trans($OUR_LANGUAGE.'.DESCRIPTION') }} @endif @if (Lang::has(Session::get('lang_file').'.A')!= '') {{ trans(Session::get('lang_file').'.A') }}  @else {{ trans($OUR_LANGUAGE.'.A') }} @endif- @if (Lang::has(Session::get('lang_file').'.Z')!= '') {{ trans(Session::get('lang_file').'.Z') }} @else {{ trans($OUR_LANGUAGE.'.Z') }} @endif</span></li>
	<li><span data-path=".desc" data-order="desc" data-type="text">@if (Lang::has(Session::get('lang_file').'.DESCRIPTION')!= '') {{ trans(Session::get('lang_file').'.DESCRIPTION') }} @else {{ trans($OUR_LANGUAGE.'.DESCRIPTION') }} @endif @if (Lang::has(Session::get('lang_file').'.Z')!= '') {{  trans(Session::get('lang_file').'.Z') }} @else {{ trans($OUR_LANGUAGE.'.Z') }} @endif- @if (Lang::has(Session::get('lang_file').'.A')!= '') {{  trans(Session::get('lang_file').'.A') }}  else {{ trans($OUR_LANGUAGE.'.A') }} @endif</span></li>								</ul>
	</div> -->

	<!-- pagination results -->
	<!-- <div class="jplist-label" data-type="{start} - {end} of {all}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging"> -->1 - 10 @if (Lang::has(Session::get('lang_file').'.OF')!= '') {{  trans(Session::get('lang_file').'.OF') }}  else {{ trans($OUR_LANGUAGE.'.OF') }} @endif 32</div>

	<!-- pagination -->
	<!-- <div class="jplist-pagination" data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true"><div class="jplist-pagingprev jplist-hidden" data-type="pagingprev"><button type="button" class="jplist-first" data-number="0" data-type="first">«</button><button data-number="0" type="button" class="jplist-prev" data-type="prev">‹</button></div><div class="jplist-pagingmid" data-type="pagingmid"><div class="jplist-pagesbox" data-type="pagesbox"><button type="button" data-type="page" class="jplist-current" data-active="true" data-number="0">1</button> <button type="button" data-type="page" data-number="1">2</button> <button type="button" data-type="page" data-number="2">3</button> <button type="button" data-type="page" data-number="3">4</button> </div></div><div class="jplist-pagingnext" data-type="pagingnext"><button data-number="1" type="button" class="jplist-next" data-type="next">›</button><button data-number="3" type="button" class="jplist-last" data-type="last"> 
	</button--></div></div>					
	</div>
	</div>
	</div>
</div>
</div>
</div>
 {{ $product_details->links() }} 
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
{!! $footer !!}
</body>


