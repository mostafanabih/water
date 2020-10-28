<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'client_id' => $this->id,
            'client_name' => $this->name,
            'client_mobile' => $this->mobile,
            'client_email' => $this->email,
            'client_api_token' => $this->api_token,
            'client_player_id' => $this->player_id,
            'client_location' => $this->location,
            'client_lat' => $this->lat,
            'client_lon' => $this->lon,
        ];
    }
}
