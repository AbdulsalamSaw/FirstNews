<!DOCTYPE html>
<html lang="ar" class="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}">
        <link href="{{ url('/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.min.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    </head>
    <body  >
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3">{{__('messages.cpanel')}}</a>
            <ul class="navbar-nav ms-auto me-3 me-lg-4">
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
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            </ul>
          </nav>
          
       
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div  class="sb-sidenav-menu-heading"><a class="nav-link " href="/home"> {{__('messages.cpanel')}}</a>
                            </div>
                            <div class="sb-sidenav-menu-heading">{{__('messages.story')}}
                                <div class="sb-nav-link-icon">
                                    <a class="nav-link "href="">{{__('messages.liststory')}}
                                    </a>
                                </div>
                              
                            </div>
                            <div class="sb-sidenav-menu-heading">{{__('messages.user')}}
                                <div class="sb-nav-link-icon">
                                    <a class="nav-link " href="/users">{{__('messages.user')}} 
                                    </a>
                                </div>
                        </div>
                    </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">{{__('messages.logged')}}</div>
                        {{ Auth::user()->name }}                     </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">@yield('page_title')</h1>
                        @yield('content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">First Source &copy; Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
