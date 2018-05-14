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
            <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_ADVERTISEMENT_BANNER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_ADVERTISEMENT_BANNER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_ADVERTISEMENT_BANNER') }}</title>
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
            <link href="public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                           <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_ADVERTISEMENT_BANNER')!= '') ? trans(Session::get('admin_lang_file').'.BACK_MANAGE_ADVERTISEMENT_BANNER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_ADVERTISEMENT_BANNER') }}</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="box dark">
                           <header>
                              <div class="icons"><i class="icon-edit"></i></div>
                              <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_ADVERTISEMENT_BANNER')!= '') ? trans(Session::get('admin_lang_file').'.BACK_MANAGE_ADVERTISEMENT_BANNER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_ADVERTISEMENT_BANNER') }} <label style="color:#f00">  [ {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MOBILE_USE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MOBILE_USE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MOBILE_USE') }}]</label></h5>
                           </header>
                           @if (Session::has('success'))
                           <div class="alert alert-success alert-dismissable">
                              {{ Form::button('x',['class' => 'close', 'data-dismiss' => 'alert', 'aria-hidden' => 'true']) }}
                              {!! Session::get('success') !!}
                           </div>
                           @endif
                           <div style="display: none;" class="la-alert rec-select alert-success alert-dismissable">Select atleast one Advertisement 
                              {{ Form::button('x',['class' => 'close closeAlert', 'aria-hidden' => 'true']) }}
                           </div>
                           <div style="display: none;" class="la-alert rec-update alert-success alert-dismissable">Record Updated Successfully
                              {{ Form::button('x',['class' => 'close closeAlert', 'aria-hidden' => 'true']) }}
                           </div>
                           <div class="manage-filter">
                              <span class="squaredFour">
                              <input  type="checkbox" name="chk[]" onchange="checkAll(this)" id="check_all"/>
                              <label for="check_all">Check all</label>
                              </span> &nbsp;
                              {{ Form::button('Block',['class' => 'btn btn-primary', 'id' => 'Block_value']) }}
                              {{ Form::button('Un Block',['class' => 'btn btn-warning', 'id' => 'UNBlock_value']) }}
                              <div class="row" style="clear: both;">
                                 <div class="col-lg-12">
                                    <div class="table-responsive panel_marg_clr ppd">
                                       <table id="dataTable" class="table table-bordered">
                                          <thead>
                                             <tr>
                                                <th></th>
                                                <th>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
                                                <th>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MAIN_CAT_TITLE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MAIN_CAT_TITLE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MAIN_CAT_TITLE') }}</th>
                                                <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_IMAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_IMAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_IMAGE') }}</th>
                                                <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }}</th>
                                                <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BLOCK') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK') }} / {{ (Lang::has(Session::get('admin_lang_file').'.BACK_UNBLOCK')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_UNBLOCK') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_UNBLOCK') }}>
                                                <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DELETE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }}</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php $i=1; ?>
                                             @if(!empty($mnge_banner) && $mnge_banner->count())
                                             @foreach($mnge_banner as $manage_ad_banner)
                                             <tr>
                                                <td  class="text-center">
                                                   <input type="checkbox" class="table_id" value="{{ $manage_ad_banner->cat_ad_id }}" name="chk[]">
                                                </td>
                                                <td>{{ $i++ }}</td>
                                                <td>{!! $manage_ad_banner->smc_name !!}</td>
                                                <td class="text-center">
                                                   <?php
                                                      $image = $manage_ad_banner->cat_ad_img; 
                                                          $explode = (explode('/**/',$image,-1)); ?>
                                                   @foreach($explode as $value) 
                                                   <?php   $pro_img = $value; 
                                                      $prod_path = url('').'/public/assets/default_image/No_image_banner.png'; ?>
                                                   @if($pro_img != '' )  {{--  banner image is not null --}}
                                                   <?php   $img_data = "public/assets/advertisement/".$pro_img; ?>
                                                   @if(file_exists($img_data))  {{--  banner image is exist in folder --}}
                                                   <?php   $prod_path = url('').'/public/assets/advertisement/'.$pro_img; ?>
                                                   @else
                                                   @if(isset($DynamicNoImage['category_banner'])) {{-- no_image  for banner is set in database --}}
                                                   <?php          
                                                      $dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['category_banner']; ?>
                                                   @if($DynamicNoImage['category_banner'] !='' && file_exists($dyanamicNoImg_path)) {{-- no_image  for banner is set in file --}}
                                                   <?php  $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['category_banner']; ?>
                                                   @endif
                                                   @endif
                                                   @endif
                                                   @else
                                                   @if(isset($DynamicNoImage['category_banner'])) 
                                                   <?php  $dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['category_banner']; ?>
                                                   @if($DynamicNoImage['category_banner'] !='' && file_exists($dyanamicNoImg_path))
                                                   <?php
                                                      $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['category_banner']; ?>
                                                   @endif
                                                   @endif      
                                                   @endif
                                                   <img src="{{ $prod_path }}" style="width:auto; height:60px;">
                                                   @endforeach
                                                </td>
                                                <td class="text-center"><a href="{!! url('edit_advertisement').'/'.$manage_ad_banner->cat_ad_id!!}" data-tooltip="Edit"><i class="icon icon-edit icon-2x"></i></a></td>
                                                <td class="text-center">
                                                   @if($manage_ad_banner->cat_ad_status == 0)
                                                   <a href="{!! url('status_advertisement_banner').'/'.$manage_ad_banner->cat_ad_id.'/'.'1'!!}" data-tooltip="Unblock"><i class="icon icon-ok icon-2x"></i></a>
                                                   @else 
                                                   <a href="{!! url('status_advertisement_banner').'/'.$manage_ad_banner->cat_ad_id.'/'.'0'!!}" data-tooltip="block"><i class="icon icon-ban-circle icon-2x icon-me"></i></a>
                                                   @endif
                                                </td>
                                                <td class="text-center"><a href="{!! url('delete_advertisement_banner').'/'.$manage_ad_banner->cat_ad_id!!}" data-tooltip="Delete"><i class="icon icon-trash icon-2x"></i></a></td>
                                             </tr>
                                             @endforeach
                                             @endif
                                          </tbody>
                                       </table>
                                    </div>
                                    {!! $mnge_banner->render() !!}
                                 </div>
                              </div>
                           </div>
                           <!--box dark-->
                        </div>
                        <!--col-lg-12-->
                     </div>
                     <!--row-->
                  </div>
                  <!--inner -->
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
                   $('#dataTable').dataTable();
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
                      url :"<?php echo url("block_ad_multiple"); ?>",
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
                      url :"<?php echo url("unblock_ad_multiple"); ?>",
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
               
               
            </script>
         </body>
         <!-- END BODY -->
      </html>