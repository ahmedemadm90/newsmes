@extends('layouts.app')
@section('title')
    <span class="text-capitalize">about Category || {{ $category->id }}</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2 class="text-capitalize mb-1">
                    <span class="text-capitalize">about Category || <span
                            class="text-primary">{{ $category->en_name }}</span>
                        || <span class="text-secondary">{{ $category->ar_name }}</span></span>
                </h2>
            </div>
            @can('Category Create')
                <div class="pull-right mt-2">
                    <a class="btn btn-success" href="{{ route('categories.index') }}"> {{ __('Back') }}</a>
                </div>
            @endcan
        </div>
    </div>
    <hr>
    <div class="row text-capitalize">
        <div class="col-md-5 card m-auto">
            @if (isset($category->img))
                <img src='{{ asset("media/categories/$category->img") }}' class="card-img-top" alt="" height="80"
                    style="width: 35vh;height:35vh;">
            @else
                <img src='{{ asset('media/no image.jpg') }}' class="card-img-top" alt="" height="80"
                    style="width: 75vh;height:35vh;">
            @endif
            {{-- <img src="{{ asset('media/categories/' . $category->img) }}" class="card-img-top"> --}}
            <div class="card-body">
                <h5 class="card-title text-capitalize">{{ __('Category name') }} : <span
                        class=" text-primary">{{ $category->en_name }} || {{ $category->ar_name }}</span></h5>
                <p class="card-text">Sub Categories Count:
                    {{ App\Models\Category::where('parent_id', $category->id)->count() }}</p>
                <p class="card-text"><small class="text-muted">Created At :
                        {{ $category->created_at->diffForHumans() }}</small></p>
                <p class="card-text"><small class="text-muted">Last Update :
                        {{ $category->updated_at->diffForHumans() }}</small></p>
            </div>
        </div>
    </div>
    @include('layouts.sessions')
@endsection
