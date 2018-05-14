{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<link rel="stylesheet" href="public/assets/css/new_css.css" />
<div class="container" id="conpg">
	<div class="well wllbg"><h2 class="ctgry_h"><?php if (Lang::has(Session::get('lang_file').'.ALL_CATEGORIES')!= '') { echo  trans(Session::get('lang_file').'.ALL_CATEGORIES');}  else { echo trans($OUR_LANGUAGE.'.ALL_CATEGORIES');} ?></h2>
		<div class="row" id="catepgrow" style="vertical-align: top;">
			<div class="col-sm-3 colwell">  
				<ul class="prdlist">
					<?php 
					$main = 1;
					foreach($main_category as $fetch_main_cat)
					{
						$pass_cat_id1 = "1,".$fetch_main_cat->mc_id; 
						if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0)
						{
					?>
							<h4>
								<a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1); ?>">
									<?php 
					if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
						$mc_name = 'mc_name';
					}else {  $mc_name = 'mc_name_'.Session::get('lang_code'); }
									echo $fetch_main_cat->$mc_name; ?>
								</a>
							</h4>
							<ul class="prdlist">
								<?php 
								foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)
								{
									$pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id;
									?>
									<li class="wlbg_li1" ><a class="wlbg_a1" href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"><?php 
					if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
						$smc_name = 'smc_name';
					}else {  $smc_name = 'smc_name_'.Session::get('lang_code'); }
									echo $fetch_sub_main_cat->$smc_name ; ?> </a></li>
									
									<?php
										if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0)
										{
										?>
										<ul>
											<?php 
											//print_r($second_main_category[$fetch_sub_main_cat->smc_id]);
											foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sec_sub_main_cat)
											{
												$pass_cat_id3 = "3,".$fetch_sec_sub_main_cat->sb_id;
												//echo $fetch_sec_sub_main_cat->sb_name;
											?>
											<li class="wlbg_li2"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>"><?php 
					if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
						$sb_name = 'sb_name';
					}else {  $sb_name = 'sb_name_'.Session::get('lang_code'); }
											echo $fetch_sec_sub_main_cat->$sb_name ; ?> </a></li>
											<?php
											}
											?>
										</ul>
										<?php
										}
								}
								?>
							</ul>
							<?php 
						}
						if($main=='4'){
						echo '</ul></div><div class="col-sm-3 colwell"><ul class="prdlist">';
						$main ='';
						}
						$main++; 
					}
					?>
				</ul>
			</div> 
		</div>
	</div>
</div>

<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
{!! $footer !!}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$.ajaxSetup({
		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});
</script>  
</body>
</html>