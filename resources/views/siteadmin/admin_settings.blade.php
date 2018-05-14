<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_SETTINGS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_ADMIN_SETTINGS') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_SETTINGS') }}</title>
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
     <?php $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); ?>
      @if(count($favi)>0)  @foreach($favi as $fav)  @endforeach 
    <link rel="shortcut icon" href="{{ url('')}}/public/assets/favicon/ {{ $fav->imgs_name }} ">
 @endif   
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
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
       
        <!--END MENU SECTION -->

        <div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                            <ul class="breadcrumb">
                                <li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADMIN_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_SETTINGS') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_SETTINGS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADMIN_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_SETTINGS') }}</h5>
          
        </header>
         @if ($errors->any())
         <br>
         <ul style="color:red;">
        <div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
            {{ Form::button('×',['class' => 'close', 'data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
         
        </div>
        </ul>   
        @endif
         @if (Session::has('success'))
        <div class="alert alert-success alert-dismissable">{!! Session::get('success') !!}
        {{ Form::button('×',['class' => 'close', 'data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}</div>
        @endif
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'admin_settings_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')) !!}
              @foreach($admin_setting_details as $admin_get) @endforeach
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FIRST_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FIRST_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FIRST_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        {{ Form::text('first_name',$admin_get->adm_fname,['id' => 'text1','class' =>'form-control']) }}
                        
                    </div>
                </div>

                 <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_LAST_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_LAST_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_LAST_NAME')}}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                         {{ Form::text('last_name',$admin_get->adm_lname,['id' => 'text1','class' =>'form-control']) }}
                        
                    </div>
                </div>
                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_OLD_PASSWORD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_OLD_PASSWORD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_OLD_PASSWORD')}}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">

                        <input id="password" placeholder="" name="old_password" class="form-control" value="<?php echo $admin_get->adm_password; ?>" type="password">
                    </div>
                </div>
                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_NEW_PASSWORD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_NEW_PASSWORD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NEW_PASSWORD') }}<span class="text-sub"></span></label>

                    <div class="col-lg-7">
                        <input id="text1" placeholder="" name="new_password" class="form-control" value="" type="password">
                    </div>
                </div>
                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EMAIL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        {{ Form::text('email',$admin_get->adm_email,['id' => 'text1','class' =>'form-control']) }}
                        
                    </div>
                </div>
                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PHONE_NUMBER')!= '') ? trans(Session::get('admin_lang_file').'.BACK_PHONE_NUMBER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PHONE_NUMBER') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        {{ Form::text('phone',$admin_get->adm_phone,['id' => 'text1','class' =>'form-control']) }}
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS1')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADDRESS1') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS1')}}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        {{ Form::text('address_one',$admin_get->adm_address1,['id' => 'text1','class' =>'form-control']) }}
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS2')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADDRESS2') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS2') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        {{ Form::text('address_two',$admin_get->adm_address2,['id' => 'text1','class' =>'form-control']) }}
                        
                    </div>
                </div>
                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COUNTRY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                      <select class="form-control" name="country" id="select_mer_country" onChange="select_mer_city_ajax(this.value)" >
                        <option value="">-- {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SELECT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT') }}--</option>
                          @foreach($country_details as $country_fetch)
                         <option value="<?php echo $country_fetch->co_id; ?>"  <?php if($country_fetch->co_id == $admin_get->adm_co_id){ echo 'selected'; } ?> ><?php echo $country_fetch->co_name; ?></option>
                           @endforeach
                         </select>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CITY')!= '') ? trans(Session::get('admin_lang_file').'.BACK_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
           <select class="form-control" name="city" id="select_mer_city" >
                        <option value="">--{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SELECT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT') }}--</option>
                  </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-lg-3" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-7">
                     <button class="btn btn-warning btn-sm btn-grad" type="submit" ><a style="color:#fff" >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</a></button>
                     <a href="{{ url('siteadmin_dashboard') }}" style="color:#000" class="btn btn-default btn-sm btn-grad" >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BACK')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BACK')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_BACK') }}</a>
                   
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
     {!! $adminfooter !!}
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
    <script>
    $( document ).ready(function() {
             var passData = 'city_id_ajax=<?php echo $admin_get->adm_ci_id; ?>';
         //alert(passData);
           $.ajax( {
                  type: 'get',
                  data: {'city_id_ajax':'<?php echo $admin_get->adm_ci_id; ?>','country_id_ajax':'<?php echo $admin_get->adm_co_id; ?>'},
                  url: '<?php echo url('ajax_select_city_edit'); ?>',
                  success: function(responseText){  
                 // alert(responseText);
                   if(responseText)
                   { 
                    $('#select_mer_city').html(responseText);                      
                   }
                }       
            });
    });
    function select_mer_city_ajax(city_id)
    {
         var passData = 'city_id='+city_id;
        // alert(passData);
           $.ajax( {
                  type: 'get',
                  data: passData,
                  url: '<?php echo url('ajax_select_city'); ?>',
                  success: function(responseText){  
                 // alert(responseText);
                   if(responseText)
                   { 
                    $('#select_mer_city').html(responseText);                      
                   }
                }       
            }); 
    }
    </script>
     <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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


<!---F12 Block Code---->
<script type='text/javascript'>
$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
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
