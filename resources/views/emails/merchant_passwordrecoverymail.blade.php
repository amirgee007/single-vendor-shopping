<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $SITENAME;?></title>
</head>

<body>
<table border="0" cellspacing="0" cellpadding="0" width="600" align="center" style="border:1px solid #cccccc;">

 
  <tr bgcolor="#f5f5f5">
   <?php 
        $logo = url('').'/public/assets/default_image/Logo.png'; $logo = $SITE_LOGO;
    if(file_exists($SITE_LOGO))
          $logo = $SITE_LOGO;
        ?>   
          <td align="center" colspan="2"><img src="<?php echo $logo; ?>" width="190" height="90" alt="<?php echo $SITENAME;?>" style="margin:20px 0px;"/> </td>
  </tr>
  <tr>
    <td style="height:30px; column-span: 2; padding-left: 40px;"><b><?php if (Lang::has(Session::get('mer_lang_file').'.MER_PASSWORD_RECOVERY_DETAILS_FOR_MERCHANT')!= '') { echo  trans(Session::get('mer_lang_file').'.MER_PASSWORD_RECOVERY_DETAILS_FOR_MERCHANT');}  else { echo trans($MER_OUR_LANGUAGE.'.MER_PASSWORD_RECOVERY_DETAILS_FOR_MERCHANT');} ?>.</b></td>
  </tr>
  <tr>
     <td colspan="2" style=" margin:0 auto; font-size:16px;text-align:center;padding:10px 10px 10px;">
       
       <h4 style="color:#F60;" > <?php if (Lang::has(Session::get('mer_lang_file').'.MER_YOUR_LOGIN_CREDENTIALS_ARE')!= '') { echo  trans(Session::get('mer_lang_file').'.MER_YOUR_LOGIN_CREDENTIALS_ARE');}  else { echo trans($MER_OUR_LANGUAGE.'.MER_YOUR_LOGIN_CREDENTIALS_ARE');} ?></h4>            
            
            </td>

         
           
          </tr>




<tr>
  <td colspan="2" style="padding: 10px 0px;">
    <table width="80%" align="center"><tr><td><?php if (Lang::has(Session::get('mer_lang_file').'.MER_EMAIL')!= '') { echo  trans(Session::get('mer_lang_file').'.MER_EMAIL');}  else { echo trans($MER_OUR_LANGUAGE.'.MER_EMAIL');} ?></td>
            
              <td>{{ $email }}</td></tr></table>
  </td>

</tr>

          <tr>

<td colspan="2" style="padding: 10px 0px 30px 0px;"> <table width="80%" align="center"><tr>   <td><?php if (Lang::has(Session::get('mer_lang_file').'.MER_EMAIL_LINK')!= '') { echo  trans(Session::get('mer_lang_file').'.MER_EMAIL_LINK');}  else { echo trans($MER_OUR_LANGUAGE.'.MER_EMAIL_LINK');} ?></td>
           
              <td ><a href="<?php echo url('forgot_pwd_email/'.$encodeemail); ?>"><?php if (Lang::has(Session::get('mer_lang_file').'.MER_PLEASE_CLICK_THE_LINK_TO_RESET_YOUR_PASSWORD')!= '') { echo  trans(Session::get('mer_lang_file').'.MER_PLEASE_CLICK_THE_LINK_TO_RESET_YOUR_PASSWORD');}  else { echo trans($MER_OUR_LANGUAGE.'.MER_PLEASE_CLICK_THE_LINK_TO_RESET_YOUR_PASSWORD');} ?>!</a></td></tr></table></td>


            </tr>
        
 
<tr>
 <a href="<?php echo url('forgot_pwd_email/'.$encodeemail); ?>"></a>
</tr>
  <tr bgcolor="#f5f5f5">
    <td colspan="2" style="height:50px;text-align:center; font-size:14px;"><a href="<?php echo url(''); ?>" target="_blank"  style="text-decoration:none;color:#333333;font-weight:800;"> &copy; <?php echo date("Y"); ?>&nbsp; <?php echo $SITENAME;?> </a></td>
  </tr>

 </table>
</body>
</html>
