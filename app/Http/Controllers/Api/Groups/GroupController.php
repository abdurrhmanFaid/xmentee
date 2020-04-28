<?php

namespace App\Http\Controllers\Api\Groups;

use App\Http\Controllers\Controller;
use App\Http\Resources\Groups\BandOwnerGroupResource;
use App\Http\Resources\Groups\BandStudentGroupResource;

class GroupController extends Controller
{
    /**
     * GroupController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $user = auth()->user();

        if($user->ownsAnyBand()) {
            return BandOwnerGroupResource::collection(
                $user->band->groups
            );
        }

        return BandStudentGroupResource::collection(
            $user->band->groups->where('batch_id', $user->batch_id)
        );
    }
}
