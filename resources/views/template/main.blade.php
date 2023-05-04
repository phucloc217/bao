<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="{{url('/')}}/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="{{url('/')}}/assets/css/ticker-style.css">
            <link rel="stylesheet" href="{{url('/')}}/assets/css/flaticon.css">
            <link rel="stylesheet" href="{{url('/')}}/assets/css/slicknav.css">
            <link rel="stylesheet" href="{{url('/')}}/assets/css/animate.min.css">
            <link rel="stylesheet" href="{{url('/')}}/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="{{url('/')}}/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="{{url('/')}}/assets/css/themify-icons.css">
            <link rel="stylesheet" href="{{url('/')}}/assets/css/slick.css">
            <link rel="stylesheet" href="{{url('/')}}/assets/css/nice-select.css">
            <link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">
   </head>

   <body>
       
    <!-- Preloader Start -->
    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>  --}}
    <!-- Preloader Start -->

    @include('template.components.header')

    <main>
    @yield('content')
    </main>
    
    @include('template.components.footer')
   
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{url("/")}}/assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{url("/")}}/assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="{{url("/")}}/assets/js/popper.min.js"></script>
        <script src="{{url("/")}}/assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{url("/")}}/assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{url("/")}}/assets/js/owl.carousel.min.js"></script>
        <script src="{{url("/")}}/assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="{{url("/")}}/assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="{{url("/")}}/assets/js/wow.min.js"></script>
		<script src="{{url("/")}}/assets/js/animated.headline.js"></script>
        <script src="{{url("/")}}/assets/js/jquery.magnific-popup.js"></script>

        <!-- Breaking New Pluging -->
        <script src="{{url("/")}}/assets/js/jquery.ticker.js"></script>
        <script src="{{url("/")}}/assets/js/site.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{url("/")}}/assets/js/jquery.scrollUp.min.js"></script>
        <script src="{{url("/")}}/assets/js/jquery.nice-select.min.js"></script>
		<script src="{{url("/")}}/assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="{{url("/")}}/assets/js/contact.js"></script>
        <script src="{{url("/")}}/assets/js/jquery.form.js"></script>
        <script src="{{url("/")}}/assets/js/jquery.validate.min.js"></script>
        <script src="{{url("/")}}/assets/js/mail-script.js"></script>
        <script src="{{url("/")}}/assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{url("/")}}/assets/js/plugins.js"></script>
        <script src="{{url("/")}}/assets/js/main.js"></script>
        
    </body>
</html>