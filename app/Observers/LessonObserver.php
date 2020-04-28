<?php

namespace App\Observers;

use App\Models\Lesson;
use Illuminate\Support\Str;
use App\Caching\Lessons\LessonCache;

class LessonObserver
{
    protected $lessons;

    public function __construct(LessonCache $lessons)
    {
        $this->lessons = $lessons;
    }

    /**
     * @param Lesson $lesson
     */
    public function creating(Lesson $lesson)
    {
        $lesson->slug = Str::slug($lesson->title) . time();
    }

    /**
     * Handle the lesson "created" event.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return void
     */
    public function created(Lesson $lesson)
    {
        $this->lessons->increment($lesson);
    }

    /**
     * Handle the lesson "updated" event.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return void
     */
    public function updated(Lesson $lesson)
    {
        $lesson->slug = Str::slug($lesson->name) . time();
    }

    /**
     * Handle the lesson "deleted" event.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return void
     */
    public function deleted(Lesson $lesson)
    {
        $this->lessons->decrement($lesson);
    }
}
