

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $SITENAME;?></title>
</head>

<body>
<table border="0" cellspacing="0" cellpadding="0" width="600" align="center" style="background-color:#fafafa; text-align:center;">

  <tr bgcolor="#d82672">
    <td style="height:20px;  background-color:#d82672;">&nbsp;</td>
  </tr>
  <tr bgcolor="#d82672">  
     <?php 
        $logo = url('').'/public/assets/default_image/Logo.png'; $logo = $SITE_LOGO;
        if(file_exists($SITE_LOGO))
          $logo = $SITE_LOGO;
        ?> 
          <td align="center"><img src="{{ $SITE_LOGO }}" width="190" height="90" alt="{{ $SITENAME }}" style="margin:0 30px 20px 40px;"/>          </td>
  </tr>
  <tr>
    <td style="border:3px solid #d82672;"></td>
  </tr>
  
  <tr>
     <td style=" margin:0 auto; font-size:16px;text-align:center ; font-family:Arial, Helvetica, sans-serif; padding:35px 15px;">
        <div>{{ $news_template }} </div>
     </td>
  </tr>  

  <tr bgcolor="#fafafa">
    <td style="height:50px;text-align:center;font-family:Arial, Helvetica, sans-serif; font-size:14px;"><a style="color:#d82672;" href="<?php echo url(''); ?>">&copy; <?php echo date('Y');?>&nbsp;<?php echo $SITENAME; ?></a></td>
  </tr>

 </table>
</body>
</html>