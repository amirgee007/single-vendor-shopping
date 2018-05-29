<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} |    @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_PRODUCTS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_PRODUCTS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_PRODUCTS')}} @endif    </title>
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
	 <link href="public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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

			<!--<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">-->
			<link href="{{ url('')}}/public/assets/css/jquery-ui.css" rel="stylesheet">
</head>
     <!-- END HEAD -->

     <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap">
 <!-- HEADER SECTION -->
         {!! $adminheader !!}
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
       {!! $adminleftmenus !!}
        <!--END MENU SECTION -->


		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">

                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME')}} @endif</a></li>
                                <li class="active"><a >  @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_PRODUCTS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_PRODUCTS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_PRODUCTS')}} @endif                    </a></li>
                            </ul>
                    </div>
                </div>

  <center><div class="cal-search-filter">
  {{ Form::open(array('action' => 'ProductController@manage_product','method'=> 'POST')) }}

							<input type="hidden" name="_token"  value="{!!  csrf_token() !!}">
							 <div class="row">
							 <br>


							   <div class="col-sm-3">
							    <div class="item form-group">
							<div class="col-sm-6 date-top">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_FROM_DATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_FROM_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FROM_DATE') }}</div>
							<div class="col-sm-6 place-size">
 <span class="icon-calendar cale-icon"></span>
							 <input type="text" name="from_date" placeholder="DD/MM/YYYY"  class="form-control" id="datepicker-8" value="{{$from_date}}"  readonly>

							  </div>
							  </div>
							   </div>
							    <div class="col-sm-3">
							    <div class="item form-group">
							<div class="col-sm-6 date-top">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_TO_DATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_TO_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TO_DATE') }}</div>
							<div class="col-sm-6 place-size">
 <span class="icon-calendar cale-icon"></span>
							 <input type="text" name="to_date" placeholder="DD/MM/YYYY"  id="datepicker-9" class="form-control" value="{{$to_date}}"  readonly>

							  </div>
							  </div>
							   </div>

							   <div class="form-group">
							   <div class="col-sm-2">
							 <input type="submit" name="submit" class="btn btn-block btn-success" value="{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SEARCH')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SEARCH') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SEARCH') }}">
							 </div>
                             <div class="col-sm-2">
								<a href="{{ url('').'/manage_product' }}"><button type="button" name="reset" class="btn btn-block btn-info">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= ''))? trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button></a>
							 </div>
							</div>
							{{ Form::close() }}
							 </div>
							 </center>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>   @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_PRODUCTS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_PRODUCTS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_PRODUCTS')}} @endif                  </h5>

        </header>
        @if (Session::has('block_message'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('block_message') !!}
	{{ Form::button('x',['class' => 'close' , 'aria-hidden' => 'true', 'data-dismiss' =>'alert']) }}
        </div>
		@endif
		<div style="display: none;" class="la-alert rec-select alert-success alert-dismissable">Select atleast one Product
		{{ Form::button('x',['class' => 'close closeAlert' , 'aria-hidden' => 'true']) }}
         </div>
         <div style="display: none;" class="la-alert date-select1 alert-success alert-dismissable">End date should be greater than Start date!
         {{ Form::button('x',['class' => 'close closeAlert' , 'aria-hidden' => 'true']) }}</div>
		 <div style="display: none;" class="la-alert rec-update alert-success alert-dismissable">Record Updated Successfully
         {{ Form::button('x',['class' => 'close closeAlert' , 'aria-hidden' => 'true']) }}</div>

    <div class="manage-filter"><span class="squaredFour">
      <input  type="checkbox" name="chk[]" onchange="checkAll(this)" id="check_all"/>
      <label for="check_all">Check all</label>
    </span>&nbsp;
	{{ Form::button('Block',['class' => 'btn btn-primary' , 'id' => 'Block_value']) }}
	{{ Form::button('Un Block',['class' => 'btn btn-warning' , 'id' => 'UNBlock_value']) }}
	{{ Form::button('Delete',['class' => 'btn btn-warning' , 'id' => 'Delete_value']) }}
        <a class="btn btn-success" href="<?php echo url("download_all_products"); ?>">Export All Products</a>


        <div id="div-1" class="accordion-body collapse in body">

        	  <div class="table-responsive panel_marg_clr ppd">
		   <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr role="row">
										 <th aria-label="S.No: activate to sort column ascending" style="width: 61px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc" aria-sort="ascending"></th>
										<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 59px;" aria-label="S.No: activate to sort column ascending" aria-sort="ascending">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 67px;" aria-label="Deals Name: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_NAME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_NAME')}} @endif</th>


										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 135px;" aria-label="Original Price($): activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ORIGINAL_PRICE')}}@endif ({{ Helper::cur_sym() }})</th>
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 154px;" aria-label="Discounted Price($): activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DISCOUNTED_PRICE')}} @endif   ({{ Helper::cur_sym() }})</th>
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 154px;" aria-label="Discounted Price($): activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_WHOLESALE_PRICE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_WHOLESALE_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_WHOLESALE_PRICE')}} @endif   ({{ Helper::cur_sym() }})</th>
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 40px;" aria-label=" Deal Image : activate to sort column ascending"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_IMAGE')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_PRODUCT_IMAGE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_IMAGE')}} @endif</th>

										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 90px;" aria-label="Actions: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ACTIONS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ACTIONS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIONS')}} @endif</th>

										<!-- <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 74px;" aria-label="Preview: activate to sort column ascending">Preview</th> -->
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 100px;" aria-label="Deal details: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_DETAILS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_DETAILS')}} @endif</th>
										</tr>
                                    </thead>
                                    <tbody>
<?php $i = 1 ; ?>
  @if(isset($_POST['submit']))

			@if(count($productrep)>0)
					<?php
			$Block = ((Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK')!= ''))? trans(Session::get('admin_lang_file').'.BACK_BLOCK') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK');
			$Unblock = ((Lang::has(Session::get('admin_lang_file').'.BACK_UNBLOCK')!= ''))? trans(Session::get('admin_lang_file').'.BACK_UNBLOCK') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UNBLOCK'); ?>
				@foreach($productrep as $row)

							@if($row->pro_no_of_purchase < $row->pro_qty)

									@php  $product_get_img = explode("/**/",$row->pro_Img); @endphp

									  @if($row->pro_status == 1)
									  <?php
										  $process = "<a href='".url('block_product/'.$row->pro_id.'/0')."' data-tooltip='$Block'> <i style='margin-left:10px;' class='icon icon-ok icon-me'></i> </a>"; ?>
								  @elseif($row->pro_status == 0)
								  <?php
										   $process = "<a href='".url('block_product/'.$row->pro_id.'/1')."' data-tooltip='$Unblock'> <i style='margin-left:10px;' class='icon icon-ban-circle icon-me'></i> </a>"; ?>
									  @endif
                                    <tr class="gradeA odd">
                                    		 <td  class="text-center">
							                   <input type="checkbox" class="table_id" value="<?php echo $row->pro_id; ?>" name="chk[]">
							                </td>
                                            <td class="sorting_1">{{ $i }}</td>
                                            <td class="  ">{{ substr($row->pro_title,0,45) }}</td>

                                            <td class="center  ">{{ Helper::cur_sym() }} {{ $row->pro_price }} </td>
                                            <td class="center  ">{{ Helper::cur_sym() }} {{ $row->pro_disprice }}</td>
                                            <td class="center  ">{{ Helper::cur_sym() }} {{ $row->wholesale_price }}</td>
                                            <td class="center  ">
											@php
											$pro_img = $product_get_img[0];
										   $prod_path = url('').'/public/assets/default_image/No_image_product.png'; @endphp

											@if($product_get_img != '') {{--  image is null --}}

												@php

												  $img_data = "public/assets/product/".$pro_img; @endphp
													  @if(file_exists($img_data) && $pro_img !='')  {{-- image not exists in folder  --}}
																@php
																					$prod_path = url('').'/public/assets/product/'.$pro_img;
																			 @endphp
													  @else
															 @if(isset($DynamicNoImage['productImg']))
															 @php
								$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg']; @endphp
							@if($DynamicNoImage['productImg'] !='' && file_exists($dyanamicNoImg_path))
																@php
										$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg'];
																@endphp
																@endif

															 @endif


															@endif

										@else


													@if(isset($DynamicNoImage['productImg'])) {{--  check no_image_product is exist  --}}
															 	@php
									$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg']; @endphp
							@if($DynamicNoImage['productImg'] !='' && file_exists($dyanamicNoImg_path))
																@php
								$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg'];
																@endphp
																@endif

															 @endif

												@endif


											<a><img style="height:40px;" src=" {{ $prod_path }} "></a></td>
											<!--<td><?php //echo date("m-d-Y", strtotime($product_list->created_date));?></td>-->

										  <?php $get_productpurchase_count = DB::table('nm_product')->where('pro_no_of_purchase', '>', 0)->where('pro_id', '=', $row->pro_id)->count(); ?>

                                            <td class="center  ">
                                                <a href="{{ url('edit_product/'.$row->pro_id) }}" data-tooltip="Edit"><i class="icon icon-edit"></i></a>
                                                @php echo  $process;  @endphp
                                                @if($get_productpurchase_count == 0)
                                                    <a href="{{ url('delete_product')}}/<?php echo $row->pro_id; ?>" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DELETE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE')}} @endif"><i class="icon icon-trash icon-1x" style='margin-left:10px;'></i></a>
												@endif
                                          <?php  /* else { foreach($delete_product as $dp) { }
													if($dp->order_pro_id != $row->pro_id) { ?> 
                                                    <a href="<?php echo url('delete_product'); ?>/<?php echo $row->pro_id; ?>" data-tooltip="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DELETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE');} ?>"><i class="icon icon-trash icon-1x" style='margin-left:10px;'></i></a>
                                         <?php } } */ ?>
                                            </td>
                                            <td class="center  "><a href="{{ url('product_details')."/".$row->pro_id }}">@if (Lang::has(Session::get('admin_lang_file').'.BACK_VIEW_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_VIEW_DETAILS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_VIEW_DETAILS')}} @endif</a></td>
                                        </tr>
									<?php $i++; ?>
									@endif
									@endforeach
									@endif

			@else

				@if(count($product_details)>0)
					<?php
$Block = ((Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK')!= ''))? trans(Session::get('admin_lang_file').'.BACK_BLOCK') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK');
$Unblock = ((Lang::has(Session::get('admin_lang_file').'.BACK_UNBLOCK')!= ''))? trans(Session::get('admin_lang_file').'.BACK_UNBLOCK') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UNBLOCK'); ?>
						@foreach($product_details as $product_list)
							@if($product_list->pro_no_of_purchase < $product_list->pro_qty)

									 @php $product_get_img = explode("/**/",$product_list->pro_Img); @endphp
									  @if($product_list->pro_status == 1)
									  @php
										  $process = "<a href='".url('block_product/'.$product_list->pro_id.'/0')."' data-tooltip='$Block'> <i style='margin-left:10px;' class='icon icon-ok icon-me'></i> </a>";
										@endphp
									  @elseif($product_list->pro_status == 0)
										@php
										  $process = "<a href='".url('block_product/'.$product_list->pro_id.'/1')."' data-tooltip='$Unblock'> <i style='margin-left:10px;' class='icon icon-ban-circle icon-me'></i> </a>";  @endphp
									  @endif
                                    <tr class="gradeA odd">
									 <td  class="text-center">
                   <input type="checkbox" class="table_id" value="<?php echo $product_list->pro_id; ?>" name="chk[]">
                </td>
                                            <td class="sorting_1">{{ $i }}</td>
                                            <td class="  ">{{ substr($product_list->pro_title,0,45)}} </td>

                                            <td class="center  ">{{ Helper::cur_sym() }} {{ $product_list->pro_price }}</td>
                                            <td class="center  ">{{ Helper::cur_sym() }} {{ $product_list->pro_disprice }}</td>
                                            <td class="center  ">{{ Helper::cur_sym() }} {{ $product_list->wholesale_price }}</td>
                                            <td class="center  ">
											@php
											$pro_img = $product_get_img[0];
										   $prod_path = url('').'/public/assets/default_image/No_image_product.png'; @endphp

											@if($product_get_img != '') {{--  image is null --}}

												@php

												  $img_data = "public/assets/product/".$pro_img; @endphp
													  @if(file_exists($img_data) && $pro_img !='')  {{-- image not exists in folder  --}}
																	@php
																					$prod_path = url('').'/public/assets/product/'.$pro_img;
																			 @endphp
													  @else
															 @if(isset($DynamicNoImage['productImg']))
															 @php
																$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg']; @endphp
																@if($DynamicNoImage['productImg'] !='' && file_exists($dyanamicNoImg_path))
																@php
																	$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg'];
																@endphp
																@endif

															 @endif


															@endif

										@else


													@if(isset($DynamicNoImage['productImg'])) {{--  check no_image_product is exist  --}}
															 		@php
																$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg']; @endphp
																@if($DynamicNoImage['productImg'] !='' && file_exists($dyanamicNoImg_path))
																@php
																	$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg'];
																@endphp
																@endif

															 @endif

												@endif

											<a><img style="height:40px;" src=" {{ $prod_path }} "></a></td>
											<!--<td><?php //echo $product_list->created_date;?></td>-->

										  <?php $get_productpurchase_count = DB::table('nm_product')->where('pro_no_of_purchase', '>', 0)->where('pro_id', '=', $product_list->pro_id)->count(); ?>
                                            <td class="center  "><a href="#">
                                           <a href="{{ url('edit_product/'.$product_list->pro_id) }}" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT')}} @endif"> <i class="icon icon-edit" style="margin-left:15px;"></i></a>
											   <?php echo  $process;  ?>
                                             @if($get_productpurchase_count == 0)
                                                <a href="{{ url('delete_product')."/".$product_list->pro_id }}" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DELETE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE')}}@endif"><i class="icon icon-trash icon-1x" style="margin-left:14px;"></i></a>
												@endif
                                             <?php  /* else { foreach($delete_product as $dp) { }
                                                        if($dp->order_pro_id != $product_list->pro_id) { ?> 
                                                            <a href="<?php echo url('delete_product')."/".$product_list->pro_id; ?>" data-tooltip="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DELETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE');} ?>"><i class="icon icon-trash icon-1x" style="margin-left:14px;"></i></a> 
                                                      <?php } 
                                                     } */ ?>
                                            </td>

							<td class="center"><a class="btn btn-success" href="{{ url('product_details')."/".$product_list->pro_id }}">@if (Lang::has(Session::get('admin_lang_file').'.BACK_VIEW_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_VIEW_DETAILS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_VIEW_DETAILS')}} @endif</a></td>
                                        </tr>
									<?php $i++;
												?>
												@endif
												@endforeach
												@endif
												@endif
				 </tbody>
                                </table></div>



        </div>
    </div>
</div>

    </div>

                    </div>




                </div>
            <!--END PAGE CONTENT -->

        </div>

     <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
      {!! $adminfooter !!}
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
     <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="{{ url('') }}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
    <!-- END GLOBAL SCRIPTS -->
      <!--<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->
		  <script src="{{url('')}}/public/assets/js/jquery-ui.js"></script>

	   <script>
         $(function() {
            $( "#datepicker-8" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: false
            });
            $( "#datepicker-9" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: true
            });
         });
         /** Check start date and end date**/
         $("#datepicker-8,#datepicker-9").change(function() {
    var startDate = document.getElementById("datepicker-8").value;
    var endDate = document.getElementById("datepicker-9").value;
     if (this.id == 'datepicker-8') {
              if ((Date.parse(endDate) <= Date.parse(startDate))) {
                    $('#datepicker-8').val('');
                   $(".date-select1").css({"display" : "block"});
                    return false;
                }
            }

             if(this.id == 'datepicker-9') {
                if ((Date.parse(endDate) <= Date.parse(startDate))) {
                    $('#datepicker-9').val('');
                     $(".date-select1").css({"display" : "block"});
                     return false;
                    //alert("End date should be greater than Start date");
                }
                }


      //document.getElementById("ed_endtimedate").value = "";

  });
/*Start date end date check ends*/
      </script>

	  <script type="text/javascript">
	   $.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	   });
	</script>

	 <script type="text/javascript">
	  //Check all checked box
		 function checkAll(ele) {


     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }

 //To block multiple checked
  $(function(){

      $('#Block_value').click(function(){
         $(".rec-select").css({"display" : "none"});
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });  console.log(val);


         if(val=='')
         {

         $(".rec-select").css({"display" : "block"});

         return;
         }


        $.ajax({

          type:'GET',
          url :"<?php echo url("block_product_multiple"); ?>",
          data:{val:val},

          success:function(data,success){
            if(data==0){
              $(".rec-update").css("display", "block");
                window.setTimeout(function(){location.reload()},1000)

                       }
            else if(data==1){
               $(".rec-update").css("display", "block");
                  window.setTimeout(function(){location.reload()},1000)

                           }
          }
        }); });

    });

//To unblock multiple checked

   $(function(){



      $('#UNBlock_value').click(function(){
          $(".rec-select").css("display", "none");
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });  console.log(val);

         if(val=='')
         {
          //location.reload();
        $(".rec-select").css("display", "block");
          return;
         }


        $.ajax({


          type:'GET',
          url :"<?php echo url("unblock_product_multiple"); ?>",
          data:{val:val},

          success:function(data,success){
            if(data==0){
            $(".rec-update").css("display", "block");
                window.setTimeout(function(){location.reload()},1000)
                       }
            else if(data==1){
              $(".rec-update").css("display", "block");

              //location.reload();
               window.setTimeout(function(){location.reload()},1000)
                           }
          }
        }); });

		 });

//multiple delete

  $(function(){

      $('#Delete_value').click(function(){
        $(".rec-select").css({"display" : "none"});
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });  console.log(val);

         if(val=='')
         {
          $(".rec-select").css({"display" : "block"});
          return;
         }


        $.ajax({

          type:'GET',
          url :"<?php echo url("delete_product_page_multiple"); ?>",
          data:{val:val},

          success:function(data,success){
            if(data==0){
              $(".rec-update").css("display", "block");
                window.setTimeout(function(){location.reload()},1000)
                       }
            else if(data==1){
               $(".rec-update").css("display", "block");
                window.setTimeout(function(){location.reload()},1000)
                           }
          }
        }); });

    });






	 $(".closeAlert").click(function(){
    $(".alert-success").hide();
  });

	</script>
</body>
     <!-- END BODY -->
</html>
