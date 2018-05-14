<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | Manage Language</title>
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
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                            	<li class=""><a ><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_HOME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME');} ?></a></li>
                                <li class="active"><a >Manage Language</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Manage Language</h5>
            
        </header>
   
   
 <div class="row">
   	
    <div class="col-lg-11 panel_marg">
    @if (Session::has('updated_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('updated_result') !!}</div>
         
		@endif
        @if (Session::has('insert_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('insert_result') !!}</div>
         
		@endif
        @if (Session::has('delete_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('delete_result') !!}</div>
         
		@endif
    	<table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width:10%;" class="text-center">Sno</th>
                  <th class="text-center">Language Name</th>	 
				  <th style="text-align:center;">Language Code</th>
				   <th style="text-align:center;">Status</th>
				  <th style="text-align:center;">Default</th>
                </tr>
              </thead>
              <tbody>
                
		<?php $i=1; 

 
?>
          @if(count($manage_language)>0)  
                @foreach($manage_language as $info)
			
                <tr>
                  <td class="text-center">{!!$i!!}</td>
                  <td class="text-center">{!!$info->lang_name!!}</td>
				  <td class="text-center">{!!$info->lang_code!!}</td>
				  <td class="text-center">
				  <?php 
				  if($info->lang_default == 0){ //non defult can change status
					if($info->lang_status==1){ ?>
					<a href="{!! url('status_lang_submit').'/'.$info->lang_id.'/'.'2'!!}" data-tooltip="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_UNBLOCK')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_UNBLOCK');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_UNBLOCK');} ?>"><i class="icon icon-ok icon-2x"></i></a> 
				 <?php } else { ?> 
					<a href="{!! url('status_lang_submit').'/'.$info->lang_id.'/'.'1'!!}" data-tooltip="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_BLOCK');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK');} ?>"><i class="icon icon-ban-circle icon-2x icon-me"></i></a> 
				 <?php }
				  }elseif($info->lang_default == 1){  //if it is defult
					if($info->lang_status==1){ ?>
					<a href="#" data-tooltip="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_UNBLOCK')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_UNBLOCK');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_UNBLOCK');} ?>" onClick="alert('Change the Default Language to Change Status');"><i class="icon icon-ok icon-2x"></i></a> 
				 <?php } else { ?> 
					<a href="#" data-tooltip="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_BLOCK');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK');} ?>" onClick="alert('Change the Default Language to Change Status');"><i class="icon icon-ban-circle icon-2x icon-me"></i></a> 
				 <?php }
				  }?>
				 </td>
				 <?php if($info->lang_status==1){ ?>
				  <td class="text-center"><input type="radio" value="{!!$info->lang_id!!}" <?php if($info->lang_default == 1){ ?> checked <?php } ?> name="default_lang" id="default_lang"></td>
				 <?php }else{ ?>
					 <td class="text-center"></td>
				 <?php } ?>
                </tr>

				
		<?php $i=$i+1; ?>		
                @endforeach
            @else
                 <tr><td colspan="5">No data found.</td></tr>
            @endif   
				<tr>
                  <td  class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
				  <td class="text-center"></td>
				  <td class="text-center">
                     {!! Form::open(array('url'=>'update_default_lang_submit','class'=>'form-horizontal')) !!}
                     <input type="hidden" name="default_lang_id" id="default_lang_id" value="1" />
                    <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_UPDATE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE');} ?></button>
                    {!! Form::close()!!}
                  </td>
                </tr>
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
       
	<script>
	 $('input[name=default_lang]').click(function(){
		
        var value= $('input[name=default_lang]:checked').val();
		$('#default_lang_id').val(value);
		 
		 });
	 </script>
     <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
</body>
     <!-- END BODY -->
</html>
