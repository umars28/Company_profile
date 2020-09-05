<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  @yield('title')
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- Favicons -->
  <link href="{{ Storage::url('images/seting/'.config('web_config')['WEBSITE_FAVICON']) }}" rel="icon">
  <link href="{{ Storage::url('images/seting/'.config('web_config')['WEBSITE_FAVICON']) }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('asset/plugins/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('asset/plugins/css/nivo-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/plugins/css/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/plugins/css/owl.transitions.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/plugins/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/plugins/css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/plugins/css/venobox.css') }}" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="{{ asset('asset/css/nivo-slider-theme.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="{{ asset('asset/css/responsive.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  @include('layout.header')
  @yield('content')
  @include('layout.footer')

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('asset/plugins/js/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/js/venobox.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/js/jquery.knob.js') }}"></script>
  <script src="{{ asset('asset/plugins/js/wow.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/js/parallax.js') }}"></script>
  <script src="{{ asset('asset/plugins/js/easing.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
  <script src="{{ asset('asset/plugins/js/jquery.appear.js') }}"></script>
  <script src="{{ asset('asset/plugins/js/isotope.pkgd.min.js') }}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('asset/js/contactform.js') }}"></script>

  <script src="{{ asset('asset/js/main.js') }}"></script>
</body>

</html>
