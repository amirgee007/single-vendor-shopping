
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
     <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_DEALS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_DEALS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_DEALS')}} @endif </title>
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
	 <link href="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
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
                            	<li class=""><a >{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= ''))? trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                               <li class="active"><a>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SOLD_DEALS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SOLD_DEALS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SOLD_DEALS') }}</a></li>
                            </ul>
                    </div>
                </div>
			  <center><div class="cal-search-filter">
			  {{ Form::open(array('action' => 'DealsController@sold_deals','method'=> 'POST')) }}
		 
							<input type="hidden" name="_token"  value="<?php echo csrf_token(); ?>">
							 <div class="row">
							 <br>
							 
							 
							   <div class="col-sm-3">
							    <div class="item form-group">
							<div class="col-sm-6 date-top">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_FROM_DATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_FROM_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FROM_DATE') }}</div>
						 <div class="col-sm-6 place-size">
 						<span class="icon-calendar cale-icon"></span>
							 <input type="text" name="from_date" placeholder="DD/MM/YYYY" class="form-control" id="datepicker-8" value="{{$from_date}}" required readonly>
							 
							  </div>
							  </div>
							   </div>
							    <div class="col-sm-3">
							    <div class="item form-group">
							<div class="col-sm-6 date-top">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_TO_DATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_TO_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TO_DATE') }}</div>
							 <div class="col-sm-6 place-size">
 <span class="icon-calendar cale-icon"></span>
							 <input type="text" name="to_date" placeholder="DD/MM/YYYY" id="datepicker-9" class="form-control" value="{{$to_date}}" required readonly>
							 
							  </div>
							  </div>
							   </div>
							   
							   <div class="form-group">
							   <div class="col-sm-2">
							 <input type="submit" name="submit" class="btn btn-block btn-success" value="{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SEARCH')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SEARCH') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SEARCH') }}">
							 </div>
                             <div class="col-sm-2">
								<a href="<?php echo url('').'/sold_deals';?>"><button type="button" name="reset" class="btn btn-block btn-info">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= ''))? trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button></a>
							 </div>
							</div>
							
							 
							{{ Form::close() }}
							 </div>
							 </center>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SOLD_DEALS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SOLD_DEALS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SOLD_DEALS') }}</h5>
            
         </header>
         <div style="display: none;" class="la-alert date-select1 alert-success alert-dismissable">End date should be greater than Start date!
        {{ Form::button('x', array('class' => 'close closeAlert','aria-hidden' => 'true')) }}</div>
           @if (Session::has('block_message'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('block_message') !!}
         {{ Form::button('x', array('class' => 'close','aria-hidden' => 'true' ,'data-dismiss' => 'alert')) }} </div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
 	
        <div class="table-responsive panel_marg_clr ppd">
           <table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
                                    <thead>
                                        <tr role="row">
										<th aria-label="Rendering engine: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc" aria-sort="ascending">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
										<th aria-label="Browser: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DEALS_NAME')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DEALS_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DEALS_NAME') }}</th>
										
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ORIGINAL_PRICE') }}({{ Helper::cur_sym() }})</th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DISCOUNTED_PRICE') }}({{ Helper::cur_sym() }})</th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"> {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_IMAGE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DEAL_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_IMAGE') }}  </th>	
									 
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_DEAL_DETAILS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_DEAL_DETAILS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DEAL_DETAILS') }}</th>
                                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ACTIONS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ACTIONS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIONS') }}</th>
										</tr>
                                    </thead>
                                    <tbody>
                                      <?php $i = 1 ;   ?>
									  
                                    
@if(isset($_POST['submit']))

    @if(count($exdeals_rep))	
	    @foreach($exdeals_rep as $deal_list) 
        	 @php $deal_get_img = explode("/**/",$deal_list->deal_image);  @endphp
        	@if($deal_list->deal_status == 1)
        	@php
        		  $process = "<a href='".url('block_deals/'.$deal_list->deal_id.'/0')."' title='click to Block'> <i style='margin-left:10px;' class='icon icon-ok icon-me'></i> </a>";  @endphp
            @elseif($deal_list->deal_status == 0) 
        			@php
					$process = "<a href='".url('block_deals/'.$deal_list->deal_id.'/1')."' title='click to Unblock'> <i style='margin-left:10px;' class='icon icon-ban-circle icon-me'></i> </a>";
					@endphp
        	@endif
            <tr class="gradeA odd">
                <td class="sorting_1">{{ $i }}</td>
                <td class="  ">{{ substr($deal_list->deal_title,0,45)}}</td>
           		
                <td class="center  ">{{ $deal_list->deal_original_price }}</td>
                <td class="center  ">{{ $deal_list->deal_discount_price }}</td>
                <td class="center  "><a >
				
				@php $pro_img = $deal_get_img[0];
							   $prod_path = url('').'/public/assets/default_image/No_image_deal.png';  @endphp
							
							  @if($deal_get_img !='') {{-- check image is available  --}}
								
					  
								
						   @if($deal_get_img[0] !='')  {{-- //check image is null --}}
						    
							@php  
							   $img_data = "public/assets/deals/".$pro_img;  @endphp
							    @if(file_exists($img_data))  
									 @php
								 	             $prod_path = url('').'/public/assets/deals/'.$pro_img;
								     @endphp
								@else
									@if(isset($DynamicNoImage['dealImg'])) {{-- //check no_product_image is exist  --}}
										 					
											@php
											$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['dealImg'];
											@endphp
												@if($DynamicNoImage['dealImg'] !='' && file_exists($dyanamicNoImg_path))
												 @php
													$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg'];
												@endphp	
												@endif
									     @endif
										 
										 
                                @endif
					       
					      
						   @else
						   @php
							    $prod_path = url('').'/public/assets/default_image/No_image_deal.png';  @endphp
								@if(isset($DynamicNoImage['dealImg'])) {{-- //check no_product_image is exist  --}}
										 	@php					
											$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg'];
											@endphp
												@if($DynamicNoImage['dealImg'] !='' && file_exists($dyanamicNoImg_path))
												@php 
													$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg'];
												@endphp	
												@endif
										
									     @endif
										 
					@endif
						    
					  
			      
				  @else
				  
					 @php  $prod_path = url('').'/public/assets/default_image/No_image_deal.png'; @endphp
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
				
				
				
				
				<img style="height:40px;" src="{{ $prod_path }}"></a></td>
                <td class="center  "><a href="{{ url('deal_details')."/".$deal_list->deal_id }}">@if (Lang::has(Session::get('admin_lang_file').'.BACK_VIEW')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_VIEW')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_VIEW')}} @endif</a>&nbsp;|&nbsp;<a href="{{ url('edit_deals')."/".$deal_list->deal_id }}">@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT')}}@endif</a></td>
                <td class="center"><?php echo $process; ?></td>
            </tr>
<?php $i++; ?> 	
@endforeach @endif
@else
	
    @if(count($deal_details)) 
    	@foreach($deal_details as $deal_list)  
           @php  $deal_get_img = explode("/**/",$deal_list->deal_image); 
			$process = ""; @endphp
            @if($deal_list->deal_status == 1)
           @php     
		  $process = "<a href='".url('block_deals/'.$deal_list->deal_id.'/0')."' title='click to Block'> <i style='margin-left:10px;' class='icon icon-ok icon-me'></i> </a>"; @endphp
            @elseif($deal_list->deal_status == 0) 
			 @php 		
			 $process = "<a href='".url('block_deals/'.$deal_list->deal_id.'/1')."' title='click to Unblock'> <i style='margin-left:10px;' class='icon icon-ban-circle icon-me'></i> </a>";  @endphp 
             @endif
            <tr class="gradeA odd">
                <td class="sorting_1">{{ $i }}</td>
                <td class="  ">{{ substr($deal_list->deal_title,0,45) }}</td>
           		
                <td class="center  ">{{  $deal_list->deal_original_price }}</td>
                <td class="center  ">{{  $deal_list->deal_discount_price }}</td>
                <td class="center  ">
				
				
				
				@php $pro_img = $deal_get_img[0];
							   $prod_path = url('').'/public/assets/default_image/No_image_deal.png';  @endphp
							
							  @if($deal_get_img !='') {{-- check image is available  --}}
								
					  
								
						   @if($deal_get_img[0] !='')  {{-- //check image is null --}}
						    
							@php  
							   $img_data = "public/assets/deals/".$pro_img;  @endphp
							    @if(file_exists($img_data))  
									 @php
								 	             $prod_path = url('').'/public/assets/deals/'.$pro_img;
								     @endphp
								@else
									@if(isset($DynamicNoImage['dealImg'])) {{-- //check no_product_image is exist  --}}
										 					
											@php
											$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['dealImg'];
											@endphp
												@if($DynamicNoImage['dealImg'] !='' && file_exists($dyanamicNoImg_path))
												 @php
													$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg'];
												@endphp	
												@endif
									     @endif
										 
										 
                                @endif
					       
					      
						   @else
						   @php
							    $prod_path = url('').'/public/assets/default_image/No_image_deal.png';  @endphp
								@if(isset($DynamicNoImage['dealImg'])) {{-- //check no_product_image is exist  --}}
										 	@php					
											$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg'];
											@endphp
												@if($DynamicNoImage['dealImg'] !='' && file_exists($dyanamicNoImg_path))
												@php 
													$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['dealImg'];
												@endphp	
												@endif
										
									     @endif
										 
					@endif
						    
					  
			      
				  @else
				  
					 @php  $prod_path = url('').'/public/assets/default_image/No_image_deal.png'; @endphp
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
				
				<a ><img style="height:40px;" src="{{ $prod_path }}"></a></td>
                <td class="center  "><a href="{{  url('deal_details')."/".$deal_list->deal_id }}">@if (Lang::has(Session::get('admin_lang_file').'.BACK_VIEW')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_VIEW')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_VIEW')}} @endif</a>&nbsp;|&nbsp;<a href="<?php echo url('edit_deals')."/".$deal_list->deal_id; ?>">@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT')}} @endif</a></td>
                <td class="center"><?php echo $process; ?></td>
            </tr>
<?php $i++; ?> @endforeach @endif @endif
									
			</tbody>
            </table></div>


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
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="{{ url('') }}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
    <!-- END GLOBAL SCRIPTS -->   
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	   <script>
         $(function() {
            $( "#datepicker-8" ).datepicker({
               prevText:"@if (Lang::has(Session::get('admin_lang_file').'.BACK_CLICK_FOR_PREVIOUS_MONTHS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CLICK_FOR_PREVIOUS_MONTHS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CLICK_FOR_PREVIOUS_MONTHS')}} @endif",
               nextText:"@if (Lang::has(Session::get('admin_lang_file').'.BACK_CLICK_FOR_NEXT_MONTHS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CLICK_FOR_NEXT_MONTHS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CLICK_FOR_NEXT_MONTHS')}} @endif",
               showOtherMonths:true,
               selectOtherMonths: false
            });
            $( "#datepicker-9" ).datepicker({
               prevText:"@if (Lang::has(Session::get('admin_lang_file').'.BACK_CLICK_FOR_PREVIOUS_MONTHS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CLICK_FOR_PREVIOUS_MONTHS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CLICK_FOR_PREVIOUS_MONTHS')}} @endif",
               nextText:"@if (Lang::has(Session::get('admin_lang_file').'.BACK_CLICK_FOR_NEXT_MONTHS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CLICK_FOR_NEXT_MONTHS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CLICK_FOR_NEXT_MONTHS')}}@endif",
               showOtherMonths:true,
               selectOtherMonths: true
            });
         });
         /** Check start date and end date**/
         $("#datepicker-8,#datepicker-9").change(function() {
    var startDate = document.getElementById("datepicker-8").value;
    var endDate = document.getElementById("datepicker-9").value;
     if (this.id == 'datepicker-8') {
              if ((Date.parse(endDate) <= Date.parse(startDate))) {
                    $('#datepicker-8').val('');
                   $(".date-select1").css({"display" : "block"});
                    return false;
                }
            } 

             if(this.id == 'datepicker-9') {
                if ((Date.parse(endDate) <= Date.parse(startDate))) {
                    $('#datepicker-9').val('');
                     $(".date-select1").css({"display" : "block"});
                     return false;
                    //alert("End date should be greater than Start date");
                }
                }
                
            
      //document.getElementById("ed_endtimedate").value = "";
   
  });
/*Start date end date check ends*/


$(".closeAlert").click(function(){
    $(".alert-success").hide();
  });
      </script>
</body><script type="text/javascript">
	$.ajaxSetup({
		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});
</script>  
     <!-- END BODY -->
</html>
