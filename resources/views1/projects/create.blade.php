@extends('layouts.app')
@section('title')
    {{ __('Create New Project') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Create New Project') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}">{{ __('Back') }}</a>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.errors')
    <form class="form-floating text-center m-auto text-capitalize overflow-hidden mt-2"
        action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row  m-2">
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name" name="title">
                    <label for="floatingInputGrid">{{ __('Project Title') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <select name="user_id" class="form-select" id="floatingInput">
                        <option selected hidden disabled>{{ __('Select User') }}</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingInputGrid">{{ __('User') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <select name="field_id" class="form-select text-capitalize" id="floatingInput">
                        <option selected hidden disabled>{{ __('select investment field') }}</option>
                        @foreach ($investfields as $field)
                            <option value="{{ $field->id }}">{{ $field->en_title }} || {{ $field->ar_title }}
                            </option>
                        @endforeach
                    </select>
                    <label for="floatingInputGrid">{{ __('select investment field') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <select name="idea_id" class="form-select text-capitalize" id="floatingInput">
                        <option selected hidden disabled>{{ __('select Project Idea') }}</option>
                        @foreach ($ideas as $idea)
                            <option value="{{ $idea->id }}">{{ $idea->en_title }} || {{ $idea->en_title }}
                            </option>
                        @endforeach
                    </select>
                    <label for="floatingInputGrid">{{ __('select Project Idea') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">

            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <select name="tech_id" class="form-select text-capitalize" id="floatingInput">
                        <option selected hidden disabled>{{ __('select project tech') }}</option>
                        @foreach ($techs as $tech)
                            <option value="{{ $tech->id }}">{{ $tech->en_title }} || {{ $tech->ar_title }}
                            </option>
                        @endforeach
                    </select>
                    <label for="floatingInputGrid">{{ __('select project tech') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="number" class="form-control" id="emps" placeholder="Employees Needed" name="emps">
                    <label for="emps">{{ __('Employees Needed') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="number" class="form-control" id="startup" placeholder="startup investment"
                        name="startup_cost">
                    <label for="startup">{{ __('startup investment') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="number" class="form-control" id="space" placeholder="space" name="space">
                    <label for="space">{{ __('space') }}</label>
                </div>
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
        <hr>
        <div class="row overflow-hidden">
            <div class="col-md">
                <div class="row">
                    <h2 class="text-danger text-decoration-underline">{{ __('Categories') }}</h2>
                </div>
                <div class="col-md">
                    <select name="categories_id[]" id="floatingSelectGrid" class="js-example-basic-multiple w-75" multiple>
                        @foreach ($categories as $cat)
                            <option class="text-capitalize" value="{{ $cat->id }}">{{ $cat->en_name }} ||
                                {{ $cat->ar_name }}</option>
                            @if ($cat->children())
                                @foreach ($cat->children as $item)
                                    <option class="text-capitalize" value="{{ $item->id }}">
                                        --{{ $item->en_name }}
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
            <div class="col-md">
                <div class="row">
                    <h2 class="text-danger text-decoration-underline">{{ __('Select Codes') }}</h2>
                </div>
                <div class="col-md">
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

        </div>
        <hr>
        <div class="row">
            <div class="col-md">
                <div class="row">
                    <h2 class="text-danger text-decoration-underline">{{ __('Select Machines') }}</h2>
                </div>
                <div class="col-md">
                    <select name="machines_id[]" id="multiple_machines" class="js-example-basic-multiple w-75" multiple>
                        @foreach ($machines as $machine)
                            <option class="text-capitalize" value="{{ $machine->id }}">{{ $machine->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md">
                <div class="row">
                    <h2 class="text-danger text-decoration-underline">{{ __('Select Materials') }}</h2>
                </div>
                <div class="col-md">
                    <select name="materials_id[]" id="multiple_materials" class="js-example-basic-multiple w-75" multiple>
                        @foreach (App\Models\Material::get() as $material)
                            <option class="text-capitalize" value="{{ $material->id }}">{{ $material->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <div class="row" id="">
            <div class="col-md-8 m-auto">
                <textarea name="about" id="about" cols="30" rows="25" placeholder="About"></textarea>
            </div>
        </div>
        <div class="row" id="">
            <div class="col-md-8 m-auto">
                <textarea name="free_space1" id="editor1" cols="30" rows="25" placeholder="Free Space 1"></textarea>
            </div>
        </div>
        <div class="row" id="">
            <div class="col-md-8 m-auto">
                <textarea name="free_space2" id="editor2" cols="30" rows="10" placeholder="Free Space 2"></textarea>
            </div>
        </div>
        <div class="row" id="">
            <div class="col-md-8 m-auto">
                <textarea name="free_space3" id="editor3" cols="30" rows="10" placeholder="Free Space 3"></textarea>
            </div>
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
        ClassicEditor
            .create(document.querySelector('#about'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor3'))
            .catch(error => {
                console.error(error);
            });
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            $('#multiple_machines').select2();
            $('#multiple_materials').select2();
        });
    </script>
@endsection
