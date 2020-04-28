<?php

namespace App\Listeners\Groups;

use App\Events\Groups\GroupMembersUpdated;
use App\Models\User;
use App\Notifications\Groups\NewGroupMember;
use App\Notifications\Groups\RemovedGroupMember;
use App\Notifications\Groups\UnchangedGroupMember;
use App\Repositiroes\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Queue\InteractsWithQueue;

class NotifyGroupMembers implements ShouldQueue
{
    /**
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Handle the event.
     *
     * @param  GroupMembersUpdated  $event
     * @return void
     */
    public function handle(GroupMembersUpdated $event)
    {
        $oldMembersIds = $event->oldMembersCollection->pluck('id')->toArray();

        $state = [
            'removed' => array_diff($oldMembersIds, $event->newMembersIds),
            'added' => array_diff($event->newMembersIds, $oldMembersIds),
            'unchanged' => array_intersect($event->newMembersIds, $oldMembersIds)
        ];

        if($this->groupChanged($state)) {
            $this->notifyMembers(
                $event,
                $state['unchanged'],
                UnchangedGroupMember::class
            );
        }

        if(count($state['added'])) {
            $this->notifyMembers(
                $event,
                $state['added'],
                NewGroupMember::class
            );
        }

        if(count($state['removed'])) {
            $this->notifyMembers(
                $event,
                $state['removed'],
                RemovedGroupMember::class
            );
        }
    }

    /**
     * @param $state
     * @return bool
     */
    protected function groupChanged($state)
    {
        return (count($state['removed']) || count($state['added'])) && count($state['unchanged']);
    }

    /**
     * @param $event
     * @param $membersIds
     * @param $notification
     */
    protected function notifyMembers($event, $membersIds, $notification)
    {
        $members = $this->users->byId($membersIds);

        $members
            ->map(function ($user) use ($event, $notification) {
                $user->notify(new $notification($event->group));
            })
            ->filter(function ($user) {
                return !is_null($user);
            });
    }
}
