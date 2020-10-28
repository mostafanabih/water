<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RepresentativeResource extends JsonResource
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
            'representative_id' => $this->id,
            'representative_company_id' => $this->company_id,
            'representative_name' => $this->name,
            'representative_mobile' => $this->mobile,
            'representative_email' => $this->email,
            'representative_user_name' => $this->user_name,
            'representative_api_token' => $this->api_token,
            'representative_player_id' => $this->player_id,
        ];
    }
}
