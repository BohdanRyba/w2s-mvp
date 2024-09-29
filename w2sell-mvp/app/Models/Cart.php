<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string user_id
 * @property string guest_token
 * @property string currency_code
 * @property string subtotal
 * @property string tax_amount
 * @property string discount_amount
 * @property string grand_total
 * @property string is_guest
 * @property string coupon_code
 * @property string billing_address_id
 */
class Cart extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'guest_token',
        'currency_code',
        'subtotal',
        'tax_amount',
        'discount_amount',
        'grand_total',
        'is_guest',
        'coupon_code',
        'billing_address_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function billingAddress(): BelongsTo
    {
        return $this->belongsTo(BillingAddress::class);
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function calculateTotals(): void
    {
        $subtotal = 0;
        $taxAmount = 0;
        $discountAmount = 0;

        foreach ($this->items as $item) {
            $subtotal += $item->price * $item->quantity;
            $taxAmount += ($item->price * ($item->tax_percent / 100)) * $item->quantity;
            $discountAmount += $item->discount_amount;
        }

        $this->subtotal = $subtotal;
        $this->tax_amount = $taxAmount;
        $this->discount_amount = $discountAmount;
        $this->grand_total = $subtotal + $taxAmount - $discountAmount;

        $this->save();
    }


    protected function casts(): array
    {
        return [
            'is_guest' => 'boolean',
        ];
    }
}
