
<?php //print_r(Session::all()); exit();?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} |  {{ (Lang::has(Session::get('admin_lang_file').'.BACK_DASHBOARD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DASHBOARD') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_DASHBOARD') }}</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/main.css" />
    <link rel="stylesheet" href=" {{ url('') }}/public/assets/css/theme.css" />
    <link rel="stylesheet" href=" {{ url('') }}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
         @php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav)  @endforeach
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/{{ $fav->imgs_name }}">
@endif
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="{{ url('') }}/public/assets/css/layout2.css" rel="stylesheet" />
    <link href="{{ url('') }}/public/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="{{ url('') }}/stylesheet" href="public/assets/plugins/timeline/timeline.css" />
     <script class="include" type="text/javascript" src="{{ url('') }} /public/assets/js/chart/jquery.min.js"></script>
    <!-- END PAGE LEVEL  STYLES -->
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
    <div id="wrap" >
 <!-- HEADER SECTION -->
	{!!$adminheader!!}
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
       <div id="left" >
           

        </div>
        <!--END MENU SECTION -->
		<div class="container">
        	<div class="row">
                    

                </div>
        	
        </div>


        <!--PAGE CONTENT -->
        <div class=" container" >
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                        	<header>
                <div class="icons"><i class="icon-dashboard"></i></div>
                <h5>@if(Lang::has(Session::get('admin_lang_file').'.BACK_DASHBOARD')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_DASHBOARD') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DASHBOARD') }} @endif</h5>
            </header>
             
  @php $sold_cnt=0; @endphp
 @foreach($soldproductscnt as $soldres)
	@if($soldres->pro_no_of_purchase >= $soldres->pro_qty)
	
		@php $sold_cnt++; @endphp

	@endif
 @endforeach

            	<div class="col-lg-12">
                        <div style="text-align: center;">                   
                               
                               
                              <a class="quick-btn1 active" href="{{ url('manage_product') }}">
                                <i class="icon-check icon-2x"></i>
                                <span>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ACTIVE_PRODUCTS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_ACTIVE_PRODUCTS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIVE_PRODUCTS') }} @endif</span>
                                <span class="label label-danger">{{ $activeproductscount }}</span>
                            </a>
							<a class="quick-btn1" href="{{ url('sold_product') }}">
                                <i class="icon-check-minus icon-2x"></i>
                                <span>@if (Lang::has(Session::get('admin_lang_file').'.BACK_SOLD_PRODUCTS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_SOLD_PRODUCTS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SOLD_PRODUCTS') }} @endif</span>
                                <span class="label label-success"> {{ $sold_cnt }}</span>
                            </a> 
                            <a class="quick-btn1" href="<?php echo url('manage_deals'); ?>">
                                <i class="icon-cloud-upload icon-2x"></i>
                                <span>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ACTIVE_DEALS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_ACTIVE_DEALS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIVE_DEALS') }} @endif</span>
                                <span class="label label-warning">{{ $activedealscnt }}</span>
                            </a>
                              <a class="quick-btn1" href="<?php echo url('expired_deals'); ?>">
                                <i class="icon-external-link icon-2x"></i>
                                <span>@if (Lang::has(Session::get('admin_lang_file').'.BACK_EXPIRED_DEALS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_EXPIRED_DEALS') }}  @else {{  trans($ADMIN_OUR_LANGUAGE.'.BACK_EXPIRED_DEALS') }} @endif </span>
                                <span class="label btn-metis-2">{{  $archievddealcnt }}</span>
                            </a> 
                          
                         <?php /*   <a class="quick-btn1" href="<?php echo url('manage_auction');?>">
                                <i class="icon-search icon-2x"></i>
                                <span>Active Auction</span>
                                <span class="label btn-metis-4"><?php echo $auctioncnt;?></span>
                            </a> */ ?>
                          <?php /*    <a class="quick-btn1" href="<?php echo url('expired_auction');?>">
                                <i class="icon-thumbs-up icon-2x"></i>
                                <span>Archived Auction</span>
                                <span class="label label-default"><?php echo $archievdauction_cnt;?></span>
                            </a> */ ?>
                           <?php /*    <a class="quick-btn1" href="<?php echo url('auction_winners');?>">
                                <i class="icon-search icon-2x"></i>
                                <span>Auction Winners</span>
                                <span class="label btn-metis-4"><?php echo $actionwinnerscnt;?></span>
                            </a> */ ?>
                             
							<a class="quick-btn1" href="<?php echo url('manage_customer');?>">
                                <i class="icon-check icon-2x"></i>
                                <span>@if (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CUSTOMERS') }}  @else {{  trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMERS') }} @endif</span>
                                <span class="label label-danger">{{ $customers }}</span>
                            </a>
                            
                            
							<a class="quick-btn1" href="<?php echo url('manage_inquires');?>">
                                <i class="icon-check icon-2x"></i>
                                <span>@if (Lang::has(Session::get('admin_lang_file').'.BACK_CLIENT_ENQUIRY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CLIENT_ENQUIRY') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CLIENT_ENQUIRY') }} @endif</span>
                                <span class="label label-danger">{{ $get_enquirycnt }} </span>
                            </a>
                             
                            
                            
                        </div>
                        
                        <div style="height:30px"></div>

                    </div>
                        </div>
                    </div>
                </div>
                
                
                 <div class="row">
                    <div class="col-lg-12">
                 <button class="btn btn-success btn-sm btn-grad" style="margin-bottom:10px;"><a style="color:#fff" href="{{ url('') }}" target="_blank">@if (Lang::has(Session::get('admin_lang_file').'.BACK_GO_TO_LIVE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_GO_TO_LIVE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_GO_TO_LIVE') }} @endif</a></button>
                
                </div>
                </div>
                
				
                
                <div class="row">
                    <div class="col-lg-12">
                         <div class="panel panel-default">
                            <div class="panel-heading">
                             @if (Lang::has(Session::get('admin_lang_file').'.BACK_NEW_CUSTOMERS_MONTH_WISE')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_NEW_CUSTOMERS_MONTH_WISE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NEW_CUSTOMERS_MONTH_WISE') }} @endif
                                                      </div>
                             
                            <div class="panel-body">   
                                @if($cus_count!='0,0,0,0,0,0,0,0,0,0,0,0')
                                   
							         <div class="demo-container" id="chart1" style="width:96%; height:470px; margin-top: 20px;
margin-left: 20px;"></div>
                                @else
                                    No Customers List.
                                @endif         
							</div>
                             
		
                            </div>
                    </div>

                    
                    
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                         <div class="panel panel-default">
                            <div class="panel-heading">
                               @if (Lang::has(Session::get('admin_lang_file').'.BACK_TOTAL_CUSTOMER_AND_PRODUCT_COUNT_DEAL_COUNT')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_TOTAL_CUSTOMER_AND_PRODUCT_COUNT_DEAL_COUNT') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TOTAL_CUSTOMER_AND_PRODUCT_COUNT_DEAL_COUNT') }} @endif 
                            </div>
                             <div class=" panel-body pie-chart">
                            <div class="panel-body col-lg-4 ">
                            
			<div class="demo-container">
			@if($admin_users+$fb_users+$website_users+$gplus_users!=0)
			<div id="chart6"  style="margin-top:20px; text-align:center; margin-left:20px; width:260px; height:350px;"></div>
			 <div class="table-responsive">
            <table width="100%" border="0">
                              <tbody><tr>
                                <td style="background:#4bb2c5">
                                    <label class="label label-active">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_USER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADMIN_USER') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_USER') }} @endif</label>
                                    <span class="label label-danger">{{ $admin_users }}</span>
                                </td>
                                 <td style="background:#eaa228 ">
                                    <label class="label label-archive">@if (Lang::has(Session::get('admin_lang_file').'.BACK_FACEBOOK_USER')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_FACEBOOK_USER') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_FACEBOOK_USER') }} @endif</label>
                                    <span class="label label-danger">{{ $fb_users }}</span>
                                </td>
                                
                                <td style="background:#C5B47F">
                                    <label class="label label-archive">@if (Lang::has(Session::get('admin_lang_file').'.BACK_WEBSITE_USER')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_WEBSITE_USER') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_WEBSITE_USER') }} @endif</label>
                                    <span class="label label-danger">{{ $website_users }}</span>
                                    
                                </td>            
								<td style="background:#579575">
                                    <label class="label label-archive">@if (Lang::has(Session::get('admin_lang_file').'.BACK_GOOGLEPLUS_USER')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_GOOGLEPLUS_USER') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_GOOGLEPLUS_USER') }} @endif</label>
                                    <span class="label label-danger">{{ $gplus_users }}</span>
                                    
                                </td>								
                              </tr>
                            </tbody></table></div>
				@else 
					No Customers List.
				@endif 
		    </div>
          
		</div>
       
       <div class="panel-body col-lg-4 ">
                              
			<div class="demo-container"> 
			@if($activeproductscnt+$sold_cnt+$inactive_cnt!=0)
			<div id="chart10"  style="margin-top:20px; text-align:center; margin-left:20px; width:260px; height:350px;"></div>
			 <div class="table-responsive">
            <table width="100%" border="0">
                              <tbody><tr>
                                <td style="background:#4bb2c5">
                                    <label class="label label-active">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ACTIVE_PRODUCTS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_ACTIVE_PRODUCTS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIVE_PRODUCTS') }}  @endif</label>
                                    <span class="label label-danger">{{ $activeproductscnt }}</span>
                                </td>
                                <td style="background:#eaa228">
                                <label class="label label-archive">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SOLD_PRODUCTS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_SOLD_PRODUCTS') }}   @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SOLD_PRODUCTS') }} @endif</label>
                                <span class="label label-danger">{{ $sold_cnt }}</span>
                                </td>
                                <td style="background:#C5B47F">
                                <label class="label label-archive">@if (Lang::has(Session::get('admin_lang_file').'.BACK_INACTIVE_PRODUCTS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_INACTIVE_PRODUCTS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_INACTIVE_PRODUCTST') }}  @endif</label>
                                <span class="label label-danger">{{ $inactive_cnt }}</span>
                                </td>
                                 
                                                              
                              </tr>
                            </tbody></table> </div> 
				@else 
					No Product List.
				@endif 
		    </div>
          
		</div>
		
		<div class="panel-body col-lg-4 ">
                              
			<div class="demo-container">
			@if($active_cnt+$archievd_cnt+$inactivedeal_cnt!=0)
			<div id="chart11"  style="margin-top:20px; text-align:center; margin-left:20px; width:260px; height:350px;"></div>
			      <div class="table-responsive">
            <table width="100%" border="0">
                              <tbody><tr>
                                <td style="background:#4bb2c5">
                                    <label class="label label-active">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ACTIVE_DEALS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ACTIVE_DEALS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIVE_DEALS') }} @endif</label>
                                    <span class="label label-danger">{{ $active_cnt }}</span>
                                </td>
                                <td style="background:#eaa228">
                                <label class="label label-archive">@if (Lang::has(Session::get('admin_lang_file').'.BACK_EXPIRED_DEALS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_EXPIRED_DEALS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EXPIRED_DEALS') }} @endif</label>
                                <span class="label label-danger">{{ $archievd_cnt }}</span>
                                </td>
                                <td style="background:#C5B47F">
                                    <label class="label label-archive">@if (Lang::has(Session::get('admin_lang_file').'.BACK_INACTIVE_DEALS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_INACTIVE_DEALS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_INACTIVE_DEALS') }} @endif</label>
                                     <span class="label label-danger">{{ $inactivedeal_cnt }}</span>
                                </td> 
                                                              
                              </tr>
                            </tbody></table> </div>
				@else 
					No Deal List.
				@endif 
		    </div>
          
		</div>
                             
		</div>
                            </div>
                    </div>

                    
                     <!--<div class="col-lg-4">

                        <div class="chat-panel panel panel-primary">
                            <div class="panel-heading">
                                <i class="icon-comments"></i>
                                Chat
                            <div class="btn-group pull-right">
                                <button type="button" data-toggle="dropdown">
                                    <i class="icon-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="icon-refresh"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class=" icon-comment"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-time"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-tint"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-signout"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                            <div class="panel-body">
                                <ul class="chat">
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="public/assets/img/1.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"> Jack Sparrow </strong>
                                                <small class="pull-right text-muted">
                                                    <i class="icon-time"></i> 12 mins ago
                                                </small>
                                            </div>
                                             <br />
                                            <p>
                                                Lorem ipsum dolor sit amet, bibendum ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="public/assets/img/2.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <small class=" text-muted">
                                                    <i class="icon-time"></i> 13 mins ago</small>
                                                <strong class="pull-right primary-font"> Jhony Deen</strong>
                                            </div>
                                            <br />
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur a dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="public/assets/img/3.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"> Jack Sparrow </strong>
                                                <small class="pull-right text-muted">
                                                    <i class="icon-time"></i> 12 mins ago
                                                </small>
                                            </div>
                                             <br />
                                            <p>
                                                Lorem ipsum dolor sit amet, bibendum ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="public/assets/img/4.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <small class=" text-muted">
                                                    <i class="icon-time"></i> 13 mins ago</small>
                                                <strong class="pull-right primary-font"> Jhony Deen</strong>
                                            </div>
                                            <br />
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur a dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="panel-footer">
                                <div class="input-group">
                                    <input id="Text1" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                    <span class="input-group-btn">
                                        <button class="btn btn-success btn-sm" id="Button1">
                                            Send
                                        </button>
                                    </span>
                                </div>
                            </div>

                        </div>


                    </div>-->
                </div>
                 
                 <div class="row">
                    <div class="col-lg-12">
                         <div class="panel panel-default">
                                <div class="panel-heading">
                                   @if (Lang::has(Session::get('admin_lang_file').'.BACK_LAST_ONE_YEAR_TRANSACTIONS_REPORT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_LAST_ONE_YEAR_TRANSACTIONS_REPORT') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST_ONE_YEAR_TRANSACTIONS_REPORT') }} @endif
                                </div>
                             
                            <div class="panel-body">
                                   @if($transaction_chart!='0,0,0,0,0,0,0,0,0,0,0,0') 
								  <div class="demo-container" id="chart5" style="margin-top:20px; margin-left:20px; width:950px; height:470px;"></div>
                                  @else
                                    No Transactions	to list.
                                  @endif  
								</div>
                             
		
                            </div>
                    </div>

                    
                   
                </div>
                 
                          
              

                
            </div>

        </div>
       
    </div>

    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    {!! $adminfooter !!}
    <!--END FOOTER -->
    @if(($admin_users+$fb_users+$website_users+$gplus_users)>0)
    <script>
	 $(document).ready(function(){
		
	 plot6 = $.jqplot('chart6', [[{{ $admin_users }},{{ $fb_users }},{{ $website_users }}, {{ $gplus_users }} ]], { seriesDefaults:{renderer:$.jqplot.PieRenderer}
	} );
		}); 
	</script>
    @endif
    @if(($activeproductscnt+$sold_cnt+$inactive_cnt)>0)
      <script>
	$(document).ready(function(){
		
	plot10 = $.jqplot('chart10', [[{{ $activeproductscnt }},{{ $sold_cnt }} , {{ $inactive_cnt }} ]], {seriesDefaults:{renderer:$.jqplot.PieRenderer} });
		});
	</script>
    @endif
	@if(($active_cnt+$archievd_cnt+$inactivedeal_cnt)>0)
	 <script>

	$(document).ready(function(){
		
	plot11 = $.jqplot('chart11', [[{{ $active_cnt }} ,{{ $archievd_cnt }}, {{ $inactivedeal_cnt }} ]], {seriesDefaults:{renderer:$.jqplot.PieRenderer} });
		});
	</script>
    @endif
    @if($cus_count!='0,0,0,0,0,0,0,0,0,0,0,0')
    <script class="code" type="text/javascript">$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
		
		{{ $s1 = "[" .$cus_count. "]" }}
        var s1 =  {{ $s1 }}
        var ticks = ['@if (Lang::has(Session::get('admin_lang_file').'.BACK_JANUARY')!= '') {{   trans(Session::get('admin_lang_file').'.BACK_JANUARY') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_JANUARY') }} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_FEBRUARY')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_FEBRUARY') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_FEBRUARY') }} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_MARCH')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_MARCH') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MARCH') }} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_APRIL')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_APRIL') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_APRIL') }}@endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_MAY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MAY') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MAY') }} @endif','@if (Lang::has(Session::get('admin_lang_file').'.BACK_JUNE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_JUNE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_JUNE') }} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_JULY')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_JULY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_JULY') }} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_AUGUST')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_AUGUST')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_AUGUST') }} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_SEPTEMBER')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_SEPTEMBER')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SEPTEMBER')}} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_OCTOBER')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_OCTOBER')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_OCTOBER')}}  @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_NOVEMBER')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_NOVEMBER')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NOVEMBER')}} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_DECEMBER')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_DECEMBER')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DECEMBER')}} @endif'];
        
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
                    tickOptions:{
                            formatString:'%b&nbsp;%#d'
                      },
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
    @if($transaction_chart!='0,0,0,0,0,0,0,0,0,0,0,0')
    <script class="code" type="text/javascript">$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
        
        {{  $s1 = "[" .$transaction_chart. "]" }}
        var s1 = {{ $s1 }}
        //var ticks = ['Jan', 'Feb', 'Mar', 'Apr', 'May','June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
         var ticks = ['@if (Lang::has(Session::get('admin_lang_file').'.BACK_JANUARY')!= '') {{   trans(Session::get('admin_lang_file').'.BACK_JANUARY') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_JANUARY') }} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_FEBRUARY')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_FEBRUARY') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_FEBRUARY') }} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_MARCH')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_MARCH') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MARCH') }} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_APRIL')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_APRIL') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_APRIL') }}@endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_MAY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MAY') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MAY') }} @endif','@if (Lang::has(Session::get('admin_lang_file').'.BACK_JUNE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_JUNE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_JUNE') }} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_JULY')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_JULY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_JULY') }} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_AUGUST')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_AUGUST')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_AUGUST') }} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_SEPTEMBER')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_SEPTEMBER')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SEPTEMBER')}} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_OCTOBER')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_OCTOBER')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_OCTOBER')}}  @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_NOVEMBER')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_NOVEMBER')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NOVEMBER')}} @endif', '@if (Lang::has(Session::get('admin_lang_file').'.BACK_DECEMBER')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_DECEMBER')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DECEMBER')}} @endif'];
        
        plot1 = $.jqplot('chart5', [s1], {
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
    
        $('#chart5').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });</script>
     @endif     
    <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jquery.jqplot.min.js"></script>
    <script class="include" type="text/javascript" src="{{ url('')}}/public/assets/js/chart/jqplot.barRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jqplot.pieRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jqplot.categoryAxisRenderer.min.js"></script>
  <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jqplot.pointLabels.min.js"></script>
    

    <!-- GLOBAL SCRIPTS -->
  
     <script src="{{ url('')}}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('');?>/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="{{ url('')}}/public/assets/plugins/flot/jquery.flot.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/flot/jquery.flot.resize.js"></script>
    <script  src="{{ url('')}}/public/assets/plugins/flot/jquery.flot.categories.js"></script>
    <script  src="{{ url('') }}/public/assets/plugins/flot/jquery.flot.errorbars.js"></script>
	<script  src="{{ url('') }}/public/assets/plugins/flot/jquery.flot.navigate.js"></script>
    <script  src="{{ url('') }}/public/assets/plugins/flot/jquery.flot.stack.js"></script>    
    <script src="{{ url('') }}/public/assets/js/bar_chart.js"></script>
 
  
    <!-- END PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>


</body>

    <!-- END BODY -->
</html>