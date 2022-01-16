<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('public/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('public/assets/jquery/jquery.min.js') }}"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            @include('layouts.header')
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>@yield('page-title')</h3>
                    <p class="text-subtitle text-muted">@yield('page-title-desc')</p>
                </div>
                <section class="section">
                    @yield('cards')
                    @yield('content')
                </section>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/app.js') }}"></script>
    <script src="{{ asset('public/assets/js/chart.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('public/assets/js/main.js') }}"></script>
    <script src="{{ asset('public/js/jQuery.print.js') }}"></script>
    <script src="{{ asset('public/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            $('.js-example-basic-single').select2();
            $('#multiple_code').select2();
        });
    </script>
    @yield('scripts')
</body>

</html>
