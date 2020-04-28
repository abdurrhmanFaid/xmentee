<?php

namespace App\Http\Resources\Groups;

use Illuminate\Http\Resources\Json\JsonResource;

class BandStudentGroupResource extends JsonResource
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
            'members_count' => $this->members_count,
            'points' => $this->points()
        ];
    }
}
