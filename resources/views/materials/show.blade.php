@extends('layouts.app')
@section('title')
{{__('About Machine')}} || {{$machine->title}}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{__('About Machine')}} || <span class="text-danger">{{$machine->title}}</span></h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('machines.index') }}"> {{__('Back')}}</a>
        </div>
    </div>
</div>
<hr>
@include('layouts.errors')

<form class="form-floating text-center m-auto text-capitalize w-100 mt-2">
    <div class="row  m-2">
        <div class="col-md-6 m-auto mb-2">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="name" value="{{$machine->title}}"  readonly>
                <label for="floatingInputGrid">{{__('machine name')}}</label>
            </div>
        </div>
    </div>
    <div class="row  m-2">
        <div class="col-md-6 m-auto mb-2">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="name" value="{{$machine->vendor->name}}" readonly>
                <label for="floatingInputGrid">{{__('machine vendor')}}</label>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
    @foreach ($machine->categories_id as $id)
    <div class="col-md-3 m-2 m-auto">
        <span class="badge bg-success">{{$machine->categories($id)->en_name}} || {{$machine->categories($id)->ar_name}}</span>
    </div>
    @endforeach
    </div>
    <hr>
    <div class="row">
        <div id="carouselExampleControlsNoTouching" class="carousel slide col-md-6" data-bs-touch="false"
            data-bs-interval="false">
            <div class="carousel-inner shadow-none mt-4">
                <div class="row">
                    @foreach ($machine->gallery as $img)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src='{{ asset("media/machines/images/$img") }}' style="height: 240px"
                            class="w-75">
                    </div>
                    @endforeach
                </div>
                <button class="btn btn-secondary m-3" type="button"
                    data-bs-target="#carouselExampleControlsNoTouching"
                    data-bs-slide="prev">{{ __('Previous') }}</button>
                <button class="btn btn-primary m-3" type="button"
                    data-bs-target="#carouselExampleControlsNoTouching"
                    data-bs-slide="next">{{ __('Next') }}</button>
            </div>
        </div>
        <div class="col-md-6">
            <label>{{ __('Video') }}</label><br>
            <video class="w-100" src='{{ asset("media/machines/video/$machine->video") }}'  controls
                style=" height: 250px"></video>
        </div>
    </div>
</form>
@endsection
