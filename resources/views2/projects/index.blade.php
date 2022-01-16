@extends('layouts.app')
@section('title')
    {{ __('Projects Management') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Projects Management') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.create') }}"> {{ __('Create New Project') }}</a>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.sessions')
    <table class="table table-hover text-center text-capitalize">
        <tr>
            <th>No</th>
            <th>gallery</th>
            <th>title</th>
            <th>Categories</th>
            <th>machines</th>
            <th>Action</th>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td class="col-md-1">{{ ++$i }}</td>
                <td class="col-md">
                    @if (isset($material->gallery))
                        @foreach ($project->gallery as $img)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: 100px">
                                <img class="d-block img-fluid" src='{{ asset("public/media/violations/egy/images/$img") }}'
                                    style="width: 100%;height:100%">
                            </div>
                        @endforeach
                    @else
                        <img class="d-block img-fluid" src='{{ asset('public/media/no image.jpeg') }}'
                            style="width: 100%;height:100%">
                    @endif
                </td>
                <td class="col-md-4">{{ $project->title }}</td>
                <td class="col-md-4">
                    @if (isset($project->categories_id))
                        @foreach ($project->categories_id as $id)
                            <span class="badge bg-success m-1">{{ $project->categories($id)->en_name }}</span><br>
                        @endforeach
                    @else
                        <span class="badge bg-info m-1">No Category</span><br>
                    @endif
                </td>
                <td class="col-md-4">
                    @if (isset($project->machines_id))
                        @foreach ($project->machines_id as $id)
                            <span class="badge bg-success">{{ $project->machines($id)->title }}</span>
                        @endforeach
                    @else
                        <span class="badge bg-info m-1">No Machines</span><br>
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
                                <li><a href="{{ route('projects.show', $project->id) }}" class="dropdown-item"
                                        target="_blank">{{ __('Show') }}</a>
                                </li>
                            @endcan
                            @can('Machine Edit')
                                <li><a href="{{ route('projects.edit', $project->id) }}"
                                        class="dropdown-item">{{ __('Edit') }}</a>
                                </li>
                            @endcan
                            @can('Machine Delete')
                                <li><a href="{{ route('projects.destroy', $project->id) }}"
                                        class="dropdown-item">{{ __('Delete') }}</a></li>
                            @endcan
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $projects->render() !!}
@endsection
