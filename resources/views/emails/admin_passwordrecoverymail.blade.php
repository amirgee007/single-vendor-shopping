<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $SITENAME;?></title>
</head>

<body>
<table border="0" cellspacing="0" cellpadding="0" width="600" align="center" style="border:1px solid #cccccc; font-family: Montserrat;">

  <tr style="background:#f5f5f5;">  
     <?php 

        $logo = public_path().'/public/assets/default_image/Logo.png'; $logo = $SITE_LOGO;        
        if(file_exists($SITE_LOGO))
          $logo = $SITE_LOGO;
        ?> 
          <td align="center"><img src="<?php echo $logo; ?>" width="190" height="90" alt="{{ $SITENAME }}" style="margin:20px 30px 20px 40px;"/>          </td>
  </tr>
  <tr>
    <td style="height:30px;"><b><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PASSWORD_RECOVERY_DETAILS_FOR_ADMIN')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PASSWORD_RECOVERY_DETAILS_FOR_ADMIN');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PASSWORD_RECOVERY_DETAILS_FOR_ADMIN');} ?></b></td>
  </tr>
  <tr>
     <td style=" margin:0 auto; font-size:16px;text-align:left; font-family:Arial, Helvetica, sans-serif; padding:10px 10px 10px;">
        <table  cellspacing="10">
        <tr>
            <th colspan="3" ><h4 style="color:#F60;" > <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YOUR_LOGIN_CREDENTIALS_ARE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YOUR_LOGIN_CREDENTIALS_ARE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YOUR_LOGIN_CREDENTIALS_ARE');} ?>: </h4> </th>            
            </tr>
          <tr>
            <th><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_USER_NAME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_USER_NAME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_NAME');} ?></th>
             <th>:</th>
              <td >{{ $name }}</td>
            </tr>
            <tr>
             <th><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PASSWORD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PASSWORD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PASSWORD');} ?></th>
            <th>:</th>
              <td >{{ $password }}</td>
            </tr>
         
          </table>
     </td>
  </tr>  

  <tr style="background:#f5f5f5;">
    <td style="height:50px;text-align:center; font-size:14px;"><a href="<?php echo url(''); ?>" target="_blank"  style="text-decoration:none;color:#333333;font-weight:800;"> &copy; <?php echo date("Y"); ?> &nbsp; <?php echo $SITENAME;?>  </a></td>
  </tr>

 </table>
</body>
</html>