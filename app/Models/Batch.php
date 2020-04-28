<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];
    /**
     * @var array
     */
    protected $withCount = ['students'];

    /**
     *
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($batch) {
            $batch->slug = $batch->band->slug . '-' . \Str::slug($batch->name);
        });
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
    public function isFree()
    {
        return !$this->paid;
    }

    /**
     * @return mixed
     */
    public function defaultPaymentValue()
    {
        return $this->default_payment_value;
    }

    public function createPayment(array $data)
    {
        return $this->payments()->create($data);
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
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(User::class);
    }
}
