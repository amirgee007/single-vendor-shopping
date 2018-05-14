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
   <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_ROLE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_ADD_ROLE'): trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_ROLE')}} </title>
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
   <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
   @php $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp
   @if(count($favi)>0)
      @foreach($favi as $fav) @endforeach
      <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
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
                  <li class=""><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }} @endif</a></li>
                  <li class="active"><a >@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_ROLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_ROLE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_ROLE') }} @endif</a></li>
               </ul>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="box dark">
                  <header>
                     <div class="icons"><i class="icon-edit"></i></div>
                     <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_ROLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_ROLE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_ROLE') }} @endif</h5>
                  </header>
                  @if ($errors->any())
                     <br>
                     <ul style="color:red;">
                        {!! implode('', $errors->all('
                        <li>:message</li>
                        ')) !!}
                     </ul>
                  @endif
                  @if (Session::has('message'))
                     <p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
                  @endif
                  <div class="row">
                     <div class="col-lg-11 panel_marg" style="padding-bottom:10px;">
                        {!! Form::open(array('url'=>'edit_role_submit','class'=>'form-horizontal')) !!}
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              @if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_ROLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_ROLE') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_ROLE') }} @endif
                           </div>
                           <input type="hidden" name="role_edit_id" id="customer_edit_id" value="{{ $role->role_id }}" />

                           <div class="panel-body">
                              <div class="form-group">
                                 <label class="control-label col-lg-2" for="text1">@if (Lang::has(Session::get('admin_lang_file').'.BACK_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NAME') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NAME') }} @endif<span class="text-sub">*</span></label>
                                 <div class="col-lg-8">
                                    <input required value="{{$role->name}}" type="text" class="form-control" maxlength="50" placeholder="@if (Lang::has(Session::get('admin_lang_file').'.BACK_ENTER_ROLE_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ENTER_ROLE_NAME') }}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ENTER_ROLE_NAME') }} @endif" id="name" name="name">
                                    <div id="name_error_msg"  style="color:#F00;font-weight:800"> </div>
                                 </div>
                              </div>
                           </div>
                           <div class="panel-body">
                              <div class="form-group">
                                 <label class="control-label col-lg-3" for="pass1"><span class="text-sub"></span></label>
                                 <div class="col-lg-8">
                                    <button class="btn btn-warning btn-sm btn-grad" id="submit_customer"><a style="color:#fff" >@if (Lang::has(Session::get('admin_lang_file').'.BACK_SUBMIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SUBMIT') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBMIT') }} @endif</a></button>
                                    <button type="reset" class="btn btn-danger btn-sm btn-grad">@if (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RESET') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }} @endif</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        {{ Form::close() }}
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
<script  type="text/javascript">

    $(document).ready(function() {

        $('#submit_customer').click(function() {});

    });
</script>

<script src="{{ url('')}}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<!-- END GLOBAL SCRIPTS -->
<!---F12 Block Code---->

</body>
<!-- END BODY -->
</html>