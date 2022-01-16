@extends('layouts.app')
@section('title')
    SMES || {{ __('Create New Code') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-capitalize">{{ __('Create New Code') }}</h2>
            </div>
            <hr>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hscodes.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="m-2">
        @include('layouts.errors')
    </div>
    <form class="form-floating text-center m-auto text-capitalize w-50 mt-2" action="{{ route('hscodes.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row m-2">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="hs code" name="code">
                    <label for="floatingInputGrid" class="text-capitalize">{{ __('HS Code') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="en name" name="details">
                    <label for="floatingInputGrid" class="text-capitalize">{{ __('details') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md m-auto">
                <h3 for="">{{ __('Select Parent Code') }}</h3>
                <div class="">
                    <select name="parent_id" id="floatingSelectGrid" class="js-example-basic-single w-75 fs-2">
                        <option selected hidden disabled>{{ __('Select Parent Code') }}</option>
                        @foreach ($codes as $code)
                            <option class="text-capitalize" value="{{ $code->id }}">{{ $code->code }} ||
                                {{ $code->details }}</option>
                            @if ($code->children())
                                @foreach ($code->children as $item)
                                    <option class="text-capitalize" value="{{ $item->id }}"> --{{ $item->code }}
                                        || {{ $item->details }}</option>
                                    @if ($item->children())
                                        @foreach ($item->children as $item1)
                                            <option class="text-capitalize" value="{{ $item1->id }}">
                                                --- {{ $item1->code }} || {{ $item1->details }}</option>
                                            @if ($item1->children())
                                                @foreach ($item1->children as $item4)
                                                    <option class="text-capitalize" value="{{ $item4->id }}">
                                                        ---- {{ $item4->code }} || {{ $item4->details }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </select>

                </div>
            </div>
        </div>
        <hr>
        <div class="row text-center m-2">
            <button class="btn btn-success w-25 m-auto">Submit</button>
        </div>
    </form>
@endsection
