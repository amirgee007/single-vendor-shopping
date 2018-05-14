<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{ $SITENAME }}</title>
</head>

<body>
<table border="0" cellspacing="0" cellpadding="0" width="600" align="center" style="border:2px solid #ff8400;">

  <tr bgcolor="#fff">
    <td style="height:20px;">&nbsp;</td>
  </tr>
  <tr bgcolor="#fff">  
     <?php 
      $logo = url('').'/public/assets/default_image/Logo.png'; $logo = $SITE_LOGO;
      if(file_exists($SITE_LOGO))
        $logo = $SITE_LOGO;
      ?> 
          <td align="center"><img src="<?php echo $logo; ?>" alt="<?php echo $site_name; ?>" style="margin:0 30px 20px 40px;"/></td>
  </tr>
  <tr>
    <td style="border:3px solid #fff;"></td>
  </tr>
  <tr>
    <td style="border:1px solid #ff8400;height:30px;"><b><?php if (Lang::has(Session::get('lang_file').'.PASSWORD_RECOVERY_DETAILS_FOR_USER')!= '') { echo  trans(Session::get('lang_file').'.PASSWORD_RECOVERY_DETAILS_FOR_USER');}  else { echo trans($OUR_LANGUAGE.'.PASSWORD_RECOVERY_DETAILS_FOR_USER');} ?>.</b></td>
  </tr>
  <tr>
     <td style=" margin:0 auto; font-size:16px;text-align:left; font-family:Arial, Helvetica, sans-serif; padding:10px 10px 10px;">
        <table  cellspacing="10">
        <tr>
            <th colspan="3" ><h4 style="color:#F60;" ><?php if (Lang::has(Session::get('lang_file').'.YOUR_LOGIN_CREDENTIALS_ARE')!= '') { echo  trans(Session::get('lang_file').'.YOUR_LOGIN_CREDENTIALS_ARE');}  else { echo trans($OUR_LANGUAGE.'.YOUR_LOGIN_CREDENTIALS_ARE');} ?>: </h4> </th>            
            </tr>
          <tr>
            <th><?php if (Lang::has(Session::get('lang_file').'.USER_NAME')!= '') { echo  trans(Session::get('lang_file').'.USER_NAME');}  else { echo trans($OUR_LANGUAGE.'.USER_NAME');} ?></th>
             <th>:</th>
              <td >{{ $name }}</td>
          </tr>
          <tr>     
	 <th><?php if (Lang::has(Session::get('lang_file').'.EMAIL_LINK')!= '') { echo  trans(Session::get('lang_file').'.EMAIL_LINK');}  else { echo trans($OUR_LANGUAGE.'.EMAIL_LINK');} ?></th>
             <th>:</th>
              <td ><a href="<?php echo url('user_forgot_pwd_email/'.$encodeemail); ?>"><?php if (Lang::has(Session::get('lang_file').'.PLEASE_CLICK_THE_LINK_TO_RESET_YOUR_PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_CLICK_THE_LINK_TO_RESET_YOUR_PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_CLICK_THE_LINK_TO_RESET_YOUR_PASSWORD');} ?>!</a></td>
            </tr>
          </table>
     </td>
  </tr>  
<tr>
 <a href="<?php echo url('forgot_pwd_email/'.$encodeemail); ?>"></a>
</tr>
  <tr bgcolor="#101010">
    <td style="height:50px;text-align:center;font-family:Arial, Helvetica, sans-serif; font-size:14px;"><a href="#" target="_blank"  style="text-decoration:none;color:#ff8400;font-weight:800;"> &copy; <?php echo date("Y"); ?> &nbsp; <?php echo $SITENAME; ?></a></td>
  </tr>

 </table>
</body>
</html>
