<?php

namespace Tests\Factories\Tickets;

use App\Models\Band;
use App\Models\Ticket;
use Facades\Tests\Factories\Bands\BandFactory;
use Facades\Tests\Factories\Batches\BatchFactory;

class TicketFactory
{
    protected $band;

    /**
     * @param Band $band
     * @return $this
     */
    public function inBand(Band $band)
    {
        $this->band = $band;

        return $this;
    }

    /**
     * @return $this
     */
    public function attachedToValidBand()
    {
        $batch = BatchFactory::create();

        $batch->band->update(['student_reception_open' => true, 'receiving_batch_id' => $batch->id]);

        $this->band = $batch->band;

        return $this;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = [])
    {
        return factory(Ticket::class)->create(array_merge($attributes, [
            'band_id' => $this->band ? $this->band->id : BandFactory::create()->id
        ]));
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function make($attributes = [])
    {
       return factory(Ticket::class)->make(array_merge($attributes, [
           'band_id' => $this->band ? $this->band->id : BandFactory::create()->id
       ]));
    }

}
