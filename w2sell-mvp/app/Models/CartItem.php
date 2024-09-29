<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property int $cart_id
 * @property int $store_id
 * @property int $product_id
 * @property int $quantity
 * @property float $price
 * @property float $price_incl_tax
 * @property float $tax_percent
 * @property float $discount_amount
 * @property string $coupon_code
 * @property array $product_options
 */
class CartItem extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'cart_id',
        'store_id',
        'product_id',
        'quantity',
        'price',
        'price_incl_tax',
        'tax_percent',
        'discount_amount',
        'coupon_code',
        'product_options',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function calculatePriceWithTax(): void
    {
        $this->price_incl_tax = $this->price + ($this->price * ($this->tax_percent / 100));
        $this->save();
    }
}
