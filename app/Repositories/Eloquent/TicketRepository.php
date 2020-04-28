<?php

namespace App\Repositiroes\Eloquent;

use App\Models\Ticket;
use App\Repositiroes\Contracts\TicketRepositoryInterface;

class TicketRepository implements TicketRepositoryInterface
{
    /**
     * @var Ticket
     */
    protected $tickets;

    /**
     * TicketRepository constructor.
     * @param Ticket $tickets
     */
    public function __construct(Ticket $tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->tickets->create($data);
    }

    /**
     * @param $band
     * @return mixed
     */
    public function requested($band)
    {
        return $band->tickets()->forStudents()->notDistributedByBand()->filter();
    }

    /**
     * @param $band
     * @param array $tickets
     * @param $status
     */
    public function updateRequested($band, array $tickets, $status)
    {
        $query = $band->tickets()->forStudents()->notDistributedByBand();

        if(in_array('*', $tickets)) {
            // update all band requested tickets
            $query->update(['status' => $status]);
        } else {
            // update specific tickets
            $query->whereIn('id', $tickets)->update(['status' => $status]);
        }
    }

    /**
     * @param $ticket
     * @param $data
     */
    public function updateUnrequested($ticket, $data)
    {
        $ticket->update($data);
    }
}
