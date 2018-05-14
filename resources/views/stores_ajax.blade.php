
    
       <?php $i=1;
	  
       if(count($get_store_details)>0) { foreach($get_store_details as $store) {  


         if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
          $stor_name = 'stor_name';
         }else {  $stor_name = 'stor_name_'.Session::get('lang_code'); } 

        $product_image     = $store->stor_img;
        /* Image Path */
        $prod_path  = url('').'/public/assets/default_image/No_image_product.png';
        $img_data   = "public/assets/storeimage/".$product_image;
        
        if(file_exists($img_data) && $product_image !='')   {
    
        $prod_path = url('').'/public/assets/storeimage/' .$product_image;                  
        }else{  
            
            if(isset($DynamicNoImage['store'])){
                $dyanamicNoImg_path = 'public/assets/noimage/'.$DynamicNoImage['store'];

                if($DynamicNoImage['store']!='' && file_exists($dyanamicNoImg_path))
                    $prod_path = url('').'/'.$dyanamicNoImg_path;
            }
        } 
        /* Image Path ends */   
        //Alt text
        $alt_text   = $store->$stor_name;

        ?>
         <div class="customBlock stor store-res" style="margin-top:10px; min-height:350px;" >
         <a href="<?php echo url('storeview/'.base64_encode(base64_encode(base64_encode($store->stor_id)))); ?>">
         <img src="{{ $prod_path }}" alt='{{ $alt_text }}' style="width:100%; height: auto;" >
         <a>
         <a href="#"><h4>
		 {{substr($store->$stor_name,0,25) }}
		 {{strlen($store->$stor_name)>25?'..':'' }}
						
		</h4></a>
       <div class="clearfix"></div>
       
      <center style="margin-bottom: 20px;"> <table border="0" class="table table-hover">
          <tr>
          
            <td><?php if (Lang::has(Session::get('lang_file').'.DEALS')!= '') { echo  trans(Session::get('lang_file').'.DEALS');}  else { echo trans($OUR_LANGUAGE.'.DEALS');} ?></td>
            <td>:</td>
            <td><?php
			if($get_store_deal_count[$store->stor_id] != 0) {
			 echo $get_store_deal_count[$store->stor_id]; } else { echo 'N/A'; } ?></td>
          </tr>
          <tr>
            <td><?php if (Lang::has(Session::get('lang_file').'.PRODUCTS')!= '') { echo  trans(Session::get('lang_file').'.PRODUCTS');}  else { echo trans($OUR_LANGUAGE.'.PRODUCTS');} ?></td>
            <td>:</td>
            <td><?php 
            
			if($get_store_product_count[$store->stor_id] != 0) {
        $sold_count=0;
         $store->stor_id;
        
        $store_result = DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_sh_id', '=', $store->stor_id)->get();
        
        foreach($store_result as $sold_pro){
          if($sold_pro->pro_no_of_purchase < $sold_pro->pro_qty) {

          
              $sold_count++;
          }
        }
        //echo $sold_count;
			// echo $get_store_product_count[$store->stor_id];
     
 //$get_store_product_by_id      = HomeController::get_store_product_by_id($store->stor_id);
        if($sold_count!=0){
          echo $sold_count; 
        }
        else {echo 'N/A'; }
        } 
			 else { echo 'N/A'; } ?>
			</td>
          </tr>
        
        </table>
         
       <a href="<?php echo url('storeview/'.base64_encode(base64_encode(base64_encode($store->stor_id)))); ?>">
       <button class="btn sub-mit"><?php if (Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= '') { echo  trans(Session::get('lang_file').'.VIEW_DETAILS');}  else { echo trans($OUR_LANGUAGE.'.VIEW_DETAILS');} ?></button> </a>
        </center>
         </div>
         <?php } } 
    
         
         
   ?>
     
