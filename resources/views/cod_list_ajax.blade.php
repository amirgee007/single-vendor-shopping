
<?php
		foreach($customerdetails as $customer_info)
		{ 
		}
	?>
<div id="two" <?php if(isset($tab_active) && ($tab_active==2)) { ?> class="tab-pane active" <?php }else{ ?>class="tab-pane" <?php } ?>>
						
						<span  id="close"> <input type="text" class="scroll" value="2" id='page_number' /> </span>


							<div class="row-fluid">
								<ul class="text_tab">
									<div class="row">
										<div class="col-lg-11 panel_marg">
											<div class="btn btn-large btn-primary pull-right me_btn cart-res" style="margin-bottom: 5px;"><?php if (Lang::has(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.TOTAL_WALLET_BALANCE_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.TOTAL_WALLET_BALANCE_AMOUNT');} ?> : {{ Helper::cur_sym() }}<?php echo (($customer_info->wallet!="")?number_format($customer_info->wallet,2):'0.00'); ?></div>
											<table class="table table-bordered table-sieve"  style="margin-left:3%;width:97%; font-size:13px; overflow-x: scroll;">
												<thead style="background:#4a994c; color:#fff;">
													<tr>
														<th class="text-center"><?php if (Lang::has(Session::get('lang_file').'.S.NO')!= '') { echo  trans(Session::get('lang_file').'.S.NO');}  else { echo trans($OUR_LANGUAGE.'.S.NO');} ?></th>
														<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.ORDERID')!= '') { echo  trans(Session::get('lang_file').'.ORDERID');}  else { echo trans($OUR_LANGUAGE.'.ORDERID');} ?></th>
														<!--<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.TOT._PRODUCT')!= '') { echo  trans(Session::get('lang_file').'.TOT._PRODUCT');}  else { echo trans($OUR_LANGUAGE.'.TOT._PRODUCT');} ?></th>
															<th style="text-align:center;">Product Names</th>
															<th style="text-align:center;">Shipping Address </th>-->
														<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT')!= '') { echo  trans(Session::get('lang_file').'.TOTAL_ORDER_AMOUNT');}  else { echo trans($OUR_LANGUAGE.'.TOTAL_ORDER_AMOUNT');} ?></th>
														<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.ORDER_DATE')!= '') { echo  trans(Session::get('lang_file').'.ORDER_DATE');}  else { echo trans($OUR_LANGUAGE.'.ORDER_DATE');} ?></th>
														<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.USED_WALLET')!= '') { echo  trans(Session::get('lang_file').'.USED_WALLET');}  else { echo trans($OUR_LANGUAGE.'.USED_WALLET');} ?></th>
														<!--<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.STATUS')!= '') { echo  trans(Session::get('lang_file').'.STATUS');}  else { echo trans($OUR_LANGUAGE.'.STATUS');} ?></th>-->
														<th style="text-align:center;"><?php if (Lang::has(Session::get('lang_file').'.INVOICE')!= '') { echo  trans(Session::get('lang_file').'.INVOICE');}  else { echo trans($OUR_LANGUAGE.'.INVOICE');} ?></th>
													</tr>
												</thead>
												<tbody>

												<?php if(count($getproductordercod_orderwise)<1) {?>
														<tr> <td colspan="6" class="text-center"><?php if (Lang::has(Session::get('lang_file').'.NO_ORDER_COD')!= '') { echo  trans(Session::get('lang_file').'.NO_ORDER_COD');}  else { echo trans($OUR_LANGUAGE.'.NO_ORDER_COD');} ?></td></tr> 

														<?php } ?>


													<?php $i=1;
														/*  print_r("<pre>");	
														print_r($getproductordercod_orderwise);	
														print_r("</pre>");	 */  
														$total_item_amt = 0;
														$all_item_tax = 0;
														$total_grand_total = 0;
														$all_ship_amt  =0;
														$total_tax_amt =0;
														$total_ship_amt =0;
														$coupon_amount =0;
														$item_tax = 0;
													
																						
														foreach($getproductordercod_orderwise as $codorderdet) {
														

														if($codorderdet->cod_status==1)
														{
														$codorderstatus="success";
														}
														else if($codorderdet->cod_status==2) 
														{
														$codorderstatus="completed";
														}
														else if($codorderdet->cod_status==3) 
														{
														$codorderstatus="Hold";
														}
														else if($codorderdet->cod_status==4) 
														{
														$codorderstatus="failed";
														}
															 $item_amt = $codorderdet->cod_amt + (($codorderdet->cod_amt * $codorderdet->cod_tax)/100);
															
														
															 $ship_amt = $codorderdet->cod_shipping_amt;
															
														
															 //$item_tax = $codorderdet->cod_tax;
															if($codorderdet->coupon_amount != 0)
															{
																$grand_total =  ($item_amt + $ship_amt + $item_tax - $codorderdet->coupon_amount);
															}
															else
															{
																$grand_total =  ($item_amt + $ship_amt + $item_tax);
															}

														$subtotal1=0;
															$customer_id = session::get('customerid');
															$product_titles=DB::table('nm_ordercod')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->leftjoin('nm_color', 'nm_ordercod.cod_pro_color', '=', 'nm_color.co_id')->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')->where('cod_transaction_id', '=', $codorderdet->cod_transaction_id)
															->orderBy('nm_ordercod.cod_id', 'desc')
															->where('nm_ordercod.cod_order_type', '=', 1)
															->where('nm_ordercod.cod_cus_id', '=', $customer_id)
															
															->get();
											
															$total_item_amt = $total_tax_amt = $total_ship_amt = $coupon_amount = 0;
																foreach($product_titles as $prd_tit) {
															
																$subtotal=$prd_tit->cod_amt; 
																$tax_amt = (($prd_tit->cod_amt * $prd_tit->cod_tax)/100);
															
																$total_tax_amt+= (($prd_tit->cod_amt * $prd_tit->cod_tax)/100); 
																$total_ship_amt+= $prd_tit->cod_shipping_amt;
																$total_item_amt+=$prd_tit->cod_amt;
																$coupon_amount+= $prd_tit->coupon_amount;
																$prodct_id = $prd_tit->cod_pro_id;
																$grand_total = ($total_item_amt + $total_tax_amt) + $total_ship_amt;
															$walletusedamt_final=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $codorderdet->cod_transaction_id)->get();
															
															if(count($walletusedamt_final)>0) {
															$walletamttot=$walletusedamt_final[0]->wallet_used;
															$totalpaid_amt=($grand_total-$walletusedamt_final[0]->wallet_used);
															echo number_format($totalpaid_amt,2);
															} else 
															{
															 $totalpaid_amt =($total_item_amt + $total_ship_amt+ $total_tax_amt - $coupon_amount);
															$walletamttot=0;
															}
																}
															 
															
														?>
													<tr>
														<td class="text-center"><?php echo $i;?></td>
														<td class="text-center"><?php echo $codorderdet->cod_transaction_id;?></td>
														<?php /* <td class="text-center"><?php 
															$product_tot_count=DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('cod_transaction_id', '=', $codorderdet->cod_transaction_id)->first(array(
															  DB::raw( 'count(*) AS tot_count_prd' )
															));
															echo $product_tot_count->tot_count_prd;
															?></td>*/?>
														<!--td class="text-center"><?php 
															$product_titles=DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('cod_transaction_id', '=', $codorderdet->cod_transaction_id)->get();
															
															echo "<ul style='list-style:disc;'>";
															foreach($product_titles as $prd_tit) {
					if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
						$pro_title = 'pro_title';
					}else {  $pro_title = 'pro_title_'.Session::get('lang_code'); }
															echo "<li style='width:100%;'>".$prd_tit->$pro_title."</li>";
															}
															echo "</ul>"; 
															?></td-->
														<!--td class="text-center"><?php echo  $codorderdet->cod_ship_addr;?></td-->
														<td class="text-center">{{Helper::cur_sym()}}<?php 
															echo $totalpaid_amt;
															/*$product_total_amt=DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('cod_transaction_id', '=', $codorderdet->cod_transaction_id)->first(array(
															   DB::raw( 'SUM(cod_amt) AS cod_amt_total')
															)); 
															echo $cod_amt_total = $product_total_amt->cod_amt_total;*/
															
															//echo number_format($product_total_amt->cod_amt_total,2);
															//echo  $codorderdet->cod_ship_addr;
															//echo $grand_total;
															?></td>
														<td class="text-center"><?php echo  $codorderdet->cod_date;?></td>
														<td class="text-center">{{Helper::cur_sym()}}<?php 
															$walletusedamt_final=DB::table('nm_ordercod_wallet')->where('nm_ordercod_wallet.cod_transaction_id','=', $codorderdet->cod_transaction_id)->get();
															// print_r($walletusedamt_final);
															echo ((count($walletusedamt_final)>0)?"  ".number_format($walletusedamt_final[0]->wallet_used,2):'0');?></td>
														<!--<td class="text-center"><?php //echo  $codorderstatus;?></td>-->
														<td class="text-center">
															<a data-target="<?php echo '#uiModal'.$i;?>" data-toggle="modal"><?php if (Lang::has(Session::get('lang_file').'.VIEW_DETAILS')!= '') { echo  trans(Session::get('lang_file').'.VIEW_DETAILS');}  else { echo trans($OUR_LANGUAGE.'.VIEW_DETAILS');} ?></a>
														</td>
													</tr>
													<?php $i=$i+1;   }?>		
												 </tbody>
											</table>
										</div>