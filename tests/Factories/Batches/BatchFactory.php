<?php

namespace Tests\Factories\Batches;

use App\Models\Batch;

class BatchFactory
{
    public function create($attributes = [], $count = null)
    {
        return factory(Batch::class, $count)->create($attributes);
    }
}
