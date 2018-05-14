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
            <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_ALL_ORDERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEALS_ALL_ORDERS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_ALL_ORDERS') }} @endif</title>
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
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/success.css" />
            <link href="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
            @php 
            $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp 
            @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
            <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
            @endif	
            <!--END GLOBAL STYLES -->
            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->
            <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
         </head>
         <style>
            #loader {
            width: 100%;
            height: 100%;
            /*background-color:#0000003d;*/
            z-index: 99;
            }
            .loader-inner
            {
            border: 10px solid #f3f3f3;
            border-radius: 50%;
            border-top: 10px solid #ff7b0d;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
            margin: auto;
            position: fixed;
            z-index: 999;
            left: 50%;
            top: 50%;
            }
            /* Safari */
            @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
            }
            @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
            }
            #loader .loader-section {
            position: fixed;
            top: 0;
            width: 100%;
            height: 100%;
            background: #22222257;
            z-index: 10;
            }
         </style>
         <!-- END HEAD -->
         <!-- BEGIN BODY -->
         <body class="padTop53 " >
            <!--Loader & alert-->
            <div id="loader" style="position: absolute; display: none;">
               <div class="loader-inner"></div>
               <div class="loader-section"></div>
            </div>
            <div id="loadalert" class="alert-success" style="margin-top:18px; display: none; position: fixed; z-index: 9999; width: 50%; text-align: center; left: 25%; padding: 10px;">
               <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
               <strong>Status Changed Successfully!</strong>
            </div>
            <!--Loader & alert-->
            <!-- MAIN WRAPPER -->
            <div id="wrap">
               <!-- HEADER SECTION -->
               {!!$adminheader!!}
               <!-- MENU SECTION -->
               {!!$adminleftmenus!!}
               <!--END MENU SECTION -->
               <!--PAGE CONTENT -->
               <div id="content">
                  <div class="inner">
                     <div class="row">
                        <div class="col-lg-12">
                           <ul class="breadcrumb">
                              <li class=""><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }} @endif</a></li>
                              <li class="active"><a>@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_ALL_ORDERS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_DEALS_ALL_ORDERS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_ALL_ORDERS') }} @endif</a></li>
                           </ul>
                        </div>
                     </div>
                     <center>
                        <div class="cal-search-filter">
                           <form  action="{!!action('TransactionController@deals_payu_all_orders')!!}" method="POST">
                              <input type="hidden" name="_token"  value="<?php echo csrf_token(); ?>">
                              <div class="row">
                                 <br>
                                 <div class="col-sm-3">
                                    <div class="item form-group">
                                       <div class="col-sm-6 date-top">@if (Lang::has(Session::get('admin_lang_file').'.BACK_FROM_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_FROM_DATE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_FROM_DATE') }} @endif</div>
                                       <div class="col-sm-6 place-size">
                                          <span class="icon-calendar cale-icon"></span>
                                          {{ Form::text('from_date',$from_date,array('id'=>'datepicker-8','class'=>'form-control','placeholder'=>'DD/MM/YYYY','required'=>'required','readonly'=>'readonly')) }}
                                          <!--  <input type="text" name="from_date" 
                                             placeholder="DD/MM/YYYY"  class="form-control" id="datepicker-8" value="{{$from_date}}" required readonly> -->
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-3">
                                    <div class="item form-group">
                                       <div class="col-sm-6 date-top">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TO_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TO_DATE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TO_DATE') }} @endif</div>
                                       <div class="col-sm-6 place-size">
                                          <span class="icon-calendar cale-icon"></span>
                                          {{ Form::text('to_date',$to_date,array('id'=>'datepicker-9','class'=>'form-control','placeholder'=>'DD/MM/YYYY','required'=>'required','readonly'=>'readonly')) }}
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-sm-2">
                                       <input type="submit" name="submit" class="btn btn-block btn-success" value="@if (Lang::has(Session::get('admin_lang_file').'.BACK_SEARCH')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SEARCH') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SEARCH') }} @endif">
                                    </div>
                                    <div class="col-sm-2">
                                       <a href="{{ url('').'/deals_payu_all_orders' }}"><button type="button" name="reset" class="btn btn-block btn-info">@if (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RESET') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }} @endif</button></a>
                                    </div>
                                 </div>
                           </form>
                     </center>
                     <div class="row">
                     <div class="col-lg-12">
                     <div class="box dark">
                     <header>
                     <div class="icons"><i class="icon-edit"></i></div>
                     <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_ALL_ORDERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEALS_ALL_ORDERS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_ALL_ORDERS') }} @endif</h5>
                     </header>
                     <div style="display: none;" class="la-alert date-select1 alert-success alert-dismissable">End date should be greater than Start date!
                     {{ Form::button('x',['class'=>'close closeAlert','aria-hidden'=>'true'])}}	
                     <!-- <button type="button" class="close closeAlert"  aria-hidden="true">×</button> --></div>
                     <div id="div-1" class="accordion-body collapse in body">
                     <form class="form-horizontal">
                     <div class="table-responsive panel_marg_clr ppd">
                     <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                     <thead>
                     <tr role="row">
                     <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 69px;" aria-label="S.No: activate to sort column ascending" aria-sort="ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SNO') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }} @endif</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 78px;" aria-label="Name: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CUSTOMERS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMERS') }} @endif</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 158px;" aria-label="Email: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_TITLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEAL_TITLE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_TITLE') }} @endif</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 88px;" aria-label="City: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_AMOUNT') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT') }} @endif({{ Helper::cur_sym() }})</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 84px;" aria-label="Joined Date: activate to sort column ascending"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_TAX')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TAX') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TAX') }} @endif ({{ Helper::cur_sym() }})</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 84px;" aria-label="Joined Date: activate to sort column ascending"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_SHIPMENT_VALUE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SHIPMENT_VALUE') }} @else {{  trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPMENT_VALUE') }} @endif ({{ Helper::cur_sym() }})</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 101px;" aria-label="Send Mail: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PAYMENT_STATUS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PAYMENT_STATUS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYMENT_STATUS') }} @endif</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 88px;" aria-label="Edit: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TRANSACTION_DATE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION_DATE') }} @endif</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 72px;" aria-label="Status: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION_TYPE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TRANSACTION_TYPE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION_TYPE') }} @endif</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 72px;" aria-label="Status: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELIVERY_STATUS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DELIVERY_STATUS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELIVERY_STATUS') }} @endif</th>
                     </tr>
                     </thead>
                     <tbody>
                     @php $i = 1 ; @endphp
                     @if(isset($_POST['submit']))
                     @if($dealrep !="" ) 
                     @foreach($dealrep as $row) 
                     @php $ordertype = ''; @endphp
                     @if($row->order_paytype == 1)
                     @php	$ordertype = ((Lang::has(Session::get('admin_lang_file').'.BACK_PAYPAL')!= ''))? trans(Session::get('admin_lang_file').'.BACK_PAYPAL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYPAL'); @endphp
                     @elseif($row->order_paytype == 2)
                     @php	$ordertype = ((Lang::has(Session::get('admin_lang_file').'.BACK_WALLET')!= ''))? trans(Session::get('admin_lang_file').'.BACK_WALLET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_WALLET');	@endphp
                     @else 
                     @php	$ordertype = "--"; @endphp
                     @endif
                     @if($row->order_status==1)
                     @php	$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SUCCESS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS');		@endphp
                     @elseif($row->order_status==2) 
                     @php	$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_COMPLETED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETED'); @endphp
                     @elseif($row->order_status==3) 
                     @php	$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_HOLD')!= ''))? trans(Session::get('admin_lang_file').'.BACK_HOLD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOLD'); @endphp
                     @elseif($row->order_status==4) 
                     @php	$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_FAILED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_FAILED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED'); @endphp
                     @endif
                     @php	$total_tax = ($row->order_amt * $row->order_tax)/100 ; @endphp
                     <tr class="gradeA odd"> <!-- echo $i; -->
                     <td class="sorting_1">{{ $i }}</td>
                     <td class="     ">{{ $row->cus_name }}</td>
                    
                     <td class="     ">{{ $row->deal_title }}</td>
                     <td class="center     ">{{ $row->order_amt }}</td>
                     <td class="center">{{ $total_tax }}</td>
                     <td class="center">{{ $row->order_shipping_amt }}</td>
                     <td class="center     "><a href="#" style="color:green;" class="colr3">{{ $orderstatus }}</a></td>
                     <td class="center     ">{{ $row->order_date }}</td>
                     <td class="center    "><a href="#" class="colr2">{{ $ordertype }}</a></td>
                     <td class="center     ">
                     @if($row->delivery_status==5)
                     <span>Cancel Request Pending</span> 
                     @elseif($row->delivery_status==7)
                     <span>Return Request Pending</span>
                     @elseif($row->delivery_status==9)
                     <span>Replace Request Pending</span>
                     @else
                     <select name="<?php  echo 'status'.$row->order_id;?>" class="btn btn-default" onchange="update_deal_order_paypal(this.value,'<?php echo $row->transaction_id;?>','<?php echo $row->deal_id;?>')">
                     <option value="1" <?php if($row->delivery_status==2 || $row->delivery_status==3 || $row->delivery_status==4 || $row->delivery_status==6 || $row->delivery_status==8 || $row->delivery_status==10) {?>style="display:none" <?php } ?><?php if($row->delivery_status==1){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ORDER_PLACED')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_ORDER_PLACED') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ORDER_PLACED') }} @endif</option>
                     <option value="6" <?php if($row->delivery_status==1 || $row->delivery_status==6 || $row->delivery_status==5) {?>style="display:block" <?php }else { echo 'style="display:none"';} ?> <?php if($row->delivery_status==6){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCELLED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CANCELLED') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCELLED') }} @endif</option>
                     <option value="2" <?php if($row->delivery_status==3 || $row->delivery_status==4 || $row->delivery_status==6 || $row->delivery_status==8 || $row->delivery_status==10) {?>style="display:none" <?php } ?><?php if($row->delivery_status==2){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ORDER_PACKED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ORDER_PACKED') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ORDER_PACKED') }} @endif</option>
                     <option value="3" <?php if($row->delivery_status==4 || $row->delivery_status==6 || $row->delivery_status==8 || $row->delivery_status==10) {?>style="display:none" <?php } ?> <?php if($row->delivery_status==3){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_DISPATCHED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DISPATCHED') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DISPATCHED') }} @endif</option>
                     <option value="4"<?php if($row->delivery_status==6 || $row->delivery_status==8 || $row->delivery_status==10) {?>style="display:none" <?php } ?> <?php if($row->delivery_status==4 ){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELIVERED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DELIVERED') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELIVERED') }} @endif</option>
                     <option value="8" <?php if($row->delivery_status==4 || $row->delivery_status==8 || $row->delivery_status==7) {?>style="display:block" <?php }else { echo 'style="display:none"';} ?> <?php if($row->delivery_status==8){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_RETURNED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RETURNED') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RETURNED') }} @endif</option>
                     <option value="10" <?php if($row->delivery_status==4 || $row->delivery_status==10 || $row->delivery_status==9) {?>style="display:block" <?php }else { echo 'style="display:none"';} ?> <?php if($row->delivery_status==10){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_REPALCED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_REPALCED') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_REPALCED') }} @endif</option>
                     </select>   @endif
                     </td>
                     </tr>
                     @php $i++; @endphp @endforeach
                     @endif 
                     @else
                     @foreach($allorders as $allorders_list) 
                     @php	$orderstatus="";
                     $ordertype=""; @endphp
                     @if($allorders_list->order_paytype==1)
                     @php	$ordertype = ((Lang::has(Session::get('admin_lang_file').'.BACK_PAYUMONEY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_PAYUMONEY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYUMONEY'); @endphp
                     @elseif($allorders_list->order_paytype==2)
                     @php	$ordertype = ((Lang::has(Session::get('admin_lang_file').'.BACK_WALLET')!= ''))? trans(Session::get('admin_lang_file').'.BACK_WALLET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_WALLET');	 @endphp
                     @else 
                     @php	$ordertype = "--"; @endphp
                     @endif
                     @if($allorders_list->order_status==1)
                     @php	$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_SUCCESS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SUCCESS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUCCESS');		@endphp
                     @elseif($allorders_list->order_status==2) 
                     @php	$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_COMPLETED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_COMPLETED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COMPLETED'); @endphp
                     @elseif($allorders_list->order_status==3) 
                     @php	$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_HOLD')!= ''))? trans(Session::get('admin_lang_file').'.BACK_HOLD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOLD'); @endphp
                     @elseif($allorders_list->order_status==4) 
                     @php	$orderstatus = ((Lang::has(Session::get('admin_lang_file').'.BACK_FAILED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_FAILED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED'); @endphp
                     @endif
                     @php	$total_tax = ($allorders_list->order_amt * $allorders_list->order_tax)/100 ; @endphp
                     <tr class="gradeA odd">
                     <td class="sorting_1">{{ $i }}</td>
                     <td class="     ">{{ $allorders_list->cus_name }}</td>
                     
                     <td class="     ">{{ $allorders_list->deal_title }}</td>
                     <td class="center     ">{{ $allorders_list->order_amt }}</td>
                     <td class="center     ">{{ $total_tax }}</td>
                     <td class="center">{{ $allorders_list->order_shipping_amt }}</td>
                     <td class="center     "><a href="#" style="color:green;" class="colr3">{{ $orderstatus }}</a></td>
                     <td class="center     ">{{ $allorders_list->order_date }}</td>
                     <td class="center     "><a href="#" class="colr2">{{ $ordertype }}</a></td>
                     <td class="center     ">
                     @if($allorders_list->delivery_status==5)
                     <span>Cancel Request Pending</span>
                     @elseif($allorders_list->delivery_status==7)
                     <span>Return Request Pending</span>
                     @elseif($allorders_list->delivery_status==9)
                     <span>Replace Request Pending</span>
                     @else
                     <select name="<?php  echo 'status'.$allorders_list->order_id;?>" class="btn btn-default" onchange="update_deal_order_paypal(this.value,'<?php echo $allorders_list->transaction_id;?>','<?php echo $allorders_list->deal_id;?>')">
                     <option value="1" <?php if($allorders_list->delivery_status==2 || $allorders_list->delivery_status==3 || $allorders_list->delivery_status==4 || $allorders_list->delivery_status==6 || $allorders_list->delivery_status==8 || $allorders_list->delivery_status==10) {?>style="display:none" <?php } ?><?php if($allorders_list->delivery_status==1){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ORDER_PLACED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ORDER_PLACED') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ORDER_PLACED') }} @endif</option>
                     <option value="6" <?php if($allorders_list->delivery_status==1 || $allorders_list->delivery_status==6 || $allorders_list->delivery_status==5) {?>style="display:block" <?php }else { echo 'style="display:none"';} ?> <?php if($allorders_list->delivery_status==6){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCELLED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CANCELLED') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCELLED') }} @endif</option>
                     <option value="2" <?php if($allorders_list->delivery_status==3 || $allorders_list->delivery_status==4 || $allorders_list->delivery_status==6 || $allorders_list->delivery_status==8 || $allorders_list->delivery_status==10) {?>style="display:none" <?php } ?><?php if($allorders_list->delivery_status==2){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ORDER_PACKED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ORDER_PACKED') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ORDER_PACKED') }} @endif</option>
                     <option value="3" <?php if($allorders_list->delivery_status==4 || $allorders_list->delivery_status==6 || $allorders_list->delivery_status==8 || $allorders_list->delivery_status==10) {?>style="display:none" <?php } ?> <?php if($allorders_list->delivery_status==3){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_DISPATCHED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DISPATCHED') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DISPATCHED') }} @endif</option>
                     <option value="4" <?php if($allorders_list->delivery_status==6 || $allorders_list->delivery_status==8 || $allorders_list->delivery_status==10) {?>style="display:none" <?php } ?> <?php if($allorders_list->delivery_status==4 ){?> selected <?php } ?>> @if (Lang::has(Session::get('admin_lang_file').'.BACK_DELIVERED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DELIVERED') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELIVERED') }} @endif</option>
                     <option value="8" <?php if($allorders_list->delivery_status==4 || $allorders_list->delivery_status==8 || $allorders_list->delivery_status==7) {?>style="display:block" <?php }else { echo 'style="display:none"';} ?> <?php if($allorders_list->delivery_status==8){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_RETURNED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RETURNED') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RETURNED') }} @endif</option>
                     <option value="10" <?php if($allorders_list->delivery_status==4 || $allorders_list->delivery_status==10 || $allorders_list->delivery_status==9) {?>style="display:block" <?php }else { echo 'style="display:none"';} ?> <?php if($allorders_list->delivery_status==10){?> selected <?php } ?>>@if (Lang::has(Session::get('admin_lang_file').'.BACK_REPALCED')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_REPALCED') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_REPALCED') }} @endif</option>
                     </select>    @endif
                     </td>
                     </tr>
                     @php $i++; @endphp @endforeach @endif
                     </tbody>
                     </table></div>
                     </div>
                     </div>
                     {{ Form::close() }}
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
            {!!$adminfooter!!}
            <!--END FOOTER -->
            <!-- GLOBAL SCRIPTS -->
            <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
            <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
            <!-- PAGE LEVEL SCRIPTS -->
            <script src="{{ url('') }}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
            <script src="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
            <script>
               $(document).ready(function () {
                   $('#dataTables-example').dataTable();
               });
            </script> 
            <script type="text/javascript">
               $.ajaxSetup({
                   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
               });
            </script>
            <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
            <script>
               $(function() {
                  $( "#datepicker-8" ).datepicker({
                     prevText:"click for previous months",
                     nextText:"click for next months",
                     showOtherMonths:true,
                     selectOtherMonths: false
                  });
                  $( "#datepicker-9" ).datepicker({
                     prevText:"click for previous months",
                     nextText:"click for next months",
                     showOtherMonths:true,
                     selectOtherMonths: true
                  });
               });
               /** Check start date and end date**/
               $("#datepicker-8,#datepicker-9").change(function() {
               var startDate = document.getElementById("datepicker-8").value;
               var endDate = document.getElementById("datepicker-9").value;
               if (this.id == 'datepicker-8') {
                    if ((Date.parse(endDate) <= Date.parse(startDate))) {
                          $('#datepicker-8').val('');
                         $(".date-select1").css({"display" : "block"});
                          return false;
                      }
                  } 
               
                   if(this.id == 'datepicker-9') {
                      if ((Date.parse(endDate) <= Date.parse(startDate))) {
                          $('#datepicker-9').val('');
                           $(".date-select1").css({"display" : "block"});
                           return false;
                          //alert("End date should be greater than Start date");
                      }
                      }
                      
                  
               //document.getElementById("ed_endtimedate").value = "";
               
               });
               /*Start date end date check ends*/
               $(".closeAlert").click(function(){
               $(".alert-success").hide();
               });
            </script>
            <script>
               function update_deal_order_paypal(id,orderid,proid)
               { 
               		 var passdata= 'id='+id+"&order_id="+orderid+"&proid="+proid;
               		 var pathnametemp =$('#return_url').val();
               		  $.ajax( {
               		      type: 'get',
               			  data: passdata,
               			  url: 'update_deal_order_payumoney_admin',
               			  beforeSend: function() {
               			        // setting a timeout
               			        //$(placeholder).addClass('loading');
               			       document.getElementById("loader").style.display = "block";
               			    },
               			  success: function(responseText){ 
               			  // document.getElementById("myDIV").style.display = "block";
               				//alert(responseText);
               				document.getElementById("loader").style.display = "none";
               				document.getElementById("loadalert").style.display = "block";
               				if(responseText=="success")
               				{ 	 
               					setTimeout(function () {
               						 location.reload();  
               					},1000);
               				   
               				}
               			}		
               		});	
               }
            </script>
         </body>
         <!-- END BODY -->
      </html>