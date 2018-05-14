<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_SERVICES');} ?> </title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                                <li class="active"><a ><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_SERVICES');} ?></a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_SERVICES');} ?></h5>
            
        </header>
		
		
@if ($errors->any())
         <br>
		 <ul style="color:red;">
		{!! implode('', $errors->all('<li>:message</li>')) !!}
		</ul>	
		@endif
        @if (Session::has('message'))
		<p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
		@endif
 <?php foreach($get_services as $services ) { }  ?>
		
<?php 

$calendar = $services->calendar_option;

$store_id = $services->store_name;

?>


<div class="row">
        <div id="div-1" class="accordion-body collapse in body col-lg-11 panel_marg" style="padding-bottom:10px;">
               {!! Form::open(array('url'=>'edit_services_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}


		<input type="hidden" name="service_id" value="<?php echo $services->service_id; ?>" />
		<div id="error_msg"  style="color:#F00;font-weight:800"  > </div>
		
		 <div class="panel panel-default">

                <div class="panel-heading"> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_SERVICES');} ?></div>
				<div class="panel-body">
		        <div class="form-group">
                                    <label for="text1" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_NAME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_NAME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_NAME');} ?><span class="text-sub">*</span></label>

                                    <div class="col-lg-4">
                                        <input id="service_name" placeholder="Enter Service Name" name="service_name" class="form-control" type="text" value="{{$services->service_name}}">
										 @if ($errors->has('service_name'))
                                <p class="error-block" style="color:red;">{{ $errors->first('service_name') }}</p> @endif
                                    </div>
                                </div>
								</div>
                               
				
								<div class="panel-body">

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TYPE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TYPE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TYPE');} ?></label>

                    <div class="col-lg-4">
		
			 <select class="form-control" name="service_type" id="service_type" >
                        <option value="0"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SERVICE_TYPE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_SERVICE_TYPE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SERVICE_TYPE');} ?></option>
                       <?php foreach($getservicetypes as $service_type)  { ?>
              			<option value="<?php echo $service_type->service_type_id; ?>" <?php if($service_type->service_type_id ==  $services->service_type) { ?> selected <?php } ?> ><?php echo $service_type->service_type_name; ?></option>
                        <?php } ?>
			 </select>			

                    </div>
                    <label for="text2"> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SERVICE_TYPE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SERVICE_TYPE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MORE_CUSTOM_SERVICE_TYPE');} ?>  <a href="<?php echo url('')?>/manage_service_type"> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD');} ?></a></label>
                </div></div>
				
						<a href="javascript:void(0);"  title="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_FIELD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_FIELD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_FIELD');} ?>"  id="add_button" class="btn btn-xs button-plus edit-service-plus"><span class="glyphicon glyphicon-plus" ></span></a>
								<?php foreach($get_service_duration as $duration ) {  
                                //$duration = $services->service_time_type;  ?>
								<div class="panel-body edit-service-body" id="">
								<input id="duration_id"  name="duration_id[]"  type="hidden" value="{{$duration->duration_id}}" required>
														
                                <div class="edit-service">
										<label for="text2" class="control-label"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TIMING')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TIMING');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TIMING');} ?><span class="text-sub">*</span></label>
										<input id="service_timing" placeholder="Enter Service Timing" name="service_timing[]" class="form-control" type="number" value="{{$duration->service_duration}}" required>
                                        
																<select class="form-control" name="duration[]" id="duration">
                                                                    <option value="1" @if($duration->service_time_type== '1') selected @endif> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MINUTES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MINUTES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MINUTES');} ?></option>
                                                                    <option value="2" @if($duration->service_time_type== '2') selected @endif><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_HOURS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_HOURS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_HOURS');} ?></option>
                                                                    <option value="3" @if($duration->service_time_type== '3') selected @endif><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DAYS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS');} ?></option>
                                                                    <option value="4" @if($duration->service_time_type== '4') selected @endif><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_WEEKS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_WEEKS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_WEEKS');} ?></option>
                                                                    <option value="5" @if($duration->service_time_type== '5') selected @endif><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MONTH')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MONTH');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MONTH');} ?></option>
                                                                    <option value="6" @if($duration->service_time_type== '6') selected @endif><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YEAR')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YEAR');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YEAR');} ?></option>
                                                                </select>
										
								</div>
														
                                
								<div class="edit-service">
                                    <label for="text1" class="control-label"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ORIGINAL_PRICE');} ?><span class="text-sub">*</span></label>

                                    <div>
                                        <input placeholder="Numbers Only" class="form-control" type="text" id="Original_Price" name="Original_Price[]" value="{{$duration->service_orginal_price}}" required >
										<p class="error-block" style="color:red;">
									@if ($errors->has('Original_Price')) {{ $errors->first('Original_Price') }} @endif </p>
                                    </div>
                                </div>
								
								
                                <div class="edit-service">
                                    <label for="text1" class="control-label"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DISCOUNTED_PRICE');} ?><span class="text-sub">*</span></label>

                                    <div>
                                        <input placeholder="Numbers Only" class="form-control" type="text" id="Discounted_Price" name="Discounted_Price[]" value="{{$duration->service_discount_price}}" required>
										<p class="error-block" style="color:red;">
									@if ($errors->has('Discounted_Price')) {{ $errors->first('Discounted_Price') }} @endif </p>
                                    </div>
                                </div>
								<a class="btn btn-xs btn-info button-minus" href="<?php echo url('delete_duration')."/".$duration->duration_service_id ."/".$duration->duration_id ?>"><span class="glyphicon glyphicon-minus"></span></a>
								</div>
								<?php } ?>
								<div class="" id="img_upload">
								</div>
								<div class="panel-body">
								<div class="form-group">

                                    <label for="text2" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CALENDER_OPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CALENDER_OPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CALENDER_OPTION');} ?><span class="text-sub">*</span></label>

                                    <div class="col-lg-4">
									<label class="sample checkbox-inline" id="chk_radio">
                                        <input type="radio" id="calendar_option" name="calendar_option"  onClick="setVisibility('sub4', 'inline');"
                                        value="1" @if($calendar== '1') checked @endif >
                                        <span><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YES');} ?></span></label>
										<label class="sample checkbox-inline" id="chk_radio">
                                        <input type="radio" name="calendar_option" id="calendar_option" onClick="setVisibility('sub4', 'none');"
                                        value="2" @if($calendar== '2') checked @endif>
                                        <span><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NO');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NO');} ?></span> </label>
                                        
                                    </div>
                                </div>
								</div>
								
								<div class="panel-body">
								<div class="form-group">
                                    <label for="text1" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_STORE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_STORE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_STORE');} ?><span class="text-sub">*</span></label>

                                    <div class="col-lg-4">
                                        <select class="form-control" id="store_name" name="store_name" onChange="get_maincategory(this.value)">
                                            
                                            <?php foreach($getstore as $store)  { ?>
                                                <option value="<?php echo $store->stor_id; ?>" <?php if($store_id==$store->stor_id){ echo "selected";}?> >
                                                    <?php echo $store->stor_name; ?>
                                                </option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
								</div>
								<div class="panel-body">
								<div class="form-group">
                                    <label for="text1" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_META_KEYWORDS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_META_KEYWORDS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_META_KEYWORDS');} ?><span class="text-sub">*</span></label>

                                    <div class="col-lg-4">
                                        <textarea class="form-control" id="Meta_Keywords" name="Meta_Keywords">{{$services->meta_keywords}}</textarea>
                                    </div>
                                </div>
								</div>
								<div class="panel-body">
								<div class="form-group">
                                    <label class="control-label col-lg-3" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_META_DESCRIPTION');} ?><span class="text-sub">*</span></label>

                                    <div class="col-lg-4">
                                        <textarea class="form-control" id="Meta_Description" name="Meta_Description" >{{$services->meta_description}}</textarea>
                                    </div>
                                </div>
								</div>
								<div class="panel-body">
								<div class="form-group">
                                    <label for="pass1" class="control-label col-lg-3"><span class="text-sub"></span></label>

                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-success btn-sm btn-grad" id="submit_product"><a style="color:#fff"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_UPDATE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE');} ?></a></button>
                                        <a href="url('')/manage_services"><button class="btn btn-default btn-sm btn-grad" style="color:#000"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CANCEL');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL');} ?></button></a>
                                    </div>
                                </div> </div>
                </div>
				
</form>

</body>
     <!-- END BODY -->
<script>
function setVisibility(id, visibility) {
    document.getElementById(id).style.display = visibility;
    document.getElementById('addmore').style.display =visibility;
}
</script>
     
	<script src="<?php echo url('')?>/public/assets/plugins/jquery-2.0.3.min.js"></script>
				<script type="text/javascript">
					$(document).ready(function(){
					    var maxField = 100; //Input fields increment limitation
					    var addButton = $('#add_button'); //Add button selector
					    var wrapper = $('#img_upload'); //Input field wrapper //div
					    var fieldHTML = '<div class="edit-service-body panel-body" ><input id="duration_id"  name="duration_id[]" type="hidden" value="0" ><div><div class="edit-service"><label for="text2" class="control-label">Service Timing<span class="text-sub">*</span></label><div class="" ><input id="service_timing" placeholder="Enter Service Timing" name="service_timing[]" class="form-control" type="text" value="" required></div><select class="form-control" name="duration[]" id="duration"><option value="1">Minutes</option><option value="2">Hours</option><option value="3">Days</option><option value="4">Weeks</option><option value="5">Month</option><option value="6">Year</option></select></div></div><div class="edit-service"><label for="text1" class="control-label">Original Price<span class="text-sub">*</span></label><div class=""><input placeholder="Numbers Only" class="form-control" type="text" id="Original_Price" name="Original_Price[]" value="" required ><p class="error-block" style="color:red;">@if ($errors->has("Original_Price")) {{ $errors->first("Original_Price") }} @endif </p></div></div><div class="edit-service"><label for="text1" class="control-label">Discounted Price<span class="text-sub">*</span></label> <div class=""><input placeholder="Numbers Only" class="form-control" type="text" id="Discounted_Price" name="Discounted_Price[]" value="" required><p class="error-block" style="color:red;">@if ($errors->has("Discounted_Price")) {{ $errors->first("Discounted_Price") }} @endif </p></div></div></div><div id="remove_button"><a href="javascript:void(0);"  title="Remove field" class="btn btn-xs btn-info button-minus"><span class="glyphicon glyphicon-minus"></span></a></div></div>'; //New input field html 
					    var x = 1; //Initial field counter is 1
					    $(addButton).click(function(){ //Once add button is clicked
					        if(x < maxField){ //Check maximum number of input fields
					            x++; //Increment field counter
					            $(wrapper).append(fieldHTML); 
					            
					        }
					    });
					    $(wrapper).on('click', '#remove_button', function(e){ //Once remove button is clicked
					        e.preventDefault();
					        $(this).parent('div').remove(); //Remove field html
					        x--; //Decrement field counter
					       // document.getElementById('count').value = parseInt(count_id)-1;
					    });
					});
					 
				</script>
				
	<script type="text/javascript">
	   $.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	   });
	</script>
   
</html>
