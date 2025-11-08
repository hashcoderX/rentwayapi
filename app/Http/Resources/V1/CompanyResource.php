<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'owner_name' => $this->owner_name,
            'contact_no' => $this->contact_no,
            'mobile_number' => $this->mobile_number,
            'address' => $this->address,
            'province' => $this->located_province,
            'district' => $this->distric,
            'city' => $this->city,
            'website' => $this->website,
            'logo' => $this->logo,
        ];
    }
}
