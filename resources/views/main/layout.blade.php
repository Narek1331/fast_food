<!DOCTYPE html>
<html >

    <head>
        <meta charset="utf-8">
        <title>
        @yield('title')
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4//css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="/lib/lightbox//css/lightbox.min.css" rel="stylesheet">
        <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="/css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123 Street, New York</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="{{ route('home',['locale'=>app()->getLocale()]) }}" class="navbar-brand"><h1 class="text-primary display-6">Fast Food</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" onclick="toggleNavbar()">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="navbar-collapse bg-white collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{ route('home',['locale'=>app()->getLocale()]) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">{{__('main.Home')}}</a>
                            <a href="{{ route('food.index',['locale'=>app()->getLocale()]) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'food.index' ? 'active' : '' }}">{{__('main.Food')}}</a>
                            <a href="{{ route('contact.index',['locale'=>app()->getLocale()]) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'contact.index' ? 'active' : '' }}">{{__('main.Contact')}}</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <a href="{{ route('basket.index',['locale'=>app()->getLocale()]) }}" class="position-relative me-4 my-auto">
                                <i class="fas fa-shopping-cart fa-2x"></i>
                                    @if (auth()->check())
                                        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                            {{auth()->user()->baskets()->count()}}
                                        </span>
                                    @endif
                            </a>
                            <a href="{{ route('order.my',['locale'=>app()->getLocale()]) }}" class="position-relative me-4 my-auto">
                                <i class="fas fa-shipping-fast fa-2x "></i>
                            </a>
                            @if (auth()->check())
                                <a href="{{ route('auth.logout',['locale'=>app()->getLocale()]) }}" class="my-auto">
                                    <i class="fas fa-sign-out fa-2x"></i>
                                </a>
                            @else
                                <a href="{{ route('auth.login',['locale'=>app()->getLocale()]) }}" class="my-auto">
                                    <i class="fas fa-user fa-2x"></i>
                                </a>
                            @endif

                        </div>
                    </div>
                    {{-- <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{ route('home',['locale'=>app()->getLocale()]) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">{{__('main.Home')}}</a>
                            <a href="{{ route('food.index',['locale'=>app()->getLocale()]) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'food.index' ? 'active' : '' }}">{{__('main.Food')}}</a>
                            <a href="{{ route('contact.index',['locale'=>app()->getLocale()]) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'contact.index' ? 'active' : '' }}">{{__('main.Contact')}}</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <a href="{{ route('basket.index',['locale'=>app()->getLocale()]) }}" class="position-relative me-4 my-auto">
                                <i class="fas fa-shopping-cart fa-2x"></i>
                                    @if (auth()->check())
                                        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                            {{auth()->user()->baskets()->count()}}
                                        </span>
                                    @endif
                            </a>
                            <a href="{{ route('order.my',['locale'=>app()->getLocale()]) }}" class="position-relative me-4 my-auto">
                                <i class="fas fa-shipping-fast fa-2x "></i>
                            </a>
                            @if (auth()->check())
                                <a href="{{ route('auth.logout',['locale'=>app()->getLocale()]) }}" class="my-auto">
                                    <i class="fas fa-sign-out fa-2x"></i>
                                </a>
                            @else
                                <a href="{{ route('auth.login',['locale'=>app()->getLocale()]) }}" class="my-auto">
                                    <i class="fas fa-user fa-2x"></i>
                                </a>
                            @endif

                        </div>
                    </div> --}}
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6">
                            <a href="/">
                                <h1 class="text-primary mb-0">Fast Food</h1>
                                <p class="text-secondary mb-0">Fresh foods</p>
                            </a>
                        </div>

                        {{-- <div class="col-lg-9 col-md-6">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" ><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" ><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" ><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" ><i class="fab fa-instagram"></i></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">{{__('main.Why do people trust us')}}!</h4>
                            <p class="mb-4">
                                {{__('main.Customers trust that they will consistently receive delicious meals every time they visit.')}}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">{{__('main.Info')}}</h4>
                            <a class="btn-link" href="{{route('home',['locale'=>app()->getLocale()])}}">{{__('main.Home')}}</a>
                            <a class="btn-link" href="{{route('contact.index',['locale'=>app()->getLocale()])}}">{{__('main.Contact')}}</a>
                            <a class="btn-link" href="{{route('basket.index',['locale'=>app()->getLocale()])}}">{{__('main.Basket')}}</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">{{__('main.Account')}}</h4>
                            <a class="btn-link" href="{{route('basket.index',['locale'=>app()->getLocale()])}}">{{__('main.Basket')}}</a>
                            <a class="btn-link" href="{{route('order.my',['locale'=>app()->getLocale()])}}">{{__('main.Order')}}</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">{{__('main.Contact')}}</h4>
                            <p>{{__('main.Address')}}: 1429 Netus Rd, NY 48247</p>
                            <p>{{__('main.Email')}}: Example@gmail.com</p>
                            <p>{{__('main.Phone Number')}}: +0123 4567 8910</p>
                            {{-- <p>{{__('main.Payment Accepted')}}</p>
                            <img src="/img/payment.png" class="img-fluid" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="/"><i class="fas fa-copyright text-light me-2"></i>{{date('Y')}} Your Site Name</a>, {{__('main.All right reserved')}}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    @yield('js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist//js/bootstrap.bundle.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/lightbox//js/lightbox.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script>
        function toggleNavbar() {
            var navbarCollapse = document.getElementById("navbarCollapse");
            if (navbarCollapse.classList.contains("show")) {
                navbarCollapse.classList.remove("show");
            } else {
                navbarCollapse.classList.add("show");
            }
        }
    </script>
    <script src="/js/main.js"></script>

    </body>

</html>
