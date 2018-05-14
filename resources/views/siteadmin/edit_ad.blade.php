<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_ADS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_ADS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_ADS') }}</title>
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
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/main.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/theme.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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

    <link href="{{ url('') }}/public/assets/cropImage/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ url('') }}/public/assets/cropImage/editImage/css/style.css" type="text/css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/cropImage/editImage/css/canvasCrop.css" />
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
			  {{ Form::button('&times;',['class' => 'close','data-dismiss' =>'modal']) }}
                  
                  <h4 class="modal-title">Edit Image</h4>
              </div>
              <div class="modal-body" id='model_body'>

              
                <div class="imageBox" style="width: {{ $ADS_WIDTH }}px;
  height: {{ $ADS_HEIGHT }}px;">
                  <!--<div id="img" ></div>-->
                  <!--<img class="cropImg" id="img" style="display: none;" src="images/avatar.jpg" />-->
                  <div class="mask"></div>
                  <div class="thumbBox" style="width: {{ $ADS_WIDTH }}px;
  height: {{ $ADS_HEIGHT }}px;"></div>
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
	
	 {{ Form::open(['url' => 'CropNdUpload_ad','id' => 'dev_upImg_form','method' => 'post' ]) }}
             
              
                    
                    <input name="_token" hidden value="{!! csrf_token() !!}" />
					{{ Form::hidden('product_id','',['id' => 'product_id']) }}
					{{ Form::hidden('img_id','',['id' => 'img_id']) }}
					{{ Form::hidden('imgfileName','',['id' => 'imgfileName']) }}
					{{ Form::hidden('base64_imgData','',['id' => 'croppedImg_base64']) }}
                  
                    <input type="submit" value="submit" style="display: none" />
               {!! Form::close() !!}
                <div id='showCroppedImg'></div>
                <!-- Edit image starts -->
                <script type="text/javascript">
                    $(function(){
                       
                    }) 
                </script>
                <!-- Edit image ends -->

              </div>
              <div class="modal-footer">
			   {{ Form::button('Close',['class' => 'btn btn-default','data-dismiss' =>'modal']) }}
                
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
                            	<li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') :trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_ADS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_EDIT_ADS') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_ADS') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_ADS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_EDIT_ADS') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_ADS') }}</h5>
            
        </header>

        @if (Session::has('block_message'))
          <div class="alert alert-success alert-dismissable">{!! Session::get('block_message') !!}
	  {{ Form::button('×',['class' => 'close', 'data-dismiss' => 'alert', 'aria-hidden' => 'true']) }}
            </div>
        @endif
        <div id="div-1" class="accordion-body collapse in body">
<!--@if ($errors->any())
         <br>
		 <ul style="color:red;">
		{!! implode('', $errors->all('<li>:message</li>')) !!}
		</ul>	
		@endif-->
		@if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable">
	{{ Form::button('×',['class' => 'close', 'data-dismiss' => 'alert', 'aria-hidden' => 'true']) }}
	{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
        @if (Session::has('message'))
		<p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
		@endif
		@if (Session::has('error'))
		<div class="alert alert-warning alert-dismissable">
	{{ Form::button('×',['class' => 'close', 'data-dismiss' => 'alert', 'aria-hidden' => 'true']) }}
	{!! Session::get('error') !!}</div>
		@endif
              {!! Form::open(array('url'=>'edit_ad_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')) !!}

		@foreach($adresult as $info)

<input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                 <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_AD_TITLE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_AD_TITLE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_AD_TITLE') }}<span class="text-sub" >*</span></label>

                    <div class="col-lg-8">
                 <input id="text1" maxlength="100" placeholder="Enter Ad Title {{ $default_lang }}" class="form-control" type="text" name="ad_title" value="{{ $info->ad_name}}">
                    </div>
                </div>
				
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				<?php $get_lang_name = $get_lang->lang_name;
				$get_lang_code = $get_lang->lang_code;
				$ad_title_dynamic = 'ad_name_'.$get_lang_code; 
				?>
				
				<div class="form-group">
                 <label for="text1" class="control-label col-lg-2">Ad Title({{ $get_lang_name }})<span class="text-sub" >*</span></label>

                    <div class="col-lg-8">
                 <input id="text1" maxlength="100" placeholder="Enter Ad Title in {{ $get_lang_name }}" class="form-control" type="text" name="ad_title_<?php echo $get_lang_name; ?>" value="<?php echo $info->$ad_title_dynamic;?>">
                    </div>
                </div>
				
				@endforeach
				@endif

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADS_POSITION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADS_POSITION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADS_POSITION') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="editadposition">
            <option value="" <?php if($info->ad_position==0){ ?> selected <?php };?>>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_POSITION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SELECT_POSITION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_POSITION')}}</option>
            <option value="1" <?php if($info->ad_position==1){ ?> selected <?php }; ?>>
				{{ (Lang::has(Session::get('admin_lang_file').'.BACK_LEFT_SIDE_BAR')!= '') ? trans(Session::get('admin_lang_file').'.BACK_LEFT_SIDE_BAR') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_LEFT_SIDE_BAR') }}
			</option>

            <option value="2" <?php if($info->ad_position==2){ ?> selected <?php }; ?>>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BOTTOM_FOOTER')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_BOTTOM_FOOTER') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_BOTTOM_FOOTER') }}</option>

            <option value="3" <?php if($info->ad_position==3){ ?> selected <?php }; ?>> 
				{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HEADER_RIGHT')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_HEADER_RIGHT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HEADER_RIGHT') }}
			 </option>
             
        </select>
                    </div>
                </div>

                <?php /*?><div class="form-group">
                    <label class="control-label col-lg-2">Pages<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="editpage">
            <option value="0" <?php if($info->ad_pages==0){ ?> selected <?php }; ?>>select any page</option>
            <option value="1" <?php if($info->ad_pages==1){ ?> selected <?php };?>>Home</option>
            <option value="2" <?php if($info->ad_pages==2){ ?> selected <?php };?>>Deals</option>
            <option value="3" <?php if($info->ad_pages==3){ ?> selected <?php }; ?>>Product</option>
            <option value="4" <?php if($info->ad_pages==4){ ?> selected <?php }; ?>>Auction</option>
        </select>
                    </div>
                </div><?php */?>

                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_REDIRECT_URL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_REDIRECT_URL') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_REDIRECT_URL') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
          <input id="text1" placeholder="" class="form-control" type="url" name="editredirecturl" value="{{ $info->ad_redirecturl }}"><span class="text-sub">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_REDIRECT_URL_FORMAT')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_REDIRECT_URL_FORMAT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_REDIRECT_URL_FORMAT') }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPLOAD_IMAGE')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_UPLOAD_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPLOAD_IMAGE') }}<span class="text-sub">*</span></label>
					<span class="errortext red" style="color:red"><em>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }} {{ $ADS_WIDTH }} x {{ $ADS_HEIGHT }} {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}</em></span>
                    <div class="col-lg-8">
					<input type="hidden"  name="old_ad_img" id="old_ad_img"  value="{!!$info->ad_img!!}">
                        <input type="file"  name="file" id="ad_img"  value="{!!$info->ad_img!!}" id="text1" placeholder="Fruit ball">
						<br>
						<?php  $pro_img = $info->ad_img;
				   $prod_path = url('').'/public/assets/default_image/No_image_category.jpg'; ?>
				  @if($pro_img != '' ) {{-- check  image is not null --}}
					  
							<?php   $img_data = "public/assets/adimage/".$pro_img; ?>
					     @if(file_exists($img_data))
						 
						<?php 	 $prod_path = url('').'/public/assets/adimage/'.$pro_img; ?>
						 
						 @else
						 
							 @if(isset($DynamicNoImage['ads'])) {{-- check no_image is updated in database --}}
										 <?php					
											$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['ads']; ?>
												@if($DynamicNoImage['ads'] !='' && file_exists($dyanamicNoImg_path)) {{-- check no_image is exist in file --}}
												 
												<?php	$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['ads']; ?>
												@endif
									     @endif
										 
						 
				  @endif
				  @else
						 
							 @if(isset($DynamicNoImage['ads'])) {-- check no_image is updated in database --}}
										 						
										<?php	$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['ads']; ?>
												@if($DynamicNoImage['ads'] !='' && file_exists($dyanamicNoImg_path)) {{-- check no_image is exist in file --}}
												 <?php
													$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['ads']; ?>
												@endif
									     
							 @endif			 
						 @endif
						
                        <img src="{!! $prod_path !!}" style="height:60px;">
                        <?php 
                          /* Edit Image start - Trigger the modal with a button */ ?>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick=" calImgEdit({{ $id }},1,'{{ $info->ad_img }}' )" >Edit</button><br><?php /* */ ?>    
                    </div>
			

                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button  type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                      <a href="{{ url('manage_ad') }}" class="btn btn-default btn-sm btn-grad" style="color:#000">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_CANCEL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL') }}</a>
                   
                    </div>
					  
                </div>

               @endforeach 
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
                imgSrc : "<?php echo url('');?>/public/assets/adimage/"+imgFileName,
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
