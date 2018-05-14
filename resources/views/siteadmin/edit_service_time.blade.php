<!DOCTYPE html>
<!--[if IE 8]> 
<html lang="en" class="ie8">
   <![endif]-->
   <!--[if IE 9]> 
   <html lang="en" class="ie9">
      <![endif]-->
      <!--[if !IE]><!--> 
      <html lang="en">
         <!--<![endif]-->
         <!-- BEGIN HEAD -->
         <head>
            <meta charset="UTF-8" />
            <title><?php echo $SITENAME; ?> | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TIME');} ?></title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport" />
            <meta content="" name="description" />
            <meta content="" name="author" />
            <meta name="_token" content="{!! csrf_token() !!}"/>
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
                              <li class=""><a ><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_HOME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME');} ?></a></li>
                              <li class="active"><a ><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TIME');} ?></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="box dark">
                              <header>
                                 <div class="icons"><i class="icon-edit"></i></div>
                                 <h5><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TIME');} ?></h5>
                              </header>
                              @if ($errors->any())
                              <div class="alert alert-warning alert-dismissable">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                 {!! implode('', $errors->all('
                                 <li>:message</li>
                                 ')) !!}
                              </div>
                              @endif
                              @if (Session::has('message'))
                              <div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('message') !!}</div>
                              @endif
							  @if (Session::has('error'))
		<div class="alert alert-success alert-dismissable">
		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{!! Session::get('error') !!}</div>	
		@endif
							  
							  
                              <div class="row">
                                 <div id="div-1" class="accordion-body collapse in body col-lg-11 panel_marg" style="padding-bottom:10px;">
                                    @foreach ($Get_Service_Time as $Service_Time) 
                                    {!! Form::open(array('url'=>'update_service_time_submit','class'=>'form-horizontal')) !!}
									
									 <div class="panel panel-default">

                                            <div class="panel-heading"> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_SERVICE_TIME');} ?> </div>
									
									
									
                                    <input type="hidden" name="id" value="<?php echo $Service_Time->service_time_id; ?>">
                                    <div class="panel-body">
														<div class="form-group">
															<label class="control-label col-lg-3" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ENTER_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_SERVICE_TIME');} ?><span class="text-sub">*</span></label>
															<div class="col-lg-2">
																
																<div id="datetimepicker1" class="date input-group">
																<input type="hidden" name="days_name[]" value="sunday">
																	<input  type="text" id="service_time" name="service_time" class="form-control" placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ENTER_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_SERVICE_TIME');} ?>" value="<?php echo $Service_Time->service_time; ?>"required></input>
																	<span class="add-on input-group-addon" id="service_time1">
																	<span class="fa fa-clock-o"></span>
																	</span>
																</div>
															</div>
													</div></div>
													
                                       <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TIME_STATUS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TIME_STATUS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TIME_STATUS');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-4">
					
					<label class="sample checkbox-inline" id="chk_radio">
						<input type="radio"  name="Service_time_status" value="1" <?php if($Service_Time->service_time_status == 1){ ?>  checked <?php } ?> required> <span><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ACTIVE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ACTIVE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIVE');} ?></span></label>
					<label class="sample checkbox-inline" id="chk_radio">	
						<input type="radio"  name="Service_time_status" value="0" <?php if($Service_Time->service_time_status == 0){ ?>  checked <?php } ?>> <span><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DEACTIVE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DEACTIVE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DEACTIVE');} ?></span></label>
						
                    </div>
                </div> </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>
                                             <div class="col-lg-4">
                                                <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_UPDATE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE');} ?></button>
                                                <a href="<?php echo url('manage_service_time');?>" class="btn btn-default btn-sm btn-grad" style="color:#000"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CANCEL');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL');} ?></a>
                                             </div>
                                          </div>
                                       </div>
                                   
									</div>
                                    @endforeach   
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
			<!--Time picker-->

				<script src="<?php echo url('')?>/public/assets/js/wickedpicker.js"></script>
				<link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/wickedpicker.css" />
				<script type="text/javascript">                                   
					$(document).ready(function(){
					$("#service_time").wickedpicker({  
							now: "<?php echo $Service_Time->service_time; ?>",
							show: null,
					        twentyFour: true              
					 }); 
					
					$("#service_time1").wickedpicker({  
							now: "<?php echo $Service_Time->service_time; ?>",
							show: null,
					        twentyFour: true              
					 });
					});
            </script>
            <script type="text/javascript">
                $.ajaxSetup({
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                });
             </script>				
            <!-- END GLOBAL SCRIPTS -->   
         </body>
         <!-- END BODY -->
      </html>