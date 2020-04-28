<?php

namespace App\Events\Tickets;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class TicketGenerated
{
    use Dispatchable, InteractsWithSockets;

    public $ticket, $band;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($ticket, $band)
    {
        $this->ticket = $ticket;
        $this->band = $band;
    }
}
