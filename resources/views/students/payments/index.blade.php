@extends('layouts.app')

@section('title')
    {{__('payments.me')}}
@endsection

@section('pageTitle')
    {{__('payments.me')}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @forelse($payments as $payment)
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            @if(!$payment->pivot->paid_at)
                                <span class="btn btn-danger a-animate-blink mt-0">{{__('js.payments.unpaid')}}</span>
                            @else
                                <span class="btn btn-success a-animate-blink mt-0">{{__('js.payments.paid_at_date')}} {{$payment->pivot->paid_at}}</span>
                            @endif
                            <div class="pricingTable1 text-center">
                                <h6 class="title1 py-3 m-0">{{$payment->title}}</h6>
                                <p class="text-muted p-3 mb-0">{{$payment->description}}</p>
                                <div class="text-center py-4">
                                    <h3 class="amount">{{$payment->pivot->value}} {{$payment->currency}}</h3></div>
                                <ul class="list-unstyled pricing-content-2 py-3 border-0">
                                    <li>
                                        @if($payment->pivot->paid_at)
                                            <b>
                                                {{__('js.payments.paid_at_date')}} {{$payment->pivot->paid_at}}
                                            </b>
                                        @else
                                            <b>{{__('payments.deadline')}}: {{$payment->deadline}}</b>
                                        @endif
                                    </li>
                                </ul>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
            @empty
                <div class="col-md-12 alert icon-custom-alert alert-outline-pink b-round fade show" role="alert">
                    <i class="fa fa-money-bill-wave alert-icon"></i>
                    <div class="alert-text">{!! __('payments.empty') !!}</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
