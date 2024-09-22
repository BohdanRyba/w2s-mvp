<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Profile extends Model implements HasMedia
{
    use InteractsWithMedia,SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'bg_image',
        'country',
        'language',
        'contact',
        'messanger',
        'email',

        'state',
        'zip',
        'timezone',
        'currency',
        'address',
        'address1',
    ];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile_image')
            ->singleFile();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
