<?php

namespace App\Http\Requests\Api\V1;

class CustomerStoreRequest extends BaseApiRequest
{
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'nic' => 'nullable|string|max:20',
            'telephone_no' => 'nullable|string|max:20',
            'email' => 'nullable|email',
        ];
    }
}
