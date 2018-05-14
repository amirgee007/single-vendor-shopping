<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- BEGIN HEAD -->

<head>
    <meta charset="UTF-8" />
    <title>
        <?php echo $SITENAME; ?> | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SERVICES');} ?> </title>
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
    <link href="<?php echo url('')?>/public/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css'>
    <link rel='stylesheet prefetch' href='http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel="stylesheet" href="<?php echo url('')?>/public/assets/css/datepicker.css" />
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

<body class="padTop53 ">

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
                            <li class="active"><a><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SERVICES');} ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box dark">
                            <header>
                                <div class="icons"><i class="icon-edit"></i></div>
                                <h5><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SERVICES');} ?></h5>

                            </header>

                            @if (Session::has('message'))
                            <p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
                            @endif
							
							<div class="row">
							<div id="div-1" class="accordion-body collapse in body col-lg-11 panel_marg" style="padding-bottom:10px;">
							
                            
                                {!! Form::open(array('url'=>'add_service_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
								
								
                                <div id="error_msg" style="color:#F00;font-weight:800"> </div>
                                
								
								 <div class="panel panel-default">

                                    <div class="panel-heading"> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SERVICES');} ?> </div>
			 
								<div class="panel-body">
								
								<div class="form-group">
                                    <label for="text1" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_NAME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_NAME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_NAME');} ?><span class="text-sub">*</span></label>

                                    <div class="col-lg-4">
                                        <input id="service_name" placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_SERVICE_NAME')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ENTER_SERVICE_NAME');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_SERVICE_NAME');} ?>" name="service_name" class="form-control" type="text" value="{!!Input::old('service_name')!!}" required>
										 @if ($errors->has('service_name'))
                                <p class="error-block" style="color:red;">{{ $errors->first('service_name') }}</p> @endif
                                    </div>
                                </div>
                                </div>
							   
							   <div class="panel-body">
                                <div class="form-group">
                                    <label for="pass1" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TYPE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TYPE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TYPE');} ?><span class="text-sub"></span></label>

                                    <div class="col-lg-4">
                                        <select class="form-control" id="service_type" name="service_type" >
                                            <option value=""><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_SERVICE_TYPE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_SERVICE_TYPE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_SERVICE_TYPE');} ?></option>
                                            <?php foreach($getservicetypes as $service_type)  { ?>
                                                <option value="<?php echo $service_type->service_type_id; ?>">
                                                    <?php echo $service_type->service_type_name; ?>
                                                </option>
                                                <?php } ?>
                                        </select>
                                        
										<p class="error-block" style="color:red;">
									@if ($errors->has('service_type')) {{ $errors->first('service_type') }} @endif </p>
										
                                    </div>
                                    <label for="text2">  <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SERVICE_TYPE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MORE_CUSTOM_SERVICE_TYPE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MORE_CUSTOM_SERVICE_TYPE');} ?>  <a href="<?php echo url('')?>/manage_service_type"> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD');} ?></a></label>
                                </div></div>
								
								
								<div class="panel-body add-service-time" id="img_upload">
														<div class="form-group">
															<label for="text2" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TIMING')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TIMING');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TIMING');} ?><span class="text-sub">*</span></label>
															<div class="col-lg-4" >
																<input id="service_timing" placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SERVICE_TIMING')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SERVICE_TIMING');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SERVICE_TIMING');} ?>" name="service_timing[]" class="form-control" type="number" value="" required>
															</div>
                                                            <div class="col-lg-3">
																<select class="form-control" name="duration[]" id="duration">
                                                                    <option value="1" @if(old('duration')== '1') selected @endif><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MINUTES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MINUTES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MINUTES');} ?></option>
                                                                    <option value="2" @if(old('duration')== '2') selected @endif><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_HOURS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_HOURS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_HOURS');} ?></option>
                                                                    <option value="3" @if(old('duration')== '3') selected @endif><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DAYS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DAYS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DAYS');} ?></option>
                                                                    <option value="4" @if(old('duration')== '4') selected @endif><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_WEEKS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_WEEKS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_WEEKS');} ?></option>
                                                                    <option value="5" @if(old('duration')== '5') selected @endif><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MONTH')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MONTH');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MONTH');} ?></option>
                                                                    <option value="6" @if(old('duration')== '6') selected @endif><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YEAR')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YEAR');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YEAR');} ?></option>
                                                                </select>
															</div>
														</div>
														
                               
								<div class="form-group">
                                    <label for="text1" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ORIGINAL_PRICE');} ?><span class="text-sub">*</span></label>

                                    <div class="col-lg-4">
                                        <input placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY');} ?>" class="form-control" type="text" id="Original_Price" name="Original_Price[]" value="" required >
										<p class="error-block" style="color:red;">
									@if ($errors->has('Original_Price')) {{ $errors->first('Original_Price') }} @endif </p>
                                    </div>
                                </div>
								
								
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DISCOUNTED_PRICE');} ?><span class="text-sub">*</span></label>

                                    <div class="col-lg-4">
                                        <input placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NUMBERS_ONLY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NUMBERS_ONLY');} ?>" class="form-control" type="text" id="Discounted_Price" name="Discounted_Price[]" value="" required>
										<p class="error-block" style="color:red;">
									@if ($errors->has('Discounted_Price')) {{ $errors->first('Discounted_Price') }} @endif </p>

                                    </div>

                                </div>
                                        <a href="javascript:void(0);"  title="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_FIELD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_FIELD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_FIELD');} ?>"  id="add_button" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-plus" ></span></a>
								</div>
                                
                                <div class="panel-body">
								<div class="form-group">

                                    <label for="text2" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CALENDER_OPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CALENDER_OPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CALENDER_OPTION');} ?><span class="text-sub">*</span></label>

                                    <div class="col-lg-4">
									<label class="sample checkbox-inline" id="chk_radio">
                                        <input type="radio" id="calendar_option" name="calendar_option" onClick="setVisibility('showship2', 'inline');" value="1" @if(old('calendar_option')== '1') checked @endif onchange="setshipVisibility('showship2','block');" required>
                                        <span><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_YES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_YES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_YES');} ?></span></label>
										<label class="sample checkbox-inline" id="chk_radio">
                                        <input type="radio" name="calendar_option" id="calendar_option" onchange="setshipVisibility('showship2','inline');" value="2" @if(old('calendar_option')== '2') checked @endif required>
                                        <span><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_NO')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_NO');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_NO');} ?></span> </label>
                                        
										
											<p class="error-block" style="color:red;">
									@if ($errors->has('calendar_option')) {{ $errors->first('calendar_option') }} @endif </p>
                                    </div>
                                </div></div>
							
                               
								<div class="panel-body">
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_STORE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_STORE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_STORE');} ?><span class="text-sub">*</span></label>

                                    <div class="col-lg-4">
                                        <select class="form-control" id="store_name" name="store_name" required>
                                            <option value="{!!Input::old('store_name')!!}"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_STORE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT_STORE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_STORE');} ?></option>
                                            <?php foreach($getstore as $store)  { ?>
                                                <option value="<?php echo $store->stor_id; ?>">
                                                    <?php echo $store->stor_name; ?>
                                                </option>
                                                <?php } ?>
                                        </select>
										<p class="error-block" style="color:red;">
									@if ($errors->has('store_name')) {{ $errors->first('store_name') }} @endif </p>
                                    </div>
                                </div>
								</div>
								
								<div class="panel-body">
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-3"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_META_KEYWORDS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_META_KEYWORDS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_META_KEYWORDS');} ?><span class="text-sub">*</span></label>

                                    <div class="col-lg-4">
                                        <textarea class="form-control" id="Meta_Keywords" name="Meta_Keywords" placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_KEYWORD')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ENTER_KEYWORD');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_KEYWORD');} ?>" value="{!!Input::old('Meta_Keywords')!!}" required></textarea>
										<p class="error-block" style="color:red;">
									@if ($errors->has('Meta_Keywords')) {{ $errors->first('Meta_Keywords') }} @endif </p>
                                    </div>
                                </div>
								</div>
								
								
							<div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label col-lg-3" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_META_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_META_DESCRIPTION');} ?><span class="text-sub">*</span></label>

                                    <div class="col-lg-4">
                                        <textarea class="form-control" id="Meta_Description" name="Meta_Description" placeholder="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_DESCRIPTION')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ENTER_DESCRIPTION');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_DESCRIPTION');} ?>" value="{!!Input::old('Meta_Description')!!}" required></textarea>
										<p class="error-block" style="color:red;">
									@if ($errors->has('Meta_Description')) {{ $errors->first('Meta_Description') }} @endif </p>
                                    </div>
                                </div>
                            </div>
								
								<div class="panel-body">
                                <div class="form-group">
                                    <label for="pass1" class="control-label col-lg-3"><span class="text-sub"></span></label>

                                    <div class="col-lg-4">
                                        <button class="btn btn-success btn-sm btn-grad" id="submit_product"><a style="color:#fff"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_SERVICES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_SERVICES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_SERVICES');} ?></a></button>
                                        <button type="reset" class="btn btn-default btn-sm btn-grad" style="color:#000"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_RESET');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET');} ?></button>
                                    </div>
                                </div></div>

                            </div>
                            <div class="yourDialog">

                            </div></div>
                            </form></div>
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
    <!-- END GLOBAL SCRIPTS-->

<!--Date Picker-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

    <script>
        (function($) {
            function compareDates(startDate, endDate, format) {
                var temp, dateStart, dateEnd;
                try {
                    dateStart = $.datepicker.parseDate(format, startDate);
                    dateEnd = $.datepicker.parseDate(format, endDate);
                    if (dateEnd < dateStart) {
                        temp = startDate;
                        startDate = endDate;
                        endDate = temp;
                    }
                } catch (ex) {}
                return {
                    start: startDate,
                    end: endDate
                };
            }

            $.fn.dateRangePicker = function(options) {
                options = $.extend({
                    "changeMonth": false,
                    "changeYear": false,
                    "numberOfMonths": 1,
                    "rangeSeparator": " - ",
                    "useHiddenAltFields": false

                }, options || {});

                var myDateRangeTarget = $(this);
                var onSelect = options.onSelect || $.noop;
                var onClose = options.onClose || $.noop;
                var beforeShow = options.beforeShow || $.noop;
                var beforeShowDay = options.beforeShowDay;
                var lastDateRange;

                function storePreviousDateRange(dateText, dateFormat) {
                    var start, end;
                    dateText = dateText.split(options.rangeSeparator);
                    if (dateText.length > 0) {
                        start = $.datepicker.parseDate(dateFormat, dateText[0]);
                        if (dateText.length > 1) {
                            end = $.datepicker.parseDate(dateFormat, dateText[1]);
                        }
                        lastDateRange = {
                            start: start,
                            end: end
                        };
                    } else {
                        lastDateRange = null;
                    }
                }

                options.beforeShow = function(input, inst) {
                    var dateFormat = myDateRangeTarget.datepicker("option", "dateFormat");
                    storePreviousDateRange($(input).val(), dateFormat);
                    beforeShow.apply(myDateRangeTarget, arguments);
                };

                options.beforeShowDay = function(date) {
                    var out = [true, ""],
                        extraOut;
                    if (lastDateRange && lastDateRange.start <= date) {
                        if (lastDateRange.end && date <= lastDateRange.end) {
                            out[1] = "ui-datepicker-range";
                        }
                    }

                    if (beforeShowDay) {
                        extraOut = beforeShowDay.apply(myDateRangeTarget, arguments);
                        out[0] = out[0] && extraOut[0];
                        out[1] = out[1] + " " + extraOut[1];
                        out[2] = extraOut[2];
                    }
                    return out;
                };

                options.onSelect = function(dateText, inst) {
                    var textStart;
                    if (!inst.rangeStart) {
                        inst.inline = true;
                        inst.rangeStart = dateText;
                    } else {
                        inst.inline = false;
                        textStart = inst.rangeStart;
                        if (textStart !== dateText) {
                            var dateFormat = myDateRangeTarget.datepicker("option", "dateFormat");
                            var dateRange = compareDates(textStart, dateText, dateFormat);
                            myDateRangeTarget.val(dateRange.start + options.rangeSeparator + dateRange.end);
                            inst.rangeStart = null;
                            if (options.useHiddenAltFields) {
                                var myToField = myDateRangeTarget.attr("data-to-field");
                                var myFromField = myDateRangeTarget.attr("data-from-field");
                                $("#" + myFromField).val(dateRange.start);
                                $("#" + myToField).val(dateRange.end);
                            }
                        }
                    }
                    onSelect.apply(myDateRangeTarget, arguments);
                };

                options.onClose = function(dateText, inst) {
                    inst.rangeStart = null;
                    inst.inline = false;
                    onClose.apply(myDateRangeTarget, arguments);
                };

                return this.each(function() {
                    if (myDateRangeTarget.is("input")) {
                        myDateRangeTarget.datepicker(options);
                    }
                    myDateRangeTarget.wrap("<div class=\"dateRangeWrapper\"></div>");
                });
            };
        }(jQuery));

        $(document).ready(function() {
            $("#txtDateRange").dateRangePicker({

                showOn: "focus",
                rangeSeparator: " to ",
                dateFormat: "dd-mm-yy",
                useHiddenAltFields: true,
                minDate: 'dateToday',
                constrainInput: true
            });
        });
    </script>
    <script>
        $("#type").click(function() {

            $(".yourDialog").dialog();

        });
    </script>
    <!--text box for Calender-->
    <script language="JavaScript">
        function setshipVisibility(id,visibility) {
			
            var calenter_id = $('input[name="calendar_option"]:checked').val();

            if (calenter_id == 1) {
                document.getElementById(id).style.display = visibility;
                document.getElementById(id1).style.display = visibility;
                document.getElementById(id2).style.display = visibility;
                $('#service_time').attr('required', 'required');
            } else if (calenter_id == 2) {
                document.getElementById(id).style.display = 'none';
                document.getElementById(id1).style.display = 'none';
                document.getElementById(id2).style.display = 'none';
            }
        };
    </script>
	
	<script>
	$(".my_button").click(function(e) {
		
    var date = $('#txtDateRange').val();
	alert(date);
	$.ajax(
	{
	url: "<?php echo URL::to('/'); ?>/add_service_date_ajax",
	type: 'get',
	data: {date:date},			
	success: function(data)
	{ 
		alert(data);
	 //$("#location_ajax").html(data);
		
	   }});
	});
	</script>
	
	<script type="text/javascript">
	   $.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	   });
	</script>
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
				
</body>
<!-- END BODY -->

</html>