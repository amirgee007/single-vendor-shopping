
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
    <div id="mainBody">
        <div class="container">
            <div class="row">
                <!-- Sidebar ================================================== -->
                <div class="span3" id="sidebar">  <!--well well-small btn-warning -->
                    <div class="side-menu-head"><strong>@if (Lang::has(Session::get('lang_file').'.CATEGORIES')!= '') {{ trans(Session::get('lang_file').'.CATEGORIES') }} @else {{ trans($OUR_LANGUAGE.'.CATEGORIES') }} @endif </strong></div>
                    <ul id="css3menu1" class="topmenu">
                        {{ Form::checkbox('','',null,array('id'=>'css3menu-switcher','class'=>'switchbox'))}}
                       <!--  <input type="checkbox" id="css3menu-switcher" class="switchbox"> --><label onClick="" class="switch" for="css3menu-switcher"></label>
                        @foreach($main_category as $fetch_main_cat) 
                      @php   $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; @endphp
                        <li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1); ?>"> 
					@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
					@php $mc_name = 'mc_name'; @endphp
					@else @php  $mc_name = 'mc_name_'.Session::get('lang_code'); @endphp @endif
						{{ $fetch_main_cat->$mc_name }} </a>
                            @if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0)  
                            <ul>
                                @foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)  
                               @php  $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; @endphp
                               @if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0)  
                                <li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"> 
					@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
					@php $smc_name = 'smc_name'; @endphp
					@else @php  $smc_name = 'smc_name_'.Session::get('lang_code'); @endphp @endif
							{{ $fetch_sub_main_cat->$smc_name }}</a>
                                    <ul>
                                       @foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat)  
                                    @php  $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id; @endphp
                                        @if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0) 
                                        <li class="subsecond"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>"> 
					@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
					@php	$sb_name = 'sb_name'; @endphp
					@else @php  $sb_name = 'sb_name_'.Session::get('lang_code'); @endphp @endif
										{{  $fetch_sub_cat->$sb_name }}</a>
                                            <ul>
                                              @foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat)  
                                        @php      $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; @endphp 
                                                <li class="subthird"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>">
					@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
					@php $ssb_name = 'ssb_name'; @endphp
					@else @php  $ssb_name = 'ssb_name_'.Session::get('lang_code'); @endphp @endif
									{{ $fetch_secsub_cat->$ssb_name }}</a></li>
                                                @endforeach </ul>
                                            @endif </li>
                                        @endforeach </ul>
                                    @endif </li>
                                @endforeach </ul>
                            @endif </li>
                        @endforeach
                    </ul><br/>
                    <div class="clearfix"></div> <br/>
                    
                   </div>
                <!-- Sidebar end=============================================== -->
                <div class="span9">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('') }}">@if (Lang::has(Session::get('lang_file').'.HOME')!= '') {{  trans(Session::get('lang_file').'.HOME') }} @else {{ trans($OUR_LANGUAGE.'.HOME') }} @endif</a> <span class="divider">/</span></li>
                        <li class="active">@if (Lang::has(Session::get('lang_file').'.PAYMENT_RESULT')!= '') {{  trans(Session::get('lang_file').'.PAYMENT_RESULT') }} @else {{ trans($OUR_LANGUAGE.'.PAYMENT_RESULT') }} @endif </li>
                    </ul>
                    <div class="span4" style="margin:0px"> 
					@if (Session::has('result'))
                        <h4> @if (Lang::has(Session::get('lang_file').'.YOUR_ORDER_SUCCESSFULLY_PLACED')!= '') {{ trans(Session::get('lang_file').'.YOUR_ORDER_SUCCESSFULLY_PLACED') }} @else {{ trans($OUR_LANGUAGE.'.YOUR_ORDER_SUCCESSFULLY_PLACED') }} @endif.</h4>	    
					@endif       
					@if (Session::has('fail'))    
						<h4>  @if (Lang::has(Session::get('lang_file').'.YOUR_PAYMENT_PROCESS_FAILED')!= '') {{  trans(Session::get('lang_file').'.YOUR_PAYMENT_PROCESS_FAILED') }} @else {{ trans($OUR_LANGUAGE.'.YOUR_PAYMENT_PROCESS_FAILED') }} @endif..</h4>	    
					@endif	 
					@if (Session::has('error'))    
						<h4> @if (Lang::has(Session::get('lang_file').'.YOUR_PAYMENT_PROCESS_HAS_BEEN_STOPPED_DUE_TO_SOME_ERROR')!= '') {{  trans(Session::get('lang_file').'.YOUR_PAYMENT_PROCESS_HAS_BEEN_STOPPED_DUE_TO_SOME_ERROR') }} @else {{ trans($OUR_LANGUAGE.'.YOUR_PAYMENT_PROCESS_HAS_BEEN_STOPPED_DUE_TO_SOME_ERROR') }} @endif...</h4>	  
					@endif        </div>       
					<div class="clearfix"></div>	<hr class="soft"/>			 
					<h4>@if (Lang::has(Session::get('lang_file').'.THANK_YOU_FOR_SHOPPING_WITH')!= '') {{  trans(Session::get('lang_file').'.THANK_YOU_FOR_SHOPPING_WITH') }}  @else {{ trans($OUR_LANGUAGE.'.THANK_YOU_FOR_SHOPPING_WITH') }} @endif {{ $SITENAME }} . </h4>				
					<h5>@if (Lang::has(Session::get('lang_file').'.TRANSACTION_DETAILS')!= '') {{  trans(Session::get('lang_file').'.TRANSACTION_DETAILS') }}  @else {{ trans($OUR_LANGUAGE.'.TRANSACTION_DETAILS') }} @endif</h5>	
					<table class="table table-bordered">              
					<thead>                <tr>                	
					<th>@if (Lang::has(Session::get('lang_file').'.CUSTOMER_NAME')!= '') {{ trans(Session::get('lang_file').'.CUSTOMER_NAME') }} @else {{ trans($OUR_LANGUAGE.'.CUSTOMER_NAME') }} @endif</th>                   
					<th>@if (Lang::has(Session::get('lang_file').'.TRANSACTION_ID')!= '') {{  trans(Session::get('lang_file').'.TRANSACTION_ID') }} @else {{ trans($OUR_LANGUAGE.'.TRANSACTION_ID') }} @endif</th>					
					<th>@if (Lang::has(Session::get('lang_file').'.STATUS')!= '') {{  trans(Session::get('lang_file').'.STATUS') }} @else {{ trans($OUR_LANGUAGE.'.STATUS') }} @endif</th>				
					</tr>              
                    </thead>              
                    <tbody>           			 
                    @php  $coupon = 0;
                           $shipping_amt = 0; @endphp
                    @if($orderdetails) 				
                        @foreach($orderdetails as $orderdet)  
						
                        @php    $coupon+= $orderdet->coupon_amount;
                            $shipping_amt+= $orderdet->cod_shipping_amt; @endphp    <!-- //shipping amount getting from order table -->
                        @endforeach @php $coupon_amt = $orderdet->coupon_amount; @endphp
                     <tr>                
                        <td><?php echo Session::get('username');?></td> 
                        <td><?php echo $orderdet->cod_transaction_id;?> </td>
                        <td><?php echo "HOLD";?></td>                                                     
                    </tr>		  
                    @endif			
                    </tbody>            
                </table>		                          
                    <h5> @if (Lang::has(Session::get('lang_file').'.PRODUCT_DETAILS_FOR_CURRENT_TRANSACTION')!= '') {{  trans(Session::get('lang_file').'.PRODUCT_DETAILS_FOR_CURRENT_TRANSACTION') }} @else {{ trans($OUR_LANGUAGE.'.PRODUCT_DETAILS_FOR_CURRENT_TRANSACTION') }} @endif </h5>	                                
                    <table class="table table-bordered">              
                    <thead>                
                    <tr>                
                        <th>@if (Lang::has(Session::get('lang_file').'.PRODUCT_DEAL_NAME')!= '') {{  trans(Session::get('lang_file').'.PRODUCT_DEAL_NAME') }} @else {{ trans($OUR_LANGUAGE.'.PRODUCT_DEAL_NAME') }} @endif</th>                  <th>@if (Lang::has(Session::get('lang_file').'.PRODUCT_DEAL_QUANTITY')!= '') {{  trans(Session::get('lang_file').'.PRODUCT_DEAL_QUANTITY') }} @else {{ trans($OUR_LANGUAGE.'.PRODUCT_DEAL_QUANTITY') }} @endif</th>                  <th>@if (Lang::has(Session::get('lang_file').'.AMOUNT')!= '') {{  trans(Session::get('lang_file').'.AMOUNT') }} @else {{ trans($OUR_LANGUAGE.'.AMOUNT') }} @endif
                        </th>                				
                    </tr>              
                    </thead>              
                    <tbody>										
                    @php  $taxamount =0;   $wallet=0; $trans_id =0; $taxamount_total = 0; @endphp
                    @if($orderdetails) 
							
                        @foreach($orderdetails as $orderdet) 
							
						@php	$trans_id = $orderdet->cod_transaction_id;
							

                            $taxamount = (($orderdet->cod_amt*$orderdet->cod_tax)/100);

							$taxamount_total += $taxamount; @endphp
															  
							<tr>               	  
								<td> 
								@if($orderdet->cod_order_type == 1) 
									@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
									@php	$pro_title = 'pro_title'; @endphp
									@else @php  $pro_title = 'pro_title_'.Session::get('lang_code'); @endphp @endif
									{{ $orderdet->$pro_title }}
								@else  
									@if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en')  
									@php	$deal_title = 'deal_title'; @endphp
									@else @php  $deal_title = 'deal_title_'.Session::get('lang_code'); @endphp @endif
									{{ $orderdet->$deal_title }}
								@endif</td>                  
								<td>{{ $orderdet->cod_qty }}</td>                  
								<td>{{ Helper::cur_sym() }} <?php echo round(($orderdet->cod_amt + $taxamount),2);?> (@if (Lang::has(Session::get('lang_file').'.INCLUDING')!= '') {{  trans(Session::get('lang_file').'.INCLUDING') }} @else {{ trans($OUR_LANGUAGE.'.INCLUDING') }} @endif {{ $orderdet->cod_tax }} % {{ round(($orderdet->cod_amt + $taxamount),2) }} (@if (Lang::has(Session::get('lang_file').'.TAXES')!= '') {{  trans(Session::get('lang_file').'.TAXES') }} @else {{ trans($OUR_LANGUAGE.'.TAXES') }} @endif)</td>      			 
							</tr>  
                 @endforeach	
				 
                    @endif
					
                    @if(($coupon)!=0) 
                        <tr>
                        <td>&nbsp;</td> 
                        <td>Coupon value </td>
                        <td>{{ Helper::cur_sym() }} {{ round($coupon,2) }}</td>
                        </tr>
                    @endif

					
					<tr>                     
                        <td>&nbsp;</td>                  
                        <td style="font-weight:bold;">@if (Lang::has(Session::get('lang_file').'.SUB-TOTAL')!= '') {{  trans(Session::get('lang_file').'.SUB-TOTAL') }} @else {{ trans($OUR_LANGUAGE.'.SUB-TOTAL') }} @endif</td>                  
                        <td style="font-weight:bold;">{{ Helper::cur_sym() }} <?php $subtotal = ($get_subtotal+$taxamount_total)-$coupon; echo round($subtotal,2);?> </td>                   
                    </tr>
					
                    
                
                    <?php /*
                    <tr>               	  
                        <td>&nbsp;</td> 
                        <td style="font-weight:bold;"><?php if (Lang::has(Session::get('lang_file').'.TAX')!= '') { echo  trans(Session::get('lang_file').'.TAX');}  else { echo trans($OUR_LANGUAGE.'.TAX');} ?></td>                  
                        <td style="font-weight:bold;"> <?php  echo $get_tax;?> %</td>      			
                    </tr>*/?>
                    
                    <tr>               	  
                        <td>&nbsp;</td>                  
                        <td style="font-weight:bold;">@if (Lang::has(Session::get('lang_file').'.SHIPPING_TOTAL')!= '') {{ trans(Session::get('lang_file').'.SHIPPING_TOTAL') }} @else {{ trans($OUR_LANGUAGE.'.SHIPPING_TOTAL') }} @endif</td>                  
                        <td style="font-weight:bold;">{{ Helper::cur_sym() }} {{ $shipping_amt }}</td>      			 
                    </tr>

                    
                  @php  $trans_wallet = DB::table('nm_ordercod_wallet')->where('cod_transaction_id','=',$trans_id)->value('wallet_used');
                    $wallet = $trans_wallet; @endphp
                   @if(count($wallet)!=0)
                        
                    <tr>
                        <td>&nbsp;</td> 
                        <td>Wallet Used </td>
                        <td> - {{ Helper::cur_sym() }} round($wallet,2); ?></td>
                    </tr>
                    @else @php $wallet = 0; @endphp @endif
                    
                    
                        
                        
                    

                    <tr>               	  
                        <td>&nbsp;</td>                  
                        <td style="font-weight:bold;">@if (Lang::has(Session::get('lang_file').'.TOTAL')!= '') {{  trans(Session::get('lang_file').'.TOTAL') }} @else {{ trans($OUR_LANGUAGE.'.TOTAL') }} @endif</td>                  
                        <td style="font-weight:bold;">{{ Helper::cur_sym() }} <?php $total = ($subtotal + $shipping_amt) - $wallet;  echo round($total,2);//number_format((float)$total, 2, '.', '');  ?></td>      			
                    </tr>

                  </tbody>            
                  </table>         	
                  <h4>	<a href="{{ url('index') }}" class="btn btn-large pull-right me_btn res-cont1"><span style="font-weight:normal;" >@if (Lang::has(Session::get('lang_file').'.CONTINUE_SHOPPING')!= '') {{  trans(Session::get('lang_file').'.CONTINUE_SHOPPING') }} @else {{ trans($OUR_LANGUAGE.'.CONTINUE_SHOPPING') }} @endif</span> <i class="icon-arrow-right"></i>  </a>
                  </h4>
                  </div>
                </div>
            </div>
        </div>
        <!-- MainBody End ============================= -->
        <!-- Footer ================================================================== -->{!! $footer !!}

        <script src="{{ url('') }}/plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>
        <script src="{{ url('') }}/plug-k/demo/js/demo.js" type="text/javascript"></script>

        <script type="text/javascript" src="{{ url('') }}/themes/js/jquery-1.5.2.min.js"></script>
        <script type="text/javascript" src="{{ url('') }}/themes/js/scriptbreaker-multiple-accordion-1.js"></script>
        <script language="JavaScript">
            $(document).ready(function() {
                $(".topnav").accordion({
                    accordion: true,
                    speed: 500,
                    closedSign: '<span class="icon-chevron-right"></span>',
                    openedSign: '<span class="icon-chevron-down"></span>'
                });
            });
        </script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>

  <script type="text/javascript">
  $.ajaxSetup({
  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });
</script>  
</body>

</html>