<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title></title>
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
	 <link href="public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); if(count($favi)>0) { foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
<?php } ?>	
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
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
                            	<li class=""><a ><?php if (Lang::has(Session::get('lang_file').'.HOME')!= '') { echo  trans(Session::get('lang_file').'.HOME');}  else { echo trans($OUR_LANGUAGE.'.HOME');} ?></a></li>
                                <li class="active"><a >  <?php if (Lang::has(Session::get('lang_file').'.MANAGE_REVIEWS')!= '') { echo  trans(Session::get('lang_file').'.MANAGE_REVIEWS');}  else { echo trans($OUR_LANGUAGE.'.MANAGE_REVIEWS');} ?>                   </a></li>
                            </ul>
                    </div>
                </div>

            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>  <?php if (Lang::has(Session::get('lang_file').'.MANAGE_PRODUCTS')!= '') { echo  trans(Session::get('lang_file').'.MANAGE_PRODUCTS');}  else { echo trans($OUR_LANGUAGE.'.MANAGE_PRODUCTS');} ?>                    </h5>
            
        </header>
 @if (Session::has('block_message'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('block_message') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
           <div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label>
		   
		   </label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter">
		   </div></div></div><div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label></label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter"></div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr role="row">
										<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 59px;" aria-label="S.No: activate to sort column ascending" aria-sort="ascending"><?php if (Lang::has(Session::get('lang_file').'.S.NO')!= '') { echo  trans(Session::get('lang_file').'.S.NO');}  else { echo trans($OUR_LANGUAGE.'.S.NO');} ?></th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 76px;" aria-label="Store Name: activate to sort column ascending"><?php if (Lang::has(Session::get('lang_file').'.REVIW_TITLE')!= '') { echo  trans(Session::get('lang_file').'.REVIW_TITLE');}  else { echo trans($OUR_LANGUAGE.'.REVIW_TITLE');} ?></th>
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 67px;" aria-label="Deals Name: activate to sort column ascending"><?php if (Lang::has(Session::get('lang_file').'.PRODUCT_NAME')!= '') { echo  trans(Session::get('lang_file').'.PRODUCT_NAME');}  else { echo trans($OUR_LANGUAGE.'.PRODUCT_NAME');} ?></th>
										
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 76px;" aria-label="Store Name: activate to sort column ascending"><?php if (Lang::has(Session::get('lang_file').'.CUSTOMER_NAME')!= '') { echo  trans(Session::get('lang_file').'.CUSTOMER_NAME');}  else { echo trans($OUR_LANGUAGE.'.CUSTOMER_NAME');} ?></th>
										
									 
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 71px;" aria-label="Actions: activate to sort column ascending"><?php if (Lang::has(Session::get('lang_file').'.ACTIONS')!= '') { echo  trans(Session::get('lang_file').'.ACTIONS');}  else { echo trans($OUR_LANGUAGE.'.ACTIONS');} ?></th>
										
										<!-- <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 74px;" aria-label="Preview: activate to sort column ascending">Preview</th> -->
										
                                    </thead>
                                    <tbody>
<?php $i = 1 ;

				foreach($get_review as $row) { 
							

									  ?>
                                    <tr class="gradeA odd">
                                            <td class="sorting_1"><?php echo $i; ?></td>
                                            <td class="  "><?php echo $row->title; ?></td>
                                            <td class="  "><?php echo substr($row->pro_title,0,45); ?></td>
                                            <td class="center  "><?php echo $row->cus_name;?></td>
                                            
                                            
                                          
                                            
                                             <td class="center  "><a href="#">
                                           <a href="<?php echo url('edit_review/'.$row->comment_id); ?>" > <i class="icon icon-edit" style="margin-left:15px;"></i></a>
                                           <?php if($row->status == 0){?>
                                            <a href="<?php echo url('block_review/'.$row->comment_id.'/1');?>"> <i style='margin-left:10px;' class='icon icon-ok icon-me'></i> </a>
                                            <?php } elseif($row->status == 1) { ?>
                                             <a href="<?php echo url('block_review/'.$row->comment_id.'/0');?>" > <i style='margin-left:10px;' class='icon icon-ban-circle icon-me'></i> </a>
                                             <?php } ?>
                                             <a href="<?php echo url('delete_review')."/".$row->comment_id; ?>" ><i class="icon icon-trash icon-1x" style="margin-left:14px;"></i></a> 
                                             <?php ?>
                                            </td>
                             
                                        </tr>
									<?php $i++;  }
								?>
				 </tbody>
                                </table><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all"></div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"></div></div></div></div><div class="row"><div class="col-sm-6"><div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info"></div></div><div class="col-sm-6"><div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers"><ul class="pagination"></ul></div></div></div></div><div class="row">
								
								<div class="col-sm-6">
								<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
								<ul class="pagination">
								<li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous">
								</li>
								</ul></div></div></div></div>
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


     <!-- GLOBAL SCRIPTS -->
     <script src="<?php echo url('')?>/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo url('')?>/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script> 
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo url('')?>/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
    <!-- END GLOBAL SCRIPTS -->   
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	   <script>
         $(function() {
            $( "#datepicker-8" ).datepicker({
               prevText:"<?php if (Lang::has(Session::get('lang_file').'.CLICK_FOR_PREVIOUS_MONTHS')!= '') { echo  trans(Session::get('lang_file').'.CLICK_FOR_PREVIOUS_MONTHS');}  else { echo trans($OUR_LANGUAGE.'.CLICK_FOR_PREVIOUS_MONTHS');} ?>",
               nextText:"<?php if (Lang::has(Session::get('lang_file').'.CLICK_FOR_NEXT_MONTHS')!= '') { echo  trans(Session::get('lang_file').'.CLICK_FOR_NEXT_MONTHS');}  else { echo trans($OUR_LANGUAGE.'.CLICK_FOR_NEXT_MONTHS');} ?>",
               showOtherMonths:true,
               selectOtherMonths: false
            });
            $( "#datepicker-9" ).datepicker({
               prevText:"<?php if (Lang::has(Session::get('lang_file').'.CLICK_FOR_PREVIOUS_MONTHS')!= '') { echo  trans(Session::get('lang_file').'.CLICK_FOR_PREVIOUS_MONTHS');}  else { echo trans($OUR_LANGUAGE.'.CLICK_FOR_PREVIOUS_MONTHS');} ?>",
               nextText:"<?php if (Lang::has(Session::get('lang_file').'.CLICK_FOR_NEXT_MONTHS')!= '') { echo  trans(Session::get('lang_file').'.CLICK_FOR_NEXT_MONTHS');}  else { echo trans($OUR_LANGUAGE.'.CLICK_FOR_NEXT_MONTHS');} ?>",
               showOtherMonths:true,
               selectOtherMonths: true
            });
         });
      </script>
</body>
     <!-- END BODY -->
</html>
