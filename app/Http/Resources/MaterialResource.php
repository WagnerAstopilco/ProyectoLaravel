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
            'title'=>$this->title,
            'grade'=>$this->grade,
            'type'=>$this->type,
            'file'=>$this->file,
            'url'=>$this->url,
            'content'=>$this->content,
            'order_in_lesson'=>$this->order_in_lesson,
            'lesson_id'=>$this->lesson_id,

            'lesson' =>new LessonResource($this->whenLoaded('lesson')),
            'courses' => CourseMaterialResource::collection($this->whenLoaded('courses')),
        ];
    }
}
