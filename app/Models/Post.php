<?php

namespace App\Models;

use App\Scoping\Scoper;
use App\Traits\Rateable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use Rateable;
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $with = ['owner', 'category'];

    /**
     *
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = uniqid();
        });
    }

    /**
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }

    /**
     * @param Builder $builder
     * @param array $scopes
     * @return Builder
     */
    public function scopeWithScopes(Builder $builder, array $scopes = [])
    {
        return (new Scoper(request()))->apply($builder, $scopes);
    }

    /**
     * @param $user
     * @return bool
     */
    public function ownedBy($user)
    {
        return $this->user_id == $user->id;
    }
    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(PostSubscription::class);
    }

    /**
     * @return mixed
     */
    public function band()
    {
        return $this->category->band;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
