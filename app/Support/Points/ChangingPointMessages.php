<?php

namespace App\Support\Points;

class ChangingPointMessages
{
    /**
     * @return array
     */
    public function postCreated()
    {
        return [
            'doer' => __('notifications.points.posts.created.doer'),
        ];
    }

    /**
     * @return array
     */
    public function commentCreated()
    {
        return [
            'doer' => __('notifications.points.comments.created.doer'),
            'doerGroup' => __('notifications.points.comments.created.doerGroup'),
            'objectOwner' => __('notifications.points.comments.created.objectOwner'),
            'objectOwnerGroup' => __('notifications.points.comments.created.objectOwnerGroup'),
        ];
    }

    /**
     * @return array
     */
    public function postRateChanged()
    {
        return [
            'doer' => 'notifications.points.rates.post.doer',
            'doerGroup' => 'notifications.points.rates.post.doerGroup',
            'objectOwner' => 'notifications.points.rates.post.objectOwner',
            'objectOwnerGroup' => 'notifications.points.rates.post.objectOwnerGroup',
        ];
    }

    /**
     * @param $event
     * @return array
     */
    public function handle($event)
    {
        if(method_exists($this, $event)) {
            return $this->{$event}();
        }

        return [];
    }
}

