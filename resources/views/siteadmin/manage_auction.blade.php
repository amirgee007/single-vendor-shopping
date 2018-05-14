<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> |Manage Auction</title>
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
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); if(count($favi)>0) { foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
<?php } ?>	
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
                            	<li class=""><a >Home</a></li>
                                <li class="active"><a >Manage Deals</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Manage Auction</h5>
            
         </header>
           @if (Session::has('block_message'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('block_message') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
           <div class="accordion-body collapse in body" id="div-1">
           <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label>
		   
		   </label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter">
		   </div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div>
        
           <table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
                                    <thead>
                                        <tr role="row">
										<th aria-label="Rendering engine: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc" aria-sort="ascending">S.No</th>
										<th aria-label="Browser: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Auction Name</th>
										<th aria-label="Platform(s): activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">City</th>
										<th aria-label="Engine version: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Store Name</th>
																				<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Original Price($)</th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Auction Price($)</th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"> Auction Image </th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Actions</th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Preview</th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Deal details</th>

										</tr>
                                    </thead>
                                    <tbody>
                                      <?php $i = 1 ;
                                      if(count($auction_details) >0){
									  foreach($auction_details as $auction_list) { 
									  $auc_get_img = explode("/**/",$auction_list->auc_image);
									  if($auction_list->auc_status == 1)
									  {
										  $process = "<a href='".url('block_auction/'.$auction_list->auc_id.'/0')."' > <i style='margin-left:10px;' class='icon icon-ok icon-me'></i> </a>";
								  } else if($auction_list->auc_status == 0) {
										   $process = "<a href='".url('block_auction/'.$auction_list->auc_id.'/1')."' > <i style='margin-left:10px;' class='icon icon-ban-circle icon-me'></i> </a>";
									  }
									  ?>
                                    <tr class="gradeA odd">
                                            <td class="sorting_1"><?php echo $i; ?></td>
                                            <td class="  "><?php echo substr($auction_list->auc_title,0,45); ?></td>
                                            <td class="  "><?php echo $auction_list->ci_name; ?></td> 
                                            <td class="center  "><?php echo $auction_list->stor_name; ?></td>
                                            <td class="center  "><?php echo $auction_list->auc_original_price; ?></td>
                                            <td class="center  "><?php echo $auction_list->auc_auction_price; ?></td>
                                            <td class="center  "><a ><img style="height:40px;" src="<?php echo url(''); ?>/public/assets/auction/<?php echo $auc_get_img[0]; ?>"></a></td>
                                           
                                            <td class="center  ">
                                           <a href="<?php echo url('edit_auction/'.$auction_list->auc_id); ?>" > <i class="icon icon-edit" style="margin-left:15px;"></i></a>
                                         	<?php echo  $process; ?>
                                            </td>
                                            <td class="center  "><a href="<?php echo url('auctionview'); ?>/<?php echo $auction_list->auc_id; ?>" target="_blank" ><i class="icon-search icon-2x"></i></a></td>
                                            <td class="center  "><a href="<?php echo url('auction_details')."/".$auction_list->auc_id; ?>">View details</a></td>
                                        </tr>
									<?php $i++; }  } ?>
									
										</tbody>
                                </table><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all"></div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"><ul class="pagination"></div></div></div></div><div class="row">
								
								<div class="col-sm-6">
								<div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">
								<ul class="pagination">
								<li id="dataTables-example_previous" tabindex="0" aria-controls="dataTables-example" class="paginate_button previous disabled">
								</li>
								</ul></div></div></div></div>
        </div>
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
    <script src="<?php echo url('')?>/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo url('')?>/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script> 
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo url('')?>/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
