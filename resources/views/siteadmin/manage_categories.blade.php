<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORIES')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORIES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CATEGORIES') }}</title>
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
                            	<li class=""><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORIES')!= '') ? trans(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORIES'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CATEGORIES') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORIES')!= '') ? trans(Session::get('admin_lang_file').'.BACK_MANAGE_CATEGORIES'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CATEGORIES') }}</h5>
            
        </header>
   
   @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">
	{{ Form::button('×',['class' => 'close','data-dismiss'=>'alert', 'aria-hidden' => 'true']) }}
	{!! Session::get('success') !!}</div>
		@endif
 <div class="row">
    
    <div class="col-lg-12">
    <div style="display: none;" class="la-alert rec-select alert-success alert-dismissable">Select atleast one Category  
	{{ Form::button('×',['class' => 'close','data-dismiss'=>'alert', 'aria-hidden' => 'true']) }}
         </div>

 <div style="display: none;" class="la-alert rec-update alert-success alert-dismissable">Record Updated Successfully
 {{ Form::button('×',['class' => 'close closeAlert', 'aria-hidden' => 'true']) }}
        </div>

<div class="manage-filter"><span class="squaredFour">
      <input  type="checkbox" name="chk[]" onchange="checkAll(this)" id="check_all"/>
      <label for="check_all">Check all</label>
    </span> &nbsp;
	{{ Form::button('Block',['class' => 'btn btn-primary', 'id' => 'Block_value']) }}
	{{ Form::button('Un Block',['class' => 'btn btn-warning', 'id' => 'UNBlock_value']) }}
	
    
              
               
</div>
         <div class="table-responsive panel_marg_clr ppd">
    	 <table aria-describedby="dataTables-example_info" class="table table-manage table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
              <thead>
                <tr>
                <th style="" class="text-center"></th>

                  <th style="" class="text-center">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
                  <th  class="text-center">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY_NAME')!= '') ? trans(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TOP_CATEGORY_NAME') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_TOP_CATEGORY_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TOP_CATEGORY_IMAGE') }}</th>
				   <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_MAIN_CATEGORY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_MAIN_CATEGORY'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_MAIN_CATEGORY')}}</th>
				    <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_MAIN_CATEGORY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_MAIN_CATEGORY'): trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_MAIN_CATEGORY') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }}</th>
				   <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_STATUS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_STATUS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_STATUS') }}</th>
				 <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_DELETE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; ?>
                 @if(count($maincatg_list)>0)  

                @foreach($maincatg_list as $maincatg)
                <tr>
                 <td  class="text-center">
                   <input type="checkbox" class="table_id" value="{{ $maincatg->mc_id }}" name="chk[]">
                </td>
                  <td  class="text-center">{!!$i!!}</td>
                  <td class="text-center">{!! $maincatg->mc_name!!}</td>
                  <td class="text-center">
				  
				<?php  $pro_img = $maincatg->mc_img;
				   $prod_path = url('').'/public/assets/default_image/No_image_category.jpg'; ?>
				  @if($pro_img != '' ) {{-- check  image is not null --}}
					  
							<?php   $img_data = "public/assets/categoryimage/".$pro_img; ?>
					     @if(file_exists($img_data))
						 
						<?php 	 $prod_path = url('').'/public/assets/categoryimage/'.$pro_img; ?>
						 
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
													$prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['category']; ?>
												@endif
									     
							 @endif			 
						 @endif
							                            
                                    <img src="{{ $prod_path }}" style="height:40px;">		  
				  
				 </td>
                  <td class="text-center"><a href="{!! url('add_main_category').'/'.$maincatg->mc_id!!}" data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_MAIN_CATEGORY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_MAIN_CATEGORY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_MAIN_CATEGORY') }}"><i class="icon-plus-sign icon-2x"></i></a></td>
                  <td class="text-center">
                  @if($maincatg_sub_list[$maincatg->mc_id]!=0)<a href="{!! url('manage_main_category').'/'.$maincatg->mc_id!!}"><i class="icon-shopping-cart icon-2x"></i><span style="color:#2574c4;padding-left:5px;">( {!! $maincatg_sub_list[$maincatg->mc_id]!!} ) {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CATEGORIES')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CATEGORIES'): trans($ADMIN_OUR_LANGUAGE.'.BACK_CATEGORIES') }} </span></a>@else <i class="icon-shopping-cart icon-2x"></i><span style="color:#2574c4;padding-left:5px;">( {!! $maincatg_sub_list[$maincatg->mc_id]!!}   )   {{ (Lang::has(Session::get('admin_lang_file').'.BACK_CATEGORIES')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CATEGORIES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CATEGORIES') }} </span>@endif</td>
				     <td class="text-center"><a href="{!! url('edit_category').'/'.$maincatg->mc_id!!}" data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }}"><i class="icon icon-edit icon-2x"></i></a></td>
				   <td class="text-center">@if($maincatg->mc_status == 1)<a href="{!! url('status_category_submit').'/'.$maincatg->mc_id.'/'.'0'!!}" data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BLOCK') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK') }}"><i class="icon icon-ok icon-2x"></i></a> @else  <a href="{!! url('status_category_submit').'/'.$maincatg->mc_id.'/'.'1'!!}" data-tooltip="{{  (Lang::has(Session::get('admin_lang_file').'.BACK_UNBLOCK')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_UNBLOCK') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_UNBLOCK') }}"> <i class="icon icon-ban-circle icon-2x icon-me"></i></a> @endif</td>
				  <td class="text-center">
				 
					<?php 
					$check_cat_avail_in_pro = DB::table('nm_product')->where('pro_mc_id','=',$maincatg->mc_id)->where('pro_status','!=',2)->count();
					$check_cat_avail_in_deal = DB::table('nm_deals')->where('deal_category','=',$maincatg->mc_id)->count();
					$count_deal_and_product = $check_cat_avail_in_pro + $check_cat_avail_in_deal; ?>
					@if($count_deal_and_product == 0)
				    
				  
				  <a href="{!! url('delete_category').'/'.$maincatg->mc_id!!}" data-tooltip=" {{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DELETE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }}"><i class="icon icon-trash icon-2x"></i></a>
				  @else {{ '---' }}   @endif
				  </td>
					
                </tr>
                <?php $i++;?>
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
   
     <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>

      <!-- PAGE LEVEL SCRIPTS -->
    <script src="{{ url('') }}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
         

             $('#dataTables-example').dataTable();
         });
<?php if(count($maincatg_list)>0) {  ?>
         $(document).ready(function() {
  setTimeout(function() {
     $('select[name="dataTables-example_length"]').on('change', function(){    
    
    var k=$(this).val(); 

    $('#sele').val(k)  
});
  }, 5);
});
         <?php } ?>
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
<?php if(count($maincatg_list)>0) {  ?>
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
          url :"<?php echo url("block_status_category_submit"); ?>",
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
          url :"<?php echo url("unblock_status_category_submit"); ?>",
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

    });


  

  $(".closeAlert").click(function(){
    $(".alert-success").hide();
  });
<?php } ?>
    </script> 

</body>
     <!-- END BODY -->
</html>
