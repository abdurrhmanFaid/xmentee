<?php

namespace App\Http\Controllers\Lessons;

use App\Models\Lesson;
use App\Http\Controllers\Controller;
use App\Services\Lessons\LessonStoreService;
use App\Http\Requests\Lessons\LessonStoreRequest;
use App\Services\Lessons\LessonUpdateService;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lessons.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('view', auth()->user()->band);

        return view('lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonStoreRequest $request)
    {
        $lesson = resolve(LessonStoreService::class)->handle($request->validated());

        return redirect()->route('lessons.show', $lesson->slug);
    }

    /**
     * @param Lesson $lesson
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Lesson $lesson)
    {
        $this->authorize('view', $lesson);

        return view('lessons.show', compact('lesson'));
    }

    /**
     * @param Lesson $lesson
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Lesson $lesson)
    {
        $this->authorize('update', $lesson);

        return view('lessons.edit', compact('lesson'));
    }

    /**
     * @param Lesson $lesson
     * @param LessonStoreRequest $request
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Lesson $lesson, LessonStoreRequest $request)
    {
        $this->authorize('update', $lesson);

        $lesson = resolve(LessonUpdateService::class)->handle($lesson, $request->validated());

        return redirect(route('lessons.show', $lesson->slug))
            ->withSuccess(__('lessons.updated'));
    }

    /**
     * @param Lesson $lesson
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Lesson $lesson)
    {
        $this->authorize('update', $lesson);

        $lesson->delete();

        return redirect(route('lessons.index'))->withSuccess(__('lessons.deleted'));
    }
}
