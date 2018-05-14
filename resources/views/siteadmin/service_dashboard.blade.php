<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_DASHBOARD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_DASHBOARD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_DASHBOARD');} ?> </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/css/theme.css" />
	<link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/css/plan.css" />
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); if(count($favi)>0) { foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
<?php } ?>	
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="<?php echo url(''); ?>/public/assets/css/datepicker.css" rel="stylesheet">	
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<link href="<?php echo url(''); ?>/public/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo url(''); ?>/public/assets/plugins/timeline/timeline.css" />

 <script class="include" type="text/javascript" src="<?php echo url(''); ?>/public/assets/js/chart/jquery.min.js"></script>

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
                                <li class="active"><a ><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE');} ?></a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-dashboard"></i></div>
            <h5><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_DASHBOARD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_DASHBOARD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_DASHBOARD');} ?></h5>
            
        </header>
        
<?php
 /*$sold_cnt=0;
 foreach($sold_details as $soldres){
	if($soldres->pro_no_of_purchase	>=$soldres->pro_qty){
		$sold_cnt++;
	}
}*/
?>
        
        	
           
            	
                
            
        
        
        <div class="row">
                <div class="col-lg-6" style="padding:30px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_TOTAL_SERVICE_COUNT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_TOTAL_SERVICE_COUNT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_TOTAL_SERVICE_COUNT');} ?></strong> 
                            <a href="#"><i class="icon icon-align-justify pull-right"></i></a>
                        </div>
                        <div class="panel-body">
                           <div id="chart6" style="margin-top:20px; margin-left:20px; width:450px; height:450px;"></div>
                           <table width="30%" border="0">
                              <tbody><tr>
                                <td style="background:#4bb2c5"><label class="label label-active"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ACTIVE_SERVICE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ACTIVE_SERVICE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIVE_SERVICE');} ?></label></td>
                                <td style="background:#eaa228"><label class="label label-archive"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_INACTIVE_SERVICE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_INACTIVE_SERVICE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_INACTIVE_SERVICE');} ?></label></td>
                                 
                                                              
                              </tr>
                            </tbody></table>
                        </div>
                       
                        	

                        
                    </div>
                </div>
                <div class="col-lg-5 " style="padding-top:30px"> 
                    <div class="panel panel-default">
                        <div class="panel-heading">	
                            <strong><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MARKET_RESPONSE_RATE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MARKET_RESPONSE_RATE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MARKET_RESPONSE_RATE');} ?></strong>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="" width="100%">
                                    
                                    <tbody>
                                        <tr>
                                            <td><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_TOTAL_SERVICE_COUNT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_TOTAL_SERVICE_COUNT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_TOTAL_SERVICE_COUNT');} ?></td>
                                            <td><?php echo $tot_pro=  $active_count+$blocked_cnt; ?></td>
                           </tr>
                                        <tr>
                                            <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" <?php echo 'style="width:'.$tot_pro.'%"'; ?>;> 
		  <span class="sr-only">60% <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_COMPLETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE');} ?></span>
		</div>
	      </div></td>
                                        </tr>
                                        <tr>
                                            <td><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ACTIVE_SERVICE_COUNT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ACTIVE_SERVICE_COUNT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIVE_SERVICE_COUNT');} ?></td>
                                            <td>
                                              <?php
												
										    	echo $active_count; 
										      ?>
                                            </td>
                                        </tr>
                                         <tr>
                                           <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" <?php echo 'style="width:'.$active_count.'%"'; ?>;> 
		  <span class="sr-only">60% <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_COMPLETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE');} ?></span>
		</div>
	      </div></td>
                                                                                       
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_INACTIVE_SERVICE_COUNT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_INACTIVE_SERVICE_COUNT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_INACTIVE_SERVICE_COUNT');} ?></td>
                                            <td><?php echo $blocked_cnt; ?></td>
                                            
                                        </tr>
                                         <tr>
                                             <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"  <?php echo 'style="width:'.$blocked_cnt.'%"'; ?>;>
		  <span class="sr-only">40% <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_COMPLETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE');} ?> ( <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_COMPLETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE');} ?> ( <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SUCCESS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS');} ?> )</span>
		</div>
	      </div></td>
                                            
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5"  style="padding-left:12px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TRANSACTION_DETAILS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TRANSACTION_DETAILS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TRANSACTION_DETAILS');} ?></strong>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTIONS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_TRANSACTIONS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTIONS');} ?></th>
                                            <th><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_COUNT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_COUNT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNT');} ?></th>
                                            <th><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_AMOUNT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT');} ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                            <td><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_TODAY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_TODAY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_TODAY');} ?></td>
                                            <td>0<?php //echo $producttdy[0]->count;?></td>
                                            <td>0<?php //if($producttdy[0]->amt){echo "$".$producttdy[0]->amt;}else{echo "-";}?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_LAST')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_LAST');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST');} ?> 7 <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DAYS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS');} ?></td>
                                            <td>0<?php //echo $product7days[0]->count;?></td>
                                            <td>0<?php //if($product7days[0]->amt){echo "$".$product7days[0]->amt;}else{echo "-";}?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_LAST')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_LAST');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST');} ?> 30 <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DAYS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS');} ?> </td>
                                            <td>0<?php //echo $product30days[0]->count;?></td>
                                            <td>0<?php //if($product30days[0]->amt){echo "$".$product30days[0]->amt;}else{echo "-";}?></td>
                                            
                                        </tr>
                                      
                                    </tbody>
                                </table>
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
                    
                    
                    

                </div>
            <!--END PAGE CONTENT -->
 
        </div>
   
     <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
   {!! $adminfooter !!}
    <!--END FOOTER -->
    <!-- GLOBAL SCRIPTS -->
  
    <script src="<?php echo url(''); ?>/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(''); ?>/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
    <script>
	$(document).ready(function(){
		
	plot6 = $.jqplot('chart6', [[<?php echo $active_count; ?>,<?php echo $blocked_cnt; ?> ]], {seriesDefaults:{renderer:$.jqplot.PieRenderer } });
		});
	</script>
	
	<script type="text/javascript">
	   $.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	   });
	</script>
    
    

    <!--- Chart Plugins -->
      <script class="include" type="text/javascript" src="<?php echo url(''); ?>/public/assets/js/chart/jquery.jqplot.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo url(''); ?>/public/assets/js/chart/jqplot.barRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo url(''); ?>/public/assets/js/chart/jqplot.pieRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo url(''); ?>/public/assets/js/chart/jqplot.categoryAxisRenderer.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo url(''); ?>/public/assets/js/chart/jqplot.pointLabels.min.js"></script>
    
    <!--- --->
    


<script src="<?php echo url(''); ?>/public/assets/js/jquery-ui.min.js"></script>
<script src="<?php echo url(''); ?>/public/assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="<?php echo url(''); ?>/public/assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php echo url(''); ?>/public/assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="<?php echo url(''); ?>/public/assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo url(''); ?>/public/assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="<?php echo url(''); ?>/public/assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="<?php echo url(''); ?>/public/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo url(''); ?>/public/assets/plugins/daterangepicker/moment.min.js"></script>
<script src="<?php echo url(''); ?>/public/assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>



<script src="<?php echo url(''); ?>/public/assets/plugins/autosize/jquery.autosize.min.js"></script>

       <script src="<?php echo url(''); ?>/public/assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
        </script>
    <script  src="<?php echo url(''); ?>/public/assets/plugins/flot/jquery.flot.js"></script>
    <script  src="<?php echo url(''); ?>/public/assets/plugins/flot/jquery.flot.resize.js"></script>
    <script  src="<?php echo url(''); ?>/public/assets/plugins/flot/jquery.flot.categories.js"></script>
    <script  src="<?php echo url(''); ?>/public/assets/plugins/flot/jquery.flot.errorbars.js"></script>
	<script  src="<?php echo url(''); ?>/public/assets/plugins/flot/jquery.flot.navigate.js"></script>
    <script  src="<?php echo url(''); ?>/public/assets/plugins/flot/jquery.flot.stack.js"></script>    
    <script  src="<?php echo url(''); ?>/public/assets/js/bar_chart.js"></script>
        
     
</body>
     <!-- END BODY -->
</html>
