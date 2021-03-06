<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{ $app_name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="{{ $app_description }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset("assets/$favicon") }}">

    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets2/css/all.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets2/css/simple-line-icons.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets2/css/slick.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets2/css/animate.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets2/css/magnific-popup.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" type="text/css" />
    <style>
        .swal2-title {
            color: #595959!important;
        }
    </style>
</head>

<body class="dark">
{{--<div id="preloader">--}}
{{--    <div class="outer">--}}
{{--        <div class="infinityChrome">--}}
{{--            <div></div>--}}
{{--            <div></div>--}}
{{--            <div></div>--}}
{{--        </div>--}}

{{--        <div class="infinity">--}}
{{--            <div><span></span></div>--}}
{{--            <div><span></span></div>--}}
{{--            <div><span></span></div>--}}
{{--        </div>--}}

{{--        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo-outer">--}}
{{--            <defs>--}}
{{--                <filter id="goo">--}}
{{--                    <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur" />--}}
{{--                    <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />--}}
{{--                    <feBlend in="SourceGraphic" in2="goo" />--}}
{{--                </filter>--}}
{{--            </defs>--}}
{{--        </svg>--}}
{{--    </div>--}}
{{--</div>--}}

<header class="mobile-header-1">
    <div class="container">
        <div class="menu-icon d-inline-flex mr-4">
            <button><span></span></button>
        </div>
    </div>
</header>

<header class="desktop-header-1 d-flex align-items-start flex-column">
    <div class="site-logo">
        <a href="{{ route('/') }}">
            <img src="{{ asset("assets/$logo") }}" alt="" />
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
        <span class="copyright">© 2020 {{ $copyright }}.</span>
    </div>
</header>


<main class="content">
    <section id="home" class="home d-flex align-items-center">
        <div class="container">
            <div class="intro">
                <img src="{{ asset("assets/$foto") }}" alt="" class="mb-4 img-fluid shadow-sm" style="height: 180px;border-radius: 10px;"  />
                <h1 class="mb-2 mt-0">{{ $app_name }}</h1>
                <span>I'm a <span class="text-rotating">{{ $app_description }}</span></span>

                <ul class="social-icons light list-inline mb-0 mt-4">
                    <li class="list-inline-item"><a href="{{ $instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="{{ $twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="{{ $github }}" target="_blank"><i class="fab fa-github"></i></a></li>
                </ul>

                <div class="mt-4">
                    <a href="#contact" class="btn btn-default">Hire me</a>
                </div>
            </div>

            <div class="scroll-down">
                <a href="#services" class="mouse-wrapper">
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
                @foreach($services as $service)
                <div class="col-md-4">
                    <div class="service-box rounded data-background padding-30 text-center text-light shadow-blue" data-color="{{ $service->color }}">
                        <img src="{{ asset("assets/$service->image") }}" alt="" />
                        <h3 class="mb-3 mt-0">{{ $service->name }}</h3>
                        <p class="mb-0">{{ $service->description }}</p>
                    </div>
                    <div class="spacer d-md-none d-lg-none" data-height="30"></div>
                </div>
                @endforeach


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
                @foreach($tags as $tag)
                <li class="list-inline-item" data-filter="{{ "." . strtolower($tag) }}">{{ $tag }}</li>
                @endforeach
            </ul>
            <div class="pf-filter-wrapper">
                <select class="portfolio-filter-mobile">
                    <option value="*">Everything</option>
                    @foreach($tags as $tag)
                        <option value="{{ "." . strtolower($tag) }}">{{ $tag }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row portfolio-wrapper">
                @foreach($portofolio as $item)
                    <div class="col-md-4 col-sm-6 grid-item {{ strtolower(join(' ', explode(',', $item->tags))) }}">
                        <a href="#small-dialog{{ $item->id }}" class="work-content">
                            <div class="portfolio-item rounded shadow-dark" style="border-radius: 5px!important;">
                                <div class="details">
                                    <span class="term">{{ $item->tags }}</span>
                                    <h4 class="title">{{ $item->name }}</h4>
                                    <span class="more-button"><i class="icon-options"></i></span>
                                </div>
                                <div class="thumb">
                                    <img src="{{ asset("assets/$item->image") }}" alt="Portfolio-title" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                        <div id="small-dialog{{ $item->id }}" class="white-popup zoom-anim-dialog mfp-hide">
                            <img src="{{ asset("assets/$item->image") }}" alt="Title" />
                            <h2>{{ $item->name }}</h2>
                            {!! $item->content !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>

    @if(count($clients) > 0)
    <section id="testimonials">
        <div class="container">
            <h2 class="section-title wow fadeInUp">Clients</h2>
            <div class="row">
                @foreach($clients as $client)
                <div class="col-md-3 col-6">
                    <div class="client-item">
                        <div class="inner">
                            <img src="{{ asset("assets/$client->image") }}" alt="{{ $client->name }}" />
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section id="blog">
        <div class="container">
            <h2 class="section-title wow fadeInUp">Latest Posts</h2>
            <div class="spacer" data-height="60"></div>
            <div class="row blog-wrapper">
                @foreach($latest_posts as $post)
                <div class="col-md-4">
                    <div class="blog-item rounded bg-dark shadow-light wow fadeIn" style="border-radius: 5px!important;">
                        <a href="#small-dialog{{ $post->id }}" class="work-content">
                            <div class="portfolio-item rounded shadow-dark" style="border-radius: 5px!important;">
{{--                                <div class="details">--}}
{{--                                    <h4 class="title">{{ $post->name }}</h4>--}}
{{--                                </div>--}}
                                <div class="thumb">
                                    <img src="{{ asset("assets/$post->image") }}" alt="Portfolio-title" />
{{--                                    <div class="mask"></div>--}}
                                </div>
                            </div>
                        </a>
                        <div id="small-dialog{{ $post->id }}" class="white-popup zoom-anim-dialog mfp-hide">
                            <img src="{{ asset("assets/$post->image") }}" alt="Title" />
                            <h2>{{ $post->name }}</h2>
                            {!! $post->content !!}
                        </div>
{{--                        <div class="thumb">--}}
{{--                            <a href="#">--}}
{{--                                <img src="{{ asset("assets/$post->image") }}" alt="{{ $post->name }}" />--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="details">--}}
{{--                            <h4 class="my-0 title"><a href="#">{{ $post->name }}</a></h4>--}}
{{--                            <ul class="list-inline meta mb-0 mt-2">--}}
{{--                                <li class="list-inline-item">{{ fulldate($post->date) }}</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <h2 class="section-title wow fadeInUp">Get In Touch</h2>
            <div class="spacer" data-height="60"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info">
                        <h3 class="wow fadeInUp">Let's talk about everything!</h3>
                        <p class="wow fadeInUp">Don't like forms? Send me an <a href="mailto:{{ $email }}">email</a>. 👋</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <form id="contact-form" class="contact-form mt-6" method="post">
                        <div class="messages"></div>
                        <div class="row">
                            <div class="column col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your name" required>
                                </div>
                            </div>
                            <div class="column col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                                </div>
                            </div>

                            <div class="column col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" required>
                                </div>
                            </div>

                            <div class="column col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" rows="5" placeholder="Message" required></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Send Message</button>
                    </form>
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
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    let getFormData = ($form) => {
        let unindexed_array = $form.serializeArray();
        let indexed_array = {};
        $.map(unindexed_array, function(n, i){
            indexed_array[n['name']] = n['value'];
        });
        return indexed_array;
    }
    let $contactForm = $('#contact-form');
    $contactForm.submit((e) => {
        e.preventDefault();
        let data = getFormData($contactForm);
        $.post("{{ url('api/message/save') }}", data, () => {
            swal.fire("Message send !");
        }).fail(() => {
            swal.fire("Fill all form !");
        })
    });
</script>
</body>
</html>
