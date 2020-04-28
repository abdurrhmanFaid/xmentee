<?php

namespace App\Http\Resources\Bands;

use Illuminate\Http\Resources\Json\JsonResource;

class BandRequestResource extends JsonResource
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
            'band_name' => $this->band_name,
            'owner_email' => $this->owner_email,
            'members_count' => $this->members_count,
            'created_at' => $this->created_at,
            'approved' => $this->approved,
        ];
    }
}
