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
            <title><?php echo $SITENAME; ?> | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CUSTOMERS')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MANAGE_CUSTOMERS');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CUSTOMERS');} ?>                 </title>
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
            <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
            @php
            $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp
            @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
            <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
            @endif 
            <link href="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
            <!--END GLOBAL STYLES -->
            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->
			
           <!--<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">-->
			<link href="{{ url('')}}/public/assets/css/jquery-ui.css" rel="stylesheet">

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
                           <li class=""><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }} @endif</a></li>
                           <li class="active"><a> @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CUSTOMERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_CUSTOMERS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CUSTOMERS') }} @endif                    </a></li>
                        </ul>
                     </div>
                  </div>
                  <center>
                     <div class="cal-search-filter">
                        {!! Form::open(array('action'=>'CustomerController@manage_customer','method'=>'POST')) !!}
                        <input type="hidden" name="_token"  value="{!! csrf_token() !!}">
                        <div class="row">
                           <br>
                           <div class="col-sm-3">
                              <div class="item form-group">
                                 <div class="col-sm-6 date-top">@if (Lang::has(Session::get('admin_lang_file').'.BACK_FROM_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_FROM_DATE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_FROM_DATE') }} @endif</div>
                                 <div class="col-sm-6 place-size">
                                    <span class="icon-calendar cale-icon"></span>
                                    <input type="text" name="from_date" placeholder="DD/MM/YYYY"  class="form-control" id="datepicker-8" value="{{$from_date}}" required readonly >
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="item form-group">
                                 <div class="col-sm-6 date-top">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TO_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TO_DATE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TO_DATE') }} @endif</div>
                                 <div class="col-sm-6 place-size">
                                    <span class="icon-calendar cale-icon"></span>
                                    <input type="text" name="to_date" placeholder="DD/MM/YYYY"  id="datepicker-9" class="form-control" value="{{$to_date}}" required readonly ">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-2">
                                 <input type="submit" name="submit" class="btn btn-block btn-success" value="@if (Lang::has(Session::get('admin_lang_file').'.BACK_SEARCH')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SEARCH') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SEARCH') }} @endif">
                              </div>
                              <div class="col-sm-2">
                                 <a href="{{ url('').'/manage_customer' }}"><button type="button" name="reset" class="btn btn-block btn-info">@if (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RESET') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }} @endif</button></a>
                              </div>
                           </div>
                           {{ Form::close() }}
                  </center>
                  <div class="row">
                  <div class="col-lg-12">
                  <div class="box dark">
                  <header>
                  <div class="icons"><i class="icon-edit"></i></div>
                  <h5>  @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CUSTOMERS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_CUSTOMERS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CUSTOMERS') }} @endif                    </h5>
                  </header>
                  @if (Session::has('updated_result'))
                  <div class="alert alert-success alert-dismissable">{!! session('updated_result') !!}
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                  @endif
                  @if (Session::has('insert_result'))
                  <div class="alert alert-success alert-dismissable">{!! Session::get('insert_result') !!}
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                  @endif
                  @if (Session::has('delete_result'))
                  <div class="alert alert-success alert-dismissable">{!! Session::get('delete_result') !!}
                  <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button></div>
                  @endif
                  <div style="display: none;" class="la-alert rec-select alert-success alert-dismissable">Select atleast one Customer  
                  <button type="button" class="close closeAlert"  aria-hidden="true">×</button></div>
                  <div style="display: none;" class="la-alert date-select1 alert-success alert-dismissable">End date should be greater than Start date!
                  <button type="button" class="close closeAlert"  aria-hidden="true">×</button></div>
                  <div style="display: none;" class="la-alert rec-update alert-success alert-dismissable">Record Updated Successfully
                  <button type="button" class="close closeAlert"  aria-hidden="true">×</button></div>
                  <div class="manage-filter"><span class="squaredFour">
                  {{ Form::checkbox('chk[]','',null,array('id'=>'check_all','onchange'=>'checkAll(this)'))}}{{ Form::label('check_all','Check all')}}
                  <!-- <input  type="checkbox" name="chk[]" onchange="checkAll(this)" id="check_all"/>
                     <label for="check_all">Check all</label> -->
                  </span>
                  {{ Form::button('Block',array('id'=>'Block_value','class'=>'btn btn-primary')) }}
                  {{ Form::button('Un Block',array('id'=>'UNBlock_value','class'=>'btn btn-warning')) }}
                  {{ Form::button('Delete',array('id'=>'Delete_value','class'=>'btn btn-warning')) }}
                     <a type="button" class="btn btn-danger">Update Roles</a>
                  <!--  <input class="btn btn-primary" type="button" id="Block_value"  value="Block" />
                     <input class="btn btn-warning" type="button" id="UNBlock_value"  value="Un Block" />
                     <input class="btn btn-warning" type="button" id="Delete_value"  value="Delete" /> -->
                  </div>
                  <div id="div-1" class="accordion-body collapse in body">
                  <div class="table-responsive panel_marg_clr ppd">
                  <table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
                  <thead>
                  <tr role="row">
                  <th aria-label="S.No: activate to sort column ascending" style="width: 61px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc" aria-sort="ascending"></th>
                  <th aria-label="S.No: activate to sort column ascending" style="width: 61px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc" aria-sort="ascending">S.No</th>
                  <th aria-label="Product Name: activate to sort column ascending" style="width: 69px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NAME') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NAME') }} @endif</th>
                  <th aria-label="City: activate to sort column ascending" style="width: 81px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EMAIL') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL') }} @endif</th>
                  <th aria-label="Store Name: activate to sort column ascending" style="width: 78px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_CITY')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_CITY') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY') }} @endif</th>
                  <th aria-label="Original Price($): activate to sort column ascending" style="width: 75px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_JOINED_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_JOINED_DATE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_JOINED_DATE') }} @endif</th>
                  <th aria-label=" Product Image : activate to sort column ascending" style="width: 78px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }} @endif</th>
                  <th aria-label="Send Mail: activate to sort column ascending" style="width: 64px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_STATUS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_STATUS') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_STATUS') }} @endif</th>
                  <th aria-label="Actions: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DELETE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }} @endif</th>
                  <th aria-label="Hot deals: activate to sort column ascending" style="width: 65px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_LOGIN_TYPE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_LOGIN_TYPE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_LOGIN_TYPE') }} @endif</th>
                  </tr>
                  </thead>

                  <tbody>


                  @php $i = 1 ; @endphp
                  @if(isset($_POST['submit']))
                  @if(count($customerrep)>0)
                  @foreach($customerrep as $row)
                  @php $logintype=""; @endphp
                  @if($row->cus_logintype==1)
                  @php $logintype="Admin User";@endphp
                  @elseif($row->cus_logintype==2)
                  @php $logintype="Website User"; @endphp
                  @elseif($row->cus_logintype==3)
                  @php $logintype="Facebook User"; @endphp
				  @elseif($row->cus_logintype==4)
                  @php $logintype="Google+  User"; @endphp
                  @endif
                  <tr class="gradeA odd">
                  <td class="sorting_1">{{ $i }}</td>
                  <td class="sorting_1">{{ $i }}</td>
                  <td class="  ">{{  $row->cus_name }}</td>
                  <td class="  ">{{  $row->cus_email }}</td>
                  <td class="center  ">{{   $row->ci_name }}</td>
                  <td class="center  ">{{   $row->cus_joindate }}</td>
                  <td class="center    ">  <a href="{{ url('edit_customer/'.$row->cus_id) }}" data-tooltip="Edit"
                     > <i class="icon icon-edit icon-2x" style="margin-left:15px;"></i></a></td>
                  <td class="text-center">@if($row->cus_status==0)
                  <a href="{!! url('status_customer_submit').'/'.$row->cus_id.'/'.'1'!!}" data-tooltip="block"><i class="icon icon-ok icon-2x"></i>
                  </a> @else  <a href="{!! url('status_customer_submit').'/'.$row->cus_id.'/'.'0'!!}" data-tooltip="Unblock"
                     >
                  <i class="icon icon-ban-circle icon-2x icon-me"></i></a> @endif</td>
                  <td class="center    ">  <a href="{{ url('delete_customer/'.$row->cus_id) }}" data-tooltip="Delete"> <i class="icon icon-trash icon-2x" style="margin-left:15px;"></i></a></td>
                  <td class="center">{{ $logintype }}</td>
                  </tr>
                  @php $i++; @endphp       
                  @endforeach @endif
                  @else
                  @if(count($customerresult)>0)
                  @foreach($customerresult as $customerdetails)  
                  @php $logintype=""; @endphp
                  @if($customerdetails->cus_logintype==1)
                  @php $logintype = ((Lang::has(Session::get('admin_lang_file').'.BACK_ADMIN_USER')!= ''))? trans(Session::get('admin_lang_file').'.BACK_ADMIN_USER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADMIN_USER'); @endphp
                  @elseif($customerdetails->cus_logintype==2)
                  @php  $logintype = ((Lang::has(Session::get('admin_lang_file').'.BACK_WEBSITE_USER')!= ''))? trans(Session::get('admin_lang_file').'.BACK_WEBSITE_USER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_WEBSITE_USER'); @endphp
                  @elseif($customerdetails->cus_logintype==3)
                  @php $logintype = ((Lang::has(Session::get('admin_lang_file').'.BACK_FACEBOOK_USER')!= ''))? trans(Session::get('admin_lang_file').'.BACK_FACEBOOK_USER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FACEBOOK_USER'); @endphp
				  @elseif($customerdetails->cus_logintype==4)
                  @php $logintype = ((Lang::has(Session::get('admin_lang_file').'.BACK_GOOGLEPLUS_USER')!= ''))? trans(Session::get('admin_lang_file').'.BACK_GOOGLEPLUS_USER') : trans($ADMIN_OUR_LANGUAGE.'.BACK_GOOGLEPLUS_USER'); @endphp
                  @endif
                  <tr class="gradeA odd">
                  <td  class="text-center">
                  <input type="checkbox" class="table_id" value="{{ $customerdetails->cus_id }}" name="chk[]">
                  </td>
                  <td class="sorting_1">{{ $i }}</td>
                  <td class="  ">{{  $customerdetails->cus_name }}</td>
                  <td class="  ">{{  $customerdetails->cus_email }}</td>
                  <td class="center  ">{{  $customerdetails->ci_name }}</td>
                  <td class="center  ">{{ $customerdetails->cus_joindate }}</td>
                  <td class="center">  <a href="{{ url('edit_customer/'.$customerdetails->cus_id) }}" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }} @endif"> <i class="icon icon-edit icon-2x" style="margin-left:15px;"></i></a></td>
                  <td class="text-center">@if($customerdetails->cus_status==0) <a href="{!! url('status_customer_submit').'/'.$customerdetails->cus_id.'/'.'1'!!}" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_BLOCK') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK') }} @endif"><i class="icon icon-ok icon-2x"></i>
                  </a> @else  <a href="{!! url('status_customer_submit').'/'.$customerdetails->cus_id.'/'.'0'!!}" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_UNBLOCK')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_UNBLOCK') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_UNBLOCK') }} @endif">
                  <i class="icon icon-ban-circle icon-2x icon-me"></i></a> @endif</td>
                  <td class="center    ">  <a href="{{ url('delete_customer/'.$customerdetails->cus_id) }}" data-tooltip="@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_DELETE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }} @endif"> <i class="icon icon-trash icon-2x" style="margin-left:15px;"></i></a></td>
                  <td class="center">{{ $logintype }}</td>
                  </tr>
                  @php  $i++; @endphp 
                  @endforeach  @endif
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
			
           <!--<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->
		   <script src="{{url('')}}/public/assets/js/jquery-ui.js"></script>
		  
            <script>
               $(function() {
                  $( "#datepicker-8" ).datepicker({
                     prevText:"click for previous months",
                     nextText:"click for next months",
                     showOtherMonths:true,
                     selectOtherMonths: false
               
                  });
                  $( "#datepicker-9" ).datepicker({
                     prevText:"click for previous months",
                     nextText:"click for next months",
                     showOtherMonths:true,
                     selectOtherMonths: true
                  });
               });
               
               /** Check start date and end date**/
               $("#datepicker-8,#datepicker-9").change(function() {
               var startDate = document.getElementById("datepicker-8").value;
               var endDate = document.getElementById("datepicker-9").value;
               if (this.id == 'datepicker-8') {
                    if ((Date.parse(endDate) <= Date.parse(startDate))) {
                          $('#datepicker-8').val('');
                         $(".date-select1").css({"display" : "block"});
                          return false;
                      }
                  } 
               
                   if(this.id == 'datepicker-9') {
                      if ((Date.parse(endDate) <= Date.parse(startDate))) {
                          $('#datepicker-9').val('');
                           $(".date-select1").css({"display" : "block"});
                           return false;
                          //alert("End date should be greater than Start date");
                      }
                      }
                      
                  
               //document.getElementById("ed_endtimedate").value = "";
               
               });
               
               
               
               
            </script>
            <script type="text/javascript">
               $.ajaxSetup({
                   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
               });
            </script>
            <!-- PAGE LEVEL SCRIPTS -->
            <script src="<?php echo url('')?>/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
            <script src="<?php echo url('')?>/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
            <script>
               $(document).ready(function () {
                     
               
                         $('#dataTables-example').dataTable();
                     });
               
                     $(document).ready(function() {
               setTimeout(function() {
                 $('select[name="dataTables-example_length"]').on('change', function(){    
                
                var k=$(this).val(); 
               
                $('#sele').val(k)  
               });
               }, 5);
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
                      url :"<?php echo url("block_status_customer_submit"); ?>",
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
                      url :"<?php echo url("unblock_status_customer_submit"); ?>",
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
                      url :"<?php echo url("delete_customer_page_multiple"); ?>",
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