<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContractSignature extends Model
{
    protected $fillable = [
        'contract_participant_id',
        'signature_path',
    ];

    public function participant(): BelongsTo
    {
        return $this->belongsTo(ContractParticipant::class);
    }
}
