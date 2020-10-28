<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'notify_id' => $this->id,
//            'notify_type' => str_replace("App\\Notifications\\","",$this->type),
//            'notify_notifiable_type' => str_replace("App\\","",$this->notifiable_type),
//            'notify_notifiable_id' => $this->notifiable_id,
//            'notify_data' => $this->data,
            'notify_data_text' => $this->data['text'],
            'notify_data_order_id' => $this->data['order_id'],
            'notify_data_type' => $this->data['type'],
            'notify_reading' => ($this->read_at) ? true : false,
            'notify_date' => date('Y/m/d', strtotime($this->created_at)),
            'notify_time' => date('h:i a', strtotime($this->created_at)),
        ];
    }
}
