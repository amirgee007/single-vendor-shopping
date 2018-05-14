<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }}| @if (Lang::has(Session::get('admin_lang_file').'.BACK_GENERAL_SETTINGS')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_GENERAL_SETTINGS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_GENERAL_SETTINGS') }} @endif</title>
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
     @php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
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
                            	<li class=""><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME')}} @endif</a></li>
                                <li class="active"><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_GENERAL_SETTINGS')!= '') {{   trans(Session::get('admin_lang_file').'.BACK_GENERAL_SETTINGS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_GENERAL_SETTINGS') }}@endif</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_GENERAL_SETTINGS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_GENERAL_SETTINGS') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_GENERAL_SETTINGS') }} @endif</h5>
            
        </header>
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'general_setting_submit','class'=>'form-horizontal','accept-charset' => 'utf-8')) !!}
				@foreach($general_settings as $gen_set)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SITE_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SITE_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SITE_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="site_name" name="site_name" placeholder="Enter Site Name {{ $default_lang }}" class="form-control" value="{!!$gen_set->gs_sitename!!}" type="text" maxlength="40">
                    </div>
                </div>
				
				 @if(!empty($get_active_lang))  
				@foreach($get_active_lang as $get_lang) 
				@php
				$get_lang_code = $get_lang->lang_code;
				$get_lang_name = $get_lang->lang_name;
				$site_name_dynamic = 'gs_sitename_'.$get_lang_code; 
				@endphp
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Site Name({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="site_name_<?php echo $get_lang_name; ?>" name="site_name_<?php echo $get_lang_name; ?>" placeholder="Enter Site Name In {{ $get_lang_name }}" class="form-control" value="{!!$gen_set->$site_name_dynamic!!}" type="text">
                    </div>
                </div>
				@endforeach
				@endif

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_META_TITLE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_META_TITLE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_META_TITLE') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="meta_title" name="meta_title" placeholder="Enter Meta Title {{ $default_lang }}" class="form-control" value="{!!$gen_set->gs_metatitle!!}" type="text">
                    </div>
                </div>
				
				 @if(!empty($get_active_lang))  
				@foreach($get_active_lang as $get_lang) 
				@php
				$get_lang_code = $get_lang->lang_code;
				$get_lang_name = $get_lang->lang_name;
				$meta_title_dynamic = 'gs_metatitle_'.$get_lang_code;
				@endphp
				<div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Meta title({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="meta_title_{{ $get_lang_name }}" name="meta_title_<?php echo $get_lang_name; ?>" placeholder="Enter Meta Title In {{ $get_lang_name }}" class="form-control" value="{!!$gen_set->$meta_title_dynamic!!}" type="text">
                    </div>
                </div>
				@endforeach
				@endif
				
                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_META_KEYWORDS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_META_KEYWORDS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_META_KEYWORDS') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" name="meta_key" placeholder="Enter Meta Keywords {{ $default_lang }}" id="meta_key">{!!$gen_set->gs_metakeywords!!}</textarea>
                    </div>
                </div>
				
				 @if(!empty($get_active_lang))  
				@foreach($get_active_lang as $get_lang) 
				@php
				$get_lang_code = $get_lang->lang_code;
				$get_lang_name = $get_lang->lang_name;
				$metakeywords_dynamic = 'gs_metakeywords_'.$get_lang_code;
				@endphp
				<div class="form-group">
                    <label class="control-label col-lg-2">Meta keywords({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" name="meta_key_<?php echo $get_lang_name; ?>"  id="meta_key_<?php echo $get_lang_name; ?>" placeholder="Enter Meta keywords In {{ $get_lang_name }}">{!!$gen_set->$metakeywords_dynamic!!}</textarea>
                    </div>
                </div>
				@endforeach
				@endif

                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_META_DESCRIPTION') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <textarea class="form-control" name="meta_desc" placeholder="Enter Meta Description {{ $default_lang }}" id="meta_desc">{!!$gen_set->gs_metadesc!!}</textarea>
                    </div>
                </div>
				
				 @if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				@php 
				$get_lang_code = $get_lang->lang_code;
				$get_lang_name = $get_lang->lang_name;
				$metadesc_dynamic = 'gs_metadesc_'.$get_lang_code;
				@endphp
				<div class="form-group">
                    <label class="control-label col-lg-2">Meta description({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <textarea class="form-control" name="meta_desc_{{ $get_lang_name }}"  id="meta_desc_{{ $get_lang_name }}" placeholder="Enter Meta Description In {{ $get_lang_name }}">{!!$gen_set->$metadesc_dynamic!!}</textarea>
                    </div>
                </div>
				@endforeach
				@endif
				
                <div id='dev_payment_er' style="display: none; color:#fa0a0a;"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ENABLE_DISABLE_COD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ENABLE_DISABLE_COD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ENABLE_DISABLE_COD') }}</label>

                    <div class="col-lg-8">
                          <input type="checkbox" class="dev_paymentMethod" value="COD" name="payment_status" <?php if($gen_set->gs_payment_status == 'COD'){ ?> checked <?php } ?>> <label class="sample">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COD') }}</label>
                   </div>
                    
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ENABLE_DISABLE_PAYPAL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ENABLE_DISABLE_PAYPAL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ENABLE_DISABLE_PAYPAL') }}</label>

                    <div class="col-lg-8">
                          <input type="checkbox" class="dev_paymentMethod" value="Paypal" name="paypal_payment_status" <?php if($gen_set->gs_paypal_payment == 'Paypal'){ ?> checked <?php } ?>> <label class="sample">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PAYPAL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYPAL') }}</label>
                   </div>
                    
                </div>

                {{-- For payumoney --}}

                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ENABLE_DISABLE_PAYUMONEY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ENABLE_DISABLE_PAYUMONEY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ENABLE_DISABLE_PAYUMONEY') }}</label>

                    <div class="col-lg-8">
                          <input type="checkbox" class="dev_paymentMethod" value="PayUmoney" name="payumoney_payment_status" <?php if($gen_set->gs_payumoney_status == 'PayUmoney'){ ?> checked <?php } ?>> <label class="sample">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PAYUMONEY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PAYUMONEY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PAYUMONEY') }}</label>
                   </div>
                    
                </div>

				<div class="form-group">
				{{ Form::label('','Play Store Url',['class' => 'control-label col-lg-2']) }}
                    

                    <div class="col-lg-8">
                        <input id="playstore_url" name="playstore_url" placeholder="Enter Play Store Url" class="form-control" value="{!!$gen_set->gs_playstore_url!!}" type="url">
                   </div>
                    
                </div>
				<div class="form-group">
				{{ Form::label('','App Store (iOS)',['class' => 'control-label col-lg-2']) }}
                    

                    <div class="col-lg-8">
                        <input id="apple_appstore_url" name="apple_appstore_url" placeholder="Enter App Store (iOS)" class="form-control" value="{!!$gen_set->gs_apple_appstore_url!!}" type="url">
                   </div>
                    
                </div>
                   <!--div class="form-group">
                    <label class="control-label col-lg-2">Themes</label>

                    <div class="col-lg-8">
                          <select class="validate[required] form-control"  name="themes">
                          <option value="blue" <?php //if($gen_set->gs_themes == 'blue'){ ?> selected <?php //} ?>>Blue</option>
                          <option value="green" <?php //if($gen_set->gs_themes == 'green'){ ?> selected <?php //} ?>>Green</option>
                        
                        </select>
                   </div>
                    
                </div-->

               <?php /*?> <div class="form-group">
                    <label for="text2"  class="control-label col-lg-2">Default Theme<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="theme_select">
                       @foreach($theme_list as $theme)
              			<option value="{!!$theme->the_id!!}" <?php if($gen_set->gs_defaulttheme ==$theme->the_id){?> selected <?php } ?>>{!!$theme->the_Name!!}</option>
		            @endforeach
              		</select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="limiter" class="control-label col-lg-2">Default Language<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="lang_select">
         	  @foreach($language_list as $lng)
              			<option value="{!!$lng->la_id!!}" <?php if($gen_set->gs_defaultlanguage ==$lng->la_id){?> selected <?php } ?>>{!!$lng->la_name!!}</option>
		            @endforeach
       		 </select>
                    </div>
                </div><?php */?>

              

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" onclick =" return dev_paymentMethodExist();" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                     <button type="reset" class="btn btn-danger btn-sm btn-grad" style="color:#ffffff;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button>
                   
                    </div>
					  
                </div>
			@endforeach
                
         {!!Form::close()!!}
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

    <!-- END GLOBAL SCRIPTS -->   

    {{--- check for atleast one payment menthod enabled ornot ---}}

    <script type="text/javascript">
        function dev_paymentMethodExist() {
            paymentExist =0;
            $('.dev_paymentMethod:checked').each(function() {
                paymentExist = paymentExist+1; 
            }); 
            if(paymentExist>0)
                return true;
            else {

                var er_msge = '';
                <?php 
                if(Lang::has(Session::get('lang_file').'.BACK_PLEASE_SELECT_MINIMUM_PAYMENT_METHOD')!= '') { ?>             
                er_msge = '<?php echo trans(Session::get('lang_file').'.BACK_PLEASE_SELECT_MINIMUM_PAYMENT_METHOD') ;?>'; 
                <?php  }           
                else { ?>
                    er_msge = '<?php echo  trans($ADMIN_OUR_LANGUAGE.'.BACK_PLEASE_SELECT_MINIMUM_PAYMENT_METHOD')?>';
                <?php } ?>
                 
                $("#dev_payment_er").css("display","block");
                $("#dev_payment_er").html(er_msge);
                $("#dev_payment_er").fadeOut(3500);

            
                return false;
            }
        }
    </script>


    <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
     
</body>
     <!-- END BODY -->
</html>
