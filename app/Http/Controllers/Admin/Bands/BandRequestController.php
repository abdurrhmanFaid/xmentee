<?php

namespace App\Http\Controllers\Admin\Bands;

use App\Models\BandRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Bands\BandRequestResource;
use App\Services\RequestedBands\RequestedBandApproveService;

class BandRequestController extends Controller
{
    /**
     * @return
     * \Illuminate\Contracts\View\Factory
     * |
     * \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\View\View
     */
    public function index()
    {
        if(request()->ajax()) {
            return BandRequestResource::collection(BandRequest::filter());
        }

        return view('admin.bands_request.index');
    }

    /**
     * @param $bandId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($bandId)
    {
        $requestedBand = BandRequest::find($bandId) ?: abort(404);

        return view('admin.bands_request.show', compact('requestedBand'));
    }

    /**
     * @param $requestedBandId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($requestedBandId)
    {
        $requestedBand = BandRequest::find($requestedBandId) ?: abort(404);

        resolve(RequestedBandApproveService::class)
            ->approve($requestedBand);

        return redirect()->route('admin.bands-request.index');
    }
}
