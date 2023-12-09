<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required Meta Tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="{{ asset('site/assets/css/bootstrap.min.css') }}">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="{{ asset('site/assets/css/animate.min.css') }}">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{ asset('site/assets/fonts/flaticon.css') }}">
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="{{ asset('site/assets/css/boxicons.min.css') }}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{ asset('site/assets/css/magnific-popup.css') }}">
        <!-- Owl Carousel Min CSS --> 
        <link rel="stylesheet" href="{{ asset('site/assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/owl.theme.default.min.css') }}">
        <!-- Nice Select Min CSS --> 
        <link rel="stylesheet" href="{{ asset('site/assets/css/nice-select.min.css') }}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{ asset('site/assets/css/meanmenu.css') }}">
        <!-- Jquery Ui CSS -->
        <link rel="stylesheet" href="{{ asset('site/assets/css/jquery-ui.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('site/assets/css/style.css') }}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('site/assets/css/responsive.css') }}">
        <!-- Theme Dark CSS -->
        <link rel="stylesheet" href="{{ asset('site/assets/css/theme-dark.css') }}">
        <!--toastr css  -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
        <!--toastr css -->

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('site/assets/img/favicon.png') }}">

        <title>Atoli - Hotel & Resorts HTML Template</title>
    </head>
    <body>

        <!-- PreLoader Start -->
        <div class="preloader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="sk-cube-area">
                        <div class="sk-cube1 sk-cube"></div>
                        <div class="sk-cube2 sk-cube"></div>
                        <div class="sk-cube4 sk-cube"></div>
                        <div class="sk-cube3 sk-cube"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PreLoader End -->

        <!-- Top Header Start -->
        @include('site.body.header')
        <!-- Top Header End -->

        <!-- Start Navbar Area -->
        @include('site.body.navbar')
        <!-- End Navbar Area -->

        @yield('main')

        <!-- Footer Area -->
        @include('site.body.footer')
        <!-- Footer Area End -->


        <!-- Jquery Min JS -->
        <script src="{{ asset('site/assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap Bundle Min JS -->
        <script src="{{ asset('site/assets/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Magnific Popup Min JS -->
        <script src="{{ asset('site/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Owl Carousel Min JS -->
        <script src="{{ asset('site/assets/js/owl.carousel.min.js') }}"></script>
        <!-- Nice Select Min JS -->
        <script src="{{ asset('site/assets/js/jquery.nice-select.min.js') }}"></script>
        <!-- Wow Min JS -->
        <script src="{{ asset('site/assets/js/wow.min.js') }}"></script>
        <!-- Jquery Ui JS -->
        <script src="{{ asset('site/assets/js/jquery-ui.js') }}"></script>
        <!-- Meanmenu JS -->
        <script src="{{ asset('site/assets/js/meanmenu.js') }}"></script>
        <!-- Ajaxchimp Min JS -->
        <script src="{{ asset('site/assets/js/jquery.ajaxchimp.min.js') }}"></script>
        <!-- Form Validator Min JS -->
        <script src="{{ asset('site/assets/js/form-validator.min.js') }}"></script>
        <!-- Contact Form JS -->
        <script src="{{ asset('site/assets/js/contact-form-script.js') }}"></script>
        <!-- Custom JS -->
        <script src="{{ asset('site/assets/js/custom.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;
    
                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;
    
                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;
    
                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
           </script>
    </body>
</html>