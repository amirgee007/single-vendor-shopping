<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8"/>
    <title>{{ $SITENAME }}
        | @if (Lang::has(Session::get('admin_lang_file').'.BACK_ADD_PRODUCTS')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_ADD_PRODUCTS')}}  @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_ADD_PRODUCTS')}} @endif </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/main.css"/>
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/theme.css"/>
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/MoneAdmin.css"/>
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/multi-select.css"/>
    @php
        $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
    <link rel="shortcut icon" href="{{ url('')}}/public/assets/favicon/{{ $fav->imgs_name }}">
@endif
<!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/Font-Awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css"/>
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/Markdown.Editor.hack.css"/>
    <link rel="stylesheet" href="{{ url('') }}/public/assets/plugins/CLEditor1_4_3/jquery.cleditor.css"/>
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/jquery.cleditor-hack.css"/>
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/bootstrap-wysihtml5-hack.css"/>
    <style>
        ul.wysihtml5-toolbar > li {
            position: relative;
        }
    </style>
    <!--END GLOBAL STYLES -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class=" padTop53">

<!-- MAIN WRAPPER -->
<div id="wrap">

    <!-- HEADER SECTION -->
{!! $adminheader !!}
<!-- END HEADER SECTION -->
    <!-- MENU SECTION -->
    {!! $adminleftmenus !!}
    <div id="content">
        <div class="inner">
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <div class="box dark">
                        <header>
                            <div class="icons"><i class="icon-edit"></i></div>
                            <h5>Products Bulk Upload</h5>


                        </header>

                        @if (Session::has('message'))
                            @foreach(Session::get('message') as $val)

                                @php
                                    echo '<ul>';
                                    echo '<li style="color:red;">'.$val.'</li>';
                                    echo '</ul>';
                                @endphp
                            @endforeach
                        @endif
                        @if (Session::has('success_message'))

                            @foreach(Session::get('success_message') as $val)
                                <?php
                                echo '<ul>';
                                echo '<li style="color:green;">' . $val . '</li>';
                                echo '</ul>';

                                ?>
                            @endforeach
                        @endif
                        @if (Session::has('zip_error_message'))
                            <?php
                            echo '<ul>';
                            echo '<li style="color:red;">' . Session::get('zip_error_message') . '</li>';
                            echo '</ul>';
                            ?>
                        @endif
                        @if (Session::has('zip_success_message'))
                            <?php
                            echo '<ul>';
                            echo '<li style="color:green;">' . Session::get('zip_success_message') . '</li>';
                            echo '</ul>';
                            ?>
                        @endif


                        <form method="post" action="{{url('/product_image_bulk_upload_submit')}}"
                              enctype="multipart/form-data" style="padding: 10px;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                {{ Form::label('','Please Select Zip File',['for' =>'zip_file']) }}

                                <input type="file" name="zip_file" required
                                       style="border: 1px solid #ccc;padding: 5px;"/>
                            </div>

                            <input type="submit" class="btn btn-success" name="btn_zip" value="Zip Upload"/>
                        </form>

                        <form action="{{url('/product_bulk_upload_submit')}}" method="post"
                              enctype="multipart/form-data" style="padding: 10px;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="upload-file">Upload</label>
                                <input type="file" name="upload-file" class="" style="    border: 1px solid #ccc;
    padding: 5px;">
                            </div>
                            <input class="btn btn-success" type="submit" value="Upload File" name="submit">
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 sample-doc">
                    <h4>Sample Document</h4>
                    <a href="{{ url('') }}/public/assets/sample-csv/product-test.csv">Download</a>
                    <ul>
                        <li>Use sample document for product bulk upload</li>
                        <li>Upload only .CSV format file</li>
                        <li>Don't changes first row of the sample Document</li>
                        <li>Enter correct Merchant & Store Names</li>
                        <?php /**   <li>Enter Video this format: https://www.youtube.com/watch?v=6D7XLh7jTc0
                        </li> **/ ?>
                        <li>Follow this steps to upload Images:
                            <ul>
                                <li>Your Images size must be 800 x 800 px</li>
                                <li>Images accept only .jpeg & .png format</li>

                                <li style="word-break:break-all;">Format should be like: <b>/zip_file_name/1.jpg(name of
                                        image in ZIP)</b></li>
                                <li>Don't Upload images from Local computer like: C:\Users\Public\Pictures\Sample
                                    Pictures\test.png
                                </li>
                            </ul>
                        </li>

                        <li>Enter correct top category, main category, sub category, second sub category names in csv
                            file
                        </li>

                        <?php /**  <li>Enter Correct Country, State, District, City, Location Names</li> **/?>
                        <li>Upload below 500 rows.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


</div>


<!-- FOOTER -->
{!! $adminfooter !!}
<!--END FOOTER -->

</body>

</html>