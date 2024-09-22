<?php

namespace App\Http\Resources;

use App\Models\ContractParticipant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ContractParticipant */
class ContractParticipantResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'role' => $this->role,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'contract_id' => $this->contract_id,
            'user_id' => $this->user_id,

            'contract' => new ContractResource($this->whenLoaded('contract')),
        ];
    }
}
