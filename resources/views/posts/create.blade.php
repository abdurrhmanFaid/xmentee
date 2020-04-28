@extends('layouts.app')

@section('title')
{{__('posts.createIn', ['band' => $band->name])}}
@endsection

@section('pageTitle')
{{__('posts.createIn', ['band' => $band->name])}}
@endsection

@section('breadcrumbs')
    {{Breadcrumbs::render('posts.create', $band)}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <create-post-form :categories="{{$categories}}"></create-post-form>
            </div>
        </div>
    </div>
@endsection
