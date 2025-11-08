<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class BlacklistStoreRequest extends BaseApiRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'nic' => 'required|string|max:20',
            'address' => 'nullable|string',
            'telephone_no' => 'nullable|string|max:20',
            'type_of_damage' => 'nullable|string',
            'resone_describe' => 'nullable|string',
        ];
    }
}
