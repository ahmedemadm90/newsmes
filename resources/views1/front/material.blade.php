@extends('layouts.front')
@section('title')
    {{ __('All About ') }} {{ $material->title }}
@endsection
@section('content')
    <h1 class="text-center text-decoration-underline">{{ $material->title }} || {{ $material->counter }}</h1>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if (isset($material->gallery))
                @foreach ($material->gallery as $img)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} w-50">
                        <img class="d-block img-fluid m-auto" src="{{ asset("media/materials/images/$img") }}" alt="">
                    </div>
                @endforeach
            @else
                <div class="carousel-item active w-50">
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
    @if (isset($material->vendor_id))
        {{ __('Vendor') }} : <span class="badge bg-info">{{ $material->vendor->name }}</span><br>
        {{ __('Vendor Mobile') }} : <span class="badge bg-info">{{ $material->vendor->mobile }}</span><br>
        {{ __('Vendor Address') }} : <span class="badge bg-info">{{ $material->vendor->address }}</span>
    @else
        {{ __('Vendor') }} : <span class="badge bg-info">No Vendor</span><br>
        {{ __('Vendor Mobile') }} : <span class="badge bg-info">No Vendor</span><br>
        {{ __('Vendor Address') }} : <span class="badge bg-info">No Vendor</span>
    @endif

@endsection
