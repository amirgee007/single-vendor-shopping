<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Bohrabazaar.net | Service details</title>
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
	  <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/plan.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); if(count($favi)>0) { foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
<?php } ?>	
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
                                <li class="active"><a>Service details</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Service details</h5>
            
        </header>
        <?php 
        foreach($services_list as $service)
		{  }
		 $title 		 = $service->sr_title;
         $description 	 = $service->sr_description;
		 $category_get	 = $service->sr_category;
		 $sc_catname		     = $service->sc_catname;
		 $contact_name		 = $service->contact_name;
		 $contact_phone= $service->contact_phone;
		 $address	 = $service->address;
		 $sr_city		 = $service->sr_city;
		 $sr_state		 = $service->sr_state;
		 $sr_country	 = $service->sr_country;
		 $website   = $service->website;
		  $sr_status		 = $service->sr_status;
		 $sr_created_dt	 = $service->sr_created_dt;
		 
		?>
        <div class="row">
        	<div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                    
                    <form >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Service details
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Title<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                       <?php echo $title ; ?>
                    </div>
                </div>
                        </div>
						  <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Category Type<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $sc_catname; ?>
                    </div>
                </div>
                        </div>
						 
						 
                        
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Description<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                            <?php echo $description; ?> 
                    </div>
                </div>
                        </div>
						 
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Contact Name<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                    <?php echo $contact_name;?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Contact Phone<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                        <?php echo $contact_phone;?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Address<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                         <?php echo $address;?>
						 <?php echo "<br/>".$sr_city.', '.$sr_state.', '.$sr_country;?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"> Website<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                            <?php echo $website;?>
                    </div>
                </div>
                        </div>
						
						 
                        
                       <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"> Status <span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                            <?php if($sr_status == 0) { echo 'Publish'; } else { echo 'Block'; }?>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"> Created Date <span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                            <?php echo $sr_created_dt; ?>
                    </div>
                </div>
                        </div>
                    </div>
					
					<div class="form-group">
                    <label class="control-label col-lg-10" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-2">
                    <a style="color:#fff" href="<?php if($sr_status == 0) { echo url('manage_publish_services'); } else { echo url('manage_block_services'); } ?>" class="btn btn-warning btn-sm btn-grad">Back</a>
                    </div>
					  
                </div>
                
                </form>
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
     
</body>
     <!-- END BODY -->
</html>
