<?php

namespace App\Http\Controllers\Bands;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bands\RequestBandRequest;
use App\Services\RequestedBands\RequestedBandStoreService;

class BandRequestController extends Controller
{
    protected $service;

    /**
     * BandRequestController constructor.
     */
    public function __construct(RequestedBandStoreService $service)
    {
        $this->service = $service;

        $this->middleware('guest');
    }

    /**
     * @param RequestBandRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RequestBandRequest $request)
    {
        $this->service->handle($request->validated());

        return back();
    }
}
