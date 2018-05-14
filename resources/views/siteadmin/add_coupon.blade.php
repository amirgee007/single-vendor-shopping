<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_COUPON') }}</title> 
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="public/assets/css/main.css" />
    <link rel="stylesheet" href="public/assets/css/theme.css" />
    <link rel="stylesheet" href="public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
     <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
	@php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif 
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/bootstrap-wysihtml5-hack.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/jquery.simple-dtpicker.css" />
     <style>
                        ul.wysihtml5-toolbar > li {
                            position: relative;
                        }
                    </style>
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
                            	<li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_COUPON') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_COUPON') }}</h5>
            
        </header>
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable">
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
	{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
	{!! Session::get('success') !!}</div>
		@endif
		 @if (Session::has('warning'))
		<div class="alert alert-warning alert-dismissable">
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
	{!! Session::get('warning') !!}</div>
		@endif
		
				
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'add_coupon_submit','class'=>'form-horizontal')) !!}
				
                <div class="form-group">
                    
                <label for="text1" class="control-label col-lg-2"></label>
                   <div class="col-lg-8">
                       
                        <input type="radio" name="type_of_coupon_code" value="1" onclick="javascript:coupontypeCheck();" id="auto" checked> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_AUTO_GENERATE_COUPON_CODE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_AUTO_GENERATE_COUPON_CODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_AUTO_GENERATE_COUPON_CODE') }} &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="type_of_coupon_code" value="2" onclick="javascript:coupontypeCheck();" id="custom"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOM_COUPON_CODE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CUSTOM_COUPON_CODE')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOM_COUPON_CODE') }}&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
                <div id="autocoupon">
                 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_CODE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_COUPON_CODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_CODE') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                        <div class=""> 
						{{ Form::text('auto_coupon_code',Input::old('auto_coupon_code'),['id' => 'pwbx', 'class' => 'form-control','readonly','required']) }}
						</div> 

                        <div style="margin-top: 5px;"> <button class="btn btn-success" OnClick="GetRandom()" type="button">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_GENERATE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_GENERATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_GENERATE')}}</button></div>
                   

                   
                    </div>
                </div>
                </div>
                <div id="customcoupon" style="display:none">
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_CODE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_COUPON_CODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_CODE') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                    <input type="text" name="custom_coupon_code" maxlength="50" id="edValue" class="form-control"  value="{!! Input::old('custom_coupon_code') !!}" onblur="edValueKeyPress()"  />
	
                    </div>
                </div>
                </div><div id="error_msg_coupon_code"  style="color:#F00;font-weight:800"  > </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_NAME')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_COUPON_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('coupon_name',Input::old('coupon_name'),['id' => 'coupon_name', 'class' => 'form-control','maxlength' => '100']) }}
                         
                    </div>
                </div><div id="error_msg_coupon_name"  style="color:#F00;font-weight:800"  > </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TYPE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TYPE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_TYPE') }}<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
                        <select name="type" class="form-control" onchange="myselect()" id="type">
                            <option value="">--Select--</option>
                            <option value="1"<?php if(Input::old('type')==1){  echo "selected";  }?>>
								{{ (Lang::has(Session::get('admin_lang_file').'.BACK_FLAT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_FLAT')   
								: trans($ADMIN_OUR_LANGUAGE.'.BACK_FLAT')}}</option>
                            <option value="2" <?php if(Input::old('type')==2){ echo "selected";}?>>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PERCENTAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PERCENTAGE')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_PERCENTAGE') }}</option>
                        </select>
                         
                    </div>
                </div><div id="error_msg_coupon_type"  style="color:#F00;font-weight:800"  > </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_VALUE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_VALUE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_VALUE') }}<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
				   {{ Form::text('value1',Input::old('value1'),['id' => 'value1', 'class' => 'form-control','maxlength' => '5','onkeypress' => 'return isNumberKey(event)']) }}
				   {{ Form::text('value2',Input::old('value1'),['id' => 'value2', 'class' => 'form-control','maxlength' => '5','onkeypress' => 'return isNumberKey(event)','onchange' => 'handleChange(this)', 'style' => 'display: none']) }}
                         
                          
                    </div>
                </div><div id="error_msg_value"  style="color:#F00;font-weight:800"  > </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_START_DATE')!= '')   ?  trans(Session::get('admin_lang_file').'.BACK_START_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_START_DATE') }}<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
				   {{ Form::text('start_date',old('start_date'),['id' => 'date_foo', 'class' => 'form-control']) }}
                         
                    </div>
                </div>

                 <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_END_DATE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_END_DATE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_END_DATE') }}<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
				   
				   {{ Form::text('end_date',old('end_date'),['id' => 'date_end', 'class' => 'form-control']) }}
				   
                         
                    </div>
                </div><div id="error_msg_date"  style="color:#F00;font-weight:800"  > </div>
                 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TERMS_CONDITIONS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TERMS_CONDITIONS')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_TERMS_CONDITIONS') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                     <div id="" >
                                    <div class="tab-pane fade active in" >
									{{ Form::textarea('terms',Input::old('terms'),['id' => 'wysihtml5',  'class' => 'form-control', 'rows' => '10']) }}
                    
                     </div>
                     </div>
                    </div>
                </div><div id="error_msg_description"  style="color:#F00;font-weight:800"  > </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TYPE_OF_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TYPE_OF_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TYPE_OF_COUPON')}}<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
                       
                        <input type="radio" name="type_of_coupon" value="1" onclick="javascript:yesnoCheck();" id="catCheck"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_COUPON')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_COUPON') }}&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="type_of_coupon" value="2" onclick="javascript:yesnoCheck();" id="userCheck"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_COUPON')}} &nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="type_of_coupon" value="3" onclick="javascript:yesnoCheck();" id="userCheckByCity"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER_COUPON_BY_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER_COUPON_BY_CITY')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_COUPON_BY_CITY') }} &nbsp;&nbsp;&nbsp;&nbsp;
					</div>
                </div><div id="error_msg_type_of_coupon"  style="color:#F00;font-weight:800"  > </div>

     <?php $product_avail=DB::table('nm_product')->where('pro_status', '!=', 2)->get();
           $user_avail=DB::table('nm_customer')->where('cus_status', '=', 0)->get(); 
           $city_avail=DB::table('nm_city')->get(); 

     ?>
               
                        
 <div id="ifCat" style="display:none">
 @if(count($product_avail)>0) 
                <div class="form-group">
               
                 
                 <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT') }}<span class="text-sub">*</span><br><small>Select from autocomplete list</small></label>

                 <div class="col-lg-8">
                {{ Form::text('product',Input::old('product'),['id' => 'skills', 'class' => 'form-control']) }}
                    
                     <span id="product_price"></span>
                     <span id="image"></span>

                   </div>

               </div><div id="error_msg_product"  style="color:#F00;font-weight:800"  > </div>


               <div class="form-group">
                <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_PER_PRODUCT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COUPON_PER_PRODUCT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_PER_PRODUCT')}}<span class="text-sub">*</span><span data-tooltip="Number of coupons for selected product"><i class="glyphicon glyphicon-info-sign"></i></span></label>  
                 <div class="col-lg-8">   
                    <input type="number" maxlength="5" max="999" value="{{ Input::old('coupon_per_product') }}" id="coupon_per_product" name="coupon_per_product" class="form-control" min="1"><br>
               </div>
               </div><div id="error_msg_per_product"  style="color:#F00;font-weight:800"  > </div>


               <div class="form-group">
                <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_PER_USER')!= '')   ?  trans(Session::get('admin_lang_file').'.BACK_COUPON_PER_USER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_PER_USER') }}<span class="text-sub">*</span><span data-tooltip="Number of coupons available for one user"><i class="glyphicon glyphicon-info-sign"></i></span></label>  
                 <div class="col-lg-8">    
                    <input type="number"  max="999" value="{{ old('coupon_per_user') }}" id="coupon_per_user" name="coupon_per_user" class="form-control" min="1"><br>
               </div>
               </div><div id="error_msg_per_user"  style="color:#F00;font-weight:800"  > </div> <div id="error_msg_per_pro"  style="color:#F00;font-weight:800"  > </div>
                <div class="form-group">
                <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_QUANTITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_QUANTITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_QUANTITY') }}<span class="text-sub">*</span><span data-tooltip="Number of products to use coupon"><i class="glyphicon glyphicon-info-sign"></i></span></label>  
                 <div class="col-lg-8">  
				 
                    <input type="number"  max="999" value="{{ old('quantity') }}" id="quantity" name="quantity" class="form-control" min="1"><br>
               </div>
               </div><div id="error_msg_quantity"  style="color:#F00;font-weight:800"  > </div>
 @else {{ "No product available!" }} @endif
</div>
 


 <div id="ifUser" style="display:none">
    
@if(count($user_avail) > 0) 
			   <div class="form-group">
                <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CART_TOTAL_AMOUNT')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_CART_TOTAL_AMOUNT')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_CART_TOTAL_AMOUNT') }}<span class="text-sub">*</span></label>  
                 <div class="col-lg-8">   
                    <input type="number" value="{{ Input::old('coupon_tot_cart_amount_user') }}" id="coupon_tot_cart_amount_user" name="coupon_tot_cart_amount_user" class="form-control" min="1"><br>
                 </div>
               </div><div id="error_msg_cart_amt"  style="color:#F00;font-weight:800"  > </div>
               <div class="form-group">
                 <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_USER') }}<span class="text-sub">*</span></label>
                  <div class="col-lg-8">   
                    <select class="form-control" name="user[]" id="user" multiple>
                        <option value="">Select user</option>
                    </select>
                    
                </div>
                </div><div id="error_msg_user_select"  style="color:#F00;font-weight:800"  > </div>
                @else  {{ "User not avilable!" }} @endif
</div>
<div id="ifUserByCity" style="display:none">
@if(count($city_avail)>0)  
			   <div class="form-group">
                 <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CHOOSE_CITY')!= '')   ?  trans(Session::get('admin_lang_file').'.BACK_CHOOSE_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CHOOSE_CITY') }}<span class="text-sub">*</span></label>
                  <div class="col-lg-8">   
                    <select class="form-control" name="citywise_user" id="citywise_user" onchange="userlistbycities()">
					<option value="">--Select--</option>
                        
                        @foreach ($user_citywise_det as $row1) 
                          <?php  echo '<option value="'.$row1->ci_id.'">'.$row1->ci_name.'</option>'; ?>
                        @endforeach
                        
                    </select>
                  </div>
                </div><div id="error_msg_city"  style="color:#F00;font-weight:800"  > </div>
				
			   <div id="ifUserByCitywiselist" style="display:none">
			   <div class="form-group">
                <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CART_TOTAL_AMOUNT')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_CART_TOTAL_AMOUNT')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_CART_TOTAL_AMOUNT')}} <span class="text-sub">*</span></label>  
                 <div class="col-lg-8">   
                    <input type="number" name="coupon_tot_cart_amount" value="{{ old('coupon_tot_cart_amount') }}" class="form-control" min="1"><br>
                 </div>
               </div><div id="error_msg_tot_cart_amount"  style="color:#F00;font-weight:800"  > </div>
               <div class="form-group">
                 <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER') }}<span class="text-sub">*</span></label>
                  <div class="col-lg-8">   
                    <select class="form-control" name="user[]" id="user_lst_new" multiple >
                        <?php
                       /* foreach ($user_citywise_det as $row1) {
                            echo '<option value="'.$row1->ci_id.'">'.$row1->ci_name.'</option>';
                        }*/
                        ?>
                    </select>
                    
                  </div>
                </div><div id="error_msguser_lst_new"  style="color:#F00;font-weight:800"  > </div>
				</div>
                @else {{ "No city list available!" }} @endif
</div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" onclick="return check_product_valid();" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD') }}</button>
                     <a href="{{ url('manage_coupon') }}" class="btn btn-danger btn-sm btn-grad"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CANCEL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL') }}</a>
                   
                    </div>
					  
                </div>
			
                
         {!!Form::close()!!}


        
       
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
     <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
       <script type="text/javascript">

        function yesnoCheck() {
           
           if(document.getElementById('catCheck').checked){
             document.getElementById('ifCat').style.display = 'block';
             document.getElementById('ifUser').style.display = 'none';
            // document.getElementById('user').required = false;
			 document.getElementById('ifUserByCity').style.display = 'none';
            }
             else if(document.getElementById('userCheck').checked){
                
            document.getElementById('ifCat').style.display = 'none';
			 document.getElementById('ifUserByCity').style.display = 'none';
             document.getElementById('ifUser').style.display = 'block';
            // document.getElementById('user').required = true;
           
			 		var start_date = $("#date_foo").val();
					var end_date = $("#date_end").val();
					
			  $.ajax
				({
                    type: "POST",   
                    url:"<?php echo url('get_user_name_ajax'); ?>",
                    data:{start_date:start_date,end_date:end_date},
                    success:function(response)
					{
						$("#user").html(response);
					}
                });
            }
			else if(document.getElementById('userCheckByCity').checked){
             document.getElementById('ifCat').style.display = 'none';
             document.getElementById('ifUser').style.display = 'none';
           //  document.getElementById('user').required = false;
			 document.getElementById('ifUserByCity').style.display = 'block';
            }
        }
        function coupontypeCheck() {
           
           if(document.getElementById('auto').checked){
                 document.getElementById('autocoupon').style.display = 'block';
             
             document.getElementById('customcoupon').style.display = 'none';
             
            }
             else if(document.getElementById('custom').checked){
                 document.getElementById('autocoupon').style.display = 'none';
            
             document.getElementById('customcoupon').style.display = 'block';
            }
        }
    </script>
    <script type="text/javascript">
        $(function() {
    var availableTags = '<?php echo url('ajax_add_coupon_data'); ?>';

    $("#skills").autocomplete({
        source: availableTags,
		
        autoFocus:true,
        select: function (event, ui) {
        var label = ui.item.label;
        var value = ui.item.value;
		var start_date = $("#date_foo").val();
		var end_date = $("#date_end").val();
		
        $.ajax({
                    type: "POST",   
                    url:"<?php echo url('ajax_product_data'); ?>",
                    data:{'product_name':value,start_date:start_date,end_date:end_date},
                    success:function(response){
                        
                        if(value != '')
                        {  // alert(response);
                            var product_data = jQuery.parseJSON(response);
                            if(product_data.message==1){
                                var product_price = product_data.price;
                                var image = "No_Image_Available.png";
                                if(product_data.image != ''){
                                var image = product_data.image;
                                 }

                                $('#product_price').html('<?php  Helper::cur_sym(); ?> '+product_price);
                                $('#image').html('<img style="width:100px; height:100px;" src="<?php echo url(''); ?>/public/assets/product/' + image + '" />');
                            }else{
                                if(product_data.message==0){
                                    alert('copoun alredy exist this product choose another product');
                                }
                                $("#skills").val('');
                            }
                        }
                        else{
                            $('#product_price').html('');
                            $('#image').html('');
                        }
                    }
                });
        }
            });

        });
    </script>
    <script>
    function GetRandom()
    {
        var myElement = document.getElementById("pwbx")
        myElement.value = randString(10)
    }
    </script>
    <script type="text/javascript">
        function randString(x){
    var s = "";
    while(s.length<x&&x>0){
        var r = Math.random();
        s+= (r<0.1?Math.floor(r*100):String.fromCharCode(Math.floor(r*26) + (r>0.5?97:65)));
    }
    return s;
    }

    </script>
    <!-- END GLOBAL SCRIPTS -->  

     <!-- PAGE LEVEL SCRIPTS -->
     <script src="{{ url('') }}/public/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="{{ url('') }}/public/assets/js/editorInit.js"></script>
     <script src="{{ url('') }}/public/assets/js/jquery.simple-dtpicker.js"></script>
    <script>
        $(function () { formWysiwyg(); });
        </script> 
        <script>
         $('#date_foo').appendDtpicker({
            "autodateOnStart": true,
            "futureOnly": true
        });

        $('#date_end').appendDtpicker({
            "autodateOnStart": true,
            "futureOnly": true
        });

       function myselect(){
            var type = document.getElementById("type").value;

            if(type == 1){
                $('#value1').show();
                $('#value2').hide();
            }
            else if(type == 2){
                $('#value1').hide();
                $('#value2').show();
            }
       }
       function handleChange(input) {
        if (input.value < 0) input.value = 0;
        if (input.value > 99) input.value = 99;
      }
        </script>
        
     
<script>
    function edValueKeyPress()
    {
        var edValue = document.getElementById("edValue").value;
         $.ajax({
                    type: "POST",   
                    url:"<?php echo url('check_coupon_code'); ?>",
                    data:{'coupon_code':edValue},
                    success:function(response){
                       if(response == 'available')
                       {
                        alert('{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_CODE_ALREADY_AVAILABLE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_COUPON_CODE_ALREADY_AVAILABLE')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_CODE_ALREADY_AVAILABLE')}}');
                        $("#edValue").val(null);
                        
                       }
                       else if(response == 'not available')
                       {

                       }
                    }
                });
        
    }
	function userlistbycities() {
		var citywise_user = document.getElementById("citywise_user").value;
		//alert(citywise_user);
		var start_date = $("#date_foo").val();
		var end_date = $("#date_end").val();
		
		
		if(citywise_user=="") {
			alert('{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PLEASE_CHOOSE_CITY_TO_LIST_USERS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PLEASE_CHOOSE_CITY_TO_LIST_USERS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_PLEASE_CHOOSE_CITY_TO_LIST_USERS') }} ');
			$('#ifUserByCitywiselist').hide();
			return false;
		} else {
			$.ajax({
                    type: "POST",   
                    url:"<?php echo url('check_userlist_citywise'); ?>",
                    data:{'user_city_id':citywise_user,start_date:start_date,end_date:end_date},
                    success:function(response){
					   //alert(response);
                       if(response == 'not available')
                       {
						 alert('{{ (Lang::has(Session::get('admin_lang_file').'.BACK_NO_USER_AVAILABLE_IN_CHOOSEN_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_NO_USER_AVAILABLE_IN_CHOOSEN_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NO_USER_AVAILABLE_IN_CHOOSEN_CITY') }}');
						 $('#ifUserByCitywiselist').hide();
                       }
					   else 
                       {
						$('#ifUserByCitywiselist').show();
                        $("#user_lst_new").html(response);
                       }
                    }
                });
		}
	}
</script>

<script type="text/javascript">
function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //alert(charCode);  
    if (charCode > 31 && (charCode < 48 || charCode > 57 ) )
    {
       /*  if(charCode!=46)*/
            return false; 
    }
    
 return true;
  
}
</script>


<script type="text/javascript">
    function check_product_valid(){
        var selValue 			 = $('input[name=type_of_coupon]:checked').val(); 
        var selValue_coupon_code = $('input[name=type_of_coupon_code]:checked').val(); 
		var auto_coupon_code 	 = $('#pwbx').val();
        var custom_coupon_code	 = $('#edValue').val();
        var coupon_name	 		 = $('#coupon_name').val();
        var type	 			 = $('#type').val();
        var value1	 			 = $('#value1').val();
        var value2	 			 = $('#value2').val();
        var coupon_per_product	 = $('#coupon_per_product').val();
        var coupon_per_user	 	 = $('#coupon_per_user').val();
        var date_foo	 		 = $('#date_foo').val();
        var end_date	 		 = $('#date_end').val();
		
		if(selValue_coupon_code=='1')
        {
            if($('#pwbx').val()!=''){
				$('#error_msg_coupon_code').html('');
            } else {
			    $('#error_msg_coupon_code').html('Please enter coupon code');
				return false; }
        }

		if(selValue_coupon_code=='2')
        {
            if($('#edValue').val()!=''){
				$('#error_msg_coupon_code').html('');
            } else {
                $('#error_msg_coupon_code').html('Please enter coupon code');
				return false; }
        } 
		
		if($('#coupon_name').val()=='')
        {
			$('#error_msg_coupon_name').html('Please enter coupon name');
            return false;
        } else {
            $('#error_msg_coupon_name').html('');
        } 
		
		if($('#type').val()=='')
        {
			$('#error_msg_coupon_type').html('Please select coupon type');
            return false;
        } else {
            $('#error_msg_coupon_type').html('');
        } 
		
		 if(type == 1 ){
			if($('#value1').val()=='')
        {
			$('#error_msg_value').html('Please enter value');
            return false;
        } else {
            $('#error_msg_value').html('');
		
			}
		} 
		
		 if(type == 2 ){
			if($('#value2').val()=='')
        {
			$('#error_msg_value').html('Please enter value');
            return false;
        } else {
            $('#error_msg_value').html('');
			
        }
		}
		 
		 
		if(end_date < date_foo)
			{
				$('#error_msg_date').html('End date should be less than start date');
				return false;
			} else {
				$('#error_msg_date').html('');
				
			}
			
		if($('#wysihtml5').val()=='')
        {
			$('#error_msg_description').html('Please enter Description');
            return false;
        } else {
            $('#error_msg_description').html('');
			
        }
			
		if($('input[name=type_of_coupon]:checked').length<=0)
        {
            $('#error_msg_type_of_coupon').html('Please select type of coupon');
            return false;
        } else {
            $('#error_msg_type_of_coupon').html('');
        }
		
		
		if(selValue=='1')
        {
            if($('#skills').val()!='')
			{ 
			$('#error_msg_product').html('');	
			}
            else{
             $('#error_msg_product').html('Please select any product');	
             return false;
			}
			//alert(coupon_per_product);
			if($('#coupon_per_product').val()!='')
			{ 
			$('#error_msg_per_product').html('');	
			}
            else{
             $('#error_msg_per_product').html('Please enter Coupon per Product');	
             return false;
			}
			
			if($('#coupon_per_user').val()!='')
			{ 
			$('#error_msg_per_user').html('');	
			}
            else{
             $('#error_msg_per_user').html('Please enter Coupon per User');	
             return false;
			}
			
			if($('#quantity').val()!='')
			{ 
			$('#error_msg_quantity').html('');	
			}
            else{
             $('#error_msg_quantity').html('Please enter quantity');	
                return false;
			}
			
			if(coupon_per_user > coupon_per_product)
			{
				$('#error_msg_per_pro').html('User should be less than coupon per product');
				return false;
			} else {
				$('#error_msg_per_pro').html('');
			}
			
		} else{
            //  alert($('#user').val());//return false;
            if(selValue=='2'){
                if($('#user').val()!=null){
					$('#error_msg_user_select').html('');	
                }else{
					$('#error_msg_user_select').html('No user selected');  
                    return false;
                }
				
				if($('#coupon_tot_cart_amount_user').val()!=""){  
					$('#error_msg_cart_amt').html('');	
                }else{  
					$('#error_msg_cart_amt').html('Please enter Cart Total Amount'); 
                    return false;
                }
			} 
            else{
               if(selValue=='3'){
	
					if($('#citywise_user').val()!=""){  
						$('#error_msg_city').html('');
					}else{
						$('#error_msg_city').html('Please select city');
						return false;
					}
				
					if($('#user_lst_new').val()!=null){  
						$('#error_msguser_lst_new').html('');	
					}else{ 
						$('#error_msguser_lst_new').html('No user selected'); 
						return false;
					}
            
					if($('#coupon_tot_cart_amount').val()!=""){ 
						$('#error_msg_tot_cart_amount').html('');	
					}else{
						$('#error_msg_tot_cart_amount').html('Please enter Cart Total Amount'); 
						return false;
					}
				}
		   
			}
		}
      /*   if(selValue=='1')
        {
            if($('#skills').val()!='')
			{ 
			$('#error_msg').html('');	
			}
            else{
             $('#error_msg').html('Please select any product');	
                return false;
			}
			
			if($('#coupon_per_product').val()!='')
			{ 
			$('#error_msg').html('');	
			}
            else{
             $('#error_msg').html('Please enter Coupon per Product');	
                return false;
			}
			
			if($('#coupon_per_user').val()!='')
			{ 
			$('#error_msg').html('');	
			}
            else{
             $('#error_msg').html('Please enter Coupon per User');	
                return false;
			}
			
			if($('#quantity').val()!='')
			{ 
			$('#error_msg').html('');	
			}
            else{
             $('#error_msg').html('Please enter quantity');	
                return false;
			}
			
			 if(coupon_per_user > coupon_per_product)
			{
				$('#error_msg').html('User should be less than coupon per product');
				return false;
			} else {
				$('#error_msg').html('');
			} 
			
        }else{
            //  alert($('#user').val());//return false;
            if(selValue=='2'){
                if($('#user').val()!=null){  
                }else{
                    alert('No user selected.');
                    return false;
                }
				
				if($('#coupon_tot_cart_amount_user').val()!=""){  
                }else{
                    alert('Please enter Cart Total Amount');
                    return false;
                }
				
				
            }else{
               if(selValue=='3'){
                if($('#user_lst_new').val()!=null){  
                }else{
                    alert('No user selected.');
                    return false;
                }
            }
			
			if($('#coupon_tot_cart_amount').val()!=""){  
                }else{
                    alert('Please enter Cart Total Amount');
                    return false;
                }
				
			if($('#citywise_user').val()!=""){  
                }else{
                    alert('Please select city');
                    return false;
                }
            }

			
            }
        }  */
    }
</script>



<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    </script>
</body>
     <!-- END BODY -->
</html>
