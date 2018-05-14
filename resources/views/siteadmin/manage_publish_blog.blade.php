<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_PUBLISH')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_MANAGE_PUBLISH')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_PUBLISH')}} @endif   </title>
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
	  <link rel="stylesheet" href="public/assets/css/plan.css" />
    <link rel="stylesheet" href="public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
     <?php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); ?> @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
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
                            	<li class=""><a>@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME')}} @endif</a></li>
                                <li class="active"><a>@if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_PUBLISH')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_PUBLISH')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_PUBLISH')}} @endif</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_PUBLISH')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_PUBLISH')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_PUBLISH')}} @endif</h5>
            
        </header>
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
          
             <div class="table-responsive panel_marg_clr ppd">
           <table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
                                    <thead>
                                        <tr role="row">
										<th aria-label="Rendering engine: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc" aria-sort="ascending"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SNO');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO');} ?></th>
										<th aria-label="Browser: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_BLOG_TITLE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_BLOG_TITLE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOG_TITLE');} ?></th>
										<th aria-label="Platform(s): activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CATEGORY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CATEGORY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CATEGORY');} ?></th>
										
										<th aria-label="CSS grade: activate to sort column ascending" style="width:15%;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DATE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DATE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DATE');} ?></th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_IMAGE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE');} ?> </th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"> <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EDIT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT');} ?> </th>	
									
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_STATUS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_STATUS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_STATUS');} ?></th>
                                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DELETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE');} ?></th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_BLOG_DETAILS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_BLOG_DETAILS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOG_DETAILS');} ?></th>

										</tr>
                                    </thead>
                                    <tbody>
                                      

 @if (Session::get('admin_lang_code')== 'en')
 <?php 
 $Blocked="Blocked";
 $UnBlocked="UnBlock"; ?>
 @elseif (Session::get('admin_lang_code')== 'ar')
 <?php
  $Blocked="مسدود";
  $UnBlocked="رفع الحظر";
?>
 @endif


									@php  $i = 1;  @endphp 
                                @if(count($blog_details)>0)
									  @foreach($blog_details as $blog_list) 
									<?php   $auc_get_img = $blog_list->blog_image;  ?> 
									  @if($blog_list->blog_status == 1 )
									  <?php 
										  $process = "<a href='".url('block_blog/'.$blog_list->blog_id.'/0/'.$blog_list->blog_type)."' data-tooltip='UnBlocked'> <i style='margin-left:10px;' class='icon icon-ban-circle icon-me'></i> </a>"; ?>
								        @elseif($blog_list->blog_status == 0) 
										  <?php   $process = "<a href='".url('block_blog/'.$blog_list->blog_id.'/1/'.$blog_list->blog_type)."' data-tooltip='Blocked'> <i style='margin-left:10px;' class='icon icon-ok icon-me'></i> </a>"; ?>
									 @endif 
									 
                                    <tr class="gradeA odd">
                                            <td class="sorting_1">{{ $i }}</td>
                                            <td class="">{{ substr($blog_list->blog_title,0,45) }}</td>
                                            <td class="">{{ $blog_list->mc_name }} </td>
                                            
                                           
                                            <td class="center  ">{{ $blog_list->blog_created_date }}</td>
                                            
                                            <td class="center  ">
											<?php $pro_img = $auc_get_img;
				   $prod_path = url('').'/public/assets/default_image/No_image_blog.png'; ?>
				  @if($pro_img != '' )  {{--  blog image is not null --}}
					  
							<?php   $img_data = "public/assets/blogimage/".$pro_img; ?>
					     @if(file_exists($img_data))  {{--  blog image is exist in folder --}}
						 
						<?php 	 $prod_path = url('').'/public/assets/blogimage/'.$pro_img; ?>
						 
						 @else
						 
							 @if(isset($DynamicNoImage['blog'])) {{-- no_image  for blog is set in database --}}
										 <?php					
											$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['blog']; ?>
												@if($DynamicNoImage['blog'] !='' && file_exists($dyanamicNoImg_path)) {{-- no_image  for blog is set in file --}}
												 
												<?php	$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['blog']; ?>
												@endif
									     @endif
										 
						 
				  @endif
				  @else
						 
							 @if(isset($DynamicNoImage['blog'])) 
										 						
										<?php	$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['blog']; ?>
												@if($DynamicNoImage['blog'] !='' && file_exists($dyanamicNoImg_path))
												 <?php
													$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['blog']; ?>
												@endif
									     
							 @endif			 
						 @endif						
											<a href="#"><img style="height:40px;" src="{{ $prod_path }}"></a></td>
                                     <td class="text-center"><a href="{!! url('edit_blog').'/'.$blog_list->blog_id!!}" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT')}} @endif"><i class="icon icon-edit icon-2x"></i></a></td>
                                          <td class="text-center"><?php echo $process; ?></td>
					 <td class="text-center"><a href="{!! url('delete_blog_submit').'/'.$blog_list->blog_id.'/'.$blog_list->blog_type!!}" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DELETE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }} @endif"><i class="icon icon-trash icon-2x"></i></a></td>
                                            
                                            <td class="center  "><a href="{{  url('blog_details')."/".$blog_list->blog_id }}">@if (Lang::has(Session::get('admin_lang_file').'.BACK_VIEW_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_VIEW_DETAILS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_VIEW_DETAILS')}} @endif</a></td>
                                        </tr>
									<?php $i++;  ?>
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
    <script src="public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     <script src="<?php echo url('')?>/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
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
