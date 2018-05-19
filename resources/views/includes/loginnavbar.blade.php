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
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo url(''); ?>/themes/bootshop/bootstrap.min.css" media="screen"/>
    <?php //foreach($general as $gs) {} if($gs->gs_themes == 'blue') { ?>
    <!--link href="<?php echo url(''); ?>/themes/css/base.css" rel="stylesheet" media="screen"/-->
    <?php //} elseif($gs->gs_themes == 'green') { ?>
    <!--link href="<?php echo url(''); ?>/themes/css/green-theme.css" rel="stylesheet" media="screen"/-->
    <?php //} ?>
<link href="<?php echo url(''); ?>/themes/css/green-theme.css" rel="stylesheet" media="screen"/>
<link href="<?php echo url(''); ?>/themes/css/jquery.colorpanel.css" rel="stylesheet" media="screen"/>
<!-- validation (Register Page)(newsletter)-->
   <link href='https://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="<?php echo url(''); ?>/themes/css/simpleform.css">
   <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!-- Bootstrap style responsive-->  
    <link href="<?php echo url(''); ?>/themes/css/planing.css" rel="stylesheet"/>
    <link href="<?php echo url(''); ?>/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="<?php echo url(''); ?>/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->   
    <link href="<?php echo url(''); ?>/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- Google-code-prettify (Register Page)-->    
    <link href="<?php echo url(''); ?>/themes/css/jquery-gmaps-latlon-picker.css" rel="stylesheet"/>  
<!-- fav and touch icons -->
    <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo url(''); ?>/themes/images/ico/apple-touch-icon-57-precomposed.png">
    
     <!--<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">-->
	 <link href="<?php echo url(''); ?>/themes/css/font-awesome/4.0.3/font-awesome.css" rel="stylesheet"/>
	 <link href="<?php echo url(''); ?>/themes/css/font-awesome/4.0.3/font-awesome.min.css" rel="stylesheet"/>
	 
	 
     <link rel="stylesheet" href="<?php echo url(''); ?>/themes/css/normalize.css" />
     <link rel="stylesheet" href="<?php echo url(''); ?>/themes/css/styles.min.css" />
     <link href="<?php echo url(''); ?>/themes/css/jplist.min.css" rel="stylesheet" type="text/css" />    
     <link href="<?php echo url(''); ?>/themes/css/leftmenu.css" rel="stylesheet" media="screen"/>
    
     <style type="text/css" id="enject"></style>
    
    
        <script src="<?php echo url(''); ?>/themes/js/jquery-1.10.0.min.js"></script>
        <script src="<?php echo url(''); ?>/themes/js/modernizr.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo url(''); ?>/themes/css/compare-products/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo url(''); ?>/themes/css/compare-products/component.css" />
        <link href="<?php echo url(''); ?>/themes/css/leftmenu.css" rel="stylesheet" media="screen"/>
        <style type="text/css" id="enject"></style>
        <link href="<?php echo url(''); ?>/themes/css/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
 
        <script src="<?php echo url(''); ?>/themes/js/jquery-1.10.0.min.js"></script>
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
        </style>
  </head>
<body>

<div id="header">
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<script src="<?php echo url('')?>/public/assets/js/facebook_sdk.js" type="text/javascript"></script>
<div id="fb-root"></div>
<!--<script src="//connect.facebook.net/en_US/sdk.js" type="text/javascript"></script>-->
<script type="text/javascript">
window.fbAsyncInit = function() {
    FB.init({
        appId   : '1906185466333117',
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
              console.log(responseText); 
              //window.location.href = '<?php echo url('');?>';
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
                 window.location = "<?php echo url('facebook_logout'); ?>";
              //FB.logout();
               				console.log(response);

            }); */
}
</script>

	 
<div id="welcomeLine">
<div class="container">
<!--Language drop down form-->
	<?php if($Active_Language_count > 1) { ?>
	<select name="Language_change" id="Language_change" onchange="Lang_change()">
		<?php foreach($Active_Language as $Active_Lang) {?>
			<option value="{{$Active_Lang->lang_code}}" @if($selected_lang_code==$Active_Lang->lang_code)
				selected 
			@endif >{{$Active_Lang->lang_name}}</option>
		<?php } ?>
	</select> 
	<?php } ?>
	<div class="header-lefts animated wow fadeInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;padding-top:5px;">
          <label style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="#"><a href="<?php echo url('help'); ?>"><span class="para" style="font-size:14px; color:#fff;float:left;font-family: lato !important;"><?php if (Lang::has(Session::get('lang_file').'.HELP')!= '') { echo  trans(Session::get('lang_file').'.HELP');}  else { echo trans($OUR_LANGUAGE.'.HELP');} ?></span></a>&nbsp;&nbsp;<span style="color:white">|</span>&nbsp;&nbsp;</label>   <span class="para" style="font-size:14px; color:#fff;float:left;font-family: lato !important;"><?php if (Lang::has(Session::get('lang_file').'.CUSTOMER_SUPPORT')!= '') { echo  trans(Session::get('lang_file').'.CUSTOMER_SUPPORT');}  else { echo trans($OUR_LANGUAGE.'.CUSTOMER_SUPPORT');} ?> ( 24x7 ) {{ Helper::customer_support_number() }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
<!-- End Language drop down form-->	
	
    @if(Session::has('login_message'))
<p class="alert-dismissable" id="success">{{ Session::get('login_message') }}

<!-- <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> --> </p>
<?php Session::forget('login_message');?>
@endif

  
  <div class="header-rights">
    <label style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="#"><span class=""> <?php if (Lang::has(Session::get('lang_file').'.WELCOME')!= '') { echo  trans(Session::get('lang_file').'.WELCOME');}  else { echo trans($OUR_LANGUAGE.'.WELCOME');} ?></span>&nbsp;<a href="<?php echo url('user_profile');?>" class=
        "username-head" style="color: #ffc064;"><?php echo Session::get('user_name');?></a>&nbsp;&nbsp;|&nbsp;&nbsp;</label>
    
    <label style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="#"><a style="font-size:14px; color:#fff; float:left;font-family: lato !important;" href="<?php echo url('my_wishlist?id=4');?>#five"><span> <?php if (Lang::has(Session::get('lang_file').'.MY_WISHLIST')!= '') { echo  trans(Session::get('lang_file').'.MY_WISHLIST');}  else { echo trans($OUR_LANGUAGE.'.MY_WISHLIST');} ?></span></a>&nbsp;&nbsp;|&nbsp;&nbsp;</label>
        
    
    <?php $id = Session::get('customerid');
    $connect=DB::table('nm_customer')->where('cus_id','=',$id)->first();
          $status=$connect->cus_logintype;
        if($status == '3')
    {
    ?>
    <a style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="<?php echo url('facebook_logout'); ?>"><span><?php if (Lang::has(Session::get('lang_file').'.LOG_OUT')!= '') { echo  trans(Session::get('lang_file').'.LOG_OUT');}  else { echo trans($OUR_LANGUAGE.'.LOG_OUT');} ?></span></a>
    <?php } 
    elseif($status == '2'){?>
     <a style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="<?php echo url('user_logout');?>"><span><?php if (Lang::has(Session::get('lang_file').'.LOG_OUT')!= '') { echo  trans(Session::get('lang_file').'.LOG_OUT');}  else { echo trans($OUR_LANGUAGE.'.LOG_OUT');} ?></span></a>
    <?php } 

    elseif($status == '1' || $status == '4'){ ?>
     <a style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="<?php echo url('user_logout');?>"><span><?php if (Lang::has(Session::get('lang_file').'.LOG_OUT')!= '') { echo  trans(Session::get('lang_file').'.LOG_OUT');}  else { echo trans($OUR_LANGUAGE.'.LOG_OUT');} ?></span></a>
    <?php } ?>
     
  </div>
  
  </div>
</div>
<script>
$("#success").fadeIn(1300).delay(1500).fadeOut(1400);
</script>
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
				///alert(data);
				window.location.reload();
			}
        });
	}
</script>
<!-- End language user changes-->