@extends('layouts.app')

@section('title')
    {{__('payments.create')}}
@endsection

@section('pageTitle')
    {{__('payments.create')}}
@endsection

@section('content')
    <div class="section-body mt-50">
        <div class="container-fluid">
            <create-payment-form :batches="{{$batches}}"></create-payment-form>
        </div>
    </div>
@endsection
