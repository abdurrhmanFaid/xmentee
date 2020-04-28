@extends('layouts.app')

@section('title')
{{__('tickets.unrequested', ['band' => $band->name])}}
@endsection

@section('pageTitle')
    {{__('tickets.unrequested', ['band' => $band->name])}}
@endsection

@section('breadcrumbs') {{Breadcrumbs::render('tickets.index.unrequested', $band)}} @endsection
@section('content')
<div class="container mt-50">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('tickets.unrequested.edit')}}" class="btn btn-secondary">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>

                    <h3 class="card-title">{{__('tickets.student')}}</h3>

                    <p>{{__('tickets.student_desc')}}</p>
                    <hr>
                    <div class="row">
                        <div class="col-5 py-1"><strong><i class="fa fa-ticket"></i> {{__('tickets.code')}}</strong></div>
                        <div class="col-7 py-1">{{$studentTicket->code}}</div>
                        <div class="col-5 py-1"><strong><i class="fa fa-lock"></i> {{__('tickets.password')}}</strong></div>
                        <div class="col-7 py-1">{{$studentTicket->password}}</div>
                        <div class="col-5 py-1"><strong><i class="fa fa-ban"></i> {{__('tickets.usage_limit')}}:</strong></div>

                    @if($studentTicket->unlimited())
                            <div class="col-7 py-1"><strong class="text-success">{{__('tickets.unlimited_usage')}}</strong></div>
                        @else
                            <div class="col-7 py-1"><strong>{{__('tickets.usage_remaining', ['count' => $studentTicket->usage_limit])}}</strong></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('tickets.unrequested.edit')}}" class="btn btn-secondary">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                    <h3 class="card-title">{{__('tickets.instructor')}}</h3>

                    <p>{{__('tickets.instructor_desc')}}</p>
                    <hr>
                    <div class="row">
                        <div class="col-5 py-1"><strong><i class="fa fa-ticket"></i> {{__('tickets.code')}}</strong></div>
                        <div class="col-7 py-1">{{$instructorTicket->code}}</div>
                        <div class="col-5 py-1"><strong><i class="fa fa-lock"></i> {{__('tickets.password')}}</strong></div>
                        <div class="col-7 py-1">{{$instructorTicket->password}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
