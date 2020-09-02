<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{ __('app.precovid.description') }}">

        <title>{{ config('app.name') }} &#8211; {{ __('app.precovid.title') }}</title>

        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('res/images/favicon-32.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('res/images/favicon-192.png') }}">

        <meta name="og:title" content="{{ config('app.name') }} &#8211; {{ __('app.precovid.title') }}">
        <meta name="og:description" content="{{ __('app.precovid.description') }}">
        <meta name="og:type" content="website">
        <meta name="og:image" content="{{ asset('res/images/og_image.png') }}">
        <meta name="og:url" content="{{ url('/') }}">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('res/css/app.css') }}" rel="stylesheet">

        <script type="text/javascript" src="{{ asset('res/js/app.js') }}" defer></script>

        @yield('extra-libs')
    </head>
    <body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{ asset('res/images/logo_precovid.black.png') }}" alt="Precovid.org" width="100">
                </a>

                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a href="{{ url('/faq') }}" class="nav-link @if (Route::is('faq')) active @endif">{{ __('app.titles.faq') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://wa.me/?text={{ __('app.contents.share_whatsapp') }}" class="nav-link" target="_blank">
                                {{ __('app.titles.share_whatsapp') }}
                            </a>
                        </li>
                        @auth
                        <li class="nav-item dropdown">
                            <a id="navDropdown" href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                {{ Auth::user()->email }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledBy="navDropdown">
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('app.buttons.logout') }}
                                </a>

                                <form action="{{ route('logout') }}" method="POST" style="display:none;" id="logout-form">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endauth
                        <li class="nav-item d-flex">
                            <a href="https://twitter.com/precovid" class="nav-link" target="_blank">
                                <i class="fab fa-twitter mx-2"></i>
                            </a>
                            <a href="https://facebook.com/precovid" class="nav-link" target="_blank">
                                <i class="fab fa-facebook mx-2"></i>
                            </a>
                            <a href="https://instagram.com/precovid19" class="nav-link" target="_blank">
                                <i class="fab fa-instagram mx-2"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
    </body>
</html>
