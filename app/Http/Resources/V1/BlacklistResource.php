<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class BlacklistResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'nic' => $this->nic,
            'address' => $this->address,
            'telephone_no' => $this->telephone_no,
            'type_of_damage' => $this->type_of_damage,
            'description' => $this->resone_describe,
            'company' => $this->company_id,
        ];
    }
}
