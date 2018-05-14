<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_CATEGORY_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_CATEGORY_BANNER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_CATEGORY_BANNER')}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
     <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/main.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/theme.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
     @php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif		
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/bootstrap-wysihtml5-hack.css" />
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

    <link href="{{ url('')}}/public/assets/cropImage/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ url('')}}/public/assets/cropImage/editImage/css/style.css" type="text/css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/cropImage/editImage/css/canvasCrop.css" />
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
			  {{ Form::button('&times;',['class' => 'close' , 'data-dismiss' => 'modal']) }}
                 
                  <h4 class="modal-title">Edit Image</h4>
              </div>
              <div class="modal-body" id='model_body'>

              
                <div class="imageBox" style="width: {{ $CATEGORY_BANNER_WIDTH }}px;
  height: {{ $CATEGORY_BANNER_HEIGHT }}px;">
                  <!--<div id="img" ></div>-->
                  <!--<img class="cropImg" id="img" style="display: none;" src="images/avatar.jpg" />-->
                  <div class="mask"></div>
                  <div class="thumbBox" style="width: {{ $CATEGORY_BANNER_WIDTH }}px;
  height: {{ $CATEGORY_BANNER_HEIGHT }}px;"></div>
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
					 {{ Form::open(['url' => 'CropNdUpload_catBanner' , 'method' => 'post','id' => 'dev_upImg_form']) }}
                
                    
                    <input name="_token" hidden value="{!! csrf_token() !!}" />
						{{ Form::hidden('product_id','',['id' => 'product_id']) }}
						{{ Form::hidden('img_id','',['id' => 'img_id']) }}
						{{ Form::hidden('imgfileName','',['id' => 'imgfileName']) }}
						{{ Form::hidden('base64_imgData','',['id' => 'croppedImg_base64']) }}
                   
                   
                    <input type="submit" value="submit" style="display: none" />
					{{ Form::close() }} 
                <div id='showCroppedImg'></div>
                <!-- Edit image starts -->
                <script type="text/javascript">
                    $(function(){
                       
                    }) 
                </script>
                <!-- Edit image ends -->

              </div>
              <div class="modal-footer">
			    {{ Form::button('Close',['class' => 'btn btn-default' , 'data-dismiss' => 'modal']) }}
             
              </div>
              </div>

 
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
                            	<li class=""><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_CATEGORY_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_CATEGORY_BANNER'):  trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_CATEGORY_BANNER') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_CATEGORY_BANNER')!= '') ? trans(Session::get('admin_lang_file').'.BACK_EDIT_CATEGORY_BANNER') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_CATEGORY_BANNER') }}</h5>
            
        </header>
        @if (Session::has('block_message'))
          <div class="alert alert-success alert-dismissable">{!! Session::get('block_message') !!}
	    {{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert','aria-hidden' => 'true']) }}
            
        @endif
@if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
		{{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert','aria-hidden' => 'true']) }}
         
        </div>
		</ul>	
		@endif
        @if (Session::has('message'))
		<div class="alert alert-success alert-dismissable">
	{{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert','aria-hidden' => 'true']) }}
	{!! Session::get('message') !!}</div>
		@endif
 
 @foreach($banner_detail as $details)
		@endforeach
	<?php	 
         	$file_get		 = $details->cat_bn_img;
 ?>

    <div id="div-1" class="accordion-body collapse in body">
               {!! Form::open(array('url'=>'edit_category_banner_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')) !!}

			   {{ Form::hidden('cat_bn_id',$details->cat_bn_id,['id' => 'cat_bn_id' ]) }}
			   {{ Form::hidden('sub_cat_id',$details->cat_bn_maincat_id,['id' => 'sub_cat_id' ]) }}
        
       

		<div id="error_msg"  style="color:#F00;font-weight:800"> </div>
                
            <div class="form-group">
                <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUB_CATEGORY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUB_CATEGORY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUB_CATEGORY') }}<span class="text-sub">*</span></label>

              <div class="col-lg-8">
		
			      <select class="form-control" name="subcategory" id="subcategory" >
                        <option value="0">--- {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SELECT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT') }} ---</option>
                       
                        @foreach($subcategory as $category_detail)  
              			<option value="<?php echo $category_detail->smc_id; ?>" 
                            <?php if($category_detail->smc_id == $details->cat_bn_maincat_id){ ?>selected <?php } ?>>
								{{ $category_detail->smc_name }} </option>
                        @endforeach
			     </select>			

             </div>
          </div>

	     		
         <div class="form-group">
            <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BANNER_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BANNER_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BANNER_IMAGE') }}<span class="text-sub">*</span><br><span  style="color:#999">({{ (Lang::has(Session::get('admin_lang_file').'.BACK_MAXIMUM')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MAXIMUM') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MAXIMUM') }} 3)</span></label>
			
			 {{ Form::hidden('file_get',$file_get,['id' => 'file_get' ]) }}
				 
                <?php 
                    $file_get_path =  explode("/**/",$file_get,-1); 
                    $img_count = count($file_get_path); 
                ?>
                    
					<span class="errortext red" style="color:red"><em>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE'): trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }} {{ $CATEGORY_BANNER_WIDTH }} x {{ $CATEGORY_BANNER_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PIXELS') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}</em></span>
                    
                    <div class="col-lg-8" id="img_upload">
                      <?php
                        $imgId = 1;
						 $prod_path = url('').'/public/assets/default_image/No_image_banner.png'; ?>
                        
						@if(count($file_get_path) > 0 && $img_count !='')	
						@foreach($file_get_path as $image)	
						<?php 		$pro_img = $image;						
							$img_data = "public/assets/banner/".$pro_img;	?>
                        <div style="float:left; max-width:219px; margin-right: 10px;">
                            <input type="hidden" name="image_name[]" id="image_name" value="{{  $pro_img}}"> 
                            
                                <input type="file" id="file<?php echo $imgId; ?>" name="file[]" value="" onchange="imgSizeValidate(<?php echo $imgId; ?>);" />
                            @if($pro_img!=NULL)
							 @if(file_exists($img_data))  {{-- image not exists in folder  --}}							<?php 						
																 $prod_path = url('').'/public/assets/banner/'.$pro_img; ?>
													 
							  @else 
									 @if(isset($DynamicNoImage['category_banner'])) {{--check no_image_banner is in database --}}
									 <?php 					
										$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['category_banner']; ?>
										@if($DynamicNoImage['category_banner'] !='' && file_exists($dyanamicNoImg_path)) {{-- image not exists in folder --}}
										<?php
											$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['category_banner']; ?>
										@endif
															
									@endif
														 
														 
									@endif
                                     <img src="{{ $prod_path }}" height="100" style="margin-top:8px;"> </span>
                                      <div>
                                     <?php 
                                          /* Edit Image start - Trigger the modal with a button */ ?>
                                      <?php /*<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick=" calImgEdit({{ $details->cat_bn_id }},{{ $imgId }},'{{ $pro_img }}' )" >Edit</button> */ ?>

                                     <div style="margin-top: 10px; display: inline-block;"><a class="btn btn-danger" href="{{ url('delete_cat_img')."/".$details->cat_bn_id."/".$pro_img }}" style="cursor: pointer;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_REMOVE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_REMOVE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_REMOVE') }}</a></div></div>

                                @else  
								
								 @if(isset($DynamicNoImage['category_banner']))  {{--check no_image_banner is in database --}}
									 	<?php 				
										$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['category_banner']; ?>
										@if($DynamicNoImage['category_banner'] !='' && file_exists($dyanamicNoImg_path)) {{-- image not exists in folder --}}
										 <?php 
											$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['category_banner']; ?>
										@endif
															
									@endif 
								
								
                                     <img src="{{ $prod_path }}" height="100" width="100" > </span><br>&nbsp; &nbsp; <br>
                               @endif
                       </div>                   
						<?php $imgId++; ?>
						@endforeach
						@else  
								
								 @if(isset($DynamicNoImage['category_banner'])) {{--check no_image_banner is in database --}}
									 					
										$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['category_banner'];
										@if($DynamicNoImage['category_banner'] !='' && file_exists($dyanamicNoImg_path)) {{-- image not exists in folder --}}
										<?php 
											$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['category_banner']; ?>
										@endif
															
									 @endif 
								
								
                                     <img src="{{ $prod_path }}" height="100" width="100" > </span><br>&nbsp; &nbsp; <br>
                               @endif
                  </div>
         </div>		<!--image form group-->	

		 <div class="form-group">
             <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>
             <div class="col-lg-8">
                 <button type="submit" class="btn btn-warning btn-sm btn-grad" id="submit_product" ><a style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE_BANNER')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE_BANNER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE_BANNER') }}</a></button>
                    <a href="{{ url('manage_category_banner') }}" class="btn btn-default btn-sm btn-grad" style="color:#000">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_CANCEL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL') }}</a>
             </div>
		</div>
    
	{{ Form::close() }}
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

 
 <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
<script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>

<script type="text/javascript">

    /* on file upload - check for image size*/
       function imgSizeValidate(i){
        //var img_count = $("#count").val();
               //Get reference of FileUpload.

                // var i;
                //for (i = 0; i <=img_count; i++) {
                  var fileUpload = document.getElementById("file"+i);
                //}

                //Check whether the file is valid Image.
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.gif)$");
            //if (regex.test(fileUpload.value.toLowerCase())) {
            //Check whether HTML5 is supported.
            //if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
            //Initiate the JavaScript Image object.
            var image = new Image();
            //Set the Base64 string return from FileReader as source.
            image.src = e.target.result;
            //Validate the File Height and Width.
            image.onload = function () {
            var height = this.height;
            var width = this.width;
            if (width < 250 || height < 200) {
            //alert("Image Height and Width should have 250 * 200 px.");
            fileUpload.value='';

            return false;
            }
          //  alert("Uploaded image has valid Height and Width.");
            return true;
            };
            }
            //} else {
            //alert("This browser does not support HTML5.");
            //return false;
            //}
            /*} else {
            alert("Please select a valid Image file.");
            return false;
            }*/
    }

    /* on file upload ends */
    
</script>

<script>

	$(document).ready(function() {

	    var subcategory	 = $('#subcategory');
		var file		 = $('#file');

        


        $('#submit_product').click(function() {

			if(subcategory.val() == 0)
		    {
			    subcategory.css('border', '1px solid red'); 
			    $('#error_msg').html('Please Select Category');
			    subcategory.focus();
			    return false;
		    }
		    else
		    {
		        subcategory.css('border', ''); 
		        $('#error_msg').html('');
		    }
        });  //submit	
		
	});	
	
</script>
    

  	<script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}>/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

         <!-- PAGE LEVEL SCRIPTS -->
     <script src="{{ url('') }}/public/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="{{ url('') }}/public/assets/js/editorInit.js"></script>


<?php /* Edit Image starts */ ?>
  <?php //text editor hidded by this script ,so commanded
   /* <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> */?>
    <script type="text/javascript" src="{{ url('') }}/public/assets/cropImage/editImage/js/jquery.canvasCrop.js" ></script>

    <script type="text/javascript">
      function calImgEdit(prodId,imgId,imgFileName){    
        $("#product_id").val(prodId);
        $("#img_id").val(prodId);
        $("#imgfileName").val(imgFileName);

        var rot = 0,ratio = 1;
        var CanvasCrop = $.CanvasCrop({
            cropBox : ".imageBox",
            imgSrc : "<?php echo url('');?>/public/assets/banner/"+imgFileName,
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
        $(function () { formWysiwyg(); });
        </script>
         <script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>
</body>
     <!-- END BODY -->
</html>
