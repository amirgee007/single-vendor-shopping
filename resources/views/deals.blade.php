 {!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
        <div class="row">  
            <!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3 customCategories products deal-radio">
                <div class="side-menu-head"><strong><?php if (Lang::has(Session::get('lang_file').'.CATEGORIES')!= '') { echo  trans(Session::get('lang_file').'.CATEGORIES');}  else { echo trans($OUR_LANGUAGE.'.CATEGORIES');} ?></strong></div>
               @if(count($main_category)!=0)  <ul id="css3menu1" class="topmenu">
                    <input type="checkbox" id="css3menu-switcher" class="switchbox">
                    <label onclick="" class="switch" for="css3menu-switcher"></label>
					
                    
					@foreach($main_category as $fetch_main_cat)  
					
					<!-- /* $check_main_deal_exists = DB::table('nm_deals')->where('deal_category', '=', $fetch_main_cat->mc_id)->where('deal_status','=',1)->whereRaw('deal_no_of_purchase < deal_max_limit')->get();
					if($check_main_deal_exists){  */ -->
		
					@php $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; @endphp
					
                         
						@if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0) 
							
                            <li class="topfirst"><a href="{{ url('catdeals/viewcategorylist')."/".base64_encode($pass_cat_id1) }}"> 
							@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
							@php	$mc_name = 'mc_name'; @endphp
							@else  @php $mc_name = 'mc_name_'.Session::get('lang_code'); @endphp @endif
							{{ $fetch_main_cat->$mc_name }}</a> <b class="OpenCat" onclick=""> + </b>
                                <ul>
                                    
									@foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)  
								@php	$check_sub_deal_exists = DB::table('nm_deals')->where('deal_main_category', '=', $fetch_sub_main_cat->smc_id)->where('deal_status','=',1)->whereRaw('deal_no_of_purchase < deal_max_limit')->get(); @endphp
									@if($check_sub_deal_exists)
										
								@php	$pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; @endphp
									
                                        
										
                                            <li class="subfirst"><a href="{{ url('catdeals/viewcategorylist')."/".base64_encode($pass_cat_id2) }}"> 
										@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
										@php	$smc_name = 'smc_name'; @endphp
										@else @php  $smc_name = 'smc_name_'.Session::get('lang_code'); @endphp @endif
											{{ $fetch_sub_main_cat->$smc_name }} </a> <b class="OpenCat" onclick=""> + </b>
                                              
											  @if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0) 
												 
                                                <ul>
                                                     
													@foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat)
													 
												@php	$check_sec_main_deal_exists = DB::table('nm_deals')->where('deal_sub_category', '=', $fetch_sub_cat->sb_id)->where('deal_status','=',1)->whereRaw('deal_no_of_purchase < deal_max_limit')->get(); @endphp
													@if($check_sec_main_deal_exists)
														
												@php	$pass_cat_id3 = "3,".$fetch_sub_cat->sb_id; @endphp
													
                                                        
                                                            <li class="subsecond"><a href="{{ url('catdeals/viewcategorylist')."/".base64_encode($pass_cat_id3) }}">
										@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
										@php	$sb_name = 'sb_name'; @endphp
										@else @php  $sb_name = 'sb_name_'.Session::get('lang_code'); @endphp @endif
															{{ $fetch_sub_cat->$sb_name }} </a> <b class="OpenCat" onclick=""> + </b>
                                                               
															   @if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0) 
																   
                                                                <ul>
                                                                    
																	@foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat)
																	 
																	
																@php	$check_sec_sub_main_deal_exists = DB::table('nm_deals')->where('deal_second_sub_category', '=', $fetch_secsub_cat->ssb_id)->where('deal_status','=',1)->whereRaw('deal_no_of_purchase < deal_max_limit')->get(); @endphp
																	@if($check_sec_sub_main_deal_exists)
																		
																@php	$pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; @endphp
																	
                                                                        <li class="subthird"><a href="{{ url('catdeals/viewcategorylist')."/".base64_encode($pass_cat_id4)}}">
																		 
										@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
											@php $ssb_name = 'ssb_name'; @endphp
										@else @php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); @endphp @endif
														{{ $fetch_secsub_cat->$ssb_name }}</a></li>
																		 @endif
																		  @endforeach 
                                                                </ul>
                                                                @endif
                                                            </li>
														 @endif @endforeach
                                                </ul>
                                                @endif
                                            </li>
										 @endif @endforeach
                                </ul>
                                @endif
                            </li>
					@endforeach
                </ul>   @else 
				<ul> <li>@if (Lang::has(Session::get('lang_file').'.NO_CATEGORY_FOUND')!= '') {{ trans(Session::get('lang_file').'.NO_CATEGORY_FOUND') }} @else {{ trans($OUR_LANGUAGE.'.NO_CATEGORY_FOUND') }}! @endif </li> </ul> @endif
				<br>
                <div class="clearfix"></div>
                <br/>
                 
               <!--  //Check product exists -->
               @php $deals_avail = DB::table('nm_deals')->where('deal_status','=','1')->count(); @endphp
                @if($deals_avail>0)
                
				<div class="side-menu-head" style="margin-top:10px;">
					<strong>Discount</strong>
				</div>
			
			@php	$discount_filter=array();
				$filter_discount="";
				$price_from="";
				$price_to=""; @endphp
				@if(isset($_GET["filter_discount"]))
				
				@php	$filter_discount=base64_decode($_GET["filter_discount"]);
					$discount_filter=explode(",",$filter_discount); @endphp
				@endif
				@if(isset($_GET["price_from"]))
				
					@php $price_from=$_GET["price_from"];
					$price_to=$_GET["price_to"]; @endphp
				@endif
				
				<?php
				$label="";
				for($i=1;$i<=6;$i++)
				{
					if($i==1)
						$label="Upto 10%";
					if($i==2)
						$label="10% - 20%";
					if($i==3)
						$label="20% - 30%";
					if($i==4)
						$label="30% - 40%";
					if($i==5)
						$label="40% - 50%";
					if($i==6)
						$label="50% And Above";
			?>
			<label class="radio inline">

				<input type="radio" name="discount_filter" value="<?php echo $i; ?>" <?php if(in_array($i,$discount_filter)){echo "checked";} ?> onclick="javascript:make_filter()"> 
				<span>{{ $label }}</span>
			</label>
			<?php
				}
			?>
			 @if(isset($_GET["filter_discount"]) AND $_GET["filter_discount"]!="")
				<p class="btn btn-danger" onclick="javascript:clear_filter('filter_for_values_discount')">Clear All</p>
			@endif
			
			<div class="side-menu-head" style="margin-top:10px;"><strong>Price Filter</strong></div>
			<div class="price-filter">
			<?php
				/*$label="";//Price vary for different products.customize using min and max value
				for($i=1;$i<=6;$i++)
				{
					if($i==1)
						$label="0-100";
					if($i==2)
						$label="101-500";
					if($i==3)
						$label="501-1000";
					if($i==4)
						$label="1001-3000";
					if($i==5)
						$label="3001-5000";
					if($i==6)
						$label="5001-10000";
			?>
			<label class="radio inline">
				<input type="radio" name="radio_price_filter" value="<?php echo $label; ?>" onclick="javascript:make_filter()"> 
				<span><?php echo " Rs. ".$label; ?></span>
			</label>
			<?php
				} */
			?>
				<form name="filter_form_to_generate" id="filter_form" method="get">
					{{ Form::hidden('filter_discount','$filter_discount',array('id'=>'filter_for_values_discount'))}}
					<!-- <input type="hidden" name="filter_discount" value="<?php echo $filter_discount; ?>" id="filter_for_values_discount"> -->
					<div  class="price-fil-max"><span style="color:#d82672;">Min</span><input type="number" placeholder="100" name="price_from" id="price_from" value="<?php echo $price_from; ?>" /></div>
					 <div class="price-fil-min"><span style="color:#d82672;">Max</span><input type="number" placeholder="10000" name="price_to" id="price_to" value="<?php echo $price_to; ?>" /> </div>
					 <div style="" class="price-go"><p onclick="javacript:make_filter();">Go!</p>
					 </div>
					
					@if($price_from !="" && $price_to !="") <!-- //discount price set -->
					
				
						<p class="btn btn-danger" onclick="javascript:clear_discount_filter('price_from','price_to')">Clear All</p> 
			  @endif
				
			
			
					
					<!--<input type="hidden" name="from" value="<?php echo Request::segment(3); ?>">-->
				</form>
			</div>
                <br>
                @endif
                <div class="clearfix"></div>
                <br/>
 @if(count($get_special_product)!=0)
            
                @php $date = date('Y-m-d H:i:s'); @endphp
  @foreach($get_special_product as $fetch_most_visit_pro)   
    @if($fetch_most_visit_pro->deal_no_of_purchase >= $fetch_most_visit_pro->deal_max_limit)
    @else
       <!--  <div class="side-menu-head"><strong>@if (Lang::has(Session::get('lang_file').'.MOST_VISITED_DEALS')!= '') {{ trans(Session::get('lang_file').'.MOST_VISITED_DEALS') }} @else {{ trans($OUR_LANGUAGE.'.MOST_VISITED_DEALS') }} @endif</strong></div> -->
    @php
            $mostproduct_discount_percentage = $fetch_most_visit_pro->deal_discount_percentage;
            $mostproduct_img = explode('/**/', $fetch_most_visit_pro->deal_image);
            $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
            $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
            $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
            $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
            $res = base64_encode($fetch_most_visit_pro->deal_id); @endphp
           
            @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
               @php  $title = 'deal_title'; @endphp
            @else  @php  $title = 'deal_title_'.Session::get('lang_code'); @endphp @endif

          @php  $product_image     = $mostproduct_img[0];
             
            $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
            $img_data   = "public/assets/deals/".$product_image; @endphp
            
            @if(file_exists($img_data) && $product_image !='')   
            
           @php $prod_path = url('').'/public/assets/deals/' .$product_image;   @endphp                
            @else  
                @if(isset($DynamicNoImage['dealImg']))
                @php    $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['dealImg']; @endphp
                   @if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path))
                     @php   $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
                @endif
            @endif   
           <!--  /* Image Path ends */   
            //Alt text -->
         @php   $alt_text   = substr($fetch_most_visit_pro->$title,0,25);
            $alt_text  .= strlen($fetch_most_visit_pro->$title)>25?'..':'';    @endphp
			 	
                    <div class="thumbnail">
					 @if($fetch_most_visit_pro->deal_discount_percentage!='' && round($fetch_most_visit_pro->deal_discount_percentage)!=0)
						<i class="tag">{{ substr($fetch_most_visit_pro->deal_discount_percentage,0,2) }}%</i> @endif
						
                         @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')  
                            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                    <img  src="{{ $prod_path }}" alt="{{ $alt_text }}"  height="150px"/>
                    </a>
                             @endif
                                @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
                                    <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}">
                    <img  src="{{ $prod_path }}" alt="{{ $alt_text }}"  height="150px"/>
                    </a>
                                    @endif
                                        @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '')  
                                            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}">
                    <img  src="{{ $prod_path }}" alt="{{ $alt_text }}"  height="150px"/>
                    </a>
                                            @endif
                                                @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
                                                    <a href="{!! url('dealview').'/'.$mcat.'/'.$res!!}">
                    <img  src="{{ $prod_path }}" alt="{{ $alt_text }}"   height="150px"/>
                    </a>
                                                    @endif
                                                        <div class="caption">
                                                            <p class="prev_text"><?php 
									
									
															//echo substr($fetch_most_visit_pro->$title,0,20);  ?>{{substr($fetch_most_visit_pro->$title,0,25) }}    {{  strlen($fetch_most_visit_pro->$title)>25?'..':'' }}</p>
                                                            <p class="top_text dolor_text">{{ Helper::cur_sym() }} {{ $fetch_most_visit_pro->deal_discount_price }}</p>

                                                            @if($date > $fetch_most_visit_pro->deal_end_date)  
                                                                <h4 style="text-align:center;"><a  class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{ trans(Session::get('lang_file').'.SOLD') }}  @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a> 
                                     @else 
                                    

			   @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')  
               	<center> <h4><a  href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
					 </center>
               @endif
               @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
                 	<center> <h4><a href="{!! url('dealview1').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
					 </center>

			   @endif
               @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
               	<center> <h4><a  href="{!! url('dealview2').'/'.$mcat.'/'.$smcat.'/'.$res!!}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
					 </center>
               @endif
			   @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '')
               	<center> <h4><a  href="{!! url('dealview2').'/'.$mcat.'/'.$res!!}"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button></a>
					 </center>

               @endif
                    @endif
					 </h4>
                                                        </div>
                    </div>
             @endif <!-- //else -->
                @endforeach <!-- //foreach -->
             @endif <!-- //if count?> -->

            </div>
            <!-- Sidebar end=============================================== -->
            <div class="span9 tab-land-wid customProductListing" style="margin: 0px;">
                <ul class="breadcrumb">
                    <li><a href="{{ url('index') }}">@if (Lang::has(Session::get('lang_file').'.HOME')!= '') {{ trans(Session::get('lang_file').'.HOME') }} @else {{ trans($OUR_LANGUAGE.'.HOME') }} @endif</a> <span class="divider">/</span></li>
                    <li class="active">@if (Lang::has(Session::get('lang_file').'.DEALS')!= ''){{ trans(Session::get('lang_file').'.DEALS') }} @else {{ trans($OUR_LANGUAGE.'.DEALS')}} @endif</li>
                </ul>

                <center> @if (Session::has('success1'))
                    <div class="alert alert-warning alert-dismissable">{!! Session::get('success1') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    @endif</center>
                <div id="demo" class="box jplist jplist-grid-view span9" style="margin-left:0px;background:#fff; width: 100%;">

                    <!-- ios button: show/hide panel -->
                    <div class="jplist-ios-button">
                        <i class="fa fa-sort"></i>@if (Lang::has(Session::get('lang_file').'.MORE_FILTERS')!= '') {{ trans(Session::get('lang_file').'.MORE_FILTERS') }} @else {{ trans($OUR_LANGUAGE.'.MORE_FILTERS') }} @endif
                    </div>

                    <!-- panel -->
                    <div class="jplist-panel box panel-top" style="margin-left: 22px;">

                        <!-- reset button -->
                        <button type="button" class="jplist-reset-btn" data-control-type="reset" data-control-name="reset" data-control-action="reset">
                            @if (Lang::has(Session::get('lang_file').'.RESET')!= '') {{ trans(Session::get('lang_file').'.RESET') }} @else {{ trans($OUR_LANGUAGE.'.RESET') }} @endif &nbsp;<i class="fa fa-share"></i>
                        </button>

                        <div class="jplist-drop-down" data-control-type="drop-down" data-control-name="paging" data-control-action="paging">
                            <div class="jplist-dd-panel"> 10 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{ trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif </div>
                            <ul style="display: none;">
                                <li class=""><span data-number="6"> 6 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{ trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif</span></li>
                                <li class="active"><span data-number="12" data-default="true"> 12 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{ trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif</span></li>
                                <li><span data-number="18"> 18 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{ trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif</span></li>
                                <li><span data-number="all"> @if (Lang::has(Session::get('lang_file').'.VIEW_ALL')!= '') {{ trans(Session::get('lang_file').'.VIEW_ALL') }} @else {{ trans($OUR_LANGUAGE.'.VIEW_ALL') }} @endif </span></li>
                            </ul>
                        </div>

                        <div class="jplist-drop-down" data-control-type="drop-down" data-control-name="sort" data-control-action="sort">
                            <div class="jplist-dd-panel">@if (Lang::has(Session::get('lang_file').'.LIKES_ASC')!= '') {{ trans(Session::get('lang_file').'.LIKES_ASC') }} @else {{ trans($OUR_LANGUAGE.'.LIKES_ASC') }} @endif</div>
                            <ul style="display: none;">
                                <li class=""><span data-path="default">@if (Lang::has(Session::get('lang_file').'.SORT_BY')!= '') {{ trans(Session::get('lang_file').'.SORT_BY') }} @else {{ trans($OUR_LANGUAGE.'.SORT_BY') }} @endif</span></li>
                                <li class="active"><span data-path=".like" data-order="asc" data-type="number" data-default="true">@if (Lang::has(Session::get('lang_file').'.PRICE_LOW')!= '') {{ trans(Session::get('lang_file').'.PRICE_LOW') }} @else {{ trans($OUR_LANGUAGE.'.PRICE_LOW') }} @endif - @if (Lang::has(Session::get('lang_file').'.HIGH')!= '') {{  trans(Session::get('lang_file').'.HIGH') }} @else {{ trans($OUR_LANGUAGE.'.HIGH') }} @endif</span></li>
                                <li><span data-path=".like" data-order="desc" data-type="number">@if (Lang::has(Session::get('lang_file').'.PRICE_HIGH')!= ''){{  trans(Session::get('lang_file').'.PRICE_HIGH') }} @else {{ trans($OUR_LANGUAGE.'.PRICE_HIGH') }} @endif -@if (Lang::has(Session::get('lang_file').'.LOW')!= '') {{ trans(Session::get('lang_file').'.LOW') }}  @else {{ trans($OUR_LANGUAGE.'.LOW') }} @endif</span></li>
                                <li><span data-path=".title" data-order="asc" data-type="text">@if (Lang::has(Session::get('lang_file').'.TITLE')!= '') {{ trans(Session::get('lang_file').'.TITLE') }} @else {{ trans($OUR_LANGUAGE.'.TITLE') }} @endif @if (Lang::has(Session::get('lang_file').'.A')!= '') {{ trans(Session::get('lang_file').'.A') }} @else {{ trans($OUR_LANGUAGE.'.A') }} @endif-@if (Lang::has(Session::get('lang_file').'.Z')!= '') {{  trans(Session::get('lang_file').'.Z') }} @else {{ trans($OUR_LANGUAGE.'.Z') }} @endif</span></li>
                                <li><span data-path=".title" data-order="desc" data-type="text">@if (Lang::has(Session::get('lang_file').'.TITLE')!= '') {{ trans(Session::get('lang_file').'.TITLE') }} @else {{ trans($OUR_LANGUAGE.'.TITLE') }} @endif @if (Lang::has(Session::get('lang_file').'.Z')!= '') {{ trans(Session::get('lang_file').'.Z') }} @else {{ trans($OUR_LANGUAGE.'.Z') }} @endif-@if (Lang::has(Session::get('lang_file').'.A')!= '') {{ trans(Session::get('lang_file').'.A') }} @else {{ trans($OUR_LANGUAGE.'.A') }} @endif</span></li>

                            </ul>
                        </div>

                        <!-- filter by title -->
                        <div class="text-filter-box">

                            <!-- <i class="fa fa-search  jplist-icon" style="padding-top:0px;"></i> -->

                            <!--[if lt IE 10]>
								<div class="jplist-label">Filter by Title:</div>
								<![endif]-->
<?php /*
                            <input data-path=".title" value="" placeholder="<?php if (Lang::has(Session::get('lang_file').'.FILTER_BY_TITLE')!= '') { echo  trans(Session::get('lang_file').'.FILTER_BY_TITLE');}  else { echo trans($OUR_LANGUAGE.'.FILTER_BY_TITLE');} ?>" class="filt" data-control-type="textbox" data-control-name="title-filter" data-control-action="filter" type="text">
                        */?>
                        </div>

                        <!-- filter by description -->

                        <!-- views -->
                        <div class="jplist-views" data-control-type="views" data-control-name="views" data-control-action="views" data-default="jplist-grid-view" style="visibility:hidden;">

                            <button type="button" class="jplist-view jplist-list-view" data-type="jplist-list-view"></button>
                            <button type="button" class="jplist-view jplist-grid-view" data-type="jplist-grid-view"></button>

                        </div>

                        <!-- pagination results -->
                        <div class="jplist-label" data-type="Page {current} of {pages}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" style="visibility:hidden">@if (Lang::has(Session::get('lang_file').'.PAGE')!= '') {{  trans(Session::get('lang_file').'.PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PAGE') }} @endif 1 @if (Lang::has(Session::get('lang_file').'.OF')!= '') {{ trans(Session::get('lang_file').'.OF') }} @else {{ trans($OUR_LANGUAGE.'.OF') }} @endif 4</div>

                        <!-- pagination -->

                    </div>

                    <!-- data -->
                    <div class="list">
                       @if(count($product_details) != 0) 
						@foreach($product_details as $product_det)
						 
                            @if($product_det->deal_no_of_purchase >= $product_det->deal_max_limit) 
                                <!-- //should not show this if datas -->
                            @else

                            @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
                             @php   $deal_title = 'deal_title'; @endphp
                            @else @php   $deal_title = 'deal_title_'.Session::get('lang_code'); @endphp @endif

						@php	$mostproduct_img = explode('/**/',$product_det->deal_image);
							$product_discount_percentage = $product_det->deal_discount_percentage;
							$date = date('Y-m-d H:i:s');

                            $product_image     = $mostproduct_img[0];
                         
                            $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
                            $img_data   = "public/assets/deals/".$product_image; @endphp

                            @if(file_exists($img_data) && $product_image !='')  

                          @php  $prod_path = url('').'/public/assets/deals/' .$product_image; @endphp                
                            @else  
                            @if(isset($DynamicNoImage['dealImg']))
                              @php  $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['dealImg']; @endphp
                               @if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path))
                                 @php   $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
                            @endif
                            @endif   
                           <!--  /* Image Path ends */   
                            //Alt text -->
                         @php   $alt_text   = substr($product_det->$deal_title,0,25);
                            $alt_text  .= strlen($product_det->$deal_title)>25?'..':''; @endphp  


							

                            <div class="list-item product productListing deslListing" style="margin: 5px!important;">
							
							@if($product_det->deal_discount_percentage!='' && round($product_det->deal_discount_percentage)!=0)
							<i class="tag">{{ substr($product_det->deal_discount_percentage,0,2) }}%</i> @endif
                                <!-- img -->
                                <div class="img left productViewCenter">
                                  
                                @php 
                                $mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
                                $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
                                $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
                                $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name)); 
                                $res = base64_encode($product_det->deal_id);

                                $date2 = $product_det->deal_end_date;
                                $deal_end_year = date('Y',strtotime($date2));
                                $deal_end_month = date('m',strtotime($date2));
                                $deal_end_date = date('d',strtotime($date2));
                                $deal_end_hours = date('H',strtotime($date2));  
                                $deal_end_minutes = date('i',strtotime($date2));    
                                $deal_end_seconds = date('s',strtotime($date2));  @endphp
	
			                @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '')
                                <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><img alt="{{ $alt_text }}"  src="{{ $prod_path }}"></a>
                            @endif
                            @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '')

                            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}"><img alt="{{ $alt_text }}"  src="{{ $prod_path }}"></a>
                            @endif
                            @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '')

                            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}"><img alt="{{ $alt_text }}"  src="{{ $prod_path }}"></a>
                            @endif
                           @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 

                            <a href="{!! url('dealview').'/'.$mcat.'/'.$res!!}"><img alt="{{ $alt_text }}"  src="{{ $prod_path }}"></a>
                            @endif
                           
                                </div>

                                <!-- data -->
                                <div class="block right space_text">
                                    <p class="title">
                                        <?php 
									
										//echo substr($product_det->$deal_title,0,25);  ?>{{substr($product_det->$deal_title,0,25) }}    {{  strlen($product_det->$deal_title)>25?'..':'' }}</p>

                                    <p class="like product__price">{{ Helper::cur_sym() }}
                                       {{ $product_det->deal_discount_price }}
                                    </p>
                                    @if($date >= $product_det->deal_end_date)  
                                        <a class="btn btn-danger">@if (Lang::has(Session::get('lang_file').'.SOLD')!= '') {{ trans(Session::get('lang_file').'.SOLD') }} @else {{ trans($OUR_LANGUAGE.'.SOLD') }} @endif</a>
                                         @else  
                                             
									@php $mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
             $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
			  $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name)); 
			  $res = base64_encode($product_det->deal_id); @endphp

<?php /*
<div id="countdown<?php echo $product_det->deal_id;?>" class="countdownHolder"></div> */?>

			  @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 

                                                <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
                                                    <button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                                                </a>

                                                @endif
                                                    @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 

                                                        <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}">
                                                            <button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                                                        </a>

                                                       @endif
                                                            @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 

                                                                <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}">
                                                                    <button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{ trans(Session::get('lang_file').'.ADD_TO_CART') }}  @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                                                                </a>

                                                                @endif
                                                                    @if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '')  

                                                                        <a href="{!! url('dealview').'/'.$mcat.'/'.$res!!}">
                                                                            <button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">@if (Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= '') {{  trans(Session::get('lang_file').'.ADD_TO_CART') }} @else {{ trans($OUR_LANGUAGE.'.ADD_TO_CART') }} @endif</span></button>
                                                                        </a>

                                                                        @endif
<script>
$(function(){
	//year = <?php echo $deal_end_year;?>; month = <?php echo $deal_end_month;?>; day = <?php echo $deal_end_date;?>;hour= <?php echo $deal_end_hours;?>; min= <?php echo $deal_end_minutes;?>; sec= <?php echo $deal_end_seconds;?>;
   
countProcess(<?php echo $product_det->deal_id; ?>);
});
</script>
                                                                            @endif
                                                                              
                                </div>
                               
                           
                            </div>
                            

                            @endif
                                @endforeach 
                            @else{{ '<div class="list box text-shadow">No results found</div>' }} 
							@endif
                    </div>

                    <div class="box jplist-no-results text-shadow align-center jplist-hidden span4">
                        <p style="color: rgb(54, 160, 222);
margin-top: 20px;
font-weight: bold;
padding-left: 8px;">@if (Lang::has(Session::get('lang_file').'.NO_DEALS_AVAILABLE')!= '') {{ trans(Session::get('lang_file').'.NO_DEALS_AVAILABLE') }} @else {{ trans($OUR_LANGUAGE.'.NO_DEALS_AVAILABLE') }} @endif</p>
                    </div>

                    <!-- ios button: show/hide panel -->
                    <div class="jplist-ios-button">
                        <i class="fa fa-sort"></i>@if (Lang::has(Session::get('lang_file').'.MORE_FILTERS')!= '') {{ trans(Session::get('lang_file').'.MORE_FILTERS') }} @else {{ trans($OUR_LANGUAGE.'.MORE_FILTERS') }} @endif
                    </div>
                    <div class="clearfix"></div>
                    <!-- panel -->
                    <div class="jplist-panel box panel-bottom" style="width:100%; margin: 0 0 8px 22px;">

                        <div class="jplist-drop-down" data-control-type="drop-down" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true">
                            <div class="jplist-dd-panel"> 10 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{ trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif </div>
                            <ul style="display: none;">
                                <li class=""><span data-number="6"> 6 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{  trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif </span></li>
                                <li class="active"><span data-number="12" data-default="true"> 12 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{  trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif</span></li>
                                <li><span data-number="18"> 18 @if (Lang::has(Session::get('lang_file').'.PER_PAGE')!= '') {{  trans(Session::get('lang_file').'.PER_PAGE') }} @else {{ trans($OUR_LANGUAGE.'.PER_PAGE') }} @endif </span></li>
                                <li><span data-number="all">@if (Lang::has(Session::get('lang_file').'.VIEW_ALL')!= '') {{ trans(Session::get('lang_file').'.VIEW_ALL') }} @else {{ trans($OUR_LANGUAGE.'.VIEW_ALL') }} @endif </span></li>
                            </ul>
                        </div>
                        <div class="jplist-drop-down" data-control-type="drop-down" data-control-name="sort" data-control-action="sort" data-control-animate-to-top="true">
                            <div class="jplist-dd-panel">@if (Lang::has(Session::get('lang_file').'.LIKES_ASC')!= '') {{ trans(Session::get('lang_file').'.LIKES_ASC') }} @else {{ trans($OUR_LANGUAGE.'.LIKES_ASC') }} @endif</div>
                            <ul style="display: none;">
                                <li class=""><span data-path="default">@if (Lang::has(Session::get('lang_file').'.SORT_BY')!= '') {{  trans(Session::get('lang_file').'.SORT_BY') }} @else {{ trans($OUR_LANGUAGE.'.SORT_BY') }} @endif</span></li>
                                <li class="active"><span data-path=".like" data-order="asc" data-type="number" data-default="true">@if (Lang::has(Session::get('lang_file').'.PRICE_LOW')!= '') {{ trans(Session::get('lang_file').'.PRICE_LOW') }} @else {{ trans($OUR_LANGUAGE.'.PRICE_LOW') }} @endif - @if (Lang::has(Session::get('lang_file').'.HIGH')!= '') {{ trans(Session::get('lang_file').'.HIGH') }} @else {{ trans($OUR_LANGUAGE.'.HIGH') }} @endif</span></li>
                                <li><span data-path=".like" data-order="desc" data-type="number">@if (Lang::has(Session::get('lang_file').'.PRICE_HIGH')!= '') {{  trans(Session::get('lang_file').'.PRICE_HIGH') }} @else {{ trans($OUR_LANGUAGE.'.PRICE_HIGH') }} @endif -@if (Lang::has(Session::get('lang_file').'.LOW')!= '') {{ trans(Session::get('lang_file').'.LOW') }} @else {{ trans($OUR_LANGUAGE.'.LOW') }} @endif</span></li>
                                <li><span data-path=".title" data-order="asc" data-type="text">@if (Lang::has(Session::get('lang_file').'.TITLE')!= '') {{ trans(Session::get('lang_file').'.TITLE') }} @else {{ trans($OUR_LANGUAGE.'.TITLE') }} @endif @if (Lang::has(Session::get('lang_file').'.A')!= '') {{ trans(Session::get('lang_file').'.A') }} @else {{ trans($OUR_LANGUAGE.'.A') }} @endif-@if (Lang::has(Session::get('lang_file').'.Z')!= '') {{ trans(Session::get('lang_file').'.Z') }} @else {{ trans($OUR_LANGUAGE.'.Z') }} @endif</span></li>
                                <li><span data-path=".title" data-order="desc" data-type="text">@if (Lang::has(Session::get('lang_file').'.TITLE')!= '') {{ trans(Session::get('lang_file').'.TITLE') }} @else {{ trans($OUR_LANGUAGE.'.TITLE') }} @endif @if (Lang::has(Session::get('lang_file').'.Z')!= '') {{ trans(Session::get('lang_file').'.Z') }} @else {{ trans($OUR_LANGUAGE.'.Z') }} @endif-@if (Lang::has(Session::get('lang_file').'.A')!= '') {{ trans(Session::get('lang_file').'.A') }} @else {{ trans($OUR_LANGUAGE.'.A') }} @endif</span></li>
                            </ul>
                        </div>

                        <div class="jplist-label" data-type="{start} - {end} of {all}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging">1 - 10 @if (Lang::has(Session::get('lang_file').'.OF')!= '') {{ trans(Session::get('lang_file').'.OF') }} @else {{ trans($OUR_LANGUAGE.'.OF') }} @endif 32</div>

                        <div class="jplist-pagination" data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true">
                            <div class="jplist-pagingprev jplist-hidden" data-type="pagingprev">
                                <button type="button" class="jplist-first" data-number="0" data-type="first">«</button>
                                <button data-number="0" type="button" class="jplist-prev" data-type="prev">‹</button>
                            </div>
                            <div class="jplist-pagingmid" data-type="pagingmid">
                                <div class="jplist-pagesbox" data-type="pagesbox">
                                    <button type="button" data-type="page" class="jplist-current" data-active="true" data-number="0">1</button>
                                    <button type="button" data-type="page" data-number="1">2</button>
                                    <button type="button" data-type="page" data-number="2">3</button>
                                    <button type="button" data-type="page" data-number="3">4</button>
                                </div>
                            </div>
                            <div class="jplist-pagingnext" data-type="pagingnext">
                                <button data-number="1" type="button" class="jplist-next" data-type="next">›</button>
                                <button data-number="3" type="button" class="jplist-last" data-type="last">»</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
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
		
		var price_from = $('#price_from');
		var price_to = $('#price_to');
		
		 $('#price_from').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
            alert("Numbers only allowed");
			return false;
        }
      });

	  $('#price_to').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
            alert("Numbers only allowed");
			return false;
        }
      });

    });
</script>
<link rel="stylesheet" href="{{ url('') }}/themes/css/jquery.countdown.css" />
		<script src="{{ url('') }}/themes/js/jquery.countdown.js"></script>
      
       <!-- Count Down Coding -->
		<script type="text/javascript">
 	@if(count($product_details) != 0)
function countProcess(deal_id){
    <?php 
foreach($product_details as $product_det){?>
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
               output="<span class='countDays'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>" + fdays +"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>" + sdays +"</span></span><span class='countDiv countDiv0'></span><span class='countHours'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fhours+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+shours+"</span></span></span><span class='countDiv countDiv1'></span><span class='countMinutes'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fmins+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+smins+"</span></span></span><span class='countDiv countDiv2'></span><span class='countSeconds'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fsecs+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+ssecs+"</span></span></span>" ;
                     
                $('#countdown'+deal_id).html(output);
                
           //alert(sdays); 

                setTimeout(function() { countProcess(deal_id); }, 1000);
        //}
        
}
 @endif 
function make_filter()
{
	var filter_items_by_discount=[];
	var price_from=$("#price_from").val();
	var price_to=$("#price_to").val();
	var price_from=parseInt(price_from);
	var price_to=parseInt(price_to);
	var price_radio=$("input[name='radio_price_filter']:checked").val();
	//alert(price_to);
	if(price_radio)
	{
		var min_max_price=price_radio.split('-');
		$("#price_from").val(min_max_price[0]);
		$("#price_to").val(min_max_price[1]);
		
	}
	
	$("input:radio[name=discount_filter]:checked").each(function(){
		filter_items_by_discount.push($(this).val());
	});
	//alert(price_to);
	var enc_filter_by_discount = window.btoa(filter_items_by_discount);
	$("#filter_for_values_discount").val(enc_filter_by_discount);
	if(price_from > price_to)
	{
		alert("Maximum price should less then Minimum Price!");
		$("#price_to").focus();
		return false;
	}
	
   document.filter_form_to_generate.submit();             // Submit the page
    
}
function clear_filter(id_to_clear)
{
	$("#"+id_to_clear).val("");
	document.filter_form_to_generate.submit();
}
/*clear filter for discount price*/
function clear_discount_filter(from_price,to_price)
{
	$("#"+from_price).val("");
	$("#"+to_price).val("");
	document.filter_form_to_generate.submit();
}
</script>
</body>

</html>