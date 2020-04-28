@extends('layouts.app')

@section('title')
    {{__('profiles.edit')}}
@endsection

@section('content')
    <div class="section-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <ul class="nav nav-tabs page-header-tab">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#userDetails">{{__('profiles.user_details')}}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Project-UpComing">UpComing</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Project-add">Add</a></li>
                        </ul>
                        <div class="header-action d-md-flex">
                            <div class="input-group mr-2">
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body mt-3">
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Project-OnGoing" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{__('profiles.edit')}}</h3>
                                    <div class="card-options">
                                        <label class="custom-switch m-0">
                                            <input type="checkbox" value="1" class="custom-switch-input" checked>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form>
                                        @csrf
                                        {{method_field('PATCH')}}
                                        <div class="row">
                                            <div class="col-md-6 offset-md-3">
                                                div
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{__('auth.name')}}</label>
                                                    <input type="text" class="form-control" name="name" value="{{old('name') ?:  $profileUser->name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{__('profiles.change_profile_img')}}</label>
                                                    <br>
                                                    <input type="hidden" class="form-control" role="uploadcare-uploader" name="my_file" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{__('profiles.update')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('layouts.partials.__upcare_script')
@endpush
