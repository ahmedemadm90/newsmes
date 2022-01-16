@extends('layouts.app')
@section('title')
    {{ __('Materials Management') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Materials Management') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('materials.create') }}"> {{ __('Create New Material') }}</a>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.sessions')
    <table class="table table-hover text-center">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Machines</th>
            <th>Action</th>
        </tr>
        @foreach ($materials as $material)
            <tr>
                <td class="col-md-1">{{ ++$i }}</td>
                <td class="col-md-4">{{ $material->name }}</td>
                <td class="col-md-4">
                    @if (!empty($material->machines_id))
                        @foreach ($material->machines_id as $id)
                            <span class="badge bg-success">{{ $material->machines($id)->title }}</span>
                        @endforeach
                    @else
                        <span class="badge bg-info">No Machines</span>
                    @endif
                </td>
                <td class="col-md-3">
                    <div class="dropdown text-center">
                        <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                            @can('Material Show')
                                <li><a href="{{ route('materials.show', $material->id) }}" class="dropdown-item"
                                        target="_blank">{{ __('Show') }}</a>
                                </li>
                            @endcan
                            @can('Material Edit')
                                <li><a href="{{ route('materials.edit', $material->id) }}"
                                        class="dropdown-item">{{ __('Edit') }}</a>
                                </li>
                            @endcan
                            @can('Material Delete')
                                <li><a href="{{ route('materials.destroy', $material->id) }}"
                                        class="dropdown-item">{{ __('Delete') }}</a></li>
                            @endcan
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $materials->render() !!}
@endsection
