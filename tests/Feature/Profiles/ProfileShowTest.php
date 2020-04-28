<?php

namespace Tests\Feature\Profiles;

use Facades\Tests\Factories\Users\UserFactory;
use Tests\TestCase;

class ProfileShowTest extends TestCase
{
    /** @test */
    function un_authenticated_user_cannot_see_profile_page()
    {
        $this->get(route('profiles.show'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    function a_user_can_see_his_profile_page()
    {
        $this->signIn();
        $this->get(route('profiles.show'))
            ->assertStatus(200)
            ->assertViewIs('profiles.show');
    }

    /** @test */
    function a_user_can_view_others_profiles()
    {
        $user = UserFactory::create();

        $this->signIn();

        $this->get(route('profiles.show', $user->username))
            ->assertStatus(200)
            ->assertViewIs('profiles.show');
    }

    /** @test */
    function it_fails_if_passed_user_is_invalid()
    {
        $this->signIn();

        $this->get(route('profiles.show', 'invalidUsername'))
            ->assertStatus(404);
    }

    /** @test */
    function it_redirect_user_if_the_passed_user_is_same_logged_in_user()
    {
        $this->signIn();

        $this->get(route('profiles.show', auth()->user()->username))
            ->assertRedirect(route('profiles.show'));
    }
}
