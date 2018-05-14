<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $SITENAME;?></title>

<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>

<body>
<table border="0" cellspacing="0" cellpadding="0" width="600" align="center" style="border:1px solid #cccccc; background:#ffffff;font-family: Montserrat;">

  
  <tr> 
   <?php 
   clearstatcache();
    $logo = url('').'/public/assets/default_image/Logo.png'; $logo = $SITE_LOGO;
    if(file_exists($SITE_LOGO))
      $logo = $SITE_LOGO;
    ?>  
          <td align="center" style="background:#f5f5f5;"><img src="{{ $logo }}" alt="{{ $site_name }}" style="margin:20px 0px;"/></td>
  </tr>

  <tr>
    <td style="height:30px; padding-left: 10px;"><b>{{ (Lang::has(Session::get('lang_file').'.PASSWORD_RECOVERY_DETAILS_FOR_USER')!= '') ?  trans(Session::get('lang_file').'.PASSWORD_RECOVERY_DETAILS_FOR_USER'): trans($OUR_LANGUAGE.'.PASSWORD_RECOVERY_DETAILS_FOR_USER')}}.</b></td>
  </tr>
  <tr>
     <td style=" margin:0 auto; font-size:15px;text-align:left;  padding:10px;">
      <table width="80%" align="center">
        <tr>
            <td colspan="2" align="center"><h4 style="color:#F60;" > {{ (Lang::has(Session::get('lang_file').'.YOUR_LOGIN_CREDENTIALS_ARE')!= '') ? trans(Session::get('lang_file').'.YOUR_LOGIN_CREDENTIALS_ARE'): trans($OUR_LANGUAGE.'.YOUR_LOGIN_CREDENTIALS_ARE') }}</h4> </td>            
            </tr>
          <tr>
            <td style="padding: 10px 0px;">{{ (Lang::has(Session::get('lang_file').'.USER_NAME')!= '') ?  trans(Session::get('lang_file').'.E-MAIL_ID') : trans($OUR_LANGUAGE.'.USER_NAME') }}</td>
           
       <!--<td >{{ $name }}</td>-->
              <td style="padding: 10px 0px;">{{ $email }}</td>
          </tr>
          <tr>     
   <td style="padding: 10px 0px;"> {{ (Lang::has(Session::get('lang_file').'.EMAIL_LINK')!= '') ?  trans(Session::get('lang_file').'.EMAIL_LINK') : trans($OUR_LANGUAGE.'.EMAIL_LINK') }}</td>
          
              <td style="padding: 10px 0px;"><a href="{{ url('user_forgot_pwd_email/'.$encodeemail)}}">{{ (Lang::has(Session::get('lang_file').'.PLEASE_CLICK_THE_LINK_TO_RESET_YOUR_PASSWORD')!= '') ?  trans(Session::get('lang_file').'.PLEASE_CLICK_THE_LINK_TO_RESET_YOUR_PASSWORD') : trans($OUR_LANGUAGE.'.PLEASE_CLICK_THE_LINK_TO_RESET_YOUR_PASSWORD') }}!</a></td>
            </tr>
          </table>
     </td>
  </tr>  
<tr>
 <a href="{{ url('forgot_pwd_email/'.$encodeemail) }}"></a>
</tr>
  <tr bgcolor="#f5f5f5">
    <td style="height:50px;text-align:center; font-size:14px;"><a href="{{ url('') }}" target="_blank"  style="text-decoration:none;color:#333333;font-weight:800;"> &copy; {{ date('Y') }}&nbsp;{{ $SITENAME }}</a></td>
  </tr>

 </table>
</body>
</html>
