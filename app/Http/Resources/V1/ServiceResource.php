<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->category,
            'city' => $this->city,
            'province' => $this->province,
            'district' => $this->district,
            'availability' => $this->availibility,
            'company_id' => $this->company_id,
        ];
    }
}
