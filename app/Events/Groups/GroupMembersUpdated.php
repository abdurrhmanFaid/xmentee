<?php

namespace App\Events\Groups;

//use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
//use Illuminate\Broadcasting\PresenceChannel;
//use Illuminate\Broadcasting\PrivateChannel;
//use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GroupMembersUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $group, $newMembersIds, $oldMembersCollection;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($group, $newMembersIds, $oldMembersCollection)
    {
        $this->group = $group;
        $this->newMembersIds = $newMembersIds;
        $this->oldMembersCollection = $oldMembersCollection;
    }
}
