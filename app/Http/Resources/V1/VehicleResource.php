<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->vehical_no,
            'type' => $this->vehical_type,
            'brand' => $this->vehical_brand,
            'model' => $this->vehical_model,
            'body_type' => $this->body_type,
            'availability' => $this->avalibility,
            'pricing' => [
                'per_day' => $this->per_day_rental,
                'per_week' => $this->per_week_rental,
                'per_month' => $this->per_month_rental,
                'per_year' => $this->per_year_rental,
                'deposit' => $this->deposit_amount,
                'extra_mile' => $this->addtional_per_mile_cost,
            ],
            'free_durations' => [
                'per_day' => $this->per_day_free_duration,
                'per_week' => $this->per_week_free_duration,
                'per_month' => $this->per_month_free_duration,
                'per_year' => $this->per_year_free_duration,
            ],
            'licence_exp' => $this->licen_exp,
            'insurance_exp' => $this->insurence_exp,
            'image' => $this->latestImage?->image_url,
            'company' => $this->company ? [
                'id' => $this->company->id,
                'name' => $this->company->name,
            ] : null,
        ];
    }
}
