<?php

namespace Tests\Feature\Tickets;

use Tests\TestCase;
use Facades\Tests\Factories\Bands\BandFactory;
use Facades\Tests\Factories\Tickets\TicketFactory;

class TicketRequestTest extends TestCase
{
    /** @test */
    function authenticated_user_cannot_see_request_ticket_page()
    {
        $this->signIn();

        $this->get(route('tickets.request'))->assertRedirect(route('home'));
    }
    /** @test */
    function un_authenticated_user_can_view_request_ticket_page()
    {
        $this->get(route('tickets.request'))
            ->assertStatus(200)
            ->assertViewIs('tickets.request');
    }

    /** @test */
    function it_requries_an_owner_name()
    {
        $this->endpoint()->assertJsonValidationErrors(['owner_name']);
    }

    /** @test */
    function it_requries_a_password()
    {
        $this->endpoint()->assertJsonValidationErrors(['password']);
    }

    /** @test */
    function it_requries_a_band_id()
    {
        $this->endpoint()->assertJsonValidationErrors(['band_id']);
    }

    /** @test */
    function it_fails_if_band_is_closed_reception()
    {
        $band = BandFactory::create(['student_reception_open' => false]);
        $ticket = TicketFactory::inBand($band)->make();

        $this->endpoint($ticket)->assertJsonValidationErrors(['band_id']);
    }

    /** @test */
    function it_attached_to_a_band_while_requesting()
    {
        $ticket = TicketFactory::inBand($band = BandFactory::create(['student_reception_open' => true]))->make();

        $ticket = $this->endpoint($ticket);

        $this->assertTrue($band->tickets->pluck('code')->contains($ticket->json()['code']));
    }

    function endpoint($ticket = null)
    {
        return $this->postJson(route('tickets.request', $ticket ? $ticket->toArray() : []));
    }
}
