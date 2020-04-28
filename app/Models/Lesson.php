<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\DataViewer\Traits\Dataviewer;

class Lesson extends Model
{
    use Dataviewer;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $allowedFilters = [
        'title', 'description', 'category.name', 'batch_id', 'created_at',
        'instructor.name', 'category_id',
    ];

    /**
     * @var array
     */
    protected $orderable = [
        'created_at',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * @return mixed
     */
    public function video()
    {
        return $this->embedUrl($this->video_path);
    }

    /**
     * @param $url
     * @return string|string[]|null
     */
    protected function embedUrl($url)
    {
        return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe style='width: 100%; min-height: 500px;' src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>", $url);
    }

    /**
     * @return mixed
     */
    public function batchStudents()
    {
        return $this->batch->students;
    }

    public function band()
    {
        return $this->batch->band;
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function instructors()
    {
        return $this->belongsToMany(User::class, 'instructor_lesson', 'lesson_id', 'instructor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
