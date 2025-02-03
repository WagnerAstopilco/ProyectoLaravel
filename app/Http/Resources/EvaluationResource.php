<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EvaluationResource extends JsonResource
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
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'duration'=>$this->duration,
            'attempts_allowed'=>$this->attempts_allowed,
            'course_id'=>$this->course_id,
            
            'courses'=>new CourseResource($this->whenLoaded('course')),
            'questions'=>QuestionResource::collection($this->whenLoaded('questions')),
            'user_evaluations'=>UserEvaluationResource::collection($this->whenLoaded('userEvaluations')),
        ];
    }
}
