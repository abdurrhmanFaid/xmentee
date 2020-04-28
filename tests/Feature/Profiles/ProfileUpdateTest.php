<?php

namespace Tests\Feature\Profiles;

use Tests\TestCase;

class ProfileUpdateTest extends TestCase
{
    /** @test */
    function un_authtenticated_user_cannot_update_profile()
    {
        $this->patchJson(route('profiles.update'))
            ->assertStatus(401);
    }


    /** @test */
    function authenticated_user_can_update_his_profile()
    {
        $this->signIn();

        $this->patchJson(route('profiles.update'), [
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456',
            'username' => 'johndoe',
        ])->assertStatus(200);

        $this->assertEquals('johndoe', auth()->user()->username);

    }
}
