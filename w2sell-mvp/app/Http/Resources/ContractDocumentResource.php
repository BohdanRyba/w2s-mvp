<?php

namespace App\Http\Resources;

use App\Models\ContractDocument;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ContractDocument */
class ContractDocumentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'path' => $this->path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'contract_id' => $this->contract_id,

            'contract' => new ContractResource($this->whenLoaded('contract')),
        ];
    }
}
