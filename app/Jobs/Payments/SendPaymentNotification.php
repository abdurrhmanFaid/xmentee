<?php

namespace App\Jobs\Payments;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendPaymentNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $students, $payment, $event;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($students, $payment, $event)
    {
        $this->students = $students;
        $this->payment = $payment;
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notification = "\App\Notifications\Payments\Payment" . ucfirst($this->event) . "Notification";

        User::whereIn('id', array_keys($this->students))->get()->each(function($student) use ($notification) {
            $student->notify(new $notification($this->payment, $this->students[$student->id]));
            sleep(5);
        });

    }
}
