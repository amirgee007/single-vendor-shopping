<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} @if (Lang::has(Session::get('admin_lang_file').'.BACK_COD_RETURN_ORDERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_COD_RETURN_ORDERS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COD_RETURN_ORDERS') }} @endif</title>
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
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp 
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
                            	<li class=""><a href="{{ url('siteadmin_dashboard') }}">@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }} @endif</a></li>
                                <li class="active"><a href="#">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RETURN_ORDERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_RETURN_ORDERS') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_RETURN_ORDERS') }}</a></li>
                            </ul>
                    </div>
                </div>			
  <center><div class="cal-search-filter">
		 <form  action="{!!action('TransactionController@adm_deal_return_orders')!!}" method="POST">
							<input type="hidden" name="_token"  value="<?php echo csrf_token(); ?>">
							 <div class="row">
							 <br>
							 
							 
							   <div class="col-sm-3">
							    <div class="item form-group">
							<div class="col-sm-6 date-top">{{(Lang::has(Session::get('admin_lang_file').'.BACK_FROM_DATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FROM_DATE'):   trans($ADMIN_OUR_LANGUAGE.'.BACK_FROM_DATE') }}</div>
							 <div class="col-sm-6 place-size">
 <span class="icon-calendar cale-icon"></span>
 {{ Form::text('from_date',$from_date,array('id'=>'datepicker-8','class'=>'form-control','placeholder'=>'DD/MM/YYYY','required'=>'required','readonly'=>'readonly')) }}
							<!--  <input type="text" name="from_date" placeholder="DD/MM/YYYY"  class="form-control" id="datepicker-8"  value="<?php echo $from_date; ?>" required readonly> -->
							 
							  </div>
							  </div>
							   </div>
							    <div class="col-sm-3">
							    <div class="item form-group">
							<div class="col-sm-6 date-top">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TO_DATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TO_DATE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_TO_DATE') }}</div>
							 <div class="col-sm-6 place-size">
 <span class="icon-calendar cale-icon"></span>
  {{ Form::text('to_date',$to_date,array('id'=>'datepicker-9','class'=>'form-control','placeholder'=>'DD/MM/YYYY','required'=>'required','readonly'=>'readonly')) }}
							<!--  <input type="text" name="to_date" placeholder="DD/MM/YYYY"  id="datepicker-9" class="form-control" value="<?php echo $to_date; ?>" required readonly> -->
							 
							  </div>
							  </div>
							   </div>
							   
							   <div class="form-group">
							   <div class="col-sm-2">
							     <input type="submit" name="submit" class="btn btn-block btn-success" value="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SEARCH')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SEARCH') :   trans($ADMIN_OUR_LANGUAGE.'.BACK_SEARCH') }}">
							   </div>
                               <div class="col-sm-2">
								<a href="{{ url('').'/adm_deal_return_orders' }}">
									<button type="button" name="reset" class="btn btn-block btn-info">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') ? trans(Session::get('admin_lang_file').'.BACK_RESET') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button>
								</a>
							   </div>
							</div>
							
							 </form></div>
							 </center>
				
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RETURN_ORDERS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_RETURN_ORDERS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_RETURN_ORDERS') }}</h5>
            
        </header>
        <div style="display: none;" class="la-alert date-select1 alert-success alert-dismissable">End date should be greater than Start date!
        	 {{ Form::button('x',['class'=>'close closeAlert','aria-hidden'=>'true'])}}
         <!-- <button type="button" class="close closeAlert"  aria-hidden="true">×</button> --></div>
        @if($er_msg!='')
        <div class="alert alert-danger alert-dismissable"  > {{ $er_msg }}
        	{{ Form::button('x',['class'=>'close','aria-hidden'=>'true','aria-hidden'=>'true'])}}
	    	<!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
	    	</div>
	    @endif	
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal">

                <!--input type="hidden" id="return_url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" /-->

   <div class="table-responsive panel_marg_clr ppd">
		   <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                    <thead>
				<tr role="row">	
					<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 69px;" aria-label="S.No: activate to sort column ascending" aria-sort="ascending">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SNO'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 78px;" aria-label="Name: activate to sort column ascending">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMERS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_CUSTOMERS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMERS') }}</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 158px;" aria-label="Email: activate to sort column ascending">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_TITLE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_DEAL_TITLE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_TITLE')}}</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 88px;" aria-label="City: activate to sort column ascending">{{(Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT')!= '') ? trans(Session::get('admin_lang_file').'.BACK_AMOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT') }}({{ Helper::cur_sym() }})</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 84px;" aria-label="Joined Date: activate to sort column ascending">{{(Lang::has(Session::get('admin_lang_file').'.BACK_TAX')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TAX') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TAX') }}({{ Helper::cur_sym() }})</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 84px;" aria-label="Joined Date: activate to sort column ascending">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SHIPMENT_VALUE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SHIPMENT_VALUE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPMENT_VALUE') }}({{ Helper::cur_sym() }})</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 101px;" aria-label="Send Mail: activate to sort column ascending">{{(Lang::has(Session::get('admin_lang_file').'.BACK_PAYMENT_STATUS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_PAYMENT_STATUS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYMENT_STATUS') }}</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 88px;" aria-label="Edit: activate to sort column ascending">{{(Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION_DATE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_TRANSACTION_DATE'): trans($ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION_DATE') }}</th>
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 72px;" aria-label="Status: activate to sort column ascending">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION_TYPE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_TRANSACTION_TYPE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION_TYPE') }}</th>
					 <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 72px;" aria-label="Status: activate to sort column ascending">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELIVERY_STATUS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_DELIVERY_STATUS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_DELIVERY_STATUS') }}</th>
					</tr>
                                    </thead>
                                    <tbody>
                                      @php $i = 1; @endphp
 @if(isset($_POST['submit']))
			
			@if($return_order_all !="") 	
			@foreach($return_order_all as $allorders_list) 
					
				@php	$orderstatus=((Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SUCCESS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS');
					$ordertype=""; @endphp
					
					@if($allorders_list->order_paytype==1)
					
					@php	$ordertype=((Lang::has(Session::get('admin_lang_file').'.BACK_PAYPAL')!= ''))? trans(Session::get('admin_lang_file').'.BACK_PAYPAL'): trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYPAL'); @endphp
					
					@elseif($allorders_list->order_paytype==2)
					
					@php	$ordertype=((Lang::has(Session::get('admin_lang_file').'.BACK_WALLET')!= ''))? trans(Session::get('admin_lang_file').'.BACK_WALLET'): trans($ADMIN_OUR_LANGUAGE.'.BACK_WALLET'); @endphp
				   @else 
					@php	$ordertype="--"; @endphp
					@endif
				@php	$total_tax = ($allorders_list->order_amt * $allorders_list->order_tax)/100 ; @endphp
					
			

					<tr class="gradeA odd">
						<td class="sorting_1">{{ $i }}</td>
						<td class="">{{ $allorders_list->cus_name }}</td>
						<td class="">{{ $allorders_list->deal_title }}</td>
						<td class="center">{{ $allorders_list->order_amt }}</td>
						<td class="center">{{ $total_tax }}</td>
						<td class="center">{{ $allorders_list->order_shipping_amt }}</td>
						<td class="center"><a href="#" class="colr3">{{ $orderstatus }}</a></td>
						<td class="center">{{ $allorders_list->order_date }}</td>
						<td class="center"><a href="#" class="colr2">{{ $ordertype }}</a></td>           
                
					
				 @if($allorders_list->delivery_status == 7)  
				<td class="center">@if($allorders_list->order_id==$allorders_list->paypal_order_id) @if($allorders_list->return_status==1)
					<a href="javascript:void(0);"  class="btn btn-info" onclick="show_Return_approved('{{ $allorders_list->delStatus_id }}');">Return Request</a> @endif @endif
				</td>@elseif($allorders_list->delivery_status == 8) @if($allorders_list->order_id==$allorders_list->paypal_order_id) @if($allorders_list->return_status==2) 
                <td class="center">
				  <a href="javascript:void(0);" class="btn btn-info" onclick="show_Return_approved('{{ $allorders_list->delStatus_id }}');">Return Request Processed</a>
			    </td> @endif @else  <td> Order Returned</td> @endif @endif
			</tr>

@php $i++; @endphp @endforeach	
			@endif 
@else
	
						@if($return_order_all !="") 
						@foreach($return_order_all as $allorders_list) 
					
				@php	$orderstatus=((Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SUCCESS'): trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS');
					$ordertype=""; @endphp
					
					@if($allorders_list->order_paytype==1)
					
					@php	$ordertype=((Lang::has(Session::get('admin_lang_file').'.BACK_PAYPAL')!= ''))? trans(Session::get('admin_lang_file').'.BACK_PAYPAL'): trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYPAL'); @endphp
					
					@elseif($allorders_list->order_paytype==2)
					
					@php	$ordertype=((Lang::has(Session::get('admin_lang_file').'.BACK_WALLET')!= ''))? trans(Session::get('admin_lang_file').'.BACK_WALLET'): trans($ADMIN_OUR_LANGUAGE.'.BACK_WALLET'); @endphp
					 @else 
					 
					@php	$ordertype="--"; @endphp
					@endif 
				@php	$total_tax = ($allorders_list->order_amt * $allorders_list->order_tax)/100 ; @endphp
					
			

					<tr class="gradeA odd">
						<td class="sorting_1">{{ $i }}</td>
						<td class="">{{ $allorders_list->cus_name }}</td>
						<td class="">{{ $allorders_list->deal_title }}</td>
						<td class="center">{{ $allorders_list->order_amt }}</td>
						<td class="center">{{ $total_tax }}</td>
						<td class="center">{{ $allorders_list->order_shipping_amt }}</td>
						<td class="center"><a href="#" class="colr3"><?php echo $orderstatus;?></a></td>
						<td class="center">{{ $allorders_list->order_date }}</td>
						<td class="center"><a href="#" class="colr2">{{ $ordertype }}</a></td>           
                   

				@if($allorders_list->delivery_status == 7)  
				<td class="center">@if($allorders_list->order_id==$allorders_list->paypal_order_id) @if($allorders_list->return_status==1)
					<a href="javascript:void(0);"  class="btn btn-info" onclick="show_Return_approved('<?php echo $allorders_list->delStatus_id;?>');">Return Request</a> @endif @endif
				</td>@elseif($allorders_list->delivery_status == 8)  @if($allorders_list->order_id==$allorders_list->paypal_order_id) @if($allorders_list->return_status==2) 
                <td class="center">
				  <a href="javascript:void(0);" class="btn btn-info" onclick="show_Return_approved('<?php echo $allorders_list->delStatus_id;?>');">Return Request Processed</a>
			    </td> @endif @else <td> Order Returned</td>@endif @endif	
			</tr>

@php $i++; @endphp @endforeach @endif @endif		
										
								</tbody>
                                </table></div>
        </div>
                </div>

         </form>
        </div>
    </div>
</div>
   
    </div>
                    
                    </div>
                    
                    
                    

                </div>
            <!--END PAGE CONTENT -->
 
        </div>
<div id="Return_approved" class="modal fade" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				{{ Form::button('&times;',['class'=>'close ','data-dismiss'=>'modal'])}}	
				<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
				<h4 class="modal-title">Approve Return</h4>
			</div>
			<div class="modal-body" id="approve_Return">
				
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
				  url: 'update_cod_order_status',
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
function show_Return_approved(data)
{
	$("#Return_approved").modal("show");
	$("#approve_Return").load('<?php echo url(''); ?>/adm_deal_get_approve_REturncontent_paypal/'+data);
}
</script>
</body>
     <!-- END BODY -->
</html>
