<?php

namespace App\Services\Lessons;

use App\Events\Lessons\LessonPublished;
use App\Repositiroes\Contracts\LessonRepositoryInterface;

class LessonStoreService
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
     * @param $request
     * @return mixed
     */
    public function handle($request)
    {
        $lesson = $this->lessons->store(array_except($request, ['instructors']));

        $lesson->instructors()->attach($request['instructors']);

        if(notificationOpen('lessons')) {
            event(new LessonPublished($lesson));
        }

        return $lesson;
    }
}
