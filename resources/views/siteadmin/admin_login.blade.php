<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>{{ $SITENAME}} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_LOGIN')!= '') ? trans(Session::get('admin_lang_file').'.BACK_ADMIN_LOGIN') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_LOGIN') }} </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="_token" content="{!! csrf_token() !!}"/>

     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="public/assets/css/login.css" />
    <link rel="stylesheet" href="public/assets/plugins/magic/magic.css" />
	<?php $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); ?>
      @if(count($favi)>0)  @foreach($favi as $fav)  @endforeach 
    <link rel="shortcut icon" href="{{ url('')}}/public/assets/favicon/ {{ $fav->imgs_name }} ">
 @endif 
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); ?>
      @if(count($favi)>0)  @foreach($favi as $fav)  @endforeach 
    <link rel="shortcut icon" href="{{ url('')}}/public/assets/favicon/ {{ $fav->imgs_name }} ">
 @endif  
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body style="background:url(assets/img/bg1.jpg) no-repeat center; -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;" oncontextmenu="return false" >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
	   	  <img src="{{ $SITE_LOGO }}" alt="Logo" /></a>
       
    </div>
    
    
    <div class="tab-content">
    
        <div id="login" class="tab-pane active">
        
             {!! Form::open(array('url'=>'login_check','class'=>'form-signin')) !!}
              @if (Session::has('login_error'))
		<div class="alert alert-danger alert-dismissable" id="error_div" align="center" style="height:50px;width:298px;">{!! Session::get('login_error') !!}</div>
		@endif
        @if (Session::has('login_success'))
		<div class="alert alert-success alert-dismissable" id="success_div" align="center" style="height:50px;width:298px;">{!! Session::get('login_success') !!}</div>
		@endif
        
                <p class="text-muted text-center btn-block  btn-primary    disabled">
                    {{ (Lang::has(Session::get('admin_lang_file').'.BACK_C_ADMIN_LOGIN')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_C_ADMIN_LOGIN') : trans($ADMIN_OUR_LANGUAGE.'.BACK_C_ADMIN_LOGIN') }}
                </p>
				
                <input type="text"  value="{{ Input::old('admin_name')}}" placeholder="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER_NAME'): trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_NAME')}}" name="admin_name" class="form-control" tabindex="1" autofocus />
                <input type="password" placeholder="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PASSWORD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PASSWORD'): trans($ADMIN_OUR_LANGUAGE.'.BACK_PASSWORD')}}" name="admin_pass" class="form-control" />
                <center><button class="btn text-muted text-center  btn-warning" type="submit">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SIGN_IN')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SIGN_IN') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SIGN_IN') }}</button></center>
            {{ Form::close() }}
            
        </div>
        
           
        <div id="forgot" class="tab-pane">
            {!! Form::open(array('url'=>'forgot_check','class'=>'form-signin')) !!}
             @if (Session::has('forgot_error'))
		<div class="alert alert-danger alert-dismissable" id="forgot_error_div" align="center" style="height:50px;width:298px;">{!! Session::get('forgot_error') !!}</div>
		@endif
        @if (Session::has('forgot_success'))
		<div class="alert alert-success alert-dismissable" id="forgot_success_div" align="center" style="height:50px;width:298px;">{!! Session::get('forgot_success') !!}</div>
		@endif
            <div class="alert alert-danger alert-dismissable" id="error_name" align="center" style="height:50px;width:298px;display:none;"></div>
                <p class="text-muted text-center btn-block btn-primary btn-rect disabled">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_VALID_EMAIL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ENTER_VALID_EMAIL'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_VALID_EMAIL')}}</p>
                <input type="email"  required="required" name="admin_email" id="admin_email" placeholder="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_YOUR_EMAIL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_YOUR_EMAIL'): trans($ADMIN_OUR_LANGUAGE.'.BACK_YOUR_EMAIL')}}"   class="form-control"  />
                <br />
                <button class="btn text-muted text-center btn-success" id="recover_password" type="submit">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RECOVER_PASSWORD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_RECOVER_PASSWORD') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RECOVER_PASSWORD')}}</button>
            {{ Form::close() }}
        </div>
        <div id="signup" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FILL_DETAILS_TO_REGISTER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FILL_DETAILS_TO_REGISTER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FILL_DETAILS_TO_REGISTER')}}</p>
                {{ Form::text('','',array('placeholder' => 'First Name', 'class' => 'form-control')) }}
                {{ Form::text('','',array('placeholder' => 'Last Name', 'class' => 'form-control')) }}
                {{ Form::text('','',array('placeholder' => 'Username', 'class' => 'form-control')) }}
                {{ Form::email('','',array('placeholder' => 'Your E-mail', 'class' => 'form-control')) }}
                {{ Form::password('',array('placeholder' => 'password', 'class' => 'form-control')) }}
                {{ Form::password('',array('placeholder' => 'Re type password', 'class' => 'form-control')) }}
                               
                <button class="btn text-muted text-center btn-success" type="submit">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_REGISTER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_REGISTER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_REGISTER')}}</button>
            </form>
        </div>
    </div>
    <div class="text-center ">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" style="display:none;" id="login_click" data-toggle="tab">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BACK_TO_LOGIN')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BACK_TO_LOGIN') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BACK_TO_LOGIN') }}</a></li>
            <li><b><a class="text-muted" href="#forgot" id="forgot_click" data-toggle="tab">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FORGOT_PASSWORD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FORGOT_PASSWORD'): trans($ADMIN_OUR_LANGUAGE.'.BACK_FORGOT_PASSWORD')}}</a></b></li>
           <!-- <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>-->
        </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
   <script src="public/assets/plugins/jquery-2.0.3.min.js"></script>
   
   <script>
   $(document).ready(function(){
	   
	   $('#forgot_click').click(function(){

		   $('#login_click').show();
		   $('#admin_email').focus();
		   $('#forgot_click').hide();
		   $('#error_div').hide();
	  	 $('#success_div').hide();
		   });
	  $('#login_click').click(function(){
		   $('#forgot_click').show();
		   $('#login_click').hide();
		   $('#forgot_error_div').hide();
	   		$('#forgot_success_div').hide();
     	  });
	   $('#error_div').fadeOut(4000);
	   $('#success_div').fadeOut(4000);
	   $('#forgot_error_div').fadeOut(4000);
	   $('#forgot_success_div').fadeOut(4000); 
	   
	  $('#recover_password').click(function(){
		  var admin_email = $('#admin_email');
		  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  if(admin_email.val() == '')
		  {
			$('#error_name').show();
			admin_email.css({border:'1px solid red'});
			admin_email.focus();
			$('#error_name').html('Enter your email');
			 $('#error_name').fadeOut(4000);
			return false;
			}
			else if(!emailReg.test(admin_email.val()))
			{
			$('#error_name').show();
			admin_email.css({border:'1px solid red'});
			admin_email.focus();
			$('#error_name').html('Enter your valid Email');
			$('#error_name').fadeOut(4000);
			return false;
			}
			else
			{
				$('#error_name').hide();
				admin_email.css({border:''});
			}
		  
		  });
		  <?php if(Session::has('forgot_error') || Session::has('forgot_success')){?>
		   $('#forgot_click').click();
		   		   
		   <?php } ?>
	   });
   
   </script>
   
   
   
   <script src="public/assets/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="public/assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->
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
