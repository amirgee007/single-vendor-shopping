<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TYPE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TYPE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SERVICE_TYPE');} ?></title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="public/assets/css/main.css" />
    <link rel="stylesheet" href="public/assets/css/theme.css" />
    <link rel="stylesheet" href="public/assets/css/MoneAdmin.css" />
	
	<!--PAGINATION-->
    <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
	<link href="<?php echo url('')?>/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	
	
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
                            	<li class=""><a><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_HOME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME');} ?></a></li>
                                <li class="active"><a><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TYPE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TYPE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SERVICE_TYPE');} ?></a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TYPE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SERVICE_TYPE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SERVICE_TYPE');} ?></h5>
            
        </header>
   
   @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
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
                  <th  class="text-center"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TYPE_NAME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TYPE_NAME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TYPE_NAME');} ?></th>
				  <th style="text-align:center;"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT');} ?></th>
				   <th style="text-align:center;"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_STATUS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_STATUS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_STATUS');} ?></th>
				  <th style="text-align:center;"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DELETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE');} ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; ?>
                @if(count($manage_service_type)>0)
                @foreach($manage_service_type as $Service_Type)
                <tr>
                  <td  class="text-center">{!!$i!!}</td>
                  <td class="text-center">{!! $Service_Type->service_type_name!!}</td>
                  
                  
				     <td class="text-center"><a href="{!! url('edit_service_type').'/'.$Service_Type->service_type_id!!}"><i class="icon icon-edit icon-2x" title="Edit"></i></a></td>
					 
				   <td class="text-center"><?php if($Service_Type->service_type_status == 1){ ?><a href="{!! url('status_service_type_submit').'/'.$Service_Type->service_type_id.'/'.'0'!!}"><i class="icon icon-ok icon-2x" title="Block"></i></a> <?php } else { ?> <a href="{!! url('status_service_type_submit').'/'.$Service_Type->service_type_id.'/'.'1'!!}"> <i class="icon icon-ban-circle icon-2x icon-me" title="Un Block"></i></a> <?php } ?></td>
				    <td class="text-center"><a href="{!! url('delete_service_type').'/'.$Service_Type->service_type_id!!}"><i class="icon icon-trash icon-2x" title="Delete"></i></a></td>
					
                </tr>
                <?php $i++;?>
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
    <script src="public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo url('')?>/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
    <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->   
  
</body>
     <!-- END BODY -->
</html>
