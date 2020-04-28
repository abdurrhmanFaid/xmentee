<?php

namespace Tests\Unit\Models;

use App\Models\Band;
use Facades\Tests\Factories\Tickets\TicketFactory;
use Tests\TestCase;

class TicketTest extends TestCase
{
    /** @test */
    function it_belongs_to_a_band()
    {
        $ticket = TicketFactory::create();

        $this->assertInstanceOf(Band::class, $ticket->band);
    }

    /** @test */
    function can_check_if_ticket_is_approved()
    {
        $ticket = TicketFactory::create(['status' => 'approved']);

        $this->assertTrue($ticket->isApproved());
    }
}
