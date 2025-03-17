<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'user_id'=> $this->user_id,
            'course_id'=> $this->course_id,
            'issue_date'=>$this->issue_date,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'duration_in_hours'=>$this->duration_in_hours,
            'code'=> $this->code,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

            'user'=>new UserResource($this->whenLoaded('user')),
            'course'=>new CourseResource($this->whenLoaded('course')),
        ];
    }
}
