<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!--
Grill Template
http://www.templatemo.com/free-website-templates/417-grill
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/templatemo_style.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/templatemo_misc.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/testimonails-slider.css') }}">
    <!-- Styles -->
    <script src="{{ asset('website/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js') }}"></script>
</head>
<body>
      <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
    <div id="app">
        <global-home></global-home>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('website/js/vendor/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('website/js/vendor/jquery.gmap3.min.js') }}"></script>
    <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/js/plugins.js') }}"></script>
    <script src="{{ asset('website/js/main.js') }}"></script>
</body>
</html>
