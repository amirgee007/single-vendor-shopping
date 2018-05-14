<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SPECIFICATION_GROUP')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SPECIFICATION_GROUP') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SPECIFICATION_GROUP') }}</title>
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
                            	<li class=""><a>Home</a></li>
                                <li class="active"><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SPECIFICATION_GROUP')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_SPECIFICATION_GROUP') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SPECIFICATION_GROUP') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SPECIFICATION_GROUP')!= '') ? trans(Session::get('admin_lang_file').'.BACK_MANAGE_SPECIFICATION_GROUP') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SPECIFICATION_GROUP') }}</h5>
            
        </header>
   
   
 <div class="row">
   	
    <div class="col-lg-12">
      @if (Session::has('updated_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('updated_result') !!} 
	
	{{ Form::button('x',array('class' => 'close',  'data-dismiss' => 'alert', 'aria-hidden' => 'true')) }}
	
       </div>
		@endif
        @if (Session::has('insert_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('insert_result') !!}
	{!! Form::button('x',array('class' => 'close',  'data-dismiss' => 'alert', 'aria-hidden' => 'true')) !!}
        </div>
		@endif
        @if (Session::has('delete_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('delete_result') !!}
	{!! Form::button('x',array('class' => 'close',  'data-dismiss' => 'alert', 'aria-hidden' => 'true')) !!}
         </div>
		@endif

   <div class="table-responsive panel_marg_clr ppd">
    	<table  class="table table-bordered" id="dataTables-example">
              <thead>
		 <tr>
                  <th style="width:10%;"class="text-center">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
                  <th style="width:10%;"class="text-center">Top Category</th>
                  <th style="width:10%;"class="text-center">Main Category</th>
                  <th style="width:10%;"class="text-center">Show On Filter</th>
				   <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SPECIFICATION_GROUP_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SPECIFICATION_GROUP_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SPECIFICATION_GROUP_NAME') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SORT_ORDER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SORT_ORDER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SORT_ORDER') }}</th>
	
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }}</th>

				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DELETE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }}</th>


                </tr>
              </thead>
              <tbody><?php // print_r($specificationresult);print_r($main_category);exit(); ?>
                @if(count($specificationresult)>0)
               @php $i = 1; @endphp
				@foreach ($specificationresult as $info) 
                <tr>
                  <td class="text-center">{{ $i }}</td>
				     <td class="text-center"><?php if(isset($main_category[$info->sp_mc_id])) echo ucfirst(strtolower($main_category[$info->sp_mc_id])); else echo '---'; ?></td>
				     <td class="text-center"><?php if(isset($sec_main_category[$info->sp_smc_id])) echo ucfirst(strtolower($sec_main_category[$info->sp_smc_id]));else echo '---'; ?></td>
				<td class="text-center"><?php if($info->show_on_filter=="0"){echo" No";}else{echo"Yes";} ?></td>
				     <td class="text-center">{{ $info->spg_name }}</td>
					  <td class="text-center">{{ $info->spg_order }}</td>
				   <td class="text-center">
<a href="{{ url('edit_specification_group/'.$info->spg_id) }}" data-tooltip="Edit"><i class="icon icon-edit icon-2x"></i></a></td>

<?php $spec_added_product=DB::table('nm_product')
->join('nm_prospec','nm_product.pro_id','=','nm_prospec.spc_pro_id')
->where('nm_product.pro_status','!=',2)
->where('nm_product.pro_isspec','=',1)
->where('nm_prospec.spc_spg_id','=',$info->spg_id)
->count(); ?>
               
				   <td class="text-center">
@if($spec_added_product<1) 
                   <a href="{{  url('delete_specification_group/'.$info->spg_id) }}" data-tooltip="Delete"><i class="icon icon-trash icon-2x"></i></a>

@else 
					<a  data-tooltip="Specification added in product! Can't Delete!"><i class="icon icon-trash icon-2x"></i></a>
@endif
                   </td>
					
                </tr>
			<?php $i++; 
        ?> 
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
    <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
    <script src="{{ url('') }}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
      $(document).ready(function () {
          $('#dataTables-example').dataTable();
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
