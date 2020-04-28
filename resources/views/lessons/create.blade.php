@extends('layouts.app')

@section('title')
{{__('lessons.create', ['band' => $band->name])}}
@endsection

@section('pageTitle')
    {{__('lessons.create', ['band' => $band->name])}}
@endsection

@section('breadcrumbs')
    {{Breadcrumbs::render('lessons.create', $band)}}
@endsection

@section('content')
<div class="section-body mt-50">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{route('lessons.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label>{{__('lessons.title')}}</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}" required>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('lessons.description')}}</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{old('description')}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('lessons.video_path')}}</label>
                                    <input type="text" class="form-control @error('video_path') is-invalid @enderror" name="video_path" value="{{old('video_path')}}" required>
                                    @error('video_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('lessons.category')}}</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($band->categories as $category)
                                            <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('lessons.batch')}}</label>
                                    <select class="form-control" name="batch_id">
                                        @foreach($band->batches as $batch)
                                            <option value="{{$batch->id}}" @if($batch->id == old('batch_id')) selected @endif>{{$batch->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('lessons.instructors')}}</label>
                                    <br>
                                    @foreach($band->owners as $instructor)
                                        <input id="instructor-{{$instructor->id}}" type="checkbox" name="instructors[]" value="{{$instructor->id}}" @if(old('instructors') == $instructor->id) checked @endif>
                                        <label for="instructor-{{$instructor->id}}">
                                            <img src="{{$instructor->formattedImage()}}"> {{$instructor->name}}
                                        </label><br>
                                    @endforeach
                                    @error('instructors[]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">{{__('lessons.publish')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
