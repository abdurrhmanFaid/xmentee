<?php

namespace App\Http\Resources\Lessons;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentLessonResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'video' => $this->video(),
            'category' => $this->category->name,
            'playlist' => $this->playlist ? $this->playlist->name : null,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
