<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'topic' => $this->topic,
            'description' => $this->description,
            'type' => $this->type,
            'start' => $this->notifiaction_date_start,
            'end' => $this->notification_date_end,
            'state' => $this->state,
            'read_state' => $this->read_state,
        ];
    }
}
