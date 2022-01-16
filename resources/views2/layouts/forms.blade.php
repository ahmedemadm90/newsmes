<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body>
    <div id="auth">
        <div class="container">
            {{-- <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('assets/images/logo.png') }}" height="100" class='mb-4'>
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/logo.png') }}" height="100" class='mb-4'>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
            {{-- @yield('content') --}}
        </div>

    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
