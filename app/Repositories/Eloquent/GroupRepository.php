<?php

namespace App\Repositiroes\Eloquent;

use App\Models\Group;
use App\Repositiroes\Contracts\GroupRepositoryInterface;

class GroupRepository implements GroupRepositoryInterface
{
    /**
     * @var Group
     */
    protected $groups;

    /**
     * TicketRepository constructor.
     * @param Ticket $tickets
     */
    public function __construct(Group $groups)
    {
        $this->groups = $groups;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->groups->create($data);
    }

}
