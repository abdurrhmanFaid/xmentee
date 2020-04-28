<?php

namespace App\Support\Points\Contracts;

interface PointHandlerInterface
{
    public function handle($event, $props = null);
    public function getPoints();
}
