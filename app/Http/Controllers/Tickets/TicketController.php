<?php

namespace App\Http\Controllers\Tickets;

use App\Models\Ticket;
use App\Http\Controllers\Controller;
use App\Services\Tickets\TicketIndexService;
use App\Services\Tickets\TicketUpdateService;
use App\Http\Resources\Tickets\TicketResource;
use App\Http\Requests\Tickets\UpdateTicketRequest;

class TicketController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view', $band = auth()->user()->band);

        if(request()->ajax()) {
            return TicketResource::collection(
                resolve(TicketIndexService::class)->handle($band)
            );
        }

        return view('tickets.index');
    }

    /**
     * @param UpdateTicketRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateTicketRequest $request)
    {
        $this->authorize('update', $band = auth()->user()->band);

        resolve(TicketUpdateService::class)->handle($band, $request);

        return response([], 200);
    }


    /**
     * @param Ticket $ticket
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Ticket $ticket)
    {
        $this->authorize('delete', $ticket);

        $ticket->delete();

        return response([], 204);
    }
}
