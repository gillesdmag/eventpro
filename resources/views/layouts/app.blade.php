<!doctype html>

<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="//fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Sail&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style-starter.css') }}">
</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg stroke">
                <style>
                    .avatar {
                            vertical-align: middle;
                            width: 200px;
                            height: 60px;
                            border-radius: 10%;
                            }
                </style>
                <h1>
                    <a class="navbar-brand d-flex align-items-center" href="index.html">
                        <img  class="avatar" src="{{ asset('images/logo.png') }}" alt=""> 
                     </a> 
                </h1>
             
   
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-lg-auto">
                    @if (Route::has('login'))
                          @auth
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('register') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       @if(Request::path()=="/")
                        <li class="nav-item">
                            <a class="nav-link" href="#events">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#service">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Profile</a>
                        </li>
                            
                        <!-- search button -->
                        @guest
                          @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connecter</a>
                        </li>
                        @endif

                         @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                        </li>
                        @endif
                      @else
                        <li class="nav-item">
                         @if(Auth::user()->type_user_id==1)
                                <a class="nav-link" href="{{route('organizer_dashboard')}}">Dashboard organiseur</a>
                            @endif
                        </li>
                        <li class="nav-item">
                          @if(Auth::user()->type_user_id==2)
                            <a class="nav-link" href="{{route('promotor_dashboard')}}">Dashboard Promoteur</a>    
                            @endif
                        </li>
                        <li class="nav-item">
                          @if(Auth::user()->type_user_id==3)
                           <a class="nav-link" href="{{route('client_dashboard')}}">Dashboard client</a>
                           @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li class="nav-item">
                        <li class="nav-item"> {{ Auth::user()->name }}</li>
                    @endguest
                        @else
                        <style>
                            .C{
                                margin-right:20px;
                            }
                        </style>
                        <div class="afficheCP">
                           
                        <h2 class="C">
                           <a class="navbar-brand d-flex align-items-center" href="{{ route('login') }}">
                               Connexion </a> 
                              
                       </h2>

                       @if (Route::has('register'))
                          <h1> 
                           <a class="navbar-brand d-flex align-items-center" href="{{ route('register') }}">
                               Inscription </a> 
                            </h1>
                        @endif
                                 
                   </div>
                      
                    @endauth
                    @endif
                    </ul>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>


			@yield('content')




<section class="w3l-footer-29-main">
        <div class="footer-29 py-5">
            <div class="container py-lg-4">
                <div class="row footer-top-29">
                    <div class="col-lg-6 col-12 footer-list-29">
                        <h2>
                            <a class="footer-logo" href="index.html">
                                Massali Events</a>
                        </h2>
                        <p class="sub-list-text mt-4 pt-lg-2">Lorem ipsum dolor sit amet enim. Etiam ullamcorper.
                            Suspendisse a pellentesque
                            dui, non
                            felis. Maecenas malesuada elit lectus felis, malesuada ultricies.</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 footer-list-29 mt-lg-0 mt-sm-5 mt-4 pt-sm-0 pt-2">
                        <h6 class="footer-title-29">SUPPORT</h6>
                        <ul>
                            <li><a href="#privacy">Privacy Policy</a></li>
                            <li><a href="#terms"> Terms of Service</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                            <li><a href="#support"> Support</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 footer-contact-list mt-lg-0 mt-sm-5 mt-4 pt-sm-0 pt-2">
                        <h6 class="footer-title-29">Contact Info </h6>
                        <ul>
                            <li class="d-flex align-items-center py-2"><i class="fa fa-map-marker mr-2"
                                    aria-hidden="true"></i>10001, 5th Avenue, USA</li>
                            <li class="d-flex align-items-center py-2"><i class="fa fa-phone mr-2"
                                    aria-hidden="true"></i><a href="tel:+12 23456790">+12
                                    23456790</a></li>
                            <li class="d-flex align-items-center py-2"><i class="fa fa-envelope mr-2"
                                    aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //footer -->
    <!-- copyright -->
    <section class="w3l-copyright">
        <div class="container">
            <div class="row bottom-copies">
                <p class="col-lg-8 copy-footer-29">© 2021 MASSALI EVENTS. All rights reserved. Design by Mfid</p>
                <div class="col-lg-4 text-right">
                    <div class="main-social-footer-29">
                        <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>
                        <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
                        <a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                        <a href="#instagram" class="instagram"><span class="fa fa-instagram"></span></a>
                        <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //copyright -->

    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-level-up" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->

    <!-- common jquery plugin -->
    
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- //common jquery plugin -->

    <!-- slider-js -->
   
    <script src=" {{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
    
    <script src="{{ asset('js/jquery.zoomslider.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#owl-demo2").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: false,
                        loop: false
                    }
                }
            })
        })
    </script>
    <!-- //script for tesimonials carousel slider -->

    <!-- theme switch js (light and dark)-->
    
    <script src="{{ asset('js/theme-change.js') }}"></script>
    <script>
        function autoType(elementClass, typingSpeed) {
            var thhis = $(elementClass);
            thhis.css({
                "position": "relative",
                "display": "inline-block"
            });
            thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
            thhis = thhis.find(".text-js");
            var text = thhis.text().trim().split('');
            var amntOfChars = text.length;
            var newString = "";
            thhis.text("|");
            setTimeout(function () {
                thhis.css("opacity", 1);
                thhis.prev().removeAttr("style");
                thhis.text("");
                for (var i = 0; i < amntOfChars; i++) {
                    (function (i, char) {
                        setTimeout(function () {
                            newString += char;
                            thhis.text(newString);
                        }, i * typingSpeed);
                    })(i + 1, text[i]);
                }
            }, 1500);
        }

        $(document).ready(function () {
            // Now to start autoTyping just call the autoType function with the
            // class of outer div
            // The second paramter is the speed between each letter is typed.
            autoType(".type-js", 200);
        });
    </script>
    <!-- //theme switch js (light and dark)-->

    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!--bootstrap-->
    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- //bootstrap-->
    <!-- //Js scripts -->
</body>

</html>