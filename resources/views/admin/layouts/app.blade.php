<!doctype html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dashboard/assets/libs/flot/css/float-chart.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('dashboard/dist/css/style.min.css') }}" rel="stylesheet" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="preloader">
            <div class="lds-ripple">
              <div class="lds-pos"></div>
              <div class="lds-pos"></div>
            </div>
        </div>
     <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
        >
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        <div class="page-wrapper">
            @yield('content')
        @include('admin.layouts.footer')
        </div>
     </div>
    </div>
    <script src="{{ asset('dashboard/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('dashboard/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dashboard/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dashboard/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dashboard/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="{{ asset('dashboard/assets/libs/flot/excanvas.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/pages/chart/chart-page-init.js') }}"></script>
</body>
</html>
