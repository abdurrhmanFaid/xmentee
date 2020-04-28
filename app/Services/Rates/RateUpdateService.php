<?php

namespace App\Services\Rates;

use App\Jobs\HandleRate;

class RateUpdateService
{
    /**
     * @param $object
     * @param $doer
     * @param $objectOwners
     * @param $rate
     */
    public function handle($object, $doer, $objectOwners, $rate)
    {
        $oldRate = $object->rates()->where('user_id', $doer->id)->first();

        if(($tempRate = $oldRate->rate) == $rate) return;

        $oldRate->update(['rate' => $rate]);

        $rate = $rate - $tempRate;

        HandleRate::dispatch($object, $doer, $objectOwners, $rate);

        return $object->fresh()->rate;
    }
}
