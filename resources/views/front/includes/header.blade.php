        <!-- mobile site__header -->
        <header class="site__header d-lg-none">
            <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
            <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
                <div class="mobile-header__panel">
                    <div class="container">
                        <div class="mobile-header__body">
                            <button class="mobile-header__menu-button">
                                <svg width="18px" height="14px">
                                    <use xlink:href="{{ asset('media/images/sprite.svg#menu-18x14') }}"></use>
                                </svg>
                            </button>
                            <a class="mobile-header__logo" href="{{ route('home') }}">
                                <!-- mobile-logo -->
                                <img src="{{ asset('assets/images/logo.png') }}" height="50x" class=''>
                                <!-- mobile-logo / end -->
                            </a>
                            <div class="search search--location--mobile-header mobile-header__search">
                                <div class="search__body">
                                    <form class="search__form" action="">
                                        <input class="search__input" name="search"
                                            placeholder="Search over 10,000 products" aria-label="Site search"
                                            type="text" autocomplete="off">
                                        <button class="search__button search__button--type--submit" type="submit">
                                            <svg width="20px" height="20px">
                                                <use xlink:href="images/sprite.svg#search-20"></use>
                                            </svg>
                                        </button>
                                        <button class="search__button search__button--type--close" type="button">
                                            <svg width="20px" height="20px">
                                                <use xlink:href="images/sprite.svg#cross-20"></use>
                                            </svg>
                                        </button>
                                        <div class="search__border"></div>
                                    </form>
                                    <div class="search__suggestions suggestions suggestions--location--mobile-header">
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-header__indicators">
                                <div class="indicator indicator--mobile-search indicator--mobile d-md-none">
                                    <button class="indicator__button">
                                        <span class="indicator__area">
                                            <svg width="20px" height="20px">
                                                <use xlink:href="images/sprite.svg#search-20"></use>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                <div class="indicator indicator--mobile d-sm-flex d-none">
                                    <a href="wishlist.html" class="indicator__button">
                                        <span class="indicator__area">
                                            <svg width="20px" height="20px">
                                                <use xlink:href="images/sprite.svg#heart-20"></use>
                                            </svg>
                                            <span class="indicator__value">0</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="indicator indicator--mobile">
                                    <a href="cart.html" class="indicator__button">
                                        <span class="indicator__area">
                                            <svg width="20px" height="20px">
                                                <use xlink:href="images/sprite.svg#cart-20"></use>
                                            </svg>
                                            <span class="indicator__value">3</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
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
                                <a class="topbar-link" href="#">من نحن</a>
                            </div>
                            <div class="topbar__item topbar__item--link">
                                <a class="topbar-link" href="#">إتصل بنا</a>
                            </div>
                            <div class="topbar__spring"></div>
                            @guest
                                <div class="topbar__item topbar__item--link">
                                    <a class="topbar-link" href="{{ route('login') }}">Login
                                        <i class="fas fa-user-alt"></i></a>
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
                            {{-- <div class="topbar__item">
                                <div class="topbar-dropdown">
                                    <button class="topbar-dropdown__btn" type="button">
                                        Currency: <span class="topbar__item-value">USD</span>
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
                                                    <a class="menu__item-link" href="">
                                                        € Euro
                                                    </a>
                                                </li>
                                                <li class="menu__item">
                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                    <div class="menu__item-submenu-offset"></div>
                                                    <a class="menu__item-link" href="">
                                                        £ Pound Sterling
                                                    </a>
                                                </li>
                                                <li class="menu__item">
                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                    <div class="menu__item-submenu-offset"></div>
                                                    <a class="menu__item-link" href="">
                                                        $ US Dollar
                                                    </a>
                                                </li>
                                                <li class="menu__item">
                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                    <div class="menu__item-submenu-offset"></div>
                                                    <a class="menu__item-link" href="">
                                                        ₽ Russian Ruble
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- .menu / end -->
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="topbar__item">
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
                            </div> --}}

                        </div>
                    </div>
                </div>
                <!-- .topbar / end -->
                <div class="site-header__middle container">
                    <div class="site-header__logo">
                        <a href="{{ url('/') }}">
                            <!-- logo -->
                            <img src="{{ asset('assets/images/logo.png') }}" height="50x" class=''>
                            <!-- logo / end -->
                        </a>
                    </div>
                    <div class="site-header__search">
                        <div class="search search--location--header text-center">
                            <div class="search__body">
                                <form class="search__form " action="{{ route('front.search.basic') }}">
                                    {{-- <select class="search__categories" aria-label="Category" name="category_id[]">
                                        <option value="all">كل الأقسام</option>
                                        @foreach (App\Models\Category::whereNull('parent_id')->get() as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->en_name }} || {{$parent->ar_name}}</option>
                                            @foreach ($parent->children as $child)
                                                <option value="{{$child->id}}">--{{ $child->en_name }} || {{$child->ar_name}}</option>
                                                @foreach ($child->children as $kid)
                                                <option value="{{$kid->id}}">---{{ $kid->en_name }} || {{$kid->ar_name}}</option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </select> --}}
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
                            <!-- Trigger/Open The Modal -->
                            <button id="myBtn" class="btn btn-success mt-1">{{ __('Advanced Search') }}</button>
                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <div class="container">
                                        <form action="{{ route('front.search') }}">
                                            <div class="row">
                                                {{-- <select class="form-control col-md m-1" name="category_id" aria-label="Category">
                                                    <option value="all">كل الأقسام</option>
                                                    @foreach (App\Models\Category::whereNull('parent_id')->get() as $parent)
                                                        <option value="{{ $parent->id }}">{{ $parent->en_name }}
                                                        </option>
                                                        @foreach ($parent->children as $child)
                                                            <option>&nbsp;&nbsp;&nbsp;&nbsp;{{ $child->en_name }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select> --}}
                                                <input type="text" class="form-control col-md m-1" name="keyword" placeholder="Project Title">
                                            </div>
                                            <div class="row">
                                                <select class="form-control col-md m-1" name="category_id" aria-label="Category">
                                                    <option value="all" disabled hidden selected>{{__('Project Idea')}}</option>
                                                    @foreach (App\Models\Idea::get() as $idea)
                                                        <option value="{{ $idea->id }}">{{ $idea->en_title }} || {{ $idea->ar_title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control col-md m-1" name="category_id" aria-label="Category">
                                                    <option value="all" disabled hidden selected>{{__('Project Technology')}}</option>
                                                    @foreach (App\Models\Technology::get() as $tech)
                                                        <option value="{{ $tech->id }}">{{ $tech->en_title }} || {{ $tech->ar_title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control col-md m-1" name="field_id" aria-label="Category">
                                                    <option value="all" disabled hidden selected>{{__('Project Investment Field')}}</option>
                                                    @foreach (App\Models\InvestField::get() as $field)
                                                        <option value="{{ $field->id }}">{{ $field->en_title }} || {{ $field->ar_title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row">
                                                <input class="form-control col-md" placeholder="Workers || العمال" type="number" name="emps">
                                                <input class="form-control col-md" placeholder="Space || العمالة" type="number" name="space">
                                                <input class="form-control col-md" placeholder="Startup Investment || الاستثمار" type="number" name="startup_cost">
                                            </div>
                                            <button class="btn btn-info m-1">{{__('Search')}}</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="site-header__phone">
                        <div class="site-header__phone-title">خدمة العملاء</div>
                        <div class="site-header__phone-number">+201099057734</div>
                    </div>
                </div>
                <div class="site-header__nav-panel">
                    <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
                    <div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow">
                        <div class="nav-panel__container container">
                            <div class="nav-panel__row">
                                <div class="nav-panel__departments">
                                    <!-- .departments -->
                                    <div class="departments " data-departments-fixed-by="">
                                        <div class="departments__body">
                                            <div class="departments__links-wrapper">
                                                <div class="departments__submenus-container"></div>
                                                <ul class="departments__links">
                                                    @foreach (App\Models\Category::whereNull('parent_id')->get() as $parent)
                                                        <li class="departments__item">
                                                            <a class="departments__item-link"
                                                                href="{{ route('front.category', $parent->id) }}">
                                                                {{ $parent->en_name }}
                                                                <svg class="departments__item-arrow" width="6px"
                                                                    height="9px">
                                                                    <use
                                                                        xlink:href="images/sprite.svg#arrow-rounded-right-6x9">
                                                                    </use>
                                                                </svg>
                                                            </a>
                                                            <div
                                                                class="departments__submenu departments__submenu--type--megamenu departments__submenu--size--xl">
                                                                <!-- .megamenu -->
                                                                <div class="megamenu  megamenu--departments ">
                                                                    <div class="megamenu__body"
                                                                        style="background-image: url('images/megamenu/megamenu-1.jpg');">
                                                                        <div class="row">
                                                                            @foreach ($parent->children as $child)
                                                                                <div class="col-3">
                                                                                    <ul
                                                                                        class="megamenu__links megamenu__links--level--0">
                                                                                        <li
                                                                                            class="megamenu__item  megamenu__item--with-submenu ">
                                                                                            <a
                                                                                                href="{{ route('front.category', $child->id) }}">{{ $child->en_name }}</a>
                                                                                            <ul
                                                                                                class="megamenu__links megamenu__links--level--1">
                                                                                                @foreach ($child->children as $child1)
                                                                                                    <li
                                                                                                        class="megamenu__item">
                                                                                                        <a
                                                                                                            href="{{ route('front.category', $child1->id) }}">{{ $child1->en_name }}</a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- .megamenu / end -->
                                                            </div>
                                                        </li>
                                                    @endforeach


                                                </ul>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- desktop site__header / end -->
