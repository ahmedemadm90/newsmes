@extends('layouts.app')

@section('content')
<div class="row mb-2">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="col m-auto">
            <div class="form-floating">
                <input type="name" class="form-control" id="floatingInput" placeholder="role name" name="name">
                <label for="floatingInput">{{__('Name')}}</label>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mt-3">
            <h3 class="text-center mb-2 text-capitalize">{{__('Permissions')}}</h3>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-center">
                    <br>
                    @foreach($permission as $value)
                    <div class="form-check form-check-inline form-switch col-md-3 text-capitalize">
                        <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $value->name }}">
                        <label class="form-check-label">{{ $value->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <hr class="w-100 p-1">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}
@endsection
