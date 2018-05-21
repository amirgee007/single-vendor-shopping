<?php

require_once('resources/views/9-1/settings.php');

?>

<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    
    <?php 
    $table_data = DB::table('nm_social_media')->first();

    if($metadetails){
    foreach($metadetails as $metainfo) {
        $metaname=$metainfo->gs_metatitle;
         $metakeywords=$metainfo->gs_metakeywords;
         $metadesc=$metainfo->gs_metadesc;
         }
         }
    else
    {
         $metaname="";
         $metakeywords="";
          $metadesc="";
    }
    ?>
     <title><?php echo $metaname  ;?></title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="<?php echo $metadesc  ;?>">
     <meta name="keywords" content="<?php echo  $metakeywords ;?>">
     <meta name="author" content="<?php echo  $metaname ;?>">
     <meta name="_token" content="{!! csrf_token() !!}"/>
	 <meta name="csrf-token" content="{{ csrf_token() }}" />
	 <!-- <script>
	 $(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });
});
	 </script>
Bootstrap style --> 

    <link id="callCss" rel="stylesheet" href="{{ url('') }}/themes/bootshop/bootstrap.min.css" media="screen"/>
    <?php //foreach($general as $gs) {} if($gs->gs_themes == 'blue') //{ ?>
    <!--link href="<?php echo url(''); ?>/themes/css/base.css" rel="stylesheet" media="screen"/-->
    <?php //} elseif($gs->gs_themes == 'green') //{ ?>
    <!--link href="<?php echo url(''); ?>/themes/css/green-theme.css" rel="stylesheet" media="screen"/-->
    <?php //} ?>
<link href="{{ url('') }}/themes/css/green-theme.css" rel="stylesheet" media="screen"/>
<link href="{{ url('') }}/themes/css/jquery.colorpanel.css" rel="stylesheet" media="screen"/>
<!-- validation (Register Page)(newsletter)-->
   <link href='https://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="{{ url('') }}/themes/css/simpleform.css">
   <!--<link rel="stylesheet" href="<?php echo url(''); ?>/themes/css/style.css">-->
   <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!-- Bootstrap style responsive-->  
    <link href="{{ url('') }}/themes/css/planing.css" rel="stylesheet"/>
    <link href="{{ url('') }}/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="{{ url('') }}/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->   
    <link href="{{ url('') }}/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- Google-code-prettify (Register Page)-->    
    <link href="{{ url('') }}/themes/css/jquery-gmaps-latlon-picker.css" rel="stylesheet"/>  
<!-- fav and touch icons -->
    <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); 
     foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('') }}/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('') }}/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{ url('') }}/themes/images/ico/apple-touch-icon-57-precomposed.png">
    
    <!--<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">-->
	 <link href="<?php echo url(''); ?>/themes/css/font-awesome/4.0.3/font-awesome.css" rel="stylesheet"/>
	 <link href="<?php echo url(''); ?>/themes/css/font-awesome/4.0.3/font-awesome.min.css" rel="stylesheet"/>
	 
	 
     <link rel="stylesheet" href="{{ url('') }}/themes/css/normalize.css" />
     <link rel="stylesheet" href="{{ url('') }}/themes/css/styles.min.css" />
     <link href="{{ url('') }}/themes/css/jplist.min.css" rel="stylesheet" type="text/css" />    
     <link href="{{ url('') }}/themes/css/leftmenu.css" rel="stylesheet" media="screen"/>
    
     <style type="text/css" id="enject"></style>
    
    
      <!-- <script src="<?php //echo url(''); ?>/themes/js/jquery-1.10.0.min.js"></script> -->
   <script src="<?php echo url(''); ?>/themes/js/modernizr.min.js"></script> 
      
        <link rel="stylesheet" type="text/css" href="{{ url('') }}/themes/css/compare-products/demo.css" />
        <link rel="stylesheet" type="text/css" href="{{ url('') }}/themes/css/compare-products/component.css" />
        <link href="{{ url('') }}/themes/css/leftmenu.css" rel="stylesheet" media="screen"/>
        <style type="text/css" id="enject"></style>
        <link href="{{ url('') }}/themes/css/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
 
        <script src="{{ url('') }}/themes/js/jquery-1.10.0.min.js"></script>
        <style type="text/css">
        .out-of-stock {
            background: #ad0d0d;
            color: white;
            font-family: lato !important;
            border: none;
            padding-top: 11px;
            border-radius: 3px;
            padding-bottom: 11px;
            /* padding-left: 21px; */
            font-size: 16px;
            padding-left: 11px;
            padding-right: 13px;
            float: right;
            margin-top: -42px;
        }   
        .gllpMap  { height: 228px; }

      input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0; 
        }

        .loginSuccess{
          background:#12792d;
          color:#ffffff;
        -webkit-transition-delay: 5s; /* Safari */
    transition-delay: 5s;
        }

/* loader*/

#loader {
 width: 100%;
 height: 100%;
 /*background-color:#0000003d;*/
 z-index: 999;
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
    z-index: 99999;
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
  z-index:9999;
  left: 0px;
}


        </style>

  </head>
<body>

@include('includes.facebook-messenger')

<?php
facebook_messenger("https://web.facebook.com/Xtreme-Bike-Suppliers-231200700761664/?_rdc=1&_rdr","http://single-vendor-shoping.seersol.com/public");
?>

{!! Zawuni::includeFiles() !!}

  <!--Loader & alert-->
<div id="loader" style="position: absolute; display: none;"><div class="loader-inner"></div>
 
  <div class="loader-section"></div>
</div>


<div id="loadalert" class="alert-success" style="margin-top:18px; display: none; position: fixed; z-index: 9999; width: 50%; text-align: center; left: 25%; padding: 10px;">
<a href="#" class="close" >×</a>
  <strong>Please Check Your Mail</strong>
</div>

     <!--Loader & alert-->

<div class="loginSuccess">
  
</div>


<div id="header">
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

<div id="welcomeLine" >
<div class="container">
  <div class="header-right" >
      <label style="font-size:14px; color:#fff;float:left;font-family: lato !important;"><a style="font-size:14px; color:#fff; float:left;font-family: lato !important;" href="#login" role="button" data-toggle="modal"><?php if (Lang::has(Session::get('lang_file').'.LOGIN')!= '') { echo  trans(Session::get('lang_file').'.LOGIN');}  else { echo trans($OUR_LANGUAGE.'.LOGIN');} ?></a> &nbsp;&nbsp;|&nbsp;&nbsp;</label>
        <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" style="display:none;" > 
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="login_close">×</button>
      <h3><?php if (Lang::has(Session::get('lang_file').'.LOGIN')!= '') { echo  trans(Session::get('lang_file').'.LOGIN');}  else { echo trans($OUR_LANGUAGE.'.LOGIN');} ?></h3>
      </div>
      <div class="modal-body" id="j">
<div id="logerror_msg"  style="color:#F00;font-weight:300"> </div>


      <div class="home-log-left">
        <div class="control-group" >               
        <input type="text" id="loginemail" placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_EMAIL_HERE')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_EMAIL_HERE');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_EMAIL_HERE');} ?>
" autofocus >
        </div>
        <div class="control-group">
        <input type="password" id="loginpassword" placeholder="<?php if (Lang::has(Session::get('lang_file').'.PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.PASSWORD');} ?>
 (<?php if (Lang::has(Session::get('lang_file').'.MIMIMUM_6_CHARACTERS')!= '') { echo  trans(Session::get('lang_file').'.MIMIMUM_6_CHARACTERS');}  else { echo trans($OUR_LANGUAGE.'.MIMIMUM_6_CHARACTERS');} ?>
)">
        </div>
        <div class="control-group">
        <a href="#login2" role="button" id="forgot_a_click" onclick="$('.close').click();" data-toggle="modal" style="padding-right:0"><?php if (Lang::has(Session::get('lang_file').'.FORGOT_PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.FORGOT_PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.FORGOT_PASSWORD');} ?>? &nbsp; <u>Click Here</u></a>
        <a href="#login45" role="button"   data-toggle="modal" style="padding-right:0"><button class="btn btn-mini" style="display:none;" id="reset_pass_click" value="<?php if (Lang::has(Session::get('lang_file').'.LOGIN')!= '') { echo  trans(Session::get('lang_file').'.LOGIN');}  else { echo trans($OUR_LANGUAGE.'.LOGIN');} ?>"></button></a>
        
        </div>
       <input type="hidden" id="return_url" value="<?php echo url('');?>" />
            
            <input type="button" id="login_submit" class="btn sub-mit" value="<?php if (Lang::has(Session::get('lang_file').'.LOGIN')!= '') { echo  trans(Session::get('lang_file').'.LOGIN');}  else { echo trans($OUR_LANGUAGE.'.LOGIN');} ?>" />
      <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true" id="login_close"><?php if (Lang::has(Session::get('lang_file').'.CLOSE')!= '') { echo  trans(Session::get('lang_file').'.CLOSE');}  else { echo trans($OUR_LANGUAGE.'.CLOSE');} ?></button>
            </div>  
            


            <div class="home-log-right" style="margin-top:8px; text-align:center"> 
            <span style="font-size:11px; color:#666; text-align:center; line-height:10px"><?php if (Lang::has(Session::get('lang_file').'.CONNECT_YOUR_FACEBOOK_ACCOUNT_FOR_SIGN_UP')!= '') { echo  trans(Session::get('lang_file').'.CONNECT_YOUR_FACEBOOK_ACCOUNT_FOR_SIGN_UP');}  else { echo trans($OUR_LANGUAGE.'.CONNECT_YOUR_FACEBOOK_ACCOUNT_FOR_SIGN_UP');} ?> <?php echo $SITENAME; ?>.</span><br>
              <a  onclick="fb_login()" class="facebook_login" style="margin-top:5px; margin-bottom:5px" >&nbsp;</a><br><!--<i class="icon-facebook"></i>Log in with Facebook</a>-->

			{{-- <a class="gl_login" href="https://accounts.google.com/o/oauth2/auth?scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fplus.me&amp;redirect_uri=http%3A%2F%2F192.168.0.62.xip.io%2FLaravelSingleVendor_v1.0%2Fgoogle_login&amp;response_type=code&amp;client_id=782885230420-rbpe9m9044krsto1dqchhr3p6am81ggh.apps.googleusercontent.com&amp;access_type=online" style="margin-top:5px; margin-bottom:5px"></a><br> --}}
			 
             <a class="gl_login" href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(GM_CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . GM_CLIENT_ID . '&access_type=online' ?>"  style="margin-top:5px; margin-bottom:5px" ></a><br> 
			 
	

                <?php if (Lang::has(Session::get('lang_file').'.DONT_HAVE_AN_ACCOUNT_YET')!= '') { echo  trans(Session::get('lang_file').'.DONT_HAVE_AN_ACCOUNT_YET');}  else { echo trans($OUR_LANGUAGE.'.DONT_HAVE_AN_ACCOUNT_YET');} ?>? <a href="<?php echo url("registers");?>"style="color:#ff8400;"><?php if (Lang::has(Session::get('lang_file').'.SIGN_UP')!= '') { echo  trans(Session::get('lang_file').'.SIGN_UP');}  else { echo trans($OUR_LANGUAGE.'.SIGN_UP');} ?></a>
            </div>






      </div>
  </div>
   <!--  <a  onclick="fb_login()"><span class="btn btn-mini btn-primary"><i class=" icon-facebook icon-white"></i> Facebook Login </span> </a>  -->
    
    <!--newly added-->

 <div id="login2" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login2" aria-hidden="false" style="height:220px;display:none;" >
      <div class="modal-header">
      <button type="button" onclick="reset();" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3><?php if (Lang::has(Session::get('lang_file').'.FORGOT_PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.FORGOT_PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.FORGOT_PASSWORD');} ?>?</h3>
      </div>
    <div id="uimsg" style="color:#F00;font-weight:400; margin-left: 15px;"></div>
      <div class="modal-body">
      <div class="home-log-left">
     
                <label><?php if (Lang::has(Session::get('lang_file').'.E-MAIL')!= '') { echo  trans(Session::get('lang_file').'.E-MAIL');}  else { echo trans($OUR_LANGUAGE.'.E-MAIL');} ?>&nbsp;*</label>
                <div clas="clearfix"></div>
                
        <div class="control-group" style="padding-left:0px;">               
        <input type="text" id="passwordemail" 
        placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_EMAIL')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_EMAIL');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_EMAIL');} ?>" >
        </div>
        <div class="control-group">
        
        </div>
              <input type="hidden" id="return_url" value="<?php echo url('');?>" />
 <input type="button" style="color:#fff"  id="reset_password" value="<?php if (Lang::has(Session::get('lang_file').'.SUBMIT')!= '') { echo  trans(Session::get('lang_file').'.SUBMIT');}  else { echo trans($OUR_LANGUAGE.'.SUBMIT');} ?>" class="btn btn-success"\>  
  <input type="submit"  style="color:#ffffff" onclick="$('.close').click(); reset();" id="cancel_password" value="<?php if (Lang::has(Session::get('lang_file').'.CANCEL')!= '') { echo  trans(Session::get('lang_file').'.CANCEL');}  else { echo trans($OUR_LANGUAGE.'.CANCEL');} ?>" class="btn btn-danger btn-sm btn-grad" \>   


            </div>  
            
            <div class="home-log-right" style="margin-top:8px; text-align:center"> 
            
            <span style="font-size:11px; color:#666; text-align:center; line-height:10px">
           <?php if (Lang::has(Session::get('lang_file').'.SIGN_IN_WITH_YOUR_FACEBOOK_ACCOUNT:_CONNECT_YOUR_FACEBOOK_ACCOUNT_TO_SIGN_IN_TO')!= '') { echo  trans(Session::get('lang_file').'.SIGN_IN_WITH_YOUR_FACEBOOK_ACCOUNT:_CONNECT_YOUR_FACEBOOK_ACCOUNT_TO_SIGN_IN_TO');}  else { echo trans($OUR_LANGUAGE.'.SIGN_IN_WITH_YOUR_FACEBOOK_ACCOUNT:_CONNECT_YOUR_FACEBOOK_ACCOUNT_TO_SIGN_IN_TO');} ?>&nbsp;<?php echo $SITENAME; ?>.</span><br> 
              <a onclick="btn btn-primary btn-large" class="facebook_login" style="margin-top:5px; margin-bottom:5px" ><!-- <i class="icon-facebook"></i><?php if (Lang::has(Session::get('lang_file').'.SIGN_UP_WITH_FACEBOOK')!= '') { echo  trans(Session::get('lang_file').'.SIGN_UP_WITH_FACEBOOK');}  else { echo trans($OUR_LANGUAGE.'.SIGN_UP_WITH_FACEBOOK');} ?>--></a><br>
                <?php if (Lang::has(Session::get('lang_file').'.ALREADY_A_MEMBER')!= '') { echo  trans(Session::get('lang_file').'.ALREADY_A_MEMBER');}  else { echo trans($OUR_LANGUAGE.'.ALREADY_A_MEMBER');} ?>? 

                  <a href="#login" onclick="$('.close').click();" role="button" data-toggle="modal" ><?php if (Lang::has(Session::get('lang_file').'.LOGIN')!= '') { echo  trans(Session::get('lang_file').'.LOGIN');}  else { echo trans($OUR_LANGUAGE.'.LOGIN');} ?></a>
            </div>
      </div>
  </div>
    
    <div id="login45" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login45" aria-hidden="false" style="height:280px;display:none;" >
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3><?php if (Lang::has(Session::get('lang_file').'.RESET_PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.RESET_PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.RESET_PASSWORD');} ?></h3>
      </div>
    <div id="passmsg" style="color:#F00;font-weight:400; margin-left: 15px;" ></div>
      <div class="modal-body">
      <div style="">
     

                <label style="text-align:left;"><?php if (Lang::has(Session::get('lang_file').'.NEW_PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.NEW_PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.NEW_PASSWORD');} ?>
&nbsp;*</label>
                
                
        <div class="control-group" style="padding-left:0px;">               
        <input type="password" id="passwordnew" placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_NEW_PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_NEW_PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_NEW_PASSWORD');} ?>" >
        </div>
              
              <label style="text-align:left;"><?php if (Lang::has(Session::get('lang_file').'.CONFIRM_PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.CONFIRM_PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.CONFIRM_PASSWORD');} ?>
&nbsp;*</label>
                
              <div class="control-group" style="padding-left:0px;">               
        <input type="password" id="passwordconfirmnew" placeholder="<?php if (Lang::has(Session::get('lang_file').'.CONFIRM_YOUR_NEW_PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.CONFIRM_YOUR_NEW_PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.CONFIRM_YOUR_NEW_PASSWORD');} ?>" >
                <input type="hidden" id="passsworduserid" value="<?php echo Session::get('reset_userid');?>"/>
        </div>
        <div class="control-group">
        
        </div>
              <input type="hidden" id="return_url" value="<?php echo url('');?>>" />
 <input type="button" style="color:#fff"  id="reset_new_password" value="<?php if (Lang::has(Session::get('lang_file').'.SUBMIT')!= '') { echo  trans(Session::get('lang_file').'.SUBMIT');}  else { echo trans($OUR_LANGUAGE.'.SUBMIT');} ?>" class="btn btn-success"\>  
  <input type="reset"  style="color:#ffffff"  id="cancel_password" value="<?php if (Lang::has(Session::get('lang_file').'.CANCEL')!= '') { echo  trans(Session::get('lang_file').'.CANCEL');}  else { echo trans($OUR_LANGUAGE.'.CANCEL');} ?>" class="btn btn-danger btn-sm btn-grad" \>              

            </div>  
<div class="clearfix" style="margin-top:8px; text-align:center"> 
            
            <br>
              
            </div>            
            
      </div>
  </div>
    <!--ended here-->

    <!--<a href="<?php //echo url('registers'); ?>" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-mini btn-warning" target="_self"> Register </span> </a>-->
    <a href="<?php echo url('registers'); ?>" style="font-size:14px; color:#fff;float:left;font-family: lato !important;"><?php if (Lang::has(Session::get('lang_file').'.REGISTER')!= '') { echo  trans(Session::get('lang_file').'.REGISTER');}  else { echo trans($OUR_LANGUAGE.'.REGISTER');} ?></a>
    <div id="register" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" style="display:none;">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3><?php if (Lang::has(Session::get('lang_file').'.REGISTER')!= '') { echo  trans(Session::get('lang_file').'.REGISTER');}  else { echo trans($OUR_LANGUAGE.'.REGISTER');} ?>
</h3>
      </div>
    <div id="error_msg"  style="color:#F00;font-weight:400"  > </div>
      <div class="modal-body">
      <div class="" style="float:left">
   
   {!! Form::open(array('url'=>'register_submit','class'=>'form-horizontal loginFrm')) !!}

        <div class="control-group">
                <label><?php if (Lang::has(Session::get('lang_file').'.NAME')!= '') { echo  trans(Session::get('lang_file').'.NAME');}  else { echo trans($OUR_LANGUAGE.'.NAME');} ?>
<span  style="color:#F00">*</span></label>               
        <input type="text" name="customername" id="inputregisterName" placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_NAME_HERE')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_NAME_HERE');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_NAME_HERE');} ?>">
        </div>
         <div class="control-group">
                <label><?php if (Lang::has(Session::get('lang_file').'.EMAIL')!= '') { echo  trans(Session::get('lang_file').'.EMAIL');}  else { echo trans($OUR_LANGUAGE.'.EMAIL');} ?>
<span  style="color:#F00">*</span></label>                
        <input type="text" name="email"  id="inputregisterEmail" placeholder="<?php if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_NAME_HERE')!= '') { echo  trans(Session::get('lang_file').'.ENTER_YOUR_NAME_HERE');}  else { echo trans($OUR_LANGUAGE.'.ENTER_YOUR_NAME_HERE');} ?>" onchange="check_email_ajax(this.value);">
        </div>
        <div class="control-group">
        <label><?php if (Lang::has(Session::get('lang_file').'.PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.PASSWORD');} ?>
<span  style="color:#F00">*</span></label> 
        <input type="password" name="pwd"  id="inputregisterPassword" placeholder="<?php if (Lang::has(Session::get('lang_file').'.PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.PASSWORD');} ?>">
        </div>
       
         <div class="control-group">
                <label><?php if (Lang::has(Session::get('lang_file').'.SELECT_COUNTRY')!= '') { echo  trans(Session::get('lang_file').'.SELECT_COUNTRY');}  else { echo trans($OUR_LANGUAGE.'.SELECT_COUNTRY');} ?><span  style="color:#F00">*</span></label>               
  <select class="form-control" name="selectcountry" id="selectcountry" onChange="get_city_list(this.value);">
           <option value="0">--<?php if (Lang::has(Session::get('lang_file').'.SELECT_COUNTRY')!= '') { echo  trans(Session::get('lang_file').'.SELECT_COUNTRY');}  else { echo trans($OUR_LANGUAGE.'.SELECT_COUNTRY');} ?>--</option>
      @foreach ($country_details as $country)
               <option  value="<?php echo $country->co_id;?>">{!!$country->co_name!!}</option>
               @endforeach 
           
        </select>
        </div>
  <div class="control-group">
                <label><?php if (Lang::has(Session::get('lang_file').'.SELECT_CITY')!= '') { echo  trans(Session::get('lang_file').'.SELECT_CITY');}  else { echo trans($OUR_LANGUAGE.'.SELECT_CITY');} ?>
<span  style="color:#F00">*</span></label>                
        <select class="form-control" name="selectcity" id="selectcity"  >
           <option value="0">--<?php if (Lang::has(Session::get('lang_file').'.SELECT_CITY')!= '') { echo  trans(Session::get('lang_file').'.SELECT_CITY');}  else { echo trans($OUR_LANGUAGE.'.SELECT_CITY');} ?>--</option>
       
      
        </select>
        </div>
              <input type="hidden" id="return_url" value="<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" />
        <p><?php if (Lang::has(Session::get('lang_file').'.BY_CLICKING_SIGN_UP_YOU_AGREE_TO')!= '') { echo  trans(Session::get('lang_file').'.BY_CLICKING_SIGN_UP_YOU_AGREE_TO');}  else { echo trans($OUR_LANGUAGE.'.BY_CLICKING_SIGN_UP_YOU_AGREE_TO');} ?>
 <br> <?php echo $SITENAME; ?>                  
                                <a href="<?php echo url('termsandconditons'); ?>" title="Terms and conditions" class="forget_link" style="color:#ff8400;" target="_blank" ><?php if (Lang::has(Session::get('lang_file').'.TERMS_AND_CONDITIONS')!= '') { echo  trans(Session::get('lang_file').'.TERMS_AND_CONDITIONS');}  else { echo trans($OUR_LANGUAGE.'.TERMS_AND_CONDITIONS');} ?>
</a>                 
                                </p>
                
        <input type="submit" id="register_submit" class="btn btn-warning" value="<?php if (Lang::has(Session::get('lang_file').'.SIGN_UP')!= '') { echo  trans(Session::get('lang_file').'.SIGN_UP');}  else { echo trans($OUR_LANGUAGE.'.SIGN_UP');} ?>" />
      </form>
            
            
      
            </div>  
                      
            
            <div class="clearfix" style="margin-top:68px; text-align:center"> 
            
            <span style="font-size:11px; color:#666; text-align:center; line-height:10px"><?php if (Lang::has(Session::get('lang_file').'.SIGN_IN_WITH_YOUR_FACEBOOK_ACCOUNT:_CONNECT_YOUR_FACEBOOK_ACCOUNT_TO_SIGN_IN_TO_LARAVEL_ECOMMERCE_MULTIVENDOR')!= '') { echo  trans(Session::get('lang_file').'.SIGN_IN_WITH_YOUR_FACEBOOK_ACCOUNT:_CONNECT_YOUR_FACEBOOK_ACCOUNT_TO_SIGN_IN_TO_LARAVEL_ECOMMERCE_MULTIVENDOR');}  else { echo trans($OUR_LANGUAGE.'.SIGN_IN_WITH_YOUR_FACEBOOK_ACCOUNT:_CONNECT_YOUR_FACEBOOK_ACCOUNT_TO_SIGN_IN_TO_LARAVEL_ECOMMERCE_MULTIVENDOR');} ?>.</span><br>
              <a onclick="fb_login()" class="btn btn-primary btn-large" style="margin-top:5px; margin-bottom:5px" ><i class="icon-facebook"></i><?php if (Lang::has(Session::get('lang_file').'.LOG_IN_WITH_FACEBOOK')!= '') { echo  trans(Session::get('lang_file').'.LOG_IN_WITH_FACEBOOK');}  else { echo trans($OUR_LANGUAGE.'.LOG_IN_WITH_FACEBOOK');} ?>
</a><br>
                <?php if (Lang::has(Session::get('lang_file').'.ALREADY_A_MEMBER')!= '') { echo  trans(Session::get('lang_file').'.ALREADY_A_MEMBER');}  else { echo trans($OUR_LANGUAGE.'.ALREADY_A_MEMBER');} ?>
? <a href="#login" onclick="$('.close').click();" role="button" data-toggle="modal" style="color:#ff8400;"><?php if (Lang::has(Session::get('lang_file').'.SIGN_IN')!= '') { echo  trans(Session::get('lang_file').'.SIGN_IN');}  else { echo trans($OUR_LANGUAGE.'.SIGN_IN');} ?>
</a>
            </div>
      </div>
  </div> 
    </div>
	
<!--Language drop down form-->
<?php if($Active_Language_count > 1) { ?>
	<select name="Language_change" id="Language_change" onchange="Lang_change()">
		<?php foreach($Active_Language as $Active_Lang) {?>
			<option value="{{$Active_Lang->lang_code}}" @if($selected_lang_code==$Active_Lang->lang_code)selected @endif >{{$Active_Lang->lang_name}}</option>
		<?php } ?>
	</select>
	<?php } ?>
	<div class="header-left" style="padding-top: 5px;color:white">
		<label style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="#">
		<a href="<?php echo url('help'); ?>"><span class="para" style="font-size:14px; color:#fff;float:left;font-family: lato !important;"><?php if (Lang::has(Session::get('lang_file').'.HELP')!= '') { echo  trans(Session::get('lang_file').'.HELP');}  else { echo trans($OUR_LANGUAGE.'.HELP');} ?></span></a>&nbsp;&nbsp;<span style="color:white">|</span>&nbsp;&nbsp;</label>   <span class="para" style="font-size:14px; color:#fff;float:left;font-family: lato !important;"><?php if (Lang::has(Session::get('lang_file').'.CUSTOMER_SUPPORT')!= '') { echo  trans(Session::get('lang_file').'.CUSTOMER_SUPPORT');}  else { echo trans($OUR_LANGUAGE.'.CUSTOMER_SUPPORT');} ?> ( 24x7 ) {{ Helper::customer_support_number() }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
	</div>
<!-- End Language drop down form-->		
	
</div>
</div>
<!--language user changes-->
<script type="text/javascript">
	function Lang_change() 
	{
		
		var language_code = $("#Language_change option:selected").val();
		
		$.ajax
		({
			type:'POST',
            url:"<?php echo url('new_change_languages');?>",
            data:{'language_code':language_code},
            success:function(data)
			{
				//alert(data);
				window.location.reload();
            }
        });
	}
</script>
<!-- End language user changes-->
<script>
  $( document ).ready(function() {
    <?php if(Session::has('reset_userid')){ ?>
      $('#reset_pass_click').click();
      
      <?php } ?>
      var cname    = $('#inputregisterName');
      var cemail     = $('#inputregisterEmail');
      var cpwd     = $('#inputregisterPassword');
      var loginemail    =$('#loginemail');
      var loginpassword =$('#loginpassword');
      var selectcity = $('#selectcity');
      var selectcountry = $('#selectcountry');
      var return_url = $('#return_url');

     $('#login_submit').click(function() {
      

    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(loginemail.val() == "")
    {
      loginemail.css('border', '1px solid red'); 
       
      loginemail.focus();
      return false;
    }
    else
    {
      loginemail.css('border', ''); 
       
    }

     if(!emailReg.test(loginemail.val()))
        {
          loginemail.css('border', '1px solid red'); 
           
          loginemail.focus();
          return false;
          
        }

    else
      {
      loginemail.css('border', ''); 
       

       }
    if(loginpassword.val() == "")
    {
      loginpassword.css('border', '1px solid red'); 
       
      loginpassword.focus();
      return false;
    }
    else
    {
      
      loginpassword.css('border', ''); 
      $('#logerror_msg').html('');

      var logemail=loginemail.val();
      var logpassword=loginpassword.val();
      var returl = return_url.val()
      
          var passemail = 'email='+logemail+"&pwd="+logpassword;
         
             $.ajax( {
               type: 'post',
            data: passemail,
              url: '<?php echo url('user_login_submit');?>',
           
            success: function(responseText,status){  
			/* alert(status+passemail);exit; */
      
            if(responseText)
            {  
				if(responseText.trim()=="success")
				{
			   

					 //$(".loginSuccess").html("<?php //if (Lang::has(Session::get('lang_file').'.LOGIN_SUCCESSFULLY')!= '') { echo  trans(Session::get('lang_file').'.LOGIN_SUCCESSFULLY');}  else { echo trans($OUR_LANGUAGE.'.LOGIN_SUCCESSFULLY');} ?>");

				//window.location=returl;

					/* $("#login").modal("hide"); */

					window.location.reload();
				}else if(responseText.trim()=="block"){
                $('#logerror_msg').html('<?php if (Lang::has(Session::get('lang_file').'.CUSTOMER_BLOCKED')!= '') { echo  trans(Session::get('lang_file').'.CUSTOMER_BLOCKED');}  else { echo trans($OUR_LANGUAGE.'.CUSTOMER_BLOCKED');} ?>');
            }
				else
				{
					$('#logerror_msg').html('<?php if (Lang::has(Session::get('lang_file').'.INVALID_LOGIN_CREDENTIALS')!= '') { echo  trans(Session::get('lang_file').'.INVALID_LOGIN_CREDENTIALS');}  else { echo trans($OUR_LANGUAGE.'.INVALID_LOGIN_CREDENTIALS');} ?>');
				}
                     
            }
        }
      });   





    }
    
    

    });




     $('#register_submit').click(function() {
 
    if(cname.val() == "")
    {
      cname.css('border', '1px solid red'); 
      cname.focus();
      return false;
    }
    else
    {
      cname.css('border', ''); 
       
    }
    
    if(cemail.val() == "")
    {
      cemail.css('border', '1px solid red'); 
      cemail.focus();
      return false;
    }
    
    else
    {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
       var cemail     = $('#inputregisterEmail');

         if(!emailReg.test(cemail.val()))
        {
          cemail.css('border', '1px solid red'); 
           
          cemail.focus();
          return false;
          
        }


        else
        {
          cpwd.css('border', ''); 
          var email=cemail.val();
          var passemail = 'email='+email;
             $.ajax( {
               type: 'get',
            data: passemail,
            url: 'register_emailcheck_ajax',
            success: function(responseText){  
            if(responseText)
            {    
            if(responseText==1)
            {
            $('#error_msg').html('<?php if (Lang::has(Session::get('lang_file').'.ALREADY_EMAIL_EXISTS')!= '') { echo  trans(Session::get('lang_file').'.ALREADY_EMAIL_EXISTS');}  else { echo trans($OUR_LANGUAGE.'.ALREADY_EMAIL_EXISTS');} ?>');
            cemail.css('border', '1px solid red'); 
            return false;
            }
            else
            {
            cemail.css('border', ''); 
            $('#error_msg').html('');
            
      

            }
                     
            }
        }   
      });   

        

        }
      
    }
    if(cpwd.val() == "")
    {
      //cpwd.css('border', '1px solid red'); 
      cpwd.focus();
      return false;
    }
    else
    {

        cpwd.css('border', ' '); 
       
      cpwd.focus();
       
    }
    if(selectcity.val() == 0)
    {
      selectcity.css('border', '1px solid red'); 
       
      selectcity.focus();
      return false;
    }
    else
    {
      selectcity.css('border', ''); 
      $('#error_msg').html('');
    }
    if(selectcountry.val() == 0)
    {
      selectcountry.css('border', '1px solid red'); 
       
      selectcountry.focus();
      return false;
    }
    else
    {
      selectcountry.css('border', ''); 
      $('#error_msg').html('');
    }
       
});


$('#reset_password').click(function() {

    var emailpwd = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if($('#passwordemail').val() == "")
    {
      $('#passwordemail').css('border', '1px solid red'); 
       
      $('#passwordemail').focus();
      return false;
    }
    else
    {
      $('#passwordemail').css('border', ''); 
      $('#ui').html('');
    }

     if(!emailpwd.test($('#passwordemail').val()))
      {
          $('#passwordemail').css('border', '1px solid red'); 
           
          $('#passwordemail').focus();
          return false;
          
      }

      else
          {


      $('#passwordemail').css('border',''); 
          var pwdemail=$('#passwordemail').val();
          var passpwdemail = 'pwdemail='+pwdemail;
           //alert(passpwdemail);
           $.ajax({
           type: 'get',
            data: passpwdemail,
            url: '<?php echo url('user_forgot_submit');?>',
            beforeSend: function() {
            //$("#uimsg").html("Please wait.....");
            document.getElementById("loader").style.display = "block";
        },

            success: function(responseText){
             document.getElementById("loader").style.display = "none";
            // $('#login2').modal("hide");
             //$('#login2').css("display","none");
           //$("#loadalert").css("display", "block");
         
           
             
            if(responseText=="success")
            { 
             
				$('#login2').modal("hide");
			  document.getElementById("loadalert").style.display = "block";
               setTimeout(function () {
               location.reload();  
            },500);
               //alert("Please check your mail for further instruction");
              //$('.close').click();
               

            $('#uimsg').html('<?php if (Lang::has(Session::get('lang_file').'.PLEASE_CHECK_YOUR_EMAIL_FOR_FURTHER_INSTRUCTIONS')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_CHECK_YOUR_EMAIL_FOR_FURTHER_INSTRUCTIONS');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_CHECK_YOUR_EMAIL_FOR_FURTHER_INSTRUCTIONS');} ?>');
			$('#passwordemail').val('');

      //$('#login2').toggle('slow');
            }
            else if(responseText=="fail")
            {
            $('#uimsg').html('<?php if (Lang::has(Session::get('lang_file').'.EMAIL_ID_DOES_NOT_EXIST')!= '') { echo  trans(Session::get('lang_file').'.EMAIL_ID_DOES_NOT_EXIST');}  else { echo trans($OUR_LANGUAGE.'.EMAIL_ID_DOES_NOT_EXIST');} ?>');
			
			       $('#passwordemail').val('');
            }
			
            
          }

        });
         
      } 
});


 $('#reset_new_password').click(function() {
    var emailpwd = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if($('#passwordnew').val() == "")
    {
      $('#passwordnew').css('border', '1px solid red'); 
       
      $('#passwordnew').focus();
      return false;
    }
    else
    {
      $('#passwordnew').css('border', ''); 
      $('#passmsg').html('');
    }
    if($('#passwordconfirmnew').val() == "")
    {
      $('#passwordconfirmnew').css('border', '1px solid red'); 
       
      $('#passwordconfirmnew').focus();
      return false;
    }
    else if($('#passwordconfirmnew').val()!= $('#passwordnew').val())
    {
      $('#passwordconfirmnew').css('border', '1px solid red'); 
       
      $('#passwordconfirmnew').focus();
      return false;
    }
    else
    {
      $('#passwordconfirmnew').css('border',''); 
          var newpwd=$('#passwordnew').val();
          var userid = $('#passsworduserid').val();
          var passnewpwd = 'newpwd='+newpwd+'&userid='+userid;
          
           $.ajax({
           type: 'get',
            data: passnewpwd,
            url: '<?php echo url('user_reset_password_submit');?>',
            success: function(responseText){  
             //alert(responseText);
            if(responseText=="success")
            {
            $('#passmsg').html('<?php if (Lang::has(Session::get('lang_file').'.PASSWORD_CHANGED_SUCCESS')!= '') { echo  trans(Session::get('lang_file').'.PASSWORD_CHANGED_SUCCESS');}  else { echo trans($OUR_LANGUAGE.'.PASSWORD_CHANGED_SUCCESS');} ?>');
            $('.close').click();
            $('#login_a_click').click();
            }
            else if(responseText=="fail")
            {
            $('#passmsg').html('<?php if (Lang::has(Session::get('lang_file').'.INVALID_USER')!= '') { echo  trans(Session::get('lang_file').'.INVALID_USER');}  else { echo trans($OUR_LANGUAGE.'.INVALID_USER');} ?>');

            }
            
          }

        });
    }
    

      
         
       
});

});

$('#login_close').click(function() 
  { 
  $('#loginemail').val('');
  $('#loginpassword').val('');
});

$('.close').click(function()
{
  $('#passwordemail').val('');
});

function check_email_ajax(email)
{
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

     if(!emailReg.test(cemail.val()))
      {
      cemail.css('border', '1px solid red'); 
       
      cemail.focus();
      return false;
      }

    else
      {
      var passemail = 'email='+email;
       $.ajax( {
            type: 'get',
          data: passemail,
          url: 'register_emailcheck',
          success: function(responseText){  
           if(responseText)
           {    
          if(responseText==1)
          {
          $('#error_msg').html('<?php if (Lang::has(Session::get('lang_file').'.ALREADY_EMAIL_EXISTS')!= '') { echo  trans(Session::get('lang_file').'.ALREADY_EMAIL_EXISTS');}  else { echo trans($OUR_LANGUAGE.'.ALREADY_EMAIL_EXISTS');} ?>');

          }
          else
          {
          cemail.css('border', ''); 
          $('#error_msg').html('');

          }
                     
           }
        }   
      });   




      }
       
}
function reset()
{
 $('#uimsg').html(''); 
}



function get_city_list(id)
  {
 
     var passcityid = 'id='+id;
       $.ajax( {
            type: 'get',
          data: passcityid,
          url: 'register_getcountry',
          success: function(responseText){  
     
           if(responseText)
           {   
          $('#selectcity').html(responseText);             
           }
        }   
      });   
  }
</script>

<?php /*<script src="<?php echo url('')?>/public/assets/js/facebook_sdk.js" type="text/javascript"></script> */ ?>
<script src="//connect.facebook.net/en_US/sdk.js" type="text/javascript"></script>
<script type="text/javascript">
window.fbAsyncInit = function() {
    FB.init({
        appId   : '<?php echo $table_data->sm_fb_app_id;?>',
        oauth   : true,
        status  : true, // check login status
        cookie  : true, // enable cookies to allow the server to access the session
        xfbml   : true, // parse XFBML
        version    : 'v2.8' // use graph api version 2.8
    });

  };

function fb_login()
{ 
  console.log( 'fb_login function initiated' );
	  FB.login(function(response) {

      console.log( 'login response' );
      console.log( response );
      console.log( 'Response Status' + response.status );
		//top.location.href=http://demo.Sundaroecommerce.com/;
      if (response.authResponse) {

        console.log( 'Auth success' );

    		FB.api("/me",'GET',{'fields':'id,email,verified,name'}, function(me){

      		if (me.id) {


            //console.log( 'Retrived user details from FB.api', me );

             var id = me.id; 
		var email = me.email;
            	var name = me.name;
                var live ='';
				if (me.hometown!= null)
				{			
					var live = me.hometown.name;
				}        
            	
    var passData = 'fid='+ id + '&email='+ email + '&name='+ name + '&live='+ live ;
 //alert(passData);
            //console.log('data', passData);
          
            $.ajax({
             type: 'GET',
            data: passData,
             //data: $.param(passData),
             global: false,
             url: '<?php echo url('facebooklogin'); ?>',
             success: function(responseText){ 
              console.log( responseText ); 
            
             location.reload();
             },
             error: function(xhr,status,error){
               console.log(status, status.responseText);
             }
           }); 

        }else{

          console.log('There was a problem with FB.api', me);

        }
      });

    }else{
      console.log( 'Auth Failed' );
    }

  }, {scope: 'email'});
}


function logout() {

        try {
        if (FB.getAccessToken() != null) {
            FB.logout(function(response) {
                // user is now logged out from facebook do your post request or just redirect
                window.location = "<?php echo url('facebook_logout'); ?>";
            });
        } else {
            // user is not logged in with facebook, maybe with something else
            window.location = "<?php echo url('facebook_logout'); ?>";
        }
    } catch (err) {
        // any errors just logout
        window.location = "<?php echo url('facebook_logout'); ?>";
    }
           /*  FB.logout(function(response) {
				    
                FB.getAuthResponse(null, 'unknown');
                //FB.Auth.getAuthResponse(null, 'unknown');
                 window.location = "<?php //echo url('facebook_logout'); ?>";
              //FB.logout();
               				console.log(response);

            }); */
}
</script>
   <script type="text/javascript">
   $( "#regForm" ).submit(function( event ) {    
  event.preventDefault();
  var $form = $( this ),
    data = $form.serialize(),
    url = $form.attr( "action" );
  var posting = $.post( url, { formData: data } );
  posting.done(function( data ) {
    if(data.fail) {
      $.each(data.errors, function( index, value ) {
        var errorDiv = '#'+index+'_error';
        $(errorDiv).addClass('required');
        $(errorDiv).empty().append(value);
      });
      $('#successMessage').empty();          
    } 
    if(data.success) {
        $('.register').fadeOut(); //hiding Reg form
        var successContent = '<div class="message"><h3>Registration Completed Successfully</h3><h4>Please Login With the Following Details</h4><div class="userDetails"><p><span>Email:</span>'+data.email+'</p><p><span>Password:********</span></p></div></div>';
      $('#successMessage').html(successContent);
    } //success
  }); //done
});
   </script>

  <?php if(isset($email_login)) {
               if($email_login)  { ?>
  <script>
    $(window).load(function() {
   $("#login").modal("show");
    });

  </script>


  <?php }} ?>
  
  
  