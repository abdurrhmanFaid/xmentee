@extends('layouts.app')
@section('title')
    {{__('groups.group', ['group' => $group->name])}}
@endsection

@section('content')
    <div class="section-body">
        <div class="container mt-3">
            <div class="card">
                <div class="card-header">
                    <h3>{{__('groups.group', ['group' => $group->name])}}</h3>
                    @if(auth()->user()->isInstructor())
                        @can('update', $band)
                            <div class="card-options">
                                <a href="{{route('groups.edit', $group->id)}}" class="float-right btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                        @endcan
                    @endif
                </div>
            </div>

            <p class="text-muted">
                <span class="tag tag-danger">
                    {{__('default.consist_of', ['count' => $group->members_count])}}
                </span>
                <br>
                <span class="text-muted">
                    {{$group->description}}
                </span>
            </p>

            <div class="row clearfix">
                @forelse($group->members as $member)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center ribbon">
                                <div class="ribbon-box green">
                                    <i class="fa fa-circle"></i>
                                    {{$member->points}}
                                </div>
                                <img class="rounded-circle img-thumbnail w100" src="{{$member->formattedImage}}" title="{{$member->name}}">
                                <h6 class="mt-3 mb-0">
                                    <a href="{{route('profiles.show', $member->username)}}">
                                        {{$member->name}}
                                    </a>
                                </h6>
                                <span class="d-block mb-3">{{$member->formattedUsername}}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body">
                            <p>
                                {{__('groups.empty')}}
                                @can('update', $band)
                                    <a href="{{route('groups.edit', $group->id)}}">
                                        {{__('groups.add_members')}}
                                    </a>
                                @endcan
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
        </d
            {{__('groups.add_members')}}iv>
    </div>
@endsection
