<?php

namespace App\Services\Groups\Members;

use App\Events\Groups\GroupMembersUpdated;
use App\Jobs\Groups\MembersUpdated;

class GroupMembersUpdateService
{
    public function __construct()
    {

    }

    public function handle($group, array $membersIds)
    {
        $oldGroupMembers = $group->members;

        $group->members()->sync($membersIds);

        $group->update(['members_count' => count($membersIds)]);

        event(new GroupMembersUpdated($group, $membersIds, $oldGroupMembers));
    }
}
