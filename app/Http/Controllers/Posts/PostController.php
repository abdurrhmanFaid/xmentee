<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use App\Services\Posts\PostDestroyService;
use App\Services\Posts\PostUpdateService;
use App\Http\Controllers\Controller;
use App\Services\Posts\PostIndexService;
use App\Services\Posts\PostStoreService;
use App\Http\Requests\Posts\PostStoreRequest;

class PostController extends Controller
{
    /**
     * @var PostStoreService
     */
    protected $storeService;

    /**
     * PostController constructor.
     * @param PostStoreService $storeService
     */
    public function __construct(PostStoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!request()->ajax()) {
            return view('posts.index');
        }

        return resolve(PostIndexService::class)->handle(request()->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = $this->storeService
            ->handle($request->validated(), auth()->user());

        return response([
            'redirectUrl' => route('posts.show', $post->slug)
        ], 201);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);

        $post->load('rates');

        return view('posts.show', [
            'post' => $post,
        ]);
    }


    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', [
            'post' => (object) [
                'id' => $post->id,
                'title' => $post->title,
                'slug' => $post->slug,
                'body' => $post->body,
                'category_id' => $post->category_id,
                'type' => $post->type,
            ]
        ]);
    }

    /**
     * @param Post $post
     * @param PostStoreRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Post $post, PostStoreRequest $request)
    {
        $this->authorize('update', $post);

        resolve(PostUpdateService::class)->handle($post, $request->validated());

        return response([
            'redirectUrl' => route('posts.show', $post->slug)
        ], 200);
    }


    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

        resolve(PostDestroyService::class)->handle($post);

        return response([
            'message' => __('posts.deleted'),
            'redirectUrl' => route('posts.index'),
        ]);
    }
}
