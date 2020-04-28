<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $with = ['students', 'batch'];

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($payment) {
            $payment->slug = uniqid();
        });
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * @return array
     */
    public function getTableColumns()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function studentsWhoNotPaid()
    {
        return collect($this->students->where('pivot.paid_at', null)->all());
    }

    public function studentsWhoNotPaidCount()
    {
        return count(array_filter($this->students->pluck('pivot.paid_at')->toArray(), function ($paid) {
            return $paid === null;
        }));
    }

    /**
     * @return bool
     */
    public function hasCompleted()
    {
        return in_array(null, $this->students->pluck('pivot.paid_at')->toArray());
    }

    public function formattedTotal()
    {
        return number_format($this->total(), 2) . ' ' .  $this->currency;
    }

    /**
     * @return float|int
     */
    public function total()
    {
        return array_sum($this->students->pluck('pivot.value')->toArray());
    }

    /**
     * @param $student
     */
    public function assignTo($student)
    {
        $this->students()->attach($student['id'], [
            'paid_at' => $student['payment']['paid'] ? $student['payment']['paid_at'] : null,
            'value' => $student['payment']['value'],
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(
            User::class, 'payment_student', 'payment_id', 'student_id'
        )->withPivot(['value', 'paid_at', 'created_at']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
