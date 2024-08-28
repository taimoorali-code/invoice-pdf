<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'first_name',
        'last_name',
        'address1',
        'address2',
        'city',
        'province',
        'zip',
        'country',
        'phone',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
