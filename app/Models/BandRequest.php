<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Support\DataViewer\Traits\DataViewer;

class BandRequest extends Model
{
    use Dataviewer;

    protected $table = 'band_requests';

    protected $guarded = [];

    protected $allowedFilters = [
        'created_at', 'owner_email', 'band_name', 'members_count', 'approved'
    ];
    protected $orderable = [
        'created_at', 'members_count', 'approved'
    ];

    /**
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }
}
