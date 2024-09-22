<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Store extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'title',
        'short_description',
        'description',
        'image',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function billingAddresses(): HasMany
    {
        return $this->hasMany(BillingAddress::class, 'store_id', 'id');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'store_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'store_id', 'id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('store_image')
            ->singleFile();
    }
}
