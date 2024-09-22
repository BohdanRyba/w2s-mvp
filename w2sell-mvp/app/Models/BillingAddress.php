<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillingAddress extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'store_id',
        'first_name',
        'last_name',
        'country',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'is_default',
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
