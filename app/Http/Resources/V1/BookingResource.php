<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'vehicle_no' => $this->vehicle_no,
            'start' => [
                'date' => $this->book_start_date,
                'time' => $this->pick_time,
                'location' => $this->pick_location,
            ],
            'end' => [
                'date' => $this->return_date,
                'time' => $this->return_time,
                'location' => $this->return_location,
            ],
            'route' => $this->wheretogo,
            'driver_option' => $this->isdriver,
            'status' => $this->status,
            'note' => $this->note,
            'customer_id' => $this->customer_id,
        ];
    }
}
