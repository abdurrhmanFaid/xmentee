<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];
    /**
     * @var array
     */
    protected $with = ['owner'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * @param $value
     */
    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = preg_replace(
            '/@([\w\-]+)/',
            '<a class="badge badge-sm badge-light" href="/profile/$1">$0</a>',
            $value
        );
    }

    /**
     * @param $user
     * @return bool
     */
    public function ownedBy($user)
    {
        return $user->id == $this->user_id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
