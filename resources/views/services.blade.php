
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->

<div  id="product_page">
<div id="mainBody">
	<div class="container">
	@if(Session::has('wish'))
	<p class="alert {!! Session::get('alert-class', 'alert-success') !!}">{!! Session::get('wish') !!}</p>
	@endif
	<div class="row" id="prdblpg">
<!-- Sidebar ================================================== -->
	<div class="span3 customCategories products" id="sidebar">
		
		hjgj
       
			
	</div>
<!-- Sidebar end=============================================== -->
	<div id="demo" class="box jplist jplist-grid-view span9 tab-land-wid customProductListing" style="margin-left:0px;background:white">
					
				
	
		<div class="view">

				<div class="list"  id="pdpgli">	
                        <section class="">						
					@if(count($service_datas)!=0)	
						@foreach($service_datas as $data)	
                             {!! Form::open(array('url'=>'servicelisting_submit','class'=>'form-horizontal loginFrm')) !!}
						<!-- item 1 -->
						<div class="list-item product productListing"  id="pdpg">		
						
							<!-- img -->
							<div class="product__info">
							<div class="img productViewCenter">
							  <?php /* <a href="<?php echo url('services').'/<?php echo $data->service_type_id;?>';?>">
                                <img class="product_image" src="<?php echo url('public/assets/servicetypeimage/haircut.jpeg');?>" alt="" title=""/></a>sss
                               </a>*/?>
							</div>

                            </div>					<!-- data -->
							<div class="block">
								<p class="title product__title tab-title">{{$data->service_name}}</p>
                                <select name="duration_id" required>
										
										<?php 
											foreach($serv_duration as $duration_data){
												if($duration_data->service_time_type==1){
													$duration = "Min";
												}elseif($duration_data->service_time_type==2){
													$duration = "Hours";
												}elseif($duration_data->service_time_type==3){
													$duration =  "Day";
												}elseif($duration_data->service_time_type==4){
													$duration = "Week";
												}elseif($duration_data->service_time_type==5){
													$duration = "Month";
												}

												if(($data->service_id)==($duration_data->duration_service_id)){ ?>
													<option value="<?php echo $duration_data->duration_id;?>" >
													<?php echo $duration_data->service_duration.' '.$duration;?> - {{ Helper::cur_sym() }}
													<?php echo $duration_data->service_discount_price; ?>
													</option>
									<?php		} //if
											} //foreach	?>
										
									</select>
                                <input type="hidden" name="service_id"      value="{{$data->service_id}}">
                                <input type="hidden" name="service_type_id" value="<?php echo $data->service_type; ?>">
                                <input type="hidden" name="store_id"        value="<?php echo $data->store_name; ?>">
							</div>
                            <input type="submit" name="submit" value="add to cart">

						</div><!-- item 1 -->
                            </form>
                        @endforeach
					@else
                        No Services Available.
                    @endif	
					</section>
										
                </div>
            </div>
        </div>


</div></div></div></div>
<!-- MainBody End ============================= -->

<!-- Footer ================================================================== -->
{!! $footer !!}
</body>