<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_id' => $this->id,
            'order_total_before_added_value' => $this->OrderProducts->sum('after_discount'),
            'order_added_value' => $this->add_value,
            'order_total' => $this->net,
            'order_representative_name' => $this->Representative->name ?? null,
            'order_products' => OrderProductResource::collection($this->whenLoaded('OrderProducts')),
            'order_date' => $this->client_date,
            'order_day' => $this->get_day_ar(),
            'order_time' => $this->time,
            'order_status' => $this->get_status(),
            'order_who_cancel' => $this->get_who_cancel(),
            'order_cancel_reason' => $this->cancel_reason,
//            'order_company_details' => new CompanyResource($this->whenLoaded('Company')),
            'order_company_image' => ($this->Company) ? $this->Company->getImgDisplay() : null,
            'order_payment_way' => $this->get_payment_way(),
            'order_client_name' => $this->name,
            'order_client_mobile' => $this->mobile,
            'order_location' => $this->location,
            'order_lat' => $this->lat,
            'order_lon' => $this->lon,
        ];
    }
}
