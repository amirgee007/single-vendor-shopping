<!DOCTYPE html>
<!--[if IE 8]> 
<html lang="en" class="ie8">
   <![endif]-->
   <!--[if IE 9]> 
   <html lang="en" class="ie9">
      <![endif]-->
      <!--[if !IE]><!--> 
      <html lang="en">
         <!--<![endif]-->
         <!-- BEGIN HEAD -->
         <head>
            <meta charset="UTF-8" />
            <title>{{ $SITENAME }} | Product details</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport" />
            <meta content="" name="description" />
            <meta content="" name="author" />
            <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
            <!-- GLOBAL STYLES -->
            <!-- GLOBAL STYLES -->
            <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/bootstrap/css/bootstrap.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/main.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/theme.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/plan.css" />
            @php 
            $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach 
            <link rel="shortcut icon" href="{{ url('')}}/public/assets/favicon/{{ $fav->imgs_name }}">
            @endif      
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
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
                              <li class=""><a >Home</a></li>
                              <li class="active"><a >Product details</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="box dark">
                              <header>
                                 <div class="icons"><i class="icon-edit"></i></div>
                                 <h5>Product details</h5>
                              </header>

                              @foreach($product_list as $products)
                              @endforeach
                              <?php
                                 $title          = $products->pro_title;
                                 $title_fr       = $products->pro_title_fr;
                                              $category_get  = $products->pro_mc_id;
                                        $maincategory    = $products->pro_smc_id;
                                 $subcategory    = $products->pro_sb_id;
                                 $secondsubcategory= $products->pro_ssb_id;
                                 $originalprice  = $products->pro_price;
                                 $discountprice  = $products->pro_disprice;
                                 $inctax=$products->pro_inctax;
                                 $shippingamt=$products->pro_shippamt;
                                 $description    = $products->pro_desc;
                                 $description_fr     = $products->pro_desc_fr;
                                 $deliverydays=$products->pro_delivery;
                                 $metakeyword    = $products->pro_mkeywords;
                                 $metakeyword_fr     = $products->pro_mkeywords_fr;
                                 $metadescription= $products->pro_mdesc;
                                 $metadescription_fr= $products->pro_mdesc_fr;
                                    $file_get  = $products->pro_Img;
                                      $file_get_path =  explode("/**/",$file_get,-1); 
                                 $img_count      = $products->pro_image_count;
                                ?>
                              <div class="row">
                                 <div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                                    {{ Form::open() }}
                                    <div class="panel panel-default">
                                       <div class="panel-heading">
                                          Product details
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Product Title<span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{ $title  }} <!--(<?php echo $title_fr ; ?>)-->
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Top Category<span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{ $products->mc_name }} {{-- /*  if($products->mc_name_fr !=''){ echo '('.$products->mc_name_fr.')'; } */ --}}
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Main Category<span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{ $products->smc_name }} {{-- /* if($products->smc_name_fr !=''){ echo '('.$products->smc_name_fr.')'; } */  --}}
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Sub Category<span class="text-sub"></span></label>
                                             <div class="col-lg-4">
                                                @if($products->sb_name!="")
                                                {{ $products->sb_name }} @else {{ "-" }}@endif
                                                {{-- /*  if($products->sb_name_fr !=''){ echo '('.$products->sb_name_fr.')'; } */ --}}
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Second Sub Category<span class="text-sub"></span></label>
                                             <div class="col-lg-4">
                                                @if($products->ssb_name!=""){{
                                                $products->ssb_name }} @else {{ "-" }} @endif
                                                {{--  /*  if($products->ssb_name_fr !=''){ echo '('.$products->ssb_name_fr.')'; } */ --}}

                                             </div>
                                          </div>
                                       </div>

                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Product Quantity<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                {{ $products->pro_qty }} 
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> Original Price<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                {{ Helper::cur_sym() }} {{ $products->pro_price }} 
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> Discount Price<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                {{ Helper::cur_sym() }} {{ $products->pro_disprice }} 
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Tax Percentage</label>
                                             <div class="col-lg-4">
                                                {{ $products->pro_inctax }}
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Shipping Amount<span class="text-sub"></span></label>
                                             <div class="col-lg-4">
                                                {{ Helper::cur_sym() }} {{ $products->pro_shippamt }}
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> Description<span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{ $description }} 
                                             </div>
                                          </div>
                                       </div>
                                       @if(!empty($get_active_lang))  
                                       @foreach($get_active_lang as $get_lang) 
                                       <?php
                                          $get_lang_name = $get_lang->lang_name;
                                          $description_dynamic = 'pro_desc_'.$get_lang->lang_code; 
                                          $descrip_dynamic = $products->$description_dynamic; ?>
                                       @if($descrip_dynamic !='')
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> Description({{$get_lang_name  }})<span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{ $descrip_dynamic }}
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                       @endif 
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> Specification<span class="text-sub"></span></label>
                                             <div class="col-lg-10">
                                                @if(count($product_spec_details)!=0)
                                                <table class="table table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <th colspan="2">{{ $product_spec_details[0]->spg_name }} 
                                                            @if(!empty($get_active_lang))  
                                                            @foreach($get_active_lang as $get_lang) 
                                                            <?php
                                                               $get_lang_name = $get_lang->lang_name;
                                                               $specification_dynamic = 'spg_name_'.$get_lang->lang_code; 
                                                               $specific_dynamic = $product_spec_details[0]->$specification_dynamic; ?>
                                                            @if($specific_dynamic !='')
                                                            {{ '('.$specific_dynamic.')' }}
                                                            @endif
                                                            @endforeach
                                                            @endif
                                                         </th>
                                                      </tr>
                                                      @foreach($product_spec_details as $spec)
                                                      <tr>
                                                         <td>{{ $spec->sp_name }} 
                                                            @if(!empty($get_active_lang))  
                                                            @foreach($get_active_lang as $get_lang) 
                                                            <?php       $get_lang_name = $get_lang->lang_name;
                                                               $specification_name = 'sp_name_'.$get_lang->lang_code; 
                                                               $specific_name = $spec->$specification_name;  ?>
                                                            @if($specific_name !='')
                                                            {{ '('.$specific_name.')' }} 
                                                            @endif
                                                            @endforeach
                                                            @endif
                                                         </td>
                                                         <td>{{ $spec->spc_value }} 
                                                            @if(!empty($get_active_lang))  
                                                            @foreach($get_active_lang as $get_lang) 
                                                            <?php
                                                               $get_lang_name = $get_lang->lang_name;
                                                               $specification_value = 'spc_value_'.$get_lang->lang_code; 
                                                               $specific_value = $spec->$specification_value; ?>
                                                            @if($specific_value !='') 
                                                            {{ '('.$specific_value.')' }}
                                                            @endif
                                                            @endforeach
                                                            @endif
                                                         </td>
                                                      </tr>
                                                      @endforeach
                                                   </tbody>
                                                </table>
                                                @else {{ 'No specification List avaliable for this particular Category ' }} 
                                                @endif
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Product Color<span class="text-sub">*</span></label>
                                             <div class="col-lg-8">
                                                @if(count($product_color_details) > 0) 
                                                @foreach($product_color_details as $product_color_det) 
                                                {{ $product_color_det->co_name."," }}
                                                @endforeach
                                                @else {{ '-' }} @endif
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Product Size<span class="text-sub">*</span></label>
                                             <div class="col-lg-8">
                                                
                                                @if(count($product_size_details)!=0)  
                                                <?php 
                                                   $size_name = $product_size_details[0]->si_name;
                                                   $return  = strcmp($size_name,'no size'); ?>
                                                @if($return!=0 )
                                                @foreach($product_size_details as $product_size_det) 
                                                {{ $product_size_det->si_name.',' }}
                                                @endforeach 
                                                @else {{ '-' }} @endif
                                                @endif 
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Delivery Days<span class="text-sub">*</span></label>
                                             <div class="col-lg-8">
                                                {{  $products->pro_delivery }} Days 
                                             </div>
                                          </div>
                                       </div>                                      
                                       
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Meta Keywords</label>
                                             <div class="col-lg-8">
                                                @if($products->pro_mkeywords!="")
                                                {{ $products->pro_mkeywords }} @else {{ "-" }} @endif  
                                             </div>
                                          </div>
                                       </div>
                                       @if(!empty($get_active_lang))  
                                       @foreach($get_active_lang as $get_lang) 
                                       <?php
                                          $meta_key_dynamic = 'pro_mkeywords_'.$get_lang->lang_code; 
                                          $meta_keyword_dyn= $products->$meta_key_dynamic; ?>
                                       @if($meta_keyword_dyn !='')
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Meta Keywords({{ Helper::lang_name() }})</label>
                                             <div class="col-lg-8">
                                                @if($products->meta_keyword_dyn!=""){{
                                                $meta_keyword_dyn }} @else {{ "-" }}   @endif
                                             </div>
                                          </div>
                                       </div>
                                       @endif 
                                       @endforeach
                                       @endif
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Meta Description</label>
                                             <div class="col-lg-8">
                                                @if($products->pro_mdesc!=""){{
                                                $products->pro_mdesc }} @else {{ "-" }} @endif  
                                             </div>
                                          </div>
                                       </div>
                                       @if(!empty($get_active_lang))  
                                       @foreach($get_active_lang as $get_lang) 
                                       <?php
                                          $meta_desc_dynamic = 'pro_mdesc_'.$get_lang->lang_code; 
                                          $meta_desc_dyn = $products->$meta_desc_dynamic; ?>
                                       @if($meta_desc_dyn !='')
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Meta Description({{ Helper::lang_name() }})</label>
                                             <div class="col-lg-8">
                                                @if($meta_desc_dyn!=""){{
                                                $meta_desc_dyn }} @else {{ "-"  }} @endif  
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                       @endif
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Cash Back<span class="text-sub">*</span></label>
                                             <div class="col-lg-8">
                                                {{ Helper::cur_sym() }} {{ $products->cash_pack }}  
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Apply Cancellation Policy<span class="text-sub">*</span></label>
                                             <div class="col-lg-8">
                                                <?php if($products->allow_cancel == 1 ) { echo "Yes" ; } else { echo "No"; } ?>  
                                             </div>
                                          </div>
                                       </div>
                                       @if($products->allow_cancel == 1 ) 
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> Cancellation Policy <span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{ $products->cancel_policy }}
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @if($products->allow_cancel == 1 )
                                        @if(!empty($get_active_lang)) 
                                       @foreach($get_active_lang as $get_lang)
                                       <?php
                                          $get_lang_name = $get_lang->lang_name;
                                          $cancel_policy_dynamic = 'cancel_policy_'.$get_lang->lang_code; 
                                          $descrip_cancel_policy = $products->$cancel_policy_dynamic; ?>
                                       @if($descrip_cancel_policy !='')
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> Cancellation Policy({{ $get_lang_name }}) <span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{  $descrip_cancel_policy }}
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                       @endif
                                       @endif
                                       @if($products->allow_cancel == 1 )  
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> No of days Cancellation Applicable <span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{  $products->cancel_days }}
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Apply Return/Refund Policy<span class="text-sub">*</span></label>
                                             <div class="col-lg-8">
                                                @if($products->allow_return == 1 ) {{  "Yes" }} @else {{ "No" }} @endif  
                                             </div>
                                          </div>
                                       </div>
                                       @if($products->allow_return == 1 ) 
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Return Policy <span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{ $products->return_policy }}
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @if($products->allow_return == 1 ) 
                                        @if(!empty($get_active_lang)) 
                                       @foreach($get_active_lang as $get_lang) 
                                       <?php 
                                          $get_lang_name = $get_lang->lang_name;
                                          $return_policy_dynamic = 'return_policy_'.$get_lang->lang_code; 
                                          $return_policy = $products->$return_policy_dynamic;  ?>
                                       @if($return_policy !='') 
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Return Policy({{ $get_lang_name }}) <span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{ $return_policy }} 
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                       @endif
                                       @endif
                                       @if($products->allow_return == 1 ) 
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> No of days Return Applicable <span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{  $products->return_days }} 
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Apply Replacement Policy<span class="text-sub">*</span></label>
                                             <div class="col-lg-8">
                                                @if($products->allow_replace == 1 ) {{  "Yes"  }} @else {{ "No"  }} @endif  
                                             </div>
                                          </div>
                                       </div>
                                       @if($products->allow_replace == 1 ) 
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Replacement Policy <span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{ $products->replace_policy }}
                                             </div>
                                          </div>
                                       </div>
                                       @endif

                                       @if($products->allow_replace == 1 )  @if(!empty($get_active_lang))  

                                       @foreach($get_active_lang as $get_lang) 
                                       <?php 
                                          $get_lang_name = $get_lang->lang_name;
                                          $replace_policy_dynamic = 'replace_policy_'.$get_lang->lang_code; 
                                          $replace_policy = $products->$replace_policy_dynamic; ?>
                                       @if($replace_policy !='')
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Replacement Policy ({{ $get_lang_name }}) <span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{ $replace_policy }}
                                            </div>
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                       @endif
                                       @endif
                                      
                                       @if($products->allow_replace == 1 ) 
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> No of days Replacement Applicable<span class="text-sub">*</span></label>
                                             <div class="col-lg-10">
                                                {{  $products->replace_days }} 
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Product Image<span class="text-sub">*</span></label>
                                             <div class="col-lg-8">
                                                <?php $img_count = count($file_get_path); ?>
                                                <!-- Image path starts -->
                                                @if(count($file_get_path) > 0  && $img_count != '') {{--//check image is available --}}
                                                @for($j=0 ; $j< $img_count; $j++)
                                                @if($file_get_path[$j] !='') {{--  //check image is null--}}
                                                <?php
                                                   $pro_img = $file_get_path[$j];
                                                   $prod_path = url('').'/public/assets/default_image/No_image_product.png';
                                                   $img_data = "public/assets/product/".$pro_img; ?>
                                                @if(file_exists($img_data))  
                                                @php 
                                                $prod_path = url('').'/public/assets/product/'.$pro_img; @endphp
                                                @else  
                                                @if(isset($DynamicNoImage['productImg']))
                                                @php $dyanamicNoImg_path="public/assets/noimage/".$DynamicNoImage['productImg']; @endphp
                                                @if(file_exists($dyanamicNoImg_path) && $DynamicNoImage['productImg'] !='')
                                                @php 
                                                $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg']; 
                                                @endphp
                                                @endif
                                                @endif
                                                @endif
                                                @else
                                                @php $prod_path = url('').'/public/assets/default_image/No_image_product.png'; @endphp
                                                @if(isset($DynamicNoImage['productImg']))
                                                @php $dyanamicNoImg_path="public/assets/noimage/".$DynamicNoImage['productImg']; @endphp
                                                @if(file_exists($dyanamicNoImg_path) && $DynamicNoImage['productImg'] !='')
                                                @php 
                                                $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg']; 
                                                @endphp
                                                @endif
                                                @endif
                                                @endif
                                                <img style="height:70px; width:50px;" src="{{ $prod_path }}">
                                                @endfor
                                                @else
                                                @php  $prod_path = url('').'/public/assets/default_image/No_image_product.png';  @endphp
                                                @if(isset($DynamicNoImage['productImg']))
                                                @php $dyanamicNoImg_path="public/assets/noimage/".$DynamicNoImage['productImg']; @endphp
                                                @if(file_exists($dyanamicNoImg_path) && $DynamicNoImage['productImg'] !='')
                                                @php 
                                                $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['productImg']; 
                                                @endphp
                                                @endif
                                                @endif
                                                <img style="height:70px; width:50px;" src="{{ $prod_path }}">
                                                @endif
                                                <!-- Image path ends -->    
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-lg-10" for="pass1"><span class="text-sub"></span></label>
                                       <div class="col-lg-2">
                                          <a style="color:#fff" href="{{ URL::previous() }}" class="btn btn-success btn-sm btn-grad">Back</a>
                                       </div>
                                    </div>
                                    {{ Form::close() }}
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
         </body>
         <!-- END BODY -->
      </html>