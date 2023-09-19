<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>المصدر الاول</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href={{ asset('assets/vendor/animate.css/animate.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/aos/aos.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/boxicons/css/boxicons.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/glightbox/css/glightbox.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/swiper/swiper-bundle.min.css') }} rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href={{ asset('assets/css/homestyle.sass') }} rel="stylesheet">
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">

    <link href={{ asset('assets/css/style.css') }} rel="stylesheet">
</head>
<body>

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
          <a href="#" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>
          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto " href="#"> {{ __('home.home') }}</a></li>
                <li class="dropdown">
                    <a href="#"><span> {{ __('categories.categories') }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('singleCategory.show', $category->id) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#"><span> {{ __('news.latestNews') }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach ($latestArticles as $article)
                            <li>
                                <a href="{{ route('singleNew.show', $article->id) }}">{{ $article->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown {{ app()->getLocale() == 'ar' ? 'float-right' : 'float-left' }}">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Config::get('languages')[App::getLocale()] }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                          <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                        @endif
                      @endforeach
                    </div>
                  </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        </div>
      </header><!-- End Header -->
      <section id="hero">
        <section class="top-news carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($latestNews as $news)
                <article class="news-article carousel-item">
                    <a href="{{ route('singleNew.show', $news->id) }}">
                        <div class="image-container" style="background-image: url('{{$news->image}}');">
                            <div class="news-overlay">
                                <h2>{{ $news->title }}</h2>
                            </div>
                        </div>
                    </a>
                </article>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </section>
    </section>

    <br>
    <br>

    <div class="container">
        <section id="categories" class="categories-section section-bg">
            <div class="section-title">
                <h2>{{ __('categories.categories') }}</h2>
                <p>{{ __('categories.websiteCategories') }}</p>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="category-item" data-aos-delay="100">
                        <a href="{{ route('singleCategory.show', $category->id) }}">
                            <div class="category-img">
                                <img src="{{$category->image}}" class="img-fluid" alt="">
                            </div>
                            <div class="category-info">
                                <h4>{{$category->name}}</h4>
                                <span>{{$category->description}}</span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>


    <div class="container">
        <section id="new" class="new-section section-bg">
            <div class="section-title">
                <h2>{{ __('articles.articles') }}</h2>

                <p>{{ __('articles.welcomeToLatestTopics') }}</p>
            </div>
            <div class="row">
                @foreach ($latestArticles as $article)
                    <div class="col-lg-4">
                        <div class="new-item" data-aos-delay="100">
                            <a href="{{ route('singleNew.show', $article->id) }}">
                            <div class="new-img">
                                <img src="{{$article->image}}" class="img-fluid" alt="">
                            </div>
                            <div class="new-info">
                                <h4>
                                    {{ $article->title }}
                                </h4>
                                <span>{{$article->description}}</span>
                            </div>
                        </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>


 <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="copyright">
                &copy; SSCode <strong><span>First Source</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Development by <a href="https://www.facebook.com/SALAM1248">Abdulsalam Sawalha</a>
            </div>
        </div>
    </div>
</footer><!-- End Footer -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.carousel-inner .carousel-item:first').addClass('active');

    $('.carousel-control-prev').click(function() {
        var currentSlide = $('.carousel-inner .carousel-item.active');

        if (currentSlide.is(':first-child')) {
            $('.carousel-inner .carousel-item:last').addClass('active');
        } else {
            currentSlide.prev().addClass('active');
        }
        currentSlide.removeClass('active');
    });

    $('.carousel-control-next').click(function() {
        var currentSlide = $('.carousel-inner .carousel-item.active');

        if (currentSlide.is(':last-child')) {
            $('.carousel-inner .carousel-item:first').addClass('active');
        } else {
            currentSlide.next().addClass('active');
        }
        currentSlide.removeClass('active');
    });

    setInterval(function() {
        var currentSlide = $('.carousel-inner .carousel-item.active');
        var nextSlide = currentSlide.next();

        if (currentSlide.is(':last-child')) {
            nextSlide = $('.carousel-inner .carousel-item:first');
        }

        currentSlide.removeClass('active');
        nextSlide.addClass('active');
    }, 30000);
});


</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
