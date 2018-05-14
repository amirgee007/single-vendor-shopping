<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_FUND_REQUEST')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_FUND_REQUEST') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_FUND_REQUEST') }}                </title>
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
    <link rel="stylesheet" href="public/assets/css/main.css" />
    <link rel="stylesheet" href="public/assets/css/new_css.css" />
    <link rel="stylesheet" href="public/assets/css/theme.css" />
    <link rel="stylesheet" href="public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
     @php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get();  @endphp
      @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
@endif
    <link href="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                            	<li class=""><a>@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }} @endif</a></li>
                                <li class="active"><a> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_FUND_REQUEST')!= '') ? trans(Session::get('admin_lang_file').'.BACK_ALL_FUND_REQUEST') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_FUND_REQUEST') }}                </a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ALL_FUND_REQUEST')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ALL_FUND_REQUEST') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ALL_FUND_REQUEST') }}                </h5>
            
        </header>
        @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('success') !!}
      {{ Form::button('x',['class'=>'close','aria-hidden'=>'true','data-dismiss'=>'alert'])}}
       <!--  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --></div>
		@endif

      <div id ="error_msg"></div>

        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal">
		    
                <div class="form-group col-lg-12">

   <div class="table-responsive panel_marg_clr ppd">
                    	<table class="table table-bordered tbl_fnt" id="dataTables-example">
              <thead>
                <tr>
                <th style="width:60px;"class="text-center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_SNO') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }} @endif</th>
                 <th class="text-center"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MERCHANT_NAME')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_MERCHANT_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MERCHANT_NAME') }}</th>
				 <th class="text-center">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MERCHANT_EMAIL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MERCHANT_EMAIL'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MERCHANT_EMAIL') }}</th>
				 <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TOTAL_WITHDRAW_AMOUNT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TOTAL_WITHDRAW_AMOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TOTAL_WITHDRAW_AMOUNT') }}</th>
				 <th style="text-align:center;"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAID_WITHDRAW_AMOUNT')!= '') ? trans(Session::get('admin_lang_file').'.BACK_PAID_WITHDRAW_AMOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAID_WITHDRAW_AMOUNT') }}</th>
				 <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_REQUESTED_WITHDRAW_AMT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_REQUESTED_WITHDRAW_AMT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_REQUESTED_WITHDRAW_AMT') }}</th>
                 <th style="text-align:center;"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ACTION')!= '')? trans(Session::get('admin_lang_file').'.BACK_ACTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTION') }} </th>
					   
						  
                </tr>
              </thead>
              <tbody>    
             @php $i = 1; @endphp 
             @if(count($get_funds)>0)
                @foreach($get_funds  as $fund) 
			 
			  
		@php	  $newrequestedwithdrawamount=$fund->wd_submited_wd_amt-$fund->paidedamount;
			  
			  $send = base64_encode($fund->mer_id.'/**/'.$fund->mer_fname.'/**/'.$fund->mer_payment.'/**/'.$newrequestedwithdrawamount);  @endphp
			  
			             
               {!! Form::open(array('url'=>'refund_paypal','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
               {{ Form::hidden('mer_id',$fund->mer_id)}}
               {{ Form::hidden('mer_name',$fund->mer_fname)}}
               {{ Form::hidden('mer_paypal',$fund->mer_payment)}}
                {{ Form::hidden('pay_amt',$fund->wd_submited_wd_amt)}}
                 {{ Form::hidden('newrequestedwithdrawamount',$newrequestedwithdrawamount)}}
               <!-- <input type="hidden" name="mer_id" value="<?php echo $fund->mer_id; ?>"> -->
               <!-- <input type="hidden" name="mer_name" value="<?php echo $fund->mer_fname; ?>"> -->
               <!-- <input type="hidden" name="mer_paypal" value="<?php echo $fund->mer_payment; ?>">
               <input type="hidden" name="pay_amt" value="<?php echo $fund->wd_submited_wd_amt; ?>"> -->
               <input type="hidden" name="newrequestedwithdrawamount" value="<?php echo $newrequestedwithdrawamount; ?>">
                
                <tr>
                  <td class="text-center">{{ $i }}</td>
                  <td class="text-center">{{ $fund->mer_fname }}</td>
				  <td class="text-center">{{ $fund->mer_email }}</td>
				  <td class="text-center">{{ $fund->wd_total_wd_amt }}</td>
				  <td class="text-center">{{  $fund->paidedamount }}</td>
				  <td class="text-center">{{ $newrequestedwithdrawamount }}</td>	
                   
                   	@if($fund->mer_payment ) 
					 <td class="text-center">
                     @if($newrequestedwithdrawamount != 0) 
                     
                     <a onclick="paymentValid(<?php echo $fund->mer_id?>,0,'<?php echo $send;?>');" class="btn btn-warning btn-sm btn-grad" > {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAY_NOW_PAYPAL')!= '') ? trans(Session::get('admin_lang_file').'.BACK_PAY_NOW_PAYPAL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAY_NOW_PAYPAL') }} </a> 

                     <a onclick="paymentValid_payu(<?php echo $fund->mer_id?>,0,'<?php echo $send;?>');" class="btn btn-warning btn-sm btn-grad" > {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAY_NOW_PAYUMONEY')!= '') ? trans(Session::get('admin_lang_file').'.BACK_PAY_NOW_PAYUMONEY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAY_NOW_PAYUMONEY') }} </a>          
                     @else   
                     <a class="btn btn-warning btn-sm btn-grad" >  {{(Lang::has(Session::get('admin_lang_file').'.BACK_NIL')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_NIL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NIL') }} </a> <strong></strong>           
                    @endif
                     </td>
					 @else 
                     <td class="text-center"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_NO_PAYPAL_EMAIL')!= '') ? trans(Session::get('admin_lang_file').'.BACK_NO_PAYPAL_EMAIL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO_PAYPAL_EMAIL') }}</a></td>
                     @endif
                </tr>
				 </form>
				    @php $i++; @endphp @endforeach  @endif
					
				 
              </tbody>
            </table></div>
                </div>

         {{ Form::close()}}
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

<!---F12 Block Code
<script type='text/javascript'>
$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});
</script>---->


<?php /* check  merchant request to withdraw is enable/not  */  ?>
<script type="text/javascript">
  function paymentValid(mer_id,mer_request_amt,send) {
    successUrl ="<?php echo url('fund_paypal').'/'; ?>"+send ;
    var passData = 'mer_id='+ mer_id+'&mer_request_amt='+mer_request_amt;
    $.ajax( {
          type: 'GET',
          data: passData,
          url: '<?php echo url('checkMerchantOverOrderReport'); ?>',
          success: function(responseText){ 
            if(responseText == 'merchant_request_allowed' )
            {
              window.location.href = successUrl;
            } else
            {
              $('#error_msg').html('<span style="color:red;margin-top:10px;" ><b>Sorry! Merchant request is not valid </b></span>' );
            }
          }
        });


  }

  function paymentValid_payu(mer_id,mer_request_amt,send) {
    successUrl ="<?php echo url('fund_payu').'/'; ?>"+send ;
    var passData = 'mer_id='+ mer_id+'&mer_request_amt='+mer_request_amt;
    $.ajax( {
          type: 'GET',
          data: passData,
          url: '<?php echo url('checkMerchantOverOrderReport'); ?>',
          success: function(responseText){ 
            if(responseText == 'merchant_request_allowed' )
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


</body>
     <!-- END BODY -->
</html>


