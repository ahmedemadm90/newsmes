@extends('layouts.app')
@section('title')
    {{__('Project Ideas Available')}}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{__('Ideas Management')}}</h2>
        </div>
        <div class="pull-right">
            @can('Role Create')
            <a class="btn btn-success" href="{{ route('ideas.create') }}"> {{__('Create New Idea')}}</a>
            @endcan
        </div>
    </div>
</div>
<hr>
@include('layouts.sessions')
<table class="table table-hover m-auto text-center">
    <tr>
        <th>No</th>
        <th>En Name</th>
        <th>Ar Name</th>
        <th class="text-center">Action</th>
    </tr>
    @foreach ($ideas as $idea)

    <tr>
        <td>{{ ++$i }}</td>
        <td class="text-capitalize">{{ $idea->en_title }}</td>
        <td class="text-capitalize">{{ $idea->ar_title }}</td>
        <td class="text-center">
            <a class="btn btn-info" href="{{ route('ideas.show',$idea->id) }}"><i class="fas fa-eye"></i></a>
        @can('Technology Edit')
        <a class="btn btn-primary" href="{{ route('ideas.edit',$idea->id) }}"><i class="fas fa-edit"></i></a>
        @endcan
        @can('Technology Delete')
        <a class="btn btn-danger" href="{{route('ideas.destroy',$idea->id)}}">
            <i class="fas fa-trash"></i>
        </a>
        @endcan
        </td>
    </tr>
    @endforeach
</table>
{!! $ideas->render() !!}
@endsection
