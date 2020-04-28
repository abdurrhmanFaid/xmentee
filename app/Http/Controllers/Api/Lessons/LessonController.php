<?php

namespace App\Http\Controllers\Api\Lessons;

use App\Http\Controllers\Controller;
use App\Http\Resources\Lessons\StudentLessonResource;
use App\Http\Resources\Lessons\InstructorLessonResource;


class LessonController extends Controller
{
    /**
     * LessonController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        if(($user = auth()->user())->batch_id) {
            return StudentLessonResource::collection(
                $user->batch->lessons()->filter());
        }

        return InstructorLessonResource::collection(
            $user->band->lessons()->with('batch')->filter()
        );
    }
}
