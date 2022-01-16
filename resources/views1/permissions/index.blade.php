@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{__('Technologies Management')}}</h2>
        </div>
        <div class="pull-right">
            @can('Role Create')
            <a class="btn btn-success" href="{{ route('permissions.create') }}"> {{__('Create New permission')}}</a>
            @endcan
        </div>
    </div>
</div>
@include('layouts.sessions')
<table class="table table-hover m-auto text-center">
    <tr>
        <th>No</th>
        <th>En Name</th>
        <th class="text-center">Action</th>
    </tr>
    @foreach ($permis as $p)

    <tr>
        <td>{{$p->id }}</td>
        <td class="text-capitalize">{{ $p->name }}</td>
        <td class="text-center">
            <a class="btn btn-info" href="{{ route('technologies.show',$p->id) }}"><i class="fas fa-eye"></i></a>
        @can('Permission Edit')
        <a class="btn btn-primary" href="{{ route('technologies.edit',$p->id) }}"><i class="fas fa-edit"></i></a>
        @endcan
        @can('Permission Delete')
        <a class="btn btn-danger" href="{{route('technologies.destroy',$p->id)}}">
            <i class="fas fa-trash"></i>
        </a>
        @endcan
        </td>
    </tr>
    @endforeach
</table>
@endsection
