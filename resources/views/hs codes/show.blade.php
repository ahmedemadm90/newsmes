@extends('layouts.app')
@section('title')
    SMES || {{ __('Hs Code') }} || {{ $code->code }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2 class="text-capitalize mb-1">
                    <span class="text-capitalize">{{ __('Hs Code') }} || <span
                            class="text-primary">{{ $code->code }}</span>
                </h2>
            </div>
            <hr>
            @can('HS Codes Create')
                <div class="pull-right mt-2">
                    <a class="btn btn-success" href="{{ route('hscodes.index') }}"> {{ __('Back') }}</a>
                </div>
            @endcan
        </div>
    </div>
    @include('layouts.sessions')
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <td>No#</td>
                <td>{{ __('Code') }}</td>
                <td>{{ __('Details') }}</td>
                <td>{{ __('Categories') }}</td>
                <td>{{ __('Materials') }}</td>
                <td>{{ __('Machines') }}</td>
                <td>{{ __('Projects') }}</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $code->id }}</td>
                <td>{{ $code->code }}</td>
                <td>{{ $code->details }}</td>
                <td>
                    @if (!empty($categories))
                        @foreach ($categories as $category)
                            <span class="badge bg-success">{{ $category->en_name }} ||{{ $category->ar_name }}</span>
                        @endforeach
                    @else
                        <span class="badge bg-success">No Categories Yet</span>
                    @endif
                </td>
                <td>
                    @if (!empty($materials))
                        @foreach ($materials as $material)
                            <span class="badge bg-success">{{ $material->name }}</span>
                        @endforeach
                    @else
                        <span class="badge bg-success">No Materials</span>
                    @endif

                </td>
                <td>
                    @if (!empty($machines))
                        @foreach ($machines as $machine)
                            <span class="badge bg-success">{{ $machine->title }}</span>
                        @endforeach
                    @else
                        <span class="badge bg-success">No Machines</span>
                    @endif
                </td>
                <td>
                    @if (!empty($projects))
                        @foreach ($projects as $project)
                            <span class="badge bg-success">{{ $project->title }}</span>
                        @endforeach
                    @else
                        <span class="badge bg-success">No Projects</span>
                    @endif

                </td>
                {{-- <td>{{$materials}}</td>
                <td>{{$machines}}</td>
                <td>{{$projects}}</td> --}}
            </tr>
        </tbody>
    </table>
@endsection
