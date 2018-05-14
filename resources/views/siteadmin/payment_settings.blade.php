<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYMENT_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PAYMENT_SETTINGS') :   trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYMENT_SETTINGS') }}</title>
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
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif		
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                            	<li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYMENT_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_PAYMENT_SETTINGS')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYMENT_SETTINGS') }} </a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYMENT_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_PAYMENT_SETTINGS')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYMENT_SETTINGS') }}</h5>
            
        </header>
        
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
        <div class="row">
        	<div class="col-lg-11 panel_marg" style="padding-bottom:10px;">
                    
   {!! Form::open(array('url'=>'payment_settings_submit','class'=>'form-horizontal')) !!}
                    <?php /*?><div class="panel panel-default">
                        <div class="panel-heading">
                          Shipping  
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                           <?php foreach($get_pay_settings as $pay_details) { } ?>
                    <label class="control-label col-lg-3" for="text1">Flat Shipping ( Rs. )<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="flat_shipping" value="<?php echo $pay_details->ps_flatshipping; ?>" >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Tax Percentage ( % )<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="tax_percentage" value="<?php echo $pay_details->ps_taxpercentage; ?>" >
                    </div>
                </div>
                        </div>
                        
                    </div><?php */?>
					   @foreach($get_pay_settings as $pay_details) @endforeach
					 <?php /*?><div class="panel panel-default">
                        <div class="panel-heading">
                          Auction 
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Extend Days <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="extended_days" value="<?php echo $pay_details->ps_extenddays; ?>">
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Alert Day <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="alert_day" value="<?php echo $pay_details->ps_alertdays; ?>">
                    </div>
                </div>
                        </div>
                        
                    </div><?php */?>
					
                    	<?php /*?><div class="panel panel-default">
                        <div class="panel-heading">
                         Fund requests / Referral 
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Minimum Fund Request (Rs.)<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="maximum_fund_request" value="<?php echo $pay_details->ps_minfundrequest; ?>">
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Maximum Fund Request(Rs.) <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="maximum_fund_request" value="<?php echo $pay_details->ps_maxfundrequest; ?>">
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Referral Amount ( Rs. )  <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="referral_amount" value="<?php echo $pay_details->ps_referralamount; ?>">
                    </div>
                </div>
                        </div>
                        
                    </div><?php */?>
					 <div class="panel panel-default">
                        <div class="panel-heading">
                        {{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY_CURRENCY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COUNTRY_CURRENCY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY_CURRENCY') }}
                         
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY_NAME')!= '')   ? trans(Session::get('admin_lang_file').'.BACK_COUNTRY_NAME')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <select class="validate[required] form-control" id="sport" name="country_name"  onChange="select_cur_val(this.value)" >
                        <option value="">-- {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') ? trans(Session::get('admin_lang_file').'.BACK_SELECT') :trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT') }} ---</option>
						@foreach($country_settings as $pay_country_details) 
                        <option value="{{ $pay_country_details->co_id }}" <?php if($pay_details->ps_countryid == $pay_country_details->co_id) {?> selected <?php } ?> ><?php echo $pay_country_details->co_name; ?></option>
                        @endforeach
                        </select>
                    </div>
                </div>
                        </div>
                    <div id="whole_currency_div">
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY_CODE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_COUNTRY_CODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY_CODE') }} <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
					{{ Form::text('country_code',$pay_details->ps_countrycode,['class' => 'form-control','id' => 'text1','readonly']) }}
                        
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CURRENCY_SYMBOL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CURRENCY_SYMBOL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CURRENCY_SYMBOL') }}   <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
					{{ Form::text('currency_symbol',$pay_details->ps_cursymbol,['class' => 'form-control','id' => 'text1','readonly']) }}
                       
                    </div>
                </div>
                        </div>
                 
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CURRENCY_CODE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CURRENCY_CODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CURRENCY_CODE') }}   <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
					{{ Form::text('currency_code',$pay_details->ps_curcode,['class' => 'form-control','id' => 'text1','readonly']) }}
                       
                    </div>
                </div>
                 </div>
              </div>
               </div>
					
					 <div class="panel panel-default">
                        <div class="panel-heading">
                        {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYMENT_ACCOUNT')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_PAYMENT_ACCOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYMENT_ACCOUNT') }}
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYPAL_ACCOUNT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PAYPAL_ACCOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYPAL_ACCOUNT') }}<span class="text-sub"></span></label>

                    <div class="col-lg-4">
					{{ Form::text('paypal_account',$pay_details->ps_paypalaccount,['class' => 'form-control','id' => 'text1']) }}

                     
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYPAL_API_PASSWORD')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_PAYPAL_API_PASSWORD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYPAL_API_PASSWORD') }}<span class="text-sub"></span></label>

                    <div class="col-lg-4">
					{{ Form::text('paypal_api_password',$pay_details->ps_paypal_api_pw,['class' => 'form-control','id' => 'text1']) }}
                      
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYPAL_API_SIGNATURE')!= '')   ? trans(Session::get('admin_lang_file').'.BACK_PAYPAL_API_SIGNATURE')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYPAL_API_SIGNATURE') }}  <span class="text-sub"></span></label>

                    <div class="col-lg-4">
					{{ Form::text('paypal_api_signature',$pay_details->ps_paypal_api_signature,['class' => 'form-control','id' => 'text1']) }}
                        
                    </div>
                </div>
                        </div>

                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYUMONEY_KEY')!= '')   ? trans(Session::get('admin_lang_file').'.BACK_PAYUMONEY_KEY')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYUMONEY_KEY') }}  <span class="text-sub"></span></label>

                    <div class="col-lg-4">
          {{ Form::text('payu_key',$pay_details->ps_payu_key,['class' => 'form-control','id' => 'text1']) }}
                        
                    </div>
                </div>
                        </div>

                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYUMONEY_SALT')!= '')   ? trans(Session::get('admin_lang_file').'.BACK_PAYUMONEY_SALT')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYUMONEY_SALT') }}  <span class="text-sub"></span></label>

                    <div class="col-lg-4">
          {{ Form::text('payu_salt',$pay_details->ps_payu_salt,['class' => 'form-control','id' => 'text1']) }}
                        
                    </div>
                </div>
                        </div>

                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.TAX_IDENTIFICATION_NUMBER')!= '')   ? trans(Session::get('admin_lang_file').'.TAX_IDENTIFICATION_NUMBER')   : trans($ADMIN_OUR_LANGUAGE.'.TAX_IDENTIFICATION_NUMBER') }}  <span class="text-sub"></span></label>

                    <div class="col-lg-4">
          {{ Form::text('tax_number',$pay_details->tax_id_number,['class' => 'form-control','id' => 'text1']) }}
                        
                    </div>
                </div>
                        </div>

                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.TAX_TYPE')!= '')   ? trans(Session::get('admin_lang_file').'.TAX_TYPE')   : trans($ADMIN_OUR_LANGUAGE.'.TAX_TYPE') }}  <span class="text-sub"></span></label>

                   
                    <div class="col-lg-4">
          <select name="tax_type" id="tax_type">
            <option value="" > --Select-- </option>>
            <option value="GST" {{ ($pay_details->tax_type == "GST" ) ? 'selected' : '' }}> GST </option>
            <option value="TIN" {{ ($pay_details->tax_type == "TIN" ) ? 'selected' : '' }}> TIN </option>
            <option value="SSN" {{ ($pay_details->tax_type == "SSN" ) ? 'selected' : '' }} > SSN </option>
            <option value="ITIN" {{ ($pay_details->tax_type == "ITIN" ) ? 'selected' : '' }}> ITIN </option>
            <option value="VAT" {{ ($pay_details->tax_type == "VAT" ) ? 'selected' : '' }}> VAT </option>
            <option value="STN" {{ ($pay_details->tax_type == "STN" ) ? 'selected' : '' }}> STN </option>
            <option value="Others" {{ ($pay_details->tax_type == "Others" ) ? 'selected' : '' }}> Others </option>
          </select>
                        
                    </div>
                </div>
                        </div>

					<!-- 	 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Authorize.net Transaction Key<span class="text-sub"></span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" name="authorizenet_trans_key" value="<?php //echo $pay_details->ps_authorize_trans_key; ?>" id="text1">
                    </div>
                </div>
             </div> -->
					<!-- 	 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Authorizenet API ID<span class="text-sub"></span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" name="authorizenet_api_id" value="<?php //echo $pay_details->ps_authorize_api_id; ?>" id="text1">
                    </div>
                </div>
             </div> -->
						<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYMENT_MODE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PAYMENT_MODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYMENT_MODE') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                       
              <input type="radio" <?php if($pay_details->ps_paypal_pay_mode == 0) { echo 'checked'; } ?>   value="0" id="optionsRadios1" name="payment_mode">
				  {{ (Lang::has(Session::get('admin_lang_file').'.BACK_TEST_ACCOUNT')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_TEST_ACCOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TEST_ACCOUNT') }}                   
            
		
              <input type="radio" <?php if($pay_details->ps_paypal_pay_mode == 1) { echo 'checked'; } ?> value="1" id="optionsRadios1" name="payment_mode">
				  {{ (Lang::has(Session::get('admin_lang_file').'.BACK_LIVE_ACCOUNT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_LIVE_ACCOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_LIVE_ACCOUNT') }}                 
            
                    </div>
                </div>
                        </div>
                        
                    </div>
					<div class="form-group">
                    <label class="control-label col-lg-3" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad"><a style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</a></button>
                  
                    </div>
					  
                </div>
                
                {{ Form::close() }}
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
    <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script>
	function select_cur_val(id)
	{
		
		var passData = 'id='+id;
	
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('select_currency_value_ajax'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
				   	//alert(responseText);
					$('#whole_currency_div').html(responseText);					   
				   }
				}		
			});		
	}
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
