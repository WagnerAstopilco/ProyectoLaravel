<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseMaterialResource extends JsonResource
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
            'order' => $this->order,
            'material_id' => $this->material_id,
            'course_id' => $this->course_id,

            'course' => new CourseResource($this->whenLoaded('course')),
            'material' => new MaterialResource($this->whenLoaded('material')),
        ];
    }
}
