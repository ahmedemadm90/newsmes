@extends('layouts.app')
@section('title')
    {{ __('Edit Material') }} || {{ $material->name }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Edit Material') }} || <span class="text-danger">{{ $material->name }}</span></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('materials.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.errors')

    <form class="form-floating text-center m-auto text-capitalize w-100 mt-2"
        action="{{ route('materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row  m-2">
            <div class="col-md-6 m-auto mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name"
                        value="{{ $material->name }}">
                    <label for="floatingInputGrid">{{ __('material name') }}</label>
                </div>
            </div>
            <div class="col-md-6 m-auto mb-2">
                <div class="form-floating">
                    {{-- <input type="text" class="form-control" id="floatingInput" placeholder="name" name="title"> --}}
                    <select class="form-select" id="floatingInput" placeholder="name" name="vendor_id">
                        <option selected hidden disabled>{{ 'Select Vendor' }}</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}" @if ($material->vendor_id == $vendor->id)
                                selected
                        @endif>{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingInputGrid">{{ __("material's Vendor name") }}</label>
                </div>
            </div>
        </div>
        {{-- <div class="row m-2">
            <div class="col-md-6 m-auto mb-2">
                <div class="form-floating">
                    <select class="form-select" id="floatingInput" placeholder="name" name="vendor_id">
                        <option selected hidden disabled>{{ 'Select Vendor' }}</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}" @if ($material->vendor_id == $vendor->id)
                                selected
                        @endif>{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingInputGrid">{{ __("material's Vendor name") }}</label>
                </div>
            </div>
        </div> --}}
        <div class="row m-2">
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <select class="form-select" id="floatingInput" placeholder="unit" name="unit">
                        <option selected hidden>
                            @if (!$material->unit)
                                No Unit Choosen
                            @else
                                {{ $material->unit }}
                            @endif
                        </option>
                        <option value="kg">{{ __('KG') }}</option>
                        <option value="meter">{{ __('Meter') }}</option>
                    </select>
                    <label for="floatingInputGrid">{{ __('machine vendor') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="unit price" name="unit_price"
                        value="{{ $material->unit_price }}">
                    <label for="floatingInputGrid">{{ __('unit price') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <h2>{{__('Select Code')}}</h2>
            @if (isset($material->hs_code))
                <select name="hs_code[]" id="multiple_code" class="js-example-basic-multiple w-100 fs-2" multiple>
                    @foreach (App\Models\HsCode::whereNull('parent_id')->get() as $lv1)
                        <option class="text-capitalize" value="{{ $lv1->id }}" @if (in_array($lv1->id, $material->hs_code)) selected @endif>
                            {{ $lv1->code }} || {{ $lv1->details }}</option>
                        @if ($lv1->children)
                            @foreach ($lv1->children as $lv2)
                                <option class="text-capitalize" value="{{ $lv2->id }}" @if (in_array($lv2->id, $material->hs_code)) selected @endif>
                                    --{{ $lv2->code }} || {{ $lv2->details }}</option>
                                @if ($lv2->children)
                                    @foreach ($lv2->children as $lv3)
                                        <option value="{{ $lv3->id }}" @if (in_array($lv3->id, $material->hs_code)) selected @endif>
                                            ---{{ $lv3->code }} || {{ $lv3->details }}</option>
                                        @if ($lv3->children)
                                            @foreach ($lv3->children as $lv4)
                                                <option value="{{ $lv4->id }}" @if (in_array($lv4->id, $material->hs_code)) selected @endif>
                                                    ----{{ $lv4->code }}
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
                                @if ($lv2->children)
                                    @foreach ($lv2->children as $lv3)
                                        <option value="{{ $lv3->id }}">---{{ $lv3->code }}
                                            || {{ $lv3->details }}</option>
                                        @if ($lv3->children)
                                            @foreach ($lv3->children as $lv4)
                                                <option value="{{ $lv4->id }}">----{{ $lv4->code }}
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
        </div>
        <div class="row">
            <div class="col-md">
                @if (isset($material->gallery))
                    <div id="carouselExampleControlsNoTouching" class="carousel slide col-md-6" data-bs-touch="false"
                        data-bs-interval="false">
                        <div class="carousel-inner shadow-none mt-4">
                            <div class="row">
                                @foreach ($material->gallery as $img)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src='{{ asset("media/materials/images/$img") }}' style="height: 240px"
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
                            </div>
                        </div>
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
            <div class="col-md">
                @if (isset($material->video))
                    <video class="w-100" src='{{ asset("media/machines/video/$material->video") }}' controls
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


        <div class="row text-center">
            <h2 class="text-primary">{{ __('Machines') }}</h2>
            @if (isset($material->machines_id))
                @foreach ($machines as $machine)
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                            value="{{ $machine->id }}" name="machines_id[]" @if (in_array($machine->id, $material->machines_id)) checked @endif>
                        <label class="form-check-label" for="flexSwitchCheckChecked">{{ $machine->title }}</label>
                    </div>
                @endforeach
            @else
                @foreach ($machines as $machine)
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                            value="{{ $machine->id }}" name="machines_id[]">
                        <label class="form-check-label" for="flexSwitchCheckChecked">{{ $machine->title }}</label>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col m-auto">
            <div class="form-floating m-2">
                <button class="btn btn-success text-capitalize">Update</button>
            </div>
        </div>
    </form>
@endsection
