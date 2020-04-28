<?php

namespace App\Services\Lessons;

use App\Repositiroes\Contracts\LessonRepositoryInterface;

class LessonUpdateService
{
    /**
     * @var LessonRepositoryInterface
     */
    protected $lessons;

    /**
     * LessonStoreService constructor.
     * @param LessonRepositoryInterface $lessons
     */
    public function __construct(LessonRepositoryInterface $lessons)
    {
        $this->lessons = $lessons;
    }

    /**
     * @param $lesson
     * @param $request
     * @return mixed
     */
    public function handle($lesson, $request)
    {
        $lesson = $this->lessons->update($lesson, array_except($request, ['instructors']));

        $lesson->instructors()->sync($request['instructors']);

        return $lesson;
    }
}
