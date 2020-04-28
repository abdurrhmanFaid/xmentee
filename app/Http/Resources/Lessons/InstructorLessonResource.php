<?php

namespace App\Http\Resources\Lessons;

class InstructorLessonResource extends StudentLessonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);

//        return array_merge(parent::toArray($request), [
//            'batch' => $this->batch,
//        ]);
    }
}
