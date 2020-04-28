@extends('layouts.app')

@section('title')
    {{$post['title']}}
@endsection

@section('content')
<div class="container-fluid">
    <post-page inline-template :rate="{{json_encode($post->rate)}}" v-cloak>
        <div class="">
            <div class="row">
                <div class="col-md-3">
                    <div class="card client-card">
                        <div class="card-body text-center">
                            <img class="rounded-circle" src="{{$post->owner->formattedImage(144)}}" title="{{$post->owner->name}}">
                            <h5 class="client-name">
                                {{$post->owner->name}}<br>
                                <span class="badge badge-default mb-2">
                                    {{$post->owner->formattedUsername}}
                                </span><br>
                                <span class="badge badge-md badge-soft-primary">
                                    <i class="fa fa-dot-circle text-black-50"></i> {{$post->owner->points}}
                                </span>
                            </h5>
                        </div>
                        <!--end card-body-->
                    </div>
                    @if(!$post->ownedBy(auth()->user()))
                        <div class="card client-card">
                            <div class="card-body text-center">
                                <subscribe subscribed="{{auth()->user()->hasSubscribedTo($post)}}"></subscribe>
                                <rate
                                    @rate-changed="rateChanged"
                                    :current-user-rate="{{$post['rate']['currentUserRate']}}">
                                </rate>
                            </div>
                            <!--end card-body-->
                        </div>
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                {{$post->title}}
                                @can('update', $post)
                                    <span class="float-right">
                                        <a class="btn btn-sm btn-outline-primary" href="{{route('posts.edit', $post->slug)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                            <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </span>
                                @endcan
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <span class="badge badge-light">
                                    <i class="fa fa-clock"></i> {{$post->created_at}}
                                </span>
                                <span class="badge badge-secondary">
                                    <a href="{{route('posts.index', ['categories' => $post->category->id])}}" class="text-white">
                                        <i class="fa fa-list"></i>
                                        {{$post->category->name}}
                                    </a>
                                </span>
                                <span class="badge badge-danger">
                                    <a href="{{route('posts.index', ['types' => $post->type])}}" class="text-white">
                                        <i class="fa fa-tag"></i>
                                        {{__('posts.types.' . $post->type)}}
                                    </a>
                                </span>
                            </div>
                            {!! $post->body !!}
                        </div>
                        <div class="card-footer">
                            <span class="badge badge-primary">
                                <i class="fa fa-comment"></i> @{{commentsCount}} {{__('comments.name')}}
                            </span>
                            <span class="badge badge-warning">
                                <i class="fa fa-star"></i>
                                <span v-html="rateStatus"></span>
                            </span>
                        </div>
                    </div>
                    <comments @refreshed="refreshed"></comments>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">{{__('default.confirmation')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{__('posts.delete_confirmation', ['post' => $post->title])}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('default.cancel')}}</button>
                                <span @click.prevent="destroy">
                                    <submit-button
                                        btn-type="danger"
                                        :loading="loading"
                                        loaded-text="{{__('default.yes')}}"
                                        loading-text="{{__('posts.deleting')}}">
                                    </submit-button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </post-page>
</div>
@endsection
