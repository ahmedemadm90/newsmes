@extends('layouts.app')
@section('title')
    {{__('Project Technologies Available')}}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{__('Technologies Management')}}</h2>
        </div>
        <div class="pull-right">
            @can('Role Create')
            <a class="btn btn-success" href="{{ route('technologies.create') }}"> {{__('Create New Technology')}}</a>
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
    @foreach ($techs as $tech)

    <tr>
        <td>{{ ++$i }}</td>
        <td class="text-capitalize">{{ $tech->en_title }}</td>
        <td class="text-capitalize">{{ $tech->ar_title }}</td>
        <td class="text-center">
            <a class="btn btn-info" href="{{ route('technologies.show',$tech->id) }}"><i class="fas fa-eye"></i></a>
        @can('Technology Edit')
        <a class="btn btn-primary" href="{{ route('technologies.edit',$tech->id) }}"><i class="fas fa-edit"></i></a>
        @endcan
        @can('Technology Delete')
        <a class="btn btn-danger" href="{{route('technologies.destroy',$tech->id)}}">
            <i class="fas fa-trash"></i>
        </a>
        @endcan
        </td>
    </tr>
    @endforeach
</table>
{!! $techs->render() !!}
@endsection
