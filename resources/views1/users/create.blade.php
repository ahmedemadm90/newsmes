@extends('layouts.app')
@section('title')
    SMES || Create User
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @include('layouts.errors')


    <form class="form-floating text-center m-auto text-capitalize w-100 mt-2" action="{{ route('users.store') }}"
        method="POST">
        @csrf
        <div class="row m-auto p-1 m-2">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name">
                    <label for="floatingInputGrid">{{ __('name') }}</label>
                </div>
            </div>
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingInput" placeholder="user password"
                        name="password">
                    <label for="floatingInput">{{ __('password') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-auto p-1">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingInput" placeholder="confirm-password"
                        name="confirm-password">
                    <label for="floatingInput">{{ __('confirm-password') }}</label>
                </div>
            </div>
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="user email" name="email">
                    <label for="floatingInput">{{ __('email') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-auto p-1">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <select class="form-select text-capitalize" name="status">
                        <option value="" class="text-capitalize" disabled selected hidden>{{ __('user account state') }}
                        </option>
                        <option value="active" class="text-capitalize">{{ __('active') }}</option>
                        <option value="disabled" class="text-capitalize">{{ __('disabled') }}</option>
                    </select>
                    <label for="floatingInput">{{ __('State') }}</label>
                </div>
            </div>
            {{-- <div class="col-md m-auto">
                <div class="form-floating">
                    <select class="form-select text-capitalize" name="roles">
                        <option value="" class="text-capitalize" disabled selected hidden>{{ __('user role') }}
                        </option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" class="text-capitalize">{{ $role }}</option>
                        @endforeach
                    </select>
                    <label for="floatingInput">{{ __('User Role') }}</label>
                </div>
                @foreach ($roles as $role)
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="{{ $role }}" checked
                            value="{{ $role }}">
                        <label class="form-check-label" for="{{ $role }}">{{ $role }}</label>
                    </div>
                @endforeach
            </div> --}}
        </div>
        <hr>
        <div class="row">
            <h2 class="text-center">Roles</h2>
            <div class="text-center col-md-2 col-sm-2 col-lg-2">
                @foreach ($roles as $role)
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="{{ $role }}"
                            value="{{ $role }}" name="roles[]">
                        <label class="form-check-label" for="{{ $role }}">{{ $role }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col m-auto">
            <div class="form-floating m-2">
                <button class="btn btn-success text-capitalize">Add</button>
            </div>
        </div>
    </form>
@endsection
