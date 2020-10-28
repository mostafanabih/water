<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FixedPageResource extends JsonResource
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
            'page_id' => $this->id,
            'page_title' => $this->title,
            'page_slug' => $this->slug,
            'page_body' => $this->body
        ];
    }
}
