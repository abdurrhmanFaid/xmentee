@extends('layouts.app')

@section('title')
    {{__('payments.payment', ['payment' => $payment->slug])}}
@endsection

@section('pageTitle')
    {{__('payments.payment', ['payment' => $payment->slug])}}
@endsection

@section('breadcrumbs')
    {{Breadcrumbs::render('payments.show', $payment, $band)}}
@endsection

@php
$stdsNotPaidCount = $payment->studentsWhoNotPaidCount()
@endphp

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <!--end card-body-->
                    <div class="card-body">
                        <h3 class="header-title">{{__('payments.details')}}</h3>
                        <hr>
                        @if($stdsNotPaidCount)
                            <span class="badge badge-danger">{{__('payments.uncompleted')}}</span>
                        @else
                            <span class="badge badge-success">{{__('payments.completed')}}</span>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="mb-0"><b>{{__('payments.payment', ['payment' => $payment->slug])}}</b></h6>
                                <h6 class="mb-0"><b>{{__('default.created_at')}}: {{$payment->created_at}}</b></h6>
                                <h6 class="mb-0"><b>{{__('payments.title')}} :</b> {{$payment->title}}</h6>
                                <h6 class="mb-0"><b>{{__('payments.batch')}} :</b> {{$payment->batch->name}}</h6>
                                <h6 class="mb-0"><b>{{__('payments.currency')}} :</b> {{$payment->currency}}</h6>
                                <h6 class="mb-0"><b>{{__('payments.total')}} :</b> {{$payment->formattedTotal()}}</h6>
                                <h6 class="mb-0"><b>{{__('payments.assigned_students_count')}} :</b> {{$payment->students->count()}}</h6>
                                <h6 class="mb-0"><b>{{__('payments.students_who_not_paid_count')}} :</b> {{$stdsNotPaidCount}}</h6>
                                <h6 class="mb-0"><b>{{__('payments.students_who_paid_count')}} :</b> {{$payment->students->count() - $stdsNotPaidCount}}</h6>
                                <h6 class="mb-0"><b>{{__('payments.deadline')}} :</b> {{$payment->deadline}}</h6>
                                @if($stdsNotPaidCount)
                                    <h6 class="mb-0"><b>{{__('payments.alarm_notification_date')}} :</b> {{$payment->alarm_notification_date ?: __('payments.no_alarm_notification_date')}}</h6>
                                @endif
                                <h6 class="mb-3"><b>{{__('js.payments.description')}} :</b></h6>
                                <p class="bg--white">{{$payment->description ?: __("payments.no_description")}}</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="header-title">{{__('payments.assigned_students')}}</h3>
                                <hr>
                                <div class="table-responsive">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="POST" action="{{route('payments.update', $payment->slug)}}">
                                                @csrf
                                                <input type="hidden" name="student_id" value="all">
                                                @method('PATCH')
                                                <button type="submit" name="paid" value="0" class="btn btn-sm btn-outline-danger"><i class="fa fa-window-close"></i> {{__('payments.mark_all_as_unpaid')}}</button>
                                                <button type="submit" name="paid" value="1" class="btn btn-sm btn-outline-success"><i class="fa fa-check"></i> {{__('payments.mark_all_as_paid')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                    <br>
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th>{{__('js.user.name')}}</th>
                                            <th>{{__('js.user.phone_number')}}</th>
                                            <th>{{__('js.payments.value')}}</th>
                                            <th>{{__('js.payments.custom_value')}}</th>
                                            <th>{{__('js.payments.paid_at_date')}}</th>
                                            <th>{{__('payments.settings')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($payment->students->load('profile') as $student)
                                            <tr>
                                                <td>
                                                    <a href="{{route('profiles.show')}}" class="d-block">
                                                        <img src="{{$student->formattedImage(48)}}" class="rounded-circle">
                                                        {{$student->name}}
                                                    </a>
                                                </td>
                                                <td>
                                                    <span>
                                                        <i class="fa fa-phone"></i>
                                                        {{$student->profile->phone_number ?: __('js.user.no_phone_number')}}
                                                    </span>
                                                </td>
                                                <td>
                                                    <i class="fa fa-money-bill-wave"></i> {{$student->pivot->value}} {{$payment->currency}}
                                                </td>
                                                <td>
                                                    @if($student->profile->custom_payment_value)
                                                        <i class="fa fa-money-bill-wave"></i> {{$student->profile->custom_payment_value }} {{$payment->currency}}
                                                    @else
                                                        <i class="fa fa-money-bill-wave"></i> {{__('js.payments.no_custom_value')}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($student->pivot->paid_at)
                                                        <span class="badge badge-success">
                                                            <i class="fa fa-check"></i>
                                                            {{__('js.payments.paid_at_date')}} [{{$student->pivot->paid_at}}]</span>
                                                    @else
                                                        <span class="badge badge-warning">
                                                            <i class="fa fa-close"></i>
                                                            {{__('js.payments.unpaid')}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{route('payments.update', $payment->slug)}}">
                                                        @csrf
                                                        <input type="hidden" name="student_id" value="{{$student->id}}">
                                                        @method('PATCH')
                                                        @if($student->pivot->paid_at)
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-window-close"></i> {{__('payments.mark_as_unpaid')}}</button>
                                                        @else
                                                            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa fa-check"></i> {{__('payments.mark_as_paid')}}</button>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
    </div>
@endsection
