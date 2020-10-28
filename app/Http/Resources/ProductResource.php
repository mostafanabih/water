<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'product_id' => $this->id,
            'product_name' => $this->name,
            'product_image' => $this->getImgDisplay(),
            'product_size' => $this->size,
            'product_normal' => $this->normal ? true : false,
            'product_normal_price' => $this->normal_price,
            'product_mosque' => $this->mosque ? true : false,
            'product_mosque_price' => $this->mosque_price,
            'product_offer' => $this->offer ? true : false,
            'product_offer_price' => $this->offer_price,
//            'product_type' => $this->type,
//            'product_old_price' => $this->price,
//            'product_discount' => $this->discount,
//            'product_current_price' => $this->after_discount,
            'product_kind' => $this->kind,
        ];
    }
}
