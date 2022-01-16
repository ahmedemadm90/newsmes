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
                            @foreach ($c->children as $item)
                                <option class="text-capitalize" value="{{ $item->id }}" @if ($code->parent_id == $item->id) selected @endif
                                    @if ($item->id == $code->id) disabled @endif>
                                    --{{ $item->code }} || {{ $item->details }}</option>
                                @foreach ($item->children as $item1)
                                    <option class="text-capitalize" value="{{ $item1->id }}" @if ($code->parent_id == $item1->id) selected @endif
                                        @if ($item1->id == $code->id) disabled @endif>
                                        ---{{ $item1->code }} || {{ $item1->details }}</option>

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
