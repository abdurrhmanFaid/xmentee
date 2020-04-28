<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostSubscription extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];
    protected $with = ['user'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
