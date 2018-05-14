<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | Manage Categories </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
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
                            	<li class=""><a >Home</a></li>
                                <li class="active"><a >Manage Sub Categories</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Manage Sub Categories</h5>
            
        </header>
   
   @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">
	{{ Form::button('×',['class' => 'close','data-dismiss'=>'alert','aria-hidden' => 'true']) }}
	{!! Session::get('success') !!}</div>
		@endif
 <div class="row">
   	
    <div class="col-lg-11 panel_marg">
    
    	<table  class="table table-bordered"  id="dataTables-example">
              <thead>
                <tr>
                  <th style="width:10%;" class="text-center">S.No</th>
                  <th  class="text-center">Sub Category Name</th>
                  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_LISTING_SEC_SUBCATEGORY_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_LISTING_SEC_SUBCATEGORY_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_LISTING_SEC_SUBCATEGORY_IMAGE') }}</th>
                  <th style="text-align:center;">Main Category Name</th>
                  <th style="text-align:center;">Add Second Sub Category</th>
                  <th style="text-align:center;">Manage Second Sub Category</th>
                  <th style="text-align:center;">Edit</th>
                  <th style="text-align:center;">Status</th>
				  <!--<th style="text-align:center;">Delete</th>-->
                </tr>
              </thead>
              <tbody>
                @if(count($sub_catg_list)>0)
                <?php $i=1; ?>
                @foreach($sub_catg_list as $maincatg)
                <tr>
                  <td  class="text-center">{!!$i!!}</td>
                  <td class="text-center">{!! $maincatg->sb_name!!}</td>
                  <td class="text-center">
				  <?php  $pro_img = $maincatg->sc_img;
				   $prod_path = url('').'/public/assets/default_image/No_image_category.jpg'; ?>
				  @if($pro_img != '' ) {{-- check  image is not null --}}
					  
							<?php   $img_data = "public/assets/categoryimage/sub_category".$pro_img; ?>
					     @if(file_exists($img_data))
						 
						<?php 	 $prod_path = url('').'/public/assets/categoryimage/sub_category'.$pro_img; ?>
						 
						 @else
						 
							 @if(isset($DynamicNoImage['category'])) {{-- check no_image is updated in database --}}
										 <?php					
											$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['category']; ?>
												@if($DynamicNoImage['category'] !='' && file_exists($dyanamicNoImg_path)) {{-- check no_image is exist in file --}}
												 
												<?php	$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['category']; ?>
												@endif
									     @endif
										 
						 
				  @endif
				  @else
						 
							 @if(isset($DynamicNoImage['category'])) {-- check no_image is updated in database --}}
										 						
										<?php	$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['category']; ?>
												@if($DynamicNoImage['category'] !='' && file_exists($dyanamicNoImg_path)) {{-- check no_image is exist in file --}}
												 <?php
													$prod_path = url().'/public/assets/noimage/'.$DynamicNoImage['category']; ?>
												@endif
									     
							 @endif			 
						 @endif
				  
                    <img src="{{ $prod_path }}" style="height:40px;">
                  </td>
                  <td class="text-center">{!! $maincatg->smc_name!!}</td>
                  <td class="text-center"><a href="{!! url('add_secsub_main_category').'/'.$maincatg->sb_id!!}"><i class="icon-plus-sign"></i></a></td>
             <td class="text-center">@if($secsubcatg_count_list[$maincatg->sb_id]!=0) 
			 <a href="{!! url('manage_secsubmain_category').'/'.$maincatg->sb_id!!}">
			 <i class="icon-shopping-cart"></i><span style="color:#2574c4;padding-left:5px;">({!!$secsubcatg_count_list[$maincatg->sb_id]!!}) Categories </span></a>
			 @else <i class="icon-shopping-cart"></i><span style="color:#2574c4;padding-left:5px;">({!!$secsubcatg_count_list[$maincatg->sb_id]!!}) Categories </span>@endif</td>
				     <td class="text-center"><a href="{!! url('edit_secsub_main_category').'/'.$maincatg->sb_id!!}"><i class="icon icon-edit icon-2x"></i></a></td>
				   <td class="text-center">@if($maincatg->sb_status == 1)<a href="{!! url('status_sub_category_submit').'/'.$maincatg->sb_id.'/'.$maincatg->sb_smc_id.'/'.'0'!!}"><i class="icon icon-ok icon-2x"></i></a> @else  <a href="{!! url('status_sub_category_submit').'/'.$maincatg->sb_id.'/'.$maincatg->sb_smc_id.'/'.'1'!!}"> <i class="icon icon-ban-circle icon-2x icon-me"></i></a> @endif</td>
				   <!-- <td class="text-center"><a href="{!! url('delete_sub_category').'/'.$maincatg->sb_id.'/'.$maincatg->sb_smc_id!!}"><i class="icon icon-trash icon-2x"></i></a></td>-->
					
                </tr>
                <?php $i++;?>
                @endforeach
				  @else
               <tr><td colspan="8">No data found.</td></tr>
          @endif 
				
				

              </tbody>
            </table>
           
                   
                   <a href="javascript:history.back()" class="btn btn-warning btn-sm btn-grad pull-right" >Back</a>
                    
                   
                  
            
               <br><br>
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
    <!-- END GLOBAL SCRIPTS -->   
     <script src="{!!url('')!!}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{!!url('')!!}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
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
