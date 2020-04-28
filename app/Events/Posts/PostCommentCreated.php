<?php

namespace App\Events\Posts;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostCommentCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post, $comment;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($post, $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
    }
}
