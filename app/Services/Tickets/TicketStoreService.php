<?php

namespace App\Services\Tickets;

use App\Events\Tickets\TicketGenerated;
use App\Repositiroes\Contracts\TicketRepositoryInterface;

class TicketStoreService
{
    /**
     * TicketStoreService constructor.
     * @param TicketRepositoryInterface $tickets
     */
    public function __construct(TicketRepositoryInterface $tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function handle($request)
    {
        $ticket = $this->tickets->store([
            'owner_name' => $request['owner_name'],
            'password' => $request['password'],
            'code' => $this->generateTicketCode($request['owner_name']),
            'band_id' => $request['band_id'],
        ]);

        if(notificationOpen('tickets')) {
            event(new TicketGenerated($ticket, $ticket->band));
        }

        return response([
            'owner_name' => $ticket->owner_name,
            'code' => $ticket->code,
            'message' => trans('tickets.created')
        ], 201);
    }

    /**
     * @param $ownerName
     * @return string
     */
    protected function generateTicketCode($ownerName)
    {
        preg_match_all('/[A-Z]/', $ownerName, $matches);

        if(! $matches[0]) {
            return rand(1, 50000);
        }

        return strtolower(implode('', $matches[0])) . "_" . rand(1, 50000);
    }
}
