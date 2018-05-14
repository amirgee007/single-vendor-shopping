<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SUBSCRIBERS')!= '') 

      {{ trans(Session::get('admin_lang_file').'.BACK_MANAGE_SUBSCRIBERS') }}  

      @else 

      {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SUBSCRIBERS') }}
      @endif 

      ?></title>
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
     <link href="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                            	<li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') : trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a > @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SUBSCRIBERS')!= '') 
                                  {{ trans(Session::get('admin_lang_file').'.BACK_MANAGE_SUBSCRIBERS') }}  
                                @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SUBSCRIBERS') }} @endif </a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_SUBSCRIBERS')!= '') 
                                  {{ trans(Session::get('admin_lang_file').'.BACK_MANAGE_SUBSCRIBERS') }}  
                                @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_SUBSCRIBERS') }} @endif</h5>
            
        </header>
   
    @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('success') !!}
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
        </div>
		@endif
 <div class="row">
   	
    <div class="col-lg-12">
       <div class="table-responsive panel_marg_clr ppd">
    	<table class="table table-bordered" id="dataTables-example">
              <thead>
                <tr>
                  <th style="width:10%;"class="text-center">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
                  <th class="text-center">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EMAIL') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL')}} </th>
				   <!--<th style="text-align:center;">City</th>-->
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SUBSCRIBE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SUBSCRIBE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SUBSCRIBE') }}/<br>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UNSUBSCRIBE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UNSUBSCRIBE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UNSUBSCRIBE') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DELETE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE')}}</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=1; ?>
                @if(count($subscriber_list)>0)

                @foreach($subscriber_list as $subs_list)
                <tr>
                  <td class="text-center">{!!$i!!}</td>
                  <td class="text-center">{!!$subs_list->email!!}</td>
				
				   <td class="text-center">
				    @if($subs_list->status == 1)  
					 <?php echo "<a href='".url('edit_newsletter_subscriber_status/'.$subs_list->id.'/0')."' > <i class='icon icon-ok icon-2x '></i> </a>"; ?>
								 @else
								 <?php echo  "<a href='".url('edit_newsletter_subscriber_status/'.$subs_list->id.'/1')."'> <i class='icon icon-ban-circle icon-2x icon-me'></i> </a>"; ?>
									  @endif
                   
                   
                 </td>
				    <td class="text-center"><a href="{!! url('delete_newsletter_subscriber').'/'.$subs_list->id!!}" data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DELETE') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }}"><i class="icon icon-trash icon-2x"></i></a></td>
					
                </tr>
                <?php $i++;?>
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
    <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="{{ url('')}}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{{ url('')}}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
    <!-- END GLOBAL SCRIPTS -->   
     <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>
</body>
     <!-- END BODY -->
</html>
