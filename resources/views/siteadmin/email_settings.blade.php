<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_EMAIL_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL_SETTINGS') }}</title>
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
     @php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif  
    <link rel="stylesheet" href="public/assets/css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
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
                                <li class=""><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME')}} @endif</a></li>
                                <li class="active"><a>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_EMAIL_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL_SETTINGS') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
        
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL_SETTINGS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_EMAIL_SETTINGS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL_SETTINGS') }}</h5>
            
        </header>
        @if ($errors->any()) 
        <div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
        @endif
         @if (Session::has('success'))
        <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
        @endif
        <div id="div-1" class="accordion-body collapse in body">
            {!! Form::open(array('url'=>'email_setting_submit','class'=>'form-horizontal')) !!}
                    @foreach($email_settings as $email_set)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CONTACT_NAME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CONTACT_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CONTACT_NAME') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="" value="{!! $email_set->es_contactname!!}" name="contact_name" id="contact_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CONTACT_E_MAIL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CONTACT_E_MAIL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CONTACT_E_MAIL') }}<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    {{ Form::text('contact_email',$email_set->es_contactemail,['class' => 'form-control','id' => 'contact_email']) }}
                         
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Skype E-Mail </label>

                    <div class="col-lg-8">
                    {{ Form::email('skype_email_id',$email_set->es_skype_email_id,['class' => 'form-control','id' => 'skype_email_id']) }}
                        
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_WEBMASTER_E_MAIL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_WEBMASTER_E_MAIL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_WEBMASTER_E_MAIL')}}<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    {{ Form::text('webmaster_email',$email_set->es_webmasteremail,['class' => 'form-control','id' => 'webmaster_email']) }}
                       
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SITE_NO_REPLY_E_MAIL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SITE_NO_REPLY_E_MAIL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SITE_NO_REPLY_E_MAIL') }}<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    {{ Form::text('no_reply_email',$email_set->es_noreplyemail,['class' => 'form-control','id' => 'no_reply_email']) }}
                    
                      
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CONTACT_PHONE_1')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CONTACT_PHONE_1') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CONTACT_PHONE_1') }}<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    {{ Form::text('contact_pno',$email_set->es_phone1,['class' => 'form-control','id' => 'contact_pno']) }}
                      
                    </div>
                </div>

                <div class="form-group">
                    <label for="limiter" class="control-label col-lg-2"></label>

                    <div class="col-lg-8">
                       <p>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EXAMPLE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EXAMPLE'): trans($ADMIN_OUR_LANGUAGE.'.BACK_EXAMPLE') }}: +91 123-4567-890</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CONTACT_PHONE_2')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CONTACT_PHONE_2') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CONTACT_PHONE_2') }}<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    {{ Form::text('contact_pno2',$email_set->es_phone2,['class' => 'form-control','id' => 'contact_pno2']) }}
                         
                    </div>
                </div>


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_EMAIL');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL');} ?><span class="text-sub">*</span></label>
                    
                    <div class="col-lg-8">
                        <input id="" placeholder="" name="cont_email" class="form-control" value="{{ $email_set->es_email }}" type="text">
                        <span data-tooltip='Account, Purchase notification'> <i class="glyphicon glyphicon-info-sign"></i> </span>
                       </div>
                   
                </div>
                
              

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS1')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADDRESS1');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS1');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="" placeholder="" name="cont_address_one" class="form-control" value="{{ $email_set->es_address1 }}" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_ADDRESS2')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_ADDRESS2');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_ADDRESS2');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="" placeholder="" name="cont_address_two" class="form-control" value="{{ $email_set->es_address2 }}" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">
                        {{ (Lang::has(Session::get('admin_lang_file').'.ENABLE_DISABLE_ADDRESS') != '') ? trans(Session::get('admin_lang_file').'.ENABLE_DISABLE_ADDRESS') : trans($ADMIN_OUR_LANGUAGE.'.ENABLE_DISABLE_ADDRESS') }} <span class="text-sub">*</span> </label>
                 
                 <div class="col-lg-8">
                    <input type="checkbox" name="address_status" value="show" <?php if($email_set->show_address == 'show'){ ?> checked <?php } ?>><label class="sample">{{ (Lang::has(Session::get('admin_lang_file').'.SHOW_ADDRESS')!= '') ?  trans(Session::get('admin_lang_file').'.SHOW_ADDRESS') : trans($ADMIN_OUR_LANGUAGE.'.SHOW_ADDRESS') }}</label>
                 </div>
                 </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_LATITUDE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_LATITUDE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_LATITUDE') }}<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <a id="inline" href="#map_canvas">
                         {{ Form::text('lati',$email_set->es_latitude,['class' => 'form-control','id' => 'lati']) }}
                         </a>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_LONGITUDE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_LONGITUDE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_LONGITUDE') }}<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    {{ Form::text('long',$email_set->es_longitude,['class' => 'form-control','id' => 'long']) }}
                         
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                 
                    <button type="reset" class="btn btn-danger btn-sm btn-grad" style="color:#ffffff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_RESET') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</button>
                    </div>
                      
                      
                      
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
    
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=<?php echo $GOOGLE_KEY;?>'></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/public/assets/js/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="{{ url('') }}/public/assets/js/jquery.mousewheel-3.0.4.pack.js"></script>
    
    <script type="text/javascript">

    var map;
    var lat = $('#lati').val();
    var lng = $('#long').val(); 
    function initialize() {
var myLatlng = new google.maps.LatLng(lat,lng);
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
             $('#lati').val(lat);
             $('#long').val(lng);
             $("#fancybox-close").click();
             
            });

    }


    google.maps.event.addDomListener(window, 'load', initialize);

    $("a#inline").fancybox();


    </script>
    <script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>
     
</body>
     <!-- END BODY -->
</html>
