<?php

namespace App\Services\Batches;

use App\Repositiroes\Contracts\BatchRepositoryInterface;

class BatchStoreService
{
    /**
     * @var BatchRepositoryInterface
     */
    protected $batches;

    /**
     * BatchStoreService constructor.
     * @param BatchRepositoryInterface $batches
     */
    public function __construct(BatchRepositoryInterface $batches)
    {
        $this->batches = $batches;
    }

    /**
     * @param $band
     * @param $request
     * @return mixed
     */
    public function handle($band, $request)
    {
       return $this->batches->store($band, $request);
    }
}
