<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'accept_language',
        'browser_ip',
        'user_agent',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
