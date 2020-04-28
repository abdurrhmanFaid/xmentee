<?php

namespace App\Support\Points;

use App\Notifications\Points\PointsChanged;
use App\Support\Points\Contracts\PointHandlerInterface;

class PointHandler
{
    /**
     * @var PointHandlerInterface
     */
    /**
     * @var PointHandlerInterface
     */
    /**
     * @var PointHandlerInterface
     */
    /**
     * @var PointHandlerInterface
     */
    protected $pointHandler, $points, $doer, $objectOwners;

    /**
     * PointHandler constructor.
     * @param PointHandlerInterface $pointHandler
     */
    public function __construct(PointHandlerInterface $pointHandler)
    {
        $this->pointHandler = $pointHandler;
    }

    /**
     * @param $event
     * @param $doer
     * @param $objectOwners
     * @param null $eventProps
     * @return $this|null
     */
    public function handle($event, $doer, $objectOwners, $eventProps = null)
    {
        $this->event = $event;
        $this->doer = $doer;
        $this->objectOwners = is_array($objectOwners) ? $objectOwners : [$objectOwners];

        $this->points = $this->pointHandler->handle($event, $eventProps)->getPoints();

        if(count($this->points)) {
            $this->distributePoints();
        }


        return $this;
    }

    /**
     *
     */
    protected function distributePoints()
    {
        foreach($this->points as $involved => $pointsCount) {
            $this->{"handle" . ucfirst($involved) . "Points"}($pointsCount);
        }
    }

    /**
     * @return PointHandlerInterface
     */
    public function getPoints()
    {
        return $this->points;
    }


    /**
     * @param $points
     */
    protected function handleDoerPoints($points)
    {
        $this->handleUserPoints($this->doer, $points);
    }

    /**
     * @param $indicator
     * @param $count
     * @param $doer
     * @param $objectOwners
     */
    protected function handleDoerGroupPoints($indicator, $count, $doer, $objectOwners)
    {
        $this->doerGroup = $doer->firendsInAllEnrolledGroups();

        $this->doerGroup->each(function ($user) use ($count, $indicator){
                $user->{"points" . ucfirst($indicator)}($count);
            });
    }

    /**
     * @param $points
     */
    protected function handleObjectOwnerPoints($points)
    {
        foreach($this->objectOwners as $owner) {
            $this->handleUserPoints($owner, $points);
        }
    }

    /**
     * @param $indicator
     * @param $count
     * @param $doer
     * @param $objectOwners
     */
    protected function handleObjectOwnerGroupPoints($indicator, $count, $doer, $objectOwners)
    {
        // lesssa
        $this->objectOwnerGroup = $doer->firendsInAllEnrolledGroups();

        $this->objectOwnerGroup->each(function ($user) use ($count, $indicator){
                $user->{"points" . ucfirst($indicator)}($count);
            });
    }

    /**
     * @param $user
     * @param $points
     */
    protected function handleUserPoints($user, $points)
    {
        $action = $points > 0 ? 'Up' : 'Down';

        $user->{"points{$action}"}(abs($points));
    }

    /**
     *
     */
    public function notifyUsers()
    {
        $messages = (new ChangingPointMessages)->handle($this->event);

        foreach ($this->points as $involved => $points) {
            if($involved == 'doer') {
                $this->doer->notify(new PointsChanged($this->points['doer'],$points > 0, __($messages['doer'])));
            } elseif ($involved == 'doerGroup') {
                collect($this->doer->friendsInAllGroups())->map(function ($user) use ($messages, $points) {
                    $user->notify(new PointsChanged($this->points['doerGroup'], $points > 0, __($messages['doerGroup'])));
                });
            } elseif ($involved == 'objectOwner') {
                collect($this->objectOwners)->map(function ($user) use ($messages, $points) {
                    $user->notify(new PointsChanged($this->points['objectOwner'], $points > 0, __($messages['objectOwner'])));
                });
            } elseif ($involved == 'objectOwnerGroup') {
                // not finished
            }
        }
    }
}
