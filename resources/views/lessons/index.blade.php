@extends('layouts.app')

@section('title')
    {{$band->name}} {{__('lessons.name')}}
@endsection

@section('pageTitle')
    {{$band->name}} {{__('lessons.name')}}
@endsection

@section('breadcrumbs') {{Breadcrumbs::render('lessons.index', $band)}} @endsection

@section('content')
    <div class="container">
        <lessons></lessons>
    </div>
@endsection
