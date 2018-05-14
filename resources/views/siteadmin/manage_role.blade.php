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
    <meta charset="UTF-8"/>
    <title><?php echo $SITENAME; ?>
        | <?php if (Lang::has(Session::get('admin_lang_file') . '.BACK_MANAGE_ROLE') != '') {
            echo trans(Session::get('admin_lang_file') . '.BACK_MANAGE_ROLE');
        } else {
            echo trans($ADMIN_OUR_LANGUAGE . '.BACK_MANAGE_ROLE');
        } ?>                 </title>
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
    <link rel="stylesheet" href="{{ url('')}}/public/assets/plugins/Font-Awesome/css/font-awesome.css"/>
    @php
        $favi = DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get(); @endphp
    @if(count($favi)>0)  @foreach($favi as $fav) @endforeach
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/favicon/<?php echo $fav->imgs_name; ?>">
    @endif
    <link href="{{ url('') }}/public/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet"/>
    <!--END GLOBAL STYLES -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!--<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">-->
    <link href="{{ url('')}}/public/assets/css/jquery-ui.css" rel="stylesheet">

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="padTop53 ">
<!-- MAIN WRAPPER -->
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
                    <li class="">
                        <a>@if (Lang::has(Session::get('admin_lang_file').'.BACK_HOME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_HOME') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_HOME') }} @endif</a>
                    </li>
                    <li class="active">
                        <a> @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_ROLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_ROLE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_ROLE') }} @endif                    </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="box dark">
                    <header>
                        <div class="icons"><i class="icon-edit"></i></div>
                        <h5>  @if (Lang::has(Session::get('admin_lang_file').'.BACK_MANAGE_ROLE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_MANAGE_ROLE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_MANAGE_ROLE') }} @endif                    </h5>
                    </header>


                    @if (Session::has('updated_result'))
                        <div class="alert alert-success alert-dismissable">{!! session('updated_result') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        </div>
                    @endif
                    @if (Session::has('insert_result'))
                        <div class="alert alert-success alert-dismissable">{!! Session::get('insert_result') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        </div>
                    @endif
                    @if (Session::has('delete_result'))
                        <div class="alert alert-success alert-dismissable">{!! Session::get('delete_result') !!}
                            <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
                        </div>
                    @endif

                    <div style="display: none;" class="la-alert rec-update alert-success alert-dismissable">Record
                        Updated Successfully
                        <button type="button" class="close closeAlert" aria-hidden="true">×</button>
                    </div>


                    <div id="div-1" class="accordion-body collapse in body">
                        <div class="table-responsive panel_marg_clr ppd">
                            <table aria-describedby="dataTables-example_info"
                                   class="table table-striped table-bordered table-hover dataTable no-footer"
                                   id="dataTables-example">
                                <thead>
                                <tr role="row">

                                    <th aria-label="Send Mail: activate to sort column ascending" style="width: 64px;"
                                        colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0"
                                        class="sorting">S.No
                                    </th>

                                    <th aria-label="Product Name: activate to sort column ascending"
                                        style="width: 69px;" colspan="1" rowspan="1" aria-controls="dataTables-example"
                                        tabindex="0"
                                        class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_NAME')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_NAME') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_NAME') }} @endif</th>

                                    <th aria-label="Product Name: activate to sort column ascending"
                                        style="width: 69px;" colspan="1" rowspan="1" aria-controls="dataTables-example"
                                        tabindex="0"
                                        class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_SLUG')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_SLUG') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_SLUG') }} @endif</th>

                                    <th aria-label=" Product Image : activate to sort column ascending"
                                        style="width: 78px;" colspan="1" rowspan="1" aria-controls="dataTables-example"
                                        tabindex="0"
                                        class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_EDIT')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_EDIT') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_EDIT') }} @endif</th>

                                    <th aria-label="Actions: activate to sort column ascending" style="width: 73px;"
                                        colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0"
                                        class="sorting">@if (Lang::has(Session::get('admin_lang_file').'.BACK_DELETE')!= '') {{  trans(Session::get('admin_lang_file').'.BACK_DELETE') }} @else {{ trans($ADMIN_OUR_LANGUAGE.'.BACK_DELETE') }} @endif</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($roles as $row)
                                <tr class="gradeA odd">
                                    <td class="sorting_1">{{$loop->iteration }}</td>
                                    <td class="">{{$row->name}}</td>
                                    <td class="">{{$row->slug}}</td>
                                    <td class="center">
                                        <a href="{{ url('edit_role/'.$row->role_id) }}" data-tooltip="Edit" > <i class="icon icon-edit icon-2x" style="margin-left:15px;"></i></a></td>
                                    <td>
                                        <a href="{{ url('delete_role/'.$row->role_id) }}" onclick="return confirm('Do you want to delete the record?')" data-tooltip="Delete"> <i class="icon icon-trash icon-2x" style="margin-left:15px;"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END PAGE CONTENT -->
<!--END MAIN WRAPPER -->
<!-- FOOTER -->
{!! $adminfooter !!}
<!--END FOOTER -->
<!-- GLOBAL SCRIPTS -->
<script src="{{ url('') }}/public/assets/plugins/jquery-2.0.3.min.js"></script>
<script src="{{ url('') }}/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('') }}/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<!-- END GLOBAL SCRIPTS -->

<!--<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->
<script src="{{url('')}}/public/assets/js/jquery-ui.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
</script>

<!-- PAGE LEVEL SCRIPTS -->
<script src="<?php echo url('')?>/public/assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo url('')?>/public/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {


        $('#dataTables-example').dataTable();
    });

    $(document).ready(function () {
        setTimeout(function () {
            $('select[name="dataTables-example_length"]').on('change', function () {

                var k = $(this).val();

                $('#sele').val(k)
            });
        }, 5);
    });

</script>

</body>
<!-- END BODY -->
</html>