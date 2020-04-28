<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    protected $dates = ['start_date', 'end_date'];

//    public static function boot()
//    {
//        static::morphMap([
//            'groups' => 'App\Group',
//            'users' => 'App\User',
//        ]);
//    }

    public function isGivenTo($solver)
    {
        return $this->users()->where('taskable_id', $solver->id)->exists() ||
                         $this->groups()->whereIn('taskable_id', $solver->groups->pluck('id')->toArray())->exists();
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'taskable');
    }

    public function groups()
    {
        return $this->morphedByMany(Group::class, 'taskable');
    }

    public function open()
    {
        return $this->open_for_solving && now()->lt($this->end_date);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function solver()
    {
        return $this->belongsToMany(User::class, 'solver_id', 'id');
    }

    public function x($student)
    {
        $user = $this->users()->where('taskable_id', $student->id)->first();

        if($user) return $user;

        return $this->groups()->whereIn('taskable_id', $student->groups->pluck('id')->toArray())->first();
    }
}
