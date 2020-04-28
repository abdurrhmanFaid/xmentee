@extends('layouts.app')

@section('title')
{{__("tickets.unrequested")}}
@endsection

@section('pageTitle')
    {{__("tickets.unrequested")}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    {{__('tickets.student')}}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('tickets.unrequested.update')}}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="type" value="student">
                        <div class="form-group">
                            <label>{{__('tickets.code')}}</label>
                            <input type="text" class="form-control" name="code" value="{{$studentTicket->code }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('tickets.password')}}</label>
                            <input type="text" class="form-control" name="password" value="{{ $studentTicket->password }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('tickets.unlimited_usage')}}?</label>
                            <select class="form-control @error('unlimited_usage')  is-invalid @enderror" name="unlimited_usage">
                                <option value="0" @if(! $studentTicket->unlimited_usage) selected @endif>{{__('default.off')}}</option>
                                <option value="1" @if($studentTicket->unlimited_usage) selected @endif>{{__('default.on')}}</option>
                            </select>
                            @error('unlimited_usage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{__('tickets.usage_limit')}} <small>(This will work if unlimited usage is set to false)</small></label>
                            <input type="number" class="form-control @error('usage_limit')  is-invalid @enderror" name="usage_limit" value="{{old('usage_limitation') ?: $studentTicket->usage_limit}}">
                            @error('usage_limit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" type="submit">{{__('default.update')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    {{__('tickets.instructor')}}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('tickets.unrequested.update')}}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="type" value="instructor">
                        <div class="form-group">
                            <label>{{__('tickets.code')}}</label>
                            <input type="text" class="form-control" name="code" value="{{ $instructorTicket->code }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('tickets.password')}}</label>
                            <input type="text" class="form-control "name="password" value="{{ $instructorTicket->password }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" type="submit">{{__('default.update')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
