<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];

    /**
     * @return mixed
     */
    public function points()
    {
        return $this->members->sum('points');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    /**
     * @return mixed
     */
    public function band()
    {
        return $this->batch->band;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany(User::class, 'group_member', 'group_id', 'member_id');
    }

    public function tasks()
    {
        return $this->morphToMany(Task::class, 'taskable');
    }
}
