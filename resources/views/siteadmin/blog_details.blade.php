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
            <title>{{ $SITENAME }} | Blog details</title>
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
            <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css" />
            <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css" />
            <?php 
               $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); ?> @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
            <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
            @endif    
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
                              <li class="active"><a>Blog details</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="box dark">
                              <header>
                                 <div class="icons"><i class="icon-edit"></i></div>
                                 <h5>blog details</h5>
                              </header>
                              @foreach($blog_list as $blog)
                              @endforeach
                              @php 
                              $title      = $blog->blog_title;
                              //$title_fr     = $blog->blog_title_fr;
                              $description    = $blog->blog_desc;
                              // $description_fr = $blog->blog_desc_fr;
                              $category_get   = $blog->blog_catid;
                              $file_get     = $blog->blog_image;
                              $blog_title   = $blog->blog_metatitle;
                              // $blog_title_fr  = $blog->blog_metatitle_fr;
                              $metadescription= $blog->blog_metadesc;
                              $metadescription_fr = $blog->blog_metadesc_fr;
                              $metakeyword  = $blog->blog_metakey;
                              // $metakeyword_fr = $blog->blog_metakey_fr;
                              $blog_tags    = $blog->blog_tags;
                              $blog_comments    = $blog->blog_comments;
                              $blog_type  = $blog->blog_type;
                              $blog_status     = $blog->blog_status;
                              $blog_created_date  = $blog->blog_created_date;
                              @endphp
                              <div class="row">
                                 <div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                                    {{ Form::open() }}
                                    <div class="panel panel-default">
                                       <div class="panel-heading">
                                          Deal details
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Blog Title<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                {{ $title }}
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Category Type<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                {{ $blog->mc_name }}
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Blog Description<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                {{ $description }}
                                             </div>
                                          </div>
                                       </div>
                                       @if(!empty($get_active_lang))  
                                       @foreach($get_active_lang as $get_lang) 
                                       <?php 
                                          $get_lang_name = $get_lang->lang_name;
                                          $description_dynamic = 'blog_desc_'.$get_lang->lang_code; 
                                          $descrip_dynamic = $blog->$description_dynamic;  ?>
                                       @if($descrip_dynamic !='')
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Blog Description({{$get_lang_name}})<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                {{ $descrip_dynamic }}
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                       @endif 
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Blog Metatitle</label>
                                             <div class="col-lg-4">
                                                @if($blog_title!="") {{ $blog_title  }}  @else {{ "-"  }} @endif
                                             </div>
                                          </div>
                                       </div>
                                       @if(!empty($get_active_lang))  
                                       @foreach($get_active_lang as $get_lang) 
                                       <?php  $get_lang_name = $get_lang->lang_name;
                                          $blog_tit_dynamic = 'blog_metatitle_'.$get_lang->lang_code; 
                                          $blog_title_dynamic = $blog->$blog_tit_dynamic;   ?>
                                       @if($blog_title_dynamic !='')
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Blog Metatitle({{ $get_lang_name }})</label>
                                             <div class="col-lg-4">
                                                @if($blog_title_dynamic!="") {{ $blog_title_dynamic  }} @else {{ "-" }} @endif
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                       @endif 
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Blog MetaDescription</label>
                                             <div class="col-lg-4">
                                                @if($metadescription!="") {{ $metadescription  }} @else {{ "-" }} @endif
                                             </div>
                                          </div>
                                       </div>
                                       @if(!empty($get_active_lang)) 
                                       @foreach($get_active_lang as $get_lang) 
                                       @php
                                       $get_lang_name = $get_lang->lang_name;
                                       $blog_meta_dynamic = 'blog_metadesc_'.$get_lang->lang_code; 
                                       $metadescription_dynamic = $blog->$blog_meta_dynamic;  
                                       @endphp
                                       @if($metadescription_dynamic !='')
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Blog MetaDescription({{ $get_lang_name }})</label>
                                             <div class="col-lg-4">
                                                @if($metadescription_dynamic!="") {{ $metadescription_dynamic }} @else {{ "-"  }} @endif
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                       @endif 
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Blog Meta keyword</label>
                                             <div class="col-lg-4">
                                                @if($metakeyword!="") {{  $metakeyword }} @else {{ "-" }} @endif
                                             </div>
                                          </div>
                                       </div>
                                       @if(!empty($get_active_lang))  
                                       @foreach($get_active_lang as $get_lang) 
                                       @php
                                       $get_lang_name = $get_lang->lang_name;
                                       $blog_metakey_dynamic = 'blog_metakey_'.$get_lang->lang_code; 
                                       $metakeyword_dynamic = $blog->$blog_metakey_dynamic;  @endphp
                                       @if($metakeyword_dynamic !='')
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Blog Meta keyword({{ $get_lang_name}})</label>
                                             <div class="col-lg-4">
                                                @if($metakeyword_dynamic!="") {{ $metakeyword_dynamic }} @else {{ "-"  }} @endif
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                       @endif   
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> Blog Tags<span class="text-sub">*</span></label>
                                             <div class="col-lg-8">
                                                {{ $blog_tags }}
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1">Blog Image<span class="text-sub">*</span></label>
                                             <div class="col-lg-4">
                                                <?php $pro_img = $file_get;
                                                   $prod_path = url('').'/public/assets/default_image/No_image_blog.png'; ?>
                                                @if($pro_img != '' )  {{--  blog image is not null --}}
                                                <?php   $img_data = "public/assets/blogimage/".$pro_img; ?>
                                                @if(file_exists($img_data))  {{--  blog image is exist in folder --}}
                                                <?php    $prod_path = url('').'/public/assets/blogimage/'.$pro_img; ?>
                                                @else
                                                @if(isset($DynamicNoImage['blog'])) {{-- no_image  for blog is set in database --}}
                                                <?php          
                                                   $dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['blog']; ?>
                                                @if($DynamicNoImage['blog'] !='' && file_exists($dyanamicNoImg_path)) {{-- no_image  for blog is set in file --}}
                                                <?php $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['blog']; ?>
                                                @endif
                                                @endif
                                                @endif
                                                @else
                                                @if(isset($DynamicNoImage['blog'])) 
                                                <?php $dyanamicNoImg_path= "public/assets/noimage/".$DynamicNoImage['blog']; ?>
                                                @if($DynamicNoImage['blog'] !='' && file_exists($dyanamicNoImg_path))
                                                <?php
                                                   $prod_path = url('').'/public/assets/noimage/'.$DynamicNoImage['blog']; ?>
                                                @endif
                                                @endif      
                                                @endif           
                                                <img style="height:40px;" src="{{ $prod_path }}">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> Comments<span class="text-sub">*</span></label>
                                             <div class="col-lg-8">
                                                @if($blog_comments == 0) {{ 'Not Allow' }} @else {{ 'Allow' }} @endif
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> Status <span class="text-sub">*</span></label>
                                             <div class="col-lg-8">
                                                @if($blog_type == 1) {{ 'Public' }} @else {{ 'Draft' }} @endif
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label class="control-label col-lg-2" for="text1"> Created Date <span class="text-sub">*</span></label>
                                             <div class="col-lg-8">
                                                {{ $blog_created_date }}
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-lg-10" for="pass1"><span class="text-sub"></span></label>
                                       <div class="col-lg-2">
                                          <a style="color:#fff" href="@if($blog_type == 1) {{ url('manage_publish_blog') }} @else {{ url('manage_draft_blog') }} @endif" class="btn btn-warning btn-sm btn-grad">Back</a>
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