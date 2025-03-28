<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'name_long' => $this->name_long,
            'name_short' => $this->name_short,
            'price' => $this->price,
            'discount' => $this->discount,
            'image' => $this->image,
            'description' => $this->description,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'duration_in_hours'=>$this->duration_in_hours,
            'store_id' => $this->store_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'category_id' => $this->category_id,

            'category'=>new CategoryResource($this->whenLoaded('category')),
            'trainers' => TrainerResource::collection($this->whenLoaded('trainers')),
            'evaluations' => EvaluationResource::collection($this->whenLoaded('evaluations')),
            'certificates' => CertificateResource::collection($this->whenLoaded('certificates')),
            'enrollments' => EnrollmentResource::collection($this->whenLoaded('enrollments')),
            'modules' => CourseModuleResource::collection($this->whenLoaded('modules')),
            
            // 'materials'=>$this->whenLoaded('materials') ? collect(MaterialResource::collection($this->materials)->toArray(request()))
            //     ->map(function ($material) {
            //         return array_merge($material,['order' => $material['pivot']['order'] ?? null]);}): [],

        ];
    }
}
