@extends('layouts.app')

@section('title')
    All Requested Bands
@endsection

@section('content')
    <div class="section-body mt-3">
        <div class="container">
            <bands-requests-collection></bands-requests-collection>
        </div>
    </div>
@endsection
