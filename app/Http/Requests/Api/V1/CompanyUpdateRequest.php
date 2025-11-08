<?php

namespace App\Http\Requests\Api\V1;

class CompanyUpdateRequest extends BaseApiRequest
{
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email',
            'owner_name' => 'sometimes|string|max:255',
            'contact_no' => 'sometimes|string|max:50',
            'mobile_number' => 'sometimes|string|max:50',
            'address' => 'sometimes|string',
            'city' => 'sometimes|string',
            'distric' => 'sometimes|string',
            'located_province' => 'sometimes|string',
            'website' => 'sometimes|string',
        ];
    }
}
