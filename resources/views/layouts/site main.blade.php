@extends('layouts.front')

@section('content')
        <!-- site__body -->
        <div class="site__body">
            <div class="page-header">
                <div class="page-header__container container">
                    <div class="page-header__breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">الرئيسية</a>
                                    <svg class="breadcrumb-arrow" width="6px" height="9px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                    </svg>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">@yield('name')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="container">
                    <div class="product product--layout--standard" data-layout="standard">
                        <div class="product__content">
                            <!-- .product__gallery -->
                            <div class="product__gallery">
                                <div class="product-gallery">
                                    <div class="product-gallery__featured">
                                        @yield('slideshow')
                                    </div>
                                </div>
                            </div>
                            <!-- .product__gallery / end -->
                            <!-- .product__info -->
                            <div class="product__info">
                                <div class="product__wishlist-compare">
                                    <button type="button" class="btn btn-sm btn-light btn-svg-icon"
                                        data-toggle="tooltip" data-placement="right" title="Wishlist">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-light btn-svg-icon"
                                        data-toggle="tooltip" data-placement="right" title="Compare">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                    </button>
                                </div>
                                <h1 class="product__name">@yield('name')</h1>

                                <div class="product__description">
                                    @yield('description')
                                </div>
                            </div>
                            <!-- .product__info / end -->
                            <!-- .product__sidebar -->
                        </div>
                    </div>
                    @yield('tabs')

                </div>
            </div>
            @yield('projects')
            @yield('machines')

        </div>
        <!-- site__body / end -->
@endsection
