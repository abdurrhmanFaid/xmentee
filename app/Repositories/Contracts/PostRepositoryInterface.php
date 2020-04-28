<?php

namespace App\Repositiroes\Contracts;

use App\Models\User;

interface PostRepositoryInterface
{
    public function store(array $data);
    public function storeBy(User $user, array $data);
    public function scopedAndPaginated($band, $scopes = []);
    public function update($post, array $data);
    public function destroy($post);
}
