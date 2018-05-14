<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | smtp-setting</title>
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
	  <link rel="stylesheet" href="public/assets/css/plan.css" />
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); if(count($favi)>0) { foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
<?php } ?>	
    <link rel="stylesheet" href="public/assets/css/MoneAdmin.css" />
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
                            	<li class=""><a  >Home</a></li>
                                <li class="active"><a  >smtp Settings</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>SMTP Settings</h5>
            
        </header>
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif

        <div class="accordion-body collapse in body">
        <div class="form-group">
        <?php foreach($smtp_settings as $smtp){}
		       foreach($send_settings as $send){} ?>
                    <label for="text1" class="control-label col-lg-2">  <input type="checkbox" value="1" name="sendgrid" id="inlineCheckbox1" <?php if($smtp->sm_isactive == 1){ ?> checked <?php } ?>> <label class="sample">SMTP </label><?php /* ?><input type="checkbox" value="2" name="smtp" id="inlineCheckbox2" <?php if($send->sm_isactive == 1){ ?> checked <?php } ?>> <label class="sample">Sendgrid </label></label><?php */?>

                    <div class="col-lg-8">
                    
                    </div>
                </div>
                        
        </div>
        <div class="alert alert-danger alert-dismissable" id="update_notice" style="display:none;"> </div>
        <div id="div-1" class="accordion-body collapse in body" <?php if($smtp->sm_isactive == 1){ ?> style="display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
            {!! Form::open(array('url'=>'smtp_setting_submit','class'=>'form-horizontal')) !!}

                

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                                           Don't change these values unless you know what you're doing
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Smtp Host<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="smtp.gmail.com" value="{!!$smtp->sm_host!!}" name="smtp_host" id="smtp_host">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2"> Smtp Port<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="465" name="smtp_port" value="{!!$smtp->sm_port!!}" id="smtp_port">
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Smtp User Name<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="1234@getonthedancefloor" value="{!!$smtp->sm_uname!!}"  name="smtp_username" id="smtp_username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Smtp Password<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input type="password" class="form-control" name="password" value="{!!$smtp->sm_pwd!!}" id="password">
                    </div>
                </div>
				<div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                      <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                     <button type="reset" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</button>
                   
                    </div>
					  
                </div>

                
        {!!Form::close()!!}
        </div>
        <div id="div-2" class="accordion-body collapse in body"  <?php if($send->sm_isactive == 1){ ?> style="display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
            {!! Form::open(array('url'=>'send_setting_submit','class'=>'form-horizontal')) !!}

             

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                                           Don't change these values unless you know what you're doing
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Sendgrid Host<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="sendgrid.gmail.com" value="{!!$send->sm_host!!}" name="send_host" id="send_host">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2"> Sendgrid Port<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="465" name="send_port" value="{!!$send->sm_port!!}" id="send_port">
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Sendgrid User Name<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="1234@getonthedancefloor" value="{!!$send->sm_uname!!}"  name="send_username" id="send_username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Sendgrid Password<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input type="password" class="form-control" name="send_password" value="{!!$send->sm_pwd!!}" id="send_password">
                    </div>
                </div>
				<div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                      <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                     <button type="reset" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</button>
                   
                    </div>
					  
                </div>
			
                
        {!!Form::close()!!}
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
     <script>
	 
	 $(document).ready(function(){
		 
		
		 
		 
	 $('#inlineCheckbox2').click(function() {
		 
		 if(this.checked)
		 {
		 $('#div-1').hide();
		 $('#div-2').show();
		 $('#inlineCheckbox1').prop('checked',false);
		 $('#update_notice').show();
		 $('#update_notice').text('Click Update to Choose the selected settings');
		 $('#update_notice').fadeOut(2000);
		 }
	 });
	  $('#inlineCheckbox1').click(function() {
		 
		 if(this.checked)
		 {
		 $('#div-2').hide();
		 $('#div-1').show();
		 $('#inlineCheckbox2').prop('checked',false);
		 $('#update_notice').show();
		 $('#update_notice').text('Click Update to Choose the selected settings');
		 $('#update_notice').fadeOut(2000);
		 }
	 });
	 });
	 </script>
</body>
     <!-- END BODY -->
</html>
