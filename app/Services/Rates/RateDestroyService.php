<?php

namespace App\Services\Rates;

use App\Jobs\HandleRate;

class RateDestroyService
{
    /**
     * @param $object
     * @param $doer
     * @param $objectOwners
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function handle($object, $doer, $objectOwners)
    {
        $oldRate = $object->rates()->where('user_id', $doer->id)->first();

        HandleRate::dispatch($object, $doer, $objectOwners, -$oldRate->rate);

        $oldRate->delete();

        return response($object->fresh()->rate, 200);
    }
}
