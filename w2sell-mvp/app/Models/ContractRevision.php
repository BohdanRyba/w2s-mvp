<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ContractRevision extends Model  implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    protected $fillable = [
        'contract_id',
        'description',
    ];

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('revision_documents')
            ->useDisk('public');
    }
}
