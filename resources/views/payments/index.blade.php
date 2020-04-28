@extends('layouts.app')

@section('title')
    {{__('payments.index')}}
@endsection

@section('pageTitle')
    {{__('payments.index')}}
@endsection

@section('breadcrumbs')
    {{Breadcrumbs::render('payments.index', $band)}}
@endsection

@section('content')
<div class="section-body mt-50">
    <div class="container-fluid">
        @if(count($batches) > 1)
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{route('payments.index')}}" class="btn btn-block btn-square btn-outline-dashed waves-effect waves-light @if(!request('batch')) btn-primary @else btn-info @endif">
                                    <i class="fa fa-list-alt mr-2"></i> {{__('payments.all')}}
                                </a>
                            </div>
                            @foreach($batches as $batch)
                                <div class="col-md-3">
                                    <a href="{{route('payments.index', ['batch' => $batch->slug])}}" class="btn btn-block  btn-square btn-outline-dashed waves-effect waves-light @if(request('batch') == $batch->slug) btn-primary @else btn-info @endif">
                                        <i class="fa fa-users mr-2"></i>{{$batch->name}}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 mb-3 header-title">{{__('payments.for', ['band' => $band->name])}}</h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    @if(count($payments))
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{__('payments.title')}}</th>
                                                    <th>{{__('payments.batch')}}</th>
                                                    <th>{{__('payments.assigned_students_count')}}</th>
                                                    <th>{{__('payments.total')}}</th>
                                                    <th>{{__('payments.status')}}</th>
                                                    <th>{{__('default.created_at')}}</th>
                                                    <th>{{__('default.settings')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($payments as $index => $payment)
                                                        @php
                                                            $studentsWhoNotPaidCount  = $payment->studentsWhoNotPaidCount();
                                                        @endphp
                                                        <tr>
                                                            <td>{{++$index}}</td>
                                                            <td>{{$payment->title}}</td>
                                                            <td>{{$payment->batch->name}}</td>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <th>{{__('payments.batch_students')}}</th>
                                                                        <td>
                                                                            <span class="badge badge-success">{{$payment->batch->students_count}}</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>{{__('payments.assigned_students_count')}}</th>
                                                                        <td>
                                                                            <span class="badge badge-primary">{{$payment->students_count}}</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>{{__('payments.unassigned_students_count')}}</th>
                                                                        <td>
                                                                            <span class="badge badge-danger">{{$payment->batch->students_count - $payment->students_count}}</span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td>{{$payment->formattedTotal()}}</td>
                                                            <td>
                                                                @if($studentsWhoNotPaidCount)
                                                                    <span class="badge badge-boxed badge-soft-danger">{{__('payments.uncompleted')}}({{$payment->students_count - $studentsWhoNotPaidCount}}/{{$payment->students_count}})</span>
                                                                @else
                                                                <span class="badge badge-boxed badge-soft-success">{{__('payments.completed')}} ({{$payment->students_count}}/{{$payment->students_count}})
                                                                @endif
                                                            </td>
                                                            <td>{{$payment->created_at}}</td>
                                                            <td>
                                                                <a href="{{route('payments.show', $payment->slug)}}" class="btn btn-block btn-sm btn-primary">
                                                                    {{__('payments.details')}} <i class="fa fa-eye"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <hr>
                                            <div class="text-center" style="width:400px; margin:auto">
                                                {{$payments->links()}}
                                            </div>
                                        </div>
                                        <!--end table-responsive-->
                                    @else
                                        <div class="alert icon-custom-alert alert-outline-pink b-round fade show" role="alert">
                                            <i class="fa fa-money-bill-wave alert-icon"></i>
                                            <div class="alert-text">{!! __('payments.empty') !!}</div>
                                        </div>
                                    @endif
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
    </div>
</div>
@endsection
