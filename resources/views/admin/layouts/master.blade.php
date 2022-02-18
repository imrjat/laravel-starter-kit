<!DOCTYPE html>
{{-- <html lang="en" oncontextmenu="return false"> --}}
<html lang="en">



@include('admin/layouts/header')


{{--

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> --}}

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

        <div class="wrapper">

            @include('admin/layouts/preloader')


            <!-- Navbar -->
            @include('admin/layouts/topbar')

            <!-- /.navbar -->

            <!-- Sidebar -->
            @include('admin/layouts/sidebar')
            <!-- /.Sidebar -->

            {{-- @include('admin/dashboard') --}}

            @yield('content')

            {{--
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar --> --}}

            <!-- Main Footer -->
            @include('admin/layouts/footer')
            @include('sweetalert::alert')

        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.js') }}"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

        <!-- InputMask -->
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('plugins/datepicker/datepicker.js') }}"></script>

        <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

{{-- 
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script> --}}

        <script src="{{ asset('js/custom.js') }}"></script>

        @yield('scripts')
        <script>
            $(function() {
            $('.select2').select2()
            datepicker();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            // $('.datepicker').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        })

        @if (\Session::has('success') || \Session::has('error'))
        
        
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove();
            });
            }, 10000);
        @endif

        function datepicker(params) {

            $('[data-mask]').inputmask()

            $('.datepicker').datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
            }).on('changeDate', function(ev) {
                $(this).datepicker('hide');
            });


        }

        </script>
    </body>

</html>