<?php

namespace App\Services\Tickets\UnRequested;

use App\Repositiroes\Contracts\TicketRepositoryInterface;

class TicketUpdateService
{
    /**
     * @var TicketRepositoryInterface
     */
    protected $ticketRepository;

    /**
     * TicketUpdateService constructor.
     * @param TicketRepositoryInterface $ticketRepository
     */
    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * @param $band
     * @param $ticketType
     * @param $request
     */
    public function handle($band, $ticketType, $request)
    {
        $this->ticketRepository->updateUnrequested(
            $this->getTicket($band, $ticketType), $request
        );

        session()->flash('success', __('tickets.updated'));
    }

    /**
     * @param $band
     * @param $type
     * @return mixed
     */
    protected function getTicket($band, $type)
    {
        return $band->{$type."Ticket"}();
    }
}
