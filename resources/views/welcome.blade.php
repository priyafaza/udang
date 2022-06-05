<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>FindHouses - HTML5 Template</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="/landing/favicon.ico">
    <link rel="stylesheet" href="/landing/css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="/landing/font/flaticon.css">
    <link rel="stylesheet" href="/landing/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/landing/css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="/landing/css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="/landing/css/search-form.css">
    <link rel="stylesheet" href="/landing/css/search.css">
    <link rel="stylesheet" href="/landing/css/animate.css">
    <link rel="stylesheet" href="/landing/css/aos.css">
    <link rel="stylesheet" href="/landing/css/aos2.css">
    <link rel="stylesheet" href="/landing/css/magnific-popup.css">
    <link rel="stylesheet" href="/landing/css/lightcase.css">
    <link rel="stylesheet" href="/landing/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/landing/css/bootstrap.min.css">
    <link rel="stylesheet" href="/landing/css/menu.css">
    <link rel="stylesheet" href="/landing/css/slick.css">
    <link rel="stylesheet" href="/landing/css/styles.css">
    <link rel="stylesheet" id="color" href="/landing/css/default.css">
</head>

<body class="homepage-3 the-search">
<!-- Wrapper -->
<div id="wrapper">
    <!-- START SECTION HEADINGS -->
    <!-- Header Container
    ================================================== -->
    <header id="header-container" class="header head-tr">
        <!-- Header -->
        <div id="header" class="head-tr bottom">
            <div class="container container-header">
                <!-- Left Side Content -->
                <div class="left-side">
                    <!-- Logo -->
                    <div id="logo">
                        <a href="index.html"><img src="/landing/images/logo-white-1.svg"
                                                  style="margin-left: auto; margin-right: auto"
                                                  data-sticky-logo="images/logo-purple.svg" alt=""></a>
                    </div>
                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1 head-tr">
                        <ul id="responsive">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Product</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- Main Navigation / End -->
                </div>
                <!-- Left Side Content / End -->
                <div class="right-side d-none d-none d-lg-none d-xl-flex" style="margin-right: 10px">
                    <!-- Header Widget -->
                    <div class="header-widget">
                        <a href="/login" class="button border text-center"><i class="fas fa-lock ml-2"></i> Login</a>
                    </div>
                    <!-- Header Widget / End -->
                </div>
            </div>
        </div>
        <!-- Header / End -->

    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->

    <!-- START SECTION INFO-HELP -->
    <section class="info-help h17">
        <div class="container">
            <div class="row info-head">
                <div class="col-lg-6 col-md-8 col-xs-8" data-aos="fade-right">
                    <div class="info-text">
                        <h3>Easy find your shrimp</h3>
                        <h5 class="mt-3">start at {{ formatPrice($min_price_product) }}/Kg</h5>
                        <p class="pt-2">We recommend buying individually frozen (IQF), head-off, peel-on shrimp for most
                            preparations.</p>
                        <div class="inf-btn pro">
                            <a href="/login" class="btn btn-pro btn-secondary btn-lg">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-3"></div>
            </div>
        </div>
    </section>
    <!-- END SECTION INFO-HELP -->

    <!-- START SECTION PROPERTIES FOR SALE -->
    <section class="featured portfolio bg-white-2 rec-pro">
        <div class="container-fluid">
            <div class="sec-title">
                <h2><span>Shrimp for </span>Sale</h2>
                <p>We sell frozen shrimp and fresh shrimp</p>
            </div>
            <div class="portfolio col-xl-12">
                <div class="slick-lancers2">
                    @foreach($products as $product)
                        <div class="agents-grid">
                            <div class="landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="#" class="homes-img">
                                                <img src="{{ $product['image'] }}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="#">{{ $product['name'] }}</a></h3>
                                        <p class="homes-address mb-3">
                                            <i class="fa fa-question-circle mr-2"></i><span> {{ $product['summary'] }}</span>
                                        </p>
                                        <!-- homes List -->
                                        @if($product->productDetails()->count() > 0)
                                            <ul class="homes-list clearfix">
                                                <li class="the-icons">
                                                    <i class="fas fa-box mr-2"></i>
                                                    <span>{{ $product->productDetails()->sum('stock') }} Kg</span>
                                                </li>
                                            </ul>
                                            <div class="price-properties footer pt-3 pb-0">
                                                <h3 class="title mt-3" style="text-transform: none">
                                                    @if($product->productDetails()->min('price') === $product->productDetails()->max('price'))
                                                        <a href="#">{{ formatPrice($product->productDetails()->min('price')) }}
                                                            /Kg</a>
                                                    @else
                                                        <a href="#">{{ formatPrice($product->productDetails()->min('price')) }}
                                                            to {{ formatPrice($product->productDetails()->max('price')) }}
                                                            /Kg</a>
                                                    @endif
                                                </h3>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION PROPERTIES FOR SALE -->

    <!-- START SECTION WHY CHOOSE US -->
    <section class="how-it-works bg-white">
        <div class="container">
            <div class="sec-title">
                <h2><span>Why </span>Choose Us</h2>
                <p>We provide full service at every step.</p>
            </div>
            <div class="row service-1">
                <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="zoom-in" data-aos-delay="150">
                    <div class="serv-flex">
                        <div class="art-1 img-13">
                            <img src="/landing/images/icons/icon-12.svg" alt="">
                            <h3>Wide Renge Of Properties</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur
                                debits adipisicing lacus consectetur Business Directory.</p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="zoom-in" data-aos-delay="250">
                    <div class="serv-flex">
                        <div class="art-1 img-14">
                            <img src="/landing/images/icons/icon-13.svg" alt="">
                            <h3>Trusted by thousands</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur
                                debits adipisicing lacus consectetur Business Directory.</p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pt" data-aos="zoom-in" data-aos-delay="350">
                    <div class="serv-flex arrow">
                        <div class="art-1 img-15">
                            <img src="/landing/images/icons/icon-14.svg" alt="">
                            <h3>Financing made easy</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur
                                debits adipisicing lacus consectetur Business Directory.</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <!-- END SECTION WHY CHOOSE US -->

    <!-- START FOOTER -->
    <footer class="first-footer">
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-6">
                        <div class="netabout">
                            <a href="index.html" class="logo">
                                <img src="/landing/images/logo-footer.svg" alt="netcom">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt architecto soluta
                                laboriosam, perspiciatis, aspernatur officiis esse.</p>
                        </div>
                        <div class="contactus">
                            <ul>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p class="in-p">95 South Park Avenue, USA</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <p class="in-p">+456 875 369 208</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <p class="in-p ti">support@findhouses.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="newsletters">
                            <h3>Newsletters</h3>
                            <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in
                                your inbox.</p>
                        </div>
                        <form class="bloq-email mailchimp form-inline" method="post">
                            <label for="subscribeEmail" class="error"></label>
                            <div class="email">
                                <input type="email" id="subscribeEmail" name="EMAIL" placeholder="Enter Your Email">
                                <input type="submit" value="Subscribe">
                                <p class="subscription-success"></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="second-footer">
            <div class="container">
                <p>2022 © Copyright {{ env('APP_NAME') }} - All Rights Reserved.</p>
                <ul class="netsocials">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>

    <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
    <!-- END FOOTER -->

    <!-- START PRELOADER -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>
    <!-- END PRELOADER -->

    <!-- ARCHIVES JS -->
    <script src="/landing/js/jquery-3.5.1.min.js"></script>
    <script src="/landing/js/rangeSlider.js"></script>
    <script src="/landing/js/tether.min.js"></script>
    <script src="/landing/js/moment.js"></script>
    <script src="/landing/js/bootstrap.min.js"></script>
    <script src="/landing/js/mmenu.min.js"></script>
    <script src="/landing/js/mmenu.js"></script>
    <script src="/landing/js/aos.js"></script>
    <script src="/landing/js/aos2.js"></script>
    <script src="/landing/js/slick.min.js"></script>
    <script src="/landing/js/fitvids.js"></script>
    <script src="/landing/js/fitvids.js"></script>
    <script src="/landing/js/jquery.waypoints.min.js"></script>
    <script src="/landing/js/jquery.counterup.min.js"></script>
    <script src="/landing/js/imagesloaded.pkgd.min.js"></script>
    <script src="/landing/js/isotope.pkgd.min.js"></script>
    <script src="/landing/js/smooth-scroll.min.js"></script>
    <script src="/landing/js/lightcase.js"></script>
    <script src="/landing/js/search.js"></script>
    <script src="/landing/js/owl.carousel.js"></script>
    <script src="/landing/js/jquery.magnific-popup.min.js"></script>
    <script src="/landing/js/ajaxchimp.min.js"></script>
    <script src="/landing/js/newsletter.js"></script>
    <script src="/landing/js/jquery.form.js"></script>
    <script src="/landing/js/jquery.validate.min.js"></script>
    <script src="/landing/js/searched.js"></script>
    <script src="/landing/js/forms-2.js"></script>
    <script src="/landing/js/range.js"></script>
    <script src="/landing/js/color-switcher.js"></script>
    <script>
        $(window).on('scroll load', function () {
            $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
        });

    </script>

    <!-- Slider Revolution scripts -->
    <script src="/landing/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="/landing/revolution/js/jquery.themepunch.revolution.min.js"></script>

    <script>
        $('.slick-lancers').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            adaptiveHeight: true,
            responsive: [{
                breakpoint: 1292,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    arrows: false
                }
            }, {
                breakpoint: 993,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    arrows: false
                }
            }, {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: false
                }
            },]
        });

    </script>
    <script>
        $('.slick-lancers2').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            adaptiveHeight: true,
            responsive: [{
                breakpoint: 1292,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    arrows: false
                }
            }, {
                breakpoint: 993,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    arrows: false
                }
            }, {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: false
                }
            },]
        });

    </script>
    <script>
        $('.job_clientSlide').owlCarousel({
            items: 2,
            loop: true,
            margin: 30,
            autoplay: false,
            nav: true,
            smartSpeed: 1000,
            slideSpeed: 1000,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                991: {
                    items: 2
                }
            }
        });

    </script>

    <script>
        $(".dropdown-filter").on('click', function () {

            $(".explore__form-checkbox-list").toggleClass("filter-block");

        });

    </script>

    <!-- MAIN JS -->
    <script src="/landing/js/script.js"></script>

</div>
<!-- Wrapper / End -->
</body>

</html>
