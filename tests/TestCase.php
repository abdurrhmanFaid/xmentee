<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    /**
     * @param $user
     * @return $this
     */
    public function signIn($user = null)
    {
        $user = $user ?: factory(User::class)->create();

        $this->actingAs($user);

        return $this;
    }
}
