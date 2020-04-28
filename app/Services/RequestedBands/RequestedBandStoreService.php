<?php

namespace App\Services\RequestedBands;

use App\Models\BandRequest;

class RequestedBandStoreService
{
    /**
     * @param $request
     * @return mixed
     */
    public function handle($request)
    {
        $band = BandRequest::create($request);

        session()->flash(
            'bandCreated',
            __('bands.requested', [
                'band' => $band->name,
                'email' => $band->owner_email])
        );

        return $band;
    }
}
