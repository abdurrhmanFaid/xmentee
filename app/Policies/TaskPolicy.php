<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models tasks.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the models task.
     *
     * @param  \App\Models\User  $user
     * @param  \App\ModelsTask  $modelsTask
     * @return mixed
     */
    public function view(User $user, ModelsTask $modelsTask)
    {
        //
    }

    /**
     * Determine whether the user can create models tasks.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ! $user->isStudent();
    }

    /**
     * Determine whether the user can update the models task.
     *
     * @param  \App\Models\User  $user
     * @param  \App\ModelsTask  $modelsTask
     * @return mixed
     */
    public function update(User $user, ModelsTask $modelsTask)
    {
        //
    }

    /**
     * Determine whether the user can delete the models task.
     *
     * @param  \App\Models\User  $user
     * @param  \App\ModelsTask  $modelsTask
     * @return mixed
     */
    public function delete(User $user, ModelsTask $modelsTask)
    {
        //
    }

    /**
     * Determine whether the user can restore the models task.
     *
     * @param  \App\Models\User  $user
     * @param  \App\ModelsTask  $modelsTask
     * @return mixed
     */
    public function restore(User $user, ModelsTask $modelsTask)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the models task.
     *
     * @param  \App\Models\User  $user
     * @param  \App\ModelsTask  $modelsTask
     * @return mixed
     */
    public function forceDelete(User $user, ModelsTask $modelsTask)
    {
        //
    }

    public function solve(User $user, $task)
    {
        return $task->isGivenTo($user) || $user->band->hasOwner($user);
    }
}
