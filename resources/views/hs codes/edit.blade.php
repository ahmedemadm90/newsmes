@extends('layouts.app')
@section('title')
    {{ __('Edit ') }} || {{ $code->code }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-capitalize">{{ __('Edit Code') }} || <span class="text-danger">{{ $code->code }}</span>
                </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hscodes.index') }}"> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="m-2">
        @include('layouts.errors')
    </div>
    <form class="form-floating text-center m-auto text-capitalize w-50 mt-2"
        action="{{ route('hscodes.update', $code->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row m-2">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="hs code" name="code"
                        value="{{ $code->code }}">
                    <label for="floatingInputGrid" class="text-capitalize">{{ __('HS Code') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="en name" name="details"
                        value="{{ $code->details }}">
                    <label for="floatingInputGrid" class="text-capitalize">{{ __('details') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md m-auto">
                <h3 for="">{{ __('Select Parent Code') }}</h3>
                <div class="">
                    <select name="parent_id" id="floatingSelectGrid" class="js-example-basic-single w-75 fs-2">
                        @foreach ($codes as $c)
                            <option class="text-capitalize" value="{{ $c->id }}" @if ($code->parent_id == $c->id)
                                selected
                        @endif
                        @if ($c->id == $code->id)
                            disabled
                        @endif>{{ $c->code }} ||
                        {{ $c->details }}</option>
                        @if ($c->children())
                            @foreach ($c->children as $lv1)
                                <option class="text-capitalize" value="{{ $lv1->id }}" @if ($code->parent_id == $lv1->id) selected @endif
                                    @if ($lv1->id == $code->id) disabled @endif>
                                    --{{ $lv1->code }} || {{ $lv1->details }}</option>
                                @foreach ($lv1->children as $lv2)
                                    <option class="text-capitalize" value="{{ $lv2->id }}" @if ($code->parent_id == $lv2->id) selected @endif
                                        @if ($lv2->id == $code->id) disabled @endif>
                                        ---{{ $lv2->code }} || {{ $lv2->details }}</option>
                                        @foreach ($lv2->children as $lv4Cild)
                                        <option class="text-capitalize" value="{{ $lv4Cild->id }}" @if ($code->parent_id == $lv4Cild->id) selected @endif
                                        @if ($lv4Cild->id == $code->id) disabled @endif>
                                        ----{{ $lv4Cild->code }} || {{ $lv4Cild->details }}</option>
                                        @endforeach
                                @endforeach
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
