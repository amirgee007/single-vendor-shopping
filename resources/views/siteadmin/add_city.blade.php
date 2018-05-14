<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CITY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADD_CITY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CITY');} ?></title>
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
    <link rel="stylesheet" href="public/assets/css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
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
                              <li class=""><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ? trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CITY') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CITY') }}</h5>
            
        </header>
        
         @if ($errors->any()) 
    <div class="alert alert-danger alert-dismissable">
            {!! Form::button('×',['class' => 'close', 'data-dismiss' => 'alert' , 'aria-hidden' =>'true'])
    !!}
        {!! implode('', $errors->all('<li>:message</li>')) !!}</div>
    @endif
        @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissable">
        {!! Form::button('×',['class' => 'close', 'data-dismiss' => 'alert' , 'aria-hidden' =>'true'])
    !!}
    {!! Session::get('error') !!}</div>
    @endif
        <div class="row">
          <div class="col-lg-12" style="padding-bottom:10px;">
                    
                    {!! Form::open(array('url'=>'add_city_submit','class'=>'form-horizontal', 'accept-charset' => 'UTF-8')) !!}
                   
          <div class="panel panel-default">
                        <div class="panel-heading">
                       {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_ADD_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_CITY') }}
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COUNTRY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <select class="form-control" id="country_name" name="country_name" >
                            
                                                    <option value="">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SELECT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT') }}</option>
                                                   @foreach($country_details as $country_det)
                                                    <option value="{!! $country_det->co_id!!}">{!! $country_det->co_name!!} </option>
                                            @endforeach        
                                                </select>
                    </div>
                </div>
                        </div>
             <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CITY_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CITY_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY_NAME') }} <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="Enter City Name {{ $default_lang }}" value="{!!Input::old('city_name')!!}" name="city_name" id="city_name" onkeyup="validate();">
                    </div>
                </div>
                        </div>
            
            
        @if(!empty($get_active_lang)) 
        @foreach($get_active_lang as $get_lang) 
        @php
       $get_lang_name = $get_lang->lang_name;
        @endphp
            <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">City Name({{ $get_lang_name }}) <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="Enter City Name In {{ $get_lang_name }}" value="{!!Input::old('city_name_'.$get_lang_name)!!}" name="city_name_{{ $get_lang_name }}" id="city_name" autocomplete="off" >
                    </div>
                </div>
                        </div>
        @endforeach
        @endif
            
             <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CITY_LATITUDE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CITY_LATITUDE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY_LATITUDE') }}  <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                       <a id="inline" href="#map_canvas">{{ Form::text('city_latitude',Input::old('city_latitude'),['class' => 'form-control','id' => 'city_latitude',  'readonly']) }}</a>
                    </div>
                </div>
                        </div>
             <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CITY_LONGITUDE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CITY_LONGITUDE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY_LONGITUDE') }} <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        {{ Form::text('city_longitute',Input::old('city_longitute'),['class' => 'form-control','id' => 'city_longitute',  'readonly']) }}
                    </div>
                </div>
                        </div>
                        
                           <div class="form-group">
                    {!! Html::decode(Form::label('','<span class="text-sub"></span>',['class' => 'control-label col-lg-2' ,'for' => 'pass1'])) !!}

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-success btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUBMIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUBMIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBMIT') }}</button>
                     <button  type="reset" class="btn btn-danger btn-sm btn-grad" style="color:#ffffff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button>
                   
                    </div>
            <div id="container" class="col-lg-12" >

        <div id="map_canvas"></div>

    </div>
                </div>
                    </div>
          
          
       
                
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


     <!-- GLOBAL SCRIPTS -->
   <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&key=<?php echo $GOOGLE_KEY;?>"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo url('');?>/assets/js/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="<?php echo url('');?>/assets/js/jquery.mousewheel-3.0.4.pack.js"></script>
    
    <script type="text/javascript">

    var map;

    function initialize(latti,long) {
        
var myLatlng = new google.maps.LatLng(latti, long);
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
             $('#city_latitude').val(lat);
             $('#city_longitute').val(lng);
             $("#fancybox-close").click();
             
            });

    }


   // google.maps.event.addDomListener(window, 'load', initialize);

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
                $("#city_longitute").val('');
              } else { 
                        $("#city_latitude").val(lati);
                        $("#city_longitute").val(longi);
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
  $('#city_longitute').val('');
  if(element.value==''){
     //alert(element.value);
     $('#city_latitude').val('');
     $('#city_longitute').val('');

  }
  
}
</script>
    
     <!---F12 Block Code---->
<script type='text/javascript'>
/*$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});*/
</script>
   <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>

</body>
     <!-- END BODY -->
</html>
