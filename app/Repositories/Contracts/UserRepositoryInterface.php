<?php

namespace App\Repositiroes\Contracts;

interface UserRepositoryInterface
{
    public function findByUsername($username);
    public function update($user, $request);
    public function byId($ids);
}
