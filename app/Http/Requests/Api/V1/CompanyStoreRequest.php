<?php

namespace App\Http\Requests\Api\V1;

class CompanyStoreRequest extends BaseApiRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'owner_name' => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|max:50',
            'mobile_number' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'distric' => 'nullable|string',
            'located_province' => 'nullable|string',
            'website' => 'nullable|string',
        ];
    }
}
