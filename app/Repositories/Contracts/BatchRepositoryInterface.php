<?php

namespace App\Repositiroes\Contracts;

interface BatchRepositoryInterface
{
    public function store($band, $data);
}
