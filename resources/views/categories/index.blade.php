@extends('layouts.app')
@section('title')
    All Categories
@endsection
@section('content')
    @include('layouts.sessions')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2 class="text-capitalize mb-1">
                    categories Management || <span class="text-info">Main :
                        {{ App\Models\Category::whereNull('parent_id')->count() }}</span> ||
                    <span class="text-success">Subs :
                        {{ App\Models\Category::whereNotNull('parent_id')->count() }}</span>
                </h2>
            </div>
            @can('Category Create')
                <div class="pull-right m-2">
                    <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Category</a>
                </div>
            @endcan
        </div>
    </div>
    <hr>
    <table class="table table-hover text-capitalize text-center">
        <tr>
            <th>No</th>
            <th>image</th>
            <th>Name</th>
            <th>State</th>
            <th>Parent</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td class="col-md">{{ ++$i }}</td>
                <td class="col-md">
                    @if (isset($category->img))
                        <img src='{{ asset("media/categories/$category->img") }}' alt="" height="80"
                            style="border-radius: 10%">
                    @else
                        <img src='{{ asset('media/no image.jpg') }}' alt="" height="80" style="border-radius: 10%">
                    @endif
                </td>
                <td class="col-md">{{ $category->en_name }} || {{ $category->ar_name }}</td>
                <td class="col-md">
                    @if ($category->active == '1')
                        <span class="badge bg-success">{{ __('Active') }}</span>
                    @else
                        <span class="badge bg-danger">{{ __('Disabled') }}</span>
                    @endif
                </td>
                <td class="col-md">
                    @if (!isset($category->parent_id))
                        <span class="badge bg-primary">{{ __('Main Category') }}</span>
                    @else
                        <span class="badge bg-secondary">{{ $category->parent->en_name }} ||
                            {{ $category->parent->ar_name }}</span>
                </td>
        @endif
        <td class="col-md">
            <div class="dropdown text-center">
                <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                    @can('Category Show')
                        <li><a href="{{ route('categories.show', $category->id) }}" class="dropdown-item"
                                target="_blank">{{ __('Show') }}</a>
                        </li>
                    @endcan
                    @can('Category Edit')
                        <li><a href="{{ route('categories.edit', $category->id) }}"
                                class="dropdown-item">{{ __('Edit') }}</a>
                        </li>
                    @endcan
                    @can('Category Delete')
                        <li><a href="{{ route('categories.destroy', $category->id) }}"
                                class="dropdown-item">{{ __('Delete') }}</a></li>
                    @endcan
                </ul>
            </div>
        </td>
        </tr>
        @endforeach
    </table>
    {!! $categories->links() !!}
@endsection
