@extends('layouts.app')

@section('title')
    {{__('categories.create_in', ['band' => $band->name])}}
@endsection

@section('content')
    <div class="section-body mt-50">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('categories.create_in', ['band' => $band->name])}}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('categories.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label>{{__('categories.name')}}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('categories.description')}}</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{old('description')}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-plus"></i> {{__('categories.save')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
