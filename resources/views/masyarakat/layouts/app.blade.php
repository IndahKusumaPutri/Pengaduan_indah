<!DOCTYPE html>
<!-- <html lang="en"> -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengaduan Masyarakat</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo 1.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container-scroller">
        @include('sweetalert::alert')
        <!-- partial:partials/_navbar.html -->
        @include('masyarakat.layouts.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
        <!-- partial:partials/_footer.html -->
        @include('masyarakat.layouts.footer')
        <!-- partial -->

        <!-- plugins:js -->
        <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('js/dataTables.select.min.js') }}"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('js/off-canvas.js') }}"></script>
        <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('js/template.js') }}"></script>
        <script src="{{ asset('js/settings.js') }}"></script>
        <script src="{{ asset('js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
        <!-- End custom js for this page-->
        <script>
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        </script>
</body>

</html>