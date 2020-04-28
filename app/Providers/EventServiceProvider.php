<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        'App\Events\Tickets\TicketGenerated' => [
            'App\Listeners\Tickets\NotifyBandOwners',
        ],

        'App\Events\Lessons\LessonPublished' => [],
        'App\Events\Posts\PostCreated' => [],

        'App\Events\Posts\PostCommentCreated' => [
            'App\Listeners\Posts\NotifyPostOwner',
            'App\Listeners\Posts\NotifyPostSubscribers',
            'App\Listeners\Comments\NotifyMentionedUsers',
        ],

        'App\Events\Groups\GroupMembersUpdated' => [
            'App\Listeners\Groups\NotifyGroupMembers',
        ]
    ];

    protected $subscribe = [
        'App\Listeners\PointHandlerEventSubscriber',
        'App\Listeners\NotifyBatchStudents',
    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
