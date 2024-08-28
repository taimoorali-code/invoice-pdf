<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_graphql_api_id',
        'app_id',
        'browser_ip',
        'buyer_accepts_marketing',
        'cancel_reason',
        'cart_token',
        'checkout_id',
        'checkout_token',
        'confirmation_number',
        'confirmed',
        'contact_email',
        'created_at',
        'currency',
        'current_subtotal_price',
        'current_total_discounts',
        'current_total_price',
        'current_total_tax',
        'customer_locale',
    ];

    public function clientDetails()
    {
        return $this->hasOne(ClientDetails::class);
    }

    public function lineItems()
    {
        return $this->hasMany(LineItem::class);
    }

    public function shippingAddress()
    {
        return $this->hasOne(ShippingAddress::class);
    }

    public function shippingLines()
    {
        return $this->hasMany(ShippingLine::class);
    }
}
