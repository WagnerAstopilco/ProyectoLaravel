<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'order' => $this->order,
            'state'=>$this->state,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'module_id' => $this->module_id,

            'module' => new ModuleResource($this->whenLoaded('module')),
            'sessions'=>LessonSessionResource::collection($this->whenLoaded('sessions')),
            'materials'=>MaterialResource::collection($this->whenLoaded('materials')),
            'users' => LessonUserResource::collection($this->whenLoaded('users')),
        ];
    }
}
