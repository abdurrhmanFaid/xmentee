<?php

namespace App\Console\Commands;

use App\Models\Payment;
use App\Notifications\Payments\YouMustPayNotification;
use Illuminate\Console\Command;

class NotifyStudentsWhoNotPaid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify-students-who-not-paid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify students who not paid their assigned payment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $payments = Payment::all();

        foreach($payments as $payment) {
            if(now()->format('Y-m-d') == $payment->alarm_notification_date) {
                $payment->studentsWhoNotPaid()->each(function ($student) use ($payment) {
                    $student->notify(new YouMustPayNotification($payment, $student->pivot->value));
                    sleep(5);
                });
            }
        }
    }
}
