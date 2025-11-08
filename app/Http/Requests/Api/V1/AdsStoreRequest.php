<?php

namespace App\Http\Requests\Api\V1;

class AdsStoreRequest extends BaseApiRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'city' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
            'availibility' => 'nullable|string',
        ];
    }
}
