<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Renandatta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets2/images/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets2/css/all.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets2/css/simple-line-icons.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets2/css/slick.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets2/css/animate.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets2/css/magnific-popup.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}" type="text/css" media="all">
</head>

<body class="dark">
<div id="preloader">
    <div class="outer">
        <div class="infinityChrome">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div class="infinity">
            <div><span></span></div>
            <div><span></span></div>
            <div><span></span></div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo-outer">
            <defs>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur" />
                    <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                    <feBlend in="SourceGraphic" in2="goo" />
                </filter>
            </defs>
        </svg>
    </div>
</div>

<header class="mobile-header-1">
    <div class="container">
        <div class="menu-icon d-inline-flex mr-4">
            <button><span></span></button>
        </div>
        <div class="site-logo">
            <a href="{{ route('/') }}">
                <img src="{{ asset('assets2/images/logo.svg') }}" alt="" />
            </a>
        </div>
    </div>
</header>

<header class="desktop-header-1 d-flex align-items-start flex-column">

    <div class="site-logo">
        <a href="{{ route('/') }}">
            <img src="{{ asset('assets2/images/logo.svg') }}" alt="" />
        </a>
    </div>

    <nav>
        <ul class="vertical-menu scrollspy">
            <li class="active"><a href="#home"><i class="icon-home"></i>Home</a></li>
            <li><a href="#services"><i class="icon-briefcase"></i>Services</a></li>
            <li><a href="#works"><i class="icon-layers"></i>Works</a></li>
            <li><a href="#blog"><i class="icon-note"></i>Blog</a></li>
            <li><a href="#contact"><i class="icon-bubbles"></i>Contact</a></li>
        </ul>
    </nav>

    <div class="footer">
        <span class="copyright">© 2020 Renandatta.</span>
    </div>

</header>

<main class="content">
    <section id="home" class="home d-flex align-items-center">
        <div class="container">
            <div class="intro">
                <img src="{{ asset('assets2/images/avatar-1.svg') }}" alt="" class="mb-4" />

                <h1 class="mb-2 mt-0">Renandatta</h1>
                <span>I'm a <span class="text-rotating">System Analyst, Fullstack developer, Cat lover</span></span>

                <ul class="social-icons light list-inline mb-0 mt-4">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-behance"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-dribbble"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                </ul>

                <div class="mt-4">
                    <a href="#contact" class="btn btn-default">Hire me</a>
                </div>
            </div>

            <div class="scroll-down">
                <a href="#about" class="mouse-wrapper">
                    <span>Scroll Down</span>
                    <span class="mouse">
						<span class="wheel"></span>
					</span>
                </a>
            </div>

            <div class="parallax" data-relative-input="true">
                <svg width="27" height="29" data-depth="0.3" class="layer p1" xmlns="http://www.w3.org/2000/svg"><path d="M21.15625.60099c4.37954 3.67487 6.46544 9.40612 5.47254 15.03526-.9929 5.62915-4.91339 10.30141-10.2846 12.25672-5.37122 1.9553-11.3776.89631-15.75715-2.77856l2.05692-2.45134c3.50315 2.93948 8.3087 3.78663 12.60572 2.22284 4.297-1.5638 7.43381-5.30209 8.22768-9.80537.79387-4.50328-.8749-9.08872-4.37803-12.02821L21.15625.60099z" fill="#FFD15C" fill-rule="evenodd"/></svg>
                <svg width="26" height="26" data-depth="0.2" class="layer p2" xmlns="http://www.w3.org/2000/svg"><path d="M13 3.3541L2.42705 24.5h21.1459L13 3.3541z" stroke="#FF4C60" stroke-width="3" fill="none" fill-rule="evenodd"/></svg>
                <svg width="30" height="25" data-depth="0.3" class="layer p3" xmlns="http://www.w3.org/2000/svg"><path d="M.1436 8.9282C3.00213 3.97706 8.2841.92763 14.00013.92796c5.71605.00032 10.9981 3.04992 13.85641 8 2.8583 4.95007 2.8584 11.0491-.00014 16.00024l-2.77128-1.6c2.28651-3.96036 2.28631-8.84002.00011-12.8002-2.2862-3.96017-6.5124-6.40017-11.08513-6.4-4.57271.00018-8.79872 2.43984-11.08524 6.4002l-2.77128-1.6z" fill="#44D7B6" fill-rule="evenodd"/></svg>
                <svg width="15" height="23" data-depth="0.6" class="layer p4" xmlns="http://www.w3.org/2000/svg"><rect transform="rotate(30 9.86603 10.13397)" x="7" width="3" height="25" rx="1.5" fill="#FFD15C" fill-rule="evenodd"/></svg>
                <svg width="15" height="23" data-depth="0.2" class="layer p5" xmlns="http://www.w3.org/2000/svg"><rect transform="rotate(30 9.86603 10.13397)" x="7" width="3" height="25" rx="1.5" fill="#6C6CE5" fill-rule="evenodd"/></svg>
                <svg width="49" height="17" data-depth="0.5" class="layer p6" xmlns="http://www.w3.org/2000/svg"><g fill="#FF4C60" fill-rule="evenodd"><path d="M.5 16.5c0-5.71709 2.3825-10.99895 6.25-13.8567 3.8675-2.85774 8.6325-2.85774 12.5 0C23.1175 5.50106 25.5 10.78292 25.5 16.5H23c0-4.57303-1.90625-8.79884-5-11.08535-3.09375-2.28652-6.90625-2.28652-10 0C4.90625 7.70116 3 11.92697 3 16.5H.5z"/><path d="M23.5 16.5c0-5.71709 2.3825-10.99895 6.25-13.8567 3.8675-2.85774 8.6325-2.85774 12.5 0C46.1175 5.50106 48.5 10.78292 48.5 16.5H46c0-4.57303-1.90625-8.79884-5-11.08535-3.09375-2.28652-6.90625-2.28652-10 0-3.09375 2.28651-5 6.51232-5 11.08535h-2.5z"/></g></svg>
                <svg width="26" height="26" data-depth="0.4" class="layer p7" xmlns="http://www.w3.org/2000/svg"><path d="M13 22.6459L2.42705 1.5h21.1459L13 22.6459z" stroke="#FFD15C" stroke-width="3" fill="none" fill-rule="evenodd"/></svg>
                <svg width="19" height="21" data-depth="0.3" class="layer p8" xmlns="http://www.w3.org/2000/svg"><rect transform="rotate(-40 6.25252 10.12626)" x="7" width="3" height="25" rx="1.5" fill="#6C6CE5" fill-rule="evenodd"/></svg>
                <svg width="30" height="25" data-depth="0.3" data-depth-y="-1.30" class="layer p9" xmlns="http://www.w3.org/2000/svg"><path d="M29.8564 16.0718c-2.85854 4.95114-8.1405 8.00057-13.85654 8.00024-5.71605-.00032-10.9981-3.04992-13.85641-8-2.8583-4.95007-2.8584-11.0491.00014-16.00024l2.77128 1.6c-2.28651 3.96036-2.28631 8.84002-.00011 12.8002 2.2862 3.96017 6.5124 6.40017 11.08513 6.4 4.57271-.00018 8.79872-2.43984 11.08524-6.4002l2.77128 1.6z" fill="#6C6CE5" fill-rule="evenodd"/></svg>
                <svg width="47" height="29" data-depth="0.2" class="layer p10" xmlns="http://www.w3.org/2000/svg"><g fill="#44D7B6" fill-rule="evenodd"><path d="M46.78878 17.19094c-1.95535 5.3723-6.00068 9.52077-10.61234 10.8834-4.61167 1.36265-9.0893-.26708-11.74616-4.27524-2.65686-4.00817-3.08917-9.78636-1.13381-15.15866l2.34923.85505c-1.56407 4.29724-1.2181 8.92018.90705 12.12693 2.12514 3.20674 5.70772 4.5107 9.39692 3.4202 3.68921-1.0905 6.92581-4.40949 8.48988-8.70673l2.34923.85505z"/><path d="M25.17585 9.32448c-1.95535 5.3723-6.00068 9.52077-10.61234 10.8834-4.61167 1.36264-9.0893-.26708-11.74616-4.27525C.16049 11.92447-.27182 6.14628 1.68354.77398l2.34923.85505c-1.56407 4.29724-1.2181 8.92018.90705 12.12692 2.12514 3.20675 5.70772 4.5107 9.39692 3.4202 3.68921-1.0905 6.92581-4.40948 8.48988-8.70672l2.34923.85505z"/></g></svg>
                <svg width="33" height="20" data-depth="0.5" class="layer p11" xmlns="http://www.w3.org/2000/svg"><path d="M32.36774.34317c.99276 5.63023-1.09332 11.3614-5.47227 15.03536-4.37895 3.67396-10.3855 4.73307-15.75693 2.77837C5.76711 16.2022 1.84665 11.53014.8539 5.8999l3.15139-.55567c.7941 4.50356 3.93083 8.24147 8.22772 9.8056 4.29688 1.56413 9.10275.71673 12.60554-2.2227C28.34133 9.98771 30.01045 5.4024 29.21635.89884l3.15139-.55567z" fill="#FFD15C" fill-rule="evenodd"/></svg>
            </div>
        </div>

    </section>

    <section id="services">
        <div class="container">
            <h2 class="section-title wow fadeInUp">Services</h2>
            <div class="spacer" data-height="60"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="service-box rounded data-background padding-30 text-center text-light shadow-blue" data-color="#6C6CE5">
                        <img src="{{ asset('assets2/images/service-1.svg') }}" alt="" />
                        <h3 class="mb-3 mt-0">Web Application</h3>
                        <p class="mb-0">Get business into next level with web application, you can monitor your company data from anywhere</p>
                    </div>
                    <div class="spacer d-md-none d-lg-none" data-height="30"></div>
                </div>

                <div class="col-md-4">
                    <div class="service-box rounded data-background padding-30 text-center shadow-yellow" data-color="#F9D74C">
                        <img src="{{ asset('assets2/images/service-2.svg') }}" alt="" />
                        <h3 class="mb-3 mt-0">Android Application</h3>
                        <p class="mb-0">Too busy looking at laptop or desktop? You can access your company data from your android device.</p>
                    </div>
                    <div class="spacer d-md-none d-lg-none" data-height="30"></div>
                </div>

                <div class="col-md-4">
                    <div class="service-box rounded data-background padding-30 text-center text-light shadow-pink" data-color="#F97B8B">
                        <img src="{{ asset('assets2/images/service-3.svg') }}" alt="" />
                        <h3 class="mb-3 mt-0">Content Editor</h3>
                        <p class="mb-0">Boost Up your company website or social media with quality content to attract more consumer.</p>
                    </div>
                </div>
            </div>
            <div class="mt-5 text-center">
                <p class="mb-0">Looking for a custom job? <a href="#contact">Click here</a> to contact me!</p>
            </div>
        </div>
    </section>

    <section id="works">
        <div class="container">
            <h2 class="section-title wow fadeInUp">Recent works</h2>
            <div class="spacer" data-height="60"></div>
            <ul class="portfolio-filter list-inline wow fadeInUp">
                <li class="current list-inline-item" data-filter="*">Everything</li>
                <li class="list-inline-item" data-filter=".creative">Creative</li>
                <li class="list-inline-item" data-filter=".art">Art</li>
                <li class="list-inline-item" data-filter=".design">Design</li>
                <li class="list-inline-item" data-filter=".branding">Branding</li>
            </ul>
            <!-- portfolio filter (mobile) -->
            <div class="pf-filter-wrapper">
                <select class="portfolio-filter-mobile">
                    <option value="*">Everything</option>
                    <option value=".creative">Creative</option>
                    <option value=".art">Art</option>
                    <option value=".design">Design</option>
                    <option value=".branding">Branding</option>
                </select>
            </div>

            <!-- portolio wrapper -->
            <div class="row portfolio-wrapper">

                <div class="col-md-4 col-sm-6 grid-item creative design">
                    <a href="#small-dialog" class="work-content">
                        <div class="portfolio-item rounded shadow-dark">
                            <div class="details">
                                <span class="term">Creative</span>
                                <h4 class="title">Guest App Walkthrough Screens</h4>
                                <span class="more-button"><i class="icon-options"></i></span>
                            </div>
                            <div class="thumb">
                                <img src="{{ asset('assets2/images/works/2.svg') }}" alt="Portfolio-title" />
                                <div class="mask"></div>
                            </div>
                        </div>
                    </a>
                    <div id="small-dialog" class="white-popup zoom-anim-dialog mfp-hide">
                        <img src="{{ asset('assets2/images/single-work.svg') }}" alt="Title" />
                        <h2>Guest App Walkthrough Screens</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit nibh in massa semper rutrum. In rhoncus eleifend mi id tempus.</p>
                        <p>Donec consectetur, libero at pretium euismod, nisl felis lobortis urna, id tristique nisl lectus eget ligula.</p>
                        <a href="#" class="btn btn-default">View on Dribbble</a>
                    </div>
                </div>

            </div>

            <div class="load-more text-center mt-4">
                <a href="javascript:" class="btn btn-default"><i class="fas fa-spinner"></i> Load more</a>
            </div>

        </div>

    </section>

    <section id="testimonials">
        <div class="container">
            <h2 class="section-title wow fadeInUp">Clients & Reviews</h2>
            <div class="spacer" data-height="60"></div>
            <div class="testimonials-wrapper">
                <div class="testimonial-item text-center mx-auto">
                    <div class="thumb mb-3 mx-auto">
                        <img src="{{ asset('assets2/images/avatar-3.svg') }}" alt="customer-name" />
                    </div>
                    <h4 class="mt-3 mb-0">John Doe</h4>
                    <span class="subtitle">Product designer at Dribbble</span>
                    <div class="bg-dark padding-30 shadow-light rounded triangle-top position-relative mt-4">
                        <p class="mb-0">I enjoy working with the theme and learn so much. You guys make the process fun and interesting. Good luck! 👍</p>
                    </div>
                </div>

                <!-- testimonial item -->
                <div class="testimonial-item text-center mx-auto">
                    <div class="thumb mb-3 mx-auto">
                        <img src="{{ asset('assets2/images/avatar-1.svg') }}" alt="customer-name" />
                    </div>
                    <h4 class="mt-3 mb-0">John Doe</h4>
                    <span class="subtitle">Product designer at Dribbble</span>
                    <div class="bg-dark padding-30 shadow-light rounded triangle-top position-relative mt-4">
                        <p class="mb-0">I enjoy working with the theme and learn so much. You guys make the process fun and interesting. Good luck! 🔥</p>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="images/client-1-light.svg" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="images/client-2-light.svg" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="images/client-3-light.svg" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="images/client-4-light.svg" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="images/client-5-light.svg" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="images/client-6-light.svg" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="images/client-7-light.svg" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="images/client-8-light.svg" alt="client-name" />
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- section blog -->
    <section id="blog">

        <div class="container">

            <!-- section title -->
            <h2 class="section-title wow fadeInUp">Latest Posts</h2>

            <div class="spacer" data-height="60"></div>

            <div class="row blog-wrapper">

                <div class="col-md-4">
                    <!-- blog item -->
                    <div class="blog-item rounded bg-dark shadow-light wow fadeIn">
                        <div class="thumb">
                            <a href="#">
                                <span class="category">Reviews</span>
                            </a>
                            <a href="#">
                                <img src="images/blog/1.svg" alt="blog-title" />
                            </a>
                        </div>
                        <div class="details">
                            <h4 class="my-0 title"><a href="#">5 Best App Development Tool for Your Project</a></h4>
                            <ul class="list-inline meta mb-0 mt-2">
                                <li class="list-inline-item">09 February, 2020</li>
                                <li class="list-inline-item">Bolby</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- blog item -->
                    <div class="blog-item rounded bg-dark shadow-light wow fadeIn">
                        <div class="thumb">
                            <a href="#">
                                <span class="category">Tutorial</span>
                            </a>
                            <a href="#">
                                <img src="images/blog/2.svg" alt="blog-title" />
                            </a>
                        </div>
                        <div class="details">
                            <h4 class="my-0 title"><a href="#">Common Misconceptions About Payment</a></h4>
                            <ul class="list-inline meta mb-0 mt-2">
                                <li class="list-inline-item">07 February, 2020</li>
                                <li class="list-inline-item">Bolby</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- blog item -->
                    <div class="blog-item rounded bg-dark shadow-light wow fadeIn">
                        <div class="thumb">
                            <a href="#">
                                <span class="category">Business</span>
                            </a>
                            <a href="#">
                                <img src="images/blog/3.svg" alt="blog-title" />
                            </a>
                        </div>
                        <div class="details">
                            <h4 class="my-0 title"><a href="#">3 Things To Know About Startup Business</a></h4>
                            <ul class="list-inline meta mb-0 mt-2">
                                <li class="list-inline-item">06 February, 2020</li>
                                <li class="list-inline-item">Bolby</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- section contact -->
    <section id="contact">

        <div class="container">

            <!-- section title -->
            <h2 class="section-title wow fadeInUp">Get In Touch</h2>

            <div class="spacer" data-height="60"></div>

            <div class="row">

                <div class="col-md-4">
                    <!-- contact info -->
                    <div class="contact-info">
                        <h3 class="wow fadeInUp">Let's talk about everything!</h3>
                        <p class="wow fadeInUp">Don't like forms? Send me an <a href="mailto:name@example.com">email</a>. 👋</p>
                    </div>
                </div>

                <div class="col-md-8">
                    <!-- Contact Form -->
                    <form id="contact-form" class="contact-form mt-6" method="post" action="https://jthemes.net/themes/html/bolby/demo/form/contact.php">

                        <div class="messages"></div>

                        <div class="row">
                            <div class="column col-md-6">
                                <!-- Name input -->
                                <div class="form-group">
                                    <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Your name" required="required" data-error="Name is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="column col-md-6">
                                <!-- Email input -->
                                <div class="form-group">
                                    <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Email address" required="required" data-error="Email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="column col-md-12">
                                <!-- Email input -->
                                <div class="form-group">
                                    <input type="text" class="form-control" id="InputSubject" name="InputSubject" placeholder="Subject" required="required" data-error="Subject is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="column col-md-12">
                                <!-- Message textarea -->
                                <div class="form-group">
                                    <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" placeholder="Message" required="required" data-error="Message is required."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Send Message</button><!-- Send Button -->

                    </form>
                    <!-- Contact Form end -->
                </div>

            </div>

        </div>

    </section>

    <div class="spacer" data-height="96"></div>

</main>

<a href="javascript:" id="return-to-top"><i class="fas fa-arrow-up"></i></a>

<script src="{{ asset('assets2/js/jquery-1.12.3.min.js') }}"></script>
<script src="{{ asset('assets2/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets2/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets2/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets2/js/popper.min.js') }}"></script>
<script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets2/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets2/js/infinite-scroll.min.js') }}"></script>
<script src="{{ asset('assets2/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets2/js/slick.min.js') }}"></script>
<script src="{{ asset('assets2/js/contact.js') }}"></script>
<script src="{{ asset('assets2/js/validator.js') }}"></script>
<script src="{{ asset('assets2/js/wow.min.js') }}"></script>
<script src="{{ asset('assets2/js/morphext.min.js') }}"></script>
<script src="{{ asset('assets2/js/parallax.min.js') }}"></script>
<script src="{{ asset('assets2/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets2/js/custom.js') }}"></script>

</body>
</html>
