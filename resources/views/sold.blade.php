{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody">
   <div class="container">
      <!-- Sidebar ================================================== -->
      <!-- Sidebar end=============================================== -->
      <h4>@if (Lang::has(Session::get('lang_file').'.SOLD_PRODUCTS')!= '') {{  trans(Session::get('lang_file').'.SOLD_PRODUCTS') }} @else {{ trans($OUR_LANGUAGE.'.SOLD_PRODUCTS') }} @endif</h4>
      <legend></legend>
      <div class="row">
         @php $sold_product_error = "";
         $sold_product_count=0; @endphp
         @if($get_store_product_by_id)  
         @foreach($get_store_product_by_id as $fetch_most_visit_pro) 
         @if($fetch_most_visit_pro->pro_no_of_purchase >= $fetch_most_visit_pro->pro_qty) 
         @php  $sold_product_count++; 
         $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
         $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
         $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
         $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
         $res = base64_encode($fetch_most_visit_pro->pro_id);
         $sold_product_error = 1; 
         $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;
         $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);
         $mostproduct_img = explode('/**/', $fetch_most_visit_pro->pro_Img);@endphp
         <div class="customBlock tab-sold-wid" style="">
            <span class="sold"></span>
            @php $product_img    = $mostproduct_img[0];
            $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
            $img_data   = "public/assets/product/".$product_img; @endphp
            @if(file_exists($img_data) && $product_img !='')   
            @php  $prod_path = url('').'/public/assets/product/' .$product_img; @endphp                 
            @else  
            @if(!isset($DynamicNoImage['productImg']))
            @php  $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['productImg']; @endphp
            @if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path))
            @php   $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp @endif
            @endif
            @endif
            @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
            <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><img alt="" src="{{ $prod_path }}" height="215px" width="100%"></a>
            @endif
            @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
            <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" ><img alt="" src="{{ $prod_path }}" height="215px" width="100%"></a>
            @endif
            @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '')
            <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" ><img alt="" src="{{ $prod_path }}" height="215px" width="100%"></a>
            @endif
            @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
            @php  $title = 'pro_title'; @endphp
            @else  @php $title = 'pro_title_'.Session::get('lang_code'); @endphp  @endif
            @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
            <h4><a class="s_detail" href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">{{substr($fetch_most_visit_pro->$title,0,25) }}    {{  strlen($fetch_most_visit_pro->$title)>25?'..':'' }}  </a></h4>
            @endif
            @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
            <h4><a class="s_detail" href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}">{{substr($fetch_most_visit_pro->$title,0,25) }}    {{  strlen($fetch_most_visit_pro->$title)>25?'..':'' }} </a></h4>
            @endif
            @if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
            <h4><a class="s_detail" href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}">{{substr($fetch_most_visit_pro->$title,0,25) }}    {{  strlen($fetch_most_visit_pro->$title)>25?'..':'' }} </a></h4>
            @endif
         </div>
         @endif @endforeach
         <?php  if($sold_product_count==0)
            {
                echo "<center>No Products Found!</centre>";
              } ?>
         @else   
         <h5 style="color:#933;" >@if(Lang::has(Session::get('lang_file').'.NO_RECORDS_FOUND_UNDER_PRODUCTS')!= '') {{ trans(Session::get('lang_file').'.NO_RECORDS_FOUND_UNDER_PRODUCTS') }} @else {{ trans($OUR_LANGUAGE.'.NO_RECORDS_FOUND_UNDER_PRODUCTS') }} @endif.</h5>
         @endif
      </div>
      <h4>@if (Lang::has(Session::get('lang_file').'.SOLD_DEALS')!= '') {{ trans(Session::get('lang_file').'.SOLD_DEALS') }} @else {{ trans($OUR_LANGUAGE.'.SOLD_DEALS') }} @endif</h4>
      <legend></legend>
      <div class="row">
         @php  $sold_deal_error = "";
         $sold_deals_count=0; @endphp
         @if($get_store_deal_by_id)  
         @php $date = date('Y-m-d H:i:s'); @endphp
         @foreach($get_store_deal_by_id as $store_deal_by_id) 
         @if(($store_deal_by_id->deal_no_of_purchase >= $store_deal_by_id->deal_max_limit)) 
         @php $sold_deals_count++; @endphp
         <!--  //displaying only exceed user limit
            //if($date > $store_deal_by_id->deal_end_date) {                                        //not to display exipred deals in sold out -->
         @php $sold_deal_error = 1; 
         $dealdiscount_percentage = $store_deal_by_id->deal_discount_percentage;
         $deal_img= explode('/**/', $store_deal_by_id->deal_image);
         $mcat = strtolower(str_replace(' ','-',$store_deal_by_id->mc_name));
         $smcat = strtolower(str_replace(' ','-',$store_deal_by_id->smc_name));
         $sbcat = strtolower(str_replace(' ','-',$store_deal_by_id->sb_name));
         $ssbcat = strtolower(str_replace(' ','-',$store_deal_by_id->ssb_name)); 
         $res = base64_encode($store_deal_by_id->deal_id); @endphp
         @php $product_image     = $deal_img[0];
         $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
         $img_data   = "public/assets/deals/".$product_image; @endphp
         @if(file_exists($img_data) && $product_image !='')   
         @php  $prod_path = url('').'/public/assets/deals/' .$product_image;  @endphp                
         @else  
         @if(isset($DynamicNoImage['dealImg']))
         @php   $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['dealImg'];@endphp
         @if($DynamicNoImage['dealImg']!='' && file_exists($dyanamicNoImg_path))
         @php $prod_path = url('').'/'.$dyanamicNoImg_path; @endphp
         @endif
         @endif
         @endif 
         <div class="customBlock  tab-sold-wid" style="">
            <i class="sold"></i>
            @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">
            <img src="{{ $prod_path }}" alt="" height="215px">
            </a>
            @elseif($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" >
            <img src="{{ $prod_path }}" alt="" height="215px">
            </a>
            @elseif($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
            <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" >
            <img src="{{ $prod_path }}" alt="" height="215px">
            </a>
            @elseif($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
            <a href="{!! url('dealview').'/'.$mcat.'/'.$res!!}">
            <img  src="{{ $prod_path }}" alt="" height="215px">
            </a>
            @endif
            @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
            @php  $deal_title = 'deal_title'; @endphp
            @else @php  $deal_title = 'deal_title_'.Session::get('lang_code'); @endphp @endif
            @if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') 
            <h4> <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}" class="s_detail">{{substr($store_deal_by_id->$deal_title,0,25) }}    {{  strlen($store_deal_by_id->$deal_title)>25?'..':'' }}</a></h4>
            @elseif($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') 
            <h4> <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" class="s_detail">{{substr($store_deal_by_id->$deal_title,0,25) }}    {{  strlen($store_deal_by_id->$deal_title)>25?'..':'' }}</a></h4>
            @elseif($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') 
            <h4> <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" class="s_detail">{{substr($store_deal_by_id->$deal_title,0,25) }}    {{  strlen($store_deal_by_id->$deal_title)>25?'..':'' }}</a></h4>
            @elseif($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') 
            <h4><a href="{!! url('dealview').'/'.$mcat.'/'.$res!!}">{{substr($store_deal_by_id->$deal_title,0,25) }}    {{  strlen($store_deal_by_id->$deal_title)>25?'..':'' }}</a></h4>
            @endif
         </div>
         @endif 
         @endforeach
         <?php if($sold_deals_count==0)
            {
              echo "<center>No Deals Found!</centre>";
            }?>
         @else if(count($sold_deal_error)!=0) 
         <h5 style="color:#933;" >@if (Lang::has(Session::get('lang_file').'.NO_RECORDS_FOUND_UNDER_DEALS')!= '') {{ trans(Session::get('lang_file').'.NO_RECORDS_FOUND_UNDER_DEALS') }} @else {{ trans($OUR_LANGUAGE.'.NO_RECORDS_FOUND_UNDER_DEALS') }} @endif.</h5>
         @endif
         <!--?php  if($sold_deal_error != 1) { ?>
            <h5 style="color:#933;" >No records found under deals.</h5>
            <?php //} ?> -->
      </div>
   </div>
</div>
</div>
<!-- Footer ================================================================== -->
{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
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
<script src="plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>
<script src="plug-k/demo/js/demo.js" type="text/javascript"></script>
<?php /*<script type="text/javascript" src="<?php echo url(); ?>/themes/js/jquery-1.5.2.min.js"></script>*/ ?>
<script type="text/javascript" src="{{ url('') }}/themes/js/scriptbreaker-multiple-accordion-1.js"></script>
<script language="JavaScript">
   $(document).ready(function() {
       $(".topnav").accordion({
           accordion:false,
           speed: 500,
           closedSign: '<span class="icon-chevron-right"></span>',
           openedSign: '<span class="icon-chevron-down"></span>'
       });
   });
   
</script>
<script type="text/javascript">
   $.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>  
</body>
</html>