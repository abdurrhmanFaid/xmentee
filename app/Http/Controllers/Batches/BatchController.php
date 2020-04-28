<?php

namespace App\Http\Controllers\Batches;

use App\Models\Batch;
use App\Services\Batches\BatchStoreService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Batches\BatchStoreRequest;

class BatchController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', new Batch());

        return view('batches.index', [
            'batches' => auth()->user()->band->batches,
        ]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', new Batch());

        return view('batches.create');
    }


    /**
     * @param BatchStoreRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(BatchStoreRequest $request)
    {
        $this->authorize('create', new Batch());

        resolve(BatchStoreService::class)
            ->handle($request->user()->band, $request->validated());

        return response([
            'redirectUrl' => route('batches.index'),
            'message' => __('batches.created')
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
