@extends('layouts.app')
@section('title')
    {{ __('Update Vendor') }} || {{ $vendor->name }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Update Vendor') }} || <span class="text-primary">{{ $vendor->name }}</span></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vendors.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.errors')

    <form class="form-floating text-center m-auto text-capitalize w-100 mt-2"
        action="{{ route('vendors.update', $vendor->id) }}" method="POST">
        @csrf
        <div class="row m-auto">
            <div class="col-md m-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name"
                        value="{{ $vendor->name }}">
                    <label for="floatingInputGrid">{{ __('name') }}</label>
                </div>
            </div>
            <div class="col-md m-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="vendor address" name="address"
                        value="{{ $vendor->address }}">
                    <label for="floatingInput">{{ __('address') }}</label>
                </div>
            </div>
            <div class="col-md m-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="vendor mobile" name="mobile"
                        value="{{ $vendor->mobile }}">
                    <label for="floatingInput">{{ __('mobile') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-auto">
            <div class="col-md m-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="owner name" name="owner_name"
                        value="{{ $vendor->owner_name }}">
                    <label for="floatingInputGrid">{{ __('owner name') }}</label>
                </div>
            </div>
            <div class="col-md m-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="owner mobile"
                        name="owner_mobile" value="{{ $vendor->owner_mobile }}">
                    <label for="floatingInput" value="{{ $vendor->owner_mobile }}">{{ __('owner mobile') }}</label>
                </div>
            </div>
            <div class="col-md-4 m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="tax record" name="tax record"
                        value="{{ $vendor->tax_record }}">
                    <label for="floatingInput">{{ __('tax record') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ar name" name="hs_code"
                        value="{{ $vendor->hs_code }}">
                    <label for="floatingInputGrid" class="text-capitalize">{{ __('HS Code') }}</label>
                </div>
            </div>
            <div class="col-md-3 m-auto">
                <div class="form-check form-switch fs-2">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" value="1"
                        @if ($vendor->active == '1')
                    checked
                    @endif>
                    <label class="form-check-label" for="flexSwitchCheckChecked">{{ 'Active' }}</label>
                </div>
            </div>
        </div>
        <div class="col m-auto">
            <div class="form-floating m-2">
                <button class="btn btn-success text-capitalize">{{ __('Update') }}</button>
            </div>
        </div>
    </form>
@endsection
