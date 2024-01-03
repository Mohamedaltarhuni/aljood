<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Assuming you have relationships with other models
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
