@extends('layouts.app')
@section('title')
    {{ __('Add New Material') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Add New Material') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('materials.index') }}">{{ __('Back') }}</a>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.errors')

    <form class="form-floating text-center m-auto text-capitalize w-100 mt-2" action="{{ route('materials.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row  m-2">
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name">
                    <label for="floatingInputGrid">{{ __('material name') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <select class="form-select" id="floatingInput" placeholder="machine vendor name" name="vendor_id">
                        <option selected hidden disabled>{{ 'Select Vendor' }}</option>

                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingInputGrid">{{ __('macine vendor') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <select class="form-select" id="floatingInput" placeholder="unit" name="unit">
                        <option selected hidden disabled>{{ 'Select unit' }}</option>
                        <option value="kg">{{ __('KG') }}</option>
                        <option value="meter">{{ __('Meter') }}</option>
                    </select>
                    <label for="floatingInputGrid">{{ __('machine vendor') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="unit price" name="unit_price">
                    <label for="floatingInputGrid">{{ __('unit price') }}</label>
                </div>
            </div>
            {{-- <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ar name" name="hs_code">
                    <label for="floatingInputGrid" class="text-capitalize">{{ __('HS Code') }}</label>
                </div>
            </div> --}}
        </div>
        <div class="row m-2">
            <h5 for="">{{__('Select Codes')}}</h5>
            <div class="">
                <select name="hs_code[]" id="multiple_code" class="js-example-basic-multiple w-75" multiple>
                    @foreach (App\Models\HsCode::whereNull('parent_id')->get() as $code)
                        <option class="text-capitalize" value="{{ $code->id }}">{{ $code->code }} ||
                            {{ $code->details }}</option>
                        @if ($code->children())
                            @foreach ($code->children as $item)
                                <option class="text-capitalize" value="{{ $item->id }}"> --{{ $item->code }}
                                    || {{ $item->details }}</option>
                            @endforeach
                        @endif
                    @endforeach
                </select>

            </div>
        </div>

        <div class="row w-50 m-auto  mb-2">
            <div class="col-md-3 m-auto">
                <label for="gallery" class="btn btn-primary">{{ __('image') }}</label>
                <input class="form-control" id="gallery" type="file" name="gallery[]"
                    accept=".jpg, .png, .jpeg, .gif|image/*" multiple hidden>
            </div>
            <div class="col-md-3 m-auto">
                <label for="video" class="btn btn-info">{{ __('video') }}</label>
                <input class="form-control" type="file" id="video" name="video" accept=".mp4, .flv|videos/*" hidden>
            </div>
        </div>
        <div class="row border-bottom mb-2">
            <h2 class="text-primary">{{ __('Machines') }}</h2>
            @foreach ($machines as $machine)
                <div class="form-check form-switch col-md-4 m-auto">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                        value="{{ $machine->id }}" name="machines_id[]">
                    <label class="form-check-label" for="flexSwitchCheckChecked">{{ $machine->title }}</label>
                </div>
            @endforeach
        </div>
        <div class="col m-auto">
            <div class="form-floating m-2">
                <button class="btn btn-success text-capitalize">{{ __('Add') }}</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
    </script>
@endsection
