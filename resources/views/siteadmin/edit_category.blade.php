<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }}| {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_TOP_CATEGORY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_TOP_CATEGORY') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_TOP_CATEGORY') }}</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/main.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/theme.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
      @php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif		
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
			  {{ Form::button('&times;',['class' => 'close','data-dismiss'=>'modal']) }}
                 
                  <h4 class="modal-title">Edit Image</h4>
              </div>
              <div class="modal-body" id='model_body'>

              
                <div class="imageBox" style="width: {{ $TOP_CATEGORY_WIDTH }}px;
  height: {{ $TOP_CATEGORY_HEIGHT }}px;">
                  <!--<div id="img" ></div>-->
                  <!--<img class="cropImg" id="img" style="display: none;" src="images/avatar.jpg" />-->
                  <div class="mask"></div>
                  <div class="thumbBox" style="width: {{ $TOP_CATEGORY_WIDTH}}px;
  height: {{ $TOP_CATEGORY_HEIGHT }}px;"></div>
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

				{!! Form::open(array('url' => 'CropNdUpload_catImg','id' => 'dev_upImg_form','method' => 'post')) !!}
               
                    
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
			  {{ Form::button('Close',['class' => 'btn btn-default','data-dismiss'=>'modal']) }}
                
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
                            	<li class=""><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_TOP_CATEGORY')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_TOP_CATEGORY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_TOP_CATEGORY') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_TOP_CATEGORY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_TOP_CATEGORY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_TOP_CATEGORY') }}</h5>
            
        </header>
        @if (Session::has('block_message'))
          <div class="alert alert-success alert-dismissable">{!! Session::get('block_message') !!}
	   {{ Form::button('×',['class' => 'close' , 'data-dismiss' => 'alert' ,  'aria-hidden' => 'true']) }}
           </div>
        @endif
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable">
	{{ Form::button('×',['class' => 'close' , 'data-dismiss' => 'alert' ,  'aria-hidden' => 'true']) }}
	{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'edit_category_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')) !!}
				
                @foreach($catg_details as $catg_det)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TOP_CATEGORY_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="category_name" placeholder="Enter Top Category Name {{ $default_lang }}" name="category_name" class="form-control" value="{!!$catg_det->mc_name!!}" type="text" > 
						{!! Form::hidden('catg_id',$catg_det->mc_id,['id' => 'catg_id']) !!}
                       
                    </div>
                </div>
				
				@if(!empty($get_active_lang))  
				@foreach($get_active_lang as $get_lang) 
				<?php $get_lang_name = $get_lang->lang_name;
				$get_lang_code = $get_lang->lang_code;
				$cat_name_dynamic = 'mc_name_'.$get_lang_code; 
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Top Category Name({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="category_name_{{ $get_lang_name }}" placeholder="Enter Top Category Name in {{ $get_lang_name }}" name="category_name_{{ $get_lang_name }}" class="form-control" value="{!!$catg_det->$cat_name_dynamic!!}" type="text" > 
						{!! Form::hidden('catg_id',$catg_det->mc_id,['id' => 'catg_id']) !!}
                       
                    </div>
                </div>
				@endforeach
				@endif

               <div class="form-group">
                    <label class="control-label col-lg-3" for="text1"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CATEGORY_STATUS')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_CATEGORY_STATUS') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_CATEGORY_STATUS') }}
					 <label class="sample"></label></label>

                    <div class="col-lg-8">
					           <input type="radio" value="1" title="Active" <?php if($catg_det->mc_status == 1) {?>checked <?php } ?> name="category_status"> <label class="sample">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ACTIVE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ACTIVE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIVE') }}                  </label>
					<input type="radio" value="0" title="Active" <?php if($catg_det->mc_status == 0) {?>checked <?php } ?>  name="category_status"> <label class="sample"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_DEACTIVE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DEACTIVE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DEACTIVE') }}                 </label></label>
						<label class="sample"></label></label>
                    </div>
                </div>
				   <?php /*?><div class="form-group">
                    <label class="control-label col-lg-3" for="text1"> Type
					 <label class="sample"></label></label>

                    <div class="col-lg-8">
					           <?php $mc_type = explode(',',$catg_det->mc_type);?>
							   		
					<input type="checkbox" value="1"  name="deal[0]" <?php if($mc_type[0]==1){?>checked <?php } ?>> <label class="sample">Products </label>
                    <input type="checkbox" value="2"  name="deal[1]" <?php if($mc_type[1]==2){?>checked <?php } ?>> <label class="sample">Deals</label>
					  <input type="checkbox" value="3"  name="deal[2]" <?php if($mc_type[2]==3){?>checked <?php } ?>> <label class="sample">Auction</label>
						<label class="sample"></label></label>
                    </div>
                </div><?php */?>

                <div class="form-group">
                    <label class="control-label col-lg-3">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_LISTING_CATEGORY_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_LISTING_CATEGORY_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_LISTING_CATEGORY_IMAGE') }} <span class="text-sub">*</span></label>
					<span class="errortext red" style="color:red"><em>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }} {{ $TOP_CATEGORY_WIDTH }} x  {{ $TOP_CATEGORY_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PIXELS') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}</em></span>
                    <div class="col-lg-8">
					{!! Form::hidden('old_top_category',$catg_det->mc_img,['id' => 'old_top_category']) !!}
					
						{!! Form::file('file',['id' => 'file']) !!}
					
                      
					  <?php  $pro_img = $catg_det->mc_img;
				   $prod_path = url('').'/public/assets/default_image/No_image_category.jpg'; ?>
				  @if($pro_img != '' ) {{-- check  image is not null --}}
					  
							<?php   $img_data = "public/assets/categoryimage/".$pro_img; ?>
					     @if(file_exists($img_data))
						 
						<?php 	 $prod_path = url('').'/public/assets/categoryimage/'.$pro_img; ?>
						 
						 @else
						 
							 @if(isset($DynamicNoImage['category'])) {{-- check no_image is updated in database --}}
										 <?php					
											$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['category']; ?>
												@if($DynamicNoImage['category'] !='' && file_exists($dyanamicNoImg_path)) {{-- check no_image is exist in file --}}
												 
												<?php	$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['category']; ?>
												@endif
									     @endif
										 
						 
				  @endif
				  @else
						 
							 @if(isset($DynamicNoImage['category'])) {-- check no_image is updated in database --}}
										 						
										<?php	$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['category']; ?>
												@if($DynamicNoImage['category'] !='' && file_exists($dyanamicNoImg_path)) {{-- check no_image is exist in file --}}
												 <?php
													$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['category']; ?>
												@endif
									     
							 @endif			 
						 @endif
                      <img src="{!! $prod_path !!}" style="height:60px;">
                       <?php 
                          /* Edit Image start - Trigger the modal with a button */ ?>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick=" calImgEdit({{ $catg_det->mc_id }},1,'{{ $catg_det->mc_img }}' )" >Edit</button><br><?php /* */ ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                     <a href="{{ url('manage_category') }}" class="btn btn-default btn-sm btn-grad" style="color:#000">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') ? trans(Session::get('admin_lang_file').'.BACK_CANCEL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL') }}</a>
                   
                    </div>
					  
                </div>

                @endforeach
         {!! Form::close()!!}
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
    <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   

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
                imgSrc : "<?php echo url('');?>/public/assets/categoryimage/"+imgFileName,
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

     <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
</body>
     <!-- END BODY -->
</html>
