<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->category,
            'city' => $this->city,
            'district' => $this->district,
            'province' => $this->province,
            'availability' => $this->availibility,
            'company_id' => $this->company_id,
            'views' => $this->views,
            'status' => $this->status,
            'date_time' => $this->date_time,
        ];
    }
}
