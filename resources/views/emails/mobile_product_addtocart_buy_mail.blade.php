 <?php 
$logo = url('').'/public/assets/default_image/Logo.png'; $logo = $SITE_LOGO;
if(file_exists($SITE_LOGO))
  $logo = $SITE_LOGO;
?> 
			
		<div style="width:60%; margin:0 auto;">
					   <table style="width:80%;margin: 0px auto; border:1px solid #CCC">
						    <tr>
						      <td><img src="<?php echo $logo;?>" alt="logo" width="100" /></td>
						    </tr>
					       <tr>
					          <td style="padding:10px">
					           <h1>Hello {{$cus_name}} </h1>
					           <p>Thanks for Buying this product.</p>
					      </tr>					
					      <tr>
					          <td><h3>   </h3></td>
					      </tr>
					      <tr>
					          <td>
					             
					             
					             
					             <table style="padding:15px" width="100%">
					                  <tr>
					                        <td valign="top" width="50%">
					                            <table border="0" cellpadding="3" cellspacing="3" width="100%" align="top">
					                              <tr >
					                                <td  bgcolor="#eaeaea"><b>Product Detail</b></td>
					                              </tr>
					                              <tr>
					                                  <td bgcolor="f6f6f6">
														  Product Title:{{$product_title}} <br>
														  Product Description:{{$product_description}} <br>
														  Product Image:{{$product_image}} <br>
														  Product Quantity:{{$product_qty}} <br>
														  Product Amount:{{$product_amount}} <br>
														  Color:{{$color_name}} <br>
														  Size:{{$size_name}} <br>
														  
														  </td>
					                              </tr>
					                            </table>
					                         </td>
					                        
					                 </tr>
					             </table>
					             
					                  </td>
					              </tr>
					           </table>
					        </td>
					    </tr>
					   
		    </table>
	</div>
