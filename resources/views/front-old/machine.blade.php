@extends('layouts.front')
@section('title')
{{ $machine->title }}
@endsection
@section('name')
  {{ $machine->title }}
@endsection
@section('slideshow')
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if (isset($machine->gallery))
                @foreach ($machine->gallery as $img)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} w-50">
                        <img class="d-block img-fluid m-auto" src="{{ asset("media/machines/images/$img") }}" alt="">
                    </div>
                @endforeach
            @else
                <div class="carousel-itema active">
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
@endsection
@section('projects')
<!-- .block-products-carousel -->
            <div class="block block-products-carousel" data-layout="vertical" data-mobile-grid-columns="1">
                <div class="container">
                    <div class="block-header">
                        <h3 class="block-header__title">Projects Uses This Machine</h3>
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
                            @foreach ($projects as $project)
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
                                            <a href="{{route('front.project',$project->id)}}">{{ $project->title }}</a>
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
@endsection
