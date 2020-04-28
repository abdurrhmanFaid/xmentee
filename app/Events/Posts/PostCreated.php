<?php

namespace App\Events\Posts;

use Illuminate\Foundation\Events\Dispatchable;

class PostCreated
{
    use Dispatchable;

    public $post, $creator;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($post, $creator)
    {
        $this->post = $post;
        $this->creator = $creator;
    }
}
