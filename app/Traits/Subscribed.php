<?php

namespace App\Traits;

use App\Models\PostSubscription;

trait Subscribed
{
    /**
     * @return bool
     */
    public function hasSubscribedTo($post)
    {
        return $this->subscriptions()->where('post_id', $post->id)->exists();
    }

    public function subscribe($post)
    {
        $this->subscriptions()->create([
            'post_id' => $post->id,
        ]);
    }

    public function unsubscribe($post)
    {
        $this->subscriptions()->where('post_id', $post->id)->delete();
    }

    /**
     * @param $post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscriptions()
    {
        return $this->hasMany(PostSubscription::class);
    }
}
