<?php

namespace App\Services\Tickets;

use App\Repositiroes\Contracts\TicketRepositoryInterface;

class TicketIndexService
{
    /**
     * @var TicketRepositoryInterface
     */
    protected $ticketRepository;

    /**
     * TicketIndexService constructor.
     * @param TicketRepositoryInterface $ticketRepository
     */
    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * @param $band
     * @return mixed
     */
    public function handle($band)
    {
        return $this->ticketRepository->requested($band);
    }
}
