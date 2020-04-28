<?php

namespace App\Http\Resources\Users;

use App\Http\Resources\Groups\BandStudentGroupResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPublicResource extends JsonResource
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
            'username' => $this->username,
            'formattedUsername' => $this->formattedUsername,
            'gender' => $this->gender,
            'formattedImage' => $this->formattedImage,
            'points' => $this->getPoints(),
            'profile' => new UserProfileResource($this->whenLoaded('profile')),
//            'group' => new BandStudentGroupResource($this->group),
        ];
    }
}
