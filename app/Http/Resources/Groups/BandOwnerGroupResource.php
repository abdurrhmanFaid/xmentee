<?php

namespace App\Http\Resources\Groups;

use App\Http\Resources\Batches\BatchResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BandOwnerGroupResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'batch_id' => $this->batch_id,
            'members_count' => (int) $this->members_count,
            'points' => $this->points(),
        ];
    }
}
