@extends('layouts.app')
@section('cards')
@include('layouts.cards')
@endsection
@section('title')
{{__('Dashboard')}}
@endsection
@section('header')
@include('layouts.header')
@endsection
@section('sidebar')
@include('layouts.sidebar')
@endsection
@section('page-title')
<div class="row">
    <span class="col-md-6">{{__('Dashboard')}}</span>
    @can('Dashboard Date Stateics')
    <div class="col-md-6">
        <form action="{{route('dashboardByDate')}}" class="row form form-inline" method="post" id="test">
            @csrf
            <div class="col-md-5 m-auto">
                <div class="form-floating">
                    <input type="date" class="form-control" id="floatingInputGrid" name="date_from"
                        placeholder="violation Date" id="date_from">
                    <label for="floatingInputGrid" class="fs-5">{{__('Date From')}}</label>
                </div>
            </div>
            <div class="col-md-5 m-auto">
                <div class="form-floating">
                    <input type="date" class="form-control" id="floatingInputGrid" name="date_to"
                        placeholder="Date From" id="date_to">
                    <label for="floatingInputGrid" class="fs-5">{{__('Date To')}}</label>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success" id="dashboardjson">{{__('Submit')}}</button>
            </div>
        </form>
    </div>
    @endcan
</div>
@endsection
@section('content')

@endsection
