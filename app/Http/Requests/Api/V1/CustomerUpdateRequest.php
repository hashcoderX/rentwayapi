<?php

namespace App\Http\Requests\Api\V1;

class CustomerUpdateRequest extends BaseApiRequest
{
    public function rules(): array
    {
        return [
            'full_name' => 'sometimes|string|max:255',
            'nic' => 'sometimes|string|max:20',
            'telephone_no' => 'sometimes|string|max:20',
            'email' => 'sometimes|email',
        ];
    }
}
