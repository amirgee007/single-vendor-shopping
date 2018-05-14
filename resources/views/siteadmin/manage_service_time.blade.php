<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SERVICE_TIME');} ?> </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/MoneAdmin.css" />
	
	<!--PAGINATION-->
    <link href="<?php echo url('')?>/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	
	
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); if(count($favi)>0) { foreach($favi as $fav) {} ?>
    <link rel="shortcut icon" href="<?php echo url(''); ?>/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
<?php } ?>	
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                            	<li class=""><a><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_HOME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME');} ?></a></li>
                                <li class="active"><a ><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SERVICE_TIME');} ?></a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SERVICE_TIME');} ?></h5>
            
        </header>
		@if (Session::has('updated_result'))
		<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{!! Session::get('updated_result') !!}</div>
        
		@endif
        @if (Session::has('insert_result'))
		<div class="alert alert-success alert-dismissable">
		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{!! Session::get('insert_result') !!}</div>
    
		@endif
        @if (Session::has('delete_result'))
		<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{!! Session::get('delete_result') !!}</div>
         
		@endif
		
		
		
   
 <div class="row">
   	
    <div class="col-lg-11 panel_marg">
    
    	<table class="table table-bordered">
		
		
		<!--Start paginate-->
		<div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label>
		   
		   </label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter">
		   </div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label></label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter"></div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
		 <!--End paginate function-->
		
		
		
              <thead>
                <tr>
                  <th style="width:10%;" class="text-center"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SNO');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO');} ?></th>
				   <th style="text-align:center;"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TIME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TIME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TIME');} ?></th>
				  <th style="text-align:center;"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT');} ?></th>
				   <th style="text-align:center;"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_STATUS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_STATUS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_STATUS');} ?> </th>
				  <th style="text-align:center;"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DELETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE');} ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; ?>
                 @if(count($Service_Time_Details)>0)
	  @foreach ($Service_Time_Details as $Service_Time) 
                <tr>
                  <td class="text-center">{!!$i!!}</td>
              
				     <td class="text-center">{!!$Service_Time->service_time!!}</td>
				<td class="text-center"><a href="<?php echo url('edit_service_time/'.$Service_Time->service_time_id); ?>"><i class="icon icon-edit icon-2x" title="Edit"></i></a></td>



  		<td class="text-center">
          <?php if($Service_Time->service_time_status== 0){ ?>
            <a href="{!! url('update_status_service_time').'/'.$Service_Time->service_time_id.'/'.'1'!!}"><i class="icon icon-ban-circle icon-2x icon-me" title="Block"></i></a>
          <?php } else { ?> <a href="{!! url('update_status_service_time').'/'.$Service_Time->service_time_id.'/'.'0'!!}">
                   <i class="icon icon-ok icon-2x" title="UnBlock"></i></a> <?php } ?></td>
		 <td class="text-center"><a href="<?php echo url('delete_service_time_admin/'.$Service_Time->service_time_id); ?>"><i class="icon icon-trash icon-2x" title="Delete"></i></a></td>
                </tr>
				  
		
	<?php $i=$i+1; ?>
		@endforeach		  
		@endif		
                
              </tbody>
            </table>
    </div>
   
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
    <!-- END PAGE LEVEL SCRIPTS -->   
	<script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
	
     
</body>
     <!-- END BODY -->
</html>
