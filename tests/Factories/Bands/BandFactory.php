<?php

namespace Tests\Factories\Bands;

use App\Models\Band;
use Facades\Tests\Factories\Batches\BatchFactory;

class BandFactory
{
    protected $batchesCount;
    /**
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = [])
    {
        $band = factory(Band::class)->create($attributes);

        if($this->batchesCount) {
            BatchFactory::create(['band_id' => $band->id], $this->batchesCount);
        }

        return $band;
    }

    /**
     * @param $count
     * @return $this
     */
    public function withBatches($count)
    {
        $this->batchesCount = $count;

        return $this;
    }
}
