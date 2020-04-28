<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description', 'description', 'band_id',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * @param $query
     * @param $bandId
     * @return mixed
     */
    public function scopeInBand($query, $bandId)
    {
        return $query->where('band_id', $bandId);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
