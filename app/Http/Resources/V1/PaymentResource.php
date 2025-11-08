<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'description' => $this->description,
            'date_time' => $this->date_time,
            'paytype' => $this->paytype,
            'invoiceid' => $this->invoiceid,
            'paystatus' => $this->paystatus,
        ];
    }
}
