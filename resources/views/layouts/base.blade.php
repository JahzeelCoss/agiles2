<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs
    ================================================== -->
        <meta charset="utf-8">
        <title>YUCARUN</title>
        <meta name="description" content="">
        <!-- Mobile Specific Metas
    ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

   
    @section('head')        
         <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
         <!-- CSS
         ================================================== -->
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('dist/theme/css/bootstrap.min.css') }}"/>
        <!-- FontAwesome -->
        <link rel="stylesheet" href="{{ asset('dist/theme/css/font-awesome.min.css') }}"/>
        <!-- Animation -->
        <link rel="stylesheet" href="{{ asset('dist/theme/css/animate.css') }}" />
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="{{ asset('dist/theme/css/owl.carousel.css') }}"/>
        <link rel="stylesheet" href="{{ asset('dist/theme/css/owl.theme.css') }}"/>
        <!-- Pretty Photo -->
        <link rel="stylesheet" href="{{ asset('dist/theme/css/prettyPhoto.css') }}"/>
        <!-- Bx slider -->
        <link rel="stylesheet" href="{{ asset('dist/theme/css/jquery.bxslider.css') }}"/>
       
        <!-- Template styles-->
        <link rel="stylesheet" href="{{ asset('dist/theme/css/custom.css') }}" />
         <!-- color style -->
        <link rel="stylesheet" href="{{ asset('dist/theme/css/red.css') }}"/>
        <!-- Responsive  -->
        <link rel="stylesheet" href="{{ asset('dist/theme/css/responsive.css') }}" />
        <link rel="stylesheet" href="{{ asset('dist/theme/css/jquery.fancybox.css?v=2.1.5') }}" type="text/css" media="screen" />
    
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500' rel='stylesheet' type='text/css'>
    @show
</head>

 <body data-spy="scroll" data-target=".navbar-fixed-top">
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    @include('layouts.header')
          
    @yield('body')
            
    {{-- @include('layouts.footer')    --}}

    <!-- Back To Top Button -->
    <section id="back-top">
        <a href="#slider_part" class="scroll"></a>
    </section>
    <!-- End Back To Top Button -->

    
    @section('js')
        <!-- Javascript Files
    ================================================== -->
    <!-- initialize jQuery Library -->

        <!-- initialize jQuery Library -->
        <!-- Main jquery -->
        <script type="text/javascript" src="{{ asset('dist/theme/js/jquery.js') }}"></script>
        <!-- Bootstrap jQuery -->
         <script src="{{ asset('dist/theme/js/bootstrap.min.js') }}"></script>
        <!-- Owl Carousel -->
        <script src="{{ asset('dist/theme/js/owl.carousel.min.js') }}"></script>
        <!-- Isotope -->
        <script src="{{ asset('dist/theme/js/jquery.isotope.js') }}"></script>
        <!-- Pretty Photo -->
            <script type="text/javascript" src="{{ asset('dist/theme/js/jquery.prettyPhoto.js') }}"></script>
        <!-- SmoothScroll -->
        <script type="text/javascript" src="{{ asset('dist/theme/js/smooth-scroll.js') }}"></script>
        <!-- Image Fancybox -->
        <script type="text/javascript" src="{{ asset('dist/theme/js/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
        <!-- Counter  -->
        <script type="text/javascript" src="{{ asset('dist/theme/js/jquery.counterup.min.js') }}"></script>
        <!-- waypoints -->
        <script type="text/javascript" src="{{ asset('dist/theme/js/waypoints.min.js') }}"></script>
        <!-- Bx slider -->
        <script type="text/javascript" src="{{ asset('dist/theme/js/jquery.bxslider.min.js') }}"></script>
        <!-- Scroll to top -->
        <script type="text/javascript" src="{{ asset('dist/theme/js/jquery.scrollTo.js') }}"></script>
        <!-- Easing js -->
        <script type="text/javascript" src="{{ asset('dist/theme/js/jquery.easing.1.3.js') }}"></script>
         <!-- PrettyPhoto -->
        <script src="{{ asset('dist/theme/js/jquery.singlePageNav.js') }}"></script>
        <!-- Wow Animation -->
        <script type="js/javascript" src="{{ asset('dist/theme/js/wow.min.js') }}"></script>
        <!-- Google Map  Source -->
        <script type="text/javascript" src="{{ asset('dist/theme/js/gmaps.js') }}"></script>
             <!-- Custom js -->
        <script src="{{ asset('dist/theme/js/custom.js') }}"></script>


        <script>
              $('#portfolio-slider').bxSlider({
                mode: 'fade',
                autoControls: false
              });
        </script>
    @show     

</body>

</html>