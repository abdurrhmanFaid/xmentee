<?php

namespace App\Http\Controllers\Comments;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\StorePostCommentRequest;
use App\Services\Posts\Comments\PostCommentsStoreService;
use App\Services\Posts\Comments\PostCommentsIndexService;
use App\Services\Posts\Comments\PostCommentsUpdateService;
use App\Services\Posts\Comments\PostCommentsDestroyService;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        if(request()->ajax()) {
            return response(
                resolve(PostCommentsIndexService::class)->handle($post)
            );
        }

        abort(403);
    }

    /**
     * @param Post $post
     * @param StorePostCommentRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Post $post, StorePostCommentRequest $request)
    {
        $this->authorize('view', $post);

        $comment = resolve(PostCommentsStoreService::class)->handle(
            $post, $request->validated()
        );

        return response($comment, 201);
    }

    /**
     * @param Post $post
     * @param Comment $comment
     * @param StorePostCommentRequest $request
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Post $post, Comment $comment, StorePostCommentRequest $request)
    {
        $this->authorize('update', $comment);

        return resolve(PostCommentsUpdateService::class)->handle($comment, $request->validated());
    }


    /**
     * @param Post $post
     * @param Comment $comment
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Post $post, Comment $comment)
    {
        $this->authorize('update', $comment);

        resolve(PostCommentsDestroyService::class)->handle($post, $comment);

        return response([], 204);
    }
}
