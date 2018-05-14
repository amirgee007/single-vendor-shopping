
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
					@if(count($service_types)!=0)	
						@foreach($service_types as $type)	
						<!-- item 1 -->
						<div class="list-item product productListing"  id="pdpg">		
						
							<!-- img -->
							<div class="product__info">
							<div class="img productViewCenter">
							   <a href="<?php echo url('services').'/'.$type->service_type_id;?>">
                                <img class="product_image" src="<?php echo url('public/assets/servicetypeimage/haircut.jpeg');?>" alt="" title=""/></a>
                               </a>
							</div>

                            </div>					<!-- data -->
							<div class="block">
								<p class="title product__title tab-title">{{$type->service_type_name}}</p>
							</div>
                            <button class="action action--button action--buy"><span class="action__text">Explore Services</span></button></a>

						</div><!-- item 1 -->
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