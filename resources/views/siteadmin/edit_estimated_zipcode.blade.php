<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | Edit Zipcode</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/css/theme.css" />
	  <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/css/plan.css" />
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/css/MoneAdmin.css" />
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); if(count($favi)>0) { foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
<?php } ?>	
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                            	<li class=""><a>Home</a></li>
                                <li class="active"><a >Edit Zipcode</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Edit Zipcode</h5>
            
        </header>
        
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
         @if (Session::has('success'))
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
        <div class="row">
        	<div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                    
   {!! Form::open(array('url'=>'edit_estimated_zipcode_submit','class'=>'form-horizontal')) !!}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Zip Code  
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                        <?php foreach($zipcode as $postcode) { }  ?>
                    <label class="control-label col-lg-3" for="text1">Enter Zipcode<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                         <input type="hidden" class="form-control" placeholder="" id="text1" name="id" value="{!! $postcode->ez_id !!}" >
                        <input type="text" class="form-control" placeholder="" id="text1" name="zip_code" value="{!! $postcode->ez_code_series !!}" >
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                        <?php foreach($zipcode as $postcode) { }  ?>
                    <label class="control-label col-lg-3" for="text1">Enter Zipcode<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                                     <input type="text" class="form-control" placeholder="" id="text1" name="zip_code2" value="{!! $postcode->ez_code_series_end !!}" >
                    </div>
                </div>
                        </div>
					<div class="panel-body">
                           <div class="form-group">
                         
                    <label class="control-label col-lg-3" for="text1">Delivery Days<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="delivery_days" value="{!! $postcode->ez_code_days !!}" >
                    </div>
                </div>
                        </div>	 
                    </div>
					
					<div class="form-group">
                    <label class="control-label col-lg-3" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad"><a style="color:#fff">Update Zipcode</a></button>
                  <a href="<?php echo url('estimated_zipcode');?>" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</a>
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
    <script src="<?php echo url(''); ?>/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo url(''); ?>/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(''); ?>/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script>
	function select_cur_val(id)
	{
		
		var passData = 'id='+id;
	
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('select_currency_value_ajax'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
				   	//alert(responseText);
					$('#whole_currency_div').html(responseText);					   
				   }
				}		
			});		
	}
	</script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
