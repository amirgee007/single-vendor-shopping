<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_BLOG')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT_BLOG');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_BLOG');} ?> </title>
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

    <?php /* Edit Image Starts */ ?>

    <link href="<?php echo url('')?>/public/assets/cropImage/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/cropImage/editImage/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/cropImage/editImage/css/canvasCrop.css" />
     <?php /* Edit Image ends */ ?>

     <?php /* Edit Image Starts */ ?>
<style type="text/css">
  .imageBox {
    position: relative;

    background: #fff;
    overflow: hidden;
    background-repeat: no-repeat;
    cursor: move;
    box-shadow: 4px 4px 12px #B0B0B0;
}

.imageBox .thumbBox {
    position: absolute;
    top: 100px;
    left: 100px;
      box-sizing: border-box;
      box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
      background: none repeat scroll 0% 0% transparent;
}
.modal-content
{
  background-color: rgb(185, 185, 185);
}
</style>
 <?php /* Edit Image ends */ ?>

</head>
     <!-- END HEAD -->

     <!-- BEGIN BODY -->
<body class="padTop53 " >
    <?php /* Edit Image Starts */ ?>
      <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog"  style="width:64%;">
          
            <!-- Modal content-->
            <div class="modal-content dev_appendEditData">
              <?php ?>  
              <script type="text/javascript">
                    function calSubmit(){

                      $("#dev_upImg_form").submit();
                    }
                  </script>
           

              <!-- Modal content-->
              <div>
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Image</h4>
              </div>
              <div class="modal-body" id='model_body'>

              
                <div class="imageBox" style="width: <?php echo $BLOG_WIDTH;?>px;
  height: <?php echo $BLOG_HEIGHT;?>px;">
                  <!--<div id="img" ></div>-->
                  <!--<img class="cropImg" id="img" style="display: none;" src="images/avatar.jpg" />-->
                  <div class="mask"></div>
                  <div class="thumbBox" style="width: <?php echo $BLOG_WIDTH;?>px;
  height: <?php echo $BLOG_HEIGHT;?>px;"></div>
                  <div class="spinner" style="display: none">Loading...</div>
                </div>
                <div class="tools clearfix" style='display: block; left:5px;top:250px;width:600px; margin-top:15px;'>
                  <span id="rotateLeft" >rotateLeft</span>
                  <span id="rotateRight" >rotateRight</span>
                  <span id="zoomIn" >zoomIn</span>
                  <span id="zoomOut" >zoomOut</span>
                  <span id="crop" >Crop</span>
                  
                  <!--<span id="alertInfo" >alert</span> -->
                  <div class="upload-wapper">
                             Select An Image
                      <input type="file" id="upload-file" value="Upload" />
                  </div>
                  <div class="crop-edit-up"><button class="btn btn-success" type="button " id='dev_uploadBtn' onclick="calSubmit();" style='display: none'>Upload</button></div>
                </div>

                <form id='dev_upImg_form' action="<?php echo url(''); ?>/CropNdUpload_blogImg" method='post' >
                    
                    <input name="_token" hidden value="{!! csrf_token() !!}" />
                    <input type='hidden' id='product_id'  name='product_id' />
                    <input type='hidden' id='img_id'  name='img_id'  />
                    <input type='hidden' id='imgfileName'  name='imgfileName'  />
                    <input type='hidden' id='croppedImg_base64'  name='base64_imgData' />
                    <input type="submit" value="submit" style="display: none" />
                </form> 
                <div id='showCroppedImg'></div>
                <!-- Edit image starts -->
                <script type="text/javascript">
                    $(function(){
                       
                    }) 
                </script>
                <!-- Edit image ends -->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
              </div>

  <?php ?>  
            </div>
            
          </div>
        </div>

      <!--Modal Ends-->
    <?php /* Edit Image ends */ ?>
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
                                <li class="active"><a><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_BLOG')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT_BLOG');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_BLOG');} ?></a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_BLOG')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT_BLOG');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_BLOG');} ?></h5>
            
        </header>
         @if (Session::has('block_message'))
          <div class="alert alert-success alert-dismissable">{!! Session::get('block_message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
        @endif
		<!--@if ($errors->any())
         <br>
		 <ul style="color:red;">
		{!! implode('', $errors->all('<li>:message</li>')) !!}
		</ul>	
		@endif-->
		@if ($errors->any())
         <div class="alert alert-warning alert-dismissable">{!! implode('', $errors->all('<li>:message</li>')) !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
        @if (Session::has('message'))
		<p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
		@endif
        
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'edit_blog_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')) !!}
             @foreach($selected_blog as $blog_detail)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_TITLE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_TITLE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_TITLE');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="text1" maxlength="200" placeholder="Enter Blog Title {{ $default_lang }}" class="form-control" value="{!!$blog_detail->blog_title!!}" type="text" name="blog_title"  >
                        <input id="blog_id" placeholder="" class="form-control" value="{!!$blog_detail->blog_id!!}" type="hidden" name="blog_id"  >
                    </div>
                </div>
				
				<?php if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
				$get_lang_name = $get_lang->lang_name;
				$blog_title_dynamic = 'blog_title_'.$get_lang->lang_code;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Blog Title({{$get_lang_name}})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="text1" maxlength="200" placeholder="Enter Blog Title in {{ $get_lang_name}}" class="form-control" value="{!!$blog_detail->$blog_title_dynamic!!}" type="text" name="blog_title_<?php echo $get_lang_name; ?>"  >
                        
                    </div>
                </div>
				<?php } } ?>
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DESCRIPTION');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10" name="blog_description" >{!!$blog_detail->blog_desc!!}</textarea>
                    </div>
                </div>
				
				<?php if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
				$get_lang_name = $get_lang->lang_name;
				$blog_desc_dynamic = 'blog_desc_'.$get_lang->lang_code;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Description({{$get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10" name="blog_description_<?php echo $get_lang_name; ?>" >{!!$blog_detail->$blog_desc_dynamic!!}</textarea>
                    </div>
                </div>
				 <?php } } ?>
				  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CATEGORY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CATEGORY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CATEGORY');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="blog_category" value="{!! Input::old('blog_category') !!}" >
						 <option value="0">-- <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT');} ?> --</option>
                          <?php foreach($categoryresult as $categorydetails){ ?>
          				 <option value="<?php echo $categorydetails->mc_id; ?>" <?php if($blog_detail->blog_catid == $categorydetails->mc_id){?>selected <?php } ?>><?php echo $categorydetails->mc_name; ?> </option>
           				   <?php } ?>

					   </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_IMAGE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE');} ?> <span class="text-sub">*</span></label>
<span class="errortext red" style="color:red"><em><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_IMAGE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_IMAGE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_IMAGE');} ?> </em></span>
                   <div class="col-lg-8">
					<input type="hidden"  name="old_blog_image" id="old_blog_image" value="<?php print_r($blog_detail->blog_image); ?>" >
					<input type="file"  name="file" id="blog_img" >
		 
							
                    </div>
                    
                </div>
                
				  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <img src="<?php echo url('public/assets/blogimage/'.$blog_detail->blog_image);?>" height="80" />
                     <?php 
                          /* Edit Image start - Trigger the modal with a button */ ?>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick=" calImgEdit(<?php echo $blog_detail->blog_id; ?>,1,'<?php echo $blog_detail->blog_image; ?>' )" >Edit</button><br><?php /* */ ?>  
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_META_TITLE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_META_TITLE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_META_TITLE');} ?></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="" value="{!!$blog_detail->blog_metatitle!!}"  id="text1" name="meta_title" value="{!! Input::old('meta_title') !!}" >
                    </div>
                </div>
				
				<?php if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
				$get_lang_name = $get_lang->lang_name;
				$blog_metatitle_dynamic = 'blog_metatitle_'.$get_lang->lang_code;
				?>
				<div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Meta Title({{ $get_lang_name  }})</label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="Enter Meta Title in {{ $get_lang_name  }}" value="{!!$blog_detail->$blog_metatitle_dynamic !!}"  id="text1" name="meta_title_<?php echo $get_lang_name; ?>" value="{!! Input::old('meta_title_'.$get_lang_name ) !!}" >
                    </div>
                </div>
				
				<?php } } ?>
				
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_META_DESCRIPTION');} ?> </label>

                    <div class="col-lg-8">
                       <textarea id="text4" class="form-control" name="meta_description"   >{!!$blog_detail->blog_metadesc!!}</textarea>
                    </div>
                </div>
				
				
				<?php if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
				$get_lang_name = $get_lang->lang_name;
				$blog_metadesc_dynamic = 'blog_metadesc_'.$get_lang->lang_code;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta Description({{$get_lang_name}})</label>

                    <div class="col-lg-8">
                       <textarea id="text4" class="form-control" name="meta_description_<?php echo $get_lang_name; ?>"   >{!!$blog_detail->$blog_metadesc_dynamic!!}</textarea>
                    </div>
                </div>
				<?php } } ?>
				
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_META_KEYWORDS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_META_KEYWORDS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_META_KEYWORDS');} ?></label>

                    <div class="col-lg-8">
                       <input type="text" id="text1" placeholder="" class="form-control" name="meta_keywords" value="{!!$blog_detail->blog_metakey!!}" >
                    </div>
                </div>
				
				<?php if(!empty($get_active_lang)) { 
				foreach($get_active_lang as $get_lang) {
				$get_lang_name = $get_lang->lang_name;
				$blog_metakey_dynamic = 'blog_metakey_'.$get_lang->lang_code;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta Keywords({{ $get_lang_name  }})</label>

                    <div class="col-lg-8">
                       <input type="text" id="text1" placeholder="Enter Meta Keywords in {{ $get_lang_name  }}" class="form-control" name="meta_keywords_<?php echo $get_lang_name; ?>" value="{!!$blog_detail->$blog_metakey_dynamic!!}" >
                    </div>
                </div>
				<?php } } ?>
				
				
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_TAGS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_TAGS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_TAGS');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" id="text1" placeholder="" class="form-control" name="tags" value="{!!$blog_detail->blog_tags!!}" >
                    </div>
                </div>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ALLOW_COMMENTS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ALLOW_COMMENTS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ALLOW_COMMENTS');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="checkbox" checked="" value="1" name="allow_comments" <?php if($blog_detail->blog_comments == 1){?>checked <?php } ?> >
                    </div>
                </div>
				<div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_STATUS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_STATUS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_STATUS');} ?><span class="text-sub">*</span></label>

                   <div class="col-lg-8">
					           <input type="radio" name="blogstatus"  title="Publish" value="1" <?php if($blog_detail->blog_type == 1){?>checked <?php } ?>> <label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PUBLISH')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PUBLISH');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PUBLISH');} ?>                                                       </label>
					<input type="radio" name="blogstatus"  title="Draft" value="2" <?php if($blog_detail->blog_type == 2){?>checked <?php } ?>> <label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DRAFT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DRAFT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DRAFT');} ?>	                                                                                   </label>
						<label class="sample"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_UPDATE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE');} ?></button>
                     <a href="<?php echo url('manage_publish_blog');?>" class="btn btn-default btn-sm btn-grad" style="color:#000"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CANCEL');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL');} ?></a>
                   
                    </div>
					  
                </div>
			@endforeach
                
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
    <script src="<?php echo url('')?>/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

         <!-- PAGE LEVEL SCRIPTS -->
     <script src="<?php echo url('')?>/public/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="<?php echo url('')?>/public/assets/js/editorInit.js"></script>
    
    <?php /* Edit Image starts */ ?>
      <?php //text editor hidded by this script ,so commanded
        /* <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> */?>
        <script type="text/javascript" src="<?php echo url('')?>/public/assets/cropImage/editImage/js/jquery.canvasCrop.js" ></script>

        <script type="text/javascript">
          function calImgEdit(prodId,imgId,imgFileName){    
            $("#product_id").val(prodId);
            $("#img_id").val(prodId);
            $("#imgfileName").val(imgFileName);

            var rot = 0,ratio = 1;
            var CanvasCrop = $.CanvasCrop({
                cropBox : ".imageBox",
                imgSrc : "<?php echo url('');?>/public/assets/blogimage/"+imgFileName,
                limitOver : 2
            });
            
        
        $('#upload-file').on('change', function(){
            var reader = new FileReader();
            reader.onload = function(e) {
                CanvasCrop = $.CanvasCrop({
                    cropBox : ".imageBox",
                    imgSrc : e.target.result,
                    limitOver : 2
                });
                rot =0 ;
                ratio = 1;
            }
            reader.readAsDataURL(this.files[0]);
            this.files = [];
        });
        
        $("#rotateLeft").on("click",function(){
            rot -= 90;
            rot = rot<0?270:rot;
            CanvasCrop.rotate(rot);
        });
        $("#rotateRight").on("click",function(){
            rot += 90;
            rot = rot>360?90:rot;
            CanvasCrop.rotate(rot);
        });
        $("#zoomIn").on("click",function(){
            ratio =ratio*0.9;
            CanvasCrop.scale(ratio);
        });
        $("#zoomOut").on("click",function(){
            ratio =ratio*1.1;
            CanvasCrop.scale(ratio);
        });
        $("#alertInfo").on("click",function(){
            var canvas = document.getElementById("visbleCanvas");
            var context = canvas.getContext("2d");
            context.clearRect(0,0,canvas.width,canvas.height);
        });
        
        $("#crop").on("click",function(){
            
            //var src = CanvasCrop.getDataURL("jpeg");
            var src = CanvasCrop.getDataURL("png");
            //$("body").append("<div style='word-break: break-all;'>"+src+"</div>");  
            //$("#model_body").append("<img src='"+src+"' />");
            $("#showCroppedImg").html("<img src='"+src+"' />");
            $("#croppedImg_base64").val(src);
            if(src!='')
                $("#dev_uploadBtn").css('display','block');


        });
        
        console.log("ontouchend" in document);


        /* for load modal content from  */
        /*$.ajax({
          type: 'POST',   
          url:"<?php //echo url('');?>/ajaxEditImage",
          data:{prodId:prodId,imgId:imgId,imgFileName:imgFileName},
          success:function(response){
            //alert(response);
            $('.dev_appendEditData').html(response);
            return false;
          }
        });*/
      }
      </script>



    <?php /* Edit Image ends */ ?>

    <script>
       // $(function () { formWysiwyg(); });
	   $(document).ready(function () {
		$('.wysihtml5').wysihtml5();
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
