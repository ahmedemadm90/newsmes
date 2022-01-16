<div class="row mb-2">
    @can('Users')
    <div class="col-12 col-md-3">
        <div class="card card-statistic">
            <div class="card-body">
                <h1 class="card-title">Application Users</h1>
                <h4 class="card-text text-grey">{{App\Models\User::count()}}</h4>
                <hr>
                <a href="{{route('users.index')}}" class="nav-link text-grey">View All</a>
            </div>
        </div>
    </div>
    @endcan
    @can('Vendors')
    <div class="col-12 col-md-3">
        <div class="card card-statistic">
            <div class="card-body">
                <h1 class="card-title">Vendors</h1>
                <h4 class="card-text text-grey">{{App\Models\Vendor::count()}}</h4>
                <hr>
                <a href="{{route('vendors.index')}}" class="nav-link text-grey">View All</a>
            </div>
        </div>
    </div>
    @endcan
    @can('Machines')
    <div class="col-12 col-md-3">
        <div class="card card-statistic">
            <div class="card-body">
                <h1 class="card-title">Machines</h1>
                <h4 class="card-text text-grey">{{App\Models\Machine::count()}}</h4>
                <hr>
                <a href="{{route('machines.index')}}" class="nav-link text-grey">View All</a>
            </div>
        </div>
    </div>
    @endcan

</div>
