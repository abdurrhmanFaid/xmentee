<?php

namespace App\Jobs;

//use App\Notifications\Rates\YourObjectWasRated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class HandleRate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $object, $objectOwners, $doer, $rate;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($object, $doer, $objectOwners, $rate)
    {
        $this->object = $object;
        $this->objectOwners = $objectOwners;
        $this->doer = $doer;
        $this->rate = $rate;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($className = $this->rateable($this->object)) {
            $pointHandler = pointsHandler(
                "{$className}RateChanged", $this->doer, $this->objectOwners, $this->rate
            );

            if(notificationOpen('rates') && $this->rate > 0) {
                $pointHandler->notifyUsers();
            }

//            if(notificationOpen('notify_students_after_rate_changed')) {
//                foreach ($this->objectOwners as $involvedUser) {
//                    $involvedUser->notify(new YourObjectWasRated($this->objectTitle, $this->rate));
//                }
//            }
        }
    }

    protected function rateable($object)
    {
        $object = (new \ReflectionClass($object));

        if(! in_array($object->getName(), site('rate_system.rateable'))) {
            return false;
        }

        return lcfirst($object->getShortName());
    }
}
