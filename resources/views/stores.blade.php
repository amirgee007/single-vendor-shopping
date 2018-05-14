{!! $navbar !!}

<!-- Navbar ================================================== -->
{!! $header !!}
<!--<link rel="stylesheet" href="public/assets/plugins/bootstrap/css/bootstrap.css" />
this link has pagination design, if we include this link other designs are changing-->

<style>
.pgntn{
	width: 29%;
    padding: 30px;
    text-align: center;
    margin: 0 auto;}
.pagination ul{}
.pagination li{
	float: left;
    list-style: none;
    margin-left: 15px;
    background-color:#d82672;
    text-align: center;
    padding: 5px 10px;
	border-radius: 2px;   
	}
.pagination .active{ color:#fff;}	
.pagination a:focus {
    outline: none;}
</style>
   
<!-- Header End====================================================================== -->
<div id="mainBody">
<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	
<!-- Sidebar end=============================================== -->
	<div class="span12">
    <ul class="breadcrumb">
    <li><a href="{{ url('index') }}">@if (Lang::has(Session::get('lang_file').'.HOME')!= '') {{  trans(Session::get('lang_file').'.HOME') }} @else {{ trans($OUR_LANGUAGE.'.HOME') }} @endif</a> <span class="divider">/</span></li>
    <li><a href="{{ url('stores') }}">@if (Lang::has(Session::get('lang_file').'.STORES')!= '') {{ trans(Session::get('lang_file').'.STORES') }} @else {{ trans($OUR_LANGUAGE.'.STORES') }} @endif</a></li>
    </ul>	
	<center> @if (Session::has('success_store'))
		<div class="alert alert-warning alert-dismissable">{!! Session::get('success_store') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif</center>
	 <h4>@if(Lang::has(Session::get('lang_file').'.STORES')!= '') {{ trans(Session::get('lang_file').'.STORES') }}  @else{{ trans($OUR_LANGUAGE.'.STORES') }} @endif</h4>
     <legend></legend>
     <div class="container">
     <div class="row">
     	<div class="span12" id="storpg">
      <span  id="close"> <input type="hidden" class="scroll" value="2" id='page_number' /> </span>
  @php
  $get_store_count=DB::table('nm_store')
        ->join('nm_merchant','nm_merchant.mer_id','=','nm_store.stor_merchant_id')
        ->where('nm_merchant.mer_staus','=',1)
        ->where('nm_store.stor_status', '=', 1)
        ->groupby('stor_merchant_id')
        ->orderby('nm_store.stor_id','desc')
        ->get()
        ->count();
     
        $i=1;  @endphp
	  
       @if(count($get_store_details)>0) 
       @foreach($get_store_details as $store)   


         @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
        @php  $stor_name = 'stor_name'; @endphp
         @else @php  $stor_name = 'stor_name_'.Session::get('lang_code'); @endphp @endif 

       @php $product_image     = $store->stor_img;
       
        $prod_path  = url('').'/public/assets/default_image/No_image_store.png';
        $img_data   = "public/assets/storeimage/".$product_image; @endphp
        
        @if(file_exists($img_data) && $product_image !='')   
    
       @php $prod_path = url('').'/public/assets/storeimage/' .$product_image;  @endphp              
        @else  
            
            @if(isset($DynamicNoImage['store']))
              @php  $dyanamicNoImg_path = 'public/assets/noimage/'.$DynamicNoImage['store']; @endphp

                @if($DynamicNoImage['store']!='' && file_exists($dyanamicNoImg_path))
                   @php $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
            @endif
        @endif
        
       @php $alt_text   = $store->$stor_name; @endphp

        
         <div class="customBlock stor store-res" style="margin-top:10px; min-height:350px;" >
         <a href="<?php echo url('storeview/'.base64_encode(base64_encode(base64_encode($store->stor_id)))); ?>">
         <img src="{{ $prod_path }}" alt='{{ $alt_text }}' style="width:100%; height:auto;" >
         <a>
         <a href="#"><h4>
		 {{substr($store->$stor_name,0,25) }}
		 {{strlen($store->$stor_name)>25?'..':'' }}
						
		</h4></a>
       <div class="clearfix"></div>
       
      <center style="margin-bottom: 20px;"> <table border="0" class="table table-hover">
          <tr>
          
            <td>@if (Lang::has(Session::get('lang_file').'.DEALS')!= '') {{ trans(Session::get('lang_file').'.DEALS') }} @else {{ trans($OUR_LANGUAGE.'.DEALS') }} @endif</td>
            <td>:</td>
            <td>
			@if($get_store_deal_count[$store->stor_id] != 0) {{
			 $get_store_deal_count[$store->stor_id] }} @else {{ 'N/A' }} @endif</td>
          </tr>
          <tr>
            <td>@if (Lang::has(Session::get('lang_file').'.PRODUCTS')!= '') {{ trans(Session::get('lang_file').'.PRODUCTS') }}  @else {{ trans($OUR_LANGUAGE.'.PRODUCTS') }} @endif</td>
            <td>:</td>
            <td>
      
            
			@if($get_store_product_count[$store->stor_id] != 0) 
      @php  $sold_count=0;
         $store->stor_id;
        
        $store_result = DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_sh_id', '=', $store->stor_id)->get(); @endphp
        
        @foreach($store_result as $sold_pro)
          @if($sold_pro->pro_no_of_purchase < $sold_pro->pro_qty) 

          
             @php $sold_count++; @endphp
          @endif
        @endforeach
       <!--  //echo $sold_count;
			// echo $get_store_product_count[$store->stor_id]; 
     
 //$get_store_product_by_id      = HomeController::get_store_product_by_id($store->stor_id);-->
        @if($sold_count!=0){{ $sold_count }} 
        
        
        @else {{ 'N/A' }} @endif
         
			 @else {{ 'N/A' }} @endif
			</td>
          </tr>
        
        </table>
         
       <a href="<?php echo url('storeview/'.base64_encode(base64_encode(base64_encode($store->stor_id)))); ?>">
       <button class="btn sub-mit">@if (Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= '') {{ trans(Session::get('lang_file').'.VIEW_DETAILS') }} @else {{ trans($OUR_LANGUAGE.'.VIEW_DETAILS') }} @endif</button> </a>
        </center>
         </div>
          @endforeach  
          @else 
          <h5 style="color:#933;" >@if (Lang::has(Session::get('lang_file').'.NO_STORES_FOUND')!= '') {{ trans(Session::get('lang_file').'.NO_STORES_FOUND') }} @else {{ trans($OUR_LANGUAGE.'.NO_STORES_FOUND') }} @endif.</h5>
        @endif
    
         
         
  
   
     </div>
     </div> 
     </div>
</div>
</div> </div>
<center><div class="myLoader" style="display: none;"><img src="./images/loader.gif"></div></center>

 <!--pagination-->
	<!--<div class="pgntn">
    <?php 
   /*  $get_store_details->setPath('');
    echo $get_store_details->render(); */ ?>
	</div>->
	<!--end pagination-->
	
</div>
 
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

	{!! $footer !!}
<!-- For Responsive menu-->
<script type="text/javascript">

    $(document).ready(function() {
        $(document).on("click", ".customCategories .topfirst b", function() {
            $(this).next("ul").css("position", "relative");

            $(".topfirst ul").not($(this).parents(".topfirst").find("ul")).css("display", "none");
            $(this).next("ul").toggle();
        });

        $(document).on("click", ".morePage", function() {
            $(".nextPage").slideToggle(200);
        });

        $(document).on("click", "#smallScreen", function() {
            $(this).toggleClass("customMenu");
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 250) {
                $('#comp_myprod').show();
            } else {
                $('#comp_myprod').hide();
            }
        });

    });
</script>
  <!-- For Responsive menu-->
</body>
</html>

<script>
var pagenumber=$("#page_number").val();
var i=0;
var store_count='<?php echo $get_store_count; ?>';
var pagination=Math.round(store_count/4);
//alert(store_count);
//alert(pagination);
//alert(pagenumber);

$(window).scroll(function(){
  if($(window).scrollTop()+$(window).height() >= $(document).height())  
  {
      $(".myLoader").show();
  pagenumber++; 
  $("#page_number").val(pagenumber);
if(pagination<=pagenumber)
{
   $(".myLoader").hide();
  return false;
}
  $.ajax({
    url:'<?php echo url("stores_ajax"); ?>?page='+pagenumber,
    type:"get",
    success:function(data,status){

      
      if(data.trim()=='' && i==0){ 
      $('img#thumb').removeAttr('id');
      i++;
      $(".myLoader").hide();
    } else {
        $(".myLoader").hide();
        $('#storpg').append(data);
      }
      }
    });
  }
});
</script>

