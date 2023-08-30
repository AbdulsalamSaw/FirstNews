<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
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
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
            <div class="align-items-center d-none d-md-flex">
                <i class="bi bi-clock"></i> {{ now()->format('l - F j, Y, h:i A') }}
            </div>
        </div>
    </div>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
          <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>
          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto " href="#hero"> {{ __('home.home') }}</a></li>
                <li class="dropdown">
                    <a href="#"><span> {{ __('categories.categories') }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach ($categories as $category)
                            <li>
                                <a href="#">{{ $category->name }}</a>
                                @if ($category->articles->count() > 0)
                                    <ul>
                                        @foreach ($category->articles as $article)
                                            <li><a href="#">{{ $article->title }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                       
                    </ul>
                </li>
        
                <li class="dropdown">
                    <a href="#"><span> {{ __('news.latestNews') }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach ($latestArticles as $article)
                            <li><a href="#">{{ $article->title }}</a></li>
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
                <?php foreach ($latestNews as $index => $news): ?>
                <article class="news-article carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="image-container" style="background-image: url('<?php echo $news->image; ?>');">
                        <div class="news-overlay">
                            <h2><?php echo $news->title; ?></h2>
                            <p class="news-description">
                                <?php
                                $trimmedContent = mb_substr($news->content, 0, 300);
                                echo $trimmedContent . (mb_strlen($news->content) > 300 ? "..." : "");
                                ?>
                            </p>
                                                        
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </section>
    </section>
      

    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

 <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="copyright">
                &copy; SSCode <strong><span>First Source</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://www.facebook.com/SALAM1248">Abdulsalam Sawalha</a>
            </div>
        </div>
    </div>
</footer><!-- End Footer -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    const intervalDuration = 10000; 

    function moveNext() {
        const activeArticle = $('.carousel-inner .carousel-item.active');
        const nextArticle = activeArticle.next('.carousel-item');

        if (nextArticle.length === 0) {
            $('.carousel-item').first().addClass('active');
        } else {
            activeArticle.animate({ left: '-100%' }, 500, function() {
                activeArticle.removeClass('active');
                nextArticle.addClass('active').css('left', '100%').animate({ left: 0 }, 500);
            });
        }
    }

    function movePrev() {
        const activeArticle = $('.carousel-inner .carousel-item.active');
        const prevArticle = activeArticle.prev('.carousel-item');

        if (prevArticle.length === 0) {
            $('.carousel-item').last().addClass('active');
        } else {
            activeArticle.animate({ left: '100%' }, 500, function() {
                activeArticle.removeClass('active');
                prevArticle.addClass('active').css('left', '-100%').animate({ left: 0 }, 500);
            });
        }
    }

    function autoMoveNext() {
        moveNext();
        setTimeout(autoMoveNext, intervalDuration);
    }

    function autoMovePrev() {
        movePrev();
        setTimeout(autoMovePrev, intervalDuration);
    }

    $('.carousel-control-next').click(function () {
        moveNext();
    });

    $('.carousel-control-prev').click(function () {
        movePrev();
    });

    autoMoveNext();
    autoMovePrev();
});


</script>
</body>
</html>
