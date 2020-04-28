<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tickets\Unrequested\TicketUpdateRequest;
use App\Services\Tickets\UnRequested\TicketUpdateService;

class UnrequestedTicketController extends Controller
{
    /**
     * UnrequestedTicketController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view', $band = auth()->user()->band);

        return view('tickets.unrequested.index', [
            'instructorTicket' => $band->instructorTicket(),
            'studentTicket' => $band->studentTicket(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit()
    {
        $this->authorize('view', $band = auth()->user()->band);

        return view('tickets.unrequested.edit', [
            'instructorTicket' => $band->instructorTicket(),
            'studentTicket' => $band->studentTicket(),
        ]);
    }

    /**
     * @param TicketUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(TicketUpdateRequest $request)
    {
        $this->authorize('view', $band = auth()->user()->band);

        resolve(TicketUpdateService::class)
            ->handle($band, $request->type, $request->validated());

        return back();
    }
}
