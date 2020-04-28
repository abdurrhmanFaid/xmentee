@extends('layouts.app')

@section('title')
    {{__('batches.create', ['band' => $band->name])}}
@endsection

@section('content')
    <div class="section-body mt-50">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{__('batches.create', ['band' => $band->name])}}
                            </h3>
                        </div>
                        <div class="card-body">
                            <create-batch-form></create-batch-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
