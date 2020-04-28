<?php

namespace App\Traits;

use App\Models\Rate;

trait Rateable
{
    /**
     * @return array
     */
    public function getRateAttribute()
    {
        $count = $this->rates->count();

        $currentUserRate = $this->rates->where('user_id', auth()->user()->id)->first();
        return [
            'average' => $this->rateAverage($count),
            'raters' => $count,
            'currentUserRate' => $currentUserRate ? $currentUserRate->rate : 0,
        ];
    }

    /**
     * @param $ratersCount
     * @return float|string
     */
    public function rateAverage($ratersCount)
    {
        if ($ratersCount) {
            return round($this->rates->sum('rate') / $ratersCount, 2);
        }

        return __('posts.unrated');
    }

    /**
     * @param $user
     * @return bool
     */
    public function ratedBy($user)
    {
        return $this->rates()->where('user_id', $user->id)->exists();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function rates()
    {
        return $this->morphMany(Rate::class, 'subject');
    }
}
