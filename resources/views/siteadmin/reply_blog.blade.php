<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} |Add Blog</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
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
     <?php $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); ?> @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/{{ $fav->imgs_name }}">
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
                            	<li class=""><a >Home</a></li>
                                <li class="active"><a >Reply To Blog Comments</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Reply To Blog Comments</h5>
            
        </header>
         @if (Session::has('success'))
		<div class="alert alert-danger alert-dismissable">{!! Session::get('success') !!}
	{{ Form::button('x',['class' => 'close', 'data-dismiss' => 'alert' , 'aria-hidden' => 'true']) }}
        </div>
		@endif
	  @if ($errors->any())
         <div class="alert alert-warning alert-dismissable">{!! implode('', $errors->all('<li>:message</li>')) !!}
	 {{ Form::button('x',['class' => 'close', 'data-dismiss' => 'alert' , 'aria-hidden' => 'true']) }}
        </div>
		@endif
        
        
        <div id="div-1" class="accordion-body collapse in body">


             {!! Form::open(array('url'=>'admin_blogreply_submit','class'=>'form-horizontal')) !!}

               <?php foreach($cmtsdetails as $inq_list) {


 }?>
 
		{{ Form::hidden('blog_id', $inq_list->cmt_blog_id) }}
		{{ Form::hidden('cmt_id', $inq_list->cmt_id) }}		
		
		
		 
		 <div class="form-group">
		  <label for="text1" class="control-label col-lg-2">Customer Comments</label>
		 <div class="col-lg-8">
                       <textarea  class="form-control" rows="10" name="blog_cmts" readonly >{{ $inq_list->cmt_msg }}</textarea>
                    </div>
			</div>
				<div id="error_msg"  style="color:#F00;font-weight:800"  > </div>
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Reply To Customer Comments<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="wysihtml5" class="form-control" rows="10" name="blog_reply"   ></textarea>
                    </div>
                </div>
				 
		 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
					
                     <button  id="submit_reply" class="btn btn-success btn-sm btn-grad"  ><a style="color:#fff"  >Submit</a></button>
					 
					 <button  class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</button> 
                     
                   
				   
                    </div>
					  
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

 
       <script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
<script>
	$( document ).ready(function() {
 
		$('#submit_reply').click(function() 
		{
			if($('#wysihtml5').val()=="")
			{
				 $('#wysihtml5').css('border', '1px solid red'); 
				$('#error_msg').html('Please provide reply');
				$('#wysihtml5').focus();
				return false;
			}
		 	else if($('#wysihtml5').val().length<=10)
			{
				$('#wysihtml5').css('border', '1px solid red'); 
				$('#error_msg').html('Please provide reply with more than 10 characters');
				$('#wysihtml5').focus();
				return false;

			}
			else
			{
				$('#wysihtml5').css('border', ''); 
				$('#error_msg').html('');
				 
			}

	
		
		});

});

</script>
    <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

         <!-- PAGE LEVEL SCRIPTS -->
     <script src="{{ url('') }}/public/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="{{ url('') }}/public/assets/js/editorInit.js"></script>
    <script>
        $(function () { formWysiwyg(); });
        </script>

</body>
     <!-- END BODY -->
</html>
