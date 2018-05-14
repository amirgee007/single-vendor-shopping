<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOG_COMMENTS')!= '')   ? trans(Session::get('admin_lang_file').'.BACK_BLOG_COMMENTS')  :  trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOG_COMMENTS') }}         </title>
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
     <?php $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); ?> @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/{{ $fav->imgs_name }}">
@endif		
    <link rel="stylesheet" href="public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                                <li class="active"><a > {{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOG_COMMENTS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_BLOG_COMMENTS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOG_COMMENTS') }}             </a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOG_COMMENTS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_BLOG_COMMENTS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOG_COMMENTS') }}          </h5>
            
        </header>
        @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('success') !!}
			{{ Form::button('x',['class' => 'close', 'data-dismiss' => 'alert' , 'aria-hidden' => 'true']) }}
       </div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
           
			{{ Form::open(['class' => 'form-horizontal']) }}
 
                <div class="form-group col-lg-12">
                     <div class="

                     ">

                    	<table class="table table-bordered" id="dataTables-example">
              <thead>
                <tr>
                  <th style="width:10%;"class="text-center">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
                  <th class="text-center"> {{ (Lang::has(Session::get('admin_lang_file').'.BACK_NAME')!= '') ? trans(Session::get('admin_lang_file').'.BACK_NAME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_NAME') }}</th>
		    <th class="text-center">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EMAIL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL') }} </th>
		   <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_WEBSITE')!= '') ? trans(Session::get('admin_lang_file').'.BACK_WEBSITE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_WEBSITE') }}</th>
		  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOG_TITLE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BLOG_TITLE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOG_TITLE') }}</th>
		 <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COMMENTS')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COMMENTS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COMMENTS') }}</th>
		 <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DATE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_DATE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_DATE') }}</th>
		 <th style="text-align:center;">({{ (Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_APPROVE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_APPROVE') }} /{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UNAPPROVE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UNAPPROVE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UNAPPROVE') }})</th>
		 <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COMMENT_REPLY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COMMENT_REPLY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COMMENT_REPLY') }}</th>
		 </tr>
              </thead>
              <tbody>    
              <?php $i=1;?>
               @if(count($blog_comments)>0)             
              @foreach($blog_comments as $inq_list)
                <tr>
                  <td class="text-center">{!!$i!!}</td>
                  <td class="text-center">{!!$inq_list->cmt_name!!} </td>
				     <td class="text-center"> {!!$inq_list->cmt_email!!}	</td>
					  <td class="text-center">{!!$inq_list->cmt_website!!}		</td>
					  <td class="text-center">{!!$inq_list->blog_title!!} </td>
					 <td class="text-center">{!!$inq_list->cmt_msg!!} </td>
						<td class="text-center">{!!$inq_list->cmt_date!!} </td>
				 <td class="text-center">@if($inq_list->cmt_admin_approve== 1) <a href="{!! url('status_blogcmt_submit').'/'.$inq_list->cmt_id.'/'.'0'!!}" data-tooltip="{{  (Lang::has(Session::get('admin_lang_file').'.BACK_APPROVE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_APPROVE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_APPROVE') }}"><i class="icon icon-ok icon-2x"></i>
                  </a> @else  <a href="{!! url('status_blogcmt_submit').'/'.$inq_list->cmt_id.'/'.'1'!!}" data-tooltip="{{  (Lang::has(Session::get('admin_lang_file').'.BACK_UNAPPROVE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UNAPPROVE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UNAPPROVE') }}">
                   <i class="icon icon-ban-circle icon-2x icon-me"></i></a> @endif</td>
	   <td class="center  "><a href="{{ url('reply_blogcmts')."/".$inq_list->cmt_id }}">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_REPLY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_REPLY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_REPLY') }}</a></td>
					 
                </tr>
				     
				    @php $i++; @endphp
					@endforeach
				@endif 
              </tbody>
            </table></div>
                </div>

				{{ Form::close() }}
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
    <script src="public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo url('')?>/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
	
	<script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
	</script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
