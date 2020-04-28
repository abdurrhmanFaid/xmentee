<?php

namespace App\Repositiroes\Eloquent;

use App\Models\Batch;
use App\Repositiroes\Contracts\BatchRepositoryInterface;

class BatchRepository implements BatchRepositoryInterface
{
    protected $batches;

    /**
     * TicketRepository constructor.
     * @param Ticket $tickets
     */
    public function __construct(Batch $batches)
    {
        $this->batches = $batches;
    }

    public function __call($name, $arguments)
    {
        return $this->batches->$name(...$arguments);
    }

    /**
     * @param $data
     * @param $band
     * @return mixed
     */
    public function store($band, $data)
    {
        return $band->batches()->create($data);
    }
}
