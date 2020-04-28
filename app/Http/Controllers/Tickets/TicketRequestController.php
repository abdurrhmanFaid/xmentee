<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use App\Services\Tickets\TicketStoreService;
use App\Services\Tickets\Bands\BandIndexService;
use App\Http\Requests\Tickets\TicketStoreRequest;

class TicketRequestController extends Controller
{
    protected $service;

    /**
     * TicketController constructor.
     * @param TicketStoreService $service
     */
    public function __construct(TicketStoreService $service)
    {
        $this->service = $service;

        $this->middleware('guest');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('tickets.request', [
            'bands' => resolve(BandIndexService::class)->handle()
        ]);
    }

    /**
     * @param TicketStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TicketStoreRequest $request)
    {
        return $this->service->handle($request->validated());
    }
}
