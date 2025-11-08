<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class VehicleUpdateRequest extends BaseApiRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'vehical_type' => 'sometimes|string|max:255',
            'body_type' => 'sometimes|string|max:255',
            'vehical_brand' => 'sometimes|string|max:255',
            'vehical_model' => 'sometimes|string|max:255',
            'meeter' => 'sometimes|numeric',
            'licen_exp' => 'sometimes|date',
            'insurence_exp' => 'sometimes|date',
            'per_day_rental' => 'sometimes|numeric',
            'per_week_rental' => 'sometimes|numeric',
            'per_month_rental' => 'sometimes|numeric',
            'per_year_rental' => 'sometimes|numeric',
            'addtional_per_mile_cost' => 'sometimes|numeric',
            'deposit_amount' => 'sometimes|numeric',
            'description' => 'sometimes|string',
            'avalibility' => 'sometimes|string|in:yes,no',
        ];
    }
}
