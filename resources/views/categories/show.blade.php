@extends('layouts.app')

@section('title')
    {{$category->name}}
@endsection

@section('pageTitle')
    {{$category->name}}
@endsection

@section('breadcrumbs')
    {{Breadcrumbs::render('categories.show', $category, $band)}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-border">
                <div class="text-center">
                    <img src="/images/lesson.png" width="300">
                </div>
                <div class="card-body">
                    <h4 class="card-title mt-0 font-weight-bold">{{__('categories.lessons_count', ['count' => $lessonsCount, 'category' => $category->name])}}</h4>
                    @if(count($lessons))
                        <ol class="list-group">
                        @foreach($lessons as $lesson)
                            <li class="list-group-item">
                                <a href="{{route('lessons.show', $lesson->slug)}}">
                                    <i class="fa fa-video"></i> {{$lesson->title}}
                                </a>
                            </li>
                        @endforeach
                        </ol>
                        <br>
                        <a href="{{route('lessons.index', ['category_id' => $category->id])}}" class="btn btn-primary">{{__('categories.browse_lessons')}}</a>
                    @endif
                </div><!--end card -body-->
            </div><!--end card-->
        </div>
        <div class="col-md-6">
            <div class="card card-border">
                <div class="text-center">
                    <img src="/images/post.png" width="300">
                </div>
                <div class="card-body">
                    <h4 class="card-title mt-0 font-weight-bold">{{__('categories.posts_count', ['count' => $postsCount, 'category' => $category->name])}}</h4>
                    @if(count($posts))
                        <ol class="list-group">
                            @foreach($posts as $post)
                                <li class="list-group-item">
                                    <a href="{{route('posts.show', $post->slug)}}">
                                        <i class="fa fa-pen"></i> {{$post->title}}
                                    </a>
                                    <span class="badge badge-danger float-right">
                                        <i class="fa fa-tag"></i> {{__('posts.types.' . $post->type)}}
                                    </span>
                                </li>
                            @endforeach
                        </ol>
                        <br>
                        <a href="{{route('posts.index', ['categories' => $category->id])}}" class="btn btn-primary">{{__('categories.browse_posts')}}</a>
                    @endif
                </div><!--end card -body-->
            </div><!--end card-->
        </div>
    </div>
</div>
@endsection
