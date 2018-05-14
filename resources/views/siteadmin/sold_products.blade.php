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
            <title>{{ $SITENAME }} |   @if (Lang::has(Session::get('admin_lang_file').'.BACK_SOLD_PRODUCTS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SOLD_PRODUCTS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SOLD_PRODUCTS')}} @endif   </title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport" />
            <meta content="" name="description" />
            <meta content="" name="author" />
            <meta name="_token" content="{!! csrf_token() !!}"/>
            <!--[if IE]>
            <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
            <!-- GLOBAL STYLES -->
            <!-- GLOBAL STYLES -->
            <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/bootstrap/css/bootstrap.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/main.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/theme.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
            @php 
            $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
            <link rel="shortcut icon" href="{{ url('')}}/public/assets/favicon/{{ $fav->imgs_name }}">
            @endif
            <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
            <link href="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                              <li class=""><a >Home</a></li>
                              <li class="active"><a >  @if (Lang::has(Session::get('admin_lang_file').'.BACK_SOLD_PRODUCTS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SOLD_PRODUCTS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SOLD_PRODUCTS')}}@endif                  </a></li>
                           </ul>
                        </div>
                     </div>
                     <center>
                        <div class="cal-search-filter">
                           {{ Form::open(array('action' => 'ProductController@sold_product','method'=> 'POST')) }}
                           <input type="hidden" name="_token"  value="{!! csrf_token() !!}">
                           <div class="row">
                              <br>
                              <div class="col-sm-3">
                                 <div class="item form-group">
                                    <div class="col-sm-6 date-top">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_FROM_DATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_FROM_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_FROM_DATE') }}</div>
                                    <div class="col-sm-6 place-size">
                                       <span class="icon-calendar cale-icon"></span>
                                       <input type="text" name="from_date" placeholder="DD/MM/YYYY" value="{{$from_date}}" class="form-control" id="datepicker-8" readonly>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-3">
                                 <div class="item form-group">
                                    <div class="col-sm-6 date-top">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_TO_DATE')!= ''))? trans(Session::get('admin_lang_file').'.BACK_TO_DATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_TO_DATE') }}</div>
                                    <div class="col-sm-6 place-size">
                                       <span class="icon-calendar cale-icon"></span>
                                       <input type="text" name="to_date" placeholder="DD/MM/YYYY" value="{{$to_date}}" id="datepicker-9" class="form-control" readonly>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="col-sm-2">
                                    <input type="submit" name="submit" class="btn btn-block btn-success" value="{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SEARCH')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SEARCH') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SEARCH') }}">
                                 </div>
                                 <div class="col-sm-2">
                                    <a href="<?php echo url('').'/sold_product';?>"><button type="button" name="reset" class="btn btn-block btn-info">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= ''))? trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button></a>
                                 </div>
                              </div>
                              {{ Form::close() }}
                           </div>
                     </center>
                     <div class="row">
                     <div class="col-lg-12">
                     <div class="box dark">
                     <header>
                     <div class="icons"><i class="icon-edit"></i></div>
                     <h5>  @if (Lang::has(Session::get('admin_lang_file').'.BACK_SOLD_PRODUCTS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SOLD_PRODUCTS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SOLD_PRODUCTS')}}@endif                </h5>
                     </header>
                     <div style="display: none;" class="la-alert date-select1 alert-success alert-dismissable">End date should be greater than Start date!
                     {{ Form::button('X',['class' => 'close closeAlert' , 'aria-hidden' => 'true']) }}
                     </div>
                     <div id="div-1" class="accordion-body collapse in body">
                     <div class="table-responsive panel_marg_clr ppd">
                     <table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
                     <thead>
                     <tr role="row">
                     <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 59px;" aria-label="S.No: activate to sort column ascending" aria-sort="ascending">{{ ((Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= ''))? trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 67px;" aria-label="Deals Name: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_NAME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_NAME')}} @endif</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 73px;" aria-label="Original Price($): activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_ORIGINAL_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ORIGINAL_PRICE')}}@endif({{ Helper::cur_sym() }})</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 88px;" aria-label="Discounted Price($): activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DISCOUNTED_PRICE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DISCOUNTED_PRICE')}} @endif({{ Helper::cur_sym() }})</th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 76px;" aria-label=" Deal Image : activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_IMAGE')!= '') {{ trans(Session::get('admin_lang_file').'.BACK_PRODUCT_IMAGE')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_IMAGE')}} @endif </th>
                     <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 68px;" aria-label="Deal details: activate to sort column ascending">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PRODUCT_DETAILS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PRODUCT_DETAILS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PRODUCT_DETAILS')}} @endif</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php 
                        $i = 1 ; ?>
                     @if(isset($_POST['submit']))
                     @foreach($soldrep as $product_list) 
                     @if($product_list->pro_no_of_purchase>=$product_list->pro_qty)
                     @php
                     $product_get_img = explode("/**/",$product_list->pro_Img); @endphp
                     <tr class="gradeA odd">
                     <td class="sorting_1">{{ $i }}</td>
                     <td class="  ">{{ substr($product_list->pro_title,0,45) }}</td>
                     <td class="center  ">{{ Helper::cur_sym() }} {{ $product_list->pro_price }}</td>
                     <td class="center  ">{{ Helper::cur_sym() }} <?php echo $product_list->pro_disprice; ?></td>
                     <td class="center  "><a ><img style="height:40px;" src="{{  url('') }}/public/assets/product/<?php echo $product_get_img[0]; ?>"></a></td>
                     <td class="center  "><a href="{{ url('product_details')."/".$product_list->pro_id }}">View</a>&nbsp;|&nbsp;<a href="{{  url('edit_product')."/".$product_list->pro_id }}">Edit</a></td>
                     </tr>
                     <?php $i++; ?>
                     @else
                     @endif
                     @endforeach
                     @else
                     @foreach($product_details as $product_list) 
                     @if($product_list->pro_no_of_purchase>=$product_list->pro_qty)
                     <?php  $product_get_img = explode("/**/",$product_list->pro_Img); ?>
                     <tr class="gradeA odd">
                     <td class="sorting_1">{{ $i }}</td>
                     <td class="  ">{{ substr($product_list->pro_title,0,45) }}</td>
                     <td class="center  ">{{ Helper::cur_sym() }} {{ $product_list->pro_price }}</td>
                     <td class="center  ">{{ Helper::cur_sym() }} {{ $product_list->pro_disprice }}</td>
                     <td class="center  ">
                     @php 
                     $pro_img = $product_get_img[0];
                     $prod_path = url('').'/public/assets/default_image/No_image_product.png'; @endphp
                     @if($product_get_img != '') {{--  image is null --}}
                     @php
                     $img_data = "public/assets/product/".$pro_img; @endphp
                     @if(file_exists($img_data) && $pro_img !='')  {{-- image not exists in folder  --}}
                     @php       
                     $prod_path = url('').'/public/assets/product/'.$pro_img;
                     @endphp
                     @else 
                     @if(isset($DynamicNoImage['productImg']))
                     @php                   
                     $dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg']; @endphp
                     @if($DynamicNoImage['productImg'] !='' && file_exists($dyanamicNoImg_path))
                     @php
                     $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg'];
                     @endphp
                     @endif
                     @endif
                     @endif
                     @else
                     @if(isset($DynamicNoImage['productImg'])) {{--  check no_image_product is exist  --}}
                     @php           
                     $dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['productImg']; @endphp
                     @if($DynamicNoImage['productImg'] !='' && file_exists($dyanamicNoImg_path))
                     @php
                     $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg'];
                     @endphp
                     @endif
                     @endif
                     @endif     
                     <a ><img style="height:40px;" src="{{ $prod_path }}"></a></td>
                     <td class="center  "><a href="{{ url('product_details')."/".$product_list->pro_id }}">@if (Lang::has(Session::get('admin_lang_file').'.BACK_VIEW')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_VIEW')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_VIEW')}} @endif</a>&nbsp;|&nbsp;<a href="{{ url('edit_product')."/".$product_list->pro_id }}">@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT')}}@endif</a></td>
                     </tr>
                     @php $i++;  @endphp
                     @else
                     @endif
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
               /*Start date end date check ends*/
            </script>  
            <!---Right Click Block Code---->
            <script language="javascript">
               document.onmousedown=disableclick;
               status="Cannot Access for this mode";
               function disableclick(event)
               {
                 if(event.button==2)
                  {
                    alert(status);
                    return false;    
                  }
               }
            </script>
            <script type="text/javascript">
               $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
               });
            </script>
            <!---F12 Block Code---->
            <script type='text/javascript'>
               $(document).keydown(function(event){
                   if(event.keyCode==123){
                   return false;
                  }
               else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
                     return false;  //Prevent from ctrl+shift+i
                  }
               });
               
               $(".closeAlert").click(function(){
                   $(".alert-success").hide();
                 });
               
            </script>
         </body>
         <!-- END BODY -->
      </html>