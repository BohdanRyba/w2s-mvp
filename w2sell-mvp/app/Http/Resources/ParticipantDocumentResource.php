<?php

namespace App\Http\Resources;

use App\Models\ParticipantDocument;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ParticipantDocument */
class ParticipantDocumentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'path' => $this->path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'contract_participant_id' => $this->contract_participant_id,

            'contractParticipant' => new ContractParticipantResource($this->whenLoaded('contractParticipant')),
        ];
    }
}
