<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'lessons'=>LessonResource::collection($this->whenLoaded('lessons')),
            'courses' => CourseModuleResource::collection($this->whenLoaded('courses')),
        ];
    }
}
