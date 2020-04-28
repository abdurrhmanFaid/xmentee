<?php

namespace App\Repositiroes\Eloquent;

use App\Models\User;
use App\Repositiroes\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $users;

    /**
     * TicketRepository constructor.
     * @param Ticket $tickets
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    /**
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
   {
       return $this->users->whereUsername($username)->first();
   }

    /**
     * @param $ids
     * @return mixed
     */
    public function byId($ids)
   {
       if(is_array($ids)) {
           return $this->users->whereIn('id', $ids)->get();
       }

       return $this->users->find($ids);
   }

    /**
     * @param $user
     * @param $data
     * @return mixed
     */
    public function update($user, $data)
   {
       $user->update(array_only($data, $user->getTableColumns()));
       $user->profile()->update(array_only($data, $user->profile->getTableColumns()));

       return $user->fresh();
   }
}
