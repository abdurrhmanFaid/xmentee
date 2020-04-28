<?php

namespace App\Services\Groups;

use App\Repositiroes\Contracts\GroupRepositoryInterface;

class GroupStoreService
{
    /**
     * @var GroupRepositoryInterface
     */
    protected $groupRepository;

    /**
     * GroupStoreService constructor.
     * @param GroupRepositoryInterface $groupRepository
     */
    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function handle($request)
    {
        return $this->groupRepository->store(
            array_merge($request, ['band_id' => auth()->user()->band_id])
        );
    }
}
