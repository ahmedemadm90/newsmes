@extends('layouts.site')
@section('title')
    {{ $category->en_name }}
@endsection
@section('slideshow')
    @if (isset($category->img))
        <div class="slideshow-container">
            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <img src="{{ asset('media/categories/' . $category->img) }}" style="width:100%">
            </div>
        </div>
        <!-- Slideshow container -->
    @else
        <div class="slideshow-container">
            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <img src="{{ asset('media/no image.jpg') }}" style="width:100%">
            </div>
        </div>
    @endif
@endsection
@section('name')
    {{ $category->en_name }} || {{ $category->counter }}
@endsection
@section('category')
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if (isset($category->gallery))
                @foreach ($category->gallery as $img)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} w-50 m-auto">
                        <img class="d-block img-fluid m-auto" src="{{ asset("media/categories/images/$img") }}" alt="">
                    </div>
                @endforeach
            @else
                <div class="carousel-item active w-50 m-auto">
                    <img class="d-block img-fluid m-auto" src="{{ asset('media/no image.jpg') }}" alt="">
                </div>
            @endif

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <h2>{{ __('Machines') }}</h2>
    @if ($category->machines)
        @foreach ($category->machines as $machine)
            <span class="badge bg-info">{{ $machine->title }}</span>
        @endforeach
    @else
        <span class="badge bg-info">No Machines Related To This Category</span>
    @endif

@endsection
@section('projects')
    @if (!isset($projects))
        <span class="text-danger">No Projects Related To This Category Was Found</span>
    @else
        <div class="block block-products-carousel" data-layout="grid-4" data-mobile-grid-columns="1">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Related Projects</h3>
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
                    <div class="block-products-carousel__preloader"></div>
                    <div class="owl-carousel">
                        @if (!empty($projects))
                        @foreach ($projects as $project)
                            <div class="block-products-carousel__column">
                                <div class="product-card ">
                                    <div class="product-card__image product-image">
                                        <a href="{{ route('front.project', $project->id) }}" class="product-image__body">
                                            @if (isset($project->gallery))
                                                @foreach ($project->gallery as $img)
                                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                        <img class="d-block img-fluid"
                                                            src="{{ asset('media/projects/images/' . $img) }}" alt="">
                                                    </div>
                                                @endforeach
                                            @else
                                                <img class="product-image__img" src="{{ asset('media/no image.jpg') }}"
                                                    alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a
                                                href="{{ route('front.project', $project->id) }}">{{ $project->title }}</a>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend m-2 text-left">Views :
                                        {{ $project->counter }}</div>
                                    <div class="product-card__actions">
                                        <div class="product-card__prices">
                                            {{ $project->startup_cost }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <span class="badge bg-danger">No Projects Yet</span>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('machines')
    {{-- <div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="1">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title">Related Machines</h3>
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
                <div class="block-products-carousel__preloader"></div>
                <div class="owl-carousel">
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card product-card--hidden-actions ">
                                <button class="product-card__quickview" type="button">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                </button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                </div>
                                <div class="product-card__image product-image">
                                    <a href="product.html" class="product-image__body">
                                        <img class="product-image__img" src="images/products/product-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name">
                                        <a href="product.html">Electric Planer Brandix KL370090G 300
                                            Watts</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="product-card__rating-stars">
                                            <div class="rating">
                                                <div class="rating__body">
                                                    <svg class="rating__star rating__star--active" width="13px"
                                                        height="12px">
                                                        <g class="rating__fill">
                                                            <use xlink:href="images/sprite.svg#star-normal">
                                                            </use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                            </use>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__star rating__star--only-edge rating__star--active">
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
                                                            <use xlink:href="images/sprite.svg#star-normal">
                                                            </use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                            </use>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__star rating__star--only-edge rating__star--active">
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
                                                            <use xlink:href="images/sprite.svg#star-normal">
                                                            </use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                            </use>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__star rating__star--only-edge rating__star--active">
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
                                                            <use xlink:href="images/sprite.svg#star-normal">
                                                            </use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                            </use>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__star rating__star--only-edge rating__star--active">
                                                        <div class="rating__fill">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                        <div class="rating__stroke">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                    </div>
                                                    <svg class="rating__star " width="13px" height="12px">
                                                        <g class="rating__fill">
                                                            <use xlink:href="images/sprite.svg#star-normal">
                                                            </use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                            </use>
                                                        </g>
                                                    </svg>
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
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">
                                        Availability: <span class="text-success">In Stock</span>
                                    </div>
                                    <div class="product-card__prices">
                                        $749.00
                                    </div>
                                    <div class="product-card__buttons">
                                        <button class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button>
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
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @if (!isset($machines))
        <span class="text-danger">No Machines Related To This Category Was Found</span>
    @else
        <div class="block block-products-carousel" data-layout="grid-4" data-mobile-grid-columns="1">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Related Machines</h3>
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
                    <div class="block-products-carousel__preloader"></div>
                    <div class="owl-carousel">
                        @foreach ($machines as $machine)
                            <div class="block-products-carousel__column">
                                <div class="product-card ">
                                    <div class="product-card__image product-image">
                                        <a href="{{ route('front.machine', $machine->id) }}" class="product-image__body">
                                            @if (isset($machine->gallery))
                                                @foreach ($machine->gallery as $img)
                                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                        <img class="d-block img-fluid"
                                                            src="{{ asset('media/projects/images/' . $img) }}" alt="">
                                                    </div>
                                                @endforeach
                                            @else
                                                <img class="product-image__img" src="{{ asset('media/no image.jpg') }}"
                                                    alt="">
                                            @endif



                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a
                                                href="{{ route('front.machine', $machine->id) }}">{{ $machine->title }}</a>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend m-2 text-left">Views :
                                        {{ $machine->counter }}</div>
                                    <div class="product-card__actions">
                                        <div class="product-card__prices">
                                            {{ $machine->price }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
