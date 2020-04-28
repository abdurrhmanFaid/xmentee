<?php

namespace App\Http\Controllers\Api\Batches;

use App\Http\Controllers\Controller;
use App\Http\Resources\Batches\BatchResource;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view', $band = auth()->user()->band);

        return BatchResource::collection($band->batches);
    }
}
