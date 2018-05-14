<!DOCTYPE html>
<!--[if IE 8]> 
<html lang="en" class="ie8">
   <![endif]-->
   <!--[if IE 9]> 
   <html lang="en" class="ie9">
      <![endif]-->
      <!--[if !IE]><!--> 
      <html lang="en">
         <!--<![endif]-->
         <!-- BEGIN HEAD -->
         <head>
            <meta charset="UTF-8" />
            <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_DEALS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_DEALS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_DEALS')}} @endif </title>
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
                              <li class=""><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_HOME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME')}}@endif</a></li>
                              <li class="active"><a>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_DEALS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_DEALS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_DEALS')}}@endif</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="box dark">
                              <header>
                                 <div class="icons"><i class="icon-edit"></i></div>
                                 <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_DEALS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_DEALS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_DEALS')}}@endif</h5>
                              </header>
                              @if ($errors->any())
                              <br>
                              <ul style="color:red;">
                                 <div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                 </div>
                              </ul>
                              @endif
                              <div id="div-1" class="accordion-body collapse in body">
                                 <?php if(isset($action) && $action == 'save') { $process = 'save'; $button = 'Add Deals'; $form_action = 'add_deals_submit'; } 
                                    else if(isset($action) && $action == 'update') { $process = 'update'; $button = 'Update Deals'; }  ?>
                                 {!! Form::open(array('url'=>'add_deals_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset' => 'UTF-8', 'accept-charset' => 'UTF-8')) !!}
                                 <input type="hidden" name="action" value="<?php echo $process; ?>" />
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2"></label>
                                    {!! Form::label('', '', array('class' => 'control-label col-lg-2','for' => 'text1')) !!}
                                    <div class="col-lg-8">
                                       <div id="error_msg"  style="color:#F00;font-weight:800"  > </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_TITLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEAL_TITLE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_TITLE')}} @endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input id="title" name="title" maxlength="200"  value="{{ old('title') }}" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_DEAL_TITLE')!= '') {{   trans(Session::get('admin_lang_file').'.BACK_ENTER_DEAL_TITLE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_DEAL_TITLE')}}@endif " class="form-control" type="text" onChange="check();">
                                       <input id="check_title_val" name="check_title_val"  value="0 {{ old('title') }}" class="form-control" type="hidden">
                                       <div id="title_error_msg"  style="color:#F00;font-weight:800"  > </div>
                                    </div>
                                 </div>
                                 @if(!empty($get_active_lang))  
                                 @foreach($get_active_lang as $get_lang) 
                                 @php $get_lang_name = $get_lang->lang_name;
                                 @endphp
                                 <div class="form-group">
                                    {!! Html::decode(Form::label('', 'Deal Title({{ $get_lang_name }})<span class="text-sub">*</span>', array('class' => 'control-label col-lg-2','for' =>'text1'))) !!}
                                    <div class="col-lg-8">
                                       <input id="title_<?php echo $get_lang_name; ?>" maxlength="200" name="title_<?php echo $get_lang_name; ?>" placeholder="Enter Page Title In {{ $get_lang_name }}" class="form-control" type="text" value="{!! Input::old('title_'.$get_lang_name) !!}">
                                       <div id="title_fr_error_msg"  style="color:#F00;font-weight:800"  > </div>
                                    </div>
                                 </div>
                                 @endforeach
                                 @endif
                                 <div class="form-group">
                                    <label for="pass1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TOP_CATEGORY')}}@endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <select class="form-control" name="category" id="category" onChange="select_main_cat(this.value)" >
                                          <option value="0">--@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT')}} @endif--</option>
                                          @foreach($category as $cat_list)
                                          @if (Input::old('category') == $cat_list->mc_id)
                                          <option value="{{ $cat_list->mc_id }}" selected>{{ $cat_list->mc_name }} ({{ $cat_list->mc_name_fr }})</option>
                                          @else
                                          <option value="{{ $cat_list->mc_id }}">
                                             {{ $cat_list->mc_name}} <!--(<?php echo $cat_list->mc_name_fr; ?>)-->
                                          </option>
                                          @endif
                                          <!--<option value="<?php echo $cat_list->mc_id; ?>"><?php echo $cat_list->mc_name; ?>(<?php echo $cat_list->mc_name_fr; ?>)</option>-->
                                          @endforeach
                                       </select>
                                       <div id="category_error_msg"  style="color:#F00;font-weight:800"  > </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_MAIN_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_MAIN_CATEGORY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_MAIN_CATEGORY')}} @endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <select class="form-control" name="maincategory" id="maincategory" onChange="select_sub_cat(this.value)" >
                                          <option value="0">---@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT')}} @endif---</option>
                                       </select>
                                       <div id="main_cat_error_msg"  style="color:#F00;font-weight:800"  > </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SUB_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_SUB_CATEGORY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SUB_CATEGORY')}} @endif<span class="text-sub"></span></label>
                                    <div class="col-lg-8">
                                       <select class="form-control" name="subcategory" id="subcategory" onChange="select_second_sub_cat(this.value)" >
                                          <option value="0">---@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT')}} @endif---</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="text2" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SECOND_SUB_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT_SECOND_SUB_CATEGORY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SECOND_SUB_CATEGORY')}} @endif<span class="text-sub"></span></label>
                                    <div class="col-lg-8">
                                       <select class="form-control" name="secondsubcategory" id="secondsubcategory"  >
                                          <option value="0">---@if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SELECT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT')}} @endif---</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ORIGINAL_PRICE')}}@endif({{ Helper::cur_sym() }}) <span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input id="originalprice" name="originalprice" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY')}} @endif" value="{{ old('originalprice') }}" class="form-control" type="text" maxlength="10">
                                       <div id="org_price_error_msg"  style="color:#F00;font-weight:800"> </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DISCOUNTED_PRICE')}} @endif ({{ Helper::cur_sym() }}) <span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input id="discountprice" value="{{ old('discountprice') }}" name="discountprice" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY')}} @endif" class="form-control" type="text" maxlength="10" >
                                       <div id="dis_price_error_msg"  style="color:#F00;font-weight:800"> </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>
                                    <div class="col-lg-8">
                                       <input type="checkbox" id="taxchk" name="taxchk" onclick="if(this.checked){$('#inctax').show();}else{$('#inctax').hide();$('#inctax').val(0)}"> ( @if (Lang::has(Session::get('admin_lang_file').'.BACK_INCLUDING_TAX_AMOUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_INCLUDING_TAX_AMOUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_INCLUDING_TAX_AMOUNT')}} @endif ) 
                                       <input placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY')}} @endif" style="display:none;" class="form-control" type="number" id="inctax"  max="99" name="inctax"> %
                                       <div id="tax_error_msg"  style="color:#F00;font-weight:800"> </div>
                                    </div>
                                 </div>
                                 <div class="form-group"  >
                                    <label for="text2"  class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT')}}  @else {{trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPPING_AMOUNT')}}@endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input type="radio" id="shipamt" name="shipamt" onClick="setshipVisibility('showship', 'none');" value="1 @if(is_array(old('shipamt')) && in_array(1, old('shipamt'))) checked @endif" checked > <label class="sample">@if (Lang::has(Session::get('admin_lang_file').'.BACK_FREE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_FREE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_FREE')}}@endif</label>
                                       <input type="radio" id="shipamt" name="shipamt" onClick="setshipVisibility('showship', 'inline');" value="2 @if(is_array(old('shipamt')) && in_array(2, old('shipamt'))) checked @endif"  ><label class="sample">@if (Lang::has(Session::get('admin_lang_file').'.BACK_AMOUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_AMOUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_AMOUNT')}}@endif</label>
                                       <label class="sample"></label>
                                    </div>
                                 </div>
                                 <div class="form-group" id="showship" style="display:none;">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SHIPPING_AMOUNT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SHIPPING_AMOUNT')}}@endif ({{ Helper::cur_sym() }})<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input  placeholder="" value="{{ old('Shipping_Amount') }}"
                                          class="form-control" type="text" maxlength="10" id="Shipping_Amount" name="Shipping_Amount">
                                       <div id="ship_amt_error_msg"  style="color:#F00;font-weight:800"> </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_START_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_START_DATE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_START_DATE')}} @endif<span class="text-sub">*</span></label>
                                    <div class='col-sm-4 input-group date' id='dtpickerdemo1'>
                                       <input type="text" id="startdate" name="startdate"   class="form-control" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_START_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_START_DATE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_START_DATE')}} @endif" />
                                       <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar"></span>
                                       </span>
                                    </div>
                                    <div id="start_date_error_msg"  style="color:#F00;font-weight:800"> </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_END_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_END_DATE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_END_DATE')}} @endif<span class="text-sub">*</span></label>
                                    <div class='col-sm-4 input-group date' id='dtpickerdemo'>
                                       <input type="text" id="enddate" name="enddate"  class="form-control" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_END_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_END_DATE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_END_DATE')}} @endif" />
                                       <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar"></span>
                                       </span>
                                    </div>
                                 </div>
                                 <div id="end_date_error_msg"  style="color:#F00;font-weight:800"> </div>
                                 <?php /*
                                    <div class="form-group">
                                                  <label for="text1" class="control-label col-lg-2">Deal Expiry Date<span class="text-sub">*</span></label>
                                    
                                                  <div class="col-lg-3" >
                                                      <div id="datetimepicker3" class=" date input-group">
                                                      <input data-format="yyyy-MM-dd hh:mm:ss"  type="text" id="expirydate" name="expirydate" class="form-control"></input>
                                                      <span class="add-on input-group-addon">
                                                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                                      </span>
                                                    </div>
                                    
                                                  </div>
                                              </div> */ ?>
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DESCRIPTION')}} @endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <textarea id="wysihtml5" name="description" class="wysihtml5 form-control" rows="10" placeholder="Enter Description {{ $default_lang }}">{{ old('description') }}</textarea>
                                       <div id="desc_error_msg"  style="color:#F00;font-weight:800"> </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELIVERY_DAYS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DELIVERY_DAYS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELIVERY_DAYS')}}  @endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input type="text" value="{{ old('Delivery_Days') }}"
                                          class="form-control" placeholder="" id="Delivery_Days" maxlength="3" name="Delivery_Days" onKeyPress="return onlyNumbers(this);"> Days
                                    </div>
                                    <div id="delivery_error_msg"  style="color:#F00;font-weight:800"> </div>
                                 </div>
                                
                                    @if(!empty($get_active_lang)) 
                                    @foreach($get_active_lang as $get_lang) 
                                    <?php 
                                     $get_lang_name = $get_lang->lang_name;
                                    ?>
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">Description({{ $get_lang_name }})<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <textarea id="wysihtml5" name="description_{{  $get_lang_name }}" class="wysihtml5 form-control description_<?php echo $get_lang_name; ?>" rows="10"  placeholder="Enter Page Title In {{ $get_lang_name }}" >{{ old('description_'.$get_lang_name) }}</textarea>
                                       <div id="desc_fr_error_msg"  style="color:#F00;font-weight:800"> </div>
                                    </div>
                                 </div>
                                 @endforeach
                                 @endif
                                 
                                 <input type="hidden" name="exist" id="exist" value="">
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_META_KEYWORDS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_META_KEYWORDS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_META_KEYWORDS')}} @endif<span class="text-sub"></span></label>
                                    <div class="col-lg-8">
                                       <textarea id="metakeyword" name="metakeyword" class="form-control" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_META_KEYWORDS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_META_KEYWORDS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_META_KEYWORDS')}} @endif {{ $default_lang }}">{{ old('metakeyword') }}</textarea>
                                       <div id="meta_key_error_msg"  style="color:#F00;font-weight:800"> </div>
                                    </div>
                                 </div>
                                  
                                    @if(!empty($get_active_lang)) 
                                    @foreach($get_active_lang as $get_lang) 
                                  <?php
                                    $get_lang_name = $get_lang->lang_name;
                                    ?>
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">Meta Keywords({{ $get_lang_name }})<span class="text-sub"></span></label>
                                    <div class="col-lg-8">
                                       <textarea id="metakeyword_<?php echo $get_lang_name; ?>" name="metakeyword_{{ $get_lang_name }}" class="form-control" placeholder="Enter Page Title In {{ $get_lang_name }}" >{{ old('metakeyword_'.$get_lang_name) }}</textarea>
                                       <div id="meta_key_fr_error_msg"  style="color:#F00;font-weight:800"> </div>
                                    </div>
                                 </div>
                                 @endforeach
                                 @endif
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_META_DESCRIPTION')}} @endif<span class="text-sub"></span></label>
                                    <div class="col-lg-8">
                                       <textarea id="metadescription" name="metadescription" class="form-control" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_META_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_META_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_META_DESCRIPTION')}} @endif {{ $default_lang }}">{{ old('metadescription') }}</textarea>
                                       <div id="meta_desc_error_msg"  style="color:#F00;font-weight:800"> </div>
                                    </div>
                                 </div>
                                  
                                    @if(!empty($get_active_lang)) 
                                    @foreach($get_active_lang as $get_lang) 
                                  <?php
                                    $get_lang_name = $get_lang->lang_name;
                                    ?>
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">Meta Description({{$get_lang_name }})<span class="text-sub"></span></label>
                                    <div class="col-lg-8">
                                       <textarea id="metadescription_<?php echo $get_lang_name; ?>" name="metadescription_{{ $get_lang_name}}" class="form-control" placeholder="Enter Page Title In {{ $get_lang_name }}">{{ old('metadescription_'.$get_lang_name) }}</textarea>
                                       <div id="meta_desc_fr_error_msg"  style="color:#F00;font-weight:800"> </div>
                                    </div>
                                 </div>
                                 @endforeach
                                 @endif
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_USER_LIMIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_USER_LIMIT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_LIMIT')}} @endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input id="maxlimit" name="maxlimit" value="{{ old('maxlimit') }}" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY')}} @endif" class="form-control" type="text" maxlength="5">
                                       <div id="max_deal_error_msg"  style="color:#F00;font-weight:800"> </div>
                                    </div>
                                 </div>
                                 <?php /*?> 
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">Deal Purchase Limit Per Customer<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input id="purchaselimit" name="purchaselimit" placeholder="Numbers Only" class="form-control" type="text">
                                    </div>
                                 </div>
                                 <?php */?>
                                 <?php /*  Product Policy details */ ?>
                                 {{-- Cancel Policy starts --}}
                                 <div class="form-group"  >
                                    <label for="text2"  class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_APPLY_CANCEL')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_APPLY_CANCEL')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_APPLY_CANCEL')}} @endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input type="radio" id="allow_cancel" name="allow_cancel"  value="1" onClick="setPolicyDisplay('cancel_tab', 'block')"> <label class="sample"  >@if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_YES')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_YES')}}@endif</label>
                                       <input type="radio" id="notallow_cancel" name="allow_cancel"  value="0" checked  onclick="setPolicyDisplay('cancel_tab', 'none')"><label class="sample">@if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NO')}}  @else {@endiftrans($ADMIN_OUR_LANGUAGE.'.BACK_NO')}} @endif</label>
                                       <label class="sample"></label>
                                    </div>
                                 </div>
                                 <div id="cancel_tab" style="display:none;">
                                    <div class="form-group">
                                       <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_DESCRIPTION')}}@endif <span class="text-sub">*</span></label>
                                       <div class="col-lg-8" id="description">
                                          <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="cancellation_policy" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_CANCEL_DESCRIPTION')}} @endif">{{ old('cancellation_policy') }}</textarea>
                                          <div id="cancellation_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                                       </div>
                                    </div>
                                    @if(!empty($get_active_lang)) 
                                    @foreach($get_active_lang as $get_lang) 
                                    <?php   $get_lang_name = $get_lang->lang_name;
                                       ?>
                                    <div class="form-group">
                                       <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CANCEL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL_DESCRIPTION')}} @endif ({{ $get_lang_name }}) <span class="text-sub">*</span></label>
                                       <div class="col-lg-8" id="description">
                                          <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="cancellation_policy_{{$get_lang_name}}" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_CANCEL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_CANCEL_DESCRIPTION')}} @endif">{{ old('cancellation_policy_'.$get_lang_name) }}</textarea>
                                          <div id="cancellation_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                                       </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    <div class="form-group">
                                       <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>
                                       <div class="col-lg-8">
                                          <label for="text1" class="control-label ">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_CANCEL_DESCRIPTION')}} @endif<span class="text-sub"></span></label>     
                                          <input placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS_CANCEL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_CANCEL_DESCRIPTION')}} @endif"  class="form-control" type="text"  id="cancellation_days" name="cancellation_days" value="{{ old('cancellation_days') }}" maxlength="3">
                                          <div id="cancellation_days_error_msg"  style="color:#F00;font-weight:800"> </div>
                                       </div>
                                    </div>
                                 </div>
                                 {{-- Cancel Policy ends --}}
                                 {{-- REturn Policy starts --}}
                                 <div class="form-group"  >
                                    <label for="text2"  class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_APPLY_RETURN')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_APPLY_RETURN')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_APPLY_RETURN')}}@endif<span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input type="radio" id="allow_return" name="allow_return"  value="1" onclick="setPolicyDisplay('return_tab', 'block')" > <label class="sample">@if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_YES')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_YES')}} @endif</label>
                                       <input type="radio" id="notallow_return" name="allow_return"  value="0" checked onclick="setPolicyDisplay('return_tab', 'none')" ><label class="sample">@if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NO')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NO')}}@endif</label>
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
                                    @if(!empty($get_active_lang))
                                    @foreach($get_active_lang as $get_lang) 
                                    <?php   $get_lang_name = $get_lang->lang_name;
                                       ?>
                                    <div class="form-group">
                                       <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_RETURN_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RETURN_DESCRIPTION')}}  @endif({{ $get_lang_name }}) <span class="text-sub">*</span></label>
                                       <div class="col-lg-8" id="description">
                                          <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="return_policy_{{$get_lang_name}}" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_RETURN_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_RETURN_DESCRIPTION')}}  @endif">{{ old('return_policy_'.$get_lang_name) }}</textarea>
                                          <div id="return_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                                       </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    <div class="form-group">
                                       <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>
                                       <div class="col-lg-8">
                                          <label for="text1" class="control-label">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_RETURN_DESCRIPTION')}}  @endif<span class="text-sub"></span></label>
                                          <input placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS_RETURN_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_RETURN_DESCRIPTION')}} @endif"  class="form-control" type="type"  id="return_days" name="return_days" value="{{ old('return_days') }}" maxlength="3">
                                          <div id="return_days_error_msg"  style="color:#F00;font-weight:800"> </div>
                                       </div>
                                    </div>
                                 </div>
                                 {{-- REturn Policy ends --}}
                                 {{-- Replacement Policy starts --}}
                                 <div class="form-group"  >
                                    <label for="text2"  class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_APPLY_REPLACEMENT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_APPLY_REPLACEMENT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_APPLY_REPLACEMENT')}}  @endif <span class="text-sub">*</span></label>
                                    <div class="col-lg-8">
                                       <input type="radio" id="allow_replace" name="allow_replace"  value="1" onclick="setPolicyDisplay('replace_tab', 'block')"  > <label class="sample">@if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_YES')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_YES')}} @endif</label>
                                       <input type="radio" id="notallow_replace" name="allow_replace"  value="0" checked  onclick="setPolicyDisplay('replace_tab', 'none')" ><label class="sample">@if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_NO')}}  @else {{trans($ADMIN_OUR_LANGUAGE.'.BACK_NO')}} @endif</label>
                                       <label class="sample"></label>
                                    </div>
                                 </div>
                                 <div id="replace_tab" style="display:none;">
                                    <div class="form-group">
                                       <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_REPLACE_DESCRIPTION')}}  @endif<span class="text-sub">*</span></label>
                                       <div class="col-lg-8" id="description">
                                          <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="replacement_policy" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_REPLACE_DESCRIPTION')}}  @endif">{{ old('replacement_policy') }}</textarea>
                                          <div id="replacement_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                                       </div>
                                    </div>
                                    
                                       @if(!empty($get_active_lang)) 
                                       @foreach($get_active_lang as $get_lang)
                                      <?php 
                                       $get_lang_name = $get_lang->lang_name;
                                       ?>
                                    <div class="form-group">
                                       <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_REPLACE_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_REPLACE_DESCRIPTION')}}  @endif({{ $get_lang_name }})<span class="text-sub">*</span></label>
                                       <div class="col-lg-8" id="description">
                                          <textarea id="wysihtml5" class="wysihtml5 form-control" rows="10"  name="replacement_policy_{{$get_lang_name}}" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_REPLACE_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_REPLACE_DESCRIPTION')}} @endif">{{ old('replacement_policy_'.$get_lang_name) }}</textarea>
                                          <div id="replacement_policy_error_msg"  style="color:#F00;font-weight:800"> </div>
                                       </div>
                                    </div>
                                    @endforeach
                                    @endif  
                                    <div class="form-group">
                                       <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>
                                       <div class="col-lg-8">
                                          <label for="text1" class="control-label ">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_REPLACE_DESCRIPTION')}}  @endif<span class="text-sub"></span></label><br>
                                          <input placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DAYS_REPLACE_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS_REPLACE_DESCRIPTION')}}  @endif"  class="form-control" type="text"  id="replace_days" name="replace_days" value="{{ old('Replace_days') }}" maxlength="3">
                                          <div id="replace_days_error_msg"  style="color:#F00;font-weight:800"> </div>
                                       </div>
                                    </div>
                                 </div>
                                 {{-- Replacement Policy ends --}}
                                 <?php /*  Product Policy details ends */ ?>
                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_IMAGE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEAL_IMAGE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_IMAGE')}} @endif<span class="text-sub">*</span><br><span  style="color:#999">(@if (Lang::has(Session::get('admin_lang_file').'.BACK_MAX')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MAX')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MAX')}}  @endif 5)</span></label>
                                    <span class="errortext red" style="color:red;"><em>@if (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_IMAGE_SIZE_MUST_BE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_SIZE_MUST_BE')}}  @endif <?php echo $DEAL_WIDTH;?> x <?php echo $DEAL_HEIGHT;?> @if (Lang::has(Session::get('admin_lang_file').'.BACK_PIXELS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PIXELS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PIXELS')}} @endif</em></span>
                                    <div class="col-lg-8" id="img_upload">
                                       <div style="display: block; overflow: hidden;">
                                          <input type="file" name="file[]" id="fileUpload1" value="{{ old('file') }}" onchange="imageval(1)"  required />
                                          <a href="javascript:void(0);"  title="Add field" class="chose-file-add" ><span id="add_button" style="cursor:pointer;width:84px;">@if (Lang::has(Session::get('admin_lang_file').'.BACK_S_ADD')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_S_ADD')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_S_ADD')}}  @endif</span></a>
                                       </div>
                                    </div>
                                    <input type="hidden" id="count" name="count" value="1">
                                    <div id="img_error_msg"  style="color:#F00;font-weight:800"></div>
                                 </div>
                                 <div class="form-group">
                                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>
                                    <div class="col-lg-8">
                                       <button class="btn btn-warning btn-sm btn-grad" id="submit_deal" ><a style="color:#fff"  ><?php echo $button; ?></a></button>
                                       <button class="btn btn-danger btn-sm btn-grad" type="reset" ><a style="color:#ffffff">@if (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RESET')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET')}}  @endif</a></button>
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
            {{-- policy starts --}}
            <script type="text/javascript">
               function setPolicyDisplay(id, displayOption) 
               {
                   $("#"+id).css('display',displayOption);
               } 
            </script>
            {{-- policy ends --}}
            <script type='text/javascript'>
               $(document).ready(function(){
                  var maxField = 5; //Input fields increment limitation
                  var addButton = $('#add_button'); //Add button selector
                  var wrapper = $('#img_upload'); //Input field wrapper //div
               
                  var x = 1; //Initial field counter is 1
                  $(addButton).click(function(){ //Once add button is clicked
                      if(x < maxField){ //Check maximum number of input fields
                    x++; //Increment field counter
                  var fieldHTML = '<div style="display:block; width:auto; margin-top:15px;"><input type="file" name="file[]" id="fileUpload'+x+'" onchange="imageval('+x+')"  value="" required/><div id="remove_button"><a href="javascript:void(0);"  title="Remove field" style="color:#ffffff;">Remove</a></div></div>'; //New input field html 
                          
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
               
              
               
               function check(){
               
                 
                  var title    = $('#title').val();
                 
                  var passdata = "&title="+title;
                  $.ajax( {
                        type: 'get',
                      data: passdata,
                      url: 'check_title_exist',
                      success: function(responseText){  
                       
                       if(responseText==1){  //already exist
                        alert("This Deal Title Already Exist ");
                        $("#exist").val("1"); //already exist
                        $("#title").css('border', '1px solid red'); 
                       $('#title_error_msg').html("This Product Title Already Exist "); 
                        $("#title").focus();
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
                 
                  var lang_code = "<?php echo $get_lang_code; ?>"; 
                  var title    = $('#title_<?php echo $get_lang_name; ?>').val();
                  var passdata = "&title="+title+"&lang_code="+lang_code;
                  $.ajax( {
                        type: 'get',
                      data: passdata,
                      url: 'check_title_exist_dynamic',
                      success: function(responseText){  
                       //alert(responseText);
                       if(responseText==1){  //already exist
                        alert("This Deal Title Already Exist ");
                        $("#exist").val("1"); //already exist
                        $("#title_<?php echo $get_lang_name; ?>").css('border', '1px solid red'); 
                        $('#title_fr_error_msg').html("This Product Title Already Exist ");  
                        $("#title_<?php echo $get_lang_name; ?>").focus();
                        return false;          
                       }else if(responseText==0){
                        $("#exist").val("0");
                       }
                    }   
                  }); 
                   }
                <?php } } ?>
               
              /*Product Shipping Amount*/
               var shippingamt      = $('#Shipping_Amount');
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
               function setshipVisibility(id, visibility) 
               {
               document.getElementById(id).style.display = visibility;
               
               }
               
               function imageval(i){  /*Image size validation*/
                
               //var img_count = $("#count").val();
                //Get reference of FileUpload.
                   //alert(i);
               // var i;
               //for (i = 0; i <=img_count; i++) {
                    var fileUpload = document.getElementById("fileUpload"+i);
               //}
               
               //Check whether the file is valid Image.
                  var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.gif)$");
                  fix_width   = Number(<?php echo $DEAL_WIDTH;?>);
                  fix_height  = Number(<?php echo $DEAL_HEIGHT;?>);
               
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
                                  if (width != fix_width || height != fix_height) {
                                      alert("Image Height and Width should have "+fix_width +" * "+fix_height +" px.");
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
                          //return false;
                      }
                  } else {
                      //alert("Please select a valid Image file.");
                     // return false;
                  }
               }
                $( document ).ready(function() {
                  
                var title        = $('#title');
                var title_fr     = $('#title_fr');
                      var category     = $('#category');
                   var maincategory    = $('#maincategory');
                var subcategory    = $('#subcategory');
                var secondsubcategory= $('#secondsubcategory');
                var originalprice    = $('#originalprice');
                var discountprice    = $('#discountprice');
                var startdate      = $('#startdate');
                var enddate      = $('#enddate');
                var expirydate     = $('#expirydate');
                var wysihtml5      = $('#wysihtml5');
              
                var metakeyword    = $('#metakeyword');
                var metakeyword_fr   = $('#metakeyword_fr');
                var metadescription  = $('#metadescription');
                var metadescription_fr   = $('#metadescription_fr');
                var shippingamt      = $('#Shipping_Amount');
                var maxlimit     = $('#maxlimit');
                var inctax       = $('#inctax');
                var purchaselimit  = $('#purchaselimit');
                var fileUpload1    = $('#fileUpload1');
                var shipamtchecked   = $('input:radio[name=shipamt]:checked').val();
                  var delivery_days    = $('#Delivery_Days');
               
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
                    $('#org_price_error_msg').html('@if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY')}}  @endif');
                    originalprice.focus();
                    return false;
                      }else{      
                          originalprice.css('border', ''); 
                    $('#org_price_error_msg').html('');         
                  }
                    });
               
               
                
                        /*Deal Discount Price*/
                  $('#discountprice').keypress(function (e){
                      if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
                          discountprice.css('border', '1px solid red'); 
                    $('#dis_price_error_msg').html('@if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY')}}  @endif');
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
                    $('#tax_error_msg').html('@if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY')}} @endif');
                    inctax.focus();
                    return false;
                      }else{      
                          inctax.css('border', ''); 
                    $('#tax_error_msg').html('');         
                  }
                    });
               
               /*shipping amount*/
                    $('#Shipping_Amount').keypress(function (e){
                      if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
                          Shipping_Amount.css('border', '1px solid red'); 
                    $('#Shipping_Amount_error_msg').html('@if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY')}}  @endif');
                    Shipping_Amount.focus();
                    return false;
                      }else{      
                          Shipping_Amount.css('border', ''); 
                    $('#Shipping_Amount_error_msg').html('');         
                  }
                    });
               
                    /*Delivery Days*/
                $('#Delivery_Days').keyup(function() { 
                  if (this.value.match(/[^0-9-()\s]/g)){ 
                  this.value = this.value.replace(/[^0-9-()\s]/g, ''); 
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
                  
                var startdate_val  = $('#startdate').val();
                var enddate_val    = $('#enddate').val();
                 
                // if ((Date.parse(startdate.val()) >= Date.parse(enddate.val()))) {
                
               
                //description_fr;
                //var datas = $("input[name='description_fr']").val();
                //alert(datas);
                
                if($.trim(title.val()) == "")
                {
                  title.css('border', '1px solid red'); 
                  $('#title_error_msg').html('Please Enter Title in English');
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
                
                /* $("input[type='checkbox'][name='intax']").change(function() {
                  if(inctax.val()==""){
                    inctax.css('border', '1px solid red'); 
                    $('#tax_error_msg').html('Please Provide Tax Percentage');
                    inctax.focus();
                    return false;
                  }else{
                    inctax.css('border', ''); 
                    $('#tax_error_msg').html('');
                  }
                } */
                
               
                  /*Tax Amount*/
                  if ($('#taxchk').is(":checked"))
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
                  var shipamt_checked   = $('input:radio[name=shipamt]:checked').val();
                if(shipamt_checked==2){ 
                  if(shippingamt.val()==""){
                    shippingamt.css('border', '1px solid red'); 
                    $('#ship_amt_error_msg').html('Please Provide Shipping Amount');
                    shippingamt.focus();
                    return false;
                  }else{
                    shippingamt.css('border', ''); 
                    $('#ship_amt_error_msg').html('');
                  }
                }else if(shipamt_checked==1){
                    shippingamt.css('border', ''); 
                    $('#ship_amt_error_msg').html('');
                }
               
                if(startdate.val() == '')
                {
                  startdate.css('border', '1px solid red'); 
                  $('#start_date_error_msg').html('Please Select Start Date');
                  startdate.focus();
                  return false;
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
                
                if(expirydate.val() == '')
                {
                  expirydate.css('border', '1px solid red'); 
                  $('#expiry_date_error_msg').html('Please Select Expiry Date');
                  expirydate.focus();
                  return false;
                }
                else if(expirydate.val() < enddate.val() )
                {
                  expirydate.css('border', '1px solid red'); 
                  $('#expiry_date_error_msg').html('Expiry Date sholud be greater than start date');
                  expirydate.focus();
                  return false;
                }
                      else
                      {
                      expirydate.css('border', ''); 
                      $('#expiry_date_error_msg').html('');
                      }
                
                
                /*Description*/
                if($.trim(wysihtml5.val()) == ''){
                  wysihtml5.css('border', '1px solid red');  
                  $('#desc_error_msg').html('Please Enter Description in English');
                  wysihtml5.focus();
                  return false;
                }else{
                  wysihtml5.css('border', ''); 
                  $('#desc_error_msg').html('');
                      }
                
                <?php 
                  if(!empty($get_active_lang)) { 
                  foreach($get_active_lang as $get_lang) {
                  $get_lang_name = $get_lang->lang_name;
                  ?>
                /*Description in french*/
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
                
                /* if($.trim(wysihtml5.val()) == ''){
                  wysihtml5.css('border', '1px solid red'); 
                  $('#desc_fr_error_msg').html('Please Enter Description in French');
                  wysihtml5.focus();
                  return false;
                }else{
                  wysihtml5.css('border', ''); 
                  $('#desc_fr_error_msg').html('');
                      } */
               
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
                             
               
                /*Deal title check*/
                if(($('#exist').val())==""){
                  $('#title_error_msg').html('Please Enter Different Deal Title, This Already Exist in this Store');
                  title.css('border', '1px solid red'); 
                  title.focus();
                  return false;
                }else if(($('#exist').val())==1){
                  $('#title_error_msg').html('Please Enter Different Deal Title, This Already Exist in this Store');
                  title.css('border', '1px solid red'); 
                  title.focus();
                  return false;
                }else{
                  title.css('border', ''); 
                  $('#title_error_msg').html('');
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
                      }*/
                
                /*if(minlimt.val() == 0)
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
                
                
                
                <?php /*?>if(purchaselimit.val() == 0)
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
                      }<?php */?>
               
                /*Deal Image*/
                  var ext = $('#fileUpload1').val().split('.').pop().toLowerCase();
                  var allow = new Array('png','jpg','jpeg','png');
                  var valid = false;
                  for(var x = 0; x < allow.length; x++) {
                        if(allow[x] == ext) {
                            valid = true;
                            break;
                        }
                  }
               
                var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
                      if(file.val() == ""){
                    file.focus();
                  file.css('border', '1px solid red'); 
                  $('#img_error_msg').html('Please choose image');
                  return false;
                }else if($.inArray($('#fileUpload1').val().split('.').pop().toLowerCase(), fileExtension) == -1) {        
                  file.focus();
                  file.css('border', '1px solid red'); 
                  $('#img_error_msg').html('Please choose valid image');
                  return false;
                }else{
                  file.css('border', ''); 
                  $('#img_error_msg').html('');       
                } 
               
               
                    
               });
               /*
                  var maxField = 5; 
                  var addButton = $('#add_img_btn'); 
                  var wrapper = $('#img_upload'); 
                  var fieldHTML = '<div><input type="file" id="file" name="file[]" value="" required/><div id="remove_button"><a href="javascript:void(0);"  title="Remove field" class="btn btn-xs btn-info"><span class="">Remove</span></a></div></div>'; 
                  var x = 1;
                  $(addButton).click(function(){ 
                      if(x < maxField){ 
                          x++; 
                          $(wrapper).append(fieldHTML); 
                          
                      }
                else if(x == maxField)
                {
                  alert("You can add maximum 5 images");
                }
                
                  });
               
                  $(wrapper).on('click', '#remove_button', function(e){ 
                      e.preventDefault();
                      $(this).parent('div').remove(); 
                      x--; 
                    
                  });*/
               
               
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
            <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
            <!-- END GLOBAL SCRIPTS -->
            <script src="{{ url('') }}/public/assets/js/bootstrap-datetimepicker.min.js"></script>
            <!-- New Date picker-->
            <script src="{{ url('') }}/public/assets/js/moment-with-locales.js"></script>
            <script src="{{ url('') }}/public/assets/js/bootstrap-datetimepicker.js"></script>
            <!-- New Date picker-->
            <script type="text/javascript">
               $(function () {
                          $('#dtpickerdemo').datetimepicker({
                      minDate:new Date()
                  });
                      });
               
               $(function () {
                          $('#dtpickerdemo1').datetimepicker({
                      minDate:new Date()
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
            <script type="text/javascript">
               $(document).ready(function () {
                    
               
               
               
               });
            </script>
            <script>
               // $(function () { formWysiwyg(); });
               $(document).ready(function () {
               $('.wysihtml5').wysihtml5();
               
               $('.wysihtml5').wysihtml5({
               "events": { "focus": function() { 
               
               $('#datetimepicker1').hide(); 
               }, 
               "paste": function()}
               });
               
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