<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 *
 * @package App\Models
 * @property int $user_id
 * @property int $shipping_address_id
 * @property int $billing_address_id
 * @property float $subtotal
 * @property float $tax_amount
 * @property float $discount_amount
 * @property float $grand_total
 * @property string $status
 * @property string|null $coupon_code
 * @property string $payment_method
 * @property bool $is_paid
 * @property Collection|OrderItem[] $items
 * @property User $user
 * @property ShippingAddress $shippingAddress
 * @property BillingAddress $billingAddress
 */
class Order extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'shipping_address_id',
        'billing_address_id',
        'subtotal',
        'tax_amount',
        'discount_amount',
        'grand_total',
        'status',
        'coupon_code',
        'payment_method',
        'is_paid',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function billingAddress(): BelongsTo
    {
        return $this->belongsTo(BillingAddress::class);
    }

    protected function casts(): array
    {
        return [
            'is_paid' => 'boolean',
        ];
    }
}
