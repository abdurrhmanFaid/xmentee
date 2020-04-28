<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Services\Profiles\UserProfileShowService;
use App\Http\Requests\Profiles\ProfileUpdateRequest;
use App\Services\Profiles\UserProfileUpdateService;

class ProfileController extends Controller
{
    protected $showService, $updateService;

    public function __construct(UserProfileShowService $showService, UserProfileUpdateService $updateService)
    {
        $this->showService = $showService;
        $this->updateService = $updateService;
    }

    /**
     * @param null $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($username = null)
    {
        $user = $this->showService->getUser($username);

        return view($this->showService->getView(), [
            'user' => $user,
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        return $this->updateService->handle($request->validated(), auth()->user());
    }
}
