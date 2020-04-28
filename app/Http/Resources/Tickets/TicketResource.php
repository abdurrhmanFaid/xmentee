<?php

namespace App\Http\Resources\Tickets;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'owner_name' => $this->owner_name,
            'code' => $this->code,
            'status' => $this->status,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
