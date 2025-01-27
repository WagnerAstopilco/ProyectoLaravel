<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name_long' => $this->name_long,
            'name_short' => $this->name_short,
            'price' => $this->price,
            'discount' => $this->discount,
            'image' => $this->image,
            'description' => $this->description,
            'store_id' => $this->store_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'category' => new CategoryResource($this->whenLoaded('category')),
            'category_id' => $this->category_id,
        ];
    }
}
