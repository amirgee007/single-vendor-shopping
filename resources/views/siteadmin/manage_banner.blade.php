<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{  $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_BANNER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_BANNER') }}</title>
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
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_BANNER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_BANNER') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_BANNER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_BANNER') }}</h5>
            
        </header>   
   @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">
	{{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert' , 'aria-hidden' => 'true']) }}
	{!! Session::get('success') !!}</div>
		@endif
		<div style="display: none;" class="la-alert rec-select alert-success alert-dismissable">Select atleast one Banner 
		{{ Form::button('x',['class' => 'close closeAlert', 'aria-hidden' => 'true']) }}
         </div>
		 <div style="display: none;" class="la-alert rec-update alert-success alert-dismissable">Record Updated Successfully
		 {{ Form::button('x',['class' => 'close closeAlert', 'aria-hidden' => 'true']) }}
         </div>

    <div class="manage-filter"><span class="squaredFour">
      <input  type="checkbox" name="chk[]" onchange="checkAll(this)" id="check_all"/>
      <label for="check_all">Check all</label> 
    </span> &nbsp;
	{{ Form::button('Block',['class' => 'btn btn-primary', 'id' => 'Block_value' ]) }}
	{{ Form::button('Un Block',['class' => 'btn btn-warning', 'id' => 'UNBlock_value' ]) }}
	{{ Form::button('Delete',['class' => 'btn btn-danger', 'id' => 'Delete_value' ]) }}
    
    
  <br><br>
   <div class="row">
   	
    <div class="col-lg-12">
      <div class="table-responsive panel_marg_clr ppd">
    	<table id="dataTable" class="table table-bordered">
              <thead>
                <tr>
				<th></th>
                  <th>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
                  <th>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE_TITLE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE_TITLE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE_TITLE') }}</th>
                  <th  style="width:50%;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_REDIRECT_URL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_REDIRECT_URL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_REDIRECT_URL') }}</th>
                  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BLOCK') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK') }} / {{ (Lang::has(Session::get('admin_lang_file').'.BACK_UNBLOCK')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UNBLOCK') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UNBLOCK') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DELETE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }}</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=1; ?>
                @if(count($mnge_banner)>0)  
                @foreach($mnge_banner as $mnge_banner_list)
                <tr>
				<td  class="text-center">
                   <input type="checkbox" class="table_id" value="{{ $mnge_banner_list->bn_id }}" name="chk[]">
                </td>
                  <td>{!!$i!!}</td>
                  <td>{!! $mnge_banner_list->bn_title !!}</td>
                  <td>{!! $mnge_banner_list->bn_redirecturl !!}</td>
                  <td class="text-center">
				  
				  <?php 
				   $pro_img = $mnge_banner_list->bn_img;
				   $prod_path = url('').'/public/assets/default_image/No_image_banner.png'; ?>
				  @if($mnge_banner_list->bn_img != '' ) 
					  
							<?php   $img_data = "public/assets/bannerimage/".$pro_img; ?>
					     @if(file_exists($img_data))
						 
						<?php 	 $prod_path = url('').'/public/assets/bannerimage/'.$pro_img; ?>
						 
						 @else
						 
							 @if(isset($DynamicNoImage['banner'])) 
										 <?php					
											$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['banner']; ?>
												@if($DynamicNoImage['banner'] !='' && file_exists($dyanamicNoImg_path))
												 
												<?php	$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['banner']; ?>
												@endif
									     @endif
										 
						 
				  @endif
				  @else
						 
							 @if(isset($DynamicNoImage['banner'])) 
										 						
										<?php	$dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['banner']; ?>
												@if($DynamicNoImage['banner'] !='' && file_exists($dyanamicNoImg_path))
												 <?php
													$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['banner']; ?>
												@endif
									     
							 @endif			 
						 @endif
				 <!-- <img src="{!! url('public/assets/bannerimage/').'/'.$mnge_banner_list->bn_img!!}" style="height:40px;">-->
				 <img src="{!! $prod_path !!}" style="height:40px;">
				  </td>
				   <td class="text-center"><a href="{!! url('edit_banner_image').'/'.$mnge_banner_list->bn_id!!}" data-tooltip="Edit"><i class="icon icon-edit icon-2x"></i> </a></td>
                   	
				    <td class="text-center">@if($mnge_banner_list->bn_status == 0)<a href="{!! url('status_banner_submit').'/'.$mnge_banner_list->bn_id.'/'.'1'!!}" data-tooltip="Unblock"><i class="icon icon-ok icon-2x"></i>
                  </a> @else  <a href="{!! url('status_banner_submit').'/'.$mnge_banner_list->bn_id.'/'.'0'!!}" data-tooltip="block">
                   <i class="icon icon-ban-circle icon-2x icon-me"></i></a>@endif</td>
					 <td class="text-center"><a href="{!! url('delete_banner_submit').'/'.$mnge_banner_list->bn_id!!}" data-tooltip="Delete"><i class="icon icon-trash icon-2x"></i></a></td>
                </tr>
                <?php $i++;?>
                @endforeach
              @else
                <tr><td colspan="7">No data found.</td></tr>
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
   <!--  <script src="<?php echo url('');?>/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo url('');?>/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTable').dataTable();
         });
    </script>  -->
     <script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>

<script type="text/javascript">
	  //Check all checked box
		 function checkAll(ele) {
  
  
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }

  //To block multiple checked
  $(function(){
    
      $('#Block_value').click(function(){
         $(".rec-select").css({"display" : "none"});
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });  console.log(val);


         if(val=='')
         {

         $(".rec-select").css({"display" : "block"});
     
         return;
         }


        $.ajax({

          type:'GET',
          url :"<?php echo url("block_banner_multiple"); ?>",
          data:{val:val},

          success:function(data,success){
			 
             
            
            if(data==0){
              $(".rec-update").css("display", "block");
                window.setTimeout(function(){location.reload()},1000)
            
                       }
            else if(data==1){
               $(".rec-update").css("display", "block");
                  window.setTimeout(function(){location.reload()},1000)
             
                           }
          }
        }); });

    });
	
//To unblock multiple checked

   $(function(){

   
    
      $('#UNBlock_value').click(function(){
          $(".rec-select").css("display", "none");
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });  console.log(val);

         if(val=='')
         {
          //location.reload();
        $(".rec-select").css("display", "block");
          return;
         }


        $.ajax({


          type:'GET',
          url :"<?php echo url("unblock_banner_multiple"); ?>",
          data:{val:val},

          success:function(data,success){
            if(data==0){
            $(".rec-update").css("display", "block");
                window.setTimeout(function(){location.reload()},1000)
                       }
            else if(data==1){
              $(".rec-update").css("display", "block");
      
              //location.reload();
               window.setTimeout(function(){location.reload()},1000)
                           }
          }
        }); });

		
//multiple delete

  $(function(){
    
      $('#Delete_value').click(function(){
        $(".rec-select").css({"display" : "none"});
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });  console.log(val);

         if(val=='')
         {
          $(".rec-select").css({"display" : "block"});
          return;
         }


        $.ajax({

          type:'GET',
          url :"<?php echo url("delete_banner_multiple"); ?>",
          data:{val:val},

          success:function(data,success){
            if(data==0){
              $(".rec-update").css("display", "block");
                window.setTimeout(function(){location.reload()},1000)
                       }
            else if(data==1){
               $(".rec-update").css("display", "block");
                window.setTimeout(function(){location.reload()},1000)
                           }
          }
        }); });

    });		
		
    });
	 $(".closeAlert").click(function(){
    $(".alert-success").hide();
  });
 
 </script>
</body>
     <!-- END BODY -->
</html>
