<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | Manage Inquiries                </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="public/assets/css/main.css" />
    <link rel="stylesheet" href="public/assets/css/theme.css" />
    <link rel="stylesheet" href="public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                                <li class="active"><a > Manage Inquiries                </a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Manage Inquiries                </h5>
            
        </header>
        @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal">
		
               
				
				
				 

                <div class="form-group col-lg-12">
                    	<table class="table table-bordered" id="dataTables-example">
              <thead>
                <tr>
                  <th style="width:10%;"class="text-center">S.No</th>
                  <th class="text-center">Auction Name</th>
				    <th class="text-center">Customer Name</th>
				   <th style="text-align:center;">Customer Email</th>
				  <th style="text-align:center;">Customer Address</th>
				   <th style="text-align:center;">Shipping Amount</th>
							   
					  <th style="text-align:center;"> Biddig Amount </th>
					  <th style="text-align:center;"> Total Amount </th> 
						  
                </tr>
              </thead>
              <tbody>    
              <?php $i=1;
			
			  ?> 
              @if(count($manage_auction_bidder)>0)          
              @foreach($manage_auction_bidder as $bidder)
                <tr>
                  <td class="text-center">{!!$i!!}</td>
                  <td class="text-center">{!!$bidder->auc_title !!} </td>
				     <td class="text-center"> {!!$bidder->oa_cus_name !!}	</td>
					  <td class="text-center">{!!$bidder->oa_cus_email !!}		</td>
					  <td class="text-center">{!!$bidder->oa_cus_address !!} </td>
				   <td class="text-center">{!!$bidder->oa_bid_shipping_amt !!}</td>				
					 <td class="text-center">{!!$bidder->oa_bid_amt !!}</td>
					  <td class="text-center">{!!$bidder->oa_bid_shipping_amt +$bidder->oa_bid_amt !!}</td>
                </tr>
				     
				    <?php $i++;?>
					@endforeach
				@endif 
              </tbody>
            </table>
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

    <!-- FOOTER -->
     {!! $adminfooter !!}
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
