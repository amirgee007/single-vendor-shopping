<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>

  
<STYLE>

.morecontent span {
  display: none;

}
</STYLE>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{  (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_FAQ')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_MANAGE_FAQ') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_FAQ') }} </title>
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
     @php  
     $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/ {{ $fav->imgs_name }}">
@endif
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                            	<li class=""><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_HOME') :trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }}</a></li>
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_FAQ')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_MANAGE_FAQ') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_FAQ') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_FAQ')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_MANAGE_FAQ') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_FAQ') }}</h5>
            
        </header>
   
   
 <div class="row">
   	
    <div class="col-lg-12">
    @if (Session::has('updated_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('updated_result') !!}
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}
         </div>
		@endif
        @if (Session::has('insert_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('insert_result') !!}
	{{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}</div>
        
		@endif
        @if (Session::has('delete_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('delete_result') !!}
         {{ Form::button('×',['class' => 'close','data-dismiss' =>'alert', 'aria-hidden' => 'true']) }}</div>
		
		@endif



    <div style="display: none;" class="la-alert rec-select alert-success alert-dismissable">Select atleast one Faq
	{{ Form::button('×',['class' => 'close closeAlert', 'aria-hidden' => 'true']) }}
       </div>

 <div style="display: none;" class="la-alert rec-update alert-success alert-dismissable">Record Updated Successfully
 {{ Form::button('×',['class' => 'close closeAlert', 'aria-hidden' => 'true']) }}
         </div>

<div class="manage-filter"><span class="squaredFour">
      <input  type="checkbox" name="chk[]" onchange="checkAll(this)" id="check_all"/>
      <label for="check_all">Check all</label>
    </span>&nbsp;
	{{ Form::button('Block',['class' => 'btn btn-primary','id' => 'Block_value']) }}
	{{ Form::button('Un Block',['class' => 'btn btn-warning','id' => 'UNBlock_value']) }}
	{{ Form::button('Delete',['class' => 'btn btn-warning','id' => 'Delete_value']) }}
	
     
              
               
</div>
         <div class="table-responsive panel_marg_clr ppd">
    	 <table aria-describedby="dataTables-example_info" class="table table-manage table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
              <thead>
                <tr>
                <th style="width:10%;"class="text-center"></th>
                  <th style="width:10%;"class="text-center">{{  (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
                  <th class="text-center">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_QUESTION')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_QUESTION') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_QUESTION') }}</th>
				   <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_ANSWER')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_ANSWER') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_ANSWER') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '')  ?   trans(Session::get('admin_lang_file').'.BACK_EDIT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }}</th>
				   <th style="text-align:center;">{{  (Lang::has(Session::get('admin_lang_file').'.BACK_STATUS')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_STATUS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_STATUS') }} </th>
				  <th style="text-align:center;">{{  (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '')  ? trans(Session::get('admin_lang_file').'.BACK_DELETE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; ?>
    @if(count($faqresult)>0)             
	  @foreach ($faqresult as $info) 
                <tr>
                <td  class="text-center">
                   <input type="checkbox" class="table_id" value="{{ $info->faq_id }}" name="chk[]">
                </td>
                  <td class="text-center">{!!$i!!}</td>
                  <td class="text-center">{!!$info->faq_name!!}</td>
                  
                   <td class="text-left"><div class="comment more"> {{ $info->faq_ans }}</div></td>




				<td class="text-center"><a href="{{ url('edit_faq/'.$info->faq_id) }}" data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_EDIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }}"><i class="icon icon-edit icon-2x"></i></a></td>



  		<td class="text-center"><?php if($info->faq_status== 0){ ?><a href="{!! url('status_faq_submit').'/'.$info->faq_id.'/'.'1'!!}" data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UNBLOCK')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UNBLOCK') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_UNBLOCK') }}"><i class="icon icon-ok icon-2x"></i>
                  </a> <?php } else { ?> <a href="{!! url('status_faq_submit').'/'.$info->faq_id.'/'.'0'!!}" data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK')!= '') ?   trans(Session::get('admin_lang_file').'.BACK_BLOCK') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK') }}">
                   <i class="icon icon-ban-circle icon-2x icon-me"></i></a> <?php } ?></td>
		 <td class="text-center"><a href="<?php echo url('delete_faq/'.$info->faq_id); ?>" data-tooltip="{{  (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '')  ?  trans(Session::get('admin_lang_file').'.BACK_DELETE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }}"><i class="icon icon-trash icon-2x"></i></a></td>
                </tr>
				  
		
	<?php $i=$i+1; ?>
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
     <script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
   
      <script type="text/javascript">
       $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
    </script>

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="{{ url('') }}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>

    <script type="text/javascript">
 
  //Check all checked box

function checkAll(ele) {
  
  
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }

 //To block multiple checked
  $(function(){
    
      $('#Block_value').click(function(){
         $(".rec-select").css({"display" : "none"});
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });  console.log(val);

         if(val=='')
         {
         $(".rec-select").css({"display" : "block"});
         return;
         }
            
        $.ajax({

          type:'GET',
          url :"<?php echo url("status_faq_submit_multiple"); ?>",
          data:{val:val},

          success:function(data,success){
            if(data==0){
              $(".rec-update").css("display", "block");
              window.setTimeout(function(){location.reload()},1000)
                       }
            else if(data==1){
             $(".rec-update").css("display", "block");
              window.setTimeout(function(){location.reload()},1000)
                           }
          }
        }); });

    });

  //To unblock multiple checked

  $(function(){
    
      $('#UNBlock_value').click(function(){
         $(".rec-select").css({"display" : "none"});
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });  console.log(val);

         if(val=='')
         {
          $(".rec-select").css({"display" : "block"});
          return;
         }


        $.ajax({ 

          type:'GET',
          url :"<?php echo url("status_faq_submit_multiple_unblock"); ?>",
          data:{val:val},

          success:function(data,success){

            if(data==0){
              $(".rec-update").css("display", "block");
              window.setTimeout(function(){location.reload()},1000)
                       }
            else if(data==1){
               $(".rec-update").css("display", "block");
              window.setTimeout(function(){location.reload()},1000)
                           }
          }
        }); });

    });


  //multiple delete

  $(function(){
    
      $('#Delete_value').click(function(){
         $(".rec-select").css({"display" : "none"});
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });  console.log(val);

         if(val=='')
         {
          $(".rec-select").css({"display" : "block"});
          return;
         }


        $.ajax({

          type:'GET',
          url :"<?php echo url("delete_faq_multiple"); ?>",
          data:{val:val},

          success:function(data,success){
            if(data==0){
              $(".rec-update").css("display", "block");
              window.setTimeout(function(){location.reload()},1000)
                       }
            else if(data==1){
               $(".rec-update").css("display", "block");
              window.setTimeout(function(){location.reload()},1000)
                           }
          }
        }); });

    });

  $(".closeAlert").click(function(){
    $(".alert-success").hide();
  });

  

    </script>

 
    <SCRIPT>
$(document).ready(function() {
  var showChar = 100;
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
</SCRIPT>


</body>
     <!-- END BODY -->
</html>
