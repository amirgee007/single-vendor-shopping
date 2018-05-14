<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_DASHBOARD')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEALS_DASHBOARD') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_DASHBOARD')}} @endif </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="_token" content="{!! csrf_token() !!}"/>
	
	
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ url('')}} /public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/main.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/theme.css" />
	<link rel="stylesheet" href="{{ url('') }}/public/assets/css/plan.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
     @php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('')}}/public/assets/favicon/{{ $fav->imgs_name }}">
@endif	
    <link href="{{  url('') }}/public/assets/css/datepicker.css" rel="stylesheet">	
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<link href="{{ url('') }}/public/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{  url('') }}/public/assets/plugins/timeline/timeline.css" />

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
@php 
$sold_cnt=0; @endphp
 @foreach($sold_details as $soldres)
	@if($soldres->deal_no_of_purchase >=$soldres->deal_max_limit)
		
		@php  $sold_cnt++; @endphp 
		@endif
        {{-- $soldres->pro_id --}}
@endforeach

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_HOME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME')}}@endif</a></li>
                                <li class="active"><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEALS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS')}}@endif</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-dashboard"></i></div>
            <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_DASHBOARD')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEALS_DASHBOARD')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_DASHBOARD')}} @endif</h5>
            
        </header>
        <br>
        
        
        	
           
            	<div class="col-lg-12">
                    <div class="col-lg-12">
                 <a style="color:#fff" href="<?php echo url(''); ?>" class="btn btn-success btn-sm btn-grad" target="_blank" >@if (Lang::has(Session::get('admin_lang_file').'.BACK_GO_TO_LIVE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_GO_TO_LIVE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_GO_TO_LIVE')}}@endif</a>
                 
                  <a style="color:#fff" href="{{ url('') }}/deals_all_orders" class="btn btn-warning btn-sm btn-grad" target="_blank" >@if (Lang::has(Session::get('admin_lang_file').'.BACK_SEE_ALL_TRANSACTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SEE_ALL_TRANSACTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SEE_ALL_TRANSACTION')}}@endif</a>
  
                </div>
                </div>
                
            
        
        
        <div class="row">
                <div class="col-lg-6" style="padding:30px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>@if (Lang::has(Session::get('admin_lang_file').'.BACK_TOTAL_DEALS_COUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TOTAL_DEALS_COUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TOTAL_DEALS_COUNT')}}@endif</strong> 
                            <a href="#"><i class="icon icon-align-justify pull-right"></i></a>
                        </div>
                        <div class="panel-body">
                            @if(($active_count+$archievd_count+$inactive_cnt)>0)
                           <div id="chart6" style="margin-top:20px; margin-left:20px; width:450px; height:450px;"></div>
                            <table width="100%" border="0">
                              <tr>
                                <td style="background:#4bb2c5">								
                                    <label class="label label-active">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ACTIVE_DEALS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ACTIVE_DEALS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIVE_DEALS')}} @endif</label>
                                     <span class="label label-danger">{{ $active_count }}</span>
                                </td>
                                <td style="background:#eaa228">
                                    <label class="label label-archive">@if (Lang::has(Session::get('admin_lang_file').'.BACK_EXPIRED_DEALS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EXPIRED_DEALS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EXPIRED_DEALS')}} @endif</label>
                                     <span class="label label-danger">{{ $archievd_count }}</span>
                                </td>
                                <td style="background:#C5B47F">
                                    <label class="label label-archive">@if (Lang::has(Session::get('admin_lang_file').'.BACK_INACTIVE_DEALS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_INACTIVE_DEALS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_INACTIVE_DEALS')}} @endif</label>
                                     <span class="label label-danger">{{ $inactive_cnt }}</span>
                                </td>
                              </tr>
                            </table>
                            @else
                                No details found.
                            @endif    
                        </div>
                       
                        	

                        
                    </div>
                </div>
                <div class="col-lg-5 " style="padding-top:30px"> 
                    <div class="panel panel-default">
                        <div class="panel-heading">	
                            <strong>@if (Lang::has(Session::get('admin_lang_file').'.BACK_MARKET_RESPONSE_RATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MARKET_RESPONSE_RATE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MARKET_RESPONSE_RATE')}} @endif</strong>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="" width="100%">
                                    
                                    <tbody>
                                        <tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_TOTAL_DEALS_COUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TOTAL_DEALS_COUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TOTAL_DEALS_COUNT')}} @endif</td>
                                            <td>{{ $total_deals }} 
                                            {{-- $tot_dea=  $active_count+$archievd_count; --}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" <?php echo 'style="width:'.$total_deals.'%"'; ?>;> 
		  <span class="sr-only">60% @if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_COMPLETE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE')}} @endif</span>
		</div>
	      </div></td>
                                            
                                            
                                        </tr>
                                        <tr>
                                            <td>Active Deals Count</td>
                                            <td>{{ $active_count }}</td>
                                            
                                        </tr>
                                         <tr>
                                           <td colspan="2"><div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" <?php echo 'style="width:'.$active_count.'%"'; ?>;> 
                                              <span class="sr-only">60% @if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_COMPLETE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE')}}@endif</span>
                                            </div>
                                              </div></td>
                                        </tr>
                                        <tr>
                                            <td>Inactive Deals Count</td>
                                            <td>{{ $inactive_cnt }}</td>
                                            
                                        </tr>
                                         <tr>
                                           <td colspan="2"><div class="progress progress-striped active">
											<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" <?php echo 'style="width:'.$inactive_cnt.'%"'; ?>;> 
											  <span class="sr-only">60% @if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_COMPLETE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE')}} @endif</span>
											</div>
											  </div></td>
                                                                                       
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_EXPIRED_DEALS_COUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EXPIRED_DEALS_COUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EXPIRED_DEALS_COUNT')}}@endif</td>
                                            <td>{{ $archievd_count }}</td>
                                            
                                        </tr>
                                         <tr>
                                             <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"  <?php echo 'style="width:'.$archievd_count.'%"'; ?>;>
		  <span class="sr-only">40% <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_COMPLETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE');} ?> ( <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SUCCESS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS');} ?> )</span>
		</div>
	      </div></td>
                                            
                                            
                                        </tr>
                                     <!--  <tr>
                                            <td>Sold Deals Count</td>
                                            <td><?php //echo $sold_cnt;?></td>
                                            
                                        </tr>
                                         <tr>
                                           <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" <?php //echo 'style="width:'.$sold_cnt.'%"'; ?>;> 
		  <span class="sr-only">60% <?php //if (Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETE')!= '') { //echo  trans(Session::get('admin_lang_file').'.BACK_COMPLETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETE');} ?></span>
		</div>
	      </div></td>
                                                                                       
                                            
                                        </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5"  style="padding-left:12px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_TRANSACTION_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEALS_TRANSACTION_DETAILS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_TRANSACTION_DETAILS')}} @endif</strong>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>@if (Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTIONS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TRANSACTIONS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTIONS')}} @endif</th>
                                            <th>@if (Lang::has(Session::get('admin_lang_file').'.BACK_COUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_COUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNT')}} @endif</th>
                                            <th>@if (Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_AMOUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT')}} @endif</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_TODAY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TODAY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TODAY')}} @endif</td>
                                            <td>{{ ($dealstdy[0]->count)+($dealstdy_payu[0]->count)+($ordercod_tdy[0]->count) }}</td>
                                            <td>{{ Helper::cur_sym() }} 
                                            @if(($dealstdy[0]->amt)||($ordercod_tdy[0]->amt) || ($dealstdy_payu[0]->amt))
											{{ (($dealstdy[0]->amt+$dealstdy[0]->tax+$dealstdy[0]->ship)+($ordercod_tdy[0]->amt+$ordercod_tdy[0]->tax+$ordercod_tdy[0]->ship) + ($dealstdy_payu[0]->amt+$dealstdy_payu[0]->tax+$dealstdy_payu[0]->ship)) }}
                                            @else
											{{ "-" }} 
                                            @endif</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_LAST')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_LAST')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST')}} @endif 7 @if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS')}} @endif</td>
                                            <td>{{ ($deals7days[0]->count)+($deals7days_payu[0]->count)+($ordercod_7days[0]->count) }}</td>
                                            <td>{{ Helper::cur_sym() }} 
                                            @if(($deals7days[0]->amt)+($ordercod_7days[0]->amt) + ($deals7days_payu[0]->amt))
											{{ (($deals7days[0]->amt+$deals7days[0]->tax+$deals7days[0]->ship)+($deals7days_payu[0]->amt+$deals7days_payu[0]->tax+$deals7days_payu[0]->ship)+($ordercod_7days[0]->amt+$ordercod_7days[0]->tax+$ordercod_7days[0]->ship)) }}
                                            @else {{ "-" }} @endif</td>
                                        </tr>
                                        <tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_LAST')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_LAST')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST')}} @endif 30 @if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS')}} @endif </td>
                                            <td>{{ ($deals30days[0]->count)+($deals30days_payu[0]->count)+($ordercod_30days[0]->count) }}</td>
                                            <td>{{ Helper::cur_sym() }}
                                            @if(($deals30days[0]->amt)+($deals30days_payu[0]->amt)+($ordercod_30days[0]->amt))
											{{ "".(($deals30days[0]->amt+$deals30days[0]->tax+$deals30days[0]->ship)+($deals30days_payu[0]->amt+$deals30days_payu[0]->tax+$deals30days_payu[0]->ship)+($ordercod_30days[0]->amt+$ordercod_30days[0]->tax+$ordercod_30days[0]->ship)) }}
                                            @else {{  "-" }}  @endif</td>
                                            
                                        </tr>
										<tr>
                                            <td>@if (Lang::has(Session::get('admin_lang_file').'.BACK_LAST_ONE_YEAR')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_LAST_ONE_YEAR')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST_ONE_YEAR')}} @endif</td>
                                            <td>{{ ($deals12mnth[0]->count)+($deals12mnth_payu[0]->count)+($ordercod_12mnth[0]->count) }}</td>
                                            <td>{{ Helper::cur_sym() }}  
                                            @if(($deals12mnth[0]->amt)+($deals12mnth_payu[0]->amt)+($ordercod_12mnth[0]->amt))
											{{ (($deals12mnth[0]->amt+$deals12mnth[0]->tax+$deals12mnth[0]->ship)+($deals12mnth_payu[0]->amt+$deals12mnth_payu[0]->tax+$deals12mnth_payu[0]->ship)+($ordercod_12mnth[0]->amt+$ordercod_12mnth[0]->tax+$ordercod_12mnth[0]->ship)) }}
                                            @else {{  "-" }} @endif</td>
                                            
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
                               <strong>@if (Lang::has(Session::get('admin_lang_file').'.BACK_STATISTICS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_STATISTICS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_STATISTICS')}} @endif</strong> 
                            </div>
                             
                            <div class="panel-body">
                              <ul class="nav nav-pills">
                                <li class="active"><a data-toggle="tab">@if (Lang::has(Session::get('admin_lang_file').'.BACK_LAST_ONE_YEAR_TRANSACTIONS_REPORT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_LAST_ONE_YEAR_TRANSACTIONS_REPORT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST_ONE_YEAR_TRANSACTIONS_REPORT')}} @endif</a>
                                </li>
                              </ul>
                            
                            <div class="tab-content">
                                @if($deal_cnt!='0,0,0,0,0,0,0,0,0,0,0,0')
                              <div id="chart1" style="margin-top:20px; margin-left:20px; width:950px; height:470px;"></div>
                              @else
                                No Transaction Found.
                              @endif
                                <!--<div class="tab-pane fade" id="profile-pills">
                                    <h4>Profile Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>-->
                                <!--<div class="tab-pane fade" id="messages-pills">
                                    <h4>Messages Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>-->
                                
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
    <script src="{{  url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
    @if(($active_count+$archievd_count+$inactive_cnt)>0)
    <script>
	$(document).ready(function(){
		
	plot6 = $.jqplot('chart6', [[{{ $active_count }}, {{ $archievd_count }},{{ $inactive_cnt }} ]], {seriesDefaults:{renderer:$.jqplot.PieRenderer } });
		});
	</script>
    @endif
    @if($deal_cnt!='0,0,0,0,0,0,0,0,0,0,0,0')

    <script class="code" type="text/javascript">$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
		
		{{  $s1 = "[" .$deal_cnt. "]" }}
        var s1 = {{ $s1 }}
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

    <!--- Chart Plugins -->
      <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jquery.jqplot.min.js"></script>
  <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jqplot.barRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="{{ url('') }}/public/assets/js/chart/jqplot.pieRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="{{url('') }}/public/assets/js/chart/jqplot.categoryAxisRenderer.min.js"></script>
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
        
      <script type="text/javascript">
	   $.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	   });
	</script>  
	
</body>
    
</html>
