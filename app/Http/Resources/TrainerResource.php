<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainerResource extends JsonResource
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
            'certifications'=>$this->certifications,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            'user_id'=>$this->user_id,          

            'user'=>new UserResource($this->whenLoaded('user')),
            'courses' => CourseResource::collection($this->whenLoaded('courses')),
        ];

    }
}
