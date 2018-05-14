<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $SITENAME; ?> | <?php if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_INQUIRIES')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_MANAGE_INQUIRIES');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_INQUIRIES');} ?> </title>
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
    <link rel="stylesheet" href="public/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="public/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     @php 
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp
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
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<STYLE>

.morecontent span {
  display: none;

}
</STYLE>
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
                                <li class="active"><a > @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_INQUIRIES')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_INQUIRIES') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_INQUIRIES') }} @endif             </a></li>
                            </ul>
                    </div>
                </div>
			
  <center><div class="cal-search-filter">
		 <form  action="{!!action('CustomerController@manage_inquires')!!}" method="POST">
							<input type="hidden" name="_token"  value="<?php echo csrf_token(); ?>">
							 <div class="row">
							 <br>
							 
							 
							   <div class="col-sm-3">
							    <div class="item form-group">
							<div class="col-sm-6 date-top">@if (Lang::has(Session::get('admin_lang_file').'.BACK_FROM_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_FROM_DATE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_FROM_DATE') }} @endif</div>
							
 <div class="col-sm-6 place-size">
 <span class="icon-calendar cale-icon"></span>
							 <input type="text" name="from_date" 
placeholder="DD/MM/YYYY" class="form-control" id="datepicker-8"  value="{{$from_date}}" required readonly>
							 
							  </div>
							  </div>
							   </div>
							    <div class="col-sm-3">
							    <div class="item form-group">
							<div class="col-sm-6 date-top">@if (Lang::has(Session::get('admin_lang_file').'.BACK_TO_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_TO_DATE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_TO_DATE') }} @endif</div>
							
 <div class="col-sm-6 place-size">
 <span class="icon-calendar cale-icon"></span>
							 <input type="text" name="to_date" 
placeholder="DD/MM/YYYY" id="datepicker-9" class="form-control"  value="{{$to_date}}" required readonly>
							 
							  </div>
							  </div>
							   </div>
							   
							  <div class="form-group">
							   <div class="col-sm-2">
							 <input type="submit" name="submit" class="btn btn-block btn-success" value="@if (Lang::has(Session::get('admin_lang_file').'.BACK_SEARCH')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SEARCH') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SEARCH') }} @endif">
							 </div>
                              <div class="col-sm-2">
								<a href="{{ url('').'/manage_inquires' }}"><button type="button" name="reset" class="btn btn-block btn-info">@if (Lang::has(Session::get('admin_lang_file').'.BACK_RESET')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_RESET') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_RESET') }} @endif</button></a>
							 </div>
							</div>
							
							 </form></div>
							 </center>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>@if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_INQUIRIES')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_INQUIRIES') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_INQUIRIES') }} @endif            </h5>
            
        </header>
        <div style="display: none;" class="la-alert date-select1 alert-success alert-dismissable">End date should be greater than Start date!
         <button type="button" class="close closeAlert"  aria-hidden="true">×</button></div>
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('success') !!}</div>
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal">


                <div class="form-group col-lg-12">

   <div class="table-responsive panel_marg_clr ppd">
                    	<table class="table table-bordered" id="dataTables-example">
              <thead>
                <tr>
                  <th style="width:10%;"class="text-center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SNO') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }} @endif</th>
                  <th class="text-center"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NAME') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NAME') }} @endif</th>
				    <th class="text-center">@if (Lang::has(Session::get('admin_lang_file').'.BACK_EMAIL')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EMAIL') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EMAIL') }} @endif</th>
				   <th style="text-align:center;">@if (Lang::has(Session::get('admin_lang_file').'.BACK_PHONE_NUMBER')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_PHONE_NUMBER') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_PHONE_NUMBER') }} @endif</th>
				  <th style="text-align:center;">@if (Lang::has(Session::get('admin_lang_file').'.BACK_MESSAGE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MESSAGE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MESSAGE') }} @endif</th>
			
							   
					  <th style="text-align:center;"> @if (Lang::has(Session::get('admin_lang_file').'.BACK_DATE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DATE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DATE') }} @endif </th>
					   
						  
                </tr>
              </thead>
               <tbody>
                @php $i = 1; @endphp
	        @if(isset($_POST['submit']))
			
				@if(count($enquiresrep)>0)
                    @foreach($enquiresrep as $enquiry_details) 
                        <?php $enquiry_date = date('d/m/Y', strtotime($enquiry_details->created_date));
								//$enquiry_date = $enquiry_details->created_date;?>
										<tr class="gradeA odd">
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $enquiry_details->name }}</td>
                                            <td class=" text-center">{{ $enquiry_details->email }}</td>
                                            <td class="text-center">{{ $enquiry_details->phone }}</td>
                                            <td class="text-left "><div class="comment more">{{ $enquiry_details->message }}</div></td>
                                            <td class="text-center">{{ $enquiry_date }}</td>
                                        
                                        </tr>
            			<?php $i++;  ?> 
                    @endforeach 
                @endif
            @else
                @if(count($enquires_list)>0) 	
    		    @foreach($enquires_list as $enquiry_details) 
                <?php $enquiry_date = date('d/m/Y', strtotime($enquiry_details->created_date));
					 // $enquiry_date = $enquiry_details->created_date;?>
    				<tr class="gradeA odd">
                        <td class="text-center">{{ $i }} </td>
                        <td class="text-center">{{ $enquiry_details->name }} </td>
                        <td class=" text-center">{{ $enquiry_details->email }} </td>
                        <td class="text-center">{{ $enquiry_details->phone }} </td>
                        <td class="text-left "><div class="comment more">{{ $enquiry_details->message }}</div></td>
                        <td class="text-center">{{ $enquiry_date }}</td>
                    
                    </tr>
			<?php $i++; ?>
                @endforeach
                @endif
            @endif
				</tbody>
            </table></div>
                </div>

         </form>
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
    <script src="{{ url('') }}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>


    <script type="text/javascript">
       $(document).ready(function() {
          var showChar = 300;
          var ellipsestext = "...";
          var moretext = "Show more";
          var lesstext = "Show less";
          $('.more').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

              var c = content.substr(0, showChar);
              var h = content.substr(showChar-1, content.length - showChar);

              var html = c + '<span class="moreelipses">'+ellipsestext+'</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">'+moretext+'</a></span>';

              $(this).html(html);
            }

          });

          $(".morelink").click(function(){
            if($(this).hasClass("less")) {
              $(this).removeClass("less");
              $(this).html(moretext);
            } else {
              $(this).addClass("less");
              $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
          });
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

$(".closeAlert").click(function(){
    $(".alert-success").hide();
  });
      </script> 
	  
	 <script type="text/javascript">
   $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
	</script>

    

	
	
</body>
     <!-- END BODY -->
</html>
