@extends('layouts.app')
@section('title')
    {{ __('Create New Vendor') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Create New Vendor') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vendors.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.errors')

    <form class="form-floating text-center m-auto text-capitalize w-100 mt-2" action="{{ route('vendors.store') }}"
        method="POST">
        @csrf
        <div class="row m-auto">
            <div class="col-md m-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name">
                    <label for="floatingInputGrid">{{ __('name') }}</label>
                </div>
            </div>
            <div class="col-md m-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="vendor address"
                        name="address">
                    <label for="floatingInput">{{ __('address') }}</label>
                </div>
            </div>
            <div class="col-md m-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="vendor mobile" name="mobile">
                    <label for="floatingInput">{{ __('mobile') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-auto">
            <div class="col-md m-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="owner name" name="owner_name">
                    <label for="floatingInputGrid">{{ __('owner name') }}</label>
                </div>
            </div>
            <div class="col-md m-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="owner mobile"
                        name="owner_mobile">
                    <label for="floatingInput">{{ __('owner mobile') }}</label>
                </div>
            </div>
            <div class="col-md-4 m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="tax record" name="tax record">
                    <label for="floatingInput">{{ __('tax record') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ar name" name="hs_code">
                    <label for="floatingInputGrid" class="text-capitalize">{{ __('HS Code') }}</label>
                </div>
            </div>
            <div class="col-md-3 m-auto">
                <div class="form-check form-switch fs-2">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" value="1">
                    <label class="form-check-label" for="flexSwitchCheckChecked">{{ 'Active' }}</label>
                </div>
            </div>
        </div>
        <div class="col m-auto">
            <div class="form-floating m-2">
                <button class="btn btn-success text-capitalize">Add</button>
            </div>
        </div>
    </form>
@endsection
