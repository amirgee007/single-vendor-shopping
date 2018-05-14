<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_COUPON')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_MANAGE_COUPON') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_COUPON') }}</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
  <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{!!url('')!!}/public/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="{!!url('')!!}/public/assets/css/main.css" />
    <link rel="stylesheet" href="{!!url('')!!}/public/assets/css/theme.css" />
    <link rel="stylesheet" href="{!!url('')!!}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{!!url('')!!}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
     <link href="{!!url('')!!}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                            	<li class=""><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_COUPON')!= '') ? trans(Session::get('admin_lang_file').'.BACK_MANAGE_COUPON')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_COUPON') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_COUPON')!= '') ? trans(Session::get('admin_lang_file').'.BACK_MANAGE_COUPON')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_COUPON') }}</h5>
            
        </header>
   
   @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
	{!! Session::get('success') !!}</div>
		@endif
    @if (Session::has('delete_result'))
    <div class="alert alert-success alert-dismissable">{!! Session::get('delete_result') !!}
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
         </div>
    @endif
    @if (Session::has('cannot_delete_result'))
    <div class="alert alert-warning alert-dismissable">{!! Session::get('cannot_delete_result') !!}</div>
{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
        
    @endif

            <div id="div-1" class="accordion-body collapse in body">
       
               <div class="table-responsive panel_marg_clr ppd">
       <table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
                                    <thead>
                                        <tr role="row">
										<th aria-label="S.No: activate to sort column ascending" style="width: 61px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc" aria-sort="descending">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>

										<th aria-label="Product Name: activate to sort column ascending" style="width: 69px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_CODE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_COUPON_CODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_CODE')}}</th>

										<th aria-label="City: activate to sort column ascending" style="width: 81px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUPON_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COUPON_NAME') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_COUPON_NAME') }}</th>

										<th aria-label="Store Name: activate to sort column ascending" style="width: 78px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_START_DATE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_START_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_START_DATE')}}</th>

										<th aria-label="Original Price($): activate to sort column ascending" style="width: 75px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_END_DATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_END_DATE'): trans($ADMIN_OUR_LANGUAGE.'.BACK_END_DATE') }}</th>

										<th aria-label="Actions: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TYPE_OF_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TYPE_OF_COUPON') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_TYPE_OF_COUPON') }} </th>

										<th aria-label=" Product Image : activate to sort column ascending" style="width: 78px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') ? trans(Session::get('admin_lang_file').'.BACK_EDIT')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }}</th>
										
										<th aria-label="Actions: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DELETE')   :  trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }}</th>
										
										
										</tr>
                                    </thead>
                                    <tbody>


				<?php $i = 1 ; ?>
			 @if(count($coupon_data)) 
		      @foreach($coupon_data as $row)



 <tr class="gradeA odd">
            	<td class="sorting_1">{{ $i }}</td>
               	<td class="  ">{{ $row->coupon_code }}</td>
    			<td class="  ">{{ $row->coupon_name }}</td>
         		<td class="center  ">{{ $row->start_date }}</td>
              	<td class="center  ">{{ $row->end_date }}</td>
				<td class="text-center">@if($row->type_of_coupon == 1)
                    {{ (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_COUPON')  : trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_COUPON') }}  
                  @elseif($row->type_of_coupon == 2)
					  {{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER_COUPON') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_COUPON') }}  
                 @elseif($row->type_of_coupon == 3)
				  {{ (Lang::has(Session::get('admin_lang_file').'.BACK_USER_COUPON')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_USER_COUPON') : trans($ADMIN_OUR_LANGUAGE.'.BACK_USER_COUPON') }}  
				  @endif</td>	   
              <td class="text-center"><a href="{!! url('edit_coupon').'/'.$row->id!!}" data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }}"><i class="icon icon-edit icon-2x"></i></a></td>
				 
				  
          <?php 
               $start_date = $row->start_date;
               $new_start_date = date("Y-m-d", strtotime($start_date));
               $end_date = $row->end_date;
               $new_end_date = date("Y-m-d", strtotime($end_date));
          $current_date = date('Y-m-d'); ?>
          @if($new_start_date <= $current_date && $new_end_date > $current_date)  
          <td class="text-center">  <a href="{{ url('cannot_delete_coupon') }}" data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DELETE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE')}}"> <i class="icon icon-trash icon-2x" style="margin-left:15px;"></i></a></td>
          @else 
					<td class="text-center">  <a href="{{ url('delete_coupon/'.$row->id) }}" data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_DELETE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }}"> <i class="icon icon-trash icon-2x" style="margin-left:15px;"></i></a></td>
          @endif

                                           
                                           
                                        </tr>
										
						<?php $i++; 	?>		 
			 @endforeach
			 @endif
			
		
										
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
    <script src="{!!url('')!!}/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="{!!url('')!!}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{!!url('')!!}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
     <script src="{!!url('')!!}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{!!url('')!!}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable({
        "order": [[ 0, "desc" ]]
    });
         });
    </script>
    <!-- END GLOBAL SCRIPTS -->   
      <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
</body>
     <!-- END BODY -->
</html>
