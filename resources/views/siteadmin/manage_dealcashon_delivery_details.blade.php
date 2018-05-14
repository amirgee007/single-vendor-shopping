  <!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->



 <!-- BEGIN HEAD -->

<head>

    <meta charset="UTF-8" />

    <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_LARAVEL_ECOMMERCE_MULTIVENDOR_SHIPPING_DELIVERY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_LARAVEL_ECOMMERCE_MULTIVENDOR_SHIPPING_DELIVERY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_LARAVEL_ECOMMERCE_MULTIVENDOR_SHIPPING_DELIVERY')}} @endif</title>

     <meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />
	<meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <![endif]-->

    <!-- GLOBAL STYLES -->

    <!-- GLOBAL STYLES -->

    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/bootstrap/css/bootstrap.css" />

    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/main.css" />

    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/theme.css" />

    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />

      @php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('')}}/public/assets/favicon/{{ $fav->imgs_name }}">
@endif		

    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />

    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/success.css" />

     <link href="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <!--END GLOBAL STYLES -->

       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->



</head>

     <!-- END HEAD -->



     <!-- BEGIN BODY -->

<body class="padTop53 " >



    <!-- MAIN WRAPPER -->

    <div id="wrap">





         <!-- HEADER SECTION -->

         {!! $adminheader!!}

        <!-- END HEADER SECTION -->

        <!-- MENU SECTION -->

         {!! $adminleftmenus!!}

        <!--END MENU SECTION -->



		<div></div>



         <!--PAGE CONTENT -->

        <div id="content">

           

                <div class="inner">

                    <div class="row">

                    <div class="col-lg-12">

                        	<ul class="breadcrumb">

                            	<li class=""><a >{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= ''))? trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>

                                <li class="active"><a >{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CASH_ON_DELIVERY') }}</a></li>

                            </ul>

                    </div>

                </div>

            <div class="row">

<div class="col-lg-12">

    <div class="box dark">

        <header>

            <div class="icons"><i class="icon-edit"></i></div>

            <h5>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CASH_ON_DELIVERY') }}</h5>

            

        </header>

        <div id="div-1" class="accordion-body collapse in body">

          
			{{ Form::open(['class' => 'form-horizontal']) }}

        <div class="table-responsive panel_marg_clr ppd">
       <table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">

                                    <thead>

                                        <tr role="row">

                                        <th aria-sort="ascending" aria-label="S.No: activate to sort column ascending" style="" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc">S.No</th>

                                        <th aria-label="Customers: activate to sort column ascending" style="" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Deal Name</th>

                                        <th aria-label="Product Title: activate to sort column ascending" style="" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Name</th>

                                        <th aria-label="Amount(S/): activate to sort column ascending" style="" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Email-ID</th>

                                        <th aria-label="Amount(S/): activate to sort column ascending" style="" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Date</th>

                                        <th aria-label=" Tax (S/): activate to sort column ascending" style="" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Address</th>

                                        <th aria-label=" Tax (S/): activate to sort column ascending" style="" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Details</th>

                                      <!--  <th aria-label="Transaction Date: activate to sort column ascending" style="width: 125px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Delivery Status</th>-->

                                        </tr>

                                    </thead>

                                    <tbody>

                                   
 
										<?php $i=1 ; ?>
                    @if(count($deal_shipping)>0)   
										@foreach($deal_shipping as $shipping)

										     
           
											@if($shipping->cod_status==1)

											@php

												$orderstatus=((Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SUCCESS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS');

											@endphp

											@elseif($shipping->cod_status==2) 

											@php

												$orderstatus=((Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_COMPLETED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETED');

											@endphp

											@elseif($shipping->cod_status==3) 

											@php

												$orderstatus=((Lang::has(Session::get('admin_lang_file').'.BACK_HOLD')!= ''))? trans(Session::get('admin_lang_file').'.BACK_HOLD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOLD');

											@endphp

											@elseif($shipping->cod_status==4) 

											@php

												$orderstatus=((Lang::has(Session::get('admin_lang_file').'.BACK_FAILED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_FAILED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED');

											 @endphp
        
											@endif	
											

										

										

										

										

										<tr class="gradeA odd">

                                            <td class="sorting_1">{{  $i }}</td>
											<td class="     " style="text-align: left;">
                                            <ul>
											@php
											$product_data = DB::table('nm_ordercod')
											->orderBy('cod_date', 'desc')
											->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
											->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
											->where('nm_ordercod.cod_transaction_id', '=',$shipping->cod_transaction_id)
											->where('nm_ordercod.cod_order_type', '=',2)
											->get();@endphp
                                        
											@foreach($product_data as $product_datavalues)
												
											
											@php echo   '<li style="list-style:upper-roman; text-align:left;">'. $product_datavalues->deal_title.'.</li>'; @endphp
                        
																							
											


											@endforeach
											
											</ul>
											</td>
                                            

                                            <td class=" ">{{ $shipping->cus_name }} </td>

                                            <td class=" ">{{ $shipping->cus_email }}  </td>

                                            <td class="center">{{ $shipping->cod_date }}</td>

                                            <td class="center">{{ $shipping->ship_address1 }}</td>

                                     

                                      

                            <td class="center"><a class="btn btn-success" data-target="<?php echo '#uiModal'.$i;?>" data-toggle="modal">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_VIEW_DETAILS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_VIEW_DETAILS') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_VIEW_DETAILS') }}</a></td>

                                              <!--<td class="center"><?php //echo $orderstatus;?></td>-->

                                            

                                          

                                           

                                        </tr>

                                        

                                        @php $i=$i+1; @endphp @endforeach @endif</tbody>

                                </table>

                              </div>


        </div>

           

		   {{ Form::close() }}

        </div>

    </div>

</div>

   

    </div>

                    

                    </div>

                    

                    

                    



                </div>

            <!--END PAGE CONTENT -->

 

        </div>

    <div class="modal fade in" id="formModal"  style="display:none;">

     <div class="modal-dialog">

          <div class="modal-content">

                                        

                                        <div class="modal-body">

                                          
										 {{ Form::open(array('role' => 'form')) }}
                                        <div class="form-group">

                                            <label>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL_ID')!= ''))? trans(Session::get('admin_lang_file').'.BACK_EMAIL_ID') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL_ID') }}</label>

                                            <input class="form-control">

                                           <p class="help-block">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK_LEVEL_HELP')!= ''))? trans(Session::get('admin_lang_file').'.BACK_BLOCK_LEVEL_HELP') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK_LEVEL_HELP') }}.</p>

                                        </div>

                                        <div class="form-group">BACK_ADDRESS

                                            <label>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADDRESS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS')}} @endif&nbsp;:&nbsp;</label>

                                          {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ASDSA_CALIFORNIA_CANADIAN')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ASDSA_CALIFORNIA_CANADIAN') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ASDSA_CALIFORNIA_CANADIAN') }}
                                        </div>

                                        <div class="form-group">

                                          <label>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_MESSAGE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_MESSAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MESSAGE') }}</label>
						
											{{ Form::textarea('','', array('class' => 'form-control','id' => 'text4')) }}
                                          

                                        </div>

                                        

                                       

									   {{ Form::close() }}

                                        </div>

                                        <div class="modal-footer">
							{{ Form::button('Close', array('class' => 'btn btn-default','data-dismiss' => 'modal')) }}
                                           
                                           <button class="btn btn-success" type="button">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SEND')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SEND') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SEND') }}</button>

                                        </div>

                                    </div>

                                </div>  </div>

     <!--END MAIN WRAPPER -->

@php $i=1; @endphp

@foreach($deal_shipping as $shipping)


	@if($shipping->cod_status==1)

	@php


	$orderstatus=((Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SUCCESS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS');

	@endphp


	@elseif($shipping->cod_status==2) 

	@php


	$orderstatus=((Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_COMPLETED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETED');

	@endphp


	@elseif($shipping->cod_status==3) 

	@php


	$orderstatus=((Lang::has(Session::get('admin_lang_file').'.BACK_HOLD')!= ''))? trans(Session::get('admin_lang_file').'.BACK_HOLD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOLD');

	@endphp


	@elseif($shipping->cod_status==4) 

	@php 

	$orderstatus=((Lang::has(Session::get('admin_lang_file').'.BACK_FAILED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_FAILED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED'); @endphp

	@endif
           

        

  

										  





<div  id="<?php echo 'uiModal'.$i?>" class="modal fade in invoice-top" style="display:none;">

                                <div class="modal-dialog">

                                    <div class="modal-content">

                                        <div class="modal-header" style="border-bottom:none; overflow: hidden;background: #f5f5f5;">


                                                <div class="col-lg-4"><img src="<?php echo $SITE_LOGO; ?>" alt="" style=""></div>

                                                 <div class="col-lg-4" style="padding-top: 10px; text-align: center;"><strong>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_TAX_INVOICE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_TAX_INVOICE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TAX_INVOICE') }}</strong></div>

                                                  <div class="col-lg-4"><a style="color:#d9534f;" href="class="btn btn-default" data-dismiss="modal" CLASS="pull-right"><i class="icon-remove-sign icon-2x"></i></a></div>

                                        </div>

                                   
									@php $subtotal=$shipping->cod_qty*$shipping->cod_amt;   
									 $totamt=round($subtotal + ($subtotal*($shipping->deal_inctax/100))); @endphp
                                      <div class="row">

                                      <div class="col-lg-12">

                                      <div class="col-lg-6" >

                                       <h4>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CASH_ON_DELIVERY') }}</h4>
										 @if($shipping->cod_status == 1) 
										<b>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT_PAID')!= ''))? trans(Session::get('admin_lang_file').'.BACK_AMOUNT_PAID') : trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT_PAID') }}
										 @else 
                                      <b>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT_TO_PAY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_AMOUNT_TO_PAY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT_TO_PAY') }}
										@endif
									  :{{ Helper::cur_sym() }} <?php
									  $product_titles=DB::table('nm_ordercod')
									  ->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')->where('cod_transaction_id', '=', $shipping->cod_transaction_id)
									  ->where('nm_ordercod.cod_order_type', '=',2)->get();
									  $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0; ?>
									  @foreach($product_titles as $prd_tit) 
										  @php	
										  $subtotal=$prd_tit->cod_amt; 
																$tax_amt = (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
															
																$total_tax_amt+= (($prd_tit->cod_amt * $prd_tit->cod_tax)/100); 
																$total_ship_amt+= $prd_tit->cod_shipping_amt;
																$total_item_amt+=$prd_tit->cod_amt;
																$coupon_amount+= $prd_tit->coupon_amount;
																$prodct_id = $prd_tit->cod_pro_id;
																
														$item_amt = $prd_tit->cod_amt + (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
															
														
															 $ship_amt = $prd_tit->cod_shipping_amt;
															
														@endphp
														{{-- //$item_tax = $codorderdet->cod_tax; --}}
															@if($prd_tit->coupon_amount != 0)
															@php
																$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
															@endphp
															@else
															@php
																$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt); @endphp
															@endif
									  	@endforeach														
										{{ $grand_total }}</b>

                                      <br>

                                      <span>(({{ ((Lang::has(Session::get('admin_lang_file').'.BACK_INCLUSIVE_OF_ALL_CHARGES')!= ''))? trans(Session::get('admin_lang_file').'.BACK_INCLUSIVE_OF_ALL_CHARGES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_INCLUSIVE_OF_ALL_CHARGES') }}) )</span>

                                     <br>
<span>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ORDER_ID')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ORDER_ID') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ORDER_ID') }}: {{ $shipping->cod_transaction_id }}</span>

                                       <br>
                                        @if($shipping->tax_type != '' && $shipping->tax_id_number != '')
                                     <span> {{ $shipping->tax_type }} : {{ $shipping->tax_id_number }}</span><br> @endif

					<span>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ORDER_DATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ORDER_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ORDER_DATE') }}: {{ $shipping->cod_date }}</span>

                                      </div>

                                          <div class="col-lg-6" style="border-left:1px solid #eeeeee;">
											
                                          <h4>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SHIPPING_DETAILS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SHIPPING_DETAILS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPPING_DETAILS') }}</h4>
                                          
										 
										   {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_NAME')!= ''))? trans(Session::get('admin_lang_file').'.BACK_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NAME') }}: {{ $shipping->ship_name }}<br>
										   
										   {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL')!= ''))? trans(Session::get('admin_lang_file').'.BACK_EMAIL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL') }} : {{ $shipping->ship_email }}<br>
										   
                                          {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS1')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ADDRESS1') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS1') }}: {{ $shipping->ship_address1 }}<br>
										  
										  {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS2')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ADDRESS2') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS2') }} : {{ $shipping->ship_address2 }}<br>
										  
										   {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_CITY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY') }} : {{ $shipping->ship_ci_id }}<br>
										  
                                          {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_STATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_STATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_STATE') }} : {{ $shipping->ship_state }}<br>
										  
										   {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_COUNTRY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY') }} : {{ $shipping->ship_country }}<br>
										   
										   {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ZIPCODE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ZIPCODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ZIPCODE') }}: {{ $shipping->ship_postalcode }}<br>
										   
                                          {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_PHONE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_PHONE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PHONE') }} : {{ $shipping->ship_phone }}
                                          </div>

                                            

                                             

                                      </div>

                                      </div>

                                      <hr>

                                      <div class="row">

                                      <div class="span12 text-center">

                                      <h4 class="text-center">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_INVOICE_DETAILS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_INVOICE_DETAILS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_INVOICE_DETAILS') }}</h4>

                                      <span>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SHIPMENT_CONTAINS_ITEMS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SHIPMENT_CONTAINS_ITEMS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPMENT_CONTAINS_ITEMS') }}</span>

                                      </div>

                                      </div>

                                      <hr>
									<!--<?php //if($shipping->deal_title !=''){ ?>
                                    <h4 class="text-center"><?php //echo $shipping->deal_title;?></h4>
									<?php // } //else {?>
									<h4 class="text-center"><?php //echo "---"?></h4>
									<?php //} ?>-->
                  <div class="table-responsive">
                          <table style="width:98%;" align="center" border="1" bordercolor="#e6e6e6">

                                    <tr style="border-bottom:1px solid #e6e6e6; background:#f5f5f5;">
										<td  align="center">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_NAME')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DEAL_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_NAME') }}</td>
                                   
                                        <td  align="center">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_QUANTITY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_QUANTITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_QUANTITY') }}</td>

                                         <td align="center">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ORIGINAL_PRICE') }}</td>

                                            <td   align="center">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SUB_TOTAL')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SUB_TOTAL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUB_TOTAL') }}</td>

                                               <td   align="center">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_PAYMENT_STATUS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_PAYMENT_STATUS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYMENT_STATUS') }}</td>
                                             <td   align="center">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DELIVERY_STATUS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DELIVERY_STATUS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DELIVERY_STATUS') }}</td>

                                          

                                    </tr>

                                    <?php
									  $product_titles=DB::table('nm_ordercod')
									  ->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')->where('cod_transaction_id', '=', $shipping->cod_transaction_id)
									  ->where('nm_ordercod.cod_order_type', '=',2)->get();
									  $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0;  ?>
									  @foreach($product_titles as $prd_tit) 
										  	
													@php			$status=$prd_tit->delivery_status; @endphp
											@if($prd_tit->delivery_status==1)
											@php
											$orderstatus="Order Placed"; @endphp
											
											@elseif($prd_tit->delivery_status==2) 
											@php
											$orderstatus="Order Packed";
											@endphp
											@elseif($prd_tit->delivery_status==3) 
											@php
											$orderstatus="Dispatched";
											@endphp
											@elseif($prd_tit->delivery_status==4) 
											@php
											$orderstatus="Delivered"; @endphp
											@endif
											
											
											@if($prd_tit->cod_status==1)
											@php
											$payment_status="Success";
											@endphp
											@elseif($prd_tit->cod_status==2) 
											@php
											$payment_status="Order Packed";
											@endphp
											@elseif($prd_tit->cod_status==3) 
											@php
											$payment_status="Hold";
											@endphp
											@elseif($prd_tit->cod_status==4) 
											@php
											$payment_status="Faild"; @endphp
											@endif
											@php
										  $subtotal=$prd_tit->cod_amt; 
																$tax_amt = (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
															
																$total_tax_amt+= (($prd_tit->cod_amt * $prd_tit->cod_tax)/100); 
																$total_ship_amt+= $prd_tit->cod_shipping_amt;
																$total_item_amt+=$prd_tit->cod_amt;
																$coupon_amount+= $prd_tit->coupon_amount;
																$prodct_id = $prd_tit->cod_pro_id;
																
														$item_amt = $prd_tit->cod_amt + (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
															
														
															 $ship_amt = $prd_tit->cod_shipping_amt; @endphp
															
														
														{{-- $item_tax = $codorderdet->cod_tax; --}}
															@if($prd_tit->coupon_amount != 0)
															@php
																$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
															@endphp
															@else
															@php
																$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt); @endphp
															@endif		
									  

                                     <tr>	
									 <td  width="" align="center">{{ $prd_tit->deal_title }}</td>
										
                                   
                                        <td  width="" align="center">{{ $prd_tit->cod_qty }} </td>

                                          <td  width="" align="center">{{ Helper::cur_sym() }} {{ $prd_tit->cod_amt }} </td>
 
                                            <td  width="" align="center">{{ Helper::cur_sym() }} {{ $subtotal }}
<td  width="" align="center">{{ $payment_status }}</td>
											<td  width="" align="center">{{ $orderstatus }}</td>											</td>

                                             

                                              

                                    </tr>
									@endforeach
                                    </table>
                                  </div>
                                    <br>

                                    <hr>

                                    <div class="row">
                                      <div class="col-lg-12">
                                    <div class="col-lg-6"></div>

                                     <div class="col-lg-6">

                               <span>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SHIPMENT_VALUE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SHIPMENT_VALUE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPMENT_VALUE') }}<b class="pull-right" style="margin-right:15px;">{{ Helper::cur_sym() }} {{ $total_ship_amt }}</b></span><br>

                                        <span>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_TAX')!= ''))? trans(Session::get('admin_lang_file').'.BACK_TAX') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TAX') }}<b class="pull-right"style="margin-right:15px;">{{ Helper::cur_sym() }} {{ $total_tax_amt }}</b></span>

                                        <hr>



                                       <span>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT')!= ''))? trans(Session::get('admin_lang_file').'.BACK_AMOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT') }}<b class="pull-right"style="margin-right:15px;">{{ Helper::cur_sym() }} <?php echo $grand_total;?></b></span>

                                     </div></div>

                                    </div>

                        

                                        

                                        <div class="modal-footer">

                                            <button data-dismiss="modal" class="btn btn-danger" type="button">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_CLOSE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_CLOSE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CLOSE') }}</button>

                                            

                                        </div>

                                    </div>

                                </div>

                            </div>



   @php $i=$i+1; @endphp       @endforeach   

    <!-- FOOTER -->

    <div id="footer">

       {!! $adminfooter !!}

    </div>

    <!--END FOOTER -->





     <!-- GLOBAL SCRIPTS -->

    <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>

     <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- END GLOBAL SCRIPTS -->   

       <script src="{{ url('') }}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>

    <script src="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>

     <script>

         $(document).ready(function () {

             $('#dataTables-example').dataTable();

         });

    </script>





<script type="text/javascript">
	$.ajaxSetup({
		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});
</script>  
</body>

     <!-- END BODY -->

</html>

