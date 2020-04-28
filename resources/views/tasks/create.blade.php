@extends('layouts.app')

@section('title')
{{__('tasks.create')}}
@endsection

@section('content')
    <div class="section-body mt-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('tasks.create')}}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('tasks.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label>{{__('tasks.title')}}</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}" required>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('tasks.body')}}</label>
                                    <textarea class="form-control @error('body') is-invalid @enderror" name="body">{{old('body')}}</textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('tasks.notice')}}</label>
                                    <input type="text" class="form-control @error('notice') is-invalid @enderror" name="notice" value="{{old('notice')}}" required>
                                    @error('notice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('tasks.start_date')}}</label>
                                    <input type="datetime-local" class="form-control" name="start_date" value="{{old('start_date')}}">
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('tasks.end_date')}}</label>
                                    <input type="datetime-local" class="form-control" name="end_date">
                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">{{__('tasks.create')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
