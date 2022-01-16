@extends('layouts.app')
@section('title')
    SMES || Edit User
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


    <form class="form-floating text-center m-auto text-capitalize w-100 mt-2"
        action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        <div class="row m-auto p-1 m-2">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name"
                        value="{{ $user->name }}">
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
                    <input type="email" class="form-control" id="floatingInput" placeholder="user email" name="email"
                        value="{{ $user->email }}">
                    <label for="floatingInput">{{ __('email') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-auto p-1">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <select class="form-select text-capitalize" name="active">
                        <option value="{{ $user->active }}" class="text-capitalize" selected hidden>
                            @if ($user->active == '1')
                                {{ __('active') }}
                            @else
                                {{ __('deactivated') }}
                            @endif
                        </option>
                        <option value="1" class="text-capitalize">{{ __('active') }}</option>
                        <option value="0" class="text-capitalize">{{ __('deactivated') }}</option>
                    </select>
                    <label for="floatingInput">{{ __('State') }}</label>
                </div>
            </div>
            {{-- <div class="col-md m-auto">
            <div class="form-floating">
                <select class="form-select text-capitalize" name="role">
                    <option value="" class="text-capitalize" disabled selected hidden>{{__('user role')}}
                    </option>
                    @foreach ($roles as $role)
                    <option value="{{$role}}" class="text-capitalize" @if (in_array($role, $userRole)) selected @endif>
                        {{$role}}</option>
                    @endforeach
                </select>
                <label for="floatingInput">{{__('User Role')}}</label>
            </div>
        </div> --}}
        </div>
        <hr>
        <div class="row">
            <h2 class="text-center">Roles</h2>
            @foreach ($roles as $role)
                <div class="text-center col-md-2 col-sm-2 col-lg-2 m-auto">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="{{ $role }}"
                            value="{{ $role }}" @if (in_array($role, $userRole)) checked @endif name="roles[]">
                        <label class="form-check-label" for="{{ $role }}">{{ $role }}</label>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col m-auto">
            <div class="form-floating m-2">
                <button class="btn btn-success text-capitalize">Add</button>
            </div>
        </div>
    </form>
@endsection
