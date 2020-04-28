<?php

namespace App\Repositiroes\Contracts;

interface LessonRepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function store($data);

    /**
     * @param $lesson
     * @param $data
     * @return mixed
     */
    public function update($lesson, $data);
}
