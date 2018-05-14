<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $SITENAME }} | {{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CITIES')!= '') ? trans(Session::get('admin_lang_file').'.BACK_MANAGE_CITIES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CITIES')}}</title>
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
                                <li class="active"><a >{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CITIES')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_CITIES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CITIES') }}</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{{ (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_CITIES')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_MANAGE_CITIES') : trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_CITIES')}}</h5>
            
        </header>
     @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">
	{{ Form::button('×',['class' => 'close' , 'data-dismiss' => 'alert','aria-hidden' => 'true']) }}
	{!! Session::get('success') !!}</div>
		@endif
   
 <div class="row">
   	
    <div class="col-lg-12">
    <div style="display: none;" class="la-alert rec-select alert-success alert-dismissable">Select atleast one city
	{{ Form::button('×',['class' => 'close closeAlert' ,'aria-hidden' => 'true']) }}
	
        </div>

 <div style="display: none;" class="la-alert rec-update alert-success alert-dismissable">Record Updated Successfully
 
		{{ Form::button('×',['class' => 'close closeAlert' ,'aria-hidden' => 'true']) }}
	
         </div>

<div class="manage-filter"><span class="squaredFour">
      <input  type="checkbox" name="chk[]" onchange="checkAll(this)" id="check_all"/>
      <label for="check_all">Check all</label>
    </span>&nbsp;
	{{ Form::button('Block',['class' => 'btn btn-primary' ,'id' => 'Block_value']) }}
	{{ Form::button('Un Block',['class' => 'btn btn-warning' ,'id' => 'UNBlock_value']) }}
    
    {{-- Update default city  --}}
    <div class=" pull-right">
       {!! Form::open(array('url'=>'update_default_city_submit','class'=>'form-horizontal')) !!}
	   {{ Form::hidden('default_city_id','1',['id' => 'default_city_id']) }}
                         
                        <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UPDATE')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UPDATE') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_UPDATE') }}</button>
                        {!! Form::close()!!}
    </div>
     {{-- Update default city ends --}}          
</div>

        
   <div class="table-responsive panel_marg_clr ppd">
    	 <table aria-describedby="dataTables-example_info" class="table table-manage table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
              <thead>
             
                <tr>
                <th style="" class="text-center"></th>

                  <th style="" class="text-center">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_SNO')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_SNO') : trans($ADMIN_OUR_LANGUAGE.'.BACK_SNO') }}</th>
                  <th  class="text-center">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_CITY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_CITY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_CITY') }}</th>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_COUNTRY')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_COUNTRY') : trans($ADMIN_OUR_LANGUAGE.'.BACK_COUNTRY') }}</th>
				  
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }}</th>
				   <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_STATUS')!= '') ? trans(Session::get('admin_lang_file').'.BACK_STATUS') : trans($ADMIN_OUR_LANGUAGE.'.BACK_STATUS') }}</th>
				  <?php /* <th style="text-align:center;"><?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DELETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE');} ?></th> */ ?>
				  <th style="text-align:center;">{{ (Lang::has(Session::get('admin_lang_file').'.BACK_DEFAULT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_DEFAULT') : trans($ADMIN_OUR_LANGUAGE.'.BACK_DEFAULT') }}</th>
                </tr>
              </thead>
              <tbody>
              <?php $i =1;  // co_status //ci_default?>
              @if(count($citydetails)>0)  
                 @foreach($citydetails as $citydet)
                <tr>
                <td  class="text-center">
                   <input type="checkbox" class="table_id" value="{{ $citydet->ci_id }}" name="chk[]">
                </td>
                  <td  class="text-center">{{ $i }}</td>
                  <td class="text-center">{!! $citydet->ci_name!!}</td>
                  <td class="text-center">{!! $citydet->co_name!!}</td>

                  

				     <td class="text-center"><a href="{!! url('edit_city').'/'.$citydet->ci_id!!}" data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_EDIT') :  trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT')}}"><i class="icon icon-edit icon-2x"></i></a></td>
                
                    
              @if($citydet->ci_default != 1)
				   <td class="text-center">@if($citydet->ci_status == 1)<a href="{!! url('status_city_submit').'/'.$citydet->ci_id.'/'.'0'!!}" title="Block" data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_BLOCK')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_BLOCK') : trans($ADMIN_OUR_LANGUAGE.'.BACK_BLOCK') }}"><i class="icon icon-ok icon-2x"></i>
          </a> @else  <a href="{!! url('status_city_submit').'/'.$citydet->ci_id.'/'.'1'!!}"  data-tooltip="{{ (Lang::has(Session::get('admin_lang_file').'.BACK_UNBLOCK')!= '') ?  trans(Session::get('admin_lang_file').'.BACK_UNBLOCK') : trans($ADMIN_OUR_LANGUAGE.'.BACK_UNBLOCK') }}">
                   <i class="icon icon-ban-circle icon-2x icon-me"></i></a>@endif</td>
                   
					 @else <td class="text-center"> <a  title="default city" data-tooltip="{{ "Can't Block Default city" }}"><i class="icon icon-ok icon-2x"></i>
          </a></td> 
		  @endif
		  <?php   /*
                     <td class="text-center"><a href="{!! url('delete_city').'/'.$citydet->ci_id!!}" data-tooltip="<?php if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') { echo  trans(Session::get('admin_lang_file').'.BACK_DELETE');}  else { echo trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE');} ?>"><i class="icon icon-trash icon-2x"></i></a></td> */ ?>
				                        
					<td class="text-center"><input type="radio" value="{!!$citydet->ci_id!!}" <?php if($citydet->ci_default == 1){ ?> checked <?php } ?> name="default_city" id="default_city"></td>
          

          
                </tr>
                <?php $i++;?>
                @endforeach
			       @endif
			

              </tbody>
            </table></div>
            
            	<?php //echo $citydetails->setPath('manage_city'); ?>
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
    <script src="public/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS --> 
    <script src="{{ url('') }}/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    

     <script>
	 $('input[name=default_city]').click(function(){
		
        var value= $('input[name=default_city]:checked').val();
		$('#default_city_id').val(value);
		 
		 });
	 </script>
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

         $(document).ready(function() {
  setTimeout(function() {
     $('select[name="dataTables-example_length"]').on('change', function(){    
    
    var k=$(this).val(); 

    $('#sele').val(k)  
});
  }, 5);
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
          url :"<?php echo url("block_status_city_submit"); ?>",
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
          $(".rec-select").css("display", "none");
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });  console.log(val);

         if(val=='')
         {
          //location.reload();
        $(".rec-select").css("display", "block");
          return;
         }


        $.ajax({


          type:'GET',
          url :"<?php echo url("unblock_status_city_submit"); ?>",
          data:{val:val},

          success:function(data,success){
            if(data==0){
            $(".rec-update").css("display", "block");
                window.setTimeout(function(){location.reload()},1000)
                       }
            else if(data==1){
              $(".rec-update").css("display", "block");
      
              //location.reload();
               window.setTimeout(function(){location.reload()},1000)
                           }
          }
        }); });

    });


  

  $(".closeAlert").click(function(){
    $(".alert-success").hide();
  });

    </script>
     
</body>
     <!-- END BODY -->
</html>
