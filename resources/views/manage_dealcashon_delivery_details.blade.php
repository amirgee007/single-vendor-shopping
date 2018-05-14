<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->



 <!-- BEGIN HEAD -->

<head>

    <meta charset="UTF-8" />

    <title></title>

     <meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

     <!--[if IE]>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <![endif]-->

    <!-- GLOBAL STYLES -->

    <!-- GLOBAL STYLES -->

    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/bootstrap/css/bootstrap.css" />

    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/main.css" />

    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/theme.css" />

    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/MoneAdmin.css" />

     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); if(count($favi)>0) { foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
<?php } ?>	

    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/Font-Awesome/css/font-awesome.css" />

    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/success.css" />

     <link href="<?php echo url('')?>/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

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

                            	<li class=""><a ><?php if (Lang::has(Session::get('lang_file').'.HOME')!= '') { echo  trans(Session::get('lang_file').'.HOME');}  else { echo trans($OUR_LANGUAGE.'.HOME');} ?></a></li>

                                <li class="active"><a ><?php if (Lang::has(Session::get('lang_file').'.SHIPPING_DELIVERY')!= '') { echo  trans(Session::get('lang_file').'.SHIPPING_DELIVERY');}  else { echo trans($OUR_LANGUAGE.'.SHIPPING_DELIVERY');} ?></a></li>

                            </ul>

                    </div>

                </div>

            <div class="row">

<div class="col-lg-12">

    <div class="box dark">

        <header>

            <div class="icons"><i class="icon-edit"></i></div>

            <h5><?php if (Lang::has(Session::get('lang_file').'.SHIPPING_DELIVERY')!= '') { echo  trans(Session::get('lang_file').'.SHIPPING_DELIVERY');}  else { echo trans($OUR_LANGUAGE.'.SHIPPING_DELIVERY');} ?></h5>

            

        </header>

        <div id="div-1" class="accordion-body collapse in body">

            <form class="form-horizontal">



               

				

				

				 <div class="form-group">

                    <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>



                    <div class="col-lg-8">

					 <div class="col-lg-4">

					 

		</div><label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

					  <div class="col-lg-4"></div>

                        

                    </div>

                </div>



                <div class="form-group col-lg-12">

                    	<div class="accordion-body collapse in body" id="div-1">

           <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label>

		   

		   </label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter">

		   </div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label></label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter"></div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter"></div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter"></div></div></div><table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">

                                    <thead>

                                        <tr role="row">

                                        <th aria-sort="ascending" aria-label="S.No: activate to sort column ascending" style="width: 99px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc"><?php if (Lang::has(Session::get('lang_file').'.S.NO')!= '') { echo  trans(Session::get('lang_file').'.S.NO');}  else { echo trans($OUR_LANGUAGE.'.S.NO');} ?></th>

                                        <th aria-label="Customers: activate to sort column ascending" style="width: 111px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('lang_file').'.PRODUCTS_NAME')!= '') { echo  trans(Session::get('lang_file').'.PRODUCTS_NAME');}  else { echo trans($OUR_LANGUAGE.'.PRODUCTS_NAME');} ?></th>

                                        <th aria-label="Product Title: activate to sort column ascending" style="width: 219px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('lang_file').'.NAME')!= '') { echo  trans(Session::get('lang_file').'.NAME');}  else { echo trans($OUR_LANGUAGE.'.NAME');} ?></th>

                                        <th aria-label="Amount(S/): activate to sort column ascending" style="width: 125px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('lang_file').'.EMAIL')!= '') { echo  trans(Session::get('lang_file').'.EMAIL');}  else { echo trans($OUR_LANGUAGE.'.EMAIL');} ?></th>

                                        <th aria-label="Amount(S/): activate to sort column ascending" style="width: 125px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('lang_file').'.DATE')!= '') { echo  trans(Session::get('lang_file').'.DATE');}  else { echo trans($OUR_LANGUAGE.'.DATE');} ?></th>

                                        <th aria-label=" Tax (S/): activate to sort column ascending" style="width: 119px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('lang_file').'.ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.ADDRESS');} ?></th>

                                        <th aria-label=" Tax (S/): activate to sort column ascending" style="width: 119px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('lang_file').'.DETAILS')!= '') { echo  trans(Session::get('lang_file').'.DETAILS');}  else { echo trans($OUR_LANGUAGE.'.DETAILS');} ?></th>

                                        <th aria-label="Transaction Date: activate to sort column ascending" style="width: 125px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('lang_file').'.DELIVERY_STATUS')!= '') { echo  trans(Session::get('lang_file').'.DELIVERY_STATUS');}  else { echo trans($OUR_LANGUAGE.'.DELIVERY_STATUS');} ?></th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                   

										<?php $i=1;

										foreach($deal_shipping as $shipping)

										  {   

										  

										    

										   	if($shipping->cod_status==1)

											{

												$orderstatus="success";

											}

											else if($shipping->cod_status==2) 

											{

												$orderstatus="completed";

											}

											else if($shipping->cod_status==3) 

											{

												$orderstatus="Hold";

											}

											else if($shipping->cod_status==4) 

											{

												$orderstatus="failed";

											}

           

        

											?>

										

										

										

										

										<tr class="gradeA odd">

                                            <td class="sorting_1"><?php echo $i;?></td>

                                            <td class=" "><?php echo $shipping->pro_title;?></td>

                                            <td class=" "><?php echo $shipping->cus_name;?> </td>

                                            <td class=" "><?php echo $shipping->cus_email;?> </td>

                                            <td class="center"><?php echo $shipping->cod_date;?></td>

                                            <td class="center"><?php echo $shipping->ship_address1;?></td>

                                     

                                      

                            <td class="center       "><a data-target="<?php echo '#uiModal'.$i;?>" data-toggle="modal"><?php if (Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= '') { echo  trans(Session::get('lang_file').'.VIEW_DETAILS');}  else { echo trans($OUR_LANGUAGE.'.VIEW_DETAILS');} ?></a></td>

                                              <td class="center"><?php echo $orderstatus;?></td>

                                            

                                          

                                           

                                        </tr>

                                        

                                        <?php $i=$i+1;} ?></tbody>

                                </table><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"><div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers"></div></div></div></div><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"></div></div></div></div><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"><div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers"></div></div></div></div><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all"></div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"></div></div></div></div><div class="row"><div class="col-sm-6"><div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info"></div></div><div class="col-sm-6"><div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers"></div></div></div></div><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all"></div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"><ul class="pagination"></ul></div></div></div></div></div>

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

    <div class="modal fade in" id="formModal"  style="display:none;">

     <div class="modal-dialog">

                                    <div class="modal-content">

                                        

                                        <div class="modal-body">

                                           <form role="form">

                                        <div class="form-group">

                                            <label><?php if (Lang::has(Session::get('lang_file').'.EMAIL')!= '') { echo  trans(Session::get('lang_file').'.EMAIL');}  else { echo trans($OUR_LANGUAGE.'.EMAIL');} ?></label>

                                            <input class="form-control">

                                            <p class="help-block"><?php if (Lang::has(Session::get('lang_file').'.EXAMPLE_BLOCK-LEVEL_HELP_TEXT_HERE')!= '') { echo  trans(Session::get('lang_file').'.EXAMPLE_BLOCK-LEVEL_HELP_TEXT_HERE');}  else { echo trans($OUR_LANGUAGE.'.EXAMPLE_BLOCK-LEVEL_HELP_TEXT_HERE');} ?>.</p>

                                        </div>

                                        <div class="form-group">

                                            <label><?php if (Lang::has(Session::get('lang_file').'.ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.ADDRESS');} ?>&nbsp;:&nbsp;</label>

                                          asdsa,,California,Canadian

                                        </div>

                                        <div class="form-group">

                                            <label><?php if (Lang::has(Session::get('lang_file').'.MESSAGE')!= '') { echo  trans(Session::get('lang_file').'.MESSAGE');}  else { echo trans($OUR_LANGUAGE.'.MESSAGE');} ?></label>

                                          <textarea id="text4" class="form-control"></textarea>

                                        </div>

                                        

                                       

                                    </form>

                                        </div>

                                        <div class="modal-footer">

                                            <button data-dismiss="modal" class="btn btn-default" type="button"><?php if (Lang::has(Session::get('lang_file').'.CLOSE')!= '') { echo  trans(Session::get('lang_file').'.CLOSE');}  else { echo trans($OUR_LANGUAGE.'.CLOSE');} ?></button>

                                            <button class="btn btn-success" type="button"><?php if (Lang::has(Session::get('lang_file').'.SEND')!= '') { echo  trans(Session::get('lang_file').'.SEND');}  else { echo trans($OUR_LANGUAGE.'.SEND');} ?></button>

                                        </div>

                                    </div>

                                </div>  </div>

     <!--END MAIN WRAPPER -->

<?php $i=1;

foreach($deal_shipping as $shipping)

{

	if($shipping->cod_status==1)

	{

	$orderstatus="success";

	}

	else if($shipping->cod_status==2) 

	{

	$orderstatus="completed";

	}

	else if($shipping->cod_status==3) 

	{

	$orderstatus="Hold";

	}

	else if($shipping->cod_status==4) 

	{

	$orderstatus="failed";

	}

?>   

<div  id="<?php echo 'uiModal'.$i?>" class="modal fade in" style="display:none;">

                                <div class="modal-dialog">

                                    <div class="modal-content">

                                        <div class="modal-header" style="border-bottom:none;">

                                              <div class="col-lg-4"><img src="<?php echo url('').'/public/assets/logo/logo.png'; ?>" alt="" style="width:100px;height:30px;"></div>

                                                 <div class="col-lg-6"><strong><?php if (Lang::has(Session::get('lang_file').'.TAX_INVOICE')!= '') { echo  trans(Session::get('lang_file').'.TAX_INVOICE');}  else { echo trans($OUR_LANGUAGE.'.TAX_INVOICE');} ?>  </strong></div>

                                                  <div class="col-lg-2"><a href=""class="btn btn-default" data-dismiss="modal" CLASS="pull-right"><i class="icon-remove-sign icon-2x"></i></a></div>

                                        </div>

                                      <hr>

                                      <div class="row">

                                      <div class="col-lg-12">

                                      <div class="col-lg-6" style="border-right:1px dotted #666;">

                                      <h4><?php if (Lang::has(Session::get('lang_file').'.CASH_ON_DELIVERY')!= '') { echo  trans(Session::get('lang_file').'.CASH_ON_DELIVERY');}  else { echo trans($OUR_LANGUAGE.'.CASH_ON_DELIVERY');} ?></h4>

                                      <b><?php if (Lang::has(Session::get('lang_file').'.AMOUNT_PAID')!= '') { echo  trans(Session::get('lang_file').'.AMOUNT_PAID');}  else { echo trans($OUR_LANGUAGE.'.AMOUNT_PAID');} ?> :<?php echo "$ ".$shipping->cod_amt;?></b>

                                      <br>

                                      <span>((<?php if (Lang::has(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')!= '') { echo  trans(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES');}  else { echo trans($OUR_LANGUAGE.'.INCLUSIVE_OF_ALL_CHARGES');} ?>) )</span>

                                     <br>

                                       <br>

					 <span><?php if (Lang::has(Session::get('lang_file').'.ORDER_DATE')!= '') { echo  trans(Session::get('lang_file').'.ORDER_DATE');}  else { echo trans($OUR_LANGUAGE.'.ORDER_DATE');} ?>: <?php echo $shipping->order_date;?>: <?php echo $shipping->cod_date;?></span>

                                      </div>

                                          <div class="col-lg-6">

                                          <h4><?php if (Lang::has(Session::get('lang_file').'.SHIPPING_ADDRESS')!= '') { echo  trans(Session::get('lang_file').'.SHIPPING_ADDRESS');}  else { echo trans($OUR_LANGUAGE.'.SHIPPING_ADDRESS');} ?></h4>

                                          <br>

                                          <strong><?php echo $shipping->cod_ship_addr;?></strong>

                                          

                                          <strong><?php if (Lang::has(Session::get('lang_file').'.PHONE')!= '') { echo  trans(Session::get('lang_file').'.PHONE');}  else { echo trans($OUR_LANGUAGE.'.PHONE');} ?>:<?php echo $shipping->ship_phone;?>:<?php echo $shipping->ship_phone;?></strong>

                                          </div>

                                            

                                             

                                      </div>

                                      </div>

                                      <hr>

                                      <div class="row">

                                      <div class="span12 text-center">

                                      <h4 class="text-center"><?php if (Lang::has(Session::get('lang_file').'.INVOICE_DETAILS')!= '') { echo  trans(Session::get('lang_file').'.INVOICE_DETAILS');}  else { echo trans($OUR_LANGUAGE.'.INVOICE_DETAILS');} ?></h4>

                                      <span><?php if (Lang::has(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')!= '') { echo  trans(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS');}  else { echo trans($OUR_LANGUAGE.'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS');} ?> </span>

                                      </div>

                                      </div>

                                      <hr>

                                    <h4 class="text-center"><?php echo $i."   ".$shipping->pro_title;?></h4>

                                    <table style="width:91%;margin-left:8%;">

                                    <tr style="border-bottom:1px solid #666;">

                                    <td  width="13%" align="center"><?php if (Lang::has(Session::get('lang_file').'.COLOR')!= '') { echo  trans(Session::get('lang_file').'.COLOR');}  else { echo trans($OUR_LANGUAGE.'.COLOR');} ?></td>&nbsp;

                                      <td  width="13%" align="center"><?php if (Lang::has(Session::get('lang_file').'.SIZE')!= '') { echo  trans(Session::get('lang_file').'.SIZE');}  else { echo trans($OUR_LANGUAGE.'.SIZE');} ?></td>

                                        <td  width="13%" align="center"><?php if (Lang::has(Session::get('lang_file').'.QUANTITY')!= '') { echo  trans(Session::get('lang_file').'.QUANTITY');}  else { echo trans($OUR_LANGUAGE.'.QUANTITY');} ?></td>

                                         <td  width="13%" align="center"><?php if (Lang::has(Session::get('lang_file').'.ORIGINAL_PRICE')!= '') { echo  trans(Session::get('lang_file').'.ORIGINAL_PRICE');}  else { echo trans($OUR_LANGUAGE.'.ORIGINAL_PRICE');} ?></td>

                                            <td  width="13%" align="center"><?php if (Lang::has(Session::get('lang_file').'.SUB_TOTAL')!= '') { echo  trans(Session::get('lang_file').'.SUB_TOTAL');}  else { echo trans($OUR_LANGUAGE.'.SUB_TOTAL');} ?></td>

                                              

                                         <?php $subtotal=$shipping->cod_qty*$shipping->cod_amt;  ?>   

                                    </tr>

                                    

                                     <tr>	

                                    <td  width="13%" align="center"><?php echo $shipping->co_name;?></td>&nbsp;

                                      <td  width="13%" align="center"><?php echo $shipping->si_name;?></td>

                                        <td  width="13%" align="center"><?php echo $shipping->cod_qty;?> </td>

                                          <td  width="13%" align="center"><?php echo $shipping->cod_amt;?> </td>

                                            <td  width="13%" align="center"><?php echo $subtotal ;?> </td>

                                             

                                              

                                    </tr>

                                    </table>

                                    <br>

                                    <hr>

                                    <div class="row">

                                    <div class="col-lg-6"></div>

                                     <div class="col-lg-6">

                               <span><?php if (Lang::has(Session::get('lang_file').'.SHIPMENT_VALUE')!= '') { echo  trans(Session::get('lang_file').'.SHIPMENT_VALUE');}  else { echo trans($OUR_LANGUAGE.'.SHIPMENT_VALUE');} ?><b class="pull-right" style="margin-right:15px;"><?php echo '$ '.$subtotal ;?> </b></span><br>

                                        <span><?php if (Lang::has(Session::get('lang_file').'.TAX')!= '') { echo  trans(Session::get('lang_file').'.TAX');}  else { echo trans($OUR_LANGUAGE.'.TAX');} ?><b class="pull-right"style="margin-right:15px;"><?php echo $shipping->pro_inctax;?>%</b></span>

                                        <hr>

<?php $totamt=round($subtotal + ($subtotal*($shipping->pro_inctax/100)));?>

                                       <span><?php if (Lang::has(Session::get('lang_file').'.AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.AMOUNT');} ?><b class="pull-right"style="margin-right:15px;"><?php echo '$ '.$totamt;?></b></span>

                                     </div>

                                    </div>

                        

                                        

                                        <div class="modal-footer">

                                            <button data-dismiss="modal" class="btn btn-default" type="button"><?php if (Lang::has(Session::get('lang_file').'.CLOSE')!= '') { echo  trans(Session::get('lang_file').'.CLOSE');}  else { echo trans($OUR_LANGUAGE.'.CLOSE');} ?></button>

                                            

                                        </div>

                                    </div>

                                </div>

                            </div>



   <?php $i=$i+1; }?>         

    <!-- FOOTER -->

    <div id="footer">

        <p>&copy; <?php echo $SITENAME; ?> 2017&nbsp;</p>

    </div>

    <!--END FOOTER -->





     <!-- GLOBAL SCRIPTS -->

    <script src="<?php echo url('')?>/public/assets/plugins/jquery-2.0.3.min.js"></script>

     <script src="<?php echo url('')?>/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?php echo url('')?>/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- END GLOBAL SCRIPTS -->   

       <script src="<?php echo url('')?>/public/assets/plugins/dataTables/jquery.dataTables.js"></script>

    <script src="<?php echo url('')?>/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>

     <script>

         $(document).ready(function () {

             $('#dataTables-example').dataTable();

         });

    </script>

</body>

     <!-- END BODY -->

</html>

