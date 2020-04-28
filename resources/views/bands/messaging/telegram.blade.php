@extends('layouts.app')

@section('title')
{{__('bands.messaging.telegram.setup')}}
@endsection

@section('pageTitle')
{{__('bands.messaging.telegram.setup')}}
@endsection

@section('breadcrumbs', Breadcrumbs::render('bands.messaging', $band))

@section('content')
<div class="container">
    <telegram-setup-form
        linked="{{$band->linkedToMessagingService()}}"
        band="{{$band->name}}"
        identifier-msg="{{$identifierMsg}}">
    </telegram-setup-form>
</div>
@endsection
