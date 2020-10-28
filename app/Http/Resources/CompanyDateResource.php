<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyDateResource extends JsonResource
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
            'days_text_en' => $this->days ?? '-----',
            'days_text_ar' => $this->get_days_text_ar() ?? '-----',
            'days_array_en' => explode(',', $this->days) ?? null,
            'days_array_ar' => $this->get_days_array_ar() ?? null,
            'time_from' => $this->from_time  ?? null,
            'time_to' => $this->to_time ?? null,
            'times_array' => $this->get_times_array() ?? null
        ];
    }
}
