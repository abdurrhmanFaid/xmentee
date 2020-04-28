<?php

namespace App\Http\Resources\Posts;

use App\Http\Resources\Users\UserPublicResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'user_id' => $this->user_id,
            'title' => $this->title,
            'body' => $this->body,
            'owner' => new UserPublicResource($this->owner),
            'category' => [
                'name' => $this->category->name,
                'slug' => $this->category->slug,
            ],
            'type' => $this->type,
            'created_at' => $this->created_at,
            'isSubscribed' => $this->subscribedBy($request->user()),
            'rate' => $this->rate,
        ];
    }
}
