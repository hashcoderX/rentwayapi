<?php

namespace App\Http\Requests\Api\V1;

class AdsUpdateRequest extends BaseApiRequest
{
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:50',
            'city' => 'sometimes|string|max:100',
            'district' => 'sometimes|string|max:100',
            'province' => 'sometimes|string|max:100',
            'description' => 'sometimes|string',
            'status' => 'sometimes|string',
            'availibility' => 'sometimes|string',
        ];
    }
}
