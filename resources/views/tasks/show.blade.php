@extends('layouts.app')

@section('title')
    {{$task->title}}
@endsection

@section('content')
    <div class="section-body">
        <div class="container mt-4">
            <div class="row">
                <h3>Task</h3>
                <hr>
                <div class="card">
                    <div class="card-body">
                        @if(! $task->open())
                            <div>
                                <i class="fa fa-close"></i>
                            </div>
                        @endif
                        <h4>{{$task->title}}</h4>
                        <p>{{$task->body}}</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-red">
                            <span class="text-muted">
                                {{$task->creator->name}}
                            </span>
                            <span class="text-muted">
                                {{$task->created_at->diffForHumans()}}
                            </span>
                            Published {{$task->start_date->diffForHumans()}} <br>
                            Deadline {{$task->end_date ? $task->end_date->diffForHumans() : 'Open'}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="container">
            <h4>Given to users</h4>
            <div class="row clearfix">
                @forelse($task->users as $student)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center ribbon">
                                <div class="ribbon-box green"></div>
                                <img class="rounded-circle img-thumbnail w100" src="{{$student->formattedImage}}" alt="{{$student->name}}">
                                <h6 class="mt-3 mb-0">
                                    <a href="{{route('profiles.show', $student->username)}}">{{$student->name}}</a>
                                </h6>
                                <span>{{$student->username}}</span>
                                <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                    <li><a class="p-3" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="p-3" target="_blank" href="#"><i class="fa fa-slack"></i></a></li>
                                    <li><a class="p-3" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                                <button class="btn btn-default btn-sm">View Profile</button>
                                <button class="btn btn-default btn-sm">Message</button>
                                <div class="row text-center mt-4">
                                    <div class="col-6 border-right">
                                        <label class="mb-0">Project</label>
                                        <h4 class="font-18">07</h4>
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0">Deal</label>
                                        <h4 class="font-18">$2,510</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
            <hr>
            <h4>Given to groups</h4>
            <div class="row clearfix">
                @forelse($task->groups as $group)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center ribbon">
                                <div class="ribbon-box green">New</div>
                                <h6 class="mt-3 mb-0">
                                    <a href="{{route('groups.show', $group->id)}}">{{$group->name}}</a>
                                </h6>
                                <span>{{$group->members_count}} Member</span>
                                <div class="row text-center mt-4">
                                    <div class="col-6 border-right">
                                        <label class="mb-0">Project</label>
                                        <h4 class="font-18">07</h4>
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0">Deal</label>
                                        <h4 class="font-18">$2,510</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
@endsection
