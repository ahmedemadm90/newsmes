@extends('layouts.app')
@section('title')
    {{__('Vendors Management')}}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{__('Vendors Management')}}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('vendors.create') }}"> {{__('Create New Vendor')}}</a>
        </div>
    </div>
</div>
<hr>
@include('layouts.sessions')
<table class="table table-hover text-center">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Address</th>
        <th>Owner</th>
        <th>Owner Mobile</th>
        <th>Action</th>
    </tr>
    @foreach ($vendors as $vendor)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $vendor->name }}</td>
        <td>{{ $vendor->mobile }}</td>
        <td>{{ $vendor->address }}</td>
        <td>{{ $vendor->owner_name }}</td>
        <td>{{ $vendor->owner_mobile }}</td>
        <td>
            <div class="dropdown text-center">
                <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                    @can('Vendor Show')
                    <li><a href="{{ route('vendors.show',$vendor->id) }}" class="dropdown-item"
                            target="_blank">{{__('Show')}}</a>
                    </li>
                    @endcan
                    @can('Vendor Edit')
                    <li><a href="{{ route('vendors.edit',$vendor->id) }}"
                            class="dropdown-item">{{__('Edit')}}</a>
                    </li>
                    @endcan
                    @can('Vendor Delete')
                    <li><a href="{{ route('vendors.destroy',$vendor->id) }}"
                            class="dropdown-item">{{__('Delete')}}</a></li>
                    @endcan
                </ul>
            </div>
        </td>
    </tr>
    @endforeach
</table>
{!! $vendors->render() !!}
@endsection
