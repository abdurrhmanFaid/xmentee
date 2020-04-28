<?php

namespace App\Services\Bands\Contracts;

interface MessagingInterface
{
    public function send(array $props);
    public function getGroupId();
    public function validGroup($groupName, $identifierMsg);
}
