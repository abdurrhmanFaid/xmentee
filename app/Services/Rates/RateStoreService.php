<?php

namespace App\Services\Rates;

use App\Jobs\HandleRate;

class RateStoreService
{
    /**
     * @param $object
     * @param $doer
     * @param $objectOwner
     * @param $rate
     * @return mixed
     */
    public function handle($object, $doer, $objectOwner, $rate)
    {
        $object->rates()->create([
            'user_id' => auth()->id(),
            'rate' => $rate,
        ]);

        HandleRate::dispatch($object, $doer, $objectOwner, $rate);

        return $object->rate;
    }
}
