<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_PRODUCTS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_PRODUCTS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_PRODUCTS')}} @endif </title>
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
	<link rel="stylesheet" href="{{ url('') }}/public/assets/css/multi-select.css" />
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
                            	<li class=""><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_HOME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME');} ?></li>
                                <li class="active">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_PRODUCTS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_PRODUCTS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_PRODUCTS')}} @endif</li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_PRODUCTS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_PRODUCTS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_PRODUCTS')}} @endif</h5>
            
        </header>
		@if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
         {{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert' , 'aria-hidden' => 'true'])}}
       
        </div>
		</ul>	
		@endif
        @if (Session::has('message'))
		<p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
		@endif
        <div id="div-1" class="accordion-body collapse in body" style="padding: 10px;">
         {!!Form::open(array('url'=>'add_product_submit','class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8')) !!}
		<div id="error_msg"  style="color:#F00;font-weight:800"  > </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_TITLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_TITLE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_TITLE')}} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" maxlength="150" name="Product_Title" id="Product_Title" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_YOUR_PRODUCT_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_YOUR_PRODUCT_NAME')}} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_YOUR_PRODUCT_NAME')}} @endif {{ $default_lang }}"  class="form-control" onChange="check();" value="{{ old('Product_Title') }}">
						<div id="title_error_msg"  style="color:#F00;font-weight:800"  > </div>
						
                    </div>
                </div>
				
				 
				@if(!empty($get_active_lang))  
				@foreach($get_active_lang as $get_lang)
                <?php 
				$get_lang_name = $get_lang->lang_name;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Product Title({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" name="Product_Title_{{ $get_lang_name }}" id="Product_Title_{{ $get_lang_name }}" placeholder="Enter Product Name In {{ $get_lang_name }}" maxlength="150" class="form-control" onChange="check_dynamic();" value="{{ old('Product_Title_'.$get_lang_name) }}">
						<div id="title_fr_error_msg"  style="color:#F00;font-weight:800"  > </div>
					</div>
                </div>
				@endforeach
                @endif
				
				
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TOP_CATEGORY')}} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
		 <select class="form-control" id="Product_Category" name="Product_Category" onChange="get_maincategory(this.value);get_specification_details();">;
             	<option value="0">--- @if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT')}} @endif ---</option>
           	 @foreach($productcategory as $product_mc)
			 
				@if (Input::old('Product_Category') == $product_mc->mc_id)
					  <option value="{{ $product_mc->mc_id }}" selected>{{ $product_mc->mc_name }} </option>
				@else
					  <option value="<?php echo $product_mc->mc_id; ?>">{{ $product_mc->mc_name }} </option>
				@endif


              			
                        @endforeach
        </select>
		<div id="category_error_msg"  style="color:#F00;font-weight:800"  > </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_MAIN_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MAIN_CATEGORY')}}  @else {{  trans($ADMIN_OUR_LANGUAGE.'.BACK_MAIN_CATEGORY')}} @endif <span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" id="Product_MainCategory" name="Product_MainCategory" onChange="get_subcategory(this.value);get_specification_details();">
					   
					   
						<option value="0">- @if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_MAIN_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_MAIN_CATEGORY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_MAIN_CATEGORY')}} @endif -</option> 
						
						
  					</select>
					  <div id="main_cat_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SUB_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SUB_CATEGORY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SUB_CATEGORY')}} @endif<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                        <select class="form-control" id="Product_SubCategory"name="Product_SubCategory" onChange="get_second_subcategory(this.value)">
           <option value="0">- @if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SUB_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_SUB_CATEGORY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SUB_CATEGORY')}} @endif -</option>   
        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SECOND_SUB_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SECOND_SUB_CATEGORY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SECOND_SUB_CATEGORY')}} @endif<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <select class="form-control" id="Product_SecondSubCategory" name="Product_SecondSubCategory">
                			<option value="0">-@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SECOND_SUB_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_SECOND_SUB_CATEGORY') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SECOND_SUB_CATEGORY')}} @endif-</option>   
        				</select>
                    </div>
                </div>
				<?php /*brand
				<div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_BRAND')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_BRAND');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_BRAND');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" id="product_brand" name="product_brand">
                			<option value="0">--<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_PRODUCT_BRAND')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_PRODUCT_BRAND');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_PRODUCT_BRAND');} ?>--</option>   
							<?php foreach($brand_details as $brand_data){?>
							<option value="<?php echo $brand_data->brand_id;?>"><?php echo $brand_data->brand_name; ?></option>
							<?php } ?>
        				</select>
						<div id="brand_error_msg" style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
brand*/ ?>
 		        <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_QUANTITY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_QUANTITY') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_QUANTITY') }} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input   placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_QTY_OF_PRODUCT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_QTY_OF_PRODUCT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_QTY_OF_PRODUCT')}} @endif" class="form-control" type="text" value="{{ old('Quantity_Product') }}" id="Quantity_Product" name="Quantity_Product" maxlength="5">
                    <div id="qty_error_msg"  style="color:#F00;font-weight:800"> </div>
					</div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ORIGINAL_PRICE')}} @endif ({{ Helper::cur_sym() }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input   placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY')}} @endif" class="form-control" type="text" id="Original_Price"  value="{{ old('Original_Price') }}" name="Original_Price" maxlength="10">
						<div id="org_price_error_msg"  style="color:#F00;font-weight:800"> </div>
					</div>
                </div>


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DISCOUNTED_PRICE')}} @endif ({{ Helper::cur_sym() }})<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                        <input placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY')}} @endif" class="form-control" value="{{ old('Discounted_Price') }}" type="text" id="Discounted_Price" name="Discounted_Price" maxlength="10">
                        <div id="dis_price_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>

            {{--new fields--}}

            <div class="form-group">
                <label for="wholesale_price" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_WHOLESALE_PRICE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_WHOLESALE_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_WHOLESALE_PRICE')}} @endif ({{ Helper::cur_sym() }})<span class="text-sub">*</span></label>
                <div class="col-lg-8">
                    <input required placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY')}} @endif" class="form-control" value="{{ old('wholesale_price') }}" type="text" id="wholesale_price" name="wholesale_price" maxlength="10">
                    <div id="wholesale_price"  style="color:#F00;font-weight:800"> </div>
                </div>
            </div>

            {{--new fields--}}


				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                                <input type="checkbox" id="inctax_check" onclick="if(this.checked){$('#inctax').show();}else{$('#inctax').hide();$('#inctax').val(0)}"> ( @if (Lang::has(Session::get('admin_lang_file').'.BACK_INCLUDING_TAX_AMOUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_INCLUDING_TAX_AMOUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_INCLUDING_TAX_AMOUNT')}} @endif) 
                                <input placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY')}} @endif" style="display:none;" class="form-control" type="number" id="inctax"  max="99" name="inctax"> %
								<div id="tax_error_msg"  style="color:#F00;font-weight:800"> </div>			
                    </div>
                </div>
            <div class="form-group">
                <label for="text2"
                       class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPPING_AMOUNT')}} @endif
                    <span class="text-sub">*</span></label>

                <div class="col-lg-8">
                    <label class="sample"><input type="radio" id="shipamt" name="shipamt"
                                                 onClick="setshipVisibility('showship', 'none');" value="1"
                                                 checked> @if (Lang::has(Session::get('admin_lang_file').'.BACK_FREE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_FREE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_FREE')}} @endif
                    </label>
                    <label class="sample"><input type="radio" id="shipamt" name="shipamt"
                                                 onClick="setshipVisibility('showship', 'block');"
                                                 value="2"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_AMOUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT')}} @endif
                    </label>

                    <label class="sample"></label>
                </div>
            </div>
		
				  <div class="form-group" id="showship" style="display:none;">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPPING_AMOUNT')}} @endif ({{ Helper::cur_sym() }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input  placeholder="" class="form-control" type="text"  maxlength="10" value="{{ old('Shipping_Amount') }}" id="Shipping_Amount" name="Shipping_Amount">
						<div id="ship_amt_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
				  
				 
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DESCRIPTION') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DESCRIPTION') }} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8" id="description">
                       <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="Description" placeholder="Enter Your Description {{ $default_lang }}">{{ old('Description') }}</textarea>
					   <div id="desc_error_msg"  style="color:#F00;font-weight:800"> </div>
					   
                    </div>
                </div>
				
				 
				@if(!empty($get_active_lang))  
				@foreach($get_active_lang as $get_lang) 
				<?php 
				$get_lang_name = $get_lang->lang_name;
				?>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Description ({{ $get_lang_name }})<span class="text-sub">*</span></label>

                    <div class="col-lg-8" id="description_fr">
                       <textarea id="wysihtml5" class="wysihtml5 form-control description_<?php echo $get_lang_name; ?>" rows="10"  name="Description_{{ $get_lang_name }}" placeholder="Enter Your Description in {{ $get_lang_name }}" >{{ old('Description_'.$get_lang_name) }}</textarea>
					   <div id="desc_fr_error_msg"  style="color:#F00;font-weight:800"> </div>
					 
                    </div>
                </div>
				@endforeach
				@endif
		 
		 <div class="form-group">
                    
			<label for="text2" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_WANT_TO_ADD_SPECIFICATION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_WANT_TO_ADD_SPECIFICATION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_WANT_TO_ADD_SPECIFICATION')}} @endif<span class="text-sub"></span></label>

                   	<div class="col-lg-8" id="specification_list_avail">
			 <label class="sample"><input type="radio"  id="specification" name="specification"  onClick="get_specification_details();setVisibility('sub4', 'block');" value="1 {{ old('specification') }}"> {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= ''))? trans(Session::get('admin_lang_file').'.BACK_YES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_YES') }}</label>
			 <label class="sample"><input type="radio" name="specification"  id="specification" onClick="setVisibility('sub4', 'none');" value="2" checked> {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= ''))? trans(Session::get('admin_lang_file').'.BACK_NO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO') }}   </label>
			<label class="sample"></label>
                   	 </div>
                     <div class="col-lg-8" id="specification_list_notavail" style="display:none;"> No specification List avaliable for this particular Category  </div>
                </div>
                
                
                <div class="form-group" id="sub4" style="display:none;">

                    <label for="text2" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION')}} @endif</label>

                    <div class="col-lg-12">
					
                    <label>@if (Lang::has(Session::get('admin_lang_file').'.BACK_TEXT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TEXT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TEXT')}} @endif ( @if (Lang::has(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SPECIFICATION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SPECIFICATION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MORE_CUSTOM_SPECIFICATION')}} @endif <a target="_blank" class="add-small"  href="{{ url('') }}/manage_specification"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD')}} @endif </a> )</label>
					</div>
					<div class="col-lg-2">
                       <select class="form-control" name="spec_grp0" id="spec_grp0" onChange='spcfunction(0,this.value);'>
                        <option  value="0">-- @if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SPECIFICATION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_SPECIFICATION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SPECIFICATION')}} @endif --</option>
							{{-- <!--@foreach ($spec_group as $pro_spec_group) 
						
						@if (Input::old('spec_grp0') == $pro_spec_group->spg_id)
						<option value="<?php // echo $pro_spec_group->spg_id; ?>" selected>{!!$pro_spec_group->spg_name!!}</option>
						@else
						<option value="<?php // echo $pro_spec_group->spg_id; ?>">{!!$pro_spec_group->spg_name!!}</option>
						@endif
				
				
           		 		<!-- <option  value="<?php  // echo $pro_spec_group->spg_id;?>">{!!$pro_spec_group->spg_name!!}</option>
							@endforeach --> --}}
        			   </select>
                    </div>
					
					<div class="col-lg-2">
                       <select class="form-control" name="spec0" id="pro_spec0" >
                        <option  value="0">-- @if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SPECIFICATION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_SPECIFICATION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SPECIFICATION')}} @endif --</option>
							{{--  <!--@foreach ($productspecification as $specification) 
						
						@if (Input::old('pro_spec0') == $specification->sp_name)
						<option value="<?php //echo $specification->sp_name; ?>" selected>{!!$specification->sp_name!!}</option>
						@else
						<option value="<?php //echo $specification->sp_name; ?>">{!!$specification->sp_name!!}</option>
						@endif
				
				
           		 		<!--<option  value="<?php //echo $specification->sp_id;?>">{!!$specification->sp_name!!}</option>--
          		 		@endforeach--> --}}
        			   </select>
                    </div>
                    
                    <div class="col-lg-2">
                       <input type="text" class="form-control" id="spectext0" value="{{ old('spectext0') }}"  name="spectext0" placeholder="Specification {{ $default_lang }}">
                    </div>

        <div class="col-lg-2">
        <p id="addmore" class="pro-des-add" style="display:none;text-align: center;"><a onClick="addspecificationFormField();"  style="cursor:pointer;color:#ffffff; width: 100%; display: inline-block;">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_MORE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_MORE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_MORE')}} @endif</a> </p></div>

                     @if(!empty($get_active_lang)) 
                @foreach($get_active_lang as $get_lang) 
               <?php
			   $get_lang_name = $get_lang->lang_code;
                $get_lang_code = $get_lang->lang_name;
                ?>
					<div class="col-lg-3">
                       <input type="text" class="form-control" id="{{ $get_lang_code }}_spectext0" value="{{ old($get_lang_code.'_spectext0') }}"  name="{{ $get_lang_code }}_spectext0" placeholder="Specification in {{ $get_lang_code }}">
                    </div>
 		         @endforeach
				@endif	
				 <input type="hidden" id="specificationid1" value="1">
		    <input type="hidden" id="specificationcount" name="specificationcount" value="0">
            
              
                </div>
                
                 
                <div class="form-group">
                   <div class="col-lg-12">
 		       <div  id="divspecificationTxt" >

		      </div>  
        
                    </div></div>
       

			 
        <div style="clear:both;"></div>
		

		 <div class="form-group"  >

		 <div class="col-lg-3">
                    
                    </div>
                   
 
		<div id="spec_error_msg"  style="color:#F00;font-weight:800"> </div>
		</div>  
		<div class="form-group">
                    
			<label for="text2" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_PRODUCT_SIZE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_PRODUCT_SIZE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_PRODUCT_SIZE')}} @endif<span class="text-sub"></span></label>

                   	<div class="col-lg-8">
			 <label class="sample"><input type="radio" id="pro_siz" name="pro_siz"  onClick="product_siz('pro_size', 'block');" value="0 {{ old('pro_siz') }}"> {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= ''))? trans(Session::get('admin_lang_file').'.BACK_YES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_YES') }}</label>
			 <label class="sample"><input type="radio" name="pro_siz"  id="pro_siz" onClick="product_siz('pro_size', 'none');" value="1 {{ old('pro_siz') }}" checked> {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= ''))? trans(Session::get('admin_lang_file').'.BACK_NO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO') }}   </label>
			
                   	 </div>
                </div>
				<div class="form-group" id="pro_size" style="display:none">

                    <label for="text2" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_SIZE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_SIZE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_SIZE')}} @endif<span class="text-sub"></span></label>

                    <div class="col-lg-3">
                       <select class="form-control" name="Product_Size[]" id="Product_Size" multiple="multiple" >
                       
 			     @foreach ($productsize as $size) 
				  @if($size->si_name!='no size') 
				  
				  @if (Input::old('Product_Size') == $size->si_id)
						<option value="{{ $size->si_id }}" selected>{!!$size->si_name!!}</option>
						@else
						<option value="{{ $size->si_id }}">{!!$size->si_name!!}</option>
						@endif
						
						
           		<!-- <option  value="<?php echo $size->si_id;?>">{!!$size->si_name!!}</option>-->
				  @endif
          		 @endforeach
         
        			</select>
					<label>@if (Lang::has(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SIZES')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SIZES')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MORE_CUSTOM_SIZES')}} @endif <a class="add-small" target="_blank" href="<?php echo url('')?>/manage_size"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD')}} @endif </a></label>
                    <div id="size_error_msg"  style="color:#F00;font-weight:800"> </div>
					</div>
                </div>
				

	<div class="form-group" id="sizediv" style="display:none;">

 <input type="hidden" id="productsizecount" name="productsizecount" value="0">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_YOUR_SELECT_SIZE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_YOUR_SELECT_SIZE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_YOUR_SELECT_SIZE')}} @endif<span class="text-sub">:</span></label>

                    <div class="col-lg-8">
                       <p id="showsize" ></p>
					   {{ Form::hidden('si','0,',['id' => 'si']) }}
                       
                    </div>
</div>

<div class="form-group" id="quantitydiv" style="display:none;">
  		 <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_QUANTITY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_QUANTITY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_QUANTITY')}} @endif<span class="text-sub">:</span></label>

                    <div class="col-lg-8">
                       <p id="showquantity" ></p>
					   {{ Form::hidden('si','0,',['id' => 'sq']) }}
                       
                    </div>
</div>
				


<div class="form-group" >
                    <label for="text2"  class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_COLOR_FIELD')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_ADD_COLOR_FIELD')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_COLOR_FIELD')}} @endif<span class="text-sub"></span></label>

                   <div class="col-lg-8">
<label class="sample"><input type="radio" name="productcolor" id= "productcolor" onClick="setVisibility1('sub3', 'block');" value="0 {{ old('spectext0') }}"> {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= ''))? trans(Session::get('admin_lang_file').'.BACK_YES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_YES') }}</label>
 <label class="sample"><input type="radio" name="productcolor" id= "productcolor" onClick="setVisibility1('sub3', 'none');" value="1 {{ old('spectext0') }}" checked> {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= ''))? trans(Session::get('admin_lang_file').'.BACK_NO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO') }}</label>
                    </div>
                </div>

 <div class="form-group" id="sub3" style="display: none;">
                    <label for="text2" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_COLOR')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_COLOR')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_COLOR')}} @endif</label>

                   <div class="col-lg-3">

   	 <select class="form-control" id="selectprocolor" name="selectprocolor" onchange="getcolorname(this.value)">
     
       <option value="0">-@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_PRODUCT_COLOR')!= '')  {{ trans(Session::get('admin_lang_file').'.BACK_SELECT_PRODUCT_COLOR') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_PRODUCT_COLOR')}} @endif-</option>   
          @foreach ($productcolor as $color) 
           		
					@if (Input::old('selectprocolor') == $color->co_id)
					<option style="background:<?php echo $color->co_code;?>;" value="<?php echo $color->co_id;?> selected">{!!$color->co_name!!}</option>
						@else
						<option style="background:<?php echo $color->co_code;?>;" value="<?php echo $color->co_id;?>">{!!$color->co_name!!}</option>
						@endif

				<!--<option style="background:<?php // echo $color->co_code;?>;" value="<?php // echo $color->co_id;?>">{!!$color->co_name!!}</option>-->
          		 @endforeach
        </select>
  <label>@if (Lang::has(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_COLORS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_COLORS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MORE_CUSTOM_COLORS')}} @endif <a class="add-small" target="_blank" href="<?php echo url('')?>/manage_color"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD')}} @endif </a></label>
    <div id="color_error_msg"  style="color:#F00;font-weight:800"> </div>
					</div>
                </div>
			<div class="form-group" id="colordiv" style="display:none;">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_YOUR_SELECTED_COLOR')!= '') {{   trans(Session::get('admin_lang_file').'.BACK_YOUR_SELECTED_COLOR')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_YOUR_SELECTED_COLOR')}} @endif<span class="text-sub">:</span></label>

                    <div class="col-lg-8">
                       <p id="showcolor"></p>
                       <input type="hidden"  name="co" value="0," id="co" />
                    </div>
            </div>
			<div class="form-group">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELIVERY_DAYS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DELIVERY_DAYS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELIVERY_DAYS')}} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" value="{{ old('Delivery_Days') }}"
				class="form-control" placeholder="" id="Delivery_Days" maxlength="3" name="Delivery_Days" onKeyPress="return onlyNumbers(this);"> Days
                    </div>
            </div>
				 <?php /* <div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     if (Lang::has(Session::get('admin_lang_file').'.BACK_EG')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EG');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EG');}  : ( 2 - 5 )  
                    
					<div id="delivery_error_msg"  style="color:#F00;font-weight:800"> </div>
					</div>
			    </div>*/?>
		
				<input type="hidden" name="exist" id="exist" value="">
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_META_KEYWORDS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_META_KEYWORDS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_META_KEYWORDS')}} @endif<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" id="Meta_Keywords" name="Meta_Keywords" placeholder="Enter Meta Keywords {{ $default_lang }}">{{ old('Meta_Keywords') }}</textarea>
					   <div id="meta_key_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                  </div>
				  
				   
				 @if(!empty($get_active_lang)) 
				 @foreach($get_active_lang as $get_lang) 
				<?php
					$get_lang_name = $get_lang->lang_name;
				 ?>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta Keywords ({{ $get_lang_name }})<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" id="Meta_Keywords_<?php echo $get_lang_name; ?>" placeholder="Enter Meta Keywords in <?php echo $get_lang_name; ?>" name="Meta_Keywords_<?php echo $get_lang_name; ?>">{{ old('Meta_Keywords_'.$get_lang_name) }}</textarea>
					   <div id="meta_key_fr_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                  </div>
				  @endforeach
				  @endif
				
				 <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_META_DESCRIPTION')}} @endif<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" id="Meta_Description" placeholder="Enter Meta Description {{ $default_lang }}" name="Meta_Description">{{ old('Meta_Description') }}</textarea>
					   <div id="meta_desc_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
				
				
				 @if(!empty($get_active_lang))  
				 @foreach($get_active_lang as $get_lang) 
					 <?php 
				 $get_lang_name = $get_lang->lang_name;
				 ?>
				<div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Meta Description ({{ $get_lang_name }})<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" id="Meta_Description_<?php echo $get_lang_name; ?>" name="Meta_Description_<?php echo $get_lang_name; ?>" placeholder="Enter Meta Description in <?php echo $get_lang_name; ?>">{{ old('Meta_Description_'.$get_lang_name) }}</textarea>
					   <div id="meta_desc_fr_error_msg"  style="color:#F00;font-weight:800"> </div>
                    </div>
                </div>
				@endforeach
				@endif
				
				 
				<div class="form-group">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CASH_BACK')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CASH_BACK')}}  @else {{trans($ADMIN_OUR_LANGUAGE.'.BACK_CASH_BACK')}} @endif ({{ Helper::cur_sym() }})<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <input class="form-control"  type="text" id="cash_back" maxlength="5" name="cash_price" value="0 {{ old('cash_back') }}" onKeyPress="return onlyNumbers(this);">
                    </div>
                </div>

                <?php /*  Product Policy details */ ?>
                {{-- Cancel Policy starts --}}
               
                <div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_APPLY_CANCEL')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_APPLY_CANCEL')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_APPLY_CANCEL')}} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <label class="sample"  ><input type="radio" id="allow_cancel" name="allow_cancel"  value="1" onClick="setPolicyDisplay('cancel_tab', 'block')"> {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= ''))? trans(Session::get('admin_lang_file').'.BACK_YES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_YES') }}</label>
                        <label class="sample"><input type="radio" id="notallow_cancel" name="allow_cancel"  value="0" checked  onclick="setPolicyDisplay('cancel_tab', 'none')"> {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= ''))? trans(Session::get('admin_lang_file').'.BACK_NO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO') }}</label>

                    </div>
                </div>


                <div id="cancel_tab" style="display:none;">
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_DESCRIPTION')}} @endif <span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control cancel_desc" rows="10" name="cancellation_policy" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_CANCEL_DESCRIPTION')}} @endif">{{ old('cancellation_policy') }}</textarea>
                           <div id="cancellation_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                   
                 @if(!empty($get_active_lang)) 
                 @foreach($get_active_lang as $get_lang) 
                   <?php 
				 $get_lang_name = $get_lang->lang_name;
                 ?>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_DESCRIPTION')}} @endif ({{ $get_lang_name }}) <span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control cancel_desc_{{$get_lang_name}}" rows="10"  name="cancellation_policy_{{$get_lang_name}}" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_CANCEL_DESCRIPTION')}} @endif">{{ old('cancellation_policy_'.$get_lang_name) }}</textarea>
                           <div id="cancellation_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                   @endforeach
				   @endif
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                        <div class="col-lg-8">
                                <label for="text1" class="control-label ">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_CANCEL_DESCRIPTION')}} @endif<span class="text-sub"></span></label>     
                                <input placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_CANCEL_DESCRIPTION')}} @endif"  class="form-control" type="text" maxlength="3"  id="cancellation_days" name="cancellation_days" value="{{ old('cancellation_days') }}">
                                    <div id="cancellation_days_error_msg"  style="color:#F00;font-weight:800"> </div>         
                        </div>
                    </div>

                </div> 

                {{-- Cancel Policy ends --}}
                {{-- REturn Policy starts --}}
                <div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_APPLY_RETURN')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_APPLY_RETURN')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_APPLY_RETURN')}} @endif<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    <label class="sample"> <input type="radio" id="allow_return" name="allow_return"  value="1" onclick="setPolicyDisplay('return_tab', 'block')" > @if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_YES')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_YES')}} @endif</label>
                        <label class="sample"><input type="radio" id="notallow_return" name="allow_return"  value="0" checked onclick="setPolicyDisplay('return_tab', 'none')" > @if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NO')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NO')}} @endif</label>


                        <label class="sample"></label>
                    </div>
                </div>


                <div id="return_tab" style="display:none;">
                     <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RETURN_DESCRIPTION')}} @endif  <span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="return_policy" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_RETURN_DESCRIPTION')}} @endif">{{ old('return_policy') }}</textarea>
                           <div id="return_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                    <?php 
                     if(!empty($get_active_lang)) { 
                     foreach($get_active_lang as $get_lang) {
                     $get_lang_name = $get_lang->lang_name;
                     ?>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RETURN_DESCRIPTION')}} @endif ({{ $get_lang_name }}) <span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="return_policy_{{$get_lang_name}}" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_RETURN_DESCRIPTION')}} @endif">{{ old('return_policy_'.$get_lang_name) }}</textarea>
                           <div id="return_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                    <?php } } ?>   
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                        <div class="col-lg-8">
                                    <label for="text1" class="control-label">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_RETURN_DESCRIPTION')}} @endif<span class="text-sub"></span></label>
                                    <input placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_RETURN_DESCRIPTION')}} @endif"  class="form-control" type="text" maxlength="3" id="return_days" name="return_days" value="{{ old('return_days') }}">
                                    <div id="return_days_error_msg"  style="color:#F00;font-weight:800"> </div>         
                        </div>
                    </div>

                </div> 


                {{-- REturn Policy ends --}}
                {{-- Replacement Policy starts --}}
                <div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_APPLY_REPLACEMENT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_APPLY_REPLACEMENT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_APPLY_REPLACEMENT')}} @endif <span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <label class="sample"><input type="radio" id="allow_replace" name="allow_replace"  value="1" onclick="setPolicyDisplay('replace_tab', 'block')"  > @if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_YES')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_YES')}} @endif</label>
                        <label class="sample"><input type="radio" id="notallow_replace" name="allow_replace"  value="0" checked  onclick="setPolicyDisplay('replace_tab', 'none')" > @if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NO')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NO')}} @endif</label>
                    </div>
                </div>

                <div id="replace_tab" style="display:none;">
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_REPLACE_DESCRIPTION')}} @endif  <span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="replacement_policy" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_REPLACE_DESCRIPTION') }} @endif">{{ old('replacement_policy') }}</textarea>
                           <div id="replacement_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                        </div>
                    </div>
                    
                     @if(!empty($get_active_lang)) 
                     @foreach($get_active_lang as $get_lang) 
                     <?php
					 $get_lang_name = $get_lang->lang_name;
                     ?>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_REPLACE_DESCRIPTION')}} @endif   ({{ $get_lang_name }})<span class="text-sub">*</span></label>

                        <div class="col-lg-8" id="description">
                           <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10" maxlength="150" name="replacement_policy_{{$get_lang_name}}" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_REPLACE_DESCRIPTION') }} @endif">{{ old('replacement_policy_'.$get_lang_name) }}</textarea>
                           <div id="replacement_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
						  
                        </div>
                    </div>
                    @endforeach
					@endif
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                        <div class="col-lg-8">
                                     <label for="text1" class="control-label ">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_REPLACE_DESCRIPTION') }} @endif<span class="text-sub"></span></label><br>
                                    <input placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_REPLACE_DESCRIPTION') }} @endif"  class="form-control" type="text"  id="replace_days" maxlength="3" name="replace_days" value="{{ old('Replace_days') }}">
                                    <div id="replace_days_error_msg"  style="color:#F00;font-weight:800"> </div>         
                        </div>
                    </div>

                </div> 
                {{-- Replacement Policy ends --}}

                <?php /*  Product Policy details ends */ ?>
                <?php /* <input type="hidden" value='0' name='allow_cancel'/>
                <input type="hidden" value='0' name='allow_return'/>
                <input type="hidden" value='0' name='allow_replace'/> */ ?>
				 <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_IMAGE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_IMAGE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_IMAGE') }} @endif <span class="text-sub">*</span><br> <span  for="text1">( Jpg,Gif,Png,Jpeg )</span><br>(@if (Lang::has(Session::get('admin_lang_file').'.BACK_MAX')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MAX')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MAX')}} @endif 5)</label>
                     <span class="errortext red logo-size
" style="color:red"><em>@if (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE') }} @endif  {{ $PRODUCT_WIDTH }} x  {{  $PRODUCT_HEIGHT }} @if (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PIXELS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS') }} @endif</em></span>
					 <div class="col-lg-8" id="img_upload">
            	   		<div style="display: block; overflow: hidden;">
               				<input type="file" name="file[]" id="fileUpload1" value="" onchange="Upload(this.id);"   />
               				<a href="javascript:void(0);"  title="Add field" class="chose-file-add" ><span id="add_button" style="cursor:pointer;width:84px;">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD')}} @endif</span></a>
           	       		</div>
							<div id="img_error_msg"  style="color:#F00;font-weight:800"></div>
							<label id="file_valid_error" style="color:#f00;display:none;" class="error"> Width and Height must be 800PX X 800PX.</label>
							<label id="file_type_error" style="color:#f00;display:none;" class="error"> Please select a valid Image file (jpg,gif,png,jpeg)</label>
							<label id="file_error" style="color:#f00;display:none;" class="error"> This Field is Required</label>							
        	 		 </div> 
  		   			
					 <input type="hidden" id="count" name="count" value="1">
			
				 </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                   <button  type = "submit" class="btn btn-success btn-sm btn-grad" id="submit_product" ><a style="color:#fff">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_PRODUCT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_PRODUCT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_PRODUCT')}} @endif</a></button>
                     <button type="reset" class="btn btn-danger btn-sm btn-grad" style="color:#ffffff"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RESET')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET')}} @endif</button>
                   
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

 
 <script src="<?php echo url('')?>/public/assets/plugins/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>



{{-- policy starts --}}
<script type="text/javascript">
function setPolicyDisplay(id, displayOption) 
{
    $("#"+id).css('display',displayOption);
} 
</script>

{{-- policy ends --}}


<script>




/*Form Validation*/
/*function imageval(i){	/*Image size validation*/
	 
	//var img_count = $("#count").val();
 	//Get reference of FileUpload.

	// var i;
	//for (i = 0; i <=img_count; i++) {
  	/*	var fileUpload = document.getElementById("fileUpload"+i);
	//}

	//Check whether the file is valid Image.
   /* var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.gif)$");
    //if (regex.test(fileUpload.value.toLowerCase())) {
 
        //Check whether HTML5 is supported.
        //if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
           /* var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
               /* image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (width < 500 || height < 700) {
                        alert("Image Height and Width should have 500 * 700 px.");
                        return false;
                    }
                    alert("Uploaded image has valid Height and Width.");
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
    }
}*/

$(document).ready(function() {

			$('#specificationdetails').hide();
			var title 		     = $('#Product_Title');
			var category		 = $('#Product_Category');
			var maincategory 	 = $('#Product_MainCategory');
			var subcategory 	 = $('#Product_SubCategory');
			var secondsubcategory= $('#Product_SecondSubCategory');
			var pquantity		 = $('#Quantity_Product');
			var originalprice 	 = $('#Original_Price');
			var discountprice 	 = $('#Discounted_Price');
			var inctax           = $('#inctax');
			var shippingamt      = $('#Shipping_Amount');
			//var description      = $('#description');
			var wysihtml5 		 = $('#wysihtml5');
			var description      = $("input[name='Description']");
			var delivery_days    = $('#Delivery_Days');
			
			var metakeyword		 = $('#Meta_Keywords');
			var metadescription	 = $('#Meta_Description');
			var file		     = $('#fileUpload1');
		    var desc             = $('#desc');
			var product_size     = $("#Product_Size");
			var cancellation_days  = $("#cancellation_days");
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

	 var sizeid             = $("#Product_Size").val();
	 var count              = $("#Product_Size :selected").length;
	 var checkedoptioncolor = $('input:radio[name=productcolor]:checked').val();
	 var shipamtchecked     = $('input:radio[name=shipamt]:checked').val();
	 var colorid            = $("#selectprocolor option:selected").val();
     var checkspec          = $('input:radio[name=specification]:checked').val();
     var checkcancel          = $('input:radio[name=allow_cancel]:checked').val();
	  

	/*Product Title*/
		if($.trim(title.val()) == ""){
			title.css('border', '1px solid red'); 
			$('#title_error_msg').html('Please Enter Title');
			title.focus();
			return false;
		}else{
			title.css('border', ''); 
			$('#title_error_msg').html('');
		}
		
	/*Product Title french*/
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
			$('#title_error_msg').html('');
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
		
		/*if(subcategory.val() == 0)
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
		}
		*/	

		/*product_brand
	
		if($('#product_brand').val() == 0){
			$('#product_brand').css('border', '1px solid red'); 
			$('#brand_error_msg').html('Please Select Brand');
			$('#product_brand').focus();
			return false;
		}else{
			$('#product_brand').css('border', ''); 
			$('#brand_error_msg').html('');
		}*/
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
			$('#dis_price_error_msg').html('Please Enter Discount Price');
			discountprice.focus();
			return false;
		}else if(isNaN(discountprice.val()) == true){
			discountprice.css('border', '1px solid red'); 
			$('#dis_price_error_msg').html('Numbers Only Allowed');
			discountprice.focus();
			return false;
		}else if(parseInt(discountprice.val()) > parseInt(originalprice.val()) ){
			discountprice.css('border', '1px solid red'); 
			$('#dis_price_error_msg').html('Discount price sholud be less than original price');
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
			$('#desc_error_msg').html('Please Enter Description In English');
			wysihtml5.focus();
			return false;
		}else{
			wysihtml5.css('border', ''); 
			$('#desc_error_msg').html('');
		}
		
		/*Description in french*/
		<?php 
		if(!empty($get_active_lang)) { 
		foreach($get_active_lang as $get_lang) {
		$get_lang_name = $get_lang->lang_name;
		?>
		var title_fren = $('.description_<?php echo $get_lang_name; ?>');
		if($.trim(title_fren.val()) == ''){
			
			title_fren.css('border', '1px solid red'); 
			$('#desc_fr_error_msg').html('Please Enter Description in <?php echo $get_lang_name; ?>');
			title_fren.focus();
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
			 	var specid=$("#pro_spec"+i+" option:selected").val();
			 	var spectxt=$("#pro_spec"+i).val();
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

	/*Product Size*/
		//if(count == 0){
		if($('input:radio[name=pro_siz]:checked').val()==0){
			if(count<1){
			$('#Product_Size').focus();
			$('#size_error_msg').html('Please Select Product size');
			$('#Product_Size').css('border', '1px solid red'); 
			
			return false;
		}else{
			$('#Product_Size').css('border', '');
			$('#size_error_msg').html('');
		}
	}
	/*Product Color*/
		if($('input:radio[name=productcolor]:checked').val()==0){
			if($("#selectprocolor option:selected").val()<1){
 				$('#color_error_msg').html('Please select color');
				$("#selectprocolor").css('border', '1px solid red'); 
				return false;
			}else{ 
				$("#selectprocolor").css('border', ''); 
				$('#color_error_msg').html('');
			}
		}
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
		}
  

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
		
		/*Cancellation Policy*/
		/* if(checkcancel==1){ alert(cancellation_policy);
			if(cancellation_policy.val()==""){
				cancellation_policy.css('border', '1px solid red'); 
				$('#cancel_policy_error_msg').html('Please Provide Cancel Policy');
				cancellation_policy.focus();
				return false;
			}else{
				cancellation_policy.css('border', ''); 
				$('#cancel_policy_error_msg').html('');
			}
			
			if(cancellation_days.val()==""){
				cancellation_days.css('border', '1px solid red'); 
				$('#cancel_days_error_msg').html('Please Provide Cancellation Applicable days');
				cancellation_days.focus();
				return false;
			}else{
				cancellation_days.css('border', ''); 
				$('#cancel_days_error_msg').html('');
			}
			
		}else if(shipamtchecked==1){
				shippingamt.css('border', ''); 
				$('#ship_amt_error_msg').html('');
		} */
		

   /*Product Image*/
		var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
      	if(file.val() == ""){
 			file.focus();
			file.css('border', '1px solid red'); 
			$('#img_error_msg').html('Please choose image');
			$("#img_error_msg").fadeOut(5000);
			return false;
		}else if ($.inArray($('#file0').val().split('.').pop().toLowerCase(), fileExtension) == -1) { 				
			file.focus();
			file.css('border', '1px solid red'); 
			$('#img_error_msg').html('Please choose valid image');
			$("#img_error_msg").fadeOut(5000);
			return false;
		}
		/*else if(file.val() != "")
		{
			var img = new Image();
			img.src = window.URL.createObjectURL(file);

			img.onload = function() {
			var width = img.naturalWidth, height = img.naturalHeight;
			window.URL.revokeObjectURL( img.src );
			if( width > 400 && height > 300 ) {
			alert();
			} else { 
			return false;
			} 
			return false;
		}*/
		
		else{
			file.css('border', ''); 
			$('#img_error_msg').html('');				
		}

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
<script type="text/javascript">
function check(){

			
			var title    = $('#Product_Title').val();
			var passdata = "&title="+title;
			$.ajax( {
			      type: 'get',
				  data: passdata,
				  url: 'check_product_exists',
				  success: function(responseText){  
				   if(responseText==1){  //already exist
					  alert("This Product Title Already Exist in this Store");
					  $("#exist").val("1"); //already exist
					  $("#Product_Title").css('border', '1px solid red'); 
					
					  $('#title_error_msg').html("This Product Title Already Exist in this Store");	
					  $("#Product_Title").focus();
					  return false;				   
				   }else if(responseText==0){
					  $("#exist").val("0");
				   }
				}		
			});	
     }
	 
	  <?php 
		if(!empty($get_active_lang)) { 
		foreach($get_active_lang as $get_lang) {
		$get_lang_name = $get_lang->lang_name;
		$get_lang_code = $get_lang->lang_code;
		?>
	 function check_dynamic(){ 
			
			var title    = $('#Product_Title_<?php echo $get_lang_name; ?>').val();
			var lang_code = "<?php echo $get_lang_code; ?>"; 
			var passdata = "&title="+title+"&lang_code="+lang_code; 
			$.ajax( {
			      type: 'get',
				  data: passdata,
				  url: 'check_product_exists_dynamic',
				  success: function(responseText){  
				   if(responseText==1){  //already exist
					  alert("This Product Title Already Exist in this Store");
					  $("#exist").val("1"); //already exist
					  $("#Product_Title_<?php echo $get_lang_name; ?>").css('border', '1px solid red'); 
					
					  $('#title_fr_error_msg').html("This Product Title Already Exist in this Store");	
					  $("#Product_Title_<?php echo $get_lang_name; ?>").focus();
					  return false;				   
				   }else if(responseText==0){
					  $("#exist").val("0");
				   }
				}		
			});		
     }
		<?php } } ?>

$(document).ready(function(){
    var maxField = 5; //Input fields increment limitation
    var addButton = $('#add_button'); //Add button selector
    var wrapper = $('#img_upload'); //Input field wrapper //div
	
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
		    x++; //Increment field counter
			var fieldHTML = '<div style="display:block; width: 350px; margin-top:15px;"><input type="file" name="file[]" id="fileUpload'+x+'" onchange="Upload_multiple(this.id);" value="" required/><div id="remove_button"><a href="javascript:void(0);"  title="Remove field" style="color:#ffffff;">Remove</a></div></div>'; //New input field html 
            
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
function addproductimageFormField() 
{
	var id = document.getElementById("aid").value;
	var count_id = document.getElementById("count").value;	  
	alert(count_id);
	if(count_id < 4)
	{
	document.getElementById('count').value = parseInt(count_id)+1;
	var count_id_new = document.getElementById("count").value;	 
	jQuery.noConflict()
	jQuery("#divTxt").append("<div id='row" + count_id + "' style='width:100%; display:block; float:left; margin-bottom:10px;'><input type='file' name='file_more"+count_id+"' id='file"+count_id_new+"'  required/>&nbsp;&nbsp<a href='#' onClick='removeFormField(\"#row" + count_id + "\"); return false;' style='' >Remove</a></div>");     
	jQuery('#row' + id).highlightFade({    speed:1000 });
	id = (id - 1) + 2;
	document.getElementById("aid").value = id;	 
	}
}

function removeFormField(id)
 {
	 //alert(id);
	var count_id = document.getElementById("count").value;	
	document.getElementById('count').value = parseInt(count_id)-1;
	jQuery(id).remove();
}

function get_specification_details()
{
	var main_cat=$("#Product_Category").val();
	var sec_main_cat=$("#Product_MainCategory").val();
	/*Top Category*/	
	if(main_cat == "0"){
		$("#Product_Category").css('border', '1px solid red'); 
		$('#category_error_msg').html('Please Select Category');
		$("#Product_Category").focus();
		return false;
	}else{
		$("#Product_Category").css('border', ''); 
		$('#category_error_msg').html('');
	}
	/*Main Category*/	
	if(sec_main_cat == "0")
	{
		$("#Product_MainCategory").css('border', '1px solid red'); 
		$('#main_cat_error_msg').html('Please Select Main Category');
		$("#Product_MainCategory").focus();
		return false;
	}else{
		$("#Product_MainCategory").css('border', ''); 
		$('#main_cat_error_msg').html('');
	}
	if(sec_main_cat!="" && main_cat!=""&& sec_main_cat!="0" && main_cat!="0")
	{
		$.post("<?php echo url(''); ?>/get_spec_related_to_cat",
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
				$("#pro_spec0").html("<option value='0'>-- Select --</option>");
               document.getElementById('specification_list_avail').style.display="inline";
               document.getElementById('specification_list_notavail').style.display="none";
				for(var i=1;i<=count_id;i++)
				{
                    
					$("#spec_grp"+i).html(data);
					$("#pro_spec"+i).html("<option value='0'>-- Select --</option>");
                     
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
function setVisibility(id, visibility)
{
	var main_cat=$("#Product_Category").val();
	var sec_main_cat=$("#Product_MainCategory").val();
	if(sec_main_cat!="" && main_cat!=""&& sec_main_cat!="0" && main_cat!="0")
	{
		document.getElementById(id).style.display = visibility;
		document.getElementById('addmore').style.display =visibility;
		document.getElementById('divspecificationTxt').style.display =visibility;
	}
	else
	{
		
		$("input[name='specification'][value='2']").attr('checked', true);
		return false;
	}

}
function setVisibility1(id, visibility) 
{
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

}
function product_col(id, visibility)
 {
document.getElementById(id).style.display = visibility;
document.getElementById('pro_col').style.display =visibility;

}

	function addspecificationFormField()
	{
		var count_id = document.getElementById("specificationcount").value;
		var selectspec=$("#pro_spec"+count_id+" option:selected").val();
		var spectext=$("#spectext"+count_id).val();
		var fr_spectext=$("#fr_spectext"+count_id).val();

		if(selectspec!=0  && spectext!="" && fr_spectext!="")
		{
			var id = document.getElementById("specificationid1").value;
			var count_id = document.getElementById("specificationcount").value;
			var nameid=parseInt(count_id)+1;
			
			//if(count_id < 5){
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
			jQuery("#divspecificationTxt").append(" <div class='form-group ' id='spec"+ nameid + "' '><div class='col-lg-2'></div><div class='col-lg-2'><select name='spec_grp"+ nameid  + "' id='spec_grp"+ nameid  + "' onChange='spcfunction("+nameid+",this.value);' class='form-control' required>"+result+"</select></div><div class='col-lg-2'><select name='spec"+ nameid  + "' id='pro_spec"+ nameid  + "' class='form-control' required><option  value='0'>-- select specification--</option></select></div><div class='col-lg-2'><input type='text' class='form-control' name='spectext"+ nameid  + "' placeholder='Specification <?php echo $default_lang;?>' required/></div>"+lang_div+"<div class='col-lg-2' ><a href='#' style='display:inline-block;width: 100%;text-align: center;' class='pro-des-rem' onClick='removespecFormField(\"#spec" + nameid + "\"); return false;' style='color:#ffffff;' >Remove</a></div></div>");     
			id = (id - 1) + 1;
			document.getElementById("specificationid1").value = id;
		/*Sathyaseelan 
			var result="<option>hai</option>";
			var main_cat=$("#Product_Category").val();
			var sec_main_cat=$("#Product_MainCategory").val();
			if(sec_main_cat!="" && main_cat!=""&& sec_main_cat!="0" && main_cat!="0")
			{
				$.post("<?php echo url(''); ?>/get_spec_related_to_cat",
				{
					main_cat: main_cat,
					sec_main_cat: sec_main_cat
				},
				function(data, status){
					$("spec_grp"+ nameid).html(data);
				});
			}
			
			Sathyaseelan */
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
function removespecFormField(id) 
{
	var count_id = document.getElementById("specificationcount").value;
	count_id=count_id-1;

	document.getElementById("specificationcount").value=count_id;	

	jQuery(id).remove();
}


function adddeliverypolicyFormField()
{
	var id = document.getElementById("deliverypolicyid1").value;
	var count_id = document.getElementById("deliverypolicycount").value;


	if(count_id < 10)
	{
		document.getElementById('deliverypolicycount').value = parseInt(count_id)+1;
		jQuery("#divdeliverypolicy").append(" <div class='form-group' id='delivery"+ id + "'><label for='text1' class='control-label col-lg-2'>Delivery Policy <span class='text-sub'></span></label><div class='col-lg-8'> <input  class='form-control' type='text' id='Delivery_Policy'"+id+"' name='Delivery_Policy'"+id+"'><div class='col-lg-8'><a href='#' onClick='removedeliveryFormField(\"#delivery" + id + "\"); return false;' style='color:#F60;' >Remove</a></div></div></div>");     
		id = (id - 1) + 1;
		document.getElementById("deliverypolicyid1").value = id;

	}
	else
	{	
		alert("Maximum limit reached");
		return false;
	}

}
function removedeliveryFormField(id)
{
	var count_id = document.getElementById("deliverypolicycount").value;
	count_id=count_id-1;
	document.getElementById("deliverypolicycount").value=count_id;	
	jQuery(id).remove();
}


 function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode        
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            
         return true;
          
      }


function getcolorname(id)
	{
		 var passcolorid = 'id='+id+"&co_text_box="+$('#co').val();
		   $.ajax( {
			      type: 'get',
				  data: passcolorid,
				  url: 'product_getcolor',
				  success: function(responseText){  
				   if(responseText)
				   { 	 
				
					var get_result = responseText.split(',');
					if(get_result[3]=="success")
					{
						$('#colordiv').css('display', 'block'); 
						
					$('#showcolor').append('<span style="width:195px; display:inline-block;padding:5px;border:4px solid '+get_result[2]+';margin:5px 0px; display:inline-table">'+get_result[0]+'<input type="checkbox"  name="colorcheckbox'+get_result[1]+'"style="padding-left:30px;" checked="checked" value="1" ></span>&nbsp;&nbsp;');
                    /*$("#selectprocolor").on("click", function () {
$('#selectprocolor').prop('selected', function() {
        return this.defaultSelected;
    });
});*/

           
		
					var co_name_js = $('#co').val();	
					$('#co').val(get_result[1]+","+co_name_js);	 
                   /* $('#selectprocolor').find('option:first').attr('selected', 'selected'); */
						
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
				  url: 'product_getsize',
				  success: function(responseText){  
				   if(responseText)
				   { 	 //alert(responseText);
					var get_result = responseText.split(',');
					if(get_result[3]=="success")
					{
                                  		var count=parseInt($('#productsizecount').val())+1;
						$("#productsizecount").val(count);
						$('#sizediv').css('display', 'block'); 
						//$('#quantitydiv').css('display', 'block'); 
						
					$('#showsize').append('<span style="padding-right:0px; width:150px;display:inline-block;">Select Size:<span style="color:#ff0099;padding-left:5px">'+get_result[2]+'<input type="checkbox"  name="sizecheckbox'+get_result[1]+'"style="padding-left:30px;" checked="checked" value="1" ></span></span>');
					$('#showquantity').append('<input type="text" name="quantity'+get_result[1]+'" value="1" style="padding:10px;border:5px solid gray;margin:0px;" onkeypress="return isNumberKey(event)" ></input> ');
		
					var co_name_js = $('#si').val();	
					$('#si').val(get_result[1]+","+co_name_js);	


						
					//alert($('#si').val());
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
	function get_maincategory(id)
	{
		 var passcategoryid = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passcategoryid,
				  url: 'product_getmaincategory',
				  success: function(responseText){  
				   if(responseText)
				   { 	 
					$('#Product_MainCategory').html(responseText);					   
					$('#Product_SubCategory').html(0);					   
					$('#Product_SecondSubCategory').html(0);					   
				   }
				}		
			});		
	}

	function get_subcategory(id)
	{
		 var passsubcategoryid = 'id='+id;
		   $.ajax( {
			         type: 'get',
				  data: passsubcategoryid,
				  url: 'product_getsubcategory',
				  success: function(responseText){  
				   if(responseText)
				   { 	 
					$('#Product_SubCategory').html(responseText);					   
				   }
				}		
			});		
	}

	function get_second_subcategory(id)
	{
		 var passsecondsubcategoryid = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passsecondsubcategoryid,
				  url: 'product_getsecondsubcategory',
				  success: function(responseText){  
				   if(responseText)
				   {    
					$('#Product_SecondSubCategory').html(responseText);					   
				   }
				}		
			});		
	}

function spcfunction(count,spc_grop_id){
	
	
	//var spc_grop_id = $('spec_grp'+count).val();
	var pass_spc_grp_id = 'spc_group_id='+spc_grop_id;
		   $.ajax( {
			      type: 'get',
				  data: pass_spc_grp_id,
				  url: 'product_get_spec',
				  success: function(responseText){  
				   if(responseText)
				   { 	
					  // alert(responseText); 
					$('#pro_spec'+count).html(responseText);					   
				   }
				}		
			});		
}
	/*multiselect*/
	$(function() {
    	$('#Product_Size').multiselect({
        includeSelectAllOption: true
    	});
	});

</script>


    <script type="text/javascript">
	   $.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	   });
	</script>
	
    <script src="{{ url('')}}/public/assets/js/multi_select_dropdown.js"></script>
  	<script src="{{ url('')}}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	
    <?php /* END GLOBAL SCRIPTS
<script src="<?php echo url('')?>/public/assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="<?php echo url('')?>/public/assets/js/formsInit.js"></script>
<script>
   //  $(function () { formInit(); });
</script>*/ ?>

         <!-- PAGE LEVEL SCRIPTS -->
     <script src="{{ url('')}}/public/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="{{ url('')}}/public/assets/js/editorInit.js"></script>
    <script>
       // $(function () { formWysiwyg(); });
	   $(document).ready(function () {
	$('.wysihtml5').wysihtml5();
});
        </script>
<!---Right Click Block Code---->
<!--<script language="javascript">
document.onmousedown=disableclick;
status="Cannot Access for this mode";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
</script>-->
<script type="text/javascript">
$(function () {
    $("#upload").bind("click", function () {
        //Get reference of FileUpload.
       
    });
});
</script>

<!---F12 Block Code---->
<script type='text/javascript'>
/*$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});*/
</script>
<?php /* Hold input data after submit validation returns  */ ?>
<script type="text/javascript">
    $(function () {
        if($("#Product_Category").val()!='0' && $("#Product_Category").val()!='0'){
            $("#Product_Category").change();
        } 
});
 
</script>

<script>
function Upload(files) {
   
    var fileUpload = document.getElementById("fileUpload1");

    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif|.jpeg)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
 
        if (typeof (fileUpload.files) != "undefined") {
            
            var reader = new FileReader();

            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
               
                var image = new Image();
                image.src = e.target.result;
                       
                image.onload = function () {
                    var height = this.height; 
                    var width = this.width; 
                    if (height != 800 || width != 800) {
                       // alert("Height and Width must be 272PX X 272PX.");
						document.getElementById("file_valid_error").style.display = "inline";
						$("#file_valid_error").fadeOut(9000);
						$("#fileUpload1").val('');
						$("#fileUpload1").focus();
                        return false;
                    } 
                    return true;
                };
            }
        } else {
            alert("This browser does not support HTML5.");
			$("#fileUpload1").val('');
            return false;
        }
    } else {
       // alert("Please select a valid Image file.");
		document.getElementById("file_type_error").style.display = "inline";
		$("#file_type_error").fadeOut(9000);
		$("#fileUpload1").val('');
		$("#fileUpload1").focus();
        return false;
    }
}
	</script>
	
	<script>
function Upload_multiple(files) {
	var fileUp = files; 
	var countid = fileUp.substr(fileUp.length - 1); 
 
	var fileUpload = document.getElementById("fileUpload"+countid);

    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif|.jpeg)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
        if (typeof (fileUpload.files) != "undefined") {
            
            var reader = new FileReader();

            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
               
                var image = new Image();
                image.src = e.target.result;
                       
                image.onload = function () {
                    var height = this.height; 
                    var width = this.width; 
                    if (height != 800 || width != 800) { 
                       alert("Width and Height must be 800PX X 800PX");
						//document.getElementById("file_valid_error_more").style.display = "inline";
						document.getElementById("fileUpload"+countid).value="";
						document.getElementById("fileUpload"+countid).focus();
						
                        return false;
                    } 
                    return true;
                };
            }
        } else {
            alert("This browser does not support HTML5.");
			$("#fileUpload"+countid).val('');
            return false;
        }
    } else {
       // alert("Please select a valid Image file.");
		//document.getElementById("file_type_error_more").style.display = "inline";
		//$("#file_type_error_more").fadeOut(5000);
		alert("Please select a valid Image File");
		$("#fileUpload"+countid).val('');
		$("#fileUpload"+countid).focus();
        return false;
    }
}

$('#Product_Title').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^a-z 0-9 A-Z_]/g,'') ); }
);
	</script>
	

</body>
     <!-- END BODY -->
</html>
