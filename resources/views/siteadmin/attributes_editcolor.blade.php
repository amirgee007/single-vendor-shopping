<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }}| {{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_COLOR')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_COLOR') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_COLOR') }}</title>
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
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/farbtastic.css" type="text/css" />
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
<style>
@-webkit-keyframes spin {
  from { -webkit-transform: rotateY(0deg); }
  to { -webkit-transform: rotateY(360deg); }
}

form{
  float:left;
}

#html5logo{
  -webkit-transform-style:preserve-3d;
  -webkit-perspective: 600px;
  /*-webkit-transform:rotateX(30deg);*/
  position: absolute;
  margin: 10px 0 0 220px;
}

#html5svg{
  -webkit-animation-name: spin; 
  -webkit-animation-duration: 7000ms;
  -webkit-animation-iteration-count: infinite; 
  -webkit-animation-timing-function: linear;
  -moz-animation-name: spin; 
  -moz-animation-duration: 7000ms;
  -moz-animation-iteration-count: infinite; 
  -moz-animation-timing-function: linear;
  -ms-animation-name: spin; 
  -ms-animation-duration: 7000ms;
  -ms-animation-iteration-count: infinite; 
  -ms-animation-timing-function: linear;
}
</style>
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
                            	<li class=""><a href="#">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a href="#">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_COLOR')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_COLOR') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_COLOR') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT_COLOR')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT_COLOR') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT_COLOR') }}</h5>
            
        </header>
		@if (Session::has('error'))
		<div class="alert alert-warning alert-dismissable">
	{{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert','aria-hidden' => 'true']) }}
	{!! Session::get('error') !!}</div>
		@endif
		
		
   		 @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable">
	{{ Form::button('x',['class' => 'close' , 'data-dismiss' => 'alert','aria-hidden' => 'true']) }}
	{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
 <div class="row">
   	<div class="panel_marg" style="">
{!! Form::open(array('url'=>'editcolor_submit','class'=>'form-horizontal col-lg-12 col-xs-12')) !!}
       			 @foreach($edit_color as $color)
    <div id="ntc" class="">
        <div id="picker" class="col-lg-4 col-xs-12"><div class="farbtastic"><div class="color" style="background-color: rgb(0, 255, 19);"></div><div class="wheel"></div><div class="overlay"></div><div class="h-marker marker" style="left: 166px; top: 145px;"></div><div class="sl-marker marker" style="left: 81px; top: 98px;"></div></div></div>
        
        <div id="colortag" class="col-lg-8 col-xs-12">
          <div class="color-choose">
          <h3 id="colorname">{!! $color->co_name!!}</h3>
          <input type="hidden" id="color_name" name="color_name" value="{!! $color->co_name!!}"  class="form-control" readonly />
          <input type="hidden" id="color_id" name="color_id" value="{!! $color->co_id!!}"  />
          <div id="colorpick"><select id="colorop" class="form-control">
          <option value="">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT_COLOR')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SELECT_COLOR') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT_COLOR') }}:</option>
          </select></div>
         
          <div style="background-color: rgb(42, 207, 54);" id="colorbox">
          
          <div style="background-color: rgb(79, 168, 61);" id="colorsolid"></div></div>
          <div id="colorpanel">
            <div id="colorhex">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_YOUR_COLOR')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_YOUR_COLOR') : trans($ADMIN_OUR_LANGUAGE.'.BACK_YOUR_COLOR') }}:</div>
			{{ Form::text('color',$color->co_code,['maxlength' => '10','class' => 'inputbox' , 'id' => 'colorinp']) }}
            
            <div id="colorrgb">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RGB')!= '') ? trans(Session::get('admin_lang_file').'.BACK_RGB') : trans($ADMIN_OUR_LANGUAGE.'.BACK_RGB') }}: 42, 207, 54</div>
            
            
          </div>
          <br>
          <div class="form-group">
                  
                    <div class="col-sm-2 col-xs-3">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                    </div>
                    <div class="col-sm-2 col-xs-3">
					  <a href="{{ url('manage_color') }}" style="color:#ffffff;" class="btn btn-danger btn-sm btn-grad">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CANCEL')!= '') ? trans(Session::get('admin_lang_file').'.BACK_CANCEL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CANCEL')}}</a>
                    </div>
                </div></div>
          
         
        </div>

@endforeach
{{ Form::close() }}
        
        <div class="clear"></div>
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
    <script src="{{ url('')}}/public/assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    	<script type="text/javascript" src="{{ url('')}}/public/assets/plugins/jquery.js"></script>
      <script type="text/javascript" src="{{ url('')}}/public/assets/plugins/farbtastic.js"></script> 
      <script type="text/javascript" src="{{ url('')}}/public/assets/plugins/ntc.js"></script> 
  <script type="text/javascript" src="{{ url('')}}/public/assets/plugins/ntc_main.js"></script> 
    
   <script>

  // Thanks to... http://mjijackson.com/2008/02/rgb-to-hsl-and-rgb-to-hsv-color-model-conversion-algorithms-in-javascript

  function hslToRgb(h, s, l){
    var r, g, b;

    if(s == 0){
        r = g = b = l; // achromatic
    }else{
        function hue2rgb(p, q, t){
            if(t < 0) t += 1;
            if(t > 1) t -= 1;
            if(t < 1/6) return p + (q - p) * 6 * t;
            if(t < 1/2) return q;
            if(t < 2/3) return p + (q - p) * (2/3 - t) * 6;
            return p;
        }

        var q = l < 0.5 ? l * (1 + s) : l + s - l * s;
        var p = 2 * l - q;
        r = hue2rgb(p, q, h + 1/3);
        g = hue2rgb(p, q, h);
        b = hue2rgb(p, q, h - 1/3);
    }

    return {r:parseInt(r*255), g:parseInt(g*255), b:parseInt(b*255)};
  }

  function rgbToHsl(r, g, b){
      r /= 255, g /= 255, b /= 255;
      var max = Math.max(r, g, b), min = Math.min(r, g, b);
      var h, s, l = (max + min) / 2;

      if(max == min){
          h = s = 0; // achromatic
      }else{
          var d = max - min;
          s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
          switch(max){
              case r: h = (g - b) / d + (g < b ? 6 : 0); break;
              case g: h = (b - r) / d + 2; break;
              case b: h = (r - g) / d + 4; break;
          }
          h /= 6;
      }

      //return [h*100, s*100, l*70];
      //return {h:parseFloat(h*360), s:parseInt(s*100), l:parseInt(l*80)};
      return {h:h, s:s, l:l*.8};
  }
  

  function hexToRgb(hex) {
      var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
      return result ? {
          r: parseInt(result[1], 16),
          g: parseInt(result[2], 16),
          b: parseInt(result[3], 16)
      } : null;

  }

    
$(document).ready(function() {

 


 $.farbtastic('#picker').setColor("<?php echo $color->co_code;?>");
});
</script>

	 
	<script src="{{ url('')}}/public/assets/js/jquery-ui.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/uniform/jquery.uniform.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/chosen/chosen.jquery.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/validVal/js/jquery.validVal.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="{{ url('')}}/public/assets/js/formsInit.js"></script>
     <script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>
    <!-- END GLOBAL SCRIPTS -->   
    
</body>
     <!-- END BODY -->
</html>
