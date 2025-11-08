<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'date_time' => $this->date_time ?? null,
            'total' => $this->total ?? null,
            'customer_id' => $this->customer_id ?? null,
            'booking_id' => $this->booking_id ?? null,
            'status' => $this->status ?? null,
        ];
    }
}
