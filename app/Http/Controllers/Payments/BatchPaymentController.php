<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\PaymentStoreRequest;
use App\Http\Requests\Payments\PaymentUpdateRequest;
use App\Models\Payment;
use App\Services\Payments\PaymentStoreService;

class BatchPaymentController extends Controller
{
    public function index()
    {
        if(auth()->user()->isStudent()) {
            return view('students.payments.index', [
                'payments' => auth()->user()->payments,
            ]);
        }

        if(request()->has('batch')) {
            $payments = \App\Models\Batch::where(['slug' => request('batch'), 'band_id' => auth()->user()->band_id])->firstOrFail()->payments()->withCount('students')->latest()->paginate();
        } else {
            $payments = auth()->user()->band->payments()->withCount('students')->latest()->paginate();
        }


        return view('payments.index', [
            'payments' => $payments,
            'batches' => auth()->user()->band->batches
        ]);
    }

    public function create()
    {
        $this->authorize('update', auth()->user()->band);

        return view('payments.create', ['batches' => auth()->user()->band->batches]);
    }

    public function store(PaymentStoreRequest $request)
    {
        resolve(PaymentStoreService::class)->handle($request->validated());

        return response([
            'redirectUrl' => route('payments.index'),
            'message' => __('payments.assigned')
        ], 201);
    }

    public function show(Payment $payment)
    {
        $this->authorize('update', $payment);

        return view('payments.show', compact('payment'));
    }

    public function update(Payment $payment, PaymentUpdateRequest $request)
    {
        $this->authorize('update', $payment);

        if($request->student_id == 'all') {
            \DB::table('payment_student')->where('payment_id', $payment->id)->update(['paid_at' => $request->paid ? now()->format('Y-m-d') : null]);
        } else {
            $student = $payment->students()->where('student_id', request('student_id'))->firstOrFail();
            $student->pivot->update(['paid_at' => $student->pivot->paid_at ? null : now()->format('Y-m-d')]);
        }

        return back();
    }
}
