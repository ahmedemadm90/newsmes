@extends('layouts.front')
@section('title')
    {{ $project->title }}
@endsection
@section('name')
    {{ $project->title }}
@endsection
@section('slideshow')
    @if (isset($project->gallery))
        <div class="slideshow-container">
            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                @foreach ($project->gallery as $img)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} w-50 m-auto">
                        <img class="d-block img-fluid m-auto" src="{{ asset("media/categories/images/$img") }}" alt="">
                    </div>
                @endforeach
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
@section('description')
    {!! $project->free_space1 !!}
@endsection
@section('tabs')
    <div class="product-tabs  product-tabs--sticky">
        <div class="product-tabs__list">
            <div class="product-tabs__list-body">
                <div class="product-tabs__list-container container">
                    <a href="#tab-description" class="product-tabs__item product-tabs__item--active">Description</a>
                    <a href="#tab-specification" class="product-tabs__item">Specification</a>
                    <a href="#tab-reviews" class="product-tabs__item">Machines</a>
                </div>
            </div>
        </div>

        <div class="product-tabs__content">
            <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                <div class="typography">
                    <h3>Description</h3>
                    <p>
                        {!! $project->free_space1 !!}
                    </p>
                    <p>
                        {!! $project->free_space2 !!}
                    </p>
                    <p>
                        {!! $project->free_space3 !!}
                    </p>
                </div>
            </div>
            <div class="product-tabs__pane" id="tab-specification">
                <div class="spec">
                    <h3 class="spec__header">Specification</h3>
                    <div class="spec__section">
                        <h4 class="spec__section-title">General</h4>
                        <div class="spec__row">
                            <div class="spec__name">Space Required</div>
                            <div class="spec__value">{{ $project->space }}</div>
                        </div>
                        <div class="spec__row">
                            <div class="spec__name">Startup Cost Required</div>
                            <div class="spec__value">{{ $project->startup_cost }}</div>
                        </div>
                        <div class="spec__row">
                            <div class="spec__name">Eployees Required</div>
                            <div class="spec__value">{{ $project->emps }}</div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="product-tabs__pane" id="tab-reviews">
                @foreach ($machines as $machine)
                    <div class="block-product-columns__item">
                        <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                            <div class="product-card__image product-image">
                                <a href="{{ route('front.machine', $machine->id) }}" class="product-image__body">
                                    @if (isset($machine->gallery))
                                        <div id="carouselExampleControls" class="carousel slide shadow-none"
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
                                        <img class="product-image__img" src="media/no image.jpg" alt="">
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
