<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_OFFLINE_TRANSACTION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_OFFLINE_TRANSACTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_OFFLINE_TRANSACTION') }} |{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_OFFLINE_TRANSACTION')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_ALL_OFFLINE_TRANSACTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_OFFLINE_TRANSACTION') }}</title>
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
  <link rel="stylesheet" href="{{ url('') }}/public/assets/css/plan.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
 @php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp
     @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
@endif  
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="{{ url('') }}/public/assets/css/datepicker.css" rel="stylesheet" /> 
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  <link href="{{ url('') }}/public/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/timeline/timeline.css" />

  

</head>
     <!-- END HEAD -->

     <!-- BEGIN BODY -->
<body class="padTop53">

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
            <li class=""><a href="{{ url('siteadmin_dashboard') }}"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
            <li class="active"><a href="#">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_OFFLINE_TRANSACTION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_OFFLINE_TRANSACTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_OFFLINE_TRANSACTION') }}</a>&nbsp;({{ (Lang::has(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CASH_ON_DELIVERY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CASH_ON_DELIVERY') }})</li>
          </ul>
        </div>
      </div>
      <div class="row"> 

        <div class="col-lg-12">
          @if($session_msg!='')

            <div class="alert alert-danger alert-dismissable"  > {{ $session_msg }}
              {{ Form::button('x',['class'=>'close','aria-hidden'=>'true','data-dismiss'=>'alert'])}}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
          @endif 
        </div>

        <div class="col-lg-12"> 
          <div class="box dark"> <header> 
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_OFFLINE_TRANSACTION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_OFFLINE_TRANSACTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_OFFLINE_TRANSACTION') }}</h5>
            </header> 
            <div class="row">
                <div class="col-lg-12">                     

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            
   <div class="table-responsive panel_marg_clr ppd">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>@if (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_SNO') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }} @endif</th>
                                            
                                            <th>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TOTAL_ORDER_AMOUNT')!= '') ? trans(Session::get('admin_lang_file').'.BACK_TOTAL_ORDER_AMOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TOTAL_ORDER_AMOUNT') }}</th>
                                            <th>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TOTAL_COD_USED_COUPON_AMOUNT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TOTAL_COD_USED_COUPON_AMOUNT'): trans($ADMIN_OUR_LANGUAGE.'.BACK_TOTAL_COD_USED_COUPON_AMOUNT') }}</th>

                                            <th>{{ (Lang::has(Session::get('admin_lang_file').'.PRODUCT_TYPE')!= '') ?  trans(Session::get('admin_lang_file').'.PRODUCT_TYPE'): trans($ADMIN_OUR_LANGUAGE.'.PRODUCT_TYPE') }}</th>
                                            
                                            
                                                                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1; @endphp
                                    
                                            
                                            
                                          
                                              <tr class="odd gradeX">
                                                 <td> 1</td>
                                                <td>{{$get_cod_details_product->sum('cod_amt')}}</td>
                                               
                                                 <td> {{$get_cod_details_product->sum('coupon_amount')}}</td>
                                                  
                                               
                                                <td class="center">Product</td>
                                                 </tr>
                                                <tr class="odd gradeX">
                                                 <td> 2</td>

                                                <td>{{$get_cod_details_deals->sum('cod_amt')}}</td>
                                               
                                                 <td> {{$get_cod_details_deals->sum('coupon_amount')}}</td>
                                                  
                                                
                                                <td class="center"> Deals </td>
                                                
                                         
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
            <!--END PAGE CONTENT -->
 
        </div>
    
     <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
   {!! $adminfooter !!}
    <!--END FOOTER -->

  <?php /* check  merchant request to withdraw is enable/not  */  ?>
<script type="text/javascript">
  function paymentValid(mer_id,mer_request_amt,send,paymentMethod) {
    if(paymentMethod=='online')
      successUrl ="<?php echo url('commission_paypal').'/'; ?>"+send ;
    else{
       successUrl ="<?php echo url('commission_offline_pay').'/'; ?>"+send ;
    }
    var passData = 'mer_id='+ mer_id+'&mer_request_amt='+mer_request_amt;
    $.ajax( {
          type: 'GET',
          data: passData,
          url: '<?php echo url('checkMerchantOverOrderReport'); ?>',
          success: function(responseText){ 
            if(responseText == 'merchant_request_blocked')
            {
              window.location.href = successUrl;
            } else
            {
              $('#error_msg').html('<span style="color:red;margin-top:10px;" ><b>Sorry! Merchant request is not valid </b></span>' );
            }
          }
        });


  }
</script>
<?php /* check  merchant request to withdraw is enable/not ends  */  ?>


    
    
    
     <!-- GLOBAL SCRIPTS -->
    <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
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



</body>
     <!-- END BODY -->
</html>
