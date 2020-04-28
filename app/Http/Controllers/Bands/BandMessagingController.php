<?php

namespace App\Http\Controllers\Bands;

use App\Models\Band;
use App\Http\Controllers\Controller;
use App\Services\Bands\BandMessagingUpdateService;
use App\Http\Requests\Bands\BandMessagingUpdateRequest;

class BandMessagingController extends Controller
{
    /**
     * @var BandMessagingUpdateService
     */
    protected $service;

    /**
     * BandMessagingController constructor.
     * @param BandMessagingUpdateService $service
     */
    public function __construct(BandMessagingUpdateService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Band $band
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Band $band)
    {
        $this->authorize('update', $band);

        return view('bands.messaging.telegram', [
            'identifierMsg' => $this->service->getIdentifierMsg($band),
        ]);
    }


    /**
     * @param BandMessagingUpdateRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(BandMessagingUpdateRequest $request)
    {
        $this->authorize('update', $band = auth()->user()->band);

        return $this->service->handle($request->validated()['link'], $band);
    }
}
