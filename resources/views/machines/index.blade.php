@extends('layouts.app')
@section('title')
    {{ __('Machines Management') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Machines Management') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('machines.create') }}"> {{ __('Create New Machine') }}</a>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.sessions')
    <table class="table table-hover text-center">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Categories</th>
            <th>Action</th>
        </tr>
        @foreach ($machines as $machine)
            <tr>
                <td class="col-md-1">{{ ++$i }}</td>
                <td class="col-md-4">{{ $machine->title }}</td>
                <td class="col-md-4">
                    @if (isset($machine->category_id))
                        {{ $machine->category->en_name }}
                    @else
                        <span class="badge bg-info">No Category</span>
                    @endif
                </td>
                <td class="col-md-3">
                    <div class="dropdown text-center">
                        <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                            @can('Machine Show')
                                <li><a href="{{ route('machines.show', $machine->id) }}" class="dropdown-item"
                                        target="_blank">{{ __('Show') }}</a>
                                </li>
                            @endcan
                            @can('Machine Edit')
                                <li><a href="{{ route('machines.edit', $machine->id) }}"
                                        class="dropdown-item">{{ __('Edit') }}</a>
                                </li>
                            @endcan
                            @can('Machine Delete')
                                <li><a href="{{ route('machines.destroy', $machine->id) }}"
                                        class="dropdown-item">{{ __('Delete') }}</a></li>
                            @endcan
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $machines->render() !!}
@endsection
