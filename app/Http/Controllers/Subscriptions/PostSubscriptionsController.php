<?php

namespace App\Http\Controllers\Subscriptions;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Services\Posts\Subscriptions\PostSubscriptionStoreService;
use App\Services\Posts\Subscriptions\PostSubscriptionDeleteService;

class PostSubscriptionsController extends Controller
{
    /**
     * @var PostSubscriptionStoreService
     */
    /**
     * @var PostSubscriptionDeleteService|PostSubscriptionStoreService
     */
    protected $storeService, $deleteService;

    /**
     * PostSubscriptionsController constructor.
     * @param PostSubscriptionStoreService $storeService
     * @param PostSubscriptionDeleteService $deleteService
     */
    public function __construct(
        PostSubscriptionStoreService $storeService,
        PostSubscriptionDeleteService $deleteService)
    {
        $this->storeService = $storeService;
        $this->deleteService = $deleteService;
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Post $post)
    {
        $this->authorize('view', $post);

        return $this->storeService->handle($post, auth()->user());
    }


    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Post $post)
    {
        $this->authorize('view', $post);

        return $this->deleteService->handle($post, auth()->user());
    }
}
