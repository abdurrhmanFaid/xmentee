<?php

namespace App\Repositiroes\Eloquent;

use App\Models\Post;
use App\Models\User;
use App\Repositiroes\Contracts\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    /**
     * @var Post
     */
    protected $posts;

    /**
     * PostRepository constructor.
     * @param Post $posts
     */
    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->posts->create($data);
    }


    /**
     * @param User $user
     * @param array $data
     * @return mixed
     */
    public function storeBy(User $user, array $data)
    {
//        $user->posts()->create(array_merge($data, ['band_id' => $user->band_id]));
        return $this->store(
            array_merge(
                $data, ['user_id' => $user->id, 'band_id' => $user->band_id]
            )
        );
    }

    /**
     * @param $band
     * @param array $scopes
     * @return mixed
     */
    public function scopedAndPaginated($band, $scopes = [])
    {
        return $band->posts()->withScopes($scopes)->paginate();
    }

    /**
     * @param $post
     * @param array $data
     * @return mixed
     */
    public function update($post, $data)
    {
        $post->update($data);

        return $post->fresh();
    }

    /**
     * @param $post
     */
    public function destroy($post)
    {
        $post->rates()->delete();
        $post->comments()->delete();
        $post->delete();
    }
}
