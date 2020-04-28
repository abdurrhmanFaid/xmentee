<?php

namespace App\Repositiroes\Eloquent;

use App\Models\Band;
use App\Models\Ticket;
use App\Repositiroes\Contracts\BandRepositoryInterface;

class BandRepository implements BandRepositoryInterface
{
    /**
     * @var Band|Ticket
     */
    protected $bands;

    /**
     * TicketRepository constructor.
     * @param Ticket $bands
     */
    public function __construct(Band $bands)
    {
        $this->bands = $bands;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->bands->$name(...$arguments);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->bands->all();
    }

    /**
     * @return mixed
     */
    public function openForReception()
    {
        return $this->bands->openForReception()->get();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->bands->create($data);
    }

    /**
     * @param $band
     * @param $data
     * @return mixed
     */
    public function update($band, $data)
    {
        return $band->update($data);
    }
}
