<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORY_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORY_BANNER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CATEGORY_BANNER') }}</title>
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
     @php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif	
    <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                            	<li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') :trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORY_BANNER')!= '') ? trans(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORY_BANNER')   :  trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CATEGORY_BANNER') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORY_BANNER')!= '') ? trans(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORY_BANNER')   :  trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CATEGORY_BANNER') }}  <label style="color:#f00">  [ {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MOBILE_USE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_MOBILE_USE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MOBILE_USE') }} ]</label></h5>
            
        </header>
   
   @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
   <div class="row">
   	
    <div class="col-lg-12">
      
   <div class="table-responsive panel_marg_clr ppd">
    	<table  class="table table-bordered">
              <thead>
                <tr>
                  <th>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }} </th>
                  <th>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MAIN_CAT_TITLE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MAIN_CAT_TITLE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MAIN_CAT_TITLE') }}</th>
                  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE') }}</th>
          <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') ? trans(Session::get('admin_lang_file').'.BACK_EDIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }} </th>
          <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_BLOCK') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK') }} / {{ (Lang::has(Session::get('admin_lang_file').'.BACK_UNBLOCK')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UNBLOCK') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UNBLOCK') }} </th>
          <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DELETE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }}</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=1; ?>
                @if(!empty($mnge_banner) && $mnge_banner->count())
                @foreach($mnge_banner as $mnge_banner_list)
                <tr>
                  <td>{!!$i!!}</td>
                  <td>{!! $mnge_banner_list->smc_name !!}</td>
                  <td class="text-center">
                    <?php
                         $image = $mnge_banner_list->cat_bn_img; 
                             $explode = (explode('/**/',$image,-1));  ?>
                             @foreach($explode as $value) 
							 
							 
					<?php		  $pro_img = $value;
				   $prod_path = url('').'/public/assets/default_image/No_image_banner.png'; ?>
				  @if($pro_img != '' ) {{-- check  image is not null --}}
					  
							<?php   $img_data = "public/assets/banner/".$pro_img; ?>
					     @if(file_exists($img_data))
						 
						<?php 	 $prod_path = url('').'/public/assets/banner/'.$pro_img; ?>
						 
						 @else
						 
							 @if(isset($DynamicNoImage['category_banner'])) {{-- check no_image is updated in database --}}
										 <?php					
											$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['category_banner']; ?>
												@if($DynamicNoImage['category_banner'] !='' && file_exists($dyanamicNoImg_path)) {{-- check no_image is exist in file --}}
												 
												<?php	$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['category_banner']; ?>
												@endif
									     @endif
										 
						 
				  @endif
				  @else
						 
							 @if(isset($DynamicNoImage['category_banner'])) {{-- check no_image is updated in database --}}
										 						
										<?php	$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['category_banner']; ?>
												@if($DynamicNoImage['category_banner'] !='' && file_exists($dyanamicNoImg_path)) {{-- check no_image is exist in file --}}
												 <?php
													$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['category_banner']; ?>
												@endif
									     
							 @endif			 
						 @endif
							                            
                                    <img src="{{ $prod_path }}" style="width:60px; height:40px;">
							 
							 
							 
							 
							 
							 
                                
                   @endforeach
                    
                </td>
				   <td class="text-center"><a href="{!! url('edit_category_banner').'/'.$mnge_banner_list->cat_bn_id!!}" data-tooltip="Edit"><i class="icon icon-edit icon-2x"></i></a></td>
                   	
				    <td class="text-center">
                    @if($mnge_banner_list->cat_bn_status == 0)
                        <a href="{!! url('status_category_banner').'/'.$mnge_banner_list->cat_bn_id.'/'.'1'!!}" data-tooltip="Unblock"><i class="icon icon-ok icon-2x"></i></a>
                  @else 
                        <a href="{!! url('status_category_banner').'/'.$mnge_banner_list->cat_bn_id.'/'.'0'!!}" data-tooltip="block"><i class="icon icon-ban-circle icon-2x icon-me"></i></a>
                   @endif</td>
					 <td class="text-center"><a href="{!! url('delete_category_banner').'/'.$mnge_banner_list->cat_bn_id!!}" data-tooltip="Delete"><i class="icon icon-trash icon-2x"></i></a></td>
                </tr>
                <?php $i++;?>

                @endforeach
                @else
                   <tr><td colspan="6">No data found.</td></tr>
              @endif 
			  {{ Form::close() }}
              </tbody>
            </table></div>
            {!! $mnge_banner->render() !!}
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
    <script src="public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

     <script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>   
     
</body>
     <!-- END BODY -->
</html>
