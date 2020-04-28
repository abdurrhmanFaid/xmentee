<?php

namespace App\Http\Controllers\Api\Batches;

use App\Http\Controllers\Controller;
use App\Models\Batch;

class BatchGroupsController extends Controller
{
    public function index(Batch $batch)
    {
        return $batch->groups;
    }
}
