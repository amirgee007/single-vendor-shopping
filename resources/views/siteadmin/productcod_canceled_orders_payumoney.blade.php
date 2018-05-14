<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_ORDERS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_CANCEL_ORDERS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_ORDERS') }}</title>
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
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get();  @endphp
     @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
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
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
</head>
     <!-- END HEAD -->

     <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap">
 <!-- HEADER SECTION -->
{!!$merchantheader!!}
        <!-- MENU SECTION -->
{!!$merchantleftmenus!!}
        <!--END MENU SECTION -->

		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a href="#">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ? trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a href="#">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_ORDERS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_CANCEL_ORDERS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_ORDERS') }}</a></li>
                            </ul>
                    </div>
                </div>
				<center><div class="cal-search-filter">
					{{ Form::open(array('action'=>'TransactionController@adm_payu_cancel_orders','method'=>'POST')) }}
		 <!-- <form  action="{!!action('TransactionController@adm_cancel_orders')!!}" method="POST"> -->
							<input type="hidden" name="_token"  value="<?php echo csrf_token(); ?>">
							 <div class="row">
							 <br>
							 
							 
							   <div class="col-sm-3">
							    <div class="item form-group">
							<div class="col-sm-6 date-top">@if (Lang::has(Session::get('admin_lang_file').'.BACK_FROM_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_FROM_DATE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_FROM_DATE') }} @endif</div>
							<div class="col-sm-6 place-size">
 <span class="icon-calendar cale-icon"></span>
 {{ Form::text('from_date',$from_date,array('id'=>'datepicker-8','class'=>'form-control','placeholder'=>'DD/MM/YYYY','required'=>'required','readonly'=>'readonly')) }}
							<!--  <input type="text" name="from_date" placeholder="DD/MM/YYYY" class="form-control" id="datepicker-8"  value="<?php echo $from_date; ?>" required readonly> -->
							 
							  </div>
							  </div>
							   </div>
							    <div class="col-sm-3">
							    <div class="item form-group">
							<div class="col-sm-6 date-top">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TO_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TO_DATE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TO_DATE') }} @endif</div>
							<div class="col-sm-6 place-size">
 <span class="icon-calendar cale-icon"></span>
 {{ Form::text('to_date',$to_date,array('id'=>'datepicker-9','class'=>'form-control','placeholder'=>'DD/MM/YYYY','required'=>'required','readonly'=>'readonly')) }}
							<!--  <input type="text" name="to_date" placeholder="DD/MM/YYYY" id="datepicker-9" class="form-control" value="<?php echo $to_date; ?>" required readonly> -->
							 
							  </div>
							  </div>
							   </div>
							   
							   <div class="form-group">
							   <div class="col-sm-2">
							     <input type="submit" name="submit" class="btn btn-block btn-success" value="@if (Lang::has(Session::get('admin_lang_file').'.BACK_SEARCH')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SEARCH') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SEARCH') }} @endif">
							   </div>
                               <div class="col-sm-2">
								<a href="{{ url('').'/adm_payu_cancel_orders' }}">
									<button type="button" name="reset" class="btn btn-block btn-info">@if (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RESET') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }} @endif</button>
								</a>
							   </div>
							</div>
							
							 {{ Form::close()}}</div>
							 </center>
				
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CANCEL_ORDERS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_ORDERS') }}</h5>
            
        </header>
        <div style="display: none;" class="la-alert date-select1 alert-success alert-dismissable">End date should be greater than Start date!
        	 {{ Form::button('x',['class'=>'close closeAlert','aria-hidden'=>'true'])}}
         <!-- <button type="button" class="close closeAlert"  aria-hidden="true">×</button> --></div>
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal">

                <!--input type="hidden" id="return_url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" /-->
				<input type="hidden" id="return_url" value="{{ URL::to('/') }}" />
				
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
					 <div class="col-lg-4">
					 
		</div><label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>
					  <div class="col-lg-4"></div>
                        
                    </div>
                </div>

                <div class="form-group col-lg-12">
                    	<div id="div-1" class="accordion-body collapse in body">
     		<div class="table-responsive panel_marg_clr ppd">
		   <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                    <thead>
				<tr role="row">	
					<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 69px;" aria-label="S.No: activate to sort column ascending" aria-sort="ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_SNO') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }} @endif</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 78px;" aria-label="Name: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CUSTOMERS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMERS') }} @endif</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 158px;" aria-label="Email: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_TITLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_TITLE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_TITLE') }} @endif</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 88px;" aria-label="City: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_AMOUNT') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT') }} @endif({{ Helper::cur_sym() }})</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 84px;" aria-label="Joined Date: activate to sort column ascending">  @if (Lang::has(Session::get('admin_lang_file').'.BACK_TAX')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TAX') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TAX') }} @endif({{ Helper::cur_sym() }})</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 84px;" aria-label="Joined Date: activate to sort column ascending"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_SHIPMENT_VALUE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SHIPMENT_VALUE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPMENT_VALUE') }} @endif({{ Helper::cur_sym() }})</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 101px;" aria-label="Send Mail: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PAYMENT_STATUS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PAYMENT_STATUS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYMENT_STATUS') }} @endif</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 88px;" aria-label="Edit: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TRANSACTION_DATE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION_DATE') }} @endif</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 72px;" aria-label="Status: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION_TYPE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TRANSACTION_TYPE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION_TYPE') }} @endif</th>
					 <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 72px;" aria-label="Status: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELIVERY_STATUS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_DELIVERY_STATUS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELIVERY_STATUS') }} @endif</th>
					</tr>
                                    </thead>
                                    <tbody>
                                      @php $i = 1 ; @endphp
 @if(isset($_POST['submit']))
			
			@if($calceled_order_all !="") 	
			@foreach($calceled_order_all as $allorders_list) 
					
				@php	$orderstatus=((Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SUCCESS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS');
					$ordertype=""; @endphp
					
					@if($allorders_list->order_paytype==1)
					
					@php	$ordertype=((Lang::has(Session::get('admin_lang_file').'.BACK_PAYUMONEY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_PAYUMONEY'): trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYUMONEY'); @endphp
					
					@else
					
					@php	$ordertype=((Lang::has(Session::get('admin_lang_file').'.BACK_COD')!= ''))? trans(Session::get('admin_lang_file').'.BACK_COD'): trans($ADMIN_OUR_LANGUAGE.'.BACK_COD'); @endphp
					@endif
				@php	$total_tax = ($allorders_list->order_amt * $allorders_list->order_tax)/100 ; @endphp
					
			

					<tr class="gradeA odd">
						<td class="sorting_1">{{ $i }}</td>
						<td class="">{{ $allorders_list->cus_name }}</td>
						<td class="">{{ $allorders_list->pro_title }}</td>
						<td class="center">{{ $allorders_list->order_amt }}</td>
						<td class="center">{{ $total_tax }}</td>
						<td class="center">{{ $allorders_list->order_shipping_amt }}</td>
						<td class="center"><a href="#" class="colr3">{{ $orderstatus }}</a></td>
						<td class="center">{{ $allorders_list->order_date }}</td>
						<td class="center"><a href="#" class="colr2">{{ $ordertype }}</a></td>           
                 
				  @if($allorders_list->delivery_status == 5) 
							<td class="center">@if($allorders_list->order_id==$calceled_order_all[0]->order_id)
								@if($calceled_order_all[0]->cancel_status==1)<a href="javascript:void(0);"  class="btn btn-info" onclick="show_cancel_approved('<?php echo $calceled_order_all[0]->delStatus_id;?>');">Cancel Request</a> @endif @endif
							</td>@elseif($allorders_list->delivery_status == 6)  @if($allorders_list->order_id==$calceled_order_all[0]->order_id) @if($calceled_order_all[0]->cancel_status==2) 
							<td class="center">
								<a href="javascript:void(0);"  class="btn btn-info" onclick="show_cancel_approved('<?php echo $calceled_order_all[0]->order_id;?>');">Cancel Request Processed</a>
							</td>  @else <td>Order Cancelled</td>
							@endif @else <td>Order Cancelled</td> @endif @endif
						
			</tr>

@php $i++; @endphp @endforeach	
		@endif 
@else
	
@if($calceled_order_all !="") 


						@foreach($calceled_order_all as $allorders_list) 
					
				@php	$orderstatus=((Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SUCCESS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS');
					$ordertype=""; @endphp
					
					@if($allorders_list->order_paytype==1)
					
					@php	$ordertype=((Lang::has(Session::get('admin_lang_file').'.BACK_PAYUMONEY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_PAYUMONEY'): trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYUMONEY'); @endphp
					
					@else
					
					@php	$ordertype=((Lang::has(Session::get('admin_lang_file').'.BACK_COD')!= ''))? trans(Session::get('admin_lang_file').'.BACK_COD'): trans($ADMIN_OUR_LANGUAGE.'.BACK_COD'); @endphp
					@endif
				@php	$total_tax = ($allorders_list->order_amt * $allorders_list->order_tax)/100 ; @endphp
					
			
					<tr class="gradeA odd">
						<td class="sorting_1">{{ $i }}</td>
						<td class="">{{ $allorders_list->cus_name }}</td>
						<td class="">{{ $allorders_list->pro_title }}</td>
						<td class="center">{{ $allorders_list->order_amt }}</td>
						<td class="center">{{ $total_tax }}</td>
						<td class="center">{{ $allorders_list->order_shipping_amt }}</td>
						<td class="center"><a href="#" class="colr3">{{ $orderstatus }}</a></td>
						<td class="center">{{ $allorders_list->order_date }}</td>
						<td class="center"><a href="#" class="colr2">{{ $ordertype }}</a></td>          
                
				  @if($allorders_list->delivery_status == 5)  
							<td class="center">@if($allorders_list->order_id==$allorders_list->paypal_order_id) 
								@if($allorders_list->cancel_status==1)<a href="javascript:void(0);"  class="btn btn-info" onclick="show_cancel_approved('<?php echo $allorders_list->delStatus_id;?>');">Cancel Request</a> @endif @endif
							</td>@elseif($allorders_list->delivery_status == 6) 
							 @if($allorders_list->order_id==$allorders_list->paypal_order_id)
							 	 
							 		@if($allorders_list->cancel_status==2)  
							<td class="center">
								<a href="javascript:void(0);"  class="btn btn-info" onclick="show_cancel_approved('<?php echo $allorders_list->delStatus_id;?>');">Cancel Request Processed</a>
							</td>
							@else <td>Order Cancelled</td>
							 @endif

							 @else <td>Order Cancelled</td> @endif @endif
			</tr>

@php $i++; @endphp @endforeach @endif @endif
									
										
										
										
								</tbody>
                                </table></div>

                               
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
<div id="cancel_approved" class="modal fade" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				{{ Form::button('&times;',['class'=>'close','data-dismiss'=>'modal'])}}
				<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
				<h4 class="modal-title">Approve cancel</h4>
			</div>
			<div class="modal-body" id="approve_cancel">
				
			</div>
			<div class="modal-footer">
				{{ Form::button('Close',['class'=>'btn btn-default','data-dismiss'=>'modal'])}}
				<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
			</div>
		</div>

	</div>
</div>
     <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
   {!!$merchantfooter!!}
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
 
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="{{ url('') }}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script> 
    
    
    <script>
	function update_order_cod(id,orderid,proid)
	{
			 var passdata= 'id='+id+"&order_id="+orderid+"&proid="+proid;
			 var pathnametemp =$('#return_url').val();
				/*if(id==1)
				{
					 var  urlrefresh=pathnametemp+"/merchant_product_cod_all_orders";
				}
				else if(id==2)
				{
					
					 var  urlrefresh=pathnametemp+"/merchant_product_cod_completed_orders";
				}
				else if(id==3)
				{
					 var  urlrefresh=pathnametemp+"/merchant_product_cod_hold_orders";
				}
				else if(id==4)
				{
					 var  urlrefresh=pathnametemp+"/merchant_product_cod_failed_orders";
					
				}*/
			  $.ajax( {
			      type: 'get',
				  data: passdata,
				  url: 'update_order_payu_admin',
				  success: function(responseText){ 
			  if(responseText=="success")
				   { 	 
				 	 // window.location=urlrefresh;
					  location.reload();
					//$('#Product_MainCategory').html(responseText);					   
				   }
				}		
			});	
	}

	
	</script>
    
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	    <script>
         $(function() {
            $( "#datepicker-8" ).datepicker({
               prevText:"<?php if (Lang::has(Session::get('admin_lang_file').'.MER_CLICK_FOR_PREVIOUS_MONTHS')!= '') { echo  trans(Session::get('admin_lang_file').'.MER_CLICK_FOR_PREVIOUS_MONTHS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.MER_CLICK_FOR_PREVIOUS_MONTHS');} ?>",
               nextText:"<?php if (Lang::has(Session::get('admin_lang_file').'.MER_CLICK_FOR_NEXT_MONTHS')!= '') { echo  trans(Session::get('admin_lang_file').'.MER_CLICK_FOR_NEXT_MONTHS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.MER_CLICK_FOR_NEXT_MONTHS');} ?>",
               showOtherMonths:true,
               selectOtherMonths: false
            });
            $( "#datepicker-9" ).datepicker({
               prevText:"<?php if (Lang::has(Session::get('admin_lang_file').'.MER_CLICK_FOR_PREVIOUS_MONTHS')!= '') { echo  trans(Session::get('admin_lang_file').'.MER_CLICK_FOR_PREVIOUS_MONTHS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.MER_CLICK_FOR_PREVIOUS_MONTHS');} ?>",
               nextText:"<?php if (Lang::has(Session::get('admin_lang_file').'.MER_CLICK_FOR_NEXT_MONTHS')!= '') { echo  trans(Session::get('admin_lang_file').'.MER_CLICK_FOR_NEXT_MONTHS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.MER_CLICK_FOR_NEXT_MONTHS');} ?>",
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


$(".closeAlert").click(function(){
    $(".alert-success").hide();
  });
      </script> 
<script type="text/javascript">
  $.ajaxSetup({
  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });
</script>
<script>
function show_cancel_approved(data)
{
	$("#cancel_approved").modal("show");
	$("#approve_cancel").load('<?php echo url(''); ?>/adm_get_approve_content_payu/'+data);
}
</script>
</body>
     <!-- END BODY -->
</html>
