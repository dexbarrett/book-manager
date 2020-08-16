<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <title>Hello, world!</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    @auth
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="btn-group ml-auto">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                    {{  auth()->user()->name }}
                </button>
                <div class="dropdown-menu dropdown-menu-lg-right">
                    <a class="dropdown-item" href="{{ action('LoginController@dashboard')  }}">Dashboard</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ action('LoginController@logout')  }}">Logout</a>
                </div>
            </div>
        </div>
    @endauth
</nav>
<div class="container">
    @yield('body')
</div>

@javascript('language', app()->getLocale())
<script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script src="{{ mix('/js/app.js')  }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/{{ app()->getLocale() }}.min.js"></script>
</body>
</html>