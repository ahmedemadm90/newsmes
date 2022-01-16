@extends('layouts.app')
@section('title')
    {{ __('Project Invest Fields Available') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Invest Fields Management') }}</h2>
            </div>
            <div class="pull-right">
                @can('Role Create')
                    <a class="btn btn-success" href="{{ route('investfields.create') }}">
                        {{ __('Create New Invest Fields') }}</a>
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
        @foreach ($investfields as $if)

            <tr>
                <td>{{ ++$i }}</td>
                <td class="text-capitalize">{{ $if->en_title }}</td>
                <td class="text-capitalize">{{ $if->ar_title }}</td>
                <td class="text-center">
                    <a class="btn btn-info" href="{{ route('investfields.show', $if->id) }}"><i
                            class="fas fa-eye"></i></a>
                    @can('Investfields Edit')
                        <a class="btn btn-primary" href="{{ route('investfields.edit', $if->id) }}"><i
                                class="fas fa-edit"></i></a>
                    @endcan
                    @can('Investfields Delete')
                        <a class="btn btn-danger" href="{{ route('investfields.destroy', $if->id) }}"><i
                                class="fas fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    {!! $investfields->render() !!}
@endsection
