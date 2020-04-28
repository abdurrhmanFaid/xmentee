<?php

namespace App\Repositiroes\Contracts;

interface BandRepositoryInterface
{
    public function all();
    public function openForReception();
    public function store($data);
    public function update($band, $data);
}
