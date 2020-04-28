<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Services\Rates\RateStoreService;
use App\Services\Rates\RateDestroyService;
use App\Http\Requests\Posts\PostRateStoreRequest;
use App\Services\Rates\RateUpdateService;

class PostRatesController extends Controller
{
    /**
     * @var RateStoreService
     */
    /**
     * @var RateStoreService|RateUpdateService
     */
    /**
     * @var RateDestroyService|RateStoreService|RateUpdateService
     */
    protected $storeService, $updateService, $destroyService;

    /**
     * PostRatesController constructor.
     * @param RateStoreService $storeService
     * @param RateDestroyService $destroyService
     * @param RateUpdateService $updateService
     */
    public function __construct(
        RateStoreService $storeService,
        RateDestroyService $destroyService,
        RateUpdateService $updateService)
    {
        $this->storeService = $storeService;
        $this->destroyService = $destroyService;
        $this->updateService = $updateService;
    }

    /**
     * @param Post $post
     * @param PostRateStoreRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Post $post, PostRateStoreRequest $request)
    {
        $this->authorize('storeRate', $post);

        $rate = $this->storeService->handle($post, $request->user(), $post->owner, $request->rate);

        return response($rate, 201);
    }

    /**
     * @param Post $post
     * @param PostRateStoreRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Post $post, PostRateStoreRequest $request)
    {
        $this->authorize('updateRate', $post);

        $rate = $this->updateService->handle($post, $request->user(), $post->owner, $request->rate);

        return response($rate, 200);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|mixed|void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Post $post)
    {
        $this->authorize('updateRate', $post);

        return $this->destroyService->handle(
            $post, auth()->user(), $post->owner
        );
    }
}
