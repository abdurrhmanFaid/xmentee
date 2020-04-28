@extends('layouts.app')

@section('title')
    {{__('bands.show', ['band' => $band->name])}}
@endsection

@section('content')
    <div class="container mt-30">
        <h1>
            {{$band->name}}
            <a class='btn btn-danger' href="{{route('bands.edit', ['band' => $band->slug])}}" class="btn btn-info">
                <i class="fa fa-edit"></i>
            </a>
        </h1>
        <hr>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h6>
                            <a href="{{route('bands.statistics', ['band' => $band->slug])}}">{{__('default.statistics')}}</a>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h6>In progress</h6>
                        <div style="display:inline;width:90px;height:90px;"><canvas width="90" height="90"></canvas><input type="text" class="knob" value="43" data-width="90" data-height="90" data-thickness="0.1" data-fgcolor="#6e7687" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(110, 118, 135); padding: 0px; -webkit-appearance: none;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h6>Completed</h6>
                        <div style="display:inline;width:90px;height:90px;"><canvas width="90" height="90"></canvas><input type="text" class="knob" value="83" data-width="90" data-height="90" data-thickness="0.1" data-fgcolor="#6e7687" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(110, 118, 135); padding: 0px; -webkit-appearance: none;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h6>In Completed</h6>
                        <div style="display:inline;width:90px;height:90px;"><canvas width="90" height="90"></canvas><input type="text" class="knob" value="12" data-width="90" data-height="90" data-thickness="0.1" data-fgcolor="#6e7687" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(110, 118, 135); padding: 0px; -webkit-appearance: none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
