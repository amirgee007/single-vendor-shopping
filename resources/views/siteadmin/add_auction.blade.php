<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> Admin | Add Auction Products</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
     <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
     <link href="<?php echo url('')?>/public/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); if(count($favi)>0) { foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
<?php } ?>		
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/bootstrap-wysihtml5-hack.css" />
   
     <style>
                        ul.wysihtml5-toolbar > li {
                            position: relative;
                        }
                    </style>
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
     <!-- END HEAD -->

     <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap">
         <!-- HEADER SECTION -->
         {!! $adminheader !!}
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
       {!! $adminleftmenus !!}
        <!--END MENU SECTION -->

		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a>Home</a></li>
                                <li class="active"><a >Add Auction Products</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Add Auction Products</h5>
            
        </header>
        <div id="div-1" class="accordion-body collapse in body">
        <?php if(isset($action) && $action == 'save') { $process = 'save'; $button = 'Add Auction'; $form_action = 'add_auction_submit'; } 
		      else if(isset($action) && $action == 'update') { $process = 'update'; $button = 'Update Auction'; }  ?>
         {!! Form::open(array('url'=>'add_auction_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
          
      			<input type="hidden" name="action" value="<?php echo $process; ?>" />
				
                
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"></label>

                    <div class="col-lg-8">
                        <div id="error_msg"  style="color:#F00;font-weight:800"  > </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Title<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="title" name="title" placeholder="" class="form-control" type="text">
                        <input id="check_title_val" name="check_title_val" placeholder="" value="0" class="form-control" type="hidden">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Category<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <select class="form-control" name="category" id="category" onChange="select_main_cat(this.value)" >
                        <option value="0">--- Select ---</option>
                       <?php foreach($category as $cat_list)  { ?>
              			<option value="<?php echo $cat_list->mc_id; ?>"><?php echo $cat_list->mc_name; ?></option>
                        <?php } ?>
				        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Select Main Category<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="maincategory" id="maincategory" onChange="select_sub_cat(this.value)" >
           			  <option value="0">---Select---</option>          
      				  </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Select Sub Category<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                        <select class="form-control" name="subcategory" id="subcategory" onChange="select_second_sub_cat(this.value)" >
           			    <option value="0">---Select---</option>         
				        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Select Second Sub Category<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="secondsubcategory" id="secondsubcategory"  >
		               <option value="0">---Select---</option>      
        			   </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Original Price<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="originalprice" name="originalprice" placeholder="Numbers Only" class="form-control" type="text">
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Auction Price<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="auctionprice" name="auctionprice" placeholder="Numbers Only" class="form-control" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Bid Increment<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="bidincr" name="bidincr" placeholder="Numbers Only" class="form-control" type="text">
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Start Date<span class="text-sub">*</span></label>

                    <div class="col-lg-3" >
                        <div id="datetimepicker1" class=" date input-group">
                        <input data-format="yyyy-MM-dd hh:mm:ss" type="text" id="startdate" name="startdate" class="form-control"></input>
                        <span class="add-on input-group-addon">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                      </div>

                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">End Date<span class="text-sub">*</span></label>

                    <div class="col-lg-3" >
                        <div id="datetimepicker2" class=" date input-group">
                        <input data-format="yyyy-MM-dd hh:mm:ss" type="text" id="enddate" name="enddate" class="form-control"></input>
                        <span class="add-on input-group-addon">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                      </div>

                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Shipping Fee<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="shippingfee" name="shippingfee" placeholder="Numbers only" class="form-control" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Shipping Information<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="shippinginf" name="shippinginf" class="form-control"></textarea>
                    </div>
                </div>
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Description<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="wysihtml5" name="description" class="form-control" rows="10" ></textarea>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Select Merchant<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" id="merchant" name="merchant" onChange="select_store_name(this.value)">
	            <option value="0">Choose a Merchant</option>
                       @foreach($merchant_details as $merchant_det)
		
                    <option value="{!! $merchant_det->mer_id!!}">{!! $merchant_det->mer_fname!!}</option>
					@endforeach
        		</select>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Select Shop<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" id="shop" name="shop">
              <option value="0">Choose a Shop Name</option>
            
        </select>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta keywords<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="metakeyword" name="metakeyword" class="form-control" ></textarea>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta description<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="metadescription" name="metadescription" class="form-control"></textarea>
                    </div>
                </div>
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Auction Image<span class="text-sub">*</span><br><span  style="color:#999">(max 5)</span></label>

                    <div class="col-lg-8" id="img_upload">
                       <input type="file"  id="file" name="file" >
                        <div id="divTxt"></div> 
                        <p><a onClick="addFormField(); return false;" style="cursor:pointer;color:#F60;" id="add_img_btn" >Add</a></p> 
                       <input type="hidden" id="aid" value="1">
                        <input type="hidden" id="count" name="count" value="0">
                    </div>
                   
              		
                 </div>			
					

              

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad" id="submit_deal" ><a style="color:#fff"  ><?php echo $button; ?></a></button>
                     <button class="btn btn-default btn-sm btn-grad" type="reset" ><a style="color:#000">Reset</a></button>
                   
                    </div>
					  
                </div>

                
         </form>
        </div>
    </div>
</div>
   
    </div>
                    
                    </div>
                    
                    
                    

                </div>
            <!--END PAGE CONTENT -->
 
        </div>
    
     <!--END MAIN WRAPPER -->

  <!-- FOOTER -->
      {!! $adminfooter !!}
    <!--END FOOTER --> 
    
 	<script src="<?php echo url('')?>/public/assets/plugins/jquery-2.0.3.min.js"></script>
    
    <script type='text/javascript'>
$(document).ready(function(){
    var counter = 2;
    $('#del_file').hide();
    $('img#add_file').click(function(){
        $('#file_tools').before('<br><div class="col-lg-8" id="f'+counter+'"><input name="file[]" type="file"></div>');
        $('#del_file').fadeIn(0);
    counter++;
    });
    $('img#del_file').click(function(){
        if(counter==3){
            $('#del_file').hide();
        }   
        counter--;
        $('#f'+counter).remove();
    });
});
</script>

    <script>
	
	function select_main_cat(id)
	{
		 var passData = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('auction_select_main_cat'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
					$('#maincategory').html(responseText);					   
				   }
				}		
			});		
	}
	
	function select_sub_cat(id)
	{
		var passData = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('auction_select_sub_cat'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
					$('#subcategory').html(responseText);					   
				   }
				}		
			});		
	}
	
	function select_second_sub_cat(id)
	{
		var passData = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('auction_select_second_sub_cat'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
					$('#secondsubcategory').html(responseText);					   
				   }
				}		
			});		
	}
	function select_store_name(id)
	{
		var passData = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('auction_select_store_name'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
					$('#shop').html(responseText);					   
				   }
				}		
			});		
	}
		$( document ).ready(function() {
			
        var title 			 = $('#title');
        var category		 = $('#category');
	    var maincategory 	 = $('#maincategory');
		var subcategory 	 = $('#subcategory');
		var secondsubcategory= $('#secondsubcategory');
		var originalprice 	 = $('#originalprice');
		var auctionprice 	 = $('#auctionprice');
		var startdate 		 = $('#startdate');
		var enddate 		 = $('#enddate');
		var shippingfee		 = $('#shippingfee');
		var wysihtml5 		 = $('#wysihtml5');
		var merchant		 = $('#merchant');
		var shop			 = $('#shop');
		var metakeyword		 = $('#metakeyword');
		var metadescription	 = $('#metadescription');
		var bidincr			 = $('#bidincr');
		var shippinginf		 = $('#shippinginf');
		var file		 	 = $('#file');
	
 			var ext = $('#file').val().split('.').pop().toLowerCase();
			var allow = new Array('png','jpg','jpeg','png');
			var valid = false;
			for(var x = 0; x < allow.length; x++) {
    		if(allow[x] == ext) {
        	valid = true;
        	break;
    			}
				}
		
        $('#originalprice').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
		{
            originalprice.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			originalprice.focus();
			return false;
        }
		else
		{			
            originalprice.css('border', ''); 
			$('#error_msg').html('');	        
		}
        });
		
		$('#auctionprice').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
		{
            auctionprice.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			auctionprice.focus();
			return false;
        }
		else
		{			
            auctionprice.css('border', ''); 
			$('#error_msg').html('');	        
		}
        });
		
		$('#bidincr').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
		{
            bidincr.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			bidincr.focus();
			return false;
        }
		else
		{			
            bidincr.css('border', ''); 
			$('#error_msg').html('');	        
		}
        });
		
		$('#shippingfee').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
		{
            shippingfee.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			shippingfee.focus();
			return false;
        }
		else
		{			
            shippingfee.css('border', ''); 
			$('#error_msg').html('');	        
		}
        });
		
		
	$('#submit_deal').click(function() {
			
		var passData = 'title='+title.val();
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('check_auctiontitle_exist'); ?>',
				  success: function(responseText){  
				   if(responseText == 1)
				   { 
					title.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Title');
			title.focus();
			return false;
				   }				   	 
				}		
			});		

		
		if($.trim(title.val()) == "")
		{
			title.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Title');
			title.focus();
			return false;
		}
      	else
		{
			 title.css('border', ''); 
        	 $('#error_msg').html('');
		}		
		if(category.val() == 0)
		{
			category.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Category');
			category.focus();
			return false;
		}
        else
        {
        category.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(maincategory.val() == 0)
		{
			maincategory.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Main Category');
			maincategory.focus();
			return false;
		}
        else
        {
        maincategory.css('border', ''); 
        $('#error_msg').html('');
        }
		
		<?php /*?>if(subcategory.val() == 0)
		{
			subcategory.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Sub Category');
			subcategory.focus();
			return false;
		}
        else
        {
        subcategory.css('border', ''); 
        $('#error_msg').html('');
        }
        if(secondsubcategory.val() == 0)
		{
			secondsubcategory.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Select Sub Category');
			secondsubcategory.focus();
			return false;
		}
        else
        {
        secondsubcategory.css('border', ''); 
        $('#error_msg').html('');
        }<?php */?>
		
		if(originalprice.val() == 0)
		{
			originalprice.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Original Price');
			originalprice.focus();
			return false;
		}
		else if(isNaN(originalprice.val()) == true)
		{
			originalprice.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			originalprice.focus();
			return false;
		}
        else
        {
        originalprice.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(auctionprice.val() == 0)
		{
			auctionprice.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Discount Price');
			auctionprice.focus();
			return false;
		}
		else if(isNaN(auctionprice.val()) == true)
		{
			auctionprice.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			auctionprice.focus();
			return false;
		}
		else if(parseInt(auctionprice.val()) > parseInt(originalprice.val()) )
		{
			auctionprice.css('border', '1px solid red'); 
			$('#error_msg').html('Auction price sholud be less than original price');
			auctionprice.focus();
			return false;
		}
        else
        {
        auctionprice.css('border', ''); 
        $('#error_msg').html('');
        }
		if(bidincr.val() == 0)
		{
			bidincr.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Bid Increment Value');
			bidincr.focus();
			return false;
		}
		else if(isNaN(bidincr.val()) == true)
		{
			bidincr.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			bidincr.focus();
			return false;
		}
        else
        {
        bidincr.css('border', ''); 
        $('#error_msg').html('');
        }
		if(startdate.val() == '')
		{
			startdate.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Start Date');
			startdate.focus();
			return false;
		}
        else
        {
        startdate.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(enddate.val() == '')
		{
			enddate.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select End Date');
			enddate.focus();
			return false;
		}
		else if(enddate.val() < startdate.val() )
		{
			enddate.css('border', '1px solid red'); 
			$('#error_msg').html('End Date sholud be greater than start date');
			enddate.focus();
			return false;
		}
        else
        {
        enddate.css('border', ''); 
        $('#error_msg').html('');
        }
		
	/*	if(shippingfee.val() == '')
		{
			shippingfee.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Shipping Fee');
			shippingfee.focus();
			return false;
		}
		else
        {
        shippingfee.css('border', ''); 
        $('#error_msg').html('');
        }*/
		if(shippinginf.val() == '')
		{
			shippinginf.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Shipping Information');
			shippinginf.focus();
			return false;
		}
        else
        {
        shippinginf.css('border', ''); 
        $('#error_msg').html('');
        }
		  if($.trim(wysihtml5.val()) == '')
		{
			wysihtml5.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Description');
			wysihtml5.focus();
			return false;
		}
        else
        {
        wysihtml5.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(merchant.val() == 0)
		{
			merchant.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Merchant');
			merchant.focus();
			return false;
		}
        else
        {
        merchant.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(shop.val() == 0)
		{
			shop.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Shop');
			shop.focus();
			return false;
		}
        else
        {
        shop.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if($.trim(metakeyword.val()) == "")
		{
			metakeyword.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Metakeyword');
			metakeyword.focus();
			return false;
		}
        else
        {
        metakeyword.css('border', ''); 
        $('#error_msg').html('');
        }
	
		if($.trim(metadescription.val()) == "")
		{
			metadescription.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Metadescription');
			metadescription.focus();
			return false;
		}
        else
        {
        metadescription.css('border', ''); 
        $('#error_msg').html('');
        }
			
	
		 var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
      	if(file.val() == "")
 		{
 		file.focus();
		file.css('border', '1px solid red'); 
		$('#error_msg').html('Please choose image');
		return false;
		}			
		else if ($.inArray($('#file').val().split('.').pop().toLowerCase(), fileExtension) == -1) { 				
		file.focus();
		file.css('border', '1px solid red'); 
		$('#error_msg').html('Please choose valid image');
		return false;
		}			
		else
		{
		file.css('border', ''); 
		$('#error_msg').html('');				
		}				
     	
		});
	
		
    });
	</script>
    
    <script src="<?php echo url('')?>/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    
   <script src="<?php echo url('')?>/public/assets/js/bootstrap-datetimepicker.min.js"></script>
	
	<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
			
			$(function () {
                $('#datetimepicker2').datetimepicker();
            });
			
			$(function () {
                $('#datetimepicker3').datetimepicker();
            });
    </script>

         <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo url('')?>/public/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="<?php echo url('')?>/public/assets/js/editorInit.js"></script>
    <script>
       $(function () { formWysiwyg(); });
    </script>
   <script type="text/javascript">
    function addFormField() {
      var id = document.getElementById("aid").value;
	  var count_id = document.getElementById("count").value;	  
	  if(count_id < 4){
	  document.getElementById('count').value = parseInt(count_id)+1;
      jQuery.noConflict()
      jQuery("#divTxt").append("<tr style='height:5px;' > <td> </td> </tr><tr id='row" + id + "' style='width:100%'><td width='20%'><input type='file' name='file_more"+count_id+"' /></td><td>&nbsp;&nbsp<a href='#' onClick='removeFormField(\"#row" + id + "\"); return false;' style='color:#F60;' >Remove</a></td></tr>");     
         jQuery('#row' + id).highlightFade({    speed:1000 });
     id = (id - 1) + 2;
     document.getElementById("aid").value = id;	 
	}	
    }
        
      function removeFormField(id) {
var count_id = document.getElementById("count").value;
 document.getElementById('count').value = parseInt(count_id)-1;
        jQuery(id).remove();
    }
    </script>
    
</body>
     <!-- END BODY -->
</html>
