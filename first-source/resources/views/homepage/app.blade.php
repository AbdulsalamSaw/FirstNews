<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>المصدر الاول</title>

    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css?family=Nunito|Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Custom CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/search.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/category.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/news.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    
</head>
<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="#" class="logo me-auto"><img src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="height: 50px;"></a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link" href="#">{{ __('home.home') }}</a></li>
                    <li class="dropdown">
                        <a href="#"><span>{{ __('categories.categories') }}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('singleCategory.show', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>{{ __('news.latestNews') }}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            @foreach ($latestArticles as $article)
                                <li><a href="{{ route('singleNew.show', $article->id) }}">{{ $article->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Config::get('languages')[App::getLocale()] }}
                        </a>
                        <div class="dropdown-menu">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

    <section id="search" class="search-section d-flex align-items-center justify-content-center">
        <div class="container text-center">
            <div class="search-content">
                <h1 class="mb-4">{{ __('search.searchForArticles') }}</h1>
                <form action="{{ route('search') }}" method="GET" class="search-form d-flex align-items-center justify-content-center">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control form-control-lg" placeholder="{{ __('search.searchPlaceholder') }}">
                        <button type="submit" class="btn btn-primary btn-lg ml-2">{{ __('search.search') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <div class="container mt-5">
        <section id="categories" class="categories-section section-bg">
            <div class="section-title">
                <h2>{{ __('categories.categories') }}</h2>
                <p>{{ __('categories.websiteCategories') }}</p>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="category-item">
                            <a href="{{ route('singleCategory.show', $category->id) }}">
                                <div class="category-img">
                                    <img src="{{ $category->image }}" class="img-fluid" alt="{{ $category->name }}">
                                </div>
                                <div class="category-info">
                                    <h4>{{ $category->name }}</h4>
                                    <span>{{ $category->description }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    
    <div class="container mt-5">
        <section id="new" class="new-section section-bg">
            <div class="section-title">
                <h2>{{ __('articles.articles') }}</h2>
                <p>{{ __('articles.welcomeToLatestTopics') }}</p>
            </div>
            <div class="row">
                @foreach ($latestArticles as $article)
                    <div class="col-lg-4">
                        <div class="new-item">
                            <a href="{{ route('singleNew.show', $article->id) }}">
                                <div class="new-img">
                                    <img src="{{ $article->image }}" class="img-fluid" alt="{{ $article->title }}">
                                </div>
                                <div class="new-info">
                                    <h4>{{ $article->title }}</h4>
                                    <span>{{ $article->description }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

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
    </footer>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
