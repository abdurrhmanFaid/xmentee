@extends('layouts.app')

@section('title')
    {{$band->name . " " . __('tickets.name')}}
@endsection

@section('pageTitle')
    <h3>{{$band->name . " " . __('tickets.name')}}</h3>
@endsection

@section('breadcrumbs')  {{Breadcrumbs::render('tickets.index', $band)}} @endsection
@section('content')
<div class="container">
    <tickets></tickets>
</div>
@endsection
