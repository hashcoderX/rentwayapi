<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertiserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'contact_no' => $this->contact_no,
            'mobile_number' => $this->mobile_number,
            'address' => $this->address,
            'city' => $this->city,
            'district' => $this->distric,
            'province' => $this->located_province,
            'website' => $this->website,
            'logo' => $this->logo,
        ];
    }
}
