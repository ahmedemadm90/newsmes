@extends('layouts.site')
@section('title')
    {{ __('Search Result') }}
@endsection
@section('results')
    <div class="row">
        @foreach ($result as $project)
            <div class="card col-md-3">
                @if (!empty($project->gallery))
                <img class="card-img-top" src="{{asset('media/projects/images/'.$project->gallery)}}" alt="Card image cap">
                @else
                <img class="card-img-top" src="{{asset('media/no image.jpg')}}" alt="Card image cap">
                @endif
                <div class="card-body text-left">
                    <h5 class="card-title">{{$project->title}}</h5>
                    <p class="card-text">User : {{App\Models\Project::StaticUser($project->user_id)->name}}</p>
                    <p class="card-text">Employees Required : {{$project->emps}}</p>
                    <p class="card-text">Start Up Investment : {{$project->startup_cost}}</p>
                    <a href="{{route('front.project',$project->id)}}" class="btn btn-primary">{{__('View More')}}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
