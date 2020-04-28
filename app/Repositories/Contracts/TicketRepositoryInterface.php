<?php

namespace App\Repositiroes\Contracts;

interface TicketRepositoryInterface
{
    public function store($data);
    public function requested($band);
    public function updateRequested($band, array $tickets, $status);
    public function updateUnrequested($ticket, $data);
}
