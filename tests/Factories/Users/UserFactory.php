<?php

namespace Tests\Factories\Users;

use App\Models\User;

class UserFactory
{
    /**
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = [])
    {
        $user = factory(User::class)->create($attributes);

        return $user;
    }

}
