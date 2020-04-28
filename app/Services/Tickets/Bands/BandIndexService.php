<?php

namespace App\Services\Tickets\Bands;

use App\Repositiroes\Contracts\BandRepositoryInterface;

class BandIndexService
{
    protected $bands;

    /**
     * BandIndexService constructor.
     * @param BandRepositoryInterface $bands
     */
    public function __construct(BandRepositoryInterface $bands)
    {
        $this->bands = $bands;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        return $this->bands->openForReception()->map(function ($band) {
            return [
                'label' => $band->name,
                'value' => $band->id,
                'description' => $band->description,
                'created_at' => $band->created_at->format('Y-m-d'),
                'deadline' =>  $band->applying_deadline->diffForHumans(),
                'address' => $band->address,
                'applying_open' => $band->applying_deadline->gt(now()) ? true : false,
                'members_count' => $band->members_count,
            ];
        });
    }
}
