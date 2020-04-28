<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];


    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function phoneNumber()
    {
        return $this->phone_number;
    }

    public function customPaymentValue()
    {
        return $this->custom_payment_value;
    }
}
