<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends BaseApiRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'vehicle_no' => 'required|string|max:50',
            'book_start_date' => 'required|date',
            'pick_time' => 'required|string',
            'return_date' => 'required|date|after_or_equal:book_start_date',
            'return_time' => 'required|string',
            'pick_location' => 'nullable|string|max:255',
            'return_location' => 'nullable|string|max:255',
            'wheretogo' => 'nullable|string|max:255',
            'isdriver' => 'nullable|string|in:without_driver,with_driver,hire',
            'note' => 'nullable|string',
            'customer_id' => 'nullable|integer',
            'customer_name' => 'nullable|string|max:255',
            'customer_contact' => 'nullable|string|max:50',
        ];
    }
}
