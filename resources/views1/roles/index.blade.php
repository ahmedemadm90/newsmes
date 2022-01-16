@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
            @can('Role Create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

{{-- <table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @can('Role Edit')
            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('Role Delete')
            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table> --}}
<table class="table table-hover m-auto text-center">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th class="text-center">Action</th>
    </tr>
    @foreach ($roles as $key => $role)

    <tr>
        <td>{{ ++$i }}</td>
        <td class="text-capitalize">{{ $role->name }}</td>
        {{-- <td>
            <div class="dropdown">
                <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{ route('roles.destroy',$role->id) }}">Remove</a></li>
                    <li><a class="dropdown-item" href="{{ route('roles.edit',$role->id) }}">Edit</a></li>
                    <li><a class="dropdown-item" href="{{ route('roles.show',$role->id) }}">Show</a></li>
                </ul>
            </div>
        </td> --}}
        <td class="text-center">
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"><i class="fas fa-eye"></i></a>
        @can('Role Edit')
        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="fas fa-edit"></i></a>
        @endcan
        @can('Role Delete')
        <a class="btn btn-danger" href="{{route('roles.destroy',$role->id)}}">
            <i class="fas fa-trash"></i>
        </a>
        @endcan
        </td>
    </tr>
    @endforeach
</table>
{!! $roles->render() !!}
@endsection
