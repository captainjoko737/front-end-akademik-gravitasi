<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/public/assets/images/logo_akbid.png') }}">
    <title>{{ isset($title) ? $title : 'AKADEMIK FKIP' }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/public/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- page css -->
    <link href="{{ asset('/public/css/pages/login-register-lock.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('/public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/public/css/pages/card-page.css') }}" rel="stylesheet">
    
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('/public/css/colors/default-dark.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('/public/css/pages/file-upload.css') }}" rel="stylesheet">
    <link href="{{ asset('/public/assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/public/assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/public/assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="{{ asset('/public/assets/plugins/c3-master/c3.min.css') }}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
<link href="{{ asset('/public/assets/plugins/toast-master/css/jquery.toast.css') }}" rel="stylesheet">

<link href="{{ asset('/public/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">

</head>


<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">AKADEMI KEBIDANAN</p>
        </div>
    </div>

    @if (session('user'))
    
        @include ('layouts.header')

        @include ('layouts.sidebar')
        <div class="page-wrapper">
        <div class="container-fluid aside">
    
            <div class="row page-titles">
             
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item font-weight-bold">{{ $title }}</li> -->
                    </ol>
                </div>
           
    @else
        
    @endif

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    
        @yield('content')

        <!-- <footer class="footer">  </footer> -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('/public/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('/public/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/public/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('/public/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('/public/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('/public/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('/public/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="{{ asset('/public/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--morris JavaScript -->
    <script src="{{ asset('/public/assets/plugins/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('/public/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!--c3 JavaScript -->
    <script src="{{ asset('/public/assets/plugins/d3/d3.min.js') }}"></script>
    <script src="{{ asset('/public/assets/plugins/c3-master/c3.min.js') }}"></script>
    <!-- Popup message jquery -->
    <script src="{{ asset('/public/assets/plugins/toast-master/js/jquery.toast.js') }}"></script>
    <!-- Chart JS -->
    
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('/public/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>

    <script src="{{ asset('/public/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/public/js/jasny-bootstrap.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <script src="{{ asset('/public/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/public/assets/plugins/datatables/buttons.flash.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <!-- // <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="{{ asset('/public/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('/public/assets/plugins/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/public/assets/plugins/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <!--Custom JavaScript -->
    
    <script type="text/javascript">

        $(document).ready(function() {
            $('table.display').DataTable();
        } );

        $(".select2").select2();
        $('.selectpicker').selectpicker();

        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "columns": [
                        { "type": "string" },
                        { "type": "date" },
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print'
            ],
            order: [ [0, 'asc'] ]
        });

        $('#example-dosen').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            order: [ [0, 'desc'] ]
        });

        $('#example-prodi').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            order: [ [0, 'desc'] ]
        });

        $('#example-krs').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            order: [ [0, 'asc'] ]
        });

        
        
    </script>
    @yield('js')
</body>
</html>
