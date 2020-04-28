<?php

namespace Tests\Unit\Models;

use App\Models\Band;
use Tests\TestCase;
use Facades\Tests\Factories\Batches\BatchFactory;

class BatchTest extends TestCase
{
    /** @test */
    function it_belongs_to_a_band()
    {
        $this->assertInstanceOf(Band::class, BatchFactory::create()->band);
    }
}
