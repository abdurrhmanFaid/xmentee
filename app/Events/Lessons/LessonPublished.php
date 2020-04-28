<?php

namespace App\Events\Lessons;

use App\Models\Lesson;
use Illuminate\Foundation\Events\Dispatchable;

class LessonPublished
{
    use Dispatchable;

    public $lesson, $band;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Lesson $lesson)
    {
        $this->lesson = $lesson;
        $this->band = $lesson->band();
    }
}
