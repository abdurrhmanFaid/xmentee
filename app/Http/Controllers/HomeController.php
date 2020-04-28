<?php

namespace App\Http\Controllers;

use App\Caching\Categories\CategoryCache;
use App\Caching\Lessons\LessonCache;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function __invoke()
    {
        if(!auth()->check()) return view('static.' . currentLocale() . '.welcome');

        return view('home', [
            'lessonsCount' => resolve(LessonCache::class)->count(auth()->user()),
            'categoriesCount' => count(resolve(CategoryCache::class)->inBand(auth()->user()->band_id)),
            'membersCount' => auth()->user()->band->members_count,
        ]);
    }
}
