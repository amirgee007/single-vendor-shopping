<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAILED_FUND_REQUEST')!= '') ? trans(Session::get('admin_lang_file').'.BACK_FAILED_FUND_REQUEST') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED_FUND_REQUEST') }}               </title>
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
    <link rel="stylesheet" href="public/assets/css/theme.css" />
    <link rel="stylesheet" href="public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     @php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp
     @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
@endif	
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
                            	<li class=""><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }} @endif</a></li>
                                <li class="active"><a> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAILED_FUND_REQUEST')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FAILED_FUND_REQUEST') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED_FUND_REQUEST') }}                    </a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FAILED_FUND_REQUEST')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FAILED_FUND_REQUEST') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED_FUND_REQUEST') }}                   </h5>
            
        </header>
        @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('success') !!}
             {{ Form::button('x',['class'=>'close','aria-hidden'=>'true','data-dismiss'=>'alert'])}}
        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --></div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal">

                <div class="form-group col-lg-12">

   <div class="table-responsive panel_marg_clr ppd">
                    	<table class="table table-bordered" id="dataTables-example">
              <thead>
                <tr>
                  <th style="width:10%;"class="text-center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_SNO') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }} @endif</th>
                  <th class="text-center"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MERCHANT_NAME')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_MERCHANT_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MERCHANT_NAME') }}</th>
				    <th class="text-center">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MERCHANT_EMAIL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MERCHANT_EMAIL'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MERCHANT_EMAIL') }}</th>
				   <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TRANSACTION_ID')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TRANSACTION_ID') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TRANSACTION_ID') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAID_AMOUNT')!= '') ? trans(Session::get('admin_lang_file').'.BACK_PAID_AMOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAID_AMOUNT') }}</th>
				   <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_STATUS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_STATUS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_STATUS') }}</th>
							   
					
					   
						  
                </tr>
              </thead>
              <tbody>    
             @php 
			  $failed = ((Lang::has(Session::get('admin_lang_file').'.BACK_FAILED')!= ''))? trans(Session::get('admin_lang_file').'.BACK_FAILED') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FAILED');
			  $i = 1; @endphp @foreach($get_funds  as $fund) 
			 
			  
						  
			             
               {!! Form::open(array('url'=>'fund_paypal','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
             
                </form>
                <tr>
                  <td class="text-center">{{ $i }}</td>
                  <td class="text-center">{{ $fund->mer_fname }}</td>
				     <td class="text-center">{{ $fund->mer_email }}</td>
					  <td class="text-center">{{ $fund->wr_txn_id }}</td>
					  <td class="text-center">{{  $fund->wr_paid_amount }}</td>
					   <td class="text-center"><?php echo  $failed; ?></td>
					  
				                      	<?php /*if($fund->mer_payment ) { ?>
					 <td class="text-center">
                     <?php if($newrequestedwithdrawamount != 0) {?>
                     <a href="<?php echo url('fund_paypal/'.$send); ?>" class="btn btn-warning btn-sm btn-grad" > Pay Now </a>      
                     <?php } else { ?>    .
                     <a class="btn btn-warning btn-sm btn-grad" > Nil </a> <strong></strong>           
                     <?php } ?>
                     </td>
					 <?php } else { ?>
                     <td class="text-center"><a >No paypal email for this merchant</a></td>
                     <?php }*/  ?>
                </tr>
				
				   @php $i++; @endphp @endforeach
					
				 
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
     
</body>
     <!-- END BODY -->
</html>


