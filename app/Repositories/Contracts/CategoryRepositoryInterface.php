<?php

namespace App\Repositiroes\Contracts;

interface CategoryRepositoryInterface
{
    public function inBand($bandId);
    public function store(array $data);
    public function update($category, $data);
}
