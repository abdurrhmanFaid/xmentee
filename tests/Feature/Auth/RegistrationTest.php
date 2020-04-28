<?php

namespace Tests\Feature\Auth;

use App\Models\Band;
use App\Models\Ticket;
use Tests\TestCase;
use App\Models\User;
use Facades\Tests\Factories\Bands\BandFactory;
use Facades\Tests\Factories\Tickets\TicketFactory;

class RegistrationTest extends TestCase
{
    /** @test */
    function it_requires_a_ticket_code_and_ticket_password()
    {
        $this->post(route('register'), [])
        ->assertSessionHasErrors(['ticket_code', 'ticket_secret']);
    }

    /** @test */
    function it_fails_if_ticket_is_not_approved()
    {
        $ticket = TicketFactory::attachedToValidBand()->create([
            'status' => 'reviewing',
        ]);

        $this->post(route('register'), $this->generateUser($ticket))
            ->assertRedirect()
            ->assertSessionHas('invalidTicket');
    }

    /** @test */
    function a_user_can_register()
    {
        $this->withoutExceptionHandling();

        $this->post(route('register'), $this->generateUser())
            ->assertStatus(302);

        $this->assertCount(1, User::all());
    }

    /** @test */
    function it_assign_a_user_to_a_band_after_registration()
    {
        $ticket = TicketFactory::attachedToValidBand()->create(['status' => 'approved']);

        $this->post(route('register'), $this->generateUser($ticket));

        $this->assertEquals($ticket->band->id, User::first()->band_id);
    }

    /** @test */
    function it_assign_a_user_as_band_owner_if_ticket_type_is_for_instructor()
    {
        $ticket = TicketFactory::attachedToValidBand()->create(['status' => 'approved', 'type' => 'instructor']);

        $this->post(route('register'), $this->generateUser($ticket));

        $this->assertTrue($ticket->band->hasOwner(User::first()));
    }

    /** @test */
    function it_will_not_assign_a_user_as_band_owner_if_ticket_type_is_for_student()
    {
        $ticket = TicketFactory::attachedToValidBand()->create(['status' => 'approved', 'type' => 'student']);

        $this->post(route('register'), $this->generateUser($ticket));

        $this->assertFalse($ticket->band->hasOwner(User::first()));
    }

    /** @test */
    function ticket_will_be_removed_if_it_was_not_distributed_by_a_band()
    {
        $ticket = TicketFactory::attachedToValidBand()->create([
            'status' => 'approved',
            'type' => 'student',
            'distributed_by_band' => false,
        ]);

        $this->post(route('register'), $this->generateUser($ticket));

        $this->assertEmpty(Ticket::all());
    }

    /** @test */
    function ticket_will_not_changed_if_its_type_is_for_instructor()
    {
        $ticket = TicketFactory::attachedToValidBand()->create([
            'status' => 'approved',
            'type' => 'instructor',
            'distributed_by_band' => false,
        ]);

        $this->post(route('register'), $this->generateUser($ticket));

        $this->assertNotEmpty(Ticket::all());
    }

    /** @test */
    function ticket_usage_limitation_will_be_decrement_if_ticket_has_limited_usage()
    {
        $ticket = TicketFactory::attachedToValidBand()->create([
            'status' => 'approved',
            'type' => 'student',
            'distributed_by_band' => true,
            'usage_limit' => 100,
            'unlimited_usage' => false,
        ]);

        $this->post(route('register'), $this->generateUser($ticket));

        $this->assertEquals(99, $ticket->fresh()->usage_limit);
    }

    /** @test */
    function ticket_will_be_removed_if_the_usage_limit_is_zero()
    {
        $ticket = TicketFactory::attachedToValidBand()->create([
            'status' => 'approved',
            'type' => 'student',
            'distributed_by_band' => true,
            'usage_limit' => 1,
            'unlimited_usage' => false,
        ]);

        $this->post(route('register'), $this->generateUser($ticket));

        $this->assertEquals(0, $ticket->fresh()->usage_limit);
    }

    /** @test */
    function it_fails_if_ticket_reached_the_max_usage_limit()
    {
        $ticket = TicketFactory::attachedToValidBand()->create([
            'status' => 'approved',
            'type' => 'instructor',
            'distributed_by_band' => true,
            'usage_limit' => 0,
            'unlimited_usage' => false,
        ]);

        $this->post(route('register'), $this->generateUser($ticket))
            ->assertStatus(302)
            ->assertSessionHas(['invalidTicket']);

        $this->assertEquals(0, $ticket->fresh()->usage_limit);
    }

    /** @test */
    function ticket_will_not_be_removed_after_registration_if_its_type_is_for_instructor()
    {
        $ticket = TicketFactory::attachedToValidBand()->create(['status' => 'approved', 'type' => 'instructor']);

        $this->post(route('register'), $this->generateUser($ticket));

        $this->assertNotNull(Ticket::all());
    }

    /** @test */
    function it_decrease_the_ticket_usage_limitation_if_it()
    {
        $ticket = TicketFactory::attachedToValidBand()->create(['status' => 'approved', 'type' => 'instructor']);

        $this->post(route('register'), $this->generateUser($ticket));

        $this->assertNotNull(Ticket::all());
    }

    /** @test */
    function it_update_band_members_count_after_registration()
    {
        $this->post(route('register'), $this->generateUser());

        $this->assertEquals(1, auth()->user()->band->members_count);
    }

    function generateUser($ticket = null)
    {
        $ticket = $ticket ?: TicketFactory::attachedToValidBand()->create(['status' => 'approved']);

        return [
            'ticket_code' => $ticket->code,
            'ticket_secret' => $ticket->password,
            'email' => 'johndoe@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ];
    }
}
