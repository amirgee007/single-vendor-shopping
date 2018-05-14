
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $SITENAME;?></title>
</head>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<body>
<table border="0" cellspacing="0" cellpadding="0" width="600" align="center" style="background-color:#ffffff; text-align:center;font-family: Montserrat; border:1px solid #cccccc;">

  <tr bgcolor="#f5f5f5">  
     <?php 
        $logo = public_path().'/public/assets/default_image/Logo.png'; //$logo = $SITE_LOGO;
        if(file_exists($SITE_LOGO))
          $logo = $SITE_LOGO;
        ?> 
          <td align="center"><img src="{{ $SITE_LOGO }}" width="190" height="90" alt="{{ $SITENAME }}" style="margin:20px 0px;"/>          </td>
  </tr>

  <tr style="text-align:center;">
    <td style="height:18px; text-align:center; padding:21px; padding-top:40px; font-size:16px;"><b><?php if (Lang::has(Session::get('lang_file').'.SUBSCRIPTION_EMAIL_CREATED_SUCCESSFULLY_FOR_YOUR_MAIL_ID')!= '') { echo  trans(Session::get('lang_file').'.SUBSCRIPTION_EMAIL_CREATED_SUCCESSFULLY_FOR_YOUR_MAIL_ID');}  else { echo trans($OUR_LANGUAGE.'.SUBSCRIPTION_EMAIL_CREATED_SUCCESSFULLY_FOR_YOUR_MAIL_ID');} ?>.</b></td>
  </tr>
  <tr style="text-align:center;">
     <td style=" margin:0 auto; font-size:16px;text-align:center; font-family:Arial, Helvetica, sans-serif; padding:20px 10px 20px;">
        <table  cellspacing="10">
        <tr style="text-align:center; word-spacing:1; line-height:20px;">
            <th colspan="3" style="text-align:center" ><h4 style="color: #f07faf; margin:0; margin-bottom:5px; font-size:20px;" > <?php if (Lang::has(Session::get('lang_file').'.THANK_YOU_FOR_SUBSCRIPTION')!= '') { echo  trans(Session::get('lang_file').'.THANK_YOU_FOR_SUBSCRIPTION');}  else { echo trans($OUR_LANGUAGE.'.THANK_YOU_FOR_SUBSCRIPTION');} ?></h4> </th>            
            </tr>
      <?php if (Lang::has(Session::get('lang_file').'.HAI_THANK_YOU')!= '') { echo  trans(Session::get('lang_file').'.HAI_THANK_YOU');}  else { echo trans($OUR_LANGUAGE.'.HAI_THANK_YOU');} ?> {{$email}}<?php if (Lang::has(Session::get('lang_file').'.SUBSCRIPTION_EMAIL_IN')!= '') { echo  trans(Session::get('lang_file').'.SUBSCRIPTION_EMAIL_IN');}  else { echo trans($OUR_LANGUAGE.'.SUBSCRIPTION_EMAIL_IN');} echo " ".$SITENAME;?>
          </table>
     </td>
  </tr>  

  <tr bgcolor="#f5f5f5">
    <td style="height:50px;text-align:center;font-family:sans-serif; padding-bottom: 10px; font-size:14px;"><a style="color:#333333;" href="<?php echo url(''); ?>">&copy; <?php echo date('Y');?>&nbsp;<?php echo $SITENAME; ?></a></td>
  </tr>

 </table>
</body>
</html>