
<?php echo $navbar; ?>

<!-- Navbar ================================================== -->
<?php echo $header; ?>

<!-- Header End====================================================================== -->
<link rel="stylesheet" href="<?php echo e(url('')); ?>/public/assets/css/new_css.css" />
<?php $prod_path_loader = url('').'/public/assets/noimage/product_loading.gif';
if(!isset($_SESSION['compare_product'])&&(!isset($_SESSION['sub_cat_id']))){
$_SESSION['compare_product']=array();
$_SESSION['sub_cat_id']      = array();
} 

?>

<div class="loading_prnt">
	<div class="loadingGiff"></div>
</div>

<div  id="product_page">
<div id="mainBody">
	<div class="container">
	<?php if(Session::has('wish')): ?>
	<p class="alert <?php echo Session::get('alert-class', 'alert-success'); ?>"><?php echo Session::get('wish'); ?></p>
	<?php endif; ?>
	<div class="row" id="prdblpg">
<!-- Sidebar ================================================== -->
	<div class="span3 customCategories products" id="sidebar">
		<div class="side-menu-head"><strong><?php if (Lang::has(Session::get('lang_file').'.CATEGORIES')!= '') { echo  trans(Session::get('lang_file').'.CATEGORIES');}  else { echo trans($OUR_LANGUAGE.'.CATEGORIES');} ?> </strong></div>
			<ul id="css3menu1" class="topmenu">
			<input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>

<?php if(count($product_details) != 0): ?>
<?php if($maincategory_id==''): ?>
 <?php $i=1;  ?>
<?php if(count($main_category)>0): ?>

	<?php $__currentLoopData = $main_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_main_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	 
	<?php $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; ?>
		<?php if($i<=20): ?>
		
					
			
			<?php if(count($sub_main_category[$fetch_main_cat->mc_id])> 0): ?>
		
			<li class="topfirst"><a href="<?php echo e(url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1)); ?>">
				<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
					<?php  $mc_name = 'mc_name'; ?>
				<?php else: ?> <?php  $mc_name = 'mc_name_'.Session::get('lang_code'); ?> <?php endif; ?>
			<?php echo e($fetch_main_cat->$mc_name); ?></a> <b class="OpenCat" onclick="">+</b>
			<ul>
				
				<?php $__currentLoopData = $sub_main_category[$fetch_main_cat->mc_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_sub_main_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
				<?php	$pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>
					
					<li class="subfirst"><a href="<?php echo e(url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2)); ?>">
						<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
						<?php  $smc_name = 'smc_name'; ?>
						<?php else: ?> <?php  $smc_name = 'smc_name_'.Session::get('lang_code'); ?> <?php endif; ?>
					<?php echo e($fetch_sub_main_cat->$smc_name); ?> </a> <b class="OpenCat" onclick="">+</b>
					
					
					
						<?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])> 0): ?>
						
						
						<ul>
							
							<?php $__currentLoopData = $second_main_category[$fetch_sub_main_cat->smc_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
							<?php	$pass_cat_id3 = "3,".$fetch_sub_cat->sb_id; ?>
							
							<li class="subsecond"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>">
								<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
								<?php $sb_name = 'sb_name'; ?>
								<?php else: ?> <?php  $sb_name = 'sb_name_'.Session::get('lang_code'); ?> <?php endif; ?>
							<?php echo e($fetch_sub_cat->$sb_name); ?> </a>
							
							<?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])> 0): ?>
							
							
							<ul>
							
								<?php $__currentLoopData = $second_sub_main_category[$fetch_sub_cat->sb_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_secsub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
							<?php $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?>
								                        
									<li class="subthird"><a href="<?php echo e(url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4)); ?>"> 
									<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
									<?php $ssb_name = 'ssb_name'; ?>
									<?php else: ?> <?php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); ?> <?php endif; ?>
									<?php echo e($fetch_secsub_cat->$ssb_name); ?></a></li>                                        
								
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
							</ul>
							
							<?php endif; ?>
							
							</li>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
							
						</ul>
						
						<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
				
			</ul>
			 
		<?php endif; ?> <?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php $i++; ?>
<?php endif; ?>
	
		

<?php else: ?>	
 <?php $get_listby_id   = explode(",", $category_id); ?> <!-- //category id -->
		<?php if($get_listby_id[0] == 1): ?>
         <?php   $mc_id =  DB::table('nm_maincategory')->where('mc_id', '=', $get_listby_id[1])->value('mc_id');
            
			$i=1; ?>
	<?php if(count($mc_id)>0): ?>
	
		<?php $pass_cat_id1 = "1,".$mc_id; ?> <!-- //topcategory -->
		<?php if($i<=20): ?>
		

			<?php if(count($sub_main_category[$mc_id])> 0): ?>
			
			
				<?php $__currentLoopData = $sub_main_category[$mc_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_sub_main_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
				<?php $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>	<!-- //maincategory -->
					
					<li class="topfirst"><a href="<?php echo e(url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2)); ?>"> 
					<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
					<?php	  $smc_name = 'smc_name'; ?>
					<?php else: ?> <?php  $smc_name = 'smc_name_'.Session::get('lang_code'); ?> <?php endif; ?>
					<?php echo e($fetch_sub_main_cat->$smc_name); ?></a> <b class="OpenCat" onclick="">+</b>
					
					
					
					<?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])> 0): ?>

						
						<ul>
							 
							<?php $__currentLoopData = $second_main_category[$fetch_sub_main_cat->smc_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
							<?php $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id; ?>
							
							<li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>"> 
					<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
					<?php  $sb_name = 'sb_name'; ?>
					<?php else: ?> <?php  $sb_name = 'sb_name_'.Session::get('lang_code'); ?> <?php endif; ?>
							<?php echo e($fetch_sub_cat->$sb_name); ?> </a><b class="OpenCat" onclick="">+</b>
							
							<?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])> 0): ?>
							
						
							<ul>
								
								<?php $__currentLoopData = $second_sub_main_category[$fetch_sub_cat->sb_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_secsub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
							<?php	$pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?>
								                       
									<li class="subsecond"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>"> 
					<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
					<?php  $ssb_name = 'ssb_name'; ?>
					<?php else: ?> <?php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); ?> <?php endif; ?>
									<?php echo e($fetch_secsub_cat->$ssb_name); ?></a></li>                                        
								
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
							
							</ul>
							
							<?php endif; ?>
						
							</li>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
						</ul>
						
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
			
			 
		<?php endif; ?>
	<?php endif; ?> <?php $i++; ?>

<?php endif; ?>
<li class="topfirst"><a href="<?php echo e(url('products')); ?>"><b> << Back </b></a> <b class="OpenCat" onclick="">+</b>

         <?php elseif($get_listby_id[0] == 2): ?>
        <?php   $mc_id =   DB::table('nm_secmaincategory')->select('smc_id','smc_mc_id')->where('smc_id', '=', $get_listby_id[1])->get(); ?>
	
<?php $i=1; ?> 
	<?php if(count($mc_id)>0): ?>
<?php	$smc_id = $mc_id[0]->smc_id;	
	  $mc_id = $mc_id[0]->smc_mc_id;	

		$pass_cat_id1 = "1,".$mc_id; ?> 
		<?php if($i<=20): ?>
		

			
			
				<?php $pass_cat_id2 = "2,".$smc_id; ?>	<!-- //maincategory -->
					
					
					
					
						<?php if(count($second_main_category[$smc_id])> 0): ?>
						
						
							
							<?php $__currentLoopData = $second_main_category[$smc_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
							<?php $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id; ?>
							
							<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>">
				<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
					<?php  $sb_name = 'sb_name'; ?>
					<?php else: ?> <?php  $sb_name = 'sb_name_'.Session::get('lang_code'); ?> <?php endif; ?>
							<?php echo e($fetch_sub_cat->$sb_name); ?> </a><b class="OpenCat" onclick="">+</b>
						
							<?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])> 0): ?>
							
							
							<ul>
								
								<?php $__currentLoopData = $second_sub_main_category[$fetch_sub_cat->sb_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_secsub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
							<?php $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?>
								                        
									<li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>"> 
					<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
					<?php  $ssb_name = 'ssb_name'; ?>
					<?php else: ?> <?php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); ?> <?php endif; ?>
									<?php echo e($fetch_secsub_cat->$ssb_name); ?></a></li>                                        
								
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
								
							</ul>
							
							<?php endif; ?>
							
							</li>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
							
						
						
						<?php endif; ?>
				
				
			
			 
		
	<?php endif; ?> <?php $i++; ?>

<?php endif; ?>
<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1); ?>"><b> << Back </b></a> <b class="OpenCat" onclick="">+</b>

<?php elseif($get_listby_id[0] == 3): ?>
   <?php   $sb_smc_id = DB::table('nm_subcategory')->select('sb_id','sb_smc_id','mc_id')->where('sb_id', '=', $get_listby_id[1])->get();

	$i=1; ?>
	<?php if(count($sb_smc_id)!=0): ?>
		
	<?php  $smc_id = $sb_smc_id[0]->sb_smc_id;  
	  $mc_id = $sb_smc_id[0]->mc_id;	
	  $sb_id = $sb_smc_id[0]->sb_id; ?>
		
		<?php if($i<=20): ?>
		
 				<?php	$pass_cat_id2 = "2,".$smc_id;	
						  	 $pass_cat_id3 = "3,".$sb_id; ?>
				
					<?php if(count($second_sub_main_category[$sb_id])> 0): ?>
						<?php $__currentLoopData = $second_sub_main_category[$sb_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_secsub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
							<?php	$pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?> ?>
								<li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>">
					<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
						<?php  $ssb_name = 'ssb_name';?>
					<?php else: ?> <?php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); ?> <?php endif; ?>
								<?php echo e($fetch_secsub_cat->$ssb_name); ?></a></li>                                        
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
					<?php endif; ?>
	<?php endif; ?> <?php $i++; ?>

<?php endif; ?>
<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"><b> << Back </b></a> <b class="OpenCat" onclick="">+</b>
        
<?php elseif($get_listby_id[0] == 4): ?> 
      <?php    $sb_id =  DB::table('nm_secsubcategory')->select('ssb_sb_id','mc_id','ssb_smc_id')->where('ssb_id', '=', $get_listby_id[1])->get();
			
			
	$i=1; ?>
	<?php if(count($sb_id)!=0): ?>
		<?php $ssb_sb_id = $sb_id[0]->ssb_sb_id;	
		 $ssb_smc_id = $sb_id[0]->ssb_smc_id;	
	  	 $mc_id = $sb_id[0]->mc_id; ?>
		  <?php if($i<=20): ?>
		 
						<?php  	 $pass_cat_id3 = "3,".$ssb_sb_id; ?>
				
					<?php if(count($second_sub_main_category[$ssb_sb_id])> 0): ?>
						<?php $__currentLoopData = $second_sub_main_category[$ssb_sb_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_secsub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
							<?php	$pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?>
								<li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>"> 
					<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
						<?php  $ssb_name = 'ssb_name'; ?>
					<?php else: ?> <?php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); ?> <?php endif; ?>
								<?php echo e($fetch_secsub_cat->ssb_name); ?></a></li>                                        
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
	<?php endif; ?>
				
		<?php endif; ?>
	<?php endif; ?> 
	<?php $i++; ?>

<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>"><b> << Back </b></a> <b class="OpenCat" onclick="">+</b>
		
 
 


<?php endif; ?> <?php endif; ?><!-- //else of main cat -->
<?php else: ?>
 <li class="subfirst"><a href=""><?php if (Lang::has(Session::get('lang_file').'.NO_CATEGORY_FOUND')!= '') { echo  trans(Session::get('lang_file').'.NO_CATEGORY_FOUND');}  else { echo trans($OUR_LANGUAGE.'.NO_CATEGORY_FOUND');} ?></a></li>  <?php endif; ?>
</ul>
		<br>
		  <div class="clearfix"></div>
		<br/>
        <?php
		$discount_filter=array();
		$filters_color=array();
		$size_filter=array(); ?>
		<?php if(isset($_GET["filter_color"])): ?>
		
		<?php	$filter_color=base64_decode($_GET["filter_color"]);
			$filters_color=explode(",",$filter_color); ?>
		<?php endif; ?>
		<?php if(isset($_GET["filter_discount"])): ?>
		
		<?php	$filter_discount=base64_decode($_GET["filter_discount"]);
			$discount_filter=explode(",",$filter_discount); ?>
		<?php endif; ?>
		<?php if(isset($_GET["filters_size"])): ?>
		
		<?php	$filters_size=base64_decode($_GET["filters_size"]);
			$size_filter=explode(",",$filters_size); ?>
		<?php endif; ?>
					
		<?php if(count($specification)>0 AND count($specification_values)>0): ?>
		
						 
				<?php if(isset($_GET["filter"])): ?>
				
				<?php	$filtered_item=base64_decode($_GET["filter"]);
					$filters=explode(",",$filtered_item); ?>
				
				<?php else: ?>
				<?php $filters=array(); ?>
				<?php endif; ?>
			
			<div class="side-menu-head" style="margin-top:10px;"><strong>Filter</strong></div>
			<form name="filter_form">
			
			
			<?php $__currentLoopData = $specification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specification_det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			
		
				<label style="margin:10px 0px;font-size:16px;font-weight:500px; color:#d82672;"><?php echo e($specification_det->spg_name); ?></label>
			
				<?php $__currentLoopData = $specification_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specification_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
					<?php if($specification_val->sp_spg_id==$specification_det->spg_id): ?>
					
			
						<div class="checkbox"><input type="checkbox" id="checkbox-sep<?php echo e($specification_val->sp_id); ?>" name="filter_by" value="<?php echo e($specification_val->sp_id); ?>" <?php if(in_array($specification_val->sp_id,$filters)){echo "checked";} ?> onclick="javascript:make_filter()"> <label for="checkbox-sep<?php echo $specification_val->sp_id; ?>"></label> <span style="margin-left:15px; vertical-align: top;"><?php echo e($specification_val->sp_name); ?></span></div>
			
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
			</form>
			<?php if(isset($_GET["filter"]) AND $_GET["filter"]!=""): ?>
			<p class="btn btn-danger" onclick="javascript:clear_filter('filter_for_values')">Clear All</p>
			
			<?php endif; ?> 
		<?php endif; ?>
		<?php if(Request::segment(1)=="catproducts"): ?>
		<br>
		  <div class="clearfix"></div>
		<br/>
			 
			<?php	$filtered_item="";
				$price_from="";
				$price_to="";
				$filter_discount="";
				$filter_size=""; ?>
				<?php if(isset($_GET["filter"])): ?>
				
				<?php	$filtered_item=$_GET["filter"];
					$price_from=$_GET["price_from"];
					$price_to=$_GET["price_to"];
					$filter_color=$_GET["filter_color"];
					$filter_size=$_GET["filters_size"];
					$filter_discount=$_GET["filter_discount"]; ?>
				<?php endif; ?>
				
			
			
			<?php if(count($color_filter_values)>0): ?>
			
			
			<div class="side-menu-head" style="margin-top:10px;"><strong>Color Filter</strong></div>
			<div style="box-shadow: 0 4px 17px 0 rgba(0,0,0,0.1); padding-bottom: 5px;" class="filter-height">
			
				<?php $__currentLoopData = $color_filter_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colrs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
			
					<div class="checkbox">
					<input type="checkbox" id="checkbox<?php echo e($colrs->co_id); ?>" onclick="javascript:make_filter()" name="color" value="<?php echo $colrs->co_id; ?>" <?php if(in_array($colrs->co_id,$filters_color)){echo "checked";} ?>> <label for="checkbox<?php echo e($colrs->co_id); ?>"></label><span class="color-box" style="background:<?php echo e($colrs->co_code); ?>; margin-left: 15px; margin-top: 3px;"></span> <span style="margin-left: 10px; vertical-align: top;"><?php echo e($colrs->co_name); ?></span>
					</div>
			
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
				
			</div>
			<?php if(isset($_GET["filter_color"]) AND $_GET["filter_color"]!=""): ?>
				<p class="btn btn-danger fil-clear" onclick="javascript:clear_filter('filter_items_by_color_values')">Clear All</p>
				
				<?php endif; ?>
			

			
			<?php endif; ?>
			
			<?php if(count($size_filter_values)>0): ?>
			
			
			<div class="side-menu-head" style="margin-top:10px;"><strong>Size Filter</strong></div>
			<div style="box-shadow: 0 4px 17px 0 rgba(0,0,0,0.1); padding-bottom: 5px;" class="filter-height"">
			
			<?php $__currentLoopData = $size_filter_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sizes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
			
					<div class="checkbox">
						<input type="checkbox" id="checkbox-size<?php echo e($sizes->si_id); ?>" onclick="javascript:make_filter()" name="size" value="<?php echo $sizes->si_id; ?>" <?php if(in_array($sizes->si_id,$size_filter)){echo "checked";} ?>> <label for="checkbox-size<?php echo e($sizes->si_id); ?>"></label><span style="margin-left:15px; vertical-align: top;"><?php echo e($sizes->si_name); ?></span>
					</div>
			
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
				
			</div>
			<?php if(isset($_GET["filters_size"]) AND $_GET["filters_size"]!=""): ?>
				<p class="btn btn-danger fil-clear" onclick="javascript:clear_filter('filter_items_by_size_values')">Clear All</p>
				
				<?php endif; ?>
		
			<?php endif; ?>
			<div class="side-menu-head" style="margin-top:10px; margin-bottom:10px;"><strong>Discount</strong></div>
			
			<?php	$label=""; ?>
				<?php for($i=1;$i<=6;$i++): ?>
				
					<?php if($i==1): ?>
					<?php	$label="Upto 10%"; ?> <?php endif; ?>
					<?php if($i==2): ?>
					<?php	$label="10% - 20%"; ?> <?php endif; ?>
					<?php if($i==3): ?>
					<?php	$label="20% - 30%"; ?> <?php endif; ?>
					<?php if($i==4): ?>
					<?php	$label="30% - 40%"; ?> <?php endif; ?>
					<?php if($i==5): ?>
					<?php	$label="40% - 50%"; ?> <?php endif; ?>
					<?php if($i==6): ?>
					<?php	$label="50% And Above"; ?> <?php endif; ?>
			
			<label style=" margin-left:25px;">
				<input type="radio" name="discount_filter" value="<?php echo e($i); ?>" <?php if(in_array($i,$discount_filter)){echo "checked";} ?> onclick="javascript:make_filter()"> 
				<?php echo e($label); ?>

			</label>
			
				<?php endfor; ?>
			
			<?php if(isset($_GET["filter_discount"]) AND $_GET["filter_discount"]!=""): ?>
				<p class="btn btn-danger" onclick="javascript:clear_filter('filter_for_values_discount')">Clear All</p>
			
				<?php endif; ?>
			
			
			<div class="side-menu-head" style="margin-top:10px; margin-bottom:10px;"><strong>Price Filter</strong></div>
			<div class="price-filter pdct_prclst">
			<?php //Price vary for different products.customize using min and max value
				/*$label="";
				for($i=1;$i<=6;$i++)
				{
					if($i==1)
						$label="0-1000";
					if($i==2)
						$label="1000-2000";
					if($i==3)
						$label="2000-3000";
					if($i==4)
						$label="3000-4000";
					if($i==5)
						$label="4000-5000";
					if($i==6)
						$label="5000-10000";
			?>
			<label class="radio inline">
				<input type="radio" name="radio_price_filter" <?php if($price_from."-".$price_to==$label) echo"checked"; ?> value="<?php echo $label; ?>" onclick="javascript:make_filter()"> 
				<span><?php echo " Rs. ".$label; ?></span>
			</label>
			<?php
				}*/
			?>
				<form name="filter_form_to_generate" id="filter_form" method="get">
					<?php echo e(Form::hidden('filter',$filtered_item,array('id'=>'filter_for_values'))); ?>

					<?php echo e(Form::hidden('filter_discount',$filter_discount,array('id'=>'filter_for_values_discount'))); ?>

					<!-- <input type="hidden" name="filter" value="<?php echo e($filtered_item); ?>" id="filter_for_values"> -->
					<!-- <input type="hidden" name="filter_discount" value="<?php echo $filter_discount; ?>" id="filter_for_values_discount"> -->
					<input type="hidden" name="filter_color" value="<?php if(isset($_GET["filter_color"])){echo $_GET["filter_color"];} ?>" id="filter_items_by_color_values">
					<input type="hidden" name="filters_size" value="<?php if(isset($_GET["filters_size"])){echo $_GET["filters_size"];} ?>" id="filter_items_by_size_values">
					
                    <div class="min_max_div">
                    <div  class="price-fil-max"><span style="color:#d82672;">Min</span><input type="number"  placeholder="100" name="price_from" id="price_from" value="<?php echo $price_from; ?>" /></div>
					<div class="price-fil-min"><span style="color:#d82672;">Max</span><input type="number" placeholder="10000" name="price_to" id="price_to" value="<?php echo e($price_to); ?>" /> </div>
					<div style="" class="price-go"><p onclick="javacript:make_filter();">Go!</p></div>
					
					<?php if($price_from !="" && $price_to !=""): ?> <!-- //Clear all for discount price -->
					
				
						<p class="btn btn-danger" onclick="javascript:clear_discount_filter('price_from','price_to')">Clear All</p> 
			<?php endif; ?>
				
					
					
					
					</div>
					
					<!--<input type="hidden" name="from" value="<?php // echo Request::segment(3); ?>">-->
				</form>
			</div>
		 
		<?php endif; ?>		
		
		<br>
		  <div class="clearfix"></div>
		<br/>
		
        <?php if(count($most_visited_product)>0): ?>  
        <div class="side-menu-head"><strong><?php if(Lang::has(Session::get('lang_file').'.MOST_VISITED_PRODUCTS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MOST_VISITED_PRODUCTS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MOST_VISITED_PRODUCTS')); ?> <?php endif; ?></strong></div>
          <?php $__currentLoopData = $most_visited_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fetch_most_visit_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
          	<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
					<?php  $title = 'pro_title'; ?>
			<?php else: ?> <?php  $title = 'pro_title_'.Session::get('lang_code'); ?> <?php endif; ?>

			<?php $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;
			 $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);
			 $mostproduct_img 	= explode('/**/', $fetch_most_visit_pro->pro_Img);

			 $product_image 	= $mostproduct_img[0];
			 
			$prod_path 	= url('').'/public/assets/default_image/No_image_product.png';
			$img_data 	= "public/assets/product/".$product_image; ?>
			
			<?php if(file_exists($img_data) && $product_image!='' ): ?>	
			 
			
		<?php	$prod_path = url('').'/public/assets/product/' .$product_image;	?>				
			<?php else: ?>	
				<?php if(isset($DynamicNoImage['productImg'])): ?> 
				
			<?php		$dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['productImg']; ?>
					<?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?> 
					<?php	$prod_path = url('').'/'.$dyanamicNoImg_path; ?> <?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>	
			
		<?php	$alt_text  	= substr($fetch_most_visit_pro->$title,0,25);
			$alt_text  .= strlen($fetch_most_visit_pro->$title)>25?'..':''; ?>


			  <?php if($fetch_most_visit_pro->pro_no_of_purchase < $fetch_most_visit_pro->pro_qty): ?> 
			 	
          <div class="thumbnail" style="border:none">
		  
		    <?php if($fetch_most_visit_pro->pro_discount_percentage!='' && round($fetch_most_visit_pro->pro_discount_percentage)!=0): ?>
				<i class="tag"><?php echo e(substr($fetch_most_visit_pro->pro_discount_percentage,0,2)); ?>%</i> <?php endif; ?>
			
			<img  src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>"/ style="">
				
				
				
			<div class="caption product_show">
			<p class="prev_text"><?php echo e(substr($fetch_most_visit_pro->$title,0,25)); ?>

				<?php echo e(strlen($fetch_most_visit_pro->$title)>25?'..':''); ?>

			</p>
				<p class="top_text dolor_text"><?php echo e(Helper::cur_sym()); ?> <?php echo e($fetch_most_visit_pro->pro_disprice); ?></p>
					  
                      <?php if($fetch_most_visit_pro->pro_no_of_purchase >= $fetch_most_visit_pro->pro_qty): ?> 
                      <h4 style="text-align:center;"><a  class="btn btn-danger"><?php if(Lang::has(Session::get('lang_file').'.SOLD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD')); ?> <?php endif; ?></a> 
                       <?php else: ?>   
						<?php  $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name)); 
             $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
			 $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
			  $res = base64_encode($fetch_most_visit_pro->pro_id); ?>
			  <!-- <a class="btn btn-warning" href="<?php echo url('productview').'/'.$fetch_most_visit_pro->pro_id; ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a> -->
					 </h4>
					
								
								<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
									<a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
									<?php endif; ?>
              <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
			  <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
			 <?php endif; ?>
              <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
			  <a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
			  <?php endif; ?>
			  <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
			  <a href="<?php echo e(url('productview/'.$mcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
			  <?php endif; ?>
								
<?php /*
<div class="product-info-price">
					 
					 <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
<a class="btn align_brn" href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
 <a class="btn align_brn" href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
 <a class="btn align_brn" href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == '') { ?>
 <a class="btn align_brn" href="<?php echo url('productview/'.$mcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
</div>*/?>
					

								

							
                     <?php endif; ?>
					</div>
		  </div>
			 <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  <?php endif; ?>
		
	</div>
<!-- Sidebar end=============================================== -->
	<div id="demo" class="box jplist jplist-grid-view span9 tab-land-wid customProductListing" style="margin-left:0px;background:white">
						
							<!-- ios button: show/hide panel -->
							<div class="jplist-ios-button">
								<i class="fa fa-sort"></i>
								<?php if(Lang::has(Session::get('lang_file').'.MORE_FILTERS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MORE_FILTERS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MORE_FILTERS')); ?> <?php endif; ?>
							</div>
							
							<!-- panel -->
	<div class="jplist-panel box panel-top" id="jplibox">						

	<!-- reset button -->
	<button type="button" class="jplist-reset-btn" data-control-type="reset" data-control-name="reset" data-control-action="reset">
	<?php if(Lang::has(Session::get('lang_file').'.RESET')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.RESET')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.RESET')); ?> <?php endif; ?> &nbsp;<i class="fa fa-share"></i>
	</button>

	<div class="jplist-drop-down" data-control-type="drop-down" data-control-name="paging" data-control-action="paging"><div class="jplist-dd-panel"> 10 <?php if(Lang::has(Session::get('lang_file').'.PER_PAGE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PER_PAGE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PER_PAGE')); ?> <?php endif; ?> </div>
	<ul style="display: none;">
	<li class=""><span data-number="6"> 6 <?php if(Lang::has(Session::get('lang_file').'.PER_PAGE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PER_PAGE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PER_PAGE')); ?> <?php endif; ?> </span></li>
	<li class="active"><span data-number="12" data-default="true"> 12 <?php if(Lang::has(Session::get('lang_file').'.PER_PAGE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PER_PAGE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PER_PAGE')); ?> <?php endif; ?> </span></li>
	<li><span data-number="18"> 18 <?php if(Lang::has(Session::get('lang_file').'.PER_PAGE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PER_PAGE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PER_PAGE')); ?> <?php endif; ?> </span></li>
	<li><span data-number="all"><?php if(Lang::has(Session::get('lang_file').'.VIEW_ALL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.VIEW_ALL')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.VIEW_ALL')); ?> <?php endif; ?> </span></li>
	</ul>
	</div>

	<div class="jplist-drop-down" data-control-type="drop-down" data-control-name="sort" data-control-action="sort"><div class="jplist-dd-panel"><?php if(Lang::has(Session::get('lang_file').'.LIKES_ASC')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.LIKES_ASC')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.LIKES_ASC')); ?> <?php endif; ?></div>
	<ul style="display: none;">
	<li class=""><span data-path="default"><?php if(Lang::has(Session::get('lang_file').'.SORT_BY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SORT_BY')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SORT_BY')); ?> <?php endif; ?></span></li>
	<li class="active"><span data-path=".like" data-order="asc" data-type="number" data-default="true"><?php if(Lang::has(Session::get('lang_file').'.PRICE_LOW')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRICE_LOW')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRICE_LOW')); ?> <?php endif; ?> - <?php if(Lang::has(Session::get('lang_file').'.HIGH')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.HIGH')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.HIGH')); ?> <?php endif; ?></span></li>
	<li><span data-path=".like" data-order="desc" data-type="number"><?php if(Lang::has(Session::get('lang_file').'.PRICE_HIGH')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRICE_HIGH')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRICE_HIGH')); ?> <?php endif; ?> -<?php if(Lang::has(Session::get('lang_file').'.LOW')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.LOW')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.LOW')); ?> <?php endif; ?></span></li>
	<li><span data-path=".title" data-order="asc" data-type="text"><?php if(Lang::has(Session::get('lang_file').'.TITLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TITLE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TITLE')); ?> <?php endif; ?>	<?php if(Lang::has(Session::get('lang_file').'.A')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.A')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.A')); ?> <?php endif; ?> -<?php if(Lang::has(Session::get('lang_file').'.Z')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.Z')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.Z')); ?> <?php endif; ?></span></li>
	<li><span data-path=".title" data-order="desc" data-type="text"><?php if(Lang::has(Session::get('lang_file').'.TITLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TITLE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TITLE')); ?> <?php endif; ?> <?php if(Lang::has(Session::get('lang_file').'.Z')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.Z')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.Z')); ?> <?php endif; ?>-<?php if(Lang::has(Session::get('lang_file').'.A')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.A')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.A')); ?> <?php endif; ?></span></li>
	</ul>
	</div>

	<!-- filter by title -->
	<?php /*<div class="text-filter-box">

	<!-- <i class="fa fa-search  jplist-icon"></i> -->
	<input data-path=".title" value="" placeholder="<?php if (Lang::has(Session::get('lang_file').'.FILTER_BY_TITLE')!= '') { echo  trans(Session::get('lang_file').'.FILTER_BY_TITLE');}  else { echo trans($OUR_LANGUAGE.'.FILTER_BY_TITLE');} ?>" data-control-type="textbox" data-control-name="title-filter" data-control-action="filter" type="text" class="filt">
	</div>
*/?>
	<!-- filter by description -->


	<!-- views -->
	<div 
	class="jplist-views" 
	data-control-type="views" 
	data-control-name="views" 
	data-control-action="views"
	data-default="jplist-grid-view" style="visibility:hidden;">
        <?php echo e(Form::button('',array('class'=>'jplist-view jplist-list-view','data-type'=>'jplist-list-view'))); ?>

	<!-- <button type="button" class="jplist-view jplist-list-view" data-type="jplist-list-view"></button> -->
<?php echo e(Form::button('',array('class'=>'jplist-view jplist-grid-view','data-type'=>'jplist-grid-view'))); ?>

	<!-- <button type="button" class="jplist-view jplist-grid-view" data-type="jplist-grid-view"></button> -->
	<?php echo e(Form::button('',array('class'=>'jplist-view jplist-thumbs-view','data-type'=>'jplist-thumbs-view'))); ?>

	<!-- <button type="button" class="jplist-view jplist-thumbs-view" data-type="jplist-thumbs-view"></button> -->
	</div>	

	<!-- pagination results -->
	<div 
	class="jplist-label" 
	data-type="Page {current} of {pages}" 
	data-control-type="pagination-info" 
	data-control-name="paging" 
	data-control-action="paging" style="visibility:hidden;">
	</div>

	<!-- pagination control -->


	<!-- pagination results -->

	</div>

					<div id="comp_myprod" class="ui-group-buttons">

							<span class="compare_product_fixedbtn btn">
			<a href="<?php echo url('compare_products'); ?>" target="_blank"><?php if(Lang::has(Session::get('lang_file').'.COMPARE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.COMPARE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.COMPARE')); ?> <?php endif; ?>
			
		<?php	echo ' <span>'.$count = count($_SESSION['compare_product']); ?> </a>
							</span>

							<?php if($count > 0): ?>

							<div class="or"></div>

							<span class="compare_product_fixedbtn btn"><a href="<?php echo url('clear_compare'); ?>"><?php if(Lang::has(Session::get('lang_file').'.CLEAR_LIST')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.CLEAR_LIST')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.CLEAR_LIST')); ?> <?php endif; ?></a></span>

								<?php endif; ?>

					</div>
		
	<div class="view productLoading">

		<div class="list"  id="pdpgli">	
			<section class="">	
								
				
				
				 <?php if(count($product_details) != 0): ?> 
					<?php $__currentLoopData = $product_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
				
			<?php	$mcat 		= strtolower(str_replace(' ','-',$product_det->mc_name));
				$smcat 		= strtolower(str_replace(' ','-',$product_det->smc_name));
				$sbcat 		= strtolower(str_replace(' ','-',$product_det->sb_name));
				$ssbcat 	= strtolower(str_replace(' ','-',$product_det->ssb_name)); 
				$res 		= base64_encode($product_det->pro_id);
				$product_image 			= explode('/**/',$product_det->pro_Img);
				$product_saving_price 	= $product_det->pro_price - $product_det->pro_disprice;
				$product_discount_percentage = round(($product_saving_price/ $product_det->pro_price)*100,2); ?>
				<?php if($product_det->pro_no_of_purchase < $product_det->pro_qty): ?>   
					

					<?php if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en'): ?>  
					<?php  $title = 'pro_title'; ?>
					<?php else: ?> <?php  $title = 'pro_title_'.Session::get('lang_code'); ?> <?php endif; ?>

				<?php	 $product_image 	= $product_image[0];
					 
					$prod_path 	= url('').'/public/assets/default_image/No_image_product.png';
					$img_data 	= "public/assets/product/".$product_image; ?>
					
					<?php if(file_exists($img_data) && $product_image !=''): ?>	
					
					
				<?php	$prod_path = url('').'/public/assets/product/'.$product_image;	?>				
					<?php else: ?>	
					
						<?php if(isset($DynamicNoImage['productImg'])): ?>  
						  
						<?php	$dyanamicNoImg_path = "public/assets/noimage/" .$DynamicNoImage['productImg']; ?>
							<?php if($DynamicNoImage['productImg']!='' && file_exists($dyanamicNoImg_path)): ?>
							<?php	$prod_path = url('').'/'.$dyanamicNoImg_path; ?> <?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>	
					
				<?php	$alt_text  	= substr($product_det->$title,0,25);
					$alt_text  .= strlen($product_det->$title)>25?'..':''; ?>
						

			<!-- item 1 -->
		
				<div class="list-item product productListing"  id="pdpg">		

				<!-- img -->
					<div class="product__info">
					 <?php if($product_det->pro_discount_percentage!='' && round($product_det->pro_discount_percentage)!=0): ?>
						<i class="tag"><?php echo e(substr($product_det->pro_discount_percentage,0,2)); ?>%</i><?php endif; ?>
						<div class="img productViewCenter">
							<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?> 
							<a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res; ?>"><img class="product__image" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>" alt="<?php echo e($alt_text); ?>" title=""/></a>
							<?php endif; ?>
							<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
							<a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res; ?>" ><img class="product__image" src="<?php echo e($prod_path_loader); ?>" alt="" data-src="<?php echo e($prod_path); ?>"></a>
							<?php endif; ?>
							<?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
							<a href="<?php echo url('productview').'/'.$mcat.'/'.$smcat.'/'.$res; ?>" ><img class="product__image" src="<?php echo e($prod_path_loader); ?>" alt="<?php echo e($alt_text); ?>" data-src="<?php echo e($prod_path); ?>"></a>

							<?php endif; ?>
							
							<?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
							<a href="<?php echo url('productview').'/'.$mcat.'/'.$res; ?>" ><img class="product__image" alt="<?php echo e($alt_text); ?>" src="<?php echo e($prod_path_loader); ?>" data-src="<?php echo e($prod_path); ?>"></a>

							<?php endif; ?>
						</div>

					</div>					<!-- data -->
				<div class="block">

					<p class="title product__title tab-title">
						<?php echo e(substr($product_det->$title,0,25)); ?>

						<?php echo e(strlen($product_det->$title)>25?'..':''); ?>

					</p>
					<p class="like product__price"><?php echo e(Helper::cur_sym()); ?> <?php echo e($product_det->pro_disprice); ?></p>
					<?php if($product_det->pro_no_of_purchase >= $product_det->pro_qty): ?> 
					<h4 style="text-align:center;"><a  class="btn btn-danger"><?php if(Lang::has(Session::get('lang_file').'.SOLD')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SOLD')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SOLD')); ?> <?php endif; ?></a> 
					<?php else: ?>  </h4>

				</div>
				<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != ''): ?>  
				<a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
				<?php endif; ?>
				<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == ''): ?> 
				<a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>
				<?php endif; ?>
				<?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == ''): ?> 
				<a href="<?php echo e(url('productview/'.$mcat.'/'.$smcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>

				<?php endif; ?>		
				<?php if($mcat != '' && $smcat == '' && $sbcat == '' && $ssbcat == ''): ?> 
				<a href="<?php echo e(url('productview/'.$mcat.'/'.$res)); ?>"><button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text"><?php if(Lang::has(Session::get('lang_file').'.ADD_TO_CART')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.ADD_TO_CART')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.ADD_TO_CART')); ?> <?php endif; ?></span></button></a>

				<?php endif; ?>
				

				<div id="reload">
				

				<?php if(($compare==0)&&($maincategory_id!='')): ?> 
				<?php if(in_array($product_det->pro_id, $_SESSION['compare_product'])): ?>  
				<button onclick="comparefunc(<?php echo $product_det->pro_id.','.'0'.','.$maincategory_id; ?>);" value="0" name="compare" id="compare" class="compare_prod" data-tooltip="Added in Compare">
				<i class="fa fa-check"></i>
				</button>
				 <?php else: ?> 
				<button onclick="comparefunc(<?php echo $product_det->pro_id.','.'1'.','.$maincategory_id; ?>);" value="1" name="compare" id="compare" class="compare_prod" data-tooltip="Add to Compare" >
				<i class="fa fa-plus"></i>
				</button>	
				<?php endif; ?>
				<?php endif; ?>	
				</div>			
				<?php endif; ?> 							



				
				<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
				<?php elseif(count($product_details) == 0): ?>
				 
				

				<div class="jplist-no-results text-shadow align-center">
				<p style="color: rgb(54, 160, 222); float: left; clear: both; margin-left: 30%; margin-top: 10%;
				margin-bottom: 10%; font-size: 18px;"><?php if(Lang::has(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.NO_PRODUCTS_AVAILABLE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.NO_PRODUCTS_AVAILABLE')); ?> <?php endif; ?></p>						</div>
				
				<?php endif; ?>
			
				</div>
			</section>
		<!--</div>
	</div>-->



	<!--//////////////////////////////////////////////////  -->
	<!-- Main view -->

	<!-- Product grid -->


	<!-- data -->   




	<!-- ios button: show/hide panel -->
	<div class="jplist-ios-button">
	<i class="fa fa-sort"></i>
	<?php if(Lang::has(Session::get('lang_file').'.MORE_FILTERS')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.MORE_FILTERS')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.MORE_FILTERS')); ?> <?php endif; ?>
	</div>
	<div class="clearfix"></div>

	</div>

	<!-- panel -->
	<div class="jplist-panel box panel-bottom" style="width:100%; margin: 0 0 8px 22px;">							<div class="jplist-drop-down" data-control-type="drop-down" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true"><div class="jplist-dd-panel"> 10 per page </div>
	<ul style="display: none;">
	<li class=""><span data-number="6"> 6 <?php if(Lang::has(Session::get('lang_file').'.PER_PAGE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PER_PAGE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PER_PAGE')); ?> <?php endif; ?> </span></li>
	<li class="active"><span data-number="12" data-default="true"> 12 <?php if(Lang::has(Session::get('lang_file').'.PER_PAGE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PER_PAGE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PER_PAGE')); ?> <?php endif; ?> </span></li>
	<li><span data-number="18"> 18 <?php if(Lang::has(Session::get('lang_file').'.PER_PAGE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PER_PAGE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PER_PAGE')); ?> <?php endif; ?> </span></li>
	<li><span data-number="all"> <?php if(Lang::has(Session::get('lang_file').'.VIEW_ALL')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.VIEW_ALL')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.VIEW_ALL')); ?> <?php endif; ?> </span></li>
	</ul>
	</div>
	<div class="jplist-drop-down" data-control-type="drop-down" data-control-name="sort" data-control-action="sort" data-control-animate-to-top="true"><div class="jplist-dd-panel"><?php if(Lang::has(Session::get('lang_file').'.LIKES_ASC')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.LIKES_ASC')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.LIKES_ASC')); ?> <?php endif; ?></div>
	<ul style="display: none;">
	<li class=""><span data-path="default"><?php if(Lang::has(Session::get('lang_file').'.SORT_BY')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.SORT_BY')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.SORT_BY')); ?> <?php endif; ?></span></li>
	<li class="active"><span data-path=".like" data-order="asc" data-type="number" data-default="true"><?php if(Lang::has(Session::get('lang_file').'.PRICE_LOW')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRICE_LOW')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRICE_LOW')); ?> <?php endif; ?> - <?php if(Lang::has(Session::get('lang_file').'.HIGH')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.HIGH')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.HIGH')); ?> <?php endif; ?></span></li>
	<li><span data-path=".like" data-order="desc" data-type="number"><?php if(Lang::has(Session::get('lang_file').'.PRICE_HIGH')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.PRICE_HIGH')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.PRICE_HIGH')); ?> <?php endif; ?> -<?php if(Lang::has(Session::get('lang_file').'.LOW')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.LOW')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.LOW')); ?> <?php endif; ?></span></li>
	<li><span data-path=".title" data-order="asc" data-type="text"><?php if(Lang::has(Session::get('lang_file').'.TITLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TITLE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TITLE')); ?> <?php endif; ?> <?php if(Lang::has(Session::get('lang_file').'.A')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.A')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.A')); ?> <?php endif; ?>-<?php if(Lang::has(Session::get('lang_file').'.Z')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.Z')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.Z')); ?> <?php endif; ?></span></li>
	<li><span data-path=".title" data-order="desc" data-type="text"><?php if(Lang::has(Session::get('lang_file').'.TITLE')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.TITLE')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.TITLE')); ?> <?php endif; ?> <?php if(Lang::has(Session::get('lang_file').'.Z')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.Z')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.Z')); ?> <?php endif; ?>-<?php if(Lang::has(Session::get('lang_file').'.A')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.A')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.A')); ?> <?php endif; ?></span></li>
	<li><span data-path=".desc" data-order="asc" data-type="text"><?php if(Lang::has(Session::get('lang_file').'.DESCRIPTION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DESCRIPTION')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DESCRIPTION')); ?> <?php endif; ?> <?php if(Lang::has(Session::get('lang_file').'.A')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.A')); ?>  <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.A')); ?> <?php endif; ?>- <?php if(Lang::has(Session::get('lang_file').'.Z')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.Z')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.Z')); ?> <?php endif; ?></span></li>
	<li><span data-path=".desc" data-order="desc" data-type="text"><?php if(Lang::has(Session::get('lang_file').'.DESCRIPTION')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.DESCRIPTION')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.DESCRIPTION')); ?> <?php endif; ?> <?php if(Lang::has(Session::get('lang_file').'.Z')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.Z')); ?> <?php else: ?> <?php echo e(trans($OUR_LANGUAGE.'.Z')); ?> <?php endif; ?>- <?php if(Lang::has(Session::get('lang_file').'.A')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.A')); ?>  else <?php echo e(trans($OUR_LANGUAGE.'.A')); ?> <?php endif; ?></span></li>								</ul>
	</div>

	<!-- pagination results -->
	<div class="jplist-label" data-type="{start} - {end} of {all}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging">1 - 10 <?php if(Lang::has(Session::get('lang_file').'.OF')!= ''): ?> <?php echo e(trans(Session::get('lang_file').'.OF')); ?>  else <?php echo e(trans($OUR_LANGUAGE.'.OF')); ?> <?php endif; ?> 32</div>

	<!-- pagination -->

	<div class="jplist-pagination" data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true"><div class="jplist-pagingprev jplist-hidden" data-type="pagingprev"><button type="button" class="jplist-first" data-number="0" data-type="first">«</button><button data-number="0" type="button" class="jplist-prev" data-type="prev">‹</button></div><div class="jplist-pagingmid" data-type="pagingmid"><div class="jplist-pagesbox" data-type="pagesbox"><button type="button" data-type="page" class="jplist-current" data-active="true" data-number="0">1</button> <button type="button" data-type="page" data-number="1">2</button> <button type="button" data-type="page" data-number="2">3</button> <button type="button" data-type="page" data-number="3">4</button> </div></div><div class="jplist-pagingnext" data-type="pagingnext"><button data-number="1" type="button" class="jplist-next" data-type="next">›</button><button data-number="3" type="button" class="jplist-last" data-type="last">»</button></div></div>					
	</div>
	</div>
	</div>
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php echo $footer; ?>

</body>


<script>
function comparefunc(pid,value,maincategory_id){

	var pid = pid;
		  $.ajax( {
			      type: 'get',
				  data: 'pid='+pid + '&value=' +value+'&subcategory_id='+maincategory_id,	//by mistake variable name is subcategory,but actully compare is based on main categroy
				  url: "<?php echo url('product_compare_ajax'); ?>",
				  success: function(responseText){  
				   if(responseText)
				   {  
					  alert(responseText);
					  location.reload();
					 				   
				   }
				}		
			});
 
}
</script>
<!-- Image loads after page loads -->
<script>
	 $(function(){
    $.each(document.images, function(){
$(this).attr("src", $(this).data("src"));
    	   });
  });
    
</script>


<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click", ".customCategories .topfirst b", function(){
			$(this).next("ul").css("position", "relative");
			
			$(".topfirst ul").not($(this).parents(".topfirst").find("ul")).css("display", "none");
			 $(this).next("ul").toggle();
		});

		$(document).on("click", ".morePage", function(){
			$(".nextPage").slideToggle(200);
		});
		
		$(document).on("click", "#smallScreen", function(){
			$(this).toggleClass("customMenu");
		});
		$('#comp_myprod').show();
		/*$(window).scroll(function () {
			if ($(this).scrollTop() > 10) {
				
			}
			else{
				$('#comp_myprod').hide();
			} 
		});*/
		var price_from = $('#price_from');
		var price_to = $('#price_to');
		
		 $('#price_from').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
            alert("Numbers only allowed");
			return false;
        }
      });

	  $('#price_to').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57)){
            alert("Numbers only allowed");
			return false;
        }
      });
	  
	});
function make_filter()
{
	var filter_by_items=[];
	var filter_items_by_color=[];
	var filter_items_by_discount=[];
	var filter_items_by_size=[];
	var price_from=$("#price_from").val();
	var price_to=$("#price_to").val();
	var price_from=parseInt(price_from);
	var price_to=parseInt(price_to);
	$("input:checkbox[name=filter_by]:checked").each(function(){
		filter_by_items.push($(this).val());
	});
	var price_radio=$("input[name='radio_price_filter']:checked").val();
	
	if(price_radio)
	{
		var min_max_price=price_radio.split('-');
		$("#price_from").val(min_max_price[0]);
		$("#price_to").val(min_max_price[1]);
	}
	$("input:radio[name=discount_filter]:checked").each(function(){
		filter_items_by_discount.push($(this).val());
	});
	
	$("input:checkbox[name=color]:checked").each(function(){
		filter_items_by_color.push($(this).val());
	});
	$("input:checkbox[name=size]:checked").each(function(){
		filter_items_by_size.push($(this).val());
	});
	var enc_filter_by_items = window.btoa(filter_by_items);
	var enc_filter_by_discount = window.btoa(filter_items_by_discount);
	var enc_filter_items_by_color = window.btoa(filter_items_by_color);
	var enc_filter_items_by_size = window.btoa(filter_items_by_size);
	$("#filter_for_values").val(enc_filter_by_items);
	$("#filter_for_values_discount").val(enc_filter_by_discount);
	$("#filter_items_by_color_values").val(enc_filter_items_by_color);
	$("#filter_items_by_size_values").val(enc_filter_items_by_size);
	if(price_from > price_to)
	{
		alert("Maximum price should less then Minimum Price!");
		$("#price_to").focus();
		return false;
	}
	
   document.filter_form_to_generate.submit();             // Submit the page
    
}
function clear_filter(id_to_clear)
{
	$("#"+id_to_clear).val("");
	document.filter_form_to_generate.submit();
}
/*clear filter for discount price */
function clear_discount_filter(from_price,to_price)
{
	$("#"+from_price).val("");
	$("#"+to_price).val("");
	document.filter_form_to_generate.submit();
}
	</script>