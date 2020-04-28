@extends('layouts.app')

@section('title')
    {{__('categories.categories', ['band' => $band->name])}}
@endsection

@section('pageTitle')
    {{__('categories.categories', ['band' => $band->name])}}
@endsection

@section('breadcrumbs')
    {{Breadcrumbs::render('categories.index', $band)}}
@endsection

@section('content')

    @php
        $instructor = auth()->user()->ownsAnyBand();
    @endphp

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($instructor)
                    <div class="card-title">
                        <div class="btn btn-success">
                            <a class="btn btn-success btn-sm" href="{{route('categories.create')}}">
                                <i class="fa fa-plus"></i>
                                {{__('categories.create')}}
                            </a>
                        </div>
                    </div>
                @endif
                <div class="card-body">
                    @forelse($bandCategories as $key => $category)
                        @if($instructor)
                            <div class="d-flex justify-content-end">
                                <a href="{{route('categories.edit', $category->slug)}}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                        @endif
                        <h3 class="card-title">
                            <a href="{{route('categories.show', $category->slug)}}">
                                {{$category->name}}
                            </a>
                        </h3>

                        <p style="max-width: 50%">{{$category->description}}</p>

                        <p>
                            <a class="btn btn-sm btn-primary" href="{{route('posts.index', $category->slug)}}">
                                <i class="ti ti-book"></i> ({{$category->posts_count}}) {{\Str::plural(__('posts.name') , $category->posts_count)}}
                            </a>

                            <a class="btn btn-sm btn-dark" href="{{route('lessons.index')}}">
                                <i class="ti ti-video-clapper"></i> ({{$category->lessons_count}}) {{\Str::plural(__('lessons.name'), $category->lessons_count)}}
                            </a>
                        </p>
                    @empty
                        <div class="alert alert-info">
                            {{__('categories.empty')}}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
