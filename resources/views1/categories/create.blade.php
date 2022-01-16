@extends('layouts.app')
@section('title')
    {{ __('Create New category') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-capitalize">Create New category</h2>
            </div>
            <hr>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="m-2">
        @include('layouts.errors')
    </div>
    <form class="form-floating text-center m-auto text-capitalize w-50 mt-2" action="{{ route('categories.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row m-2">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="en name" name="en_name">
                    <label for="floatingInputGrid" class="text-capitalize">{{ __('En name') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ar name" name="ar_name">
                    <label for="floatingInputGrid" class="text-capitalize">{{ __('ar name') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md m-auto">
                <h3 for="">{{__('Select Code')}}</h3>
                <div class="">
                    <select name="hs_code" id="floatingSelectGrid" class="js-example-basic-single w-75 fs-2">
                        <option selected hidden disabled>{{__('Select HS Code')}}</option>
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
        <div class="row m-2">
            <div class="col-md m-auto">
                <h3 for="">{{__('Select Parent Category')}}</h3>
                <div class="">
                    <select name="parent_id" id="js-example-basic-single" class="js-example-basic-single w-75 fs-2">
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
        <div class="row m-2">
            <div class="col-md-8 m-auto">
                <label for="formFileSm" class="form-label btn btn-primary mt-1">{{ __('Category Image') }}</label>
                <input id="formFileSm" type="file" style="display: none" name="img">
            </div>
            <div class="col-md-4 m-auto">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" value="1">
                    <label class="form-check-label" for="flexSwitchCheckChecked">{{ __('Active') }}</label>
                </div>
            </div>
        </div>
        <hr>
        <div class="row text-center m-2">
            <button class="btn btn-success w-25 m-auto">Submit</button>
        </div>
    </form>
@endsection
