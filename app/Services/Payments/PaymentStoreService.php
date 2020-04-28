<?php

namespace App\Services\Payments;

use App\Jobs\Payments\SendPaymentNotification;
use App\Models\Payment;
use App\Repositiroes\Contracts\BatchRepositoryInterface;

class PaymentStoreService
{
    protected $batches;

    public function __construct(BatchRepositoryInterface $batches)
    {
        $this->batches = $batches;
    }

    public function handle($request)
    {
        $batch = $this->batches->find($request['batch_id']);

        $payment = $batch->createPayment(array_only($request, (new Payment)->getTableColumns()));

        foreach($request['std_payment'] as $student) {
            $payment->assignTo($student);
        }

        if(notificationOpen('payments')) {
            SendPaymentNotification::dispatch(
                array_column($request['std_payment'], 'payment', 'id'), $payment, 'created'
            );
        }
    }
}
