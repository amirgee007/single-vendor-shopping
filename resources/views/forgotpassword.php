<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
  <?php $logopath="/public/assets/logo/Ecartlogo.png"; ?>

<body style="max-width:800px; margin:0px auto">
<div style="border:1px solid #ddd; padding:10px">
  <div style="text-align:center"><img src="<?php echo url('').$logopath;?>" /></div>
  <div>

    <h3><?php if (Lang::has(Session::get('lang_file').'.HELLO')!= '') { echo  trans(Session::get('lang_file').'.HELLO');}  else { echo trans($OUR_LANGUAGE.'.HELLO');} ?>, <?php echo $customername;?></h3>
    <h5><?php if (Lang::has(Session::get('lang_file').'.PASSWORD_RESET_LINK')!= '') { echo  trans(Session::get('lang_file').'.PASSWORD_RESET_LINK');}  else { echo trans($OUR_LANGUAGE.'.PASSWORD_RESET_LINK');} ?></h5>
 
  </div>
  
  <center><table width="500px" border="0">
  <tr>
    <td colspan="2" align="center"  style="background:#f3f3f3; padding:10px" ><?php if (Lang::has(Session::get('lang_file').'.PASSWORD_LINK')!= '') { echo  trans(Session::get('lang_file').'.PASSWORD_LINK');}  else { echo trans($OUR_LANGUAGE.'.PASSWORD_LINK');} ?></td>
    </tr>
  <tr>
    <td><?php if (Lang::has(Session::get('lang_file').'.USERNAME')!= '') { echo  trans(Session::get('lang_file').'.USERNAME');}  else { echo trans($OUR_LANGUAGE.'.USERNAME');} ?></td>
    <td><?php echo $user_email ;?></td>
  </tr>
  <tr>
    <td><?php if (Lang::has(Session::get('lang_file').'.PASSWORD_LINK')!= '') { echo  trans(Session::get('lang_file').'.PASSWORD_LINK');}  else { echo trans($OUR_LANGUAGE.'.PASSWORD_LINK');} ?></td>
    <td ><a href="<?php echo url('forgot_pwd_email/'.$encode_email); ?>"><?php if (Lang::has(Session::get('lang_file').'.PLEASE_CLICK_THIS_LINK_TO_RESET_YOUR_PASSWORD')!= '') { echo  trans(Session::get('lang_file').'.PLEASE_CLICK_THIS_LINK_TO_RESET_YOUR_PASSWORD');}  else { echo trans($OUR_LANGUAGE.'.PLEASE_CLICK_THIS_LINK_TO_RESET_YOUR_PASSWORD');} ?>!</a></td>
  </tr>
</table>
</center>

 
</div>
 <div style="text-align:center; background:#f3f3f3; padding:5px"><a href="{{ url('') }}">{{ $SITENAME }}</a></div>

</body>
</html>
