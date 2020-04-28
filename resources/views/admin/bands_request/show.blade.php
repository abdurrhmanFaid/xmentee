@extends('layouts.app')

@section('title')
    {{$requestedBand->band_name}}
@endsection

@section('content')
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-inline">
                            <h3 class="card-title">
                                {{$requestedBand->band_name}}
                            </h3>
                            <form class="form-inline float-right" method="POST" action="{{route('admin.bands-request.approve', $requestedBand->id)}}">
                                @csrf
                                <button class="btn btn-success">
                                    <i class="fa fa-thumbs-up"></i> Approve
                                </button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="timeline_item">
                                <span><small class="float-right text-right">{{$requestedBand->created_at}}</small></span>
                                <h6 class="font600">{{$requestedBand->band_name}}</h6>
                                <div class="msg">
                                    <p>{{$requestedBand->band_description}}</p>
                                    <span class="mr-20 text-muted">
                                        <i class="fa fa-envelope"></i> {{$requestedBand->owner_email}}
                                    </span>
                                    <span class="mr-20 text-muted">
                                        ({{$requestedBand->members_count}}) {{'Member', \Str::plural($requestedBand->members_count)}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
