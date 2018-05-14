
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
	 <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_DEALS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT_DEALS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_DEALS')}} @endif </title>
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
     <link href="{{ url('') }}/public/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
      <!-- New Date picker-->
      <link href="{{ url('') }}/public/assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
      <!-- New Date picker-->
     	
      @php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('')}}/public/assets/favicon/{{ $fav->imgs_name }}">
@endif		
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/bootstrap-wysihtml5-hack.css" />
   
     <style>
		ul.wysihtml5-toolbar > li {
			position: relative;
		}
		
		/*.bootstrap-datetimepicker-widget>ul{ right:0px; padding:10px;}*/
		
  #dtpickerdemo .bootstrap-datetimepicker-widget
  {
   padding-left: 40px;
   margin-left:15px;
  }
    #dtpickerdemo1 .bootstrap-datetimepicker-widget
  {
   padding-left: 40px;
    margin-left:15px;
  }
		
    </style>
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
    <style>
        

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
    /*left: 173px;
    top: 173px;*/
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
          <div class="modal-dialog"  style="width:64%">
          
            <!-- Modal content-->
            <div class="modal-content dev_appendEditData">
              <?php ?>  
              <script type="text/javascript">
                    function calSubmit(){

                      $("#dev_upImg_form").submit();
                    }
                  </script>
          

              <!-- Modal content-->
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Image</h4>
              </div>
              <div class="modal-body" id='model_body'>

              
                <div class="imageBox" style="width: {{ $DEAL_WIDTH }}px; height: {{ $DEAL_HEIGHT }}px;">
                  <!--<div id="img" ></div>-->
                  <!--<img class="cropImg" id="img" style="display: none;" src="images/avatar.jpg" />-->
                  <div class="mask"></div>
                  <div class="thumbBox" style="width: {{  $DEAL_WIDTH }}px; height: {{ $DEAL_HEIGHT }}px;"></div>
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
                  <div class="crop-edit-up"> <button class="btn btn-success" type="button " id='dev_uploadBtn' onclick="calSubmit();" style='display: none'>Upload</button></div>
                </div>

                <form id='dev_upImg_form' action="<?php echo url(''); ?>/CropNdUpload_deal" method='post' >
				{!! Form::open(array('url' =>'/CropNdUpload_deal','method'=>'post','id'=>'dev_upImg_form')) !!}   
                    <input name="_token" hidden value="{!! csrf_token() !!}" />
					{{ Form::hidden('product_id', '', array('id' => 'product_id')) }}
					{{ Form::hidden('img_id', '', array('id' => 'img_id')) }}
					{{ Form::hidden('imgfileName', '', array('id' => 'imgfileName')) }}
					{{ Form::hidden('base64_imgData', '', array('id' => 'croppedImg_base64')) }}
						{{ Form::submit('Submit!', array('style' => 'display: none')) }}
					
					{!! Form::close() !!}
                <div id='showCroppedImg' ></div>
                <!-- Edit image starts -->
               
                <!-- Edit image ends -->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                            	<li class=""><a >{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= ''))? trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
								<li class="active"><a>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_DEALS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_EDIT_DEALS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_DEALS') }}</a></li>
                             </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
			<h5>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_DEALS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_EDIT_DEALS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_DEALS') }}</h5>
            
            
        </header>
        @if (Session::has('block_message'))
          <div class="alert alert-success alert-dismissable">{!! Session::get('block_message') !!}
			  {{ Form::button('x', array('class' => 'close','data-dismiss' => 'alert','aria-hidden' => 'true')) }} 
            </div>
        @endif
		@if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
          {{ Form::button('x', array('class' => 'close','data-dismiss' => 'alert','aria-hidden' => 'true')) }}
        </div>
		</ul>	
		@endif
		<!--@if ($errors->any())
         <br>
		 <ul style="color:red;">
		{!! implode('', $errors->all('<li>:message</li>')) !!}
		</ul>	
		@endif-->
        @if (Session::has('message'))
		<p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
		@endif
		
		@if (Session::has('error_message'))
		<div class="alert alert-danger alert-dismissable">{!! Session::get('error_message') !!}</div>
		@endif
		
        <div id="div-1" class="accordion-body collapse in body">
		
		
		<?php  //echo "Print This"; ?>
		
        <?php 
		
		$AddDeals = ((Lang::has(Session::get('admin_lang_file').'.BACK_ADD_DEALS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ADD_DEALS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_DEALS');
		$UpdateDeals = ((Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE_DEALS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_UPDATE_DEALS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE_DEALS');
		
		if(isset($action) && $action == 'save') { $process = 'save'; $button = $AddDeals; $form_action = 'add_deals_submit'; } 
		      else if(isset($action) && $action == 'update') { $process = 'update'; $button = $UpdateDeals; } ?>  
				
@foreach($deal_list as $deals)
		@endforeach
	<?php	 $title 		 = $deals->deal_title;
		// $title_fr 		 = $deals->deal_title_fr;
		 $deal_id 		 = $deals->deal_id;
         $category_get	 = $deals->deal_category;
	     $maincategory 	 = $deals->deal_main_category;
		 $subcategory 	 = $deals->deal_sub_category;
		 $secondsubcategory= $deals->deal_second_sub_category;
		 $originalprice  = $deals->deal_original_price;
		 $discountprice  = $deals->deal_discount_price;
		 $inctax         = $deals->deal_inctax;
		 $shippingamt    = $deals->deal_shippamt;
		 $startdate 	 = $deals->deal_start_date;
		 $enddate 		 = $deals->deal_end_date;
		 $expirydate	 = $deals->deal_end_date;
		 $description 	 = $deals->deal_description;
      $deliverydays   = $deals->deal_delivery;
		 //$description_fr = $deals->deal_description_fr;
		
		 $metakeyword	 = $deals->deal_meta_keyword;
		// $metakeyword_fr = $deals->deal_meta_keyword_fr;
		 $metadescription= $deals->deal_meta_description;
		// $metadescription_fr= $deals->deal_meta_description_fr;
		 //$minlimt		 = $deals->deal_min_limit;
		 $maxlimit		 = $deals->deal_max_limit;
		 $purchaselimit	 = $deals->deal_purchase_limit;
		 $no_of_purchase = $deals->deal_no_of_purchase;
		 $file_get		     = $deals->deal_image;
		 $img_count		 = $deals->deal_image_count;
		 
		?>
         {!! Form::open(array('url'=>'edit_deals_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')) !!}
				
				<input type="hidden" name="action" value="{{ $process }}" />
				<input type="hidden" name="deal_edit_id" value="{{ $deals->deal_id }}" />
                
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"></label>
					
                    <div class="col-lg-8">
                        <div id="error_msg"  style="color:#F00;font-weight:800"  > </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TITLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TITLE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TITLE')}} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('title',$title, array('class' => 'form-control','id' => 'title','maxlength' => '200')) }}
                        <div id="title_error_msg"  style="color:#F00;font-weight:800"  > </div>
                    </div>
                </div>
				
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang)
			@php 	$get_lang_name = $get_lang->lang_name;
				$get_lang_code = $get_lang->lang_code;
				$deal_title_dynamic = 'deal_title_'.$get_lang_code; 
				@endphp
				<div class="form-group">
				
                    <label for="text1" class="control-label col-lg-2">Deal Title({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="title_{{ $get_lang_name }}" maxlength="200" name="title_{{ $get_lang_name }}" placeholder="Enter Deal Title In {{ $get_lang_name }}" class="form-control" type="text" value="{{ $deals->$deal_title_dynamic }}" >
						<div id="title_fr_error_msg"  style="color:#F00;font-weight:800"  > </div>
                    </div>
                </div> 
				@endforeach
				@endif
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TOP_CATEGORY') }}<span class="text-sub">*</span></label>		
					
                    <div class="col-lg-8">
                        <select class="form-control" name="category" id="category" onChange="select_main_cat(this.value)" >
                        <option value="0">--- {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SELECT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT') }} ---</option>
                       @foreach($category as $cat_list)
              			<option value="{{ $cat_list->mc_id }}" <?php if($cat_list->mc_id ==  $category_get) { ?> selected <?php } ?> >{{ $cat_list->mc_name }}
						<?php /* if($cat_list->mc_name_fr !=''){ echo '('.$cat_list->mc_name.')'; } */?>
						</option>
                        @endforeach
				        </select>
						<div id="category_error_msg"  style="color:#F00;font-weight:800"  > </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_MAIN_CATEGORY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SELECT_MAIN_CATEGORY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_MAIN_CATEGORY') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="maincategory" id="maincategory" onChange="select_sub_cat(this.value)" >
           			  <option value="0">---{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SELECT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT') }}---</option>          
      				  </select>
						<div id="main_cat_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SUB_CATEGORY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SELECT_SUB_CATEGORY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SUB_CATEGORY') }}<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                        <select class="form-control" name="subcategory" id="subcategory" onChange="select_second_sub_cat(this.value)" >
           			    <option value="0">---{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SELECT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT') }}---</option>         
				        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SECOND_SUB_CATEGORY')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SELECT_SECOND_SUB_CATEGORY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SECOND_SUB_CATEGORY') }}<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="secondsubcategory" id="secondsubcategory"  >
		               <option value="0">---{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SELECT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT') }}---</option>      
        			   </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ORIGINAL_PRICE') }} ({{ Helper::cur_sym() }}) <span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('originalprice',$originalprice, array('class' => 'form-control','id' => 'originalprice','maxlength' => '10', 'placeholder' => 'Numbers Only')) }}
                       
						<div id="org_price_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DISCOUNTED_PRICE') }} ({{ Helper::cur_sym() }}) <span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('discountprice',$discountprice, array('class' => 'form-control','id' => 'discountprice','maxlength' => '10', 'placeholder' => 'Numbers Only')) }}
                        
						<div id="dis_price_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
				<div class="form-group">
				{!! Html::decode(Form::label('','<span class="text-sub"></span>', array('class' => 'control-label col-lg-2','for' => 'text1'))) !!}
                    

                    <div class="col-lg-8">
                                
                                <input type="checkbox" id="inctax_check" <?php if($inctax > 0) { ?> checked="checked" <?php } ?> onclick="if(this.checked){$('#inctax').show();}else{$('#inctax').hide();$('#inctax').val(0)}"> ( {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_INCLUDING_TAX_AMOUNT')!= ''))? trans(Session::get('admin_lang_file').'.BACK_INCLUDING_TAX_AMOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_INCLUDING_TAX_AMOUNT') }} ) 
                                <input placeholder="Numbers Only" <?php if($inctax == 0) { ?> style="display:none;" <?php } ?>  class="form-control" type="number" id="inctax"  max="99" name="inctax" value="<?php echo $inctax;?>">%
								<div id="tax_error_msg"  style="color:#F00;font-weight:800"> </div>			
                    </div>
                </div>

		<div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPPING_AMOUNT') }}<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
<input type="radio" id="shipamt" name="shipamt" onClick="setshipVisibility('showship', 'none');" value="1" <?php if($shippingamt<1){?>checked<?php } ?> > <label class="sample">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_FREE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_FREE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FREE') }}</label>
<input type="radio" id="shipamt" name="shipamt" onClick="setshipVisibility('showship', 'inline');" value="2" <?php if($shippingamt>0){?>checked<?php } ?>  ><label class="sample">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT')!= ''))? trans(Session::get('admin_lang_file').'.BACK_AMOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT') }}</label>

					
						<label class="sample"></label>
                    </div>
                </div>

@if($shippingamt<1)
<?php 	$showship="display:none"; ?>
@else
<?php 	$showship="display:block"; ?>
@endif

				  <div class="form-group" id="showship" style="<?php echo $showship;?>" >
                    <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPPING_AMOUNT') }} ({{ Helper::cur_sym() }}) <span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('Shipping_Amount',$shippingamt, array('class' => 'form-control','id' => 'Shipping_Amount' ,'maxlength' => '10')) }}
                        
						<div id="ship_amt_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>

				 
                
                
                
                 <div class="form-group">
         <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_START_DATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_START_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_START_DATE') }}<span class="text-sub">*</span></label>
		 
		 {{ Form::hidden('',$startdate, array('class' => 'myStartDate')) }}
               
			   
			   
                <div class='col-sm-4 input-group date' id='dtpickerdemo1'>
				{{ Form::text('startdate','', array('data-format' => 'dd-MM-yyyy hh:mm:ss' ,'id' =>'startdate', 'class' =>'form-control' )) }}
               
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                    <div id="start_date_error_msg"  style="color:#F00;font-weight:800"> </div>
            </div>  
            
             <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_END_DATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_END_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_END_DATE') }}<span class="text-sub">*</span></label>
					
					 {{ Form::hidden('',$enddate, array('class' => 'myEndDate')) }}
					
      
                <div class='col-sm-4 input-group date' id='dtpickerdemo' class='date'>
				{{ Form::text('enddate','', array('data-format' => 'dd-MM-yyyy hh:mm:ss' ,'id' =>'enddate', 'class' =>'form-control' )) }}
                   
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				 <div id="end_date_error_msg"  style="color:#F00;font-weight:800"> </div>
            </div>
            
				  <!--div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Deal Expiry Date<span class="text-sub">*</span></label>

                    <div class="col-lg-3" >
                        <div id="datetimepicker3" class=" date input-group">
                        <input data-format="yyyy-MM-dd hh:mm:ss"  type="text" id="expirydate" name="expirydate" class="form-control" value="<?php echo $expirydate; ?>"></input>
                        <span class="add-on input-group-addon">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                      </div>

                    </div>
                </div-->
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DESCRIPTION') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::textarea('description', $description, array('class' => 'wysihtml5 form-control' ,'id' =>'wysihtml5' ,'rows' =>'10')) }}
                       
						 <div id="desc_error_msg"  style="color:#F00;font-weight:800"> </div>
				   </div>

                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DELIVERY_DAYS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DELIVERY_DAYS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DELIVERY_DAYS') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('Delivery_Days', $deliverydays , array('class' => 'form-control' ,'id' =>'Delivery_Days' ,'maxlength' =>'3')) }}
                      Days
                    </div>
                </div>
				
				
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				<?php  $get_lang_name = $get_lang->lang_name;
				$get_lang_code = $get_lang->lang_code;
				$deal_description_dynamic = 'deal_description_'.$get_lang_code; 
				?>
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Description({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="wysihtml5" name="description_<?php echo $get_lang_name; ?>" placeholder="Enter Description In {{ $get_lang_name }}" class="wysihtml5 form-control description_<?php echo $get_lang_name; ?>" rows="10" ><?php echo $deals->$deal_description_dynamic; ?></textarea>
					   
                    </div>
                </div>
				@endforeach
				@endif
				
			
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_META_KEYWORDS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_META_KEYWORDS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_META_KEYWORDS') }}<span class="text-sub"></span></label>

                    <div class="col-lg-8">
					
                       <textarea id="metakeyword" name="metakeyword" class="form-control" Placeholder="Enter Meta Keywords {{ $default_lang }}" >{{  $metakeyword }} </textarea>
					   <div id="meta_key_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
				 
				@if(!empty($get_active_lang)) 
				@foreach($get_active_lang as $get_lang) 
				<?php $get_lang_name = $get_lang->lang_name;
				$get_lang_code = $get_lang->lang_code;
				$deal_meta_keyword_dynamic = 'deal_meta_keyword_'.$get_lang_code; 
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta Keywords({{ $get_lang_name }})<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <textarea id="metakeyword_{{ $get_lang_name }}" name="metakeyword_{{  $get_lang_name }}" placeholder="Enter Meta Keywords In {{ $get_lang_name }}" class="form-control" >{{ $deals->$deal_meta_keyword_dynamic }}</textarea>
					   <div id="meta_key_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
				@endforeach
				@endif	
				
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_META_DESCRIPTION') }}<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <textarea id="metadescription" name="metadescription"  placeholder="Enter Meta Description {{ $default_lang }}" class="form-control">{{  $metadescription }}</textarea>
					   <div id="meta_desc_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
				
				 
				@if(!empty($get_active_lang))
				@foreach($get_active_lang as $get_lang)
				<?php $get_lang_name = $get_lang->lang_name;
				$get_lang_code = $get_lang->lang_code;
				$deal_meta_description_dynamic = 'deal_meta_description_'.$get_lang_code; 
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta Description({{ $get_lang_name }})<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <textarea id="metadescription_<?php echo $get_lang_name; ?>" name="metadescription_<?php echo $get_lang_name; ?>" placeholder="Enter Meta Description In {{ $get_lang_name }}" class="form-control"><?php echo $deals->$deal_meta_description_dynamic; ?></textarea>
					   <div id="meta_desc_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
				@endforeach
				@endif
				  <!--<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Minimum Deal Limit<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="minlimit" name="minlimt" placeholder="Numbers Only" class="form-control" type="text" value="<?php //echo$minlimt; ?>" >
						<div id="mini_deal_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>-->
				{{ Form::hidden('exist','', array('id' =>'exist' )) }}
			
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_USER_LIMIT')!= ''))? trans(Session::get('admin_lang_file').'.BACK_USER_LIMIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_LIMIT') }}<span class="text-sub">*</span></label>
					
					{{ Form::hidden('no_of_purchase',$no_of_purchase, array('id' =>'no_of_purchase' )) }}
					
                    <div class="col-lg-8">
					{{ Form::text('maxlimit',$maxlimit, array('id' =>'maxlimit','placeholder' => 'Numbers Only','class' => 'form-control' ,'maxlength' =>'5'  )) }}
                       
						<div id="max_deal_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
				 <?php /*?> <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Deal Purchase Limit Per Customer<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="purchaselimit" name="purchaselimit" placeholder="Numbers Only" class="form-control" type="text" value="<?php echo $purchaselimit; ?>">
                    </div>
                </div><?php */?>


             <?php /*  Product Policy details */ ?>
                {{-- Cancel Policy starts --}}
                <div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_APPLY_CANCEL')!= ''))? trans(Session::get('admin_lang_file').'.BACK_APPLY_CANCEL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_APPLY_CANCEL') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="radio" id="allow_cancel" name="allow_cancel"  value="1"  @if($deals->allow_cancel=='1') checked @endif  onClick="setPolicyDisplay('cancel_tab', 'block')"> <label class="sample"  >{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= ''))? trans(Session::get('admin_lang_file').'.BACK_YES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_YES') }}</label>
                        <input type="radio" id="notallow_cancel" name="allow_cancel"  value="0" @if($deals->allow_cancel=='0') checked @endif    onclick="setPolicyDisplay('cancel_tab', 'none')"><label class="sample">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= ''))? trans(Session::get('admin_lang_file').'.BACK_NO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO') }}</label>


                        <label class="sample"></label>
                    </div>
                </div>


                <div id="cancel_tab" style="display:none;">
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_DESCRIPTION') }}<span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="cancellation_policy" placeholder="{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_CANCEL_DESCRIPTION') }}">{{ $deals->cancel_policy }}</textarea>
                           <div id="cancellation_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                     
                 @if(!empty($get_active_lang)) 
                 @foreach($get_active_lang as $get_lang)
                <?php    $get_lang_name = $get_lang->lang_name;
                  $get_lang_code = $get_lang->lang_code;
                  $cancel_policy_dynamic = 'cancel_policy_'.$get_lang_code;
                 ?>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_DESCRIPTION') }}({{ $get_lang_name }}) <span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="cancellation_policy_{{$get_lang_name}}" placeholder="{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_CANCEL_DESCRIPTION') }}">{{ $deals->$cancel_policy_dynamic }}</textarea>
                           <div id="cancellation_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                    @endforeach
						@endif
								<div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                        <div class="col-lg-8">
                                <label for="text1" class="control-label ">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_CANCEL_DESCRIPTION') }}<span class="text-sub"></span></label>     
                                <input placeholder="{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_CANCEL_DESCRIPTION') }}"  class="form-control" type="text" id="cancellation_days" name="cancellation_days" value="{{ $deals->cancel_days }}" maxlength="3">
                                    <div id="cancellation_error_msg"  style="color:#F00;font-weight:800"> </div>         
                        </div>
                    </div>

                </div> 

                {{-- Cancel Policy ends --}}
                {{-- REturn Policy starts --}}
                <div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_APPLY_RETURN')!= ''))? trans(Session::get('admin_lang_file').'.BACK_APPLY_RETURN') : trans($ADMIN_OUR_LANGUAGE.'.BACK_APPLY_RETURN') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="radio" id="allow_return" name="allow_return"  value="1" @if($deals->allow_return=='1') checked @endif   onclick="setPolicyDisplay('return_tab', 'block')" > <label class="sample">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= ''))? trans(Session::get('admin_lang_file').'.BACK_YES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_YES') }}</label>
                        <input type="radio" id="notallow_return" name="allow_return"  value="0" @if($deals->allow_return=='0') checked @endif    onclick="setPolicyDisplay('return_tab', 'none')" ><label class="sample">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= ''))? trans(Session::get('admin_lang_file').'.BACK_NO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO') }}</label>


                        <label class="sample"></label>
                    </div>
                </div>


                <div id="return_tab" style="display:none;">
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RETURN_DESCRIPTION') }}<span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="return_policy" placeholder="{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_RETURN_DESCRIPTION') }}">{{ $deals->return_policy }}</textarea>
                           <div id="return_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                    
                     @if(!empty($get_active_lang)) 
                     @foreach($get_active_lang as $get_lang) 
                   <?php     $get_lang_name = $get_lang->lang_name;
                      $get_lang_code = $get_lang->lang_code;
                      $return_policy_dynamic = 'return_policy_'.$get_lang_code;
                     ?>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RETURN_DESCRIPTION') }} ({{ $get_lang_name }}) <span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="return_policy_{{$get_lang_name}}" placeholder="{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_RETURN_DESCRIPTION') }}">{{ $deals->$return_policy_dynamic }}</textarea>
                           <div id="return_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                    @endforeach 
							@endif

                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                        <div class="col-lg-8">
                                    <label for="text1" class="control-label">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_RETURN_DESCRIPTION') }}<span class="text-sub"></span></label>
                                    <input placeholder="{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_RETURN_DESCRIPTION') }}"  class="form-control" type="text" maxlength="3" id="return_days" name="return_days" value="{{ $deals->return_days }}" maxlength="3">
                                    <div id="replacement_error_msg"  style="color:#F00;font-weight:800"> </div>         
                        </div>
                    </div>

                </div> 


                {{-- REturn Policy ends --}}
                {{-- Replacement Policy starts --}}
                <div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_APPLY_REPLACEMENT')!= ''))? trans(Session::get('admin_lang_file').'.BACK_APPLY_REPLACEMENT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_APPLY_REPLACEMENT') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="radio" id="allow_replace" name="allow_replace"  value="1" @if($deals->allow_replace=='1') checked @endif    onclick="setPolicyDisplay('replace_tab', 'block')"  > <label class="sample">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= ''))? trans(Session::get('admin_lang_file').'.BACK_YES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_YES') }}</label>
                        <input type="radio" id="notallow_replace" name="allow_replace"  value="0" @if($deals->allow_replace=='0') checked @endif      onclick="setPolicyDisplay('replace_tab', 'none')" ><label class="sample">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= ''))? trans(Session::get('admin_lang_file').'.BACK_NO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO') }}</label>


                        <label class="sample"></label>
                    </div>
                </div>

                <div id="replace_tab" style="display:none;">
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_REPLACE_DESCRIPTION') }}<span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="replacement_policy" placeholder="{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_REPLACE_DESCRIPTION') }}">{{ $deals->replace_policy }}</textarea>
                           <div id="replacement_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                   
                     @if(!empty($get_active_lang)) 
                     @foreach($get_active_lang as $get_lang) 
                   <?php      $get_lang_name = $get_lang->lang_name;
                      $get_lang_code = $get_lang->lang_code;
                      $replace_policy_dynamic = 'replace_policy_'.$get_lang_code;
                     ?>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_REPLACE_DESCRIPTION') }}({{ $get_lang_name }})<span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="replacement_policy_{{$get_lang_name}}" placeholder="{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_REPLACE_DESCRIPTION') }}">{{ $deals->$replace_policy_dynamic }}</textarea>
                           <div id="replacement_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                   @endforeach 
					@endif
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                        <div class="col-lg-8">
                                     <label for="text1" class="control-label ">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_REPLACE_DESCRIPTION') }}<span class="text-sub"></span></label><br>
                                    <input placeholder="{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_REPLACE_DESCRIPTION') }}"  class="form-control" type="text" maxlength="3" id="replace_days" name="replace_days" value="{{ $deals->replace_days }}" maxlength="3">
                                    <div id="replacement_error_msg"  style="color:#F00;font-weight:800"> </div>         
                        </div>
                    </div>

                </div> 
                {{-- Replacement Policy ends --}}

                <?php /*  Product Policy details ends */ ?>       

				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_IMAGE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DEAL_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_IMAGE') }}<span class="text-sub">*</span><br><span  style="color:#999">({{ ((Lang::has(Session::get('admin_lang_file').'.BACK_MAX')!= ''))? trans(Session::get('admin_lang_file').'.BACK_MAX') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MAX') }}5)</span></label>
					<input type="hidden" name="file_get" id="file_get" value="<?php echo  $file_get ?>">
					
					<?php 
					$file_get_path =  explode("/**/",$file_get,-1);
					
					$img_count =  count($file_get_path); 
					
					$i=1;?>		
			{{ Form::hidden('old_image_count',$img_count, array('id' =>'old_image_count' )) }}					
					
						<span class="errortext red" style="color:red"><em>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }}  {{ $DEAL_WIDTH }} x {{ $DEAL_HEIGHT }} {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_PIXELS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }}</em></span>
                    
					<div class="col-lg-8 all-image-view ">
					
					
					 @if(count($file_get_path) > 0 && $img_count !='')  {{-- //check image is availble --}}
		  
            @foreach($file_get_path as $image) 
			
					<?php	$pro_img = $image;
						   $prod_path = url('').'/public/assets/default_image/No_image_deal.png';
			 ?>  @if($image != '') {{-- // image is null --}}
			      
			 
					<?php	  
						  $img_data = "public/assets/deals/".$pro_img; ?>
							  @if(file_exists($img_data))  {{-- image not exists in folder  --}}
													
									<?php			 $prod_path = url('').'/public/assets/deals/'.$pro_img; ?>
													 
							  @else  
									 @if(isset($DynamicNoImage['dealImg']))
									 					
									<?php	$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['dealImg']; ?>
										@if($DynamicNoImage['dealImg'] !='' && file_exists($dyanamicNoImg_path))
										 
										<?php	$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg']; ?>
										@endif
															
									 @endif
														 
														 
									@endif 
									   
		   
						   @else
						   
							   
								@if(isset($DynamicNoImage['dealImg'])) // check no_image_product is exist 
																
									<?php  	$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['dealImg']; ?>
											@if($DynamicNoImage['dealImg'] !='' && file_exists($dyanamicNoImg_path))
											
										<?php 		$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg']; ?>
										@endif
										
									     @endif
										
						  @endif 				    
					  
                   <div style="float:left; max-width:219px; margin-right:10px; overflow:hidden;" class="deal-small-img">
					  		<input type="hidden" name="image_name" id="image_name" value="{{$pro_img }}">  
					 
                     		<input type="file"  name="file[]" id="fileUpload<?php echo $i;?>" value="" onchange="imageval(<?php echo $i;?>)" />
            
            <span>
					  <input type="hidden"  name="image_old[]" id="" value="<?php echo $pro_img; ?>" />
					  	<img src="{{ $prod_path }}" height="65" width="" > <br>

                        <?php /* Edit Image start - Trigger the modal with a button */ ?>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick=" calImgEdit(<?php echo $deals->deal_id; ?>,{{ $i }},'{{ $pro_img }}' )" >Edit</button><?php /* */ ?>
						@if($img_count > 1)
                        <br>
						<a class="btn-danger" href="{{ url('delete_deal_image')."/".$deal_id."/".$pro_img }}" style="cursor: pointer;">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_REMOVE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_REMOVE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_REMOVE') }}</a>
                        <br>
						@endif
					  </span>          
          </div>  
          <?php $i++; ?>
           @endforeach  {{-- //foreach --}} 
		   @else
		   <?php
			$prod_path = url('').'/public/assets/default_image/No_image_deal.png'; ?>
					   @if(isset($DynamicNoImage['dealImg']))
										 		
											//$dyanamicNoImg_path ='/public/assets/noimage/'. $DynamicNoImage['productImg']; 
									<?php 		 $dyanamicNoImg_path="public/assets/noimage/".$DynamicNoImage['dealImg'];
											
											?>
											  @if(file_exists($dyanamicNoImg_path) && $DynamicNoImage['dealImg'] !='')
											
											<?php	
												 $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg']; ?>
											   
											@endif
											
									   @endif

							
	  
	  
			  <img src="{{  $prod_path }}" height="40" width="40"><br>&nbsp; &nbsp; 
		@endif
		  </div>
                    </div>
                   
              		
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
					
                    <?php if($img_count < 5){ ?>
          <div  id="img_upload" class="img-upload">
           <a href="javascript:void(0);"  title="Add field" class="" ><span id="add_button" class="btn-success">Add</span></a>
                  </div>
          <?php } ?>
            <div style="display: inline-block;">
                     <button class="btn btn-warning btn-sm btn-grad" id="submit_deal" ><a style="color:#fff"  ><?php echo $button; ?></a></button>
                     <a href="{{ URL::previous() }}" style="color:#000" class="btn btn-default btn-sm btn-grad">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= ''))? trans(Session::get('admin_lang_file').'.BACK_CANCEL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL') }}</a>
                  </div>
                    </div>
            
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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


    {{-- Policy details --}}
<script type="text/javascript">
  $(document).ready(function() {
    var allow_cancel = $('input[name=allow_cancel]:checked').val();
    var allow_return = $('input[name=allow_return]:checked').val();
    var allow_replace = $('input[name=allow_replace]:checked').val();
    if(allow_cancel==1)
      setPolicyDisplay('cancel_tab', 'block');
    else  
     setPolicyDisplay('cancel_tab', 'none');
    if(allow_return==1)
      setPolicyDisplay('return_tab', 'block');
    else  
     setPolicyDisplay('return_tab', 'none');
    if(allow_replace==1)
      setPolicyDisplay('replace_tab', 'block');
    else  
     setPolicyDisplay('replace_tab', 'none');
});

  $('#Delivery_Days').keyup(function() { 
    if (this.value.match(/[^0-9-()\s]/g)){ 
    this.value = this.value.replace(/[^0-9-()\s]/g, ''); 
    } 
  });

  function setPolicyDisplay(id, displayOption) 
  {
      $("#"+id).css('display',displayOption);
  } 
</script>
{{-- Policy details --}}


    <script type='text/javascript'>
$(document).ready(function(){
	var old_image_count = $('#old_image_count').val();
    var maxField = 5; //Input fields increment limitation
    var addButton = $('#add_button'); //Add button selector
    var wrapper = $('#img_upload'); //Input field wrapper //div
	
    var x = (old_image_count); //Initial field counter is 1
		
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
			
			var fieldHTML = '<div style="display:block; width: 350px; margin-top:15px;"><input type="file" name="new_file[]" id="fileUpload'+x+'" onchange="imageval('+x+')" value="" required/><div id="remove_button"><a href="javascript:void(0);"  title="Remove field" style="color:#ffffff;">Remove</a></div></div>'; //New input field html 
            $(wrapper).append(fieldHTML); // Add field html
			document.getElementById('count').value = parseInt(x);
			
        }		
    });
    $(wrapper).on('click', '#remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
	
		document.getElementById('count').value = parseInt(x);
    });
});

/*$(document).ready(function(){
    var counter = 2;
    $('#del_file').hide();
    $('img#add_file').click(function(){
        $('#file_tools').before('<br><div class="col-lg-8" id="f'+counter+'"><input name="file[]" type="file"></div>');
        $('#del_file').fadeIn(0);
    counter++;
    });
    $('img#del_file').click(function(){
        if(counter==3){
            $('#del_file').hide();
        }   
        counter--;
        $('#f'+counter).remove();
    });
});*/
</script>

<script>
function check_title(){  
		 var pass_id = '<?php echo $deals->deal_id; ?>'; 
		
		 var title    = $('#title').val();
		 var passData = 'title='+title+'&dealid='+pass_id; 
		//alert(passData);
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('check_title_exist_edit'); ?>',
				  success: function(responseText){  
				   if(responseText == 1)
				   {
					alert("This Deal Title Already Exist in this Store");
					$("#exist").val("1"); //already exist
					title.css('border', '1px solid red'); 
					$('#title_error_msg').html('This Product Title Already Exist in this Store');
					title.focus(); 
					return false;
				   }				   
				}		
			}); 	
     }
	 </script>
	<script> 
	 <?php 
		if(!empty($get_active_lang)) { 
		foreach($get_active_lang as $get_lang) {
		$get_lang_name = $get_lang->lang_name;
		$get_lang_code = $get_lang->lang_code;
		?>
	 function check_title_dynamic(){ 
		 var pass_id = '{{ $deals->deal_id }}'; 
		
		 var title    = $('#title_<?php echo $get_lang_name; ?>').val();
		 var lang_code = "<?php echo $get_lang_code; ?>";
		 var passData = 'title='+title+'&dealid='+pass_id+"&lang_code="+lang_code; 
		//alert(passData);
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('check_title_exist_edit_dynamic'); ?>',
				  success: function(responseText){  
				   if(responseText == 1)
				   {
					alert("This Deal Title Already Exist in this Store");
					$("#exist").val("1"); //already exist
					$("#title_<?php echo $get_lang_name; ?>").css('border', '1px solid red'); 
					$('#title_fr_error_msg').html('This Product Title Already Exist in this Store');
					$("#title_<?php echo $get_lang_name; ?>").focus();
					return false;
				   }				   
				}		
			});  	
     }
	 <?php } } ?>
</script>

    <script>
	
	function select_main_cat(id)
	{
		   var passData = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '{{ url('deals_select_main_cat') }}',
				  success: function(responseText){  
				   if(responseText)
				   { 
				   		// alert(responseText);
					$('#maincategory').html(responseText);	
					$('#subcategory').html(0);	
					$('#secondsubcategory').html(0);					
				   }
				}		
			});		
	}
	
	function select_sub_cat(id)
	{
		var passData = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '{{ url('deals_select_sub_cat') }}',
				  success: function(responseText){  
				   if(responseText)
				   { 
					$('#subcategory').html(responseText);					   
				   }
				}		
			});		
	}
	
	function select_second_sub_cat(id)
	{
		var passData = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '{{ url('deals_select_second_sub_cat') }}',
				  success: function(responseText){  
				   if(responseText)
				   { 
					$('#secondsubcategory').html(responseText);					   
				   }
				}		
			});		
	}
	
	// Onload to get selected category
	$( document ).ready(function() {
	var passData = 'edit_id=<?php echo $maincategory; ?>';
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('deals_edit_select_main_cat'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
				   		// alert(responseText);
					$('#maincategory').html(responseText);					   
				   }
				}		
			});	
	var passData = 'edit_sub_id=<?php echo $subcategory; ?>';
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('deals_edit_select_sub_cat'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
				   		// alert(responseText);
					$('#subcategory').html(responseText);					   
				   }
				}		
			});	
	var passData = 'edit_secnd_sub_id=<?php echo $secondsubcategory; ?>';
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('deals_edit_second_sub_cat'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
				   		//alert(responseText);
					$('#secondsubcategory').html(responseText);					   
				   }
				}		
			});	
	
	});
	function setshipVisibility(id, visibility) 
{
  document.getElementById(id).style.display = visibility;
 
}
function imageval(i){	/*Image size validation*/
	 
	//var img_count = $("#count").val();
 	//Get reference of FileUpload.
	
	//alert(i);
  	var fileUpload = document.getElementById("fileUpload"+i);
	fixWidth    = Number(<?php echo $DEAL_WIDTH; ?>);
    fixHeight   = Number(<?php echo $DEAL_HEIGHT; ?>);	  

	//Check whether the file is valid Image.
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.gif)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
 
        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") {
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
                    var height  = this.height;
                    var width   = this.width;
                    
                    if (width != fixWidth || height != fixHeight) {
                        alert("Image Height and Width should have "+ fixWidth +" * "+fixHeight+" px.");
						$("#fileUpload"+i).val('');
						$("#fileUpload"+i).focus();
                        return false;
                    }
                    //alert("Uploaded image has valid Height and Width.");
                    return true;
                };
             }
        } else {
           //alert("This browser does not support HTML5.");
           // return false;
       }
    } else {
      // alert("Please select a valid Image file.");
      //  return false;
   }
}	
		$( document ).ready(function() {
		
        var title 			 = $('#title');
        var category		 = $('#category');
	    var maincategory 	 = $('#maincategory');
		var subcategory 	 = $('#subcategory');
		var secondsubcategory= $('#secondsubcategory');
		var originalprice 	 = $('#originalprice');
		var discountprice 	 = $('#discountprice');
		var startdate 		 = $('#startdate');
		var enddate 		 = $('#enddate');
		var expirydate		 = $('#expirydate');
		var wysihtml5 		 = $('#wysihtml5');
		var metakeyword		 = $('#metakeyword');
		var metadescription	 = $('#metadescription');
		//var minlimt			 = $('#minlimit');
		var maxlimit		 = $('#maxlimit');
		var no_of_purchase = $('#no_of_purchase');
		var purchaselimit	 = $('#purchaselimit');
		var fileUpload		 	 = $('#fileUpload1');
	   var inctax       = $('#inctax');
 			var ext = $('#fileUpload1').val().split('.').pop().toLowerCase();
			var allow = new Array('png','jpg','jpeg','png');
			var valid = false;
			for(var x = 0; x < allow.length; x++) {
    		if(allow[x] == ext) {
        	valid = true;
        	break;
    			}
				}
		
       

/*Deal Origianl Price*/
      $('#originalprice').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
            originalprice.css('border', '1px solid red'); 
      $('#org_price_error_msg').html('<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY');} ?>');
      originalprice.focus();
      return false;
        }else{      
            originalprice.css('border', ''); 
      $('#org_price_error_msg').html('');         
    }
      });

/*tax percentage*/
     $('#inctax').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
            inctax.css('border', '1px solid red'); 
      $('#tax_error_msg').html('<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY');} ?>');
      inctax.focus();
      return false;
        }else{      
            inctax.css('border', ''); 
      $('#tax_error_msg').html('');         
    }
      });



        /*Deal Discount Price*/
    $('#discountprice').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
            discountprice.css('border', '1px solid red'); 
      $('#dis_price_error_msg').html('<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY');} ?>');
      discountprice.focus();
      return false;
        }else{      
            discountprice.css('border', ''); 
      $('#dis_price_error_msg').html('');         
    }
     });
		
		
  /*tax percentage*/
     $('#inctax').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
            inctax.css('border', '1px solid red'); 
      $('#tax_error_msg').html('<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY');} ?>');
      inctax.focus();
      return false;
        }else{      
            inctax.css('border', ''); 
      $('#tax_error_msg').html('');         
    }
      });

     /*Tax Amount*/
    if ($('#inctax_check').is(":checked"))
       //if(taxchecked==1)
    {
        if($('#inctax').val()=="" || $('#inctax').val()=="0")
      {
        $('#inctax').css('border', '1px solid red'); 
        $('#tax_error_msg').html('Please Enter Tax price');
        $("#tax_error_msg").fadeOut(5000);
        $('#inctax').focus();
        return false;
      }
      else
      {
        $('#inctax').css('border', ''); 
        $('#tax_error_msg').html('');
        
      }
    
      
    }
    else
    {
      $('#inctax').css('border', ''); 
      $('#tax_error_msg').html('');
    } 

/*shipping amount*/
      $('#Shipping_Amount').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
            Shipping_Amount.css('border', '1px solid red'); 
      $('#Shipping_Amount_error_msg').html('<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY');} ?>');
      Shipping_Amount.focus();
      return false;
        }else{      
            Shipping_Amount.css('border', ''); 
      $('#Shipping_Amount_error_msg').html('');         
    }
      });


		/*$('#minlimit').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
		{
            minlimt.css('border', '1px solid red'); 
			$('#mini_deal_error_msg').html('Numbers Only Allowed');
			minlimt.focus();
			return false;
        }
		else
		{			
            minlimt.css('border', ''); 
			$('#mini_deal_error_msg').html('');	        
		}
        });*/
		
		$('#maxlimit').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
		{
            maxlimit.css('border', '1px solid red'); 
			$('#max_deal_error_msg').html('Numbers Only Allowed');
			maxlimit.focus();
			return false;
        }
		else
		{			
            maxlimit.css('border', ''); 
			$('#max_deal_error_msg').html('');	        
		}
        });
		
		<?php /*?>$('#purchaselimit').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
		{
            purchaselimit.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			purchaselimit.focus();
			return false;
        }
		else
		{			
            purchaselimit.css('border', ''); 
			$('#error_msg').html('');	        
		}
        });<?php */?>
        
		
		$('#submit_deal').click(function() {
			
	    var startdate_val	 = $('#startdate').val(); 
		var enddate_val		 = $('#enddate').val();
	
  if($.trim(wysihtml5.val()) == '')
    {
      wysihtml5.css('border', '1px solid red'); 
      $('#desc_error_msg').html('Please Enter Description');
      wysihtml5.focus();
      return false;
    }
        else
        {
        wysihtml5.css('border', ''); 
        $('#desc_error_msg').html('');
        }
   

        if(maxlimit.val() == 0)
    {
      maxlimit.css('border', '1px solid red'); 
      $('#max_deal_error_msg').html('Please Enter User Limit');
      maxlimit.focus();
      return false;
    }
    else if(isNaN(maxlimit.val()) == true)
    {
      maxlimit.css('border', '1px solid red'); 
      $('#max_deal_error_msg').html('Numbers Only Allowed');
      maxlimit.focus();
      return false;
    }
	else if(parseInt(maxlimit.val()) <= parseInt(no_of_purchase.val()) )
	{	maxlimit.css('border', '1px solid red'); 
      $('#max_deal_error_msg').html('Maximum limit should be greater than number of purchase ' + $('#no_of_purchase').val());
      maxlimit.focus();
      return false;
		
	}
    /*else if(parseInt(maxlimit.val()) <= parseInt(minlimt.val()) )
    {
      maxlimit.css('border', '1px solid red'); 
      $('#max_deal_error_msg').html('Maximum value should greater than minimum value');
      maxlimit.focus();
      return false;
    }*/
        else
        {
        maxlimit.css('border', ''); 
        $('#max_deal_error_msg').html('');
        }


		 /* var pass_id = '<?php echo $deals->deal_id; ?>';
		 var mer_id   = $('#merchant').val();
		 var store_id = $('#shop').val();
		 var passData = 'title='+title.val()+'&dealid='+pass_id+"&mer_id="+mer_id+"&store_id="+store_id;
		//alert(passData);
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('check_title_exist_edit'); ?>',
				  success: function(responseText){  
				   if(responseText == 1)
				   { 
					title.css('border', '1px solid red'); 
			$('#title_error_msg').html('Please Enter Title');
			title.focus();
			return false;
				   }				   	 
				}		
			});	 */	
			
		 /* var pass_id = '<?php echo $deals->deal_id; ?>';
		 var mer_id   = $('#merchant').val();
		 var store_id = $('#shop').val();
		 var passData = 'title='+title.val()+'&dealid='+pass_id+"&mer_id="+mer_id+"&store_id="+store_id; alert(passData); 
		//alert(passData);
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('check_title_exist_edit'); ?>',
				  success: function(responseText){  
				   if(responseText == 1)
				   { 
					alert("This Deal Title Already Exist in this Store");
					//title.css('border', '1px solid red'); 
					//$('#title_error_msg').html('This Product Title Already Exist in this Store');
					//title.focus();
					return false;
				   }				   
				}		
			}); */
			
			

		if($.trim(title.val()) == "")
		{
			title.css('border', '1px solid red'); 
			$('#title_error_msg').html('Please Enter Title');
			title.focus();
			return false;
		}
        else
        {
        title.css('border', ''); 
        $('#title_error_msg').html('');
        }
		
		/* Deal title in french */
		<?php 
		if(!empty($get_active_lang)) { 
		foreach($get_active_lang as $get_lang) {
		$get_lang_name = $get_lang->lang_name;
		?>
		var title_fren = $('#title_<?php echo $get_lang_name; ?>');
		if($.trim(title_fren.val()) == ""){
			title_fren.css('border', '1px solid red'); 
			$('#title_fr_error_msg').html('Please Enter Title in <?php echo $get_lang_name; ?>');
			title_fren.focus();
			return false;
		}else{
			 title_fren.css('border', ''); 
        	 $('#title_fr_error_msg').html('');
		}
		<?php } } ?>
		
		
		if(category.val() == 0)
		{
			category.css('border', '1px solid red'); 
			$('#category_error_msg').html('Please Select Category');
			category.focus();
			return false;
		}
        else
        {
        category.css('border', ''); 
        $('#category_error_msg').html('');
        }
		
		if(maincategory.val() == 0)
		{
			maincategory.css('border', '1px solid red'); 
			$('#main_cat_error_msg').html('Please Select Main Category');
			maincategory.focus();
			return false;
		}
        else
        {
        maincategory.css('border', ''); 
        $('#main_cat_error_msg').html('');
        }
		/*
		if(subcategory.val() == 0)
		{
			subcategory.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Sub Category');
			subcategory.focus();
			return false;
		}
        else
        {
        subcategory.css('border', ''); 
        $('#error_msg').html('');
        }
        if(secondsubcategory.val() == 0)
		{
			secondsubcategory.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Select Sub Category');
			secondsubcategory.focus();
			return false;
		}
        else
        {
        secondsubcategory.css('border', ''); 
        $('#error_msg').html('');
        }*/
		
		if(originalprice.val() == 0)
		{
			originalprice.css('border', '1px solid red'); 
			$('#org_price_error_msg').html('Please Enter Original Price');
			originalprice.focus();
			return false;
		}
		else if(isNaN(originalprice.val()) == true)
		{
			originalprice.css('border', '1px solid red'); 
			$('#org_price_error_msg').html('Numbers Only Allowed');
			originalprice.focus();
			return false;
		}
        else
        {
        originalprice.css('border', ''); 
        $('#org_price_error_msg').html('');
        }
		
		if(discountprice.val() == 0)
		{
			discountprice.css('border', '1px solid red'); 
			$('#dis_price_error_msg').html('Please Enter Discount Price');
			discountprice.focus();
			return false;
		}
		else if(isNaN(discountprice.val()) == true)
		{
			discountprice.css('border', '1px solid red'); 
			$('#dis_price_error_msg').html('Numbers Only Allowed');
			discountprice.focus();
			return false;
		}
		else if(parseInt(discountprice.val()) > parseInt(originalprice.val()) )
		{
			discountprice.css('border', '1px solid red'); 
			$('#dis_price_error_msg').html('Discount price sholud be less than original price');
			discountprice.focus();
			return false;
		}
        else
        {
        discountprice.css('border', ''); 
        $('#dis_price_error_msg').html('');
        }
		
		if(startdate.val() == '')
		{ 
			startdate.css('border', '1px solid red'); 
			$('#start_date_error_msg').html('Please Select Start Date');
			startdate.focus();
			return false;
		}
		else if(startdate.val() != '')
		{
			 var now     = date('Y-m-d h:i:sa');
			
		}
        else
        { 
        startdate.css('border', ''); 
        $('#start_date_error_msg').html('');
        }
		
		if(enddate.val() == '')
		{
			enddate.css('border', '1px solid red'); 
			$('#end_date_error_msg').html('Please Select End Date');
			enddate.focus();
			return false;
		}
		else if ((Date.parse(startdate_val) >= Date.parse(enddate_val))) 
		{ 
			enddate.css('border', '1px solid red'); 
			$('#end_date_error_msg').html('End Date sholud be greater than start date');
			enddate.focus();
			return false;
		} 
        else
        {
        enddate.css('border', ''); 
        $('#end_date_error_msg').html('');
        }
		/*
		if(expirydate.val() == '')
		{
			expirydate.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Expiry Date');
			expirydate.focus();
			return false;
		}
		else if(expirydate.val() < enddate.val() )
		{
			expirydate.css('border', '1px solid red'); 
			$('#error_msg').html('Expiry Date sholud be greater than start date');
			expirydate.focus();
			return false;
		}
        else
        {
        expirydate.css('border', ''); 
        $('#error_msg').html('');
        }
		*/
		  if($.trim(wysihtml5.val()) == '')
		{
			wysihtml5.css('border', '1px solid red'); 
			$('#desc_error_msg').html('Please Enter Description');
			wysihtml5.focus();
			return false;
		}
        else
        {
        wysihtml5.css('border', ''); 
        $('#desc_error_msg').html('');
        }
		
				
		/*if($.trim(metakeyword.val()) == "")
		{
			metakeyword.css('border', '1px solid red'); 
			$('#meta_key_error_msg').html('Please Enter Metakeyword');
			metakeyword.focus();
			return false;
		}
        else
        {
        metakeyword.css('border', ''); 
        $('#meta_key_error_msg').html('');
        }
	
		if($.trim(metadescription.val()) == "")
		{
			metadescription.css('border', '1px solid red'); 
			$('#meta_desc_error_msg').html('Please Enter Metadescription');
			metadescription.focus();
			return false;
		}
        else
        {
        metadescription.css('border', ''); 
        $('#meta_desc_error_msg').html('');
        }
		
		/if(minlimt.val() == 0)
		{
			minlimt.css('border', '1px solid red'); 
			$('#mini_deal_error_msg').html('Please Enter Minimum Limit');
			minlimt.focus();
			return false;
		}
		else if(isNaN(minlimt.val()) == true)
		{
			minlimt.css('border', '1px solid red'); 
			$('#mini_deal_error_msg').html('Numbers Only Allowed');
			minlimt.focus();
			return false;
		}
        else
        {
        minlimt.css('border', ''); 
        $('#mini_deal_error_msg').html('');
        }*/

		if(maxlimit.val() == 0)
		{
			maxlimit.css('border', '1px solid red'); 
			$('#max_deal_error_msg').html('Please Enter User Limit');
			maxlimit.focus();
			return false;
		}
		else if(isNaN(maxlimit.val()) == true)
		{
			maxlimit.css('border', '1px solid red'); 
			$('#max_deal_error_msg').html('Numbers Only Allowed');
			maxlimit.focus();
			return false;
		}
		else if(parseInt(maxlimit.val()) <= parseInt(no_of_purchase.val()) )
	{		maxlimit.css('border', '1px solid red'); 
      $('#max_deal_error_msg').html('Maximum limit should be greater than number of purchase ' + $('#no_of_purchase').val());
      maxlimit.focus();
      return false;
	}
		/*else if(parseInt(maxlimit.val()) <= parseInt(minlimt.val()) )
		{
			maxlimit.css('border', '1px solid red'); 
			$('#max_deal_error_msg').html('Maximum value should greater than minimum value');
			maxlimit.focus();
			return false;
		}*/
        else
        {
        maxlimit.css('border', ''); 
        $('#max_deal_error_msg').html('');
        }
		
		<?php /*if(purchaselimit.val() == 0)
		{
			purchaselimit.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Purchase Limit');
			purchaselimit.focus();
			return false;
		}
		else if(isNaN(purchaselimit.val()) == true)
		{
			purchaselimit.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			purchaselimit.focus();
			return false;
		}
        else
        {
        purchaselimit.css('border', ''); 
        $('#error_msg').html('');
        }
	
		 var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
      	if(file.val() == "")
 		{
 		file.focus();
		file.css('border', '1px solid red'); 
		$('#error_msg').html('Please choose image');
		return false;
		}			
		else if ($.inArray($('#file').val().split('.').pop().toLowerCase(), fileExtension) == -1) { 				
		file.focus();
		file.css('border', '1px solid red'); 
		$('#error_msg').html('Please choose valid image');
		return false;
		}			
		else
		{
		file.css('border', ''); 
		$('#error_msg').html('');				
		}		*/ ?>			
     	
		});
	
		
    });
	</script>
    
</script>
  
  <script>
  $('#replace_days').keydown(function (e) 
  {
     if (e.shiftKey || e.ctrlKey || e.altKey)
     {
      e.preventDefault();
     } 
     else 
     {
      var key = e.keyCode;
      if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)))
       {
        e.preventDefault();
       }
    }
  });
  
  $('#return_days').keydown(function (e) 
  {
     if (e.shiftKey || e.ctrlKey || e.altKey)
     {
      e.preventDefault();
     } 
     else 
     {
      var key = e.keyCode;
      if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)))
       {
        e.preventDefault();
       }
    }
  });
  
  $('#cancellation_days').keydown(function (e) 
  {
     if (e.shiftKey || e.ctrlKey || e.altKey)
     {
      e.preventDefault();
     } 
     else 
     {
      var key = e.keyCode;
      if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)))
       {
        e.preventDefault();
       }
    }
  });
  
  
  </script>


    <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    
   <script src="{{ url('') }}/public/assets/js/bootstrap-datetimepicker.min.js"></script>
	
	 <script src="{{ url('') }}/public/assets/js/moment-with-locales.js"></script>
   <script src="{{ url('') }}/public/assets/js/bootstrap-datetimepicker.js"></script>
	<!-- New Date picker-->
	<script type="text/javascript">

  $(function () {
	  
	  var mEd = $(".myEndDate").val();
                $('#dtpickerdemo').datetimepicker({
            defaultDate: mEd
        });
            });
    
	
$('#dtpickerdemo').on('click', function(e){ 
  //alert($("#startdate").val());
  $(function () {
$('#dtpickerdemo').datetimepicker({
                  minDate: mSt
                });
 });
});
	
     $(function () {
		 
		  mSt = $(".myStartDate").val();
                
                $('#dtpickerdemo1').datetimepicker({
           defaultDate: mSt
        });
            });

			
      
    </script>

         <!-- PAGE LEVEL SCRIPTS -->
    <script src="{{ url('') }}/public/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="{{ url('') }}/public/assets/js/editorInit.js"></script>
    <script>
       //$(function () { formWysiwyg(); });
	    $(document).ready(function () {
  $('.wysihtml5').wysihtml5();
});
    </script>
   <script type="text/javascript">
    function addFormField() {
		
      var id = document.getElementById("aid").value;
	  var count_id = document.getElementById("count").value;	  
	  if(count_id < 4){
	  document.getElementById('count').value = parseInt(count_id)+1;
      jQuery.noConflict()
      jQuery("#divTxt").append("<tr style='height:5px;' > <td> </td> </tr><tr id='row" + id + "' style='width:100%'><td width='20%'><input type='file' name='file_more"+count_id+"' /></td><td>&nbsp;&nbsp<a href='#' onClick='removeFormField(\"#row" + id + "\"); return false;' style='color:#F60;' >Remove</a></td></tr>");     
         jQuery('#row' + id).highlightFade({    speed:1000 });
     id = (id - 1) + 2;
     document.getElementById("aid").value = id;
	 
	}	
	if(count_id == 4)
	{
		alert("You can add maximum 5 images");;
	}
    }
        
      function removeFormField(id) {
		 
var count_id = document.getElementById("count").value;
 document.getElementById('count').value = parseInt(count_id)-1;
        jQuery(id).remove();
    }
    </script>


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
            imgSrc : "<?php echo url('');?>/public/assets/deals/"+imgFileName,
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
