<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> |Deals All Transactions</title>
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
    <link href="<?php echo url('')?>/public/assets/css/datepicker.css" rel="stylesheet">	
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<link href="<?php echo url('')?>/public/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/timeline/timeline.css" />

	

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
                                <li class="active"><a >Deals All Transactions</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Deals All Transactions</h5>
            
        </header>
        
        
        <div class="row">
        	
            <div class="col-lg-10 panel_marg">
            	
         <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">
					<input type="text" id="text1" placeholder="" class="form-control"><span class="text-sub"></span></label>
                    <div class="col-lg-8">
					 <div class="col-lg-2">
<button class="btn btn-warning btn-sm btn-grad"><a href="#" style="color:#fff">Search</a></button>
		</div><label class="control-label col-lg-4" for="text1">Transaction Type<span class="text-sub">*</span></label>
					  <div class="col-lg-5"><select class="form-control">
           <option>Default</option>
            <option>English</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select></div>
                      
                    </div>
                </div>
				
            </div>
			   <div class="col-lg-10 panel_marg">
            	
         <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">
				<span class="text-sub"></span></label>
                    <div class="col-lg-8">					
		<label class="control-label col-lg-4" for="text1"><p>No Deals Found</p></label>
					  <div class="col-lg-5"></div>
                      
                    </div>
                </div>
				
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
    
    <script  src="<?php echo url('')?>/public/assets/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/flot/jquery.flot.resize.js"></script>
	<script  src="<?php echo url('')?>/public/assets/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo url('')?>/public/assets/js/pie_chart.js"></script>
    
    


<script src="<?php echo url('')?>/public/assets/js/jquery-ui.min.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/daterangepicker/moment.min.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>



<script src="<?php echo url('')?>/public/assets/plugins/autosize/jquery.autosize.min.js"></script>

       <script src="<?php echo url('')?>/public/assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
        </script>

        
    
	<script src="<?php echo url('')?>/public/assets/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/flot/jquery.flot.resize.js"></script>
    <script  src="<?php echo url('')?>/public/assets/plugins/flot/jquery.flot.categories.js"></script>
    <script  src="<?php echo url('')?>/public/assets/plugins/flot/jquery.flot.errorbars.js"></script>
	<script  src="<?php echo url('')?>/public/assets/plugins/flot/jquery.flot.navigate.js"></script>
    <script  src="<?php echo url('')?>/public/assets/plugins/flot/jquery.flot.stack.js"></script>    
    <script src="<?php echo url('')?>/public/assets/js/bar_chart.js"></script>
    
    
        
     
</body>
     <!-- END BODY -->
</html>
