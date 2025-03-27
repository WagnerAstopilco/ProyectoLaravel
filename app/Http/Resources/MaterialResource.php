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
            'grade'=>$this->grado,
            'type'=>$this->type,
            'url'=>$this->url,
            'content'=>$this->content,
            'order_in_lesson'=>$this->order_in_lesson,
            'lesson_id'=>$this->lesson_id,

            'lesson'=>new LessonResource($this->whenLoaded('lesson')),
            // 'courses'=>CourseResource::collection($this->whenLoaded('courses'))->map(function($course){
            //     return array_merge(
            //         $course->toArray(),
            //         ['order'=>$course->pivot->order]
            //     );
            // }),

            'courses'=>$this->whenLoaded('courses') ? collect(CourseResource::collection($this->courses)->toArray(request()))
                ->map(function ($course) {
                    return array_merge($course,['order' => $course['pivot']['order'] ?? null]);}): [],
        ];
    }
}
