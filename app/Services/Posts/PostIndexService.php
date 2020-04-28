<?php

namespace App\Services\Posts;

use Illuminate\Support\Str;
use App\Scoping\Scopes\Posts\ByScope;
use App\Scoping\Scopes\Posts\TypeScope;
use App\Scoping\Scopes\Posts\LatestScope;
use App\Scoping\Scopes\Posts\CategoryScope;
use App\Scoping\Scopes\Posts\UnansweredScope;
use App\Scoping\Scopes\Posts\MostViewedScope;
use App\Repositiroes\Contracts\PostRepositoryInterface;

class PostIndexService
{
    /**
     * @var PostRepositoryInterface
     */
    protected $posts;

    /**
     * PostIndexService constructor.
     * @param PostRepositoryInterface $posts
     */
    public function __construct(PostRepositoryInterface $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function handle($request)
    {
        $items = ['categories', 'types'];

        foreach ($items as $item) {
            if (!isset($request[$item]) || is_null($request[$item])) {
                $request[$item] = [];
            } else {
                $request[$item] = explode(',', $request[$item]);
            }
        }

        request()->merge($request);

        $paginator = $this->posts->scopedAndPaginated(
            auth()->user()->band, $this->scopes()
        );

        $this->transform($paginator);

        return $paginator;
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function transform(&$data)
    {
        return $data->transform(function ($post) {
            return [
                'title' => $post->title,
                'body' => Str::limit(strip_tags($post->body), 300),
                'created_at' => $post->created_at,
                'id' => $post->id,
                'slug' => $post->slug,
                'type' => $post->type,
                'category' => [
                    'id' => $post->category->id,
                    'name' => $post->category->name,
                ],
                'owner' => [
                    'name' => $post->owner->name,
                    'points' => $post->owner->points,
                    'formattedImage' => $post->owner->formattedImage(),
                    'formattedUsername' => $post->owner->formattedUsername,
                    'username' => $post->owner->username,
                ],
            ];
        });
    }
    /**
     * @return array
     */
    protected function scopes()
    {
        return [
            'categories' => new CategoryScope(),
            'types' => new TypeScope(),
            'by' => new ByScope(),
            'most-viewed' => new MostViewedScope(),
            'latest' => new LatestScope(),
            'unanswered' => new UnansweredScope(),
        ];
    }
}
