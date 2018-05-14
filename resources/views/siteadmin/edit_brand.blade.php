<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?>| Edit Banner Image</title>
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
                                <li class="active"><a >Edit Banner Image</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Edit Banner Image</h5>
            
        </header>
        @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
         @if (Session::has('error'))
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('error') !!}</div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
            {!! Form::open(array('url'=>'edit_brand_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
			  @foreach($brand_detail as $brand_data)
                
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Brand Name<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                        <input type="hidden" name="brand_id" id="brand_id" value="{!!$brand_data->brand_id!!}"/>
                        <input id="text1" name="brand_name" id="brand_name" value="{!! $brand_data->brand_name!!}" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-3">Brand Commission<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="number" step="0.01" name="brand_commission" id="brand_commission" value="{!! $brand_data->brand_commission!!}" class="form-control" id="text1">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-3">Upload Banner Image<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                      <input type="file"  name="brand_image" id="brand_image"><span class="text-sub" id="err_img"></span><br>
                      <img src="{!! url('public/assets/brandimage/').'/'.$brand_data->brand_image!!}" style="height:60px;">
                    </div>
                    
                </div>

                
				
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
					   <button type='submit' class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                       <a href="<?php echo url('manage_brand');?>" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</a>
                    </div>
				</div>
				@endforeach
                
         {!! Form::close() !!}
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
