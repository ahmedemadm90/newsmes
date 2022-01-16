@extends('layouts.app')
@section('title')
    {{__('Edit Investfield')}}
@endsection
@section('content')
    <div class="row mb-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{__('Edit Investfield')}} || <span class="text-primary">{{$investfield->en_title}}</span> || <span class="text-info">{{$investfield->ar_title}}</span></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('investfields.index') }}">{{ __('Back') }}</a>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.errors')
    <form class="form w-50 m-auto" action="{{route('investfields.update',$investfield->id)}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 m-2">
                <div class="col m-auto">
                    <div class="form-floating">
                        <input type="name" class="form-control" id="floatingInput" placeholder="technology name"
                            name="en_title" value="{{$investfield->en_title}}">
                        <label for="floatingInput">{{ __('En Investfields Name') }}</label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 m-2">
                <div class="col m-auto">
                    <div class="form-floating">
                        <input type="name" class="form-control" id="floatingInput" placeholder="technology name"
                            name="ar_title" value="{{$investfield->ar_title}}">
                        <label for="floatingInput">{{ __('Ar Investfields Name') }}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success col-md-3 m-auto">{{__('Update')}}</button>
        </div>
    </form>
@endsection
