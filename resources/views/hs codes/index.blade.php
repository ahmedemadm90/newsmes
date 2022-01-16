@extends('layouts.app')
@section('title')
    SMES || {{__('All HS Codes')}}
@endsection
@section('content')
    @include('layouts.sessions')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2 class="text-capitalize mb-1">
                    HS Codes Management || <span class="text-info">Main :
                        {{ App\Models\HsCode::whereNull('parent_id')->count() }}</span> ||
                    <span class="text-success">Subs :
                        {{ App\Models\HsCode::whereNotNull('parent_id')->count() }}</span>
                </h2>
            </div>
            @can('Category Create')
                <div class="pull-right m-2">
                    <a class="btn btn-success" href="{{ route('hscodes.create') }}"> {{__('Create New Code')}}</a>
                </div>
            @endcan
        </div>
    </div>
    <hr>
    <table class="table table-hover text-capitalize text-center">
        <tr>
            <th>No#</th>
            <th>Code</th>
            <th>Details</th>
            <th>Parent</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach ($codes as $code)
            <tr>
                <td class="col-md">{{ ++$i }}</td>
                <td class="col-md">{{ $code->code }}</td>
                <td class="col-md">{{ $code->details }}</td>
                <td class="col-md">
                    @if (!isset($code->parent_id))
                        <span class="badge bg-primary">{{ __('Main HS Code') }}</span>
                    @else
                        <span class="badge bg-secondary">{{ $code->parent->code }} ||
                            {{ $code->parent->details }}</span>
                </td>
        @endif
        <td class="col-md">
            <div class="dropdown text-center">
                <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                    @can('HS Codes Show')
                        <li><a href="{{ route('hscodes.show', $code->id) }}" class="dropdown-item"
                                target="_blank">{{ __('Show') }}</a>
                        </li>
                    @endcan
                    @can('HS Codes Edit')
                        <li><a href="{{ route('hscodes.edit', $code->id) }}"
                                class="dropdown-item">{{ __('Edit') }}</a>
                        </li>
                    @endcan
                    @can('HS Codes Delete')
                        <li><a href="{{ route('hscodes.destroy', $code->id) }}"
                                class="dropdown-item">{{ __('Delete') }}</a></li>
                    @endcan
                </ul>
            </div>
        </td>
        </tr>
        @endforeach
    </table>
    {!! $codes->links() !!}
@endsection
