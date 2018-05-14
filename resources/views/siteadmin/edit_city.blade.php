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
            <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_CITY')  }}</title>
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
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/plan.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
            @php  
            $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
            <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
            @endif     
            <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
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
                           <li class=""><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ? trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                           <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_CITY') }}</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="box dark">
                           <header>
                              <div class="icons"><i class="icon-edit"></i></div>
                              <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_CITY') }}</h5>
                           </header>
                           @if ($errors->any()) 
                           <div class="alert alert-warning alert-dismissable">
                              {{ Form::button('×',['class' => 'close' , 'data-dismiss' => 'alert','aria-hidden' => 'true']) }}
                              {!! implode('', $errors->all('
                              <li>:message</li>
                              ')) !!}
                           </div>
                           @endif
                           @if (Session::has('error'))
                           <div class="alert alert-danger alert-dismissable">
                              {{ Form::button('×',['class' => 'close' , 'data-dismiss' => 'alert','aria-hidden' => 'true']) }}
                              {!! Session::get('error') !!}
                           </div>
                           @endif
                           <div id="div-1" class="accordion-body collapse in body">
                              <div class="row">
                                 <div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                                    {!! Form::open(array('url'=>'edit_city_submit','class'=>'form-horizontal', 'accept-charset' => 'UTF-8')) !!}
                                    @foreach($cityresult as $cityres)
                                    <div class="panel panel-default">
                                       <div class="panel-heading">
                                          {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_CITY') }}
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COUNTRY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY') }}<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <select class="validate[required] form-control" id="country_name" name="country_name">
                                                   @foreach($country_details as $country_det)
                                                   <option value="{!! $country_det->co_id!!}" <?php if($country_det->co_id == $cityres->ci_con_id){?> selected <?php } ?>>{!! $country_det->co_name!!} </option>
                                                   @endforeach        
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CITY_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CITY_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY_NAME') }} <span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                {{ Form::text('city_name',$cityres->ci_name,['class' => 'form-control','id' => 'city_name', 'onkeyup' => 'validate()']) }}
                                                {{ Form::hidden('city_id',$cityres->ci_id,['class' => 'form-control','id' => 'city_id']) }}
                                             </div>
                                          </div>
                                       </div>
                                       @if(!empty($get_active_lang))  
                                       @foreach($get_active_lang as $get_lang) 
                                       <?php  $get_lang_name = $get_lang->lang_name;
                                          $get_lang_code = $get_lang->lang_code;
                                          $city_name_dynamic = 'ci_name_'.$get_lang_code; 
                                          ?>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             {!! Html::decode(Form::label('','City Name({{ $get_lang_name }})<span class="text-sub">*</span>',['class' => 'control-label col-lg-2', 'for' => 'text1'])) !!}
                                             <div class="col-lg-4">
                                                <input type="text" class="form-control" placeholder="Enter City Name In {{ $get_lang_name }}" value="{!!$cityres->$city_name_dynamic!!}" name="city_name_<?php echo $get_lang_name; ?>" id="city_name_<?php echo $get_lang_name; ?>" >
                                                {{ Form::hidden('city_id',$cityres->ci_id,['class' => 'form-control', 'id' => 'city_id']) }}
                                             </div>
                                          </div>
                                       </div>
                                       @endforeach
                                       @endif
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CITY_LATITUDE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CITY_LATITUDE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY_LATITUDE') }}  <span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <a id="inline" href="#map_canvas">  <input type="text" class="form-control" placeholder="" value="{!!$cityres->ci_lati!!}" name="city_latitude" id="city_latitude" readonly /></a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CITY_LONGITUDE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CITY_LONGITUDE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY_LONGITUDE') }} <span class="text-sub">*</span></label> 
                                             <div class="col-lg-4">
                                                {{ Form::text('city_longitute',$cityres->ci_long,['class' => 'form-control', 'id' => 'city_lng','readonly']) }}
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       {!! Html::decode(Form::label('','<span class="text-sub"></span>',['class' => 'control-label col-lg-2', 'for' => 'pass1'])) !!}
                                       <div class="col-lg-8">
                                          <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                                          <a href="{{ url('manage_city') }}" class="btn btn-default btn-sm btn-grad" style="color:#000">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CANCEL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL') }}</a>
                                       </div>
                                       <div id="container" class="col-lg-12" >
                                          <div id="map_canvas"></div>
                                       </div>
                                    </div>
                                    @endforeach
                                    {!! Form::close() !!}
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
            <div class="col-lg-12" >
               <div class="modal fade" id="buttonedModal">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           {{ Form::button('&times;',['class' => 'close','data-dismiss'=>'modal', 'aria-hidden' => 'true']) }}
                        </div>
                        <div id="MyGmaps" style="width:575px;height:400px;border:1px solid #CECECE;"></div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- GLOBAL SCRIPTS -->
            <script src="<?php echo url('');?>/public/assets/plugins/jquery-2.0.3.min.js"></script>
            <script src="<?php echo url('');?>/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script src="<?php echo url('');?>/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
            <!-- END GLOBAL SCRIPTS -->   
            <style type="text/css">
               #container
               {
               left: -100000px;
               position: relative !important;
               }
               #map_canvas
               {
               margin: 0;
               padding: 0;
               height: 500px;
               width: 500px;
               }
            </style>
            <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=<?php echo $GOOGLE_KEY;?>'></script>
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
            <script type="text/javascript" src="<?php echo url('');?>/public/assets/js/jquery.fancybox-1.3.4.pack.js"></script>
            <script type="text/javascript" src="<?php echo url('');?>/public/assets/js/jquery.mousewheel-3.0.4.pack.js"></script>
            <script type="text/javascript">
               var map;
               
               function initialize(latti,long) {
                 
                 latti=$('#city_latitude').val();
                 long=$('#city_lng').val();
                 
                   var myLatlng = new google.maps.LatLng(latti,long);
                   var myOptions = {
               
                            zoom: 10,
                           center: myLatlng,
                           disableDefaultUI: true,
                           panControl: true,
                           zoomControl: true,
                           mapTypeControl: true,
                           streetViewControl: true,
                           mapTypeId: google.maps.MapTypeId.ROADMAP
               
                   };
               
                   map = new google.maps.Map(document.getElementById('map_canvas'),
               
                       myOptions);
                  var marker = new google.maps.Marker({
                           position: myLatlng,
                           map: map,
                           draggable:true,    
                       }); 
                   google.maps.event.addListener(marker, 'dragend', function(e) {
                        
                        var lat = this.getPosition().lat();
                        var lng = this.getPosition().lng();
                        $('#city_lat').val(lat);
                        $('#city_lng').val(lng);
                        $("#fancybox-close").click();
                        
                       });
               
               }
               
               
               google.maps.event.addDomListener(window, 'load', initialize);
               
               $("a#inline").fancybox();
               
               
            </script>
            <script type="text/javascript">
               $("#city_name").keyup(function(){
                  var geocoder =  new google.maps.Geocoder();
                   geocoder.geocode( { 'address': $('#city_name').val()+$( "#country_name option:selected" ).text()}, function(results, status) {
                         if (status == google.maps.GeocoderStatus.OK) {
                           //$('.push-down').text("location : " + results[0].geometry.location.lat() + " " +results[0].geometry.location.lng()); 
                           var lati=results[0].geometry.location.lat();
                           var longi=results[0].geometry.location.lng();
                           if(($("#city_name").val())=='')
                             { 
                               $("#city_latitude").val('');
                               $("#city_lng").val('');
                             } else {
                                       $("#city_latitude").val(lati);
                                       $("#city_lng").val(longi);
                                     }
                           
               initialize(lati,longi);
                         } else {
                          // $('.push-down').text("Check whether city name is correct!");
                           //location.reload();
               
                         }
                       });
               });
               
               
               
                
            </script>
            <script type="text/javascript">
               function validate() {
                var element = document.getElementById('city_name');
                element.value = element.value.replace(/[^a-zA-Z ]+/, '');
                $('#city_latitude').val('');
                $('#city_lng').val('');
                if(element.value==''){
                   //alert(element.value);
                   $('#city_latitude').val('');
                   $('#city_lng').val('');
               
                }
                
               }
            </script>
         </body>
         <!-- END BODY -->
      </html>