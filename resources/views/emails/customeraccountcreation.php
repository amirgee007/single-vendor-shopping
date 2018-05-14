<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $SITENAME;?></title>
</head>
  <?php $logopath="/images/laravel-ecommerce.jpg"; ?>

<body style="max-width:800px; margin:0px auto;font-family:Montserrat;">
  <br>
<div style="border:1px solid #cccccc;">
  <div style="text-align:center; background:#f5f5f5;"><img src="<?php echo url('').$logopath;?>" /></div>
  <div style="padding:10px;color:#333333;">

    <h1><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_HELLO')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_HELLO');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_HELLO');} ?>, <?php echo  $customername;?></h1>
    <h3><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_THANK_YOU_FOR_REGISTERING')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_THANK_YOU_FOR_REGISTERING');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_THANK_YOU_FOR_REGISTERING');} ?> .....<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ENJOY_YOUR_SHOPPING')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ENJOY_YOUR_SHOPPING');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ENJOY_YOUR_SHOPPING');} ?>!</h3>
 
  </div>
  
  <center><table width="500px" border="0" style="background:#f5f5f5; font-size: 15px; color:#333333; padding: 10px; font-weight: bold;">
  <tr>
    <td colspan="2" align="center" style="background:#f3f3f3; padding:10px; font-size:16px; color:##0266b5;" ><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_USER_CREDENTIALS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_USER_CREDENTIALS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_CREDENTIALS');} ?></td>
    </tr>
  <tr>
    <td><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_USERID')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_USERID');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_USERID');} ?></td>
    <td><?php echo $address ;?></td>
  </tr>
  <tr>
    <td><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PASSWORD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PASSWORD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PASSWORD');} ?></td>
    <td><?php echo  $password;?></td>
  </tr>
</table>
</center>
<br><br>
 <div style="text-align:center; background:#f3f3f3; padding:5px"><a href="">&copy; <?php echo date("Y"); ?>&nbsp; <?php echo $SITENAME;?>   </a></div>
 
</div>


</body>
</html>
