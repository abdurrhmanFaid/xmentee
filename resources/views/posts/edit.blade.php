@extends('layouts.app')

@section('title')
    {{__('posts.edit', ['post' => $post->title])}}
@endsection

@section('pageTitle')
    {{__('posts.edit', ['post' => $post->title])}}
@endsection

@section('breadcrumbs')
    {{Breadcrumbs::render('posts.edit', $band, $post)}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <edit-post-form :categories="{{$categories}}" :post="{{json_encode($post)}}"></edit-post-form>
            </div>
        </div>
    </div>
@endsection
