<?php

namespace App\Caching\Lessons;

use App\Repositiroes\Contracts\LessonRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class LessonCache
{
    /**
     * LessonCache constructor.
     * @param LessonRepositoryInterface $lessons
     */
    public function __construct(LessonRepositoryInterface $lessons)
    {
        $this->lessons = $lessons;
    }

    /**
     * @param $lesson
     */
    public function increment($lesson)
    {
        Cache::increment("batches.{$lesson->batch_id}.lessons");
        Cache::increment("bands.{$lesson->band()->id}.lessons");
    }

    /**
     * @param $lesson
     */
    public function decrement($lesson)
    {
        Cache::decrement("batches.{$lesson->batch_id}.lessons");
        Cache::decrement("bands.{$lesson->band()->id}.lessons");
    }

    /**
     * @param $user
     * @return mixed
     */
    public function count($user)
    {
        if($user->batch_id) {
            return Cache::get("batches.{$user->batch_id}.lessons", 0);
        }

        return Cache::get("bands.{$user->band_id}.lessons", 0);
    }

}
