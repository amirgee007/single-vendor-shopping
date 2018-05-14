<?php echo $navbar; ?>

<!-- Navbar ================================================== -->
<?php echo $header; ?>

<link rel="stylesheet" href="url('').'/public/assets/css/new_css.css'" />
<link rel="stylesheet" href="public/assets/css/new_css.css" />
<div id="header">
   <?php $__currentLoopData = $customerdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php
      /*if($hasship==1){
        foreach($shippingdetails as $shipping_info)
        { 
      
        }
      }*/
      ?>
</div>
<script type="text/javascript">
   /*$(document).ready(function(){
   	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
   		localStorage.setItem('activeTab', $(e.target).attr('href'));
   	});
   	var activeTab = localStorage.getItem('activeTab');
   	if(activeTab){
   		$('#myTab a[href="' + activeTab + '"]').tab('show');
   	}
   });*/
   
</script>
<!-- Header End====================================================================== -->
<?php 
   if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
       $pro_title  	= 'pro_title';
       $deal_title  	= 'deal_title';
   }else {  
       $pro_title  	= 'pro_title_'.Session::get('lang_code');
       $deal_title  	= 'deal_title_'.Session::get('lang_code');
   } 
   ?>
<div id="mainBody">
   <div class="container">
      <div class="row">
         <!-- Sidebar ================================================== -->
         <!-- Sidebar end=============================================== -->
         <div class="span12" style="width: 100%;">
            <ul class="breadcrumb">
               <li><a href="<?php echo e(url('')); ?>"><?php if(Lang::has(Session::get('lang_file').'.HOME')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.HOME')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.HOME')); ?> <?php endif; ?></a> <span class="divider">/</span></li>
               <li class="active"><?php if(Lang::has(Session::get('lang_file').'.MY_PROFILE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MY_PROFILE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MY_PROFILE')); ?> <?php endif; ?></li>
            </ul>
            <h3> <?php if(Lang::has(Session::get('lang_file').'.MY_PROFILE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MY_PROFILE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MY_PROFILE')); ?> <?php endif; ?></h3>
            <div id="grids">
               <?php /* ?>
               <ul id="myTab" class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#one">My Account</a></li>
                  <?php foreach($general as $gs) {} if($gs->gs_payment_status == 'COD') { ?> 
                  <li class=""><a data-toggle="tab" href="#two">My COD Details</a></li>
                  <?php } ?>
                  <li class=""><a href="#three" data-toggle="tab">My Buys</a></li>
                  <li class=""><a data-toggle="tab" href="#five">My Wish List</a></li>
                  <!-- <li class=""><a data-toggle="tab" href="#six">My Bid History</a></li> -->
                  <!--<li class=""><a data-toggle="tab" href="#five">My Email Subscriptions</a></li>-->
                  <li class=""><a data-toggle="tab" href="#seven">My Shipping Address</a></li>
                  <li class=""><a data-toggle="tab" href="#eight">My Deals Buys</a></li>
                  <li class=""><a data-toggle="tab" href="#nine">My Deals COD</a></li>
               </ul>
               <?php */ ?>
               <ul id="myTab" class="nav nav-tabs">
                  <li <?php if(isset($tab_active) && ($tab_active==1)): ?>  class="active" <?php endif; ?> id="one1"><a href="#one" data-toggle="tab" onclick="tab(1)"><?php if(Lang::has(Session::get('lang_file').'.MY_ACCOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MY_ACCOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MY_ACCOUNT')); ?> <?php endif; ?></a></li>
                  <?php $__currentLoopData = $general; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  <?php if($gs->gs_payment_status == 'COD'): ?>  
                  <li <?php if(isset($tab_active) && ($tab_active==2)): ?>  class="active" <?php endif; ?> id="two2"><a data-toggle="tab" href="#two" onclick="tab(2)"><?php if(Lang::has(Session::get('lang_file').'.MY_PRODUCT_COD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MY_PRODUCT_COD')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MY_PRODUCT_COD')); ?> <?php endif; ?></a></li>
                  <?php endif; ?>
                  <li  <?php if(isset($tab_active) && $tab_active==3): ?>  class="active" <?php endif; ?> ><a href="#three" data-toggle="tab" onclick="tab(3)"><?php if(Lang::has(Session::get('lang_file').'.MY_PRODUCT_PAYPAL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MY_PRODUCT_PAYPAL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MY_PRODUCT_PAYPAL')); ?> <?php endif; ?></a></li>
                  <li  <?php if(isset($tab_active) && $tab_active==10): ?>  class="active" <?php endif; ?> ><a href="#ten" data-toggle="tab" onclick="tab(10)"><?php if(Lang::has(Session::get('lang_file').'.MY_PRODUCT_PAYUMONEY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MY_PRODUCT_PAYUMONEY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MY_PRODUCT_PAYUMONEY')); ?> <?php endif; ?></a></li>
                  <li  <?php if(isset($tab_active) && $tab_active==6): ?> 
                  class="active" <?php endif; ?> ><a href="#six" data-toggle="tab" onclick="tab(6)"><?php if(Lang::has(Session::get('lang_file').'.MY_DEAL_COD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MY_DEAL_COD')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MY_DEAL_COD')); ?> <?php endif; ?></a></li>
                  <li  <?php if(isset($tab_active) && $tab_active==7): ?>  class="active" <?php endif; ?> ><a href="#seven" data-toggle="tab" onclick="tab(7)"><?php if(Lang::has(Session::get('lang_file').'.MY_DEAL_PAYPAL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MY_DEAL_PAYPAL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MY_DEAL_PAYPAL')); ?> <?php endif; ?></a></li>
                  <li  <?php if(isset($tab_active) && $tab_active==11): ?>  class="active" <?php endif; ?> ><a href="#eleven" data-toggle="tab" onclick="tab(11)"><?php if(Lang::has(Session::get('lang_file').'.MY_DEAL_PAYUMONEY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MY_DEAL_PAYUMONEY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MY_DEAL_PAYUMONEY')); ?> <?php endif; ?></a></li>
                  <li  <?php if(isset($tab_active) && $tab_active==4): ?>  class="active" <?php endif; ?>><a data-toggle="tab" href="#four" onclick="tab(4)"><?php if(Lang::has(Session::get('lang_file').'.MY_WISH_LIST')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MY_WISH_LIST')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MY_WISH_LIST')); ?> <?php endif; ?></a></li>
                  <li  <?php if(isset($tab_active) && $tab_active==5): ?>  class="active" <?php endif; ?> ><a data-toggle="tab" href="#five" onclick="tab(5)"><?php if(Lang::has(Session::get('lang_file').'.MY_SHIPPING_ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MY_SHIPPING_ADDRESS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MY_SHIPPING_ADDRESS')); ?> <?php endif; ?></a></li>
               </ul>
               <div class="tab-content wishlist-page">
                  <div id="one" <?php if(isset($tab_active) && ($tab_active==1)): ?>  class="tab-pane active"    <?php else: ?> class="tab-pane" <?php endif; ?>>
                  <div class="row-fluid">
                     <div class="span6 hero-unit">
                        <!--<div class="alert alert-danger alert-dismissable" id="error_name" align="center" style="height:50px;width:298px;display:none;"></div>-->
                        <div class="form-horizontal">
                           <label style="float:left" ><strong><?php if(Lang::has(Session::get('lang_file').'.NAME')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NAME')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NAME')); ?> <?php endif; ?></strong></label>
                           <div class="col-lg-8" style="position: relative;">
                              <span class="cusnameSuccess" style="position: absolute;font-size: 15px;left: 30%;margin-top: -8px;color: #156f0b;font-weight: 600;"></span>
                              <label class="pull-right" id="toggleDiv"><a ><strong class="text_for" style="cursor:pointer;"><?php if(Lang::has(Session::get('lang_file').'.EDIT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EDIT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EDIT')); ?> <?php endif; ?></strong></a></label><br>
                              <div id="cusname"> <?php echo e($customer_info->cus_name); ?></div>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="span5" style="display:none" id="username_div">
                           <div class="form-group">
                              <div class="col-lg-8">
                                 <input type="text" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_NAME')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_NAME')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_NAME')); ?> <?php endif; ?>" id="username1" value="" >
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>
                              <div class="col-lg-3">
                                 <input type="submit" style="color:#fff"  id="update_username" value="<?php if(Lang::has(Session::get('lang_file').'.UPDATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.UPDATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.UPDATE')); ?> <?php endif; ?>" class="btn btn-success btn-sm btn-grad"/>  
                                 <input type="reset"  style="color:#000" id="cancel_username" value="<?php if(Lang::has(Session::get('lang_file').'.CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCEL')); ?> <?php endif; ?>" class="btn btn-danger btn-sm btn-grad"/>  
                              </div>
                              <br>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <legend></legend>
                        <div class="form-group">
                           <label class="control-label col-lg-2" for="text1"><strong><?php if(Lang::has(Session::get('lang_file').'.EMAIL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EMAIL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EMAIL')); ?> <?php endif; ?></strong></label>
                           <div class="col-lg-8">
                              <?php echo e($customer_info->cus_email); ?>

                           </div>
                        </div>
                        <legend></legend>
                        <div class="form-horizontal" style="position: relative;">
                           <span class="passwordupdate" style="position: absolute;font-size: 15px;left: 30%;margin-top: -8px;color: #156f0b;font-weight: 600;"></span>
                           <label style="float:left" ><strong><?php if(Lang::has(Session::get('lang_file').'.PASSWORD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PASSWORD')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PASSWORD')); ?> <?php endif; ?></strong></label>
                           <label class="pull-right" id="toggleDiv1"><a><strong class="text_for" style="cursor:pointer;"><?php if(Lang::has(Session::get('lang_file').'.EDIT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EDIT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EDIT')); ?> <?php endif; ?></strong></a></label>
                           <div class="clearfix"></div>
                           <div id="Password" style="color:#f00"><strong>*******</strong></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="span5" style="display:none" id="password_div">
                           <div class="form-group">
                              <div class="col-lg-8">
                                 <input type="password" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_OLD_PASSWORD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_OLD_PASSWORD')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_OLD_PASSWORD')); ?> <?php endif; ?>" id="oldpwd">
                              </div>
                              <div class="col-lg-8">
                                 <input type="password" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_NEW_PASSWORD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_NEW_PASSWORD')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_NEW_PASSWORD')); ?> <?php endif; ?>" id="pwd">
                              </div>
                              <div class="col-lg-8">
                                 <input type="password" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_CONFIRM_PASSWORD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_CONFIRM_PASSWORD')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_CONFIRM_PASSWORD')); ?> <?php endif; ?>" id="confirmpwd">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>
                              <div class="col-lg-8">
                                 <input type="submit" style="color:#fff"  id="update_password" value="<?php if(Lang::has(Session::get('lang_file').'.UPDATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.UPDATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.UPDATE')); ?> <?php endif; ?>" class="btn btn-success btn-sm btn-grad"/>  
                                 <input type="reset"  style="color:#000"  id="cancel_password" value="<?php if(Lang::has(Session::get('lang_file').'.CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCEL')); ?> <?php endif; ?>" class="btn btn-danger btn-sm btn-grad"/>  
                              </div>
                              <br>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <legend></legend>
                        <div class="clearfix"></div>
                        <div class="form-horizontal">
                           <label style="float:left" ><strong><?php if(Lang::has(Session::get('lang_file').'.PROFILE_IMAGES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PROFILE_IMAGES')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PROFILE_IMAGES')); ?> <?php endif; ?></strong></label>
                           <label class="pull-right"><a href="#upload_pic" role="button" data-toggle="modal" style="padding-right:0"><strong class="text_for" style="cursor:pointer;"><?php if(Lang::has(Session::get('lang_file').'.EDIT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EDIT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EDIT')); ?> <?php endif; ?></strong></a></label>
                           <br>
                           <?php if($customer_info->cus_pic!=''): ?>
                           <?php  $imgpath="public/assets/profileimage/".$customer_info->cus_pic;
                              ?>
                           <?php else: ?>
                           <?php 
                              $imgpath="themes/images/products/man.png";
                              ?>
                           <?php endif; ?>
                           <img src="<?php echo e($imgpath); ?>" alt="" width="100px" height="auto">
                        </div>
                        <div class="span5" style="display:none" id="MyDiv7">
                           <div class="form-group">
                              <div class="col-lg-8">
                                 <input type="text" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.FRUIT_BALL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.FRUIT_BALL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.FRUIT_BALL')); ?> <?php endif; ?>" id="filetext" name="filetext">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>
                              <div class="col-lg-8">
                                 <button class="btn btn-success btn-sm btn-grad"><a style="color:#fff" ><?php if(Lang::has(Session::get('lang_file').'.UPDATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.UPDATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.UPDATE')); ?> <?php endif; ?></a></button>
                                 <button class="btn btn-danger btn-sm btn-grad"><a style="color:#000" ><?php if(Lang::has(Session::get('lang_file').'.CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCEL')); ?>  <?php else: ?> { trans($OUR_LANGUAGE.'.CANCEL')}} <?php endif; ?></a></button>
                              </div>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="span6">
                        <div class="hero-unit">
                           <div class="form-horizontal">
                              <label style="float:left" ><strong><?php if(Lang::has(Session::get('lang_file').'.PHONE_NUMBER')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PHONE_NUMBER')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PHONE_NUMBER')); ?> <?php endif; ?></strong></label>
                              <label class="pull-right" id="toggleDiv2"><a ><strong class="text_for" style="cursor:pointer;"><?php if(Lang::has(Session::get('lang_file').'.EDIT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EDIT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EDIT')); ?> <?php endif; ?></strong></a></label>
                              <div class="clearfix"></div>
                              <div style="position: relative;">
                                 <span id="error_mobile" style="position: absolute; font-size: 15px; color:#2ba00d; font-weight:bold;left:140px; top:0px; width: 280px; z-index: 999"></span>
                              </div>
                              <div id="cusphone"> <?php echo e($customer_info->cus_phone); ?>

                              </div>
                              <div class="span5" style="display:none; position: relative;" id="phonenumber_div">
                                 <div class="form-group">
                                    <div class="col-lg-8">
                                       <input type="number" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_PHONE_NUMBER')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_PHONE_NUMBER')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_PHONE_NUMBER')); ?> <?php endif; ?>" id="phonenum"> 
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>
                                    <div class="clear"></div>
                                    <div class="col-lg-8">
                                       <input type="submit" style="color:#fff"  id="update_phonenumber" value="<?php if(Lang::has(Session::get('lang_file').'.UPDATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.UPDATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.UPDATE')); ?> <?php endif; ?>" class="btn btn-success btn-sm btn-grad"\>  
                                       <input type="reset"  style="color:#000"  id="cancel_phonenumber" value="<?php if(Lang::has(Session::get('lang_file').'.CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCEL')); ?> <?php endif; ?>" class="btn btn-danger btn-sm btn-grad"
                                          \>  
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <br>
                           <legend></legend>
                           <div class="form-horizontal">
                              <label style="float:left" ><strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS')); ?> <?php endif; ?></strong></label>
                              <label class="pull-right" id="toggleDiv3"><a ><strong class="text_for" style="cursor:pointer;"><?php if(Lang::has(Session::get('lang_file').'.EDIT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EDIT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EDIT')); ?> <?php endif; ?></strong></a></label>
                              <div style="position:relative;">
                                 <span class="updateaddress" style="position: absolute;font-size: 15px;left: 30%;margin-top: -8px;color: #156f0b;font-weight: 600;"></span>
                              </div>
                              <div class="clearfix"></div>
                              <div id="address1"><?php echo e($customer_info->cus_address1); ?></div>
                              <div id="address2"><?php echo e($customer_info->cus_address2); ?></div>
                           </div>
                           <br>
                           <div class="clearfix"></div>
                           <div class="span5" style="display:none" id="address_div">
                              <div class="form-group">
                                 <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder=" <?php if(Lang::has(Session::get('lang_file').'.PROVIDE_ADDRESS1')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PROVIDE_ADDRESS1')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PROVIDE_ADDRESS1')); ?> <?php endif; ?>" id="addr1">
                                 </div>
                                 <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder=" <?php if(Lang::has(Session::get('lang_file').'.PROVIDE_ADDRESS2')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PROVIDE_ADDRESS2')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PROVIDE_ADDRESS2')); ?> <?php endif; ?>" id="addr2">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>
                                 <div class="col-lg-8">
                                    <input type="submit" style="color:#fff"  id="update_address" value="<?php if(Lang::has(Session::get('lang_file').'.UPDATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.UPDATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.UPDATE')); ?> <?php endif; ?>" class="btn btn-success btn-sm btn-grad"\>  
                                    <input type="reset"  style="color:#000"  id="cancel_address" value="<?php if(Lang::has(Session::get('lang_file').'.CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCEL')); ?> <?php endif; ?>" class="btn btn-danger btn-sm btn-grad"
                                       \>  
                                 </div>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <legend></legend>
                           <div class="form-horizontal">
                              <label style="float:left" ><strong><?php if(Lang::has(Session::get('lang_file').'.COUNTRY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUNTRY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUNTRY')); ?> <?php endif; ?> & <?php if(Lang::has(Session::get('lang_file').'.CITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CITY')); ?> <?php endif; ?></strong></label>
                              <label class="pull-right" id="toggleDiv5"><a ><strong class="text_for" style="cursor:pointer;"><?php if(Lang::has(Session::get('lang_file').'.EDIT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EDIT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EDIT')); ?> <?php endif; ?></strong></a></label><br>
                              <div id="cuscountry" style="float:left; padding-right:10px"> 
                                 <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                                 <?php	$co_name = 'co_name'; ?>
                                 <?php else: ?>  <?php $co_name = 'co_name_'.Session::get('lang_code'); ?> <?php endif; ?> 
                                 <?php echo e($customer_info->$co_name); ?>,
                              </div>
                              <div id="cuscity"> 
                                 <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                                 <?php	$ci_name = 'ci_name'; ?>
                                 <?php else: ?>  <?php  $ci_name = 'ci_name_'.Session::get('lang_code');  ?>  <?php endif; ?>
                                 <?php echo e($customer_info->$ci_name); ?>

                              </div>
                              <div style="position:relative;">
                                 <span class="city-con" style="position: absolute;font-size: 15px;left: 30%;margin-top: -40px;color: #156f0b;font-weight: 600;"></span>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="span12" style="display:none" id="country_div">
                              <div class="form-group">
                                 <div class="col-lg-5">
                                    <label><?php if(Lang::has(Session::get('lang_file').'.COUNTRY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUNTRY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUNTRY')); ?> <?php endif; ?></label>
                                    <select class="form-control" id="selectcountry1"  onChange="get_city_list1(this.value)">
                                       <option value="0">--<?php if(Lang::has(Session::get('lang_file').'.SELECT_COUNTRY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_COUNTRY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_COUNTRY')); ?> <?php endif; ?>--</option>
                                       <?php $__currentLoopData = $country_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option  value="<?php echo $country->co_id;?>" <?php if($country->co_id==$customer_info->cus_country){ ?>selected<?php } ?>>
                                          <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                                          <?php 	$co_name = 'co_name'; ?>
                                          <?php else: ?>    <?php $co_name = 'co_name_'.Session::get('lang_code'); ?>  <?php endif; ?>
                                          <?php echo $country->$co_name; ?>

                                       </option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </select>
                                    <label>City</label><?php //print_r($city_details); ?>
                                    <select class="form-control" id="selectcity1">
                                       <option value="0">--select city--</option>
                                       <?php $__currentLoopData = $city_det; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo $city->ci_id;?>"<?php if($city->ci_id==$customer_info->cus_city){ ?>selected<?php } ?>>
                                          <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                                          <?php  	$ci_name = 'ci_name'; ?>
                                          <?php else: ?>  <?php   $ci_name = 'ci_name_'.Session::get('lang_code'); ?> <?php endif; ?>
                                          <?php echo $city->$ci_name; ?>

                                       </option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>
                                 <div class="col-lg-8">
                                    <input type="submit" style="color:#fff"  id="update_city" value="<?php if(Lang::has(Session::get('lang_file').'.UPDATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.UPDATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.UPDATE')); ?> <?php endif; ?>" class="btn btn-success btn-sm btn-grad"\>  
                                    <input type="reset"  style="color:#000"  id="cancel_country" value="<?php if(Lang::has(Session::get('lang_file').'.CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCEL')); ?> <?php endif; ?>" class="btn btn-danger btn-sm btn-grad"
                                       \>  
                                 </div>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="two" <?php if(isset($tab_active) && ($tab_active==2)): ?>  class="tab-pane active" <?php else: ?> class="tab-pane" <?php endif; ?>>
               <?php /* Venu for pagination test */ /*
                  <span  id="close"> <input type="text" class="scroll" value="2" id='page_number' /> </span> 
                  */ ?>
               <div class="row-fluid">
                  <ul class="text_tab">
                     <div class="row">
                        <div class="col-lg-11 panel_marg">
                           <div class="btn btn-large btn-primary pull-right me_btn cart-res" style="margin-bottom: 5px;"><?php if(Lang::has(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOTAL_WALLET_BALANCE_AMOUNT')); ?> <?php endif; ?> : <?php echo e(Helper::cur_sym()); ?><?php echo e((($customer_info->wallet!="")?number_format($customer_info->wallet,2):'0.00')); ?></div>
                           <div class="table-responsive">
                              <table id="lo" class="table table-bordered table-sieve bbb"  style="margin-left:3%;width:97%; font-size:13px; overflow-x: scroll;">
                                 <thead style="background:#4a994c; color:#fff;">
                                    <tr>
                                       <th class="text-center"><?php if(Lang::has(Session::get('lang_file').'.S.NO')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.S.NO')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.S.NO')); ?> <?php endif; ?></th>
                                       <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDERID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDERID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDERID')); ?> <?php endif; ?></th>

                                      
                                       <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOTAL_ORDER_AMOUNT')); ?> <?php endif; ?></th>
                                       <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?>  <?php else: ?> { echo trans($OUR_LANGUAGE.'.ORDER_DATE')}} <?php endif; ?></th>
                                       <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.USED_WALLET')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.USED_WALLET')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.USED_WALLET')); ?> <?php endif; ?></th>
                                       <?php /*<!--<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.STATUS')!= '') { echo  trans(Session::get('lang_file').'.STATUS');}  else { echo trans($OUR_LANGUAGE.'.STATUS');} ?></th>-->
                                       */ ?>
                                       <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ACTION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ACTION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ACTION')); ?> <?php endif; ?></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if(count($getproductordercod_orderwise) < 1): ?> 
                                    <tr>
                                       <td colspan="6" class="text-center"><?php if(Lang::has(Session::get('lang_file').'.NO_ORDER_COD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_ORDER_COD')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_ORDER_COD')); ?> <?php endif; ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php $i=1;
                                       /*  print_r("<pre>");	
                                       print_r($getproductordercod_orderwise);	
                                       print_r("</pre>");	 */  
                                       $total_item_amt = 0;
                                       $all_item_tax = 0;
                                       $total_grand_total = 0;
                                       $all_ship_amt  =0;
                                       $total_tax_amt =0;
                                       $total_ship_amt =0;
                                       $coupon_amount =0;
                                       $item_tax = 0;
                                       ?>
                                    <?php $__currentLoopData = $getproductordercod_orderwise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $codorderdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($codorderdet->cod_status==1): ?>
                                    <?php 
                                    $codorderstatus="success"; ?>
                                    <?php elseif($codorderdet->cod_status==2): ?> 
                                    <?php
                                    $codorderstatus="completed";
                                    ?>
                                    <?php elseif($codorderdet->cod_status==3): ?> 
                                    <?php
                                    $codorderstatus="Hold";
                                    ?>
                                    <?php elseif($codorderdet->cod_status==4): ?> 
                                    <?php
                                    $codorderstatus="failed"; ?>
                                    <?php endif; ?>
                                    <?php	 $item_amt = $codorderdet->cod_amt + (($codorderdet->cod_amt * $codorderdet->cod_tax)/100);
                                    $ship_amt = $codorderdet->cod_shipping_amt;
                                    ?>
                                    
                                    <?php if($codorderdet->coupon_amount != 0): ?>
                                    <?php
                                    $grand_total =  ($item_amt + $ship_amt + $item_tax - $codorderdet->coupon_amount);
                                    ?>
                                    <?php else: ?>
                                    <?php
                                    $grand_total =  ($item_amt + $ship_amt + $item_tax); ?>
                                    <?php endif; ?>
                                    <?php
                                    $subtotal1=0;
                                    $customer_id = session::get('customerid');
                                    $product_titles=DB::table('nm_ordercod')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')->where('cod_transaction_id', '=', $codorderdet->cod_transaction_id)
                                    ->orderBy('nm_ordercod.cod_id', 'desc')
                                    ->where('nm_ordercod.cod_order_type', '=', 1)
                                    ->where('nm_ordercod.cod_cus_id', '=', $customer_id)
                                    ->get();
                                    $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = 0; ?>
                                    <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $subtotal=$prd_tit->cod_amt; 
                                    $tax_amt = (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
                                    $total_tax_amt+= (($prd_tit->cod_amt * $prd_tit->cod_tax)/100); 
                                    $total_ship_amt+= $prd_tit->cod_shipping_amt;
                                    $total_item_amt+=$prd_tit->cod_amt;
                                    $coupon_amount+= $prd_tit->coupon_amount;
                                    $prodct_id = $prd_tit->cod_pro_id;
                                    $grand_total = ($total_item_amt + $total_tax_amt) + $total_ship_amt;
                                    $walletusedamt_final=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $codorderdet->cod_transaction_id)->get();
                                    ?>
                                    <?php if(count($walletusedamt_final)>0): ?> 
                                    <?php
                                    $walletamttot=$walletusedamt_final[0]->wallet_used;
                                    $totalpaid_amt=($grand_total-$walletusedamt_final[0]->wallet_used);
                                    echo number_format($totalpaid_amt,2); ?>
                                    <?php else: ?> 
                                    <?php
                                    $totalpaid_amt =($total_item_amt + $total_ship_amt+ $total_tax_amt - $coupon_amount);
                                    $walletamttot=0;
                                    ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                       <td class="text-center"><?php echo e($i); ?></td>
                                       <td class="text-center"><?php echo e($codorderdet->cod_transaction_id); ?></td>
                                       <?php /* <td class="text-center"><?php 
                                          $product_tot_count=DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('cod_transaction_id', '=', $codorderdet->cod_transaction_id)->first(array(
                                            DB::raw( 'count(*) AS tot_count_prd' )
                                          ));
                                          echo $product_tot_count->tot_count_prd;
                                          ?></td>*/?>
                                       
                                       <td class="text-center"><?php echo e(Helper::cur_sym()); ?> 
                                          <?php echo e($totalpaid_amt); ?> 
                                       </td>
                                       
                                       <td class="text-center"><?php echo e($codorderdet->cod_date); ?></td>
                                       <td class="text-center"><?php echo e(Helper::cur_sym()); ?><?php 
                                          $walletusedamt_final=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $codorderdet->cod_transaction_id)->get();
                                        
                                          echo ((count($walletusedamt_final)>0)?"  ".number_format($walletusedamt_final[0]->wallet_used,2):'0');?></td>
                                       <?php /* <!--<td class="text-center"><?php //echo  $codorderstatus;?></td>--> */?>
                                       <td class="text-center td_algnctr">
                                          <a class="btn btn-success" data-target="<?php echo '#uiModal'.$i;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.VIEW_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.VIEW_DETAILS')); ?> <?php endif; ?></a>
                                          <?php 		
                                             //cancel ,return and replacement process starts
                                                      $paypal_cancel_valid = 0;
                                                      $paypal_return_replace_valid = 0;
                                                      $cod_cancel_valid = 0;
                                                      $cod_return_replace_valid= 0;
                                             
                                                      /* cancel starts */
                                                      $cancel_valid =  DB::table('nm_ordercod')
                                             ->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')            
                                             ->orderBy('nm_ordercod.cod_id', 'desc')
                                             ->where('nm_ordercod.cod_order_type', '=', 1)
                                             ->where('nm_ordercod.cod_transaction_id', '=', $codorderdet->cod_transaction_id)
                                             ->where('delivery_status','=',1)->get();
                                                      $cod_cancel_valid =  count($cancel_valid);
                                                      $return_replace =  DB::table('nm_ordercod')
                                             ->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')
                                             ->orderBy('nm_ordercod.cod_id', 'desc')
                                             ->where('nm_ordercod.cod_order_type', '=', 1)
                                             ->where('nm_ordercod.cod_transaction_id', '=',$codorderdet->cod_transaction_id)
                                             ->where('delivery_status','=',4)->get();
                                                      $cod_return_replace_valid =  count($return_replace);
                                             
                                                      //cancel ,return and replacement process ends
                                                      ?>
                                          <?php if($cod_cancel_valid>0): ?>
                                          <?php 
                                             $cancel_allow = 0;
                                             $cancel_allowed_itm  = array(); 
                                             //check Cancel date
                                             ?>
                                          <?php $__currentLoopData = $cancel_valid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancelItm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                          <?php	$order_date = $cancelItm->cod_date;
                                             $now = time(); //current date
                                             $format_date = strtotime($order_date);							
                                             $datediff = abs($now - $format_date);
                                             
                                             $numberDays = $datediff/86400;  // 86400 seconds in one day
                                             
                                             // and you might want to convert to integer
                                             $Ord_datecount = intval($numberDays);
                                             ?>
                                          <?php if($cancelItm->allow_cancel==1): ?>
                                          <?php if($Ord_datecount<$cancelItm->cancel_days): ?>
                                          <?php
                                             $delStatusInfo = DB::table('nm_order_delivery_status')->where('cod_order_id','=',$cancelItm->cod_id)->get(); 
                                             //print_r($delStatusInfo); 
                                             ?>
                                          <?php if(count($delStatusInfo)==0): ?>
                                          <?php 
                                             $cancel_allowed_itm[]  = array('prod_id' => $cancelItm->cod_id,'prod_title' => $cancelItm->$pro_title );
                                             $cancel_allow++; 
                                             ?>
                                          <?php endif; ?>
                                          <?php endif; ?>
                                          <?php endif; ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php if($cancel_allow>0): ?>
                                          <a class="btn btn-danger" data-target="<?php echo '#cancelModal'.$i;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.CANCELLATION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCELLATION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCELLATION')); ?> <?php endif; ?></a>
                                          <!-- Modal -->
                                          <div id="<?php echo 'cancelModal'.$i;?>" class="modal fade" role="dialog">
                                             <div class="modal-dialog">
                                                
                                                <div class="modal-content">
                                                   <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.CANCELLATION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCELLATION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCELLATION')); ?>      <?php endif; ?></h4>
                                                   </div>
                                                   <div class="modal-body">
                                                      <?php echo Form::open(array('url'=>'cancel_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                                      <?php if($cod_cancel_valid>0): ?>
                                                      <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                                      <input type="hidden" name="order_payment_type" value="0">
                                                      <div class="form-group">
                                                         <label for="cancel_item_id">
                                                         <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_CANCEL')); ?>   <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_CANCEL')); ?> <?php endif; ?>
                                                         </label>	
                                                         <select id = "cancel_item_id" name="cancel_item_id">
                                                            <?php if(count($cancel_allowed_itm)>0): ?>
                                                            <?php $__currentLoopData = $cancel_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                            <option value=""> No Item</option>
                                                            <?php endif; ?>	
                                                         </select>
                                                      </div>
                                                      <div class="form-group">
                                                         <label for="cancel_notes">
                                                         <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_CANCEL')); ?> <?php endif; ?>
                                                         </label>
                                                         <textarea id="<?php echo '#cancel_notes'.$i;?>" maxlength="300" class="cancel_notes_<?php echo $i; ?>" name="cancel_notes" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_CANCEL')); ?> <?php endif; ?>"></textarea>
                                                      </div>
                                                      <?php endif; ?>
                                                   </div>
                                                   <div class="modal-footer">
                                                      <button  type="submit" onclick="return cancel_validate('<?php echo $i; ?>');" class="btn btn-danger conform_cancel" id="<?php echo '#conform_cancel'.$i;?>" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_CANCEL')); ?>    <?php endif; ?></button>
                                                      <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                                   </div>
                                                   <?php echo Form::close(); ?>

                                                </div>
                                             </div>
                                          </div>
                                          <?php endif; ?>	
                                          <?php endif; ?>
                                          <?php /* cancel end */ ?>
                                          <?php if($cod_return_replace_valid>0): ?>
                                          <?php 
                                             $return_allow = $replace_allow = 0;
                                             $return_allowed_itm  = array();
                                             $replace_allowed_itm  = array(); 
                                             //check Cancel date ?>
                                          <?php $__currentLoopData = $return_replace; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                          <?php $order_date = $Itm->cod_date;
                                             $now = time(); //current date
                                             $format_date = strtotime($order_date);							
                                             $datediff = abs($now - $format_date);
                                             
                                             $numberDays = $datediff/86400;  // 86400 seconds in one day
                                             
                                             // and you might want to convert to integer
                                             $Ord_datecount = intval($numberDays); ?>
                                          <?php if($Itm->allow_return==1): ?>
                                          <?php if($Ord_datecount<$Itm->return_days): ?>
                                          <?php
                                          $delStatusInfo = DB::table('nm_order_delivery_status')->where('cod_order_id','=',$Itm->cod_id)->get(); 
                                          //print_r($delStatusInfo); 
                                          ?>
                                          <?php if(count($delStatusInfo)==0): ?>
                                          <?php
                                             $return_allowed_itm[]  = array('prod_id' => $Itm->cod_id,'prod_title' => $Itm->$pro_title );
                                             $return_allow++;  ?>
                                          <?php endif; ?>
                                          <?php endif; ?>
                                          <?php endif; ?>
                                          <?php if($Itm->allow_replace==1): ?>
                                          <?php if($Ord_datecount<$Itm->replace_days): ?>
                                          <?php
                                          $delStatusInfo = DB::table('nm_order_delivery_status')->where('cod_order_id','=',$Itm->cod_id)->get(); 
                                          
                                          ?>
                                          <?php if(count($delStatusInfo)==0): ?>
                                          <?php 
                                             $replace_allowed_itm[]  = array('prod_id' => $Itm->cod_id,'prod_title' => $Itm->$pro_title );
                                             $replace_allow++; ?>
                                          <?php endif; ?>
                                          <?php endif; ?>
                                          <?php endif; ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php if($return_allow>0): ?>
                                          <a class="btn btn-blue btn-danger"  data-target="<?php echo '#returnModal'.$i;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RETURN')); ?> <?php endif; ?></a>
                                          
                                          <div id="<?php echo 'returnModal'.$i;?>" class="modal fade" role="dialog">
                                             <div class="modal-dialog">
                                                
                                                <div class="modal-content">
                                                   <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.ORDER_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_RETURN')); ?>      <?php endif; ?></h4>
                                                   </div>
                                                   <div class="modal-body">
                                                      <?php echo Form::open(array('url'=>'return_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                                      <?php if($return_allow>0): ?>
                                                      <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                                      <input type="hidden" name="order_payment_type" value="0">
                                                      <div class="form-group">
                                                         <label for="return_item_id">
                                                         <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_RETURN')); ?>   <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_RETURN')); ?>   <?php endif; ?>
                                                         </label>	
                                                         <select id = "return_item_id" name="return_item_id">
                                                            <?php if(count($return_allowed_itm)>0): ?>
                                                            <?php $__currentLoopData = $return_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                            <option value=""> No Item</option>
                                                            <?php endif; ?>	
                                                         </select>
                                                      </div>
                                                      <div class="form-group">
                                                         <label for="return_notes">
                                                         <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_RETURN')); ?>       <?php endif; ?>																			  </label>
                                                         <textarea id="return_notes" class="return_notes_<?php echo $i; ?>" maxlength="300" name="return_notes" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_RETURN')); ?> <?php endif; ?>"></textarea>
                                                      </div>
                                                      <?php endif; ?>
                                                   </div>
                                                   <div class="modal-footer">
                                                      <button onclick="return return_validate('<?php echo $i; ?>');" type="submit" class="btn btn-danger return_conform" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_RETURN')); ?> <?php endif; ?></button>
                                                      <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                                   </div>
                                                   <?php echo Form::close(); ?>

                                                </div>
                                             </div>
                                          </div>
                                          <?php endif; ?>
                                          <?php if($replace_allow>0): ?>
                                          <a class="btn btn-info"  data-target="<?php echo '#replaceModal'.$i;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REPLACE')); ?> <?php endif; ?></a>
                                          
                                          <div id="<?php echo 'replaceModal'.$i;?>" class="modal fade" role="dialog">
                                             <div class="modal-dialog">
                                                
                                                <div class="modal-content">
                                                   <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.ORDER_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_REPLACE')); ?> <?php endif; ?></h4>
                                                   </div>
                                                   <div class="modal-body">
                                                      <?php echo Form::open(array('url'=>'replace_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                                      <?php if($return_allow>0): ?>
                                                      <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                                      <input type="hidden" name="order_payment_type" value="0">
                                                      <div class="form-group">
                                                         <label for="replace_item_id">
                                                         <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_REPLACE')); ?> <?php endif; ?>
                                                         </label>	
                                                         <select id = "replace_item_id" name="replace_item_id">
                                                            <?php if(count($replace_allowed_itm)>0): ?>
                                                            <?php $__currentLoopData = $replace_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                            <option value=""> No Item</option>
                                                            <?php endif; ?>	
                                                         </select>
                                                      </div>
                                                      <div class="form-group">
                                                         <label for="replace_notes">
                                                         <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_REPLACE')); ?> <?php endif; ?>
                                                         </label>
                                                         <textarea id="replace_notes"  maxlength="300" class="replace_notes_<?php echo $i; ?>" name="replace_notes" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_REPLACE')); ?> <?php endif; ?>"></textarea>
                                                      </div>
                                                      <?php endif; ?>
                                                   </div>
                                                   <div class="modal-footer">
                                                      <button onclick="return replace_validate('<?php echo $i; ?>');" type="submit" class="btn btn-danger replace_conform" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_REPLACE')); ?> <?php endif; ?></button>
                                                      <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                                   </div>
                                                   <?php echo Form::close(); ?>

                                                </div>
                                             </div>
                                          </div>
                                          <?php endif; ?>
                                          <?php endif; ?>
                                       </td>
                                    </tr>
                                    <?php $i=$i+1;  ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <?php  $i=1;
                           $grand_total =0;
                           $total_tax =0; $coddetails1='' ?>
                        <?php $__currentLoopData = $getproductordercod_orderwise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coddetails1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                           $status=$coddetails1->cod_status;
                           
                           
                           ?>
                        <div  id="<?php echo 'uiModal'.$i?>" class="modal fade in invoice-front" style="display:none;">
                           <div class="modal-dialog abc">
                              <div class="modal-content">
                                 <div class="modal-header" style="border-bottom:none; overflow: hidden;background: #f5f5f5;">
                                    <div class="Front-inv-topleft"><?php 
                                       clearstatcache();
                                             //$logo = url().'/public/assets/default_image/Logo.png';
                                             //if(file_exists($SITE_LOGO))
                                               $logo = $SITE_LOGO;
                                             ?> 
                                       <img src="<?php echo e($logo); ?>" alt="" style="width:100px;height:30px;">
                                    </div>
                                    <div class="Front-inv-topMig" style="padding-top: 10px; text-align: center;">
                                       <strong><?php if(Lang::has(Session::get('lang_file').'.TAX_INVOICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TAX_INVOICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TAX_INVOICE')); ?> <?php endif; ?> </strong>
                                    </div>
                                    <div class="Front-inv-topright" style="">
                                       <a href="" class="btn btn-danger pull-right" data-dismiss="modal" ><i class="icon-remove-sign icon-2x"></i></a>
                                    </div>
                                 </div>
                                 <hr style="margin-top: 0px;">
                                 <div class="" style=" clear: both;">
                                    <div class="col-lg-12">
                                       <div class="Front-inv-address-left" style="text-align: left;">
                                          <h4><?php if(Lang::has(Session::get('lang_file').'.CASH_ON_DELIVERY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CASH_ON_DELIVERY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CASH_ON_DELIVERY')); ?> <?php endif; ?></h4>
                                          <b><?php if(Lang::has(Session::get('lang_file').'.AMOUNT_PAID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AMOUNT_PAID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AMOUNT_PAID')); ?> <?php endif; ?> :
                                          <?php echo e(Helper::cur_sym()); ?>

                                          <?php 
                                             $subtotal1=0;
                                             $customer_id = session::get('customerid');
                                             $product_titles=DB::table('nm_ordercod')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')->where('cod_transaction_id', '=', $coddetails1->cod_transaction_id)
                                             ->orderBy('nm_ordercod.cod_id', 'desc')
                                             ->where('nm_ordercod.cod_order_type', '=', 1)
                                             ->where('nm_ordercod.cod_cus_id', '=', $customer_id)
                                             ->get();
                                             
                                             $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = 0;
                                             	foreach($product_titles as $prd_tit) {
                                             
                                             		
                                             	$subtotal=$prd_tit->cod_amt; 
                                             	$tax_amt = (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
                                             
                                             	$total_tax_amt+= (($prd_tit->cod_amt * $prd_tit->cod_tax)/100); 
                                             	$total_ship_amt+= $prd_tit->cod_shipping_amt;
                                             	$total_item_amt+=$prd_tit->cod_amt;
                                             	$coupon_amount+= $prd_tit->coupon_amount;
                                             	$prodct_id = $prd_tit->cod_pro_id;
                                             	$grand_total = ($total_item_amt + $total_tax_amt) + $total_ship_amt;
                                             $walletusedamt_final=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $coddetails1->cod_transaction_id)->get();
                                             ?>
                                          <?php if(count($walletusedamt_final)>0): ?> 
                                          <?php
                                          $walletamttot=$walletusedamt_final[0]->wallet_used;
                                          $totalpaid_amt=($grand_total-$walletusedamt_final[0]->wallet_used); 
                                          echo number_format($totalpaid_amt,2);
                                          ?>
                                          <?php else: ?> 
                                          <?php
                                          $totalpaid_amt =($total_item_amt + $total_ship_amt+ $total_tax_amt - $coupon_amount);
                                          $walletamttot=0;
                                          ?>
                                          <?php endif; ?>
                                          <?php } ?>
                                          <?php echo e($totalpaid_amt); ?></b>
                                          <br>
                                          <span>(<?php if(Lang::has(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.INCLUSIVE_OF_ALL_CHARGES')); ?> <?php endif; ?>)</span>
                                          <br>
                                          <span><?php if(Lang::has(Session::get('lang_file').'.ORDERID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDERID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDERID')); ?> <?php endif; ?>: <?php echo e($coddetails1->cod_transaction_id); ?></span><br>
                                          <span><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_DATE')); ?> <?php endif; ?>: <?php echo e($coddetails1->cod_date); ?></span><br>

                                          <span> <?php echo e($coddetails1->tax_type); ?>:  <?php echo e($coddetails1->tax_id_number); ?></span>

                                         


                                       </div>
                                       <div class="Front-inv-address-right" style="border-left:1px solid #eeeeee;text-align:left;">
                                          <h4><?php if(Lang::has(Session::get('lang_file').'.SHIPPING_ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPPING_ADDRESS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPPING_ADDRESS')); ?> <?php endif; ?></h4>
                                          <strong><?php if(Lang::has(Session::get('lang_file').'.NAME')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NAME')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NAME')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_name); ?><br/>
                                          <strong><?php if(Lang::has(Session::get('lang_file').'.PHONE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PHONE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PHONE')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_phone); ?><br/>
                                          <strong><?php if(Lang::has(Session::get('lang_file').'.EMAIL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EMAIL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EMAIL')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_email); ?> </br>
                                          <strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS1')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS1')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS1')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_address1); ?> </br>
                                          <strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS2')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS2')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS2')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_address2); ?> </br>
                                          <?php if($coddetails1->ship_ci_id): ?>
                                          <strong><?php if(Lang::has(Session::get('lang_file').'.CITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CITY')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_ci_id); ?> </br>
                                          <?php endif; ?>
                                          <?php if($coddetails1->ship_state): ?>
                                          <strong><?php if(Lang::has(Session::get('lang_file').'.STATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.STATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.STATE')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_state); ?> </br>
                                          <?php endif; ?>
                                          <?php if($coddetails1->ship_country): ?>
                                          <strong><?php if(Lang::has(Session::get('lang_file').'.COUNTRY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUNTRY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUNTRY')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_country); ?> </br>
                                          <?php endif; ?>
                                          <strong><?php if(Lang::has(Session::get('lang_file').'.ZIPCODE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ZIPCODE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ZIPCODE')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_postalcode); ?> </br>
                                       </div>
                                    </div>
                                 </div>
                                 <hr style="clear: both;">
                                 <div class="" style="padding: 15px; text-align: center;">
                                    <div class="span12 text-center">
                                       <h4 class="text-center"><?php if(Lang::has(Session::get('lang_file').'.INVOICE_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.INVOICE_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.INVOICE_DETAILS')); ?> <?php endif; ?></h4>
                                       <span><?php if(Lang::has(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')); ?> <?php endif; ?> </span>
                                    </div>
                                 </div>
                                 <div style="clear: both;"></div>
                                 <br>
                                 <?php /*<!--<h4 class="text-center"> //if (Lang::has(Session::get('lang_file').'.PRODUCT_DETAILS')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_DETAILS');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_DETAILS');} </h4>--> */ ?>
                                 <div class="table-responsive">
                                    <table class="inv-table" style="width:98%;" align="center" border="1" bordercolor="#e6e6e6">
                                       <tr style="border-bottom:1px solid #e6e6e6; background:#f5f5f5;">
                                          <th width=""><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_TITLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_TITLE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_TITLE')); ?> <?php endif; ?></th>
                                          <?php /*<!--td  width="13%" align="center">Color</td>&nbsp;
                                             <td  width="13%" align="center">Size</td-->  */?>
                                          <th  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.QUANTITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.QUANTITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.QUANTITY')); ?> <?php endif; ?></th>
                                          <th  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.PRICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRICE')); ?> <?php endif; ?></th>
                                          <th  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.COUPON_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUPON_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUPON_AMOUNT')); ?> <?php endif; ?></th>
                                          <th  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.SUB_TOTAL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SUB_TOTAL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SUB_TOTAL')); ?> <?php endif; ?></th>
                                          <th  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.PAYMENT_STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PAYMENT_STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PAYMENT_STATUS')); ?> <?php endif; ?></th>
                                          <th  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.DELIVERY_STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DELIVERY_STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DELIVERY_STATUS')); ?> <?php endif; ?></th>
                                       </tr>
                                       <?php 
                                          $subtotal1=0;
                                          $customer_id = session::get('customerid');
                                          $product_titles=DB::table('nm_ordercod')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')->where('cod_transaction_id', '=', $coddetails1->cod_transaction_id)
                                          ->orderBy('nm_ordercod.cod_id', 'desc')
                                          ->where('nm_ordercod.cod_order_type', '=', 1)
                                          ->where('nm_ordercod.cod_cus_id', '=', $customer_id)
                                          ->get();
                                          
                                          $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = 0; ?>
                                       <?php foreach($product_titles as $prd_tit) { ?>
                                       <?php if($prd_tit->delivery_status==1): ?>
                                       <?php
                                       $orderstatus="Order Placed";
                                       ?>
                                       <?php elseif($prd_tit->delivery_status==2): ?> 
                                       <?php
                                       $orderstatus="Order Packed";
                                       ?>
                                       <?php elseif($prd_tit->delivery_status==3): ?> 
                                       <?php
                                       $orderstatus="Dispatched";
                                       ?>
                                       <?php elseif($prd_tit->delivery_status==4): ?> 
                                       <?php
                                       $orderstatus="Delivered";
                                       ?>
                                       <?php elseif($prd_tit->delivery_status==5): ?>
                                       <?php
                                       $orderstatus="cancel pending";
                                       ?>
                                       <?php elseif($prd_tit->delivery_status==6): ?> 
                                       <?php
                                       $orderstatus="cancelled";
                                       ?>
                                       <?php elseif($prd_tit->delivery_status==7): ?> 
                                       <?php
                                       $orderstatus="return pending";
                                       ?>
                                       <?php elseif($prd_tit->delivery_status==8): ?> 
                                       <?php
                                       $orderstatus="Returned";
                                       ?>
                                       <?php elseif($prd_tit->delivery_status==9): ?> 
                                       <?php
                                       $orderstatus="Replace Pending";
                                       ?>
                                       <?php elseif($prd_tit->delivery_status==10): ?> 
                                       <?php
                                       $orderstatus="Replaced";
                                       ?>
                                       <?php else: ?>
                                       <?php
                                       $orderstatus = '';
                                       ?>
                                       <?php endif; ?>
                                       <?php if($prd_tit->cod_status==1): ?>
                                       <?php
                                       $payment_status="Success";
                                       ?>
                                       <?php elseif($prd_tit->cod_status==2): ?> 
                                       <?php
                                       $payment_status="Order Packed";
                                       ?>
                                       <?php elseif($prd_tit->cod_status==3): ?> 
                                       <?php
                                       $payment_status="Hold";
                                       ?>
                                       <?php elseif($prd_tit->cod_status==4): ?> 
                                       <?php
                                       $payment_status="Faild";
                                       ?>
                                       <?php endif; ?>
                                       <?php		
                                          $subtotal=$prd_tit->cod_amt; 
                                          $tax_amt = (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
                                          
                                          $total_tax_amt+= (($prd_tit->cod_amt * $prd_tit->cod_tax)/100); 
                                          $total_ship_amt+= $prd_tit->cod_shipping_amt;
                                          $total_item_amt+=$prd_tit->cod_amt;
                                          $coupon_amount+= $prd_tit->coupon_amount;
                                          $prodct_id = $prd_tit->cod_pro_id;
                                          ?> 
                                       <tr style="border-bottom:1px solid #666;">
                                          <td  width="" align="center"> 
                                             <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                                             <?php	$pro_title = 'pro_title'; ?>
                                             <?php else: ?>  <?php  $pro_title = 'pro_title_'.Session::get('lang_code'); ?> <?php endif; ?>
                                             <?php	echo $prd_tit->$pro_title."<br/>";?>
                                             <?php if($prd_tit->si_name!="") echo "Size:".$prd_tit->si_name.", ";
                                                if($prd_tit->co_name!="") echo "Color:".$prd_tit->co_name."<br/>";?>
                                          </td>
                                          
                                          <td  width="" align="center"><?php echo e($prd_tit->cod_qty); ?> </td>
                                          <td  width="13%" align="center"><?php echo e(Helper::cur_sym()); ?><?php echo e($prd_tit->pro_disprice); ?> </td>
                                          <?php if($prd_tit->coupon_amount != 0): ?> 
                                          <td  width="" align="center"><?php echo e(Helper::cur_sym()); ?><?php echo e($prd_tit->coupon_amount); ?> </td>
                                          <?php else: ?>  
                                          <td  width="13%" align="center"><?php echo e(Helper::cur_sym()); ?><?php echo e($prd_tit->coupon_amount); ?> <?php endif; ?>
                                          <td  width="" align="center"><?php echo e(Helper::cur_sym()); ?><?php echo e($subtotal - $prd_tit->coupon_amount); ?> </td>
                                          <td  width="" align="center"><?php echo e($payment_status); ?></td>
                                          <td  width="" align="center"><?php echo e($orderstatus); ?></td>
                                          </td>
                                       </tr>
                                       <?php }?>
                                       <?php $grand_total = ($total_item_amt + $total_tax_amt) + $total_ship_amt;
                                          $walletusedamt_final=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $coddetails1->cod_transaction_id)->get(); ?>
                                       <?php if(count($walletusedamt_final)>0): ?> 
                                       <?php 
                                       $walletamttot=$walletusedamt_final[0]->wallet_used;
                                       $totalpaid_amt=($grand_total-$walletusedamt_final[0]->wallet_used);
                                       echo number_format($totalpaid_amt,2); ?>
                                       <?php else: ?> 
                                       <?php
                                       $totalpaid_amt =($total_item_amt + $total_ship_amt+ $total_tax_amt - $coupon_amount);
                                       $walletamttot=0;
                                       ?>
                                       <?php endif; ?>
                                    </table>
                                 </div>
                                 <br>
                                 <hr>
                                 <div class="" style="padding: 15px; clear: both; overflow: hidden;">
                                    <div class="col-lg-6 Front-inv-price-left"></div>
                                    <div class="col-lg-6 Front-inv-price-right">
                                       <span><?php if(Lang::has(Session::get('lang_file').'.SHIPMENT_VALUE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPMENT_VALUE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPMENT_VALUE')); ?> <?php endif; ?><b class="pull-right" style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($total_ship_amt); ?> </b></span><br>
                                       <span><?php if(Lang::has(Session::get('lang_file').'.TAX')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TAX')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TAX')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($total_tax_amt); ?></b></span><br>
                                       <?php if(count($walletusedamt_final)>0): ?> 
                                       <span><?php if(Lang::has(Session::get('lang_file').'.WALLET')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.WALLET')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.WALLET')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;">- <?php echo e(Helper::cur_sym()); ?><?php echo e($walletamttot); ?></b></span>
                                       <?php endif; ?>
                                       <hr>
                                       <span><?php if(Lang::has(Session::get('lang_file').'.AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AMOUNT')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($totalpaid_amt); ?></b></span>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-danger" type="button"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php $i=$i+1;  ?>  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                  </ul>
               </div>
            </div>
            <div id="six" <?php if(isset($tab_active) && ($tab_active==6)): ?>  class="tab-pane active" <?php else: ?> class="tab-pane" <?php endif; ?> >
            <div class="row-fluid">
               <ul class="text_tab">
                  <div class="row">
                     <div class="col-lg-11 panel_marg">
                        <div class="btn btn-large btn-primary pull-right me_btn cart-res" style="margin-bottom: 5px;"><?php if(Lang::has(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOTAL_WALLET_BALANCE_AMOUNT')); ?> <?php endif; ?>  : <?php echo e(Helper::cur_sym()); ?><?php echo e((($customer_info->wallet!="")?number_format($customer_info->wallet,2):'0.00')); ?></div>
                        <div class="table-responsive">
                           <table class="table table-bordered table-sieve dghdf"  style="margin-left:3%;width:97%; font-size:13px; overflow-x: scroll;">
                              <thead style="background:#4a994c; color:#fff;">
                                 <tr>
                                    <th class="text-center"><?php if(Lang::has(Session::get('lang_file').'.S.NO')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.S.NO')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.S.NO')); ?> <?php endif; ?></th>
                                    <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDERID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDERID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDERID')); ?> <?php endif; ?></th>
                                    <?php /*	<!--<th style="text-align:center;"><?php //if (Lang::has(Session::get('lang_file').'.TOT._PRODUCT')!= '') { echo  trans(Session::get('lang_file').'.TOT._PRODUCT');}  else { echo trans($OUR_LANGUAGE.'.TOT._PRODUCT');} ?></th>
                                    <th style="text-align:center;">Product Names</th>
                                    <th style="text-align:center;">Shipping Address </th>
                                    --> */?>
                                    <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOTAL_ORDER_AMOUNT')); ?> <?php endif; ?></th>
                                    <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?>  <?php else: ?> { echo trans($OUR_LANGUAGE.'.ORDER_DATE')}} <?php endif; ?></th>
                                   
                                    <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ACTION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ACTION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ACTION')); ?> <?php endif; ?></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php if(count($get_deal_COD)<1): ?>
                                 <tr>
                                    <td colspan="6" class="text-center"><?php if(Lang::has(Session::get('lang_file').'.NO_ORDER_DEAL_COD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_ORDER_DEAL_COD')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_ORDER_DEAL_COD')); ?> <?php endif; ?></td>
                                 </tr>
                                 <?php endif; ?>
                                 <?php $i=1;
                                    /*  print_r("<pre>");	
                                    print_r($getproductordercod_orderwise);	
                                    print_r("</pre>");	 */  
                                    $total_item_amt = 0;
                                    $all_item_tax = 0;
                                    $total_grand_total = 0;
                                    $all_ship_amt  =0;
                                    $total_tax_amt =0;
                                    $total_ship_amt =0;
                                    $coupon_amount =0;
                                    $item_tax = 0;
                                    
                                    	?>							
                                 <?php $__currentLoopData = $get_deal_COD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $codorderdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php if($codorderdet->cod_status==1): ?>
                                 <?php 
                                 $codorderstatus="success"; ?>
                                 <?php elseif($codorderdet->cod_status==2): ?> 
                                 <?php
                                 $codorderstatus="completed";
                                 ?>
                                 <?php elseif($codorderdet->cod_status==3): ?> 
                                 <?php
                                 $codorderstatus="Hold";
                                 ?>
                                 <?php elseif($codorderdet->cod_status==4): ?> 
                                 <?php
                                 $codorderstatus="failed"; ?>
                                 <?php endif; ?>
                                 <?php 	 $item_amt = $codorderdet->cod_amt + (($codorderdet->cod_amt * $codorderdet->cod_tax)/100);
                                 $ship_amt = $codorderdet->cod_shipping_amt;
                                 //$item_tax = $codorderdet->cod_tax;  
                                 ?>
                                 <?php if($codorderdet->coupon_amount != 0): ?>
                                 <?php
                                 $grand_total =  ($item_amt + $ship_amt + $item_tax - $codorderdet->coupon_amount);
                                 ?>
                                 <?php else: ?>
                                 <?php
                                 $grand_total =  ($item_amt + $ship_amt + $item_tax); ?>
                                 <?php endif; ?>
                                 <?php
                                 $subtotal1=0;
                                 $customer_id = session::get('customerid');
                                 $product_titles=DB::table('nm_ordercod')
                                 ->join('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
                                 ->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')
                                 ->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')
                                 ->where('cod_transaction_id', '=', $codorderdet->cod_transaction_id)
                                 ->orderBy('nm_ordercod.cod_id', 'desc')
                                 ->where('nm_ordercod.cod_order_type', '=', 2)
                                 ->where('nm_ordercod.cod_cus_id', '=', $customer_id)
                                 ->get();
                                 $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = 0;
                                 ?>
                                 <?php	foreach($product_titles as $prd_tit) { ?>
                                 <?php
                                 $subtotal=$prd_tit->cod_amt; 
                                 $tax_amt = (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
                                 $total_tax_amt+= (($prd_tit->cod_amt * $prd_tit->cod_tax)/100); 
                                 $total_ship_amt+= $prd_tit->cod_shipping_amt;
                                 $total_item_amt+=$prd_tit->cod_amt;
                                 $coupon_amount+= $prd_tit->coupon_amount;
                                 $prodct_id = $prd_tit->cod_pro_id;
                                 $grand_total = ($total_item_amt + $total_tax_amt) + $total_ship_amt;
                                 $walletusedamt_final=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $codorderdet->cod_transaction_id)->get();
                                 ?>
                                 <?php if(count($walletusedamt_final)>0): ?> 
                                 <?php
                                 $walletamttot=$walletusedamt_final[0]->wallet_used;
                                 $totalpaid_amt=($grand_total-$walletusedamt_final[0]->wallet_used);
                                 echo number_format($totalpaid_amt,2); ?>
                                 <?php else: ?> 
                                 <?php
                                 $totalpaid_amt =($total_item_amt + $total_ship_amt+ $total_tax_amt - $coupon_amount);
                                 $walletamttot=0;
                                 ?>
                                 <?php endif; ?>
                                 <?php	}
                                    ?>
                                 <tr>
                                    <td class="text-center"><?php echo e($i); ?></td>
                                    <td class="text-center"><?php echo e($codorderdet->cod_transaction_id); ?></td>
                                    <?php /* <td class="text-center"><?php 
                                       $product_tot_count=DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('cod_transaction_id', '=', $codorderdet->cod_transaction_id)->first(array(
                                         DB::raw( 'count(*) AS tot_count_prd' )
                                       ));
                                       echo $product_tot_count->tot_count_prd;
                                       ?></td>*/?>
                                    <?php /*<!--td class="text-center"><?php 
                                       $product_titles=DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('cod_transaction_id', '=', $codorderdet->cod_transaction_id)->get();
                                       
                                       echo "<ul style='list-style:disc;'>";
                                       foreach($product_titles as $prd_tit) {
                                       if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                                       $pro_title = 'pro_title';
                                       }else {  $pro_title = 'pro_title_'.Session::get('lang_code'); }
                                       echo "<li style='width:100%;'>".$prd_tit->pro_title."</li>";
                                       }
                                       echo "</ul>"; 
                                       ?></td-->
                                    <!--td class="text-center"><?php echo  $codorderdet->cod_ship_addr;?></td--> */ ?>
                                    <td class="text-center"><?php echo e(Helper::cur_sym()); ?> <?php echo e($totalpaid_amt); ?>

                                       <?php /*$product_total_amt=DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('cod_transaction_id', '=', $codorderdet->cod_transaction_id)->first(array(
                                          DB::raw( 'SUM(cod_amt) AS cod_amt_total')
                                          )); 
                                          echo $cod_amt_total = $product_total_amt->cod_amt_total;*/
                                          
                                          //echo number_format($product_total_amt->cod_amt_total,2);
                                          //echo  $codorderdet->cod_ship_addr;
                                          //echo $grand_total;
                                          ?>
                                    </td>
                                    <td class="text-center"><?php echo e($codorderdet->cod_date); ?></td>
                                    <!--														<td class="text-center"><?php echo e(Helper::cur_sym()); ?><?php 
                                       //$walletusedamt_final=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $codorderdet->cod_transaction_id)->get();
                                       // print_r($walletusedamt_final);
                                       //echo ((count($walletusedamt_final)>0)?"  ".number_format($walletusedamt_final[0]->wallet_used,2):'0');?></td>-->
                                    <!--<td class="text-center"><?php //echo  $codorderstatus;?></td>-->
                                    <td class="text-center">
                                       <a  class="btn btn-success " data-target="<?php echo '#deal_cod'.$i;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.VIEW_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.VIEW_DETAILS')); ?> <?php endif; ?></a>
                                       <?php 		
                                          //cancel ,return and replacement process starts
                                                   $paypal_cancel_valid = 0;
                                                   $paypal_return_replace_valid = 0;
                                                   $cod_cancel_valid = 0;
                                                   $cod_return_replace_valid= 0;
                                          
                                                   /* cancel starts */
                                                   $cancel_valid =  DB::table('nm_ordercod')
                                          ->join('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')         
                                          ->orderBy('nm_ordercod.cod_id', 'desc')
                                          ->where('nm_ordercod.cod_order_type', '=', 2)
                                          ->where('nm_ordercod.cod_transaction_id', '=', $codorderdet->cod_transaction_id)
                                          ->where('delivery_status','=',1)->get();
                                                   $cod_cancel_valid =  count($cancel_valid);
                                                   $return_replace =  DB::table('nm_ordercod')
                                          ->join('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
                                          ->orderBy('nm_ordercod.cod_id', 'desc')
                                          ->where('nm_ordercod.cod_order_type', '=', 2)
                                          ->where('nm_ordercod.cod_transaction_id', '=',$codorderdet->cod_transaction_id)
                                          ->where('delivery_status','=',4)->get();
                                                  $cod_return_replace_valid =  count($return_replace);
                                          
                                                   //cancel ,return and replacement process ends
                                                   ?>
                                       <?php if($cod_cancel_valid>0): ?>
                                       <?php 
                                          $cancel_allow = 0;
                                          $cancel_allowed_itm  = array();
                                          //check Cancel date
                                          foreach ($cancel_valid as $cancelItm) {
                                          	$order_date = $cancelItm->cod_date;
                                          	$now = time(); //current date
                                          $format_date = strtotime($order_date);							
                                          $datediff = abs($now - $format_date);
                                          
                                          $numberDays = $datediff/86400;  // 86400 seconds in one day
                                          
                                          // and you might want to convert to integer
                                          $Ord_datecount = intval($numberDays); ?>
                                       <?php if($cancelItm->allow_cancel==1): ?>
                                       <?php if($Ord_datecount<$cancelItm->cancel_days): ?>
                                       <?php 
                                          $delStatusInfo = DB::table('nm_order_delivery_status')->where('cod_order_id','=',$cancelItm->cod_id)->get(); 
                                          //print_r($delStatusInfo); ?>
                                       <?php if(count($delStatusInfo)==0): ?>
                                       <?php
                                          $cancel_allowed_itm[]  = array('prod_id' => $cancelItm->cod_id,'prod_title' => $cancelItm->$deal_title );
                                          $cancel_allow++;  ?>
                                       <?php endif; ?>
                                       <?php endif; ?>
                                       <?php endif; ?>
                                       <?php	}
                                          ?>
                                       <?php if($cancel_allow>0): ?>
                                       <a class="btn btn-warning" data-target="<?php echo '#cancelModal_d'.$i;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.CANCELLATION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCELLATION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCELLATION')); ?> <?php endif; ?></a>
                                       <!-- Modal -->
                                       <div id="<?php echo 'cancelModal_d'.$i;?>" class="modal fade" role="dialog">
                                          <div class="modal-dialog">
                                             <!-- Modal content-->
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.CANCELLATION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCELLATION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCELLATION')); ?>      <?php endif; ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                   <?php echo Form::open(array('url'=>'deal_cancel_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                                   <?php if($cod_cancel_valid>0): ?>
                                                   <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                                   <input type="hidden" name="order_payment_type" value="0"><input type="hidden" name="order_type" value="2">
                                                   <div class="form-group">
                                                      <label for="cancel_item_id">
                                                      <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_CANCEL')); ?>   <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_CANCEL')); ?> <?php endif; ?>
                                                      </label>	
                                                      <select id = "cancel_item_id" name="cancel_item_id">
                                                         <?php if(count($cancel_allowed_itm)>0): ?>
                                                         <?php $__currentLoopData = $cancel_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         <?php else: ?>
                                                         <option value=""> No Item</option>
                                                         <?php endif; ?>	
                                                      </select>
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="cancel_notes">
                                                      <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_CANCEL')); ?> <?php endif; ?>
                                                      </label>
                                                      <textarea id="<?php echo '#cancel_notes'.$i;?>"  class="cancel_dealnotes_<?php echo $i; ?>" name="cancel_notes" maxlength="300" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_CANCEL')); ?> <?php endif; ?>"></textarea>
                                                   </div>
                                                   <?php endif; ?>
                                                </div>
                                                <div class="modal-footer" style="background: #f5f5f5;">
                                                   <button  type="submit" onclick="return cancel_dealvalidate('<?php echo $i; ?>');" class="btn btn-danger conform_cancel"  id="<?php echo '#conform_cancel'.$i;?>" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_CANCEL')); ?>    <?php endif; ?></button>
                                                   <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                                </div>
                                                <?php echo Form::close(); ?>

                                             </div>
                                          </div>
                                       </div>
                                       <?php endif; ?>	
                                       <?php endif; ?>
                                       <?php /* cancel end */ ?>
                                       <?php if($cod_return_replace_valid>0): ?>
                                       <?php 
                                          $return_allow = $replace_allow = 0;
                                          $return_allowed_itm  = array();
                                          $replace_allowed_itm  = array();
                                          //check Cancel date
                                          foreach ($return_replace as $Itm) {
                                          	$order_date = $Itm->cod_date;
                                          	$now = time(); //current date
                                          $format_date = strtotime($order_date);							
                                          $datediff = abs($now - $format_date);
                                          
                                          $numberDays = $datediff/86400;  // 86400 seconds in one day
                                          
                                          // and you might want to convert to integer
                                          $Ord_datecount = intval($numberDays);
                                          ?>
                                       <?php if($Itm->allow_return==1): ?>
                                       <?php if($Ord_datecount<$Itm->return_days): ?>
                                       <?php
                                          $delStatusInfo = DB::table('nm_order_delivery_status')->where('cod_order_id','=',$Itm->cod_id)->get(); 
                                          //print_r($delStatusInfo); ?>
                                       <?php if(count($delStatusInfo)==0): ?>
                                       <?php
                                          $return_allowed_itm[]  = array('prod_id' => $Itm->cod_id,'prod_title' => $Itm->$deal_title );
                                          $return_allow++;  ?>
                                       <?php endif; ?>
                                       <?php endif; ?>
                                       <?php endif; ?>
                                       <?php if($Itm->allow_replace==1): ?>
                                       <?php if($Ord_datecount<$Itm->replace_days): ?>
                                       <?php 
                                          $delStatusInfo = DB::table('nm_order_delivery_status')->where('cod_order_id','=',$Itm->cod_id)->get(); 
                                          //print_r($delStatusInfo); ?>
                                       <?php if(count($delStatusInfo)==0): ?>
                                       <?php
                                          $replace_allowed_itm[]  = array('prod_id' => $Itm->cod_id,'prod_title' => $Itm->$deal_title ); 
                                          $replace_allow++;  ?>
                                       <?php endif; ?>
                                       <?php endif; ?>
                                       <?php endif; ?>
                                       <?php	}
                                          ?>
                                       <?php if($return_allow>0): ?>
                                       <a class="btn btn-danger"  data-target="<?php echo '#returnModal_d'.$i;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RETURN')); ?> <?php endif; ?></a>
                                       <!-- REturn Modal -->
                                       <div id="<?php echo 'returnModal_d'.$i;?>" class="modal fade" role="dialog">
                                          <div class="modal-dialog">
                                             <!-- Modal content-->
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.ORDER_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_RETURN')); ?>      <?php endif; ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                   <?php echo Form::open(array('url'=>'deal_return_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                                   <?php if($return_allow>0): ?>
                                                   <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                                   <input type="hidden" name="order_payment_type" value="0"><input type="hidden" name="order_type" value="2">
                                                   <div class="form-group">
                                                      <label for="return_item_id">
                                                      <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_RETURN')); ?>   <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_RETURN')); ?>   <?php endif; ?>
                                                      </label>	
                                                      <select id = "return_item_id" name="return_item_id">
                                                         <?php if(count($return_allowed_itm)>0): ?>
                                                         <?php $__currentLoopData = $return_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         <?php else: ?>
                                                         <option value=""> No Item</option>
                                                         <?php endif; ?>	
                                                      </select>
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="return_notes">
                                                      <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_RETURN')); ?>       <?php endif; ?>			
                                                      </label>
                                                      <textarea id="return_notes" class="return_dealnotes_<?php echo $i; ?>" maxlength="300" name="return_notes" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_RETURN')); ?> <?php endif; ?>"></textarea>
                                                   </div>
                                                   <?php endif; ?>
                                                </div>
                                                <div class="modal-footer">
                                                   <button  type="submit" onclick="return return_dealvalidate('<?php echo $i; ?>');" class="btn btn-danger return_conform" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_RETURN')); ?> <?php endif; ?></button>
                                                   <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                                </div>
                                                <?php echo Form::close(); ?>

                                             </div>
                                          </div>
                                       </div>
                                       <?php endif; ?>
                                       <?php if($replace_allow>0): ?>
                                       <a class="btn btn-info"  data-target="<?php echo '#replaceModal_d'.$i;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REPLACE')); ?> <?php endif; ?></a>
                                       <!-- REturn Modal -->
                                       <div id="<?php echo 'replaceModal_d'.$i;?>" class="modal fade" role="dialog">
                                          <div class="modal-dialog">
                                             <!-- Modal content-->
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.ORDER_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_REPLACE')); ?> <?php endif; ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                   <?php echo Form::open(array('url'=>'deal_replace_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                                   <?php if($return_allow>0): ?>
                                                   <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                                   <input type="hidden" name="order_payment_type" value="0"><input type="hidden" name="order_type" value="2">
                                                   <div class="form-group">
                                                      <label for="replace_item_id">
                                                      <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_REPLACE')); ?> <?php endif; ?>
                                                      </label>	
                                                      <select id = "replace_item_id" name="replace_item_id">
                                                         <?php if(count($replace_allowed_itm)>0): ?>
                                                         <?php $__currentLoopData = $replace_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         <?php else: ?>
                                                         <option value=""> No Item</option>
                                                         <?php endif; ?>	
                                                      </select>
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="replace_notes">
                                                      <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_REPLACE')); ?> <?php endif; ?>
                                                      </label>
                                                      <textarea id="replace_notes" class="replace_dealnotes_<?php echo $i; ?>" name="replace_notes" maxlength="300" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_REPLACE')); ?> <?php endif; ?>"></textarea>
                                                   </div>
                                                   <?php endif; ?>
                                                </div>
                                                <div class="modal-footer">
                                                   <button  type="submit" onclick="return replace_dealvalidate('<?php echo $i; ?>');" class="btn btn-danger replace_conform" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_REPLACE')); ?> <?php endif; ?></button>
                                                   <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                                </div>
                                                <?php echo Form::close(); ?>

                                             </div>
                                          </div>
                                       </div>
                                       <?php endif; ?>
                                       <?php endif; ?>
                                       <?php /* cancel.return and replacement ends */ ?>
                                    </td>
                                 </tr>
                                 <?php $i=$i+1;  ?> 
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <?php  $i=1;
                        $grand_total =0;
                        $total_tax =0; ?>
                     <?php $__currentLoopData = $get_deal_COD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coddetails1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php
                        $status=$coddetails1->cod_status;
                        
                        
                        ?>
                     <div  id="<?php echo 'deal_cod'.$i?>" class="modal fade in invoice-front" style="display:none;">
                        <div class="modal-dialog cbd">
                           <div class="modal-content">
                              <div class="modal-header" style="border-bottom:none;">
                                 <div class="col-lg-2 pull-right"><a href="" class="btn btn-danger" data-dismiss="modal" ><i class="icon-remove-sign icon-2x"></i></a></div>
                                 <div class="col-lg-4">
                                    <?php 
                                       //$logo = url().'/public/assets/default_image/Logo.png';
                                       //if(file_exists($SITE_LOGO))
                                         $logo = $SITE_LOGO;
                                       ?> 
                                    <img src="<?php echo e($logo); ?>" alt="" style="width:100px;height:30px;">
                                 </div>
                                 <div class="col-lg-6" style="width:100% !important; text-align: center;"><strong><?php if(Lang::has(Session::get('lang_file').'.TAX_INVOICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TAX_INVOICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TAX_INVOICE')); ?> <?php endif; ?> </strong></div>
                              </div>
                              <hr style="margin-top: 0px;">
                              <div class="" style=" clear: both;">
                                 <div class="col-lg-12">
                                    <div class="Front-inv-address-left" style="text-align:left;">
                                       <h4><?php if(Lang::has(Session::get('lang_file').'.CASH_ON_DELIVERY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CASH_ON_DELIVERY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CASH_ON_DELIVERY')); ?> <?php endif; ?></h4>
                                       <b><?php if(Lang::has(Session::get('lang_file').'.AMOUNT_PAID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AMOUNT_PAID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AMOUNT_PAID')); ?> <?php endif; ?> :
                                       <?php echo e(Helper::cur_sym()); ?>

                                       <?php 
                                          $subtotal1=0;
                                          $customer_id = session::get('customerid');
                                          $product_titles=DB::table('nm_ordercod')
                                          ->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')
                                          ->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')
                                          ->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')
                                          ->where('cod_transaction_id', '=', $coddetails1->cod_transaction_id)
                                          ->orderBy('nm_ordercod.cod_id', 'desc')
                                          ->where('nm_ordercod.cod_order_type', '=', 2)
                                          ->where('nm_ordercod.cod_cus_id', '=', $customer_id)
                                          ->get();
                                          
                                          $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = 0;  ?>
                                       <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       <?php	
                                          $subtotal=$prd_tit->cod_amt; 
                                          $tax_amt = (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
                                          
                                          $total_tax_amt+= (($prd_tit->cod_amt * $prd_tit->cod_tax)/100); 
                                          $total_ship_amt+= $prd_tit->cod_shipping_amt;
                                          $total_item_amt+=$prd_tit->cod_amt;
                                          $coupon_amount+= $prd_tit->coupon_amount;
                                          $prodct_id = $prd_tit->cod_pro_id;
                                          $grand_total = ($total_item_amt + $total_tax_amt) + $total_ship_amt;
                                          $walletusedamt_final=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $coddetails1->cod_transaction_id)->get(); ?>
                                       <?php if(count($walletusedamt_final)>0): ?> 
                                       <?php
                                          $walletamttot=$walletusedamt_final[0]->wallet_used;
                                          $totalpaid_amt=($grand_total-$walletusedamt_final[0]->wallet_used);
                                          echo number_format($totalpaid_amt,2); ?>
                                       <?php else: ?> 
                                       <?php
                                          $totalpaid_amt =($total_item_amt + $total_ship_amt+ $total_tax_amt - $coupon_amount);
                                          $walletamttot=0; ?>
                                       <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php echo e($totalpaid_amt); ?></b>
                                       <br>
                                       <span>((<?php if(Lang::has(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.INCLUSIVE_OF_ALL_CHARGES')); ?> <?php endif; ?>) )</span>
                                       <br>
                                       <span><?php if(Lang::has(Session::get('lang_file').'.ORDERID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDERID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDERID')); ?> <?php endif; ?>: <?php echo e($coddetails1->cod_transaction_id); ?></span><br>
                                       <span><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_DATE')); ?> <?php endif; ?>: <?php echo e($coddetails1->cod_date); ?></span> <br>
                                       <span> <?php echo e($coddetails1->tax_type); ?>:  <?php echo e($coddetails1->tax_id_number); ?></span>
                                    </div>
                                    <div class="Front-inv-address-right" style="border-left:1px solid #eeeeee;text-align:left;">
                                       <h4><?php if(Lang::has(Session::get('lang_file').'.SHIPPING_ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPPING_ADDRESS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPPING_ADDRESS')); ?> <?php endif; ?></h4>
                                       <strong><?php if(Lang::has(Session::get('lang_file').'.NAME')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NAME')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NAME')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_name); ?><br/>
                                       <strong><?php if(Lang::has(Session::get('lang_file').'.PHONE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PHONE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PHONE')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_phone); ?><br/>
                                       <strong><?php if(Lang::has(Session::get('lang_file').'.EMAIL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EMAIL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EMAIL')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_email); ?> </br>
                                       <strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS1')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS1')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS1')); ?> <?php endif; ?>  : </strong><?php echo e($coddetails1->ship_address1); ?> </br>
                                       <strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS2')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS2')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS2')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_address2); ?> </br>
                                       <?php if($coddetails1->ship_ci_id): ?>
                                       <strong><?php if(Lang::has(Session::get('lang_file').'.CITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CITY')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_ci_id); ?> </br>
                                       <?php endif; ?>
                                       <?php if($coddetails1->ship_state): ?>
                                       <strong><?php if(Lang::has(Session::get('lang_file').'.STATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.STATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.STATE')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_state); ?></br>
                                       <?php endif; ?>
                                       <?php if($coddetails1->ship_country): ?>
                                       <strong><?php if(Lang::has(Session::get('lang_file').'.COUNTRY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUNTRY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUNTRY')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_country); ?> </br>
                                       <?php endif; ?>
                                       <strong><?php if(Lang::has(Session::get('lang_file').'.ZIPCODE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ZIPCODE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ZIPCODE')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1->ship_postalcode); ?> </br>
                                    </div>
                                 </div>
                              </div>
                              <hr style="clear:both;">
                              <div class="" style="padding: 15px">
                                 <div class="span12" style="text-align:center;">
                                    <h4 class="text-center"><?php if(Lang::has(Session::get('lang_file').'.INVOICE_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.INVOICE_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.INVOICE_DETAILS')); ?> <?php endif; ?></h4>
                                    <span><?php if(Lang::has(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')); ?> <?php endif; ?></span>
                                 </div>
                              </div>
                              <div style="clear: both;"></div>
                              <hr>
                              <h4 class="text-center" style="text-align:center; padding-top:20px;"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_DETAILS')); ?> <?php endif; ?></h4>
                              <div class="table-responsive">
                                 <table style="width:98%;" align="center" border="1" bordercolor="#e6e6e6">
                                    <tr style="border-bottom:1px solid #e6e6e6; background:#f5f5f5;">
                                       <td width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.DEAL_TITLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DEAL_TITLE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DEAL_TITLE')); ?> <?php endif; ?></td>
                                       <!--td  width="13%" align="center">Color</td>&nbsp;
                                          <td  width="13%" align="center">Size</td-->
                                       <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.QUANTITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.QUANTITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.QUANTITY')); ?> <?php endif; ?></td>
                                       <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.PRICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRICE')); ?> <?php endif; ?></td>
                                       <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.COUPON_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUPON_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUPON_AMOUNT')); ?> <?php endif; ?></td>
                                       <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.SUB_TOTAL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SUB_TOTAL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SUB_TOTAL')); ?> <?php endif; ?></td>
                                       <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.PAYMENT_STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PAYMENT_STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PAYMENT_STATUS')); ?> <?php endif; ?></td>
                                       <br>
                                       <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.DELIVERY_STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DELIVERY_STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DELIVERY_STATUS')); ?> <?php endif; ?></td>
                                    </tr>
                                    <?php 
                                       $subtotal1=0;
                                       $customer_id = session::get('customerid');
                                       $product_titles=DB::table('nm_ordercod')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')->where('cod_transaction_id', '=', $coddetails1->cod_transaction_id)
                                       ->orderBy('nm_ordercod.cod_id', 'desc')
                                       ->where('nm_ordercod.cod_order_type', '=', 2)
                                       ->where('nm_ordercod.cod_cus_id', '=', $customer_id)->get();
                                       
                                       $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = 0; ?>
                                    <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($prd_tit->delivery_status==1): ?>
                                    <?php
                                    $orderstatus="Order Placed";
                                    ?>
                                    <?php elseif($prd_tit->delivery_status==2): ?> 
                                    <?php
                                    $orderstatus="Order Packed";
                                    ?>
                                    <?php elseif($prd_tit->delivery_status==3): ?> 
                                    <?php
                                    $orderstatus="Dispatched";
                                    ?>
                                    <?php elseif($prd_tit->delivery_status==4): ?> 
                                    <?php
                                    $orderstatus="Delivered";
                                    ?>
                                    <?php elseif($prd_tit->delivery_status==5): ?>
                                    <?php
                                    $orderstatus="cancel pending";
                                    ?>
                                    <?php elseif($prd_tit->delivery_status==6): ?> 
                                    <?php
                                    $orderstatus="cancelled";
                                    ?>
                                    <?php elseif($prd_tit->delivery_status==7): ?> 
                                    <?php
                                    $orderstatus="return pending";
                                    ?>
                                    <?php elseif($prd_tit->delivery_status==8): ?> 
                                    <?php
                                    $orderstatus="Returned";
                                    ?>
                                    <?php elseif($prd_tit->delivery_status==9): ?> 
                                    <?php
                                    $orderstatus="Replace Pending";
                                    ?>
                                    <?php elseif($prd_tit->delivery_status==10): ?> 
                                    <?php
                                    $orderstatus="Replaced";
                                    ?>
                                    <?php else: ?>
                                    <?php
                                    $orderstatus = '';
                                    ?>
                                    <?php endif; ?>
                                    <?php if($prd_tit->cod_status==1): ?>
                                    <?php
                                    $payment_status="Success";
                                    ?>
                                    <?php elseif($prd_tit->cod_status==2): ?> 
                                    <?php
                                    $payment_status="Order Packed";
                                    ?>
                                    <?php elseif($prd_tit->cod_status==3): ?> 
                                    <?php
                                    $payment_status="Hold";
                                    ?>
                                    <?php elseif($prd_tit->cod_status==4): ?> 
                                    <?php
                                    $payment_status="Faild";
                                    ?>
                                    <?php endif; ?>
                                    <?php		
                                       $subtotal=$prd_tit->cod_amt; 
                                       $tax_amt = (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
                                       
                                       $total_tax_amt+= (($prd_tit->cod_amt * $prd_tit->cod_tax)/100); 
                                       $total_ship_amt+= $prd_tit->cod_shipping_amt;
                                       $total_item_amt+=$prd_tit->cod_amt;
                                       $coupon_amount+= $prd_tit->coupon_amount;
                                       $prodct_id = $prd_tit->cod_pro_id;
                                       ?> 
                                    <tr style="border-bottom:1px solid #666;">
                                       <td  width="" align="center">
                                          <?php 
                                             if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                                             	$deal_title = 'deal_title';
                                             }else {  $deal_title = 'deal_title_'.Session::get('lang_code'); }
                                             										echo $prd_tit->$deal_title."<br/>";?>
                                          <?php if($prd_tit->si_name!="") echo "Size:".$prd_tit->si_name.", ";
                                             if($prd_tit->co_name!="") echo "Color:".$prd_tit->co_name."<br/>";?>
                                       </td>
                                       &nbsp;									 
                                       <!--td  width="13%" align="center"><?php //echo $coddetails1->co_name;?></td>&nbsp;
                                          <td  width="13%" align="center"><?php //echo $coddetails1->si_name;?></td-->
                                       <td  width="" align="center"><?php echo e($prd_tit->cod_qty); ?> </td>
                                       <td  width="" align="center"><?php echo e(Helper::cur_sym()); ?><?php echo e($prd_tit->cod_amt); ?> </td>
                                       <?php if($prd_tit->coupon_amount != 0): ?> 
                                       <td  width="" align="center"><?php echo e(Helper::cur_sym()); ?><?php echo e($prd_tit->coupon_amount); ?> </td>
                                       <?php else: ?>  
                                       <td  width="" align="center"><?php echo e(Helper::cur_sym()); ?><?php echo e($prd_tit->coupon_amount); ?> <?php endif; ?>
                                       <td  width="" align="center"><?php echo e(Helper::cur_sym()); ?><?php echo e($subtotal - $prd_tit->coupon_amount); ?> </td>
                                       <td  width="" align="center"><?php echo e($payment_status); ?></td>
                                       <td  width="" align="center"><?php echo e($orderstatus); ?></td>
                                       </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $grand_total = ($total_item_amt + $total_tax_amt) + $total_ship_amt;
                                       $walletusedamt_final=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $coddetails1->cod_transaction_id)->get(); ?>
                                    <?php if(count($walletusedamt_final)>0): ?> 
                                    <?php
                                       $walletamttot=$walletusedamt_final[0]->wallet_used;
                                       $totalpaid_amt=($grand_total-$walletusedamt_final[0]->wallet_used);
                                       echo number_format($totalpaid_amt,2); ?>
                                    <?php else: ?> 
                                    <?php
                                       $totalpaid_amt =($total_item_amt + $total_ship_amt+ $total_tax_amt - $coupon_amount);
                                       $walletamttot=0;
                                       
                                       ?>
                                    <?php endif; ?>
                                 </table>
                              </div>
                              <br>
                              <hr>
                              <div class="" style="padding: 15px; ">
                                 <div class="col-lg-6"></div>
                                 <div class="col-lg-6">
                                    <span><?php if(Lang::has(Session::get('lang_file').'.SHIPMENT_VALUE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPMENT_VALUE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPMENT_VALUE')); ?> <?php endif; ?><b class="pull-right" style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($total_ship_amt); ?> </b></span><br>
                                    <span><?php if(Lang::has(Session::get('lang_file').'.TAX')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TAX')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TAX')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($total_tax_amt); ?></b></span><br>
                                    <?php if(count($walletusedamt_final)>0): ?> 
                                    <span><?php if(Lang::has(Session::get('lang_file').'.WALLET')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.WALLET')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.WALLET')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;">- <?php echo e(Helper::cur_sym()); ?><?php echo e($walletamttot); ?></b></span>
                                    <?php endif; ?>
                                    <hr>
                                    <span><?php if(Lang::has(Session::get('lang_file').'.AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AMOUNT')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($totalpaid_amt); ?></b></span>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button data-dismiss="modal" class="btn btn-danger" type="button"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?>  <?php endif; ?></button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php $i=$i+1;  ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
               </ul>
            </div>
         </div>
         <div id="three" <?php if(isset($tab_active) && ($tab_active==3)): ?>  class="tab-pane active" <?php else: ?> class="tab-pane" <?php endif; ?>>
         <div class="row-fluid">
            <ul class="text_tab">
               <div class="row">
                  <div class="col-lg-11 panel_marg">
                     <div class="btn btn-large btn-primary pull-right me_btn cart-res" style="margin-bottom: 5px;"><?php if(Lang::has(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOTAL_WALLET_BALANCE_AMOUNT')); ?> <?php endif; ?> : <?php echo e(Helper::cur_sym()); ?><?php echo e((($customer_info->wallet!="")?number_format($customer_info->wallet,2):'0.00')); ?></div>
                     <div class="table-responsive">
                        <table class="table table-bordered table-sieve ccc"  style="margin-left:3%;width:97%; font-size:13px">
                           <thead style="background:#4a994c; color:#fff;">
                              <tr>
                                 <th class="text-center"><?php if(Lang::has(Session::get('lang_file').'.S.NO')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.S.NO')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.S.NO')); ?> <?php endif; ?></th>
                                 <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDERID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDERID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDERID')); ?> <?php endif; ?></th>
                                 <?php /*	<!--<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.TOT._PRODUCT')!= '') { echo  trans(Session::get('lang_file').'.TOT._PRODUCT');}  else { echo trans($OUR_LANGUAGE.'.TOT._PRODUCT');} ?></th>
                                 th style="text-align:center;">Product Names</th>
                                 <th style="text-align:center;">Shipping Address </th>
                                 --> */ ?>
                                 <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOTAL_ORDER_AMOUNT')); ?> <?php endif; ?> </th>
                                 <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_DATE')); ?> <?php endif; ?></th>
                                 <th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.USED_WALLET')!= '') { echo  trans(Session::get('lang_file').'.USED_WALLET');}  else { echo trans($OUR_LANGUAGE.'.USED_WALLET');} ?></th>
                                 <!--<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.STATUS')!= '') { echo  trans(Session::get('lang_file').'.STATUS');}  else { echo trans($OUR_LANGUAGE.'.STATUS');} ?></th>-->
                                 <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ACTION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ACTION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ACTION')); ?> <?php endif; ?></th>
                                 <!--th class="text-center">SNO</th>
                                    <th style="text-align:center;">Product Names</th>
                                    <th style="text-align:center;">Shipping Address</th>
                                    <th style="text-align:center;">Order Date</th>
                                    <th style="text-align:center;">Status</th-->
                              </tr>
                           </thead>
                           <tbody>
                              <?php if(count($getproductorderpaypal_orderwise)<1): ?> 
                              <tr>
                                 <td colspan="6" class="text-center"><?php if(Lang::has(Session::get('lang_file').'.NO_ORDER_PAYPAL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_ORDER_PAYPAL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_ORDER_PAYPAL')); ?> <?php endif; ?></td>
                              </tr>
                              <?php endif; ?>
                              <?php $j=1;
                                 // foreach($getproductordersdetails as $orderdet) {
                                 	?>
                              <?php $__currentLoopData = $getproductorderpaypal_orderwise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                              <?php
                                 $walletusedamt_final1=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $orderdet->transaction_id)->get();
                                 
                                 $item_amt = $orderdet->order_amt + (($orderdet->order_amt * $orderdet->order_tax)/100);
                                 		
                                 
                                 		 $ship_amt = $orderdet->order_shipping_amt;
                                 		
                                 		 //$item_tax = $codorderdet->cod_tax;
                                 		
                                 		  $grand_total =  ($item_amt + $ship_amt + $item_tax);
                                 
                                 ?>
                              <tr>
                                 <td class="text-center"><?php echo $j;?></td>
                                 <td class="text-center"><?php echo $orderdet->transaction_id;?></td>
                                
                                 <td class="text-center"><?php echo e(Helper::cur_sym()); ?>

                                    <?php
                                       $customerid   = Session::get('customerid');
                                         $product_titles=DB::table('nm_order')
                                         ->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
                                         ->leftjoin('nm_color', 'nm_order.order_pro_color', '=', 'nm_color.co_id')
                                         ->leftjoin('nm_size', 'nm_order.order_pro_size', '=', 'nm_size.si_id')
                                         ->where('transaction_id', '=', $orderdet->transaction_id)
                                         ->where('nm_order.order_cus_id', '=', $customerid)
                                         ->where('nm_order.order_type','=',1)
                                         ->get();
                                         $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0;
                                         $wallet_amt =    $wallet     = 0; 
                                       
                                         
                                       	?>
                                    <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php	
                                       $subtotal=$prd_tit->order_amt; 
                                       				$tax_amt = (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                       			
                                       				$total_tax_amt+= (($prd_tit->order_amt * $prd_tit->order_tax)/100); 
                                       				$total_ship_amt+= $prd_tit->order_shipping_amt;
                                       				$total_item_amt+=$prd_tit->order_amt;
                                       				$coupon_amount+= $prd_tit->coupon_amount;
                                       				$prodct_id = $prd_tit->order_pro_id;
                                       				
                                       		$item_amt = $prd_tit->order_amt + (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                       			
                                       		
                                       			 $ship_amt = $prd_tit->order_shipping_amt;
                                       			
                                       		
                                       
                                       			$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                       			
                                       			$wallet_amt +=  $prd_tit->wallet_amount;                                                                                       $wallet     += $prd_tit->wallet_amount; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($grand_total-$wallet_amt); ?> </b>
                                 </td>
                                 <td class="text-center"><?php echo e($orderdet->order_date); ?></td>
                                 <td class="text-center"><?php echo e(Helper::cur_sym()); ?><?php 
                                    // print_r($walletusedamt_final);
                                     echo ((count($walletusedamt_final1)>0)?" ".number_format($walletusedamt_final1[0]->wallet_used,2):'0');
                                     
                                     ?></td>
                                 <td class="text-center">
                                    <a class="btn btn-success " data-target="<?php echo '#uiModalpp'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.VIEW_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.VIEW_DETAILS')); ?> <?php endif; ?></a>
                                    <?php /* cancel ,REturn asn replacement starts */?>
                                    <?php 		
                                       //cancel ,return and replacement process starts
                                                $paypal_cancel_valid = 0;
                                                $paypal_return_replace_valid = 0;
                                                $cod_cancel_valid = 0;
                                                $cod_return_replace_valid= 0;
                                       
                                                /* cancel starts */
                                              
                                                $cancel_valid =  DB::table('nm_order')
                                       ->join('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')            
                                       ->orderBy('nm_order.order_id', 'desc')
                                       ->where('nm_order.order_type', '=', 1)
                                       ->where('nm_order.transaction_id', '=', $orderdet->transaction_id)
                                       ->where('delivery_status','=',1)->get();
                                                $paypal_cancel_valid =  count($cancel_valid);
                                                $return_replace =  DB::table('nm_order')
                                       ->join('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
                                       ->orderBy('nm_order.order_id', 'desc')
                                       ->where('nm_order.order_type', '=', 1)
                                       ->where('nm_order.transaction_id', '=',$orderdet->transaction_id)
                                       ->where('delivery_status','=',4)->get();
                                                $paypal_return_replace_valid =  count($return_replace);
                                       
                                                //cancel ,return and replacement process ends
                                                ?>
                                    <?php if($paypal_cancel_valid>0): ?>
                                    <?php 
                                       $cancel_allow = 0;
                                       $cancel_allowed_itm  = array();
                                       //check Cancel date
                                       ?>
                                    <?php $__currentLoopData = $cancel_valid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancelItm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <?php 
                                       $order_date = $cancelItm->order_date;
                                       $now = time(); //current date
                                       $format_date = strtotime($order_date);							
                                       $datediff = abs($now - $format_date);
                                       
                                       $numberDays = $datediff/86400;  // 86400 seconds in one day
                                       
                                       // and you might want to convert to integer
                                       $Ord_datecount = intval($numberDays); ?>
                                    <?php if($cancelItm->allow_cancel==1): ?>
                                    <?php if($Ord_datecount<$cancelItm->cancel_days): ?>
                                    <?php 
                                       $delStatusInfo = DB::table('nm_order_delivery_status')->where('order_id','=',$cancelItm->order_id)->get(); 
                                       //print_r($delStatusInfo); 
                                       ?>
                                    <?php if(count($delStatusInfo)==0): ?>
                                    <?php
                                       $cancel_allowed_itm[]  = array('prod_id' => $cancelItm->order_id,'prod_title' => $cancelItm->$pro_title );
                                       $cancel_allow++;
                                       ?>						
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cancel_allow>0): ?>
                                    <a class="btn btn-warning" data-target="<?php echo '#cancelModalpp'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.CANCELLATION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCELLATION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCELLATION')); ?> <?php endif; ?></a>
                                    <!-- Modal -->
                                    <div id="<?php echo 'cancelModalpp'.$j;?>" class="modal fade" role="dialog">
                                       <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.CANCELLATION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCELLATION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCELLATION')); ?>      <?php endif; ?></h4>
                                             </div>
                                             <div class="modal-body">
                                                <?php echo Form::open(array('url'=>'cancel_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                                <?php if($paypal_cancel_valid>0): ?>
                                                <input type="hidden" name="customer_mail" value="<?php echo e($orderdet->ship_email); ?>">
                                                <input type="hidden" name="order_payment_type" value="1"><input type="hidden" name="order_type" value="1"><input type="hidden" name="mer_id" value="<?php echo e($orderdet->order_merchant_id); ?>">
                                                <div class="form-group">
                                                   <label for="cancel_item_id">
                                                   <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_CANCEL')); ?>   <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_CANCEL')); ?> <?php endif; ?>
                                                   </label>	
                                                   <select id = "cancel_item_id" name="cancel_item_id">
                                                      <?php if(count($cancel_allowed_itm)>0): ?>
                                                      <?php $__currentLoopData = $cancel_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      <?php else: ?>
                                                      <option value=""> No Item</option>
                                                      <?php endif; ?>	
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                   <label for="cancel_notes">
                                                   <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_CANCEL')); ?> <?php endif; ?>
                                                   </label>
                                                   <textarea id="<?php echo '#cancel_notes'.$j;?>" class="cancel_notes_<?php echo $j; ?>" name="cancel_notes" maxlength="300"  placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_CANCEL')); ?> <?php endif; ?>"></textarea>
                                                </div>
                                                <?php endif; ?>
                                             </div>
                                             <div class="modal-footer">
                                                <button  type="submit" onclick="return cancel_validate('<?php echo $j; ?>');" class="btn btn-danger conform_cancel"  id="<?php echo '#conform_cancel'.$j;?>" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_CANCEL')); ?>    <?php endif; ?></button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                             </div>
                                             <?php echo Form::close(); ?>

                                          </div>
                                       </div>
                                    </div>
                                    <?php endif; ?>	
                                    <?php endif; ?>
                                    <?php /* cancel end */ ?>
                                    <?php if($paypal_return_replace_valid>0): ?>
                                    <?php 
                                       $return_allow = $replace_allow = 0;
                                       $return_allowed_itm  = array();
                                       $replace_allowed_itm  = array();
                                       //check Cancel date 
                                       ?>
                                    <?php $__currentLoopData = $return_replace; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php
                                       $order_date = $Itm->order_date;
                                       $now = time(); //current date
                                       $format_date = strtotime($order_date);							
                                       $datediff = abs($now - $format_date);
                                       
                                       $numberDays = $datediff/86400;  // 86400 seconds in one day
                                       
                                       // and you might want to convert to integer
                                       $Ord_datecount = intval($numberDays);
                                       ?>
                                    <?php if($Itm->allow_return==1): ?>
                                    <?php if($Ord_datecount<$Itm->return_days): ?>
                                    <?php 
                                       $delStatusInfo = DB::table('nm_order_delivery_status')->where('order_id','=',$Itm->order_id)->get(); 
                                       //print_r($delStatusInfo);
                                       ?>
                                    <?php if(count($delStatusInfo)==0): ?>
                                    <?php
                                       $return_allowed_itm[]  = array('prod_id' => $Itm->order_id,'prod_title' => $Itm->$pro_title );
                                       $return_allow++; ?> 
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?> 
                                    <?php if($Itm->allow_replace==1): ?>
                                    <?php if($Ord_datecount<$Itm->replace_days): ?>
                                    <?php 
                                       $delStatusInfo = DB::table('nm_order_delivery_status')->where('order_id','=',$Itm->order_id)->get(); 
                                       //print_r($delStatusInfo);
                                       ?>
                                    <?php if(count($delStatusInfo)==0): ?>
                                    <?php 
                                       $replace_allowed_itm[]  = array('prod_id' => $Itm->order_id,'prod_title' => $Itm->$pro_title );
                                       $replace_allow++; ?> 
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($return_allow>0): ?>
                                    <a class="btn btn-blue btn-danger"  data-target="<?php echo '#returnModalpp'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RETURN')); ?> <?php endif; ?></a>
                                    <!-- REturn Modal -->
                                    <div id="<?php echo 'returnModalpp'.$j;?>" class="modal fade" role="dialog">
                                       <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.ORDER_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_RETURN')); ?>      <?php endif; ?></h4>
                                             </div>
                                             <div class="modal-body">
                                                <?php echo Form::open(array('url'=>'return_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                                <?php if($return_allow>0): ?>
                                                <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                                <input type="hidden" name="order_payment_type" value="1"><input type="hidden" name="order_type" value="1">
                                                <div class="form-group">
                                                   <label for="return_item_id">
                                                   <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_RETURN')); ?>   <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_RETURN')); ?>   <?php endif; ?>
                                                   </label>	
                                                   <select id = "return_item_id" name="return_item_id">
                                                      <?php if(count($return_allowed_itm)>0): ?>
                                                      <?php $__currentLoopData = $return_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      <?php else: ?>
                                                      <option value=""> No Item</option>
                                                      <?php endif; ?>	
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                   <label for="return_notes">
                                                   <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_RETURN')); ?> <?php endif; ?>
                                                   </label>
                                                   <textarea id="return_notes" class="return_notes_<?php echo $j; ?>" maxlength="300" name="return_notes" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_RETURN')); ?> <?php endif; ?>"></textarea>
                                                </div>
                                                <?php endif; ?>
                                             </div>
                                             <div class="modal-footer">
                                                <button onclick="return return_validate('<?php echo $j; ?>');" type="submit" class="btn btn-danger return_conform" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_RETURN')); ?> <?php endif; ?></button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                             </div>
                                             <?php echo Form::close(); ?>

                                          </div>
                                       </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($replace_allow>0): ?>
                                    <a class="btn btn-info"  data-target="<?php echo '#replaceModal_pp'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REPLACE')); ?> <?php endif; ?></a>
                                   
                                    <!-- REturn Modal -->
                                    <div id="<?php echo 'replaceModal_pp'.$j;?>" class="modal fade" role="dialog">
                                       <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.ORDER_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_REPLACE')); ?> <?php endif; ?></h4>
                                             </div>
                                             <div class="modal-body">
                                                <?php echo Form::open(array('url'=>'replace_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                                <?php if($return_allow>0): ?>
                                                <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                                <input type="hidden" name="order_payment_type" value="1"><input type="hidden" name="order_type" value="1">
                                                <div class="form-group">
                                                   <label for="replace_item_id">
                                                   <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_REPLACE')); ?> <?php endif; ?>
                                                   </label>	
                                                   <select id = "replace_item_id" name="replace_item_id">
                                                      <?php if(count($replace_allowed_itm)>0): ?>
                                                      <?php $__currentLoopData = $replace_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      <?php else: ?>
                                                      <option value=""> No Item</option>
                                                      <?php endif; ?>	
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                   <label for="replace_notes">
                                                   <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_REPLACE')); ?> <?php endif; ?>
                                                   </label>
                                                   <textarea id="replace_notes" class="replace_notes_<?php echo $j; ?>" name="replace_notes" maxlength="300" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_REPLACE')); ?> <?php endif; ?>"></textarea>
                                                </div>
                                                <?php endif; ?>
                                             </div>
                                             <div class="modal-footer">
                                                <button onclick="return replace_validate('<?php echo $j; ?>');" type="submit" class="btn btn-danger replace_conform" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_REPLACE')); ?> <?php endif; ?></button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                             </div>
                                             <?php echo Form::close(); ?>

                                          </div>
                                       </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php /* cancel ,REturn asn replacement ends */?>
                                 </td>
                              </tr>
                              <?php $j=$j+1;  ?>	
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <?php  $j=1; $all_tax_amt=0; $all_shipping_amt=0; ?>
                  <?php $__currentLoopData = $getproductorderpaypal_orderwise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coddetails1_paypal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                     $item_total=0;  $coupon_amount=0;
                     $subtotal =0;
                     $wallet_amt=0;$wallet =0;
                     
                     $tax_amt = (($coddetails1_paypal->order_amt * $coddetails1_paypal->order_tax)/100);
                     $all_tax_amt+=  (($coddetails1_paypal->order_amt * $coddetails1_paypal->order_tax)/100);
                     
                     $shipping_amt = $coddetails1_paypal->order_shipping_amt;
                     $all_shipping_amt+= $coddetails1_paypal->order_shipping_amt; ?>
                  <?php if($coddetails1_paypal->coupon_amount !=0): ?>
                  <?php  $coupon_value = $coddetails1_paypal->coupon_amount; ?>
                  <?php else: ?>
                  <?php 
                  $coupon_value = 0;  ?>
                  <?php endif; ?>
                  <?php  /*$wallet = DB::table('nm_ordercod_wallet')->where('cod_transaction_id','=',$coddetails1_paypal->transaction_id)->get();
                     if(count($wallet)!=0){
                         $wallet_amt = $wallet[0]->wallet_used;
                     }else{
                         $wallet_amt = 0;
                     }*/  ?>
                  <?php
                     $item_total = $coddetails1_paypal->order_amt;
                     
                     $grand_total = (($item_total+$tax_amt+$shipping_amt)-$wallet_amt)-$coupon_value;
                     ?>   
                  <div  id="<?php echo 'uiModalpp'.$j?>" class="modal fade in invoice-front" style="display:none;">
                     <div class="modal-dialog efg">
                        <div class="modal-content">
                           <div class="modal-header" style="border-bottom:none;">
                              <div class="col-lg-2 pull-right"><a href="" class="btn btn-danger" data-dismiss="modal" ><i class="icon-remove-sign icon-2x"></i></a></div>
                              <div class="col-lg-4">
                                 <?php 
                                    //$logo = url().'/public/assets/default_image/Logo.png';
                                    //if(file_exists($SITE_LOGO))
                                      $logo = $SITE_LOGO;
                                    ?> 
                                 <img src="<?php echo e($logo); ?>" alt="" style="width:100px;height:30px;">
                              </div>
                              <div class="col-lg-6" style="width:100% !important; text-align:center;"><strong><?php if(Lang::has(Session::get('lang_file').'.TAX_INVOICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TAX_INVOICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TAX_INVOICE')); ?> <?php endif; ?> </strong></div>
                           </div>
                           <hr style="margin-top: 0px;">
                           <div class="" style=" clear: both;">
                              <div class="col-lg-12">
                                 <div class="Front-inv-address-left" style="text-align:left;">
                                    <h4><?php if(Lang::has(Session::get('lang_file').'.PAYPAL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PAYPAL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PAYPAL')); ?> <?php endif; ?></h4>
                                    <b><?php if(Lang::has(Session::get('lang_file').'.AMOUNT_PAID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AMOUNT_PAID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AMOUNT_PAID')); ?> <?php endif; ?> :<?php echo e(Helper::cur_sym()); ?> 
                                    <?php
                                       $customerid   = Session::get('customerid');
                                         $product_titles=DB::table('nm_order')
                                         ->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
                                         ->leftjoin('nm_color', 'nm_order.order_pro_color', '=', 'nm_color.co_id')
                                         ->leftjoin('nm_size', 'nm_order.order_pro_size', '=', 'nm_size.si_id')
                                         ->where('transaction_id', '=', $coddetails1_paypal->transaction_id)
                                         ->where('nm_order.order_cus_id', '=', $customerid)
                                         ->where('nm_order.order_type','=',1)
                                         ->get();
                                         $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0; ?>
                                    <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php
                                       $subtotal=$prd_tit->order_amt; 
                                       				$tax_amt = (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                       			
                                       				$total_tax_amt+= (($prd_tit->order_amt * $prd_tit->order_tax)/100); 
                                       				$total_ship_amt+= $prd_tit->order_shipping_amt;
                                       				$total_item_amt+=$prd_tit->order_amt;
                                       				$coupon_amount+= $prd_tit->coupon_amount;
                                       				$prodct_id = $prd_tit->order_pro_id;
                                       				
                                       		$item_amt = $prd_tit->order_amt + (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                       			
                                       		
                                       			 $ship_amt = $prd_tit->order_shipping_amt;
                                       			
                                       		
                                       			 //$item_tax = $codorderdet->cod_tax;
                                       			/*if($prd_tit->coupon_amount != 0)
                                       			{
                                       				$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                       			}
                                       			else
                                       			{
                                       				$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt);
                                       			}*/	
                                       			$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);	
                                       
                                       			$wallet_amt +=  $prd_tit->wallet_amount;                                                                               $wallet     += $prd_tit->wallet_amount; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($grand_total-$wallet_amt); ?></b>
                                    <br>
                                    <span>((<?php if(Lang::has(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.INCLUSIVE_OF_ALL_CHARGES')); ?> <?php endif; ?>) )</span>
                                    <br>
                                    <span>
                                    <span><?php if(Lang::has(Session::get('lang_file').'.ORDERID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDERID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDERID')); ?> <?php endif; ?>: <?php echo e($coddetails1_paypal->transaction_id); ?></span><br>
                                    <span><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_DATE')); ?> <?php endif; ?>: <?php echo e($coddetails1_paypal->order_date); ?></span>

                                    <br><span> <?php echo e($coddetails1_paypal->tax_type); ?>:  <?php echo e($coddetails1_paypal->tax_id_number); ?></span>
                                 </div>
                                 <div class="Front-inv-address-right" style="border-left:1px solid #eeeeee;text-align:left;">
                                    <h4><?php if(Lang::has(Session::get('lang_file').'.SHIPPING_ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPPING_ADDRESS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPPING_ADDRESS')); ?> <?php endif; ?></h4>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.NAME')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NAME')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NAME')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_name); ?><br/>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.PHONE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PHONE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PHONE')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_phone); ?><br/>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.EMAIL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EMAIL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EMAIL')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_email); ?> </br>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS1')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS1')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS1')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_address1); ?> </br>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS2')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS2')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS2')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_address2); ?> </br>
                                    <?php if($coddetails1_paypal->ship_ci_id): ?>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.CITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CITY')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_ci_id); ?> </br>
                                    <?php endif; ?>
                                    <?php if($coddetails1_paypal->ship_state): ?>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.STATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.STATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.STATE')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_state); ?></br>
                                    <?php endif; ?>
                                    <?php if($coddetails1_paypal->ship_country): ?>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.COUNTRY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUNTRY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUNTRY')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_country); ?> </br>
                                    <?php endif; ?>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.ZIPCODE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ZIPCODE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ZIPCODE')); ?> <?php endif; ?>: </strong><?php echo e($coddetails1_paypal->ship_postalcode); ?> </br>
                                 </div>
                              </div>
                           </div>
                           <hr style="clear: both;">
                           <div class="" style="padding: 15px;">
                              <div class="span12" style="text-align:center;">
                                 <h4 class="text-center" ><?php if(Lang::has(Session::get('lang_file').'.INVOICE_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.INVOICE_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.INVOICE_DETAILS')); ?> <?php endif; ?></h4>
                                 <span style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')); ?> <?php endif; ?> </span>
                              </div>
                           </div>
                           <div style="clear: both;"></div>
                           <hr>
                           <h4 class="text-center"  style="text-align:center;padding-top: 20px; margin-bottom: 0px;"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_DETAILS')); ?> <?php endif; ?></h4>
                           <div class="table-responsive">
                              <table style="width:98%;" align="center" border="1" bordercolor="#e6e6e6">
                                 <tr style="border-bottom:1px solid #e6e6e6; background:#f5f5f5;">
                                    <td width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_TITLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_TITLE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_TITLE')); ?> <?php endif; ?></td>
                                    <!--td  width="13%" align="center">Color</td>&nbsp;
                                       <td  width="13%" align="center">Size</td-->
                                    <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.QUANTITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.QUANTITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.QUANTITY')); ?> <?php endif; ?></td>
                                    <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.PRICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRICE')); ?> <?php endif; ?></td>
                                    <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.SUB_TOTAL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SUB_TOTAL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SUB_TOTAL')); ?> <?php endif; ?></td>
                                    <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.COUPON_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUPON_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUPON_AMOUNT')); ?> <?php endif; ?></td>
                                    <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.PAYMENT_STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PAYMENT_STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PAYMENT_STATUS')); ?> <?php endif; ?></td>
                                    <br>
                                    <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.DELIVERY_STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DELIVERY_STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DELIVERY_STATUS')); ?> <?php endif; ?></td>
                                 </tr>
                                 <?php
                                    $customerid   = Session::get('customerid');
                                    $product_titles=DB::table('nm_order')
                                    ->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')
                                    ->leftjoin('nm_color', 'nm_order.order_pro_color', '=', 'nm_color.co_id')
                                    ->leftjoin('nm_size', 'nm_order.order_pro_size', '=', 'nm_size.si_id')
                                    ->where('transaction_id', '=', $coddetails1_paypal->transaction_id)
                                    ->where('nm_order.order_cus_id', '=', $customerid)
                                    ->where('nm_order.order_type','=',1)
                                    ->get();
                                    $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0; ?>
                                 <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php		$status=$prd_tit->delivery_status; ?>
                                 <?php if($prd_tit->delivery_status==1): ?>
                                 <?php
                                 $orderstatus="Order Placed";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==2): ?> 
                                 <?php
                                 $orderstatus="Order Packed";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==3): ?> 
                                 <?php
                                 $orderstatus="Dispatched";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==4): ?> 
                                 <?php
                                 $orderstatus="Delivered";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==5): ?>
                                 <?php
                                 $orderstatus="cancel pending";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==6): ?> 
                                 <?php
                                 $orderstatus="cancelled";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==7): ?> 
                                 <?php
                                 $orderstatus="return pending";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==8): ?> 
                                 <?php
                                 $orderstatus="Returned";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==9): ?> 
                                 <?php
                                 $orderstatus="Replace Pending";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==10): ?> 
                                 <?php
                                 $orderstatus="Replaced";
                                 ?>
                                 <?php else: ?>
                                 <?php
                                 $orderstatus = '';
                                 ?>
                                 <?php endif; ?> 
                                 <?php if($prd_tit->order_status==1): ?>
                                 <?php
                                 $payment_status="Success";
                                 ?>
                                 <?php elseif($prd_tit->order_status==2): ?> 
                                 <?php
                                 $payment_status="Order Packed";
                                 ?>
                                 <?php elseif($prd_tit->order_status==3): ?> 
                                 <?php
                                 $payment_status="Hold";
                                 ?>
                                 <?php elseif($prd_tit->order_status==4): ?> 
                                 <?php
                                 $payment_status="Faild";
                                 ?>
                                 <?php endif; ?>
                                 <?php
                                    $subtotal=$prd_tit->order_amt; 
                                    				$tax_amt = (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                    			
                                    				$total_tax_amt+= (($prd_tit->order_amt * $prd_tit->order_tax)/100); 
                                    				$total_ship_amt+= $prd_tit->order_shipping_amt;
                                    				$total_item_amt+=$prd_tit->order_amt;
                                    				$coupon_amount+= $prd_tit->coupon_amount;
                                    				$prodct_id = $prd_tit->order_pro_id;
                                    				
                                    		$item_amt = $prd_tit->order_amt + (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                    			
                                    		
                                    			 $ship_amt = $prd_tit->order_shipping_amt;
                                    		
                                    			$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);		
                                    ?>
                                 <tr>
                                    <td  width="" align="center"><?php 
                                       if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                                       	$pro_title = 'pro_title';
                                       }else {  $pro_title = 'pro_title_'.Session::get('lang_code'); }
                                       		echo $prd_tit->$pro_title."<br/>";?>
                                       <?php if($prd_tit->si_name!="") echo "Size:".$prd_tit->si_name.", ";
                                          if($prd_tit->co_name!="") echo "Color:".$prd_tit->co_name."<br/>";?>
                                    </td>
                                    &nbsp;									 
                                    <!--td  width="13%" align="center"><?php //echo $coddetails1->co_name;?></td>&nbsp;
                                       <td  width="13%" align="center"><?php //echo $coddetails1->si_name;?></td-->
                                    <td  width="" align="center"><?php echo e($prd_tit->order_qty); ?> </td>
                                    <td  width="" align="center"><?php echo e(Helper::cur_sym()); ?> <?php echo e($prd_tit->pro_disprice); ?> </td>
                                    <td  width="" align="center"><?php echo e($subtotal - $prd_tit->coupon_amount); ?> </td>
                                    <?php if($prd_tit->coupon_amount != 0): ?> 
                                    <td  width="" align="center"><?php echo e(Helper::cur_sym()); ?> <?php echo e($prd_tit->coupon_amount); ?> </td>
                                    <?php else: ?>  
                                    <td  width="" align="center"><?php echo e(Helper::cur_sym()); ?> <?php echo e($prd_tit->coupon_amount); ?> </td>
                                    <?php endif; ?>
                                    <td  width="" align="center"><?php echo e($payment_status); ?></td>
                                    <td  width="" align="center"><?php echo e($orderstatus); ?></td>
                                 </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </table>
                           </div>
                           <br>
                           <hr>
                           <div class="" style="padding: 15px;">
                              <div class="col-lg-6"></div>
                              <div class="col-lg-6">
                                 <span><?php if(Lang::has(Session::get('lang_file').'.SHIPMENT_VALUE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPMENT_VALUE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPMENT_VALUE')); ?> <?php endif; ?><b class="pull-right" style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($total_ship_amt); ?> </b></span><br>
                                 <span><?php if(Lang::has(Session::get('lang_file').'.TAX')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TAX')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TAX')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($total_tax_amt); ?></b></span><br>
                                 <?php 
                                    $subtotal1 = 0;?>
                                 <?php if(count($wallet)!=0): ?> 
                                 <span>
                                    wallet :
                                    <p class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> -<?php echo e($wallet_amt); ?></p>
                                 </span>
                                 <br>
                                 <?php endif; ?>
                                 <hr>
                                 <?php $totamt_paypal=$subtotal1+$coddetails1_paypal->order_tax;?>
                                 <span><?php if(Lang::has(Session::get('lang_file').'.AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AMOUNT')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($grand_total-$wallet_amt); ?></b></span>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-danger" type="button"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php $j=$j+1;  ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
               </div>
            </ul>
         </div>
      </div>
      <div id="ten" <?php if(isset($tab_active) && ($tab_active==10)): ?>  class="tab-pane active" <?php else: ?> class="tab-pane" <?php endif; ?>>
         <div class="row-fluid">
            <ul class="text_tab">
               <div class="row">
                  <div class="col-lg-11 panel_marg">
                     <div class="btn btn-large btn-primary pull-right me_btn cart-res" style="margin-bottom: 5px;"><?php if(Lang::has(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOTAL_WALLET_BALANCE_AMOUNT')); ?> <?php endif; ?> : <?php echo e(Helper::cur_sym()); ?><?php echo e((($customer_info->wallet!="")?number_format($customer_info->wallet,2):'0.00')); ?></div>
                     <div class="table-responsive">
                        <table class="table table-bordered table-sieve ccc"  style="margin-left:3%;width:97%; font-size:13px">
                           <thead style="background:#4a994c; color:#fff;">
                              <tr>
                                 <th class="text-center"><?php if(Lang::has(Session::get('lang_file').'.S.NO')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.S.NO')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.S.NO')); ?> <?php endif; ?></th>
                                 <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDERID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDERID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDERID')); ?> <?php endif; ?></th>
                                 <?php /* <!--<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.TOT._PRODUCT')!= '') { echo  trans(Session::get('lang_file').'.TOT._PRODUCT');}  else { echo trans($OUR_LANGUAGE.'.TOT._PRODUCT');} ?></th>
                                 th style="text-align:center;">Product Names</th>
                                 <th style="text-align:center;">Shipping Address </th>
                                 --> */ ?>
                                 <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOTAL_ORDER_AMOUNT')); ?> <?php endif; ?> </th>
                                 <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_DATE')); ?> <?php endif; ?></th>
                                 <th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.USED_WALLET')!= '') { echo  trans(Session::get('lang_file').'.USED_WALLET');}  else { echo trans($OUR_LANGUAGE.'.USED_WALLET');} ?></th>
                                 <!--<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.STATUS')!= '') { echo  trans(Session::get('lang_file').'.STATUS');}  else { echo trans($OUR_LANGUAGE.'.STATUS');} ?></th>-->
                                 <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ACTION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ACTION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ACTION')); ?> <?php endif; ?></th>
                                 <!--th class="text-center">SNO</th>
                                    <th style="text-align:center;">Product Names</th>
                                    <th style="text-align:center;">Shipping Address</th>
                                    <th style="text-align:center;">Order Date</th>
                                    <th style="text-align:center;">Status</th-->
                              </tr>
                           </thead>
                           <tbody>
                              <?php if(count($getproductorderpayumoney_orderwise)<1): ?> 
                              <tr>
                                 <td colspan="6" class="text-center"><?php if(Lang::has(Session::get('lang_file').'.NO_ORDER_PAYUMONEY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_ORDER_PAYUMONEY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_ORDER_PAYUMONEY')); ?> <?php endif; ?></td>
                              </tr>
                              <?php endif; ?>
                              <?php $j=1;
                                 // foreach($getproductordersdetails as $orderdet) {
                                    ?>
                              <?php $__currentLoopData = $getproductorderpayumoney_orderwise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                              <?php
                                 $walletusedamt_final1=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $orderdet->transaction_id)->get();
                                 
                                 $item_amt = $orderdet->order_amt + (($orderdet->order_amt * $orderdet->order_tax)/100);
                                       
                                 
                                        $ship_amt = $orderdet->order_shipping_amt;
                                       
                                        //$item_tax = $codorderdet->cod_tax;
                                       
                                         $grand_total =  ($item_amt + $ship_amt + $item_tax);
                                 
                                 ?>
                              <tr>
                                 <td class="text-center"><?php echo $j;?></td>
                                 <td class="text-center"><?php echo $orderdet->transaction_id;?></td>
                                
                                 <td class="text-center"><?php echo e(Helper::cur_sym()); ?>

                                    <?php
                                       $customerid   = Session::get('customerid');
                                         $product_titles=DB::table('nm_order_payu')
                                         ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
                                         ->leftjoin('nm_color', 'nm_order_payu.order_pro_color', '=', 'nm_color.co_id')
                                         ->leftjoin('nm_size', 'nm_order_payu.order_pro_size', '=', 'nm_size.si_id')
                                         ->where('transaction_id', '=', $orderdet->transaction_id)
                                         ->where('nm_order_payu.order_cus_id', '=', $customerid)
                                         ->where('nm_order_payu.order_type','=',1)
                                         ->get(); 
                                         $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0;
                                         $wallet_amt =    $wallet     = 0; 
                                       
                                         
                                          ?>
                                    <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php 
                                       $subtotal=$prd_tit->order_amt; 
                                                   $tax_amt = (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                                
                                                   $total_tax_amt+= (($prd_tit->order_amt * $prd_tit->order_tax)/100); 
                                                   $total_ship_amt+= $prd_tit->order_shipping_amt;
                                                   $total_item_amt+=$prd_tit->order_amt;
                                                   $coupon_amount+= $prd_tit->coupon_amount;
                                                   $prodct_id = $prd_tit->order_pro_id;
                                                   
                                             $item_amt = $prd_tit->order_amt + (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                                
                                             
                                                 $ship_amt = $prd_tit->order_shipping_amt;
                                                
                                             
                                       
                                                $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                                
                                                $wallet_amt +=  $prd_tit->wallet_amount;                                                                                       $wallet     += $prd_tit->wallet_amount; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($grand_total-$wallet_amt); ?> </b>
                                 </td>
                                 <td class="text-center"><?php echo e($orderdet->order_date); ?></td>
                                 <td class="text-center"><?php echo e(Helper::cur_sym()); ?><?php 
                                    // print_r($walletusedamt_final);
                                     echo ((count($walletusedamt_final1)>0)?" ".number_format($walletusedamt_final1[0]->wallet_used,2):'0');
                                     
                                     ?></td>
                                 <td class="text-center">
                                    <a class="btn btn-success " data-target="<?php echo '#uiModalpp10'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.VIEW_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.VIEW_DETAILS')); ?> <?php endif; ?></a>
                                    <?php /* cancel ,REturn asn replacement starts */?>
                                    <?php       
                                       //cancel ,return and replacement process starts
                                                $paypal_cancel_valid = 0;
                                                $paypal_return_replace_valid = 0;
                                                $cod_cancel_valid = 0;
                                                $cod_return_replace_valid= 0;
                                       
                                                /* cancel starts */
                                              
                                                $cancel_valid =  DB::table('nm_order_payu')
                                       ->join('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')            
                                       ->orderBy('nm_order_payu.order_id', 'desc')
                                       ->where('nm_order_payu.order_type', '=', 1)
                                       ->where('nm_order_payu.transaction_id', '=', $orderdet->transaction_id)
                                       ->where('delivery_status','=',1)->get();
                                                $paypal_cancel_valid =  count($cancel_valid);
                                                $return_replace =  DB::table('nm_order_payu')
                                       ->join('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
                                       ->orderBy('nm_order_payu.order_id', 'desc')
                                       ->where('nm_order_payu.order_type', '=', 1)
                                       ->where('nm_order_payu.transaction_id', '=',$orderdet->transaction_id)
                                       ->where('delivery_status','=',4)->get();
                                                $paypal_return_replace_valid =  count($return_replace);
                                      
                                                //cancel ,return and replacement process ends
                                                ?>
                                    <?php if($paypal_cancel_valid>0): ?>
                                    <?php 
                                       $cancel_allow = 0;
                                       $cancel_allowed_itm  = array();
                                       //check Cancel date
                                       ?>
                                    <?php $__currentLoopData = $cancel_valid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancelItm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <?php 
                                       $order_date = $cancelItm->order_date;
                                       $now = time(); //current date
                                       $format_date = strtotime($order_date);                   
                                       $datediff = abs($now - $format_date);
                                       
                                       $numberDays = $datediff/86400;  // 86400 seconds in one day
                                       
                                       // and you might want to convert to integer
                                       $Ord_datecount = intval($numberDays); ?>
                                    <?php if($cancelItm->allow_cancel==1): ?>
                                    <?php if($Ord_datecount<$cancelItm->cancel_days): ?>
                                    <?php 
                                       $delStatusInfo = DB::table('nm_order_delivery_status')->where('order_id','=',$cancelItm->order_id)->get(); 
                                       //print_r($delStatusInfo); 
                                       ?>
                                    <?php if(count($delStatusInfo)==0): ?>
                                    <?php
                                       $cancel_allowed_itm[]  = array('prod_id' => $cancelItm->order_id,'prod_title' => $cancelItm->$pro_title );
                                       $cancel_allow++;
                                       ?>                
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cancel_allow>0): ?>
                                    <a class="btn btn-warning" data-target="<?php echo '#cancelModalpp'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.CANCELLATION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCELLATION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCELLATION')); ?> <?php endif; ?></a>
                                    <!-- Modal -->
                                    <div id="<?php echo 'cancelModalpp'.$j;?>" class="modal fade" role="dialog">
                                       <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.CANCELLATION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCELLATION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCELLATION')); ?>      <?php endif; ?></h4>
                                             </div>
                                             <div class="modal-body">
                                                <?php echo Form::open(array('url'=>'product_payu_cancel_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                                <?php if($paypal_cancel_valid>0): ?>
                                                <input type="hidden" name="customer_mail" value="<?php echo e($orderdet->ship_email); ?>">
                                                <input type="hidden" name="order_payment_type" value="1"><input type="hidden" name="order_type" value="1"><input type="hidden" name="mer_id" value="<?php echo e($orderdet->order_merchant_id); ?>">
                                                <div class="form-group">
                                                   <label for="cancel_item_id">
                                                   <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_CANCEL')); ?>   <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_CANCEL')); ?> <?php endif; ?>
                                                   </label> 
                                                   <select id = "cancel_item_id" name="cancel_item_id">
                                                      <?php if(count($cancel_allowed_itm)>0): ?>
                                                      <?php $__currentLoopData = $cancel_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      <?php else: ?>
                                                      <option value=""> No Item</option>
                                                      <?php endif; ?>   
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                   <label for="cancel_notes">
                                                   <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_CANCEL')); ?> <?php endif; ?>
                                                   </label>
                                                   <textarea id="<?php echo '#cancel_notes'.$j;?>" class="cancel_notes_<?php echo $j; ?>" name="cancel_notes" maxlength="300"  placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_CANCEL')); ?> <?php endif; ?>"></textarea>
                                                </div>
                                                <?php endif; ?>
                                             </div>
                                             <div class="modal-footer">
                                                <button  type="submit" onclick="return cancel_validate('<?php echo $j; ?>');" class="btn btn-danger conform_cancel"  id="<?php echo '#conform_cancel'.$j;?>" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_CANCEL')); ?>    <?php endif; ?></button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                             </div>
                                             <?php echo Form::close(); ?>

                                          </div>
                                       </div>
                                    </div>
                                    <?php endif; ?>   
                                    <?php endif; ?>
                                    <?php /* cancel end */ ?>
                                    <?php if($paypal_return_replace_valid>0): ?>
                                    <?php 
                                       $return_allow = $replace_allow = 0;
                                       $return_allowed_itm  = array();
                                       $replace_allowed_itm  = array();
                                       //check Cancel date 
                                       ?>
                                    <?php $__currentLoopData = $return_replace; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php
                                       $order_date = $Itm->order_date;
                                       $now = time(); //current date
                                       $format_date = strtotime($order_date);                   
                                       $datediff = abs($now - $format_date);
                                       
                                       $numberDays = $datediff/86400;  // 86400 seconds in one day
                                       
                                       // and you might want to convert to integer
                                       $Ord_datecount = intval($numberDays);
                                       ?>
                                    <?php if($Itm->allow_return==1): ?>
                                    <?php if($Ord_datecount<$Itm->return_days): ?>
                                    <?php 
                                       $delStatusInfo = DB::table('nm_order_delivery_status')->where('order_id','=',$Itm->order_id)->get(); 
                                       //print_r($delStatusInfo);
                                       ?>
                                    <?php if(count($delStatusInfo)==0): ?>
                                    <?php
                                       $return_allowed_itm[]  = array('prod_id' => $Itm->order_id,'prod_title' => $Itm->$pro_title );
                                       $return_allow++; ?> 
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?> 
                                    <?php if($Itm->allow_replace==1): ?>
                                    <?php if($Ord_datecount<$Itm->replace_days): ?>
                                    <?php 
                                       $delStatusInfo = DB::table('nm_order_delivery_status')->where('order_id','=',$Itm->order_id)->get(); 
                                       //print_r($delStatusInfo);
                                       ?>
                                    <?php if(count($delStatusInfo)==0): ?>
                                    <?php 
                                       $replace_allowed_itm[]  = array('prod_id' => $Itm->order_id,'prod_title' => $Itm->$pro_title );
                                       $replace_allow++; ?> 
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($return_allow>0): ?>
                                    <a class="btn btn-blue btn-danger"  data-target="<?php echo '#returnModalpp'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RETURN')); ?> <?php endif; ?></a>
                                    <!-- REturn Modal -->
                                    <div id="<?php echo 'returnModalpp'.$j;?>" class="modal fade" role="dialog">
                                       <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.ORDER_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_RETURN')); ?>      <?php endif; ?></h4>
                                             </div>
                                             <div class="modal-body">
                                                <?php echo Form::open(array('url'=>'product_payu_return_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                                <?php if($return_allow>0): ?>
                                                <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                                <input type="hidden" name="order_payment_type" value="1"><input type="hidden" name="order_type" value="1">
                                                <div class="form-group">
                                                   <label for="return_item_id">
                                                   <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_RETURN')); ?>   <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_RETURN')); ?>   <?php endif; ?>
                                                   </label> 
                                                   <select id = "return_item_id" name="return_item_id">
                                                      <?php if(count($return_allowed_itm)>0): ?>
                                                      <?php $__currentLoopData = $return_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      <?php else: ?>
                                                      <option value=""> No Item</option>
                                                      <?php endif; ?>   
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                   <label for="return_notes">
                                                   <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_RETURN')); ?> <?php endif; ?> 
                                                   </label>
                                                   <textarea id="return_notes" class="return_notes_<?php echo $j; ?>" maxlength="300" name="return_notes" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_RETURN')); ?> <?php endif; ?>"></textarea>
                                                </div>
                                                <?php endif; ?>
                                             </div>
                                             <div class="modal-footer">
                                                <button onclick="return return_validate('<?php echo $j; ?>');" type="submit" class="btn btn-danger return_conform" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_RETURN')); ?> <?php endif; ?></button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                             </div>
                                             <?php echo Form::close(); ?>

                                          </div>
                                       </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($replace_allow>0): ?>
                                    <a class="btn btn-info"  data-target="<?php echo '#replaceModal_pp'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REPLACE')); ?> <?php endif; ?></a>
                                   
                                    <!-- REturn Modal -->
                                    <div id="<?php echo 'replaceModal_pp'.$j;?>" class="modal fade" role="dialog">
                                       <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.ORDER_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_REPLACE')); ?> <?php endif; ?></h4>
                                             </div>
                                             <div class="modal-body">
                                                <?php echo Form::open(array('url'=>'product_payu_replace_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                                <?php if($return_allow>0): ?>
                                                <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                                <input type="hidden" name="order_payment_type" value="1"><input type="hidden" name="order_type" value="1">
                                                <div class="form-group">
                                                   <label for="replace_item_id">
                                                   <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_REPLACE')); ?> <?php endif; ?>
                                                   </label> 
                                                   <select id = "replace_item_id" name="replace_item_id">
                                                      <?php if(count($replace_allowed_itm)>0): ?>
                                                      <?php $__currentLoopData = $replace_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      <?php else: ?>
                                                      <option value=""> No Item</option>
                                                      <?php endif; ?>   
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                   <label for="replace_notes">
                                                   <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_REPLACE')); ?> <?php endif; ?>
                                                   </label>
                                                   <textarea id="replace_notes"  class="replace_notes_<?php echo $j; ?>" name="replace_notes" maxlength="300" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_REPLACE')); ?> <?php endif; ?>"></textarea>
                                                </div>
                                                <?php endif; ?>
                                             </div>
                                             <div class="modal-footer">
                                                <button  onclick="return replace_validate('<?php echo $j; ?>');" type="submit" class="btn btn-danger replace_conform" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_REPLACE')); ?> <?php endif; ?></button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                             </div>
                                             <?php echo Form::close(); ?>

                                          </div>
                                       </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php /* cancel ,REturn asn replacement ends */?>
                                 </td>
                              </tr>
                              <?php $j=$j+1;  ?>   
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <?php  $j=1; $all_tax_amt=0; $all_shipping_amt=0; ?>
                  <?php $__currentLoopData = $getproductorderpayumoney_orderwise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coddetails1_paypal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                     $item_total=0;  $coupon_amount=0;
                     $subtotal =0;
                     $wallet_amt=0;$wallet =0;
                     
                     $tax_amt = (($coddetails1_paypal->order_amt * $coddetails1_paypal->order_tax)/100);
                     $all_tax_amt+=  (($coddetails1_paypal->order_amt * $coddetails1_paypal->order_tax)/100);
                     
                     $shipping_amt = $coddetails1_paypal->order_shipping_amt;
                     $all_shipping_amt+= $coddetails1_paypal->order_shipping_amt; ?>
                  <?php if($coddetails1_paypal->coupon_amount !=0): ?>
                  <?php  $coupon_value = $coddetails1_paypal->coupon_amount; ?>
                  <?php else: ?>
                  <?php 
                  $coupon_value = 0;  ?>
                  <?php endif; ?>
                  <?php  /*$wallet = DB::table('nm_ordercod_wallet')->where('cod_transaction_id','=',$coddetails1_paypal->transaction_id)->get();
                     if(count($wallet)!=0){
                         $wallet_amt = $wallet[0]->wallet_used;
                     }else{
                         $wallet_amt = 0;
                     }*/  ?>
                  <?php
                     $item_total = $coddetails1_paypal->order_amt;
                     
                     $grand_total = (($item_total+$tax_amt+$shipping_amt)-$wallet_amt)-$coupon_value;
                     ?>   
                  <div  id="<?php echo 'uiModalpp10'.$j?>" class="modal fade in invoice-front" style="display:none;">
                     <div class="modal-dialog efg">
                        <div class="modal-content">
                           <div class="modal-header" style="border-bottom:none;">
                              <div class="col-lg-2 pull-right"><a href="" class="btn btn-danger" data-dismiss="modal" ><i class="icon-remove-sign icon-2x"></i></a></div>
                              <div class="col-lg-4">
                                 <?php 
                                    //$logo = url().'/public/assets/default_image/Logo.png';
                                    //if(file_exists($SITE_LOGO))
                                      $logo = $SITE_LOGO;
                                    ?> 
                                 <img src="<?php echo e($logo); ?>" alt="" style="width:100px;height:30px;">
                              </div>
                              <div class="col-lg-6" style="width:100% !important; text-align:center;"><strong><?php if(Lang::has(Session::get('lang_file').'.TAX_INVOICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TAX_INVOICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TAX_INVOICE')); ?> <?php endif; ?> </strong></div>
                           </div>
                           <hr style="margin-top: 0px;">
                           <div class="" style=" clear: both;">
                              <div class="col-lg-12">
                                 <div class="Front-inv-address-left" style="text-align:left;">
                                    <h4><?php if(Lang::has(Session::get('lang_file').'.PAYUMONEY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PAYUMONEY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PAYUMONEY')); ?> <?php endif; ?></h4>
                                    <b><?php if(Lang::has(Session::get('lang_file').'.AMOUNT_PAID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AMOUNT_PAID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AMOUNT_PAID')); ?> <?php endif; ?> :<?php echo e(Helper::cur_sym()); ?> 
                                    <?php
                                       $customerid   = Session::get('customerid');
                                         $product_titles=DB::table('nm_order_payu')
                                         ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
                                         ->leftjoin('nm_color', 'nm_order_payu.order_pro_color', '=', 'nm_color.co_id')
                                         ->leftjoin('nm_size', 'nm_order_payu.order_pro_size', '=', 'nm_size.si_id')
                                         ->where('transaction_id', '=', $coddetails1_paypal->transaction_id)
                                         ->where('nm_order_payu.order_cus_id', '=', $customerid)
                                         ->where('nm_order_payu.order_type','=',1)
                                         ->get(); 
                                         $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0; ?>
                                    <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php
                                       $subtotal=$prd_tit->order_amt; 
                                                   $tax_amt = (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                                
                                                   $total_tax_amt+= (($prd_tit->order_amt * $prd_tit->order_tax)/100); 
                                                   $total_ship_amt+= $prd_tit->order_shipping_amt;
                                                   $total_item_amt+=$prd_tit->order_amt;
                                                   $coupon_amount+= $prd_tit->coupon_amount;
                                                   $prodct_id = $prd_tit->order_pro_id;
                                                   
                                             $item_amt = $prd_tit->order_amt + (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                                
                                             
                                                 $ship_amt = $prd_tit->order_shipping_amt;
                                                
                                             
                                                 //$item_tax = $codorderdet->cod_tax;
                                                /*if($prd_tit->coupon_amount != 0)
                                                {
                                                   $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                                }
                                                else
                                                {
                                                   $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt);
                                                }*/   
                                                $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount); 
                                       
                                                $wallet_amt +=  $prd_tit->wallet_amount;                                                                               $wallet     += $prd_tit->wallet_amount; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($grand_total-$wallet_amt); ?></b>
                                    <br>
                                    <span>((<?php if(Lang::has(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.INCLUSIVE_OF_ALL_CHARGES')); ?> <?php endif; ?>) )</span>
                                    <br>
                                    <span>
                                    <span><?php if(Lang::has(Session::get('lang_file').'.ORDERID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDERID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDERID')); ?> <?php endif; ?>: <?php echo e($coddetails1_paypal->transaction_id); ?></span><br>
                                    <span><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_DATE')); ?> <?php endif; ?>: <?php echo e($coddetails1_paypal->order_date); ?></span> </br>
<!-- PAYUMONEY -->
                                    <span> <?php echo e($coddetails1_paypal->tax_type); ?>:  <?php echo e($coddetails1_paypal->tax_id_number); ?></span>
                                 </div>
                                 <div class="Front-inv-address-right" style="border-left:1px solid #eeeeee;text-align:left;">
                                    <h4><?php if(Lang::has(Session::get('lang_file').'.SHIPPING_ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPPING_ADDRESS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPPING_ADDRESS')); ?> <?php endif; ?></h4>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.NAME')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NAME')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NAME')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_name); ?><br/>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.PHONE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PHONE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PHONE')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_phone); ?><br/>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.EMAIL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EMAIL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EMAIL')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_email); ?> </br>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS1')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS1')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS1')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_address1); ?> </br>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS2')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS2')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS2')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_address2); ?> </br>
                                    <?php if($coddetails1_paypal->ship_ci_id): ?>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.CITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CITY')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_ci_id); ?> </br>
                                    <?php endif; ?>
                                    <?php if($coddetails1_paypal->ship_state): ?>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.STATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.STATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.STATE')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_state); ?></br>
                                    <?php endif; ?>
                                    <?php if($coddetails1_paypal->ship_country): ?>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.COUNTRY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUNTRY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUNTRY')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_country); ?> </br>
                                    <?php endif; ?>
                                    <strong><?php if(Lang::has(Session::get('lang_file').'.ZIPCODE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ZIPCODE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ZIPCODE')); ?> <?php endif; ?>: </strong><?php echo e($coddetails1_paypal->ship_postalcode); ?> </br>
                                 </div>
                              </div>
                           </div>
                           <hr style="clear: both;">
                           <div class="" style="padding: 15px;">
                              <div class="span12" style="text-align:center;">
                                 <h4 class="text-center" ><?php if(Lang::has(Session::get('lang_file').'.INVOICE_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.INVOICE_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.INVOICE_DETAILS')); ?> <?php endif; ?></h4>
                                 <span style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')); ?> <?php endif; ?> </span>
                              </div>
                           </div>
                           <div style="clear: both;"></div>
                           <hr>
                           <h4 class="text-center"  style="text-align:center;padding-top: 20px; margin-bottom: 0px;"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_DETAILS')); ?> <?php endif; ?></h4>
                           <div class="table-responsive">
                              <table style=" margin-left:25px; ">
                                 <tr style="border-bottom:1px solid #666;">
                                    <td width="26%"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_TITLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_TITLE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_TITLE')); ?> <?php endif; ?></td>
                                    <!--td  width="13%" align="center">Color</td>&nbsp;
                                       <td  width="13%" align="center">Size</td-->
                                    <td  width="13%" align="center"><?php if(Lang::has(Session::get('lang_file').'.QUANTITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.QUANTITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.QUANTITY')); ?> <?php endif; ?></td>
                                    <td  width="13%" align="center"><?php if(Lang::has(Session::get('lang_file').'.PRICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRICE')); ?> <?php endif; ?></td>
                                    <td  width="13%" align="center"><?php if(Lang::has(Session::get('lang_file').'.SUB_TOTAL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SUB_TOTAL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SUB_TOTAL')); ?> <?php endif; ?></td>
                                    <td  width="13%" align="center"><?php if(Lang::has(Session::get('lang_file').'.COUPON_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUPON_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUPON_AMOUNT')); ?> <?php endif; ?></td>
                                    <td  width="13%" align="center"><?php if(Lang::has(Session::get('lang_file').'.PAYMENT_STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PAYMENT_STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PAYMENT_STATUS')); ?> <?php endif; ?></td>
                                    <br>
                                    <td  width="13%" align="center"><?php if(Lang::has(Session::get('lang_file').'.DELIVERY_STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DELIVERY_STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DELIVERY_STATUS')); ?> <?php endif; ?></td>
                                 </tr>
                                 <?php
                                    $customerid   = Session::get('customerid');
                                    $product_titles=DB::table('nm_order_payu')
                                    ->leftjoin('nm_product', 'nm_order_payu.order_pro_id', '=', 'nm_product.pro_id')
                                    ->leftjoin('nm_color', 'nm_order_payu.order_pro_color', '=', 'nm_color.co_id')
                                    ->leftjoin('nm_size', 'nm_order_payu.order_pro_size', '=', 'nm_size.si_id')
                                    ->where('transaction_id', '=', $coddetails1_paypal->transaction_id)
                                    ->where('nm_order_payu.order_cus_id', '=', $customerid)
                                    ->where('nm_order_payu.order_type','=',1)
                                    ->get(); 
                                    $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0; ?>
                                 <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php     $status=$prd_tit->delivery_status; ?>
                                 <?php if($prd_tit->delivery_status==1): ?>
                                 <?php
                                 $orderstatus="Order Placed";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==2): ?> 
                                 <?php
                                 $orderstatus="Order Packed";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==3): ?> 
                                 <?php
                                 $orderstatus="Dispatched";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==4): ?> 
                                 <?php
                                 $orderstatus="Delivered";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==5): ?>
                                 <?php
                                 $orderstatus="cancel pending";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==6): ?> 
                                 <?php
                                 $orderstatus="cancelled";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==7): ?> 
                                 <?php
                                 $orderstatus="return pending";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==8): ?> 
                                 <?php
                                 $orderstatus="Returned";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==9): ?> 
                                 <?php
                                 $orderstatus="Replace Pending";
                                 ?>
                                 <?php elseif($prd_tit->delivery_status==10): ?> 
                                 <?php
                                 $orderstatus="Replaced";
                                 ?>
                                 <?php else: ?>
                                 <?php
                                 $orderstatus = '';
                                 ?>
                                 <?php endif; ?> 
                                 <?php if($prd_tit->order_status==1): ?>
                                 <?php
                                 $payment_status="Success";
                                 ?>
                                 <?php elseif($prd_tit->order_status==2): ?> 
                                 <?php
                                 $payment_status="Order Packed";
                                 ?>
                                 <?php elseif($prd_tit->order_status==3): ?> 
                                 <?php
                                 $payment_status="Hold";
                                 ?>
                                 <?php elseif($prd_tit->order_status==4): ?> 
                                 <?php
                                 $payment_status="Faild";
                                 ?>
                                 <?php endif; ?>
                                 <?php
                                    $subtotal=$prd_tit->order_amt; 
                                                $tax_amt = (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                             
                                                $total_tax_amt+= (($prd_tit->order_amt * $prd_tit->order_tax)/100); 
                                                $total_ship_amt+= $prd_tit->order_shipping_amt;
                                                $total_item_amt+=$prd_tit->order_amt;
                                                $coupon_amount+= $prd_tit->coupon_amount;
                                                $prodct_id = $prd_tit->order_pro_id;
                                                
                                          $item_amt = $prd_tit->order_amt + (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                             
                                          
                                              $ship_amt = $prd_tit->order_shipping_amt;
                                          
                                             $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);    
                                    ?>
                                 <tr>
                                    <td  width="26%" align="center"><?php 
                                       if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                                          $pro_title = 'pro_title';
                                       }else {  $pro_title = 'pro_title_'.Session::get('lang_code'); }
                                             echo $prd_tit->$pro_title."<br/>";?>
                                       <?php if($prd_tit->si_name!="") echo "Size:".$prd_tit->si_name.", ";
                                          if($prd_tit->co_name!="") echo "Color:".$prd_tit->co_name."<br/>";?>
                                    </td>
                                    &nbsp;                            
                                    <!--td  width="13%" align="center"><?php //echo $coddetails1->co_name;?></td>&nbsp;
                                       <td  width="13%" align="center"><?php //echo $coddetails1->si_name;?></td-->
                                    <td  width="13%" align="center"><?php echo e($prd_tit->order_qty); ?> </td>
                                    <td  width="13%" align="center"><?php echo e(Helper::cur_sym()); ?> <?php echo e($prd_tit->pro_disprice); ?> </td>
                                    <td  width="13%" align="center"><?php echo e($subtotal - $prd_tit->coupon_amount); ?> </td>
                                    <?php if($prd_tit->coupon_amount != 0): ?> 
                                    <td  width="13%" align="center"><?php echo e(Helper::cur_sym()); ?> <?php echo e($prd_tit->coupon_amount); ?> </td>
                                    <?php else: ?>  
                                    <td  width="13%" align="center"><?php echo e(Helper::cur_sym()); ?> <?php echo e($prd_tit->coupon_amount); ?> </td>
                                    <?php endif; ?>
                                    <td  width="13%" align="center"><?php echo e($payment_status); ?></td>
                                    <td  width="13%" align="center"><?php echo e($orderstatus); ?></td>
                                 </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </table>
                           </div>
                           <br>
                           <hr>
                           <div class="" style="padding: 15px;">
                              <div class="col-lg-6"></div>
                              <div class="col-lg-6">
                                 <span><?php if(Lang::has(Session::get('lang_file').'.SHIPMENT_VALUE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPMENT_VALUE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPMENT_VALUE')); ?> <?php endif; ?><b class="pull-right" style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($total_ship_amt); ?> </b></span><br>
                                 <span><?php if(Lang::has(Session::get('lang_file').'.TAX')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TAX')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TAX')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($total_tax_amt); ?></b></span><br>
                                 <?php 
                                    $subtotal1 = 0;?>
                                 <?php if(count($wallet)!=0): ?> 
                                 <span>
                                    wallet :
                                    <p class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> -<?php echo e($wallet_amt); ?></p>
                                 </span>
                                 <br>
                                 <?php endif; ?>
                                 <hr>
                                 <?php $totamt_paypal=$subtotal1+$coddetails1_paypal->order_tax;?>
                                 <span><?php if(Lang::has(Session::get('lang_file').'.AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AMOUNT')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($grand_total-$wallet_amt); ?></b></span>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-danger" type="button"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php $j=$j+1;  ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
               </div>
            </ul>
         </div>
      </div>
      <div id="seven" <?php if(isset($tab_active) && ($tab_active==7)): ?>  class="tab-pane active" <?php else: ?> class="tab-pane" <?php endif; ?>>
      <div class="row-fluid">
         <ul class="text_tab">
            <div class="row">
               <div class="col-lg-11 panel_marg">
                  <div class="btn btn-large btn-primary pull-right me_btn cart-res" style="margin-bottom: 5px;"><?php if(Lang::has(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOTAL_WALLET_BALANCE_AMOUNT')); ?> <?php endif; ?>  : <?php echo e(Helper::cur_sym()); ?><?php echo e((($customer_info->wallet!="")?number_format($customer_info->wallet,2):'0.00')); ?></div>
                  <div class="table-responsive">
                     <table class="table table-bordered table-sieve ddd"  style="margin-left:3%;width:97%; font-size:13px">
                        <thead style="background:#4a994c; color:#fff;">
                           <tr>
                              <th class="text-center"><?php if(Lang::has(Session::get('lang_file').'.S.NO')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.S.NO')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.S.NO')); ?> <?php endif; ?></th>
                              <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDERID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDERID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDERID')); ?> <?php endif; ?></th>
                              <!--<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.TOT._PRODUCT')!= '') { echo  trans(Session::get('lang_file').'.TOT._PRODUCT');}  else { echo trans($OUR_LANGUAGE.'.TOT._PRODUCT');} ?></th>
                                 th style="text-align:center;">Product Names</th>
                                 <th style="text-align:center;">Shipping Address </th>-->
                              <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOTAL_ORDER_AMOUNT')); ?> <?php endif; ?> </th>
                              <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?>  <?php else: ?> { echo trans($OUR_LANGUAGE.'.ORDER_DATE')}} <?php endif; ?></th>
                              <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.USED_WALLET')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.USED_WALLET')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.USED_WALLET')); ?> <?php endif; ?></th>
                              <!--<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.STATUS')!= '') { echo  trans(Session::get('lang_file').'.STATUS');}  else { echo trans($OUR_LANGUAGE.'.STATUS');} ?></th>-->
                              <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ACTION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ACTION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ACTION')); ?> <?php endif; ?></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if(count($get_deal_PayPal)<1): ?> 
                           <tr>
                              <td colspan="6" class="text-center"><?php if(Lang::has(Session::get('lang_file').'.NO_ORDER_DEAL_PAYPAL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_ORDER_DEAL_PAYPAL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_ORDER_DEAL_PAYPAL')); ?> <?php endif; ?></td>
                           </tr>
                           <?php endif; ?>
                           <?php $j=1; ?>
                           <?php $__currentLoopData = $get_deal_PayPal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                           <?php
                              $walletusedamt_final1=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $orderdet->transaction_id)->get();
                              
                              $item_amt = $orderdet->order_amt + (($orderdet->order_amt * $orderdet->order_tax)/100);
                              		
                              
                              		 $ship_amt = $orderdet->order_shipping_amt;
                              		
                              		
                              		  $grand_total =  ($item_amt + $ship_amt + $item_tax);
                              
                              ?>
                           <tr>
                              <td class="text-center"><?php echo e($j); ?></td>
                              <td class="text-center"><?php echo e($orderdet->transaction_id); ?></td>
                              <td class="text-center"><?php echo e(Helper::cur_sym()); ?>

                                 <?php
                                    $customerid   = Session::get('customerid');
                                      $product_titles=DB::table('nm_order')
                                      ->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
                                      ->leftjoin('nm_color', 'nm_order.order_pro_color', '=', 'nm_color.co_id')
                                      ->leftjoin('nm_size', 'nm_order.order_pro_size', '=', 'nm_size.si_id')
                                      ->where('transaction_id', '=', $orderdet->transaction_id)
                                      ->where('nm_order.order_cus_id', '=', $customerid)
                                      ->where('nm_order.order_type','=',2)
                                      ->get();
                                      $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0;
                                      $wallet_amt =  $wallet     = 0;
                                    
                                      /*$wallet = DB::table('nm_ordercod_wallet')->where('cod_transaction_id','=',$orderdet->transaction_id)->get();
                                    
                                    if(count($wallet)!=0){
                                    		$wallet_amt = $wallet[0]->wallet_used;
                                    		}else{
                                    		$wallet_amt = 0;
                                    	}*/
                                    	?>
                                 <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php
                                    $subtotal=$prd_tit->order_amt; 
                                    				$tax_amt = (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                    			
                                    				$total_tax_amt+= (($prd_tit->order_amt * $prd_tit->order_tax)/100); 
                                    				$total_ship_amt+= $prd_tit->order_shipping_amt;
                                    				$total_item_amt+=$prd_tit->order_amt;
                                    				$coupon_amount+= $prd_tit->coupon_amount;
                                    				$prodct_id = $prd_tit->order_pro_id;
                                    				
                                    		$item_amt = $prd_tit->order_amt + (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                    			
                                    		
                                    			 $ship_amt = $prd_tit->order_shipping_amt;
                                    			
                                    		
                                    			 //$item_tax = $codorderdet->cod_tax;
                                    			/*if($prd_tit->coupon_amount != 0)
                                    			{
                                    				$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                    			}
                                    			else
                                    			{
                                    				$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt);
                                    			}*/		
                                    			$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                    			$wallet_amt +=  $prd_tit->wallet_amount;
                                                                                    $wallet     += $prd_tit->wallet_amount; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php echo e($grand_total-$wallet_amt); ?></b>
                              </td>
                              <td class="text-center"><?php echo e($orderdet->order_date); ?></td>
                              <td class="text-center"><?php echo e(Helper::cur_sym()); ?><?php 
                                 // print_r($walletusedamt_final);
                                  echo ((count($walletusedamt_final1)>0)?" ".number_format($walletusedamt_final1[0]->wallet_used,2):'0');
                                  
                                  ?></td>
                              <td class="text-center">
                                 <a class="btn btn-success " data-target="<?php echo '#uiModal7'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.VIEW_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.VIEW_DETAILS')); ?> <?php endif; ?></a>
                                 <?php /* cancel ,REturn asn replacement starts */?>
                                 <?php 		
                                    //cancel ,return and replacement process starts
                                             $paypal_cancel_valid = 0;
                                             $paypal_return_replace_valid = 0;
                                             $cod_cancel_valid = 0;
                                             $cod_return_replace_valid= 0;
                                    
                                             /* cancel starts */
                                           
                                             $cancel_valid =  DB::table('nm_order')
                                    ->join('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')             
                                    ->orderBy('nm_order.order_id', 'desc')
                                    ->where('nm_order.order_type', '=', 2)
                                    ->where('nm_order.transaction_id', '=', $orderdet->transaction_id)
                                    ->where('delivery_status','=',1)->get();
                                             $paypal_cancel_valid =  count($cancel_valid);
                                             $return_replace =  DB::table('nm_order')
                                    ->join('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')  
                                    ->orderBy('nm_order.order_id', 'desc')
                                    ->where('nm_order.order_type', '=', 2)
                                    ->where('nm_order.transaction_id', '=',$orderdet->transaction_id)
                                    ->where('delivery_status','=',4)->get();
                                             $paypal_return_replace_valid =  count($return_replace);
                                    
                                             //cancel ,return and replacement process ends
                                             ?>
                                 <?php if($paypal_cancel_valid>0): ?>
                                 <?php 
                                    $cancel_allow = 0;
                                    $cancel_allowed_itm  = array();
                                    //check Cancel date
                                    ?>
                                 <?php $__currentLoopData = $cancel_valid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancelItm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php
                                    $order_date = $cancelItm->order_date;
                                    $now = time(); //current date
                                    $format_date = strtotime($order_date);							
                                    $datediff = abs($now - $format_date);
                                    
                                    $numberDays = $datediff/86400;  // 86400 seconds in one day
                                    
                                    // and you might want to convert to integer
                                    $Ord_datecount = intval($numberDays);
                                    ?>
                                 <?php if($cancelItm->allow_cancel==1): ?>
                                 <?php if($Ord_datecount<$cancelItm->cancel_days): ?>
                                 <?php
                                    $delStatusInfo = DB::table('nm_order_delivery_status')->where('order_id','=',$cancelItm->order_id)->get(); 
                                    //print_r($delStatusInfo);
                                    ?>
                                 <?php if(count($delStatusInfo)==0): ?>
                                 <?php
                                    $cancel_allowed_itm[]  = array('prod_id' => $cancelItm->order_id,'prod_title' => $cancelItm->$deal_title );
                                    $cancel_allow++; 
                                    ?>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($cancel_allow>0): ?>
                                 <a class="btn btn-warning" data-target="<?php echo '#cancelModal_dp'.$j;?>" data-toggle="modal"><?php if (Lang::has(Session::get('lang_file').'.CANCELLATION')!= '') { echo  trans(Session::get('lang_file').'.CANCELLATION');}  else { echo trans($OUR_LANGUAGE.'.CANCELLATION');} ?></a>
                                 <!-- Modal -->
                                 <div id="<?php echo 'cancelModal_dp'.$j;?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                       <!-- Modal content-->
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.CANCELLATION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCELLATION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCELLATION')); ?> <?php endif; ?></h4>
                                          </div>
                                          <div class="modal-body">
                                             <?php echo Form::open(array('url'=>'deal_cancel_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                             <?php if($paypal_cancel_valid>0): ?>
                                             <input type="hidden" name="customer_mail" value="<?php echo e($orderdet->ship_email); ?>">
                                             <input type="hidden" name="order_payment_type" value="1"><input type="hidden" name="order_type" value="2"><input type="hidden" name="mer_id" value="<?php echo e($orderdet->order_merchant_id); ?>">
                                             <div class="form-group">
                                                <label for="cancel_item_id">
                                                <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_CANCEL')); ?>   <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_CANCEL')); ?> <?php endif; ?>
                                                </label>	
                                                <select id = "cancel_item_id" name="cancel_item_id">
                                                   <?php if(count($cancel_allowed_itm)>0): ?>
                                                   <?php $__currentLoopData = $cancel_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <?php else: ?>
                                                   <option value=""> No Item</option>
                                                   <?php endif; ?>	
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="cancel_notes">
                                                <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_CANCEL')); ?> <?php endif; ?>
                                                </label>
                                                <textarea id="<?php echo '#cancel_notes'.$j;?>" class="cancel_dealnotes_<?php echo $j; ?>" name="cancel_notes" maxlength="300"  placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_CANCEL')); ?> <?php endif; ?>"></textarea>
                                             </div>
                                             <?php endif; ?>
                                          </div>
                                          <div class="modal-footer">
                                             <button  type="submit" onclick="return cancel_dealvalidate('<?php echo $j; ?>');" class="btn btn-danger conform_cancel" id="<?php echo '#conform_cancel'.$j;?>" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_CANCEL')); ?>    <?php endif; ?></button>
                                             <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                          </div>
                                          <?php echo Form::close(); ?>

                                       </div>
                                    </div>
                                 </div>
                                 <?php endif; ?>	
                                 <?php endif; ?>
                                 <?php /* cancel end */ ?>
                                 <?php if($paypal_return_replace_valid>0): ?>
                                 <?php 
                                    $return_allow = $replace_allow = 0;
                                    $return_allowed_itm  = array();
                                    $replace_allowed_itm  = array();
                                    //check Cancel date 
                                    ?>
                                 <?php $__currentLoopData = $return_replace; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php
                                    $order_date = $Itm->order_date; 
                                           		$now = time(); //current date
                                    $format_date = strtotime($order_date);							
                                    $datediff = abs($now - $format_date);
                                    
                                    $numberDays = $datediff/86400;  // 86400 seconds in one day
                                    
                                    // and you might want to convert to integer
                                    $Ord_datecount = intval($numberDays);
                                    ?>
                                 <?php if($Itm->allow_return==1): ?> 
                                 <?php if($Ord_datecount<$Itm->return_days): ?>  
                                 <?php
                                    $delStatusInfo = DB::table('nm_order_delivery_status')->where('order_id','=',$Itm->order_id)->get();  
                                    //print_r($delStatusInfo); 
                                    ?>
                                 <?php if(count($delStatusInfo)==0): ?>
                                 <?php
                                    $return_allowed_itm[]  = array('prod_id' => $Itm->order_id,'prod_title' => $Itm->$deal_title );
                                    $return_allow++; 
                                    ?>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endif; ?>	
                                 <?php if($Itm->allow_replace==1): ?>
                                 <?php if($Ord_datecount<$Itm->replace_days): ?>
                                 <?php
                                    $delStatusInfo = DB::table('nm_order_delivery_status')->where('order_id','=',$Itm->order_id)->get(); 
                                    //print_r($delStatusInfo);
                                    
                                    ?>
                                 <?php if(count($delStatusInfo)==0): ?>
                                 <?php
                                    $replace_allowed_itm[]  = array('prod_id' => $Itm->order_id,'prod_title' => $Itm->$deal_title );
                                    $replace_allow++;
                                    ?>							
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($return_allow>0): ?>
                                 <a class="btn btn-blue btn-danger"  data-target="<?php echo '#returnModal_dp'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RETURN')); ?> <?php endif; ?></a>
                                 <!-- REturn Modal -->
                                 <div id="<?php echo 'returnModal_dp'.$j;?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                       <!-- Modal content-->
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.ORDER_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_RETURN')); ?>      <?php endif; ?></h4>
                                          </div>
                                          <div class="modal-body">
                                             <?php echo Form::open(array('url'=>'deal_return_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                             <?php if($return_allow>0): ?>
                                             <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                             <input type="hidden" name="order_payment_type" value="1"><input type="hidden" name="order_type" value="2">
                                             <div class="form-group">
                                                <label for="return_item_id">
                                                <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_RETURN')); ?>   <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_RETURN')); ?>   <?php endif; ?>
                                                </label>	
                                                <select id = "return_item_id" name="return_item_id">
                                                   <?php if(count($return_allowed_itm)>0): ?>
                                                   <?php $__currentLoopData = $return_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <?php else: ?>
                                                   <option value=""> No Item</option>
                                                   <?php endif; ?>	
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="return_notes">
                                                <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_RETURN')); ?>       <?php endif; ?>	
                                                </label>
                                                <textarea id="return_notes" class="return_dealnotes_<?php echo $j; ?>" maxlength="300" name="return_notes" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_RETURN')); ?> <?php endif; ?>"></textarea>
                                             </div>
                                             <?php endif; ?>
                                          </div>
                                          <div class="modal-footer">
                                             <button  type="submit" onclick="return return_dealvalidate('<?php echo $j; ?>');" class="btn btn-danger return_conform" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_RETURN')); ?> <?php endif; ?></button>
                                             <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                          </div>
                                          <?php echo Form::close(); ?>

                                       </div>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                                 <?php if($replace_allow>0): ?>
                                 <a class="btn btn-info"  data-target="<?php echo '#replaceModal_dp'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REPLACE')); ?> <?php endif; ?></a>
                                 <!-- REturn Modal -->
                                 <div id="<?php echo 'replaceModal_dp'.$j;?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                       <!-- Modal content-->
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.ORDER_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_REPLACE')); ?> <?php endif; ?></h4>
                                          </div>
                                          <div class="modal-body">
                                             <?php echo Form::open(array('url'=>'deal_replace_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                             <?php if($return_allow>0): ?>
                                             <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                             <input type="hidden" name="order_payment_type" value="1"><input type="hidden" name="order_type" value="2">
                                             <div class="form-group">
                                                <label for="replace_item_id">
                                                <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_REPLACE')); ?> <?php endif; ?>
                                                </label>	
                                                <select id = "replace_item_id" name="replace_item_id">
                                                   <?php if(count($replace_allowed_itm)>0): ?>
                                                   <?php $__currentLoopData = $replace_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <?php else: ?>
                                                   <option value=""> No Item</option>
                                                   <?php endif; ?>	
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="replace_notes">
                                                <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_REPLACE')); ?> <?php endif; ?>
                                                </label>
                                                <textarea id="replace_notes" class="replace_dealnotes_<?php echo $j; ?>" name="replace_notes" maxlength="300" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_REPLACE')); ?> <?php endif; ?>"></textarea>
                                             </div>
                                             <?php endif; ?>
                                          </div>
                                          <div class="modal-footer">
                                             <button onclick="return replace_dealvalidate('<?php echo $j; ?>');" type="submit" class="btn btn-danger replace_conform"  ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_REPLACE')); ?> <?php endif; ?></button>
                                             <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                          </div>
                                          <?php echo Form::close(); ?>

                                       </div>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php /* cancel ,REturn asn replacement ends */?>
                              </td>
                           </tr>
                           <?php $j=$j+1;  ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <?php  $j=1; $all_tax_amt=0; $all_shipping_amt=0; ?>
               <?php $__currentLoopData = $get_deal_PayPal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coddetails1_paypal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php  
                  $item_total=0;  $coupon_amount=0;
                  $subtotal =0;
                  $wallet_amt = $wallet = 0;
                  
                  $tax_amt = (($coddetails1_paypal->order_amt * $coddetails1_paypal->order_tax)/100);
                  $all_tax_amt+=  (($coddetails1_paypal->order_amt * $coddetails1_paypal->order_tax)/100);
                  
                  $shipping_amt = $coddetails1_paypal->order_shipping_amt;
                  $all_shipping_amt+= $coddetails1_paypal->order_shipping_amt; ?>
               <?php if($coddetails1_paypal->coupon_amount !=0): ?>
               <?php 
                  $coupon_value = $coddetails1_paypal->coupon_amount; ?>
               <?php else: ?>
               <?php
                  $coupon_value = 0; ?>
               <?php endif; ?>
               <?php
                  /* $wallet = DB::table('nm_ordercod_wallet')->where('cod_transaction_id','=',$coddetails1_paypal->transaction_id)->get();
                  
                   if(count($wallet)!=0){
                       $wallet_amt = $wallet[0]->wallet_used;
                   }else{
                       $wallet_amt = 0;
                   }*/
                   
                   $item_total = $coddetails1_paypal->order_amt;
                   
                   $grand_total = (($item_total+$tax_amt+$shipping_amt)-$wallet_amt)-$coupon_value;
                  ?>   
               <div  id="<?php echo 'uiModal7'.$j?>" class="modal fade in invoice-front" style="display:none;">
                  <div class="modal-dialog hij">
                     <div class="modal-content">
                        <div class="modal-header" style="border-bottom:none;">
                           <div class="col-lg-2 pull-right"><a href="" class="btn btn-danger" data-dismiss="modal" ><i class="icon-remove-sign icon-2x"></i></a></div>
                           <div class="col-lg-4">
                              <?php 
                                 //$logo = url().'/public/assets/default_image/Logo.png';
                                 //if(file_exists($SITE_LOGO))
                                   $logo = $SITE_LOGO;
                                 ?> 
                              <img src="<?php echo e($logo); ?>" alt="" style="width:100px;height:30px;">
                           </div>
                           <div class="col-lg-6" style="width:100% !important; text-align:center;"><strong><?php if(Lang::has(Session::get('lang_file').'.TAX_INVOICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TAX_INVOICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TAX_INVOICE')); ?> <?php endif; ?> </strong></div>
                        </div>
                        <hr style="margin-top: 0px;">
                        <div class="" style=" clear: both;">
                           <div class="col-lg-12">
                              <div class="Front-inv-address-left" style="text-align:left;">
                                 <h4><?php if(Lang::has(Session::get('lang_file').'.PAYPAL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PAYPAL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PAYPAL')); ?> <?php endif; ?></h4>
                                 <b><?php if(Lang::has(Session::get('lang_file').'.AMOUNT_PAID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AMOUNT_PAID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AMOUNT_PAID')); ?> <?php endif; ?> :<?php echo e(Helper::cur_sym()); ?> 
                                 <?php
                                    $customerid   = Session::get('customerid');
                                      $product_titles=DB::table('nm_order')
                                      ->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
                                      ->leftjoin('nm_color', 'nm_order.order_pro_color', '=', 'nm_color.co_id')
                                      ->leftjoin('nm_size', 'nm_order.order_pro_size', '=', 'nm_size.si_id')
                                      ->where('transaction_id', '=', $coddetails1_paypal->transaction_id)
                                      ->where('nm_order.order_cus_id', '=', $customerid)
                                      ->where('nm_order.order_type','=',2)
                                      ->get();
                                      $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0; ?>
                                 <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php
                                    $subtotal=$prd_tit->order_amt; 
                                    				$tax_amt = (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                    			
                                    				$total_tax_amt+= (($prd_tit->order_amt * $prd_tit->order_tax)/100); 
                                    				$total_ship_amt+= $prd_tit->order_shipping_amt;
                                    				$total_item_amt+=$prd_tit->order_amt;
                                    				$coupon_amount+= $prd_tit->coupon_amount;
                                    				$prodct_id = $prd_tit->order_pro_id;
                                    				
                                    		$item_amt = $prd_tit->order_amt + (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                    			
                                    		
                                    			 $ship_amt = $prd_tit->order_shipping_amt;
                                    			
                                    		
                                    			 //$item_tax = $codorderdet->cod_tax;
                                    			/*if($prd_tit->coupon_amount != 0)
                                    			{
                                    				$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                    			}
                                    			else
                                    			{
                                    				$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt);
                                    			}*/
                                    
                                    			$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                    			
                                    
                                    			$wallet_amt +=  $prd_tit->wallet_amount;
                                                                                    $wallet     += $prd_tit->wallet_amount;
                                    ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php echo e($grand_total-$wallet_amt); ?></b>
                                 <br>
                                 <span>((<?php if(Lang::has(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.INCLUSIVE_OF_ALL_CHARGES')); ?> <?php endif; ?>) )</span>
                                 <br>
                                 <span><?php if(Lang::has(Session::get('lang_file').'.ORDERID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDERID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDERID')); ?> <?php endif; ?> : <?php echo e($coddetails1_paypal->transaction_id); ?></span><br>
                                 <span><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_DATE')); ?> <?php endif; ?>: <?php echo e($coddetails1_paypal->order_date); ?></span>
<!-- dealpayu -->
                                 <br><span> <?php echo e($coddetails1_paypal->tax_type); ?>:  <?php echo e($coddetails1_paypal->tax_id_number); ?></span>
                              </div>
                              <div class="Front-inv-address-right" style="border-left:1px solid #eeeeee;text-align:left;">
                                 <h4><?php if(Lang::has(Session::get('lang_file').'.SHIPPING_ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPPING_ADDRESS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPPING_ADDRESS')); ?> <?php endif; ?></h4>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.NAME')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NAME')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NAME')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_name); ?><br/>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.PHONE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PHONE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PHONE')); ?> <?php endif; ?>  : </strong><?php echo e($coddetails1_paypal->ship_phone); ?> <br/>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.EMAIL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EMAIL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EMAIL')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_email); ?>  </br>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS1')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS1')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS1')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_address1); ?></br>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS2')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS2')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS2')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_address2); ?> </br>
                                 <?php if($coddetails1_paypal->ship_ci_id): ?>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.CITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CITY')); ?> <?php endif; ?>  : </strong><?php echo e($coddetails1_paypal->ship_ci_id); ?> </br>
                                 <?php endif; ?>
                                 <?php if($coddetails1_paypal->ship_state): ?>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.STATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.STATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.STATE')); ?> <?php endif; ?>  : </strong><?php echo e($coddetails1_paypal->ship_state); ?></br>
                                 <?php endif; ?>
                                 <?php if($coddetails1_paypal->ship_country): ?>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.COUNTRY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUNTRY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUNTRY')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_country); ?> </br>
                                 <?php endif; ?>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.ZIPCODE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ZIPCODE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ZIPCODE')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_postalcode); ?> </br>
                              </div>
                           </div>
                        </div>
                        <hr style="clear: both;">
                        <div class="" style="padding: 15px;">
                           <div class="span12" style=" text-align:center;">
                              <h4 class="text-center"><?php if(Lang::has(Session::get('lang_file').'.INVOICE_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.INVOICE_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.INVOICE_DETAILS')); ?> <?php endif; ?></h4>
                              <span style=" text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')); ?> <?php endif; ?> </span>
                           </div>
                        </div>
                        <div style="clear: both;"></div>
                        <hr>
                        <h4 class="text-center" style="text-align:center;padding-top: 20px; margin-bottom: 0px;"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_DETAILS')); ?> <?php endif; ?></h4>
                        <div class="table-responsive">
                           <table style="width:98%;" align="center" border="1" bordercolor="#e6e6e6">
                              <tr style="border-bottom:1px solid #e6e6e6; background:#f5f5f5;">
                                 <td width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_TITLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_TITLE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_TITLE')); ?> <?php endif; ?></td>
                                 <!--td  width="13%" align="center">Color</td>&nbsp;
                                    <td  width="13%" align="center">Size</td-->
                                 <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.QUANTITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.QUANTITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.QUANTITY')); ?> <?php endif; ?></td>
                                 <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.PRICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRICE')); ?> <?php endif; ?></td>
                                 <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.SUB_TOTAL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SUB_TOTAL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SUB_TOTAL')); ?> <?php endif; ?></td>
                                 <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.PAYMENT_STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PAYMENT_STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PAYMENT_STATUS')); ?> <?php endif; ?></td>
                                 <br>
                                 <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.DELIVERY_STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DELIVERY_STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DELIVERY_STATUS')); ?> <?php endif; ?>
                                 </td>
                              </tr>
                              <?php
                                 $customerid   = Session::get('customerid');
                                 $product_titles=DB::table('nm_order')
                                 ->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')
                                 ->leftjoin('nm_color', 'nm_order.order_pro_color', '=', 'nm_color.co_id')
                                 ->leftjoin('nm_size', 'nm_order.order_pro_size', '=', 'nm_size.si_id')
                                 ->where('transaction_id', '=', $coddetails1_paypal->transaction_id)
                                 ->where('nm_order.order_cus_id', '=', $customerid)
                                 ->where('nm_order.order_type','=',2)
                                 ->get();
                                 $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0;  ?>
                              <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                              <?php 
                                 $status=$prd_tit->delivery_status; ?>
                              <?php if($prd_tit->delivery_status==1): ?>
                              <?php
                              $orderstatus="Order Placed";
                              ?>
                              <?php elseif($prd_tit->delivery_status==2): ?> 
                              <?php
                              $orderstatus="Order Packed";
                              ?>
                              <?php elseif($prd_tit->delivery_status==3): ?> 
                              <?php
                              $orderstatus="Dispatched";
                              ?>
                              <?php elseif($prd_tit->delivery_status==4): ?> 
                              <?php
                              $orderstatus="Delivered";
                              ?>
                              <?php elseif($prd_tit->delivery_status==5): ?>
                              <?php
                              $orderstatus="cancel pending";
                              ?>
                              <?php elseif($prd_tit->delivery_status==6): ?> 
                              <?php
                              $orderstatus="cancelled";
                              ?>
                              <?php elseif($prd_tit->delivery_status==7): ?> 
                              <?php
                              $orderstatus="return pending";
                              ?>
                              <?php elseif($prd_tit->delivery_status==8): ?> 
                              <?php
                              $orderstatus="Returned";
                              ?>
                              <?php elseif($prd_tit->delivery_status==9): ?> 
                              <?php
                              $orderstatus="Replace Pending";
                              ?>
                              <?php elseif($prd_tit->delivery_status==10): ?> 
                              <?php
                              $orderstatus="Replaced";
                              ?>
                              <?php else: ?>
                              <?php
                              $orderstatus = '';
                              ?>
                              <?php endif; ?>  
                              <?php if($prd_tit->order_status==1): ?>
                              <?php
                              $payment_status="Success";
                              ?>
                              <?php elseif($prd_tit->order_status==2): ?> 
                              <?php
                              $payment_status="Order Packed";
                              ?>
                              <?php elseif($prd_tit->order_status==3): ?> 
                              <?php
                              $payment_status="Hold";
                              ?>
                              <?php elseif($prd_tit->order_status==4): ?> 
                              <?php
                              $payment_status="Faild";
                              ?>
                              <?php endif; ?>
                              <?php 
                                 $subtotal=$prd_tit->order_amt; 
                                 				$tax_amt = (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                 			
                                 				$total_tax_amt+= (($prd_tit->order_amt * $prd_tit->order_tax)/100); 
                                 				$total_ship_amt+= $prd_tit->order_shipping_amt;
                                 				$total_item_amt+=$prd_tit->order_amt;
                                 				$coupon_amount+= $prd_tit->coupon_amount;
                                 				$prodct_id = $prd_tit->order_pro_id;
                                 				
                                 		$item_amt = $prd_tit->order_amt + (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                 			
                                 		
                                 			 $ship_amt = $prd_tit->order_shipping_amt;
                                 			
                                 		
                                 			 //$item_tax = $codorderdet->cod_tax;
                                 			/*if($prd_tit->coupon_amount != 0)
                                 			{
                                 				$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                 			}
                                 			else
                                 			{
                                 				$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt);
                                 			}*/
                                 
                                 			$grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                 					
                                 ?>
                              <tr>
                                 <td  width="" align="center"><?php 
                                    if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                                    $deal_title = 'deal_title';
                                    }else {  $deal_title = 'deal_title_'.Session::get('lang_code'); }
                                    						echo $prd_tit->$deal_title."<br/>";?>
                                 </td>
                                 &nbsp;									 
                                 <!--td  width="13%" align="center"><?php //echo $coddetails1->co_name;?></td>&nbsp;
                                    <td  width="13%" align="center"><?php //echo $coddetails1->si_name;?></td-->
                                 <td  width="" align="center"><?php echo e($prd_tit->order_qty); ?> </td>
                                 <td  width="" align="center"><?php echo e(Helper::cur_sym()); ?> <?php echo e($prd_tit->order_amt); ?> </td>
                                 <td  width="" align="center"><?php echo e($subtotal - $prd_tit->coupon_amount); ?>

                                 <td  width="" align="center"><?php echo e($payment_status); ?></td>
                                 <td  width="" align="center"><?php echo e($orderstatus); ?></td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </table>
                        </div>
                        <br>
                        <hr>
                        <div class="" style="padding: 15px;">
                           <div class="col-lg-6"></div>
                           <div class="col-lg-6">
                              <span><?php if(Lang::has(Session::get('lang_file').'.SHIPMENT_VALUE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPMENT_VALUE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPMENT_VALUE')); ?> <?php endif; ?><b class="pull-right" style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($total_ship_amt); ?> </b></span><br>
                              <span><?php if(Lang::has(Session::get('lang_file').'.TAX')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TAX')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TAX')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($total_tax_amt); ?></b></span><br>
                              <?php	$subtotal1 = 0; ?>
                              <?php if(count($wallet)!=0): ?> 
                              <span>
                                 wallet :
                                 <p class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> -<?php echo $wallet_amt;?></p>
                              </span>
                              <br>
                              <?php endif; ?>
                              <hr>
                              <?php $totamt_paypal=$subtotal1+$coddetails1_paypal->order_tax;?>
                              <span><?php if(Lang::has(Session::get('lang_file').'.AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AMOUNT')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($grand_total-$wallet_amt); ?></b></span>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button data-dismiss="modal" class="btn btn-danger" type="button"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                        </div>
                     </div>
                  </div>
               </div>
               <?php $j=$j+1;  ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
            </div>
         </ul>
      </div>
   </div>
   <div id="eleven" <?php if(isset($tab_active) && ($tab_active==11)): ?>  class="tab-pane active" <?php else: ?> class="tab-pane" <?php endif; ?>>
      <div class="row-fluid">
         <ul class="text_tab">
            <div class="row">
               <div class="col-lg-11 panel_marg">
                  <div class="btn btn-large btn-primary pull-right me_btn cart-res" style="margin-bottom: 5px;"><?php if(Lang::has(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOTAL_WALLET_BALANCE_AMOUNT')); ?> <?php endif; ?>  : <?php echo e(Helper::cur_sym()); ?><?php echo e((($customer_info->wallet!="")?number_format($customer_info->wallet,2):'0.00')); ?></div>
                  <div class="table-responsive">
                     <table class="table table-bordered table-sieve ddd"  style="margin-left:3%;width:97%; font-size:13px">
                        <thead style="background:#4a994c; color:#fff;">
                           <tr>
                              <th class="text-center"><?php if(Lang::has(Session::get('lang_file').'.S.NO')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.S.NO')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.S.NO')); ?> <?php endif; ?></th>
                              <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDERID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDERID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDERID')); ?> <?php endif; ?></th>
                              <!--<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.TOT._PRODUCT')!= '') { echo  trans(Session::get('lang_file').'.TOT._PRODUCT');}  else { echo trans($OUR_LANGUAGE.'.TOT._PRODUCT');} ?></th>
                                 th style="text-align:center;">Product Names</th>
                                 <th style="text-align:center;">Shipping Address </th>-->
                              <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TOTAL_ORDER_AMOUNT')); ?> <?php endif; ?> </th>
                              <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?>  <?php else: ?> { echo trans($OUR_LANGUAGE.'.ORDER_DATE')}} <?php endif; ?></th>
                              <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.USED_WALLET')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.USED_WALLET')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.USED_WALLET')); ?> <?php endif; ?></th>
                              <!--<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.STATUS')!= '') { echo  trans(Session::get('lang_file').'.STATUS');}  else { echo trans($OUR_LANGUAGE.'.STATUS');} ?></th>-->
                              <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ACTION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ACTION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ACTION')); ?> <?php endif; ?></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if(count($get_deal_Payumoney)<1): ?> 
                           <tr>
                              <td colspan="6" class="text-center"><?php if(Lang::has(Session::get('lang_file').'.NO_ORDER_DEAL_PAYUMONEY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_ORDER_DEAL_PAYUMONEY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_ORDER_DEAL_PAYUMONEY')); ?> <?php endif; ?></td>
                           </tr>
                           <?php endif; ?>
                           <?php $j=1; ?>
                           <?php $__currentLoopData = $get_deal_Payumoney; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                           <?php
                              $walletusedamt_final1=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $orderdet->transaction_id)->get();
                              
                              $item_amt = $orderdet->order_amt + (($orderdet->order_amt * $orderdet->order_tax)/100);
                                    
                              
                                     $ship_amt = $orderdet->order_shipping_amt;
                                    
                                    
                                      $grand_total =  ($item_amt + $ship_amt + $item_tax);
                              
                              ?>
                           <tr>
                              <td class="text-center"><?php echo e($j); ?></td>
                              <td class="text-center"><?php echo e($orderdet->transaction_id); ?></td>
                              <td class="text-center"><?php echo e(Helper::cur_sym()); ?>

                                 <?php
                                    $customerid   = Session::get('customerid');
                                      $product_titles=DB::table('nm_order_payu')
                                      ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
                                      ->leftjoin('nm_color', 'nm_order_payu.order_pro_color', '=', 'nm_color.co_id')
                                      ->leftjoin('nm_size', 'nm_order_payu.order_pro_size', '=', 'nm_size.si_id')
                                      ->where('transaction_id', '=', $orderdet->transaction_id)
                                      ->where('nm_order_payu.order_cus_id', '=', $customerid)
                                      ->where('nm_order_payu.order_type','=',2)
                                      ->get(); 
                                      $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0;
                                      $wallet_amt =  $wallet     = 0;
                                    
                                      /*$wallet = DB::table('nm_ordercod_wallet')->where('cod_transaction_id','=',$orderdet->transaction_id)->get();
                                    
                                    if(count($wallet)!=0){
                                          $wallet_amt = $wallet[0]->wallet_used;
                                          }else{
                                          $wallet_amt = 0;
                                       }*/
                                       ?>
                                 <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php
                                    $subtotal=$prd_tit->order_amt; 
                                                $tax_amt = (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                             
                                                $total_tax_amt+= (($prd_tit->order_amt * $prd_tit->order_tax)/100); 
                                                $total_ship_amt+= $prd_tit->order_shipping_amt;
                                                $total_item_amt+=$prd_tit->order_amt;
                                                $coupon_amount+= $prd_tit->coupon_amount;
                                                $prodct_id = $prd_tit->order_pro_id;
                                                
                                          $item_amt = $prd_tit->order_amt + (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                             
                                          
                                              $ship_amt = $prd_tit->order_shipping_amt;
                                             
                                          
                                              //$item_tax = $codorderdet->cod_tax;
                                             /*if($prd_tit->coupon_amount != 0)
                                             {
                                                $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                             }
                                             else
                                             {
                                                $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt);
                                             }*/      
                                             $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                             $wallet_amt +=  $prd_tit->wallet_amount;
                                                                                    $wallet     += $prd_tit->wallet_amount; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php echo e($grand_total-$wallet_amt); ?></b>
                              </td>
                              <td class="text-center"><?php echo e($orderdet->order_date); ?></td>
                              <td class="text-center"><?php echo e(Helper::cur_sym()); ?><?php 
                                 // print_r($walletusedamt_final);
                                  echo ((count($walletusedamt_final1)>0)?" ".number_format($walletusedamt_final1[0]->wallet_used,2):'0');
                                  
                                  ?></td>
                              <td class="text-center">
                                 <a class="btn btn-success " data-target="<?php echo '#uiModal11'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.VIEW_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.VIEW_DETAILS')); ?> <?php endif; ?></a>
                                 <?php /* cancel ,REturn asn replacement starts */?>
                                 <?php       
                                    //cancel ,return and replacement process starts
                                             $paypal_cancel_valid = 0;
                                             $paypal_return_replace_valid = 0;
                                             $cod_cancel_valid = 0;
                                             $cod_return_replace_valid= 0;
                                    
                                             /* cancel starts */
                                           
                                             $cancel_valid =  DB::table('nm_order_payu')
                                    ->join('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')             
                                    ->orderBy('nm_order_payu.order_id', 'desc')
                                    ->where('nm_order_payu.order_type', '=', 2)
                                    ->where('nm_order_payu.transaction_id', '=', $orderdet->transaction_id)
                                    ->where('delivery_status','=',1)->get();
                                             $paypal_cancel_valid =  count($cancel_valid);
                                             $return_replace =  DB::table('nm_order_payu')
                                    ->join('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')  
                                    ->orderBy('nm_order_payu.order_id', 'desc')
                                    ->where('nm_order_payu.order_type', '=', 2)
                                    ->where('nm_order_payu.transaction_id', '=',$orderdet->transaction_id)
                                    ->where('delivery_status','=',4)->get();
                                             $paypal_return_replace_valid =  count($return_replace);
                                   
                                             //cancel ,return and replacement process ends
                                             ?>
                                 <?php if($paypal_cancel_valid>0): ?>
                                 <?php 
                                    $cancel_allow = 0;
                                    $cancel_allowed_itm  = array();
                                    //check Cancel date
                                    ?>
                                 <?php $__currentLoopData = $cancel_valid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancelItm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php
                                    $order_date = $cancelItm->order_date;
                                    $now = time(); //current date
                                    $format_date = strtotime($order_date);                   
                                    $datediff = abs($now - $format_date);
                                    
                                    $numberDays = $datediff/86400;  // 86400 seconds in one day
                                    
                                    // and you might want to convert to integer
                                    $Ord_datecount = intval($numberDays);
                                    ?>
                                 <?php if($cancelItm->allow_cancel==1): ?>
                                 <?php if($Ord_datecount<$cancelItm->cancel_days): ?>
                                 <?php
                                    $delStatusInfo = DB::table('nm_order_delivery_status')->where('order_id','=',$cancelItm->order_id)->get(); 
                                    //print_r($delStatusInfo);
                                    ?>
                                 <?php if(count($delStatusInfo)==0): ?>
                                 <?php
                                    $cancel_allowed_itm[]  = array('prod_id' => $cancelItm->order_id,'prod_title' => $cancelItm->$deal_title );
                                    $cancel_allow++; 
                                    ?>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($cancel_allow>0): ?>
                                 <a class="btn btn-warning" data-target="<?php echo '#cancelModal_dp'.$j;?>" data-toggle="modal"><?php if (Lang::has(Session::get('lang_file').'.CANCELLATION')!= '') { echo  trans(Session::get('lang_file').'.CANCELLATION');}  else { echo trans($OUR_LANGUAGE.'.CANCELLATION');} ?></a>
                                 <!-- Modal -->
                                 <div id="<?php echo 'cancelModal_dp'.$j;?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                       <!-- Modal content-->
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.CANCELLATION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CANCELLATION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CANCELLATION')); ?> <?php endif; ?></h4>
                                          </div>
                                          <div class="modal-body">
                                             <?php echo Form::open(array('url'=>'deal_payu_cancel_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                             <?php if($paypal_cancel_valid>0): ?>
                                             <input type="hidden" name="customer_mail" value="<?php echo e($orderdet->ship_email); ?>">
                                             <input type="hidden" name="order_payment_type" value="1"><input type="hidden" name="order_type" value="2"><input type="hidden" name="mer_id" value="<?php echo e($orderdet->order_merchant_id); ?>">
                                             <div class="form-group">
                                                <label for="cancel_item_id">
                                                <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_CANCEL')); ?>   <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_CANCEL')); ?> <?php endif; ?>
                                                </label> 
                                                <select id = "cancel_item_id" name="cancel_item_id">
                                                   <?php if(count($cancel_allowed_itm)>0): ?>
                                                   <?php $__currentLoopData = $cancel_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <?php else: ?>
                                                   <option value=""> No Item</option>
                                                   <?php endif; ?>   
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="cancel_notes">
                                                <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_CANCEL')); ?> <?php endif; ?>
                                                </label>
                                                <textarea id="<?php echo '#cancel_notes'.$j;?>" class="cancel_dealnotes_<?php echo $j; ?>" name="cancel_notes" maxlength="300"  placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_CANCEL')); ?> <?php endif; ?>"></textarea>
                                             </div>
                                             <?php endif; ?>
                                          </div>
                                          <div class="modal-footer">
                                             <button  type="submit" onclick="return cancel_dealvalidate('<?php echo $j; ?>');" class="btn btn-danger conform_cancel" id="<?php echo '#conform_cancel'.$j;?>" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_CANCEL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_CANCEL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_CANCEL')); ?>    <?php endif; ?></button>
                                             <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                          </div>
                                          <?php echo Form::close(); ?>

                                       </div>
                                    </div>
                                 </div>
                                 <?php endif; ?>   
                                 <?php endif; ?>
                                 <?php /* cancel end */ ?>
                                 <?php if($paypal_return_replace_valid>0): ?>
                                 <?php 
                                    $return_allow = $replace_allow = 0;
                                    $return_allowed_itm  = array();
                                    $replace_allowed_itm  = array();
                                    //check Cancel date 
                                    ?>
                                 <?php $__currentLoopData = $return_replace; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php
                                    $order_date = $Itm->order_date; 
                                                $now = time(); //current date
                                    $format_date = strtotime($order_date);                   
                                    $datediff = abs($now - $format_date);
                                    
                                    $numberDays = $datediff/86400;  // 86400 seconds in one day
                                    
                                    // and you might want to convert to integer
                                    $Ord_datecount = intval($numberDays);
                                    ?>
                                 <?php if($Itm->allow_return==1): ?> 
                                 <?php if($Ord_datecount<$Itm->return_days): ?>  
                                 <?php
                                    $delStatusInfo = DB::table('nm_order_delivery_status')->where('order_id','=',$Itm->order_id)->get();  
                                    //print_r($delStatusInfo); 
                                    ?>
                                 <?php if(count($delStatusInfo)==0): ?>
                                 <?php
                                    $return_allowed_itm[]  = array('prod_id' => $Itm->order_id,'prod_title' => $Itm->$deal_title );
                                    $return_allow++; 
                                    ?>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endif; ?>   
                                 <?php if($Itm->allow_replace==1): ?>
                                 <?php if($Ord_datecount<$Itm->replace_days): ?>
                                 <?php
                                    $delStatusInfo = DB::table('nm_order_delivery_status')->where('order_id','=',$Itm->order_id)->get(); 
                                    //print_r($delStatusInfo);
                                    
                                    ?>
                                 <?php if(count($delStatusInfo)==0): ?>
                                 <?php
                                    $replace_allowed_itm[]  = array('prod_id' => $Itm->order_id,'prod_title' => $Itm->$deal_title );
                                    $replace_allow++;
                                    ?>                   
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($return_allow>0): ?>
                                 <a class="btn btn-blue btn-danger"  data-target="<?php echo '#returnModal_dp'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RETURN')); ?> <?php endif; ?></a>
                                 <!-- REturn Modal -->
                                 <div id="<?php echo 'returnModal_dp'.$j;?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                       <!-- Modal content-->
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.ORDER_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_RETURN')); ?>      <?php endif; ?></h4>
                                          </div>
                                          <div class="modal-body">
                                             <?php echo Form::open(array('url'=>'deal_payu_return_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                             <?php if($return_allow>0): ?>
                                             <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                             <input type="hidden" name="order_payment_type" value="1"><input type="hidden" name="order_type" value="2">
                                             <div class="form-group">
                                                <label for="return_item_id">
                                                <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_RETURN')); ?>   <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_RETURN')); ?>   <?php endif; ?>
                                                </label> 
                                                <select id = "return_item_id" name="return_item_id">
                                                   <?php if(count($return_allowed_itm)>0): ?>
                                                   <?php $__currentLoopData = $return_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <?php else: ?>
                                                   <option value=""> No Item</option>
                                                   <?php endif; ?>   
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="return_notes">
                                                <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_RETURN')); ?>       <?php endif; ?>   
                                                </label>
                                                <textarea id="return_notes" class="return_dealnotes_<?php echo $j; ?>" maxlength="300" name="return_notes" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_RETURN')); ?> <?php endif; ?>"></textarea>
                                             </div>
                                             <?php endif; ?>
                                          </div>
                                          <div class="modal-footer">
                                             <button onclick="return return_dealvalidate('<?php echo $j; ?>');" type="submit" class="btn btn-danger return_conform" ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_RETURN')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_RETURN')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_RETURN')); ?> <?php endif; ?></button>
                                             <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                          </div>
                                          <?php echo Form::close(); ?>

                                       </div>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                                 <?php if($replace_allow>0): ?>
                                 <a class="btn btn-info"  data-target="<?php echo '#replaceModal_dp'.$j;?>" data-toggle="modal"><?php if(Lang::has(Session::get('lang_file').'.REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REPLACE')); ?> <?php endif; ?></a>
                                 <!-- REturn Modal -->
                                 <div id="<?php echo 'replaceModal_dp'.$j;?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                       <!-- Modal content-->
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             <h4 class="modal-title"><?php if(Lang::has(Session::get('lang_file').'.ORDER_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_REPLACE')); ?> <?php endif; ?></h4>
                                          </div>
                                          <div class="modal-body">
                                             <?php echo Form::open(array('url'=>'deal_payu_replace_order','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

                                             <?php if($return_allow>0): ?>
                                             <input type="hidden" name="customer_mail" value="<?php echo e($codorderdet->ship_email); ?>">
                                             <input type="hidden" name="order_payment_type" value="1"><input type="hidden" name="order_type" value="2">
                                             <div class="form-group">
                                                <label for="replace_item_id">
                                                <?php if(Lang::has(Session::get('lang_file').'.SELECT_ITEM_TO_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_ITEM_TO_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_ITEM_TO_REPLACE')); ?> <?php endif; ?>
                                                </label> 
                                                <select id = "replace_item_id" name="replace_item_id">
                                                   <?php if(count($replace_allowed_itm)>0): ?>
                                                   <?php $__currentLoopData = $replace_allowed_itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <option value="<?php echo e($row['prod_id']); ?>"> <?php echo e($row['prod_title']); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <?php else: ?>
                                                   <option value=""> No Item</option>
                                                   <?php endif; ?>   
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="replace_notes">
                                                <?php if(Lang::has(Session::get('lang_file').'.REASON_FOR_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REASON_FOR_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REASON_FOR_REPLACE')); ?> <?php endif; ?>
                                                </label>
                                                <textarea id="replace_notes" class="replace_dealnotes_<?php echo $j; ?>" name="replace_notes" maxlength="300" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_REASON_FOR_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_REASON_FOR_REPLACE')); ?> <?php endif; ?>"></textarea>
                                             </div>
                                             <?php endif; ?>
                                          </div>
                                          <div class="modal-footer">
                                             <button  type="submit" onclick="return replace_dealvalidate('<?php echo $j; ?>');"  class="btn btn-danger replace_conform"  ><?php if(Lang::has(Session::get('lang_file').'.CONFIRM_REPLACE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CONFIRM_REPLACE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CONFIRM_REPLACE')); ?> <?php endif; ?></button>
                                             <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                                          </div>
                                          <?php echo Form::close(); ?>

                                       </div>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php /* cancel ,REturn asn replacement ends */?>
                              </td>
                           </tr>
                           <?php $j=$j+1;  ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <?php  $j=1; $all_tax_amt=0; $all_shipping_amt=0; ?>
               <?php $__currentLoopData = $get_deal_Payumoney; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coddetails1_paypal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php  
                  $item_total=0;  $coupon_amount=0;
                  $subtotal =0;
                  $wallet_amt = $wallet = 0;
                  
                  $tax_amt = (($coddetails1_paypal->order_amt * $coddetails1_paypal->order_tax)/100);
                  $all_tax_amt+=  (($coddetails1_paypal->order_amt * $coddetails1_paypal->order_tax)/100);
                  
                  $shipping_amt = $coddetails1_paypal->order_shipping_amt;
                  $all_shipping_amt+= $coddetails1_paypal->order_shipping_amt; ?>
               <?php if($coddetails1_paypal->coupon_amount !=0): ?>
               <?php 
                  $coupon_value = $coddetails1_paypal->coupon_amount; ?>
               <?php else: ?>
               <?php
                  $coupon_value = 0; ?>
               <?php endif; ?>
               <?php
                  /* $wallet = DB::table('nm_ordercod_wallet')->where('cod_transaction_id','=',$coddetails1_paypal->transaction_id)->get();
                  
                   if(count($wallet)!=0){
                       $wallet_amt = $wallet[0]->wallet_used;
                   }else{
                       $wallet_amt = 0;
                   }*/
                   
                   $item_total = $coddetails1_paypal->order_amt;
                   
                   $grand_total = (($item_total+$tax_amt+$shipping_amt)-$wallet_amt)-$coupon_value;
                  ?>   
               <div  id="<?php echo 'uiModal11'.$j?>" class="modal fade in invoice-front" style="display:none;">
                  <div class="modal-dialog hij">
                     <div class="modal-content">
                        <div class="modal-header" style="border-bottom:none;">
                           <div class="col-lg-2 pull-right"><a href="" class="btn btn-danger" data-dismiss="modal" ><i class="icon-remove-sign icon-2x"></i></a></div>
                           <div class="col-lg-4">
                              <?php 
                                 //$logo = url().'/public/assets/default_image/Logo.png';
                                 //if(file_exists($SITE_LOGO))
                                   $logo = $SITE_LOGO;
                                 ?> 
                              <img src="<?php echo e($logo); ?>" alt="" style="width:100px;height:30px;">
                           </div>
                           <div class="col-lg-6" style="width:100% !important; text-align:center;"><strong><?php if(Lang::has(Session::get('lang_file').'.TAX_INVOICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TAX_INVOICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TAX_INVOICE')); ?> <?php endif; ?> </strong></div>
                        </div>
                        <hr style="margin-top: 0px;">
                        <div class="" style=" clear: both;">
                           <div class="col-lg-12">
                              <div class="Front-inv-address-left" style="text-align:left;">
                                 <h4><?php if(Lang::has(Session::get('lang_file').'.PAYUMONEY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PAYUMONEY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PAYUMONEY')); ?> <?php endif; ?></h4>
                                 <b><?php if(Lang::has(Session::get('lang_file').'.AMOUNT_PAID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AMOUNT_PAID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AMOUNT_PAID')); ?> <?php endif; ?> :<?php echo e(Helper::cur_sym()); ?> 
                                 <?php
                                    $customerid   = Session::get('customerid');
                                      $product_titles=DB::table('nm_order_payu')
                                      ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
                                      ->leftjoin('nm_color', 'nm_order_payu.order_pro_color', '=', 'nm_color.co_id')
                                      ->leftjoin('nm_size', 'nm_order_payu.order_pro_size', '=', 'nm_size.si_id')
                                      ->where('transaction_id', '=', $coddetails1_paypal->transaction_id)
                                      ->where('nm_order_payu.order_cus_id', '=', $customerid)
                                      ->where('nm_order_payu.order_type','=',2)
                                      ->get(); 
                                      $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0; ?>
                                 <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php
                                    $subtotal=$prd_tit->order_amt; 
                                                $tax_amt = (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                             
                                                $total_tax_amt+= (($prd_tit->order_amt * $prd_tit->order_tax)/100); 
                                                $total_ship_amt+= $prd_tit->order_shipping_amt;
                                                $total_item_amt+=$prd_tit->order_amt;
                                                $coupon_amount+= $prd_tit->coupon_amount;
                                                $prodct_id = $prd_tit->order_pro_id;
                                                
                                          $item_amt = $prd_tit->order_amt + (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                             
                                          
                                              $ship_amt = $prd_tit->order_shipping_amt;
                                             
                                          
                                              //$item_tax = $codorderdet->cod_tax;
                                             /*if($prd_tit->coupon_amount != 0)
                                             {
                                                $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                             }
                                             else
                                             {
                                                $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt);
                                             }*/
                                    
                                             $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                             
                                    
                                             $wallet_amt +=  $prd_tit->wallet_amount;
                                                                                    $wallet     += $prd_tit->wallet_amount;
                                    ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php echo e($grand_total-$wallet_amt); ?></b>
                                 <br>
                                 <span>((<?php if(Lang::has(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.INCLUSIVE_OF_ALL_CHARGES')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.INCLUSIVE_OF_ALL_CHARGES')); ?> <?php endif; ?>) )</span>
                                 <br>
                                 <span><?php if(Lang::has(Session::get('lang_file').'.ORDERID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDERID')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDERID')); ?> <?php endif; ?> : <?php echo e($coddetails1_paypal->transaction_id); ?></span><br>
                                 <span><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_DATE')); ?> <?php endif; ?>: <?php echo e($coddetails1_paypal->order_date); ?></span>

                                  <br><span> <?php echo e($coddetails1_paypal->tax_type); ?>:  <?php echo e($coddetails1_paypal->tax_id_number); ?></span>

                              </div>
                              <div class="Front-inv-address-right" style="border-left:1px solid #eeeeee;text-align:left;">
                                 <h4><?php if(Lang::has(Session::get('lang_file').'.SHIPPING_ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPPING_ADDRESS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPPING_ADDRESS')); ?> <?php endif; ?></h4>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.NAME')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NAME')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NAME')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_name); ?><br/>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.PHONE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PHONE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PHONE')); ?> <?php endif; ?>  : </strong><?php echo e($coddetails1_paypal->ship_phone); ?> <br/>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.EMAIL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EMAIL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EMAIL')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_email); ?>  </br>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS1')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS1')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS1')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_address1); ?></br>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS2')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS2')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS2')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_address2); ?> </br>
                                 <?php if($coddetails1_paypal->ship_ci_id): ?>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.CITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CITY')); ?> <?php endif; ?>  : </strong><?php echo e($coddetails1_paypal->ship_ci_id); ?> </br>
                                 <?php endif; ?>
                                 <?php if($coddetails1_paypal->ship_state): ?>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.STATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.STATE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.STATE')); ?> <?php endif; ?>  : </strong><?php echo e($coddetails1_paypal->ship_state); ?></br>
                                 <?php endif; ?>
                                 <?php if($coddetails1_paypal->ship_country): ?>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.COUNTRY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUNTRY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUNTRY')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_country); ?> </br>
                                 <?php endif; ?>
                                 <strong><?php if(Lang::has(Session::get('lang_file').'.ZIPCODE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ZIPCODE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ZIPCODE')); ?> <?php endif; ?> : </strong><?php echo e($coddetails1_paypal->ship_postalcode); ?> </br>
                              </div>
                           </div>
                        </div>
                        <hr style="clear: both;">
                        <div class="" style="padding: 15px;">
                           <div class="span12" style=" text-align:center;">
                              <h4 class="text-center"><?php if(Lang::has(Session::get('lang_file').'.INVOICE_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.INVOICE_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.INVOICE_DETAILS')); ?> <?php endif; ?></h4>
                              <span style=" text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.THIS_SHIPMENT_CONTAINS_FOLLOWING_ITEMS')); ?> <?php endif; ?> </span>
                           </div>
                        </div>
                        <div style="clear: both;"></div>
                        <hr>
                        <h4 class="text-center" style="text-align:center;padding-top: 20px; margin-bottom: 0px;"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_DETAILS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_DETAILS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_DETAILS')); ?> <?php endif; ?></h4>
                        <div class="table-responsive">
                           <table style="width:98%;" align="center" border="1" bordercolor="#e6e6e6">
                              <tr style="border-bottom:1px solid #e6e6e6; background:#f5f5f5;">
                                 <td width=""><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_TITLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_TITLE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_TITLE')); ?> <?php endif; ?></td>
                                 <!--td  width="13%" align="center">Color</td>&nbsp;
                                    <td  width="13%" align="center">Size</td-->
                                 <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.QUANTITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.QUANTITY')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.QUANTITY')); ?> <?php endif; ?></td>
                                 <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.PRICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRICE')); ?> <?php endif; ?></td>
                                 <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.SUB_TOTAL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SUB_TOTAL')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SUB_TOTAL')); ?> <?php endif; ?></td>
                                 <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.PAYMENT_STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PAYMENT_STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PAYMENT_STATUS')); ?> <?php endif; ?></td>
                                 <br>
                                 <td  width="" align="center"><?php if(Lang::has(Session::get('lang_file').'.DELIVERY_STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DELIVERY_STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DELIVERY_STATUS')); ?> <?php endif; ?>
                                 </td>
                              </tr>
                              <?php
                                 $customerid   = Session::get('customerid');
                                 $product_titles=DB::table('nm_order_payu')
                                 ->leftjoin('nm_deals', 'nm_order_payu.order_pro_id', '=', 'nm_deals.deal_id')
                                 ->leftjoin('nm_color', 'nm_order_payu.order_pro_color', '=', 'nm_color.co_id')
                                 ->leftjoin('nm_size', 'nm_order_payu.order_pro_size', '=', 'nm_size.si_id')
                                 ->where('transaction_id', '=', $coddetails1_paypal->transaction_id)
                                 ->where('nm_order_payu.order_cus_id', '=', $customerid)
                                 ->where('nm_order_payu.order_type','=',2)
                                 ->get(); 
                                 $total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = $item_tax = 0;  ?>
                              <?php $__currentLoopData = $product_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd_tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                              <?php 
                                 $status=$prd_tit->delivery_status; ?>
                              <?php if($prd_tit->delivery_status==1): ?>
                              <?php
                              $orderstatus="Order Placed";
                              ?>
                              <?php elseif($prd_tit->delivery_status==2): ?> 
                              <?php
                              $orderstatus="Order Packed";
                              ?>
                              <?php elseif($prd_tit->delivery_status==3): ?> 
                              <?php
                              $orderstatus="Dispatched";
                              ?>
                              <?php elseif($prd_tit->delivery_status==4): ?> 
                              <?php
                              $orderstatus="Delivered";
                              ?>
                              <?php elseif($prd_tit->delivery_status==5): ?>
                              <?php
                              $orderstatus="cancel pending";
                              ?>
                              <?php elseif($prd_tit->delivery_status==6): ?> 
                              <?php
                              $orderstatus="cancelled";
                              ?>
                              <?php elseif($prd_tit->delivery_status==7): ?> 
                              <?php
                              $orderstatus="return pending";
                              ?>
                              <?php elseif($prd_tit->delivery_status==8): ?> 
                              <?php
                              $orderstatus="Returned";
                              ?>
                              <?php elseif($prd_tit->delivery_status==9): ?> 
                              <?php
                              $orderstatus="Replace Pending";
                              ?>
                              <?php elseif($prd_tit->delivery_status==10): ?> 
                              <?php
                              $orderstatus="Replaced";
                              ?>
                              <?php else: ?>
                              <?php
                              $orderstatus = '';
                              ?>
                              <?php endif; ?>  
                              <?php if($prd_tit->order_status==1): ?>
                              <?php
                              $payment_status="Success";
                              ?>
                              <?php elseif($prd_tit->order_status==2): ?> 
                              <?php
                              $payment_status="Order Packed";
                              ?>
                              <?php elseif($prd_tit->order_status==3): ?> 
                              <?php
                              $payment_status="Hold";
                              ?>
                              <?php elseif($prd_tit->order_status==4): ?> 
                              <?php
                              $payment_status="Faild";
                              ?>
                              <?php endif; ?>
                              <?php 
                                 $subtotal=$prd_tit->order_amt; 
                                             $tax_amt = (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                          
                                             $total_tax_amt+= (($prd_tit->order_amt * $prd_tit->order_tax)/100); 
                                             $total_ship_amt+= $prd_tit->order_shipping_amt;
                                             $total_item_amt+=$prd_tit->order_amt;
                                             $coupon_amount+= $prd_tit->coupon_amount;
                                             $prodct_id = $prd_tit->order_pro_id;
                                             
                                       $item_amt = $prd_tit->order_amt + (($prd_tit->order_amt * $prd_tit->order_tax)/100);
                                          
                                       
                                           $ship_amt = $prd_tit->order_shipping_amt;
                                          
                                       
                                           //$item_tax = $codorderdet->cod_tax;
                                          /*if($prd_tit->coupon_amount != 0)
                                          {
                                             $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                          }
                                          else
                                          {
                                             $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt);
                                          }*/
                                 
                                          $grand_total =  ($total_item_amt + $total_ship_amt + $total_tax_amt - $coupon_amount);
                                                
                                 ?>
                              <tr>
                                 <td  width="" align="center"><?php 
                                    if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                                    $deal_title = 'deal_title';
                                    }else {  $deal_title = 'deal_title_'.Session::get('lang_code'); }
                                                      echo $prd_tit->$deal_title."<br/>";?>
                                 </td>
                                 &nbsp;                            
                                 <!--td  width="13%" align="center"><?php //echo $coddetails1->co_name;?></td>&nbsp;
                                    <td  width="13%" align="center"><?php //echo $coddetails1->si_name;?></td-->
                                 <td  width="" align="center"><?php echo e($prd_tit->order_qty); ?> </td>
                                 <td  width="" align="center"><?php echo e(Helper::cur_sym()); ?> <?php echo e($prd_tit->order_amt); ?> </td>
                                 <td  width="" align="center"><?php echo e($subtotal - $prd_tit->coupon_amount); ?></td>
                                 <td  width="" align="center"><?php echo e($payment_status); ?></td>
                                 <td  width="" align="center"><?php echo e($orderstatus); ?></td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </table>
                        </div>
                        <br>
                        <hr>
                        <div class="" style="padding: 15px;">
                           <div class="col-lg-6"></div>
                           <div class="col-lg-6">
                              <span><?php if(Lang::has(Session::get('lang_file').'.SHIPMENT_VALUE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPMENT_VALUE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPMENT_VALUE')); ?> <?php endif; ?><b class="pull-right" style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($total_ship_amt); ?> </b></span><br>
                              <span><?php if(Lang::has(Session::get('lang_file').'.TAX')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TAX')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TAX')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($total_tax_amt); ?></b></span><br>
                              <?php  $subtotal1 = 0; ?>
                              <?php if(count($wallet)!=0): ?> 
                              <span>
                                 wallet :
                                 <p class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> -<?php echo $wallet_amt;?></p>
                              </span>
                              <br>
                              <?php endif; ?>
                              <hr>
                              <?php $totamt_paypal=$subtotal1+$coddetails1_paypal->order_tax;?>
                              <span><?php if(Lang::has(Session::get('lang_file').'.AMOUNT')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.AMOUNT')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.AMOUNT')); ?> <?php endif; ?><b class="pull-right"style="margin-right:15px;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($grand_total-$wallet_amt); ?></b></span>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button data-dismiss="modal" class="btn btn-danger" type="button"><?php if(Lang::has(Session::get('lang_file').'.CLOSE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLOSE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLOSE')); ?> <?php endif; ?></button>
                        </div>
                     </div>
                  </div>
               </div>
               <?php $j=$j+1;  ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
            </div>
         </ul>
      </div>
   </div>
   <div id="four" <?php if(isset($tab_active) && ($tab_active==4)): ?>  class="tab-pane active" <?php else: ?>  class="tab-pane" <?php endif; ?>>
   <div class="row-fluid">
      <ul class="text_tab">
         <div class="row">
            <div class="col-lg-11 panel_marg">
               <div class="table-responsive">
                  <table class="table table-bordered table-sieve fff"  style="margin-left:3%;width:97%; font-size:13px" align="center">
                     <thead style="background:#4a994c; color:#fff;">
                        <tr>
                           <th class="text-center" style="text-align:center;"> <?php if(Lang::has(Session::get('lang_file').'.S.NO')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.S.NO')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.S.NO')); ?> <?php endif; ?></th>
                           <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_NAMES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_NAMES')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_NAMES')); ?> <?php endif; ?></th>
                           <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_PRICE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_PRICE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_PRICE')); ?> <?php endif; ?></th>
                           <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.PRODUCT_IMAGE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRODUCT_IMAGE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRODUCT_IMAGE')); ?> <?php endif; ?></th>
                           <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.STATUS')); ?> <?php endif; ?></th>
                           <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ACTION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ACTION')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ACTION')); ?> <?php endif; ?></th>
                        </tr>
                     </thead>
                     <tbody >
                        <?php if(count($wishlistdetails)<1): ?> 
                        <tr>
                           <td colspan="6" class="text-center"><?php if(Lang::has(Session::get('lang_file').'.NO_WHISLIST')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_WHISLIST')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_WHISLIST')); ?> <?php endif; ?>   </td>
                        </tr>
                        <?php endif; ?>
                        <?php	$i=1;   ?>
                        <?php if(count($wishlistdetails)!=0): ?> 
                        <?php $__currentLoopData = $wishlistdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php	$product_img= explode('/**/',trim($orderdet->pro_Img,"/**/"));
                        $mcat = strtolower(str_replace(' ','-',$orderdet->mc_name));
                        $smcat = strtolower(str_replace(' ','-',$orderdet->smc_name));
                        $sbcat = strtolower(str_replace(' ','-',$orderdet->sb_name));
                        $ssbcat = strtolower(str_replace(' ','-',$orderdet->ssb_name)); 
                        $res = base64_encode($orderdet->pro_id); ?>
                        <tr>
                           <td class="text-center" style="text-align:center;"><?php echo e($i); ?>

                           <td class="text-center" style="text-align:center;">
                              <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                              <?php	$pro_title = 'pro_title'; ?>
                              <?php else: ?> <?php  $pro_title = 'pro_title_'.Session::get('lang_code'); ?> <?php endif; ?>
                              <?php echo e($orderdet->$pro_title); ?>

                           </td>
                           <td class="text-center" style="text-align:center;"><?php echo e(Helper::cur_sym()); ?> <?php echo e($orderdet->pro_disprice); ?>

                           <td class="text-center" style="text-align:center;">
                              <?php	$product_image 	= $product_img[0];
                              $prod_path 	= url('').'/public/assets/default_image/No_image_product.png';
                              $img_data 	= "public/assets/product/".$product_image; ?>
                              <?php if($product_img !=''): ?>
                              <?php if(file_exists($img_data) && $product_image !=''): ?>	
                              <?php 
                              $prod_path = url('').'/public/assets/product/'.$product_image; ?>					
                              <?php else: ?>	
                              <?php if(isset($DynamicNoImage['productImg'])): ?>  
                              <?php
                              $dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['productImg']; ?>
                              <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>
                              <?php 
                              $prod_path = url('').'/'.$dyanamicNoImg_path; ?>
                              <?php endif; ?>	
                              <?php endif; ?>
                              <?php endif; ?>	
                              <?php else: ?>	
                              <?php if(isset($DynamicNoImage['productImg'])): ?>  
                              <?php
                              $dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['productImg']; ?>
                              <?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>
                              <?php 
                              $prod_path = url('').'/'.$dyanamicNoImg_path; ?>
                              <?php endif; ?>	
                              <?php endif; ?>
                              <?php endif; ?>		
                              <img src="<?php echo $prod_path; ?>" style="width:87px; height:auto"/>
                           </td>
                           <td class="text-center" style="text-align:center;">
                              <?php if($orderdet->pro_status =='1'): ?>    <?php echo e("Available"); ?>   <?php else: ?>   <?php echo e("Not Available"); ?>     <?php endif; ?>
                           </td>
                           <td class="td_algnctr">
                              <div style="margin-bottom: 5px;"> 
                                 <a href="<?php echo url('remove_wish_product').'/'.$orderdet->ws_id; ?>"><input type="button" class="btn btn-danger" value=" <?php if(Lang::has(Session::get('lang_file').'.REMOVE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.REMOVE')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.REMOVE')); ?> <?php endif; ?>"></a> <?php /*remove link:remove_wish_product/wishlist table_id*/ ?>
                              </div>
                              <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?>
                              <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
                              <?php endif; ?>
                              <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
                              <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
                              <?php endif; ?>
                              <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?>
                              <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
                              <?php endif; ?>
                              <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?>  
                              <a href="<?php echo e(url('productview/'.$mcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
                              <?php endif; ?>
                           </td>
                        </tr>
                        <?php $i=$i+1; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>		              
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </ul>
   </div>
</div>
<?php /* <div id="six" class="tab-pane">
   <div class="row-fluid">
   <ul class="text_tab">
   <div class="row">
   
   <div class="col-lg-11 panel_marg">
   	
   	<table class="table table-bordered table-sieve"  style="margin-left:3%;width:97%; font-size:13px">
       		
           <thead style="background:#4a994c; color:#fff;">
           <tr>
               
           <th class="text-center">SNO</th>
   <th style="text-align:center;">Auction Name</th>
   <th style="text-align:center;">Original Price</th>
   <th style="text-align:center;">Auction Price</th>
   <th style="text-align:center;">Orignal Bid Amount</th>
           <th style="text-align:center;">Your Bid Amount</th>
           <th style="text-align:center;">Bid Date</th>
           <th style="text-align:center;">Bid Shipping Amount</th>
           <th style="text-align:center;">Total Amount</th>
           
           
               </tr>
             </thead>
             <tbody>
               <?php //$i=1;
      //foreach($bidhistory as $bid) {
      
      
      $totalamt//=$bid->oa_bid_amt+$bid->oa_bid_shipping_amt;
      ?>
<tr>
   <td class="text-center"><?php //echo $i;?></td>
   <td class="text-center"><?php //echo  $bid->auc_title;?></td>
   <td class="text-center"><?php //echo  $bid->auc_original_price;?></td>
   <td class="text-center"><?php //echo  $bid->auc_auction_price;?></td>
   <td class="text-center"><?php //echo  "$".$bid->oa_original_bit_amt;?></td>
   <td class="text-center"><?php //echo   "$".$bid->oa_bid_amt;?></td>
   <td class="text-center"><?php //echo  $bid->oa_bid_date;?></td>
   <td class="text-center"><?php //echo   "$".$bid->oa_bid_shipping_amt;?></td>
   <td class="text-center"><?php //echo   "$".$totalamt;?></td>
</tr>
<?php //$i=$i+1; } ?>		
</tbody>
</table>
</div>
</div>
</ul>
</div>
<div class="row-fluid">
   No data found
</div>
</div>
*/ ?>
<div id="five" <?php if(isset($tab_active) && ($tab_active==5)) { ?> class="tab-pane active" <?php }else{ ?>class="tab-pane" <?php } ?>>
   <div class="row-fluid">
      <form>
         <div class="span6 hero-unit">
            <!--<div class="alert alert-danger alert-dismissable" id="shiperror_name" align="center" style="height:30px;width:298px;display:none;"></div>-->
            <p class="mandarory_txt"><span style="color: #F00;">* <strong><?php if(Lang::has(Session::get('lang_file').'.ALL_FIELDS_ARE_MANDATORY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ALL_FIELDS_ARE_MANDATORY')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ALL_FIELDS_ARE_MANDATORY')); ?> <?php endif; ?></strong></span></p>
            <div class="form-group">
               <label class="control-label col-lg-2" for="text1"><strong><?php if(Lang::has(Session::get('lang_file').'.FULL_NAME')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.FULL_NAME')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.FULL_NAME')); ?> <?php endif; ?></strong><span class="text-sub">*</span></label>
               <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_NAME')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_NAME')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_NAME')); ?> <?php endif; ?>" name="shippingcusname" id="shippingcusname"  maxlength ="50" value="<?php echo e($customer_info->ship_name); ?>">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-lg-2" for="text1"><strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS')); ?> <?php endif; ?></strong><span class="text-sub">*</span></label>
               <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_ADDRESS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_ADDRESS')); ?> <?php endif; ?>" name="shipaddr1" id="shipaddr1" maxlength="90" value="<?php echo e($customer_info->ship_address1); ?>">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-lg-2" for="text1"><strong><?php if(Lang::has(Session::get('lang_file').'.ADDRESS2')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADDRESS2')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADDRESS2')); ?> <?php endif; ?></strong><span class="text-sub">*</span></label>
               <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_ADDRESS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_ADDRESS')); ?> <?php endif; ?>" name="shipaddr2" id="shipaddr2" maxlength="90"  value="<?php echo e($customer_info->ship_address2); ?>">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-lg-2" for="text1"><strong><?php if(Lang::has(Session::get('lang_file').'.MOBILE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MOBILE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MOBILE')); ?> <?php endif; ?></strong><span class="text-sub">*</span></label>
               <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_MOBILE_NUMBER')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_MOBILE_NUMBER')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_MOBILE_NUMBER')); ?> <?php endif; ?>" name="shipcusmobile" id="shipcusmobile" maxlength="16"  value="<?php echo e($customer_info->ship_phone); ?> " />
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-lg-2" for="text1"><strong><?php if(Lang::has(Session::get('lang_file').'.EMAIL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.EMAIL')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.EMAIL')); ?> <?php endif; ?></strong><span class="text-sub">*</span></label>
               <div class="col-lg-8">
                  <input type="email" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_EMAIL_ID')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_EMAIL_ID')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_EMAIL_ID')); ?> <?php endif; ?>" name="shipcusemail" id="shipcusemail"  maxlength="50"  value="<?php echo e($customer_info->ship_email); ?>" /> <span id="shipcusemail_error"> </span>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>
            </div>
         </div>
         <div class="span6 hero-unit">
            <div class="form-group">
               <label class="control-label col-lg-2" for="text1"><strong><?php if(Lang::has(Session::get('lang_file').'.COUNTRY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COUNTRY')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COUNTRY')); ?> <?php endif; ?></strong><span class="text-sub">*</span></label>
               <div class="col-lg-8">
                  <select class="form-control" name="shippingcountry" id="shippingcountry" onChange="get_city_listshipping(this.value)">
                     <option value="0">--<?php if(Lang::has(Session::get('lang_file').'.SELECT_COUNTRY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SELECT_COUNTRY')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SELECT_COUNTRY')); ?> <?php endif; ?>--</option>
                     <?php $__currentLoopData = $country_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                     <option  value="<?php echo $country->co_id;?>"  <?php
                        if($hasship==1){
                        
                        	if($customer_info->ship_country==$country->co_id){
                        		echo 'selected';
                        	} 
                        }?>>
                        <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                        <?php	$co_name = 'co_name'; ?>
                        <?php else: ?> <?php  $co_name = 'co_name_'.Session::get('lang_code'); ?> <?php endif; ?>
                        <?php echo $country->$co_name; ?> 
                     </option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </select>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-lg-2" for="text1"><strong><?php if(Lang::has(Session::get('lang_file').'.CITY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CITY')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CITY')); ?> <?php endif; ?></strong><span class="text-sub">*</span></label>
               <div class="col-lg-8">
                  <select class="form-control" id="shippingcity" name="shippingcity">
                     <option value="0">--select city--</option>
                     <?php $__currentLoopData = $city_shipping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                     <option value="<?php echo e($city->ci_id); ?>"<?php if($city->ci_id==$customer_info->ship_ci_id){ ?>selected<?php } ?>>
                        <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                        <?php	$ci_name = 'ci_name'; ?>
                        <?php else: ?> <?php  $ci_name = 'ci_name_'.Session::get('lang_code'); ?> <?php endif; ?>
                        <?php echo $city->$ci_name; ?>

                     </option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </select>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-lg-2" for="text1"><strong><?php if(Lang::has(Session::get('lang_file').'.STATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.STATE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.STATE')); ?> <?php endif; ?></strong><span class="text-sub">*</span></label>
               <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_STATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_STATE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_STATE')); ?> <?php endif; ?>" name="shippingstate" id="shippingstate"  maxlength="50" value="<?php echo e($customer_info->ship_state); ?>">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-lg-2" for="text1"><strong><?php if(Lang::has(Session::get('lang_file').'.ZIPCODE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ZIPCODE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ZIPCODE')); ?> <?php endif; ?></strong><span class="text-sub">*</span></label>
               <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="<?php if(Lang::has(Session::get('lang_file').'.ENTER_YOUR_ZIP_CODE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ENTER_YOUR_ZIP_CODE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ENTER_YOUR_ZIP_CODE')); ?> <?php endif; ?>" name="zipcode" id="zipcode"   value="<?php echo $customer_info->ship_postalcode;//if($hasship==1){echo $shipping_info->ship_postalcode;}?>" maxlength="6">
               </div>
               <div class="col-lg-8">
                  <input type="submit" style="color:#ffffff"  id="update_shippinginfo" value="<?php if(Lang::has(Session::get('lang_file').'.UPDATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.UPDATE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.UPDATE')); ?> <?php endif; ?>" class="btn btn-success btn-sm btn-grad"\>  
                  <input type="reset"  style="color:#ffffff"  id="cancel_shippinginfo" value="<?php if(Lang::has(Session::get('lang_file').'.RESET')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RESET')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RESET')); ?> <?php endif; ?>" class="btn btn-danger btn-sm btn-grad"
                     \>  
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
<div id="eight" class="tab-pane">
   <div class="row-fluid">
      <ul class="text_tab">
         <div class="row">
            <div class="col-lg-11 panel_marg">
               <div class="table-responsive">
                  <table class="table table-bordered table-sieve aaa"  style="margin-left:3%;width:97%; font-size:13px; overflow-x: scroll;">
                     <thead style="background:#4a994c; color:#fff;">
                        <tr>
                           <th class="text-center"><?php if(Lang::has(Session::get('lang_file').'.S.NO')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.S.NO')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.S.NO')); ?> <?php endif; ?></th>
                           <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.DEALS_NAMES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DEALS_NAMES')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DEALS_NAMES')); ?> <?php endif; ?></th>
                           <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.SHIPPING_ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPPING_ADDRESS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPPING_ADDRESS')); ?> <?php endif; ?></th>
                           <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_DATE')); ?> <?php endif; ?>
                           </th>
                           <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.STATUS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.STATUS')); ?> <?php endif; ?></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i=1; ?>
                        <?php if(isset($getdealordersdetails) && $getdealordersdetails != ''): ?>
                        <?php $__currentLoopData = $getdealordersdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php if($orderdet->order_status==1): ?>
                        <?php $orderstatus="success"; ?>
                        <?php elseif($orderdet->order_status==2): ?> 
                        <?php $orderstatus="completed"; ?>
                        <?php elseif($orderdet->order_status==3): ?> 
                        <?php	$orderstatus="Hold"; ?>
                        <?php elseif($orderdet->order_status==4): ?> 
                        <?php	$orderstatus="failed"; ?>
                        <?php endif; ?>
                        <tr>
                           <td class="text-center"><?php echo e($i); ?></td>
                           <td class="text-center"> 
                              <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                              <?php	$deal_title = 'deal_title'; ?>
                              <?php else: ?> <?php  $deal_title = 'deal_title_'.Session::get('lang_code'); ?> <?php endif; ?>
                              <?php echo e($orderdet->$deal_title); ?>

                           </td>
                           <td class="text-center"><?php echo e($orderdet->ship_address1); ?></td>
                           <td class="text-center"><?php echo e($orderdet->order_date); ?></td>
                           <td class="text-center"><?php echo e($orderstatus); ?></td>
                        </tr>
                        <?php $i=$i+1; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>   
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </ul>
   </div>
</div>
<div id="nine" class="tab-pane">
   <div class="row-fluid">
      <ul class="text_tab">
         <div class="row">
            <div class="col-lg-11 panel_marg">
               <table class="table table-bordered table-sieve"  style="margin-left:3%;width:97%; font-size:13px; overflow-x: scroll;">
                  <thead style="background:#4a994c; color:#fff;">
                     <tr>
                        <th class="text-center"><?php if(Lang::has(Session::get('lang_file').'.S.NO')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.S.NO')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.S.NO')); ?> <?php endif; ?></th>
                        <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.DEALS_NAMES')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DEALS_NAMES')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DEALS_NAMES')); ?> <?php endif; ?></th>
                        <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.SHIPPING_ADDRESS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SHIPPING_ADDRESS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SHIPPING_ADDRESS')); ?> <?php endif; ?></th>
                        <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.ORDER_DATE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ORDER_DATE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ORDER_DATE')); ?> <?php endif; ?></th>
                        <th style="text-align:center;"><?php if(Lang::has(Session::get('lang_file').'.STATUS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.STATUS')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.STATUS')); ?> <?php endif; ?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i=1; ?>
                     <?php if(isset($getdealordersdetailss)): ?>
                     <?php $__currentLoopData = $getdealordersdetailss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                     <?php if($orderdet->cod_status==1): ?>
                     <?php $orderstatus="success"; ?>
                     <?php elseif($orderdet->cod_status==2): ?> 
                     <?php	$orderstatus="completed"; ?>
                     <?php elseif($orderdet->cod_status==3): ?> 
                     <?php	$orderstatus="Hold"; ?>
                     <?php elseif($orderdet->cod_status==4): ?> 
                     <?php	$orderstatus="failed"; ?>
                     <?php endif; ?>
                     <tr>
                        <td class="text-center"><?php echo e($i); ?></td>
                        <td class="text-center"> 
                           <?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
                           <?php	$deal_title = 'deal_title'; ?>
                           <?php else: ?> <?php  $deal_title = 'deal_title_'.Session::get('lang_code'); ?> <?php endif; ?>
                           <?php echo e($orderdet->$deal_title); ?>

                        </td>
                        <td class="text-center"><?php echo e($orderdet->ship_address1); ?></td>
                        <td class="text-center"><?php echo e($orderdet->cod_date); ?></td>
                        <td class="text-center"><?php echo e($orderstatus); ?></td>
                     </tr>
                     <?php	 $i=$i+1; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>    
                  </tbody>
               </table>
            </div>
         </div>
   </div>
   </ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php echo $footer; ?>

<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="themes/js/jquery.js" type="text/javascript"></script>
<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
<script src="themes/js/google-code-prettify/prettify.js"></script>
<script src="themes/js/bootshop.js"></script>
<script src="themes/js/jquery.lightbox-0.5.js"></script>
<script src="themes/js/seive.js"></script>
<script>/*$(function() {
   $('a[data-toggle="tab"]').on('click', function(e) {
       window.localStorage.setItem('activeTab', $(e.target).attr('href'));
   });
   var activeTab = window.localStorage.getItem('activeTab');
   if (activeTab) {
       $('#myTab a[href="' + activeTab + '"]').tab('show');
       window.localStorage.removeItem("activeTab");
   }
   });*/
</script>
<div id="upload_pic" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3><?php if(Lang::has(Session::get('lang_file').'.CHANGE_PROFILE_PICTURE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CHANGE_PROFILE_PICTURE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CHANGE_PROFILE_PICTURE')); ?> <?php endif; ?></h3>
   </div>
   <div class="modal-body">
      <div style="float:left">
         <?php echo Form::open(array('url'=>'profile_image_submit','class'=>'form-horizontal loginFrm','enctype'=>'multipart/form-data')); ?>

         <div class="controls"> *Jpeg,Png
            <input  type="file" class="input-file" name ="imgfile" id="imgfile">
            <span id="error_image"> </span>
         </div>
         <br>
         <span><?php if(Lang::has(Session::get('lang_file').'.IMAGE_UPLOAD_SIZE_1')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.IMAGE_UPLOAD_SIZE_1')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.IMAGE_UPLOAD_SIZE_1')); ?> <?php endif; ?></span><br><br>
         <input type="submit" id="file_submit" class="btn btn-success" value="<?php if(Lang::has(Session::get('lang_file').'.UPLOAD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.UPLOAD')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.UPLOAD')); ?> <?php endif; ?>" />
         </form>
      </div>
   </div>
</div>
</div>
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="themes/js/jquery.sieve.min.js" type="text/javascript"></script>
<script>
   var searchTemplate = "<div class='row form-inline'><label class='pull-right'>Search: <input type='text' class='form-control' placeholder='keywords'></label></div>"
   $(".table-sieve").sieve({ searchTemplate: searchTemplate });
   searchTemplate = "<div class='row form-inline'><label style='float: right;'>Find a Quote: <input type='text' class='form-control' placeholder='(try typing &quot;einstein&quot;)'></label></div>"
   $(".p-sieve").sieve({ searchTemplate: searchTemplate, itemSelector: "p" });
</script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
   function tab(tid)
   	{
   		window.location = "<?php echo url('').'/user_profile'."?id="; ?>"+tid;
   		
   	}
   
   	function get_city_listshipping(id)
   	{
   		var passcityid = 'id='+id;
   		$.ajax( {
   			type: 'get',
   			data: passcityid,
   			url: '<?php echo url('register_getcountry'); ?>',
   			success: function(responseText){  
   				if(responseText)
   				{ 	 
   				$('#shippingcity').html(responseText);					   
   				}
   				}		
   			});		
   	}
   	
   	
   	$(document).ready(function(){
   		$('#file_submit').click(function(){
   			if($('#imgfile').val()=='')
   			{
   				$('#error_image').html('<?php if (Lang::has(Session::get('lang_file').'.IMAGE_FIELD_REQUIRED')!= '') { echo  trans(Session::get('lang_file').'.IMAGE_FIELD_REQUIRED');}  else { echo trans($OUR_LANGUAGE.'.IMAGE_FIELD_REQUIRED');} ?>!');
   				return false;
   				
   			}
   			if($('#imgfile').val()!='') {
   			var checkimage = /\.(jpe?g|png)$/i.test($('#imgfile').val()); 
   			 if (!checkimage) {
   			$('#error_image').html('upload image like jpg,png,jpeg format');
   			return false;
   							} 
   						} 
   						});
   	});
   	
   	
   	function get_city_list1(id)
   	{
   		
   		var passcityid = 'id='+id;
   		$.ajax( {
   			type: 'get',
   			data: passcityid,
   			url: '<?php echo url('register_getcountry'); ?>',
   			success: function(responseText){  
   				if(responseText)
   				{ 	 
   				$('#city_div').show();
   
   				$('#selectcity1').html(responseText);					   
   				}
   							}		
   			});		
   	}
   	
</script>
<script type="text/javascript">
   $(document).ready(function(){
   
   
   <?php if($customer_info->cus_city!=""){?>
   	var passcityid = 'id='+<?php echo $customer_info->cus_city;?>;
   	//alert(passcityid);
   	$.ajax( {
   		type: 'get',
   		data: passcityid,
   		url: '<?php echo url('register_getcity_shipping'); ?>',
   		success: function(responseText){ 
   		 
   		if(responseText)
   		{ 	 
   		 
   		// $('#country_div').show();
   		//$('#selectcity1').html(responseText);					   
   		}
   						}		
   		});		
   <?php } ?>
   
   });
   
   $(document).ready(function(){
   	var uname=$('#username1');
   	$('#cancel_username').click(function()
   	{
   		$('#username_div').hide();
   	});
   
   	$('#update_username').click(function(){
   		if(uname.val()=='')
   		{
   			uname.css('border', '1px solid red'); 
   			uname.focus(); 
   			return false;
   		}
   		else
   		{
   			uname.css('border', ''); 
   			cname=uname.val();
   			var  passdata= 'cname='+cname;
   		
   			$.ajax( {
   			type: 'get',
   			data: passdata,
   			url: '<?php echo url('update_username_ajax'); ?>',
   			success: function(responseText){  
   			var result=responseText.split(",");
   			if(result[0]=="success")
   			{ 	
   				$('#error_name').show();
   				$('#error_name').html('<?php if (Lang::has(Session::get('lang_file').'.NAME_UPDATED_SUCCESSFULLY')!= '') { echo  trans(Session::get('lang_file').'.NAME_UPDATED_SUCCESSFULLY');}  else { echo trans($OUR_LANGUAGE.'.NAME_UPDATED_SUCCESSFULLY');} ?>');
   				$('#error_name').fadeOut(3000);	
   				$('#username_div').hide(); 
   				$('#cusname').html(result[1]);
   
   				$('.cusnameSuccess').html("Updated Successfully!!!");
   				$('.cusnameSuccess').fadeOut(2000);	
   			}
   							}		
   			});		
   		}
   	});
   
   });//document ready
   
   $(document).ready(function(){
   	$('#cancel_password').click(function()
   	{
   		$('#password_div').hide();
   	});
   
   	$('#update_password').click(function()
   	{
   		if($('#oldpwd').val()=="")
   		{	
   			 $('#oldpwd').css('border', '1px solid red'); 
   			$('#oldpwd').focus(); 
   			//oldpwd.focus();
   			return false;
   		}
   		else if($('#pwd').val()=="")
   		{
   			$('#oldpwd').css('border', ''); 
   			 $('#pwd').css('border', '1px solid red'); 
   			$('#pwd').focus(); 
   			//pwd.focus();
   			return false;
   		}
   		else if($('#confirmpwd').val()=="")
   		{
   		 	 $('#pwd').css('border', ''); 
   			 $('#confirmpwd').css('border', '1px solid red'); 
   			$('#confirmpwd').focus(); 
   			//confirmpwd.focus();
   			return false;
   		}
   		else
   		{
   			$('#confirmpwd').css('border', ''); 
   			var pwd= $('#pwd').val(); 
   			var confirmpwd=$('#confirmpwd').val(); 
   			var oldpwd=$('#oldpwd').val(); 
   			var passdata = 'oldpwd='+oldpwd+"&newpwd="+pwd+"&confirmpwd="+confirmpwd;
   
   			$.ajax( {
   				type: 'post',
   				data: passdata,
   				url: '<?php echo url('update_password_ajax'); ?>',
   				success: function(responseText)
   					{  
   						//alert(responseText);
   						var result=responseText.split(",");
   						if(result[0]=="success")
   						{ 	
   						$('#error_name').show();
   						$('#error_name').html('<?php if (Lang::has(Session::get('lang_file').'.PASSWORD_CHANGED_SUCCESSFULLY')!= '') { echo  trans(Session::get('lang_file').'.PASSWORD_CHANGED_SUCCESSFULLY');}  else { echo trans($OUR_LANGUAGE.'.PASSWORD_CHANGED_SUCCESSFULLY');} ?>');
   						$('#error_name').fadeOut(3000);	
   						$('#password_div').hide(); 
   						$('.passwordupdate').html("Updated Successfully!!!");
   				$('.passwordupdate').fadeOut(2000);	
   						}
   						if(result[0]=="fail1")
   						{ 	
   						$('#error_name').show();
   						$('#error_name').html('<?php if (Lang::has(Session::get('lang_file').'.BOTH_PASSWORDS_DO_NO_MATCH')!= '') { echo  trans(Session::get('lang_file').'.BOTH_PASSWORDS_DO_NO_MATCH');}  else { echo trans($OUR_LANGUAGE.'.BOTH_PASSWORDS_DO_NO_MATCH');} ?>');
   						$('#error_name').fadeOut(3000);	
   						}
   						if(result[0]=="fail2")
   						{ 	
   						$('#error_name').show();
   						$('#error_name').html('<?php if (Lang::has(Session::get('lang_file').'.OLD_PASSWORD_DOES_NOT_MATCH')!= '') { echo  trans(Session::get('lang_file').'.OLD_PASSWORD_DOES_NOT_MATCH');}  else { echo trans($OUR_LANGUAGE.'.OLD_PASSWORD_DOES_NOT_MATCH');} ?>');
   						$('#error_name').fadeOut(3000);	
   						}
   					}		
   				});		
   		}
   	});
   
   });//document ready
   
   $(document).ready(function(){
   	$('#phonenum').keydown(function (e) 
   	{
   		 if (e.shiftKey || e.ctrlKey || e.altKey)
   		 {
   			e.preventDefault();
   		 } 
   		 else 
   		 {
   			var key = e.keyCode;
   			if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)))
   			 {
   				e.preventDefault();
   			 }
   		}
   	});
   
   	$('#cancel_phonenumber').click(function()
   	{
   		$('#phonenumber_div').hide();
   	});
   
   	$('#update_phonenumber').click(function()
   	{
   
   		if($('#phonenum').val()=="")
   		{
   			//$('#error_mobile').html("Mobile number should not be empty");
   			$('#error_mobile').html('<?php if (Lang::has(Session::get('lang_file').'.PLEASE_PROVIDE_PHONENUMBER')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_PROVIDE_PHONENUMBER');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_PROVIDE_PHONENUMBER');} ?>');
   			$('#error_mobile').fadeOut(3000);
   			$('#phonenum').focus();
   			return false;
   		}
   		else
   		{
   			var phonenum= $('#phonenum').val(); 
   			var passdata = 'phonenum='+phonenum;
   
   			$.ajax({
   				type: 'get',
   				data: passdata,
   				url: '<?php echo url('update_phonenumber_ajax'); ?>',
   				success: function(responseText)
   					{  
   						var result=responseText.split(",");
   						if(result[0]=="success")
   						{ 	
   						$('#error_mobile').show();
   						$('#error_mobile').html('<?php if (Lang::has(Session::get('lang_file').'.PHONENUMBER_CHANGED_SUCCESSFULLY')!= '') { echo  trans(Session::get('lang_file').'.PHONENUMBER_CHANGED_SUCCESSFULLY');}  else { echo trans($OUR_LANGUAGE.'.PHONENUMBER_CHANGED_SUCCESSFULLY');} ?>');
   						$('#error_mobile').fadeOut(3000);	
   						$('#phonenumber_div').hide(); 
   						$('#cusphone').html(result[1]);
   						}
   
   					}		
   				});		
   		}
   	});
   
   });//document ready
   
   $(document).ready(function(){
   	$('#cancel_address').click(function()
   	{
   		$('#address_div').hide();
   	});
   
   	$('#update_address').click(function()
   	{
   
   		if($('#addr1').val()=="" && $('#addr2').val()=="")
   		{
   			$('#error_name').show();
   			$('#error_name').html('<?php if (Lang::has(Session::get('lang_file').'.PLEASE_PROVIDE_ANY_ONE_OF_THE_ADDRESS_FIELDS')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_PROVIDE_ANY_ONE_OF_THE_ADDRESS_FIELDS');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_PROVIDE_ANY_ONE_OF_THE_ADDRESS_FIELDS');} ?>');
   			$('#error_name').fadeOut(3000);
   			$('#phonenum').focus();
   			return false;
   		}
   		else
   		{
   			var addr1= $('#addr1').val(); 
   			var addr2= $('#addr2').val(); 
   
   			var passdata ='addr1='+addr1+"&addr2="+addr2;
   
   			$.ajax( {
   				type: 'get',
   				data: passdata,
   				url: '<?php echo url('update_address_ajax'); ?>',
   				success: function(responseText)
   				{  
   					var result=responseText.split(",");
   					if(result[0]=="success")
   					{ 	
   						$('#error_name').show();
   						$('#error_name').html('<?php if (Lang::has(Session::get('lang_file').'.ADDRESS_CHANGED_SUCCESSFULLY')!= '') { echo  trans(Session::get('lang_file').'.ADDRESS_CHANGED_SUCCESSFULLY');}  else { echo trans($OUR_LANGUAGE.'.ADDRESS_CHANGED_SUCCESSFULLY');} ?>');
   						$('#error_name').fadeOut(3000);	
   						$('#address_div').hide(); 
   						$('#address1').html(result[1]);
   						$('#address2').html(result[2]);
   
   						$('.updateaddress').html("Updated Successfully!!!");
   				$('.updateaddress').fadeOut(2000);	
   					}
   
   				}		
   				});		
   		}
   	});
   
   });//document ready
   
   $(document).ready(function(){
   	$('#cancel_city').click(function()
   	{
   		$('#city_div').hide();
   	});
   
   	$('#update_city').click(function()
   	{
   		var cityid=$("#selectcity1 option:selected").val();
   		var countryid=$("#selectcountry1 option:selected").val();
   		var passdata ='cityid='+cityid+"&countryid="+countryid;
   
   		$.ajax( {
   			type: 'get',
   			data: passdata,
   			url: '<?php echo url('update_city_ajax'); ?>',
   			success: function(responseText)
   			{  
   
   				var result=responseText.split(",");
   				if(result[0]=="success")
   				{ 	
   
   				$('#error_name').show();
   				$('#error_name').html('<?php if (Lang::has(Session::get('lang_file').'.CITY_AND_COUNTRY_CHANGED_SUCCESSFULLY')!= '') { echo  trans(Session::get('lang_file').'.CITY_AND_COUNTRY_CHANGED_SUCCESSFULLY');}  else { echo trans($OUR_LANGUAGE.'.CITY_AND_COUNTRY_CHANGED_SUCCESSFULLY');} ?>');
   				$('#error_name').fadeOut(3000);	
   				$('#cuscountry').html(result[1]);
   				$('#cuscity').html(result[2]);
   				$('.city-con').html("Updated Successfully!!!");
   				$('.city-con').fadeOut(2000);	
   				$('#city_div').hide(); 
   				$('#country_div').hide();
   
   				}
   
   			}		
   			});		
   
   	});
   
   });//document ready
   
   $(document).ready(function(){
   	<?php if($hasship==1){if($customer_info->ship_ci_id!=""){?>
   	var passcityid = 'id='+<?php echo $customer_info->ship_ci_id;?>;
    
   	$.ajax( {
   		type: 'get',
   		data: passcityid,
   		url: '<?php echo url('register_getcity_shipping'); ?>',
   		success: function(responseText)
   		{  
   	  
   			if(responseText)
   	 		{ 	 
   		// 	alert(responseText);
   			// $('#country_div').show();
   			//$('#shippingcity').html(responseText);					   
   			}
   		}		
   		});		
   <?php } } ?>
   
   
   $('#shipcusmobile').keydown(function (e) 
   {
   	if (e.shiftKey || e.ctrlKey || e.altKey) 
   	{
   		e.preventDefault();
   	} 
   	else 
   	{
   		var key = e.keyCode;
   		if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 
   		{
   		e.preventDefault();
   		}
   	}
   });
   
   $('#zipcode').keydown(function (e) 
   {
   	if (e.shiftKey || e.ctrlKey || e.altKey) 
   	{
   		e.preventDefault();
   	} 
   	else 
   	{
   		var key = e.keyCode;
   		if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 
   		{
   		e.preventDefault();
   		}
   	}
   });
   	 
   	 $('#shippingcusname').bind('keyup blur',function(){ 
   		var node = $(this);
   		node.val(node.val().replace(/[^a-z 0-9 A-Z_-]/,'') ); }
   	);
   	
   	$('#shipaddr1').bind('keyup blur',function(){ 
   		var node = $(this);
   		node.val(node.val().replace(/[^a-z 0-9 A-Z_-]/,'') ); }
   	);
   	
   	$('#shipaddr2').bind('keyup blur',function(){ 
   		var node = $(this);
   		node.val(node.val().replace(/[^a-z 0-9 A-Z_-]/,'') ); }
   	);
     
          $('#shippingstate').bind('keyup blur',function(){ 
   		var node = $(this);
   		node.val(node.val().replace(/[^a-z  A-Z_-]/,'') ); }
   	);
   	//reset for shipping address
   	
   	
   	
   	$('#update_shippinginfo').click(function()
   	{
   		
   		var citysel=$("#shippingcity  option:selected").val();
   		var countrysel = $("#shippingcountry option:selected").val();
   		if($('#shippingcusname').val()=="")
   		{	
   			$('#shippingcusname').focus();
   			return false;
   		}
   		else if($('#shipaddr1').val()=="")
   		{
   			$('#shipaddr1').focus();
   			return false;
   		}
   		else if($('#shipaddr2').val()=="")
   		{
   			$('#shipaddr2').focus();
   			return false;
   		}
   		else if($('#shipcusmobile').val()=="")
   		{	
   			$('#shipcusmobile').focus();
   			return false;
   		}
   		else if($('#shipcusemail').val()=="")
   		{	
   			$('#shipcusemail').focus();
   			return false;
   		}
   		else if($('#shipcusmobile').val().length<8)
   		{	
   			$('#shiperror_name').show();
   			$('#shiperror_name').html('<?php if (Lang::has(Session::get('lang_file').'.PLEASE_PROVIDE_VALID_PHONE_NUMBER')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_PROVIDE_VALID_PHONE_NUMBER');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_PROVIDE_VALID_PHONE_NUMBER');} ?>');
   			$('#shiperror_name').fadeOut(3000);	
   			$('#shipcusmobile').focus();
   			return false;
   		}
   		else if(countrysel==0)
   		{
   			alert("Select your country");
   			//$('#shippingcountry').focus();
   			return false;
   		}
   		else if(citysel==0)
   		{
   			alert("Select your city");
   			//$('#shippingcity').focus();
   			return false;
   		}
   		
   		else if($('#shippingstate').val()=="")
   		{
   			$('#shippingstate').focus();
   			return false;
   		}
   		else if($('#zipcode').val()=="")
   		{
   			$('#zipcode').focus();
   			return false;
   		}
   		
   		 if($('#shipcusemail').val()!="")
   		{	
   			var shipcusemail= $('#shipcusemail').val();
   			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   				 if(!regex.test(shipcusemail)){
   				 	$('#shipcusemail').focus();
   				 	$('#shipcusemail_error').html("Invalid Email");
   				setTimeout(function(){$('#shipcusemail_error').hide();},3000); //Timeout for error message
   				 	 return false;
   				 	}
   
   		else
   		{
   			var shipcus= $('#shippingcusname').val(); 
   			var shipaddr1=$('#shipaddr1').val(); 
   			var shipaddr2=$('#shipaddr2').val(); 
   			var shipcusmobile= $('#shipcusmobile').val();
   			var shipcusemail= $('#shipcusemail').val();  
   			var shippingstate=$('#shippingstate').val(); 
   			var zipcode=$('#zipcode').val(); 
   			var cityid=$("#shippingcity option:selected").val();
   			var countryid=$("#shippingcountry option:selected").val();
   
   			var passdata = 'shipcus='+shipcus+"&shipaddr1="+shipaddr1+"&shipaddr2="+shipaddr2+"&shipcusmobile="+shipcusmobile+"&shipcusemail="+shipcusemail+"&shippingstate="+shippingstate+"&zipcode="+zipcode+"&shippingcity="+cityid+"&shippingcountry="+countryid;
   
   			$.ajax( {
   				type: 'get',
   				data: passdata,
   				url: '<?php echo url('update_shipping_ajax'); ?>',
   				success: function(responseText)
   				{  
   				    //var result=responseText.split(",");
   					if(responseText=="success")
   					{ 	
   					$('#shiperror_name').show();
   					$('#shiperror_name').html('<?php if (Lang::has(Session::get('lang_file').'.SHIPPING_DETAILS_UPDATED_SUCCESSFULLY')!= '') { echo  trans(Session::get('lang_file').'.SHIPPING_DETAILS_UPDATED_SUCCESSFULLY');}  else { echo trans($OUR_LANGUAGE.'.SHIPPING_DETAILS_UPDATED_SUCCESSFULLY');} ?>');
   					$('#shiperror_name').fadeOut(3000);	
   					$('#password_div').hide(); 
   						alert('Updated Successfully');
   					}else{
   						alert('No datas are Updated');
   					}
   				}		
   				});		
   		} }
   	});
   });//document ready
   
   
    //for cancel validate
   function cancel_validate(id){
	var cancel_id = $(".cancel_notes_"+id).val();
	if(cancel_id == ''){
		alert("Enter a reason for cancel");
		return false;
		}
	}
	
	//for return validate
	function return_validate(id){
	var cancel_id = $(".return_notes_"+id).val();
	if(cancel_id == ''){
		alert("Enter a reason for return");
		return false;
		}
	}
	
	//for replace validate
	function replace_validate(id){
	var cancel_id = $(".replace_notes_"+id).val();
	if(cancel_id == ''){
		alert("Enter a reason for replace");
		return false;
		}
	}
   
   
    function cancel_dealvalidate(id){
	var cancel_id = $(".cancel_dealnotes_"+id).val();
	if(cancel_id == ''){
		alert("Enter a reason for cancel");
		return false;
		}
	}
	
	//for return validate
	function return_dealvalidate(id){
	var cancel_id = $(".return_dealnotes_"+id).val();
	if(cancel_id == ''){
		alert("Enter a reason for return");
		return false;
		}
	}
	
	//for replace validate
	function replace_dealvalidate(id){
	var cancel_id = $(".replace_dealnotes_"+id).val();
	if(cancel_id == ''){
		alert("Enter a reason for replace");
		return false;
		}
	}
   
   
   
   $(document).ready(function(){
   
   	$('#cancel_country').click(function()
   	{
   		$('#country_div').hide();
   	});
   
   	$('#update_country').click(function()
   	{
   		$('#error_name').show();
   		$('#error_name').html('<?php if (Lang::has(Session::get('lang_file').'.COUNTRY_CHANGED_SUCCESSFULLY')!= '') { echo  trans(Session::get('lang_file').'.COUNTRY_CHANGED_SUCCESSFULLY');}  else { echo trans($OUR_LANGUAGE.'.COUNTRY_CHANGED_SUCCESSFULLY');} ?>');
   		$('#error_name').fadeOut(3000);	
   		$('#city_div').hide(); 
   		$('#country_div').hide();
   	});
   	
   /* 	$(".conform_cancel").click(function(e)
   	{
   		var reg =/<(.|\n)*?>/g; 
   
   	if (reg.test($(".cancel_notes").val()) != '') {
   
   		alert("HTML tags are not accepted");
   
   		}
   	else if(($(".cancel_notes").val()) == '')	
   	{
   		alert("Enter a reason for cancel");
   	}
   				
   	});
   	
   	$(".return_conform").click(function(e)
   	{
   		var reg =/<(.|\n)*?>/g; 
   
   	if (reg.test($(".return_notes").val()) != '') {
   
   		alert("HTML tags are not accepted");
   
   		}
   	else if(($(".return_notes").val()) == '')	
   	{
   		alert("Enter a reason for return");
   	}
   				
   	});
   	
   	$(".replace_conform").click(function(e)
   	{
   		var reg =/<(.|\n)*?>/g; 
   
   	if (reg.test($(".replace_notes").val()) != '') {
   
   		alert("HTML tags are not accepted");
   
   		}
   	else if(($(".replace_notes").val()) == '')	
   	{
   		alert("Enter a reason for return");
   	}
   				
   	}); */
   
   });//document ready
   
   $(document).ready(function(){
   
   	$('#toggleDiv').click(function()
   	{
   	$('#username_div').toggle();
   	});
   
   });
   
   $(document).ready(function(){
   
   	$('#toggleDiv1').click(function()
   	{
   	$('#password_div').toggle();
   	});
   
   });
   
   $(document).ready(function(){
   	$('#toggleDiv2').click(function()
   	{
   	$('#phonenumber_div').toggle();
   	});
   });
   $(document).ready(function(){
   	$('#toggleDiv3').click(function()
   	{
   	$('#address_div').toggle();
   	});
   });
   $(document).ready(function(){
   	$('#toggleDiv4').click(function(){
   	
   	$('#city_div').toggle();
   	});
   });
   $(document).ready(function(){
   
   	$('#toggleDiv5').click(function()
   	{
   	$('#country_div').toggle();
   	});
   });
   $(document).ready(function(){
   	$('#toggleDiv7').click(function()
   	{
   	$('#MyDiv7').toggle();
   	});
   
   });
   
   $(document).ready(function(){
   	$(".cancel_notes").bind('keyup blur',function(){ 
   		var node = $(this);
   		node.val(node.val().replace(/[^a-z 0-9 A-Z_ - , .]/,'') ); 
   		});
   		
   		$(".return_notes").bind('keyup blur',function(){ 
   		var node = $(this);
   		node.val(node.val().replace(/[^a-z 0-9 A-Z_ - , .]/,'') ); 
   		});
   	
   	$(".replace_notes").bind('keyup blur',function(){ 
   		var node = $(this);
   		node.val(node.val().replace(/[^a-z 0-9 A-Z_ - , .]/,'') ); 
   		});
   
   });
   
</script>
<script type="text/javascript">
   $.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
   
   $(document).on('click','.modal-backdrop', function () {
   $('.modal-backdrop').remove();
   });
</script>  
</body>
</html>
<?php 
   /* Pagination trial */
   
    /* ?>
<script>
   var pagenumber=$("#page_number").val();
   $(window).scroll(function(){ 
   	if($(window).scrollTop()+$(window).height() >= $(document).height())	{
   		pagenumber++; 
   		$("#page_number").val(pagenumber);
   		var passdata = 'pagenumber='+pagenumber;
   
   $.ajax({ 
   	url:'<?php echo url('user_profile_cod');?>',
   	type: 'get',
   	data: passdata,
   	success:function(data,status){
   		//alert(data);
   		
   		$('#two').append(data);
   
   
   	}
   });
   }
   });
</script>
<?php */ ?>