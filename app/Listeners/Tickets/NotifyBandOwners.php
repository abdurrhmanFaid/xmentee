<?php

namespace App\Listeners\Tickets;

use App\Events\Tickets\TicketGenerated;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Tickets\TicketGenerated as Notification;

class NotifyBandOwners implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  TicketGenerated  $event
     * @return void
     */
    public function handle(TicketGenerated $event)
    {
        $event->band->owners->each->notify(new Notification($event->ticket));
    }
}
