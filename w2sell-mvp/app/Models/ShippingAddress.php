<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingAddress extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'street',
        'city',
        'postcode',
        'region',
        'country_code',
        'phone',
        'email',
        'cart_id',
        'order_id',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
