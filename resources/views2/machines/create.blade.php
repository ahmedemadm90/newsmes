@extends('layouts.app')
@section('title')
    {{ __('Create New Machine') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Create New Machine') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('machines.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.errors')

    <form class="form-floating text-center m-auto text-capitalize w-100 mt-2 overflow-hidden" action="{{ route('machines.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row  m-2">
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name" name="title">
                    <label for="floatingInputGrid">{{ __('machine name') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    {{-- <input type="text" class="form-control" id="floatingInput" placeholder="name" name="title"> --}}
                    <select class="form-select w-100" id="floatingInput" placeholder="name" name="vendor_id">
                        <option selected hidden disabled>{{ 'Select Vendor' }}</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingInputGrid">{{ __('macine name') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md mb-2">
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInput" placeholder="price" name="price">
                    <label for="floatingInputGrid">{{ __('machine price') }}</label>
                </div>
            </div>
            <div class="col-md-6 m-auto mb-2">
                <div class="form-group w-100">
                    <select name="category_id" id="floatingSelectGrid" class="js-example-basic-single w-100 p-2">
                        <option class="text-capitalize" disabled hidden selected>{{ __('Select Category') }}
                        </option>
                        @foreach ($categories as $cat)
                            <option class="text-capitalize" value="{{ $cat->id }}">{{ $cat->en_name }} ||
                                {{ $cat->ar_name }}</option>
                            @if ($cat->children())
                                @foreach ($cat->children as $item)
                                    <option class="text-capitalize" value="{{ $item->id }}"> --{{ $item->en_name }}
                                        || {{ $item->ar_name }}</option>
                                    @if ($item->children())
                                        @foreach ($item->children as $item1)
                                            <option class="text-capitalize" value="{{ $item1->id }}">
                                                ---{{ $item1->en_name }}
                                                || {{ $item1->ar_name }}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-6 m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="hs_code" name="hs_code">
                    <label for="floatingInputGrid">{{ __('HS Code') }}</label>
                </div>
            </div>
        </div> --}}
        <div class="row m-2">
            <div class="col-md m-auto">
                <h3 for="">{{__('Select Code')}}</h3>
                <div class="">
                    <select name="hs_code[]" id="multiple_code" class="js-example-basic-multiple w-75 fs-2" multiple>
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
        </div>
        <hr>
        <div class="row w-50 m-auto mb-2">
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


        <hr>
        <div class="col m-auto">
            <div class="form-floating m-2">
                <button class="btn btn-success text-capitalize">Submit</button>
            </div>
        </div>
    </form>
@endsection
