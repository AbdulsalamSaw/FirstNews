<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>"f"</title>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">
    <link href={{ asset('assets/css/style.css') }} rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header id="header" >
        <div class="container d-flex ">
            <a href="index.html" class="logo me-auto rtl"><img class="logo" src="/assets/img/logo.png" alt=""></a>
            <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto " href="/"> {{ __('home.home') }}</a></li>
                <li class="dropdown">
                    <a href="#"><span> {{ __('categories.categories') }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach ($newCategory as $category)
                            <li>
                                <a href="{{ route('singleCategory.show', $category->id) }}">{{$category->name}}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>

                <li class="dropdown {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
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


    <div class="single-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sn-related">
                        <h2>{{ __('articles.relatedNews') }}</h2>
                        <div class="row sn-slider">
                            @foreach ($relatedNews as $related)
                            <div  class="col-md-9" style="margin: 5px;">
                                <div class="sn-img">
                                    <div class="category-img">
                                        <img src="{{$related->image}}" class="img-fluid" alt="" style="max-height: 250px; /* تعديل الحجم الأقصى هنا */">
                                    </div>
                                <div class="sn-title">
                                        <a href="{{ route('singleNew.show', $related->id) }}">{{$related->title}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">

                        <div class="sidebar-widget">
                            <h2 class="sw-title">{{ __('categories.newsCategory') }}</h2>
                            <div class="category">
                                <ul>
                                    @foreach ($newCategory as $category)
                                    <li>
                                        <a href="{{ route('singleCategory.show', $category->id) }}">{{$category->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href=""><img src="/assets/img/ads-2.jpg" alt="Image"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </footer><!-- End Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>
