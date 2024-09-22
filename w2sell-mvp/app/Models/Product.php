<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    protected $fillable = [
        //v1
        'category_id',
        'store_id',
        'title',
        'short_description',
        'description',
        'price',
        'stock',
        'stock_treshhold',
        'image',
        'images',
        'weight',
        'lenght',
        'width',
        'height',
        'size_unit_type',
        'weight_unit_type',
        'options',

        //v2
        'attribute_set_id',
        'sku',
        'name',
        'description',
        'price',
        'tax_class_id',
        'url_key',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'is_downloadable',
        'downloadable_link',
        'gift_options',

        //v3
        'is_configurable',
        'is_bundle',

        //v4
        'dropshipper_link',
        'wholeseller_link',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $storePrefix = config('app.store_prefix', 'STORE'); // Default prefix if not set
            $product->sku = $storePrefix . '-' . strtoupper(Str::random(8)) ?? Str::random(3) . '-' . strtoupper(Str::random(8));
            $product->url_key = Str::slug($product->name);
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Relationship to AttributeSet.
     */
    public function attributeSet(): BelongsTo
    {
        return $this->belongsTo(AttributeSet::class);
    }

    /**
     * Relationship to TaxClass.
     */
    public function taxClass(): BelongsTo
    {
        return $this->belongsTo(TaxClass::class);
    }

    /**
     * Many-to-Many relationship for related products.
     */
    public function relatedProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_related', 'product_id', 'related_product_id');
    }

    /**
     * Many-to-Many relationship for upsell products.
     */
    public function upsellProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_upsell', 'product_id', 'upsell_product_id');
    }

    /**
     * Many-to-Many relationship for cross-sell products.
     */
    public function crossSellProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_cross_sell', 'product_id', 'cross_sell_product_id');
    }

    /**
     * Relationship for customizable options.
     */
    public function customizableOptions(): HasMany
    {
        return $this->hasMany(CustomizableOption::class);
    }

    /**
     * Accessor for gift options (decode JSON).
     */
    public function getGiftOptionsAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * One-to-Many relationship for configurable products (simple products as variations).
     */
    public function children(): HasMany
    {
        return $this->hasMany(Product::class, 'parent_id');
    }

    /**
     * Many-to-One relationship for a parent configurable product.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    /**
     * Mutator for gift options (encode JSON).
     */
    public function setGiftOptionsAttribute($value): void
    {
        $this->attributes['gift_options'] = json_encode($value);
    }

    /**
     * Check if the product is downloadable.
     */
    public function isDownloadable()
    {
        return $this->is_downloadable;
    }

    /**
     * Check if the product is configurable.
     */
    public function isConfigurable()
    {
        return $this->is_configurable;
    }


    /**
     * Check if the product is bundle.
     */
    public function isBundle()
    {
        return $this->is_bundle;
    }

    /**
     * Many-to-Many relationship for bundle products.
     */
    public function bundleItems()
    {
        return $this->belongsToMany(Product::class, 'product_bundle', 'bundle_id', 'product_id')
            ->withPivot('quantity'); // Додаємо кількість кожного товару в пакеті
    }

    public function calculateBundlePrice(): float|int
    {
        $totalPrice = 0;

        foreach ($this->bundleItems as $item) {
            $totalPrice += $item->price * $item->pivot->quantity;
        }

        return $totalPrice;
    }

    protected function casts(): array
    {
        return [
            'options' => 'array',
        ];
    }
}
