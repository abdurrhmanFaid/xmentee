<?php

namespace App\Http\Controllers\Groups;

use App\Models\Group;
use App\Http\Controllers\Controller;
use App\Services\Groups\Members\GroupMembersUpdateService;
use App\Http\Requests\Groups\Members\GroupMembersUpdateRequest;

class GroupMembersController extends Controller
{
    protected $service;

    public function __construct(GroupMembersUpdateService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Group $group
     * @param GroupMembersUpdateRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Group $group, GroupMembersUpdateRequest $request)
    {
        $this->authorize('update', $group);

        $this->service->handle($group, $request->validated()['members']);

        return response(['message' => __('groups.members_updated')], 200);
    }
}
