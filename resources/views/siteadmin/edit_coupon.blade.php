<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_COUPON') }}</title>
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
     <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
    <!--END GLOBAL STYLES -->

     <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
	@php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif 
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
                                <li class="active"><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_COUPON')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_COUPON') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_COUPON')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_COUPON') }}</h5>
            
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

        <?php $pro_name = ''; ?>
        @if(count($get_product_detail) > 0)
        @foreach($get_product_detail as $product_name)
          <?php  $pro_name = $product_name->pro_title; ?>
         @endforeach
            @endif
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'edit_coupon_submit','class'=>'form-horizontal')) !!}
				 @foreach($coupon_details as $coupon_det)
                 <div class="form-group">
				 
				 {{ Form::label('','',['class' => 'control-label col-lg-2']) }} 
                     
                     <div class="col-lg-8">
					 {{ Form::hidden('coupon_id',$coupon_det->id,['class' => 'form-control']) }}
                     
                     </div>
                    </div>
                
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_CODE')!= '')   ?  trans(Session::get('admin_lang_file').'.BACK_COUPON_CODE')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_CODE')}}<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
					{{ Form::text('coupon_code',$coupon_det->coupon_code,['class' => 'form-control','id' => 'pwbx','readonly']) }}
                    

                    <button OnClick="GetRandom()" type="button" style="display: none;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_GENERATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_GENERATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_GENERATE') }}</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_NAME')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_COUPON_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
					{{ Form::text('coupon_name',$coupon_det->coupon_name,['id' => 'coupon_name', 'class' => 'form-control','maxlength' => '100','readonly']) }}
                          
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TYPE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TYPE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_TYPE') }}<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
                        

                          @if($coupon_det->type == '1')
							  {{ Form::text('type','Flat',[ 'class' => 'form-control','readonly']) }}
							  {{ Form::hidden('type','1',[ 'class' => 'form-control','readonly']) }}
                            
                            
                          @elseif($coupon_det->type == '2')
						    {{ Form::text('','Percentage',[ 'class' => 'form-control']) }}
						    {{ Form::hidden('type','2',[ 'class' => 'form-control']) }}
                            
                            
                          @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_VALUE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_VALUE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_VALUE') }}<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
				   {{ Form::text('value',$coupon_det->value,['id' => 'percentage', 'class' => 'form-control','readonly']) }}
                         
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_START_DATE')!= '')   ?  trans(Session::get('admin_lang_file').'.BACK_START_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_START_DATE') }}<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
                         {{ Form::text('start_date',$coupon_det->start_date,['id' => 'date_foo', 'class' => 'form-control']) }}

                         
                    </div>

                </div>

                 <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_END_DATE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_END_DATE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_END_DATE') }}<span class="text-sub">*</span></label>
                    
                   <div class="col-lg-8">
				   {{ Form::hidden('',date('Y-m-d'),['id' => 'current_date']) }}
                         
                         <input type="hidden" name="" id="current_date_plus_one" value="<?php echo date('Y-m-d H:m', strtotime("+1 day"));?>">
                         <input id="date_end" name="end_date" placeholder="" class="form-control" value="{!!$coupon_det->end_date!!}" onchange="myFunction(this.value,document.getElementById('current_date').value,document.getElementById('current_date_plus_one').value)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TERMS_CONDITIONS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TERMS_CONDITIONS')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_TERMS_CONDITIONS') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                     <div id="" >
                                    <div class="tab-pane fade active in" >
									{{ Form::textarea('terms',$coupon_det->terms,['id' => 'wysihtml5',  'class' => 'form-control', 'rows' => '10']) }}
                     
                     </div>
                     </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TYPE_OF_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TYPE_OF_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TYPE_OF_COUPON')}}<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
                        @if($coupon_det->type_of_coupon == 1)
                        <input type="radio" name="type_of_coupon" value="1" id="catCheck" checked disabled='disabled'> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_COUPON')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_COUPON') }}&nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="hidden" name="type_of_coupon" value="1" id="catCheck" checked>

                        <input type="radio" name="type_of_coupon" value="2" id="userCheck" disabled='disabled'> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_COUPON')}}&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="type_of_coupon" value="3" id="userCheckByCity" disabled='disabled'> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER_COUPON_BY_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER_COUPON_BY_CITY')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_COUPON_BY_CITY') }}&nbsp;&nbsp;&nbsp;&nbsp;
                        @elseif($coupon_det->type_of_coupon == 2)
                             <input type="radio" name="type_of_coupon" value="1" id="catCheck" disabled='disabled'> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_COUPON')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_COUPON') }}&nbsp;&nbsp;&nbsp;&nbsp;
                       
                            <input type="radio" name="type_of_coupon" value="2" id="userCheck" checked disabled='disabled'> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_COUPON')}} &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="hidden" name="type_of_coupon" value="2" id="userCheck" checked>
							<input type="radio" name="type_of_coupon" value="3" id="userCheckByCity" disabled='disabled'> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER_COUPON_BY_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER_COUPON_BY_CITY')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_COUPON_BY_CITY') }}&nbsp;&nbsp;&nbsp;&nbsp;
						@elseif($coupon_det->type_of_coupon == 3)
                             <input type="radio" name="type_of_coupon" value="1" id="catCheck" disabled='disabled'> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_COUPON')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_COUPON') }} &nbsp;&nbsp;&nbsp;&nbsp;
                       
                            <input type="radio" name="type_of_coupon" value="2" id="userCheck" disabled='disabled'>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_COUPON')}}&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="type_of_coupon" value="3" id="userCheckByCity" checked disabled='disabled'> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER_COUPON_BY_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER_COUPON_BY_CITY')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_COUPON_BY_CITY') }} &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="hidden" name="type_of_coupon" value="3" id="userCheckByCity" checked>
                        @endif
                    </div>
                </div>

                @if($coupon_det->type_of_coupon == 1)
            <div id="ifCat" style="display:block">
              <div class="form-group">
                
                 
                 <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
					 {{ Form::text('product',$pro_name,['id' => 'skills', 'class' => 'form-control','autocomplete' => 'off','readonly']) }}
                    
                   </div>
              </div>  
              <div class="form-group">
                <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_PER_PRODUCT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COUPON_PER_PRODUCT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_PER_PRODUCT')}}<span class="text-sub">*</span><span data-tooltip="Number of coupons for selected product"><i class="glyphicon glyphicon-info-sign"></i></span></label>  
                 <div class="col-lg-8">   
                    <input type="number" name="coupon_per_product" class="form-control" min="1" value="{!!$coupon_det->coupon_per_product!!}" readonly="readonly"><br>
               </div>
               </div>

               <div class="form-group">
                <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_PER_USER')!= '')   ?  trans(Session::get('admin_lang_file').'.BACK_COUPON_PER_USER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_PER_USER') }}<span class="text-sub">*</span><span data-tooltip="Number of coupons available for one user"><i class="glyphicon glyphicon-info-sign"></i></span></label>  
                 <div class="col-lg-8">   
                    <input type="number" name="coupon_per_user" class="form-control" min="1" value="{!!$coupon_det->coupon_per_user!!}" readonly="readonly"><br>
               </div>
               </div>   
              <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_QUANTITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_QUANTITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_QUANTITY') }}<span class="text-sub">*</span><span data-tooltip="Number of products to use coupon"><i class="glyphicon glyphicon-info-sign"></i></span></label> 
                     <div class="col-lg-8">   
                    <input type="number" name="quantity" class="form-control" value="{!!$coupon_det->quantity!!}" min="1" readonly><br>
                    </div>
              </div>
             </div>
             
             <div id="ifUser" style="display:none">
               <div class="form-group">
                 
                
                 
                 <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                    <select class="form-control" name="user[]" multiple >
                       
                        @foreach ($user_det as $row) 
                           <?php  echo '<option value="'.$row->cus_id.'">'.$row->cus_email.'</option>';  ?>
                        @endforeach
                    </select>
                    <p>Press Ctrl + Select</p>
                </div>
                </div>
               </div>
               @elseif($coupon_det->type_of_coupon == 2)
               <div id="ifCat" style="display:none">
               <div class="form-group">
                 
                 <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
					 {{ Form::text('product',$coupon_det->product_id,['id' => 'skills', 'class' => 'form-control','autocomplete' => 'off']) }}
                     <br>
                    </div>
                </div>  
                 <div class="form-group">   
                 <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_QUANTITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_QUANTITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_QUANTITY') }}<span class="text-sub">*</span></label>  
                    <div class="col-lg-8">   
                    <input type="number" name="quantity" class="form-control" min="1"><br>
                    </div>
                 </div>   
               </div>

               <div id="ifUser" style="display:block" class="col-lg-8">
			   <div class="form-group">
                <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CART_TOTAL_AMOUNT')!= '')   ?  trans(Session::get('admin_lang_file').'.BACK_CART_TOTAL_AMOUNT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CART_TOTAL_AMOUNT') }}<span class="text-sub">*</span></label>  
                 <div class="col-lg-8">   
                    <input type="number" name="coupon_tot_cart_amount" class="form-control" min="1" value="{!!$coupon_det->tot_cart_val!!}" readonly><br>
					<input type="hidden" name="coupon_tot_cart_amount" class="form-control" min="1" value="{!!$coupon_det->tot_cart_val!!}" >
                 </div>
               </div>
               <div class="form-group">
                 
                 <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-8">   
                    <select class="form-control" multiple disabled="true">
                        <?php
                        $data = explode(',',$coupon_det->user_id); ?>

                        @foreach ($user_det as $row)  

                            <option value="{!!$row->cus_id!!}" <?php foreach($data as $val) { 
                                $ss = DB::table('nm_customer')->where('cus_id', '=', $val)->first();
                                if($ss->cus_id == $row->cus_id){?> selected <?php } }?> >{!!$row->cus_email!!}</option>
                            
                       @endforeach
                    </select>
                     <select class="form-control" name="user[]" multiple style="display: none;">
                        <?php
                        $data = explode(',',$coupon_det->user_id); ?>

                        @foreach ($user_det as $row)  

                            <option value="{!!$row->cus_id!!}" <?php foreach($data as $val) { 
                                $ss = DB::table('nm_customer')->where('cus_id', '=', $val)->first();
                                if($ss->cus_id == $row->cus_id){?> selected <?php } }?> >{!!$row->cus_email!!}</option>
                            
                      @endforeach
                    </select>
                     <?php
                        

                        // foreach ($user_det as $row) { 
                        //     $data = explode(',',$coupon_det->user_id);
                        //     foreach($data as $val) {
                        //       $ss = DB::table('nm_customer')->where('cus_id', '=', $val)->first();
                                
                        //     }
                        //     echo  $ss->cus_email; 
                        // }

                            ?>


                    <p>Press Ctrl + Select</p>
                    </div>
                </div>
               </div>
			   @elseif($coupon_det->type_of_coupon ==3)
			   <div id="ifUserByCity" style="display:block" class="col-lg-8">
			  @if(count($citydetails)>0)  
			   <div class="form-group">
                 <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CHOOSEN_CITY')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_CHOOSEN_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CHOOSEN_CITY') }} <span class="text-sub">*</span></label>
				 <div class="col-lg-8">  
                  <select class="form-control" name="citywise_user" id="citywise_user" onchange="userlistbycities()" disabled="true">
				  <option value="<?php echo $citydetails[0]->ci_id; ?>" selected> {{ $citydetails[0]->ci_name }}</option>
				  </select>
				  </div>
                </div>
			  @endif
				<div class="form-group">
                <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CART_TOTAL_AMOUNT')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_CART_TOTAL_AMOUNT')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_CART_TOTAL_AMOUNT') }}<span class="text-sub">*</span></label>  
                 <div class="col-lg-8">   
                    <input type="number" name="coupon_tot_cart_amount" class="form-control" min="1" value="{!!$coupon_det->tot_cart_val!!}" readonly><br>
					<input type="hidden" name="coupon_tot_cart_amount" class="form-control" min="1" value="{!!$coupon_det->tot_cart_val!!}" >
                 </div>
               </div>
			    <div class="form-group">
                 <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_USER') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_USER') }}<span class="text-sub">*</span></label>
                  <div class="col-lg-8"> 

                    <select class="form-control" name="user[]" id="user_lst_new" multiple  disabled="true">
                        <?php
						$data = explode(',',$coupon_det->user_id); ?>
						@foreach($user_citywise_det as $row1)  
                            <option value="{!!$row1->cus_id!!}" <?php foreach($data as $val) { 
                                $ss = DB::table('nm_customer')->where('cus_id', '=', $val)->first();
                                if($ss->cus_id == $row1->cus_id){?> selected <?php } }?> >{!!$row1->cus_email!!}</option>
                       @endforeach
                        
                    </select>
					<select class="form-control" name="user[]" id="user_lst_new" multiple  style="display:none;">
                        <?php
						$data = explode(',',$coupon_det->user_id); ?>
						@foreach($user_citywise_det as $row1) 
                            <option value="{!!$row1->cus_id!!}" <?php foreach($data as $val) { 
                                $ss = DB::table('nm_customer')->where('cus_id', '=', $val)->first();
                                if($ss->cus_id == $row1->cus_id){?> selected <?php } }?> >{!!$row1->cus_email!!}</option>
                         @endforeach
                        
                    </select>
                    <p>Press Ctrl + Select</p>
                  </div>
                </div>
			   </div>
               @endif
                <div class="form-group">
				{!! Html::decode(Form::label('','<span  class="text-sub"></span>',['for' => 'pass1', 'class' => 'control-label col-lg-2'])) !!}
                    

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                    <a href="{{ url('manage_coupon') }}" class="btn btn-default btn-sm btn-grad"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CANCEL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL') }}</a>
                    </div>
					  
                </div>
			
               @endforeach
         {!!Form::close()!!}


        
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
     <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
       <script type="text/javascript">

        function yesnoCheck() {
           
           if(document.getElementById('catCheck').checked){
                 document.getElementById('ifCat').style.display = 'block';
             
             document.getElementById('ifUser').style.display = 'none';
            }
             else if(document.getElementById('userCheck').checked){
                 document.getElementById('ifCat').style.display = 'none';
            
             document.getElementById('ifUser').style.display = 'block';
            }
        }

    </script>
    <script type="text/javascript">
            $(function() {
        var availableTags = '<?php echo url('ajax_add_coupon_data'); ?>';

        $("#skills").autocomplete({
            source: availableTags,
            autoFocus:true
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
function myFunction(val,current_date,current_date_plus_one) {
    if(current_date > val || current_date == val){
        alert("you cannot reduce to : " + val);
         document.getElementById('date_end').value = current_date_plus_one;
    }
    
}



$('#date_foo').appendDtpicker({
    "autodateOnStart": true,
    "futureOnly": true
});

$('#date_end').appendDtpicker({
    "autodateOnStart": true,
    "futureOnly": true
});


</script>
<script type="text/javascript">
   function selectSave(t)
{
selected = new Array();
for (var i = 0; i < t.options.length; i++)
selected.push(t.options[i].selected);
return selected;
}

function selectRestore(t,old)
{
selected = new Array();
for (var i = 0; i < old.length; i++)
t.options[i].selected=old[i];
return selected;
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
