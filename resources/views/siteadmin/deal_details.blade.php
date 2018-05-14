<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} |@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEAL_DETAILS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_DETAILS')}} @endif</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/main.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/theme.css" />
	  <link rel="stylesheet" href="{{ url('') }}/public/assets/css/plan.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
      @php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('')}}/public/assets/favicon/{{ $fav->imgs_name }}">
@endif		
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
                                <li class="active"><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEAL_DETAILS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_DETAILS')}} @endif</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEAL_DETAILS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_DETAILS')}} @endif</h5>
            
        </header>
         
        @foreach($deal_list as $deals)
		@endforeach
				@php
		$title 		 = $deals->deal_title;
		
         $category_get	 = $deals->deal_category;
	     $maincategory 	 = $deals->deal_main_category;
		 $subcategory 	 = $deals->deal_sub_category;
		 $secondsubcategory = $deals->deal_second_sub_category;
		 $originalprice  = $deals->deal_original_price;
		 $discountprice  = $deals->deal_discount_price;
		 $startdate 	 = $deals->deal_start_date;
		 $enddate 		 = $deals->deal_end_date;
		 $expirydate	 =  $deals->deal_end_date;
		 $description 	 = $deals->deal_description;
		 //$description_fr = $deals->deal_description_fr;
		 
		 $metakeyword	 = $deals->deal_meta_keyword;
     
		 $metadescription= $deals->deal_meta_description;
		
		 $minlimt		 = $deals->deal_min_limit;
		 $maxlimit		 = $deals->deal_max_limit;
		 $purchaselimit	 = $deals->deal_purchase_limit;
		 $file_get		     = $deals->deal_image;
		
		 $file_get_path =  explode("/**/",$file_get,-1); 
		 $img_count =  count($file_get_path); 
		@endphp
        <div class="row">
        	<div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                    
                    {!! Form::open() !!}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        @if (Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEAL_DETAILS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_DETAILS')}} @endif
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_TITLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEAL_TITLE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_TITLE')}} @endif<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
					{{ $title }}
                    </div>
                </div>
                        </div>
						  <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TOP_CATEGORY')}}@endif<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
					{{ $deals->mc_name }}
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_MAIN_CATEGORY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MAIN_CATEGORY')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MAIN_CATEGORY')}} @endif<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
					{{ $deals->smc_name }}
                    </div>
                </div>
                        </div>
                
                 <div class="panel-body">
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="text1">Sub Category</label>
                      <div class="col-lg-4">
                         
                          @if($deals->sb_name!=""){{
						   $deals->sb_name }} @else {{  "-" }} @endif

                        
                      </div>
                    </div>
                 </div>

                 <div class="panel-body">
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="text1">Second Sub Category</label>
                      <div class="col-lg-4">
                       @if($deals->ssb_name!="")
						{{
						$deals->ssb_name  }} @else {{ "-"  }} @endif
                        
                      </div>
                    </div>
                 </div>
			
				
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_PRICE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEALS_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_PRICE')}}@endif<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
					{{ $originalprice }}
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DISCOUNT_PRICE')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_DISCOUNT_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DISCOUNT_PRICE')}} @endif<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
					{{ $discountprice }}
                    </div>
                </div>
                        </div>
				
                <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DISCOUNT_PERCENTAGE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DISCOUNT_PERCENTAGE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DISCOUNT_PERCENTAGE')}}@endif<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                    {{  $deals->deal_discount_percentage."%" }}
                    </div>
                </div>    
                </div>  
                

				<?php   /*		 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SAVINGS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SAVINGS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SAVINGS');} ?><span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $deals->deal_saving_price; ?>
                    </div>
                </div>
				</div>*/  ?>
				<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_START_DATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_START_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_START_DATE') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
					{{ date('M-d-Y h:m:s',strtotime($startdate)) }}
                    </div>
                    </div>
               </div>

						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_END_DATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_END_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_END_DATE') }}<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
					{{ date('M-d-Y h:m:s',strtotime($enddate)) }}
                    </div>
                </div>
                        </div>
				<div class="panel-body">
                    <div class="form-group">
                     <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEAL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_DESCRIPTION')}} @endif<span class="text-sub">*</span></label>
                      <div class="col-lg-4">
					  {{  $description }}
                       </div>
                    </div>
                </div>
				
				@if(!empty($get_active_lang))  
				@foreach($get_active_lang as $get_lang) 
			@php
				$get_lang_name = $get_lang->lang_name;
				$description_dynamic = 'deal_description_'.$get_lang->lang_code; 
				$descrip_dynamic = $deals->$description_dynamic; @endphp
				 @if($descrip_dynamic !='') 
				<div class="panel-body">
                    <div class="form-group">
                     <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_DESCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEAL_DESCRIPTION')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_DESCRIPTION')}} @endif({{ $get_lang_name }})<span class="text-sub">*</span></label>
                      <div class="col-lg-4">
					  {{ $descrip_dynamic }} 
                       </div>
                    </div>
                </div>	
				@endif
				@endforeach
				@endif
				
				
                 <?php   /* 
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MINIMUM_DEAL_LIMIT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MINIMUM_DEAL_LIMIT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MINIMUM_DEAL_LIMIT');} ?><span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                   <?php echo  $minlimt; ?>
                    </div>
                </div>
				 </div>*/  ?>

				<div class="panel-body">
                           <div class="form-group">
						   {!! Html::decode(Form::label('','User Limit<span class="text-sub">*</span>',['class' => 'control-label col-lg-2', 'for' => 'text1'])) !!}   
                    
                    <div class="col-lg-4">
					{{  $maxlimit }}
                    </div>
                </div>
                        </div>
			<?php /*		
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_PURCHASE_COUNT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_PURCHASE_COUNT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_PURCHASE_COUNT');} ?><span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                 <?php echo $deals->deal_no_of_purchase; ?>
                    </div>
                </div>
			</div>*/  ?>
						 
						
                <div class="panel-body">
                    <div class="form-group">
					 {!! Html::decode(Form::label('','Meta Keywords<span class="text-sub"></span>',['class' => 'control-label col-lg-2', 'for' => 'text1'])) !!}  
						
						<div class="col-lg-8">
              @if($metakeyword!=""){{ $metakeyword  }} @else {{ "-" }} @endif</div>
					</div>
                </div>
				
				 @if(!empty($get_active_lang))  
				@foreach($get_active_lang as $get_lang) 
				@php
			 	$get_lang_name = $get_lang->lang_name;
				$metakey_dynamic = 'deal_meta_keyword_'.$get_lang->lang_code; 
				$metakeyword_dynamic = $deals->$metakey_dynamic;  @endphp
				@if($metakeyword_dynamic !='')
				<div class="panel-body">
                    <div class="form-group">
					 
						<label class="control-label col-lg-2" for="text1"> Meta Keywords({{ $get_lang_name }})<span class="text-sub">*</span></label>
						<div class="col-lg-8">
            @if($metakeyword!=""){{
			$metakeyword_dynamic }} @else {{ "-"  }} @endif</div>
					</div>
                </div>
				@endif
				@endforeach
				@endif
                <div class="panel-body">
                    <div class="form-group">
					 {!! Html::decode(Form::label('','Meta Description<span class="text-sub"></span>',['class' => 'control-label col-lg-2', 'for' => 'text1'])) !!}  
					 
						<div class="col-lg-8">
            @if($metadescription!=""){{
			$metadescription }} @else {{  "-"  }} @endif</div>
					</div>
                </div>
				
				 @if(!empty($get_active_lang))  
				@foreach($get_active_lang as $get_lang) 
				
				@php
				$get_lang_name = $get_lang->lang_name;
				$metades_dynamic = 'deal_meta_description_'.$get_lang->lang_code; 
				$metakeydesc_dynamic = $deals->$metades_dynamic;  @endphp
				@if($metakeydesc_dynamic !='')
				<div class="panel-body">
                    <div class="form-group">
					 <label class="control-label col-lg-2" for="text1"> Meta Description({{ $get_lang_name }})<span class="text-sub"></span></label>
						<div class="col-lg-8">
            @if($metadescription!=""){{
			$metakeydesc_dynamic }} @else {{ "-" }} @endif</div>
					</div>
                </div>
				@endif
				@endforeach
				@endif	
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_IMAGE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DEALS_IMAGE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_IMAGE')}} @endif<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
					
					  @if(count($file_get_path) > 0 && $img_count !='') {{-- check image is available  --}}
				   
					  
					   
						@foreach($file_get_path as $image)   
					    
						   @if( $image!='')   {{-- check image is null --}}
						    @php 
							   $pro_img = $image;
							   $prod_path = url('').'/public/assets/default_image/No_image_deal.png';
							  $img_data = "public/assets/deals/".$pro_img; @endphp
							    @if(file_exists($img_data))  
									 @php
								 	             $prod_path = url('').'/public/assets/deals/'.$pro_img; @endphp
								     
								@else 
										 @if(isset($DynamicNoImage['dealImg'])) {{-- check no_product_image is exist --}}
										 	@php 					
											$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['dealImg'];  @endphp
												@if($DynamicNoImage['dealImg'] !='' && file_exists($dyanamicNoImg_path))
												 @php 
													$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg']; @endphp
												@endif
												@endif
										 
										 
                                    @endif
					       
					      
						   @else
						   
							    @php
					  $prod_path = url('').'/public/assets/default_image/No_image_deal.png'; @endphp
					   @if(isset($DynamicNoImage['dealImg']))
													
											@php
											 $dyanamicNoImg_path="public/assets/noimage/".$DynamicNoImage['dealImg'];
											
											@endphp
											  @if(file_exists($dyanamicNoImg_path) && $DynamicNoImage['dealImg'] !='')
											@php
												
												 $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg']; 
											   
											   @endphp
											@endif
											
									     @endif
										 
						   @endif
						    <img style="height:40px;" src="{{ $prod_path }}">
					   @endforeach
			      
				  @else
				  @php
					  $prod_path = url('').'/public/assets/default_image/No_image_deal.png'; @endphp
					   @if(isset($DynamicNoImage['dealImg']))
													
											@php
											 $dyanamicNoImg_path="public/assets/noimage/".$DynamicNoImage['dealImg'];
											
											@endphp
											  @if(file_exists($dyanamicNoImg_path) && $DynamicNoImage['dealImg'] !='')
											@php
												
												 $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg']; 
											   
											   @endphp
											@endif
											
									     @endif

									 
								
					  
					 <img style="height:40px;" src="{{ $prod_path }}">
				 @endif
					
					
					
					
                           <!-- <img style="height:40px;" src=" echo url(''); ?>/public/assets/deals/ echo $file_get_path[0]; ?>">
                           
					 for($j=1 ; $j< $img_count; $j++)
					
                     <img style="height:40px;" src=" echo url(''); ?>/public/assets/deals/ echo $file_get_path[$j]; ?>"> -->
                     
                    </div>
                </div>
                        </div>
                    </div>
					
					<div class="form-group">
                    <label class="control-label col-lg-10" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-2">
                    
                    <a style="color:#fff" href="{{ URL::previous() }}"   class="btn btn-warning btn-sm btn-grad">@if (Lang::has(Session::get('admin_lang_file').'.BACK_BACK')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_BACK')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_BACK')}} @endif</a>
                    </div>
					  
                </div>
                
				{!! Form::close() !!}
                </div>
        
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
     
</body>
     <!-- END BODY -->
</html>
