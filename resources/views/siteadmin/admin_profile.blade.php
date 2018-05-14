<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_PROFILE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADMIN_PROFILE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_PROFILE');} ?> </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	 <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="public/assets/plugins/bootstrap/css/bootstrap.css" />
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); if(count($favi)>0) { foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
<?php } ?>	
    <link rel="stylesheet" href="public/assets/css/main.css" />
    <link rel="stylesheet" href="public/assets/css/theme.css" />
	  <link rel="stylesheet" href="public/assets/css/plan.css" />
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
      

		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_HOME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME');} ?></a></li>
                                <li class="active"><a><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_PROFILE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADMIN_PROFILE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_PROFILE');} ?></a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_PROFILE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADMIN_PROFILE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_PROFILE');} ?></h5>
            
        </header>
        
        
        <div class="row">
        	<div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                    
                    <form >
                    <?php foreach($admin_setting_details as $admin) { } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_PROFILE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADMIN_PROFILE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_PROFILE');} ?>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_FIRST_NAME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_FIRST_NAME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_FIRST_NAME');} ?><span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                     <?php echo $admin->adm_fname; ?>
                    </div>
                </div>
                        </div>
						  <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_LAST_NAME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_LAST_NAME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST_NAME');} ?><span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                 <?php echo $admin->adm_lname; ?>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PASSWORD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PASSWORD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PASSWORD');} ?><span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                 <?php echo $admin->adm_password; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EMAIL');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL');} ?><span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                     <?php echo $admin->adm_email; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PHONE_NUMBER')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PHONE_NUMBER');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PHONE_NUMBER');} ?> <span class="text-sub">*</span></label>
                    <div class="col-lg-4"> 
              <?php echo $admin->adm_phone; ?>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS1')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADDRESS1');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS1');} ?><span class="text-sub">*</span></label>
                    <div class="col-lg-4">
             <?php echo $admin->adm_address1; ?>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS2')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADDRESS2');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS2');} ?><span class="text-sub">*</span></label>
                    <div class="col-lg-4">
          			<?php echo $admin->adm_address2; ?>
                    </div>
                </div>
                        </div>
                         <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_COUNTRY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY');} ?><span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                  <?php echo $admin->co_name; ?>
                    </div>
                </div>
                        </div>
						
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CITY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CITY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY');} ?><span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                  <?php echo $admin->ci_name; ?>
                    </div>
                </div>
                        </div>
                       
                    </div>
					
					<div class="form-group">
                    <label class="control-label col-lg-10" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-2">
                     <a style="color:#fff" class="btn btn-warning btn-sm btn-grad" href="<?php echo url('siteadmin_dashboard'); ?>"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_BACK')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_BACK');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_BACK');} ?></a>
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
    <script src="public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
    <!---Right Click Block Code---->
<script language="javascript">
document.onmousedown=disableclick;
status="Cannot Access for this mode";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
</script>


<!---F12 Block Code---->
<script type='text/javascript'>
$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});
</script>

 <script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>
</body>
     <!-- END BODY -->
</html>
