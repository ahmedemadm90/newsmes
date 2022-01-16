@extends('layouts.front')
@section('title')
    Welcome
@endsection
@section('content')
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




@endsection
