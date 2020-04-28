<?php

namespace App\Http\Controllers\Api\Batches;

use App\Models\Batch;
use App\Http\Controllers\Controller;
use App\Http\Resources\Users\UserPublicResource;

class BatchStudentsController extends Controller
{
    public function index($batchId)
    {
        $batch = Batch::find($batchId);

        $this->authorize('view', $batch);

        return UserPublicResource::collection($batch->students->load('profile'));
    }
}
