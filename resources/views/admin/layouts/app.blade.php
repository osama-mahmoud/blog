<!doctype html>
<html dir="ltr" lang="en">
<head>
    <style>
        .router-link-exact-active{
          background-color: #27a9e3;
          color: white;
        }
        </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AdminPanel</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('dashboard/assets/images/favicon.png') }}"
    />
    <!-- Custom CSS -->
    <link href="{{ asset('dashboard/assets/libs/flot/css/float-chart.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('dashboard/dist/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/assets/libs/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css') }}" rel="stylesheet" /> --}}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
      data-boxed-layout="full">
            <global-admin></global-admin>
      </div>
     </div>
    <!-- Scripts -->
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
    <script src="{{ asset('https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('dashboard/assets/libs/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
