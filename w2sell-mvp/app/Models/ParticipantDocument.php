<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParticipantDocument extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'contract_participant_id',
        'path',
    ];

    public function contractParticipant(): BelongsTo
    {
        return $this->belongsTo(ContractParticipant::class);
    }
}
