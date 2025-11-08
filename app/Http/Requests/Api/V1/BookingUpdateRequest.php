<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdateRequest extends BaseApiRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'book_start_date' => 'sometimes|date',
            'pick_time' => 'sometimes|string',
            'return_date' => 'sometimes|date|after_or_equal:book_start_date',
            'return_time' => 'sometimes|string',
            'pick_location' => 'sometimes|string|max:255',
            'return_location' => 'sometimes|string|max:255',
            'wheretogo' => 'sometimes|string|max:255',
            'isdriver' => 'sometimes|string|in:without_driver,with_driver,hire',
            'note' => 'sometimes|string',
            'isconfirm' => 'sometimes|string',
            'confirm_amount' => 'sometimes|numeric',
            'status' => 'sometimes|string|in:pending,canceled,completed',
        ];
    }
}
