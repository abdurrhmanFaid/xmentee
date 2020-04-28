<?php

namespace App\Http\Controllers\Groups;

use App\Models\Group;
use App\Http\Controllers\Controller;
use App\Services\Groups\GroupStoreService;
use App\Http\Requests\Groups\GroupStoreRequest;
use App\Http\Requests\Groups\GroupUpdateRequest;
use App\Http\Resources\Groups\BandOwnerGroupResource;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('groups.index');
    }


    /**
     * @param GroupStoreRequest $request
     * @return BandOwnerGroupResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(GroupStoreRequest $request)
    {
        $this->authorize('view', $request->user()->band);

        return new BandOwnerGroupResource(
            resolve(GroupStoreService::class)->handle($request->validated())
        );
    }


    /**
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Acces2s\AuthorizationException
     */
    public function show(Group $group)
    {
        $this->authorize('view', $group);

        return view('groups.show', compact('group'));
    }

    /**
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Group $group)
    {
        $this->authorize('update', $group);

        return view('groups.edit', compact('group'));
    }


    /**
     * @param Group $group
     * @param GroupUpdateRequest $request
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Group $group, GroupUpdateRequest $request)
    {
        $this->authorize('update', $group);

        $group->update($request->validated());

        return back()->withSuccess(__('groups.updated'));
    }


    /**
     * @param Group $group
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Group $group)
    {
        $this->authorize('delete', $group);

        $group->delete();

        return redirect(route('groups.index'))
            ->withSuccess(__('groups.deleted'));
    }
}
