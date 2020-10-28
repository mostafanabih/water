<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
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
            'product_title' => $this->Product->name ?? null,
            'product_size' => $this->Product->size ?? null,
            'product_image' => $this->Product->getImgDisplay(),
            'quantity' => $this->quantity,
            'product_type' => $this->type,
            'price' => $this->price,
            'discount' => $this->discount,
            'after_discount' => $this->after_discount,
        ];
    }
}
