<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends BaseApiRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'vehical_no' => 'required|string|max:255|unique:vehicals,vehical_no',
            'vehical_type' => 'required|string|max:255',
            'body_type' => 'nullable|string|max:255',
            'vehical_brand' => 'required|string|max:255',
            'vehical_model' => 'nullable|string|max:255',
            'meeter' => 'nullable|numeric',
            'licen_exp' => 'nullable|date',
            'insurence_exp' => 'nullable|date',
            'per_day_rental' => 'nullable|numeric',
            'per_week_rental' => 'nullable|numeric',
            'per_month_rental' => 'nullable|numeric',
            'per_year_rental' => 'nullable|numeric',
            'per_day_free_duration' => 'nullable|numeric',
            'per_week_free_duration' => 'nullable|numeric',
            'per_month_free_duration' => 'nullable|numeric',
            'per_year_free_duration' => 'nullable|numeric',
            'addtional_per_mile_cost' => 'nullable|numeric',
            'deposit_amount' => 'nullable|numeric',
            'description' => 'nullable|string',
            'avalibility' => 'nullable|string|in:yes,no',
        ];
    }
}
