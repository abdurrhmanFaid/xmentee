<?php

namespace App\Support\Points;

use App\Support\Points\Contracts\PointHandlerInterface;

/**
 * Class LocalPointHandler
 * @package App\Support\Points
 */
class LocalPointHandler implements PointHandlerInterface
{
    /**
     * @var
     */
    protected $points;
    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    protected $pointsSystem;

    /**
     * LocalPointHandler constructor.
     */
    public function __construct()
    {
        $this->pointsSystem = site('points_system');
    }

    /**
     * @param $event
     * @param null $props
     * @return $this
     */
    public function handle($event, $props = null)
    {
        if(method_exists($this, $event)) {
            $this->{$event}($props);
        }

        return $this;
    }

    /**
     * @param $parent
     * @param $type
     * @return mixed
     */
    protected function handlePoints($parent, $type)
    {
        $points = $this->pointsSystem[$parent][$type];

        $this->points['doer'] = $points['doer'];
        $this->points['doerGroup'] = $points['doerGroup'];
        $this->points['objectOwner'] = $points['objectOwner'];
        $this->points['objectOwnerGroup'] = $points['objectOwnerGroup'];

        return $points;
    }

    /**
     * @param $rate
     */
    protected function handlePointsByRate($rate)
    {
        $pointsPerRate = site('rate_system.points_per_rate');

        array_walk($this->points, function (&$point) use ($pointsPerRate, $rate) {
            $point = $point * $rate * $pointsPerRate;
        });
    }

    /**
     * @return array
     */
    public function getPoints()
    {
        return array_filter($this->points);
    }

    /**
     * @return $this
     */
    protected function postCreated()
    {
        $this->handlePoints('posts', 'created');

        return $this;
    }

    /**
     * @return $this
     */
    protected function postDeleted()
    {
        $this->postCreated();

        $this->down();

        return $this;
    }

    /**
     * @return $this
     */
    protected function commentCreated()
    {
        $this->handlePoints('comments', 'created');

        return $this;
    }

    /**
     * @return $this
     */
    protected function commentDeleted()
    {
        $this->commentCreated();

        $this->down();

        return $this;
    }

    /**
     * @param $rate
     * @return $this
     */
    protected function postRateChanged($rate)
    {
        //  EX: Given we have a doer,
        // and doer points is set to (3) after rate changed
        // and user has get rate of (2)
        // and points_by_rate are set to (5)
        // Then the result will be [pointsAfterChanged * (gainedRate * pointPerRate )]
        // Which means 3 * (2 * 5) = 30

        $this->handlePoints('rates', 'post');

        $this->handlePointsByRate($rate);

        return $this;
    }

    protected function down()
    {
        array_walk($this->points, function (&$points) {
            $points = -1 * $points;
        });
    }
}
