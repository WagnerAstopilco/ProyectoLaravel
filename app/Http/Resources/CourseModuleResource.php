<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseModuleResource extends JsonResource
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
            'course_id' => $this->course_id,
            'module_id' => $this->module_id,

            'course' => new CourseResource($this->whenLoaded('course')),
            'module' => new ModuleResource($this->whenLoaded('module')),
        ];
    }
}
