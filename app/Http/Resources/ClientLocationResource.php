<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientLocationResource extends JsonResource
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
            'location_id' => $this->id,
            'client_id' => $this->client_id,
            'location' => $this->location,
            'lat' => $this->lat,
            'lon' => $this->lon,
        ];
    }
}
