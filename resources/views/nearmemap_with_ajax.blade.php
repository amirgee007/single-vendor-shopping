
<script src="<?php echo url('');?>/themes/js/jquery-1.10.0.min.js" type="text/javascript"></script>
<?php 
  if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
    $deal_title = 'deal_title';
    $pro_title = 'pro_title';
    $stor_name = 'stor_name';

  }else {   $deal_title = 'deal_title_'.Session::get('lang_code'); 
            $pro_title = 'pro_title_'.Session::get('lang_code');
              $stor_name = 'stor_name_'.Session::get('lang_code'); 
               }


?>
<div id="carouselBl">
<div class="container" id="three">
<div class="row-fluid">
<div id="grids" style="margin-bottom:20px;margin-right: 12px;background: linear-gradient(to bottom, rgba(249, 249, 249, 1) 0%, rgba(239, 239, 239, 1) 47%, rgba(220, 220, 220, 1) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);" class="span3 tab-res tab-land"  >
  <select class="span12" name="selected_city" id="selected_city" required data-parsley-required="true" onchange="select_city(this.value)">
                  <option value="">--<?php if (Lang::has(Session::get('lang_file').'.SELECT_CITY')!= '') { echo  trans(Session::get('lang_file').'.SELECT_CITY');}  else { echo trans($OUR_LANGUAGE.'.SELECT_CITY');} ?>--</option>
                 <?php  foreach ($city_list as $city) 
                  {?>
                <option value="{{ $city->ci_id }}">{{ $city->ci_name }}</option>
                <?php }
                 ?>
                  </select>
                  <div style="padding: 10px;">
<ul id="myTab" class="nav nav-tabs">
 
  <li class="align_text active"><a data-toggle="tab" class="tab_text" href="#three"><?php if (Lang::has(Session::get('lang_file').'.STORES')!= '') { echo  trans(Session::get('lang_file').'.STORES');}  else { echo trans($OUR_LANGUAGE.'.STORES');} ?></a></li>
  <!-- <li class="align_text"><a href="#three"class="tab_text" data-toggle="tab">Auction</a></li>  -->
</ul>
 
<div class="tab-content" style="max-height:350px;overflow-x:hidden;overflow-y:scroll;">
  
  <div  class="tab-pane active">
     <?php if(count($selected_city)>0)  {  
  foreach($selected_city as $nearstore) { 
    $product_image =explode('/**/',$nearstore->stor_img);
    $name=$nearstore->stor_name;
    $product_img    =$product_image[0];

        /* Image Path */
        $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
        $img_data   = "public/assets/storeimage/".$product_img;
        
        if(file_exists($img_data) && $product_img !='')   {
        
        $prod_path = url('').'/public/assets/storeimage/' .$product_img;       
                   
        }else{  
            if(isset($DynamicNoImage['store'])){
                $dyanamicNoImg_path = 'public/assets/noimage/' .$DynamicNoImage['store'];
                if($DynamicNoImage['store']!='' && file_exists($dyanamicNoImg_path))
                  $prod_path = url('').'/'.$dyanamicNoImg_path;
            }
        }   
        /* Image Path ends */   
        //Alt text
        $alt_text  = $nearstore->$stor_name;
       // $alt_text=$store->$stor_name;
   ?>
  <div class="row-fluid" id="<?php echo $nearstore->stor_city;?>">
   <div class="span6" id="nearbsto4">

<a href="<?php echo url('storeview/'.base64_encode(base64_encode(base64_encode($nearstore->stor_id))));?>"><img src="{{ $prod_path }}" alt="{{ $alt_text }}" style="width:80px;height:auto;"></a> 

 <a href="#"><h4>
     {{substr($nearstore->$stor_name,0,25) }}
     {{strlen($nearstore->$stor_name)>25?'..':'' }}
            
    </h4></a>
       </div>
     
  </div>
  <hr style="border:1px solid #aaaaaa;">
  <?php  } }
 

   else { ?>
  <div class="row-fluid">
   <div class="span12">
    <?php if (Lang::has(Session::get('lang_file').'.Nearbyshop')!= '') { echo  trans(Session::get('lang_file').'.Nearbyshop');}  else { echo trans($OUR_LANGUAGE.'.Nearbyshop');} ?>...
     </div></div>
  <?php } ?> 
  </div>
    
</div>
</div>
</div>

<?php if(count($selected_city)>0)  {  ?>
<div>
     <div id="map" style="height: 428px;  margin: 2%; ">
     </div>
   <?php 
    if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
    $map_lang = 'en';
    }else {  
    $map_lang = 'fr';
    }
   ?>
      
    <script type="text/javascript">
    var locations = [
   <?php  
    foreach($get_store_all as $sg) { 
     if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
      $stor_name = 'stor_name';
      $stor_address1 = 'stor_address1';
      $stor_address2 = 'stor_address2';
     }else {  
      $stor_name = 'stor_name_'.Session::get('lang_code'); 
      $stor_address1 = 'stor_address1_'.Session::get('lang_code'); 
      $stor_address2 = 'stor_address1_'.Session::get('lang_code'); 
     } ?>        
      ['<b><?php if (Lang::has(Session::get('lang_file').'.STORE_NAME')!= '') { echo  trans(Session::get('lang_file').'.STORE_NAME');}  else { echo trans($OUR_LANGUAGE.'.STORE_NAME');} ?>:</b>&nbsp;<?php echo $sg->$stor_name; ?>,<br/><b><?php if (Lang::has(Session::get('lang_file').'.ADDRESS1')!= '') { echo  trans(Session::get('lang_file').'.ADDRESS1');}  else { echo trans($OUR_LANGUAGE.'.ADDRESS1');} ?>:</b>&nbsp;<?php echo $sg->$stor_address1; ?>,<br/><?php echo $sg->$stor_address2; ?>,<br/><b><?php if (Lang::has(Session::get('lang_file').'.PHONE')!= '') { echo  trans(Session::get('lang_file').'.PHONE');}  else { echo trans($OUR_LANGUAGE.'.PHONE');} ?>:</b>&nbsp;<?php echo $sg->stor_phone; ?>',  <?php echo $sg->stor_latitude; ?>, <?php echo $sg->stor_longitude; ?>, 4],
      <?php $stor_latitude=$sg->stor_latitude; $stor_longitude=$sg->stor_longitude;}  ?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
    
      center: new google.maps.LatLng(<?php echo $stor_latitude; ?>, <?php echo $stor_longitude; ?>),
    
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</div>
<?php } else { 
  
    if (Lang::has(Session::get('lang_file').'.Nearbyshop')!= '')
     { ?><div class="no-str-avail span8">
      <?php echo  trans(Session::get('lang_file').'.Nearbyshop'); ?>
      </div> <?php }  
    else { ?><div class="no-str-avail span8">
        <?php echo trans($OUR_LANGUAGE.'.Nearbyshop');?>
             </div> <?php }
       } ?>  


</div>
</div>

</div>


<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

 
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
    

  function select_city(city_id)
  {
     var passData = 'city_id='+city_id;
    
     
     $.ajax({
            type:'get',
          data: passData,
          url: '<?php echo url('nearbystore_select_city'); ?>',
          success: function(data){  
          $("#three").html(data);
           
        }   
      });   
  }
</script>
  <!-- For Responsive menu-->
    
<!-- Placed at the end of the document so the pages load faster ============================================= -->

  <script type="text/javascript" src="themes/js/slider/jquery.easing.1.3.js"></script>
  <!-- the jScrollPane script -->
  <script type="text/javascript" src="themes/js/slider/jquery.mousewheel.js"></script>
  <script type="text/javascript" src="themes/js/slider/jquery.contentcarousel.js"></script>
  <script type="text/javascript">
    $('#ca-container').contentcarousel();
  </script>

</body>
</html>