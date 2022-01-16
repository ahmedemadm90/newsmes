@extends('layouts.app')
@section('title')
    {{ __('Edit Project') }} || {{ $project->title }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Edit Machine') }} || <span class="text-danger">{{ $project->title }}</span></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.errors')
    <form class="form-floating text-center m-auto text-capitalize overflow-hidden mt-2"
        action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row  m-2">
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name" name="title"
                        value="{{ $project->title }}">
                    <label for="floatingInputGrid">{{ __('Project Title') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <select name="user_id" class="form-select" id="floatingInput">
                        <option selected hidden disabled>{{ __('Select User') }}</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if ($project->user_id == $user->id)
                                selected
                        @endif>{{ $user->name }}</option>
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
                            <option value="{{ $field->id }}" @if ($project->field_id == $field->id)
                                selected
                        @endif>{{ $field->en_title }} || {{ $field->ar_title }}
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
                            <option value="{{ $idea->id }}" @if ($project->idea_id == $idea->id)
                                selected
                        @endif>{{ $idea->en_title }} || {{ $idea->en_title }}
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
                            <option value="{{ $tech->id }}" @if ($project->tech_id == $tech->id)
                                selected
                        @endif>{{ $tech->en_title }} || {{ $tech->ar_title }}
                        </option>
                        @endforeach
                    </select>
                    <label for="floatingInputGrid">{{ __('select project tech') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="number" class="form-control" id="emps" placeholder="Employees Needed" name="emps"
                        value="{{ $project->emps }}">
                    <label for="emps">{{ __('Employees Needed') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="number" class="form-control" id="startup" placeholder="startup investment"
                        name="startup_cost" value="{{ $project->startup_cost }}">
                    <label for="startup">{{ __('startup investment') }}</label>
                </div>
            </div>
            <div class="col-md m-auto mb-2">
                <div class="form-floating">
                    <input type="number" class="form-control" id="space" placeholder="space" name="space"
                        value="{{ $project->space }}">
                    <label for="space">{{ __('space') }}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                @if (isset($project->gallery))
                    <div id="carouselExampleControlsNoTouching col-md" class="carousel slide col-md-6" data-bs-touch="false"
                        data-bs-interval="false">
                        <div class="carousel-inner shadow-none mt-4">
                            <div class="row">
                                @foreach ($project->gallery as $img)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src='{{ asset("public/media/projects/images/$img") }}' style="height: 240px"
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
                @if (isset($project->video))
                    <video class="w-100" src='{{ assets("media/projects/video/$project->video") }}' controls
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
        <div class="row">
            <div class="col-md">
                <h2 class="text-danger text-decoration-underline">{{ __('Categories') }}</h2>
                <select name="categories_id[]" id="floatingSelectGrid" class="js-example-basic-multiple w-100" multiple>
                    @if (isset($project->categories_id))
                        @foreach ($categories as $cat)
                            <option class="text-capitalize" value="{{ $cat->id }}" @if (in_array($cat->id, $project->categories_id)) selected @endif>
                                {{ $cat->en_name }} ||
                                {{ $cat->ar_name }}</option>
                            @if ($cat->children())
                                @foreach ($cat->children as $item)
                                    <option class="text-capitalize" value="{{ $item->id }}" @if (in_array($item->id, $project->categories_id)) selected @endif>
                                        --{{ $item->en_name }} || {{ $item->ar_name }}</option>
                                    @if ($item->children())
                                        @foreach ($item->children as $item1)
                                            <option class="text-capitalize" value="{{ $item1->id }}"
                                                @if (in_array($item1->id, $project->categories_id)) selected @endif> ---{{ $item1->en_name }} ||
                                                {{ $item1->ar_name }}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @else
                        @foreach ($categories as $cat)
                            <option class="text-capitalize" value="{{ $cat->id }}">
                                {{ $cat->en_name }} ||
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
                    @endif
                </select>
            </div>
            <div class="col-md">
                <h2 class="text-danger text-decoration-underline">{{ __('Select Code') }}</h2>
                @if (isset($project->hs_code))
                    <select name="hs_code[]" id="multiple_code" class="js-example-basic-multiple w-75 fs-2" multiple>
                        @foreach (App\Models\HsCode::whereNull('parent_id')->get() as $lv1)
                            <option class="text-capitalize" value="{{ $lv1->id }}" @if (in_array($lv1->id, $project->hs_code))
                                selected
                        @endif>{{ $lv1->code }} ||
                        {{ $lv1->details }}</option>
                        @if ($lv1->children)
                            @foreach ($lv1->children as $lv2)
                                <option class="text-capitalize" value="{{ $lv2->id }}" @if (in_array($lv2->id, $project->hs_code))
                                    selected
                            @endif> --{{ $lv2->code }}
                            || {{ $lv2->details }}</option>
                            @if ($lv2->children)
                                @foreach ($lv2->children as $lv3)
                                    <option value="{{ $lv3->id }}" @if (in_array($lv3->id, $project->hs_code))
                                        selected
                                @endif>---{{ $lv3->code }}
                                || {{ $lv3->details }}</option>
                                @if ($lv3->children)
                                    @foreach ($lv3->children as $lv4)
                                        <option value="{{ $lv4->id }}" @if (in_array($lv4->id, $project->hs_code))
                                            selected
                                    @endif>----{{ $lv4->code }}
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
                            <option class="text-capitalize" value="{{ $lv2->id }}" > --{{ $lv2->code }}
                        || {{ $lv2->details }}</option>
                        @if ($lv2->children)
                            @foreach ($lv2->children as $lv3)
                                <option value="{{ $lv3->id }}" >---{{ $lv3->code }}
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
        </div>
        <hr>
        <div class="row">
            <div class="col-md">
                <h2 class="text-danger text-decoration-underline">{{ __('Machines') }}</h2>
                <select name="machines_id[]" id="multiple_machines" multiple="multiple" class="w-100">
                    @if (!empty($project->machines_id))
                        @foreach ($machines as $machine)
                            <option class="" value="{{ $machine->id }}" @if (in_array($machine->id, $project->machines_id)) selected @endif>
                                {{ $machine->title }}</option>
                        @endforeach
                    @else
                        @foreach ($machines as $machine)
                            <option class="" value="{{ $machine->id }}">{{ $machine->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md">
                <h2 class="text-danger text-decoration-underline">{{ __('Materials') }}</h2>
                <select name="materials_id[]" id="multiple_codes" multiple="multiple" class="w-100">
                    @if (!empty($project->materials_id))
                        @foreach (App\Models\Material::get() as $material)
                            <option class="" value="{{ $material->id }}" @if (in_array($material->id, $project->materials_id)) selected @endif>
                                {{ $material->name }}</option>
                        @endforeach
                    @else
                        @foreach (App\Models\Material::get() as $material)
                            <option class="" value="{{ $material->id }}">{{ $material->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <hr>
        <div class="row" id="">
            <div class="col-md-8 m-auto">
                <textarea name="about" id="about" cols="30" rows="25"
                    placeholder="About">{{ $project->about }}</textarea>
            </div>
        </div>
        <div class="row" id="">
            <div class="col-md-8 m-auto">
                <textarea name="free_space1" id="editor1" cols="30" rows="25"
                    placeholder="Free Space 1">{{ $project->free_space1 }}</textarea>
            </div>
        </div>
        <div class="row" id="">
            <div class="col-md-8 m-auto">
                <textarea name="free_space2" id="editor2" cols="30" rows="10"
                    placeholder="Free Space 2">{{ $project->free_space2 }}</textarea>
            </div>
        </div>
        <div class="row" id="">
            <div class="col-md-8 m-auto">
                <textarea name="free_space3" id="editor3" cols="30" rows="10"
                    placeholder="Free Space 3">{{ $project->free_space3 }}</textarea>
            </div>
        </div>
        <div class="col m-auto">
            <div class="form-floating m-2">
                <button class="btn btn-success text-capitalize">{{ __('Update') }}</button>
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
            $('#multiple_codes').select2();
        });
    </script>
@endsection
