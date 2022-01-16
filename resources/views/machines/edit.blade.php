@extends('layouts.app')
@section('title')
    {{ __('Edit Machine') }} || {{ $machine->title }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Edit Machine') }} || <span class="text-danger">{{ $machine->title }}</span></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('machines.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.errors')

    <form class="form-floating text-center m-auto text-capitalize w-100 mt-2"
        action="{{ route('machines.update', $machine->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row  m-2">
            <div class="col-md-6 m-auto mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name" name="title"
                        value="{{ $machine->title }}">
                    <label for="floatingInputGrid">{{ __('machine name') }}</label>
                </div>
            </div>
            <div class="col-md-6 m-auto mb-2">
                <div class="form-floating">
                    {{-- <input type="text" class="form-control" id="floatingInput" placeholder="name" name="title"> --}}
                    <select class="form-select" id="floatingInput" placeholder="name" name="vendor_id">
                        <option selected hidden disabled>{{ 'Select Vendor' }}</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}" @if ($machine->vendor_id == $vendor->id)
                                selected
                        @endif>{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingInputGrid">{{ __('machine name') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md-6 m-auto mb-2">
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInput" placeholder="price" name="price"
                        value="{{ $machine->price }}">
                    <label for="floatingInputGrid">{{ __('machine price') }}</label>
                </div>
            </div>
            <div class="col-md-6 m-auto mb-2">
                <div class="form-floating">
                    <select name="category_id" id="floatingSelectGrid" class="form-select">
                        <option class="text-capitalize" disabled hidden selected>{{ __('Select Category') }}
                        </option>
                        @foreach ($categories as $cat)
                            <option class="text-capitalize" value="{{ $cat->id }}" @if ($cat->id == $machine->category_id)
                                selected
                        @endif>{{ $cat->en_name }} ||
                        {{ $cat->ar_name }}</option>
                        @if ($cat->children)
                            @foreach ($cat->children as $item)
                                <option class="text-capitalize" value="{{ $item->id }}" @if ($item->id == $machine->category_id)
                                    selected
                            @endif>
                            --{{ $item->en_name }}
                            || {{ $item->ar_name }}</option>
                            @if ($item->children)
                                @foreach ($item->children as $item1)
                                    <option class="text-capitalize" value="{{ $item1->id }}" @if ($item1->id == $machine->category_id)
                                        selected
                                @endif>
                                ---{{ $item1->en_name }}
                                || {{ $item1->ar_name }}</option>
                            @endforeach
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                    </select>
                    <label for="floatingInputGrid" class="text-capitalize">{{ __('Select Parent Category') }}</label>
                </div>
            </div>
        </div>
        {{-- <div class="row m-2">
            <div class="col-md-6 m-auto mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="price" name="hs_code"
                        value="{{ $machine->hs_code }}">
                    <label for="floatingInputGrid">{{ __('HS Code') }}</label>
                </div>
            </div>
        </div> --}}
        <div class="row m-2">
            <div class="col-md m-auto">
                <h3 for="">{{__('Select Code')}}</h3>
                <div class="">
                    @if(isset($machine->hs_code))
                    <select name="hs_code[]" id="multiple_code" class="js-example-basic-multiple w-75 fs-2" multiple>
                        @foreach (App\Models\HsCode::whereNull('parent_id')->get() as $lv1)
                            <option class="text-capitalize" value="{{ $lv1->id }}" @if (in_array($lv1->id,$machine->hs_code))
                                selected
                            @endif>{{ $lv1->code }} ||
                                {{ $lv1->details }}</option>
                            @if ($lv1->children)
                                @foreach ($lv1->children as $lv2)
                                    <option class="text-capitalize" value="{{ $lv2->id }}" @if (in_array($lv2->id,$machine->hs_code))
                                selected
                            @endif> --{{ $lv2->code }}
                                        || {{ $lv2->details }}</option>
                                        @if($lv2->children)
                                        @foreach($lv2->children as $lv3)
                                        <option value="{{$lv3->id}}" @if (in_array($lv3->id,$machine->hs_code))
                                selected
                            @endif>--{{ $lv3->code }}
                                        || {{ $lv3->details }}</option>
                                        @if($lv3->children)
                                        @foreach($lv3->children as $lv4)
                                        <option value="{{$lv4->id}}" @if (in_array($lv4->id,$machine->hs_code))
                                selected
                            @endif>--{{ $lv4->code }}
                                        || {{ $lv4->details }}</option>
                                        @endforeach
                                        @endif
                                        @endforeach
                                        @endif
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                    @else
                    <select name="hs_code[]" id="multiple_code" class="js-example-basic-multiple w-75 fs-2" multiple>
                        @foreach (App\Models\HsCode::whereNull('parent_id')->get() as $lv1)
                            <option class="text-capitalize" value="{{ $lv1->id }}">{{ $lv1->code }} ||
                                {{ $lv1->details }}</option>
                            @if ($lv1->children)
                                @foreach ($lv1->children as $lv2)
                                    <option class="text-capitalize" value="{{ $lv2->id }}"> --{{ $lv2->code }}
                                        || {{ $lv2->details }}</option>
                                        @if($lv2->children)
                                        @foreach($lv2->children as $lv3)
                                        <option value="{{$lv3->id}}">---{{ $lv3->code }}
                                        || {{ $lv3->details }}</option>
                                        @if($lv3->children)
                                        @foreach($lv3->children as $lv4)
                                        <option value="{{$lv4->id}}">----{{ $lv4->code }}
                                        || {{ $lv4->details }}</option>
                                        @endforeach
                                        @endif
                                        @endforeach
                                        @endif
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                    @endif

                    {{-- @if (isset($machine->hs_code)
                    <select name="parent_id" id="floatingSelectGrid" class="js-example-basic-single w-75 fs-2">
                        @foreach (App\Models\HsCode::whereNull('parent_id')->get() as $c)
                            <option class="text-capitalize" value="{{ $c->id }}" @if (in_array($c->id,$machine->hs_code)) selected @endif>{{ $c->code }} ||
                        {{ $c->details }}</option>
                        @if ($c->children)
                            @foreach ($c->children as $lv1)
                                <option class="text-capitalize" value="{{ $lv1->id }}" @if (in_array($lv1->id,$machine->hs_code)) selected @endif>
                                    --{{ $lv1->code }} || {{ $lv1->details }}</option>
                                @foreach ($lv1->children as $lv1Cild)
                                    <option class="text-capitalize" value="{{ $lv1Cild->id }}" @if (in_array($lv1Cild->id,$machine->hs_code)) selected @endif>
                                        ---{{ $lv1Cild->code }} || {{ $lv1Cild->details }}</option>
                                        @foreach ($lv1Cild->children as $lv4Cild)
                                        <option class="text-capitalize" value="{{ $lv4Cild->id }}" @if (in_array($lv4Cild->id,$machine->hs_code)) selected @endif>
                                        ----{{ $lv4Cild->code }} || {{ $lv4Cild->details }}</option>
                                        @endforeach
                                @endforeach
                            @endforeach
                        @endif
                        @endforeach
                    </select>
                    @else
                    <select name="parent_id" id="floatingSelectGrid" class="js-example-basic-single w-75 fs-2">
                        @foreach (App\Models\HsCode::whereNull('parent_id')->get() as $c)
                            <option class="text-capitalize" value="{{ $c->id }}"
                        >{{ $c->code }} ||
                        {{ $c->details }}</option>
                        @if ($c->children)
                            @foreach ($c->children as $lv1)
                                <option class="text-capitalize" value="{{ $lv1->id }}" >
                                    --{{ $lv1->code }} || {{ $lv1->details }}</option>
                                @foreach ($lv1->children as $lv1Cild)
                                    <option class="text-capitalize" value="{{ $lv1Cild->id }}" >
                                        ---{{ $lv1Cild->code }} || {{ $lv1Cild->details }}</option>
                                        @foreach ($lv1Cild->children as $lv4Cild)
                                        <option class="text-capitalize" value="{{ $lv4Cild->id }}" >
                                        ----{{ $lv4Cild->code }} || {{ $lv4Cild->details }}</option>
                                        @endforeach
                                @endforeach
                            @endforeach
                        @endif
                        @endforeach
                    </select>
                    @endif--}}

                </div>
            </div>
        </div>
        <div class="row">
            <div id="carouselExampleControlsNoTouching" class="carousel slide col-md-6" data-bs-touch="false"
                data-bs-interval="false">
                <div class="carousel-inner shadow-none mt-4">
                    <div class="row">
                        @if (isset($machine->gallery))
                            @foreach ($machine->gallery as $img)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img src='{{ asset("media/machines/images/$img") }}' style="height: 240px"
                                        class="w-75">
                                </div>
                            @endforeach
                            <button class="btn btn-secondary m-3" type="button"
                                data-bs-target="#carouselExampleControlsNoTouching"
                                data-bs-slide="prev">{{ __('Previous') }}</button>
                            <button class="btn btn-primary m-3" type="button"
                                data-bs-target="#carouselExampleControlsNoTouching"
                                data-bs-slide="next">{{ __('Next') }}</button>
                            <div class="">
                                <label for="gallery" class="btn btn-success">{{ __('update gallery') }}</label>
                                <input id="gallery" class="form-control" type="file" name="gallery[]"
                                    accept=".jpg, .png, .jpeg, .gif|image/*" multiple hidden>
                            </div>
                        @else
                            <img src='{{ asset('media/no image.jpg') }}' class="m-auto" alt=""
                                style="width: 75vh;height:35vh;">
                            <div class="">
                                <label for="gallery" class="btn btn-success">{{ __('update gallery') }}</label>
                                <input id="gallery" class="form-control" type="file" name="gallery[]"
                                    accept=".jpg, .png, .jpeg, .gif|image/*" multiple hidden>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                @if (isset($machine->video))
                    <video class="w-100" src='{{ asset("media/machines/video/$machine->video") }}' controls
                        style=" height: 250px"></video>
                    <label for=" video" class="btn btn-primary">{{ __('update Video') }}</label>
                    <input id=" video" class="form-control" type="file" name="video" accept=".mp4, .flv|videos/*" multiple
                        hidden>
                @else
                    <img src='{{ asset('media/no video.jpg') }}' class="m-auto" alt="" height="80"
                        style="width: 75vh;height:35vh;">
                    <label for=" video" class="btn btn-primary">{{ __('update Video') }}</label>
                    <input id=" video" class="form-control" type="file" name="video" accept=".mp4, .flv|videos/*" multiple
                        hidden>
                @endif
            </div>
        </div>

        <hr>
        {{-- @foreach ($categories as $cat)
            <div class="row">
                <h3>{{ $cat->en_name }}</h3>
                @if ($cat->children)
                    @foreach ($cat->children as $child)
                        <div class="col-md-4">
                            <div class="form-check form-switch">
                                <input type="checkbox" value="{{ $child->id }}" class="form-check-input"
                                    id="{{ $child->en_name }}" name="categories_id[]" @if (in_array($child->id, $machine->categories_id))
                                checked
                    @endif>
                    <label for="{{ $child->en_name }}" class="form-check-label">{{ $child->en_name }}</label>
            </div>
        @endforeach
        @endif
        </div>
        @endforeach --}}
        <div class="row m-auto">
            <div class="form-floating m-auto ">
                <button class="btn btn-success text-capitalize">Update</button>
            </div>
        </div>
    </form>
@endsection
