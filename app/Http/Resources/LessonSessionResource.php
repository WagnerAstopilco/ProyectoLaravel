<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonSessionResource extends JsonResource
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
            'lesson_id'=>$this->lesson_id,
            'session_date' => $this->session_date,
            'type' => $this->type,
            'link' => $this->link,
            'password' => $this->password,

            'lesson'=>new LessonResource($this->whenLoaded('lesson')),
        ];
    }
}
