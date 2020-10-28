<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'site_name' => $this->name,
            'site_email' => $this->email,
            'site_mobile' => $this->mobile,
            'site_address' => $this->address,
            'site_fax' => $this->fax,
            'site_facebook' => $this->facebook,
            'site_twitter' => $this->twitter,
            'site_instagram' => $this->instagram,
            'site_whatsapp' => $this->whatsapp,
            'site_commission_percentage' => $this->commission_percentage,
            'site_add_value' => $this->add_value
        ];
    }
}
