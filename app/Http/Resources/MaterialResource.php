<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'grado'=>$this->grado,
            'type'=>$this->type,
            'url'=>$this->url,
            'content'=>$this->content,
            'title'=>$this->title,
            'order'=>$this->order,
            'lesson_id'=>$this->lesson_id,

            'lesson'=>new LessonResource($this->whenLoaded('lesson')),
            'courses'=>CourseResource::collection($this->whenLoaded('courses')),
        ];
    }
}
