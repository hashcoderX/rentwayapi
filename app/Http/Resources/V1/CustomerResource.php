<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name ?? $this->name ?? null,
            'nic' => $this->nic ?? null,
            'telephone_no' => $this->telephone_no ?? null,
            'email' => $this->email ?? null,
        ];
    }
}
