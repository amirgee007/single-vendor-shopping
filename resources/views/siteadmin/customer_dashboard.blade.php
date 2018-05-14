<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER_DASHBOARD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CUSTOMER_DASHBOARD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER_DASHBOARD');} ?> </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/main.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/theme.css" />
	<link rel="stylesheet" href="{{  url('') }}/public/assets/css/plan.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
     @php
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp
     @if(count($favi)>0)  
        @foreach($favi as $fav) @endforeach
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/{{ $fav->imgs_name }}">
 	@endif
    <link href="{{ url('') }}/public/assets/css/datepicker.css" rel="stylesheet">	
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<link href="<{{ url('') }}/public/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/timeline/timeline.css" />

 <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jquery.min.js"></script>

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
                            	<li class=""><a>@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }} @endif</a></li>
                                <li class="active"><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CUSTOMERS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMERS') }} @endif</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-dashboard"></i></div>
            <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER_DASHBOARD')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CUSTOMER_DASHBOARD') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER_DASHBOARD') }} @endif</h5>
            
        </header>
        <br>
	<div class="">
                    <div class="col-lg-12">
                 <a style="color:#fff" href="{{ url('') }}" class="btn btn-success btn-sm btn-grad" target="_blank" >@if (Lang::has(Session::get('admin_lang_file').'.BACK_GO_TO_LIVE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_GO_TO_LIVE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_GO_TO_LIVE') }} @endif</a>
                
                </div>
                </div>
                
            
        
        
      			  <div class="row">
                <div class="col-lg-6" style="padding:30px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>@if (Lang::has(Session::get('admin_lang_file').'.BACK_TOTAL_CUSTOMERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TOTAL_CUSTOMERS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TOTAL_CUSTOMERS') }} @endif</strong> 
                            <a href="#"><i class="icon icon-align-justify pull-right"></i></a>
                        </div>
                        <div class="panel-body">
                            @if(($website_users+$fb_users+$admin_user+$gplus_users)>0)
                           <div id="chart6" style="margin-top:20px; margin-left:20px; width:450px; height:450px;"></div>
                           <div class="table-responsive">
                            <table width="70%" border="0">
                              <tr>
                                
                                <td style="background:#eaa228">
                                    <label class="label label-archive">@if (Lang::has(Session::get('admin_lang_file').'.BACK_WEBSITE_USER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_WEBSITE_USER') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_WEBSITE_USER') }} @endif</label>
                                    <span class="label label-danger">{{ $website_users }}</span>
                                </td>
                                <td style="background:#4bb2c5"> 
                                    <label class="label label-archive">@if (Lang::has(Session::get('admin_lang_file').'.BACK_FACEBOOK_USER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_FACEBOOK_USER') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_FACEBOOK_USER') }} @endif</label>
                                    <span class="label label-danger">{{ $fb_users }}</span>
                                </td>
                                
                                <td style="background:#C5B47F">
                                    <label class="label label-active">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_USER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADMIN_USER') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_USER') }} @endif</label>
                                    <span class="label label-danger">{{ $admin_user }}</span>
                                </td>  
								<td style="background:#579575">
                                    <label class="label label-archive">@if (Lang::has(Session::get('admin_lang_file').'.BACK_GOOGLEPLUS_USER')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_GOOGLEPLUS_USER') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_GOOGLEPLUS_USER') }} @endif</label>
                                    <span class="label label-danger">{{ $gplus_users }}</span>
                                    
                                </td>
                              </tr>
                            </table>
                            </div>
                            @else
                                No Details Found.
                            @endif    
                        </div>
                       
                        	

                        
                    </div>
                </div>
                <div class="col-lg-5 " style="padding-top:30px"> 
                    <div class="panel panel-default">
                        <div class="panel-heading">	
                            <strong>@if (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CUSTOMER_DETAILS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER_DETAILS') }} @endif</strong>
                            
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="" width="100%">
                                    
                                    <tbody>
                                        <tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_WEBSITE_CUSTOMER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_WEBSITE_CUSTOMER') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_WEBSITE_CUSTOMER') }} @endif </td>
                                            <td>{{ $website_users }}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" <?php echo 'style="width:'.$website_users.'%"'; ?>> 
		  <span class="sr-only">60% @if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_COMPLETE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE') }} @endif</span>
		</div>
	      </div></td>
                                            
                                            
                                        </tr>
                                        <tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_CUSTOMERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADMIN_CUSTOMERS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_CUSTOMERS') }} @endif</td>
                                            <td><?php echo $admin_user; ?></td>
                                            
                                        </tr>
                                         <tr>
                                           <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" <?php echo 'style="width:'.$admin_user.'%"'; ?>;> 
		  <span class="sr-only">60% @if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_COMPLETE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE') }} @endif</span>
		</div>
	      </div></td>
                                                         
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_FACEBOOK_CUSTOMERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_FACEBOOK_CUSTOMERS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_FACEBOOK_CUSTOMERS') }} @endif</td>
                                            <td>{{ $fb_users }}</td>
                                            
                                        </tr>
										<tr>
											<td colspan="2">
												<div class="progress progress-striped active">
													<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"  <?php echo 'style="width:'.$fb_users.'%"'; ?>;>
														<span class="sr-only">40% @if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') {{  	trans(Session::get('admin_lang_file').'.BACK_COMPLETE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE') }} @endif ( @if (Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SUCCESS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS') }} @endif )</span>
													</div>
												</div>
											</td>  
										</tr>
										<!-- GOOLGE PLUS USERS -->
										<tr>
											<td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_GPLUS_CUSTOMERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_GPLUS_CUSTOMERS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_GPLUS_CUSTOMERS') }} @endif</td>
											<td>{{ $gplus_users }}</td>
										</tr>
										
										<tr>
											<td colspan="2">
												<div class="progress progress-striped active">
													<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"  <?php echo 'style="width:'.$gplus_users.'%"'; ?>;>
														<span class="sr-only">40% @if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_COMPLETE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE') }} @endif ( @if (Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SUCCESS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS') }} @endif )</span>
													</div>
												</div>
											</td>  
										</tr>
										<!-- GOOGLE PLUS USERS -->
										<tr>
											<td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_TOTAL_CUSTOMERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TOTAL_CUSTOMERS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TOTAL_CUSTOMERS') }} @endif</td>
											<td>{{ $totalcus=$website_users+$admin_user+$fb_users }}</td>

										</tr>
										
                                         <tr>
                                           <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" <?php echo 'style="width:'.$totalcus.'%"'; ?>;> 
		  <span class="sr-only">60% @if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_COMPLETE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE') }} @endif</span>
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
                            <strong>@if (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER_LOGIN_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CUSTOMER_LOGIN_DETAILS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER_LOGIN_DETAILS') }} @endif</strong>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>@if (Lang::has(Session::get('admin_lang_file').'.BACK_WEBSITE_CUSTOMERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_WEBSITE_CUSTOMERS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_WEBSITE_CUSTOMERS') }} @endif</th>
                                            <th>@if (Lang::has(Session::get('admin_lang_file').'.BACK_COUNT')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_COUNT') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNT') }} @endif</th>
					</tr>
                                    </thead>
                                    <tbody>
					 <tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_TODAY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TODAY') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TODAY') }} @endif</td>
                                            <td>{{ $logintoday[0]->count }}</td>
                                           
                                            
                                        </tr>
                                        <tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_LAST')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_LAST') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST') }} @endif 7 @if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS') }} @endif</td>
                                            <td>{{ $login7days[0]->count }}</td>
                                           
                                            
                                        </tr>
                                        <tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_LAST')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_LAST') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST') }} @endif 30 @if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS') }} @endif</td>
                                            <td>{{ $login30days[0]->count }}</td>
                                           
                                            
                                        </tr>
                                        <tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_LAST')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_LAST') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST') }} @endif 12 @if (Lang::has(Session::get('admin_lang_file').'.BACK_MONTHS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_MONTHS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MONTHS') }} @endif </td>
                                            <td>{{ $login12mnth[0]->count }}</td>
                                           
                                            
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
                    
                    
                    <div class="row">
                    	<div class="col-lg-12">
                         <div class="panel panel-default">
                            <div class="panel-heading">
                               <strong>@if (Lang::has(Session::get('admin_lang_file').'.BACK_STATISTICS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_STATISTICS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_STATISTICS') }} @endif</strong> 
                            </div>
                             
                            <div class="panel-body">
                              <ul class="nav nav-pills">
                                <li class="active"><a href="#home-pills" data-toggle="tab">@if (Lang::has(Session::get('admin_lang_file').'.BACK_LAST_ONE_YEAR_WEB_CUST')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_LAST_ONE_YEAR_WEB_CUST') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST_ONE_YEAR_WEB_CUST') }} @endif</a>
                                </li>
                              </ul>
                            
                            <div class="tab-content">
                                @if($ordermnth_count!='0,0,0,0,0,0,0,0,0,0,0,0')
                              <div id="chart1" style="margin-top:20px; margin-left:20px; width:950px; height:470px;"></div>
                              @else
                                No Transaction Found.
                              @endif
                                                               
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
  
    <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
    @if(($fb_users+$website_users+$admin_user))
    <script>
	$(document).ready(function(){
		
	plot6 = $.jqplot('chart6', [[{{ $fb_users }},{{ $website_users }},{{ $admin_user }},{{ $gplus_users }} ]], {seriesDefaults:{renderer:$.jqplot.PieRenderer } });
		});
	</script>
    @endif
    @if($ordermnth_count!='0,0,0,0,0,0,0,0,0,0,0,0')
    <script class="code" type="text/javascript">$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
		
		<?php $s1 = "[" .$ordermnth_count. "]"; ?>
        var s1 = <?php echo $s1; ?>;
        var ticks = ['<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_JANUARY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_JANUARY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_JANUARY');} ?>', '<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_FEBRUARY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_FEBRUARY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_FEBRUARY');} ?>', '<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MARCH')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MARCH');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MARCH');} ?>', '<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_APRIL')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_APRIL');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_APRIL');} ?>', '<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MAY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MAY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MAY');} ?>','<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_JUNE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_JUNE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_JUNE');} ?>', '<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_JULY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_JULY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_JULY');} ?>', '<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_AUGUST')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_AUGUST');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_AUGUST');} ?>', '<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SEPTEMBER')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SEPTEMBER');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SEPTEMBER');} ?>', '<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_OCTOBER')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_OCTOBER');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_OCTOBER');} ?>', '<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NOVEMBER')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NOVEMBER');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NOVEMBER');} ?>', '<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DECEMBER')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DECEMBER');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DECEMBER');} ?>'];
        
        plot1 = $.jqplot('chart1', [s1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: false }
        });
    
        $('#chart1').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });</script>
    
	@endif
	<script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
	</script>

    <!--- Chart Plugins -->
      <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jquery.jqplot.min.js"></script>
  <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jqplot.barRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jqplot.pieRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jqplot.categoryAxisRenderer.min.js"></script>
  <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jqplot.pointLabels.min.js"></script>
    
    <!-- -->
    


<script src="{{ url('') }}/public/assets/js/jquery-ui.min.js"></script>
<script src="{{ url('') }}/public/assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="{{ url('') }}/public/assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="{{ url('') }}/public/assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="{{ url('') }}/public/assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="{{ url('') }}/public/assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="{{ url('') }}/public/assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="{{ url('') }}/public/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="{{ url('') }}/public/assets/plugins/daterangepicker/moment.min.js"></script>
<script src="{{ url('') }}/public/assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>



<script src="{{ url('') }}/public/assets/plugins/autosize/jquery.autosize.min.js"></script>

       <script src="{{ url('') }}/public/assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
        </script>

        
    
	<script src="{{ url('') }}/public/assets/plugins/flot/jquery.flot.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/flot/jquery.flot.resize.js"></script>
    <script  src="{{ url('') }}/public/assets/plugins/flot/jquery.flot.categories.js"></script>
    <script  src="{{ url('') }}/public/assets/plugins/flot/jquery.flot.errorbars.js"></script>
	<script  src="{{ url('') }}/public/assets/plugins/flot/jquery.flot.navigate.js"></script>
    <script  src="{{ url('') }}/public/assets/plugins/flot/jquery.flot.stack.js"></script>    
    <script src="{{ url('') }}/public/assets/js/bar_chart.js"></script>
        
     
</body>
     <!-- END BODY -->
</html>
