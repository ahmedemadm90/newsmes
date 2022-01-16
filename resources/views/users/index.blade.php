@extends('layouts.app')
@section('title')
    SMES || Users Management
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Users Management') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>
    <hr>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-hover text-center">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <label class="badge bg-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a href="{{ route('users.show', $user->id) }}" class="dropdown-item"
                                    target="_blank">{{ __('Show') }}</a>
                            </li>
                            @can('User Edit')
                                <li><a href="{{ route('users.edit', $user->id) }}"
                                        class="dropdown-item">{{ __('Edit') }}</a>
                                </li>
                            @endcan
                            @can('User Delete')
                                <li><a href="{{ route('users.destroy', $user->id) }}"
                                        class="dropdown-item">{{ __('Delete') }}</a></li>
                            @endcan
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $users->render() !!}
@endsection
