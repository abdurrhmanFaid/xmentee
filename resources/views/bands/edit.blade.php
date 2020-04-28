@extends('layouts.app')

@section('title')
{{__('bands.edit', ['band' => $band->name])}}
@endsection

@section('pageTitle')
{{__('bands.settings', ['band' => $band->name])}}
@endsection

@section('breadcrumbs') {{Breadcrumbs::render('bands.settings', $band)}} @endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('bands.update', $band->slug)}}">
                @csrf
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="ct-label c3-title">{{__('bands.name')}}</label>
                            <input type="text" class="form-control @error('name')  is-invalid @enderror" name="name" value="{{old('name') ?: $band->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="ct-label c3-title">{{__('bands.members_count')}}</label>
                            <input type="number" class="form-control @error('members_count')  is-invalid @enderror" name="members_count" value="{{old('members_count') ?: $band->members_count}}">
                            @error('members_count')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="ct-label c3-title">{{__('bands.description')}}</label>
                            <input type="text" class="form-control @error('description')  is-invalid @enderror" name="description" value="{{old('description') ?: $band->description}}">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="ct-label c3-title">{{__('bands.address')}}</label>
                            <input type="text" class="form-control @error('address')  is-invalid @enderror" name="address" value="{{old('address') ?: $band->address}}">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('bands.applying_deadline')}}</label>
                            <input type="datetime-local" class="form-control @error('applying_deadline')  is-invalid @enderror" name="applying_deadline" value="{{$band->applying_deadline->toDateTimeLocalString()}}">
                            @error('applying_deadline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="ct-label c3-title">{{__('bands.is_reception_open')}}</label>
                            <select class="form-control @error('student_reception_open')  is-invalid @enderror" name="student_reception_open">
                                <option value="1" @if($band->student_reception_open) selected @endif>Open</option>
                                <option value="0" @if(! $band->student_reception_open) selected @endif>Close</option>
                            </select>
                            @error('student_reception_open')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="ct-label c3-title">{{__('bands.receiving_batch')}}</label>
                            @if(count($batches = $band->batches))
                                <select class="form-control @error('receiving_batch_id')  is-invalid @enderror" name="receiving_batch_id">
                                    @foreach($band->batches as $batch)
                                        <option value="{{$batch->id}}">{{$batch->name}}</option>
                                    @endforeach
                                </select>
                                @error('receiving_batch_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            @else
                                <div class="alert alert-danger">
                                    {{__('batches.empty')}}
                                    <br>
                                    <strong>
                                        {{__('bands.no_batches_note')}}
                                    </strong>
                                    <a href="{{route('batches.create')}}">Create</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="ct-label c3-title">{{__('bands.default_localization')}}</label>
                                <select class="form-control @error('notifications_locale')  is-invalid @enderror" name="notifications_locale">
                                    <option value="ar" @if($band->notificationsLocale() == 'ar') selected @endif>العربية</option>
                                    <option value="en" @if($band->notificationsLocale() == 'en') selected @endif>English</option>
                                </select>
                                @error('notifications_locale')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">{{__('default.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
