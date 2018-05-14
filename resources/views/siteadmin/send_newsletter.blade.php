<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_SEND_NEWSLETTER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SEND_NEWSLETTER') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SEND_NEWSLETTER') }}</title>
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
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/new_css.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/theme.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
      @php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif		
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/bootstrap-wysihtml5-hack.css" />
     <style>
                        ul.wysihtml5-toolbar > li {
                            position: relative;
                        }
                    </style>
    <!-- END PAGE LEVEL  STYLES -->
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
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SEND_NEWSLETTER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SEND_NEWSLETTER')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_SEND_NEWSLETTER')}}</a></li>
                            </ul>
                    </div>
                </div>
                
   
    <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SEND_NEWSLETTER')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SEND_NEWSLETTER')   : trans($ADMIN_OUR_LANGUAGE.'.BACK_SEND_NEWSLETTER')}}</h5>
            
        </header>
            @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable">
		{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
        @if (Session::has('error'))
		<div class="alert alert-danger alert-dismissable">
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
	{!! Session::get('error') !!}</div>
		@endif
          @if (Session::has('success'))
		<div class="alert alert-danger alert-dismissable">
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
	{!! Session::get('success') !!}</div>
		@endif


        @if(count($newsletter_subscribers)>0)


           {!! Form::open(array('url'=>'send_newsletter_submit','class'=>'form-horizontal')) !!}
        <div id="div-1" class="accordion-body collapse in body">
            
			{{ Form::open(['class' => 'form-horizontal']) }}
               <?php /**city <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_CITY')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_CITY');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY');} ?><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="city" >
           				<option value="" >-- <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_SELECT')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_SELECT');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_SELECT');} ?> --</option>
                        <?php foreach($city_list as $city){ ?>
          				<option value="<?php echo $city->ci_id; ?>" ><?php echo $city->ci_name; ?></option>
                        <?php } ?>
       			 </select>
                    </div>
                </div> **/?>
				
				
				
				
				<div class="form-group">
                    <div class="col-lg-2">
                {!! Form::label('E-Mail To','E-Mail To* :',['class' => 'control-label']) !!}
                </div>
				<div class="col-lg-8 rdo_btn">
				<label>{!! Form::radio('email_to',1,false, ['required','class'=>'field','id'=>'email-all', 'onclick' => 'check_user_type(0)']) !!}Al User</label>
			
			<label>{!! Form::radio('email_to',1,false, ['required','class'=>'field','id'=>'email-per','onclick' => 'check_user_type(1)']) !!} Particular User</label>
								
								@if ($errors->has('email_to')) <p class="error-block" style="color:red;">{{ $errors->first('email_to') }}</p> @endif
								</div>
								</div>
								
								
								<div class="form-group usr_lst" id="users_list" style="display:none;">
								@if(count($newsletter_subscribers)>0)
								{{ Form::label('','',['class' =>'control-label col-lg-2']) }}
                                
									<div class="col-lg-8"><select class="slct_usr" name="user_id[]" id="multi_user_select" multiple ="multiple" >
								@foreach($newsletter_subscribers as $subscribers)
								<option class="optn_usr" value="{{ $subscribers->id }}">{{ $subscribers->email }}</option>
								@endforeach
									</select></div>
								@endif
								</div>
				
								

 				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{(Lang::has(Session::get('admin_lang_file').'.BACK_SUBJECT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUBJECT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBJECT')}}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                     <input type="text" class="form-control" placeholder="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUBJECT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUBJECT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBJECT')}}" value="{!! Input::old('subject') !!}" name="subject" id="text1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MESSAGE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MESSAGE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MESSAGE') }}<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                     
                     <div id="" >
                                    <div class="tab-pane fade active in" >
									{{ Form::open() }}
									
									{{ Form::textarea('message',Input::old('message'),['id' => 'wysihtml5',  'class' => 'form-control', 'rows' => '10']) }}
                                       

                                        <div class="form-actions">
                                            <br />
                                           <button type="submit" class="btn btn-warning btn-sm btn-grad"><a style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SEND')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SEND')  
										   :  trans($ADMIN_OUR_LANGUAGE.'.BACK_SEND') }}</a></button>
                     <button type="reset" class="btn btn-danger btn-sm btn-grad"><a style="color:#ffffff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_RESET') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }}</a></button>
                                        </div>
										{{ Form::close() }}
                                    </div> 
                                    
                                </div>
                    </div>
                </div>

                
				  
                

                
				{{ Form::close() }}
        </div>
        @else
            <div id="div-1" class="accordion-body collapse in body">
                 <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_NO_NEWSLETTER_SUBSCRIPTION')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NO_NEWSLETTER_SUBSCRIPTION') }} @else {{  trans($ADMIN_OUR_LANGUAGE.'.BACK_NO_NEWSLETTER_SUBSCRIPTION') }} @endif </h5>
            </div>
        @endif
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
    <!-- END GLOBAL SCRIPTS -->

         <!-- PAGE LEVEL SCRIPTS -->
     <script src="{{ url('')}}/public/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="{{ url('')}}/public/assets/js/editorInit.js"></script>
    <script>
        $(function () { formWysiwyg(); });
        </script>
        <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
     <!--END PAGE LEVEL SCRIPTS -->

</body>
     <!-- END BODY -->
</html>



<script type="text/javascript">
// check user type ,all user or particular user
function check_user_type(val)
{
	
	if(val==1){
		$("#users_list").show(); // show particular users list
		$('#multi_user_select').attr('required', 'required');
		jQuery('option').mousedown(function(e) {
    e.preventDefault();
    jQuery(this).toggleClass('selected');
  
    jQuery(this).prop('selected', !jQuery(this).prop('selected'));
    return false;
});
	}else if(val ==0){
		$("#users_list").hide();	// hide users list
		$('#multi_user_select').removeAttr('required');

	}
}
</script>
