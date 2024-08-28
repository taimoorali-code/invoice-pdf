<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'title',
        'code',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
