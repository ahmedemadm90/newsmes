<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>SMEs World عالم المشروعات الصغيرة والمتوسطة</title>
    <link rel="icon" type="image/png" href="{{asset('public/images/favicon.png')}}">
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/photoswipe/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/photoswipe/default-skin/default-skin.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.rtl.css') }}">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{asset('public/vendor/fontawesome/css/all.min.css')}}">
    <!-- font - stroyka -->
    <link rel="stylesheet" href="{{asset('public/fonts/stroyka/stroyka.css')}}">
</head>

<body>
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

    </style>
    <!-- site -->
    <div class="site">
        <!-- mobile site__header -->
        <header class="site__header d-lg-none">
            <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
            <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
                <div class="mobile-header__panel">
                    <div class="container">
                        <div class="mobile-header__body">
                            <button class="mobile-header__menu-button">
                                <svg width="18px" height="14px">
                                    <use xlink:href="images/sprite.svg#menu-18x14"></use>
                                </svg>
                            </button>
                            <a class="mobile-header__logo" href="{{ route('home') }}">
                                <!-- mobile-logo -->

                                <img src="{{ asset('assets/images/logo.png') }}" height="50x" class=''>
                                <!-- mobile-logo / end -->
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- mobile site__header / end -->
        <!-- desktop site__header -->
        <header class="site__header d-lg-block d-none">
            <div class="site-header">
                <!-- .topbar -->
                <div class="site-header__topbar topbar">
                    <div class="topbar__container container">
                        <div class="topbar__row">
                            <div class="topbar__item topbar__item--link">
                                <a class="topbar-link" href="about-us.html">About Us</a>
                            </div>
                            <div class="topbar__item topbar__item--link">
                                <a class="topbar-link" href="contact-us.html">Contact us</a>
                            </div>
                            <div class="topbar__spring"></div>
                            @guest
                                <div class="topbar__item topbar__item--link">
                                    <a class="topbar-link" href="{{ route('login') }}">Login</a>
                                </div>
                            @endguest
                            @auth
                                <div class="topbar__item">
                                    <div class="topbar-dropdown">
                                        <button class="topbar-dropdown__btn" type="button">
                                            {{ auth()->user()->name }}
                                            <svg width="7px" height="5px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                            </svg>
                                        </button>
                                        <div class="topbar-dropdown__body">
                                            <!-- .menu -->
                                            <div class="menu menu--layout--topbar ">
                                                <div class="menu__submenus-container"></div>
                                                <ul class="menu__list">
                                                    <li class="menu__item">
                                                        <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                        <div class="menu__item-submenu-offset"></div>
                                                        <a class="menu__item-link" href="{{ route('home') }}">
                                                            Dashboard
                                                        </a>
                                                    </li>
                                                    <li class="menu__item">
                                                        <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                        <div class="menu__item-submenu-offset"></div>
                                                        <a class="menu__item-link" href="{{ route('logout') }}">
                                                            Logout
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- .menu / end -->
                                        </div>
                                    </div>
                                </div>
                            @endauth
                            <div class="topbar__item">
                                <div class="topbar-dropdown">
                                    <button class="topbar-dropdown__btn" type="button">
                                        Language: <span class="topbar__item-value">EN</span>
                                        <svg width="7px" height="5px">
                                            <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                        </svg>
                                    </button>
                                    <div class="topbar-dropdown__body">
                                        <!-- .menu -->
                                        <div class="menu menu--layout--topbar  menu--with-icons ">
                                            <div class="menu__submenus-container"></div>
                                            <ul class="menu__list">
                                                <li class="menu__item">
                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                    <div class="menu__item-submenu-offset"></div>
                                                    <a class="menu__item-link" href="">
                                                        <div class="menu__item-icon"><img
                                                                srcset="images/languages/language-1.png 1x, images/languages/language-1@2x.png 2x"
                                                                src="images/languages/language-1.png" alt=""></div>
                                                        English
                                                    </a>
                                                </li>
                                                <li class="menu__item">
                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                    <div class="menu__item-submenu-offset"></div>
                                                    <a class="menu__item-link" href="">
                                                        <div class="menu__item-icon"><img
                                                                srcset="images/languages/language-2.png 1x, images/languages/language-2@2x.png 2x"
                                                                src="images/languages/language-2.png" alt=""></div>
                                                        French
                                                    </a>
                                                </li>
                                                <li class="menu__item">
                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                    <div class="menu__item-submenu-offset"></div>
                                                    <a class="menu__item-link" href="">
                                                        <div class="menu__item-icon"><img
                                                                srcset="images/languages/language-3.png 1x, images/languages/language-3@2x.png 2x"
                                                                src="images/languages/language-3.png" alt=""></div>
                                                        German
                                                    </a>
                                                </li>
                                                <li class="menu__item">
                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                    <div class="menu__item-submenu-offset"></div>
                                                    <a class="menu__item-link" href="">
                                                        <div class="menu__item-icon"><img
                                                                srcset="images/languages/language-4.png 1x, images/languages/language-4@2x.png 2x"
                                                                src="images/languages/language-4.png" alt=""></div>
                                                        Russian
                                                    </a>
                                                </li>
                                                <li class="menu__item">
                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                    <div class="menu__item-submenu-offset"></div>
                                                    <a class="menu__item-link" href="">
                                                        <div class="menu__item-icon"><img
                                                                srcset="images/languages/language-5.png 1x, images/languages/language-5@2x.png 2x"
                                                                src="images/languages/language-5.png" alt=""></div>
                                                        Italian
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- .menu / end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .topbar / end -->
                <div class="site-header__middle container">
                    <div class="site-header__logo">
                        <a href="{{ route('front') }}">
                            <!-- logo -->
                            <img src="{{ asset('assets/images/logo.png') }}" height="75" class='mt-3 mb-4'>
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="196px" height="26px">
                                <path
                                    d="M194.797,18 L184,18 C184,18.552 183.552,19 183,19 L182,19 C181.448,19 181,18.552 181,18 L181,16 L178.377,16 C177.708,16 177.119,15.556 176.935,14.912 L173.246,2 L168,2 L168,4 L168.500,4 C169.328,4 170,4.672 170,5.500 L170,24.500 C170,25.328 169.328,26 168.500,26 L165.500,26 C164.672,26 164,25.328 164,24.500 L164,5.500 C164,4.672 164.672,4 165.500,4 L166,4 L166,1.500 C166,0.672 166.672,0 167.500,0 L173.622,0 C174.292,0 174.881,0.444 175.065,1.088 L178.754,14 L181,14 L181,13 C181,12.448 181.448,12 182,12 L183,12 C183.552,12 184,12.448 184,13 L194.797,13 C195.461,13 196,13.539 196,14.203 L196,16.797 C196,17.461 195.461,18 194.797,18 ZM156.783,26 L154.483,26 C153.767,26 153.129,25.552 152.884,24.878 L150.437,18.135 C150.407,18.054 150.331,18 150.245,18 L142.768,18 C142.682,18 142.606,18.054 142.576,18.135 L140.129,24.878 C139.884,25.552 139.245,26 138.530,26 L136.230,26 C135.395,26 134.815,25.169 135.100,24.383 L143.445,1.122 C143.690,0.448 144.328,0 145.044,0 L147.969,0 C148.685,0 149.323,0.448 149.568,1.122 L157.913,24.383 C158.198,25.169 157.618,26 156.783,26 ZM148.472,12.725 L146.698,7.848 C146.633,7.668 146.380,7.668 146.315,7.848 L144.541,12.725 C144.492,12.859 144.591,13 144.733,13 L148.280,13 C148.422,13 148.521,12.859 148.472,12.725 ZM130.493,26 L128.090,26 C127.555,26 127.060,25.714 126.792,25.250 L122.610,18 L120.003,22.520 L120.003,24.500 C120.003,25.328 119.333,26 118.505,26 L116.507,26 C115.680,26 115.009,25.328 115.009,24.500 L115.009,1.500 C115.009,0.672 115.680,0 116.507,0 L118.505,0 C119.333,0 120.003,0.672 120.003,1.500 L120.003,12.520 L126.792,0.750 C127.060,0.286 127.555,0 128.090,0 L130.493,0 C131.646,0 132.367,1.250 131.791,2.250 L125.487,13 L131.791,23.750 C132.367,24.750 131.646,26 130.493,26 ZM103.987,15.775 L103.987,24.500 C103.987,25.328 103.315,26 102.486,26 L100.485,26 C99.656,26 98.984,25.328 98.984,24.500 L98.984,15.775 L98.594,15.100 L91.180,2.250 C90.610,1.250 91.330,0 92.481,0 L94.792,0 C95.322,0 95.823,0.290 96.093,0.750 L101.486,10.090 L106.879,0.750 C107.149,0.290 107.649,0 108.179,0 L110.491,0 C111.641,0 112.362,1.250 111.791,2.250 L103.987,15.775 ZM79,26 C71.821,26 66,20.179 66,13 C66,5.820 71.821,-0.001 79,-0.001 C86.180,-0.001 92.001,5.820 92.001,13 C92.001,20.179 86.180,26 79,26 ZM79,5 C74.582,5 71,8.582 71,13 C71,17.418 74.582,21 79,21 C83.418,21 87,17.418 87,13 C87,8.582 83.418,5 79,5 ZM62.793,23.750 C63.362,24.750 62.643,26 61.494,26 L59.186,26 C58.656,26 58.157,25.710 57.887,25.250 L53.711,18 L49.005,18 L49.005,24.500 C49.005,25.330 48.335,26 47.506,26 L45.508,26 C44.679,26 44.009,25.330 44.009,24.500 L44.009,1.500 C44.009,0.670 44.679,0 45.508,0 L54,0 C58.966,0 62.992,4.030 62.992,9 C62.992,12.240 61.274,15.090 58.706,16.670 L62.793,23.750 ZM54,5 L50.004,5 C49.454,5 49.005,5.450 49.005,6 L49.005,12 C49.005,12.550 49.454,13 50.004,13 L54,13 C56.208,13 57.997,11.210 57.997,9 C57.997,6.790 56.208,5 54,5 ZM39.500,5 L33,5 L33,24.500 C33,25.328 32.328,26 31.500,26 L29.500,26 C28.672,26 28,25.328 28,24.500 L28,5 L21.500,5 C20.672,5 20,4.328 20,3.500 L20,1.500 C20,0.672 20.672,0 21.500,0 L39.500,0 C40.328,0 41,0.672 41,1.500 L41,3.500 C41,4.328 40.328,5 39.500,5 ZM16.487,8 L14.181,8 C13.565,8 13.040,7.611 12.790,7.048 C12.261,5.856 10.765,5 9,5 C6.793,5 5.005,6.340 5.005,8 C5.005,8.940 5.575,9.780 6.483,10.320 C6.706,10.455 6.948,10.574 7.206,10.673 C8.059,11 8.412,12.020 7.955,12.812 L6.948,14.558 C6.573,15.208 5.768,15.499 5.080,15.201 C3.872,14.679 2.815,13.924 1.989,13 C0.751,11.630 0.012,9.890 0.012,8 C0.012,3.580 4.037,0 9,0 C13.254,0 17.017,2.629 17.950,6.163 C18.196,7.095 17.450,8 16.487,8 ZM1.513,18 L3.820,18 C4.435,18 4.960,18.389 5.210,18.952 C5.739,20.144 7.236,21 9,21 C11.207,21 12.995,19.660 12.995,18 C12.995,17.060 12.426,16.220 11.517,15.680 C11.294,15.544 11.052,15.426 10.794,15.327 C9.941,14.999 9.588,13.980 10.045,13.188 L11.053,11.442 C11.427,10.792 12.233,10.501 12.920,10.799 C14.128,11.320 15.185,12.075 16.011,13 C17.249,14.370 17.988,16.110 17.988,18 C17.988,22.420 13.964,26 9,26 C4.747,26 0.983,23.371 0.050,19.837 C-0.196,18.905 0.550,18 1.513,18 Z">
                                </path>
                            </svg> --}}
                            <!-- logo / end -->
                        </a>
                    </div>
                    <button id="myBtn" class="btn btn-info w-auto m-auto">{{ __('Search') }}</button>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <form class="" action="{{ route('front.search') }}">
                                <div class="row">
                                    {{-- <select class="form-control col-md m-2" aria-label="Default select example"
                                        name="category_id">
                                        <option value="all" disabled selected>{{ __('All Categories') }}</option>
                                        @foreach ($categories as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->en_name }}</option>
                                            @foreach ($parent->children as $child)
                                                <option value="{{ $child->id }}">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $child->en_name }}</option>
                                                @if ($child->children)
                                                    @foreach ($child->children as $item)
                                                        <option value="{{ $item->id }}">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $item->en_name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select> --}}
                                    <input type="text" class="form-control col-md m-2" name="keyword"
                                        placeholder="Search Keyword">
                                </div>
                                <div class="row">
                                    <select class="form-control col-md m-2" name="idea_id">
                                        <option selected disabled hidden>{{ __('Select Idea') }}</option>
                                        @foreach ($ideas as $idea)
                                            <option value="{{$idea->id}}">{{ $idea->en_title }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control col-md m-2" name="field_id">
                                        <option selected disabled hidden>{{ __('Select Investment Field') }}</option>
                                        @foreach ($fields as $field)
                                            <option value="{{$field->id}}">{{ $field->en_title }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control col-md m-2" name="tech_id">
                                        <option selected disabled hidden>{{ __('Select Technology') }}</option>
                                        @foreach ($techs as $tech)
                                            <option value="{{$tech->id}}">{{ $tech->en_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <input class="form-control col-md m-2" placeholder="Required Labors" name="emps">
                                    <input class="form-control col-md m-2" placeholder="Space" name="space">
                                    <input class="form-control col-md m-2" placeholder="Startup Investment" name="startup_cost">
                                </div>
                                <button class="btn btn-success">{{__('Search')}}</button>
                            </form>
                        </div>

                    </div>
                    {{-- <div class="site-header__search">
                        <div class="search search--location--header ">
                            <div class="search__body">
                                <form class="search__form" action="{{route('front.search')}}">
                                    <select class="search__categories" aria-label="Category" name="category_id">
                                    <option value="all" disabled selected>All Categories</option>
                                    @foreach (App\Models\Category::whereNull('parent_id')->get() as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->en_name }}</option>
                                        @foreach ($parent->children as $child)
                                            <option value="{{ $child->id }}">
                                                &nbsp;&nbsp;&nbsp;&nbsp;{{ $child->en_name }}</option>
                                            @if ($child->children)
                                                @foreach ($child->children as $item)
                                                    <option value="{{ $item->id }}">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $item->en_name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>
                                    <input class="search__input" name="search" placeholder="Search For Project"
                                        aria-label="Site search" type="text" autocomplete="off">
                                    <button class="search__button search__button--type--submit" type="submit">
                                        <svg width="20px" height="20px">
                                            <use xlink:href="images/sprite.svg#search-20"></use>
                                        </svg>
                                    </button>
                                    <div class="search__border"></div>
                                </form>
                                <div class="search__suggestions suggestions suggestions--location--header"></div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="site-header__phone">
                        <div class="site-header__phone-title">Customer Service</div>
                        <div class="site-header__phone-number">(800) 060-0730</div>
                    </div>
                </div>
                <div class="site-header__nav-panel">
                    <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
                    <div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow">
                        <div class="nav-panel__container container">
                            <div class="nav-panel__row">
                                <div class="nav-panel__departments">
                                    <!-- .departments -->
                                    <div class="departments  departments--open departments--fixed "
                                        data-departments-fixed-by=".block-slideshow">
                                        <div class="departments__body">
                                            <div class="departments__links-wrapper">
                                                <div class="departments__submenus-container"></div>
                                                @foreach (App\Models\Category::whereNull('parent_id')->get() as $parent)
                                                    <ul class="departments__links">
                                                        <li class="departments__item">
                                                            <a class="departments__item-link">
                                                                {{ $parent->en_name }}
                                                                @if ($parent->children())
                                                                    <svg class="departments__item-arrow" width="6px"
                                                                        height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#arrow-rounded-right-6x9">
                                                                        </use>
                                                                    </svg>
                                                                @endif
                                                            </a>
                                                            <div
                                                                class="departments__submenu departments__submenu--type--megamenu departments__submenu--size--xl">
                                                                <!-- .megamenu -->
                                                                <div class="megamenu  megamenu--departments ">
                                                                    <div class="megamenu__body"
                                                                        style="background-image: url('images/megamenu/megamenu-1.jpg');">
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <ul
                                                                                    class="megamenu__links megamenu__links--level--0">
                                                                                    <li
                                                                                        class="megamenu__item  megamenu__item--with-submenu ">
                                                                                        <a
                                                                                            href="{{ route('front.category', $parent->id) }}">{{ $parent->en_name }}</a>
                                                                                        <ul
                                                                                            class="megamenu__links megamenu__links--level--1">
                                                                                            @foreach ($parent->children as $child)
                                                                                                <li
                                                                                                    class="megamenu__item">
                                                                                                    <a
                                                                                                        href="{{ route('front.category', $child->id) }}">{{ $child->en_name }}</a>
                                                                                                </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- .megamenu / end -->
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endforeach

                                            </div>
                                        </div>
                                        <button class="departments__button">
                                            <svg class="departments__button-icon" width="18px" height="14px">
                                                <use xlink:href="images/sprite.svg#menu-18x14"></use>
                                            </svg>
                                            Shop By Category
                                            <svg class="departments__button-arrow" width="9px" height="6px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- .departments / end -->
                                </div>
                                <!-- .nav-links -->
                                <div class="nav-panel__nav-links nav-links">
                                    <ul class="nav-links__list">
                                        <li class="nav-links__item  nav-links__item--has-submenu ">
                                            <a class="nav-links__item-link">
                                                <div class="nav-links__item-body">
                                                    Home
                                                    <svg class="nav-links__item-arrow" width="9px" height="6px">
                                                        <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6">
                                                        </use>
                                                    </svg>
                                                </div>
                                            </a>
                                            <div class="nav-links__submenu nav-links__submenu--type--menu">
                                                <!-- .menu -->
                                                <div class="menu menu--layout--classic ">
                                                    <div class="menu__submenus-container"></div>
                                                    <ul class="menu__list">
                                                        <li class="menu__item">
                                                            <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                            <div class="menu__item-submenu-offset"></div>
                                                            <a class="menu__item-link" href="index.html">
                                                                Home 1 Slideshow
                                                            </a>
                                                        </li>
                                                        <li class="menu__item">
                                                            <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                            <div class="menu__item-submenu-offset"></div>
                                                            <a class="menu__item-link" href="index-2.html">
                                                                Home 2 Slideshow
                                                            </a>
                                                        </li>
                                                        <li class="menu__item">
                                                            <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                            <div class="menu__item-submenu-offset"></div>
                                                            <a class="menu__item-link" href="index-3.html">
                                                                Home 1 Finder
                                                            </a>
                                                        </li>
                                                        <li class="menu__item">
                                                            <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                            <div class="menu__item-submenu-offset"></div>
                                                            <a class="menu__item-link" href="index-4.html">
                                                                Home 2 Finder
                                                            </a>
                                                        </li>
                                                        <li class="menu__item">
                                                            <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                            <div class="menu__item-submenu-offset"></div>
                                                            <a class="menu__item-link" href="offcanvas-cart.html">
                                                                Offcanvas Cart
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- .menu / end -->
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <!-- .nav-links / end -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- desktop site__header / end -->
        <!-- site__body -->
        <div class="site__body">
            <!-- .block-slideshow -->
            <div class="block-slideshow block-slideshow--layout--with-departments block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 d-none d-lg-block"></div>
                        <div class="col-12 col-lg-9">
                            <div class="block-slideshow__body">
                                <div class="owl-carousel">
                                    <a class="block-slideshow__slide" href="">
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                            style="background-image: url('images/slides/slide-1.jpg')"></div>
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                            style="background-image: url('images/slides/slide-1-mobile.jpg')"></div>
                                        <div class="block-slideshow__slide-content">
                                            <div class="block-slideshow__slide-title">Big choice of<br>Plumbing
                                                products</div>
                                            <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit.<br>Etiam pharetra laoreet dui quis
                                                molestie.</div>
                                            <div class="block-slideshow__slide-button">
                                                <span class="btn btn-primary btn-lg">Shop Now</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="block-slideshow__slide" href="">
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                            style="background-image: url('images/slides/slide-2.jpg')"></div>
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                            style="background-image: url('images/slides/slide-2-mobile.jpg')"></div>
                                        <div class="block-slideshow__slide-content">
                                            <div class="block-slideshow__slide-title">Screwdrivers<br>Professional
                                                Tools</div>
                                            <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit.<br>Etiam pharetra laoreet dui quis
                                                molestie.</div>
                                            <div class="block-slideshow__slide-button">
                                                <span class="btn btn-primary btn-lg">Shop Now</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="block-slideshow__slide" href="">
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                            style="background-image: url('images/slides/slide-3.jpg')"></div>
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                            style="background-image: url('images/slides/slide-3-mobile.jpg')"></div>
                                        <div class="block-slideshow__slide-content">
                                            <div class="block-slideshow__slide-title">One more<br>Unique header</div>
                                            <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit.<br>Etiam pharetra laoreet dui quis
                                                molestie.</div>
                                            <div class="block-slideshow__slide-button">
                                                <span class="btn btn-primary btn-lg">Shop Now</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .block-slideshow / end -->
            <!-- .block-products -->
            <div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
                <div class="container">
                    <div class="block-header">
                        <h3 class="block-header__title">Most Viewed Project</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    @if (isset($bestproject))
                        <div class="block-products__body">
                            <div class="block-products__featured">
                                <div class="block-products__featured-item">
                                    <div class="product-card product-card--hidden-actions ">
                                        <div class="product-card__image product-image">
                                            @if (isset($bestproject->gallery))
                                                <div id="carouselExampleControls" class="carousel slide shadow-none"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach ($bestproject->gallery as $img)
                                                            <img class="product-image__img"
                                                                src='{{ asset("media/projects/images/$img") }}'
                                                                style="width: 100%;height:100%">
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <a href="{{ 'front.project', $bestproject->id }}"
                                                    class="product-image__body">
                                                    <img class="product-image__img"
                                                        src="{{ asset('media/no image.jpg') }}" alt="">
                                                </a>
                                            @endif
                                            {{-- <a href="{{route('front.project',$bestproject->id)}}" class="product-image__body">
                                            <img class="product-image__img" src="images/products/product-1.jpg" alt="">
                                        </a> --}}
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a
                                                    href="{{ route('front.project', $bestproject->id) }}">{{ $bestproject->title }}</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            {{-- <svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg> --}}
                                                            {{-- <svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg> --}}
                                                            <div
                                                                class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            {{-- <svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg> --}}
                                                            <div
                                                                class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            {{-- <svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg> --}}
                                                            <div
                                                                class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            {{-- <svg class="rating__star " width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg> --}}
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">Views :
                                                    {{ $bestproject->counter }}</div>
                                            </div>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__prices">
                                                {{ $bestproject->startup_cost }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products__list">
                                @foreach ($topprojects as $project)
                                    <div class="block-products__list-item">
                                        <div class="product-card product-card--hidden-actions ">
                                            @if (isset($project->gallery))
                                                <div id="carouselExampleControls" class="carousel slide shadow-none"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach ($project->gallery as $img)
                                                            <img class="product-image__img"
                                                                src='{{ asset("media/projects/images/$img") }}'
                                                                style="width: 100%;height:100%">
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <a href="{{ 'front.project', $project->id }}"
                                                    class="product-image__body">
                                                    <img class="product-image__img"
                                                        src="{{ asset('media/no image.jpg') }}" alt="">
                                                </a>
                                            @endif
                                            <div class="product-card__info">
                                                <div class="product-card__name">
                                                    <a
                                                        href="{{ route('front.project', $project->id) }}">{{ $project->title }}</a>
                                                </div>
                                                <div class="product-card__rating">
                                                    {{-- <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body">
                                                        <svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                                    <div class="product-card__rating-legend">{{ $project->counter }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__actions">
                                                <div class="product-card__prices">
                                                    {{ $project->startup_cost }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- .block-products / end -->
            <!-- .block-categories -->
            <div class="block block--highlighted block-categories block-categories--layout--classic">
                <div class="container">
                    <div class="block-header">
                        <h3 class="block-header__title">Popular Categories</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    <div class="block-categories__list">
                        @foreach (App\Models\Category::whereNull('parent_id')->get() as $category)
                            <div class="block-categories__item category-card category-card--layout--classic">
                                <div class="category-card__body">
                                    @if (isset($category->img))
                                        <div class="category-card__image">
                                            <a href="{{ route('front.category', $category->id) }}"><img
                                                    src="{{ asset('media/categories/' . $category->img) }}"
                                                    alt=""></a>
                                        </div>
                                    @else
                                        <div class="category-card__image">
                                            <a href="{{ route('front.category', $category->id) }}"><img
                                                    src="{{ asset('media/no image.jpg') }}" alt=""></a>
                                        </div>
                                    @endif

                                    <div class="category-card__content">
                                        <div class="category-card__name">
                                            <a
                                                href="{{ route('front.category', $category->id) }}">{{ $category->en_name }}</a>
                                        </div>
                                        @if ($category->children())
                                            <ul class="category-card__links">
                                                @foreach (App\Models\Category::where('parent_id', $category->id)->limit(5)->orderby('counter', 'desc')->get()
    as $child)
                                                    <li><a
                                                            href="{{ route('front.category', $child->id) }}">{{ $child->en_name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="badge bg-info">Medo</span>
                                        @endif

                                        {{-- <div class="category-card__all">
                                            <a href="">Show All</a>
                                        </div>
                                        <div class="category-card__products">
                                            572 Products
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- .block-categories / end -->
            <!-- .block-products-carousel -->
            <div class="block block-products-carousel" data-layout="vertical" data-mobile-grid-columns="1">
                <div class="container">
                    <div class="block-header">
                        <h3 class="block-header__title">New Projects</h3>
                        <div class="block-header__divider"></div>
                        <div class="block-header__arrows-list">
                            <button class="block-header__arrow block-header__arrow--left" type="button">
                                <svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                                </svg>
                            </button>
                            <button class="block-header__arrow block-header__arrow--right" type="button">
                                <svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="block-products-carousel__slider">
                        <div class="owl-carousel">
                            @foreach ($newprojects as $project)
                                <div class="product-card">
                                    <div class="product-card__image product-image">
                                        @if (isset($project->gallery))
                                            <div id="carouselExampleControls" class="carousel slide shadow-none"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach ($project->gallery as $img)
                                                        <img class="product-image__img"
                                                            src='{{ asset("media/projects/images/$img") }}'
                                                            style="width: 100%;height:100%">
                                                    @endforeach
                                                </div>

                                            </div>
                                        @else
                                            <a href="{{ 'front.project', $project->id }}"
                                                class="product-image__body">
                                                <img class="product-image__img"
                                                    src="{{ asset('media/no image.jpg') }}" alt="">
                                            </a>
                                        @endif

                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a
                                                href="{{ route('front.project', $project->id) }}">{{ $project->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="owl-carousel">

                            {{-- <div class="product-block grid-3columns display-grid">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>

                                        <div class="product-card__image product-image">
                                            <a href="{{route('front.project',$project->id)}}" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-1.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="{{route('front.project',$project->id)}}">Electric Planer Brandix KL370090G 300 Watts</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- .block-products-carousel / end -->
            <!-- .block-brands / end -->
            <!-- .block-projects-columns -->
            <div class="block block-product-columns d-lg-block d-none">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="block-header">
                                <h3 class="block-header__title">Top Projects</h3>
                                <div class="block-header__divider"></div>
                            </div>
                            <div class="block-product-columns__column">
                                @foreach ($projects as $project)
                                    <div class="block-product-columns__item">
                                        <div
                                            class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                            <div class="product-card__image product-image">
                                                <a href="{{ route('front.project', $project->id) }}"
                                                    class="product-image__body">
                                                    @if (isset($project->gallery))
                                                        <div id="carouselExampleControls"
                                                            class="carousel slide shadow-none" data-bs-ride="carousel">
                                                            <div class="carousel-inner">
                                                                @foreach ($project->gallery as $img)
                                                                    <img class="product-image__img"
                                                                        src='{{ asset("media/projects/images/$img") }}'
                                                                        style="width: 100%;height:100%">
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                    @else
                                                        <img class="product-image__img" src="media/no image.jpg"
                                                            alt="">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__name">
                                                    <a href="{{ route('front.project', $project->id) }}">
                                                        {{ $project->title }}</a>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="product-card__rating-legend">
                                                        {{ $project->user($project->user_id)->name }}
                                                    </div>
                                                </div>
                                                {{-- <ul class="product-card__features-list">
                                                    <li>Speed: 750 RPM</li>
                                                    <li>Power Source: Cordless-Electric</li>
                                                    <li>Battery Cell Type: Lithium</li>
                                                    <li>Voltage: 20 Volts</li>
                                                    <li>Battery Capacity: 2 Ah</li>
                                                </ul> --}}
                                            </div>
                                            <div class="product-card__actions">
                                                <div class="product-card__availability">
                                                    Availability: <span class="text-success">In Stock</span>
                                                </div>
                                                <div class="product-card__prices">
                                                    Startup Cost : {{ $project->startup_cost }}
                                                </div>
                                                <div class="product-card__buttons">
                                                    <button class="btn btn-primary product-card__addtocart"
                                                        type="button">Add To Cart</button>
                                                    <button
                                                        class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                        type="button">Add To Cart</button>
                                                    <button
                                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                        type="button">
                                                        <svg width="16px" height="16px">
                                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                        </svg>
                                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                    </button>
                                                    <button
                                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                        type="button">
                                                        <svg width="16px" height="16px">
                                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                                        </svg>
                                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="block-header">
                                <h3 class="block-header__title">Top Machines</h3>
                                <div class="block-header__divider"></div>
                            </div>
                            <div class="block-product-columns__column">
                                @if (!empty($machines))
                                    @foreach ($machines as $machine)
                                        <div class="block-product-columns__item">
                                            <div
                                                class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                                <div class="product-card__image product-image">
                                                    <a href="{{ route('front.project', $project->id) }}"
                                                        class="product-image__body">
                                                        @if (isset($machine->gallery))
                                                            <div id="carouselExampleControls"
                                                                class="carousel slide shadow-none"
                                                                data-bs-ride="carousel">
                                                                <div class="carousel-inner">
                                                                    @foreach ($machine->gallery as $img)
                                                                        <img class="product-image__img"
                                                                            src='{{ asset("media/machines/images/$img") }}'
                                                                            style="width: 100%;height:100%">
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                        @else
                                                            <img class="product-image__img" src="media/no image.jpg"
                                                                alt="">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name">
                                                        <a href="{{ route('front.machine', $machine->id) }}">
                                                            {{ $machine->title }}</a>
                                                    </div>
                                                    <div class="product-card__rating">
                                                        <div class="product-card__rating-legend">
                                                            {{ $machine->vendor->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__actions">
                                                    <div class="product-card__availability">
                                                        Availability: <span class="text-success">In Stock</span>
                                                    </div>
                                                    <div class="product-card__prices">
                                                        Price : {{ $machine->price }}
                                                    </div>
                                                    <div class="product-card__buttons">
                                                        <button class="btn btn-primary product-card__addtocart"
                                                            type="button">Add To Cart</button>
                                                        <button
                                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                            type="button">Add To Cart</button>
                                                        <button
                                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                            type="button">
                                                            <svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg>
                                                            <span
                                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                        </button>
                                                        <button
                                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                            type="button">
                                                            <svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg>
                                                            <span
                                                                class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="block-header">
                                <h3 class="block-header__title">Our Best Vendors</h3>
                                <div class="block-header__divider"></div>
                            </div>
                            <div class="block-product-columns__column">
                                @foreach ($vendors as $vendor)
                                    <div class="block-product-columns__item">
                                        <div
                                            class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                            <div class="product-card__image product-image">
                                                <a href="{{ route('front.project', $project->id) }}"
                                                    class="product-image__body">
                                                    <img class="product-image__img" src="media/no image.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__name">
                                                    <a href="{{ route('front.vendor', $vendor->id) }}">
                                                        {{ $vendor->name }}</a>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="product-card__rating-legend">
                                                        {{ $vendor->address }}
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="product-card__rating-legend">
                                                        {{ $vendor->mobile }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__actions">
                                                <div class="product-card__availability">
                                                    Availability: <span class="text-success">In Stock</span>
                                                </div>
                                                <div class="product-card__prices">
                                                    {{ $vendor->owner_name }}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .block-projects-columns / end -->
        </div>
        <!-- site__body / end -->
        <!-- site__footer -->
        <footer class="site__footer">
            <div class="site-footer">
                <div class="container">
                    <div class="site-footer__widgets">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="site-footer__widget footer-contacts">
                                    <h5 class="footer-contacts__title">Contact Us</h5>
                                    <div class="footer-contacts__text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in feugiat
                                        lorem. Pellentque ac placerat tellus.
                                    </div>
                                    <ul class="footer-contacts__contacts">
                                        <li><i class="footer-contacts__icon fas fa-globe-americas"></i> 715 Fake
                                            Street, New York 10021 USA</li>
                                        <li><i class="footer-contacts__icon far fa-envelope"></i> stroyka@example.com
                                        </li>
                                        <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> (800) 060-0730,
                                            (800) 060-0730</li>
                                        <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sat 10:00pm -
                                            7:00pm</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">Information</h5>
                                    <ul class="footer-links__list">
                                        <li class="footer-links__item"><a href="" class="footer-links__link">About
                                                Us</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Delivery
                                                Information</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Privacy
                                                Policy</a></li>
                                        <li class="footer-links__item"><a href=""
                                                class="footer-links__link">Brands</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Contact
                                                Us</a></li>
                                        <li class="footer-links__item"><a href=""
                                                class="footer-links__link">Returns</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Site
                                                Map</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">My Account</h5>
                                    <ul class="footer-links__list">
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Store
                                                Location</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Order
                                                History</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Wish
                                                List</a></li>
                                        <li class="footer-links__item"><a href=""
                                                class="footer-links__link">Newsletter</a></li>
                                        <li class="footer-links__item"><a href=""
                                                class="footer-links__link">Specials</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Gift
                                                Certificates</a></li>
                                        <li class="footer-links__item"><a href=""
                                                class="footer-links__link">Affiliate</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="site-footer__widget footer-newsletter">
                                    <h5 class="footer-newsletter__title">Newsletter</h5>
                                    <div class="footer-newsletter__text">
                                        Praesent pellentesque volutpat ex, vitae auctor lorem pulvinar mollis felis at
                                        lacinia.
                                    </div>
                                    <form action="" class="footer-newsletter__form">
                                        <label class="sr-only" for="footer-newsletter-address">Email
                                            Address</label>
                                        <input type="text" class="footer-newsletter__form-input form-control"
                                            id="footer-newsletter-address" placeholder="Email Address...">
                                        <button
                                            class="footer-newsletter__form-button btn btn-primary">Subscribe</button>
                                    </form>
                                    <div class="footer-newsletter__text footer-newsletter__text--social">
                                        Follow us on social networks
                                    </div>
                                    <!-- social-links -->
                                    <div
                                        class="social-links footer-newsletter__social-links social-links--shape--circle">
                                        <ul class="social-links__list">
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--rss" href=""
                                                    target="_blank">
                                                    <i class="fas fa-rss"></i>
                                                </a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--youtube" href=""
                                                    target="_blank">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--facebook"
                                                    href="" target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--twitter" href=""
                                                    target="_blank">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--instagram"
                                                    href="" target="_blank">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- social-links / end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-footer__bottom">
                        <div class="site-footer__copyright">
                            <!-- copyright -->
                            Powered by HTML — Design by <a href="https://themeforest.net/user/kos9"
                                target="_blank">Kos</a>
                            <!-- copyright / end -->
                        </div>
                        <div class="site-footer__payments">
                            <img src="images/payments.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="totop">
                    <div class="totop__body">
                        <div class="totop__start"></div>
                        <div class="totop__container container"></div>
                        <div class="totop__end">
                            <button type="button" class="totop__button">
                                <svg width="13px" height="8px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-up-13x8"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- site__footer / end -->
    </div>
    <!-- site / end -->
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->
    <!-- mobilemenu -->
    <div class="mobilemenu">
        <div class="mobilemenu__backdrop"></div>
        <div class="mobilemenu__body">
            <div class="mobilemenu__header">
                <div class="mobilemenu__title">Menu</div>
                <button type="button" class="mobilemenu__close">
                    <svg width="20px" height="20px">
                        <use xlink:href="images/sprite.svg#cross-20"></use>
                    </svg>
                </button>
            </div>
            <div class="mobilemenu__content">
                <ul class="mobile-links mobile-links--level--0" data-collapse
                    data-collapse-opened-class="mobile-links__item--open">
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="{{ route('front') }}" class="mobile-links__item-link" /a>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a class="mobile-links__item-link">Top Categories</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                @foreach (App\Models\Category::whereNull('parent_id')->orderby('counter', 'desc')->limit(10)->get()
    as $parent)
                                    <li class="mobile-links__item" data-collapse-item>
                                        <div class="mobile-links__item-title">
                                            <a href="" class="mobile-links__item-link">{{ $parent->en_name }}</a>
                                            @if ($parent->children)
                                                <button class="mobile-links__item-toggle" type="button"
                                                    data-collapse-trigger>
                                                    <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                        <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7">
                                                        </use>
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                        @if ($parent->children)
                                            <div class="mobile-links__item-sub-links" data-collapse-content>
                                                <ul class="mobile-links mobile-links--level--2">
                                                    @foreach (App\Models\Category::where('parent_id', $parent->id)->orderby('counter', 'desc')->limit(5)->get()
    as $child)
                                                        <li class="mobile-links__item" data-collapse-item>
                                                            <div class="mobile-links__item-title">
                                                                <a href=""
                                                                    class="mobile-links__item-link">{{ $child->en_name }}</a>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        @guest
                            <div class="mobile-links__item-title">
                                <a class="mobile-links__item-link">Account</a>
                                <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                    <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                    </svg>
                                </button>
                            </div>
                        @endguest
                        @auth
                            <div class="mobile-links__item-title">
                                <a class="mobile-links__item-link">{{ auth()->user()->name }}</a>
                                <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                    <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                    </svg>
                                </button>
                            </div>
                        @endauth
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                @auth
                                    <li class="mobile-links__item" data-collapse-item>
                                        <div class="mobile-links__item-title">
                                            <a href="{{ route('logout') }}" class="mobile-links__item-link">Logout</a>
                                        </div>
                                    </li>
                                    <li class="mobile-links__item" data-collapse-item>
                                        <div class="mobile-links__item-title">
                                            <a href="{{ route('home') }}" class="mobile-links__item-link">Dashboard</a>
                                        </div>
                                    </li>
                                @endauth
                                @guest
                                    <li class="mobile-links__item" data-collapse-item>
                                        <div class="mobile-links__item-title">
                                            <a href="{{ route('login') }}" class="mobile-links__item-link">Login</a>
                                        </div>
                                    </li>
                                @endguest
                                {{-- <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-profile.html" class="mobile-links__item-link">Edit
                                            Profile</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-password.html" class="mobile-links__item-link">Change
                                            Password</a>
                                    </div> --}}
                    </li>
                </ul>
            </div>
            </li>

            {{-- <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a data-collapse-trigger class="mobile-links__item-link">Currency</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">€ Euro</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">£ Pound Sterling</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">$ US Dollar</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">₽ Russian Ruble</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
            {{-- <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a data-collapse-trigger class="mobile-links__item-link">Language</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">English</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">French</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">German</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">Russian</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">Italian</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
            </ul>
        </div>
    </div>
    </div>
    <!-- mobilemenu / end -->
    <!-- photoswipe -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- photoswipe / end -->
    <!-- js -->
    <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('public/vendor/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('public/vendor/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('public/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('public/js/number.js') }}"></script>
    <script src="{{ asset('public/js/main.js') }}"></script>
    <script src="{{ asset('public/js/header.js') }}"></script>
    <script src="{{ asset('public/vendor/svg4everybody/svg4everybody.min.js') }}"></script>
    <script>
        svg4everybody();
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
