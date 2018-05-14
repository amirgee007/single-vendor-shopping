<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Bohrabazaar.net |Add Blog</title>
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
                            	<li class=""><a >Home</a></li>
                                <li class="active"><a>Add Blog</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Add Blog</h5>
            
        </header>
         @if (Session::has('message'))
		<div class="alert alert-danger alert-dismissable">{!! Session::get('message') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
	  @if ($errors->any())
         <div class="alert alert-warning alert-dismissable">{!! implode('', $errors->all('<li>:message</li>')) !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
        
        
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'add_blog_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"> Title<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="text1" placeholder="" class="form-control" type="text" name="blog_title" value="{!! Input::old('blog_title') !!}" >
                    </div>
                </div>
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Description<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="wysihtml5" class="form-control" rows="10" name="blog_description" >{!! Input::old('blog_description') !!}</textarea>
                    </div>
                </div>
				 
				  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Category<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="blog_category" value="{!! Input::old('blog_category') !!}" >
          		   <option value="0">-- Select --</option>
                          <?php foreach($categoryresult as $categorydetails){ ?>
          				 <option value="<?php echo $categorydetails->mc_id; ?>"><?php echo $categorydetails->mc_name; ?></option>
           				   <?php } ?>

        </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Image <span class="text-sub">*</span></label>

                   <div class="col-lg-8">

		   <input type="file"  name="file" id="blog_img" >
		 
							
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     Select a snapshot (png,jpg,jpeg less than 1M).
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Meta title<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="" id="text1" name="meta_title" value="{!! Input::old('meta_title') !!}" >
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta description <span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="text4" class="form-control" name="meta_description"   >{!! Input::old('meta_description') !!}</textarea>
                    </div>
                </div>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta keywords<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" id="text1" placeholder="" class="form-control" name="meta_keywords" value="{!! Input::old('meta_keywords') !!}" >
                    </div>
                </div>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Tags<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" id="text1" placeholder="" class="form-control" name="tags" value="{!! Input::old('tags') !!}" >
                    </div>
                </div>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Allow Comments<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="checkbox" checked="" value="1" name="allow_comments" value="{!! Input::old('allow_comments') !!}" >
                    </div>
                </div>
				<div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Status<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
					           <input type="radio" name="blogstatus" checked="checked" title="Active" value="1"> <label class="sample">Publish                                                      </label>
					<input type="radio" name="blogstatus" checked="checked" title="Active" value="2"> <label class="sample">Draft	                                                                                   </label>
						<label class="sample"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Sumit</button>
                     <button type="reset" class="btn btn-default btn-sm btn-grad" style="color:#000">Reset</button>
                   
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
    <script>
        $(function () { formWysiwyg(); });
        </script>
<!---F12 Block Code---->
<script type='text/javascript'>
$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});
</script>
</body>
     <!-- END BODY -->
</html>
