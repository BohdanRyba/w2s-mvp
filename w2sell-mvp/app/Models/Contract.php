<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Contract extends Model implements HasMedia
{
    use InteractsWithMedia;

    use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    /**
     * Participants that belong to the contract.
     */
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'contract_participants', 'contract_id', 'user_id')
            ->withPivot('role', 'status')
            ->withTimestamps();
    }

    /**
     * Revisions associated with the contract.
     */
    public function revisions(): HasMany
    {
        return $this->hasMany(ContractRevision::class);
    }

    /**
     * Register the media collections.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('documents')
            ->useDisk('public')
            ->useFallbackUrl('/images/default.png')
            ->useFallbackPath(public_path('/images/default.png'));
    }

}
