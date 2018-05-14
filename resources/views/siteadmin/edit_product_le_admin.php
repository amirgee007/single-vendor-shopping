<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD --><head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_PRODUCTS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT_PRODUCTS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_PRODUCTS');} ?></title>
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

    <style type="text/css">
    .multiselect-container {
      height: 200px !important;
      overflow-y: scroll !important;
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

</head>
<?php /* Edit Image Starts */ ?>

<style type="text/css">
  .imageBox {
  position: relative;
  /*height: 800px;
  width: 800px;*/
  background: #fff;
  overflow: hidden;
  background-repeat: no-repeat;
  cursor: move;
  box-shadow: 4px 4px 12px #B0B0B0;
}

.imageBox .thumbBox {
  position: absolute;
     /*width: 800px;
    height: 800px;*/
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

              
                <div class="imageBox" style="width: <?php echo $PRODUCT_WIDTH;?>px; height: <?php echo $PRODUCT_HEIGHT;?>px;">
                  <!--<div id="img" ></div>-->
                  <!--<img class="cropImg" id="img" style="display: none;" src="images/avatar.jpg" />-->
                  <div class="mask"></div>
                  <div class="thumbBox" style="width: <?php echo $PRODUCT_WIDTH;?>px; height: <?php echo $PRODUCT_HEIGHT;?>px;"></div>
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

                <form id='dev_upImg_form' action="<?php echo url(''); ?>/CropNdUpload" method='post' >
                    
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
                              <li class=""><a><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_HOME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME');} ?></a></li>
                                <li class="active"><a ><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_PRODUCTS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT_PRODUCTS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_PRODUCTS');} ?></a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_PRODUCTS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT_PRODUCTS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_PRODUCTS');} ?></h5>
            
        </header>
        @if (Session::has('block_message'))
          <div class="alert alert-success alert-dismissable">{!! Session::get('block_message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
        @endif
@if ($errors->any())  
         <br>
     <ul style="color:red;">
    <div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    </ul> 
    @endif
        @if (Session::has('message'))
    <p style="background-color:green;color:#fff; padding: 5px;">{!! Session::get('message') !!}</p>
    @endif
    @if (Session::has('error_message'))
    <div class="alert alert-danger alert-dismissable">{!! Session::get('error_message') !!}</div>
    @endif
    <?php foreach($product_list as $products)
    {  }
     $title      = $products->pro_title;
     $title_fr     = $products->pro_title_fr;
         $category_get   = $products->pro_mc_id;
       $maincategory   = $products->pro_smc_id;
     $subcategory    = $products->pro_sb_id;
     $secondsubcategory= $products->pro_ssb_id;
     $originalprice  = $products->pro_price;
     $discountprice  = $products->pro_disprice;
     $inctax=$products->pro_inctax;
     $shippingamt=$products->pro_shippamt;
     $description    = $products->pro_desc;
     $description_fr = $products->pro_desc_fr;
     $deliverydays   = $products->pro_delivery;
     $merchant     = $products->pro_mr_id;
     $shop       = $products->pro_sh_id;
     $metakeyword  = $products->pro_mkeywords;
     $metakeyword_fr = $products->pro_mkeywords_fr;
     $metadescription= $products->pro_mdesc;
     $metadescription_fr= $products->pro_mdesc_fr;
     $file_get     = $products->pro_Img;
     $img_count    = $products->pro_image_count;
     $productspec    = $products->pro_isspec;
     $pro_is_siz     = $products->pro_is_size;
     $pro_is_color   = $products->pro_is_color;
     $pqty           = $products->pro_qty;
     $cash_pack      = $products->cash_pack;

     //$product_brand = $products->product_brand_id;

?>

        <div id="div-1" class="accordion-body collapse in body">
               {!! Form::open(array('url'=>'edit_product_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')) !!}


    <input type="hidden" name="product_edit_id" name="product_edit_id" value="<?php echo $products->pro_id; ?>" />
    <div id="error_msg"  style="color:#F00;font-weight:800"  > </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_TITLE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_TITLE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_TITLE');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="Product_Title" maxlength="150" placeholder="" name="Product_Title" class="form-control" type="text" value="<?php echo $title; ?>">
            <div id="title_error_msg"  style="color:#F00;font-weight:800"> </div>
           </div>
                </div>
        
        <?php 
        if(!empty($get_active_lang)) { 
        foreach($get_active_lang as $get_lang) {
        $get_lang_name = $get_lang->lang_name;
        $get_lang_code = $get_lang->lang_code;
        $product_title_dynamic = 'pro_title_'.$get_lang_code; 
        ?>
        <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Product Title({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="Product_Title_<?php echo $get_lang_name; ?>" maxlength="150" placeholder="Enter Product Name in {{ $get_lang_name }}" name="Product_Title_<?php echo $get_lang_name; ?>" class="form-control" type="text" value="<?php echo $products->$product_title_dynamic; ?>">
            <div id="title_fr_error_msg"  style="color:#F00;font-weight:800"> </div>
           </div>
                </div>
        <?php } } ?>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_TOP_CATEGORY');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
    
       <select class="form-control" name="category" id="category" onChange="select_main_cat(this.value);get_specification_details();show_alert();" >
                        <option value="0">--- <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT');} ?> ---</option>
                       <?php foreach($category as $cat_list)  { ?>
             
             @if (Input::old('Product_Category') == $cat_list->mc_id)
            <option value="<?php echo $cat_list->mc_id; ?>" selected><?php echo $cat_list->mc_name; ?></option>
            @else
                <option value="<?php echo $cat_list->mc_id; ?>" <?php if($cat_list->mc_id ==  $category_get) { ?> selected <?php } ?> ><?php echo $cat_list->mc_name; ?></option>
            @endif
             
                    
            
            
                        <?php } ?>
       </select>      
          <div id="category_error_msg"  style="color:#F00;font-weight:800"  > </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_MAIN_CATEGORY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_MAIN_CATEGORY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_MAIN_CATEGORY');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="maincategory" id="maincategory" onChange="select_sub_cat(this.value);get_specification_details();show_alert();"  >
                  <option value="0">---<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT');} ?>---</option>          
                </select>
            <div id="main_cat_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SUB_CATEGORY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_SUB_CATEGORY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SUB_CATEGORY');} ?><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="subcategory" id="subcategory" onChange="select_second_sub_cat(this.value)" >
                    <option value="0">---<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT');} ?>---</option>         
                </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SECOND_SUB_CATEGORY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_SECOND_SUB_CATEGORY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SECOND_SUB_CATEGORY');} ?><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                    <select class="form-control" name="secondsubcategory" id="secondsubcategory"  >
                <option value="0">---<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT');} ?>---</option>      
                                                  </select>
                    </div>
                </div>
        <?php /*Brand
        <div class="form-group">
                  <label for="pass1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_BRAND')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_BRAND');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_BRAND');} ?><span class="text-sub">*</span></label>
          <div class="col-lg-8">
          <select class="form-control" name="product_brand" id="product_brand" >
                        <option value="0">--- <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_BRAND')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_BRAND');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_BRAND');} ?>---</option>
                       <?php foreach($brand_details as $brand_data)  { ?>
                    <option value="<?php echo $brand_data->brand_id; ?>" <?php if($brand_data->brand_id ==  $products->product_brand_id) { ?> selected <?php } ?> ><?php echo $brand_data->brand_name; ?></option>
                        <?php } ?>
          </select>     
          <div id="brand_error_msg"  style="color:#F00;font-weight:800"  > </div>
                  </div>
               </div>
         Brand*/ ?>
             <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_QUANTITY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_QUANTITY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_QUANTITY');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input placeholder="Enter Quantity of Product" class="form-control" type="text" id="Quantity_Product" name="Quantity_Product" value="<?php echo $pqty; ?>" maxlength="5">
            <div id="qty_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ORIGINAL_PRICE');} ?> ({{ Helper::cur_sym() }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input   placeholder="Numbers Only" class="form-control" type="text" id="Original_Price" value="<?php echo $originalprice; ?>" name="Original_Price" maxlength="10" >
            <div id="org_price_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
          <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DISCOUNTED_PRICE');} ?> ({{ Helper::cur_sym() }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input placeholder="Numbers Only" class="form-control" type="text" id="Discounted_Price" name="Discounted_Price" value="<?php echo $discountprice; ?>" maxlength="10">
            <div id="dis_price_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
         <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                                
                                <input type="checkbox" <?php if($inctax > 0) { ?> checked="checked" <?php } ?> id="inctax_check" onclick="if(this.checked){$('#inctax').show();}else{$('#inctax').hide();$('#inctax').val(0)}"> ( <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_INCLUDING_TAX_AMOUNT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_INCLUDING_TAX_AMOUNT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_INCLUDING_TAX_AMOUNT');} ?> ) 
                                <input placeholder="Numbers Only" <?php if($inctax == 0) { ?> style="display:none;" <?php } ?>  class="form-control" type="number" min="1" max="99" id="inctax" name="inctax" value="<?php echo $inctax;?>">%
                <div id="tax_error_msg"  style="color:#F00;font-weight:800"> </div>     
                    </div>
                </div>

    <div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPPING_AMOUNT');} ?> <span class="text-sub">*</span></label>

                   <div class="col-lg-8">
<input type="radio" id="shipamt" name="shipamt" onClick="setshipVisibility('showship', 'none');" value="1" <?php if($shippingamt<1){?>checked<?php } ?> > <label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_FREE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_FREE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_FREE');} ?></label>
<input type="radio" id="shipamt" name="shipamt" onClick="setshipVisibility('showship', 'inline');" value="2" <?php if($shippingamt>0){?>checked<?php } ?>  ><label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_AMOUNT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT');} ?></label>

          
            <label class="sample"></label>
                    </div>
                </div>
<?php 
if($shippingamt<1){ 
  $showship="display:none";
}else{
  $showship="display:block";
}?>

          <div class="form-group" id="showship" style="<?php echo $showship;?>" >
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPPING_AMOUNT');} ?> ({{ Helper::cur_sym() }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input  placeholder="" class="form-control" type="text" maxlength="10" id="Shipping_Amount" name="Shipping_Amount" value="<?php echo $shippingamt; ?>">
            <div id="ship_amt_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
          
         
         <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DESCRIPTION');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10" placeholder="Enter Your Description {{ $default_lang }}" id="Description" name="Description"><?php echo $description; ?></textarea>
           <div id="desc_error_msg"  style="color:#F00;font-weight:800"> </div>
          
                    </div>
                </div>
        <?php 
        if(!empty($get_active_lang)) { 
        foreach($get_active_lang as $get_lang) {
        $get_lang_name = $get_lang->lang_name;
        $get_lang_code = $get_lang->lang_code;
        $product_description_dynamic = 'pro_desc_'.$get_lang_code; 
        ?>
        
        <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Description ({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
           <textarea id="wysihtml5" class="wysihtml5 form-control description_<?php echo $get_lang_name; ?>" rows="10" id="Description_<?php echo $get_lang_name; ?>" name="Description_<?php echo $get_lang_name; ?>" placeholder="Enter Your Description in <?php echo $get_lang_name; ?>"><?php echo $products->$product_description_dynamic; ?></textarea>
           <div id="desc_fr_error_msg"  style="color:#F00;font-weight:800"> </div>
          
                    </div>
                </div>
        <?php } } ?>
        
      <div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_WANT_TO_ADD_SPECIFICATION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_WANT_TO_ADD_SPECIFICATION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_WANT_TO_ADD_SPECIFICATION');} ?><span class="text-sub"></span></label>

                    <div class="col-lg-8" id="specification_list_avail">
<input type="radio"  name="specification"   onClick="setVisibility('sub4', 'inline');get_specification_details();" value="1" <?php if($productspec==1) {?> checked <?php }?>> <label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YES');} ?>                  </label>
    <input type="radio" name="specification"  onClick="setVisibility('sub4', 'none');" value="2" <?php if($productspec==2) {?>checked <?php } ?>> <label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NO');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NO');} ?>                  </label>
          
            <label class="sample"></label>
                    </div>
                     <div class="col-lg-8" id="specification_list_notavail" style="display:none;"> No specification List avaliable for this particular Category  </div>
                </div>
                


<?php  
$resultspec="";
$resultspectext="";
  ?>
  @foreach ($existingspecification as $existingspecification1) 
  <?php 
  $resultspec=$existingspecification1->spc_sp_id.",".$resultspec;
  $resultspectext=$existingspecification1->spc_value.",".$resultspectext;
  ?>
  @endforeach

<?php 
if(strlen($resultspec)>0)
{

$trimmedspec=trim($resultspec,",");
$specarray=explode(",",$trimmedspec);
$speccount=count($specarray)-1;
$trimmedtext=trim($resultspectext,",");
$textarray=explode(",",$trimmedtext);
$specidvalue=$speccount+1;
}
else
{
 $speccount = $specidvalue =0;
}
 
?>
  <?php if($productspec==1){ ?>
  
         <div class="form-group" id="sub4" <?php if($productspec==1){?>style="display:block"<?php }else {?>style="display:none;"<?php }?> >
                    <label for="text2" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION');} ?></label>

                    <div class="col-lg-8">
                    <label><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_TEXT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_TEXT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_TEXT');} ?> ( <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SPECIFICATION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SPECIFICATION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MORE_CUSTOM_SPECIFICATION');} ?> <a href="<?php echo url('')?>/manage_specification"> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD');} ?> </a> )</label>
          <label>Specification <?php echo $default_lang; ?></label>
          <label>Specification In French</label>
          </div>

    <?php $i=0; //$speccount = count($existingspecification);
    ?>
    @foreach ($existingspecification as $existingspecification1) 
    
      <div class="col-lg-3">
                <select class="form-control" name="<?php echo 'spec_grp'.$i;?>" id="<?php echo 'spec_grp'.$i;?>" onChange='spcfunction(<?php echo $i;?>,this.value);'>
                        <option  value="0">-- select Specification Group --</option>
                  @foreach ($spec_group as $pro_spec_group) 
                  <option  value="<?php echo $pro_spec_group->spg_id;?>" <?php if($pro_spec_group->spg_id==$existingspecification1->spc_spg_id){?>selected<?php } ?> >{!!$pro_spec_group->spg_name!!}</option>
                  @endforeach
            </select>
            </div>
      
      <div class="col-lg-3">
        <select class="form-control" id="<?php echo 'pro_spec'.$i;?>" name="<?php echo 'spec'.$i;?>">
                        <option  value="0">--select specification--</option>
                @foreach ($productspecification as $specification) 
               <option  value="<?php echo $specification->sp_id;?>" <?php if($specification->sp_id==$existingspecification1->spc_sp_id){?>selected<?php } ?> >{!!$specification->sp_name!!}</option>
               @endforeach
            </select>
            </div>
      
      <div class="col-lg-3">
                <input type="text" class="form-control" name="<?php echo 'spectext'.$i;?>" value="<?php echo $existingspecification1->spc_value;?>">
            </div>
      <?php if(!empty($get_active_lang)) { 
        foreach($get_active_lang as $get_lang) {
        $get_lang_name = $get_lang->lang_name;
        $get_lang_code = $get_lang->lang_code; 
        $spc_value_dynamic = 'spc_value_'.$get_lang_code; 
        ?>
      <div class="col-lg-3">
                <input type="text" class="form-control" name="<?php echo $get_lang_code.'_spectext'.$i;?>" value="<?php echo $existingspecification1->$spc_value_dynamic;?>">
            </div>
    <?php } } $i++; ?>
    @endforeach
    


                    <input type="hidden" id="specificationid1" value="<?php echo $specidvalue;?>">
        <input type="hidden" id="specificationcount" name="specificationcount" value="<?php echo $speccount;?>">
                    
                </div>


    <div  id="divspecificationTxt">

    </div>  

     <div class="form-group"  >

     <div class="col-lg-3">
                    
                    </div>
                   
    <p id="addmore" <?php if($productspec==1){?>style="display:block"<?php }else {?>style="display:none;"<?php }?>><a onClick="addspecificationFormField();"  style="cursor:pointer;color:#F60; "><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_MORE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_MORE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_MORE');} ?></a> </p>
    </div>  


<?php } else {?>
  <div class="form-group" id="sub4" style="display:none;"  >
                    <label for="text2" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION');} ?></label>

                    <div class="col-lg-8">
                    <label><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_TEXT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_TEXT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_TEXT');} ?> ( <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SPECIFICATION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SPECIFICATION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MORE_CUSTOM_SPECIFICATION');} ?> <a href="<?php echo url('')?>/manage_specification"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD');} ?></a> )</label>
      </div>

      <div class="col-lg-3 col-lg-offset-2">
                <select class="form-control" name="spec_grp0" id="spec_grp0" onChange='spcfunction(0,this.value);'>
                        <option  value="0">-- select Specification Group --</option>
                  @foreach ($spec_group as $pro_spec_group) 
                  <option  value="<?php echo $pro_spec_group->spg_id;?>">{!!$pro_spec_group->spg_name!!}</option>
                  @endforeach
            </select>
            </div>
    
      <div class="col-lg-3">
        <select class="form-control" id="pro_spec0" name="spec0">
                        <option  value="0">--select specification--</option>
                @foreach ($productspecification as $specification) 
               <option  value="<?php echo $specification->sp_id;?>"  >{!!$specification->sp_name!!}</option>
               @endforeach
            </select>
                    </div>


                   
                    <div class="col-lg-3">
                       <input type="text" class="form-control" id="spectext0" name="spectext0" placeholder="Specification {{ $default_lang }}" value="">
                    </div>
          <?php if(!empty($get_active_lang)) { 
        foreach($get_active_lang as $get_lang) {
        $get_lang_name = $get_lang->lang_name;
        $get_lang_code = $get_lang->lang_code; 
        $spc_value_dynamic = 'spc_value_'.$get_lang_code; 
        ?>          
        <div class="col-lg-3">
                       <input type="text" class="form-control" id="{{ $get_lang_code }}_spectext0" name="{{ $get_lang_code }}_spectext0" placeholder="Specification in {{ $get_lang_name  }}" value="">
                </div>
                <?php } } ?>

                    <input type="hidden" id="specificationid1" value="1">
        <input type="hidden" id="specificationcount" name="specificationcount" value="0">
                    
                </div>


    <div  id="divspecificationTxt">

    </div>  

     <div class="form-group"  >

     <div class="col-lg-3">
                    
                    </div>
                   
    <p id="addmore"  style="display:none;"><a onClick="addspecificationFormField();"  style="cursor:pointer;color:#F60; "><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_MORE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_MORE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_MORE');} ?></a> </p>
     <div id="spec_error_msg"  style="color:#F00;font-weight:800"> </div>
    </div>  



<?php }?>

<input type="hidden" name="is_pro_siz" value="<?php echo $pro_is_siz; ?>">
 <div class="form-group">
      <label for="text2" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_PRODUCT_SIZE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_PRODUCT_SIZE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_PRODUCT_SIZE');} ?><span class="text-sub"></span></label>

      <div class="col-lg-8">
      <input type="radio" id="pro_siz" name="pro_siz"  onClick="product_siz('pro_size', 'inline');" value="0" <?php if($pro_is_siz==0){ echo "checked";}?>> <label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YES');} ?></label>
      <input type="radio" name="pro_siz"  id="pro_siz" onClick="product_siz('pro_size', 'none');" value="1" <?php if($pro_is_siz==1){ echo "checked";}?>> <label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NO');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NO');} ?> </label>
      <label class="sample"></label>
       </div>
</div>

<div class="form-group" id="pro_size" <?php if($pro_is_siz==0){?>style="display:block"<?php }else {?>style="display:none;"<?php }?>>
   <label for="text2" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_SIZE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_SIZE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_SIZE');} ?><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <select class="form-control" onchange="getsizename(this.value)"  name="Product_Size" id="Product_Size" >
                       <option value="0" selected>--<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SIZE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_SIZE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SIZE');} ?>--</option>
      @foreach ($productsize as $size) 
       <?php if($size->si_name !='no size'){?>
               <option  value="<?php echo $size->si_id;?>">{!!$size->si_name!!}</option>
       <?php } ?>
               @endforeach
         
        </select>
          <label><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SIZES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SIZES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MORE_CUSTOM_SIZES');} ?>  <a href="<?php echo url('')?>/manage_size"> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD');} ?></a></label>
                <div id="size_error_msg"  style="color:#F00;font-weight:800"> </div>
    </div>
                </div>

<?php  
$resultsize="";
$sizename="";
 ?>
  @foreach ($existingsize as $existingsize1) 
  <?php 
    $resultsize=$existingsize1->ps_si_id.",".$resultsize;
    $sizename=$existingsize1->si_name.",".$sizename;
  ?>
  @endforeach

<?php 
//print_r($resultsize);
if(strlen($resultsize)>0)
{

$trimmedsizes=trim($resultsize,",");
$sizearray=explode(",",$trimmedsizes);
$sizecount=count($sizearray);

$trimsizename=explode(",",$sizename);
}
else
{
$resultsize="0,";
$sizecount=0;
}
 
?>

<div class="form-group" id="sizediv" <?php if($pro_is_siz==0){?>style="display:block"<?php }else {?>style="display:none;"<?php }?>>

 <input type="hidden" id="productsizecount" name="productsizecount" value="<?php echo $sizecount;?> ">
     <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YOUR_SELECT_SIZE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YOUR_SELECT_SIZE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YOUR_SELECT_SIZE');} ?><span class="text-sub">:</span></label>

                    <div class="col-lg-8">
                       <p id="showsize" >

    <?php for($i=0;$i<$sizecount;$i++) {
      if($trimsizename[$i] !='no size'){?>
        <span style="padding-right:10px;"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SIZE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_SIZE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SIZE');} ?>:</span><?php echo $trimsizename[$i];?><span style="color:#ff0099;padding-right:90px"><input type="checkbox"  name="<?php echo 'sizecheckbox'.$sizearray[$i];?>"style="padding-left:30px;" checked="checked" value="1" ></span>
     <?php } 
     } ?>
    </p>
    
    
                       <input type="hidden"  name="si"  value="<?php echo $resultsize;?>" id="si" />
                    </div>
</div>
<div class="form-group" id="quantitydiv" <?php if($sizecount>0){ ?> style="display:none;" <?php }else { ?> style="display:none;" <?php } ?>>
       <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_QUANTITY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_QUANTITY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_QUANTITY');} ?><span class="text-sub">:</span></label>

                    <div class="col-lg-8">
                       <p id="showquantity" >

    <?php for($i=0;$i<$sizecount;$i++) { ?>
   <input type="text" name="<?php echo 'quantity'.$sizearray[$i];?>" value="1" style="padding:10px;border:5px solid gray;margin:0px;" onkeypress="return isNumberKey(event)" ></input>  <?php } ?>  
</p>
                       <input type="hidden"   value="0," id="sq" />
                    </div>
</div>
        
<?php  
$resultcolor="";
$colorname="";
$colorcode="";
 ?>
  @foreach ($existingcolor as $existingcolor1) 
  <?php 
    $resultcolor=$existingcolor1->pc_co_id.",".$resultcolor;
    $colorname=$existingcolor1->co_name.",".$colorname;
    $colorcode=$existingcolor1->co_code.",".$colorcode;
  ?>
  @endforeach

<?php 

 
if(strlen($resultcolor)>0)
{

$trimmedcolor=trim($resultcolor,",");
$colorarray=explode(",",$trimmedcolor);
$colorcount=count($colorarray);
$colornamearray=explode(",",$colorname);
$colorcodearray=explode(",",$colorcode);
}
else
{
$colorcount=0;
$resultcolor="0,";
}

?>

 
<input type="hidden" name="is_pro_color" value="<?php echo $pro_is_color; ?>">
<div class="form-group" >
   <label for="text2" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_COLOR_FIELD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_COLOR_FIELD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_COLOR_FIELD');} ?><span class="text-sub"></span></label>
   <div class="col-lg-8">  <input type="radio" name="productcolor" id="productcolor" onClick="setVisibility1('sub3', 'inline');" value="0" <?php if($pro_is_color==0){ echo "checked";}?>> <label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YES');} ?>                  </label>
          <input type="radio" name="productcolor" id="productcolor" onClick="setVisibility1('sub3', 'none');" value="1" <?php if($pro_is_color==1){ echo "checked";}?>><label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NO');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NO');} ?></label>
            <label class="sample"></label>
                    </div>
                </div>
                
                <div class="form-group" id="sub3"   <?php if($pro_is_color==0){ ?> style="display:block;" <?php }else { ?> style="display:none;" <?php } ?>>
                    <label for="text2" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_COLOR')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_COLOR');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_COLOR');} ?></label>

                   <div class="col-lg-3">
           <select class="form-control" name="selectprocolor"  id="selectprocolor" onchange="getcolorname(this.value)">
            <option value="0" selected >--<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT');} ?>--</option>
       @foreach ($productcolor as $color) 
               <option style="background:<?php echo $color->co_code;?>;" value="<?php echo $color->co_id;?>">{!!$color->co_name!!}</option>
               @endforeach
                </select>
        
       <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_COLORS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_COLORS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MORE_CUSTOM_COLORS');} ?> <a href="<?php echo url('')?>/manage_color"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD');} ?></a>
    <div id="color_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>

      <div class="form-group" id="colordiv" <?php if($pro_is_color==0){ ?> style="display:block;" <?php }else { ?> style="display:none;" <?php } ?>>
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YOUR_SELECTED_COLOR')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YOUR_SELECTED_COLOR');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YOUR_SELECTED_COLOR');} ?><span class="text-sub">:</span></label>

                    <div class="col-lg-8">
                       <p id="showcolor" >
      <?php for($i=0;$i<$colorcount;$i++) { ?>
      
<?php $bordercolor="border:5px solid".$colorcodearray[$i];?>
      <span style="width:220px;padding:10px;<?php echo $bordercolor;?>;margin:0px;"><?php echo $colornamearray[$i];?><input type="checkbox"  name="<?php echo 'colorcheckbox'.$colorarray[$i];?>"style="padding-left:30px;" checked="checked" value="1" ></span>

      <?php } ?>


      </p>
                       <input type="hidden"  name="co" value="<?php echo $resultcolor;?>" id="co" />
                    </div>
                </div>
    <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DELIVERY_DAYS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DELIVERY_DAYS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DELIVERY_DAYS');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="" id="Delivery_Days" name="Delivery_Days" maxlength="3" value="<?php echo $deliverydays; ?>"> Days
                    </div>
                </div>
         <div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <?php /* if (Lang::has(Session::get('admin_lang_file').'.BACK_EG')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EG');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EG');} : ( 2 - 5 )*/ ?>
            <div id="delivery_error_msg"  style="color:#F00;font-weight:800"> </div> 
                    </div>
                </div>
           <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_MERCHANT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_MERCHANT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_MERCHANT');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <select class="form-control" name="Select_Merchant" id="Select_Merchant" onchange="getshop_ajax(this.value);">
      @foreach ($merchantdetails as $merchantval) 
   <option  value="<?php echo $merchantval->mer_id;?>" <?php if($merchantval->mer_id==$merchant) { ?>  selected <?php } ?> >{!!$merchantval->mer_fname!!}</option>
               @endforeach
        </select>
    <div id="merchant_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
          <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_STORE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_STORE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_STORE');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="Select_Shop" id="Select_Shop" >

       </select>
       <div id="address"></div>
      <div id="store_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>

        
          <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_META_KEYWORDS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_META_KEYWORDS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_META_KEYWORDS');} ?><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" id="Meta_Keywords" name="Meta_Keywords"><?php echo $metakeyword;?></textarea>
             <div id="meta_key_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
        
        <?php if(!empty($get_active_lang)) { 
        foreach($get_active_lang as $get_lang) {
        $get_lang_name = $get_lang->lang_name;
        $get_lang_code = $get_lang->lang_code;
        $meta_key_dynamic = 'pro_mkeywords_'.$get_lang_code; 
        ?>
        <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta Keywords ({{ $get_lang_name }}) <span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" id="Meta_Keywords_<?php echo $get_lang_name; ?>" name="Meta_Keywords_<?php echo $get_lang_name; ?>" placeholder="Enter Meta Keywords in <?php echo $get_lang_name; ?>"><?php echo $products->$meta_key_dynamic;?></textarea>
             <div id="meta_key_fr_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
        <?php } }?>
        
         <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_META_DESCRIPTION');} ?><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" id="Meta_Description" name="Meta_Description"><?php echo $metadescription ; ?></textarea>
             <div id="meta_desc_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
        
        <?php if(!empty($get_active_lang)) { 
        foreach($get_active_lang as $get_lang) {
        $get_lang_name = $get_lang->lang_name;
        $get_lang_code = $get_lang->lang_code;
        $meta_desc_dynamic = 'pro_mdesc_'.$get_lang_code; 
        ?>
        <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Meta Description ({{ $get_lang_name }})<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" id="Meta_Description_<?php echo $get_lang_name; ?>" name="Meta_Description_<?php echo $get_lang_name; ?>"><?php echo $products->$meta_desc_dynamic; ?></textarea>
             <div id="meta_desc_fr_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
        <?php } }?>
    <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CASH_BACK')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CASH_BACK');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CASH_BACK');} ?> ({{ Helper::cur_sym() }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input class="form-control" type="text" name="cash_price" id="cash_back" maxlength="5" value="{!!$cash_pack!!}" onKeyPress="return onlyNumbers(this);">
                    </div>
             </div>

             <?php /*  Product Policy details */ ?>
                {{-- Cancel Policy starts --}}
                <div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_APPLY_CANCEL')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_APPLY_CANCEL');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_APPLY_CANCEL');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="radio" id="allow_cancel" name="allow_cancel"  value="1"  @if($products->allow_cancel=='1') checked @endif  onClick="setPolicyDisplay('cancel_tab', 'block')"> <label class="sample"  ><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YES');} ?></label>
                        <input type="radio" id="notallow_cancel" name="allow_cancel"  value="0" @if($products->allow_cancel=='0') checked @endif    onclick="setPolicyDisplay('cancel_tab', 'none')"><label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NO');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NO');} ?></label>


                        <label class="sample"></label>
                    </div>
                </div>


                <div id="cancel_tab" style="display:none;">
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_DESCRIPTION');} ?> <span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="cancellation_policy" placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_CANCEL_DESCRIPTION');} ?>">{{ $products->cancel_policy }}</textarea>
                           <div id="cancellation_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                     <?php 
                 if(!empty($get_active_lang)) { 
                 foreach($get_active_lang as $get_lang) {
                  $get_lang_name = $get_lang->lang_name;
                  $get_lang_code = $get_lang->lang_code;
                  $cancel_policy_dynamic = 'cancel_policy_'.$get_lang_code;
                 ?>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_DESCRIPTION');} ?> ({{ $get_lang_name }}) <span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="cancellation_policy_{{$get_lang_name}}" placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_CANCEL_DESCRIPTION');} ?>">{{ $products->$cancel_policy_dynamic }}</textarea>
                           <div id="cancellation_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                    <?php } } ?>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                        <div class="col-lg-8">
                                <label for="text1" class="control-label "><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_CANCEL_DESCRIPTION');} ?><span class="text-sub"></span></label>     
                                <input placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_CANCEL_DESCRIPTION');} ?>"  class="form-control" type="text" id="cancellation_days" maxlength="3" name="cancellation_days" value='{{ $products->cancel_days }}'>
                                    <div id="cancellation_error_msg"  style="color:#F00;font-weight:800"> </div>         
                        </div>
                    </div>

                </div> 

                {{-- Cancel Policy ends --}}
                {{-- REturn Policy starts --}}
                <div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_APPLY_RETURN')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_APPLY_RETURN');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_APPLY_RETURN');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="radio" id="allow_return" name="allow_return"  value="1" @if($products->allow_return=='1') checked @endif   onclick="setPolicyDisplay('return_tab', 'block')" > <label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YES');} ?></label>
                        <input type="radio" id="notallow_return" name="allow_return"  value="0" @if($products->allow_return=='0') checked @endif    onclick="setPolicyDisplay('return_tab', 'none')" ><label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NO');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NO');} ?></label>


                        <label class="sample"></label>
                    </div>
                </div>


                <div id="return_tab" style="display:none;">
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_RETURN_DESCRIPTION');} ?>  <span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="return_policy" placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_RETURN_DESCRIPTION');} ?>">{{ $products->return_policy }}</textarea>
                           <div id="return_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                    <?php 
                     if(!empty($get_active_lang)) { 
                     foreach($get_active_lang as $get_lang) {
                      $get_lang_name = $get_lang->lang_name;
                      $get_lang_code = $get_lang->lang_code;
                      $return_policy_dynamic = 'return_policy_'.$get_lang_code;
                     ?>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_RETURN_DESCRIPTION');} ?> ({{ $get_lang_name }}) <span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="return_policy_{{$get_lang_name}}" placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_RETURN_DESCRIPTION');} ?>">{{ $products->$return_policy_dynamic }}</textarea>
                           <div id="return_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                    <?php } } ?>   

                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                        <div class="col-lg-8">
                                    <label for="text1" class="control-label"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_RETURN_DESCRIPTION');} ?><span class="text-sub"></span></label>
                                    <input placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_RETURN_DESCRIPTION');} ?>"  class="form-control" type="text" maxlength="3" id="return_days" name="return_days" value="{{ $products->return_days }}">
                                    <div id="replacement_error_msg"  style="color:#F00;font-weight:800"> </div>         
                        </div>
                    </div>

                </div> 


                {{-- REturn Policy ends --}}
                {{-- Replacement Policy starts --}}
                <div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_APPLY_REPLACEMENT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_APPLY_REPLACEMENT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_APPLY_REPLACEMENT');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="radio" id="allow_replace" name="allow_replace"  value="1" @if($products->allow_replace=='1') checked @endif    onclick="setPolicyDisplay('replace_tab', 'block')"  > <label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YES');} ?></label>
                        <input type="radio" id="notallow_replace" name="allow_replace"  value="0" @if($products->allow_replace=='0') checked @endif      onclick="setPolicyDisplay('replace_tab', 'none')" ><label class="sample"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NO');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NO');} ?></label>


                        <label class="sample"></label>
                    </div>
                </div>

                <div id="replace_tab" style="display:none;">
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_REPLACE_DESCRIPTION');} ?> <span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="replacement_policy" placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_REPLACE_DESCRIPTION');} ?>">{{ $products->replace_policy }}</textarea>
                           <div id="replacement_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                    <?php 
                     if(!empty($get_active_lang)) { 
                     foreach($get_active_lang as $get_lang) {
                      $get_lang_name = $get_lang->lang_name;
                      $get_lang_code = $get_lang->lang_code;
                      $replace_policy_dynamic = 'replace_policy_'.$get_lang_code;
                     ?>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_REPLACE_DESCRIPTION');} ?> ({{ $get_lang_name }})<span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="replacement_policy_{{$get_lang_name}}" placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_REPLACE_DESCRIPTION');} ?>">{{ $products->$replace_policy_dynamic }}</textarea>
                           <div id="replacement_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                    <?php } } ?>  

                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                        <div class="col-lg-8">
                                     <label for="text1" class="control-label "><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_REPLACE_DESCRIPTION');} ?><span class="text-sub"></span></label><br>
                                    <input placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_REPLACE_DESCRIPTION');} ?>"  class="form-control" type="text" maxlength="3" id="replace_days" name="replace_days"  value="{{ $products->replace_days }}">
                                    <div id="replacement_error_msg"  style="color:#F00;font-weight:800"> </div>         
                        </div>
                    </div>

                </div> 
                {{-- Replacement Policy ends --}}

                <?php /*  Product Policy details ends */ ?> 


      <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_IMAGE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_IMAGE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_IMAGE');} ?> <span class="text-sub">*</span><br><span  style="color:#999">(<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MAX')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MAX');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MAX');} ?> 5)</span></label>
          <input type="hidden" name="file_get" id="file_get" value="<?php echo  $file_get; ?>">

          <?php 
              $file_get_path =  explode("/**/",$file_get,-1); 
			  
                        $img_count = count($file_get_path);
           ?>
           <input type="hidden" name="old_image_count" id="old_image_count" value="<?php echo $img_count ?>">
          <span class="errortext red" style="color:red"><em><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE');} ?>  <?php echo $PRODUCT_WIDTH;?> x <?php echo $PRODUCT_HEIGHT;?> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PIXELS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS');} ?></em></span>
                    
          <div class="col-lg-8 all-image-view">
          <?php $i=1;
		  if(count($file_get_path) > 0 && $img_count !='') {
            foreach($file_get_path as $image){ 
			 ?>
                    <div style="float:left; max-width:219px">
            <input type="hidden" name="image_name" id="image_name" value="<?php echo  $image; ?>"> 
           
                      <input type="file"  name="file[]" id="fileUpload<?php echo $i;?>" value="" onchange="imageval(<?php echo $i;?>)" />
             <?php if($image!=NULL){ ?>
            <span>
            <input type="hidden"  name="image_old[]" id="" value="<?php echo $image ?>" />
            
              <img src="<?php if(file_exists('public/assets/product/'.$image)) echo url('').'/public/assets/product/'.$image; else echo url('').'/public/assets/noimage/No_Image_Available.png';?>" height="80" width="" > <br>
              <?php 
              /* Edit Image start - Trigger the modal with a button */ ?>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick=" calImgEdit(<?php echo $products->pro_id; ?>,<?php echo $i;?>,'<?php echo $image; ?>' )" >Edit</button><br><?php /* */ ?>
            <?php if($img_count > 1){ ?>
            <a class="btn-danger"href="<?php echo url('delete_product_img')."/".$products->pro_id."/".$image; ?>" style="cursor: pointer;"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_REMOVE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_REMOVE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_REMOVE');} ?></a>
            <?php } ?>
            </span>
             <?php } else{ ?>
              <img src="<?php echo url(''); ?>/public/assets/default_image/No_image_product.png" height="100" width="100" > </span><br>&nbsp; &nbsp; <br>
             <?php } ?>
          </div>  
          <?php $i++;
            } //foreach 
		  } else
		  { ?>
			 <img src="<?php echo url(''); ?>/public/assets/default_image/No_image_product.png" height="100" width="100">
		<?php  }  
		  
		  ?>                 
                     
           <br>
          
                   
                    </div>
          <input type="hidden" id="count" name="count" value="1">
                   <div id="img_error_msg"  style="color:#F00;font-weight:800"></div>
                  
                 </div>     
        <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                    <?php if($img_count < 5){ ?>
          <div  id="img_upload" class="img-upload">
           <a class="" href="javascript:void(0);"  title="Add field" class="chose-file-add" ><span class="btn-success" id="add_button"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD');} ?></span></a>
                  </div>
          <?php } ?>
          <div style="display: inline-block;">
                   <button class="btn btn-warning btn-sm btn-grad" onclick="check();" id="submit_product" ><a style="color:#fff"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE_PRODUCT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_UPDATE_PRODUCT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE_PRODUCT');} ?></a></button>
                     <a href="<?php echo url('manage_product');?>" class="btn btn-default btn-sm btn-grad" style="color:#000"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CANCEL');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL');} ?></a>
                   </div>
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
 <input id="sh_alert_count" value="0" type="hidden" />
        </div>
    
     <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
     {!! $adminfooter !!}
    <!--END FOOTER -->

<script src="<?php echo url('')?>/public/assets/plugins/jquery-2.0.3.min.js"></script>
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

  function setPolicyDisplay(id, displayOption) 
  {
      $("#"+id).css('display',displayOption);
  } 
</script>
{{-- Policy details --}}

<script type="text/javascript">
function check(){
      var mer_id   = $('#Select_Merchant').val();
      var store_id = $('#Select_Shop').val();
      var title    = $('#Product_Title').val();
      var pro_id    = $('#product_edit_id"').val(); alert(mer_id);  alert(store_id);  alert(title);  alert(pro_id); 
      var passdata = "mer_id="+mer_id+"&store_id="+store_id+"&title="+title+"&pro_id="+pro_id; 
      $.ajax( {
            type: 'get',
          data: passdata,
          url: 'check_product_exists_edit',
          success: function(responseText){  
           if(responseText==1){  //already exist
            alert("This Product Title Already Exist in this Store");
            $("#exist").val("1"); //already exist
            $("#Product_Title").css('border', '1px solid red'); 
            $('#Select_Shop').css('border', '1px solid red');
            $('#title_error_msg').html("This Product Title Already Exist in this Store"); 
            $("#Product_Title").focus();
            return false;          
           }else if(responseText==0){
            $("#exist").val("0");
           }
        }   
      }); 
     }
 </script>
<script>
function spcfunction(count,spc_grop_id){
  
  var pass = 'spc_group_id='+spc_grop_id;
  
  $.ajax( {
            type: 'get',
          data: pass,
          url:  "<?php echo url('product_get_spec');?>",
          success: function(responseText){  
            // alert(responseText);
           if(responseText)
           {  
           
          $('#pro_spec'+count).html(responseText);             
           }
        }   
      });   
}

/*to get store address*/
$("#Select_Shop").change(function(){
  
  
      var shop_id  = $(this).find('option:selected').val();
  //  alert(shop_id);
  //  exit();
    var passdata = "shop_id="+shop_id;
    $.ajax({
            type: 'get',
          data: passdata,
          url: '<?php echo url('store_details'); ?>',
          success: function(responseText){ 
         
          $('#responseText').html(responseText);
          }   
    });   
  });

function imageval(i){ /*Image size validation*/
  /* 
  var img_count = $("#count").val();
  //Get reference of FileUpload.
  
     prod_width = <?php //echo $PRODUCT_WIDTH?>;
     prod_height = <?php //echo $PRODUCT_HEIGHT?>;

      var fileUpload = document.getElementById("fileUpload"+i);
      

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
                    var height = this.height;
                    var width = this.width;
          
                    if (width == prod_width || height == prod_height) {
                        alert("Image Height and Width should have "+prod_width+" * "+prod_height+" px.");
                        return false;
                    }
                    alert("Uploaded image has valid Height and Width.");
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
   */
}





$(document ).ready(function() {

      $('#specificationdetails').hide();
      var title          = $('#Product_Title');
      var title_fr     = $('#Product_Title_fr');
      var category     = $('#Product_Category');
      var maincategory   = $('#Product_MainCategory');
      var subcategory    = $('#Product_SubCategory');
      var secondsubcategory= $('#Product_SecondSubCategory');
      var pquantity    = $('#Quantity_Product');
      var originalprice    = $('#Original_Price');
      var discountprice    = $('#Discounted_Price');
      var inctax           = $('#inctax');
      var shippingamt      = $('#Shipping_Amount');
      var description      = $('#description');
      var description_fr   = $('#description_fr');
      var wysihtml5      = $('#wysihtml5');
      var delivery_days    = $('#Delivery_Days');
      var merchant       = $('#Select_Merchant');
      var shop         = $('#Select_Shop');
      var metakeyword    = $('#Meta_Keywords');
      var metakeyword_fr   = $('#Meta_Keywords_fr');
      var metadescription  = $('#Meta_Description');
      var metadescription_fr   = $('#Meta_Description_fr');
      var file         = $('#fileUpload');
        var desc             = $('#desc');
      var product_size     = $("#Product_Size");
         var cash_back         = $("#cash_back");
/*Product Quantity*/
  $('#Quantity_Product').keypress(function (e){
    if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
        pquantity.css('border', '1px solid red'); 
      $('#qty_error_msg').html('Numbers Only Allowed');
      pquantity.focus();
      return false;
    }else{      
            pquantity.css('border', ''); 
      $('#qty_error_msg').html('');         
    }
    });

/*Product Original Price*/
   $('#Original_Price').keypress(function (e){
    if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
        originalprice.css('border', '1px solid red'); 
        $('#org_price_error_msg').html('Numbers Only Allowed');
        originalprice.focus();
        return false;
    }else{      
            originalprice.css('border', ''); 
      $('#org_price_error_msg').html('');         
    }
    });
/*Product Discount Price*/
  $('#Discounted_Price').keypress(function (e){
    if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
        discountprice.css('border', '1px solid red'); 
      $('#dis_price_error_msg').html('Numbers Only Allowed');
      discountprice.focus();
      return false;
    }else{      
            discountprice.css('border', ''); 
      $('#dis_price_error_msg').html('');         
    }
    }); 
/*Product Shipping Amount*/
  $('#Shipping_Amount').keypress(function (e){
    if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
        shippingamt.css('border', '1px solid red'); 
      $('#ship_amt_error_msg').html('Numbers Only Allowed');
      shippingamt.focus();
      return false;
    }else{      
            shippingamt.css('border', ''); 
      $('#ship_amt_error_msg').html('');          
    }
    });
/*Delivery Days*/
  $('#Delivery_Days').keyup(function() { 
    if (this.value.match(/[^0-9-()\s]/g)){ 
    this.value = this.value.replace(/[^0-9-()\s]/g, ''); 
    } 
  });

/*cash back*/
    $('#cash_back').keyup(function() { 
        if (this.value.match(/[^0-9-()\s]/g)){ 
        this.value = this.value.replace(/[^0-9-()\s]/g, ''); 
        } 
    });

/*including tax*/
  $('#inctax').keypress(function (e){
    if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
        inctax.css('border', '1px solid red'); 
      $('#tax_error_msg').html('Numbers Only Allowed');
      inctax.focus();
      return false;
    }else{      
            inctax.css('border', ''); 
      $('#tax_error_msg').html('');         
    }
    }); 
  
     
  
$('#submit_product').click(function() {

   var checkedoptionsize  = $('input:radio[name=pro_siz]:checked').val();
   var sizeid       = $("#Product_Size option:selected").val();
   var checkedoptioncolor = $('input:radio[name=productcolor]:checked').val();
   var colorid      = $("#selectprocolor option:selected").val();
     var checkspec      = $('input:radio[name=specification]:checked').val();
   var sizecnt      = $("#productsizecount").val();
     var shipamtchecked   = $('input:radio[name=shipamt]:checked').val();
  
  

  /*Product Title*/
    if($.trim(title.val()) == ""){
      title.css('border', '1px solid red'); 
      $('#title_error_msg').html('Please Enter Title <?php echo $default_lang; ?>');
      title.focus();
      return false;
    }else{
      title.css('border', ''); 
      $('#title_error_msg').html('');
    }
  /*Product Title in french */
    <?php 
    if(!empty($get_active_lang)) { 
    foreach($get_active_lang as $get_lang) {
    $get_lang_name = $get_lang->lang_name;
    ?>
    var title_fren = $('#Product_Title_<?php echo $get_lang_name; ?>');
    if($.trim(title_fren.val()) == ""){
      title_fren.css('border', '1px solid red'); 
      $('#title_fr_error_msg').html('Please Enter Title In <?php echo $get_lang_name; ?>');
      title_fren.focus();
      return false;
    }else{
      title_fren.css('border', ''); 
      $('#title_fr_error_msg').html('');
    }
    <?php } } ?>
  /*Top Category*/  
    if(category.val() == 0){
      category.css('border', '1px solid red'); 
      $('#category_error_msg').html('Please Select Category');
      category.focus();
      return false;
    }else{
      category.css('border', ''); 
      $('#category_error_msg').html('');
    }
    
  /*Main Category*/ 
    if(maincategory.val() == 0)
    {
      maincategory.css('border', '1px solid red'); 
      $('#main_cat_error_msg').html('Please Select Main Category');
      maincategory.focus();
      return false;
    }else{
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
  /*brand*/ 
    if($("#product_brand").val() == 0){
      $("#product_brand").css('border', '1px solid red'); 
      $('#brand_error_msg').html('Please Select Brand');
      $("#product_brand").focus();
      return false;
    }else{
      $("#product_brand").css('border', ''); 
      $('#brand_error_msg').html('');
    }
  /*Product Qunatity*/
    if(pquantity.val() == 0){
      pquantity.css('border', '1px solid red'); 
      $('#qty_error_msg').html('Please Enter Product Quantity');
      pquantity.focus();
      return false;
    }else{
      pquantity.css('border', ''); 
      $('#qty_error_msg').html('');
    }

/*Product Original Price*/
    if(originalprice.val() == 0){
      originalprice.css('border', '1px solid red'); 
      $('#org_price_error_msg').html('Please Enter Original Price');
      originalprice.focus();
      return false;
    }else if(isNaN(originalprice.val()) == true){
      originalprice.css('border', '1px solid red'); 
      $('#org_price_error_msg').html('Numbers Only Allowed');
      originalprice.focus();
      return false;
    }else{
      originalprice.css('border', ''); 
      $('#org_price_error_msg').html('');
    }

  /*Product Discount Price*/
    if(discountprice.val() == 0){
      discountprice.css('border', '1px solid red'); 
      $('#dis_price_error_msg').html('Please Enter Discounted Price');
      discountprice.focus();
      return false;
    }else if(isNaN(discountprice.val()) == true){
      discountprice.css('border', '1px solid red'); 
      $('#dis_price_error_msg').html('Numbers Only Allowed');
      discountprice.focus();
      return false;
    }else if(parseInt(discountprice.val()) > parseInt(originalprice.val()) ){
      discountprice.css('border', '1px solid red'); 
      $('#dis_price_error_msg').html('Discounted price sholud be less than original price');
      discountprice.focus();
      return false;
    }else{
      discountprice.css('border', ''); 
      $('#dis_price_error_msg').html('');
    }
    
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

/*Shipping Amount*/
    if(shipamtchecked==2){
      if(shippingamt.val()==""){
        shippingamt.css('border', '1px solid red'); 
        $('#ship_amt_error_msg').html('Please Provide Shipping Amount');
        shippingamt.focus();
        return false;
      }else{
        shippingamt.css('border', ''); 
        $('#ship_amt_error_msg').html('');
      }
    }else if(shipamtchecked==1){
        shippingamt.css('border', ''); 
        $('#ship_amt_error_msg').html('');
    }

/*Description*/
    if($.trim(wysihtml5.val()) == ''){
      wysihtml5.css('border', '1px solid red'); 
      $('#desc_error_msg').html('Please Enter Description');
      description.focus();
      return false;
    }else{
      wysihtml5.css('border', ''); 
      $('#desc_error_msg').html('');
    }
    /*Description in french */
    <?php 
    if(!empty($get_active_lang)) { 
    foreach($get_active_lang as $get_lang) {
    $get_lang_name = $get_lang->lang_name;
    ?>
    var title_fren = $('.description_<?php echo $get_lang_name; ?>');
    if($.trim(title_fren.val()) == ''){
      title_fren.css('border', '1px solid red'); 
      $('#desc_fr_error_msg').html('Please Enter Description In <?php echo $get_lang_name; ?>');
      description.focus();
      return false;
    }else{
      title_fren.css('border', ''); 
      $('#desc_fr_error_msg').html('');
    }
    <?php } } ?>
/*Specification*/
    if(checkspec==1){ 
      var cntspec=$('#specificationcount').val();
      var i=0;
      for(i=0;i<=cntspec;i++){
        var specid=$("#spec"+i+" option:selected").val();
        var spectxt=$("#spec"+i).val();
        if(specid!=0 && spectxt!==""){
          var success=1;  
        }else{
            var success=0;  
        }
      } //for

      /*if(success==0){
        i=i-1;
            $('#spec_error_msg').html('Please Select specification and give text');
            $('#spec'+i).css('border', '1px solid red');
            $('#spectext'+i).css('border', '1px solid red');  
            return false;
      }else{
        i=i-1;
        $('#spec_error_msg').html(' ');
            $('#spec'+i).css('border', '1px solid lightgray');
            $('#spectext'+i).css('border', '1px solid lightgray');  
      }*/
    }

/*Product size
  if($('input:radio[name=pro_siz]:checked').val()==0){
    if($("#Product_Size option:selected").val()<1){
        $('#size_error_msg').html('Please Select Product size');
      $("#Product_Size").css('border', '1px solid red'); 
      $("#Product_Size").focus();
      return false;
    }else{
       $('#size_error_msg').html('');
       $("#Product_Size").css('border', ''); 
    }
  }*/
/*Product color
    if($('input:radio[name=productcolor]:checked').val()==0){
      if($("#selectprocolor option:selected").val()<1){
        $('#color_error_msg').html('Please select color');
        $("#selectprocolor").css('border', '1px solid red'); 
        $("#selectprocolor").focus();
        return false;
      }else{ 
        $("#selectprocolor").css('border', ''); 
        $('#color_error_msg').html('');
      }
    }*/

/*Delivery Days*/
    if($.trim(delivery_days.val()) == ""){
      delivery_days.css('border', '1px solid red'); 
      $('#delivery_error_msg').html('Please Enter Delivery Days');
      delivery_days.focus();
      return false;
    }else{
      delivery_days.css('border', ''); 
      $('#delivery_error_msg').html('');
    }
  
  /*Merchant*/   
    if(merchant.val() == 0){
      merchant.css('border', '1px solid red'); 
      $('#merchant_error_msg').html('Please Select Merchant');
      merchant.focus();
      return false;
    }else{
      merchant.css('border', ''); 
      $('#merchant_error_msg').html('');
    }
  /*Store*/  
    if(shop.val() == 0){
      shop.css('border', '1px solid red'); 
      $('#store_error_msg').html('Please Select Shop');
      shop.focus();
      return false;
    }else{
      shop.css('border', ''); 
      $('#store_error_msg').html('');
    }

/*PRoduct title check*/
    if(($('#exist').val())==""){
      $('#title_error_msg').html('Please Enter Different Product Title, This Already Exist in this Store');
      title.css('border', '1px solid red'); 
      title.focus();
      return false;
    }else if(($('#exist').val())==1){
      $('#title_error_msg').html('Please Enter Different Product Title, This Already Exist in this Store');
      title.css('border', '1px solid red'); 
      title.focus();
      return false;
    }else{
      title.css('border', ''); 
      $('#title_error_msg').html('');
    }

/*Meta Keyword*/
    /*if($.trim(metakeyword.val()) == ""){
      metakeyword.css('border', '1px solid red'); 
      $('#meta_key_error_msg').html('Please Enter Metakeyword');
      metakeyword.focus();
      return false;
    }else{
      metakeyword.css('border', ''); 
      $('#meta_key_error_msg').html('');
    }*/

/*Meta description*/
    /*if($.trim(metadescription.val()) == ""){
      metadescription.css('border', '1px solid red'); 
      $('#meta_desc_error_msg').html('Please Enter Meta Description');
      metadescription.focus();
      return false;
    }else{
      metadescription.css('border', ''); 
      $('#meta_desc_error_msg').html('');
    }*/


   /*Product Image*/
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if(file.val() == ""){
      file.focus();
      file.css('border', '1px solid red'); 
      $('#img_error_msg').html('Please choose image');
      return false;
    }else if ($.inArray($('#fileUpload').val().split('.').pop().toLowerCase(), fileExtension) == -1) {        
      file.focus();
      file.css('border', '1px solid red'); 
      $('#img_error_msg').html('Please choose valid image');
      return false;
    }else{
      file.css('border', ''); 
      $('#img_error_msg').html('');       
    }
    
  }); 
});
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

<script language="JavaScript">

function setVisibility(id, visibility) {


document.getElementById(id).style.display = visibility;
document.getElementById('addmore').style.display =visibility;
 
}
function setVisibility1(id, visibility) {


document.getElementById(id).style.display = visibility;
document.getElementById('colordiv').style.display =visibility;
 
}
function setshipVisibility(id, visibility) 
{
  document.getElementById(id).style.display = visibility;
 
}
function product_siz(id, visibility)
 {
document.getElementById(id).style.display = visibility;
document.getElementById('pro_size').style.display =visibility;
document.getElementById('sizediv').style.display =visibility;
}
</script>
<script type='text/javascript'>

$(document).ready(function(){
 
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
});

 function addspecificationFormField()
  {

    var count_id = document.getElementById("specificationcount").value;

 
    var selectspec=$("#pro_spec"+count_id+" option:selected").val();
    var spectext=$("#spectext"+count_id).val();
    var fr_spectext=$("#fr_spectext"+count_id).val();
    if(selectspec!=0  && spectext!="" &&  fr_spectext!="")
    {
       
   var id = document.getElementById("specificationid1").value;
    var count_id = document.getElementById("specificationcount").value;
   var nameid=parseInt(count_id)+1;
    //if(count_id < 2){
      var result=$("#spec_grp0").html();
      lang_div ='';
       <?php if(!empty($get_active_lang)) { 
        foreach($get_active_lang as $get_lang) {
        $get_lang_name = $get_lang->lang_name;
        $get_lang_code = $get_lang->lang_code; 
        $spc_value_dynamic = 'spc_value_'.$get_lang_code; 
        ?>  
      lang_div += "<div class='col-lg-3'><input type='text' class='form-control' name='<?php echo $get_lang_code;?>_spectext"+ nameid  + "' placeholder='Specification in <?php echo $get_lang_name;?>' required/></div>";
      <?php } } ?>
      document.getElementById('specificationcount').value = parseInt(count_id)+1;
     jQuery("#divspecificationTxt").append(" <div class='form-group' id='spec"+ nameid + "'><div class='col-lg-3'><select name='spec_grp"+ nameid  + "' id='spec_grp"+ nameid  + "' onChange='spcfunction("+nameid+",this.value);' class='form-control' required><option  value='0'>-- select specification Group--</option>"+result+"</select></div><div class='col-lg-3'><select name='spec"+ nameid  + "' id='pro_spec"+nameid+"' class='form-control' required ><option  value='0'>-- select specification--</option></select></div><div class='col-lg-3'><input type='text' class='form-control' name='spectext"+ nameid  + "' placeholder='Specification in English' required /></div>"+lang_div+"<div class='col-lg-3'><a href='#' onClick='removespecFormField(\"#spec" + nameid + "\"); return false;' style='color:#F60;' >Remove</a></div></div>");   
  
     id = (id - 1) + 1;
     document.getElementById("specificationid1").value = id;

    //}else{  
    //alert("Maximum limit reached");
    //return false;
    //}
    }
    else
    {
      alert("Please select specification and provide text then click Add more");
    }     

    


  }
function removespecFormField(id) {
  var count_id = document.getElementById("specificationcount").value;
   count_id=count_id-1;

document.getElementById("specificationcount").value=count_id; 

        jQuery(id).remove();
    }


</script> 

 <script type="text/javascript">
 
 $(document).ready(function(){
  var old_image_count = $('#old_image_count').val();
    var maxField = 5; //Input fields increment limitation
    var addButton = $('#add_button'); //Add button selector
    var wrapper = $('#img_upload'); //Input field wrapper //div
  
    var x = (old_image_count); //Initial field counter is 1

    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
      
      var fieldHTML = '<div style="display:block; width: 350px; margin-top:8px; margin-bottom:8px;"><input type="file" name="new_file[]" id="fileUpload'+x+'" onchange="imageval('+x+')" value="" required/><div id="remove_button"><a href="javascript:void(0);"  title="Remove field" style="color:#ffffff;">Remove</a></div></div>'; //New input field html 
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

  
    function addimgFormField() {
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
    }
       
      function removeFormField(id) {

        jQuery(id).remove();
    }


$(document).ready(function(){
      var counter = 2;
  $('#add_spec').click(function(){
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
});


function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode        
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            
         return true;
          
      }
   function getshop_ajax(id)
  {
  
    var passmerchantid = 'id='+id;
       $.ajax( {
            type: 'get',
          data: passmerchantid,
          url: '<?php echo url('product_getmerchantshop_ajax'); ?>',
          success: function(responseText){  
           if(responseText)
           {  //alert(responseText);
          $('#Select_Shop').html(responseText);            
           }
        }   
      });   
  }



  function getcolorname(id)
  {
  
     var passcolorid = 'id='+id+"&co_text_box="+$('#co').val();
  
       $.ajax( {
            type: 'get',
          data: passcolorid,
          url:'<?php echo url('product_getcolor'); ?>',
          success: function(responseText){  
           if(responseText)
           {   
         
          var get_result = responseText.split(',');
          if(get_result[3]=="success")
          {
            $('#colordiv').css('display', 'block'); 
            
          $('#showcolor').append('<span style="width:220px;padding:10px;border:5px solid '+get_result[2]+';margin:0px;">'+get_result[0]+'<input type="checkbox"  name="colorcheckbox'+get_result[1]+'"style="padding-left:30px;" checked="checked" value="1" ></span>&nbsp;&nbsp;');      
          var co_name_js = $('#co').val();  
          $('#co').val(get_result[1]+","+co_name_js);   
            
          }
          else if(get_result[3]=="failed")
          {
            alert("Already color is choosed.");
          }
          else
          {
              alert("something went wrong .");
          }
          
           }
        }   
      });   
    
  }
  function getsizename(id)
  {
     
     var passsizeid = 'id='+id+"&si_text_box="+$('#si').val();
   
       $.ajax( {
            type: 'get',
          data: passsizeid,
          url: '<?php echo url('product_getsize'); ?>',
          success: function(responseText){  
           if(responseText)
           {   
          
          var get_result = responseText.split(',');
          if(get_result[3]=="success")
          {
                        var count=parseInt($('#productsizecount').val())+1;
            $("#productsizecount").val(count);
            $('#sizediv').css('display', 'block'); 
            //$('#quantitydiv').css('display', 'block'); 
            
          $('#showsize').append('<span style="padding-right:10px;">Select Size:</span><span style="color:#ff0099;padding-right:90px">'+get_result[2]+'<input type="checkbox"  name="sizecheckbox'+get_result[1]+'"style="padding-left:30px;" checked="checked" value="1" ></span>');
          $('#showquantity').append('<input type="text" name="quantity'+get_result[1]+'" value="1" style="padding:10px;border:5px solid gray;margin:0px;" onkeypress="return isNumberKey(event)" ></input> ');
    
          var co_name_js = $('#si').val();  
          $('#si').val(get_result[1]+","+co_name_js);   
            
          
          }
          else if(get_result[3]=="failed")
          {
            alert("Already size is choosed.");
          }
          else
          {
              alert("something went wrong .");
          }
          
           }
        }   
      });   
    
  }
  




  function select_main_cat(id)
  {
       var passData = 'id='+id;
       $.ajax( {
            type: 'get',
          data: passData,
          url: '<?php echo url('product_getmaincategory'); ?>',
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
          url: '<?php echo url('product_getsubcategory'); ?>',
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
          url: '<?php echo url('product_getsecondsubcategory'); ?>',
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

    var passmerchantid = 'mer_id=<?php echo $merchant; ?>&store_id=<?php echo $shop;?>';
    $.ajax( {
            type: 'get',
          data: passmerchantid,
          url: '<?php echo url('product_mer_shop_selected'); ?>',
          success: function(responseText){  
           if(responseText)
           {  //alert(responseText);
          $('#Select_Shop').html(responseText);            
           }
        }   
      });   
 
  var passData = 'edit_id=<?php echo $maincategory; ?>';
       $.ajax( {
            type: 'get',
          data: passData,
          url: '<?php echo url('product_edit_getmaincategory'); ?>',
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
          url: '<?php echo url('product_edit_getsubcategory'); ?>',
          success: function(responseText){  
           if(responseText)
           { 
              // alert(responseText);
          $('#subcategory').html(responseText);            
           }
        }   
      }); 
  var passData = 'edit_second_sub_id=<?php echo $secondsubcategory; ?>';
       $.ajax( {
            type: 'get',
          data: passData,
          url: '<?php echo url('product_edit_getsecondsubcategory'); ?>',
          success: function(responseText){  
           if(responseText)
           { 
 
            //alert(responseText);
          $('#secondsubcategory').html(responseText);            
           }
        }   
      }); 
});
  

  

  </script>
    
  
  
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
        //$(function () { formWysiwyg(); });
    $(document).ready(function () {
  $('.wysihtml5').wysihtml5();
});
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
            imgSrc : "<?php echo url('');?>/public/assets/product/"+imgFileName,
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
function get_specification_details()
{
  var main_cat=$("#category").val();
  var sec_main_cat=$("#maincategory").val();
  /*Top Category*/  
  if(main_cat == "0"){
    $("#category").css('border', '1px solid red'); 
    $('#category_error_msg').html('Please Select Category');
    $("#category").focus();
    return false;
  }else{
    $("#category").css('border', ''); 
    $('#category_error_msg').html('');
  }
  /*Main Category*/ 
  if(sec_main_cat == "0")
  {
    $("#maincategory").css('border', '1px solid red'); 
    $('#main_cat_error_msg').html('Please Select Main Category');
    $("#maincategory").focus();
    return false;
  }else{
    $("#maincategory").css('border', ''); 
    $('#main_cat_error_msg').html('');
  }
  if(sec_main_cat!="" && main_cat!=""&& sec_main_cat!="0" && main_cat!="0")
  {
    $.post("<?php echo url(); ?>/get_spec_related_to_cat",
    {
      main_cat: main_cat,
      sec_main_cat: sec_main_cat
    },
    function(data, status){
      var count_id = document.getElementById("specificationcount").value;
      var count_id=parseInt(count_id);
      {
        if(data==1){
                 $("input[name='specification'][value='2']").attr('checked',true);
                
                 
                 document.getElementById('specification_list_avail').style.display="none";
                  document.getElementById('specification_list_notavail').style.display="inline";
                 document.getElementById('sub4').style.display ="none";
                 document.getElementById('divspecificationTxt').style.display ="none";
                 document.getElementById('addmore').style.display ="none";

                 return false;   
                }
        $("#spec_grp0").html(data);
        $("input[name='spectext0']").val("");
        $("input[name='fr_spectext0']").val("");
        $("#pro_spec0").html("<option value='0'>-- Select --</option>");
        document.getElementById('specification_list_avail').style.display="inline";
        document.getElementById('specification_list_notavail').style.display="none";
        for(var i=1;i<=count_id;i++)
        {
          $("#spec_grp"+i).html(data);
          $("input[name='spectext"+i+"']").val("");
          $("input[name='fr_spectext"+i+"']").val("");
          $("#pro_spec"+i).html("<option value='0'>-- Select --</option>");
          document.getElementById('specification_list_avail').style.display="inline";
        document.getElementById('specification_list_notavail').style.display="none";
        }
      }
    });
  }
  else
  {
    $("input[name='specification'][value='2']").attr('checked', true);
    return false;
  }
}
     $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
     });
  </script>
<?php if($productspec==1){?>
<script>
function show_alert()
{
  var i=$("#sh_alert_count").val();
  if(i=="0")
    alert("This will change your product specification!");
  i++;
  i=$("#sh_alert_count").val(i);
}
$( document ).ready(function() {
  /* get_specification_details(); */
});
</script>
<?php } ?>
</body>
     <!-- END BODY -->
</html>
