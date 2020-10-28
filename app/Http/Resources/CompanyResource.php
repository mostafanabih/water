<?php

namespace App\Http\Resources;

use App\Setting;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'company_id' => $this->id,
            'company_name' => $this->name,
            'company_image' => $this->getImgDisplay(),
            'company_dates' => new CompanyDateResource($this->whenLoaded('CompanyDates')),
            'company_minimum_orders' => $this->minimum_orders,
            'company_added_value' => Setting::select('add_value')->first()->add_value
        ];
    }
}
