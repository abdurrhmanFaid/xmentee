@extends('layouts.app')

@section('title')
    {{__('lessons.edit', ['band' => $band->name])}}
@endsection

@section('pageTitle')
    {{ __('lessons.edit', ['lesson' => $lesson->title]) }}
@endsection

@section('breadcrumbs')
    {{Breadcrumbs::render('lessons.edit', $lesson, $band)}}
@endsection

@section('content')
    <div class="section-body mt-50">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{route('lessons.update', $lesson->slug)}}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>{{__('lessons.title')}}</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title') ?: $lesson->title}}" required>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('lessons.description')}}</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{old('description') ?: $lesson->description}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('lessons.video_path')}}</label>
                                    <input type="text" class="form-control @error('video_path') is-invalid @enderror" name="video_path" value="{{old('video_path') ?: $lesson->video_path}}" required>
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
                                            <option value="{{$category->id}}" @if($category->id == old('category_id') || $category->id == $lesson->category_id) selected @endif>
                                                {{$category->name}}
                                            </option>
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
                                            <option value="{{$batch->id}}" @if($batch->id == old('batch_id') || $lesson->batch_id == $batch->id) selected @endif>{{$batch->name}}</option>
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
                                        <input id="instructor-{{$instructor->id}}" type="checkbox" name="instructors[]" value="{{$instructor->id}}" @if(old('instructors') == $instructor->id || $lesson->instructors->contains($instructor)) checked @endif>
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
                                    <button class="btn btn-primary" type="submit">{{__('default.update')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
