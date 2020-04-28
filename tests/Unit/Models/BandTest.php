<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Batch;
use App\Models\Ticket;
use Illuminate\Support\Collection;
use Facades\Tests\Factories\Users\UserFactory;
use Facades\Tests\Factories\Bands\BandFactory;
use Facades\Tests\Factories\Tickets\TicketFactory;

class BandTest extends TestCase
{
    /** @test */
    function it_has_a_lot_of_tickets()
    {
        $ticket = TicketFactory::inBand($band = BandFactory::create())->create();

        $this->assertInstanceOf(Ticket::class, $band->tickets->random());

        $this->assertEquals($band->tickets->first()->id, $ticket->id);
    }

    /** @test */
    function it_has_a_lot_of_batches()
    {
        $band = BandFactory::withBatches(1)->create();

        $this->assertInstanceOf(Batch::class, $band->batches->random());
    }

    /** @test */
    function it_has_many_owner()
    {
        $band = BandFactory::create();

        $this->assertInstanceOf(Collection::class, $band->owners);
    }

    /** @test*/
    function can_check_if_a_user_is_from_its_owners()
    {
        $band = BandFactory::create();

        $user = UserFactory::create();

        $this->assertFalse($band->hasOwner($user));

        $band->owners()->attach($user->id);

        $this->assertTrue($band->fresh()->hasOwner($user));
    }
}
