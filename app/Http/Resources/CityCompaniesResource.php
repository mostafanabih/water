<?php

namespace App\Http\Resources;

use App\Setting;
use Illuminate\Http\Resources\Json\JsonResource;

class CityCompaniesResource extends JsonResource
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
            'company_id' => $this->company_id,
            'company_name' => $this->Company->name ?? '-----',
            'company_added_value' => Setting::select('add_value')->first()->add_value,
            'company_dates' => new CompanyDateResource($this->whenLoaded('CompanyDates')),
            'company_minimum_orders' => $this->Company->minimum_orders,
        ];
    }
}
