<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class HandlePoints implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $event, $doer, $objectOwners;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($event, $doer, $objectOwners)
    {
        $this->event = $event;
        $this->doer = $doer;
        $this->objectOwners = $objectOwners;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $handler = pointsHandler($this->event, $this->doer, $this->objectOwners);

        if($handler->getPoints()['doer'] > 0 && notificationOpen('points')) {
            $handler->notifyUsers();
        }
    }
}
