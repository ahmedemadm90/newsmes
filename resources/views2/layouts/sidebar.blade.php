<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="{{asset('assets/images/111.png')}}" alt="" srcset="">
        </div>
        <div class="sidebar-menu text-capitalize">
            <ul class="menu">
                <li class='sidebar-title'>{{__('Main Menu')}}</li>
                <li class="sidebar-item">
                    <a class='sidebar-link text-decoration-none' href="{{route('home')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>{{__('Dashboard')}}</span>
                    </a>
                </li>
                @can('Roles')
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link text-decoration-none'>
                        <i class="fas fa-user-tag"></i>
                        <span>{{__('Roles')}}</span>
                    </a>
                    <ul class="submenu ">
                        @can('Role Create')
                        <li>
                            <a href="{{route('roles.create')}}" class="text-decoration-none">{{__('New Role')}}</a>
                        </li>
                        @endcan
                        @can('Roles List')
                        <li>
                            <a href="{{route('roles.index')}}" class="text-decoration-none">{{__('All Roles')}}</a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcan
                @can('Users')
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link text-decoration-none'>
                        <i class="fas fa-users"></i>
                        <span>{{__('Users')}}</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="{{route('users.create')}}" class="text-decoration-none">{{__('New User')}}</a>
                        </li>
                        <li>
                            <a href="{{route('users.index')}}" class="text-decoration-none">{{__('All Users')}}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('HS Codes')
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link text-decoration-none'>
                        <i class="fas fa-users"></i>
                        <span>{{__('HS Codes')}}</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="{{route('hscodes.create')}}" class="text-decoration-none">{{__('New HS Code')}}</a>
                        </li>
                        <li>
                            <a href="{{route('hscodes.index')}}" class="text-decoration-none">{{__('All HS Codes')}}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('Categories')
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link text-decoration-none'>
                        <i class="fas fa-users"></i>
                        <span>{{__('Categories')}}</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="{{route('categories.create')}}" class="text-decoration-none">{{__('New Category')}}</a>
                        </li>
                        <li>
                            <a href="{{route('categories.index')}}" class="text-decoration-none">{{__('All Categories')}}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('Vendors')
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link text-decoration-none text-capitalize'>
                        <i class="fas fa-store"></i>
                        <span>{{__('vendors')}}</span>
                    </a>
                    <ul class="submenu ">
                        @can('Vendor Create')
                        <li>
                            <a href="{{route('vendors.create')}}" class="text-decoration-none tet-capitalize">{{__('New vendor')}}</a>
                        </li>
                        @endcan
                        @can('Vendors List')
                        <li>
                            <a href="{{route('vendors.index')}}" class="text-decoration-none">{{__('All vendors')}}</a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcan
                @can('Machines')
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link text-decoration-none'>
                        <i class="fas fa-industry"></i>
                        <span>{{__('Machines')}}</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="{{route('machines.create')}}" class="text-decoration-none">{{__('New machine')}}</a>
                        </li>
                        <li>
                            <a href="{{route('machines.index')}}" class="text-decoration-none">{{__('All machines')}}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('Materials')
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link text-decoration-none'>
                        <i class="fas fa-object-ungroup"></i>
                        <span>{{__('Materials')}}</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="{{route('materials.create')}}" class="text-decoration-none">{{__('New Material')}}</a>
                        </li>
                        <li>
                            <a href="{{route('materials.index')}}" class="text-decoration-none">{{__('All Materials')}}</a>
                        </li>
                    </ul>
                </li>
                @endcan

                @can('Technologies')
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link text-decoration-none'>
                        <i class="fas fa-users"></i>
                        <span>{{__('Technologies')}}</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="{{route('technologies.create')}}" class="text-decoration-none">{{__('New technology')}}</a>
                        </li>
                        <li>
                            <a href="{{route('technologies.index')}}" class="text-decoration-none">{{__('All technologies')}}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('Ideas')
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link text-decoration-none'>
                        <i class="fas fa-disease"></i>
                        <span>{{__('Ideas')}}</span>
                    </a>
                    <ul class="submenu ">
                        @can('Idea Create')
                        <li>
                            <a href="{{route('ideas.create')}}" class="text-decoration-none">{{__('New Idea')}}</a>
                        </li>
                        @endcan
                        @can('Ideas List')
                        <li>
                            <a href="{{route('ideas.index')}}" class="text-decoration-none">{{__('All Ideas')}}</a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('Investfields')
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link text-decoration-none'>
                        <i class="fas fa-disease"></i>
                        <span>{{__('Investfields')}}</span>
                    </a>
                    <ul class="submenu ">
                        @can('Investfields Create')
                        <li>
                            <a href="{{route('investfields.create')}}" class="text-decoration-none">{{__('New Investfield')}}</a>
                        </li>
                        @endcan
                        @can('Investfields List')
                        <li>
                            <a href="{{route('investfields.index')}}" class="text-decoration-none">{{__('All Investfields')}}</a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('Projects')
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link text-decoration-none'>
                        <i class="fas fa-industry"></i>
                        <span>{{__('Projects')}}</span>
                    </a>
                    <ul class="submenu ">
                        @can('Projects Create')
                        <li>
                            <a href="{{route('projects.create')}}" class="text-decoration-none">{{__('New Project')}}</a>
                        </li>
                        @endcan
                        @can('Projects List')
                        <li>
                            <a href="{{route('projects.index')}}" class="text-decoration-none">{{__('All Projects')}}</a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

            </ul>
        </div>
    </div>
</div>
