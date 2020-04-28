<?php

namespace App\Repositiroes\Eloquent;

use App\Models\Lesson;
use App\Repositiroes\Contracts\LessonRepositoryInterface;

class LessonRepository implements LessonRepositoryInterface
{
    /**
     * @var Lesson
     */
    protected $lessons;

    /**
     * LessonRepository constructor.
     * @param Lesson $lessons
     */
    public function __construct(Lesson $lessons)
    {
        $this->lessons = $lessons;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->lessons->create($data);
    }

    /**
     * @param $lesson
     * @param $data
     * @return mixed
     */
    public function update($lesson, $data)
    {
        $lesson->update($data);

        return $lesson;
    }
}
