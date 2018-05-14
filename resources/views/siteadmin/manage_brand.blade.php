<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | Manage Brand Commission</title>
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
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); if(count($favi)>0) { foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
<?php } ?>	
    <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                                <li class="active"><a >Manage Brand Commission</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Manage Brand Commission</h5>
            
        </header>
   
   @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
   <div class="row">
   	
    <div class="col-lg-11 panel_marg">
    
    	<table id="dataTable" class="table table-bordered">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th style="text-align:center;">Brand Name</th>
                  <th style="text-align:center;">Brand Commission</th>
                  <th style="text-align:center;">Brand Image</th>
				  <th style="text-align:center;">Edit</th>
				  <th style="text-align:center;">Block / Unblock</th>
				  <th style="text-align:center;">Delete</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=1; ?>
               @if(count($manage_brand))
                @foreach($manage_brand as $manage_brand_data)
                <tr>
                  <td>{!!$i!!}</td>
                  <td>{!! $manage_brand_data->brand_name !!}</td>
                  <td>{!! $manage_brand_data->brand_commission !!}%</td>
                  <td class="text-center"><img src="{!! url('public/assets/brandimage/').'/'.$manage_brand_data->brand_image!!}" style="height:40px;"></td>
				  <td class="text-center"><a href="{!! url('edit_brand').'/'.$manage_brand_data->brand_id!!}" data-tooltip="Edit"><i class="icon icon-edit icon-2x"></i> </a></td>
                  <td class="text-center">
                    <?php if($manage_brand_data->brand_status == 0){ ?>
                            <a href="{!! url('update_brand_status').'/'.$manage_brand_data->brand_id.'/'.'1'!!}" data-tooltip="Unblock"><i class="icon icon-ok icon-2x"></i></a> 
                    <?php } else { ?> 
                            <a href="{!! url('update_brand_status').'/'.$manage_brand_data->brand_id.'/'.'0'!!}" data-tooltip="block">
                                <i class="icon icon-ban-circle icon-2x icon-me"></i>
                            </a> 
                    <?php } ?>
                </td>
				<td class="text-center"><a href="{!! url('delete_brand_submit').'/'.$manage_brand_data->brand_id!!}" data-tooltip="Delete"><i class="icon icon-trash icon-2x"></i></a></td>
              </tr>
                <?php $i++;?>
                @endforeach
               @else
               
               @endif
              </tbody>
            </table>
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
    <script src="public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->  

    <script src="<?php echo url('');?>/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo url('');?>/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTable').dataTable();
         });
    </script>  
     
</body>
     <!-- END BODY -->
</html>
