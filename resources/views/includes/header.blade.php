
<?php //print_r(session::all());  
?>
<style type="text/css">
    #ac-wrapper {
position: fixed;
top: 0px;
left: 0;
width: 100%;
height: 100%;
background: rgba(255,255,255,.6);
z-index: 1001;
}
#popup{
width: 555px;
height: 375px;
background: #FFFFFF;
border: 5px solid #000;
border-radius: 25px;
-moz-border-radius: 25px;
-webkit-border-radius: 25px;
box-shadow: #64686e 0px 0px 3px 3px;
-moz-box-shadow: #64686e 0px 0px 3px 3px;
-webkit-box-shadow: #64686e 0px 0px 3px 3px;
position: relative;
top: 150px; left: 375px;
}
.popup-close input[type="submit"]
{
    padding: 10px 30px;
    font-size: 16px;
    border:none;

}
.popup-close{
    text-align: center;
    margin: auto;
}
.product-contact-form {
    background: #fff;
    box-shadow: 0 2px 16px #929191;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.product-contact-form h3 {
    padding-top: 15px;
    text-align: center;
}
.product-contact-form .panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 20px;
    color:#000000;
}
.product-contact-form .panel-body {
    padding: 15px;
    margin-bottom: 0px;
}
.product-contact-form .form-group {
    margin-bottom: 20px;
}
.product-contact-form .input-sm {
       height: 35px;
    font-size: 14px;
    border-radius: 0px;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(214, 214, 214);
    border-image: initial;
    background: rgb(249, 249, 249);
     padding: 5px 10px;
     box-sizing: border-box;
}
.product-contact-form. input-sm {
    height: 30px;
    padding: 5px 10px;
    font-size: 14px;
    line-height: 1.5;
    border-radius: 3px;
}
.product-contact-form .form-control {
    display: block;
    width: 100%;
 
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.product-contact-form .validation {
    color: #f44336;
    padding-bottom: 3px;
    position: absolute;
    z-index: 999999;
    top: 53px;
}
.product-contact-form .col-md-6, .product-contact-form.col-sm-6, .product-contact-form.col-xs-12, .product-contact-form .col-md-3
{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: border-box;
}
.product-contact-form .row {
    margin-right: -15px;
    margin-left: -15px;
}
.product-contact-form .form-group .btn {
    border-radius: 0;
}
.product-contact-form .form-group .btn-info {
    border: none;
    font-family: 'Sansus-Webissimo';
    font-size: 20px;
    padding: 22px 0;
    background:#13bf7a;
}
.product-contact-form form
{
    margin-bottom: 0px;
}
@media (min-width: 992px){
.product-contact-form .col-md-6 {
    width: 50%;
}
.product-contact-form .col-md-3 {
    width: 25%;
}
}
@media (min-width: 992px)
{

    .product-contact-form .col-md-6, .product-contact-form .col-md-3
    {
        float: left;
    }
}
@media (min-width: 768px)
{
  .product-contact-form .col-md-6{
    width: 50%;
    float: left;
}}
@media (max-width:767px)
{
.col-xs-12 {
    width: 100%;
    float: left;
}
.product-contact-form #email
{
margin-left: 0px;
}
}

@media screen and(min-width:992px) and (max-width:1150px)
{
.product-contact-form .form-group .btn-info
{
    font-size: 16px;
}
}
</style>
@if(isset($err_msge))
    @if($err_msge!='')
        <div class="alert-box success" style="position: absolute;left: 50%; background: #d82672; color: #ffffff; padding: 5px 30px; border-radius: 3px;top: 5px;" > {{ $err_msge }} </div>
    @endif
@endif
<div class="alert-box success" id="success" style="display:none; ">@if (Lang::has(Session::get('lang_file').'.SUCCESSFULLY_SUBSCRIBED')!= '') {{  trans(Session::get('lang_file').'.SUCCESSFULLY_SUBSCRIBED') }} @else {{ trans($OUR_LANGUAGE.'.SUCCESSFULLY_SUBSCRIBED') }} @endif!!!</div>
<div id="logoArea" class="navbar para-nav">
    <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
    </a>
    
    <div class="container navbarContainer">
      <a class="brand" href="{{ url('index') }}"><img src="{{ $SITE_LOGO }}" alt="@if (Lang::has(Session::get('lang_file').'.LOGO')!= '') {{  trans(Session::get('lang_file').'.LOGO') }} @else {{ trans($OUR_LANGUAGE.'.LOGO') }} @endif"/></a>
      
      
        <div class="mob-cart cardItem">
        
        <img src="{{ url('') }}/themes/images/cart.png"> <span class="text-info"><a href="{{ url('cart')}}" >
        
        <strong>        
        @if(isset($_SESSION['cart']))
             <?php   
                $item_count_header1 = count($_SESSION['cart']); 
                ?>
        @else 
         <?php 
            $item_count_header1 = 0; 
            ?>
            @endif          
            @if(isset($_SESSION['deal_cart']))
                <?php    
                    $item_count_header2 = count($_SESSION['deal_cart']); 
            ?>
            @else 
             <?php 
                $item_count_header2 = 0; 
                ?>
                @endif       
               <?php   $item_count_header = $item_count_header1 + $item_count_header2;   ?>
            @if($item_count_header != 0) 
             <?php 
             echo $item_count_header; 
             ?>
             @else 
              <?php 
                echo 0; 
                    
                ?>
                @endif        </strong>  {{ (Lang::has(Session::get('lang_file').'.ITEMS_IN_YOUR_CART')!= '') ?  trans(Session::get('lang_file').'.ITEMS_IN_YOUR_CART') : trans($OUR_LANGUAGE.'.ITEMS_IN_YOUR_CART') }}</a></span>            
        </div>

        <form action="{!!action('HomeController@searching')!!}" class="form-inline navbar-search searBoxStyle">         
            
                        <!--<select id="searchbox" name="q" placeholder="Search products or categories..." class="form-control"></select>-->
       <?php //echo $search_text;?>
             <select class="srchTxt" name="category" class="form-control">
                <?php 
                $header_category = DB::table('nm_maincategory')->where('mc_status', '=', 1)->get(); 
                ?>
                @if(count($header_category)>0)
                <option value="0">{{ (Lang::has(Session::get('lang_file').'.ALL_CATEGORIES')!= '') ?  trans(Session::get('lang_file').'.ALL_CATEGORIES') : trans($OUR_LANGUAGE.'.ALL_CATEGORIES')}}</option>
                <?php 
               // if(count($header_category)>0){ ?>
                    @foreach ($header_category as $main_cat) 
                        <?php
                        $main_cat_result = DB::table('nm_secmaincategory')->where('smc_status', '=', 1)->where('smc_mc_id', '=', $main_cat->mc_id)->get();
                            ?>
                        @if ($main_cat_result) 
                            <?php $sub_main_category[$main_cat->mc_id] = $main_cat_result; ?>
                        @else 
                          <?php   $sub_main_category[$main_cat->mc_id] = Array(); ?>
                        @endif
                    @endforeach
               @else  <option value="0">{{ (Lang::has(Session::get('lang_file').'.NO_CATEGORY_FOUND')!= '') ?  trans(Session::get('lang_file').'.NO_CATEGORY_FOUND') : trans($OUR_LANGUAGE.'.NO_CATEGORY_FOUND') }} </option>  @endif
                
                @foreach($header_category as $category_list)  
                        @if(count($sub_main_category[$category_list->mc_id])> 0)
                
                <option value="<?php echo base64_encode($category_list->mc_id); ?>" <?php if(isset($cid)){if($category_list->mc_id == $cid){ echo "selected";} }?>>
                    <?php 
                if((Session::get('lang_code'))== '' || (Session::get('lang_code'))== 'en') { 
                        $mc_name = 'mc_name';
                }else {  $mc_name = 'mc_name_'.Session::get('lang_code'); }
                    echo $category_list->$mc_name; ?></option>
                    @endif
                      @endforeach 
            </select>


           <!--<div id="display" style="display: none; position:absolute; top:40px;width:12% !important; z-index:10; background:#EEEEEE;color:black;filter:alpha(opacity=80); border:1px solid #ddd; border-radius:6px; max-height:150px; overflow:scroll; line-height:25px; padding:10px "
            class=" "> </div>-->
			
			
            <span class="search-inner">
            <input type="text" id="searchbox" value="<?php if(isset($search_text)){ echo $search_text; }?>" placeholder="{{ (Lang::has(Session::get('lang_file').'.SEARCH_PRODUCT_NAME')!= '') ?  trans(Session::get('lang_file').'.SEARCH_PRODUCT_NAME') : trans($OUR_LANGUAGE.'.SEARCH_PRODUCT_NAME') }}" autocomplete="on" style="font-family:lato !important;z-index:999999;border-radius: 0px; float: left;" name="q" class="form-control"/>

            <button name="submit" class="pro-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button></span>
        {{ Form::close() }}
         
        <br> </div>
        
        <div class="row menu-bgg customContainer">
        <div class="container pageMenuContainer" id="navcontain">
    <ul id="topMenu" class="nav pull-right" style="width:100%">
        <li <?php if(Route::getCurrentRoute()->uri() == 'index' || Route::getCurrentRoute()->uri() == '/') { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="{{ url('index')}}">{{ (Lang::has(Session::get('lang_file').'.HOME')!= '')  ?  trans(Session::get('lang_file').'.HOME'): trans($OUR_LANGUAGE.'.HOME')}}</a>
        </li>
        <li <?php if(Route::getCurrentRoute()->uri() == 'products') { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="{{ url('products')}}">{{ (Lang::has(Session::get('lang_file').'.PRODUCTS')!= '') ?  trans(Session::get('lang_file').'.PRODUCTS'): trans($OUR_LANGUAGE.'.PRODUCTS')}}</a>
        </li>
        <li <?php if(Route::getCurrentRoute()->uri() == 'deals') { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="{{ url('deals')}}">{{ (Lang::has(Session::get('lang_file').'.DEALS')!= '')  ?  trans(Session::get('lang_file').'.DEALS'): trans($OUR_LANGUAGE.'.DEALS')}}</a>
        </li>
        <?php /*
        <li <?php if(Route::getCurrentRoute()->uri() == 'services') { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="<?php echo url('service_types'); ?>">Services</a>
        </li>*/?>
        <li <?php if(Route::getCurrentRoute()->uri() == 'sold') { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="{{ url('sold') }}">{{ (Lang::has(Session::get('lang_file').'.SOLD_OUT')!= '')  ?  trans(Session::get('lang_file').'.SOLD_OUT'): trans($OUR_LANGUAGE.'.SOLD_OUT')}}</a>
        </li>
       
        <li <?php if(Route::getCurrentRoute()->uri() == 'contactus' ) { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="{{ url('contactus')}}">{{ (Lang::has(Session::get('lang_file').'.CONTACT_US')!= '') ?  trans(Session::get('lang_file').'.CONTACT_US'): trans($OUR_LANGUAGE.'.CONTACT_US') }}</a>
        </li>
    </ul>
    </div>
    </div>
</div>


<div id="PopUp" style="display: none;">
 <div id="ac-wrapper">
         <div class="product-contact-form"  style="width: 40%; margin: 10px auto 0px auto; padding-bottom: 10px;">
                            <div class=panel-heading>
                                <h3 class=panel-title>CONTACT US</h3>
                            </div>
                            <div class=panel-body>
                                {{ Form::open(['role' => 'form','method' => 'POST'])}}
                               
                                    <div class=row>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class=form-group>
                                                {{ Form::text('first_name','',['id' => 'name', 'class' => 'form-control input-sm', 'placeholder' => 'Name *' ,'required'])}}
                                      
                                           <span id="nameval" class="validation"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class=form-group>
                                                {{ Form::email('email','',['id' => 'email', 'class' => 'form-control input-sm', 'placeholder' => 'Email *' ,'required'])}}
                                        
                                              <span id="eamilval" class="validation"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=row>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class=form-group>
                                     {{ Form::text('phonenumber','',['id' => 'phone', 'class' => 'form-control input-sm', 'placeholder' => 'Phone Number' ,'required'])}}           
 

                                <span id="Phoneval" class="validation"></span>

                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class=form-group>
                                           <select id=product class="selectpicker show-menu-arrow form-control input-sm" data-max-options=3>
                                                   <option>Multivendor Shopping Cart</option>
                                                   
                                                       
                                                       
                                                      
                                                  
                                                </select>
 <span id="productval" class="validation"></span>
                                            </div>
                                        </div>


                                    </div>

                                    <div class=form-group>
                                        {{ Form::textarea('message','',['id' => 'comment', 'class' => 'form-control', 'placeholder' => 'Share with us any information that might help us to respond to your request...' ,'required','rows' => '5'])}}

                      
                         <span id="commentval" class="validation_msg"></span>
                                    </div>
                                    <!--<div class="code"><label>Enter the code Below</label>
                                     <input type="text" id="txtCaptcha"/></div> -->
                                    <div class=row>
                                   <!-- <div class="col-xs-6 col-sm-6 col-md-6">
                                          <div class="form-group">
                                                
            <input type="text" id="txtInput" class="form-control input-sm"/>    
                                         </div>
                                        </div>-->
                               <div class="col-md-3"></div><div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class=form-group>

                                                <input type=button id="Contact" value="CONTACT US TODAY" class="btn btn-info btn-block business-green" onclick="ValidCaptcha()">
                                            </div>
                                        </div>
                                         <div class="col-md-3"></div>
                                    </div>

                            

                                {{ Form::close() }}
                            </div>
                         <div class="popup-close">
                            {{ Form::submit('Close',['id' => 'PopUpClose', 'class' => 'btn-danger'])}}
                         
                         </div>
                        </div>
                            </div>
                            </div>




<script>
window.onload=function(){
    document.getElementById('PopUp').style.display = 'none';

    setTimeout(function(){
    document.getElementById('PopUp').style.display = 'none';
    },5000);
};

$(document).on("click","#PopUpClose",function(){
    $("#PopUp").css("display","none");
});
</script>

