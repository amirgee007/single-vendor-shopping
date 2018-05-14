<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_COLORS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_COLORS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_COLORS') }}</title>
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
                            	<li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_COLORS')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_MANAGE_COLORS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_COLORS') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_COLORS')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_MANAGE_COLORS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_COLORS') }}</h5>
            
        </header>
   @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">
	{{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert','aria-hidden' => 'true']) }}
	{!! Session::get('success') !!}</div>
		@endif
   
 <div class="table-responsive panel_marg_clr ppd">
   	
    	<table class="table table-bordered" id="dataTables-example">
              <thead>
                <tr>
                  <th style="width:10%;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_SNO') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }} </th>
                  <th>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COLOR_CODE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COLOR_CODE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COLOR_CODE') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COLOR_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COLOR_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COLOR_NAME') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DELETE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }}</th>
                </tr>
              </thead>
              <tbody>
              @if(count($color_added_list)>0)  

              <?php $i=1;?>
                @foreach($color_added_list as $color)
                <?php  $color_added_product=DB::table('nm_procolor')->where('pc_co_id','=',$color->co_id)->get();  ?>
                <tr>
                  <td>{{ $i }} </td>
                
                  <td class="text-center">{!! $color->co_code!!}</td>
				     <td class="text-center" style="color:{!! $color->co_code!!};">{!! $color->co_name!!}</td>
				   <td class="text-center"><a href="{!! url('edit_color').'/'.$color->co_id!!}" data-tooltip="Edit"><i class="icon icon-edit icon-2x"></i></a> </td>
            @if(count($color_added_product)==0)
             <td class="text-center"><a href="{!! url('delete_color').'/'.$color->co_id!!}" data-tooltip="Delete">  <i class="icon icon-trash icon-2x"></i></a>   </td>
             @else <td class="text-center"><a  data-tooltip="Can't Delete!. Product added to this colour!">  <i class="icon icon-trash icon-2x"></i></a>   </td>         
             @endif
           

                </tr>
                <?php $i++;?>
                @endforeach
				      @else
                   <tr><td colspan="5">No data found.</td></tr>
              @endif  
              </tbody>
            </table>
             <?php //echo $color_added_list->setPath('manage_color'); ?>

   
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
    <script src="public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
