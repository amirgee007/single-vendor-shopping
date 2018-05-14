{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
@php $city_det = DB::table('nm_emailsetting')->first(); @endphp
<!-- Header End====================================================================== -->
<div id="mainBody">
   <div class="container">
      <div class="row">
         <!-- Sidebar ================================================== -->
         <!-- Sidebar end=============================================== -->
         <div class="span12">
            <ul class="breadcrumb">
               <li><a href="index">@if (Lang::has(Session::get('lang_file').'.HOME')!= '') {{  trans(Session::get('lang_file').'.HOME')}}  @else {{ trans($OUR_LANGUAGE.'.HOME')}} @endif</a> <span class="divider">/</span></li>
               <li class="active">@if (Lang::has(Session::get('lang_file').'.MERCHANT_SIGN_UP')!= '') {{  trans(Session::get('lang_file').'.MERCHANT_SIGN_UP')}}  @else {{ trans($OUR_LANGUAGE.'.MERCHANT_SIGN_UP')}} @endif</li>
            </ul>
            @if ($errors->any())
            <br>
            <ul style="color:red;">
               <div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >�</button>
               </div>
            </ul>
            @endif
            @if (Session::has('mail_exist'))
            <div class="alert alert-warning alert-dismissable">{!! Session::get('mail_exist') !!}
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
            </div>
            @endif
            @if (Session::has('result'))
            <div class="alert alert-success alert-dismissable">{!! Session::get('result') !!}
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
            </div>
            @endif
            <h3 style="margin-bottom:0px;">@if (Lang::has(Session::get('lang_file').'.WELCOME_TO_MERCHANT_SIGN_UP')!= '') {{  trans(Session::get('lang_file').'.WELCOME_TO_MERCHANT_SIGN_UP')}}  @else {{ trans($OUR_LANGUAGE.'.WELCOME_TO_MERCHANT_SIGN_UP')}} @endif!</h3>
            <p style="padding-bottom:20px;">@if (Lang::has(Session::get('lang_file').'.CREATE_YOUR_OWN_PERSONAL_ONLINE_STORE')!= '') {{  trans(Session::get('lang_file').'.CREATE_YOUR_OWN_PERSONAL_ONLINE_STORE')
               }}  @else {{ trans($OUR_LANGUAGE.'.CREATE_YOUR_OWN_PERSONAL_ONLINE_STORE')}} @endif!
            </p>
            <div class="content">
               {!! Form::open(array('url'=>'merchant_signup','class'=>'testform forms_new','id'=>'testform','enctype'=>'multipart/form-data','accept-charset' => 'UTF-8')) !!}                 
               <div class="personal-data">
                  <h4 style="padding:10px;background:#eee;">@if (Lang::has(Session::get('lang_file').'.CREATE_YOUR_STORE')!= '') {{  trans(Session::get('lang_file').'.CREATE_YOUR_STORE')}}  @else {{ trans($OUR_LANGUAGE.'.CREATE_YOUR_STORE')}} @endif</h4>
                  <div class="row">
                     <div class="span5">
                        <label for="text1" >@if (Lang::has(Session::get('lang_file').'.STORE_NAME')!= '') {{  trans(Session::get('lang_file').'.STORE_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.STORE_NAME')}} @endif(English):<span class="text-sub">*</span></label>
                        <input type="text" id="store_name" maxlength="150" name="store_name" class="form-control span5" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_STORE_NAME')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_STORE_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_STORE_NAME')}} @endif" value="{!! Input::old('store_name') !!}" />
                        @if(!empty($get_active_lang))  
                        @foreach($get_active_lang as $get_lang) 
                        @php
                        $get_lang_name = $get_lang->lang_name;
                        @endphp
                        <label for="text1" >@if (Lang::has(Session::get('lang_file').'.STORE_NAME')!= '') {{  trans(Session::get('lang_file').'.STORE_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.STORE_NAME')}} @endif:({{ $get_lang_name }})<span class="text-sub">*</span></label>
                        <input type="text" id="store_name_<?php echo $get_lang_name; ?>" name="store_name_<?php echo $get_lang_name; ?>" class="form-control span5" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_STORE_NAME')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_STORE_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_STORE_NAME')}} @endif  {{ $get_lang_name }}"  value="{!! Input::old('store_name_'.$get_lang_name) !!}" />
                        @endforeach
                        @endif
                        <label for="text1" >@if (Lang::has(Session::get('lang_file').'.PHONE')!= '') {{ trans(Session::get('lang_file').'.PHONE')}}  @else {{ trans($OUR_LANGUAGE.'.PHONE') }} @endif:<span class="text-sub">*</span></label>
                        <input type="number" id="store_pho" maxlength="16" required="required" name="store_pho" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_CONTACT_NUMBER')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_CONTACT_NUMBER')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_CONTACT_NUMBER')}} @endif" class="form-control span5" value="{!! Input::old('store_pho') !!}">
                        <div id="store_pho_error_msg"></div>
                        <label for="text1"> @if (Lang::has(Session::get('lang_file').'.ADDRESS1')!= '') {{ trans(Session::get('lang_file').'.ADDRESS1')}}  @else {{ trans($OUR_LANGUAGE.'.ADDRESS1')}} @endif (English) :<span class="text-sub">*</span></label>
                        <input type="text" id="store_add_one" name="store_add_one" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ADDRESS1')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_ADDRESS1')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_ADDRESS1')}} @endif English" class="form-control span5" value="{!! Input::old('store_add_one') !!}">
                        @if(!empty($get_active_lang))  
                        @foreach($get_active_lang as $get_lang) 
                        @php 
                        $get_lang_name = $get_lang->lang_name;
                        @endphp				
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.ADDRESS1')!= '') {{  trans(Session::get('lang_file').'.ADDRESS1')}}  @else {{ trans($OUR_LANGUAGE.'.ADDRESS1')}} @endif ({{ $get_lang_name }}):<span class="text-sub">*</span></label>
                        <input type="text" id="store_add_one_<?php echo $get_lang_name; ?>" name="store_add_one_<?php echo $get_lang_name; ?>" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ADDRESS1')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_ADDRESS1')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_ADDRESS1')}} @endif {{ $get_lang_name }}" class="form-control span5" value="{!! Input::old('store_add_one_'.$get_lang_name) !!}">
                        @endforeach
                        @endif   
                        <label for="text1" >@if (Lang::has(Session::get('lang_file').'.ADDRESS2')!= '') {{  trans(Session::get('lang_file').'.ADDRESS2')}}  @else {{ trans($OUR_LANGUAGE.'.ADDRESS2')}} @endif(English):<span class="text-sub">*</span></label>
                        <input type="text" id="store_add_two" name="store_add_two" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ADDRESS2')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_ADDRESS2')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_ADDRESS2')}} @endif English" class="form-control span5" value="{!! Input::old('store_add_two') !!}">
                        @if(!empty($get_active_lang))  
                        @foreach($get_active_lang as $get_lang) 
                        @php 
                        $get_lang_name = $get_lang->lang_name;
                        @endphp					
                        <label for="text1" >@if (Lang::has(Session::get('lang_file').'.ADDRESS2')!= '') {{  trans(Session::get('lang_file').'.ADDRESS2')}}  @else {{ trans($OUR_LANGUAGE.'.ADDRESS2')}} @endif({{ $get_lang_name }}):<span class="text-sub">*</span></label>
                        <input type="text" id="store_add_two_<?php echo $get_lang_name; ?>" name="store_add_two_<?php echo $get_lang_name; ?>" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ADDRESS2')!= '') {{ trans(Session::get('lang_file').'.ENTER_YOUR_ADDRESS2')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_ADDRESS2')}} @endif {{ $get_lang_name }}" class="form-control span5" value="{!! Input::old('store_add_two_'.$get_lang_name) !!}">
                        @endforeach
                        @endif    
                        <label for="text1" >@if (Lang::has(Session::get('lang_file').'.COUNTRY')!= '') {{  trans(Session::get('lang_file').'.COUNTRY')}}  @else {{ trans($OUR_LANGUAGE.'.COUNTRY')}} @endif:<span class="text-sub">*</span></label>
                        <select class="span5" name="select_country" id="select_country" onChange="select_city_ajax(this.value)" >
                           <option value="">-- @if (Lang::has(Session::get('lang_file').'.SELECT_COUNTRY')!= '') {{  trans(Session::get('lang_file').'.SELECT_COUNTRY')}}  @else {{ trans($OUR_LANGUAGE.'.SELECT_COUNTRY')}} @endif --</option>
                           @foreach($country_details as $country_fetch)
                           <option value="<?php echo $country_fetch->co_id; ?>" <?php if(Input::old('select_country')==$country_fetch->co_id){ echo "selected";}?>><?php 
                              if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                              $co_name = 'co_name';
                              }else {  $co_name = 'co_name_'.Session::get('lang_code'); }
                               echo $country_fetch->$co_name; ?></option>
                           @endforeach
                        </select>
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.CITY')!= '') {{  trans(Session::get('lang_file').'.CITY')}}  @else {{ trans($OUR_LANGUAGE.'.CITY')}} @endif:<span class="text-sub">*</span></label>
                        @if(Input::old('select_city'))
                        <select class="span5" name="select_city" id="select_city" >
                           @foreach($get_city as $city) 
                           @if(Input::old('select_country')==$city->ci_con_id)
                           <?php  if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                              $ci_name = 'ci_name';
                              }else {  $ci_name = 'ci_name_'.Session::get('lang_code'); }?>
                           <option value="<?php echo $city->ci_id;?>" <?php if(Input::old('select_city')==$city->ci_id){ echo "selected";} ?>>
                              <?php echo $city->$ci_name; ?>
                           </option>
                           @endif
                           @endforeach
                        </select>
                        @else
                        <select class="span5" name="select_city" id="select_city" >
                           <option value="">--@if (Lang::has(Session::get('lang_file').'.SELECT_CITY')!= '') {{  trans(Session::get('lang_file').'.SELECT_CITY')}}  @else {{ trans($OUR_LANGUAGE.'.SELECT_CITY')}} @endif--</option>
                        </select>
                        @endif
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.ZIPCODE')!= '') {{  trans(Session::get('lang_file').'.ZIPCODE')}}  @else {{ trans($OUR_LANGUAGE.'.ZIPCODE')}} @endif:<span class="text-sub">*</span></label>
                        <input type="number" id="zip_code" name="zip_code" maxlength="6" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ZIPCODE')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_ZIPCODE')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_ZIPCODE')}} @endif" class="form-control span5" value="{!! Input::old('zip_code') !!}">
                        <div id="zip_error_msg"></div>
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.META_KEYWORDS')!= '') {{  trans(Session::get('lang_file').'.META_KEYWORDS')}}  @else {{ trans($OUR_LANGUAGE.'.META_KEYWORDS')}} @endif(English):<span class="text-sub">*</span></label>
                        <input type="text" id="meta_keyword" name="meta_keyword" style="height:50px;" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_META_KEYWORDS')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_META_KEYWORDS')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_META_KEYWORDS')}} @endif"  class="form-control span5" value="{!! Input::old('meta_keyword') !!}">
                        @if(!empty($get_active_lang))  
                        @foreach($get_active_lang as $get_lang) 
                        @php
                        $get_lang_name = $get_lang->lang_name;
                        @endphp
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.META_KEYWORDS')!= '') {{  trans(Session::get('lang_file').'.META_KEYWORDS')}}  @else {{ trans($OUR_LANGUAGE.'.META_KEYWORDS')}} @endif({{ $get_lang_name }}):<span class="text-sub">*</span></label>
                        <input type="text" id="meta_keyword_{{ $get_lang_name }}" name="meta_keyword_{{ $get_lang_name }}" style="height:50px;" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_META_KEYWORDS')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_META_KEYWORDS')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_META_KEYWORDS')}} @endif  {{ $get_lang_name }}"  class="form-control span5" value="{!! Input::old('meta_keyword_'.$get_lang_name) !!}">
                        @endforeach
                        @endif
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.META_DESCRIPTION')!= '') {{  trans(Session::get('lang_file').'.META_DESCRIPTION')}}  @else {{ trans($OUR_LANGUAGE.'.META_DESCRIPTION')}} @endif(English)<span class="text-sub">*</span></label>
                        <input type="text" id="meta_description"  name="meta_description" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_META_DESCRIPTION')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_META_DESCRIPTION')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_META_DESCRIPTION')}} @endif" style="height:50px;" class="form-control span5" value="{!! Input::old('meta_description') !!}">
                        @if(!empty($get_active_lang)) 
                        @foreach($get_active_lang as $get_lang)
                        @php
                        $get_lang_name = $get_lang->lang_name;
                        @endphp
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.META_DESCRIPTION')!= '') {{  trans(Session::get('lang_file').'.META_DESCRIPTION')}}  @else {{ trans($OUR_LANGUAGE.'.META_DESCRIPTION')}} @endif({{ $get_lang_name }})<span class="text-sub">*</span></label>
                        <input type="text" id="meta_description_<?php echo $get_lang_name; ?>"  name="meta_description_<?php echo $get_lang_name; ?>" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_META_DESCRIPTION')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_META_DESCRIPTION')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_META_DESCRIPTION')}} @endif  {{ $get_lang_name }}" style="height:50px;" class="form-control span5" value="{!! Input::old('meta_description_'.$get_lang_name) !!}">
                        @endforeach
                        @endif
                        <label  for="text1">@if (Lang::has(Session::get('lang_file').'.WEBSITE')!= '') {{  trans(Session::get('lang_file').'.WEBSITE')}}  @else {{ trans($OUR_LANGUAGE.'.WEBSITE')}} @endif<span class="text-sub">*</span></label>
                        <input type="url" class="form-control span5" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_STORE_WEBSITE')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_STORE_WEBSITE')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_STORE_WEBSITE')}} @endif" id="website" name="website" value="{!! Input::old('website') !!}"  placeholder="http://www.example.com">
                     </div>
                     <div class="span5">
                        <?php /*
                           <label for="text1">Commission<span>(%):</span><span class="text-sub">*</span></label>
                            <input type="text" class="form-control span5" placeholder="" id="commission" name="commission" value="{!! Input::old('commission') !!}"  > */ ?>
                        <label for="pass1"><span class="text-sub"></span></label>
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.UPLOAD_IMAGES')!= '') {{  trans(Session::get('lang_file').'.UPLOAD_IMAGES')}}  @else {{ trans($OUR_LANGUAGE.'.UPLOAD_IMAGES')}} @endif:<span class="text-sub">* (image size must be {{ $STORE_WIDTH }} x {{ $STORE_HEIGHT }} pixels )</span>*JPG,PNG</label>
                        <input type="file" placeholder="{{ $STORE_WIDTH }} x {{ $STORE_HEIGHT }}" class="form-control span5"  id="file" name="file" value="{!! Input::old('file') !!}" required>
                        <span style="color:red"></span>
                        <div class="gllpLatlonPicker">
                           <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
                              <label for="text1">@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_STORE_LOCATION')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_STORE_LOCATION')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_STORE_LOCATION')}} @endif <small class="text-sub">*</small></label>
                              <div class="row">
                                 <div class="span4">
                                    <input type="text" name="location" value="{!! Input::old('location') !!}" class="gllpSearchField span5" placeholder="@if (Lang::has(Session::get('lang_file').'.TYPE_YOUR_LOCATION_HERE')!= '') {{  trans(Session::get('lang_file').'.TYPE_YOUR_LOCATION_HERE')}}  @else {{ trans($OUR_LANGUAGE.'.TYPE_YOUR_LOCATION_HERE')}} @endif" style=" margin-left: 0px;">
                                 </div>
                                 <div class="span4">
                                    <br>
                                    <input type="button" class="gllpSearchButton form-control" value="@if (Lang::has(Session::get('lang_file').'.SEARCH')!= '') {{  trans(Session::get('lang_file').'.SEARCH')}}  @else {{ trans($OUR_LANGUAGE.'.SEARCH')}} @endif" style="background: #00B381;
                                       font-size: 14px;
                                       color: white;font-family:lato;margin-bottom: 15px;
                                       margin-top: -22px;
                                       margin-left: 0px;">
                                 </div>
                              </div>
                              <div class="gllpMap">@if (Lang::has(Session::get('lang_file').'.GOOGLE_MAPS')!= '') {{  trans(Session::get('lang_file').'.GOOGLE_MAPS')}}  @else {{ trans($OUR_LANGUAGE.'.GOOGLE_MAPS')}} @endif</div>
                              <br/>
                              <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
                                 <label  for="text1">@if (Lang::has(Session::get('lang_file').'.LATITUDE')!= '') {{  trans(Session::get('lang_file').'.LATITUDE')}}  @else {{ trans($OUR_LANGUAGE.'.LATITUDE')}} @endif<span class="text-sub">*</span></label>
                                 <input type="text" name="latitude" class="gllpLatitude form-control span5" readonly  value="<?php echo $city_det->es_latitude; ?>"  id="latitude"/> 
                                 <!-- {!! Input::old('latitude') !!} -->
                              </div>
                              <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
                                 <label  for="text1">@if (Lang::has(Session::get('lang_file').'.LONGTITUDE')!= '') {{  trans(Session::get('lang_file').'.LONGTITUDE')}}  @else {{ trans($OUR_LANGUAGE.'.LONGTITUDE')}} @endif<span class="text-sub">*</span></label>
                                 <input type="text" name="longtitude" class="gllpLongitude form-control span5" value="{{  $city_det->es_longitude }}"  readonly id="longtitude"/>
                                 <!-- {!! Input::old('longtitude') !!} -->
                                 <input type="text" class="gllpZoom"  style="visibility:hidden">
                                 <input class="gllpUpdateButton" style="visibility:hidden">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <h4 style="padding:10px;background:#eee;">@if (Lang::has(Session::get('lang_file').'.PERSONAL_DETAILS')!= '') {{  trans(Session::get('lang_file').'.PERSONAL_DETAILS')}}  @else {{ trans($OUR_LANGUAGE.'.PERSONAL_DETAILS')}} @endif</h4>
                  <div class="row">
                     <div class="span5">
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.FIRST_NAME')!= '') {{  trans(Session::get('lang_file').'.FIRST_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.FIRST_NAME')}} @endif:<span class="text-sub">*</span></label>
                        <input type="text" maxlength="100" id="first_name" name="first_name" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_FIRST_NAME')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_FIRST_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_FIRST_NAME')}} @endif" class="form-control span5" value="{!! Input::old('first_name') !!}" tabindex="1" >
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.LAST_NAME')!= '') {{  trans(Session::get('lang_file').'.LAST_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.LAST_NAME')}} @endif:<span class="text-sub">*</span></label>
                        <input type="text" id="last_name" maxlength="100" class="form-control span5" name="last_name" value="{!! Input::old('last_name') !!}" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_LAST_NAME')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_LAST_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_LAST_NAME')}} @endif" tabindex="2">
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.E-MAIL')!= '') {{  trans(Session::get('lang_file').'.E-MAIL')}}  @else {{ trans($OUR_LANGUAGE.'.E-MAIL')}} @endif:<span class="text-sub">*</span></label>
                        <input type="email" id="email_id" class="form-control span5" name="email_id" value="{!! Input::old('email_id') !!}" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_EMAIL_ID')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_EMAIL_ID')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_EMAIL_ID')}} @endif" tabindex="3" onchange="check_email();">
                        <div id="email_id_error_msg"  style="color:#F00;font-weight:800"> </div>
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.CONTACT_NUMBER')!= '') {{  trans(Session::get('lang_file').'.CONTACT_NUMBER')}}  @else {{ trans($OUR_LANGUAGE.'.CONTACT_NUMBER')}} @endif:<span class="text-sub">*</span></label>
                        <input type="number" id="phone_no" maxlength="16" class="form-control span5" name="phone_no" value="{!! Input::old('phone_no') !!}" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_CONTACT_NUMBER')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_CONTACT_NUMBER')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_CONTACT_NUMBER')}} @endif"  tabindex="6">
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.ADDRESS1')!= '') {{  trans(Session::get('lang_file').'.ADDRESS1')}}  @else {{ trans($OUR_LANGUAGE.'.ADDRESS1')}} @endif:<span class="text-sub">*</span></label>
                        <input type="text" id="addreess_one" class="form-control span5" name="addreess_one" value="{!! Input::old('addreess_one') !!}" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ADDRESS1')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_ADDRESS1')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_ADDRESS1')}} @endif" tabindex="7">
                     </div>
                     <div class="span5">
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.ADDRESS2')!= '') {{  trans(Session::get('lang_file').'.ADDRESS2')}}  @else {{ trans($OUR_LANGUAGE.'.ADDRESS2')}} @endif:<span class="text-sub">*</span></label>
                        <input type="text" id="address_two" name="address_two" class="form-control span5" value="{!! Input::old('address_two') !!}" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_ADDRESS2')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_ADDRESS2')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_ADDRESS2')}} @endif"  tabindex="8">
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.COUNTRY')!= '') {{  trans(Session::get('lang_file').'.COUNTRY')}}  @else {{ trans($OUR_LANGUAGE.'.COUNTRY')}} @endif:<span class="text-sub">*</span></label>
                        <select class="form-control span5" name="select_mer_country" id="select_mer_country" onChange="select_mer_city_ajax(this.value)" tabindex="4" >
                           <option value="">-- @if (Lang::has(Session::get('lang_file').'.SELECT_COUNTRY')!= '') {{  trans(Session::get('lang_file').'.SELECT_COUNTRY')}}  @else {{ trans($OUR_LANGUAGE.'.SELECT_COUNTRY')}} @endif--</option>
                           @foreach($country_details as $country_fetch) 
                           @if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') 
                           <?php	$co_name = 'co_name'; ?>
                           @else  <?php  $co_name = 'co_name_'.Session::get('lang_code');  ?>
                           @endif
                           <option value="{{ $country_fetch->co_id }}" <?php if(Input::old('select_mer_country')==$country_fetch->co_id){ echo "selected"; }?>><?php echo $country_fetch->$co_name; ?></option>
                           @endforeach
                        </select>
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.CITY')!= '') {{  trans(Session::get('lang_file').'.CITY')}}  @else {{ trans($OUR_LANGUAGE.'.CITY')}} @endif:<span class="text-sub">*</span></label>
                        @if(Input::old('select_mer_city'))
                        <select class="form-control span5" name="select_mer_city" id="select_mer_city" tabindex="5" >
                           @foreach($get_city as $city)
                           @if(Input::old('select_mer_country')==$city->ci_con_id)
                           <option value="<?php echo $city->ci_id;?>" <?php if(Input::old('select_mer_city')==$city->ci_id){ echo "selected";} ?>><?php echo $city->ci_name; ?></option>
                           @endif
                           @endforeach
                        </select>
                        @else
                        <select class="form-control span5" name="select_mer_city" id="select_mer_city" tabindex="5" >
                           <option value="">--@if (Lang::has(Session::get('lang_file').'.SELECT_CITY')!= '') {{  trans(Session::get('lang_file').'.SELECT_CITY')}}  @else {{ trans($OUR_LANGUAGE.'.SELECT_CITY')}} @endif--</option>
                        </select>
                        @endif
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.PAYMENT_EMAIL')!= '') {{  trans(Session::get('lang_file').'.PAYMENT_EMAIL')}}  @else {{ trans($OUR_LANGUAGE.'.PAYMENT_EMAIL')}} @endif:<span class="text-sub"></span></label>
                        <input type="text" class="form-control span5"  id="payment_account" value="{!! Input::old('payment_account') !!}" name="payment_account" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_PAYMENT_ACCOUNT_DETAILS')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_PAYMENT_ACCOUNT_DETAILS')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_PAYMENT_ACCOUNT_DETAILS')}} @endif"  tabindex="9">
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.PAYMENT_EMAIL_KEY')!= '') {{  trans(Session::get('lang_file').'.PAYMENT_EMAIL_KEY')}}  @else {{ trans($OUR_LANGUAGE.'.PAYMENT_EMAIL_KEY')}} @endif:<span class="text-sub"></span></label>
                        <input type="text" class="form-control span5"  id="payment_account_payu_key" value="{!! Input::old('payment_account_payu_key') !!}" name="payment_account_payu_key" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_PAYMENT_ACCOUNT_DETAILS_PAYU_KEY')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_PAYMENT_ACCOUNT_DETAILS_PAYU_KEY')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_PAYMENT_ACCOUNT_DETAILS_PAYU_KEY')}} @endif"  tabindex="9">
                        <label for="text1">@if (Lang::has(Session::get('lang_file').'.PAYMENT_EMAIL_SALT')!= '') {{  trans(Session::get('lang_file').'.PAYMENT_EMAIL_SALT')}}  @else {{ trans($OUR_LANGUAGE.'.PAYMENT_EMAIL_SALT')}} @endif:<span class="text-sub"></span></label>
                        <input type="text" class="form-control span5"  id="payment_account" value="{!! Input::old('payment_account_payu_salt') !!}" name="payment_account_payu_salt" placeholder="@if (Lang::has(Session::get('lang_file').'.ENTER_YOUR_PAYMENT_ACCOUNT_DETAILS_PAYU_SALT')!= '') {{  trans(Session::get('lang_file').'.ENTER_YOUR_PAYMENT_ACCOUNT_DETAILS_PAYU_SALT')}}  @else {{ trans($OUR_LANGUAGE.'.ENTER_YOUR_PAYMENT_ACCOUNT_DETAILS_PAYU_SALT')}} @endif"  tabindex="9">

                     </div>
                  </div>
               </div>
            </div>
            {!! Form::close() !!}
         </div>
      </div>
   </div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
<script src="<?php //echo url('');?>/themes/js/jquery.steps.js"></script>
<script src="{{ url('') }}/themes/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ url('') }}/themes/js/bootshop.js"></script>
<!--    <script src="<?php // echo url(); ?>/themes/js/jquery.lightbox-0.5.js"></script>-->
<script>
   $( document ).ready(function() {
   	$('#zip_code').keypress(function (q){
          if(q.which!=8 && q.which!=0 && q.which!=13 && (q.which<48 || q.which>57))
   	{
              originalprice.css('border', '1px solid red'); 
   		$('#zip_error_msg').html('<?php if (Lang::has(Session::get('lang_file').'.NUMBERS_ONLY_ALLOWED')!= '') { echo  trans(Session::get('lang_file').'.NUMBERS_ONLY_ALLOWED');}  else { echo trans($OUR_LANGUAGE.'.NUMBERS_ONLY_ALLOWED');} ?>');
   		originalprice.focus();
   		return false;
          }
   	else
   	{			
              originalprice.css('border', ''); 
   		$('#zip_error_msg').html('');	        
   	}
          });store_pho
   
   	
   	$('.close').click(function() {
   		$('.alert').hide();
   	});
   $('#submit').click(function() {
      var file		 	 = $('#file');
   var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        	if(file.val() == "")
   		{
   		file.focus();
   	file.css('border', '1px solid red'); 		
   	return false;
   	}			
   	else if ($.inArray($('#file').val().split('.').pop().toLowerCase(), fileExtension) == -1) { 				
   	file.focus();
   	file.css('border', '1px solid red'); 		
   	return false;
   	}			
   	else
   	{
   	file.css('border', ''); 				
   	}
   });
   });
</script>
<script>
   function select_city_ajax(city_id)
   {
   	 var passData = 'city_id='+city_id;
   	 //alert(passData);
   	   $.ajax( {
   		      type: 'get',
   			  data: passData,
   			  url: '<?php echo url('ajax_select_city'); ?>',
   			  success: function(responseText){  
   			 // alert(responseText);
   			   if(responseText)
   			   { 
   				$('#select_city').html(responseText);					   
   			   }
   			}		
   		});		
   }
   
   function select_mer_city_ajax(city_id)
   {
   	 var passData = 'city_id='+city_id;
   	// alert(passData);
   	   $.ajax( {
   		      type: 'get',
   			  data: passData,
   			  url: '<?php echo url('ajax_select_city'); ?>',
   			  success: function(responseText){  
   			 // alert(responseText);
   			   if(responseText)
   			   { 
   				$('#select_mer_city').html(responseText);					   
   			   }
   			}		
   		});	
   }
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
<script src="{{ url('') }}/themes/js/simpleform.min.js"></script>
<script type="text/javascript">
   $(".testform").simpleform({
   	speed : 500,
   	transition : 'fade',
   	progressBar : true,
   	showProgressText : true,
   	validate: true
   });
   
   function check_email(){
   var email_id = $('#email_id').val();
   $.ajax({
   type: 'get',
   data: 'email_id='+email_id,
   url: '<?php echo url('check_mer_email'); ?>',
   success: function(responseText){  
   	//alert(responseText);
   	$('#email_id_error_msg').html(responseText);	
   	if(responseText!=''){
   		$("#email_id").css('border', '1px solid red'); 
   		$("#email_id").focus();
   	}
   	else
   		$("#email_id").css('border', '1px solid #ccc'); 
   
   	
   	
   	
   }		
   });	
   }
   
   
   function validateForm(formID, Obj){
   
   	switch(formID){
   		case 'testform' :
   			Obj.validate({
   				rules: {
   					email: {
   						required: true,
   						email: true
   					},
   					store_name: {
   						required: true
   					},
   					store_name_french: {
   						required: true
   					},
   					store_pho: {
   						required: true
   					},
   					store_add_one: {
   						required: true
   					},
   					store_add_one_french: {
   						required: true
   					},
   					store_add_two: {
   						required: true
   					},
   					store_add_two_french: {
   						required: true
   					},
   					
   					zip_code: {
   						required: true
   					},
   					meta_keyword: {
   						required: true
   					},
   					meta_keyword_french: {
   						required: true
   					},
   					meta_description: {
   						required: true
   					},
   					meta_description_french: {
   						required: true
   					},
   					website: {
   						required: true
   					},
   					location: {
   						required: true
   					},
   					commission: {
   						required: true
   					},
   					file: {
   						required: true
   					},
   					select_country: {
   						required: true
   					},
   					select_city: {
   						required: true
   					},
   					email_id: {
   						required: true,
   						email_id: true
   					},
   					first_name: {
   						required: true
   					},
   					select_mer_city: {
   						required: true,
   						
   					},
   					addreess_one: {
   						required: true
   					},
   					payment_account: {
   						required: true
   					},
   					
   					last_name: {
   						required: true
   					},
   					select_mer_country: {
   						required: true
   					},
   					phone_no: {
   						required: true
   					},
   					address_two: {
   						required: true
   					}
   					
   					
   				},
   				messages: {
   					email: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_AN_EMAIL_ADDRESS')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_AN_EMAIL_ADDRESS')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_AN_EMAIL_ADDRESS')}} @endif",
   						email: "@if (Lang::has(Session::get('lang_file').'.NOT_A_VALID_EMAIL_ADDRESS')!= '') {{  trans(Session::get('lang_file').'.NOT_A_VALID_EMAIL_ADDRESS')}}  @else {{ trans($OUR_LANGUAGE.'.NOT_A_VALID_EMAIL_ADDRESS')}} @endif"
   					},
   					store_name: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_YOUR_STORE_NAME')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_YOUR_STORE_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_YOUR_STORE_NAME')}} @endif"
   					},
   					store_name_french: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_YOUR_STORE_NAME')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_YOUR_STORE_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_YOUR_STORE_NAME')}} @endif "
   					},
   					store_pho: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_YOUR_PHONE_NO')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_YOUR_PHONE_NO')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_YOUR_PHONE_NO')}} @endif"
   					},
   					store_add_one: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS1_FIELD')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS1_FIELD')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDRESS1_FIELD')}} @endif "
   					},
   					store_add_one_french: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS1_FIELD')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS1_FIELD')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDRESS1_FIELD')}} @endif {{ Helper::lang_name() }}"
   					},
   					
   					store_add_two: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS2_FIELD')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS2_FIELD')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDRESS2_FIELD')}} @endif "
   					},
   					store_add_two_french: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS2_FIELD')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS2_FIELD')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDRESS2_FIELD')}} @endif  "
   					},
   					zip_code: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ZIPCODE')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_ZIPCODE')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_ZIPCODE')}} @endif"
   					},
   					meta_keyword: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_META_KEYWORDS')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_META_KEYWORDS')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_META_KEYWORDS')}} @endif   "
   					},
   					meta_keyword_french: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_META_KEYWORDS')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_META_KEYWORDS')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_META_KEYWORDS')}} @endif  "
   					},
   					meta_description: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_META_DESCRIPTION')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_META_DESCRIPTION')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_META_DESCRIPTION')}} @endif   "
   					},
   					meta_description_french: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_META_DESCRIPTION')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_META_DESCRIPTION')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_META_DESCRIPTION')}} @endif  "
   					},
   					website: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_WEBSITE')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_WEBSITE')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_WEBSITE')}} @endif"
   					},
   					location: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_LOCATION')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_LOCATION')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_LOCATION')}} @endif"
   					},
   					
   					commission: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_COMMISSION')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_COMMISSION')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_COMMISSION')}} @endif"
   					},
   					file: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_CHOOSE_YOUR_UPLOAD_FILE')!= '') {{  trans(Session::get('lang_file').'.PLEASE_CHOOSE_YOUR_UPLOAD_FILE')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_CHOOSE_YOUR_UPLOAD_FILE')}} @endif"
   					},
   					select_country: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_SELECT_COUNTRY')!= '') {{  trans(Session::get('lang_file').'.PLEASE_SELECT_COUNTRY')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_SELECT_COUNTRY')}} @endif"
   					},
   					select_city: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_SELECT_CITY')!= '') {{  trans(Session::get('lang_file').'.PLEASE_SELECT_CITY')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_SELECT_CITY')}} @endif"
   					},
   					
   					email_id: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_AN_EMAIL_ADDRESS')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_AN_EMAIL_ADDRESS')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_AN_EMAIL_ADDRESS')}} @endif",
   						email: "@if (Lang::has(Session::get('lang_file').'.NOT_A_VALID_EMAIL_ADDRESS')!= '') {{  trans(Session::get('lang_file').'.NOT_A_VALID_EMAIL_ADDRESS')}}  @else {{ trans($OUR_LANGUAGE.'.NOT_A_VALID_EMAIL_ADDRESS')}} @endif"
   					},
   					first_name: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_YOUR_FIRST_NAME')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_YOUR_FIRST_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_YOUR_FIRST_NAME')}} @endif"
   					},
   					select_mer_city: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_CITY')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_CITY')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_CITY')}} @endif",
   						
   					},
   					addreess_one: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS1_FIELD')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS1_FIELD')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDRESS1_FIELD')}} @endif"
   					},
   					payment_account: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_PAYMENT_ACCOUNT')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_PAYMENT_ACCOUNT')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_PAYMENT_ACCOUNT')}} @endif"
   					},
   					
   					last_name: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_LAST_NAME')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_LAST_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_LAST_NAME')}} @endif"
   					},
   					select_mer_country: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_SELECT_COUNTRY')!= '') {{  trans(Session::get('lang_file').'.PLEASE_SELECT_COUNTRY')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_SELECT_COUNTRY')}} @endif"
   					},
   					phone_no: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_PHONE_NO')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_PHONE_NO')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_PHONE_NO')}} @endif"
   					},
   					address_two: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS2_FIELD')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS2_FIELD')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDRESS2_FIELD')}} @endif"
   					}
   					
   				}
   			});
   		return Obj.valid();
   		break;
   
   		case 'testform2' :
   			Obj.validate({
   				rules: {
   					email_id: {
   						required: true,
   						email_id: true
   					},
   					first_name: {
   						required: true
   					},
   					select_mer_city: {
   						required: true,
   						
   					},
   					addreess_one: {
   						required: true
   					},
   					payment_account: {
   						required: true
   					},
   					
   					last_name: {
   						required: true
   					},
   					select_mer_country: {
   						required: true
   					},
   					phone_no: {
   						required: true
   					},
   					address_two: {
   						required: true
   					}
   				},
   				messages: {
   					email_id: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_AN_EMAIL_ADDRESS')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_AN_EMAIL_ADDRESS')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_AN_EMAIL_ADDRESS')}} @endif",
   						email: "@if (Lang::has(Session::get('lang_file').'.NOT_A_VALID_EMAIL_ADDRESS')!= '') {{  trans(Session::get('lang_file').'.NOT_A_VALID_EMAIL_ADDRESS')}}  @else {{ trans($OUR_LANGUAGE.'.NOT_A_VALID_EMAIL_ADDRESS')}} @endif"
   					},
   					first_name: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_YOUR_FIRST_NAME')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_YOUR_FIRST_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_YOUR_FIRST_NAME')}} @endif"
   					},
   					select_mer_city: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_CITY')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_CITY')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_CITY')}} @endif",
   						
   					},
   					addreess_one: {
   					 	required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS1_FIELD')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS1_FIELD')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDRESS1_FIELD')}} @endif"
   					},
   					payment_account: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_PAYMENT_ACCOUNT')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_PAYMENT_ACCOUNT')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_PAYMENT_ACCOUNT')}} @endif"
   					},
   					
   					last_name: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_LAST_NAME')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_LAST_NAME')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_LAST_NAME')}} @endif"
   					},
   					select_mer_country: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_SELECT_COUNTRY')!= '') {{  trans(Session::get('lang_file').'.PLEASE_SELECT_COUNTRY')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_SELECT_COUNTRY')}} @endif"
   					},
   					phone_no: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_PHONE_NO')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_PHONE_NO')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_PHONE_NO')}} @endif"
   					},
   					address_two: {
   						required: "@if (Lang::has(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS2_FIELD')!= '') {{  trans(Session::get('lang_file').'.PLEASE_ENTER_ADDRESS2_FIELD')}}  @else {{ trans($OUR_LANGUAGE.'.PLEASE_ENTER_ADDRESS2_FIELD')}} @endif"
   					}
   				}
   			});
   		return Obj.valid();
   		break;
   	}
   }
</script>
<script type="text/javascript">
   var _gaq = _gaq || [];
   _gaq.push(['_setAccount', 'UA-36251023-1']);
   _gaq.push(['_setDomainName', 'jqueryscript.net']);
   _gaq.push(['_trackPageview']);
   
   (function() {
     var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
   })();
   
</script>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=<?php echo $GOOGLE_KEY;?>'></script>
<script src="<?php echo url(''); ?>/themes/js/jquery-gmaps-latlon-picker.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
   var map;
   
   function initialize() {
   var myLatlng = new google.maps.LatLng(24.88892693527280,67.00149512695316);
       var mapOptions = {
   
          zoom: 20,
               center: myLatlng,
               disableDefaultUI: true,
               panControl: true,
               zoomControl: true,
               mapTypeControl: true,
               streetViewControl: true,
               mapTypeId: google.maps.MapTypeId.ROADMAP
   
       };
   
       map = new google.maps.Map(document.getElementById('map_canvas'),
           mapOptions);
     var marker = new google.maps.Marker({
               position: myLatlng,
               map: map,
   visible: false,
   draggable:true,    
           });	
   google.maps.event.addListener(marker, 'dragend', function(e) {
   		 
   var lat = this.getPosition().lat();
   	 var lng = this.getPosition().lng();
   $('#latitude').val(lat);
   $('#longtitude').val(lng);
   });
       var input = document.getElementById('pac-input');
       var autocomplete = new google.maps.places.Autocomplete(input);
       autocomplete.bindTo('bounds', map);
   
       google.maps.event.addListener(autocomplete, 'place_changed', function () {
   
           var place = autocomplete.getPlace();
   
           if (place.geometry.viewport) {
               map.fitBounds(place.geometry.viewport);
   var myLatlng = place.geometry.location;	
   //alert(place.geometry.location);			
   var marker = new google.maps.Marker({
                position: myLatlng,
    visible: true,
               map: map,
   draggable:true,   
           });	
   google.maps.event.addListener(marker, 'dragend', function(e) {
   		 
   var lat = this.getPosition().lat();
   	 var lng = this.getPosition().lng();
   $('#latitude').val(lat);
   $('#longtitude').val(lng);
   });
           } else {
               map.setCenter(place.geometry.location);	
   
               map.setZoom(17);
           }
       });
   
   
   
   }
   
   
   google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript">
   $.ajaxSetup({
   	headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
   });
</script>
<!-- Themes switcher section ============================================================================================= -->
</body>
</html>