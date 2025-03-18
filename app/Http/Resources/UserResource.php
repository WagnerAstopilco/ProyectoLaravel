<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'names'=>$this->names,
            'last_names'=>$this->last_names,
            'email'=>$this->email,
            'password'=>$this->password,
            'role'=>$this->role,
            'status'=>$this->status,
            'phone_number'=>$this->phone_number,
            'birthday_date'=>$this->birthday_date,
            'country'=>$this->country,
            'city'=>$this->city,
            'address_type'=>$this->address_type,
            'address'=>$this->address,
            'address_number'=>$this->address_number,
            'document_type'=>$this->document_type,
            'document_number'=>$this->document_number,
            'gender'=>$this->gender,
            'photo'=>$this->photo,
            'speciality'=>$this->speciality,
            'biography'=>$this->biography,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,              

            'trainer'=>new TrainerResource($this->whenLoaded('trainer')),
            'certificates'=>CertificateResource::collection($this->whenLoaded('certificates')),
            'enrollments'=>EnrollmentResource::collection($this->whenLoaded('enrollments')),
            'userEvaluations'=>UserEvaluationResource::collection($this->whenLoaded('userEvaluations')),

            'lessons' => LessonResource::collection($this->whenLoaded('lessons'))->map(function($lesson){
                return array_merge(
                    $lesson->toArray(),
                    ['state'=>$lesson->pivot->state]
                );
            }),
        ];
    }
}
