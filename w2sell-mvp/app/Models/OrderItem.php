<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class OrderItem
 *
 * @package App\Models
 *
 * @property int $order_id
 * @property int $product_id
 * @property int $store_id
 * @property int $quantity
 * @property float $price
 * @property float $price_incl_tax
 * @property float $tax_percent
 * @property float $discount_amount
 *
 * @method float getSubtotal()
 * @method BelongsTo order()
 * @method BelongsTo product()
 * @method BelongsTo store()
 */
class OrderItem extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'store_id',
        'quantity',
        'price',
        'price_incl_tax',
        'tax_percent',
        'discount_amount',
    ];

    /**
     * @return float
     */
    public function getSubtotal():float
    {
        return $this->quantity * $this->price;
    }

    /**
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsTo
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
