<?php

namespace App\Policies;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Lesson $lesson
     * @return bool
     */
    public function view(User $user, Lesson $lesson)
    {
        return $user->batch_id == $lesson->batch_id || $user->band->hasOwner($user);
        // || $lesson->band()->hasOwner($user)
    }

    /**
     * @param User $user
     * @param Lesson $lesson
     * @return mixed
     */
    public function update(User $user, Lesson $lesson)
    {
        return $user->band->hasOwner($user);
    }
}
