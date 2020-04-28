<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Band
 * @package App\Models
 */
class Band extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];
    /**
     * @var array
     */
    protected $dates = ['applying_deadline'];

    protected static function boot()
    {
        parent::boot();

        $events = ['creating', 'updating'];

        foreach ($events as $event) {
            static::$event(function ($band) {
                $band->slug = \Str::slug($band->name);
            });
        }
    }
    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * @return bool
     */
    public function linkedToMessagingService()
    {
        return (bool)$this->messaging_group_id;
    }

    /**
     * @return array
     */
    public function messaging()
    {
        return [
            'groupId' => $this->messaging_group_id,
            'locale'  => $this->notificationsLocale()
        ];
    }

    /**
     * @return mixed
     */
    public function defaultPrice()
    {
        return $this->default_price;
    }

    /**
     * @return mixed
     */
    public function getMessagingGroupId()
    {
        return $this->messaging_group_id;
    }

    /**
     * @return mixed
     */
    public function notificationsLocale()
    {
        return $this->notifications_locale;
    }

    /**
     * Check if the passed user is from band owners
     * @param $user
     * @return mixed
     */
    public function hasOwner($user)
    {
        return $this->owners->pluck('id')->contains($user->id);
    }

    /**
     * @return mixed
     */
    public function instructorTicket()
    {
        return $this->tickets->where('type', 'instructor')->first();
    }

    /**
     * Unrequested ticket for students
     * @return mixed
     */
    public function studentTicket()
    {
        return $this->tickets->where('type', 'student')->where('distributed_by_band', true)->first();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOpenForReception($query)
    {
        return $query->where('student_reception_open', true);
    }

    /**
     * @return \Illuminate\Database\Eloquentsl\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return mixed
     */
    public function students()
    {
        return $this->users->where('batch_id', '!==', null);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function owners()
    {
        return $this->belongsToMany(User::class, 'band_owner', 'band_id', 'owner_id')
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function groups()
    {
        return $this->hasManyThrough(Group::class, Batch::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function posts()
    {
        return $this->hasManyThrough(Post::class, Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function lessons()
    {
        return Lesson::whereIn('batch_id', $this->batches->pluck('id')->toArray());
//        return $this->hasManyThrough(Lesson::class, Batch::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Batch::class);
    }
}
