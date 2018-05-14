<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> |Service All Orders</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo url('');?>/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/public/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/public/assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/public/assets/css/MoneAdmin.css" />
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); if(count($favi)>0) { foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
<?php } ?>	
    <link rel="stylesheet" href="<?php echo url('');?>/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/public/assets/css/success.css" />
	 <link href="<?php echo url('');?>/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
{!!$adminheader!!}
        <!-- MENU SECTION -->
{!!$adminleftmenus!!}
        <!--END MENU SECTION -->

		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a>Home</a></li>
                                <li class="active"><a >Service All Orders</a></li>
                            </ul>
                    </div>
                </div>
				
				<center>
		 <form  action="{!!action('TransactionController@service_all_orders')!!}" method="POST">
							<input type="hidden" name="_token"  value="<?php echo csrf_token(); ?>">
							 <div class="row">
							 <br>
							 
							 
						 <div class="col-sm-4">
						   <div class="item form-group">
							<div class="col-sm-6">From Date</div>
							<div class="col-sm-6">
							 <input type="text" name="from_date"  class="form-control" id="datepicker-8" required>
							 
							  </div>
							  </div>
							   </div>
							    <div class="col-sm-4">
							    <div class="item form-group">
							<div class="col-sm-6">To Date</div>
							<div class="col-sm-6">
							 <input type="text" name="to_date"  id="datepicker-9" class="form-control">
							 
							  </div>
							  </div>
							   </div>
							   
							   <div class="form-group">
							   <div class="col-sm-2">
							 <input type="submit" name="submit" class="btn btn-block btn-success" value="Search">
                             
							 </div>
							</div>
							
							 </form>
							 </center>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Service All Orders</h5>
            
        </header>
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
           <div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label>
		   
		   </label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter">
		   </div></div></div><div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label></label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter"></div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label></label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter"></div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                    <thead>
           <tr role="row">
				<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 69px;" aria-label="S.No: activate to sort column ascending" aria-sort="ascending">S.No</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 78px;" aria-label="Name: activate to sort column ascending">Customer Name</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 158px;" aria-label="Email: activate to sort column ascending">Order Id</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 88px;" aria-label="City: activate to sort column ascending">Store Name</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 101px;" aria-label="Send Mail: activate to sort column ascending">Price</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 88px;" aria-label="Edit: activate to sort column ascending">Payment Type</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 72px;" aria-label="Status: activate to sort column ascending">Service Date</th>
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 72px;" aria-label="Status: activate to sort column ascending">Invoice</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 72px;" aria-label="Status: activate to sort column ascending">Status</th>
		  </tr>
                                    </thead>
                                    <tbody>
                                     <?php $i = 1 ;
		if(isset($_POST['submit']))
			{
				
		foreach($service_order_search as $allorders_list) {
					$service_total =0;
					$orderstatus="";
					$ordertype="";
					/*if($allorders_list->order_status==1)
					{
						$orderstatus="success";
					}
					else */
					/*payment status*/
					if($allorders_list->order_status==1) 
					{
						$orderstatus="completed";
					}
					else if($allorders_list->order_status==2) 
					{
						$orderstatus="Hold";
					}
					else if($allorders_list->order_status==3) 
					{
						$orderstatus="failed";
					}
					/*delivery status*/
					if($allorders_list->ord_service_status==0){
						$ord_service_status = 'completed';
					}elseif($allorders_list->ord_service_status==1){
						$ord_service_status = 'Hold';
					}else{
						$ord_service_status = 'Failed';
					}

					if($allorders_list->serv_paytype==1)
					{
						$paytype="Pay On Service";
					}
					else
					{
						$paytype="Razorpay";
					}
					/*sum of products*/
					$get_sum_price = DB::table('nm_order_service')->where('serv_transaction_id','=',$allorders_list->serv_transaction_id)
					->leftjoin('nm_service', 'nm_order_service.service_id', '=', 'nm_service.service_id')->get();
					foreach($get_sum_price as $amt){
						$service_total+=$amt->ord_serv_price;
					}
					$grand_total =$service_total;	 //total amount of purchase including product amount + tax + shipping
					?>

					<tr class="gradeA odd">
						<td class="sorting_1"><?php echo $i;?></td>
						<td class=""><?php echo $allorders_list->cus_name;?></td>
						<td class=""><?php echo $allorders_list->serv_transaction_id;?></td>
						<td class="center"><?php echo $allorders_list->stor_name;?></td>
						<td class="center">{{ Helper::cur_sym() }}<?php echo round($grand_total);?></td>
						<td class="center"><?php echo $paytype.' - '.$orderstatus;?></td>
						<td class="center"><?php echo $allorders_list->booking_date;?></td>
						<td class="center"><a data-target="<?php echo '#uiModal'.$i;?>" data-toggle="modal">View Invoice</a></td>
						<td class="center"><?php echo $ord_service_status; ?></td>
						<?php /*
						<select name="<?php  echo 'status'.$allorders_list->order_service_id;?>" class="btn btn-default" onchange="update_service_order(this.value,'<?php echo $allorders_list->serv_transaction_id;?>','<?php echo $allorders_list->cus_id;?>')">
							<option value="1" <?php if($allorders_list->order_status==1){?> selected <?php } ?>>complete</option>
							<option value="2" <?php if($allorders_list->order_status==2){?> selected <?php } ?>>Hold</option>
							<option value="3" <?php if($allorders_list->order_status==3){?> selected <?php } ?>>failed</option>
						</select>  
						*/?>
						
                    </tr>

<?php $i++; }		
			}
else
{	
				foreach($allorders as $allorders_list) {
					$service_total=0;
					$orderstatus="";
					$ordertype="";
					/*if($allorders_list->order_status==1)
					{
						$orderstatus="success";
					}
					else*/
					if($allorders_list->order_status==1) 
					{
						$orderstatus="completed";
					}
					else if($allorders_list->order_status==2) 
					{
						$orderstatus="Hold";
					}
					else if($allorders_list->order_status==3) 
					{
						$orderstatus="failed";
					}
					/*delivery status*/
					if($allorders_list->ord_service_status==0){
						$ord_service_status = 'completed';
					}elseif($allorders_list->ord_service_status==1){
						$ord_service_status = 'Hold';
					}else{
						$ord_service_status = 'Failed';
					}
				

					if($allorders_list->serv_paytype==1)
					{
						$paytype="Pay On Service";
					}
					else
					{
						$paytype="Razorpay";
					}
					/*sum of products*/
					$get_sum_price = DB::table('nm_order_service')->where('serv_transaction_id','=',$allorders_list->serv_transaction_id)
					->leftjoin('nm_service', 'nm_order_service.service_id', '=', 'nm_service.service_id')->get();
					foreach($get_sum_price as $amt){
						$service_total+=$amt->ord_serv_price;
					}
					$grand_total =$service_total;	 //total amount of purchase including product amount + tax + shipping
					?>
			

					<tr class="gradeA odd">
						<td class="sorting_1"><?php echo $i;?></td>
						<td class=""><?php echo $allorders_list->cus_name;?></td>
						<td class=""><?php echo $allorders_list->serv_transaction_id;?></td>
						<td class="center"><?php echo $allorders_list->stor_name;?></td>
						<td class="center">{{ Helper::cur_sym() }}<?php echo round($grand_total);?></td>
						<td class="center"><?php echo $paytype.' - '.$orderstatus;?></td>
						<td class="center"><?php echo $allorders_list->booking_date;?></td>
						<td class="center"><a data-target="<?php echo '#uiModal'.$i;?>" data-toggle="modal">View Invoice</a></td>
						<td class="center"><?php echo $orderstatus; ?></td>
						<?php /*
						<select name="<?php  echo 'status'.$allorders_list->order_service_id;?>" class="btn btn-default" onchange="update_service_order(this.value,'<?php echo $allorders_list->serv_transaction_id;?>','<?php echo $allorders_list->cus_id;?>')">
							<option value="1" <?php if($allorders_list->order_status==1){?> selected <?php } ?>>complete</option>
							<option value="2" <?php if($allorders_list->order_status==2){?> selected <?php } ?>>Hold</option>
							<option value="3" <?php if($allorders_list->order_status==3){?> selected <?php } ?>>failed</option>
						</select>  */?>
						</td>
                    </tr>

<?php $i++; } } ?>
										
										
										
										
										</tbody>
                                </table><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"></div></div></div></div><div class="row"><div class="col-sm-6"><div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info"></div></div><div class="col-sm-6"><div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers"></div></div></div></div><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all"></div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"></div></div></div></div><div class="row"><div class="col-sm-6"><div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info"></div></div><div class="col-sm-6"><div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers"><ul class="pagination"></ul></div></div></div></div><div class="row">
								
								<div class="col-sm-6">
								<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
								<ul class="pagination">
								<li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous">
								</li>
								</ul></div></div></div></div>
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
    
     <!--END MAIN WRAPPER -->

<?php  $i=1;
foreach($allorders as $order_details){  

	$service_total =0;

	/*Status of Order*/
	if($order_details->order_status==1){
		$orderstatus="completed";
	}else if($order_details->order_status==2){
		$orderstatus="Hold";
	}else if($order_details->order_status==3){
		$orderstatus="failed";
	}
	
	/*service detail*/
	$product = DB::table('nm_order_service')
	->where('serv_transaction_id','=',$order_details->serv_transaction_id)
	//->leftjoin('nm_service', 'nm_order_service.service_id', '=', 'nm_service.service_id')
	->join('nm_store','nm_order_service.store_id','=','nm_store.stor_id')
	->get();
	
	
    /*sum of all products in this order*/

	foreach($product as $amt){
		$service_total+=$amt->ord_serv_price;
		
		$store_name = $amt->stor_name;
		$store_address = $amt->stor_address;
		$store_phone = $amt->stor_phone;
	}
	$grand_total =$service_total;	 //total amount of purchase including product amount + tax + shipping
?>

<div  id="<?php echo 'uiModal'.$i?>" class="modal fade in" style="display:none;">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header" style="border-bottom:none;">
         <div class="col-lg-4"><img src="<?php echo url('');?>/public/assets/logo/logo.png" alt="" style="width:100px;height:30px;"></div>
         <div class="col-lg-6"><strong>TAX INVOICE </strong></div>
         <div class="col-lg-2">
            <a href=""class="btn btn-default" data-dismiss="modal" CLASS="pull-right"><i class="icon-remove-sign icon-2x"></i></a>
         </div>
      </div>

      <hr>
      <div class="row">
        <div class="col-lg-12">
          <div class="col-lg-6" style="border-right:1px dotted #666;">
             <h4>CASH ON DELIVERY</h4>
             <b>Pay Amount :{{ Helper::cur_sym() }} <?php echo round($grand_total);?></b>(inclusive of all charges)<br>
             <span><strong>Order Date: </strong><?php echo $order_details->booked_on;?></span><br>
			 <span><strong>Order Id: <?php echo $order_details->serv_transaction_id;?></strong></span><br>
			 <span><strong>Payment Type:</strong><?php echo $orderstatus; ?></span>
          </div>
		 
          <div class="col-lg-6">
             <h4>Store Details</h4>
             <strong><?php echo $store_name;?></strong><br>
             <strong>Address:</strong><?php echo $store_address;?><br>
             <strong>Phone:<?php echo $store_phone;?></strong><br>
		 </div>
        </div>
     </div>

     <hr>

     <div class="row">
       <div class="span12 text-center">
         <h4 class="text-center">Invoice Details</h4>
		
        </div>
     </div>

     <hr>

     <table style="width:91%;margin-left:8%;">
        <tr style="border-bottom:1px solid #666;">
	     <td  width="13%" align="center">Service Name</td>
		 <td  width="13%" align="center">Service Type</td>
		 <td  width="13%" align="center">Duration</td>
		 <td  width="13%" align="center"> .</td>
		 <td  width="13%" align="center"> .</td>
		 <td  width="13%" align="center">Price</td>
       </tr>
		
       <?php foreach($product as $service_data){ $ord_serv_time_type = $service_data->ord_serv_time_type;
	   if($ord_serv_time_type==1){ $time_type= "min";}
	   elseif($ord_serv_time_type==2){ $time_type= "hour";}
	   elseif($ord_serv_time_type==3){ $time_type= "day";}
	   elseif($ord_serv_time_type==4){ $time_type= "week";}
	   elseif($ord_serv_time_type==5){ $time_type= "month";}
	   elseif($ord_serv_time_type==6){ $time_type= "year";}
	    ?>
       <tr>	
		 <td  width="13%" align="center"><?php echo $service_data->ord_serv_name;?></td>
		 <td  width="13%" align="center"><?php echo $service_data->ord_serv_type;?></td>
		 <td  width="13%" align="center"><?php echo $service_data->ord_serv_duration.' '.$time_type;?></td>
<?php 
if($ord_serv_time_type==1 || $ord_serv_time_type==2){ ?>
		 <td  width="13%" align="center"><?php echo $service_data->booking_date;?></td>
		 <td  width="13%" align="center"><?php echo $service_data->booking_time;?></td>
<?php
}else{
?>
		 <td  width="13%" align="center"><?php echo $service_data->ord_serv_from_date;?></td>
		 <td  width="13%" align="center"><?php echo ' to '.$service_data->ord_serv_to_date;?></td>
<?php } ?>
		 <td  width="13%" align="center">{{ Helper::cur_sym() }}<?php echo $service_data->ord_serv_price;?> </td>
	   <tr>
	 <?php 
	 
	 	} ?>

    </table>
    
    <br><hr>
    
    <div class="row">
      <div class="col-lg-6"></div>
      <div class="col-lg-6">
	    <span>SubTotal: <b class="pull-right" style="margin-right:15px;">{{ Helper::cur_sym() }}<?php echo $service_total; ?></b></span><br>
        <hr>
        <span>Grand Total<b class="pull-right"style="margin-right:15px;">{{ Helper::cur_sym() }}<?php echo round($grand_total);?></b></span>
      </div>
   </div>
        
   <div class="modal-footer">
      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
   </div>

  </div><!--modal-content-->
 </div><!--modal-dialog-->
</div>

   <?php $i=$i+1; }?>   
    <!-- FOOTER -->
   {!!$adminfooter!!}
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo url('');?>/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo url('');?>/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('');?>/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
 
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo url('');?>/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo url('');?>/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script> 
    <script>
	function update_service_order(id,serv_transaction_id,cus_id)
	{
			 var passdata= 'id='+id+"&serv_transaction_id="+serv_transaction_id+"&cus_id="+cus_id;
			 var pathnametemp =$('#return_url').val();
				/*if(id==1)
				{
					 var  urlrefresh=pathnametemp+"/dealscod_all_orders";
				}
				else if(id==2)
				{
					
					 var  urlrefresh=pathnametemp+"/dealscod_completed_orders";
				}
				else if(id==3)
				{
					 var  urlrefresh=pathnametemp+"/dealscod_hold_orders";
				}
				else if(id==4)
				{
					 var  urlrefresh=pathnametemp+"/dealscod_failed_orders";
				}*/
				//alert(cus_id);
			  $.ajax( {
			      type: 'get',
				  data: passdata,
				  url: 'update_service_order',
				  success: function(responseText){ 
					//alert(responseText)  
			  if(responseText=="success")
				   { 	 
					   location.reload();
				 	 // window.location=urlrefresh;
					//$('#Product_MainCategory').html(responseText);					   
				   }
				}		
			});	
	}

	
	</script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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
      </script>   
</body>
     <!-- END BODY -->
</html>
