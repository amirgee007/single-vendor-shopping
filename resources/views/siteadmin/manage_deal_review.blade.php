<!DOCTYPE html>
<!--[if IE 8]> 
<html lang="en" class="ie8">
   <![endif]-->
   <!--[if IE 9]> 
   <html lang="en" class="ie9">
      <![endif]-->
      <!--[if !IE]><!--> 
      <html lang="en">
         <!--<![endif]-->
         <!-- BEGIN HEAD -->
         <head>
            <meta charset="UTF-8" />
            <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_REVIEWS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_REVIEWS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_REVIEWS')}} @endif </title>
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
            <link href="public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                              <li class="active"><a >  {{ ((Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_DEAL_REVIEWS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_MANAGE_DEAL_REVIEWS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_DEAL_REVIEWS') }}</a></li>
                           </ul>
                        </div>
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
                           <div class="box dark">
                              <header>
                                 <div class="icons"><i class="icon-edit"></i></div>
                                 <h5>{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_DEAL_REVIEWS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_MANAGE_DEAL_REVIEWS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_DEAL_REVIEWS') }}</h5>
                              </header>
                              @if(Session::has('block_message'))
                              <div class="alert alert-success alert-dismissable">{!! Session::get('block_message') !!}
                                 {{ Form::button('x', array('class' => 'close','aria-hidden' => 'true', 'data-dismiss' =>'alert')) }}
                              </div>
                              @endif
                              <div id="div-1" class="accordion-body collapse in body">
                                 <div class="table-responsive panel_marg_clr ppd">
                                    <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                       <thead>
                                          <tr role="row">
										  <th></th>
                                             <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 59px;" aria-label="S.No: activate to sort column ascending" aria-sort="ascending">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
                                             <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 76px;" aria-label="Store Name: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_PUBLISH')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_REVIEW_TITLE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_REVIEW_TITLE')}} @endif</th>
                                             <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 67px;" aria-label="Deals Name: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_NAME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_NAME')}} @endif</th>
                                             <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 76px;" aria-label="Store Name: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CUSTOMER_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CUSTOMER_NAME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CUSTOMER_NAME')}} @endif</th>
                                             <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 71px;" aria-label="Actions: activate to sort column ascending">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_ACTIONS')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ACTIONS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ACTIONS') }}</th>
                                             <!-- <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 74px;" aria-label="Preview: activate to sort column ascending">Preview</th> -->
                                       </thead>
                                       <tbody>
                                          @php $i = 1 ; @endphp
                                          @if(count($get_deal_review)>0)
                                          @foreach($get_deal_review as $row)  
                                          <tr class="gradeA odd">
										     <td  class="text-center">
										     <input type="checkbox" class="table_id" value="{{ $row->comment_id }}" name="chk[]">
										     </td>
                                             <td class="sorting_1">{{ $i }}</td>
                                             <td class="  ">{{ $row->title }}</td>
                                             <td class="  ">{{ substr($row->deal_title,0,45) }}</td>
                                             <td class="center  ">{{ $row->cus_name }}</td>
                                             <td class="center  "><a href="#">
                                                <a href="{{ url('edit_deal_review/'.$row->comment_id) }}" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT')}} @endif"> <i class="icon icon-edit" style="margin-left:15px;"></i></a>
                                                @if($row->status == 0)
                                                <a href="{{ url('block_deal_review/'.$row->comment_id.'/1') }}" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_UNBLOCK')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_UNBLOCK')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_UNBLOCK')}} @endif"> <i style='margin-left:10px;' class='icon icon-ok icon-me'></i> </a>
                                                @elseif($row->status == 1) 
                                                <a href="{{ url('block_deal_review/'.$row->comment_id.'/0') }}" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_BLOCK')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK')}}@endif"> <i style='margin-left:10px;' class='icon icon-ban-circle icon-me'></i> </a>
                                                @endif
                                                <a href="{{ url('delete_deal_review')."/".$row->comment_id }}" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DELETE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE')}} @endif"><i class="icon icon-trash icon-1x" style="margin-left:14px;"></i></a> 
                                                <?php ?>
                                             </td>
                                          </tr>
                                          <?php $i++; 
                                             ?>
                                          @endforeach
                                          @endif
                                       </tbody>
                                    </table>
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
                     prevText:"<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CLICK_FOR_PREVIOUS_MONTHS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CLICK_FOR_PREVIOUS_MONTHS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CLICK_FOR_PREVIOUS_MONTHS');} ?>",
                     nextText:"<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CLICK_FOR_NEXT_MONTHS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CLICK_FOR_NEXT_MONTHS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CLICK_FOR_NEXT_MONTHS');} ?>",
                     showOtherMonths:true,
                     selectOtherMonths: true
                  });
               });
            </script>
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
          url :"<?php echo url("block_deal_review_multiple"); ?>",
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
          url :"<?php echo url("unblock_deal_review_multiple"); ?>",
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
          url :"<?php echo url("delete_deal_review_multiple"); ?>",
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