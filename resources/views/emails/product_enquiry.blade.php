<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php if (Lang::has(Session::get('lang_file').'.PRODUCT_ENQUIRY')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_ENQUIRY');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_ENQUIRY');} ?></title>

</head>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>


<body>

<table border="0" cellspacing="0" cellpadding="0" width="600" align="center" style="border:1px solid #cccccc;font-family: Montserrat;">




  <tr bgcolor="#f5f5f5">  
 <?php 
  $logo = url('').'/public/assets/default_image/Logo.png'; $logo = $SITE_LOGO;
  if(file_exists($SITE_LOGO))
    $logo = $SITE_LOGO;
  ?> 
          <td align="center"><img src="<?php echo $logo;?>" alt="<?php echo $SITENAME; ?>" style="margin:20px 0px; background:#f5f5f5;"/></td>

  </tr>



  <tr>

     <td style="height:30px; text-align:center; font-weight:bold; font-size:16px; "><b><?php if (Lang::has(Session::get('lang_file').'.PRODUCT_ENQUIRY')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_ENQUIRY');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_ENQUIRY');} ?></b></td>

  </tr>

  <tr>

     <td style=" margin:0 auto; font-size:16px;text-align:left; padding:10px 10px 10px;">

        <table  cellspacing="10">

                 <tr>

            <th><?php if (Lang::has(Session::get('lang_file').'.NAME')!= '') { echo  trans(Session::get('lang_file').'.NAME');}  else { echo trans($OUR_LANGUAGE.'.NAME');} ?></th>

             <th>:</th>

              <td >{!! $name !!}</td>

          </tr>

          <tr>     

          <th><?php if (Lang::has(Session::get('lang_file').'.EMAIL')!= '') { echo  trans(Session::get('lang_file').'.EMAIL');}  else { echo trans($OUR_LANGUAGE.'.EMAIL');} ?></th>

             <th>:</th>

              <td >{!!$email!!}</td>

            </tr>

            <tr>

          <th><?php if (Lang::has(Session::get('lang_file').'.PRODUCT_NAME')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_NAME');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_NAME');} ?></th>

             <th>:</th>

              <td >{!!$product_name!!}</td>

            </tr>

            <tr>      

          <th><?php if (Lang::has(Session::get('lang_file').'.PHONE')!= '') { echo  trans(Session::get('lang_file').'.PHONE');}  else { echo trans($OUR_LANGUAGE.'.PHONE');} ?></th>

             <th>:</th>

              <td >{!!$phone!!}</td>

            </tr>

            <tr>     

          <th><?php if (Lang::has(Session::get('lang_file').'.MESSAGE')!= '') { echo  trans(Session::get('lang_file').'.MESSAGE');}  else { echo trans($OUR_LANGUAGE.'.MESSAGE');} ?></th>

             <th>:</th>

              <td>{!!$mesage!!}</td>

            </tr>

          </table>

     </td>

  </tr>  

<tr>

 

</tr>

  <tr bgcolor="#f5f5f5">

    <td style="height:50px;text-align:center; font-size:14px;"><a href="<?php echo url(''); ?>" target="_blank"  style="text-decoration:none;color:#333333;font-weight:800;"> &copy; <?php echo date('Y');?> &nbsp; <?php echo $SITENAME; ?></a></td>

  </tr>



 </table>

</body>

</html>

