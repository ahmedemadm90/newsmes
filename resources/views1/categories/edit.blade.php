@extends('layouts.app')
@section('title')
    {{ __('Edit ') }} || {{ $category->en_name }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-capitalize">{{ __('Edit Category') }} || <span
                        class="text-info">{{ $category->en_name }}</span> || <span
                        class="text-success">{{ $category->ar_name }}</span></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="m-2">
        @include('layouts.errors')
    </div>
    <form class="form-floating text-center m-auto text-capitalize w-50 mt-2"
        action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @if (isset($category->img))
                <img src='{{ asset("media/categories/$category->img") }}' class="m-auto" alt="" height="80"
                    style="width: 35vh;height:35vh;">
            @else
                <img src='{{ asset('media/no image.jpg') }}' class="m-auto" alt="" height="80"
                    style="width: 75vh;height:35vh;">
            @endif
        </div>
        <div class="row m-2">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="en name" name="en_name"
                        value="{{ $category->en_name }}">
                    <label for="floatingInputGrid" class="text-capitalize">{{ __('En name') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ar name" name="ar_name"
                        value="{{ $category->ar_name }}">
                    <label for="floatingInputGrid" class="text-capitalize">{{ __('ar name') }}</label>
                </div>
            </div>
        </div>

        <div class="row m-2">
            <div class="col-md m-auto">
                <h3 for="">{{ __('Select Code') }}</h3>
                <div class="">
                    <select name="hs_code" id="floatingSelectGrid" class="js-example-basic-single w-75 fs-2">
                        <option selected hidden disabled>{{ __('Select HS Code') }}</option>
                        @foreach (App\Models\HsCode::whereNull('parent_id')->get() as $code)
                            <option class="text-capitalize" value="{{ $code->id }}" @if ($code->id == $category->hs_code)
                                selected
                        @endif>{{ $code->code }} ||
                        {{ $code->details }}</option>
                        @if ($code->children())
                            @foreach ($code->children as $item)
                                <option class="text-capitalize" value="{{ $item->id }}" @if ($item->id == $category->hs_code)
                                    selected
                            @endif> --{{ $item->code }}
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
                <div class="form-floating">
                    <select name="parent_id" id="floatingSelectGrid" class="js-example-basic-single w-75 fs-2">
                        <option class="text-capitalize" disabled hidden selected>{{ __('Select Parent Category') }}
                        </option>
                        @foreach ($categories as $cat)
                            <option class="text-capitalize" value="{{ $cat->id }}" @if ($cat->id == $category->parent_id)
                                selected
                                @endif @if ($cat->id == $category->id)
                                    disabled hidden
                                @endif>{{ $cat->en_name }} ||
                                {{ $cat->ar_name }}</option>
                            @if ($cat->children())
                                @foreach ($cat->children as $item)
                                    <option class="text-capitalize" value="{{ $item->id }}" @if ($item->id == $category->parent_id)
                                        selected
                                        @endif @if ($item->id == $category->id)
                                            disabled hidden
                                        @endif> --{{ $item->en_name }}
                                        || {{ $item->ar_name }}</option>
                                    @if ($item->children())
                                        @foreach ($item->children as $item1)
                                            <option class="text-capitalize" value="{{ $item1->id }}" @if ($item1->id == $category->parent_id)
                                                selected
                                                @endif
                                                @if ($item1->id == $category->id)
                                                    disabled hidden
                                                @endif>
                                                ---{{ $item1->en_name }} || {{ $item1->ar_name }}</option>
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
                <label for="formFileSm" class="form-label btn btn-warning mt-1">{{ __('Update Category Image') }}</label>
                <input id="formFileSm" type="file" style="display: none" name="img">
            </div>
            <div class="col-md-4 m-auto">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" value="1"
                        @if ($category->active == '1')
                    checked
                    @endif>
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
