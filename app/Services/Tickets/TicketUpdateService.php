<?php

namespace App\Services\Tickets;

use App\Repositiroes\Contracts\TicketRepositoryInterface;

class TicketUpdateService
{
    protected $ticketRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function handle($band, $request)
    {
        $this->ticketRepository->updateRequested($band, $request['tickets'], $request['status']);
    }
}
