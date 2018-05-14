<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | Email-setting</title>
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
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                                <li class="active"><a >Module Settings</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Module Settings</h5>
            
        </header>
        
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
        <div class="row">
        	<div class="col-lg-11 panel_marg">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Module Settings</strong>
                        </div>
                        <?php foreach($module_setting_details as $modules) { } ?>
                              {!! Form::open(array('url'=>'module_settings_submit','class'=>'form-horizontal')) !!}
                        <div class="panel-body">
                            <div style="text-align: center;">
                           
                            <a class="quick-btn2 active" >
                                <span><img src="public/assets/img/deal.png"></span>
                                <span>Deal Module<br><input type="checkbox"  name="deal_module" value="1"  <?php if($modules->ms_dealmodule == 1) {echo 'checked'; } ?> class="anim-checkbox "></span>
                                
                            </a>

                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/product.png"></span>
                                <span>Product Module<br><input type="checkbox" name="product_module" value="1"  <?php if($modules->ms_productmodule == 1) {echo 'checked'; } ?> class="anim-checkbox"></span>
                                
                            </a>
                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/auction.png"></span>
                                <span>Auction Module<br><input type="checkbox" name="auction" value="1" <?php if($modules->ms_auctionmodule == 1) {echo 'checked'; } ?> class="anim-checkbox "></span>
                                
                            </a>
                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/blog.png"></span>
                                <span>Blog Module<br><input type="checkbox" name="blog" value="1" <?php if($modules->ms_blogmodule == 1) {echo 'checked'; } ?> class="anim-checkbox "></span>
                                
                            </a>
                           
                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/map.png" ></span>
                                <span>Near me map Module<br><input type="checkbox" value="1" name="near_me_map" <?php if($modules->ms_nearmemapmodule == 1) {echo 'checked'; } ?> class="anim-checkbox "></span>
                               
                            </a>
                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/store.png"></span>
                                <span>Store list Module<br><input type="checkbox" value="1" name="store_list" <?php if($modules->ms_storelistmodule == 1) {echo 'checked'; } ?> class="anim-checkbox "></span>
                               
                            </a>
                            
                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/past_deal.png" width="60"></span>
                                <span>Past deals Module<br><input type="checkbox" value="1" name="past_deal"  <?php if($modules->ms_pastdealmodule == 1) {echo 'checked'; } ?> class="anim-checkbox "></span>
                               
                            </a>
                            
                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/faq.png" width="60"></span>
                                <span>FAQ Module<br><input type="checkbox" value="1" name="faq"  <?php if($modules->ms_faqmodule == 1) {echo 'checked'; } ?> class="anim-checkbox "></span>
                               
                            </a>

							

                            
                            
                        </div>
                        </div>
                        
                    </div>
                </div>
        
        </div>
        
        
        
        
        <div class="row">
        	<div class="col-lg-11 panel_marg">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Payment Modules</strong>
                        </div>
                        <div class="panel-body">
                            <div style="text-align: center;">
                           
                            <a class="quick-btn2 active" >
                                <span><img src="public/assets/img/cod.png"></span>
                                <span>Cash On Delivery<br><input type="checkbox" value="1" name="cod"  <?php if($modules->ms_cod == 1) {echo 'checked'; } ?> class="anim-checkbox "></span>
                                
                            </a>

                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/paypal.png"></span>
                                <span>Paypal<br><input type="checkbox" name="paypal" value="1"  <?php if($modules->ms_paypal == 1) {echo 'checked'; } ?> class="anim-checkbox "></span>
                                
                            </a>
                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/card.png"></span>
                                <span>Credit card<br><input type="checkbox" value="1" name="credit_card"   <?php if($modules->ms_creditcard == 1) {echo 'checked'; } ?> class="anim-checkbox "></span>
                                
                            </a>
                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/google.png"></span>
                                <span>Google Checkout<br><input type="checkbox" value="1" name="google_checkout"  <?php if($modules->ms_googlecheckout == 1) {echo 'checked'; } ?> class="anim-checkbox "></span>
                                
                            </a>
                            

							

                            
                            
                        </div>
                        </div>
                        
                    </div>
                </div>
        
        </div>
        
        
        
        
        
        
        <div class="row">
        	<div class="col-lg-11 panel_marg">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Shipping Settings</strong>
                        </div>
                        <div class="panel-body">
                            <div style="text-align: center;">

                            <a class="quick-btn2 active" >
                                <span><img src="public/assets/img/free.png"></span>
                                <span>Free Shipping<br><input class="uniform" name="shipping_settings" value="1" type="radio" <?php if($modules->ms_shipping == 1) {echo 'checked'; } ?>  ></span>
                                
                            </a>

                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/flat.png"></span>
                                <span>Flat Shipping<br><input class="uniform"  name="shipping_settings" value="2" type="radio" <?php if($modules->ms_shipping == 2) {echo 'checked'; } ?>></span>
                                
                            </a>
                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/per_product.png"></span>
                                <span>Per Product Shipping<br><input class="uniform" name="shipping_settings" value="3" type="radio" <?php if($modules->ms_shipping == 3) {echo 'checked'; } ?>></span>
                                
                            </a>
                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/per_item.png"></span>
                                <span>Per Item Shipping<br><input class="uniform" name="shipping_settings" value="4" type="radio" <?php if($modules->ms_shipping == 3) {echo 'checked'; } ?>></span>
                                
                            </a>
                          
                        </div>
                        </div>
                        
                    </div>
                </div>
        
        </div>
        
        
        <div class="row">
        	<div class="col-lg-11 panel_marg">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Newsletter Template</strong>
                        </div>
                        <div class="panel-body">
                            <div style="text-align: center;">
                      
                            <a class="quick-btn2 active" >
                                <span><img src="public/assets/img/t1.png"></span>
                                <span>Template 1<br><input class="uniform" name="newsletter_temp" value="1" type="radio" <?php if($modules->ms_newsletter_template == 1) {echo 'checked'; } ?>></span>
                                
                            </a>

                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/t2.png"></span>
                                <span>Template 2<br><input class="uniform" name="newsletter_temp" value="2" type="radio" <?php if($modules->ms_newsletter_template == 2) {echo 'checked'; } ?> ></span>
                                
                            </a>
                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/t3.png"></span>
                                <span>Template 3<br><input class="uniform" name="newsletter_temp" value="3" type="radio" <?php if($modules->ms_newsletter_template == 3) {echo 'checked'; } ?>></span>
                                
                            </a>
                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/t4.png"></span>
                                <span>Template 4<br><input class="uniform" name="newsletter_temp" value="4" type="radio" <?php if($modules->ms_newsletter_template == 4) {echo 'checked'; } ?>></span>
                                
                            </a>

                            
                            
                        </div>
                        </div>
                        
                    </div>
                </div>
        
        </div>
        
        
        <div class="row">
        	<div class="col-lg-11 panel_marg">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>City / CMS Settings</strong>
                        </div>
                        <div class="panel-body">
                            <div style="text-align: center;">
                      
                            <a class="quick-btn2 active" >
                                <span><img src="public/assets/img/city.png"></span>
                                <span>With City<br><input class="uniform" name="city_settings" value="1" type="radio" <?php if($modules->ms_citysettings == 1) {echo 'checked'; } ?>></span>
                                
                            </a>

                            <a class="quick-btn2" >
                                <span><img src="public/assets/img/city_th.png"></span>
                                <span>Without City<br><input class="uniform" name="city_settings" value="0" type="radio" <?php if($modules->ms_citysettings == 0) {echo 'checked'; } ?>></span>
                                
                            </a>
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad"><a style="color:#fff">Update</a></button>
                  
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
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
