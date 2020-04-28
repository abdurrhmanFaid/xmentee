<?php

namespace App\Models;

use App\Support\DataViewer\Traits\Dataviewer;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use Dataviewer;

    protected $guarded = [];

    protected $allowedFilters = [
        'owner_name', 'code', 'status', 'created_at',
    ];

    protected $orderable = [
        'owner_name', 'code', 'status', 'created_at',
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNotDistributedByBand($query)
    {
        return $query->where('distributed_by_band', false);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeForStudents($query)
    {
        return $query->where('type', 'student');
    }

    /**
     * @return mixed
     */
    public function isApproved()
    {
        return $this->status == 'approved';
    }

    public function unlimited()
    {
        return $this->unlimited_usage;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}
