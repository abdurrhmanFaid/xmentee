@extends('layouts.app')

@section('title')
    {{__('batches.batches', ['band' => $band->name])}}
@endsection

@section('pageTitle')
    {{__('batches.batches', ['band' => $band->name])}}
@endsection

@section('breadcrumbs') {{Breadcrumbs::render('batches.index', $band)}} @endsection

@section('content')
<div class="section-body mt-3">
    <div class="container">
        <div class="card">
            <div class="card-title">
                <a href="{{route('batches.create')}}" class="float-right btn btn-success">
                    <i class="fa fa-plus"></i> {{__('batches.create', ['band' => $band->name])}}
                </a>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        @forelse($batches as $batch)
                            <div class="col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>
                                            <a href="{{route('batches.show', $batch->slug)}}">
                                                <strong>{{$batch->name}}</strong>
                                            </a>
                                            <a href="{{route('batches.edit', $batch->slug)}}" class="float-right badge badge-info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </h3>
                                        <span class="badge badge-secondary mb-3">{{__('default.created_since')}} {{$batch->created_at->diffForHumans()}}</span>
                                        <div class="row">
                                            <div class="col-5 py-1"><strong>{{__('batches.members_count')}}</strong></div>
                                            <div class="col-7 py-1"><strong>{{$batch->students_count}}</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card">
                                <div class="card-body">
                                    You didn't create any batch till now ! Create one from <a href="{{route('batches.create')}}">here</a>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
