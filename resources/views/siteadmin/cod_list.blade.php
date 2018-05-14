<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CASH_ON_DELIVERY')}} @endif </title>
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
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/success.css" />
     <link href="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
      @php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('')}}/public/assets/favicon/{{ $fav->imgs_name }}">
@endif		

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
                                <li class="active"><a > @if (Lang::has(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CASH_ON_DELIVERY')}} @endif</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CASH_ON_DELIVERY')}} @endif</h5>
            
        </header>
        <div id="div-1" class="accordion-body collapse in body">
            
			{!! Form::open(['class' => 'form-horizontal']) !!}
   <div class="table-responsive panel_marg_clr ppd">
       <table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
                                    <thead>
                                       <tr role="row">
                                        <th aria-sort="ascending" aria-label="S.No: activate to sort column ascending" style="width: 99px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
                                        <th aria-label="Customers: activate to sort column ascending" style="width: 111px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_NAME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_NAME')}} @endif</th>
                                        <th aria-label="Product Title: activate to sort column ascending" style="width: 219px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_NAME')!= ''))? trans(Session::get('admin_lang_file').'.BACK_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NAME') }}</th>
                                        <th aria-label="Amount(S/): activate to sort column ascending" style="width: 125px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL_ID')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EMAIL_ID')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL_ID')}} @endif</th>
                                        <th aria-label="Amount(S/): activate to sort column ascending" style="width: 125px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DATE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DATE')}} @endif</th>
                                        <th aria-label=" Tax (S/): activate to sort column ascending" style="width: 119px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADDRESS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS')}} @endif</th>
                                        <th aria-label=" Tax (S/): activate to sort column ascending" style="width: 119px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_DETAILS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_DETAILS')}} @endif</th>
                                       <!-- <th aria-label="Transaction Date: activate to sort column ascending" style="width: 125px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DELIVERY_STATUS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DELIVERY_STATUS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DELIVERY_STATUS');} ?></th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                  @php $i=1; @endphp
								   	@foreach($coddetail as $cod)
								     
								   @php
								   $orderstatus="";
								   $status=$cod->cod_status; @endphp
										     	@if($cod->cod_status==1)
											 @php
											$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SUCCESS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS');
												
											 @endphp
											@elseif($cod->cod_status==2) 
											 @php
											$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_COMPLETED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETED');
												
											 @endphp
											@elseif($cod->cod_status==3) 
											 @php
											$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_HOLD')!= ''))? trans(Session::get('admin_lang_file').'.BACK_HOLD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOLD');
												
											 @endphp
											@elseif($cod->cod_status==4) 
											 @php
											$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_FAILED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_FAILED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED');
												
											 @endphp
											@endif
			
									
										
								<tr class="gradeA odd">
                                            <td class="sorting_1">{{  $i }}</td>
                                            <td class="     ">
                                            <ul>
											<?php
											$product_data = DB::table('nm_ordercod')
											->orderBy('cod_date', 'desc')
											->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
											->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
											->where('nm_ordercod.cod_transaction_id', '=',$cod->cod_transaction_id)
											->where('nm_ordercod.cod_order_type', '=',1)
											->get(); ?>
                                        
											@foreach($product_data as $product_datavalues)
												
											 @php
												echo '<li style="list-style:upper-roman; text-align:left;">'. $product_datavalues->pro_title.'.</li>';   @endphp
																							
											


											@endforeach
											</ul>
											</td>
                                            <td class="       ">{{ $cod->cus_name }}</td>
                                            <td class="center">{{ $cod->cus_email }}</td>
                                            <td class="center">{{ $cod->cod_date }}</td>
                                            <td class="center">{{ $cod->ship_address1 }}</td>
											   
                                            <td class="center"><a class="btn btn-success" data-target="<?php echo '#uiModal'.$i;?>" data-toggle="modal"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_VIEW_DETAILS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_VIEW_DETAILS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_VIEW_DETAILS');} ?></a></td>
                                              <!--<td class="center       "><?php echo $orderstatus;?></td>-->
									  </tr>
                                      
                                     <?php   $i=$i+1; ?>
                                        @endforeach
                                        </tbody>
                                </table>
                              </div>

                               
        </div>
           
		   {!! Form::close() !!}
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
										 <div class="form-group">
                                            <label>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_COUPEN_CODE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_COUPEN_CODE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_COUPEN_CODE')}} @endif</label>
                                            <input class="form-control">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADDRESS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS')}} @endif&nbsp;:&nbsp;</label>
                                          asdsa,,California,Canadian
                                        </div>
                                        <div class="form-group">
                                            <label>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_MESSAGE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_MESSAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MESSAGE') }}</label>
											
											{{ Form::textarea('','', array('class' => 'form-control','id' => 'text4')) }}
                                         
                                        </div>
                                        
                                       
                                    {{ Form::close() }}
                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-default" type="button">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_CLOSE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_CLOSE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CLOSE') }}</button>
                                            <button class="btn btn-success" type="button">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SEND')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SEND') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SEND') }}<</button>
                                        </div>
                                    </div>
                                </div>  </div>
     <!--END MAIN WRAPPER -->
 @php $i=1; @endphp
@foreach($coddetail as $coddetails)
 @php  

$status=$coddetails->cod_status; @endphp
@if($coddetails->cod_status==1)
@php
$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SUCCESS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS');
@endphp
@elseif($coddetails->cod_status==2) 
@php
$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_COMPLETED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETED');
@endphp
@elseif($coddetails->cod_status==3) 
@php
$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_HOLD')!= ''))? trans(Session::get('admin_lang_file').'.BACK_HOLD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOLD');
@endphp
@elseif($coddetails->cod_status==4) 
@php
$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_FAILED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_FAILED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED');
@endphp
@endif
@php
$all_tax_amt  =0 ;
$all_shipping_amt =0;
$item_total=0;  $coupon_amount=0;
$subtotal =0;
$wallet_amt=0;

    $tax_amt = (($coddetails->cod_amt * $coddetails->cod_tax)/100);
    $all_tax_amt+=   (($coddetails->cod_amt * $coddetails->cod_tax)/100);

    $cod_shipping_amt = $coddetails->cod_shipping_amt;
    $all_shipping_amt+= $coddetails->cod_shipping_amt; @endphp
   
   

    @if($coddetails->coupon_amount !=0){
      @php  $coupon_value = $coddetails->coupon_amount; @endphp
        
    @else
		@php
         $coupon_value = 0; @endphp
    @endif

   
@php
    $wallet = DB::table('nm_ordercod_wallet')->where('cod_transaction_id','=',$coddetails->cod_transaction_id)->get();
   @endphp
    @if(count($wallet)!=0)
    @php    $wallet_amt = $wallet[0]->wallet_used; @endphp
    @else
		@php
        $wallet_amt = 0;
    @endphp
	@endif
    
	@php
    $item_total = $coddetails->cod_amt;
    $sub_total = ($item_total+$tax_amt+$cod_shipping_amt);
    $sub_total = ($sub_total - $coupon_value);
    $grand_total = ($sub_total - $wallet_amt);

@endphp




<div  id="<?php echo 'uiModal'.$i?>" class="modal fade in invoice-top" style="display:none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="border-bottom:none; overflow: hidden;background: #f5f5f5;">
                                             <div class="col-lg-4"><img src="<?php echo $SITE_LOGO; ?>" alt="@if (Lang::has(Session::get('admin_lang_file').'.LOGO')!= '') {{  trans(Session::get('admin_lang_file').'.LOGO')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.LOGO')}} @endif"></div>
                                                 <div class="col-lg-4" style="padding-top: 10px; text-align: center;"><strong>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_TAX_INVOICE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_TAX_INVOICE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TAX_INVOICE') }} </strong></div>
                                                  <div class="col-lg-4" style="text-align: right;"><a href="" style="color:#d9534f" class="" data-dismiss="modal" CLASS="pull-right"><i class="icon-remove-sign icon-2x"></i></a></div>
                                        </div>
                                    <hr style="margin-top: 0px;">
                                      <div class="row">
                                      <div class="col-lg-12">
                                      <div class="col-lg-6">
                                      <h4>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CASH_ON_DELIVERY') }}</h4>
									  @if($coddetails->cod_status == 1) 
									  <b>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT_PAID')!= ''))? trans(Session::get('admin_lang_file').'.BACK_AMOUNT_PAID') : trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT_PAID') }}
									  @else 
                                      <b>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT_TO_PAY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_AMOUNT_TO_PAY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT_TO_PAY') }}
									  @endif
									  
									  :{{ Helper::cur_sym() }} <?php
									  $product_titles=DB::table('nm_ordercod')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')
									  ->where('cod_transaction_id', '=', $coddetails->cod_transaction_id)
									  ->where('nm_ordercod.cod_order_type', '=',1)
									  ->get();
									  $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0;  ?>
									  @foreach($product_titles as $prd_tit) 
										  	@php 
																$status=$prd_tit->cod_status; 
											
										  $subtotal=$prd_tit->cod_amt; 
																$tax_amt = (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
															
																$total_tax_amt+= (($prd_tit->cod_amt * $prd_tit->cod_tax)/100); 
																$total_ship_amt+= $prd_tit->cod_shipping_amt;
																$total_item_amt+=$prd_tit->cod_amt;
																$coupon_amount+= $prd_tit->coupon_amount;
																$prodct_id = $prd_tit->cod_pro_id;
																
														$item_amt = $prd_tit->cod_amt + (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
															
														
															 $ship_amt = $prd_tit->cod_shipping_amt; @endphp
															
														
														{{--  $item_tax = $codorderdet->cod_tax; --}}
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
									  
                                      <span>({{ ((Lang::has(Session::get('admin_lang_file').'.BACK_INCLUSIVE_OF_ALL_CHARGES')!= ''))? trans(Session::get('admin_lang_file').'.BACK_INCLUSIVE_OF_ALL_CHARGES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_INCLUSIVE_OF_ALL_CHARGES') }})</span>
                                     <br>
                                     <span>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ORDER_ID')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ORDER_ID') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ORDER_ID') }} : {{ $coddetails->cod_transaction_id }}</span><br>
                                      @if($coddetails->tax_type != '' && $coddetails->tax_id_number != '')
                                     <span> {{ $coddetails->tax_type }} : {{ $coddetails->tax_id_number }}</span>
                                       <br> @endif                                       
 <span>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ORDER_DATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ORDER_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ORDER_DATE') }}: {{ $coddetails->cod_date }}</span>
                                      </div>
                                          <div class="col-lg-6" style="border-left:1px solid #eeeeee;">
                                          <h4>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SHIPPING_DETAILS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SHIPPING_DETAILS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPPING_DETAILS') }}</h4>
                                          
										  <?php $explode = explode(',',$coddetails->cod_ship_addr);
                                          foreach($explode as $addr){
                                            //echo $addr.'<br>';
                                          }?>
										   {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_NAME')!= ''))? trans(Session::get('admin_lang_file').'.BACK_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NAME') }}: {{  $coddetails->ship_name }}<br>
										   
										   {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL')!= ''))? trans(Session::get('admin_lang_file').'.BACK_EMAIL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL') }}  : {{ $coddetails->ship_email }}<br>
										   
                                          {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS1')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ADDRESS1') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS1') }} : {{ $coddetails->ship_address1 }}<br>
										  
										    {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS2')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ADDRESS2') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS2') }} : {{ $coddetails->ship_address2 }}<br>
										  
										   {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_CITY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY') }} : {{ $coddetails->ship_ci_id }}<br>
										   
                        {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_STATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_STATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_STATE') }}  : {{ $coddetails->ship_state }}<br>
						
                          {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_COUNTRY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY') }} : {{ $coddetails->ship_country }}<br>
										   
										  {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ZIPCODE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ZIPCODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ZIPCODE') }}: {{ $coddetails->ship_postalcode }}<br>
                                          {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_PHONE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_PHONE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PHONE') }} : {{ $coddetails->ship_phone }}
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
                     
                     <div class="table-responsive">                 <br>
							   <table class="inv-table" style="width:98%;" align="center" border="1" bordercolor="#e6e6e6">
                                     <tr style="border-bottom:1px solid #e6e6e6; background:#f5f5f5;">
									<th  width="" align="center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_NAME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_NAME')}} @endif</th>
                                    <th  width="" align="center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_COLOR')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_COLOR')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COLOR')}} @endif</th>
                                      <th  width="" align="center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SIZE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SIZE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SIZE')}} @endif</th>
                                        <th  width="" align="center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_QUANTITY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_QUANTITY')}}  @else {@ trans($ADMIN_OUR_LANGUAGE.'.BACK_QUANTITY')}} @endif</th>
                                         <th  width="" align="center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRICE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRICE')}} @endif</th>
                                            <th  width="" align="center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SUB_TOTAL')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SUB_TOTAL')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SUB_TOTAL')}} @endif</th>
											
															<th  width="" align="center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_AMOUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_COUPON_AMOUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_AMOUNT')}} @endif</th>
															 <th  width="" align="center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PAYMENT_STATUS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PAYMENT_STATUS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYMENT_STATUS')}} @endif</th>
                                             <th  width="" align="center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELIVERY_STATUS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_DELIVERY_STATUS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELIVERY_STATUS')}} @endif</th>
                                         <?php //$subtotal=$coddetails->cod_qty*$coddetails->cod_amt;  ?>   
                                    </tr>
									  <?php
									  $product_titles=DB::table('nm_ordercod')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')->where('cod_transaction_id', '=', $coddetails->cod_transaction_id)
									  ->where('nm_ordercod.cod_order_type', '=',1)->get();
									  $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0;  ?>
									  @foreach($product_titles as $prd_tit) 
										  	
													@php			$status=$prd_tit->delivery_status; @endphp
											@if($prd_tit->delivery_status==1)
											@php
											$orderstatus="Order Placed";
											@endphp
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
											$orderstatus="Delivered";
											@endphp
											@elseif($prd_tit->delivery_status==5)
                      @php
                        $orderstatus="cancel pending";
                      @endphp
                      @elseif($prd_tit->delivery_status==6) 
                      @php
                      $orderstatus="cancelled";
                      @endphp
                      @elseif($prd_tit->delivery_status==7) 
                      @php
                      $orderstatus="return pending";
                      @endphp
                      @elseif($prd_tit->delivery_status==8) 
                      @php
                      $orderstatus="Returned";
                      @endphp
					  @elseif($prd_tit->delivery_status==9) 
                      @php
                      $orderstatus="Replace Pending";
                      @endphp
                      @elseif($prd_tit->delivery_status==10) 
                     @php
                      $orderstatus="Replaced";
                      @endphp
					  @else
					  @php $orderstatus = '';  @endphp
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
											$payment_status="Faild";
											@endphp
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
															
														
															 $ship_amt = $prd_tit->cod_shipping_amt;
															@endphp
														
															 
															@if($prd_tit->coupon_amount != 0)
															@php
																$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
															@endphp
															@else
															@php
																$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt);
															@endphp
															@endif		
									 
                                   
                                    
                                    
                                     <tr>	
									 <td  width="" align="center">{{ $prd_tit->pro_title }}</td>
                                    <td  width="" align="center">{{ $prd_tit->co_name }}</td>
                                      <td  width="" align="center">{{ $prd_tit->si_name }}</td>
                                        <td  width="" align="center">{{ $prd_tit->cod_qty }} </td>
                                          <td  width="" align="center">{{ Helper::cur_sym() }} {{ $prd_tit->cod_prod_unitPrice }} <?php //echo $prd_tit->pro_disprice;?> </td>
                                            <td  width="" align="center">{{ Helper::cur_sym() }}{{ $subtotal - $prd_tit->coupon_amount }} </td>
											@if($prd_tit->coupon_amount != 0) 
															<td  width="" align="center">{{ Helper::cur_sym() }} {{ $prd_tit->coupon_amount  }} </td>
															@else  <td  width="" align="center">{{ Helper::cur_sym() }} {{ $prd_tit->coupon_amount }} </td>@endif
															<td  width="" align="center">{{ $payment_status }}</td>
											<td  width="" align="center">{{ $orderstatus }}</td>											</td>
                                             
                                              
                                    </tr>
									 @endforeach
									 
                                    </table></div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                      <div class="col-lg-12">
                                    <div class="col-lg-6"></div>
                                     <div class="col-lg-6">

                               <div>@if (Lang::has(Session::get('admin_lang_file').'.BACK_SHIPMENT_VALUE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SHIPMENT_VALUE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPMENT_VALUE')}} @endif<p class="pull-right" style="margin-right:15px;">{{ Helper::cur_sym() }} {{ $total_ship_amt  }} </p></div><br>
                                        <div>@if (Lang::has(Session::get('admin_lang_file').'.BACK_TAX')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TAX')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TAX')}} @endif<p class="pull-right"style="margin-right:15px;">{{ Helper::cur_sym() }} {{  $total_tax_amt }}</p></div>
                                        <hr>


                                     @if(count($wallet)!=0)
                                        <span>wallet : <b class="pull-right"style="margin-right:15px;">- {{ Helper::cur_sym() }}{{ $wallet_amt }}</b></span><br>
                                     @endif

                                     <!--<?php   if($coddetails->coupon_amount !=0){ ?>
                                         <span>coupon Code : <b class="pull-right"style="margin-right:15px;">- {{ Helper::cur_sym() }} <?php echo $coupon_value;?></b></span><br>
<?php                                }
                                     ?>-->
                                       <strong><div>@if (Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_AMOUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT')}} @endif<b class="pull-right"style="margin-right:15px;">{{ Helper::cur_sym() }} {{ $grand_total }}</b></div></strong>
                                     </div>
                                     </div>
                                    </div>
                        
                                        
                                        <div class="modal-footer">
										
                                            <button data-dismiss="modal" class="btn btn-danger" type="button">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CLOSE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CLOSE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CLOSE')}} @endif</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

  @php $i=$i+1;  @endphp
@endforeach   
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

		  <script type="text/javascript">
	   $.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	   });
	</script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable({
              "scrollX": true
             });
         });
    </script>
  <script type="text/javascript">

  </script>
</body>
     <!-- END BODY -->
</html>
